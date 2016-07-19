--
-- 表的结构 `admin_column`
--

CREATE TABLE IF NOT EXISTS `admin_column` (
  `id` tinyint(2) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(30) NOT NULL DEFAULT '' COMMENT '板块名称',
  `pid` tinyint(1) unsigned NOT NULL COMMENT '父id',
  `url` varchar(200) DEFAULT NULL COMMENT 'url',
  `type` char(50) NOT NULL DEFAULT '' COMMENT '类别',
  `flag` int(1) NOT NULL DEFAULT '0' COMMENT '特殊标记',
  `order` int(3) NOT NULL COMMENT '排序',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 ;


INSERT INTO `admin_column` (`id`, `name`, `pid`, `url`, `type`, `flag`, `order`) VALUES
(10, '系统管理', 0, '', 'admin', 0, 1),
(11, '权限组', 10, 'admin/admin_role_list', 'admin_role_list', 0, 1),
(12, '管理员列表', 10, 'admin/admin_list', 'admin_list', 0, 2),
(13, '登录日志', 10, 'admin/admin_login_log_list', 'admin_login_log_list', 0, 3),
(14, '操作日志', 10, 'admin/admin_optlog_list', 'admin_optlog_list', 0, 4),
(50, '用户管理', 0, NULL, 'us', 0, 1),
(51, '用户列表', 50, 'user/list', 'us_list', 0, 1),
(52, '栏目管理', 0, NULL, 'aa', 0, 1),
(53, '添加栏目', 52, 'menus/index', 'dd', 0, 2),
(71, '出入库管理', 0, '', 'gold', 0, 1),
(72, '库存列表', 71, 'gold/gold_list', 'gold_list', 0, 1),
(73, '出库列表', 71, 'gold/outbound_list', 'outbound_list', 0, 1),
(74, '金价管理', 0, '', 'goldprice', 0, 1),
(75, '每日金价', 74, 'goldprice/every_price', 'every_price', 0, 1),
(76, '交易管理', 0, '', 'trading', 0, 1),
(77, '交易记录', 76, 'trading/trading_record', 'trading_record', 0, 1),
(78, '提金列表', 76, 'trading/theorder_list', 'theorder_list', 0, 1),
(80, '认证管理', 0, '', 'certification', 0, 1),
(81, '实名认证', 80, 'certification/real_name', 'real_name', 0, 1),
(82, 'P2P管理', 0, '', 'p2p', 0, 1),
(83, 'P2P列表', 82, 'p2p/p2plist', 'p2plist', 0, 1);
(84, '提现管理', '0', '', 'cash', '0', '1');
(85, '提现列表', '82', 'cash/carry_cash', 'carry_cash', '0', '1');
(86, '申请列表', '82', 'cash/apply_for', 'apply_for', '0', '1');

-- admin,admin_role_list,admin_role_list_a,admin_role_list_d,admin_role_list_e,admin_role_list_v,admin_list,admin_list_a,admin_list_d,admin_list_e,admin_list_v,admin_login_log_list,admin_login_log_list_a,admin_login_log_list_d,admin_login_log_list_e,admin_login_log_list_v,admin_optlog_list,admin_optlog_list_a,admin_optlog_list_d,admin_optlog_list_e,admin_optlog_list_v

-- admin,admin_role_list,admin_role_list_a,admin_role_list_d,admin_role_list_e,admin_role_list_v,admin_list,admin_list_a,admin_list_d,admin_list_e,admin_list_v,admin_login_log_list,admin_login_log_list_a,admin_login_log_list_d,admin_login_log_list_e,admin_login_log_list_v,admin_optlog_list,admin_optlog_list_a,admin_optlog_list_d,admin_optlog_list_e,admin_optlog_list_v,sms,sms_list,sms_list_a,sms_list_d,sms_list_e,sms_list_v,message_name,message_name_a,message_name_d,message_name_e,message_name_v,message_list,message_list_a,message_list_d,message_list_e,message_list_v,sms_message,sms_message_a,sms_message_d,sms_message_e,sms_message_v,us,us_list,us_list_a,us_list_d,us_list_e,us_list_v,group,group_list,group_list_a,group_list_d,group_list_e,group_list_v,group_one_article_list,group_one_article_list_a,group_one_article_list_d,group_one_article_list_e,group_one_article_list_v,group_comment_list,group_comment_list_a,group_comment_list_d,group_comment_list_e,group_comment_list_v,ca,ca_list,ca_list_a,ca_list_d,ca_list_e,ca_list_v,ca_category,ca_category_a,ca_category_d,ca_category_e,ca_category_v,resource,resource_list,resource_list_a,resource_list_d,resource_list_e,resource_list_v,resource_comment_list,resource_comment_list_a,resource_comment_list_d,resource_comment_list_e,resource_comment_list_v,case,case_list,case_list_a,case_list_d,case_list_e,case_list_v,consulting,lawyer_list,lawyer_list_a,lawyer_list_d,lawyer_list_e,lawyer_list_v,legal_list,legal_list_a,legal_list_d,legal_list_e,legal_list_v,article,article_cat,article_cat_a,article_cat_d,article_cat_e,article_cat_v,activity,activity,activity_a,activity_d,activity_e,activity_v,tc,tc_list,tc_list_a,tc_list_d,tc_list_e,tc_list_v

-- --------------------------------------------------------

--
-- 表的结构 `admin_loginlog`
--

CREATE TABLE IF NOT EXISTS `admin_loginlog` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(15) NOT NULL DEFAULT '',
  `ip` varchar(20) NOT NULL DEFAULT '',
  `dateline` int(11) unsigned NOT NULL DEFAULT '0',
  `error` varchar(100) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 ;

-- --------------------------------------------------------

--
-- 表的结构 `admin_optlog`
--

CREATE TABLE IF NOT EXISTS `admin_optlog` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `uid` varchar(15) NOT NULL DEFAULT '0',
  `name` varchar(15) NOT NULL DEFAULT '',
  `ip` varchar(20) NOT NULL DEFAULT '',
  `otime` int(11) unsigned NOT NULL DEFAULT '0',
  `opt` varchar(255) NOT NULL DEFAULT '',
  `act` tinyint(4) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 ;

-- --------------------------------------------------------

--
-- 表的结构 `admin_role`
--

CREATE TABLE IF NOT EXISTS `admin_role` (
  `id` int(2) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(30) NOT NULL DEFAULT '' COMMENT '权限组名称',
  `role` text COMMENT '角色权限',
  `flag` int(1) NOT NULL DEFAULT '0' COMMENT '特殊标记',
  `dateline` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 ;
INSERT INTO `admin_role` (`id`, `title`, `role`, `flag`, `dateline`) VALUES
(1, 'admin', 'admin,admin_role_list,admin_role_list_a,admin_role_list_d,admin_role_list_e,admin_role_list_v,admin_list,admin_list_a,admin_list_d,admin_list_e,admin_list_v,admin_login_log_list,admin_login_log_list_a,admin_login_log_list_d,admin_login_log_list_e,admin_login_log_list_v,admin_optlog_list,admin_optlog_list_a,admin_optlog_list_d,admin_optlog_list_e,admin_optlog_list_v,sms,sms_list,sms_list_a,sms_list_d,sms_list_e,sms_list_v,message_name,message_name_a,message_name_d,message_name_e,message_name_v,message_list,message_list_a,message_list_d,message_list_e,message_list_v,sms_message,sms_message_a,sms_message_d,sms_message_e,sms_message_v,us,us_list,us_list_a,us_list_d,us_list_e,us_list_v,group,group_list,group_list_a,group_list_d,group_list_e,group_list_v,group_one_article_list,group_one_article_list_a,group_one_article_list_d,group_one_article_list_e,group_one_article_list_v,group_comment_list,group_comment_list_a,group_comment_list_d,group_comment_list_e,group_comment_list_v,ca,ca_list,ca_list_a,ca_list_d,ca_list_e,ca_list_v,ca_category,ca_category_a,ca_category_d,ca_category_e,ca_category_v,resource,resource_list,resource_list_a,resource_list_d,resource_list_e,resource_list_v,resource_comment_list,resource_comment_list_a,resource_comment_list_d,resource_comment_list_e,resource_comment_list_v,case,case_list,case_list_a,case_list_d,case_list_e,case_list_v,consulting,lawyer_list,lawyer_list_a,lawyer_list_d,lawyer_list_e,lawyer_list_v,legal_list,legal_list_a,legal_list_d,legal_list_e,legal_list_v,article,article_cat,article_cat_a,article_cat_d,article_cat_e,article_cat_v,activity,activity,activity_a,activity_d,activity_e,activity_v,tc,tc_list,tc_list_a,tc_list_d,tc_list_e,tc_list_v', 0, 1405921709);
INSERT INTO admin_role VALUES ('2', '出入库管理', 'gold,gold_list,gold_list_a,gold_list_d,gold_list_e,gold_list_v,outbound_list,outbound_list_a,outbound_list_d,outbound_list_e,outbound_list_v', '0', '1413878645');
INSERT INTO admin_role VALUES ('3', '财务', 'gold,gold_list,gold_list_v,goldprice,every_price,every_price_a,every_price_d,every_price_e,every_price_v', '0', '1413887668');

-- --------------------------------------------------------

--
-- 表的结构 `admin_user`
--

CREATE TABLE IF NOT EXISTS `admin_user` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `uid` char(15) NOT NULL DEFAULT '' COMMENT 'user id',
  `username` varchar(50) NOT NULL DEFAULT '' COMMENT '用户名',
  `phone` char(11) NOT NULL DEFAULT '' COMMENT '手机号码',
  `pwd` char(34) NOT NULL DEFAULT '' COMMENT 'password',
  `dateline` int(11) NOT NULL DEFAULT '0' COMMENT '注册时间',
  `flag` char(20) NOT NULL COMMENT '唯一标识，登录时直接存到用户cookie，下次自动登录验证。10位时间戳+10位随机字符',
  `status` int(2) NOT NULL DEFAULT '9' COMMENT '权限 0 已删除 ，9后台用户',
  `role_id` int(2) DEFAULT NULL COMMENT '权限组id',
  PRIMARY KEY (`uid`),
  KEY `id` (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='用户登录验证' ;
INSERT INTO `admin_user` (`uid`, `username`, `pwd`, `flag`, `role_id`) VALUES
('141127111718179', 'admin', '$P$B.MCuYTNVFDwcir23XO49o0.Z7nVPP0', '1405921746SjsgPm9efh', '1');

