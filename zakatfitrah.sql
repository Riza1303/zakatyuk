-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 16, 2022 at 08:02 AM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 7.3.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `zakatfitrah`
--

-- --------------------------------------------------------

--
-- Table structure for table `bayar_zakat`
--

CREATE TABLE `bayar_zakat` (
  `id` int(11) NOT NULL,
  `nama_kk` varchar(255) NOT NULL,
  `jml_tanggungan` varchar(255) NOT NULL,
  `jenis_bayar` varchar(255) NOT NULL,
  `jml_dibayar` varchar(255) NOT NULL,
  `bayar_beras` varchar(255) NOT NULL,
  `bayar_uang` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `bayar_zakat`
--

INSERT INTO `bayar_zakat` (`id`, `nama_kk`, `jml_tanggungan`, `jenis_bayar`, `jml_dibayar`, `bayar_beras`, `bayar_uang`) VALUES
(1, 'Bagas Syarifudin', '2 Orang', 'Beras', '2 Orang', '5 Kg', '0');

-- --------------------------------------------------------

--
-- Table structure for table `mustahik`
--

CREATE TABLE `mustahik` (
  `id` int(11) NOT NULL,
  `nama_kategori` varchar(100) NOT NULL,
  `jumlah_hak` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `mustahik`
--

INSERT INTO `mustahik` (`id`, `nama_kategori`, `jumlah_hak`) VALUES
(1, 'Riqab', '3 Orang'),
(2, 'Muallaf', '6 Orang');

-- --------------------------------------------------------

--
-- Table structure for table `mustahik_lainnya`
--

CREATE TABLE `mustahik_lainnya` (
  `id` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `kategori` varchar(255) NOT NULL,
  `hak` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `mustahik_lainnya`
--

INSERT INTO `mustahik_lainnya` (`id`, `nama`, `kategori`, `hak`) VALUES
(1, 'Tatang', 'Mualaf', '2.5 Kg'),
(2, 'Cecep', 'Ibnu Sabil', '10 Kg');

-- --------------------------------------------------------

--
-- Table structure for table `mustahik_warga`
--

CREATE TABLE `mustahik_warga` (
  `id` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `kategori` varchar(255) NOT NULL,
  `hak` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `mustahik_warga`
--

INSERT INTO `mustahik_warga` (`id`, `nama`, `kategori`, `hak`) VALUES
(1, 'Ahmad Nurdjaman', 'Miskin', '10 Kg'),
(2, 'Indi', 'Fi Sabilillah', '10 Kg');

-- --------------------------------------------------------

--
-- Table structure for table `muzakki`
--

CREATE TABLE `muzakki` (
  `id` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `jumlah_tanggungan` varchar(50) NOT NULL,
  `keterangan` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `muzakki`
--

INSERT INTO `muzakki` (`id`, `nama`, `jumlah_tanggungan`, `keterangan`) VALUES
(1, 'Iwan Natadikatma', '2 Orang', 'Belum Diserahkan'),
(2, 'Yayan', '5 Orang', 'Sudah Diserahkan');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_pendaftaran`
--

CREATE TABLE `tbl_pendaftaran` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_pendaftaran`
--

INSERT INTO `tbl_pendaftaran` (`id`, `username`, `password`, `email`) VALUES
(1, 'Admin', 'admin123', 'admin@gmail.com');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bayar_zakat`
--
ALTER TABLE `bayar_zakat`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mustahik`
--
ALTER TABLE `mustahik`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mustahik_lainnya`
--
ALTER TABLE `mustahik_lainnya`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mustahik_warga`
--
ALTER TABLE `mustahik_warga`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `muzakki`
--
ALTER TABLE `muzakki`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_pendaftaran`
--
ALTER TABLE `tbl_pendaftaran`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bayar_zakat`
--
ALTER TABLE `bayar_zakat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `mustahik_lainnya`
--
ALTER TABLE `mustahik_lainnya`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `mustahik_warga`
--
ALTER TABLE `mustahik_warga`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_pendaftaran`
--
ALTER TABLE `tbl_pendaftaran`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
