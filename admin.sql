-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Mar 30, 2014 at 04:05 AM
-- Server version: 5.5.27
-- PHP Version: 5.4.7

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `bon_appetit`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `admin_id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `restaurant_id` int(11) NOT NULL,
  PRIMARY KEY (`admin_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `username`, `password`, `email`, `restaurant_id`) VALUES
(1, 'capricorn', 'e10adc3949ba59abbe56e057f20f883e', 'capricorn@gmail.com', 1),
(2, 'korai_gost', 'e10adc3949ba59abbe56e057f20f883e', 'korai_gost@gmail.com', 2),
(3, 'china_kitchen', 'e10adc3949ba59abbe56e057f20f883e', 'china_kitchen@gmail.com', 3),
(4, 'star', 'e10adc3949ba59abbe56e057f20f883e', 'star@gmail.com', 4),
(5, 'apple_inn', 'e10adc3949ba59abbe56e057f20f883e', 'apple_inn@gmail.com', 5),
(6, 'chillis', 'e10adc3949ba59abbe56e057f20f883e', 'chillis@gmail.com', 6),
(7, 'safa_wung', 'e10adc3949ba59abbe56e057f20f883e', 'safa_wung@gmail.com', 7),
(8, 'master_chef', 'e10adc3949ba59abbe56e057f20f883e', 'master_chef@gmail.com', 8),
(9, 'nanking', 'e10adc3949ba59abbe56e057f20f883e', 'nanking@gmail.com', 9),
(10, 'aristrocrat', 'e10adc3949ba59abbe56e057f20f883e', 'aristrocrat@gmail.com', 10),
(11, 'chillis_raj', 'e10adc3949ba59abbe56e057f20f883e', 'chillis_raj@gmail.com', 11),
(12, 'star_kabab', 'e10adc3949ba59abbe56e057f20f883e', 'star_kabab@gmail.com', 12);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
