-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 09, 2024 at 04:42 AM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 7.3.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `stfms`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `admins_id` int(20) NOT NULL,
  `admins_email` varchar(255) NOT NULL,
  `admins_password` varchar(255) NOT NULL,
  `admins_name` varchar(255) NOT NULL,
  `admins_code` mediumint(50) NOT NULL,
  `admins_status` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`admins_id`, `admins_email`, `admins_password`, `admins_name`, `admins_code`, `admins_status`) VALUES
(1, 'kiplangat@gmail.com', '392a4ddea2df34a918560a6abff9c264', 'Traffic Police Admin', 774073, 'verified');

-- --------------------------------------------------------

--
-- Table structure for table `driver`
--

CREATE TABLE `driver` (
  `driver_license_id` varchar(255) NOT NULL,
  `driver_email` varchar(255) NOT NULL,
  `driver_password` varchar(255) NOT NULL,
  `driver_name` varchar(255) NOT NULL,
  `driver_home_address` varchar(255) NOT NULL,
  `driver_license_issue_date` date NOT NULL,
  `driver_license_expire_date` date NOT NULL,
  `driver_class_of_vehicle` varchar(255) NOT NULL,
  `driver_registered_at` date NOT NULL,
  `driver_status` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `driver`
--

INSERT INTO `driver` (`driver_license_id`, `driver_email`, `driver_password`, `driver_name`, `driver_home_address`, `driver_license_issue_date`, `driver_license_expire_date`, `driver_class_of_vehicle`, `driver_registered_at`, `driver_status`) VALUES
('B4500800', 'vic@gmail.com', '392a4ddea2df34a918560a6abff9c264', 'victor baraka', 'kiambu, juja', '2018-10-18', '2026-10-16', 'A1', '2021-08-01', 'verified'),
('B4502650', 'tim@gmail.com', '392a4ddea2df34a918560a6abff9c264', 'timothy mwangi', 'kiambu, thika', '2019-06-11', '2027-06-22', 'A1', '2021-08-01', 'verified');

-- --------------------------------------------------------

--
-- Table structure for table `fine_tickets`
--

CREATE TABLE `fine_tickets` (
  `fine_tickets_id` varchar(255) NOT NULL,
  `fine_tickets_section_of_act` varchar(255) NOT NULL,
  `fine_tickets_provision` varchar(255) NOT NULL,
  `fine_tickets_amount` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `fine_tickets`
--

INSERT INTO `fine_tickets` (`fine_tickets_id`, `fine_tickets_section_of_act`, `fine_tickets_provision`, `fine_tickets_amount`) VALUES
('100', 'Section 32', 'Revenue License to be displayed on motor vehicles and produced when required.', '1500.00'),
('102', 'Section 128B', 'Driving a special purpose vehicle without obtaining a licence.', '1000.00'),
('103', 'Section 128A', 'Failure to obtain authorization to drive a vehicle loaded with chemicals, hazardous waste, &amp;e.', '2000.00'),
('104', 'section 130', 'Failure to have a Licence to drive a specific class of vehiceles.', '1000.00'),
('105', 'Section 135', 'Failure to carry a Driving Licence when driving.', '2000.00'),
('106', 'Section 139A', 'Driving a special purpose vehicle without obtaining a licence', '2000.00'),
('107', 'Section 148', 'Failure to comply with road rules.', '2000.00'),
('108', 'Section 140 and 141', 'Not compliance with Speed limits provisions.', '3000.00'),
('109', 'Section 155A', 'Excessive emission of smoke &amp;c.', '1000.00');

-- --------------------------------------------------------

--
-- Table structure for table `issued_fines`
--

CREATE TABLE `issued_fines` (
  `issued_fines_no` int(255) NOT NULL,
  `issued_fines_police_id` varchar(255) NOT NULL,
  `issued_fines_license_id` varchar(255) NOT NULL,
  `issued_fines_vehicle_no` varchar(255) NOT NULL,
  `issued_fines_class_of_vehicle` varchar(255) NOT NULL,
  `issued_fines_place` varchar(255) NOT NULL,
  `issued_fines_date` date NOT NULL,
  `issued_fines_time` time NOT NULL,
  `issued_fines_expire_date` date NOT NULL,
  `issued_fines_provisions` varchar(255) NOT NULL,
  `issued_fines_total_amount` decimal(10,2) NOT NULL,
  `issued_fines_status` varchar(255) NOT NULL,
  `issued_fines_paid_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `issued_fines`
--

INSERT INTO `issued_fines` (`issued_fines_no`, `issued_fines_police_id`, `issued_fines_license_id`, `issued_fines_vehicle_no`, `issued_fines_class_of_vehicle`, `issued_fines_place`, `issued_fines_date`, `issued_fines_time`, `issued_fines_expire_date`, `issued_fines_provisions`, `issued_fines_total_amount`, `issued_fines_status`, `issued_fines_paid_date`) VALUES
(10025, 'P55555', 'B4500800', 'KDF 368k', 'A1', 'juja', '2024-03-01', '08:05:28', '2024-03-22', '100', '1500.00', 'Paid', '2024-03-01'),
(10026, 'p333', 'B4500800', 'KBA 768L', 'A1', 'juja', '2024-03-01', '05:21:01', '2024-03-22', '103', '2000.00', 'pending', '2024-03-01');

-- --------------------------------------------------------

--
-- Table structure for table `mtd`
--

CREATE TABLE `mtd` (
  `mtd_id` int(20) NOT NULL,
  `mtd_email` varchar(255) NOT NULL,
  `mtd_password` varchar(255) NOT NULL,
  `mtd_registered_at` date NOT NULL,
  `mtd_code` mediumint(50) NOT NULL,
  `mtd_status` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `mtd`
--

INSERT INTO `mtd` (`mtd_id`, `mtd_email`, `mtd_password`, `mtd_registered_at`, `mtd_code`, `mtd_status`) VALUES
(2, 'Nairobidepartment@gmail.com', 'af2a819071ff3bb5732a683dfec96666', '2021-05-24', 284383, 'verified');

-- --------------------------------------------------------

--
-- Table structure for table `tpo`
--

CREATE TABLE `tpo` (
  `tpo_id` varchar(255) NOT NULL,
  `tpo_email` varchar(255) NOT NULL,
  `tpo_password` varchar(255) NOT NULL,
  `tpo_name` varchar(255) NOT NULL,
  `tpo_station` varchar(255) NOT NULL,
  `tpo_registered_at` date NOT NULL,
  `tpo_status` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tpo`
--

INSERT INTO `tpo` (`tpo_id`, `tpo_email`, `tpo_password`, `tpo_name`, `tpo_station`, `tpo_registered_at`, `tpo_status`) VALUES
('p333', 'james@gmail.com', 'b4cc344d25a2efe540adbf2678e2304c', 'james karanja', 'Thika police station', '2024-03-01', 'verified'),
('P55555', 'kiplangat@gmail.com', '392a4ddea2df34a918560a6abff9c264', 'kiplangat', 'juja', '2024-03-01', 'verified');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`admins_id`),
  ADD UNIQUE KEY `admins_email` (`admins_email`);

--
-- Indexes for table `driver`
--
ALTER TABLE `driver`
  ADD PRIMARY KEY (`driver_license_id`),
  ADD UNIQUE KEY `driver_email` (`driver_email`);

--
-- Indexes for table `fine_tickets`
--
ALTER TABLE `fine_tickets`
  ADD PRIMARY KEY (`fine_tickets_id`);

--
-- Indexes for table `issued_fines`
--
ALTER TABLE `issued_fines`
  ADD PRIMARY KEY (`issued_fines_no`),
  ADD KEY `fk_pid` (`issued_fines_police_id`),
  ADD KEY `fk_lid` (`issued_fines_license_id`);

--
-- Indexes for table `mtd`
--
ALTER TABLE `mtd`
  ADD PRIMARY KEY (`mtd_id`),
  ADD UNIQUE KEY `mtd_email` (`mtd_email`);

--
-- Indexes for table `tpo`
--
ALTER TABLE `tpo`
  ADD PRIMARY KEY (`tpo_id`),
  ADD UNIQUE KEY `tpo_email` (`tpo_email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `admins_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `issued_fines`
--
ALTER TABLE `issued_fines`
  MODIFY `issued_fines_no` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10027;

--
-- AUTO_INCREMENT for table `mtd`
--
ALTER TABLE `mtd`
  MODIFY `mtd_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `issued_fines`
--
ALTER TABLE `issued_fines`
  ADD CONSTRAINT `fk_lid` FOREIGN KEY (`issued_fines_license_id`) REFERENCES `driver` (`driver_license_id`),
  ADD CONSTRAINT `fk_pid` FOREIGN KEY (`issued_fines_police_id`) REFERENCES `tpo` (`tpo_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
