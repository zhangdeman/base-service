CREATE TABLE `blog_user` (
  `id` bigint(20) unsigned NOT NULL DEFAULT 0 COMMENT '主键ID',
  `phone` varchar(15) NOT NULL DEFAULT '' COMMENT '手机号',
  `mail` varchar(64) NOT NULL DEFAULT '' COMMENT '邮箱',
  `name` varchar(64) NOT NULL DEFAULT '' COMMENT '昵称',
  `password` char(32) NOT NULL DEFAULT '' COMMENT '密码',
  `salt` varchar(64) NOT NULL DEFAULT '' COMMENT '加密私钥',
  `status` tinyint(4) NOT NULL DEFAULT 0 COMMENT '用户状态 0 - 正常 1 - 注销',
  `create_time` bigint(20) NOT NULL DEFAULT 0 COMMENT '用户注册时间',
  `update_time` bigint(20) NOT NULL DEFAULT 0 COMMENT '上次更新时间',
  `last_login_time` bigint(20) NOT NULL DEFAULT 0 COMMENT '上次登录时间',
  `last_login_ip` varchar(20) NOT NULL DEFAULT '' COMMENT '上次登录IP',
  PRIMARY KEY (`id`),
  UNIQUE KEY `key_phone_status` (`phone`,`status`),
  UNIQUE KEY `key_mail_status` (`mail`,`status`),
  KEY `index_login_phone` (`phone`,`password`),
  KEY `index_login_mail` (`mail`,`password`),
  KEY `index_create_time` (`create_time`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='用户信息表';