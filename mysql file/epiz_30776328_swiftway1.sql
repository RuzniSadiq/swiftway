-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: sql308.byetcluster.com
-- Generation Time: Jun 21, 2022 at 10:13 AM
-- Server version: 10.3.27-MariaDB
-- PHP Version: 7.2.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `epiz_30776328_swiftway1`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `ad_id` int(11) NOT NULL,
  `ad_name` varchar(100) NOT NULL,
  `ad_email` varchar(100) NOT NULL,
  `ad_username` varchar(100) NOT NULL,
  `ad_password` varchar(100) NOT NULL,
  `ad_gender` varchar(100) DEFAULT NULL,
  `ad_profileimg` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`ad_id`, `ad_name`, `ad_email`, `ad_username`, `ad_password`, `ad_gender`, `ad_profileimg`) VALUES
(1, 'Gambit', 'safras@gmail.com', 'admin', 'admin123', 'Male', 'IMG-60d214966b03c2.38486351.jpg'),
(2, 'Maggie', 'maggie@gmail.com', 'maggie', 'maggie123', 'Female', 'IMG-60d5d1af8a0277.06085880.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `cus_id` int(11) NOT NULL,
  `cus_name` varchar(100) NOT NULL,
  `cus_email` varchar(100) NOT NULL,
  `cus_gender` varchar(100) DEFAULT NULL,
  `cus_username` varchar(100) DEFAULT NULL,
  `cus_password` varchar(100) NOT NULL,
  `cus_status` varchar(100) NOT NULL DEFAULT 'Active',
  `ad_id` int(11) DEFAULT NULL,
  `cus_profileimg` text DEFAULT NULL,
  `cus_no` int(11) DEFAULT NULL,
  `cus_NICFront` varchar(500) DEFAULT NULL,
  `cus_NICBack` varchar(500) DEFAULT NULL,
  `cus_joineddate` date DEFAULT NULL,
  `cus_nicnum` varchar(100) DEFAULT NULL,
  `cus_travelpoints` double DEFAULT 0,
  `cus_credit` int(11) DEFAULT 0,
  `cus_totalearnedtp` double DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`cus_id`, `cus_name`, `cus_email`, `cus_gender`, `cus_username`, `cus_password`, `cus_status`, `ad_id`, `cus_profileimg`, `cus_no`, `cus_NICFront`, `cus_NICBack`, `cus_joineddate`, `cus_nicnum`, `cus_travelpoints`, `cus_credit`, `cus_totalearnedtp`) VALUES
