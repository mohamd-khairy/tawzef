-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Mar 05, 2023 at 12:46 PM
-- Server version: 8.0.30
-- PHP Version: 7.4.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
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
-- Table structure for table `about`
--

CREATE TABLE `about` (
  `id` bigint UNSIGNED NOT NULL,
  `is_featured` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `created_by` bigint UNSIGNED DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `updated_by` bigint UNSIGNED DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `deleted_by` bigint UNSIGNED DEFAULT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `about_trans`
--

CREATE TABLE `about_trans` (
  `id` bigint UNSIGNED NOT NULL,
  `about_id` bigint NOT NULL,
  `language_id` int NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `created_by` bigint UNSIGNED DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `updated_by` bigint UNSIGNED DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `deleted_by` bigint UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `activity_log`
--

CREATE TABLE `activity_log` (
  `id` bigint UNSIGNED NOT NULL,
  `log_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `subject_id` bigint UNSIGNED DEFAULT NULL,
  `subject_type` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `causer_id` bigint UNSIGNED DEFAULT NULL,
  `causer_type` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `properties` json DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `activity_log`
--

INSERT INTO `activity_log` (`id`, `log_name`, `description`, `subject_id`, `subject_type`, `causer_id`, `causer_type`, `properties`, `created_at`, `updated_at`) VALUES
(1, 'product_log', 'created', 1, 'Modules\\Products\\ProductCategory', 1, 'App\\User', '{\"attributes\": {\"id\": 1, \"image\": \"Products/64gEz9ObhWkRGRMAJoco4rR7BKNEnyW99t8c2ExI.png\", \"banner\": \"Products/LL7x8RD7u0TZiQLmbI19mBSLxbjOWo0JmHmkSm3D.png\", \"name_ar\": \"Selma Morris\", \"name_en\": \"Aileen Neal\", \"created_at\": \"2023-03-05T07:04:06.000000Z\", \"created_by\": 1, \"deleted_at\": null, \"deleted_by\": null, \"updated_at\": \"2023-03-05T07:04:06.000000Z\", \"updated_by\": 1, \"featured_products\": 0}}', '2023-03-05 05:04:06', '2023-03-05 05:04:06'),
(2, 'product_log', 'deleted', 1, 'Modules\\Products\\ProductCategory', 1, 'App\\User', '{\"attributes\": {\"id\": 1, \"image\": \"Products/64gEz9ObhWkRGRMAJoco4rR7BKNEnyW99t8c2ExI.png\", \"banner\": \"Products/LL7x8RD7u0TZiQLmbI19mBSLxbjOWo0JmHmkSm3D.png\", \"name_ar\": \"Selma Morris\", \"name_en\": \"Aileen Neal\", \"created_at\": \"2023-03-05T07:04:06.000000Z\", \"created_by\": 1, \"deleted_at\": \"2023-03-05T07:15:50.000000Z\", \"deleted_by\": 1, \"updated_at\": \"2023-03-05T07:15:50.000000Z\", \"updated_by\": 1, \"featured_products\": 0}}', '2023-03-05 05:15:50', '2023-03-05 05:15:50'),
(3, 'product_log', 'created', 2, 'Modules\\Products\\ProductCategory', 1, 'App\\User', '{\"attributes\": {\"id\": 2, \"image\": \"Products/ZN1tkfdpYkhpMEmpxWCP32SpBozS3hhf0nSlhSHm.webp\", \"banner\": \"Products/PHQmjgH7NiOTqyegRxfcadVIqojlPtp86NHzYWY1.webp\", \"name_ar\": \"أحذية رياضية\", \"name_en\": \"shoes\", \"created_at\": \"2023-03-05T07:18:35.000000Z\", \"created_by\": 1, \"deleted_at\": null, \"deleted_by\": null, \"updated_at\": \"2023-03-05T07:18:35.000000Z\", \"updated_by\": 1, \"featured_products\": 1}}', '2023-03-05 05:18:35', '2023-03-05 05:18:35'),
(4, 'product_log', 'created', 3, 'Modules\\Products\\ProductCategory', 1, 'App\\User', '{\"attributes\": {\"id\": 3, \"image\": \"Products/qL9U13FGtkLQW4FVQ5l8C7dZvEDXhd2YPpab2KzW.webp\", \"banner\": \"Products/HRzdGzUYN2JkmHGiSx3FmxUc1tf64HrXgUFDPFvO.webp\", \"name_ar\": \"ملابس رياضية\", \"name_en\": \"Clothing\", \"created_at\": \"2023-03-05T07:19:11.000000Z\", \"created_by\": 1, \"deleted_at\": null, \"deleted_by\": null, \"updated_at\": \"2023-03-05T07:19:11.000000Z\", \"updated_by\": 1, \"featured_products\": 1}}', '2023-03-05 05:19:11', '2023-03-05 05:19:11'),
(5, 'product_log', 'created', 4, 'Modules\\Products\\ProductCategory', 1, 'App\\User', '{\"attributes\": {\"id\": 4, \"image\": \"Products/CB8GnTWFGs7ED6wSpr5YNNzWebsGWFC4hJgrlEwT.webp\", \"banner\": \"Products/Dbc5uq79oKsd5n1N6g1L1K52HeW0H7DEiKYYayEJ.webp\", \"name_ar\": \"حقائب رياضية\", \"name_en\": \"Bags\", \"created_at\": \"2023-03-05T07:19:56.000000Z\", \"created_by\": 1, \"deleted_at\": null, \"deleted_by\": null, \"updated_at\": \"2023-03-05T07:19:56.000000Z\", \"updated_by\": 1, \"featured_products\": 1}}', '2023-03-05 05:19:56', '2023-03-05 05:19:56'),
(6, 'product_log', 'created', 5, 'Modules\\Products\\ProductCategory', 1, 'App\\User', '{\"attributes\": {\"id\": 5, \"image\": \"Products/9QT2rpZbwoh2Y0bVq8fXn74U2mKyI0xRlV4gcEup.webp\", \"banner\": \"Products/iEyM5R5KQ7JXAt6mUE5YK3bFS1HP3Hnr8TIwhv15.webp\", \"name_ar\": \"مضارب تنس\", \"name_en\": \"Rackets\", \"created_at\": \"2023-03-05T07:21:35.000000Z\", \"created_by\": 1, \"deleted_at\": null, \"deleted_by\": null, \"updated_at\": \"2023-03-05T07:21:35.000000Z\", \"updated_by\": 1, \"featured_products\": 1}}', '2023-03-05 05:21:35', '2023-03-05 05:21:35'),
(7, 'product_log', 'created', 1, 'Modules\\Products\\Brand', 1, 'App\\User', '{\"attributes\": {\"id\": 1, \"image\": null, \"name_ar\": \"بابولات\", \"name_en\": \"Babolat\", \"created_at\": \"2023-03-05T10:18:44.000000Z\", \"created_by\": 1, \"deleted_at\": null, \"deleted_by\": null, \"updated_at\": \"2023-03-05T10:18:44.000000Z\", \"updated_by\": 1, \"category_id\": 5, \"is_featured\": 0}}', '2023-03-05 08:18:44', '2023-03-05 08:18:44'),
(8, 'product_log', 'created', 2, 'Modules\\Products\\Brand', 1, 'App\\User', '{\"attributes\": {\"id\": 2, \"image\": null, \"name_ar\": \"ستارفي\", \"name_en\": \"Starvie\", \"created_at\": \"2023-03-05T10:19:43.000000Z\", \"created_by\": 1, \"deleted_at\": null, \"deleted_by\": null, \"updated_at\": \"2023-03-05T10:19:43.000000Z\", \"updated_by\": 1, \"category_id\": 5, \"is_featured\": 0}}', '2023-03-05 08:19:43', '2023-03-05 08:19:43'),
(9, 'product_log', 'created', 3, 'Modules\\Products\\Brand', 1, 'App\\User', '{\"attributes\": {\"id\": 3, \"image\": null, \"name_ar\": \"فيدار\", \"name_en\": \"Vidar\", \"created_at\": \"2023-03-05T10:20:27.000000Z\", \"created_by\": 1, \"deleted_at\": null, \"deleted_by\": null, \"updated_at\": \"2023-03-05T10:20:27.000000Z\", \"updated_by\": 1, \"category_id\": 5, \"is_featured\": 0}}', '2023-03-05 08:20:27', '2023-03-05 08:20:27'),
(10, 'product_log', 'created', 1, 'Modules\\Products\\Product', 1, 'App\\User', '{\"attributes\": {\"id\": 1, \"logo\": null, \"slug\": null, \"image\": \"Products/usEt6HGmwKxUcDCwrJFPCF5RgS9sghYj8w44rdhf.webp\", \"offer\": 650, \"price\": 1200, \"feature\": null, \"name_ar\": \"STARVIE KRAKEN RACKET\", \"name_en\": \"STARVIE KRAKEN RACKET\", \"brand_id\": 1, \"created_at\": \"2023-03-05T10:30:24.000000Z\", \"created_by\": 1, \"deleted_at\": null, \"deleted_by\": null, \"updated_at\": \"2023-03-05T10:30:24.000000Z\", \"updated_by\": 1, \"category_id\": 5, \"is_featured\": 1, \"new_arrival\": 1, \"description_ar\": \"مضارب البادل - خط النجوم\\r\\nيبرز نموذج Kraken عن باقي مضارب الباديل في المجموعة لقالبه الذي يبلغ سمكه 26 مم.\\r\\n\\r\\nتستهدف محترفي Padel بمستوى تقني جيد. يوفر هذا المضرب قدرة كبيرة على المناورة عند \", \"description_en\": \"PADEL RACKETS - STAR LINE\\r\\nThe Kraken model stands out from the rest of the padel rackets in the collection for its 26 mm thick mould.\\r\\n\\r\\nAimed at padel professionals with a good technical le\", \"is_brand_featured\": 1}}', '2023-03-05 08:30:24', '2023-03-05 08:30:24'),
(11, 'product_log', 'created', 1, 'Modules\\Products\\ProductSpecification', 1, 'App\\User', '{\"attributes\": {\"id\": 1, \"key_ar\": \"Cillum eos labore un\", \"key_en\": \"Ut voluptates aliqua\", \"value_ar\": \"Dicta labore ipsum r\", \"value_en\": \"Reprehenderit dolor\", \"created_at\": \"2023-03-05T10:30:24.000000Z\", \"created_by\": 1, \"deleted_at\": null, \"deleted_by\": null, \"product_id\": 1, \"updated_at\": \"2023-03-05T10:30:24.000000Z\", \"updated_by\": 1}}', '2023-03-05 08:30:24', '2023-03-05 08:30:24');

-- --------------------------------------------------------

--
-- Table structure for table `ads`
--

CREATE TABLE `ads` (
  `id` int UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `link` mediumtext COLLATE utf8mb4_unicode_ci,
  `image` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `created_by` bigint UNSIGNED DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `updated_by` bigint UNSIGNED DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `deleted_by` bigint UNSIGNED DEFAULT NULL,
  `is_featured` tinyint(1) NOT NULL DEFAULT '0',
  `start_date` timestamp NULL DEFAULT NULL,
  `end_date` timestamp NULL DEFAULT NULL,
  `title_ar` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sub_title_en` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sub_title_ar` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `agent_socials`
--

CREATE TABLE `agent_socials` (
  `id` bigint UNSIGNED NOT NULL,
  `top_agent_id` bigint UNSIGNED NOT NULL,
  `link` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `icon` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `created_by` bigint UNSIGNED DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `updated_by` bigint UNSIGNED DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `deleted_by` bigint UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `attachmentables`
--

CREATE TABLE `attachmentables` (
  `id` bigint UNSIGNED NOT NULL,
  `attachmentable_type` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `attachmentable_id` bigint UNSIGNED DEFAULT NULL,
  `mime` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `path` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `created_by` bigint UNSIGNED DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `updated_by` bigint UNSIGNED DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `deleted_by` bigint UNSIGNED DEFAULT NULL,
  `size` bigint NOT NULL,
  `file_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `order` int NOT NULL,
  `type` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `alt` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `attachmentables`
--

INSERT INTO `attachmentables` (`id`, `attachmentable_type`, `attachmentable_id`, `mime`, `path`, `created_at`, `created_by`, `updated_at`, `updated_by`, `deleted_at`, `deleted_by`, `size`, `file_name`, `order`, `type`, `alt`) VALUES
(1, 'Modules\\Products\\Product', 1, 'webp', 'Products/attachments/64046f40912c7_pala_de_padel_kraken_starvie_2021.pt03.webp', '2023-03-05 08:30:24', 1, '2023-03-05 08:30:24', 1, NULL, NULL, 22096, '64046f40912c7_pala_de_padel_kraken_starvie_2021.pt03.webp', 1, 'attachment', NULL),
(2, 'Modules\\Products\\Product', 1, 'webp', 'Products/attachments/64046f4098d03_karaken.webp', '2023-03-05 08:30:24', 1, '2023-03-05 08:30:24', 1, NULL, NULL, 56082, '64046f4098d03_karaken.webp', 1, 'attachment', NULL),
(3, 'Modules\\Products\\Product', 1, 'webp', 'Products/attachments/64046f409b10d_pala_de_padel_kraken_starvie_2021.pt01.webp', '2023-03-05 08:30:24', 1, '2023-03-05 08:30:24', 1, NULL, NULL, 6772, '64046f409b10d_pala_de_padel_kraken_starvie_2021.pt01.webp', 1, 'attachment', NULL),
(4, 'Modules\\Products\\Product', 1, 'webp', 'Products/attachments/64046f409d5cb_pala_de_padel_kraken_starvie_2021.pt02.webp', '2023-03-05 08:30:24', 1, '2023-03-05 08:30:24', 1, NULL, NULL, 7376, '64046f409d5cb_pala_de_padel_kraken_starvie_2021.pt02.webp', 1, 'attachment', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `blogs`
--

CREATE TABLE `blogs` (
  `id` int UNSIGNED NOT NULL,
  `slug` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `category_id` bigint UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `created_by` bigint UNSIGNED DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `updated_by` bigint UNSIGNED DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `deleted_by` bigint UNSIGNED DEFAULT NULL,
  `is_featured` tinyint(1) NOT NULL DEFAULT '0',
  `image` text COLLATE utf8mb4_unicode_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `blog_categories`
--

CREATE TABLE `blog_categories` (
  `id` bigint UNSIGNED NOT NULL,
  `order` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `created_by` bigint UNSIGNED DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `updated_by` bigint UNSIGNED DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `deleted_by` bigint UNSIGNED DEFAULT NULL,
  `image` text COLLATE utf8mb4_unicode_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `blog_category_trans`
--

CREATE TABLE `blog_category_trans` (
  `blog_category_id` bigint UNSIGNED NOT NULL,
  `language_id` int UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `created_by` bigint UNSIGNED DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `updated_by` bigint UNSIGNED DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `deleted_by` bigint UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `blog_trans`
--

CREATE TABLE `blog_trans` (
  `blog_id` int UNSIGNED NOT NULL,
  `language_id` int UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `meta_title` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `meta_description` mediumtext COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `created_by` bigint UNSIGNED DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `updated_by` bigint UNSIGNED DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `deleted_by` bigint UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `branches`
--

CREATE TABLE `branches` (
  `id` bigint UNSIGNED NOT NULL,
  `branch` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `latitude` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `longitude` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `created_by` bigint UNSIGNED DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `updated_by` bigint UNSIGNED DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `deleted_by` bigint UNSIGNED DEFAULT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `branch_ar` text COLLATE utf8mb4_unicode_ci,
  `address_en` text COLLATE utf8mb4_unicode_ci,
  `how_to_reach_en` text COLLATE utf8mb4_unicode_ci,
  `address_ar` text COLLATE utf8mb4_unicode_ci,
  `how_to_reach_ar` text COLLATE utf8mb4_unicode_ci,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `map` text COLLATE utf8mb4_unicode_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

CREATE TABLE `brands` (
  `id` bigint UNSIGNED NOT NULL,
  `name_en` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name_ar` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `created_by` bigint UNSIGNED DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `updated_by` bigint UNSIGNED DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `deleted_by` bigint UNSIGNED DEFAULT NULL,
  `is_featured` tinyint(1) NOT NULL DEFAULT '0',
  `category_id` bigint UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`id`, `name_en`, `name_ar`, `image`, `created_at`, `created_by`, `updated_at`, `updated_by`, `deleted_at`, `deleted_by`, `is_featured`, `category_id`) VALUES
(1, 'Babolat', 'بابولات', NULL, '2023-03-05 08:18:44', 1, '2023-03-05 08:18:44', 1, NULL, NULL, 0, 5),
(2, 'Starvie', 'ستارفي', NULL, '2023-03-05 08:19:43', 1, '2023-03-05 08:19:43', 1, NULL, NULL, 0, 5),
(3, 'Vidar', 'فيدار', NULL, '2023-03-05 08:20:27', 1, '2023-03-05 08:20:27', 1, NULL, NULL, 0, 5);

-- --------------------------------------------------------

--
-- Table structure for table `brand_product`
--

CREATE TABLE `brand_product` (
  `id` bigint UNSIGNED NOT NULL,
  `product_id` bigint UNSIGNED NOT NULL,
  `brand_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `careers`
--

CREATE TABLE `careers` (
  `id` int UNSIGNED NOT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `created_by` bigint UNSIGNED DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `updated_by` bigint UNSIGNED DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `deleted_by` bigint UNSIGNED DEFAULT NULL,
  `number_of_available_vacancies` int DEFAULT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` mediumtext COLLATE utf8mb4_unicode_ci,
  `years_of_experience` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gender` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `services` mediumtext COLLATE utf8mb4_unicode_ci,
  `resume` mediumtext COLLATE utf8mb4_unicode_ci,
  `message` mediumtext COLLATE utf8mb4_unicode_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `career_trans`
--

CREATE TABLE `career_trans` (
  `career_id` int UNSIGNED NOT NULL,
  `language_id` int UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `meta_title` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `meta_description` mediumtext COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `created_by` bigint UNSIGNED DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `updated_by` bigint UNSIGNED DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `deleted_by` bigint UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cms_managements`
--

CREATE TABLE `cms_managements` (
  `id` bigint UNSIGNED NOT NULL,
  `type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `created_by` bigint UNSIGNED DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `updated_by` bigint UNSIGNED DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `deleted_by` bigint UNSIGNED DEFAULT NULL,
  `product_id` bigint DEFAULT NULL,
  `image` text COLLATE utf8mb4_unicode_ci,
  `award_date` date DEFAULT NULL,
  `award_section` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `magazine_logo` text COLLATE utf8mb4_unicode_ci,
  `link` text COLLATE utf8mb4_unicode_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cms_management_trans`
--

CREATE TABLE `cms_management_trans` (
  `cms_management_id` bigint UNSIGNED NOT NULL,
  `language_id` int UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `created_by` bigint UNSIGNED DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `updated_by` bigint UNSIGNED DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `deleted_by` bigint UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE `contacts` (
  `id` bigint UNSIGNED NOT NULL,
  `value` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `created_by` bigint UNSIGNED DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `updated_by` bigint UNSIGNED DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `deleted_by` bigint UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `contact_us`
--

CREATE TABLE `contact_us` (
  `id` bigint UNSIGNED NOT NULL,
  `full_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subject` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `message` mediumtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `created_by` bigint UNSIGNED DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `updated_by` bigint UNSIGNED DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `deleted_by` bigint UNSIGNED DEFAULT NULL,
  `best_time_to_call_from` timestamp NULL DEFAULT NULL,
  `best_time_to_call_to` timestamp NULL DEFAULT NULL,
  `link` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_readed` tinyint(1) NOT NULL DEFAULT '0',
  `phone_number` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `currencies`
--

CREATE TABLE `currencies` (
  `id` int UNSIGNED NOT NULL,
  `priority` int NOT NULL,
  `iso_code` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `symbol` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subunit` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subunit_to_unit` int NOT NULL,
  `symbol_first` tinyint(1) NOT NULL,
  `html_entity` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `decimal_mark` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `thousands_separator` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `iso_numeric` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `created_by` bigint UNSIGNED DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `updated_by` bigint UNSIGNED DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `deleted_by` bigint UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `id` int UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `created_by` bigint UNSIGNED DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `updated_by` bigint UNSIGNED DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `deleted_by` bigint UNSIGNED DEFAULT NULL,
  `is_featured` tinyint(1) NOT NULL DEFAULT '0',
  `start_date` timestamp NULL DEFAULT NULL,
  `end_date` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `event_trans`
--

CREATE TABLE `event_trans` (
  `event_id` int UNSIGNED NOT NULL,
  `language_id` int UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `meta_title` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `meta_description` mediumtext COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `created_by` bigint UNSIGNED DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `updated_by` bigint UNSIGNED DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `deleted_by` bigint UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `footer_links`
--

CREATE TABLE `footer_links` (
  `id` bigint UNSIGNED NOT NULL,
  `link` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `created_by` bigint UNSIGNED DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `updated_by` bigint UNSIGNED DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `deleted_by` bigint UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `footer_links_trans`
--

CREATE TABLE `footer_links_trans` (
  `id` bigint UNSIGNED NOT NULL,
  `footer_link_id` bigint NOT NULL,
  `language_id` int NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `created_by` bigint UNSIGNED DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `updated_by` bigint UNSIGNED DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `deleted_by` bigint UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `groups`
--

CREATE TABLE `groups` (
  `id` int UNSIGNED NOT NULL,
  `parent_id` int UNSIGNED DEFAULT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_hidden` tinyint NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `created_by` bigint UNSIGNED DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `updated_by` bigint UNSIGNED DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `deleted_by` bigint UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `groups`
--

INSERT INTO `groups` (`id`, `parent_id`, `name`, `slug`, `description`, `is_hidden`, `created_at`, `created_by`, `updated_at`, `updated_by`, `deleted_at`, `deleted_by`) VALUES
(1, NULL, 'Technical Support', 'technical-support', 'Technical Support Group', 1, '2023-03-05 04:47:03', NULL, NULL, NULL, NULL, NULL),
(2, 1, 'General Managers', 'general-managers', 'General Managers Group', 0, '2023-03-05 04:47:03', NULL, NULL, NULL, NULL, NULL),
(3, 1, 'Parties Customers', 'parties-customers', 'Parties Customers Group', 0, '2023-03-05 04:47:03', NULL, NULL, NULL, NULL, NULL),
(4, 1, 'Offices', 'offices', 'Offices Group', 0, '2023-03-05 04:47:03', NULL, NULL, NULL, NULL, NULL),
(5, 1, 'Individual Customers', 'individual-customers', 'Individual Customers Group', 0, '2023-03-05 04:47:03', NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `group_permissions`
--

CREATE TABLE `group_permissions` (
  `group_id` int UNSIGNED NOT NULL,
  `permission_id` int UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `group_permissions`
--

INSERT INTO `group_permissions` (`group_id`, `permission_id`, `created_at`, `updated_at`) VALUES
(1, 1, '2023-03-05 04:47:03', NULL),
(1, 2, '2023-03-05 04:47:03', NULL),
(1, 3, '2023-03-05 04:47:03', NULL),
(1, 4, '2023-03-05 04:47:03', NULL),
(1, 5, '2023-03-05 04:47:03', NULL),
(1, 6, '2023-03-05 04:47:03', NULL),
(1, 7, '2023-03-05 04:47:03', NULL),
(1, 8, '2023-03-05 04:47:03', NULL),
(1, 9, '2023-03-05 04:47:03', NULL),
(1, 10, '2023-03-05 04:47:03', NULL),
(1, 11, '2023-03-05 04:47:03', NULL),
(1, 12, '2023-03-05 04:47:03', NULL),
(1, 13, '2023-03-05 04:47:03', NULL),
(1, 14, '2023-03-05 04:47:03', NULL),
(1, 15, '2023-03-05 04:47:03', NULL),
(1, 16, '2023-03-05 04:47:03', NULL),
(2, 1, '2023-03-05 04:47:03', NULL),
(2, 2, '2023-03-05 04:47:03', NULL),
(2, 3, '2023-03-05 04:47:03', NULL),
(2, 4, '2023-03-05 04:47:03', NULL),
(2, 5, '2023-03-05 04:47:03', NULL),
(2, 6, '2023-03-05 04:47:03', NULL),
(2, 7, '2023-03-05 04:47:03', NULL),
(2, 8, '2023-03-05 04:47:03', NULL),
(2, 9, '2023-03-05 04:47:03', NULL),
(2, 10, '2023-03-05 04:47:03', NULL),
(2, 11, '2023-03-05 04:47:03', NULL),
(2, 12, '2023-03-05 04:47:03', NULL),
(2, 13, '2023-03-05 04:47:03', NULL),
(2, 14, '2023-03-05 04:47:03', NULL),
(2, 15, '2023-03-05 04:47:03', NULL),
(2, 16, '2023-03-05 04:47:03', NULL),
(3, 1, '2023-03-05 04:47:03', NULL),
(3, 2, '2023-03-05 04:47:03', NULL),
(3, 3, '2023-03-05 04:47:03', NULL),
(3, 4, '2023-03-05 04:47:03', NULL),
(3, 5, '2023-03-05 04:47:03', NULL),
(3, 6, '2023-03-05 04:47:03', NULL),
(3, 7, '2023-03-05 04:47:03', NULL),
(3, 8, '2023-03-05 04:47:03', NULL),
(3, 9, '2023-03-05 04:47:03', NULL),
(3, 10, '2023-03-05 04:47:03', NULL),
(3, 11, '2023-03-05 04:47:03', NULL),
(3, 12, '2023-03-05 04:47:03', NULL),
(3, 13, '2023-03-05 04:47:03', NULL),
(3, 14, '2023-03-05 04:47:03', NULL),
(3, 15, '2023-03-05 04:47:03', NULL),
(3, 16, '2023-03-05 04:47:03', NULL),
(4, 1, '2023-03-05 04:47:03', NULL),
(4, 2, '2023-03-05 04:47:03', NULL),
(4, 3, '2023-03-05 04:47:03', NULL),
(4, 4, '2023-03-05 04:47:03', NULL),
(4, 5, '2023-03-05 04:47:03', NULL),
(4, 6, '2023-03-05 04:47:03', NULL),
(4, 7, '2023-03-05 04:47:03', NULL),
(4, 8, '2023-03-05 04:47:03', NULL),
(4, 9, '2023-03-05 04:47:03', NULL),
(4, 10, '2023-03-05 04:47:03', NULL),
(4, 11, '2023-03-05 04:47:03', NULL),
(4, 12, '2023-03-05 04:47:03', NULL),
(4, 13, '2023-03-05 04:47:03', NULL),
(4, 14, '2023-03-05 04:47:03', NULL),
(4, 15, '2023-03-05 04:47:03', NULL),
(4, 16, '2023-03-05 04:47:03', NULL),
(1, 303, '2023-03-05 04:47:03', NULL),
(1, 304, '2023-03-05 04:47:03', NULL),
(1, 305, '2023-03-05 04:47:03', NULL),
(1, 306, '2023-03-05 04:47:03', NULL),
(1, 307, '2023-03-05 04:47:03', NULL),
(2, 303, '2023-03-05 04:47:03', NULL),
(2, 304, '2023-03-05 04:47:03', NULL),
(2, 305, '2023-03-05 04:47:03', NULL),
(2, 306, '2023-03-05 04:47:03', NULL),
(2, 307, '2023-03-05 04:47:03', NULL),
(1, 373, '2023-03-05 04:47:03', NULL),
(1, 374, '2023-03-05 04:47:03', NULL),
(1, 375, '2023-03-05 04:47:03', NULL),
(1, 376, '2023-03-05 04:47:03', NULL),
(1, 377, '2023-03-05 04:47:03', NULL),
(2, 373, '2023-03-05 04:47:03', NULL),
(2, 374, '2023-03-05 04:47:03', NULL),
(2, 375, '2023-03-05 04:47:03', NULL),
(2, 376, '2023-03-05 04:47:03', NULL),
(2, 377, '2023-03-05 04:47:03', NULL),
(1, 383, '2023-03-05 04:47:03', NULL),
(1, 384, '2023-03-05 04:47:03', NULL),
(1, 385, '2023-03-05 04:47:03', NULL),
(1, 386, '2023-03-05 04:47:03', NULL),
(1, 387, '2023-03-05 04:47:03', NULL),
(2, 383, '2023-03-05 04:47:03', NULL),
(2, 384, '2023-03-05 04:47:03', NULL),
(2, 385, '2023-03-05 04:47:03', NULL),
(2, 386, '2023-03-05 04:47:03', NULL),
(2, 387, '2023-03-05 04:47:03', NULL),
(1, 591, '2023-03-05 04:47:03', NULL),
(1, 592, '2023-03-05 04:47:03', NULL),
(1, 593, '2023-03-05 04:47:03', NULL),
(1, 594, '2023-03-05 04:47:03', NULL),
(1, 595, '2023-03-05 04:47:03', NULL),
(2, 591, '2023-03-05 04:47:03', NULL),
(2, 592, '2023-03-05 04:47:03', NULL),
(2, 593, '2023-03-05 04:47:03', NULL),
(2, 594, '2023-03-05 04:47:03', NULL),
(2, 595, '2023-03-05 04:47:03', NULL),
(4, 591, '2023-03-05 04:47:03', NULL),
(4, 592, '2023-03-05 04:47:03', NULL),
(4, 593, '2023-03-05 04:47:03', NULL),
(4, 594, '2023-03-05 04:47:03', NULL),
(4, 595, '2023-03-05 04:47:03', NULL),
(1, 596, '2023-03-05 04:47:03', NULL),
(1, 597, '2023-03-05 04:47:03', NULL),
(1, 598, '2023-03-05 04:47:03', NULL),
(1, 599, '2023-03-05 04:47:03', NULL),
(1, 600, '2023-03-05 04:47:03', NULL),
(2, 596, '2023-03-05 04:47:03', NULL),
(2, 597, '2023-03-05 04:47:03', NULL),
(2, 598, '2023-03-05 04:47:03', NULL),
(2, 599, '2023-03-05 04:47:03', NULL),
(2, 600, '2023-03-05 04:47:03', NULL),
(1, 328, '2023-03-05 04:47:03', NULL),
(1, 329, '2023-03-05 04:47:03', NULL),
(1, 330, '2023-03-05 04:47:03', NULL),
(1, 331, '2023-03-05 04:47:03', NULL),
(1, 332, '2023-03-05 04:47:03', NULL),
(2, 328, '2023-03-05 04:47:03', NULL),
(2, 329, '2023-03-05 04:47:03', NULL),
(2, 330, '2023-03-05 04:47:03', NULL),
(2, 331, '2023-03-05 04:47:03', NULL),
(2, 332, '2023-03-05 04:47:03', NULL),
(1, 343, '2023-03-05 04:47:03', NULL),
(1, 344, '2023-03-05 04:47:03', NULL),
(1, 345, '2023-03-05 04:47:03', NULL),
(1, 346, '2023-03-05 04:47:03', NULL),
(1, 347, '2023-03-05 04:47:03', NULL),
(2, 343, '2023-03-05 04:47:03', NULL),
(2, 344, '2023-03-05 04:47:03', NULL),
(2, 345, '2023-03-05 04:47:03', NULL),
(2, 346, '2023-03-05 04:47:03', NULL),
(2, 347, '2023-03-05 04:47:03', NULL),
(1, 348, '2023-03-05 04:47:03', NULL),
(1, 349, '2023-03-05 04:47:03', NULL),
(1, 350, '2023-03-05 04:47:03', NULL),
(1, 351, '2023-03-05 04:47:03', NULL),
(1, 352, '2023-03-05 04:47:03', NULL),
(2, 348, '2023-03-05 04:47:03', NULL),
(2, 349, '2023-03-05 04:47:03', NULL),
(2, 350, '2023-03-05 04:47:03', NULL),
(2, 351, '2023-03-05 04:47:03', NULL),
(2, 352, '2023-03-05 04:47:03', NULL),
(1, 353, '2023-03-05 04:47:03', NULL),
(1, 354, '2023-03-05 04:47:03', NULL),
(1, 355, '2023-03-05 04:47:03', NULL),
(1, 356, '2023-03-05 04:47:03', NULL),
(1, 357, '2023-03-05 04:47:03', NULL),
(2, 353, '2023-03-05 04:47:03', NULL),
(2, 354, '2023-03-05 04:47:03', NULL),
(2, 355, '2023-03-05 04:47:03', NULL),
(2, 356, '2023-03-05 04:47:03', NULL),
(2, 357, '2023-03-05 04:47:03', NULL),
(1, 358, '2023-03-05 04:47:03', NULL),
(1, 359, '2023-03-05 04:47:03', NULL),
(1, 360, '2023-03-05 04:47:03', NULL),
(1, 361, '2023-03-05 04:47:03', NULL),
(1, 362, '2023-03-05 04:47:03', NULL),
(2, 358, '2023-03-05 04:47:03', NULL),
(2, 359, '2023-03-05 04:47:03', NULL),
(2, 360, '2023-03-05 04:47:03', NULL),
(2, 361, '2023-03-05 04:47:03', NULL),
(2, 362, '2023-03-05 04:47:03', NULL),
(1, 393, '2023-03-05 04:47:03', NULL),
(1, 394, '2023-03-05 04:47:03', NULL),
(1, 395, '2023-03-05 04:47:03', NULL),
(1, 396, '2023-03-05 04:47:03', NULL),
(1, 397, '2023-03-05 04:47:03', NULL),
(2, 393, '2023-03-05 04:47:03', NULL),
(2, 394, '2023-03-05 04:47:03', NULL),
(2, 395, '2023-03-05 04:47:03', NULL),
(2, 396, '2023-03-05 04:47:03', NULL),
(2, 397, '2023-03-05 04:47:03', NULL),
(1, 403, '2023-03-05 04:47:03', NULL),
(1, 404, '2023-03-05 04:47:03', NULL),
(1, 405, '2023-03-05 04:47:03', NULL),
(1, 406, '2023-03-05 04:47:03', NULL),
(1, 407, '2023-03-05 04:47:03', NULL),
(2, 403, '2023-03-05 04:47:03', NULL),
(2, 404, '2023-03-05 04:47:03', NULL),
(2, 405, '2023-03-05 04:47:03', NULL),
(2, 406, '2023-03-05 04:47:03', NULL),
(2, 407, '2023-03-05 04:47:03', NULL),
(1, 546, '2023-03-05 04:47:03', NULL),
(1, 547, '2023-03-05 04:47:03', NULL),
(1, 548, '2023-03-05 04:47:03', NULL),
(1, 549, '2023-03-05 04:47:03', NULL),
(1, 550, '2023-03-05 04:47:03', NULL),
(2, 546, '2023-03-05 04:47:03', NULL),
(2, 547, '2023-03-05 04:47:03', NULL),
(2, 548, '2023-03-05 04:47:03', NULL),
(2, 549, '2023-03-05 04:47:03', NULL),
(2, 550, '2023-03-05 04:47:03', NULL),
(1, 313, '2023-03-05 04:47:03', NULL),
(1, 314, '2023-03-05 04:47:03', NULL),
(1, 315, '2023-03-05 04:47:03', NULL),
(1, 316, '2023-03-05 04:47:03', NULL),
(1, 317, '2023-03-05 04:47:03', NULL),
(1, 408, '2023-03-05 04:47:03', NULL),
(2, 313, '2023-03-05 04:47:03', NULL),
(2, 314, '2023-03-05 04:47:03', NULL),
(2, 315, '2023-03-05 04:47:03', NULL),
(2, 316, '2023-03-05 04:47:03', NULL),
(2, 317, '2023-03-05 04:47:03', NULL),
(2, 408, '2023-03-05 04:47:03', NULL),
(1, 398, '2023-03-05 04:47:03', NULL),
(1, 399, '2023-03-05 04:47:03', NULL),
(1, 400, '2023-03-05 04:47:03', NULL),
(1, 401, '2023-03-05 04:47:03', NULL),
(1, 402, '2023-03-05 04:47:03', NULL),
(2, 398, '2023-03-05 04:47:03', NULL),
(2, 399, '2023-03-05 04:47:03', NULL),
(2, 400, '2023-03-05 04:47:03', NULL),
(2, 401, '2023-03-05 04:47:03', NULL),
(2, 402, '2023-03-05 04:47:03', NULL),
(1, 363, '2023-03-05 04:47:04', NULL),
(1, 364, '2023-03-05 04:47:04', NULL),
(1, 365, '2023-03-05 04:47:04', NULL),
(1, 366, '2023-03-05 04:47:04', NULL),
(1, 367, '2023-03-05 04:47:04', NULL),
(2, 363, '2023-03-05 04:47:04', NULL),
(2, 364, '2023-03-05 04:47:04', NULL),
(2, 365, '2023-03-05 04:47:04', NULL),
(2, 366, '2023-03-05 04:47:04', NULL),
(2, 367, '2023-03-05 04:47:04', NULL),
(1, 586, '2023-03-05 04:47:04', NULL),
(1, 587, '2023-03-05 04:47:04', NULL),
(1, 588, '2023-03-05 04:47:04', NULL),
(1, 589, '2023-03-05 04:47:04', NULL),
(1, 590, '2023-03-05 04:47:04', NULL),
(2, 586, '2023-03-05 04:47:04', NULL),
(2, 587, '2023-03-05 04:47:04', NULL),
(2, 588, '2023-03-05 04:47:04', NULL),
(2, 589, '2023-03-05 04:47:04', NULL),
(2, 590, '2023-03-05 04:47:04', NULL),
(1, 656, '2023-03-05 04:47:04', NULL),
(1, 657, '2023-03-05 04:47:04', NULL),
(1, 658, '2023-03-05 04:47:04', NULL),
(1, 659, '2023-03-05 04:47:04', NULL),
(1, 660, '2023-03-05 04:47:04', NULL),
(2, 656, '2023-03-05 04:47:04', NULL),
(2, 657, '2023-03-05 04:47:04', NULL),
(2, 658, '2023-03-05 04:47:04', NULL),
(2, 659, '2023-03-05 04:47:04', NULL),
(2, 660, '2023-03-05 04:47:04', NULL),
(1, 611, '2023-03-05 04:47:04', NULL),
(1, 612, '2023-03-05 04:47:04', NULL),
(1, 613, '2023-03-05 04:47:04', NULL),
(1, 614, '2023-03-05 04:47:04', NULL),
(1, 615, '2023-03-05 04:47:04', NULL),
(2, 611, '2023-03-05 04:47:04', NULL),
(2, 612, '2023-03-05 04:47:04', NULL),
(2, 613, '2023-03-05 04:47:04', NULL),
(2, 614, '2023-03-05 04:47:04', NULL),
(2, 615, '2023-03-05 04:47:04', NULL),
(1, 616, '2023-03-05 04:47:04', NULL),
(1, 617, '2023-03-05 04:47:04', NULL),
(1, 618, '2023-03-05 04:47:04', NULL),
(1, 619, '2023-03-05 04:47:04', NULL),
(1, 620, '2023-03-05 04:47:04', NULL),
(2, 616, '2023-03-05 04:47:04', NULL),
(2, 617, '2023-03-05 04:47:04', NULL),
(2, 618, '2023-03-05 04:47:04', NULL),
(2, 619, '2023-03-05 04:47:04', NULL),
(2, 620, '2023-03-05 04:47:04', NULL),
(1, 621, '2023-03-05 04:47:04', NULL),
(1, 622, '2023-03-05 04:47:04', NULL),
(1, 623, '2023-03-05 04:47:04', NULL),
(1, 624, '2023-03-05 04:47:04', NULL),
(1, 625, '2023-03-05 04:47:04', NULL),
(2, 621, '2023-03-05 04:47:04', NULL),
(2, 622, '2023-03-05 04:47:04', NULL),
(2, 623, '2023-03-05 04:47:04', NULL),
(2, 624, '2023-03-05 04:47:04', NULL),
(2, 625, '2023-03-05 04:47:04', NULL),
(1, 626, '2023-03-05 04:47:04', NULL),
(1, 627, '2023-03-05 04:47:04', NULL),
(1, 628, '2023-03-05 04:47:04', NULL),
(1, 629, '2023-03-05 04:47:04', NULL),
(1, 630, '2023-03-05 04:47:04', NULL),
(2, 626, '2023-03-05 04:47:04', NULL),
(2, 627, '2023-03-05 04:47:04', NULL),
(2, 628, '2023-03-05 04:47:04', NULL),
(2, 629, '2023-03-05 04:47:04', NULL),
(2, 630, '2023-03-05 04:47:04', NULL),
(1, 631, '2023-03-05 04:47:04', NULL),
(1, 632, '2023-03-05 04:47:04', NULL),
(1, 633, '2023-03-05 04:47:04', NULL),
(1, 634, '2023-03-05 04:47:04', NULL),
(1, 635, '2023-03-05 04:47:04', NULL),
(2, 631, '2023-03-05 04:47:04', NULL),
(2, 632, '2023-03-05 04:47:04', NULL),
(2, 633, '2023-03-05 04:47:04', NULL),
(2, 634, '2023-03-05 04:47:04', NULL),
(2, 635, '2023-03-05 04:47:04', NULL),
(1, 661, '2023-03-05 04:47:04', NULL),
(1, 662, '2023-03-05 04:47:04', NULL),
(1, 663, '2023-03-05 04:47:04', NULL),
(1, 664, '2023-03-05 04:47:04', NULL),
(1, 665, '2023-03-05 04:47:04', NULL),
(2, 661, '2023-03-05 04:47:04', NULL),
(2, 662, '2023-03-05 04:47:04', NULL),
(2, 663, '2023-03-05 04:47:04', NULL),
(2, 664, '2023-03-05 04:47:04', NULL),
(2, 665, '2023-03-05 04:47:04', NULL),
(1, 308, '2023-03-05 04:47:04', NULL),
(1, 309, '2023-03-05 04:47:04', NULL),
(1, 310, '2023-03-05 04:47:04', NULL),
(1, 311, '2023-03-05 04:47:04', NULL),
(1, 312, '2023-03-05 04:47:04', NULL),
(2, 308, '2023-03-05 04:47:04', NULL),
(2, 309, '2023-03-05 04:47:04', NULL),
(2, 310, '2023-03-05 04:47:04', NULL),
(2, 311, '2023-03-05 04:47:04', NULL),
(2, 312, '2023-03-05 04:47:04', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `host_details`
--

CREATE TABLE `host_details` (
  `id` bigint UNSIGNED NOT NULL,
  `fqdn` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `package_id` int UNSIGNED NOT NULL,
  `owner_email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `owner_mobile_number` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `host_details`
--

INSERT INTO `host_details` (`id`, `fqdn`, `package_id`, `owner_email`, `owner_mobile_number`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'localhost', 1, 'support@Nexen.com', '01207395400', NULL, NULL, NULL),
(2, 'new-home.laravel.com', 1, 'support@Nexen.com', '01207395400', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `how_works`
--

CREATE TABLE `how_works` (
  `id` bigint UNSIGNED NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `created_by` bigint UNSIGNED DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `updated_by` bigint UNSIGNED DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `deleted_by` bigint UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `how_work_trans`
--

CREATE TABLE `how_work_trans` (
  `id` bigint UNSIGNED NOT NULL,
  `how_work_id` bigint NOT NULL,
  `language_id` int NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` mediumtext COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `created_by` bigint UNSIGNED DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `updated_by` bigint UNSIGNED DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `deleted_by` bigint UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `informations`
--

CREATE TABLE `informations` (
  `id` int UNSIGNED NOT NULL,
  `slug` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `category_id` bigint UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `created_by` bigint UNSIGNED DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `updated_by` bigint UNSIGNED DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `deleted_by` bigint UNSIGNED DEFAULT NULL,
  `is_featured` tinyint(1) NOT NULL DEFAULT '0',
  `image` text COLLATE utf8mb4_unicode_ci,
  `info_date` date DEFAULT NULL,
  `period_from` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `period_to` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ref` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT 'info',
  `sub_category_id` bigint DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `information_categories`
--

CREATE TABLE `information_categories` (
  `id` bigint UNSIGNED NOT NULL,
  `order` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `created_by` bigint UNSIGNED DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `updated_by` bigint UNSIGNED DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `deleted_by` bigint UNSIGNED DEFAULT NULL,
  `image` text COLLATE utf8mb4_unicode_ci,
  `parent_id` bigint DEFAULT NULL,
  `page_view` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT 'list',
  `ref` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT 'info',
  `period_from` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `period_to` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `information_category_trans`
--

CREATE TABLE `information_category_trans` (
  `information_category_id` bigint UNSIGNED NOT NULL,
  `language_id` int UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `created_by` bigint UNSIGNED DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `updated_by` bigint UNSIGNED DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `deleted_by` bigint UNSIGNED DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `information_trans`
--

CREATE TABLE `information_trans` (
  `information_id` int UNSIGNED NOT NULL,
  `language_id` int UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `meta_title` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `meta_description` mediumtext COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `created_by` bigint UNSIGNED DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `updated_by` bigint UNSIGNED DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `deleted_by` bigint UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `languages`
--

CREATE TABLE `languages` (
  `id` int UNSIGNED NOT NULL,
  `code` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `languages`
--

INSERT INTO `languages` (`id`, `code`, `created_at`, `updated_at`) VALUES
(1, 'en', NULL, NULL),
(2, 'ar', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `locations`
--

CREATE TABLE `locations` (
  `id` int UNSIGNED NOT NULL,
  `parent_id` int UNSIGNED DEFAULT NULL,
  `slug` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `order` int DEFAULT '0',
  `is_active` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `created_by` bigint UNSIGNED DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `updated_by` bigint UNSIGNED DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `deleted_by` bigint UNSIGNED DEFAULT NULL,
  `in_discover_by` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `locations`
--

INSERT INTO `locations` (`id`, `parent_id`, `slug`, `code`, `order`, `is_active`, `created_at`, `created_by`, `updated_at`, `updated_by`, `deleted_at`, `deleted_by`, `in_discover_by`) VALUES
(46, NULL, 'country', NULL, 0, 0, '2019-03-08 13:45:48', NULL, '2019-03-08 13:45:48', NULL, NULL, NULL, 0),
(110, 46, 'EG', '20', 0, 1, '2019-03-08 13:45:51', NULL, '2019-03-08 13:45:51', NULL, NULL, NULL, 0),
(52726, 110, 'cairo', '20', 0, 1, '2019-03-08 14:27:08', NULL, '2019-03-08 14:27:08', NULL, NULL, NULL, 0),
(52758, 52726, 'tagamoa-el-khames', '20', 0, 1, '2019-03-08 14:27:09', NULL, '2019-03-08 14:27:09', NULL, NULL, NULL, 0),
(52759, 52726, 'zamalik', '20', 0, 1, '2019-03-08 14:27:09', NULL, '2019-03-08 14:27:09', NULL, NULL, NULL, 0);

-- --------------------------------------------------------

--
-- Table structure for table `location_trans`
--

CREATE TABLE `location_trans` (
  `id` bigint UNSIGNED NOT NULL,
  `location_id` int UNSIGNED NOT NULL,
  `language_id` int UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `created_by` bigint UNSIGNED DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `updated_by` bigint UNSIGNED DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `deleted_by` bigint UNSIGNED DEFAULT NULL,
  `meta_title` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` mediumtext COLLATE utf8mb4_unicode_ci,
  `meta_description` mediumtext COLLATE utf8mb4_unicode_ci,
  `second_title` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `location_trans`
--

INSERT INTO `location_trans` (`id`, `location_id`, `language_id`, `name`, `created_at`, `created_by`, `updated_at`, `updated_by`, `deleted_at`, `deleted_by`, `meta_title`, `description`, `meta_description`, `second_title`) VALUES
(1, 110, 1, 'Egypt', '2019-03-08 14:27:26', NULL, '2019-03-08 14:27:26', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(2, 110, 2, 'مصر', '2019-03-08 14:27:26', NULL, '2019-03-08 14:27:26', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(3, 52726, 1, 'Cairo', '2019-03-08 14:27:26', NULL, '2019-03-08 14:27:26', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(4, 52726, 2, 'القاهرة', '2019-03-08 14:27:26', NULL, '2019-03-08 14:27:26', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(5, 52758, 1, 'Tagamoa El Khames', '2019-03-08 14:27:26', NULL, '2019-03-08 14:27:26', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(6, 52758, 2, 'التجمع الخامس', '2019-03-08 14:27:26', NULL, '2019-03-08 14:27:26', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(7, 52759, 1, 'Zamalik', '2019-03-08 14:27:26', NULL, '2019-03-08 14:27:26', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(8, 52759, 2, 'الزمالك', '2019-03-08 14:27:26', NULL, '2019-03-08 14:27:26', NULL, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `logos`
--

CREATE TABLE `logos` (
  `id` bigint UNSIGNED NOT NULL,
  `key` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'logo',
  `value` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `created_by` bigint UNSIGNED DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `updated_by` bigint UNSIGNED DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `deleted_by` bigint UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `main_sliders`
--

CREATE TABLE `main_sliders` (
  `id` bigint UNSIGNED NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `link` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `created_by` bigint UNSIGNED DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `updated_by` bigint UNSIGNED DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `deleted_by` bigint UNSIGNED DEFAULT NULL,
  `title_en` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title_ar` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `main_slider_trans`
--

CREATE TABLE `main_slider_trans` (
  `id` bigint UNSIGNED NOT NULL,
  `main_slider_id` bigint NOT NULL,
  `language_id` int NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `button_text` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` mediumtext COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `created_by` bigint UNSIGNED DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `updated_by` bigint UNSIGNED DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `deleted_by` bigint UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `media`
--

CREATE TABLE `media` (
  `id` bigint UNSIGNED NOT NULL,
  `model_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint UNSIGNED NOT NULL,
  `collection_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `file_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mime_type` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `disk` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `size` bigint UNSIGNED NOT NULL,
  `manipulations` json NOT NULL,
  `custom_properties` json NOT NULL,
  `responsive_images` json NOT NULL,
  `order_column` int UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2016_06_01_000001_create_oauth_auth_codes_table', 1),
(4, '2016_06_01_000002_create_oauth_access_tokens_table', 1),
(5, '2016_06_01_000003_create_oauth_refresh_tokens_table', 1),
(6, '2016_06_01_000004_create_oauth_clients_table', 1),
(7, '2016_06_01_000005_create_oauth_personal_access_clients_table', 1),
(8, '2019_01_02_060814_create_groups_table', 1),
(9, '2019_01_02_061420_create_permissions_table', 1),
(10, '2019_01_02_061608_create_group_permission_table', 1),
(11, '2019_01_02_061612_create_user_permissions_table', 1),
(12, '2019_02_09_104719_create_modules_table', 1),
(13, '2019_02_09_104745_create_packages_table', 1),
(14, '2019_02_09_104843_create_package_modules_table', 1),
(15, '2019_02_09_104907_create_host_details_table', 1),
(16, '2019_02_19_061109_create_languages_table', 1),
(17, '2019_03_08_125116_create_locations_table', 1),
(18, '2019_03_30_142619_create_currencies_table', 1),
(19, '2019_04_27_184917_create_tags_table', 1),
(20, '2019_04_27_184937_create_tagables_table', 1),
(21, '2019_05_10_150506_add_userstamps_to_groups_table', 1),
(22, '2019_05_10_153145_add_userstamps_to_users_table', 1),
(23, '2019_05_10_182822_add_userstamps_to_currencies_table', 1),
(24, '2019_05_10_184438_add_userstamps_to_locations_table', 1),
(25, '2019_05_10_185554_add_userstamps_to_tags_table', 1),
(26, '2019_08_19_000000_create_failed_jobs_table', 1),
(27, '2019_10_29_140154_create_attachmentables_table', 1),
(28, '2019_10_29_140209_add_attachmentables_userStamp_table', 1),
(29, '2019_11_11_094925_add_module_id_to_permissions_table', 1),
(30, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(31, '2020_02_17_091243_create_activity_log_table', 1),
(32, '2020_02_17_133357_create_media_table', 1),
(33, '2020_02_23_074123_add_users_timezone_table', 1),
(34, '2020_03_01_091652_create_ads_table', 1),
(35, '2020_03_01_091652_create_blogs_table', 1),
(36, '2020_03_01_091652_create_events_table', 1),
(37, '2020_03_01_091652_create_informations_table', 1),
(38, '2020_03_01_091652_create_services_table', 1),
(39, '2020_03_01_091704_create_blog_trans_table', 1),
(40, '2020_03_01_091704_create_event_trans_table', 1),
(41, '2020_03_01_091704_create_information_trans_table', 1),
(42, '2020_03_01_091704_create_service_trans_table', 1),
(43, '2020_03_01_091730_add_ads_userStamps_table', 1),
(44, '2020_03_01_091730_add_blogs_userStamps_table', 1),
(45, '2020_03_01_091730_add_events_userStamps_table', 1),
(46, '2020_03_01_091730_add_informations_userStamps_table', 1),
(47, '2020_03_01_091730_add_services_userStamps_table', 1),
(48, '2020_03_01_091737_add_blog_trans_userStamps_table', 1),
(49, '2020_03_01_091737_add_event_trans_userStamps_table', 1),
(50, '2020_03_01_091737_add_information_trans_userStamps_table', 1),
(51, '2020_03_01_091737_add_service_trans_userStamps_table', 1),
(52, '2020_03_02_103507_add__ads_isFeatured_table', 1),
(53, '2020_03_02_103507_add__blogs_isFeatured_table', 1),
(54, '2020_03_02_103507_add__events_isFeatured_table', 1),
(55, '2020_03_02_103507_add__informations_isFeatured_table', 1),
(56, '2020_03_02_103507_add_services_isFeatured_table', 1),
(57, '2020_03_04_080111_create_contact_us_table', 1),
(58, '2020_03_04_080138_add_contact_us_userStamps_table', 1),
(59, '2020_03_04_091652_create_careers_table', 1),
(60, '2020_03_04_091652_create_seo_table', 1),
(61, '2020_03_04_091704_create_career_trans_table', 1),
(62, '2020_03_04_091704_create_seo_trans_table', 1),
(63, '2020_03_04_091730_add_careers_userStamps_table', 1),
(64, '2020_03_04_091730_add_seo_userStamps_table', 1),
(65, '2020_03_04_091737_add_career_trans_userStamps_table', 1),
(66, '2020_03_04_091737_add_seo_trans_userStamps_table', 1),
(67, '2020_03_04_103507_add__careers_isFeatured_table', 1),
(68, '2020_03_04_113349_drop_contact_us_table', 1),
(69, '2020_03_04_115426_add_contact_us_table', 1),
(70, '2020_03_04_124935_add__careers_numberOfAvailableVacancies', 1),
(71, '2020_03_05_144003_create_about_table', 1),
(72, '2020_03_05_144003_create_socials_table', 1),
(73, '2020_03_05_144003_create_testimonials_table', 1),
(74, '2020_03_05_144016_create_about_trans_table', 1),
(75, '2020_03_05_144016_create_socials_trans_table', 1),
(76, '2020_03_05_144016_create_testimonial_trans_table', 1),
(77, '2020_03_05_144052_add_about_trans_userStamps_table', 1),
(78, '2020_03_05_144052_add_socials_trans_userStamps_table', 1),
(79, '2020_03_05_144052_add_testimonial_trans_userStamps_table', 1),
(80, '2020_03_05_144101_add_about_userStamps_table', 1),
(81, '2020_03_05_144101_add_socials_userStamps_table', 1),
(82, '2020_03_05_144101_add_testimonial_userStamps_table', 1),
(83, '2020_03_08_100958_add_media_soft_deletes_table', 1),
(84, '2020_03_09_151625_drop_blogs_start_date_table', 1),
(85, '2020_03_09_151625_drop_informations_start_date_table', 1),
(86, '2020_03_10_074130_create_logos_table', 1),
(87, '2020_03_10_074252_add_logos_userStamps_table', 1),
(88, '2020_03_10_074309_create_footerlinks_table', 1),
(89, '2020_03_10_074612_add_footerlinks_userStamps_table', 1),
(90, '2020_03_10_080218_create_footer_links_trans_table', 1),
(91, '2020_03_10_080229_add_footer_links_trans_userStamps_table', 1),
(92, '2020_03_11_111002_create_contacts_table', 1),
(93, '2020_03_11_111018_add_contacts_userStamps_table', 1),
(94, '2020_03_15_102248_create_main_sliders_table', 1),
(95, '2020_03_15_102408_add_main_sliders_userStamps_table', 1),
(96, '2020_03_15_102555_create_main_slider_trans_table', 1),
(97, '2020_03_15_102610_add_main_slider_trans_userStamps_table', 1),
(98, '2020_03_15_142407_create_ratings_table', 1),
(99, '2020_03_15_143711_add_ratings_userStamps_table', 1),
(100, '2020_03_16_092615_create_locations_trans_table', 1),
(101, '2020_03_16_092628_add_locations_trans_userStamps_table', 1),
(102, '2020_03_16_115523_drop_locations_name_table', 1),
(103, '2020_03_23_153542_add_ads_starting_date_table', 1),
(104, '2020_03_23_153542_add_events_starting_date_table', 1),
(105, '2020_03_23_182556_change_location_slug_table', 1),
(106, '2020_04_06_200738_create_notifications_table', 1),
(107, '2020_04_07_110230_add_attachmentables_fileds_table', 1),
(108, '2020_04_14_121402_add_attachment_type_table', 1),
(109, '2020_04_19_143255_create_subscribe_table', 1),
(110, '2020_04_19_143313_add_subscribe_userStamps_table', 1),
(111, '2020_04_21_064314_create_blog_categories_table', 1),
(112, '2020_04_21_064314_create_information_categories_table', 1),
(113, '2020_04_21_064345_add_blog_categories_userStamps_table', 1),
(114, '2020_04_21_064345_add_information_categories_userStamps_table', 1),
(115, '2020_04_21_064401_create_blog_categories_trans_table', 1),
(116, '2020_04_21_064401_create_information_categories_trans_table', 1),
(117, '2020_04_21_064413_add_blog_categories_trans_userStamps_table', 1),
(118, '2020_04_21_064413_add_information_categories_trans_userStamps_table', 1),
(119, '2020_04_21_114332_add_blog_categoryId_table', 1),
(120, '2020_04_21_114332_add_information_categoryId_table', 1),
(121, '2020_04_23_080550_add_tags_color_table', 1),
(122, '2020_04_28_073916_create_top_agent_table', 1),
(123, '2020_04_28_073933_add_top_agent_userStamps_table', 1),
(124, '2020_04_28_102347_add_user_bio_table', 1),
(125, '2020_05_01_084557_add_contact_us_link_table', 1),
(126, '2020_05_03_113040_add_blog_slug_field_table', 1),
(127, '2020_05_03_113040_add_information_slug_field_table', 1),
(128, '2020_05_03_113056_add_career_slug_field_table', 1),
(129, '2020_05_10_222511_change_locations_order_table', 1),
(130, '2020_05_11_232659_create_branches_table', 1),
(131, '2020_05_12_002325_add_timestamps_to_branches_table', 1),
(132, '2021_01_19_094838_create_cms_managements_table', 1),
(133, '2021_01_19_094849_create_cms_management_trans_table', 1),
(134, '2021_01_19_094917_add_userStamps_to_cms_managements_table', 1),
(135, '2021_01_19_094932_add_userStamps_to_cms_management_trans_table', 1),
(136, '2021_02_15_143320_create_agent_socials_table', 1),
(137, '2021_02_15_143421_add_userStamps_to_agent_socials_table', 1),
(138, '2021_02_16_112322_change_category_id_in_blogs_table', 1),
(139, '2021_02_16_112322_change_category_id_in_informations_table', 1),
(140, '2021_03_09_140659_add_type_to_contact_us_table', 1),
(141, '2021_03_10_150603_add_is_readed_to_contact_us_table', 1),
(142, '2021_03_14_143050_add_description_to_main_slider_trans_table', 1),
(143, '2021_03_17_092535_create_how_works_table', 1),
(144, '2021_03_17_092551_create_how_work_trans_table', 1),
(145, '2021_03_17_092620_add_userStamps_to_how_works_table', 1),
(146, '2021_03_17_092632_add_userStamps_to_how_work_trans_table', 1),
(147, '2021_04_05_094731_create_settings_table', 1),
(148, '2021_04_05_105730_add_setting_userStamps_to_settings_table', 1),
(149, '2021_04_05_123618_add_meta_to_location_trans_table', 1),
(150, '2021_04_06_135340_add_thank_message_to_settings_table', 1),
(151, '2021_04_07_131646_add_auto_reply_message_to_settings_table', 1),
(152, '2021_04_08_123331_add_in_discover_by_to_locations_table', 1),
(153, '2021_04_11_125412_change_message_of_contact_us_table', 1),
(154, '2021_05_18_125152_add_image_to_about_table', 1),
(155, '2021_06_06_145010_add_alt_to_attachmentables_table', 1),
(156, '2021_06_16_132117_add_second_title_to_location_trans_table', 1),
(157, '2021_07_11_184327_create_office_services_table', 1),
(158, '2021_07_11_184343_add_user_stamps_to_office_services_table', 1),
(159, '2021_07_11_184429_add_is_active_to_services_table', 1),
(160, '2021_07_23_125401_change_phone_to_contact_us_table', 1),
(161, '2021_07_24_123256_change_username_of_users_table', 1),
(162, '2021_07_24_151306_change_phone_of_users_table', 1),
(163, '2021_07_30_095128_add_user_type_users_table', 1),
(164, '2021_07_30_124338_create_service_categories_table', 1),
(165, '2021_07_30_124353_create_service_category_trans_table', 1),
(166, '2021_07_30_124424_add_userStamps_to_service_categories_table', 1),
(167, '2021_07_30_124435_add_userStamps_to_service_category_trans_table', 1),
(168, '2021_07_30_170032_add_is_featured_to_service_categories_table', 1),
(169, '2021_07_30_174312_add_service_category_id_to_services_table', 1),
(170, '2021_08_04_132127_add_new_column_to_careers_table', 1),
(171, '2021_08_04_143408_drop_old_column_to_careers_table', 1),
(172, '2021_12_17_082751_add_button_text_to_main_sliders_table', 1),
(173, '2021_12_17_090706_change_fileds_in_settings_table', 1),
(174, '2021_12_17_130651_change_top_agents_user_id_table', 1),
(175, '2022_01_01_110329_add_new_filed_to_users_table', 1),
(176, '2022_01_17_163006_add_icon_image_to_service_categories_table', 1),
(177, '2022_02_16_043106_add_job_title_to_users_table', 1),
(178, '2022_02_18_093317_add_working_type_to_users_table', 1),
(179, '2022_02_26_161111_add_phone_number_to_contact_us_table', 1),
(180, '2022_03_26_100644_add_new_field_to_office_services_table', 1),
(181, '2022_04_23_081357_add_service_category_id_to_office_services_table', 1),
(182, '2022_07_10_131826_add_image_field_to_information_table', 1),
(183, '2022_07_12_090106_create_products_table', 1),
(184, '2022_07_12_090125_add_userstamps_to_products_table', 1),
(185, '2022_07_12_090954_create_product_categories_table', 1),
(186, '2022_07_12_091019_add_userstamps_to_product_categories_table', 1),
(187, '2022_07_14_111217_add_image_to_blogs_table', 1),
(188, '2022_07_14_115428_make_slug_to_blogs_table', 1),
(189, '2022_07_14_133208_add_other_fields_cms_managements_table', 1),
(190, '2022_07_15_090308_add_description_to_information_trans_table', 1),
(191, '2022_07_15_094541_change_slug_to_informations_table', 1),
(192, '2022_07_16_115426_add_awards_new_fields_to_awards_table', 1),
(193, '2022_07_16_143953_add_magazine_new_fields_to_cms_managements_table', 1),
(194, '2022_07_16_165922_add_image_to_services_table', 1),
(195, '2022_07_16_202946_add_link_to_cms_managements_table', 1),
(196, '2022_07_17_195955_add_new_fileds_to_branches_table', 1),
(197, '2022_07_17_204738_add_map_to_settings_table', 1),
(198, '2022_07_22_151857_add_new_fields_to_subscribes_table', 1),
(199, '2022_07_23_071238_add_new_fields_to_informations_table', 1),
(200, '2022_07_23_092834_add_new_fields_to_information_categories_table', 1),
(201, '2022_07_23_101136_add_new_sub_category_id_to_informations_table', 1),
(202, '2022_07_29_095945_add_email_to_branches_table', 1),
(203, '2022_12_03_085659_create_brands_table', 1),
(204, '2022_12_03_085715_add_userStamps_to_brands_table', 1),
(205, '2022_12_03_085734_create_brand_product_table', 1),
(206, '2022_12_03_165006_add_new_column_to_products_table', 1),
(207, '2022_12_07_193813_add_new_fields_to_ads_table', 1),
(208, '2023_02_27_184941_create_product_specifications_table', 1),
(209, '2023_02_27_184945_add_userStamps_to_product_specifications_table', 1),
(210, '2023_03_03_143741_add_image_to_product_categories_table', 1),
(211, '2023_03_03_154624_add_price_to_products_table', 1),
(212, '2023_03_03_174441_add_translation_to_main_sliders_table', 1),
(213, '2023_03_03_175146_add_change_link_to_main_sliders_table', 1),
(214, '2023_03_03_182846_add_new_arrival_table', 1),
(215, '2023_03_03_191710_add_banner_to_product_categories_table', 1),
(216, '2023_03_05_072420_add_category_id_to_brands_table', 2);

-- --------------------------------------------------------

--
-- Table structure for table `modules`
--

CREATE TABLE `modules` (
  `id` int UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `modules`
--

INSERT INTO `modules` (`id`, `name`, `description`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Blog Module', 'Blog Module', NULL, NULL, NULL),
(2, 'Services Module', 'Services Module', NULL, NULL, NULL),
(3, 'Socials Module', 'Socials Module', NULL, NULL, NULL),
(4, 'Settings Module', 'Settings Module', NULL, NULL, NULL),
(5, 'ContactUS Module', 'ContactUS Module', NULL, NULL, NULL),
(6, 'Attachments Module', 'Attachments Module', NULL, NULL, NULL),
(7, 'Locations Module', 'Locations Module', NULL, NULL, NULL),
(8, 'Seo Module', 'Seo Module', NULL, NULL, NULL),
(9, 'CMS Module', 'CMS Module', NULL, NULL, NULL),
(10, 'Products Module', 'Products Module', NULL, NULL, NULL),
(11, 'Ads Module', 'Ads Module', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `notifiable_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `notifiable_id` bigint UNSIGNED NOT NULL,
  `data` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `read_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `oauth_access_tokens`
--

CREATE TABLE `oauth_access_tokens` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint UNSIGNED DEFAULT NULL,
  `client_id` bigint UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `scopes` text COLLATE utf8mb4_unicode_ci,
  `revoked` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `oauth_auth_codes`
--

CREATE TABLE `oauth_auth_codes` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `client_id` bigint UNSIGNED NOT NULL,
  `scopes` text COLLATE utf8mb4_unicode_ci,
  `revoked` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `oauth_clients`
--

CREATE TABLE `oauth_clients` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED DEFAULT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `secret` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `provider` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `redirect` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `personal_access_client` tinyint(1) NOT NULL,
  `password_client` tinyint(1) NOT NULL,
  `revoked` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `oauth_personal_access_clients`
--

CREATE TABLE `oauth_personal_access_clients` (
  `id` bigint UNSIGNED NOT NULL,
  `client_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `oauth_refresh_tokens`
--

CREATE TABLE `oauth_refresh_tokens` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `access_token_id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `revoked` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `office_services`
--

CREATE TABLE `office_services` (
  `id` bigint UNSIGNED NOT NULL,
  `service_id` bigint NOT NULL,
  `office_id` int NOT NULL,
  `price` double(8,2) DEFAULT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `created_by` bigint UNSIGNED DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `updated_by` bigint UNSIGNED DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `deleted_by` bigint UNSIGNED DEFAULT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `offer_price` double(10,2) DEFAULT NULL,
  `number_of_free_modification` int DEFAULT NULL,
  `offer_date` date DEFAULT NULL,
  `offer_duration` double(8,2) DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `terms` mediumtext COLLATE utf8mb4_unicode_ci,
  `services_category_id` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `packages`
--

CREATE TABLE `packages` (
  `id` int UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `package_modules`
--

CREATE TABLE `package_modules` (
  `package_id` int UNSIGNED NOT NULL,
  `module_id` int UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` int UNSIGNED NOT NULL,
  `parent_id` int UNSIGNED DEFAULT NULL,
  `module_id` int UNSIGNED DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_hidden` tinyint NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `parent_id`, `module_id`, `name`, `slug`, `is_hidden`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, NULL, NULL, 'Manage Groups', 'manage-groups', 0, '2023-03-05 04:47:03', NULL, NULL),
(2, 1, NULL, 'Index Groups', 'index-groups', 0, '2023-03-05 04:47:03', NULL, NULL),
(3, 1, NULL, 'Create Group', 'create-group', 0, '2023-03-05 04:47:03', NULL, NULL),
(4, 1, NULL, 'View Group', 'view-group', 0, '2023-03-05 04:47:03', NULL, NULL),
(5, 1, NULL, 'Update Group', 'update-group', 0, '2023-03-05 04:47:03', NULL, NULL),
(6, 1, NULL, 'Delete Group', 'delete-group', 0, '2023-03-05 04:47:03', NULL, NULL),
(7, 1, NULL, 'Update Group Permissions', 'update-group-permissions', 0, '2023-03-05 04:47:03', NULL, NULL),
(8, NULL, NULL, 'Manage Users', 'manage-users', 0, '2023-03-05 04:47:03', NULL, NULL),
(9, 8, NULL, 'Index Users', 'index-users', 0, '2023-03-05 04:47:03', NULL, NULL),
(10, 8, NULL, 'Create User', 'create-user', 0, '2023-03-05 04:47:03', NULL, NULL),
(11, 8, NULL, 'View User', 'view-user', 0, '2023-03-05 04:47:03', NULL, NULL),
(12, 8, NULL, 'Update User', 'update-user', 0, '2023-03-05 04:47:03', NULL, NULL),
(13, 8, NULL, 'Delete User', 'delete-user', 0, '2023-03-05 04:47:03', NULL, NULL),
(15, 8, NULL, 'Update User Permissions', 'update-user-permissions', 0, '2023-03-05 04:47:03', NULL, NULL),
(16, 8, NULL, 'Suspend User', 'suspend-user', 0, '2023-03-05 04:47:03', NULL, NULL),
(303, NULL, 1, 'Manage Blog Blogs', 'manage-blogs', 0, '2023-03-05 04:47:03', NULL, NULL),
(304, 303, 1, 'Index Blogs', 'index-blogs', 0, '2023-03-05 04:47:03', NULL, NULL),
(305, 303, 1, 'Create Blog', 'create-blog', 0, '2023-03-05 04:47:03', NULL, NULL),
(306, 303, 1, 'Update Blog', 'update-blog', 0, '2023-03-05 04:47:03', NULL, NULL),
(307, 303, 1, 'Delete Blog', 'delete-blog', 0, '2023-03-05 04:47:03', NULL, NULL),
(308, NULL, 11, 'Manage Ads', 'manage-ads', 0, '2023-03-05 04:47:04', NULL, NULL),
(309, 308, 11, 'Index Ads', 'index-ads', 0, '2023-03-05 04:47:04', NULL, NULL),
(310, 308, 11, 'Create ad', 'create-ad', 0, '2023-03-05 04:47:04', NULL, NULL),
(311, 308, 11, 'Update ad', 'update-ad', 0, '2023-03-05 04:47:04', NULL, NULL),
(312, 308, 11, 'Delete ad', 'delete-ad', 0, '2023-03-05 04:47:04', NULL, NULL),
(313, NULL, 5, 'Manage Contact US Messages', 'manage-contact-us', 0, '2023-03-05 04:47:03', NULL, NULL),
(314, 313, 5, 'Index Contact US Messages', 'index-contact-us', 0, '2023-03-05 04:47:03', NULL, NULL),
(315, 313, 5, 'Create Contact Us Message', 'create-contact-us', 0, '2023-03-05 04:47:03', NULL, NULL),
(316, 313, 5, 'Update Contact Us Message', 'update-contact-us', 0, '2023-03-05 04:47:03', NULL, NULL),
(317, 313, 5, 'Delete Contact Us Message', 'delete-contact-us', 0, '2023-03-05 04:47:03', NULL, NULL),
(328, NULL, 3, 'Manage socials', 'manage-socials', 0, '2023-03-05 04:47:03', NULL, NULL),
(329, 328, 3, 'Index socials', 'index-socials', 0, '2023-03-05 04:47:03', NULL, NULL),
(330, 328, 3, 'Create social', 'create-social', 0, '2023-03-05 04:47:03', NULL, NULL),
(331, 328, 3, 'Update social', 'update-social', 0, '2023-03-05 04:47:03', NULL, NULL),
(332, 328, 3, 'Delete social', 'delete-social', 0, '2023-03-05 04:47:03', NULL, NULL),
(343, NULL, 4, 'Manage Settings Footer Links', 'manage-settings-footer-links', 0, '2023-03-05 04:47:03', NULL, NULL),
(344, 343, 4, 'Index Footer Links', 'index-settings-footer-links', 0, '2023-03-05 04:47:03', NULL, NULL),
(345, 343, 4, 'Create Footer Link', 'create-settings-footer-link', 0, '2023-03-05 04:47:03', NULL, NULL),
(346, 343, 4, 'Update Footer Link', 'update-settings-footer-link', 0, '2023-03-05 04:47:03', NULL, NULL),
(347, 343, 4, 'Delete Footer Link', 'delete-settings-footer-link', 0, '2023-03-05 04:47:03', NULL, NULL),
(348, NULL, 4, 'Manage Settings Logos', 'manage-settings-logos', 0, '2023-03-05 04:47:03', NULL, NULL),
(349, 348, 4, 'Index Settings Logos', 'index-settings-logos', 0, '2023-03-05 04:47:03', NULL, NULL),
(350, 348, 4, 'Create Settings Logo', 'create-settings-logo', 0, '2023-03-05 04:47:03', NULL, NULL),
(351, 348, 4, 'Update Settings Logo', 'update-settings-logo', 0, '2023-03-05 04:47:03', NULL, NULL),
(352, 348, 4, 'Delete Settings Logo', 'delete-settings-logo', 0, '2023-03-05 04:47:03', NULL, NULL),
(353, NULL, 4, 'Manage Settings Contacts', 'manage-settings-contacts', 0, '2023-03-05 04:47:03', NULL, NULL),
(354, 353, 4, 'Index Settings Contacts', 'index-settings-contacts', 0, '2023-03-05 04:47:03', NULL, NULL),
(355, 353, 4, 'Create Settings Contact', 'create-settings-contact', 0, '2023-03-05 04:47:03', NULL, NULL),
(356, 353, 4, 'Update Settings Contact', 'update-settings-contact', 0, '2023-03-05 04:47:03', NULL, NULL),
(357, 353, 4, 'Delete Settings Contact', 'delete-settings-contact', 0, '2023-03-05 04:47:03', NULL, NULL),
(358, NULL, 4, 'Manage Settings Main Sliders', 'manage-settings-main-sliders', 0, '2023-03-05 04:47:03', NULL, NULL),
(359, 358, 4, 'Index Settings Main Sliders', 'index-settings-main-sliders', 0, '2023-03-05 04:47:03', NULL, NULL),
(360, 358, 4, 'Create Settings Main Slider', 'create-settings-main-slider', 0, '2023-03-05 04:47:03', NULL, NULL),
(361, 358, 4, 'Update Settings Main Slider', 'update-settings-main-slider', 0, '2023-03-05 04:47:03', NULL, NULL),
(362, 358, 4, 'Delete Settings Main Slider', 'delete-settings-main-slider', 0, '2023-03-05 04:47:03', NULL, NULL),
(363, NULL, 7, 'Manage locations', 'manage-locations', 0, '2023-03-05 04:47:04', NULL, NULL),
(364, 363, 7, 'Index locations', 'index-locations', 0, '2023-03-05 04:47:04', NULL, NULL),
(365, 363, 7, 'Create location', 'create-location', 0, '2023-03-05 04:47:04', NULL, NULL),
(366, 363, 7, 'Update location', 'update-location', 0, '2023-03-05 04:47:04', NULL, NULL),
(367, 363, 7, 'Delete location', 'delete-location', 0, '2023-03-05 04:47:04', NULL, NULL),
(373, NULL, 1, 'Manage Blog Categories', 'manage-blog-categories', 0, '2023-03-05 04:47:03', NULL, NULL),
(374, 373, 1, 'Index Blog Categories', 'index-blog-categories', 0, '2023-03-05 04:47:03', NULL, NULL),
(375, 373, 1, 'Create Blog Category', 'create-blog-category', 0, '2023-03-05 04:47:03', NULL, NULL),
(376, 373, 1, 'Update Blog Category', 'update-blog-category', 0, '2023-03-05 04:47:03', NULL, NULL),
(377, 373, 1, 'Delete Blog Category', 'delete-blog-category', 0, '2023-03-05 04:47:03', NULL, NULL),
(383, NULL, 2, 'Manage Services', 'manage-services', 0, '2023-03-05 04:47:03', NULL, NULL),
(384, 383, 2, 'Index Services', 'index-services', 0, '2023-03-05 04:47:03', NULL, NULL),
(385, 383, 2, 'Create Service', 'create-service', 0, '2023-03-05 04:47:03', NULL, NULL),
(386, 383, 2, 'Update Service', 'update-service', 0, '2023-03-05 04:47:03', NULL, NULL),
(387, 383, 2, 'Delete Service', 'delete-service', 0, '2023-03-05 04:47:03', NULL, NULL),
(393, NULL, 4, 'Manage Settings Teems', 'manage-settings-teems', 0, '2023-03-05 04:47:03', NULL, NULL),
(394, 393, 4, 'Index Settings Teems', 'index-settings-teems', 0, '2023-03-05 04:47:03', NULL, NULL),
(395, 393, 4, 'Create Settings Teem', 'create-settings-teem', 0, '2023-03-05 04:47:03', NULL, NULL),
(396, 393, 4, 'Update Settings Teem', 'update-settings-teem', 0, '2023-03-05 04:47:03', NULL, NULL),
(397, 393, 4, 'Delete Settings Teem', 'delete-settings-teem', 0, '2023-03-05 04:47:03', NULL, NULL),
(398, NULL, 5, 'Manage Subscribe Mails', 'manage-subscribe-mails', 0, '2023-03-05 04:47:03', NULL, NULL),
(399, 398, 5, 'Index Subscribe mails', 'index-subscribe-mails', 0, '2023-03-05 04:47:03', NULL, NULL),
(400, 398, 5, 'Create Subscribe mail', 'create-subscribe-mail', 0, '2023-03-05 04:47:03', NULL, NULL),
(401, 398, 5, 'Update Subscribe mail', 'update-subscribe-mail', 0, '2023-03-05 04:47:03', NULL, NULL),
(402, 398, 5, 'Delete Subscribe mail', 'delete-subscribe-mail', 0, '2023-03-05 04:47:03', NULL, NULL),
(403, NULL, 4, 'Manage Settings Branches', 'manage-settings-branches', 0, '2023-03-05 04:47:03', NULL, NULL),
(404, 403, 4, 'Index Settings Branches', 'index-settings-branches', 0, '2023-03-05 04:47:03', NULL, NULL),
(405, 403, 4, 'Create Settings Branch', 'create-settings-branch', 0, '2023-03-05 04:47:03', NULL, NULL),
(406, 403, 4, 'Update Settings Branch', 'update-settings-branch', 0, '2023-03-05 04:47:03', NULL, NULL),
(407, 403, 4, 'Delete Settings Branch', 'delete-settings-branch', 0, '2023-03-05 04:47:03', NULL, NULL),
(408, 313, 5, 'Export Contact Us Messages', 'export-contact-us-messages', 0, '2023-03-05 04:47:03', NULL, NULL),
(546, NULL, 4, 'Manage Settings How Works', 'manage-settings-how-works', 0, '2023-03-05 04:47:03', NULL, NULL),
(547, 546, 4, 'Index Settings How Works', 'index-settings-how-works', 0, '2023-03-05 04:47:03', NULL, NULL),
(548, 546, 4, 'Create Settings How Work', 'create-settings-how-work', 0, '2023-03-05 04:47:03', NULL, NULL),
(549, 546, 4, 'Update Settings How Work', 'update-settings-how-work', 0, '2023-03-05 04:47:03', NULL, NULL),
(550, 546, 4, 'Delete Settings How Work', 'delete-settings-how-work', 0, '2023-03-05 04:47:03', NULL, NULL),
(586, NULL, 8, 'Manage Seo', 'manage-seo', 0, '2023-03-05 04:47:04', NULL, NULL),
(587, 586, 8, 'Index Seo', 'index-seo', 0, '2023-03-05 04:47:04', NULL, NULL),
(588, 586, 8, 'Create Seo', 'create-seo', 0, '2023-03-05 04:47:04', NULL, NULL),
(589, 586, 8, 'Update Seo', 'update-seo', 0, '2023-03-05 04:47:04', NULL, NULL),
(590, 586, 8, 'Delete Seo', 'delete-seo', 0, '2023-03-05 04:47:04', NULL, NULL),
(591, NULL, 2, 'Manage Office Services', 'manage-office-services', 0, '2023-03-05 04:47:03', NULL, NULL),
(592, 591, 2, 'Index Office Services', 'index-office-services', 0, '2023-03-05 04:47:03', NULL, NULL),
(593, 591, 2, 'Create Office Service', 'create-office-service', 0, '2023-03-05 04:47:03', NULL, NULL),
(594, 591, 2, 'Update Office Service', 'update-office-service', 0, '2023-03-05 04:47:03', NULL, NULL),
(595, 591, 2, 'Delete Office Service', 'delete-office-service', 0, '2023-03-05 04:47:03', NULL, NULL),
(596, NULL, 2, 'Manage Service Categories', 'manage-service-categories', 0, '2023-03-05 04:47:03', NULL, NULL),
(597, 596, 2, 'Index Service Categories', 'index-service-categories', 0, '2023-03-05 04:47:03', NULL, NULL),
(598, 596, 2, 'Create Service Category', 'create-service-category', 0, '2023-03-05 04:47:03', NULL, NULL),
(599, 596, 2, 'Update Service Category', 'update-service-category', 0, '2023-03-05 04:47:03', NULL, NULL),
(600, 596, 2, 'Delete Service Category', 'delete-service-category', 0, '2023-03-05 04:47:03', NULL, NULL),
(611, NULL, 10, 'Manage Products Products', 'manage-products', 0, '2023-03-05 04:47:04', NULL, NULL),
(612, 611, 10, 'Index Products', 'index-products', 0, '2023-03-05 04:47:04', NULL, NULL),
(613, 611, 10, 'Create Product', 'create-product', 0, '2023-03-05 04:47:04', NULL, NULL),
(614, 611, 10, 'Update Product', 'update-product', 0, '2023-03-05 04:47:04', NULL, NULL),
(615, 611, 10, 'Delete Product', 'delete-product', 0, '2023-03-05 04:47:04', NULL, NULL),
(616, NULL, 10, 'Manage Products Categories', 'manage-products-categories', 0, '2023-03-05 04:47:04', NULL, NULL),
(617, 616, 10, 'Index Products Categories', 'index-products-categories', 0, '2023-03-05 04:47:04', NULL, NULL),
(618, 616, 10, 'Create Products Category', 'create-products-category', 0, '2023-03-05 04:47:04', NULL, NULL),
(619, 616, 10, 'Update Products Category', 'update-products-category', 0, '2023-03-05 04:47:04', NULL, NULL),
(620, 616, 10, 'Delete Products Category', 'delete-products-category', 0, '2023-03-05 04:47:04', NULL, NULL),
(621, NULL, 10, 'Manage Products Sizes', 'manage-products-sizes', 0, '2023-03-05 04:47:04', NULL, NULL),
(622, 621, 10, 'Index Products Sizes', 'index-products-sizes', 0, '2023-03-05 04:47:04', NULL, NULL),
(623, 621, 10, 'Create Products size', 'create-products-size', 0, '2023-03-05 04:47:04', NULL, NULL),
(624, 621, 10, 'Update Products size', 'update-products-size', 0, '2023-03-05 04:47:04', NULL, NULL),
(625, 621, 10, 'Delete Products size', 'delete-products-size', 0, '2023-03-05 04:47:04', NULL, NULL),
(626, NULL, 10, 'Manage Products Models', 'manage-products-models', 0, '2023-03-05 04:47:04', NULL, NULL),
(627, 626, 10, 'Index Products Models', 'index-products-models', 0, '2023-03-05 04:47:04', NULL, NULL),
(628, 626, 10, 'Create Products model', 'create-products-model', 0, '2023-03-05 04:47:04', NULL, NULL),
(629, 626, 10, 'Update Products model', 'update-products-model', 0, '2023-03-05 04:47:04', NULL, NULL),
(630, 626, 10, 'Delete Products model', 'delete-products-model', 0, '2023-03-05 04:47:04', NULL, NULL),
(631, NULL, 10, 'Manage Products marks', 'manage-products-marks', 0, '2023-03-05 04:47:04', NULL, NULL),
(632, 631, 10, 'Index Products marks', 'index-products-marks', 0, '2023-03-05 04:47:04', NULL, NULL),
(633, 631, 10, 'Create Products mark', 'create-products-mark', 0, '2023-03-05 04:47:04', NULL, NULL),
(634, 631, 10, 'Update Products mark', 'update-products-mark', 0, '2023-03-05 04:47:04', NULL, NULL),
(635, 631, 10, 'Delete Products mark', 'delete-products-mark', 0, '2023-03-05 04:47:04', NULL, NULL),
(656, NULL, 9, 'Manage socials content', 'manage-socials-content', 0, '2023-03-05 04:47:04', NULL, NULL),
(657, 656, 9, 'Index socials content', 'index-socials-content', 0, '2023-03-05 04:47:04', NULL, NULL),
(658, 656, 9, 'Create social content', 'create-social-content', 0, '2023-03-05 04:47:04', NULL, NULL),
(659, 656, 9, 'Update social content', 'update-social-content', 0, '2023-03-05 04:47:04', NULL, NULL),
(660, 656, 9, 'Delete social content', 'delete-social-content', 0, '2023-03-05 04:47:04', NULL, NULL),
(661, NULL, 10, 'Manage Products brands', 'manage-products-brands', 0, '2023-03-05 04:47:04', NULL, NULL),
(662, 661, 10, 'Index Products brands', 'index-products-brands', 0, '2023-03-05 04:47:04', NULL, NULL),
(663, 661, 10, 'Create Products brand', 'create-products-brand', 0, '2023-03-05 04:47:04', NULL, NULL),
(664, 661, 10, 'Update Products brand', 'update-products-brand', 0, '2023-03-05 04:47:04', NULL, NULL),
(665, 661, 10, 'Delete Products brand', 'delete-products-brand', 0, '2023-03-05 04:47:04', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint UNSIGNED NOT NULL,
  `tokenable_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint UNSIGNED NOT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name_en` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name_ar` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description_en` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description_ar` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` mediumtext COLLATE utf8mb4_unicode_ci,
  `feature` mediumtext COLLATE utf8mb4_unicode_ci,
  `logo` mediumtext COLLATE utf8mb4_unicode_ci,
  `is_featured` tinyint(1) NOT NULL DEFAULT '0',
  `category_id` bigint UNSIGNED DEFAULT NULL,
  `brand_id` bigint UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `created_by` bigint UNSIGNED DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `updated_by` bigint UNSIGNED DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `deleted_by` bigint UNSIGNED DEFAULT NULL,
  `is_brand_featured` tinyint(1) NOT NULL DEFAULT '0',
  `price` double(10,2) DEFAULT NULL,
  `offer` double(10,2) DEFAULT NULL,
  `new_arrival` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `slug`, `name_en`, `name_ar`, `description_en`, `description_ar`, `image`, `feature`, `logo`, `is_featured`, `category_id`, `brand_id`, `created_at`, `created_by`, `updated_at`, `updated_by`, `deleted_at`, `deleted_by`, `is_brand_featured`, `price`, `offer`, `new_arrival`) VALUES
(1, NULL, 'STARVIE KRAKEN RACKET', 'STARVIE KRAKEN RACKET', 'PADEL RACKETS - STAR LINE\r\nThe Kraken model stands out from the rest of the padel rackets in the collection for its 26 mm thick mould.\r\n\r\nAimed at padel professionals with a good technical le', 'مضارب البادل - خط النجوم\r\nيبرز نموذج Kraken عن باقي مضارب الباديل في المجموعة لقالبه الذي يبلغ سمكه 26 مم.\r\n\r\nتستهدف محترفي Padel بمستوى تقني جيد. يوفر هذا المضرب قدرة كبيرة على المناورة عند ', 'Products/usEt6HGmwKxUcDCwrJFPCF5RgS9sghYj8w44rdhf.webp', NULL, NULL, 1, 5, 1, '2023-03-05 08:30:24', 1, '2023-03-05 08:30:24', 1, NULL, NULL, 1, 1200.00, 650.00, 1);

-- --------------------------------------------------------

--
-- Table structure for table `product_categories`
--

CREATE TABLE `product_categories` (
  `id` bigint UNSIGNED NOT NULL,
  `name_en` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name_ar` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `created_by` bigint UNSIGNED DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `updated_by` bigint UNSIGNED DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `deleted_by` bigint UNSIGNED DEFAULT NULL,
  `image` mediumtext COLLATE utf8mb4_unicode_ci,
  `banner` mediumtext COLLATE utf8mb4_unicode_ci,
  `featured_products` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_categories`
--

INSERT INTO `product_categories` (`id`, `name_en`, `name_ar`, `created_at`, `created_by`, `updated_at`, `updated_by`, `deleted_at`, `deleted_by`, `image`, `banner`, `featured_products`) VALUES
(1, 'Aileen Neal', 'Selma Morris', '2023-03-05 05:04:06', 1, '2023-03-05 05:15:50', 1, '2023-03-05 05:15:50', 1, 'Products/64gEz9ObhWkRGRMAJoco4rR7BKNEnyW99t8c2ExI.png', 'Products/LL7x8RD7u0TZiQLmbI19mBSLxbjOWo0JmHmkSm3D.png', 0),
(2, 'shoes', 'أحذية رياضية', '2023-03-05 05:18:35', 1, '2023-03-05 05:18:35', 1, NULL, NULL, 'Products/ZN1tkfdpYkhpMEmpxWCP32SpBozS3hhf0nSlhSHm.webp', 'Products/PHQmjgH7NiOTqyegRxfcadVIqojlPtp86NHzYWY1.webp', 1),
(3, 'Clothing', 'ملابس رياضية', '2023-03-05 05:19:11', 1, '2023-03-05 05:19:11', 1, NULL, NULL, 'Products/qL9U13FGtkLQW4FVQ5l8C7dZvEDXhd2YPpab2KzW.webp', 'Products/HRzdGzUYN2JkmHGiSx3FmxUc1tf64HrXgUFDPFvO.webp', 1),
(4, 'Bags', 'حقائب رياضية', '2023-03-05 05:19:56', 1, '2023-03-05 05:19:56', 1, NULL, NULL, 'Products/CB8GnTWFGs7ED6wSpr5YNNzWebsGWFC4hJgrlEwT.webp', 'Products/Dbc5uq79oKsd5n1N6g1L1K52HeW0H7DEiKYYayEJ.webp', 1),
(5, 'Rackets', 'مضارب تنس', '2023-03-05 05:21:35', 1, '2023-03-05 05:21:35', 1, NULL, NULL, 'Products/9QT2rpZbwoh2Y0bVq8fXn74U2mKyI0xRlV4gcEup.webp', 'Products/iEyM5R5KQ7JXAt6mUE5YK3bFS1HP3Hnr8TIwhv15.webp', 1);

-- --------------------------------------------------------

--
-- Table structure for table `product_specifications`
--

CREATE TABLE `product_specifications` (
  `id` bigint UNSIGNED NOT NULL,
  `product_id` bigint UNSIGNED NOT NULL,
  `key_en` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `key_ar` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `value_en` text COLLATE utf8mb4_unicode_ci,
  `value_ar` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `created_by` bigint UNSIGNED DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `updated_by` bigint UNSIGNED DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `deleted_by` bigint UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_specifications`
--

INSERT INTO `product_specifications` (`id`, `product_id`, `key_en`, `key_ar`, `value_en`, `value_ar`, `created_at`, `created_by`, `updated_at`, `updated_by`, `deleted_at`, `deleted_by`) VALUES
(1, 1, 'Ut voluptates aliqua', 'Cillum eos labore un', 'Reprehenderit dolor', 'Dicta labore ipsum r', '2023-03-05 08:30:24', 1, '2023-03-05 08:30:24', 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `ratings`
--

CREATE TABLE `ratings` (
  `id` bigint UNSIGNED NOT NULL,
  `rate` int NOT NULL,
  `rateable_type` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `rateable_id` bigint UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `created_by` bigint UNSIGNED DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `updated_by` bigint UNSIGNED DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `deleted_by` bigint UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `seo`
--

CREATE TABLE `seo` (
  `id` int UNSIGNED NOT NULL,
  `show_short_description` tinyint(1) NOT NULL DEFAULT '0',
  `page` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `created_by` bigint UNSIGNED DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `updated_by` bigint UNSIGNED DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `deleted_by` bigint UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `seo_trans`
--

CREATE TABLE `seo_trans` (
  `seo_id` int UNSIGNED NOT NULL,
  `language_id` int UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `key_words` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` mediumtext COLLATE utf8mb4_unicode_ci,
  `short_description` mediumtext COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `created_by` bigint UNSIGNED DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `updated_by` bigint UNSIGNED DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `deleted_by` bigint UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE `services` (
  `id` int UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `created_by` bigint UNSIGNED DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `updated_by` bigint UNSIGNED DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `deleted_by` bigint UNSIGNED DEFAULT NULL,
  `is_featured` tinyint(1) NOT NULL DEFAULT '0',
  `is_active` tinyint(1) NOT NULL DEFAULT '0',
  `service_category_id` bigint DEFAULT NULL,
  `image` text COLLATE utf8mb4_unicode_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `service_categories`
--

CREATE TABLE `service_categories` (
  `id` int UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `created_by` bigint UNSIGNED DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `updated_by` bigint UNSIGNED DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `deleted_by` bigint UNSIGNED DEFAULT NULL,
  `is_featured` tinyint(1) NOT NULL DEFAULT '0',
  `icon` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `service_category_trans`
--

CREATE TABLE `service_category_trans` (
  `service_category_id` int UNSIGNED NOT NULL,
  `language_id` int UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `meta_title` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `meta_description` mediumtext COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `created_by` bigint UNSIGNED DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `updated_by` bigint UNSIGNED DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `deleted_by` bigint UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `service_trans`
--

CREATE TABLE `service_trans` (
  `service_id` int UNSIGNED NOT NULL,
  `language_id` int UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `meta_title` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `meta_description` mediumtext COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `created_by` bigint UNSIGNED DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `updated_by` bigint UNSIGNED DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `deleted_by` bigint UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` bigint UNSIGNED NOT NULL,
  `tags_manager` mediumtext COLLATE utf8mb4_unicode_ci,
  `pixel_code` mediumtext COLLATE utf8mb4_unicode_ci,
  `enable_ar` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `created_by` bigint UNSIGNED DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `updated_by` bigint UNSIGNED DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `deleted_by` bigint UNSIGNED DEFAULT NULL,
  `our_mission_en` mediumtext COLLATE utf8mb4_unicode_ci,
  `our_mission_ar` mediumtext COLLATE utf8mb4_unicode_ci,
  `our_vision_en` mediumtext COLLATE utf8mb4_unicode_ci,
  `our_vision_ar` mediumtext COLLATE utf8mb4_unicode_ci,
  `our_value_en` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `our_value_ar` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `map` text COLLATE utf8mb4_unicode_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `tags_manager`, `pixel_code`, `enable_ar`, `created_at`, `created_by`, `updated_at`, `updated_by`, `deleted_at`, `deleted_by`, `our_mission_en`, `our_mission_ar`, `our_vision_en`, `our_vision_ar`, `our_value_en`, `our_value_ar`, `map`) VALUES
(1, NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `socials`
--

CREATE TABLE `socials` (
  `id` bigint UNSIGNED NOT NULL,
  `link` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `icon` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_featured` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `created_by` bigint UNSIGNED DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `updated_by` bigint UNSIGNED DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `deleted_by` bigint UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `socials`
--

INSERT INTO `socials` (`id`, `link`, `icon`, `is_featured`, `created_at`, `created_by`, `updated_at`, `updated_by`, `deleted_at`, `deleted_by`) VALUES
(1, 'https://www.facebook.com/', 'fab fa-facebook-f', 1, NULL, NULL, NULL, NULL, NULL, NULL),
(2, 'https://twitter.com/', 'fab fa-twitter', 1, NULL, NULL, NULL, NULL, NULL, NULL),
(3, 'https://www.instagram.com/', 'fab fa-instagram', 1, NULL, NULL, NULL, NULL, NULL, NULL),
(4, 'https://www.linkedin.com/', 'fab fa-linkedin-in', 1, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `social_trans`
--

CREATE TABLE `social_trans` (
  `id` bigint UNSIGNED NOT NULL,
  `social_id` bigint NOT NULL,
  `language_id` int NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `created_by` bigint UNSIGNED DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `updated_by` bigint UNSIGNED DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `deleted_by` bigint UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `social_trans`
--

INSERT INTO `social_trans` (`id`, `social_id`, `language_id`, `title`, `created_at`, `created_by`, `updated_at`, `updated_by`, `deleted_at`, `deleted_by`) VALUES
(1, 1, 2, 'فيس بوك', NULL, NULL, NULL, NULL, NULL, NULL),
(2, 2, 2, 'تويتر', NULL, NULL, NULL, NULL, NULL, NULL),
(3, 3, 2, 'إنستا', NULL, NULL, NULL, NULL, NULL, NULL),
(4, 4, 2, 'لينكدإن', NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `subscribes`
--

CREATE TABLE `subscribes` (
  `id` bigint UNSIGNED NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `created_by` bigint UNSIGNED DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `updated_by` bigint UNSIGNED DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `deleted_by` bigint UNSIGNED DEFAULT NULL,
  `first_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `division` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `dealer` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `region` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gender` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tagables`
--

CREATE TABLE `tagables` (
  `tag_id` int UNSIGNED NOT NULL,
  `tagable_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tagable_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tags`
--

CREATE TABLE `tags` (
  `id` int UNSIGNED NOT NULL,
  `tag` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `color` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `created_by` bigint UNSIGNED DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `updated_by` bigint UNSIGNED DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `deleted_by` bigint UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `testimonials`
--

CREATE TABLE `testimonials` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_featured` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `created_by` bigint UNSIGNED DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `updated_by` bigint UNSIGNED DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `deleted_by` bigint UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `testimonial_trans`
--

CREATE TABLE `testimonial_trans` (
  `id` bigint UNSIGNED NOT NULL,
  `testimonial_id` bigint NOT NULL,
  `language_id` int NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `created_by` bigint UNSIGNED DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `updated_by` bigint UNSIGNED DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `deleted_by` bigint UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `top_agents`
--

CREATE TABLE `top_agents` (
  `id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `created_by` bigint UNSIGNED DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `updated_by` bigint UNSIGNED DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `deleted_by` bigint UNSIGNED DEFAULT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int UNSIGNED NOT NULL,
  `group_id` int UNSIGNED NOT NULL,
  `full_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `username` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mobile_number` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `parent_id` int DEFAULT NULL,
  `is_suspended` tinyint(1) NOT NULL DEFAULT '0',
  `bio` mediumtext COLLATE utf8mb4_unicode_ci,
  `last_login_at` datetime DEFAULT NULL,
  `last_login_ip` varchar(39) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `connection_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `created_by` bigint UNSIGNED DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `updated_by` bigint UNSIGNED DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `deleted_by` bigint UNSIGNED DEFAULT NULL,
  `timezone` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nick_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `agency_rating` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `representative_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bank_account_number` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tax_number` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `accounting_email` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `job_title` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `work_type` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `group_id`, `full_name`, `image`, `username`, `email`, `email_verified_at`, `password`, `mobile_number`, `parent_id`, `is_suspended`, `bio`, `last_login_at`, `last_login_ip`, `connection_id`, `remember_token`, `created_at`, `created_by`, `updated_at`, `updated_by`, `deleted_at`, `deleted_by`, `timezone`, `type`, `address`, `nick_name`, `agency_rating`, `representative_name`, `bank_account_number`, `tax_number`, `accounting_email`, `job_title`, `work_type`) VALUES
(1, 1, 'Technical Support', 'front/img/placeholder.svg', 'technical_support', 'technical_support@e-commerce.com', NULL, '$2y$10$H2Vof82ZT3GfX/86sDKy0uXImjiEIiM56DEzKEg/W0k/K2pfZrU3e', '01207395400', NULL, 0, NULL, NULL, NULL, NULL, NULL, '2023-03-05 04:47:03', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(2, 2, 'General Manager', 'front/img/placeholder.svg', 'general_manager', 'general_manager@e-commerce.com', NULL, '$2y$10$H2Vof82ZT3GfX/86sDKy0uXImjiEIiM56DEzKEg/W0k/K2pfZrU3e', '000000000000', NULL, 0, NULL, NULL, NULL, NULL, NULL, '2023-03-05 04:47:03', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `user_permissions`
--

CREATE TABLE `user_permissions` (
  `user_id` int UNSIGNED NOT NULL,
  `permission_id` int UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user_permissions`
--

INSERT INTO `user_permissions` (`user_id`, `permission_id`, `created_at`, `updated_at`) VALUES
(1, 1, '2023-03-05 04:47:03', NULL),
(1, 2, '2023-03-05 04:47:03', NULL),
(1, 3, '2023-03-05 04:47:03', NULL),
(1, 4, '2023-03-05 04:47:03', NULL),
(1, 5, '2023-03-05 04:47:03', NULL),
(1, 6, '2023-03-05 04:47:03', NULL),
(1, 7, '2023-03-05 04:47:03', NULL),
(1, 8, '2023-03-05 04:47:03', NULL),
(1, 9, '2023-03-05 04:47:03', NULL),
(1, 10, '2023-03-05 04:47:03', NULL),
(1, 11, '2023-03-05 04:47:03', NULL),
(1, 12, '2023-03-05 04:47:03', NULL),
(1, 13, '2023-03-05 04:47:03', NULL),
(1, 14, '2023-03-05 04:47:03', NULL),
(1, 15, '2023-03-05 04:47:03', NULL),
(1, 16, '2023-03-05 04:47:03', NULL),
(1, 303, '2023-03-05 04:47:03', NULL),
(1, 304, '2023-03-05 04:47:03', NULL),
(1, 305, '2023-03-05 04:47:03', NULL),
(1, 306, '2023-03-05 04:47:03', NULL),
(1, 307, '2023-03-05 04:47:03', NULL),
(1, 308, '2023-03-05 04:47:04', NULL),
(1, 309, '2023-03-05 04:47:04', NULL),
(1, 310, '2023-03-05 04:47:04', NULL),
(1, 311, '2023-03-05 04:47:04', NULL),
(1, 312, '2023-03-05 04:47:04', NULL),
(1, 313, '2023-03-05 04:47:03', NULL),
(1, 314, '2023-03-05 04:47:03', NULL),
(1, 315, '2023-03-05 04:47:03', NULL),
(1, 316, '2023-03-05 04:47:03', NULL),
(1, 317, '2023-03-05 04:47:03', NULL),
(1, 328, '2023-03-05 04:47:03', NULL),
(1, 329, '2023-03-05 04:47:03', NULL),
(1, 330, '2023-03-05 04:47:03', NULL),
(1, 331, '2023-03-05 04:47:03', NULL),
(1, 332, '2023-03-05 04:47:03', NULL),
(1, 343, '2023-03-05 04:47:03', NULL),
(1, 344, '2023-03-05 04:47:03', NULL),
(1, 345, '2023-03-05 04:47:03', NULL),
(1, 346, '2023-03-05 04:47:03', NULL),
(1, 347, '2023-03-05 04:47:03', NULL),
(1, 348, '2023-03-05 04:47:03', NULL),
(1, 349, '2023-03-05 04:47:03', NULL),
(1, 350, '2023-03-05 04:47:03', NULL),
(1, 351, '2023-03-05 04:47:03', NULL),
(1, 352, '2023-03-05 04:47:03', NULL),
(1, 353, '2023-03-05 04:47:03', NULL),
(1, 354, '2023-03-05 04:47:03', NULL),
(1, 355, '2023-03-05 04:47:03', NULL),
(1, 356, '2023-03-05 04:47:03', NULL),
(1, 357, '2023-03-05 04:47:03', NULL),
(1, 358, '2023-03-05 04:47:03', NULL),
(1, 359, '2023-03-05 04:47:03', NULL),
(1, 360, '2023-03-05 04:47:03', NULL),
(1, 361, '2023-03-05 04:47:03', NULL),
(1, 362, '2023-03-05 04:47:03', NULL),
(1, 363, '2023-03-05 04:47:04', NULL),
(1, 364, '2023-03-05 04:47:04', NULL),
(1, 365, '2023-03-05 04:47:04', NULL),
(1, 366, '2023-03-05 04:47:04', NULL),
(1, 367, '2023-03-05 04:47:04', NULL),
(1, 373, '2023-03-05 04:47:03', NULL),
(1, 374, '2023-03-05 04:47:03', NULL),
(1, 375, '2023-03-05 04:47:03', NULL),
(1, 376, '2023-03-05 04:47:03', NULL),
(1, 377, '2023-03-05 04:47:03', NULL),
(1, 383, '2023-03-05 04:47:03', NULL),
(1, 384, '2023-03-05 04:47:03', NULL),
(1, 385, '2023-03-05 04:47:03', NULL),
(1, 386, '2023-03-05 04:47:03', NULL),
(1, 387, '2023-03-05 04:47:03', NULL),
(1, 393, '2023-03-05 04:47:03', NULL),
(1, 394, '2023-03-05 04:47:03', NULL),
(1, 395, '2023-03-05 04:47:03', NULL),
(1, 396, '2023-03-05 04:47:03', NULL),
(1, 397, '2023-03-05 04:47:03', NULL),
(1, 398, '2023-03-05 04:47:03', NULL),
(1, 399, '2023-03-05 04:47:03', NULL),
(1, 400, '2023-03-05 04:47:03', NULL),
(1, 401, '2023-03-05 04:47:03', NULL),
(1, 402, '2023-03-05 04:47:03', NULL),
(1, 403, '2023-03-05 04:47:03', NULL),
(1, 404, '2023-03-05 04:47:03', NULL),
(1, 405, '2023-03-05 04:47:03', NULL),
(1, 406, '2023-03-05 04:47:03', NULL),
(1, 407, '2023-03-05 04:47:03', NULL),
(1, 408, '2023-03-05 04:47:03', NULL),
(1, 546, '2023-03-05 04:47:03', NULL),
(1, 547, '2023-03-05 04:47:03', NULL),
(1, 548, '2023-03-05 04:47:03', NULL),
(1, 549, '2023-03-05 04:47:03', NULL),
(1, 550, '2023-03-05 04:47:03', NULL),
(1, 586, '2023-03-05 04:47:04', NULL),
(1, 587, '2023-03-05 04:47:04', NULL),
(1, 588, '2023-03-05 04:47:04', NULL),
(1, 589, '2023-03-05 04:47:04', NULL),
(1, 590, '2023-03-05 04:47:04', NULL),
(1, 591, '2023-03-05 04:47:03', NULL),
(1, 592, '2023-03-05 04:47:03', NULL),
(1, 593, '2023-03-05 04:47:03', NULL),
(1, 594, '2023-03-05 04:47:03', NULL),
(1, 595, '2023-03-05 04:47:03', NULL),
(1, 596, '2023-03-05 04:47:03', NULL),
(1, 597, '2023-03-05 04:47:03', NULL),
(1, 598, '2023-03-05 04:47:03', NULL),
(1, 599, '2023-03-05 04:47:03', NULL),
(1, 600, '2023-03-05 04:47:03', NULL),
(1, 611, '2023-03-05 04:47:04', NULL),
(1, 612, '2023-03-05 04:47:04', NULL),
(1, 613, '2023-03-05 04:47:04', NULL),
(1, 614, '2023-03-05 04:47:04', NULL),
(1, 615, '2023-03-05 04:47:04', NULL),
(1, 616, '2023-03-05 04:47:04', NULL),
(1, 617, '2023-03-05 04:47:04', NULL),
(1, 618, '2023-03-05 04:47:04', NULL),
(1, 619, '2023-03-05 04:47:04', NULL),
(1, 620, '2023-03-05 04:47:04', NULL),
(1, 621, '2023-03-05 04:47:04', NULL),
(1, 622, '2023-03-05 04:47:04', NULL),
(1, 623, '2023-03-05 04:47:04', NULL),
(1, 624, '2023-03-05 04:47:04', NULL),
(1, 625, '2023-03-05 04:47:04', NULL),
(1, 626, '2023-03-05 04:47:04', NULL),
(1, 627, '2023-03-05 04:47:04', NULL),
(1, 628, '2023-03-05 04:47:04', NULL),
(1, 629, '2023-03-05 04:47:04', NULL),
(1, 630, '2023-03-05 04:47:04', NULL),
(1, 631, '2023-03-05 04:47:04', NULL),
(1, 632, '2023-03-05 04:47:04', NULL),
(1, 633, '2023-03-05 04:47:04', NULL),
(1, 634, '2023-03-05 04:47:04', NULL),
(1, 635, '2023-03-05 04:47:04', NULL),
(1, 656, '2023-03-05 04:47:04', NULL),
(1, 657, '2023-03-05 04:47:04', NULL),
(1, 658, '2023-03-05 04:47:04', NULL),
(1, 659, '2023-03-05 04:47:04', NULL),
(1, 660, '2023-03-05 04:47:04', NULL),
(1, 661, '2023-03-05 04:47:04', NULL),
(1, 662, '2023-03-05 04:47:04', NULL),
(1, 663, '2023-03-05 04:47:04', NULL),
(1, 664, '2023-03-05 04:47:04', NULL),
(1, 665, '2023-03-05 04:47:04', NULL),
(2, 1, '2023-03-05 04:47:03', NULL),
(2, 2, '2023-03-05 04:47:03', NULL),
(2, 3, '2023-03-05 04:47:03', NULL),
(2, 4, '2023-03-05 04:47:03', NULL),
(2, 5, '2023-03-05 04:47:03', NULL),
(2, 6, '2023-03-05 04:47:03', NULL),
(2, 7, '2023-03-05 04:47:03', NULL),
(2, 8, '2023-03-05 04:47:03', NULL),
(2, 9, '2023-03-05 04:47:03', NULL),
(2, 10, '2023-03-05 04:47:03', NULL),
(2, 11, '2023-03-05 04:47:03', NULL),
(2, 12, '2023-03-05 04:47:03', NULL),
(2, 13, '2023-03-05 04:47:03', NULL),
(2, 14, '2023-03-05 04:47:03', NULL),
(2, 15, '2023-03-05 04:47:03', NULL),
(2, 16, '2023-03-05 04:47:03', NULL),
(2, 303, '2023-03-05 04:47:03', NULL),
(2, 304, '2023-03-05 04:47:03', NULL),
(2, 305, '2023-03-05 04:47:03', NULL),
(2, 306, '2023-03-05 04:47:03', NULL),
(2, 307, '2023-03-05 04:47:03', NULL),
(2, 308, '2023-03-05 04:47:04', NULL),
(2, 309, '2023-03-05 04:47:04', NULL),
(2, 310, '2023-03-05 04:47:04', NULL),
(2, 311, '2023-03-05 04:47:04', NULL),
(2, 312, '2023-03-05 04:47:04', NULL),
(2, 313, '2023-03-05 04:47:03', NULL),
(2, 314, '2023-03-05 04:47:03', NULL),
(2, 315, '2023-03-05 04:47:03', NULL),
(2, 316, '2023-03-05 04:47:03', NULL),
(2, 317, '2023-03-05 04:47:03', NULL),
(2, 328, '2023-03-05 04:47:03', NULL),
(2, 329, '2023-03-05 04:47:03', NULL),
(2, 330, '2023-03-05 04:47:03', NULL),
(2, 331, '2023-03-05 04:47:03', NULL),
(2, 332, '2023-03-05 04:47:03', NULL),
(2, 343, '2023-03-05 04:47:03', NULL),
(2, 344, '2023-03-05 04:47:03', NULL),
(2, 345, '2023-03-05 04:47:03', NULL),
(2, 346, '2023-03-05 04:47:03', NULL),
(2, 347, '2023-03-05 04:47:03', NULL),
(2, 348, '2023-03-05 04:47:03', NULL),
(2, 349, '2023-03-05 04:47:03', NULL),
(2, 350, '2023-03-05 04:47:03', NULL),
(2, 351, '2023-03-05 04:47:03', NULL),
(2, 352, '2023-03-05 04:47:03', NULL),
(2, 353, '2023-03-05 04:47:03', NULL),
(2, 354, '2023-03-05 04:47:03', NULL),
(2, 355, '2023-03-05 04:47:03', NULL),
(2, 356, '2023-03-05 04:47:03', NULL),
(2, 357, '2023-03-05 04:47:03', NULL),
(2, 358, '2023-03-05 04:47:03', NULL),
(2, 359, '2023-03-05 04:47:03', NULL),
(2, 360, '2023-03-05 04:47:03', NULL),
(2, 361, '2023-03-05 04:47:03', NULL),
(2, 362, '2023-03-05 04:47:03', NULL),
(2, 363, '2023-03-05 04:47:04', NULL),
(2, 364, '2023-03-05 04:47:04', NULL),
(2, 365, '2023-03-05 04:47:04', NULL),
(2, 366, '2023-03-05 04:47:04', NULL),
(2, 367, '2023-03-05 04:47:04', NULL),
(2, 373, '2023-03-05 04:47:03', NULL),
(2, 374, '2023-03-05 04:47:03', NULL),
(2, 375, '2023-03-05 04:47:03', NULL),
(2, 376, '2023-03-05 04:47:03', NULL),
(2, 377, '2023-03-05 04:47:03', NULL),
(2, 383, '2023-03-05 04:47:03', NULL),
(2, 384, '2023-03-05 04:47:03', NULL),
(2, 385, '2023-03-05 04:47:03', NULL),
(2, 386, '2023-03-05 04:47:03', NULL),
(2, 387, '2023-03-05 04:47:03', NULL),
(2, 393, '2023-03-05 04:47:03', NULL),
(2, 394, '2023-03-05 04:47:03', NULL),
(2, 395, '2023-03-05 04:47:03', NULL),
(2, 396, '2023-03-05 04:47:03', NULL),
(2, 397, '2023-03-05 04:47:03', NULL),
(2, 398, '2023-03-05 04:47:03', NULL),
(2, 399, '2023-03-05 04:47:03', NULL),
(2, 400, '2023-03-05 04:47:03', NULL),
(2, 401, '2023-03-05 04:47:03', NULL),
(2, 402, '2023-03-05 04:47:03', NULL),
(2, 403, '2023-03-05 04:47:03', NULL),
(2, 404, '2023-03-05 04:47:03', NULL),
(2, 405, '2023-03-05 04:47:03', NULL),
(2, 406, '2023-03-05 04:47:03', NULL),
(2, 407, '2023-03-05 04:47:03', NULL),
(2, 408, '2023-03-05 04:47:03', NULL),
(2, 546, '2023-03-05 04:47:03', NULL),
(2, 547, '2023-03-05 04:47:03', NULL),
(2, 548, '2023-03-05 04:47:03', NULL),
(2, 549, '2023-03-05 04:47:03', NULL),
(2, 550, '2023-03-05 04:47:03', NULL),
(2, 586, '2023-03-05 04:47:04', NULL),
(2, 587, '2023-03-05 04:47:04', NULL),
(2, 588, '2023-03-05 04:47:04', NULL),
(2, 589, '2023-03-05 04:47:04', NULL),
(2, 590, '2023-03-05 04:47:04', NULL),
(2, 591, '2023-03-05 04:47:03', NULL),
(2, 592, '2023-03-05 04:47:03', NULL),
(2, 593, '2023-03-05 04:47:03', NULL),
(2, 594, '2023-03-05 04:47:03', NULL),
(2, 595, '2023-03-05 04:47:03', NULL),
(2, 596, '2023-03-05 04:47:03', NULL),
(2, 597, '2023-03-05 04:47:03', NULL),
(2, 598, '2023-03-05 04:47:03', NULL),
(2, 599, '2023-03-05 04:47:03', NULL),
(2, 600, '2023-03-05 04:47:03', NULL),
(2, 611, '2023-03-05 04:47:04', NULL),
(2, 612, '2023-03-05 04:47:04', NULL),
(2, 613, '2023-03-05 04:47:04', NULL),
(2, 614, '2023-03-05 04:47:04', NULL),
(2, 615, '2023-03-05 04:47:04', NULL),
(2, 616, '2023-03-05 04:47:04', NULL),
(2, 617, '2023-03-05 04:47:04', NULL),
(2, 618, '2023-03-05 04:47:04', NULL),
(2, 619, '2023-03-05 04:47:04', NULL),
(2, 620, '2023-03-05 04:47:04', NULL),
(2, 621, '2023-03-05 04:47:04', NULL),
(2, 622, '2023-03-05 04:47:04', NULL),
(2, 623, '2023-03-05 04:47:04', NULL),
(2, 624, '2023-03-05 04:47:04', NULL),
(2, 625, '2023-03-05 04:47:04', NULL),
(2, 626, '2023-03-05 04:47:04', NULL),
(2, 627, '2023-03-05 04:47:04', NULL),
(2, 628, '2023-03-05 04:47:04', NULL),
(2, 629, '2023-03-05 04:47:04', NULL),
(2, 630, '2023-03-05 04:47:04', NULL),
(2, 631, '2023-03-05 04:47:04', NULL),
(2, 632, '2023-03-05 04:47:04', NULL),
(2, 633, '2023-03-05 04:47:04', NULL),
(2, 634, '2023-03-05 04:47:04', NULL),
(2, 635, '2023-03-05 04:47:04', NULL),
(2, 656, '2023-03-05 04:47:04', NULL),
(2, 657, '2023-03-05 04:47:04', NULL),
(2, 658, '2023-03-05 04:47:04', NULL),
(2, 659, '2023-03-05 04:47:04', NULL),
(2, 660, '2023-03-05 04:47:04', NULL),
(2, 661, '2023-03-05 04:47:04', NULL),
(2, 662, '2023-03-05 04:47:04', NULL),
(2, 663, '2023-03-05 04:47:04', NULL),
(2, 664, '2023-03-05 04:47:04', NULL),
(2, 665, '2023-03-05 04:47:04', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `about`
--
ALTER TABLE `about`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `about_trans`
--
ALTER TABLE `about_trans`
  ADD PRIMARY KEY (`id`),
  ADD KEY `about_trans_about_id_index` (`about_id`),
  ADD KEY `about_trans_language_id_index` (`language_id`);

--
-- Indexes for table `activity_log`
--
ALTER TABLE `activity_log`
  ADD PRIMARY KEY (`id`),
  ADD KEY `activity_log_log_name_index` (`log_name`),
  ADD KEY `subject` (`subject_id`,`subject_type`),
  ADD KEY `causer` (`causer_id`,`causer_type`);

--
-- Indexes for table `ads`
--
ALTER TABLE `ads`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `agent_socials`
--
ALTER TABLE `agent_socials`
  ADD PRIMARY KEY (`id`),
  ADD KEY `agent_socials_top_agent_id_index` (`top_agent_id`);

--
-- Indexes for table `attachmentables`
--
ALTER TABLE `attachmentables`
  ADD PRIMARY KEY (`id`),
  ADD KEY `attachmentables_attachmentable_type_attachmentable_id_index` (`attachmentable_type`,`attachmentable_id`);

--
-- Indexes for table `blogs`
--
ALTER TABLE `blogs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `blogs_category_id_foreign` (`category_id`);

--
-- Indexes for table `blog_categories`
--
ALTER TABLE `blog_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `blog_category_trans`
--
ALTER TABLE `blog_category_trans`
  ADD PRIMARY KEY (`blog_category_id`,`language_id`),
  ADD KEY `blog_category_trans_blog_category_id_index` (`blog_category_id`),
  ADD KEY `blog_category_trans_language_id_index` (`language_id`);

--
-- Indexes for table `blog_trans`
--
ALTER TABLE `blog_trans`
  ADD PRIMARY KEY (`blog_id`,`language_id`),
  ADD KEY `blog_trans_blog_id_index` (`blog_id`),
  ADD KEY `blog_trans_language_id_index` (`language_id`);

--
-- Indexes for table `branches`
--
ALTER TABLE `branches`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `brand_product`
--
ALTER TABLE `brand_product`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `careers`
--
ALTER TABLE `careers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `career_trans`
--
ALTER TABLE `career_trans`
  ADD PRIMARY KEY (`career_id`,`language_id`),
  ADD KEY `career_trans_career_id_index` (`career_id`),
  ADD KEY `career_trans_language_id_index` (`language_id`);

--
-- Indexes for table `cms_managements`
--
ALTER TABLE `cms_managements`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cms_management_trans`
--
ALTER TABLE `cms_management_trans`
  ADD KEY `cms_management_trans_cms_management_id_index` (`cms_management_id`),
  ADD KEY `cms_management_trans_language_id_index` (`language_id`);

--
-- Indexes for table `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contact_us`
--
ALTER TABLE `contact_us`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `currencies`
--
ALTER TABLE `currencies`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `event_trans`
--
ALTER TABLE `event_trans`
  ADD PRIMARY KEY (`event_id`,`language_id`),
  ADD KEY `event_trans_event_id_index` (`event_id`),
  ADD KEY `event_trans_language_id_index` (`language_id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `footer_links`
--
ALTER TABLE `footer_links`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `footer_links_trans`
--
ALTER TABLE `footer_links_trans`
  ADD PRIMARY KEY (`id`),
  ADD KEY `footer_links_trans_footer_link_id_index` (`footer_link_id`),
  ADD KEY `footer_links_trans_language_id_index` (`language_id`);

--
-- Indexes for table `groups`
--
ALTER TABLE `groups`
  ADD PRIMARY KEY (`id`),
  ADD KEY `groups_parent_id_index` (`parent_id`);

--
-- Indexes for table `group_permissions`
--
ALTER TABLE `group_permissions`
  ADD KEY `group_permissions_group_id_index` (`group_id`),
  ADD KEY `group_permissions_permission_id_index` (`permission_id`);

--
-- Indexes for table `host_details`
--
ALTER TABLE `host_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `host_details_package_id_index` (`package_id`);

--
-- Indexes for table `how_works`
--
ALTER TABLE `how_works`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `how_work_trans`
--
ALTER TABLE `how_work_trans`
  ADD PRIMARY KEY (`id`),
  ADD KEY `how_work_trans_how_work_id_index` (`how_work_id`),
  ADD KEY `how_work_trans_language_id_index` (`language_id`);

--
-- Indexes for table `informations`
--
ALTER TABLE `informations`
  ADD PRIMARY KEY (`id`),
  ADD KEY `informations_category_id_foreign` (`category_id`);

--
-- Indexes for table `information_categories`
--
ALTER TABLE `information_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `information_category_trans`
--
ALTER TABLE `information_category_trans`
  ADD PRIMARY KEY (`information_category_id`,`language_id`),
  ADD KEY `information_category_trans_information_category_id_index` (`information_category_id`),
  ADD KEY `information_category_trans_language_id_index` (`language_id`);

--
-- Indexes for table `information_trans`
--
ALTER TABLE `information_trans`
  ADD PRIMARY KEY (`information_id`,`language_id`),
  ADD KEY `information_trans_information_id_index` (`information_id`),
  ADD KEY `information_trans_language_id_index` (`language_id`);

--
-- Indexes for table `languages`
--
ALTER TABLE `languages`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `languages_code_unique` (`code`);

--
-- Indexes for table `locations`
--
ALTER TABLE `locations`
  ADD PRIMARY KEY (`id`),
  ADD KEY `locations_parent_id_index` (`parent_id`);

--
-- Indexes for table `location_trans`
--
ALTER TABLE `location_trans`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `logos`
--
ALTER TABLE `logos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `main_sliders`
--
ALTER TABLE `main_sliders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `main_slider_trans`
--
ALTER TABLE `main_slider_trans`
  ADD PRIMARY KEY (`id`),
  ADD KEY `main_slider_trans_main_slider_id_index` (`main_slider_id`),
  ADD KEY `main_slider_trans_language_id_index` (`language_id`);

--
-- Indexes for table `media`
--
ALTER TABLE `media`
  ADD PRIMARY KEY (`id`),
  ADD KEY `media_model_type_model_id_index` (`model_type`,`model_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `modules`
--
ALTER TABLE `modules`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`id`),
  ADD KEY `notifications_notifiable_type_notifiable_id_index` (`notifiable_type`,`notifiable_id`);

--
-- Indexes for table `oauth_access_tokens`
--
ALTER TABLE `oauth_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_access_tokens_user_id_index` (`user_id`);

--
-- Indexes for table `oauth_auth_codes`
--
ALTER TABLE `oauth_auth_codes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_auth_codes_user_id_index` (`user_id`);

--
-- Indexes for table `oauth_clients`
--
ALTER TABLE `oauth_clients`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_clients_user_id_index` (`user_id`);

--
-- Indexes for table `oauth_personal_access_clients`
--
ALTER TABLE `oauth_personal_access_clients`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `oauth_refresh_tokens`
--
ALTER TABLE `oauth_refresh_tokens`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_refresh_tokens_access_token_id_index` (`access_token_id`);

--
-- Indexes for table `office_services`
--
ALTER TABLE `office_services`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `packages`
--
ALTER TABLE `packages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `package_modules`
--
ALTER TABLE `package_modules`
  ADD KEY `package_modules_package_id_index` (`package_id`),
  ADD KEY `package_modules_module_id_index` (`module_id`);

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
  ADD KEY `permissions_parent_id_index` (`parent_id`),
  ADD KEY `permissions_module_id_index` (`module_id`);

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
-- Indexes for table `product_categories`
--
ALTER TABLE `product_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_specifications`
--
ALTER TABLE `product_specifications`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ratings`
--
ALTER TABLE `ratings`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ratings_rateable_type_rateable_id_index` (`rateable_type`,`rateable_id`);

--
-- Indexes for table `seo`
--
ALTER TABLE `seo`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `seo_trans`
--
ALTER TABLE `seo_trans`
  ADD PRIMARY KEY (`seo_id`,`language_id`),
  ADD KEY `seo_trans_seo_id_index` (`seo_id`),
  ADD KEY `seo_trans_language_id_index` (`language_id`);

--
-- Indexes for table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `service_categories`
--
ALTER TABLE `service_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `service_category_trans`
--
ALTER TABLE `service_category_trans`
  ADD PRIMARY KEY (`service_category_id`,`language_id`),
  ADD KEY `service_category_trans_service_category_id_index` (`service_category_id`),
  ADD KEY `service_category_trans_language_id_index` (`language_id`);

--
-- Indexes for table `service_trans`
--
ALTER TABLE `service_trans`
  ADD PRIMARY KEY (`service_id`,`language_id`),
  ADD KEY `service_trans_service_id_index` (`service_id`),
  ADD KEY `service_trans_language_id_index` (`language_id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `socials`
--
ALTER TABLE `socials`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `social_trans`
--
ALTER TABLE `social_trans`
  ADD PRIMARY KEY (`id`),
  ADD KEY `social_trans_social_id_index` (`social_id`),
  ADD KEY `social_trans_language_id_index` (`language_id`);

--
-- Indexes for table `subscribes`
--
ALTER TABLE `subscribes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tagables`
--
ALTER TABLE `tagables`
  ADD KEY `tagables_tagable_type_tagable_id_index` (`tagable_type`,`tagable_id`),
  ADD KEY `tagables_tag_id_index` (`tag_id`);

--
-- Indexes for table `tags`
--
ALTER TABLE `tags`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `testimonials`
--
ALTER TABLE `testimonials`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `testimonial_trans`
--
ALTER TABLE `testimonial_trans`
  ADD PRIMARY KEY (`id`),
  ADD KEY `testimonial_trans_testimonial_id_index` (`testimonial_id`),
  ADD KEY `testimonial_trans_language_id_index` (`language_id`);

--
-- Indexes for table `top_agents`
--
ALTER TABLE `top_agents`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `users_group_id_index` (`group_id`);

--
-- Indexes for table `user_permissions`
--
ALTER TABLE `user_permissions`
  ADD PRIMARY KEY (`user_id`,`permission_id`),
  ADD KEY `user_permissions_user_id_index` (`user_id`),
  ADD KEY `user_permissions_permission_id_index` (`permission_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `about`
--
ALTER TABLE `about`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `about_trans`
--
ALTER TABLE `about_trans`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `activity_log`
--
ALTER TABLE `activity_log`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `ads`
--
ALTER TABLE `ads`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `agent_socials`
--
ALTER TABLE `agent_socials`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `attachmentables`
--
ALTER TABLE `attachmentables`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `blogs`
--
ALTER TABLE `blogs`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `blog_categories`
--
ALTER TABLE `blog_categories`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `branches`
--
ALTER TABLE `branches`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `brand_product`
--
ALTER TABLE `brand_product`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `careers`
--
ALTER TABLE `careers`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `cms_managements`
--
ALTER TABLE `cms_managements`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `contact_us`
--
ALTER TABLE `contact_us`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `currencies`
--
ALTER TABLE `currencies`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `footer_links`
--
ALTER TABLE `footer_links`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `footer_links_trans`
--
ALTER TABLE `footer_links_trans`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `groups`
--
ALTER TABLE `groups`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `host_details`
--
ALTER TABLE `host_details`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `how_works`
--
ALTER TABLE `how_works`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `how_work_trans`
--
ALTER TABLE `how_work_trans`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `informations`
--
ALTER TABLE `informations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `information_categories`
--
ALTER TABLE `information_categories`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `languages`
--
ALTER TABLE `languages`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `locations`
--
ALTER TABLE `locations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52760;

--
-- AUTO_INCREMENT for table `location_trans`
--
ALTER TABLE `location_trans`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `logos`
--
ALTER TABLE `logos`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `main_sliders`
--
ALTER TABLE `main_sliders`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `main_slider_trans`
--
ALTER TABLE `main_slider_trans`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `media`
--
ALTER TABLE `media`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=217;

--
-- AUTO_INCREMENT for table `modules`
--
ALTER TABLE `modules`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `oauth_clients`
--
ALTER TABLE `oauth_clients`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `oauth_personal_access_clients`
--
ALTER TABLE `oauth_personal_access_clients`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `office_services`
--
ALTER TABLE `office_services`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `packages`
--
ALTER TABLE `packages`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=666;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `product_categories`
--
ALTER TABLE `product_categories`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `product_specifications`
--
ALTER TABLE `product_specifications`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `ratings`
--
ALTER TABLE `ratings`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `seo`
--
ALTER TABLE `seo`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `service_categories`
--
ALTER TABLE `service_categories`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `socials`
--
ALTER TABLE `socials`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `social_trans`
--
ALTER TABLE `social_trans`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `subscribes`
--
ALTER TABLE `subscribes`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tags`
--
ALTER TABLE `tags`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `testimonials`
--
ALTER TABLE `testimonials`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `testimonial_trans`
--
ALTER TABLE `testimonial_trans`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `top_agents`
--
ALTER TABLE `top_agents`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `agent_socials`
--
ALTER TABLE `agent_socials`
  ADD CONSTRAINT `agent_socials_top_agent_id_foreign` FOREIGN KEY (`top_agent_id`) REFERENCES `top_agents` (`id`);

--
-- Constraints for table `blogs`
--
ALTER TABLE `blogs`
  ADD CONSTRAINT `blogs_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `blog_categories` (`id`);

--
-- Constraints for table `cms_management_trans`
--
ALTER TABLE `cms_management_trans`
  ADD CONSTRAINT `cms_management_trans_cms_management_id_foreign` FOREIGN KEY (`cms_management_id`) REFERENCES `cms_managements` (`id`),
  ADD CONSTRAINT `cms_management_trans_language_id_foreign` FOREIGN KEY (`language_id`) REFERENCES `languages` (`id`);

--
-- Constraints for table `groups`
--
ALTER TABLE `groups`
  ADD CONSTRAINT `groups_parent_id_foreign` FOREIGN KEY (`parent_id`) REFERENCES `groups` (`id`);

--
-- Constraints for table `group_permissions`
--
ALTER TABLE `group_permissions`
  ADD CONSTRAINT `group_permissions_group_id_foreign` FOREIGN KEY (`group_id`) REFERENCES `groups` (`id`),
  ADD CONSTRAINT `group_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`);

--
-- Constraints for table `host_details`
--
ALTER TABLE `host_details`
  ADD CONSTRAINT `host_details_package_id_foreign` FOREIGN KEY (`package_id`) REFERENCES `packages` (`id`);

--
-- Constraints for table `informations`
--
ALTER TABLE `informations`
  ADD CONSTRAINT `informations_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `information_categories` (`id`);

--
-- Constraints for table `locations`
--
ALTER TABLE `locations`
  ADD CONSTRAINT `locations_parent_id_foreign` FOREIGN KEY (`parent_id`) REFERENCES `locations` (`id`);

--
-- Constraints for table `package_modules`
--
ALTER TABLE `package_modules`
  ADD CONSTRAINT `package_modules_module_id_foreign` FOREIGN KEY (`module_id`) REFERENCES `modules` (`id`),
  ADD CONSTRAINT `package_modules_package_id_foreign` FOREIGN KEY (`package_id`) REFERENCES `packages` (`id`);

--
-- Constraints for table `permissions`
--
ALTER TABLE `permissions`
  ADD CONSTRAINT `permissions_parent_id_foreign` FOREIGN KEY (`parent_id`) REFERENCES `permissions` (`id`);

--
-- Constraints for table `tagables`
--
ALTER TABLE `tagables`
  ADD CONSTRAINT `tagables_tag_id_foreign` FOREIGN KEY (`tag_id`) REFERENCES `tags` (`id`);

--
-- Constraints for table `user_permissions`
--
ALTER TABLE `user_permissions`
  ADD CONSTRAINT `user_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`),
  ADD CONSTRAINT `user_permissions_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
