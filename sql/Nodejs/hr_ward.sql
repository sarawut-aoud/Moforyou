/*
Navicat MySQL Data Transfer

Source Server         : web
Source Server Version : 80026
Source Host           : 192.168.9.7:3306
Source Database       : db_asset

Target Server Type    : MYSQL
Target Server Version : 80026
File Encoding         : 65001

Date: 2022-01-26 12:59:44
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for hr_ward
-- ----------------------------
DROP TABLE IF EXISTS `hr_ward`;
CREATE TABLE `hr_ward` (
  `ward_id` int NOT NULL AUTO_INCREMENT,
  `ward_name` varchar(150) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `ward_token` longtext CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `faction_id` int NOT NULL,
  `depart_id` int NOT NULL,
  `ward_pct` int NOT NULL,
  `hosward_id` varchar(4) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `ward_pubilc` enum('Y','N') CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `user` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `time` datetime DEFAULT NULL,
  `user_update` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `time_update` datetime DEFAULT NULL,
  PRIMARY KEY (`ward_id`)
) ENGINE=MyISAM AUTO_INCREMENT=290 DEFAULT CHARSET=utf8mb3 COLLATE=utf8_unicode_ci;
