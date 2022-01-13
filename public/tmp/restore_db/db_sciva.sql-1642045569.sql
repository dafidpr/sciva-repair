-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 12, 2022 at 07:11 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_sciva`
--

-- --------------------------------------------------------

--
-- Table structure for table `cashes`
--

CREATE TABLE `cashes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `cash_code` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date` date DEFAULT NULL,
  `nominal` decimal(10,2) NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `source` enum('income','expenditure') COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `commisions`
--

CREATE TABLE `commisions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `servis_id` bigint(20) UNSIGNED NOT NULL,
  `total` decimal(10,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `company_profiles`
--

CREATE TABLE `company_profiles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `telephone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fax` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `instagram` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `logo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `company_profiles`
--

INSERT INTO `company_profiles` (`id`, `name`, `address`, `telephone`, `fax`, `email`, `instagram`, `logo`, `created_at`, `updated_at`) VALUES
(1, 'SCIVA REPAIRE CENTER', 'JL.OKE', '081123123', '(0333) 000', 'SCIVA@GMAIL.COM', '@SCIVA', '84140967-simple-repair-service-logo-like-clock-vector-illustration-.jpg-1638213108.jpg', '2022-01-12 14:34:47', '2022-01-12 14:34:47');

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `telephone` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` enum('umum','member') COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `name`, `telephone`, `address`, `password`, `type`, `created_at`, `updated_at`) VALUES
(1, 'umum', '00', 'umum', '$2y$10$8vCgUIwfYt2FLCUvukQQUOgDs9wXFIMUis8vhGMTw4..KZkzO0v1u', 'umum', '2022-01-12 14:34:47', '2022-01-12 14:34:47'),
(2, 'pelanggan', '080123456789', 'Jawa Timur', '$2y$10$OKbknwnpYdX5.HS8..zTIuPP3CTJ0YcmSRa7lRPV7RLUpkLz0/aga', 'member', '2022-01-12 14:34:47', '2022-01-12 14:34:47'),
(3, 'pelanggan2', '082123456789', 'Jawa Barat', '$2y$10$KsAWW0sR7iiKSIk3j1Q0vuJeoaImAbkb//pxWLne/nPg7K0yVPe3y', 'umum', '2022-01-12 14:34:47', '2022-01-12 14:34:47'),
(4, 'pelanggan', '083123456789', 'Jawa Tengah', '$2y$10$LZ4Cppqrc5rZIPizLikNzOHgQisxQXpGNCsFGZbV9/tSKd7KuiVV.', 'umum', '2022-01-12 14:34:47', '2022-01-12 14:34:47');

-- --------------------------------------------------------

--
-- Table structure for table `debts`
--

CREATE TABLE `debts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `purchase_id` bigint(20) UNSIGNED NOT NULL,
  `total` decimal(10,2) NOT NULL,
  `payment` decimal(10,2) NOT NULL,
  `remainder` decimal(10,2) NOT NULL,
  `debt_date` date DEFAULT NULL,
  `due_date` date DEFAULT NULL,
  `status` enum('paid_off','not yet paid') COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `debt_details`
--

CREATE TABLE `debt_details` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `debt_id` bigint(20) UNSIGNED NOT NULL,
  `payment_date` date DEFAULT NULL,
  `nominal` decimal(10,2) NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
(3, '2018_09_12_99999_create_backupverify_table', 1),
(4, '2019_08_19_000000_create_failed_jobs_table', 1),
(5, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(6, '2021_11_03_001318_create_customers_table', 1),
(7, '2021_11_03_002320_create_products_table', 1),
(8, '2021_11_03_002406_create_suppliers_table', 1),
(9, '2021_11_03_002456_create_purchases_table', 1),
(10, '2021_11_03_002701_create_repaire_services_table', 1),
(11, '2021_11_03_002752_create_stocks_table', 1),
(12, '2021_11_03_011021_create_sales_table', 1),
(13, '2021_11_03_011511_create_receivables_table', 1),
(14, '2021_11_03_112022_create_receivable_details_table', 1),
(15, '2021_11_03_112208_create_sale_details_table', 1),
(16, '2021_11_03_112309_create_purchase_details_table', 1),
(17, '2021_11_03_112351_create_debts_table', 1),
(18, '2021_11_03_112418_create_debt_details_table', 1),
(19, '2021_11_03_112530_create_stock_opnames_table', 1),
(20, '2021_11_03_112608_create_transaction_services_table', 1),
(21, '2021_11_03_112659_create_transaction_service_details_table', 1),
(22, '2021_11_03_112739_create_vat_taxes_table', 1),
(23, '2021_11_03_112814_create_company_profiles_table', 1),
(24, '2021_11_03_112844_create_settings_table', 1),
(25, '2021_11_03_115021_create_cashes_table', 1),
(26, '2021_11_04_162150_add_supplier_id_to_products', 1),
(27, '2021_11_06_062432_create_permission_tables', 1),
(28, '2021_12_15_150724_add_service_id_to_receivables', 1),
(29, '2021_12_24_013604_create_commisions_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `model_has_permissions`
--

CREATE TABLE `model_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `model_has_roles`
--

CREATE TABLE `model_has_roles` (
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `model_has_roles`
--

INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES
(1, 'App\\Models\\User', 1),
(2, 'App\\Models\\User', 2),
(3, 'App\\Models\\User', 3);

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
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'read-services', 'web', NULL, NULL),
(2, 'create-services', 'web', NULL, NULL),
(3, 'update-services', 'web', NULL, NULL),
(4, 'delete-services', 'web', NULL, NULL),
(5, 'detail-services', 'web', NULL, NULL),
(6, 'restore-services', 'web', NULL, NULL),
(7, 'print-nota-services', 'web', NULL, NULL),
(8, 'take-services', 'web', NULL, NULL),
(9, 'call-services', 'web', NULL, NULL),
(10, 'read-products', 'web', NULL, NULL),
(11, 'create-products', 'web', NULL, NULL),
(12, 'update-products', 'web', NULL, NULL),
(13, 'delete-products', 'web', NULL, NULL),
(14, 'read-users', 'web', NULL, NULL),
(15, 'create-users', 'web', NULL, NULL),
(16, 'update-users', 'web', NULL, NULL),
(17, 'delete-users', 'web', NULL, NULL),
(18, 'read-roles', 'web', NULL, NULL),
(19, 'create-roles', 'web', NULL, NULL),
(20, 'update-roles', 'web', NULL, NULL),
(21, 'delete-roles', 'web', NULL, NULL),
(22, 'change-permissions', 'web', NULL, NULL),
(23, 'read-repaire', 'web', NULL, NULL),
(24, 'create-repaire', 'web', NULL, NULL),
(25, 'update-repaire', 'web', NULL, NULL),
(26, 'delete-repaire', 'web', NULL, NULL),
(27, 'read-customers', 'web', NULL, NULL),
(28, 'create-customers', 'web', NULL, NULL),
(29, 'update-customers', 'web', NULL, NULL),
(30, 'delete-customers', 'web', NULL, NULL),
(31, 'read-suppliers', 'web', NULL, NULL),
(32, 'create-suppliers', 'web', NULL, NULL),
(33, 'update-suppliers', 'web', NULL, NULL),
(34, 'delete-suppliers', 'web', NULL, NULL),
(35, 'read-opnames', 'web', NULL, NULL),
(36, 'create-opnames', 'web', NULL, NULL),
(37, 'update-opnames', 'web', NULL, NULL),
(38, 'delete-opnames', 'web', NULL, NULL),
(39, 'read-stocks', 'web', NULL, NULL),
(40, 'create-stocks', 'web', NULL, NULL),
(41, 'delete-stocks', 'web', NULL, NULL),
(42, 'read-sales', 'web', NULL, NULL),
(43, 'create-sales', 'web', NULL, NULL),
(44, 'detail-sales', 'web', NULL, NULL),
(45, 'print-sales', 'web', NULL, NULL),
(46, 'read-purchases', 'web', NULL, NULL),
(47, 'create-purchases', 'web', NULL, NULL),
(48, 'detail-purchases', 'web', NULL, NULL),
(49, 'read-debt', 'web', NULL, NULL),
(50, 'payment-debt', 'web', NULL, NULL),
(51, 'detail-debt', 'web', NULL, NULL),
(52, 'delete-debt', 'web', NULL, NULL),
(53, 'read-receivable', 'web', NULL, NULL),
(54, 'payment-receivable', 'web', NULL, NULL),
(55, 'detail-receivable', 'web', NULL, NULL),
(56, 'delete-receivable', 'web', NULL, NULL),
(57, 'read-cash', 'web', NULL, NULL),
(58, 'create-cash', 'web', NULL, NULL),
(59, 'delete-cash', 'web', NULL, NULL),
(60, 'read-ppn', 'web', NULL, NULL),
(61, 'create-ppn', 'web', NULL, NULL),
(62, 'delete-ppn', 'web', NULL, NULL),
(63, 'report-daily-journal', 'web', NULL, NULL),
(64, 'report-sales', 'web', NULL, NULL),
(65, 'report-purchases', 'web', NULL, NULL),
(66, 'report-opnames', 'web', NULL, NULL),
(67, 'report-stock-in-out', 'web', NULL, NULL),
(68, 'report-cash', 'web', NULL, NULL),
(69, 'report-debts-receivables', 'web', NULL, NULL),
(70, 'report-profit', 'web', NULL, NULL),
(71, 'read-grafik', 'web', NULL, NULL),
(72, 'commission-users', 'web', NULL, NULL),
(73, 'generate-barcode-tools', 'web', NULL, NULL),
(74, 'backup-tools', 'web', NULL, NULL),
(75, 'delete-servis-tools', 'web', NULL, NULL),
(76, 'delete-transaction-tools', 'web', NULL, NULL),
(77, 'footerNota-settings', 'web', NULL, NULL),
(78, 'formatWA-settings', 'web', NULL, NULL),
(79, 'formatSMS-settings', 'web', NULL, NULL),
(80, 'daylimit-settings', 'web', NULL, NULL),
(81, 'profile-settings', 'web', NULL, NULL);

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
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `barcode` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `selling_price` decimal(8,2) NOT NULL,
  `purchase_price` decimal(8,2) NOT NULL,
  `member_price` decimal(8,2) NOT NULL,
  `stock` int(11) NOT NULL,
  `limit` int(11) NOT NULL,
  `supplier_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `barcode`, `name`, `selling_price`, `purchase_price`, `member_price`, `stock`, `limit`, `supplier_id`, `created_at`, `updated_at`) VALUES
(1, '0000123456', 'battery', '50000.00', '45000.00', '43000.00', 10, 5, 1, '2022-01-12 14:34:47', '2022-01-12 14:34:47'),
(2, '000021234', 'case A', '50000.00', '45000.00', '43000.00', 10, 5, 2, '2022-01-12 14:34:47', '2022-01-12 14:34:47'),
(3, '0000312345', 'case B', '50000.00', '45000.00', '43000.00', 10, 5, 1, '2022-01-12 14:34:47', '2022-01-12 14:34:47'),
(4, '0000412345', 'TouchScreen', '150000.00', '100000.00', '130000.00', 10, 5, 1, '2022-01-12 14:34:47', '2022-01-12 14:34:47'),
(5, '00005123456', 'earphone', '40000.00', '30000.00', '35000.00', 10, 5, 1, '2022-01-12 14:34:47', '2022-01-12 14:34:47'),
(6, '00006123456', 'Charger', '30000.00', '25000.00', '27000.00', 5, 5, 1, '2022-01-12 14:34:47', '2022-01-12 14:34:47');

-- --------------------------------------------------------

--
-- Table structure for table `purchases`
--

CREATE TABLE `purchases` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `invoice` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `supplier_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `discount` decimal(10,2) NOT NULL,
  `total` decimal(10,2) NOT NULL,
  `method` enum('cash','credit') COLLATE utf8mb4_unicode_ci NOT NULL,
  `payment` decimal(10,2) NOT NULL,
  `cashback` decimal(10,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `purchases`
--

INSERT INTO `purchases` (`id`, `invoice`, `supplier_id`, `user_id`, `discount`, `total`, `method`, `payment`, `cashback`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'PB202010210001', 1, 2, '0.00', '100000.00', 'cash', '100000.00', '0.00', '2022-01-12 14:34:47', '2022-01-12 14:34:47', NULL),
(2, 'PB202010210002', 2, 2, '0.00', '100000.00', 'cash', '100000.00', '0.00', '2022-01-12 14:34:47', '2022-01-12 14:34:47', NULL),
(3, 'PB202010210003', 1, 3, '0.00', '100000.00', 'cash', '100000.00', '0.00', '2022-01-12 14:34:47', '2022-01-12 14:34:47', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `purchase_details`
--

CREATE TABLE `purchase_details` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `purchase_id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `selling_price` decimal(10,2) NOT NULL,
  `purchase_price` decimal(10,2) NOT NULL,
  `quantity` int(11) NOT NULL,
  `sub_total` decimal(10,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `receivables`
--

CREATE TABLE `receivables` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `sale_id` bigint(20) UNSIGNED DEFAULT NULL,
  `service_id` bigint(20) UNSIGNED DEFAULT NULL,
  `receivable_date` date NOT NULL,
  `total` decimal(8,2) NOT NULL,
  `payment` decimal(8,2) NOT NULL,
  `remainder` decimal(8,2) NOT NULL,
  `due_date` date NOT NULL,
  `status` enum('paid off','not yet paid') COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `receivable_details`
--

CREATE TABLE `receivable_details` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `receivable_id` bigint(20) UNSIGNED NOT NULL,
  `payment_date` date DEFAULT NULL,
  `nominal` decimal(8,2) NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `repaire_services`
--

CREATE TABLE `repaire_services` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `repaire_code` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` decimal(8,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `repaire_services`
--

INSERT INTO `repaire_services` (`id`, `repaire_code`, `name`, `price`, `created_at`, `updated_at`) VALUES
(1, 'JS00001', 'service 10K', '10000.00', '2022-01-12 14:34:47', '2022-01-12 14:34:47'),
(2, 'JS00002', 'service 15K', '15000.00', '2022-01-12 14:34:47', '2022-01-12 14:34:47'),
(3, 'JS00003', 'service 20K', '20000.00', '2022-01-12 14:34:47', '2022-01-12 14:34:47');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'developer', 'web', '2022-01-12 14:34:45', '2022-01-12 14:34:45'),
(2, 'admin', 'web', '2022-01-12 14:34:45', '2022-01-12 14:34:45'),
(3, 'kasir', 'web', '2022-01-12 14:34:45', '2022-01-12 14:34:45');

-- --------------------------------------------------------

--
-- Table structure for table `role_has_permissions`
--

CREATE TABLE `role_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `role_has_permissions`
--

INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES
(1, 1),
(1, 2),
(2, 1),
(2, 2),
(3, 1),
(3, 2),
(4, 1),
(4, 2),
(5, 1),
(5, 2),
(6, 1),
(6, 2),
(7, 1),
(7, 2),
(8, 1),
(8, 2),
(9, 1),
(9, 2),
(10, 1),
(10, 2),
(10, 3),
(11, 1),
(11, 2),
(12, 1),
(12, 2),
(13, 1),
(13, 2),
(14, 1),
(14, 2),
(15, 1),
(15, 2),
(16, 1),
(16, 2),
(17, 1),
(17, 2),
(18, 1),
(18, 2),
(19, 1),
(19, 2),
(20, 1),
(20, 2),
(21, 1),
(21, 2),
(22, 1),
(22, 2),
(23, 1),
(23, 2),
(24, 1),
(24, 2),
(25, 1),
(25, 2),
(26, 1),
(26, 2),
(27, 1),
(27, 2),
(28, 1),
(28, 2),
(29, 1),
(29, 2),
(30, 1),
(30, 2),
(31, 1),
(31, 2),
(32, 1),
(32, 2),
(33, 1),
(33, 2),
(34, 1),
(34, 2),
(35, 1),
(35, 2),
(36, 1),
(36, 2),
(37, 1),
(37, 2),
(38, 1),
(38, 2),
(39, 1),
(39, 2),
(40, 1),
(40, 2),
(41, 1),
(41, 2),
(42, 1),
(42, 2),
(43, 1),
(43, 2),
(44, 1),
(44, 2),
(45, 1),
(45, 2),
(46, 1),
(46, 2),
(47, 1),
(47, 2),
(48, 1),
(48, 2),
(49, 1),
(49, 2),
(50, 1),
(50, 2),
(51, 1),
(51, 2),
(52, 1),
(52, 2),
(53, 1),
(53, 2),
(54, 1),
(54, 2),
(55, 1),
(55, 2),
(56, 1),
(56, 2),
(57, 1),
(57, 2),
(58, 1),
(58, 2),
(59, 1),
(59, 2),
(60, 1),
(60, 2),
(61, 1),
(61, 2),
(62, 1),
(62, 2),
(63, 1),
(63, 2),
(64, 1),
(64, 2),
(65, 1),
(65, 2),
(66, 1),
(66, 2),
(67, 1),
(67, 2),
(68, 1),
(68, 2),
(69, 1),
(69, 2),
(70, 1),
(70, 2),
(71, 1),
(71, 2),
(72, 1),
(72, 2),
(73, 1),
(73, 2),
(74, 1),
(74, 2),
(75, 1),
(75, 2),
(76, 1),
(76, 2),
(77, 1),
(77, 2),
(78, 1),
(78, 2),
(79, 1),
(79, 2),
(80, 1),
(80, 2),
(81, 1),
(81, 2);

-- --------------------------------------------------------

--
-- Table structure for table `sales`
--

CREATE TABLE `sales` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `customer_id` bigint(20) UNSIGNED NOT NULL,
  `invoice` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `method` enum('cash','credit') COLLATE utf8mb4_unicode_ci NOT NULL,
  `total` decimal(10,2) DEFAULT NULL,
  `payment` decimal(10,2) DEFAULT NULL,
  `cashback` decimal(10,2) DEFAULT NULL,
  `vat_tax` decimal(10,2) DEFAULT NULL,
  `discount` decimal(10,2) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sales`
--

INSERT INTO `sales` (`id`, `user_id`, `customer_id`, `invoice`, `method`, `total`, `payment`, `cashback`, `vat_tax`, `discount`, `date`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 2, 1, 'POS202002110001', 'cash', '10000.00', '10000.00', '0.00', '0.00', '0.00', '2022-01-12', '2022-01-12 14:34:47', '2022-01-12 14:34:47', NULL),
(2, 2, 2, 'POS202002110002', 'cash', '10000.00', '10000.00', '0.00', '0.00', '0.00', '2022-01-12', '2022-01-12 14:34:47', '2022-01-12 14:34:47', NULL),
(3, 3, 3, 'POS202002110003', 'cash', '10000.00', '10000.00', '0.00', '0.00', '0.00', '2022-01-12', '2022-01-12 14:34:47', '2022-01-12 14:34:47', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `sale_details`
--

CREATE TABLE `sale_details` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `sale_id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `discount` decimal(10,2) NOT NULL,
  `total` decimal(10,2) NOT NULL,
  `quantity` int(11) NOT NULL,
  `sub_total` decimal(10,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `groups` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `options` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `label` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `groups`, `options`, `label`, `value`, `created_at`, `updated_at`) VALUES
(1, 'footer', 'footer_nota_sale', 'footer_nota', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.', '2022-01-12 14:34:47', '2022-01-12 14:34:47'),
(2, 'footer', 'footer_nota_servis', 'footer_nota', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.', '2022-01-12 14:34:47', '2022-01-12 14:34:47'),
(3, 'footer', 'footer_nota_servis_take', 'footer_nota', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.', '2022-01-12 14:34:47', '2022-01-12 14:34:47'),
(4, 'format', 'format_sms', 'format_text', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.', '2022-01-12 14:34:47', '2022-01-12 14:34:47'),
(5, 'format', 'format_wa', 'footer_text', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.', '2022-01-12 14:34:47', '2022-01-12 14:34:47'),
(6, 'batas', 'batas_servis', 'servis', '10', '2022-01-12 14:34:47', '2022-01-12 14:34:47'),
(7, 'batas', 'batas_servis_type', 'servis', 'Hari', '2022-01-12 14:34:47', '2022-01-12 14:34:47');

-- --------------------------------------------------------

--
-- Table structure for table `stocks`
--

CREATE TABLE `stocks` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `total` int(11) NOT NULL,
  `value` decimal(8,2) NOT NULL,
  `type` enum('in','out') COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `stocks`
--

INSERT INTO `stocks` (`id`, `product_id`, `total`, `value`, `type`, `description`, `created_at`, `updated_at`) VALUES
(1, 3, 5, '100000.00', 'in', 'oke', '2022-01-12 14:34:47', '2022-01-12 14:34:47'),
(2, 1, 5, '100000.00', 'in', 'oke', '2022-01-12 14:34:47', '2022-01-12 14:34:47'),
(3, 2, 5, '100000.00', 'in', 'oke', '2022-01-12 14:34:47', '2022-01-12 14:34:47');

-- --------------------------------------------------------

--
-- Table structure for table `stock_opnames`
--

CREATE TABLE `stock_opnames` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `stock` int(11) NOT NULL,
  `real_stock` int(11) NOT NULL,
  `difference_stock` int(11) NOT NULL,
  `value` decimal(10,2) NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `stock_opnames`
--

INSERT INTO `stock_opnames` (`id`, `product_id`, `stock`, `real_stock`, `difference_stock`, `value`, `description`, `created_at`, `updated_at`) VALUES
(1, 1, 5, 5, 0, '1.00', 'oke', '2022-01-12 14:34:47', '2022-01-12 14:34:47'),
(2, 2, 5, 5, 0, '1.00', 'oke', '2022-01-12 14:34:47', '2022-01-12 14:34:47'),
(3, 1, 15, 5, 0, '1.00', 'oke', '2022-01-12 14:34:47', '2022-01-12 14:34:47');

-- --------------------------------------------------------

--
-- Table structure for table `suppliers`
--

CREATE TABLE `suppliers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `supplier_code` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `telephone` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bank` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `account_number` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bank_account_name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `suppliers`
--

INSERT INTO `suppliers` (`id`, `supplier_code`, `name`, `telephone`, `bank`, `account_number`, `bank_account_name`, `address`, `created_at`, `updated_at`) VALUES
(1, 'SPL00001', 'CV Putra Mas', '0851234567892', 'bni', '123443000', 'Putra mas', 'Kitabalu', '2022-01-12 14:34:47', '2022-01-12 14:34:47'),
(2, 'SPL00002', 'CV Angkasa Mas', '0851234567891', 'bni', '123443002', 'angkasa', 'Jakarta barat', '2022-01-12 14:34:47', '2022-01-12 14:34:47'),
(3, 'SPL00003', 'CV Merpati', '0851234567890', 'bni', '123443003', 'merpati', 'Surabaya', '2022-01-12 14:34:47', '2022-01-12 14:34:47');

-- --------------------------------------------------------

--
-- Table structure for table `transaction_services`
--

CREATE TABLE `transaction_services` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `customer_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `transaction_code` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `unit` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `serial_number` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `complient` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `completenes` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `passcode` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `notes` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `service_date` date DEFAULT NULL,
  `estimated_cost` decimal(10,2) NOT NULL,
  `pickup_date` date DEFAULT NULL,
  `payment_method` enum('cash','credit') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payment` decimal(10,2) DEFAULT NULL,
  `discount` decimal(10,2) DEFAULT NULL,
  `cashback` decimal(10,2) DEFAULT NULL,
  `total` decimal(8,2) DEFAULT NULL,
  `status` enum('proses','waiting sparepart','finished','cancelled','take') COLLATE utf8mb4_unicode_ci NOT NULL,
  `technician` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `transaction_services`
--

INSERT INTO `transaction_services` (`id`, `customer_id`, `user_id`, `transaction_code`, `unit`, `serial_number`, `complient`, `completenes`, `passcode`, `notes`, `service_date`, `estimated_cost`, `pickup_date`, `payment_method`, `payment`, `discount`, `cashback`, `total`, `status`, `technician`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 2, 'SRV202109100001', 'samsung A1', '1', 'battery Low', 'Handphone & charger', '12ok', 'Oke', '2022-01-12', '200000.00', NULL, NULL, NULL, NULL, NULL, NULL, 'proses', NULL, '2022-01-12 14:34:47', '2022-01-12 14:34:47', NULL),
(2, 1, 1, 'SRV202109100002', 'samsung C1', '2', 'battery Low', 'Handphone & charger', '12ok', 'Oke', '2022-01-12', '200000.00', '2021-11-20', 'cash', '200000.00', NULL, '0.00', NULL, 'proses', NULL, '2022-01-12 14:34:47', '2022-01-12 14:34:47', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `transaction_service_details`
--

CREATE TABLE `transaction_service_details` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `transaction_id` bigint(20) UNSIGNED NOT NULL,
  `repaire_id` bigint(20) UNSIGNED DEFAULT NULL,
  `sparepart_id` bigint(20) UNSIGNED DEFAULT NULL,
  `total` decimal(10,2) DEFAULT NULL,
  `qty` int(11) DEFAULT NULL,
  `discount` decimal(10,2) DEFAULT NULL,
  `sub_total` decimal(10,2) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `telephone` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `commission` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `login_at` timestamp NULL DEFAULT NULL,
  `logout_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `telephone`, `address`, `username`, `password`, `commission`, `login_at`, `logout_at`, `created_at`, `updated_at`) VALUES
(1, 'developer', '00000000', 'Banyuwangi', 'root', '$2y$10$5cSxpWulESxpeRPFw5VYVex4ntmLX5jkoB4LfLhYW2epBB6OIJIJq', '10', NULL, NULL, '2022-01-12 14:34:47', '2022-01-12 14:34:47'),
(2, 'admin', '081234123123', 'Banyuwangi', 'admin', '$2y$10$gB0jmeF4jsHrN4MkhpF1fuzvrGxC1PJnNvFWw66fB4f6v1mKNQ3Ou', '10', NULL, NULL, '2022-01-12 14:34:47', '2022-01-12 14:34:47'),
(3, 'kasir', '081111111111', 'Banyuwangi', 'kasir', '$2y$10$deZB7.sSaiTxnA6aFLC0E.E3CNPWXtWjFkCcQT3I118qlPKtJnmBS', '10', NULL, NULL, '2022-01-12 14:34:47', '2022-01-12 14:34:47');

-- --------------------------------------------------------

--
-- Table structure for table `vat_taxes`
--

CREATE TABLE `vat_taxes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `tax_code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nominal` decimal(10,2) DEFAULT NULL,
  `type` enum('deposit','out','income') COLLATE utf8mb4_unicode_ci NOT NULL,
  `date` date DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `verifybackup`
--

CREATE TABLE `verifybackup` (
  `id` int(10) UNSIGNED NOT NULL,
  `verify_status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `verifybackup`
--

INSERT INTO `verifybackup` (`id`, `verify_status`) VALUES
(1, 'backup');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cashes`
--
ALTER TABLE `cashes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cashes_user_id_foreign` (`user_id`);

--
-- Indexes for table `commisions`
--
ALTER TABLE `commisions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `commisions_user_id_foreign` (`user_id`),
  ADD KEY `commisions_servis_id_foreign` (`servis_id`);

--
-- Indexes for table `company_profiles`
--
ALTER TABLE `company_profiles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `customers_telephone_unique` (`telephone`);

--
-- Indexes for table `debts`
--
ALTER TABLE `debts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `debts_purchase_id_foreign` (`purchase_id`);

--
-- Indexes for table `debt_details`
--
ALTER TABLE `debt_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `debt_details_debt_id_foreign` (`debt_id`),
  ADD KEY `debt_details_user_id_foreign` (`user_id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  ADD KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  ADD KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `permissions_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `products_supplier_id_foreign` (`supplier_id`);

--
-- Indexes for table `purchases`
--
ALTER TABLE `purchases`
  ADD PRIMARY KEY (`id`),
  ADD KEY `purchases_supplier_id_foreign` (`supplier_id`),
  ADD KEY `purchases_user_id_foreign` (`user_id`);

--
-- Indexes for table `purchase_details`
--
ALTER TABLE `purchase_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `purchase_details_purchase_id_foreign` (`purchase_id`),
  ADD KEY `purchase_details_product_id_foreign` (`product_id`);

--
-- Indexes for table `receivables`
--
ALTER TABLE `receivables`
  ADD PRIMARY KEY (`id`),
  ADD KEY `receivables_sale_id_foreign` (`sale_id`),
  ADD KEY `receivables_service_id_foreign` (`service_id`);

--
-- Indexes for table `receivable_details`
--
ALTER TABLE `receivable_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `receivable_details_receivable_id_foreign` (`receivable_id`),
  ADD KEY `receivable_details_user_id_foreign` (`user_id`);

--
-- Indexes for table `repaire_services`
--
ALTER TABLE `repaire_services`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indexes for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `role_has_permissions_role_id_foreign` (`role_id`);

--
-- Indexes for table `sales`
--
ALTER TABLE `sales`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sales_user_id_foreign` (`user_id`),
  ADD KEY `sales_customer_id_foreign` (`customer_id`);

--
-- Indexes for table `sale_details`
--
ALTER TABLE `sale_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sale_details_sale_id_foreign` (`sale_id`),
  ADD KEY `sale_details_product_id_foreign` (`product_id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `stocks`
--
ALTER TABLE `stocks`
  ADD PRIMARY KEY (`id`),
  ADD KEY `stocks_product_id_foreign` (`product_id`);

--
-- Indexes for table `stock_opnames`
--
ALTER TABLE `stock_opnames`
  ADD PRIMARY KEY (`id`),
  ADD KEY `stock_opnames_product_id_foreign` (`product_id`);

--
-- Indexes for table `suppliers`
--
ALTER TABLE `suppliers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transaction_services`
--
ALTER TABLE `transaction_services`
  ADD PRIMARY KEY (`id`),
  ADD KEY `transaction_services_customer_id_foreign` (`customer_id`),
  ADD KEY `transaction_services_user_id_foreign` (`user_id`),
  ADD KEY `transaction_services_technician_foreign` (`technician`);

--
-- Indexes for table `transaction_service_details`
--
ALTER TABLE `transaction_service_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `transaction_service_details_transaction_id_foreign` (`transaction_id`),
  ADD KEY `transaction_service_details_repaire_id_foreign` (`repaire_id`),
  ADD KEY `transaction_service_details_sparepart_id_foreign` (`sparepart_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_telephone_unique` (`telephone`),
  ADD UNIQUE KEY `users_username_unique` (`username`);

--
-- Indexes for table `vat_taxes`
--
ALTER TABLE `vat_taxes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `vat_taxes_user_id_foreign` (`user_id`);

--
-- Indexes for table `verifybackup`
--
ALTER TABLE `verifybackup`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cashes`
--
ALTER TABLE `cashes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `commisions`
--
ALTER TABLE `commisions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `company_profiles`
--
ALTER TABLE `company_profiles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `debts`
--
ALTER TABLE `debts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `debt_details`
--
ALTER TABLE `debt_details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=82;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `purchases`
--
ALTER TABLE `purchases`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `purchase_details`
--
ALTER TABLE `purchase_details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `receivables`
--
ALTER TABLE `receivables`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `receivable_details`
--
ALTER TABLE `receivable_details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `repaire_services`
--
ALTER TABLE `repaire_services`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `sales`
--
ALTER TABLE `sales`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `sale_details`
--
ALTER TABLE `sale_details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `stocks`
--
ALTER TABLE `stocks`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `stock_opnames`
--
ALTER TABLE `stock_opnames`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `suppliers`
--
ALTER TABLE `suppliers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `transaction_services`
--
ALTER TABLE `transaction_services`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `transaction_service_details`
--
ALTER TABLE `transaction_service_details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `vat_taxes`
--
ALTER TABLE `vat_taxes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `verifybackup`
--
ALTER TABLE `verifybackup`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cashes`
--
ALTER TABLE `cashes`
  ADD CONSTRAINT `cashes_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `commisions`
--
ALTER TABLE `commisions`
  ADD CONSTRAINT `commisions_servis_id_foreign` FOREIGN KEY (`servis_id`) REFERENCES `transaction_services` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `commisions_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `debts`
--
ALTER TABLE `debts`
  ADD CONSTRAINT `debts_purchase_id_foreign` FOREIGN KEY (`purchase_id`) REFERENCES `purchases` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `debt_details`
--
ALTER TABLE `debt_details`
  ADD CONSTRAINT `debt_details_debt_id_foreign` FOREIGN KEY (`debt_id`) REFERENCES `debts` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `debt_details_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_supplier_id_foreign` FOREIGN KEY (`supplier_id`) REFERENCES `suppliers` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `purchases`
--
ALTER TABLE `purchases`
  ADD CONSTRAINT `purchases_supplier_id_foreign` FOREIGN KEY (`supplier_id`) REFERENCES `suppliers` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `purchases_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `purchase_details`
--
ALTER TABLE `purchase_details`
  ADD CONSTRAINT `purchase_details_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `purchase_details_purchase_id_foreign` FOREIGN KEY (`purchase_id`) REFERENCES `purchases` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `receivables`
--
ALTER TABLE `receivables`
  ADD CONSTRAINT `receivables_sale_id_foreign` FOREIGN KEY (`sale_id`) REFERENCES `sales` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `receivables_service_id_foreign` FOREIGN KEY (`service_id`) REFERENCES `transaction_services` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `receivable_details`
--
ALTER TABLE `receivable_details`
  ADD CONSTRAINT `receivable_details_receivable_id_foreign` FOREIGN KEY (`receivable_id`) REFERENCES `receivables` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `receivable_details_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `sales`
--
ALTER TABLE `sales`
  ADD CONSTRAINT `sales_customer_id_foreign` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `sales_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `sale_details`
--
ALTER TABLE `sale_details`
  ADD CONSTRAINT `sale_details_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `sale_details_sale_id_foreign` FOREIGN KEY (`sale_id`) REFERENCES `sales` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `stocks`
--
ALTER TABLE `stocks`
  ADD CONSTRAINT `stocks_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `stock_opnames`
--
ALTER TABLE `stock_opnames`
  ADD CONSTRAINT `stock_opnames_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `transaction_services`
--
ALTER TABLE `transaction_services`
  ADD CONSTRAINT `transaction_services_customer_id_foreign` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `transaction_services_technician_foreign` FOREIGN KEY (`technician`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `transaction_services_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `transaction_service_details`
--
ALTER TABLE `transaction_service_details`
  ADD CONSTRAINT `transaction_service_details_repaire_id_foreign` FOREIGN KEY (`repaire_id`) REFERENCES `repaire_services` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `transaction_service_details_sparepart_id_foreign` FOREIGN KEY (`sparepart_id`) REFERENCES `products` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `transaction_service_details_transaction_id_foreign` FOREIGN KEY (`transaction_id`) REFERENCES `transaction_services` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `vat_taxes`
--
ALTER TABLE `vat_taxes`
  ADD CONSTRAINT `vat_taxes_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
