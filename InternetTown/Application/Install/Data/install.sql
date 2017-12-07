SET FOREIGN_KEY_CHECKS = 0;

-- ------------------------------
-- Table structure for admin_user.
-- ------------------------------
DROP TABLE IF EXISTS `wb_admin_user`;
CREATE TABLE `wb_admin_user` (
  `id`           INT(10)      NOT NULL AUTO_INCREMENT,
  `gid`          INT(10)               DEFAULT 1
  COMMENT '管理员级别',
  `username`     VARCHAR(20)  NOT NULL
  COMMENT '登陆名',
  `password`     VARCHAR(128) NOT NULL
  COMMENT '登陆密码',
  `last_login`   INT(10)      NOT NULL
  COMMENT '最后登陆时间',
  `created_time` INT(10)      NOT NULL
  COMMENT '账户添加时间',
  `login_count`  INT(10)               DEFAULT 0
  COMMENT '登录次数',
  PRIMARY KEY (`id`)
)
  ENGINE = InnoDB
  DEFAULT CHARSET = utf8
  COMMENT '管理员表';


DROP TABLE IF EXISTS `wb_user`;
CREATE TABLE `wb_user` (
  `id`         INT(10)      NOT NULL AUTO_INCREMENT,
  `openid`     VARCHAR(128) NOT NULL
  COMMENT '公众号粉丝ID',
  `nickname`   VARCHAR(20)           DEFAULT ''
  COMMENT '用户昵称',
  `headimgurl` VARCHAR(255)          DEFAULT ''
  COMMENT '头像',
  `sex`        TINYINT(1)            DEFAULT 1
  COMMENT '性别',
  `language`   VARCHAR(10)           DEFAULT ''
  COMMENT '语言',
  `city`       VARCHAR(10)           DEFAULT ''
  COMMENT '城市',
  `province`   VARCHAR(10)           DEFAULT ''
  COMMENT '省份',
  `country`    VARCHAR(10)           DEFAULT '中国'
  COMMENT '国家',
  PRIMARY KEY (`id`)
)
  ENGINE = InnoDB
  DEFAULT CHARSET = utf8
  COMMENT '粉丝用户表';

-- ------------------------------
-- Table structure for admin_group.
-- ------------------------------
DROP TABLE IF EXISTS `wb_admin_group`;
CREATE TABLE `wb_admin_group` (
  `id`   INT(10)     NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(10) NOT NULL
  COMMENT '组名',
  PRIMARY KEY (`id`)
)
  ENGINE = InnoDB
  DEFAULT CHARSET = utf8
  COMMENT '管理员组';

INSERT INTO `wb_admin_group` VALUES (1, '超级管理员');
INSERT INTO `wb_admin_group` VALUES (2, '管理员');

-- ------------------------------
-- Table structure for admin_group.
-- ------------------------------
DROP TABLE IF EXISTS `wb_permission`;
CREATE TABLE `wb_permission` (
  `id`    INT(10)     NOT NULL AUTO_INCREMENT,
  `value` VARCHAR(15) NOT NULL
  COMMENT '权限',
  PRIMARY KEY (`id`)
)
  ENGINE InnoDB
  DEFAULT CHARSET = utf8
  COMMENT '权限表';

INSERT INTO `wb_permission` VALUES (1, 'admin_add');
INSERT INTO `wb_permission` VALUES (2, 'admin_edit');
INSERT INTO `wb_permission` VALUES (3, 'admin_del');
INSERT INTO `wb_permission` VALUES (4, 'article_add');
INSERT INTO `wb_permission` VALUES (5, 'article_edit');
INSERT INTO `wb_permission` VALUES (6, 'article_del');
INSERT INTO `wb_permission` VALUES (7, 'ticket_add');
INSERT INTO `wb_permission` VALUES (8, 'ticket_edit');
INSERT INTO `wb_permission` VALUES (9, 'ticket_del');
INSERT INTO `wb_permission` VALUES (10, 'sight_add');
INSERT INTO `wb_permission` VALUES (11, 'sight_edit');
INSERT INTO `wb_permission` VALUES (12, 'sight_del');
INSERT INTO `wb_permission` VALUES (13, 'finance_add');
INSERT INTO `wb_permission` VALUES (14, 'finance_edit');
INSERT INTO `wb_permission` VALUES (15, 'finance_del');
INSERT INTO `wb_permission` VALUES (16, 'group_add');
INSERT INTO `wb_permission` VALUES (17, 'group_edit');
INSERT INTO `wb_permission` VALUES (18, 'group_del');
INSERT INTO `wb_permission` VALUES (19, 'category_add');
INSERT INTO `wb_permission` VALUES (20, 'category_edit');
INSERT INTO `wb_permission` VALUES (21, 'category_del');

