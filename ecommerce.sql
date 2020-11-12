-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 12, 2020 at 01:15 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ecommerce`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `cat_id` bigint(20) UNSIGNED NOT NULL,
  `cat_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cat_desc` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cat_image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`cat_id`, `cat_name`, `cat_desc`, `cat_image`, `created_at`, `updated_at`) VALUES
(1, 'smartphones', 'smartphone is a mobile device that combines cellular and mobile computing functions into one unit', 'smartphone.jpg', NULL, NULL),
(2, 'smartTV', 'A smart TV, also known as a connected TV, is a traditional television set with integrated Internet and interactive Web 2.0 features', 'smarttv.jpg', NULL, NULL),
(3, 'laptop', 'a laptop is a compact size computer', 'laptop.jpg', NULL, NULL),
(4, 'smartwatch', 'watch is now become multifunctional', 'smartwatch.jpg', NULL, NULL),
(5, 'refrigerator', 'a component containing boxes for cooling', 'refrigerator.jpg', NULL, NULL),
(6, 'smarthome', 'gadgets that makes home smarter', 'smarthome.jpg', NULL, NULL),
(7, 'storage', 'device needed to store some data', 'storage.jpg', NULL, NULL),
(8, 'headphones', 'a piece of equipment worn over the ears that makes it possible to listen to music, the radio, etc. without other people hearing it', 'headphone.jpg', NULL, NULL);

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
(1, '2020_11_04_140133_create_users_table', 1),
(2, '2020_11_04_140246_create_password_resets_table', 1),
(3, '2020_11_04_140403_create_failed_jobs_table', 1),
(4, '2020_11_04_140830_create_products_table', 1);

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
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `prd_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `prd_price` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `prd_image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `prd_desc` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_cat_id` bigint(20) UNSIGNED DEFAULT NULL,
  `product_seller_id` bigint(20) UNSIGNED DEFAULT NULL,
  `prd_status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `prd_name`, `prd_price`, `prd_image`, `prd_desc`, `product_cat_id`, `product_seller_id`, `prd_status`, `created_at`, `updated_at`) VALUES
(1, 'redmi k20', '2000', 'redmi.jpg', '6|128 snapdragon 855', 1, 2, 1, NULL, NULL),
(15, 'realme 7', '14999', 'realme.jpg', '6|64 with helio g95', 1, 1, 1, NULL, NULL),
(16, 'samsung', '13999', 'samsung.jpg', 'Deep Blue 32 GB|3 GB RAM', 1, 5, 1, NULL, NULL),
(19, 'iphone 5se', '44999', 'iphone.jpg', 'Space Grey, 2GB RAM, 32GB Storage', 1, 10, 1, NULL, NULL),
(21, 'macbook 2020', '59000', 'mac.jpg', 'mac is a premium laptop by apple', 3, 10, 1, NULL, NULL),
(22, 'sandisk 64gb', '599', 'sandisk.jpg', 'sandisk is a most used storage pendrive', 7, 8, 1, NULL, NULL),
(23, 'gear watch 2', '21000', 'gear.jpg', 'gear is a smartwatch by samsung', 4, 5, 1, NULL, NULL),
(24, 'LG star', '30000', 'lg.jpg', 'smart refrigerator with advance cooling technique', 5, 7, 1, NULL, NULL),
(25, 'jbl infinity 2', '999', 'jbl.jpg', 'infinity with wireless bluetooth 5.0 technique', 8, 6, 1, NULL, NULL),
(26, 'realme band', '1200', 'realme_band.jpg', 'realme new band with heart rate sensor', 4, 6, 1, NULL, NULL),
(27, 'seagate 4tb sdd', '6000', 'hdd.jpg', 'solid state drive with 4tb of storage', 7, 4, 1, NULL, NULL),
(28, 'alexa', '4000', 'alexa.jpg', 'smart assistance with voice command', 6, 7, 1, NULL, NULL),
(29, 'mi 4a', '25000', '4a.jpg', 'xiaomi new smart tv with google assistance', 2, 11, 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `sellers`
--

CREATE TABLE `sellers` (
  `seller_id` bigint(20) UNSIGNED NOT NULL,
  `seller_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `seller_desc` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `seller_image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sellers`
--

