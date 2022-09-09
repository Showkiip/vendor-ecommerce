-- phpMyAdmin SQL Dump
-- version 4.9.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Apr 18, 2021 at 10:27 PM
-- Server version: 5.6.49-cll-lve
-- PHP Version: 7.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `thearomabakers`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `active` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `active`, `created_at`, `updated_at`) VALUES
(1, 'Cafe', '0', '2021-03-25 10:20:38', NULL),
(2, 'Bakers', '0', '2021-04-02 17:25:11', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `drafts`
--

CREATE TABLE `drafts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `grand_total` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `products` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `drafts`
--

INSERT INTO `drafts` (`id`, `grand_total`, `products`, `user_id`, `created_at`, `updated_at`) VALUES
(1, '629.2', '{\"2\":{\"id\":2,\"name\":\"Biscuit\",\"price\":20,\"quantity\":2,\"discount\":\"6\",\"attributes\":[],\"conditions\":[]},\"3\":{\"id\":3,\"name\":\"Pepsi\",\"price\":110,\"quantity\":1,\"discount\":\"4\",\"attributes\":[],\"conditions\":[]},\"1\":{\"id\":1,\"name\":\"Sweet\",\"price\":540,\"quantity\":1,\"discount\":\"10\",\"attributes\":[],\"conditions\":[]}}', '0', '2021-04-02 17:51:05', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `expenses`
--

CREATE TABLE `expenses` (
  `id` int(20) NOT NULL,
  `amount` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `expensetype_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `expenses`
--

INSERT INTO `expenses` (`id`, `amount`, `expensetype_id`, `user_id`, `description`, `created_at`, `updated_at`) VALUES
(1, '20000', 1, 1, 'Rent paid', '2021-04-01 01:42:39', NULL),
(2, '2000', 2, 1, 'Bill paid', '2021-04-01 01:42:39', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `expensetypes`
--

CREATE TABLE `expensetypes` (
  `id` int(20) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `active` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `expensetypes`
--

INSERT INTO `expensetypes` (`id`, `name`, `active`, `created_at`, `updated_at`) VALUES
(1, 'Rent', '0', NULL, NULL),
(2, 'Bill', '0', NULL, NULL);

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Table structure for table `kitchens`
--

CREATE TABLE `kitchens` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type_id` int(10) UNSIGNED NOT NULL,
  `quantity` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `kitchens`
--

INSERT INTO `kitchens` (`id`, `name`, `type_id`, `quantity`, `created_at`, `updated_at`) VALUES
(1, 'kainat', 1, 'cotton|100', '2021-04-01 02:06:30', '2021-04-01 02:06:30'),
(2, 'maida', 2, 'cotton|50', '2021-04-02 18:06:50', '2021-04-02 18:06:50'),
(3, 'hwllp', 2, 'kg|2', '2021-04-02 18:19:41', '2021-04-02 18:19:41'),
(4, 'hwllp', 2, 'kg|sd', '2021-04-02 18:21:17', '2021-04-05 13:35:15'),
(5, 'hwllp', 2, 'kg|2', '2021-04-02 18:22:09', '2021-04-02 18:22:09'),
(6, 'nehellp', 2, 'kg|2', '2021-04-02 18:23:28', '2021-04-02 18:23:28'),
(7, 'maida', 9, 'kg|20', '2021-04-02 18:25:06', '2021-04-02 18:25:06');

-- --------------------------------------------------------

--
-- Table structure for table `kitchen_types`
--

CREATE TABLE `kitchen_types` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `kitchen_types`
--

INSERT INTO `kitchen_types` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Test', '2021-04-01 03:14:23', '2021-04-01 03:14:37'),
(2, 'pizza', '2021-04-02 18:03:26', '2021-04-02 18:03:26'),
(3, 'bilawal kitchen', '2021-04-02 18:10:14', '2021-04-02 18:10:14'),
(4, 'MereKitchen', '2021-04-02 18:15:22', '2021-04-05 13:30:53'),
(5, 'bilawal kitchen', '2021-04-02 18:15:32', '2021-04-02 18:15:32'),
(6, 'bilawal kitchen', '2021-04-02 18:16:49', '2021-04-02 18:16:49'),
(7, 'bilawal kitchen', '2021-04-02 18:16:57', '2021-04-02 18:16:57'),
(8, 'bilawal kitchen', '2021-04-02 18:18:43', '2021-04-02 18:18:43'),
(9, 'juices', '2021-04-02 18:21:20', '2021-04-02 18:21:20');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2021_03_13_144156_create_permission_tables', 1),
(5, '2021_03_13_145224_create_categories_table', 1),
(6, '2021_03_13_145303_create_products_table', 1),
(7, '2021_03_13_145339_create_sales_table', 1),
(8, '2021_03_13_145625_create_product_sale_table', 1),
(9, '2021_03_13_145706_create_drafts_table', 1),
(10, '2021_03_13_160619_create_expensetypes_table', 1),
(11, '2021_03_13_160638_create_expenses_table', 1),
(51, '2014_10_12_000000_create_users_table', 1),
(52, '2014_10_12_100000_create_password_resets_table', 1),
(53, '2019_08_19_000000_create_failed_jobs_table', 1),
(54, '2021_03_13_144156_create_permission_tables', 1),
(55, '2021_03_13_145224_create_categories_table', 1),
(56, '2021_03_13_145303_create_products_table', 1),
(57, '2021_03_13_145339_create_sales_table', 1),
(58, '2021_03_13_145625_create_product_sale_table', 1),
(59, '2021_03_13_145706_create_drafts_table', 1),
(60, '2021_03_13_160619_create_expensetypes_table', 1),
(61, '2021_03_13_160638_create_expenses_table', 1),
(62, '2021_03_31_074909_create_kitchens_table', 1),
(63, '2021_03_31_075426_create_kitchen_types_table', 1),
(64, '2021_04_01_060215_create_raw_inventories_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `model_has_permissions`
--

CREATE TABLE `model_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Table structure for table `model_has_roles`
--

CREATE TABLE `model_has_roles` (
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `model_has_roles`
--

INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES
(1, 'App\\Models\\User', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` int(11) NOT NULL,
  `quantity` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `barcode` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `discount` int(11) DEFAULT NULL,
  `active` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `price`, `quantity`, `category_id`, `barcode`, `discount`, `active`, `created_at`, `updated_at`) VALUES
(1, 'Sweet', 540, '60', 1, '5205034008458', 10, '1', NULL, '2021-04-06 12:13:07'),
(2, 'Biscuit', 20, '74', 1, '2015300400007', 6, '1', NULL, '2021-04-06 12:13:07'),
(3, 'Pepsi', 110, '68', 1, '2011100277757', 4, '1', NULL, '2021-04-06 12:13:07'),
(4, 'Pizza', 899, '97', 2, '2012300357003', 2, '1', NULL, '2021-04-06 12:04:30'),
(5, 'Cake', 450, '97', 1, '2021210120003', 5, '1', NULL, '2021-04-06 12:04:30'),
(6, 'Burger', 250, '100', 2, '2013000000039', 3, '1', NULL, '2021-04-01 19:08:48'),
(7, 'Lays', 50, '200', 1, '5522', 2, '1', NULL, '2021-04-02 17:53:08'),
(8, 'pepsi500ml', 50, '39', 2, '012000801754', NULL, '1', NULL, '2021-04-06 12:10:19');

-- --------------------------------------------------------

--
-- Table structure for table `product_sale`
--

CREATE TABLE `product_sale` (
  `id` int(11) NOT NULL,
  `quantity` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Return_quantity` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sale_id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `product_sale`
--

INSERT INTO `product_sale` (`id`, `quantity`, `Return_quantity`, `sale_id`, `product_id`, `created_at`, `updated_at`) VALUES
(1, '2', NULL, 57, 3, NULL, NULL),
(2, '2', NULL, 57, 5, NULL, NULL),
(3, '3', NULL, 57, 2, NULL, NULL),
(4, '1', NULL, 57, 7, NULL, NULL),
(5, '1', NULL, 58, 4, NULL, NULL),
(6, '1', NULL, 59, 4, NULL, NULL),
(7, '1', '1', 1, 3, NULL, NULL),
(8, '2', '1', 1, 5, NULL, NULL),
(9, '1', '1', 1, 1, NULL, NULL),
(10, '2', '1', 1, 4, NULL, NULL),
(11, '2', '2', 2, 1, NULL, NULL),
(12, '2', '2', 2, 3, NULL, NULL),
(13, '1', NULL, 2, 2, NULL, NULL),
(14, '1', '1', 4, 1, NULL, NULL),
(15, '1', NULL, 4, 2, NULL, NULL),
(16, '1', NULL, 4, 4, NULL, NULL),
(17, '1', '1', 5, 2, NULL, NULL),
(18, '1', NULL, 5, 1, NULL, NULL),
(19, '1', NULL, 5, 5, NULL, NULL),
(20, '5', '4', 6, 8, NULL, NULL),
(21, '1', '1', 7, 1, NULL, NULL),
(22, '1', '1', 7, 3, NULL, NULL),
(23, '3', '3', 8, 1, NULL, NULL),
(24, '2', '2', 8, 2, NULL, NULL),
(25, '2', '2', 8, 3, NULL, NULL),
(26, '1', NULL, 9, 3, NULL, NULL),
(27, '1', NULL, 9, 2, NULL, NULL),
(28, '2', NULL, 9, 1, NULL, NULL),
(29, '4', '2', 10, 1, NULL, NULL),
(30, '4', '2', 10, 2, NULL, NULL),
(31, '5', '2', 10, 3, NULL, NULL),
(32, '4', NULL, 11, 2, NULL, NULL),
(33, '5', NULL, 11, 3, NULL, NULL),
(34, '6', NULL, 11, 1, NULL, NULL),
(35, '6', NULL, 12, 1, NULL, NULL),
(36, '4', NULL, 12, 2, NULL, NULL),
(37, '5', NULL, 12, 3, NULL, NULL),
(38, '5', NULL, 13, 1, NULL, NULL),
(39, '4', NULL, 13, 2, NULL, NULL),
(40, '4', NULL, 13, 3, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `raw_inventories`
--

CREATE TABLE `raw_inventories` (
  `id` int(10) UNSIGNED NOT NULL,
  `item` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `quantity` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `raw_inventories`
--

INSERT INTO `raw_inventories` (`id`, `item`, `quantity`, `created_at`, `updated_at`) VALUES
(1, 'asdfghj', 'kg|56', '2021-04-01 11:37:41', '2021-04-01 11:37:41'),
(2, 'kjhgfd', 'cotton|10', '2021-04-01 11:39:01', '2021-04-01 11:39:01'),
(3, 'kjhgfd', 'cotton|12', '2021-04-05 01:44:50', '2021-04-05 14:07:46'),
(4, 'asdfghj', 'kg|33', '2021-04-05 14:04:45', '2021-04-05 14:07:29');

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'SuperAdmin', 'web', NULL, NULL),
(2, 'Inventory', 'web', NULL, NULL),
(3, 'Bakery', 'web', NULL, NULL),
(4, 'Cafe', 'web', NULL, NULL),
(5, 'User', 'web', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `role_has_permissions`
--

CREATE TABLE `role_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Table structure for table `sales`
--

CREATE TABLE `sales` (
  `id` int(20) NOT NULL,
  `sale_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `grand_total` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `receive` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `change` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `return_amount` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `return_date` datetime DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `sales`
--

INSERT INTO `sales` (`id`, `sale_id`, `grand_total`, `receive`, `change`, `user_id`, `return_amount`, `return_date`, `created_at`, `updated_at`) VALUES
(1, 'Arooma-1', '3208.64', '4000', '791.36', 0, '1900.12', '2021-04-06 05:04:30', '2021-04-02 17:06:00', '2021-04-06 12:04:30'),
(2, 'Arooma-2', '1202', '1500', '298', 0, '1183.2', '2021-04-05 07:10:44', '2021-04-02 17:47:55', '2021-04-05 14:10:44'),
(3, 'Arooma-3', '0', '1500', '1500', 0, NULL, NULL, '2021-04-02 17:48:04', '2021-04-02 17:48:04'),
(4, 'Arooma-4', '1385.82', '1500', '114.18', 0, NULL, NULL, '2021-04-02 17:49:04', '2021-04-02 17:49:04'),
(5, 'Arooma-5', '932.3', '1000', '67.7', 0, NULL, NULL, '2021-04-02 17:51:50', '2021-04-02 17:51:50'),
(6, 'Arooma-6', '250', '500', '250', 0, '200', '2021-04-05 07:17:57', '2021-04-02 17:58:14', '2021-04-05 14:17:57'),
(7, 'Arooma-7', '591.6', '600', '8.4', 0, '591.6', '2021-04-05 07:16:29', '2021-04-05 14:12:19', '2021-04-05 14:16:29'),
(8, 'Arooma-8', '1706.8', '1800', '93.2', 0, '1706.8', '2021-04-06 05:13:07', '2021-04-05 15:41:31', '2021-04-06 12:13:07'),
(9, 'Arooma-9', '1096.4', '1800', '703.6', 0, NULL, NULL, '2021-04-05 15:44:57', '2021-04-05 15:44:57'),
(10, 'Arooma-10', '2547.2', '2600', '52.8', 0, '1220.8', '2021-04-05 11:22:24', '2021-04-05 18:18:57', '2021-04-05 18:22:24'),
(11, 'Arooma-11', '3519.2', '3600', '80.8', 0, NULL, NULL, '2021-04-05 19:36:27', '2021-04-05 19:36:27'),
(12, 'Arooma-12', '3519.2', '3600', '80.8', 0, NULL, NULL, '2021-04-05 19:38:24', '2021-04-05 19:38:24'),
(13, 'Arooma-13', '2927.6', '3600', '672.4', 0, NULL, NULL, '2021-04-05 19:39:46', '2021-04-05 19:39:46');

-- --------------------------------------------------------

--
-- Table structure for table `test`
--

CREATE TABLE `test` (
  `id` int(11) NOT NULL,
  `username` int(11) DEFAULT NULL,
  `email` int(11) DEFAULT NULL,
  `password` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(0, 'cplussoft', 'cplusoft@gmail.com', NULL, '$2y$10$8rG0c7JKy4udF5P4wJ.w8uNl2bG/VYW9mTmZG4ElB53tZGWN6GUUC', '', NULL, '2021-04-01 15:59:04');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indexes for table `drafts`
--
ALTER TABLE `drafts`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indexes for table `expenses`
--
ALTER TABLE `expenses`
  ADD PRIMARY KEY (`id`),
  ADD KEY `expenses_expensetype_id_foreign` (`expensetype_id`) USING BTREE,
  ADD KEY `expenses_user_id_foreign` (`user_id`) USING BTREE;

--
-- Indexes for table `expensetypes`
--
ALTER TABLE `expensetypes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kitchens`
--
ALTER TABLE `kitchens`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indexes for table `kitchen_types`
--
ALTER TABLE `kitchen_types`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`(191)) USING BTREE;

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`) USING BTREE,
  ADD KEY `products_category_id_foreign` (`category_id`) USING BTREE;

--
-- Indexes for table `product_sale`
--
ALTER TABLE `product_sale`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `raw_inventories`
--
ALTER TABLE `raw_inventories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sales`
--
ALTER TABLE `sales`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `test`
--
ALTER TABLE `test`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `drafts`
--
ALTER TABLE `drafts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `expenses`
--
ALTER TABLE `expenses`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `expensetypes`
--
ALTER TABLE `expensetypes`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `kitchens`
--
ALTER TABLE `kitchens`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `kitchen_types`
--
ALTER TABLE `kitchen_types`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `product_sale`
--
ALTER TABLE `product_sale`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `raw_inventories`
--
ALTER TABLE `raw_inventories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `sales`
--
ALTER TABLE `sales`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `test`
--
ALTER TABLE `test`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
