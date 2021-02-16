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
-- 資料表結構 `order_product`
--

CREATE TABLE `order_product` (
  `cOrder_num` int(6) UNSIGNED ZEROFILL NOT NULL,
  `cID` tinyint(4) UNSIGNED ZEROFILL NOT NULL,
  `cNumber` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `cBuy_item` int(5) UNSIGNED NOT NULL,
  `cAddress` varchar(2000) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- 傾印資料表的資料 `order_product`
--

INSERT INTO `order_product` (`cOrder_num`, `cID`, `cNumber`, `cBuy_item`, `cAddress`) VALUES
(916277, 0001, 'CJ0277-100-25A\r\n						', 2, '台北市大安區新生南路一段103巷44-1號5樓'),
(916277, 0001, 'CJ0277-100-28\r\n						', 2, '台北市大安區新生南路一段103巷44-1號5樓'),
(338235, 0003, 'CJ0277-002-25A\r\n						', 1, '台北市大安區忠孝東路三段1號'),
(338235, 0003, 'CJ0277-002-27A\r\n						', 1, '台北市大安區忠孝東路三段1號');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
