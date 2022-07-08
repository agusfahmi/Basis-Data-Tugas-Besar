-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 08, 2022 at 03:22 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `data_barang`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `username` varchar(22) NOT NULL,
  `password` varchar(22) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `company_data`
--

CREATE TABLE `company_data` (
  `nama_company` varchar(255) NOT NULL,
  `nama_barang` int(11) NOT NULL,
  `jumlah_barang` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `is_barang`
--

CREATE TABLE `is_barang` (
  `id` int(11) NOT NULL,
  `nama_barang` varchar(30) NOT NULL,
  `asal_barang` varchar(30) NOT NULL,
  `tanggal_stamp` date NOT NULL,
  `jumlah_barang` int(100) NOT NULL,
  `harga_barang` int(21) NOT NULL,
  `kondisi_barang` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `is_barang`
--

INSERT INTO `is_barang` (`id`, `nama_barang`, `asal_barang`, `tanggal_stamp`, `jumlah_barang`, `harga_barang`, `kondisi_barang`) VALUES
(23, 'Celana Pendek', 'Semarang', '2022-07-21', 12, 10000, ''),
(1231, 'Baju', 'Surabaya', '2022-07-21', 1, 10000, ''),
(2736, 'Jaket', 'Surabaya', '2022-07-19', 12, 20000, '');

-- --------------------------------------------------------

--
-- Table structure for table `list_barang`
--

CREATE TABLE `list_barang` (
  `nama_barang` int(11) NOT NULL,
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `transaksi_detail`
--

CREATE TABLE `transaksi_detail` (
  `id` int(5) NOT NULL,
  `nama_barang` varchar(30) NOT NULL,
  `asal_barang` varchar(30) NOT NULL,
  `tujuan_barang` varchar(255) NOT NULL,
  `tanggal_stamp` date NOT NULL,
  `jumlah_barang` int(100) NOT NULL,
  `harga_barang` int(21) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `transaksi_master`
--

CREATE TABLE `transaksi_master` (
  `id` int(10) NOT NULL,
  `nama_barang` varchar(22) NOT NULL,
  `asal_barang` varchar(30) NOT NULL,
  `tujuan_barang` varchar(30) NOT NULL,
  `tanggal_stamp` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `validasi_barang`
--

CREATE TABLE `validasi_barang` (
  `id` int(11) NOT NULL,
  `nama_barang` varchar(255) NOT NULL,
  `kondisi_barang` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `validasi_barang`
--

INSERT INTO `validasi_barang` (`id`, `nama_barang`, `kondisi_barang`) VALUES
(23, 'Celana Pendek', 'Jelek'),
(231, 'Haha', 'Kurang Bagus'),
(1231, 'Baju', 'Bagus'),
(2736, 'Jaket', 'Jelek');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `is_barang`
--
ALTER TABLE `is_barang`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `list_barang`
--
ALTER TABLE `list_barang`
  ADD PRIMARY KEY (`id`),
  ADD KEY `nama_barang` (`nama_barang`);

--
-- Indexes for table `transaksi_detail`
--
ALTER TABLE `transaksi_detail`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transaksi_master`
--
ALTER TABLE `transaksi_master`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `validasi_barang`
--
ALTER TABLE `validasi_barang`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `is_barang`
--
ALTER TABLE `is_barang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2737;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `list_barang`
--
ALTER TABLE `list_barang`
  ADD CONSTRAINT `list_barang_ibfk_1` FOREIGN KEY (`nama_barang`) REFERENCES `is_barang` (`id`);

--
-- Constraints for table `transaksi_master`
--
ALTER TABLE `transaksi_master`
  ADD CONSTRAINT `transaksi_master_ibfk_1` FOREIGN KEY (`id`) REFERENCES `is_barang` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
