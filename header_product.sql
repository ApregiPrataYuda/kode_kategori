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
-- Table structure for table `header_product`
--

CREATE TABLE `header_product` (
  `header_id` int(11) NOT NULL,
  `kode_header` varchar(50) NOT NULL DEFAULT '',
  `nama_header` varchar(100) NOT NULL DEFAULT '',
  `berat_satuan` varchar(50) NOT NULL DEFAULT '',
  `description_header` varchar(1000) NOT NULL DEFAULT '',
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
(21, '21001001001', 'Laptop asus', '1 KG', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum', '21001001', 'Laptop', 'uploads-230119-20bf4c02f8.jpg', 6, 35000, '2023-01-19 02:26:57', '2023-01-19 02:26:57'),
(22, '11001001001', 'tshirt', '0.5 MG', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum', '11001001', 'Uniqlo Tshirt', 'uploads-230119-0f3f908626.jpeg', 4, 16000, '2023-01-19 02:32:25', '2023-01-19 02:32:25');

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
  MODIFY `header_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