(1, 'Infy', 'ruznithegambit@gmail.com', 'Male', 'insaaf', 'password123', 'Active', 2, 'IMG-6182dd5302bc00.28177923.jpg', 766167651, 'infy - 1645061633-Capture.jpg', 'infy - 247061633-Capture.jpg', '2021-07-01', '200130000189', 813.6, 1015, 1566.8),
(27, 'Ashmaan', 'metheyoyodude@gmail.com', 'Male', 'ash', 'password123', 'Active', 2, 'IMG-617fb66b773346.78072898.jpg', 755456532, 'ash - 1635928994-sdasd.jpg', 'ash - 98217321309-60b123.jpg', '2021-07-12', '200152001095', 86, 0, 86),
(28, 'Eren Krueger', 'luffy@gmail.com', 'Male', 'eren', 'password123', 'Active', 2, 'IMG-618a379b6aaae6.88620226.jpg', 722024718, 'eren - 1632238395-Architecture-1024x584 (1).jpg', 'eren - 2131232b-23432423.jpg', '2021-07-20', '199867800144V', 55, 0, 123),
(42, 'Serena', 'keke@gmail.com', 'Male', 'serena42', 'password123', 'Pending', NULL, NULL, 766765432, '1627061633-Capture.jpg', '1627061633-60b8d3f81b3d4.jpg', '2021-08-03', '199536700189V', NULL, NULL, NULL),
(43, 'Levi', 'lol@hotmail.com', 'Male', 'levilevi', 'password123', 'Blocked', 2, NULL, 778321765, '1627062353-Jpg_400x400.jpg', '1627062353-60b8d3f81b3d4.jpg', '2021-08-11', '199909328422V', NULL, NULL, NULL),
(44, 'Mikasa', 'thedude@gmail.com', 'Male', 'lollol', 'password123', 'Active', NULL, NULL, 755643256, 'lollol - 1627063606-Capture.jpg', 'lollol - 1627063606-60b8d3f81b3d4.jpg', '2021-09-14', '199834328249V', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `ticket`
--

CREATE TABLE `ticket` (
  `ti_id` int(11) NOT NULL,
  `ti_fare` int(11) NOT NULL,
  `credits_used` int(11) DEFAULT NULL,
  `ti_totalamnt_paid` int(11) DEFAULT NULL,
  `ti_no_passengers` int(11) NOT NULL,
  `cl_id` int(11) DEFAULT NULL,
  `cus_id` int(11) DEFAULT NULL,
  `ti_payment_type` varchar(100) DEFAULT NULL,
  `ti_status` varchar(100) DEFAULT 'Waiting',
  `ti_payment_status` varchar(500) DEFAULT NULL,
  `ti_reserveddate` date DEFAULT NULL,
  `ti_departuredt` datetime DEFAULT NULL,
  `tr_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ticket`
--

INSERT INTO `ticket` (`ti_id`, `ti_fare`, `credits_used`, `ti_totalamnt_paid`, `ti_no_passengers`, `cl_id`, `cus_id`, `ti_payment_type`, `ti_status`, `ti_payment_status`, `ti_reserveddate`, `ti_departuredt`, `tr_id`) VALUES
(1, 600, 0, 600, 10, 10, 1, 'Card', 'Expired', 'Paid', '2021-07-05', '2021-11-02 18:33:09', 7),
(263, 350, 350, 0, 5, 3, 1, 'Cash', 'Cancelled', 'Waiting', '2021-11-02', '2021-11-02 17:35:24', 8),
(265, 735, 735, 0, 7, 6, 1, 'Cash', 'Expired', 'Paid', '2021-11-03', '2021-11-03 17:31:51', 2),
(266, 315, 315, 0, 3, 6, 1, 'Card', 'Expired', 'Paid', '2021-11-05', '2021-11-05 17:32:03', 2),
(267, 525, 525, 0, 5, 6, 42, 'Card', 'Expired', 'Paid', '2021-09-27', '2021-09-27 22:26:00', 2),
(268, 796, 0, 796, 4, 11, 27, 'Cash', 'Expired', 'Paid', '2021-09-27', '2021-09-27 05:20:00', 3),
(269, 520, 0, 520, 4, 4, 1, 'Cash', 'Cancelled', 'Waiting', '2021-09-30', '2021-09-30 19:30:32', 8),
(270, 2400, 1965, 435, 12, 21, 27, 'Cash', 'Expired', 'Paid', '2021-11-05', '2021-11-05 15:25:00', 14),
(272, 525, 525, 0, 5, 6, 1, 'Cash', 'Expired', 'Paid', '2021-11-05', '2021-11-05 22:26:00', 2),
(273, 1320, 0, 1320, 6, 32, 1, 'Cash', 'Confirmed', 'Paid', '2022-01-09', '2022-01-12 03:15:00', 25),
(274, 525, 0, 525, 5, 6, 27, 'Cash', 'Confirmed', 'Waiting', '2022-01-10', '2022-01-12 07:26:00', 2),
(275, 105, 0, 105, 1, 2, 1, 'Cash', 'Confirmed', 'Waiting', '2022-01-11', '2022-01-12 18:35:00', 1);

-- --------------------------------------------------------

--
-- Table structure for table `train`
--

CREATE TABLE `train` (
  `tr_id` int(11) NOT NULL,
  `tr_number` int(11) NOT NULL,
  `tr_name` varchar(100) NOT NULL,
  `tr_type` varchar(100) DEFAULT NULL,
  `tr_source` varchar(100) NOT NULL,
  `tr_destination` varchar(100) NOT NULL,
  `tr_departuredt` datetime DEFAULT NULL,
  `tr_arrivaldt` datetime DEFAULT NULL,
  `ad_id` int(11) DEFAULT NULL,
  `tr_status` varchar(100) DEFAULT 'Available',
  `tr_postalcode` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `train`
--

INSERT INTO `train` (`tr_id`, `tr_number`, `tr_name`, `tr_type`, `tr_source`, `tr_destination`, `tr_departuredt`, `tr_arrivaldt`, `ad_id`, `tr_status`, `tr_postalcode`) VALUES
(1, 8058, 'Ruhunu Kumari', 'Express Train', 'Colombo Fort', 'Hikkaduwa', '2022-01-12 18:35:00', '2022-01-12 15:44:00', 2, 'Available', '01100'),
(2, 8775, 'Night Mail', 'Night Mail Train', 'Colombo Fort', 'Hikkaduwa', '2022-01-12 07:27:00', '2022-01-12 07:55:00', 2, 'Available', '01100'),
(3, 4077, 'Yal Devi', 'LONG DISTANCE', 'Maradana', 'Bambalapitiya', '2022-01-12 05:20:00', '2022-01-12 06:17:00', 2, 'Available', '01000'),
(4, 8097, 'Sagarika', 'EXPRESS TRAIN', 'Bambalapitiya', 'Colombo Fort', '2022-01-12 07:52:00', '2022-01-12 08:08:00', 2, 'Available', '10350'),
(5, 8313, 'Sriwitha', 'Express Train', 'Panadura', 'Dematagoda', '2022-01-12 07:00:00', '2022-01-12 08:08:00', 2, 'Available', '10351'),
(7, 1041, 'New Year Traffic 2021', 'SPECIAL TRAINS (sch.)', 'Dehiwala', 'Colombo Fort', '2022-01-12 23:10:52', '2022-01-12 21:38:00', 2, 'Available', '10350'),
(8, 9264, 'Another', 'COLOMBO COMMUTER', 'Mutwal', 'Maradana', '2022-01-12 19:30:32', '2022-01-12 20:01:00', 2, 'Available', '01500'),
(10, 8765, 'Random', 'EXPRESS TRAIN', 'Mutwal', 'Colombo Fort', '2022-01-12 18:23:00', '2022-01-12 22:23:00', 2, 'Available', '01500'),
(13, 8058, 'RUHUNU KUMARI', 'EXPRESS TRAIN', 'Maradana', 'Matara', '2022-01-15 10:40:00', '2022-01-15 18:21:00', 2, 'Available', '01000'),
(14, 8760, 'SAMUDRA DEVI', 'LONG DISTANCE', 'Maradana', 'Galle', '2022-01-15 15:25:00', '2022-01-15 20:09:00', 2, 'Available', '01000'),
(15, 1005, 'Podi Menike', 'EXPRESS TRAIN', 'Colombo Fort', 'Badulla', '2022-01-10 22:17:00', '2022-01-11 16:07:00', 2, 'Available', '01100'),
(16, 8775, 'Night Mail', 'Night Mail Train', 'Maradana', 'Galle', '2022-01-10 18:45:00', '2022-01-10 22:58:00', 2, 'Available', '01100'),
(17, 1030, 'INTERCITY', 'INTERCITY', 'Kandy', 'Colombo Fort', '2022-01-10 18:15:00', '2022-01-10 20:50:00', 2, 'Available', '20000'),
(18, 4077, 'Yal Devi', 'LONG DISTANCE', 'Bambalapitiya', 'Colombo Fort', '2022-01-10 06:07:00', '2022-01-10 06:17:00', 2, 'Available', '00300'),
(20, 8743, 'Kisil', 'EXPRESS TRAIN', 'Maradana', 'Matara', '2022-01-10 09:17:00', '2022-01-10 19:20:00', 2, 'Available', '01100'),
(25, 8311, 'Night Mail', 'Night Mail Train', 'Galle', 'Maradana', '2022-01-12 03:16:00', '2022-01-12 06:42:00', 2, 'Available', '80000');

-- --------------------------------------------------------

--
-- Table structure for table `trainclass`
--

CREATE TABLE `trainclass` (
  `cl_id` int(11) NOT NULL,
  `cl_name` varchar(100) NOT NULL,
  `cl_seatcap` int(11) NOT NULL,
  `cl_occupiedseats` int(11) DEFAULT 0,
  `cl_price` int(11) NOT NULL,
  `tr_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `trainclass`
--

INSERT INTO `trainclass` (`cl_id`, `cl_name`, `cl_seatcap`, `cl_occupiedseats`, `cl_price`, `tr_id`) VALUES
(1, 'Second Class', 100, 27, 190, 1),
(2, 'Third Class', 150, 148, 105, 1),
(3, 'Third Class', 100, 18, 70, 8),
(4, 'Second Class', 50, 4, 130, 8),
(6, 'Third Class', 100, 39, 105, 2),
(8, 'Second Class', 100, 0, 90, 5),
(9, 'Third Class', 60, 0, 40, 4),
(10, 'Third Class', 100, 100, 60, 7),
(11, 'Second Class', 100, 4, 20, 3),
(14, 'First Class', 100, 98, 120, 10),
(20, 'Third Class', 50, 0, 155, 15),
(21, 'Second Class', 100, 12, 200, 14),
(22, 'Third Class', 100, 0, 160, 13),
(23, 'Third Class', 100, 0, 100, 17),
(24, 'First Class', 50, 0, 350, 17),
(32, 'Second Class', 80, 6, 220, 25),
(33, 'Third Class', 100, 0, 120, 25),
(34, 'Second Class', 100, 0, 190, 2),
(35, 'Third Class', 100, 0, 10, 3),
(36, 'Second Class', 50, 0, 220, 14),
(37, 'Third Class', 100, 0, 120, 14);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`ad_id`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`cus_id`),
  ADD UNIQUE KEY `cus_username` (`cus_username`),
  ADD KEY `ad_id` (`ad_id`);

--
-- Indexes for table `ticket`
--
ALTER TABLE `ticket`
  ADD PRIMARY KEY (`ti_id`),
  ADD KEY `cl_id` (`cl_id`),
  ADD KEY `cus_id` (`cus_id`),
  ADD KEY `tr_id` (`tr_id`);

--
-- Indexes for table `train`
--
ALTER TABLE `train`
  ADD PRIMARY KEY (`tr_id`),
  ADD KEY `ad_id` (`ad_id`),
  ADD KEY `tr_departuredt` (`tr_departuredt`);

--
-- Indexes for table `trainclass`
--
ALTER TABLE `trainclass`
  ADD PRIMARY KEY (`cl_id`),
  ADD KEY `tr_id` (`tr_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `ad_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `cus_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT for table `ticket`
--
ALTER TABLE `ticket`
  MODIFY `ti_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=276;

--
-- AUTO_INCREMENT for table `train`
--
ALTER TABLE `train`
  MODIFY `tr_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `trainclass`
--
ALTER TABLE `trainclass`
  MODIFY `cl_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `customer`
--
ALTER TABLE `customer`
  ADD CONSTRAINT `customer_ibfk_1` FOREIGN KEY (`ad_id`) REFERENCES `admin` (`ad_id`);

--
-- Constraints for table `ticket`
--
ALTER TABLE `ticket`
  ADD CONSTRAINT `ticket_ibfk_1` FOREIGN KEY (`cl_id`) REFERENCES `trainclass` (`cl_id`),
  ADD CONSTRAINT `ticket_ibfk_2` FOREIGN KEY (`cus_id`) REFERENCES `customer` (`cus_id`),
  ADD CONSTRAINT `tr_id` FOREIGN KEY (`tr_id`) REFERENCES `train` (`tr_id`);

--
-- Constraints for table `train`
--
ALTER TABLE `train`
  ADD CONSTRAINT `train_ibfk_1` FOREIGN KEY (`ad_id`) REFERENCES `admin` (`ad_id`);

--
-- Constraints for table `trainclass`
--
ALTER TABLE `trainclass`
  ADD CONSTRAINT `trainclass_ibfk_1` FOREIGN KEY (`tr_id`) REFERENCES `train` (`tr_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
