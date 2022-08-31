-- phpMyAdmin SQL Dump
-- version 5.1.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Aug 10, 2022 at 10:58 PM
-- Server version: 5.7.33
-- PHP Version: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `keublud`
--

-- --------------------------------------------------------

--
-- Table structure for table `bank_tujuan`
--

CREATE TABLE `bank_tujuan` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `kode` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_rek` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_rek` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `bank_tujuan`
--

INSERT INTO `bank_tujuan` (`id`, `kode`, `nama`, `nama_rek`, `no_rek`, `created_at`, `updated_at`) VALUES
(1, '124', 'BANKALTIMTARA', 'BLUD RSJD ATMA HUSADA MAHAKAM', '001 153 6760', '2022-07-24 01:56:23', '2022-07-24 01:56:23');

-- --------------------------------------------------------

--
-- Table structure for table `bentuk_rekanan`
--

CREATE TABLE `bentuk_rekanan` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `bentuk_rekanan`
--

INSERT INTO `bentuk_rekanan` (`id`, `nama`, `created_at`, `updated_at`) VALUES
(1, 'CV', '2022-08-05 12:56:34', '2022-08-05 13:36:40'),
(2, 'PT', '2022-08-05 12:56:41', '2022-08-05 12:56:41'),
(3, 'Perorangan', '2022-08-05 12:57:12', '2022-08-05 12:57:12'),
(4, 'Firma', '2022-08-05 12:57:17', '2022-08-05 12:57:17');

-- --------------------------------------------------------

--
-- Table structure for table `bukti_gu`
--

