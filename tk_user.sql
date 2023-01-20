-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 20, 2023 at 09:40 AM
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
-- Table structure for table `tk_user`
--

CREATE TABLE `tk_user` (
  `user_id` int(11) NOT NULL,
  `username` varchar(8) NOT NULL DEFAULT '',
  `password` varchar(100) NOT NULL DEFAULT '',
  `nama_user` varchar(100) NOT NULL DEFAULT '',
  `user_akses` int(11) NOT NULL DEFAULT 0,
  `user_status` int(11) NOT NULL DEFAULT 0,
  `created` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tk_user`
--

INSERT INTO `tk_user` (`user_id`, `username`, `password`, `nama_user`, `user_akses`, `user_status`, `created`, `updated`) VALUES
(17, 'admin', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'egiii', 1, 1, '2023-01-20 07:07:25', '2023-01-20 07:07:25');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tk_user`
--
ALTER TABLE `tk_user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tk_user`
--
ALTER TABLE `tk_user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
