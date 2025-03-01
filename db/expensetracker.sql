-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 28, 2023 at 07:21 AM
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
-- Database: `expensetracker`
--

-- --------------------------------------------------------

--
-- Table structure for table `transactiondetails`
--

CREATE TABLE `transactiondetails` (
  `tid` int(11) NOT NULL,
  `tdate` date NOT NULL,
  `tamt` float NOT NULL,
  `treason` varchar(30) NOT NULL,
  `tstatus` varchar(10) NOT NULL,
  `uid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `transactiondetails`
--

INSERT INTO `transactiondetails` (`tid`, `tdate`, `tamt`, `treason`, `tstatus`, `uid`) VALUES
(1, '2023-12-20', 500, 'Petrol', 'Credit', 2),
(2, '2023-12-23', 3000, 'Education', 'Credit', 2),
(3, '2023-12-26', 10000, 'Shopping', 'Credit', 3),
(4, '2023-12-27', 1500, 'Shopping', 'Expense', 3),
(5, '2023-12-26', 3000, 'Education', 'Expense', 2),
(6, '2023-12-25', 1000, 'Petrol', 'Credit', 1),
(7, '2023-12-25', 300, 'Petrol', 'Expense', 1),
(8, '2023-12-20', 5000, 'Education', 'Credit', 7),
(9, '2023-12-23', 1500, 'Shopping', 'Expense', 7),
(10, '2023-12-28', 100, 'Petrol', 'Credit', 7);

-- --------------------------------------------------------

--
-- Table structure for table `userdetails`
--

CREATE TABLE `userdetails` (
  `uid` int(11) NOT NULL,
  `unm` varchar(100) NOT NULL,
  `uemail` varchar(150) NOT NULL,
  `upwd` varchar(50) NOT NULL,
  `uque` varchar(50) NOT NULL,
  `uans` varchar(20) NOT NULL,
  `uphoto` varchar(15) NOT NULL,
  `umb` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `userdetails`
--

INSERT INTO `userdetails` (`uid`, `unm`, `uemail`, `upwd`, `uque`, `uans`, `uphoto`, `umb`) VALUES
(1, 'Pratik Rokde', 'pratik@gmail.com', 'p123', 'What is your Hobby', 'reading', '-', '-'),
(2, 'Tejas vende', 'tejas@gmail.com', 't123', 'What is your School Name', 'kbp', '-', '-'),
(3, 'Atharv Jadhav', 'atharv@gmail.com', 'a123', 'What is your Favourite food ', 'samosa', '-', '-'),
(4, 'Prathamesh Shinde', 'prathamesh@gmail.com', 'p123', 'What is your Hobby', 'painting', '-', '-'),
(5, 'dhanshri nalawade', 'dhanshri@gmail.com', 'pune', 'What is your School Name', 'yc', '-', '-'),
(6, 'Madhuri Mardhekar', 'madhuri@gmail.com', 'm123', 'What is your Favourite food ', 'vadapav', '-', '-'),
(7, 'Harshal Gaikwad', 'harshal@gmail.com', 'satara', 'What is your Hobby', 'sutti', '-', '-');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `transactiondetails`
--
ALTER TABLE `transactiondetails`
  ADD PRIMARY KEY (`tid`);

--
-- Indexes for table `userdetails`
--
ALTER TABLE `userdetails`
  ADD PRIMARY KEY (`uid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `transactiondetails`
--
ALTER TABLE `transactiondetails`
  MODIFY `tid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `userdetails`
--
ALTER TABLE `userdetails`
  MODIFY `uid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
