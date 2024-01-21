-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jan 21, 2024 at 10:36 AM
-- Server version: 10.2.44-MariaDB
-- PHP Version: 8.1.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ithubtechnology_hpdev`
--

-- --------------------------------------------------------

--
-- Table structure for table `aftrbannersection`
--

CREATE TABLE `aftrbannersection` (
  `id` int(11) NOT NULL,
  `title` varchar(250) DEFAULT NULL,
  `icon1` varchar(250) DEFAULT NULL,
  `head1` varchar(250) DEFAULT NULL,
  `icon2` varchar(250) DEFAULT NULL,
  `head2` varchar(250) DEFAULT NULL,
  `icon3` varchar(250) DEFAULT NULL,
  `head3` varchar(250) DEFAULT NULL,
  `icon4` varchar(250) DEFAULT NULL,
  `head4` varchar(250) DEFAULT NULL,
  `icon5` varchar(250) DEFAULT NULL,
  `head5` varchar(250) DEFAULT NULL,
  `icon6` varchar(250) DEFAULT NULL,
  `head6` varchar(250) DEFAULT NULL,
  `btnname` varchar(250) DEFAULT NULL,
  `btnlink` varchar(250) DEFAULT NULL,
  `description` varchar(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `aftrbannersection`
--

INSERT INTO `aftrbannersection` (`id`, `title`, `icon1`, `head1`, `icon2`, `head2`, `icon3`, `head3`, `icon4`, `head4`, `icon5`, `head5`, `icon6`, `head6`, `btnname`, `btnlink`, `description`) VALUES
(1, 'WHAT WE SERVICE!h', '1622409004icon-01.png', 'KITCHEN APPLIENCE REPAIR', '2019611313icon-02.png', 'DISHWASHER REPAIRS', '', 'REFRIGERATOR REPAIR', '', '6', '808743953icon-04.png', '', '', '', 'REQUEST A FREE BROCHURE', '#', 'Servicetec Australia is the leading licensed cooking appliance repair and installation company specialising in all electric and gas cooking appliances. (Electrical, Gas Fitting, LP Gas Fitting). Beware of other unlicensed and uninsured appliance comp');

-- --------------------------------------------------------

--
-- Table structure for table `age`
--

CREATE TABLE `age` (
  `id` int(11) NOT NULL,
  `agecat` varchar(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `age`
--

INSERT INTO `age` (`id`, `agecat`) VALUES
(1, '3-5YR'),
(2, '4-6YR'),
(3, '6-8YR'),
(4, '10+');

-- --------------------------------------------------------

--
-- Table structure for table `attributeoption`
--

CREATE TABLE `attributeoption` (
  `id` int(11) NOT NULL,
  `atoptionname` varchar(250) DEFAULT NULL,
  `atoptionstatus` varchar(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `blogcomment`
--

CREATE TABLE `blogcomment` (
  `cmtid` int(11) NOT NULL,
  `blogid` int(11) DEFAULT NULL,
  `name` varchar(250) DEFAULT NULL,
  `email` varchar(250) DEFAULT NULL,
  `subject` text DEFAULT NULL,
  `message` text DEFAULT NULL,
  `blogstatus` int(11) NOT NULL,
  `date` varchar(250) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `brand`
--

CREATE TABLE `brand` (
  `id` int(11) NOT NULL,
  `bname` varchar(250) DEFAULT NULL,
  `iconimgae` varchar(250) DEFAULT NULL,
  `burl` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `brand`
--

INSERT INTO `brand` (`id`, `bname`, `iconimgae`, `burl`) VALUES
(7, 'Prakriti', '844433816_DSC1146-min.JPG', ''),
(8, 'dlink', '45841439crw_158,h_100.webp', '');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` int(11) NOT NULL,
  `userid` int(11) DEFAULT NULL,
  `cookievalis` text DEFAULT NULL,
  `productid` int(11) DEFAULT NULL,
  `batch` varchar(250) DEFAULT NULL,
  `expdate` varchar(250) DEFAULT NULL,
  `productprice` int(11) DEFAULT NULL,
  `qty` int(11) DEFAULT NULL,
  `total` int(11) DEFAULT NULL,
  `gstpercentage` varchar(250) DEFAULT NULL,
  `pcompercent` varchar(250) DEFAULT NULL,
  `pcomamt` varchar(250) DEFAULT NULL,
  `pgstvalue` varchar(250) DEFAULT NULL,
  `ptotgstvalue` varchar(250) DEFAULT NULL,
  `ptotcomsion` varchar(250) DEFAULT NULL,
  `ts` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `status` int(11) NOT NULL,
  `refundstatus` int(11) NOT NULL,
  `returnqty` int(11) NOT NULL,
  `orderno` varchar(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`id`, `userid`, `cookievalis`, `productid`, `batch`, `expdate`, `productprice`, `qty`, `total`, `gstpercentage`, `pcompercent`, `pcomamt`, `pgstvalue`, `ptotgstvalue`, `ptotcomsion`, `ts`, `status`, `refundstatus`, `returnqty`, `orderno`) VALUES
(5, 54, '2050357491', 2, NULL, NULL, 1399, 2, 2798, NULL, '', '0', '0', '0', '0', '2023-04-17 18:15:22', 1, 0, 0, '1001'),
(6, 54, '2050357491', 2, NULL, NULL, 1399, 1, 1399, NULL, '', '0', '0', '0', '0', '2023-04-17 18:15:22', 1, 0, 0, '1001'),
(7, 54, '2050357491', 5, NULL, NULL, 2499, 1, 2499, NULL, '', '0', '0', '0', '0', '2023-04-17 18:15:22', 1, 0, 0, '1001'),
(8, 54, '335301837', 9, NULL, NULL, 1599, 3, 4797, NULL, '', '0', '0', '0', '0', '2023-04-28 09:27:30', 1, 0, 0, '1002'),
(9, 54, '335301837', 9, NULL, NULL, 1599, 2, 3198, NULL, '', '0', '0', '0', '0', '2023-04-28 09:42:06', 1, 0, 0, '1003'),
(10, 0, '335301837', 10, NULL, NULL, 1599, 1, 1599, NULL, '', '0', '0', '0', '0', '2023-05-15 10:12:42', 1, 0, 0, '1004'),
(11, 0, '335301837', 11, NULL, NULL, 1599, 1, 1599, NULL, NULL, NULL, NULL, NULL, NULL, '2023-05-22 15:52:48', 1, 0, 0, '1008'),
(12, 0, '335301837', 9, NULL, NULL, 1599, 1, 1599, NULL, NULL, NULL, NULL, NULL, NULL, '2023-05-22 15:53:13', 1, 0, 0, '1009'),
(13, 0, '335301837', 11, NULL, NULL, 1599, 1, 1599, NULL, NULL, NULL, NULL, NULL, NULL, '2023-05-22 15:54:15', 1, 0, 0, '1010'),
(14, 0, '335301837', 11, NULL, NULL, 1599, 1, 1599, NULL, NULL, NULL, NULL, NULL, NULL, '2023-05-22 18:01:37', 1, 0, 0, '1040'),
(15, 0, '1825153714', 12, NULL, NULL, 1599, 1, 1599, NULL, NULL, NULL, NULL, NULL, NULL, '2023-05-30 03:07:36', 1, 0, 0, '1041'),
(16, 0, '1825153714', 12, NULL, NULL, 1599, 1, 1599, NULL, NULL, NULL, NULL, NULL, NULL, '2023-05-30 03:09:16', 1, 0, 0, '1042'),
(17, 0, '1825153714', 9, NULL, NULL, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, '2023-05-30 03:11:31', 1, 0, 0, '1043'),
(18, 0, '1825153714', 11, NULL, NULL, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, '2023-05-30 03:31:23', 1, 0, 0, '1045'),
(19, 0, '950718731', 11, NULL, NULL, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, '2023-05-30 04:12:22', 1, 0, 0, '1046'),
(20, 1, '13223606', 11, NULL, NULL, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, '2023-05-30 13:31:27', 1, 0, 0, '1047'),
(21, 1, '987929401', 10, NULL, NULL, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, '2023-05-30 13:31:27', 1, 0, 0, '1047'),
(22, 0, '987929401', 9, NULL, NULL, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, '2023-05-30 13:48:51', 1, 0, 0, '1048'),
(23, 0, '987929401', 11, NULL, NULL, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, '2023-06-04 07:55:32', 1, 0, 0, '1049'),
(24, 0, '1284201054', 12, NULL, NULL, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, '2023-06-04 07:55:32', 1, 0, 0, '1049'),
(26, 0, '1284201054', 11, NULL, NULL, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, '2023-06-04 07:58:00', 1, 0, 0, '1050'),
(27, 55, '1284201054', 9, NULL, NULL, 1, 99, 99, NULL, NULL, NULL, NULL, NULL, NULL, '2023-06-04 08:05:04', 1, 0, 0, '1051'),
(28, 1, '2030771623', 10, NULL, NULL, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, '2023-06-20 09:39:52', 1, 0, 0, '1026'),
(29, 1, '770569299', 10, NULL, NULL, 990, 1, 990, NULL, NULL, NULL, NULL, NULL, NULL, '2023-06-20 09:39:52', 1, 0, 0, '1026'),
(30, 1, '2030771623', 11, NULL, NULL, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, '2023-07-15 08:59:52', 1, 0, 0, '1027'),
(31, 1, '2030771623', 9, NULL, NULL, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, '2023-07-15 08:59:52', 1, 0, 0, '1027'),
(32, 1, '770569299', 12, NULL, NULL, 900, 1, 900, NULL, NULL, NULL, NULL, NULL, NULL, '2023-07-15 08:59:52', 1, 0, 0, '1027'),
(33, 0, '2030771623', 11, NULL, NULL, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, '2023-07-22 04:55:57', 1, 0, 0, '1028'),
(34, 0, '465427216', 11, NULL, NULL, 1, 2, 2, NULL, NULL, NULL, NULL, NULL, NULL, '2023-07-22 04:55:57', 1, 0, 0, '1028'),
(35, 0, '770569299', 9, NULL, NULL, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, '2023-07-22 04:55:57', 1, 0, 0, '1028'),
(36, 0, '1297555952', 12, NULL, NULL, 900, 1, 900, NULL, NULL, NULL, NULL, NULL, NULL, '2023-07-22 04:55:57', 1, 0, 0, '1028'),
(37, 1, '1297555952', 11, NULL, NULL, 100, 1, 100, NULL, NULL, NULL, NULL, NULL, NULL, '2023-07-23 05:53:53', 1, 0, 0, '1029'),
(38, 1, '422970784', 13, NULL, NULL, 1200, 1, 1200, NULL, NULL, NULL, NULL, NULL, NULL, '2023-07-23 05:53:53', 1, 0, 0, '1029'),
(39, 1, '1297555952', 11, NULL, NULL, 100, 1, 100, NULL, NULL, NULL, NULL, NULL, NULL, '2023-07-27 09:57:59', 1, 0, 0, '1030'),
(40, 1, '153552111', 13, NULL, NULL, 1200, 1, 1200, NULL, NULL, NULL, NULL, NULL, NULL, '2023-07-27 09:57:59', 1, 0, 0, '1030'),
(41, 56, '153552111', 13, NULL, NULL, 1200, 1, 1200, NULL, NULL, NULL, NULL, NULL, NULL, '2023-07-27 10:25:12', 1, 0, 0, '1031'),
(42, 1, '153552111', 13, NULL, NULL, 1200, 1, 1200, NULL, NULL, NULL, NULL, NULL, NULL, '2023-08-07 17:18:38', 1, 0, 0, '1032'),
(43, 1, '639401210', 10, NULL, NULL, 3200, 1, 3200, NULL, NULL, NULL, NULL, NULL, NULL, '2023-09-21 17:08:06', 1, 0, 0, '1033'),
(44, 0, '52268007', 10, NULL, NULL, 3200, 4, 12800, NULL, NULL, NULL, NULL, NULL, NULL, '2023-09-21 19:46:11', 1, 0, 0, '1034'),
(45, 0, '1143635087', 10, NULL, NULL, 3200, 1, 3200, NULL, NULL, NULL, NULL, NULL, NULL, '2023-09-21 19:46:11', 1, 0, 0, '1034'),
(47, 1, '639401210', 10, NULL, NULL, 3200, 1, 3200, NULL, NULL, NULL, NULL, NULL, NULL, '2023-09-24 10:17:29', 1, 0, 0, '1037'),
(48, 1, '639401210', 10, NULL, NULL, 3200, 99, 316800, NULL, NULL, NULL, NULL, NULL, NULL, '2023-09-24 10:17:29', 1, 0, 0, '1037'),
(51, 0, '1941460503', 13, NULL, NULL, 1200, 1, 1200, NULL, NULL, NULL, NULL, NULL, NULL, '2023-11-09 15:58:41', 1, 0, 0, '1038'),
(55, 0, '1418589622', 10, NULL, NULL, 3200, 1, 3200, NULL, NULL, NULL, NULL, NULL, NULL, '2023-11-09 15:58:41', 1, 0, 0, '1038'),
(56, 0, '639401210', 13, NULL, NULL, 1500, 1, 1500, NULL, NULL, NULL, NULL, NULL, NULL, '2023-11-09 15:58:41', 1, 0, 0, '1038'),
(57, 0, '639401210', 13, NULL, NULL, 1500, 99, 148500, NULL, NULL, NULL, NULL, NULL, NULL, '2023-11-09 15:58:41', 1, 0, 0, '1038'),
(58, 0, '911203302', 10, NULL, NULL, 320, 1, 320, NULL, NULL, NULL, NULL, NULL, NULL, '2023-11-09 15:58:41', 1, 0, 0, '1038'),
(59, 0, '1447768870', 10, NULL, NULL, 320, 1, 320, NULL, NULL, NULL, NULL, NULL, NULL, '2023-11-09 15:58:41', 1, 0, 0, '1038'),
(60, 0, '973917578', 10, NULL, NULL, 320, 1, 320, NULL, NULL, NULL, NULL, NULL, NULL, '2023-11-09 15:58:41', 1, 0, 0, '1038'),
(62, 0, '540403150', 10, NULL, NULL, 320, 1, 320, NULL, NULL, NULL, NULL, NULL, NULL, '2023-12-07 17:30:08', 1, 0, 0, '1039'),
(64, 1, '550648537', 10, NULL, NULL, 320, 1, 320, NULL, NULL, NULL, NULL, NULL, NULL, '2023-12-07 18:11:31', 1, 0, 0, '1040'),
(66, 1, '540403150', 10, NULL, NULL, 320, 50, 16000, NULL, NULL, NULL, NULL, NULL, NULL, '2023-12-07 18:11:31', 1, 0, 0, '1040'),
(67, 1, '540403150', 10, NULL, NULL, 320, 72, 23040, NULL, NULL, NULL, NULL, NULL, NULL, '2023-12-07 18:11:31', 1, 0, 0, '1040'),
(68, 1, '540403150', 10, NULL, NULL, 320, 1, 320, NULL, NULL, NULL, NULL, NULL, NULL, '2023-12-07 18:14:56', 0, 0, 0, NULL),
(69, 1, '540403150', 10, NULL, NULL, 320, 1, 320, NULL, NULL, NULL, NULL, NULL, NULL, '2023-12-07 18:15:04', 0, 0, 0, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `title` text CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `description` text CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `slugurl` text CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `ispopular` int(11) NOT NULL,
  `parentid` int(11) NOT NULL,
  `homepgsection` int(11) DEFAULT NULL,
  `srno` int(11) DEFAULT NULL,
  `adscript` longtext DEFAULT NULL,
  `featureimg` varchar(250) DEFAULT NULL,
  `mobilefeatureimg` varchar(250) DEFAULT NULL,
  `offer_daily_essentials` int(11) NOT NULL,
  `special_ofr_zone` int(11) NOT NULL,
  `ofr_house_personalcare` int(11) NOT NULL,
  `offer_on_groceries` int(11) NOT NULL,
  `newin` int(11) NOT NULL,
  `is_top` int(11) NOT NULL,
  `is_show` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `title`, `description`, `slugurl`, `ispopular`, `parentid`, `homepgsection`, `srno`, `adscript`, `featureimg`, `mobilefeatureimg`, `offer_daily_essentials`, `special_ofr_zone`, `ofr_house_personalcare`, `offer_on_groceries`, `newin`, `is_top`, `is_show`) VALUES
