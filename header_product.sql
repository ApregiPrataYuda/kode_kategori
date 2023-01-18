-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 18, 2023 at 08:05 AM
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
-- Table structure for table `header_product`
--

CREATE TABLE `header_product` (
  `header_id` int(11) NOT NULL,
  `kode_header` varchar(50) NOT NULL DEFAULT '',
  `nama_header` varchar(100) NOT NULL DEFAULT '',
  `berat_satuan` varchar(50) NOT NULL DEFAULT '',
  `description_header` varchar(200) NOT NULL DEFAULT '',
  `kode_subkategori` varchar(50) NOT NULL DEFAULT '',
  `nama_subkategori` varchar(200) NOT NULL DEFAULT '',
  `image` varchar(100) NOT NULL DEFAULT '',
  `total_qty` double NOT NULL DEFAULT 0,
  `price_total` double NOT NULL DEFAULT 0,
  `created` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `header_product`
--

INSERT INTO `header_product` (`header_id`, `kode_header`, `nama_header`, `berat_satuan`, `description_header`, `kode_subkategori`, `nama_subkategori`, `image`, `total_qty`, `price_total`, `created`, `updated`) VALUES
(13, '21001C4000006000001', 'tesdua', '5 MG', 'sasasa', '21001C4000006', 'EPPOS CASH', 'uploads-230118-fcc73d35f1.jpeg', 0, 0, '2023-01-18 06:28:00', '2023-01-18 06:28:00'),
(14, '21001C4000006000002', 'tesf', '1 KG', 'fgfgf', '21001C4000006', 'EPPOS CASH', 'uploads-230118-dcd45c6d00.jpg', 0, 0, '2023-01-18 06:36:20', '2023-01-18 06:36:20');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `header_product`
--
ALTER TABLE `header_product`
  ADD PRIMARY KEY (`header_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `header_product`
--
ALTER TABLE `header_product`
  MODIFY `header_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
