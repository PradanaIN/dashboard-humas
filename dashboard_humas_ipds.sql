-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 18, 2023 at 03:35 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dashboard_humas_ipds`
--

-- --------------------------------------------------------

--
-- Table structure for table `eksternal`
--

CREATE TABLE `eksternal` (
  `id` varchar(128) NOT NULL,
  `kegiatan` varchar(128) NOT NULL,
  `tema` varchar(128) NOT NULL,
  `tempat` varchar(128) NOT NULL,
  `tanggal` date NOT NULL,
  `file` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `internal`
--

CREATE TABLE `internal` (
  `id` varchar(128) NOT NULL,
  `kegiatan` varchar(128) NOT NULL,
  `tema` varchar(128) NOT NULL,
  `tempat` varchar(128) NOT NULL,
  `tanggal` date NOT NULL,
  `file` varchar(256) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `kegiatan`
--

CREATE TABLE `kegiatan` (
  `id` varchar(128) NOT NULL,
  `kegiatan` varchar(128) NOT NULL,
  `tema` varchar(256) NOT NULL,
  `waktu_mulai` datetime NOT NULL,
  `waktu_selesai` datetime NOT NULL,
  `tempat` varchar(128) NOT NULL,
  `file_undangan` varchar(256) DEFAULT NULL,
  `file_materi` varchar(256) DEFAULT NULL,
  `file_metadata` varchar(256) DEFAULT NULL,
  `color` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `kegiatan`
--

INSERT INTO `kegiatan` (`id`, `kegiatan`, `tema`, `waktu_mulai`, `waktu_selesai`, `tempat`, `file_undangan`, `file_materi`, `file_metadata`, `color`) VALUES
('652f3256e926b', 'test', 'Regsosek', '2023-10-18 08:18:00', '2023-10-18 08:18:00', 'test', 'Surat_Tugas_magang_DIV_KS.pdf', 'TATA_TERTIB_PRESENTASI_HASIL_MAGAN_rev2_(1).pdf', '', '#0071c5'),
('652f341c9c154', 'Pelatihan', 'Regsosek', '2023-10-18 08:25:00', '2023-10-18 11:28:00', 'BPS Provinsi Jawa Tengah', 'Surat_Tugas_magang_DIV_KS.pdf', '230906_-_PPT_Penentuan_Dosbing_Tahap_II_(1).pptx', '', '#0071c5');

-- --------------------------------------------------------

--
-- Table structure for table `metadata`
--

CREATE TABLE `metadata` (
  `id` varchar(128) NOT NULL,
  `kegiatan` varchar(128) NOT NULL,
  `tema` varchar(128) NOT NULL,
  `tempat` varchar(128) NOT NULL,
  `tanggal` date NOT NULL,
  `file` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` varchar(128) NOT NULL,
  `nama` varchar(128) NOT NULL,
  `email` varchar(128) NOT NULL,
  `password` varchar(256) NOT NULL,
  `role_id` int(11) NOT NULL,
  `date_created` date NOT NULL,
  `is_active` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `nama`, `email`, `password`, `role_id`, `date_created`, `is_active`) VALUES
('651a1dea4e6d2', 'Admin', 'admin@gmail.com', '$2y$10$O4XjSqqPm6bAwhYDyi3TxuwsPjDpjPviu6.iyo/S0/Nl.cmtkfNEy', 1, '2023-10-10', 1),
('651a22f3c82fd', 'User', 'user@gmail.com', '$2y$10$B1x9IiIHXjz.RGJOUnhnj.cVxbrthXoFqVe6OddonPWFw0RE3HGT6', 3, '2023-10-02', 1),
('651a279e160f7', 'Kepala', 'kepala@gmail.com', '$2y$10$P1pLvUlimxf8xZ/699Z6nu8mv7ra8s0hPg7p.ioM5cBNGUKg4lzNe', 2, '2023-10-02', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `eksternal`
--
ALTER TABLE `eksternal`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `internal`
--
ALTER TABLE `internal`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kegiatan`
--
ALTER TABLE `kegiatan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `metadata`
--
ALTER TABLE `metadata`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
