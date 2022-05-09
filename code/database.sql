-- phpMyAdmin SQL Dump
-- version 4.6.6deb5ubuntu0.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: May 08, 2022 at 06:26 PM
-- Server version: 5.7.38-0ubuntu0.18.04.1
-- PHP Version: 7.2.34-28+ubuntu18.04.1+deb.sury.org+1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `nvubu`
--

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` bigint(20) NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `post_id` int(11) NOT NULL,
  `comment` longtext NOT NULL,
  `liked` int(11) DEFAULT '0',
  `created_on` datetime DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `comments_track`
--

CREATE TABLE `comments_track` (
  `c_id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL,
  `comment` varchar(255) DEFAULT NULL,
  `member_id` int(11) NOT NULL,
  `likes` bigint(20) DEFAULT '0',
  `views` bigint(20) DEFAULT '0',
  `liked` int(11) DEFAULT '0',
  `created_on` datetime DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `likes_track`
--

CREATE TABLE `likes_track` (
  `id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL,
  `comment_id` int(11) NOT NULL DEFAULT '0',
  `member_id` int(11) NOT NULL,
  `liked` int(11) DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `likes_track`
--

INSERT INTO `likes_track` (`id`, `post_id`, `comment_id`, `member_id`, `liked`) VALUES
(7, 2, 0, 4, 1),
(6, 4, 0, 4, 1),
(8, 4, 0, 1, 1),
(9, 4, 0, 2, 1),
(10, 4, 0, 3, 1),
(11, 1, 0, 4, 1),
(12, 4, 0, 5, 1),
(13, 4, 0, 6, 1),
(14, 4, 0, 7, 1);

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `p_id` int(11) NOT NULL,
  `post` text NOT NULL,
  `type` varchar(55) NOT NULL,
  `sector` varchar(50) DEFAULT NULL,
  `resolved` int(11) DEFAULT '0',
  `resolved_by` int(11) DEFAULT NULL,
  `userid` int(11) NOT NULL,
  `posted_by` int(11) NOT NULL,
  `likes` int(11) DEFAULT '0',
  `views` int(11) DEFAULT '1',
  `media` int(11) DEFAULT NULL,
  `uip` varchar(222) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `description` text,
  `url` text,
  `cur_image` text,
  `post_type` tinyint(1) DEFAULT NULL,
  `date_created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`p_id`, `post`, `type`, `sector`, `resolved`, `resolved_by`, `userid`, `posted_by`, `likes`, `views`, `media`, `uip`, `title`, `description`, `url`, `cur_image`, `post_type`, `date_created`) VALUES
(1, 'Animal intrusion dectected in sector 9, animals to probably breach barrier in 1 hour, immediate attention needed', '1', '9', 0, NULL, 1, 1, 4201, 1000050, 0, '', 'Animal Intrusion', '', '', '', 0, '2021-11-10 05:22:56'),
(2, 'Animal intrusion dectected in sector 2, animals to probably breach barrier in 2 hours', '1', '2', 0, NULL, 1, 1, 1, 1, 0, '', 'Animal Intrusion', '', '', '', 0, '2021-11-11 09:22:56'),
(4, 'Animal intrusion dectected in sector 13, animals to probably breach barrier in 4 hours', '1', '13', 0, NULL, 1, 1, 5, 1000, 0, '', 'Animal Intrusion', '', '', '', 0, '2021-11-12 00:22:56'),
(5, 'Animal intrusion successfully diverted in sector 2, animals moved away from barrier', '0', '2', 1, 1, 1, 1, 2, 2, 0, '123', 'Diversion success', 'Diversion success', '0', '0', 0, '2021-11-13 03:20:08'),
(6, 'Animal intrusion successfully diverted in sector 13, animals moved away from barrier', '0', '13', 1, 1, 1, 1, 5, 1, 0, '123', 'Diversion success', 'Diversion success', '0', '0', 0, '2021-11-13 03:20:09'),
(7, 'Animal intrusion successfully diverted in sector 9, animals moved away from barrier', '0', '9', 1, 1, 1, 1, 4, 1, 0, '123', 'Diversion success', 'Diversion success', '0', '0', 0, '2021-11-13 03:20:09'),
(8, 'Possible Animal intrusion dectected in sector 13, animals to probably breach barrier in 4 hours', '1', '13', 0, NULL, 1, 1, 0, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-11-14 03:39:08'),
(9, 'Possible Animal intrusion dectected in sector 13, animals to probably breach barrier in 4 hours', '1', '13', 0, NULL, 1, 1, 0, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-11-14 03:46:22'),
(10, 'Possible Animal intrusion dectected in sector 13, animals to probably breach barrier in 4 hours', '1', '13', 0, NULL, 1, 1, 0, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-11-14 07:34:19'),
(11, 'Possible Animal intrusion dectected in sector 13, animals to probably breach barrier in 1 hour', '1', '13', 0, NULL, 1, 1, 0, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-11-14 08:42:15'),
(12, 'Possible Animal intrusion dectected in sector 13, animals to probably breach barrier in 1 hour', '1', '13', 0, NULL, 1, 1, 0, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-05-08 13:26:13');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `fullname` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `join_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `fullname`, `email`, `password`, `join_date`) VALUES
(1, 'Mukungu Mark', 'mark.mukungu@liberty.co.ug', '25f9e794323b453885f5181f1b624d0b', '2021-11-12 21:27:51');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comments_track`
--
ALTER TABLE `comments_track`
  ADD PRIMARY KEY (`c_id`);

--
-- Indexes for table `likes_track`
--
ALTER TABLE `likes_track`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`p_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `comments_track`
--
ALTER TABLE `comments_track`
  MODIFY `c_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `likes_track`
--
ALTER TABLE `likes_track`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `p_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
