-- phpMyAdmin SQL Dump
-- version 3.3.9
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jun 04, 2019 at 08:29 AM
-- Server version: 5.5.8
-- PHP Version: 5.3.5

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `temp`
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
  `admin_img` varchar(200) NOT NULL,
  PRIMARY KEY (`admin_id`),
  KEY `company_id` (`company_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `admin_registration_tbl`
--

INSERT INTO `admin_registration_tbl` (`admin_id`, `admin_name`, `company_id`, `admin_mob`, `admin_email`, `admin_password`, `admin_img`) VALUES
(4, 'my', 2, 1234567890, 'sheiljagandhi156@gmail.com', '123', 'IMG-20160415-WA0006719626.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `category_tbl`
--

CREATE TABLE IF NOT EXISTS `category_tbl` (
  `category_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `category_name` varchar(200) NOT NULL,
  `category_code` varchar(50) NOT NULL,
  PRIMARY KEY (`category_id`),
  UNIQUE KEY `category_name` (`category_name`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=15 ;

--
-- Dumping data for table `category_tbl`
--

INSERT INTO `category_tbl` (`category_id`, `category_name`, `category_code`) VALUES
(5, 'Pastry', 'Pastry');

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
  `company_general_LIC_no` varchar(200) NOT NULL,
  `company_logo_image` varchar(200) NOT NULL,
  PRIMARY KEY (`company_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `company_tbl`
--

INSERT INTO `company_tbl` (`company_id`, `company_name`, `company_mob`, `company_alt_mob`, `company_email`, `company_add`, `company_city`, `company_GST_in_no`, `company_bank_name`, `company_ac_no`, `company_IFSC`, `company_pin_no`, `company_general_LIC_no`, `company_logo_image`) VALUES
(2, 'pastry queen', 1234567890, 1234567890, 'sheiljagandhi603@gmail.com', 'B-603,Siddhi Residency,Pal,Surat.', 'Surat', '11', 'Union', '123', '123', '123', '123', 'IMG_20190131_215206_067978550.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `contact_us`
--

CREATE TABLE IF NOT EXISTS `contact_us` (
  `contact_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `contact_name` varchar(100) NOT NULL,
  `contact_mob` bigint(20) NOT NULL,
  `contact_email` varchar(100) NOT NULL,
  `contact_subject` varchar(200) NOT NULL,
  `contact_message` varchar(400) NOT NULL,
  PRIMARY KEY (`contact_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=44 ;

--
-- Dumping data for table `contact_us`
--

INSERT INTO `contact_us` (`contact_id`, `contact_name`, `contact_mob`, `contact_email`, `contact_subject`, `contact_message`) VALUES
(10, 'Divyang Jariwala', 1234567890, 'jariwala@xyz.com', 'Testing ', 'Hello Here I am just testing form'),
(11, 'Divyang Jariwala', 1234567890, 'jariwala@xyz.com', 'Testing ', 'Hello Here I am just testing form'),
(12, 'jn,nf', 1234567890, 'sheiljagandhi603@gmail.com', 'ndjnkn', 'jndekjdnewklrjlewkrj'),
(13, 'jejdjdlejd', 8888, 'gandhi.jatin1972@gmail.com', 'hjkk', 'kjkj'),
(14, 'dkanka', 1234567890, 'sheiljagandhi603@gmail.com', 'nfnefe', 'kfsfrtr grlmgrmreltrt'),
(15, 'wdeqdqe', 1234567890, 'sheiljagandhi603@gmail.com', 'fwfwrf', 'fwrfw fwrfwrf fwrfw'),
(16, 'bfwjfnbw', 1234567890, 'sheiljagandhi603@gmail.com', 'nfkwrfn', 'nfkwnfwr'),
(17, 'bjnk', 1234567890, 'sheiljagandhi603@gmail.com', 'dhjj', 'jhjmh jmhbkjnkkn,kj'),
(18, 'ekdjenkf', 1234567890, 'sheiljagandhi603@gmail.com', 'ndeqndkekjn', 'jnfrjmng njfnrnrerjtl'),
(19, 'jkehriqek', 1234567890, 'sheiljagandhi603@gmail.com', 'kjfns', 'lfmslf fjrgterotjeotj'),
(20, 'nkqedh', 12345677890, 'sheiljagandhi603@gmail.com', 'ygj', 'nkmnhkmnhkjljljljljlok knlkj'),
(21, 'kjk', 1234567890, 'sheiljagandhi603@gmail.com', 'ggmh', 'hbmkh jkhkjl k,jn'),
(22, 'hbjmb', 1234567890, 'sheiljagandhi603@gmail.com', 'dffffffffffffff', 'fffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff'),
(23, 'sssssssssss', 1234567890, 'sheiljagandhi603@gmail.com', 'ddddddddddddddd', 'ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff'),
(24, 'jkdkj', 1234567890, 'sheiljagandhi603@gmail.com', 'hbhjb', 'bjnknkm'),
(25, 'hhj', 1234567890, 'sheiljagandhi603@gmail.com', 'hgjh', 'hbjjhbh hbjbgjhjku'),
(26, 'hjknkjn', 1234567890, 'sheiljagandhi603@gmail.com', 'nm ,', 'm,n ,m,.'),
(27, 'njnkn', 1234567890, 'sheiljagandhi603@gmail.com', 'jknknk', 'jnkn,n,m,mnlkmlj'),
(28, 'bbmn', 1234567890, 'skmn,k', 'HBJKN', 'JKHK'),
(29, 'NKJKNMJ', 1233, 'sheiljagandhi603@gmail.com', 'jvjhv', 'hbjhkjhk hkjmb'),
(30, 'knk', 1234567890, 's', 'nm,n,', '.m,m'),
(31, 'bjhbj', 1234567890, 'sheiljagandhi603@gmail.com', 'nvnb', 'hbjhbmjn'),
(32, '', 0, '', '', ''),
(33, 'HONEY123', 1234567890, 'gh123@gmail.com', 'yugw', 'tgssywsguw'),
(34, 'jinal12345', 0, 'jin', '', ''),
(35, '', 0, '', '', ''),
(36, 'ccscsc', 1234567890, 'sheiljagandhi603@gmail.com', 'fgergregerhre', 'gegregregrgrgrg'),
(37, 'vdvdsv', 4567890987, 'sheiljagandhi603@gmail.com', 'dffdgf', 'fgfdgfgfgd'),
(38, 'ndkasd', 1234567890, 'sheiljagandhi603@gmail.com', 'fwf', 'daa'),
(39, 'kdm', 1234567890, 'sss', 'cdk', 'jjn'),
(40, 'kmeqm', 1234567, 'keqwm', 'dqm', 'dkqm'),
(41, 'ndmqe', 12345678, 'sheiljagandhi603@gmail.com', 'MKM', 'kmkm'),
(42, 'ndjn', 1234567890, 'ss123@gmail.com', 'bnjk', 'jknkj'),
(43, 'nkm', 56, 'sheiljagandhi603@gmail.com', 'km', 'bjn');

-- --------------------------------------------------------

--
-- Table structure for table `discription`
--

CREATE TABLE IF NOT EXISTS `discription` (
  `discription_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `theme_id` bigint(10) NOT NULL,
  `discription` varchar(600) NOT NULL,
  PRIMARY KEY (`discription_id`),
  KEY `theme_id` (`theme_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Dumping data for table `discription`
--

INSERT INTO `discription` (`discription_id`, `theme_id`, `discription`) VALUES
(2, 41, 'A wedding is a once in a lifetime occasion that all family members wait for. With a Pastry Queen Wedding Pastry, ensure that you fascinate your guests in yet another aspect of your wedding celebrations. It brings us immense pleasure to present to you our collection of exclusive Wedding Cakes. Choose from our vast range of designs, or get a completely customized cake, to suit your requirement. You can choose the number of tiers, the color combination, the finishing, or whatever else it may be to create the cake of your dreams.Be rest assured that utmost attention to detail is given so as tomake'),
(4, 36, 'A beautiful floral cake is sure to make your spouse extremely happy. Choose from our vast range of floral designs. For larger Anniversary celebrations, refer to our Wedding Cake page.'),
(5, 25, 'On this extremely special occasion, let us help you celebrate your friend or relatives baby shower making you a cake that will stay in your memories forever! Choose from our vast range of designs or send us your own dream cake design. Also look at Birth Announcement Gifts.'),
(6, 24, 'We, at Pstry Queen Patisserie, take an extra initiative to make your childs birthday a little more spcecial. We will work with what your child likes, and suggest theme based cakes depending on their favorite cartoon character, game, or anything else. We will then give you a range of design options for your childs cake.'),
(7, 29, 'We, at Pastry Queen Patisserie, take an extra initiative to make your childs birthday a little more spcecial. We will work with what your child likes, and suggest theme based cakes depending on their favorite cartoon character, game, or anything else. We will then give you a range of design options for your childs cake. We can also do mini cupcake boxes, with the same chosen theme cupcakes as giveaways after the birthday celebration, since cupcakes are a hit amongst kids.'),
(8, 45, 'Celebrating a promotion, a friends Birthday, an engagement, an achievement, or anything else? No celebration is complete without the cutting of a cake. Choose from our exquisite range of celebration cakes including champagne bottles, Tequilla bottles, Beer mugs, Whiskey bottles, floral cakes, and a lot more to pick a design that is most apt for the celebration.'),
(9, 42, 'A delicious dark chocolate cake, with dark chocolate frosting, covered in kit kat chocolate bars, and some confetti. This cake is so delicious and a perfect cake for any party!'),
(10, 44, 'Be it a Prada Bag or Louis Vuitton Bag, Jimmy Choo or Christian Louboutin Shoe box with a shoe, A Moet Chandon or a Patron bottle, or a mix of different designer logos on cupcakes, we will give you a product that will blow everyone away! So choose from our range of designs, or email us for more options so we can make you an incredible cake.'),
(11, 28, 'Theme cakes are extemely exciting and can make the birthday person extremely happy. Get a theme cake of what the person likes or is obsessed with, and see the expression on their face! Choose from Angry Birds, Poker, Football Teams, Makeup, Hookah, Music instruments and a lot more.'),
(12, 34, 'This is the pastry for game lover.This is the best theme pastry for game lover to surprize the your friend.Some special game is design on this  on the pastry.');

-- --------------------------------------------------------

--
-- Table structure for table `flavour`
--

CREATE TABLE IF NOT EXISTS `flavour` (
  `flavour_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `flavour_name` varchar(200) NOT NULL,
  `flavour_code` varchar(200) NOT NULL,
  PRIMARY KEY (`flavour_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `flavour`
--

INSERT INTO `flavour` (`flavour_id`, `flavour_name`, `flavour_code`) VALUES
(1, 'Black Forest', 'Black Forest'),
(2, 'White Forest', 'White Forest'),
(3, 'Fresh Pineapple', 'Fresh Pineapple'),
(4, 'Rasmalay', 'Rasmalay'),
(5, 'Strawberry', 'Strawberry'),
(6, 'Butterscotch', 'Butterscotch'),
(7, 'Fresh Mango', 'Fresh Mango');

-- --------------------------------------------------------

--
-- Table structure for table `gst_tbl`
--

CREATE TABLE IF NOT EXISTS `gst_tbl` (
  `gst_slab_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `gst_slab_name` varchar(200) NOT NULL,
  `cgst` decimal(18,2) NOT NULL,
  `sgst` decimal(18,2) NOT NULL,
  `igst` decimal(18,2) NOT NULL,
  `gst_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`gst_slab_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `gst_tbl`
--

INSERT INTO `gst_tbl` (`gst_slab_id`, `gst_slab_name`, `cgst`, `sgst`, `igst`, `gst_date`) VALUES
(1, 'GST SLAB 5 %', 2.50, 2.50, 5.00, '2019-05-06 16:22:14');

-- --------------------------------------------------------

--
-- Table structure for table `like_tbl`
--

CREATE TABLE IF NOT EXISTS `like_tbl` (
  `like_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `product_id` bigint(20) NOT NULL,
  `user_id` bigint(20) NOT NULL,
  PRIMARY KEY (`like_id`),
  KEY `product_id` (`product_id`,`user_id`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=28 ;

--
-- Dumping data for table `like_tbl`
--

INSERT INTO `like_tbl` (`like_id`, `product_id`, `user_id`) VALUES
(1, 18, 1),
(22, 18, 9),
(20, 19, 9),
(8, 20, 1),
(15, 20, 9),
(9, 21, 1),
(23, 21, 9),
(25, 22, 9),
(5, 23, 1),
(21, 23, 9),
(14, 24, 1),
(24, 24, 9),
(11, 25, 1),
(17, 25, 9),
(26, 26, 9),
(6, 27, 1),
(18, 27, 9),
(27, 33, 9),
(12, 36, 1),
(16, 36, 9),
(10, 37, 1),
(13, 44, 1),
(7, 52, 1);

-- --------------------------------------------------------

--
-- Table structure for table `order_details`
--

CREATE TABLE IF NOT EXISTS `order_details` (
  `order_detail_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `order_number` varchar(50) NOT NULL,
  `customer_id` bigint(20) NOT NULL,
  `product_id` bigint(20) NOT NULL,
  `qty` int(20) NOT NULL,
  `rate` decimal(18,2) NOT NULL DEFAULT '0.00',
  `weight` decimal(18,2) NOT NULL DEFAULT '0.00',
  `flavour_id` bigint(20) NOT NULL DEFAULT '1',
  `message_on_pastry` varchar(200) NOT NULL,
  `gst` decimal(18,2) NOT NULL DEFAULT '0.00',
  `delivery_date` date NOT NULL,
  `pick_up_time` time NOT NULL,
  `is_item_delivered` tinyint(1) NOT NULL DEFAULT '0',
  `is_order_completed` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`order_detail_id`),
  KEY `order_id` (`order_number`,`product_id`),
  KEY `product_id` (`product_id`),
  KEY `gst_slab_id` (`gst`),
  KEY `flavour_id` (`flavour_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=109 ;

--
-- Dumping data for table `order_details`
--

INSERT INTO `order_details` (`order_detail_id`, `order_number`, `customer_id`, `product_id`, `qty`, `rate`, `weight`, `flavour_id`, `message_on_pastry`, `gst`, `delivery_date`, `pick_up_time`, `is_item_delivered`, `is_order_completed`) VALUES
(93, 'OB0520193301', 9, 19, 2, 4500.00, 3.00, 2, '', 225.00, '2019-06-13', '21:00:00', 0, 1),
(94, 'OB0520193301', 9, 20, 1, 750.00, 1.00, 0, '', 37.50, '2019-06-13', '21:00:00', 0, 1),
(95, 'OB0520199402', 9, 18, 1, 700.00, 1.00, 0, '', 35.00, '2019-06-22', '21:00:00', 0, 1),
(96, 'OB0520197213', 9, 19, 1, 2250.00, 3.00, 0, '', 112.50, '2019-05-25', '21:00:00', 0, 1),
(97, 'OB0520193094', 9, 73, 1, 1400.00, 2.00, 0, '', 70.00, '2019-05-31', '22:00:00', 0, 1),
(98, 'OB0520195685', 9, 29, 1, 750.00, 1.00, 0, '', 37.50, '2019-06-21', '20:00:00', 0, 1),
(99, 'OB0520199916', 9, 27, 1, 700.00, 1.00, 0, '', 35.00, '2019-06-30', '23:00:00', 0, 1),
(100, 'OB0520195377', 9, 24, 1, 650.00, 1.00, 0, '', 32.50, '2019-06-30', '18:00:00', 0, 1),
(101, 'OB0520193398', 9, 34, 1, 600.00, 1.00, 0, '', 30.00, '2019-06-25', '17:00:00', 0, 1),
(102, 'OB0520194959', 9, 39, 1, 600.00, 1.00, 0, '', 30.00, '2019-06-16', '16:00:00', 0, 1),
(103, 'OB05201991410', 9, 20, 1, 750.00, 1.00, 7, '', 37.50, '2019-05-31', '21:00:00', 0, 1),
(104, 'OB05201960111', 1, 20, 1, 750.00, 1.00, 7, '', 37.50, '2019-06-01', '21:00:00', 0, 1),
(105, 'OB06201931412', 1, 19, 1, 2250.00, 3.00, 4, '', 112.50, '2019-06-03', '21:00:00', 0, 1),
(106, 'OB06201918913', 1, 19, 2, 4500.00, 3.00, 6, '', 225.00, '2019-07-04', '12:00:00', 0, 1),
(107, 'OB06201994414', 1, 40, 1, 700.00, 1.00, 3, '', 35.00, '2019-06-12', '21:00:00', 0, 1),
(108, 'OB06201987915', 1, 19, 1, 2250.00, 3.00, 5, '', 112.50, '2019-06-05', '13:00:00', 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `order_master`
--

CREATE TABLE IF NOT EXISTS `order_master` (
  `order_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `order_number` varchar(50) NOT NULL,
  `order_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `customer_id` bigint(20) NOT NULL,
  `sub_total` bigint(20) NOT NULL,
  `GST_total` bigint(20) NOT NULL,
  `shipping_cost` bigint(20) NOT NULL,
  `discount` bigint(20) NOT NULL DEFAULT '0',
  `final_total` bigint(20) NOT NULL,
  `is_order_completed` int(10) NOT NULL,
  `is_order_delivered` int(10) NOT NULL,
  `payment_method` varchar(100) NOT NULL,
  PRIMARY KEY (`order_id`),
  KEY `customer_id` (`customer_id`,`GST_total`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=16 ;

--
-- Dumping data for table `order_master`
--

INSERT INTO `order_master` (`order_id`, `order_number`, `order_date`, `customer_id`, `sub_total`, `GST_total`, `shipping_cost`, `discount`, `final_total`, `is_order_completed`, `is_order_delivered`, `payment_method`) VALUES
(1, 'OB0520193301', '2019-05-23 10:17:27', 9, 5250, 263, 0, 0, 5513, 1, 0, 'cash'),
(2, 'OB0520199402', '2019-05-23 10:55:05', 9, 700, 35, 0, 0, 735, 1, 0, 'cash'),
(3, 'OB0520197213', '2019-05-23 10:57:24', 9, 2250, 113, 0, 0, 2363, 1, 0, 'cash'),
(4, 'OB0520193094', '2019-05-23 11:06:31', 9, 1400, 70, 0, 0, 1470, 1, 0, 'cash'),
(5, 'OB0520195685', '2019-05-23 11:09:32', 9, 750, 38, 0, 0, 788, 1, 0, 'cash'),
(6, 'OB0520199916', '2019-05-23 11:12:22', 9, 700, 35, 0, 0, 735, 1, 0, 'cash'),
(7, 'OB0520195377', '2019-05-23 11:22:35', 9, 650, 33, 0, 0, 683, 1, 0, 'cash'),
(8, 'OB0520193398', '2019-05-23 11:25:08', 9, 600, 30, 0, 0, 630, 1, 0, 'cash'),
(9, 'OB0520194959', '2019-05-23 11:28:37', 9, 600, 30, 0, 0, 630, 1, 0, 'cash'),
(10, 'OB05201991410', '2019-05-30 20:32:45', 9, 750, 38, 0, 0, 788, 1, 1, 'cash'),
(11, 'OB05201960111', '2019-06-02 20:32:46', 1, 750, 38, 50, 0, 838, 1, 1, 'cash'),
(12, 'OB06201931412', '2019-06-01 20:08:24', 1, 2250, 113, 50, 112, 2301, 1, 0, 'cash'),
(13, 'OB06201918913', '2019-06-01 20:42:16', 1, 4500, 225, 50, 0, 4775, 1, 0, 'cash'),
(14, 'OB06201994414', '2019-06-01 21:18:08', 1, 700, 35, 50, 37, 748, 1, 0, 'cash'),
(15, 'OB06201987915', '2019-06-04 10:48:57', 1, 2250, 113, 50, 0, 2413, 1, 0, 'cash');

-- --------------------------------------------------------

--
-- Table structure for table `order_not_available_tbl`
--

CREATE TABLE IF NOT EXISTS `order_not_available_tbl` (
  `date_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `date1` date NOT NULL,
  `date_availability` int(10) NOT NULL,
  `max_weight` bigint(20) NOT NULL,
  `placed_order` bigint(20) NOT NULL,
  PRIMARY KEY (`date_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=650 ;

--
-- Dumping data for table `order_not_available_tbl`
--

INSERT INTO `order_not_available_tbl` (`date_id`, `date1`, `date_availability`, `max_weight`, `placed_order`) VALUES
(635, '2019-06-15', 1, 5, 0),
(637, '2019-06-13', 0, 5, 7),
(638, '2019-06-22', 0, 5, 1),
(639, '2019-05-25', 0, 5, 3),
(640, '2019-05-31', 0, 5, 3),
(641, '2019-06-21', 0, 5, 1),
(642, '2019-06-30', 0, 5, 2),
(643, '2019-06-25', 0, 5, 1),
(644, '2019-06-16', 0, 5, 1),
(645, '2019-06-01', 0, 5, 1),
(646, '2019-06-03', 0, 5, 3),
(647, '2019-07-04', 0, 5, 6),
(648, '2019-06-12', 0, 5, 1),
(649, '2019-06-07', 0, 5, 3);

-- --------------------------------------------------------

--
-- Table structure for table `pincode_tbl`
--

CREATE TABLE IF NOT EXISTS `pincode_tbl` (
  `pincode_number` varchar(50) NOT NULL,
  `shipping_charge` bigint(20) NOT NULL,
  PRIMARY KEY (`pincode_number`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pincode_tbl`
--

INSERT INTO `pincode_tbl` (`pincode_number`, `shipping_charge`) VALUES
('39002', 50),
('395001', 50),
('395009', 50),
('395505', 50);

-- --------------------------------------------------------

--
-- Table structure for table `product_tbl`
--

CREATE TABLE IF NOT EXISTS `product_tbl` (
  `product_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `product_image` varchar(200) NOT NULL,
  `category_id` bigint(20) NOT NULL,
  `product_name` varchar(200) NOT NULL,
  `theme_id` bigint(20) NOT NULL,
  `gst_slab_id` bigint(29) NOT NULL,
  `price_per_kg` bigint(20) NOT NULL,
  `weight` decimal(18,2) NOT NULL,
  `max_weight` decimal(18,2) NOT NULL,
  `min_weight` decimal(18,2) NOT NULL,
  `discription1` varchar(600) NOT NULL,
  `discription2` varchar(600) NOT NULL,
  `discription3` varchar(600) NOT NULL,
  `is_featured` int(10) NOT NULL,
  PRIMARY KEY (`product_id`),
  KEY `category_id` (`category_id`,`theme_id`),
  KEY `gst_slab_id` (`gst_slab_id`),
  KEY `theme_id` (`theme_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=82 ;

--
-- Dumping data for table `product_tbl`
--

INSERT INTO `product_tbl` (`product_id`, `product_image`, `category_id`, `product_name`, `theme_id`, `gst_slab_id`, `price_per_kg`, `weight`, `max_weight`, `min_weight`, `discription1`, `discription2`, `discription3`, `is_featured`) VALUES
(18, 'IMG_20190131_215822_379676502.jpg', 5, 'Wedding Pastry', 41, 1, 700, 3.00, 3.00, 1.00, '0', 'It brings us immense pleasure to present to you our collection of exclusive Wedding Cakes. Choose from our vast range of designs, or get a completely customized cake, to suit your requirement. You can choose the number of tiers, the color combination, the finishing, or whatever else it may be to create the cake of your dreams.', 'Be rest assured that utmost attention to detail is given so as tomake a perfect cake. Not only do we assure you of a magnificent looking cake, but we also vouch for remarkable quality and taste.Wedding Cake orders must be placed 5 days in advance.', 0),
(19, 'IMG_20190131_215206_067755845.jpg', 5, 'Marriage Anniversary', 36, 1, 750, 3.00, 3.00, 3.00, 'A beautiful floral cake is sure to make your spouse extremely happy. Choose from our vast range of floral designs. For larger Anniversary celebrations, refer to our Wedding Cake page.', '', '', 0),
(20, 'IMG-20180913-WA0007895832.jpg', 5, 'Baby Shower Pastry', 25, 1, 750, 1.00, 1.00, 1.00, 'On this extremely special occasion, let us help you celebrate your friend or relatives baby shower making you a cake that will stay in your memories forever! Choose from our vast range of designs or send us your own dream cake design. Also look at Birth Announcement Gifts.', '', '', 1),
(21, 'IMG_20180918_183300869417.jpg', 5, 'Baby Shower Pastry', 25, 1, 700, 3.00, 3.00, 2.00, 'On this extremely special occasion, let us help you celebrate your friend or relatives baby shower making you a cake that will stay in your memories forever! Choose from our vast range of designs or send us your own dream cake design. Also look at Birth Announcement Gifts.', '', '', 1),
(22, 'SquareLite_2018101113151185623273.jpg', 5, 'Children Pastry', 24, 1, 600, 1.00, 1.00, 1.00, 'We, at Pstry Queen Patisserie, take an extra initiative to make your childs birthday a little more spcecial. We will work with what your child likes, and suggest theme based cakes depending on their favorite cartoon character, game, or anything else. We will then give you a range of design options for your childs cake.', '', '', 1),
(23, 'SquareLite_2018101123455560751164.jpg', 5, 'Cartoon Pastry', 29, 1, 600, 1.00, 1.00, 1.00, 'We, at Pastry Queen Patisserie, take an extra initiative to make your childs birthday a little more spcecial. We will work with what your child likes, and suggest theme based cakes depending on their favorite cartoon character, game, or anything else. We will then give you a range of design options for your childs cake. We can also do mini cupcake boxes, with the same chosen theme cupcakes as giveaways after the birthday celebration, since cupcakes are a hit amongst kids.', '', '', 1),
(24, 'SquareLite_2018113205639431649845.jpg', 5, 'Children Pastry', 24, 1, 650, 1.00, 1.00, 1.00, 'We, at Pstry Queen Patisserie, take an extra initiative to make your childs birthday a little more spcecial. We will work with what your child likes, and suggest theme based cakes depending on their favorite cartoon character, game, or anything else. We will then give you a range of design options for your childs cake.', '', '', 1),
(25, 'SquareLite_20181011125723828720596.jpg', 5, 'Cartoon Pastry', 29, 1, 650, 1.00, 1.00, 1.00, 'We, at Pastry Queen Patisserie, take an extra initiative to make your childs birthday a little more spcecial. We will work with what your child likes, and suggest theme based cakes depending on their favorite cartoon character, game, or anything else. We will then give you a range of design options for your childs cake. We can also do mini cupcake boxes, with the same chosen theme cupcakes as giveaways after the birthday celebration, since cupcakes are a hit amongst kids.', '', '', 1),
(26, 'IMG-20181011-WA0011804779.jpg', 5, 'Creative Pastry', 45, 1, 750, 1.00, 1.00, 1.00, 'Celebrating a promotion, a friends Birthday, an engagement, an achievement, or anything else? No celebration is complete without the cutting of a cake. Choose from our exquisite range of celebration cakes including champagne bottles, Tequilla bottles, Beer mugs, Whiskey bottles, floral cakes, and a lot more to pick a design that is most apt for the celebration.', '', '', 0),
(27, 'IMG-20180913-WA0004961920.jpg', 5, 'KitKat Pastry', 42, 1, 700, 1.00, 1.00, 1.00, 'A delicious dark chocolate cake, with dark chocolate frosting, covered in kit kat chocolate bars, and some confetti. This cake is so delicious and a perfect cake for any party!', '', '', 0),
(28, 'SquareLite_201811522443225942937.jpg', 5, 'Creative Pastry', 44, 1, 700, 1.00, 1.00, 1.00, 'Be it a Prada Bag or Louis Vuitton Bag, Jimmy Choo or Christian Louboutin Shoe box with a shoe, A Moet Chandon or a Patron bottle, or a mix of different designer logos on cupcakes, we will give you a product that will blow everyone away! So choose from our range of designs, or email us for more options so we can make you an incredible cake.', '', '', 1),
(29, 'IMG-20181011-WA0006982940.jpg', 5, 'Makeup Pastry', 28, 1, 750, 1.00, 1.00, 1.00, 'Theme cakes are extemely exciting and can make the birthday person extremely happy. Get a theme cake of what the person likes or is obsessed with, and see the expression on their face! Choose from Angry Birds, Poker, Football Teams, Makeup, Hookah, Music instruments and a lot more.', '', '', 1),
(30, 'IMG-20190222-WA0013693452.jpg', 5, 'Regular Pastry', 39, 1, 600, 1.00, 1.00, 1.00, '', '', '', 0),
(31, 'SquareLite_2018101112598636770428.jpg', 5, 'Creative Pastry', 44, 1, 700, 11.00, 1.00, 1.00, 'Be it a Prada Bag or Louis Vuitton Bag, Jimmy Choo or Christian Louboutin Shoe box with a shoe, A Moet Chandon or a Patron bottle, or a mix of different designer logos on cupcakes, we will give you a product that will blow everyone away! So choose from our range of designs, or email us for more options so we can make you an incredible cake.', '', '', 0),
(32, 'PSX_20190207_192147607584.jpg', 5, 'PUBG Pastry', 34, 1, 750, 1.00, 1.00, 1.00, 'This is the pastry for game lover.This is the best theme pastry for game lover to surprize the your friend.Some special game is design on this  on the pastry.', '', '', 0),
(33, 'PSX_20190207_191728747251.jpg', 5, 'Cup Theme Pastry', 24, 1, 700, 1.00, 1.00, 1.00, '', '', '', 0),
(34, 'IMG_20180731_185000662480.jpg', 5, 'Regular Pastry', 39, 1, 600, 1.00, 1.00, 1.00, '', '', '', 0),
(35, 'IMG-20180913-WA0001611859.jpg', 5, 'Regular Pastry', 39, 1, 600, 1.00, 1.00, 1.00, '', '', '', 0),
(36, 'Screenshot_2019-01-30-21-36-11-355_com.instagram.android (1)604418.png', 5, 'Regular Pastry', 39, 1, 600, 1.00, 1.00, 1.00, '', '', '', 0),
(37, 'IMG_20180908_174856823907.jpg', 5, 'Creative Pastry', 44, 1, 750, 1.00, 1.00, 1.00, 'Be it a Prada Bag or Louis Vuitton Bag, Jimmy Choo or Christian Louboutin Shoe box with a shoe, A Moet Chandon or a Patron bottle, or a mix of different designer logos on cupcakes, we will give you a product that will blow everyone away! So choose from our range of designs, or email us for more options so we can make you an incredible cake.', '', '', 0),
(38, 'IMG_20190222_202838728103.jpg', 5, 'Music Pastry', 37, 1, 700, 1.00, 1.00, 1.00, '', '', '', 0),
(39, 'Screenshot_2019-02-22-20-35-52-476_com.instagram.android906237.png', 5, 'Creative Pastry', 44, 1, 600, 1.00, 1.00, 1.00, '', '', '', 0),
(40, 'Screenshot_2019-02-22-20-35-35-998_com.instagram.android749704.png', 5, 'Marriage Anniversary', 36, 1, 700, 1.00, 1.00, 1.00, 'A beautiful floral cake is sure to make your spouse extremely happy. Choose from our vast range of floral designs. For larger Anniversary celebrations, refer to our Wedding Cake page.', '', '', 0),
(41, 'Screenshot_2019-02-22-20-29-06-324_com.instagram.android923984.png', 5, 'Creative Pastry', 44, 1, 600, 1.00, 1.00, 1.00, '', '', '', 0),
(42, 'Screenshot_2019-02-22-20-29-23-392_com.instagram.android995824.png', 5, 'Computer Engineering', 26, 1, 600, 1.00, 1.00, 1.00, '', '', '', 0),
(43, 'Screenshot_2019-02-22-20-30-02-720_com.instagram.android618383.png', 5, 'Creative Pastry', 44, 1, 750, 1.00, 1.00, 1.00, '', '', '', 0),
(44, 'Screenshot_2019-02-22-20-30-26-957_com.instagram.android710198.png', 5, 'Creative Pastry', 44, 1, 700, 1.00, 1.00, 1.00, '', '', '', 0),
(45, 'Screenshot_2019-02-22-20-30-54-544_com.instagram.android777373.png', 5, 'Creative Pastry', 44, 1, 750, 1.00, 1.00, 1.00, '', '', '', 0),
(46, 'Screenshot_2019-02-22-20-31-13-111_com.instagram.android900421.png', 5, 'Creative Pastry', 44, 1, 600, 1.00, 1.00, 1.00, '', '', '', 0),
(47, 'Screenshot_2019-02-22-20-32-58-211_com.instagram.android829415.png', 5, '', 28, 1, 750, 1.00, 1.00, 1.00, '', '', '', 1),
(48, 'Screenshot_2019-02-22-20-33-37-657_com.instagram.android659373.png', 5, 'Advocate Pastry', 46, 1, 750, 1.00, 1.00, 1.00, '', '', '', 0),
(49, 'Screenshot_2019-02-22-20-34-38-636_com.instagram.android709160.png', 5, 'Marriage Anniversary', 36, 1, 750, 1.00, 1.00, 1.00, '', '', '', 0),
(50, 'Screenshot_2019-02-22-20-35-11-629_com.instagram.android945332.png', 5, 'Marriage Anniversary', 36, 1, 600, 1.00, 1.00, 1.00, '', '', '', 0),
(51, 'Screenshot_2019-02-22-22-01-23-582_com.instagram.android789457.png', 5, 'Cartoon pastry', 29, 1, 600, 1.00, 1.00, 1.00, '', '', '', 0),
(52, 'Screenshot_2019-02-22-22-01-51-897_com.instagram.android811262.png', 5, '', 44, 1, 750, 1.00, 1.00, 1.00, '', '', '', 0),
(53, 'Screenshot_2019-02-22-22-02-14-900_com.instagram.android868000.png', 5, 'Regualar Pastry', 39, 1, 600, 1.00, 1.00, 1.00, '', '', '', 0),
(54, 'Screenshot_2019-02-22-22-02-41-770_com.instagram.android866501.png', 5, 'Creative Pastry', 44, 1, 600, 1.00, 1.00, 1.00, '', '', '', 0),
(55, 'Screenshot_2019-02-22-22-03-12-015_com.instagram.android717988.png', 5, '', 24, 1, 750, 2.00, 2.00, 2.00, '', '', '', 0),
(56, 'Screenshot_2019-02-22-22-03-35-026_com.instagram.android925910.png', 5, 'Creative Pastry', 44, 1, 800, 2.00, 2.00, 2.00, '', '', '', 0),
(57, 'Screenshot_2019-02-22-22-04-13-195_com.instagram.android813978.png', 5, 'Regular Pastry', 39, 1, 600, 1.00, 1.00, 1.00, '', '', '', 0),
(58, 'Screenshot_2019-02-22-22-05-21-699_com.instagram.android791348.png', 5, 'Children Pastry', 24, 1, 750, 1.00, 1.00, 1.00, '', '', '', 0),
(59, 'Screenshot_2019-02-22-22-06-20-945_com.instagram.android718572.png', 5, 'Regular Pastry', 39, 1, 600, 1.00, 1.00, 1.00, '', '', '', 0),
(60, 'Screenshot_2019-02-22-22-07-00-386_com.instagram.android632382.png', 5, 'Regular Pastry', 39, 1, 600, 1.00, 1.00, 1.00, '', '', '', 0),
(61, 'Screenshot_2019-02-22-22-07-20-009_com.instagram.android879951.png', 5, 'Regular Pastry', 39, 1, 600, 1.00, 1.00, 1.00, '', '', '', 0),
(62, '', 5, 'Regular Pastry', 39, 1, 600, 1.00, 1.00, 1.00, '', '', '', 0),
(63, 'Screenshot_2019-02-22-22-08-17-540_com.instagram.android998040.png', 5, 'Regular Pastry', 39, 1, 600, 1.00, 1.00, 1.00, '', '', '', 0),
(65, 'Screenshot_2019-02-22-22-09-48-400_com.instagram.android944256.png', 5, 'Children Pastry', 24, 1, 750, 1.00, 1.00, 1.00, '', '', '', 0),
(66, 'Screenshot_2019-02-22-21-50-17-555_com.instagram.android (1)604321.png', 5, 'Candy Pastry', 30, 1, 700, 1.00, 1.00, 1.00, '', '', '', 0),
(67, 'Screenshot_2019-02-22-21-51-49-160_com.instagram.android865399.png', 5, 'Children pastry', 24, 1, 750, 3.00, 3.00, 3.00, '', '', '', 0),
(68, 'Screenshot_2019-02-22-21-52-48-198_com.instagram.android843606.png', 5, 'Doctor Pastry', 31, 1, 700, 2.00, 2.00, 2.00, '', '', '', 0),
(69, 'Screenshot_2019-02-22-21-53-50-371_com.instagram.android656052.png', 5, 'Candy pastry', 30, 1, 700, 2.00, 2.00, 2.00, '', '', '', 0),
(70, 'Screenshot_2019-02-22-21-54-33-729_com.instagram.android832713.png', 5, 'Children Pastry', 24, 1, 700, 2.00, 2.00, 2.00, '', '', '', 0),
(71, 'Screenshot_2019-02-22-21-55-00-975_com.instagram.android779378.png', 5, 'Regular Pastry', 24, 1, 750, 1.00, 1.00, 1.00, '', '', '', 0),
(72, 'Screenshot_2019-02-22-21-55-34-823_com.instagram.android973337.png', 5, 'Regular Pastry', 39, 1, 600, 1.00, 1.00, 1.00, '', '', '', 0),
(73, 'Screenshot_2019-02-22-21-59-04-678_com.instagram.android712113.png', 5, 'Cartoon Pastry', 29, 1, 700, 2.00, 2.00, 2.00, '', '', '', 0),
(74, '', 5, 'Regular Pastry', 39, 1, 600, 1.00, 1.00, 1.00, '', '', '', 0),
(75, 'Screenshot_2019-02-22-22-00-32-682_com.instagram.android701387.png', 5, 'Regular Pastry', 39, 1, 700, 1.00, 0.00, 0.00, '', '', '', 0),
(81, '', 5, 'm,l', 36, 1, 900, 12.00, 1.00, 1.00, 'A beautiful floral cake is sure to make your spouse extremely happy. Choose from our vast range of floral designs. For larger Anniversary celebrations, refer to our Wedding Cake page.', '', '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `subscriber_tbl`
--

CREATE TABLE IF NOT EXISTS `subscriber_tbl` (
  `subscriber_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `subscriber_email_id` varchar(200) NOT NULL,
  `subscriber_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`subscriber_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=29 ;

--
-- Dumping data for table `subscriber_tbl`
--

INSERT INTO `subscriber_tbl` (`subscriber_id`, `subscriber_email_id`, `subscriber_date`) VALUES
(5, 'adc', '2019-02-08 09:48:26'),
(6, 'njkj', '2019-02-08 10:14:42'),
(7, 'kkkkk', '2019-02-08 10:16:39'),
(8, 'sheiljagandhi603@gmail.com', '2019-02-18 22:30:08'),
(9, 'sheiljagandhi603@gmail.com', '2019-02-18 22:31:06'),
(10, 'sheiljagandhi603@gmail.com', '2019-02-25 09:43:19'),
(11, 'sheiljagandhi603@gmail.com', '2019-02-25 09:49:03'),
(12, 'sheiljagandhi603@gmail.com', '2019-02-25 09:58:31'),
(13, 'sheiljagandhi603@gmail.com', '2019-02-26 09:29:18'),
(14, 'sheiljagandhi603@gmail.com', '2019-02-26 09:39:20'),
(18, 'gandhi.jatin1972@gmail.com', '2019-04-01 14:35:48'),
(19, 'hh123@gmail.com', '2019-05-07 11:55:01'),
(20, 'ss123@gmail.com', '2019-05-07 12:18:00'),
(21, 'kl123@gmail.com', '2019-05-07 12:19:03'),
(22, 'jjjj123@gmail.com', '2019-05-07 12:20:40'),
(23, 'qq123@gmail.com', '2019-05-07 12:23:07'),
(24, 'jk@gmail.com', '2019-05-13 19:08:13'),
(25, 'kk123@gmail.com', '2019-05-15 16:52:52'),
(26, 'kabrawalaraj@gmail.com', '2019-05-18 13:44:24'),
(27, 'rfrgfregregrg@gmail.com', '2019-05-21 17:40:48'),
(28, 'rfrgfregregrg@gmail.com', '2019-05-21 17:41:06');

-- --------------------------------------------------------

--
-- Table structure for table `theme`
--

CREATE TABLE IF NOT EXISTS `theme` (
  `theme_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `theme_name` varchar(200) NOT NULL,
  `theme_code` varchar(200) NOT NULL,
  PRIMARY KEY (`theme_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=47 ;

--
-- Dumping data for table `theme`
--

INSERT INTO `theme` (`theme_id`, `theme_name`, `theme_code`) VALUES
(24, 'Children Theme', 'Children Theme'),
(25, 'Baby Shower Theme', 'Baby Shower Theme'),
(26, 'Computer Engineering Theme', 'Computer Engineering Theme'),
(27, 'Painting Theme', 'Painting Theme'),
(28, 'Makeup Theme', 'Makeup Theme'),
(29, 'Cartoon Theme', 'Cartoon Theme'),
(30, 'Candy Theme', 'Candy Theme'),
(31, 'Doctor Theme', 'Doctor Theme'),
(32, 'Electrical Engineering Theme', 'Electrical Engineering Theme'),
(33, 'Father Theme', 'Father Theme'),
(34, 'Game Theme', 'Game Theme'),
(35, 'Ice-Cream Theme', 'Ice-Cream Theme'),
(36, 'Marriage Anniversary Theme ', 'Marriage Anniversary Theme '),
(37, 'Music Theme', 'Music Theme'),
(38, 'Photo Theme', 'Photo Theme'),
(39, 'Regular', 'Regular'),
(40, 'Teacher Theme', 'Teacher Theme'),
(41, 'Wedding Theme', 'Wedding Theme'),
(42, 'Kitkat Theme', 'Kitkat Theme'),
(44, 'Creative Theme', 'Creative Theme'),
(45, 'Celebration Theme', 'Celebration Theme'),
(46, 'Advocate Theme', 'Advocate Theme');

-- --------------------------------------------------------

--
-- Table structure for table `user_register`
--

CREATE TABLE IF NOT EXISTS `user_register` (
  `user_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `user_full_name` varchar(200) NOT NULL,
  `user_email` varchar(200) NOT NULL,
  `user_mobile` bigint(20) NOT NULL,
  `user_password` varchar(200) NOT NULL,
  `street_address` varchar(200) NOT NULL,
  `pincode` int(20) NOT NULL,
  `appartment_details` varchar(200) NOT NULL,
  `birth_date` date NOT NULL,
  `coupon_code` bigint(50) NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=18 ;

--
-- Dumping data for table `user_register`
--

INSERT INTO `user_register` (`user_id`, `user_full_name`, `user_email`, `user_mobile`, `user_password`, `street_address`, `pincode`, `appartment_details`, `birth_date`, `coupon_code`) VALUES
(1, 'selja', 'sheiljagandhi603@gmail.com', 11237899789, '123', 'Adajan645645', 395001, '9,Ankur sco.,Surat', '1998-06-01', 0),
(9, 'liza', 'sheiljagandhi156@gmail.com', 1234, '123', 'njkqnk123', 0, 'jnkq1234', '2019-04-30', 0),
(11, 'liza gandhi', 'dfg@gmail.com', 2345112345, '123', '', 0, '', '1998-07-07', 0),
(12, 'selja123', 'sh123@gmail.com', 1234567891, '123', '', 0, '', '1999-08-25', 0),
(13, 'sheilja jatinbhai gandhi', 'ho@gmail.com', 990, '123', '', 0, '', '2000-05-24', 0),
(14, 'razor', 'razor.123@gmail.com', 987654456, 'iuytrre', '', 0, '', '2001-05-18', 0),
(15, 'rtyu', '123@gmail.com', 8765432, 'pork123@123', '', 0, '', '2000-05-28', 0),
(16, 'jjj', 'jj123@gmail.com', 1234567890, '123', '', 0, '', '2000-10-27', 0),
(17, 'jinal', 'kk@gmail.com', 11223344455, '123', '', 0, '', '1998-04-06', 0);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `admin_registration_tbl`
--
ALTER TABLE `admin_registration_tbl`
  ADD CONSTRAINT `admin_registration_tbl_ibfk_1` FOREIGN KEY (`company_id`) REFERENCES `company_tbl` (`company_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `discription`
--
ALTER TABLE `discription`
  ADD CONSTRAINT `discription_ibfk_1` FOREIGN KEY (`theme_id`) REFERENCES `theme` (`theme_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `like_tbl`
--
ALTER TABLE `like_tbl`
  ADD CONSTRAINT `like_tbl_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `product_tbl` (`product_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `like_tbl_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `user_register` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `order_master`
--
ALTER TABLE `order_master`
  ADD CONSTRAINT `order_master_ibfk_1` FOREIGN KEY (`customer_id`) REFERENCES `user_register` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `product_tbl`
--
ALTER TABLE `product_tbl`
  ADD CONSTRAINT `product_tbl_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `category_tbl` (`category_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `product_tbl_ibfk_3` FOREIGN KEY (`theme_id`) REFERENCES `theme` (`theme_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `product_tbl_ibfk_4` FOREIGN KEY (`gst_slab_id`) REFERENCES `gst_tbl` (`gst_slab_id`) ON DELETE CASCADE ON UPDATE CASCADE;
