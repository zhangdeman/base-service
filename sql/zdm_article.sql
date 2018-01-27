CREATE TABLE `zdm_article` (
  `id` bigint(20) NOT NULL DEFAULT 0 COMMENT '主键id',
  `admin_id` BIGINT(20) NOT NULL DEFAULT 0 COMMENT '管理员ID',
  `status` TINYINT NOT NULL DEFAULT 0 COMMENT '0 - 正常 1 - 审核中 2 - 删除 3 - 举报',
  `html_content` TEXT NOT NULL COMMENT '带格式的文章内容',
  `title` VARCHAR(256) NOT NULL DEFAULT '' COMMENT '文章标题',
  `text_content` TEXT NOT NULL COMMENT '纯文本文章内容',
  `parent_kind` BIGINT(20) NOT NULL DEFAULT 0 COMMENT '父级分类',
  `son_kind`  BIGINT(20) NOT NULL DEFAULT 0 COMMENT '子分类',
  `read_count` INT NOT NULL DEFAULT 0 COMMENT '阅读次数',
  `create_ip` VARCHAR(20) NOT NULL DEFAULT '' COMMENT '发布文章的客户端IP',
  `create_time` BIGINT(20) NOT NULL DEFAULT 0 COMMENT '创建时间',
  `db_time` bigint(20) NOT NULL DEFAULT  0  COMMENT '数据上一次被更新时间，业务无关',
PRIMARY KEY (`id`),
UNIQUE INDEX `article_id` (`id`),
INDEX `article_create_time` (`create_time`),
INDEX `article_author_id` (`admin_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='文章信息表'