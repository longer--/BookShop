/** 创建用户表 */
/**DROP TABLE IF EXISTS `stc_user`;*/
CREATE TABLE IF NOT EXISTS `stc_user`(
    `id` INT(10) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT '用户ID：用户表主键，自增',
    `username` VARCHAR(32) BINARY NOT NULL COMMENT '用户名',
    `password` VARCHAR(32) BINARY NOT NULL COMMENT '密码',
    `email` VARCHAR(32) NOT NULL COMMENT '电子邮箱',
    `verified` BOOLEAN NOT NULL DEFAULT 0 COMMENT '是否已验证：判断邮箱是否被验证',
    `rec_date` INT(10) UNSIGNED NOT NULL COMMENT '记录日期：时间戳',
    PRIMARY KEY(`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

/** 创建商品表 */
/**DROP TABLE IF EXISTS `stc_goods`;*/
CREATE TABLE IF NOT EXISTS `stc_goods`(
    `id` INT(10) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT '商品ID：商品表主键，自增',
    `attr_id` VARCHAR(255) NOT NULL DEFAULT '' COMMENT '属性ID：商品属性表主键，多个逗号分割',
    PRIMARY KEY(`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

/**
 * 商品关联表
 * 
 */

/** 创建商品属性表 */
/**DROP TABLE IF EXISTS `stc_goods_attr`;*/
CREATE TABLE IF NOT EXISTS `stc_goods`(
    /**`id` INT(10) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT '商品属性ID：商品属性主键，自增',*/
    PRIMARY KEY(`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
