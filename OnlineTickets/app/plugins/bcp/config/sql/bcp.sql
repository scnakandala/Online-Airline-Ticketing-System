-- phpMyAdmin SQL Dump
-- version 3.1.2deb1ubuntu0.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Oct 14, 2009 at 05:03 PM
-- Server version: 5.0.75
-- PHP Version: 5.2.6-3ubuntu4.2

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";

--
-- Database: `bancer_control_panel`
--

-- --------------------------------------------------------

--
-- Table structure for table `acos`
--

CREATE TABLE IF NOT EXISTS `acos` (
  `id` int(10) NOT NULL auto_increment,
  `parent_id` int(10) default NULL,
  `model` varchar(255) collate utf8_unicode_ci default NULL,
  `foreign_key` int(10) default NULL,
  `alias` varchar(255) collate utf8_unicode_ci default NULL,
  `lft` int(10) default NULL,
  `rght` int(10) default NULL,
  PRIMARY KEY  (`id`),
  KEY `acos_idx1` (`lft`,`rght`),
  KEY `acos_idx2` (`alias`),
  KEY `acos_idx3` (`model`,`foreign_key`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=46 ;

--
-- Dumping data for table `acos`
--

INSERT INTO `acos` (`id`, `parent_id`, `model`, `foreign_key`, `alias`, `lft`, `rght`) VALUES
(1, NULL, 'Menu', 1, 'controllers', 1, 90),
(2, 5, 'Menu', 2, 'Users', 23, 50),
(3, 5, 'Menu', 3, 'Groups', 9, 22),
(4, 5, 'Menu', 4, 'Menus', 51, 76),
(5, 1, 'Menu', 5, 'Bcp', 6, 89),
(6, 1, 'Menu', 6, 'Pages', 2, 5),
(7, 5, 'Menu', 7, 'index', 7, 8),
(8, 6, 'Menu', 8, 'display', 3, 4),
(9, 3, 'Menu', 9, 'view', 12, 13),
(10, 2, 'Menu', 10, 'index', 24, 25),
(11, 2, 'Menu', 11, 'view', 28, 29),
(12, 2, 'Menu', 12, 'add', 30, 31),
(13, 2, 'Menu', 13, 'edit', 32, 33),
(14, 2, 'Menu', 14, 'delete', 34, 35),
(15, 2, 'Menu', 15, 'login', 36, 37),
(16, 2, 'Menu', 16, 'logout', 38, 39),
(17, 2, 'Menu', 17, 'changePassword', 40, 41),
(18, 2, 'Menu', 18, 'permissions', 26, 27),
(19, 2, 'Menu', 19, 'verifyTree', 42, 43),
(20, 3, 'Menu', 20, 'edit', 14, 15),
(21, 2, 'Menu', 21, 'recover', 44, 45),
(22, 2, 'Menu', 22, 'tree', 46, 47),
(23, 2, 'Menu', 23, 'test', 48, 49),
(24, 4, 'Menu', 24, 'index', 52, 53),
(25, 4, 'Menu', 25, 'view', 56, 57),
(26, 4, 'Menu', 26, 'edit', 58, 59),
(27, 4, 'Menu', 27, 'delete', 60, 61),
(28, 4, 'Menu', 28, 'add', 62, 63),
(29, 4, 'Menu', 29, 'tree', 64, 65),
(30, 4, 'Menu', 30, 'permissions', 54, 55),
(31, 4, 'Menu', 31, 'movedown', 66, 67),
(32, 4, 'Menu', 32, 'moveup', 68, 69),
(33, 4, 'Menu', 33, 'verifyTree', 70, 71),
(34, 4, 'Menu', 34, 'recover', 72, 73),
(35, 4, 'Menu', 35, 'redundant', 74, 75),
(36, 3, 'Menu', 36, 'index', 16, 17),
(37, 3, 'Menu', 37, 'add', 18, 19),
(38, 3, 'Menu', 38, 'delete', 20, 21),
(39, 3, 'Menu', 39, 'permissions', 10, 11),
(40, 5, 'Menu', 40, 'Settings', 77, 88),
(41, 40, 'Menu', 41, 'index', 78, 79),
(42, 40, 'Menu', 42, 'view', 80, 81),
(43, 40, 'Menu', 43, 'add', 82, 83),
(44, 40, 'Menu', 44, 'edit', 84, 85),
(45, 40, 'Menu', 45, 'delete', 86, 87);

-- --------------------------------------------------------

--
-- Table structure for table `aros`
--

CREATE TABLE IF NOT EXISTS `aros` (
  `id` int(10) NOT NULL auto_increment,
  `parent_id` int(10) default NULL,
  `model` varchar(255) collate utf8_unicode_ci default NULL,
  `foreign_key` int(10) default NULL,
  `alias` varchar(255) collate utf8_unicode_ci default NULL,
  `lft` int(10) default NULL,
  `rght` int(10) default NULL,
  PRIMARY KEY  (`id`),
  KEY `aros_idx1` (`lft`,`rght`),
  KEY `aros_idx2` (`alias`),
  KEY `aros_idx3` (`model`,`foreign_key`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=5 ;

--
-- Dumping data for table `aros`
--

INSERT INTO `aros` (`id`, `parent_id`, `model`, `foreign_key`, `alias`, `lft`, `rght`) VALUES
(1, NULL, 'Group', 1, 'Group:1', 1, 4),
(2, 1, 'User', 1, 'admin', 2, 3),
(3, NULL, 'Group', 2, 'Group:2', 5, 8),
(4, 3, 'User', 2, 'User:2', 6, 7);

-- --------------------------------------------------------

--
-- Table structure for table `aros_acos`
--

CREATE TABLE IF NOT EXISTS `aros_acos` (
  `id` int(10) NOT NULL auto_increment,
  `aro_id` int(10) NOT NULL,
  `aco_id` int(10) NOT NULL,
  `_create` varchar(2) collate utf8_unicode_ci NOT NULL default '0',
  `_read` varchar(2) collate utf8_unicode_ci NOT NULL default '0',
  `_update` varchar(2) collate utf8_unicode_ci NOT NULL default '0',
  `_delete` varchar(2) collate utf8_unicode_ci NOT NULL default '0',
  PRIMARY KEY  (`id`),
  KEY `aco_id` (`aco_id`),
  KEY `aro_id` (`aro_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=8 ;

--
-- Dumping data for table `aros_acos`
--

INSERT INTO `aros_acos` (`id`, `aro_id`, `aco_id`, `_create`, `_read`, `_update`, `_delete`) VALUES
(1, 1, 5, '1', '1', '1', '1'),
(2, 1, 2, '1', '1', '1', '1'),
(3, 1, 3, '1', '1', '1', '1'),
(4, 1, 4, '1', '1', '1', '1'),
(5, 3, 6, '1', '1', '1', '1'),
(6, 1, 6, '1', '1', '1', '1'),
(7, 1, 40, '1', '1', '1', '1');

-- --------------------------------------------------------

--
-- Table structure for table `groups`
--

CREATE TABLE IF NOT EXISTS `groups` (
  `id` int(11) NOT NULL auto_increment,
  `name` varchar(100) collate utf8_unicode_ci NOT NULL,
  `parent_id` int(11) default NULL,
  PRIMARY KEY  (`id`),
  UNIQUE KEY `name` (`name`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=3 ;

--
-- Dumping data for table `groups`
--

INSERT INTO `groups` (`id`, `name`, `parent_id`) VALUES
(1, 'Administrators', NULL),
(2, 'Anonymous visitors', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `menus`
--

CREATE TABLE IF NOT EXISTS `menus` (
  `id` int(10) unsigned NOT NULL auto_increment,
  `type` varchar(255) collate utf8_unicode_ci NOT NULL,
  `name` varchar(255) collate utf8_unicode_ci NOT NULL,
  `parent_id` int(10) unsigned default NULL,
  `plugin` varchar(100) collate utf8_unicode_ci default NULL,
  `controller` varchar(100) collate utf8_unicode_ci NOT NULL,
  `method` varchar(100) collate utf8_unicode_ci default NULL,
  `published` tinyint(1) NOT NULL default '0',
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY  (`id`),
  UNIQUE KEY `name` (`name`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=46 ;

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
(45, 'actions', 'Delete Setting', 40, 'Bcp', 'Settings', 'delete', 1, '2009-10-02 01:35:40', '2009-10-02 01:35:40');

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE IF NOT EXISTS `settings` (
  `id` int(11) NOT NULL auto_increment,
  `name` varchar(255) collate utf8_unicode_ci NOT NULL,
  `description` text collate utf8_unicode_ci NOT NULL,
  `category` varchar(255) collate utf8_unicode_ci NOT NULL,
  `setting` varchar(255) collate utf8_unicode_ci NOT NULL,
  `value` text collate utf8_unicode_ci,
  `created` datetime default NULL,
  `modified` datetime default NULL,
  PRIMARY KEY  (`id`),
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
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL auto_increment,
  `username` varchar(30) collate utf8_unicode_ci NOT NULL,
  `password` char(40) collate utf8_unicode_ci NOT NULL,
  `group_id` int(11) NOT NULL,
  `last_login` datetime default NULL,
  `created` datetime default NULL,
  `modified` datetime default NULL,
  PRIMARY KEY  (`id`),
  UNIQUE KEY `username` (`username`),
  KEY `group_id` (`group_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=3 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `group_id`, `last_login`, `created`, `modified`) VALUES
(1, 'admin', 'admin', 1, '2010-01-01 00:00:00', '2010-01-01 00:00:00', '2010-01-01 00:00:00'),
(2, 'anonymous', 'anonymous', 2, '2010-01-01 00:00:00', '2010-01-01 00:00:00', '2010-01-01 00:00:00');

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
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`group_id`) REFERENCES `groups` (`id`);
