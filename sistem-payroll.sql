-- phpMyAdmin SQL Dump
-- version 5.3.0-dev+20220601.866861edac
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 02, 2022 at 02:53 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sistem-payroll`
--

-- --------------------------------------------------------

--
-- Table structure for table `antrian_registrasi`
--

CREATE TABLE `antrian_registrasi` (
  `id` int(20) NOT NULL,
  `username` varchar(59) NOT NULL,
  `email` varchar(59) NOT NULL,
  `password` varchar(299) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `antrian_registrasi`
--

INSERT INTO `antrian_registrasi` (`id`, `username`, `email`, `password`) VALUES
(6, 'agus', 'agus@gmail.com', '$2y$10$pvOcNDlYYJQ2tGaW8oW/YO1DpRgqi5zOnzfvLrvxVTiI7zRybplhC'),
(7, 'afiq', 'afiq@gmail.com', '$2y$10$LnKNnNkvQQwi0RLAsUZTsu2fwRcBqPv7htWUPi.H78qZFB3cjlV0e'),
(8, 'angga', 'angga@gmail.com', '$2y$10$uj8BwJ2/T6fFEYqQIX5DA.6NxhbR5xK/KxqccNOVWOM57EUzh9jBu'),
(9, 'ayu', 'ayu@gmail.com', '$2y$10$yGIYseTm8qwmu6QSt2wRSu05M90I6YRmGK69rkjXOqibRLrlKBAou'),
(10, 'agnes', 'agnes@gmail.com', '$2y$10$j1VQgqN/ZrJC0dRfve5imeMl9jJe9dEk8yBINb.XPBAUqlLeg.iDO');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(20) NOT NULL,
  `username` varchar(59) NOT NULL,
  `password` varchar(299) NOT NULL,
  `email` varchar(59) NOT NULL,
  `jabatan` varchar(59) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `email`, `jabatan`) VALUES
(2, 'admin', '$2y$10$LhATOSOHZY3Eu8REpCGk/.DjpbqKS7PpdA64hvaK4I6huzf0Vi.6.', 'admin@gmail.com', 'admin'),
(10, 'josua', '$2y$10$VSQDBi2iXEhoyTyOyLKXiuMJc06RgBgZlRiwfxjvxYNTm1zFQCAyq', 'josua@gmail.com', 'karyawan'),
(11, 'bright', '$2y$10$LhATOSOHZY3Eu8REpCGk/.DjpbqKS7PpdA64hvaK4I6huzf0Vi.6.', 'bright@gmail.com', 'hrd'),
(13, 'raihan', '$2y$10$w5ABsHPV/yq.vh1.I1aDK.7OPR/VyDeeR2cBPD1c/83vyvRWMyzyq', 'raihan@gmail.com', 'admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `antrian_registrasi`
--
ALTER TABLE `antrian_registrasi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `antrian_registrasi`
--
ALTER TABLE `antrian_registrasi`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;



