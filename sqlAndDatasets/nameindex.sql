-- phpMyAdmin SQL Dump
-- version 2.11.9.4
-- http://www.phpmyadmin.net
--
-- 主机: oniddb
-- 生成日期: 2018 年 03 月 12 日 18:47
-- 服务器版本: 5.5.58
-- PHP 版本: 5.2.6-1+lenny16

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- 数据库: `hezhi-db`
--

-- --------------------------------------------------------

--
-- 表的结构 `nameindex`
--

CREATE TABLE IF NOT EXISTS `nameindex` (
  `id` int(7) NOT NULL AUTO_INCREMENT,
  `name` varchar(75) CHARACTER SET utf8 NOT NULL,
  `tripid` int(5) DEFAULT NULL,
  `zomatoid` int(4) DEFAULT NULL,
  `yelpid` int(7) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=15 ;

--
-- 导出表中的数据 `nameindex`
--

INSERT INTO `nameindex` (`id`, `name`, `tripid`, `zomatoid`, `yelpid`) VALUES
(1, 'Cervantes', 4449, 46, NULL),
(2, 'Amir', 3034, 47, NULL),
(3, 'Shirley', 3065, 58, NULL),
(4, 'Country''s Barbecue', 8998, 201, NULL),
(5, 'Famous Dave''s', 4620, 480, NULL),
(8, 'Loudons Cafe & Bakery', NULL, 9358, 15780),
(9, 'Bentoya', NULL, 9368, 21705),
(10, 'El Cartel', NULL, 9363, 22936),
(11, 'Hard Rock Cafe', NULL, 9365, 26377),
(12, 'Civerinos', 18001, 9369, 28151);
