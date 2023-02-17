-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- 主機： 127.0.0.1
-- 產生時間： 2023-02-15 09:14:49
-- 伺服器版本： 10.4.20-MariaDB
-- PHP 版本： 8.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 資料庫: `test`
--
CREATE DATABASE IF NOT EXISTS `test` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `test`;

-- --------------------------------------------------------

--
-- 資料表結構 `member`
--
-- 建立時間： 2023-02-15 07:19:23
-- 最後更新： 2023-02-15 07:47:39
--

DROP TABLE IF EXISTS `member`;
CREATE TABLE `member` (
  `mbr_account` varchar(10) CHARACTER SET utf8 NOT NULL,
  `mbr_pwd` varchar(100) CHARACTER SET utf8 NOT NULL,
  `mbr_name` varchar(10) CHARACTER SET utf8 NOT NULL,
  `mbr_sex` char(1) CHARACTER SET utf8 NOT NULL,
  `mbr_capability` varchar(50) CHARACTER SET utf8 NOT NULL,
  `mbr_birthday` char(4) CHARACTER SET utf8 NOT NULL,
  `mbr_phone` char(10) CHARACTER SET utf8 NOT NULL,
  `news_sub` char(1) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- 資料表新增資料前，先清除舊資料 `member`
--

TRUNCATE TABLE `member`;
--
-- 傾印資料表的資料 `member`
--

INSERT INTO `member` (`mbr_account`, `mbr_pwd`, `mbr_name`, `mbr_sex`, `mbr_capability`, `mbr_birthday`, `mbr_phone`, `news_sub`) VALUES
('asdf', '$2y$10$75dM6uMm3FdhipO7GwgGN.tnZYb.7696dlj/wd37RM2FzaTxs4ePG', 'qaz', 'w', 'art rd', '1981', '0900000000', ''),
('qqq', '$2y$10$EvsRHkKTDnV6vmCYJn8/8uglTRYGVa5M4zj8yDQc/gw5EZeqdfRw.', 'www', 'm', 'web', '1983', '0922', '1');

--
-- 已傾印資料表的索引
--

--
-- 資料表索引 `member`
--
ALTER TABLE `member`
  ADD PRIMARY KEY (`mbr_account`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
