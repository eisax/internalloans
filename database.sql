-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 04, 2023 at 01:33 PM
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
-- Database: `brac_loan`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_borrower`
--

CREATE TABLE `tbl_borrower` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `nid` varchar(30) NOT NULL,
  `rejected` int(11) NOT NULL DEFAULT 0,
  `gender` varchar(20) NOT NULL,
  `mobile` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `dob` date NOT NULL,
  `address` varchar(255) NOT NULL,
  `working_status` varchar(50) NOT NULL,
  `image` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tbl_borrower`
--

INSERT INTO `tbl_borrower` (`id`, `name`, `nid`, `rejected`, `gender`, `mobile`, `email`, `dob`, `address`, `working_status`, `image`) VALUES
(16, 'Movement Musasiwa', '113010', 0, '1', '0716860096', 'movement.musasiwa@womensbank.co.zw', '2023-11-29', '1867 Mamvura Shawasha', '3', 'admin/uploads/0819a951e7.png'),
(17, 'Josphat Ndhlovu', '24244380L75', 0, '1', '0774259097', 'josphat.ndhlovu@gmail.com', '2002-03-11', '5 Meadow Cres Area D Westgate Harare', '1', 'admin/uploads/6e288022e6.png'),
(18, 'Runakorwashe Padera', '12345R1', 0, '2', '0774259097', 'runakorwashe.padera@womensbank.co.zw', '2001-09-28', '1867 Mamvura Shawasha', '1', 'admin/uploads/2ec3cf3b89.png');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_liability`
--

CREATE TABLE `tbl_liability` (
  `id` int(11) NOT NULL,
  `b_id` int(11) NOT NULL,
  `loan_id` int(11) NOT NULL,
  `property_name` varchar(255) NOT NULL,
  `property_details` text NOT NULL,
  `price` bigint(50) NOT NULL,
  `pay_remaining_loan` bigint(50) NOT NULL,
  `return_money` bigint(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_loan_application`
--

CREATE TABLE `tbl_loan_application` (
  `id` int(11) NOT NULL,
  `b_id` int(11) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  `name` varchar(100) NOT NULL,
  `expected_loan` bigint(50) NOT NULL,
  `loan_percentage` int(11) NOT NULL,
  `installments` int(11) NOT NULL,
  `total_loan` bigint(50) NOT NULL,
  `emi_loan` int(11) NOT NULL,
  `amount_paid` bigint(50) DEFAULT 0,
  `amount_remain` bigint(50) DEFAULT NULL,
  `current_inst` int(11) DEFAULT 0,
  `remain_inst` int(11) DEFAULT NULL,
  `next_date` date DEFAULT NULL,
  `files` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tbl_loan_application`
--

INSERT INTO `tbl_loan_application` (`id`, `b_id`, `status`, `name`, `expected_loan`, `loan_percentage`, `installments`, `total_loan`, `emi_loan`, `amount_paid`, `amount_remain`, `current_inst`, `remain_inst`, `next_date`, `files`) VALUES
(24, 16, 3, 'Movement Musasiwa', 1111, 11, 11, 1233, 112, 336, 897, 3, 8, '2024-05-30', 'admin/uploads/documents/7d7109130e.pdf'),
(25, 16, 0, 'Movement Musasiwa', 2333, 22, 2, 2846, 1423, 0, 2846, 0, 2, NULL, 'admin/uploads/documents/2f8371123a.pdf'),
(26, 17, 0, 'Josphat Ndhlovu', 200, 5, 10, 210, 21, 0, 210, 0, 10, NULL, 'admin/uploads/documents/7609c3c5d8.pdf'),
(27, 16, 3, 'Movement Musasiwa', 230000, 16, 24, 257600, 10733, 21466, 236134, 2, 22, '2024-01-01', 'admin/uploads/documents/f6468bea18.pdf');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_payment`
--

CREATE TABLE `tbl_payment` (
  `id` int(11) NOT NULL,
  `b_id` int(11) NOT NULL,
  `loan_id` int(11) NOT NULL,
  `pay_amount` int(11) NOT NULL,
  `pay_date` date NOT NULL,
  `current_inst` int(11) NOT NULL,
  `remain_inst` int(11) NOT NULL,
  `fine` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tbl_payment`
--

INSERT INTO `tbl_payment` (`id`, `b_id`, `loan_id`, `pay_amount`, `pay_date`, `current_inst`, `remain_inst`, `fine`) VALUES
(8, 16, 24, 112, '2024-03-01', 1, 10, 0),
(9, 16, 24, 112, '2023-11-02', 2, 9, 0),
(10, 16, 24, 112, '2023-11-02', 3, 8, 0),
(11, 16, 27, 10733, '2023-11-02', 1, 23, 0),
(12, 16, 27, 10733, '2023-11-03', 2, 22, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE `tbl_user` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `pass` varchar(50) NOT NULL,
  `designation` varchar(100) NOT NULL,
  `role` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`id`, `name`, `email`, `pass`, `designation`, `role`) VALUES
(8, 'Victor Zarura', 'victor.zarura@womensbank.co.zw', '81dc9bdb52d04dc20036dbd8313ed055', 'Branch Officer', 2),
(10, 'Josphat Ndhlovu', 'josphat.ndhlovu@womensbank.co.zw', '81dc9bdb52d04dc20036dbd8313ed055', 'Admin', 4),
(11, 'Movement Musasiwa', 'movement.musasiwa@womensbank.co.zw', '81dc9bdb52d04dc20036dbd8313ed055', 'Admin', 4),
(12, 'Munashe Muwonde', 'hod@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', 'Varifier', 1),
(13, 'HR Head', 'hrhead@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', 'Branch Officer', 2),
(14, 'CEO', 'ceo@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', 'Admin', 3);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_borrower`
--
ALTER TABLE `tbl_borrower`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `nid` (`nid`);

--
-- Indexes for table `tbl_liability`
--
ALTER TABLE `tbl_liability`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_loan_application`
--
ALTER TABLE `tbl_loan_application`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_payment`
--
ALTER TABLE `tbl_payment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_borrower`
--
ALTER TABLE `tbl_borrower`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `tbl_loan_application`
--
ALTER TABLE `tbl_loan_application`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `tbl_payment`
--
ALTER TABLE `tbl_payment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
