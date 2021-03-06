-- phpMyAdmin SQL Dump
-- version 3.5.7
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: May 12, 2014 at 09:56 AM
-- Server version: 5.5.29
-- PHP Version: 5.4.10

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `bd_geocode`
--

-- --------------------------------------------------------

--
-- Table structure for table `divisions`
--
/*
CREATE TABLE `divisions` (
  `id` int(2) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(30) NOT NULL,
  `bn_name` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=8 ;
*/
--
-- Dumping data for table `divisions`
--

INSERT INTO `divisions` (`id`, `name`, `bn_name`,`country_id`) VALUES
(1, 'Barishal', 'বরিশাল',17),
(2, 'Chattogram', 'চট্টগ্রাম',17),
(3, 'Dhaka', 'ঢাকা',17),
(4, 'Khulna', 'খুলনা',17),
(5, 'Rajshahi', 'রাজশাহী',17),
(6, 'Rangpur', 'রংপুর',17),
(7, 'Sylhet', 'সিলেট',17),
(8, 'Mymensingh', 'ময়মনসিংহ',14);
