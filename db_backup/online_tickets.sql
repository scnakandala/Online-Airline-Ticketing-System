-- phpMyAdmin SQL Dump
-- version 3.3.9
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Nov 19, 2012 at 03:14 PM
-- Server version: 5.5.8
-- PHP Version: 5.3.5

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `online_tickets`
--

-- --------------------------------------------------------

--
-- Table structure for table `acos`
--

CREATE TABLE IF NOT EXISTS `acos` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `parent_id` int(10) DEFAULT NULL,
  `model` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `foreign_key` int(10) DEFAULT NULL,
  `alias` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `lft` int(10) DEFAULT NULL,
  `rght` int(10) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `acos_idx1` (`lft`,`rght`),
  KEY `acos_idx2` (`alias`),
  KEY `acos_idx3` (`model`,`foreign_key`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=105 ;

--
-- Dumping data for table `acos`
--

INSERT INTO `acos` (`id`, `parent_id`, `model`, `foreign_key`, `alias`, `lft`, `rght`) VALUES
(1, NULL, 'Menu', 1, 'controllers', 1, 208),
(2, 5, 'Menu', 2, 'Users', 25, 52),
(3, 5, 'Menu', 3, 'Groups', 11, 24),
(4, 5, 'Menu', 4, 'Menus', 53, 78),
(5, 1, 'Menu', 5, 'Bcp', 8, 91),
(6, 1, 'Menu', 6, 'Pages', 2, 7),
(7, 5, 'Menu', 7, 'index', 9, 10),
(8, 6, 'Menu', 8, 'display', 3, 4),
(9, 3, 'Menu', 9, 'view', 14, 15),
(10, 2, 'Menu', 10, 'index', 26, 27),
(11, 2, 'Menu', 11, 'view', 30, 31),
(12, 2, 'Menu', 12, 'add', 32, 33),
(13, 2, 'Menu', 13, 'edit', 34, 35),
(14, 2, 'Menu', 14, 'delete', 36, 37),
(15, 2, 'Menu', 15, 'login', 38, 39),
(16, 2, 'Menu', 16, 'logout', 40, 41),
(17, 2, 'Menu', 17, 'changePassword', 42, 43),
(18, 2, 'Menu', 18, 'permissions', 28, 29),
(19, 2, 'Menu', 19, 'verifyTree', 44, 45),
(20, 3, 'Menu', 20, 'edit', 16, 17),
(21, 2, 'Menu', 21, 'recover', 46, 47),
(22, 2, 'Menu', 22, 'tree', 48, 49),
(23, 2, 'Menu', 23, 'test', 50, 51),
(24, 4, 'Menu', 24, 'index', 54, 55),
(25, 4, 'Menu', 25, 'view', 58, 59),
(26, 4, 'Menu', 26, 'edit', 60, 61),
(27, 4, 'Menu', 27, 'delete', 62, 63),
(28, 4, 'Menu', 28, 'add', 64, 65),
(29, 4, 'Menu', 29, 'tree', 66, 67),
(30, 4, 'Menu', 30, 'permissions', 56, 57),
(31, 4, 'Menu', 31, 'movedown', 68, 69),
(32, 4, 'Menu', 32, 'moveup', 70, 71),
(33, 4, 'Menu', 33, 'verifyTree', 72, 73),
(34, 4, 'Menu', 34, 'recover', 74, 75),
(35, 4, 'Menu', 35, 'redundant', 76, 77),
(36, 3, 'Menu', 36, 'index', 18, 19),
(37, 3, 'Menu', 37, 'add', 20, 21),
(38, 3, 'Menu', 38, 'delete', 22, 23),
(39, 3, 'Menu', 39, 'permissions', 12, 13),
(40, 5, 'Menu', 40, 'Settings', 79, 90),
(41, 40, 'Menu', 41, 'index', 80, 81),
(42, 40, 'Menu', 42, 'view', 82, 83),
(43, 40, 'Menu', 43, 'add', 84, 85),
(44, 40, 'Menu', 44, 'edit', 86, 87),
(45, 40, 'Menu', 45, 'delete', 88, 89),
(46, 6, 'Menu', 46, 'home', 5, 6),
(47, 1, 'Menu', 47, 'Airline', 92, 93),
(48, 1, 'Menu', 48, 'Airplanes', 94, 105),
(49, 48, 'Menu', 49, 'index', 95, 96),
(50, 48, 'Menu', 50, 'view', 97, 98),
(51, 48, 'Menu', 51, 'add', 99, 100),
(52, 48, 'Menu', 52, 'edit', 101, 102),
(53, 48, 'Menu', 53, 'delete', 103, 104),
(54, 1, 'Menu', 54, 'Airports', 106, 117),
(55, 54, 'Menu', 55, 'index', 107, 108),
(56, 54, 'Menu', 56, 'view', 109, 110),
(57, 54, 'Menu', 57, 'add', 111, 112),
(58, 54, 'Menu', 58, 'edit', 113, 114),
(59, 54, 'Menu', 59, 'delete', 115, 116),
(60, 1, 'Menu', 60, 'Creditcards', 118, 129),
(61, 60, 'Menu', 61, 'index', 119, 120),
(62, 60, 'Menu', 62, 'view', 121, 122),
(63, 60, 'Menu', 63, 'add', 123, 124),
(64, 60, 'Menu', 64, 'edit', 125, 126),
(65, 60, 'Menu', 65, 'delete', 127, 128),
(66, 1, 'Menu', 66, 'Customers', 130, 141),
(67, 66, 'Menu', 67, 'index', 131, 132),
(68, 66, 'Menu', 68, 'view', 133, 134),
(69, 66, 'Menu', 69, 'add', 135, 136),
(70, 66, 'Menu', 70, 'edit', 137, 138),
(71, 66, 'Menu', 71, 'delete', 139, 140),
(72, 1, 'Menu', 72, 'Fares', 142, 153),
(73, 72, 'Menu', 73, 'index', 143, 144),
(74, 72, 'Menu', 74, 'view', 145, 146),
(75, 72, 'Menu', 75, 'add', 147, 148),
(76, 72, 'Menu', 76, 'edit', 149, 150),
(77, 72, 'Menu', 77, 'delete', 151, 152),
(78, 1, 'Menu', 78, 'Flights', 154, 165),
(79, 78, 'Menu', 79, 'index', 155, 156),
(80, 78, 'Menu', 80, 'view', 157, 158),
(81, 78, 'Menu', 81, 'add', 159, 160),
(82, 78, 'Menu', 82, 'edit', 161, 162),
(83, 78, 'Menu', 83, 'delete', 163, 164),
(84, 1, 'Menu', 84, 'Notifications', 166, 177),
(85, 84, 'Menu', 85, 'index', 167, 168),
(86, 84, 'Menu', 86, 'view', 169, 170),
(87, 84, 'Menu', 87, 'add', 171, 172),
(88, 84, 'Menu', 88, 'edit', 173, 174),
(89, 84, 'Menu', 89, 'delete', 175, 176),
(90, 1, 'Menu', 90, 'Reservations', 178, 189),
(91, 90, 'Menu', 91, 'index', 179, 180),
(92, 90, 'Menu', 92, 'view', 181, 182),
(93, 90, 'Menu', 93, 'add', 183, 184),
(94, 90, 'Menu', 94, 'edit', 185, 186),
(95, 90, 'Menu', 95, 'delete', 187, 188),
(96, 1, 'Menu', 96, 'SpecificFlights', 190, 201),
(97, 96, 'Menu', 97, 'index', 191, 192),
(98, 96, 'Menu', 98, 'view', 193, 194),
(99, 96, 'Menu', 99, 'add', 195, 196),
(100, 96, 'Menu', 100, 'edit', 197, 198),
(101, 96, 'Menu', 101, 'delete', 199, 200),
(102, 1, 'Menu', 102, 'Ticketings', 202, 207),
(103, 102, 'Menu', 103, 'index', 203, 204),
(104, 102, 'Menu', 104, 'search_result', 205, 206);

-- --------------------------------------------------------

--
-- Table structure for table `airplanes`
--

CREATE TABLE IF NOT EXISTS `airplanes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `type` varchar(20) DEFAULT NULL,
  `max_business_class_seats` int(11) DEFAULT NULL,
  `max_economy_class_seats` int(11) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `airplanes`
--

INSERT INTO `airplanes` (`id`, `type`, `max_business_class_seats`, `max_economy_class_seats`, `created`, `modified`) VALUES
(1, 'Airbus A380', 200, 500, '2012-11-11 12:06:11', '2012-11-11 12:06:11');

-- --------------------------------------------------------

--
-- Table structure for table `airports`
--

CREATE TABLE IF NOT EXISTS `airports` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(20) NOT NULL DEFAULT '',
  `city` varchar(20) DEFAULT NULL,
  `country` varchar(20) DEFAULT NULL,
  `no_of_terminals` int(11) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`name`),
  UNIQUE KEY `airport_code` (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `airports`
--

INSERT INTO `airports` (`id`, `name`, `city`, `country`, `no_of_terminals`, `created`, `modified`) VALUES
(1, 'BIA-Colombo', 'Colombo', 'Sri Lanka', 2, '2012-11-10 15:41:24', '2012-11-10 15:41:24'),
(2, 'DIA-Delli', 'Delli', 'India', 5, '2012-11-10 15:41:42', '2012-11-10 15:41:42'),
(3, 'SIA-Singapore', 'Singapore', 'Singapore', 10, '2012-11-10 15:42:01', '2012-11-10 15:42:01');

-- --------------------------------------------------------

--
-- Table structure for table `aros`
--

CREATE TABLE IF NOT EXISTS `aros` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `parent_id` int(10) DEFAULT NULL,
  `model` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `foreign_key` int(10) DEFAULT NULL,
  `alias` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `lft` int(10) DEFAULT NULL,
  `rght` int(10) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `aros_idx1` (`lft`,`rght`),
  KEY `aros_idx2` (`alias`),
  KEY `aros_idx3` (`model`,`foreign_key`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=7 ;

--
-- Dumping data for table `aros`
--

INSERT INTO `aros` (`id`, `parent_id`, `model`, `foreign_key`, `alias`, `lft`, `rght`) VALUES
(1, NULL, 'Group', 1, 'Group:1', 1, 4),
(2, 1, 'User', 1, 'admin', 2, 3),
(4, NULL, 'Group', 3, 'Group:3', 5, 10),
(5, 4, 'User', 2, 'User:2', 6, 7),
(6, 4, 'User', 2, 'User:2', 8, 9);

-- --------------------------------------------------------

--
-- Table structure for table `aros_acos`
--

CREATE TABLE IF NOT EXISTS `aros_acos` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `aro_id` int(10) NOT NULL,
  `aco_id` int(10) NOT NULL,
  `_create` varchar(2) COLLATE utf8_unicode_ci NOT NULL DEFAULT '0',
  `_read` varchar(2) COLLATE utf8_unicode_ci NOT NULL DEFAULT '0',
  `_update` varchar(2) COLLATE utf8_unicode_ci NOT NULL DEFAULT '0',
  `_delete` varchar(2) COLLATE utf8_unicode_ci NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `aco_id` (`aco_id`),
  KEY `aro_id` (`aro_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=18 ;

--
-- Dumping data for table `aros_acos`
--

INSERT INTO `aros_acos` (`id`, `aro_id`, `aco_id`, `_create`, `_read`, `_update`, `_delete`) VALUES
(1, 1, 5, '1', '1', '1', '1'),
(2, 1, 2, '1', '1', '1', '1'),
(3, 1, 3, '1', '1', '1', '1'),
(4, 1, 4, '1', '1', '1', '1'),
(6, 1, 6, '1', '1', '1', '1'),
(7, 1, 40, '1', '1', '1', '1'),
(8, 2, 1, '1', '1', '1', '1'),
(9, 2, 16, '1', '1', '1', '1'),
(10, 5, 15, '1', '1', '1', '1'),
(11, 5, 16, '1', '1', '1', '1'),
(12, 5, 17, '1', '1', '1', '1'),
(13, 6, 15, '1', '1', '1', '1'),
(14, 6, 16, '1', '1', '1', '1'),
(15, 6, 17, '1', '1', '1', '1'),
(16, 6, 48, '1', '1', '1', '1'),
(17, 6, 1, '1', '1', '1', '1');

-- --------------------------------------------------------

--
-- Table structure for table `creditcards`
--

CREATE TABLE IF NOT EXISTS `creditcards` (
  `credit_card_no` int(11) NOT NULL,
  `credit_card_type` varchar(20) DEFAULT NULL,
  `expiration_date` date DEFAULT NULL,
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `reservation_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`),
  KEY `paid_by` (`reservation_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `creditcards`
--


-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE IF NOT EXISTS `customers` (
  `first_name` varchar(20) DEFAULT NULL,
  `last_name` varchar(20) DEFAULT NULL,
  `phone_number` varchar(20) DEFAULT NULL,
  `email_address` varchar(50) DEFAULT NULL,
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `reservation_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `customer_id` (`id`),
  KEY `reservation_made_by` (`reservation_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `customers`
--


-- --------------------------------------------------------

--
-- Table structure for table `fares`
--

CREATE TABLE IF NOT EXISTS `fares` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `amount` double DEFAULT NULL,
  `type` varchar(20) DEFAULT NULL,
  `weight_restrictions` double DEFAULT NULL,
  `flight_id` int(11) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`),
  KEY `fare_information_of_the_flight` (`flight_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `fares`
--


-- --------------------------------------------------------

--
-- Table structure for table `flights`
--

CREATE TABLE IF NOT EXISTS `flights` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `airline` varchar(20) DEFAULT NULL,
  `fly_monday` tinyint(1) DEFAULT NULL,
  `fly_tuesday` tinyint(1) DEFAULT NULL,
  `fly_wednesday` tinyint(1) DEFAULT NULL,
  `fly_thursday` tinyint(1) DEFAULT NULL,
  `fly_friday` tinyint(1) DEFAULT NULL,
  `fly_saturday` tinyint(1) DEFAULT NULL,
  `fly_sunday` tinyint(1) DEFAULT NULL,
  `scheduled_arrival_time` time DEFAULT NULL,
  `scheduled_departure_time` time DEFAULT NULL,
  `arrival_airport` int(11) DEFAULT NULL,
  `departure_airport` int(11) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `flight_no` (`id`),
  KEY `arrival_airport` (`arrival_airport`),
  KEY `departure_airport` (`departure_airport`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `flights`
--

INSERT INTO `flights` (`id`, `airline`, `fly_monday`, `fly_tuesday`, `fly_wednesday`, `fly_thursday`, `fly_friday`, `fly_saturday`, `fly_sunday`, `scheduled_arrival_time`, `scheduled_departure_time`, `arrival_airport`, `departure_airport`, `created`, `modified`) VALUES
(1, 'Sri Lankan Airlines', 1, 1, 1, 1, 1, 1, 1, '10:30:00', '10:30:00', 1, 3, '2012-11-11 10:30:38', '2012-11-11 10:30:38'),
(2, 'Singapore Airlines', 1, 0, 0, 0, 1, 0, 1, '00:33:00', '21:33:00', 3, 2, '2012-11-11 10:39:49', '2012-11-11 10:39:49');

-- --------------------------------------------------------

--
-- Table structure for table `groups`
--

CREATE TABLE IF NOT EXISTS `groups` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `parent_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `name` (`name`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=4 ;

--
-- Dumping data for table `groups`
--

INSERT INTO `groups` (`id`, `name`, `parent_id`) VALUES
(1, 'Administrators', NULL),
(3, 'PowerUser', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `menus`
--

CREATE TABLE IF NOT EXISTS `menus` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `type` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `parent_id` int(10) unsigned DEFAULT NULL,
  `plugin` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `controller` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `method` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `published` tinyint(1) NOT NULL DEFAULT '0',
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `name` (`name`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=105 ;

--
-- Dumping data for table `menus`
--

INSERT INTO `menus` (`id`, `type`, `name`, `parent_id`, `plugin`, `controller`, `method`, `published`, `created`, `modified`) VALUES
(1, 'controllers', 'Root', NULL, NULL, 'controllers', 'controllers', 1, '2009-08-26 02:27:20', '2009-08-26 02:27:20'),
(2, 'main', 'Users', 5, 'Bcp', 'Users', '', 1, '2009-09-26 13:34:43', '2009-10-01 15:25:38'),
(3, 'main', 'Groups', 5, 'Bcp', 'Groups', '', 1, '2009-09-26 13:35:57', '2009-10-01 15:24:51'),
(4, 'main', 'Menus', 5, 'Bcp', 'Menus', '', 1, '2009-09-26 13:37:09', '2009-10-01 15:26:11'),
(5, 'main', 'Control Panel', 1, 'Bcp', 'Bcp', '', 1, '2009-09-26 13:55:24', '2009-09-26 14:11:04'),
(6, 'main', 'Home', 1, '', 'Pages', '', 1, '2009-09-26 13:55:39', '2009-10-01 00:21:22'),
(7, 'extra', 'List Bcp', 5, 'Bcp', 'Bcp', 'index', 1, '2009-09-26 13:55:39', '2009-09-26 14:46:12'),
(8, 'extra', 'Display Page', 6, '', 'Pages', 'display', 1, '2009-09-26 13:56:12', '2009-09-26 13:56:12'),
(9, 'actions', 'View Group', 3, 'Bcp', 'Groups', 'view', 1, '2009-09-26 13:56:13', '2009-09-26 14:46:24'),
(10, 'extra', 'List Users', 2, 'Bcp', 'Users', 'index', 1, '2009-09-26 13:56:53', '2009-09-26 13:56:53'),
(11, 'actions', 'View User', 2, 'Bcp', 'Users', 'view', 1, '2009-09-26 13:56:53', '2009-09-26 13:56:53'),
(12, 'extra', 'Add User', 2, 'Bcp', 'Users', 'add', 1, '2009-09-26 13:56:54', '2009-09-26 13:56:54'),
(13, 'actions', 'Edit User', 2, 'Bcp', 'Users', 'edit', 1, '2009-09-26 13:56:54', '2009-09-26 13:56:54'),
(14, 'actions', 'Delete User', 2, 'Bcp', 'Users', 'delete', 1, '2009-09-26 13:56:54', '2009-09-26 13:56:54'),
(15, 'manual', 'Login User', 2, 'Bcp', 'Users', 'login', 1, '2009-09-26 13:56:55', '2009-09-26 14:54:07'),
(16, 'manual', 'Logout User', 2, 'Bcp', 'Users', 'logout', 1, '2009-09-26 13:56:55', '2009-09-26 14:54:27'),
(17, 'manual', 'Change Password', 2, 'Bcp', 'Users', 'changePassword', 1, '2009-09-26 13:56:55', '2009-09-26 20:16:12'),
(18, 'actions', 'User Permissions', 2, 'Bcp', 'Users', 'permissions', 1, '2009-09-26 13:56:56', '2009-09-26 20:16:48'),
(19, 'extra', 'Verify Users Tree', 2, 'Bcp', 'Users', 'verifyTree', 1, '2009-09-26 13:56:56', '2009-09-26 20:17:54'),
(20, 'actions', 'Edit Group', 3, 'Bcp', 'Groups', 'edit', 1, '2009-09-26 13:56:56', '2009-09-26 14:46:37'),
(21, 'manual', 'Recover User', 2, 'Bcp', 'Users', 'recover', 1, '2009-09-26 13:57:19', '2009-09-26 14:55:24'),
(22, 'extra', 'User Tree', 2, 'Bcp', 'Users', 'tree', 1, '2009-09-26 13:57:20', '2009-09-26 20:17:26'),
(23, 'extra', 'Test User', 2, 'Bcp', 'Users', 'test', 0, '2009-09-26 13:57:20', '2009-10-03 01:02:15'),
(24, 'extra', 'List Menus', 4, 'Bcp', 'Menus', 'index', 1, '2009-09-26 13:57:20', '2009-09-26 13:57:20'),
(25, 'actions', 'View Menu', 4, 'Bcp', 'Menus', 'view', 1, '2009-09-26 13:57:20', '2009-09-26 13:57:20'),
(26, 'actions', 'Edit Menu', 4, 'Bcp', 'Menus', 'edit', 1, '2009-09-26 13:57:21', '2009-09-26 13:57:21'),
(27, 'actions', 'Delete Menu', 4, 'Bcp', 'Menus', 'delete', 1, '2009-09-26 13:57:21', '2009-09-26 13:57:21'),
(28, 'extra', 'Add Menu', 4, 'Bcp', 'Menus', 'add', 1, '2009-09-26 13:57:21', '2009-09-26 13:57:21'),
(29, 'extra', 'Menus Tree', 4, 'Bcp', 'Menus', 'tree', 1, '2009-09-26 13:57:22', '2009-09-26 20:15:19'),
(30, 'actions', 'Menu Permissions', 4, 'Bcp', 'Menus', 'permissions', 1, '2009-09-26 13:57:22', '2009-09-26 20:14:32'),
(31, 'manual', 'Movedown Menu', 4, 'Bcp', 'Menus', 'movedown', 1, '2009-09-26 13:57:36', '2009-09-26 14:15:33'),
(32, 'manual', 'Moveup Menu', 4, 'Bcp', 'Menus', 'moveup', 1, '2009-09-26 13:57:36', '2009-09-26 14:16:42'),
(33, 'extra', 'Verify Menus Tree', 4, 'Bcp', 'Menus', 'verifyTree', 1, '2009-09-26 13:57:37', '2009-09-26 20:15:43'),
(34, 'manual', 'Recover Menu', 4, 'Bcp', 'Menus', 'recover', 1, '2009-09-26 13:57:37', '2009-09-26 14:17:42'),
(35, 'extra', 'Redundant Menus', 4, 'Bcp', 'Menus', 'redundant', 1, '2009-09-26 13:57:37', '2009-09-26 20:14:53'),
(36, 'extra', 'List Groups', 3, 'Bcp', 'Groups', 'index', 1, '2009-09-26 13:57:38', '2009-09-26 13:57:38'),
(37, 'extra', 'Add Group', 3, 'Bcp', 'Groups', 'add', 1, '2009-09-26 13:57:38', '2009-09-26 13:57:38'),
(38, 'actions', 'Delete Group', 3, 'Bcp', 'Groups', 'delete', 1, '2009-09-26 13:57:38', '2009-09-26 13:57:38'),
(39, 'actions', 'Group Permissions', 3, 'Bcp', 'Groups', 'permissions', 1, '2009-09-26 13:57:38', '2009-09-26 20:13:55'),
(40, 'main', 'Settings', 5, 'Bcp', 'Settings', '', 1, '2009-10-02 01:35:39', '2009-10-04 15:40:23'),
(41, 'extra', 'List Settings', 40, 'Bcp', 'Settings', 'index', 1, '2009-10-02 01:35:39', '2009-10-02 01:35:39'),
(42, 'actions', 'View Setting', 40, 'Bcp', 'Settings', 'view', 1, '2009-10-02 01:35:39', '2009-10-02 01:35:39'),
(43, 'extra', 'Add Setting', 40, 'Bcp', 'Settings', 'add', 1, '2009-10-02 01:35:40', '2009-10-02 01:35:40'),
(44, 'actions', 'Edit Setting', 40, 'Bcp', 'Settings', 'edit', 1, '2009-10-02 01:35:40', '2009-10-02 01:35:40'),
(45, 'actions', 'Delete Setting', 40, 'Bcp', 'Settings', 'delete', 1, '2009-10-02 01:35:40', '2009-10-02 01:35:40'),
(46, 'extra', 'Home Page', 6, '', 'Pages', 'home', 0, '2012-11-15 16:06:56', '2012-11-15 16:06:56'),
(47, 'main', 'Airline', 1, '', 'Airline', '', 0, '2012-11-15 16:06:56', '2012-11-15 16:06:56'),
(48, 'main', 'Airplanes', 1, '', 'Airplanes', '', 0, '2012-11-15 16:06:56', '2012-11-15 16:06:56'),
(49, 'extra', 'List Airplanes', 48, '', 'Airplanes', 'index', 0, '2012-11-15 16:06:57', '2012-11-15 16:06:57'),
(50, 'actions', 'View Airplane', 48, '', 'Airplanes', 'view', 0, '2012-11-15 16:06:57', '2012-11-15 16:06:57'),
(51, 'extra', 'Add Airplane', 48, '', 'Airplanes', 'add', 0, '2012-11-15 16:06:57', '2012-11-15 16:06:57'),
(52, 'actions', 'Edit Airplane', 48, '', 'Airplanes', 'edit', 0, '2012-11-15 16:06:58', '2012-11-15 16:06:58'),
(53, 'actions', 'Delete Airplane', 48, '', 'Airplanes', 'delete', 0, '2012-11-15 16:06:58', '2012-11-15 16:06:58'),
(54, 'main', 'Airports', 1, '', 'Airports', '', 0, '2012-11-15 16:06:59', '2012-11-15 16:06:59'),
(55, 'extra', 'List Airports', 54, '', 'Airports', 'index', 0, '2012-11-15 16:06:59', '2012-11-15 16:06:59'),
(56, 'actions', 'View Airport', 54, '', 'Airports', 'view', 0, '2012-11-15 16:06:59', '2012-11-15 16:06:59'),
(57, 'extra', 'Add Airport', 54, '', 'Airports', 'add', 0, '2012-11-15 16:07:00', '2012-11-15 16:07:00'),
(58, 'actions', 'Edit Airport', 54, '', 'Airports', 'edit', 0, '2012-11-15 16:07:00', '2012-11-15 16:07:00'),
(59, 'actions', 'Delete Airport', 54, '', 'Airports', 'delete', 0, '2012-11-15 16:07:00', '2012-11-15 16:07:00'),
(60, 'main', 'Creditcards', 1, '', 'Creditcards', '', 0, '2012-11-15 16:07:01', '2012-11-15 16:07:01'),
(61, 'extra', 'List Creditcards', 60, '', 'Creditcards', 'index', 0, '2012-11-15 16:07:01', '2012-11-15 16:07:01'),
(62, 'actions', 'View Creditcard', 60, '', 'Creditcards', 'view', 0, '2012-11-15 16:07:01', '2012-11-15 16:07:01'),
(63, 'extra', 'Add Creditcard', 60, '', 'Creditcards', 'add', 0, '2012-11-15 16:07:02', '2012-11-15 16:07:02'),
(64, 'actions', 'Edit Creditcard', 60, '', 'Creditcards', 'edit', 0, '2012-11-15 16:07:02', '2012-11-15 16:07:02'),
(65, 'actions', 'Delete Creditcard', 60, '', 'Creditcards', 'delete', 0, '2012-11-15 16:07:02', '2012-11-15 16:07:02'),
(66, 'main', 'Customers', 1, '', 'Customers', '', 0, '2012-11-15 16:07:03', '2012-11-15 16:07:03'),
(67, 'extra', 'List Customers', 66, '', 'Customers', 'index', 0, '2012-11-15 16:07:03', '2012-11-15 16:07:03'),
(68, 'actions', 'View Customer', 66, '', 'Customers', 'view', 0, '2012-11-15 16:07:03', '2012-11-15 16:07:03'),
(69, 'extra', 'Add Customer', 66, '', 'Customers', 'add', 0, '2012-11-15 16:07:04', '2012-11-15 16:07:04'),
(70, 'actions', 'Edit Customer', 66, '', 'Customers', 'edit', 0, '2012-11-15 16:07:04', '2012-11-15 16:07:04'),
(71, 'actions', 'Delete Customer', 66, '', 'Customers', 'delete', 0, '2012-11-15 16:07:04', '2012-11-15 16:07:04'),
(72, 'main', 'Fares', 1, '', 'Fares', '', 0, '2012-11-15 16:07:05', '2012-11-15 16:07:05'),
(73, 'extra', 'List Fares', 72, '', 'Fares', 'index', 0, '2012-11-15 16:07:05', '2012-11-15 16:07:05'),
(74, 'actions', 'View Fare', 72, '', 'Fares', 'view', 0, '2012-11-15 16:07:05', '2012-11-15 16:07:05'),
(75, 'extra', 'Add Fare', 72, '', 'Fares', 'add', 0, '2012-11-15 16:07:06', '2012-11-15 16:07:06'),
(76, 'actions', 'Edit Fare', 72, '', 'Fares', 'edit', 0, '2012-11-15 16:07:07', '2012-11-15 16:07:07'),
(77, 'actions', 'Delete Fare', 72, '', 'Fares', 'delete', 0, '2012-11-15 16:07:07', '2012-11-15 16:07:07'),
(78, 'main', 'Flights', 1, '', 'Flights', '', 0, '2012-11-15 16:07:07', '2012-11-15 16:07:07'),
(79, 'extra', 'List Flights', 78, '', 'Flights', 'index', 0, '2012-11-15 16:07:08', '2012-11-15 16:07:08'),
(80, 'actions', 'View Flight', 78, '', 'Flights', 'view', 0, '2012-11-15 16:07:08', '2012-11-15 16:07:08'),
(81, 'extra', 'Add Flight', 78, '', 'Flights', 'add', 0, '2012-11-15 16:07:09', '2012-11-15 16:07:09'),
(82, 'actions', 'Edit Flight', 78, '', 'Flights', 'edit', 0, '2012-11-15 16:07:09', '2012-11-15 16:07:09'),
(83, 'actions', 'Delete Flight', 78, '', 'Flights', 'delete', 0, '2012-11-15 16:07:09', '2012-11-15 16:07:09'),
(84, 'main', 'Notifications', 1, '', 'Notifications', '', 0, '2012-11-15 16:07:09', '2012-11-15 16:07:09'),
(85, 'extra', 'List Notifications', 84, '', 'Notifications', 'index', 0, '2012-11-15 16:07:10', '2012-11-15 16:07:10'),
(86, 'actions', 'View Notification', 84, '', 'Notifications', 'view', 0, '2012-11-15 16:07:10', '2012-11-15 16:07:10'),
(87, 'extra', 'Add Notification', 84, '', 'Notifications', 'add', 0, '2012-11-15 16:07:11', '2012-11-15 16:07:11'),
(88, 'actions', 'Edit Notification', 84, '', 'Notifications', 'edit', 0, '2012-11-15 16:07:11', '2012-11-15 16:07:11'),
(89, 'actions', 'Delete Notification', 84, '', 'Notifications', 'delete', 0, '2012-11-15 16:07:11', '2012-11-15 16:07:11'),
(90, 'main', 'Reservations', 1, '', 'Reservations', '', 0, '2012-11-15 16:07:12', '2012-11-15 16:07:12'),
(91, 'extra', 'List Reservations', 90, '', 'Reservations', 'index', 0, '2012-11-15 16:07:12', '2012-11-15 16:07:12'),
(92, 'actions', 'View Reservation', 90, '', 'Reservations', 'view', 0, '2012-11-15 16:07:12', '2012-11-15 16:07:12'),
(93, 'extra', 'Add Reservation', 90, '', 'Reservations', 'add', 0, '2012-11-15 16:07:13', '2012-11-15 16:07:13'),
(94, 'actions', 'Edit Reservation', 90, '', 'Reservations', 'edit', 0, '2012-11-15 16:07:13', '2012-11-15 16:07:13'),
(95, 'actions', 'Delete Reservation', 90, '', 'Reservations', 'delete', 0, '2012-11-15 16:07:13', '2012-11-15 16:07:13'),
(96, 'main', 'SpecificFlights', 1, '', 'SpecificFlights', '', 0, '2012-11-15 16:07:14', '2012-11-15 16:07:14'),
(97, 'extra', 'List SpecificFlights', 96, '', 'SpecificFlights', 'index', 0, '2012-11-15 16:07:14', '2012-11-15 16:07:14'),
(98, 'actions', 'View SpecificFlight', 96, '', 'SpecificFlights', 'view', 0, '2012-11-15 16:07:14', '2012-11-15 16:07:14'),
(99, 'extra', 'Add SpecificFlight', 96, '', 'SpecificFlights', 'add', 0, '2012-11-15 16:07:15', '2012-11-15 16:07:15'),
(100, 'actions', 'Edit SpecificFlight', 96, '', 'SpecificFlights', 'edit', 0, '2012-11-15 16:07:15', '2012-11-15 16:07:15'),
(101, 'actions', 'Delete SpecificFlight', 96, '', 'SpecificFlights', 'delete', 0, '2012-11-15 16:07:15', '2012-11-15 16:07:15'),
(102, 'main', 'Ticketings', 1, '', 'Ticketings', '', 0, '2012-11-15 16:07:16', '2012-11-15 16:07:16'),
(103, 'extra', 'List Ticketings', 102, '', 'Ticketings', 'index', 0, '2012-11-15 16:07:16', '2012-11-15 16:07:16'),
(104, 'extra', 'Search_result Ticketing', 102, '', 'Ticketings', 'search_result', 0, '2012-11-15 16:07:16', '2012-11-15 16:07:16');

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE IF NOT EXISTS `notifications` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `is_read` bit(1) DEFAULT NULL,
  `message` varchar(200) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `customer_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`),
  KEY `notificatiins_to_the_customer` (`customer_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `notifications`
--


-- --------------------------------------------------------

--
-- Table structure for table `reservations`
--

CREATE TABLE IF NOT EXISTS `reservations` (
  `seat_no` int(11) DEFAULT NULL,
  `seat_type` varchar(20) DEFAULT NULL,
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fare_id` int(11) DEFAULT NULL,
  `specific_flight_id` int(11) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`),
  KEY `reservation_to_flight` (`specific_flight_id`),
  KEY `fare_for_the_reservation` (`fare_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `reservations`
--


-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE IF NOT EXISTS `settings` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci NOT NULL,
  `category` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `setting` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `value` text COLLATE utf8_unicode_ci,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `setting` (`setting`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=3 ;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `name`, `description`, `category`, `setting`, `value`, `created`, `modified`) VALUES
(1, 'Layout', 'Default application layout', 'bcp', 'layout', 'permarinus_blue', '2009-10-02 12:47:42', '2009-10-06 15:48:19'),
(2, 'Copyright', 'Copyrights to be displayed in different places of the site.', 'bcp', 'copyright', '&copy; 2009 Your name, All Rights Reserved', '2009-10-08 03:56:25', '2009-10-08 03:56:25');

-- --------------------------------------------------------

--
-- Table structure for table `specific_flights`
--

CREATE TABLE IF NOT EXISTS `specific_flights` (
  `no_of_available_business_class_seats` int(11) DEFAULT NULL,
  `no_of_available_economy_class_seats` int(11) DEFAULT NULL,
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `arrival_time` datetime DEFAULT NULL,
  `departure_time` datetime DEFAULT NULL,
  `flight_id` int(11) NOT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `airplane_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `specific_flight_id` (`id`),
  KEY `instance_of` (`flight_id`),
  KEY `airplane_id` (`airplane_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `specific_flights`
--

INSERT INTO `specific_flights` (`no_of_available_business_class_seats`, `no_of_available_economy_class_seats`, `id`, `arrival_time`, `departure_time`, `flight_id`, `created`, `modified`, `airplane_id`) VALUES
(20, 200, 2, '2012-11-11 12:06:00', '2012-11-11 12:06:00', 1, '2012-11-11 12:06:47', '2012-11-11 12:06:47', 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `password` char(40) COLLATE utf8_unicode_ci NOT NULL,
  `group_id` int(11) NOT NULL,
  `last_login` datetime DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`),
  KEY `group_id` (`group_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=3 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `group_id`, `last_login`, `created`, `modified`) VALUES
(1, 'admin', 'dfdb7e59774c9c32273032fd99dc87ddaa93988f', 1, '2012-11-13 11:11:03', '2010-01-01 00:00:00', '2012-11-19 15:06:18'),
(2, 'supun', '78fdc935b8ddeb238daa23476715c5200fe6e516', 3, '2012-11-15 16:08:25', '2012-11-15 16:03:25', '2012-11-15 16:08:25');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `aros_acos`
--
ALTER TABLE `aros_acos`
  ADD CONSTRAINT `aros_acos_ibfk_1` FOREIGN KEY (`aco_id`) REFERENCES `acos` (`id`),
  ADD CONSTRAINT `aros_acos_ibfk_2` FOREIGN KEY (`aro_id`) REFERENCES `aros` (`id`);

--
-- Constraints for table `creditcards`
--
ALTER TABLE `creditcards`
  ADD CONSTRAINT `paid_by` FOREIGN KEY (`reservation_id`) REFERENCES `reservations` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `customers`
--
ALTER TABLE `customers`
  ADD CONSTRAINT `reservation_made_by` FOREIGN KEY (`reservation_id`) REFERENCES `reservations` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `fares`
--
ALTER TABLE `fares`
  ADD CONSTRAINT `fare_information_of_the_flight` FOREIGN KEY (`flight_id`) REFERENCES `flights` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `flights`
--
ALTER TABLE `flights`
  ADD CONSTRAINT `arrival_airport` FOREIGN KEY (`arrival_airport`) REFERENCES `airports` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `departure_airport` FOREIGN KEY (`departure_airport`) REFERENCES `airports` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `notifications`
--
ALTER TABLE `notifications`
  ADD CONSTRAINT `notificatiins_to_the_customer` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `reservations`
--
ALTER TABLE `reservations`
  ADD CONSTRAINT `fare_for_the_reservation` FOREIGN KEY (`fare_id`) REFERENCES `fares` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `reservation_to_flight` FOREIGN KEY (`specific_flight_id`) REFERENCES `specific_flights` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `specific_flights`
--
ALTER TABLE `specific_flights`
  ADD CONSTRAINT `instance_of` FOREIGN KEY (`flight_id`) REFERENCES `flights` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `specific_flights_ibfk_1` FOREIGN KEY (`airplane_id`) REFERENCES `airplanes` (`id`);

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`group_id`) REFERENCES `groups` (`id`);