CREATE TABLE `bukti_gu` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tgl` date DEFAULT NULL,
  `no` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `uraian` text COLLATE utf8mb4_unicode_ci,
  `uraian_rekening_id` bigint(20) UNSIGNED DEFAULT NULL,
  `debit` decimal(18,2) NOT NULL DEFAULT '0.00',
  `kredit` decimal(18,2) NOT NULL DEFAULT '0.00',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `bukti_gu`
--

INSERT INTO `bukti_gu` (`id`, `tgl`, `no`, `uraian`, `uraian_rekening_id`, `debit`, `kredit`, `created_at`, `updated_at`) VALUES
(1, '2022-07-11', '1261', 'Biaya konsumsi makan, pemindahan dan pembokaran barang rusak berat di RSJD AHM tgl. 1 Juni 2022 an. Wr.Tretan', 4, '0.00', '552000.00', '2022-07-25 05:35:06', '2022-07-26 07:44:58'),
(2, '2022-07-11', '1262', 'Biaya konsumsi makan, rapat terkait PMPRB di RSJD AHM tgl. 10 Juni 2022 an.Wr.Padang Upik', 1, '0.00', '419100.00', '2022-07-25 13:26:09', '2022-07-26 00:51:29'),
(3, '2022-07-11', '1263', 'Biaya konsumsi snack, root case analysis di RSJD AHM tgl. 15 Juni 2022 an. Sakura', 2, '0.00', '180000.00', '2022-07-25 13:27:19', '2022-07-26 00:51:37'),
(4, '2022-07-11', '1264', 'Biaya konsumsi makan, pertemuan persiapan dokumen pemeriksaan inspektorat di RSJD AHM tgl. 16 Juni 2022 an.Wr.Tretan', 2, '0.00', '134000.00', '2022-07-25 13:27:58', '2022-07-26 00:51:47'),
(5, '2022-07-11', '1265', 'Biaya konsumsi snack, kegiatan pemeriksaan dan penilaian sarpras proteksi kebakaran oleh dinas pemadam kebakaran dan penyelamatan kota samarinda di RSJD AHM tgl. 22 Juni 2022 an.Fresh Bakery', 2, '0.00', '333500.00', '2022-07-25 23:56:30', '2022-07-26 00:52:12'),
(6, '2022-07-11', '1266', 'Biaya konsumsi makan, kegiatan pemeriksaan dan penilaian sarpras proteksi kebakaran oleh dinas pemadam kebakaran dan penyelamatan kota samarinda di RSJD AHM tgl. 22 Juni 2022 an.Wr.Tretan', 2, '0.00', '580000.00', '2022-07-26 00:28:26', '2022-07-26 07:44:35'),
(7, '2022-07-12', '1301', 'Belanja ATK an.CV.ASEAN Technology', 37, '0.00', '6190000.00', '2022-08-04 02:38:00', '2022-08-04 02:38:00');

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
-- Table structure for table `jenis_potongan`
--

CREATE TABLE `jenis_potongan` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `jenis_potongan`
--

INSERT INTO `jenis_potongan` (`id`, `nama`, `created_at`, `updated_at`) VALUES
(1, 'PPH 21', '2022-07-25 02:11:47', '2022-07-25 02:11:43'),
(2, 'PPH 22', '2022-07-25 02:12:08', '2022-07-25 02:12:13'),
(3, 'PPH 23', '2022-07-25 02:12:25', '2022-08-05 12:43:55'),
(4, 'PPN', '2022-07-25 02:12:43', '2022-07-25 02:12:46'),
(5, 'Lainnya', '2022-07-25 02:12:54', '2022-08-05 12:46:12');

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
(5, '2022_07_21_084352_create_bank_tujuan_table', 1),
(6, '2022_07_21_113403_create_potongan_table', 1),
(8, '2022_07_24_082839_create_rekening1_table', 1),
(9, '2022_07_24_150212_create_rekening2_table', 2),
(10, '2022_07_24_150212_create_rekening3_table', 3),
(11, '2022_07_24_150212_create_rekening4_table', 4),
(13, '2022_07_24_201630_create_rekening5_table', 5),
(14, '2022_07_24_205331_create_rekening6_table', 6),
(15, '2022_07_24_205652_create_uraian_rekening_table', 7),
(16, '2022_07_25_100012_create_jenis_potongan_table', 8),
(17, '2022_07_25_100155_add_jenis_potongan_id_to_potongan_table', 8),
(19, '2022_07_25_132140_create_bukti_gu_table', 9),
(20, '2022_07_26_113826_create_pajak_gu_table', 10),
(21, '2022_07_29_084536_create_pagu_murni_table', 11),
(24, '2022_08_05_185320_create_bentuk_rekanan_table', 12),
(25, '2022_08_05_185320_create_rekanan_table', 12);

-- --------------------------------------------------------

--
-- Table structure for table `pagu_murni`
--

CREATE TABLE `pagu_murni` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uraian_rekening_id` bigint(20) UNSIGNED NOT NULL,
  `nilai` decimal(18,2) NOT NULL DEFAULT '0.00',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pagu_murni`
--

INSERT INTO `pagu_murni` (`id`, `uraian_rekening_id`, `nilai`, `created_at`, `updated_at`) VALUES
(1, 22, '163230000.00', '2022-07-29 13:12:51', '2022-07-29 13:12:51'),
(2, 23, '30100000.00', '2022-07-29 13:12:51', '2022-07-29 13:12:51'),
(3, 5, '6475000000.00', '2022-07-29 13:12:51', '2022-07-29 13:12:51'),
(4, 19, '20000000.00', '2022-07-30 11:13:04', '2022-07-30 11:13:04'),
(5, 20, '11000000.00', '2022-07-30 11:13:30', '2022-07-30 11:13:30'),
(6, 21, '4200000.00', '2022-07-30 11:13:43', '2022-07-30 11:13:43'),
(7, 24, '29200000.00', '2022-07-30 11:14:14', '2022-07-30 11:14:14'),
(8, 25, '10900000.00', '2022-07-30 11:14:46', '2022-07-30 11:14:46'),
(9, 26, '146900000.00', '2022-07-30 11:15:02', '2022-07-30 11:15:02'),
(10, 27, '146900000.00', '2022-07-30 11:15:47', '2022-07-30 11:15:47'),
(11, 28, '65292000.00', '2022-07-30 11:16:02', '2022-07-30 11:16:02'),
(12, 29, '117525600.00', '2022-07-30 11:16:17', '2022-07-30 11:16:17'),
(13, 30, '24484500.00', '2022-07-30 11:16:32', '2022-07-30 11:16:32'),
(14, 6, '555000000.00', '2022-07-30 11:17:08', '2022-07-30 11:17:08'),
(15, 7, '21600000.00', '2022-07-30 11:17:38', '2022-07-30 11:17:38'),
(16, 8, '1184000000.00', '2022-07-30 11:17:56', '2022-07-30 11:17:56'),
(17, 10, '164000000.00', '2022-07-30 11:18:14', '2022-07-30 11:18:14'),
(18, 11, '719902320.00', '2022-07-30 11:19:14', '2022-07-30 11:19:14'),
(19, 12, '300000000.00', '2022-07-30 11:19:27', '2022-07-30 11:19:27'),
(20, 13, '40000000.00', '2022-07-30 11:19:39', '2022-07-30 11:19:39'),
(21, 14, '10000000.00', '2022-07-30 11:19:52', '2022-07-30 11:19:52'),
(22, 17, '8160000.00', '2022-07-30 11:20:13', '2022-07-30 11:20:13'),
(23, 18, '13833080.00', '2022-07-30 11:20:24', '2022-07-30 11:20:24'),
(24, 41, '75000000.00', '2022-07-30 11:20:57', '2022-07-30 11:20:57'),
(25, 42, '49998000.00', '2022-07-30 11:21:09', '2022-07-30 11:21:09'),
(26, 33, '200000000.00', '2022-07-30 11:21:23', '2022-07-30 11:21:23'),
(27, 39, '62800000.00', '2022-07-30 11:21:42', '2022-07-30 11:21:42'),
(28, 40, '52492440.00', '2022-07-30 11:21:54', '2022-07-30 11:21:54'),
(29, 32, '50000000.00', '2022-07-30 11:22:09', '2022-07-30 11:22:09'),
(30, 37, '53986135.00', '2022-07-30 11:23:04', '2022-07-30 11:23:04'),
(31, 38, '10000000.00', '2022-07-30 11:23:23', '2022-07-30 11:23:23'),
(32, 34, '69944000.00', '2022-07-30 11:23:43', '2022-07-30 11:23:43'),
(33, 2, '60000000.00', '2022-07-30 11:24:32', '2022-07-30 11:24:32'),
(34, 36, '59233260.00', '2022-07-30 11:26:09', '2022-07-30 11:26:09'),
(35, 35, '746318665.00', '2022-07-30 11:26:47', '2022-07-30 11:26:47'),
(36, 31, '750000000.00', '2022-07-30 11:28:12', '2022-07-30 11:28:12'),
(37, 44, '343806435.00', '2022-07-30 11:30:40', '2022-07-30 11:30:40'),
(38, 45, '14415000.00', '2022-07-30 11:30:49', '2022-07-30 11:30:49'),
(39, 46, '7960000.00', '2022-07-30 11:30:56', '2022-07-30 11:30:56'),
(40, 47, '106560000.00', '2022-07-30 11:31:12', '2022-07-30 11:31:12'),
(41, 48, '13440000.00', '2022-07-30 11:31:23', '2022-07-30 11:31:23'),
(42, 50, '23784000.00', '2022-07-30 11:32:08', '2022-07-30 11:32:08'),
(43, 51, '250000000.00', '2022-07-30 11:32:17', '2022-07-30 11:32:17'),
(44, 52, '49880000.00', '2022-07-30 11:32:28', '2022-07-30 11:32:28'),
(45, 53, '45000000.00', '2022-07-30 11:32:36', '2022-07-30 11:32:36'),
(46, 54, '150000000.00', '2022-07-30 11:32:44', '2022-07-30 11:32:44'),
(47, 55, '400000000.00', '2022-07-30 11:33:02', '2022-07-30 11:33:02'),
(48, 57, '50000000.00', '2022-07-30 11:33:10', '2022-07-30 11:33:10'),
(49, 58, '10080000.00', '2022-07-30 11:33:20', '2022-07-30 11:33:20'),
(50, 59, '78200000.00', '2022-07-30 11:33:27', '2022-07-30 11:33:27'),
(51, 60, '54751500.00', '2022-07-30 11:33:36', '2022-07-30 11:33:36'),
(52, 61, '5000000.00', '2022-07-30 11:33:56', '2022-07-30 11:33:56'),
(53, 62, '5000000.00', '2022-07-30 11:34:06', '2022-07-30 11:34:06'),
(54, 63, '18000000.00', '2022-07-30 11:34:17', '2022-07-30 11:34:17'),
(55, 74, '37750000.00', '2022-07-30 11:34:45', '2022-07-30 11:34:45'),
(56, 69, '10000000.00', '2022-07-30 11:35:21', '2022-07-30 11:35:21'),
(57, 70, '2000000.00', '2022-07-30 11:35:30', '2022-07-30 11:35:30'),
(58, 71, '270000000.00', '2022-07-30 11:35:51', '2022-07-30 11:35:51'),
(59, 72, '37402320.00', '2022-07-30 11:36:35', '2022-07-30 11:36:35'),
(60, 64, '383000000.00', '2022-07-30 11:36:49', '2022-07-30 11:36:49'),
(61, 65, '18000000.00', '2022-07-30 11:36:59', '2022-07-30 11:36:59'),
(62, 66, '27950000.00', '2022-07-30 11:37:10', '2022-07-30 11:37:10'),
(63, 84, '23000000.00', '2022-07-30 11:38:12', '2022-07-30 11:38:12'),
(64, 85, '14500000.00', '2022-07-30 11:38:26', '2022-07-30 11:38:26'),
(65, 67, '69625000.00', '2022-07-30 11:39:45', '2022-07-30 11:39:45'),
(66, 68, '47600000.00', '2022-07-30 11:39:56', '2022-07-30 11:39:56'),
(67, 73, '10050000.00', '2022-07-30 11:40:09', '2022-07-30 11:40:09'),
(68, 122, '74376000.00', '2022-07-30 11:40:28', '2022-07-30 11:40:28'),
(69, 56, '0.00', '2022-07-30 11:40:57', '2022-07-30 11:40:57'),
(70, 9, '0.00', '2022-07-30 11:41:05', '2022-07-30 11:41:05'),
(71, 15, '0.00', '2022-07-30 11:41:08', '2022-07-30 11:41:08'),
(72, 16, '0.00', '2022-07-30 11:41:11', '2022-07-30 11:41:11'),
(73, 1, '0.00', '2022-07-30 11:41:18', '2022-07-30 11:41:18'),
(74, 3, '0.00', '2022-07-30 11:41:21', '2022-07-30 11:41:21'),
(75, 4, '0.00', '2022-07-30 11:41:23', '2022-07-30 11:41:23'),
(76, 43, '0.00', '2022-07-30 11:41:27', '2022-07-30 11:41:27'),
(77, 166, '0.00', '2022-07-30 11:41:36', '2022-07-30 11:41:36'),
(78, 49, '0.00', '2022-07-30 11:41:43', '2022-07-30 11:41:43'),
(79, 82, '0.00', '2022-07-30 11:41:50', '2022-07-30 11:41:50'),
(80, 83, '0.00', '2022-07-30 11:41:54', '2022-07-30 11:41:54'),
(81, 86, '0.00', '2022-07-30 11:41:57', '2022-07-30 11:41:57'),
(82, 87, '0.00', '2022-07-30 11:42:00', '2022-07-30 11:42:00'),
(83, 88, '0.00', '2022-07-30 11:42:04', '2022-07-30 11:42:04'),
(84, 89, '0.00', '2022-07-30 11:42:28', '2022-07-30 11:42:28'),
(85, 90, '0.00', '2022-07-30 11:42:31', '2022-07-30 11:42:31'),
(86, 91, '0.00', '2022-07-30 11:42:35', '2022-07-30 11:42:35'),
(87, 92, '0.00', '2022-07-30 11:42:39', '2022-07-30 11:42:39'),
(88, 75, '0.00', '2022-07-30 11:42:48', '2022-07-30 11:42:48'),
(89, 76, '0.00', '2022-07-30 11:42:52', '2022-07-30 11:42:52'),
(90, 77, '0.00', '2022-07-30 11:42:54', '2022-07-30 11:42:54'),
(91, 78, '0.00', '2022-07-30 11:42:58', '2022-07-30 11:42:58'),
(92, 79, '0.00', '2022-07-30 11:43:01', '2022-07-30 11:43:01'),
(93, 80, '0.00', '2022-07-30 11:43:05', '2022-07-30 11:43:05'),
(94, 81, '0.00', '2022-07-30 11:43:08', '2022-07-30 11:43:08'),
(95, 95, '80320000.00', '2022-07-30 11:44:06', '2022-07-30 11:44:06'),
(96, 96, '112925000.00', '2022-07-30 11:44:16', '2022-07-30 11:44:16'),
(97, 97, '21560000.00', '2022-07-30 11:44:24', '2022-07-30 11:44:24'),
(98, 98, '81030000.00', '2022-07-30 11:44:32', '2022-07-30 11:44:32'),
(99, 121, '10000000.00', '2022-07-30 11:44:58', '2022-07-30 11:44:58'),
(100, 120, '0.00', '2022-07-30 11:45:01', '2022-07-30 11:45:01'),
(101, 99, '316000000.00', '2022-07-30 11:45:48', '2022-07-30 11:45:48'),
(102, 100, '19810000.00', '2022-07-30 11:45:58', '2022-07-30 11:45:58'),
(103, 103, '724000000.00', '2022-07-30 11:46:13', '2022-07-30 11:46:13'),
(104, 101, '0.00', '2022-07-30 11:46:22', '2022-07-30 11:46:22'),
(105, 102, '0.00', '2022-07-30 11:46:26', '2022-07-30 11:46:26'),
(106, 109, '30000000.00', '2022-07-30 11:46:41', '2022-07-30 11:46:41'),
(107, 110, '32988000.00', '2022-07-30 11:46:50', '2022-07-30 11:46:50'),
(108, 111, '18819845.00', '2022-07-30 11:46:59', '2022-07-30 11:46:59'),
(109, 113, '40903000.00', '2022-07-30 11:47:09', '2022-07-30 11:47:09'),
(110, 114, '70381000.00', '2022-07-30 11:47:23', '2022-07-30 11:47:23'),
(111, 117, '3448500.00', '2022-07-30 11:47:40', '2022-07-30 11:47:40'),
(112, 119, '150000000.00', '2022-07-30 11:48:08', '2022-07-30 11:48:08'),
(113, 104, '0.00', '2022-07-30 11:48:13', '2022-07-30 11:48:13'),
(114, 105, '0.00', '2022-07-30 11:48:16', '2022-07-30 11:48:16'),
(115, 106, '0.00', '2022-07-30 11:48:19', '2022-07-30 11:48:19'),
(116, 107, '0.00', '2022-07-30 11:48:24', '2022-07-30 11:48:24'),
(117, 108, '0.00', '2022-07-30 11:48:27', '2022-07-30 11:48:27'),
(118, 112, '0.00', '2022-07-30 11:48:30', '2022-07-30 11:48:30'),
(119, 115, '0.00', '2022-07-30 11:48:33', '2022-07-30 11:48:33'),
(120, 116, '0.00', '2022-07-30 11:48:37', '2022-07-30 11:48:37'),
(121, 118, '0.00', '2022-07-30 11:48:40', '2022-07-30 11:48:40'),
(122, 93, '109484400.00', '2022-07-30 11:49:25', '2022-07-30 11:49:25'),
(123, 94, '30000000.00', '2022-07-30 11:49:32', '2022-07-30 11:49:32'),
(124, 123, '500000000.00', '2022-07-30 11:50:02', '2022-07-30 11:50:02'),
(125, 124, '46200000.00', '2022-07-30 11:50:09', '2022-07-30 11:50:09'),
(126, 125, '250000000.00', '2022-07-30 11:50:16', '2022-07-30 11:50:16'),
(127, 136, '570000000.00', '2022-07-30 11:51:50', '2022-07-30 13:02:04'),
(128, 137, '0.00', '2022-07-30 11:51:53', '2022-07-30 11:51:53'),
(129, 160, '0.00', '2022-07-30 11:52:12', '2022-07-30 11:52:12'),
(130, 161, '0.00', '2022-07-30 11:52:28', '2022-07-30 11:52:28'),
(131, 162, '0.00', '2022-07-30 11:52:30', '2022-07-30 11:52:30'),
(132, 163, '0.00', '2022-07-30 11:52:33', '2022-07-30 11:52:33'),
(133, 164, '0.00', '2022-07-30 11:52:43', '2022-07-30 11:52:43'),
(134, 165, '0.00', '2022-07-30 11:52:45', '2022-07-30 11:52:45'),
(135, 132, '17200000.00', '2022-07-30 11:53:14', '2022-07-30 11:53:14'),
(136, 133, '2300000.00', '2022-07-30 11:53:25', '2022-07-30 11:53:25'),
(137, 134, '0.00', '2022-07-30 11:53:27', '2022-07-30 11:53:27'),
(138, 135, '0.00', '2022-07-30 11:53:37', '2022-07-30 11:53:37'),
(139, 167, '0.00', '2022-07-30 11:54:00', '2022-07-30 11:54:00'),
(140, 128, '42000000.00', '2022-07-30 11:54:23', '2022-07-30 11:54:23'),
(141, 129, '0.00', '2022-07-30 11:54:27', '2022-07-30 11:54:27'),
(142, 130, '11000000.00', '2022-07-30 11:54:47', '2022-07-30 11:54:47'),
(143, 131, '3500000.00', '2022-07-30 11:54:57', '2022-07-30 11:54:57'),
(144, 127, '0.00', '2022-07-30 11:55:13', '2022-07-30 11:55:13'),
(145, 126, '54000000.00', '2022-07-30 11:55:18', '2022-07-30 11:55:18'),
(146, 157, '0.00', '2022-07-30 11:55:46', '2022-07-30 11:55:46'),
(147, 158, '0.00', '2022-07-30 11:55:50', '2022-07-30 11:55:50'),
(148, 159, '0.00', '2022-07-30 11:55:54', '2022-07-30 11:55:54'),
(149, 155, '0.00', '2022-07-30 11:56:01', '2022-07-30 11:56:01'),
(150, 156, '0.00', '2022-07-30 11:56:05', '2022-07-30 11:56:05'),
(151, 150, '0.00', '2022-07-30 11:56:15', '2022-07-30 11:56:15'),
(152, 151, '0.00', '2022-07-30 11:56:18', '2022-07-30 11:56:18'),
(153, 152, '0.00', '2022-07-30 11:56:21', '2022-07-30 11:56:21'),
(154, 153, '0.00', '2022-07-30 11:56:23', '2022-07-30 11:56:23'),
(155, 154, '0.00', '2022-07-30 11:56:26', '2022-07-30 11:56:26'),
(156, 138, '0.00', '2022-07-30 11:56:56', '2022-07-30 11:56:56'),
(157, 139, '0.00', '2022-07-30 11:56:59', '2022-07-30 11:56:59'),
(158, 140, '0.00', '2022-07-30 11:57:02', '2022-07-30 11:57:02'),
(159, 141, '0.00', '2022-07-30 11:57:06', '2022-07-30 11:57:06'),
(160, 142, '0.00', '2022-07-30 11:57:12', '2022-07-30 11:57:12'),
(161, 143, '0.00', '2022-07-30 11:57:15', '2022-07-30 11:57:15'),
(162, 144, '0.00', '2022-07-30 11:57:22', '2022-07-30 11:57:22'),
(163, 145, '0.00', '2022-07-30 11:57:25', '2022-07-30 11:57:25'),
(164, 146, '0.00', '2022-07-30 11:57:34', '2022-07-30 11:57:34'),
(165, 147, '0.00', '2022-07-30 11:57:38', '2022-07-30 11:57:38'),
(166, 148, '0.00', '2022-07-30 11:57:41', '2022-07-30 11:57:41'),
(168, 149, '0.00', '2022-07-30 13:13:17', '2022-07-30 13:13:17');

-- --------------------------------------------------------

--
-- Table structure for table `pajak_gu`
--

CREATE TABLE `pajak_gu` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `bukti_gu_id` bigint(20) UNSIGNED NOT NULL,
  `potongan_id` bigint(20) UNSIGNED NOT NULL,
  `dpp` decimal(18,2) NOT NULL DEFAULT '0.00',
  `nilai` decimal(18,2) NOT NULL DEFAULT '0.00',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `nama_wp` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `npwp` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pajak_gu`
