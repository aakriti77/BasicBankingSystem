-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 19, 2021 at 07:09 AM
-- Server version: 10.1.31-MariaDB
-- PHP Version: 7.2.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bank`
--

-- --------------------------------------------------------

--
-- Table structure for table `customer_details`
--

CREATE TABLE `customer_details` (
  `name` varchar(55) NOT NULL,
  `email` varchar(44) NOT NULL,
  `account_no` int(11) NOT NULL,
  `current_bal` int(33) NOT NULL,
  `address` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer_details`
--

INSERT INTO `customer_details` (`name`, `email`, `account_no`, `current_bal`, `address`) VALUES
('Shubhash Patil', 'shubhash@gmail.com', 1, 618779, 'India'),
('Akash Shah', 'akash@gmail.com', 2, 101000, 'India'),
('James Smith', 'james@gmail.com', 3, 464221, 'USA'),
('John Davidson', 'john@gmail.com', 4, 330000, 'Russia'),
('Sally Jones', 'sally@gmail.com', 5, 160000, 'USA'),
('Jane Nortan ', 'jane@gmail.com', 6, 550000, 'Japan'),
('Sana Khan', 'sana@gmail.com', 7, 340000, 'Pakisthan'),
('Ram Kapoor', 'ram@gmail.com', 8, 675000, 'India'),
('Alex Wilson', 'alex@gmail.com', 9, 450000, 'China'),
('Dennis Potter', 'dennis@gmail.com', 10, 780000, 'Australia');

-- --------------------------------------------------------

--
-- Table structure for table `transfer_details`
--

CREATE TABLE `transfer_details` (
  `id` int(11) NOT NULL,
  `transfered_from` int(55) NOT NULL,
  `transfered_to` int(44) NOT NULL,
  `amount` int(33) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transfer_details`
--

INSERT INTO `transfer_details` (`id`, `transfered_from`, `transfered_to`, `amount`) VALUES
(1, 4, 2, 1000),
(2, 5, 1, 100000),
(3, 1, 2, 1000),
(4, 1, 4, 5000),
(5, 1, 3, 2000),
(6, 1, 3, 12222),
(7, 1, 4, 6000),
(8, 3, 1, 1),
(9, 4, 1, 45000),
(10, 4, 5, 10000),
(11, 8, 4, 25000);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `customer_details`
--
ALTER TABLE `customer_details`
  ADD PRIMARY KEY (`account_no`);

--
-- Indexes for table `transfer_details`
--
ALTER TABLE `transfer_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `transfered_from` (`transfered_from`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `customer_details`
--
ALTER TABLE `customer_details`
  MODIFY `account_no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `transfer_details`
--
ALTER TABLE `transfer_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `transfer_details`
--
ALTER TABLE `transfer_details`
  ADD CONSTRAINT `transfer_details_ibfk_1` FOREIGN KEY (`transfered_from`) REFERENCES `customer_details` (`account_no`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
