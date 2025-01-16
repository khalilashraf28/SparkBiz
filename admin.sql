-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 14, 2024 at 09:23 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `admin`
--

-- --------------------------------------------------------

--
-- Table structure for table `brand`
--

CREATE TABLE `brand` (
  `id` int(11) NOT NULL,
  `name` varchar(500) DEFAULT NULL,
  `email` varchar(1000) DEFAULT NULL,
  `productN` varchar(500) DEFAULT NULL,
  `phone` bigint(20) DEFAULT NULL,
  `productT` varchar(100) DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `addinfo` text DEFAULT NULL,
  `date` date DEFAULT NULL,
  `price` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `brand`
--

INSERT INTO `brand` (`id`, `name`, `email`, `productN`, `phone`, `productT`, `quantity`, `addinfo`, `date`, `price`) VALUES
(2, 'John Doe', 'john.doe@example.com', 'logo design', 1234567890, 'branding', 2, 'Unique color palette', '2023-12-22', 15000),
(3, 'Jane Smith', 'jane.smith@example.com', 'product packaging', 9876543210, 'branding', 1, '', '2024-01-14', 12000),
(5, 'Bob Williams', 'bob.williams@example.com', 'brand identity', 7890123456, 'branding', 1, '', '2024-01-14', 8000),
(6, 'Eva Davis', 'eva.davis@example.com', 'label design', 6543210987, 'branding', 1, 'Minimalist style', '2024-01-14', 10000),
(7, 'Michael Wilson', 'michael.wilson@example.com', 'branding package', 9876543210, 'branding', 2, 'Typography focus', '2024-01-14', 15000),
(8, 'Olivia Brown', 'olivia.brown@example.com', 'product label', 1234567890, 'branding', 1, '', '2023-12-15', 12000),
(9, 'Daniel Miller', 'daniel.miller@example.com', 'logo redesign', 5551234567, 'branding', 3, 'Custom font', '2024-01-14', 20000),
(10, 'Sophia Lee', 'sophia.lee@example.com', 'branding consultation', 7890123456, 'branding', 1, 'Color psychology', '2024-01-14', 8000),
(11, 'Jackson Garcia', 'jackson.garcia@example.com', 'product logo', 6543210987, 'branding', 1, 'Versatile design', '2024-01-14', 10000),
(24, 'Muhammad Khalil Ashraf', 'khalilashraf28@gmail.com', '+923098627770', 923098627770, 'branding', 1, '', '2024-01-14', 7000);

--
-- Triggers `brand`
--
DELIMITER $$
CREATE TRIGGER `trgBeforeDeletebrand` BEFORE DELETE ON `brand` FOR EACH ROW INSERT INTO project_completed (id, name, email, productN, phone, productT, quantity, date, price, status)
VALUES (OLD.id, OLD.name, OLD.email, OLD.productN, OLD.phone, OLD.productT, OLD.quantity, CURDATE(), OLD.price, 'COMPLETED')
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `email` varchar(500) NOT NULL,
  `phone` bigint(20) NOT NULL,
  `question` text NOT NULL,
  `date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`id`, `name`, `email`, `phone`, `question`, `date`) VALUES
(2, 'inshara ', 'inshara@gmail.com', 123546789, 'want a logo for my website', '2024-01-14');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `id` int(11) NOT NULL,
  `fname` varchar(500) NOT NULL,
  `lname` varchar(500) NOT NULL,
  `username` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `phone` bigint(20) NOT NULL,
  `gender` varchar(50) NOT NULL,
  `sques` varchar(1000) NOT NULL,
  `sans` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`id`, `fname`, `lname`, `username`, `password`, `phone`, `gender`, `sques`, `sans`) VALUES
(1, 'Muhammad Khalil', 'Ashraf', 'khalilashraf28@gmail.com', '123', 3098627770, 'male', 'old_phone', '03333019045'),
(2, 'huzaifa', 'asasdf', 'Huzaifa@gmail.com', '$2y$10$jxV1YK0950fmo/AZWphhfOsgvENIQB9KQhLhhTd6qWp/J7NcS3obC', 3098627770, 'male', 'old_phone', '28');

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `id` int(11) NOT NULL,
  `fname` varchar(500) NOT NULL,
  `lname` varchar(500) NOT NULL,
  `username` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `phone` bigint(20) NOT NULL,
  `gender` varchar(50) NOT NULL,
  `sques` varchar(1000) NOT NULL,
  `sans` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`id`, `fname`, `lname`, `username`, `password`, `phone`, `gender`, `sques`, `sans`) VALUES
(19, 'i', 'adsf', 'i', '$2y$10$4O6xBQQpjTLZhXqwm1jOp.TbNHoL2GCpmRxbki5NF1mYdArjD20E2', 12341111111, 'Male', 'old_phone', '12'),
(20, 'i', 'adsf', 'khalilashraf28@gmail.com', '$2y$10$zMn1ENv23YvySuRiBQdSxO2bT2APRB2zKSckV1o0Y0Pq./9VxcvGi', 12341111111, 'male', 'old_phone', '12');

-- --------------------------------------------------------

--
-- Table structure for table `logo`
--

CREATE TABLE `logo` (
  `id` int(11) NOT NULL,
  `name` varchar(500) DEFAULT NULL,
  `email` varchar(1000) DEFAULT NULL,
  `productN` varchar(500) DEFAULT NULL,
  `phone` bigint(20) DEFAULT NULL,
  `productT` varchar(100) DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `addinfo` text DEFAULT NULL,
  `date` date DEFAULT NULL,
  `price` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `logo`
--

INSERT INTO `logo` (`id`, `name`, `email`, `productN`, `phone`, `productT`, `quantity`, `addinfo`, `date`, `price`) VALUES
(2, 'Jane Smith', 'jane.smith@example.com', '+9876543210', 9876543210, 'logoD', 3, 'Sample info 2', '2017-03-14', 10000),
(5, 'Eva Wilson', 'eva.wilson@example.com', '+1122334455', 1122334455, 'logoD', 2, 'Sample info 5', '2024-01-14', 10000),
(6, 'David Miller', 'david.miller@example.com', '+1234567890', 1234567890, 'logoD', 3, 'Sample info 6', '2024-01-14', 10000),
(7, 'Sophia Brown', 'sophia.brown@example.com', '+9988776655', 9988776655, 'logoD', 1, 'Sample info 7', '2024-01-14', 10000),
(9, 'Olivia Harris', 'olivia.harris@example.com', '+1234567890', 1234567890, 'logoD', 1, 'Sample info 9', '2024-01-14', 10000),
(11, 'Emma Clark', 'emma.clark@example.com', '+9988776655', 9988776655, 'logoD', 2, 'Sample info 11', '2024-01-14', 10000),
(12, 'James Garcia', 'james.garcia@example.com', '+9876543210', 9876543210, 'logoD', 3, 'Sample info 12', '2024-01-14', 10000),
(13, 'Ava Martin', 'ava.martin@example.com', '+1234567890', 1234567890, 'logoD', 1, 'Sample info 13', '2023-12-22', 10000),
(14, 'Samuel Martinez', 'samuel.martinez@example.com', '+1122334455', 1122334455, 'logoD', 3, 'Sample info 14', '2024-01-14', 10000),
(15, 'Lily Wright', 'lily.wright@example.com', '+9988776655', 9988776655, 'logoD', 2, 'Sample info 15', '2024-01-14', 10000),
(16, 'Michael Turner', 'michael.turner@example.com', '+9876543210', 9876543210, 'logoD', 1, 'Sample info 16', '2024-01-14', 10000);

--
-- Triggers `logo`
--
DELIMITER $$
CREATE TRIGGER `trgBeforeDeletelogo` BEFORE DELETE ON `logo` FOR EACH ROW INSERT INTO project_completed (id, name, email, productN, phone, productT, quantity, date, price, status)
VALUES (OLD.id, OLD.name, OLD.email, OLD.productN, OLD.phone, OLD.productT, OLD.quantity, CURDATE(), OLD.price, 'COMPLETED')
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `project_completed`
--

CREATE TABLE `project_completed` (
  `id` int(11) NOT NULL,
  `name` varchar(500) DEFAULT NULL,
  `email` varchar(1000) DEFAULT NULL,
  `productN` varchar(500) DEFAULT NULL,
  `phone` bigint(20) DEFAULT NULL,
  `productT` varchar(100) DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `price` int(11) NOT NULL,
  `status` varchar(50) DEFAULT 'COMPLETED'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `project_completed`
--

INSERT INTO `project_completed` (`id`, `name`, `email`, `productN`, `phone`, `productT`, `quantity`, `date`, `price`, `status`) VALUES
(1, 'John Doe', 'john.doe@example.com', '+1234567890', 1234567890, 'logoD', 2, '2024-01-15', 10000, 'COMPLETED'),
(4, 'Alice Johnson', 'alice.johnson@example.com', 'company logo', 5551234567, 'branding', 3, '2024-01-15', 20000, 'COMPLETED'),
(6, 'Eva Davis', 'eva.davis@example.com', 'landing page', 6543210987, 'webD', 1, '2023-12-12', 10000, 'COMPLETED'),
(8, 'Olivia Brown', 'olivia.brown@example.com', 'portfolio website', 1234567890, 'webD', 1, '2024-01-14', 12000, 'COMPLETED'),
(10, 'William Taylor', 'william.taylor@example.com', '+1122334455', 1122334455, 'logoD', 4, '2024-01-14', 10000, 'COMPLETED'),
(16, 'Muhammad Khalil Ashraf', 'khalilashraf28@gmail.com', '+923098627770', 923098627770, 'webD', 1, '2024-01-14', 20000, 'COMPLETED'),
(19, 'Chloe Robinson', 'chloe.robinson@example.com', '+9988776655', 9988776655, 'logoD', 3, '2024-01-14', 10000, 'COMPLETED'),
(23, 'Muhammad Khalil Ashraf', 'khalilashraf28@gmail.com', '+923098627770', 923098627770, 'branding', 1, '2024-01-14', 7000, 'COMPLETED');

-- --------------------------------------------------------

--
-- Table structure for table `web`
--

CREATE TABLE `web` (
  `id` int(11) NOT NULL,
  `name` varchar(500) DEFAULT NULL,
  `email` varchar(1000) DEFAULT NULL,
  `productN` varchar(500) DEFAULT NULL,
  `phone` bigint(20) DEFAULT NULL,
  `productT` varchar(100) DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `addinfo` text DEFAULT NULL,
  `date` date DEFAULT NULL,
  `price` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `web`
--

INSERT INTO `web` (`id`, `name`, `email`, `productN`, `phone`, `productT`, `quantity`, `addinfo`, `date`, `price`) VALUES
(1, 'Jackson Garcia', 'jackson.garcia@example.com', 'e-commerce website', 6543210987, 'webD', 1, 'Payment gateway integration', '2024-01-14', 10000),
(2, 'John Doe', 'john.doe@example.com', 'business website', 1234567890, 'webD', 2, 'Custom design', '2024-01-14', 15000),
(3, 'Jane Smith', 'jane.smith@example.com', 'portfolio website', 9876543210, 'webD', 1, '', '2024-01-14', 12000),
(4, 'Alice Johnson', 'alice.johnson@example.com', 'e-commerce website', 5551234567, 'webD', 3, 'Payment integration', '2023-12-20', 20000),
(5, 'Bob Williams', 'bob.williams@example.com', 'personal blog', 7890123456, 'webD', 1, '', '2024-01-14', 8000),
(7, 'Michael Wilson', 'michael.wilson@example.com', 'company website', 9876543210, 'webD', 2, 'SEO optimization', '2024-01-14', 15000),
(9, 'Daniel Miller', 'daniel.miller@example.com', 'blog site', 5551234567, 'webD', 3, 'Custom theme', '2024-01-14', 20000),
(10, 'Sophia Lee', 'sophia.lee@example.com', 'landing page', 7890123456, 'webD', 1, 'Interactive elements', '2023-12-14', 8000);

--
-- Triggers `web`
--
DELIMITER $$
CREATE TRIGGER `trgBeforeDeleteweb` BEFORE DELETE ON `web` FOR EACH ROW INSERT INTO project_completed (id, name, email, productN, phone, productT, quantity, date, price, status)
VALUES (OLD.id, OLD.name, OLD.email, OLD.productN, OLD.phone, OLD.productT, OLD.quantity, CURDATE(), OLD.price, 'COMPLETED')
$$
DELIMITER ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `brand`
--
ALTER TABLE `brand`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `logo`
--
ALTER TABLE `logo`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `project_completed`
--
ALTER TABLE `project_completed`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `web`
--
ALTER TABLE `web`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `brand`
--
ALTER TABLE `brand`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `logo`
--
ALTER TABLE `logo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `project_completed`
--
ALTER TABLE `project_completed`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `web`
--
ALTER TABLE `web`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
