-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 01, 2019 at 08:30 AM
-- Server version: 10.1.28-MariaDB
-- PHP Version: 7.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `rafiportfolio`
--

-- --------------------------------------------------------

--
-- Table structure for table `abouts`
--

CREATE TABLE `abouts` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `details` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `subtitle` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subdetails` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `abouts`
--

INSERT INTO `abouts` (`id`, `title`, `details`, `subtitle`, `subdetails`, `status`, `created_at`, `updated_at`) VALUES
(1, 'About US', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. ', 'Here Rafikul Islam Rafi', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.', 1, NULL, '2018-06-02 00:54:08'),
(2, 'HELLO', 'N/A', 'hello', 'n/a', 0, NULL, '2018-05-25 23:47:22');

-- --------------------------------------------------------

--
-- Table structure for table `banners`
--

CREATE TABLE `banners` (
  `id` int(10) UNSIGNED NOT NULL,
  `customer_image` varchar(60) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `banners`
--

INSERT INTO `banners` (`id`, `customer_image`, `status`, `created_at`, `updated_at`) VALUES
(1, 'banner-1-1526892161.jpg', 0, NULL, '2018-06-02 00:47:20'),
(2, 'banner-2-1527312642.jpg', 0, NULL, '2018-06-02 00:47:56'),
(3, 'banner-3-1527921997.jpg', 1, NULL, '2018-06-02 00:47:12'),
(4, 'banner-4-1527922096.jpg', 1, NULL, '2018-06-02 00:48:16'),
(5, 'banner-5-1536042510.jpg', 1, NULL, '2018-09-04 00:28:30');

-- --------------------------------------------------------

--
-- Table structure for table `blogs`
--

CREATE TABLE `blogs` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sub_titile` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `blogs`
--

INSERT INTO `blogs` (`id`, `title`, `sub_titile`, `image`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Web Development ', 'Lorem ipsum dolor sit ametconse, ctetur elit,ut labore et magna aliqua.Lorem ipsum dolor sit, ctetur adipisicing magna aliqua.', 'blog-1-1527573116.jpg', 1, '2018-05-29 05:52:31', '2018-05-28 23:52:31'),
(2, 'Web Design', 'Lorem ipsum dolor sit ametconse, ctetur elit,ut labore et magna aliqua.Lorem ipsum dolor sit, ctetur adipisicing magna aliqua.', 'blog-1-1527573083.jpg', 1, '2018-05-29 05:51:23', '2018-05-28 23:51:23'),
(3, 'Wordpress', ' 	Lorem ipsum dolor sit ametconse, ctetur elit,ut labore et magna aliqua.Lorem ipsum dolor sit, ctetur adipisicing magna aliqua.', 'blog-3-1527573181.jpg', 1, '2018-05-29 05:53:01', '2018-05-28 23:53:01');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `category_id` int(10) UNSIGNED NOT NULL,
  `category_name` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`category_id`, `category_name`, `status`, `created_at`, `updated_at`) VALUES
(1, 'SEO', 1, NULL, NULL),
(2, 'WebDesign', 1, NULL, NULL),
(3, 'Wordpress ', 1, '2018-05-23 06:40:43', '2018-05-26 02:47:43');

-- --------------------------------------------------------

--
-- Table structure for table `clientsms`
--

