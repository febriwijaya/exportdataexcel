-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 02, 2020 at 08:07 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `gempa`
--

-- --------------------------------------------------------

--
-- Table structure for table `data2019`
--

CREATE TABLE `data2019` (
  `id` int(11) NOT NULL,
  `date` date NOT NULL,
  `OT` time NOT NULL,
  `M` varchar(50) NOT NULL,
  `Depth` varchar(50) NOT NULL,
  `Latitude` varchar(50) NOT NULL,
  `Longitude` varchar(50) NOT NULL,
  `lokasi` varchar(128) NOT NULL,
  `keterangan` varchar(128) NOT NULL,
  `intensitas` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `data2019`
--

INSERT INTO `data2019` (`id`, `date`, `OT`, `M`, `Depth`, `Latitude`, `Longitude`, `lokasi`, `keterangan`, `intensitas`) VALUES
(2, '2020-03-16', '12:12:00', '3.4', '132 KM', '4.12', '97.33', 'OT+1m 34s Dan OT+4m 23s', 'Manual', 'cerah'),
(3, '2020-03-20', '13:13:00', '3.4', '132', '4.12', '97.33', 'OT+1m 34s Dan OT+4m 23s', 'Manual', 'Cerah');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `data2019`
--
ALTER TABLE `data2019`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `data2019`
--
ALTER TABLE `data2019`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
