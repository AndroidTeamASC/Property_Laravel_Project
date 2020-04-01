-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Mar 31, 2020 at 03:53 PM
-- Server version: 10.4.8-MariaDB
-- PHP Version: 7.3.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `property`
--

-- --------------------------------------------------------

--
-- Table structure for table `attachments`
--

CREATE TABLE `attachments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `property_id` bigint(20) UNSIGNED NOT NULL,
  `file` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `attachments`
--

INSERT INTO `attachments` (`id`, `property_id`, `file`, `created_at`, `updated_at`) VALUES
(2, 1, '[\"image\\/attachment\\/5e820318702ae1585578776.html\",\"image\\/attachment\\/5e820318704001585578776.sql\",\"image\\/attachment\\/5e820318704001585578776.sql\"]', '2020-03-30 08:02:56', '2020-03-30 08:02:56');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `property_id` bigint(20) UNSIGNED DEFAULT NULL,
  `post_id` bigint(20) UNSIGNED DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `comment` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `property_id`, `post_id`, `user_id`, `comment`, `created_at`, `updated_at`) VALUES
(1, NULL, 1, 3, 'How about house??', '2020-03-29 07:46:06', '2020-03-29 07:46:06'),
(2, NULL, 1, 3, 'How is going to this house!!', '2020-03-29 08:48:42', '2020-03-29 08:48:42'),
(3, NULL, 2, 2, 'How about this???', '2020-03-29 08:49:52', '2020-03-29 08:49:52'),
(4, NULL, 1, 2, 'It\'s will be good!!', '2020-03-29 20:58:54', '2020-03-29 20:58:54'),
(5, 1, NULL, 2, 'How about the price', '2020-03-29 21:02:37', '2020-03-29 21:02:37');

-- --------------------------------------------------------

--
-- Table structure for table `comment_replies`
--

CREATE TABLE `comment_replies` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `comment_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `comment` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `comment_replies`
--

INSERT INTO `comment_replies` (`id`, `comment_id`, `user_id`, `comment`, `created_at`, `updated_at`) VALUES
(1, 1, 2, 'It\'s also good!!!', '2020-03-29 07:54:56', '2020-03-29 07:54:56'),
(2, 1, 3, 'Hey it\'s really good!!', '2020-03-29 08:48:15', '2020-03-29 08:48:15'),
(3, 3, 3, 'It\'s not good!!', '2020-03-29 08:50:40', '2020-03-29 08:50:40'),
(4, 3, 2, 'Humm. Is\'t good?? Thank You for your sharing', '2020-03-29 08:51:49', '2020-03-29 08:51:49'),
(5, 5, 3, 'Contact me', '2020-03-29 21:06:37', '2020-03-29 21:06:37'),
(6, 5, 2, 'Okay!! I will contact you!!', '2020-03-29 21:09:24', '2020-03-29 21:09:24');

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE `contacts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `context` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `agent_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `facts`
--

