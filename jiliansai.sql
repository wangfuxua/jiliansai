/*
Navicat MySQL Data Transfer

Source Server         : bendi
Source Server Version : 50612
Source Host           : localhost:3306
Source Database       : jiliansai

Target Server Type    : MYSQL
Target Server Version : 50612
File Encoding         : 65001

Date: 2016-07-13 20:12:08
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for jls_admin_colmns
-- ----------------------------
DROP TABLE IF EXISTS `jls_admin_colmns`;
CREATE TABLE `jls_admin_colmns` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `type` int(11) NOT NULL DEFAULT '1' COMMENT '分级',
  `fid` int(11) NOT NULL DEFAULT '0' COMMENT '父栏目名',
  `status` int(11) NOT NULL DEFAULT '1' COMMENT '是否显示',
  `cls_name` varchar(255) NOT NULL COMMENT '栏目标识-对应类',
  `name` varchar(60) NOT NULL COMMENT '栏目名/操作名',
  `url` varchar(120) NOT NULL COMMENT '链接',
  `timeline` int(12) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of jls_admin_colmns
-- ----------------------------
INSERT INTO `jls_admin_colmns` VALUES ('1', '1', '0', '1', 'item', '项目管理', '#', '0');
INSERT INTO `jls_admin_colmns` VALUES ('2', '2', '1', '1', 'item', '项目列表', 'item/ItemList', '0');
INSERT INTO `jls_admin_colmns` VALUES ('3', '2', '1', '1', 'item', '项目添加', 'item/additem', '0');
INSERT INTO `jls_admin_colmns` VALUES ('4', '1', '0', '1', 'news', '新闻中心', '0', '0');
INSERT INTO `jls_admin_colmns` VALUES ('5', '2', '4', '1', 'news', '新闻列表', 'news/list', '0');
INSERT INTO `jls_admin_colmns` VALUES ('6', '2', '4', '1', 'news', '添加新闻', 'news/addnews', '0');
INSERT INTO `jls_admin_colmns` VALUES ('7', '1', '0', '1', 'channel', '合作管理', '#', '0');
INSERT INTO `jls_admin_colmns` VALUES ('8', '2', '7', '1', 'channel', '赞助管理', 'channel/zanzhu', '0');
INSERT INTO `jls_admin_colmns` VALUES ('9', '2', '7', '1', 'channel', '合作方管理', 'channel/hezuofang', '0');
INSERT INTO `jls_admin_colmns` VALUES ('10', '2', '7', '1', 'channel', '合作媒体管理', 'channel/meiti', '0');

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
INSERT INTO `jls_admin_users` VALUES ('1', 'admin', '$P$BO/QQT2cxae1JLfAQY.jcn0FzFe1YD/', '0', null, '0', '0');

-- ----------------------------
-- Table structure for jls_channels
-- ----------------------------
DROP TABLE IF EXISTS `jls_channels`;
CREATE TABLE `jls_channels` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL DEFAULT '0' COMMENT '合作名称',
  `url` varchar(255) NOT NULL DEFAULT '0' COMMENT '合作链接',
  `cln_id` int(11) NOT NULL DEFAULT '0',
  `desc` varchar(255) NOT NULL COMMENT '介绍',
  `type` int(11) NOT NULL DEFAULT '1' COMMENT '是否跳转',
  `status` int(11) NOT NULL DEFAULT '1' COMMENT '是否显示',
  `timeline` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of jls_channels
-- ----------------------------

-- ----------------------------
-- Table structure for jls_colmns
-- ----------------------------
DROP TABLE IF EXISTS `jls_colmns`;
CREATE TABLE `jls_colmns` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `fid` int(11) NOT NULL DEFAULT '0' COMMENT '父级id',
  `name` varchar(255) NOT NULL COMMENT '栏目名称',
  `status` int(11) NOT NULL DEFAULT '1' COMMENT '状态',
  `timeline` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of jls_colmns
-- ----------------------------
INSERT INTO `jls_colmns` VALUES ('1', '0', '新闻中心', '1', '0');
INSERT INTO `jls_colmns` VALUES ('2', '1', '战报', '1', '0');

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
  `verify_id` varchar(30) NOT NULL DEFAULT '0' COMMENT '验证方式',
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
  `status` int(2) NOT NULL DEFAULT '0' COMMENT '是否已经分配比赛',
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
-- Table structure for jls_news
-- ----------------------------
DROP TABLE IF EXISTS `jls_news`;
CREATE TABLE `jls_news` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL COMMENT '文章标题',
  `desc` varchar(255) NOT NULL COMMENT '描述',
  `text` text COMMENT '文章内容',
  `cln_id` int(11) NOT NULL COMMENT '所属栏目',
  `timeline` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of jls_news
-- ----------------------------
INSERT INTO `jls_news` VALUES ('1', 'ceshi', 'dsadasd', '<p>adasdasdas<br/></p>', '2', '1468410272');

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
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of jls_pnums
-- ----------------------------
INSERT INTO `jls_pnums` VALUES ('1', '1', '1v1', '0');
INSERT INTO `jls_pnums` VALUES ('2', '2', '2v2', '0');
INSERT INTO `jls_pnums` VALUES ('3', '3', '3v3', '0');
INSERT INTO `jls_pnums` VALUES ('4', '4', '4v4', '0');
INSERT INTO `jls_pnums` VALUES ('5', '5', '5v5', '0');
INSERT INTO `jls_pnums` VALUES ('6', '6', '6v6', '0');

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
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of jls_vervitys
-- ----------------------------
INSERT INTO `jls_vervitys` VALUES ('1', '手机', '0');
INSERT INTO `jls_vervitys` VALUES ('2', '身份证', '0');
INSERT INTO `jls_vervitys` VALUES ('3', '学生证', '0');
