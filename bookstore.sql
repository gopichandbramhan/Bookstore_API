-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 02, 2021 at 02:56 PM
-- Server version: 10.4.6-MariaDB
-- PHP Version: 7.1.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bookstore`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_product`
--

CREATE TABLE `tbl_product` (
  `id` int(11) NOT NULL,
  `title` varchar(99) NOT NULL,
  `price` double NOT NULL,
  `description` varchar(500) NOT NULL,
  `category` int(11) NOT NULL,
  `image` varchar(99) NOT NULL,
  `is_in_cart` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_product`
--

INSERT INTO `tbl_product` (`id`, `title`, `price`, `description`, `category`, `image`, `is_in_cart`) VALUES
(1, 'Book ', 150, 'this is test book', 1, 'images/product1.png', 0),
(2, 'Book ', 150, 'this is test book', 1, 'images/product1.png', 0),
(3, 'Book ', 150, 'this is test book', 1, 'images/product1.png', 0),
(4, 'Book ', 150, 'this is test book', 1, 'images/product1.png', 1),
(5, 'Book ', 150, 'this is test book', 1, 'images/product1.png', 0),
(6, 'Book ', 150, 'this is test book', 1, 'images/product1.png', 1),
(7, 'Book ', 150, 'this is test book', 1, 'images/product1.png', 0),
(8, 'Book ', 150, 'this is test book', 1, 'images/product1.png', 0),
(9, 'Book ', 150, 'this is test book', 1, 'images/product1.png', 0),
(10, 'Book ', 150, 'this is test book', 1, 'images/product1.png', 0),
(11, 'Book ', 150, 'this is test book', 1, 'images/product1.png', 0),
(12, 'Book ', 150, 'this is test book', 1, 'images/product1.png', 0),
(13, 'Book ', 150, 'this is test book', 1, 'images/product1.png', 0),
(14, 'Book ', 150, 'this is test book', 1, 'images/product1.png', 0),
(15, 'Book ', 150, 'this is test book', 1, 'images/product1.png', 0),
(16, 'Book ', 150, 'this is test book', 1, 'images/product1.png', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE `tbl_user` (
  `id` int(11) NOT NULL,
  `username` varchar(99) NOT NULL,
  `password` varchar(99) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_product`
--
ALTER TABLE `tbl_product`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_product`
--
ALTER TABLE `tbl_product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
