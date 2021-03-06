CREATE TABLE `zdm_admin` (
  `id` bigint(20) NOT NULL DEFAULT 0 COMMENT '主键id',
  `encode_id` varchar(2048) NOT NULL DEFAULT '' COMMENT '管理员加密ID',
  `name` varchar(64) NOT NULL DEFAULT '' COMMENT '管理员姓名',
  `nickname` varchar(64) NOT NULL DEFAULT '' COMMENT '管理员昵称',
  `status` tinyint(4) NOT NULL DEFAULT 1 COMMENT '管理员状态 0 - 正常 1 - 待审核 2 - 禁用 3 - 审核不通过 4 - 删除',
  `role` tinyint(4) NOT NULL DEFAULT 1 COMMENT '管理员角色 1 - 超级管理员 2 - 普通管理员',
  `password` char(32) NOT NULL DEFAULT '' COMMENT '管理员密码',
  `mail` varchar(64) NOT NULL DEFAULT '' COMMENT '管理员邮箱',
  `salt` varchar(32) NOT NULL DEFAULT '' COMMENT '管理员私钥',
  `phone` varchar(15) NOT NULL DEFAULT '' COMMENT '管理员手机号',
  `create_time` bigint(20) NOT NULL DEFAULT  unix_timestamp(now())  COMMENT '管理员创建时间',
  `create_admin_id` bigint(20) NOT NULL DEFAULT 0 COMMENT '添加当前用户的管理员ID',
  `update_admin_id` bigint(20) NOT NULL DEFAULT 0 COMMENT '更新当前管理员信息的管理员ID',
  `create_ip` varchar(32) NOT NULL DEFAULT '' COMMENT '创建IP',
  `last_login_ip` varchar(32) NOT NULL DEFAULT '' COMMENT '上一次登录IP',
  `last_login_time` bigint(20) NOT NULL DEFAULT  unix_timestamp(now())  COMMENT '上一次登录时间',
  `db_time` bigint(20) NOT NULL DEFAULT  unix_timestamp(now())  COMMENT '数据上一次被更新时间，业务无关',
  `login_times` int(11) NOT NULL DEFAULT 0 COMMENT '累计登录次数',
  PRIMARY KEY (`id`),
  UNIQUE KEY `admin_mail` (`mail`),
  UNIQUE KEY `admin_phone` (`phone`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='管理员信息表'