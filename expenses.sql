-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Nov 25, 2015 at 06:43 AM
-- Server version: 5.5.41-0ubuntu0.14.04.1
-- PHP Version: 5.5.9-1ubuntu4.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `expenses`
--

-- --------------------------------------------------------

--
-- Table structure for table `cat_exp`
--

CREATE TABLE IF NOT EXISTS `cat_exp` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `comm` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=15 ;

--
-- Dumping data for table `cat_exp`
--

INSERT INTO `cat_exp` (`id`, `name`, `comm`) VALUES
(1, 'Еда\r\n', ''),
(2, 'Сигареты\r\n', ''),
(3, 'Кот\r\n', ''),
(4, 'Жилье\r\n', ''),
(5, 'Кредитка\r\n', ''),
(6, 'Телефон\r\n', ''),
(7, 'Интернет\r\n', ''),
(8, 'Отдых\r\n', ''),
(9, 'Выпивка\r\n', ''),
(10, 'Праздники\r\n', ''),
(11, 'Вещи\r\n', ''),
(12, 'Проезд\r\n', ''),
(13, 'Разное\r\n', ''),
(14, 'Машина', '');

-- --------------------------------------------------------

--
-- Table structure for table `cat_inc`
--

CREATE TABLE IF NOT EXISTS `cat_inc` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `comm` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `cat_inc`
--

INSERT INTO `cat_inc` (`id`, `name`, `comm`) VALUES
(1, 'Зарплата Ден', ''),
(2, 'Зарплата Оля', '');

-- --------------------------------------------------------

--
-- Table structure for table `exp`
--

CREATE TABLE IF NOT EXISTS `exp` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `cat_id` int(11) NOT NULL,
  `quant` int(11) NOT NULL,
  `price` float NOT NULL,
  `sum` float NOT NULL,
  `date` date NOT NULL,
  `comm` text NOT NULL,
  PRIMARY KEY (`id`),
  KEY `cat_id` (`cat_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=24 ;

--
-- Dumping data for table `exp`
--

INSERT INTO `exp` (`id`, `name`, `cat_id`, `quant`, `price`, `sum`, `date`, `comm`) VALUES
(3, 'Нонстоп', 9, 2, 24, 48, '2015-09-10', ''),
(4, 'ываыва в', 1, 3, 34, 102, '2015-09-24', ''),
(5, 'dfsdfsdf', 1, 2, 23, 46, '2015-09-09', ''),
(6, 'dfsdfsdf', 1, 2, 23, 46, '2015-09-09', ''),
(7, 'dfsdfsdf', 1, 2, 23, 46, '2015-09-09', ''),
(8, '2343234', 1, 2, 23, 49, '2015-08-31', ''),
(18, 'tretr', 1, 4, 45, 180, '2015-09-01', ''),
(19, 'dfdsfdf', 1, 3, 2, 6, '2015-09-11', ''),
(20, 'redbull', 9, 1, 24, 24, '2015-10-03', ''),
(21, 'ываываыва', 3, 2, 34.4, 68.8, '2015-10-03', ''),
(22, 'Кенты', 2, 1, 23, 23, '2015-10-06', ''),
(23, 'Парламент', 2, 1, 123, 123, '2015-09-11', '');

-- --------------------------------------------------------

--
-- Table structure for table `inc`
--

CREATE TABLE IF NOT EXISTS `inc` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `cat_id` int(11) NOT NULL,
  `sum` float NOT NULL,
  `date` date NOT NULL,
  `comm` text NOT NULL,
  PRIMARY KEY (`id`),
  KEY `cat_id` (`cat_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=23 ;

--
-- Dumping data for table `inc`
--

INSERT INTO `inc` (`id`, `name`, `cat_id`, `sum`, `date`, `comm`) VALUES
(22, 'Зарплата', 1, 1333, '2015-10-07', '');

-- --------------------------------------------------------

--
-- Table structure for table `plan`
--

CREATE TABLE IF NOT EXISTS `plan` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_cat_exp` int(11) NOT NULL,
  `period` date NOT NULL,
  `sum` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `plan`
--

INSERT INTO `plan` (`id`, `id_cat_exp`, `period`, `sum`) VALUES
(1, 1, '2015-10-01', 100),
(2, 2, '2015-10-01', 200),
(3, 3, '2015-10-01', 300),
(4, 4, '2015-10-01', 400),
(5, 2, '2015-07-15', 777),
(6, 9, '2015-10-06', 250),
(8, 14, '2015-10-06', 123123);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