(19, 'Shop By  Fabric', '', 'shop-by-fabric', 0, 0, NULL, 0, '', '', NULL, 0, 0, 0, 0, 0, 0, 0),
(20, 'Shop By Category', '', 'shop-by-category', 0, 0, NULL, 0, '', '', NULL, 0, 0, 0, 0, 0, 0, 0),
(21, 'Sarees', '', 'sarees', 0, 20, NULL, NULL, '', '1197685696_DSC1113-min.JPG', NULL, 0, 0, 0, 0, 0, 1, 0),
(22, 'Kurtas', '', 'kurtas', 0, 20, NULL, NULL, '', '990014754_APS8421-min.JPG', NULL, 0, 0, 0, 0, 0, 1, 0),
(24, 'Kurta', '', 'kurta', 1, 0, NULL, 0, '', '', NULL, 0, 0, 0, 0, 0, 0, 0),
(25, 'Bottom wear', '', 'bottom-wear', 0, 0, NULL, 2345, '', '', NULL, 0, 0, 0, 0, 0, 0, 1),
(26, 'Palazzo', '', 'palazzo', 0, 20, NULL, NULL, '', '677556187pallazzo.jpg', NULL, 0, 0, 0, 0, 0, 0, 0),
(28, 'Special', '', 'special', 0, 0, NULL, 0, '', '', NULL, 0, 0, 0, 0, 0, 0, 0),
(29, 'Mukaish', '', 'mukaish', 0, 28, NULL, NULL, '', '1635898122IMG_7958.jpg', NULL, 0, 0, 0, 0, 0, 0, 0),
(30, 'Best Sellers', '', 'best-sellers', 1, 0, NULL, 0, '', '', NULL, 0, 0, 0, 0, 0, 0, 0),
(31, 'Influencers', '', 'influencers', 1, 0, NULL, 0, '', '', NULL, 0, 0, 0, 0, 0, 0, 0),
(32, 'test', '', 'test', 0, 0, NULL, 0, '', '', NULL, 0, 0, 0, 0, 0, 0, 1),
(33, 'Old Collections', '', 'old-collections', 0, 0, NULL, 0, '', '', NULL, 0, 0, 0, 0, 0, 0, 0),
(34, 'new test cat', '', 'new-test-cat', 0, 0, NULL, 0, '', '', NULL, 0, 0, 0, 0, 0, 0, 0),
(35, 'Test2', '', 'test2', 0, 0, NULL, 0, '', '', NULL, 0, 0, 0, 0, 0, 0, 0),
(36, 'Mens Wear', '', 'mens-wear', 0, 0, NULL, 0, '', '', NULL, 0, 0, 0, 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `childcat`
--

CREATE TABLE `childcat` (
  `id` int(11) NOT NULL,
  `childcatname` varchar(250) DEFAULT NULL,
  `subcatid` varchar(250) DEFAULT NULL,
  `childcatslug` text DEFAULT NULL,
  `slugurl` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `color`
--

CREATE TABLE `color` (
  `id` int(11) NOT NULL,
  `color` varchar(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `color`
--

INSERT INTO `color` (`id`, `color`) VALUES
(1, 'Red'),
(2, 'Blue'),
(3, 'Gree');

-- --------------------------------------------------------

--
-- Table structure for table `contactpg`
--

CREATE TABLE `contactpg` (
  `id` int(11) NOT NULL,
  `metaname` text DEFAULT NULL,
  `metadesc` text DEFAULT NULL,
  `pgtitle` varchar(250) DEFAULT NULL,
  `howtoreach` text DEFAULT NULL,
  `mapiframe` text DEFAULT NULL,
  `address` text DEFAULT NULL,
  `contactinfo` varchar(250) DEFAULT NULL,
  `contentarea2` text DEFAULT NULL,
  `email` varchar(250) DEFAULT NULL,
  `fburl` text DEFAULT NULL,
  `twitterurl` text DEFAULT NULL,
  `instaurl` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `contactpg`
--

INSERT INTO `contactpg` (`id`, `metaname`, `metadesc`, `pgtitle`, `howtoreach`, `mapiframe`, `address`, `contactinfo`, `contentarea2`, `email`, `fburl`, `twitterurl`, `instaurl`) VALUES
(1, '', '', '', '<p>Integer molestie molestie neque et cursus. Curabitur diam felis, ultricies non mauris tempor, interdum fringilla mauris. Nunc vitae sodales nisl, at accumsan odio. Vestibulum interdum velit id magna dictum.</p>', '', 'Kolkata', '9876543210', '', 'houseofposhaki@gmail.com', 'https://www.facebook.com/', 'https://www.twitter.com', 'https://www.instagram.com');

-- --------------------------------------------------------

--
-- Table structure for table `coupon`
--

CREATE TABLE `coupon` (
  `id` int(11) NOT NULL,
  `code` varchar(250) DEFAULT NULL,
  `discamt` varchar(250) DEFAULT NULL,
  `validto` varchar(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `coupon`
--

INSERT INTO `coupon` (`id`, `code`, `discamt`, `validto`) VALUES
(1, 'DISC', '10', '2024-01-30');

-- --------------------------------------------------------

--
-- Table structure for table `exercise`
--

CREATE TABLE `exercise` (
  `id` int(11) NOT NULL,
  `image` varchar(250) DEFAULT NULL,
  `blogid` varchar(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `homecms`
--

CREATE TABLE `homecms` (
  `id` int(11) NOT NULL,
  `stepno` varchar(250) DEFAULT NULL,
  `steptitle` text DEFAULT NULL,
  `stepdesc` text DEFAULT NULL,
  `iconimgae` varchar(250) DEFAULT NULL,
  `metaname` text DEFAULT NULL,
  `metatag` text DEFAULT NULL,
  `metatitle` text DEFAULT NULL,
  `metadescription` text DEFAULT NULL,
  `content1` text DEFAULT NULL,
  `content2` text DEFAULT NULL,
  `content3` text DEFAULT NULL,
  `button1` text DEFAULT NULL,
  `link1` text DEFAULT NULL,
  `button2` text DEFAULT NULL,
  `link2` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `homecms`
--

INSERT INTO `homecms` (`id`, `stepno`, `steptitle`, `stepdesc`, `iconimgae`, `metaname`, `metatag`, `metatitle`, `metadescription`, `content1`, `content2`, `content3`, `button1`, `link1`, `button2`, `link2`) VALUES
(1, '', '', '', '', '', '', '', '', '', '', '', '', '#', 'KNOW MORE', '#');

-- --------------------------------------------------------

--
-- Table structure for table `homepgsection`
--

CREATE TABLE `homepgsection` (
  `id` int(11) NOT NULL,
  `section` varchar(250) DEFAULT NULL,
  `heading` varchar(250) DEFAULT NULL,
  `description` varchar(250) DEFAULT NULL,
  `desc2` longtext DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `homepgsection`
--

INSERT INTO `homepgsection` (`id`, `section`, `heading`, `description`, `desc2`) VALUES
(1, '1', NULL, NULL, NULL),
(2, '2', NULL, NULL, NULL),
(3, '3', 'WHY CHOOSE US?', 'Servicetec delivers an customised, holistic management service designed to save you valuable time, money and resources. Taking a fresh approach with an emphasis on relationships and trust, we provide genuine support and management of security, cleani', NULL),
(4, '4', 'OUR EXPERTISE', 'We provide fast and reliable repair services in San Francisco for a variety of appliances starting with Heating and Air Conditioning to Microwaves and Washers.							', NULL),
(5, NULL, 'BRANDS WE PROVIDE', NULL, NULL),
(6, NULL, ' BOOK APPOINTMENT', 'We’re here to answer any questions you might have about living in a Loxone Smart Home. We can also help you find a Ingenious partner in your area.', '<h2>1300 495 823</h2>\r\n\r\n<p>or email us on<br />\r\n<a href=\"emailto:sales@servicetec.com.au\">sales@servicetec.com.au</a></p>\r\n\r\n<p>90 Different Brands And All Models</p>\r\n\r\n<p><strong>ARRIVE ON TIME</strong>Any faulty appliance can cause quite a disruption to a busy household so you will be glad to know that our experienced team prides it self on being on time 99% of the time. We will even call you upon arrival to let you know that we are on our way.</p>\r\n\r\n<p><strong>PRICE BEAT GUARANTEE</strong>We are the very first day wanted to provide the very best service at the very best prices which is why we&#39;ll beat any major competitors price.**</p>\r\n\r\n<p><strong>CLEAN &amp; TIDY</strong>We pride our selves on providing a unique fully guaranteed and exceptional service which is why all Stove Doctor technicians will leave your kitchen as neat and clean as when they arrived.</p>\r\n'),
(7, NULL, 'WHY CHOOSE US', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `howtobook`
--

CREATE TABLE `howtobook` (
  `id` int(11) NOT NULL,
  `metaname` text DEFAULT NULL,
  `metadesc` text DEFAULT NULL,
  `heading` text DEFAULT NULL,
  `description` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `howtobook`
--

INSERT INTO `howtobook` (`id`, `metaname`, `metadesc`, `heading`, `description`) VALUES
(1, 'how to book', 'how to book, book process', 'STEP BY STEP WE IMPLEMENT', 'Integer finibus feugiat erat, in tincidunt diam condimentum dignissim. Etiam accumsan eget sem vel molestie. Duis porttitor orci eu neque viverra euismod. Curabitur imperdiet non nisl sed porta. Aenean finibus libero at lorem iaculis bibendum. Duis ornare venenatis auctor. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Donec quis eros nec ante mollis hendrerit. Sed eget vulputate justo. Mauris varius interdum sodales.');

-- --------------------------------------------------------

--
-- Table structure for table `multiservices`
--

CREATE TABLE `multiservices` (
  `id` int(11) NOT NULL,
  `servicename` varchar(250) DEFAULT NULL,
  `url` text DEFAULT NULL,
  `description` text DEFAULT NULL,
  `featureimg` varchar(250) DEFAULT NULL,
  `iconimgae` varchar(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `multiservices`
--

INSERT INTO `multiservices` (`id`, `servicename`, `url`, `description`, `featureimg`, `iconimgae`) VALUES
(3, 'Dishwasher Repair', 'dishwasher-repair', '<figure class=\"easyimage easyimage-side\"><img alt=\"\" src=\"blob:https://designalogo.in/f317d260-8deb-4b11-8fef-77e4d983c581\" width=\"4256\" />\r\n<figcaption></figcaption>\r\n</figure>\r\n\r\n<figure class=\"easyimage easyimage-side\"><img alt=\"\" src=\"blob:https://designalogo.in/e9ccfc2a-c9d8-4d54-bd7c-3f9e889e67f2\" width=\"4256\" />\r\n<figcaption></figcaption>\r\n</figure>\r\n\r\n<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing L</p>', '1877957693dd.jpg', '1182090047clean.PNG'),
(4, 'Security', 'security', '', NULL, '906343536security.PNG'),
(5, 'Training', 'training', '', NULL, '855729314training.PNG'),
(6, 'Facilities', 'facilities', '', NULL, '1247011637faciliri.PNG');

-- --------------------------------------------------------

--
-- Table structure for table `ordertbl`
--

CREATE TABLE `ordertbl` (
  `id` int(11) NOT NULL,
  `totmrp` varchar(250) DEFAULT NULL,
  `grandtot` varchar(250) DEFAULT NULL,
  `discountedprice` varchar(250) DEFAULT NULL,
  `carttotal` varchar(250) DEFAULT NULL,
  `coupondiscountamt` varchar(250) DEFAULT NULL,
  `updatedate` varchar(250) DEFAULT NULL,
  `approvestatus` int(11) NOT NULL,
  `featureimg` varchar(250) DEFAULT NULL,
  `doctorname` varchar(250) DEFAULT NULL,
  `patientname` varchar(250) DEFAULT NULL,
  `couponis` varchar(250) DEFAULT NULL,
  `userid` int(11) DEFAULT NULL,
  `franchiseid` int(11) NOT NULL,
  `name` text DEFAULT NULL,
  `mobile` text DEFAULT NULL,
  `pincode` text DEFAULT NULL,
  `landmark` text DEFAULT NULL,
  `address` text DEFAULT NULL,
  `specialinstruction` text DEFAULT NULL,
  `orderno` text DEFAULT NULL,
  `ispaid` int(11) NOT NULL,
  `paymode` varchar(250) DEFAULT NULL,
  `comment` longtext DEFAULT NULL,
  `ordstatus` varchar(250) DEFAULT NULL,
  `paymentid` varchar(250) DEFAULT NULL,
  `isupload` int(11) NOT NULL,
  `updatebyuserid` int(11) NOT NULL,
  `ts` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `date` varchar(250) DEFAULT NULL,
  `paidstatus` varchar(250) NOT NULL,
  `shipping_name` text DEFAULT NULL,
  `shipping_mobile` varchar(250) DEFAULT NULL,
  `shipping_address` varchar(250) DEFAULT NULL,
  `shipping_pincode` varchar(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ordertbl`
--

INSERT INTO `ordertbl` (`id`, `totmrp`, `grandtot`, `discountedprice`, `carttotal`, `coupondiscountamt`, `updatedate`, `approvestatus`, `featureimg`, `doctorname`, `patientname`, `couponis`, `userid`, `franchiseid`, `name`, `mobile`, `pincode`, `landmark`, `address`, `specialinstruction`, `orderno`, `ispaid`, `paymode`, `comment`, `ordstatus`, `paymentid`, `isupload`, `updatebyuserid`, `ts`, `date`, `paidstatus`, `shipping_name`, `shipping_mobile`, `shipping_address`, `shipping_pincode`) VALUES
(28, '2999', '1599', '1599', '1599', '', NULL, 0, NULL, NULL, NULL, '', 0, 0, 'Souvik De', '9775483913', '712408', NULL, 'kolkata', NULL, '1025', 0, NULL, NULL, 'New', NULL, 0, 0, '2023-06-18 11:46:24', '2023-05-22', '', NULL, NULL, NULL, NULL),
(55, '1000', '990', '990', '990', '', NULL, 0, NULL, NULL, NULL, '', 1, 0, 'Soumi Chakraborty', '444444444444444444', 'adadadd', NULL, 'hkhklhjklhklhlihkilhklkl221676317868', NULL, '1026', 0, NULL, NULL, 'New', NULL, 0, 0, '2023-06-20 09:39:52', '2023-06-20', '', NULL, NULL, NULL, NULL),
(56, '1000', '900', '900', '900', '', NULL, 0, NULL, NULL, NULL, '', 1, 0, 'Soumi Chakraborty', '9903429704444545454', 'jkjkkjkjkj', NULL, '335A, Mahatma Gandhi Road, Haridevpur', NULL, '1027', 0, NULL, NULL, 'New', NULL, 0, 0, '2023-07-15 08:59:52', '2023-07-15', '', NULL, NULL, NULL, NULL),
(57, '1000', '900', '900', '900', '', NULL, 0, NULL, NULL, NULL, '', 0, 0, 'Souvik De', '9775483913', '712408', NULL, 'kolkata', NULL, '1028', 0, NULL, NULL, 'New', NULL, 0, 0, '2023-07-22 04:55:57', '2023-07-22', '', NULL, NULL, NULL, NULL),
(58, '1200', '1200', '1200', '1200', '', NULL, 0, NULL, NULL, NULL, '', 1, 0, 'Prithwi Lahiri', '9897876567', '503446', NULL, 'Münstereifeler Str. 31', NULL, '1029', 0, NULL, NULL, 'New', NULL, 0, 0, '2023-07-23 05:53:53', '2023-07-23', '', NULL, NULL, NULL, NULL),
(59, '1200', '1200', '1200', '1200', '', NULL, 0, NULL, NULL, NULL, '', 1, 0, 'Soumi Chakraborty', '9905676789', '700082', NULL, '335A, Mahatma Gandhi Road, Haridevpur', NULL, '1030', 0, NULL, NULL, 'New', NULL, 0, 0, '2023-07-27 09:57:59', '2023-07-27', '', NULL, NULL, NULL, NULL),
(60, '1200', '1200', '1200', '1200', '', NULL, 0, NULL, NULL, NULL, '', 56, 0, 'Prithwi Lahiri', '9904536789', '700001', NULL, 'Mahatma Gandhi Road 12', NULL, '1031', 0, NULL, NULL, 'New', NULL, 0, 0, '2023-07-27 10:25:12', '2023-07-27', '', NULL, NULL, NULL, NULL),
(61, '1200', '1200', '1200', '1200', '', '2023-08-30 11:03:35', 0, NULL, NULL, NULL, '', 1, 0, 'Soumi Chakraborty', '8017793569', '700082', NULL, '335A, Mahatma Gandhi Road, Haridevpur', NULL, '1032', 0, NULL, '', 'Pending', NULL, 0, 1, '2023-08-30 05:33:35', '2023-08-07', '0', 'aa', 'aa', 'a', 'a'),
(62, '3200', '3200', '3200', '3200', '', NULL, 0, NULL, NULL, NULL, '', 1, 0, 'Soumi Chakraborty', '8017793959', '700082', NULL, '335A, Mahatma Gandhi Road, Haridevpur', NULL, '1033', 0, NULL, NULL, 'New', NULL, 0, 0, '2023-09-21 17:08:06', '2023-09-21', '', NULL, NULL, NULL, NULL),
(63, '3200', '3200', '3200', '3200', '', NULL, 0, NULL, NULL, NULL, '', 0, 0, 'Subrata Driver', '9832233322', '', NULL, 'sassa', NULL, '1034', 0, NULL, NULL, 'New', NULL, 0, 0, '2023-09-21 19:46:11', '2023-09-22', '', NULL, NULL, NULL, NULL),
(64, '3200', '3200', '3200', '3200', '', NULL, 0, NULL, NULL, NULL, '', 0, 0, 'Subrata Driver', '9832233322', '', NULL, 'sassa', NULL, '1035', 0, NULL, NULL, 'New', NULL, 0, 0, '2023-09-21 19:47:26', '2023-09-22', '', NULL, NULL, NULL, NULL),
(65, '3200', '3200', '3200', '3200', '', NULL, 0, NULL, NULL, NULL, '', 0, 0, 'Subrata Driver', '9832233322', '', NULL, 'sassa', NULL, '1036', 0, NULL, NULL, 'New', NULL, 0, 0, '2023-09-21 19:50:28', '2023-09-22', '', NULL, NULL, NULL, NULL),
(66, '320000', '320000', '320000', '320000', '', NULL, 0, NULL, NULL, NULL, '', 1, 0, 'werfwrf', '7894561230', '700025', NULL, 'sfsfsf', NULL, '1037', 0, NULL, NULL, 'New', NULL, 0, 0, '2023-09-24 10:17:29', '2023-09-24', '', NULL, NULL, NULL, NULL),
(67, '320', '320', '320', '320', '', NULL, 0, NULL, NULL, NULL, '', 0, 0, 'Souvik De', '9775483913', '712408', NULL, 'kolkata', NULL, '1038', 0, NULL, NULL, 'New', NULL, 0, 0, '2023-11-09 15:58:41', '2023-11-09', '', NULL, NULL, NULL, NULL),
(68, '320', '320', '320', '320', '', NULL, 0, NULL, NULL, NULL, '', 0, 0, 'Prithwi Lahiri', '9876543210', '711109', NULL, 'Münstereifeler Str.', NULL, '1039', 0, NULL, NULL, 'New', NULL, 0, 0, '2023-12-07 17:30:08', '2023-12-07', '', NULL, NULL, NULL, NULL),
(69, '39040', '39040', '39040', '39040', '', NULL, 0, NULL, NULL, NULL, '', 1, 0, 'prithwi', '9999999999', '711109', NULL, 'hkhhkh', NULL, '1040', 0, NULL, NULL, 'New', NULL, 0, 0, '2023-12-07 18:11:31', '2023-12-07', '', NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `ourmission`
--

CREATE TABLE `ourmission` (
  `id` int(11) NOT NULL,
  `iconimgae` varchar(250) DEFAULT NULL,
  `missiontitle` text DEFAULT NULL,
  `missiondesc` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ourmission`
--

INSERT INTO `ourmission` (`id`, `iconimgae`, `missiontitle`, `missiondesc`) VALUES
(2, '1136239275ic1.PNG', 'Change Live To The Best', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer convallis accumsan mi nec'),
(3, '785537270ic2.PNG', 'Start With A Vision', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer convallis accumsan mi nec'),
(4, '1107732797ic3.PNG', 'Convenient Automation', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer convallis accumsan mi nec'),
(5, '579849598ic4.PNG', 'Education & Upgrowth', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer convallis accumsan mi nec');

-- --------------------------------------------------------

--
-- Table structure for table `pages`
--

CREATE TABLE `pages` (
  `id` int(11) NOT NULL,
  `pgname` varchar(250) DEFAULT NULL,
  `pgurl` text DEFAULT NULL,
  `homepgshowing` int(11) NOT NULL,
  `pgord` int(11) NOT NULL,
  `isdel` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pages`
--

INSERT INTO `pages` (`id`, `pgname`, `pgurl`, `homepgshowing`, `pgord`, `isdel`) VALUES
(1, 'Terms & Conditions', 'terms-conditions', 0, 0, 0),
(2, 'Privacy Policy', 'privacy-policy', 0, 0, 0),
(3, 'Exchange Policy', 'exchange-policy', 0, 0, 0),
(6, 'Help', 'help', 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `partner`
--

CREATE TABLE `partner` (
  `id` int(11) NOT NULL,
  `compnyname` varchar(250) DEFAULT NULL,
  `iconimgae` varchar(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `payer`
--

CREATE TABLE `payer` (
  `id` int(11) NOT NULL,
  `payername` varchar(250) DEFAULT NULL,
  `payeraddress` longtext DEFAULT NULL,
  `payerphone` varchar(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `payer`
--

INSERT INTO `payer` (`id`, `payername`, `payeraddress`, `payerphone`) VALUES
(1, 'Chandan Rajput Banarjee', 'Andul Purbo Para', ''),
(2, 'Sk Salauddin Ali', 'Andul', '');

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` varchar(150) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `product_id` varchar(150) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `payment_id` varchar(45) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `amount` varchar(45) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `order_id` varchar(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `payments`
--

INSERT INTO `payments` (`id`, `user_id`, `product_id`, `payment_id`, `amount`, `order_id`) VALUES
(1, '', '1045', 'pay_LvjAosHwCMAUS8', '1', '1045');

-- --------------------------------------------------------

--
-- Table structure for table `pgbanner`
--

CREATE TABLE `pgbanner` (
  `id` int(11) NOT NULL,
  `bannerurl` text DEFAULT NULL,
  `pgid` int(11) DEFAULT NULL,
  `iconimgae` varchar(250) DEFAULT NULL,
  `title` text DEFAULT NULL,
  `description` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pgbanner`
--

INSERT INTO `pgbanner` (`id`, `bannerurl`, `pgid`, `iconimgae`, `title`, `description`) VALUES
(5, '#', 0, '1920474849WhatsApp_Image_2023-08-22_at_7_44_56_PM.jpeg', '', ''),
(6, 'https://ithubtechnology.com/hpdev/p/details/ethinc-kurtas/12', 0, '338099121_TCC2202-min.JPG', '', ''),
(7, 'https://ithubtechnology.com/hpdev/sc/sarees', 0, '579039736_DSC1257-min.JPG', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `pgcontent`
--

CREATE TABLE `pgcontent` (
  `id` int(11) NOT NULL,
  `pgid` int(11) NOT NULL,
  `metaname` text DEFAULT NULL,
  `metadesc` text DEFAULT NULL,
  `title` text DEFAULT NULL,
  `description` text DEFAULT NULL,
  `iconimgae` varchar(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pgcontent`
--

INSERT INTO `pgcontent` (`id`, `pgid`, `metaname`, `metadesc`, `title`, `description`, `iconimgae`) VALUES
(1, 1, 'Terms & Conditions', 'Terms & Conditions', 'Terms & Conditions', '<h1>This document is an electronic record, generated in compliance with the terms and rules of the Information Technology Act, 2000. Amended provisions, pertaining to electronic records in various statutes, will be in accordance with the amendments made in the Information Technology Act, 2000. This electronic record is generated by a computer system and does not require any physical or digital signature.</h1>\r\n\r\n<p>This document is published in accordance with the provisions of Rule 3 (1) of the Information Technology (Intermediaries guidelines) Rules, 2011 that require publishing the rules and regulations, privacy policy and Terms of Use for access or usage of the website. Please read the following terms and conditions very carefully as your use of the services of this website, the mobile application, both medium also referred to as Flipkart Health, is subject to your acceptance of and compliance with the following terms and conditions.</p>\r\n\r\n<p><strong>Acknowledgement of Terms:</strong>&nbsp;When you access this website&nbsp;you acknowledge that you have read the terms and conditions set forth below and understood that access to this website/mobile application is subject to the provisions of the same. If you do not agree to the terms and conditions set forth below, you should exit this website now.</p>\r\n\r\n<p><strong>Definition</strong></p>\r\n\r\n<p>Medcem pharma means healthcare digital platform consists of Website www.medcempharma.com &amp; retail pharmacy, being controlled and operated by <strong>PAULMED PHARMACY PVT. LTD.&nbsp;</strong>, Bankipur,&nbsp;Premises No. 257, Plot No.260, Action Area - Bankipur, Singur, Hooghly-712409,&nbsp;West Bengal, India.</p>\r\n\r\n<p>The term website shall include Retail pharmacy.</p>\r\n\r\n<p>Pharmacy: Pharmacy means an independent retailer working as Retail Chemists &amp; Druggists and holds a valid license to operate as Retailer under the provisions of Drugs &amp; Cosmetics Act, 1940 and also holds other required licenses and registration under the provisions of applicable laws, hereinafter also referred as Sellers.</p>\r\n\r\n<p>Lab: Lab means pathology lab having valid license/registration/NOC to operate as Pathology under the provisions of Clinical Establishment Act and other laws.</p>\r\n\r\n<p><strong>General Information</strong></p>\r\n\r\n<p>Medcem pharma works as a communication medium between users, pharmacy, Lab and other service providers.</p>\r\n\r\n<p>The communications on Medcem pharma are only in the form of enquiry and indent and are subject to conformity by the said Pharmacy, Lab and Other Service providers.</p>\r\n\r\n<p>Medcem pharma itself is not to sell, to stock, to exhibit, to offer for sale or to distribute medicines, pharmaceutical, healthcare &amp; other related products. Medcem pharma&nbsp;provides information and knowledge and forwards all communication of users among the network of Sellers and all sale, stock, exhibit or offer for sale or distribution is only made from the said sellers. No communication from either side is final and binding. Such communications are only in the form of enquiry or indent and are subject to confirmation by the said sellers. All agreements and contracts are being entered only by the said Sellers</p>\r\n\r\n<p>Medcem pharma is a communication medium. All orders are accepted and fulfilled by Pharmacy subject to verification of valid prescription by said the Pharmacy. Exhibit or any offer for sale, if any, is by the Pharmacy using Medcem pharma.</p>\r\n\r\n<p>For Medicines and Products,&nbsp; Medcem pharma is a technology platform which works as communication medium between Users and Sellers.</p>\r\n\r\n<p>For Lab and other services, Medcem pharma is acting as a communication medium only, all the offer for sale/services are directly from such labs and service providers.</p>\r\n\r\n<p>The information available on Medcem Pharma&nbsp;has been compiled with utmost precision and is for informational purposes only and does not constitute professional advice, recommendation, diagnosis or any kind of treatment. You are advised to seek advice from registered medical practitioner or experts for your personal medical needs and requirements. Taking any action based on any information/content provided on Medcem pharma&nbsp;will be solely at your own risk and Medcem pharma&nbsp;will not be held responsible, under any situation or condition, for your acts.</p>\r\n\r\n<p>It is the duty of the users to read the terms and conditions of Medcem pharma&nbsp;(which is likely to change from time to time) before accessing it.</p>\r\n\r\n<p>Your use of this website, its tools and information are governed by the following terms and conditions (&quot;Terms &amp; Conditions&quot;). If you use this website, you shall have to follow the policies, terms and conditions that are mentioned in this agreement.</p>\r\n\r\n<p>Any individual, who has agreed to become a Registered User of Medcem pharma&nbsp;by providing his/her Personal Identification Data, shall agree to abide by the terms and conditions of this website, which is owned and provided by Medcem pharma.</p>\r\n\r\n<p>ACCESSING, BROWSING OR OTHERWISE USING THIS WEBSITE INDICATES THAT YOU AGREE TO ABIDE BY ALL THE TERMS AND CONDITIONS MENTIONED IN THIS AGREEMENT. SO PLEASE READ THIS AGREEMENT VERY CAREFULLY BEFORE PROCEEDING.</p>\r\n\r\n<p>The information on this website is not intended or implied to be a substitute for professional medical advice, diagnosis or treatment. All content, including text, graphics and information, contained on or available through this website is for general information purposes only. Medcem pharma&nbsp;makes no representation and assumes no responsibility for the accuracy of information contained on or available through this website and such information is subject to change without notice. You are encouraged to confirm any information obtained from or through this website with other sources and review all information regarding any medical condition or treatment with your physician. NEVER DISREGARD PROFESSIONAL MEDICAL ADVICE OR DELAY SEEKING MEDICAL TREATMENT BECAUSE OF SOMETHING YOU HAVE READ ON OR ACCESSED THROUGH ANY WEBSITE.</p>\r\n\r\n<p>Medcem pharma does not recommend, endorse or make any representation about the efficacy, appropriateness or suitability of any specific products, procedures, treatments, opinions or other information that may be contained on or available through this website.</p>\r\n\r\n<p><strong>Law and Jurisdiction</strong></p>\r\n\r\n<p>This Agreement shall be governed by and construed in accordance with the laws of India, including but limited to:</p>\r\n\r\n<ul>\r\n	<li>the Indian Contract Act, 1872 (&quot;Contract Act&quot;);</li>\r\n	<li>the (Indian) Information Technology Act, 2000 (&quot;IT Act&quot;) and the rules, regulations, guidelines and clarifications framed thereunder, including the (Indian) Information Technology (Reasonable Security Practices and Procedures and Sensitive Personal Information) Rules, 2011, and the (Indian) Information Technology (Intermediaries Guidelines) Rules, 2011 (&quot;IG Guidelines&quot;);</li>\r\n	<li>the Drugs and Cosmetic Act, 1940 (&quot;Drugs Act&quot;), read with the Drugs and Cosmetics Rules, 1945 (&quot;Drugs Rules&quot;);</li>\r\n	<li>the Drugs and Magic Remedies (Objectionable Advertisements) Act, 1954 (&quot;Drugs and Magic Act&quot;);</li>\r\n	<li>The Indian Medical Council Act, 1956 read with the Indian Medical Council Rules, 1957;</li>\r\n	<li>Pharmacy Act, 1948 (&quot;Pharmacy Act&quot;) and</li>\r\n	<li>the Consumer Protection Act, 2019 and Consumer Protection (E-Commerce) Rules, 2020.</li>\r\n</ul>\r\n\r\n<p>Any litigation arising out of or in connection with this website shall directly come under the jurisdiction of Bengaluru courts, Karnataka, India only.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><strong>Communication</strong></p>\r\n\r\n<p>While using Medcem pharma you agree to communicate with us via electronic medium. We will communicate with you through e-mails, SMS and phone (mobile, landline or any other medium) for all purposes. You agree that all agreements, notices, disclosures and other communications that we provide you electronically, satisfy any legal requirement that such communications be in writing.</p>\r\n\r\n<p><strong>Remedies</strong></p>\r\n\r\n<p>In the event that the User breaches any of the above-mentioned covenants, this website shall have the right to delete any material relating to the violations without prior notice to the User. This website shall issue a warning to the User to discontinue any activity which leads to the said violations and in the event the User continues with such prohibited activity, this website reserves the unilateral right to suspend or/and deactivate the User&#39;s access to this website, the Service and/or any other related facility. In addition to the right to indemnity available to this website, this website shall have the right to any legal remedy, against the User to recover the loss suffered by this website and the harm caused to the reputation of this website, due to such violation by the User.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><strong>Note:</strong></p>\r\n\r\n<p>The display made on this website and Mobile App are made on behest of MEDCEM PHARMACY which is having valid Drug License Nos. DL-WB/HGL/BIO/R/643637,WB/HGL/NBO/R/643637 as defined under Drugs &amp; Cosmetics Act, 1940 and Rules, 1945.</p>\r\n\r\n<p>Please refer to our Return and Replacement Policy, Cancellation Policy and Shipping Policy before placing order(s) on our Website.</p>\r\n\r\n<p>Please proceed only if you accept all the conditions enumerated herein above, out of your free will and consent.</p>\r\n\r\n<p><strong>Disclaimer:</strong></p>\r\n\r\n<p><strong>Acknowledgement of Terms: When you access this website, you acknowledge that you have read the terms and conditions in the Disclaimer Policy set forth below and understood that access to this website is subject to the provisions of the same. If you do not agree to the terms and conditions in the Disclaimer Policy set forth below, you should exit this website now.</strong>&nbsp;For the purpose of this Disclaimer, wherever the context so requires, &#39;User&#39;, &#39;you&#39; and &#39;your&#39; shall relate to any natural or legal person who visits, browses through, accesses, uses, or become a buyer on, the website by providing Registration Data while registering as Registered User using the computer systems. Medcem pharma allows the User to surf the website or App or making purchases without registering on the Platform. The term &quot;We&quot;, &quot;Us&quot;, &quot;Our&quot; shall mean <strong>MEDCEM PHARMA.</strong></p>\r\n\r\n<p>This website is only for information and communication purpose. This website itself is not to sell, to stock, to exhibit or to offer for sale or to distribute products or drugs. This website is providing information and communication with Independent Licensed Chemist who has represented to Medcem pharma<strong>&nbsp;</strong>that it has due eligibility, qualifications, licenses, and authorizations under applicable law to provide such information and communication. All communications from Users are being forwarded to the said Independent Licensed Chemist and all sale, stock, exhibit or offer for sale or distribution is only made from the said Independent Licensed Chemist. No communication from either User side or Independent Licensed Chemist is final and binding on Medcem pharma Such communications are only in the form of enquiry and indent and are subject to confirmation by the said Independent Licensed Chemist. All agreements and contracts are being entered only between such Independent Licensed Chemists and Users.</p>\r\n\r\n<p>Medcem pharma website is a technology platform which works as communication medium between Users and Independent Licensed Chemist.</p>\r\n\r\n<p>No order for medicine on Medcem pharma&nbsp;website shall be or is being received without a valid Prescription. All the orders and Prescription are being first forwarded to the Independent Licensed Chemists who verifies the Prescription and approves the order and then only medicines are dispensed to the Users by the Qualified Pharmacists of the Independent Licensed Chemist, as represented by Independent Licensed Chemist to Medcem pharma.</p>\r\n\r\n<p>Best efforts have been employed to ensure that the information available on www.medcempharma.com is accurate and complete. Nevertheless, it is the duty of Users to read the terms and conditions (and other applicable policies) of this website (which is likely to change from time to time) before taking any action with respect to the website including but not limited to accessing, using or communicating through the website.</p>\r\n\r\n<p>The Website operate under the banner of <strong>Medcm pharma</strong>, a company incorporated under the Companies Act, 1956 and having its registered office at&nbsp;DAG NO - 2640,KHATIAN NO -3527, JL NO- 63,MOUZA-MIRZAPURBANKIPUR,GROUNDFLOOR.BANKIPUR, P.S.- SINGUR,712409,W.B, INDIA</p>\r\n\r\n<ul>\r\n	<li>Our main objective is to provide pharmaceutical and healthcare information to our Users and to connect our Users to Independent Licensed Chemist. We will neither be responsible for guaranteeing the quality of the medicines and healthcare products nor will be liable for any deficiencies/ defects in the same. Product warranty/guarantee, offered by the manufacturer/s and specified in the product specification section, will be the responsibility of the manufacturer(s) only.</li>\r\n	<li>The prices of various items and their availability on our website are subject to change from time to time without any advance notice to Users, for reasons including but not limited to change in price by the manufacturer and/or due to any Governmental policies.</li>\r\n	<li>Information given here on various medicines and healthcare products and/or services is based on information relayed to Medcem pharma for publishing on the website by third parties and is mainly for informative purposes and is not intended for commercial use. As our website contains information that is created and maintained by a variety of external references / sources, we do not control or guarantee the information contained in / obtained from other external sources, and we do not specifically endorse any products or services offered therein. It is your responsibility to confirm the accuracy, completeness, and usefulness of all product information and to consult with your professional health care provider as to whether the information can benefit you. We assume no responsibility or liability for any consequence resulting directly or indirectly for any action or inaction you take based on or made in reliance on the information, services, or material on or linked to this website. It is imperative to seek professional advice before purchasing or consuming any medicine or healthcare product from the website.</li>\r\n	<li>We do not claim rights on the brands appearing on www.medcempharma.com. Only the respective owners/manufacturers have claims/copyrights/trademarks over these brands.</li>\r\n	<li>Links of other websites may appear on our website (www.medcempharma.com). However, this does not mean that Medcem pharma is associated with or affiliated to these websites. Activities conducted through these websites will solely be the responsibility of the User(s).</li>\r\n	<li>The Website is provided without any warranties or guarantees and is in &quot;As Is&quot; condition. You must bear the risks associated with the use of the Website. We also do not warrant that the website shall be constantly available or available at all.</li>\r\n	<li>Due diligence will be exercised in removing drug(s) and healthcare product(s) and their related information from our website, www.medcempharma.com, on receipt of information about products being banned/ withdrawn by the Government of India or if any major health precaution / warning are issued on a product and any statutory mandate or regulatory guideline prohibits listing or sale of such products over the website. However, Medcem pharma&nbsp;takes no responsibility for any uninformed/misinformed/deliberate orders that are placed on the website with respect to such products before or during the process of delisting of the products under a statutory or regulatory order/guideline. Users are advised to remain informed before placing order or using product/services over the website and Users shall indemnify Medcem pharma for any claims, losses, damages etc arising out of such uninformed/misinformed/deliberate use of Products/Services by the Users.</li>\r\n</ul>\r\n\r\n<p>Under no circumstances, will MEDCEM PHARMA, its affiliates, partners, agents, suppliers, or their respective directors, franchisees, officers, or employees be responsible for any loss or damage to any party (including Users) arising from or in connection with the use of this website or App, use of any products or services on the website or the App, the service and/or any content posted on this website or App or transmitted through the website.</p>\r\n\r\n<p>MEDCEM PHARMA , its affiliates, partners, agents, suppliers, or their respective directors, franchisees, officers, or employees shall not be liable for any loss or damage including any incidental, special, consequential or exemplary damage that may occur, or expenses incurred, due to but not limited to: loss of data, loss of profits, loss of revenue or costs of procurement of substitute goods or services, reduction of profit margins, spoil of goodwill, use of data or other intangible losses arising directly or indirectly, however caused and under any theory of liability, out of or in connection with our website, www.healthplus.flipkart.com or its services, arising out of or in any way connected with the use or performance of this website /products/services on the website and/or of the use of or inability to use and/or for any delay in the Service, including but not limited to contract or tort (including products liability, strict liability and negligence), even if&nbsp; or any of its suppliers have been advised of the possibility of damage. MEDCEM PHARMA shall not be responsible for any delay that may occur while performing any obligation by reason of any event or circumstances outside its control including but not limited to strikes, industrial action, failure of power supplies or equipment, government action or an act of God.</p>\r\n\r\n<p>This website does not warrant the accuracy, completeness and timely availability of the information provided on this website and accepts no responsibility or liability for any error or omission in any information on this website or that the contents of this website are free from viruses or any other infection, which has contaminating or destructive properties. The information, materials or services included in or available through this website, may include inaccuracies or typographical errors, though reasonable care is taken to provide correct and updated information. Changes are periodically made to this website /services and to the information therein. MEDCEM PHARMA may make improvements and/or changes in this website /services at any time. No information received via this website should be treated as medical advice nor should be relied upon for any medical / pharmaceutical related decision and you should consult an appropriate professional for specific advice tailored to your situation.</p>\r\n\r\n<p>MEDCEM PHARMA is not responsible for any incorrect or inaccurate Content posted on this website. MEDCEM PHARMA assumes no responsibility for any error, omission, interruption, deletion, defect, delay in operation or transmission, communications line failure, theft or destruction or unauthorized access to, or alteration of, User communications. MEDCEM PHARMA is not responsible for any problems or technical malfunction of any telephone network or lines, computer on-line-systems, servers or providers, computer equipment, software, failure of email or players on account of technical problems or traffic congestion on the Internet or at any website or combination thereof, including injury or damage to Users or to any other person&#39;s computer related to or resulting from participating or downloading materials in connection with this website.</p>\r\n\r\n<p>The information provided here should not be treated as a substitute of medical advice given by your doctor and/or not to replace the advice of your doctor or the product information provided by the manufacturer of the products. Drug usage details (instructions) are provided on our website as sourced from third parties. We do not provide instructions for usage of product. For the precise information on product, the patient must see the product information available with each of the product and talk to his/her healthcare service provider / doctor.</p>\r\n\r\n<p>We have placed responsibility on the sellers or Independent Licensed Chemists listing products on the website to take care that the products / medicines listed here are from reliable manufacturers. MEDCEM PHARMA shall not be responsible for any misbranded/spurious/adulterated products that any a seller may list or sell through the website. There may be alternate brands available for the same product intended for specific medical conditions. Please consult your doctor in case you have questions on the exact product brand that you require. You may also talk to your doctor about alternative products / medicines. For all purposes and under all circumstances, you must leave all medical decision related to the product and your health to your doctor.</p>\r\n\r\n<p>All drug information provided here refers to generic pharmacology. Although reasonable care has been taken in verifying details provided on the products, as this information is taken from third parties, the website does not take any responsibility for accuracy for each brand, which may have different specification or usage for the same product and also does take any responsibility for meticulous precision inputs for brands, which have different specifications for the same product. The information provided here is only to help Users get a general view of the drug(s) they are consuming. The drug information provided on our website refers to the generic chemical content in the product and may not necessarily apply to the brand completely.</p>\r\n\r\n<p>You specifically agree that MEDCEM PHARMA shall not be responsible for unauthorized access to or alteration of your transmissions or data, any material or data sent or received or not sent or received. You specifically agree that MEDCEM PHARMA is not responsible or liable for any threatening, defamatory, obscene, offensive or illegal content or conduct of any other party or any infringement of another&#39;s rights, including intellectual property rights. You specifically agree that MEDCEM PHARMA is not responsible for any content sent using and/or included in this website by any means.</p>\r\n\r\n<p>In case there is any loss of information, caused due to any reason, whether as a result of any disruption of service, suspension and/or termination of the Service, MEDCEM PHARMA shall not be liable in any way for the same. Further, MEDCEM PHARMA&nbsp;is not responsible for the accuracy, quality and/or contents of any information available, received and/or transmitted through this Service.</p>\r\n\r\n<p>If you are dissatisfied with this website or with any terms, conditions, rules, policies, guidelines, or practices of MEDCEM PHARMA in operating this website, you understand and acknowledge that your only, sole and exclusive remedy is to discontinue using the website.</p>\r\n\r\n<p>The foregoing are subject to the laws of India and the courts in Bengaluru, India only shall have the exclusive jurisdiction on any dispute that may arise out of the use of this website.</p>\r\n\r\n<p>The display made on this website and Mobile App are made on behest of MEDCEM PHARMACY&nbsp;which is having valid Drug License Nos. WB/HGL/BIO/R/643637,<br />\r\nWB/HGL/NBO/R/643637 as defined under Drugs &amp; Cosmetics Act, 1940 and Rules, 1945.</p>\r\n\r\n<p><strong>Please proceed only if you accept all the conditions enumerated herein above, out of your free will and consent.</strong></p>\r\n\r\n<p><br />\r\n<strong>Privacy Policy:</strong></p>\r\n\r\n<p>We value the trust you place in us and recognize the importance of secure transactions and information privacy. This Privacy Policy describes how MEDCEM PHARMA collect, use, share or otherwise process your personal information through the website&nbsp;<a href=\"https://healthplus.flipkart.com/\" target=\"_blank\">https://medcempharma.com/</a>&nbsp;and mobile applications, being controlled and operated by Medcem pharma&nbsp;&nbsp;.This Privacy Policy is an electronic record and is published in compliance with the terms and rules of the Information Technology Act, 2000 including the Information Technology (Reasonable Security Practices and Procedures and Sensitive Personal Data or Information) Rules, 2011 and Information Technology (Intermediary Guidelines and Digital Media Ethics Code) Rules, 2021.</p>\r\n\r\n<p>Medcem pharma works as a communication medium between users, pharmacy, lab and other service providers (hereinafter referred to as &ldquo;Services&rdquo;). By visiting this Platform, providing your information or availing our product/service, you expressly agree to be bound by the terms and conditions of this Privacy Policy, the Terms of Use and the applicable service/product terms and conditions, and agree to be governed by the laws of India including but not limited to the laws applicable to data protection and privacy. If you do not agree please do not use or access our Platform.</p>\r\n\r\n<p>While you may be able to browse certain sections of this platform without registering with us, please be informed that in order to be able to utilize the products or services of this platform such as ordering medicines, you will be required to register with us. Please note, we do not offer any product or services under this Platform outside India and your personal information will primarily be stored and processed in India.</p>\r\n\r\n<p>BY ACCESSING OR USING THIS PLATFORM YOU AGREE TO HAVE READ, UNDERSTOOD AND AGREED TO ADHERE TO ALL THE TERMS OF THIS PRIVACY POLICY AND OUR TERMS AND CONDITIONS.</p>\r\n\r\n<p><br />\r\n<strong>Collection of Personal Information</strong></p>\r\n\r\n<p>When you use our Platform, we collect and store your information which is provided by you from time to time. In general, you can browse the Platform without telling us who you are or revealing any personal information about yourself. Once you give us your personal information, you are not anonymous to us. Where possible, we indicate which fields are required and which fields are optional. You always have the option to not provide information by choosing not to use a particular service, product or feature on the Platform.</p>\r\n\r\n<p>Information that we may collect includes but is not limited to information provided to us during sign-up/registering or using our Platform such as name, date of birth, address, telephone/mobile number, email ID, occupation and any such information shared as proof of identity or address. We may also request you to share your PAN, Government issued ID cards/number and Know-Your-Customer (KYC) details to check your eligibility for certain products and services.</p>\r\n\r\n<p>We may also collect some sensitive personal information such as your bank account or credit or debit card or other payment instrument information or medical or health related information, biometric information such as your facial features or physiological information (in order to enable use of certain features available on the Platform to assist you with your shopping experience), essential to meet our delivery commitments, terms of use, terms of this policy and other legal obligation.</p>\r\n\r\n<p>We may also collect your shopping behavior, preferences, call data records, device location, voice, your browsing history, and other information that you may provide to us from time to time. Our primary goal in doing so is to provide you a safe, efficient, smooth, and customized experience. This allows us to provide services and features that most likely meet your needs, and to customize our Platform to make your experience safer and easier.</p>\r\n\r\n<p>If you enroll into our loyalty program or participate in third party loyalty program offered by us, we will collect and store your personal information such as name, contact number, email address, communication address, date of birth, gender, pin code, lifestyle information, demographic and work details which is provided by you to us or a third-party business partner that operates platforms where you can earn loyalty points for purchase of goods and services, and/or also redeem them.</p>\r\n\r\n<p>We will also collect your information related to your transactions on the Platform and third-party business partner platforms offering products or services on our Platform. When such a third-party business partner collects your personal information directly from you, you will be governed by their privacy policies. We shall not be responsible for the third-party business partner&rsquo;s privacy practices or the content of their privacy policies, and we request you to read their privacy policies prior to disclosing any information.</p>\r\n\r\n<p>If you choose to post messages on our message boards, personalized messages, images, photos, chat rooms or other message areas or leave feedback/product review, testimonial or if you use voice commands to shop on the Platform, you give us your consent to collect, use and process that information you provide to us. Please note such messages posted by you will be in public domain and can be read by others as well, please exercise caution while posting such messages, personal details, photos and reviews. We retain this information as necessary to resolve disputes, provide customer support, internal research and troubleshoot problems as permitted by law. If you send us personal correspondence, such as emails or letters, or if other users or third parties send us correspondence about your activities or postings on the Platform, we may collect such information.</p>\r\n\r\n<p>With your consent, we may have access to your SMS, instant messages, contacts in your directory, location, camera, photo gallery and device information. We may also request you to provide your PAN, Government issued ID cards/number and Know-Your-Customer (KYC) details to: (i) check your eligibility for certain products and services including but not limited to credit and payment products; (ii) issue GST invoice for the products and services purchased for your business requirements; (iii) enhance your experience on the Platform and provide you access to the products and services being offered by us, sellers, affiliates or lending partners. You understand that your access to these products/services may be affected in the event consent is not provided to us.</p>\r\n\r\n<p>If you receive an email, a call from a person/association claiming to be a MEDCEM PHARMA&nbsp;associate seeking sensitive personal information like debit/credit card PIN, net-banking or mobile banking password, we request you to never provide such information. We at Flipkart Health or our affiliate logistics partner do not at any time connect with you requesting for such information. If you have already revealed such information, report it immediately to an appropriate law enforcement agency.</p>\r\n\r\n<p><strong>Customer Care Support</strong></p>\r\n\r\n<p>For any queries or complaints related to product and services please contact our customer care on medcempharmacy855@gmail.com</p>', ''),
(2, 2, 'Privacy Policy', 'Privacy Policy', 'Privacy Policy', '<p>We value the trust you place in us and recognize the importance of secure transactions and information privacy. This Privacy Policy describes how MEDCEM PHARMA collect, use, share or otherwise process your personal information through the website&nbsp;<a href=\"https://healthplus.flipkart.com/\" target=\"_blank\">https://medcempharma.com/</a>&nbsp;and mobile applications, being controlled and operated by Medcem pharma&nbsp;&nbsp;.This Privacy Policy is an electronic record and is published in compliance with the terms and rules of the Information Technology Act, 2000 including the Information Technology (Reasonable Security Practices and Procedures and Sensitive Personal Data or Information) Rules, 2011 and Information Technology (Intermediary Guidelines and Digital Media Ethics Code) Rules, 2021.</p>\r\n\r\n<p>Medcem pharma works as a communication medium between users, pharmacy, lab and other service providers (hereinafter referred to as &ldquo;Services&rdquo;). By visiting this Platform, providing your information or availing our product/service, you expressly agree to be bound by the terms and conditions of this Privacy Policy, the Terms of Use and the applicable service/product terms and conditions, and agree to be governed by the laws of India including but not limited to the laws applicable to data protection and privacy. If you do not agree please do not use or access our Platform.</p>\r\n\r\n<p>While you may be able to browse certain sections of this platform without registering with us, please be informed that in order to be able to utilize the products or services of this platform such as ordering medicines, you will be required to register with us. Please note, we do not offer any product or services under this Platform outside India and your personal information will primarily be stored and processed in India.</p>\r\n\r\n<p>BY ACCESSING OR USING THIS PLATFORM YOU AGREE TO HAVE READ, UNDERSTOOD AND AGREED TO ADHERE TO ALL THE TERMS OF THIS PRIVACY POLICY AND OUR TERMS AND CONDITIONS.</p>\r\n\r\n<p><br />\r\n<strong>Collection of Personal Information</strong></p>\r\n\r\n<p>When you use our Platform, we collect and store your information which is provided by you from time to time. In general, you can browse the Platform without telling us who you are or revealing any personal information about yourself. Once you give us your personal information, you are not anonymous to us. Where possible, we indicate which fields are required and which fields are optional. You always have the option to not provide information by choosing not to use a particular service, product or feature on the Platform.</p>\r\n\r\n<p>Information that we may collect includes but is not limited to information provided to us during sign-up/registering or using our Platform such as name, date of birth, address, telephone/mobile number, email ID, occupation and any such information shared as proof of identity or address. We may also request you to share your PAN, Government issued ID cards/number and Know-Your-Customer (KYC) details to check your eligibility for certain products and services.</p>\r\n\r\n<p>We may also collect some sensitive personal information such as your bank account or credit or debit card or other payment instrument information or medical or health related information, biometric information such as your facial features or physiological information (in order to enable use of certain features available on the Platform to assist you with your shopping experience), essential to meet our delivery commitments, terms of use, terms of this policy and other legal obligation.</p>\r\n\r\n<p>We may also collect your shopping behavior, preferences, call data records, device location, voice, your browsing history, and other information that you may provide to us from time to time. Our primary goal in doing so is to provide you a safe, efficient, smooth, and customized experience. This allows us to provide services and features that most likely meet your needs, and to customize our Platform to make your experience safer and easier.</p>\r\n\r\n<p>If you enroll into our loyalty program or participate in third party loyalty program offered by us, we will collect and store your personal information such as name, contact number, email address, communication address, date of birth, gender, pin code, lifestyle information, demographic and work details which is provided by you to us or a third-party business partner that operates platforms where you can earn loyalty points for purchase of goods and services, and/or also redeem them.</p>\r\n\r\n<p>We will also collect your information related to your transactions on the Platform and third-party business partner platforms offering products or services on our Platform. When such a third-party business partner collects your personal information directly from you, you will be governed by their privacy policies. We shall not be responsible for the third-party business partner&rsquo;s privacy practices or the content of their privacy policies, and we request you to read their privacy policies prior to disclosing any information.</p>\r\n\r\n<p>If you choose to post messages on our message boards, personalized messages, images, photos, chat rooms or other message areas or leave feedback/product review, testimonial or if you use voice commands to shop on the Platform, you give us your consent to collect, use and process that information you provide to us. Please note such messages posted by you will be in public domain and can be read by others as well, please exercise caution while posting such messages, personal details, photos and reviews. We retain this information as necessary to resolve disputes, provide customer support, internal research and troubleshoot problems as permitted by law. If you send us personal correspondence, such as emails or letters, or if other users or third parties send us correspondence about your activities or postings on the Platform, we may collect such information.</p>\r\n\r\n<p>With your consent, we may have access to your SMS, instant messages, contacts in your directory, location, camera, photo gallery and device information. We may also request you to provide your PAN, Government issued ID cards/number and Know-Your-Customer (KYC) details to: (i) check your eligibility for certain products and services including but not limited to credit and payment products; (ii) issue GST invoice for the products and services purchased for your business requirements; (iii) enhance your experience on the Platform and provide you access to the products and services being offered by us, sellers, affiliates or lending partners. You understand that your access to these products/services may be affected in the event consent is not provided to us.</p>\r\n\r\n<p>If you receive an email, a call from a person/association claiming to be a MEDCEM PHARMA&nbsp;associate seeking sensitive personal information like debit/credit card PIN, net-banking or mobile banking password, we request you to never provide such information. We at Flipkart Health or our affiliate logistics partner do not at any time connect with you requesting for such information. If you have already revealed such information, report it immediately to an appropriate law enforcement agency.</p>\r\n\r\n<p><strong>Customer Care Support</strong></p>\r\n\r\n<p>For any queries or complaints related to product and services please contact our customer care on medcempharmacy855@gmail.com</p>', ''),
(3, 3, 'Return and Exchange', 'Return and Exchange', 'Return and Exchange Policy', '<h1>Returns &amp; Exchange Policy</h1>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><strong>We do not have a Return policy.</strong></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>We always strive to make sure that you love our product as we loved making it for you.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>However, we&#39;d be happy to exchange it in the following cases:</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<ul>\r\n	<li>A completely different item has been delivered to you, not matching the item mentioned in your confirmation email/message.</li>\r\n	<li>The garment you purchased has been delivered with a manufacturing defect.&nbsp;</li>\r\n	<li>The garment is not of the right size that you expected (even though the size you ordered and the size that was delivered are the same), it is eligible for an exchange only with another product available in our catalogue at that time.&nbsp;</li>\r\n</ul>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><strong>How do I know if the item delivered is eligible for an exchange?</strong></p>\r\n\r\n<ol>\r\n	<li>Exchange is not accepted due to color differences. Color differences might be due to the screen resolution of the camera used for providing parcel opening video and lighting variations.</li>\r\n	<li>Any exchange requests provided after 5 days of delivery will not be accepted by the House of Poshaki under any circumstances.&nbsp;</li>\r\n	<li>Used, washed, torn, ironed, and altered products are not covered under our exchange policy.</li>\r\n	<li>Any Customised products sold by us are also not available for an exchange.</li>\r\n	<li>Item missing tags, invoices, and packaging provided by us are also not eligible for an exchange.</li>\r\n	<li>International Products are not exchangeable.</li>\r\n</ol>\r\n\r\n<p><strong>What is not a manufacturing defect?</strong></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<ol>\r\n	<li>Any loose thread in the fabric on the inner side of the item is proof of the original chikankari. Thus, those will be disregarded as manufacturing defects and no exchange policy applies on the same.</li>\r\n</ol>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><strong>How do you exchange an item delivered to you?</strong></p>\r\n\r\n<p>You have to provide a&nbsp;<em>Parcel Opening Video</em>(uncut) and make sure that the tags and packaging provided by us are kept intact and the product is unused (not even washed).&nbsp;</p>\r\n\r\n<p>You can email us at <a href=\"mailto:info@houseofposhaki.com\">info@houseofposhaki.com</a> with the SUBJECT line: &ldquo;(Order Number) + EXCHANGE&rdquo; within 24 hours of receiving the product(s).</p>\r\n\r\n<p><strong><em>Note:</em></strong><em> Please ensure that you contact us(via Email/Whatsapp/Facebook/Instagram) within 5 days of the delivery (marked complete), to go ahead with the return process.</em></p>\r\n\r\n<p><strong>When can I say an item is successfully exchanged?</strong></p>\r\n\r\n<p>The item can be called successfully exchanged after all the below points are considered ticked:</p>\r\n\r\n<ol>\r\n	<li>The item is PROVISIONALLY ACCEPTED after the parcel opening video is sent to us requesting for an exchange.</li>\r\n	<li>The item is successfully delivered to us and we have verified the same.&nbsp;</li>\r\n</ol>\r\n\r\n<p>On acceptance of an exchange, we would provide:</p>\r\n\r\n<ol>\r\n	<li>The status of the item would change to EXCHANGE ACCEPTED and,</li>\r\n	<li>An open voucher provided to you immediately of the amount the item was (of the actual price paid by you)</li>\r\n</ol>\r\n\r\n<p><strong>How do I get a replacement?</strong></p>\r\n\r\n<ol>\r\n	<li>Use the voucher code provided by us and select the item of your choice from our website</li>\r\n	<li>While purchasing, provide the voucher code and place the order.</li>\r\n	<li>The order should be greater than or equal to the voucher value provided to you. This can be even more than 1 item from our catalog.</li>\r\n</ol>\r\n\r\n<p><br />\r\n<br />\r\n&nbsp;</p>\r\n\r\n<p><strong>Can I use multiple voucher codes for exchange?</strong></p>\r\n\r\n<ol>\r\n	<li>Multiple exchange voucher codes cannot be clubbed in a single order</li>\r\n	<li>Exchange voucher codes cannot be used with any promotional voucher codes for any order.</li>\r\n	<li>If the exchange voucher code has not been used while ordering, it cannot be added to the order at later stages.</li>\r\n	<li>Exchange voucher codes are available for 30 days from the item received at the House of Poshaki in the exchange process.</li>\r\n</ol>\r\n\r\n<h3>Products that cannot be returned</h3>\r\n\r\n<ul>\r\n	<li>The product is in unsealed/opened/used condition.</li>\r\n	<li>Products marked as Non-returnable.</li>\r\n	<li>All temperature-controlled products (like Insulin, Injection, Temperature Controlled Eye Drops, Chocolates etc.).</li>\r\n	<li>Undergarments as this category is excluded from our general return policy due to hygiene reasons.</li>\r\n</ul>\r\n\r\n<h3>&nbsp;</h3>\r\n\r\n<h3>Cancellation Policy:</h3>\r\n\r\n<ul>\r\n	<li>You can cancel an order by clicking on the Cancel link/button.</li>\r\n	<li>You will be able to cancel an order till the time it is dispatched from the seller. In case you are unable to cancel an order from the&nbsp;website, you can reject the order at doorstep.</li>\r\n</ul>\r\n\r\n<h3>Refund Policy:</h3>\r\n\r\n<h3>Refund against Cancellation:</h3>\r\n\r\n<p>Customers shall get Refund against Cancellation of Order or any failed payment by way of credit to the original mode of payment - Credit/Debit Card, or Net banking or Third Party Wallet.</p>\r\n\r\n<h3>Refund against Return:</h3>\r\n\r\n<ul>\r\n	<li>In case of COD orders, customers will get refund against Return in Bank Account No. entered by Customer within 5 days from the date of handover of product.</li>\r\n	<li>In case of online paid orders, customers shall get Refund against return by way of credit to the original mode of payment - Credit/Debit Card, or Net banking or Third Party Wallet.</li>\r\n</ul>\r\n\r\n<p>In case of refund by way of Credit/Debit Card, or Net banking or Third Party Wallet, you may get the credit within 7 to 15 working days. While we regret any inconvenience caused by this time frame, as the refund is handled by the Bank. There may be a delay in refund timing and we have no control over that.</p>\r\n\r\n<p>In case of any query related to a refund, please call our customer service desk at 6295418818 or email us at medcempharmacy855@gmail.com</p>\r\n\r\n<p><br />\r\n<strong>Other Terms Feedback and Suggestions</strong></p>\r\n\r\n<p>We appreciate feedback and suggestions from our users. However, medcem pharma reserves the right to control and monitor the posting of all feedback and suggestions from the user end. Once posted, the contents will be treated as &quot;public&quot; and we take no responsibility for any content posted by a user or any third party. We are also under no obligation, whatsoever to respond to any content posted on our site.</p>\r\n\r\n<p>By continuing to use this website, you hereby grant Medcem Pharma and its affiliates and sub-licensee a perpetual, irrevocable, non-terminable, worldwide, royalty-free, and non-exclusive license to use, copy, distribute, publicly display, modify, and create derivative works from such materials or any part of such materials.</p>\r\n\r\n<p><br />\r\n<strong>Customer Care Support</strong></p>\r\n\r\n<p>For any queries or complaints related to products and services please contact our customer care at medcempharmacy855@gmail.com</p>', '');
INSERT INTO `pgcontent` (`id`, `pgid`, `metaname`, `metadesc`, `title`, `description`, `iconimgae`) VALUES
(4, 4, 'Disclaimer', 'Disclaimer', 'Disclaimer', '<p><strong>Acknowledgement of Terms: When you access this website, you acknowledge that you have read the terms and conditions in the Disclaimer Policy set forth below and understood that access to this website is subject to the provisions of the same. If you do not agree to the terms and conditions in the Disclaimer Policy set forth below, you should exit this website now.</strong>&nbsp;For the purpose of this Disclaimer, wherever the context so requires, &#39;User&#39;, &#39;you&#39; and &#39;your&#39; shall relate to any natural or legal person who visits, browses through, accesses, uses, or become a buyer on, the website by providing Registration Data while registering as Registered User using the computer systems. Medcem pharma allows the User to surf the website or App or making purchases without registering on the Platform. The term &quot;We&quot;, &quot;Us&quot;, &quot;Our&quot; shall mean <strong>MEDCEM PHARMA.</strong></p>\r\n\r\n<p>This website is only for information and communication purpose. This website itself is not to sell, to stock, to exhibit or to offer for sale or to distribute products or drugs. This website is providing information and communication with Independent Licensed Chemist who has represented to Medcem pharma<strong>&nbsp;</strong>that it has due eligibility, qualifications, licenses, and authorizations under applicable law to provide such information and communication. All communications from Users are being forwarded to the said Independent Licensed Chemist and all sale, stock, exhibit or offer for sale or distribution is only made from the said Independent Licensed Chemist. No communication from either User side or Independent Licensed Chemist is final and binding on Medcem pharma Such communications are only in the form of enquiry and indent and are subject to confirmation by the said Independent Licensed Chemist. All agreements and contracts are being entered only between such Independent Licensed Chemists and Users.</p>\r\n\r\n<p>Medcem pharma website is a technology platform which works as communication medium between Users and Independent Licensed Chemist.</p>\r\n\r\n<p>No order for medicine on Medcem pharma&nbsp;website shall be or is being received without a valid Prescription. All the orders and Prescription are being first forwarded to the Independent Licensed Chemists who verifies the Prescription and approves the order and then only medicines are dispensed to the Users by the Qualified Pharmacists of the Independent Licensed Chemist, as represented by Independent Licensed Chemist to Medcem pharma.</p>\r\n\r\n<p>Best efforts have been employed to ensure that the information available on www.medcempharma.com is accurate and complete. Nevertheless, it is the duty of Users to read the terms and conditions (and other applicable policies) of this website (which is likely to change from time to time) before taking any action with respect to the website including but not limited to accessing, using or communicating through the website.</p>\r\n\r\n<p>The Website operate under the banner of PAULMED PHARMACY PVT. LTD., a company incorporated under the Companies Act, 1956 and having its registered office at&nbsp;DAG NO - 2640,KHATIAN NO -3527, JL NO- 63,MOUZA-MIRZAPURBANKIPUR,GROUNDFLOOR.BANKIPUR, P.S.- SINGUR,712409,W.B, INDIA</p>\r\n\r\n<ul>\r\n	<li>Our main objective is to provide pharmaceutical and healthcare information to our Users and to connect our Users to Independent Licensed Chemist. We will neither be responsible for guaranteeing the quality of the medicines and healthcare products nor will be liable for any deficiencies/ defects in the same. Product warranty/guarantee, offered by the manufacturer/s and specified in the product specification section, will be the responsibility of the manufacturer(s) only.</li>\r\n	<li>The prices of various items and their availability on our website are subject to change from time to time without any advance notice to Users, for reasons including but not limited to change in price by the manufacturer and/or due to any Governmental policies.</li>\r\n	<li>Information given here on various medicines and healthcare products and/or services is based on information relayed to Medcem pharma for publishing on the website by third parties and is mainly for informative purposes and is not intended for commercial use. As our website contains information that is created and maintained by a variety of external references / sources, we do not control or guarantee the information contained in / obtained from other external sources, and we do not specifically endorse any products or services offered therein. It is your responsibility to confirm the accuracy, completeness, and usefulness of all product information and to consult with your professional health care provider as to whether the information can benefit you. We assume no responsibility or liability for any consequence resulting directly or indirectly for any action or inaction you take based on or made in reliance on the information, services, or material on or linked to this website. It is imperative to seek professional advice before purchasing or consuming any medicine or healthcare product from the website.</li>\r\n	<li>We do not claim rights on the brands appearing on www.medcempharma.com. Only the respective owners/manufacturers have claims/copyrights/trademarks over these brands.</li>\r\n	<li>Links of other websites may appear on our website (www.medcempharma.com). However, this does not mean that Medcem pharma is associated with or affiliated to these websites. Activities conducted through these websites will solely be the responsibility of the User(s).</li>\r\n	<li>The Website is provided without any warranties or guarantees and is in &quot;As Is&quot; condition. You must bear the risks associated with the use of the Website. We also do not warrant that the website shall be constantly available or available at all.</li>\r\n	<li>Due diligence will be exercised in removing drug(s) and healthcare product(s) and their related information from our website, www.medcempharma.com, on receipt of information about products being banned/ withdrawn by the Government of India or if any major health precaution / warning are issued on a product and any statutory mandate or regulatory guideline prohibits listing or sale of such products over the website. However, Medcem pharma&nbsp;takes no responsibility for any uninformed/misinformed/deliberate orders that are placed on the website with respect to such products before or during the process of delisting of the products under a statutory or regulatory order/guideline. Users are advised to remain informed before placing order or using product/services over the website and Users shall indemnify Medcem pharma for any claims, losses, damages etc arising out of such uninformed/misinformed/deliberate use of Products/Services by the Users.</li>\r\n</ul>\r\n\r\n<p>Under no circumstances, will MEDCEM PHARMA, its affiliates, partners, agents, suppliers, or their respective directors, franchisees, officers, or employees be responsible for any loss or damage to any party (including Users) arising from or in connection with the use of this website or App, use of any products or services on the website or the App, the service and/or any content posted on this website or App or transmitted through the website.</p>\r\n\r\n<p>MEDCEM PHARMA , its affiliates, partners, agents, suppliers, or their respective directors, franchisees, officers, or employees shall not be liable for any loss or damage including any incidental, special, consequential or exemplary damage that may occur, or expenses incurred, due to but not limited to: loss of data, loss of profits, loss of revenue or costs of procurement of substitute goods or services, reduction of profit margins, spoil of goodwill, use of data or other intangible losses arising directly or indirectly, however caused and under any theory of liability, out of or in connection with our website, www.healthplus.flipkart.com or its services, arising out of or in any way connected with the use or performance of this website /products/services on the website and/or of the use of or inability to use and/or for any delay in the Service, including but not limited to contract or tort (including products liability, strict liability and negligence), even if&nbsp; or any of its suppliers have been advised of the possibility of damage. MEDCEM PHARMA shall not be responsible for any delay that may occur while performing any obligation by reason of any event or circumstances outside its control including but not limited to strikes, industrial action, failure of power supplies or equipment, government action or an act of God.</p>\r\n\r\n<p>This website does not warrant the accuracy, completeness and timely availability of the information provided on this website and accepts no responsibility or liability for any error or omission in any information on this website or that the contents of this website are free from viruses or any other infection, which has contaminating or destructive properties. The information, materials or services included in or available through this website, may include inaccuracies or typographical errors, though reasonable care is taken to provide correct and updated information. Changes are periodically made to this website /services and to the information therein. MEDCEM PHARMA may make improvements and/or changes in this website /services at any time. No information received via this website should be treated as medical advice nor should be relied upon for any medical / pharmaceutical related decision and you should consult an appropriate professional for specific advice tailored to your situation.</p>\r\n\r\n<p>MEDCEM PHARMA is not responsible for any incorrect or inaccurate Content posted on this website. MEDCEM PHARMA assumes no responsibility for any error, omission, interruption, deletion, defect, delay in operation or transmission, communications line failure, theft or destruction or unauthorized access to, or alteration of, User communications. MEDCEM PHARMA is not responsible for any problems or technical malfunction of any telephone network or lines, computer on-line-systems, servers or providers, computer equipment, software, failure of email or players on account of technical problems or traffic congestion on the Internet or at any website or combination thereof, including injury or damage to Users or to any other person&#39;s computer related to or resulting from participating or downloading materials in connection with this website.</p>\r\n\r\n<p>The information provided here should not be treated as a substitute of medical advice given by your doctor and/or not to replace the advice of your doctor or the product information provided by the manufacturer of the products. Drug usage details (instructions) are provided on our website as sourced from third parties. We do not provide instructions for usage of product. For the precise information on product, the patient must see the product information available with each of the product and talk to his/her healthcare service provider / doctor.</p>\r\n\r\n<p>We have placed responsibility on the sellers or Independent Licensed Chemists listing products on the website to take care that the products / medicines listed here are from reliable manufacturers. MEDCEM PHARMA shall not be responsible for any misbranded/spurious/adulterated products that any a seller may list or sell through the website. There may be alternate brands available for the same product intended for specific medical conditions. Please consult your doctor in case you have questions on the exact product brand that you require. You may also talk to your doctor about alternative products / medicines. For all purposes and under all circumstances, you must leave all medical decision related to the product and your health to your doctor.</p>\r\n\r\n<p>All drug information provided here refers to generic pharmacology. Although reasonable care has been taken in verifying details provided on the products, as this information is taken from third parties, the website does not take any responsibility for accuracy for each brand, which may have different specification or usage for the same product and also does take any responsibility for meticulous precision inputs for brands, which have different specifications for the same product. The information provided here is only to help Users get a general view of the drug(s) they are consuming. The drug information provided on our website refers to the generic chemical content in the product and may not necessarily apply to the brand completely.</p>\r\n\r\n<p>You specifically agree that MEDCEM PHARMA shall not be responsible for unauthorized access to or alteration of your transmissions or data, any material or data sent or received or not sent or received. You specifically agree that MEDCEM PHARMA is not responsible or liable for any threatening, defamatory, obscene, offensive or illegal content or conduct of any other party or any infringement of another&#39;s rights, including intellectual property rights. You specifically agree that MEDCEM PHARMA is not responsible for any content sent using and/or included in this website by any means.</p>\r\n\r\n<p>In case there is any loss of information, caused due to any reason, whether as a result of any disruption of service, suspension and/or termination of the Service, MEDCEM PHARMA shall not be liable in any way for the same. Further, MEDCEM PHARMA&nbsp;is not responsible for the accuracy, quality and/or contents of any information available, received and/or transmitted through this Service.</p>\r\n\r\n<p>If you are dissatisfied with this website or with any terms, conditions, rules, policies, guidelines, or practices of MEDCEM PHARMA in operating this website, you understand and acknowledge that your only, sole and exclusive remedy is to discontinue using the website.</p>\r\n\r\n<p>The foregoing are subject to the laws of India and the courts in Bengaluru, India only shall have the exclusive jurisdiction on any dispute that may arise out of the use of this website.</p>\r\n\r\n<p>The display made on this website and Mobile App are made on behest of MEDCEM PHARMACY&nbsp;which is having valid Drug License Nos. WB/HGL/BIO/R/643637,<br />\r\nWB/HGL/NBO/R/643637 as defined under Drugs &amp; Cosmetics Act, 1940 and Rules, 1945.</p>\r\n\r\n<p><strong>Please proceed only if you accept all the conditions enumerated herein above, out of your free will and consent.</strong></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><strong>Customer Care Support</strong></p>\r\n\r\n<p>For any queries or complaints related to product and services please contact our customer care on medcempharmacy855@gmail.com</p>', ''),
(5, 5, 'Contact Us', 'Contact Us', 'Contact Us', '<h2>&nbsp;</h2>\r\n\r\n<p>&nbsp;</p>', ''),
(6, 6, '', '', 'help', '<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>', '');

-- --------------------------------------------------------

--
-- Table structure for table `photos`
--

CREATE TABLE `photos` (
  `id` int(11) NOT NULL,
  `image` varchar(250) NOT NULL,
  `blogid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `photos`
--

INSERT INTO `photos` (`id`, `image`, `blogid`) VALUES
(2, '13170260761mf1V51CQL__UL1001_.jpg', 3),
(4, '167924309871Gz-lh5TQL._UY500_.jpg', 3);

-- --------------------------------------------------------

--
-- Table structure for table `pincode`
--

CREATE TABLE `pincode` (
  `id` int(11) NOT NULL,
  `pin` int(11) NOT NULL,
  `delivery_charges` varchar(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pincode`
--

INSERT INTO `pincode` (`id`, `pin`, `delivery_charges`) VALUES
(1, 700156, '20'),
(2, 712408, '20');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `metatitle` text CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `metadesc` text CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `iconlogo` varchar(250) DEFAULT NULL,
  `featureimg` varchar(250) DEFAULT NULL,
  `datasheet` varchar(250) DEFAULT NULL,
  `title` text CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `batchno` varchar(250) DEFAULT NULL,
  `expiredate` varchar(250) DEFAULT NULL,
  `normalprice` varchar(250) DEFAULT NULL,
  `offerprice` varchar(250) DEFAULT NULL,
  `weight` varchar(250) DEFAULT NULL,
  `sku` varchar(250) DEFAULT NULL,
  `composition` text DEFAULT NULL,
  `slugurl` text CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `shortdesc` text CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `description` longtext CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `brandid` varchar(250) DEFAULT NULL,
  `ageno` varchar(250) DEFAULT NULL,
  `colorid` varchar(250) DEFAULT NULL,
  `tag` varchar(250) DEFAULT NULL,
  `tagurl` text CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `postdate` varchar(250) DEFAULT NULL,
  `manufacture` text DEFAULT NULL,
  `hsncode` varchar(250) DEFAULT NULL,
  `mandateprescription` int(11) DEFAULT NULL,
  `isfeatured` int(11) DEFAULT NULL,
  `iseditorpick` int(11) DEFAULT NULL,
  `isactive` int(11) DEFAULT NULL,
  `ts` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `readcount` int(11) DEFAULT NULL,
  `userid` int(11) DEFAULT NULL,
  `maincatid` varchar(250) DEFAULT NULL,
  `productattributeid` text DEFAULT NULL,
  `subcatid` varchar(250) DEFAULT NULL,
  `childcatid` varchar(250) DEFAULT NULL,
  `stock` varchar(250) DEFAULT NULL,
  `commission` varchar(250) DEFAULT NULL,
  `gstpercent` varchar(50) DEFAULT NULL,
  `gstvalue` varchar(250) DEFAULT NULL,
  `isbestsell` int(11) DEFAULT NULL,
  `specialcatid` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `metatitle`, `metadesc`, `iconlogo`, `featureimg`, `datasheet`, `title`, `batchno`, `expiredate`, `normalprice`, `offerprice`, `weight`, `sku`, `composition`, `slugurl`, `shortdesc`, `description`, `brandid`, `ageno`, `colorid`, `tag`, `tagurl`, `postdate`, `manufacture`, `hsncode`, `mandateprescription`, `isfeatured`, `iseditorpick`, `isactive`, `ts`, `readcount`, `userid`, `maincatid`, `productattributeid`, `subcatid`, `childcatid`, `stock`, `commission`, `gstpercent`, `gstvalue`, `isbestsell`, `specialcatid`) VALUES
(10, '', '', '', '882883216_DSC1113-min.JPG', NULL, 'Kota Doria Saree', '', '', '320', '', '20gm', 'WKCSC', '', 'kota-doria-saree', '', '<p>eget velit. Donec ac tempus ante. Fusce ultricies massa massa. Fusce aliquam, purus eget sagittis vulputate, sapien libero hendrerit est, sed commodo augue nisi non neque. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed tempor, lorem et placerat vestibulum, metus nisi posuere nisl, in</p>', '', '', '', '', '', '', NULL, '', 0, 1, 0, 0, '2023-12-07 18:09:45', NULL, 1, '20,30,31', NULL, '21', '', '120', '', '', '0', 1, NULL),
(12, '', '', '', '526719665IMG_7888_(1).jpg', NULL, 'Ethinc Kurtas', '', '', '1000', '900', '20gm', 'WKCSC', '', 'ethinc-kurtas', '', '<p>eget velit. Donec ac tempus ante. Fusce ultricies massa massa. Fusce aliquam, purus eget sagittis vulputate, sapien libero hendrerit est, sed commodo augue nisi non neque. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed tempor, lorem et placerat vestibulum, metus nisi posuere nisl, in</p>', '', '', '', '', '', '', NULL, '', 0, 1, 0, 0, '2023-09-27 06:37:22', NULL, 1, '24,30', NULL, '', '', '20', '', '', '0', 1, 0),
(13, '', '', '', '1426819609IMG_7918.jpg', NULL, 'Mukaish Viscose', '', '', '1500', '', '200', 'HOPMVP001', '', 'mukaish-viscose', '', '<p>Viscose Mukaish Peach Kurti</p>', '', '', '', '', '', '', NULL, '', 0, 1, 0, 0, '2023-10-16 20:09:24', NULL, 1, '24,30,31', NULL, '', '', '2', '', '', '0', 1, NULL),
(17, '', '', '', '1078902297c2.png', NULL, 'Test item', '', '', '100', '20', '2', '2', '', 'test-item', '', '<p>due</p>', '', '', '', '', '', '', NULL, ' ', 0, 1, 0, 0, '2024-01-02 05:23:49', NULL, 1, '32', NULL, '', '', '1', '', '0', '0', 1, NULL),
(18, '', '', '', '3660729661636133388688.jpg', NULL, 'Short Frock', '', '', '1300', '1000', '200gm', 'HOPSF001', '', 'short-frock', '', '<p>Short Frock Yellow</p>', '', '', '', '', '', '', NULL, '', 0, 0, 0, 0, '2024-01-02 05:49:48', NULL, 1, '20', NULL, '22', '', '2', '', '', '0', 1, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `productvarient`
--

CREATE TABLE `productvarient` (
  `id` int(11) NOT NULL,
  `productid` varchar(250) DEFAULT NULL,
  `color` varchar(250) DEFAULT NULL,
  `size` varchar(250) DEFAULT NULL,
  `stone` varchar(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `productvarient`
--

INSERT INTO `productvarient` (`id`, `productid`, `color`, `size`, `stone`) VALUES
(5, '9', 'red', 'M', NULL),
(7, '10', 'Red', '', NULL),
(8, '9', 'blue', 'L', NULL),
(11, '13', 'Peach', '38', NULL),
(12, '12', '', '', NULL),
(13, '11', '', '', NULL),
(14, '17', '', '', NULL),
(16, '18', 'Yellow', '38', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `product_atribute`
--

CREATE TABLE `product_atribute` (
  `id` int(11) NOT NULL,
  `atbuteoptionid` varchar(250) DEFAULT NULL,
  `patributevalue` varchar(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product_atribute`
--

INSERT INTO `product_atribute` (`id`, `atbuteoptionid`, `patributevalue`) VALUES
(1, '3', 'Men'),
(2, '3', 'Women'),
(3, '2', 'Round'),
(4, '1', 'Rectangle'),
(5, '5', 'Green');

-- --------------------------------------------------------

--
-- Table structure for table `project`
--

CREATE TABLE `project` (
  `id` int(11) NOT NULL,
  `projectname` varchar(250) DEFAULT NULL,
  `address` varchar(250) DEFAULT NULL,
  `createdate` varchar(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `project`
--

INSERT INTO `project` (`id`, `projectname`, `address`, `createdate`) VALUES
(1, 'Nandi Complex', 'Andul Howrah West Bengol', '2020-02-02'),
(2, 'Star Market', 'Chapatala Sankrile', '2020-02-03'),
(3, 'Samar Pal', 'Chapa Tala', '2020-02-28'),
(4, 'Kolyan Hazra', 'Gobindo Pur', '2020-03-03'),
(5, 'Tarafdar Market', 'Sankrile (Chapatala)', '2020-03-10');

-- --------------------------------------------------------

--
-- Table structure for table `purpose`
--

CREATE TABLE `purpose` (
  `id` int(11) NOT NULL,
  `head` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `purpose`
--

INSERT INTO `purpose` (`id`, `head`) VALUES
(1, 'Brokary'),
(2, 'Lebar Contact'),
(3, 'Project Purpose'),
(4, 'Plan');

-- --------------------------------------------------------

--
-- Table structure for table `review`
--

CREATE TABLE `review` (
  `id` int(11) NOT NULL,
  `cname` text DEFAULT NULL,
  `creview` text DEFAULT NULL,
  `featureimg` varchar(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `review`
--

INSERT INTO `review` (`id`, `cname`, `creview`, `featureimg`) VALUES
(1, 'Koushik Das', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.', '2127574481_DSC1146-min.JPG'),
(2, 'Soma Maiti', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.', '1746955654_APS8421-min.JPG'),
(3, 'souvik', 'test', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `servicemain`
--

CREATE TABLE `servicemain` (
  `id` int(11) NOT NULL,
  `metaname` text DEFAULT NULL,
  `metadesc` text DEFAULT NULL,
  `iconimgae` varchar(250) DEFAULT NULL,
  `contenthead1` text DEFAULT NULL,
  `contentdesc1` text DEFAULT NULL,
  `contenthead2` text DEFAULT NULL,
  `contentdesc2` text DEFAULT NULL,
  `contenthead3` text DEFAULT NULL,
  `contentdesc3` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `servicemain`
--

INSERT INTO `servicemain` (`id`, `metaname`, `metadesc`, `iconimgae`, `contenthead1`, `contentdesc1`, `contenthead2`, `contentdesc2`, `contenthead3`, `contentdesc3`) VALUES
(1, 'Service', 'Services', '', 'SERVICES WE PROVIDE IN SYDNEY', '<p>Nunc eu turpis id nulla sodales luctus. Vestibulum fermentum dui faucibus ligula dapibus scelerisque. Etiam laoreet vitae est vitae convallis. Nulla vel laoreet erat, ac dictum magna. Fusce gravida, magna in mollis mattis, mauris tellus consequat eros, ac venenatis augue urna a dui.</p>', 'Why Choose Us', '<p>We bring electric qualifications for all residential home appliance repair work as well as installation job. This includes all device related electric, plumbing &amp; gas. Whatsoever Appliance, we mount and fix all residential home devices. We likewise take care of coffee devices, both residential and commercial. We are a little group of totally certified and also professional Service technicians that concentrate on the listed below stated tasks.</p>\r\n\r\n<ul>\r\n	<li>10 years of experience</li>\r\n	<li>24/7 Service</li>\r\n	<li>100% Satisfaction</li>\r\n	<li>Same day service</li>\r\n	<li>Qualified and Licensed Technicians</li>\r\n	<li>Easy booking</li>\r\n</ul>', 'High Quality Repair Services', '<p>ServiceTec is committed to providing excellent customer service. Our main focus is the premium appliance repair and this is what our team is best at!</p>');

-- --------------------------------------------------------

--
-- Table structure for table `sitemapurl`
--

CREATE TABLE `sitemapurl` (
  `id` int(11) NOT NULL,
  `mapurl` longtext DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sitemapurl`
--

INSERT INTO `sitemapurl` (`id`, `mapurl`) VALUES
(1, 'sc'),
(2, 'https://theindianvoice.net/'),
(3, 'https://theindianvoice.net/news/top-news'),
(4, 'https://theindianvoice.net/news/entertainment'),
(5, 'https://theindianvoice.net/news/coronavirus'),
(6, 'https://theindianvoice.net/news/sports'),
(7, 'https://theindianvoice.net/news/technology'),
(8, 'https://theindianvoice.net/news/lifestyle'),
(9, 'https://theindianvoice.net/news/national'),
(10, 'https://theindianvoice.net/news/international'),
(11, 'https://theindianvoice.net/news/india'),
(12, 'https://theindianvoice.net/news/world'),
(13, 'https://theindianvoice.net/news/bollywood'),
(14, 'https://theindianvoice.net/news/hollywood'),
(15, 'https://theindianvoice.net/news/movie-reviews'),
(16, 'https://theindianvoice.net/news/ipl-2020'),
(17, 'https://theindianvoice.net/news/cricket'),
(18, 'https://theindianvoice.net/news/football'),
(19, 'https://theindianvoice.net/news/tennis'),
(20, 'https://theindianvoice.net/news/gadgets'),
(21, 'https://theindianvoice.net/news/mobiles'),
(22, 'https://theindianvoice.net/news/gaming'),
(23, 'https://theindianvoice.net/news/travel'),
(24, 'https://theindianvoice.net/news/food-recipes'),
(25, 'https://theindianvoice.net/news/horoscope'),
(26, 'https://theindianvoice.net/news/dating'),
(27, 'https://theindianvoice.net/news/fashion'),
(28, 'https://theindianvoice.net/news/2020-10-28/paradise-on-earth-is-on-sale'),
(29, 'https://theindianvoice.net/news/2020-10-27/secretary-of-state-mike-pompeo-says-us-will-stand-with-india'),
(30, 'https://theindianvoice.net/news/2020-10-26/india-records-highest-weekly-drop-in-covid-19'),
(31, 'https://theindianvoice.net/news/2020-10-28/touseef-desired-nikita-tomar-to-change-her-religion-to-accept-him'),
(32, 'https://theindianvoice.net/news/2020-10-28/google-facebook-and-twitter-defend-their-role-on-the-internet-before-the-us-senate'),
(33, 'https://theindianvoice.net/news/2020-10-27/us-senate%20confirms-amy-barrett-Trumps-candidate-as-new-supreme-court-justice'),
(34, 'https://theindianvoice.net/news/2020-10-27/several-dead-in-blast-at-religious-school-in-pakistans-peshawar'),
(35, 'https://theindianvoice.net/news/2020-10-23/pakistan-to-remain-on-the-faft-grey-list-until-february-2021'),
(36, 'https://theindianvoice.net/news/2020-10-23/the-highlights-of-the-debate-between-Donald-Trump-and-Joe-Biden'),
(37, 'https://theindianvoice.net/news/2020-10-25/can-i-get-covid-if-i-spend-fifteen-minutes-in-a-row-person-has-virus'),
(38, 'https://theindianvoice.net/about-us'),
(39, 'https://theindianvoice.net/news/2020-10-27/rbi-shall-inform-the-compound-interest-waiver-program-for-moratoriuml-loans'),
(40, 'https://theindianvoice.net/news/2020-10-19/Paris-Saint-Germain-Manchester-United-Les-Parisiens-is-haunted-by-bad-memories'),
(41, 'https://theindianvoice.net/news/2020-10-25/the-curious-history-of-stethoscope'),
(42, 'https://theindianvoice.net/news/2020-10-20/riots-in-prague-after-a-fan-protest-against-the-suspension-of-football-for-covid'),
(43, 'https://theindianvoice.net/news/2020-10-28/believing-of-a-curse-many-tourists-return-stolen-goods-to-pompeii'),
(44, 'https://theindianvoice.net/news/2020-10-24/can-dogs-%20smell-and-detect-covid-19'),
(45, 'https://theindianvoice.net/news/2020-10-21/court-strict-on-no-entry-for-west-bengals-puja-pandals-set-limits-for-organisers'),
(46, 'https://theindianvoice.net/news/2020-10-19/japan-examines-water-disposal-from-the-nuclear-reactor-in-fukushima-into-the-ocean'),
(47, 'https://theindianvoice.net/news/2020-10-19/benefits-of-retinol-for-your-skin-and-how-to-inculcate-it-in-your-skincare-regime'),
(48, 'https://theindianvoice.net/news/2020-10-19/Dinesh-Karthiks-future-in-the-KKR-is-doomed'),
(49, 'https://theindianvoice.net/news/2020-10-18/koeman-nyom-has-insulted-me-I-will-not-repeat-what-he-said-because-it-is-very-ugly'),
(50, 'https://theindianvoice.net/news/2020-10-23/covid-19-a-disease-that-will-never-be-eradicated'),
(51, 'https://theindianvoice.net/news/2020-10-21/chickpeas-stewed-with-octopus-easy-spooning-recipe-to-eat-well-and-welcome-the-cold'),
(52, 'https://theindianvoice.net/news/2020-10-23/virulent-air-pollution-claims-lives-of-116000-infants'),
(53, 'https://theindianvoice.net/news/2020-10-18/bruno-fernandes-promises-manchester-united-will-not-repeat-the-1-6%20defeat-of-tottenham'),
(54, 'https://theindianvoice.net/news/2020-10-24/farooq-abdullah-nominated-as-president-of-gupkar-alliance'),
(55, 'https://theindianvoice.net/news/2020-10-18/the-atmospheres-of-the-earth-and-the-moon-were-magnetically-connected-billions-of-years-ago'),
(56, 'https://theindianvoice.net/news/2020-10-17/how-to-transform-household-garbage-into-natural-compost'),
(57, 'https://theindianvoice.net/news/business'),
(58, 'https://theindianvoice.net/news/2020-10-28/the-extraordinary-journey-of-the-bird-that-flew-from-alaska-to-new-zealand'),
(59, 'https://theindianvoice.net/news/2020-10-28/what-is-your-prediction-for-today-wednesday-october-28-2020'),
(60, 'https://theindianvoice.net/news/2020-10-29/what-is-your-prediction-for-today-thursday-october-29-2020'),
(61, 'https://theindianvoice.net:443/index.php?s=/Index/\\think\\app/invokefunction&function=call_user_func_array&vars[0]=md5&vars[1][]=HelloThinkPHP21'),
(62, 'https://theindianvoice.net/news/2020-10-29/how-to-choose-the-perfect-dress-according-to-your-body-type'),
(63, 'https://theindianvoice.net/news/2020-10-29/jason-gillespie-expects-that-australia-to-dominate-the-test-series-with-ishant-sharma-injured'),
(64, 'https://theindianvoice.net/news/2020-10-21/union-cabinet-grants-a-bonus-for-30-lakh-central-government-workers'),
(65, 'https://theindianvoice.net/news/2020-10-21/kolkata-looking-to-turn-the-table-against-rcb'),
(66, 'https://theindianvoice.net/news/living-healthy'),
(67, 'https://theindianvoice.net/news/discoveries'),
(68, 'https://theindianvoice.net/news/markets'),
(69, 'https://theindianvoice.net/news/2020-10-27/matthew-mcconaughey-harshly-criticized-on-social-media-after-revealing-his-father-death'),
(70, 'https://theindianvoice.net/news/2020-10-18/Akshay-Kumar-and-Kiara-Advani-release-teaser-with-Burj-Khalifa-song'),
(71, 'https://theindianvoice.net/news/heart'),
(72, 'https://theindianvoice.net/news/2020-10-20/batting-at-number-five-not-upsetting-jos-buttler'),
(73, 'https://theindianvoice.net/news/2020-10-26/who-should-end-up-on-the-iron-throne'),
(74, 'https://theindianvoice.net/news/2020-10-27/tv-star-preetika-chauhan-arrested-for-drug-storage'),
(75, 'https://theindianvoice.net/news/science-environment'),
(76, 'https://theindianvoice.net/disclaimers'),
(77, 'https://theindianvoice.net/privacy-policy'),
(78, 'https://theindianvoice.net/news/diabetes'),
(79, 'https://theindianvoice.net/news/2020-10-23/kapil-dev-undergoes-emergency-angioplasty'),
(80, 'https://theindianvoice.net/news/children'),
(81, 'https://theindianvoice.net/news/2020-10-18/flood-hit-families-to-get-relief-ration-kits-at-doostep-in-hyderabad'),
(82, 'https://theindianvoice.net/news/2020-10-29/india-protests-the-personal-assault-on-french-president-emmanuel-macron'),
(83, 'https://theindianvoice.net/news/2020-10-18/kkr-ready-to-face-the-test-of-Sunrisers-Hyderabad-to-clinch-all-points'),
(84, 'https://theindianvoice.net/news/2020-10-28/zidane-is-optimistic-that-real-madrid-can-still-qualify'),
(85, 'https://theindianvoice.net/news/2020-10-27/world-tourism-falls-between-january-and-august'),
(86, 'https://theindianvoice.net/news/2020-10-20/wasp-121b-the-incandescent-planet-with-seven-metals'),
(87, 'https://theindianvoice.net/news/2020-10-25/plastics-coating-silk-fresh-food'),
(88, 'https://theindianvoice.net/news/2020-10-26/italy-minister-describe-cristiano-ronaldo-as-villain'),
(89, 'https://theindianvoice.net/news/2020-10-28/warne-blasts-marlon-samuels-for-his-obscene-remarks'),
(90, 'https://theindianvoice.net/news/2020-10-24/result-manchester-united-vs-chelsea-0-0'),
(91, 'https://theindianvoice.net/news/2020-10-26/Kessie-is-ready-to-become-a-leader-in-his-club'),
(92, 'https://theindianvoice.net/news/2020-10-27/anthony%20martial%20promises%20to%20erase%20his%20bad%20performance'),
(93, 'https://theindianvoice.net/news/2020-10-28/sanofi%20and-gsk-promise-200-million-doses-of-their-vaccine-for-poor-countries'),
(94, 'https://theindianvoice.net/news/2020-10-26/sap-suffers-worst-stock-trading-day-in-over-two-decades-after-issuing-a-warning-about-its-profits'),
(95, 'https://theindianvoice.net/news/economy'),
(96, 'https://theindianvoice.net/news/cancer'),
(97, 'https://theindianvoice.net/news/2020-10-21/memories-of-nobby-the-agent-who-handcuffed-the-celebrities'),
(98, 'https://theindianvoice.net/news/automobile'),
(99, 'https://theindianvoice.net/news/space'),
(100, 'https://theindianvoice.net/news/2020-10-22/india-is-reopening-its-doors-to-foreigners-restoring-most-visas-with-the-exception-of-tourism'),
(101, 'https://theindianvoice.net/news/2020-10-28/organic-items-a-glance-into-this-healthy-world'),
(102, 'https://theindianvoice.net/news/health'),
(103, 'https://theindianvoice.net/news/2020-10-18/why-qanon-the-sinister-american-conspiracy-has-reached-europe'),
(104, 'https://theindianvoice.net/news/2020-10-20/former-police-officer-files-suit-to-limit-arnab-goswami'),
(105, 'https://theindianvoice.net/news/environment'),
(106, 'https://theindianvoice.net/news/2020-10-20/toyota-develops-a-car-that-will-run-on-solar-energy-and-never-need-recharging'),
(107, 'https://theindianvoice.net/news/2020-10-25/since-gst-has-failed-go-back-to-old-tax-system-uddhav-thackeray'),
(108, 'https://theindianvoice.net/news/2020-10-28/epidemic-scarlet-fever-coexistence-with-the-coronavirus'),
(109, 'https://theindianvoice.net/terms-conditions'),
(110, 'https://theindianvoice.net/news/2020-10-26/ebola-an-ally-in-the-fight-against-brain-tumors'),
(111, 'https://theindianvoice.net/news/science'),
(112, 'https://theindianvoice.net/news/coronavirus-disease'),
(113, 'https://theindianvoice.net/news/2020-10-22/new-south-wales-government-gives-final-nod-to-indo-australia-series'),
(114, 'https://theindianvoice.net/news/2020-10-26/macaulay-culkins-home-alone-mask'),
(115, 'https://theindianvoice.net/news/2020-10-19/france-puts-51-islamist-associations-in-the-spotlight-after-the-attack'),
(116, 'https://theindianvoice.net/news/2020-10-22/why-are-aeroplanes-white'),
(117, 'https://theindianvoice.net/news/2020-10-22/bayern-munich-atletico-madrid-score%204-0-wonder-goal-from-corentin-tolisso'),
(118, 'https://theindianvoice.net/news/2020-10-23/spurs-pick-up-a-comfortable-3-0-win'),
(119, 'https://theindianvoice.net/news/2020-10-23/van-de-beek-has-yet-to-perform-regularly-says-solskjaer'),
(120, 'https://theindianvoice.net/news/2020-10-25/result-liverpool-vs-sheffield-united-2-1'),
(121, 'https://theindianvoice.net/news/2020-10-23/5-reasons-manchester-united-can-destroy-chelsea'),
(122, 'https://theindianvoice.net/news/2020-10-26/nasa-confirms-there-is-water-on-the-moon'),
(123, 'https://theindianvoice.net/news/companies'),
(124, 'https://theindianvoice.net/news/2020-10-26/aliens-could-be-watching-us-from-more-than-a-thousand-nearby-stars'),
(125, 'https://theindianvoice.net/news/2020-10-19/hot-bath-can-burn-fat'),
(126, 'https://theindianvoice.net/news/2020-10-17/aquatic-exoplanet-LHS1140b'),
(127, 'https://theindianvoice.net/news/2020-10-25/calories-in-an-apple'),
(128, 'https://theindianvoice.net/news/2020-10-27/the-deadpool-fly-among-the-new-insects-discovered-in-australia'),
(129, 'https://theindianvoice.net/news/2020-10-28/india-tour-of-australia-dates-revealed'),
(130, 'https://theindianvoice.net/news/2020-10-26/punjab-register-fifth-consecutive-win'),
(131, 'https://theindianvoice.net/news/2020-10-27/machines-will-do-nearly-half-the-jobs-in-just-five-years'),
(132, 'https://theindianvoice.net/news/2020-10-29/barcelona-win-2-0-against-juventus'),
(133, 'https://theindianvoice.net/news/2020-10-19/the-last-bullet-to-save-a-peaceful-brexit-the-lords-have-in-their-hands-to-channel-the-negotiations-with-brussels'),
(134, 'https://theindianvoice.net/news/2020-10-26/travel-ushuaia-land-end-of-world-argentina'),
(135, 'https://theindianvoice.net/news/2020-10-21/duct-tape-can-it-remove-fish-eyes'),
(136, 'https://theindianvoice.net/news/2020-10-22/An%20equation%20to%20determine%20how%20far%20the%20Coronavirus%20travels%20through%20the%20air'),
(137, 'https://theindianvoice.net/news/2020-10-20/actor-jeff-bridges-announces-he-suffers-from-lymphoma'),
(138, 'https://theindianvoice.net/news/2020-10-27/spicy-foods-benefits%20and-contradictions'),
(139, 'https://theindianvoice.net/news/2020-10-21/lazio-dortmund-3-1-haaland-and-sancho-failed-to-save-bvb'),
(140, 'https://theindianvoice.net/news/2020-10-24/Indian%20Women%20team%20reached%20Dubai%20to%20play%20T20%20series'),
(141, 'https://theindianvoice.net/news/2020-10-20/rajasthan-royals-beat-chennai-super-kings-by-seven-wickets'),
(142, 'https://theindianvoice.net/news/2020-10-25/chennai-super-kings-register-eight-wicket-win-over-royal-challengers-bangalore'),
(143, 'https://theindianvoice.net/news/2020-10-21/bollywood-investment-in-lanka-premier-league'),
(144, 'https://theindianvoice.net/news/2020-10-19/bangladesh-has-not-outperformed-india-on-more-appropriate-financial-measurement'),
(145, 'https://theindianvoice.net/news/2020-10-22/scientific-denialism-now-rejects-the-mass-extinction-of-species'),
(146, 'https://theindianvoice.net/news/2020-10-18/warners-wicket-is-my-favourite-lockie'),
(147, 'https://theindianvoice.net/news/2020-10-24/result-barcelona-vs-real-madrid-el-clasico-la-liga'),
(148, 'https://theindianvoice.net/news/2020-10-22/the-most-beautiful-bird-in-the-world'),
(149, 'https://theindianvoice.net/news/2020-10-19/australias-nasal-spray-that-gives-hope-against-covid-19'),
(150, 'https://theindianvoice.net/news/2020-10-21/barcelona-vs-ferencvaros-champions-league'),
(151, 'https://theindianvoice.net/news/2020-10-20/how-art-comes-from-sand-into-bottles'),
(152, 'https://theindianvoice.net/news/2020-10-20/flying-v-promises-to-be-the-most-sustainable-and-friendly-aircraft-with-the-environment'),
(153, 'https://theindianvoice.net/news/2020-10-27/mankind-has-used-more-energy-since-1950-than-in-12000-years-before'),
(154, 'https://theindianvoice.net/news/2020-10-19/coronavirus-india-effective-cases'),
(155, 'https://theindianvoice.net/news/2020-10-21/how-to-block-calls-from-unknown-numbers-by-default-on-iphone-and-android'),
(156, 'https://theindianvoice.net/news/2020-10-27/bunker-in-which-oreo-has-kept-its-cookies'),
(157, 'https://theindianvoice.net/news/2020-10-23/3500-people-evacuated-from-nearby-building-mumbai-mall-fire'),
(158, 'https://theindianvoice.net/news/2020-10-25/mohan-bhagwat-says-india-should-be-bigger-than-china-in-power-and-scope'),
(159, 'https://theindianvoice.net/news/2020-10-24/kapil-dev-on-the-road-to-recovery'),
(160, 'https://theindianvoice.net/news/2020-10-19/the-universe-of-the-little-magician-is-recreated-to-the-smallest-detail'),
(161, 'https://theindianvoice.net/news/2020-10-22/real-madrid-post-a-bad-record-after-30-years'),
(162, 'https://theindianvoice.net/news/2020-10-20/looking-to-make-covid-19-vaccine-prepared-for-everyone-says-narendra-modi'),
(163, 'https://theindianvoice.net/news/2020-10-27/muller-confident-bayern-will-not-have-difficulty-defeating-lokomotiv-moscow'),
(164, 'https://theindianvoice.net/news/2020-10-20/significant-error-have-been-found-all-india-topper-reported-to-be-failed-in-the-neet-2020-examination'),
(165, 'https://theindianvoice.net/news/2020-10-18/9-best-ways-to-control-your-anger'),
(166, 'https://theindianvoice.net/news/2020-10-22/shami-has-the-best%20yorker-glenn-maxwell'),
(167, 'https://theindianvoice.net/news/2020-10-22/csk-may-show-the-door-to-many-senior-players-next-season'),
(168, 'https://theindianvoice.net/news/2020-10-26/kkr-look-to-halt-kings-xi-punjab'),
(169, 'https://theindianvoice.net/news/2020-10-18/kolkata-knight-riders%20beat-sunrisers-hyderabad%20in-super-over'),
(170, 'https://theindianvoice.net/news/2020-10-22/rajasthan-royals-and-sunrisers-hyderabad-will-look-for-all-points'),
(171, 'https://theindianvoice.net/news/2020-10-18/indian-democracy-passing-through-most-difficult-phase-sonia-gandhi'),
(172, 'https://theindianvoice.net/news/2020-10-26/wont-let-anyone-grab-an-inch-of-our-land-rajnath-singh'),
(173, 'https://theindianvoice.net/news/2020-10-21/psg-vs-man-u-the-red-devils-wins-2-1'),
(174, 'https://theindianvoice.net/news/2020-10-19/Stefano-Piolis-Secret-of-AC-Milans-Might-Revealed'),
(175, 'https://theindianvoice.net/news/2020-10-20/australia-seven-deadly-shark-attacks-never-so-many-in-80-years'),
(176, 'https://theindianvoice.net/news/2020-10-23/the-first-leak-of-the-possible-samsung-galaxy-s21-and-s21-ultra'),
(177, 'https://theindianvoice.net/news/2020-10-20/kl-rahul-is-my-favourite-lara'),
(178, 'https://theindianvoice.net/news/2020-10-29/chelsea-beat-krasnodar-4-0-jorginho-misses-a-penalty'),
(179, 'https://theindianvoice.net/news/2020-10-19/india-racks-up-high-altitude-warfare-gears-from-the-us-amid-china-tension'),
(180, 'https://theindianvoice.net/news/2020-10-25/rajasthan-royals-beat-mumbai-indians-ipl-2020'),
(181, 'https://theindianvoice.net/news/2020-10-17/quinny-got-very-smart-cricketing-brain-rohit-sharma'),
(182, 'https://theindianvoice.net/news/2020-10-27/what-is-your-prediction-for-today-monday-october-27-2020'),
(183, 'https://theindianvoice.net/news/2020-10-22/virat-wants-siraj-to-be-consistent'),
(184, 'https://theindianvoice.net/news/2020-10-24/kkr-and-dc-will-face-each-other-the-latter-in-more-comfortable-zone'),
(185, 'https://theindianvoice.net/news/2020-10-27/a-coastal-route-around-Lisbon'),
(186, 'https://theindianvoice.net/news/2020-10-29/the-league-of-legends-world-cup-will-feature-another-asian-final'),
(187, 'https://www.theindianvoice.net/'),
(188, 'https://theindianvoice.net/news/tech'),
(189, 'https://theindianvoice.net/news/2020-10-29/this-is-how-ink-was-made-in-ancient-egypt'),
(190, 'https://theindianvoice.net/news/2020-10-29/china-is-realigning-its-economy'),
(191, 'https://theindianvoice.net/news/2020-10-28/smaller-and-with-more-autonomy-this-will-be-the-next-apple-airpods'),
(192, 'https://theindianvoice.net/news/2020-10-22/rcb-crush-kkr-by-8-wickets'),
(193, 'https://theindianvoice.net/news/2020-10-29/ghus-ke-maara-pakistan-minister-fawad-chaudhury-boasts-on-pulwama-attacks'),
(194, 'https://theindianvoice.net/news/2020-10-23/mumbai-ready-to-face-the-challenge-of-csk'),
(195, 'https://theindianvoice.net/home/'),
(196, 'https://theindianvoice.net/news/2020-10-29/jadejas-brilliance-gives-chennai-victory-in-last-over'),
(197, 'https://theindianvoice.net/news/2020-10-25/rajasthan-royals-face-mumbai-indians-in-ipl'),
(198, 'https://theindianvoice.net/news/2020-10-29/george-clooney-seeks-hope-in-space-with-the-midnight-sky'),
(199, 'https://theindianvoice.net/news/2020-10-29/macron-new-lockdown-in-france-from-friday'),
(200, 'https://theindianvoice.net/news/2020-10-29/having-suffered-a-stroke-increases-the-risk-of-dying-from-coronavirus-three-times'),
(201, 'https://theindianvoice.net/news/2020-10-21/RBI%20to%20buy%20state%20government%20securities%20for%20the%20first%20time%20on%20Thursday%20from%20OMO'),
(202, 'https://theindianvoice.net/news/2020-10-28/the-eu-applies-brexit-to-the-stock-market-and-restricts-the-dual-listing-in-the-united-kingdom'),
(203, 'https://theindianvoice.net/news/2020-10-26/navdeep-saini-uncertain-for-the-mumbai-indians-clash'),
(204, 'https://theindianvoice.net/news/2020-10-25/punjab-pull-off-thrilling-win-over-sunrisers-hyderabad'),
(205, 'https://theindianvoice.net/news/2020-10-29/jadejas-brilliance-gives-chennai-victory-in-last-over?fbclid=IwAR1su1-K2ruv5K67GHyQfWspX9ld3QVXh74dqk4K2HfmpeZoZlm-2H4CXWs'),
(206, 'https://theindianvoice.net/?fbclid=IwAR0uJr0Q_fyZIqA-8lZNEt1ZI0jszobs9l4s1iKF-3rIJph_rDt0XVLWod4'),
(207, 'https://theindianvoice.net/news/2020-10-29/ghus-ke-maara-pakistan-minister-fawad-chaudhury-boasts-on-pulwama-attacks?fbclid=IwAR3rekhP-rtzd5bBL1PWEBhYjcEwZiE41Ig_aGh1STwV0EKSfq-yHeSashc'),
(208, 'https://theindianvoice.net/news/2020-10-22/An'),
(209, 'https://theindianvoice.net/news/2020-10-23/Big'),
(210, 'https://theindianvoice.net/news/2020-10-26/Ariana'),
(211, 'https://theindianvoice.net/news/2020-10-28/Barcelona'),
(212, 'https://theindianvoice.net/news/2020-10-27/us-senate'),
(213, 'https://theindianvoice.net/news/2020-10-20/An'),
(214, 'https://theindianvoice.net/news/2020-10-21/RBI'),
(215, 'https://theindianvoice.net/news/2020-10-24/Indian'),
(216, 'https://theindianvoice.net/news/2020-10-28/sanofi'),
(217, 'https://theindianvoice.net/news/2020-10-21/iPhone'),
(218, 'https://theindianvoice.net/news/2020-10-27/anthony'),
(219, 'https://theindianvoice.net/news/2020-10-24/Chennai'),
(220, 'https://theindianvoice.net/news/2020-10-24/can-dogs-'),
(221, 'https://theindianvoice.net/news/2020-10-21/India-England'),
(222, 'https://theindianvoice.net/news/2020-10-22/shami-has-the-best'),
(223, 'https://theindianvoice.net/news/2020-10-23/sunrisers-wins-do-or'),
(224, 'https://theindianvoice.net/news/2020-10-27/spicy-foods-benefits'),
(225, 'https://theindianvoice.net/news/2020-10-28/the-abs-of-memphis-depay'),
(226, 'https://theindianvoice.net/news/2020-10-23/english-cricketers-will-get'),
(227, 'https://theindianvoice.net/news/2020-10-22/bayern-munich-atletico-madrid-score'),
(228, 'https://theindianvoice.net/news/2020-10-19/FIFA-21-The-best-football-for-console'),
(229, 'https://theindianvoice.net/news/2020-10-29/novak-djokovic-secures-number-one-spot'),
(230, 'https://theindianvoice.net/news/2020-10-21/first-date-with-online-dating-safety-tips'),
(231, 'https://theindianvoice.net/news/2020-10-27/juventus-threatened-with-back-line-crisis'),
(232, 'https://theindianvoice.net/news/2020-10-28/bad-news-without-ronaldo-juventus-wins-less'),
(233, 'https://theindianvoice.net/news/2020-10-27/facebook-launches-its-own-cloud-gaming-service'),
(234, 'https://theindianvoice.net/news/2020-10-25/liverpool-are-looking-to-replace-virgil-van-dijk'),
(235, 'https://theindianvoice.net/news/2020-10-28/srh-top-order-batsman-surprised-me-ricky-ponting'),
(236, 'https://theindianvoice.net/news/2020-10-20/how-to-minimize-babies-exposure-to-microplastics'),
(237, 'https://theindianvoice.net/news/2020-10-27/unrisers-hyderabad-vs-delhi-capitals-match-report'),
(238, 'https://theindianvoice.net/news/2020-10-29/karim-benzema-clears-the-air-with-vinicius-junior'),
(239, 'https://theindianvoice.net/news/2020-10-30/arsenal-beat-dundalk-3-0-in-the-europa-league-clash'),
(240, 'https://theindianvoice.net/news/2020-10-28/manchester-city-have-wasted-the-summer-transfer-market'),
(241, 'https://theindianvoice.net/news/2020-10-30/what-is-your-prediction-for-today-friday-october-30-2020'),
(242, 'https://theindianvoice.net/news/2020-10-25/what-is-your-prediction-for-today-sunday-october-18-2020'),
(243, 'https://theindianvoice.net/news/2020-10-25/what-is-your-prediction-for-today-monday-october-19-2020'),
(244, 'https://theindianvoice.net/news/2020-10-25/what-is-your-prediction-for-today-sunday-october-25-2020'),
(245, 'https://theindianvoice.net/news/2020-10-27/delhi-looking-to-bounce-back-with-a-win-against-hyderabad'),
(246, 'https://theindianvoice.net/news/2020-10-29/marcus-rashfords-quick-hat-trick-that-will-make-ole-proud'),
(247, 'https://theindianvoice.net/news/2020-10-29/us-study-suggests-more-heart-attacks-after-trump-election'),
(248, 'https://theindianvoice.net/news/2020-10-29/kolkata-ready-to-face-the-stern-test-of-chennai-super-kings'),
(249, 'https://theindianvoice.net/news/2020-10-29/hardik-pandya-chris-morris-rebuked-for-an-on-field-argument'),
(250, 'https://theindianvoice.net/news/2020-10-25/what-is-your-prediction-for-today-wednesday-october-21-2020'),
(251, 'https://theindianvoice.net/news/2020-10-19/apple-homepod-mini-the-small-smart-speaker-with-new-features'),
(252, 'https://theindianvoice.net/news/2020-10-26/manchester-city-have-prepared-a-substitute-for-pep-guardiola'),
(253, 'https://theindianvoice.net/news/2020-10-28/mumbai-indians-defeat-royal-challengers-bangalore-by-5-wickets'),
(254, 'https://theindianvoice.net/news/2020-10-24/kkr-beat-delhi-capitals-by-59-runs-for-sixth-win-of-the-season'),
(255, 'https://theindianvoice.net/news/2020-10-18/bruno-fernandes-promises-manchester-united-will-not-repeat-the-1-6'),
(256, 'https://theindianvoice.net/news/2020-10-26/google-maps-introduces-new-cycling-tools-and-we-tell-you-what-they-are'),
(257, 'https://theindianvoice.net/news/2020-10-28/mumbai-indians-ready-to-face-the-challenge-of-royal-challengers-bangalore'),
(258, 'https://theindianvoice.net/news/2020-10-24/the-trick-of-whatsapp-to-know-which-contacts-are-online-and-when-they-connect'),
(259, 'https://theindianvoice.net/news/2020-10-29/rallies-against-france-and-boycotts-of-french-goods-in-several-muslim-nations'),
(260, 'https://theindianvoice.net/news/2020-10-30/the-drone-performs-agile-flight-maneuvers-thanks-to-expandable%20springs-at-the-rear'),
(261, 'https://theindianvoice.net/news/2020-10-30/the-drone-performs-agile-flight-maneuvers-thanks-to-expandable-springs-at-the-rear'),
(262, 'https://theindianvoice.net/news/2020-10-30/kings-xi-punjab-look-to-continue-charge-against-rajasthan-royals'),
(263, 'https://theindianvoice.net/news/2020-10-30/ac-milan-silences-sparta-praha-3-0'),
(264, 'https://theindianvoice.net/news/2020-10-30/coronavirus-india-effective-cases'),
(265, 'https://theindianvoice.net/news/2020-10-30/how-to-transform-household-garbage-into-natural-compost'),
(266, 'https://theindianvoice.net/news/2020-10-30/union-cabinet-grants-a-bonus-for-30-lakh-central-government-workers'),
(267, 'https://theindianvoice.net/news/2020-10-30/indian-democracy-passing-through-most-difficult-phase-sonia-gandhi'),
(268, 'https://theindianvoice.net/news/2020-10-30/flood-hit-families-to-get-relief-ration-kits-at-doostep-in-hyderabad'),
(269, 'https://theindianvoice.net/news/2020-10-30/looking-to-make-covid-19-vaccine-prepared-for-everyone-says-narendra-modi'),
(270, 'https://theindianvoice.net/news/virus'),
(271, 'https://theindianvoice.net/news/2020-10-30/since-gst-has-failed-go-back-to-old-tax-system-uddhav-thackeray'),
(272, 'https://theindianvoice.net/news/2020-10-17/coronavirus-india-effective-cases'),
(273, 'https://theindianvoice.net/news/2020-10-23/english-cricketers-will-get%20a-pay-cut-due-to-pandemic'),
(274, 'https://theindianvoice.net/news/2020-10-30/prime-minister-modi-launch-17-acre-aarogya-van'),
(275, 'https://theindianvoice.net/news/2020-10-30/ghus-ke-maara-pakistan-minister-fawad-chaudhury-boasts-on-pulwama-attacks'),
(276, 'https://theindianvoice.net/news/2020-10-30/indian-democracy-passing-through-most-difficult-phase-sonia-gandhi?fbclid=IwAR2etNocNvDcIz4O79REieUym_92b7RQIcqKv4U-_w_NjrpeQ5m22TjzGpI'),
(277, 'https://theindianvoice.net/news/2020-10-30/prime-minister-modi-launch-17-acre-aarogya-van?fbclid=IwAR0CaRhEmwNytVcYswA4bnKiMjHgNJ-w1Zi0hqmLuOWjWvRIYV27C_OvcEs'),
(278, 'https://theindianvoice.net/news/2020-10-30/indian-democracy-passing-through-most-difficult-phase-sonia-gandhi?fbclid=IwAR3hYtzheNsxbroOdZrjkVa3KVir22HKd6pX9YrSOkXygoUULdiJEWlwvws'),
(279, 'http://localhost/varsio/'),
(280, 'http://localhost/vesco/bkend/'),
(281, 'http://localhost/rangoli/'),
(282, 'https://e-amazonite.com//news/wp-includes/wlwmanifest.xml'),
(283, 'https://e-amazonite.com/index.php/about-us/'),
(284, 'https://medcempharma.com//news/wp-includes/wlwmanifest.xml'),
(285, 'https://www.medcempharma.com/about-us'),
(286, 'http://localhost/argems/about-us');

-- --------------------------------------------------------

--
-- Table structure for table `subcats`
--

CREATE TABLE `subcats` (
  `id` int(11) NOT NULL,
  `catid` int(11) DEFAULT NULL,
  `subcatname` text DEFAULT NULL,
  `subcaturl` varchar(250) DEFAULT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `subcats`
--

INSERT INTO `subcats` (`id`, `catid`, `subcatname`, `subcaturl`, `status`) VALUES
(1, 6, 'Country', 'country', 1),
(2, 6, 'General Knowloedge', 'general-knowloedge', 1),
(3, 7, 'School', 'school', 1),
(4, 8, 'Sport', 'sport', 1);

-- --------------------------------------------------------

--
-- Table structure for table `subscribe`
--

CREATE TABLE `subscribe` (
  `id` int(11) NOT NULL,
  `name` varchar(250) DEFAULT NULL,
  `email` varchar(250) DEFAULT NULL,
  `ts` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `subscribe`
--

INSERT INTO `subscribe` (`id`, `name`, `email`, `ts`) VALUES
(1, 'souvik de', 'souvikdejob04@gmail.com', '2020-09-24 02:37:48');

-- --------------------------------------------------------

--
-- Table structure for table `support`
--

CREATE TABLE `support` (
  `id` int(11) NOT NULL,
  `metaname` text DEFAULT NULL,
  `metadesc` text DEFAULT NULL,
  `contentheadfirst` text DEFAULT NULL,
  `contentfirst` text DEFAULT NULL,
  `contentheadsecond` text DEFAULT NULL,
  `contentsecond` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `support`
--

INSERT INTO `support` (`id`, `metaname`, `metadesc`, `contentheadfirst`, `contentfirst`, `contentheadsecond`, `contentsecond`) VALUES
(1, 'support', 'dfvdfv', 'WHO WE ARE', '<p><strong>Contemporary Living Model For Everyone</strong></p>\r\n\r\n<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus non interdum eros. Cras scelerisque tincidunt nisi, nec commodo sem vulputate.</p>\r\n\r\n<p><strong>Thousands Of Ingenious Projects Worldwide</strong></p>\r\n\r\n<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus non interdum eros. Cras scelerisque tincidunt nisi, nec commodo sem vulputate.</p>\r\n\r\n<p><strong>Building Services &amp; Consumer Electronics</strong></p>\r\n\r\n<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus non interdum eros. Cras scelerisque tincidunt nisi, nec commodo sem vulputate.</p>', 'OUR MISSION', '<p>Nunc eu turpis id nulla sodales luctus. Vestibulum fermentum dui faucibus ligula dapibus scelerisque. Etiam laoreet vitae est vitae convallis. Nulla vel laoreet erat, ac dictum magna. Fusce gravida, magna in mollis mattis, mauris tellus consequat eros, ac venenatis augue urna a dui.</p>');

-- --------------------------------------------------------

--
-- Table structure for table `threeicons`
--

CREATE TABLE `threeicons` (
  `id` int(11) NOT NULL,
  `title` varchar(250) DEFAULT NULL,
  `iconimgae` varchar(250) DEFAULT NULL,
  `description` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `threeicons`
--

INSERT INTO `threeicons` (`id`, `title`, `iconimgae`, `description`) VALUES
(1, 'SERVICE + REPAIR', '176627180service1.png', '<p>Australia is the leading licensed cooking appliance repair and installation company specialising in all electric and gas cooking appliances.</p>'),
(2, 'PROACTIVE MAINTENANCE', '969316267service2.png', '<p>Electrical, Gas Fitting, LP Gas Fitting. Beware of other unlicensed and uninsured appliance companies. Always ask for licences for your safety and peace of mind.</p>'),
(3, 'PROFESSIONAL INSTALLATION', '1360844971service3.png', '<p>Always ask for licences for your safety and peace of mind. Electrical, Gas Fitting, LP Gas Fitting. Beware of other unlicensed and uninsured appliance companies.</p>');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `usertype` varchar(250) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `username` varchar(250) DEFAULT NULL,
  `password` varchar(250) DEFAULT NULL,
  `otp` varchar(250) DEFAULT NULL,
  `isotpverify` varchar(250) DEFAULT NULL,
  `mobile` varchar(250) DEFAULT NULL,
  `fullname` varchar(250) DEFAULT NULL,
  `address` longtext DEFAULT NULL,
  `state` varchar(250) DEFAULT NULL,
  `distrcit` varchar(250) DEFAULT NULL,
  `block_or_post` varchar(250) DEFAULT NULL,
  `pincode` varchar(250) DEFAULT NULL,
  `designation` varchar(250) DEFAULT NULL,
  `maincatid` varchar(250) DEFAULT NULL,
  `subcatid` varchar(250) DEFAULT NULL,
  `isgstreg` varchar(250) DEFAULT NULL,
  `gstno` varchar(250) DEFAULT NULL,
  `majorproductdetails` varchar(250) DEFAULT NULL,
  `businesslife` varchar(250) DEFAULT NULL,
  `areacoverageid` varchar(250) DEFAULT NULL,
  `paymenttermid` varchar(250) DEFAULT NULL,
  `workignhours` varchar(250) DEFAULT NULL,
  `businessoffday` varchar(250) DEFAULT NULL,
  `workcatelog` varchar(250) DEFAULT NULL,
  `promotername` varchar(250) DEFAULT NULL,
  `professionofpromoter` varchar(250) DEFAULT NULL,
  `kycoption` varchar(250) DEFAULT NULL,
  `kycfile` varchar(250) DEFAULT NULL,
  `featureimg` varchar(250) DEFAULT NULL,
  `isactive` varchar(250) DEFAULT NULL,
  `iscompletedstep` varchar(250) DEFAULT NULL,
  `phone` varchar(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `usertype`, `status`, `username`, `password`, `otp`, `isotpverify`, `mobile`, `fullname`, `address`, `state`, `distrcit`, `block_or_post`, `pincode`, `designation`, `maincatid`, `subcatid`, `isgstreg`, `gstno`, `majorproductdetails`, `businesslife`, `areacoverageid`, `paymenttermid`, `workignhours`, `businessoffday`, `workcatelog`, `promotername`, `professionofpromoter`, `kycoption`, `kycfile`, `featureimg`, `isactive`, `iscompletedstep`, `phone`) VALUES
(1, '1', NULL, 'admin', 'MTIzNDU2Nzg=', NULL, NULL, NULL, 'House of Poshaki', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(54, 'User', NULL, 'techsj04@gmail.com', 'MTIzNDU2', '551893', NULL, NULL, 'souvik de', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '9775483913'),
(55, 'User', NULL, 'test@test.com', 'QWNiZDEyMzQh', '702630', NULL, NULL, 'Test', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2424242213'),
(56, 'User', NULL, 'lahiriprithwi@gmail.com', 'S2VuYWthdGlAMjM=', '159895', NULL, NULL, 'Prithwi Lahiri', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '9903429703'),
(57, 'User', NULL, 'abc.abc@abc', 'YWJjZA==', '617361', NULL, NULL, 'su', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '7656574321'),
(58, 'User', NULL, 'Ajdsjfdhsf@sdfvsfsf', 'NDN0ZXJndmVyZg==', '955299', NULL, NULL, 'sfsf', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1231242534'),
(59, 'User', NULL, 'abc.xyc@abc', 'MTIzNDU2Nzg=', '488315', NULL, NULL, 'sd', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '9163578487'),
(60, 'User', NULL, 'abcd@abcd.com', 'MTIzNDU=', '322487', NULL, NULL, 'Soumi Chakraborty', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '9988774455'),
(61, 'User', NULL, 'soumi89nitu@gmail.com', 'MTIzNDU2Nzg=', '612267', NULL, '', 'Soumi Chakraborty', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '8017793959'),
(62, 'User', NULL, 'souvikde319@gmail.com', 'MTIzNDU2', '803319', NULL, NULL, 'souvik de', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '9876543211'),
(63, 'User', NULL, 'sd456@mil.com', 'MTIzNDU2', '691996', NULL, NULL, 'sd', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '9775483955'),
(64, 'User', NULL, 'abc@abc.email', 'MTEyMzQ1NDU0NTQ=', '217071', NULL, NULL, 'ss', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '9887765431');

-- --------------------------------------------------------

--
-- Table structure for table `userpermission`
--

CREATE TABLE `userpermission` (
  `id` int(11) NOT NULL,
  `usertypeid` int(11) NOT NULL,
  `homepage` int(11) NOT NULL,
  `adsbanner` int(11) NOT NULL,
  `categories` int(11) NOT NULL,
  `post` int(11) NOT NULL,
  `comments` int(11) NOT NULL,
  `contact` int(11) NOT NULL,
  `joindoctor` int(11) NOT NULL,
  `subscriber` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `userpermission`
--

INSERT INTO `userpermission` (`id`, `usertypeid`, `homepage`, `adsbanner`, `categories`, `post`, `comments`, `contact`, `joindoctor`, `subscriber`) VALUES
(1, 1, 1, 1, 1, 1, 1, 1, 1, 1),
(2, 12, 0, 0, 0, 0, 0, 0, 0, 0),
(13, 13, 0, 0, 0, 0, 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `userrole`
--

CREATE TABLE `userrole` (
  `id` int(11) NOT NULL,
  `rolename` varchar(250) DEFAULT NULL,
  `code` varchar(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `userrole`
--

INSERT INTO `userrole` (`id`, `rolename`, `code`) VALUES
(1, 'Superadmin', 'superadmin'),
(2, 'Franchise', 'frnchise'),
(3, 'Employee', 'employee');

-- --------------------------------------------------------

--
-- Table structure for table `whywebest`
--

CREATE TABLE `whywebest` (
  `id` int(11) NOT NULL,
  `title` varchar(250) DEFAULT NULL,
  `iconimgae` varchar(250) DEFAULT NULL,
  `description` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `whywebest`
--

INSERT INTO `whywebest` (`id`, `title`, `iconimgae`, `description`) VALUES
(3, 'Dish Washer', '299191509img-02.jpg', ''),
(4, 'Stove Repair', '1306478810img-03.jpg', ''),
(5, 'Refrigeratpor Repairs', '305224342img-08.png', ''),
(6, 'Auto Control', '1313387214img-02.jpg', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `aftrbannersection`
--
ALTER TABLE `aftrbannersection`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `age`
--
ALTER TABLE `age`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `attributeoption`
--
ALTER TABLE `attributeoption`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `blogcomment`
--
ALTER TABLE `blogcomment`
  ADD PRIMARY KEY (`cmtid`);

--
-- Indexes for table `brand`
--
ALTER TABLE `brand`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `childcat`
--
ALTER TABLE `childcat`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `color`
--
ALTER TABLE `color`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contactpg`
--
ALTER TABLE `contactpg`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `coupon`
--
ALTER TABLE `coupon`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `exercise`
--
ALTER TABLE `exercise`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `homecms`
--
ALTER TABLE `homecms`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `homepgsection`
--
ALTER TABLE `homepgsection`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `howtobook`
--
ALTER TABLE `howtobook`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `multiservices`
--
ALTER TABLE `multiservices`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ordertbl`
--
ALTER TABLE `ordertbl`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ourmission`
--
ALTER TABLE `ourmission`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pages`
--
ALTER TABLE `pages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `partner`
--
ALTER TABLE `partner`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `payer`
--
ALTER TABLE `payer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pgbanner`
--
ALTER TABLE `pgbanner`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pgcontent`
--
ALTER TABLE `pgcontent`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `photos`
--
ALTER TABLE `photos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pincode`
--
ALTER TABLE `pincode`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `productvarient`
--
ALTER TABLE `productvarient`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_atribute`
--
ALTER TABLE `product_atribute`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `project`
--
ALTER TABLE `project`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `purpose`
--
ALTER TABLE `purpose`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `review`
--
ALTER TABLE `review`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `servicemain`
--
ALTER TABLE `servicemain`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sitemapurl`
--
ALTER TABLE `sitemapurl`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subcats`
--
ALTER TABLE `subcats`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subscribe`
--
ALTER TABLE `subscribe`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `support`
--
ALTER TABLE `support`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `threeicons`
--
ALTER TABLE `threeicons`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `userpermission`
--
ALTER TABLE `userpermission`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `userrole`
--
ALTER TABLE `userrole`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `whywebest`
--
ALTER TABLE `whywebest`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `aftrbannersection`
--
ALTER TABLE `aftrbannersection`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `age`
--
ALTER TABLE `age`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `attributeoption`
--
ALTER TABLE `attributeoption`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `blogcomment`
--
ALTER TABLE `blogcomment`
  MODIFY `cmtid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `brand`
--
ALTER TABLE `brand`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=70;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `childcat`
--
ALTER TABLE `childcat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `color`
--
ALTER TABLE `color`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `contactpg`
--
ALTER TABLE `contactpg`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `coupon`
--
ALTER TABLE `coupon`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `exercise`
--
ALTER TABLE `exercise`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `homecms`
--
ALTER TABLE `homecms`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `homepgsection`
--
ALTER TABLE `homepgsection`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `howtobook`
--
ALTER TABLE `howtobook`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `multiservices`
--
ALTER TABLE `multiservices`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `ordertbl`
--
ALTER TABLE `ordertbl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=70;

--
-- AUTO_INCREMENT for table `ourmission`
--
ALTER TABLE `ourmission`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `pages`
--
ALTER TABLE `pages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `partner`
--
ALTER TABLE `partner`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `payer`
--
ALTER TABLE `payer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `pgbanner`
--
ALTER TABLE `pgbanner`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `pgcontent`
--
ALTER TABLE `pgcontent`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `photos`
--
ALTER TABLE `photos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `pincode`
--
ALTER TABLE `pincode`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `productvarient`
--
ALTER TABLE `productvarient`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `product_atribute`
--
ALTER TABLE `product_atribute`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `project`
--
ALTER TABLE `project`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `purpose`
--
ALTER TABLE `purpose`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `review`
--
ALTER TABLE `review`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `servicemain`
--
ALTER TABLE `servicemain`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `sitemapurl`
--
ALTER TABLE `sitemapurl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=287;

--
-- AUTO_INCREMENT for table `subcats`
--
ALTER TABLE `subcats`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `subscribe`
--
ALTER TABLE `subscribe`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `support`
--
ALTER TABLE `support`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `threeicons`
--
ALTER TABLE `threeicons`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;

--
-- AUTO_INCREMENT for table `userpermission`
--
ALTER TABLE `userpermission`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `userrole`
--
ALTER TABLE `userrole`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `whywebest`
--
ALTER TABLE `whywebest`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
