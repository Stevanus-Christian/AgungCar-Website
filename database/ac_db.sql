-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 28, 2021 at 04:20 PM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 7.4.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ac_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `layanan`
--

CREATE TABLE `layanan` (
  `id_layanan` int(2) NOT NULL,
  `nama_layanan` varchar(30) NOT NULL,
  `gambar_layanan` text NOT NULL,
  `ket_layanan` varchar(100) NOT NULL,
  `harga` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `layanan`
--

INSERT INTO `layanan` (`id_layanan`, `nama_layanan`, `gambar_layanan`, `ket_layanan`, `harga`) VALUES
(9, 'layanan 3', 'image3.jpg', ' Toyota Fortuner Harian Manual', 1000000),
(10, 'layanan4', 'image1.jpg', 'Keterangan  layanan 4', 30000),
(11, 'layanan5', 'image1.jpg', 'Keterangan  layanan 5', 34000);

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `id_login` int(2) NOT NULL,
  `nama_pengguna` varchar(50) NOT NULL,
  `email_pengguna` varchar(50) NOT NULL,
  `password` text NOT NULL,
  `status_user` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`id_login`, `nama_pengguna`, `email_pengguna`, `password`, `status_user`) VALUES
(2, 'Esron Rikardo Nainggolan', 'esron.golan@gmail.com', '0794c4e4c4c200fa6dd61b0c1dcc80f5', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `member`
--

CREATE TABLE `member` (
  `kdmember` int(6) NOT NULL,
  `namamember` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamatmember` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nohp` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `member`
--

INSERT INTO `member` (`kdmember`, `namamember`, `alamatmember`, `email`, `nohp`, `username`, `password`, `status`) VALUES
(1, 'Member1', 'alaamt member', 'member@gmailku.com', '021', 'member', '6467baa3b187373e3931422e2a8ef22f3e447d77', 0),
(2, 'membe1', 'alaamt membe1', 'membe@gmail.com', '081111', 'membe', '0c97f8bac749c1ddfd56483aa498a685839338ce', 0);

-- --------------------------------------------------------

--
-- Table structure for table `pesanan`
--

CREATE TABLE `pesanan` (
  `kdpesanan` varchar(7) NOT NULL,
  `tglpesanan` date NOT NULL,
  `tglpakai` date NOT NULL,
  `mulaipenggunaan` time NOT NULL,
  `tglkembali` date NOT NULL,
  `akhirpenggunaan` time NOT NULL,
  `metodebayar` varchar(30) NOT NULL,
  `totbayar` double NOT NULL,
  `statusbayar` int(1) NOT NULL,
  `kdmember` int(6) NOT NULL,
  `id_layanan` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pesanan`
--

INSERT INTO `pesanan` (`kdpesanan`, `tglpesanan`, `tglpakai`, `mulaipenggunaan`, `tglkembali`, `akhirpenggunaan`, `metodebayar`, `totbayar`, `statusbayar`, `kdmember`, `id_layanan`) VALUES
('BOK0001', '2021-07-14', '2021-07-01', '13:15:00', '2021-07-01', '23:59:00', 'transfer1', 1100000, 1, 2, 9),
('BOK0002', '2021-07-28', '2021-07-05', '23:09:00', '2021-07-05', '23:59:00', 'transfer1', 33000, 1, 2, 10),
('BOK0003', '2021-07-28', '2021-07-11', '12:00:00', '2021-07-13', '23:59:00', 'transfer1', 2200000, 1, 1, 9),
('BOK0004', '2021-07-28', '2021-07-28', '01:00:00', '2021-07-29', '23:59:00', 'transfer1', 2200000, 1, 1, 9),
('BOK0005', '2021-07-28', '2021-07-29', '18:23:00', '2021-07-30', '23:59:00', 'transfer2', 66000, 1, 2, 10);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `layanan`
--
ALTER TABLE `layanan`
  ADD PRIMARY KEY (`id_layanan`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`id_login`);

--
-- Indexes for table `member`
--
ALTER TABLE `member`
  ADD PRIMARY KEY (`kdmember`);

--
-- Indexes for table `pesanan`
--
ALTER TABLE `pesanan`
  ADD PRIMARY KEY (`kdpesanan`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `layanan`
--
ALTER TABLE `layanan`
  MODIFY `id_layanan` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `id_login` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `member`
--
ALTER TABLE `member`
  MODIFY `kdmember` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
