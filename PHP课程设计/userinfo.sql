-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- 主机: localhost
-- 生成日期: 2022 年 06 月 18 日 02:48
-- 服务器版本: 5.6.12-log
-- PHP 版本: 5.4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- 数据库: `user`
--

-- --------------------------------------------------------

--
-- 表的结构 `userinfo`
--

CREATE TABLE IF NOT EXISTS `userinfo` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `E_mail` varchar(25) NOT NULL,
  `username` varchar(25) NOT NULL,
  `password` varchar(35) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `E_mail` (`E_mail`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1000000034 ;

--
-- 转存表中的数据 `userinfo`
--

INSERT INTO `userinfo` (`id`, `E_mail`, `username`, `password`) VALUES
(1000000001, '2270429389@qq.com', 'kxyrm', 'e10adc3949ba59abbe56e057f20f883e'),
(1000000021, '123@qq.com', 'k', '202cb962ac59075b964b07152d234b70'),
(1000000033, '12345', 'liu', 'e10adc3949ba59abbe56e057f20f883e');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
