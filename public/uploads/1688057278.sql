-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 28 Jun 2023 pada 09.58
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
-- Struktur dari tabel `banners`
--

CREATE TABLE `banners` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `banner_name` varchar(255) DEFAULT NULL,
  `banner_desc` longtext DEFAULT NULL,
  `banner_image` varchar(255) DEFAULT NULL,
  `banner_slug` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `banners`
--

INSERT INTO `banners` (`id`, `banner_name`, `banner_desc`, `banner_image`, `banner_slug`, `created_at`, `updated_at`) VALUES
(2, 'Website Multi Guna', 'Anda dapat mencari berbagai informasi tentang SMK 1 Krian Sidoarjo pada halaman website ini. Mulai dari informasi berita terkini, pembayaran elektronik, informasi kesiswaan, hingga informasi sepak karir para alumni', '1687933624.jpg', 'website-multi-guna', '2023-06-27 23:27:04', '2023-06-27 23:27:04');

-- --------------------------------------------------------

--
-- Struktur dari tabel `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `gurus`
--

CREATE TABLE `gurus` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `guru_name` varchar(255) NOT NULL,
  `guru_slug` varchar(255) NOT NULL,
  `guru_wa` varchar(255) NOT NULL,
  `guru_image` varchar(255) NOT NULL,
  `guru_jabatan` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `gurus`
--

INSERT INTO `gurus` (`id`, `guru_name`, `guru_slug`, `guru_wa`, `guru_image`, `guru_jabatan`, `created_at`, `updated_at`) VALUES
(2, 'Dhini Mekarsari, S.Pd, M.MPd', 'dhini-mekarsari-spd-mmpd', '0811123216545', '1687684755.jpg', 'Kepala Sekolah', '2023-06-25 02:19:15', '2023-06-25 02:19:15'),
(3, 'Drs. Budi Pitoyo, M.MPd', 'drs-budi-pitoyo-mmpd', '0832656545687', '1687684780.jpg', 'Wakasek Bidang Kurikulum', '2023-06-25 02:19:40', '2023-06-25 02:19:40'),
(4, 'Ahmad Robby, S.Kom', 'ahmad-robby-skom', '0878965465456', '1687684816.jpg', 'Wakasek Bidang Humas dan Industri', '2023-06-25 02:20:16', '2023-06-25 02:20:16'),
(5, 'Heri Kristanto, S.Pd', 'heri-kristanto-spd', '0812333265456', '1687684864.jpg', 'Wakasek Bidang Kesiswaan', '2023-06-25 02:21:04', '2023-06-25 02:21:04'),
(6, 'Budi Sutrisno, S.Pd', 'budi-sutrisno-spd', '0865545654789', '1687684893.jpg', 'Wakasek Bidang Sarpras', '2023-06-25 02:21:33', '2023-06-25 02:21:33'),
(7, 'Wahyu Suhantiyo, ST', 'wahyu-suhantiyo-st', '0898896545654', '1687684922.jpg', 'Kakomli TPM', '2023-06-25 02:22:03', '2023-06-25 02:22:03'),
(8, 'Fajar Rismantoro, S.Pd', 'fajar-rismantoro-spd', '0854566559878', '1687684948.jpg', 'Kakomli TITL', '2023-06-25 02:22:28', '2023-06-25 02:22:28'),
(9, 'Andri Suharto, S.Kom', 'andri-suharto-skom', '0898978968789', '1687684972.jpg', 'Kakomli RPL', '2023-06-25 02:22:52', '2023-06-25 02:22:52'),
(10, 'Yoyok Sutjahjo, SE', 'yoyok-sutjahjo-se', '0832123654987', '1687684998.jpg', 'Kepala Tata Usaha', '2023-06-25 02:23:19', '2023-06-25 02:23:19');

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
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `jurusans`
--

INSERT INTO `jurusans` (`id`, `jurusan_name`, `jurusan_slug`, `jurusan_image`, `jurusan_desc`, `created_at`, `updated_at`) VALUES
(1, 'Elektronika', 'elektronika', '1687681889.jpg', '<p>--</p>', '2023-06-25 01:11:23', '2023-06-25 01:31:29'),
(2, 'Akutansi Perkantoran', 'akutansi-perkantoran', '1687681914.jpg', '<p>--</p>', '2023-06-25 01:31:54', '2023-06-25 01:31:54'),
(3, 'Teknik Komputer Jaringan', 'teknik-komputer-jaringan', '1687681944.png', '<p>--</p>', '2023-06-25 01:32:24', '2023-06-25 01:32:24'),
(4, 'Teknik Informatika', 'teknik-informatika', '1687681965.jpg', '<p>-</p>', '2023-06-25 01:32:45', '2023-06-25 01:32:45'),
(5, 'Teknik Kendaraan RIngan', 'teknik-kendaraan-ringan', '1687681993.jpg', '<p>--</p>', '2023-06-25 01:33:13', '2023-06-25 01:33:13'),
(7, 'Teknik Tata Busana', 'teknik-tata-busana', '1687682317.jpg', '<p>-</p>', '2023-06-25 01:38:37', '2023-06-25 01:38:37');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kategoris`
--

CREATE TABLE `kategoris` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `kategori_name` varchar(255) DEFAULT NULL,
  `kategori_slug` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `kategoris`
--

INSERT INTO `kategoris` (`id`, `kategori_name`, `kategori_slug`, `created_at`, `updated_at`) VALUES
(4, 'Kategori 1', 'kategori-1', '2023-06-23 20:27:06', '2023-06-23 20:27:06'),
(6, 'Contoh Kategori 3', 'contoh-kategori-3', '2023-06-23 20:27:23', '2023-06-23 20:27:23'),
(7, 'Example 4', 'example-4', '2023-06-23 20:27:32', '2023-06-23 20:27:32'),
(8, 'Kategori 2', 'kategori-2', '2023-06-24 05:48:23', '2023-06-24 05:48:23');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kategori_news`
--

CREATE TABLE `kategori_news` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `kategori_id` bigint(20) UNSIGNED DEFAULT NULL,
  `news_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `kategori_news`
--

