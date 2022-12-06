-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Sep 14, 2022 at 06:27 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `php_ecommerce`
--

-- --------------------------------------------------------

--
-- Table structure for table `banners`
--

CREATE TABLE `banners` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `link` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `banners`
--

INSERT INTO `banners` (`id`, `title`, `image`, `link`, `description`, `created_at`, `updated_at`) VALUES
(14, 'ÂU PHỤC', 'public/product/images/QaURqefRKyzVIHbgiy1wzzEhlyC1SLihYIYiZubY.jpg', 'http://127.0.0.1:8004/productbycategory/24', 'Trang phục', '2022-08-25 02:46:46', '2022-08-25 03:04:35'),
(15, 'STYLE STREET', 'public/product/images/QOr42zghhfvwTxAjTfymHURXtggHfyX7V84mo7tF.jpg', 'http://127.0.0.1:8004/productbycategory/23', 'Set thể thao', '2022-08-25 02:49:21', '2022-08-25 02:49:21'),
(16, 'BODY', 'public/product/images/kZKGqhJjIwevFMmMb4qY7eZpYLTyRSRomKUCfC1r.jpg', 'http://127.0.0.1:8004/productbycategory/22', 'set body', '2022-08-25 02:50:28', '2022-08-25 02:50:28'),
(17, 'STYLE FASHION', 'public/product/images/4ajwS8NKoclYO7m3GMHEzZghcYyKHsSlCPzeq5do.jpg', 'http://127.0.0.1:8004/productbycategory/25', 'Style', '2022-08-25 03:03:28', '2022-08-25 03:03:28');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `parent_id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `active` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `parent_id`, `name`, `description`, `active`, `created_at`, `updated_at`) VALUES
(18, 0, 'Áo', 'Áo', 1, '2022-08-25 02:30:56', '2022-08-25 02:30:56'),
(19, 0, 'Quần', 'Quần', 1, '2022-08-25 02:31:10', '2022-08-25 02:31:10'),
(20, 0, 'Giày', 'Giày', 1, '2022-08-25 02:31:34', '2022-08-25 02:31:34'),
(21, 0, 'Phụ Kiện', 'Phụ Kiện', 1, '2022-08-25 02:32:43', '2022-08-25 02:32:43'),
(22, 18, 'Áo thun', 'Áo Thun', 1, '2022-08-25 02:33:12', '2022-08-25 02:33:12'),
(23, 18, 'Áo Khoác', 'khoác', 1, '2022-08-25 02:33:33', '2022-08-25 02:33:33'),
(24, 19, 'Quần Âu', 'qa', 1, '2022-08-25 02:33:58', '2022-08-25 02:33:58'),
(25, 19, 'Quần Thể Thao', 'Quần Thể Thao', 1, '2022-08-25 02:34:21', '2022-08-25 02:34:33'),
(26, 20, 'Giày Thể Thao', 'a', 1, '2022-08-25 02:34:55', '2022-08-25 02:34:55'),
(27, 20, 'Giày Tây', 'ádf', 1, '2022-08-25 02:35:08', '2022-08-25 02:35:08'),
(28, 21, 'Mũ', 'mũ', 1, '2022-08-25 02:35:27', '2022-08-25 02:35:27'),
(29, 21, 'Balo', 'bl', 1, '2022-08-25 02:41:52', '2022-08-25 02:41:52'),
(30, 21, 'Đồng hồ', 'dd', 1, '2022-08-25 02:43:42', '2022-08-25 02:43:42');

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE `contacts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` text COLLATE utf8mb4_unicode_ci NOT NULL,
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
-- Table structure for table `forget_password`
--

CREATE TABLE `forget_password` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
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
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2022_07_25_033040_create_categories_table', 1),
(6, '2022_07_25_083536_create_products_table', 1),
(11, '2022_08_02_014131_add_id_admin_to_users_table', 3),
(17, '2022_08_02_073657_create_product_details_table', 4),
(21, '2022_08_03_030429_create_password_resets_table', 6),
(22, '2022_08_05_021150_create_banners_table', 7),
(24, '2022_08_02_093551_create_product_images_table', 9),
(31, '2022_08_12_065256_update_column_role_table', 12),
(35, '2022_08_15_022935_create_permission_tables', 13),
(36, '2022_08_01_080603_create_forget_password_table', 14),
(39, '2022_09_06_131031_create_orders_table', 15),
(40, '2022_09_06_110724_create_order_details_table', 16),
(41, '2022_09_06_143752_update_addstatus_to_orders_table', 17);

-- --------------------------------------------------------

--
-- Table structure for table `model_has_permissions`
--

CREATE TABLE `model_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `model_has_permissions`
--

