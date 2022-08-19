-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 19, 2022 at 08:28 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `employee`
--

-- --------------------------------------------------------

--
-- Table structure for table `employees`
--

CREATE TABLE `employees` (
  `firstname` varchar(60) NOT NULL,
  `lastname` varchar(30) NOT NULL,
  `pos` varchar(100) NOT NULL,
  `dept` varchar(100) NOT NULL,
  `email` varchar(50) NOT NULL,
  `salary` bigint(20) NOT NULL,
  `since` date NOT NULL,
  `active` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `employees`
--

INSERT INTO `employees` (`firstname`, `lastname`, `pos`, `dept`, `email`, `salary`, `since`, `active`) VALUES
('Ashton', 'Jacob', 'Developer', 'Tech Department', 'ajacobs@jcoaches.com', 35000, '2018-09-01', 1),
('Pamela', 'Peterson', 'Head of Marketing', 'Marketing Department', 'ppeterson@jcoaches.com', 45000, '2016-08-01', 1),
('Joe', 'Adams', 'CEO', 'Executive Department', 'jadams@jcoaches.com', 80000, '2016-08-01', 1),
('Jessica', 'Bloom', 'Head of Transport', 'Transport Department', 'jbloom@jcoaches.com', 55000, '2016-08-01', 1),
('Somay ', 'Garg', 'Head', 'Finance Department', 'abc@gmail.com', 45390, '2020-03-28', 1),
('Somay ', 'Garg', 'Head', 'Tech Department', '17@17.in', 45390, '2015-02-19', 0),
('Somay ', 'Garg', 'Head', 'Transport Department', 'saga@gmail.com', 45390, '2015-02-07', 1);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
