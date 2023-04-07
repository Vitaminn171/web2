-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3307
-- Generation Time: Apr 06, 2023 at 07:10 PM
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

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `name`) VALUES
(1, 'Samsung'),
(2, 'Iphone'),
(3, 'Xiaomi'),
(4, 'ASUS');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `id` int(10) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `phoneNumber` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`id`, `name`, `email`, `password`, `address`, `phoneNumber`) VALUES
(1, 'Quoc An', 'lyquocan@gmail.com', '4297f44b13955235245b2497399d7a93', '114 Phan Đăng Lưu, P.3, Q.Phú Nhuận, TP HCM', '123123123'),
(2, 'quocan', 'lyquocan123@gmail.com', '4297f44b13955235245b2497399d7a93', '5 Nguyễn Kiệm, P.3, Q.Gò Vấp, TP HCM', '345123123'),
(3, 'abcabc', 'lyquocan1@gmail.com', '4297f44b13955235245b2497399d7a93', '159 Nguyễn Thị Minh Khai, P.Phạm Ngũ Lão, Q.1, TP HCM', '654688239'),
(4, 'hehe', 'lyquocan123@gmail.com', '4297f44b13955235245b2497399d7a93', '190B Hoàng Văn Thụ, P4, Q.Tân Bình, TPHCM', '54463651'),
(5, 'haha', 'lyquocan123@gmail.com', '4297f44b13955235245b2497399d7a93', '134 Nguyễn Thái Học, P.Phạm Ngũ Lão, Q.1, TP HCM', '123168998'),
(6, 'htjujg', 'lyquocan123@gmail.com', '4297f44b13955235245b2497399d7a93', '379 Điện Biên Phủ, P.25, Q.Bình Thạnh, TP HCM', '890785634523'),
(7, '6rert', 'lyquocan123@gmail.com', '4297f44b13955235245b2497399d7a93', '347 Nguyễn Tri Phương, P.5, Q.10, TP HCM', '567124146');

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

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`name`, `email`, `phoneNumber`, `position`, `password`, `block`) VALUES
('Quoc An', 'lyquocan171@gmail.com', '123123', 'admin', '4297f44b13955235245b2497399d7a93', 0),
('quocan', 'lyquocann@gmail.com', '5732400', 'user', '4297f44b13955235245b2497399d7a93', 0);

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
  `variantID` int(10) NOT NULL,
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

--
-- Dumping data for table `phone`
--

INSERT INTO `phone` (`id`, `name`, `category`, `date`, `detail`, `visible`) VALUES
(3, 'Samsung Galaxy S23', 1, '2023-04-05', '', 1),
(4, 'Samsung Galaxy S23+', 1, '2023-04-05', '', 1),
(5, 'Samsung Galaxy S23 Ultra', 1, '2023-04-05', '', 1),
(6, 'Samsung Galaxy Z Fold 4', 1, '2023-04-05', '', 1),
(7, 'Samsung Galaxy Z Flip 4', 1, '2023-04-05', '', 1);

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
  `variantID` int(11) NOT NULL,
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

--
-- Dumping data for table `supplier`
--

INSERT INTO `supplier` (`id`, `name`, `email`, `phoneNumber`) VALUES
(1, 'Cellphones', 'cellphones@gmail.com', '0909090909'),
(2, 'The gioi di dong', 'thegioididong@gmail.com', '800808080808'),
(3, 'Dien may xanh', 'dienmayxanh@gmail.com', '0102031023');

-- --------------------------------------------------------

--
-- Table structure for table `variant`
--

CREATE TABLE `variant` (
  `id` int(11) NOT NULL,
  `phoneID` int(10) NOT NULL,
  `size` varchar(10) NOT NULL COMMENT 'ram and memory',
  `colorID` int(10) NOT NULL,
  `price` int(50) NOT NULL,
  `quantity` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `variant`
--

INSERT INTO `variant` (`id`, `phoneID`, `size`, `colorID`, `price`, `quantity`) VALUES
(1, 3, '8GB 256GB', 1, 20490000, 10),
(2, 3, '8GB 256GB', 2, 20490000, 10),
(3, 3, '8GB 256GB', 3, 20490000, 10),
(4, 3, '8GB 256GB', 4, 20490000, 10),
(5, 4, '8GB 512GB', 1, 24490000, 10),
(6, 4, '8GB 512GB', 2, 24490000, 10),
(7, 4, '8GB 512GB', 3, 24490000, 10),
(8, 4, '8GB 512GB', 4, 24490000, 10),
(9, 4, '8GB 256GB', 1, 21490000, 10),
(10, 4, '8GB 256GB', 2, 21490000, 10),
(11, 4, '8GB 256GB', 3, 21490000, 10),
(12, 4, '8GB 256GB', 4, 21490000, 10);

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
  ADD KEY `variantID` (`variantID`);

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
  ADD KEY `variantID` (`variantID`);

--
-- Indexes for table `spec`
--
ALTER TABLE `spec`
  ADD PRIMARY KEY (`phoneID`);

--
-- Indexes for table `supplier`
--
ALTER TABLE `supplier`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `variant`
--
ALTER TABLE `variant`
  ADD PRIMARY KEY (`id`),
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
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `order`
--
ALTER TABLE `order`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `phone`
--
ALTER TABLE `phone`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `receipt`
--
ALTER TABLE `receipt`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `supplier`
--
ALTER TABLE `supplier`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `variant`
--
ALTER TABLE `variant`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
