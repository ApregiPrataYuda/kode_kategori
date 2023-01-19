-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 19, 2023 at 10:23 AM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 7.4.20

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `u5985248_nobby`
--

-- --------------------------------------------------------

--
-- Table structure for table `detail_product`
--

CREATE TABLE `detail_product` (
  `detail_id` int(11) NOT NULL,
  `kode_header` varchar(50) DEFAULT '',
  `kode_product` varchar(50) DEFAULT '',
  `nama_product` varchar(100) DEFAULT '',
  `kondisi` varchar(100) DEFAULT '',
  `warna` varchar(100) DEFAULT '',
  `type_product` varchar(50) DEFAULT '',
  `qty` double DEFAULT 0,
  `price_satuan` double DEFAULT 0,
  `total_price` double DEFAULT 0,
  `description` varchar(200) DEFAULT '',
  `created` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `detail_product`
--

INSERT INTO `detail_product` (`detail_id`, `kode_header`, `kode_product`, `nama_product`, `kondisi`, `warna`, `type_product`, `qty`, `price_satuan`, `total_price`, `description`, `created`, `updated`) VALUES
(10, '21001001001', '210010010010001', 'laptopsssk', 'Second', 'Red', 'xv', 5, 5000, 25000, 'sdsdsdsdsdsd', '2023-01-19 07:43:52', '2023-01-19 07:43:52'),
(11, '21001001001', '210010010010002', 'dfdf', 'New', 'Red', 'dfdfd', 1, 10000, 10000, 'sdsdsdsd', '2023-01-19 08:37:51', '2023-01-19 08:37:51'),
(12, '11001001001', '110010010010001', 'TES', 'New', 'Blue', 'dsd', 4, 4000, 16000, 'sdsdsd', '2023-01-19 09:12:56', '2023-01-19 09:12:56');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `detail_product`
--
ALTER TABLE `detail_product`
  ADD PRIMARY KEY (`detail_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `detail_product`
--
ALTER TABLE `detail_product`
  MODIFY `detail_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
