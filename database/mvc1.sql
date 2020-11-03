/*
Navicat MySQL Data Transfer

Source Server         : local
Source Server Version : 50726
Source Host           : localhost:3306
Source Database       : mvc1

Target Server Type    : MYSQL
Target Server Version : 50726
File Encoding         : 65001

Date: 2020-11-03 20:45:58
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for actor
-- ----------------------------
DROP TABLE IF EXISTS `actor`;
CREATE TABLE `actor` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `age` int(3) DEFAULT NULL,
  `sex` int(1) DEFAULT NULL,
  `phone` char(11) COLLATE utf8_unicode_ci NOT NULL,
  `country` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `add_time` char(11) COLLATE utf8_unicode_ci NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=17 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of actor
-- ----------------------------
INSERT INTO `actor` VALUES ('1', '成龙', '0', '1', '11111111111', '中国', '1604397486');
INSERT INTO `actor` VALUES ('2', '李连杰', '0', '1', '11111111111', '中国', '1604397498');
INSERT INTO `actor` VALUES ('3', '李小龙', '0', '1', '11111111111', '中国', '1604397502');
INSERT INTO `actor` VALUES ('4', '周星驰', '0', '1', '11111111111', '中国', '1604397509');
INSERT INTO `actor` VALUES ('5', '梁朝伟', '0', '1', '11111111111', '中国', '1604397515');
INSERT INTO `actor` VALUES ('6', '金城武', '0', '1', '11111111111', '中国', '1604397521');
INSERT INTO `actor` VALUES ('7', '尊龙', '0', '1', '11111111111', '中国', '1604397527');
INSERT INTO `actor` VALUES ('8', '李雪健', '0', '1', '11111111111', '中国', '1604397533');
INSERT INTO `actor` VALUES ('9', '古天乐', '0', '1', '11111111111', '中国', '1604397538');
INSERT INTO `actor` VALUES ('10', '陈道明', '0', '1', '11111111111', '中国', '1604397598');
INSERT INTO `actor` VALUES ('11', '巩俐', '0', '0', '11111111111', '中国', '1604396177');
INSERT INTO `actor` VALUES ('12', '张曼玉', '0', '0', '11111111111', '中国', '1604396191');
INSERT INTO `actor` VALUES ('13', '陈冲', '0', '0', '11111111111', '中国', '1604396204');
INSERT INTO `actor` VALUES ('14', '周迅', '0', '0', '11111111111', '中国', '1604396216');
INSERT INTO `actor` VALUES ('15', '李冰冰', '0', '0', '11111111111', '中国', '1604396226');
INSERT INTO `actor` VALUES ('16', '陈紫琼', '0', '0', '00000000000', '中国', '1604397581');

-- ----------------------------
-- Table structure for director
-- ----------------------------
DROP TABLE IF EXISTS `director`;
CREATE TABLE `director` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `phone` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `country` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT '国籍',
  `add_time` char(11) COLLATE utf8_unicode_ci NOT NULL DEFAULT '0' COMMENT '添加时间',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=20 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of director
-- ----------------------------
INSERT INTO `director` VALUES ('1', '李安', '1000000000', '中国', '1604393830');
INSERT INTO `director` VALUES ('2', '张艺谋', '11111111111', '中国', '1604393925');
INSERT INTO `director` VALUES ('3', '周星驰', '1111111111', '中国', '1604393928');
INSERT INTO `director` VALUES ('4', '冯小刚', '1111111111', '中国', '1604393948');
INSERT INTO `director` VALUES ('5', '徐克', '1111111111', '中国', '1604393959');
INSERT INTO `director` VALUES ('6', '王家卫', '1111111111', '中国', '1604393967');
INSERT INTO `director` VALUES ('7', '陈凯歌', '1111111111', '中国', '1604393976');
INSERT INTO `director` VALUES ('8', '陈可辛', '1111111111', '中国', '1604394000');
INSERT INTO `director` VALUES ('9', '吴宇森', '1111111111', '中国', '1604394010');
INSERT INTO `director` VALUES ('10', '姜文', '1111111111', '中国', '1604394019');
INSERT INTO `director` VALUES ('11', '杨德昌', '1111111111', '中国', '1604394030');
INSERT INTO `director` VALUES ('12', '贾樟柯', '1111111111', '中国', '1604394078');
INSERT INTO `director` VALUES ('13', '徐峥', '1111111111', '中国', '1604394090');
INSERT INTO `director` VALUES ('14', '胡波', '1111111111', '中国', '1604394097');
INSERT INTO `director` VALUES ('15', '许鞍华', '1111111111', '中国', '1604394154');
INSERT INTO `director` VALUES ('16', '侯孝贤', '1111111111', '中国', '1604394165');
INSERT INTO `director` VALUES ('17', '娄烨', '1111111111', '中国', '1604394189');
INSERT INTO `director` VALUES ('18', '宁浩', '1111111111', '中国', '1604394199');
INSERT INTO `director` VALUES ('19', 'test', '1111111111', '中国', '1604394220');
