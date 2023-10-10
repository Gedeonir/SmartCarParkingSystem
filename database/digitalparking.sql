-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 24, 2023 at 05:57 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.0.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `digitalparking`
--

-- --------------------------------------------------------

--
-- Table structure for table `account`
--

CREATE TABLE `account` (
  `account_id` int(10) NOT NULL,
  `client_id` int(10) NOT NULL,
  `balance` double NOT NULL DEFAULT 0,
  `update_date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `account`
--

INSERT INTO `account` (`account_id`, `client_id`, `balance`, `update_date`) VALUES
(13, 26, 9606.666666667, '2023-01-24 10:43:09'),
(14, 27, 1000, '2023-01-24 18:55:24');

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(10) NOT NULL,
  `firstname` varchar(100) NOT NULL,
  `lastname` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `email` varchar(150) NOT NULL,
  `phone_no` varchar(20) NOT NULL,
  `password` varchar(100) NOT NULL,
  `admin_role` varchar(150) NOT NULL,
  `date_created` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `firstname`, `lastname`, `username`, `email`, `phone_no`, `password`, `admin_role`, `date_created`) VALUES
(4, 'IRAFASHA ', 'Gedeon', 'Gedeon', 'irafasha.jedy12@gmail.com', '0780689938', '$2a$04$UWBQnfv8SSBUvk9sEFUT/uN/mtB1zSryfRXkpZpnNqq3FrtR2k1PW', 'Admin', '2023-01-17 10:14:01');

-- --------------------------------------------------------

--
-- Table structure for table `booking`
--

CREATE TABLE `booking` (
  `bk_id` int(10) NOT NULL,
  `owner_id` int(10) NOT NULL,
  `veh_id` int(10) NOT NULL,
  `parkingId` int(11) NOT NULL,
  `parkingName` varchar(255) NOT NULL,
  `space_id` int(10) NOT NULL,
  `bk_status` varchar(25) NOT NULL,
  `expire_at` varchar(255) NOT NULL,
  `bk_date` timestamp NULL DEFAULT current_timestamp(),
  `in_date` varchar(30) NOT NULL,
  `lv_date` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `booking`
--

INSERT INTO `booking` (`bk_id`, `owner_id`, `veh_id`, `parkingId`, `parkingName`, `space_id`, `bk_status`, `expire_at`, `bk_date`, `in_date`, `lv_date`) VALUES
(77, 26, 25, 7, 'Test Parking', 25, 'Expired', '2023-01-24 14:30:00', '2023-01-24 10:33:54', '2023-01-24 15:00:00', '2023-01-24 16:15:23'),
(78, 26, 25, 7, 'Test Parking', 24, 'paid', '2023-01-24 14:10:00', '2023-01-24 11:13:01', '2023-01-24 14:00:00', '2023-01-24 16:14:18');

-- --------------------------------------------------------

--
-- Table structure for table `client`
--

CREATE TABLE `client` (
  `client_id` int(10) NOT NULL,
  `firstname` varchar(100) NOT NULL,
  `lastname` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `phone_no` varchar(20) NOT NULL,
  `email` varchar(150) NOT NULL,
  `password` varchar(100) NOT NULL,
  `address` varchar(200) NOT NULL,
  `card_number` varchar(100) NOT NULL DEFAULT 'None',
  `role` varchar(255) NOT NULL,
  `status` int(5) NOT NULL DEFAULT 1,
  `date_created` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `client`
--

INSERT INTO `client` (`client_id`, `firstname`, `lastname`, `username`, `phone_no`, `email`, `password`, `address`, `card_number`, `role`, `status`, `date_created`) VALUES
(26, 'Hagenimana', 'Jean Luc', 'muzafaru@gmail.com', '0788468860', 'muzafaru@gmail.com', '15047', 'Gitega', '26c063fa7f', 'parkingOwner', 1, '2023-01-24 10:43:09'),
(27, 'Irafasha', 'Gedeon', 'Gedeon', '0780689938', 'irafasha.jedy12@gmail.com', '43931', 'Muhanga', '1234', 'Driver', 1, '2023-01-24 18:55:24');

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `msg_id` int(10) NOT NULL,
  `msg_text` text NOT NULL,
  `sender` int(10) NOT NULL,
  `recipient` int(10) NOT NULL,
  `msg_type` varchar(35) NOT NULL,
  `msg_status` varchar(25) NOT NULL,
  `msg_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `parkings`
--

CREATE TABLE `parkings` (
  `parkingId` int(11) NOT NULL,
  `parkingName` varchar(255) NOT NULL,
  `parkingLocation` varchar(255) NOT NULL,
  `ownerID` int(11) NOT NULL,
  `parkingOwner` varchar(255) NOT NULL,
  `carCategories` varchar(255) NOT NULL,
  `pricePerHour` varchar(255) NOT NULL,
  `dateJoined` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `parkings`
--

INSERT INTO `parkings` (`parkingId`, `parkingName`, `parkingLocation`, `ownerID`, `parkingOwner`, `carCategories`, `pricePerHour`, `dateJoined`) VALUES
(7, 'Test Parking', 'UR-CST', 26, 'muzafaru@gmail.com', 'Small', '400', '2023-01-24 09:15:59');

-- --------------------------------------------------------

--
-- Table structure for table `parking_spaces`
--

CREATE TABLE `parking_spaces` (
  `space_id` int(10) NOT NULL,
  `space_code` varchar(10) NOT NULL,
  `space_size` varchar(25) NOT NULL,
  `space_level` varchar(25) NOT NULL COMMENT 'Price depends on this field',
  `parkingId` int(11) NOT NULL,
  `availability` int(2) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `parking_spaces`
--

INSERT INTO `parking_spaces` (`space_id`, `space_code`, `space_size`, `space_level`, `parkingId`, `availability`) VALUES
(24, 'PK-57506', 'Large', 'Normal', 7, 1),
(25, 'PK-61166', 'Large', 'Normal', 7, 1);

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `py_id` int(10) NOT NULL,
  `py_amount` double NOT NULL,
  `duration` varchar(30) NOT NULL,
  `client_id` int(10) NOT NULL,
  `veh_id` int(10) NOT NULL,
  `py_date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `vehicles`
--

CREATE TABLE `vehicles` (
  `veh_id` int(10) NOT NULL,
  `veh_name` varchar(100) NOT NULL,
  `veh_model` varchar(100) NOT NULL,
  `veh_size` varchar(100) NOT NULL,
  `veh_plateno` varchar(10) NOT NULL,
  `veh_owner` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `vehicles`
--

INSERT INTO `vehicles` (`veh_id`, `veh_name`, `veh_model`, `veh_size`, `veh_plateno`, `veh_owner`) VALUES
(25, '600', 'Toyota', 'Small', 'RAB 902 C', 26);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `account`
--
ALTER TABLE `account`
  ADD PRIMARY KEY (`account_id`),
  ADD KEY `client_id` (`client_id`);

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `booking`
--
ALTER TABLE `booking`
  ADD PRIMARY KEY (`bk_id`),
  ADD KEY `owner_id` (`owner_id`),
  ADD KEY `veh_id` (`veh_id`),
  ADD KEY `space_id` (`space_id`);

--
-- Indexes for table `client`
--
ALTER TABLE `client`
  ADD PRIMARY KEY (`client_id`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`msg_id`),
  ADD KEY `sender` (`sender`),
  ADD KEY `recipient` (`recipient`);

--
-- Indexes for table `parkings`
--
ALTER TABLE `parkings`
  ADD PRIMARY KEY (`parkingId`);

--
-- Indexes for table `parking_spaces`
--
ALTER TABLE `parking_spaces`
  ADD PRIMARY KEY (`space_id`),
  ADD KEY `parkingId` (`parkingId`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`py_id`),
  ADD KEY `client_id` (`client_id`),
  ADD KEY `veh_id` (`veh_id`);

--
-- Indexes for table `vehicles`
--
ALTER TABLE `vehicles`
  ADD PRIMARY KEY (`veh_id`),
  ADD KEY `veh_owner` (`veh_owner`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `account`
--
ALTER TABLE `account`
  MODIFY `account_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `booking`
--
ALTER TABLE `booking`
  MODIFY `bk_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=80;

--
-- AUTO_INCREMENT for table `client`
--
ALTER TABLE `client`
  MODIFY `client_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `msg_id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `parkings`
--
ALTER TABLE `parkings`
  MODIFY `parkingId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `parking_spaces`
--
ALTER TABLE `parking_spaces`
  MODIFY `space_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `py_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `vehicles`
--
ALTER TABLE `vehicles`
  MODIFY `veh_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `account`
--
ALTER TABLE `account`
  ADD CONSTRAINT `account_ibfk_1` FOREIGN KEY (`client_id`) REFERENCES `client` (`client_id`);

--
-- Constraints for table `booking`
--
ALTER TABLE `booking`
  ADD CONSTRAINT `booking_ibfk_1` FOREIGN KEY (`owner_id`) REFERENCES `client` (`client_id`),
  ADD CONSTRAINT `booking_ibfk_2` FOREIGN KEY (`veh_id`) REFERENCES `vehicles` (`veh_id`),
  ADD CONSTRAINT `booking_ibfk_3` FOREIGN KEY (`space_id`) REFERENCES `parking_spaces` (`space_id`);

--
-- Constraints for table `messages`
--
ALTER TABLE `messages`
  ADD CONSTRAINT `messages_ibfk_1` FOREIGN KEY (`sender`) REFERENCES `client` (`client_id`),
  ADD CONSTRAINT `messages_ibfk_2` FOREIGN KEY (`recipient`) REFERENCES `admin` (`admin_id`);

--
-- Constraints for table `payment`
--
ALTER TABLE `payment`
  ADD CONSTRAINT `payment_ibfk_1` FOREIGN KEY (`client_id`) REFERENCES `client` (`client_id`),
  ADD CONSTRAINT `payment_ibfk_2` FOREIGN KEY (`veh_id`) REFERENCES `vehicles` (`veh_id`);

--
-- Constraints for table `vehicles`
--
ALTER TABLE `vehicles`
  ADD CONSTRAINT `vehicles_ibfk_1` FOREIGN KEY (`veh_owner`) REFERENCES `client` (`client_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
