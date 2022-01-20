-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jan 20, 2022 at 08:11 PM
-- Server version: 8.0.27-0ubuntu0.20.04.1
-- PHP Version: 7.4.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `codeigniterinterview`
--

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int NOT NULL,
  `title` varchar(200) DEFAULT NULL,
  `description` text,
  `image` varchar(200) DEFAULT NULL,
  `status` enum('active','inactive') CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `timestamps` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `title`, `description`, `image`, `status`, `timestamps`) VALUES
(1, 'prod1', 'prod1', '1', 'active', '2022-01-20 03:08:55'),
(2, 'prod2', 'prod2', '1', 'active', '2022-01-20 03:08:55'),
(3, 'prod3', 'prod3', '1', 'inactive', '2022-01-20 03:08:55'),
(4, 'prod4', 'prod4', '1', 'active', '2022-01-20 03:08:55');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int NOT NULL,
  `firstname` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `lastname` varchar(200) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `password` varchar(200) DEFAULT NULL,
  `role` enum('admin','user') CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT 'admin',
  `updated_at` datetime DEFAULT NULL,
  `isverified` tinyint(1) DEFAULT '0',
  `is_active` tinyint(1) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `firstname`, `lastname`, `email`, `password`, `role`, `updated_at`, `isverified`, `is_active`) VALUES
(1, 'kevin', 'gates', 'kevinobamatheus@gmail.com', '21218cca77804d2ba1922c33e0151105', 'admin', '2022-01-20 10:46:28', 1, 1),
(2, 'kevin1', 'gates', 'billgates@gmail.com', '21218cca77804d2ba1922c33e0151105', 'user', '2022-01-20 10:46:28', 1, 1),
(3, 'kevin2', 'gates', 'billgates@gmail.com', '21218cca77804d2ba1922c33e0151105', 'admin', '2022-01-20 10:46:28', 0, 0),
(4, 'kevin', 'gates', 'billgates@gmail.com', '21218cca77804d2ba1922c33e0151105', 'admin', '2022-01-20 10:46:30', 1, 1),
(5, 'kevin', 'gates', 'billgates@gmail.com', '21218cca77804d2ba1922c33e0151105', 'admin', '2022-01-20 10:46:48', 0, 0),
(6, 'kevin', 'gates', 'billgates@gmail.com', '21218cca77804d2ba1922c33e0151105', 'admin', '2022-01-20 10:46:48', 0, 0),
(7, 'kevin', 'gates', 'billgates@gmail.com', '21218cca77804d2ba1922c33e0151105', 'user', '2022-01-20 10:46:48', 1, 1),
(8, 'kevin', 'gates', 'billgates@gmail.com', '21218cca77804d2ba1922c33e0151105', 'user', '2022-01-20 10:46:48', 0, 1),
(9, 'kevin', 'gates', 'billgates@gmail.com', '21218cca77804d2ba1922c33e0151105', 'user', '2022-01-20 10:46:48', 1, 1),
(10, 'kevin', 'gates', 'zhou224466@hotmail.com', '21218cca77804d2ba1922c33e0151105', 'user', '2022-01-20 19:20:41', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `user_products`
--

CREATE TABLE `user_products` (
  `id` int NOT NULL,
  `user_id` int DEFAULT NULL,
  `productid` int DEFAULT NULL,
  `quantity` int DEFAULT NULL,
  `price` decimal(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `user_products`
--

INSERT INTO `user_products` (`id`, `user_id`, `productid`, `quantity`, `price`) VALUES
(1, 1, 1, 3, '2.00'),
(2, 1, 2, 2, '33.00'),
(3, 2, 2, 7, '44.00'),
(4, 2, 3, 4, '55.00'),
(5, 10, 3, 4, '55.00'),
(6, 10, 3, 4, '55.00'),
(7, 10, 1, 1, '1.00'),
(8, 10, 1, 1, '1.00'),
(9, 10, 1, 1, '1.00'),
(10, 10, 1, 1, '1.00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_products`
--
ALTER TABLE `user_products`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `user_products`
--
ALTER TABLE `user_products`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
