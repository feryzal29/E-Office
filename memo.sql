-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 08, 2022 at 02:09 AM
-- Server version: 10.4.20-MariaDB
-- PHP Version: 8.0.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `memo`
--

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
(35, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(36, '2022_01_14_033602_tb_jabatan', 1),
(37, '2022_01_15_014258_tb_user', 1),
(38, '2022_01_19_024723_tb_memo', 1),
(39, '2022_01_26_024940_tb_detail_kepada', 2),
(40, '2022_01_26_030443_tb_detail_cc', 3),
(41, '2022_02_02_003600_tb_disposisi', 4),
(42, '2022_02_02_021225_tb_detail_disposisi', 5),
(43, '2022_02_03_021250_tb_setting', 6),
(44, '2022_02_12_014155_tb_forward', 7),
(45, '2022_02_12_033142_tb_detail_forward', 7),
(46, '2022_02_16_144505_tb_surat', 8),
(47, '2022_02_17_013921_tb_forward_surat', 9),
(48, '2022_02_18_123448_tb_log', 10);

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
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tb_detail_disposisi`
--

CREATE TABLE `tb_detail_disposisi` (
  `id_detail_dispo` int(10) UNSIGNED NOT NULL,
  `id_disposisi_detail` int(11) NOT NULL,
  `no_surat` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kepada_disposisi` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tgl_disposisi_dilihat` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tb_detail_forward`
--

CREATE TABLE `tb_detail_forward` (
  `id_detail_forward` int(11) NOT NULL,
  `id_forward` int(11) NOT NULL,
  `tujuan_disposisi` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('1','2') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1',
  `tgl_dibaca` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tb_detail_kepada`
--

CREATE TABLE `tb_detail_kepada` (
  `id_detail_kepada` int(10) UNSIGNED NOT NULL,
  `id_detail_memo` int(11) NOT NULL,
  `no_surat` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jabatan_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('belum','sudah') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'belum',
  `tgl_lihat` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tb_disposisi`
--

CREATE TABLE `tb_disposisi` (
  `id_disposisi` int(11) NOT NULL,
  `id_memo_disposisi` int(11) NOT NULL,
  `no_surat` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sifat` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `perihal` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pengirim_memo` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tgl_surat` date NOT NULL,
  `pengirim_disposisi` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `isi` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `tgl_disposisi` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tb_forward_disposisi`
--

CREATE TABLE `tb_forward_disposisi` (
  `id_forward` int(11) NOT NULL,
  `id_disposisi_frw` int(11) NOT NULL,
  `no_surat` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pengirim` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `isi_disposisi` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tb_forward_surat`
--

CREATE TABLE `tb_forward_surat` (
  `id_forward` int(11) NOT NULL,
  `id_surat` int(11) NOT NULL,
  `no_surat` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pengirim` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `penerima` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `isi_forward` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `tgl_dibaca` date DEFAULT NULL,
  `tgl_forward` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tb_jabatan`
--

CREATE TABLE `tb_jabatan` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jabatan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tb_jabatan`
--

INSERT INTO `tb_jabatan` (`id`, `jabatan`, `created_at`, `updated_at`) VALUES
('JAB-000004', 'Administrator', '2022-01-21 21:58:14', '2022-02-12 23:32:13'),
('JAB-000005', 'Direktur', '2022-03-07 01:57:12', '2022-03-07 01:57:12'),
('JAB-000006', 'Kepala Bidang Pelayanan Medis', '2022-03-07 01:57:30', '2022-03-07 01:57:30'),
('JAB-000007', 'Ketua KMKP', '2022-03-07 01:57:42', '2022-03-07 01:57:42'),
('JAB-000008', 'Kepala Ruang IGD', '2022-03-07 01:57:52', '2022-03-07 01:57:52'),
('JAB-000009', 'Kepala Ruang IBS', '2022-03-07 01:58:06', '2022-03-07 01:58:06'),
('JAB-000010', 'Kepala Ruang ICU', '2022-03-07 01:58:22', '2022-03-07 01:58:22'),
('JAB-000011', 'Kepala Ruang Bersalin', '2022-03-07 01:58:37', '2022-03-07 01:58:37'),
('JAB-000012', 'Kepala Ruang Rawat Inap', '2022-03-07 01:58:46', '2022-03-07 01:58:46'),
('JAB-000013', 'Kepala Bidang Keperawatan', '2022-03-07 01:58:55', '2022-03-07 01:58:55'),
('JAB-000014', 'Kepala Ruang Laboratorium', '2022-03-07 01:59:05', '2022-03-07 01:59:05'),
('JAB-000015', 'Kepala Ruang Farmasi', '2022-03-07 01:59:13', '2022-03-07 01:59:13'),
('JAB-000016', 'Kepala Ruang Rekam Medis', '2022-03-07 01:59:23', '2022-03-07 01:59:23'),
('JAB-000017', 'Kepala Ruang Gizi', '2022-03-07 01:59:31', '2022-03-07 01:59:31'),
('JAB-000018', 'Kepala Bagian Keuangan', '2022-03-07 01:59:39', '2022-03-07 01:59:39'),
('JAB-000019', 'Bagian Perpajakan', '2022-03-07 01:59:46', '2022-03-07 01:59:46'),
('JAB-000020', 'Bendahara', '2022-03-07 01:59:54', '2022-03-07 01:59:54'),
('JAB-000021', 'Kepala Bidang Penunjang Medis', '2022-03-07 02:00:04', '2022-03-07 02:00:04'),
('JAB-000022', 'Ketua IPCN / PPI', '2022-03-07 02:00:15', '2022-03-07 02:00:15'),
('JAB-000024', 'Kepala Seksi Administrasi', '2022-03-07 02:00:36', '2022-03-07 02:00:36'),
('JAB-000025', 'Diklat dan Marketing', '2022-03-07 02:00:44', '2022-03-07 02:00:44'),
('JAB-000026', 'Sarana dan Prasarana (Sarpras)', '2022-03-07 02:00:53', '2022-03-07 02:00:53'),
('JAB-000027', 'Kepala Unit Kebersihan dan Ma\'la', '2022-03-07 02:01:01', '2022-03-07 02:01:01'),
('JAB-000028', 'Kesling', '2022-03-07 02:01:08', '2022-03-07 02:01:08'),
('JAB-000029', 'Kepala Seksi IT', '2022-03-07 02:01:17', '2022-03-07 02:01:17'),
('JAB-000030', 'Kepala IPS', '2022-03-07 02:02:02', '2022-03-07 02:02:02'),
('JAB-000031', 'PIC  Casemix', '2022-03-07 02:02:09', '2022-03-07 02:02:09'),
('JAB-000032', 'Kepala Ruang Rawat Jalan', '2022-03-07 02:28:39', '2022-03-07 02:28:39'),
('JAB-000033', 'Kepala Bagian Umum', '2022-03-07 03:00:47', '2022-03-07 03:00:47');

-- --------------------------------------------------------

--
-- Table structure for table `tb_log`
--

CREATE TABLE `tb_log` (
  `id_log` int(11) NOT NULL,
  `pengguna` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `aksi` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `memo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `id_jabatan` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tanggal` date DEFAULT NULL,
  `jam` time DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tb_log`
--

INSERT INTO `tb_log` (`id_log`, `pengguna`, `aksi`, `memo`, `created_at`, `updated_at`, `id_jabatan`, `tanggal`, `jam`) VALUES
(34, 'Dimas Pratama', 'Membuat Memo dengan No Memo', '02/IMM/XXI/2022', '2022-02-21 02:26:39', '2022-02-21 02:26:39', 'JAB-000002', '2022-02-21', '09:26:39'),
(35, 'Wahyu Lazzuady', 'Menyetujui Memo', '02/IMM/XXI/2022', '2022-02-21 02:30:20', '2022-02-21 02:30:20', 'JAB-000001', '2022-02-21', '09:30:20'),
(36, 'Muniroh', 'Disposisi Memo', '02/IMM/XXI/2022', '2022-02-21 02:41:58', '2022-02-21 02:41:58', 'JAB-000005', '2022-02-21', '09:41:58'),
(37, 'Dimas Pratama', 'Disposisi Diteruskan', '02/IMM/XXI/2022', '2022-02-21 02:44:11', '2022-02-21 02:44:11', 'JAB-000002', '2022-02-21', '09:44:11'),
(38, 'Dimas Pratama', 'Disposisi Diteruskan', '02/IMM/XXI/2022', '2022-02-21 02:51:13', '2022-02-21 02:51:13', 'JAB-000002', '2022-02-21', '09:51:13'),
(39, 'Permata Sari', 'Hapus Memo', '02/IMM/XXI/2022', '2022-02-21 03:11:27', '2022-02-21 03:11:27', 'JAB-000004', '2022-02-21', '10:11:26'),
(40, 'Muniroh', 'Disposisi Surat Dari Luar Rumah Sakit', '10/SURATLUAR/VII/2022', '2022-02-21 03:40:58', '2022-02-21 03:40:58', 'JAB-000005', '2022-02-21', '10:40:57'),
(41, 'Nyai Roro', 'Forward Disposisi Surat Dari Luar Rumah Sakit', '10/SURATLUAR/VII/2022', '2022-02-21 03:43:48', '2022-02-21 03:43:48', 'JAB-000006', '2022-02-21', '10:43:48'),
(42, 'Permata Sari', 'Hapus Disposisi Surat Dari Luar Rumah Sakit', '10/SURATLUAR/VII/2022', '2022-02-21 03:51:44', '2022-02-21 03:51:44', 'JAB-000004', '2022-02-21', '10:51:44'),
(43, 'Dimas Pratama', 'Membuat Memo', '10/BUATMEMO/VII/2022', '2022-02-21 04:07:17', '2022-02-21 04:07:17', 'JAB-000002', '2022-02-21', '11:07:17'),
(44, 'Wahyu Lazzuady', 'Menyetujui Memo', '10/BUATMEMO/VII/2022', '2022-02-21 04:09:21', '2022-02-21 04:09:21', 'JAB-000001', '2022-02-21', '11:09:21'),
(45, 'Wahyu Lazzuady', 'Disposisi Memo', '10/BUATMEMO/VII/2022', '2022-02-21 04:11:03', '2022-02-21 04:11:03', 'JAB-000001', '2022-02-21', '11:11:03'),
(46, 'Muniroh', 'Disposisi Surat Dari Luar Rumah Sakit', '888/00M/IMM/XII/2021', '2022-02-21 04:21:46', '2022-02-21 04:21:46', 'JAB-000005', '2022-02-21', '11:21:46'),
(47, 'Wahyu Lazzuady', 'Forward Disposisi Surat Dari Luar Rumah Sakit', '888/00M/IMM/XII/2021', '2022-02-23 01:48:43', '2022-02-23 01:48:43', 'JAB-000001', '2022-02-23', '08:48:43'),
(48, 'Permata Sari', 'Hapus Disposisi Surat Dari Luar Rumah Sakit', '888/00M/IMM/XII/2021', '2022-02-23 02:00:10', '2022-02-23 02:00:10', 'JAB-000004', '2022-02-23', '09:00:10'),
(49, 'Muniroh', 'Disposisi Surat Dari Luar Rumah Sakit', '090/DISPOSISI-SURAT/VII/2022', '2022-02-23 02:02:12', '2022-02-23 02:02:12', 'JAB-000005', '2022-02-23', '09:02:12'),
(50, 'Wahyu Lazzuady', 'Forward Disposisi Surat Dari Luar Rumah Sakit', '090/DISPOSISI-SURAT/VII/2022', '2022-02-23 02:03:31', '2022-02-23 02:03:31', 'JAB-000001', '2022-02-23', '09:03:30'),
(51, 'Wahyu Lazzuady', 'Forward Disposisi Surat Dari Luar Rumah Sakit', '090/DISPOSISI-SURAT/VII/2022', '2022-02-23 03:32:34', '2022-02-23 03:32:34', 'JAB-000001', '2022-02-23', '10:32:34'),
(52, 'Wahyu Lazzuady', 'Forward Disposisi Surat Dari Luar Rumah Sakit', '090/DISPOSISI-SURAT/VII/2022', '2022-02-23 03:41:30', '2022-02-23 03:41:30', 'JAB-000001', '2022-02-23', '10:41:29'),
(53, 'Wahyu Lazzuady', 'Forward Disposisi Surat Dari Luar Rumah Sakit', '090/DISPOSISI-SURAT/VII/2022', '2022-02-23 04:59:13', '2022-02-23 04:59:13', 'JAB-000001', '2022-02-23', '11:59:10'),
(54, 'Intan Permata', 'Disposisi Diteruskan', '10/BUATMEMO/VII/2022', '2022-02-24 04:13:09', '2022-02-24 04:13:09', 'JAB-000003', '2022-02-24', '11:13:08'),
(55, 'Intan Permata', 'Disposisi Diteruskan', '10/BUATMEMO/VII/2022', '2022-02-24 04:32:15', '2022-02-24 04:32:15', 'JAB-000003', '2022-02-24', '11:32:14'),
(56, 'Dimas Pratama', 'Membuat Memo', '02/IMM/XXI/2022', '2022-03-01 02:36:38', '2022-03-01 02:36:38', 'JAB-000002', '2022-03-01', '09:36:38'),
(57, 'Wahyu Lazzuady', 'Menyetujui Memo', '02/IMM/XXI/2022', '2022-03-01 02:38:06', '2022-03-01 02:38:06', 'JAB-000001', '2022-03-01', '09:38:06'),
(58, 'Muniroh', 'Disposisi Memo', '02/IMM/XXI/2022', '2022-03-01 02:39:55', '2022-03-01 02:39:55', 'JAB-000005', '2022-03-01', '09:39:55'),
(59, 'Wahyu Lazzuady', 'Disposisi Diteruskan', '02/IMM/XXI/2022', '2022-03-01 02:41:25', '2022-03-01 02:41:25', 'JAB-000001', '2022-03-01', '09:41:25'),
(60, 'Dimas Pratama', 'Membuat Memo', '02/IMM/XXI/2022', '2022-03-01 03:06:45', '2022-03-01 03:06:45', 'JAB-000002', '2022-03-01', '10:06:45'),
(61, 'Wahyu Lazzuady', 'Menyetujui Memo', '02/IMM/XXI/2022', '2022-03-01 03:08:44', '2022-03-01 03:08:44', 'JAB-000001', '2022-03-01', '10:08:44'),
(62, 'dr. Ataaka Muhammad', 'Membuat Memo', '90/MEMOATTA/VII/2022', '2022-03-02 04:16:41', '2022-03-02 04:16:41', 'JAB-000007', '2022-03-02', '11:16:41'),
(63, 'Muniroh', 'Disposisi Surat Dari Luar Rumah Sakit', '888/00M/IMM/XII/2021', '2022-03-02 07:28:23', '2022-03-02 07:28:23', 'JAB-000005', '2022-03-02', '14:28:21');

-- --------------------------------------------------------

--
-- Table structure for table `tb_memo`
--

CREATE TABLE `tb_memo` (
  `id_memo` int(11) NOT NULL,
  `no_surat` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sifat` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `perihal` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jabatan_pengirim` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tgl_surat` date NOT NULL,
  `isi` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `mengetahui` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tgl_konfirm` date DEFAULT NULL,
  `status_konfirm` enum('1','2','3') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1',
  `kepada` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cc` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lampiran` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `catatan` text COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tb_setting`
--

CREATE TABLE `tb_setting` (
  `id_setting` int(10) UNSIGNED NOT NULL,
  `nama_instansi` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `motto` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `telepon` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fax` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `logo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tb_setting`
--

INSERT INTO `tb_setting` (`id_setting`, `nama_instansi`, `motto`, `alamat`, `telepon`, `fax`, `logo`, `created_at`, `updated_at`) VALUES
(3, 'RS PKU MUHAMMADIYAH SEKAPUK', 'CREATIVE, ACTIVE, RESPONSIBILITY, EMPATY(CARE)', 'RW 09 DEsa dodo', '082330321572', '082330321572', '1644323635095-1643867509338-logo.png', '2022-02-02 20:26:26', '2022-02-08 05:33:55');

-- --------------------------------------------------------

--
-- Table structure for table `tb_surat`
--

CREATE TABLE `tb_surat` (
  `id_surat` int(11) NOT NULL,
  `no_surat` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sifat` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pengirim` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tgl` date DEFAULT NULL,
  `perihal` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kepada` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `file` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `isi` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `pengirim_disposisi` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `tgl_dilihat` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tb_user`
--

CREATE TABLE `tb_user` (
  `id_user` bigint(20) UNSIGNED NOT NULL,
  `nip` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jk` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `level` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jabatan_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `qr_code` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tb_user`
--

INSERT INTO `tb_user` (`id_user`, `nip`, `Nama`, `username`, `password`, `jk`, `level`, `jabatan_id`, `qr_code`, `created_at`, `updated_at`) VALUES
(3, '170602054', 'Wahyu Lazzuardy', '170602054', '$2y$10$n6Z9xVHOYXtrAVwnUZ2B2OE/Ct/UoCZzfUoPzqQ4Wo0jnFEhrLAgu', 'laki', 'admin', 'JAB-000004', '170602054wahyu-lazzuardyqrcode.png', '2022-01-21 21:59:26', '2022-03-07 04:36:37'),
(16, '001,009,044', 'dr. HENDRIK STIYAWAN, MMRS', '001,009,044', '$2y$10$9TH90mAi2.AsrDfH75o6FuU4r2wZn4CnxXfpFbSUAXJeMo4Iivj4i', 'laki', 'kabag', 'JAB-000006', '001009044dr-hendrik-stiyawan-mmrsqrcode.png', '2022-03-07 02:38:06', '2022-03-07 02:38:06'),
(17, '001,010,054', 'dr. NUAIMATUL HANI\'AH', '001,010,054', '$2y$10$0n.Q16o6S90sJVYN4v0HS.ktNoo7XfLadVVuDVQ7L/M0Yg0GLgPRO', 'perempuan', 'kabag', 'JAB-000007', '001010054dr-nuaimatul-haniahqrcode.png', '2022-03-07 02:39:07', '2022-03-07 02:39:07'),
(18, '002,019,245', 'SITI ZAINAB, Amd.Kep', '002,019,245', '$2y$10$QLZBeVxgEPUZNu9/UtAzOOio0Rz4vQEdfg/0EyZCSq9JZHAt0kjIm', 'perempuan', 'karu', 'JAB-000008', '002019245siti-zainab-amdkepqrcode.png', '2022-03-07 02:41:26', '2022-03-07 02:41:26'),
(19, '002,017,177', 'JUHAINI HAMDAN,S. Kep.,Ns', '002,017,177', '$2y$10$c8JgQjl5oGCKlxVUy/aOQuVYwW06HKOUZBMVefYAvs1EbkaY2kdfu', 'laki', 'karu', 'JAB-000009', '002017177juhaini-hamdans-kepnsqrcode.png', '2022-03-07 02:42:06', '2022-03-07 02:42:06'),
(20, '002,015,124', 'MUHAMMAD SAIFUL, S. kep. Ns', '002,015,124', '$2y$10$gxZECPHhZ5fBa8.CEPxAB.DYQ6lm9LvUFU8U5rdbQRzxQKWlYbrl6', 'laki', 'karu', 'JAB-000010', '002015124muhammad-saiful-s-kep-nsqrcode.png', '2022-03-07 02:43:01', '2022-03-07 02:43:01'),
(21, '002,001,012', 'SITI RUMIYAH, Amd. Keb', '002,001,012', '$2y$10$2rpPW5mz4wexKWsNO63JXeGxcPxE9eDW2K9kYbfki7Rfk2J7TH6F2', 'perempuan', 'karu', 'JAB-000011', '002001012siti-rumiyah-amd-kebqrcode.png', '2022-03-07 02:43:39', '2022-03-07 02:43:39'),
(22, '002,010,053', 'KHAS KHASOH, Amd. Kep', '002,010,053', '$2y$10$1dIiIPgOkmG/xGe6RvPqxeyK0x6jYihVu/u631vlP8g3WdqAi9HKK', 'laki', 'karu', 'JAB-000012', '002010053khas-khasoh-amd-kepqrcode.png', '2022-03-07 02:44:40', '2022-03-07 02:44:40'),
(23, '002,014,107', 'IRWAN HABIBI, S. Kep. Ns', '002,014,107', '$2y$10$ruIUema/budbWY6HIgTx5.fq6QkgiBc4S21vGc2pt1/a/EU4AHf3G', 'laki', 'kabag', 'JAB-000013', '002014107irwan-habibi-s-kep-nsqrcode.png', '2022-03-07 02:45:31', '2022-03-07 02:45:31'),
(24, '004,004,023', 'ZUHAILIYAH, Amak', '004,004,023', '$2y$10$nREGKBsdQauhrytKNEI/XO2slrDR2EMEFW0ND/9KOjIQW5PAwaNKy', 'perempuan', 'karu', 'JAB-000014', '004004023zuhailiyah-amakqrcode.png', '2022-03-07 02:48:45', '2022-03-07 02:48:45'),
(25, '004,017,181', 'UMATUS SHOLIHAH, S. Farm.,Apt', '004,017,181', '$2y$10$rkrY1TRKjRl49MojBI2Es.QvskrRnWh8wlFl.VauxT63Xwvr7EV2G', 'perempuan', 'karu', 'JAB-000015', '004017181umatus-sholihah-s-farmaptqrcode.png', '2022-03-07 02:49:15', '2022-03-07 02:49:15'),
(26, '004,013,078', 'SITI ISNIAH, A. Md', '004,013,078', '$2y$10$dNtlMylCGga8BZJrefXSZeTGDngn0QqwRk9JlI5XBBnREMiid7UFO', 'perempuan', 'karu', 'JAB-000016', '004013078siti-isniah-a-mdqrcode.png', '2022-03-07 02:49:51', '2022-03-07 02:49:51'),
(27, '004,018,202', 'DURROTUN NAFISAH. S. Tr. GZ', '004,018,202', '$2y$10$OzPp8Vsk8nSDZdDKtISRBeHc8oXtrl.6.UDtxxoeAiKEH99AXM7Du', 'perempuan', 'karu', 'JAB-000017', '004018202durrotun-nafisah-s-tr-gzqrcode.png', '2022-03-07 02:50:42', '2022-03-07 02:50:42'),
(28, '003,005,026', 'ELIK RIFQIATUL CHILMIAH, Amd', '003,005,026', '$2y$10$Od9WMCf1eXycSIunHIBYM.Do1w/Ul.505HviQTM9kYikLqyD7eC1O', 'perempuan', 'kabag', 'JAB-000018', '003005026elik-rifqiatul-chilmiah-amdqrcode.png', '2022-03-07 02:51:13', '2022-03-07 02:51:13'),
(29, '003,006,030', 'NURUL SYOFIYAH, SE', '003,006,030', '$2y$10$DXGZVOUYPu.HZTwc36qQE.x/yLH2AFbkN7j66LKiBt9XvB.H5zTF2', 'perempuan', 'karu', 'JAB-000019', '003006030nurul-syofiyah-seqrcode.png', '2022-03-07 02:51:51', '2022-03-07 02:51:51'),
(30, '003,009,048', 'RENNY FITRIYAWATI', '003,009,048', '$2y$10$xwHCdEAk0JKrA28h4XFt2.xF016ykGOTDSY6Nj9lQLmg9X2q2HdJy', 'perempuan', 'karu', 'JAB-000020', '003009048renny-fitriyawatiqrcode.png', '2022-03-07 02:52:25', '2022-03-07 02:52:25'),
(31, '002,004,021', 'HUSNUL KHULUQ, S.Kep.,Ns', '002,004,021', '$2y$10$sNOgpdsgEJb0FulpTQ8K0OVR9FBdDc0tDL.mBBKpX/cGwlFTcOpU2', 'laki', 'kabag', 'JAB-000021', '002004021husnul-khuluq-skepnsqrcode.png', '2022-03-07 02:53:02', '2022-03-07 02:53:02'),
(32, '002,006,031', 'HANIK ERFATUNNAFI\'AH, S. Kep,Ns', '002,006,031', '$2y$10$O0tqsm/xgiugVlgkWsZeXeN3jqbjBXqQHVJGVBuHS9uJeSyTtPRqK', 'perempuan', 'kabag', 'JAB-000022', '002006031hanik-erfatunnafiah-s-kepnsqrcode.png', '2022-03-07 02:53:55', '2022-03-07 02:53:55'),
(33, '003,098,010', 'ENI UFTULIAH', '003,098,010', '$2y$10$.nFRanX3wuRw.hrBqE6BvuQLoD3ETjrKKBRJDrwPnibX9UR2y0/sm', 'perempuan', 'karu', 'JAB-000024', '003098010eni-uftuliahqrcode.png', '2022-03-07 02:55:46', '2022-03-07 02:55:46'),
(34, '002,007,038', 'FETY ROHMAWATI, Amd. Keb', '002,007,038', '$2y$10$jenvviYJ03oBM45lPTtXneadgV5HunXLU7jzjICL9pQyR7ObCQOp2', 'perempuan', 'karu', 'JAB-000025', '002007038fety-rohmawati-amd-kebqrcode.png', '2022-03-07 02:56:15', '2022-03-07 02:56:15'),
(35, '003,098,007', 'KHADZIK', '003,098,007', '$2y$10$7v.6tx0xltEQM9gfeFgYvuT1OwGIPq13K9T.GNporzBbuX8OXTOGC', 'laki', 'karu', 'JAB-000026', '003098007khadzikqrcode.png', '2022-03-07 02:56:49', '2022-03-07 02:56:49'),
(36, '003,004,022', 'SUJARWO', '003,004,022', '$2y$10$74I84d/.xrjApPZzy5np7OOawlKy7bPEPdcUi.HwL2CkvEEDineG6', 'laki', 'karu', 'JAB-000027', '003004022sujarwoqrcode.png', '2022-03-07 02:57:13', '2022-03-07 02:57:13'),
(37, '004,019,255', 'ILA NUR ANDRIYANI, Amd Kesling', '004,019,255', '$2y$10$CmZXAZqKPwGzhtfj9uMNCO04Jw8lLLgDO23rsUNHn8t7McT576rcG', 'perempuan', 'karu', 'JAB-000028', '004019255ila-nur-andriyani-amd-keslingqrcode.png', '2022-03-07 02:57:42', '2022-03-07 02:57:42'),
(38, '003,017,180', 'MOHAMMAD FERYZAL FAHLEVI, S.Kom.', '003,017,180', '$2y$10$5Q.HX4bYpndNjg6wmpiSPOP0aa0/uHBznxRepX5K6/GsKwvNI.CwC', 'laki', 'karu', 'JAB-000029', '003017180mohammad-feryzal-fahlevi-skomqrcode.png', '2022-03-07 02:58:19', '2022-03-07 04:34:41'),
(39, '004,009,047', 'HEPPY EKO WAHYUDI, amd,TEM', '004,009,047', '$2y$10$RpR19Bah5JVLAVzObSS8puxaCw4YTUmkS1u/nK4g6iDYse6w1ajDi', 'laki', 'karu', 'JAB-000030', '004009047heppy-eko-wahyudi-amdtemqrcode.png', '2022-03-07 02:58:55', '2022-03-07 02:58:55'),
(40, '001,014,115', 'dr. UMI ZAKIYAH', '001,014,115', '$2y$10$lIEC1X5//62au.1R/e6U5eIwH4kCO5Qw6uTAx3FL6pdKebAifO7xG', 'perempuan', 'kabag', 'JAB-000031', '001014115dr-umi-zakiyahqrcode.png', '2022-03-07 02:59:50', '2022-03-07 02:59:50'),
(41, '002,013,076', 'FASHIHATUL ULA S. Kep.,Ns', '002,013,076', '$2y$10$rQku8yWPkIanig9FXkwNBuifVX0Tr3t13gbIj0RkoNfOATOR1/O72', 'perempuan', 'karu', 'JAB-000032', '002013076fashihatul-ula-s-kepnsqrcode.png', '2022-03-07 03:00:20', '2022-03-07 03:00:20'),
(42, '002,098,005', 'SITI MARSIYAH, S. Kep.,Ns', '002,098,005', '$2y$10$srhD0RZjmhiAiRLU0/6xAODlrWWPXYogOAviru8duQ6sEaBogrMfy', 'perempuan', 'kabag', 'JAB-000033', '002098005siti-marsiyah-s-kepnsqrcode.png', '2022-03-07 03:01:21', '2022-03-07 03:01:21'),
(44, '945,314', 'dr. UMI JULAIKAH, M. Kes', '945,314', '$2y$10$.sxNH9kqXd19apLY2FVSyO45i1DtNNXEvZaXUYGaOj1UsNF82ZXK.', 'perempuan', 'dirut', 'JAB-000005', '945314dr-umi-julaikah-m-kesqrcode.png', '2022-03-07 03:13:40', '2022-03-07 03:13:40');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `tb_detail_disposisi`
--
ALTER TABLE `tb_detail_disposisi`
  ADD PRIMARY KEY (`id_detail_dispo`),
  ADD KEY `fkdetail` (`id_disposisi_detail`);

--
-- Indexes for table `tb_detail_forward`
--
ALTER TABLE `tb_detail_forward`
  ADD PRIMARY KEY (`id_detail_forward`),
  ADD KEY `fk_forward_detail` (`id_forward`);

--
-- Indexes for table `tb_detail_kepada`
--
ALTER TABLE `tb_detail_kepada`
  ADD PRIMARY KEY (`id_detail_kepada`) USING BTREE,
  ADD KEY `fk_memo` (`id_detail_memo`),
  ADD KEY `fk_jabatan` (`jabatan_id`);

--
-- Indexes for table `tb_disposisi`
--
ALTER TABLE `tb_disposisi`
  ADD PRIMARY KEY (`id_disposisi`),
  ADD KEY `fk_memo_disposisi` (`id_memo_disposisi`);

--
-- Indexes for table `tb_forward_disposisi`
--
ALTER TABLE `tb_forward_disposisi`
  ADD KEY `id_forward` (`id_forward`),
  ADD KEY `fk_disposisi_forward` (`id_disposisi_frw`);

--
-- Indexes for table `tb_forward_surat`
--
ALTER TABLE `tb_forward_surat`
  ADD KEY `fk_surat_forward` (`id_surat`),
  ADD KEY `fk_pengirim_fw` (`pengirim`),
  ADD KEY `fk_penerima_fw` (`penerima`);

--
-- Indexes for table `tb_jabatan`
--
ALTER TABLE `tb_jabatan`
  ADD KEY `id` (`id`);

--
-- Indexes for table `tb_log`
--
ALTER TABLE `tb_log`
  ADD PRIMARY KEY (`id_log`);

--
-- Indexes for table `tb_memo`
--
ALTER TABLE `tb_memo`
  ADD PRIMARY KEY (`id_memo`) USING BTREE,
  ADD KEY `fk_pengirim` (`jabatan_pengirim`),
  ADD KEY `fk_mengetahui` (`mengetahui`);

--
-- Indexes for table `tb_setting`
--
ALTER TABLE `tb_setting`
  ADD PRIMARY KEY (`id_setting`);

--
-- Indexes for table `tb_surat`
--
ALTER TABLE `tb_surat`
  ADD PRIMARY KEY (`id_surat`),
  ADD KEY `fk_pengirim_surat` (`pengirim`),
  ADD KEY `fk_tujuan_surat` (`kepada`);

--
-- Indexes for table `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`id_user`),
  ADD KEY `fk_id_jabatan` (`jabatan_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_detail_disposisi`
--
ALTER TABLE `tb_detail_disposisi`
  MODIFY `id_detail_dispo` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `tb_detail_forward`
--
ALTER TABLE `tb_detail_forward`
  MODIFY `id_detail_forward` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `tb_detail_kepada`
--
ALTER TABLE `tb_detail_kepada`
  MODIFY `id_detail_kepada` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=240;

--
-- AUTO_INCREMENT for table `tb_log`
--
ALTER TABLE `tb_log`
  MODIFY `id_log` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;

--
-- AUTO_INCREMENT for table `tb_setting`
--
ALTER TABLE `tb_setting`
  MODIFY `id_setting` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `id_user` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tb_detail_disposisi`
--
ALTER TABLE `tb_detail_disposisi`
  ADD CONSTRAINT `fkdetail` FOREIGN KEY (`id_disposisi_detail`) REFERENCES `tb_disposisi` (`id_disposisi`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Constraints for table `tb_detail_forward`
--
ALTER TABLE `tb_detail_forward`
  ADD CONSTRAINT `fk_forward_detail` FOREIGN KEY (`id_forward`) REFERENCES `tb_forward_disposisi` (`id_forward`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tb_detail_kepada`
--
ALTER TABLE `tb_detail_kepada`
  ADD CONSTRAINT `fk_jabatan` FOREIGN KEY (`jabatan_id`) REFERENCES `tb_jabatan` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_memo` FOREIGN KEY (`id_detail_memo`) REFERENCES `tb_memo` (`id_memo`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tb_disposisi`
--
ALTER TABLE `tb_disposisi`
  ADD CONSTRAINT `fk_memo_disposisi` FOREIGN KEY (`id_memo_disposisi`) REFERENCES `tb_memo` (`id_memo`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Constraints for table `tb_forward_disposisi`
--
ALTER TABLE `tb_forward_disposisi`
  ADD CONSTRAINT `fk_disposisi_forward` FOREIGN KEY (`id_disposisi_frw`) REFERENCES `tb_disposisi` (`id_disposisi`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tb_forward_surat`
--
ALTER TABLE `tb_forward_surat`
  ADD CONSTRAINT `fk_penerima_fw` FOREIGN KEY (`penerima`) REFERENCES `tb_jabatan` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_pengirim_fw` FOREIGN KEY (`pengirim`) REFERENCES `tb_jabatan` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_surat_forward` FOREIGN KEY (`id_surat`) REFERENCES `tb_surat` (`id_surat`) ON DELETE CASCADE;

--
-- Constraints for table `tb_memo`
--
ALTER TABLE `tb_memo`
  ADD CONSTRAINT `fk_mengetahui` FOREIGN KEY (`mengetahui`) REFERENCES `tb_jabatan` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_pengirim` FOREIGN KEY (`jabatan_pengirim`) REFERENCES `tb_jabatan` (`id`) ON UPDATE CASCADE;

--
-- Constraints for table `tb_surat`
--
ALTER TABLE `tb_surat`
  ADD CONSTRAINT `fk_pengirim_surat` FOREIGN KEY (`pengirim`) REFERENCES `tb_jabatan` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_tujuan_surat` FOREIGN KEY (`kepada`) REFERENCES `tb_jabatan` (`id`) ON UPDATE CASCADE;

--
-- Constraints for table `tb_user`
--
ALTER TABLE `tb_user`
  ADD CONSTRAINT `fk_id_jabatan` FOREIGN KEY (`jabatan_id`) REFERENCES `tb_jabatan` (`id`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
