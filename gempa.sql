-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 05 Mar 2020 pada 04.47
-- Versi server: 10.1.38-MariaDB
-- Versi PHP: 7.3.3

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
-- Struktur dari tabel `data2018dst`
--

CREATE TABLE `data2018dst` (
  `no` int(11) NOT NULL,
  `date` varchar(128) NOT NULL,
  `OT(UTC)` time NOT NULL,
  `lat` varchar(128) NOT NULL,
  `long` varchar(128) NOT NULL,
  `mag` varchar(128) NOT NULL,
  `depth` varchar(128) NOT NULL,
  `region` varchar(128) NOT NULL,
  `jarak` varchar(128) NOT NULL,
  `dirasakan` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `data2018dst`
--

INSERT INTO `data2018dst` (`no`, `date`, `OT(UTC)`, `lat`, `long`, `mag`, `depth`, `region`, `jarak`, `dirasakan`) VALUES
(11, '0000-00-00', '20:30:00', '1,42', '98,92', '2,7', '78', 'Darat', 'Di laut,37 Km barat laut Nias Barat,SUMUT', 'tidak'),
(12, '0000-00-00', '12:11:00', '5,28', '96,19', '3,6', '10', 'Laut', 'Di laut,97 Km barat Daya Banda Aceh,ACEH', ''),
(13, '0000-00-00', '00:59:00', '0,55', '100,76', '3,7', '241', 'Darat', 'Di Darat,63 Km barat Laut kampar,RIAU', ''),
(14, '0000-00-00', '04:05:00', '1,18', '99,00', '2,8', '83', 'Darat', 'Di Darat,36 Km barat Daya Padang Sidimpuan,SUMUT', ''),
(15, '0000-00-00', '22:56:00', '0,67', '98,10', '3,3', '31', 'Laut', 'Di laut,34 Km timur laut Teluk dalam,SUMUT', ''),
(16, '0000-00-00', '09:00:00', '5,28', '97,23', '10', '14', 'Laut', 'Di Darat,36 Km barat Daya Padang Sidimpuan,SUMUT', 'Dirasakan II MMI Di SUMUT'),
(26, '01/01/2019', '03:03:35', '1,03', '97,23', '3,2', '14', 'laut', 'di laut, 37 km barat laut nias barat, SUMUT', 'ya');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id`, `username`, `password`) VALUES
(1, 'admin', '$2y$10$E.OjIzVTFm/19jX3HWxIlubZuLIFtb2U8xNE4ltIUNZNTx7Cw4QHu');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `data2018dst`
--
ALTER TABLE `data2018dst`
  ADD PRIMARY KEY (`no`,`date`,`OT(UTC)`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `data2018dst`
--
ALTER TABLE `data2018dst`
  MODIFY `no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
