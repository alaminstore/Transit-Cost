-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Sep 27, 2020 at 04:09 PM
-- Server version: 10.2.32-MariaDB-log-cll-lve
-- PHP Version: 7.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `transitc_cpanel`
--

-- --------------------------------------------------------

--
-- Table structure for table `notification`
--

CREATE TABLE `notification` (
  `id` int(12) NOT NULL,
  `cname` varchar(20) NOT NULL,
  `phone` int(12) NOT NULL,
  `goods` varchar(20) NOT NULL,
  `weight` varchar(10) NOT NULL,
  `send_ntf_id` int(15) NOT NULL,
  `get_ntf_id` int(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `notification`
--

INSERT INTO `notification` (`id`, `cname`, `phone`, `goods`, `weight`, `send_ntf_id`, `get_ntf_id`) VALUES
(23, 'Demo Company', 1756982546, 'rice', '2tons', 1087, 1064),
(24, 'TransitCost Demo', 1712369845, 'Ball', '3tons', 1087, 1066),
(25, 'TransitCost Demo', 1736982514, 'Fish', '200KG', 1087, 1086),
(27, 'TransitCost Demo', 1700000000, 'Book', '4 tons', 1087, 1085),
(28, 'TransitCost Demo', 1687698512, 'Khata', '100 kg', 1087, 1064),
(29, 'TransitCost Demo', 1698123694, 'tasty food', '1 kg', 1087, 1085),
(30, 'TransitCost Demo', 1366666666, 'Rice', '2tons', 1087, 1085),
(31, 'Tenjon Global', 1736987412, ' Book', '3 tons', 1064, 1085),
(32, 'Demo Company 5', 169086468, 'rice ', '10 tons', 1064, 1086),
(33, 'Transit Demo', 1521492979, 'paint Color', '20kg', 1089, 1087),
(34, 'Tenjon Global', 1736987412, 'rice ', '20 tons', 1064, 1087),
(35, 'TransitCost Demo', 1368741236, 'Harvest', '5 tons', 1087, 1086);

-- --------------------------------------------------------

--
-- Table structure for table `reg`
--

CREATE TABLE `reg` (
  `id` int(11) NOT NULL,
  `cname` varchar(15) NOT NULL,
  `username` varchar(15) NOT NULL,
  `gender` text NOT NULL,
  `position` varchar(12) NOT NULL,
  `email` varchar(20) NOT NULL,
  `phone` int(12) NOT NULL,
  `address` varchar(30) NOT NULL,
  `address2` varchar(30) NOT NULL,
  `city` varchar(15) NOT NULL,
  `vehicle` varchar(15) NOT NULL,
  `zipcode` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `reg`
--

INSERT INTO `reg` (`id`, `cname`, `username`, `gender`, `position`, `email`, `phone`, `address`, `address2`, `city`, `vehicle`, `zipcode`) VALUES
(1, 'Transit Demo', 'Alane Wantsssss', 'Female', 'Manager', 'alane224@gmail.com', 1686350364, '1234 main st', '1234 main stv', 'Mohakhali,Dhaka', 'cover van', '1204'),
(3, 'Another company', 'sggggg', 'Female', 'ggggg', 'ggggg@gmail.com', 1698740145, 'maiafgfhfy', 'agbhf hbgj', 'tyutytiujfj', 'uitijj', '1208');

-- --------------------------------------------------------

--
-- Table structure for table `service`
--

CREATE TABLE `service` (
  `id` int(15) NOT NULL,
  `comname` varchar(20) NOT NULL,
  `area` varchar(20) NOT NULL,
  `reach` varchar(20) NOT NULL,
  `phone` int(12) NOT NULL,
  `truckcapa` varchar(10) NOT NULL,
  `already` varchar(10) NOT NULL,
  `available` varchar(10) NOT NULL,
  `leaves` varchar(20) NOT NULL,
  `arrive` varchar(20) NOT NULL,
  `pay` varchar(20) NOT NULL,
  `ntf_id` int(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `service`
--

INSERT INTO `service` (`id`, `comname`, `area`, `reach`, `phone`, `truckcapa`, `already`, `available`, `leaves`, `arrive`, `pay`, `ntf_id`) VALUES
(1, 'Unilever Bangladesh ', 'Dhaka', 'Khulna', 1677230856, '11 tons', '7 tons', '3 tons', '25 Nov, 12:30 am', '26 Nov, 8:00 am', '12000 tk', 1064),
(2, 'Anttop Com', 'Kustia', 'Rangpur', 1765982545, '20 tons', '12 tons', '8 tons', '25 march, 10:30 am', '26 march, 8:00 am', '11000 tk', 1085),
(3, 'Test company', 'Khulna', 'Dhaka', 1735789204, '8 tons', '5 tons', '3 tons', '23 Nov, 12:30 am', '24 Nov, 8:00 am', '1000tk ', 1086),
(4, 'Company 2 ', 'Kumilla', 'Dhaka', 1785698412, '4 tons', '2tons', '2 tons', '2 am , 23 dec', '3 am ,24 dec', '12000 ', 1064),
(5, 'Someone Company', 'Jamalpur', 'Kustia', 1698230128, '10', '2tons', '8', '4 am , 23 December', '4 pm ,24 December', '8000', 1087),
(6, 'Someone Company', 'Jamalpur', 'Kustia', 1698230128, '10', '2tons', '8', '4 am , 23 December', '4 pm ,24 December', '8000', 1085),
(7, 'Test value vom', 'Chittagong', 'Dhaka', 1695351258, '12 tons', '4tons', '8 tons', '12:45 am ,24 decembe', '8:00 am ,25 december', '10,000 tk', 1086),
(8, 'jani & co.', 'DEPZ', 'NEPZ', 1521492979, '5 ton', '2ton', '3ton', '2:30pm', '5pm', '2300', 1087);

-- --------------------------------------------------------

--
-- Table structure for table `usertable`
--

CREATE TABLE `usertable` (
  `id` int(15) NOT NULL,
  `pass` varchar(250) DEFAULT NULL,
  `cname` varchar(25) NOT NULL,
  `username` varchar(15) NOT NULL,
  `gender` text NOT NULL,
  `position` varchar(12) NOT NULL,
  `email` varchar(25) NOT NULL,
  `phone` int(12) NOT NULL,
  `address` varchar(25) NOT NULL,
  `address2` varchar(25) NOT NULL,
  `city` varchar(15) NOT NULL,
  `vehicle` varchar(15) NOT NULL,
  `zipcode` int(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `usertable`
--

INSERT INTO `usertable` (`id`, `pass`, `cname`, `username`, `gender`, `position`, `email`, `phone`, `address`, `address2`, `city`, `vehicle`, `zipcode`) VALUES
(1064, 'e10adc3949ba59abbe56e057f20f883e', 'Tenjon Global', 'Mr Selmon', 'Male', 'Assistant Ma', 'selmonfish@yahoo.com', 1789236974, 'Mi-road ', 'Mi-road ', 'Khulna', 'Mini Tuck', 1860),
(1066, 'e10adc3949ba59abbe56e057f20f883e', 'Marbel Accessor', 'Mokim Mia', 'Male', 'CEO', 'mokmia@gmail.com', 1698254892, '126 Tavnb Fkoira pur', '126 Tavnb Fkoira pur', 'Dhaka', 'Truck', 1206),
(1086, 'e10adc3949ba59abbe56e057f20f883e', 'One Company', 'Toufique Hossai', 'Male', 'Employee', 'toufique1212@gmail.com', 1769850136, '1234 main street', '1234 main street', 'Dhaka', 'MINI Bus', 1206),
(1087, 'b5de55c6145ea33d634daf90fba09371', 'TransitCost Demo', 'Rafsun Jani', 'Male', 'CEO', 'rafsan1212@gmail.com', 1623698412, '123 MAIN STATE DHANMONDI', '123 MAIN STATE DHANMONDI', 'Dhaka', 'Truck van', 1207),
(1088, 'e10adc3949ba59abbe56e057f20f883e', 'Abc DAMEO', 'AbcZone', 'Male', 'Manager', 'abc@gmail.com', 1369745123, '1234 main dHAKA', '1234 main dHAKA', 'Dhaka', 'Mini truck', 1206);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `notification`
--
ALTER TABLE `notification`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reg`
--
ALTER TABLE `reg`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `service`
--
ALTER TABLE `service`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `usertable`
--
ALTER TABLE `usertable`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `notification`
--
ALTER TABLE `notification`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `reg`
--
ALTER TABLE `reg`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `service`
--
ALTER TABLE `service`
  MODIFY `id` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `usertable`
--
ALTER TABLE `usertable`
  MODIFY `id` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1089;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