--

INSERT INTO `pajak_gu` (`id`, `bukti_gu_id`, `potongan_id`, `dpp`, `nilai`, `created_at`, `updated_at`, `nama_wp`, `npwp`) VALUES
(5, 7, 11, '6190000.00', '613423.00', '2022-08-04 05:40:50', '2022-08-04 05:57:41', 'CV. ASEAN Technology', NULL),
(9, 7, 3, '6106351.35', '83648.65', '2022-08-05 01:26:56', '2022-08-05 01:27:18', 'CV. ASEAN Technology', NULL);

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
-- Table structure for table `potongan`
--

CREATE TABLE `potongan` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kode_map` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `perhitungan` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `jenis_potongan_id` bigint(20) UNSIGNED NOT NULL,
  `tarif` decimal(10,2) DEFAULT NULL,
  `is_dpp_harga_jual` tinyint(1) UNSIGNED DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `potongan`
--

INSERT INTO `potongan` (`id`, `nama`, `kode_map`, `perhitungan`, `created_at`, `updated_at`, `jenis_potongan_id`, `tarif`, `is_dpp_harga_jual`) VALUES
(1, 'PPh Pasal 21', '411121', NULL, '2022-07-24 01:49:49', '2022-07-24 01:49:49', 1, NULL, 0),
(2, 'PPh Pasal 21 Honor/dll Pejabat/PNS/TNI/Polri/Pensiun', '411121', NULL, '2022-07-24 01:50:05', '2022-07-24 01:50:05', 1, NULL, 0),
(3, 'PPh Pasal 22 Pemungutan oleh Bendaharawan (Tarif: 1,5%, PPN: 11%)', '411122', '({harga_jual}-((11/(11+100))*{harga_jual}))*{tarif}/100', '2022-07-24 01:50:22', '2022-08-05 00:15:26', 2, '1.50', 0),
(4, 'PPh Pasal 23 Jasa (Tarif: 2%, PPN: 11%)', '411124', '({harga_jual}-((11/(11+100))*{harga_jual}))*{tarif}/100', '2022-07-24 01:50:36', '2022-08-05 00:13:55', 3, '2.00', 0),
(5, 'PPh Ps. 25', NULL, NULL, '2022-07-24 01:50:57', '2022-07-24 01:50:57', 5, NULL, 0),
(6, 'PPh Pasal 4 (2) Pengalihan Hak Tanah dan/atau Bangunan', '411128', NULL, '2022-07-24 01:51:08', '2022-07-24 01:51:08', 5, NULL, 0),
(7, 'PPh Pasal 4 (2) Sewa Tanah dan/atau Bangunan', '411128', NULL, '2022-07-24 01:51:24', '2022-07-24 01:51:24', 5, NULL, 0),
(8, 'PPh Pasal 4 (2) Jasa Konstruksi', '411128', NULL, '2022-07-24 01:51:39', '2022-07-24 01:51:39', 5, NULL, 0),
(9, 'PPh Ps. 15', '411128', NULL, '2022-07-24 01:51:55', '2022-07-24 01:51:55', 5, NULL, 0),
(10, 'PPh Pasal 26 Jasa', '411127', NULL, '2022-07-24 01:52:10', '2022-07-24 01:52:10', 5, NULL, 0),
(11, 'PPN Pemungutan oleh Bendaharawan (Tarif: 11%)', '411211', '({tarif}/({tarif}+100))*{harga_jual}', '2022-07-24 01:52:25', '2022-08-05 01:19:58', 4, '11.00', 0),
(12, 'PPN Pemungutan oleh Bendaharawan (Tarif: 10%)', '411211', '({tarif}/({tarif}+100))*{harga_jual}', '2022-08-05 00:10:22', '2022-08-05 01:19:53', 4, '10.00', 0),
(13, 'PPh Pasal 23 Jasa (Tarif: 2%, PPN: 10%)', '411124', '({harga_jual}-((10/(10+100))*{harga_jual}))*{tarif}/100', '2022-08-05 01:18:32', '2022-08-05 01:23:13', 3, '2.00', 0);

-- --------------------------------------------------------

--
-- Table structure for table `rekanan`
--

CREATE TABLE `rekanan` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bentuk_rekanan_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `npwp` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `alamat` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_pimpinan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_rek` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_rek` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_bank` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `no_telp` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `rekanan`
--

INSERT INTO `rekanan` (`id`, `nama`, `bentuk_rekanan_id`, `npwp`, `alamat`, `nama_pimpinan`, `nama_rek`, `no_rek`, `nama_bank`, `no_telp`, `created_at`, `updated_at`) VALUES
(1, 'CV. ASEAN Technology', '1', NULL, 'Samarinda, Kalimantan Timur', 'ASEAN Technology', 'CV. ASEAN Technology', '34324342342', 'Bankaltimtara', NULL, '2022-08-05 13:31:54', '2022-08-05 13:31:54');

-- --------------------------------------------------------

--
-- Table structure for table `rekening1`
--

CREATE TABLE `rekening1` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `kode1` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `rekening1`
--

INSERT INTO `rekening1` (`id`, `kode1`, `nama`, `created_at`, `updated_at`) VALUES
(1, 5, 'BELANJA DAERAH', '2022-07-24 05:29:18', '2022-07-24 06:51:19');

-- --------------------------------------------------------

--
-- Table structure for table `rekening2`
--

CREATE TABLE `rekening2` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `rekening1_id` bigint(20) UNSIGNED NOT NULL,
  `kode1` bigint(20) UNSIGNED NOT NULL,
  `kode2` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `rekening2`
