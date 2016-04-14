-- phpMyAdmin SQL Dump
-- version 4.5.5.1
-- http://www.phpmyadmin.net
--
-- 主機: localhost
-- 產生時間： 2016 年 04 月 14 日 12:07
-- 伺服器版本: 5.5.47-0ubuntu0.14.04.1
-- PHP 版本： 5.5.9-1ubuntu4.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 資料庫： `simon`
--

-- --------------------------------------------------------

--
-- 資料表結構 `uploadurl`
--

CREATE TABLE `uploadurl` (
  `NAME` varchar(50) NOT NULL,
  `ORG` varchar(200) NOT NULL,
  `SH_URL` varchar(5) NOT NULL,
  `UP_TIME` varchar(20) NOT NULL,
  `TIMES` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 資料表的匯出資料 `uploadurl`
--

INSERT INTO `uploadurl` (`NAME`, `ORG`, `SH_URL`, `UP_TIME`, `TIMES`) VALUES
('12456', 'https://github.com/', 'l3WXl', '2016-04-14 11:23:48', 0),
('pow', 'http://www.w3school.com.cn/php/func_math_pow.asp', 'BYsHO', '2016-04-14 11:39:52', 1);

--
-- 已匯出資料表的索引
--

--
-- 資料表索引 `uploadurl`
--
ALTER TABLE `uploadurl`
  ADD PRIMARY KEY (`NAME`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