CREATE TABLE `facts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `property_id` bigint(20) UNSIGNED NOT NULL,
  `fact` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `facts`
--

INSERT INTO `facts` (`id`, `property_id`, `fact`, `created_at`, `updated_at`) VALUES
(4, 1, 'Have a garden', '2020-03-31 00:58:19', '2020-03-31 00:58:19');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `features`
--

CREATE TABLE `features` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `feature` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `features`
--

INSERT INTO `features` (`id`, `feature`, `created_at`, `updated_at`) VALUES
(1, 'WiFi', '2020-03-29 07:07:26', '2020-03-29 07:07:26'),
(2, 'Pool', '2020-03-29 07:07:33', '2020-03-29 07:07:33'),
(3, 'Security', '2020-03-29 07:07:38', '2020-03-29 07:07:38');

-- --------------------------------------------------------

--
-- Table structure for table `floors`
--

CREATE TABLE `floors` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `property_id` bigint(20) UNSIGNED NOT NULL,
  `floor_image` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `floors`
--

INSERT INTO `floors` (`id`, `property_id`, `floor_image`, `created_at`, `updated_at`) VALUES
(1, 1, '[\"image\\/floor\\/5e8200e6ee16e1585578214.jpg\"]', '2020-03-30 07:53:34', '2020-03-30 07:53:34');

-- --------------------------------------------------------

--
-- Table structure for table `galleries`
--

CREATE TABLE `galleries` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `property_id` bigint(20) UNSIGNED NOT NULL,
  `gallery_image` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `galleries`
--

INSERT INTO `galleries` (`id`, `property_id`, `gallery_image`, `created_at`, `updated_at`) VALUES
(3, 3, '[\"image\\/gallery\\/5e80a7bcbf1111585489852.jpg\"]', '2020-03-29 07:20:52', '2020-03-29 07:20:52'),
(4, 4, '[\"image\\/gallery\\/5e80a8063d3561585489926.jpg\"]', '2020-03-29 07:22:06', '2020-03-29 07:22:06'),
(13, 2, '[\"image\\/gallery\\/5e816f6ae2d8a1585540970.jpg\"]', '2020-03-29 21:32:50', '2020-03-29 21:32:50'),
(14, 1, '[\"image\\/gallery\\/5e81fc370f78c1585577015.jpg\",\"image\\/gallery\\/5e81fc370f8f71585577015.jpg\"]', '2020-03-30 07:33:35', '2020-03-30 07:33:35');

-- --------------------------------------------------------

--
-- Table structure for table `locations`
--

CREATE TABLE `locations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `property_id` bigint(20) UNSIGNED NOT NULL,
  `address` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `longitude` varchar(40) COLLATE utf8mb4_unicode_ci NOT NULL,
  `latitude` varchar(40) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `locations`
--

INSERT INTO `locations` (`id`, `property_id`, `address`, `longitude`, `latitude`, `created_at`, `updated_at`) VALUES
(1, 1, 'Chan Aye Thar Zan Mandalay', '96.01613606839908', '21.92695477339467', '2020-03-29 07:17:23', '2020-03-31 00:58:18'),
(2, 2, 'Mahar Aung Myae, Mandalay,  Myanmar', '96.10348893244247', '21.9665260439738', '2020-03-29 07:18:47', '2020-03-29 21:35:11'),
(3, 3, 'MPT Condo, Hlaing, Yangon', '96.12303420497', '16.840955242664222', '2020-03-29 07:20:52', '2020-03-29 07:20:52'),
(4, 4, 'Hlaing, Yangon', '96.12143219549444', '16.846609215012506', '2020-03-29 07:22:06', '2020-03-29 07:22:06');

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
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2020_03_10_154126_create_statuses_table', 1),
(5, '2020_03_10_154137_create_types_table', 1),
(6, '2020_03_10_154301_create_features_table', 1),
(7, '2020_03_10_154310_create_tags_table', 1),
(8, '2020_03_10_155001_create_properties_table', 1),
(9, '2020_03_10_155031_create_floors_table', 1),
(10, '2020_03_10_155056_create_galleries_table', 1),
(11, '2020_03_10_155114_create_attachments_table', 1),
(12, '2020_03_10_155131_create_locations_table', 1),
(13, '2020_03_10_155158_create_transportations_table', 1),
(14, '2020_03_10_155230_create_neighborhoods_table', 1),
(15, '2020_03_10_164108_create_facts_table', 1),
(16, '2020_03_10_164139_create_schools_table', 1),
(17, '2020_03_19_070757_create_permission_tables', 1),
(18, '2020_03_21_135258_create_contacts_table', 1),
(19, '2020_03_28_110427_create_posts_table', 1),
(20, '2020_03_28_111142_create_comments_table', 1),
(21, '2020_03_29_090151_create_comment_replies_table', 1),
(22, '2020_03_29_093118_fresh', 1);

-- --------------------------------------------------------

--
-- Table structure for table `model_has_permissions`
--

