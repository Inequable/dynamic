## 需要自己创建一个数据库，详细见thinkPHP的配置文件

#
# Structure for table "acc_account"
#

CREATE TABLE `acc_account` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `a_user` varchar(255) NOT NULL DEFAULT '' COMMENT '用户标识，直接是用户名名字',
  `money` decimal(9,2) NOT NULL DEFAULT '0.00' COMMENT '收入&支出金额',
  `account` enum('收入','支出') NOT NULL DEFAULT '支出' COMMENT '收支类型',
  `a_cols` varchar(255) NOT NULL DEFAULT '' COMMENT '取用分类表中的类目',
  `a_info` text COMMENT '收支备注信息',
  `a_date` date NOT NULL DEFAULT '0000-00-00' COMMENT '收支时间',
  `a_finallydate` datetime DEFAULT '0000-00-00 00:00:00' COMMENT '最后修改时间',
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8 COMMENT='账单表';

#
# Structure for table "acc_classify"
#

CREATE TABLE `acc_classify` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `cols_user` varchar(255) NOT NULL DEFAULT '' COMMENT '用户标识，直接是用户的名字',
  `cols` varchar(255) NOT NULL DEFAULT '' COMMENT '类目字段',
  `cols_account` enum('收入','支出') NOT NULL DEFAULT '支出' COMMENT '收支类型',
  `cols_info` text COMMENT '类目备注信息',
  `cols_date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT '创建分类时间',
  `cols_finallydate` datetime DEFAULT '0000-00-00 00:00:00' COMMENT '最后一次修改类别的时间',
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8 COMMENT='分类表';

#
# Structure for table "acc_log"
#

CREATE TABLE `acc_log` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `adate` timestamp NULL DEFAULT CURRENT_TIMESTAMP COMMENT '记录导出日志时自动插入时间',
  `ip` varchar(255) DEFAULT NULL COMMENT '记录导出的ip服务端与客户端的ip，用--分割',
  `condition` varchar(255) DEFAULT NULL COMMENT '导出的条件，是以那个条件导出数据的',
  `l_user` varchar(255) DEFAULT NULL COMMENT '导出用户名称',
  PRIMARY KEY (`Id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='导出日志';

#
# Structure for table "acc_user"
#

CREATE TABLE `acc_user` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL DEFAULT '' COMMENT '用户名',
  `password` varchar(255) NOT NULL DEFAULT '' COMMENT '用户密码',
  `ask` varchar(255) DEFAULT NULL COMMENT '用户找回密码时的问题',
  `verify` varchar(255) DEFAULT NULL COMMENT '用于用户找回密码时的验证信息',
  `sex` enum('男','女') DEFAULT NULL COMMENT '用户性别',
  `date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT '用户注册时间',
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8 COMMENT='账单管理系统中用户表';

## 测试用户自己添加，不需要加密，娱乐而已，若有需要，可以自己在程序里添加这一功能
