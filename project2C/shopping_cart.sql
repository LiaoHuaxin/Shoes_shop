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
-- 資料表結構 `shopping_cart`
--

CREATE TABLE `shopping_cart` (
  `cID` tinyint(4) UNSIGNED ZEROFILL NOT NULL,
  `cNumber` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `cBuy_item` int(3) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- 傾印資料表的資料 `shopping_cart`
--

INSERT INTO `shopping_cart` (`cID`, `cNumber`, `cBuy_item`) VALUES
(0002, 'CJ0277-100-27', 2),
(0002, 'CJ0277-100-29', 2),
(0002, 'CJ0277-001-25A', 1),
(0002, 'CJ0277-001-27', 1),
(0002, 'CJ0277-001-28A', 1),
(0002, 'CJ0277-100-25', 1),
(0002, 'CJ0277-100-25A', 1),
(0002, 'CJ0277-100-26', 1),
(0002, 'CJ0277-100-26A', 1),
(0002, 'CJ0277-100-27A', 1),
(0002, 'CJ0277-100-28', 1),
(0002, 'CJ0277-100-28A', 1);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
