-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- 主機： 127.0.0.1
-- 產生時間： 2023-02-17 08:07:11
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
-- 建立時間： 2023-02-17 01:25:10
--

DROP TABLE IF EXISTS `member`;
CREATE TABLE `member` (
  `mbr_id` int(11) NOT NULL,
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

INSERT INTO `member` (`mbr_id`, `mbr_account`, `mbr_pwd`, `mbr_name`, `mbr_sex`, `mbr_capability`, `mbr_birthday`, `mbr_phone`, `news_sub`) VALUES
(1, 'asdf', '$2y$10$75dM6uMm3FdhipO7GwgGN.tnZYb.7696dlj/wd37RM2FzaTxs4ePG', 'qaz', 'w', 'art rd', '1981', '0900000000', ''),
(2, 'qqq', '$2y$10$EvsRHkKTDnV6vmCYJn8/8uglTRYGVa5M4zj8yDQc/gw5EZeqdfRw.', 'www', 'm', 'web', '1983', '0922', '1');

-- --------------------------------------------------------

--
-- 資料表結構 `message`
--
-- 建立時間： 2023-02-17 06:30:44
-- 最後更新： 2023-02-17 06:42:01
--

DROP TABLE IF EXISTS `message`;
CREATE TABLE `message` (
  `mbr_id` int(11) NOT NULL,
  `mbr_account` varchar(10) NOT NULL,
  `content` text NOT NULL,
  `create_at` varchar(50) NOT NULL,
  `content_id` int(11) NOT NULL,
  `edit_time` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 資料表新增資料前，先清除舊資料 `message`
--

TRUNCATE TABLE `message`;
--
-- 傾印資料表的資料 `message`
--

INSERT INTO `message` (`mbr_id`, `mbr_account`, `content`, `create_at`, `content_id`, `edit_time`) VALUES
(1, 'asdf', 'fafe', '2023-02-17 14:31:12', 20, '2023-02-17 14:31:12'),
(1, 'asdf', '46431435', '2023-02-17 14:33:27', 21, '2023-02-17 14:33:27'),
(1, 'asdf', 'gshr464', '2023-02-17 14:33:37', 22, '2023-02-17 14:33:37'),
(2, 'qqq', 'faaefaef123', '2023-02-17 14:33:50', 23, '2023-02-17 14:34:48'),
(2, 'qqq', 'af53w4f5qqq', '2023-02-17 14:33:54', 24, '2023-02-17 14:42:01');

--
-- 已傾印資料表的索引
--

--
-- 資料表索引 `member`
--
ALTER TABLE `member`
  ADD PRIMARY KEY (`mbr_id`),
  ADD UNIQUE KEY `mbr_account` (`mbr_account`);

--
-- 資料表索引 `message`
--
ALTER TABLE `message`
  ADD PRIMARY KEY (`content_id`);

--
-- 在傾印的資料表使用自動遞增(AUTO_INCREMENT)
--

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `member`
--
ALTER TABLE `member`
  MODIFY `mbr_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `message`
--
ALTER TABLE `message`
  MODIFY `content_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