INSERT INTO `model_has_permissions` (`permission_id`, `model_type`, `model_id`) VALUES
(1, 'App\\Models\\User', 1),
(1, 'App\\Models\\User', 12),
(1, 'App\\Models\\User', 17),
(1, 'App\\Models\\User', 18),
(2, 'App\\Models\\User', 18),
(2, 'App\\Models\\User', 19),
(3, 'App\\Models\\User', 9),
(3, 'App\\Models\\User', 12),
(3, 'App\\Models\\User', 16),
(3, 'App\\Models\\User', 19),
(4, 'App\\Models\\User', 1),
(4, 'App\\Models\\User', 12),
(4, 'App\\Models\\User', 18),
(4, 'App\\Models\\User', 19),
(5, 'App\\Models\\User', 1),
(5, 'App\\Models\\User', 2),
(5, 'App\\Models\\User', 3),
(5, 'App\\Models\\User', 10),
(5, 'App\\Models\\User', 16),
(5, 'App\\Models\\User', 18),
(5, 'App\\Models\\User', 19),
(7, 'App\\Models\\User', 1),
(7, 'App\\Models\\User', 3),
(7, 'App\\Models\\User', 16),
(7, 'App\\Models\\User', 18),
(7, 'App\\Models\\User', 19),
(8, 'App\\Models\\User', 1),
(8, 'App\\Models\\User', 16),
(8, 'App\\Models\\User', 18),
(10, 'App\\Models\\User', 1),
(10, 'App\\Models\\User', 16),
(11, 'App\\Models\\User', 1),
(11, 'App\\Models\\User', 16),
(11, 'App\\Models\\User', 18),
(11, 'App\\Models\\User', 19),
(12, 'App\\Models\\User', 1),
(12, 'App\\Models\\User', 16),
(12, 'App\\Models\\User', 19),
(13, 'App\\Models\\User', 1),
(13, 'App\\Models\\User', 11),
(13, 'App\\Models\\User', 16),
(14, 'App\\Models\\User', 1),
(14, 'App\\Models\\User', 11),
(14, 'App\\Models\\User', 16),
(16, 'App\\Models\\User', 1),
(16, 'App\\Models\\User', 11),
(16, 'App\\Models\\User', 16),
(17, 'App\\Models\\User', 1),
(17, 'App\\Models\\User', 16),
(19, 'App\\Models\\User', 17),
(20, 'App\\Models\\User', 1),
(20, 'App\\Models\\User', 16),
(22, 'App\\Models\\User', 1),
(23, 'App\\Models\\User', 1),
(23, 'App\\Models\\User', 16),
(28, 'App\\Models\\User', 1),
(28, 'App\\Models\\User', 16),
(29, 'App\\Models\\User', 1),
(29, 'App\\Models\\User', 16);

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
(1, 'App\\Models\\User', 19),
(2, 'App\\Models\\User', 18),
(3, 'App\\Models\\User', 3),
(3, 'App\\Models\\User', 9),
(3, 'App\\Models\\User', 10),
(3, 'App\\Models\\User', 17),
(4, 'App\\Models\\User', 1),
(4, 'App\\Models\\User', 11),
(4, 'App\\Models\\User', 16);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `name`, `phone`, `address`, `email`, `content`, `status`, `created_at`, `updated_at`) VALUES
(6, 'nam hoang', '0833405209', 'ngu hanh son', 'nam070202@gmail.com', 'dá', 0, '2022-09-06 07:42:24', '2022-09-06 07:42:24'),
(8, 'nam hoang', '0833405209', 'ngu hanh son', 'nam070202@gmail.com', 'fasfa', 1, '2022-09-06 08:25:46', '2022-09-06 08:25:46'),
(9, 'nam hoang', '0833405209', 'ngu hanh son', 'nam070202@gmail.com', 'ưqe', 0, '2022-09-06 08:26:08', '2022-09-06 08:26:08'),
(10, 'nam hoang', '0833405209', 'ngu hanh son', 'nam070202@gmail.com', 'ljdlkasf', 2, '2022-09-06 08:59:51', '2022-09-06 19:39:43'),
(11, 'nam hoangjkf hjkas', '0833405209', 'ngu hanh son', 'nam070202@gmail.com', 'dà', 1, '2022-09-06 09:00:47', '2022-09-06 20:18:04'),
(12, 'nam hoang 11213', '0833405209', 'ngu hanh son', 'nam070202@gmail.com', 'adfa', 0, '2022-09-06 09:01:35', '2022-09-06 20:17:58');

-- --------------------------------------------------------

