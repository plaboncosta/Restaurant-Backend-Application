-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 08, 2018 at 06:31 AM
-- Server version: 10.1.36-MariaDB
-- PHP Version: 7.2.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `res_proj`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(10) UNSIGNED NOT NULL,
  `category_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_slug` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_status` int(11) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `category_name`, `category_slug`, `category_status`, `created_at`, `updated_at`) VALUES
(1, 'chicken updated', 'chicken-updated', 0, '2018-11-26 22:00:00', '2018-11-30 17:09:15'),
(2, 'beaf', 'beaf', 1, '2018-11-27 03:00:00', NULL),
(19, 'Dal updated', 'dal', 1, '2018-11-27 13:04:30', '2018-11-30 17:11:20'),
(21, 'Torkari', 'torkari-khabo', 0, '2018-11-29 18:36:44', '2018-11-30 17:09:09'),
(22, 'light food', 'light-food-is-so-much-healthy', 1, '2018-12-05 15:48:05', '2018-12-05 15:48:05');

-- --------------------------------------------------------

--
-- Table structure for table `items`
--

CREATE TABLE `items` (
  `item_id` int(10) UNSIGNED NOT NULL,
  `category_id` int(10) UNSIGNED NOT NULL,
  `item_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `item_description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `item_price` int(11) NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `item_status` int(11) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `items`
--

INSERT INTO `items` (`item_id`, `category_id`, `item_name`, `item_description`, `item_price`, `image`, `item_status`, `created_at`, `updated_at`) VALUES
(12, 2, 'beaf', 'beaf onak dam', 500, 'beaf-2018-11-29-5c00138b5a528.jpg', 1, '2018-11-29 16:27:55', '2018-11-30 17:34:36'),
(13, 19, 'dal updated', 'dal kahaya ghumabo', 50, 'dal-2018-11-29-5c0013e22361b.jpg', 1, '2018-11-29 16:29:22', '2018-11-29 18:17:34'),
(14, 1, 'chicken updated', 'chicken updated', 150, 'chicken-updated-2018-11-30-5c002d08946a6.jpg', 1, '2018-11-29 16:30:26', '2018-11-29 18:16:40'),
(17, 1, 'Goro', 'Goro Ghas Khai', 1000, 'goro-2018-11-30-5c017a253bc6c.jpg', 0, '2018-11-30 17:57:57', '2018-11-30 17:58:23');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2018_11_26_235323_create_user_roles_table', 1),
(4, '2018_11_27_120759_create_categories_table', 2),
(5, '2018_11_28_224019_create_items_table', 3),
(6, '2018_12_05_232439_create_orders_table', 4),
(7, '2018_12_05_232449_create_pays_table', 4),
(8, '2018_12_07_014439_create_suppliers_table', 5);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(10) UNSIGNED NOT NULL,
  `pay_id` int(10) UNSIGNED NOT NULL,
  `item_id` int(10) UNSIGNED NOT NULL,
  `category_id` int(10) UNSIGNED NOT NULL,
  `price` double(8,2) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `pay_id`, `item_id`, `category_id`, `price`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 12, 2, 200.00, 1, '2018-12-05 17:30:34', '2018-12-05 17:30:34'),
(2, 2, 13, 1, 100.00, 1, '2018-12-05 17:30:53', '2018-12-05 17:30:53'),
(3, 1, 17, 19, 500.00, 1, '2018-12-05 17:31:14', '2018-12-05 17:31:14'),
(4, 2, 14, 21, 500.00, 1, '2018-12-05 17:31:31', '2018-12-05 17:31:31'),
(5, 2, 17, 21, 160.00, 1, '2018-12-05 18:56:04', '2018-12-05 19:25:05'),
(6, 1, 14, 1, 700.00, 0, '2018-12-05 18:56:34', '2018-12-07 09:36:37');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pays`
--

