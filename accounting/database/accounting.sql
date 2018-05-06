-- phpMyAdmin SQL Dump
-- version phpStudy 2014
-- http://www.phpmyadmin.net
--
-- 主机: localhost
-- 生成日期: 2018 ?05 ?06 ?10:15
-- 服务器版本: 5.5.53
-- PHP 版本: 5.6.27

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- 数据库: `accounting`
--
CREATE DATABASE `accounting` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `accounting`;

-- --------------------------------------------------------

--
-- 表的结构 `acc_account`
--

CREATE TABLE IF NOT EXISTS `acc_account` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `a_user` varchar(255) NOT NULL DEFAULT '' COMMENT '用户标识，直接是用户名名字',
  `money` decimal(9,2) NOT NULL DEFAULT '0.00' COMMENT '收入&支出金额',
  `account` enum('收入','支出') NOT NULL DEFAULT '支出' COMMENT '收支类型',
  `a_cols` varchar(255) NOT NULL DEFAULT '' COMMENT '取用分类表中的类目id',
  `a_info` text COMMENT '收支备注信息',
  `a_date` date NOT NULL DEFAULT '0000-00-00' COMMENT '收支时间',
  `a_finallydate` datetime DEFAULT '0000-00-00 00:00:00' COMMENT '最后修改时间',
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COMMENT='账单表' AUTO_INCREMENT=182 ;

-- --------------------------------------------------------

--
-- 表的结构 `acc_classify`
--

CREATE TABLE IF NOT EXISTS `acc_classify` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `cols_user` varchar(255) NOT NULL DEFAULT '' COMMENT '用户标识，直接是用户的名字',
  `cols` varchar(255) NOT NULL DEFAULT '' COMMENT '类目字段',
  `cols_account` enum('收入','支出') NOT NULL DEFAULT '支出' COMMENT '收支类型',
  `cols_info` text COMMENT '类目备注信息',
  `cols_date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT '创建分类时间',
  `cols_finallydate` datetime DEFAULT '0000-00-00 00:00:00' COMMENT '最后一次修改类别的时间',
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COMMENT='分类表' AUTO_INCREMENT=24 ;

-- --------------------------------------------------------

--
-- 表的结构 `acc_total`
--

CREATE TABLE IF NOT EXISTS `acc_total` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `year` varchar(255) NOT NULL DEFAULT '' COMMENT '年份',
  `January` decimal(9,2) NOT NULL DEFAULT '0.00' COMMENT '一月某类别的金额统计',
  `February` decimal(9,2) NOT NULL DEFAULT '0.00' COMMENT '二月某类别的金额统计',
  `March` decimal(9,2) NOT NULL DEFAULT '0.00' COMMENT '三月某类别的金额统计',
  `April` decimal(9,2) NOT NULL DEFAULT '0.00' COMMENT '四月某类别的金额统计',
  `May` decimal(9,2) NOT NULL DEFAULT '0.00' COMMENT '五月某类别的金额统计',
  `June` decimal(9,2) NOT NULL DEFAULT '0.00' COMMENT '六月某类别的金额统计',
  `July` decimal(9,2) NOT NULL DEFAULT '0.00' COMMENT '七月某类别的金额统计',
  `August` decimal(9,2) NOT NULL DEFAULT '0.00' COMMENT '八月某类别的金额统计',
  `September` decimal(9,2) NOT NULL DEFAULT '0.00' COMMENT '九月某类别的金额统计',
  `October` decimal(9,2) NOT NULL DEFAULT '0.00' COMMENT '十月某类别的金额统计',
  `November` decimal(9,2) NOT NULL DEFAULT '0.00' COMMENT '十一月某类别的金额统计',
  `December` decimal(9,2) NOT NULL DEFAULT '0.00' COMMENT '十二月某类别的金额统计',
  `t_cols` varchar(255) NOT NULL DEFAULT '' COMMENT '类目',
  `t_user` varchar(255) NOT NULL DEFAULT '' COMMENT '用户标识',
  `total` decimal(9,2) NOT NULL DEFAULT '0.00' COMMENT '一年统计某类别的金额统计',
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='账目统计表' AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `acc_user`
--

CREATE TABLE IF NOT EXISTS `acc_user` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL DEFAULT '' COMMENT '用户名',
  `password` varchar(255) NOT NULL DEFAULT '' COMMENT '用户密码',
  `ask` varchar(255) DEFAULT NULL COMMENT '用户找回密码时的问题',
  `verify` varchar(255) DEFAULT NULL COMMENT '用于用户找回密码时的验证信息',
  `sex` enum('男','女') DEFAULT NULL COMMENT '用户性别',
  `date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT '用户注册时间',
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COMMENT='账单管理系统中用户表' AUTO_INCREMENT=3 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
