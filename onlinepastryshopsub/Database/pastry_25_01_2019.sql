-- phpMyAdmin SQL Dump
-- version 3.3.9
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jan 25, 2019 at 05:05 AM
-- Server version: 5.5.8
-- PHP Version: 5.3.5

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `pastry`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_registration_tbl`
--

CREATE TABLE IF NOT EXISTS `admin_registration_tbl` (
  `admin_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `admin_name` varchar(200) NOT NULL,
  `company_id` bigint(20) NOT NULL,
  `admin_mob` bigint(20) NOT NULL,
  `admin_email` varchar(200) NOT NULL,
  `admin_password` varchar(200) NOT NULL,
  PRIMARY KEY (`admin_id`),
  KEY `company_id` (`company_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `admin_registration_tbl`
--


-- --------------------------------------------------------

--
-- Table structure for table `category_tbl`
--

CREATE TABLE IF NOT EXISTS `category_tbl` (
  `category_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `company_id` bigint(20) NOT NULL,
  `category_name` varchar(200) NOT NULL,
  `category_code` varchar(50) NOT NULL,
  PRIMARY KEY (`category_id`),
  KEY `company_id` (`company_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `category_tbl`
--

INSERT INTO `category_tbl` (`category_id`, `company_id`, `category_name`, `category_code`) VALUES
(1, 1, 'CAKE', 'CAKE');

-- --------------------------------------------------------

--
-- Table structure for table `company_tbl`
--

CREATE TABLE IF NOT EXISTS `company_tbl` (
  `company_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `company_name` varchar(200) NOT NULL,
  `company_mob` bigint(20) NOT NULL,
  `company_alt_mob` bigint(20) NOT NULL,
  `company_email` varchar(200) NOT NULL,
  `company_add` varchar(200) NOT NULL,
  `company_city` varchar(200) NOT NULL,
  `company_GST_in_no` varchar(200) NOT NULL,
  `company_bank_name` varchar(200) NOT NULL,
  `company_ac_no` varchar(200) NOT NULL,
  `company_IFSC` varchar(200) NOT NULL,
  `company_pin_no` varchar(200) NOT NULL,
  `company_tin_no` varchar(200) NOT NULL,
  `company_CST_no` varchar(200) NOT NULL,
  `company_stax_no` varchar(200) NOT NULL,
  `company_general_LIC_no` varchar(200) NOT NULL,
  `company_logo_image` varchar(200) NOT NULL,
  PRIMARY KEY (`company_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `company_tbl`
--

INSERT INTO `company_tbl` (`company_id`, `company_name`, `company_mob`, `company_alt_mob`, `company_email`, `company_add`, `company_city`, `company_GST_in_no`, `company_bank_name`, `company_ac_no`, `company_IFSC`, `company_pin_no`, `company_tin_no`, `company_CST_no`, `company_stax_no`, `company_general_LIC_no`, `company_logo_image`) VALUES
(1, 'pastry', 0, 0, '', '', '', '', '', '', '', '', '', '', '', '', 'IMG-20160413-WA0022746403.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `customer_registration`
--

CREATE TABLE IF NOT EXISTS `customer_registration` (
  `customer_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `company_id` bigint(20) NOT NULL,
  `customer_name` varchar(200) NOT NULL,
  `customer_age` bigint(20) NOT NULL,
  `customer_mob_no` bigint(20) NOT NULL,
  `customer_alt_mob_no` bigint(20) NOT NULL,
  `customer_gender` bigint(10) NOT NULL,
  `customer_address` varchar(200) NOT NULL,
  `customer_pincode` int(20) NOT NULL,
  `customer_email` varchar(200) NOT NULL,
  PRIMARY KEY (`customer_id`),
  KEY `company_id` (`company_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `customer_registration`
--


-- --------------------------------------------------------

--
-- Table structure for table `flavour`
--

CREATE TABLE IF NOT EXISTS `flavour` (
  `flavour_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `company_id` bigint(20) NOT NULL,
  `flavour_name` varchar(200) NOT NULL,
  `flavour_code` varchar(200) NOT NULL,
  PRIMARY KEY (`flavour_id`),
  KEY `company_id` (`company_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `flavour`
--

INSERT INTO `flavour` (`flavour_id`, `company_id`, `flavour_name`, `flavour_code`) VALUES
(1, 1, 'ff', 'ff'),
(3, 1, 'pp', 'pp');

-- --------------------------------------------------------

--
-- Table structure for table `gst_tbl`
--

CREATE TABLE IF NOT EXISTS `gst_tbl` (
  `gst_slab_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `company_id` bigint(20) NOT NULL,
  `gst_slab_name` varchar(200) NOT NULL,
  `cgst` bigint(20) NOT NULL,
  `sgst` bigint(20) NOT NULL,
  `igst` bigint(20) NOT NULL,
  `gst_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`gst_slab_id`),
  KEY `company_id` (`company_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Dumping data for table `gst_tbl`
--

INSERT INTO `gst_tbl` (`gst_slab_id`, `company_id`, `gst_slab_name`, `cgst`, `sgst`, `igst`, `gst_date`) VALUES
(11, 2, 'rr', 3434, 23432, 43324, '2019-01-19 09:11:48'),
(12, 1, 'GG', 89, 89, 899, '2019-01-22 09:15:42');

-- --------------------------------------------------------

--
-- Table structure for table `order_not_available_tbl`
--

CREATE TABLE IF NOT EXISTS `order_not_available_tbl` (
  `date_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `company_id` bigint(200) NOT NULL,
  `date` date NOT NULL,
  `date_availability` tinyint(4) NOT NULL,
  `max_weight` bigint(20) NOT NULL,
  `taken_order_weight` bigint(20) NOT NULL,
  PRIMARY KEY (`date_id`),
  KEY `company_id` (`company_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `order_not_available_tbl`
--

INSERT INTO `order_not_available_tbl` (`date_id`, `company_id`, `date`, `date_availability`, `max_weight`, `taken_order_weight`) VALUES
(1, 1, '0000-00-00', 0, 3, 0),
(2, 1, '0000-00-00', 0, 3, 0),
(3, 1, '0000-00-00', 0, 3, 0),
(5, 1, '2019-01-16', 1, 3, 0),
(7, 1, '2019-01-17', 1, 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE IF NOT EXISTS `product` (
  `product_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `image` varchar(200) NOT NULL,
  `company_id` bigint(20) NOT NULL,
  `category_id` bigint(20) NOT NULL,
  `product_name` varchar(200) NOT NULL,
  `theme_id` bigint(20) NOT NULL,
  `price` bigint(20) NOT NULL,
  `discrption1` varchar(200) NOT NULL,
  `discrption2` varchar(200) NOT NULL,
  `discrption3` varchar(200) NOT NULL,
  PRIMARY KEY (`product_id`),
  KEY `category_id` (`category_id`,`theme_id`),
  KEY `theme_id` (`theme_id`),
  KEY `company_id` (`company_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `product`
--


-- --------------------------------------------------------

--
-- Table structure for table `product_tbl`
--

CREATE TABLE IF NOT EXISTS `product_tbl` (
  `product_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `product_image` varchar(200) NOT NULL,
  `company_id` bigint(20) NOT NULL,
  `category_id` bigint(20) NOT NULL,
  `product_name` varchar(200) NOT NULL,
  `theme_id` bigint(20) NOT NULL,
  `gst_slab_id` bigint(29) NOT NULL,
  `price` bigint(20) NOT NULL,
  `discription1` varchar(200) NOT NULL,
  `discription2` varchar(200) NOT NULL,
  `discription3` varchar(200) NOT NULL,
  PRIMARY KEY (`product_id`),
  KEY `category_id` (`category_id`,`theme_id`),
  KEY `company_id` (`company_id`),
  KEY `gst_slab_id` (`gst_slab_id`),
  KEY `theme_id` (`theme_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `product_tbl`
--

INSERT INTO `product_tbl` (`product_id`, `product_image`, `company_id`, `category_id`, `product_name`, `theme_id`, `gst_slab_id`, `price`, `discription1`, `discription2`, `discription3`) VALUES
(1, '', 1, 1, '', 1, 11, 0, '', '', ''),
(2, '', 1, 1, '', 1, 11, 0, '', '', ''),
(4, '', 1, 1, 'jjj', 1, 11, 0, '', '', ''),
(7, 'IMG-20160430-WA0000920195.jpg', 1, 1, '', 1, 11, 0, '', '', ''),
(8, 'IMG-20160415-WA0006734561.jpg', 1, 1, 'se', 1, 11, 100, 'wrefw', 'ewrfew', 'ewrfew');

-- --------------------------------------------------------

--
-- Table structure for table `theme`
--

CREATE TABLE IF NOT EXISTS `theme` (
  `theme_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `company_id` bigint(20) NOT NULL,
  `theme_name` varchar(200) NOT NULL,
  `theme_code` varchar(200) NOT NULL,
  PRIMARY KEY (`theme_id`),
  KEY `company_id` (`company_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `theme`
--

INSERT INTO `theme` (`theme_id`, `company_id`, `theme_name`, `theme_code`) VALUES
(1, 1, 'ded', 'ded'),
(2, 1, 'eq', 'feg');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `admin_registration_tbl`
--
ALTER TABLE `admin_registration_tbl`
  ADD CONSTRAINT `admin_registration_tbl_ibfk_1` FOREIGN KEY (`company_id`) REFERENCES `company_tbl` (`company_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `category_tbl`
--
ALTER TABLE `category_tbl`
  ADD CONSTRAINT `category_tbl_ibfk_1` FOREIGN KEY (`company_id`) REFERENCES `company_tbl` (`company_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `flavour`
--
ALTER TABLE `flavour`
  ADD CONSTRAINT `flavour_ibfk_1` FOREIGN KEY (`company_id`) REFERENCES `company_tbl` (`company_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `order_not_available_tbl`
--
ALTER TABLE `order_not_available_tbl`
  ADD CONSTRAINT `order_not_available_tbl_ibfk_1` FOREIGN KEY (`company_id`) REFERENCES `company_tbl` (`company_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `product_ibfk_1` FOREIGN KEY (`theme_id`) REFERENCES `theme` (`theme_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `product_ibfk_2` FOREIGN KEY (`category_id`) REFERENCES `category_tbl` (`category_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `product_tbl`
--
ALTER TABLE `product_tbl`
  ADD CONSTRAINT `product_tbl_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `category_tbl` (`category_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `product_tbl_ibfk_2` FOREIGN KEY (`company_id`) REFERENCES `company_tbl` (`company_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `product_tbl_ibfk_3` FOREIGN KEY (`theme_id`) REFERENCES `theme` (`theme_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `product_tbl_ibfk_4` FOREIGN KEY (`gst_slab_id`) REFERENCES `gst_tbl` (`gst_slab_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `theme`
--
ALTER TABLE `theme`
  ADD CONSTRAINT `theme_ibfk_1` FOREIGN KEY (`company_id`) REFERENCES `company_tbl` (`company_id`) ON DELETE CASCADE ON UPDATE CASCADE;
