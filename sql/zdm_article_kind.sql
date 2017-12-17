CREATE TABLE `zdm_article_kind` (
    `id` bigint(20) NOT NULL DEFAULT 0 COMMENT '主键ID',
    `parent_id` bigint(20) NOT NULL DEFAULT 0 COMMENT '父级ID',
    `title` VARCHAR (32) NOT NULL DEFAULT '' COMMENT '标题',
    `status` tinyint (32) NOT NULL DEFAULT 0 COMMENT '0 - 正常 1 - 删除',
    `create_admin_id` bigint(20) NOT NULL DEFAULT 0 COMMENT '添加的管理员ID',
    `create_time` bigint(20) NOT NULL DEFAULT 0 COMMENT '添加时间',
    `db_time` bigint(20) NOT NULL DEFAULT 0 COMMENT '数据库最后一次更新时间',
    PRIMARY KEY (`id`),
    UNIQUE INDEX `article_kind_id` (`id`),
    INDEX `article_kind_create_time` (`create_time`),
    INDEX `article_kind_admin` (`create_admin_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='文章类别表';