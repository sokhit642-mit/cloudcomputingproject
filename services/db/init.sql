-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 16, 2025 at 10:41 AM
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
-- Database: `thesis-4`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `role` tinyint(3) UNSIGNED NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `name`, `image`, `email`, `password`, `created_at`, `updated_at`, `role`) VALUES
(1, 'superadmin', '1733166469.png', 'superadmin@gmail.com', '$2y$10$c1PWn0uLLU1BVc1mhWKRdOBc5pHDzbQ5zWd9Q3dsmB6Q0TD50OkIy', '2024-12-02 19:03:42', '2024-12-02 19:07:49', 2),
(2, 'Admin1', '1733172907.jpg', 'Admin1@gmail.com', '$2y$10$d3Oveh/hb/5GgSqwW6FEUOdvDFDDlePLEfYwpf1W7At6gf69eoQxy', '2024-12-02 20:55:07', '2024-12-02 20:55:07', 1);

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

CREATE TABLE `brands` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`id`, `name`, `image`, `slug`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Adidas', 'brand-image/dARRanDV91CBuN6iD8PSROyw2OIvwnea0VYLFfIK.png', 'adidas', 0, '2024-12-02 19:26:42', '2024-12-03 09:55:43'),
(2, 'Nike', 'brand-image/pJ6PncZgM9RLeFkmI98ntnyv7mlI6JfYnjNW6Rrg.png', 'nike', 0, '2024-12-02 19:26:54', '2024-12-02 19:26:54'),
(3, 'Mizuno', 'brand-image/hObHtZTOybLs3MKDltMOoV7w4YNuT4FirphYBKKD.png', 'mizuno', 0, '2024-12-02 19:27:13', '2024-12-02 19:27:13'),
(4, 'Puma', 'brand-image/aVbvZnAg0PBCXgNDRbXX6g4OXppXpBZ3KRhCPUhU.png', 'puma', 0, '2024-12-02 19:27:30', '2024-12-04 03:10:26');

-- --------------------------------------------------------

--
-- Table structure for table `carts`
--

CREATE TABLE `carts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `product_color_id` int(11) DEFAULT NULL,
  `product_size_id` int(11) DEFAULT NULL,
  `quantity` int(11) NOT NULL,
  `total_price` decimal(8,2) NOT NULL DEFAULT 0.00,
  `total_after_discount` decimal(8,2) NOT NULL DEFAULT 0.00,
  `coupon_value` decimal(8,2) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `carts`
--

INSERT INTO `carts` (`id`, `user_id`, `product_id`, `product_color_id`, `product_size_id`, `quantity`, `total_price`, `total_after_discount`, `coupon_value`, `created_at`, `updated_at`) VALUES
(13, 5, 2, NULL, 4, 1, 0.00, 0.00, NULL, '2024-12-03 11:17:31', '2024-12-03 11:17:31'),
(27, 6, 1, NULL, 2, 1, 0.00, 0.00, NULL, '2025-04-16 08:29:47', '2025-04-16 08:29:47');

-- --------------------------------------------------------

--
-- Table structure for table `cart_totals`
--

CREATE TABLE `cart_totals` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `total_amount` varchar(255) NOT NULL DEFAULT '0',
  `total_discount` varchar(255) DEFAULT '0',
  `coupon_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `description` longtext NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 0 COMMENT '0=visible,1=hidden',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `slug`, `description`, `image`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Shoes', 'shoes', 'Shoes', '1733166880.jpg', 0, '2024-12-02 19:14:40', '2024-12-02 19:14:40'),
(2, 'Clothing', 'clothing', 'Clothing', '1733166914.webp', 0, '2024-12-02 19:15:14', '2024-12-02 19:15:14'),
(3, 'Ball Sports', 'ball-sports', 'Ball Sports', '1733167407.jpg', 0, '2024-12-02 19:23:27', '2024-12-02 19:23:27'),
(4, '!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!', 'at', '@#$%^^&*()_+', NULL, 1, '2024-12-04 03:45:59', '2024-12-07 08:25:52');

-- --------------------------------------------------------

--
-- Table structure for table `colors`
--

CREATE TABLE `colors` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `code` varchar(255) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 0 COMMENT '1=hidden,0=visible',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `colors`
--

