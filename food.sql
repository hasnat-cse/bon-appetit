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
-- Table structure for table `food`
--

CREATE TABLE IF NOT EXISTS `food` (
  `food_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `restaurant_id` int(11) NOT NULL,
  `rating` decimal(11,2) NOT NULL,
  `user_count` int(32) NOT NULL,
  `imglink` varchar(255) NOT NULL,
  PRIMARY KEY (`food_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=21 ;

--
-- Dumping data for table `food`
--

INSERT INTO `food` (`food_id`, `name`, `restaurant_id`, `rating`, `user_count`, `imglink`) VALUES
(1, 'Faluda', 4, 3.50, 2, ''),
(2, 'Kacci', 4, 0.00, 0, ''),
(3, 'Leg Roast', 4, 4.00, 1, ''),
(4, 'Chicken Tikka', 4, 0.00, 0, ''),
(5, 'Chicken Jhal Fry', 4, 0.00, 0, ''),
(6, 'Chicken Tikka', 8, 0.00, 0, ''),
(7, 'Leg Roast', 9, 0.00, 0, ''),
(14, 'Chiken Burger', 12, 0.00, 0, 'images/Screenshot_from_2014-01-05_12:55:32.png'),
(17, 'sik kabab', 12, 0.00, 0, ''),
(19, 'Nun Ruti', 12, 0.00, 0, ''),
(20, 'Beef Burger', 12, 0.00, 0, '');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
