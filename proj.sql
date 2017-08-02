-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Aug 02, 2017 at 03:28 PM
-- Server version: 5.5.50-0ubuntu0.14.04.1
-- PHP Version: 7.0.17-2+deb.sury.org~trusty+1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `proj`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE IF NOT EXISTS `category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'General', '2017-01-25 00:00:00', '2017-01-25 00:00:00'),
(2, 'Premium', '2017-01-25 00:00:00', '2017-01-25 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `feed`
--

CREATE TABLE IF NOT EXISTS `feed` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(155) DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `image_location` text,
  `feed_status` varchar(255) DEFAULT NULL,
  `page_url` text,
  `description` longtext,
  `code` longtext,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `feed`
--

INSERT INTO `feed` (`id`, `title`, `created_at`, `updated_at`, `image_location`, `feed_status`, `page_url`, `description`, `code`) VALUES
(1, 'How to create apache module rewrite', '2017-01-26 00:00:00', '2017-01-26 00:00:00', '/images/1.jpg', 'Published', '/pages/demo.php', 'This is home page.Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s\n', ''),
(2, 'Enabling the hidden config in JBoss', '2017-01-26 00:00:00', '2017-01-26 00:00:00', '/images/2.jpg', 'Published', '/pages/demo.php', 'This is home page.Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.\nThis is home page.Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', ''),
(3, 'String Contenation', '2017-01-26 00:00:00', '2017-01-26 00:00:00', '/images/3.jpg', 'Published', '/pages/demo.php', 'This is home page.Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', '');

-- --------------------------------------------------------

--
-- Table structure for table `feed_category`
--

CREATE TABLE IF NOT EXISTS `feed_category` (
  `feed_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `feed_category`
--

INSERT INTO `feed_category` (`feed_id`, `category_id`) VALUES
(1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `feed_tag`
--

CREATE TABLE IF NOT EXISTS `feed_tag` (
  `feed_id` int(11) NOT NULL,
  `tag_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `feed_tag`
--

INSERT INTO `feed_tag` (`feed_id`, `tag_id`) VALUES
(1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `role`
--

CREATE TABLE IF NOT EXISTS `role` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `role`
--

INSERT INTO `role` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'User', '2017-01-26 00:00:00', '2017-01-26 00:00:00'),
(2, 'Admin', '2017-01-26 00:00:00', '2017-01-26 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `tag`
--

CREATE TABLE IF NOT EXISTS `tag` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  KEY `id` (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `tag`
--

INSERT INTO `tag` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'PHP', '2017-01-25 00:00:00', '2017-01-25 00:00:00'),
(2, 'JAVA', '2017-01-25 00:00:00', '2017-01-25 00:00:00'),
(3, 'JAVASCRIPT', '2017-01-25 00:00:00', '2017-01-25 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `tools`
--

CREATE TABLE IF NOT EXISTS `tools` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `modified_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `tools`
--

INSERT INTO `tools` (`id`, `name`, `created_at`, `modified_at`) VALUES
(1, 'Generate random characters', '2017-02-04 00:00:00', '2017-02-04 00:00:00'),
(2, 'JSON formatter', '2017-02-04 00:00:00', '2017-02-04 00:00:00'),
(3, 'JSON validator', '2017-02-04 00:00:00', '2017-02-04 00:00:00'),
(4, 'YAML validator', '2017-02-04 00:00:00', '2017-02-04 00:00:00'),
(5, 'URL Encoder and Decoder', '2017-02-04 00:00:00', '2017-02-04 00:00:00'),
(6, 'Image Checker', '2017-02-05 00:00:00', '2017-02-05 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `card_type` varchar(50) DEFAULT NULL,
  `card_no` int(20) NOT NULL,
  `created_via` varchar(100) DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `email`, `password`, `card_type`, `card_no`, `created_via`, `created_at`, `updated_at`) VALUES
(1, 'vigneshwaran', 'vigneshwaran17691@gmail.com', '21232f297a57a5a743894a0e4a801fc3', NULL, 0, 'Manual', '2017-01-26 00:00:00', '2017-01-26 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `user_role`
--

CREATE TABLE IF NOT EXISTS `user_role` (
  `user_id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_role`
--

INSERT INTO `user_role` (`user_id`, `role_id`) VALUES
(1, 1),
(1, 2);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