CREATE TABLE `pays` (
  `id` int(10) UNSIGNED NOT NULL,
  `pay_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pays`
--

INSERT INTO `pays` (`id`, `pay_name`, `created_at`, `updated_at`) VALUES
(1, 'paid', '2018-12-05 17:29:11', '2018-12-05 17:29:11'),
(2, 'unpaid', '2018-12-05 17:29:18', '2018-12-05 17:29:18');

-- --------------------------------------------------------

--
-- Table structure for table `suppliers`
--

CREATE TABLE `suppliers` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `number` int(11) NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(191) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `suppliers`
--

INSERT INTO `suppliers` (`id`, `name`, `number`, `email`, `address`, `date`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Noyon', 1866790156, 'noyon@gmail.com', 'framgate', '2018-12-05', 1, '2018-12-06 19:49:29', '2018-12-07 18:17:56'),
(2, 'Prodip', 1921347584, 'prodip@gmail.com', 'Uttar Badda', '2018-12-04', 1, '2018-12-06 19:50:13', '2018-12-07 18:16:57'),
(3, 'Sudipto', 1715032540, 'sudipto@gmail.com', 'Nodda', '2018-12-03', 1, '2018-12-06 19:50:48', '2018-12-07 18:16:44'),
(4, 'admin', 1796811678, 'admin@gmail.com', 'mohakhali', '2018-12-19', 1, '2018-12-07 05:05:14', '2018-12-07 18:16:36'),
(6, 'admin', 1987675643, 'plabon@gmail.com', 'mohakhali', '2018-12-11', 1, '2018-12-07 09:56:41', '2018-12-07 18:16:27'),
(7, 'Emon', 1987675634, 'emon@gmail.com', 'mohakhali', '2018', 0, '2018-12-07 17:14:14', '2018-12-07 17:18:04'),
(8, 'Emon', 1876543526, 'emon@gmail.com', 'mohakhali', '2018-12-01', 1, '2018-12-07 18:03:55', '2018-12-07 18:03:55');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `role_id` int(11) NOT NULL DEFAULT '5',
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `role_id`, `password`, `status`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Joseph updated', 'joseph@gmail.com', NULL, 4, '$2y$10$BighME1.75ik/WfG4pn0YOY4Evo90kIZz7M5TjBW.iXKmpcXC/LM6', 1, '8A4BypxnnK37qptgn7on80gFBziYU7KklICIBX5NtSYB6tRZpts5QVSEJqmT', '2018-11-27 04:46:22', '2018-12-05 12:32:22'),
(2, 'Hasan', 'hasan@gmail.com', NULL, 2, '$2y$10$1tTlGRFjSxl0Ot2U35oMYuw7YBXxqa7vw4MLoLmQlmUYpLiKdi0Qy', 1, 'xe7Zcdq2EHtqOsgvaA0KLWFhqy9ulvNOOLM54l1n2020oo2ZmHeDK8Hdhk0B', '2018-11-27 04:49:38', '2018-11-30 16:33:07'),
(6, 'Author', 'author@gmail.com', NULL, 3, '$2y$10$CaUWw7XBva.zGz8tgaX6qu8MGM/w5fR0jq.l/Cf5LV1nKu17VDfwq', 0, 'BrVswGupDsqaFpwQsoSQaKBiEzYbIISgo0zHktMDqOAAmU8rXmVZWyzHgpRs', '2018-11-30 16:33:58', '2018-11-30 16:37:13'),
(7, 'Subscriber', 'subscriber@gmail.com', NULL, 4, '$2y$10$7I2P0QXPhEUwdTiUTT4AveFVcHGqkAyYn/9VXMMgNxsTBjPe7HxZa', 1, 'Jvjs4wn07pwkXJUWKthaKUVQXaTi26toEBBLlu6tqlHzjl4ttQnssTZsDEK3', '2018-11-30 16:34:22', '2018-11-30 16:34:22'),
(8, 'Prince', 'prince@gmail.com', NULL, 5, '$2y$10$3QOhYfI0hW1iR90QO6zeKuVcOYBNMsVGfqrcz5pUrZxIQ8RRNOKDy', 0, 'iesWoaM08j4miqsNsUkEk9JhQT7qfQ5uZQLtuU7DIsCK4w6gpS22EqpwVlDy', '2018-11-30 16:35:21', '2018-12-01 14:19:33'),
(9, 'Shanto', 'shanto@gmail.com', NULL, 3, '$2y$10$jLVS3YAudRXtTI44DNSDF.ST8UptDX.DSMHHuTK.fsUSEgcna0aoG', 1, 'qCRPyMDoNRH4CDXwHJKBeOyFckTaJ2n2pPhy4OgmU4X8aEvLOUUngnDsHDEa', '2018-11-30 16:35:40', '2018-11-30 16:35:40'),
(10, 'Bivash', 'bivash@gmail.com', NULL, 5, '$2y$10$/1.cJiBP2X1qtHjHKqFZH.fuoa/bt8exnHB9hRyeQs0l7UPgKmw4O', 0, '36GeK7eE0cd7Pi3m3O9XkJdVrmECiEHgV1L2lMXa4aOlgaffFrasXIZ0USkc', '2018-11-30 16:36:00', '2018-11-30 16:37:03'),
(11, 'Emon', 'emon@gmail.com', NULL, 5, '123456', 1, NULL, '2018-12-01 14:17:49', '2018-12-01 14:17:49'),
(12, 'Tuli', 'tuli@gmail.com', NULL, 5, '123456', 1, NULL, '2018-12-01 14:18:40', '2018-12-01 14:18:40'),
(13, 'Nipa', 'nipa@gmail.com', NULL, 5, '123456', 1, NULL, '2018-12-01 14:19:25', '2018-12-01 14:19:25'),
(14, 'Monika', 'monika@gmail.com', NULL, 5, '123456', 1, NULL, '2018-12-01 14:35:52', '2018-12-01 14:35:52'),
(15, 'Super Admin', 'superadmin@gmail.com', NULL, 1, '$2y$10$dZQ0SUlOsv0/.EXbldmPr.q0OwrMm0MvaOsMMZP0dVQce8zNUTPHO', 1, 'lCPjK0bJGvolzPO9ILmazumS2tJvtPsyuqjYghoFao4nc1NghfLuKz0tZAPK', '2018-12-02 16:50:09', '2018-12-02 16:50:09'),
(16, 'Ratri', 'ratri@gmail.com', NULL, 3, '123456', 1, NULL, '2018-12-02 17:24:43', '2018-12-02 17:24:43'),
(17, 'Pinki', 'pinki@gmail.com', NULL, 3, '$2y$10$4tHb8bvvow.JsADcfpVnfeNc/xVbNtu0rtpKBy1ItW./o.eNLNC3i', 1, NULL, '2018-12-02 17:25:13', '2018-12-02 17:35:15'),
(18, 'Plabon Joseph', 'plabonjoseph@gmail.com', NULL, 1, '$2y$10$YqtKw48H3eWoGtbEvDPaYOSESFitjb9CLZV/DQuvHnrzBECPB356O', 1, 'GAyzsVjxN3nafUCngE1BmEguyQepMqCuvoG9bc3DrzRK7hRgzwfGEi4vBeAh', '2018-12-03 18:35:33', '2018-12-05 12:32:40'),
(19, 'jonaki', 'jonaki@gmail.com', NULL, 3, '123456', 1, NULL, '2018-12-05 12:37:54', '2018-12-05 12:37:54');

-- --------------------------------------------------------

--
-- Table structure for table `user_roles`
--

CREATE TABLE `user_roles` (
  `role_id` int(10) UNSIGNED NOT NULL,
  `role_name` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role_status` int(11) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user_roles`
--

INSERT INTO `user_roles` (`role_id`, `role_name`, `role_status`, `created_at`, `updated_at`) VALUES
(1, 'Superadmin', 1, '2018-11-27 04:00:00', NULL),
(2, 'Admin', 1, '2018-11-27 13:00:00', NULL),
(3, 'Author', 1, '2018-11-27 14:00:00', NULL),
(4, 'Editor', 1, '2018-11-27 05:00:00', NULL),
(5, 'Subscriber', 1, '2018-11-27 09:00:00', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `items`
--
ALTER TABLE `items`
  ADD PRIMARY KEY (`item_id`),
  ADD KEY `items_category_id_foreign` (`category_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `pays`
--
ALTER TABLE `pays`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `suppliers`
--
ALTER TABLE `suppliers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `user_roles`
--
ALTER TABLE `user_roles`
  ADD PRIMARY KEY (`role_id`),
  ADD UNIQUE KEY `user_roles_role_name_unique` (`role_name`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `items`
--
ALTER TABLE `items`
  MODIFY `item_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `pays`
--
ALTER TABLE `pays`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `suppliers`
--
ALTER TABLE `suppliers`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `user_roles`
--
ALTER TABLE `user_roles`
  MODIFY `role_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `items`
--
ALTER TABLE `items`
  ADD CONSTRAINT `items_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
