-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jul 13, 2021 at 06:15 AM
-- Server version: 8.0.25-0ubuntu0.20.04.1
-- PHP Version: 8.0.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `e-kelurahan`
--

-- --------------------------------------------------------

--
-- Table structure for table `certificate_taxandbuilding`
--

CREATE TABLE `certificate_taxandbuilding` (
  `code_tax` varchar(30) NOT NULL,
  `entrance_service_id` varchar(30) NOT NULL,
  `office_name` varchar(100) NOT NULL,
  `position` varchar(100) NOT NULL,
  `subject_tax_name` varchar(100) NOT NULL,
  `address_tax_object` text NOT NULL,
  `location` text NOT NULL,
  `number_object` bigint DEFAULT NULL,
  `value_of_tax_payable` bigint DEFAULT NULL,
  `necessity` text NOT NULL,
  `coment` text NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status_genered` int DEFAULT NULL,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `actions` enum('pending','diterima','ditolak') CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `citizen_data`
--

CREATE TABLE `citizen_data` (
  `id_citizen_data` int NOT NULL,
  `full_name` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `users_id` int NOT NULL,
  `number_identification_card` varchar(16) NOT NULL,
  `address` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci,
  `phone_number` varchar(16) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `phone_number_whatshapp` varchar(16) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `profession` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `citizen_data`
--

INSERT INTO `citizen_data` (`id_citizen_data`, `full_name`, `users_id`, `number_identification_card`, `address`, `phone_number`, `phone_number_whatshapp`, `profession`) VALUES
(1, 'nabila', 11, '1234567890123456', 'sfssfsgsaaaaaaaaa', '1414141312231', '233000025232', 'head manager'),
(3, 'fahira', 12, '1234567890123452', 'sfssfsgs', '1414141312232', '23113000025232', 'head manager'),
(4, 'nabila adeloa', 40, '1234567890123433', 'sfssfsgs', '1414141312211', '23113000025202', 'kepala divisi'),
(5, 'test nama', 43, '1671100509980005', 'alamat saya', '081278673887', '0897654321123', 'bekerja'),
(7, NULL, 54, '1234567890123412', NULL, NULL, NULL, NULL),
(8, 'nabila adelia', 55, '1234567890123413', 'jalan rs pusri RSA palembang', '081273536358', '081273536358', 'pengusaha');

-- --------------------------------------------------------

--
-- Table structure for table `downloads`
--

CREATE TABLE `downloads` (
  `id_download` int NOT NULL,
  `code_print` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `file` text NOT NULL,
  `actions` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `downloads`
--

INSERT INTO `downloads` (`id_download`, `code_print`, `file`, `actions`) VALUES
(9, 'SKM-0001', '60d1651f5ff545.40785112.pdf', 2),
(17, 'SKM-0002', '60d17155419fd3.84089368.pdf', 2),
(18, 'STP-0001', '60d230374868e9.44564586.pdf', 2),
(23, 'SIN-0001', '60e32f48759978.39033641.pdf', 2),
(24, 'STP-0002', '60e60aa3ce3b97.05649456.pdf', 2);

-- --------------------------------------------------------

--
-- Table structure for table `employee_data`
--

CREATE TABLE `employee_data` (
  `id_employee` int NOT NULL,
  `users_id` int NOT NULL COMMENT 'relasi ke users akun',
  `phone_number` varchar(16) NOT NULL,
  `number_identity` varchar(16) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `position` varchar(50) NOT NULL,
  `name_employee` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `employee_data`
--

INSERT INTO `employee_data` (`id_employee`, `users_id`, `phone_number`, `number_identity`, `position`, `name_employee`) VALUES
(1, 1, '141414131231', '214142122414112', 'manager', 'Aunah,S.Sos'),
(2, 5, '081273536358', '214142122141411', 'head managera', 'Fahira Nabila'),
(10, 37, '081273536351', '1234567890123411', 'kepala proyek', 'nabila adelia'),
(16, 39, '081273536359', '1234567890123451', 'staf saya pribadi', 'nama staf baru');

-- --------------------------------------------------------

--
-- Table structure for table `entrance_services`
--

CREATE TABLE `entrance_services` (
  `code_entrance_services` varchar(30) NOT NULL,
  `citizen_data_id` int NOT NULL,
  `service_categori_id` varchar(30) NOT NULL,
  `employee_data_id` int DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `file_status_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `entrance_services`
--

INSERT INTO `entrance_services` (`code_entrance_services`, `citizen_data_id`, `service_categori_id`, `employee_data_id`, `created_at`, `file_status_id`) VALUES
('RLG-0001', 3, 'SPK-0005', 2, '2021-06-19 20:38:13', 1),
('RLG-0002', 1, 'SPK-0002', 2, '2021-06-21 23:58:40', 1),
('RLG-0003', 4, 'SPK-0012', 2, '2021-06-22 23:57:41', 1),
('RLG-0004', 4, 'SPK-0009', 2, '2021-07-03 15:43:13', 1),
('RLG-0005', 4, 'SPK-0012', 2, '2021-07-08 01:42:37', 1);

-- --------------------------------------------------------

--
-- Table structure for table `file_manager`
--

CREATE TABLE `file_manager` (
  `id_file_manager` int NOT NULL,
  `entrance_service_code` varchar(30) NOT NULL,
  `file_requirements_id` int NOT NULL,
  `file` text NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `file_requirements`
--

CREATE TABLE `file_requirements` (
  `id_file_requietmens` int NOT NULL,
  `service_categori_id` varchar(30) NOT NULL COMMENT 'relasi dengan tabel service categori\r\n',
  `name_file` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL COMMENT 'nama persyaratan',
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP COMMENT 'tanggal dibuat',
  `update_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP COMMENT 'tanggal melakukan perubahan',
  `status` enum('Berlaku','Tidak Berlaku') NOT NULL COMMENT 'status persyaratan berkas'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `file_requirements`
--

INSERT INTO `file_requirements` (`id_file_requietmens`, `service_categori_id`, `name_file`, `created_at`, `update_at`, `status`) VALUES
(1, 'SPK-0005', 'Surat pengantar RT/RW setempat', '2021-06-19 20:19:21', '2021-06-19 20:19:21', 'Berlaku'),
(2, 'SPK-0001', 'Fotokopi KK / KTP', '2021-06-19 20:19:38', '2021-06-19 20:19:38', 'Berlaku'),
(3, 'SPK-0001', 'Bukti PBB Lunas Tahun berjalan', '2021-06-19 20:19:55', '2021-06-19 20:19:55', 'Berlaku'),
(4, 'SPK-0002', 'Surat Pengantar RT/RW setempat', '2021-06-19 20:20:20', '2021-06-19 20:20:20', 'Berlaku'),
(5, 'SPK-0002', 'Fotokopi KK / KTP', '2021-06-19 20:20:44', '2021-06-19 20:20:44', 'Berlaku'),
(6, 'SPK-0005', 'Fotokopi KK / KTP', '2021-06-19 20:22:24', '2021-06-19 20:22:24', 'Berlaku'),
(7, 'SPK-0005', 'Bukti PBB Lunas Tahun berjalan', '2021-06-19 20:23:02', '2021-07-02 17:58:39', 'Berlaku'),
(8, 'SPK-0002', 'Bukti PBB Lunas Tahun berjalan', '2021-06-19 20:23:40', '2021-06-19 20:23:40', 'Berlaku'),
(9, 'SPK-0002', 'Surat kematian dari instansi yang berwenang', '2021-06-19 20:24:14', '2021-06-19 20:24:14', 'Berlaku'),
(10, 'SPK-0004', 'Surat pengantar RT / RW setempat', '2021-06-19 20:29:00', '2021-06-19 20:29:00', 'Berlaku'),
(11, 'SPK-0004', 'Fotokopi KTP / KK', '2021-06-19 20:29:16', '2021-06-19 20:29:16', 'Berlaku'),
(12, 'SPK-0004', 'Bukti PBB lunas tahun berjalan', '2021-06-19 20:29:34', '2021-06-19 20:29:34', 'Berlaku'),
(13, 'SPK-0004', 'Akta pendirian usaha', '2021-06-19 20:29:51', '2021-06-19 20:29:51', 'Berlaku'),
(14, 'SPK-0001', 'Surat Pengantar RT/RW setempat', '2021-06-19 20:31:34', '2021-06-19 20:31:34', 'Berlaku'),
(15, 'SPK-0003', 'Surat Pengantar RT/RW setempat', '2021-06-19 20:32:26', '2021-06-19 20:32:26', 'Berlaku'),
(16, 'SPK-0003', 'Fotokopi KTP / KK', '2021-06-19 20:32:49', '2021-06-19 20:32:49', 'Berlaku'),
(17, 'SPK-0003', 'Bukti PBB lunas tahun berjalan', '2021-06-19 20:33:36', '2021-06-19 20:33:36', 'Berlaku'),
(18, 'SPK-0007', 'Surat Pengatar RT / RW setempat', '2021-06-19 20:34:19', '2021-06-19 20:34:19', 'Berlaku'),
(19, 'SPK-0007', 'Fotokopi KTP / KK', '2021-06-19 20:34:38', '2021-06-19 20:34:38', 'Berlaku'),
(20, 'SPK-0007', 'Bukti PBB lunas tahun berjalan', '2021-06-19 20:35:48', '2021-06-19 20:35:48', 'Berlaku'),
(21, 'SPK-0007', 'Persyaratan lain yang diperlukan', '2021-06-19 20:36:06', '2021-06-19 20:36:06', 'Berlaku'),
(22, 'SPK-0011', 'Surat pengantar RT / RW setempat', '2021-06-19 20:45:39', '2021-06-19 20:45:39', 'Berlaku'),
(23, 'SPK-0011', 'Fotokopi KTP / KK', '2021-06-19 20:45:53', '2021-06-19 20:45:53', 'Berlaku'),
(24, 'SPK-0011', 'Bukti PBB lunas tahun berjalan', '2021-06-19 20:46:07', '2021-06-19 20:46:07', 'Berlaku'),
(25, 'SPK-0011', 'Surat lahir dari instansi yang berwenang', '2021-06-19 20:46:25', '2021-06-19 20:46:25', 'Berlaku'),
(26, 'SPK-0011', 'Fotokopi surat nikah', '2021-06-19 20:46:35', '2021-06-19 20:46:35', 'Berlaku'),
(27, 'SPK-0009', 'Kartu kelurah', '2021-07-03 15:41:38', '2021-07-03 15:41:38', 'Berlaku'),
(28, 'SPK-0009', 'KTP Orang tua', '2021-07-03 15:41:52', '2021-07-03 15:41:52', 'Berlaku'),
(29, 'SPK-0009', 'KTP yang menikah', '2021-07-03 15:42:03', '2021-07-03 15:42:03', 'Berlaku'),
(30, 'SPK-0009', 'Surat pengantar nikah RT', '2021-07-03 15:42:20', '2021-07-03 15:42:20', 'Berlaku');

-- --------------------------------------------------------

--
-- Table structure for table `file_status`
--

CREATE TABLE `file_status` (
  `id_status` int NOT NULL,
  `status_name` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `file_status`
--

INSERT INTO `file_status` (`id_status`, `status_name`) VALUES
(1, 'done'),
(2, 'pending'),
(3, 'in the proccess'),
(4, 'failed');

-- --------------------------------------------------------

--
-- Table structure for table `license_marriage`
--

CREATE TABLE `license_marriage` (
  `id_license_marriage` varchar(30) NOT NULL,
  `entrance_service_id` varchar(30) NOT NULL,
  `marriage_guardian_name` varchar(100) NOT NULL,
  `place_of_birth` varchar(40) NOT NULL,
  `date_of_birth` date NOT NULL,
  `national` varchar(50) NOT NULL,
  `religion` varchar(30) NOT NULL,
  `profession` varchar(100) NOT NULL,
  `kk_number` bigint NOT NULL,
  `nik_number` bigint NOT NULL,
  `address` text NOT NULL,
  `rt_number` int DEFAULT NULL,
  `rw_number` int DEFAULT NULL,
  `saksi_one` varchar(100) DEFAULT NULL,
  `saksi_two` varchar(100) DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `actions` enum('pending','diterima','ditolak') CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `status_genered` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `log_file_submision`
--

CREATE TABLE `log_file_submision` (
  `id_log_file` int NOT NULL,
  `entrance_service_id` varchar(30) NOT NULL COMMENT 'histori pengajuan berkas',
  `file_status_id` int NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `employee_id` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `log_message`
--

CREATE TABLE `log_message` (
  `id_log_message` int NOT NULL,
  `message_entrance_id` varchar(30) NOT NULL,
  `message` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `marriage_data`
--

CREATE TABLE `marriage_data` (
  `id_marriage_data` int NOT NULL,
  `license_marriage_id` varchar(30) NOT NULL,
  `brides_name_men` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `bin_men` varchar(100) NOT NULL,
  `place_of_birth_men` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `date_of_birth_men` date NOT NULL,
  `profession_men` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `kk_number_men` bigint DEFAULT NULL,
  `nik_number_men` bigint NOT NULL,
  `marital_status_men` enum('Duda','Jejaka') CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `address_female` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `brides_name_female` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `bin_female` varchar(100) NOT NULL,
  `place_of_birth_female` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `date_of_birth_female` date NOT NULL,
  `profession_female` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `marital_status_female` enum('Janda','Perawan') CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `kk_number_female` bigint DEFAULT NULL,
  `nik_number_female` bigint NOT NULL,
  `address_men` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `national_men` varchar(50) NOT NULL,
  `national_female` varchar(50) NOT NULL,
  `religion_men` varchar(50) NOT NULL,
  `religion_female` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `message_entrance_service`
--

CREATE TABLE `message_entrance_service` (
  `id_message` varchar(30) NOT NULL,
  `entrance_service_id` varchar(30) NOT NULL,
  `message` text NOT NULL,
  `employee_id` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `parent_data`
--

CREATE TABLE `parent_data` (
  `id_parent_data` int NOT NULL,
  `marriage_data_id` int NOT NULL,
  `type_children` enum('Perempuan','Laki-laki') NOT NULL,
  `father_name` varchar(100) NOT NULL,
  `number_nik_father` bigint NOT NULL,
  `place_of_birth_father` varchar(100) NOT NULL,
  `date_of_birth_father` date NOT NULL,
  `national_father` varchar(100) NOT NULL,
  `religion_father` varchar(100) NOT NULL,
  `profession_father` varchar(100) NOT NULL,
  `address_father` text NOT NULL,
  `mother_name` varchar(100) NOT NULL,
  `number_nik_mother` bigint NOT NULL,
  `place_of_birth_mother` varchar(100) NOT NULL,
  `date_of_birth_mother` date NOT NULL,
  `national_mother` varchar(100) NOT NULL,
  `religion_mother` varchar(100) NOT NULL,
  `profession_mother` varchar(100) NOT NULL,
  `address_mother` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `request_signature_lurah`
--

CREATE TABLE `request_signature_lurah` (
  `id_request` int NOT NULL,
  `code_print` varchar(30) NOT NULL,
  `status` enum('diterima','ditolak') CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `role`
--

CREATE TABLE `role` (
  `id_role` int NOT NULL COMMENT 'id akses users',
  `name` varchar(25) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL COMMENT 'nama akses nya',
  `created` datetime DEFAULT CURRENT_TIMESTAMP COMMENT 'tanggal dibuat'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `role`
--

INSERT INTO `role` (`id_role`, `name`, `created`) VALUES
(1, 'Staf', '2021-06-03 15:23:32'),
(2, 'Lurah', '2021-10-08 00:00:00'),
(3, 'Warga', '2021-06-04 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `service_categories`
--

CREATE TABLE `service_categories` (
  `id_service_categori` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL COMMENT 'Kode Pelayanan',
  `name` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL COMMENT 'Nama Kategori Pelayanan',
  `user_id` int NOT NULL COMMENT 'Pembuat Kategori Pelayanan Referensi users',
  `status` enum('Show','Hide') NOT NULL COMMENT 'Tampil/Sembunyikan Kategori',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT 'Dibuat Pada',
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP COMMENT 'Terakhir Diupdate'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `service_categories`
--

INSERT INTO `service_categories` (`id_service_categori`, `name`, `user_id`, `status`, `created_at`, `updated_at`) VALUES
('SPK-0001', 'surat keterangan tidak mampu', 5, 'Show', '2021-06-19 13:11:25', '2021-06-19 13:11:25'),
('SPK-0002', 'Surat keterangan kematian', 5, 'Show', '2021-06-19 13:11:38', '2021-06-19 13:11:38'),
('SPK-0003', 'Surat keterangan berkelakuan baik', 5, 'Show', '2021-06-19 13:12:16', '2021-06-19 13:12:16'),
('SPK-0004', 'Surat keterangan usaha', 5, 'Show', '2021-06-19 13:12:40', '2021-06-19 13:12:40'),
('SPK-0005', 'Surat keterangan domisili', 5, 'Show', '2021-06-19 13:13:16', '2021-06-19 13:13:16'),
('SPK-0006', 'Surat keterangan belum menikah', 5, 'Show', '2021-06-19 13:13:39', '2021-06-19 13:13:39'),
('SPK-0007', 'Surat keterangan', 5, 'Show', '2021-06-19 13:14:19', '2021-06-19 13:14:19'),
('SPK-0008', 'Surat izin orang tua', 5, 'Hide', '2021-06-19 13:14:30', '2021-07-03 10:46:19'),
('SPK-0009', 'Surat permohonan menikah', 5, 'Show', '2021-06-19 13:14:57', '2021-06-19 13:14:57'),
('SPK-0010', 'Surat keterangan izin keramaian', 5, 'Show', '2021-06-19 13:26:44', '2021-06-22 09:39:17'),
('SPK-0011', 'Surat keterangan kelahiran', 5, 'Show', '2021-06-19 13:45:19', '2021-06-19 13:45:19'),
('SPK-0012', 'Surat keterangan pajak bumi dan bangunan', 5, 'Show', '2021-06-20 12:25:29', '2021-07-02 10:27:11');

-- --------------------------------------------------------

--
-- Table structure for table `signature_lurah`
--

CREATE TABLE `signature_lurah` (
  `id_sig` int NOT NULL,
  `file` text NOT NULL,
  `actions` enum('tidak berlaku','berlaku') NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `signature_lurah`
--

INSERT INTO `signature_lurah` (`id_sig`, `file`, `actions`, `created_at`) VALUES
(29, '60cdcb31e95de.png', 'tidak berlaku', '2021-06-19 17:47:13'),
(30, '60cdcb4f4f25e0.77371186.png', 'tidak berlaku', '2021-06-19 17:47:43'),
(31, '60cdd00922c0e.png', 'tidak berlaku', '2021-06-19 18:07:53'),
(32, '60cf54205c826.png', 'tidak berlaku', '2021-06-20 21:43:44'),
(33, '60e15e8a4b561.png', 'berlaku', '2021-07-04 14:08:58');

-- --------------------------------------------------------

--
-- Table structure for table `statement_letter`
--

CREATE TABLE `statement_letter` (
  `code_print` varchar(30) NOT NULL,
  `entrance_service_id` varchar(30) NOT NULL,
  `office_name` varchar(150) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `rt` text NOT NULL,
  `position` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `name` varchar(100) NOT NULL,
  `place_of_birth` varchar(50) NOT NULL,
  `date_of_birth` date NOT NULL,
  `gender` enum('Laki-laki','Perempuan') NOT NULL,
  `national` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `religion` varchar(20) NOT NULL,
  `profession` varchar(50) NOT NULL,
  `status` enum('Menikah','Belum Menikah') CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `address_now` text NOT NULL,
  `death_date` date DEFAULT NULL,
  `actions` enum('diterima','pending','ditolak') CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `users_id` int DEFAULT NULL,
  `status_genered` int NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `statement_letter`
--

INSERT INTO `statement_letter` (`code_print`, `entrance_service_id`, `office_name`, `rt`, `position`, `name`, `place_of_birth`, `date_of_birth`, `gender`, `national`, `religion`, `profession`, `status`, `address_now`, `death_date`, `actions`, `users_id`, `status_genered`, `created_at`, `updated_at`) VALUES
('SKM-0001', 'RLG-0001', 'Surya Saputra. S.PD, M.D', '40 tanggal 12-12-2020', 'Staf Keuangan', 'Ranti Suprianty', 'Palembang', '2021-06-23', 'Perempuan', 'Indonesia', 'Islam', 'Wiraswasta', 'Belum Menikah', 'Jalan lebung gajah belakang sekta perum', NULL, 'diterima', 2, 1, '2021-06-20 16:28:40', '2021-06-22 11:20:47'),
('SKM-0002', 'RLG-0002', 'nanda pratiwi.S.Pd', '40 nomor. 1992 tanggal 20-20-2028', 'Operator', 'Rahmad Hidayat', 'Palembang', '2020-09-02', 'Laki-laki', 'Indonesia', 'Islam', 'Swasta', 'Menikah', 'Jalan Rawa jaya 3', '2021-06-15', 'diterima', 2, 1, '2021-06-22 00:01:54', '2021-06-22 12:12:53');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id_users` int NOT NULL,
  `username` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL COMMENT 'username pengguna berupa email',
  `password` text NOT NULL,
  `role_id` int NOT NULL COMMENT 'relasi ke role ',
  `token` text,
  `remember_token` text,
  `status` enum('Aktif','Tidak Aktif') CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL COMMENT 'status akun ',
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id_users`, `username`, `password`, `role_id`, `token`, `remember_token`, `status`, `created_at`) VALUES
(1, 'lurahLG@gmail.com', '$2y$10$jMHIBP7fOWugGZzBwBjuxOe6mg1nRXxdEAiT35z/B2UBt/YvhufQ2', 2, NULL, NULL, 'Aktif', '2021-06-15 17:15:38'),
(5, 'fahira@gmail.com', '$2y$10$MtHP70A04H2bP3sYMm9NRe1EwQ1Hu/ZNdbH.WCCTEDpxy3JBP7wHW', 1, NULL, NULL, 'Aktif', '2021-06-15 17:15:38'),
(11, 'warga1@gmail.com', '$2y$10$GPufGSAT8DTVDzcuDK/PmeF9Ov/Pg4XWbaVYUU1RySrzhMNsYG2EG', 3, NULL, NULL, 'Aktif', '2021-06-15 17:15:38'),
(12, 'warga12@gmail.com', '$2y$10$cC2U18/I7HUHwI3DKzPxle0LRa91DKCWSC.ePvto6W49C6gYROcEe', 3, NULL, NULL, 'Aktif', '2021-06-15 17:15:38'),
(37, 'nabila@gmail.com', '$2y$10$STx0ZDxo1n2dFPDH1/wJjOoQ4ifVdzJYxdCMsOHzbo9virXFAW1Jm', 1, NULL, NULL, 'Aktif', '2021-06-15 17:15:38'),
(39, 'email@email.com', '$2y$10$r2FMPLyARNtvx1FNqTdJueZ6hi.fm2BY4Zq6wUfLdwhizxOC6OX1W', 1, NULL, NULL, 'Aktif', '2021-06-22 16:32:08'),
(40, 'emails@email.com', '$2y$10$xuNM9ny1KwgDl0sznEdu9OgWMXXSyRUZZm03sob.Nxz7MwqrlgxH6', 3, NULL, NULL, 'Aktif', '2021-06-22 16:32:08'),
(43, 'testtes@gmail.com', '$2y$10$.TFBxeaYd3P5v8aPuO8Do.Kufvc2Q6qw4QxQPJmjC.pyujRD85GwO', 3, NULL, NULL, 'Aktif', '2021-06-24 15:21:49'),
(54, 'user@gmail.com', '$2y$10$YMR1FD/kN..feXqYtrrMsO2Lnra0iAiodrWN6gfPV0FY8VD3iM32O', 3, NULL, NULL, 'Tidak Aktif', '2021-06-29 22:12:30'),
(55, 'users@gmail.com', '$2y$10$zrF5E3CJbVplE3xcLttpmOHZ8SZzk47w3kPahJ4P73pyr5C2Hjrqq', 3, NULL, NULL, 'Aktif', '2021-06-29 22:13:56');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `certificate_taxandbuilding`
--
ALTER TABLE `certificate_taxandbuilding`
  ADD PRIMARY KEY (`code_tax`),
  ADD UNIQUE KEY `entrance_service_id` (`entrance_service_id`);

--
-- Indexes for table `citizen_data`
--
ALTER TABLE `citizen_data`
  ADD PRIMARY KEY (`id_citizen_data`),
  ADD UNIQUE KEY `number_identification_card` (`number_identification_card`),
  ADD UNIQUE KEY `users_id` (`users_id`),
  ADD UNIQUE KEY `phone_number` (`phone_number`),
  ADD UNIQUE KEY `phone_number_whatshapp` (`phone_number_whatshapp`);

--
-- Indexes for table `downloads`
--
ALTER TABLE `downloads`
  ADD PRIMARY KEY (`id_download`),
  ADD UNIQUE KEY `code_print` (`code_print`);

--
-- Indexes for table `employee_data`
--
ALTER TABLE `employee_data`
  ADD PRIMARY KEY (`id_employee`),
  ADD UNIQUE KEY `phone_number` (`phone_number`),
  ADD UNIQUE KEY `employee_identification_number` (`number_identity`),
  ADD UNIQUE KEY `users_id_2` (`users_id`);

--
-- Indexes for table `entrance_services`
--
ALTER TABLE `entrance_services`
  ADD PRIMARY KEY (`code_entrance_services`),
  ADD KEY `employee_data_id` (`employee_data_id`),
  ADD KEY `file_status_id` (`file_status_id`),
  ADD KEY `citizen_data_id` (`citizen_data_id`);

--
-- Indexes for table `file_manager`
--
ALTER TABLE `file_manager`
  ADD PRIMARY KEY (`id_file_manager`),
  ADD KEY `entrance_service_code` (`entrance_service_code`);

--
-- Indexes for table `file_requirements`
--
ALTER TABLE `file_requirements`
  ADD PRIMARY KEY (`id_file_requietmens`),
  ADD KEY `code_file requirements` (`service_categori_id`);

--
-- Indexes for table `file_status`
--
ALTER TABLE `file_status`
  ADD PRIMARY KEY (`id_status`);

--
-- Indexes for table `license_marriage`
--
ALTER TABLE `license_marriage`
  ADD PRIMARY KEY (`id_license_marriage`);

--
-- Indexes for table `log_file_submision`
--
ALTER TABLE `log_file_submision`
  ADD PRIMARY KEY (`id_log_file`);

--
-- Indexes for table `log_message`
--
ALTER TABLE `log_message`
  ADD PRIMARY KEY (`id_log_message`);

--
-- Indexes for table `marriage_data`
--
ALTER TABLE `marriage_data`
  ADD PRIMARY KEY (`id_marriage_data`);

--
-- Indexes for table `message_entrance_service`
--
ALTER TABLE `message_entrance_service`
  ADD PRIMARY KEY (`id_message`),
  ADD KEY `entrance_service_id` (`entrance_service_id`);

--
-- Indexes for table `parent_data`
--
ALTER TABLE `parent_data`
  ADD PRIMARY KEY (`id_parent_data`);

--
-- Indexes for table `request_signature_lurah`
--
ALTER TABLE `request_signature_lurah`
  ADD PRIMARY KEY (`id_request`),
  ADD KEY `code_print` (`code_print`);

--
-- Indexes for table `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`id_role`);

--
-- Indexes for table `service_categories`
--
ALTER TABLE `service_categories`
  ADD PRIMARY KEY (`id_service_categori`);

--
-- Indexes for table `signature_lurah`
--
ALTER TABLE `signature_lurah`
  ADD PRIMARY KEY (`id_sig`);

--
-- Indexes for table `statement_letter`
--
ALTER TABLE `statement_letter`
  ADD PRIMARY KEY (`code_print`),
  ADD UNIQUE KEY `entrance_service_id` (`entrance_service_id`),
  ADD KEY `users_id` (`users_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_users`),
  ADD UNIQUE KEY `username` (`username`),
  ADD KEY `role_id` (`role_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `citizen_data`
--
ALTER TABLE `citizen_data`
  MODIFY `id_citizen_data` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `downloads`
--
ALTER TABLE `downloads`
  MODIFY `id_download` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `employee_data`
--
ALTER TABLE `employee_data`
  MODIFY `id_employee` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `file_manager`
--
ALTER TABLE `file_manager`
  MODIFY `id_file_manager` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `file_requirements`
--
ALTER TABLE `file_requirements`
  MODIFY `id_file_requietmens` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `file_status`
--
ALTER TABLE `file_status`
  MODIFY `id_status` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `log_file_submision`
--
ALTER TABLE `log_file_submision`
  MODIFY `id_log_file` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `log_message`
--
ALTER TABLE `log_message`
  MODIFY `id_log_message` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=70;

--
-- AUTO_INCREMENT for table `marriage_data`
--
ALTER TABLE `marriage_data`
  MODIFY `id_marriage_data` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `parent_data`
--
ALTER TABLE `parent_data`
  MODIFY `id_parent_data` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `request_signature_lurah`
--
ALTER TABLE `request_signature_lurah`
  MODIFY `id_request` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `role`
--
ALTER TABLE `role`
  MODIFY `id_role` int NOT NULL AUTO_INCREMENT COMMENT 'id akses users', AUTO_INCREMENT=1114;

--
-- AUTO_INCREMENT for table `signature_lurah`
--
ALTER TABLE `signature_lurah`
  MODIFY `id_sig` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id_users` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `employee_data`
--
ALTER TABLE `employee_data`
  ADD CONSTRAINT `employee_data_ibfk_1` FOREIGN KEY (`users_id`) REFERENCES `users` (`id_users`) ON DELETE CASCADE;

--
-- Constraints for table `file_requirements`
--
ALTER TABLE `file_requirements`
  ADD CONSTRAINT `file_requirements_ibfk_1` FOREIGN KEY (`service_categori_id`) REFERENCES `service_categories` (`id_service_categori`) ON DELETE CASCADE;

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`role_id`) REFERENCES `role` (`id_role`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
