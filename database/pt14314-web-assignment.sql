-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 08, 2020 at 05:13 AM
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
-- Database: `pt14314-web-assignment`
--

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

CREATE TABLE `brands` (
  `id` int(11) NOT NULL,
  `brand_name` varchar(255) NOT NULL,
  `logo` varchar(255) NOT NULL,
  `country` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`id`, `brand_name`, `logo`, `country`, `created_at`, `updated_at`) VALUES
(1, 'BMW', 'public/images/5e64682c4ba1c-b.png', 'Việt Nam', '2020-03-08 03:36:12', '2020-03-07 21:36:12'),
(3, 'lexus', 'public/images/5e64684ddca1b-Lexus-logo-3.png', 'Nhật Bản', '2020-03-08 03:36:45', '2020-03-07 21:36:45'),
(4, 'Kiamorning', 'public/images/5e6468568b7fc-kia.jpg', 'Hàn Quốc', '2020-03-08 03:36:54', '2020-03-07 21:36:54'),
(5, 'Toyota', 'public/images/5e64687b2a10d-t.jpg', 'Nhật Bản', '2020-03-08 03:37:31', '2020-03-07 21:37:31');

-- --------------------------------------------------------

--
-- Table structure for table `cars`
--

CREATE TABLE `cars` (
  `id` int(11) NOT NULL,
  `brand_id` int(11) NOT NULL,
  `model_name` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `price` int(11) NOT NULL,
  `sale_price` int(11) NOT NULL,
  `detail` text NOT NULL,
  `quantity` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `cars`
--

INSERT INTO `cars` (`id`, `brand_id`, `model_name`, `image`, `price`, `sale_price`, `detail`, `quantity`, `created_at`, `updated_at`) VALUES
(6, 1, 'SUV 5', 'public/images/5e6468b4192c2-1.jpg', 100500300, 100500300, 'Xe đẹp', 500, NULL, '2020-03-07 21:41:28'),
(8, 1, 'Crossover', 'public/images/5e646990b2798-2.jpg', 1400400, 1300000, 'Xe Đẹp', 400, NULL, '2020-03-07 21:42:08'),
(9, 1, 'MPV ', 'public/images/5e6469b3862ee-3.jpg', 1003000, 2000000, 'Xe đẹp', 500, NULL, '2020-03-07 21:43:23'),
(11, 1, 'Minivan', 'public/images/5e6469d4259a3-4.jpg', 200400, 3000000, 'Xe hay', 600, '2020-03-07 19:49:06', '2020-03-07 21:43:16'),
(12, 1, 'Pickup', 'public/images/5e6469ff72b8c-5.jpg', 1003000, 4000000, 'Xe đẹp', 100, '2020-03-07 20:28:36', '2020-03-07 21:43:59');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cars`
--
ALTER TABLE `cars`
  ADD PRIMARY KEY (`id`),
  ADD KEY `brand_id` (`brand_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `cars`
--
ALTER TABLE `cars`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cars`
--
ALTER TABLE `cars`
  ADD CONSTRAINT `cars_ibfk_1` FOREIGN KEY (`brand_id`) REFERENCES `brands` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
