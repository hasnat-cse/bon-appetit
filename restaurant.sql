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
-- Table structure for table `restaurant`
--

CREATE TABLE IF NOT EXISTS `restaurant` (
  `restaurant_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `district` varchar(255) NOT NULL,
  `rating` decimal(11,2) NOT NULL,
  `user_count` int(32) NOT NULL,
  `imglink` varchar(255) NOT NULL,
  PRIMARY KEY (`restaurant_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Dumping data for table `restaurant`
--

INSERT INTO `restaurant` (`restaurant_id`, `name`, `address`, `district`, `rating`, `user_count`, `imglink`) VALUES
(1, 'Capricorn', '19th floor, Boshundhara City', 'Dhaka', 2.00, 1, ''),
(2, 'korai Gost', 'Jhigatola, Dhanmondi', 'Dhaka', 0.00, 0, ''),
(3, 'China Kitchen', 'Hatir Pool', 'Dhaka', 0.00, 0, ''),
(4, 'Star', 'Thatari Bazar', 'Dhaka', 0.00, 0, ''),
(5, 'Apple Inn', 'Jhigatola, Dhanmondi', 'Dhaka', 0.00, 0, ''),
(6, 'Chillis', 'Dhanmondi 32', 'Dhaka', 0.00, 0, ''),
(7, 'Safa Wung', 'Kadirganj', 'Rajshahi', 0.00, 0, ''),
(8, 'Master chef', 'Alokar Mor', 'Rajshahi', 0.00, 0, ''),
(9, 'Nanking', 'CNB Mor', 'Rajshahi', 3.00, 1, ''),
(10, 'Aristrocrat', 'Shaheb Bazar', 'Rajshahi', 1.00, 1, ''),
(11, 'Chillis', 'Shaheb Bazar', 'Rajshahi', 0.00, 0, ''),
(12, 'Star Kabab ', '24/7, Jigatola, Dhanmondi', 'Dhaka', 0.00, 0, 'images/smblk31280_2.jpg');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
