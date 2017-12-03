CREATE TABLE `zdm_article` (
  `id` bigint(20) NOT NULL DEFAULT 0 COMMENT '主键id',
  `admin_id` BIGINT(20) NOT NULL DEFAULT 0 COMMENT '管理员ID',
  `status` TINYINT NOT NULL DEFAULT 0 COMMENT '0 - 正常 1 - 审核中 2 - 删除 3 - 举报',
  `html_content` TEXT NOT NULL DEFAULT '' COMMENT '带格式的文章内容',
  `text_content` TEXT NOT NULL DEFAULT '' COMMENT '纯文本文章内容',
  `parent_kind` TINYINT NOT NULL DEFAULT 0 COMMENT '父级分类',
  `son_kind`  TINYINT NOT NULL DEFAULT 0 COMMENT '子分类',
  `create_ip` VARCHAR(20) NOT NULL DEFAULT '' COMMENT '发布文章的客户端IP',
  `create_time` BIGINT(20) NOT NULL DEFAULT unix_timestamp(now()) COMMENT '创建时间',
  `db_time` bigint(20) NOT NULL DEFAULT  unix_timestamp(now())  COMMENT '数据上一次被更新时间，业务无关',
  PRIMARY KEY (`id`),
  UNIQUE INDEX `article_id` (`id`),
  INDEX `article_create_time` (`create_time`),
  INDEX `article_author_id` (`admin_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='管理员信息表'