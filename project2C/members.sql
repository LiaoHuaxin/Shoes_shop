-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- 主機： 127.0.0.1
-- 產生時間： 
-- 伺服器版本： 10.4.11-MariaDB
-- PHP 版本： 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 資料庫： `nike`
--

-- --------------------------------------------------------

--
-- 資料表結構 `members`
--

CREATE TABLE `members` (
  `cID` tinyint(4) UNSIGNED ZEROFILL NOT NULL,
  `cName` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `cAccount` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `cPassword` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `cSex` enum('F','M') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'F',
  `cBirthday` date NOT NULL,
  `cPhone` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `cEmail` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- 傾印資料表的資料 `members`
--

INSERT INTO `members` (`cID`, `cName`, `cAccount`, `cPassword`, `cSex`, `cBirthday`, `cPhone`, `cEmail`) VALUES
(0001, '葉柏陞', 'yabro', '12345', 'M', '2020-06-26', '0800092000', 'yabro@gmail.com'),
(0002, '周天鈞', 'tangent', '12345', 'M', '2020-06-27', '0800636363', 'tangent@gmail.com'),
(0003, '廖華鑫', 'huaxin', '12345', 'M', '2020-06-28', '4129889', 'huaxin@gmail.com'),
(0004, '黃鉉珊', 'xuanshan', '12345', 'M', '2020-06-29', '8825252', 'xuanshan@gmail.com'),
(0005, '李明哲', 'mingze', '12345', 'M', '2020-06-30', '55688', 'mingze@gmail.com'),
(0006, '黃明清', 'mingqing', '12345', 'M', '2020-07-01', '0227712171', 'qingge@gmail.com');

--
-- 已傾印資料表的索引
--

--
-- 資料表索引 `members`
--
ALTER TABLE `members`
  ADD PRIMARY KEY (`cID`);

--
-- 在傾印的資料表使用自動遞增(AUTO_INCREMENT)
--

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `members`
--
ALTER TABLE `members`
  MODIFY `cID` tinyint(4) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