INSERT INTO `colors` (`id`, `name`, `code`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Black', '#000000', 0, '2024-12-02 19:30:48', '2024-12-02 19:30:48'),
(2, 'Red', '#ff0000', 0, '2024-12-02 19:30:55', '2024-12-02 19:30:55'),
(3, 'Blue', '#0e1efb', 0, '2024-12-02 19:31:04', '2024-12-02 19:31:04'),
(4, 'Green', '#00ff2a', 0, '2024-12-02 19:31:12', '2024-12-02 19:31:12');

-- --------------------------------------------------------

--
-- Table structure for table `coupons`
--

CREATE TABLE `coupons` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `code` varchar(255) NOT NULL,
  `discount_type` enum('fixed','percent') NOT NULL,
  `discount_value` varchar(255) NOT NULL,
  `usage_limit` int(11) NOT NULL DEFAULT 1,
  `usage_count` int(11) NOT NULL DEFAULT 0,
  `expiry_date` date NOT NULL,
  `status` enum('active','inactive') NOT NULL DEFAULT 'active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `coupons`
--

INSERT INTO `coupons` (`id`, `code`, `discount_type`, `discount_value`, `usage_limit`, `usage_count`, `expiry_date`, `status`, `created_at`, `updated_at`) VALUES
(1, '123', 'percent', '10', 100, 16, '2025-01-02', 'active', '2024-12-02 20:58:48', '2024-12-07 08:42:41'),
(2, '234', 'fixed', '10', 70, 6, '2024-12-25', 'active', '2024-12-02 21:55:53', '2024-12-03 11:19:35'),
(3, '987', 'percent', '19', 3, 1, '2024-12-17', 'active', '2024-12-03 10:01:33', '2024-12-03 10:02:23'),
(4, '890', 'percent', '10', 10, 1, '2025-04-17', 'active', '2025-04-16 08:30:42', '2025-04-16 08:30:52');

-- --------------------------------------------------------

--
-- Table structure for table `discounts`
--

CREATE TABLE `discounts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
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
-- Table structure for table `front_detail`
--

CREATE TABLE `front_detail` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `facebook` varchar(255) DEFAULT NULL,
  `telegram` varchar(255) DEFAULT NULL,
  `instagram` varchar(255) DEFAULT NULL,
  `youtube` varchar(255) DEFAULT NULL,
  `tiktok` varchar(255) DEFAULT NULL,
  `phonenumber1` varchar(255) DEFAULT NULL,
  `phonenumber2` varchar(255) DEFAULT NULL,
  `phonenumber3` varchar(255) DEFAULT NULL,
  `abouthomesport` varchar(1000) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `front_detail`
--

INSERT INTO `front_detail` (`id`, `facebook`, `telegram`, `instagram`, `youtube`, `tiktok`, `phonenumber1`, `phonenumber2`, `phonenumber3`, `abouthomesport`, `created_at`, `updated_at`) VALUES
(1, 'https://web.facebook.com/profile.php?id=100072323269170', 'https://web.telegram.org/homesport', NULL, 'https://youtu.be/zXLvzk_Dh6c?si=sXkLVdrcrHAwOMxf', 'https://www.tiktok.com/@_homesport_?_t=8rt9Ls1iaeY&_r=1', '+855 093 9 7777 9', '+855 071 7 66666 7', NULL, 'HOMESPORT ជាហាងលក់សម្ភារៈកីឡាដ៏សំបូរបែបក្នុងរាជធានីភ្នំពេញ ដែលសំបូរទៅដោយសម្ភារកីឡាជាច្រើន គុណភាពល្អ និងជាទីទុកចិត្តសម្រាប់អតិថិជនទាំងអស់។HOMESPORT តែងតែគាំទ្ររាល់សកម្មភាពកីឡាក្នុងព្រះរាជាណាចក្រកម្ពុជា ដែលកីឡាដើម្បីសុខភាព កីឡាសម្រាប់ មិត្តភាព និងកីឡារស់នៅក្នុងសន្តិភាព', '2024-12-02 19:38:52', '2024-12-02 19:46:50');

-- --------------------------------------------------------

--
-- Table structure for table `merchantbakongkhqrs`
--

CREATE TABLE `merchantbakongkhqrs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `merchantType` varchar(255) DEFAULT NULL,
  `bakongAccountID` varchar(255) DEFAULT NULL,
  `transactionCurrency` varchar(255) DEFAULT NULL,
  `countryCode` varchar(255) DEFAULT NULL,
  `merchantName` varchar(255) DEFAULT NULL,
  `merchantCity` varchar(255) DEFAULT NULL,
  `crc` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `merchantbakongkhqrs`
--

INSERT INTO `merchantbakongkhqrs` (`id`, `merchantType`, `bakongAccountID`, `transactionCurrency`, `countryCode`, `merchantName`, `merchantCity`, `crc`, `created_at`, `updated_at`) VALUES
(1, '29', 'sievphor_tonn@aclb', '116', 'KH', 'Sievphor Tonn', 'Phnom Penh', '5338', '2024-12-02 19:07:01', '2024-12-05 10:12:28');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
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
(5, '2024_05_15_123704_add_details_to_users_table', 1),
(6, '2024_05_15_135709_create_categories_table', 1),
(7, '2024_05_20_093633_add_image_to_users_table', 1),
(8, '2024_05_25_071114_craete_brands_table', 1),
(9, '2024_06_06_085244_craete_products_table', 1),
(10, '2024_06_06_090718_craete_product_image_table', 1),
(11, '2024_06_12_091310_craete_sub-category_table', 1),
(12, '2024_06_12_091357_craete_sub-categories_table', 1),
(13, '2024_06_24_082930_create_sliders_table', 1),
(14, '2024_07_03_054552_create_colors_table', 1),
(15, '2024_07_03_074048_create_sizes_table', 1),
(16, '2024_07_03_093258_create_product_colors_table', 1),
(17, '2024_07_04_065040_create_product_sizes_table', 1),
(18, '2024_07_09_085334_create_wishlists_table', 1),
(19, '2024_07_31_091939_create_carts_table', 1),
(20, '2024_08_07_081920_create_order_table', 1),
(21, '2024_08_07_083200_create_order_items_table', 1),
(22, '2024_08_29_113118_add_avatar_to_users_table', 1),
(23, '2024_09_12_094828_create_admins_table', 1),
(24, '2024_09_12_095951_add_role_to_admins_table', 1),
(25, '2024_09_12_100011_add_role_to_admins_table', 1),
(26, '2024_09_12_101353_add_name_to_admins_table', 1),
(27, '2024_09_12_151427_add_image_to_admins_table', 1),
(28, '2024_09_14_092651_create_reports_table', 1),
(29, '2024_09_20_121931_create_notifications_table', 1),
(30, '2024_09_22_210609_create_telegram_users_table', 1),
(31, '2024_10_16_145512_create_coupons_table', 1),
(32, '2024_10_18_102955_add_total_after_discount_to_carts_table', 1),
(33, '2024_10_18_151725_add_total_coupon_to_carts_table', 1),
(34, '2024_10_23_103302_create_cart_totals_table', 1),
(35, '2024_10_30_100712_create_discounts_table', 1),
(36, '2024_10_30_104451_add_discount_to_products_table', 1),
(37, '2024_11_18_113516_create_front_detail_table', 1),
(38, '2024_11_25_001201_add_telegram_chat_id_to_users_table', 1),
(39, '2024_11_25_001403_create_telegram_chat_ids_table', 1),
(40, '2024_11_25_201023_create_merchantbakongkhqrs_table', 1),
(41, '2024_11_26_144003_create_tokens_table', 1),
(42, '2024_11_27_025811_add_phone_and_address_to_users_table', 1),
(43, '2024_11_27_220438_add_password_reset_token_to_users_table', 1),
(44, '2024_11_30_020051_add_coupon_id_to_cart_totals_table', 1),
(45, '2024_12_01_162154_add_coupon_discount_to_order_items_table', 1),
(46, '2024_12_01_171547_add_discount_type_to_order_items_table', 1),
(47, '2024_12_03_043503_add_total_discount_to_order_items_table', 2);

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `id` char(36) NOT NULL,
  `type` varchar(255) NOT NULL,
  `notifiable_type` varchar(255) NOT NULL,
  `notifiable_id` bigint(20) UNSIGNED NOT NULL,
  `data` text NOT NULL,
  `read_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `order`
--

CREATE TABLE `order` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `tracking_no` varchar(255) NOT NULL,
  `fullname` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `status_message` varchar(255) NOT NULL,
  `payment_mode` varchar(255) NOT NULL,
  `payment_id` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `order`
--

INSERT INTO `order` (`id`, `user_id`, `tracking_no`, `fullname`, `phone`, `email`, `address`, `status_message`, `payment_mode`, `payment_id`, `created_at`, `updated_at`) VALUES
(4, 1, 'home-sport-pux4dtjwDP', 'Sievphor Tonn', '0972273544', 'tonnsievphor@gmail.com', 'P.O. Box 10308, Manama', 'pending', 'Payment upon goods arrival', NULL, '2024-12-02 21:25:36', '2024-12-03 19:34:12'),
(13, 1, 'home-sport-2zXpXFud8q', 'Sievphor Tonn', '0972273544', 'tonnsievphor@gmail.com', 'P.O. Box 10308, Manama', 'in-progress', 'Payment upon goods arrival', NULL, '2024-12-02 21:41:52', '2024-12-02 21:41:52'),
(14, 1, 'home-sport-x7UkmUexnR', 'Sievphor Tonn', '0969568284', 'tonnsievphor@gmail.com', '៦៨ មិនមាន', 'in-progress', 'Payment upon goods arrival', NULL, '2024-12-02 21:47:06', '2024-12-02 21:47:06'),
(15, 1, 'home-sport-JkIT0VzUPO', 'Sievphor Tonn', '0969568284', 'tonnsievphor@gmail.com', '៦៨ មិនមាន', 'in-progress', 'Payment upon goods arrival', NULL, '2024-12-02 21:54:21', '2024-12-02 21:54:21'),
(17, 1, 'home-sport-WK29HnVDBI', 'Sievphor Tonn', '0972273544', 'tonnsievphor@gmail.com', 'P.O. Box 10308, Manama', 'in-progress', 'Payment upon goods arrival', NULL, '2024-12-02 22:01:34', '2024-12-02 22:01:34'),
(18, 1, 'home-sport-iYCP2khICU', 'Sievphor Tonn', '0972273544', 'tonnsievphor@gmail.com', 'P.O. Box 10308, Manama', 'in-progress', 'Payment upon goods arrival', NULL, '2024-12-02 22:10:00', '2024-12-02 22:10:00'),
(19, 1, 'home-sport-WickyslId8', 'Sievphor Tonn', '0972273544', 'tonnsievphor@gmail.com', 'P.O. Box 10308, Manama', 'in-progress', 'Payment upon goods arrival', NULL, '2024-12-02 22:11:50', '2024-12-02 22:11:50'),
(20, 1, 'home-sport-pFcCFWAQW2', 'Sievphor Tonn', '0972273544', 'tonnsievphor@gmail.com', 'P.O. Box 10308, Manama', 'completed', 'Payment upon goods arrival', NULL, '2024-12-02 22:15:02', '2024-12-03 07:34:46'),
(24, 1, 'home-sport-HMcEJURvCd', 'Sievphor Tonn', '0972273544', 'tonnsievphor@gmail.com', 'P.O. Box 10308, Manama\r\nP.O. Box 10308, Manama', 'in-progress', 'Payment upon goods arrival', NULL, '2024-12-03 09:31:32', '2024-12-03 09:31:32'),
(25, 1, 'home-sport-GnZWgpytvX', 'Sievphor Tonn', '0972273544', 'tonnsievphor@gmail.com', 'P.O. Box 10308, Manama\r\nP.O. Box 10308, Manama', 'in-progress', 'Payment upon goods arrival', NULL, '2024-12-03 19:52:40', '2024-12-03 19:52:40'),
(26, 1, 'home-sport-g1U0F5pl8W', 'Sievphor Tonn', '0972273544', 'tonnsievphor@gmail.com', 'P.O. Box 10308, Manama\r\nP.O. Box 10308, Manama', 'completed', 'Payment upon goods arrival', NULL, '2024-12-04 02:38:50', '2024-12-04 02:43:03'),
(27, 1, 'home-sport-m6RQlOuTWj', 'Sievphor Tonn', '0972273544', 'tonnsievphor@gmail.com', 'P.O. Box 10308, Manama\r\nP.O. Box 10308, Manama', 'in-progress', 'Payment upon goods arrival', NULL, '2024-12-04 02:41:11', '2024-12-04 02:41:11'),
(30, 1, 'home-sport-aBCBKfQnmi', 'Sievphor Tonn', '0972273544', 'tonnsievphor@gmail.com', 'P.O. Box 10308, Manama\r\nP.O. Box 10308, Manama', 'in-progress', 'Payment upon goods arrival', NULL, '2024-12-04 02:46:17', '2024-12-04 02:46:17'),
(31, 1, 'home-sport-DQLNCxhsND', 'Sievphor Tonn', '0972273544', 'tonnsievphor@gmail.com', 'P.O. Box 10308, Manama\r\nP.O. Box 10308, Manama', 'in-progress', 'Payment upon goods arrival', NULL, '2024-12-05 10:31:39', '2024-12-05 10:31:39'),
(32, 1, 'home-sport-IkAZDsZLU5', 'Sievphor Tonn', '0972273544', 'tonnsievphor@gmail.com', 'P.O. Box 10308, Manama\r\nP.O. Box 10308, Manama', 'in-progress', 'Paid by KHQR', 'QR_BWHxedWfcB', '2025-01-08 02:54:00', '2025-01-08 02:54:00'),
(33, 1, 'home-sport-2I8kdV5S2n', 'Sievphor Tonn', '0972273544', 'tonnsievphor@gmail.com', 'P.O. Box 10308, Manama\r\nP.O. Box 10308, Manama', 'in-progress', 'Payment upon goods arrival', NULL, '2025-02-20 01:25:08', '2025-02-20 01:25:08');

-- --------------------------------------------------------

--
-- Table structure for table `order_items`
--

CREATE TABLE `order_items` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `product_color_id` int(11) DEFAULT NULL,
  `product_size_id` int(11) DEFAULT NULL,
  `quantity` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `coupon_code` varchar(255) DEFAULT NULL,
  `discount_value` varchar(255) DEFAULT '0',
  `discount_type` varchar(255) DEFAULT NULL,
  `total_discount` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `order_items`
--

INSERT INTO `order_items` (`id`, `order_id`, `product_id`, `product_color_id`, `product_size_id`, `quantity`, `price`, `created_at`, `updated_at`, `coupon_code`, `discount_value`, `discount_type`, `total_discount`) VALUES
(2, 4, 2, NULL, 4, 1, 18, '2024-12-02 21:25:36', '2024-12-02 21:25:36', '123', '10', 'percent', '2'),
(3, 13, 7, NULL, 20, 1, 133, '2024-12-02 21:41:52', '2024-12-02 21:41:52', 'N/A', '0', '', '0'),
(4, 14, 2, NULL, 5, 1, 20, '2024-12-02 21:47:06', '2024-12-02 21:47:06', 'N/A', '0', 'NULL', '0'),
(5, 15, 3, NULL, 8, 1, 17, '2024-12-02 21:54:21', '2024-12-02 21:54:21', '123', '10', 'percent', '1.9'),
(6, 17, 5, NULL, 15, 1, 5, '2024-12-02 22:01:34', '2024-12-02 22:01:34', '234', '10', 'fixed', '10'),
(7, 18, 2, NULL, 6, 1, 10, '2024-12-02 22:10:00', '2024-12-02 22:10:00', '234', '10', 'fixed', '10'),
(8, 19, 2, NULL, 5, 1, 18, '2024-12-02 22:11:50', '2024-12-02 22:11:50', '123', '10', 'percent', '2'),
(9, 20, 2, NULL, 5, 1, 18, '2024-12-02 22:15:02', '2024-12-02 22:15:02', '123', '10', 'percent', '2'),
(10, 24, 1, NULL, 2, 1, 19, '2024-12-03 09:31:32', '2024-12-03 09:31:32', 'N/A', '0', 'NULL', '0'),
(11, 25, 1, NULL, 3, 1, 20, '2024-12-03 19:52:40', '2024-12-03 19:52:40', 'N/A', '0', 'NULL', '0'),
(12, 25, 6, NULL, 17, 2, 51, '2024-12-03 19:52:40', '2024-12-03 19:52:40', 'N/A', '0', 'NULL', '0'),
(13, 26, 6, NULL, 18, 8, 128, '2024-12-04 02:38:50', '2024-12-04 02:38:50', 'N/A', '0', 'NULL', '0'),
(17, 30, 6, NULL, 18, 10, 160, '2024-12-04 02:46:17', '2024-12-04 02:46:17', 'N/A', '0', 'NULL', '0'),
(18, 31, 1, NULL, 2, 1, 19, '2024-12-05 10:31:39', '2024-12-05 10:31:39', 'N/A', '0', 'NULL', '0'),
(19, 32, 1, NULL, 2, 1, 19, '2025-01-08 02:54:00', '2025-01-08 02:54:00', 'N/A', '0', 'NULL', '0'),
(20, 33, 1, NULL, 2, 1, 19, '2025-02-20 01:25:08', '2025-02-20 01:25:08', 'N/A', '0', 'NULL', '0');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
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
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `brand_id` bigint(20) UNSIGNED NOT NULL,
  `subcategory` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `description` longtext DEFAULT NULL,
  `original_price` int(11) NOT NULL,
  `selling_price` int(11) NOT NULL,
  `quantity` int(11) DEFAULT NULL,
  `discount_value` double(8,2) DEFAULT NULL,
  `discount_type` enum('percentage','fixed') DEFAULT NULL,
  `trending` tinyint(4) NOT NULL COMMENT '1=trending,0=not-trending',
  `status` tinyint(4) NOT NULL COMMENT '1=hidden,0=visible',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `category_id`, `brand_id`, `subcategory`, `name`, `slug`, `description`, `original_price`, `selling_price`, `quantity`, `discount_value`, `discount_type`, `trending`, `status`, `created_at`, `updated_at`) VALUES
(1, 2, 1, 'Sport-swear', 'Manchester United adidas Home Shirt 2024-25', 'manchester-united-adidas-home-shirt-2024-25', 'Manchester United at Old Trafford. Home fans adore them and even rivals can\'t ignore them. In 24/25, the club\'s timeless home jerseys shout even louder with bright red inserts on the sides and a subtle gradient design on the front and back. Made for supporters, this adidas football shirt includes moisture-managing AEROREADY and an embroidered badge. This product is made with 100% recycled materials. By reusing materials that have already been created, we help to reduce waste and our reliance on finite resources and reduce the footprint of the products we make.', 15, 20, 5, 5.00, 'percentage', 0, 0, '2024-12-02 19:50:37', '2024-12-04 02:08:32'),
(2, 2, 1, 'Sport-swear', 'Manchester United adidas Away Shirt 2024-25', 'manchester-united-adidas-away-shirt-2024-25', 'With a bold design that nods to football culture, this adidas Manchester United jersey looks equally at home on and off the pitch. Silver details pop against an indigo base that also includes a subtle, repeating \'M\' monogram. The light blue graphic on that stylish polo collar pays tribute to the river on which Old Trafford sits. Moisture-managing AEROREADY keeps fans comfortable on away days.', 200, 20, 5, NULL, NULL, 0, 0, '2024-12-02 19:52:47', '2024-12-04 02:08:44'),
(3, 2, 1, 'Sport-swear', 'Manchester United adidas Third Shirt 2024-25', 'manchester-united-adidas-third-shirt-2024-25', 'Football pride never falls out of fashion. This Manchester United third jersey salutes the flags that follow the club home and away, while also adding some classic adidas heritage. Shorthand for sporty style, a Trefoil and red devil badge stand out from that tricolour chest bar. Moisture-managing AEROREADY keeps fans comfortable. This product is made with 100% recycled materials. By reusing materials that have already been created, we help to reduce waste and our reliance on finite resources and reduce the footprint of the products we make.', 100, 20, 5, 5.00, 'percentage', 0, 0, '2024-12-02 19:54:39', '2024-12-04 02:09:00'),
(5, 2, 2, 'Sport-swear', 'Nike FC BARCELONA 23/24 Away AUTHENTIC Jersey - White', 'nike-fc-barcelona-2324-away-authentic-jersey-white', 'Yes, Barcelona has a white kit. No, this isn’t a mistake. The 2023/24 Away Jersey in inspired by the 1978 white kit used by the club and pays homage to greats of the game. The crest on the jersey is the same used in \'78, and the ribbed sleeve details honor the legendary captain of that squad. Our Match collection pairs authentic design details with lightweight, quick-drying technology to help keep the world’s biggest soccer stars cool and comfortable on the field.', 100, 15, 2, NULL, NULL, 0, 0, '2024-12-02 20:00:36', '2024-12-04 02:09:23'),
(6, 2, 2, 'Sport-swear', 'Nike Youth FC Barcelona 23/24 4th Jersey - Amarillo', 'nike-youth-fc-barcelona-2324-4th-jersey-amarillo', 'Our Stadium collection pairs replica design details with sweat-wicking technology to give you a game-ready look inspired by your favorite team.', 100, 20, 2, 20.00, 'percentage', 0, 0, '2024-12-02 20:02:05', '2024-12-04 02:09:38'),
(7, 1, 4, 'Sport-shoes', 'Puma King Top Fg - Black/White', 'puma-king-top-fg-blackwhite', 'The PUMA King is soccer royalty. It’s been in the game since 1968 and has been worn by soccer legends from Pele to Matthaus. Originally engineered in Italy, the King Top features a sleek leather upper and soft padded collar with a fold-over tongue. The lightweight studded outsole allows agile, versatile movement and optimal traction on the field.', 122, 140, 2, 5.00, 'percentage', 0, 0, '2024-12-02 20:04:42', '2024-12-02 20:04:42'),
(8, 1, 2, 'Sport-shoes', 'Nike Phantom Luna 2 Pro FG - Silver', 'nike-phantom-luna-2-pro-fg-silver', 'Serious about your game? We made this for you. In the middle of the storm, with chaos swirling all around you, you’ve calmly found the final third of the field, thanks to your uncanny mix of on-ball guile and grace. Go finish the job in the Phantom Luna 2 Pro. Take your skills to the next level with some of Nike’s greatest innovations, like a stretchy Flyknit upper and Nike Cyclone 360 traction to help guide your unscripted agility.', 120, 150, 2, NULL, NULL, 0, 0, '2024-12-02 20:08:45', '2024-12-02 20:12:15'),
(9, 2, 4, 'Sport-swear', 'Manchester City Home Jersey 2024/25', 'manchester-city-home-jersey-202425', 'This official Manchester City 2024/25 Home jersey is drawing inspiration from Manchester’s 0161 area code because for us it\'s a sense of what being Mancunian is all about. You’ll see it written on lampposts, printed on t-shirts, and tattooed on people. You will find it printed inside the neckline and featured in a patterned flat knit rib on the neckline and cuffs. The accents are the OKX print on the left sleeve, the iconic Manchester City crest and PUMA Cat logo embroidered on the chest. Designed for the fans, the home kit jersey pairs the same match-worn look with a casual short-sleeve silhouette and comfortable regular fit, ideal for both game day and everyday wear. If it’s Sky Blue, it’s 0161. That’s Manchester Calling.', 100, 20, NULL, NULL, NULL, 0, 0, '2024-12-03 06:30:42', '2024-12-04 02:10:13');

-- --------------------------------------------------------

--
-- Table structure for table `product_colors`
--

CREATE TABLE `product_colors` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `color_id` bigint(20) UNSIGNED DEFAULT NULL,
  `quantity` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `product_images`
--

CREATE TABLE `product_images` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `image` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_images`
--

INSERT INTO `product_images` (`id`, `product_id`, `image`, `created_at`, `updated_at`) VALUES
(1, 1, 'uploads/products/17331690371.avif', '2024-12-02 19:50:37', '2024-12-02 19:50:37'),
(2, 1, 'uploads/products/17331690372.avif', '2024-12-02 19:50:37', '2024-12-02 19:50:37'),
(3, 1, 'uploads/products/17331690373.avif', '2024-12-02 19:50:37', '2024-12-02 19:50:37'),
(4, 2, 'uploads/products/17331691671.avif', '2024-12-02 19:52:47', '2024-12-02 19:52:47'),
(5, 2, 'uploads/products/17331691672.avif', '2024-12-02 19:52:47', '2024-12-02 19:52:47'),
(6, 2, 'uploads/products/17331691673.avif', '2024-12-02 19:52:47', '2024-12-02 19:52:47'),
(7, 3, 'uploads/products/17331692791.avif', '2024-12-02 19:54:39', '2024-12-02 19:54:39'),
(8, 3, 'uploads/products/17331692792.avif', '2024-12-02 19:54:39', '2024-12-02 19:54:39'),
(9, 3, 'uploads/products/17331692793.avif', '2024-12-02 19:54:39', '2024-12-02 19:54:39'),
(14, 5, 'uploads/products/17331696361.jpg', '2024-12-02 20:00:36', '2024-12-02 20:00:36'),
(15, 5, 'uploads/products/17331696362.jpg', '2024-12-02 20:00:36', '2024-12-02 20:00:36'),
(16, 6, 'uploads/products/17331697251.jpg', '2024-12-02 20:02:05', '2024-12-02 20:02:05'),
(17, 6, 'uploads/products/17331697252.jpg', '2024-12-02 20:02:05', '2024-12-02 20:02:05'),
(18, 6, 'uploads/products/17331697253.jpg', '2024-12-02 20:02:05', '2024-12-02 20:02:05'),
(19, 7, 'uploads/products/17331698821.jpg', '2024-12-02 20:04:42', '2024-12-02 20:04:42'),
(20, 7, 'uploads/products/17331698822.jpg', '2024-12-02 20:04:42', '2024-12-02 20:04:42'),
(21, 7, 'uploads/products/17331698823.jpg', '2024-12-02 20:04:42', '2024-12-02 20:04:42'),
(26, 8, 'uploads/products/17331710121.jpg', '2024-12-02 20:23:32', '2024-12-02 20:23:32'),
(27, 9, 'uploads/products/17332074421.webp', '2024-12-03 06:30:42', '2024-12-03 06:30:42');

-- --------------------------------------------------------

--
-- Table structure for table `product_sizes`
--

CREATE TABLE `product_sizes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `size_id` bigint(20) UNSIGNED DEFAULT NULL,
  `quantity` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_sizes`
--

INSERT INTO `product_sizes` (`id`, `product_id`, `size_id`, `quantity`, `created_at`, `updated_at`) VALUES
(2, 1, 5, 17, '2024-12-02 19:50:37', '2025-02-20 01:25:08'),
(3, 1, 6, 0, '2024-12-02 19:50:37', '2025-01-08 02:52:51'),
(4, 2, 4, 10, '2024-12-02 19:52:47', '2024-12-02 19:52:47'),
(5, 2, 5, 10, '2024-12-02 19:52:47', '2024-12-02 19:52:47'),
(6, 2, 6, 10, '2024-12-02 19:52:47', '2024-12-02 19:52:47'),
(7, 3, 4, 5, '2024-12-02 19:54:39', '2024-12-02 19:54:39'),
(8, 3, 5, 5, '2024-12-02 19:54:39', '2024-12-02 19:54:39'),
(9, 3, 6, 5, '2024-12-02 19:54:39', '2024-12-02 19:54:39'),
(13, 5, 4, 6, '2024-12-02 20:00:36', '2024-12-02 20:00:36'),
(14, 5, 5, 6, '2024-12-02 20:00:36', '2024-12-02 20:00:36'),
(15, 5, 6, 6, '2024-12-02 20:00:36', '2024-12-02 20:00:36'),
(16, 6, 4, 10, '2024-12-02 20:02:05', '2024-12-02 20:02:05'),
(17, 6, 5, 10, '2024-12-02 20:02:05', '2024-12-02 20:02:05'),
(18, 6, 6, 0, '2024-12-02 20:02:05', '2024-12-04 02:46:17'),
(19, 7, 1, 5, '2024-12-02 20:04:42', '2024-12-02 20:04:42'),
(20, 7, 2, 5, '2024-12-02 20:04:42', '2024-12-02 20:04:42'),
(21, 7, 3, 5, '2024-12-02 20:04:42', '2024-12-02 20:04:42'),
(22, 8, 1, 3, '2024-12-02 20:08:45', '2024-12-02 20:08:45'),
(23, 8, 2, 3, '2024-12-02 20:08:45', '2024-12-02 20:08:45'),
(24, 8, 3, 3, '2024-12-02 20:08:45', '2024-12-02 20:08:45'),
(25, 9, 4, 5, '2024-12-03 06:30:42', '2024-12-03 06:30:42'),
(26, 9, 5, 6, '2024-12-03 06:30:42', '2024-12-03 06:30:42');

-- --------------------------------------------------------

--
-- Table structure for table `reports`
--

CREATE TABLE `reports` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `report_date` date NOT NULL,
  `report_number` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sizes`
--

CREATE TABLE `sizes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 0 COMMENT '1=hidden,0=visible',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sizes`
--

INSERT INTO `sizes` (`id`, `name`, `slug`, `category_id`, `status`, `created_at`, `updated_at`) VALUES
(1, 'EUR39', 'eur39', 1, 0, '2024-12-02 19:29:40', '2024-12-02 19:29:40'),
(2, 'EUR40', 'eur40', 1, 0, '2024-12-02 19:29:51', '2024-12-02 19:29:51'),
(3, 'EUR41', 'eur41', 1, 0, '2024-12-02 19:30:03', '2024-12-02 19:30:03'),
(4, 'S', 's', 2, 0, '2024-12-02 19:30:12', '2024-12-02 19:30:12'),
(5, 'M', 'm', 2, 0, '2024-12-02 19:30:20', '2024-12-02 19:30:20'),
(6, 'L', 'l', 2, 0, '2024-12-02 19:30:30', '2024-12-02 19:30:30');

-- --------------------------------------------------------

--
-- Table structure for table `sliders`
--

CREATE TABLE `sliders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` mediumtext DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 0 COMMENT '1=hidden,0=visible',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sliders`
--

INSERT INTO `sliders` (`id`, `title`, `description`, `image`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Get 10% Off on gift items', 'Use Coupon code 123homesport to get 10%of', '1733168139.jpg', 0, '2024-12-02 19:35:39', '2024-12-02 19:35:39'),
(2, 'Get -$10 Back every day', 'Shop now to have the ultimate experience', '1733168218.jpg', 0, '2024-12-02 19:36:58', '2024-12-02 19:36:58');

-- --------------------------------------------------------

--
-- Table structure for table `sub-categories`
--

CREATE TABLE `sub-categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `slug` varchar(255) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 0 COMMENT '0=visible,1=hidden',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sub-categories`
--

INSERT INTO `sub-categories` (`id`, `name`, `category_id`, `slug`, `status`, `created_at`, `updated_at`) VALUES
(1, 'soccer balls', 3, 'soccer-balls', 0, '2024-12-02 19:24:44', '2024-12-02 19:24:44'),
(2, 'Sport-swear', 2, 'sport-swear', 0, '2024-12-02 19:25:37', '2024-12-02 19:25:37'),
(3, 'Sport-shoes', 1, 'sport-shoes', 0, '2024-12-02 19:25:53', '2024-12-02 19:25:53');

-- --------------------------------------------------------

--
-- Table structure for table `telegram_chat_ids`
--

CREATE TABLE `telegram_chat_ids` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `chat_id` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `telegram_chat_ids`
--

INSERT INTO `telegram_chat_ids` (`id`, `chat_id`, `created_at`, `updated_at`) VALUES
(1, '1223986190', NULL, '2024-12-05 10:30:04');

-- --------------------------------------------------------

--
-- Table structure for table `telegram_users`
--

CREATE TABLE `telegram_users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `phone` varchar(255) NOT NULL,
  `chat_id` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tokens`
--

CREATE TABLE `tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tokens`
--

INSERT INTO `tokens` (`id`, `name`, `token`, `created_at`, `updated_at`) VALUES
(2, 'api_current_token', 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJkYXRhIjp7ImlkIjoiZWRhMTBmZWY2Y2VmNDhhYyJ9LCJpYXQiOjE3NDQ3OTIzNDgsImV4cCI6MTc1MjU2ODM0OH0.vN7CFwB7GNFjNPKX7DCG-Br4RCF5n6hArQxBZDnneIo', '2024-12-02 21:17:48', '2025-04-16 08:30:22');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `google_id` varchar(255) DEFAULT NULL,
  `facebook_id` varchar(255) DEFAULT NULL,
  `telegram_id` varchar(255) DEFAULT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `role_as` tinyint(4) NOT NULL DEFAULT 0 COMMENT '0=user,1=admin',
  `avatar` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `password_reset_token` varchar(255) DEFAULT NULL,
  `password_reset_expires_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `image`, `email_verified_at`, `password`, `google_id`, `facebook_id`, `telegram_id`, `remember_token`, `created_at`, `updated_at`, `role_as`, `avatar`, `phone`, `address`, `password_reset_token`, `password_reset_expires_at`) VALUES
(1, 'Sievphor Tonn', 'tonnsievphor@gmail.com', NULL, NULL, NULL, '115072387042697632584', NULL, NULL, NULL, '2024-12-02 19:13:25', '2024-12-02 23:58:03', 0, 'https://lh3.googleusercontent.com/a/ACg8ocKqPCL-Hk2mVjRZkk0FxYqZKiMTp3wbdp0tP1MESQT31VDDX_G5=s96-c', '0972273544', 'P.O. Box 10308, Manama\r\nP.O. Box 10308, Manama', NULL, NULL),
(2, 'ទន់​ សៀវផរ', 'testhomesport@gmail.com', '1733185450.jpg', NULL, '$2y$10$Ez9SSFEjOeE7DU0liHXKU.ZiSDPa.HHSxQ/GuaQUmaDOjxiQcb4NC', NULL, NULL, NULL, NULL, '2024-12-03 00:24:10', '2024-12-03 00:24:10', 0, NULL, NULL, NULL, NULL, NULL),
(3, 'test2', 'test2@gmail.com', '1733219387.jfif', NULL, '$2y$10$B6PWYtyBlceQULTKkwSH9OgIK1gTzwSxBJkvBz7S7nW3.jP8CF8o6', NULL, NULL, NULL, NULL, '2024-12-03 09:49:47', '2024-12-03 09:49:47', 0, NULL, NULL, NULL, NULL, NULL),
(4, 'Siev Phor', 'phorphor813@gmail.com', NULL, NULL, NULL, NULL, '1047235720249571', NULL, NULL, '2024-12-03 10:08:25', '2024-12-03 10:08:25', 0, 'https://platform-lookaside.fbsbx.com/platform/profilepic/?asid=1047235720249571&height=200&width=200&ext=1735812506&hash=AbZ1I1AK2unYxw07yDlCEl8e', NULL, NULL, NULL, NULL),
(5, 'Rara', 'rara@gmail.com', '1733224507.jpg', NULL, '$2y$10$mGrr2hmo7HrR32iKCAOlw.CWXyUuUMkuNsi0F3JIHFqSUZM7fVLii', NULL, NULL, NULL, NULL, '2024-12-03 11:15:07', '2024-12-03 11:15:07', 0, NULL, NULL, NULL, NULL, NULL),
(6, 'TONN SIEVPHOR', 'sievphortonn@gmail.com', NULL, NULL, NULL, '105590598135862836462', NULL, NULL, NULL, '2025-04-16 08:25:55', '2025-04-16 08:25:55', 0, 'https://lh3.googleusercontent.com/a/ACg8ocKpfXe_DoYwXtEC3XiEUx8WQLyrSb4ZnXFSfhFdq06vh3_NWHk=s96-c', NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `wishlists`
--

CREATE TABLE `wishlists` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `wishlists`
--

INSERT INTO `wishlists` (`id`, `user_id`, `product_id`, `created_at`, `updated_at`) VALUES
(1, 1, 2, '2024-12-02 23:23:24', '2024-12-02 23:23:24');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `admins_email_unique` (`email`);

--
-- Indexes for table `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `carts`
--
ALTER TABLE `carts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cart_totals`
--
ALTER TABLE `cart_totals`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cart_totals_user_id_foreign` (`user_id`),
  ADD KEY `cart_totals_coupon_id_foreign` (`coupon_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `colors`
--
ALTER TABLE `colors`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `coupons`
--
ALTER TABLE `coupons`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `coupons_code_unique` (`code`);

--
-- Indexes for table `discounts`
--
ALTER TABLE `discounts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `front_detail`
--
ALTER TABLE `front_detail`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `merchantbakongkhqrs`
--
ALTER TABLE `merchantbakongkhqrs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`id`),
  ADD KEY `notifications_notifiable_type_notifiable_id_index` (`notifiable_type`,`notifiable_id`);

--
-- Indexes for table `order`
--
ALTER TABLE `order`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_items`
--
ALTER TABLE `order_items`
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
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `products_category_id_foreign` (`category_id`),
  ADD KEY `products_brand_id_foreign` (`brand_id`);

--
-- Indexes for table `product_colors`
--
ALTER TABLE `product_colors`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_colors_product_id_foreign` (`product_id`),
  ADD KEY `product_colors_color_id_foreign` (`color_id`);

--
-- Indexes for table `product_images`
--
ALTER TABLE `product_images`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_images_product_id_foreign` (`product_id`);

--
-- Indexes for table `product_sizes`
--
ALTER TABLE `product_sizes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_sizes_product_id_foreign` (`product_id`),
  ADD KEY `product_sizes_size_id_foreign` (`size_id`);

--
-- Indexes for table `reports`
--
ALTER TABLE `reports`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sizes`
--
ALTER TABLE `sizes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sliders`
--
ALTER TABLE `sliders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sub-categories`
--
ALTER TABLE `sub-categories`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sub_categories_category_id_foreign` (`category_id`);

--
-- Indexes for table `telegram_chat_ids`
--
ALTER TABLE `telegram_chat_ids`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `telegram_users`
--
ALTER TABLE `telegram_users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `telegram_users_phone_unique` (`phone`);

--
-- Indexes for table `tokens`
--
ALTER TABLE `tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `tokens_name_unique` (`name`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD UNIQUE KEY `users_telegram_id_unique` (`telegram_id`),
  ADD UNIQUE KEY `users_password_reset_token_unique` (`password_reset_token`);

--
-- Indexes for table `wishlists`
--
ALTER TABLE `wishlists`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `carts`
--
ALTER TABLE `carts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `cart_totals`
--
ALTER TABLE `cart_totals`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `colors`
--
ALTER TABLE `colors`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `coupons`
--
ALTER TABLE `coupons`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `discounts`
--
ALTER TABLE `discounts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `front_detail`
--
ALTER TABLE `front_detail`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `merchantbakongkhqrs`
--
ALTER TABLE `merchantbakongkhqrs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT for table `order`
--
ALTER TABLE `order`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `order_items`
--
ALTER TABLE `order_items`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `product_colors`
--
ALTER TABLE `product_colors`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `product_images`
--
ALTER TABLE `product_images`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `product_sizes`
--
ALTER TABLE `product_sizes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `reports`
--
ALTER TABLE `reports`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sizes`
--
ALTER TABLE `sizes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `sliders`
--
ALTER TABLE `sliders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `sub-categories`
--
ALTER TABLE `sub-categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `telegram_chat_ids`
--
ALTER TABLE `telegram_chat_ids`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `telegram_users`
--
ALTER TABLE `telegram_users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tokens`
--
ALTER TABLE `tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `wishlists`
--
ALTER TABLE `wishlists`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cart_totals`
--
ALTER TABLE `cart_totals`
  ADD CONSTRAINT `cart_totals_coupon_id_foreign` FOREIGN KEY (`coupon_id`) REFERENCES `coupons` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `cart_totals_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_brand_id_foreign` FOREIGN KEY (`brand_id`) REFERENCES `brands` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `products_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `product_colors`
--
ALTER TABLE `product_colors`
  ADD CONSTRAINT `product_colors_color_id_foreign` FOREIGN KEY (`color_id`) REFERENCES `colors` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `product_colors_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `product_images`
--
ALTER TABLE `product_images`
  ADD CONSTRAINT `product_images_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `product_sizes`
--
ALTER TABLE `product_sizes`
  ADD CONSTRAINT `product_sizes_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `product_sizes_size_id_foreign` FOREIGN KEY (`size_id`) REFERENCES `sizes` (`id`) ON DELETE SET NULL;

--
-- Constraints for table `sub-categories`
--
ALTER TABLE `sub-categories`
  ADD CONSTRAINT `sub_categories_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
