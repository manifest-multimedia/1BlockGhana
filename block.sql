-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Apr 21, 2022 at 06:42 PM
-- Server version: 5.7.31
-- PHP Version: 7.4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `1_block_ghana`
--

-- --------------------------------------------------------

--
-- Table structure for table `advertises`
--

DROP TABLE IF EXISTS `advertises`;
CREATE TABLE IF NOT EXISTS `advertises` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `priority` int(11) DEFAULT NULL,
  `image_path` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ads_url` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `amenities`
--

DROP TABLE IF EXISTS `amenities`;
CREATE TABLE IF NOT EXISTS `amenities` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `amenities`
--

INSERT INTO `amenities` (`id`, `name`, `slug`, `created_at`, `updated_at`) VALUES
(1, 'Standy Generator', NULL, '2022-04-21 16:35:58', '2022-04-21 16:35:58'),
(2, 'Uniterrupted Water Supply', NULL, '2022-04-21 16:35:58', '2022-04-21 16:35:58'),
(3, 'Tarred Road', NULL, '2022-04-21 16:35:58', '2022-04-21 16:35:58'),
(4, 'Sports Facility Around', NULL, '2022-04-21 16:35:58', '2022-04-21 16:35:58');

-- --------------------------------------------------------

--
-- Table structure for table `amenities_properties`
--

DROP TABLE IF EXISTS `amenities_properties`;
CREATE TABLE IF NOT EXISTS `amenities_properties` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `properties_id` int(10) UNSIGNED NOT NULL,
  `amenities_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `amenities_properties`
--

