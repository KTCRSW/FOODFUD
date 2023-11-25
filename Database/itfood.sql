-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 24, 2023 at 04:36 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.1.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `itfood`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `CartID` int(11) NOT NULL,
  `RestID` int(11) DEFAULT NULL,
  `UserID` int(11) DEFAULT NULL,
  `MenuID` int(11) DEFAULT NULL,
  `MenuPrice` varchar(255) DEFAULT NULL,
  `MenuQty` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`CartID`, `RestID`, `UserID`, `MenuID`, `MenuPrice`, `MenuQty`) VALUES
(14, 8, 23, 10, '199', 1);

-- --------------------------------------------------------

--
-- Table structure for table `cate_restaurant`
--

CREATE TABLE `cate_restaurant` (
  `CateID` int(11) NOT NULL,
  `CateName` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `cate_restaurant`
--

INSERT INTO `cate_restaurant` (`CateID`, `CateName`) VALUES
(17, 'ฟาสฟู้ด'),
(18, 'ซีฟู้ด');

-- --------------------------------------------------------

--
-- Table structure for table `menu`
--

CREATE TABLE `menu` (
  `MenuID` int(11) NOT NULL,
  `RestID` int(11) DEFAULT NULL,
  `MenuName` varchar(255) DEFAULT NULL,
  `MenuCate` varchar(255) DEFAULT NULL,
  `MenuPrice` int(11) DEFAULT NULL,
  `MenuImg` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `menu`
--

INSERT INTO `menu` (`MenuID`, `RestID`, `MenuName`, `MenuCate`, `MenuPrice`, `MenuImg`) VALUES
(10, 8, 'ต้มยำกุ้ง', 'ซีฟู้ด', 199, 'ต้มยำกุ้ง.png'),
(12, 8, 'ชาเขียวปั่น', 'ชาเขียวปั่น', 55, 'ชาเขียวปั่น.png'),
(13, 9, 'ช็อกโก้', 'ของหวาน', 29, 'ช็อกโก้.png');

-- --------------------------------------------------------

--
-- Table structure for table `menu_category`
--

CREATE TABLE `menu_category` (
  `MenuCateID` int(11) NOT NULL,
  `MenuCateName` varchar(255) NOT NULL,
  `RestID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `menu_category`
--

INSERT INTO `menu_category` (`MenuCateID`, `MenuCateName`, `RestID`) VALUES
(10, 'ซีฟู้ด', 8),
(11, 'ชาเขียวปั่น', 8),
(12, 'ของหวาน', 9);

-- --------------------------------------------------------

--
-- Table structure for table `pending`
--

CREATE TABLE `pending` (
  `PendingID` int(11) NOT NULL,
  `CartID` int(11) DEFAULT NULL,
  `RiderID` int(11) DEFAULT NULL,
  `UserID` int(11) DEFAULT NULL,
  `RestID` int(11) DEFAULT NULL,
  `MenuID` int(11) DEFAULT NULL,
  `Qty` int(11) DEFAULT NULL,
  `PendingDetail` varchar(255) NOT NULL,
  `TotalPrice` int(11) DEFAULT NULL,
  `PendingStatus` int(11) DEFAULT NULL,
  `RestStatus` int(11) DEFAULT NULL,
  `RiderStatus` int(11) DEFAULT NULL,
  `PendingPayment` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `pending`
--

INSERT INTO `pending` (`PendingID`, `CartID`, `RiderID`, `UserID`, `RestID`, `MenuID`, `Qty`, `PendingDetail`, `TotalPrice`, `PendingStatus`, `RestStatus`, `RiderStatus`, `PendingPayment`) VALUES
(5, 6, 25, 23, 8, 10, 1, '145/8 ต.หมากแข้ง อ.เมือง จ.อุดรธานี 4115000225566', 199, 1, 1, 1, 'ชำระเงินปลายทาง'),
(6, 10, 0, 23, 8, 10, 1, '145/8 ต.หมากแข้ง อ.เมือง จ.อุดรธานี 4115000225566', 254, 0, 0, 0, 'ชำระเงินปลายทาง'),
(7, 9, 0, 23, 8, 12, 1, '145/8 ต.หมากแข้ง อ.เมือง จ.อุดรธานี 4115000225566', 55, 0, 0, 0, 'ชำระเงินปลายทาง'),
(8, 11, 0, 23, 8, 12, 1, '145/8 ต.หมากแข้ง อ.เมือง จ.อุดรธานี 4115000225566', 55, 0, 0, 0, 'ชำระเงินปลายทาง'),
(9, 13, 0, 23, 9, 13, 1, '145/8 ต.หมากแข้ง อ.เมือง จ.อุดรธานี 4115000225566', 29, 0, 0, 0, 'ชำระเงินปลายทาง');

-- --------------------------------------------------------

--
-- Table structure for table `restaurant`
--

CREATE TABLE `restaurant` (
  `RestID` int(11) NOT NULL,
  `RestName` varchar(255) DEFAULT NULL,
  `RestCate` varchar(255) DEFAULT NULL,
  `UserID` int(11) DEFAULT NULL,
  `RestDetail` varchar(255) DEFAULT NULL,
  `RestStatus` int(11) DEFAULT NULL,
  `RestImg` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `restaurant`
--

INSERT INTO `restaurant` (`RestID`, `RestName`, `RestCate`, `UserID`, `RestDetail`, `RestStatus`, `RestImg`) VALUES
(8, 'พอใจฟู้ด', 'ฟาสฟู้ด', 24, '225/8 ต.หมากแข้ง อ.เมือง จ.อุดรธานี 41150 / 0959611963', 1, 'พอใจฟู้ด.png'),
(9, 'ร้านใจดี', 'ฟาสฟู้ด', 24, '25/8 ต.หมากแข้ง อ.เมือง จ.อุดรธานี 41150 / 0959611963', 1, 'ร้านใจดี.png');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `UserID` int(11) NOT NULL,
  `UserName` varchar(255) DEFAULT NULL,
  `UserPassword` tinytext DEFAULT NULL,
  `UserRealName` varchar(255) DEFAULT NULL,
  `UserAddress` varchar(255) DEFAULT NULL,
  `UserPhone` varchar(255) DEFAULT NULL,
  `UserRole` varchar(255) DEFAULT NULL,
  `UserStatus` int(11) DEFAULT NULL,
  `UserImg` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`UserID`, `UserName`, `UserPassword`, `UserRealName`, `UserAddress`, `UserPhone`, `UserRole`, `UserStatus`, `UserImg`) VALUES
(2, 'admin', '1235', NULL, NULL, NULL, 'admin', 1, NULL),
(23, 'user01', '1234', 'User', '145/8 ต.หมากแข้ง อ.เมือง จ.อุดรธานี 41150', '00225566', 'Customer', 1, 'user01.png'),
(24, 'owner', '1235', 'owner', '145/8 ต.หมากแข้ง อ.เมือง จ.อุดรธานี 41150', '0959611962', 'Restaurant', 1, 'owner.png'),
(25, 'rider01', '1234', 'RiderO', '233/8 ต.หมากแข้ง อ.เมือง จ.อุดรธานี 41150', '0945552156', 'Rider', 1, 'rider01.png');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`CartID`);

--
-- Indexes for table `cate_restaurant`
--
ALTER TABLE `cate_restaurant`
  ADD PRIMARY KEY (`CateID`);

--
-- Indexes for table `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`MenuID`);

--
-- Indexes for table `menu_category`
--
ALTER TABLE `menu_category`
  ADD PRIMARY KEY (`MenuCateID`);

--
-- Indexes for table `pending`
--
ALTER TABLE `pending`
  ADD PRIMARY KEY (`PendingID`);

--
-- Indexes for table `restaurant`
--
ALTER TABLE `restaurant`
  ADD PRIMARY KEY (`RestID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`UserID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `CartID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `cate_restaurant`
--
ALTER TABLE `cate_restaurant`
  MODIFY `CateID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `menu`
--
ALTER TABLE `menu`
  MODIFY `MenuID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `menu_category`
--
ALTER TABLE `menu_category`
  MODIFY `MenuCateID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `pending`
--
ALTER TABLE `pending`
  MODIFY `PendingID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `restaurant`
--
ALTER TABLE `restaurant`
  MODIFY `RestID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `UserID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
