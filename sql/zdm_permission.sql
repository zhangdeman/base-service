CREATE TABLE `zdm_permission` (
  `id` bigint(20) NOT NULL DEFAULT 0 COMMENT '主键id',
  `name` varchar(64) NOT NULL DEFAULT '' COMMENT '权限名称',
  `desc`  VARCHAR(128) NOT NULL DEFAULT '' COMMENT '权限描述',
  `status` tinyint(4) NOT NULL DEFAULT 1 COMMENT '管理员状态 0 - 正常 1 - 删除',
  `real_controller` varchar(64) NOT NULL DEFAULT '' COMMENT '真实的控制器名',
  `is_show_left` TINYINT(1) NOT NULL DEFAULT 0 COMMENT '是否在侧边栏展示 0 - 是 1 - 否',
  `real_action` varchar(64) NOT NULL DEFAULT '' COMMENT '真实的方法名',
  `request_uri` varchar(128) NOT NULL DEFAULT '' COMMENT '请求的uri',
  `parent_id`  BIGINT(20) NOT NULL DEFAULT 0 COMMENT '父权限ID',
  `create_time` bigint(20) NOT NULL DEFAULT  0  COMMENT '管理员创建时间',
  `update_time` bigint(20) NOT NULL DEFAULT  0  COMMENT '管理员创建时间',
  `create_admin_id` bigint(20) NOT NULL DEFAULT 0 COMMENT '添加当前用户的管理员ID',
  `update_admin_id` bigint(20) NOT NULL DEFAULT 0 COMMENT '更新当前管理员信息的管理员ID',
  PRIMARY KEY (`id`),
  INDEX `permission_status` (`status`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='权限信息表';