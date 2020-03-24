-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 30, 2019 at 03:54 PM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tolet`
--

-- --------------------------------------------------------

--
-- Table structure for table `advertise`
--

CREATE TABLE `advertise` (
  `id` int(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `name` varchar(40) NOT NULL,
  `phone` varchar(30) NOT NULL,
  `division` varchar(50) NOT NULL,
  `district` varchar(30) NOT NULL,
  `upazila` varchar(100) NOT NULL,
  `area` varchar(50) NOT NULL,
  `house` varchar(30) NOT NULL,
  `houseType` varchar(30) NOT NULL,
  `month` varchar(50) NOT NULL,
  `rent` int(6) NOT NULL,
  `image` varchar(255) NOT NULL,
  `descrip` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `advertise`
--

INSERT INTO `advertise` (`id`, `email`, `name`, `phone`, `division`, `district`, `upazila`, `area`, `house`, `houseType`, `month`, `rent`, `image`, `descrip`) VALUES
(33, 'jewelcste@gmail.com', 'Jewel', '01676319480', '1', '1', '1', '2', 'Anmol', '2', 'April', 2500, './assets/images/4.jpg', 'Natural View.3 room flat.with attach bathroom.'),
(34, 'jewelcste@gmail.com', 'Jewel', '01676319480', '1', '1', '2', '4', '28', '2', 'July', 6000, './assets/images/apartment-architecture-blue-sky-358636.jpg', 'Natural View'),
(35, 'jewelcste@gmail.com', 'Jewel', '01676319480', '1', '1', '1', '2', 'Heaven', '2', 'July', 2000, './assets/images/3.jpg', 'Natural View.3 room flat.with attach bathroom.'),
(36, 'jewelcste@gmail.com', 'Jewel', '01676319480', '1', '1', '2', '3', 'Buiyan House, 21, 57', '1', 'May', 6000, './assets/images/1.jpg', 'Natural View.3 room flat.with attach bathroom.'),
(37, 'rakib33@gmail.com', 'Rakib Hasan', '01676323896', '1', '1', '7', '5', '166/24', '1', 'May', 12000, './assets/images/photo-1513584684374-8bab748fbf90.jpg', 'Beatuiful Location & Natural view.3 room, 2 bathroom.'),
(38, 'jewelcste@gmail.com', 'Nur Nobi', '01676319480', '1', '1', '2', '3', 'Nice House, 21, 57', '1', 'May', 6000, './assets/images/photo-1475855581690-80accde3ae2b.jpg', 'Natural View.3 room flat.with attach bathroom.');

-- --------------------------------------------------------

--
-- Table structure for table `area`
--

CREATE TABLE `area` (
  `area_id` int(11) NOT NULL,
  `upazila_id` int(5) NOT NULL,
  `area_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `area`
--

INSERT INTO `area` (`area_id`, `upazila_id`, `area_name`) VALUES
(1, 1, 'Danmondi 4/A'),
(2, 1, 'Danmondi 32'),
(3, 2, 'Kalabagan qtr'),
(4, 2, 'Green Road'),
(5, 7, 'Mirpur-1'),
(6, 7, 'Mirpur-10'),
(7, 5, 'Mohipal'),
(8, 5, 'Dr. para');

-- --------------------------------------------------------

--
-- Table structure for table `district`
--

CREATE TABLE `district` (
  `dis_id` int(11) NOT NULL,
  `division_id` int(11) NOT NULL,
  `dis_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `district`
--

INSERT INTO `district` (`dis_id`, `division_id`, `dis_name`) VALUES
(1, 1, 'Dhaka'),
(2, 1, 'Narayanganj'),
(3, 2, 'Chittagong'),
(4, 2, 'Feni'),
(5, 2, 'Noakhali'),
(6, 2, 'Comilla'),
(7, 1, 'Gazipur'),
(8, 1, 'Mymensingh');

-- --------------------------------------------------------

--
-- Table structure for table `division`
--

CREATE TABLE `division` (
  `div_id` int(11) NOT NULL,
  `div_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `division`
--

INSERT INTO `division` (`div_id`, `div_name`) VALUES
(1, 'Dhaka'),
(2, 'Chittagong');

-- --------------------------------------------------------

--
-- Table structure for table `housetype`
--

CREATE TABLE `housetype` (
  `hou_id` int(11) NOT NULL,
  `type_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `housetype`
--

INSERT INTO `housetype` (`hou_id`, `type_name`) VALUES
(1, 'Flat'),
(2, 'Mess');

-- --------------------------------------------------------

--
-- Table structure for table `upazila`
--

CREATE TABLE `upazila` (
  `up_id` int(11) NOT NULL,
  `district_id` int(5) NOT NULL,
  `up_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `upazila`
--

INSERT INTO `upazila` (`up_id`, `district_id`, `up_name`) VALUES
(1, 1, 'Danmondi'),
(2, 1, 'Kalabagan'),
(3, 1, 'New Market'),
(4, 1, 'Ramna'),
(5, 4, 'Feni Sadar'),
(6, 4, 'Fulgazi'),
(7, 1, 'Mirpur'),
(8, 1, 'Uttara');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` varchar(100) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `email`, `phone`, `password`) VALUES
(19, 'Rakib Hasan', 'rakib33@gmail.com', '01676323896', 'e10adc3949ba59abbe56e057f20f883e'),
(20, 'Nur Nobi', 'jewelcste@gmail.com', '01676319480', '827ccb0eea8a706c4c34a16891f84e7b');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `advertise`
--
ALTER TABLE `advertise`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `area`
--
ALTER TABLE `area`
  ADD PRIMARY KEY (`area_id`),
  ADD KEY `upazila_id` (`upazila_id`);

--
-- Indexes for table `district`
--
ALTER TABLE `district`
  ADD PRIMARY KEY (`dis_id`),
  ADD KEY `division_id` (`division_id`);

--
-- Indexes for table `division`
--
ALTER TABLE `division`
  ADD PRIMARY KEY (`div_id`);

--
-- Indexes for table `housetype`
--
ALTER TABLE `housetype`
  ADD PRIMARY KEY (`hou_id`);

--
-- Indexes for table `upazila`
--
ALTER TABLE `upazila`
  ADD PRIMARY KEY (`up_id`),
  ADD KEY `district_id` (`district_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `advertise`
--
ALTER TABLE `advertise`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `area`
--
ALTER TABLE `area`
  MODIFY `area_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `district`
--
ALTER TABLE `district`
  MODIFY `dis_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `division`
--
ALTER TABLE `division`
  MODIFY `div_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `housetype`
--
ALTER TABLE `housetype`
  MODIFY `hou_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `upazila`
--
ALTER TABLE `upazila`
  MODIFY `up_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `area`
--
ALTER TABLE `area`
  ADD CONSTRAINT `area_ibfk_1` FOREIGN KEY (`upazila_id`) REFERENCES `upazila` (`up_id`);

--
-- Constraints for table `district`
--
ALTER TABLE `district`
  ADD CONSTRAINT `district_ibfk_1` FOREIGN KEY (`division_id`) REFERENCES `division` (`div_id`);

--
-- Constraints for table `upazila`
--
ALTER TABLE `upazila`
  ADD CONSTRAINT `upazila_ibfk_1` FOREIGN KEY (`district_id`) REFERENCES `district` (`dis_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