CREATE TABLE `model_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
(1, 'App\\User', 1),
(2, 'App\\User', 2),
(2, 'App\\User', 3),
(2, 'App\\User', 4),
(4, 'App\\User', 5),
(4, 'App\\User', 6);

-- --------------------------------------------------------

--
-- Table structure for table `neighborhoods`
--

CREATE TABLE `neighborhoods` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `property_id` bigint(20) UNSIGNED NOT NULL,
  `transportation_id` bigint(20) UNSIGNED NOT NULL,
  `place` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `duration` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `neighborhoods`
--

INSERT INTO `neighborhoods` (`id`, `property_id`, `transportation_id`, `place`, `duration`, `created_at`, `updated_at`) VALUES
(5, 1, 3, 'City Mart', 20, '2020-03-31 00:58:18', '2020-03-31 00:58:18'),
(6, 1, 4, 'Myanmar Plaza', 10, '2020-03-31 00:58:18', '2020-03-31 00:58:18');

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
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `type_id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `context` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `user_id`, `type_id`, `title`, `context`, `image`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 'Relaxing Houses', 'Google News is a news aggregator app developed by Google. It presents a continuous, customizable flow of articles organized from thousands of publishers and magazines. Google News is available as an app on Android, iOS, and the Web. Google released a beta version in September 2002 and the official app in January 2006.', 'image/post/5e80a5bcdd2e31585489340.jpg', '2020-03-29 07:12:20', '2020-03-29 07:12:20'),
(2, 1, 2, 'Beautiful Apartment', 'Google News is a news aggregator app developed by Google. It presents a continuous, customizable flow of articles organized from thousands of publishers and magazines. Google News is available as an app on Android, iOS, and the Web. Google released a beta version in September 2002 and the official app in January 2006.', 'image/post/5e80a5cf588dc1585489359.jpg', '2020-03-29 07:12:39', '2020-03-29 07:12:39'),
(3, 1, 3, 'Smart Office', 'Google News is a news aggregator app developed by Google. It presents a continuous, customizable flow of articles organized from thousands of publishers and magazines. Google News is available as an app on Android, iOS, and the Web. Google released a beta version in September 2002 and the official app in January 2006.', 'image/post/5e80a5e7c673f1585489383.jpg', '2020-03-29 07:13:03', '2020-03-29 07:13:03'),
(4, 1, 1, 'Relaxing House for everything', 'Google News is a news aggregator app developed by Google. It presents a continuous, customizable flow of articles organized from thousands of publishers and magazines. Google News is available as an app on Android, iOS, and the Web. Google released a beta version in September 2002 and the official app in January 2006.', 'image/post/5e8199b91b2a01585551801.jpg', '2020-03-30 00:33:21', '2020-03-30 00:33:21');

-- --------------------------------------------------------

--
-- Table structure for table `properties`
--

CREATE TABLE `properties` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `status_id` bigint(20) UNSIGNED NOT NULL,
  `type_id` bigint(20) UNSIGNED NOT NULL,
  `agent_id` bigint(20) UNSIGNED NOT NULL,
  `feature_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tag_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bedroom` int(10) UNSIGNED NOT NULL,
  `bathroom` int(10) UNSIGNED NOT NULL,
  `garage` int(10) UNSIGNED DEFAULT NULL,
  `build_year` int(10) UNSIGNED DEFAULT NULL,
  `land_area` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `building_area` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `keyword` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `price` int(10) UNSIGNED NOT NULL,
  `embed_code` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `property_status` int(10) UNSIGNED NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `properties`
--

INSERT INTO `properties` (`id`, `status_id`, `type_id`, `agent_id`, `feature_id`, `tag_id`, `title`, `bedroom`, `bathroom`, `garage`, `build_year`, `land_area`, `building_area`, `description`, `keyword`, `price`, `embed_code`, `property_status`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 2, '[\"1\",\"2\"]', '[\"1\",\"2\"]', 'Beautiful House', 2, 2, 1, 2007, '4500', '4000', NULL, 'House', 4000000, '<iframe width=\"560\" height=\"315\" src=\"https://www.youtube.com/embed/iDVItAX-meU\" frameborder=\"0\" allow=\"accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>', 1, '2020-03-29 07:17:23', '2020-03-31 00:58:18'),
(2, 2, 1, 2, 'null', 'null', 'Smart Houses', 2, 1, 1, 2005, '2000', '1900', NULL, NULL, 300000, NULL, 1, '2020-03-29 07:18:47', '2020-03-29 20:22:54'),
(3, 1, 2, 3, 'null', 'null', 'Beautiful Apartment', 2, 1, 1, 2015, '2800', '2700', NULL, NULL, 280000, NULL, 1, '2020-03-29 07:20:52', '2020-03-29 07:20:52'),
(4, 2, 2, 3, 'null', 'null', 'Smart Apartment', 3, 2, 1, 2015, '2000', '1800', NULL, NULL, 20000, NULL, 1, '2020-03-29 07:22:06', '2020-03-29 07:22:06');

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
(1, 'admin', 'web', '2020-03-29 07:02:24', '2020-03-29 07:02:24'),
(2, 'agent', 'web', '2020-03-29 07:02:24', '2020-03-29 07:02:24'),
(3, 'premium_agent', 'web', '2020-03-29 07:02:24', '2020-03-29 07:02:24'),
(4, 'user', 'web', '2020-03-29 07:02:24', '2020-03-29 07:02:24');

