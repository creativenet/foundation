/*
Navicat MySQL Data Transfer

Source Server         : localhost
Source Server Version : 50517
Source Host           : localhost:3306
Source Database       : foundation

Target Server Type    : MYSQL
Target Server Version : 50517
File Encoding         : 65001

Date: 2011-11-28 14:57:00
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `w3_ad`
-- ----------------------------
DROP TABLE IF EXISTS `w3_ad`;
CREATE TABLE `w3_ad` (
  `ad_id` int(11) NOT NULL AUTO_INCREMENT,
  `category_id` int(11) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `content` text,
  `created` datetime DEFAULT NULL,
  `start` datetime DEFAULT NULL,
  `end` datetime DEFAULT NULL,
  `duration` int(11) DEFAULT NULL,
  `author` int(11) DEFAULT NULL,
  `core_created` int(11) DEFAULT NULL,
  `core_modified` int(11) DEFAULT NULL,
  PRIMARY KEY (`ad_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of w3_ad
-- ----------------------------

-- ----------------------------
-- Table structure for `w3_ad_category`
-- ----------------------------
DROP TABLE IF EXISTS `w3_ad_category`;
CREATE TABLE `w3_ad_category` (
  `category_id` int(11) NOT NULL AUTO_INCREMENT,
  `parent` int(11) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `core_created` int(11) DEFAULT NULL,
  `core_modified` int(11) DEFAULT NULL,
  PRIMARY KEY (`category_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of w3_ad_category
-- ----------------------------

-- ----------------------------
-- Table structure for `w3_content`
-- ----------------------------
DROP TABLE IF EXISTS `w3_content`;
CREATE TABLE `w3_content` (
  `content_id` int(11) NOT NULL AUTO_INCREMENT,
  `content` longtext NOT NULL,
  `language_id` int(11) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  `author` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `core_created` int(11) DEFAULT NULL,
  `core_modified` int(11) DEFAULT NULL,
  PRIMARY KEY (`content_id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of w3_content
-- ----------------------------
INSERT INTO `w3_content` VALUES ('1', '<h1>Test</h1>', '1', '2011-11-15 23:06:55', '2011-11-15 23:06:57', '1', 'Test', null, null);

-- ----------------------------
-- Table structure for `w3_fs`
-- ----------------------------
DROP TABLE IF EXISTS `w3_fs`;
CREATE TABLE `w3_fs` (
  `file_id` int(11) NOT NULL AUTO_INCREMENT,
  `file` mediumblob,
  `name` varchar(255) DEFAULT NULL,
  `extension` varchar(50) DEFAULT NULL,
  `size` int(11) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `type` varchar(50) DEFAULT NULL,
  `path` varchar(255) DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `read` enum('yes','no') DEFAULT 'yes',
  `write` enum('yes','no') DEFAULT 'yes',
  `delete` enum('yes','no') DEFAULT 'yes',
  PRIMARY KEY (`file_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of w3_fs
-- ----------------------------

-- ----------------------------
-- Table structure for `w3_language`
-- ----------------------------
DROP TABLE IF EXISTS `w3_language`;
CREATE TABLE `w3_language` (
  `language_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `code` varchar(10) NOT NULL,
  `main` enum('yes','no') NOT NULL DEFAULT 'no',
  `active` enum('yes','no') NOT NULL DEFAULT 'yes',
  PRIMARY KEY (`language_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of w3_language
-- ----------------------------

-- ----------------------------
-- Table structure for `w3_redirect`
-- ----------------------------
DROP TABLE IF EXISTS `w3_redirect`;
CREATE TABLE `w3_redirect` (
  `redirect_id` int(11) NOT NULL AUTO_INCREMENT,
  `url` varchar(255) NOT NULL,
  `module` varchar(50) NOT NULL,
  `action` varchar(50) DEFAULT NULL,
  `foreign_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`redirect_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of w3_redirect
-- ----------------------------
INSERT INTO `w3_redirect` VALUES ('1', 'test.htm', 'content', null, '1');