--

INSERT INTO `rekening2` (`id`, `rekening1_id`, `kode1`, `kode2`, `nama`, `created_at`, `updated_at`) VALUES
(1, 1, 5, 1, 'BELANJA OPERASIONAL', '2022-07-24 07:26:12', '2022-07-24 07:26:12'),
(2, 1, 5, 2, 'BELANJA MODAL', '2022-07-24 07:26:32', '2022-07-24 08:30:28');

-- --------------------------------------------------------

--
-- Table structure for table `rekening3`
--

CREATE TABLE `rekening3` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `rekening2_id` bigint(20) UNSIGNED NOT NULL,
  `kode1` bigint(20) UNSIGNED NOT NULL,
  `kode2` bigint(20) UNSIGNED NOT NULL,
  `kode3` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `rekening3`
--

INSERT INTO `rekening3` (`id`, `rekening2_id`, `kode1`, `kode2`, `kode3`, `nama`, `created_at`, `updated_at`) VALUES
(1, 1, 5, 1, 1, 'Belanja Pegawai', '2022-07-24 09:03:31', '2022-07-24 09:20:10'),
(2, 1, 5, 1, 2, 'Belanja Barang dan Jasa', '2022-07-24 09:05:28', '2022-07-24 09:05:28'),
(3, 2, 5, 2, 2, 'Belanja Modal Peralatan dan Mesin', '2022-07-24 09:07:01', '2022-07-24 09:07:01'),
(4, 2, 5, 2, 3, 'Belanja Modal Gedung dan Bangunan', '2022-07-24 09:09:52', '2022-07-24 09:09:52');

-- --------------------------------------------------------

--
-- Table structure for table `rekening4`
--

CREATE TABLE `rekening4` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `rekening3_id` bigint(20) UNSIGNED NOT NULL,
  `kode1` bigint(20) UNSIGNED NOT NULL,
  `kode2` bigint(20) UNSIGNED NOT NULL,
  `kode3` bigint(20) UNSIGNED NOT NULL,
  `kode4` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `rekening4`
--

INSERT INTO `rekening4` (`id`, `rekening3_id`, `kode1`, `kode2`, `kode3`, `kode4`, `nama`, `created_at`, `updated_at`) VALUES
(1, 2, 5, 1, 2, 1, 'Belanja Barang', '2022-07-24 10:19:40', '2022-07-24 10:19:40'),
(2, 2, 5, 1, 2, 2, 'Belanja Jasa', '2022-07-24 10:21:47', '2022-07-24 10:21:47'),
(3, 2, 5, 1, 2, 3, 'Belanja Pemeliharaan', '2022-07-24 10:22:39', '2022-07-24 10:22:39'),
(4, 2, 5, 1, 2, 4, 'Belanja Perjalanan Dinas', '2022-07-24 10:24:23', '2022-07-24 10:24:23'),
(5, 3, 5, 2, 2, 10, 'Belanja Modal Komputer', '2022-07-24 10:26:18', '2022-07-24 10:26:18'),
(6, 3, 5, 2, 2, 5, 'Belanja Modal Alat Kantor dan Rumah \r\nTangga', '2022-07-24 10:27:13', '2022-07-24 10:27:13'),
(7, 3, 5, 2, 2, 7, 'Belanja Modal Alat Kedokteran dan \r\nKesehatan', '2022-07-24 10:27:58', '2022-07-24 10:27:58'),
(8, 4, 5, 2, 3, 1, 'Belanja Modal Bangunan Gedung', '2022-07-24 10:30:27', '2022-07-24 10:30:27'),
(9, 3, 5, 2, 2, 8, 'Belanja Modal Alat Laboratorium', '2022-07-24 10:31:42', '2022-07-24 10:31:42'),
(10, 3, 5, 2, 2, 6, 'Belanja Modal Alat Studio, Komunikasi, dan \r\nPemancar', '2022-07-24 10:32:52', '2022-07-24 10:32:52'),
(11, 1, 5, 1, 1, 99, 'Belanja Pegawai BLUD', '2022-07-28 04:01:47', '2022-07-28 04:01:47'),
(12, 3, 5, 2, 2, 2, 'Belanja Modal Alat Angkutan', '2022-07-28 12:03:17', '2022-07-28 12:03:17');

-- --------------------------------------------------------

--
-- Table structure for table `rekening5`
--

CREATE TABLE `rekening5` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `rekening4_id` bigint(20) UNSIGNED NOT NULL,
  `kode1` bigint(20) UNSIGNED NOT NULL,
  `kode2` bigint(20) UNSIGNED NOT NULL,
  `kode3` bigint(20) UNSIGNED NOT NULL,
  `kode4` bigint(20) UNSIGNED NOT NULL,
  `kode5` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `rekening5`
--

INSERT INTO `rekening5` (`id`, `rekening4_id`, `kode1`, `kode2`, `kode3`, `kode4`, `kode5`, `nama`, `created_at`, `updated_at`) VALUES
(1, 1, 5, 1, 2, 1, 1, 'Belanja Bahan Pakai Habis', '2022-07-24 12:37:39', '2022-07-24 12:37:39'),
(2, 1, 5, 1, 2, 1, 2, 'Belanja Bahan/Material', '2022-07-24 12:38:26', '2022-07-24 12:38:26'),
(3, 2, 5, 1, 2, 2, 1, 'Belanja Jasa Kantor', '2022-07-24 12:39:36', '2022-07-24 12:39:36'),
(4, 11, 5, 1, 1, 99, 1, 'Belanja Pegawai BLUD', '2022-07-28 04:02:26', '2022-07-28 04:02:26'),
(5, 2, 5, 1, 2, 2, 5, 'Belanja Sewa Alat Berat', '2022-07-28 07:45:22', '2022-07-28 07:45:22'),
(6, 2, 5, 1, 2, 2, 9, 'Belanja Beasiswa Pendidikan PNS', '2022-07-28 07:50:17', '2022-07-28 07:50:17'),
(7, 2, 5, 1, 2, 2, 12, 'Belanja Jasa Insentif bagi Pegawai Non ASN atas Pemungutan Retribusi Daerah', '2022-07-28 07:51:00', '2022-07-28 08:10:39'),
(8, 2, 5, 1, 2, 2, 2, 'Belanja Jasa Asuransi', '2022-07-28 07:51:52', '2022-07-28 07:51:52'),
(9, 2, 5, 1, 2, 2, 8, 'Belanja Jasa Ketersediaan Layanan \r\n(Availibility Payment)', '2022-07-28 07:52:29', '2022-07-28 07:52:29'),
(10, 3, 5, 1, 2, 3, 4, 'Belanja Pemeliharaan Jalan, Jaringan, dan \r\nIrigasi', '2022-07-28 12:44:16', '2022-07-28 12:44:16'),
(11, 3, 5, 1, 2, 3, 2, 'Belanja Pemeliharaan Peralatan dan Mesin', '2022-07-28 12:45:20', '2022-07-28 12:45:20'),
(12, 3, 5, 1, 2, 3, 3, 'Belanja Pemeliharaan Gedung dan Bangunan', '2022-07-28 12:46:02', '2022-07-28 12:49:08'),
(13, 4, 5, 1, 2, 4, 1, 'Belanja Perjalanan Dinas Dalam Daerah', '2022-07-28 12:59:56', '2022-07-28 12:59:56'),
(14, 5, 5, 2, 2, 10, 1, 'Belanja Modal Komputer Unit', '2022-07-28 13:07:18', '2022-07-28 13:07:18'),
(15, 5, 5, 2, 2, 10, 2, 'Belanja Modal Peralatan Komputer', '2022-07-28 13:07:48', '2022-07-28 13:07:48'),
(16, 6, 5, 2, 2, 5, 2, 'Belanja Modal Alat Rumah Tangga', '2022-07-28 13:11:16', '2022-07-28 13:11:16'),
(17, 7, 5, 2, 2, 7, 2, 'Belanja Modal Alat Kesehatan Umum', '2022-07-28 13:13:23', '2022-07-28 13:13:23'),
(18, 12, 5, 2, 2, 2, 1, 'Belanja Modal Alat Angkutan Darat Bermotor', '2022-07-28 13:14:41', '2022-07-28 13:14:41'),
(19, 9, 5, 2, 2, 8, 8, 'Belanja Modal Peralatan Laboratorium \r\nHydrodinamica', '2022-07-28 13:16:58', '2022-07-28 13:16:58'),
(20, 10, 5, 2, 2, 6, 2, 'Belanja Modal Alat Komunikasi', '2022-07-28 13:18:27', '2022-07-28 13:18:27'),
(21, 8, 5, 2, 3, 1, 1, 'Belanja Modal Bangunan Gedung Tempat Kerja', '2022-07-28 13:34:07', '2022-07-28 13:34:07');

-- --------------------------------------------------------

--
-- Table structure for table `rekening6`
--

CREATE TABLE `rekening6` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `rekening5_id` bigint(20) UNSIGNED NOT NULL,
  `kode1` bigint(20) UNSIGNED NOT NULL,
  `kode2` bigint(20) UNSIGNED NOT NULL,
  `kode3` bigint(20) UNSIGNED NOT NULL,
  `kode4` bigint(20) UNSIGNED NOT NULL,
  `kode5` bigint(20) UNSIGNED NOT NULL,
  `kode6` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `rekening6`
--