INSERT INTO `amenities_properties` (`id`, `properties_id`, `amenities_id`, `created_at`, `updated_at`) VALUES
(1, 1, 1, NULL, NULL),
(2, 1, 2, NULL, NULL),
(3, 1, 3, NULL, NULL),
(4, 1, 4, NULL, NULL),
(5, 2, 2, NULL, NULL),
(6, 2, 3, NULL, NULL),
(7, 2, 4, NULL, NULL),
(8, 3, 1, NULL, NULL),
(9, 3, 3, NULL, NULL),
(10, 3, 4, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `businesses`
--

DROP TABLE IF EXISTS `businesses`;
CREATE TABLE IF NOT EXISTS `businesses` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `category_id` bigint(20) UNSIGNED DEFAULT NULL,
  `package_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mobile` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `website` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `path` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `businesses_email_unique` (`email`),
  KEY `businesses_user_id_foreign` (`user_id`),
  KEY `businesses_package_id_foreign` (`package_id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `businesses`
--

INSERT INTO `businesses` (`id`, `user_id`, `category_id`, `package_id`, `name`, `description`, `email`, `mobile`, `website`, `created_at`, `updated_at`, `path`) VALUES
(1, 2, 1, 1, '1 Block Ghana', NULL, 'info@1blockghana.com', '0546747672', NULL, '2022-04-21 16:35:58', '2022-04-21 16:35:58', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

DROP TABLE IF EXISTS `categories`;
CREATE TABLE IF NOT EXISTS `categories` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `slug`, `created_at`, `updated_at`) VALUES
(1, 'House For Sale', NULL, '2022-04-21 16:35:58', '2022-04-21 16:35:58'),
(2, 'House For Rent', NULL, '2022-04-21 16:35:58', '2022-04-21 16:35:58'),
(3, 'Apartment For Sale', NULL, '2022-04-21 16:35:58', '2022-04-21 16:35:58'),
(4, 'House For Sale', NULL, '2022-04-21 16:35:58', '2022-04-21 16:35:58'),
(5, 'Gated Communities', NULL, '2022-04-21 16:35:58', '2022-04-21 16:35:58'),
(6, 'Hostels', NULL, '2022-04-21 16:35:58', '2022-04-21 16:35:58'),
(7, 'Luxury Apartments', NULL, '2022-04-21 16:35:58', '2022-04-21 16:35:58'),
(8, 'New And Ongoing Development', NULL, '2022-04-21 16:35:58', '2022-04-21 16:35:58'),
(9, 'Commercial Properties', NULL, '2022-04-21 16:35:58', '2022-04-21 16:35:58');

-- --------------------------------------------------------

--
-- Table structure for table `currencies`
--

DROP TABLE IF EXISTS `currencies`;
CREATE TABLE IF NOT EXISTS `currencies` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `code` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `symbol` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `currencies`
--

INSERT INTO `currencies` (`id`, `name`, `code`, `symbol`, `created_at`, `updated_at`) VALUES
(1, 'Ghana Cedis', 'GHS', '', '2022-04-21 16:35:58', '2022-04-21 16:35:58'),
(2, 'United State Dollar', 'USD', '$', '2022-04-21 16:35:58', '2022-04-21 16:35:58');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

DROP TABLE IF EXISTS `failed_jobs`;
CREATE TABLE IF NOT EXISTS `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `uuid` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `gallery`
--

DROP TABLE IF EXISTS `gallery`;
CREATE TABLE IF NOT EXISTS `gallery` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `property_id` bigint(20) UNSIGNED NOT NULL,
  `path` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `media`
--

DROP TABLE IF EXISTS `media`;
CREATE TABLE IF NOT EXISTS `media` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `model_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL,
  `uuid` char(36) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `collection_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `file_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mime_type` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `disk` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `conversions_disk` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `size` bigint(20) UNSIGNED NOT NULL,
  `manipulations` json NOT NULL,
  `custom_properties` json NOT NULL,
  `generated_conversions` json NOT NULL,
  `responsive_images` json NOT NULL,
  `order_column` int(10) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `media_uuid_unique` (`uuid`),
  KEY `media_model_type_model_id_index` (`model_type`,`model_id`)
) ENGINE=MyISAM AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `media`
--

INSERT INTO `media` (`id`, `model_type`, `model_id`, `uuid`, `collection_name`, `name`, `file_name`, `mime_type`, `disk`, `conversions_disk`, `size`, `manipulations`, `custom_properties`, `generated_conversions`, `responsive_images`, `order_column`, `created_at`, `updated_at`) VALUES
(1, 'App\\Models\\User', 2, 'cd49feaa-f18e-47aa-a1a4-103ad10440ae', 'logos', 'team-8', 'team-8.jpg', 'image/jpeg', 'public', 'public', 2706, '[]', '[]', '{\"thumb-50\": true, \"thumb-100\": true}', '[]', 1, '2022-04-21 17:16:21', '2022-04-21 17:16:25'),
(2, 'App\\Models\\Properties', 1, '290cf2e4-3b1a-4b72-bf78-78a7629eb7fc', 'properties', 'gallery6', 'gallery6.jpg', 'image/jpeg', 'public', 'public', 96693, '[]', '[]', '{\"thumb-50\": true, \"thumb-100\": true}', '[]', 2, '2022-04-21 17:36:53', '2022-04-21 17:36:55'),
(3, 'App\\Models\\Properties', 1, 'c8bcafe6-b601-48a4-9904-dd003c7e6159', 'properties', 'gallery7', 'gallery7.jpg', 'image/jpeg', 'public', 'public', 71405, '[]', '[]', '{\"thumb-50\": true, \"thumb-100\": true}', '[]', 3, '2022-04-21 17:36:55', '2022-04-21 17:36:56'),
(4, 'App\\Models\\Properties', 1, 'c526cf18-ee95-4fd6-90ca-abef9133436c', 'properties', 'gallery8', 'gallery8.jpg', 'image/jpeg', 'public', 'public', 99954, '[]', '[]', '{\"thumb-50\": true, \"thumb-100\": true}', '[]', 4, '2022-04-21 17:36:56', '2022-04-21 17:36:58'),
(5, 'App\\Models\\Properties', 1, '23744d8e-5c4a-466f-83e9-311a2994a1b2', 'properties', 'gallery9', 'gallery9.jpg', 'image/jpeg', 'public', 'public', 105573, '[]', '[]', '{\"thumb-50\": true, \"thumb-100\": true}', '[]', 5, '2022-04-21 17:36:58', '2022-04-21 17:36:59'),
(6, 'App\\Models\\Properties', 2, 'a02b90bf-1370-49a2-9c61-9668145c1276', 'properties', 'gallery1', 'gallery1.jpg', 'image/jpeg', 'public', 'public', 57617, '[]', '[]', '{\"thumb-50\": true, \"thumb-100\": true}', '[]', 6, '2022-04-21 17:43:53', '2022-04-21 17:43:54'),
(7, 'App\\Models\\Properties', 2, 'ab6f4023-bddf-461a-8b45-1298f1c54975', 'properties', 'gallery2', 'gallery2.jpg', 'image/jpeg', 'public', 'public', 46779, '[]', '[]', '{\"thumb-50\": true, \"thumb-100\": true}', '[]', 7, '2022-04-21 17:43:54', '2022-04-21 17:43:56'),
(8, 'App\\Models\\Properties', 2, '68a6b54f-c14f-44d2-acfb-64d2688136b7', 'properties', 'gallery3', 'gallery3.jpg', 'image/jpeg', 'public', 'public', 58864, '[]', '[]', '{\"thumb-50\": true, \"thumb-100\": true}', '[]', 8, '2022-04-21 17:43:56', '2022-04-21 17:43:57'),
(9, 'App\\Models\\Properties', 2, 'b3f399b4-feaf-4362-92ae-4a77399e3890', 'properties', 'gallery4', 'gallery4.jpg', 'image/jpeg', 'public', 'public', 62558, '[]', '[]', '{\"thumb-50\": true, \"thumb-100\": true}', '[]', 9, '2022-04-21 17:43:57', '2022-04-21 17:43:57'),
(10, 'App\\Models\\Properties', 3, 'e31edf05-4631-4671-b5a7-98fb3e008a22', 'properties', 'gallery1', 'gallery1.jpg', 'image/jpeg', 'public', 'public', 57617, '[]', '[]', '{\"thumb-50\": true, \"thumb-100\": true}', '[]', 10, '2022-04-21 17:52:37', '2022-04-21 17:52:38'),
(11, 'App\\Models\\Properties', 3, '7c4bdf5d-5eb3-4204-823b-f5e98ae894e3', 'properties', 'gallery5', 'gallery5.jpg', 'image/jpeg', 'public', 'public', 63970, '[]', '[]', '{\"thumb-50\": true, \"thumb-100\": true}', '[]', 11, '2022-04-21 17:52:38', '2022-04-21 17:52:39'),
(12, 'App\\Models\\Properties', 3, '1ecd4907-ddc8-4797-9161-caf97d383f7a', 'properties', 'gallery8 (1)', 'gallery8-(1).jpg', 'image/jpeg', 'public', 'public', 99954, '[]', '[]', '{\"thumb-50\": true, \"thumb-100\": true}', '[]', 12, '2022-04-21 17:52:39', '2022-04-21 17:52:40'),
(13, 'App\\Models\\Properties', 3, '128362c7-d830-4b1d-93cd-4dcf2795c1f2', 'properties', 'gallery8', 'gallery8.jpg', 'image/jpeg', 'public', 'public', 99954, '[]', '[]', '{\"thumb-50\": true, \"thumb-100\": true}', '[]', 13, '2022-04-21 17:52:40', '2022-04-21 17:52:41');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=22 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2014_10_12_200000_add_two_factor_columns_to_users_table', 1),
(4, '2019_08_19_000000_create_failed_jobs_table', 1),
(5, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(6, '2020_05_21_100000_create_teams_table', 1),
(7, '2020_05_21_200000_create_team_user_table', 1),
(8, '2020_05_21_300000_create_team_invitations_table', 1),
(9, '2021_10_04_062847_create_sessions_table', 1),
(10, '2021_10_14_194216_create_categories_table', 1),
(11, '2022_02_22_125703_create_amenities_table', 1),
(12, '2022_02_22_174036_create_currencies_table', 1),
(13, '2022_02_22_222908_create_packages_table', 1),
(14, '2022_02_22_393824_create_businesses_table', 1),
(15, '2022_02_22_394029_create_properties_table', 1),
(16, '2022_02_23_033918_create_advertises_table', 1),
(17, '2022_03_02_035044_add_path_to_businesses_table', 1),
(18, '2022_03_13_063853_create_amenities_properties_table', 1),
(19, '2022_03_17_154005_create_gallery_table', 1),
(20, '2022_04_17_151116_create_media_table', 1),
(21, '2022_04_17_203033_create_temporary_files_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `packages`
--

DROP TABLE IF EXISTS `packages`;
CREATE TABLE IF NOT EXISTS `packages` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `listing_limit` int(11) DEFAULT NULL,
  `image_upload_limit` int(11) NOT NULL DEFAULT '0',
  `video_upload_limit` int(11) NOT NULL DEFAULT '0',
  `video_length_limit` bigint(20) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `packages`
--

INSERT INTO `packages` (`id`, `name`, `slug`, `type`, `listing_limit`, `image_upload_limit`, `video_upload_limit`, `video_length_limit`, `created_at`, `updated_at`) VALUES
(1, 'Basic', NULL, 'Free', 5, 4, 1, 0, '2022-04-21 16:35:58', '2022-04-21 16:49:05'),
(2, 'Intermediate', NULL, 'Paid', 10, 9, 1, 0, '2022-04-21 16:35:58', '2022-04-21 16:35:58'),
(3, 'Premium', NULL, 'Paid', 15, 14, 1, 0, '2022-04-21 16:35:58', '2022-04-21 16:49:29'),
(4, 'testname', NULL, 'testtype', 4, 3, 1, 0, '2022-04-21 17:33:33', '2022-04-21 17:33:33');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

DROP TABLE IF EXISTS `personal_access_tokens`;
CREATE TABLE IF NOT EXISTS `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `properties`
--

DROP TABLE IF EXISTS `properties`;
CREATE TABLE IF NOT EXISTS `properties` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `property_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `business_id` bigint(20) UNSIGNED NOT NULL,
  `category_id` bigint(20) UNSIGNED DEFAULT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `price` double(8,2) NOT NULL,
  `currency_id` bigint(20) UNSIGNED DEFAULT NULL,
  `size` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bedroom` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `kitchen` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bathroom` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `purpose` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `location` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date_built` date DEFAULT NULL,
  `video_link` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(1) DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `properties_business_id_foreign` (`business_id`),
  KEY `properties_category_id_foreign` (`category_id`),
  KEY `properties_currency_id_foreign` (`currency_id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `properties`
--

INSERT INTO `properties` (`id`, `property_id`, `business_id`, `category_id`, `name`, `description`, `price`, `currency_id`, `size`, `bedroom`, `kitchen`, `bathroom`, `purpose`, `location`, `date_built`, `video_link`, `status`, `created_at`, `updated_at`) VALUES
(1, 'AD123', 1, 1, 'Manifest Estate', 'Hello this is a Manifest property for Sale', 400000.00, 1, '422', '4', '422', NULL, 'For Sale', NULL, '2022-04-12', NULL, 1, '2022-04-21 17:36:53', '2022-04-21 17:36:53'),
(2, 'D32', 1, 3, 'Test Estate 2', 'This is a new property listing', 2000.00, 1, '412', '1', '412', NULL, 'For Sale', 'Accra, Dansoman', '2022-04-15', NULL, 1, '2022-04-21 17:43:53', '2022-04-21 17:43:53'),
(3, 't33', 1, 1, 'Test Estate 3', 'Hello world', 23232.00, 1, '232', '3', '232', '3', 'For Sale', 'Kumasi', '2022-04-19', NULL, 1, '2022-04-21 17:52:36', '2022-04-21 17:52:36');

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

DROP TABLE IF EXISTS `sessions`;
CREATE TABLE IF NOT EXISTS `sessions` (
  `id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci,
  `payload` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `sessions_user_id_index` (`user_id`),
  KEY `sessions_last_activity_index` (`last_activity`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('ObEzB044zGucrlMzgwbv6RmaYNFTadN52CLu7J5j', 2, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/100.0.4896.127 Safari/537.36 Edg/100.0.1185.44', 'YTo3OntzOjY6Il90b2tlbiI7czo0MDoicHVic0h3SzFiVjhQYWVra0R2RE1CbGFTOGlnQVE3eEVUT2R3ZXdGRiI7czozOiJ1cmwiO2E6MDp7fXM6OToiX3ByZXZpb3VzIjthOjE6e3M6MzoidXJsIjtzOjM2OiJodHRwOi8vMTI3LjAuMC4xOjgwMDAvcHJvcGVydGllcy9hZGQiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX1zOjUwOiJsb2dpbl93ZWJfNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI7aToyO3M6MTc6InBhc3N3b3JkX2hhc2hfd2ViIjtzOjYwOiIkMnkkMTAkSTBMRTZIUjg3ZEoyQktjYU5xdm5MdThCVlBxTkxGMVVaMUpvRXI0cWdpd0pEUk15Mm1xd20iO3M6MjE6InBhc3N3b3JkX2hhc2hfc2FuY3R1bSI7czo2MDoiJDJ5JDEwJEkwTEU2SFI4N2RKMkJLY2FOcXZuTHU4QlZQcU5MRjFVWjFKb0VyNHFnaXdKRFJNeTJtcXdtIjt9', 1650566308);

-- --------------------------------------------------------

--
-- Table structure for table `teams`
--

DROP TABLE IF EXISTS `teams`;
CREATE TABLE IF NOT EXISTS `teams` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `personal_team` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `teams_user_id_index` (`user_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `team_invitations`
--

DROP TABLE IF EXISTS `team_invitations`;
CREATE TABLE IF NOT EXISTS `team_invitations` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `team_id` bigint(20) UNSIGNED NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `team_invitations_team_id_email_unique` (`team_id`,`email`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `team_user`
--

DROP TABLE IF EXISTS `team_user`;
CREATE TABLE IF NOT EXISTS `team_user` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `team_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `role` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `team_user_team_id_user_id_unique` (`team_id`,`user_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `temporary_files`
--

DROP TABLE IF EXISTS `temporary_files`;
CREATE TABLE IF NOT EXISTS `temporary_files` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `folder` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `filename` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `firstname` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lastname` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mobile` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `physical_address` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `two_factor_secret` text COLLATE utf8mb4_unicode_ci,
  `two_factor_recovery_codes` text COLLATE utf8mb4_unicode_ci,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `current_team_id` bigint(20) UNSIGNED DEFAULT NULL,
  `profile_photo_path` varchar(2048) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `firstname`, `lastname`, `email`, `mobile`, `email_verified_at`, `physical_address`, `role`, `password`, `two_factor_secret`, `two_factor_recovery_codes`, `remember_token`, `current_team_id`, `profile_photo_path`, `created_at`, `updated_at`) VALUES
(1, 'Gabriel', 'Abiah', 'gabriel@manifestghana.com', '0546747672', '2022-04-21 16:35:57', '5351 Elias Harbor Suite 409', 'agent', '$2y$10$T6jsNxdRm7kFZ3TDQu5NRuNUxPOFF96NgKEodIvsI7zPQA8JZzU3W', NULL, NULL, 'BJU9almhej', NULL, NULL, '2022-04-21 16:35:57', '2022-04-21 16:35:57'),
(2, 'Erob', 'Osei', 'info@1blockghana.com', '0546747672', '2022-04-21 16:35:58', '9085 Konopelski Mount Suite 009', 'admin', '$2y$10$I0LE6HR87dJ2BKcaNqvnLu8BVPqNLF1UZ1JoEr4qgiwJDRMy2mqwm', NULL, NULL, 'fKcfq37XJ9', NULL, NULL, '2022-04-21 16:35:58', '2022-04-21 16:35:58');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
