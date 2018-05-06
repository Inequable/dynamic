-- phpMyAdmin SQL Dump
-- version phpStudy 2014
-- http://www.phpmyadmin.net
--
-- ����: localhost
-- ��������: 2018 ?05 ?06 ?10:15
-- �������汾: 5.5.53
-- PHP �汾: 5.6.27

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- ���ݿ�: `accounting`
--
CREATE DATABASE `accounting` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `accounting`;

-- --------------------------------------------------------

--
-- ��Ľṹ `acc_account`
--

CREATE TABLE IF NOT EXISTS `acc_account` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `a_user` varchar(255) NOT NULL DEFAULT '' COMMENT '�û���ʶ��ֱ�����û�������',
  `money` decimal(9,2) NOT NULL DEFAULT '0.00' COMMENT '����&֧�����',
  `account` enum('����','֧��') NOT NULL DEFAULT '֧��' COMMENT '��֧����',
  `a_cols` varchar(255) NOT NULL DEFAULT '' COMMENT 'ȡ�÷�����е���Ŀid',
  `a_info` text COMMENT '��֧��ע��Ϣ',
  `a_date` date NOT NULL DEFAULT '0000-00-00' COMMENT '��֧ʱ��',
  `a_finallydate` datetime DEFAULT '0000-00-00 00:00:00' COMMENT '����޸�ʱ��',
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COMMENT='�˵���' AUTO_INCREMENT=182 ;

-- --------------------------------------------------------

--
-- ��Ľṹ `acc_classify`
--

CREATE TABLE IF NOT EXISTS `acc_classify` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `cols_user` varchar(255) NOT NULL DEFAULT '' COMMENT '�û���ʶ��ֱ�����û�������',
  `cols` varchar(255) NOT NULL DEFAULT '' COMMENT '��Ŀ�ֶ�',
  `cols_account` enum('����','֧��') NOT NULL DEFAULT '֧��' COMMENT '��֧����',
  `cols_info` text COMMENT '��Ŀ��ע��Ϣ',
  `cols_date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT '��������ʱ��',
  `cols_finallydate` datetime DEFAULT '0000-00-00 00:00:00' COMMENT '���һ���޸�����ʱ��',
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COMMENT='�����' AUTO_INCREMENT=24 ;

-- --------------------------------------------------------

--
-- ��Ľṹ `acc_total`
--

CREATE TABLE IF NOT EXISTS `acc_total` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `year` varchar(255) NOT NULL DEFAULT '' COMMENT '���',
  `January` decimal(9,2) NOT NULL DEFAULT '0.00' COMMENT 'һ��ĳ���Ľ��ͳ��',
  `February` decimal(9,2) NOT NULL DEFAULT '0.00' COMMENT '����ĳ���Ľ��ͳ��',
  `March` decimal(9,2) NOT NULL DEFAULT '0.00' COMMENT '����ĳ���Ľ��ͳ��',
  `April` decimal(9,2) NOT NULL DEFAULT '0.00' COMMENT '����ĳ���Ľ��ͳ��',
  `May` decimal(9,2) NOT NULL DEFAULT '0.00' COMMENT '����ĳ���Ľ��ͳ��',
  `June` decimal(9,2) NOT NULL DEFAULT '0.00' COMMENT '����ĳ���Ľ��ͳ��',
  `July` decimal(9,2) NOT NULL DEFAULT '0.00' COMMENT '����ĳ���Ľ��ͳ��',
  `August` decimal(9,2) NOT NULL DEFAULT '0.00' COMMENT '����ĳ���Ľ��ͳ��',
  `September` decimal(9,2) NOT NULL DEFAULT '0.00' COMMENT '����ĳ���Ľ��ͳ��',
  `October` decimal(9,2) NOT NULL DEFAULT '0.00' COMMENT 'ʮ��ĳ���Ľ��ͳ��',
  `November` decimal(9,2) NOT NULL DEFAULT '0.00' COMMENT 'ʮһ��ĳ���Ľ��ͳ��',
  `December` decimal(9,2) NOT NULL DEFAULT '0.00' COMMENT 'ʮ����ĳ���Ľ��ͳ��',
  `t_cols` varchar(255) NOT NULL DEFAULT '' COMMENT '��Ŀ',
  `t_user` varchar(255) NOT NULL DEFAULT '' COMMENT '�û���ʶ',
  `total` decimal(9,2) NOT NULL DEFAULT '0.00' COMMENT 'һ��ͳ��ĳ���Ľ��ͳ��',
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='��Ŀͳ�Ʊ�' AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- ��Ľṹ `acc_user`
--

CREATE TABLE IF NOT EXISTS `acc_user` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL DEFAULT '' COMMENT '�û���',
  `password` varchar(255) NOT NULL DEFAULT '' COMMENT '�û�����',
  `ask` varchar(255) DEFAULT NULL COMMENT '�û��һ�����ʱ������',
  `verify` varchar(255) DEFAULT NULL COMMENT '�����û��һ�����ʱ����֤��Ϣ',
  `sex` enum('��','Ů') DEFAULT NULL COMMENT '�û��Ա�',
  `date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT '�û�ע��ʱ��',
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COMMENT='�˵�����ϵͳ���û���' AUTO_INCREMENT=3 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
