-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 29 Jun 2023 pada 11.00
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
-- Database: `admin-panel-school`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `jurusans`
--

CREATE TABLE `jurusans` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `jurusan_name` varchar(255) DEFAULT NULL,
  `jurusan_slug` varchar(255) DEFAULT NULL,
  `jurusan_image` varchar(255) DEFAULT NULL,
  `jurusan_desc` longtext DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `anak` int(11) DEFAULT NULL,
  `kelas` int(11) DEFAULT NULL,
  `jurusan_anak` int(11) DEFAULT NULL,
  `jurusan_kelas` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `jurusans`
--

INSERT INTO `jurusans` (`id`, `jurusan_name`, `jurusan_slug`, `jurusan_image`, `jurusan_desc`, `created_at`, `updated_at`, `anak`, `kelas`, `jurusan_anak`, `jurusan_kelas`) VALUES
(1, 'Elektronika', 'elektronika', '1687681889.jpg', '<p>--</p>', '2023-06-25 01:11:23', '2023-06-29 01:09:24', NULL, NULL, 90, 14),
(2, 'Akutansi Perkantoran', 'akutansi-perkantoran', '1687681914.jpg', '<p>--</p>', '2023-06-25 01:31:54', '2023-06-29 01:09:48', NULL, NULL, 250, 18),
(3, 'Teknik Komputer Jaringan', 'teknik-komputer-jaringan', '1687681944.png', '<p>--</p>', '2023-06-25 01:32:24', '2023-06-29 01:10:04', NULL, NULL, 50, 7),
(4, 'Teknik Informatika', 'teknik-informatika', '1687681965.jpg', '<p>-</p>', '2023-06-25 01:32:45', '2023-06-29 01:10:19', NULL, NULL, 400, 20),
(5, 'Teknik Kendaraan RIngan', 'teknik-kendaraan-ringan', '1687681993.jpg', '<p>--</p>', '2023-06-25 01:33:13', '2023-06-29 01:10:33', NULL, NULL, 200, 25),
(7, 'Teknik Tata Busana', 'teknik-tata-busana', '1687682317.jpg', '<p>-</p>', '2023-06-25 01:38:37', '2023-06-29 01:10:45', NULL, NULL, 200, 10);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `jurusans`
--
ALTER TABLE `jurusans`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `jurusans`
--
ALTER TABLE `jurusans`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
