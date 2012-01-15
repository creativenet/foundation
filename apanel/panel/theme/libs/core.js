$(function() {
	init();
	
});

$(window).resize(function() {
	setHeight();
});

function init(){

	// SKIN FORM
	$('input[type="checkbox"]').ezMark();
	$('input[type="radio"]').ezMark();
	$("select").selectbox({
		onOpen: function (inst) {
		},
		onClose: function (inst) {
		},
		onChange: function (val, inst) {
		},
		effect: "slide"
	});
	
	// DATE
	$( ".date" ).datepicker({ dateFormat: 'yy-mm-dd'});
	
	// MASK
	//$(".int").mask("99999999.99",{placeholder:" "});
	$.mask.masks.msk = {mask: '999'}
	$('.int').setMask();
	
	setHeight();
	// TINY
	if ($('.mceEditor').length != 0) {
		tinyInit();
	}
	
	$('.allCheckBox').click(function(){
		if($(this).attr("checked")){
			console.log('off');
			$('.ez-checkbox input').attr("checked", true);
			$('.ez-checkbox').addClass('ez-checked');
		} else {
			$('.ez-checkbox input').attr("checked", false);
			$('.ez-checkbox').removeClass('ez-checked');
		}
	});
	// AUTOCOMPLETE URL
	if ($('.completeUrl').length != 0) {
		$('.completeUrl').keyup(function() {
			console.log('Handler for .keyup() called.');
			var cUrl = $(this).val().toLowerCase().replace(/ /g, '-');
			$('.url').val(cUrl+'.htm');
		});
	}
	/*
	// SUBMIT
	$('form').submit(function() {
		//alert($(this).serialize());
		// chk url
		if($('.url').length != 0){
			var url = checkURL($('.url').val());
		}
		
		saveForm($(this));
		
		if(url){
			console.log('submit');
			return false;
		} else {
			console.log('error');
			return false;
		}
	});
	*/
	
}

// SET HEIGHT
function setHeight(){
	var viewportWidth = $(window).width();
	var viewportHeight = $(window).height();
	var headerHeight = $('header').height();
	var footerHeight = $('footer').height();
	var mainHeight = $('#mainContent').outerHeight();
	var contentHeight = viewportHeight - headerHeight - footerHeight;
	if(contentHeight>=mainHeight){
		$('#aside').height(contentHeight);
	} else {
		$('#aside').height(mainHeight);
	}
	$('#loadingNotification').css('left', (viewportWidth - $('#loadingNotification').width()) / 2);
}

// TINY INIT
function tinyInit(){
	tinyMCE.init({
		// General options
		mode : "textareas",
		editor_selector : "mceEditor",
		editor_deselector : "mceNoEditor",
		theme : "advanced",
		//skin : "cirkuit",
		//skin_variant : "silver",
		plugins : "pagebreak,style,layer,table,save,advhr,advimage,advlink,emotions,iespell,inlinepopups,insertdatetime,preview,media,searchreplace,print,contextmenu,paste,directionality,fullscreen,noneditable,visualchars,nonbreaking,xhtmlxtras,template,wordcount,advlist,autosave",
		// Theme options
		theme_advanced_buttons1 : "bold,italic,underline,|,justifyleft,justifycenter,justifyright,justifyfull,|,hr,removeformat,styleprops,styleselect,formatselect,fontselect,fontsizeselect",
		theme_advanced_buttons2 : "cut,copy,paste,pastetext,pasteword,|,search,replace,|,bullist,numlist,|,undo,redo,|,link,unlink,anchor,image,cleanup,code,|,forecolor,backcolor",
		theme_advanced_buttons3 : "tablecontrols",
		theme_advanced_buttons4 : "",
		theme_advanced_toolbar_location : "top",
		theme_advanced_toolbar_align : "left",
		//theme_advanced_statusbar_location : "bottom",
		//theme_advanced_resizing : true,
		// Example content CSS (should be your site CSS)
		//document_base_url : "{/literal}{$config.webroot}{literal}/",
		//content_css : "{/literal}{$config.webroot}{literal}/css/editor.css",
		width : "500px",
		height: "400px",
		language: "en",
		oninit : setHeight
	});
}

function checkURL(value) {
	value = 'http://www.'+value;
	console.log(value);
	var urlregex = new RegExp(
		"^(http:\/\/www.|https:\/\/www.|ftp:\/\/www.|www.){1}([0-9A-Za-z]+\.)");
	if(urlregex.test(value)){
		return(true);
	}
	return(false);
}

function saveForm(form){
	formData = $(form).serialize();
	var formUrl = window.location.href;
	var index = formUrl.lastIndexOf("/");
	var filename = formUrl.substr(index+1);
	filename = filename.replace("edit", "save")
	filename = 'ajax-' + filename;
	console.log(filename);
	$.ajax({
	  type: "POST",
	  url: filename,
	  data: formData
	}).done(function( msg ) {
	  //alert( "Data Saved: " + msg );
	});	
}