-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 28, 2024 at 05:32 AM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bookingcalendar`
--

-- --------------------------------------------------------

--
-- Table structure for table `azalea`
--

CREATE TABLE `azalea` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `date` date NOT NULL,
  `timeslot` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `azalea`
--

INSERT INTO `azalea` (`id`, `name`, `email`, `date`, `timeslot`) VALUES
(11, 'marco_steven12', 'siapaaditya1899@gmail.com', '2024-08-23', '09:00AM-10:00AM');

-- --------------------------------------------------------

--
-- Table structure for table `calluna`
--

CREATE TABLE `calluna` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `date` date NOT NULL,
  `timeslot` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `chrysant`
--

CREATE TABLE `chrysant` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `date` date NOT NULL,
  `timeslot` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `chrysant`
--

INSERT INTO `chrysant` (`id`, `name`, `email`, `date`, `timeslot`) VALUES
(31, 'Muhamad Aditya', 'siapaaditya18@gmail.com', '2024-02-25', '08:00AM-09:00AM'),
(32, 'Muhamad Aditya', 'siapaaditya18@gmail.com', '2024-03-03', '08:00AM-09:00AM'),
(33, 'wkwkwk', 'siapaaditya18@gmail.com', '2024-06-19', '08:00AM-09:00AM');

-- --------------------------------------------------------

--
-- Table structure for table `edelweiss`
--

CREATE TABLE `edelweiss` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `date` date NOT NULL,
  `timeslot` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `jasmine`
--

CREATE TABLE `jasmine` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `date` date NOT NULL,
  `timeslot` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `lily`
--

CREATE TABLE `lily` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `date` date NOT NULL,
  `timeslot` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `neworchide`
--

CREATE TABLE `neworchide` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `date` date NOT NULL,
  `timeslot` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `neworchide`
--

INSERT INTO `neworchide` (`id`, `name`, `email`, `date`, `timeslot`) VALUES
(4, 'marco_steven12', 'siapaaditya18@gmail.com', '2024-08-23', '15:00PM-16:00PM');

-- --------------------------------------------------------

--
-- Table structure for table `rafflesia`
--

CREATE TABLE `rafflesia` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `date` date NOT NULL,
  `timeslot` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `skyballroom`
--

CREATE TABLE `skyballroom` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `date` date NOT NULL,
  `timeslot` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `skyballroom`
--

INSERT INTO `skyballroom` (`id`, `name`, `email`, `date`, `timeslot`) VALUES
(7, 'ramayana', 'bskuy2000@gmail.com', '2024-08-23', '11:00AM-12:00PM');

-- --------------------------------------------------------

--
-- Table structure for table `thesky`
--

CREATE TABLE `thesky` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `date` date NOT NULL,
  `timeslot` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `azalea`
--
ALTER TABLE `azalea`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `calluna`
--
ALTER TABLE `calluna`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `chrysant`
--
ALTER TABLE `chrysant`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `edelweiss`
--
ALTER TABLE `edelweiss`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jasmine`
--
ALTER TABLE `jasmine`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lily`
--
ALTER TABLE `lily`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `neworchide`
--
ALTER TABLE `neworchide`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rafflesia`
--
ALTER TABLE `rafflesia`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `skyballroom`
--
ALTER TABLE `skyballroom`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `thesky`
--
ALTER TABLE `thesky`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `azalea`
--
ALTER TABLE `azalea`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `calluna`
--
ALTER TABLE `calluna`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `chrysant`
--
ALTER TABLE `chrysant`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `edelweiss`
--
ALTER TABLE `edelweiss`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `jasmine`
--
ALTER TABLE `jasmine`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `lily`
--
ALTER TABLE `lily`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `neworchide`
--
ALTER TABLE `neworchide`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `rafflesia`
--
ALTER TABLE `rafflesia`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `skyballroom`
--
ALTER TABLE `skyballroom`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `thesky`
--
ALTER TABLE `thesky`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