-- --------------------------------------------------------

--
-- Table structure for table `role_has_permissions`
--

CREATE TABLE `role_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `schools`
--

CREATE TABLE `schools` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `property_id` bigint(20) UNSIGNED NOT NULL,
  `school_name` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `rating` int(10) UNSIGNED NOT NULL,
  `grade` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `distance` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `schools`
--

INSERT INTO `schools` (`id`, `property_id`, `school_name`, `rating`, `grade`, `distance`, `created_at`, `updated_at`) VALUES
(4, 1, 'Nobel', 4, '11', '110', '2020-03-31 00:58:19', '2020-03-31 00:58:19');

-- --------------------------------------------------------

--
-- Table structure for table `statuses`
--

CREATE TABLE `statuses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `status` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `statuses`
--

INSERT INTO `statuses` (`id`, `status`, `created_at`, `updated_at`) VALUES
(1, 'For Sale', '2020-03-29 07:06:17', '2020-03-29 07:06:17'),
(2, 'For Rent', '2020-03-29 07:06:22', '2020-03-29 07:06:22');

-- --------------------------------------------------------

--
-- Table structure for table `tags`
--

CREATE TABLE `tags` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tag` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tags`
--

INSERT INTO `tags` (`id`, `tag`, `created_at`, `updated_at`) VALUES
(1, 'New', '2020-03-29 07:07:12', '2020-03-29 07:07:12'),
(2, 'Hot Offer', '2020-03-29 07:07:17', '2020-03-29 07:07:17');

-- --------------------------------------------------------

--
-- Table structure for table `transportations`
--