-- ------------------------------
-- Table structure for admin_group.
-- ------------------------------
DROP TABLE IF EXISTS `wb_admin_permission`;
CREATE TABLE `wb_admin_permission` (
  `id`  INT(10) NOT NULL AUTO_INCREMENT,
  `uid` INT(10) NOT NULL
  COMMENT '管理员ID',
  `pid` INT(10) NOT NULL
  COMMENT '权限ID',
  PRIMARY KEY (`id`)
)
  ENGINE = InnoDB
  DEFAULT CHARSET = utf8
  COMMENT '管理权限表';

-- ------------------------------
-- Table structure for category.
-- ------------------------------
DROP TABLE IF EXISTS `wb_category`;
CREATE TABLE `wb_category` (
  `id`        INT(10)     NOT NULL AUTO_INCREMENT,
  `parent_id` INT(10)              DEFAULT 0
  COMMENT '父分类ID',
  `name`      VARCHAR(20) NOT NULL
  COMMENT '分类名称',
  PRIMARY KEY (`id`)
)
  ENGINE = InnoDB
  DEFAULT CHARSET = utf8
  COMMENT '多级分类记录表';

INSERT INTO `wb_category` VALUES (1, 0, '会议类型');
INSERT INTO `wb_category` VALUES (2, 0, '门票种类');
INSERT INTO `wb_category` VALUES (3, 0, '微刊类型');
INSERT INTO `wb_category` VALUES (4, 0, '景点类型');

-- ------------------------------
-- Table structure for meeting.
-- ------------------------------
DROP TABLE IF EXISTS `wb_meet`;
CREATE TABLE `wb_meet` (
  `id`         INT(10) NOT NULL AUTO_INCREMENT,
  `subject`    VARCHAR(50)      DEFAULT ''
  COMMENT '会议主题',
  `content`    TEXT
  COMMENT '会议内容',
  `start_time` INT(10) NOT NULL
  COMMENT '会议开始时间',
  `end_time`   INT(10) NOT NULL
  COMMENT '会试结束时间',
  PRIMARY KEY (`id`)
)
  ENGINE = InnoDB
  DEFAULT CHARSET = utf8
  COMMENT '会议表';

-- ------------------------------
-- Table structure for sight.
-- ------------------------------
DROP TABLE IF EXISTS `wb_sight`;
CREATE TABLE `wb_sight` (
  `id`   INT(10)     NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(20) NOT NULL
  COMMENT '景点名称',
  PRIMARY KEY (`id`)
)
  ENGINE = InnoDB
  DEFAULT CHARSET = utf8
  COMMENT '景点信息录入表';

-- ------------------------------
-- Table structure for sight_info.
-- ------------------------------
DROP TABLE IF EXISTS `wb_sight_info`;
CREATE TABLE `wb_sight_info` (
  `id`         INT(10)     NOT NULL AUTO_INCREMENT,
  `name`       VARCHAR(20) NOT NULL
  COMMENT '景点名称',
  `content`    TEXT        NOT NULL
  COMMENT '景点说明',
  `qrcode_url` VARCHAR(50)          DEFAULT ''
  COMMENT '二维码',
  PRIMARY KEY (`id`)
)
  ENGINE = InnoDB
  DEFAULT CHARSET = utf8
  COMMENT '电子导游信息录入表';

-- ------------------------------
-- Table structure for qr_code_scaned.
-- ------------------------------
DROP TABLE IF EXISTS `wb_scan_qr_code_log`;
CREATE TABLE `wb_scan_qr_code_log` (
  `id`      INT(10) NOT NULL AUTO_INCREMENT,
  `uid`     INT(10) NOT NULL
  COMMENT '扫描的用户',
  `info_id` INT(10) NOT NULL
  COMMENT '扫描的节点',
  PRIMARY KEY (`id`)
)
  ENGINE = InnoDB
  DEFAULT CHARSET = utf8
  COMMENT '景点扫描记录表';

-- ------------------------------
-- Table structure for ticket.
-- ------------------------------
DROP TABLE IF EXISTS `wb_ticket`;
CREATE TABLE `wb_ticket` (
  `id`           INT(10) NOT NULL AUTO_INCREMENT,
  `billcode`     VARCHAR(20)      DEFAULT ''
  COMMENT '发票代码',
  `ticket_name`  VARCHAR(20)      DEFAULT ''
  COMMENT '票名',
  `ticket_pic`   TEXT
  COMMENT '票面图',
  `ticket_price` DECIMAL(10, 2)   DEFAULT 0.00
  COMMENT '票价',
  `add_time`     INT(10) NOT NULL
  COMMENT '添加日期',
  `sight_info`   TEXT COMMENT '景点特色',
  `warning`      TEXT COMMENT '购票须知',
  PRIMARY KEY (`id`)
)
  ENGINE = InnoDB
  DEFAULT CHARSET = utf8
  COMMENT '票据信息';

