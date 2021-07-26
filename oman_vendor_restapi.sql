-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jun 15, 2021 at 04:28 AM
-- Server version: 5.7.31
-- PHP Version: 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `oman_vendor_restapi`
--

-- --------------------------------------------------------

--
-- Table structure for table `branch`
--

DROP TABLE IF EXISTS `branch`;
CREATE TABLE IF NOT EXISTS `branch` (
  `branch_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `update_user_id` int(11) DEFAULT NULL,
  `branch_name` varchar(255) DEFAULT NULL,
  `branch_email` varchar(255) DEFAULT NULL,
  `branch_address` varchar(255) DEFAULT NULL,
  `branch_phone` varchar(255) DEFAULT NULL,
  `branch_type` int(255) DEFAULT NULL,
  `branch_status` int(11) DEFAULT NULL,
  `branch_logo` varchar(255) DEFAULT NULL,
  `branch_API` varchar(255) DEFAULT NULL,
  `create_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `update_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`branch_id`)
) ENGINE=MyISAM AUTO_INCREMENT=32 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `branch`
--

INSERT INTO `branch` (`branch_id`, `user_id`, `update_user_id`, `branch_name`, `branch_email`, `branch_address`, `branch_phone`, `branch_type`, `branch_status`, `branch_logo`, `branch_API`, `create_at`, `update_at`) VALUES
(30, 6, 6, 'Dhaka', 'apitsoft@gmail.com', '450/C , Khilgaon , Dhaka-1219', '01956314985', 1, 1, 'public/upload/1702517265863007.jpg', 'f23a409e-2850-454c-bd1c-0f138215d880', '2021-06-03 07:12:06', NULL),
(31, 9, 6, 'Khulna', 'apitsoft@gmail.com', 'Khulna-9000', '01851496216', 0, 1, NULL, '2636a1c7-65bf-492e-ac4b-9996f271f779', '2021-06-03 07:12:56', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `brand`
--

DROP TABLE IF EXISTS `brand`;
CREATE TABLE IF NOT EXISTS `brand` (
  `brand_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL COMMENT 'aturity which person',
  `brand_name` varchar(255) DEFAULT NULL,
  `brand_image` varchar(255) DEFAULT NULL,
  `brand_status` int(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`brand_id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `brand`
--

INSERT INTO `brand` (`brand_id`, `user_id`, `brand_name`, `brand_image`, `brand_status`, `created_at`, `updated_at`) VALUES
(5, 6, 'Apple', 'public/upload/1701903846603796.jpg', 1, '2021-06-07 10:33:07', NULL),
(6, 6, 'Xioami', 'public/upload/1701903913367265.jpg', 1, '2021-06-07 10:34:11', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

DROP TABLE IF EXISTS `categories`;
CREATE TABLE IF NOT EXISTS `categories` (
  `categories_id` int(11) NOT NULL AUTO_INCREMENT,
  `authority_id` int(255) DEFAULT NULL COMMENT 'authority_id which user created\r\n',
  `categories_name` varchar(255) DEFAULT NULL,
  `categories_slug` varchar(255) DEFAULT NULL,
  `categories_status` int(255) DEFAULT NULL,
  `category_image` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`categories_id`)
) ENGINE=MyISAM AUTO_INCREMENT=53 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`categories_id`, `authority_id`, `categories_name`, `categories_slug`, `categories_status`, `category_image`, `created_at`, `updated_at`) VALUES
(46, 6, 'TV & Audio', 'TV_&_Audio', 1, 'public/upload/1702067690770873.png', '2021-06-09 05:36:59', '2021-06-09 05:36:59'),
(47, 6, 'Watches & Eyewear', 'Watches_&_Eyewear', 1, 'public/upload/1702067675479347.png', '2021-06-09 05:37:36', '2021-06-09 05:37:36'),
(48, 6, 'Car, Motorbike & Industrial', 'Car_Motorbike_&_Industrial', 1, 'public/upload/1702067663179444.png', '2021-06-09 05:38:17', '2021-06-09 05:38:17'),
(49, 6, 'Cameras, Audio & Video', 'Cameras_Audio_&_Video', 1, 'public/upload/1702067643147731.png', '2021-06-09 05:41:21', '2021-06-09 05:41:21'),
(50, 6, 'Mobiles & Tablets', 'Mobiles_&_Tablets', 1, 'public/upload/1702067633798062.png', '2021-06-09 05:42:08', '2021-06-09 05:42:08'),
(51, 6, 'Value of the Day', 'Value_of_the_Day', 1, 'public/upload/1702067625153518.png', '2021-06-09 05:43:02', '2021-06-09 05:43:02'),
(45, 6, 'Women Fashion', 'women_fashion', 1, 'public/upload/1702066279558336.png', '2021-06-08 13:48:27', '2021-06-08 13:48:27'),
(44, 10, 'Electronics', 'electronies', 1, 'public/upload/1702161432489789.jpg', '2021-06-07 10:16:09', '2021-06-07 10:16:09'),
(43, 6, 'Smart Phone', 'smart_phone', 1, 'public/upload/1702067711682941.png', '2021-06-07 10:15:41', '2021-06-07 10:15:41'),
(42, 6, 'Computers & Accessories', 'computers_accessories', 1, 'public/upload/1702067809175665.png', '2021-06-07 10:14:42', '2021-06-07 10:14:42'),
(52, 6, 'MENS Fashion', 'mens_fashion', 1, 'public/upload/1702517672142812.jpg', '2021-06-14 05:09:37', '2021-06-14 05:09:37');

-- --------------------------------------------------------

--
-- Table structure for table `categories_childcategory`
--

DROP TABLE IF EXISTS `categories_childcategory`;
CREATE TABLE IF NOT EXISTS `categories_childcategory` (
  `childcategory_id` int(11) NOT NULL AUTO_INCREMENT,
  `authority_id` int(255) NOT NULL COMMENT 'authority_id which user is created\r\n',
  `categories_id` int(11) DEFAULT NULL,
  `subcategory_id` int(11) DEFAULT NULL,
  `childcategory_name` varchar(255) DEFAULT NULL,
  `childcategory_slug` varchar(255) DEFAULT NULL,
  `childcategory_status` int(255) DEFAULT NULL,
  `childcategory_image` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`childcategory_id`)
) ENGINE=MyISAM AUTO_INCREMENT=28 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `categories_childcategory`
--

INSERT INTO `categories_childcategory` (`childcategory_id`, `authority_id`, `categories_id`, `subcategory_id`, `childcategory_name`, `childcategory_slug`, `childcategory_status`, `childcategory_image`, `created_at`, `updated_at`) VALUES
(21, 6, 44, 43, 'Nikkon Camera', 'nikkon_camera', 1, 'public/upload/1701903809708401.jpg', '2021-06-07 10:32:32', NULL),
(22, 6, 42, 41, 'Headphone', 'headphones', 1, 'public/upload/1701904088232566.jpg', '2021-06-07 10:36:57', NULL),
(20, 6, 43, 38, 'Xioami Note 4', 'xioami_note_4', 1, 'public/upload/1701903620821324.png', '2021-06-07 10:29:32', NULL),
(19, 6, 42, 41, 'Asus', 'asus_laptop', 1, 'public/upload/1701903586956165.png', '2021-06-07 10:28:59', NULL),
(23, 6, 42, 41, 'Gaming', 'game_console', 1, 'public/upload/1701911497877936.png', '2021-06-07 12:34:44', NULL),
(24, 6, 42, 41, 'Laptop', 'laptop', 1, 'public/upload/1701913152334328.jpg', '2021-06-07 13:01:02', NULL),
(25, 6, 42, 42, 'Networking', 'networking', 1, 'public/upload/1702006293468939.jpg', '2021-06-08 13:41:28', NULL),
(26, 6, 45, 44, 'Kurti', 'kurti', 1, 'public/upload/1702006966569108.jpg', '2021-06-08 13:52:10', NULL),
(27, 6, 52, 45, 'Hoodie', 'hoodie', 1, NULL, '2021-06-14 05:10:29', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `categories_subcategory`
--

DROP TABLE IF EXISTS `categories_subcategory`;
CREATE TABLE IF NOT EXISTS `categories_subcategory` (
  `subcategory_id` int(11) NOT NULL AUTO_INCREMENT,
  `authority_id` int(255) DEFAULT NULL COMMENT 'authority_id which person created',
  `categories_id` int(11) DEFAULT NULL,
  `subcategory_name` varchar(255) DEFAULT NULL,
  `subcategory_slug` varchar(255) DEFAULT NULL,
  `subcategory_status` int(255) DEFAULT NULL,
  `subcategory_image` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`subcategory_id`)
) ENGINE=MyISAM AUTO_INCREMENT=46 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `categories_subcategory`
--

INSERT INTO `categories_subcategory` (`subcategory_id`, `authority_id`, `categories_id`, `subcategory_name`, `subcategory_slug`, `subcategory_status`, `subcategory_image`, `created_at`, `updated_at`) VALUES
(42, 6, 42, 'Networking & Internet Devices', 'networking_internet_devices', 1, 'public/upload/1701903344647975.jpg', '2021-06-07 10:25:08', NULL),
(45, 6, 52, 'Cloths', 'cloths', 1, NULL, '2021-06-14 05:10:04', NULL),
(37, 6, 42, 'Printers & Ink', 'printers_Ink', 1, 'public/upload/1701903068969004.jpg', '2021-06-07 10:20:45', NULL),
(38, 6, 43, 'Xioami Phone', 'xioami', 1, 'public/upload/1701903098809000.jpg', '2021-06-07 10:21:14', NULL),
(39, 6, 43, 'Nokia Phone', 'nokia', 1, 'public/upload/1701903174203722.png', '2021-06-07 10:22:26', NULL),
(40, 6, 43, 'Vivo Phone', 'vivo', 1, 'public/upload/1701903240429460.jpg', '2021-06-07 10:23:29', NULL),
(41, 6, 42, 'All Computers & Accessories', 'all_computers_accessories', 1, 'public/upload/1701903284722527.jpg', '2021-06-07 10:24:11', NULL),
(43, 6, 44, 'Action Camera', 'action_camera', 1, 'public/upload/1701903696950806.jpg', '2021-06-07 10:30:44', NULL),
(44, 6, 45, 'Cloths', 'clothes', 1, 'public/upload/1702006941926608.png', '2021-06-08 13:51:46', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

DROP TABLE IF EXISTS `customers`;
CREATE TABLE IF NOT EXISTS `customers` (
  `customer_id` int(11) NOT NULL AUTO_INCREMENT,
  `customer_name` varchar(255) NOT NULL,
  `customer_email` varchar(255) NOT NULL,
  `customer_password` varchar(255) NOT NULL,
  `email_verification_code` varchar(255) DEFAULT NULL,
  `customer_verification_status` int(11) DEFAULT '0',
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `customer_gender` varchar(255) DEFAULT NULL,
  `customer_mobile` varchar(255) DEFAULT NULL,
  `customer_birthday` date DEFAULT NULL,
  `customer_photo` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`customer_id`)
) ENGINE=MyISAM AUTO_INCREMENT=35 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`customer_id`, `customer_name`, `customer_email`, `customer_password`, `email_verification_code`, `customer_verification_status`, `email_verified_at`, `customer_gender`, `customer_mobile`, `customer_birthday`, `customer_photo`, `created_at`, `updated_at`) VALUES
(30, 'Towhid Hasan', 'towhidhasang1@gmail.com', '$2y$10$VUhILXSWigRipFS5QRZTKOd.J.xiudckl9ghC8AByz3AeundMroFe', 'QZryVNpI0NqsHYdOycU6ZuxmDq5sOkrbbtvmFHnu', 0, NULL, 'Male', '01982525844', '2021-06-14', 'C:\\fakepath\\Untitled-1_1024x1024@2x.png', '2021-06-09 13:08:17', '2021-06-09 13:08:17'),
(31, 'admin', 'admin@gmail.com', '$2y$10$UkODWqLYMhwCoJYgq1nJYef8MiEXT0VAqADfpe9FPU19LgE2DL9IO', 'e6yKVLlgfbetQUIQbTGx8Ilo8JGhLFhcWzp2RdHT', 0, NULL, NULL, NULL, NULL, NULL, '2021-06-09 13:25:44', '2021-06-09 13:25:44'),
(32, 'Tasherul Islam', 'tasherulislam@gmail.com', '$2y$10$t.YU0dVl/8dbCPWhqbFEueSCCvIzl1SE5sScwStX/51Oa8lq9gjUu', 'FXiOge3thvXUDKZUKOkiVBNssGY9i7uCpfadbNjM', 0, NULL, NULL, NULL, NULL, NULL, '2021-06-10 07:24:02', '2021-06-10 07:24:02'),
(33, 'TALHA ZOBAER', 'talha@gmail.com', '$2y$10$LyKw266HVRyfnFZxdlGnXe3OzPdNtOTteWQ/4z/zEFHUOVf.bCN9e', 'VOL4rIT04LTYtfVEYIztN8qFMozeJT56mXwxfN4U', 0, NULL, NULL, NULL, NULL, NULL, '2021-06-10 08:33:26', '2021-06-10 08:33:26'),
(34, 'abc', 'abc@gmail.com', '$2y$10$F4S3ynABPW29sUedVxnziew1il/WC10Hr2AsU7q/fTVX.kkYnbhV.', 'Q5nbKq5lOoAfwsDPDcEFCtE4a0NU0YWzms0VJmat', 0, NULL, NULL, NULL, NULL, NULL, '2021-06-12 04:52:16', '2021-06-12 04:52:16');

-- --------------------------------------------------------

--
-- Table structure for table `customers_address`
--

DROP TABLE IF EXISTS `customers_address`;
CREATE TABLE IF NOT EXISTS `customers_address` (
  `address_id` int(11) NOT NULL AUTO_INCREMENT,
  `customer_id` int(11) DEFAULT NULL,
  `address_name` varchar(255) DEFAULT NULL,
  `address_phn` varchar(255) DEFAULT NULL,
  `address_region` varchar(255) DEFAULT NULL,
  `address_city` varchar(255) DEFAULT NULL,
  `address_zip` varchar(255) DEFAULT NULL,
  `address_details` longtext,
  `address_status` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`address_id`)
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `customers_address`
--

INSERT INTO `customers_address` (`address_id`, `customer_id`, `address_name`, `address_phn`, `address_region`, `address_city`, `address_zip`, `address_details`, `address_status`, `created_at`, `updated_at`) VALUES
(3, 30, 'Towhid Hasan', '+8801982525844', 'California', 'Los Angeles', '12546', 'Khulna Bangladesh', 1, '2021-06-14 13:13:34', '2021-06-14 13:13:34'),
(4, 30, 'Towhid Hasan', '+8801982525844', 'California', 'Los Angeles', '12546', 'Khulna Bangladesh', 1, '2021-06-14 13:13:48', '2021-06-14 13:13:48'),
(5, 30, 'Towhid Hasan', '+8801982525844', 'California', 'Los Angeles', '12546', 'Khulna Bangladesh', 1, '2021-06-14 13:15:16', '2021-06-14 13:15:16'),
(6, 30, 'Towhid Hasan', '+8801982525844', 'California', 'Los Angeles', '12546', 'Khulna Bangladesh', 1, '2021-06-14 13:15:49', '2021-06-14 13:15:49'),
(7, 30, 'Towhid Hasan', '+8801982525844', 'California', 'Los Angeles', '12546', 'Khulna Bangladesh', 1, '2021-06-14 13:16:08', '2021-06-14 13:16:08'),
(8, 30, 'Towhid Hasan', '+8801982525844', 'California', 'Los Angeles', '12546', 'Khulna Bangladesh', 1, '2021-06-14 13:17:21', '2021-06-14 13:17:21'),
(9, 34, 'Test All', '01625049999', 'Banglladesh', 'Banglladesh', '958000', 'safasdf', 1, '2021-06-14 13:22:55', '2021-06-14 13:22:55'),
(10, 30, 'Towhid Hasan', '+8801982525844', 'California', 'Los Angeles', '12546', 'Khulna Bangladesh', 0, '2021-06-14 13:23:18', '2021-06-14 13:23:18'),
(11, 34, 'hdghdfg', '01625049999', 'gsd', 'Banglladesh', '958000', 'fghf', 1, '2021-06-14 13:23:46', '2021-06-14 13:23:46'),
(12, 32, 'Tasherul Islam', '01920640620', 'dsfsd', 'khulna', '9000', 'khulna\nkhulna', 1, '2021-06-14 13:40:47', '2021-06-14 13:40:47');

-- --------------------------------------------------------

--
-- Table structure for table `language`
--

DROP TABLE IF EXISTS `language`;
CREATE TABLE IF NOT EXISTS `language` (
  `lang_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `language_name` varchar(255) DEFAULT NULL,
  `short_form` varchar(255) NOT NULL,
  `language_code` varchar(255) NOT NULL,
  `text_direction` varchar(255) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`lang_id`)
) ENGINE=MyISAM AUTO_INCREMENT=43 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `language`
--