INSERT INTO `rekening6` (`id`, `rekening5_id`, `kode1`, `kode2`, `kode3`, `kode4`, `kode5`, `kode6`, `nama`, `created_at`, `updated_at`) VALUES
(3, 1, 5, 1, 2, 1, 1, 30, 'Belanja Alat/Bahan untuk Kegiatan Kantor- Perabot Kantor', '2022-07-24 13:14:04', '2022-07-24 13:17:39'),
(5, 2, 5, 1, 2, 1, 2, 3, 'Belanja Komponen-Komponen Peralatan', '2022-07-24 13:27:33', '2022-07-24 13:27:33'),
(6, 1, 5, 1, 2, 1, 1, 37, 'Belanja Obat-Obatan', '2022-07-24 13:28:12', '2022-07-24 13:28:12'),
(7, 1, 5, 1, 2, 1, 1, 15, 'Belanja Suku Cadang - Suku Cadang Alat Kedokteran', '2022-07-24 13:28:35', '2022-07-24 13:28:35'),
(8, 1, 5, 1, 2, 1, 1, 2, 'Belanja Bahan - Bahan Kimia', '2022-07-24 13:29:42', '2022-07-24 13:29:42'),
(9, 1, 5, 1, 2, 1, 1, 29, 'Belanja Alat/Bahan Untuk Kegiatan Kantor-Bahan Komputer', '2022-07-24 13:30:32', '2022-07-24 13:30:32'),
(10, 1, 5, 1, 2, 1, 1, 56, 'Belanja Makanan dan Minuman pada fasilitas Pelayanan urusan Kesehatan', '2022-07-24 13:31:10', '2022-07-24 13:31:10'),
(11, 4, 5, 1, 1, 99, 1, 23, 'Belanja Jasa Pelayanan', '2022-07-28 04:02:50', '2022-07-28 04:02:50'),
(12, 4, 5, 1, 1, 99, 1, 24, 'Tunjangan Tambahan Penghasilan', '2022-07-28 04:03:17', '2022-07-28 04:03:17'),
(13, 4, 5, 1, 1, 99, 1, 26, 'Tambahan Penghasilan Beban Kerja', '2022-07-28 04:03:45', '2022-07-28 04:03:45'),
(14, 4, 5, 1, 1, 99, 1, 32, 'Honor Pelayanan MOU', '2022-07-28 04:04:07', '2022-07-28 04:04:07'),
(15, 4, 5, 1, 1, 99, 1, 50, 'Honor Pengadaan Barang dan Jasa', '2022-07-28 04:04:32', '2022-07-28 04:04:32'),
(16, 4, 5, 1, 1, 99, 1, 3, 'Honor Pelaksana Pengelola Kegiatan', '2022-07-28 04:04:55', '2022-07-28 04:04:55'),
(17, 4, 5, 1, 1, 99, 1, 6, 'Honor Tunjangan Pengelola Keuangan', '2022-07-28 04:05:14', '2022-07-28 04:05:14'),
(18, 1, 5, 1, 2, 1, 1, 31, 'Belanja Alat / Bahan Untuk Kegiatan kantor - Alat Listrik', '2022-07-28 07:35:33', '2022-07-28 07:35:33'),
(19, 1, 5, 1, 2, 1, 1, 24, 'Belanja Alat / Bahan Untuk Kegiatan Kantor - Alat Tulis  Kantor', '2022-07-28 07:36:08', '2022-07-28 07:36:08'),
(20, 1, 5, 1, 2, 1, 1, 27, 'Belanja Alat / Bahan Kegiatan Kantor - Benda Pos', '2022-07-28 07:36:32', '2022-07-28 07:36:32'),
(21, 1, 5, 1, 2, 1, 1, 4, 'Belanja Bahan Bakar dan Pelumas', '2022-07-28 07:36:53', '2022-07-28 07:36:53'),
(22, 1, 5, 1, 2, 1, 1, 1, 'Belanja Bahan - Bahan Bangunan dan Kontruksi', '2022-07-28 07:37:29', '2022-07-28 07:37:29'),
(23, 1, 5, 1, 2, 1, 1, 36, 'Belanja Alat / kelengkapan  terapi modalitas', '2022-07-28 07:37:56', '2022-07-28 07:37:56'),
(24, 3, 5, 1, 2, 2, 1, 7, 'Honorarium Rohaniwan', '2022-07-28 07:39:27', '2022-07-28 07:39:27'),
(25, 3, 5, 1, 2, 2, 1, 28, 'Belanja Jasa Tenaga Pelayanan Umum', '2022-07-28 07:39:54', '2022-07-28 07:39:54'),
(26, 3, 5, 1, 2, 2, 1, 48, 'Belanja Jasa Kontribusi Asosiasi', '2022-07-28 07:40:19', '2022-07-28 07:40:19'),
(27, 3, 5, 1, 2, 2, 1, 55, 'Belanja Jasa Iklan/Reklame, Film, dan Pemotretan', '2022-07-28 07:40:44', '2022-07-28 07:40:44'),
(28, 3, 5, 1, 2, 2, 1, 62, 'Belanja Langganan Jurnal/Surat Kabar/ Majalah', '2022-07-28 07:41:10', '2022-07-28 07:41:10'),
(29, 3, 5, 1, 2, 2, 1, 64, 'Belanja Paket / Pengiriman', '2022-07-28 07:41:36', '2022-07-28 07:41:36'),
(30, 3, 5, 1, 2, 2, 1, 73, 'Belanja Medical Check Up', '2022-07-28 07:42:18', '2022-07-28 07:42:18'),
(31, 5, 5, 1, 2, 2, 5, 38, 'Belanja Sewa Rumah Negara Golongan 1', '2022-07-28 07:45:52', '2022-07-28 07:45:52'),
(32, 5, 5, 1, 2, 2, 5, 49, 'Belanja Sewa Rumah Tidak Bersusun', '2022-07-28 07:46:19', '2022-07-28 07:46:19'),
(33, 3, 5, 1, 2, 2, 1, 26, 'Belanja Jasa Tenaga Administrasi', '2022-07-28 07:47:23', '2022-07-28 07:47:23'),
(34, 3, 5, 1, 2, 2, 1, 26, 'Belanja Jasa Tenaga Administrasi Belanja Honorarium', '2022-07-28 07:47:51', '2022-07-28 07:47:51'),
(35, 3, 5, 1, 2, 2, 1, 32, 'Belanja Pakaian dinas dan atrbut kelengkapannya', '2022-07-28 07:48:53', '2022-07-28 07:48:53'),
(36, 6, 5, 1, 2, 2, 9, 6, 'Belanja Jasa Konsultasi Berorientasi Bidang - Keuangan', '2022-07-28 07:53:44', '2022-07-28 07:53:44'),
(37, 7, 5, 1, 2, 2, 12, 3, 'Belanja Bimbingan Teknis', '2022-07-28 08:05:54', '2022-07-28 08:05:54'),
(38, 7, 5, 1, 2, 2, 12, 2, 'Belanja Kegiatan Aktivitas kelompok dan Terapi Keluarga', '2022-07-28 08:06:17', '2022-07-28 08:06:17'),
(39, 9, 5, 1, 2, 2, 8, 17, 'Belanja Jasa Konsultansi Perencanaan Penataan Ruang-Pengembangan Pemanfaatan Ruang', '2022-07-28 08:06:52', '2022-07-28 08:06:52'),
(40, 9, 5, 1, 2, 2, 8, 19, 'Belanja Jasa Konsultansi Pengawasan Rekayasa-Jasa Pengawas Pekerjaan Konstruksi Bangunan Gedung', '2022-07-28 08:07:51', '2022-07-28 08:07:51'),
(41, 8, 5, 1, 2, 2, 2, 5, 'Belanja Iuran Jaminan Kesehatan', '2022-07-28 12:36:37', '2022-07-28 12:36:37'),
(42, 10, 5, 1, 2, 3, 4, 83, 'Belanja Pemeliharaan Instalasi - Instalasi Air kotor - Instalasi Air Kotor Lainnya', '2022-07-28 12:46:59', '2022-07-28 12:46:59'),
(43, 11, 5, 1, 2, 3, 2, 117, 'Belanja Pemeliharaan Alat Kantor dan Rumah Tangga - Alat Kantor - Alat Kantor Lainnya', '2022-07-28 12:47:20', '2022-07-28 12:47:20'),
(44, 12, 5, 1, 2, 3, 3, 1, 'Belanja Pemeliharaan Bangunan Gedung-Bangunan Gedung Tempat Kerja-Bangunan Gedung Kantor', '2022-07-28 12:47:40', '2022-07-28 12:47:40'),
(45, 11, 5, 1, 2, 3, 2, 204, 'Belanja Pemeliharaan Alat Kedokteran dan Kesehatan - Alat Kedokteran - Alat Kedokteran Umum', '2022-07-28 12:48:05', '2022-07-28 12:48:05'),
(46, 11, 5, 1, 2, 3, 2, 35, 'Belanja Pemeliharaan Alat Angkutan - Alat Angkutan Bermotor - Kendaraan Dinas Bermotor Perorangan', '2022-07-28 12:48:24', '2022-07-28 12:48:24'),
(47, 13, 5, 1, 2, 4, 1, 1, 'Belanja Perjalanan Dinas Biasa', '2022-07-28 13:00:34', '2022-07-28 13:00:58'),
(48, 14, 5, 2, 2, 10, 1, 2, 'Belanja Modal Personal Computer', '2022-07-28 13:21:24', '2022-07-28 13:21:24'),
(49, 15, 5, 2, 2, 10, 2, 5, 'Belanja Modal Peralatan Komputer Lainnya', '2022-07-28 13:22:02', '2022-07-28 13:22:02'),
(50, 16, 5, 2, 2, 5, 2, 6, 'Belanja Modal Alat Rumah Tangga lainnya', '2022-07-28 13:24:20', '2022-07-28 13:24:20'),
(51, 16, 5, 2, 2, 5, 2, 4, 'Belanja Modal Alat Pendingin', '2022-07-28 13:24:48', '2022-07-28 13:24:48'),
(52, 16, 5, 2, 2, 5, 2, 1, 'Belanja Modal Mebel', '2022-07-28 13:25:30', '2022-07-28 13:25:30'),
(53, 17, 5, 2, 2, 7, 2, 5, 'Belanja Modal Bed pasien', '2022-07-28 13:26:15', '2022-07-28 13:26:15'),
(54, 17, 5, 2, 2, 7, 2, 5, 'Belanja Modal Alat Kesehatan Umum Lainnya', '2022-07-28 13:26:46', '2022-07-28 13:26:46'),
(55, 19, 5, 2, 2, 8, 8, 6, 'Belanja Modal Peralatan Umum', '2022-07-28 13:27:13', '2022-07-28 13:27:13'),
(56, 19, 5, 2, 2, 8, 8, 15, 'Belanja Modal Photo and Film Equipment', '2022-07-28 13:27:33', '2022-07-28 13:27:33'),
(57, 18, 5, 2, 2, 2, 1, 2, 'Belanja Modal Kendaraan Bermotor Penumpang', '2022-07-28 13:31:21', '2022-07-28 13:31:21'),
(58, 21, 5, 2, 3, 1, 1, 1, 'Belanja Modal Bangunan Gedung Kantor', '2022-07-28 13:35:07', '2022-07-28 13:35:07'),
(59, 2, 5, 1, 2, 1, 2, 3, 'Belanja Modal Komputer Jaringan', '2022-07-28 14:05:09', '2022-07-28 14:05:09'),
(60, 20, 5, 2, 2, 6, 2, 1, 'Belanja Modal Alat komunikasi', '2022-07-28 14:05:31', '2022-07-28 14:05:31');

