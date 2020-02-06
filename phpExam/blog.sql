-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 06, 2020 at 09:32 AM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `blog`
--

-- --------------------------------------------------------

--
-- Table structure for table `blog_post`
--

CREATE TABLE `blog_post` (
  `blog_id` int(11) NOT NULL,
  `parent_name` varchar(50) NOT NULL,
  `title` varchar(50) NOT NULL,
  `url` varchar(150) NOT NULL,
  `content` varchar(100) NOT NULL,
  `categoryImage` varchar(150) NOT NULL,
  `published_at` date NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `blog_post`
--

INSERT INTO `blog_post` (`blog_id`, `parent_name`, `title`, `url`, `content`, `categoryImage`, `published_at`, `created_at`, `updated_at`) VALUES
(12, 'Health,Music', 'shyam', 'jjkjk', 'hjhjh', 'uploads/NATURE+GENERIC+TREES.jpg', '2020-01-01', '2020-02-04 12:52:49', '2020-02-04 12:52:49'),
(13, 'LifeStyle,Health', 'rohit ', 'qwer   ', 'qwe   ', 'uploads/', '2020-01-01', '2020-02-06 07:53:15', '2020-02-04 12:54:35');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `category_id` int(11) NOT NULL,
  `parent_category_id` int(11) NOT NULL,
  `parent_name` varchar(50) NOT NULL,
  `title` varchar(50) NOT NULL,
  `metaTitle` varchar(100) NOT NULL,
  `url` varchar(100) NOT NULL,
  `content` varchar(150) NOT NULL,
  `categoryImage` varchar(500) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`category_id`, `parent_category_id`, `parent_name`, `title`, `metaTitle`, `url`, `content`, `categoryImage`, `created_at`, `updated_at`) VALUES
(11, 1, 'LifeStyle', 'shyam', 'jkjk', 'jjkjk', 'jkjk', 'uploads/NATURE+GENERIC+TREES.jpg', '2020-02-06 06:00:52', '2020-02-06 06:00:52'),
(12, 3, 'Education ', 'keyur ', 'qwqw ', 'wkwk ', 'jkjkjjk ', 'uploads/NATURE+GENERIC+TREES.jpg', '2020-02-06 08:28:37', '2020-02-06 08:15:29');

-- --------------------------------------------------------

--
-- Table structure for table `parentcategory`
--

CREATE TABLE `parentcategory` (
  `parent_id` int(11) NOT NULL,
  `title` varchar(200) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `parentcategory`
--

INSERT INTO `parentcategory` (`parent_id`, `title`, `created_at`, `updated_at`) VALUES
(1, 'LifeStyle', '2020-02-04 07:48:43', '2020-02-04 07:48:43'),
(2, 'Health', '2020-02-04 07:48:43', '2020-02-04 07:48:43'),
(3, 'Education', '2020-02-04 07:48:43', '2020-02-04 07:48:43'),
(4, 'Music', '2020-02-04 07:48:43', '2020-02-04 07:48:43');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `prefix` varchar(50) NOT NULL,
  `firstName` varchar(150) NOT NULL,
  `lastName` varchar(150) NOT NULL,
  `mobileNumber` bigint(10) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `lastLogIn` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `information` varchar(250) NOT NULL,
  `createdAt` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updatedAt` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `prefix`, `firstName`, `lastName`, `mobileNumber`, `email`, `password`, `lastLogIn`, `information`, `createdAt`, `updatedAt`) VALUES
(1, 'Mr', 'shyam', 'topiya11', 8866535619, 'shyam@gmail.com', '123', '2020-02-04 09:42:07', 'hii', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(2, 'Mr', 'qq', 'll', 8855221144, 'sg@gmail.com', '123', '2020-02-04 05:51:31', 'qq', '2020-02-04 05:51:31', '2020-02-04 05:51:31'),
(3, 'Mr', 'keyur', 'patel', 1212121212, 'aa@gmail.com', '123', '2020-02-04 05:54:19', 'qq', '2020-02-04 05:54:19', '2020-02-04 05:54:19'),
(4, 'Mr', 'shyam', 'topiya', 8866535619, 'sam@gmail.com', '123', '2020-02-04 06:11:11', 'qq', '2020-02-04 06:11:11', '2020-02-04 06:11:11');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `blog_post`
--
ALTER TABLE `blog_post`
  ADD PRIMARY KEY (`blog_id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`category_id`),
  ADD KEY `category_ibfk_1` (`parent_category_id`);

--
-- Indexes for table `parentcategory`
--
ALTER TABLE `parentcategory`
  ADD PRIMARY KEY (`parent_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `blog_post`
--
ALTER TABLE `blog_post`
  MODIFY `blog_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `parentcategory`
--
ALTER TABLE `parentcategory`
  MODIFY `parent_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `category`
--
ALTER TABLE `category`
  ADD CONSTRAINT `category_ibfk_1` FOREIGN KEY (`parent_category_id`) REFERENCES `parentcategory` (`parent_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