INSERT INTO `language` (`lang_id`, `language_name`, `short_form`, `language_code`, `text_direction`, `status`, `created_at`, `updated_at`) VALUES
(1, 'English', 'EN', '01', 'rtr', '1', NULL, NULL),
(36, 'Bangla', 'bn_bn', 'bn_bn', 'ltr', '1', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `language_changed`
--

DROP TABLE IF EXISTS `language_changed`;
CREATE TABLE IF NOT EXISTS `language_changed` (
  `changed_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `language_id` int(20) DEFAULT NULL,
  `component_id` int(20) DEFAULT NULL,
  `component_value` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`changed_id`)
) ENGINE=MyISAM AUTO_INCREMENT=356 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `language_changed`
--

INSERT INTO `language_changed` (`changed_id`, `language_id`, `component_id`, `component_value`, `created_at`, `updated_at`) VALUES
(25, 36, 5, 'সাইডবার', NULL, NULL),
(26, 36, 4, 'হোমপেজ', NULL, NULL),
(27, 36, 6, 'মেনু', NULL, NULL),
(86, 39, 12, 'language_list', NULL, NULL),
(85, 39, 11, 'List', NULL, NULL),
(84, 39, 10, 'Price', NULL, NULL),
(83, 39, 9, 'product', NULL, NULL),
(39, 36, 7, 'বাম পাশ', NULL, NULL),
(40, 36, 8, 'নতুন', NULL, NULL),
(195, 36, 46, 'শিরোনাম', NULL, NULL),
(133, 36, 18, 'লিঙ্ক', NULL, NULL),
(82, 39, 8, 'new', NULL, NULL),
(42, 36, 9, 'প্রোডাক্ট', NULL, NULL),
(81, 39, 7, 'LeftSidebar', NULL, NULL),
(44, 36, 10, 'দাম', NULL, NULL),
(45, 36, 11, 'সারি', NULL, NULL),
(46, 36, 12, 'ভাষা', NULL, NULL),
(80, 39, 6, 'menu', NULL, NULL),
(79, 39, 4, 'dashboard', NULL, NULL),
(50, 36, 13, 'ভাষা যোগ করুন', NULL, NULL),
(51, 36, 14, 'ভাষার লিস্ট', NULL, NULL),
(52, 36, 15, 'ভাষা', NULL, NULL),
(53, 1, 14, 'View Language', NULL, NULL),
(54, 1, 13, 'Add Language', NULL, NULL),
(78, 39, 5, 'sidebar', NULL, NULL),
(56, 38, 5, 'sidebar', NULL, NULL),
(57, 38, 4, 'dashboard', NULL, NULL),
(58, 38, 6, 'menu', NULL, NULL),
(59, 38, 7, 'LeftSidebar', NULL, NULL),
(60, 38, 8, 'new', NULL, NULL),
(61, 38, 9, 'product', NULL, NULL),
(62, 38, 10, 'Price', NULL, NULL),
(63, 38, 11, 'List', NULL, NULL),
(64, 38, 12, 'language_list', NULL, NULL),
(65, 38, 13, 'Add Language', NULL, NULL),
(66, 38, 14, 'View Language', NULL, NULL),
(67, 38, 15, 'Language', NULL, NULL),
(68, 1, 5, 'Sidebar', NULL, NULL),
(69, 1, 4, 'Dashboard', NULL, NULL),
(70, 1, 6, 'Menu', NULL, NULL),
(71, 1, 7, 'Left Sidebar', NULL, NULL),
(72, 1, 8, 'New', NULL, NULL),
(73, 1, 9, 'Product', NULL, NULL),
(74, 1, 10, 'Price', NULL, NULL),
(75, 1, 11, 'List', NULL, NULL),
(146, 1, 25, 'SL', NULL, NULL),
(77, 1, 15, 'Language', NULL, NULL),
(87, 39, 13, 'भाषा जोड़ें', NULL, NULL),
(88, 39, 14, 'भाषा देखें', NULL, NULL),
(89, 39, 15, 'Language', NULL, NULL),
(90, 40, 5, 'sidebar', NULL, NULL),
(91, 40, 4, 'dashboard', NULL, NULL),
(92, 40, 6, 'menu', NULL, NULL),
(93, 40, 7, 'LeftSidebar', NULL, NULL),
(94, 40, 8, 'new', NULL, NULL),
(95, 40, 9, 'product', NULL, NULL),
(96, 40, 10, 'Price', NULL, NULL),
(97, 40, 11, 'List', NULL, NULL),
(98, 40, 12, 'language_list', NULL, NULL),
(99, 40, 13, 'add_language', NULL, NULL),
(100, 40, 14, 'view_language', NULL, NULL),
(101, 40, 15, 'Language', NULL, NULL),
(102, 41, 5, 'sidebar', NULL, NULL),
(103, 41, 4, 'dashboard', NULL, NULL),
(104, 41, 6, 'menu', NULL, NULL),
(105, 41, 7, 'LeftSidebar', NULL, NULL),
(106, 41, 8, 'new', NULL, NULL),
(107, 41, 9, 'product', NULL, NULL),
(108, 41, 10, 'Price', NULL, NULL),
(109, 41, 11, 'List', NULL, NULL),
(110, 41, 12, 'language_list', NULL, NULL),
(111, 41, 13, 'add_language', NULL, NULL),
(112, 41, 14, 'view_language', NULL, NULL),
(113, 41, 15, 'Language', NULL, NULL),
(114, 42, 5, 'sidebar', NULL, NULL),
(115, 42, 4, 'dashboard', NULL, NULL),
(116, 42, 6, 'menu', NULL, NULL),
(117, 42, 7, 'LeftSidebar', NULL, NULL),
(118, 42, 8, 'new', NULL, NULL),
(119, 42, 9, 'product', NULL, NULL),
(120, 42, 10, 'Price', NULL, NULL),
(121, 42, 11, 'List', NULL, NULL),
(122, 42, 12, 'language_list', NULL, NULL),
(123, 42, 13, 'add_language', NULL, NULL),
(124, 42, 14, 'view_language', NULL, NULL),
(125, 42, 15, 'Language', NULL, NULL),
(126, 42, 16, 'Name', NULL, NULL),
(127, 36, 16, 'নাম', NULL, NULL),
(128, 36, 17, 'বাজার', NULL, NULL),
(129, 42, 17, 'বাজার', NULL, NULL),
(130, 1, 16, 'Name', NULL, NULL),
(131, 1, 17, 'Market', NULL, NULL),
(132, 1, 18, 'Link', NULL, NULL),
(134, 1, 19, 'Photo', NULL, NULL),
(135, 1, 20, 'Active', NULL, NULL),
(136, 1, 21, 'Deactive', NULL, NULL),
(137, 1, 22, 'View', NULL, NULL),
(138, 36, 19, 'ছবি', NULL, NULL),
(139, 36, 20, 'সক্রিয়', NULL, NULL),
(140, 36, 21, 'নিষ্ক্রিয়', NULL, NULL),
(141, 36, 22, 'দেখুন', NULL, NULL),
(142, 1, 23, 'Main Categories', NULL, NULL),
(143, 1, 24, 'Add New Category', NULL, NULL),
(144, 36, 23, 'প্রধান শ্রেণী', NULL, NULL),
(145, 36, 24, 'নতুন শ্রেণী যোগ করুন', NULL, NULL),
(147, 1, 26, 'Slug', NULL, NULL),
(148, 36, 25, 'ক্রমিক', NULL, NULL),
(149, 36, 26, 'স্লাগ', NULL, NULL),
(150, 1, 27, 'Category Image', NULL, NULL),
(151, 1, 28, 'Status', NULL, NULL),
(152, 1, 29, 'Action', NULL, NULL),
(153, 36, 27, 'শ্রেণী ছবি', NULL, NULL),
(154, 36, 28, 'অবস্থা', NULL, NULL),
(155, 36, 29, 'কর্মপ্রক্রিয়া', NULL, NULL),
(156, 1, 30, 'Edit', NULL, NULL),
(157, 1, 31, 'Delete', NULL, NULL),
(158, 36, 30, 'সম্পাদনা করুন', NULL, NULL),
(159, 36, 31, 'মুছে ফেলুন', NULL, NULL),
(160, 1, 32, 'Category Name', NULL, NULL),
(161, 1, 33, 'Image', NULL, NULL),
(162, 1, 34, 'Close', NULL, NULL),
(163, 1, 35, 'Create Category', NULL, NULL),
(164, 36, 32, 'শ্রেণীর নাম', NULL, NULL),
(165, 36, 33, 'ছবি', NULL, NULL),
(166, 36, 34, 'বন্ধ করুন', NULL, NULL),
(167, 36, 35, 'শ্রেণী তৈরি করুন', NULL, NULL),
(168, 1, 36, 'Enter', NULL, NULL),
(169, 36, 36, 'লিপিবদ্ধ করুন', NULL, NULL),
(170, 36, 37, 'হাল নাগাদ করুন', NULL, NULL),
(171, 1, 37, 'Update', NULL, NULL),
(172, 1, 38, 'Category', NULL, NULL),
(173, 36, 38, 'শ্রেণী', NULL, NULL),
(174, 1, 39, 'Sub', NULL, NULL),
(175, 1, 40, 'Create', NULL, NULL),
(176, 36, 39, 'উপ', NULL, NULL),
(177, 36, 40, 'তৈরি করুন', NULL, NULL),
(178, 1, 41, 'Child', NULL, NULL),
(179, 36, 41, 'শিশু', NULL, NULL),
(180, 1, 42, 'Add', NULL, NULL),
(181, 36, 42, 'যোগ করুন', NULL, NULL),
(182, 1, 43, 'Select', NULL, NULL),
(183, 36, 43, 'নির্বাচন করুন', NULL, NULL),
(184, 1, 44, 'Add New Child Category', NULL, NULL),
(185, 1, 45, 'Add New Sub Category', NULL, NULL),
(186, 36, 44, 'নতুন উপ শ্রেণী যোগ করুন', NULL, NULL),
(187, 36, 45, 'নতুন শিশু শ্রেণী যোগ করুন', NULL, NULL),
(188, 1, 46, 'Title', NULL, NULL),
(189, 1, 47, 'Sub Title', NULL, NULL),
(190, 1, 48, 'Description', NULL, NULL),
(191, 1, 49, 'Font Size', NULL, NULL),
(192, 1, 50, 'Font Color', NULL, NULL),
(193, 1, 51, 'Slider', NULL, NULL),
(194, 1, 52, 'Sliders', NULL, NULL),
(196, 36, 47, 'উপ শিরোনাম', NULL, NULL),
(197, 36, 48, 'বর্ণনা', NULL, NULL),
(198, 36, 49, 'অক্ষরের আকার', NULL, NULL),
(199, 36, 50, 'অক্ষরের রঙ', NULL, NULL),
(200, 36, 51, 'স্লাইডার', NULL, NULL),
(201, 36, 52, 'স্লাইডার', NULL, NULL),
(202, 1, 53, 'Services', NULL, NULL),
(203, 1, 54, 'Service', NULL, NULL),
(204, 36, 53, 'সেবা', NULL, NULL),
(205, 36, 54, 'সেবা', NULL, NULL),
(206, 1, 55, 'Banner', NULL, NULL),
(207, 1, 56, 'Featured', NULL, NULL),
(208, 36, 55, 'ব্যানার', NULL, NULL),
(209, 36, 56, 'বৈশিষ্ট্যযুক্ত', NULL, NULL),
(221, 36, 62, 'ওয়েবসাইট', NULL, NULL),
(220, 1, 62, 'Website', NULL, NULL),
(212, 1, 58, 'Logo', NULL, NULL),
(213, 36, 58, 'লোগো', NULL, NULL),
(214, 1, 59, 'Header', NULL, NULL),
(215, 1, 60, 'Footer', NULL, NULL),
(216, 36, 59, 'শিরোনাম', NULL, NULL),
(217, 36, 60, 'পাদচরণ', NULL, NULL),
(218, 1, 61, 'Invoice', NULL, NULL),
(219, 36, 61, 'চালান', NULL, NULL),
(222, 1, 63, 'Favicon', NULL, NULL),
(223, 36, 63, 'ফ্যাব আইকন', NULL, NULL),
(224, 1, 64, 'Privacy Policy', NULL, NULL),
(225, 1, 65, 'Terms & Condition', NULL, NULL),
(226, 1, 66, 'Meta', NULL, NULL),
(227, 36, 64, 'গোপনীয়তা নীতি', NULL, NULL),
(228, 36, 65, 'বিধি - নিষেধ এবং শর্তাবলী', NULL, NULL),
(229, 36, 66, 'মেটা', NULL, NULL),
(230, 1, 67, 'Save Change', NULL, NULL),
(231, 36, 67, 'পরিবর্তন সংরক্ষণ', NULL, NULL),
(232, 1, 68, 'Contact Us Page', NULL, NULL),
(233, 1, 69, 'Contact', NULL, NULL),
(234, 1, 70, 'contact Us', NULL, NULL),
(235, 1, 71, 'Phone', NULL, NULL),
(236, 1, 72, 'Text', NULL, NULL),
(237, 1, 73, 'Street Address', NULL, NULL),
(238, 36, 68, 'যোগাযোগ করুন', NULL, NULL),
(252, 1, 78, 'Specification', NULL, NULL),
(239, 36, 69, 'যোগাযোগ', NULL, NULL),
(240, 36, 70, 'যোগাযোগ করুন', NULL, NULL),
(241, 36, 71, 'ফোন', NULL, NULL),
(242, 36, 72, 'পাঠ্য', NULL, NULL),
(243, 36, 73, 'রাস্তার ঠিকানা', NULL, NULL),
(244, 36, 74, 'ইমেল ঠিকানা', NULL, NULL),
(245, 1, 74, 'Email Address', NULL, NULL),
(246, 1, 75, 'Brand', NULL, NULL),
(247, 36, 75, 'ব্র্যান্ড', NULL, NULL),
(248, 1, 76, 'Page', NULL, NULL),
(249, 1, 77, 'FAQ', NULL, NULL),
(250, 36, 76, 'পৃষ্ঠা', NULL, NULL),
(251, 36, 77, 'সচরাচর জিজ্ঞাস্য', NULL, NULL),
(253, 36, 78, 'নির্দিষ্টকরণ', NULL, NULL),
(254, 1, 79, 'Shipping', NULL, NULL),
(255, 36, 79, 'স্থানান্তর', NULL, NULL),
(256, 1, 80, 'Start Time', NULL, NULL),
(257, 1, 81, 'End Time', NULL, NULL),
(258, 1, 82, 'Amount', NULL, NULL),
(259, 36, 80, 'সময় শুরু', NULL, NULL),
(260, 36, 81, 'শেষ সময়', NULL, NULL),
(261, 36, 82, 'মূল্য', NULL, NULL),
(262, 36, 83, 'কার্যকরীভাবে', NULL, NULL),
(263, 1, 83, 'Successfully', NULL, NULL),
(264, 1, 84, 'Branch', NULL, NULL),
(265, 36, 84, 'শাখা', NULL, NULL),
(266, 1, 85, 'Main', NULL, NULL),
(267, 1, 86, 'API', NULL, NULL),
(268, 1, 87, 'Address', NULL, NULL),
(269, 36, 85, 'প্রধান', NULL, NULL),
(270, 36, 86, 'এপিআই', NULL, NULL),
(271, 36, 87, 'ঠিকানা', NULL, NULL),
(272, 36, 88, 'স্বল্প', NULL, NULL),
(273, 36, 89, 'বিস্তারিত', NULL, NULL),
(274, 36, 90, 'সরবরাহকারী', NULL, NULL),
(275, 36, 91, 'বিক্রয়', NULL, NULL),
(276, 36, 92, 'কেনা', NULL, NULL),
(277, 36, 93, 'ছাড়', NULL, NULL),
(278, 36, 94, 'প্রকার', NULL, NULL),
(279, 36, 95, 'সেট', NULL, NULL),
(280, 36, 96, 'গ্যালারী', NULL, NULL),
(281, 36, 97, 'মান', NULL, NULL),
(282, 36, 98, 'রং', NULL, NULL),
(283, 36, 99, 'শ্রেণী', NULL, NULL),
(284, 1, 88, 'Short', NULL, NULL),
(285, 1, 89, 'Long', NULL, NULL),
(286, 1, 90, 'Supplier', NULL, NULL),
(287, 1, 91, 'Selling', NULL, NULL),
(288, 1, 92, 'Buying', NULL, NULL),
(289, 1, 93, 'Discount', NULL, NULL),
(290, 1, 94, 'Type', NULL, NULL),
(291, 1, 95, 'Set', NULL, NULL),
(292, 1, 96, 'Gallery', NULL, NULL),
(293, 1, 97, 'Value', NULL, NULL),
(294, 1, 98, 'Color', NULL, NULL),
(295, 1, 99, 'Category', NULL, NULL),
(296, 1, 100, 'Code', NULL, NULL),
(297, 36, 100, 'কোড', NULL, NULL),
(298, 1, 101, 'Size', NULL, NULL),
(299, 36, 101, 'আকার', NULL, NULL),
(300, 36, 102, 'অনুভূমিক', NULL, NULL),
(301, 36, 103, 'লম্ব', NULL, NULL),
(302, 1, 102, 'Horizontal', NULL, NULL),
(303, 1, 103, 'Vertical', NULL, NULL),
(304, 1, 104, 'Background', NULL, NULL),
(305, 36, 104, 'নেপথ্য', NULL, NULL),
(306, 1, 105, 'Track Your Order', NULL, NULL),
(307, 36, 105, 'আপনার অর্ডার ট্র্যাক করুন', NULL, NULL),
(308, 1, 106, 'Time', NULL, NULL),
(309, 36, 106, 'সময়', NULL, NULL),
(310, 1, 107, 'Currency', NULL, NULL),
(311, 36, 107, 'মুদ্রা', NULL, NULL),
(312, 1, 108, 'Home', NULL, NULL),
(313, 1, 109, 'Customization', NULL, NULL),
(314, 36, 108, 'হোম', NULL, NULL),
(315, 36, 109, 'কাস্টমাইজেশন', NULL, NULL),
(316, 1, 110, 'Settings', NULL, NULL),
(317, 36, 110, 'সেটিংস', NULL, NULL),
(318, 1, 111, 'Store', NULL, NULL),
(319, 1, 112, 'Location', NULL, NULL),
(320, 36, 111, 'দোকান', NULL, NULL),
(321, 36, 112, 'অবস্থান', NULL, NULL),
(322, 1, 113, 'About', NULL, NULL),
(323, 1, 114, 'Us', NULL, NULL),
(324, 36, 113, 'আমাদের', NULL, NULL),
(325, 36, 114, 'সম্বন্ধে', NULL, NULL),
(326, 1, 115, 'Wishlist', NULL, NULL),
(327, 36, 115, 'ইচ্ছেতালিকা', NULL, NULL),
(328, 1, 116, 'Search For Product', NULL, NULL),
(329, 36, 116, 'পণ্য অনুসন্ধান করুন', NULL, NULL),
(330, 1, 117, 'Categories', NULL, NULL),
(331, 1, 118, 'All', NULL, NULL),
(332, 36, 117, 'ক্যাটাগরী', NULL, NULL),
(333, 36, 118, 'সব', NULL, NULL),
(334, 1, 119, 'Departments', NULL, NULL),
(335, 36, 119, 'বিভাগসমূহ', NULL, NULL),
(336, 1, 120, 'Register', NULL, NULL),
(342, 1, 123, 'Sign In', NULL, NULL),
(338, 1, 122, 'or', NULL, NULL),
(339, 36, 120, 'রেজিষ্টার', NULL, NULL),
(340, 36, 121, 'লগইন', NULL, NULL),
(341, 36, 122, 'অথবা', NULL, NULL),
(343, 36, 123, 'লগ ইন', NULL, NULL),
(344, 1, 124, 'Special', NULL, NULL),
(345, 1, 125, 'Offer', NULL, NULL),
(346, 36, 124, 'বিশেষ', NULL, NULL),
(347, 36, 125, 'অফার', NULL, NULL),
(348, 1, 126, 'Onsale', NULL, NULL),
(349, 36, 126, 'বিক্রিতে', NULL, NULL),
(350, 1, 127, 'Top', NULL, NULL),
(351, 1, 128, 'Rated', NULL, NULL),
(352, 36, 127, 'শীর্ষ', NULL, NULL),
(353, 36, 128, 'রেটেড', NULL, NULL),
(354, 1, 129, 'Product is Already Selected', NULL, NULL),
(355, 36, 129, 'পণ্য ইতিমধ্যে নির্বাচিত', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `language_components`
--

DROP TABLE IF EXISTS `language_components`;
CREATE TABLE IF NOT EXISTS `language_components` (
  `comp_id` bigint(11) NOT NULL AUTO_INCREMENT,
  `comp_name` varchar(255) NOT NULL,
  `comp_desc` varchar(255) DEFAULT NULL,
  `comp_place` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`comp_id`),
  UNIQUE KEY `comp_name` (`comp_name`)
) ENGINE=MyISAM AUTO_INCREMENT=130 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `language_components`
--

INSERT INTO `language_components` (`comp_id`, `comp_name`, `comp_desc`, `comp_place`, `created_at`, `updated_at`) VALUES
(5, 'sidebar', 'THis is sidebar', 'Enter sidebar', NULL, NULL),
(4, 'dashboard', 'This is dashboard', 'Enter Dashboard', NULL, NULL),
(6, 'menu', 'This is Menubar', 'Enter Menu Name', NULL, NULL),
(7, 'leftSidebar', 'This is LeftSidebar', 'Enter LeftSidebar Name', NULL, NULL),
(8, 'new', 'new', 'enter new', NULL, NULL),
(9, 'product', 'This is product', 'Enter Product Name', NULL, NULL),
(10, 'price', 'Price', 'Enter Price', NULL, NULL),
(11, 'List', 'list', 'Enter List Name', NULL, NULL),
(19, 'photo', 'Description For Photo', 'Enter Photo Name', NULL, NULL),
(13, 'add_language', 'Language Property', 'Enter Add Language Name', NULL, NULL),
(14, 'view_language', 'Language Property', 'Enter View Language', NULL, NULL),
(15, 'language', 'lANGUAGE convert', 'enter language', NULL, NULL),
(16, 'name', 'This is Name', 'Enter Name', NULL, NULL),
(17, 'market', 'this is a marketing name', 'type market name ', NULL, NULL),
(18, 'link', 'This Is For Link', 'Enter Link Name', NULL, NULL),
(20, 'active', 'Active Description', 'Enter Active Name', NULL, NULL),
(21, 'inactive', 'Deactivate Discriptiom', 'Enter Deactive Name', NULL, NULL),
(22, 'view', 'View Description', 'Enter View Name', NULL, NULL),
(23, 'main_Categories', 'Main Categories Description', 'Enter Main Category Name', NULL, NULL),
(24, 'add_new_category', 'Category Description', 'Enter Add Category Name', NULL, NULL),
(25, 'sl', 'Serial Description', 'Enter Serial Name', NULL, NULL),
(26, 'slug', 'Slug Description', 'Enter Slug Name', NULL, NULL),
(27, 'category_image', 'Category Image', 'Enter Category Image', NULL, NULL),
(28, 'status', 'Status Description', 'Enter Status', NULL, NULL),
(29, 'action', 'Action Description', 'Enter Action Name', NULL, NULL),
(30, 'edit', 'Edit Description', 'Enter Description', NULL, NULL),
(31, 'delete', 'Delete Description', 'Enter Delete Name', NULL, NULL),
(32, 'categrory_name', 'Categrory Name', 'Enter Categrory Name', NULL, NULL),
(33, 'image', 'image', 'Select image', NULL, NULL),
(34, 'close', 'close', 'close', NULL, NULL),
(35, 'create_category', 'create_category', 'create_category', NULL, NULL),
(36, 'enter', 'enter', 'enter', NULL, NULL),
(37, 'update', 'update', 'update', NULL, NULL),
(38, 'categrory', 'Categrory', 'Enter Categrory', NULL, NULL),
(39, 'sub', 'sub', 'Enter Sub', NULL, NULL),
(40, 'create', 'create', 'Enter create', NULL, NULL),
(41, 'child', 'child name', 'Enter Child', NULL, NULL),
(42, 'add', 'add', 'add', NULL, NULL),
(43, 'select', 'select name', 'Enter Select', NULL, NULL),
(44, 'add_new_subcategory', 'add new subcategory', 'Enter add_new_subcategory', NULL, NULL),
(45, 'add_new_childcategory', 'add new childcategory', 'Enter add_new_childcategory', NULL, NULL),
(46, 'title', 'title', 'Enter title', NULL, NULL),
(47, 'sub_title', 'sub title', 'Enter sub title', NULL, NULL),
(48, 'description', 'description', 'Enter Description', NULL, NULL),
(49, 'font_size', 'font size', 'Enter font size', NULL, NULL),
(50, 'font_color', 'font color', 'Enter font color', NULL, NULL),
(51, 'slider', 'slider', 'Enter slider', NULL, NULL),
(52, 'sliders', 'sliders', 'Enter sliders', NULL, NULL),
(53, 'services', 'services', 'Enter services', NULL, NULL),
(54, 'service', 'service', 'Enter Service', NULL, NULL),
(55, 'banner', 'banner', 'Enter banner', NULL, NULL),
(56, 'featured', 'featured', 'Enter featured', NULL, NULL),
(63, 'favicon', 'Favicon Description', 'Enter Favicon Name', NULL, NULL),
(58, 'logo', 'Logo Description', 'Enter Logo Name', NULL, NULL),
(59, 'header', 'Header Description', 'Enter Header Name', NULL, NULL),
(60, 'footer', 'Footer Description', 'Enter Footer Name', NULL, NULL),
(61, 'invoice', 'This For Invoice', 'Ener Invoice Name', NULL, NULL),
(62, 'website', 'Website Description', 'Enter Website Name', NULL, NULL),
(64, 'privacy_policy', 'Privacy Policy', 'Enter Privacy Policy', NULL, NULL),
(65, 'terms_&_condition', 'description terms_&_condition', 'Enter Terms & Condition', NULL, NULL),
(66, 'meta', 'description meta', 'Enter Meta', NULL, NULL),
(67, 'save_change', 'description save change', 'Enter save change', NULL, NULL),
(68, 'contact_us_page', 'description contact_us_page', 'Enter contact us page', NULL, NULL),
(69, 'contact', 'description contact', 'Enter contact', NULL, NULL),
(70, 'contact_us', 'description contact us', 'Enter contact us', NULL, NULL),
(71, 'phone', 'description phone', 'Enter phone', NULL, NULL),
(72, 'text', 'description text', 'Enter text', NULL, NULL),
(73, 'street_address', 'description street address', 'Enter street address', NULL, NULL),
(74, 'email_address', 'description email address', 'Enter email address', NULL, NULL),
(75, 'brand', 'description brand', 'Enter brand', NULL, NULL),
(76, 'page', 'Page Description', 'Enter Page Name', NULL, NULL),
(77, 'faq', 'This Is For Frequently Asked Questions', 'Enter FAQ', NULL, NULL),
(78, 'specification', 'description specification', 'Enter Specification', '2021-05-31 12:48:26', NULL),
(79, 'shipping', 'description shipping', 'Enter shipping', '2021-06-01 05:42:17', NULL),
(80, 'start_time', 'description start_time', 'Enter start time', '2021-06-01 06:35:21', NULL),
(81, 'end_time', 'description End time', 'Enter End time', '2021-06-01 06:36:59', NULL),
(82, 'amount', 'description amount', 'Enter amount', '2021-06-01 06:38:05', NULL),
(83, 'successfully', 'description successfully', 'Enter successfully', '2021-06-01 11:09:35', NULL),
(84, 'branch', 'description branch', 'Enter branch', '2021-06-01 12:18:25', NULL),
(85, 'main', 'description main', 'Enter main', '2021-06-02 05:24:08', NULL),
(86, 'api', 'description api', 'Enter api', '2021-06-02 05:25:25', NULL),
(87, 'address', 'description address', 'Enter Address', '2021-06-02 05:28:19', NULL),
(88, 'short', 'Short Description', 'Enter Short Name', '2021-06-02 07:14:00', NULL),
(89, 'long', 'Long Description', 'Enter Long Name', '2021-06-02 07:14:33', NULL),
(90, 'supplier', 'Supplier', 'Enter Supplier Name', '2021-06-02 07:15:27', NULL),
(91, 'selling', 'Selling Description', 'Enter Selling Name', '2021-06-02 07:20:50', NULL),
(92, 'buying', 'Byuing Description', 'Enter Buying Name', '2021-06-02 07:21:14', NULL),
(93, 'discount', 'Discount ', 'Enter Discount Name', '2021-06-02 07:54:41', NULL),
(94, 'type', 'Type Description', 'Enter Type Name', '2021-06-02 07:57:22', NULL),
(95, 'set', 'Set ', 'Enter Set Name', '2021-06-02 08:15:45', NULL),
(96, 'gallery', 'Gallery Description', 'Enter Gallery Name', '2021-06-02 08:16:17', NULL),
(97, 'value', 'Value Name', 'Enter Value Name', '2021-06-02 08:16:52', NULL),
(98, 'color', 'Color Description', 'Enter Color Name', '2021-06-02 08:17:27', NULL),
(99, 'category', 'Category Description', 'Enter Category Name', '2021-06-02 08:17:52', NULL),
(100, 'code', 'Code Description', 'Enter Product Name', '2021-06-02 08:27:56', NULL),
(101, 'size', 'Size Description', 'Enter Size Name', '2021-06-03 11:26:16', NULL),
(102, 'horizontal', 'Horizontal Description', 'Enter Horizontal Name', '2021-06-04 05:11:57', NULL),
(103, 'vertical', 'Vertical Desction', 'Enter Vertical Name', '2021-06-04 05:15:19', NULL),
(104, 'background', 'Background Description', 'Background Name', '2021-06-05 04:56:41', NULL),
(105, 'trackyourorder', 'Track Your Order', 'Track Your Order Name', '2021-06-05 10:28:53', NULL),
(106, 'time', 'Time Description', 'Enter Time Name', '2021-06-07 07:46:38', NULL),
(107, 'currency', 'Currency Description', 'Enter Currency Name', '2021-06-08 05:39:01', NULL),
(108, 'home', 'Home Description', 'Enter Home Name', '2021-06-10 09:19:32', NULL),
(109, 'customization', 'Customization Description', 'Enter Customization Name', '2021-06-10 09:21:13', NULL),
(110, 'settings', 'Settings', 'Enter Settings Name', '2021-06-10 09:40:54', NULL),
(111, 'store', 'Store Description', 'Enter Store Name', '2021-06-11 09:07:21', NULL),
(112, 'location', 'Location Description', 'Enter Locator Name', '2021-06-11 09:08:09', NULL),
(113, 'about', 'About Description', 'Enter About Name', '2021-06-11 09:13:26', NULL),
(114, 'us', 'Us', 'Enter Us Name', '2021-06-11 09:13:50', NULL),
(115, 'wishlist', 'Wishlist Description', 'Enter Wishlist Name', '2021-06-11 09:21:48', NULL),
(116, 'searchforproduct', 'Search Description', 'Enter Search Name', '2021-06-12 06:04:58', NULL),
(117, 'categories', 'Categories Description', 'Enter Category Name', '2021-06-12 06:13:44', NULL),
(118, 'all', 'All Description', 'Enter All Name', '2021-06-12 06:14:03', NULL),
(119, 'departments', 'Departments', 'Enter Departments Name', '2021-06-12 06:19:14', NULL),
(120, 'register', 'Register Description', 'Enter Register Name', '2021-06-12 06:24:22', NULL),
(123, 'signin', 'Sign In Description', 'Enter Sign In Name', '2021-06-12 06:55:58', NULL),
(122, 'or', 'Or Description', 'Enter Or Name', '2021-06-12 06:25:18', NULL),
(124, 'special', 'Special Description', 'Enter Special Name', '2021-06-12 07:02:08', NULL),
(125, 'offer', 'Offer Description', 'Enter Offer Name', '2021-06-12 07:02:43', NULL),
(126, 'onsale', 'Onsale Description', 'Enter Onsale Description', '2021-06-12 07:41:02', NULL),
(127, 'top', 'Top Description', 'Enter Top Name', '2021-06-12 07:45:22', NULL),
(128, 'rated', 'Rated Description', 'Enter Rated Name', '2021-06-12 07:45:38', NULL),
(129, 'product_selected_message', 'When Stock Add, Then Product is already selected Message', 'type your message: already selected product', '2021-06-13 07:04:38', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

DROP TABLE IF EXISTS `product`;
CREATE TABLE IF NOT EXISTS `product` (
  `product_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `branch_id` int(11) DEFAULT NULL,
  `update_user_id` int(11) DEFAULT NULL,
  `categories_id` int(11) DEFAULT NULL,
  `subcategory_id` int(11) DEFAULT NULL,
  `childcategory_id` int(11) DEFAULT NULL,
  `brand_id` int(11) DEFAULT NULL,
  `product_name` varchar(255) DEFAULT NULL,
  `product_code` varchar(255) DEFAULT NULL,
  `product_short_description` longtext,
  `product_long_description` longtext,
  `product_buying_price` varchar(255) DEFAULT NULL,
  `product_selling_price` varchar(255) DEFAULT NULL,
  `product_discount_type` varchar(255) DEFAULT NULL,
  `product_image` varchar(255) DEFAULT NULL,
  `product_gallery` longtext,
  `product_specification` longtext,
  `product_specification_value` longtext,
  `product_discount_value` longtext,
  `product_shipping_id` longtext,
  `product_color` longtext,
  `product_color_name` longtext,
  `product_color_image` longtext,
  `product_size` varchar(255) DEFAULT NULL,
  `product_status` int(11) DEFAULT NULL,
  `product_meta_title` longtext,
  `product_meta_keyword` longtext,
  `product_meta_description` longtext,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`product_id`)
) ENGINE=MyISAM AUTO_INCREMENT=50 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`product_id`, `user_id`, `branch_id`, `update_user_id`, `categories_id`, `subcategory_id`, `childcategory_id`, `brand_id`, `product_name`, `product_code`, `product_short_description`, `product_long_description`, `product_buying_price`, `product_selling_price`, `product_discount_type`, `product_image`, `product_gallery`, `product_specification`, `product_specification_value`, `product_discount_value`, `product_shipping_id`, `product_color`, `product_color_name`, `product_color_image`, `product_size`, `product_status`, `product_meta_title`, `product_meta_keyword`, `product_meta_description`, `created_at`, `updated_at`) VALUES
(46, 6, 30, 10, 42, 42, 25, 6, 'Full Color LaserJet Pro M452dn', 'FHJ511948218', '<h3 class=\"font-size-24 mb-3\" style=\"line-height: 1.5; font-size: 1.49975rem; color: rgb(51, 62, 72); font-family: \"Open Sans\", Helvetica, Arial, sans-serif; letter-spacing: -0.144px;\">Perfectly Done</h3><p style=\"margin-bottom: 1.875rem; color: rgb(116, 116, 116); line-height: 1.7; font-family: \"Open Sans\", Helvetica, Arial, sans-serif; font-size: 14px; letter-spacing: -0.144px;\">Praesent ornare, ex a interdum consectetur, lectus diam sodales elit, vitae egestas est enim ornare nisl. Nullam in lectus nec sem semper viverra. In lobortis egestas massa. Nam nec massa nisi. Suspendisse potenti. Quisque suscipit vulputate dui quis volutpat. Ut id elit facilisis, feugiat est in, tempus lacus. Ut ultrices dictum metus, a ultricies ex vulputate ac. Ut id cursus tellus, non tempor quam. Morbi porta diam nisi, id finibus nunc tincidunt eu.</p>', '<h3 class=\"font-size-24 mb-3\" style=\"line-height: 1.5; font-size: 1.49975rem; color: rgb(51, 62, 72); font-family: \" open=\"\" sans\",=\"\" helvetica,=\"\" arial,=\"\" sans-serif;=\"\" letter-spacing:=\"\" -0.144px;\"=\"\">Wireless</h3><p class=\"mb-6\" style=\"color: rgb(116, 116, 116); line-height: 1.7; font-family: \" open=\"\" sans\",=\"\" helvetica,=\"\" arial,=\"\" sans-serif;=\"\" font-size:=\"\" 14px;=\"\" letter-spacing:=\"\" -0.144px;=\"\" margin-bottom:=\"\" 2.5rem=\"\" !important;\"=\"\">Fusce vitae nibh mi. Integer posuere, libero et ullamcorper facilisis, enim eros tincidunt orci, eget vestibulum sapien nisi ut leo. Cras finibus vel est ut mollis. Donec luctus condimentum ante et</p><h3 class=\"font-size-24 mb-3\" style=\"line-height: 1.5; font-size: 1.49975rem; color: rgb(51, 62, 72); font-family: \" open=\"\" sans\",=\"\" helvetica,=\"\" arial,=\"\" sans-serif;=\"\" letter-spacing:=\"\" -0.144px;\"=\"\"><br></h3><h3 class=\"font-size-24 mb-3\" style=\"line-height: 1.5; font-size: 1.49975rem; color: rgb(51, 62, 72); font-family: \" open=\"\" sans\",=\"\" helvetica,=\"\" arial,=\"\" sans-serif;=\"\" letter-spacing:=\"\" -0.144px;\"=\"\"><br></h3><h3 class=\"font-size-24 mb-3\" style=\"line-height: 1.5; font-size: 1.49975rem; color: rgb(51, 62, 72); font-family: \" open=\"\" sans\",=\"\" helvetica,=\"\" arial,=\"\" sans-serif;=\"\" letter-spacing:=\"\" -0.144px;\"=\"\">Fresh Design</h3><p class=\"mb-6\" style=\"color: rgb(116, 116, 116); line-height: 1.7; font-family: \" open=\"\" sans\",=\"\" helvetica,=\"\" arial,=\"\" sans-serif;=\"\" font-size:=\"\" 14px;=\"\" letter-spacing:=\"\" -0.144px;=\"\" margin-bottom:=\"\" 2.5rem=\"\" !important;\"=\"\">Integer bibendum aliquet ipsum, in ultrices enim sodales sed. Quisque ut urna vitae lacus laoreet malesuada eu at massa. Pellentesque nibh augue, pellentesque nec dictum vel, pretium a arcu. Duis eu urna suscipit, lobortis elit quis, ullamcorper massa.</p>', '4000.00', '4500.00', 'tk', 'public/upload/1702006488249796.jpg', '[\"public\\/upload\\/1702006488248534.jpg\"]', '[\"6\"]', '[\"6000 G\"]', '20', '[\"4\"]', '[\"#000000\"]', '[\"Black\"]', '[\"public\\/upload\\/1702006488249182.jpg\"]', '[null]', 1, 'Meta Title', 'Meta Keyword', 'Lorem ipsum dolor sit amet, c', '2021-06-08 13:44:34', NULL),
(45, 6, 30, 6, 42, 41, 23, 5, 'Game Console Controller', 'GSC511948218', '<h3 class=\"font-size-24 mb-3\" style=\"line-height: 1.5; font-size: 1.49975rem; color: rgb(51, 62, 72); font-family: \"Open Sans\", Helvetica, Arial, sans-serif; letter-spacing: -0.144px;\"><b>Fresh Design</b></h3><p class=\"mb-6\" style=\"color: rgb(116, 116, 116); line-height: 1.7; font-family: \"Open Sans\", Helvetica, Arial, sans-serif; font-size: 14px; letter-spacing: -0.144px; margin-bottom: 2.5rem !important;\">Integer bibendum aliquet ipsum, in ultrices enim sodales sed. Quisque ut urna vitae lacus laoreet malesuada eu at massa. Pellentesque nibh augue, pellentesque nec dictum vel, pretium a arcu. Duis eu urna suscipit, lobortis elit quis, ullamcorper massa.</p>', '<h3 class=\"font-size-24 mb-3\" style=\"line-height: 1.5; font-size: 1.49975rem; color: rgb(51, 62, 72); font-family: \"Open Sans\", Helvetica, Arial, sans-serif; letter-spacing: -0.144px; text-align: right;\">intelligent Bass</h3><h3 class=\"font-size-24 mb-3\" style=\"line-height: 1.5; text-align: right;\"><p class=\"mb-6\" style=\"color: rgb(116, 116, 116); line-height: 1.7; font-family: \"Open Sans\", Helvetica, Arial, sans-serif; font-size: 14px; letter-spacing: -0.144px; margin-bottom: 2.5rem !important;\">Fusce vitae nibh mi. Integer posuere, libero et ullamcorper facilisis, enim eros tincidunt orci, eget vestibulum sapien nisi ut leo. Cras finibus vel est ut mollis. Donec luctus condimentum ante et euismod.</p><p class=\"mb-6\" style=\"color: rgb(116, 116, 116); line-height: 1.7; font-family: \"Open Sans\", Helvetica, Arial, sans-serif; font-size: 14px; letter-spacing: -0.144px; margin-bottom: 2.5rem !important;\"><br></p><p class=\"mb-6\" style=\"color: rgb(116, 116, 116); line-height: 1.7; font-family: \"Open Sans\", Helvetica, Arial, sans-serif; font-size: 14px; letter-spacing: -0.144px; margin-bottom: 2.5rem !important;\"><span style=\"color: rgb(51, 62, 72); font-size: 1.49975rem; letter-spacing: -0.144px;\">Battery Life</span></p><p class=\"mb-6\" style=\"color: rgb(116, 116, 116); line-height: 1.7; font-family: \"Open Sans\", Helvetica, Arial, sans-serif; font-size: 14px; letter-spacing: -0.144px; margin-bottom: 2.5rem !important;\">Integer bibendum aliquet ipsum, in ultrices enim sodales sed. Quisque ut urna vitae lacus laoreet malesuada eu at massa. Pellentesque nibh augue, pellentesque nec dictum vel, pretium a arcu. Duis eu urna suscipit, lobortis elit quis, ullamcorper massa.</p></h3>', '300.00', '350.00', 'tk', 'public/upload/1701911683980492.jpg', '[\"public\\/upload\\/1701911683978406.jpg\",\"public\\/upload\\/1701911683978979.png\",\"public\\/upload\\/1701911683979407.jpg\"]', '[\"6\",\"15\",\"17\",\"18\"]', '[\"220 g\",\"MF841HN\\/A\",\"Core i5\",\"2.9 GHz\"]', '20', '[\"4\",\"6\"]', '[\"#ff0000\"]', '[\"Red\"]', '[\"public\\/upload\\/1701911683979830.jpg\"]', '[null]', 1, 'Lorem ipsum dolor sit amet, c', 'Lorem ipsum dolor sit amet,', 'Lorem ipsum dolor sit amet,', '2021-06-07 12:37:41', NULL),
(47, 6, 30, 6, 45, 44, 26, 5, 'Kurti', 'FW5119', '<h3 class=\"font-size-24 mb-3\" style=\"line-height: 1.5; font-size: 1.49975rem; color: rgb(51, 62, 72); font-family: \"Open Sans\", Helvetica, Arial, sans-serif; letter-spacing: -0.144px;\">Perfectly Done</h3><p style=\"margin-bottom: 1.875rem; color: rgb(116, 116, 116); line-height: 1.7; font-family: \"Open Sans\", Helvetica, Arial, sans-serif; font-size: 14px; letter-spacing: -0.144px;\">Praesent ornare, ex a interdum consectetur, lectus diam sodales elit, vitae egestas est enim ornare nisl. Nullam in lectus nec sem semper viverra. In lobortis egestas massa. Nam nec massa nisi. Suspendisse potenti. Quisque suscipit vulputate dui quis volutpat. Ut id elit facilisis, feugiat est in, tempus lacus. Ut ultrices dictum metus, a ultricies ex vulputate ac. Ut id cursus tellus, non tempor quam. Morbi porta diam nisi, id finibus nunc tincidunt eu.</p>', 'fvhfhfhfhfghfgjhgfjgfjgfjfgjgfj', '200.00', '250.00', 'tk', 'public/upload/1702007187807701.png', '[\"public\\/upload\\/1702007187803146.jpg\",\"public\\/upload\\/1702007187805474.jpg\"]', '[\"8\"]', '[\"Long\"]', '20', '[\"4\"]', '[\"#0400ff\",\"#ff0000\"]', '[\"Blue\",\"Red\"]', '[\"public\\/upload\\/1702007187806347.png\",\"public\\/upload\\/1702007187807033.jpg\"]', '[\"XL\",\"L\"]', 1, 'Meta Title', 'Meta Keyword', 'Meta Description', '2021-06-08 13:55:41', NULL),
(43, 6, 30, 6, 42, 41, 22, 5, 'Ultra Wireless S50 Headphones', 'FW511948218', '<h3 class=\"font-size-24 mb-3\" style=\"line-height: 1.5; font-size: 1.49975rem; color: rgb(51, 62, 72); font-family: \" open=\"\" sans\",=\"\" helvetica,=\"\" arial,=\"\" sans-serif;=\"\" letter-spacing:=\"\" -0.144px;\"=\"\"><b>Perfectly Done</b><span style=\"font-family: Arial;\">﻿</span></h3><h6 style=\"margin-bottom: 1.875rem; color: rgb(116, 116, 116); line-height: 1.7; font-family: \"><span style=\"font-family: Arial;\">Praesent ornare, ex a interdum consectetur, lectus diam sodales elit, vitae egestas est enim ornare nisl. Nullam in lectus nec sem semper viverra. In lobortis egestas massa. Nam nec massa nisi. Suspendisse potenti. Quisque suscipit vulputate dui quis volutpat. Ut id elit facilisis, feugiat </span></h6>', '<p style=\"line-height: 1.5; font-size: 1.49975rem;\"><span style=\"font-family: undefined;\">﻿</span><b style=\"\"><span style=\"font-family: \"Comic Sans MS\";\">Wireless</span></b></p><h3 class=\"font-size-24 mb-3\" style=\"line-height: 1.5; font-size: 1.49975rem;\" open=\"\" sans\",=\"\" helvetica,=\"\" arial,=\"\" sans-serif;=\"\" letter-spacing:=\"\" -0.144px;\"=\"\"><p class=\"mb-6\" style=\"line-height: 1.7;\" open=\"\" sans\",=\"\" helvetica,=\"\" arial,=\"\" sans-serif;=\"\" font-size:=\"\" 14px;=\"\" letter-spacing:=\"\" -0.144px;=\"\" margin-bottom:=\"\" 2.5rem=\"\" !important;\"=\"\"><span style=\"color: rgb(0, 0, 0);\"><span style=\"font-family: \"Comic Sans MS\";\">Fusce vitae nibh mi. Integer posuere, libero et ullamcorper facilisis,</span><span style=\"font-family: \"Comic Sans MS\";\"> enim eros tincidunt orci, eget vestibulum sapien nisi ut leo. Cras finibus vel est ut mollis. Donec luctus condimentum ante et euismod.</span></span></p></h3><h3 class=\"font-size-24 mb-3\" style=\"line-height: 1.5; font-size: 1.49975rem;\" open=\"\" sans\",=\"\" helvetica,=\"\" arial,=\"\" sans-serif;=\"\" letter-spacing:=\"\" -0.144px;\"=\"\"><b><span style=\"font-family: \"Comic Sans MS\"; color: rgb(0, 0, 0);\">Fresh Design</span></b></h3><h3 class=\"font-size-24 mb-3\" style=\"line-height: 1.5; font-size: 1.49975rem;\" open=\"\" sans\",=\"\" helvetica,=\"\" arial,=\"\" sans-serif;=\"\" letter-spacing:=\"\" -0.144px;\"=\"\"><p class=\"mb-6\" style=\"line-height: 1.7;\" open=\"\" sans\",=\"\" helvetica,=\"\" arial,=\"\" sans-serif;=\"\" font-size:=\"\" 14px;=\"\" letter-spacing:=\"\" -0.144px;=\"\" margin-bottom:=\"\" 2.5rem=\"\" !important;\"=\"\"><span style=\"font-family: \"Comic Sans MS\"; color: rgb(0, 0, 0);\">Integer bibendum aliquet ipsum, in ultrices enim sodales sed. Quisque ut urna vitae lacus laoreet malesuada eu at massa. Pellentesque nibh augue, pellentesque nec dictum vel, pretium a arcu. Duis eu urna suscipit, lobortis elit quis, ullamcorper massa.</span></p></h3>', '200', '250', 'tk', 'public/upload/1701904470817848.jpg', '[\"public\\/upload\\/1702006008961503.jpg\",\"public\\/upload\\/1702006009059594.jpg\"]', '[\"6\",\"8\"]', '[\"100 G\",\"One Size Fits all\"]', '30', '[\"3\",\"4\",\"5\"]', '[\"#ff0000\",\"#002aff\",\"#2bff00\"]', '[\"Red\",\"Blue\",null]', '[\"public\\/upload\\/1701909934588723.jpg\",\"public\\/upload\\/1701909934656271.jpg\",\"public\\/upload\\/1701909934656913.jpg\"]', '[\"XXL\",\"XL\"]', 1, 'Apple Headphone', 'apple_headphone', 'Apple', '2021-06-07 10:43:02', NULL),
(44, 6, 30, 10, 42, 41, 22, 5, 'Ultra Wireless S50 Headphones', 'FW511948218', '<h3 class=\"font-size-24 mb-3\" style=\"line-height: 1.5; font-size: 1.49975rem; color: rgb(51, 62, 72); font-family: \" open=\"\" sans\",=\"\" helvetica,=\"\" arial,=\"\" sans-serif;=\"\" letter-spacing:=\"\" -0.144px;\"=\"\"><b>Perfectly Done</b><span style=\"font-family: Arial;\">﻿</span></h3><h6 style=\"margin-bottom: 1.875rem; color: rgb(116, 116, 116); line-height: 1.7; font-family: \"><span style=\"font-family: Arial;\">Praesent ornare, ex a interdum consectetur, lectus diam sodales elit, vitae egestas est enim ornare nisl. Nullam in lectus nec sem semper viverra. In lobortis egestas massa. Nam nec massa nisi. Suspendisse potenti. Quisque suscipit vulputate dui quis volutpat. Ut id elit facilisis, feugiat&nbsp;</span></h6>', '<p style=\"line-height: 1.5; font-size: 1.49975rem;\"><span style=\"font-family: undefined;\">﻿</span><b style=\"\"><span style=\"font-family: &quot;Comic Sans MS&quot;;\">Wireless</span></b></p><h3 class=\"font-size-24 mb-3\" style=\"line-height: 1.5; font-size: 1.49975rem;\" open=\"\" sans\",=\"\" helvetica,=\"\" arial,=\"\" sans-serif;=\"\" letter-spacing:=\"\" -0.144px;\"=\"\"><p class=\"mb-6\" style=\"line-height: 1.7;\" open=\"\" sans\",=\"\" helvetica,=\"\" arial,=\"\" sans-serif;=\"\" font-size:=\"\" 14px;=\"\" letter-spacing:=\"\" -0.144px;=\"\" margin-bottom:=\"\" 2.5rem=\"\" !important;\"=\"\"><span style=\"color: rgb(0, 0, 0);\"><span style=\"font-family: &quot;Comic Sans MS&quot;;\">Fusce vitae nibh mi. Integer posuere, libero et ullamcorper facilisis,</span><span style=\"font-family: &quot;Comic Sans MS&quot;;\"> enim eros tincidunt orci, eget vestibulum sapien nisi ut leo. Cras finibus vel est ut mollis. Donec luctus condimentum ante et euismod.</span></span></p></h3><h3 class=\"font-size-24 mb-3\" style=\"line-height: 1.5; font-size: 1.49975rem;\" open=\"\" sans\",=\"\" helvetica,=\"\" arial,=\"\" sans-serif;=\"\" letter-spacing:=\"\" -0.144px;\"=\"\"><b><span style=\"font-family: &quot;Comic Sans MS&quot;; color: rgb(0, 0, 0);\">Fresh Design</span></b></h3><h3 class=\"font-size-24 mb-3\" style=\"line-height: 1.5; font-size: 1.49975rem;\" open=\"\" sans\",=\"\" helvetica,=\"\" arial,=\"\" sans-serif;=\"\" letter-spacing:=\"\" -0.144px;\"=\"\"><p class=\"mb-6\" style=\"line-height: 1.7;\" open=\"\" sans\",=\"\" helvetica,=\"\" arial,=\"\" sans-serif;=\"\" font-size:=\"\" 14px;=\"\" letter-spacing:=\"\" -0.144px;=\"\" margin-bottom:=\"\" 2.5rem=\"\" !important;\"=\"\"><span style=\"font-family: &quot;Comic Sans MS&quot;; color: rgb(0, 0, 0);\">Integer bibendum aliquet ipsum, in ultrices enim sodales sed. Quisque ut urna vitae lacus laoreet malesuada eu at massa. Pellentesque nibh augue, pellentesque nec dictum vel, pretium a arcu. Duis eu urna suscipit, lobortis elit quis, ullamcorper massa.</span></p></h3>', '200', '250', 'tk', 'public/upload/1701904470817848.jpg', '[\"public\\/upload\\/1701907463594055.jpg\"]', '[\"6\",\"8\"]', '[\"100 G\",\"One Size Fits all\"]', '30', '[\"3\",\"4\",\"5\"]', '[\"#ff0000\",\"#002aff\",\"#2bff00\"]', '[\"Red\",\"Blue\",null]', '[\"public\\/upload\\/1701909934588723.jpg\",\"public\\/upload\\/1701909934656271.jpg\",\"public\\/upload\\/1701909934656913.jpg\"]', '[\"XXL\",\"XL\"]', 1, 'Apple Headphone', 'apple_headphone', 'Apple', '2021-06-07 10:43:02', NULL),
(39, 6, 30, 6, 42, 41, 23, 5, 'Game Console Controller', 'GSC511948218', '<h3 class=\"font-size-24 mb-3\" style=\"line-height: 1.5; font-size: 1.49975rem; color: rgb(51, 62, 72); font-family: \"Open Sans\", Helvetica, Arial, sans-serif; letter-spacing: -0.144px;\"><b>Fresh Design</b></h3><p class=\"mb-6\" style=\"color: rgb(116, 116, 116); line-height: 1.7; font-family: \"Open Sans\", Helvetica, Arial, sans-serif; font-size: 14px; letter-spacing: -0.144px; margin-bottom: 2.5rem !important;\">Integer bibendum aliquet ipsum, in ultrices enim sodales sed. Quisque ut urna vitae lacus laoreet malesuada eu at massa. Pellentesque nibh augue, pellentesque nec dictum vel, pretium a arcu. Duis eu urna suscipit, lobortis elit quis, ullamcorper massa.</p>', '<h3 class=\"font-size-24 mb-3\" style=\"line-height: 1.5; font-size: 1.49975rem; color: rgb(51, 62, 72); font-family: \"Open Sans\", Helvetica, Arial, sans-serif; letter-spacing: -0.144px; text-align: right;\">intelligent Bass</h3><h3 class=\"font-size-24 mb-3\" style=\"line-height: 1.5; text-align: right;\"><p class=\"mb-6\" style=\"color: rgb(116, 116, 116); line-height: 1.7; font-family: \"Open Sans\", Helvetica, Arial, sans-serif; font-size: 14px; letter-spacing: -0.144px; margin-bottom: 2.5rem !important;\">Fusce vitae nibh mi. Integer posuere, libero et ullamcorper facilisis, enim eros tincidunt orci, eget vestibulum sapien nisi ut leo. Cras finibus vel est ut mollis. Donec luctus condimentum ante et euismod.</p><p class=\"mb-6\" style=\"color: rgb(116, 116, 116); line-height: 1.7; font-family: \"Open Sans\", Helvetica, Arial, sans-serif; font-size: 14px; letter-spacing: -0.144px; margin-bottom: 2.5rem !important;\"><br></p><p class=\"mb-6\" style=\"color: rgb(116, 116, 116); line-height: 1.7; font-family: \"Open Sans\", Helvetica, Arial, sans-serif; font-size: 14px; letter-spacing: -0.144px; margin-bottom: 2.5rem !important;\"><span style=\"color: rgb(51, 62, 72); font-size: 1.49975rem; letter-spacing: -0.144px;\">Battery Life</span></p><p class=\"mb-6\" style=\"color: rgb(116, 116, 116); line-height: 1.7; font-family: \"Open Sans\", Helvetica, Arial, sans-serif; font-size: 14px; letter-spacing: -0.144px; margin-bottom: 2.5rem !important;\">Integer bibendum aliquet ipsum, in ultrices enim sodales sed. Quisque ut urna vitae lacus laoreet malesuada eu at massa. Pellentesque nibh augue, pellentesque nec dictum vel, pretium a arcu. Duis eu urna suscipit, lobortis elit quis, ullamcorper massa.</p></h3>', '300.00', '350.00', 'tk', 'public/upload/1701911683980492.jpg', '[\"public\\/upload\\/1701911683978406.jpg\",\"public\\/upload\\/1701911683978979.png\",\"public\\/upload\\/1701911683979407.jpg\"]', '[\"6\",\"15\",\"17\",\"18\"]', '[\"220 g\",\"MF841HN\\/A\",\"Core i5\",\"2.9 GHz\"]', '20', '[\"4\",\"6\"]', '[\"#ff0000\"]', '[\"Red\"]', '[\"public\\/upload\\/1701911683979830.jpg\"]', '[null]', 1, 'Lorem ipsum dolor sit amet, c', 'Lorem ipsum dolor sit amet,', 'Lorem ipsum dolor sit amet,', '2021-06-07 12:37:41', NULL),
(40, 6, 30, 6, 42, 41, 24, 5, 'Tablet White EliteBook Revolve 810 G2', 'MF841HN', '<h3 class=\"font-size-24 mb-3\" style=\"line-height: 1.5; font-size: 1.49975rem; color: rgb(51, 62, 72); font-family: \"Open Sans\", Helvetica, Arial, sans-serif; letter-spacing: -0.144px;\"><b>Perfectly Done</b></h3><p style=\"margin-bottom: 1.875rem; color: rgb(116, 116, 116); line-height: 1.7; font-family: \"Open Sans\", Helvetica, Arial, sans-serif; font-size: 14px; letter-spacing: -0.144px;\">Praesent ornare, ex a interdum consectetur, lectus diam sodales elit, vitae egestas est enim ornare nisl. Nullam in lectus nec sem semper viverra. In lobortis egestas massa. Nam nec massa nisi. Suspendisse potenti. Quisque suscipit vulputate dui quis volutpat. Ut id elit facilisis, feugiat est in, tempus lacus. Ut ultrices dictum metus, a ultricies ex vulputate ac. Ut id cursus tellus, non tempor quam. Morbi porta diam nisi, id finibus nunc tincidunt eu.</p>', '<h3 class=\"font-size-24 mb-3\" style=\"line-height: 1.5; font-size: 1.49975rem; color: rgb(51, 62, 72); font-family: \"Open Sans\", Helvetica, Arial, sans-serif; letter-spacing: -0.144px;\">Wireless</h3><p class=\"mb-6\" style=\"color: rgb(116, 116, 116); line-height: 1.7; font-family: \"Open Sans\", Helvetica, Arial, sans-serif; font-size: 14px; letter-spacing: -0.144px; margin-bottom: 2.5rem !important;\">Fusce vitae nibh mi. Integer posuere, libero et ullamcorper facilisis, enim eros tincidunt orci, eget vestibulum sapien nisi ut leo. Cras finibus vel est ut mollis. Donec luctus condimentum ante et euismod.</p><h3 class=\"font-size-24 mb-3\" style=\"line-height: 1.5; font-size: 1.49975rem; color: rgb(51, 62, 72); font-family: \"Open Sans\", Helvetica, Arial, sans-serif; letter-spacing: -0.144px;\">Fresh Design</h3><p class=\"mb-6\" style=\"color: rgb(116, 116, 116); line-height: 1.7; font-family: \"Open Sans\", Helvetica, Arial, sans-serif; font-size: 14px; letter-spacing: -0.144px; margin-bottom: 2.5rem !important;\">Integer bibendum aliquet ipsum, in ultrices enim sodales sed. Quisque ut urna vitae lacus laoreet malesuada eu at massa. Pellentesque nibh augue, pellentesque nec dictum vel, pretium a arcu. Duis eu urna suscipit, lobortis elit quis, ullamcorper massa.</p><h3 class=\"font-size-24 mb-3\" style=\"line-height: 1.5; font-size: 1.49975rem; color: rgb(51, 62, 72); font-family: \"Open Sans\", Helvetica, Arial, sans-serif; letter-spacing: -0.144px;\">Fabolous Sound</h3><p class=\"mb-6\" style=\"color: rgb(116, 116, 116); line-height: 1.7; font-family: \"Open Sans\", Helvetica, Arial, sans-serif; font-size: 14px; letter-spacing: -0.144px; margin-bottom: 2.5rem !important;\">Cras rutrum, nibh a sodales accumsan, elit sapien ultrices sapien, eget semper lectus ex congue elit. Nullam dui elit, fermentum a varius at, iaculis non dolor. In hac habitasse platea dictumst.</p>', '1000.00', '1500.00', 'tk', 'public/upload/1701913407543249.jpg', '[\"public\\/upload\\/1701913407541680.jpg\",\"public\\/upload\\/1701913407542295.jpg\"]', '[\"6\",\"7\",\"9\",\"25\",\"24\"]', '[\"7.25kg\",\"90 x 60 x 90 cm\",\"5 years\",\"Mac OS\",\"Mac\"]', '20', '[\"4\"]', '[\"#f60404\"]', '[\"Red\"]', '[\"public\\/upload\\/1701913407542749.jpg\"]', '[\"19 Inch\",\"14 Inch\"]', 1, 'Tablet White EliteBook', 'Tablet_White_EliteBook_Revolve', 'Tablet White EliteBook Revolve 810 G2', '2021-06-07 13:05:05', NULL),
(49, 6, 31, 6, 52, 45, 27, 6, 'Quilted Gilet With Hood', 'QH511948218', '<p><span style=\"color: rgb(112, 112, 112); font-family: Jost; font-size: 16px; letter-spacing: 0.16px;\">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry’s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen.</span><br></p>', '<p><span style=\"color: rgb(112, 112, 112); font-family: Jost; font-size: 16px; letter-spacing: 0.16px;\">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry’s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen.</span><br></p>', '200.00', '250.00', '%', 'public/upload/1702518433927960.png', '[\"public\\/upload\\/1702518433923457.png\",\"public\\/upload\\/1702518433924409.jpg\",\"public\\/upload\\/1702518433925060.png\"]', '[\"6\"]', '[\"500 G\"]', '20', '[\"4\"]', '[\"#ffffff\",\"#000000\",\"#e3e3e3\"]', '[\"White\",\"Black\",\"Grey\"]', '[\"public\\/upload\\/1702518433925768.png\",\"public\\/upload\\/1702518433926470.jpg\",\"public\\/upload\\/1702518433927124.png\"]', '[\"XXL\",\"XL\"]', 1, 'Quilted Gilet With Hood', 'Quilted_Gilet_With_Hood', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry', '2021-06-14 05:21:43', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

DROP TABLE IF EXISTS `settings`;
CREATE TABLE IF NOT EXISTS `settings` (
  `settings_id` int(11) NOT NULL AUTO_INCREMENT,
  `settings_name` varchar(255) NOT NULL,
  `settings_value` longtext,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`settings_id`)
) ENGINE=MyISAM AUTO_INCREMENT=27 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`settings_id`, `settings_name`, `settings_value`, `created_at`, `updated_at`) VALUES
(2, 'Header_Logo', 'public/upload/1701888723602533.png', '2021-05-27 12:13:14', NULL),
(4, 'Footer_Logo', 'public/upload/1701888467748069.png', '2021-05-29 05:07:56', NULL),
(5, 'Invoice_Logo', 'public/upload/1701888793558804.png', '2021-05-29 07:06:33', NULL),
(6, 'Terms_Title', 'There are many variations of passages  adsds', '2021-05-29 09:16:57', NULL),
(7, 'Terms_conditions_descriptions', '<p style=\"text-align: justify; \"><b>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and asdsad&nbsp;</b></p><ol><li style=\"text-align: justify; \">sdasd</li><li style=\"text-align: justify; \">a</li><li style=\"text-align: justify; \">dasas</li><li style=\"text-align: justify; \">d</li><li style=\"text-align: justify; \">asd</li><li style=\"text-align: justify; \">sda</li><li style=\"text-align: justify; \">sda</li><li style=\"text-align: justify; \">sad</li></ol><p style=\"text-align: justify; \"><br></p><p style=\"text-align: justify;\">asdas&nbsp;</p>', '2021-05-29 09:27:23', NULL),
(8, 'Meta_Description', 'There are many variations of passage  s of Lorem Ipsum available, but the majority have suffered alteration in', '2021-05-29 11:31:03', NULL),
(9, 'Favicon', 'public/upload/1701098928829797.jpg', '2021-05-29 12:34:51', NULL),
(10, 'ContactStreet_Address', '450/C , Khilgaon , Dhaka-1219\r\nRekha Vilah, Porokot , Bank-Road , Doshghoria , Chatkhil ,Noakhali', '2021-05-29 13:53:57', NULL),
(11, 'Contact_Phone', '01982525844', '2021-05-29 13:53:57', NULL),
(12, 'Contact_Website', 'https:www.apitsoft.com', '2021-05-29 13:53:57', NULL),
(13, 'Contact_Us_Email_Address', 'towhidhasang1@gmail.com', '2021-05-29 13:53:57', NULL),
(14, 'Contact_Text', '<p style=\"color: rgb(89, 92, 151); text-align: justify;\"><span style=\"font-weight: bolder;\">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and asdsad&nbsp;</span></p><ol style=\"color: rgb(89, 92, 151); text-align: justify;\"><li style=\"text-align: justify;\">sdasd</li><li style=\"text-align: justify;\">a</li><li style=\"text-align: justify;\">dasas</li><li style=\"text-align: justify;\">d</li><li style=\"text-align: justify;\">asd</li><li style=\"text-align: justify;\">sda</li><li style=\"text-align: justify;\">sda</li><li style=\"text-align: justify;\">sad</li></ol>', '2021-05-29 13:53:57', NULL),
(15, 'Contact_Title', 'Title number 2', '2021-05-29 13:53:57', NULL),
(16, 'Privacy_Policy_Title', 'Privacy Policy', '2021-05-31 06:32:57', NULL),
(17, 'Privacy_Policy_descriptions', '<ol><li><span style=\"font-weight: bold; color: rgb(57, 123, 33); background-color: rgb(255, 0, 0);\">A Privacy Policy is a statement or a legal document that states how a company or website collects, handles,</span></li><li> and processes data of its customers and visitors. It explicitly describes whether that information is kept confidential, or is shared with or sold to third parties.\r\n\r\nPersonal information about an individual may include the following:\r\n</li><li>\r\nName\r\nAddress\r\nEmail\r\nPhone number\r\nAge\r\nSex\r\nMarital status\r\nRace\r\nNationality\r\nReligious beliefs\r\nFor example, an excerpt from Pinterest\'s Privacy Policy agreement clearly describes the information Pinterest collects from its users as well as from any other source that users enable Pinterest to gather information from. </li><li>The information that the user voluntarily gives includes names, photos, pins, likes, email address, and/or phone number etc., all of which is regarded as personal information.\r\n\r\n</li></ol>', '2021-05-31 06:32:57', NULL),
(18, 'Privacy_Policy_Meta_Description', 'Companies or websites that handle customer information are required to publish their Privacy Policies on their business websites. If you own a website, web app, mobile app or desktop app that collects or processes user data, you most certainly will have to post a Privacy Policy on your website (or give in-app access to the full Privacy Policy agreement).', '2021-05-31 06:32:57', NULL),
(19, 'Background_Image', 'public/upload/1702089244052736.jpg', '2021-06-05 05:09:33', NULL),
(20, 'Currency', '$', '2021-06-08 06:04:12', NULL),
(21, 'Partner', '1', '2021-06-10 09:46:49', NULL),
(22, 'Slider', '1', '2021-06-10 12:10:35', NULL),
(23, 'Footer', '1', '2021-06-10 12:18:01', NULL),
(24, 'Recently_Viewed', '1', '2021-06-10 12:30:06', NULL),
(25, 'Secret_Key', '124685', '2021-06-11 08:40:35', NULL),
(26, 'Default_Branch', 'All Branch', '2021-06-12 13:56:02', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `settings_faq`
--

DROP TABLE IF EXISTS `settings_faq`;
CREATE TABLE IF NOT EXISTS `settings_faq` (
  `faq_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `update_user_id` int(11) DEFAULT NULL,
  `faq_title` longtext,
  `faq_description` longtext,
  `faq_status` int(10) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`faq_id`)
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `settings_faq`
--

INSERT INTO `settings_faq` (`faq_id`, `user_id`, `update_user_id`, `faq_title`, `faq_description`, `faq_status`, `created_at`, `updated_at`) VALUES
(9, NULL, 6, 'updategjgjg', '<p><span style=\"font-family: &quot;Open Sans&quot;, Arial, sans-serif; font-size: 14px; text-align: justify;\">&nbsp;It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially&nbsp;</span></p><p><span style=\"font-family: &quot;Open Sans&quot;, Arial, sans-serif; font-size: 14px; text-align: justify;\">as das d</span></p><p><span style=\"font-family: &quot;Open Sans&quot;, Arial, sans-serif; font-size: 14px; text-align: justify;\">sa dad asdasdaasdasdasddsasad<br></span><br></p>', 0, '2021-05-31 10:39:53', NULL),
(10, NULL, NULL, 'fbdfh', '<p><b>dfhdfhfdhjfdh</b></p>', 1, '2021-05-31 10:41:22', NULL),
(11, 6, 6, 'lorem 1gfjgfjgfj', '<p>tytutuitughkhgkkhkhk</p>', 1, '2021-05-31 13:02:13', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `shipping`
--

DROP TABLE IF EXISTS `shipping`;
CREATE TABLE IF NOT EXISTS `shipping` (
  `shipping_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `update_user_id` int(11) DEFAULT NULL,
  `shipping_title` varchar(255) DEFAULT NULL,
  `shipping_description` longtext,
  `shipping_amount` varchar(255) DEFAULT NULL,
  `time` varchar(255) DEFAULT NULL,
  `shipping_status` int(255) DEFAULT NULL,
  `shipping_image` varchar(255) DEFAULT NULL,
  `create_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `update_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`shipping_id`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `shipping`
--

INSERT INTO `shipping` (`shipping_id`, `user_id`, `update_user_id`, `shipping_title`, `shipping_description`, `shipping_amount`, `time`, `shipping_status`, `shipping_image`, `create_at`, `update_at`) VALUES
(3, 6, NULL, 'Free Shipping', 'Free Shipping All Over The World', '10', '3Fays', 1, 'public/upload/1701896043289665.jpg', '2021-06-07 08:29:05', NULL),
(4, 6, NULL, 'Express Shipping', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of', '10', '5 Days', 1, 'public/upload/1701896136210858.jpg', '2021-06-07 08:30:34', NULL),
(5, 6, NULL, 'FedEx', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen', '5', '7 Days', 1, 'public/upload/1701896190086862.png', '2021-06-07 08:31:25', NULL),
(6, 6, NULL, 'RedEx', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into', '2', '10 Days', 1, 'public/upload/1701896241904413.png', '2021-06-07 08:32:15', NULL),
(7, 6, NULL, 'BD-DEX', 'Bangladesh Daraz Shipping', '2', '5Days', 1, 'public/upload/1702062576768912.jpg', '2021-06-09 04:36:04', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `specification`
--

DROP TABLE IF EXISTS `specification`;
CREATE TABLE IF NOT EXISTS `specification` (
  `specification_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `update_user_id` int(11) DEFAULT NULL,
  `specification_name` varchar(255) DEFAULT NULL,
  `specification_status` int(255) DEFAULT NULL,
  `create_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `update_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`specification_id`)
) ENGINE=MyISAM AUTO_INCREMENT=28 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `specification`
--

INSERT INTO `specification` (`specification_id`, `user_id`, `update_user_id`, `specification_name`, `specification_status`, `create_at`, `update_at`) VALUES
(6, 6, NULL, 'Weight', 1, '2021-06-04 06:08:43', NULL),
(7, 6, NULL, 'Dimensions', 1, '2021-06-04 06:08:53', NULL),
(8, 6, NULL, 'Size', 1, '2021-06-04 06:09:02', NULL),
(9, 6, NULL, 'Guarantee', 1, '2021-06-04 06:09:18', NULL),
(10, 6, NULL, 'Item Height', 1, '2021-06-04 06:09:35', NULL),
(11, 6, NULL, 'Item Width', 1, '2021-06-04 06:09:44', NULL),
(12, 6, NULL, 'Screen Size', 1, '2021-06-04 06:09:59', NULL),
(13, 6, NULL, 'Item Weight', 1, '2021-06-04 06:10:09', NULL),
(14, 6, NULL, 'Product Dimensions', 1, '2021-06-04 06:10:20', NULL),
(15, 6, NULL, 'Item model number', 1, '2021-06-04 06:10:30', NULL),
(16, 6, NULL, 'Processor Brand', 1, '2021-06-04 06:10:42', NULL),
(17, 6, NULL, 'Processor Type', 1, '2021-06-04 06:10:50', NULL),
(18, 6, NULL, 'Processor Speed', 1, '2021-06-04 06:10:59', NULL),
(19, 6, NULL, 'RAM Size', 1, '2021-06-04 06:11:08', NULL),
(20, 6, NULL, 'Hard Drive Size', 1, '2021-06-04 06:11:22', NULL),
(21, 6, NULL, 'Hard Disk Technology', 1, '2021-06-04 06:11:35', NULL),
(22, 6, NULL, 'Graphics Coprocessor', 1, '2021-06-04 06:11:41', NULL),
(23, 6, NULL, 'Graphics Card Description', 1, '2021-06-04 06:12:12', NULL),
(24, 6, NULL, 'Hardware Platform', 1, '2021-06-04 06:12:46', NULL),
(25, 6, NULL, 'Operating System', 1, '2021-06-04 06:12:52', NULL),
(26, 6, NULL, 'Average Battery Life (in hours)', 1, '2021-06-04 06:13:01', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `stock`
--

DROP TABLE IF EXISTS `stock`;
CREATE TABLE IF NOT EXISTS `stock` (
  `stock_id` int(11) NOT NULL AUTO_INCREMENT,
  `stock_product` longtext,
  `user_id` int(11) DEFAULT NULL,
  `update_user_id` int(11) DEFAULT NULL,
  `branch_id` int(255) DEFAULT NULL,
  `supplier_id` int(255) DEFAULT NULL,
  `note` varchar(255) DEFAULT NULL,
  `stock_status` int(255) DEFAULT NULL,
  `create_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `update_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`stock_id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `stock`
--

INSERT INTO `stock` (`stock_id`, `stock_product`, `user_id`, `update_user_id`, `branch_id`, `supplier_id`, `note`, `stock_status`, `create_at`, `update_at`) VALUES
(1, '[\"[{\\\"product_id\\\":46,\\\"product_name\\\":\\\"Full Color LaserJet Pro M452dn\\\",\\\"product_code\\\":\\\"FHJ511948218\\\",\\\"product_Qty\\\":0,\\\"product_buying_price\\\":4000,\\\"product_subtotal\\\":0},{\\\"product_id\\\":45,\\\"product_name\\\":\\\"Game Console Controller\\\",\\\"product_code\\\":\\\"GSC511948218\\\",\\\"product_Qty\\\":0,\\\"product_buying_price\\\":300,\\\"product_subtotal\\\":0},{\\\"product_id\\\":47,\\\"product_name\\\":\\\"Kurti\\\",\\\"product_code\\\":\\\"FW5119\\\",\\\"product_Qty\\\":0,\\\"product_buying_price\\\":200,\\\"product_subtotal\\\":0}]\"]', 10, NULL, 31, 1, ';\'jmkghjncfg', 1, '2021-06-13 12:33:54', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `supplier`
--

DROP TABLE IF EXISTS `supplier`;
CREATE TABLE IF NOT EXISTS `supplier` (
  `supplier_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `update_user_id` int(11) DEFAULT NULL,
  `supplier_name` varchar(255) DEFAULT NULL,
  `supplier_phone` varchar(255) DEFAULT NULL,
  `supplier_address` varchar(255) DEFAULT NULL,
  `supplier_image` varchar(255) DEFAULT NULL,
  `create_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `update_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`supplier_id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `supplier`
--

INSERT INTO `supplier` (`supplier_id`, `user_id`, `update_user_id`, `supplier_name`, `supplier_phone`, `supplier_address`, `supplier_image`, `create_at`, `update_at`) VALUES
(1, 10, NULL, 'Sajal roy', '01555555555555', 'aasdsadasdajj', 'public/upload/1701548415718335.jpg', '2021-06-03 12:23:42', NULL),
(2, 6, NULL, 'asdasd', 'q1312', '123123', NULL, '2021-06-13 06:57:45', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `themes`
--

DROP TABLE IF EXISTS `themes`;
CREATE TABLE IF NOT EXISTS `themes` (
  `theme_id` int(11) NOT NULL AUTO_INCREMENT,
  `theme_name` varchar(255) DEFAULT NULL,
  `folder_name` varchar(255) DEFAULT NULL,
  `time` datetime DEFAULT CURRENT_TIMESTAMP,
  `status` int(20) DEFAULT NULL,
  `image_1` varchar(255) DEFAULT NULL,
  `image_2` varchar(255) DEFAULT NULL,
  `image_3` varchar(255) DEFAULT NULL,
  `image_4` varchar(255) DEFAULT NULL,
  `image_5` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`theme_id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `themes`
--

INSERT INTO `themes` (`theme_id`, `theme_name`, `folder_name`, `time`, `status`, `image_1`, `image_2`, `image_3`, `image_4`, `image_5`, `created_at`, `updated_at`) VALUES
(1, 'Electro', 'electro', '2021-05-20 16:34:15', 1, 'public/upload/1700798955301518.jpg', 'public/upload/1700802518797666.png', 'public/upload/1700802542123319.png', 'public/upload/1700802550875956.png', 'public/upload/1700802559009707.png', NULL, NULL),
(3, 'Venedor Orange', 'venedor_orange', '2021-05-20 18:19:35', 0, 'public/upload/1700799336582032.png', 'public/upload/1700804883998590.png', 'public/upload/1700804895208551.png', 'public/upload/1700804904117364.png', 'public/upload/1700804925702759.png', NULL, NULL),
(4, 'Venedor Green', 'venedor_green', '2021-05-26 12:01:33', 0, 'public/upload/1700799717600915.png', 'public/upload/1700805051515568.png', 'public/upload/1700805059788664.png', 'public/upload/1700805066875796.png', 'public/upload/1700805074234877.png', NULL, NULL),
(5, 'Porto', 'porto', '2021-05-26 12:04:52', 0, 'public/upload/1700799778181350.png', 'public/upload/1700805194299763.png', 'public/upload/1700805206448803.png', 'public/upload/1700805881117644.png', 'public/upload/1700805889600751.png', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `themes_banner`
--

DROP TABLE IF EXISTS `themes_banner`;
CREATE TABLE IF NOT EXISTS `themes_banner` (
  `banner_id` int(11) NOT NULL AUTO_INCREMENT,
  `banner_title` varchar(255) DEFAULT NULL,
  `banner_description` longtext,
  `banner_link` varchar(255) DEFAULT NULL,
  `banner_image` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`banner_id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `themes_banner`
--

INSERT INTO `themes_banner` (`banner_id`, `banner_title`, `banner_description`, `banner_link`, `banner_image`, `created_at`, `updated_at`) VALUES
(3, '50% Off sale', 'Lorem Ipsum is simply dummy', 'https://www.google.com/', 'public/upload/1700645025267075.jpg', '2021-05-24 13:04:24', NULL),
(4, 'Horizontal Banner', 'This is for horizontal banner', 'https://www.google.com/', 'public/upload/1701613223282759.jpg', '2021-06-04 05:33:47', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `themes_logo`
--

DROP TABLE IF EXISTS `themes_logo`;
CREATE TABLE IF NOT EXISTS `themes_logo` (
  `logo_id` int(11) NOT NULL AUTO_INCREMENT,
  `logo_image` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`logo_id`)
) ENGINE=MyISAM AUTO_INCREMENT=14 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `themes_logo`
--

INSERT INTO `themes_logo` (`logo_id`, `logo_image`, `created_at`, `updated_at`) VALUES
(1, 'public/upload/1700730454293461.png', '2021-05-25 10:59:25', NULL),
(13, 'public/upload/1700896336255948.jpg', '2021-05-27 07:39:10', NULL),
(12, 'public/upload/1700893224357196.jpg', '2021-05-27 06:49:43', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `themes_partner`
--

DROP TABLE IF EXISTS `themes_partner`;
CREATE TABLE IF NOT EXISTS `themes_partner` (
  `partner_id` int(11) NOT NULL AUTO_INCREMENT,
  `partner_link` varchar(255) DEFAULT NULL,
  `partner_image` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`partner_id`)
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `themes_partner`
--

INSERT INTO `themes_partner` (`partner_id`, `partner_link`, `partner_image`, `created_at`, `updated_at`) VALUES
(1, 'https://www.google.com/', 'public/upload/1701888963167435.png', '2021-05-25 09:31:44', NULL),
(7, 'https://www.google.com', 'public/upload/1701888972288071.png', '2021-06-03 06:58:23', NULL),
(3, 'https://www.google.com/', 'public/upload/1701888979524090.png', '2021-05-25 09:35:02', NULL),
(6, 'https://www.google.com', 'public/upload/1701888987167895.png', '2021-06-03 06:58:14', NULL),
(8, 'https://www.google.com', 'public/upload/1701889004152825.png', '2021-06-03 06:58:30', NULL),
(9, 'https://www.google.com', 'public/upload/1701889014369280.png', '2021-06-03 06:59:34', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `themes_review`
--

DROP TABLE IF EXISTS `themes_review`;
CREATE TABLE IF NOT EXISTS `themes_review` (
  `review_id` int(11) NOT NULL AUTO_INCREMENT,
  `review_title` varchar(255) DEFAULT NULL,
  `review_subtitle` varchar(255) DEFAULT NULL,
  `review_description` longtext,
  `review_image` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`review_id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `themes_review`
--

INSERT INTO `themes_review` (`review_id`, `review_title`, `review_subtitle`, `review_description`, `review_image`, `created_at`, `updated_at`) VALUES
(1, 'Towhid Hasan', 'Web Application Developer', 'This Is Great', 'public/upload/1700711508511568.jpg', '2021-05-25 06:41:25', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `themes_service`
--

DROP TABLE IF EXISTS `themes_service`;
CREATE TABLE IF NOT EXISTS `themes_service` (
  `service_id` int(11) NOT NULL AUTO_INCREMENT,
  `service_title` varchar(255) DEFAULT NULL,
  `service_description` longtext,
  `service_image` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`service_id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `themes_service`
--

INSERT INTO `themes_service` (`service_id`, `service_title`, `service_description`, `service_image`, `created_at`, `updated_at`) VALUES
(1, 'DzAEF5SMLG', 'qHFHqrkmif', 'public/upload/1700644904029748.jpg', '2021-05-24 09:13:20', NULL),
(5, 'New Service', 'w,enwnrewnt', 'public/upload/1700797485905619.png', '2021-05-26 05:27:59', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `themes_slider`
--

DROP TABLE IF EXISTS `themes_slider`;
CREATE TABLE IF NOT EXISTS `themes_slider` (
  `slider_id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) DEFAULT NULL,
  `title_font` varchar(255) DEFAULT NULL,
  `title_color` varchar(255) DEFAULT NULL,
  `subtitle` varchar(255) DEFAULT NULL,
  `subtitle_font` varchar(255) DEFAULT NULL,
  `subtitle_color` varchar(255) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `description_font` varchar(255) DEFAULT NULL,
  `description_color` varchar(255) DEFAULT NULL,
  `slider_image` varchar(255) DEFAULT NULL,
  `background_image` varchar(255) DEFAULT NULL,
  `slider_price` float DEFAULT NULL,
  `slider_button_name` varchar(255) DEFAULT NULL,
  `slider_button_link` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`slider_id`)
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `themes_slider`
--

INSERT INTO `themes_slider` (`slider_id`, `title`, `title_font`, `title_color`, `subtitle`, `subtitle_font`, `subtitle_color`, `description`, `description_font`, `description_color`, `slider_image`, `background_image`, `slider_price`, `slider_button_name`, `slider_button_link`, `created_at`, `updated_at`) VALUES
(10, 'Thyme is', '4', '#cab7e6', 'Thyme is the herb of', '1', '#9481b1', 'Thyme is the herb of some members of the genus Thymus of aromatic perennia', '2', '#43296a', 'public/upload/1701900306835997.png', NULL, 20, 'Test', 'https://en.wikipedia.org/wiki/Thyme', '2021-06-03 07:36:16', NULL),
(9, 'Get Up To 25% Off', '1', '#b5a9c7', 'New Fashion Added', '1', '#563d7c', 'kjhgl', '1', '#563d7c', 'public/upload/1701900320263729.png', 'public/upload/1701529194649341.jpg', 50, 'Test', 'https://en.wikipedia.org/wiki/Thyme', '2021-06-03 07:18:11', NULL),
(12, 'iewqqNbX7o', '439105', '#c6c5c9', '3ocFVCIPxh', '053505', '#afaeb2', '0DSLlFH5tA', '099551', '#3e3649', 'public/upload/1701900332390973.png', NULL, 8187, 'fhbdfjfdjfgjfgjgf', 'http://10.10.10.100/25-Oman-Vendor-RestApi/public/home/partner', '2021-06-03 08:07:03', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `theme_rigth_side_banner`
--

DROP TABLE IF EXISTS `theme_rigth_side_banner`;
CREATE TABLE IF NOT EXISTS `theme_rigth_side_banner` (
  `rigth_banner_id` int(11) NOT NULL AUTO_INCREMENT,
  `rigth_banner_title` varchar(255) DEFAULT NULL,
  `right_banner_description` longtext,
  `right_banner_link` varchar(255) DEFAULT NULL,
  `right_banner_image` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`rigth_banner_id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `theme_rigth_side_banner`
--

INSERT INTO `theme_rigth_side_banner` (`rigth_banner_id`, `rigth_banner_title`, `right_banner_description`, `right_banner_link`, `right_banner_image`, `created_at`, `updated_at`) VALUES
(3, 'Right Side Banner', 'lorem100000ifhdgidshgvidsh', 'https://www.google.com/', 'public/upload/1700708746748891.jpg', '2021-05-25 05:57:31', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `branch_id` int(11) DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `language_id` int(20) NOT NULL DEFAULT '1',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `branch_id`, `name`, `email`, `email_verified_at`, `password`, `image`, `language_id`, `remember_token`, `created_at`, `updated_at`) VALUES
(6, 30, 'admin', 'admin@gmail.com', NULL, '$2y$10$E0JLGRb8y7yL8hJjwGVgn.xwu3ODFUNCN1Q6ROdFC7FSVdmoriVmO', NULL, 1, NULL, NULL, NULL),
(10, 31, 'TALHA ZOBAER', 'talhazobaer169@gmail.com', NULL, '$2y$10$sfujYbieWQnpFA0hGBZrj.BmcGEcwiIwaxcFF6zfaS/g/S/fyZaHK', 'upload/1700910147620359.jpg', 36, NULL, NULL, NULL),
(9, 31, 'Towhid Hasan', 'towhidhasang1@gmail.com', NULL, '$2y$10$4x/547XvwmVDTFGrN0xhZ.M0Wg2RbhyTPzLDwQW//CfdRzUMLSy9.', 'upload/1700909624551195.jpg', 1, NULL, NULL, NULL);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
