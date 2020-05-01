-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Apr 30, 2020 at 10:00 PM
-- Server version: 5.7.21
-- PHP Version: 7.2.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `stout_intl`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` int(11) NOT NULL,
  `first_name` varchar(255) DEFAULT NULL,
  `last_name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `username` varchar(255) DEFAULT NULL,
  `hashed_password` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `first_name`, `last_name`, `email`, `username`, `hashed_password`, `created_at`, `updated_at`) VALUES
(2, 'Jue', 'Zhang', 'juez@marshall.edu', 'Juez1986', '$2y$10$qWSGgIwZHtRlHb6CaaayYOBZnPyOYttm4qx/WaQ1u7X6/z4/5/5oG', '2020-04-18 04:39:19', '2020-04-18 04:39:19'),
(3, 'Liang', 'Wu', 'wl1664209734@gmail.com', 'wl1664209734', '$2y$10$XjOfoveRypWHsGH2vxdIBOBRuss61KYnsOqg1qGnNvypLCZ/xRksO', '2020-04-28 03:37:25', '2020-04-28 03:37:25');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` int(11) NOT NULL,
  `admin_id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL,
  `content` text,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `admin_id`, `post_id`, `content`, `created_at`, `updated_at`) VALUES
(1, 2, 16, 'this is a test', '2020-04-11 04:50:59', '2020-04-11 04:50:59'),
(2, 2, 16, 'Hello', '2020-04-12 03:46:48', '2020-04-12 03:46:48'),
(3, 2, 16, 'Hi', '2020-04-12 03:49:04', '2020-04-12 03:49:04'),
(4, 2, 16, 'How are you', '2020-04-12 03:49:27', '2020-04-12 03:49:27'),
(5, 2, 16, 'good night!', '2020-04-12 03:55:18', '2020-04-12 03:55:18'),
(6, 2, 3, 'Test for post a comment', '2020-04-12 03:56:29', '2020-04-12 03:56:29'),
(7, 2, 3, 'Test for full_name.', '2020-04-12 04:00:11', '2020-04-12 04:00:11'),
(8, 2, 16, 'another window', '2020-04-12 04:03:38', '2020-04-12 04:03:38'),
(9, 3, 3, 'Hi', '2020-04-28 03:38:22', '2020-04-28 03:38:22'),
(10, 3, 3, 'Test', '2020-04-28 03:39:30', '2020-04-28 03:39:30'),
(11, 3, 5, 'test', '2020-04-28 04:45:35', '2020-04-28 04:45:35'),
(12, 3, 5, 'test', '2020-04-28 04:45:41', '2020-04-28 04:45:41'),
(13, 3, 5, 'test', '2020-04-28 04:46:21', '2020-04-28 04:46:21'),
(14, 3, 5, 'text', '2020-04-28 04:48:16', '2020-04-28 04:48:16');

-- --------------------------------------------------------

--
-- Table structure for table `keywords`
--

CREATE TABLE `keywords` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `keywords`
--

INSERT INTO `keywords` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Academic', '2020-04-17 22:58:17', '2020-04-17 22:58:17'),
(2, 'Campus life', '2020-04-17 22:58:17', '2020-04-17 22:58:17'),
(3, 'Off campus life', '2020-04-17 22:58:17', '2020-04-17 22:58:17'),
(6, 'Career', '2020-04-17 22:58:17', '2020-04-17 22:58:17'),
(7, 'Menomonie', '2020-04-17 22:58:17', '2020-04-17 22:58:17'),
(8, 'Admission', '2020-04-17 22:58:17', '2020-04-17 22:58:17'),
(9, 'Discover', '2020-04-17 22:58:17', '2020-04-17 22:58:17'),
(10, 'Student', '2020-04-17 22:58:17', '2020-04-17 22:58:17'),
(11, 'Community', '2020-04-17 22:58:17', '2020-04-17 22:58:17'),
(12, 'Scholarships', '2020-04-17 22:58:17', '2020-04-17 22:58:17'),
(13, 'Engagement', '2020-04-17 22:58:17', '2020-04-17 22:58:17'),
(14, 'Dining', '2020-04-17 22:58:17', '2020-04-17 22:58:17'),
(15, 'Esports', '2020-04-17 22:58:17', '2020-04-17 22:58:17'),
(16, 'Graduate Programs', '2020-04-17 22:58:17', '2020-04-17 22:58:17'),
(17, 'English', '2020-04-17 22:58:17', '2020-04-17 22:58:17');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` int(11) NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `keywords` tinytext,
  `visible` tinyint(1) DEFAULT NULL,
  `content` text NOT NULL,
  `timestamp` datetime DEFAULT NULL,
  `keywords_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `title`, `keywords`, `visible`, `content`, `timestamp`, `keywords_id`) VALUES
