-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 20, 2026 at 12:05 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `space_laundry`
--

-- --------------------------------------------------------

--
-- Table structure for table `layanan`
--

CREATE TABLE `layanan` (
  `id` int(11) NOT NULL,
  `nama_layanan` varchar(100) NOT NULL,
  `harga` int(11) NOT NULL,
  `estimasi_waktu` varchar(50) NOT NULL,
  `deskripsi` text DEFAULT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `layanan`
--

INSERT INTO `layanan` (`id`, `nama_layanan`, `harga`, `estimasi_waktu`, `deskripsi`, `created_at`, `updated_at`) VALUES
(1, 'Cuci Kiloan Reguler', 7000, '3 Hari', 'Cuci lipat rapi untuk pakaian sehari-hari.', '2026-06-18 20:42:54', '2026-06-18 16:22:37'),
(2, 'Cuci Kiloan Kilat', 12000, '1 Hari', 'Cuci lipat rapi dengan pengerjaan lebih cepat.', '2026-06-18 20:42:54', '2026-06-18 20:42:54'),
(3, 'Express Space Speed', 20000, '3 Jam', 'Cucian selesai secepat kecepatan cahaya.', '2026-06-18 20:42:54', '2026-06-18 20:42:54'),
(5, 'cuci tanpa setrika', 4000, '2 hari', 'cuci bersih tanpa setrika', '2026-06-18 16:22:11', '2026-06-18 16:23:01'),
(7, 'cuci setrika uap', 50000, '1 hari', 'pake uap kereta api', '2026-06-18 16:31:25', '2026-06-18 16:31:43');

-- --------------------------------------------------------

--
-- Table structure for table `pesanan`
--

CREATE TABLE `pesanan` (
  `id` int(11) NOT NULL,
  `nama_pelanggan` varchar(100) NOT NULL,
  `no_hp` varchar(20) NOT NULL,
  `layanan_id` int(11) NOT NULL,
  `berat` decimal(5,2) NOT NULL,
  `total_harga` int(11) NOT NULL,
  `status` varchar(50) DEFAULT 'Menunggu',
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pesanan`
--

INSERT INTO `pesanan` (`id`, `nama_pelanggan`, `no_hp`, `layanan_id`, `berat`, `total_harga`, `status`, `created_at`, `updated_at`) VALUES
(11, 'halland', '08123456789', 3, 2.00, 40000, 'Menunggu', '2026-06-18 16:25:59', '2026-06-18 16:25:59'),
(12, 'messi', '08432156789', 1, 5.00, 35000, 'Selesai', '2026-06-18 16:26:34', '2026-06-18 16:29:47'),
(13, 'arhan', '189012345678', 1, 1.00, 7000, 'Proses Cuci', '2026-06-18 16:27:26', '2026-06-18 16:29:39'),
(14, 'tedy', '083456781209', 5, 4.00, 16000, 'Selesai', '2026-06-18 16:28:07', '2026-06-18 16:29:29');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `nama_lengkap` varchar(100) NOT NULL,
  `created_at` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `nama_lengkap`, `created_at`) VALUES
(1, 'admin', '0192023a7bbd73250516f069df18b500', 'Admin Space', '2026-06-18 22:36:58');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `layanan`
--
ALTER TABLE `layanan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pesanan`
--
ALTER TABLE `pesanan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `layanan_id` (`layanan_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `layanan`
--
ALTER TABLE `layanan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `pesanan`
--
ALTER TABLE `pesanan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `pesanan`
--
ALTER TABLE `pesanan`
  ADD CONSTRAINT `pesanan_ibfk_1` FOREIGN KEY (`layanan_id`) REFERENCES `layanan` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
