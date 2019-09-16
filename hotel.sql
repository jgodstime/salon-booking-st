-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 15, 2019 at 01:06 PM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.3.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hotel`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `email` text NOT NULL,
  `password` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `email`, `password`) VALUES
(2, 'jgodstime10@gmail.com', '2dafbd76b05a71d15db7c91776bb532d996e5ef7');

-- --------------------------------------------------------

--
-- Table structure for table `booking_tbl`
--

CREATE TABLE `booking_tbl` (
  `id` bigint(20) NOT NULL,
  `booking_id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `service_id` int(11) NOT NULL,
  `number_of_room` int(11) NOT NULL,
  `arrival` date NOT NULL,
  `departure` date NOT NULL,
  `amount_payable` int(11) NOT NULL,
  `number_of_days` int(11) NOT NULL,
  `status` varchar(50) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `booking_tbl`
--

INSERT INTO `booking_tbl` (`id`, `booking_id`, `customer_id`, `service_id`, `number_of_room`, `arrival`, `departure`, `amount_payable`, `number_of_days`, `status`, `created_at`) VALUES
(1, 98745, 7, 1, 2, '2019-09-15', '2019-09-16', 80000, 1, 'Pending', '2019-09-15 10:57:45');

-- --------------------------------------------------------

--
-- Table structure for table `customer_tbl`
--

CREATE TABLE `customer_tbl` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL,
  `email` text NOT NULL,
  `phone` text NOT NULL,
  `address` text NOT NULL,
  `password` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer_tbl`
--

INSERT INTO `customer_tbl` (`id`, `name`, `email`, `phone`, `address`, `password`, `created_at`) VALUES
(6, 'John Godstime', 'jgodstime10@yahoo.com', '08166848962', '3 Eberechi Close Woji', '20eef97dcb5090c2cb5261b51db528a86acd6ad7', '2019-09-14 19:49:03'),
(7, 'John Godstime', 'jgodstime10@gmail.com', '08166848962', '3 Eberechi Close Woji', '2dafbd76b05a71d15db7c91776bb532d996e5ef7', '2019-09-14 22:00:37'),
(8, 'John Godstime', 'jgodstime100@gmail.com', '08166848962', '3 Eberechi Close Woji', '2dafbd76b05a71d15db7c91776bb532d996e5ef7', '2019-09-14 22:20:19'),
(9, 'John Godstime', 'jgodstime10s@gmail.com', '08166848962', '3 Eberechi Close Woji', '2dafbd76b05a71d15db7c91776bb532d996e5ef7', '2019-09-14 22:21:58'),
(10, 'John Godstime', 'jgodstime1ss0@gmail.com', '08166848962', '3 Eberechi Close Woji', '2dafbd76b05a71d15db7c91776bb532d996e5ef7', '2019-09-14 22:23:44'),
(11, 'John Godstime', 'jgodstime140@gmail.com', '08166848962', '3 Eberechi Close Woji', '2dafbd76b05a71d15db7c91776bb532d996e5ef7', '2019-09-14 22:25:15'),
(12, 'Sifon Ime', 'sifon@gmail.com', '08166843462', '3 Eberechi Close Woji', '82d878ef021c6d05a16b2cb7face2e32cfe4d421', '2019-09-15 11:06:25');

-- --------------------------------------------------------

--
-- Table structure for table `service_tbl`
--

CREATE TABLE `service_tbl` (
  `id` int(11) NOT NULL,
  `room_name` text NOT NULL,
  `price` int(11) NOT NULL,
  `number_of_room` int(11) NOT NULL,
  `number_of_room_booked` int(11) NOT NULL,
  `description` text NOT NULL,
  `image` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `service_tbl`
--

INSERT INTO `service_tbl` (`id`, `room_name`, `price`, `number_of_room`, `number_of_room_booked`, `description`, `image`, `created_at`) VALUES
(1, 'Delux', 40000, 30, 2, 'A hotel is an establishment that provides lodging paid on a short-term basis. A hotel usually offers guests a full range of accommodations and services, which may include reservations, suites, public dining and banquet facilities, lounge and entertainment ', '441093622513.jpg', '2019-09-15 10:56:35'),
(2, 'Regular', 20000, 40, 0, 'A hotel is an establishment that provides lodging paid on a short-term basis. A hotel usually offers guests a full range of accommodations and services, which may include reservations, suites, public dining and banquet facilities, lounge and entertainment areas, room service, cable television, personal computers, business services, meeting rooms, specialty shops, personal ', '650591082201.jpg', '2019-09-15 10:57:11');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `booking_tbl`
--
ALTER TABLE `booking_tbl`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customer_tbl`
--
ALTER TABLE `customer_tbl`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `service_tbl`
--
ALTER TABLE `service_tbl`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `booking_tbl`
--
ALTER TABLE `booking_tbl`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `customer_tbl`
--
ALTER TABLE `customer_tbl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `service_tbl`
--
ALTER TABLE `service_tbl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
