-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 26, 2022 at 08:47 AM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `presensi`
--

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `golongan`
--

CREATE TABLE `golongan` (
  `id` int(20) NOT NULL,
  `id_golongan` bigint(20) UNSIGNED NOT NULL,
  `nama_golongan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `keterangan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `golongan`
--

INSERT INTO `golongan` (`id`, `id_golongan`, `nama_golongan`, `keterangan`, `created_at`, `updated_at`) VALUES
(1, 1, 'Kamabigus', 'Kepala Sekolah', NULL, NULL),
(2, 2, 'Ka. Gudep PA', 'Pembina Putra', NULL, NULL),
(3, 3, 'Ka. Gudep PI', 'Pembina Putri', NULL, NULL),
(4, 4, 'Pembina Putra', 'Pelatih Lapangan Putra', NULL, NULL),
(5, 5, 'Pembina Pramuka Putri', 'Pelatih Lapangan Putri', NULL, NULL),
(6, 6, 'Pembantu Pembina Putra', 'Administrasi Putra', NULL, NULL),
(7, 7, 'Pembantu Pembina Putri', 'Administrasi Putri', NULL, NULL),
(8, 8, 'Pramuka Garuda', 'Siswa', NULL, NULL),
(9, 9, 'Penggalang Terap', 'IX', NULL, NULL),
(10, 10, 'Penggalang Rakit', 'VIII', NULL, NULL),
(11, 11, 'Penggalang Ramu', 'VII', NULL, NULL),
(12, 12, 'Dewan Galang', 'Siswa', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2022_05_31_225645_create_presensi_table', 1),
(6, '2022_06_20_041634_tabel_golongan', 1),
(7, '2022_07_17_212001_create_golongan', 2),
(0, '2022_07_26_112906_create_tahun_table', 3);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `presensi`
--

CREATE TABLE `presensi` (
  `id` int(20) NOT NULL,
  `id_user` int(11) NOT NULL,
  `tanggal_absen` date NOT NULL,
  `j_masuk` time NOT NULL,
  `foto` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ket` enum('hadir','sakit','ijin','alpha') COLLATE utf8mb4_unicode_ci NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `presensi`
--

INSERT INTO `presensi` (`id`, `id_user`, `tanggal_absen`, `j_masuk`, `foto`, `ket`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 25, '2022-07-25', '07:04:08', '-', 'hadir', NULL, NULL, NULL),
(12, 25, '2022-07-25', '16:16:21', '1658740581.jpg', 'ijin', NULL, '2022-07-25 09:16:21', '2022-07-25 09:16:21'),
(13, 25, '2022-07-26', '13:37:08', '1658817428.jpg', 'hadir', NULL, '2022-07-26 06:37:08', '2022-07-26 06:37:08'),
(14, 25, '2022-07-26', '13:37:43', '1658817463.jpg', 'hadir', NULL, '2022-07-26 06:37:43', '2022-07-26 06:37:43');

-- --------------------------------------------------------

--
-- Table structure for table `tahun`
--

CREATE TABLE `tahun` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama_tahun` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `keterangan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tahun`
--

INSERT INTO `tahun` (`id`, `nama_tahun`, `keterangan`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'Tahun Ajaran 2022 / 2023', 'Semester Ganjil', NULL, NULL, NULL),
(2, 'Tahun Ajaran 2022 / 2023', 'Semester Genap', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kelas` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nta` bigint(100) DEFAULT NULL,
  `tempat_lahir` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tanggal_lahir` date DEFAULT NULL,
  `jenis_kelamin` enum('Laki-laki','Perempuan') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `agama` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `alamat` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `no_tlp` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `roles` enum('ADMIN','USER','PEMBINA') COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_golongan` int(10) DEFAULT NULL,
  `foto` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `nama`, `email`, `username`, `email_verified_at`, `password`, `kelas`, `nta`, `tempat_lahir`, `tanggal_lahir`, `jenis_kelamin`, `agama`, `alamat`, `no_tlp`, `roles`, `id_golongan`, `foto`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'qiswatul ulfah', 'admin@gmail.com', 'qiswatul ulfah', NULL, '$2y$10$OBctipx2riO1h//PMS6aC.U.B0VvAO9nEr6jPIKPAhlJ06EOilMA.', 'PEMBINA', 1133130960500003, 'Semarang', '1997-02-06', 'Laki-laki', 'Islam', 'Jalan saleh rt 8 rw 2', '123', 'ADMIN', 5, '1658755171.jpg', NULL, NULL, '2022-07-25 13:19:31'),
(15, 'Angsori, S.Pd', 'bayuk2020@gmail.com', 'Angsori', NULL, '$2y$10$r8ONO2un39.62HodKmudOO7KbwmeETgJWZpM/BkY2c/bNHm.gF2Le', NULL, 1133130960500006, 'Demak', '1985-02-04', 'Laki-laki', 'Islam', 'Genuk', '087832004449', 'PEMBINA', 2, '1658678663.jpg', NULL, '2022-07-23 04:20:31', '2022-07-24 16:04:23'),
(25, 'Anggraeni Putri Anjani', 'tes@gmail.com', 'Anggreani', NULL, '$2y$10$qw1NAv7zOHo2DJwtjI74oe8Hd0LYHMetj93ba21UmWNMLf7VyaU6S', 'VII - A', 1133130960500003, 'Grobogan', '2008-02-01', 'Perempuan', 'Islam', 'Jalan Sumur Adem', '081231807123', 'USER', 11, '1658723809.JPG', NULL, '2022-07-25 04:36:49', '2022-07-25 04:36:49');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `presensi`
--
ALTER TABLE `presensi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tahun`
--
ALTER TABLE `tahun`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `presensi`
--
ALTER TABLE `presensi`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `tahun`
--
ALTER TABLE `tahun`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