CREATE TABLE `transportations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `transportation_type` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `transportations`
--

INSERT INTO `transportations` (`id`, `transportation_type`, `created_at`, `updated_at`) VALUES
(1, 'Bicycle', '2020-03-29 07:07:52', '2020-03-29 07:07:52'),
(2, 'Train', '2020-03-29 07:08:00', '2020-03-29 07:08:00'),
(3, 'Car', '2020-03-29 07:08:05', '2020-03-29 07:08:05'),
(4, 'Walking', '2020-03-29 07:08:09', '2020-03-29 07:08:09');

-- --------------------------------------------------------

--
-- Table structure for table `types`
--

CREATE TABLE `types` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `type` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `types`
--

INSERT INTO `types` (`id`, `type`, `created_at`, `updated_at`) VALUES
(1, 'House', '2020-03-29 07:06:31', '2020-03-29 07:06:31'),
(2, 'Apartment', '2020-03-29 07:06:40', '2020-03-29 07:06:40'),
(3, 'Office', '2020-03-29 07:07:02', '2020-03-29 07:07:02');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(70) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone_no` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `phone_no`, `address`, `image`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'admin@gmail.com', NULL, '$2y$10$b.2n7haeom/Gzmjc.kBRhe6hulL7l.G6duqGviLNzpT2Z8/S8nzWO', '098765421788', 'MPT Condo, Hlaing, Yangon', NULL, NULL, '2020-03-29 07:05:33', '2020-03-29 07:05:33'),
(2, 'Chan Ei Hmwe', 'chaneihmwe@gmail.com', NULL, '$2y$10$.gaAr2tOPGkUAn.y0Gis7e2znXTh6ApDZzjJnhBR46tu3GLqarHdi', '098765421788', 'PyiGyiTaKhon, Mandalay', 'image/profile/5e82f1a0eec7a1585639840.png', NULL, '2020-03-29 07:09:26', '2020-03-31 01:00:40'),
(3, 'Si Thu Aung', 'sithuaung@gmail.com', NULL, '$2y$10$yo6BHi8iCnMpbb03/fRPEOYlpM9bpFuyxuDk87c9WD53pPiDFarcS', '098765421124', 'Thamine, Yangon', 'image/profile/5e80a5346738b1585489204.png', NULL, '2020-03-29 07:09:52', '2020-03-29 07:10:04'),
(4, 'Aung Zin Phyo', 'aungzinphyo@gmail.com', NULL, '$2y$10$muc567zGibRNi7yUj7FhA.8J3zdlfk2YL3.EiIcuYm8h7pgIOtAtq', '098765421788', 'Monywa, Sagaing', 'image/profile/5e80a64216ba41585489474.jpeg', NULL, '2020-03-29 07:14:34', '2020-03-29 07:14:34'),
(5, 'Min Pike Hmu', 'minpikehmu@gmail.com', NULL, '$2y$10$NZRRSPkuWvhryFsT0YOis.SvYpKwRWmmEFt/LxMGZkGeB3F1ZtCi.', '098765445676', 'Chang Oo, Sagaing', '/image/profile/white-and-grey-koala-2590768.jpg', NULL, '2020-03-30 20:13:55', '2020-03-30 20:13:55'),
(6, 'Ya Thaw Myat Noe', 'yathawmyatnoe@gmail.com', NULL, '$2y$10$nB6lDkHSxtLtU6mB9roDIeVrkIIRqKkOd08drlA29j84KlSquvr9.', '098765421124', 'Bahan, Yangon', '/image/profile/5e82af6817b311585622888.png', NULL, '2020-03-30 20:18:08', '2020-03-30 20:18:08');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `attachments`
--
ALTER TABLE `attachments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `attachments_property_id_foreign` (`property_id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `comments_post_id_foreign` (`post_id`),
  ADD KEY `comments_user_id_foreign` (`user_id`),
  ADD KEY `property_id` (`property_id`);

--
-- Indexes for table `comment_replies`
--
ALTER TABLE `comment_replies`
  ADD PRIMARY KEY (`id`),
  ADD KEY `comment_replies_comment_id_foreign` (`comment_id`),
  ADD KEY `comment_replies_user_id_foreign` (`user_id`);

