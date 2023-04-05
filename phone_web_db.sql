-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3307
-- Generation Time: Apr 05, 2023 at 03:48 PM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `phone_web_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(10) NOT NULL,
  `name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `id` int(10) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` int(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `phoneNumber` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phoneNumber` varchar(255) NOT NULL,
  `position` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `block` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `image`
--

CREATE TABLE `image` (
  `phoneID` int(10) NOT NULL,
  `colorID` int(10) NOT NULL,
  `color` varchar(100) NOT NULL,
  `img1` varchar(255) NOT NULL,
  `img2` varchar(255) NOT NULL,
  `img3` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `order`
--

CREATE TABLE `order` (
  `id` int(10) NOT NULL,
  `customerID` int(10) NOT NULL,
  `employeeEmail` varchar(255) NOT NULL,
  `date` date NOT NULL,
  `totalPayment` int(100) NOT NULL,
  `orderStatus` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `orderdetail`
--

CREATE TABLE `orderdetail` (
  `orderID` int(10) NOT NULL,
  `phoneID` int(10) NOT NULL,
  `variantID` int(10) NOT NULL,
  `colorID` int(10) NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `phone`
--

CREATE TABLE `phone` (
  `id` int(10) NOT NULL,
  `name` varchar(255) NOT NULL,
  `category` int(10) NOT NULL,
  `date` date NOT NULL,
  `detail` varchar(255) DEFAULT NULL,
  `visible` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `receipt`
--

CREATE TABLE `receipt` (
  `id` int(10) NOT NULL,
  `supplierID` int(10) NOT NULL,
  `employeeEmail` varchar(255) NOT NULL,
  `totalPayment` int(100) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `receiptdetail`
--

CREATE TABLE `receiptdetail` (
  `receiptID` int(11) NOT NULL,
  `phoneID` int(11) NOT NULL,
  `variantID` int(11) NOT NULL,
  `colorID` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `spec`
--

CREATE TABLE `spec` (
  `phoneID` int(10) NOT NULL,
  `chipset` varchar(50) NOT NULL,
  `body` varchar(255) NOT NULL,
  `display` varchar(255) NOT NULL,
  `os` varchar(50) NOT NULL,
  `camera` varchar(255) NOT NULL,
  `batery` varchar(255) NOT NULL,
  `misc` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `supplier`
--

CREATE TABLE `supplier` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phoneNumber` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `variant`
--

CREATE TABLE `variant` (
  `phoneID` int(10) NOT NULL,
  `size` int(10) NOT NULL COMMENT 'ram and memory',
  `colorID` int(10) NOT NULL,
  `price` int(50) NOT NULL,
  `quantity` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `image`
--
ALTER TABLE `image`
  ADD KEY `id` (`phoneID`,`colorID`),
  ADD KEY `phoneID` (`phoneID`),
  ADD KEY `colorID` (`colorID`);

--
-- Indexes for table `order`
--
ALTER TABLE `order`
  ADD PRIMARY KEY (`id`),
  ADD KEY `customerID` (`customerID`,`employeeEmail`);

--
-- Indexes for table `orderdetail`
--
ALTER TABLE `orderdetail`
  ADD KEY `orderID` (`orderID`),
  ADD KEY `phoneID` (`phoneID`),
  ADD KEY `variantID` (`variantID`),
  ADD KEY `colorID` (`colorID`);

--
-- Indexes for table `phone`
--
ALTER TABLE `phone`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category` (`category`);

--
-- Indexes for table `receipt`
--
ALTER TABLE `receipt`
  ADD PRIMARY KEY (`id`),
  ADD KEY `supplierID` (`supplierID`),
  ADD KEY `employeeEmail` (`employeeEmail`);

--
-- Indexes for table `receiptdetail`
--
ALTER TABLE `receiptdetail`
  ADD KEY `receiptID` (`receiptID`),
  ADD KEY `phoneID` (`phoneID`),
  ADD KEY `variantID` (`variantID`),
  ADD KEY `colorID` (`colorID`);

--
-- Indexes for table `spec`
--
ALTER TABLE `spec`
  ADD KEY `id` (`phoneID`),
  ADD KEY `phoneID` (`phoneID`);

--
-- Indexes for table `supplier`
--
ALTER TABLE `supplier`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `variant`
--
ALTER TABLE `variant`
  ADD KEY `id` (`phoneID`),
  ADD KEY `idColor` (`colorID`),
  ADD KEY `phoneID` (`phoneID`),
  ADD KEY `colorID` (`colorID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `order`
--
ALTER TABLE `order`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `phone`
--
ALTER TABLE `phone`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `receipt`
--
ALTER TABLE `receipt`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `supplier`
--
ALTER TABLE `supplier`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
