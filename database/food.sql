-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 12, 2024 at 08:47 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `food`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `birth` date NOT NULL,
  `gender` varchar(20) NOT NULL,
  `mobile` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `name`, `email`, `password`, `birth`, `gender`, `mobile`) VALUES
(1, 'ahmad', 'ahmad@gmail.com', 'aHmad1@34', '2000-06-14', 'Male', 71653043),
(2, 'ALI', 'ali@gmail.com', 'Al1@34EW', '2017-03-20', 'Male', 81452625),
(3, 'sara', 'sara@gmail.com', 'Sara1!qwe', '2014-01-10', 'Female', 71653474),
(4, 'karim', 'karim@gmail.com', 'Aa@3dassds', '2024-03-13', 'Male', 70456381),
(5, 'ahmad', 'ahmad1@gmail.com', 'adsdaD1#e', '2024-03-27', 'Male', 71653474),
(6, 'sami', 'sami@gmail.com', 'saD2#dsas', '2024-03-20', 'Male', 81452625),
(7, 'isaa', 'issa@gmail.com', 'iS1233#22', '2024-03-12', 'Male', 70541782);

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `image_path` varchar(255) NOT NULL,
  `title_category` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `image_path`, `title_category`) VALUES
(1, 'service-2.jpg', 'Dinners'),
(2, 'service-3.jpg', 'Drinks'),
(3, 'service-1.jpg', 'Breakfast');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `image_path` varchar(255) NOT NULL,
  `price` double(10,2) NOT NULL,
  `description` varchar(255) NOT NULL,
  `category_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `image_path`, `price`, `description`, `category_id`) VALUES
(1, 'menu-1.png', 12.00, 'delicious soup', 1),
(2, 'menu-6.png', 23.00, 'good', 2),
(3, 'menu-3.png', 15.00, 'sdasdas', 1),
(4, 'menu-6.png', 19.00, 'qwweq', 1),
(5, 'menu-4.png', 20.00, 'dsada', 1),
(6, 'menu-2.png', 40.00, 'dadas', 1);

-- --------------------------------------------------------

--
-- Table structure for table `shopping_cart`
--

CREATE TABLE `shopping_cart` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `image_path` varchar(255) NOT NULL,
  `price` double(10,2) NOT NULL,
  `quantity` int(11) NOT NULL,
  `description` varchar(255) NOT NULL,
  `purchaseDate` date DEFAULT '1970-01-01',
  `total_price` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `shopping_cart`
--

INSERT INTO `shopping_cart` (`id`, `user_id`, `image_path`, `price`, `quantity`, `description`, `purchaseDate`, `total_price`) VALUES
(7, 4, 'assets/image/menu-6.png', 69.00, 3, 'Good', '2024-04-12', 149),
(8, 4, 'assets/image/menu-4.png', 40.00, 2, 'Dsada', '2024-04-12', 149),
(9, 4, 'assets/image/menu-2.png', 40.00, 1, 'Dadas', '2024-04-12', 149),
(10, 1, 'assets/image/menu-1.png', 36.00, 3, 'Delicious Soup', '2024-04-12', 89),
(11, 1, 'assets/image/menu-6.png', 38.00, 2, 'Qwweq', '2024-04-12', 89),
(12, 1, 'assets/image/menu-3.png', 15.00, 1, 'Sdasdas', '2024-04-12', 89),
(13, 2, 'assets/image/menu-1.png', 12.00, 1, 'Delicious Soup', '2024-04-12', 114),
(14, 2, 'assets/image/menu-3.png', 45.00, 3, 'Sdasdas', '2024-04-12', 114),
(15, 2, 'assets/image/menu-6.png', 57.00, 3, 'Qwweq', '2024-04-12', 114),
(16, 6, 'assets/image/menu-6.png', 69.00, 3, 'Good', '2024-04-12', 138),
(17, 6, 'assets/image/menu-1.png', 12.00, 1, 'Delicious Soup', '2024-04-12', 138),
(18, 6, 'assets/image/menu-6.png', 57.00, 3, 'Qwweq', '2024-04-12', 138);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `birth` date NOT NULL,
  `gender` varchar(10) NOT NULL,
  `mobile` int(11) NOT NULL,
  `joindate` date NOT NULL,
  `feedback` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `birth`, `gender`, `mobile`, `joindate`, `feedback`) VALUES
(1, 'ahmad', 'ahmad@gmail.com', 'Ahmad1@34', '2012-12-28', 'Male', 71658632, '2024-04-10', 'best website'),
(2, 'sara', 'sara@gmail.com', 'saraD12#4', '2007-06-19', 'Female', 70156289, '2024-04-10', ''),
(3, 'sami', 'sami@gmail.com', 'samI1@34', '2003-12-03', 'Male', 70369358, '2024-04-11', ''),
(4, 'karim', 'karim@gmail.com', 'Karim1@34', '2000-01-01', 'Male', 81045768, '2024-04-12', ''),
(5, 'ali', 'ali@gmail.com', 'Ali1@345', '2024-02-21', 'Male', 7002552, '2024-04-12', ''),
(6, 'yara', 'yara@gmail.com', 'Yara1@34', '2023-12-27', 'Female', 71452785, '2024-04-12', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `shopping_cart`
--
ALTER TABLE `shopping_cart`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `shopping_cart`
--
ALTER TABLE `shopping_cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