-- ------------------------------
-- Table structure for buy_ticket_log.  -- order
-- ------------------------------
DROP TABLE IF EXISTS `wb_buy_ticket_log`;
CREATE TABLE `wb_buy_ticket_log` (
  `id`            INT(10) NOT NULL AUTO_INCREMENT,
  `out_refund_no` VARCHAR(50)      DEFAULT ''
  COMMENT '退款单号',
  `trade_no`      VARCHAR(20)      DEFAULT ''
  COMMENT '订单号',
  `openid`        VARCHAR(255)     DEFAULT ''
  COMMENT '购买用户OPENID',
  `t_name`        VARCHAR(20)      DEFAULT ''
  COMMENT '购买的票名',
  `single_price`  DECIMAL(10, 2)   DEFAULT 0.00
  COMMENT '单价',
  `use_time`      INT(10)          DEFAULT 0
  COMMENT '出行日期',
  `count`         INT(10)          DEFAULT 0
  COMMENT '购买数量',
  `customer`      VARCHAR(10)      DEFAULT ''
  COMMENT '出行人名称',
  `phone`         VARCHAR(20)      DEFAULT ''
  COMMENT '出行人手机号',
  `price`         DECIMAL(10, 2)   DEFAULT 0.00
  COMMENT '总价',
  `ticket_sn`     INT(6)           DEFAULT 0
  COMMENT '取票号',
  `buy_time`      INT(10)          DEFAULT 0
  COMMENT '下单日期',
  `status`        TINYINT(1)       DEFAULT 0
  COMMENT '交易状态 0.未付款，1.已付款（交易成功），2.未使用，3.退款，4.已退款',
  PRIMARY KEY (`id`)
)
  ENGINE = InnoDB
  DEFAULT CHARSET = utf8
  COMMENT '购买记录-购票订单';

-- ------------------------------
-- Table structure for micro_article.
-- ------------------------------
DROP TABLE IF EXISTS `wb_micro_article`;
CREATE TABLE `wb_micro_article` (
  `id`             INT(10)     NOT NULL AUTO_INCREMENT,
  `title`          VARCHAR(20) NOT NULL
  COMMENT '微刊标题',
  `author`         VARCHAR(20) NOT NULL
  COMMENT '作者ID-管理员ID',
  `category`       VARCHAR(20)          DEFAULT 0
  COMMENT '分类',
  `content`        TEXT        NOT NULL
  COMMENT '内容',
  `status`         TINYINT(1)           DEFAULT 0
  COMMENT '审核状态， 0待审核，1为审核通过',
  `created_time`   INT(10)     NOT NULL
  COMMENT '添加时间',
  `published_time` INT(10)     NOT NULL
  COMMENT '发布时间',
  PRIMARY KEY (`id`)
)
  ENGINE = InnoDB
  DEFAULT CHARSET = utf8
  COMMENT '微刊数据记录表';

-- ------------------------------
-- Table structure for interface.
-- ------------------------------
DROP TABLE IF EXISTS `wb_interface`;
CREATE TABLE `wb_interface` (
  `id`       INT(10)     NOT NULL AUTO_INCREMENT,
  `name`     VARCHAR(20) NOT NULL
  COMMENT '接口名称',
  `url`      VARCHAR(255)         DEFAULT ''
  COMMENT '接口链接',
  `add_time` INT(10)     NOT NULL
  COMMENT '接口添加时间',
  `params`   VARCHAR(255)         DEFAULT ''
  COMMENT '接口参数',
  `status`   TINYINT(1)           DEFAULT 1
  COMMENT '接口是否启用，0未启用，1已启用',
  PRIMARY KEY (`id`)
)
  ENGINE = InnoDB
  DEFAULT CHARSET = utf8
  COMMENT '第三方接口记录';

-- ------------------------------
-- Table structure for staticfiles.
-- ------------------------------
DROP TABLE IF EXISTS `wb_staticfiles`;
CREATE TABLE `wb_staticfiles` (
  `id`       INT(10)      NOT NULL AUTO_INCREMENT,
  `md5`      VARCHAR(32)  NOT NULL
  COMMENT '唯一编码值，验重',
  `add_time` INT(10)      NOT NULL
  COMMENT '添加时间',
  `filetype` TINYINT(1)            DEFAULT 0
  COMMENT '0图片，1文件，2音频，3视频，4其他',
  `path`     VARCHAR(255) NOT NULL
  COMMENT '文件路径',
  `size`     INT(10)      NOT NULL
  COMMENT '文件大小',
  `status`   TINYINT(1)            DEFAULT 1
  COMMENT '1启用，0禁用',
  PRIMARY KEY (`id`)
)
  ENGINE = InnoDB
  DEFAULT CHARSET = utf8
  COMMENT '静态资源记录';


