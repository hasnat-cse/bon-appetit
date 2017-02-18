-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Mar 30, 2014 at 04:12 AM
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

-- --------------------------------------------------------

--
-- Table structure for table `blog_food`
--

CREATE TABLE IF NOT EXISTS `blog_food` (
  `blog_food_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `food_id` int(11) NOT NULL,
  `comment` text NOT NULL,
  PRIMARY KEY (`blog_food_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `blog_food`
--

INSERT INTO `blog_food` (`blog_food_id`, `user_id`, `food_id`, `comment`) VALUES
(1, 4, 1, 'I love faluda....'),
(2, 5, 1, 'faaaaluuuudaaaaaa. yam yam..'),
(3, 8, 1, 'wow... nice...'),
(5, 8, 2, 'Ki ar bolbo....');

-- --------------------------------------------------------

--
-- Table structure for table `blog_restaurant`
--

CREATE TABLE IF NOT EXISTS `blog_restaurant` (
  `blog_restaurant_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `restaurant_id` int(11) NOT NULL,
  `comment` text NOT NULL,
  PRIMARY KEY (`blog_restaurant_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `blog_restaurant`
--

INSERT INTO `blog_restaurant` (`blog_restaurant_id`, `user_id`, `restaurant_id`, `comment`) VALUES
(1, 4, 4, 'Star is my easy choice...'),
(2, 8, 4, 'Star is the shortest choice...'),
(3, 8, 5, 'This is a nice restaurant...');

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

-- --------------------------------------------------------

--
-- Table structure for table `food_rating`
--

CREATE TABLE IF NOT EXISTS `food_rating` (
  `food_rating_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `food_id` int(11) NOT NULL,
  `user_rating` decimal(11,2) NOT NULL,
  PRIMARY KEY (`food_rating_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `food_rating`
--

INSERT INTO `food_rating` (`food_rating_id`, `user_id`, `food_id`, `user_rating`) VALUES
(1, 5, 1, 5.00),
(2, 5, 3, 4.00),
(3, 8, 1, 2.00);

-- --------------------------------------------------------

--
-- Table structure for table `friends`
--

CREATE TABLE IF NOT EXISTS `friends` (
  `main_id` int(11) NOT NULL,
  `follower_id` int(11) NOT NULL,
  `name` varchar(20) NOT NULL,
  `address` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `friends`
--

INSERT INTO `friends` (`main_id`, `follower_id`, `name`, `address`) VALUES
(1, 6, 'Ariful Islam', ''),
(1, 5, 'Tanveer Hossain', 'Ahsanullah Hall , BUET'),
(1, 4, 'Ariful Haque', 'Ahsanullah Hall , BUET'),
(5, 1, 'Shefaul Anjum', 'Ahsanullah Hall , BUET'),
(5, 4, 'Ariful Haque', 'Ahsanullah Hall , BUET'),
(5, 6, 'Ariful Islam', ''),
(8, 1, 'Shefaul Anjum', 'Ahsanullah Hall , BUET');

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

-- --------------------------------------------------------

--
-- Table structure for table `restaurant_rating`
--

CREATE TABLE IF NOT EXISTS `restaurant_rating` (
  `restaurant_rating_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `restaurant_id` int(11) NOT NULL,
  `user_rating` decimal(11,2) NOT NULL,
  PRIMARY KEY (`restaurant_rating_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `restaurant_rating`
--

INSERT INTO `restaurant_rating` (`restaurant_rating_id`, `user_id`, `restaurant_id`, `user_rating`) VALUES
(4, 5, 9, 3.00),
(5, 5, 1, 2.00),
(6, 8, 10, 1.00),
(7, 8, 4, 3.00);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `imglink` varchar(255) NOT NULL,
  `about_me` text NOT NULL,
  `member_from` varchar(255) NOT NULL,
  `security_key` varchar(255) NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `username`, `password`, `name`, `email`, `address`, `imglink`, `about_me`, `member_from`, `security_key`) VALUES
(1, 'shaown', '827ccb0eea8a706c4c34a16891f84e7b', 'Shefaul Anjum', 'shaown229@gmail.com', 'Ahsanullah Hall , BUET', 'images/myself.jpg', 'Unpredictable', '', '0'),
(4, 'anoboddo', 'e10adc3949ba59abbe56e057f20f883e', 'Ariful Haque', 'go.ahead.bida@gmail.com', 'Ahsanullah Hall , BUET', 'images/bida.jpg', 'All about part', '', '0'),
(5, 'thremon', 'e10adc3949ba59abbe56e057f20f883e', 'Tanveer Hossain', 'tanveer.buet', 'Ahsanullah Hall , BUET', 'images/2012-10-08_17.40_.01_.jpg', 'Nothing', '0', '0'),
(6, 'emandar', 'e10adc3949ba59abbe56e057f20f883e', 'Ariful Islam', 'arif346@yahoo.com', '', '', '', '', ''),
(8, 'heart_cse', 'e10adc3949ba59abbe56e057f20f883e', 'Arif Hasnat', 'arif_cse@ovi.com', '', 'images/288029_217770098270055_100001111985605_573091_7292899_o.jpg', '', '', '');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
