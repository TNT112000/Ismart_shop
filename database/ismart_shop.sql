-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3307
-- Generation Time: Dec 25, 2023 at 09:04 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ismart_shop`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `name` varchar(20) NOT NULL,
  `url` varchar(100) NOT NULL,
  `stt` int(100) NOT NULL,
  `created_by` varchar(50) NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `created_at`, `updated_at`, `name`, `url`, `stt`, `created_by`, `deleted_at`) VALUES
(18, '2023-12-15 13:53:18', '2023-12-15 13:53:18', 'Điện thoại', 'Mua điện thoại', 2, 'Admin', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `content` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `details`
--

CREATE TABLE `details` (
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
-- Table structure for table `introduces`
--

CREATE TABLE `introduces` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `address` varchar(100) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `title` varchar(100) NOT NULL,
  `content` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `introduces`
--

INSERT INTO `introduces` (`id`, `created_at`, `updated_at`, `address`, `phone`, `email`, `title`, `content`) VALUES
(1, '2023-12-21 04:03:44', '2023-12-21 04:03:44', 'sdfsdf', '0952342345', 'dsfsdfsdf@gmail.com', 'ngoctien@gmail.com', '<p>dfsdfsdfdfdsf</p>');

-- --------------------------------------------------------

--
-- Table structure for table `likes`
--

CREATE TABLE `likes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `status` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `lines`
--

CREATE TABLE `lines` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(30) NOT NULL,
  `created_by` varchar(20) NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `lines`
--

