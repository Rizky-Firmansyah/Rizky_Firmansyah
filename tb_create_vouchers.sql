-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 16 Jan 2024 pada 08.36
-- Versi server: 10.4.28-MariaDB
-- Versi PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_vouchers`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_create_vouchers`
--

CREATE TABLE `tb_create_vouchers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `code` varchar(255) NOT NULL,
  `amount` int(11) NOT NULL,
  `expiration_date` date NOT NULL,
  `is_used` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `tb_create_vouchers`
--

INSERT INTO `tb_create_vouchers` (`id`, `code`, `amount`, `expiration_date`, `is_used`, `created_at`, `updated_at`) VALUES
(1, 'Voucher65a62ff17e3c2', 10000, '2024-04-16', 0, '2024-01-16 00:27:45', '2024-01-16 00:27:45'),
(2, 'Voucher65a63005b0f89', 10000, '2024-04-16', 0, '2024-01-16 00:28:05', '2024-01-16 00:28:05'),
(3, 'Voucher65a6301564665', 10000, '2024-04-16', 0, '2024-01-16 00:28:21', '2024-01-16 00:28:21'),
(4, 'Voucher65a6302f64e2a', 10000, '2024-04-16', 1, '2024-01-16 00:28:47', '2024-01-16 00:28:57'),
(5, 'Voucher65a630628cec2', 10000, '2024-04-16', 1, '2024-01-16 00:29:38', '2024-01-16 00:29:43');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tb_create_vouchers`
--
ALTER TABLE `tb_create_vouchers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `tb_create_vouchers_code_unique` (`code`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `tb_create_vouchers`
--
ALTER TABLE `tb_create_vouchers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