-- --------------------------------------------------------

--
-- Table structure for table `uraian_rekening`
--

CREATE TABLE `uraian_rekening` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `rekening6_id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `uraian_rekening`
--

INSERT INTO `uraian_rekening` (`id`, `rekening6_id`, `nama`, `created_at`, `updated_at`) VALUES
(1, 3, 'Belanja Bahan dan Peralatan Laundry', '2022-07-24 13:53:43', '2022-07-24 13:53:43'),
(2, 3, 'Belanja Bahan kebersihan', '2022-07-24 13:54:33', '2022-07-24 13:54:33'),
(3, 3, 'Kelengkapan dan alat kebersihan', '2022-07-24 13:54:52', '2022-07-24 13:54:52'),
(4, 3, 'Belanja bahan,alat dan kelengkapan PPI', '2022-07-24 13:55:07', '2022-07-24 13:55:07'),
(5, 11, 'Belanja Jasa Pelayanan (35%)', '2022-07-28 07:08:50', '2022-07-28 07:08:50'),
(6, 11, 'Belanja Jasa pengelola', '2022-07-28 07:09:12', '2022-07-28 07:09:12'),
(7, 12, 'Tunjangan Bahaya Radiasi', '2022-07-28 07:09:24', '2022-07-28 07:09:24'),
(8, 13, 'Tambahan Penghasilan Beban Kerja Tenaga Honor', '2022-07-28 07:09:33', '2022-07-28 07:09:33'),
(9, 13, 'Insentif Hari RayaTahun.2022 Bagi Pegawai Non PNS', '2022-07-28 07:09:44', '2022-07-28 07:09:44'),
(10, 13, 'Tambahan Penghasilan Beban Kerja tenaga ahli Spesialis Anestesi', '2022-07-28 07:09:55', '2022-07-28 07:09:55'),
(11, 14, 'Honor MOU Pelayanan dr. Spesialis', '2022-07-28 07:10:32', '2022-07-28 07:10:32'),
(12, 14, 'Honor MOU Pelayanan dr. Sub Spesialis', '2022-07-28 07:10:41', '2022-07-28 07:10:41'),
(13, 14, 'Honor MOU  Pembina tenaga keamanan', '2022-07-28 07:10:49', '2022-07-28 07:10:49'),
(14, 14, 'Honor MOU Tenaga PPR', '2022-07-28 07:10:57', '2022-07-28 07:10:57'),
(15, 14, 'Honor Mou tenaga peksos', '2022-07-28 07:11:07', '2022-07-28 07:11:07'),
(16, 14, 'Honor Mou tenaga fisikawan', '2022-07-28 07:22:20', '2022-07-28 07:22:20'),
(17, 15, 'Honorarium Pejabat Pengadaan BLUD', '2022-07-28 07:23:01', '2022-07-28 07:23:01'),
(18, 15, 'Honorarium Panitia Pengadaan BLUD', '2022-07-28 07:23:12', '2022-07-28 07:23:12'),
(19, 16, 'Belanja Jasa Audit (Tim Penilai Angka Kredit)', '2022-07-28 07:23:28', '2022-07-28 07:23:28'),
(20, 16, 'Biaya Pemusnahan Barang, Bahan Reagen dll (Penghapusan Barang)', '2022-07-28 07:23:39', '2022-07-28 07:23:39'),
(21, 16, 'Pembuat Artikel Tim Penyusunan Jurnal (Jurnal Rumah Sakit)', '2022-07-28 07:23:49', '2022-07-28 07:23:49'),
(22, 17, 'Honorarium Pimpinan BLUD', '2022-07-28 07:24:18', '2022-07-28 07:24:18'),
(23, 17, 'Kuasa Pengguna Anggaran BLUD', '2022-07-28 07:24:32', '2022-07-28 07:24:32'),
(24, 17, 'PPTK BLUD', '2022-07-28 07:24:52', '2022-07-28 07:24:52'),
(25, 17, 'Bendahara Pengeluaran BLUD', '2022-07-28 07:25:03', '2022-07-28 07:25:03'),
(26, 17, 'Honor Pengelolaan Keuangan BLUD', '2022-07-28 07:25:15', '2022-07-28 07:25:15'),
(27, 17, 'Honor Tenaga Teknis Pengelolaan BLUD', '2022-07-28 07:25:24', '2022-07-28 07:25:24'),
(28, 17, 'Honor Dewan Pengawas BLUD', '2022-07-28 07:25:35', '2022-07-28 07:25:35'),
(29, 17, 'Honor Anggota Dewan Pengawas BLUD', '2022-07-28 07:25:58', '2022-07-28 07:25:58'),
(30, 17, 'Honor Sekretaris Dewan Pengawas BLUD', '2022-07-28 07:26:08', '2022-07-28 07:26:08'),
(31, 6, 'Belanja Obat', '2022-07-28 07:32:47', '2022-07-28 07:32:47'),
(32, 7, 'Belanja Bahan Habis Pakai,dan Perbekalan Kesehatan', '2022-07-28 07:33:03', '2022-07-28 07:33:03'),
(33, 8, 'Pengadaan Reagensia', '2022-07-28 07:33:20', '2022-07-28 07:33:20'),
(34, 9, 'Belanja Bahan / Alat / Kelengkapan Komputer', '2022-07-28 07:33:32', '2022-07-28 07:33:32'),
(35, 10, 'Belanja BAHAN Makan Minum Pasien', '2022-07-28 07:34:12', '2022-07-28 07:34:12'),
(36, 18, 'Belanja Alat Listrik dan Elektronik', '2022-07-28 12:22:37', '2022-07-28 12:22:37'),
(37, 19, 'Belanja Alat Tulis Kantor (ATK)', '2022-07-28 12:23:11', '2022-07-28 12:23:11'),
(38, 20, 'Belanja Materai/Benda Pos Lainnya', '2022-07-28 12:24:06', '2022-07-28 12:24:06'),
(39, 21, 'Belanja Pertalite', '2022-07-28 12:24:29', '2022-07-28 12:24:29'),
(40, 21, 'Belanja Dexlite', '2022-07-28 12:24:44', '2022-07-28 12:24:44'),
(41, 22, 'Belanja Perlengkapan/ Bahan Bangunan dan Instalasi Air', '2022-07-28 12:25:06', '2022-07-28 12:25:06'),
(42, 22, 'Belanja Bahan Pemeliharaan IPAL,pertamanan dan Penyehatan Lingkungan', '2022-07-28 12:25:42', '2022-07-28 12:26:20'),
(43, 23, 'Belanja Alat / kelengkapan  terapi modalitas', '2022-07-28 12:26:42', '2022-07-28 12:26:42'),
(44, 5, 'Belanja Alat Tenun (Bendera, Umbul-umbul, Sarung Bantal, Sprei, Dll)', '2022-07-28 12:27:38', '2022-07-28 12:27:38'),
(45, 5, 'Belanja Peralatan dan Kelengkapan Dapur', '2022-07-28 12:27:47', '2022-07-28 12:27:47'),
(46, 5, 'Belanja Peralatan dan Kelengkapan Kantor', '2022-07-28 12:27:56', '2022-07-28 12:27:56'),
(47, 5, 'Mebeler (Meja/Kursi/Lemari,dll)', '2022-07-28 12:28:05', '2022-07-28 12:28:05'),
(48, 5, 'Belanja Pengisian Tabung Gas', '2022-07-28 12:28:13', '2022-07-28 12:28:13'),
(49, 24, 'Belanja Kegiatan Kerohanian', '2022-07-28 12:29:02', '2022-07-28 12:29:02'),
(50, 25, 'Belanja Makan & Minum rapat pegawai', '2022-07-28 12:29:20', '2022-07-28 12:29:20'),
(51, 25, 'Biaya Makan Minum Kegiatan', '2022-07-28 12:29:34', '2022-07-28 12:29:34'),
(52, 25, 'Belanja Makan Minum Tamu', '2022-07-28 12:29:43', '2022-07-28 12:29:43'),
(53, 25, 'Belanja Survey Kepuasan Masyarakat, Kepuasan Pegawai Dan Indeks Korupsi', '2022-07-28 12:29:54', '2022-07-28 12:29:54'),
(54, 25, 'Belanja swakelola Penelitian di Bidang Kesehatan Jiwa beserta pendukung', '2022-07-28 12:30:04', '2022-07-28 12:30:04'),
(55, 26, 'Belanja Jasa Kontribusi', '2022-07-28 12:30:30', '2022-07-28 12:30:30'),
(56, 26, 'Belanja kontribusi akreditasi', '2022-07-28 12:30:37', '2022-07-28 12:30:37'),
(57, 27, 'Belanja Publikasi dan Promosi Rumah Sakit', '2022-07-28 12:30:50', '2022-07-28 12:30:50'),
(58, 28, 'Belanja Koran / Majalah / Buku', '2022-07-28 12:31:15', '2022-07-28 12:31:15'),
(59, 28, 'Belanja Cetak Dan Penjilidan', '2022-07-28 12:31:23', '2022-07-28 12:31:23'),
(60, 28, 'Belanja Penggandaan / Fotocopy', '2022-07-28 12:31:31', '2022-07-28 12:31:31'),
(61, 29, 'Belanja Biaya Kirim Barang / Surat', '2022-07-28 12:31:42', '2022-07-28 12:31:42'),
(62, 30, 'Belanja Pendukung Pelayanan Rujukan Pasien', '2022-07-28 12:31:56', '2022-07-28 12:31:56'),
(63, 30, 'MCU Pegawai', '2022-07-28 12:32:06', '2022-07-28 12:32:06'),
(64, 31, 'Belanja Sewa Rumah Dinas', '2022-07-28 12:32:21', '2022-07-28 12:32:21'),
(65, 31, 'Belanja Sewa Gedung/ruang rapat/ Peralatan Gedung,dll', '2022-07-28 12:32:30', '2022-07-28 12:32:30'),
(66, 32, 'Belanja Sewa Pondokan Pegawai Tugas Belajar Pasca Sarjana Kesehatan', '2022-07-28 12:32:41', '2022-07-28 12:32:41'),
(67, 36, 'Biaya Auditor Independen BLUD (Akuntan Publik)', '2022-07-28 12:32:52', '2022-07-28 12:32:52'),
(68, 37, 'Belanja Bimbingan teknis', '2022-07-28 12:32:59', '2022-07-28 12:32:59'),
(69, 33, 'Belanja Retribusi dan Administrasi', '2022-07-28 12:33:16', '2022-07-28 12:33:16'),
(70, 33, 'Belanja administrasi perpanjangan surat kendaraan bermotor', '2022-07-28 12:33:25', '2022-07-28 12:33:25'),
(71, 34, 'Belanja Tenaga Honor (S1)', '2022-07-28 12:33:34', '2022-07-28 12:33:34'),
(72, 41, 'BPJS kesehatan bagi tenaga honor dan ketenagakerjaan', '2022-07-28 12:37:36', '2022-07-28 12:37:36'),
(73, 38, 'Belanja Kegiatan Home Visit', '2022-07-28 12:38:03', '2022-07-28 12:38:03'),
(74, 35, 'Belanja Pembuatan pakaian & Atribut Pakaian Dinas', '2022-07-28 12:38:12', '2022-07-28 12:38:12'),
(75, 39, 'Jasa Konsultan Perencanaan Renov R. Klinik Napza (Perubahan)', '2022-07-28 12:38:23', '2022-07-28 12:38:23'),
(76, 39, 'Jasa Konsultan Perencanaan Renov Selasar R.tunggu R. Radiologi (Perubahan)', '2022-07-28 12:38:31', '2022-07-28 12:38:31'),
(77, 39, 'Jasa Konsultan Perencanaan Renov Parkir (Perubahan)', '2022-07-28 12:38:39', '2022-07-28 12:38:39'),
(78, 39, 'Jasa Konsultan Perencanaan Renov Guest House MJD R. CT Scan (Perubahan)', '2022-07-28 12:38:48', '2022-07-28 12:38:48'),
(79, 39, 'Jasa Konsultan Perencana Renovasi/Pemasangan Atap R. Generator O2 (Perubahan)', '2022-07-28 12:38:58', '2022-07-28 12:38:58'),
(80, 39, 'Jasa Konsultan Perencanaan Renovasi Apotik (Perubahan)', '2022-07-28 12:39:06', '2022-07-28 12:39:06'),
(81, 39, 'Jasa Konsultan Perencanaan Renov Ruang Tunggu Laboratorium (Perubahan)', '2022-07-28 12:39:15', '2022-07-28 12:39:15'),
(82, 40, 'Jasa Konsultan Pengawasan Rehab Sebagian Gedung Napza Menjadi Poliklinik (Perubahan)', '2022-07-28 12:39:27', '2022-07-28 12:39:27'),
(83, 40, 'Jasa Konsultan Pengawasan Rehab Sebagian Gedung Napza Menjadi Rumah Makan (Perubahan)', '2022-07-28 12:39:35', '2022-07-28 12:39:35'),
(84, 40, 'Jasa Konsultan Pengawasan Rehab Pagar & Halaman', '2022-07-28 12:39:44', '2022-07-28 12:39:44'),
(85, 40, 'Jasa Konsultan Pengawasan Renovasi Garasi Ambulance Menjadi Guest House', '2022-07-28 12:39:51', '2022-07-28 12:39:51'),
(86, 40, 'Jasa Konsultan Pengawasan Renov R. Klinik Napza (Perubahan)', '2022-07-28 12:39:58', '2022-07-28 12:39:58'),
(87, 40, 'Jasa Konsultan Pengawasan Renov Selasar r.tunggu R. Radiologi (Perubahan)', '2022-07-28 12:40:06', '2022-07-28 12:40:06'),
(88, 40, 'Jasa Konsultan Pengawasan Renov Parkir (Perubahan)', '2022-07-28 12:40:14', '2022-07-28 12:40:14'),
(89, 40, 'Jasa Konsultan Pengawasan Renov Guest House MJD R. CT Scan (Perubahan)', '2022-07-28 12:40:22', '2022-07-28 12:40:22'),
(90, 40, 'Jasa Konsultan Pengawasan Renov/Pemasangan Atap R. Generator O2 (Perubahan)', '2022-07-28 12:40:30', '2022-07-28 12:40:30'),
(91, 40, 'Jasa Konsultan Pengawasan Renovasi Apotik (Perubahan)', '2022-07-28 12:40:38', '2022-07-28 12:40:38'),
(92, 40, 'Jasa Konsultan Pengawasan Renov Ruang Tunggu Laboratorium', '2022-07-28 12:40:47', '2022-07-28 12:40:47'),
(93, 42, 'Belanja Pemeliharaan IPAL dan Penyehatan Lingkungan RS', '2022-07-28 12:50:14', '2022-07-28 12:50:14'),
(94, 42, 'Biaya Pengangkutan Sampah Ke TPS', '2022-07-28 12:50:28', '2022-07-28 12:50:28'),
(95, 43, 'Pemeliharaan Peralatan Inventaris Kantor (Kelengkapan Rumah Sakit)', '2022-07-28 12:50:50', '2022-07-28 12:50:50'),
(96, 43, 'Pemeliharaan peralatan listrik, CCTV,INTERNETdan AC', '2022-07-28 12:50:58', '2022-07-28 12:50:58'),
(97, 43, 'Pemeliharaan Genset', '2022-07-28 12:51:06', '2022-07-28 12:51:06'),
(98, 43, 'Pemeliharaan Komputer dan Perlengkapanya', '2022-07-28 12:51:14', '2022-07-28 12:51:14'),
(99, 44, 'Pembayaran Belanja bahan dan jasa Renovasi Garasi Ambulance menjadi Guest Hose', '2022-07-28 12:51:26', '2022-07-28 12:51:26'),
(100, 44, 'Pemasangan stiker pada kaca gedung Rawat inap dan rawat jalan pelayanan umum', '2022-07-28 12:51:36', '2022-07-28 12:51:36'),
(101, 44, 'Belanja Rehab Sebagian Gedung Napza Menjadi Poliklinik (Perubahan)', '2022-07-28 12:51:43', '2022-07-28 12:51:43'),
(102, 44, 'Belanja Rehab Sebagian Gedung Napza Menjadi Rumah Makan (Perubahan)', '2022-07-28 12:51:53', '2022-07-28 12:51:53'),
(103, 44, 'Belanja Rehab Pagar & Halaman (Perubahan)', '2022-07-28 12:52:02', '2022-07-28 12:52:02'),
(104, 44, 'Belanja Renov Ruang Klinik Napza (Perubahan)', '2022-07-28 12:52:19', '2022-07-28 12:52:19'),
(105, 44, 'Belanja Renov Selasar Ruang Tunggu Ruang Radiologi (Perubahan)', '2022-07-28 12:52:27', '2022-07-28 12:52:27'),
(106, 44, 'Belanja Renov Parkir (Perubahan)', '2022-07-28 12:52:35', '2022-07-28 12:52:35'),
(107, 44, 'Belanja Renov Ruang Guest House MJD R. CT Scan (Perubahan)', '2022-07-28 12:52:43', '2022-07-28 12:52:43'),
(108, 44, 'Belanja Renov/ Pemasangan Atap R. Generator O2', '2022-07-28 12:52:52', '2022-07-28 12:52:52'),
(109, 44, 'Pengecatan Exterior RM dan Cor Halaman', '2022-07-28 12:53:00', '2022-07-28 12:53:00'),
(110, 44, 'Renov Ruang Gizi', '2022-07-28 12:54:42', '2022-07-28 12:54:42'),
(111, 44, 'Partisi R. Keuangan & Partisi Kaca JPK', '2022-07-28 12:54:52', '2022-07-28 12:54:52'),
(112, 44, 'Belanja Renov Ruang Apotik', '2022-07-28 12:55:01', '2022-07-28 12:55:01'),
(113, 44, 'Belanja Renov Ruang Rehabilitasi', '2022-07-28 12:55:13', '2022-07-28 12:55:13'),
(114, 44, 'Belanja Renov Ruang Picu, Gelatik,dan Elang', '2022-07-28 12:55:24', '2022-07-28 12:55:24'),
(115, 44, 'Belanja Renov Ruang Tunggu Laboratorium', '2022-07-28 12:55:35', '2022-07-28 12:55:35'),
(116, 44, 'Belanja Renov Ruang Laboratorium', '2022-07-28 12:55:44', '2022-07-28 12:55:44'),
(117, 44, 'Belanja Pengecatan Pintu Felding Kantin', '2022-07-28 12:55:54', '2022-07-28 12:55:54'),
(118, 44, 'Belanja Renovasi/pemindahan garasi ambulan', '2022-07-28 12:56:04', '2022-07-28 12:56:04'),
(119, 44, 'Belanja Renov r. kabid pelayanan, lab klinik dan R. kabid keperawatan,tangga', '2022-07-28 12:56:15', '2022-07-28 12:56:15'),
(120, 45, 'Belanja kalibrasi peralatan medis Rumah sakit', '2022-07-28 12:57:09', '2022-07-28 12:57:09'),
(121, 45, 'Belanja pemeliharaan alat medis Rumah sakit', '2022-07-28 12:57:19', '2022-07-28 12:57:19'),
(122, 46, 'Biaya Perbaikan Kendaraan Bermotor', '2022-07-28 12:57:33', '2022-07-28 12:57:33'),
(123, 47, 'Belanja Perjalanan Dinas Rapat Koordinasi Luar Daerah/Luar Negeri', '2022-07-28 13:02:56', '2022-07-28 13:02:56'),
(124, 47, 'Belanja Perjalanan Dinas Dalam Daerah Pemulangan dan Penjemputan Pasien', '2022-07-28 13:03:06', '2022-07-28 13:03:06'),
(125, 47, 'Belanja Perjalanan Dinas Kegiatan / Rapat Koordinasi Dalam Daerah', '2022-07-28 13:04:14', '2022-07-28 13:04:14'),
(126, 48, 'Laptop', '2022-07-28 13:28:12', '2022-07-28 13:28:12'),
(127, 48, 'Pc', '2022-07-28 13:28:24', '2022-07-28 13:28:24'),
(128, 50, 'Belanja Sound', '2022-07-28 13:28:40', '2022-07-28 13:28:40'),
(129, 50, 'Belanja bel pasien', '2022-07-28 13:28:49', '2022-07-28 13:28:49'),
(130, 49, 'Belanja Printer Tiket Obat', '2022-07-28 13:29:00', '2022-07-28 13:29:00'),
(131, 49, 'Belanja Printer', '2022-07-28 13:29:08', '2022-07-28 13:29:08'),
(132, 51, 'Belanja AC', '2022-07-28 13:29:40', '2022-07-28 13:29:40'),
(133, 51, 'Belanja modal kipas angin', '2022-07-28 13:29:50', '2022-07-28 13:29:50'),
(134, 51, 'Kulkas', '2022-07-28 13:29:58', '2022-07-28 13:29:58'),
(135, 53, 'Belanja modal medical bed elektrik', '2022-07-28 13:30:23', '2022-07-28 13:30:23'),
(136, 57, 'Belanja Kendaraan Dinas Roda 4', '2022-07-28 13:31:57', '2022-07-28 13:31:57'),
(137, 57, 'Belanja Kendaraan Roda 4 expander (Perubahan)', '2022-07-28 13:32:08', '2022-07-28 13:32:08'),
(138, 58, 'Pembuatan Kantin Kuliner (Perubahan)', '2022-07-28 13:35:42', '2022-07-28 13:35:42'),
(139, 58, 'Jasa Konsultan Perencanaan Pembuatan Kantin Kuliner (Perubahan)', '2022-07-28 13:35:57', '2022-07-28 13:35:57'),
(140, 58, 'Jasa Konsultan Pengawasan Pembuatan Kantin Kuliner (Perubahan)', '2022-07-28 13:36:12', '2022-07-28 13:36:12'),
(141, 58, 'Pembuatan Gapura (Perubahan)', '2022-07-28 13:36:25', '2022-07-28 13:36:25'),
(142, 58, 'Jasa Konsultan Perencanaan Pembuatan Gapura (Perubahan)', '2022-07-28 13:36:36', '2022-07-28 13:36:36'),
(143, 58, 'Jasa Konsultan Pengawasan Pembuatan Gapura (Perubahan)', '2022-07-28 13:36:46', '2022-07-28 13:36:46'),
(144, 58, 'Pembuatan Backdrop dan Resepsionis Poliklinik Umum (Perubahan)', '2022-07-28 13:37:00', '2022-07-28 13:37:00'),
(145, 58, 'Jasa Konsultan Perencanaan Pembuatan Backdrop dan Resepsionis Poliklinik Umum (Perubahan)', '2022-07-28 13:37:17', '2022-07-28 13:37:17'),
(146, 58, 'Jasa Konsultan Pengawasan Pembuatan Backdrop dan Resepsionis Poliklinik Umum (Perubahan)', '2022-07-28 13:37:44', '2022-07-28 13:37:44'),
(147, 58, 'Pembuatan Pos Keamanan (Perubahan)', '2022-07-28 13:37:55', '2022-07-28 13:37:55'),
(148, 58, 'Jasa Konsultan Perencanaan Pembuatan Pos Keamanan (Perubahan)', '2022-07-28 13:38:04', '2022-07-28 13:38:04'),
(149, 58, 'Jasa Konsultan Pengawasan Pembuatan Pos Keamanan (Perubahan)', '2022-07-28 13:38:14', '2022-07-28 13:38:14'),
(150, 54, 'Perlengkapan Ruang Klinik dan Rawat Inap Pasien Umum (Perubahan)', '2022-07-28 13:59:31', '2022-07-28 13:59:31'),
(151, 54, 'Belanja Alkes Thermometer (Perubahan)', '2022-07-28 13:59:42', '2022-07-28 13:59:42'),
(152, 54, 'Belanja Stetoskop (Perubahan)', '2022-07-28 13:59:51', '2022-07-28 13:59:51'),
(153, 54, 'Belanja Timbangan (Perubahan)', '2022-07-28 14:00:01', '2022-07-28 14:00:01'),
(154, 54, 'Belanja Boneka Manekin Alat Kesehatan', '2022-07-28 14:00:11', '2022-07-28 14:00:11'),
(155, 55, 'Belanja Penampungan air (Perubahan)', '2022-07-28 14:00:27', '2022-07-28 14:00:27'),
(156, 55, 'Belanja Peralatan Instalasi Kesling (Perubahan)', '2022-07-28 14:00:37', '2022-07-28 14:00:37'),
(157, 56, 'Belanja Kamera (Perubahan)', '2022-07-28 14:00:52', '2022-07-28 14:00:52'),
(158, 56, 'Belanja Televisi 85 Inch (Perubahan)', '2022-07-28 14:01:01', '2022-07-28 14:01:01'),
(159, 56, 'Belanja Televisi /monetor', '2022-07-28 14:01:12', '2022-07-28 14:01:12'),
(160, 52, 'Belanja Kitchen Set (Perubahan)', '2022-07-28 14:01:42', '2022-07-28 14:01:42'),
(161, 52, 'Belanja Meja (Perubahan)', '2022-07-28 14:01:50', '2022-07-28 14:01:50'),
(162, 52, 'Belanja Pembuatan Rak Ruang Gizi (Perubahan)', '2022-07-28 14:01:58', '2022-07-28 14:01:58'),
(163, 52, 'Belanja Spring bed', '2022-07-28 14:02:06', '2022-07-28 14:02:06'),
(164, 52, 'Belanja Sofa', '2022-07-28 14:02:16', '2022-07-28 14:02:16'),
(165, 52, 'Belanja lemari', '2022-07-28 14:02:24', '2022-07-28 14:02:24'),
(166, 59, 'Belanja Aplikasi MMPI (Perubahan)', '2022-07-28 14:06:26', '2022-07-28 14:06:26'),
(167, 60, 'Belanja Tab', '2022-07-28 14:06:37', '2022-07-28 14:06:37');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `username` varchar(18) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nip` varchar(18) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `jabatan` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `level` enum('Admin','Operator') COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `nama`, `nip`, `jabatan`, `email`, `level`, `remember_token`, `email_verified_at`, `created_at`, `updated_at`) VALUES
(1, 'WALID', '$2y$10$QEYakYtJhovvOA0ZRb6p7uKdMjA61IKeQxjx62KlYQpXaF4Ri/fAS', 'Moh. Walid', '200008062022011001', 'Staf Perbendaharaan', 'mohwalidas2@gmail.com', 'Admin', 'N8UDPCR0MpqQhu3khjnpkTh2qw6HE5tsA7OjghZOHgpliHAZT8Qi9241tSj9', NULL, '2022-07-24 01:46:07', '2022-07-24 01:46:07');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bank_tujuan`
--
ALTER TABLE `bank_tujuan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bentuk_rekanan`
--
ALTER TABLE `bentuk_rekanan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bukti_gu`
--
ALTER TABLE `bukti_gu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `jenis_potongan`
--
ALTER TABLE `jenis_potongan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pagu_murni`
--
ALTER TABLE `pagu_murni`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pajak_gu`
--
ALTER TABLE `pajak_gu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `potongan`
--
ALTER TABLE `potongan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rekanan`
--
ALTER TABLE `rekanan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rekening1`
--
ALTER TABLE `rekening1`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rekening2`
--
ALTER TABLE `rekening2`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rekening3`
--
ALTER TABLE `rekening3`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rekening4`
--
ALTER TABLE `rekening4`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rekening5`
--
ALTER TABLE `rekening5`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rekening6`
--
ALTER TABLE `rekening6`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `uraian_rekening`
--
ALTER TABLE `uraian_rekening`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_username_unique` (`username`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bank_tujuan`
--
ALTER TABLE `bank_tujuan`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `bentuk_rekanan`
--
ALTER TABLE `bentuk_rekanan`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `bukti_gu`
--
ALTER TABLE `bukti_gu`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jenis_potongan`
--
ALTER TABLE `jenis_potongan`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `pagu_murni`
--
ALTER TABLE `pagu_murni`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=169;

--
-- AUTO_INCREMENT for table `pajak_gu`
--
ALTER TABLE `pajak_gu`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `potongan`
--
ALTER TABLE `potongan`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `rekanan`
--
ALTER TABLE `rekanan`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `rekening1`
--
ALTER TABLE `rekening1`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `rekening2`
--
ALTER TABLE `rekening2`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `rekening3`
--
ALTER TABLE `rekening3`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `rekening4`
--
ALTER TABLE `rekening4`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `rekening5`
--
ALTER TABLE `rekening5`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `rekening6`
--
ALTER TABLE `rekening6`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- AUTO_INCREMENT for table `uraian_rekening`
--
ALTER TABLE `uraian_rekening`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=168;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
