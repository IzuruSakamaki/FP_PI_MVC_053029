-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: May 16, 2020 at 08:03 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `fp`
--

-- --------------------------------------------------------

--
-- Table structure for table `identitas`
--

CREATE TABLE `identitas` (
  `no` int(11) NOT NULL,
  `id` varchar(50) NOT NULL,
  `pass` varchar(50) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `alamat` varchar(50) NOT NULL,
  `usia` int(3) NOT NULL,
  `pekerjaan` varchar(50) NOT NULL,
  `ktp` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `identitas`
--

INSERT INTO `identitas` (`no`, `id`, `pass`, `nama`, `alamat`, `usia`, `pekerjaan`, `ktp`) VALUES
(1, 'admin', 'admin', 'Mumbah', 'Not Found', 99, 'Admin', 9999999999999999),
(2, 'GM', 'admin', 'Game Master', 'Not Found', 99, 'Scriptor', 8888888888888888),
(3, 'GM2', 'admin', 'Game Master 2', 'Not Found', 99, 'Scriptor', 7777777777777777),
(11, 'Dida', 'dida', 'Dida', 'Kebayoran Jadul gang Jurang nomor 69 Suralayar', 69, 'Pengangguran', 1234567890123456);

-- --------------------------------------------------------

--
-- Table structure for table `identitas_sumbangan`
--

CREATE TABLE `identitas_sumbangan` (
  `no` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `alamat` varchar(50) NOT NULL,
  `kategori` varchar(50) NOT NULL,
  `banyak` float NOT NULL,
  `satuan` varchar(50) NOT NULL,
  `deskripsi` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `identitas_sumbangan`
--

INSERT INTO `identitas_sumbangan` (`no`, `nama`, `alamat`, `kategori`, `banyak`, `satuan`, `deskripsi`) VALUES
(1, 'Adi Hidayat', 'Kedungcowek gang Kembang nomor 41 Jawakarta', 'Beras', 3, 'Kilogram', 'Bantuan untuk menjaga bahan makanan pokok di tempat yang terjangkit Corona');

-- --------------------------------------------------------

--
-- Table structure for table `log_penyaluran`
--

CREATE TABLE `log_penyaluran` (
  `no` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `jenis` varchar(50) NOT NULL,
  `kategori` varchar(50) NOT NULL,
  `banyak` float NOT NULL,
  `satuan` varchar(50) NOT NULL,
  `berita_acara` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `log_penyaluran`
--

INSERT INTO `log_penyaluran` (`no`, `nama`, `jenis`, `kategori`, `banyak`, `satuan`, `berita_acara`) VALUES
(1, 'Anonim', 'Bahan Makanan', 'Beras', 3, 'Kilogram', 'Dana telah disalurkan melalu pihak terkait');

-- --------------------------------------------------------

--
-- Table structure for table `log_sumbangan`
--

CREATE TABLE `log_sumbangan` (
  `no` int(11) NOT NULL,
  `id` varchar(50) NOT NULL,
  `jenis` varchar(50) NOT NULL,
  `kategori` varchar(50) NOT NULL,
  `banyak` float NOT NULL,
  `satuan` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `sumbangan`
--

CREATE TABLE `sumbangan` (
  `no` int(11) NOT NULL,
  `jenis` varchar(50) NOT NULL,
  `kategori` varchar(50) NOT NULL,
  `banyak` float NOT NULL,
  `satuan` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sumbangan`
--

INSERT INTO `sumbangan` (`no`, `jenis`, `kategori`, `banyak`, `satuan`) VALUES
(1, 'Bahan Makanan', 'Beras', 0, 'Kilogram'),
(2, 'Bahan Makanan', 'Minyak', 0, 'Liter'),
(3, 'Bahan Makanan', 'Mie Instan', 0, 'Bungkus'),
(4, 'Uang Tunai', 'Uang', 0, 'Rupiah'),
(5, 'Obat', 'Ultraflu', 0, 'Tablet'),
(6, 'Obat', 'Masker', 0, 'Buah');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `identitas`
--
ALTER TABLE `identitas`
  ADD PRIMARY KEY (`no`),
  ADD UNIQUE KEY `id` (`id`),
  ADD UNIQUE KEY `ktp` (`ktp`);

--
-- Indexes for table `identitas_sumbangan`
--
ALTER TABLE `identitas_sumbangan`
  ADD PRIMARY KEY (`no`);

--
-- Indexes for table `log_penyaluran`
--
ALTER TABLE `log_penyaluran`
  ADD PRIMARY KEY (`no`);

--
-- Indexes for table `log_sumbangan`
--
ALTER TABLE `log_sumbangan`
  ADD PRIMARY KEY (`no`);

--
-- Indexes for table `sumbangan`
--
ALTER TABLE `sumbangan`
  ADD PRIMARY KEY (`no`),
  ADD UNIQUE KEY `kategori` (`kategori`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `identitas`
--
ALTER TABLE `identitas`
  MODIFY `no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `identitas_sumbangan`
--
ALTER TABLE `identitas_sumbangan`
  MODIFY `no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `log_penyaluran`
--
ALTER TABLE `log_penyaluran`
  MODIFY `no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `log_sumbangan`
--
ALTER TABLE `log_sumbangan`
  MODIFY `no` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sumbangan`
--
ALTER TABLE `sumbangan`
  MODIFY `no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
