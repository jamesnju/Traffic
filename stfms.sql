-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 15, 2024 at 10:10 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

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
  `admins_name` varchar(255) NOT NULL,
  `admins_code` mediumint(50) NOT NULL,
  `admins_status` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`admins_id`, `admins_email`, `admins_name`, `admins_code`, `admins_status`) VALUES
(1, 'kiplangat@gmail.com', 'Traffic Police Admin', 774073, 'verified'),
(2, 'james500@gmail.com', 'jamesnju', 123, 'verified'),
(3, '[value-2]', '[value-4]', 0, '[value-6]');

-- --------------------------------------------------------

--
-- Table structure for table `driver`
--

CREATE TABLE `driver` (
  `driver_license_id` varchar(255) NOT NULL,
  `driver_email` varchar(255) NOT NULL,
  `driver_name` varchar(255) NOT NULL,
  `driver_home_address` varchar(255) NOT NULL,
  `driver_license_issue_date` date NOT NULL,
  `driver_license_expire_date` date NOT NULL,
  `driver_class_of_vehicle` varchar(255) NOT NULL,
  `driver_registered_at` date NOT NULL,
  `driver_status` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `driver`
--

INSERT INTO `driver` (`driver_license_id`, `driver_email`, `driver_name`, `driver_home_address`, `driver_license_issue_date`, `driver_license_expire_date`, `driver_class_of_vehicle`, `driver_registered_at`, `driver_status`) VALUES
('4344', 'jay4@gmail.com', 'fdf', '343df', '2024-03-21', '2024-04-06', 'A1B145', '2024-03-15', 'verified'),
('534', 'jay@gmail.com', 'jay', 'yty5', '2024-03-22', '2024-04-05', 'A1', '2024-03-13', 'verified'),
('B4500800', 'vic@gmail.com', 'victor baraka', 'kiambu, juja', '2018-10-18', '2026-10-16', 'A1', '2021-08-01', 'verified'),
('B4502650', 'tim@gmail.com', 'timothy mwangi', 'kiambu, thika', '2019-06-11', '2027-06-22', 'A1', '2021-08-01', 'verified'),
('dgdfg', 'jary2@gmail.com', 'dfg', 'gdfg', '2024-03-15', '2024-03-27', 'A1B5', '2024-03-13', 'verified'),
('fdddfdf', 'dgdf', 'hgf', 'gfgfgg', '2024-03-14', '2024-03-27', 'A1B1', '2024-03-13', 'verified'),
('gdfg', 'jafy@gmail.com', 'jaye', 'dagd', '2024-03-22', '2024-03-11', 'A1B14', '2024-03-13', 'verified');

-- --------------------------------------------------------

--
-- Table structure for table `fine_tickets`
--

CREATE TABLE `fine_tickets` (
  `fine_tickets_id` varchar(255) NOT NULL,
  `fine_tickets_section_of_act` varchar(255) NOT NULL,
  `fine_tickets_provision` varchar(255) NOT NULL,
  `fine_tickets_amount` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `fine_tickets`
--

INSERT INTO `fine_tickets` (`fine_tickets_id`, `fine_tickets_section_of_act`, `fine_tickets_provision`, `fine_tickets_amount`) VALUES
('100', 'Section 32', 'Revenue License to be displayed on motor vehicles and produced when required.', 1500.00),
('102', 'Section 128B', 'Driving a special purpose vehicle without obtaining a licence.', 1000.00),
('103', 'Section 128A', 'Failure to obtain authorization to drive a vehicle loaded with chemicals, hazardous waste, &amp;e.', 2000.00),
('104', 'section 130', 'Failure to have a Licence to drive a specific class of vehiceles.', 1000.00),
('105', 'Section 135', 'Failure to carry a Driving Licence when driving.', 2000.00),
('106', 'Section 139A', 'Driving a special purpose vehicle without obtaining a licence', 2000.00),
('107', 'Section 148', 'Failure to comply with road rules.', 2000.00),
('108', 'Section 140 and 141', 'Not compliance with Speed limits provisions.', 3000.00),
('109', 'Section 155A', 'Excessive emission of smoke &amp;c.', 1000.00);

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `issued_fines`
--

INSERT INTO `issued_fines` (`issued_fines_no`, `issued_fines_police_id`, `issued_fines_license_id`, `issued_fines_vehicle_no`, `issued_fines_class_of_vehicle`, `issued_fines_place`, `issued_fines_date`, `issued_fines_time`, `issued_fines_expire_date`, `issued_fines_provisions`, `issued_fines_total_amount`, `issued_fines_status`, `issued_fines_paid_date`) VALUES
(10025, 'P55555', 'B4500800', 'KDF 368k', 'A1', 'juja', '2024-03-01', '08:05:28', '2024-03-22', '100', 1500.00, 'Paid', '2024-03-01'),
(10026, 'p333', 'B4500800', 'KBA 768L', 'A1', 'juja', '2024-03-01', '05:21:01', '2024-03-22', '103', 2000.00, 'pending', '2024-03-01'),
(10034, 'tpo officer', '534', 'rete', 'A1', 'fdfgh', '2024-03-14', '08:19:21', '2024-04-04', '102', 0.00, 'pending', '2024-03-14'),
(10035, 'tpo officer', 'B4500800', 'kDR', 'A1', '1000fdffdf', '2024-03-14', '08:22:05', '2024-04-04', '100', 0.00, 'pending', '2024-03-14'),
(10036, 'tpo officer', 'B4500800', 'kEE', 'A1', 'Burt ', '2024-03-14', '08:34:28', '2024-04-04', '108', 123.00, 'pending', '2024-03-14'),
(10037, 'tpo officer', 'B4500800', 'KBG', 'A1', 'Burt f', '2024-03-14', '08:44:22', '2024-04-04', '103', 543.00, 'pending', '2024-03-14'),
(10038, 'tpo officer', 'B4500800', 'kEE', 'A1', 'Burt ', '2024-03-14', '08:45:05', '2024-04-04', '100', 4555.00, 'pending', '2024-03-14');

-- --------------------------------------------------------

--
-- Table structure for table `mtd`
--

CREATE TABLE `mtd` (
  `mtd_id` int(20) NOT NULL,
  `mtd_email` varchar(255) NOT NULL,
  `mtd_registered_at` date NOT NULL,
  `mtd_code` mediumint(50) NOT NULL,
  `mtd_status` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `mtd`
--

INSERT INTO `mtd` (`mtd_id`, `mtd_email`, `mtd_registered_at`, `mtd_code`, `mtd_status`) VALUES
(2, 'Nairobidepartment@gmail.com', '2021-05-24', 284383, 'verified'),
(4, 'james404@gmail.com', '2024-03-08', 11, 'verified'),
(5, 'james@gmail.com', '0000-00-00', 0, 'verified'),
(6, '', '0000-00-00', 0, ''),
(7, 'james500@gmail.com', '2024-03-05', 0, 'verified'),
(11, '[james400@gmail.com]', '0000-00-00', 0, '[verified]');

-- --------------------------------------------------------

--
-- Table structure for table `registration`
--

CREATE TABLE `registration` (
  `registration_id` int(11) NOT NULL,
  `registration_username` varchar(30) NOT NULL,
  `registration_email` varchar(255) NOT NULL,
  `registration_role` char(100) NOT NULL,
  `registration_password` varchar(255) NOT NULL,
  `registration_confirm_password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `registration`
--

INSERT INTO `registration` (`registration_id`, `registration_username`, `registration_email`, `registration_role`, `registration_password`, `registration_confirm_password`) VALUES
(1, 'werwe', 'fds@gmail.com', 'admin', '$2y$10$2dIIey795V.0hQX14UIgGO1zVnudwlj0WkQ0d8viYWr4uBW4X/F/G', ''),
(2, 'ds', 'fdssd@gmail.com', 'admin', '$2y$10$GDmc52SX2qFslOtAtJdFWeqSVIQMlxfUP75XyqnrQxNVnWtv5JYQW', '123'),
(3, 'james', 'james@gmail.com', 'admin', '$2y$10$CC.W31oe7J.gC4eq8/JH5uychoVaUtEXgbAwAd.B4eQLTRis1dwtG', '$2y$10$CC.W31oe7J.gC4eq8/JH5uychoVaUtEXgbAwAd.B4eQLTRis1dwtG'),
(4, 'jamesnju1', 'nju@gmail.com', 'driver', '$2y$10$vJP7AFbhRXzTrJXGi5nrsu7XXewXGeNdOMUSr6Xoo8O8OLpFK0wxW', '$2y$10$vJP7AFbhRXzTrJXGi5nrsu7XXewXGeNdOMUSr6Xoo8O8OLpFK0wxW'),
(5, 'jamesnju13', 'nju2@gmail.com', 'mtd', '$2y$10$VRbaOK.dSaWk5jF8207mYOmeLzpqfw6aKQfcZddI6FhOc8/ZEkaIu', '$2y$10$VRbaOK.dSaWk5jF8207mYOmeLzpqfw6aKQfcZddI6FhOc8/ZEkaIu'),
(6, '', 'gg@gmail', 'tpo', 'c20ad4d76fe97759aa27a0c99bff6710', ''),
(7, '', 'jl@gail.com', 'tpo', 'c20ad4d76fe97759aa27a0c99bff6710', 'c20ad4d76fe97759aa27a0c99bff6710'),
(8, '', 'gh@gmail.com', 'c20ad4d76fe97759aa27a0c99bff6710', 'c20ad4d76fe97759aa27a0c99bff6710', 'tpo'),
(9, '', 'ggd@gmail.com', 'tpo', '$2y$10$BksCCNQW1EzQ7W3/AfLrGuZ2L3DlwAFjUtktu9W7do4PLFtLG28Te', '$2y$10$BksCCNQW1EzQ7W3/AfLrGuZ2L3DlwAFjUtktu9W7do4PLFtLG28Te'),
(10, 'joy', 'joy@gmail', 'admin', '$2y$10$MvKEeEUT0aRUCc8Za1Kti.JwAON6R599p/86ldfUrK1jbJhmmfR7S', '$2y$10$MvKEeEUT0aRUCc8Za1Kti.JwAON6R599p/86ldfUrK1jbJhmmfR7S'),
(11, 'jay', 'jay@gmail.com', '', 'c20ad4d76fe97759aa27a0c99bff6710', '12'),
(12, 'hgf', 'dgdf', 'driver', 'c20ad4d76fe97759aa27a0c99bff6710', 'c20ad4d76fe97759aa27a0c99bff6710'),
(13, 'dfg', 'jary2@gmail.com', 'driver', '$2y$10$6TZy9hyjIKzZG3mkhetobOeF/t8r/O9u95CcdZ5MWZNnb.jSqlgj.', '$2y$10$6TZy9hyjIKzZG3mkhetobOeF/t8r/O9u95CcdZ5MWZNnb.jSqlgj.'),
(14, 'admin', 'admin@gmail', 'admin', '$2y$10$EBEe7Cb83JCwHgFsXGixxO7zVNrRav28XjkTfkH6BsBX3CB9Xu4CK', '$2y$10$EBEe7Cb83JCwHgFsXGixxO7zVNrRav28XjkTfkH6BsBX3CB9Xu4CK'),
(15, 'depart', 'head@gmail', 'mtd', '$2y$10$R46FjVW8Y2outs1jZjMMyeiuJXz51t/P62iF45BUjMiwDlmazBXrS', '$2y$10$R46FjVW8Y2outs1jZjMMyeiuJXz51t/P62iF45BUjMiwDlmazBXrS'),
(16, 'driver', 'driver@gmail', 'driver', '$2y$10$qq3Mr0gQGPg5vTRTw4Pa1uopaM564.ahBbesPUtTRCBpoazKo0DMK', '$2y$10$qq3Mr0gQGPg5vTRTw4Pa1uopaM564.ahBbesPUtTRCBpoazKo0DMK'),
(17, 'tu', 'jamets@gmail.com', 'admin', '$2y$10$n8dEnUOFNWltSiVLqh9Uk.i9s/eOYSOq8TnDIqr4Gxo.ALLwjRcra', '$2y$10$n8dEnUOFNWltSiVLqh9Uk.i9s/eOYSOq8TnDIqr4Gxo.ALLwjRcra'),
(18, 'tjtyj', 'gyt@gmail.com', 'admin', '$2y$10$Dof4LFX6eCoRtbHiDuF2z.HTHDTAp.douvMuFPezxm1eThVpWTJla', '$2y$10$Dof4LFX6eCoRtbHiDuF2z.HTHDTAp.douvMuFPezxm1eThVpWTJla'),
(19, 'jdgj', 'gyh@gmail.com', 'admin', '$2y$10$l3.SmJcPNaJBGzdvYvuFaO6LnOZ0cDnJaVfXIZU0zl8ZSSW8vAN.K', '$2y$10$l3.SmJcPNaJBGzdvYvuFaO6LnOZ0cDnJaVfXIZU0zl8ZSSW8vAN.K'),
(20, 'jaye', 'jafy@gmail.com', 'driver', '$2y$10$oBtXbXGWf1GIRX.ajUcamOS93xTCLSsYzEOwIJSsCpv4ESuz0hcuC', '$2y$10$oBtXbXGWf1GIRX.ajUcamOS93xTCLSsYzEOwIJSsCpv4ESuz0hcuC'),
(21, 'james12', 'tpo@gmail', 'tpo', '$2y$10$m/rVBNyJrEtTSeka8cOGseeq5JK.M1skgSoESj7dgiTQ9RFgsefie', '$2y$10$m/rVBNyJrEtTSeka8cOGseeq5JK.M1skgSoESj7dgiTQ9RFgsefie'),
(22, 'tpo officer', 'tpo1@gmail', 'tpo', '$2y$10$4zf/0sP48FSrCaEbKvIGLeRxRsIbb6P1O2.COEPm9HkdsBoZ1.n5e', '$2y$10$4zf/0sP48FSrCaEbKvIGLeRxRsIbb6P1O2.COEPm9HkdsBoZ1.n5e'),
(23, 'admin1', 'admin1@gmail', 'admin', '$2y$10$wAwy0iERZNk29XIsOeyG.eicD5e7eSVnVUF3dgeojxznnD/H1Tu9q', '$2y$10$wAwy0iERZNk29XIsOeyG.eicD5e7eSVnVUF3dgeojxznnD/H1Tu9q'),
(24, 'mtd1', 'mtd1@gmail', 'mtd', '$2y$10$yKgxdSVke771ghX01GpvE.Mx9dkyuXqG1SBQPmsJznEsKgQ8Grwle', '$2y$10$yKgxdSVke771ghX01GpvE.Mx9dkyuXqG1SBQPmsJznEsKgQ8Grwle'),
(25, 'fdf', 'jay4@gmail.com', 'driver', '$2y$10$UmOtgJR1E8mWdncxYf431OEMErPS4S34H2pUsdh1C3Mh1670su9li', '$2y$10$UmOtgJR1E8mWdncxYf431OEMErPS4S34H2pUsdh1C3Mh1670su9li');

-- --------------------------------------------------------

--
-- Table structure for table `tpo`
--

CREATE TABLE `tpo` (
  `tpo_id` varchar(255) NOT NULL,
  `tpo_email` varchar(255) NOT NULL,
  `tpo_name` varchar(255) NOT NULL,
  `tpo_station` varchar(255) NOT NULL,
  `tpo_registered_at` date NOT NULL,
  `tpo_status` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tpo`
--

INSERT INTO `tpo` (`tpo_id`, `tpo_email`, `tpo_name`, `tpo_station`, `tpo_registered_at`, `tpo_status`) VALUES
('434', 'ggd@gmail.com', 'ddfs', 'sdfsd', '2024-03-13', 'verified'),
('dfd434', 'gg@gmail', 'fdcd', 'juju', '2024-03-13', 'verified'),
('eter', 'gh@gmail.com', 'jhgd', 'fdgg', '2024-03-13', 'verified'),
('fds', 'jl@gail.com', 'jhg', 'tggf', '2024-03-13', 'verified'),
('ffgf43', 'fdsf@gail.com', 'gdgd', 'gdg', '2024-03-13', 'verified'),
('hc,', 'gyt@gmail.com', 'tjtyj', 'gjdtyj', '2024-03-13', 'verified'),
('jose', 'gyh@gmail.com', 'jdgj', 'gdggh', '2024-03-13', 'verified'),
('joy2', 'joy@gmail', 'joy', 'hj', '2024-03-13', 'verified'),
('land', 'land@gmail', 'lander', 'ffd', '2024-03-13', 'verified'),
('p333', 'james@gmail.com', 'james karanja', 'Thika police station', '2024-03-01', 'verified'),
('P55555', 'kiplangat@gmail.com', 'kiplangat', 'juja', '2024-03-01', 'verified');

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
-- Indexes for table `registration`
--
ALTER TABLE `registration`
  ADD PRIMARY KEY (`registration_id`);

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
  MODIFY `admins_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `issued_fines`
--
ALTER TABLE `issued_fines`
  MODIFY `issued_fines_no` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10039;

--
-- AUTO_INCREMENT for table `mtd`
--
ALTER TABLE `mtd`
  MODIFY `mtd_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `registration`
--
ALTER TABLE `registration`
  MODIFY `registration_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