--
-- Table structure for table `order_details`
--

CREATE TABLE `order_details` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_id` bigint(20) UNSIGNED NOT NULL,
  `product_id` int(11) NOT NULL,
  `pty` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `order_details`
--

INSERT INTO `order_details` (`id`, `order_id`, `product_id`, `pty`, `price`, `created_at`, `updated_at`) VALUES
(4, 6, 73, 1, 22, NULL, NULL),
(5, 8, 60, 1, 50, NULL, NULL),
(6, 9, 60, 1, 50, NULL, NULL),
(7, 10, 72, 1, 11, NULL, NULL),
(8, 11, 73, 4, 22, NULL, NULL),
(9, 12, 65, 4, 9, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `password_resets`
--

INSERT INTO `password_resets` (`id`, `email`, `token`, `created_at`, `updated_at`) VALUES
(13, 'nam@gmail.com', 'Xu2gsuvjS0NdxIfvNOMCf2Y8ZgBhDarejY3rDduxQPJFWDmlrZqLF1YiaLn1rIo1', '2022-08-03 00:25:39', NULL),
(14, 'nam@gmail.com', 'DJUpQexejo2vycLqP2DezzPv7b5jh3m1CAtxhlHXlMbozzOai6nqt6edVnEBrlHe', '2022-08-03 00:25:51', NULL);

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
(1, 'add category', 'web', '2022-08-14 20:06:50', '2022-08-14 20:06:50'),
(2, 'edit category', 'web', '2022-08-14 20:07:02', '2022-08-14 20:07:02'),
(3, 'delete category', 'web', '2022-08-14 20:07:14', '2022-08-14 20:07:14'),
(4, 'read category', 'web', '2022-08-14 20:07:21', '2022-08-14 20:07:21'),
(5, 'read product', 'web', '2022-08-14 20:29:16', '2022-08-14 20:29:16'),
(7, 'edit product', 'web', '2022-08-14 20:47:41', '2022-08-14 20:47:41'),
(8, 'write product', 'web', '2022-08-15 18:48:10', '2022-08-15 18:48:10'),
(10, 'test', 'web', '2022-08-15 20:18:00', '2022-08-15 20:18:00'),
(11, 'search product', 'web', '2022-08-17 18:59:06', '2022-08-17 18:59:06'),
(12, 'delete product', 'web', '2022-08-17 18:59:06', '2022-08-17 18:59:06'),
(13, 'permission user', 'web', '2022-08-17 18:59:06', '2022-08-17 18:59:06'),
(14, 'role user', 'web', '2022-08-17 18:59:06', '2022-08-17 18:59:06'),
(15, 'delete user', 'web', '2022-08-17 18:59:06', '2022-08-17 18:59:06'),
(16, 'edit user', 'web', '2022-08-17 18:59:06', '2022-08-17 18:59:06'),
(17, 'delete cart', 'web', '2022-08-17 18:59:06', '2022-08-17 18:59:06'),
(19, 'add product', 'web', '2022-08-17 19:38:05', '2022-08-17 19:38:05'),
(20, 'read user', 'web', '2022-08-26 00:46:41', '2022-08-26 00:46:41'),
(21, 'add user', 'web', '2022-08-26 00:46:54', '2022-08-26 00:46:54'),
(22, 'set role', 'web', '2022-08-26 00:47:11', '2022-08-26 00:47:11'),
(23, 'set permission', 'web', '2022-08-26 00:47:24', '2022-08-26 00:47:24'),
(24, 'read banner', 'web', '2022-08-26 00:53:43', '2022-08-26 00:53:43'),
(25, 'add banner', 'web', '2022-08-26 00:53:49', '2022-08-26 00:53:49'),
(26, 'delete banner', 'web', '2022-08-26 00:54:02', '2022-08-26 00:54:02'),
(27, 'edit banner', 'web', '2022-08-26 00:54:09', '2022-08-26 00:54:09'),
(28, 'read cart', 'web', '2022-08-26 00:59:50', '2022-08-26 00:59:50'),
(29, 'read cart detail', 'web', '2022-08-26 00:59:59', '2022-08-26 00:59:59');

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
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `price` int(11) NOT NULL,
  `total` int(11) NOT NULL,
  `quantity` int(11) DEFAULT NULL,
  `category_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `image`, `price`, `total`, `quantity`, `category_id`, `created_at`, `updated_at`) VALUES
