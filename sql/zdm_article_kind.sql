CREATE TABLE `zdm_article_kind` (
    `id` bigint(20) NOT NULL DEFAULT 0 COMMENT '主键ID',
    `parent_id` bigint(20) NOT NULL DEFAULT 0 COMMENT '父级ID',
    `title` VARCHAR (32) NOT NULL DEFAULT '' COMMENT '标题',
    `status` tinyint (32) NOT NULL DEFAULT 0 COMMENT '0 - 正常 1 - 删除',
    `is_show` TINYINT(1) NOT NULL DEFAULT 1 COMMENT '是否在前端展示 0 - 不显示 1 - 显示',
    `create_admin_id` bigint(20) NOT NULL DEFAULT 0 COMMENT '添加的管理员ID',
    `create_time` bigint(20) NOT NULL DEFAULT 0 COMMENT '添加时间',
    `update_time` BIGINT(20) NOT NULL DEFAULT 0 COMMENT '更新时间',
    `db_time` bigint(20) NOT NULL DEFAULT 0 COMMENT '数据库最后一次更新时间',
    PRIMARY KEY (`id`),
    UNIQUE INDEX `article_kind_id` (`id`),
    INDEX `article_kind_create_time` (`create_time`),
    INDEX `article_kind_admin` (`create_admin_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='文章类别表';
alter table zdm_article_kind add column `update_time` bigint(20) NOT NULL DEFAULT '0' COMMENT '更新时间';
alter table zdm_article_kind add column `is_show` tinyint(1) NOT NULL DEFAULT 1 COMMENT '是否在前端展示 0 - 不显示 1 - 显示';
