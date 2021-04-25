-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 24, 2021 at 10:01 PM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 7.3.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `wt_project`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `fname` varchar(10) NOT NULL,
  `lname` varchar(10) NOT NULL,
  `email` varchar(30) NOT NULL,
  `number` varchar(11) NOT NULL,
  `address` varchar(30) NOT NULL,
  `dob` varchar(10) NOT NULL,
  `gender` varchar(6) NOT NULL,
  `password` varchar(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `fname`, `lname`, `email`, `number`, `address`, `dob`, `gender`, `password`) VALUES
(1, 'Admin', 'User', 'admin@gmail.com', '01625100999', 'Dhaka, Bangladesh.', '1/2/99', 'Male', '123');

-- --------------------------------------------------------

--
-- Table structure for table `bonus`
--

CREATE TABLE `bonus` (
  `id` int(11) NOT NULL,
  `email` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `bonus`
--

INSERT INTO `bonus` (`id`, `email`) VALUES
(8, 'm1@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `product_name` varchar(20) NOT NULL,
  `price` int(6) NOT NULL,
  `quantity` int(6) NOT NULL,
  `consumer_email` varchar(30) NOT NULL,
  `vendor_email` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `chat`
--

CREATE TABLE `chat` (
  `id` int(11) NOT NULL,
  `message` text NOT NULL,
  `from` varchar(30) NOT NULL,
  `created` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `chat`
--

INSERT INTO `chat` (`id`, `message`, `from`, `created`) VALUES
(59, 'Hello World!!!!', 'admin@gmail.com', '2021-04-24 18:03:04'),
(60, 'Demo!', 'admin@gmail.com', '2021-04-24 18:03:11'),
(61, 'Hello Admin!!!', 'm1@gmail.com', '2021-04-24 18:03:46'),
(62, 'M2 is here!!', 'm2@gmail.com', '2021-04-24 18:04:12'),
(63, 'M3 is present!', 'm3@gmail.com', '2021-04-24 18:04:39'),
(64, 'Hello!', 'v1@gmail.com', '2021-04-24 19:34:36');

-- --------------------------------------------------------

--
-- Table structure for table `consumer`
--

CREATE TABLE `consumer` (
  `id` int(11) NOT NULL,
  `fname` varchar(10) NOT NULL,
  `lname` varchar(10) NOT NULL,
  `email` varchar(30) NOT NULL,
  `password` varchar(8) NOT NULL,
  `gender` varchar(6) NOT NULL,
  `dob` varchar(10) NOT NULL,
  `number` varchar(11) NOT NULL,
  `address` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `consumer`
--

INSERT INTO `consumer` (`id`, `fname`, `lname`, `email`, `password`, `gender`, `dob`, `number`, `address`) VALUES
(3, 'Consumer', 'One', 'c1@gmail.com', '123', 'male', '2021-04-27', '01625100789', 'Dhaka, Bangladesh'),
(4, 'Consumer', 'Two', 'c2@gmail.com', '123', 'female', '2021-04-14', '01625100789', 'Mirpur, Dhaka'),
(5, 'Consumer', 'Three', 'c3@gmail.com', '123', 'male', '2021-04-20', '01625111000', 'Mirpur, Dhaka');

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `id` int(11) NOT NULL,
  `email` varchar(30) NOT NULL,
  `password` varchar(8) NOT NULL,
  `type` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`id`, `email`, `password`, `type`) VALUES
(23, 'admin@gmail.com', '123', 1),
(25, 'm1@gmail.com', '123', 2),
(26, 'm2@gmail.com', '123', 2),
(27, 'm3@gmail.com', '123', 2),
(28, 'v1@gmail.com', '123', 3),
(29, 'v2@gmail.com', '123', 3),
(30, 'v3@gmail.com', '123', 3),
(31, 'c1@gmail.com', '123', 4),
(32, 'c2@gmail.com', '123', 4),
(33, 'c3@gmail.com', '123', 4);

-- --------------------------------------------------------

--
-- Table structure for table `manager`
--

CREATE TABLE `manager` (
  `id` int(11) NOT NULL,
  `fname` varchar(10) NOT NULL,
  `lname` varchar(10) NOT NULL,
  `email` varchar(30) NOT NULL,
  `password` varchar(8) NOT NULL,
  `number` varchar(11) NOT NULL,
  `gender` varchar(6) NOT NULL,
  `address` varchar(30) NOT NULL,
  `dob` varchar(10) NOT NULL,
  `type` varchar(10) NOT NULL,
  `salary` int(6) NOT NULL,
  `balance` int(11) NOT NULL,
  `admin_Id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `manager`
--

INSERT INTO `manager` (`id`, `fname`, `lname`, `email`, `password`, `number`, `gender`, `address`, `dob`, `type`, `salary`, `balance`, `admin_Id`) VALUES
(1, 'Manager ', 'Technology', 'm1@gmail.com', '123', '01625100789', 'Male', 'Mirpur, Dhaka', '2021-03-30', 'Technology', 50000, 50000, 1),
(2, 'Manager ', 'Health', 'm2@gmail.com', '123', '01625111000', 'Male', 'Mirpur, Dhaka', '2021-04-20', 'Health', 40000, 20000, 1),
(3, 'Manager ', 'Beauty', 'm3@gmail.com', '123', '01625100999', 'Female', 'Mirpur, Dhaka', '2021-04-26', 'Beauty', 38000, 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `manager_complain`
--

CREATE TABLE `manager_complain` (
  `id` int(11) NOT NULL,
  `vemail` varchar(30) NOT NULL,
  `memail` varchar(30) NOT NULL,
  `complain` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `manager_complain`
--

INSERT INTO `manager_complain` (`id`, `vemail`, `memail`, `complain`) VALUES
(10, 'v1@gmail.com', 'm1@gmail.com', 'Complain Against m1!!           '),
(11, 'v2@gmail.com', 'm2@gmail.com', 'Complain against m2!!!');

-- --------------------------------------------------------

--
-- Table structure for table `preorder_approvelist`
--

CREATE TABLE `preorder_approvelist` (
  `id` int(11) NOT NULL,
  `product_name` varchar(20) NOT NULL,
  `price` int(6) NOT NULL,
  `consumer_email` varchar(30) NOT NULL,
  `vendor_email` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `preorder_list`
--

CREATE TABLE `preorder_list` (
  `id` int(11) NOT NULL,
  `product_name` varchar(20) NOT NULL,
  `price` int(6) NOT NULL,
  `consumer_email` varchar(30) NOT NULL,
  `vendor_email` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `preorder_list`
--

INSERT INTO `preorder_list` (`id`, `product_name`, `price`, `consumer_email`, `vendor_email`) VALUES
(3, 'Preorder T1', 4000, 'c1@gmail.com', 'v1@gmail.com'),
(4, 'Preorder H1', 800, 'c1@gmail.com', 'v2@gmail.com'),
(5, 'Preorder B1', 450, 'c1@gmail.com', 'v3@gmail.com'),
(6, 'Preorder T1', 4000, 'c1@gmail.com', 'v1@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `preorder_product`
--

CREATE TABLE `preorder_product` (
  `id` int(11) NOT NULL,
  `name` varchar(20) NOT NULL,
  `quantity` int(6) NOT NULL,
  `price` int(6) NOT NULL,
  `type` varchar(10) NOT NULL,
  `vendor_Id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `preorder_product`
--

INSERT INTO `preorder_product` (`id`, `name`, `quantity`, `price`, `type`, `vendor_Id`) VALUES
(8, 'Preorder T1', 60, 4000, 'Technology', 29),
(9, 'Preorder T2', 40, 5000, 'Technology', 29),
(10, 'Preorder H1', 100, 800, 'Health', 30),
(11, 'Preorder H2', 40, 1200, 'Health', 30),
(12, 'Preorder B1', 30, 450, 'Beauty', 31),
(13, 'Preorder B2', 20, 600, 'Beauty', 31);

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `quantity` int(6) NOT NULL,
  `price` int(6) NOT NULL,
  `type` varchar(10) NOT NULL,
  `image` varchar(250) NOT NULL,
  `vendor_Id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `name`, `quantity`, `price`, `type`, `image`, `vendor_Id`) VALUES
(24, 'XPS 13', 29, 80000, 'Technology', 'images/xps 13.png', 29),
(25, 'MI TV', 24, 65000, 'Technology', 'images/XiaomiTv.png', 29),
(26, 'Lux Soap', 400, 200, 'Beauty', 'images/soap2.jpg', 31),
(27, 'Nivea Lotion', 79, 250, 'Beauty', 'images/lotion1.png', 31),
(28, 'Purell Hand Sanitizer', 150, 220, 'Health', 'images/sanitizer1.jpg', 30),
(29, 'Napa Syrup', 299, 100, 'Health', 'images/Napa syrup.jpg', 30),
(30, 'Nikon D7200', 49, 125000, 'Technology', 'images/Dslr.png', 29),
(31, 'Razer Chroma', 60, 8000, 'Technology', 'images/keyboard.png', 29),
(32, 'Macbook Pro', 20, 180000, 'Technology', 'images/macbook.png', 29),
(33, 'Nivea Facewash', 220, 300, 'Beauty', 'images/facewash1.png', 31),
(34, 'Savlon Soap', 249, 120, 'Beauty', 'images/soap1.jpg', 31),
(35, 'Dettol Hand Sanitizer', 170, 180, 'Health', 'images/sanitizer2.png', 30),
(36, 'RedBull Energy Drink', 309, 150, 'Health', 'images/redbull.png', 30),
(37, 'Protein Shake', 65, 7000, 'Health', 'images/protein.jpg', 30),
(38, 'Himalaya Facewash', 129, 230, 'Beauty', 'images/facewash2.png', 31),
(39, 'Quaker Oats', 200, 570, 'Health', 'images/oats.png', 30),
(40, 'Gaming Headset', 30, 4500, 'Technology', 'images/Headphone.png', 29),
(41, 'Iphone X', 40, 75000, 'Technology', 'images/iphonex.png', 29);

-- --------------------------------------------------------

--
-- Table structure for table `product_review`
--

CREATE TABLE `product_review` (
  `id` int(11) NOT NULL,
  `product_name` varchar(20) NOT NULL,
  `consumer_email` varchar(20) NOT NULL,
  `review_message` text NOT NULL,
  `datetime` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product_review`
--

INSERT INTO `product_review` (`id`, `product_name`, `consumer_email`, `review_message`, `datetime`) VALUES
(16, 'XPS 13', 'c1@gmail.com', 'Nice Device!!!', '2021-04-24 17:45:40'),
(17, 'MI TV', 'c1@gmail.com', 'Nice Device!!!', '2021-04-24 17:45:52'),
(18, 'Lux Soap', 'c1@gmail.com', 'Best Soap!!!      ', '2021-04-24 17:46:17'),
(19, 'XPS 13', 'c2@gmail.com', 'Best Product!!!', '2021-04-24 17:47:15'),
(20, 'MI TV', 'c2@gmail.com', 'Best product!!!', '2021-04-24 17:47:29'),
(21, 'Lux Soap', 'c2@gmail.com', 'Good Quality!!', '2021-04-24 17:47:46'),
(22, 'XPS 13', 'c3@gmail.com', 'Excellent product!!!', '2021-04-24 17:48:46'),
(23, 'MI TV', 'c3@gmail.com', 'Excellent product!!!', '2021-04-24 17:48:58');

-- --------------------------------------------------------

--
-- Table structure for table `sell`
--

CREATE TABLE `sell` (
  `id` varchar(250) NOT NULL,
  `price` int(6) NOT NULL,
  `consumer_email` varchar(30) NOT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sell`
--

INSERT INTO `sell` (`id`, `price`, `consumer_email`, `date`) VALUES
('c1@gmail.com3071852', 80400, 'c1@gmail.com', '2021-04-24 23:52:42'),
('c2@gmail.com1656159', 65340, 'c2@gmail.com', '2021-04-24 23:53:59'),
('c3@gmail.com4498530', 125330, 'c3@gmail.com', '2021-04-24 23:55:10');

-- --------------------------------------------------------

--
-- Table structure for table `sell_table`
--

CREATE TABLE `sell_table` (
  `sell_Id` varchar(250) NOT NULL,
  `product_name` varchar(20) NOT NULL,
  `price` int(6) NOT NULL,
  `quantity` int(6) NOT NULL,
  `consumer_email` varchar(30) NOT NULL,
  `vendor_email` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sell_table`
--

INSERT INTO `sell_table` (`sell_Id`, `product_name`, `price`, `quantity`, `consumer_email`, `vendor_email`) VALUES
('c1@gmail.com3071852', 'XPS 13', 80000, 1, 'c1@gmail.com', 'v1@gmail.com'),
('c1@gmail.com3071852', 'Nivea Lotion', 250, 1, 'c1@gmail.com', 'v3@gmail.com'),
('c1@gmail.com3071852', 'RedBull Energy Drink', 150, 1, 'c1@gmail.com', 'v2@gmail.com'),
('c2@gmail.com1656159', 'MI TV', 65000, 1, 'c2@gmail.com', 'v1@gmail.com'),
('c2@gmail.com1656159', 'Purell Hand Sanitize', 220, 1, 'c2@gmail.com', 'v2@gmail.com'),
('c2@gmail.com1656159', 'Savlon Soap', 120, 1, 'c2@gmail.com', 'v3@gmail.com'),
('c3@gmail.com4498530', 'Nikon D7200', 125000, 1, 'c3@gmail.com', 'v1@gmail.com'),
('c3@gmail.com4498530', 'Himalaya Facewash', 230, 1, 'c3@gmail.com', 'v3@gmail.com'),
('c3@gmail.com4498530', 'Napa Syrup', 100, 1, 'c3@gmail.com', 'v2@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `vendor`
--

CREATE TABLE `vendor` (
  `id` int(11) NOT NULL,
  `fname` varchar(10) NOT NULL,
  `lname` varchar(10) NOT NULL,
  `email` varchar(30) NOT NULL,
  `password` varchar(8) NOT NULL,
  `number` varchar(11) NOT NULL,
  `address` varchar(30) NOT NULL,
  `nid` int(20) NOT NULL,
  `dob` varchar(10) NOT NULL,
  `gender` varchar(6) NOT NULL,
  `vtype` varchar(10) NOT NULL,
  `shop_Name` varchar(20) NOT NULL,
  `balance` int(11) NOT NULL DEFAULT 0,
  `manager_Id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `vendor`
--

INSERT INTO `vendor` (`id`, `fname`, `lname`, `email`, `password`, `number`, `address`, `nid`, `dob`, `gender`, `vtype`, `shop_Name`, `balance`, `manager_Id`) VALUES
(29, 'Vendor', 'Technology', 'v1@gmail.com', '123', '01625100957', 'Tokyo, Japan', 123456, '2021-04-27', 'Male', 'Technology', 'V1 Shop', 270000, 1),
(30, 'Vendor', 'Health', 'v2@gmail.com', '123', '01625100999', 'Mirpur, Dhaka', 123456789, '2021-04-28', 'Male', 'Health', 'V2 Shop', 470, 2),
(31, 'Vendor', 'Beauty', 'v3@gmail.com', '123', '01625100789', 'Tokyo, Japan', 1234567890, '2021-03-30', 'Female', 'Beauty', 'V3 Shop', 600, 3);

-- --------------------------------------------------------

--
-- Table structure for table `vendor-reg-req`
--

CREATE TABLE `vendor-reg-req` (
  `fname` varchar(15) NOT NULL,
  `lname` varchar(15) NOT NULL,
  `email` varchar(30) NOT NULL,
  `number` varchar(15) NOT NULL,
  `address` varchar(15) NOT NULL,
  `nid` int(30) NOT NULL,
  `dob` varchar(15) NOT NULL,
  `gender` varchar(6) NOT NULL,
  `vtype` varchar(15) NOT NULL,
  `shop_Name` varchar(30) NOT NULL,
  `manager_Id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `vendor_complain`
--

CREATE TABLE `vendor_complain` (
  `vemail` varchar(30) NOT NULL,
  `cemail` varchar(30) NOT NULL,
  `datetime` timestamp NOT NULL DEFAULT current_timestamp(),
  `complain` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `vendor_complain`
--

INSERT INTO `vendor_complain` (`vemail`, `cemail`, `datetime`, `complain`) VALUES
('v1@gmail.com', 'c1@gmail.com', '2021-04-24 18:05:44', 'Complain Against v1!!     '),
('v2@gmail.com', 'c1@gmail.com', '2021-04-24 18:06:14', 'Complaints Against V2!!'),
('v3@gmail.com', 'c1@gmail.com', '2021-04-24 18:06:35', 'Complain against V3!!!');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `bonus`
--
ALTER TABLE `bonus`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `chat`
--
ALTER TABLE `chat`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `consumer`
--
ALTER TABLE `consumer`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `manager`
--
ALTER TABLE `manager`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD KEY `manager_Admin` (`admin_Id`);

--
-- Indexes for table `manager_complain`
--
ALTER TABLE `manager_complain`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `preorder_approvelist`
--
ALTER TABLE `preorder_approvelist`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `preorder_list`
--
ALTER TABLE `preorder_list`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `preorder_product`
--
ALTER TABLE `preorder_product`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`),
  ADD KEY `preorder_vendorid` (`vendor_Id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`),
  ADD KEY `product_Vendor` (`vendor_Id`);

--
-- Indexes for table `product_review`
--
ALTER TABLE `product_review`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sell`
--
ALTER TABLE `sell`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sell_table`
--
ALTER TABLE `sell_table`
  ADD KEY `sellTable_Pell` (`sell_Id`);

--
-- Indexes for table `vendor`
--
ALTER TABLE `vendor`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD KEY `vendor_Manager` (`manager_Id`);

--
-- Indexes for table `vendor-reg-req`
--
ALTER TABLE `vendor-reg-req`
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `bonus`
--
ALTER TABLE `bonus`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `chat`
--
ALTER TABLE `chat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;

--
-- AUTO_INCREMENT for table `consumer`
--
ALTER TABLE `consumer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `manager`
--
ALTER TABLE `manager`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `manager_complain`
--
ALTER TABLE `manager_complain`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `preorder_approvelist`
--
ALTER TABLE `preorder_approvelist`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `preorder_list`
--
ALTER TABLE `preorder_list`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `preorder_product`
--
ALTER TABLE `preorder_product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `product_review`
--
ALTER TABLE `product_review`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `vendor`
--
ALTER TABLE `vendor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `manager`
--
ALTER TABLE `manager`
  ADD CONSTRAINT `manager_Admin` FOREIGN KEY (`admin_Id`) REFERENCES `admin` (`id`);

--
-- Constraints for table `preorder_product`
--
ALTER TABLE `preorder_product`
  ADD CONSTRAINT `preorder_vendorid` FOREIGN KEY (`vendor_Id`) REFERENCES `vendor` (`id`);

--
-- Constraints for table `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `product_Vendor` FOREIGN KEY (`vendor_Id`) REFERENCES `vendor` (`id`);

--
-- Constraints for table `sell_table`
--
ALTER TABLE `sell_table`
  ADD CONSTRAINT `sell_table` FOREIGN KEY (`sell_Id`) REFERENCES `sell` (`id`);

--
-- Constraints for table `vendor`
--
ALTER TABLE `vendor`
  ADD CONSTRAINT `vendor_Manager` FOREIGN KEY (`manager_Id`) REFERENCES `manager` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
