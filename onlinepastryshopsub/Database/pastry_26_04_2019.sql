-- phpMyAdmin SQL Dump
-- version 3.3.9
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Apr 26, 2019 at 03:50 PM
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
  `admin_img` varchar(200) NOT NULL,
  PRIMARY KEY (`admin_id`),
  KEY `company_id` (`company_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `admin_registration_tbl`
--

INSERT INTO `admin_registration_tbl` (`admin_id`, `admin_name`, `company_id`, `admin_mob`, `admin_email`, `admin_password`, `admin_img`) VALUES
(2, 'se', 2, 1234567890, 'kuhk', '123', 'IMG-20160415-WA0006917754.jpg'),
(4, 'my', 2, 1234567890, 'sheiljagandhi603@gma', '123', 'Screenshot_2019-02-22-22-08-17-540_com.instagram.android945162.png');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `category_tbl`
--

INSERT INTO `category_tbl` (`category_id`, `company_id`, `category_name`, `category_code`) VALUES
(5, 2, 'Pastry', 'Pastry');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `company_tbl`
--

INSERT INTO `company_tbl` (`company_id`, `company_name`, `company_mob`, `company_alt_mob`, `company_email`, `company_add`, `company_city`, `company_GST_in_no`, `company_bank_name`, `company_ac_no`, `company_IFSC`, `company_pin_no`, `company_tin_no`, `company_CST_no`, `company_stax_no`, `company_general_LIC_no`, `company_logo_image`) VALUES
(2, 'pastry queen', 0, 0, '', '', '', '', '', '', '', '', '', '', '', '', 'IMG_20190131_215206_067978550.jpg');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=38 ;

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
(37, 'vdvdsv', 4567890987, 'sheiljagandhi603@gmail.com', 'dffdgf', 'fgfdgfgfgd');

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
-- Table structure for table `discription_tbl`
--

CREATE TABLE IF NOT EXISTS `discription_tbl` (
  `discription_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `theme_id` bigint(20) NOT NULL,
  `discription` varchar(600) NOT NULL,
  PRIMARY KEY (`discription_id`),
  KEY `theme_id` (`theme_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `discription_tbl`
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
  `cost` bigint(20) NOT NULL,
  PRIMARY KEY (`flavour_id`),
  KEY `company_id` (`company_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `flavour`
--

INSERT INTO `flavour` (`flavour_id`, `company_id`, `flavour_name`, `flavour_code`, `cost`) VALUES
(1, 2, 'Black Forest', 'Black Forest', 600),
(2, 2, 'White Forest', 'White Forest', 600),
(3, 2, 'Fresh Pineapple', 'Fresh Pineapple', 600),
(4, 2, 'Rasmalay', 'Rasmalay', 750),
(5, 2, 'Strawberry', 'Strawberry', 600),
(6, 2, 'Butterscotch', 'Butterscotch', 600),
(7, 2, 'Fresh Mango', 'Fresh Mango', 600);

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `gst_tbl`
--

INSERT INTO `gst_tbl` (`gst_slab_id`, `company_id`, `gst_slab_name`, `cgst`, `sgst`, `igst`, `gst_date`) VALUES
(1, 2, 'jj', 5, 5, 5, '2019-04-11 15:22:33');

-- --------------------------------------------------------

--
-- Table structure for table `order_details`
--

CREATE TABLE IF NOT EXISTS `order_details` (
  `order_detail_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `order_id` bigint(20) NOT NULL,
  `product_id` bigint(20) NOT NULL,
  `qty` int(20) NOT NULL,
  `rate` int(20) NOT NULL,
  `weight` int(20) NOT NULL,
  `flavour_id` bigint(20) NOT NULL,
  `message_on_pastry` varchar(200) NOT NULL,
  `gst_slab_id` bigint(20) NOT NULL,
  `is_item_delivered` int(20) NOT NULL,
  PRIMARY KEY (`order_detail_id`),
  KEY `order_id` (`order_id`,`product_id`),
  KEY `product_id` (`product_id`),
  KEY `gst_slab_id` (`gst_slab_id`),
  KEY `flavour_id` (`flavour_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=101 ;

--
-- Dumping data for table `order_details`
--

INSERT INTO `order_details` (`order_detail_id`, `order_id`, `product_id`, `qty`, `rate`, `weight`, `flavour_id`, `message_on_pastry`, `gst_slab_id`, `is_item_delivered`) VALUES
(94, 75, 18, 1, 1400, 2, 1, '', 1, 0),
(97, 75, 19, 1, 2250, 3, 2, '', 1, 0),
(98, 75, 19, 1, 2250, 3, 1, 'se', 1, 0),
(99, 75, 19, 1, 2250, 3, 1, '', 1, 0),
(100, 75, 20, 1, 750, 1, 1, '', 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `order_master`
--

CREATE TABLE IF NOT EXISTS `order_master` (
  `order_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `invoice_number` bigint(20) NOT NULL,
  `order_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `customer_id` bigint(20) NOT NULL,
  `sub_total` bigint(20) NOT NULL,
  `GST_total` bigint(20) NOT NULL,
  `shipping_cost` bigint(20) NOT NULL,
  `final_total` bigint(20) NOT NULL,
  `delivery_date` date NOT NULL,
  `is_order_completed` int(10) NOT NULL,
  `is_order_delivered` int(10) NOT NULL,
  PRIMARY KEY (`order_id`),
  KEY `customer_id` (`customer_id`,`GST_total`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=76 ;

--
-- Dumping data for table `order_master`
--

INSERT INTO `order_master` (`order_id`, `invoice_number`, `order_date`, `customer_id`, `sub_total`, `GST_total`, `shipping_cost`, `final_total`, `delivery_date`, `is_order_completed`, `is_order_delivered`) VALUES
(75, 0, '2019-04-26 13:06:45', 1, 8900, 446, 0, 9346, '0000-00-00', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `order_not_available_tbl`
--

CREATE TABLE IF NOT EXISTS `order_not_available_tbl` (
  `date_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `date1` date NOT NULL,
  `date_availability` tinyint(4) NOT NULL,
  `max_weight` bigint(20) NOT NULL,
  `placed_order` bigint(20) NOT NULL,
  PRIMARY KEY (`date_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=606 ;

--
-- Dumping data for table `order_not_available_tbl`
--

INSERT INTO `order_not_available_tbl` (`date_id`, `date1`, `date_availability`, `max_weight`, `placed_order`) VALUES
(236, '2019-02-21', 1, 5, 0),
(361, '2019-03-01', 1, 5, 0),
(362, '2019-03-02', 1, 5, 0),
(363, '2019-03-03', 1, 5, 0),
(364, '2019-03-04', 1, 5, 0),
(365, '2019-03-05', 1, 5, 0),
(366, '2019-03-06', 1, 5, 0),
(367, '2019-03-07', 1, 5, 0),
(368, '2019-03-08', 1, 5, 0),
(369, '2019-03-09', 1, 5, 0),
(370, '2019-03-10', 1, 5, 0),
(371, '2019-03-11', 1, 5, 0),
(372, '2019-03-12', 1, 5, 0),
(373, '2019-03-13', 1, 5, 0),
(374, '2019-03-14', 1, 5, 0),
(375, '2019-03-15', 1, 5, 0),
(376, '2019-03-16', 1, 5, 0),
(377, '2019-03-17', 1, 5, 0),
(378, '2019-03-18', 1, 5, 0),
(379, '2019-03-19', 1, 5, 0),
(380, '2019-03-20', 1, 5, 0),
(381, '2019-03-21', 1, 5, 0),
(382, '2019-03-22', 1, 5, 0),
(383, '2019-03-23', 1, 5, 0),
(384, '2019-03-24', 1, 5, 0),
(385, '2019-03-25', 1, 5, 0),
(386, '2019-03-26', 1, 5, 0),
(387, '2019-03-27', 1, 5, 0),
(388, '2019-03-28', 1, 5, 0),
(389, '2019-03-29', 1, 5, 0),
(390, '2019-03-30', 1, 5, 0),
(391, '2019-03-31', 1, 5, 0),
(423, '2019-04-01', 1, 5, 0),
(424, '2019-04-02', 1, 5, 0),
(425, '2019-04-03', 1, 5, 0),
(426, '2019-04-04', 1, 5, 0),
(427, '2019-04-05', 1, 5, 0),
(428, '2019-04-06', 1, 5, 0),
(429, '2019-04-07', 1, 5, 0),
(430, '2019-04-08', 1, 5, 0),
(431, '2019-04-09', 1, 5, 0),
(432, '2019-04-10', 1, 5, 0),
(433, '2019-04-11', 1, 5, 0),
(434, '2019-04-12', 1, 5, 0),
(435, '2019-04-13', 1, 5, 0),
(436, '2019-04-14', 1, 5, 0),
(437, '2019-04-15', 1, 5, 0),
(438, '2019-04-16', 1, 5, 0),
(439, '2019-04-17', 1, 5, 0),
(440, '2019-04-18', 1, 5, 0),
(441, '2019-04-19', 1, 5, 0),
(442, '2019-04-20', 1, 5, 0),
(443, '2019-04-21', 1, 5, 0),
(444, '2019-04-22', 1, 5, 0),
(445, '2019-04-23', 1, 5, 0),
(446, '2019-04-24', 1, 5, 0),
(447, '2019-04-25', 1, 5, 0),
(448, '2019-04-26', 1, 5, 0),
(449, '2019-04-27', 1, 5, 0),
(450, '2019-04-28', 1, 5, 0),
(451, '2019-04-29', 1, 5, 0),
(452, '2019-04-30', 1, 5, 0),
(453, '2019-05-01', 1, 5, 5),
(454, '2019-05-02', 1, 5, 0),
(455, '2019-05-03', 1, 5, 0),
(456, '2019-05-04', 1, 5, 0),
(457, '2019-05-05', 1, 5, 0),
(458, '2019-05-06', 1, 5, 0),
(459, '2019-05-07', 1, 5, 0),
(460, '2019-05-08', 1, 5, 0),
(461, '2019-05-09', 1, 5, 0),
(462, '2019-05-10', 1, 5, 0),
(463, '2019-05-11', 1, 5, 0),
(464, '2019-05-12', 1, 5, 0),
(465, '2019-05-13', 1, 5, 0),
(466, '2019-05-14', 1, 5, 0),
(467, '2019-05-15', 1, 5, 0),
(468, '2019-05-16', 1, 5, 0),
(469, '2019-05-17', 1, 5, 0),
(470, '2019-05-18', 1, 5, 0),
(471, '2019-05-19', 1, 5, 0),
(472, '2019-05-20', 1, 5, 0),
(473, '2019-05-21', 1, 5, 0),
(474, '2019-05-22', 1, 5, 0),
(475, '2019-05-23', 1, 5, 0),
(476, '2019-05-24', 1, 5, 0),
(477, '2019-05-25', 1, 5, 0),
(478, '2019-05-26', 1, 5, 0),
(479, '2019-05-27', 1, 5, 0),
(480, '2019-05-28', 1, 5, 0),
(481, '2019-05-29', 1, 5, 0),
(482, '2019-05-30', 1, 5, 0),
(483, '2019-05-31', 1, 5, 0),
(484, '2019-06-01', 1, 5, 0),
(485, '2019-06-02', 1, 5, 0),
(486, '2019-06-03', 1, 5, 0),
(487, '2019-06-04', 1, 5, 0),
(488, '2019-06-05', 1, 5, 0),
(489, '2019-06-06', 1, 5, 0),
(490, '2019-06-07', 1, 5, 0),
(491, '2019-06-08', 1, 5, 0),
(492, '2019-06-09', 1, 5, 0),
(493, '2019-06-10', 1, 5, 0),
(494, '2019-06-11', 1, 5, 0),
(495, '2019-06-12', 1, 5, 0),
(496, '2019-06-13', 1, 5, 0),
(497, '2019-06-14', 1, 5, 0),
(498, '2019-06-15', 1, 5, 0),
(499, '2019-06-16', 1, 5, 0),
(500, '2019-06-17', 1, 5, 0),
(501, '2019-06-18', 1, 5, 0),
(502, '2019-06-19', 1, 5, 0),
(503, '2019-06-20', 1, 5, 0),
(504, '2019-06-21', 1, 5, 0),
(505, '2019-06-22', 1, 5, 0),
(506, '2019-06-23', 1, 5, 0),
(507, '2019-06-24', 1, 5, 0),
(508, '2019-06-25', 1, 5, 0),
(509, '2019-06-26', 1, 5, 0),
(510, '2019-06-27', 1, 5, 0),
(511, '2019-06-28', 1, 5, 0),
(512, '2019-06-29', 1, 5, 0),
(513, '2019-06-30', 1, 5, 0),
(514, '2019-07-01', 1, 5, 0),
(515, '2019-07-02', 1, 5, 0),
(516, '2019-07-03', 1, 5, 0),
(517, '2019-07-04', 1, 5, 0),
(518, '2019-07-05', 1, 5, 0),
(519, '2019-07-06', 1, 5, 0),
(520, '2019-07-07', 1, 5, 0),
(521, '2019-07-08', 1, 5, 0),
(522, '2019-07-09', 1, 5, 0),
(523, '2019-07-10', 1, 5, 0),
(524, '2019-07-11', 1, 5, 0),
(525, '2019-07-12', 1, 5, 0),
(526, '2019-07-13', 1, 5, 0),
(527, '2019-07-14', 1, 5, 0),
(528, '2019-07-15', 1, 5, 0),
(529, '2019-07-16', 1, 5, 0),
(530, '2019-07-17', 1, 5, 0),
(531, '2019-07-18', 1, 5, 0),
(532, '2019-07-19', 1, 5, 0),
(533, '2019-07-20', 1, 5, 0),
(534, '2019-07-21', 1, 5, 0),
(535, '2019-07-22', 1, 5, 0),
(536, '2019-07-23', 1, 5, 0),
(537, '2019-07-24', 1, 5, 0),
(538, '2019-07-25', 1, 5, 0),
(539, '2019-07-26', 1, 5, 0),
(540, '2019-07-27', 1, 5, 0),
(541, '2019-07-28', 1, 5, 0),
(542, '2019-07-29', 1, 5, 0),
(543, '2019-07-30', 1, 5, 0),
(544, '2019-07-31', 1, 5, 0),
(545, '2019-08-01', 1, 5, 0),
(546, '2019-08-02', 1, 5, 0),
(547, '2019-08-03', 1, 5, 0),
(548, '2019-08-04', 1, 5, 0),
(549, '2019-08-05', 1, 5, 0),
(550, '2019-08-06', 1, 5, 0),
(551, '2019-08-07', 1, 5, 0),
(552, '2019-08-08', 1, 5, 0),
(553, '2019-08-09', 1, 5, 0),
(554, '2019-08-10', 1, 5, 0),
(555, '2019-08-11', 1, 5, 0),
(556, '2019-08-12', 1, 5, 0),
(557, '2019-08-13', 1, 5, 0),
(558, '2019-08-14', 1, 5, 0),
(559, '2019-08-15', 1, 5, 0),
(560, '2019-08-16', 1, 5, 0),
(561, '2019-08-17', 1, 5, 0),
(562, '2019-08-18', 1, 5, 0),
(563, '2019-08-19', 1, 5, 0),
(564, '2019-08-20', 1, 5, 0),
(565, '2019-08-21', 1, 5, 0),
(566, '2019-08-22', 1, 5, 0),
(567, '2019-08-23', 1, 5, 0),
(568, '2019-08-24', 1, 5, 0),
(569, '2019-08-25', 1, 5, 0),
(570, '2019-08-26', 1, 5, 0),
(571, '2019-08-27', 1, 5, 0),
(572, '2019-08-28', 1, 5, 0),
(573, '2019-08-29', 1, 5, 0),
(574, '2019-08-30', 1, 5, 0),
(575, '2019-08-31', 1, 5, 0),
(576, '2019-09-01', 1, 5, 0),
(577, '2019-09-02', 1, 5, 0),
(578, '2019-09-03', 1, 5, 0),
(579, '2019-09-04', 1, 5, 0),
(580, '2019-09-05', 1, 5, 0),
(581, '2019-09-06', 1, 5, 0),
(582, '2019-09-07', 1, 5, 0),
(583, '2019-09-08', 1, 5, 0),
(584, '2019-09-09', 1, 5, 0),
(585, '2019-09-10', 1, 5, 0),
(586, '2019-09-11', 1, 5, 0),
(587, '2019-09-12', 1, 5, 0),
(588, '2019-09-13', 1, 5, 0),
(589, '2019-09-14', 1, 5, 0),
(590, '2019-09-15', 1, 5, 0),
(591, '2019-09-16', 1, 5, 0),
(592, '2019-09-17', 1, 5, 0),
(593, '2019-09-18', 1, 5, 0),
(594, '2019-09-19', 1, 5, 0),
(595, '2019-09-20', 1, 5, 0),
(596, '2019-09-21', 1, 5, 0),
(597, '2019-09-22', 1, 5, 0),
(598, '2019-09-23', 1, 5, 0),
(599, '2019-09-24', 1, 5, 0),
(600, '2019-09-25', 1, 5, 0),
(601, '2019-09-26', 1, 5, 0),
(602, '2019-09-27', 1, 5, 0),
(603, '2019-09-28', 1, 5, 0),
(604, '2019-09-29', 1, 5, 0),
(605, '2019-09-30', 1, 5, 0);

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
('39002', 70),
('395001', 70),
('395009', 70),
('395505', 70);

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
  `weight` decimal(18,2) NOT NULL,
  `max_weight` decimal(18,2) NOT NULL,
  `min_weight` decimal(18,2) NOT NULL,
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
  `price_per_kg` bigint(20) NOT NULL,
  `weight` decimal(18,2) NOT NULL,
  `max_weight` decimal(18,2) NOT NULL,
  `min_weight` decimal(18,2) NOT NULL,
  `discription1` varchar(600) NOT NULL,
  `discription2` varchar(600) NOT NULL,
  `discription3` varchar(600) NOT NULL,
  PRIMARY KEY (`product_id`),
  KEY `category_id` (`category_id`,`theme_id`),
  KEY `company_id` (`company_id`),
  KEY `gst_slab_id` (`gst_slab_id`),
  KEY `theme_id` (`theme_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=76 ;

--
-- Dumping data for table `product_tbl`
--

INSERT INTO `product_tbl` (`product_id`, `product_image`, `company_id`, `category_id`, `product_name`, `theme_id`, `gst_slab_id`, `price_per_kg`, `weight`, `max_weight`, `min_weight`, `discription1`, `discription2`, `discription3`) VALUES
(18, 'IMG_20190131_215822_379676502.jpg', 2, 5, 'Wedding Pastry', 41, 1, 700, 3.00, 3.00, 1.00, '0', 'It brings us immense pleasure to present to you our collection of exclusive Wedding Cakes. Choose from our vast range of designs, or get a completely customized cake, to suit your requirement. You can choose the number of tiers, the color combination, the finishing, or whatever else it may be to create the cake of your dreams.', 'Be rest assured that utmost attention to detail is given so as tomake a perfect cake. Not only do we assure you of a magnificent looking cake, but we also vouch for remarkable quality and taste.Wedding Cake orders must be placed 5 days in advance.'),
(19, 'IMG_20190131_215206_067755845.jpg', 2, 5, 'Marriage Anniversary', 36, 1, 750, 3.00, 3.00, 3.00, 'A beautiful floral cake is sure to make your spouse extremely happy. Choose from our vast range of floral designs. For larger Anniversary celebrations, refer to our Wedding Cake page.', '', ''),
(20, 'IMG-20180913-WA0007895832.jpg', 2, 5, 'Baby Shower Pastry', 25, 1, 750, 1.00, 1.00, 1.00, 'On this extremely special occasion, let us help you celebrate your friend or relatives baby shower making you a cake that will stay in your memories forever! Choose from our vast range of designs or send us your own dream cake design. Also look at Birth Announcement Gifts.', '', ''),
(21, 'IMG_20180918_183300869417.jpg', 2, 5, 'Baby Shower Pastry', 25, 1, 700, 3.00, 3.00, 2.00, 'On this extremely special occasion, let us help you celebrate your friend or relatives baby shower making you a cake that will stay in your memories forever! Choose from our vast range of designs or send us your own dream cake design. Also look at Birth Announcement Gifts.', '', ''),
(22, 'SquareLite_2018101113151185623273.jpg', 2, 5, 'Children Pastry', 24, 1, 600, 1.00, 1.00, 1.00, 'We, at Pstry Queen Patisserie, take an extra initiative to make your childs birthday a little more spcecial. We will work with what your child likes, and suggest theme based cakes depending on their favorite cartoon character, game, or anything else. We will then give you a range of design options for your childs cake.', '', ''),
(23, 'SquareLite_2018101123455560751164.jpg', 2, 5, 'Cartoon Pastry', 29, 1, 600, 1.00, 1.00, 1.00, 'We, at Pastry Queen Patisserie, take an extra initiative to make your childs birthday a little more spcecial. We will work with what your child likes, and suggest theme based cakes depending on their favorite cartoon character, game, or anything else. We will then give you a range of design options for your childs cake. We can also do mini cupcake boxes, with the same chosen theme cupcakes as giveaways after the birthday celebration, since cupcakes are a hit amongst kids.', '', ''),
(24, 'SquareLite_2018113205639431649845.jpg', 2, 5, 'Children Pastry', 24, 1, 650, 1.00, 1.00, 1.00, 'We, at Pstry Queen Patisserie, take an extra initiative to make your childs birthday a little more spcecial. We will work with what your child likes, and suggest theme based cakes depending on their favorite cartoon character, game, or anything else. We will then give you a range of design options for your childs cake.', '', ''),
(25, 'SquareLite_20181011125723828720596.jpg', 2, 5, 'Cartoon Pastry', 29, 1, 650, 1.00, 1.00, 1.00, 'We, at Pastry Queen Patisserie, take an extra initiative to make your childs birthday a little more spcecial. We will work with what your child likes, and suggest theme based cakes depending on their favorite cartoon character, game, or anything else. We will then give you a range of design options for your childs cake. We can also do mini cupcake boxes, with the same chosen theme cupcakes as giveaways after the birthday celebration, since cupcakes are a hit amongst kids.', '', ''),
(26, 'IMG-20181011-WA0011804779.jpg', 2, 5, 'Creative Pastry', 45, 1, 750, 1.00, 1.00, 1.00, 'Celebrating a promotion, a friends Birthday, an engagement, an achievement, or anything else? No celebration is complete without the cutting of a cake. Choose from our exquisite range of celebration cakes including champagne bottles, Tequilla bottles, Beer mugs, Whiskey bottles, floral cakes, and a lot more to pick a design that is most apt for the celebration.', '', ''),
(27, 'IMG-20180913-WA0004961920.jpg', 2, 5, 'KitKat Pastry', 42, 1, 700, 1.00, 1.00, 1.00, 'A delicious dark chocolate cake, with dark chocolate frosting, covered in kit kat chocolate bars, and some confetti. This cake is so delicious and a perfect cake for any party!', '', ''),
(28, 'SquareLite_201811522443225942937.jpg', 2, 5, 'Creative Pastry', 44, 1, 700, 1.00, 1.00, 1.00, 'Be it a Prada Bag or Louis Vuitton Bag, Jimmy Choo or Christian Louboutin Shoe box with a shoe, A Moet Chandon or a Patron bottle, or a mix of different designer logos on cupcakes, we will give you a product that will blow everyone away! So choose from our range of designs, or email us for more options so we can make you an incredible cake.', '', ''),
(29, 'IMG-20181011-WA0006982940.jpg', 2, 5, 'Makeup Pastry', 28, 1, 750, 1.00, 1.00, 1.00, 'Theme cakes are extemely exciting and can make the birthday person extremely happy. Get a theme cake of what the person likes or is obsessed with, and see the expression on their face! Choose from Angry Birds, Poker, Football Teams, Makeup, Hookah, Music instruments and a lot more.', '', ''),
(30, 'IMG-20190222-WA0013693452.jpg', 2, 5, 'Regular Pastry', 39, 1, 600, 1.00, 1.00, 1.00, '', '', ''),
(31, 'SquareLite_2018101112598636770428.jpg', 2, 5, 'Creative Pastry', 44, 1, 700, 11.00, 1.00, 1.00, 'Be it a Prada Bag or Louis Vuitton Bag, Jimmy Choo or Christian Louboutin Shoe box with a shoe, A Moet Chandon or a Patron bottle, or a mix of different designer logos on cupcakes, we will give you a product that will blow everyone away! So choose from our range of designs, or email us for more options so we can make you an incredible cake.', '', ''),
(32, 'PSX_20190207_192147607584.jpg', 2, 5, 'PUBG Pastry', 34, 1, 750, 1.00, 1.00, 1.00, 'This is the pastry for game lover.This is the best theme pastry for game lover to surprize the your friend.Some special game is design on this  on the pastry.', '', ''),
(33, 'PSX_20190207_191728747251.jpg', 2, 5, 'Cup Theme Pastry', 24, 1, 700, 1.00, 1.00, 1.00, '', '', ''),
(34, 'IMG_20180731_185000662480.jpg', 2, 5, 'Regular Pastry', 39, 1, 600, 1.00, 1.00, 1.00, '', '', ''),
(35, 'IMG-20180913-WA0001611859.jpg', 2, 5, 'Regular Pastry', 39, 1, 600, 1.00, 1.00, 1.00, '', '', ''),
(36, 'Screenshot_2019-01-30-21-36-11-355_com.instagram.android (1)604418.png', 2, 5, 'Regular Pastry', 39, 1, 600, 1.00, 1.00, 1.00, '', '', ''),
(37, 'IMG_20180908_174856823907.jpg', 2, 5, 'Creative Pastry', 44, 1, 750, 1.00, 1.00, 1.00, 'Be it a Prada Bag or Louis Vuitton Bag, Jimmy Choo or Christian Louboutin Shoe box with a shoe, A Moet Chandon or a Patron bottle, or a mix of different designer logos on cupcakes, we will give you a product that will blow everyone away! So choose from our range of designs, or email us for more options so we can make you an incredible cake.', '', ''),
(38, 'IMG_20190222_202838728103.jpg', 2, 5, 'Music Pastry', 37, 1, 700, 1.00, 1.00, 1.00, '', '', ''),
(39, 'Screenshot_2019-02-22-20-35-52-476_com.instagram.android906237.png', 2, 5, 'Creative Pastry', 44, 1, 600, 1.00, 1.00, 1.00, '', '', ''),
(40, 'Screenshot_2019-02-22-20-35-35-998_com.instagram.android749704.png', 2, 5, 'Marriage Anniversary', 36, 1, 700, 1.00, 1.00, 1.00, 'A beautiful floral cake is sure to make your spouse extremely happy. Choose from our vast range of floral designs. For larger Anniversary celebrations, refer to our Wedding Cake page.', '', ''),
(41, 'Screenshot_2019-02-22-20-29-06-324_com.instagram.android923984.png', 2, 5, 'Creative Pastry', 44, 1, 600, 1.00, 1.00, 1.00, '', '', ''),
(42, 'Screenshot_2019-02-22-20-29-23-392_com.instagram.android995824.png', 2, 5, 'Computer Engineering', 26, 1, 600, 1.00, 1.00, 1.00, '', '', ''),
(43, 'Screenshot_2019-02-22-20-30-02-720_com.instagram.android618383.png', 2, 5, 'Creative Pastry', 44, 1, 750, 1.00, 1.00, 1.00, '', '', ''),
(44, 'Screenshot_2019-02-22-20-30-26-957_com.instagram.android710198.png', 2, 5, 'Creative Pastry', 44, 1, 700, 1.00, 1.00, 1.00, '', '', ''),
(45, 'Screenshot_2019-02-22-20-30-54-544_com.instagram.android777373.png', 2, 5, 'Creative Pastry', 44, 1, 750, 1.00, 1.00, 1.00, '', '', ''),
(46, 'Screenshot_2019-02-22-20-31-13-111_com.instagram.android900421.png', 2, 5, 'Creative Pastry', 44, 1, 600, 1.00, 1.00, 1.00, '', '', ''),
(47, 'Screenshot_2019-02-22-20-32-58-211_com.instagram.android829415.png', 2, 5, '', 28, 1, 750, 1.00, 1.00, 1.00, '', '', ''),
(48, 'Screenshot_2019-02-22-20-33-37-657_com.instagram.android659373.png', 2, 5, 'Advocate Pastry', 46, 1, 750, 1.00, 1.00, 1.00, '', '', ''),
(49, 'Screenshot_2019-02-22-20-34-38-636_com.instagram.android709160.png', 2, 5, 'Marriage Anniversary', 36, 1, 750, 1.00, 1.00, 1.00, '', '', ''),
(50, 'Screenshot_2019-02-22-20-35-11-629_com.instagram.android945332.png', 2, 5, 'Marriage Anniversary', 36, 1, 600, 1.00, 1.00, 1.00, '', '', ''),
(51, 'Screenshot_2019-02-22-22-01-23-582_com.instagram.android789457.png', 2, 5, 'Cartoon pastry', 29, 1, 600, 1.00, 1.00, 1.00, '', '', ''),
(52, 'Screenshot_2019-02-22-22-01-51-897_com.instagram.android811262.png', 2, 5, '', 44, 1, 750, 1.00, 1.00, 1.00, '', '', ''),
(53, 'Screenshot_2019-02-22-22-02-14-900_com.instagram.android868000.png', 2, 5, 'Regualar Pastry', 39, 1, 600, 1.00, 1.00, 1.00, '', '', ''),
(54, 'Screenshot_2019-02-22-22-02-41-770_com.instagram.android866501.png', 2, 5, 'Creative Pastry', 44, 1, 600, 1.00, 1.00, 1.00, '', '', ''),
(55, 'Screenshot_2019-02-22-22-03-12-015_com.instagram.android717988.png', 2, 5, '', 24, 1, 750, 2.00, 2.00, 2.00, '', '', ''),
(56, 'Screenshot_2019-02-22-22-03-35-026_com.instagram.android925910.png', 2, 5, 'Creative Pastry', 44, 1, 800, 2.00, 2.00, 2.00, '', '', ''),
(57, 'Screenshot_2019-02-22-22-04-13-195_com.instagram.android813978.png', 2, 5, 'Regular Pastry', 39, 1, 600, 1.00, 1.00, 1.00, '', '', ''),
(58, 'Screenshot_2019-02-22-22-05-21-699_com.instagram.android791348.png', 2, 5, 'Children Pastry', 24, 1, 750, 1.00, 1.00, 1.00, '', '', ''),
(59, 'Screenshot_2019-02-22-22-06-20-945_com.instagram.android718572.png', 2, 5, 'Regular Pastry', 39, 1, 600, 1.00, 1.00, 1.00, '', '', ''),
(60, 'Screenshot_2019-02-22-22-07-00-386_com.instagram.android632382.png', 2, 5, 'Regular Pastry', 39, 1, 600, 1.00, 1.00, 1.00, '', '', ''),
(61, 'Screenshot_2019-02-22-22-07-20-009_com.instagram.android879951.png', 2, 5, 'Regular Pastry', 39, 1, 600, 1.00, 1.00, 1.00, '', '', ''),
(62, '', 2, 5, 'Regular Pastry', 39, 1, 600, 1.00, 1.00, 1.00, '', '', ''),
(63, 'Screenshot_2019-02-22-22-08-17-540_com.instagram.android998040.png', 2, 5, 'Regular Pastry', 39, 1, 600, 1.00, 1.00, 1.00, '', '', ''),
(65, 'Screenshot_2019-02-22-22-09-48-400_com.instagram.android944256.png', 2, 5, 'Children Pastry', 24, 1, 750, 1.00, 1.00, 1.00, '', '', ''),
(66, 'Screenshot_2019-02-22-21-50-17-555_com.instagram.android (1)604321.png', 2, 5, 'Candy Pastry', 30, 1, 700, 1.00, 1.00, 1.00, '', '', ''),
(67, 'Screenshot_2019-02-22-21-51-49-160_com.instagram.android865399.png', 2, 5, 'Children pastry', 24, 1, 750, 3.00, 3.00, 3.00, '', '', ''),
(68, 'Screenshot_2019-02-22-21-52-48-198_com.instagram.android843606.png', 2, 5, 'Doctor Pastry', 31, 1, 700, 2.00, 2.00, 2.00, '', '', ''),
(69, 'Screenshot_2019-02-22-21-53-50-371_com.instagram.android656052.png', 2, 5, 'Candy pastry', 30, 1, 700, 2.00, 2.00, 2.00, '', '', ''),
(70, 'Screenshot_2019-02-22-21-54-33-729_com.instagram.android832713.png', 2, 5, 'Children Pastry', 24, 1, 700, 2.00, 2.00, 2.00, '', '', ''),
(71, 'Screenshot_2019-02-22-21-55-00-975_com.instagram.android779378.png', 2, 5, 'Regular Pastry', 24, 1, 750, 1.00, 1.00, 1.00, '', '', ''),
(72, 'Screenshot_2019-02-22-21-55-34-823_com.instagram.android973337.png', 2, 5, 'Regular Pastry', 39, 1, 600, 1.00, 1.00, 1.00, '', '', ''),
(73, 'Screenshot_2019-02-22-21-59-04-678_com.instagram.android712113.png', 2, 5, 'Cartoon Pastry', 29, 1, 700, 2.00, 2.00, 2.00, '', '', ''),
(74, '', 2, 5, 'Regular Pastry', 39, 1, 600, 1.00, 1.00, 1.00, '', '', ''),
(75, 'Screenshot_2019-02-22-22-00-32-682_com.instagram.android701387.png', 2, 5, 'Regular Pastry', 39, 1, 700, 1.00, 0.00, 0.00, '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `product_tbl3`
--

CREATE TABLE IF NOT EXISTS `product_tbl3` (
  `product_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `product_image` varchar(200) NOT NULL,
  `company_id` bigint(20) NOT NULL,
  `category_id` bigint(20) NOT NULL,
  `product_name` varchar(200) NOT NULL,
  `theme_id` bigint(20) NOT NULL,
  `gst_slab_id` bigint(29) NOT NULL,
  `price` bigint(20) NOT NULL,
  `weight` decimal(18,2) NOT NULL,
  `max_weight` decimal(18,2) NOT NULL,
  `min_weight` decimal(18,2) NOT NULL,
  `discription1_id` bigint(20) NOT NULL,
  `discription2` varchar(600) NOT NULL,
  `discription3` varchar(600) NOT NULL,
  PRIMARY KEY (`product_id`),
  KEY `company_id` (`company_id`,`category_id`,`theme_id`,`gst_slab_id`,`discription1_id`),
  KEY `company_id_2` (`company_id`),
  KEY `category_id` (`category_id`),
  KEY `theme_id` (`theme_id`),
  KEY `gst_slab_id` (`gst_slab_id`),
  KEY `discription1_id` (`discription1_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `product_tbl3`
--


-- --------------------------------------------------------

--
-- Table structure for table `subscriber_tbl`
--

CREATE TABLE IF NOT EXISTS `subscriber_tbl` (
  `subscriber_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `subscriber_email_id` varchar(200) NOT NULL,
  `subscriber_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`subscriber_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=19 ;

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
(15, 'sheiljagandhi603@gmail.com', '2019-02-26 21:49:25'),
(16, 'sheiljagandhi603@gmail.com', '2019-02-26 22:22:13'),
(17, 'sheiljagandhi603@gmail.com', '2019-04-01 12:48:55'),
(18, 'gandhi.jatin1972@gmail.com', '2019-04-01 14:35:48');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=47 ;

--
-- Dumping data for table `theme`
--

INSERT INTO `theme` (`theme_id`, `company_id`, `theme_name`, `theme_code`) VALUES
(24, 2, 'Children Theme', 'Children Theme'),
(25, 2, 'Baby Shower Theme', 'Baby Shower Theme'),
(26, 2, 'Computer Engineering Theme', 'Computer Engineering Theme'),
(27, 2, 'Painting Theme', 'Painting Theme'),
(28, 2, 'Makeup Theme', 'Makeup Theme'),
(29, 2, 'Cartoon Theme', 'Cartoon Theme'),
(30, 2, 'Candy Theme', 'Candy Theme'),
(31, 2, 'Doctor Theme', 'Doctor Theme'),
(32, 2, 'Electrical Engineering Theme', 'Electrical Engineering Theme'),
(33, 2, 'Father Theme', 'Father Theme'),
(34, 2, 'Game Theme', 'Game Theme'),
(35, 2, 'Ice-Cream Theme', 'Ice-Cream Theme'),
(36, 2, 'Marriage Anniversary Theme ', 'Marriage Anniversary Theme '),
(37, 2, 'Music Theme', 'Music Theme'),
(38, 2, 'Photo Theme', 'Photo Theme'),
(39, 2, 'Regular', 'Regular'),
(40, 2, 'Teacher Theme', 'Teacher Theme'),
(41, 2, 'Wedding Theme', 'Wedding Theme'),
(42, 2, 'Kitkat Theme', 'Kitkat Theme'),
(44, 2, 'Creative Theme', 'Creative Theme'),
(45, 2, 'Celebration Theme', 'Celebration Theme'),
(46, 2, 'Advocate Theme', 'Advocate Theme');

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
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=14 ;

--
-- Dumping data for table `user_register`
--

INSERT INTO `user_register` (`user_id`, `user_full_name`, `user_email`, `user_mobile`, `user_password`) VALUES
(1, 'sheilja gandhi', 'sheiljagandhi603@gmail.com', 7572812248, '123'),
(9, 'liza', 'lizagandhi603@gmail.com', 1234567897, '123'),
(11, 'liza gandhi', 'dfg@gmail.com', 2345112345, '123'),
(12, 'selja123', 'sh123@gmail.com', 1234567891, '123'),
(13, 'sheilja jatinbhai gandhi', 'ho@gmail.com', 990, '123');

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
-- Constraints for table `discription`
--
ALTER TABLE `discription`
  ADD CONSTRAINT `discription_ibfk_1` FOREIGN KEY (`theme_id`) REFERENCES `theme` (`theme_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `flavour`
--
ALTER TABLE `flavour`
  ADD CONSTRAINT `flavour_ibfk_1` FOREIGN KEY (`company_id`) REFERENCES `company_tbl` (`company_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `gst_tbl`
--
ALTER TABLE `gst_tbl`
  ADD CONSTRAINT `gst_tbl_ibfk_1` FOREIGN KEY (`company_id`) REFERENCES `company_tbl` (`company_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `order_details`
--
ALTER TABLE `order_details`
  ADD CONSTRAINT `order_details_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `order_master` (`order_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `order_details_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `product_tbl` (`product_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `order_details_ibfk_3` FOREIGN KEY (`flavour_id`) REFERENCES `flavour` (`flavour_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `order_details_ibfk_4` FOREIGN KEY (`gst_slab_id`) REFERENCES `gst_tbl` (`gst_slab_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `order_master`
--
ALTER TABLE `order_master`
  ADD CONSTRAINT `order_master_ibfk_1` FOREIGN KEY (`customer_id`) REFERENCES `user_register` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

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
-- Constraints for table `product_tbl3`
--
ALTER TABLE `product_tbl3`
  ADD CONSTRAINT `product_tbl3_ibfk_1` FOREIGN KEY (`company_id`) REFERENCES `company_tbl` (`company_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `product_tbl3_ibfk_2` FOREIGN KEY (`category_id`) REFERENCES `category_tbl` (`category_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `product_tbl3_ibfk_3` FOREIGN KEY (`theme_id`) REFERENCES `theme` (`theme_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `product_tbl3_ibfk_4` FOREIGN KEY (`gst_slab_id`) REFERENCES `gst_tbl` (`gst_slab_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `product_tbl3_ibfk_5` FOREIGN KEY (`discription1_id`) REFERENCES `discription` (`discription_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `theme`
--
ALTER TABLE `theme`
  ADD CONSTRAINT `theme_ibfk_1` FOREIGN KEY (`company_id`) REFERENCES `company_tbl` (`company_id`) ON DELETE CASCADE ON UPDATE CASCADE;