INSERT INTO `sellers` (`seller_id`, `seller_name`, `seller_desc`, `seller_image`, `created_at`, `updated_at`) VALUES
(1, 'realme', 'realme is a subbrand of oppo', 'realme.jpg', NULL, NULL),
(2, 'redmi', 'redmi is a linup from xiaomi chineese brand', 'redmi.jpg', NULL, NULL),
(4, 'seagate', 'seagate is a device made for store large data', 'seagate.jpg', NULL, NULL),
(5, 'samsung', 'The Samsung Group is a South Korean multinational conglomerate headquartered in Samsung Town, Seoul.', 'samsung.jpg', NULL, NULL),
(6, 'flipkart', '\r\nFlipkartwww.flipkart.com\r\nIndia\'s biggest online store for Mobiles, Fashion and others', 'flipkart.jpg', NULL, NULL),
(7, 'amazon', 'Amazon.com, Inc., is an American multinational technology company based in Seattle, Washington, which focuses on e-commerce, cloud computing, digital streaming, and artificial intelligence', 'amazon.jpg', NULL, NULL),
(8, 'paytm', 'Paytm is an Indian e-commerce payment system and financial technology company, based in Noida, Uttar Pradesh, India', 'paytm.jpg', NULL, NULL),
(9, 'banggood', 'banggood was founded in 2006, which is headquartered in Guangzhou, China', 'banggood.jpg', NULL, NULL),
(10, 'apple', 'Apple Inc. is an American multinational technology company headquartered in Cupertino', 'apple.jpg', NULL, NULL),
(11, 'xiaomi', 'Xiaomi Corporation is a Chinese multinational electronics company founded in April 2010 and headquartered in Beijing.', 'xiaomi.com', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `phone`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'shubh', 'shubh@gmail.com', NULL, '8593596094', '$2y$10$W05pRyVNb5wDPxwDe0hrLejLmJdtfWbgx/pyINMLAN9raiZ1LTAhO', NULL, '2020-11-09 01:20:23', '2020-11-09 01:20:23'),
(2, 'sanjay', 'sanjay@gmail.com', NULL, '3948594539', '$2y$10$Fj4dbwVi5lmiMY7UaiwfiO95oULPHw91xDr8VtjM2XiDGI/pM3GgK', NULL, '2020-11-09 06:35:16', '2020-11-09 06:35:16'),
(24, 'yogya', 'yogya@yahoo.com', NULL, '7857355788', 'arora', NULL, NULL, NULL),
(25, 'vibhore', 'vibhore@gmail.com', NULL, '6574536488', 'aggarwal', NULL, NULL, NULL),
(26, 'ankit', 'ankit@gmail.com', NULL, '8563558675', 'juyal', NULL, NULL, NULL),
(27, 'subhanshu', 'subhanshu@gmail.com', NULL, '9485392049', 'saxena', NULL, NULL, NULL),
(28, 'arjun', 'arjun@gmail.com', NULL, '9459388568', 'jandwani', NULL, NULL, NULL),
(29, 'vikas', 'vikas@gmail.com', NULL, '8791795935', 'kumar', NULL, NULL, NULL),
(30, 'vivek', 'vivek@gmail.com', NULL, '8463894374', 'sharma', NULL, NULL, NULL),
(31, 'rishabh', 'rishabh@gmail.com', NULL, '3859573849', 'bhatt', NULL, NULL, NULL),
(32, 'sangam', 'sangam@gmail.com', NULL, '4938943934', 'saini', NULL, NULL, NULL),
(33, 'rajat', 'rajat@gmail.com', NULL, '4959504493', 'pundir', NULL, NULL, NULL),
(34, 'rohit', 'rohit@gmail.com', NULL, '8573646948', 'saini', NULL, NULL, NULL),
(35, 'surya', 'surya@gmail.com', NULL, '9795305048', 'kaushik', NULL, NULL, NULL),
(36, 'animesh', 'animesh@gamil.com', NULL, '8495064032', 'vats', NULL, NULL, NULL),
(37, 'raj', 'raj@gmail.com', NULL, '4837593020', 'kaushik', NULL, NULL, NULL),
(38, 'ram', 'ram@gmail.com', NULL, '4984393037', 'bhardwaj', NULL, NULL, NULL),
(39, 'aditya', 'aditya@gmail.com', NULL, '9838792944', 'kapoor', NULL, NULL, NULL),
(40, 'gagan', 'gagan@gamil.com', NULL, '3947924890', 'negi', NULL, NULL, NULL),
(41, 'ashish', 'ashish@gmail.com', NULL, '4837337685', 'semwal', NULL, NULL, NULL),
(42, 'suraj', 'suraj@gmail.com', NULL, '3948392948', 'sharma', NULL, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`cat_id`);

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
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `products_product_cat_id_foreign` (`product_cat_id`),
  ADD KEY `products_product_seller_id_foreign` (`product_seller_id`);

--
-- Indexes for table `sellers`
--
ALTER TABLE `sellers`
  ADD PRIMARY KEY (`seller_id`);

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
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `cat_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `sellers`
--
ALTER TABLE `sellers`
  MODIFY `seller_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_product_cat_id_foreign` FOREIGN KEY (`product_cat_id`) REFERENCES `categories` (`cat_id`),
  ADD CONSTRAINT `products_product_seller_id_foreign` FOREIGN KEY (`product_seller_id`) REFERENCES `sellers` (`seller_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