CREATE TABLE `clientsms` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subject` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `textarea` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `clientsms`
--

INSERT INTO `clientsms` (`id`, `name`, `email`, `subject`, `textarea`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Delwar Hossain', 'delwar351016@gmail.com', 'Lorem ipsum dolor sit amet', 'm ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.', 0, '2018-05-22 08:15:15', '2018-05-22 03:11:23'),
(2, 'Delwar Hossain', 'delwar351016@gmail.com', 'Lorem ipsum dolor sit amet', 'm ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.', 0, '2018-05-22 08:15:51', '2018-05-22 03:11:08'),
(3, 'Delwar Hossain', 'rafikul351016@gmail.com', 'Lorem ipsum dolor sit amet', 'dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.', 0, '2018-05-22 08:16:14', '2018-05-22 03:11:11'),
(4, 'Delwar Hossain', 'rafikul351016@gmail.com', 'Lorem ipsum dolor sit amet', 'dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.', 0, '2018-05-22 08:18:31', '2018-05-22 03:11:13'),
(5, 'Delwar Hossain', 'delwar351016@gmail.com', 'Lorem ipsum dolor sit amet', 'hh', 0, '2018-05-22 08:19:47', '2018-05-22 03:11:29'),
(6, 'Rafikul Islam', 'rafikul351016@gmail.com', 'Lorem ipsum dolor sit amet', 'pisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.', 1, '2018-05-22 08:43:01', NULL),
(7, 'Miske Tara Zannat', 'moni@gmail.com', 'Lorem ipsum dolor sit amet', 'consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.', 1, '2018-05-22 08:44:17', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `customer_id` int(10) UNSIGNED NOT NULL,
  `customer_name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `customer_email` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `customer_phone` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `customer_image` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`customer_id`, `customer_name`, `customer_email`, `customer_phone`, `customer_image`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Rafikul Islam', 'rafiswe@gmail.com', '01729346959', 'customer-1-1532164169.jpg', 1, NULL, '2018-07-21 03:09:29'),
(2, 'Miske Tara Zannat', 'miske@gmail.com', '01729346958', 'customer-1-1527652651.jpg', 0, NULL, '2018-05-30 02:59:28'),
(3, 'Delwar Hossain', 'delwar351016@gmail.com', '0185205482', '', 0, NULL, '2018-05-26 02:33:14'),
(4, 'Delwar Hossain', 'DorethaFCrane876@gmail.com', '0178561652', 'customer-1-1527652676.jpg', 1, NULL, '2018-07-21 03:09:33'),
(5, 'Miske Tara Zannat', 'm@gmail.com', '0152586841', 'customer-5-1536042130.jpg', 1, NULL, '2018-09-04 00:22:10'),
(6, 'Shafikul Islam', 's@gmail.com', '0152586841', 'customer-6-1536042166.jpg', 1, NULL, '2018-09-04 00:22:46'),
(7, 'Mehedi Hasan', 'mehedi@gmail.com', '0152586842', 'customer-7-1536042206.jpg', 1, NULL, '2018-09-04 00:23:26'),
(8, 'Ayesha Siddika', 'a@gmail.com', '0152586841', 'customer-8-1536042370.jpg', 1, NULL, '2018-09-04 00:26:10');

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
(13, '2014_10_12_000000_create_users_table', 1),
(14, '2014_10_12_100000_create_password_resets_table', 1),
(15, '2018_05_12_045759_create_customers_table', 1),
(16, '2018_05_19_060700_create_banners_table', 1),
(17, '2018_05_19_085356_create_abouts_table', 1),
(18, '2018_05_21_083341_create_services_table', 1),
(19, '2018_05_22_041520_create_blogs_table', 2),
(20, '2018_05_22_075026_create_clientsms_table', 3),
(21, '2018_05_23_055946_create_categories_table', 4),
(22, '2018_05_23_071428_create_works_table', 5);

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
-- Table structure for table `services`
--

