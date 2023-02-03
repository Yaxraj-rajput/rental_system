-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 03, 2023 at 12:04 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `house-rental`
--

-- --------------------------------------------------------

--
-- Table structure for table `details`
--

CREATE TABLE `details` (
  `id` int(11) NOT NULL,
  `images` varchar(255) NOT NULL,
  `proid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `details`
--

INSERT INTO `details` (`id`, `images`, `proid`) VALUES
(1, '3-118.jpg', 1),
(2, 'Screenshot (9).png', 2);

-- --------------------------------------------------------

--
-- Table structure for table `owners`
--

CREATE TABLE `owners` (
  `id` int(11) NOT NULL,
  `ownername` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `owners`
--

INSERT INTO `owners` (`id`, `ownername`, `email`, `password`) VALUES
(15, 'yaxraj', 'yaxrajd@gmail.com', '202cb962ac59075b964b07152d234b70'),
(16, 'suresh reyna', 'suresh@gmail.com', '202cb962ac59075b964b07152d234b70');

-- --------------------------------------------------------

--
-- Table structure for table `properties`
--

CREATE TABLE `properties` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `monthly` varchar(100) NOT NULL,
  `city` varchar(50) NOT NULL DEFAULT 'UNKNOWN',
  `address` varchar(255) NOT NULL,
  `loclink` varchar(1000) NOT NULL DEFAULT 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3720.17651101476!2d72.86082255088682!3d21.185145937727054!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3be04fb7598e7361%3A0x7ac2b71a95f16bc2!2sNeminath%20Nagar%2C%20Neminath%20Nagar%20Society%2C%20Limbayat%2C%20Surat%2C%20Gujarat%20395101!5e0!3m2!1sen!2sin!4v1671889593180!5m2!1sen!2sin',
  `access` varchar(100) NOT NULL,
  `floor` varchar(100) NOT NULL,
  `bhk` int(23) NOT NULL DEFAULT 0,
  `ownername` varchar(200) NOT NULL DEFAULT 'NO DATA',
  `utility` varchar(255) NOT NULL,
  `descrip` text NOT NULL,
  `status` varchar(256) DEFAULT NULL,
  `images` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `properties`
--

INSERT INTO `properties` (`id`, `name`, `monthly`, `city`, `address`, `loclink`, `access`, `floor`, `bhk`, `ownername`, `utility`, `descrip`, `status`, `images`) VALUES
(1, 'Wow a house2', '12', 'Navsari', 'same', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3549.400402078647!2d78.03994815096206!3d27.175149555200708!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x39747121d702ff6d%3A0xdd2ae4803f767dde!2sTaj%20Mahal!5e0!3m2!1sen!2sin!4v1671963245265!5m2!1sen!2sin', 'GAREEB', '124', 2, 'yaxraj', 'AC, TV, FRIDGE', 'sdsd', 'sold', 'bg.png'),
(2, 'A house', '1234', 'Jamnagar', 'aman bhai ke ghar ke andar', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3719.7375846592818!2d72.78588325095414!3d21.20258098712725!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3be04c316a37569d%3A0xa28dae28eba48ae9!2sHoney%20Park%20Rd%2C%20Adajan%20Gam%2C%20Adajan%2C%20Surat%2C%20Gujarat%20395009!5e0!3m2!1sen!2sin!4v1675342982856!5m2!1sen!2sin', 'GAREEB', '123', 2, 'suresh reyna', 'TABELO, BAJU MAI RAILWAY PHATAK ', 'sadasdasd', 'available', 'Screenshot (6).png');

-- --------------------------------------------------------

--
-- Table structure for table `request_property`
--

CREATE TABLE `request_property` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `prop_id` int(100) DEFAULT NULL,
  `phone` int(100) NOT NULL,
  `email` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `offer_price` int(100) NOT NULL,
  `user_id` varchar(255) NOT NULL,
  `descrip` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `request_property`
--

INSERT INTO `request_property` (`id`, `name`, `prop_id`, `phone`, `email`, `address`, `offer_price`, `user_id`, `descrip`) VALUES
(20, 'yaxraj', 1, 45455454, 'yaxrajd@gmail.com', 'dsadsd', 12, '18', 'asdasd');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`) VALUES
(18, 'yaxraj', 'yaxrajd@gmail.com', '202cb962ac59075b964b07152d234b70');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `details`
--
ALTER TABLE `details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `owners`
--
ALTER TABLE `owners`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `properties`
--
ALTER TABLE `properties`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `request_property`
--
ALTER TABLE `request_property`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `details`
--
ALTER TABLE `details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `owners`
--
ALTER TABLE `owners`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `properties`
--
ALTER TABLE `properties`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `request_property`
--
ALTER TABLE `request_property`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
