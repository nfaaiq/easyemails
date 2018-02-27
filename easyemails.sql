-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Feb 27, 2018 at 09:57 AM
-- Server version: 5.5.57-0ubuntu0.14.04.1
-- PHP Version: 5.5.9-1ubuntu4.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `easyemails`
--

-- --------------------------------------------------------

--
-- Table structure for table `invites`
--

CREATE TABLE IF NOT EXISTS `invites` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `admin_id` int(11) NOT NULL,
  `email` varchar(150) NOT NULL,
  `created` date NOT NULL,
  `status` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `invites`
--

INSERT INTO `invites` (`id`, `admin_id`, `email`, `created`, `status`) VALUES
(1, 1, 'johndoe@yopmail.com', '0000-00-00', 'accepted'),
(2, 1, 'james@gmail.com', '0000-00-00', 'accepted'),
(3, 1, 'test@gmail.com', '2016-10-02', 'pending'),
(4, 1, 'lnaranjo@stackbuilders.com', '2018-02-27', 'pending');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL,
  `roles` varchar(20) NOT NULL,
  `created` date NOT NULL,
  `created_by` int(11) NOT NULL,
  `modified` date NOT NULL,
  `modified_by` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `roles`, `created`, `created_by`, `modified`, `modified_by`) VALUES
(1, 'admin', '123456', 'admin', '2016-10-02', 1, '2016-10-02', 1),
(2, 'faaiq', '13546', 'contributer', '2016-10-02', 1, '2016-10-02', 1),
(3, 'faaiq', '13546', 'contributer', '2016-10-02', 1, '2016-10-02', 1),
(4, 'ranju', '123456', 'contributer', '2016-10-02', 1, '2016-10-02', 1),
(5, 'james@gmail.com', '12346', 'contributer', '2016-10-02', 1, '2016-10-02', 1),
(6, 'james@gmail.com', '12346', 'contributer', '2016-10-02', 1, '2016-10-02', 1),
(7, 'james@gmail.com', '12346', 'contributer', '2016-10-02', 1, '2016-10-02', 1);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
