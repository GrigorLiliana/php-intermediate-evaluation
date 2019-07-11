-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jul 11, 2019 at 03:02 PM
-- Server version: 5.7.26
-- PHP Version: 7.2.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `real_estate`
--

-- --------------------------------------------------------

--
-- Table structure for table `housing`
--

DROP TABLE IF EXISTS `housing`;
CREATE TABLE IF NOT EXISTS `housing` (
  `id_housing` int(3) NOT NULL AUTO_INCREMENT,
  `title` varchar(20) NOT NULL,
  `adress` varchar(50) NOT NULL,
  `city` varchar(20) NOT NULL,
  `pc` int(4) NOT NULL,
  `area` int(6) NOT NULL,
  `price` int(20) NOT NULL,
  `photo` varchar(100) NOT NULL,
  `id_type` int(1) NOT NULL,
  `description` varchar(200) NOT NULL,
  PRIMARY KEY (`id_housing`),
  KEY `id_type` (`id_type`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `housing`
--

INSERT INTO `housing` (`id_housing`, `title`, `adress`, `city`, `pc`, `area`, `price`, `photo`, `id_type`, `description`) VALUES
(1, 'maison', 'belval', 'belval', 4819, 451, 100000, 'image_01', 1, 'qsdfqdfs'),
(2, 'maison', 'rodange', 'rodange', 4521, 24, 5454, 'photo.jpeg', 2, '354'),
(8, 'qdfg', 'lili', 'sdfg', 1455, 2, 2, 'uploads/NumericALL_Logo.jpg', 2, 'dgh'),
(7, 'qdfg', 'lili', 'sdfg', 1455, 1, 1, 'uploads/NumericALL_Logo.jpg', 2, 'dgh');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
