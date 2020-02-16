-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 16, 2020 at 07:44 PM
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
  `updatedAt` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`category_id`, `parent_id`, `categoryName`, `urlKey`, `Image`, `Status`, `Description`, `createdAt`, `updatedAt`) VALUES
(1, NULL, 'shoes ', 'we ', '../public/uploads/nature.jpg ', 1, 'qwert ', '2020-02-15 10:06:21', '2020-02-15 10:06:21'),
(2, NULL, 'electronics', 'cvjk', '', 1, 'vbjkl;', '2020-02-15 10:08:02', '2020-02-15 10:08:02'),
(3, 1, 'canvas', 'sdf', '', 1, 'sdfg', '2020-02-15 10:09:38', '2020-02-15 10:09:38'),
(6, NULL, 'clothes', 'bjk', '../public/uploads/NATURE+GENERIC+TREES.jpg', 0, 'wedf', '2020-02-15 11:55:28', '2020-02-15 11:55:28');

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
  `updatedAt` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cms_pages`
--

INSERT INTO `cms_pages` (`id`, `pageTitle`, `urlKey`, `Status`, `Content`, `createdAt`, `updatedAt`) VALUES
(1, 'home', 'home', 1, 'This is home page', '2020-02-16 16:55:18', '2020-02-16 16:55:18'),
(2, 'About Us ', 'aboutUs ', 1, 'This is About Us Page ', '2020-02-16 17:19:00', '2020-02-16 17:19:00');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `productName` varchar(100) NOT NULL,
  `SKU` varchar(100) NOT NULL,
  `urlKey` varchar(200) NOT NULL,
  `Image` varchar(200) NOT NULL,
  `Status` tinyint(1) NOT NULL,
  `Description` varchar(200) NOT NULL,
  `shortDescription` varchar(100) NOT NULL,
  `Price` float NOT NULL,
  `Stock` int(11) NOT NULL,
  `createdAt` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updatedAt` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `productName`, `SKU`, `urlKey`, `Image`, `Status`, `Description`, `shortDescription`, `Price`, `Stock`, `createdAt`, `updatedAt`) VALUES
(9, 'shoes   ', 'idk   ', 'shoes   ', '../public/uploads/nature.jpg ', 1, 'qwer   ', 'uytre   ', 1232, 23, '2020-02-15 06:07:48', '2020-02-15 06:07:48'),
(10, 'mobile', 'idk', 'mobile', '../public/uploads/NATURE+GENERIC+TREES.jpg', 0, 'good', 'best', 20000, 15, '2020-02-16 18:31:08', '2020-02-16 18:31:08');

-- --------------------------------------------------------

--
-- Table structure for table `products_categories`
--

CREATE TABLE `products_categories` (
  `id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products_categories`
--
ALTER TABLE `products_categories`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `cms_pages`
--
ALTER TABLE `cms_pages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `products_categories`
--
ALTER TABLE `products_categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `categories`
--
ALTER TABLE `categories`
  ADD CONSTRAINT `categories_ibfk_1` FOREIGN KEY (`parent_id`) REFERENCES `categories` (`category_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
