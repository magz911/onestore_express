-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: May 04, 2017 at 03:34 AM
-- Server version: 5.6.21
-- PHP Version: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `dost`
--

-- --------------------------------------------------------

--
-- Table structure for table `package`
--

CREATE TABLE IF NOT EXISTS `package` (
  `id` int(10) unsigned NOT NULL,
  `label` varchar(255) NOT NULL DEFAULT '',
  `slug` varchar(255) NOT NULL DEFAULT '',
  `type` varchar(255) NOT NULL DEFAULT '',
  `status` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `courier` varchar(255) NOT NULL DEFAULT '',
  `desc` varchar(255) NOT NULL DEFAULT '',
  `min_length` mediumint(5) unsigned NOT NULL DEFAULT '0',
  `min_width` mediumint(5) unsigned NOT NULL DEFAULT '0',
  `min_height` mediumint(5) unsigned NOT NULL DEFAULT '0',
  `max_length` mediumint(5) unsigned NOT NULL DEFAULT '0',
  `max_width` mediumint(5) unsigned NOT NULL DEFAULT '0', 
  `max_height` mediumint(5) unsigned NOT NULL DEFAULT '0',
  `max_weight` mediumint(5) unsigned NOT NULL DEFAULT '0',
  `delivery_area` varchar(255) NOT NULL DEFAULT '',
  `delivery_time` varchar(255) NOT NULL DEFAULT '',
  `price` varchar(255) NOT NULL DEFAULT '',
  `added_date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `added_by` int(10) unsigned NOT NULL DEFAULT '0'
) ENGINE=MyISAM AUTO_INCREMENT=84 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `package`
--

INSERT INTO `package` (`id`, `label`, `slug`, `type`, `status`, `courier`, `desc`, `min_length`, `min_width`, `min_height`, `max_length`, `max_width`, `max_height`, `max_weight`, `delivery_area`, `delivery_time`, `price`, `added_date`, `added_by`) VALUES 
(1, 'oneSTorePouch S', 'onestorepouch_s', 'pouch', 1, 'onestore', '', '27', '1', '13', '28', '1', '15', '0.5', .5, 'Nationwide', '', '100', '', 1),           
(2, 'oneSTorePouch M', 'onestorepouch_m', 'pouch', 1, 'onestore', '', '30.5', '1', '21', '32', '1', '25.5', '2', 2, 'Nationwide', '', '120', '', 1),         
(3, 'oneSTorePouch L', 'onestorepouch_l', 'pouch', 1, 'onestore', '', '42', '1', '29.5', '42.5', '1', '29.7', '3', 3, 'Nationwide', '', '150', '', 1),        
(4, 'oneSToreBox XS', 'onestorebox_xs', 'box', 1, 'onestore', '', '32', '26', '11', '34', '28', '12', '3', 3, 'Nationwide', '', '250', '', 1),
(5, 'oneSToreBox S', 'onestorebox_s', 'box', 1, 'onestore', '', '33.5', '26', '17', '36', '26', '20', '5', 5, 'Nationwide', '', '350', '', 1), 
(6, 'oneSToreBox M', 'onestorebox_m', 'box', 1, 'onestore', '', '40.5', '28', '20', '48', '33', '26', '10', 10, 'Nationwide', '', '700', '', 1),
(7, 'oneSToreBox L', 'onestorebox_l', 'box', 1, 'onestore', '', '49.5', '40', '30', '55', '41.5', '34', '20', 20, 'Nationwide', '', '1350', '', 1);


--
-- Indexes for dumped tables
--

--
-- Indexes for table `package`
--
ALTER TABLE `package`
 ADD PRIMARY KEY (`id`), 
 ADD KEY `label` (`label`), 
 ADD KEY `slug` (`slug`), 
 ADD KEY `type` (`type`), 
 ADD KEY `status` (`status`), 
 ADD KEY `courier` (`courier`), 
 ADD KEY `min_length`(`min_length`),
 ADD KEY `min_width` (`min_width`),
 ADD KEY `min_height`(`min_height`),
 ADD KEY `max_length`(`max_length`),
 ADD KEY `max_width` (`max_width`),
 ADD KEY `max_height`(`max_height`),
 ADD KEY `max_weight` (`max_weight`),
 ADD KEY `added_date` (`added_date`), 
 ADD KEY `added_by` (`added_by`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `package`
--
ALTER TABLE `package`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=1;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
