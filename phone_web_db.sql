-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 08, 2023 at 03:54 AM
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
  `cpuType` varchar(255) NOT NULL,
  `bodySize` varchar(255) NOT NULL,
  `bodyWeight` varchar(255) NOT NULL,
  `screenFeature` varchar(255) NOT NULL,
  `screenResolution` varchar(50) NOT NULL,
  `screenSize` varchar(255) NOT NULL,
  `screenTech` varchar(255) NOT NULL,
  `os` varchar(50) NOT NULL,
  `videoCapture` varchar(255) NOT NULL,
  `cameraFront` varchar(255) NOT NULL,
  `cameraBack` varchar(255) NOT NULL,
  `cameraFeature` varchar(255) NOT NULL,
  `batery` varchar(255) NOT NULL,
  `sim` varchar(50) NOT NULL,
  `networkSupport` varchar(50) NOT NULL,
  `wifi` varchar(255) NOT NULL,
  `misc` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `spec`
--

INSERT INTO `spec` (`phoneID`, `chipset`, `cpuType`, `bodySize`, `bodyWeight`, `screenFeature`, `screenResolution`, `screenSize`, `screenTech`, `os`, `videoCapture`, `cameraFront`, `cameraBack`, `cameraFeature`, `batery`, `sim`, `networkSupport`, `wifi`, `misc`) VALUES
(3, 'Snapdragon 8 Gen 2', '1 nhân 3.36 GHz, 4 nhân 2.8 GHz & 3 nhân 2 GHz', '146.3 x 70.9 x 7.6 mm', '168g', 'Tần số quét 120Hz, Kính cường lực Corning Gorilla Glass Victus 2, Độ sáng tối đa: 1750 nits', '1080 x 2340 pixels (FullHD+)', '6.1 inches', 'Dynamic AMOLED 2X', 'Android 13, One UI 5.1', '\r\nFullHD 1080p@30fps, 4K 2160p@60fps, HD 720p@30fps, 8K 4320p@24fps, 8K 4320p@30fps', '12MPc', 'Chính 50 MP & Phụ 12 MP, 10 MP', 'Quay Siêu chậm\r\n, AI Camera\r\n, Chuyên nghiệp (Pro)\r\n, Tự động lấy nét (AF)\r\n, Toàn cảnh (Panorama)\r\n, Chống rung quang học (OIS)\r\n, Ảnh Raw\r\n, Ban đêm (Night Mode)\r\n, Trôi nhanh thời gian (Time Lapse)\r\n, Zoom quang học\r\n, Nhãn dán (AR Stickers)\r\n, Làm đẹ', '3900 mAh, USB Type-C, Sạc pin nhanh, Sạc không dây, Sạc ngược không dây', '2 Nano-SIM + eSIM', '5G', 'Dual-band (2.4 GHz/5 GHz), Wi-Fi Direct, Wi-Fi 802.11 a/b/g/n/ac/ax, 6 GHz', 'Cảm biến vân tay trong màn hình, Hỗ trợ 5G, Sạc không dây, Bảo mật vân tay, Nhận diện khuôn mặt, Kháng nước, kháng bụi'),
(4, 'Snapdragon 8 Gen 2', '1x3.2 GHz Cortex-X3 & 2x2.8 GHz Cortex-A715 & 2x2.8 GHz Cortex-A710 & 3x2.0 GHz Cortex-A510', '\r\n157.8 x 76.2 x 7.6 mm', '195g', 'Tần số quét 120Hz, HDR10+, Kính cường lực Corning® Gorilla® Glass Victus® 2c', '1080 x 2340 pixels (FullHD+)', '6.6 inches', 'Dynamic AMOLED 2X', 'Android 13, One UI 5.1', '8K@24/30fps, 4K@30/60fps, 1080p@30/60/240fps, 720p@960fps, HDR10+, stereo sound rec., gyro-EIS', '12MP, f/2.2', 'Camera chính góc rộng: 50 MP, f/1.8, Dual Pixel PDAF, OIS, Camera tele: 10 MP, f/2, 3x optical zoom, Camera góc siêu rộng:12 MP, f/2.2', 'Quay Siêu chậm (Super Slow Motion), AI Camera, Chuyên nghiệp (Pro), Tự động lấy nét (AF), Toàn cảnh (Panorama), Ảnh Raw, Ban đêm (Night Mode), Zoom quang học, Nhãn dán (AR Stickers), Làm đẹp, Live Photo, Bộ lọc màu, Trôi nhanh thời gian (Time Lapse), Góc ', '4700 mAh, USB Type-C, Sạc nhanh 45 W, sạc không dây 15W, chia sẻ pin không dây', '2 SIM (nano‑SIM và eSIM)', '5G', 'Wi-Fi 802.11 a/b/g/n/ac/6e, tri-band, Wi-Fi Direct', 'Cảm biến vân tay trong màn hình, Cảm biến gia tốc, La bàn, Con quay hồi chuyển, Cảm biến áp kế, Hỗ trợ 5G, Sạc không dây, Bảo mật vân tay, Nhận diện khuôn mặt, Kháng nước, kháng bụi'),
(5, 'Snapdragon 8 Gen 2 (4 nm)', '1x3.36 GHz Cortex-X3 & 2x2.8 GHz Cortex-A715 & 2x2.8 GHz Cortex-A710 & 3x2.0 GHz Cortex-A510', '163.4 x 78.1 x 8.9 mm', '234g', '120Hz, HDR10+, 1750 nits, Gorilla Glass Victus 2', '1440 x 3088 pixels (QHD+)', '6.8 inches', 'Dynamic AMOLED 2X', 'Android 13, One UI 5.1', '8K@24/30fps, 4K@30/60fps, 1080p@30/60/240fps, 720p@960fps, HDR10+, stereo sound rec., gyro-EIS', '\r\n12MP F2.2 (Dual Pixel AF)', 'Siêu rộng: 12MP F2.2 (Dual Pixel AF), Chính: 200MP F1.7 OIS ±3° (Super Quad Pixel AF), Tele 1: 10MP F4.9 (10X, Dual Pixel AF) OIS,Tele 2: 10MP F2.4 (3X, Dual Pixel AF) OIS Thu phóng chuẩn không gian 100X', 'Quay Siêu chậm (Super Slow Motion), Chuyên nghiệp (Pro), Tự động lấy nét (AF), HDR, Toàn cảnh (Panorama), Ảnh Raw, Ban đêm (Night Mode), Zoom quang học, \r\nLàm đẹp, Live Photo, Bộ lọc màu, Trôi nhanh thời gian (Time Lapse), Góc siêu rộng (Ultrawide), Góc r', '\r\n5.000mAh, USB Type-C, Sạc có dây: 45W có dây\r\nSạc không dây: 15W (Qi/PMA)\r\nChia sẻ pin không dây', '\r\n2 Nano-SIM + eSIM', '5G', 'Wi-Fi 802.11 a/b/g/n/ac/6e, tri-band, Wi-Fi Direct', 'Cảm biến vân tay trong màn hình, Cảm biến gia tốc, Cảm biến tiệm cận, La bàn, Con quay hồi chuyển, Cảm biến áp kế\r\n'),
(6, 'Snapdragon 8 Plus Gen 1', '1 nhân 3.18 GHz, 3 nhân 2.7 GHz & 4 nhân 2 GHz', 'Kích thước khi gập lại: 155.1 x 130.1 x 6.3 mm, Kích thước khi máy mở ra: 155.1 x 67.1 x 14.2-15.8 mm', '263g', 'Màn hình chính: 7,6 inch QXGA + Dynamic AMOLED 2X, 120Hz, Màn hình phụ: 6.2 inch HD + AMOLED, 120Hz', '2176 x 1812 pixels (QXGA+)', '\r\n7.6 inches', 'AMOLED', 'Android 12, One UI 5.1', 'UHD 8K (7680 x 4320)@24fps', '10MP (bên ngoài) + 4MP (dưới màn hình)', 'Camera chính: 50MP, f/1.8, Camera góc siêu rộng: 12MP, f/2.2, Camera tele: 10MP, f/2.4 (3x zoom)', 'Quay Siêu chậm (Super Slow Motion), Chuyên nghiệp (Pro), Tự động lấy nét (AF), HDR, Toàn cảnh (Panorama), Ảnh Raw, Ban đêm (Night Mode), Zoom quang học, \r\nLàm đẹp, Live Photo, Bộ lọc màu, Trôi nhanh thời gian (Time Lapse), Góc siêu rộng (Ultrawide), Quay ', '4,400 mAhc, \r\nUSB Type-C, Sạc nhanh 25 W', '2 SIM (nano‑SIM và eSIM)', '5G', '802.11 a/b/g/n/ac/ax 2.4G+5GHz+6GHz, HE160, MIMO, 1024-QAM', 'Hỗ trợ 5G, Sạc không dây, Bảo mật vân tay, Nhận diện khuôn mặt, Kháng nước, kháng bụi, Cảm biến gia tốc, Cảm biến tiệm cận, Cảm biến ánh sáng, La bàn, Cảm biến áp kế, Cảm biến vân tay cạnh bên');

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
