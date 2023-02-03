-- phpMyAdmin SQL Dump
-- version 5.1.1deb5ubuntu1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Feb 02, 2023 at 07:27 PM
-- Server version: 8.0.32-0ubuntu0.22.04.2
-- PHP Version: 8.1.2-1ubuntu2.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `Property Management`
--

-- --------------------------------------------------------

--
-- Table structure for table `properties`
--

CREATE TABLE `properties` (
  `id` int NOT NULL,
  `user_id` int NOT NULL DEFAULT '1',
  `property_title` varchar(155) NOT NULL,
  `property_description` varchar(155) NOT NULL,
  `property_category` varchar(255) NOT NULL,
  `property_image` varchar(155) NOT NULL,
  `property_tags` varchar(255) NOT NULL,
  `status` int NOT NULL DEFAULT '1',
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modified_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `properties`
--

INSERT INTO `properties` (`id`, `user_id`, `property_title`, `property_description`, `property_category`, `property_image`, `property_tags`, `status`, `created_date`, `modified_date`) VALUES
(1, 1, 'property_title', 'property_description', 'property_category', 'property_image', 'property_tags', 1, '2023-01-31 07:17:51', '2023-02-01 12:45:40'),
(2, 1, 'a', 'a', 'Residential', 'profile.jpg', 'a', 1, '2023-02-01 05:15:00', '2023-02-01 12:45:40'),
(3, 1, 'The home', 'This home is designed by the best achitectures', 'Commercial', 'profile.jpg', '1BHK,South facing,near to market.', 1, '2023-02-01 05:24:23', '2023-02-01 12:45:40'),
(4, 1, 'The home', 'This home is designed by the best achitectures', 'Industrial', 'Sample-png-image-500kb.png', '1BHK,South facing,near to market.', 1, '2023-02-01 06:42:08', '2023-02-01 12:45:40'),
(5, 1, 'The home', 'This home is designed by the best achitectures', 'Industrial', 'Screenshot from 2022-12-01 17-58-27.png', '1BHK,South facing,near to market.', 1, '2023-02-01 06:48:14', '2023-02-01 12:45:40'),
(6, 1, 'TQM', 'web page ', 'Institutional', 'index.jpg', 'c++,php', 1, '2023-02-01 07:18:05', '2023-02-01 07:18:05'),
(7, 1, 'test', 'test', 'Other', 'Screenshot from 2022-11-22 11-08-19.png', 'test', 1, '2023-02-01 10:14:17', '2023-02-01 10:14:17');

-- --------------------------------------------------------

--
-- Table structure for table `property_categories`
--

CREATE TABLE `property_categories` (
  `id` int NOT NULL,
  `category_name` varchar(155) NOT NULL,
  `status` varchar(155) NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modified_date` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `property_comments`
--

CREATE TABLE `property_comments` (
  `id` int NOT NULL,
  `property_id` int NOT NULL,
  `user_id` int NOT NULL,
  `comments` varchar(255) NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modified_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `property_comments`
--

INSERT INTO `property_comments` (`id`, `property_id`, `user_id`, `comments`, `created_date`, `modified_date`) VALUES
(1, 6, 5, 'cool pic\r\n                                                                                    ', '2023-02-02 12:05:36', '2023-02-02 17:35:36'),
(2, 4, 4, 'zdfp,[k', '2023-02-02 13:49:26', '2023-02-02 13:49:26'),
(3, 4, 4, 'zdfp,[k', '2023-02-02 13:49:35', '2023-02-02 13:49:35'),
(4, 4, 4, 'zdfp,[k', '2023-02-02 13:50:13', '2023-02-02 13:50:13'),
(5, 5, 5, 'test', '2023-02-02 13:50:27', '2023-02-02 13:50:27'),
(6, 5, 5, 'test', '2023-02-02 13:50:38', '2023-02-02 13:50:38'),
(7, 1, 1, 'ASD', '2023-02-02 13:54:22', '2023-02-02 13:54:22');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int NOT NULL,
  `email` varchar(155) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `password` varchar(155) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `user_type` int NOT NULL DEFAULT '0',
  `status` int NOT NULL DEFAULT '1',
  `created_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modified_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `token` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `password`, `user_type`, `status`, `created_date`, `modified_date`, `token`) VALUES
(1, 'sakshat@teqmavens.com', '$2y$10$47fV.oV4QBdwll16ACaYwel0z5UnzKRzB1bM2Ew0DaY.f71d0iip.', 1, 0, '2023-01-31 05:56:43', '2023-01-31 06:52:15', ''),
(2, 'jyoti@gmail.com', '$2y$10$IcZRNYXkDsgLgNYbA/eOSOJ4eIUEddBPHAJDS..TpakeRfrM3K5yq', 0, 1, '2023-01-31 08:48:00', '2023-01-31 08:48:00', NULL),
(3, 'ashish@gmail.com', '$2y$10$DsxTLWS22n2YFKihwPMSN.i7ACCKtTl5d4rFcXfg0GOUtEX08h9r2', 0, 0, '2023-01-31 12:20:06', '2023-01-31 12:20:06', NULL),
(4, 'akankshasood72@gmail.com', '$2y$10$Yr5dNOuOIeYldtO23sfnnuyU9ZrwAhz3T9plgIUCo9/aST.CIdkL.', 0, 1, '2023-02-01 07:24:21', '2023-02-01 07:24:21', NULL),
(5, 'test@gmail.com', '$2y$10$w2WUG07pxbjGUQSersLjtucvMxlvyIDMs5e2FdbPcmHOgghhqmq5y', 0, 0, '2023-02-02 05:37:22', '2023-02-02 05:37:22', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users_profile`
--

CREATE TABLE `users_profile` (
  `id` int NOT NULL,
  `user_id` int NOT NULL,
  `first_name` varchar(155) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `last_name` varchar(155) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `contact` varchar(155) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `address` varchar(155) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `profile_image` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modified_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `users_profile`
--

INSERT INTO `users_profile` (`id`, `user_id`, `first_name`, `last_name`, `contact`, `address`, `profile_image`, `created_date`, `modified_date`) VALUES
(1, 1, 'akshat', 'sood', '8219555287', 'V.P.O Sidhbari', 'images.png', '2023-01-31 05:56:43', '2023-01-31 16:42:04'),
(2, 2, 'jyoti', 'kumari', '8219555287', 'nada sahib', 'Screenshot from 2022-12-01 17-58-27.png', '2023-01-31 08:48:00', '2023-01-31 16:42:04'),
(3, 3, 'Ashish', 'rana', '9418552685', 'V.P.O Dari', 'spider.png', '2023-01-31 12:20:06', '2023-01-31 12:20:06'),
(4, 4, 'Akanksha', 'Sood', '9418112985', 'nada sahib', 'spider.png', '2023-02-01 07:24:21', '2023-02-01 07:24:21'),
(5, 5, 'user', 'user', '1234567788', 'test', 'test.png', '2023-02-02 05:37:22', '2023-02-02 05:37:22');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `properties`
--
ALTER TABLE `properties`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `user_id` (`created_date`);

--
-- Indexes for table `property_categories`
--
ALTER TABLE `property_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `property_comments`
--
ALTER TABLE `property_comments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users_profile`
--
ALTER TABLE `users_profile`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `properties`
--
ALTER TABLE `properties`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `property_categories`
--
ALTER TABLE `property_categories`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `property_comments`
--
ALTER TABLE `property_comments`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users_profile`
--
ALTER TABLE `users_profile`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
