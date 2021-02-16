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
-- 資料表結構 `goods`
--

CREATE TABLE `goods` (
  `cNumber` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `cShoeName` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `cSize` float UNSIGNED NOT NULL,
  `cInventory` int(5) UNSIGNED NOT NULL,
  `cPrice` int(5) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- 傾印資料表的資料 `goods`
--

INSERT INTO `goods` (`cNumber`, `cShoeName`, `cSize`, `cInventory`, `cPrice`) VALUES
('CJ0277-100-25', 'Nike React Phantom Run Flyknit 2 TW/黑/PP/白', 25, 20, 4480),
('CJ0277-100-25A', 'Nike React Phantom Run Flyknit 2 TW/黑/PP/白', 25.5, 20, 4480),
('CJ0277-100-26', 'Nike React Phantom Run Flyknit 2 TW/黑/PP/白', 26, 20, 4480),
('CJ0277-100-26A', 'Nike React Phantom Run Flyknit 2 TW/黑/PP/白', 26.5, 20, 4480),
('CJ0277-100-27', 'Nike React Phantom Run Flyknit 2 TW/黑/PP/白', 27, 20, 4480),
('CJ0277-100-27A', 'Nike React Phantom Run Flyknit 2 TW/黑/PP/白', 27.5, 20, 4480),
('CJ0277-100-28', 'Nike React Phantom Run Flyknit 2 TW/黑/PP/白', 28, 20, 4480),
('CJ0277-100-28A', 'Nike React Phantom Run Flyknit 2 TW/黑/PP/白', 28.5, 20, 4480),
('CJ0277-100-29', 'Nike React Phantom Run Flyknit 2 TW/黑/PP/白', 29, 20, 4480),
('CJ0277-002-25', 'Nike React Phantom Run Flyknit 2 黑/RO/GS/白', 25, 20, 4480),
('CJ0277-002-25A', 'Nike React Phantom Run Flyknit 2 黑/RO/GS/白', 25.5, 20, 4480),
('CJ0277-002-26', 'Nike React Phantom Run Flyknit 2 黑/RO/GS/白', 26, 20, 4480),
('CJ0277-002-26A', 'Nike React Phantom Run Flyknit 2 黑/RO/GS/白', 26.5, 20, 4480),
('CJ0277-002-27', 'Nike React Phantom Run Flyknit 2 黑/RO/GS/白', 27, 20, 4480),
('CJ0277-002-27A', 'Nike React Phantom Run Flyknit 2 黑/RO/GS/白', 27.5, 20, 4480),
('CJ0277-002-28', 'Nike React Phantom Run Flyknit 2 黑/RO/GS/白', 28, 20, 4480),
('CJ0277-002-28A', 'Nike React Phantom Run Flyknit 2 黑/RO/GS/白', 28.5, 20, 4480),
('CJ0277-002-29', 'Nike React Phantom Run Flyknit 2 黑/RO/GS/白', 29, 20, 4480),
('CJ0277-001-25', 'Nike React Phantom Run Flyknit 2 黑/白', 25, 20, 4480),
('CJ0277-001-25A', 'Nike React Phantom Run Flyknit 2 黑/白', 25.5, 20, 4480),
('CJ0277-001-26', 'Nike React Phantom Run Flyknit 2 黑/白', 26, 20, 4480),
('CJ0277-001-26A', 'Nike React Phantom Run Flyknit 2 黑/白', 26.5, 20, 4480),
('CJ0277-001-27', 'Nike React Phantom Run Flyknit 2 黑/白', 27, 20, 4480),
('CJ0277-001-27A', 'Nike React Phantom Run Flyknit 2 黑/白', 27.5, 20, 4480),
('CJ0277-001-28', 'Nike React Phantom Run Flyknit 2 黑/白', 28, 20, 4480),
('CJ0277-001-28A', 'Nike React Phantom Run Flyknit 2 黑/白', 28.5, 20, 4480),
('CJ0277-001-29', 'Nike React Phantom Run Flyknit 2 黑/白', 29, 20, 4480);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
