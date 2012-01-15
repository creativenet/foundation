<?php  //version pg105
header("Content-Type: application/octet-stream");

error_reporting(0);
set_time_limit(0);
set_magic_quotes_runtime(0);

function phpversion_int()
{
    list($maVer, $miVer, $edVer) = split("[/.-]", phpversion());
    return $maVer*10000 + $miVer*100 + $edVer;
}

function GetLongBinary($num)
{
    return pack("N",$num);
}

function GetShortBinary($num)
{
    return pack("n",$num);
}

function GetDummy($count)
{
    $str = "";
    for($i=0;$i<$count;$i++)
        $str .= "\x00";
    return $str;
}

function GetBlock($val)
{
    $len = strlen($val);
    if( $len < 254 )
        return chr($len).$val;
    else
        return "\xFE".GetLongBinary($len).$val;
}

function EchoHeader($errno)
{
    $str = GetLongBinary(1111);
    $str .= GetShortBinary(1);
    $str .= GetLongBinary($errno);
    $str .= GetDummy(6);
    echo $str;
}

function EchoConnInfo($conn)
{
    $str = GetBlock(pg_host($conn));
    $protocol = "3";
    $version = "";
    $is_set = false;
    if(function_exists("pg_version")) {
        $v = pg_version($conn);
        if(array_key_exists('protocol', $v)) {
            $protocol = $v['protocol'];
        }
        if(array_key_exists('server', $v)) {
            $version = $v['server'];
            $is_set = true;
        }
    }
    if(!$is_set) {
        $res = pg_query($conn,"select substring(version(), '[0-9]{1,2}\\.[0-9]{1,2}[\\.|0-9|a-z|A-Z]+')");
        if($res) {
            $numfields = pg_num_fields($res);
            if($numfields == 1) {
                $row = pg_fetch_row($res);
                if($row) {
                    $version = $row[0];
                }
            }
            pg_free_result($res);
        }
    }
    $str .= GetBlock($protocol);
    
    $major = 0;
    $minor = 0;
    $patch_level = 0;
    $version_int = 0;
    if(sscanf($version, "%d.%d.%d",  $major, $minor, $patch_level) >= 3) {
        $version_int = $major*10000+$minor*100+$patch_level;
    } else if(sscanf($version, "%d.%d%s",  $major, $minor, $patch_level) >= 3) {
        $version_int = $major*10000+$minor*100;
    } else {
        $version_int = 80000;
    }
    $str .= GetBlock($version_int);
    echo $str;
}

function EchoResultSetHeader($errno, $affectrows, $insertid, $numfields, $numrows)
{
    $str = GetLongBinary($errno);
    $str .= GetLongBinary($affectrows);
    $str .= GetLongBinary($insertid);
    $str .= GetLongBinary($numfields);
    $str .= GetLongBinary($numrows);
    $str .= GetDummy(12);
    echo $str;
}

