-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 10, 2023 at 05:58 AM
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
-- Table structure for table `tk_class`
--

CREATE TABLE `tk_class` (
  `class_id` int(11) NOT NULL,
  `kode_class` varchar(50) NOT NULL DEFAULT '',
  `nama_class` varchar(50) NOT NULL DEFAULT '',
  `status` varchar(50) NOT NULL DEFAULT '',
  `created` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tk_class`
--

INSERT INTO `tk_class` (`class_id`, `kode_class`, `nama_class`, `status`, `created`, `updated`) VALUES
(7, '1', 'peralatan', 'Aktif', '2023-01-10 01:28:02', '2023-01-10 01:28:02'),
(8, '2', 'elektronik', 'Aktif', '2023-01-10 02:03:06', '2023-01-10 02:03:06');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tk_class`
--
ALTER TABLE `tk_class`
  ADD PRIMARY KEY (`class_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tk_class`
--
ALTER TABLE `tk_class`
  MODIFY `class_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