--
-- Indexes for table `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `contacts_agent_id_foreign` (`agent_id`);

--
-- Indexes for table `facts`
--
ALTER TABLE `facts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `facts_property_id_foreign` (`property_id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `features`
--
ALTER TABLE `features`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `floors`
--
ALTER TABLE `floors`
  ADD PRIMARY KEY (`id`),
  ADD KEY `floors_property_id_foreign` (`property_id`);

--
-- Indexes for table `galleries`
--
ALTER TABLE `galleries`
  ADD PRIMARY KEY (`id`),
  ADD KEY `galleries_property_id_foreign` (`property_id`);

--
-- Indexes for table `locations`
--
ALTER TABLE `locations`
  ADD PRIMARY KEY (`id`),
  ADD KEY `locations_property_id_foreign` (`property_id`);

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
-- Indexes for table `neighborhoods`
--
ALTER TABLE `neighborhoods`
  ADD PRIMARY KEY (`id`),
  ADD KEY `neighborhoods_transportation_id_foreign` (`transportation_id`),
  ADD KEY `neighborhoods_property_id_foreign` (`property_id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `posts_user_id_foreign` (`user_id`),
  ADD KEY `type_id` (`type_id`);

--
-- Indexes for table `properties`
--
ALTER TABLE `properties`
  ADD PRIMARY KEY (`id`),
  ADD KEY `properties_status_id_foreign` (`status_id`),
  ADD KEY `properties_type_id_foreign` (`type_id`),
  ADD KEY `properties_agent_id_foreign` (`agent_id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `role_has_permissions_role_id_foreign` (`role_id`);

--
-- Indexes for table `schools`
--
ALTER TABLE `schools`
  ADD PRIMARY KEY (`id`),
  ADD KEY `schools_property_id_foreign` (`property_id`);

--
-- Indexes for table `statuses`
--
ALTER TABLE `statuses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tags`
--
ALTER TABLE `tags`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transportations`
--
ALTER TABLE `transportations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `types`
--
ALTER TABLE `types`
  ADD PRIMARY KEY (`id`);

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
-- AUTO_INCREMENT for table `attachments`
--
ALTER TABLE `attachments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `comment_replies`
--
ALTER TABLE `comment_replies`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `facts`
--
ALTER TABLE `facts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `features`
--
ALTER TABLE `features`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `floors`
--
ALTER TABLE `floors`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `galleries`
--
ALTER TABLE `galleries`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `locations`
--
ALTER TABLE `locations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `neighborhoods`
--
ALTER TABLE `neighborhoods`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `properties`
--
ALTER TABLE `properties`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `schools`
--
ALTER TABLE `schools`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `statuses`
--
ALTER TABLE `statuses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tags`
--
ALTER TABLE `tags`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `transportations`
--
ALTER TABLE `transportations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `types`
--
ALTER TABLE `types`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `attachments`
--
ALTER TABLE `attachments`
  ADD CONSTRAINT `attachments_property_id_foreign` FOREIGN KEY (`property_id`) REFERENCES `properties` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_ibfk_1` FOREIGN KEY (`property_id`) REFERENCES `properties` (`id`),
  ADD CONSTRAINT `comments_post_id_foreign` FOREIGN KEY (`post_id`) REFERENCES `posts` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `comments_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `comment_replies`
--
ALTER TABLE `comment_replies`
  ADD CONSTRAINT `comment_replies_comment_id_foreign` FOREIGN KEY (`comment_id`) REFERENCES `comments` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `comment_replies_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `contacts`
--
ALTER TABLE `contacts`
  ADD CONSTRAINT `contacts_agent_id_foreign` FOREIGN KEY (`agent_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `facts`
--
ALTER TABLE `facts`
  ADD CONSTRAINT `facts_property_id_foreign` FOREIGN KEY (`property_id`) REFERENCES `properties` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `floors`
--
ALTER TABLE `floors`
  ADD CONSTRAINT `floors_property_id_foreign` FOREIGN KEY (`property_id`) REFERENCES `properties` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `galleries`
--
ALTER TABLE `galleries`
  ADD CONSTRAINT `galleries_property_id_foreign` FOREIGN KEY (`property_id`) REFERENCES `properties` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `locations`
--
ALTER TABLE `locations`
  ADD CONSTRAINT `locations_property_id_foreign` FOREIGN KEY (`property_id`) REFERENCES `properties` (`id`) ON DELETE CASCADE;

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
-- Constraints for table `neighborhoods`
--
ALTER TABLE `neighborhoods`
  ADD CONSTRAINT `neighborhoods_property_id_foreign` FOREIGN KEY (`property_id`) REFERENCES `properties` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `neighborhoods_transportation_id_foreign` FOREIGN KEY (`transportation_id`) REFERENCES `transportations` (`id`);

--
-- Constraints for table `posts`
--
ALTER TABLE `posts`
  ADD CONSTRAINT `posts_ibfk_1` FOREIGN KEY (`type_id`) REFERENCES `types` (`id`),
  ADD CONSTRAINT `posts_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `properties`
--
ALTER TABLE `properties`
  ADD CONSTRAINT `properties_agent_id_foreign` FOREIGN KEY (`agent_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `properties_status_id_foreign` FOREIGN KEY (`status_id`) REFERENCES `statuses` (`id`),
  ADD CONSTRAINT `properties_type_id_foreign` FOREIGN KEY (`type_id`) REFERENCES `types` (`id`);

--
-- Constraints for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `schools`
--
ALTER TABLE `schools`
  ADD CONSTRAINT `schools_property_id_foreign` FOREIGN KEY (`property_id`) REFERENCES `properties` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
