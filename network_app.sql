-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 08, 2023 at 01:52 PM
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
-- Database: `network_app`
--

-- --------------------------------------------------------

--
-- Table structure for table `activation`
--

CREATE TABLE `activation` (
  `id` int(11) NOT NULL,
  `plan_names` varchar(50) NOT NULL,
  `gen_code` varchar(50) NOT NULL,
  `status` varchar(15) NOT NULL DEFAULT 'no'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `members`
--

CREATE TABLE `members` (
  `id` int(11) NOT NULL,
  `first_name` varchar(150) NOT NULL,
  `last_name` varchar(150) NOT NULL,
  `email_addr` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `ref_code` int(11) NOT NULL,
  `my_ref_code` int(11) NOT NULL,
  `act_code` int(11) NOT NULL,
  `account_act` int(11) NOT NULL DEFAULT 0,
  `created_date` varchar(30) NOT NULL,
  `ref_bonus` float NOT NULL,
  `purchase_bonus` float NOT NULL,
  `upgrade_bonus` float NOT NULL,
  `pairing_bonus` float NOT NULL,
  `stockish_comm` float NOT NULL,
  `pv` int(11) NOT NULL,
  `phone_number` varchar(30) NOT NULL,
  `username` varchar(100) NOT NULL,
  `plans_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `members`
--

INSERT INTO `members` (`id`, `first_name`, `last_name`, `email_addr`, `password`, `ref_code`, `my_ref_code`, `act_code`, `account_act`, `created_date`, `ref_bonus`, `purchase_bonus`, `upgrade_bonus`, `pairing_bonus`, `stockish_comm`, `pv`, `phone_number`, `username`, `plans_id`) VALUES
(10, 'edwin', 'eke', 'edwineke25@gmail.com', '7b21848ac9af35be0ddb2d6b9fc3851934db8420', 0, 3347789, 0, 0, '', 0, 0, 0, 0, 0, 0, '', '', 0),
(11, 'godsent', 'lom', 'godsent@mail.com', '7b21848ac9af35be0ddb2d6b9fc3851934db8420', 0, 4584927, 0, 0, '', 0, 0, 0, 0, 0, 0, '', '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `network`
--

CREATE TABLE `network` (
  `id` int(11) NOT NULL,
  `u1` int(11) NOT NULL,
  `u2` int(11) NOT NULL,
  `u3` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `activation`
--
ALTER TABLE `activation`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `members`
--
ALTER TABLE `members`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `network`
--
ALTER TABLE `network`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `activation`
--
ALTER TABLE `activation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `members`
--
ALTER TABLE `members`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `network`
--
ALTER TABLE `network`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
