-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: May 07, 2022 at 07:38 AM
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
  `name` varchar(125) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `priority` int(11) DEFAULT NULL,
  `image_path` varchar(125) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ads_url` varchar(125) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
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
  `name` varchar(125) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(125) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `amenities`
--

INSERT INTO `amenities` (`id`, `name`, `slug`, `created_at`, `updated_at`) VALUES
(1, 'Standy Generator', NULL, '2022-05-06 10:10:15', '2022-05-06 17:49:42'),
(2, 'Uniterrupted Water Supply', NULL, '2022-05-06 10:10:15', '2022-05-06 10:10:15'),
(4, 'Sports Facility Around', NULL, '2022-05-06 10:10:15', '2022-05-06 10:10:15');

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
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `amenities_properties`
--

INSERT INTO `amenities_properties` (`id`, `properties_id`, `amenities_id`, `created_at`, `updated_at`) VALUES
(1, 1, 1, NULL, NULL),
(2, 1, 2, NULL, NULL),
(3, 1, 3, NULL, NULL);

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
  `business_type_id` bigint(20) UNSIGNED DEFAULT NULL,
  `name` varchar(125) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci,
  `email` varchar(125) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mobile` varchar(125) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `website` varchar(125) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `path` varchar(125) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `businesses_email_unique` (`email`),
  KEY `businesses_user_id_foreign` (`user_id`),
  KEY `businesses_package_id_foreign` (`package_id`),
  KEY `businesses_business_type_id_foreign` (`business_type_id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `businesses`
--

INSERT INTO `businesses` (`id`, `user_id`, `category_id`, `package_id`, `business_type_id`, `name`, `description`, `email`, `mobile`, `website`, `created_at`, `updated_at`, `path`) VALUES
(1, 2, 2, 1, NULL, '1 Block Ghana', 'hello world', 'info@1blockghana.com', '0546747672', 'www.manifestghana.com', '2022-05-06 10:10:15', '2022-05-06 13:21:02', NULL),
(2, 1, 2, 1, NULL, NULL, 'Hello world', 'gabriel@manifestghana.com', '0546747672', 'www.manifestghana.com', '2022-05-06 19:09:48', '2022-05-06 19:09:48', NULL),
(3, 3, NULL, 1, NULL, 'www.manifestghana.com', NULL, NULL, NULL, NULL, '2022-05-06 21:51:13', '2022-05-06 21:51:13', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `business_types`
--

DROP TABLE IF EXISTS `business_types`;
CREATE TABLE IF NOT EXISTS `business_types` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(125) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `position` smallint(6) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `business_types`
--

INSERT INTO `business_types` (`id`, `name`, `position`, `created_at`, `updated_at`) VALUES
(1, 'Agents', 1, '2022-05-06 16:24:57', '2022-05-06 16:43:48'),
(2, 'Developers', 4, '2022-05-06 16:35:40', '2022-05-06 16:51:56');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

DROP TABLE IF EXISTS `categories`;
CREATE TABLE IF NOT EXISTS `categories` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(125) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(125) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `position` smallint(6) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `slug`, `position`, `created_at`, `updated_at`) VALUES
(1, 'House For Sale', NULL, 1, '2022-05-06 10:10:15', '2022-05-06 18:49:11'),
(2, 'House For Rent', NULL, 2, '2022-05-06 10:10:15', '2022-05-06 18:49:20'),
(3, 'Apartment For Sale', NULL, 3, '2022-05-06 10:10:15', '2022-05-06 18:49:32'),
(7, 'Luxury Apartments', NULL, 5, '2022-05-06 10:10:15', '2022-05-06 18:53:21'),
(11, 'Apartment For Rent', NULL, 4, '2022-05-07 04:57:51', '2022-05-07 04:57:51');

-- --------------------------------------------------------

--
-- Table structure for table `currencies`
--

DROP TABLE IF EXISTS `currencies`;
CREATE TABLE IF NOT EXISTS `currencies` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(125) COLLATE utf8mb4_unicode_ci NOT NULL,
  `code` varchar(125) COLLATE utf8mb4_unicode_ci NOT NULL,
  `symbol` varchar(125) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `currencies`
--

INSERT INTO `currencies` (`id`, `name`, `code`, `symbol`, `created_at`, `updated_at`) VALUES
(1, 'Ghana Cedis', 'GHS', '', '2022-05-06 10:10:15', '2022-05-06 10:10:15'),
(2, 'United State Dollar', 'USD', '$', '2022-05-06 10:10:15', '2022-05-06 10:10:15');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

DROP TABLE IF EXISTS `failed_jobs`;
CREATE TABLE IF NOT EXISTS `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `uuid` varchar(125) COLLATE utf8mb4_unicode_ci NOT NULL,
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
  `path` varchar(125) COLLATE utf8mb4_unicode_ci NOT NULL,
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
  `model_type` varchar(125) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL,
  `uuid` char(36) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `collection_name` varchar(125) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(125) COLLATE utf8mb4_unicode_ci NOT NULL,
  `file_name` varchar(125) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mime_type` varchar(125) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `disk` varchar(125) COLLATE utf8mb4_unicode_ci NOT NULL,
  `conversions_disk` varchar(125) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
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
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `media`
--

INSERT INTO `media` (`id`, `model_type`, `model_id`, `uuid`, `collection_name`, `name`, `file_name`, `mime_type`, `disk`, `conversions_disk`, `size`, `manipulations`, `custom_properties`, `generated_conversions`, `responsive_images`, `order_column`, `created_at`, `updated_at`) VALUES
(1, 'App\\Models\\User', 2, '79d30b81-e95f-406e-a52e-3a30a63334b7', 'logos', 'covid-19 measures', 'covid-19-measures.jpg', 'image/jpeg', 'public', 'public', 2758, '[]', '[]', '{\"thumb-50\": true, \"thumb-100\": true}', '[]', 1, '2022-05-06 13:20:09', '2022-05-06 13:20:15'),
(2, 'App\\Models\\Properties', 1, 'fdfd4c0b-05ff-4db0-8da6-da6f8f012b62', 'properties', '1', '1.jpg', 'image/jpeg', 'public', 'public', 128451, '[]', '[]', '{\"thumb-50\": true, \"thumb-100\": true}', '[]', 2, '2022-05-06 13:34:15', '2022-05-06 13:34:17'),
(3, 'App\\Models\\Properties', 1, 'ac253717-ffc6-4973-9066-69ac2272febc', 'properties', '2', '2.jpg', 'image/jpeg', 'public', 'public', 162933, '[]', '[]', '{\"thumb-50\": true, \"thumb-100\": true}', '[]', 3, '2022-05-06 13:34:17', '2022-05-06 13:34:19'),
(4, 'App\\Models\\Properties', 1, 'fb0e9453-6cb5-4b9e-968b-31a4018c0f24', 'properties', '3', '3.jpg', 'image/jpeg', 'public', 'public', 95116, '[]', '[]', '{\"thumb-50\": true, \"thumb-100\": true}', '[]', 4, '2022-05-06 13:34:19', '2022-05-06 13:34:22'),
(5, 'App\\Models\\Properties', 1, '985fe552-73dd-451d-8b9e-fa52afe816fb', 'properties', '5', '5.jpg', 'image/jpeg', 'public', 'public', 134963, '[]', '[]', '{\"thumb-50\": true, \"thumb-100\": true}', '[]', 5, '2022-05-06 13:34:22', '2022-05-06 13:34:24'),
(6, 'App\\Models\\Properties', 1, 'afb4b0eb-18f3-487c-9878-fc78f928472e', 'properties', '6', '6.jpg', 'image/jpeg', 'public', 'public', 168834, '[]', '[]', '{\"thumb-50\": true, \"thumb-100\": true}', '[]', 6, '2022-05-06 13:34:24', '2022-05-06 13:34:25'),
(7, 'App\\Models\\Properties', 1, '5ef3d417-213a-4cde-ae19-83f2b0a86dad', 'properties', '7', '7.jpg', 'image/jpeg', 'public', 'public', 100119, '[]', '[]', '{\"thumb-50\": true, \"thumb-100\": true}', '[]', 7, '2022-05-06 13:34:25', '2022-05-06 13:34:26');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(125) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=30 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
(21, '2022_04_17_203033_create_temporary_files_table', 1),
(22, '2022_04_27_034139_add_is_admin_to_users', 1),
(23, '2022_05_05_141728_add_position_to_categories_table', 1),
(24, '2022_05_05_155131_create_business_types_table', 1),
(25, '2022_05_05_160022_add_businesstype_to_businesses_table', 1),
(26, '2022_05_06_074925_rename_roles_to_user_type_in_users_table', 1),
(27, '2022_05_06_075720_create_permission_tables', 1),
(28, '2022_05_06_160713_rename_column_listing_positing_to_postion_in_business_type_table', 2),
(29, '2022_05_06_175228_rename_column_listing_positing_to_postion_in_categories_table', 3);

-- --------------------------------------------------------

--
-- Table structure for table `model_has_permissions`
--

DROP TABLE IF EXISTS `model_has_permissions`;
CREATE TABLE IF NOT EXISTS `model_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(125) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL,
  PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `model_has_roles`
--

DROP TABLE IF EXISTS `model_has_roles`;
CREATE TABLE IF NOT EXISTS `model_has_roles` (
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(125) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL,
  PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `model_has_roles`
--

INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES
(1, 'App\\Models\\User', 2),
(1, 'App\\Models\\User', 3),
(2, 'App\\Models\\User', 3);

-- --------------------------------------------------------

--
-- Table structure for table `packages`
--

DROP TABLE IF EXISTS `packages`;
CREATE TABLE IF NOT EXISTS `packages` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(125) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(125) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type` varchar(125) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `listing_limit` int(11) DEFAULT NULL,
  `image_upload_limit` int(11) NOT NULL DEFAULT '0',
  `video_upload_limit` int(11) NOT NULL DEFAULT '0',
  `video_length_limit` bigint(20) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `packages`
--

INSERT INTO `packages` (`id`, `name`, `slug`, `type`, `listing_limit`, `image_upload_limit`, `video_upload_limit`, `video_length_limit`, `created_at`, `updated_at`) VALUES
(1, 'Basic', NULL, 'Free', 5, 10, 1, 0, '2022-05-06 10:10:15', '2022-05-06 18:59:54'),
(2, 'Intermediate', NULL, 'Paid', 10, 10, 1, 0, '2022-05-06 10:10:15', '2022-05-06 13:08:47'),
(3, 'Premium', NULL, 'Piad', 15, 10, 1, 0, '2022-05-06 10:10:15', '2022-05-06 19:00:07');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(125) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(125) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `password_resets`
--

INSERT INTO `password_resets` (`email`, `token`, `created_at`) VALUES
('gabeshub@gmail.com', 'nfRA0Gptz8y7NUgSaIBGu8WXZIAGmHPbCItKrr2UKcgAC6adnKfMwSpHd8xrQNr1', '2022-05-06 21:22:51');

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

DROP TABLE IF EXISTS `permissions`;
CREATE TABLE IF NOT EXISTS `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(125) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(125) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `permissions_name_guard_name_unique` (`name`,`guard_name`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'edit permission', 'web', '2022-05-06 14:24:56', '2022-05-06 14:24:56'),
(2, 'create permission', 'web', '2022-05-06 14:25:20', '2022-05-06 14:25:20'),
(3, 'delete permission', 'web', '2022-05-06 14:25:29', '2022-05-06 14:25:29');

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

DROP TABLE IF EXISTS `personal_access_tokens`;
CREATE TABLE IF NOT EXISTS `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(125) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(125) COLLATE utf8mb4_unicode_ci NOT NULL,
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
  `property_id` varchar(125) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `business_id` bigint(20) UNSIGNED NOT NULL,
  `category_id` bigint(20) UNSIGNED DEFAULT NULL,
  `name` varchar(125) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `price` double(8,2) NOT NULL,
  `currency_id` bigint(20) UNSIGNED DEFAULT NULL,
  `size` varchar(125) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bedroom` varchar(125) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `kitchen` varchar(125) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bathroom` varchar(125) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `purpose` varchar(125) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `location` varchar(125) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date_built` date DEFAULT NULL,
  `video_link` varchar(125) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(1) DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `properties_business_id_foreign` (`business_id`),
  KEY `properties_category_id_foreign` (`category_id`),
  KEY `properties_currency_id_foreign` (`currency_id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `properties`
--

INSERT INTO `properties` (`id`, `property_id`, `business_id`, `category_id`, `name`, `description`, `price`, `currency_id`, `size`, `bedroom`, `kitchen`, `bathroom`, `purpose`, `location`, `date_built`, `video_link`, `status`, `created_at`, `updated_at`) VALUES
(1, '322', 1, 1, 'Manifest Estate', 'Hello World', 34000.00, 1, '233', '23', NULL, '23', 'For Rent', 'Accra, Dansoman', '2022-05-10', NULL, 1, '2022-05-06 13:34:15', '2022-05-06 13:34:15');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

DROP TABLE IF EXISTS `roles`;
CREATE TABLE IF NOT EXISTS `roles` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(125) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(125) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `roles_name_guard_name_unique` (`name`,`guard_name`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'web', '2022-05-06 12:51:51', '2022-05-06 12:51:51'),
(2, 'user', 'web', '2022-05-06 12:52:00', '2022-05-06 12:52:00'),
(3, 'superadmin', 'web', '2022-05-06 12:52:17', '2022-05-06 12:52:17');

-- --------------------------------------------------------

--
-- Table structure for table `role_has_permissions`
--

DROP TABLE IF EXISTS `role_has_permissions`;
CREATE TABLE IF NOT EXISTS `role_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL,
  PRIMARY KEY (`permission_id`,`role_id`),
  KEY `role_has_permissions_role_id_foreign` (`role_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

DROP TABLE IF EXISTS `sessions`;
CREATE TABLE IF NOT EXISTS `sessions` (
  `id` varchar(125) COLLATE utf8mb4_unicode_ci NOT NULL,
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
('w4wyWfZYZDsAAD4Q5zDOo0VViJrIBH4FZB9b3oqJ', 2, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/101.0.4951.41 Safari/537.36 Edg/101.0.1210.32', 'YTo2OntzOjY6Il90b2tlbiI7czo0MDoiV0tuNmpENmNWWUZtQ3RGejNiazZoSHdNcXkycXdRQkFlNnJCT3JydSI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzU6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9jYXRlZ29yeS9saXN0Ijt9czo1MDoibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6MjtzOjE3OiJwYXNzd29yZF9oYXNoX3dlYiI7czo2MDoiJDJ5JDEwJFk3MVJoc3lYVVRCaUtZUDZ2eVF5VE90aGszQ1dDNmp1cU55VFcvaC5BbzJqNlQyQWloNEVlIjtzOjIxOiJwYXNzd29yZF9oYXNoX3NhbmN0dW0iO3M6NjA6IiQyeSQxMCRZNzFSaHN5WFVUQmlLWVA2dnlReVRPdGhrM0NXQzZqdXFOeVRXL2guQW8yajZUMkFpaDRFZSI7fQ==', 1651908539);

-- --------------------------------------------------------

--
-- Table structure for table `teams`
--

DROP TABLE IF EXISTS `teams`;
CREATE TABLE IF NOT EXISTS `teams` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(125) COLLATE utf8mb4_unicode_ci NOT NULL,
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
  `email` varchar(125) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` varchar(125) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
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
  `role` varchar(125) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
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
  `folder` varchar(125) COLLATE utf8mb4_unicode_ci NOT NULL,
  `filename` varchar(125) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `temporary_files`
--

INSERT INTO `temporary_files` (`id`, `folder`, `filename`, `created_at`, `updated_at`) VALUES
(2, '627522bec1151-1651843774', '1.jpg', '2022-05-06 13:29:34', '2022-05-06 13:29:34'),
(3, '6275231b58a2c-1651843867', '4.jpg', '2022-05-06 13:31:07', '2022-05-06 13:31:07'),
(4, '6275231d8cc52-1651843869', '5.jpg', '2022-05-06 13:31:09', '2022-05-06 13:31:09'),
(5, '6275232014b5d-1651843872', '6.jpg', '2022-05-06 13:31:12', '2022-05-06 13:31:12'),
(6, '627523223479d-1651843874', '7.jpg', '2022-05-06 13:31:14', '2022-05-06 13:31:14'),
(7, '6275235f2c2c4-1651843935', '1.jpg', '2022-05-06 13:32:15', '2022-05-06 13:32:15'),
(8, '62752360854c3-1651843936', '2.jpg', '2022-05-06 13:32:16', '2022-05-06 13:32:16'),
(9, '62752362bff31-1651843938', '3.jpg', '2022-05-06 13:32:18', '2022-05-06 13:32:18');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `firstname` varchar(125) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lastname` varchar(125) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(125) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mobile` varchar(125) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `physical_address` varchar(125) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_type` varchar(125) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(125) COLLATE utf8mb4_unicode_ci NOT NULL,
  `two_factor_secret` text COLLATE utf8mb4_unicode_ci,
  `two_factor_recovery_codes` text COLLATE utf8mb4_unicode_ci,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `current_team_id` bigint(20) UNSIGNED DEFAULT NULL,
  `profile_photo_path` varchar(2048) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `is_admin` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `firstname`, `lastname`, `email`, `mobile`, `email_verified_at`, `physical_address`, `user_type`, `password`, `two_factor_secret`, `two_factor_recovery_codes`, `remember_token`, `current_team_id`, `profile_photo_path`, `created_at`, `updated_at`, `is_admin`) VALUES
(1, 'Gabriel', 'Abiah', 'gabriel@manifestghana.com', '0546747672', '2022-05-06 10:10:14', '747 Jacobson Underpass Suite 258', 'agent', '$2y$10$jBY6Qx2cLBAsP2p9dnMyduxFX/88qQqG2q8ZRIk.G.7rMpniZ/u4e', NULL, NULL, 'XUDPkNotkM', NULL, NULL, '2022-05-06 10:10:14', '2022-05-06 13:18:56', 0),
(2, 'Erob', 'Osei', 'info@1blockghana.com', '05467476723', '2022-05-06 10:10:15', '6890 Lee Neck', 'admin', '$2y$10$Y71RhsyXUTBiKYP6vyQyTOthk3CWC6juqNyTW/h.Ao2j6T2Aih4Ee', NULL, NULL, 'G0p6lO3TYdYafW2pB5yMbTI2gH5FntW6M5k8JRk9lynUBkZBayHSSkUvKmLb', NULL, NULL, '2022-05-06 10:10:15', '2022-05-06 13:19:08', 0),
(3, 'Adel', 'Peace', 'gabrielabk1@gmail.com', NULL, NULL, 'Tema, Community 11', 'agent', '$2y$10$wqHvNf5oG2mmi2VWOsYI2.qq9FPANMX0eyGCRtpmF60ZBqsTPmg9i', NULL, NULL, NULL, NULL, NULL, '2022-05-06 21:51:12', '2022-05-06 21:52:33', 0);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
