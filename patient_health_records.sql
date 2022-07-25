-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 25, 2022 at 02:24 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `patient_health_records`
--

-- --------------------------------------------------------

--
-- Table structure for table `patient`
--

CREATE TABLE `patient` (
  `ptn_id` varchar(4) NOT NULL,
  `name` varchar(50) NOT NULL,
  `dob` date NOT NULL,
  `phone` varchar(11) NOT NULL,
  `gender` enum('F','M') NOT NULL,
  `address` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `patient`
--

INSERT INTO `patient` (`ptn_id`, `name`, `dob`, `phone`, `gender`, `address`) VALUES
('1001', 'Ayesha', '1992-05-22', '01837982310', 'F', '2/C, 4/16, Mirpur, Dhaka'),
('1002', 'Sagar', '1990-03-06', '01837982587', 'M', '3/F, 1/19, Banani, Dhaka'),
('1003', 'Dua', '1995-02-16', '01987982310', 'F', '5/A, 6/20, Gulshan, Dhaka'),
('1004', 'Fatiha', '1998-09-19', '01747982310', 'F', '3/B, 2/34, Badda, Dhaka'),
('1005', 'Joy', '2000-10-27', '01837982310', 'M', '5/D, 2/10, Pallabi, Dhaka');

-- --------------------------------------------------------

--
-- Table structure for table `records`
--

CREATE TABLE `records` (
  `rec_id` int(11) NOT NULL,
  `ptn_id` varchar(4) NOT NULL,
  `rec_date` date NOT NULL,
  `height` double(3,2) DEFAULT NULL,
  `weight` double(6,3) DEFAULT NULL,
  `heart_rate` double(5,2) DEFAULT NULL,
  `pulse_rate` double(5,2) DEFAULT NULL,
  `temperature` double(5,2) DEFAULT NULL,
  `blood_group` enum('A+','A-','B+','B-','O+','O-','AB+','AB-') DEFAULT NULL,
  `sugar_level` double(4,2) DEFAULT NULL,
  `blood_pressure_top` double(5,2) DEFAULT NULL,
  `blood_pressure_bottom` double(5,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `records`
--

INSERT INTO `records` (`rec_id`, `ptn_id`, `rec_date`, `height`, `weight`, `heart_rate`, `pulse_rate`, `temperature`, `blood_group`, `sugar_level`, `blood_pressure_top`, `blood_pressure_bottom`) VALUES
(1, '1001', '2022-05-05', 4.10, 50.230, 95.00, 56.00, 96.10, 'A+', 70.00, 110.00, 75.00),
(2, '1001', '2022-05-26', 4.10, 50.300, 162.00, 61.00, 96.50, 'A+', 75.00, 90.00, 79.00),
(3, '1002', '2022-05-05', 5.10, 55.250, 180.00, 62.00, 97.20, 'O+', 80.00, 119.00, 67.00),
(4, '1002', '2022-05-26', 5.10, 56.350, 184.00, 70.00, 99.10, 'O+', 92.00, 98.00, 72.00),
(5, '1003', '2022-05-05', 5.40, 60.120, 172.00, 49.00, 95.20, 'B+', 74.00, 130.00, 82.00),
(6, '1003', '2022-05-26', 5.40, 61.220, 182.00, 65.00, 97.30, 'B+', 84.00, 135.00, 85.00),
(7, '1003', '2022-05-14', 5.40, 62.190, 190.00, 70.00, 98.20, 'B+', 92.00, 138.00, 89.00),
(8, '1004', '2022-05-05', 5.90, 70.150, 100.00, 70.00, 99.30, 'AB-', 71.00, 140.00, 90.00),
(9, '1004', '2022-05-26', 5.90, 68.350, 152.00, 65.00, 96.30, 'AB-', 83.00, 145.00, 92.00),
(10, '1004', '2022-05-14', 5.90, 70.200, 200.00, 73.00, 97.80, 'AB-', 95.00, 149.00, 95.00),
(11, '1005', '2022-05-05', 5.90, 82.330, 170.00, 70.00, 97.90, 'A-', 75.00, 144.00, 92.00),
(12, '1005', '2022-05-26', 5.90, 81.430, 177.00, 75.00, 98.80, 'A-', 81.00, 154.00, 98.00),
(13, '1005', '2022-05-14', 5.90, 80.380, 188.00, 81.00, 96.20, 'A-', 98.00, 150.00, 89.00);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `patient`
--
ALTER TABLE `patient`
  ADD PRIMARY KEY (`ptn_id`);

--
-- Indexes for table `records`
--
ALTER TABLE `records`
  ADD PRIMARY KEY (`rec_id`),
  ADD KEY `ptn_id` (`ptn_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `records`
--
ALTER TABLE `records`
  MODIFY `rec_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `records`
--
ALTER TABLE `records`
  ADD CONSTRAINT `records_ibfk_1` FOREIGN KEY (`ptn_id`) REFERENCES `patient` (`ptn_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
