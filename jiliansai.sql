/*
Navicat MySQL Data Transfer

Source Server         : bendi
Source Server Version : 50612
Source Host           : localhost:3306
Source Database       : jiliansai

Target Server Type    : MYSQL
Target Server Version : 50612
File Encoding         : 65001

Date: 2016-07-12 19:17:14
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for jls_admin_users
-- ----------------------------
DROP TABLE IF EXISTS `jls_admin_users`;
CREATE TABLE `jls_admin_users` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL COMMENT '用户名',
  `password` varchar(255) NOT NULL COMMENT '密码',
  `phone` int(11) NOT NULL DEFAULT '0',
  `flag` varchar(255) DEFAULT NULL COMMENT 'flag 用于自动登陆',
  `status` int(11) NOT NULL DEFAULT '0' COMMENT '用户状态',
  `timeline` int(11) NOT NULL DEFAULT '0' COMMENT '时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of jls_admin_users
-- ----------------------------
INSERT INTO `jls_admin_users` VALUES ('1', 'admin', 'admin', '0', null, '0', '0');

-- ----------------------------
-- Table structure for jls_fights
-- ----------------------------
DROP TABLE IF EXISTS `jls_fights`;
CREATE TABLE `jls_fights` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `teamA` int(11) NOT NULL DEFAULT '0' COMMENT 'A队',
  `teamB` int(11) NOT NULL DEFAULT '0' COMMENT 'B队',
  `starttime` int(11) NOT NULL COMMENT '对战时间',
  `group_id` int(11) NOT NULL,
  `turn` int(11) NOT NULL COMMENT '轮次',
  `timeline` int(11) NOT NULL COMMENT '时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of jls_fights
-- ----------------------------

-- ----------------------------
-- Table structure for jls_games
-- ----------------------------
DROP TABLE IF EXISTS `jls_games`;
CREATE TABLE `jls_games` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `item_id` int(11) NOT NULL,
  `pnum` int(11) NOT NULL COMMENT '人数',
  `stime` int(11) NOT NULL COMMENT '开始报名时间',
  `turn` int(11) NOT NULL DEFAULT '1' COMMENT '轮次',
  `etime` int(11) NOT NULL DEFAULT '0' COMMENT '报名结束时间',
  `verify_id` varchar(255) NOT NULL DEFAULT '0' COMMENT '验证方式',
  `timeline` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of jls_games
-- ----------------------------

-- ----------------------------
-- Table structure for jls_groups
-- ----------------------------
DROP TABLE IF EXISTS `jls_groups`;
CREATE TABLE `jls_groups` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `game_id` int(11) NOT NULL,
  `group` varchar(255) NOT NULL COMMENT '所属组 例如：1',
  `turn` int(11) NOT NULL DEFAULT '1' COMMENT '轮次',
  `tid` int(11) NOT NULL COMMENT '队伍id',
  `timeline` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of jls_groups
-- ----------------------------

-- ----------------------------
-- Table structure for jls_items
-- ----------------------------
DROP TABLE IF EXISTS `jls_items`;
CREATE TABLE `jls_items` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL COMMENT '项目名称/游戏名称',
  `logo` varchar(255) NOT NULL COMMENT '游戏logo图片',
  `intr` varchar(255) NOT NULL COMMENT '战队介绍',
  `p_num` varchar(255) NOT NULL COMMENT '游戏人数要求',
  `status` int(11) NOT NULL DEFAULT '1' COMMENT '状态',
  `timeline` int(11) NOT NULL DEFAULT '0' COMMENT '时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of jls_items
-- ----------------------------
INSERT INTO `jls_items` VALUES ('1', '英雄联盟', 'attachment/game/head/16/07/20160712133438261.jpg', '英雄联盟', '1,3', '1', '0');
INSERT INTO `jls_items` VALUES ('2', '王者荣耀', 'attachment/game/head/16/07/20160712133701933.jpg', '王者荣耀', '1', '1', '0');

-- ----------------------------
-- Table structure for jls_pnums
-- ----------------------------
DROP TABLE IF EXISTS `jls_pnums`;
CREATE TABLE `jls_pnums` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `num` int(11) NOT NULL DEFAULT '1' COMMENT '人数要求',
  `beizhu` varchar(255) NOT NULL COMMENT '备注 ',
  `timeline` int(11) NOT NULL DEFAULT '0' COMMENT '时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of jls_pnums
-- ----------------------------
INSERT INTO `jls_pnums` VALUES ('1', '1', '1v1', '0');
INSERT INTO `jls_pnums` VALUES ('2', '2', '2v2', '0');
INSERT INTO `jls_pnums` VALUES ('3', '3', '3v3', '0');

-- ----------------------------
-- Table structure for jls_teams
-- ----------------------------
DROP TABLE IF EXISTS `jls_teams`;
CREATE TABLE `jls_teams` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `game_id` int(11) NOT NULL,
  `pro` varchar(255) NOT NULL DEFAULT '0' COMMENT '所在城市',
  `city` varchar(255) NOT NULL COMMENT '所在市',
  `info` varchar(255) DEFAULT NULL COMMENT '单位/学习 名称',
  `timeline` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of jls_teams
-- ----------------------------

-- ----------------------------
-- Table structure for jls_team_info
-- ----------------------------
DROP TABLE IF EXISTS `jls_team_info`;
CREATE TABLE `jls_team_info` (
  `id` int(11) NOT NULL,
  `tid` int(11) NOT NULL COMMENT 'team_id',
  `name` varchar(60) NOT NULL DEFAULT '0' COMMENT '姓名',
  `phone` int(11) NOT NULL COMMENT '手机号',
  `email` varchar(255) NOT NULL COMMENT '邮箱',
  `idcard` varchar(255) NOT NULL COMMENT '身份证',
  `author_img` varchar(255) NOT NULL,
  `role` int(11) NOT NULL DEFAULT '0' COMMENT '0  队员  1 队长',
  `timeline` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of jls_team_info
-- ----------------------------

-- ----------------------------
-- Table structure for jls_vervitys
-- ----------------------------
DROP TABLE IF EXISTS `jls_vervitys`;
CREATE TABLE `jls_vervitys` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(30) NOT NULL COMMENT '验证方式名称',
  `timeline` int(11) NOT NULL COMMENT '时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of jls_vervitys
-- ----------------------------