function EchoFieldsHeader($res, $numfields)
{
    $str = "";
    for( $i = 0; $i < $numfields; $i++ ) {
        $str .= GetBlock(pg_field_name($res, $i));
        $str .= GetBlock("");

        $type = pg_field_type($res, $i);
        $length = pg_field_size($res, $i);
        switch ($type){
            case "boolean":         $type = 16;     break;
            case "bytea":           $type = 17;     break;
            case "bit":             $type = 1560;   break;
            case "varbit":          $type = 1562;   break;
            case "char":            $type = 18;     break;
            case "name":            $type = 19;     break;
            case "int2vector":      $type = 22;     break;
            case "oidvector":       $type = 30;     break;
            case "int8":            $type = 20;     break;
            case "tid":             $type = 27;     break;
            case "int2":            $type = 21;     break;
            case "int4":            $type = 23;     break;
            case "oid":             $type = 26;     break;
            case "xid":             $type = 28;     break;
            case "cid":             $type = 29;     break;
            case "text":            $type = 25;     break;
            case "money":           $type = 790;    break;
            case "numeric":         $type = 1700;   break;
            case "point":           $type = 600;    break;
            case "lseg":            $type = 601;    break;
            case "path":            $type = 602;    break;
            case "box":             $type = 603;    break;
            case "polygon":         $type = 604;    break;
            case "line":            $type = 628;    break;
            case "circle":          $type = 718;    break;
            case "float4":          $type = 700;    break;
            case "float8":          $type = 701;    break;
            case "abstime":         $type = 702;    break;
            case "tinterval":       $type = 704;    break;
            case "timestamp":       $type = 1114;   break;
            case "timestamptz":     $type = 1184;   break;
            case "interval":        $type = 1186;   break;
            case "timetz":          $type = 1266;   break;
            case "unknown":         $type = 705;    break;
            case "macaddr":         $type = 829;    break;
            case "inet":            $type = 869;    break;
            case "cidr":            $type = 650;    break;
            case "bpchar":          $type = 1042;   break;
            case "varchar":         $type = 1043;   break;
            case "date":            $type = 1082;   break;
            case "time":            $type = 1083;   break;
            case "regproc":         $type = 24;     break;
            case "refcursor":       $type = 1790;   break;
            case "regprocedure":    $type = 2202;   break;
            case "regoper":         $type = 2203;   break;
            case "regoperator":     $type = 2204;   break;
            case "regclass":        $type = 2205;   break;
            case "regtype":         $type = 2206;   break;
            default: 0;
        }

        $str .= GetLongBinary($type);
        $str .= GetLongBinary(0);
        $str .= GetLongBinary($length);
    }
    echo $str;
}

function EchoData($res, $numfields, $numrows)
{
    for ($i=0; $i < $numrows; $i++ ) {
        $str = "";
        $row = pg_fetch_row( $res );
        for ($j=0; $j < $numfields; $j++ ){
            if( is_null($row[$j]) )
                $str .= "\xFF";
            else
                $str .= GetBlock($row[$j]);
        }
        echo $str;
    }
}

    if (!function_exists("pg_connect")) {
        EchoHeader(201);
        echo GetBlock("PostgresSQL not supported on the server");
        exit();
    }

    if (phpversion_int() < 40010) {
        global $HTTP_POST_VARS;
        $_POST = &$HTTP_POST_VARS;	
    }

    if (!isset($_POST["actn"]) || !isset($_POST["host"]) || !isset($_POST["port"]) || !isset($_POST["login"])) {
        EchoHeader(202);
        echo GetBlock("invalid parameters");
        exit();
    }

    $errno_c = 0;
    $connstr = "host=".$_POST["host"]." port=".$_POST["port"];
    if ($_POST["db"] != "")
        $connstr = $connstr." dbname=".$_POST["db"];
    else
        $connstr = $connstr." dbname=template1";
    $connstr = $connstr." user=".$_POST["login"]." password=".$_POST["password"];
    $conn = pg_connect($connstr);
    if (!$conn) {
        $errno_c = 202;
        $error_c = "Could not allocate new connection";
    }

    EchoHeader($errno_c);
    if ($errno_c > 0) {
        echo GetBlock($error_c);
    } elseif ($_POST["actn"] == "C") {
        EchoConnInfo($conn);
    } elseif ($_POST["actn"] == "Q") {
        for ($i=0; $i < count($_POST["q"]); $i++) {
            $query = $_POST["q"][$i];
            if ($query == "") continue;
            if (get_magic_quotes_gpc())
                $query = stripslashes($query);
            $res = pg_query($conn,$query);
            $error = pg_last_error($conn);
            if ($error <> "")
                $errno = 1;
            else
                $errno = 0;
            $affectedrows = pg_affected_rows($res);
            $insertid = 0;
            $numfields = pg_num_fields($res);
            $numrows = pg_num_rows($res);
            EchoResultSetHeader($errno, $affectedrows, $insertid, $numfields, $numrows);
            if($errno > 0)
                echo GetBlock($error);
            else {
                if ($numfields > 0) {
                    EchoFieldsHeader($res, $numfields);
                    EchoData($res, $numfields, $numrows);
                } else
                    echo GetBlock("");
            }
            if ($i < (count($_POST["q"])-1))
                echo "\x01";
            else
                echo "\x00";
            pg_free_result($res);
        }
    }

?>