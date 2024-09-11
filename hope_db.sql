-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 11, 2024 at 03:39 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hope_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `orphanage_tbl`
--

CREATE TABLE `orphanage_tbl` (
  `id` int(11) NOT NULL,
  `orphanage_id` int(255) NOT NULL,
  `orphanage_name` varchar(255) NOT NULL,
  `orphanage_category` varchar(255) NOT NULL,
  `orphanage_image` varchar(255) NOT NULL,
  `orphanage_location` varchar(255) NOT NULL,
  `status` int(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orphanage_tbl`
--

INSERT INTO `orphanage_tbl` (`id`, `orphanage_id`, `orphanage_name`, `orphanage_category`, `orphanage_image`, `orphanage_location`, `status`) VALUES
(1, 15, 'Guru1', 'Child', 'hong-kong.jpg', 'Chennai', 0);

-- --------------------------------------------------------

--
-- Table structure for table `user_tbl`
--

CREATE TABLE `user_tbl` (
  `id` int(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `category` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_tbl`
--

INSERT INTO `user_tbl` (`id`, `username`, `email`, `password`, `category`, `created_at`) VALUES
(2, 'Vijay', 'vijay@gmail.com', '8cb2237d0679ca88db6464eac60da96345513964', 'Public', '2024-09-09 14:04:18'),
(3, 'sdfsd', 'guru@gmail.com', 'f2231d2871e690a2995704f7a297bd7bc64be720', 'Orphanage', '2024-09-09 14:05:02'),
(4, 'Charan', 'charan@gmail.com', 'c0c9eebb165f17afea81096e16122d63b436ad94', 'Public', '2024-09-09 14:21:02'),
(6, 'Siva Kumar', 'suriya@gmail.com', 'f2231d2871e690a2995704f7a297bd7bc64be720', 'Orphanage', '2024-09-09 14:24:36'),
(7, 'Suriya1', 'guru@gmail.com', 'f2231d2871e690a2995704f7a297bd7bc64be720', 'Orphanage', '2024-09-09 14:25:35'),
(8, 'Suriya13', 'sdfsd@gmail.com', '12885e49658fb91d32afce828d265561f0fdf94d', 'Orphanage', '2024-09-09 14:27:05'),
(9, 'Gnana Guru', 'sdfsd@gmail.com', '433671f1c841b3017738434578500dc92f91c73a', 'Orphanage', '2024-09-09 14:28:44'),
(10, 'Soori', 'soori@gmail.com', 'a1872e333d0e52644f6125da2276530f7ebe5e77', 'Orphanage', '2024-09-09 14:51:43'),
(11, 'Suriya15', 'soori@gmail.com', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220', 'Orphanage', '2024-09-09 14:58:33'),
(12, 'Suriya16', 'soori@gmail.com', '433671f1c841b3017738434578500dc92f91c73a', 'Orphanage', '2024-09-09 15:02:12'),
(13, 'Suriya55', 'suriya@gmail.com', '12885e49658fb91d32afce828d265561f0fdf94d', 'Orphanage', '2024-09-09 15:04:02'),
(14, 'Suriya167', 'soori@gmail.com', 'c0c9eebb165f17afea81096e16122d63b436ad94', 'Orphanage', '2024-09-09 15:05:26'),
(15, 'guru1', 'guru@gmail.com', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220', 'Orphanage', '2024-09-09 15:06:53');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `orphanage_tbl`
--
ALTER TABLE `orphanage_tbl`
  ADD PRIMARY KEY (`id`),
  ADD KEY `orphanage_id` (`orphanage_id`);

--
-- Indexes for table `user_tbl`
--
ALTER TABLE `user_tbl`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `orphanage_tbl`
--
ALTER TABLE `orphanage_tbl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `user_tbl`
--
ALTER TABLE `user_tbl`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `orphanage_tbl`
--
ALTER TABLE `orphanage_tbl`
  ADD CONSTRAINT `orphanage_tbl_ibfk_1` FOREIGN KEY (`orphanage_id`) REFERENCES `user_tbl` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
