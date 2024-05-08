-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 05, 2023 at 09:58 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hrms`
--

-- --------------------------------------------------------

--
-- Table structure for table `book`
--

CREATE TABLE `book` (
  `bookid` int(100) NOT NULL,
  `roomtype` varchar(100) NOT NULL,
  `roomno` varchar(100) NOT NULL,
  `checkindate` date NOT NULL,
  `checkoutdate` date NOT NULL,
  `cost` int(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `phoneno` varchar(100) NOT NULL,
  `idtype` varchar(100) NOT NULL,
  `idnumber` varchar(100) NOT NULL,
  `checkedin` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `book`
--

INSERT INTO `book` (`bookid`, `roomtype`, `roomno`, `checkindate`, `checkoutdate`, `cost`, `name`, `phoneno`, `idtype`, `idnumber`, `checkedin`) VALUES
(15, 'Single Bedroom (Non-AC)', '101', '2023-11-04', '2023-11-05', 800, 'Aaradhya', '6289338520', 'Aadhar', '123456789012', 'checkedout'),
(16, 'Double Bedroom (Non-AC)', '105D', '2023-11-06', '2023-11-07', 1200, 'Adah', '6916684896', 'Aadhar', '123456789012', 'false'),
(17, 'Single Bedroom (AC + WiFi)', '108AC', '2023-11-08', '2023-11-09', 1000, 'Alisha', '9354692460', 'Aadhar', '123456789012', 'false'),
(18, 'Double Bedroom (AC + WiFi)', '112DAC', '2023-11-04', '2023-11-05', 1400, 'Avni', '9739789087', 'Aadhar', '123456789012', 'checkedout'),
(19, 'Luxury Bedroom (AC + Fridge + WiFi)', '116LB', '2023-11-03', '2023-11-04', 4000, 'Drishti', '7134689167', 'Aadhar', '123456789012', 'checkedout'),
(20, 'Single Bedroom (Non-AC)', '102', '2023-11-04', '2023-11-05', 800, 'Eshika', '9136124487', 'Aadhar', '123456789012', 'checkedout'),
(21, 'Single Bedroom (AC + WiFi)', '109AC', '2023-11-05', '2023-11-06', 1000, 'Hiya', '8039440120', 'Aadhar', '123456789012', 'true'),
(22, 'Double Bedroom (AC + WiFi)', '114DAC', '2023-11-16', '2023-11-17', 1400, 'Ishita', '6914260710', 'Aadhar', '123456789012', 'false'),
(23, 'Single Bedroom (Non-AC)', '101', '2023-11-05', '2023-11-06', 800, 'Larisa', '6914260710', 'Aadhar', '123456789012', 'false'),
(24, 'Single Bedroom (Non-AC)', '102', '2023-11-04', '2023-11-08', 3200, 'Laasya', '7488228125', 'Aadhar', '123456789012', 'true');

-- --------------------------------------------------------

--
-- Table structure for table `complaints`
--

CREATE TABLE `complaints` (
  `no` int(100) NOT NULL,
  `roomno` varchar(100) NOT NULL,
  `complaint` varchar(1000) NOT NULL,
  `cdate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `complaints`
--

INSERT INTO `complaints` (`no`, `roomno`, `complaint`, `cdate`) VALUES
(8, '108AC', 'AC not working', '2023-11-04'),
(9, '116LB', 'Geyser not working', '2023-11-04');

-- --------------------------------------------------------

--
-- Table structure for table `manager`
--

CREATE TABLE `manager` (
  `phno` varchar(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `manager`
--

INSERT INTO `manager` (`phno`, `name`, `password`) VALUES
('6289717384', 'Supriyo Saha', '9474');

-- --------------------------------------------------------

--
-- Table structure for table `room`
--

CREATE TABLE `room` (
  `no` varchar(100) NOT NULL,
  `type` varchar(100) NOT NULL,
  `floor` int(100) NOT NULL,
  `cond` varchar(100) NOT NULL,
  `rate` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `room`
--

INSERT INTO `room` (`no`, `type`, `floor`, `cond`, `rate`) VALUES
('101', 'Single Bedroom (Non-AC)', 1, 'Usable', 800),
('102', 'Single Bedroom (Non-AC)', 1, 'Usable', 800),
('103', 'Single Bedroom (Non-AC)', 1, 'Usable', 800),
('104', 'Single Bedroom (Non-AC)', 1, 'Usable', 800),
('105D', 'Double Bedroom (Non-AC)', 2, 'Usable', 1200),
('106D', 'Double Bedroom (Non-AC)', 2, 'Usable', 1200),
('107D', 'Double Bedroom (Non-AC)', 2, 'Usable', 1200),
('108AC', 'Single Bedroom (AC + WiFi)', 3, 'Usable', 1000),
('109AC', 'Single Bedroom (AC + WiFi)', 3, 'Usable', 1000),
('110AC', 'Single Bedroom (AC + WiFi)', 3, 'Usable', 1000),
('111AC', 'Single Bedroom (AC + WiFi)', 3, 'Usable', 1000),
('112DAC', 'Double Bedroom (AC + WiFi)', 4, 'Usable', 1400),
('114DAC', 'Double Bedroom (AC + WiFi)', 4, 'Usable', 1400),
('115DAC', 'Double Bedroom (AC + WiFi)', 4, 'Usable', 1400),
('116LB', 'Luxury Bedroom (AC + Fridge + WiFi)', 5, 'Usable', 2000),
('117LB', 'Luxury Bedroom (AC + Fridge + WiFi)', 5, 'Usable', 2000);

-- --------------------------------------------------------

--
-- Table structure for table `staff`
--

CREATE TABLE `staff` (
  `id` varchar(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `designation` varchar(100) NOT NULL,
  `joining date` date NOT NULL,
  `salary` int(100) NOT NULL,
  `phno` varchar(100) NOT NULL,
  `address` varchar(1000) NOT NULL,
  `id type` varchar(100) NOT NULL,
  `id number` varchar(100) NOT NULL,
  `status` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `staff`
--

INSERT INTO `staff` (`id`, `name`, `designation`, `joining date`, `salary`, `phno`, `address`, `id type`, `id number`, `status`) VALUES
('01', 'Sukumar Roy', 'Cleaning Staff', '2023-11-04', 8000, '9836361023', '33 Gurudas Road, Kolkata - 700015', 'Aadhar', '639925893660', 'Working');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `book`
--
ALTER TABLE `book`
  ADD PRIMARY KEY (`bookid`);

--
-- Indexes for table `complaints`
--
ALTER TABLE `complaints`
  ADD PRIMARY KEY (`no`);

--
-- Indexes for table `manager`
--
ALTER TABLE `manager`
  ADD PRIMARY KEY (`phno`);

--
-- Indexes for table `room`
--
ALTER TABLE `room`
  ADD PRIMARY KEY (`no`);

--
-- Indexes for table `staff`
--
ALTER TABLE `staff`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `book`
--
ALTER TABLE `book`
  MODIFY `bookid` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `complaints`
--
ALTER TABLE `complaints`
  MODIFY `no` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
