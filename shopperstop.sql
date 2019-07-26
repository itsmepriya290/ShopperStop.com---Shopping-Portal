-- phpMyAdmin SQL Dump
-- version 4.1.12
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jun 29, 2019 at 08:23 PM
-- Server version: 5.6.16
-- PHP Version: 5.5.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `shopperstop`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `sl` int(155) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `admin_id` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  PRIMARY KEY (`sl`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`sl`, `name`, `admin_id`, `password`) VALUES
(1, 'Priya Kumari', 'pkumari', 'priya');

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE IF NOT EXISTS `contact` (
  `id` int(8) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(100) NOT NULL,
  `message` varchar(1000) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`id`, `name`, `email`, `phone`, `message`) VALUES
(3, 'mndfjj', 'hjhj', 'hjhj', 'h'),
(4, 'yuyu', 'yuy', 'yuy', 'nzvfbdfv'),
(5, 'hg6', 'tty', 'tty', '868'),
(6, 'jhjhj', 'jhjhjh', 'jhjhjh', 'hjkfkdhfj'),
(7, 'jkjk', 'jkjk@gmail.com', 'jkjk@gmail.com', 'hi');

-- --------------------------------------------------------

--
-- Table structure for table `tblproduct`
--

CREATE TABLE IF NOT EXISTS `tblproduct` (
  `id` int(8) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `code` varchar(255) NOT NULL,
  `image` text NOT NULL,
  `price` double(10,2) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `product_code` (`code`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `tblproduct`
--

INSERT INTO `tblproduct` (`id`, `name`, `code`, `image`, `price`) VALUES
(1, 'Belkin Cables', 'BLC2', 'products/pr1.PNG', 149.00),
(2, 'Ambrane 20800 mah', 'AB02', 'products/pr2.PNG', 1499.00),
(3, 'Micromax Wall Charger', 'CHG5', 'products/pr3.PNG', 179.00),
(4, 'Rock Power Bank', 'PWR4', 'products/pr4.PNG', 1299.00),
(5, 'Intex Power Bank', 'INT6', 'products/pr5.PNG', 899.00),
(6, 'Videocon Charger', 'VDC1', 'products/pr6.PNG', 299.00),
(7, 'Mi 3C/R3L Router', 'MI34', 'products/pr7.PNG', 999.00),
(8, 'D-Link Router', 'DLR3', 'products/pr8.PNG', 699.00),
(9, 'Wired Headphone', 'WHD2', 'products/pr9.PNG', 1599.00),
(10, 'Wired Mouse', 'WM12', 'products/pr10.PNG', 1399.00);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `sl_no` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `user_id` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`sl_no`),
  UNIQUE KEY `user_id` (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`sl_no`, `name`, `user_id`, `email`, `password`, `created_at`) VALUES
(2, 'Priya Kumari', 'priya786', 'priya@gmail.com', 'pk1234', '2018-01-16 15:12:35'),
(4, 'Romy', 'romy', 'romy@gmail.com', 'r1234', '2018-01-19 12:07:48');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