(3, 'Pay Tuition', 'fee', 1, '<p><span style=\"font-family: Arial;\">﻿</span><span style=\"font-family: Arial;\">﻿</span>Pay Tuition dolor sit amet, consectetur adipiscing elit. Suspendisse iaculis facilisis malesuada. Nullam eget mauris condimentum, vulputate leo sed, euismod eros. Vestibulum commodo, sapien sed consequat tempus, ipsum nisi fringilla diam, quis iaculis nunc ante id orci. Nunc at eleifend massa. Suspendisse hendrerit fermentum metus ac laoreet. Quisque mattis mollis elit eget ultricies. Donec a egestas lacus. Quisque a malesuada nisl, eget auctor tellus. Nullam ac magna sed justo interdum consequat ut eu tellus. Praesent egestas mattis placerat. Sed a diam arcu. Suspendisse et ultricies dui, vitae accumsan dolor.</p>', '2020-03-05 11:21:29', 17),
(5, 'SOAD Speaker Series ', 'study', 1, 'SOAD Speaker Series sit amet, consectetur adipiscing elit. Suspendisse iaculis facilisis malesuada. Nullam eget mauris condimentum, vulputate leo sed, euismod eros. Vestibulum commodo, sapien sed consequat tempus, ipsum nisi fringilla diam, quis iaculis nunc ante id orci. Nunc at eleifend massa. Suspendisse hendrerit fermentum metus ac laoreet. Quisque mattis mollis elit eget ultricies. Donec a egestas lacus. Quisque a malesuada nisl, eget auctor tellus. Nullam ac magna sed justo interdum consequat ut eu tellus. Praesent egestas mattis placerat. Sed a diam arcu. Suspendisse et ultricies dui, vitae accumsan dolor.', '2020-03-05 14:33:56', 2),
(16, 'Snow Mobile', '', 1, '<p><span style=\"font-family: Arial;\">﻿</span><span style=\"font-family: Arial;\">﻿</span><span style=\"font-family: Arial;\">﻿</span><span style=\"font-family: Arial;\">﻿</span><span style=\"font-family: Arial;\">﻿</span><span style=\"font-family: Arial;\">﻿</span><br></p><blockquote><span style=\"background-color: rgb(239, 198, 49);\">Hello Jue Zhang</span></blockquote><p><img style=\"width: 100%;\" src=\"/stout_intl/public/user/summernote/img_uploads/1584630645.jpg\"></p><p><br></p><p><img src=\"/stout_intl/public/user/summernote/img_uploads/1585197304.JPG\" style=\"width: 100%;\"><br></p><p><br></p><p><br></p><table class=\"table table-bordered\"><tbody><tr><td><br></td><td><br></td><td><br></td><td><br></td></tr><tr><td><br></td><td><br></td><td><br></td><td><br></td></tr><tr><td><br></td><td><br></td><td><br></td><td><br></td></tr></tbody></table><p><br></p>', '2020-03-19 10:11:40', 3);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD KEY `index_username` (`username`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `index_admin_id` (`admin_id`),
  ADD KEY `index_post_id` (`post_id`);

--
-- Indexes for table `keywords`
--
ALTER TABLE `keywords`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_keywords_id` (`keywords_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `keywords`
--
ALTER TABLE `keywords`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