(59, ' Áo Khoác thể thao', 'public/product/images/sovAJuZGORboY9yTnh4xOdHWYOrDqBJ4wDaJF4H8.jpg', 12, 12, 434, 23, '2022-08-25 02:36:45', '2022-08-25 02:36:45'),
(60, 'Giày CV', 'public/product/images/3FP7LybQ024VMMbRj8YvhVGpzsRSbZWWiuWU3PAK.jpg', 50, 8, 24, 26, '2022-08-25 02:37:26', '2022-09-06 08:26:08'),
(61, 'Giày da', 'public/product/images/vltWADdRdwtP1SrThZq7HdBHEiMeUYVhmcDMcyKv.jpg', 45, 321, 34, 27, '2022-08-25 02:38:04', '2022-08-25 02:38:04'),
(62, 'Áo jean', 'public/product/images/0Z2As7AVDd8RR41zrqGcmH39meF7inJqBHIhl0xk.jpg', 20, 121, 34, 23, '2022-08-25 02:38:41', '2022-08-25 02:38:41'),
(63, 'Áo chống nắng', 'public/product/images/64vcmPweNiu58N7c5mDeGADu8SuVXZ8xlAaK7XWJ.jpg', 23, 11, 34, 23, '2022-08-25 02:39:25', '2022-08-25 02:39:25'),
(64, 'Quần thể thao đen', 'public/product/images/nhSrVD1SJdmvAtvWJwEv8ub36w1dFgJqoo6DwqWU.jpg', 191, 23, 34, 25, '2022-08-25 02:40:07', '2022-08-25 02:40:07'),
(65, 'Mũ Đen', 'public/product/images/8UwJmXKs45jAJuKwAT8FiN2d7uitBkUBRdQ6p1kO.jpg', 9, 8, 34, 28, '2022-08-25 02:40:38', '2022-09-06 09:01:35'),
(66, 'Quần tây', 'public/product/images/unXE5wAnZRVRu3uFVcjjaoGnDBarcl1te9JyItxX.jpg', 12, 1, 34, 24, '2022-08-25 02:41:32', '2022-08-25 02:41:32'),
(67, 'Balo xam', 'public/product/images/H2EDLXCXdfuo5HZDzIFnybG7ggYPatKQeRsyVcfg.jpg', 12, 12, 34, 29, '2022-08-25 02:42:32', '2022-08-25 02:42:32'),
(68, 'ba lo hoạ tiết', 'public/product/images/pqgl4arxsPoyCJHTpYejOxkImprEsahDJNWDmFE4.jpg', 12, 123, 34, 29, '2022-08-25 02:43:05', '2022-08-25 02:43:05'),
(69, 'Đồng hồ đeo tay', 'public/product/images/UMYmW203b5yifAVnyb9SayIiNMfer5pMpiqGS1Qf.jpg', 122, 12, 34, 30, '2022-08-25 02:44:15', '2022-08-25 02:44:15'),
(70, 'Áo ấm', 'public/product/images/6KgdoChtI7hdbEpkbL1r70yBZYqWoAuOVHXiRHsS.jpg', 12, 2, 43, 23, '2022-08-25 02:45:15', '2022-08-25 02:45:15'),
(71, 'Áo thun trắng', 'public/product/images/qaR7h158rBynovqHidr8WEkIQOqV9Afk4GrC44DJ.jpg', 6, 12, 23, 22, '2022-08-25 02:51:04', '2022-08-25 02:51:04'),
(72, 'Áo thun Hình xương rồng', 'public/product/images/GGkw1YPVzD9uXV3lmrnkQrMzl9XnAcWpx4E27U04.jpg', 11, 11, 43, 22, '2022-08-25 02:51:34', '2022-09-06 08:59:51'),
(73, 'Áo thun đen', 'public/product/images/8SDmh8cLV4UHjAOFFKdWEpNFqt84nZhEMrLbI2HH.jpg', 22, 8, 34, 22, '2022-08-25 09:06:36', '2022-09-06 09:00:47'),
(74, 'Áo thun đen', 'public/product/images/4SlYIgayWWunH8nvRszjxPXVoqEMUVkAuyPfm8Nq.jpg', 22, 12, 24, 22, '2022-08-25 09:11:12', '2022-08-25 09:11:12'),
(75, 'Ao thun xam', 'public/product/images/CkyFrbWNfg7hTj9B03NU6z5ZZAgMW4hcVPOdATwA.jpg', 22, 11, 34, 22, '2022-08-25 09:12:30', '2022-08-25 09:12:30');

-- --------------------------------------------------------

--
-- Table structure for table `product_details`
--