INSERT INTO `lines` (`id`, `created_at`, `updated_at`, `category_id`, `name`, `created_by`, `deleted_at`) VALUES
(2, '2023-12-15 14:36:09', '2023-12-22 16:01:54', 18, 'Iphone12', 'Admin', NULL),
(3, '2023-12-15 18:47:39', '2023-12-22 15:14:30', 18, 'SamSung12', 'Admin', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `media`
--

CREATE TABLE `media` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `image` varchar(100) NOT NULL,
  `link` varchar(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `location` int(10) NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_by` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `media`
--

INSERT INTO `media` (`id`, `created_at`, `updated_at`, `image`, `link`, `name`, `location`, `deleted_at`, `created_by`) VALUES
(1, '2023-12-17 14:43:58', '2023-12-17 14:43:58', 'admin/images/5586986_razer_hammerhead_case.jpg', 'fsdf', 'sdfsdfsdf', 2, NULL, 'Admin');

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
(5, '2014_10_12_000000_create_users_table', 1),
(6, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(7, '2019_08_19_000000_create_failed_jobs_table', 1),
(8, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(9, '2023_12_10_065136_create_tensanphams_table', 2),
(10, '2023_12_10_065553_create_roles_table', 2),
(11, '2023_12_10_065731_create_productes_table', 2),
(12, '2023_12_10_072505_create_posts_table', 3),
(13, '2023_12_10_072525_create_lines_table', 3),
(14, '2023_12_10_072543_create_categories_table', 3),
(15, '2023_12_10_072645_create_media_table', 3),
(16, '2023_12_10_072656_create_details_table', 3),
(17, '2023_12_10_072727_create_product_images_table', 3),
(18, '2023_12_10_072757_create_orders_table', 3),
(19, '2023_12_10_072839_create_sliders_table', 3),
(20, '2023_12_10_072858_create_introduces_table', 3),
(21, '2023_12_10_072913_create_contacts_table', 3),
(22, '2023_12_10_072949_create_order_details_table', 3),
(23, '2023_12_10_073947_add_column_to_users_table', 4),
(24, '2023_12_10_074144_add_column_to_posts_table', 4),
(25, '2023_12_10_153020_add_column_to_roles_table', 4),
(26, '2023_12_10_153230_add_column_to_categories_table', 4),
(27, '2023_12_10_153326_add_column_to_lines_table', 4),
(28, '2023_12_10_154849_add_column_to_medias_table', 5),
(29, '2023_12_11_015509_add_column_to_product_images_table', 5),
(31, '2023_12_11_022255_add_column_to_oder_details_table', 6),
(32, '2023_12_11_022607_add_column_to_introduces_table', 6),
(33, '2023_12_11_022655_add_column_to_contacts_table', 6),
(34, '2023_12_11_022912_add_column_to_sliders_table', 6),
(35, '2023_12_11_024200_create_comments_table', 6),
(36, '2023_12_11_024218_create_likes_table', 6),
(37, '2023_12_11_024315_create_promotions_table', 6),
(38, '2023_12_11_023113_add_column_to_products_table', 7),
(39, '2023_12_11_030235_add_new_column_to_likes_table', 8),
(40, '2023_12_11_030351_add_new_column_to_promotions_table', 8),
(41, '2023_12_11_031130_add_new_column_to_comments_table', 8),
(42, '2014_10_12_100000_create_password_resets_table', 9),
(43, '2023_12_15_093249_add_new_column_to_lines_table', 9),
(44, '2023_12_17_144853_add_soft_deletes_to_products', 10),
(45, '2023_12_17_145234_add_soft_deletes_to_categories', 11),
(46, '2023_12_17_145338_add_soft_deletes_to_lines', 11),
(47, '2023_12_17_145413_add_soft_deletes_to_posts', 11),
(48, '2023_12_17_145421_add_soft_deletes_to_medias', 12),
(49, '2023_12_17_145435_add_soft_deletes_to_sliders', 12),
(50, '2023_12_17_145541_add_soft_deletes_to_orders', 12),
(51, '2023_12_22_203733_add_new_column_to_product_images_table', 13);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `order_details`
--

CREATE TABLE `order_details` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `order_id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `qty` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
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
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `image` varchar(100) NOT NULL,
  `title` varchar(100) NOT NULL,
  `content` text NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_by` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `created_at`, `updated_at`, `image`, `title`, `content`, `deleted_at`, `created_by`) VALUES
(1, '2023-12-17 10:04:50', '2023-12-22 15:25:34', 'admin/images/gaming logite.jpg', 'dsfdsfs', '<p>fsdfsdfsdf</p>', NULL, 'Admin'),
(2, '2023-12-19 15:07:40', '2023-12-19 15:07:40', 'admin/images/mmm.PNG', '32123123', '<p>khgkihihuilhuihku</p>', NULL, 'Admin'),
(3, '2023-12-21 03:09:17', '2023-12-21 03:09:17', 'admin/images/Capture.PNG', 'ádsadad', '<p>sdfsadas</p>', NULL, 'Admin'),
(4, '2023-12-22 03:19:49', '2023-12-22 03:19:49', 'admin/images/Capture - Sao chép.PNG', 'edsadsd', '<p>&aacute;dasdas</p>', NULL, 'Admin');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `name` varchar(100) NOT NULL,
  `price` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `image_main` varchar(255) NOT NULL,
  `describe` text NOT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `line_id` bigint(20) UNSIGNED NOT NULL,
  `promotion_id` bigint(20) UNSIGNED DEFAULT NULL,
  `transport` int(50) NOT NULL,
  `product_code` varchar(20) NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `hot` int(2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `created_at`, `updated_at`, `name`, `price`, `qty`, `image_main`, `describe`, `category_id`, `line_id`, `promotion_id`, `transport`, `product_code`, `deleted_at`, `hot`) VALUES
(17, '2023-12-22 10:10:07', '2023-12-22 16:06:48', 'fdsfsd', 1212, 121, 'admin/images/Capture - Sao chép.PNG', '<p>sdfdsfsdfsdfsdfsdfsdfsdfsdfsdfsdfsfsdf</p>', 18, 3, NULL, 12121, 'éd', NULL, 1),
(18, '2023-12-22 13:34:29', '2023-12-22 13:39:25', 'dsfsdfsdf', 1212, 12, 'admin/images/gaming logite.jpg', '<p>&agrave;dsdas</p>', 18, 3, NULL, 1212, 'fdsfdsf', NULL, NULL),
(19, '2023-12-23 09:02:15', '2023-12-23 09:02:15', 'Ngọc Tiến', 123456, 12, 'admin/images/da_xxtk3_1 - Sao chép.PNG', '<p>gdfgdfgfdgfdgdgdg</p>', 18, 3, NULL, 123456, 'MASP12', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `product_images`
--

CREATE TABLE `product_images` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `name` varchar(100) NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_images`
--

INSERT INTO `product_images` (`id`, `created_at`, `updated_at`, `name`, `product_id`, `deleted_at`) VALUES
(149, '2023-12-22 13:34:29', '2023-12-22 13:39:25', 'admin/images/tai-nghe-true-wireless-la-gi-uu-nhuoc-diem-the-nao-01-800x600.jpg', 18, NULL),
(150, '2023-12-22 13:34:29', '2023-12-22 13:39:25', 'admin/images/TNT_TV_logo.PNG - Sao chép.webp', 18, NULL),
(151, '2023-12-22 13:34:29', '2023-12-22 13:39:25', 'admin/images/tntshop - Sao chép.jpg', 18, NULL),
(152, '2023-12-22 13:34:29', '2023-12-22 13:39:25', 'admin/images/th - Sao chép - Sao chép.jpg', 18, NULL),
(153, '2023-12-22 13:34:29', '2023-12-22 13:39:48', 'admin/images/th - Sao chép.jpg', 18, '2023-12-22 13:39:48'),
(154, '2023-12-22 13:38:56', '2023-12-22 13:39:47', 'admin/images/Capture - Sao chép.PNG', 18, '2023-12-22 13:39:47'),
(155, '2023-12-22 13:39:09', '2023-12-22 13:39:25', 'admin/images/Canon EOS 90D Kit - Sao chép - Sao chép.jpg', 18, NULL),
(156, '2023-12-23 09:02:15', '2023-12-23 09:02:15', 'admin/images/gaming logite.jpg', 19, NULL),
(157, '2023-12-23 09:02:15', '2023-12-23 09:02:15', 'admin/images/h1ttnt.jpg', 19, NULL),
(158, '2023-12-23 09:02:15', '2023-12-23 09:02:15', 'admin/images/iphone-14-tim.jpg', 19, NULL),
(159, '2023-12-23 09:02:15', '2023-12-23 09:02:15', 'admin/images/Laptop dell latitude 7420.jpg', 19, NULL),
(160, '2023-12-23 09:02:15', '2023-12-23 09:02:15', 'admin/images/OIP2.jpg', 19, NULL),
(161, '2023-12-23 09:02:15', '2023-12-23 09:02:15', 'admin/images/Capture - Sao chép (2).PNG', 19, NULL),
(162, '2023-12-23 09:02:15', '2023-12-23 09:02:15', 'admin/images/da_xxtk3_1 - Sao chép.PNG', 19, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `promotions`
--

CREATE TABLE `promotions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `start` datetime NOT NULL,
  `end` datetime NOT NULL,
  `discount` int(11) NOT NULL,
  `price_discount` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sliders`
--

CREATE TABLE `sliders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `name` varchar(100) NOT NULL,
  `location` int(11) NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `image` varchar(100) NOT NULL,
  `created_by` varchar(20) NOT NULL,
  `link` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sliders`
--

INSERT INTO `sliders` (`id`, `created_at`, `updated_at`, `name`, `location`, `deleted_at`, `image`, `created_by`, `link`) VALUES
(4, '2023-12-17 14:45:27', '2023-12-17 14:45:27', 'édg', 1, NULL, 'admin/images/Canon EOS 90D Kit.jpg', 'Admin', 'dfdsfsd'),
(5, '2023-12-17 14:49:48', '2023-12-17 14:49:48', '23', 23, NULL, 'admin/images/Capture.PNG', 'Admin', '232');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `role_id` bigint(20) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `role_id`) VALUES
(25, 'Trần Nguyên Đán', 'trannguyendan123@gmail.com', NULL, '$2y$12$Gd3cI153tDqbuGFysotswO.J9Xovxt7nQa4HFlxEXaZkCv9LAsmmS', NULL, '2023-12-24 13:28:34', '2023-12-24 13:28:34', NULL),
(26, 'Trần Ngọc Tuyền', '0972612200tuy@gmail.com', NULL, '$2y$12$2d/Jv1TelnMMTpBH3pUWRes1z2VgJ47IbYRr5mI7ejEtDj6zagvAi', NULL, '2023-12-24 13:40:16', '2023-12-24 13:40:16', NULL),
(27, 'Trần Ngọc Tuyền', '0972612200t@gmail.com', NULL, '$2y$12$dhsvp9Dd8v./TrkChigUI.BBWcSpvpWig6m2N9CBMGSs2QES4V1RC', NULL, '2023-12-24 13:44:47', '2023-12-24 13:44:47', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `comments_user_id_foreign` (`user_id`),
  ADD KEY `comments_product_id_foreign` (`product_id`);

--
-- Indexes for table `details`
--
ALTER TABLE `details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `introduces`
--
ALTER TABLE `introduces`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `likes`
--
ALTER TABLE `likes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `likes_product_id_foreign` (`product_id`);

--
-- Indexes for table `lines`
--
ALTER TABLE `lines`
  ADD PRIMARY KEY (`id`),
  ADD KEY `lines_category_id_foreign` (`category_id`);

--
-- Indexes for table `media`
--
ALTER TABLE `media`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `orders_user_id_foreign` (`user_id`);

--
-- Indexes for table `order_details`
--
ALTER TABLE `order_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_details_order_id_foreign` (`order_id`),
  ADD KEY `order_details_product_id_foreign` (`product_id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `products_category_id_foreign` (`category_id`),
  ADD KEY `products_line_id_foreign` (`line_id`),
  ADD KEY `products_promotion_id_foreign` (`promotion_id`);

--
-- Indexes for table `product_images`
--
ALTER TABLE `product_images`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_images_product_id_foreign` (`product_id`);

--
-- Indexes for table `promotions`
--
ALTER TABLE `promotions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `promotions_product_id_foreign` (`product_id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sliders`
--
ALTER TABLE `sliders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD KEY `users_role_id_foreign` (`role_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `details`
--
ALTER TABLE `details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `introduces`
--
ALTER TABLE `introduces`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `likes`
--
ALTER TABLE `likes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `lines`
--
ALTER TABLE `lines`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `media`
--
ALTER TABLE `media`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `order_details`
--
ALTER TABLE `order_details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `product_images`
--
ALTER TABLE `product_images`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=163;

--
-- AUTO_INCREMENT for table `promotions`
--
ALTER TABLE `promotions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sliders`
--
ALTER TABLE `sliders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`),
  ADD CONSTRAINT `comments_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `likes`
--
ALTER TABLE `likes`
  ADD CONSTRAINT `likes_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`);

--
-- Constraints for table `lines`
--
ALTER TABLE `lines`
  ADD CONSTRAINT `lines_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`);

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `order_details`
--
ALTER TABLE `order_details`
  ADD CONSTRAINT `order_details_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`),
  ADD CONSTRAINT `order_details_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`);

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`),
  ADD CONSTRAINT `products_line_id_foreign` FOREIGN KEY (`line_id`) REFERENCES `lines` (`id`),
  ADD CONSTRAINT `products_promotion_id_foreign` FOREIGN KEY (`promotion_id`) REFERENCES `promotions` (`id`);

--
-- Constraints for table `product_images`
--
ALTER TABLE `product_images`
  ADD CONSTRAINT `product_images_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`);

--
-- Constraints for table `promotions`
--
ALTER TABLE `promotions`
  ADD CONSTRAINT `promotions_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`);

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
