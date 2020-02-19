-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 19, 2020 at 05:38 AM
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
-- Database: `productmvc`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `category_id` int(11) NOT NULL,
  `parent_id` int(11) DEFAULT NULL,
  `categoryName` varchar(100) NOT NULL,
  `urlKey` varchar(200) NOT NULL,
  `Image` varchar(100) NOT NULL,
  `Status` tinyint(1) NOT NULL,
  `Description` varchar(200) NOT NULL,
  `createdAt` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updatedAt` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`category_id`, `parent_id`, `categoryName`, `urlKey`, `Image`, `Status`, `Description`, `createdAt`, `updatedAt`) VALUES
(1, NULL, 'shoes ', 'shoes', '../public/uploads/nature.jpg ', 1, 'qwert ', '2020-02-15 10:06:21', '2020-02-15 10:06:21'),
(2, NULL, 'electronics', 'electronics', '', 1, 'vbjkl;', '2020-02-15 10:08:02', '2020-02-15 10:08:02'),
(3, 1, 'canvas ', 'canvas ', '../public/uploads/canvas.jpg ', 1, 'sdfg ', '2020-02-15 10:09:38', '2020-02-15 10:09:38'),
(6, NULL, 'clothes', 'clothes', '../public/uploads/NATURE+GENERIC+TREES.jpg', 0, 'wedf', '2020-02-15 11:55:28', '2020-02-15 11:55:28'),
(7, 6, 'manswear', 'manswear', '', 1, 'mans Wear', '2020-02-17 09:16:45', '2020-02-17 09:16:45'),
(11, 6, 'ladieswear', 'ladieswear', '', 1, 'ladies wear', '2020-02-17 10:01:51', '2020-02-17 10:01:51'),
(12, 2, 'laptop', 'laptop', '', 1, 'laptop', '2020-02-17 10:02:46', '2020-02-17 10:02:46'),
(13, 1, 'sports ', 'sports ', '../public/uploads/sports.jpg ', 1, 'sports shoes ', '2020-02-17 10:03:45', '2020-02-17 10:03:45'),
(15, 2, 'mobile', 'mobile', '../public/uploads/', 1, 'mobile', '2020-02-18 10:08:27', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `cms_pages`
--

CREATE TABLE `cms_pages` (
  `id` int(11) NOT NULL,
  `pageTitle` varchar(100) NOT NULL,
  `urlKey` varchar(200) NOT NULL,
  `Status` tinyint(1) NOT NULL,
  `Content` varchar(100) NOT NULL,
  `createdAt` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updatedAt` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cms_pages`
--

INSERT INTO `cms_pages` (`id`, `pageTitle`, `urlKey`, `Status`, `Content`, `createdAt`, `updatedAt`) VALUES
(1, 'home', 'home', 1, 'This is home page', '2020-02-16 16:55:18', '2020-02-16 16:55:18'),
(2, 'About Us ', 'aboutUs ', 1, 'This is About Us Page ', '2020-02-16 17:19:00', '2020-02-16 17:19:00'),
(3, 'Contact US', 'contactus', 1, 'This is Contact Us Page', '2020-02-17 05:35:07', '2020-02-17 05:35:07');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `productName` varchar(100) NOT NULL,
  `category_id` int(11) NOT NULL,
  `SKU` varchar(100) NOT NULL,
  `urlKey` varchar(200) NOT NULL,
  `Image` varchar(200) NOT NULL,
  `Status` tinyint(1) NOT NULL,
  `Description` varchar(200) NOT NULL,
  `shortDescription` varchar(100) NOT NULL,
  `Price` float NOT NULL,
  `Stock` int(11) NOT NULL,
  `createdAt` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updatedAt` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `productName`, `category_id`, `SKU`, `urlKey`, `Image`, `Status`, `Description`, `shortDescription`, `Price`, `Stock`, `createdAt`, `updatedAt`) VALUES
(15, 'HPlaptop', 12, 'idk', 'laptop', '../public/uploads/laptop.jpg', 1, 'hp laptop', 'hp laptop', 35000, 5, '2020-02-18 06:23:31', '2020-02-18 06:23:31'),
(16, 'DELLlaptop', 12, 'idk', 'laptop', '../public/uploads/laptop2.jpg', 1, 'dell laptop', 'dell laptop', 40000, 10, '2020-02-18 06:24:24', '2020-02-18 06:24:24'),
(17, 'shirt', 7, 'idk', 'manswear', '../public/uploads/manwear.jpg', 1, 'shirts', 'shirts', 500, 50, '2020-02-18 06:34:03', '2020-02-18 06:34:03'),
(18, 'Tshirt', 7, 'idk', 'manswear', '../public/uploads/manwear2.png', 1, 'Tshirt', 'Tshirt', 400, 80, '2020-02-18 06:34:50', '2020-02-18 06:34:50'),
(19, 'ladiesWear', 11, 'idk', 'ladieswear', '../public/uploads/ladieswear.jpg', 1, 'dress', 'dress', 800, 40, '2020-02-18 06:36:10', '2020-02-18 06:36:10'),
(20, 'Pants', 11, 'idk', 'ladieswear', '../public/uploads/ladieswear2.jpg', 1, 'pants', 'pants', 600, 50, '2020-02-18 06:36:49', '2020-02-18 06:36:49'),
(21, 'addidas', 3, 'idk', 'canvas', '../public/uploads/canvas.jpg', 1, 'addidas', 'addidas', 1500, 40, '2020-02-18 07:37:18', '2020-02-18 07:37:18'),
(22, 'nike', 3, 'idk', 'canvas', '../public/uploads/canvas2.jpg', 1, 'nike', 'nike', 2000, 48, '2020-02-18 07:37:56', '2020-02-18 07:37:56'),
(23, 'Fila', 13, 'idk', 'sports', '../public/uploads/sports.jpg', 1, 'sports', 'sports', 1400, 80, '2020-02-18 07:40:18', '2020-02-18 07:40:18'),
(24, 'puma ', 13, 'idk ', 'sports ', '../public/uploads/sports2.jpg ', 1, 'puma ', 'puma ', 1200, 90, '2020-02-18 07:41:48', '2020-02-18 05:05:05'),
(25, 'redminote8pro', 15, 'idk', 'mobile', '../public/uploads/redmi8pro.jpg', 1, 'redmi', 'redmi', 15000, 40, '2020-02-18 10:10:22', NULL),
(26, 'Realme3', 15, 'idk', 'mobile', '../public/uploads/mobile2.jpg', 1, 'realme', 'realme', 20000, 80, '2020-02-18 10:11:05', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`category_id`),
  ADD KEY `parent_id` (`parent_id`);

--
-- Indexes for table `cms_pages`
--
ALTER TABLE `cms_pages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category_id` (`category_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `cms_pages`
--
ALTER TABLE `cms_pages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `categories`
--
ALTER TABLE `categories`
  ADD CONSTRAINT `categories_ibfk_1` FOREIGN KEY (`parent_id`) REFERENCES `categories` (`category_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `categories` (`category_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