CREATE TABLE `product_details` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `attribute` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_details`
--

INSERT INTO `product_details` (`id`, `product_id`, `description`, `attribute`, `value`, `created_at`, `updated_at`) VALUES
(1, 1, 'ada', 'a', 'a', '2022-08-02 00:44:30', '2022-08-02 00:52:26'),
(2, 2, 'adsf', 'adf', 'adsf', '2022-08-02 00:52:54', '2022-08-02 00:52:54'),
(3, 58, 'fasdf', 'sfad', 'àd', '2022-08-23 19:02:45', '2022-08-23 19:02:45');

-- --------------------------------------------------------

--
-- Table structure for table `product_images`
--

CREATE TABLE `product_images` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `image` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_images`
--

INSERT INTO `product_images` (`id`, `image`, `product_id`, `created_at`, `updated_at`) VALUES
(1, '1660808215.jpg', 52, '2022-08-18 00:36:55', '2022-08-18 00:36:55');

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
(1, 'writer', 'web', '2022-08-14 20:03:38', '2022-08-14 20:03:38'),
(2, 'editer', 'web', '2022-08-14 20:04:36', '2022-08-14 20:04:36'),
(3, 'publised', 'web', '2022-08-14 20:04:50', '2022-08-14 20:04:50'),
(4, 'admin', 'web', '2022-08-14 20:05:15', '2022-08-14 20:05:15'),
(5, 'full', 'web', '2022-08-18 01:22:34', '2022-08-18 01:22:34');

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
(1, 3),
(1, 4),
(2, 1),
(2, 2),
(4, 1),
(4, 2),
(4, 4),
(5, 1),
(5, 2),
(5, 4),
(7, 1),
(7, 2),
(7, 4),
(8, 1),
(8, 2),
(8, 4),
(10, 1),
(10, 4),
(11, 1),
(11, 2),
(11, 4),
(12, 1),
(12, 4),
(13, 1),
(13, 4),
(14, 1),
(14, 4),
(15, 1),
(16, 1),
(16, 4),
(17, 1),
(17, 4),
(19, 1),
(19, 3),
(20, 1),
(20, 4),
(21, 1),
(22, 1),
(22, 4),
(23, 1),
(23, 4),
(24, 1),
(25, 1),
(26, 1),
(27, 1),
(28, 1),
(28, 4),
(29, 1),
(29, 4);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_admin` int(11) DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `id_admin`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'nam', 'ndhnam.2000@gmail.com', NULL, '$2y$10$QJ9Icb79p0SaXvEtEQt1OOgmM0HeJi/dcAWVQcM4i9JYVLHqhqUCa', 1, NULL, '2022-08-02 21:30:27', '2022-08-17 21:02:35'),
(16, 'nam 1', 'nam1@gmail.com', NULL, '$2y$10$QJ9Icb79p0SaXvEtEQt1OOgmM0HeJi/dcAWVQcM4i9JYVLHqhqUCa', 1, NULL, '2022-08-17 19:27:30', '2022-08-18 01:24:37'),
(17, 'nam2', 'nam2@gmail.com', NULL, '$2y$10$TrruTvCY9bZd6c3IbhnLPOsfEvzEVEP4GYu.JbNsJ2J.e5mNBR0oS', 1, NULL, '2022-08-17 19:28:08', '2022-08-17 21:45:21'),
(18, 'nam3', 'nam3@gmail.com', NULL, '$2y$10$ELexlYiN2I82DBxFRKXHZepYA.lUnwx9QW25awEgZiOk3Mr1Wl3t.', 1, NULL, '2022-08-17 19:28:31', '2022-08-17 21:45:01'),
(19, 'nam4', 'nam4@gmail.com', NULL, '$2y$10$tYFiGOtzOJlVdjc/oX8gh.N8sqkGysYRQrrK0Ofm7PEJOWL7x0l7G', 1, NULL, '2022-08-17 19:28:48', '2022-08-17 21:45:12');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `banners`
--
ALTER TABLE `banners`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `forget_password`
--
ALTER TABLE `forget_password`
  ADD KEY `forget_password_email_index` (`email`);

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
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_details`
--
ALTER TABLE `order_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_details_order_id_foreign` (`order_id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD PRIMARY KEY (`id`),
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
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_details`
--
ALTER TABLE `product_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_images`
--
ALTER TABLE `product_images`
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
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `banners`
--
ALTER TABLE `banners`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=66;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `order_details`
--
ALTER TABLE `order_details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `password_resets`
--
ALTER TABLE `password_resets`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=81;

--
-- AUTO_INCREMENT for table `product_details`
--
ALTER TABLE `product_details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `product_images`
--
ALTER TABLE `product_images`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- Constraints for dumped tables
--

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
-- Constraints for table `order_details`
--
ALTER TABLE `order_details`
  ADD CONSTRAINT `order_details_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