CREATE TABLE `services` (
  `id` int(10) UNSIGNED NOT NULL,
  `service_title` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `service_details` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`id`, `service_title`, `service_details`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Graphic Design', 'Lorem dolor sit amet,tempor sed do eiusmod ut labore et dolore magna aliqua.', 1, NULL, NULL),
(2, 'Unlimited Wifi', 'Lorem dolor sit amet,tempor sed do eiusmod ut labore et dolore magna aliqua.', 1, NULL, NULL),
(3, 'Unlimited Color', 'Lorem dolor sit amet,tempor sed do eiusmod ut labore et dolore magna aliqua.', 1, NULL, NULL),
(4, 'Media Marketing', 'Lorem dolor sit amet,tempor sed do eiusmod ut labore et dolore magna aliqua.', 1, NULL, NULL),
(5, 'Responsive Design', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.', 1, NULL, NULL),
(6, 'Easy To Customize', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.', 0, NULL, NULL),
(7, 'mmm', 'bhhh', 0, NULL, NULL),
(8, 'Nothing To show', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.', 1, '2018-05-22 05:31:37', NULL),
(9, 'Habi Jabi For Test', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.', 1, '2018-05-22 07:05:11', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Rafikul Islam', 'rafikul351016@gmail.com', '$2y$10$6ImJUAoY5VKYn92clLJfSu4FXOxm2NTG8ZkzV9o8CtQFkfAnEE7fK', 'PK4UAY8V54JUb3Gz9diVWuENlyFMxqY3T8l6M1EjBCSYO4267ufFMTs6u7W2', '2018-05-21 02:41:02', '2018-05-21 02:41:02'),
(2, 'Web Admin', 'admin@gmail.com', '$2y$10$aW9lCsjFc.bJoBWaby9C/OImuZYgIho8sNqNFLDW45GtNVosDmREC', 'TQIeWY0eWczZbpV23XGJfzmgHSm9HHgzjxcmo9mnElu0IX3MavnzkhF9lDmG', '2018-06-02 00:35:46', '2018-06-02 00:35:46');

-- --------------------------------------------------------

--
-- Table structure for table `works`
--

CREATE TABLE `works` (
  `id` int(10) UNSIGNED NOT NULL,
  `category` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `about` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(60) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `works`
--

INSERT INTO `works` (`id`, `category`, `about`, `image`, `status`, `created_at`, `updated_at`) VALUES
(1, '1', 'Nothing', 'works-1-1527068636.jpg', 1, NULL, '2018-05-26 02:46:20'),
(2, '2', 'PHP', 'works-2-1527068682.jpg', 1, NULL, '2018-05-23 03:44:42'),
(3, '3', 'Wordpress', 'works-3-1527136336.jpg', 1, NULL, '2018-05-23 22:32:17'),
(4, '1', 'PHP', 'works-4-1527572059.jpg', 1, NULL, '2018-05-28 23:34:20'),
(5, '1', 'Nothing', 'works-5-1527572076.jpg', 1, NULL, '2018-05-28 23:34:36'),
(6, '3', 'Wordpress', 'works-6-1527572119.jpg', 1, NULL, '2018-05-28 23:35:19'),
(7, '2', 'PHP', 'works-7-1527572137.jpg', 1, NULL, '2018-05-28 23:35:37'),
(8, '1', 'Nothing', 'works-8-1527572166.jpg', 1, NULL, '2018-05-28 23:36:06'),
(9, '3', 'Wordpress', 'works-9-1527572300.jpg', 1, NULL, '2018-05-28 23:38:20'),
(10, '3', 'Nothing', 'works-10-1527572352.jpg', 1, NULL, '2018-05-28 23:39:12'),
(11, '2', 'Web Design', 'works-11-1527572454.jpg', 1, NULL, '2018-05-28 23:40:54'),
(12, '2', 'Nothing', 'works-12-1527572469.jpg', 1, NULL, '2018-05-28 23:41:09'),
(13, '3', 'Wordpress', 'works-13-1527572549.jpg', 1, NULL, '2018-05-28 23:42:29'),
(14, '1', 'Nothing', 'works-14-1527572653.jpg', 0, NULL, '2018-05-28 23:44:49');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `abouts`
--
ALTER TABLE `abouts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `banners`
--
ALTER TABLE `banners`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `blogs`
--
ALTER TABLE `blogs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `clientsms`
--
ALTER TABLE `clientsms`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`customer_id`),
  ADD UNIQUE KEY `customers_customer_email_unique` (`customer_email`);

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
-- Indexes for table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `works`
--
ALTER TABLE `works`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `abouts`
--
ALTER TABLE `abouts`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `banners`
--
ALTER TABLE `banners`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `blogs`
--
ALTER TABLE `blogs`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `category_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `clientsms`
--
ALTER TABLE `clientsms`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `customer_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `works`
--
ALTER TABLE `works`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
