-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 23, 2025 at 05:38 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 7.4.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `fashionofficial`
--
CREATE DATABASE IF NOT EXISTS `fashionofficial` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `fashionofficial`;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

DROP TABLE IF EXISTS `categories`;
CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`) VALUES
(1, 'Áo');

-- --------------------------------------------------------

--
-- Table structure for table `likes`
--

DROP TABLE IF EXISTS `likes`;
CREATE TABLE `likes` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `outfit_id` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `likes`
--

INSERT INTO `likes` (`id`, `user_id`, `outfit_id`, `created_at`) VALUES
(21, 11, 5, '2025-05-14 05:49:16'),
(33, 9, 5, '2025-05-14 05:50:47'),
(34, 10, 5, '2025-05-14 05:50:47'),
(39, 1, 5, '2025-05-14 05:52:49'),
(40, 7, 5, '2025-05-14 05:52:49'),
(41, 8, 5, '2025-05-14 05:52:49'),
(43, 3, 4, '2025-05-14 05:56:47'),
(45, 5, 6, '2025-05-15 14:43:42'),
(46, 5, 4, '2025-05-15 14:46:30'),
(48, 3, 6, '2025-05-15 15:03:11'),
(50, 3, 7, '2025-05-15 15:09:22'),
(52, 4, 5, '2025-05-16 04:33:34'),
(53, 3, 5, '2025-05-16 04:45:31'),
(58, 5, 8, '2025-05-17 01:21:19'),
(59, 5, 10, '2025-05-17 01:21:57'),
(60, 5, 7, '2025-05-17 01:22:10'),
(65, 5, 9, '2025-05-17 02:05:22'),
(68, 12, 5, '2025-05-17 08:19:49'),
(72, 5, 5, '2025-05-20 08:08:11');

-- --------------------------------------------------------

--
-- Table structure for table `outfits`
--

DROP TABLE IF EXISTS `outfits`;
CREATE TABLE `outfits` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `title` varchar(100) DEFAULT NULL,
  `caption` text DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `outfits`
--

INSERT INTO `outfits` (`id`, `user_id`, `title`, `caption`, `image`, `created_at`) VALUES
(4, 4, NULL, 'hello', 'assets/uploads/1746866230_avatar4.jpg', '2025-05-10 08:37:10'),
(5, 5, NULL, 'áo này xinh quá nè', 'assets/uploads/1746977192_anhtuyet1.jpg', '2025-05-11 15:26:32'),
(6, 5, NULL, 'nay đi biển mn ơi, đồ shop này xinh quá luôn <333', 'assets/uploads/1746977219_tuytmai.jpg', '2025-05-11 15:26:59'),
(7, 4, NULL, 'nay đi chơi nè', 'assets/uploads/1747320770_diepky2.jpg', '2025-05-15 14:52:50'),
(8, 3, NULL, 'ay yoooo', 'assets/uploads/1747321723_diepky1.jpg', '2025-05-15 15:08:43'),
(9, 3, NULL, 'nhi đồng chu che nè', 'assets/uploads/1747321737_diepky.jpg', '2025-05-15 15:08:57'),
(10, 3, NULL, 'helu', 'assets/uploads/1747362271_anhtuyet2.jpg', '2025-05-16 02:24:31');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

DROP TABLE IF EXISTS `products`;
CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `description` text DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `category_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `price`, `description`, `image`, `category_id`) VALUES
(1, 'Áo thun ngắn tay 6663', '30000.00', 'Màu hồng, cổ tròn, dáng croptop', '6663.jpeg', 1),
(2, 'Áo thun ngắn tay 6663', '30000.00', 'Màu hồng, cổ tròn, dáng croptop', '6663.jpeg', 1),
(3, 'Áo thun ngắn tay 6662', '35000.00', 'Màu đen, cổ tròn, dáng croptop', '6662.jpeg', 1),
(4, 'Áo thun ngắn tay 6660', '35000.00', 'Màu xanh dương, cổ tròn, dáng basic', '6660.jpeg', 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `fullname` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `avatar` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `fullname`, `email`, `password`, `phone`, `avatar`) VALUES
(1, 'Nguyễn  Tuyết Mai', 'hihi@gmail.com', '$2y$10$wb8Ht.0gj2a9A/ARtZLQf.SOpT4LxnSWPcspAtUHqgy.ZP/GEBAZ6', '0912333233', NULL),
(3, 'Trần Uyển Nhi', 'uyennhi@gmail.com', '$2y$10$6.wmkJAXc5EzmXa9Htce.O9qMfns0EIVrfsSkghwhFF.iXYkSK6be', '0123456', 'assets/img/avatar3.jpg'),
(4, 'Nguyễn Tuyết Mai', 'omaica@gmail.com', '$2y$10$k.sGO1m0cowe11N90dzEsuOS0iZk42P7kaakGxlZs83ovBVDmx6qm', '0199092', 'assets/img/avatar/4.jpg'),
(5, 'Thanh Hà cute', 'thanhha@gmail.com', '$2y$10$YgJfSjFoK6iP/RO5879Q.Oe5FuXRMMXfvixFntoveXV.MYJwjB78i', '01892127', 'assets/img/avatar/5.jpg'),
(7, 'User Fake 1', 'fake1@example.com', '$2y$10$KXj8TPWY43hPGYrhl23aEu9os2ZQe9r6S0MTSMSF6xv1iJVPA1BSy', NULL, NULL),
(8, 'User Fake 2', 'fake2@example.com', '$2y$10$KXj8TPWY43hPGYrhl23aEu9os2ZQe9r6S0MTSMSF6xv1iJVPA1BSy', NULL, NULL),
(9, 'User Fake 3', 'fake3@example.com', '$2y$10$KXj8TPWY43hPGYrhl23aEu9os2ZQe9r6S0MTSMSF6xv1iJVPA1BSy', NULL, NULL),
(10, 'User Fake 4', 'fake4@example.com', '$2y$10$KXj8TPWY43hPGYrhl23aEu9os2ZQe9r6S0MTSMSF6xv1iJVPA1BSy', NULL, NULL),
(11, 'User Fake 5', 'fake5@example.com', '$2y$10$KXj8TPWY43hPGYrhl23aEu9os2ZQe9r6S0MTSMSF6xv1iJVPA1BSy', NULL, NULL),
(12, 'User Fake 6', 'fake6@example.com', '$2y$10$KXj8TPWY43hPGYrhl23aEu9os2ZQe9r6S0MTSMSF6xv1iJVPA1BSy', NULL, NULL),
(13, 'User Fake 7', 'fake7@example.com', '$2y$10$KXj8TPWY43hPGYrhl23aEu9os2ZQe9r6S0MTSMSF6xv1iJVPA1BSy', NULL, NULL),
(14, 'User Fake 8', 'fake8@example.com', '$2y$10$KXj8TPWY43hPGYrhl23aEu9os2ZQe9r6S0MTSMSF6xv1iJVPA1BSy', NULL, NULL),
(15, 'User Fake 9', 'fake9@example.com', '$2y$10$KXj8TPWY43hPGYrhl23aEu9os2ZQe9r6S0MTSMSF6xv1iJVPA1BSy', NULL, NULL),
(16, 'User Fake 10', 'fake10@example.com', '$2y$10$KXj8TPWY43hPGYrhl23aEu9os2ZQe9r6S0MTSMSF6xv1iJVPA1BSy', NULL, NULL),
(17, 'User Fake 11', 'fake11@example.com', '$2y$10$KXj8TPWY43hPGYrhl23aEu9os2ZQe9r6S0MTSMSF6xv1iJVPA1BSy', NULL, NULL),
(18, 'User Fake 12', 'fake12@example.com', '$2y$10$KXj8TPWY43hPGYrhl23aEu9os2ZQe9r6S0MTSMSF6xv1iJVPA1BSy', NULL, NULL),
(19, 'Thu Hà', 'thuha@gmail.com', '$2y$10$9YG0gkVCHHl8A1tKfQUQRunTn.q8EvrJAHT4r4zYlj.VrY2TsJ2xm', '87129812', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `vouchers`
--

DROP TABLE IF EXISTS `vouchers`;
CREATE TABLE `vouchers` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `outfit_id` int(11) NOT NULL,
  `code` varchar(50) NOT NULL,
  `discount` int(11) NOT NULL DEFAULT 10,
  `created_at` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `vouchers`
--

INSERT INTO `vouchers` (`id`, `user_id`, `outfit_id`, `code`, `discount`, `created_at`) VALUES
(8, 5, 5, 'LIKE10-O5', 10, '2025-05-20 15:35:46');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `likes`
--
ALTER TABLE `likes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `outfit_id` (`outfit_id`);

--
-- Indexes for table `outfits`
--
ALTER TABLE `outfits`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category_id` (`category_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `vouchers`
--
ALTER TABLE `vouchers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `code` (`code`),
  ADD KEY `vouchers_ibfk_1` (`user_id`),
  ADD KEY `vouchers_ibfk_2` (`outfit_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `likes`
--
ALTER TABLE `likes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=73;

--
-- AUTO_INCREMENT for table `outfits`
--
ALTER TABLE `outfits`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `vouchers`
--
ALTER TABLE `vouchers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `likes`
--
ALTER TABLE `likes`
  ADD CONSTRAINT `likes_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `likes_ibfk_2` FOREIGN KEY (`outfit_id`) REFERENCES `outfits` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `outfits`
--
ALTER TABLE `outfits`
  ADD CONSTRAINT `outfits_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `vouchers`
--
ALTER TABLE `vouchers`
  ADD CONSTRAINT `vouchers_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `vouchers_ibfk_2` FOREIGN KEY (`outfit_id`) REFERENCES `outfits` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
