/*
Navicat MySQL Data Transfer

Source Server         : bendi
Source Server Version : 50612
Source Host           : localhost:3306
Source Database       : jiliansai

Target Server Type    : MYSQL
Target Server Version : 50612
File Encoding         : 65001

Date: 2016-08-15 16:02:17
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
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8;

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
INSERT INTO `jls_admin_colmns` VALUES ('11', '2', '7', '1', 'channel', '添加合作', 'channel/addChannel', '0');
INSERT INTO `jls_admin_colmns` VALUES ('12', '2', '1', '1', 'item', '比赛管理', 'item/games', '0');
INSERT INTO `jls_admin_colmns` VALUES ('13', '1', '0', '1', 'users', '会员管理', '#', '0');
INSERT INTO `jls_admin_colmns` VALUES ('14', '2', '13', '1', 'users', '会员列表', 'users/list', '0');
INSERT INTO `jls_admin_colmns` VALUES ('15', '1', '0', '1', 'video', '比赛视频管理', '#', '0');
INSERT INTO `jls_admin_colmns` VALUES ('16', '2', '15', '1', 'video', '视频列表', 'video/list', '0');
INSERT INTO `jls_admin_colmns` VALUES ('17', '2', '15', '1', 'video', '视频添加', 'video/add', '0');
INSERT INTO `jls_admin_colmns` VALUES ('18', '1', '0', '1', 'advent', '广告管理', '#', '0');
INSERT INTO `jls_admin_colmns` VALUES ('19', '2', '18', '1', 'advent', '广告列表', 'Advent/list', '0');
INSERT INTO `jls_admin_colmns` VALUES ('20', '2', '18', '1', 'advent', '添加广告', 'Advent/add', '0');

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
-- Table structure for jls_advent
-- ----------------------------
DROP TABLE IF EXISTS `jls_advent`;
CREATE TABLE `jls_advent` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL COMMENT '广告名',
  `url` varchar(255) NOT NULL COMMENT '链接地址',
  `img` varchar(255) NOT NULL COMMENT '图片',
  `showname` varchar(255) DEFAULT NULL COMMENT '位置名',
  `type` int(11) NOT NULL COMMENT '广告形式：1 内部广告',
  `status` int(11) NOT NULL DEFAULT '1' COMMENT '默认显示',
  `show` varchar(255) NOT NULL COMMENT '展示位置',
  `timeline` int(11) NOT NULL COMMENT '时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of jls_advent
-- ----------------------------
INSERT INTO `jls_advent` VALUES ('1', 'ceshi', 'www.baidu.com', 'attachment/jls/16/08/20160801131724157.jpg', '首页banner', '1', '1', 'home_banner', '1470029101');
INSERT INTO `jls_advent` VALUES ('2', '广告12', '/', 'attachment/jls/16/08/20160802103401824.jpg', '首页广告1', '1', '1', 'home_adv1', '1470105245');
INSERT INTO `jls_advent` VALUES ('3', '广告2', '312312', 'attachment/jls/16/08/20160802103431236.jpg', '首页广告2', '0', '1', 'home_adv2', '1470105275');

-- ----------------------------
-- Table structure for jls_channels
-- ----------------------------
DROP TABLE IF EXISTS `jls_channels`;
CREATE TABLE `jls_channels` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL DEFAULT '0' COMMENT '合作名称',
  `logo` varchar(255) NOT NULL,
  `url` varchar(255) NOT NULL DEFAULT '0' COMMENT '合作链接',
  `cln_id` int(11) NOT NULL DEFAULT '0',
  `desc` varchar(255) NOT NULL COMMENT '介绍',
  `type` int(11) NOT NULL DEFAULT '1' COMMENT '是否跳转',
  `status` int(11) NOT NULL DEFAULT '1' COMMENT '是否显示',
  `timeline` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of jls_channels
-- ----------------------------
INSERT INTO `jls_channels` VALUES ('2', '周哈气', 'attachment/game/head/16/07/20160714175315488.jpg', 'www.baidu.com', '4', 'dasdasdasdas', '1', '0', '1468490145');
INSERT INTO `jls_channels` VALUES ('3', '周哈气', 'attachment/game/head/16/07/20160714175315488.jpg', 'www.baidu.com', '4', 'dasdasdasdas', '1', '0', '1468490365');
INSERT INTO `jls_channels` VALUES ('4', '王福旭', 'attachment/game/head/16/07/20160714175947849.jpg', 'www.baidu.com', '4', 'dasdasdasdasd', '1', '1', '1468490391');

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
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of jls_colmns
-- ----------------------------
INSERT INTO `jls_colmns` VALUES ('1', '0', '新闻中心', '1', '0');
INSERT INTO `jls_colmns` VALUES ('2', '1', '战报', '1', '0');
INSERT INTO `jls_colmns` VALUES ('3', '0', '合作中心', '0', '0');
INSERT INTO `jls_colmns` VALUES ('4', '3', '全程赞助', '1', '0');
INSERT INTO `jls_colmns` VALUES ('5', '3', '合作方', '1', '0');
INSERT INTO `jls_colmns` VALUES ('6', '3', '合作媒体', '1', '0');
INSERT INTO `jls_colmns` VALUES ('7', '1', '新闻', '1', '0');
INSERT INTO `jls_colmns` VALUES ('8', '1', '专访', '1', '0');
INSERT INTO `jls_colmns` VALUES ('9', '1', '行业', '1', '0');

-- ----------------------------
-- Table structure for jls_fights
-- ----------------------------
DROP TABLE IF EXISTS `jls_fights`;
CREATE TABLE `jls_fights` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `teamA` int(11) NOT NULL DEFAULT '0' COMMENT 'A队',
  `teamB` int(11) NOT NULL DEFAULT '0' COMMENT 'B队',
  `winteam` int(11) NOT NULL COMMENT '胜利队伍',
  `starttime` int(11) NOT NULL COMMENT '对战时间',
  `group_id` int(11) NOT NULL,
  `gameid` int(11) NOT NULL,
  `turn` int(11) NOT NULL COMMENT '轮次',
  `status` int(2) NOT NULL DEFAULT '1' COMMENT '1 比赛进行中 0 比赛已经结束',
  `timeline` int(11) NOT NULL COMMENT '时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of jls_fights
-- ----------------------------
INSERT INTO `jls_fights` VALUES ('2', '5', '6', '5', '1473436800', '1', '1', '1', '0', '1470724151');
INSERT INTO `jls_fights` VALUES ('5', '1', '2', '1', '1471276800', '1', '1', '1', '0', '1470810611');
INSERT INTO `jls_fights` VALUES ('6', '7', '8', '0', '1473436800', '1', '1', '1', '1', '1470823516');
INSERT INTO `jls_fights` VALUES ('7', '4', '3', '0', '1471276800', '2', '1', '1', '1', '1470905946');
INSERT INTO `jls_fights` VALUES ('8', '5', '1', '0', '1469376000', '1', '1', '2', '1', '1470908555');

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
  `status` int(3) NOT NULL DEFAULT '1' COMMENT '状态',
  `etime` int(11) NOT NULL DEFAULT '0' COMMENT '报名结束时间',
  `verify_id` varchar(30) NOT NULL DEFAULT '0' COMMENT '验证方式',
  `timeline` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of jls_games
-- ----------------------------
INSERT INTO `jls_games` VALUES ('1', '1', '3', '1468899517', '3', '1', '1475942400', '2', '1468899528');
INSERT INTO `jls_games` VALUES ('2', '1', '3', '1469777850', '1', '1', '1475164800', '1', '1469777864');

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
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of jls_groups
-- ----------------------------
INSERT INTO `jls_groups` VALUES ('17', '1', '1', '1', '1', '1', '1470391764');
INSERT INTO `jls_groups` VALUES ('18', '1', '1', '1', '1', '2', '1470391764');
INSERT INTO `jls_groups` VALUES ('19', '1', '2', '1', '1', '3', '1470391764');
INSERT INTO `jls_groups` VALUES ('20', '1', '2', '1', '1', '4', '1470391764');
INSERT INTO `jls_groups` VALUES ('21', '1', '1', '1', '1', '5', '1470391764');
INSERT INTO `jls_groups` VALUES ('22', '1', '1', '1', '1', '6', '1470391764');
INSERT INTO `jls_groups` VALUES ('23', '1', '1', '1', '1', '7', '1470391764');
INSERT INTO `jls_groups` VALUES ('25', '1', '2', '1', '0', '8', '1470905253');
INSERT INTO `jls_groups` VALUES ('26', '1', '1', '2', '1', '5', '1470908415');
INSERT INTO `jls_groups` VALUES ('27', '1', '1', '2', '1', '1', '1470908415');

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
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of jls_items
-- ----------------------------
INSERT INTO `jls_items` VALUES ('1', '英雄联盟', 'attachment/jls/16/08/20160801185151735.png', '英雄联盟', '1,3', '1', '0');
INSERT INTO `jls_items` VALUES ('2', '王者荣耀', 'attachment/jls/16/08/20160801185151735.png', '王者荣耀', '1', '1', '0');
INSERT INTO `jls_items` VALUES ('4', '炉石传说', 'attachment/jls/16/08/20160801185151735.png', '炉石传说', '1', '1', '1470048721');

-- ----------------------------
-- Table structure for jls_log_login
-- ----------------------------
DROP TABLE IF EXISTS `jls_log_login`;
CREATE TABLE `jls_log_login` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `uid` varchar(20) NOT NULL,
  `ip` varchar(255) NOT NULL,
  `timeline` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of jls_log_login
-- ----------------------------

-- ----------------------------
-- Table structure for jls_news
-- ----------------------------
DROP TABLE IF EXISTS `jls_news`;
CREATE TABLE `jls_news` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL COMMENT '文章标题',
  `desc` varchar(255) NOT NULL COMMENT '描述',
  `logo` varchar(60) NOT NULL,
  `text` text COMMENT '文章内容',
  `cln_id` int(11) NOT NULL COMMENT '所属栏目',
  `timeline` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of jls_news
-- ----------------------------
INSERT INTO `jls_news` VALUES ('1', 'ceshi', 'dsadasd', 'attachment/jls/16/08/20160801185151735.png', '<p>adasdasdas<br/></p>', '7', '1468410272');
INSERT INTO `jls_news` VALUES ('2', 'ceshi', 'dsadasd', 'attachment/jls/16/08/20160801185151735.png', '<p>adasdasdas<br/></p>', '7', '1468410272');

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
  `tname` varchar(255) NOT NULL COMMENT '队伍名',
  `city` varchar(255) NOT NULL DEFAULT '' COMMENT '所在市',
  `status` int(3) NOT NULL DEFAULT '0' COMMENT '状态 0 未审核',
  `uid` varchar(20) NOT NULL DEFAULT '0' COMMENT '用户id',
  `name` varchar(255) NOT NULL DEFAULT '' COMMENT '联系人姓名',
  `descript` varchar(255) DEFAULT NULL COMMENT '简介',
  `phone` char(16) NOT NULL DEFAULT '' COMMENT '联系人电话',
  `info` varchar(255) DEFAULT NULL COMMENT '单位/学习 名称',
  `timeline` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of jls_teams
-- ----------------------------
INSERT INTO `jls_teams` VALUES ('1', '1', '0', '1号', '', '1', '1468919772559805', 'wangsir', null, '1861294064', null, '0');
INSERT INTO `jls_teams` VALUES ('2', '1', '0', '2号', '', '1', '1468919772559805', 'wangsir', null, '1861294064', null, '0');
INSERT INTO `jls_teams` VALUES ('3', '1', '0', '3号', '', '1', '1468919772559805', 'wangsir', null, '1861294064', null, '0');
INSERT INTO `jls_teams` VALUES ('4', '1', '0', '4号', '', '1', '1468919772559805', 'wangsir', null, '1861294064', null, '0');
INSERT INTO `jls_teams` VALUES ('5', '1', '0', '5号', '', '1', '1468919772559805', 'wangsir', null, '1861294064', null, '0');
INSERT INTO `jls_teams` VALUES ('6', '1', '0', '6号', '', '1', '1468919772559805', 'wangsir', null, '1861294064', null, '0');
INSERT INTO `jls_teams` VALUES ('7', '1', '0', '7号', '', '1', '1468919772559805', 'wangsir', null, '1861294064', null, '0');
INSERT INTO `jls_teams` VALUES ('8', '1', '0', '8号', '', '1', '1468919772559805', 'wangsir', null, '1861294064', null, '0');

-- ----------------------------
-- Table structure for jls_team_info
-- ----------------------------
DROP TABLE IF EXISTS `jls_team_info`;
CREATE TABLE `jls_team_info` (
  `id` int(11) NOT NULL,
  `tid` int(11) NOT NULL COMMENT 'team_id',
  `name` varchar(60) NOT NULL DEFAULT '0' COMMENT '姓名',
  `phone` int(11) NOT NULL COMMENT '手机号',
  `qq` varchar(20) DEFAULT NULL,
  `email` varchar(255) NOT NULL COMMENT '邮箱',
  `idcard` varchar(255) NOT NULL COMMENT '身份证',
  `idtype` varchar(3) DEFAULT NULL,
  `author_img` varchar(255) NOT NULL,
  `role` int(11) NOT NULL DEFAULT '0' COMMENT '0  队员  1 队长',
  `timeline` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of jls_team_info
-- ----------------------------
INSERT INTO `jls_team_info` VALUES ('1', '1', 'wangfuxu1', '1820103921', null, '', '', null, '', '1', '0');

-- ----------------------------
-- Table structure for jls_users
-- ----------------------------
DROP TABLE IF EXISTS `jls_users`;
CREATE TABLE `jls_users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `uid` varchar(20) NOT NULL COMMENT '手机',
  `phone` varchar(11) NOT NULL,
  `password` varchar(255) NOT NULL COMMENT '密码',
  `timeline` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `phone` (`phone`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of jls_users
-- ----------------------------
INSERT INTO `jls_users` VALUES ('1', '1468919673700375', '2147483647', '$P$BeLn2MZeQRX9mpdv6gymW0M3Qjt4mz/', '1468919673');
INSERT INTO `jls_users` VALUES ('2', '1468919772559805', '18201039216', '$P$BP1fUhJkSSQ1PoCV/rfTYmO8oAuoMq0', '1468919773');
INSERT INTO `jls_users` VALUES ('8', '1468920649277841', '18612940648', '$P$Bgb3GK.jgkq.INfTMjrdFJVZuLDsfJ0', '1468920649');

-- ----------------------------
-- Table structure for jls_user_auth
-- ----------------------------
DROP TABLE IF EXISTS `jls_user_auth`;
CREATE TABLE `jls_user_auth` (
  `id` int(11) NOT NULL,
  `gameid` int(11) NOT NULL,
  `uid` varchar(255) DEFAULT '0',
  `img` varchar(255) NOT NULL COMMENT '认证的图片',
  `ver_id` int(11) NOT NULL COMMENT '认证类型',
  `timeline` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of jls_user_auth
-- ----------------------------

-- ----------------------------
-- Table structure for jls_user_info
-- ----------------------------
DROP TABLE IF EXISTS `jls_user_info`;
CREATE TABLE `jls_user_info` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `uid` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL COMMENT '姓名',
  `sex` int(11) NOT NULL,
  `job` int(11) NOT NULL COMMENT '职业',
  `timleine` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of jls_user_info
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

-- ----------------------------
-- Table structure for jls_videos
-- ----------------------------
DROP TABLE IF EXISTS `jls_videos`;
CREATE TABLE `jls_videos` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL COMMENT '视频名称',
  `intr` varchar(255) NOT NULL COMMENT '介绍',
  `url` varchar(255) NOT NULL COMMENT '地址',
  `type` varchar(11) NOT NULL DEFAULT '0' COMMENT '1 热门',
  `status` int(11) NOT NULL DEFAULT '1' COMMENT '状态',
  `logo` varchar(255) NOT NULL COMMENT '视频截图',
  `sort` int(11) NOT NULL DEFAULT '1' COMMENT '排序',
  `item_id` int(11) NOT NULL COMMENT '所属项目',
  `timeline` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of jls_videos
-- ----------------------------
INSERT INTO `jls_videos` VALUES ('1', '王福旭', '312312666666666666666666666', 'http://player.youku.com/player.php/sid/XMTY0MjEyNjEyOA==/v.swf', '0', '1', '', '1', '1', '1469524069');
INSERT INTO `jls_videos` VALUES ('2', '周哈气', '312312', 'http://player.youku.com/player.php/Type/Folder/Fid/27456198/Ob/1/sid/XMTY1NDA3NzI0MA==/v.swf', '0', '1', '', '1', '2', '1469523846');
INSERT INTO `jls_videos` VALUES ('3', '周哈气', '3412312312312312312', 'http://player.youku.com/player.php/sid/XMTY0MjEyNjEyOA==/v.swf', '0', '1', '', '1', '1', '1469523868');
INSERT INTO `jls_videos` VALUES ('4', '炉石传说', 'dasdasdas', 'www.baidu.com', '0,1', '1', 'attachment/jls/16/08/20160801190816431.jpg', '1', '2', '1470050035');

-- ----------------------------
-- Table structure for jls_winteam
-- ----------------------------
DROP TABLE IF EXISTS `jls_winteam`;
CREATE TABLE `jls_winteam` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `fid` int(11) NOT NULL COMMENT '胜利队伍所书的对战id',
  `turn` int(11) NOT NULL,
  `gameid` int(11) NOT NULL,
  `teamid` int(11) NOT NULL,
  `timeline` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of jls_winteam
-- ----------------------------
INSERT INTO `jls_winteam` VALUES ('1', '2', '2', '1', '5', '1470822430');
INSERT INTO `jls_winteam` VALUES ('3', '5', '2', '1', '1', '1470822743');