INSERT INTO `kategori_news` (`id`, `kategori_id`, `news_id`, `created_at`, `updated_at`) VALUES
(6, 4, 6, NULL, NULL),
(7, 7, 6, NULL, NULL),
(8, 4, 7, NULL, NULL),
(9, 6, 7, NULL, NULL),
(10, 7, 7, NULL, NULL),
(11, 7, 8, NULL, NULL),
(12, 8, 8, NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `menus`
--

CREATE TABLE `menus` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `pagetype_id` bigint(20) UNSIGNED DEFAULT NULL,
  `menu_name` varchar(255) DEFAULT NULL,
  `menu_link` varchar(255) DEFAULT NULL,
  `menu_type` varchar(255) DEFAULT NULL,
  `menu_stat` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `menus`
--

INSERT INTO `menus` (`id`, `pagetype_id`, `menu_name`, `menu_link`, `menu_type`, `menu_stat`, `created_at`, `updated_at`) VALUES
(1, 1, 'Menu_1', 'menu-1', 'mainmenu', 'on', '2023-05-28 02:43:48', '2023-05-28 02:43:48');

-- --------------------------------------------------------

--
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(25, '2014_10_12_000000_create_users_table', 1),
(26, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(27, '2014_10_12_100000_create_password_resets_table', 1),
(28, '2019_08_19_000000_create_failed_jobs_table', 1),
(29, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(30, '2023_05_27_040118_create_pagetypes_table', 1),
(31, '2023_05_28_082433_create_menus_table', 1),
(32, '2023_05_28_102630_create_sliders_table', 2),
(36, '2023_06_07_145237_create_paymenttypes_table', 3),
(41, '2023_06_10_080016_create_transaksi1s_table', 4),
(43, '2023_06_10_160210_create_paymentcontrols_table', 5),
(44, '2023_06_23_145415_create_kategoris_table', 6),
(45, '2023_06_23_145539_create_news_table', 6),
(46, '2023_06_23_145918_create_kategori_news_table', 6),
(47, '2023_06_23_150120_create_newsimages_table', 6),
(48, '2023_06_25_065325_create_jurusans_table', 7),
(50, '2023_06_25_084356_create_gurus_table', 8),
(51, '2023_06_27_223347_create_banners_table', 9),
(53, '2023_06_28_062917_create_profiles_table', 10);

-- --------------------------------------------------------

--
-- Struktur dari tabel `news`
--

CREATE TABLE `news` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `news_title` varchar(255) DEFAULT NULL,
  `news_slug` varchar(255) DEFAULT NULL,
  `news_view` int(225) NOT NULL,
  `news_image` varchar(255) DEFAULT NULL,
  `news_desc` longtext DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `news`
--

INSERT INTO `news` (`id`, `news_title`, `news_slug`, `news_view`, `news_image`, `news_desc`, `created_at`, `updated_at`) VALUES
(6, 'Tim Bola Voli Putra SMK Krian 1 Sidoarjo: Juara 1 dalam Turnamen Voly Tingkat SMA/SMK Jawa Timur', 'tim-bola-voli-putra-smk-krian-1-sidoarjo-juara-1-dalam-turnamen-voly-tingkat-smasmk-jawa-timur', 20, '1687611019.jpg', '<p style=\"overflow-wrap: break-word; border: 0px; font-variant-numeric: inherit; font-variant-east-asian: inherit; font-variant-alternates: inherit; font-stretch: inherit; line-height: 1.6; font-family: &quot;Open Sans&quot;, serif; font-optical-sizing: inherit; font-kerning: inherit; font-feature-settings: inherit; font-variation-settings: inherit; font-size: 16px; margin-right: 0px; margin-bottom: 15px; margin-left: 0px; outline: 0px; padding: 0px; vertical-align: baseline; color: rgb(68, 68, 68);\">Tim Bola Voli Putra SMK Krian 1 Sidoarjo, yang berhasil meraih gelar Juara 1 dalam Turnamen Voly Tingkat SMA/SMK Jawa Timur yang digelar di Universitas Adi Buana Surabaya.Turnamen voli ini menjadi panggung bagi para pemain voli terbaik dari seluruh Jawa Timur. Persaingan yang ketat dan level permainan yang tinggi membuat setiap pertandingan menjadi luar biasa. Namun, Tim Bola Voli Putra SMK Krian 1 Sidoarjo mampu menunjukkan kualitas dan dedikasi yang tinggi sepanjang turnamen.</p><p style=\"overflow-wrap: break-word; border: 0px; font-variant-numeric: inherit; font-variant-east-asian: inherit; font-variant-alternates: inherit; font-stretch: inherit; line-height: 1.6; font-family: &quot;Open Sans&quot;, serif; font-optical-sizing: inherit; font-kerning: inherit; font-feature-settings: inherit; font-variation-settings: inherit; font-size: 16px; margin-right: 0px; margin-bottom: 15px; margin-left: 0px; outline: 0px; padding: 0px; vertical-align: baseline; color: rgb(68, 68, 68);\">Kemenangan Tim Bola Voli Putra SMK Krian 1 Sidoarjo dalam Turnamen Voly Tingkat SMA/SMK Jawa Timur di Universitas Adi Buana merupakan pencapaian yang luar biasa. Prestasi ini tidak hanya menjadi kebanggaan bagi sekolah mereka, tetapi juga bagi masyarakat di sekitar. Tim ini telah membuktikan bahwa dengan kerja keras, ketekunan, dan semangat yang tinggi, segala hal yang mungkin tercapai.</p><figure class=\"wp-block-gallery has-nested-images columns-default is-cropped\" style=\"display: flex; margin-bottom: 0px; text-align: center; flex-wrap: wrap; list-style-type: none; padding: 0px; color: rgb(68, 68, 68); font-family: &quot;Open Sans&quot;, serif;\"><figure class=\"wp-block-image size-large\" style=\"display: flex; margin-right: var(--gallery-block--gutter-size,16px); flex-grow: 1; justify-content: center; position: relative; flex-direction: column; max-width: 100%; width: calc(33.33% - var(--gallery-block--gutter-size, 16px)*0.66667); align-self: inherit;\"><img loading=\"lazy\" width=\"1024\" height=\"578\" data-id=\"10823\" src=\"http://smkkrian1.sch.id/wp-content/uploads/2023/06/IMG_9281-1024x578.jpg\" alt=\"\" class=\"wp-image-10823\" srcset=\"http://smkkrian1.sch.id/wp-content/uploads/2023/06/IMG_9281-1024x578.jpg 1024w, http://smkkrian1.sch.id/wp-content/uploads/2023/06/IMG_9281-300x169.jpg 300w, http://smkkrian1.sch.id/wp-content/uploads/2023/06/IMG_9281-768x434.jpg 768w, http://smkkrian1.sch.id/wp-content/uploads/2023/06/IMG_9281-1536x867.jpg 1536w, http://smkkrian1.sch.id/wp-content/uploads/2023/06/IMG_9281-2048x1156.jpg 2048w\" sizes=\"(max-width: 1024px) 100vw, 1024px\" style=\"height: 138.844px; max-width: 100%; vertical-align: bottom; margin-bottom: 0px; border-radius: inherit; display: block; width: 246px; flex: 1 0 0%; object-fit: cover;\"></figure><figure class=\"wp-block-image size-large\" style=\"display: flex; margin-right: var(--gallery-block--gutter-size,16px); flex-grow: 1; justify-content: center; position: relative; flex-direction: column; max-width: 100%; width: calc(33.33% - var(--gallery-block--gutter-size, 16px)*0.66667); align-self: inherit;\"><img loading=\"lazy\" width=\"1024\" height=\"578\" data-id=\"10827\" src=\"http://smkkrian1.sch.id/wp-content/uploads/2023/06/IMG_9214-1024x578.jpg\" alt=\"\" class=\"wp-image-10827\" srcset=\"http://smkkrian1.sch.id/wp-content/uploads/2023/06/IMG_9214-1024x578.jpg 1024w, http://smkkrian1.sch.id/wp-content/uploads/2023/06/IMG_9214-300x169.jpg 300w, http://smkkrian1.sch.id/wp-content/uploads/2023/06/IMG_9214-768x434.jpg 768w, http://smkkrian1.sch.id/wp-content/uploads/2023/06/IMG_9214-1536x867.jpg 1536w, http://smkkrian1.sch.id/wp-content/uploads/2023/06/IMG_9214-2048x1156.jpg 2048w\" sizes=\"(max-width: 1024px) 100vw, 1024px\" style=\"height: 138.844px; max-width: 100%; vertical-align: bottom; margin-bottom: 0px; border-radius: inherit; display: block; width: 246px; flex: 1 0 0%; object-fit: cover;\"></figure><figure class=\"wp-block-image size-large\" style=\"display: flex; flex-grow: 1; justify-content: center; position: relative; flex-direction: column; max-width: 100%; width: calc(33.33% - var(--gallery-block--gutter-size, 16px)*0.66667); align-self: inherit;\"><img loading=\"lazy\" width=\"1024\" height=\"578\" data-id=\"10824\" src=\"http://smkkrian1.sch.id/wp-content/uploads/2023/06/IMG_9227-1024x578.jpg\" alt=\"\" class=\"wp-image-10824\" srcset=\"http://smkkrian1.sch.id/wp-content/uploads/2023/06/IMG_9227-1024x578.jpg 1024w, http://smkkrian1.sch.id/wp-content/uploads/2023/06/IMG_9227-300x169.jpg 300w, http://smkkrian1.sch.id/wp-content/uploads/2023/06/IMG_9227-768x434.jpg 768w, http://smkkrian1.sch.id/wp-content/uploads/2023/06/IMG_9227-1536x867.jpg 1536w, http://smkkrian1.sch.id/wp-content/uploads/2023/06/IMG_9227-2048x1156.jpg 2048w\" sizes=\"(max-width: 1024px) 100vw, 1024px\" style=\"height: 138.844px; max-width: 100%; vertical-align: bottom; margin-bottom: 0px; border-radius: inherit; display: block; width: 246px; flex: 1 0 0%; object-fit: cover;\"></figure><figure class=\"wp-block-image size-large\" style=\"display: flex; margin-right: var(--gallery-block--gutter-size,16px); flex-grow: 1; justify-content: center; position: relative; flex-direction: column; max-width: 100%; width: calc(33.33% - var(--gallery-block--gutter-size, 16px)*0.66667); align-self: inherit;\"><img loading=\"lazy\" width=\"1024\" height=\"770\" data-id=\"10822\" src=\"http://smkkrian1.sch.id/wp-content/uploads/2023/06/IMG-20230618-WA0042-1024x770.jpg\" alt=\"\" class=\"wp-image-10822\" srcset=\"http://smkkrian1.sch.id/wp-content/uploads/2023/06/IMG-20230618-WA0042-1024x770.jpg 1024w, http://smkkrian1.sch.id/wp-content/uploads/2023/06/IMG-20230618-WA0042-300x226.jpg 300w, http://smkkrian1.sch.id/wp-content/uploads/2023/06/IMG-20230618-WA0042-768x578.jpg 768w, http://smkkrian1.sch.id/wp-content/uploads/2023/06/IMG-20230618-WA0042.jpg 1280w\" sizes=\"(max-width: 1024px) 100vw, 1024px\" style=\"height: 184.969px; max-width: 100%; vertical-align: bottom; margin-bottom: 0px; border-radius: inherit; display: block; width: 246px; flex: 1 0 0%; object-fit: cover;\"></figure><figure class=\"wp-block-image size-large\" style=\"display: flex; margin-right: var(--gallery-block--gutter-size,16px); flex-grow: 1; justify-content: center; position: relative; flex-direction: column; max-width: 100%; width: calc(33.33% - var(--gallery-block--gutter-size, 16px)*0.66667); align-self: inherit;\"><img loading=\"lazy\" width=\"1024\" height=\"578\" data-id=\"10825\" src=\"http://smkkrian1.sch.id/wp-content/uploads/2023/06/IMG_9350-1024x578.jpg\" alt=\"\" class=\"wp-image-10825\" srcset=\"http://smkkrian1.sch.id/wp-content/uploads/2023/06/IMG_9350-1024x578.jpg 1024w, http://smkkrian1.sch.id/wp-content/uploads/2023/06/IMG_9350-300x169.jpg 300w, http://smkkrian1.sch.id/wp-content/uploads/2023/06/IMG_9350-768x434.jpg 768w, http://smkkrian1.sch.id/wp-content/uploads/2023/06/IMG_9350-1536x867.jpg 1536w, http://smkkrian1.sch.id/wp-content/uploads/2023/06/IMG_9350-2048x1156.jpg 2048w\" sizes=\"(max-width: 1024px) 100vw, 1024px\" style=\"height: 184.969px; max-width: 100%; vertical-align: bottom; margin-bottom: 0px; border-radius: inherit; display: block; width: 246px; flex: 1 0 0%; object-fit: cover;\"></figure><figure class=\"wp-block-image size-large\" style=\"display: flex; flex-grow: 1; justify-content: center; position: relative; flex-direction: column; max-width: 100%; width: calc(33.33% - var(--gallery-block--gutter-size, 16px)*0.66667); align-self: inherit;\"><img loading=\"lazy\" width=\"1024\" height=\"578\" data-id=\"10826\" src=\"http://smkkrian1.sch.id/wp-content/uploads/2023/06/IMG_9360-1024x578.jpg\" alt=\"\" class=\"wp-image-10826\" srcset=\"http://smkkrian1.sch.id/wp-content/uploads/2023/06/IMG_9360-1024x578.jpg 1024w, http://smkkrian1.sch.id/wp-content/uploads/2023/06/IMG_9360-300x169.jpg 300w, http://smkkrian1.sch.id/wp-content/uploads/2023/06/IMG_9360-768x434.jpg 768w, http://smkkrian1.sch.id/wp-content/uploads/2023/06/IMG_9360-1536x867.jpg 1536w, http://smkkrian1.sch.id/wp-content/uploads/2023/06/IMG_9360-2048x1156.jpg 2048w\" sizes=\"(max-width: 1024px) 100vw, 1024px\" style=\"height: 184.969px; max-width: 100%; vertical-align: bottom; margin-bottom: 0px; border-radius: inherit; display: block; width: 246px; flex: 1 0 0%; object-fit: cover;\"></figure><figure class=\"wp-block-image size-large\" style=\"display: flex; margin-right: var(--gallery-block--gutter-size,16px); flex-grow: 1; justify-content: center; position: relative; flex-direction: column; max-width: 100%; width: calc(33.33% - var(--gallery-block--gutter-size, 16px)*0.66667); align-self: inherit;\"><img loading=\"lazy\" width=\"1024\" height=\"578\" data-id=\"10828\" src=\"http://smkkrian1.sch.id/wp-content/uploads/2023/06/IMG_8911-1024x578.jpg\" alt=\"\" class=\"wp-image-10828\" srcset=\"http://smkkrian1.sch.id/wp-content/uploads/2023/06/IMG_8911-1024x578.jpg 1024w, http://smkkrian1.sch.id/wp-content/uploads/2023/06/IMG_8911-300x169.jpg 300w, http://smkkrian1.sch.id/wp-content/uploads/2023/06/IMG_8911-768x434.jpg 768w, http://smkkrian1.sch.id/wp-content/uploads/2023/06/IMG_8911-1536x867.jpg 1536w, http://smkkrian1.sch.id/wp-content/uploads/2023/06/IMG_8911-2048x1156.jpg 2048w\" sizes=\"(max-width: 1024px) 100vw, 1024px\" style=\"height: 138.844px; max-width: 100%; vertical-align: bottom; margin-bottom: 0px; border-radius: inherit; display: block; width: 246px; flex: 1 0 0%; object-fit: cover;\"></figure><figure class=\"wp-block-image size-large\" style=\"display: flex; margin-right: var(--gallery-block--gutter-size,16px); flex-grow: 1; justify-content: center; position: relative; flex-direction: column; max-width: 100%; width: calc(33.33% - var(--gallery-block--gutter-size, 16px)*0.66667); align-self: inherit;\"><img loading=\"lazy\" width=\"1024\" height=\"578\" data-id=\"10830\" src=\"http://smkkrian1.sch.id/wp-content/uploads/2023/06/IMG_9221-1024x578.jpg\" alt=\"\" class=\"wp-image-10830\" srcset=\"http://smkkrian1.sch.id/wp-content/uploads/2023/06/IMG_9221-1024x578.jpg 1024w, http://smkkrian1.sch.id/wp-content/uploads/2023/06/IMG_9221-300x169.jpg 300w, http://smkkrian1.sch.id/wp-content/uploads/2023/06/IMG_9221-768x434.jpg 768w, http://smkkrian1.sch.id/wp-content/uploads/2023/06/IMG_9221-1536x867.jpg 1536w, http://smkkrian1.sch.id/wp-content/uploads/2023/06/IMG_9221-2048x1156.jpg 2048w\" sizes=\"(max-width: 1024px) 100vw, 1024px\" style=\"height: 138.844px; max-width: 100%; vertical-align: bottom; margin-bottom: 0px; border-radius: inherit; display: block; width: 246px; flex: 1 0 0%; object-fit: cover;\"></figure><figure class=\"wp-block-image size-large\" style=\"display: flex; flex-grow: 1; justify-content: center; position: relative; flex-direction: column; max-width: 100%; width: calc(33.33% - var(--gallery-block--gutter-size, 16px)*0.66667); align-self: inherit;\"><img loading=\"lazy\" width=\"1024\" height=\"578\" data-id=\"10829\" src=\"http://smkkrian1.sch.id/wp-content/uploads/2023/06/IMG_8912-1024x578.jpg\" alt=\"\" class=\"wp-image-10829\" srcset=\"http://smkkrian1.sch.id/wp-content/uploads/2023/06/IMG_8912-1024x578.jpg 1024w, http://smkkrian1.sch.id/wp-content/uploads/2023/06/IMG_8912-300x169.jpg 300w, http://smkkrian1.sch.id/wp-content/uploads/2023/06/IMG_8912-768x434.jpg 768w, http://smkkrian1.sch.id/wp-content/uploads/2023/06/IMG_8912-1536x867.jpg 1536w, http://smkkrian1.sch.id/wp-content/uploads/2023/06/IMG_8912-2048x1156.jpg 2048w\" sizes=\"(max-width: 1024px) 100vw, 1024px\" style=\"height: 138.844px; max-width: 100%; vertical-align: bottom; margin-bottom: 0px; border-radius: inherit; display: block; width: 246px; flex: 1 0 0%; object-fit: cover;\"></figure></figure>', '2023-06-24 05:50:19', '2023-06-26 10:11:44'),
(7, 'Penyambutan PKL Gelombang 2', 'penyambutan-pkl-gelombang-2', 22, '1687611091.jpeg', '<p style=\"overflow-wrap: break-word; border: 0px; font-variant-numeric: inherit; font-variant-east-asian: inherit; font-variant-alternates: inherit; font-stretch: inherit; line-height: 1.6; font-family: &quot;Open Sans&quot;, serif; font-optical-sizing: inherit; font-kerning: inherit; font-feature-settings: inherit; font-variation-settings: inherit; font-size: 16px; margin-right: 0px; margin-bottom: 15px; margin-left: 0px; outline: 0px; padding: 0px; vertical-align: baseline; color: rgb(68, 68, 68);\">Sidoarjo, 5 Juni 2023 – Hari Senin yang cerah ini menjadi momen bersejarah bagi SMK Krian 1 Sidoarjo, karena upacara penyambutan Program Keahlian Lapangan (PKL) gelombang kedua telah dilangsungkan dengan sukses di lapangan sekolah. Acara ini dipandu oleh Bapak Achyar Nur Sohid, S.Pd, yang bertindak sebagai pembina dan petugas monitoring Bursa Kerja Khusus (BKK).</p><p style=\"overflow-wrap: break-word; border: 0px; font-variant-numeric: inherit; font-variant-east-asian: inherit; font-variant-alternates: inherit; font-stretch: inherit; line-height: 1.6; font-family: &quot;Open Sans&quot;, serif; font-optical-sizing: inherit; font-kerning: inherit; font-feature-settings: inherit; font-variation-settings: inherit; font-size: 16px; margin-right: 0px; margin-bottom: 15px; margin-left: 0px; outline: 0px; padding: 0px; vertical-align: baseline; color: rgb(68, 68, 68);\">Upacara penyambutan ini dihadiri oleh seluruh siswa PKL gelombang kedua beserta para wali kelas . Dalam sambutannya, Bapak Achyar Nur Sohid, S.Pd sebagai pembina menyampaikan harapannya kepada para siswa. Beliau mengungkapkan bahwa PKL adalah kesempatan berharga bagi para siswa untuk mengaplikasikan pengetahuan dan keterampilan yang telah mereka peroleh selama di sekolah. Selain itu, beliau juga mengingatkan siswa untuk memanfaatkan kesempatan ini dengan sebaik-baiknya, agar pengalaman selama PKL dapat diaplikasikan dalam kegiatan sekolah dan memperkaya pengetahuan teman-teman sekelas. Bapak Achyar Nur Sohid, S.Pd juga menekankan pentingnya menyelesaikan buku laporan PKL. Buku laporan PKL ini menjadi dokumentasi penting yang mencatat pengalaman, pencapaian, serta evaluasi selama proses PKL. Setelah mengumpulkan buku laporan PKL maka siswa berhak mendapatkan sertifikat PKL yang nantinya akan berguna jika digunakan untuk melamar pekerjaan.</p><figure class=\"wp-block-gallery has-nested-images columns-default is-cropped\" style=\"display: flex; margin-bottom: 0px; text-align: center; flex-wrap: wrap; list-style-type: none; padding: 0px; color: rgb(68, 68, 68); font-family: &quot;Open Sans&quot;, serif;\"><figure class=\"wp-block-image size-large\" style=\"display: flex; margin-right: var(--gallery-block--gutter-size,16px); flex-grow: 1; justify-content: center; position: relative; flex-direction: column; max-width: 100%; width: calc(50% - var(--gallery-block--gutter-size, 16px)*0.5); align-self: inherit;\"><img loading=\"lazy\" width=\"1024\" height=\"577\" data-id=\"10815\" src=\"http://smkkrian1.sch.id/wp-content/uploads/2023/06/WhatsApp-Image-2023-06-06-at-09.36.46-1-1024x577.jpeg\" alt=\"\" class=\"wp-image-10815\" srcset=\"http://smkkrian1.sch.id/wp-content/uploads/2023/06/WhatsApp-Image-2023-06-06-at-09.36.46-1-1024x577.jpeg 1024w, http://smkkrian1.sch.id/wp-content/uploads/2023/06/WhatsApp-Image-2023-06-06-at-09.36.46-1-300x169.jpeg 300w, http://smkkrian1.sch.id/wp-content/uploads/2023/06/WhatsApp-Image-2023-06-06-at-09.36.46-1-768x433.jpeg 768w, http://smkkrian1.sch.id/wp-content/uploads/2023/06/WhatsApp-Image-2023-06-06-at-09.36.46-1-1536x866.jpeg 1536w, http://smkkrian1.sch.id/wp-content/uploads/2023/06/WhatsApp-Image-2023-06-06-at-09.36.46-1.jpeg 1600w\" sizes=\"(max-width: 1024px) 100vw, 1024px\" style=\"height: 212.422px; max-width: 100%; vertical-align: bottom; margin-bottom: 0px; border-radius: inherit; display: block; width: 377px; flex: 1 0 0%; object-fit: cover;\"></figure><figure class=\"wp-block-image size-large\" style=\"display: flex; flex-grow: 1; justify-content: center; position: relative; flex-direction: column; max-width: 100%; width: calc(50% - var(--gallery-block--gutter-size, 16px)*0.5); align-self: inherit;\"><img loading=\"lazy\" width=\"1024\" height=\"577\" data-id=\"10816\" src=\"http://smkkrian1.sch.id/wp-content/uploads/2023/06/WhatsApp-Image-2023-06-06-at-09.36.46-1024x577.jpeg\" alt=\"\" class=\"wp-image-10816\" srcset=\"http://smkkrian1.sch.id/wp-content/uploads/2023/06/WhatsApp-Image-2023-06-06-at-09.36.46-1024x577.jpeg 1024w, http://smkkrian1.sch.id/wp-content/uploads/2023/06/WhatsApp-Image-2023-06-06-at-09.36.46-300x169.jpeg 300w, http://smkkrian1.sch.id/wp-content/uploads/2023/06/WhatsApp-Image-2023-06-06-at-09.36.46-768x433.jpeg 768w, http://smkkrian1.sch.id/wp-content/uploads/2023/06/WhatsApp-Image-2023-06-06-at-09.36.46-1536x866.jpeg 1536w, http://smkkrian1.sch.id/wp-content/uploads/2023/06/WhatsApp-Image-2023-06-06-at-09.36.46.jpeg 1600w\" sizes=\"(max-width: 1024px) 100vw, 1024px\" style=\"height: 212.422px; max-width: 100%; vertical-align: bottom; margin-bottom: 0px; border-radius: inherit; display: block; width: 377px; flex: 1 0 0%; object-fit: cover;\"></figure></figure>', '2023-06-24 05:51:31', '2023-06-26 10:03:04'),
(8, 'Paskibra SMK Krian 1 Juara 1 Bina – LPKKB CLEOPATRA 2022 SMPN 2 KREMBUNG', 'paskibra-smk-krian-1-juara-1-bina-lpkkb-cleopatra-2022-smpn-2-krembung', 37, '1687611239.jpeg', '<p style=\"overflow-wrap: break-word; border: 0px; font-variant-numeric: inherit; font-variant-east-asian: inherit; font-variant-alternates: inherit; font-stretch: inherit; line-height: 1.6; font-family: &quot;Open Sans&quot;, serif; font-optical-sizing: inherit; font-kerning: inherit; font-feature-settings: inherit; font-variation-settings: inherit; font-size: 16px; margin-right: 0px; margin-bottom: 15px; margin-left: 0px; outline: 0px; padding: 0px; vertical-align: baseline; color: rgb(68, 68, 68);\">SMK Krian 1 Memiliki Ekstrakulikuler Paskibra yang bertujuan Untuk Menumbuhkan sikap jasmani yang tegap dan tangkas, rasa persatuan, disiplin sehingga dengan demikian senantiasa dapat mengutamakan kepentingan tugas diatas kepentingan individu, dan secara tak langsung juga menanamkan rasa tanggung jawab.</p><p style=\"overflow-wrap: break-word; border: 0px; font-variant-numeric: inherit; font-variant-east-asian: inherit; font-variant-alternates: inherit; font-stretch: inherit; line-height: 1.6; font-family: &quot;Open Sans&quot;, serif; font-optical-sizing: inherit; font-kerning: inherit; font-feature-settings: inherit; font-variation-settings: inherit; font-size: 16px; margin-right: 0px; margin-bottom: 15px; margin-left: 0px; outline: 0px; padding: 0px; vertical-align: baseline; color: rgb(68, 68, 68);\">Tim Paskibra SMK Krian 1 (Parasaka) kembali menorehkan prestasi dengan meraih Juara 1 Bina – LPKBB CLEOPATRA 2022 SMPN 2 KREMBUNG Tingkat SMK/SMA/Sederajat<br><br>Acara ini dilakukan pada 30 Oktober 2022 Langsung di SMPN 2 Krembung</p><figure class=\"wp-block-gallery has-nested-images columns-default is-cropped\" style=\"display: flex; margin-bottom: 0px; text-align: center; flex-wrap: wrap; list-style-type: none; padding: 0px; color: rgb(68, 68, 68); font-family: &quot;Open Sans&quot;, serif;\"><figure class=\"wp-block-image size-large\" style=\"display: flex; margin-right: var(--gallery-block--gutter-size,16px); flex-grow: 1; justify-content: center; position: relative; flex-direction: column; max-width: 100%; width: calc(33.33% - var(--gallery-block--gutter-size, 16px)*0.66667); align-self: inherit;\"><img loading=\"lazy\" width=\"1024\" height=\"576\" data-id=\"9624\" src=\"http://smkkrian1.sch.id/wp-content/uploads/2022/11/cleopatra2-1024x576.jpeg\" alt=\"\" class=\"wp-image-9624\" srcset=\"http://smkkrian1.sch.id/wp-content/uploads/2022/11/cleopatra2-1024x576.jpeg 1024w, http://smkkrian1.sch.id/wp-content/uploads/2022/11/cleopatra2-300x169.jpeg 300w, http://smkkrian1.sch.id/wp-content/uploads/2022/11/cleopatra2-768x432.jpeg 768w, http://smkkrian1.sch.id/wp-content/uploads/2022/11/cleopatra2.jpeg 1500w\" sizes=\"(max-width: 1024px) 100vw, 1024px\" style=\"height: 138.375px; max-width: 100%; vertical-align: bottom; margin-bottom: 0px; border-radius: inherit; display: block; width: 246px; flex: 1 0 0%; object-fit: cover;\"></figure><figure class=\"wp-block-image size-large\" style=\"display: flex; margin-right: var(--gallery-block--gutter-size,16px); flex-grow: 1; justify-content: center; position: relative; flex-direction: column; max-width: 100%; width: calc(33.33% - var(--gallery-block--gutter-size, 16px)*0.66667); align-self: inherit;\"><img loading=\"lazy\" width=\"1024\" height=\"576\" data-id=\"9625\" src=\"http://smkkrian1.sch.id/wp-content/uploads/2022/11/cleopatra3-1024x576.jpeg\" alt=\"\" class=\"wp-image-9625\" srcset=\"http://smkkrian1.sch.id/wp-content/uploads/2022/11/cleopatra3-1024x576.jpeg 1024w, http://smkkrian1.sch.id/wp-content/uploads/2022/11/cleopatra3-300x169.jpeg 300w, http://smkkrian1.sch.id/wp-content/uploads/2022/11/cleopatra3-768x432.jpeg 768w, http://smkkrian1.sch.id/wp-content/uploads/2022/11/cleopatra3.jpeg 1500w\" sizes=\"(max-width: 1024px) 100vw, 1024px\" style=\"height: 138.375px; max-width: 100%; vertical-align: bottom; margin-bottom: 0px; border-radius: inherit; display: block; width: 246px; flex: 1 0 0%; object-fit: cover;\"></figure><figure class=\"wp-block-image size-large\" style=\"display: flex; flex-grow: 1; justify-content: center; position: relative; flex-direction: column; max-width: 100%; width: calc(33.33% - var(--gallery-block--gutter-size, 16px)*0.66667); align-self: inherit;\"><img loading=\"lazy\" width=\"1024\" height=\"576\" data-id=\"9621\" src=\"http://smkkrian1.sch.id/wp-content/uploads/2022/11/cleopatra4-1024x576.jpeg\" alt=\"\" class=\"wp-image-9621\" srcset=\"http://smkkrian1.sch.id/wp-content/uploads/2022/11/cleopatra4-1024x576.jpeg 1024w, http://smkkrian1.sch.id/wp-content/uploads/2022/11/cleopatra4-300x169.jpeg 300w, http://smkkrian1.sch.id/wp-content/uploads/2022/11/cleopatra4-768x432.jpeg 768w, http://smkkrian1.sch.id/wp-content/uploads/2022/11/cleopatra4-1536x864.jpeg 1536w, http://smkkrian1.sch.id/wp-content/uploads/2022/11/cleopatra4.jpeg 1599w\" sizes=\"(max-width: 1024px) 100vw, 1024px\" style=\"height: 138.375px; max-width: 100%; vertical-align: bottom; margin-bottom: 0px; border-radius: inherit; display: block; width: 246px; flex: 1 0 0%; object-fit: cover;\"></figure><figure class=\"wp-block-image size-large\" style=\"display: flex; margin-right: var(--gallery-block--gutter-size,16px); flex-grow: 1; justify-content: center; position: relative; flex-direction: column; max-width: 100%; width: calc(33.33% - var(--gallery-block--gutter-size, 16px)*0.66667); align-self: inherit;\"><img loading=\"lazy\" width=\"1024\" height=\"682\" data-id=\"9622\" src=\"http://smkkrian1.sch.id/wp-content/uploads/2022/11/cleopatra5-1024x682.jpeg\" alt=\"\" class=\"wp-image-9622\" srcset=\"http://smkkrian1.sch.id/wp-content/uploads/2022/11/cleopatra5-1024x682.jpeg 1024w, http://smkkrian1.sch.id/wp-content/uploads/2022/11/cleopatra5-300x200.jpeg 300w, http://smkkrian1.sch.id/wp-content/uploads/2022/11/cleopatra5-768x512.jpeg 768w, http://smkkrian1.sch.id/wp-content/uploads/2022/11/cleopatra5.jpeg 1280w\" sizes=\"(max-width: 1024px) 100vw, 1024px\" style=\"height: 251.078px; max-width: 100%; vertical-align: bottom; margin-bottom: 0px; border-radius: inherit; display: block; width: 377px; flex: 1 0 0%; object-fit: cover;\"></figure><figure class=\"wp-block-image size-large\" style=\"display: flex; flex-grow: 1; justify-content: center; position: relative; flex-direction: column; max-width: 100%; width: calc(33.33% - var(--gallery-block--gutter-size, 16px)*0.66667); align-self: inherit;\"><img loading=\"lazy\" width=\"1024\" height=\"682\" data-id=\"9620\" src=\"http://smkkrian1.sch.id/wp-content/uploads/2022/11/cleopatra6-1024x682.jpeg\" alt=\"\" class=\"wp-image-9620\" srcset=\"http://smkkrian1.sch.id/wp-content/uploads/2022/11/cleopatra6-1024x682.jpeg 1024w, http://smkkrian1.sch.id/wp-content/uploads/2022/11/cleopatra6-300x200.jpeg 300w, http://smkkrian1.sch.id/wp-content/uploads/2022/11/cleopatra6-768x512.jpeg 768w, http://smkkrian1.sch.id/wp-content/uploads/2022/11/cleopatra6.jpeg 1280w\" sizes=\"(max-width: 1024px) 100vw, 1024px\" style=\"height: 251.078px; max-width: 100%; vertical-align: bottom; margin-bottom: 0px; border-radius: inherit; display: block; width: 377px; flex: 1 0 0%; object-fit: cover;\"></figure></figure><figure class=\"wp-block-image size-large\" style=\"margin-bottom: 1em; text-align: center; color: rgb(68, 68, 68); font-family: &quot;Open Sans&quot;, serif;\"><img loading=\"lazy\" width=\"1024\" height=\"576\" src=\"http://smkkrian1.sch.id/wp-content/uploads/2022/11/cleopatra7-1024x576.jpeg\" alt=\"\" class=\"wp-image-9626\" srcset=\"http://smkkrian1.sch.id/wp-content/uploads/2022/11/cleopatra7-1024x576.jpeg 1024w, http://smkkrian1.sch.id/wp-content/uploads/2022/11/cleopatra7-300x169.jpeg 300w, http://smkkrian1.sch.id/wp-content/uploads/2022/11/cleopatra7-768x432.jpeg 768w, http://smkkrian1.sch.id/wp-content/uploads/2022/11/cleopatra7-1536x864.jpeg 1536w, http://smkkrian1.sch.id/wp-content/uploads/2022/11/cleopatra7.jpeg 1599w\" sizes=\"(max-width: 1024px) 100vw, 1024px\" style=\"height: auto; max-width: 100%; vertical-align: bottom; margin-bottom: 0px; border-radius: inherit;\"></figure>', '2023-06-24 05:54:01', '2023-06-26 10:02:58');

-- --------------------------------------------------------

--
-- Struktur dari tabel `newsimages`
--

CREATE TABLE `newsimages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `news_id` bigint(20) UNSIGNED DEFAULT NULL,
  `newsimage_image` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `pagetypes`
--

CREATE TABLE `pagetypes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `type_name` varchar(255) DEFAULT NULL,
  `type_slug` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `pagetypes`
--

INSERT INTO `pagetypes` (`id`, `type_name`, `type_slug`, `created_at`, `updated_at`) VALUES
(1, 'video', 'video', '2023-05-28 02:07:44', '2023-05-28 02:07:44'),
(2, 'galeri', 'galeri', '2023-05-28 02:07:44', '2023-05-28 02:07:44'),
(3, 'blog', 'blog', '2023-05-28 02:07:44', '2023-05-28 02:07:44'),
(4, 'teamlist', 'teamlist', '2023-05-28 02:07:44', '2023-05-28 02:07:44'),
(5, 'pdf_view', 'pdf_view', '2023-05-28 02:07:44', '2023-05-28 02:07:44');

-- --------------------------------------------------------

--
-- Struktur dari tabel `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `paymentcontrols`
--

CREATE TABLE `paymentcontrols` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `paymentcontrol_name` varchar(255) DEFAULT NULL,
  `paymentcontrol_merchant_id` longtext DEFAULT NULL,
  `paymentcontrol_server_key` longtext DEFAULT NULL,
  `paymentcontrol_client_key` longtext DEFAULT NULL,
  `paymentcontrol_status` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `paymentcontrols`
--

INSERT INTO `paymentcontrols` (`id`, `paymentcontrol_name`, `paymentcontrol_merchant_id`, `paymentcontrol_server_key`, `paymentcontrol_client_key`, `paymentcontrol_status`, `created_at`, `updated_at`) VALUES
(1, 'MIDTRANS', 'G400140055', 'SB-Mid-server-T_UdN4X2THs48wx7R65Fj94k', 'SB-Mid-client-ZUcZHUE3iViL1Lpq', 'aktif', '2023-06-10 09:24:06', '2023-06-10 09:24:06');

-- --------------------------------------------------------

--
-- Struktur dari tabel `paymenttypes`
--

CREATE TABLE `paymenttypes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `payment_name` varchar(255) NOT NULL,
  `payment_desc` longtext NOT NULL,
  `payment_value` varchar(255) NOT NULL,
  `payment_status` varchar(255) NOT NULL,
  `payment_image` longtext DEFAULT NULL,
  `payment_thumbnail` longtext DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `paymenttypes`
--

INSERT INTO `paymenttypes` (`id`, `payment_name`, `payment_desc`, `payment_value`, `payment_status`, `payment_image`, `payment_thumbnail`, `created_at`, `updated_at`) VALUES
(1, 'Pendaftaran Peserta Didik Baru', 'Pendaftaran Peserta DIdik Baru Tahun ajaran 2023-2024 telah dibuka. gelombang pertama dimulai dari sejak tanggal 1 juni 2023 sampai 1 agustus 2023.\r\nTerdapat potongan harga hingga 6jt rupiah. \r\nTotal biaya pendaftaran hanya 5jt rupiah dari 11jt rupiah khusus untuk gelombang pertamas.', '5000000', 'aktif', '1686298782.PNG', '1686298782.PNG', '2023-06-09 00:48:18', '2023-06-09 01:19:43');

-- --------------------------------------------------------

--
-- Struktur dari tabel `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `profiles`
--

CREATE TABLE `profiles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `profile_image` varchar(255) DEFAULT NULL,
  `profile_map` longtext DEFAULT NULL,
  `profile_video` longtext DEFAULT NULL,
  `profile_desc` longtext DEFAULT NULL,
  `profile_alamat` longtext DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `profiles`
--

INSERT INTO `profiles` (`id`, `profile_image`, `profile_map`, `profile_video`, `profile_desc`, `profile_alamat`, `created_at`, `updated_at`) VALUES
(1, '1687938530.png', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d15825.616405843488!2d112.5847652!3d-7.4204508!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e78084e164c2e91%3A0xda653a49b0cff45c!2sSMK%20Krian%201%20Sidoarjo!5e0!3m2!1sen!2suk!4v1687938375995!5m2!1sen!2suk\" width=\"600\" height=\"450\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\" referrerpolicy=\"no-referrer-when-downgrade\"></iframe>', 'https://www.youtube.com/watch?v=VUM2FexoRsM', 'SMK KRIAN BISA', 'Jl. Kyai Mojo Katrungan-Krian, Bakalan, Katrungan, Sidoarjo, Kabupaten Sidoarjo, Jawa Timur 61262, Indonesia', '2023-06-28 00:48:50', '2023-06-28 00:55:16'),
(2, NULL, '<iframe src=\"https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d15825.616405843488!2d112.5847652!3d-7.4204508!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e78084e164c2e91%3A0xda653a49b0cff45c!2sSMK%20Krian%201%20Sidoarjo!5e0!3m2!1sen!2suk!4v1687938375995!5m2!1sen!2suk\" width=\"600\" height=\"450\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\" referrerpolicy=\"no-referrer-when-downgrade\"></iframe>', 'https://www.youtube.com/watch?v=VUM2FexoRsM', 'SMK KRIAN BISAs', 'Jl. Kyai Mojo Katrungan-Krian, Bakalan, Katrungan, Sidoarjo, Kabupaten Sidoarjo, Jawa Timur 61262, Indonesia', '2023-06-28 00:53:47', '2023-06-28 00:53:47'),
(3, NULL, '<iframe src=\"https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d15825.616405843488!2d112.5847652!3d-7.4204508!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e78084e164c2e91%3A0xda653a49b0cff45c!2sSMK%20Krian%201%20Sidoarjo!5e0!3m2!1sen!2suk!4v1687938375995!5m2!1sen!2suk\" width=\"600\" height=\"450\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\" referrerpolicy=\"no-referrer-when-downgrade\"></iframe>', 'https://www.youtube.com/watch?v=VUM2FexoRsM', 'SMK KRIAN BISA', 'Jl. Kyai Mojo Katrungan-Krian, Bakalan, Katrungan, Sidoarjo, Kabupaten Sidoarjo, Jawa Timur 61262, Indonesia', '2023-06-28 00:53:55', '2023-06-28 00:53:55'),
(4, NULL, '<iframe src=\"https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d15825.616405843488!2d112.5847652!3d-7.4204508!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e78084e164c2e91%3A0xda653a49b0cff45c!2sSMK%20Krian%201%20Sidoarjo!5e0!3m2!1sen!2suk!4v1687938375995!5m2!1sen!2suk\" width=\"600\" height=\"450\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\" referrerpolicy=\"no-referrer-when-downgrade\"></iframe>', 'https://www.youtube.com/watch?v=VUM2FexoRsM', 'SMK KRIAN BISAS', 'Jl. Kyai Mojo Katrungan-Krian, Bakalan, Katrungan, Sidoarjo, Kabupaten Sidoarjo, Jawa Timur 61262, Indonesia', '2023-06-28 00:54:00', '2023-06-28 00:54:00'),
(5, NULL, '<iframe src=\"https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d15825.616405843488!2d112.5847652!3d-7.4204508!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e78084e164c2e91%3A0xda653a49b0cff45c!2sSMK%20Krian%201%20Sidoarjo!5e0!3m2!1sen!2suk!4v1687938375995!5m2!1sen!2suk\" width=\"600\" height=\"450\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\" referrerpolicy=\"no-referrer-when-downgrade\"></iframe>', 'https://www.youtube.com/watch?v=VUM2FexoRsM', 'asd', 'Jl. Kyai Mojo Katrungan-Krian, Bakalan, Katrungan, Sidoarjo, Kabupaten Sidoarjo, Jawa Timur 61262, Indonesia', '2023-06-28 00:54:14', '2023-06-28 00:54:14');

-- --------------------------------------------------------

--
-- Struktur dari tabel `sliders`
--

CREATE TABLE `sliders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `subtitle` varchar(255) DEFAULT NULL,
  `maintitle` varchar(255) DEFAULT NULL,
  `texttitle` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `transaksi1s`
--

CREATE TABLE `transaksi1s` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `paymenttype_id` bigint(20) UNSIGNED NOT NULL,
  `transaksi1_uuid` longtext DEFAULT NULL,
  `transaksi1_name` longtext DEFAULT NULL,
  `transaksi1_email` longtext DEFAULT NULL,
  `transaksi1_alamat` longtext DEFAULT NULL,
  `transaksi1_pos` longtext DEFAULT NULL,
  `transaksi1_kota` longtext DEFAULT NULL,
  `transaksi1_asal` longtext DEFAULT NULL,
  `transaksi1_phone` longtext DEFAULT NULL,
  `transaksi1_status` longtext DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `transaksi1s`
--

INSERT INTO `transaksi1s` (`id`, `paymenttype_id`, `transaksi1_uuid`, `transaksi1_name`, `transaksi1_email`, `transaksi1_alamat`, `transaksi1_pos`, `transaksi1_kota`, `transaksi1_asal`, `transaksi1_phone`, `transaksi1_status`, `created_at`, `updated_at`) VALUES
(1, 1, 'c979aee1-7d69-4213-8403-ccd848a46f67', 'febri rizqi tahta nugraha', 'febri@gmail.com', 'simo jawar', '60181', 'surabaya', 'smpn 4 surabaya', '081329146514', 'unpaid', '2023-06-11 02:35:55', '2023-06-11 02:35:55');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `role` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `pass_vis` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `name`, `role`, `password`, `pass_vis`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'super_admin', '$2y$10$WuHe30.JNOuUDcAosYWCDeYNChKvzMho.O1dgxv232mJsMghweWDS', 'admin', '2023-05-28 02:07:44', '2023-05-28 02:07:44');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `banners`
--
ALTER TABLE `banners`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indeks untuk tabel `gurus`
--
ALTER TABLE `gurus`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `jurusans`
--
ALTER TABLE `jurusans`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `kategoris`
--
ALTER TABLE `kategoris`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `kategori_news`
--
ALTER TABLE `kategori_news`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `menus`
--
ALTER TABLE `menus`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `newsimages`
--
ALTER TABLE `newsimages`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `pagetypes`
--
ALTER TABLE `pagetypes`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indeks untuk tabel `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indeks untuk tabel `paymentcontrols`
--
ALTER TABLE `paymentcontrols`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `paymenttypes`
--
ALTER TABLE `paymenttypes`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indeks untuk tabel `profiles`
--
ALTER TABLE `profiles`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `sliders`
--
ALTER TABLE `sliders`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `transaksi1s`
--
ALTER TABLE `transaksi1s`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `banners`
--
ALTER TABLE `banners`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `gurus`
--
ALTER TABLE `gurus`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `jurusans`
--
ALTER TABLE `jurusans`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `kategoris`
--
ALTER TABLE `kategoris`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `kategori_news`
--
ALTER TABLE `kategori_news`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT untuk tabel `menus`
--
ALTER TABLE `menus`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT untuk tabel `news`
--
ALTER TABLE `news`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `newsimages`
--
ALTER TABLE `newsimages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `pagetypes`
--
ALTER TABLE `pagetypes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `paymentcontrols`
--
ALTER TABLE `paymentcontrols`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `paymenttypes`
--
ALTER TABLE `paymenttypes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `profiles`
--
ALTER TABLE `profiles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `sliders`
--
ALTER TABLE `sliders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `transaksi1s`
--
ALTER TABLE `transaksi1s`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
