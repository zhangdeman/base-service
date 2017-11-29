CREATE TABLE `zdm_admin_passport` (
  `id` bigint(20) NOT NULL DEFAULT 0 COMMENT '主键id',
  `admin_id` BIGINT NOT NULL DEFAULT 0 COMMENT '管理员ID',
  `admin_phone` VARCHAR(13) NOT NULL DEFAULT '' COMMENT '管理员手机号',
  `admin_mail`  VARCHAR(64) NOT NULL DEFAULT '' COMMENT '管理员邮箱',
  `admin_role` TINYINT NOT NULL DEFAULT 0 COMMENT '管理员角色',
  `ticket_status` TINYINT NOT NULL DEFAULT 0 COMMENT 'ticket 状态 0 - 正常 1 - 失效',
  `admin_ticket` varchar(1024) NOT NULL DEFAULT '' COMMENT '管理员登录凭证',
  `create_time` BIGINT NOT NULL DEFAULT current_timestamp() COMMENT '创建时间',
  PRIMARY KEY (`id`),
  UNIQUE KEY `admin_mail` (`mail`),
  UNIQUE KEY `admin_phone` (`phone`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='登录信息表';