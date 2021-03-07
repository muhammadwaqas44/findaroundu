-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 07, 2021 at 09:46 AM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.3.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `findaroundu`
--

-- --------------------------------------------------------

--
-- Table structure for table `addresses`
--

CREATE TABLE `addresses` (
  `id` int(10) UNSIGNED NOT NULL,
  `main_country_id` int(10) UNSIGNED DEFAULT NULL,
  `user_id` int(10) UNSIGNED DEFAULT NULL,
  `main_state_id` int(10) UNSIGNED DEFAULT NULL,
  `main_city_id` int(10) UNSIGNED DEFAULT NULL,
  `address` varchar(5000) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `service_id` int(10) UNSIGNED DEFAULT NULL,
  `add_id` int(10) UNSIGNED DEFAULT NULL,
  `business_id` int(10) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `addresses`
--

INSERT INTO `addresses` (`id`, `main_country_id`, `user_id`, `main_state_id`, `main_city_id`, `address`, `service_id`, `add_id`, `business_id`, `created_at`, `updated_at`) VALUES
(1, 166, 1, 2723, 31273, 'F1 Block Johar Town', NULL, NULL, NULL, '2019-05-14 07:48:25', '2019-05-14 07:48:25'),
(2, 166, 2, 2723, 31273, 'F1 Block Johar Town', NULL, NULL, NULL, '2019-05-14 07:48:26', '2019-05-14 07:48:26'),
(3, 166, NULL, 2728, 31464, 'F1 Block Johar Town', NULL, NULL, 1, '2019-05-14 07:48:50', '2019-05-14 07:48:50'),
(4, 166, NULL, 2728, 31464, 'F1 Block Johar Town', NULL, NULL, 2, '2019-05-14 07:48:52', '2019-05-14 07:48:52'),
(5, 166, NULL, 2728, 31439, 'F1 Block Johar Town', 1, NULL, NULL, '2019-05-14 07:48:53', '2019-05-14 07:48:53'),
(6, 166, NULL, 2728, 31439, 'F1 Block Johar Town', 2, NULL, NULL, '2019-05-14 07:48:54', '2019-05-14 07:48:54'),
(7, 166, NULL, 2728, 31464, 'F1 Block Johar Town', NULL, 1, NULL, '2019-05-14 07:48:55', '2019-05-14 07:48:55'),
(8, 166, NULL, 2728, 31464, 'F1 Block Johar Town', NULL, 2, NULL, '2019-05-14 07:48:55', '2019-05-14 07:48:55');

-- --------------------------------------------------------

--
-- Table structure for table `adds`
--

CREATE TABLE `adds` (
  `id` int(10) UNSIGNED NOT NULL,
  `profile_image` varchar(1055) COLLATE utf8mb4_unicode_ci NOT NULL,
  `condition` enum('Used','New') COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(5000) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lat` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `long` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `price` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone_number` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `currency` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title` varchar(1000) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT '1',
  `is_approve` enum('Approve','Not Approve','Rejected') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Not Approve',
  `video_url` varchar(1000) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `facebook_url` varchar(1000) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gmail_url` varchar(1000) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `twitter_url` varchar(1000) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_by` int(10) UNSIGNED NOT NULL,
  `agent_admin_id` int(10) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `category_maker_id` int(10) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `adds`
--

INSERT INTO `adds` (`id`, `profile_image`, `condition`, `description`, `lat`, `long`, `price`, `phone_number`, `currency`, `title`, `is_active`, `is_approve`, `video_url`, `facebook_url`, `gmail_url`, `twitter_url`, `created_by`, `agent_admin_id`, `created_at`, `updated_at`, `category_maker_id`) VALUES
(1, 'project-assets/images/services/2.jpg', 'New', 'this is test', '31.52037', '74.358749', '12', NULL, NULL, 'Test', 1, 'Approve', 'https://www.youtube.com/', 'https://www.facebook.com/', 'https://gmail.com', 'https://twitter.com/', 2, NULL, '2019-05-14 07:48:54', '2019-05-14 07:48:54', NULL),
(2, 'project-assets/images/services/2.jpg', 'New', 'this is test', '33.684422', '73.047882', '22', NULL, NULL, 'Test', 1, 'Approve', 'https://www.youtube.com/', 'https://www.facebook.com/', 'https://gmail.com', 'https://twitter.com/', 2, NULL, '2019-05-14 07:48:55', '2019-05-14 07:48:55', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `adds_business_service_products_features`
--

CREATE TABLE `adds_business_service_products_features` (
  `id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `ads_additional_fields`
--

CREATE TABLE `ads_additional_fields` (
  `id` int(10) UNSIGNED NOT NULL,
  `key` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `value` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ad_id` int(10) UNSIGNED DEFAULT NULL,
  `type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `businesses`
--

CREATE TABLE `businesses` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(1000) COLLATE utf8mb4_unicode_ci NOT NULL,
  `founded_in` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `video_url` varchar(1000) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lat` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `long` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `facebook_url` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gmail_url` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `twitter_url` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `website_url` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `location` varchar(1000) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT '1',
  `is_approve` enum('Approve','Not Approve','Rejected') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Not Approve',
  `created_by` int(10) UNSIGNED NOT NULL,
  `profile_image` varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL,
  `agent_admin_id` int(10) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `employee_count_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `businesses`
--

INSERT INTO `businesses` (`id`, `title`, `founded_in`, `email`, `phone`, `video_url`, `lat`, `long`, `facebook_url`, `gmail_url`, `twitter_url`, `description`, `website_url`, `location`, `is_active`, `is_approve`, `created_by`, `profile_image`, `agent_admin_id`, `created_at`, `updated_at`, `employee_count_id`) VALUES
(1, 'Test', '12/2/2019', 'ahmedalvi.83@gmail.com', '03123769495', 'https://www.youtube.com/', '31.52037', '74.358749', 'https://www.facebook.com/', 'https://gmail.com', 'https://twitter.com/', 'this is test', 'hellobaja.com', '', 1, 'Approve', 2, 'project-assets/images/services/2.jpg', NULL, '2019-05-14 07:48:48', '2019-05-14 07:48:48', 1),
(2, 'Test2', '12/2/2019', 'ahmedalvi.83@gmail.com', '03123769495', 'https://www.youtube.com/', '33.684422', '73.047882', 'https://www.facebook.com/', 'https://gmail.com', 'https://twitter.com/', 'this is test', 'hellobaja.com', '', 1, 'Approve', 2, 'project-assets/images/services/2.jpg', NULL, '2019-05-14 07:48:50', '2019-05-14 07:48:50', 1);

-- --------------------------------------------------------

--
-- Table structure for table `business_port_folios`
--

CREATE TABLE `business_port_folios` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `website_url` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `profile_image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `business_id` int(10) UNSIGNED NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `careers`
--

CREATE TABLE `careers` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `careers`
--

INSERT INTO `careers` (`id`, `name`, `active`, `created_at`, `updated_at`) VALUES
(1, 'Experienced Professional', 1, '2019-05-14 07:49:00', '2019-05-14 07:49:00'),
(2, 'Entry Level', 1, '2019-05-14 07:49:00', '2019-05-14 07:49:00'),
(3, 'Department Head', 1, '2019-05-14 07:49:01', '2019-05-14 07:49:01'),
(4, 'GM/CEO/Country Head.....', 1, '2019-05-14 07:49:01', '2019-05-14 07:49:01');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(10) UNSIGNED NOT NULL,
  `profile_image` varchar(1055) COLLATE utf8mb4_unicode_ci NOT NULL,
  `icon_image` varchar(1055) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(1055) COLLATE utf8mb4_unicode_ci NOT NULL,
  `parent_id` int(10) UNSIGNED DEFAULT NULL,
  `is_ad_additional_fields_req` tinyint(1) DEFAULT NULL,
  `is_ad_type_or_make_req` tinyint(1) DEFAULT NULL,
  `is_ad_condition_req` tinyint(1) DEFAULT NULL,
  `type` varchar(1055) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `profile_image`, `icon_image`, `name`, `parent_id`, `is_ad_additional_fields_req`, `is_ad_type_or_make_req`, `is_ad_condition_req`, `type`, `is_active`, `created_at`, `updated_at`) VALUES
(1, 'project-assets/images/categories/sport-man.jpg', 'project-assets/images/categories/icons/Writer.png', 'Sports Man', NULL, NULL, NULL, NULL, 'Professionals', 1, '2019-05-14 07:47:37', '2019-05-14 07:47:37'),
(2, 'project-assets/images/categories/8.jpg', 'project-assets/images/categories/icons/food-cafe.png', 'Food', NULL, NULL, NULL, NULL, 'Business', 1, '2019-05-14 07:47:37', '2019-05-14 07:47:37'),
(3, 'project-assets/images/categories/8.jpg', NULL, 'café', 2, NULL, NULL, NULL, 'Business', 1, '2019-05-14 07:47:37', '2019-05-14 07:47:37'),
(4, 'project-assets/images/categories/8.jpg', NULL, 'restaurants', 2, NULL, NULL, NULL, 'Business', 1, '2019-05-14 07:47:37', '2019-05-14 07:47:37'),
(5, 'project-assets/images/categories/8.jpg', NULL, 'Chinees', 3, NULL, NULL, NULL, 'Business', 1, '2019-05-14 07:47:38', '2019-05-14 07:47:38'),
(6, 'project-assets/images/categories/8.jpg', NULL, 'pizza', 2, NULL, NULL, NULL, 'Business', 1, '2019-05-14 07:47:38', '2019-05-14 07:47:38'),
(7, 'project-assets/images/categories/8.jpg', NULL, 'Italian', 2, NULL, NULL, NULL, 'Business', 1, '2019-05-14 07:47:38', '2019-05-14 07:47:38'),
(8, 'project-assets/images/categories/8.jpg', NULL, 'Dinning', 2, NULL, NULL, NULL, 'Business', 1, '2019-05-14 07:47:38', '2019-05-14 07:47:38'),
(9, 'project-assets/images/categories/8.jpg', 'project-assets/images/categories/icons/entertainments.png', 'Entertainments', NULL, NULL, NULL, NULL, 'Business', 1, '2019-05-14 07:47:38', '2019-05-14 07:47:38'),
(10, 'project-assets/images/categories/8.jpg', NULL, 'Art nd Design', 9, NULL, NULL, NULL, 'Business', 1, '2019-05-14 07:47:38', '2019-05-14 07:47:38'),
(11, 'project-assets/images/categories/8.jpg', NULL, 'Cinemas', 9, NULL, NULL, NULL, 'Business', 1, '2019-05-14 07:47:38', '2019-05-14 07:47:38'),
(12, 'project-assets/images/categories/8.jpg', NULL, 'Movie nd theater', 9, NULL, NULL, NULL, 'Business', 1, '2019-05-14 07:47:38', '2019-05-14 07:47:38'),
(13, 'project-assets/images/categories/8.jpg', NULL, 'Parks', 9, NULL, NULL, NULL, 'Business', 1, '2019-05-14 07:47:38', '2019-05-14 07:47:38'),
(14, 'project-assets/images/categories/8.jpg', 'project-assets/images/categories/icons/education-schools.png', 'Education', NULL, NULL, NULL, NULL, 'Business', 1, '2019-05-14 07:47:38', '2019-05-14 07:47:38'),
(15, 'project-assets/images/categories/8.jpg', NULL, 'Schools', 14, NULL, NULL, NULL, 'Business', 1, '2019-05-14 07:47:39', '2019-05-14 07:47:39'),
(16, 'project-assets/images/categories/8.jpg', NULL, 'colleges', 14, NULL, NULL, NULL, 'Business', 1, '2019-05-14 07:47:39', '2019-05-14 07:47:39'),
(17, 'project-assets/images/categories/8.jpg', NULL, 'universities', 14, NULL, NULL, NULL, 'Business', 1, '2019-05-14 07:47:39', '2019-05-14 07:47:39'),
(18, 'project-assets/images/categories/8.jpg', NULL, 'short courses', 14, NULL, NULL, NULL, 'Business', 1, '2019-05-14 07:47:39', '2019-05-14 07:47:39'),
(19, 'project-assets/images/categories/8.jpg', NULL, 'Madarsas', 14, NULL, NULL, NULL, 'Business', 1, '2019-05-14 07:47:39', '2019-05-14 07:47:39'),
(20, 'project-assets/images/categories/8.jpg', 'project-assets/images/categories/icons/Health-Fitness-Hospitals.png', 'Health & Fitness', NULL, NULL, NULL, NULL, 'Business', 1, '2019-05-14 07:47:39', '2019-05-14 07:47:39'),
(21, 'project-assets/images/categories/8.jpg', NULL, 'Hospitals', 20, NULL, NULL, NULL, 'Business', 1, '2019-05-14 07:47:39', '2019-05-14 07:47:39'),
(22, 'project-assets/images/categories/8.jpg', NULL, 'Clinics', 20, NULL, NULL, NULL, 'Business', 1, '2019-05-14 07:47:39', '2019-05-14 07:47:39'),
(23, 'project-assets/images/categories/8.jpg', NULL, 'Doctors Medical stores', 20, NULL, NULL, NULL, 'Business', 1, '2019-05-14 07:47:40', '2019-05-14 07:47:40'),
(24, 'project-assets/images/categories/8.jpg', NULL, 'Fitness-Gym Centers', 20, NULL, NULL, NULL, 'Business', 1, '2019-05-14 07:47:40', '2019-05-14 07:47:40'),
(25, 'project-assets/images/categories/8.jpg', 'project-assets/images/categories/icons/Real-Estate-Services.png', 'Real Estate & Services', NULL, NULL, NULL, NULL, 'Business', 1, '2019-05-14 07:47:40', '2019-05-14 07:47:40'),
(26, 'project-assets/images/categories/8.jpg', NULL, 'Property Dealers', 25, NULL, NULL, NULL, 'Business', 1, '2019-05-14 07:47:40', '2019-05-14 07:47:40'),
(27, 'project-assets/images/categories/8.jpg', NULL, 'Construction Material', 25, NULL, NULL, NULL, 'Business', 1, '2019-05-14 07:47:40', '2019-05-14 07:47:40'),
(28, 'project-assets/images/categories/8.jpg', NULL, 'House, Office', 25, NULL, NULL, NULL, 'Business', 1, '2019-05-14 07:47:40', '2019-05-14 07:47:40'),
(29, 'project-assets/images/categories/8.jpg', NULL, 'Apartments', 25, NULL, NULL, NULL, 'Business', 1, '2019-05-14 07:47:40', '2019-05-14 07:47:40'),
(30, 'project-assets/images/categories/8.jpg', NULL, 'Plots', 25, NULL, NULL, NULL, 'Business', 1, '2019-05-14 07:47:40', '2019-05-14 07:47:40'),
(31, 'project-assets/images/categories/Doctor.jpg', 'project-assets/images/categories/icons/Doctor.png', 'Doctor', NULL, NULL, NULL, NULL, 'Professionals', 1, '2019-05-14 07:47:40', '2019-05-14 07:47:40'),
(32, 'project-assets/images/categories/techer.jpg', 'project-assets/images/categories/icons/Teacher.png', 'Tutor', NULL, NULL, NULL, NULL, 'Professionals', 1, '2019-05-14 07:47:40', '2019-05-14 07:47:40'),
(33, 'project-assets/images/categories/Cook.jpg', 'project-assets/images/categories/icons/Writer.png', 'Cook', NULL, NULL, NULL, NULL, 'Professionals', 1, '2019-05-14 07:47:41', '2019-05-14 07:47:41'),
(34, 'project-assets/images/categories/tailor.jpg', 'project-assets/images/categories/icons/Tailor.png', 'Tailor', NULL, NULL, NULL, NULL, 'Professionals', 1, '2019-05-14 07:47:41', '2019-05-14 07:47:41'),
(35, 'project-assets/images/categories/plumber.jpg', 'project-assets/images/categories/icons/Plumber.png', 'Plumber', NULL, NULL, NULL, NULL, 'Professionals', 1, '2019-05-14 07:47:41', '2019-05-14 07:47:41'),
(36, 'project-assets/images/categories/Electronation.jpg', 'project-assets/images/categories/icons/Electronation.png', 'Electronation', NULL, NULL, NULL, NULL, 'Professionals', 1, '2019-05-14 07:47:41', '2019-05-14 07:47:41'),
(37, 'project-assets/images/categories/technician.jpg', 'project-assets/images/categories/icons/Technician.png', 'Technician', NULL, NULL, NULL, NULL, 'Professionals', 1, '2019-05-14 07:47:41', '2019-05-14 07:47:41'),
(38, 'project-assets/images/categories/Beautician.jpg', 'project-assets/images/categories/icons/Beautician.png', 'Beautician', NULL, NULL, NULL, NULL, 'Professionals', 1, '2019-05-14 07:47:41', '2019-05-14 07:47:41'),
(39, 'project-assets/images/categories/lawyer.jpg', 'project-assets/images/categories/icons/Lawyer.png', 'Lawyer', NULL, NULL, NULL, NULL, 'Professionals', 1, '2019-05-14 07:47:41', '2019-05-14 07:47:41'),
(40, 'project-assets/images/categories/cleaner.jpg', 'project-assets/images/categories/icons/Cleaner.png', 'Cleaner', NULL, NULL, NULL, NULL, 'Professionals', 1, '2019-05-14 07:47:41', '2019-05-14 07:47:41'),
(41, 'project-assets/images/categories/Writer.jpg', 'project-assets/images/categories/icons/Writer.png', 'Writer', NULL, NULL, NULL, NULL, 'Professionals', 1, '2019-05-14 07:47:41', '2019-05-14 07:47:41'),
(42, 'project-assets/images/categories/Painter.jpg', 'project-assets/images/categories/icons/Cleaner.png', 'Painter', NULL, NULL, NULL, NULL, 'Professionals', 1, '2019-05-14 07:47:42', '2019-05-14 07:47:42'),
(43, 'project-assets/images/categories/Hairdresser.jpg', 'project-assets/images/categories/icons/Lawyer.png', 'Hairdresser', NULL, NULL, NULL, NULL, 'Professionals', 1, '2019-05-14 07:47:42', '2019-05-14 07:47:42'),
(44, 'project-assets/images/categories/event-planner.jpg', 'project-assets/images/categories/icons/Beautician.png', 'Event planner', NULL, NULL, NULL, NULL, 'Professionals', 1, '2019-05-14 07:47:42', '2019-05-14 07:47:42'),
(45, 'project-assets/images/categories/Speakers.jpg', 'project-assets/images/categories/icons/Technician.png', 'Speakers', NULL, NULL, NULL, NULL, 'Professionals', 1, '2019-05-14 07:47:42', '2019-05-14 07:47:42'),
(46, 'project-assets/images/categories/Nurse.jpg', 'project-assets/images/categories/icons/Electronation.png', 'Nurse', NULL, NULL, NULL, NULL, 'Professionals', 1, '2019-05-14 07:47:42', '2019-05-14 07:47:42'),
(47, 'project-assets/images/categories/Sales_man.jpg', 'project-assets/images/categories/icons/Writer.png', 'Sales Man', NULL, NULL, NULL, NULL, 'Professionals', 1, '2019-05-14 07:47:42', '2019-05-14 07:47:42'),
(48, 'project-assets/images/categories/shopkeeper.jpg', 'project-assets/images/categories/icons/Writer.png', 'Shopkeeper', NULL, NULL, NULL, NULL, 'Professionals', 1, '2019-05-14 07:47:42', '2019-05-14 07:47:42'),
(49, 'project-assets/images/categories/Gardener.jpg', 'project-assets/images/categories/icons/Writer.png', 'Gardener', NULL, NULL, NULL, NULL, 'Professionals', 1, '2019-05-14 07:47:42', '2019-05-14 07:47:42'),
(50, 'project-assets/images/categories/investors.jpg', 'project-assets/images/categories/icons/Writer.png', 'investor', NULL, NULL, NULL, NULL, 'Professionals', 1, '2019-05-14 07:47:42', '2019-05-14 07:47:42'),
(51, 'project-assets/images/categories/weddinghalls.jpg', NULL, 'Electronic Devices', NULL, NULL, NULL, NULL, 'Adds', 1, '2019-05-14 07:47:43', '2019-05-14 07:47:43'),
(52, 'project-assets/images/categories/weddinghalls.jpg', NULL, 'Mobiles', 51, NULL, 1, NULL, 'Adds', 1, '2019-05-14 07:47:43', '2019-05-14 07:47:43'),
(53, 'project-assets/images/categories/weddinghalls.jpg', NULL, 'Tablets', 51, NULL, 1, NULL, 'Adds', 1, '2019-05-14 07:47:43', '2019-05-14 07:47:43'),
(54, 'project-assets/images/categories/weddinghalls.jpg', NULL, 'Laptops', 51, NULL, 1, NULL, 'Adds', 1, '2019-05-14 07:47:43', '2019-05-14 07:47:43'),
(55, 'project-assets/images/categories/weddinghalls.jpg', NULL, 'Laptops&Notebooks', 54, NULL, NULL, NULL, 'Adds', 1, '2019-05-14 07:47:43', '2019-05-14 07:47:43'),
(56, 'project-assets/images/categories/weddinghalls.jpg', NULL, 'Gaming Laptops', 54, NULL, NULL, NULL, 'Adds', 1, '2019-05-14 07:47:43', '2019-05-14 07:47:43'),
(57, 'project-assets/images/categories/weddinghalls.jpg', NULL, 'Macbooks', 54, NULL, NULL, NULL, 'Adds', 1, '2019-05-14 07:47:43', '2019-05-14 07:47:43'),
(58, 'project-assets/images/categories/weddinghalls.jpg', NULL, 'Desktops', 51, NULL, NULL, NULL, 'Adds', 1, '2019-05-14 07:47:44', '2019-05-14 07:47:44'),
(59, 'project-assets/images/categories/weddinghalls.jpg', NULL, 'All-in-One', 58, NULL, NULL, NULL, 'Adds', 1, '2019-05-14 07:47:44', '2019-05-14 07:47:44'),
(60, 'project-assets/images/categories/weddinghalls.jpg', NULL, 'Gaming Laptops', 58, NULL, NULL, NULL, 'Adds', 1, '2019-05-14 07:47:44', '2019-05-14 07:47:44'),
(61, 'project-assets/images/categories/weddinghalls.jpg', NULL, 'DIY', 58, NULL, NULL, NULL, 'Adds', 1, '2019-05-14 07:47:44', '2019-05-14 07:47:44'),
(62, 'project-assets/images/categories/weddinghalls.jpg', NULL, 'Gaming Consoles', 51, NULL, NULL, NULL, 'Adds', 1, '2019-05-14 07:47:44', '2019-05-14 07:47:44'),
(63, 'project-assets/images/categories/weddinghalls.jpg', NULL, 'PlayStation Consoles', 62, NULL, NULL, NULL, 'Adds', 1, '2019-05-14 07:47:44', '2019-05-14 07:47:44'),
(64, 'project-assets/images/categories/weddinghalls.jpg', NULL, 'PlayStation Games', 62, NULL, NULL, NULL, 'Adds', 1, '2019-05-14 07:47:44', '2019-05-14 07:47:44'),
(65, 'project-assets/images/categories/weddinghalls.jpg', NULL, 'Nintendo Games', 62, NULL, NULL, NULL, 'Adds', 1, '2019-05-14 07:47:44', '2019-05-14 07:47:44'),
(66, 'project-assets/images/categories/weddinghalls.jpg', NULL, 'Xbox Games', 62, NULL, NULL, NULL, 'Adds', 1, '2019-05-14 07:47:44', '2019-05-14 07:47:44'),
(67, 'project-assets/images/categories/weddinghalls.jpg', NULL, 'Action/Video Cameras ', 51, NULL, NULL, NULL, 'Adds', 1, '2019-05-14 07:47:44', '2019-05-14 07:47:44'),
(68, 'project-assets/images/categories/weddinghalls.jpg', NULL, 'Video Camera', 67, NULL, NULL, NULL, 'Adds', 1, '2019-05-14 07:47:45', '2019-05-14 07:47:45'),
(69, 'project-assets/images/categories/weddinghalls.jpg', NULL, 'Security Cameras', 51, NULL, NULL, NULL, 'Adds', 1, '2019-05-14 07:47:45', '2019-05-14 07:47:45'),
(70, 'project-assets/images/categories/weddinghalls.jpg', NULL, 'IP Security Cameras', 69, NULL, NULL, NULL, 'Adds', 1, '2019-05-14 07:47:45', '2019-05-14 07:47:45'),
(71, 'project-assets/images/categories/weddinghalls.jpg', NULL, 'Digital Cameras', 51, NULL, NULL, NULL, 'Adds', 1, '2019-05-14 07:47:45', '2019-05-14 07:47:45'),
(72, 'project-assets/images/categories/weddinghalls.jpg', NULL, 'DSLR ', 71, NULL, NULL, NULL, 'Adds', 1, '2019-05-14 07:47:45', '2019-05-14 07:47:45'),
(73, 'project-assets/images/categories/weddinghalls.jpg', NULL, 'Point& Shoot', 71, NULL, NULL, NULL, 'Adds', 1, '2019-05-14 07:47:45', '2019-05-14 07:47:45'),
(74, 'project-assets/images/categories/weddinghalls.jpg', NULL, 'Instant Camera', 71, NULL, NULL, NULL, 'Adds', 1, '2019-05-14 07:47:45', '2019-05-14 07:47:45'),
(75, 'project-assets/images/categories/weddinghalls.jpg', NULL, 'Electronic Accessories', NULL, NULL, NULL, NULL, 'Adds', 1, '2019-05-14 07:47:45', '2019-05-14 07:47:45'),
(76, 'project-assets/images/categories/weddinghalls.jpg', NULL, 'Mobile Accessories', 75, NULL, 1, NULL, 'Adds', 1, '2019-05-14 07:47:45', '2019-05-14 07:47:45'),
(77, 'project-assets/images/categories/weddinghalls.jpg', NULL, 'Phone Cases', 76, NULL, NULL, NULL, 'Adds', 1, '2019-05-14 07:47:45', '2019-05-14 07:47:45'),
(78, 'project-assets/images/categories/weddinghalls.jpg', NULL, 'Power Banks', 76, NULL, NULL, NULL, 'Adds', 1, '2019-05-14 07:47:45', '2019-05-14 07:47:45'),
(79, 'project-assets/images/categories/weddinghalls.jpg', NULL, 'Cables & Converters', 76, NULL, NULL, NULL, 'Adds', 1, '2019-05-14 07:47:45', '2019-05-14 07:47:45'),
(80, 'project-assets/images/categories/weddinghalls.jpg', NULL, 'Wall Chargers', 76, NULL, NULL, NULL, 'Adds', 1, '2019-05-14 07:47:45', '2019-05-14 07:47:45'),
(81, 'project-assets/images/categories/weddinghalls.jpg', NULL, 'Wireless Chargers', 76, NULL, NULL, NULL, 'Adds', 1, '2019-05-14 07:47:45', '2019-05-14 07:47:45'),
(82, 'project-assets/images/categories/weddinghalls.jpg', NULL, 'Tablet Accessories', 76, NULL, NULL, NULL, 'Adds', 1, '2019-05-14 07:47:45', '2019-05-14 07:47:45'),
(83, 'project-assets/images/categories/weddinghalls.jpg', NULL, 'Parts & Toots', 76, NULL, NULL, NULL, 'Adds', 1, '2019-05-14 07:47:45', '2019-05-14 07:47:45'),
(84, 'project-assets/images/categories/weddinghalls.jpg', NULL, 'Audio', 75, NULL, 1, NULL, 'Adds', 1, '2019-05-14 07:47:45', '2019-05-14 07:47:45'),
(85, 'project-assets/images/categories/weddinghalls.jpg', NULL, 'Headphones & Headsets', 84, NULL, NULL, NULL, 'Adds', 1, '2019-05-14 07:47:46', '2019-05-14 07:47:46'),
(86, 'project-assets/images/categories/weddinghalls.jpg', NULL, 'Home Entertainment', 84, NULL, NULL, NULL, 'Adds', 1, '2019-05-14 07:47:46', '2019-05-14 07:47:46'),
(87, 'project-assets/images/categories/weddinghalls.jpg', NULL, 'Live Sound & Stage Equipm…', 84, NULL, NULL, NULL, 'Adds', 1, '2019-05-14 07:47:46', '2019-05-14 07:47:46'),
(88, 'project-assets/images/categories/weddinghalls.jpg', NULL, 'Portable Players', 84, NULL, NULL, NULL, 'Adds', 1, '2019-05-14 07:47:46', '2019-05-14 07:47:46'),
(89, 'project-assets/images/categories/weddinghalls.jpg', NULL, 'Wearable', 75, NULL, 1, NULL, 'Adds', 1, '2019-05-14 07:47:46', '2019-05-14 07:47:46'),
(90, 'project-assets/images/categories/weddinghalls.jpg', NULL, 'Smartwatches', 89, NULL, NULL, NULL, 'Adds', 1, '2019-05-14 07:47:46', '2019-05-14 07:47:46'),
(91, 'project-assets/images/categories/8.jpg', NULL, 'Bakeries', 2, NULL, NULL, NULL, 'Business', 1, '2019-05-14 07:47:46', '2019-05-14 07:47:46'),
(92, 'project-assets/images/categories/weddinghalls.jpg', NULL, 'PlayStation Controllers', 22, NULL, NULL, NULL, 'Adds', 1, '2019-05-14 07:47:46', '2019-05-14 07:47:46'),
(93, 'project-assets/images/categories/weddinghalls.jpg', NULL, 'Fitness & Activity Trackers', 89, NULL, NULL, NULL, 'Adds', 1, '2019-05-14 07:47:46', '2019-05-14 07:47:46'),
(94, 'project-assets/images/categories/weddinghalls.jpg', NULL, 'Fitness Tracker Accessories', 89, NULL, NULL, NULL, 'Adds', 1, '2019-05-14 07:47:46', '2019-05-14 07:47:46'),
(95, 'project-assets/images/categories/weddinghalls.jpg', NULL, 'Virtual Reality', 89, NULL, NULL, NULL, 'Adds', 1, '2019-05-14 07:47:46', '2019-05-14 07:47:46'),
(96, 'project-assets/images/categories/weddinghalls.jpg', NULL, 'Console Accessories', 75, NULL, NULL, NULL, 'Adds', 1, '2019-05-14 07:47:46', '2019-05-14 07:47:46'),
(97, 'project-assets/images/categories/weddinghalls.jpg', NULL, 'PlayStation Controllers', 96, NULL, NULL, NULL, 'Adds', 1, '2019-05-14 07:47:46', '2019-05-14 07:47:46'),
(98, 'project-assets/images/categories/weddinghalls.jpg', NULL, 'PlayStation Audio&Accesso…', 96, NULL, NULL, NULL, 'Adds', 1, '2019-05-14 07:47:46', '2019-05-14 07:47:46'),
(99, 'project-assets/images/categories/weddinghalls.jpg', NULL, 'Camera Accessories', 75, NULL, NULL, NULL, 'Adds', 1, '2019-05-14 07:47:46', '2019-05-14 07:47:46'),
(100, 'project-assets/images/categories/weddinghalls.jpg', NULL, 'Memory Cards', 99, NULL, NULL, NULL, 'Adds', 1, '2019-05-14 07:47:46', '2019-05-14 07:47:46'),
(101, 'project-assets/images/categories/weddinghalls.jpg', NULL, 'Lenses', 99, NULL, NULL, NULL, 'Adds', 1, '2019-05-14 07:47:46', '2019-05-14 07:47:46'),
(102, 'project-assets/images/categories/weddinghalls.jpg', NULL, 'Tripods & Monopods', 99, NULL, NULL, NULL, 'Adds', 1, '2019-05-14 07:47:47', '2019-05-14 07:47:47'),
(103, 'project-assets/images/categories/weddinghalls.jpg', NULL, 'Camera Cases,Covers and …', 99, NULL, NULL, NULL, 'Adds', 1, '2019-05-14 07:47:47', '2019-05-14 07:47:47'),
(104, 'project-assets/images/categories/weddinghalls.jpg', NULL, 'Action Camera Accessories', 99, NULL, NULL, NULL, 'Adds', 1, '2019-05-14 07:47:47', '2019-05-14 07:47:47'),
(105, 'project-assets/images/categories/weddinghalls.jpg', NULL, 'Lighting & Studio Equipment', 99, NULL, NULL, NULL, 'Adds', 1, '2019-05-14 07:47:47', '2019-05-14 07:47:47'),
(106, 'project-assets/images/categories/weddinghalls.jpg', NULL, 'Batteries', 99, NULL, NULL, NULL, 'Adds', 1, '2019-05-14 07:47:47', '2019-05-14 07:47:47'),
(107, 'project-assets/images/categories/weddinghalls.jpg', NULL, 'Computer Accessories', 75, NULL, NULL, NULL, 'Adds', 1, '2019-05-14 07:47:47', '2019-05-14 07:47:47'),
(108, 'project-assets/images/categories/weddinghalls.jpg', NULL, 'Monitors', 107, NULL, NULL, NULL, 'Adds', 1, '2019-05-14 07:47:47', '2019-05-14 07:47:47'),
(109, 'project-assets/images/categories/weddinghalls.jpg', NULL, 'Keyboards', 107, NULL, NULL, NULL, 'Adds', 1, '2019-05-14 07:47:47', '2019-05-14 07:47:47'),
(110, 'project-assets/images/categories/weddinghalls.jpg', NULL, 'Mice', 107, NULL, NULL, NULL, 'Adds', 1, '2019-05-14 07:47:47', '2019-05-14 07:47:47'),
(111, 'project-assets/images/categories/weddinghalls.jpg', NULL, 'Adapters & Cables', 107, NULL, NULL, NULL, 'Adds', 1, '2019-05-14 07:47:47', '2019-05-14 07:47:47'),
(112, 'project-assets/images/categories/weddinghalls.jpg', NULL, 'Storage', 75, NULL, NULL, NULL, 'Adds', 1, '2019-05-14 07:47:47', '2019-05-14 07:47:47'),
(113, 'project-assets/images/categories/weddinghalls.jpg', NULL, 'External Hard Drives', 112, NULL, NULL, NULL, 'Adds', 1, '2019-05-14 07:47:47', '2019-05-14 07:47:47'),
(114, 'project-assets/images/categories/weddinghalls.jpg', NULL, 'Internal Hard Drives', 112, NULL, NULL, NULL, 'Adds', 1, '2019-05-14 07:47:47', '2019-05-14 07:47:47'),
(115, 'project-assets/images/categories/weddinghalls.jpg', NULL, 'Flash Drives', 112, NULL, NULL, NULL, 'Adds', 1, '2019-05-14 07:47:47', '2019-05-14 07:47:47'),
(116, 'project-assets/images/categories/weddinghalls.jpg', NULL, 'OTG Drives', 112, NULL, NULL, NULL, 'Adds', 1, '2019-05-14 07:47:47', '2019-05-14 07:47:47'),
(117, 'project-assets/images/categories/weddinghalls.jpg', NULL, 'Storage for Mac', 112, NULL, NULL, NULL, 'Adds', 1, '2019-05-14 07:47:47', '2019-05-14 07:47:47'),
(118, 'project-assets/images/categories/weddinghalls.jpg', NULL, 'Printers', 75, NULL, NULL, NULL, 'Adds', 1, '2019-05-14 07:47:47', '2019-05-14 07:47:47'),
(119, 'project-assets/images/categories/weddinghalls.jpg', NULL, 'Printers', 118, NULL, NULL, NULL, 'Adds', 1, '2019-05-14 07:47:48', '2019-05-14 07:47:48'),
(120, 'project-assets/images/categories/weddinghalls.jpg', NULL, 'Ink & Toners', 118, NULL, NULL, NULL, 'Adds', 1, '2019-05-14 07:47:48', '2019-05-14 07:47:48'),
(121, 'project-assets/images/categories/weddinghalls.jpg', NULL, 'Fax Machines', 118, NULL, NULL, NULL, 'Adds', 1, '2019-05-14 07:47:48', '2019-05-14 07:47:48'),
(122, 'project-assets/images/categories/weddinghalls.jpg', NULL, 'Computer Components', 75, NULL, NULL, NULL, 'Adds', 1, '2019-05-14 07:47:48', '2019-05-14 07:47:48'),
(123, 'project-assets/images/categories/weddinghalls.jpg', NULL, 'Graphic Cards', 122, NULL, NULL, NULL, 'Adds', 1, '2019-05-14 07:47:48', '2019-05-14 07:47:48'),
(124, 'project-assets/images/categories/weddinghalls.jpg', NULL, 'Desktop Casings', 122, NULL, NULL, NULL, 'Adds', 1, '2019-05-14 07:47:48', '2019-05-14 07:47:48'),
(125, 'project-assets/images/categories/weddinghalls.jpg', NULL, 'Motherboards', 122, NULL, NULL, NULL, 'Adds', 1, '2019-05-14 07:47:48', '2019-05-14 07:47:48'),
(126, 'project-assets/images/categories/weddinghalls.jpg', NULL, 'Fans & Heatsinks', 122, NULL, NULL, NULL, 'Adds', 1, '2019-05-14 07:47:48', '2019-05-14 07:47:48'),
(127, 'project-assets/images/categories/weddinghalls.jpg', NULL, 'Processors', 122, NULL, NULL, NULL, 'Adds', 1, '2019-05-14 07:47:48', '2019-05-14 07:47:48'),
(128, 'project-assets/images/categories/weddinghalls.jpg', NULL, 'Network Components', 75, NULL, NULL, NULL, 'Adds', 1, '2019-05-14 07:47:48', '2019-05-14 07:47:48'),
(129, 'project-assets/images/categories/weddinghalls.jpg', NULL, 'Access Points', 128, NULL, NULL, NULL, 'Adds', 1, '2019-05-14 07:47:48', '2019-05-14 07:47:48'),
(130, 'project-assets/images/categories/weddinghalls.jpg', NULL, 'TV & Home Appliances', NULL, NULL, NULL, NULL, 'Adds', 1, '2019-05-14 07:47:48', '2019-05-14 07:47:48'),
(131, 'project-assets/images/categories/weddinghalls.jpg', NULL, 'TV & Video Devices', 130, NULL, NULL, NULL, 'Adds', 1, '2019-05-14 07:47:48', '2019-05-14 07:47:48'),
(132, 'project-assets/images/categories/weddinghalls.jpg', NULL, 'Projectors', 131, NULL, NULL, NULL, 'Adds', 1, '2019-05-14 07:47:49', '2019-05-14 07:47:49'),
(133, 'project-assets/images/categories/weddinghalls.jpg', NULL, 'LED Televisions', 131, NULL, NULL, NULL, 'Adds', 1, '2019-05-14 07:47:49', '2019-05-14 07:47:49'),
(134, 'project-assets/images/categories/weddinghalls.jpg', NULL, 'Smart Televisions', 131, NULL, NULL, NULL, 'Adds', 1, '2019-05-14 07:47:49', '2019-05-14 07:47:49'),
(135, 'project-assets/images/categories/weddinghalls.jpg', NULL, 'OLED Televisions ', 131, NULL, NULL, NULL, 'Adds', 1, '2019-05-14 07:47:49', '2019-05-14 07:47:49'),
(136, 'project-assets/images/categories/weddinghalls.jpg', NULL, 'QLED Televisions', 131, NULL, NULL, NULL, 'Adds', 1, '2019-05-14 07:47:49', '2019-05-14 07:47:49'),
(137, 'project-assets/images/categories/weddinghalls.jpg', NULL, 'Other Televisions', 131, NULL, NULL, NULL, 'Adds', 1, '2019-05-14 07:47:49', '2019-05-14 07:47:49'),
(138, 'project-assets/images/categories/weddinghalls.jpg', NULL, 'Processors', 131, NULL, NULL, NULL, 'Adds', 1, '2019-05-14 07:47:49', '2019-05-14 07:47:49'),
(139, 'project-assets/images/categories/weddinghalls.jpg', NULL, 'Blu-Ray/DVD Players', 131, NULL, NULL, NULL, 'Adds', 1, '2019-05-14 07:47:49', '2019-05-14 07:47:49'),
(140, 'project-assets/images/categories/weddinghalls.jpg', NULL, 'Home Audio', 130, NULL, NULL, NULL, 'Adds', 1, '2019-05-14 07:47:49', '2019-05-14 07:47:49'),
(141, 'project-assets/images/categories/weddinghalls.jpg', NULL, 'Soundbars', 140, NULL, NULL, NULL, 'Adds', 1, '2019-05-14 07:47:49', '2019-05-14 07:47:49'),
(142, 'project-assets/images/categories/weddinghalls.jpg', NULL, 'Home Entertainment', 140, NULL, NULL, NULL, 'Adds', 1, '2019-05-14 07:47:49', '2019-05-14 07:47:49'),
(143, 'project-assets/images/categories/weddinghalls.jpg', NULL, 'Portable Players', 140, NULL, NULL, NULL, 'Adds', 1, '2019-05-14 07:47:49', '2019-05-14 07:47:49'),
(144, 'project-assets/images/categories/weddinghalls.jpg', NULL, 'Live Sound&Stage Equipm…', 140, NULL, NULL, NULL, 'Adds', 1, '2019-05-14 07:47:49', '2019-05-14 07:47:49'),
(145, 'project-assets/images/categories/weddinghalls.jpg', NULL, 'TV Accessories', 130, NULL, NULL, NULL, 'Adds', 1, '2019-05-14 07:47:49', '2019-05-14 07:47:49'),
(146, 'project-assets/images/categories/weddinghalls.jpg', NULL, 'TV Receivers', 145, NULL, NULL, NULL, 'Adds', 1, '2019-05-14 07:47:49', '2019-05-14 07:47:49'),
(147, 'project-assets/images/categories/weddinghalls.jpg', NULL, 'Wall Mounts & Protectors', 145, NULL, NULL, NULL, 'Adds', 1, '2019-05-14 07:47:50', '2019-05-14 07:47:50'),
(148, 'project-assets/images/categories/weddinghalls.jpg', NULL, 'Large Appliances', 130, NULL, NULL, NULL, 'Adds', 1, '2019-05-14 07:47:50', '2019-05-14 07:47:50'),
(149, 'project-assets/images/categories/weddinghalls.jpg', NULL, 'Washing Machines', 148, NULL, NULL, NULL, 'Adds', 1, '2019-05-14 07:47:50', '2019-05-14 07:47:50'),
(150, 'project-assets/images/categories/weddinghalls.jpg', NULL, 'Refrigerators', 148, NULL, NULL, NULL, 'Adds', 1, '2019-05-14 07:47:50', '2019-05-14 07:47:50'),
(151, 'project-assets/images/categories/weddinghalls.jpg', NULL, 'Microwave', 148, NULL, NULL, NULL, 'Adds', 1, '2019-05-14 07:47:50', '2019-05-14 07:47:50'),
(152, 'project-assets/images/categories/weddinghalls.jpg', NULL, 'Oven', 148, NULL, NULL, NULL, 'Adds', 1, '2019-05-14 07:47:50', '2019-05-14 07:47:50'),
(153, 'project-assets/images/categories/weddinghalls.jpg', NULL, 'Freezer', 148, NULL, NULL, NULL, 'Adds', 1, '2019-05-14 07:47:50', '2019-05-14 07:47:50'),
(154, 'project-assets/images/categories/weddinghalls.jpg', NULL, 'Cooktop & Range', 148, NULL, NULL, NULL, 'Adds', 1, '2019-05-14 07:47:50', '2019-05-14 07:47:50'),
(155, 'project-assets/images/categories/weddinghalls.jpg', NULL, 'Water Heater', 148, NULL, NULL, NULL, 'Adds', 1, '2019-05-14 07:47:50', '2019-05-14 07:47:50'),
(156, 'project-assets/images/categories/weddinghalls.jpg', NULL, 'Small Kitchen Appliances', 130, NULL, NULL, NULL, 'Adds', 1, '2019-05-14 07:47:50', '2019-05-14 07:47:50'),
(157, 'project-assets/images/categories/weddinghalls.jpg', NULL, 'Rice Cooker', 156, NULL, NULL, NULL, 'Adds', 1, '2019-05-14 07:47:50', '2019-05-14 07:47:50'),
(158, 'project-assets/images/categories/weddinghalls.jpg', NULL, 'Blender,Mixer & Grinder', 156, NULL, NULL, NULL, 'Adds', 1, '2019-05-14 07:47:50', '2019-05-14 07:47:50'),
(159, 'project-assets/images/categories/weddinghalls.jpg', NULL, 'Electric Kettle', 156, NULL, NULL, NULL, 'Adds', 1, '2019-05-14 07:47:50', '2019-05-14 07:47:50'),
(160, 'project-assets/images/categories/weddinghalls.jpg', NULL, 'Juicer & Fruit Extraction', 156, NULL, NULL, NULL, 'Adds', 1, '2019-05-14 07:47:50', '2019-05-14 07:47:50'),
(161, 'project-assets/images/categories/weddinghalls.jpg', NULL, 'Fryer', 156, NULL, NULL, NULL, 'Adds', 1, '2019-05-14 07:47:50', '2019-05-14 07:47:50'),
(162, 'project-assets/images/categories/weddinghalls.jpg', NULL, 'Water Purifier', 156, NULL, NULL, NULL, 'Adds', 1, '2019-05-14 07:47:50', '2019-05-14 07:47:50'),
(163, 'project-assets/images/categories/weddinghalls.jpg', NULL, 'Pressure Cookers', 156, NULL, NULL, NULL, 'Adds', 1, '2019-05-14 07:47:51', '2019-05-14 07:47:51'),
(164, 'project-assets/images/categories/weddinghalls.jpg', NULL, 'Specialty Cookware', 156, NULL, NULL, NULL, 'Adds', 1, '2019-05-14 07:47:51', '2019-05-14 07:47:51'),
(165, 'project-assets/images/categories/weddinghalls.jpg', NULL, 'Cooking & Air Treatment', 130, NULL, NULL, NULL, 'Adds', 1, '2019-05-14 07:47:51', '2019-05-14 07:47:51'),
(166, 'project-assets/images/categories/weddinghalls.jpg', NULL, 'Fun', 165, NULL, NULL, NULL, 'Adds', 1, '2019-05-14 07:47:51', '2019-05-14 07:47:51'),
(167, 'project-assets/images/categories/weddinghalls.jpg', NULL, 'Air Conditioner', 165, NULL, NULL, NULL, 'Adds', 1, '2019-05-14 07:47:51', '2019-05-14 07:47:51'),
(168, 'project-assets/images/categories/weddinghalls.jpg', NULL, 'Air Cooler', 165, NULL, NULL, NULL, 'Adds', 1, '2019-05-14 07:47:51', '2019-05-14 07:47:51'),
(169, 'project-assets/images/categories/weddinghalls.jpg', NULL, 'Air Purifier', 165, NULL, NULL, NULL, 'Adds', 1, '2019-05-14 07:47:51', '2019-05-14 07:47:51'),
(170, 'project-assets/images/categories/weddinghalls.jpg', NULL, 'Dehumidifier', 165, NULL, NULL, NULL, 'Adds', 1, '2019-05-14 07:47:51', '2019-05-14 07:47:51'),
(171, 'project-assets/images/categories/weddinghalls.jpg', NULL, 'Humidifier', 165, NULL, NULL, NULL, 'Adds', 1, '2019-05-14 07:47:51', '2019-05-14 07:47:51'),
(172, 'project-assets/images/categories/weddinghalls.jpg', NULL, 'Vacuums & Floor Care', 130, NULL, NULL, NULL, 'Adds', 1, '2019-05-14 07:47:51', '2019-05-14 07:47:51'),
(173, 'project-assets/images/categories/weddinghalls.jpg', NULL, 'Vacuum Cleaner ', 172, NULL, NULL, NULL, 'Adds', 1, '2019-05-14 07:47:51', '2019-05-14 07:47:51'),
(174, 'project-assets/images/categories/weddinghalls.jpg', NULL, 'Floor Polisher', 172, NULL, NULL, NULL, 'Adds', 1, '2019-05-14 07:47:51', '2019-05-14 07:47:51'),
(175, 'project-assets/images/categories/weddinghalls.jpg', NULL, 'Vacuum Cleaner Parts', 172, NULL, NULL, NULL, 'Adds', 1, '2019-05-14 07:47:51', '2019-05-14 07:47:51'),
(176, 'project-assets/images/categories/weddinghalls.jpg', NULL, 'Iron & Garment Care', 130, NULL, NULL, NULL, 'Adds', 1, '2019-05-14 07:47:51', '2019-05-14 07:47:51'),
(177, 'project-assets/images/categories/weddinghalls.jpg', NULL, 'Irons', 176, NULL, NULL, NULL, 'Adds', 1, '2019-05-14 07:47:51', '2019-05-14 07:47:51'),
(178, 'project-assets/images/categories/weddinghalls.jpg', NULL, 'Garment steamer', 176, NULL, NULL, NULL, 'Adds', 1, '2019-05-14 07:47:51', '2019-05-14 07:47:51'),
(179, 'project-assets/images/categories/weddinghalls.jpg', NULL, 'Sewing Machine', 176, NULL, NULL, NULL, 'Adds', 1, '2019-05-14 07:47:51', '2019-05-14 07:47:51'),
(180, 'project-assets/images/categories/weddinghalls.jpg', NULL, 'Personal Care Appliances', 130, NULL, NULL, NULL, 'Adds', 1, '2019-05-14 07:47:52', '2019-05-14 07:47:52'),
(181, 'project-assets/images/categories/weddinghalls.jpg', NULL, 'Hair Dryer & Styling', 180, NULL, NULL, NULL, 'Adds', 1, '2019-05-14 07:47:52', '2019-05-14 07:47:52'),
(182, 'project-assets/images/categories/weddinghalls.jpg', NULL, 'Grooming Appliance', 180, NULL, NULL, NULL, 'Adds', 1, '2019-05-14 07:47:52', '2019-05-14 07:47:52'),
(183, 'project-assets/images/categories/weddinghalls.jpg', NULL, 'Air Purifier', 180, NULL, NULL, NULL, 'Adds', 1, '2019-05-14 07:47:52', '2019-05-14 07:47:52'),
(184, 'project-assets/images/categories/weddinghalls.jpg', NULL, 'Health & Beauty', NULL, NULL, NULL, NULL, 'Adds', 1, '2019-05-14 07:47:52', '2019-05-14 07:47:52'),
(185, 'project-assets/images/categories/weddinghalls.jpg', NULL, 'Bath & Body', 184, NULL, NULL, NULL, 'Adds', 1, '2019-05-14 07:47:52', '2019-05-14 07:47:52'),
(186, 'project-assets/images/categories/weddinghalls.jpg', NULL, 'Body & Massage Oils', 185, NULL, NULL, NULL, 'Adds', 1, '2019-05-14 07:47:52', '2019-05-14 07:47:52'),
(187, 'project-assets/images/categories/weddinghalls.jpg', NULL, 'Body Soaps & Shower Gels', 185, NULL, NULL, NULL, 'Adds', 1, '2019-05-14 07:47:52', '2019-05-14 07:47:52'),
(188, 'project-assets/images/categories/weddinghalls.jpg', NULL, 'Foot Care', 185, NULL, NULL, NULL, 'Adds', 1, '2019-05-14 07:47:52', '2019-05-14 07:47:52'),
(189, 'project-assets/images/categories/weddinghalls.jpg', NULL, 'Hair Removal', 185, NULL, NULL, NULL, 'Adds', 1, '2019-05-14 07:47:52', '2019-05-14 07:47:52'),
(190, 'project-assets/images/categories/weddinghalls.jpg', NULL, 'Hand Care', 185, NULL, NULL, NULL, 'Adds', 1, '2019-05-14 07:47:52', '2019-05-14 07:47:52'),
(191, 'project-assets/images/categories/weddinghalls.jpg', NULL, 'Beauty Tools', 184, NULL, NULL, NULL, 'Adds', 1, '2019-05-14 07:47:52', '2019-05-14 07:47:52'),
(192, 'project-assets/images/categories/weddinghalls.jpg', NULL, 'Curling Irons & Wands', 191, NULL, NULL, NULL, 'Adds', 1, '2019-05-14 07:47:52', '2019-05-14 07:47:52'),
(193, 'project-assets/images/categories/weddinghalls.jpg', NULL, 'Flat Irons', 191, NULL, NULL, NULL, 'Adds', 1, '2019-05-14 07:47:53', '2019-05-14 07:47:53'),
(194, 'project-assets/images/categories/weddinghalls.jpg', NULL, 'Multi-stylers', 191, NULL, NULL, NULL, 'Adds', 1, '2019-05-14 07:47:53', '2019-05-14 07:47:53'),
(195, 'project-assets/images/categories/weddinghalls.jpg', NULL, 'Hair Dryers', 191, NULL, NULL, NULL, 'Adds', 1, '2019-05-14 07:47:53', '2019-05-14 07:47:53'),
(196, 'project-assets/images/categories/weddinghalls.jpg', NULL, 'Hair Removal Appliances', 191, NULL, NULL, NULL, 'Adds', 1, '2019-05-14 07:47:53', '2019-05-14 07:47:53'),
(197, 'project-assets/images/categories/weddinghalls.jpg', NULL, 'Fragrances', 184, NULL, NULL, NULL, 'Adds', 1, '2019-05-14 07:47:53', '2019-05-14 07:47:53'),
(198, 'project-assets/images/categories/weddinghalls.jpg', NULL, 'Women Fragrances', 197, NULL, NULL, NULL, 'Adds', 1, '2019-05-14 07:47:53', '2019-05-14 07:47:53'),
(199, 'project-assets/images/categories/weddinghalls.jpg', NULL, 'Man Fragrances', 197, NULL, NULL, NULL, 'Adds', 1, '2019-05-14 07:47:53', '2019-05-14 07:47:53'),
(200, 'project-assets/images/categories/weddinghalls.jpg', NULL, 'Hair Care', 184, NULL, NULL, NULL, 'Adds', 1, '2019-05-14 07:47:53', '2019-05-14 07:47:53'),
(201, 'project-assets/images/categories/weddinghalls.jpg', NULL, 'Shampoo', 200, NULL, NULL, NULL, 'Adds', 1, '2019-05-14 07:47:53', '2019-05-14 07:47:53'),
(202, 'project-assets/images/categories/weddinghalls.jpg', NULL, 'Hair Treatments', 200, NULL, NULL, NULL, 'Adds', 1, '2019-05-14 07:47:53', '2019-05-14 07:47:53'),
(203, 'project-assets/images/categories/weddinghalls.jpg', NULL, 'Hair Accessories', 200, NULL, NULL, NULL, 'Adds', 1, '2019-05-14 07:47:53', '2019-05-14 07:47:53'),
(204, 'project-assets/images/categories/weddinghalls.jpg', NULL, 'Hair Care Accessories', 200, NULL, NULL, NULL, 'Adds', 1, '2019-05-14 07:47:53', '2019-05-14 07:47:53'),
(205, 'project-assets/images/categories/weddinghalls.jpg', NULL, 'Hair Brushes & Combs', 200, NULL, NULL, NULL, 'Adds', 1, '2019-05-14 07:47:53', '2019-05-14 07:47:53'),
(206, 'project-assets/images/categories/weddinghalls.jpg', NULL, 'Hair Coloring', 200, NULL, NULL, NULL, 'Adds', 1, '2019-05-14 07:47:53', '2019-05-14 07:47:53'),
(207, 'project-assets/images/categories/weddinghalls.jpg', NULL, 'Hair Conditioner', 200, NULL, NULL, NULL, 'Adds', 1, '2019-05-14 07:47:53', '2019-05-14 07:47:53'),
(208, 'project-assets/images/categories/weddinghalls.jpg', NULL, 'Hair Styling', 200, NULL, NULL, NULL, 'Adds', 1, '2019-05-14 07:47:53', '2019-05-14 07:47:53'),
(209, 'project-assets/images/categories/weddinghalls.jpg', NULL, 'wig & Hair Extensions & Pads ', 200, NULL, NULL, NULL, 'Adds', 1, '2019-05-14 07:47:54', '2019-05-14 07:47:54'),
(210, 'project-assets/images/categories/weddinghalls.jpg', NULL, 'Makeup', 184, NULL, NULL, NULL, 'Adds', 1, '2019-05-14 07:47:54', '2019-05-14 07:47:54'),
(211, 'project-assets/images/categories/weddinghalls.jpg', NULL, 'Foundation', 210, NULL, NULL, NULL, 'Adds', 1, '2019-05-14 07:47:54', '2019-05-14 07:47:54'),
(212, 'project-assets/images/categories/weddinghalls.jpg', NULL, 'Lips', 210, NULL, NULL, NULL, 'Adds', 1, '2019-05-14 07:47:54', '2019-05-14 07:47:54'),
(213, 'project-assets/images/categories/weddinghalls.jpg', NULL, 'Eyes', 210, NULL, NULL, NULL, 'Adds', 1, '2019-05-14 07:47:54', '2019-05-14 07:47:54'),
(214, 'project-assets/images/categories/weddinghalls.jpg', NULL, 'Nails', 210, NULL, NULL, NULL, 'Adds', 1, '2019-05-14 07:47:54', '2019-05-14 07:47:54'),
(215, 'project-assets/images/categories/weddinghalls.jpg', NULL, 'Brushes & Sets', 210, NULL, NULL, NULL, 'Adds', 1, '2019-05-14 07:47:54', '2019-05-14 07:47:54'),
(216, 'project-assets/images/categories/weddinghalls.jpg', NULL, 'Makeup Accessories', 210, NULL, NULL, NULL, 'Adds', 1, '2019-05-14 07:47:54', '2019-05-14 07:47:54'),
(217, 'project-assets/images/categories/weddinghalls.jpg', NULL, 'Makeup Removers', 210, NULL, NULL, NULL, 'Adds', 1, '2019-05-14 07:47:54', '2019-05-14 07:47:54'),
(218, 'project-assets/images/categories/weddinghalls.jpg', NULL, 'Men\'s Care', 184, NULL, NULL, NULL, 'Adds', 1, '2019-05-14 07:47:54', '2019-05-14 07:47:54'),
(219, 'project-assets/images/categories/weddinghalls.jpg', NULL, 'Bath & Body', 218, NULL, NULL, NULL, 'Adds', 1, '2019-05-14 07:47:54', '2019-05-14 07:47:54'),
(220, 'project-assets/images/categories/weddinghalls.jpg', NULL, 'Condoms', 218, NULL, NULL, NULL, 'Adds', 1, '2019-05-14 07:47:54', '2019-05-14 07:47:54'),
(221, 'project-assets/images/categories/weddinghalls.jpg', NULL, 'Hair Care', 218, NULL, NULL, NULL, 'Adds', 1, '2019-05-14 07:47:54', '2019-05-14 07:47:54'),
(222, 'project-assets/images/categories/weddinghalls.jpg', NULL, 'Hair Dryers', 218, NULL, NULL, NULL, 'Adds', 1, '2019-05-14 07:47:54', '2019-05-14 07:47:54'),
(223, 'project-assets/images/categories/weddinghalls.jpg', NULL, 'Shaving & Grooming', 218, NULL, NULL, NULL, 'Adds', 1, '2019-05-14 07:47:54', '2019-05-14 07:47:54'),
(224, 'project-assets/images/categories/weddinghalls.jpg', NULL, 'Sports Nutrition', 218, NULL, NULL, NULL, 'Adds', 1, '2019-05-14 07:47:54', '2019-05-14 07:47:54'),
(225, 'project-assets/images/categories/weddinghalls.jpg', NULL, 'Personal Care', 184, NULL, NULL, NULL, 'Adds', 1, '2019-05-14 07:47:54', '2019-05-14 07:47:54'),
(226, 'project-assets/images/categories/weddinghalls.jpg', NULL, 'Oral Care', 225, NULL, NULL, NULL, 'Adds', 1, '2019-05-14 07:47:54', '2019-05-14 07:47:54'),
(227, 'project-assets/images/categories/weddinghalls.jpg', NULL, 'Sexual Wellness', 225, NULL, NULL, NULL, 'Adds', 1, '2019-05-14 07:47:54', '2019-05-14 07:47:54'),
(228, 'project-assets/images/categories/weddinghalls.jpg', NULL, 'Skin Care', 184, NULL, NULL, NULL, 'Adds', 1, '2019-05-14 07:47:55', '2019-05-14 07:47:55'),
(229, 'project-assets/images/categories/weddinghalls.jpg', NULL, 'Serum & Essence', 228, NULL, NULL, NULL, 'Adds', 1, '2019-05-14 07:47:55', '2019-05-14 07:47:55'),
(230, 'project-assets/images/categories/weddinghalls.jpg', NULL, 'Dermacare', 228, NULL, NULL, NULL, 'Adds', 1, '2019-05-14 07:47:55', '2019-05-14 07:47:55'),
(231, 'project-assets/images/categories/weddinghalls.jpg', NULL, 'Face Scrubs & Exfoliators', 228, NULL, NULL, NULL, 'Adds', 1, '2019-05-14 07:47:55', '2019-05-14 07:47:55'),
(232, 'project-assets/images/categories/weddinghalls.jpg', NULL, 'Facial Cleansers', 228, NULL, NULL, NULL, 'Adds', 1, '2019-05-14 07:47:55', '2019-05-14 07:47:55'),
(233, 'project-assets/images/categories/weddinghalls.jpg', NULL, 'Suncreem & Aftersun', 228, NULL, NULL, NULL, 'Adds', 1, '2019-05-14 07:47:55', '2019-05-14 07:47:55'),
(234, 'project-assets/images/categories/weddinghalls.jpg', NULL, 'Food Supplements', 184, NULL, NULL, NULL, 'Adds', 1, '2019-05-14 07:47:55', '2019-05-14 07:47:55'),
(235, 'project-assets/images/categories/weddinghalls.jpg', NULL, 'Beauty Supplements', 234, NULL, NULL, NULL, 'Adds', 1, '2019-05-14 07:47:55', '2019-05-14 07:47:55'),
(236, 'project-assets/images/categories/weddinghalls.jpg', NULL, 'Multivitamins', 234, NULL, NULL, NULL, 'Adds', 1, '2019-05-14 07:47:55', '2019-05-14 07:47:55'),
(237, 'project-assets/images/categories/weddinghalls.jpg', NULL, 'Sports Nutrition', 234, NULL, NULL, NULL, 'Adds', 1, '2019-05-14 07:47:55', '2019-05-14 07:47:55'),
(238, 'project-assets/images/categories/weddinghalls.jpg', NULL, 'Weight Management', 234, NULL, NULL, NULL, 'Adds', 1, '2019-05-14 07:47:55', '2019-05-14 07:47:55'),
(239, 'project-assets/images/categories/weddinghalls.jpg', NULL, 'Well Being', 234, NULL, NULL, NULL, 'Adds', 1, '2019-05-14 07:47:55', '2019-05-14 07:47:55'),
(240, 'project-assets/images/categories/weddinghalls.jpg', NULL, 'Medical Supplies', 184, NULL, NULL, NULL, 'Adds', 1, '2019-05-14 07:47:55', '2019-05-14 07:47:55'),
(241, 'project-assets/images/categories/weddinghalls.jpg', NULL, 'First Aid Supplies', 240, NULL, NULL, NULL, 'Adds', 1, '2019-05-14 07:47:55', '2019-05-14 07:47:55'),
(242, 'project-assets/images/categories/weddinghalls.jpg', NULL, 'Health Monitors & Tests', 240, NULL, NULL, NULL, 'Adds', 1, '2019-05-14 07:47:55', '2019-05-14 07:47:55'),
(243, 'project-assets/images/categories/weddinghalls.jpg', NULL, 'Babies & Toys', NULL, NULL, NULL, NULL, 'Adds', 1, '2019-05-14 07:47:55', '2019-05-14 07:47:55'),
(244, 'project-assets/images/categories/weddinghalls.jpg', NULL, 'Baby Gear', 243, NULL, NULL, NULL, 'Adds', 1, '2019-05-14 07:47:55', '2019-05-14 07:47:55'),
(245, 'project-assets/images/categories/weddinghalls.jpg', NULL, 'Baby Walkers', 244, NULL, NULL, NULL, 'Adds', 1, '2019-05-14 07:47:55', '2019-05-14 07:47:55'),
(246, 'project-assets/images/categories/weddinghalls.jpg', NULL, 'Backpacks & Carriers', 244, NULL, NULL, NULL, 'Adds', 1, '2019-05-14 07:47:56', '2019-05-14 07:47:56'),
(247, 'project-assets/images/categories/weddinghalls.jpg', NULL, 'Car Seats', 244, NULL, NULL, NULL, 'Adds', 1, '2019-05-14 07:47:56', '2019-05-14 07:47:56'),
(248, 'project-assets/images/categories/weddinghalls.jpg', NULL, 'Kids Bag', 244, NULL, NULL, NULL, 'Adds', 1, '2019-05-14 07:47:56', '2019-05-14 07:47:56'),
(249, 'project-assets/images/categories/weddinghalls.jpg', NULL, 'Strollers', 244, NULL, NULL, NULL, 'Adds', 1, '2019-05-14 07:47:56', '2019-05-14 07:47:56'),
(250, 'project-assets/images/categories/weddinghalls.jpg', NULL, 'Swings,Jumpers & Bouncers', 244, NULL, NULL, NULL, 'Adds', 1, '2019-05-14 07:47:56', '2019-05-14 07:47:56'),
(251, 'project-assets/images/categories/weddinghalls.jpg', NULL, 'Baby Personal Care', 243, NULL, NULL, NULL, 'Adds', 1, '2019-05-14 07:47:56', '2019-05-14 07:47:56'),
(252, 'project-assets/images/categories/weddinghalls.jpg', NULL, 'Baby Bath', 251, NULL, NULL, NULL, 'Adds', 1, '2019-05-14 07:47:56', '2019-05-14 07:47:56'),
(253, 'project-assets/images/categories/weddinghalls.jpg', NULL, 'Bathing Tubs & Seats', 251, NULL, NULL, NULL, 'Adds', 1, '2019-05-14 07:47:56', '2019-05-14 07:47:56'),
(254, 'project-assets/images/categories/weddinghalls.jpg', NULL, 'Soap,Cleansers & Bodywa…', 251, NULL, NULL, NULL, 'Adds', 1, '2019-05-14 07:47:56', '2019-05-14 07:47:56'),
(255, 'project-assets/images/categories/weddinghalls.jpg', NULL, 'Clothing & Accessories', 243, NULL, NULL, NULL, 'Adds', 1, '2019-05-14 07:47:56', '2019-05-14 07:47:56'),
(256, 'project-assets/images/categories/weddinghalls.jpg', NULL, 'Girls\' Clothing', 255, NULL, NULL, NULL, 'Adds', 1, '2019-05-14 07:47:56', '2019-05-14 07:47:56'),
(257, 'project-assets/images/categories/weddinghalls.jpg', NULL, 'Girls\'Dresses', 255, NULL, NULL, NULL, 'Adds', 1, '2019-05-14 07:47:56', '2019-05-14 07:47:56'),
(258, 'project-assets/images/categories/weddinghalls.jpg', NULL, 'Girls\'  Shoes', 255, NULL, NULL, NULL, 'Adds', 1, '2019-05-14 07:47:56', '2019-05-14 07:47:56'),
(259, 'project-assets/images/categories/weddinghalls.jpg', NULL, 'Boys\' Clothing', 255, NULL, NULL, NULL, 'Adds', 1, '2019-05-14 07:47:56', '2019-05-14 07:47:56'),
(260, 'project-assets/images/categories/weddinghalls.jpg', NULL, 'New Born Unisex(0-6 month)', 255, NULL, NULL, NULL, 'Adds', 1, '2019-05-14 07:47:56', '2019-05-14 07:47:56'),
(261, 'project-assets/images/categories/weddinghalls.jpg', NULL, 'New Born Sets & Packs', 255, NULL, NULL, NULL, 'Adds', 1, '2019-05-14 07:47:56', '2019-05-14 07:47:56'),
(262, 'project-assets/images/categories/weddinghalls.jpg', NULL, 'Diapering & Potty', 243, NULL, NULL, NULL, 'Adds', 1, '2019-05-14 07:47:56', '2019-05-14 07:47:56'),
(263, 'project-assets/images/categories/weddinghalls.jpg', NULL, 'Cloth Diapers & Accessories', 262, NULL, NULL, NULL, 'Adds', 1, '2019-05-14 07:47:56', '2019-05-14 07:47:56'),
(264, 'project-assets/images/categories/weddinghalls.jpg', NULL, 'Diaper Bags', 262, NULL, NULL, NULL, 'Adds', 1, '2019-05-14 07:47:57', '2019-05-14 07:47:57'),
(265, 'project-assets/images/categories/weddinghalls.jpg', NULL, 'Diaper Creams & Ointments', 262, NULL, NULL, NULL, 'Adds', 1, '2019-05-14 07:47:57', '2019-05-14 07:47:57'),
(266, 'project-assets/images/categories/weddinghalls.jpg', NULL, 'Diapering Care', 262, NULL, NULL, NULL, 'Adds', 1, '2019-05-14 07:47:57', '2019-05-14 07:47:57'),
(267, 'project-assets/images/categories/weddinghalls.jpg', NULL, 'Disposable Diapers', 262, NULL, NULL, NULL, 'Adds', 1, '2019-05-14 07:47:57', '2019-05-14 07:47:57'),
(268, 'project-assets/images/categories/weddinghalls.jpg', NULL, 'Potty Chair', 262, NULL, NULL, NULL, 'Adds', 1, '2019-05-14 07:47:57', '2019-05-14 07:47:57'),
(269, 'project-assets/images/categories/weddinghalls.jpg', NULL, 'Wipes & Holders', 262, NULL, NULL, NULL, 'Adds', 1, '2019-05-14 07:47:57', '2019-05-14 07:47:57'),
(270, 'project-assets/images/categories/weddinghalls.jpg', NULL, 'Feeding', 243, NULL, NULL, NULL, 'Adds', 1, '2019-05-14 07:47:57', '2019-05-14 07:47:57'),
(271, 'project-assets/images/categories/weddinghalls.jpg', NULL, 'Baby & Toddler Foods', 270, NULL, NULL, NULL, 'Adds', 1, '2019-05-14 07:47:57', '2019-05-14 07:47:57'),
(272, 'project-assets/images/categories/weddinghalls.jpg', NULL, 'Milk Formula', 270, NULL, NULL, NULL, 'Adds', 1, '2019-05-14 07:47:57', '2019-05-14 07:47:57'),
(273, 'project-assets/images/categories/weddinghalls.jpg', NULL, 'Utensils', 270, NULL, NULL, NULL, 'Adds', 1, '2019-05-14 07:47:57', '2019-05-14 07:47:57'),
(274, 'project-assets/images/categories/weddinghalls.jpg', NULL, 'Nursery', 243, NULL, NULL, NULL, 'Adds', 1, '2019-05-14 07:47:57', '2019-05-14 07:47:57'),
(275, 'project-assets/images/categories/weddinghalls.jpg', NULL, 'Baby Furniture', 274, NULL, NULL, NULL, 'Adds', 1, '2019-05-14 07:47:57', '2019-05-14 07:47:57'),
(276, 'project-assets/images/categories/weddinghalls.jpg', NULL, 'Mattresses & Bedding', 274, NULL, NULL, NULL, 'Adds', 1, '2019-05-14 07:47:57', '2019-05-14 07:47:57'),
(277, 'project-assets/images/categories/weddinghalls.jpg', NULL, 'Sanitizers', 274, NULL, NULL, NULL, 'Adds', 1, '2019-05-14 07:47:57', '2019-05-14 07:47:57'),
(278, 'project-assets/images/categories/weddinghalls.jpg', NULL, 'Baby&Toddler Toys', 243, NULL, NULL, NULL, 'Adds', 1, '2019-05-14 07:47:57', '2019-05-14 07:47:57'),
(279, 'project-assets/images/categories/weddinghalls.jpg', NULL, 'Activity Gym & Playmats', 278, NULL, NULL, NULL, 'Adds', 1, '2019-05-14 07:47:57', '2019-05-14 07:47:57'),
(280, 'project-assets/images/categories/weddinghalls.jpg', NULL, 'Basic & Life Skills Toys', 278, NULL, NULL, NULL, 'Adds', 1, '2019-05-14 07:47:57', '2019-05-14 07:47:57'),
(281, 'project-assets/images/categories/weddinghalls.jpg', NULL, 'Bath Toys', 278, NULL, NULL, NULL, 'Adds', 1, '2019-05-14 07:47:57', '2019-05-14 07:47:57'),
(282, 'project-assets/images/categories/weddinghalls.jpg', NULL, 'Building Blocks Toys', 278, NULL, NULL, NULL, 'Adds', 1, '2019-05-14 07:47:57', '2019-05-14 07:47:57'),
(283, 'project-assets/images/categories/weddinghalls.jpg', NULL, 'Crib Toys & Attachments', 278, NULL, NULL, NULL, 'Adds', 1, '2019-05-14 07:47:58', '2019-05-14 07:47:58'),
(284, 'project-assets/images/categories/weddinghalls.jpg', NULL, 'Early Development Toys', 278, NULL, NULL, NULL, 'Adds', 1, '2019-05-14 07:47:58', '2019-05-14 07:47:58'),
(285, 'project-assets/images/categories/weddinghalls.jpg', NULL, 'Reading & Writing', 278, NULL, NULL, NULL, 'Adds', 1, '2019-05-14 07:47:58', '2019-05-14 07:47:58'),
(286, 'project-assets/images/categories/weddinghalls.jpg', NULL, 'Toys & games', 243, NULL, NULL, NULL, 'Adds', 1, '2019-05-14 07:47:58', '2019-05-14 07:47:58'),
(287, 'project-assets/images/categories/weddinghalls.jpg', NULL, 'Activity Gym & Playmats', 243, NULL, NULL, NULL, 'Adds', 1, '2019-05-14 07:47:58', '2019-05-14 07:47:58'),
(288, 'project-assets/images/categories/weddinghalls.jpg', NULL, 'Basic & Life Skills Toys', 243, NULL, NULL, NULL, 'Adds', 1, '2019-05-14 07:47:58', '2019-05-14 07:47:58'),
(289, 'project-assets/images/categories/weddinghalls.jpg', NULL, 'Bath Toys', 243, NULL, NULL, NULL, 'Adds', 1, '2019-05-14 07:47:58', '2019-05-14 07:47:58'),
(290, 'project-assets/images/categories/weddinghalls.jpg', NULL, 'Building Blocks Toys', 243, NULL, NULL, NULL, 'Adds', 1, '2019-05-14 07:47:58', '2019-05-14 07:47:58'),
(291, 'project-assets/images/categories/weddinghalls.jpg', NULL, 'Crib Toys & Attachments', 243, NULL, NULL, NULL, 'Adds', 1, '2019-05-14 07:47:58', '2019-05-14 07:47:58'),
(292, 'project-assets/images/categories/weddinghalls.jpg', NULL, 'Early Development Toys', 243, NULL, NULL, NULL, 'Adds', 1, '2019-05-14 07:47:58', '2019-05-14 07:47:58'),
(293, 'project-assets/images/categories/weddinghalls.jpg', NULL, 'Indoor Climbers & Structures', 243, NULL, NULL, NULL, 'Adds', 1, '2019-05-14 07:47:58', '2019-05-14 07:47:58'),
(294, 'project-assets/images/categories/weddinghalls.jpg', NULL, 'Reading & Writing', 243, NULL, NULL, NULL, 'Adds', 1, '2019-05-14 07:47:58', '2019-05-14 07:47:58'),
(295, 'project-assets/images/categories/weddinghalls.jpg', NULL, 'Remote Control', 243, NULL, NULL, NULL, 'Adds', 1, '2019-05-14 07:47:58', '2019-05-14 07:47:58'),
(296, 'project-assets/images/categories/weddinghalls.jpg', NULL, 'Die-Cast Vehicles', 295, NULL, NULL, NULL, 'Adds', 1, '2019-05-14 07:47:58', '2019-05-14 07:47:58'),
(297, 'project-assets/images/categories/weddinghalls.jpg', NULL, 'Drones & Accessories', 295, NULL, NULL, NULL, 'Adds', 1, '2019-05-14 07:47:58', '2019-05-14 07:47:58'),
(298, 'project-assets/images/categories/weddinghalls.jpg', NULL, 'Play Trains & Railway Sets', 295, NULL, NULL, NULL, 'Adds', 1, '2019-05-14 07:47:58', '2019-05-14 07:47:58'),
(299, 'project-assets/images/categories/weddinghalls.jpg', NULL, 'Play Vehicles', 295, NULL, NULL, NULL, 'Adds', 1, '2019-05-14 07:47:58', '2019-05-14 07:47:58'),
(300, 'project-assets/images/categories/weddinghalls.jpg', NULL, 'Sports&Outdoor Play', 243, NULL, NULL, NULL, 'Adds', 1, '2019-05-14 07:47:58', '2019-05-14 07:47:58');
INSERT INTO `categories` (`id`, `profile_image`, `icon_image`, `name`, `parent_id`, `is_ad_additional_fields_req`, `is_ad_type_or_make_req`, `is_ad_condition_req`, `type`, `is_active`, `created_at`, `updated_at`) VALUES
(301, 'project-assets/images/categories/weddinghalls.jpg', NULL, 'Inflatable Bouncers', 300, NULL, NULL, NULL, 'Adds', 1, '2019-05-14 07:47:58', '2019-05-14 07:47:58'),
(302, 'project-assets/images/categories/weddinghalls.jpg', NULL, 'Swimming Pool & Water Toys', 300, NULL, NULL, NULL, 'Adds', 1, '2019-05-14 07:47:59', '2019-05-14 07:47:59'),
(303, 'project-assets/images/categories/weddinghalls.jpg', NULL, 'Groceries & Pets', NULL, NULL, NULL, NULL, 'Adds', 1, '2019-05-14 07:47:59', '2019-05-14 07:47:59'),
(304, 'project-assets/images/categories/weddinghalls.jpg', NULL, 'Beverages', 303, NULL, NULL, NULL, 'Adds', 1, '2019-05-14 07:47:59', '2019-05-14 07:47:59'),
(305, 'project-assets/images/categories/weddinghalls.jpg', NULL, 'Coffee', 304, NULL, NULL, NULL, 'Adds', 1, '2019-05-14 07:47:59', '2019-05-14 07:47:59'),
(306, 'project-assets/images/categories/weddinghalls.jpg', NULL, 'Tea', 304, NULL, NULL, NULL, 'Adds', 1, '2019-05-14 07:47:59', '2019-05-14 07:47:59'),
(307, 'project-assets/images/categories/weddinghalls.jpg', NULL, 'Hot Chocolate Drinks', 304, NULL, NULL, NULL, 'Adds', 1, '2019-05-14 07:47:59', '2019-05-14 07:47:59'),
(308, 'project-assets/images/categories/weddinghalls.jpg', NULL, 'UHT,Milk & Milk Powder', 304, NULL, NULL, NULL, 'Adds', 1, '2019-05-14 07:47:59', '2019-05-14 07:47:59'),
(309, 'project-assets/images/categories/weddinghalls.jpg', NULL, 'Powdered Drink Mixes', 304, NULL, NULL, NULL, 'Adds', 1, '2019-05-14 07:47:59', '2019-05-14 07:47:59'),
(310, 'project-assets/images/categories/weddinghalls.jpg', NULL, 'Flavoring Syrups', 304, NULL, NULL, NULL, 'Adds', 1, '2019-05-14 07:47:59', '2019-05-14 07:47:59'),
(311, 'project-assets/images/categories/weddinghalls.jpg', NULL, 'Water', 304, NULL, NULL, NULL, 'Adds', 1, '2019-05-14 07:47:59', '2019-05-14 07:47:59'),
(312, 'project-assets/images/categories/weddinghalls.jpg', NULL, 'Breakfast,Choco&Snacks', 303, NULL, NULL, NULL, 'Adds', 1, '2019-05-14 07:47:59', '2019-05-14 07:47:59'),
(313, 'project-assets/images/categories/weddinghalls.jpg', NULL, 'Biscuit', 312, NULL, NULL, NULL, 'Adds', 1, '2019-05-14 07:47:59', '2019-05-14 07:47:59'),
(314, 'project-assets/images/categories/weddinghalls.jpg', NULL, 'Breakfast Cereals', 312, NULL, NULL, NULL, 'Adds', 1, '2019-05-14 07:48:00', '2019-05-14 07:48:00'),
(315, 'project-assets/images/categories/weddinghalls.jpg', NULL, 'Chocolate', 312, NULL, NULL, NULL, 'Adds', 1, '2019-05-14 07:48:00', '2019-05-14 07:48:00'),
(316, 'project-assets/images/categories/weddinghalls.jpg', NULL, 'Nuts', 312, NULL, NULL, NULL, 'Adds', 1, '2019-05-14 07:48:00', '2019-05-14 07:48:00'),
(317, 'project-assets/images/categories/weddinghalls.jpg', NULL, 'Oatmeals', 312, NULL, NULL, NULL, 'Adds', 1, '2019-05-14 07:48:00', '2019-05-14 07:48:00'),
(318, 'project-assets/images/categories/weddinghalls.jpg', NULL, 'Food Staples', 303, NULL, NULL, NULL, 'Adds', 1, '2019-05-14 07:48:00', '2019-05-14 07:48:00'),
(319, 'project-assets/images/categories/weddinghalls.jpg', NULL, 'Canned Food', 318, NULL, NULL, NULL, 'Adds', 1, '2019-05-14 07:48:00', '2019-05-14 07:48:00'),
(320, 'project-assets/images/categories/weddinghalls.jpg', NULL, 'Condiment Dressing', 318, NULL, NULL, NULL, 'Adds', 1, '2019-05-14 07:48:00', '2019-05-14 07:48:00'),
(321, 'project-assets/images/categories/weddinghalls.jpg', NULL, 'Cooking Ingredients', 318, NULL, NULL, NULL, 'Adds', 1, '2019-05-14 07:48:00', '2019-05-14 07:48:00'),
(322, 'project-assets/images/categories/weddinghalls.jpg', NULL, 'Grains,Beans & Pulses ', 318, NULL, NULL, NULL, 'Adds', 1, '2019-05-14 07:48:00', '2019-05-14 07:48:00'),
(323, 'project-assets/images/categories/weddinghalls.jpg', NULL, 'Home Baking & Suger', 318, NULL, NULL, NULL, 'Adds', 1, '2019-05-14 07:48:00', '2019-05-14 07:48:00'),
(324, 'project-assets/images/categories/weddinghalls.jpg', NULL, 'Instant & Ready-to-Eat', 318, NULL, NULL, NULL, 'Adds', 1, '2019-05-14 07:48:00', '2019-05-14 07:48:00'),
(325, 'project-assets/images/categories/weddinghalls.jpg', NULL, 'Jarred Food', 318, NULL, NULL, NULL, 'Adds', 1, '2019-05-14 07:48:00', '2019-05-14 07:48:00'),
(326, 'project-assets/images/categories/weddinghalls.jpg', NULL, 'Noodles', 318, NULL, NULL, NULL, 'Adds', 1, '2019-05-14 07:48:00', '2019-05-14 07:48:00'),
(327, 'project-assets/images/categories/weddinghalls.jpg', NULL, 'Rice', 318, NULL, NULL, NULL, 'Adds', 1, '2019-05-14 07:48:01', '2019-05-14 07:48:01'),
(328, 'project-assets/images/categories/weddinghalls.jpg', NULL, 'Dairy & Chilled', 303, NULL, NULL, NULL, 'Adds', 1, '2019-05-14 07:48:01', '2019-05-14 07:48:01'),
(329, 'project-assets/images/categories/weddinghalls.jpg', NULL, 'Laundry&Househeld', 303, NULL, NULL, NULL, 'Adds', 1, '2019-05-14 07:48:01', '2019-05-14 07:48:01'),
(330, 'project-assets/images/categories/weddinghalls.jpg', NULL, 'Air Care', 329, NULL, NULL, NULL, 'Adds', 1, '2019-05-14 07:48:01', '2019-05-14 07:48:01'),
(331, 'project-assets/images/categories/weddinghalls.jpg', NULL, 'Cleaning', 329, NULL, NULL, NULL, 'Adds', 1, '2019-05-14 07:48:01', '2019-05-14 07:48:01'),
(332, 'project-assets/images/categories/weddinghalls.jpg', NULL, 'Dishwashing', 329, NULL, NULL, NULL, 'Adds', 1, '2019-05-14 07:48:01', '2019-05-14 07:48:01'),
(333, 'project-assets/images/categories/weddinghalls.jpg', NULL, 'Laundry', 329, NULL, NULL, NULL, 'Adds', 1, '2019-05-14 07:48:01', '2019-05-14 07:48:01'),
(334, 'project-assets/images/categories/weddinghalls.jpg', NULL, 'Pest Control', 329, NULL, NULL, NULL, 'Adds', 1, '2019-05-14 07:48:01', '2019-05-14 07:48:01'),
(335, 'project-assets/images/categories/weddinghalls.jpg', NULL, 'Cat', 303, NULL, NULL, NULL, 'Adds', 1, '2019-05-14 07:48:01', '2019-05-14 07:48:01'),
(336, 'project-assets/images/categories/weddinghalls.jpg', NULL, 'Food', 335, NULL, NULL, NULL, 'Adds', 1, '2019-05-14 07:48:01', '2019-05-14 07:48:01'),
(337, 'project-assets/images/categories/weddinghalls.jpg', NULL, 'Beds,Mats & Houses', 335, NULL, NULL, NULL, 'Adds', 1, '2019-05-14 07:48:01', '2019-05-14 07:48:01'),
(338, 'project-assets/images/categories/weddinghalls.jpg', NULL, 'Carriers & Travel', 335, NULL, NULL, NULL, 'Adds', 1, '2019-05-14 07:48:01', '2019-05-14 07:48:01'),
(339, 'project-assets/images/categories/weddinghalls.jpg', NULL, 'Grooming', 335, NULL, NULL, NULL, 'Adds', 1, '2019-05-14 07:48:02', '2019-05-14 07:48:02'),
(340, 'project-assets/images/categories/weddinghalls.jpg', NULL, 'Litter & Toilet', 335, NULL, NULL, NULL, 'Adds', 1, '2019-05-14 07:48:02', '2019-05-14 07:48:02'),
(341, 'project-assets/images/categories/weddinghalls.jpg', NULL, 'Toys', 335, NULL, NULL, NULL, 'Adds', 1, '2019-05-14 07:48:02', '2019-05-14 07:48:02'),
(342, 'project-assets/images/categories/weddinghalls.jpg', NULL, 'Dog', 303, NULL, NULL, NULL, 'Adds', 1, '2019-05-14 07:48:02', '2019-05-14 07:48:02'),
(343, 'project-assets/images/categories/weddinghalls.jpg', NULL, 'Food', 342, NULL, NULL, NULL, 'Adds', 1, '2019-05-14 07:48:02', '2019-05-14 07:48:02'),
(344, 'project-assets/images/categories/weddinghalls.jpg', NULL, 'Beds,Mats & Houses', 342, NULL, NULL, NULL, 'Adds', 1, '2019-05-14 07:48:02', '2019-05-14 07:48:02'),
(345, 'project-assets/images/categories/weddinghalls.jpg', NULL, 'Carriers & Travel', 342, NULL, NULL, NULL, 'Adds', 1, '2019-05-14 07:48:02', '2019-05-14 07:48:02'),
(346, 'project-assets/images/categories/weddinghalls.jpg', NULL, 'Grooming', 342, NULL, NULL, NULL, 'Adds', 1, '2019-05-14 07:48:02', '2019-05-14 07:48:02'),
(347, 'project-assets/images/categories/weddinghalls.jpg', NULL, 'Leashes,Collars & Muzzles', 342, NULL, NULL, NULL, 'Adds', 1, '2019-05-14 07:48:02', '2019-05-14 07:48:02'),
(348, 'project-assets/images/categories/weddinghalls.jpg', NULL, 'Toys', 342, NULL, NULL, NULL, 'Adds', 1, '2019-05-14 07:48:02', '2019-05-14 07:48:02'),
(349, 'project-assets/images/categories/weddinghalls.jpg', NULL, 'Fish', 303, NULL, NULL, NULL, 'Adds', 1, '2019-05-14 07:48:02', '2019-05-14 07:48:02'),
(350, 'project-assets/images/categories/weddinghalls.jpg', NULL, 'Aquaium Temp Control', 349, NULL, NULL, NULL, 'Adds', 1, '2019-05-14 07:48:02', '2019-05-14 07:48:02'),
(351, 'project-assets/images/categories/weddinghalls.jpg', NULL, 'Food', 349, NULL, NULL, NULL, 'Adds', 1, '2019-05-14 07:48:02', '2019-05-14 07:48:02'),
(352, 'project-assets/images/categories/weddinghalls.jpg', NULL, 'Home & Lifestyle', NULL, NULL, NULL, NULL, 'Adds', 1, '2019-05-14 07:48:03', '2019-05-14 07:48:03'),
(353, 'project-assets/images/categories/weddinghalls.jpg', NULL, 'Bath', 352, NULL, NULL, NULL, 'Adds', 1, '2019-05-14 07:48:03', '2019-05-14 07:48:03'),
(354, 'project-assets/images/categories/weddinghalls.jpg', NULL, 'Bath Mats', 353, NULL, NULL, NULL, 'Adds', 1, '2019-05-14 07:48:03', '2019-05-14 07:48:03'),
(355, 'project-assets/images/categories/weddinghalls.jpg', NULL, 'Bath Towels', 353, NULL, NULL, NULL, 'Adds', 1, '2019-05-14 07:48:03', '2019-05-14 07:48:03'),
(356, 'project-assets/images/categories/weddinghalls.jpg', NULL, 'Bathrobes', 353, NULL, NULL, NULL, 'Adds', 1, '2019-05-14 07:48:03', '2019-05-14 07:48:03'),
(357, 'project-assets/images/categories/weddinghalls.jpg', NULL, 'Bathroom Scales', 353, NULL, NULL, NULL, 'Adds', 1, '2019-05-14 07:48:03', '2019-05-14 07:48:03'),
(358, 'project-assets/images/categories/weddinghalls.jpg', NULL, 'Bathroom shelving', 353, NULL, NULL, NULL, 'Adds', 1, '2019-05-14 07:48:03', '2019-05-14 07:48:03'),
(359, 'project-assets/images/categories/weddinghalls.jpg', NULL, 'Shower Caddies & Hangers', 353, NULL, NULL, NULL, 'Adds', 1, '2019-05-14 07:48:03', '2019-05-14 07:48:03'),
(360, 'project-assets/images/categories/weddinghalls.jpg', NULL, 'Shower Curtains', 353, NULL, NULL, NULL, 'Adds', 1, '2019-05-14 07:48:03', '2019-05-14 07:48:03'),
(361, 'project-assets/images/categories/weddinghalls.jpg', NULL, 'Towel Rails & Warmers', 353, NULL, NULL, NULL, 'Adds', 1, '2019-05-14 07:48:03', '2019-05-14 07:48:03'),
(362, 'project-assets/images/categories/weddinghalls.jpg', NULL, 'Bedding', 352, NULL, NULL, NULL, 'Adds', 1, '2019-05-14 07:48:03', '2019-05-14 07:48:03'),
(363, 'project-assets/images/categories/weddinghalls.jpg', NULL, 'Bed Sheets', 362, NULL, NULL, NULL, 'Adds', 1, '2019-05-14 07:48:03', '2019-05-14 07:48:03'),
(364, 'project-assets/images/categories/weddinghalls.jpg', NULL, 'Bedding Accessories', 362, NULL, NULL, NULL, 'Adds', 1, '2019-05-14 07:48:03', '2019-05-14 07:48:03'),
(365, 'project-assets/images/categories/weddinghalls.jpg', NULL, 'Blankets & Throws', 362, NULL, NULL, NULL, 'Adds', 1, '2019-05-14 07:48:04', '2019-05-14 07:48:04'),
(366, 'project-assets/images/categories/weddinghalls.jpg', NULL, 'Comforters,Quilts & Duvets', 362, NULL, NULL, NULL, 'Adds', 1, '2019-05-14 07:48:04', '2019-05-14 07:48:04'),
(367, 'project-assets/images/categories/weddinghalls.jpg', NULL, 'Mattress Protectors', 362, NULL, NULL, NULL, 'Adds', 1, '2019-05-14 07:48:04', '2019-05-14 07:48:04'),
(368, 'project-assets/images/categories/weddinghalls.jpg', NULL, 'Pillow Cases', 362, NULL, NULL, NULL, 'Adds', 1, '2019-05-14 07:48:04', '2019-05-14 07:48:04'),
(369, 'project-assets/images/categories/weddinghalls.jpg', NULL, 'Pillows & bolsters', 362, NULL, NULL, NULL, 'Adds', 1, '2019-05-14 07:48:04', '2019-05-14 07:48:04'),
(370, 'project-assets/images/categories/weddinghalls.jpg', NULL, 'Décor', 352, NULL, NULL, NULL, 'Adds', 1, '2019-05-14 07:48:04', '2019-05-14 07:48:04'),
(371, 'project-assets/images/categories/weddinghalls.jpg', NULL, 'Artificial Flowers & Plants', 370, NULL, NULL, NULL, 'Adds', 1, '2019-05-14 07:48:04', '2019-05-14 07:48:04'),
(372, 'project-assets/images/categories/weddinghalls.jpg', NULL, 'Candles & Candleholders', 370, NULL, NULL, NULL, 'Adds', 1, '2019-05-14 07:48:04', '2019-05-14 07:48:04'),
(373, 'project-assets/images/categories/weddinghalls.jpg', NULL, 'Clocks', 370, NULL, NULL, NULL, 'Adds', 1, '2019-05-14 07:48:04', '2019-05-14 07:48:04'),
(374, 'project-assets/images/categories/weddinghalls.jpg', NULL, 'Curtains', 370, NULL, NULL, NULL, 'Adds', 1, '2019-05-14 07:48:04', '2019-05-14 07:48:04'),
(375, 'project-assets/images/categories/weddinghalls.jpg', NULL, 'Cushions & Covers', 370, NULL, NULL, NULL, 'Adds', 1, '2019-05-14 07:48:05', '2019-05-14 07:48:05'),
(376, 'project-assets/images/categories/weddinghalls.jpg', NULL, 'Mirrors', 370, NULL, NULL, NULL, 'Adds', 1, '2019-05-14 07:48:05', '2019-05-14 07:48:05'),
(377, 'project-assets/images/categories/weddinghalls.jpg', NULL, 'Picture Frames', 370, NULL, NULL, NULL, 'Adds', 1, '2019-05-14 07:48:05', '2019-05-14 07:48:05'),
(378, 'project-assets/images/categories/weddinghalls.jpg', NULL, 'Rugs & Carpets', 370, NULL, NULL, NULL, 'Adds', 1, '2019-05-14 07:48:05', '2019-05-14 07:48:05'),
(379, 'project-assets/images/categories/weddinghalls.jpg', NULL, 'Vases & Vessels', 370, NULL, NULL, NULL, 'Adds', 1, '2019-05-14 07:48:05', '2019-05-14 07:48:05'),
(380, 'project-assets/images/categories/weddinghalls.jpg', NULL, 'Wall Stickers & Decals', 370, NULL, NULL, NULL, 'Adds', 1, '2019-05-14 07:48:05', '2019-05-14 07:48:05'),
(381, 'project-assets/images/categories/weddinghalls.jpg', NULL, 'Furniture', 352, NULL, NULL, NULL, 'Adds', 1, '2019-05-14 07:48:05', '2019-05-14 07:48:05'),
(382, 'project-assets/images/categories/weddinghalls.jpg', NULL, 'Bedroom', 381, NULL, NULL, NULL, 'Adds', 1, '2019-05-14 07:48:05', '2019-05-14 07:48:05'),
(383, 'project-assets/images/categories/weddinghalls.jpg', NULL, 'Gaming Furniture', 381, NULL, NULL, NULL, 'Adds', 1, '2019-05-14 07:48:05', '2019-05-14 07:48:05'),
(384, 'project-assets/images/categories/weddinghalls.jpg', NULL, 'Home Office', 381, NULL, NULL, NULL, 'Adds', 1, '2019-05-14 07:48:05', '2019-05-14 07:48:05'),
(385, 'project-assets/images/categories/weddinghalls.jpg', NULL, 'Kitchen & Dining', 381, NULL, NULL, NULL, 'Adds', 1, '2019-05-14 07:48:06', '2019-05-14 07:48:06'),
(386, 'project-assets/images/categories/weddinghalls.jpg', NULL, 'Living Room', 381, NULL, NULL, NULL, 'Adds', 1, '2019-05-14 07:48:06', '2019-05-14 07:48:06'),
(387, 'project-assets/images/categories/weddinghalls.jpg', NULL, 'Kitchen & Dining', 352, NULL, NULL, NULL, 'Adds', 1, '2019-05-14 07:48:06', '2019-05-14 07:48:06'),
(388, 'project-assets/images/categories/weddinghalls.jpg', NULL, 'Bakeware', 387, NULL, NULL, NULL, 'Adds', 1, '2019-05-14 07:48:06', '2019-05-14 07:48:06'),
(389, 'project-assets/images/categories/weddinghalls.jpg', NULL, 'Coffee & Tea', 387, NULL, NULL, NULL, 'Adds', 1, '2019-05-14 07:48:06', '2019-05-14 07:48:06'),
(390, 'project-assets/images/categories/weddinghalls.jpg', NULL, 'Cookware', 387, NULL, NULL, NULL, 'Adds', 1, '2019-05-14 07:48:06', '2019-05-14 07:48:06'),
(391, 'project-assets/images/categories/weddinghalls.jpg', NULL, 'Dinnerware', 387, NULL, NULL, NULL, 'Adds', 1, '2019-05-14 07:48:06', '2019-05-14 07:48:06'),
(392, 'project-assets/images/categories/weddinghalls.jpg', NULL, 'Drinkware', 387, NULL, NULL, NULL, 'Adds', 1, '2019-05-14 07:48:06', '2019-05-14 07:48:06'),
(393, 'project-assets/images/categories/weddinghalls.jpg', NULL, 'Kitchen & Table Linen', 387, NULL, NULL, NULL, 'Adds', 1, '2019-05-14 07:48:06', '2019-05-14 07:48:06'),
(394, 'project-assets/images/categories/weddinghalls.jpg', NULL, 'Kitchen Storage & Accessori…', 387, NULL, NULL, NULL, 'Adds', 1, '2019-05-14 07:48:06', '2019-05-14 07:48:06'),
(395, 'project-assets/images/categories/weddinghalls.jpg', NULL, 'Kitchen Utensils', 387, NULL, NULL, NULL, 'Adds', 1, '2019-05-14 07:48:07', '2019-05-14 07:48:07'),
(396, 'project-assets/images/categories/weddinghalls.jpg', NULL, 'Knives & Accessories', 387, NULL, NULL, NULL, 'Adds', 1, '2019-05-14 07:48:07', '2019-05-14 07:48:07'),
(397, 'project-assets/images/categories/weddinghalls.jpg', NULL, 'Serveware', 387, NULL, NULL, NULL, 'Adds', 1, '2019-05-14 07:48:07', '2019-05-14 07:48:07'),
(398, 'project-assets/images/categories/weddinghalls.jpg', NULL, 'Lighting', 352, NULL, NULL, NULL, 'Adds', 1, '2019-05-14 07:48:07', '2019-05-14 07:48:07'),
(399, 'project-assets/images/categories/weddinghalls.jpg', NULL, 'Ceiling Lights', 398, NULL, NULL, NULL, 'Adds', 1, '2019-05-14 07:48:07', '2019-05-14 07:48:07'),
(400, 'project-assets/images/categories/weddinghalls.jpg', NULL, 'Floor Lamps', 398, NULL, NULL, NULL, 'Adds', 1, '2019-05-14 07:48:07', '2019-05-14 07:48:07'),
(401, 'project-assets/images/categories/weddinghalls.jpg', NULL, 'Lamp Shades', 398, NULL, NULL, NULL, 'Adds', 1, '2019-05-14 07:48:07', '2019-05-14 07:48:07'),
(402, 'project-assets/images/categories/weddinghalls.jpg', NULL, 'Light Bulbs', 355, NULL, NULL, NULL, 'Adds', 1, '2019-05-14 07:48:07', '2019-05-14 07:48:07'),
(403, 'project-assets/images/categories/weddinghalls.jpg', NULL, 'Lighting Fixtures & Compon…', 398, NULL, NULL, NULL, 'Adds', 1, '2019-05-14 07:48:07', '2019-05-14 07:48:07'),
(404, 'project-assets/images/categories/weddinghalls.jpg', NULL, 'Outdoor Lighting', 398, NULL, NULL, NULL, 'Adds', 1, '2019-05-14 07:48:07', '2019-05-14 07:48:07'),
(405, 'project-assets/images/categories/weddinghalls.jpg', NULL, 'Rechargeable & Flashlights', 398, NULL, NULL, NULL, 'Adds', 1, '2019-05-14 07:48:07', '2019-05-14 07:48:07'),
(406, 'project-assets/images/categories/weddinghalls.jpg', NULL, 'Table Lamps', 398, NULL, NULL, NULL, 'Adds', 1, '2019-05-14 07:48:07', '2019-05-14 07:48:07'),
(407, 'project-assets/images/categories/weddinghalls.jpg', NULL, 'Wall Lights & Sconces', 398, NULL, NULL, NULL, 'Adds', 1, '2019-05-14 07:48:07', '2019-05-14 07:48:07'),
(408, 'project-assets/images/categories/weddinghalls.jpg', NULL, 'Laundry & Cleaning', 352, NULL, NULL, NULL, 'Adds', 1, '2019-05-14 07:48:07', '2019-05-14 07:48:07'),
(409, 'project-assets/images/categories/weddinghalls.jpg', NULL, 'Brushes , Sponges & Wipers', 408, NULL, NULL, NULL, 'Adds', 1, '2019-05-14 07:48:07', '2019-05-14 07:48:07'),
(410, 'project-assets/images/categories/weddinghalls.jpg', NULL, 'Brooms, Mops & Sweepers', 408, NULL, NULL, NULL, 'Adds', 1, '2019-05-14 07:48:08', '2019-05-14 07:48:08'),
(411, 'project-assets/images/categories/weddinghalls.jpg', NULL, 'Laundry Baskets & Hampers', 408, NULL, NULL, NULL, 'Adds', 1, '2019-05-14 07:48:08', '2019-05-14 07:48:08'),
(412, 'project-assets/images/categories/weddinghalls.jpg', NULL, 'Clothes Line & Drying Racks', 408, NULL, NULL, NULL, 'Adds', 1, '2019-05-14 07:48:08', '2019-05-14 07:48:08'),
(413, 'project-assets/images/categories/weddinghalls.jpg', NULL, 'Ironing Boards', 408, NULL, NULL, NULL, 'Adds', 1, '2019-05-14 07:48:08', '2019-05-14 07:48:08'),
(414, 'project-assets/images/categories/weddinghalls.jpg', NULL, 'Tools, DIY & Outdoor', 352, NULL, NULL, NULL, 'Adds', 1, '2019-05-14 07:48:08', '2019-05-14 07:48:08'),
(415, 'project-assets/images/categories/weddinghalls.jpg', NULL, 'Fixtures & Plumbing', 414, NULL, NULL, NULL, 'Adds', 1, '2019-05-14 07:48:08', '2019-05-14 07:48:08'),
(416, 'project-assets/images/categories/weddinghalls.jpg', NULL, 'Electrical', 414, NULL, NULL, NULL, 'Adds', 1, '2019-05-14 07:48:08', '2019-05-14 07:48:08'),
(417, 'project-assets/images/categories/weddinghalls.jpg', NULL, 'Hand Tools', 414, NULL, NULL, NULL, 'Adds', 1, '2019-05-14 07:48:08', '2019-05-14 07:48:08'),
(418, 'project-assets/images/categories/weddinghalls.jpg', NULL, 'Lawn & Garden', 414, NULL, NULL, NULL, 'Adds', 1, '2019-05-14 07:48:08', '2019-05-14 07:48:08'),
(419, 'project-assets/images/categories/weddinghalls.jpg', NULL, 'Power Tools', 414, NULL, NULL, NULL, 'Adds', 1, '2019-05-14 07:48:08', '2019-05-14 07:48:08'),
(420, 'project-assets/images/categories/weddinghalls.jpg', NULL, 'Security', 414, NULL, NULL, NULL, 'Adds', 1, '2019-05-14 07:48:08', '2019-05-14 07:48:08'),
(421, 'project-assets/images/categories/weddinghalls.jpg', NULL, 'Stationery & Craft', 352, NULL, NULL, NULL, 'Adds', 1, '2019-05-14 07:48:08', '2019-05-14 07:48:08'),
(422, 'project-assets/images/categories/weddinghalls.jpg', NULL, 'Art Supplies', 421, NULL, NULL, NULL, 'Adds', 1, '2019-05-14 07:48:08', '2019-05-14 07:48:08'),
(423, 'project-assets/images/categories/weddinghalls.jpg', NULL, 'Gifts & Wraping', 421, NULL, NULL, NULL, 'Adds', 1, '2019-05-14 07:48:08', '2019-05-14 07:48:08'),
(424, 'project-assets/images/categories/weddinghalls.jpg', NULL, 'Packaging & Cartons', 421, NULL, NULL, NULL, 'Adds', 1, '2019-05-14 07:48:08', '2019-05-14 07:48:08'),
(425, 'project-assets/images/categories/weddinghalls.jpg', NULL, 'Paper Products', 421, NULL, NULL, NULL, 'Adds', 1, '2019-05-14 07:48:09', '2019-05-14 07:48:09'),
(426, 'project-assets/images/categories/weddinghalls.jpg', NULL, 'School & Office Equipment', 421, NULL, NULL, NULL, 'Adds', 1, '2019-05-14 07:48:09', '2019-05-14 07:48:09'),
(427, 'project-assets/images/categories/weddinghalls.jpg', NULL, 'Writing & Correction', 421, NULL, NULL, NULL, 'Adds', 1, '2019-05-14 07:48:09', '2019-05-14 07:48:09'),
(428, 'project-assets/images/categories/weddinghalls.jpg', NULL, 'Media,Music&Books', 352, NULL, NULL, NULL, 'Adds', 1, '2019-05-14 07:48:09', '2019-05-14 07:48:09'),
(429, 'project-assets/images/categories/weddinghalls.jpg', NULL, 'Books', 428, NULL, NULL, NULL, 'Adds', 1, '2019-05-14 07:48:09', '2019-05-14 07:48:09'),
(430, 'project-assets/images/categories/weddinghalls.jpg', NULL, 'eBooks', 428, NULL, NULL, NULL, 'Adds', 1, '2019-05-14 07:48:09', '2019-05-14 07:48:09'),
(431, 'project-assets/images/categories/weddinghalls.jpg', NULL, 'Magazines', 428, NULL, NULL, NULL, 'Adds', 1, '2019-05-14 07:48:09', '2019-05-14 07:48:09'),
(432, 'project-assets/images/categories/weddinghalls.jpg', NULL, 'Musical Instruments', 428, NULL, NULL, NULL, 'Adds', 1, '2019-05-14 07:48:09', '2019-05-14 07:48:09'),
(433, 'project-assets/images/categories/weddinghalls.jpg', NULL, 'Charity & Donation', 352, NULL, NULL, NULL, 'Adds', 1, '2019-05-14 07:48:09', '2019-05-14 07:48:09'),
(434, 'project-assets/images/categories/weddinghalls.jpg', NULL, 'Donate to Healthcare', 433, NULL, NULL, NULL, 'Adds', 1, '2019-05-14 07:48:09', '2019-05-14 07:48:09'),
(435, 'project-assets/images/categories/weddinghalls.jpg', NULL, 'Donate to Shelter', 433, NULL, NULL, NULL, 'Adds', 1, '2019-05-14 07:48:09', '2019-05-14 07:48:09'),
(436, 'project-assets/images/categories/weddinghalls.jpg', NULL, 'Donate to Educate', 433, NULL, NULL, NULL, 'Adds', 1, '2019-05-14 07:48:09', '2019-05-14 07:48:09'),
(437, 'project-assets/images/categories/weddinghalls.jpg', NULL, 'Others', 433, NULL, NULL, NULL, 'Adds', 1, '2019-05-14 07:48:10', '2019-05-14 07:48:10'),
(438, 'project-assets/images/categories/weddinghalls.jpg', NULL, 'Women\'s Fashion', NULL, NULL, NULL, NULL, 'Adds', 1, '2019-05-14 07:48:10', '2019-05-14 07:48:10'),
(439, 'project-assets/images/categories/weddinghalls.jpg', NULL, 'Traditional Clothing', 438, NULL, NULL, NULL, 'Adds', 1, '2019-05-14 07:48:10', '2019-05-14 07:48:10'),
(440, 'project-assets/images/categories/weddinghalls.jpg', NULL, 'Unstitched Fabric', 439, NULL, NULL, NULL, 'Adds', 1, '2019-05-14 07:48:10', '2019-05-14 07:48:10'),
(441, 'project-assets/images/categories/weddinghalls.jpg', NULL, 'Kurtis', 439, NULL, NULL, NULL, 'Adds', 1, '2019-05-14 07:48:10', '2019-05-14 07:48:10'),
(442, 'project-assets/images/categories/weddinghalls.jpg', NULL, 'Shalwar Kameez', 439, NULL, NULL, NULL, 'Adds', 1, '2019-05-14 07:48:10', '2019-05-14 07:48:10'),
(443, 'project-assets/images/categories/weddinghalls.jpg', NULL, 'Formal Wear', 439, NULL, NULL, NULL, 'Adds', 1, '2019-05-14 07:48:10', '2019-05-14 07:48:10'),
(444, 'project-assets/images/categories/weddinghalls.jpg', NULL, 'Muslim wear', 439, NULL, NULL, NULL, 'Adds', 1, '2019-05-14 07:48:10', '2019-05-14 07:48:10'),
(445, 'project-assets/images/categories/weddinghalls.jpg', NULL, 'Pants,Palazzos & Capris', 439, NULL, NULL, NULL, 'Adds', 1, '2019-05-14 07:48:10', '2019-05-14 07:48:10'),
(446, 'project-assets/images/categories/weddinghalls.jpg', NULL, 'Dupattas, Stoles & Shawls', 439, NULL, NULL, NULL, 'Adds', 1, '2019-05-14 07:48:10', '2019-05-14 07:48:10'),
(447, 'project-assets/images/categories/weddinghalls.jpg', NULL, 'Tops', 438, NULL, NULL, NULL, 'Adds', 1, '2019-05-14 07:48:10', '2019-05-14 07:48:10'),
(448, 'project-assets/images/categories/weddinghalls.jpg', NULL, 'Blouses & Shirts', 447, NULL, NULL, NULL, 'Adds', 1, '2019-05-14 07:48:10', '2019-05-14 07:48:10'),
(449, 'project-assets/images/categories/weddinghalls.jpg', NULL, 'Tunics', 447, NULL, NULL, NULL, 'Adds', 1, '2019-05-14 07:48:10', '2019-05-14 07:48:10'),
(450, 'project-assets/images/categories/weddinghalls.jpg', NULL, 'T-Shirts', 447, NULL, NULL, NULL, 'Adds', 1, '2019-05-14 07:48:10', '2019-05-14 07:48:10'),
(451, 'project-assets/images/categories/weddinghalls.jpg', NULL, 'Tanks & Camisoles', 447, NULL, NULL, NULL, 'Adds', 1, '2019-05-14 07:48:11', '2019-05-14 07:48:11'),
(452, 'project-assets/images/categories/weddinghalls.jpg', NULL, 'Lingerie,  Sleep & Lounge', 438, NULL, NULL, NULL, 'Adds', 1, '2019-05-14 07:48:11', '2019-05-14 07:48:11'),
(453, 'project-assets/images/categories/weddinghalls.jpg', NULL, 'Sleep & Loungewear', 452, NULL, NULL, NULL, 'Adds', 1, '2019-05-14 07:48:11', '2019-05-14 07:48:11'),
(454, 'project-assets/images/categories/weddinghalls.jpg', NULL, 'Bras', 452, NULL, NULL, NULL, 'Adds', 1, '2019-05-14 07:48:11', '2019-05-14 07:48:11'),
(455, 'project-assets/images/categories/weddinghalls.jpg', NULL, 'Lingerie Sets', 452, NULL, NULL, NULL, 'Adds', 1, '2019-05-14 07:48:11', '2019-05-14 07:48:11'),
(456, 'project-assets/images/categories/weddinghalls.jpg', NULL, 'Shapewear', 452, NULL, NULL, NULL, 'Adds', 1, '2019-05-14 07:48:11', '2019-05-14 07:48:11'),
(457, 'project-assets/images/categories/weddinghalls.jpg', NULL, 'Camisoles & Slips', 452, NULL, NULL, NULL, 'Adds', 1, '2019-05-14 07:48:11', '2019-05-14 07:48:11'),
(458, 'project-assets/images/categories/weddinghalls.jpg', NULL, 'Robes', 452, NULL, NULL, NULL, 'Adds', 1, '2019-05-14 07:48:11', '2019-05-14 07:48:11'),
(459, 'project-assets/images/categories/weddinghalls.jpg', NULL, 'Pants & Leggings', 438, NULL, NULL, NULL, 'Adds', 1, '2019-05-14 07:48:11', '2019-05-14 07:48:11'),
(460, 'project-assets/images/categories/weddinghalls.jpg', NULL, 'Pants', 459, NULL, NULL, NULL, 'Adds', 1, '2019-05-14 07:48:11', '2019-05-14 07:48:11'),
(461, 'project-assets/images/categories/weddinghalls.jpg', NULL, 'Leggings', 459, NULL, NULL, NULL, 'Adds', 1, '2019-05-14 07:48:11', '2019-05-14 07:48:11'),
(462, 'project-assets/images/categories/weddinghalls.jpg', NULL, 'Dresses', 438, NULL, NULL, NULL, 'Adds', 1, '2019-05-14 07:48:11', '2019-05-14 07:48:11'),
(463, 'project-assets/images/categories/weddinghalls.jpg', NULL, 'Jackets & Coats', 438, NULL, NULL, NULL, 'Adds', 1, '2019-05-14 07:48:12', '2019-05-14 07:48:12'),
(464, 'project-assets/images/categories/weddinghalls.jpg', NULL, 'Hoodies & Sweatshirts', 438, NULL, NULL, NULL, 'Adds', 1, '2019-05-14 07:48:12', '2019-05-14 07:48:12'),
(465, 'project-assets/images/categories/weddinghalls.jpg', NULL, 'Sweaters & Cardigans', 438, NULL, NULL, NULL, 'Adds', 1, '2019-05-14 07:48:12', '2019-05-14 07:48:12'),
(466, 'project-assets/images/categories/weddinghalls.jpg', NULL, 'Jeans', 438, NULL, NULL, NULL, 'Adds', 1, '2019-05-14 07:48:12', '2019-05-14 07:48:12'),
(467, 'project-assets/images/categories/weddinghalls.jpg', NULL, 'Womens\' Bags', 438, NULL, NULL, NULL, 'Adds', 1, '2019-05-14 07:48:12', '2019-05-14 07:48:12'),
(468, 'project-assets/images/categories/weddinghalls.jpg', NULL, 'Top-Handle Bags', 467, NULL, NULL, NULL, 'Adds', 1, '2019-05-14 07:48:12', '2019-05-14 07:48:12'),
(469, 'project-assets/images/categories/weddinghalls.jpg', NULL, 'Cross Body & Shoulder Bags', 467, NULL, NULL, NULL, 'Adds', 1, '2019-05-14 07:48:12', '2019-05-14 07:48:12'),
(470, 'project-assets/images/categories/weddinghalls.jpg', NULL, 'Tote Bags', 467, NULL, NULL, NULL, 'Adds', 1, '2019-05-14 07:48:12', '2019-05-14 07:48:12'),
(471, 'project-assets/images/categories/weddinghalls.jpg', NULL, 'Clutches', 467, NULL, NULL, NULL, 'Adds', 1, '2019-05-14 07:48:12', '2019-05-14 07:48:12'),
(472, 'project-assets/images/categories/weddinghalls.jpg', NULL, 'Wallets & Accessoris', 467, NULL, NULL, NULL, 'Adds', 1, '2019-05-14 07:48:13', '2019-05-14 07:48:13'),
(473, 'project-assets/images/categories/weddinghalls.jpg', NULL, 'Wristlets', 467, NULL, NULL, NULL, 'Adds', 1, '2019-05-14 07:48:13', '2019-05-14 07:48:13'),
(474, 'project-assets/images/categories/weddinghalls.jpg', NULL, 'Accessories', 438, NULL, NULL, NULL, 'Adds', 1, '2019-05-14 07:48:13', '2019-05-14 07:48:13'),
(475, 'project-assets/images/categories/weddinghalls.jpg', NULL, 'Scarves', 474, NULL, NULL, NULL, 'Adds', 1, '2019-05-14 07:48:13', '2019-05-14 07:48:13'),
(476, 'project-assets/images/categories/weddinghalls.jpg', NULL, 'Belts', 474, NULL, NULL, NULL, 'Adds', 1, '2019-05-14 07:48:13', '2019-05-14 07:48:13'),
(477, 'project-assets/images/categories/weddinghalls.jpg', NULL, 'Socks & Tights', 474, NULL, NULL, NULL, 'Adds', 1, '2019-05-14 07:48:13', '2019-05-14 07:48:13'),
(478, 'project-assets/images/categories/weddinghalls.jpg', NULL, 'Gloves', 474, NULL, NULL, NULL, 'Adds', 1, '2019-05-14 07:48:13', '2019-05-14 07:48:13'),
(479, 'project-assets/images/categories/weddinghalls.jpg', NULL, 'Hair Accessories', 474, NULL, NULL, NULL, 'Adds', 1, '2019-05-14 07:48:13', '2019-05-14 07:48:13'),
(480, 'project-assets/images/categories/weddinghalls.jpg', NULL, 'Hats & Caps', 474, NULL, NULL, NULL, 'Adds', 1, '2019-05-14 07:48:13', '2019-05-14 07:48:13'),
(481, 'project-assets/images/categories/weddinghalls.jpg', NULL, 'Shoes', 438, NULL, NULL, NULL, 'Adds', 1, '2019-05-14 07:48:14', '2019-05-14 07:48:14'),
(482, 'project-assets/images/categories/weddinghalls.jpg', NULL, 'Sandals', 481, NULL, NULL, NULL, 'Adds', 1, '2019-05-14 07:48:14', '2019-05-14 07:48:14'),
(483, 'project-assets/images/categories/weddinghalls.jpg', NULL, 'Flat Shoes', 481, NULL, NULL, NULL, 'Adds', 1, '2019-05-14 07:48:14', '2019-05-14 07:48:14'),
(484, 'project-assets/images/categories/weddinghalls.jpg', NULL, 'Heels', 481, NULL, NULL, NULL, 'Adds', 1, '2019-05-14 07:48:14', '2019-05-14 07:48:14'),
(485, 'project-assets/images/categories/weddinghalls.jpg', NULL, 'Khussa & Kohlapuri', 481, NULL, NULL, NULL, 'Adds', 1, '2019-05-14 07:48:14', '2019-05-14 07:48:14'),
(486, 'project-assets/images/categories/weddinghalls.jpg', NULL, 'Slides & Flip Flops', 481, NULL, NULL, NULL, 'Adds', 1, '2019-05-14 07:48:14', '2019-05-14 07:48:14'),
(487, 'project-assets/images/categories/weddinghalls.jpg', NULL, 'Wedges', 481, NULL, NULL, NULL, 'Adds', 1, '2019-05-14 07:48:14', '2019-05-14 07:48:14'),
(488, 'project-assets/images/categories/weddinghalls.jpg', NULL, 'Sneakers', 481, NULL, NULL, NULL, 'Adds', 1, '2019-05-14 07:48:14', '2019-05-14 07:48:14'),
(489, 'project-assets/images/categories/weddinghalls.jpg', NULL, 'Boots', 481, NULL, NULL, NULL, 'Adds', 1, '2019-05-14 07:48:14', '2019-05-14 07:48:14'),
(490, 'project-assets/images/categories/weddinghalls.jpg', NULL, 'Men\'s Fashion', NULL, NULL, NULL, NULL, 'Adds', 1, '2019-05-14 07:48:14', '2019-05-14 07:48:14'),
(491, 'project-assets/images/categories/weddinghalls.jpg', NULL, 'T-Shirts', 490, NULL, NULL, NULL, 'Adds', 1, '2019-05-14 07:48:14', '2019-05-14 07:48:14'),
(492, 'project-assets/images/categories/weddinghalls.jpg', NULL, 'Shirts', 490, NULL, NULL, NULL, 'Adds', 1, '2019-05-14 07:48:14', '2019-05-14 07:48:14'),
(493, 'project-assets/images/categories/weddinghalls.jpg', NULL, 'Casual Shirts', 492, NULL, NULL, NULL, 'Adds', 1, '2019-05-14 07:48:14', '2019-05-14 07:48:14'),
(494, 'project-assets/images/categories/weddinghalls.jpg', NULL, 'Formal Shirts', 492, NULL, NULL, NULL, 'Adds', 1, '2019-05-14 07:48:14', '2019-05-14 07:48:14'),
(495, 'project-assets/images/categories/weddinghalls.jpg', NULL, 'Polo', 490, NULL, NULL, NULL, 'Adds', 1, '2019-05-14 07:48:14', '2019-05-14 07:48:14'),
(496, 'project-assets/images/categories/weddinghalls.jpg', NULL, 'Pants', 490, NULL, NULL, NULL, 'Adds', 1, '2019-05-14 07:48:14', '2019-05-14 07:48:14'),
(497, 'project-assets/images/categories/weddinghalls.jpg', NULL, 'Chinos', 496, NULL, NULL, NULL, 'Adds', 1, '2019-05-14 07:48:15', '2019-05-14 07:48:15'),
(498, 'project-assets/images/categories/weddinghalls.jpg', NULL, 'Jeans', 496, NULL, NULL, NULL, 'Adds', 1, '2019-05-14 07:48:15', '2019-05-14 07:48:15'),
(499, 'project-assets/images/categories/weddinghalls.jpg', NULL, 'Joggers & Sweats', 496, NULL, NULL, NULL, 'Adds', 1, '2019-05-14 07:48:15', '2019-05-14 07:48:15'),
(500, 'project-assets/images/categories/weddinghalls.jpg', NULL, 'Cargo', 496, NULL, NULL, NULL, 'Adds', 1, '2019-05-14 07:48:15', '2019-05-14 07:48:15'),
(501, 'project-assets/images/categories/weddinghalls.jpg', NULL, 'Chinos', 496, NULL, NULL, NULL, 'Adds', 1, '2019-05-14 07:48:15', '2019-05-14 07:48:15'),
(502, 'project-assets/images/categories/weddinghalls.jpg', NULL, 'Shorts', 490, NULL, NULL, NULL, 'Adds', 1, '2019-05-14 07:48:15', '2019-05-14 07:48:15'),
(503, 'project-assets/images/categories/weddinghalls.jpg', NULL, 'Traditional Clothing', 490, NULL, NULL, NULL, 'Adds', 1, '2019-05-14 07:48:15', '2019-05-14 07:48:15'),
(504, 'project-assets/images/categories/weddinghalls.jpg', NULL, 'Unstitched Fabric', 503, NULL, NULL, NULL, 'Adds', 1, '2019-05-14 07:48:15', '2019-05-14 07:48:15'),
(505, 'project-assets/images/categories/weddinghalls.jpg', NULL, 'Kurtas', 503, NULL, NULL, NULL, 'Adds', 1, '2019-05-14 07:48:15', '2019-05-14 07:48:15'),
(506, 'project-assets/images/categories/weddinghalls.jpg', NULL, 'Shalwar', 503, NULL, NULL, NULL, 'Adds', 1, '2019-05-14 07:48:15', '2019-05-14 07:48:15'),
(507, 'project-assets/images/categories/weddinghalls.jpg', NULL, 'Shawls', 503, NULL, NULL, NULL, 'Adds', 1, '2019-05-14 07:48:15', '2019-05-14 07:48:15'),
(508, 'project-assets/images/categories/weddinghalls.jpg', NULL, 'Jackets & Coats', 490, NULL, NULL, NULL, 'Adds', 1, '2019-05-14 07:48:15', '2019-05-14 07:48:15'),
(509, 'project-assets/images/categories/weddinghalls.jpg', NULL, 'Hoodies & Sweatshirts', 490, NULL, NULL, NULL, 'Adds', 1, '2019-05-14 07:48:15', '2019-05-14 07:48:15'),
(510, 'project-assets/images/categories/weddinghalls.jpg', NULL, 'Sweaters & Cardigans', 490, NULL, NULL, NULL, 'Adds', 1, '2019-05-14 07:48:15', '2019-05-14 07:48:15'),
(511, 'project-assets/images/categories/weddinghalls.jpg', NULL, 'Underwear', 490, NULL, NULL, NULL, 'Adds', 1, '2019-05-14 07:48:15', '2019-05-14 07:48:15'),
(512, 'project-assets/images/categories/weddinghalls.jpg', NULL, 'Briefs', 511, NULL, NULL, NULL, 'Adds', 1, '2019-05-14 07:48:15', '2019-05-14 07:48:15'),
(513, 'project-assets/images/categories/weddinghalls.jpg', NULL, 'Trunk & Boxers', 511, NULL, NULL, NULL, 'Adds', 1, '2019-05-14 07:48:15', '2019-05-14 07:48:15'),
(514, 'project-assets/images/categories/weddinghalls.jpg', NULL, 'Nightwear', 511, NULL, NULL, NULL, 'Adds', 1, '2019-05-14 07:48:15', '2019-05-14 07:48:15'),
(515, 'project-assets/images/categories/weddinghalls.jpg', NULL, 'Shoes', 490, NULL, NULL, NULL, 'Adds', 1, '2019-05-14 07:48:16', '2019-05-14 07:48:16'),
(516, 'project-assets/images/categories/weddinghalls.jpg', NULL, 'Slip-Ons & Loafers', 515, NULL, NULL, NULL, 'Adds', 1, '2019-05-14 07:48:16', '2019-05-14 07:48:16'),
(517, 'project-assets/images/categories/weddinghalls.jpg', NULL, 'Flip Flops & Sandals', 515, NULL, NULL, NULL, 'Adds', 1, '2019-05-14 07:48:16', '2019-05-14 07:48:16'),
(518, 'project-assets/images/categories/weddinghalls.jpg', NULL, 'Sneakers', 515, NULL, NULL, NULL, 'Adds', 1, '2019-05-14 07:48:16', '2019-05-14 07:48:16'),
(519, 'project-assets/images/categories/weddinghalls.jpg', NULL, 'Formal Shoes', 515, NULL, NULL, NULL, 'Adds', 1, '2019-05-14 07:48:16', '2019-05-14 07:48:16'),
(520, 'project-assets/images/categories/weddinghalls.jpg', NULL, 'Boots', 515, NULL, NULL, NULL, 'Adds', 1, '2019-05-14 07:48:16', '2019-05-14 07:48:16'),
(521, 'project-assets/images/categories/weddinghalls.jpg', NULL, 'Khussa & Kohlapuri', 515, NULL, NULL, NULL, 'Adds', 1, '2019-05-14 07:48:16', '2019-05-14 07:48:16'),
(522, 'project-assets/images/categories/weddinghalls.jpg', NULL, 'Shoes Accessories', 515, NULL, NULL, NULL, 'Adds', 1, '2019-05-14 07:48:16', '2019-05-14 07:48:16'),
(523, 'project-assets/images/categories/weddinghalls.jpg', NULL, 'Accessories', 490, NULL, NULL, NULL, 'Adds', 1, '2019-05-14 07:48:16', '2019-05-14 07:48:16'),
(524, 'project-assets/images/categories/weddinghalls.jpg', NULL, 'Belts', 523, NULL, NULL, NULL, 'Adds', 1, '2019-05-14 07:48:16', '2019-05-14 07:48:16'),
(525, 'project-assets/images/categories/weddinghalls.jpg', NULL, 'Hats & Caps', 523, NULL, NULL, NULL, 'Adds', 1, '2019-05-14 07:48:16', '2019-05-14 07:48:16'),
(526, 'project-assets/images/categories/weddinghalls.jpg', NULL, 'Man\'s Bags', 523, NULL, NULL, NULL, 'Adds', 1, '2019-05-14 07:48:16', '2019-05-14 07:48:16'),
(527, 'project-assets/images/categories/weddinghalls.jpg', NULL, 'Wallets', 523, NULL, NULL, NULL, 'Adds', 1, '2019-05-14 07:48:16', '2019-05-14 07:48:16'),
(528, 'project-assets/images/categories/weddinghalls.jpg', NULL, 'Scarves', 523, NULL, NULL, NULL, 'Adds', 1, '2019-05-14 07:48:16', '2019-05-14 07:48:16'),
(529, 'project-assets/images/categories/weddinghalls.jpg', NULL, 'Ties & Bow Ties', 523, NULL, NULL, NULL, 'Adds', 1, '2019-05-14 07:48:16', '2019-05-14 07:48:16'),
(530, 'project-assets/images/categories/weddinghalls.jpg', NULL, 'Gloves', 523, NULL, NULL, NULL, 'Adds', 1, '2019-05-14 07:48:16', '2019-05-14 07:48:16'),
(531, 'project-assets/images/categories/weddinghalls.jpg', NULL, 'Watches & Accessories', NULL, NULL, NULL, NULL, 'Adds', 1, '2019-05-14 07:48:16', '2019-05-14 07:48:16'),
(532, 'project-assets/images/categories/weddinghalls.jpg', NULL, 'Men\'s Watches', 531, NULL, NULL, NULL, 'Adds', 1, '2019-05-14 07:48:17', '2019-05-14 07:48:17'),
(533, 'project-assets/images/categories/weddinghalls.jpg', NULL, 'Business', 532, NULL, NULL, NULL, 'Adds', 1, '2019-05-14 07:48:17', '2019-05-14 07:48:17'),
(534, 'project-assets/images/categories/weddinghalls.jpg', NULL, 'Fashion', 532, NULL, NULL, NULL, 'Adds', 1, '2019-05-14 07:48:17', '2019-05-14 07:48:17'),
(535, 'project-assets/images/categories/weddinghalls.jpg', NULL, 'Women\'s Watches', 531, NULL, NULL, NULL, 'Adds', 1, '2019-05-14 07:48:17', '2019-05-14 07:48:17'),
(536, 'project-assets/images/categories/weddinghalls.jpg', NULL, 'Business', 535, NULL, NULL, NULL, 'Adds', 1, '2019-05-14 07:48:17', '2019-05-14 07:48:17'),
(537, 'project-assets/images/categories/weddinghalls.jpg', NULL, 'Fashion', 535, NULL, NULL, NULL, 'Adds', 1, '2019-05-14 07:48:17', '2019-05-14 07:48:17'),
(538, 'project-assets/images/categories/weddinghalls.jpg', NULL, 'Kid\'s Watches', 531, NULL, NULL, NULL, 'Adds', 1, '2019-05-14 07:48:17', '2019-05-14 07:48:17'),
(539, 'project-assets/images/categories/weddinghalls.jpg', NULL, 'Sunglasses', 531, NULL, NULL, NULL, 'Adds', 1, '2019-05-14 07:48:17', '2019-05-14 07:48:17'),
(540, 'project-assets/images/categories/weddinghalls.jpg', NULL, 'Men Sunglasses', 539, NULL, NULL, NULL, 'Adds', 1, '2019-05-14 07:48:17', '2019-05-14 07:48:17'),
(541, 'project-assets/images/categories/weddinghalls.jpg', NULL, 'Women Sunglasses', 539, NULL, NULL, NULL, 'Adds', 1, '2019-05-14 07:48:17', '2019-05-14 07:48:17'),
(542, 'project-assets/images/categories/weddinghalls.jpg', NULL, 'Unisex Sunglasses', 539, NULL, NULL, NULL, 'Adds', 1, '2019-05-14 07:48:17', '2019-05-14 07:48:17'),
(543, 'project-assets/images/categories/weddinghalls.jpg', NULL, 'Kids Sunglasses', 539, NULL, NULL, NULL, 'Adds', 1, '2019-05-14 07:48:17', '2019-05-14 07:48:17'),
(544, 'project-assets/images/categories/weddinghalls.jpg', NULL, 'Eyeglasses', 531, NULL, NULL, NULL, 'Adds', 1, '2019-05-14 07:48:17', '2019-05-14 07:48:17'),
(545, 'project-assets/images/categories/weddinghalls.jpg', NULL, 'Women Eyeglasses', 544, NULL, NULL, NULL, 'Adds', 1, '2019-05-14 07:48:18', '2019-05-14 07:48:18'),
(546, 'project-assets/images/categories/weddinghalls.jpg', NULL, 'Men Eyeglasses', 544, NULL, NULL, NULL, 'Adds', 1, '2019-05-14 07:48:18', '2019-05-14 07:48:18'),
(547, 'project-assets/images/categories/weddinghalls.jpg', NULL, 'Women Fashion Jewellery', 531, NULL, NULL, NULL, 'Adds', 1, '2019-05-14 07:48:18', '2019-05-14 07:48:18'),
(548, 'project-assets/images/categories/weddinghalls.jpg', NULL, 'Earrings', 547, NULL, NULL, NULL, 'Adds', 1, '2019-05-14 07:48:18', '2019-05-14 07:48:18'),
(549, 'project-assets/images/categories/weddinghalls.jpg', NULL, 'Men Fashion Jewellery', 531, NULL, NULL, NULL, 'Adds', 1, '2019-05-14 07:48:18', '2019-05-14 07:48:18'),
(550, 'project-assets/images/categories/weddinghalls.jpg', NULL, 'Shirt Accessories', 549, NULL, NULL, NULL, 'Adds', 1, '2019-05-14 07:48:18', '2019-05-14 07:48:18'),
(551, 'project-assets/images/categories/weddinghalls.jpg', NULL, 'Sports & Outdoor', NULL, NULL, NULL, NULL, 'Adds', 1, '2019-05-14 07:48:18', '2019-05-14 07:48:18'),
(552, 'project-assets/images/categories/weddinghalls.jpg', NULL, 'Men Shoes & Clothing', 551, NULL, NULL, NULL, 'Adds', 1, '2019-05-14 07:48:18', '2019-05-14 07:48:18'),
(553, 'project-assets/images/categories/weddinghalls.jpg', NULL, 'Clothing', 552, NULL, NULL, NULL, 'Adds', 1, '2019-05-14 07:48:18', '2019-05-14 07:48:18'),
(554, 'project-assets/images/categories/weddinghalls.jpg', NULL, 'Shoes', 552, NULL, NULL, NULL, 'Adds', 1, '2019-05-14 07:48:18', '2019-05-14 07:48:18'),
(555, 'project-assets/images/categories/weddinghalls.jpg', NULL, 'Accessories', 552, NULL, NULL, NULL, 'Adds', 1, '2019-05-14 07:48:18', '2019-05-14 07:48:18'),
(556, 'project-assets/images/categories/weddinghalls.jpg', NULL, 'Bags', 552, NULL, NULL, NULL, 'Adds', 1, '2019-05-14 07:48:18', '2019-05-14 07:48:18'),
(557, 'project-assets/images/categories/weddinghalls.jpg', NULL, 'Women Shoes & Clothing', 551, NULL, NULL, NULL, 'Adds', 1, '2019-05-14 07:48:19', '2019-05-14 07:48:19'),
(558, 'project-assets/images/categories/weddinghalls.jpg', NULL, 'Clothing', 557, NULL, NULL, NULL, 'Adds', 1, '2019-05-14 07:48:19', '2019-05-14 07:48:19'),
(559, 'project-assets/images/categories/weddinghalls.jpg', NULL, 'Shoes', 557, NULL, NULL, NULL, 'Adds', 1, '2019-05-14 07:48:19', '2019-05-14 07:48:19'),
(560, 'project-assets/images/categories/weddinghalls.jpg', NULL, 'Accessories', 557, NULL, NULL, NULL, 'Adds', 1, '2019-05-14 07:48:19', '2019-05-14 07:48:19'),
(561, 'project-assets/images/categories/weddinghalls.jpg', NULL, 'Bags', 557, NULL, NULL, NULL, 'Adds', 1, '2019-05-14 07:48:19', '2019-05-14 07:48:19'),
(562, 'project-assets/images/categories/weddinghalls.jpg', NULL, 'Outdoor Recreation', 551, NULL, NULL, NULL, 'Adds', 1, '2019-05-14 07:48:19', '2019-05-14 07:48:19'),
(563, 'project-assets/images/categories/weddinghalls.jpg', NULL, 'Camping & Hiking', 562, NULL, NULL, NULL, 'Adds', 1, '2019-05-14 07:48:19', '2019-05-14 07:48:19'),
(564, 'project-assets/images/categories/weddinghalls.jpg', NULL, 'Bikes', 562, NULL, NULL, NULL, 'Adds', 1, '2019-05-14 07:48:19', '2019-05-14 07:48:19'),
(565, 'project-assets/images/categories/weddinghalls.jpg', NULL, 'Bike Lights & Reflectors', 562, NULL, NULL, NULL, 'Adds', 1, '2019-05-14 07:48:19', '2019-05-14 07:48:19'),
(566, 'project-assets/images/categories/weddinghalls.jpg', NULL, 'Fishing', 562, NULL, NULL, NULL, 'Adds', 1, '2019-05-14 07:48:19', '2019-05-14 07:48:19'),
(567, 'project-assets/images/categories/weddinghalls.jpg', NULL, 'Golf', 562, NULL, NULL, NULL, 'Adds', 1, '2019-05-14 07:48:19', '2019-05-14 07:48:19'),
(568, 'project-assets/images/categories/weddinghalls.jpg', NULL, 'Skateboards', 562, NULL, NULL, NULL, 'Adds', 1, '2019-05-14 07:48:19', '2019-05-14 07:48:19'),
(569, 'project-assets/images/categories/weddinghalls.jpg', NULL, 'Exercise & Fitness', 551, NULL, NULL, NULL, 'Adds', 1, '2019-05-14 07:48:19', '2019-05-14 07:48:19'),
(570, 'project-assets/images/categories/weddinghalls.jpg', NULL, 'Yoga', 569, NULL, NULL, NULL, 'Adds', 1, '2019-05-14 07:48:19', '2019-05-14 07:48:19'),
(571, 'project-assets/images/categories/weddinghalls.jpg', NULL, 'Fitness Accessories', 569, NULL, NULL, NULL, 'Adds', 1, '2019-05-14 07:48:19', '2019-05-14 07:48:19'),
(572, 'project-assets/images/categories/weddinghalls.jpg', NULL, 'Cardio Equipment', 569, NULL, NULL, NULL, 'Adds', 1, '2019-05-14 07:48:19', '2019-05-14 07:48:19'),
(573, 'project-assets/images/categories/weddinghalls.jpg', NULL, 'Weights', 569, NULL, NULL, NULL, 'Adds', 1, '2019-05-14 07:48:19', '2019-05-14 07:48:19'),
(574, 'project-assets/images/categories/weddinghalls.jpg', NULL, 'Water Sports', 551, NULL, NULL, NULL, 'Adds', 1, '2019-05-14 07:48:19', '2019-05-14 07:48:19'),
(575, 'project-assets/images/categories/weddinghalls.jpg', NULL, 'Goggles', 574, NULL, NULL, NULL, 'Adds', 1, '2019-05-14 07:48:20', '2019-05-14 07:48:20'),
(576, 'project-assets/images/categories/weddinghalls.jpg', NULL, 'Floaties', 574, NULL, NULL, NULL, 'Adds', 1, '2019-05-14 07:48:20', '2019-05-14 07:48:20'),
(577, 'project-assets/images/categories/weddinghalls.jpg', NULL, 'Diving & Snorkelling', 574, NULL, NULL, NULL, 'Adds', 1, '2019-05-14 07:48:20', '2019-05-14 07:48:20'),
(578, 'project-assets/images/categories/weddinghalls.jpg', NULL, 'Boxing&Martial Arts', 551, NULL, NULL, NULL, 'Adds', 1, '2019-05-14 07:48:20', '2019-05-14 07:48:20'),
(579, 'project-assets/images/categories/weddinghalls.jpg', NULL, 'Gloves', 578, NULL, NULL, NULL, 'Adds', 1, '2019-05-14 07:48:20', '2019-05-14 07:48:20'),
(580, 'project-assets/images/categories/weddinghalls.jpg', NULL, 'Racket Sports', 551, NULL, NULL, NULL, 'Adds', 1, '2019-05-14 07:48:20', '2019-05-14 07:48:20'),
(581, 'project-assets/images/categories/weddinghalls.jpg', NULL, 'Badminton', 580, NULL, NULL, NULL, 'Adds', 1, '2019-05-14 07:48:20', '2019-05-14 07:48:20'),
(582, 'project-assets/images/categories/weddinghalls.jpg', NULL, 'Table Tennis', 580, NULL, NULL, NULL, 'Adds', 1, '2019-05-14 07:48:20', '2019-05-14 07:48:20'),
(583, 'project-assets/images/categories/weddinghalls.jpg', NULL, 'Team Sports', 551, NULL, NULL, NULL, 'Adds', 1, '2019-05-14 07:48:20', '2019-05-14 07:48:20'),
(584, 'project-assets/images/categories/weddinghalls.jpg', NULL, 'Football', 583, NULL, NULL, NULL, 'Adds', 1, '2019-05-14 07:48:20', '2019-05-14 07:48:20'),
(585, 'project-assets/images/categories/weddinghalls.jpg', NULL, 'Basketball', 583, NULL, NULL, NULL, 'Adds', 1, '2019-05-14 07:48:20', '2019-05-14 07:48:20'),
(586, 'project-assets/images/categories/weddinghalls.jpg', NULL, 'Cricket', 583, NULL, NULL, NULL, 'Adds', 1, '2019-05-14 07:48:20', '2019-05-14 07:48:20'),
(587, 'project-assets/images/categories/weddinghalls.jpg', NULL, 'Baseball', 583, NULL, NULL, NULL, 'Adds', 1, '2019-05-14 07:48:20', '2019-05-14 07:48:20'),
(588, 'project-assets/images/categories/weddinghalls.jpg', NULL, 'Water Bottles', 551, NULL, NULL, NULL, 'Adds', 1, '2019-05-14 07:48:20', '2019-05-14 07:48:20'),
(589, 'project-assets/images/categories/weddinghalls.jpg', NULL, 'Automotive & Motorbike', NULL, NULL, NULL, NULL, 'Adds', 1, '2019-05-14 07:48:20', '2019-05-14 07:48:20'),
(590, 'project-assets/images/categories/weddinghalls.jpg', NULL, 'Automotive', 589, NULL, NULL, NULL, 'Adds', 1, '2019-05-14 07:48:20', '2019-05-14 07:48:20'),
(591, 'project-assets/images/categories/weddinghalls.jpg', NULL, 'Auto Tires & Wheels', 590, NULL, NULL, NULL, 'Adds', 1, '2019-05-14 07:48:20', '2019-05-14 07:48:20'),
(592, 'project-assets/images/categories/weddinghalls.jpg', NULL, 'Auto Oils & Fluids', 590, NULL, NULL, NULL, 'Adds', 1, '2019-05-14 07:48:20', '2019-05-14 07:48:20'),
(593, 'project-assets/images/categories/weddinghalls.jpg', NULL, 'Interior Accessories', 590, NULL, NULL, NULL, 'Adds', 1, '2019-05-14 07:48:21', '2019-05-14 07:48:21'),
(594, 'project-assets/images/categories/weddinghalls.jpg', NULL, 'Auto Tools & Equipment', 590, NULL, NULL, NULL, 'Adds', 1, '2019-05-14 07:48:21', '2019-05-14 07:48:21'),
(595, 'project-assets/images/categories/weddinghalls.jpg', NULL, 'Auto Parts & Spares', 590, NULL, NULL, NULL, 'Adds', 1, '2019-05-14 07:48:21', '2019-05-14 07:48:21'),
(596, 'project-assets/images/categories/weddinghalls.jpg', NULL, 'GPS', 590, NULL, NULL, NULL, 'Adds', 1, '2019-05-14 07:48:21', '2019-05-14 07:48:21'),
(597, 'project-assets/images/categories/weddinghalls.jpg', NULL, 'Floor Mats & Cargo Liners ', 590, NULL, NULL, NULL, 'Adds', 1, '2019-05-14 07:48:21', '2019-05-14 07:48:21'),
(598, 'project-assets/images/categories/weddinghalls.jpg', NULL, 'Air Fresheners', 590, NULL, NULL, NULL, 'Adds', 1, '2019-05-14 07:48:21', '2019-05-14 07:48:21'),
(599, 'project-assets/images/categories/weddinghalls.jpg', NULL, 'Consoles & Organizers', 590, NULL, NULL, NULL, 'Adds', 1, '2019-05-14 07:48:21', '2019-05-14 07:48:21'),
(600, 'project-assets/images/categories/weddinghalls.jpg', NULL, 'Services&Installations', 589, NULL, NULL, NULL, 'Adds', 1, '2019-05-14 07:48:21', '2019-05-14 07:48:21'),
(601, 'project-assets/images/categories/weddinghalls.jpg', NULL, 'Services&Installations', 600, NULL, NULL, NULL, 'Adds', 1, '2019-05-14 07:48:21', '2019-05-14 07:48:21'),
(602, 'project-assets/images/categories/weddinghalls.jpg', NULL, 'Auto Oils & Fluids', 589, NULL, NULL, NULL, 'Adds', 1, '2019-05-14 07:48:21', '2019-05-14 07:48:21'),
(603, 'project-assets/images/categories/weddinghalls.jpg', NULL, 'Additives', 602, NULL, NULL, NULL, 'Adds', 1, '2019-05-14 07:48:21', '2019-05-14 07:48:21'),
(604, 'project-assets/images/categories/weddinghalls.jpg', NULL, 'Transmission Fluids', 602, NULL, NULL, NULL, 'Adds', 1, '2019-05-14 07:48:21', '2019-05-14 07:48:21'),
(605, 'project-assets/images/categories/weddinghalls.jpg', NULL, 'Auto Tires & Wheels', 589, NULL, NULL, NULL, 'Adds', 1, '2019-05-14 07:48:21', '2019-05-14 07:48:21'),
(606, 'project-assets/images/categories/weddinghalls.jpg', NULL, 'Tires', 605, NULL, NULL, NULL, 'Adds', 1, '2019-05-14 07:48:21', '2019-05-14 07:48:21'),
(607, 'project-assets/images/categories/weddinghalls.jpg', NULL, 'Wheel Accessories & Parts', 605, NULL, NULL, NULL, 'Adds', 1, '2019-05-14 07:48:21', '2019-05-14 07:48:21'),
(608, 'project-assets/images/categories/weddinghalls.jpg', NULL, 'Auto Care', 589, NULL, NULL, NULL, 'Adds', 1, '2019-05-14 07:48:21', '2019-05-14 07:48:21');
INSERT INTO `categories` (`id`, `profile_image`, `icon_image`, `name`, `parent_id`, `is_ad_additional_fields_req`, `is_ad_type_or_make_req`, `is_ad_condition_req`, `type`, `is_active`, `created_at`, `updated_at`) VALUES
(609, 'project-assets/images/categories/weddinghalls.jpg', NULL, 'Polishes & Waxes', 608, NULL, NULL, NULL, 'Adds', 1, '2019-05-14 07:48:21', '2019-05-14 07:48:21'),
(610, 'project-assets/images/categories/weddinghalls.jpg', NULL, 'Vacuums', 608, NULL, NULL, NULL, 'Adds', 1, '2019-05-14 07:48:21', '2019-05-14 07:48:21'),
(611, 'project-assets/images/categories/weddinghalls.jpg', NULL, 'Auto Electronics', 589, NULL, NULL, NULL, 'Adds', 1, '2019-05-14 07:48:22', '2019-05-14 07:48:22'),
(612, 'project-assets/images/categories/weddinghalls.jpg', NULL, 'Car Video', 611, NULL, NULL, NULL, 'Adds', 1, '2019-05-14 07:48:22', '2019-05-14 07:48:22'),
(613, 'project-assets/images/categories/weddinghalls.jpg', NULL, 'Car Stereo Receivers', 611, NULL, NULL, NULL, 'Adds', 1, '2019-05-14 07:48:22', '2019-05-14 07:48:22'),
(614, 'project-assets/images/categories/weddinghalls.jpg', NULL, 'Audio & Video Accessories', 611, NULL, NULL, NULL, 'Adds', 1, '2019-05-14 07:48:22', '2019-05-14 07:48:22'),
(615, 'project-assets/images/categories/weddinghalls.jpg', NULL, 'In-Dash DVD & Video', 611, NULL, NULL, NULL, 'Adds', 1, '2019-05-14 07:48:22', '2019-05-14 07:48:22'),
(616, 'project-assets/images/categories/weddinghalls.jpg', NULL, 'Speakers', 611, NULL, NULL, NULL, 'Adds', 1, '2019-05-14 07:48:22', '2019-05-14 07:48:22'),
(617, 'project-assets/images/categories/weddinghalls.jpg', NULL, 'Motorcycle', 589, NULL, NULL, NULL, 'Adds', 1, '2019-05-14 07:48:22', '2019-05-14 07:48:22'),
(618, 'project-assets/images/categories/weddinghalls.jpg', NULL, 'Scooters', 617, NULL, NULL, NULL, 'Adds', 1, '2019-05-14 07:48:22', '2019-05-14 07:48:22'),
(619, 'project-assets/images/categories/weddinghalls.jpg', NULL, 'Electric Bikes', 617, NULL, NULL, NULL, 'Adds', 1, '2019-05-14 07:48:22', '2019-05-14 07:48:22'),
(620, 'project-assets/images/categories/weddinghalls.jpg', NULL, 'Standard Bikes', 617, NULL, NULL, NULL, 'Adds', 1, '2019-05-14 07:48:22', '2019-05-14 07:48:22'),
(621, 'project-assets/images/categories/weddinghalls.jpg', NULL, 'ATVs & UTVs', 617, NULL, NULL, NULL, 'Adds', 1, '2019-05-14 07:48:22', '2019-05-14 07:48:22'),
(622, 'project-assets/images/categories/weddinghalls.jpg', NULL, 'Moto Parts & Accessories', 589, NULL, NULL, NULL, 'Adds', 1, '2019-05-14 07:48:22', '2019-05-14 07:48:22'),
(623, 'project-assets/images/categories/weddinghalls.jpg', NULL, 'Drivetrain & Transmission', 622, NULL, NULL, NULL, 'Adds', 1, '2019-05-14 07:48:22', '2019-05-14 07:48:22'),
(624, 'project-assets/images/categories/weddinghalls.jpg', NULL, 'Tires & Wheels', 622, NULL, NULL, NULL, 'Adds', 1, '2019-05-14 07:48:22', '2019-05-14 07:48:22'),
(625, 'project-assets/images/categories/weddinghalls.jpg', NULL, 'Moto Covers', 622, NULL, NULL, NULL, 'Adds', 1, '2019-05-14 07:48:22', '2019-05-14 07:48:22'),
(626, 'project-assets/images/categories/weddinghalls.jpg', NULL, 'Parts & Spares', 622, NULL, NULL, NULL, 'Adds', 1, '2019-05-14 07:48:22', '2019-05-14 07:48:22'),
(627, 'project-assets/images/categories/weddinghalls.jpg', NULL, 'Motorcycle Riding Gear', 589, NULL, NULL, NULL, 'Adds', 1, '2019-05-14 07:48:22', '2019-05-14 07:48:22'),
(628, 'project-assets/images/categories/weddinghalls.jpg', NULL, 'Helmet', 627, NULL, NULL, NULL, 'Adds', 1, '2019-05-14 07:48:22', '2019-05-14 07:48:22'),
(629, 'project-assets/images/categories/weddinghalls.jpg', NULL, 'Gloves', 627, NULL, NULL, NULL, 'Adds', 1, '2019-05-14 07:48:23', '2019-05-14 07:48:23'),
(630, 'project-assets/images/categories/weddinghalls.jpg', NULL, 'Chest & Back Protectors', 627, NULL, NULL, NULL, 'Adds', 1, '2019-05-14 07:48:23', '2019-05-14 07:48:23'),
(631, 'project-assets/images/categories/weddinghalls.jpg', NULL, 'Eyewear', 627, NULL, NULL, NULL, 'Adds', 1, '2019-05-14 07:48:23', '2019-05-14 07:48:23'),
(632, '', NULL, 'Food & Entertainment/Traveling', NULL, NULL, NULL, NULL, 'Business', 1, '2019-05-14 07:48:32', '2019-05-14 07:48:32'),
(633, '', NULL, 'Café', 632, NULL, NULL, NULL, 'Business', 1, '2019-05-14 07:48:32', '2019-05-14 07:48:32'),
(634, '', NULL, 'Restaurants', 632, NULL, NULL, NULL, 'Business', 1, '2019-05-14 07:48:32', '2019-05-14 07:48:32'),
(635, '', NULL, 'Bakeries', 632, NULL, NULL, NULL, 'Business', 1, '2019-05-14 07:48:32', '2019-05-14 07:48:32'),
(636, '', NULL, 'Fast Food Experts', 632, NULL, NULL, NULL, 'Business', 1, '2019-05-14 07:48:32', '2019-05-14 07:48:32'),
(637, '', NULL, 'Ice cream Shops & Juice Bars', 632, NULL, NULL, NULL, 'Business', 1, '2019-05-14 07:48:32', '2019-05-14 07:48:32'),
(638, '', NULL, 'Art Design& Cinemas', 632, NULL, NULL, NULL, 'Business', 1, '2019-05-14 07:48:32', '2019-05-14 07:48:32'),
(639, '', NULL, 'Serviced Apartments', 632, NULL, NULL, NULL, 'Business', 1, '2019-05-14 07:48:32', '2019-05-14 07:48:32'),
(640, '', NULL, 'Musical Instilments Dealers & Shops', 632, NULL, NULL, NULL, 'Business', 1, '2019-05-14 07:48:32', '2019-05-14 07:48:32'),
(641, '', NULL, 'Travel Agency/Agents', 632, NULL, NULL, NULL, 'Business', 1, '2019-05-14 07:48:32', '2019-05-14 07:48:32'),
(642, '', NULL, 'Hostels', 632, NULL, NULL, NULL, 'Business', 1, '2019-05-14 07:48:32', '2019-05-14 07:48:32'),
(643, '', NULL, 'Hotels & Motels', 632, NULL, NULL, NULL, 'Business', 1, '2019-05-14 07:48:32', '2019-05-14 07:48:32'),
(644, '', NULL, 'short courses & Training Centers', 14, NULL, NULL, NULL, 'Business', 1, '2019-05-14 07:48:32', '2019-05-14 07:48:32'),
(645, '', NULL, 'Madarsas.', 14, NULL, NULL, NULL, 'Business', 1, '2019-05-14 07:48:32', '2019-05-14 07:48:32'),
(646, '', NULL, 'Academies', 14, NULL, NULL, NULL, 'Business', 1, '2019-05-14 07:48:32', '2019-05-14 07:48:32'),
(647, '', NULL, 'Technical Training Centers', 14, NULL, NULL, NULL, 'Business', 1, '2019-05-14 07:48:32', '2019-05-14 07:48:32'),
(648, '', NULL, 'Book & Study material Suppliers', 14, NULL, NULL, NULL, 'Business', 1, '2019-05-14 07:48:32', '2019-05-14 07:48:32'),
(649, '', NULL, 'Freelance Tutors', 14, NULL, NULL, NULL, 'Business', 1, '2019-05-14 07:48:32', '2019-05-14 07:48:32'),
(650, '', NULL, 'Educational Equipment Suppliers', 14, NULL, NULL, NULL, 'Business', 1, '2019-05-14 07:48:32', '2019-05-14 07:48:32'),
(651, '', NULL, 'Uniform Dealers & Shops', 14, NULL, NULL, NULL, 'Business', 1, '2019-05-14 07:48:32', '2019-05-14 07:48:32'),
(652, '', NULL, 'chemist or pharmacist', 20, NULL, NULL, NULL, 'Business', 1, '2019-05-14 07:48:32', '2019-05-14 07:48:32'),
(653, '', NULL, 'Laboratories', 20, NULL, NULL, NULL, 'Business', 1, '2019-05-14 07:48:32', '2019-05-14 07:48:32'),
(654, '', NULL, 'Blood Banks', 20, NULL, NULL, NULL, 'Business', 1, '2019-05-14 07:48:32', '2019-05-14 07:48:32'),
(655, '', NULL, 'Health Insurance', 20, NULL, NULL, NULL, 'Business', 1, '2019-05-14 07:48:32', '2019-05-14 07:48:32'),
(656, '', NULL, 'Drug Dealers', 20, NULL, NULL, NULL, 'Business', 1, '2019-05-14 07:48:32', '2019-05-14 07:48:32'),
(657, '', NULL, 'Medical Equipment & Accessories Dealers', 20, NULL, NULL, NULL, 'Business', 1, '2019-05-14 07:48:32', '2019-05-14 07:48:32'),
(658, '', NULL, 'Fitness-Gym Centres', 20, NULL, NULL, NULL, 'Business', 1, '2019-05-14 07:48:32', '2019-05-14 07:48:32'),
(659, '', NULL, 'Fitness-Gym Equipment Dealers', 20, NULL, NULL, NULL, 'Business', 1, '2019-05-14 07:48:32', '2019-05-14 07:48:32'),
(660, '', NULL, 'Beauty salon & Skin Treatment Centers', 20, NULL, NULL, NULL, 'Business', 1, '2019-05-14 07:48:32', '2019-05-14 07:48:32'),
(661, '', NULL, 'Fashion', NULL, NULL, NULL, NULL, 'Business', 1, '2019-05-14 07:48:32', '2019-05-14 07:48:32'),
(662, '', NULL, 'Clothing', 661, NULL, NULL, NULL, 'Business', 1, '2019-05-14 07:48:32', '2019-05-14 07:48:32'),
(663, '', NULL, 'Boutiques & Ready to Wear', 661, NULL, NULL, NULL, 'Business', 1, '2019-05-14 07:48:32', '2019-05-14 07:48:32'),
(664, '', NULL, 'Shoes', 661, NULL, NULL, NULL, 'Business', 1, '2019-05-14 07:48:32', '2019-05-14 07:48:32'),
(665, '', NULL, 'Cosmetic & Body Care', 661, NULL, NULL, NULL, 'Business', 1, '2019-05-14 07:48:32', '2019-05-14 07:48:32'),
(666, '', NULL, 'Jewelry & Watches', 661, NULL, NULL, NULL, 'Business', 1, '2019-05-14 07:48:32', '2019-05-14 07:48:32'),
(667, '', NULL, 'Bags & Accessories', 661, NULL, NULL, NULL, 'Business', 1, '2019-05-14 07:48:32', '2019-05-14 07:48:32'),
(668, '', NULL, 'Beauty Salons', 661, NULL, NULL, NULL, 'Business', 1, '2019-05-14 07:48:32', '2019-05-14 07:48:32'),
(669, '', NULL, 'Fashion Designers', 661, NULL, NULL, NULL, 'Business', 1, '2019-05-14 07:48:32', '2019-05-14 07:48:32'),
(670, '', NULL, 'Sports Wear', 661, NULL, NULL, NULL, 'Business', 1, '2019-05-14 07:48:32', '2019-05-14 07:48:32'),
(671, '', NULL, 'Embroidery Services', 661, NULL, NULL, NULL, 'Business', 1, '2019-05-14 07:48:32', '2019-05-14 07:48:32'),
(672, '', NULL, 'Kids accessories & Toys', 661, NULL, NULL, NULL, 'Business', 1, '2019-05-14 07:48:32', '2019-05-14 07:48:32'),
(685, '', NULL, 'Telecom & Computing', NULL, NULL, NULL, NULL, 'Business', 1, '2019-05-14 07:48:32', '2019-05-14 07:48:32'),
(686, '', NULL, 'Voice/Call Centre Services', 685, NULL, NULL, NULL, 'Business', 1, '2019-05-14 07:48:32', '2019-05-14 07:48:32'),
(687, '', NULL, 'Telecom Equipment & Accessories', 685, NULL, NULL, NULL, 'Business', 1, '2019-05-14 07:48:32', '2019-05-14 07:48:32'),
(688, '', NULL, 'IT Security Companies', 685, NULL, NULL, NULL, 'Business', 1, '2019-05-14 07:48:32', '2019-05-14 07:48:32'),
(689, '', NULL, 'Mobile Phone Shops & Dealers', 685, NULL, NULL, NULL, 'Business', 1, '2019-05-14 07:48:32', '2019-05-14 07:48:32'),
(690, '', NULL, 'Computers/Networking Shops & Dealers', 685, NULL, NULL, NULL, 'Business', 1, '2019-05-14 07:48:32', '2019-05-14 07:48:32'),
(691, '', NULL, 'Electronics Shops & Dealers', 685, NULL, NULL, NULL, 'Business', 1, '2019-05-14 07:48:32', '2019-05-14 07:48:32'),
(692, '', NULL, 'Hardware Shops & Dealers', 685, NULL, NULL, NULL, 'Business', 1, '2019-05-14 07:48:32', '2019-05-14 07:48:32'),
(693, '', NULL, 'Musical Instruments', 685, NULL, NULL, NULL, 'Business', 1, '2019-05-14 07:48:32', '2019-05-14 07:48:32'),
(694, '', NULL, 'Mobile Repairing', 685, NULL, NULL, NULL, 'Business', 1, '2019-05-14 07:48:32', '2019-05-14 07:48:32'),
(695, '', NULL, 'Software Companies', 685, NULL, NULL, NULL, 'Business', 1, '2019-05-14 07:48:32', '2019-05-14 07:48:32'),
(696, '', NULL, 'Cell Phones & Accessories', 685, NULL, NULL, NULL, 'Business', 1, '2019-05-14 07:48:32', '2019-05-14 07:48:32'),
(697, '', NULL, 'Services & Solutions', NULL, NULL, NULL, NULL, 'Business', 1, '2019-05-14 07:48:32', '2019-05-14 07:48:32'),
(698, '', NULL, 'IT Services & Solutions', 697, NULL, NULL, NULL, 'Business', 1, '2019-05-14 07:48:32', '2019-05-14 07:48:32'),
(699, '', NULL, 'Advertisement & Printing Services', 697, NULL, NULL, NULL, 'Business', 1, '2019-05-14 07:48:32', '2019-05-14 07:48:32'),
(700, '', NULL, 'Courier & Cargo Services', 697, NULL, NULL, NULL, 'Business', 1, '2019-05-14 07:48:32', '2019-05-14 07:48:32'),
(701, '', NULL, 'Mirage Bureau & Services', 697, NULL, NULL, NULL, 'Business', 1, '2019-05-14 07:48:32', '2019-05-14 07:48:32'),
(702, '', NULL, 'Accounting & Taxation Services', 697, NULL, NULL, NULL, 'Business', 1, '2019-05-14 07:48:32', '2019-05-14 07:48:32'),
(703, '', NULL, 'Security Services', 697, NULL, NULL, NULL, 'Business', 1, '2019-05-14 07:48:32', '2019-05-14 07:48:32'),
(704, '', NULL, 'Legal services', 697, NULL, NULL, NULL, 'Business', 1, '2019-05-14 07:48:32', '2019-05-14 07:48:32'),
(705, '', NULL, 'Photography Services', 697, NULL, NULL, NULL, 'Business', 1, '2019-05-14 07:48:32', '2019-05-14 07:48:32'),
(706, '', NULL, 'Consulting Services', 697, NULL, NULL, NULL, 'Business', 1, '2019-05-14 07:48:32', '2019-05-14 07:48:32'),
(707, '', NULL, 'Business Services', 697, NULL, NULL, NULL, 'Business', 1, '2019-05-14 07:48:32', '2019-05-14 07:48:32'),
(708, '', NULL, 'business process outsourcing (BPO )', 697, NULL, NULL, NULL, 'Business', 1, '2019-05-14 07:48:32', '2019-05-14 07:48:32'),
(709, '', NULL, 'Business & Companies', NULL, NULL, NULL, NULL, 'Business', 1, '2019-05-14 07:48:32', '2019-05-14 07:48:32'),
(710, '', NULL, 'import & export', 709, NULL, NULL, NULL, 'Business', 1, '2019-05-14 07:48:33', '2019-05-14 07:48:33'),
(711, '', NULL, 'Recruitment / Employment Firms', 709, NULL, NULL, NULL, 'Business', 1, '2019-05-14 07:48:33', '2019-05-14 07:48:33'),
(712, '', NULL, 'Electronics & Home Appliances', 709, NULL, NULL, NULL, 'Business', 1, '2019-05-14 07:48:33', '2019-05-14 07:48:33'),
(713, '', NULL, 'Office Material & Stationary', 709, NULL, NULL, NULL, 'Business', 1, '2019-05-14 07:48:33', '2019-05-14 07:48:33'),
(714, '', NULL, 'Department store', 709, NULL, NULL, NULL, 'Business', 1, '2019-05-14 07:48:33', '2019-05-14 07:48:33'),
(715, '', NULL, 'Travel Agents /Service Provider', 709, NULL, NULL, NULL, 'Business', 1, '2019-05-14 07:48:33', '2019-05-14 07:48:33'),
(716, '', NULL, 'Manufacturing Material', 709, NULL, NULL, NULL, 'Business', 1, '2019-05-14 07:48:33', '2019-05-14 07:48:33'),
(717, '', NULL, 'Constructions Material Services', 709, NULL, NULL, NULL, 'Business', 1, '2019-05-14 07:48:33', '2019-05-14 07:48:33'),
(718, '', NULL, 'Building Material Services', 709, NULL, NULL, NULL, 'Business', 1, '2019-05-14 07:48:33', '2019-05-14 07:48:33'),
(719, '', NULL, 'Construction Services', 709, NULL, NULL, NULL, 'Business', 1, '2019-05-14 07:48:33', '2019-05-14 07:48:33'),
(720, '', NULL, 'Property Dealers', 709, NULL, NULL, NULL, 'Business', 1, '2019-05-14 07:48:33', '2019-05-14 07:48:33'),
(721, '', NULL, 'Home & Lifestyle', NULL, NULL, NULL, NULL, 'Business', 1, '2019-05-14 07:48:33', '2019-05-14 07:48:33'),
(722, '', NULL, 'Furniture Shops & Dealers', 721, NULL, NULL, NULL, 'Business', 1, '2019-05-14 07:48:33', '2019-05-14 07:48:33'),
(723, '', NULL, 'Kitchen ware', 721, NULL, NULL, NULL, 'Business', 1, '2019-05-14 07:48:33', '2019-05-14 07:48:33'),
(724, '', NULL, 'Home Decor', 721, NULL, NULL, NULL, 'Business', 1, '2019-05-14 07:48:33', '2019-05-14 07:48:33'),
(725, '', NULL, 'Grocery Shops', 721, NULL, NULL, NULL, 'Business', 1, '2019-05-14 07:48:33', '2019-05-14 07:48:33'),
(726, '', NULL, 'Lawn & Garden Services', 721, NULL, NULL, NULL, 'Business', 1, '2019-05-14 07:48:33', '2019-05-14 07:48:33'),
(727, '', NULL, 'Pet services', 721, NULL, NULL, NULL, 'Business', 1, '2019-05-14 07:48:33', '2019-05-14 07:48:33'),
(728, '', NULL, 'Tiler & Tiling Services', 721, NULL, NULL, NULL, 'Business', 1, '2019-05-14 07:48:33', '2019-05-14 07:48:33'),
(729, '', NULL, 'Timber Floor Supplies', 721, NULL, NULL, NULL, 'Business', 1, '2019-05-14 07:48:33', '2019-05-14 07:48:33'),
(730, '', NULL, 'Laundry & Cleaning', 721, NULL, NULL, NULL, 'Business', 1, '2019-05-14 07:48:33', '2019-05-14 07:48:33'),
(731, '', NULL, 'Bath & Bedding Accessories', 721, NULL, NULL, NULL, 'Business', 1, '2019-05-14 07:48:33', '2019-05-14 07:48:33'),
(732, '', NULL, 'Others', NULL, NULL, NULL, NULL, 'Business', 1, '2019-05-14 07:48:33', '2019-05-14 07:48:33'),
(733, '', NULL, 'Petrol Pumps', 732, NULL, NULL, NULL, 'Business', 1, '2019-05-14 07:48:33', '2019-05-14 07:48:33'),
(734, '', NULL, 'Banks & ATM', 732, NULL, NULL, NULL, 'Business', 1, '2019-05-14 07:48:33', '2019-05-14 07:48:33'),
(735, '', NULL, 'Mosque', 732, NULL, NULL, NULL, 'Business', 1, '2019-05-14 07:48:33', '2019-05-14 07:48:33'),
(736, '', NULL, 'Shopping Malls', 732, NULL, NULL, NULL, 'Business', 1, '2019-05-14 07:48:33', '2019-05-14 07:48:33'),
(737, '', NULL, 'weeding halls', 732, NULL, NULL, NULL, 'Business', 1, '2019-05-14 07:48:33', '2019-05-14 07:48:33'),
(738, '', NULL, 'Airports', 732, NULL, NULL, NULL, 'Business', 1, '2019-05-14 07:48:33', '2019-05-14 07:48:33'),
(739, '', NULL, 'Government', 732, NULL, NULL, NULL, 'Business', 1, '2019-05-14 07:48:33', '2019-05-14 07:48:33'),
(740, '', NULL, 'News/Events', 732, NULL, NULL, NULL, 'Business', 1, '2019-05-14 07:48:33', '2019-05-14 07:48:33'),
(741, '', NULL, 'Public Parks & Visit places', 732, NULL, NULL, NULL, 'Business', 1, '2019-05-14 07:48:33', '2019-05-14 07:48:33'),
(742, '', NULL, 'Farming', 732, NULL, NULL, NULL, 'Business', 1, '2019-05-14 07:48:33', '2019-05-14 07:48:33'),
(743, '', NULL, 'Charity - NGO’s- Volunteers', 732, NULL, NULL, NULL, 'Business', 1, '2019-05-14 07:48:33', '2019-05-14 07:48:33'),
(744, '', NULL, 'Agriculture', NULL, NULL, NULL, NULL, 'Shopping', 1, '2019-05-14 07:48:34', '2019-05-14 07:48:34'),
(745, '', NULL, 'Cutting Supplies', 744, NULL, NULL, NULL, 'Shopping', 1, '2019-05-14 07:48:34', '2019-05-14 07:48:34'),
(746, '', NULL, 'Animal Products', 744, NULL, NULL, NULL, 'Shopping', 1, '2019-05-14 07:48:34', '2019-05-14 07:48:34'),
(747, '', NULL, 'Beans', 744, NULL, NULL, NULL, 'Shopping', 1, '2019-05-14 07:48:34', '2019-05-14 07:48:34'),
(748, '', NULL, 'Cocoa Beans', 744, NULL, NULL, NULL, 'Shopping', 1, '2019-05-14 07:48:34', '2019-05-14 07:48:34'),
(749, '', NULL, 'Coffee Beans', 744, NULL, NULL, NULL, 'Shopping', 1, '2019-05-14 07:48:34', '2019-05-14 07:48:34'),
(750, '', NULL, 'Farm Machinery & Equipment', 744, NULL, NULL, NULL, 'Shopping', 1, '2019-05-14 07:48:34', '2019-05-14 07:48:34'),
(751, '', NULL, 'Feed', 744, NULL, NULL, NULL, 'Shopping', 1, '2019-05-14 07:48:34', '2019-05-14 07:48:34'),
(752, '', NULL, 'Fresh Seafood', 744, NULL, NULL, NULL, 'Shopping', 1, '2019-05-14 07:48:34', '2019-05-14 07:48:34'),
(753, '', NULL, 'Fruit', 744, NULL, NULL, NULL, 'Shopping', 1, '2019-05-14 07:48:34', '2019-05-14 07:48:34'),
(754, '', NULL, 'Grain', 744, NULL, NULL, NULL, 'Shopping', 1, '2019-05-14 07:48:34', '2019-05-14 07:48:34'),
(755, '', NULL, 'Herbal Cigars & Cigarettes', 744, NULL, NULL, NULL, 'Shopping', 1, '2019-05-14 07:48:34', '2019-05-14 07:48:34'),
(756, '', NULL, 'Mushrooms & Truffle', 744, NULL, NULL, NULL, 'Shopping', 1, '2019-05-14 07:48:34', '2019-05-14 07:48:34'),
(757, '', NULL, 'Nuts & Kernels', 744, NULL, NULL, NULL, 'Shopping', 1, '2019-05-14 07:48:34', '2019-05-14 07:48:34'),
(758, '', NULL, 'Organic Produce', 744, NULL, NULL, NULL, 'Shopping', 1, '2019-05-14 07:48:34', '2019-05-14 07:48:34'),
(759, '', NULL, 'Ornamental Plants', 744, NULL, NULL, NULL, 'Shopping', 1, '2019-05-14 07:48:34', '2019-05-14 07:48:34'),
(760, '', NULL, 'Other Agriculture Products', 744, NULL, NULL, NULL, 'Shopping', 1, '2019-05-14 07:48:34', '2019-05-14 07:48:34'),
(761, '', NULL, 'Plant & Animal Oil', 744, NULL, NULL, NULL, 'Shopping', 1, '2019-05-14 07:48:34', '2019-05-14 07:48:34'),
(762, '', NULL, 'Plant Seeds & Bulbs', 744, NULL, NULL, NULL, 'Shopping', 1, '2019-05-14 07:48:34', '2019-05-14 07:48:34'),
(763, '', NULL, 'Timber Raw Materials', 744, NULL, NULL, NULL, 'Shopping', 1, '2019-05-14 07:48:34', '2019-05-14 07:48:34'),
(764, '', NULL, 'Vanilla Beans', 744, NULL, NULL, NULL, 'Shopping', 1, '2019-05-14 07:48:34', '2019-05-14 07:48:34'),
(765, '', NULL, 'Vegetables', 744, NULL, NULL, NULL, 'Shopping', 1, '2019-05-14 07:48:34', '2019-05-14 07:48:34'),
(766, '', NULL, 'Food & Beverage', NULL, NULL, NULL, NULL, 'Shopping', 1, '2019-05-14 07:48:34', '2019-05-14 07:48:34'),
(767, '', NULL, 'Alcoholic Beverage', 766, NULL, NULL, NULL, 'Shopping', 1, '2019-05-14 07:48:34', '2019-05-14 07:48:34'),
(768, '', NULL, 'Baby Food', 766, NULL, NULL, NULL, 'Shopping', 1, '2019-05-14 07:48:34', '2019-05-14 07:48:34'),
(769, '', NULL, 'Baked Goods', 766, NULL, NULL, NULL, 'Shopping', 1, '2019-05-14 07:48:34', '2019-05-14 07:48:34'),
(770, '', NULL, 'Bean Products', 766, NULL, NULL, NULL, 'Shopping', 1, '2019-05-14 07:48:34', '2019-05-14 07:48:34'),
(771, '', NULL, 'Canned Food', 766, NULL, NULL, NULL, 'Shopping', 1, '2019-05-14 07:48:34', '2019-05-14 07:48:34'),
(772, '', NULL, 'Coffee', 766, NULL, NULL, NULL, 'Shopping', 1, '2019-05-14 07:48:34', '2019-05-14 07:48:34'),
(773, '', NULL, 'Confectionery', 766, NULL, NULL, NULL, 'Shopping', 1, '2019-05-14 07:48:34', '2019-05-14 07:48:34'),
(774, '', NULL, 'Dairy', 766, NULL, NULL, NULL, 'Shopping', 1, '2019-05-14 07:48:34', '2019-05-14 07:48:34'),
(775, '', NULL, 'Drinking Water', 766, NULL, NULL, NULL, 'Shopping', 1, '2019-05-14 07:48:34', '2019-05-14 07:48:34'),
(776, '', NULL, 'Egg & Egg Products', 766, NULL, NULL, NULL, 'Shopping', 1, '2019-05-14 07:48:34', '2019-05-14 07:48:34'),
(777, '', NULL, 'Food Ingredients', 766, NULL, NULL, NULL, 'Shopping', 1, '2019-05-14 07:48:34', '2019-05-14 07:48:34'),
(778, '', NULL, 'Fruit Products', 766, NULL, NULL, NULL, 'Shopping', 1, '2019-05-14 07:48:34', '2019-05-14 07:48:34'),
(779, '', NULL, 'Grain Products', 766, NULL, NULL, NULL, 'Shopping', 1, '2019-05-14 07:48:34', '2019-05-14 07:48:34'),
(780, '', NULL, 'Honey Products', 766, NULL, NULL, NULL, 'Shopping', 1, '2019-05-14 07:48:34', '2019-05-14 07:48:34'),
(781, '', NULL, 'Instant Food', 766, NULL, NULL, NULL, 'Shopping', 1, '2019-05-14 07:48:34', '2019-05-14 07:48:34'),
(782, '', NULL, 'Meat & Poultry', 766, NULL, NULL, NULL, 'Shopping', 1, '2019-05-14 07:48:34', '2019-05-14 07:48:34'),
(783, '', NULL, 'Other Food & Beverage', 766, NULL, NULL, NULL, 'Shopping', 1, '2019-05-14 07:48:34', '2019-05-14 07:48:34'),
(784, '', NULL, 'Seafood', 766, NULL, NULL, NULL, 'Shopping', 1, '2019-05-14 07:48:34', '2019-05-14 07:48:34'),
(785, '', NULL, 'Seasonings & Condiments', 766, NULL, NULL, NULL, 'Shopping', 1, '2019-05-14 07:48:34', '2019-05-14 07:48:34'),
(786, '', NULL, 'Slimming Food', 766, NULL, NULL, NULL, 'Shopping', 1, '2019-05-14 07:48:34', '2019-05-14 07:48:34'),
(787, '', NULL, 'Snack Food', 766, NULL, NULL, NULL, 'Shopping', 1, '2019-05-14 07:48:34', '2019-05-14 07:48:34'),
(788, '', NULL, 'Soft Drinks', 766, NULL, NULL, NULL, 'Shopping', 1, '2019-05-14 07:48:34', '2019-05-14 07:48:34'),
(789, '', NULL, 'Tea', 766, NULL, NULL, NULL, 'Shopping', 1, '2019-05-14 07:48:34', '2019-05-14 07:48:34'),
(790, '', NULL, 'Vegetable Products', 766, NULL, NULL, NULL, 'Shopping', 1, '2019-05-14 07:48:34', '2019-05-14 07:48:34'),
(791, '', NULL, 'Apparel', NULL, NULL, NULL, NULL, 'Shopping', 1, '2019-05-14 07:48:34', '2019-05-14 07:48:34'),
(792, '', NULL, 'Apparel Design Services', 791, NULL, NULL, NULL, 'Shopping', 1, '2019-05-14 07:48:34', '2019-05-14 07:48:34'),
(793, '', NULL, 'Apparel Processing Services', 791, NULL, NULL, NULL, 'Shopping', 1, '2019-05-14 07:48:34', '2019-05-14 07:48:34'),
(794, '', NULL, 'Apparel Stock', 791, NULL, NULL, NULL, 'Shopping', 1, '2019-05-14 07:48:34', '2019-05-14 07:48:34'),
(795, '', NULL, 'Boy\'s Clothing', 791, NULL, NULL, NULL, 'Shopping', 1, '2019-05-14 07:48:34', '2019-05-14 07:48:34'),
(796, '', NULL, 'Costumes', 791, NULL, NULL, NULL, 'Shopping', 1, '2019-05-14 07:48:34', '2019-05-14 07:48:34'),
(797, '', NULL, 'Ethnic Clothing', 791, NULL, NULL, NULL, 'Shopping', 1, '2019-05-14 07:48:34', '2019-05-14 07:48:34'),
(798, '', NULL, 'Garment Accessories', 791, NULL, NULL, NULL, 'Shopping', 1, '2019-05-14 07:48:34', '2019-05-14 07:48:34'),
(799, '', NULL, 'Girl‘s Clothing', 791, NULL, NULL, NULL, 'Shopping', 1, '2019-05-14 07:48:34', '2019-05-14 07:48:34'),
(800, '', NULL, 'Infant & Toddlers Clothing', 791, NULL, NULL, NULL, 'Shopping', 1, '2019-05-14 07:48:34', '2019-05-14 07:48:34'),
(801, '', NULL, 'Mannequins', 791, NULL, NULL, NULL, 'Shopping', 1, '2019-05-14 07:48:34', '2019-05-14 07:48:34'),
(802, '', NULL, 'aternity Clothing', 791, NULL, NULL, NULL, 'Shopping', 1, '2019-05-14 07:48:34', '2019-05-14 07:48:34'),
(803, '', NULL, 'Men‘s Clothing', 791, NULL, NULL, NULL, 'Shopping', 1, '2019-05-14 07:48:34', '2019-05-14 07:48:34'),
(804, '', NULL, 'Sewing Supplies', 791, NULL, NULL, NULL, 'Shopping', 1, '2019-05-14 07:48:34', '2019-05-14 07:48:34'),
(805, '', NULL, 'Sportswear', 791, NULL, NULL, NULL, 'Shopping', 1, '2019-05-14 07:48:34', '2019-05-14 07:48:34'),
(806, '', NULL, 'Stage & Dance Wear', 791, NULL, NULL, NULL, 'Shopping', 1, '2019-05-14 07:48:34', '2019-05-14 07:48:34'),
(807, '', NULL, 'Tag Guns', 791, NULL, NULL, NULL, 'Shopping', 1, '2019-05-14 07:48:34', '2019-05-14 07:48:34'),
(808, '', NULL, 'Uniforms', 791, NULL, NULL, NULL, 'Shopping', 1, '2019-05-14 07:48:34', '2019-05-14 07:48:34'),
(809, '', NULL, 'Used Clothes', 791, NULL, NULL, NULL, 'Shopping', 1, '2019-05-14 07:48:34', '2019-05-14 07:48:34'),
(810, '', NULL, 'Apparel & Accessories', 791, NULL, NULL, NULL, 'Shopping', 1, '2019-05-14 07:48:34', '2019-05-14 07:48:34'),
(811, '', NULL, 'Women\'s Clothing', 791, NULL, NULL, NULL, 'Shopping', 1, '2019-05-14 07:48:34', '2019-05-14 07:48:34'),
(812, '', NULL, 'Textile & Leather Product', NULL, NULL, NULL, NULL, 'Shopping', 1, '2019-05-14 07:48:34', '2019-05-14 07:48:34'),
(813, '', NULL, 'Down & Feather', 812, NULL, NULL, NULL, 'Shopping', 1, '2019-05-14 07:48:34', '2019-05-14 07:48:34'),
(814, '', NULL, 'Fabric', 812, NULL, NULL, NULL, 'Shopping', 1, '2019-05-14 07:48:34', '2019-05-14 07:48:34'),
(815, '', NULL, 'Fiber', 812, NULL, NULL, NULL, 'Shopping', 1, '2019-05-14 07:48:34', '2019-05-14 07:48:34'),
(816, '', NULL, 'Fur', 812, NULL, NULL, NULL, 'Shopping', 1, '2019-05-14 07:48:34', '2019-05-14 07:48:34'),
(817, '', NULL, 'Grey Fabric', 812, NULL, NULL, NULL, 'Shopping', 1, '2019-05-14 07:48:34', '2019-05-14 07:48:34'),
(818, '', NULL, 'Home Textile', 812, NULL, NULL, NULL, 'Shopping', 1, '2019-05-14 07:48:34', '2019-05-14 07:48:34'),
(819, '', NULL, 'Leather', 812, NULL, NULL, NULL, 'Shopping', 1, '2019-05-14 07:48:34', '2019-05-14 07:48:34'),
(820, '', NULL, 'Leather Product', 812, NULL, NULL, NULL, 'Shopping', 1, '2019-05-14 07:48:34', '2019-05-14 07:48:34'),
(821, '', NULL, 'Other Textiles & Leather Products', 812, NULL, NULL, NULL, 'Shopping', 1, '2019-05-14 07:48:34', '2019-05-14 07:48:34'),
(822, '', NULL, 'Textile Accessories', 812, NULL, NULL, NULL, 'Shopping', 1, '2019-05-14 07:48:34', '2019-05-14 07:48:34'),
(823, '', NULL, 'Textile Processing', 812, NULL, NULL, NULL, 'Shopping', 1, '2019-05-14 07:48:34', '2019-05-14 07:48:34'),
(824, '', NULL, 'Textile Stock', 812, NULL, NULL, NULL, 'Shopping', 1, '2019-05-14 07:48:34', '2019-05-14 07:48:34'),
(825, '', NULL, 'Thread', 812, NULL, NULL, NULL, 'Shopping', 1, '2019-05-14 07:48:34', '2019-05-14 07:48:34'),
(826, '', NULL, 'Yarn', 812, NULL, NULL, NULL, 'Shopping', 1, '2019-05-14 07:48:34', '2019-05-14 07:48:34'),
(827, '', NULL, '100% Cotton Fabric', 812, NULL, NULL, NULL, 'Shopping', 1, '2019-05-14 07:48:34', '2019-05-14 07:48:34'),
(828, '', NULL, '100% Polyester Fabric', 812, NULL, NULL, NULL, 'Shopping', 1, '2019-05-14 07:48:34', '2019-05-14 07:48:34'),
(829, '', NULL, 'Bedding Set', 812, NULL, NULL, NULL, 'Shopping', 1, '2019-05-14 07:48:34', '2019-05-14 07:48:34'),
(830, '', NULL, 'Towel', 812, NULL, NULL, NULL, 'Shopping', 1, '2019-05-14 07:48:34', '2019-05-14 07:48:34'),
(831, '', NULL, 'Chair Cover', 812, NULL, NULL, NULL, 'Shopping', 1, '2019-05-14 07:48:35', '2019-05-14 07:48:35'),
(832, '', NULL, 'Genuine Leather', 812, NULL, NULL, NULL, 'Shopping', 1, '2019-05-14 07:48:35', '2019-05-14 07:48:35'),
(833, '', NULL, 'Fashion Accessories', NULL, NULL, NULL, NULL, 'Shopping', 1, '2019-05-14 07:48:35', '2019-05-14 07:48:35'),
(834, '', NULL, 'Belt Accessories', 833, NULL, NULL, NULL, 'Shopping', 1, '2019-05-14 07:48:35', '2019-05-14 07:48:35'),
(835, '', NULL, 'Belts', 833, NULL, NULL, NULL, 'Shopping', 1, '2019-05-14 07:48:35', '2019-05-14 07:48:35'),
(836, '', NULL, 'Fashion Accessories', 833, NULL, NULL, NULL, 'Shopping', 1, '2019-05-14 07:48:35', '2019-05-14 07:48:35'),
(837, '', NULL, 'Design Services', 833, NULL, NULL, NULL, 'Shopping', 1, '2019-05-14 07:48:35', '2019-05-14 07:48:35'),
(838, '', NULL, 'Fashion Accessories Processing Services', 833, NULL, NULL, NULL, 'Shopping', 1, '2019-05-14 07:48:35', '2019-05-14 07:48:35'),
(839, '', NULL, 'Fashion Accessories Stock', 833, NULL, NULL, NULL, 'Shopping', 1, '2019-05-14 07:48:35', '2019-05-14 07:48:35'),
(840, '', NULL, 'Gloves & Mittens', 833, NULL, NULL, NULL, 'Shopping', 1, '2019-05-14 07:48:35', '2019-05-14 07:48:35'),
(841, '', NULL, 'Scarf, Hat & Glove Sets', 833, NULL, NULL, NULL, 'Shopping', 1, '2019-05-14 07:48:35', '2019-05-14 07:48:35'),
(842, '', NULL, 'Hats & Caps', 833, NULL, NULL, NULL, 'Shopping', 1, '2019-05-14 07:48:35', '2019-05-14 07:48:35'),
(843, '', NULL, 'Scarves & Shawls', 833, NULL, NULL, NULL, 'Shopping', 1, '2019-05-14 07:48:35', '2019-05-14 07:48:35'),
(844, '', NULL, 'Hair Accessories', 833, NULL, NULL, NULL, 'Shopping', 1, '2019-05-14 07:48:35', '2019-05-14 07:48:35'),
(845, '', NULL, 'Genuine Leather Belts', 833, NULL, NULL, NULL, 'Shopping', 1, '2019-05-14 07:48:35', '2019-05-14 07:48:35'),
(846, '', NULL, 'Leather Gloves & Mittens', 833, NULL, NULL, NULL, 'Shopping', 1, '2019-05-14 07:48:35', '2019-05-14 07:48:35'),
(847, '', NULL, 'Ties & Accessories', 833, NULL, NULL, NULL, 'Shopping', 1, '2019-05-14 07:48:35', '2019-05-14 07:48:35'),
(848, '', NULL, 'Belt Buckles', 833, NULL, NULL, NULL, 'Shopping', 1, '2019-05-14 07:48:35', '2019-05-14 07:48:35'),
(849, '', NULL, 'PU Belts', 833, NULL, NULL, NULL, 'Shopping', 1, '2019-05-14 07:48:35', '2019-05-14 07:48:35'),
(850, '', NULL, 'Belt Chains', 833, NULL, NULL, NULL, 'Shopping', 1, '2019-05-14 07:48:35', '2019-05-14 07:48:35'),
(851, '', NULL, 'Metal Belts', 833, NULL, NULL, NULL, 'Shopping', 1, '2019-05-14 07:48:35', '2019-05-14 07:48:35'),
(852, '', NULL, 'Suspenders', 833, NULL, NULL, NULL, 'Shopping', 1, '2019-05-14 07:48:35', '2019-05-14 07:48:35'),
(853, '', NULL, 'Timepieces, Jewelry, Eyewear', NULL, NULL, NULL, NULL, 'Shopping', 1, '2019-05-14 07:48:35', '2019-05-14 07:48:35'),
(854, '', NULL, 'Eyewear', 853, NULL, NULL, NULL, 'Shopping', 1, '2019-05-14 07:48:35', '2019-05-14 07:48:35'),
(855, '', NULL, 'Jewelry', 853, NULL, NULL, NULL, 'Shopping', 1, '2019-05-14 07:48:35', '2019-05-14 07:48:35'),
(856, '', NULL, 'Watches', 853, NULL, NULL, NULL, 'Shopping', 1, '2019-05-14 07:48:35', '2019-05-14 07:48:35'),
(857, '', NULL, 'Eyeglasses Frames', 853, NULL, NULL, NULL, 'Shopping', 1, '2019-05-14 07:48:35', '2019-05-14 07:48:35'),
(858, '', NULL, 'Sunglasses', 853, NULL, NULL, NULL, 'Shopping', 1, '2019-05-14 07:48:35', '2019-05-14 07:48:35'),
(859, '', NULL, 'Sports Eyewear', 853, NULL, NULL, NULL, 'Shopping', 1, '2019-05-14 07:48:35', '2019-05-14 07:48:35'),
(860, '', NULL, 'body Jewelry', 853, NULL, NULL, NULL, 'Shopping', 1, '2019-05-14 07:48:35', '2019-05-14 07:48:35'),
(861, '', NULL, 'Bracelets & Bangles', 853, NULL, NULL, NULL, 'Shopping', 1, '2019-05-14 07:48:35', '2019-05-14 07:48:35'),
(862, '', NULL, 'Cuff Links & Tie Clips', 853, NULL, NULL, NULL, 'Shopping', 1, '2019-05-14 07:48:35', '2019-05-14 07:48:35'),
(863, '', NULL, 'Earrings', 853, NULL, NULL, NULL, 'Shopping', 1, '2019-05-14 07:48:35', '2019-05-14 07:48:35'),
(864, '', NULL, 'Jewelry Boxes', 853, NULL, NULL, NULL, 'Shopping', 1, '2019-05-14 07:48:35', '2019-05-14 07:48:35'),
(865, '', NULL, 'Jewelry Sets', 853, NULL, NULL, NULL, 'Shopping', 1, '2019-05-14 07:48:35', '2019-05-14 07:48:35'),
(866, '', NULL, 'Jewelry Tools & Equipment', 853, NULL, NULL, NULL, 'Shopping', 1, '2019-05-14 07:48:35', '2019-05-14 07:48:35'),
(867, '', NULL, 'Loose Beads', 853, NULL, NULL, NULL, 'Shopping', 1, '2019-05-14 07:48:35', '2019-05-14 07:48:35'),
(868, '', NULL, 'Loose Gemstone', 853, NULL, NULL, NULL, 'Shopping', 1, '2019-05-14 07:48:35', '2019-05-14 07:48:35'),
(869, '', NULL, 'Necklaces', 853, NULL, NULL, NULL, 'Shopping', 1, '2019-05-14 07:48:35', '2019-05-14 07:48:35'),
(870, '', NULL, 'Pendants & Charms', 853, NULL, NULL, NULL, 'Shopping', 1, '2019-05-14 07:48:35', '2019-05-14 07:48:35'),
(871, '', NULL, 'Rings', 853, NULL, NULL, NULL, 'Shopping', 1, '2019-05-14 07:48:35', '2019-05-14 07:48:35'),
(872, '', NULL, 'Wristwatches', 853, NULL, NULL, NULL, 'Shopping', 1, '2019-05-14 07:48:35', '2019-05-14 07:48:35'),
(873, '', NULL, 'Vehicles & Accessories', NULL, NULL, NULL, NULL, 'Shopping', 1, '2019-05-14 07:48:35', '2019-05-14 07:48:35'),
(874, '', NULL, 'Automobiles', 873, NULL, NULL, NULL, 'Shopping', 1, '2019-05-14 07:48:35', '2019-05-14 07:48:35'),
(875, '', NULL, 'Tricycles', 873, NULL, NULL, NULL, 'Shopping', 1, '2019-05-14 07:48:35', '2019-05-14 07:48:35'),
(876, '', NULL, 'Trailers', 873, NULL, NULL, NULL, 'Shopping', 1, '2019-05-14 07:48:35', '2019-05-14 07:48:35'),
(877, '', NULL, 'New Energy Vehicle Parts & Accessories', 873, NULL, NULL, NULL, 'Shopping', 1, '2019-05-14 07:48:35', '2019-05-14 07:48:35'),
(878, '', NULL, 'Trucks', 873, NULL, NULL, NULL, 'Shopping', 1, '2019-05-14 07:48:35', '2019-05-14 07:48:35'),
(879, '', NULL, 'Golf Carts', 873, NULL, NULL, NULL, 'Shopping', 1, '2019-05-14 07:48:35', '2019-05-14 07:48:35'),
(880, '', NULL, 'Marine Parts & Accessories', 873, NULL, NULL, NULL, 'Shopping', 1, '2019-05-14 07:48:35', '2019-05-14 07:48:35'),
(881, '', NULL, 'Truck Parts & Accessories', 873, NULL, NULL, NULL, 'Shopping', 1, '2019-05-14 07:48:35', '2019-05-14 07:48:35'),
(882, '', NULL, 'Trains', 873, NULL, NULL, NULL, 'Shopping', 1, '2019-05-14 07:48:35', '2019-05-14 07:48:35'),
(883, '', NULL, 'Motorcycles & Scooters', 873, NULL, NULL, NULL, 'Shopping', 1, '2019-05-14 07:48:35', '2019-05-14 07:48:35'),
(884, '', NULL, 'Auto Parts & Accessories', 873, NULL, NULL, NULL, 'Shopping', 1, '2019-05-14 07:48:35', '2019-05-14 07:48:35'),
(885, '', NULL, 'Emergency Vehicles', 873, NULL, NULL, NULL, 'Shopping', 1, '2019-05-14 07:48:35', '2019-05-14 07:48:35'),
(886, '', NULL, 'Bus Parts & Accessories', 873, NULL, NULL, NULL, 'Shopping', 1, '2019-05-14 07:48:35', '2019-05-14 07:48:35'),
(887, '', NULL, 'ATVs & UTVs', 873, NULL, NULL, NULL, 'Shopping', 1, '2019-05-14 07:48:35', '2019-05-14 07:48:35'),
(888, '', NULL, 'Bus', 873, NULL, NULL, NULL, 'Shopping', 1, '2019-05-14 07:48:35', '2019-05-14 07:48:35'),
(889, '', NULL, 'Containers', 873, NULL, NULL, NULL, 'Shopping', 1, '2019-05-14 07:48:35', '2019-05-14 07:48:35'),
(890, '', NULL, 'Other Vehicle Parts & Accessories', 873, NULL, NULL, NULL, 'Shopping', 1, '2019-05-14 07:48:35', '2019-05-14 07:48:35'),
(891, '', NULL, 'Other Vehicles', 873, NULL, NULL, NULL, 'Shopping', 1, '2019-05-14 07:48:35', '2019-05-14 07:48:35'),
(892, '', NULL, 'Luggage, Bags & Cases', NULL, NULL, NULL, NULL, 'Shopping', 1, '2019-05-14 07:48:35', '2019-05-14 07:48:35'),
(893, '', NULL, 'Bag & Luggage Making Materials', 892, NULL, NULL, NULL, 'Shopping', 1, '2019-05-14 07:48:35', '2019-05-14 07:48:35'),
(894, '', NULL, 'Bag Parts & Accessories', 892, NULL, NULL, NULL, 'Shopping', 1, '2019-05-14 07:48:35', '2019-05-14 07:48:35'),
(895, '', NULL, 'Business Bags & Cases', 892, NULL, NULL, NULL, 'Shopping', 1, '2019-05-14 07:48:35', '2019-05-14 07:48:35'),
(896, '', NULL, 'Digital Gear & Camera Bags', 892, NULL, NULL, NULL, 'Shopping', 1, '2019-05-14 07:48:35', '2019-05-14 07:48:35'),
(897, '', NULL, 'Handbags & Messenger Bags', 892, NULL, NULL, NULL, 'Shopping', 1, '2019-05-14 07:48:35', '2019-05-14 07:48:35'),
(898, '', NULL, 'Luggage & Travel Bags', 892, NULL, NULL, NULL, 'Shopping', 1, '2019-05-14 07:48:35', '2019-05-14 07:48:35'),
(899, '', NULL, 'Luggage Cart', 892, NULL, NULL, NULL, 'Shopping', 1, '2019-05-14 07:48:35', '2019-05-14 07:48:35'),
(900, '', NULL, 'Other Luggage, Bags & Cases', 892, NULL, NULL, NULL, 'Shopping', 1, '2019-05-14 07:48:35', '2019-05-14 07:48:35'),
(901, '', NULL, 'Special Purpose Bags & Cases', 892, NULL, NULL, NULL, 'Shopping', 1, '2019-05-14 07:48:35', '2019-05-14 07:48:35'),
(902, '', NULL, 'Sports & Leisure Bags', 892, NULL, NULL, NULL, 'Shopping', 1, '2019-05-14 07:48:35', '2019-05-14 07:48:35'),
(903, '', NULL, 'Wallets & Holders', 892, NULL, NULL, NULL, 'Shopping', 1, '2019-05-14 07:48:35', '2019-05-14 07:48:35'),
(904, '', NULL, 'Carry-on Luggage', 892, NULL, NULL, NULL, 'Shopping', 1, '2019-05-14 07:48:35', '2019-05-14 07:48:35'),
(905, '', NULL, 'Luggage Sets', 892, NULL, NULL, NULL, 'Shopping', 1, '2019-05-14 07:48:35', '2019-05-14 07:48:35'),
(906, '', NULL, 'Trolley Bags', 892, NULL, NULL, NULL, 'Shopping', 1, '2019-05-14 07:48:35', '2019-05-14 07:48:35'),
(907, '', NULL, 'Briefcases', 892, NULL, NULL, NULL, 'Shopping', 1, '2019-05-14 07:48:35', '2019-05-14 07:48:35'),
(908, '', NULL, 'Cosmetic Bags & Cases', 892, NULL, NULL, NULL, 'Shopping', 1, '2019-05-14 07:48:35', '2019-05-14 07:48:35'),
(909, '', NULL, 'Shopping Bags', 892, NULL, NULL, NULL, 'Shopping', 1, '2019-05-14 07:48:35', '2019-05-14 07:48:35'),
(910, '', NULL, 'Handbags', 892, NULL, NULL, NULL, 'Shopping', 1, '2019-05-14 07:48:35', '2019-05-14 07:48:35'),
(911, '', NULL, 'Backpacks', 892, NULL, NULL, NULL, 'Shopping', 1, '2019-05-14 07:48:35', '2019-05-14 07:48:35'),
(912, '', NULL, 'Wallets', 892, NULL, NULL, NULL, 'Shopping', 1, '2019-05-14 07:48:35', '2019-05-14 07:48:35'),
(913, '', NULL, 'Shoes & Accessories', NULL, NULL, NULL, NULL, 'Shopping', 1, '2019-05-14 07:48:35', '2019-05-14 07:48:35'),
(914, '', NULL, 'Baby Shoes', 913, NULL, NULL, NULL, 'Shopping', 1, '2019-05-14 07:48:35', '2019-05-14 07:48:35'),
(915, '', NULL, 'Children\'s Shoes', 913, NULL, NULL, NULL, 'Shopping', 1, '2019-05-14 07:48:35', '2019-05-14 07:48:35'),
(916, '', NULL, 'Dance Shoes', 913, NULL, NULL, NULL, 'Shopping', 1, '2019-05-14 07:48:35', '2019-05-14 07:48:35'),
(917, '', NULL, 'Genuine Leather Shoes', 913, NULL, NULL, NULL, 'Shopping', 1, '2019-05-14 07:48:35', '2019-05-14 07:48:35'),
(918, '', NULL, 'Men\'s Shoes', 913, NULL, NULL, NULL, 'Shopping', 1, '2019-05-14 07:48:35', '2019-05-14 07:48:35'),
(919, '', NULL, 'Other Shoes', 913, NULL, NULL, NULL, 'Shopping', 1, '2019-05-14 07:48:35', '2019-05-14 07:48:35'),
(920, '', NULL, 'Shoe Materials', 913, NULL, NULL, NULL, 'Shopping', 1, '2019-05-14 07:48:35', '2019-05-14 07:48:35'),
(921, '', NULL, 'Shoe Parts & Accessories', 913, NULL, NULL, NULL, 'Shopping', 1, '2019-05-14 07:48:35', '2019-05-14 07:48:35'),
(922, '', NULL, 'Shoe Repairing Equipment', 913, NULL, NULL, NULL, 'Shopping', 1, '2019-05-14 07:48:35', '2019-05-14 07:48:35'),
(923, '', NULL, 'Shoes Design Services', 913, NULL, NULL, NULL, 'Shopping', 1, '2019-05-14 07:48:35', '2019-05-14 07:48:35'),
(924, '', NULL, 'Shoes Processing Services', 913, NULL, NULL, NULL, 'Shopping', 1, '2019-05-14 07:48:35', '2019-05-14 07:48:35'),
(925, '', NULL, 'Shoes Stock', 913, NULL, NULL, NULL, 'Shopping', 1, '2019-05-14 07:48:35', '2019-05-14 07:48:35'),
(926, '', NULL, 'Special Purpose Shoes', 913, NULL, NULL, NULL, 'Shopping', 1, '2019-05-14 07:48:35', '2019-05-14 07:48:35'),
(927, '', NULL, 'Sports Shoes', 913, NULL, NULL, NULL, 'Shopping', 1, '2019-05-14 07:48:35', '2019-05-14 07:48:35'),
(928, '', NULL, 'Used Shoes', 913, NULL, NULL, NULL, 'Shopping', 1, '2019-05-14 07:48:35', '2019-05-14 07:48:35'),
(929, '', NULL, 'Women\'s Shoes', 913, NULL, NULL, NULL, 'Shopping', 1, '2019-05-14 07:48:35', '2019-05-14 07:48:35'),
(930, '', NULL, 'Consumer Electronic', NULL, NULL, NULL, NULL, 'Shopping', 1, '2019-05-14 07:48:35', '2019-05-14 07:48:35'),
(931, '', NULL, 'Computer Hardware & Software', 930, NULL, NULL, NULL, 'Shopping', 1, '2019-05-14 07:48:35', '2019-05-14 07:48:35'),
(932, '', NULL, 'Electronic Cigarettes', 930, NULL, NULL, NULL, 'Shopping', 1, '2019-05-14 07:48:35', '2019-05-14 07:48:35'),
(933, '', NULL, 'Accessories & Parts', 930, NULL, NULL, NULL, 'Shopping', 1, '2019-05-14 07:48:35', '2019-05-14 07:48:35'),
(934, '', NULL, 'Camera, Photo & Accessories', 930, NULL, NULL, NULL, 'Shopping', 1, '2019-05-14 07:48:35', '2019-05-14 07:48:35'),
(935, '', NULL, 'Electronic Publications', 930, NULL, NULL, NULL, 'Shopping', 1, '2019-05-14 07:48:35', '2019-05-14 07:48:35'),
(936, '', NULL, 'Home Audio, Video & Accessories', 930, NULL, NULL, NULL, 'Shopping', 1, '2019-05-14 07:48:35', '2019-05-14 07:48:35'),
(937, '', NULL, 'Mobile Phone & Accessories', 930, NULL, NULL, NULL, 'Shopping', 1, '2019-05-14 07:48:35', '2019-05-14 07:48:35'),
(938, '', NULL, 'Other Consumer Electronics', 930, NULL, NULL, NULL, 'Shopping', 1, '2019-05-14 07:48:35', '2019-05-14 07:48:35'),
(939, '', NULL, 'Portable Audio, Video & Accessories', 930, NULL, NULL, NULL, 'Shopping', 1, '2019-05-14 07:48:35', '2019-05-14 07:48:35'),
(940, '', NULL, 'Video Game & Accessories', 930, NULL, NULL, NULL, 'Shopping', 1, '2019-05-14 07:48:35', '2019-05-14 07:48:35'),
(941, '', NULL, 'Mobile Phones', 930, NULL, NULL, NULL, 'Shopping', 1, '2019-05-14 07:48:35', '2019-05-14 07:48:35'),
(942, '', NULL, 'Earphone & Headphone', 930, NULL, NULL, NULL, 'Shopping', 1, '2019-05-14 07:48:35', '2019-05-14 07:48:35'),
(943, '', NULL, 'Power Banks', 930, NULL, NULL, NULL, 'Shopping', 1, '2019-05-14 07:48:35', '2019-05-14 07:48:35'),
(944, '', NULL, 'Digital Camera', 930, NULL, NULL, NULL, 'Shopping', 1, '2019-05-14 07:48:35', '2019-05-14 07:48:35'),
(945, '', NULL, 'Radio & TV Accessories', 930, NULL, NULL, NULL, 'Shopping', 1, '2019-05-14 07:48:35', '2019-05-14 07:48:35'),
(946, '', NULL, 'Speaker', 930, NULL, NULL, NULL, 'Shopping', 1, '2019-05-14 07:48:35', '2019-05-14 07:48:35'),
(947, '', NULL, 'Television', 930, NULL, NULL, NULL, 'Shopping', 1, '2019-05-14 07:48:35', '2019-05-14 07:48:35'),
(948, '', NULL, 'Cables', 930, NULL, NULL, NULL, 'Shopping', 1, '2019-05-14 07:48:35', '2019-05-14 07:48:35'),
(949, '', NULL, 'Charger', 930, NULL, NULL, NULL, 'Shopping', 1, '2019-05-14 07:48:35', '2019-05-14 07:48:35'),
(950, '', NULL, 'Digital Battery', 930, NULL, NULL, NULL, 'Shopping', 1, '2019-05-14 07:48:35', '2019-05-14 07:48:35'),
(951, '', NULL, 'Digital Photo Frame', 930, NULL, NULL, NULL, 'Shopping', 1, '2019-05-14 07:48:35', '2019-05-14 07:48:35'),
(952, '', NULL, '3D Glasses', 930, NULL, NULL, NULL, 'Shopping', 1, '2019-05-14 07:48:35', '2019-05-14 07:48:35'),
(953, '', NULL, 'Home Appliance', NULL, NULL, NULL, NULL, 'Shopping', 1, '2019-05-14 07:48:35', '2019-05-14 07:48:35'),
(954, '', NULL, 'Air Conditioning Appliances', 953, NULL, NULL, NULL, 'Shopping', 1, '2019-05-14 07:48:35', '2019-05-14 07:48:35'),
(955, '', NULL, 'Cleaning Appliances', 953, NULL, NULL, NULL, 'Shopping', 1, '2019-05-14 07:48:35', '2019-05-14 07:48:35'),
(956, '', NULL, 'Hand Dryers', 953, NULL, NULL, NULL, 'Shopping', 1, '2019-05-14 07:48:35', '2019-05-14 07:48:35'),
(957, '', NULL, 'Home Appliance Parts', 953, NULL, NULL, NULL, 'Shopping', 1, '2019-05-14 07:48:35', '2019-05-14 07:48:35'),
(958, '', NULL, 'Home Appliances Stocks', 953, NULL, NULL, NULL, 'Shopping', 1, '2019-05-14 07:48:35', '2019-05-14 07:48:35'),
(959, '', NULL, 'Home Heaters', 953, NULL, NULL, NULL, 'Shopping', 1, '2019-05-14 07:48:35', '2019-05-14 07:48:35'),
(960, '', NULL, 'Kitchen Appliances', 953, NULL, NULL, NULL, 'Shopping', 1, '2019-05-14 07:48:35', '2019-05-14 07:48:35'),
(961, '', NULL, 'Laundry Appliances', 953, NULL, NULL, NULL, 'Shopping', 1, '2019-05-14 07:48:35', '2019-05-14 07:48:35'),
(962, '', NULL, 'Other Home Appliances', 953, NULL, NULL, NULL, 'Shopping', 1, '2019-05-14 07:48:35', '2019-05-14 07:48:35'),
(963, '', NULL, 'Refrigerators & Freezers', 953, NULL, NULL, NULL, 'Shopping', 1, '2019-05-14 07:48:35', '2019-05-14 07:48:35'),
(964, '', NULL, 'Water Heaters', 953, NULL, NULL, NULL, 'Shopping', 1, '2019-05-14 07:48:35', '2019-05-14 07:48:35'),
(965, '', NULL, 'Water Treatment Appliances', 953, NULL, NULL, NULL, 'Shopping', 1, '2019-05-14 07:48:35', '2019-05-14 07:48:35'),
(966, '', NULL, 'Wet Towel Dispensers', 953, NULL, NULL, NULL, 'Shopping', 1, '2019-05-14 07:48:35', '2019-05-14 07:48:35'),
(967, '', NULL, 'Air Conditioners', 953, NULL, NULL, NULL, 'Shopping', 1, '2019-05-14 07:48:35', '2019-05-14 07:48:35'),
(968, '', NULL, 'Fans', 953, NULL, NULL, NULL, 'Shopping', 1, '2019-05-14 07:48:35', '2019-05-14 07:48:35'),
(969, '', NULL, 'Vacuum Cleaners', 953, NULL, NULL, NULL, 'Shopping', 1, '2019-05-14 07:48:35', '2019-05-14 07:48:35'),
(970, '', NULL, 'Solar Water Heaters', 953, NULL, NULL, NULL, 'Shopping', 1, '2019-05-14 07:48:35', '2019-05-14 07:48:35'),
(971, '', NULL, 'Cooking Appliances', 953, NULL, NULL, NULL, 'Shopping', 1, '2019-05-14 07:48:35', '2019-05-14 07:48:35'),
(972, '', NULL, 'Coffee Makers', 953, NULL, NULL, NULL, 'Shopping', 1, '2019-05-14 07:48:35', '2019-05-14 07:48:35'),
(973, '', NULL, 'Blenders', 953, NULL, NULL, NULL, 'Shopping', 1, '2019-05-14 07:48:35', '2019-05-14 07:48:35'),
(974, '', NULL, 'Security & Protection', NULL, NULL, NULL, NULL, 'Shopping', 1, '2019-05-14 07:48:35', '2019-05-14 07:48:35'),
(975, '', NULL, 'Locks & Keys', 974, NULL, NULL, NULL, 'Shopping', 1, '2019-05-14 07:48:35', '2019-05-14 07:48:35'),
(976, '', NULL, 'Personal Protective Equipment', 974, NULL, NULL, NULL, 'Shopping', 1, '2019-05-14 07:48:35', '2019-05-14 07:48:35'),
(977, '', NULL, 'Access Control Systems & Products', 974, NULL, NULL, NULL, 'Shopping', 1, '2019-05-14 07:48:35', '2019-05-14 07:48:35'),
(978, '', NULL, 'Alarm', 974, NULL, NULL, NULL, 'Shopping', 1, '2019-05-14 07:48:35', '2019-05-14 07:48:35'),
(979, '', NULL, 'CCTV Products', 974, NULL, NULL, NULL, 'Shopping', 1, '2019-05-14 07:48:35', '2019-05-14 07:48:35'),
(980, '', NULL, 'Firefighting Supplies', 974, NULL, NULL, NULL, 'Shopping', 1, '2019-05-14 07:48:35', '2019-05-14 07:48:35'),
(981, '', NULL, 'Locksmith Supplies', 974, NULL, NULL, NULL, 'Shopping', 1, '2019-05-14 07:48:35', '2019-05-14 07:48:35'),
(982, '', NULL, 'Other Security & Protection Products', 974, NULL, NULL, NULL, 'Shopping', 1, '2019-05-14 07:48:35', '2019-05-14 07:48:35'),
(983, '', NULL, 'Police & Military Supplies', 974, NULL, NULL, NULL, 'Shopping', 1, '2019-05-14 07:48:35', '2019-05-14 07:48:35'),
(984, '', NULL, 'Roadway Safety', 974, NULL, NULL, NULL, 'Shopping', 1, '2019-05-14 07:48:35', '2019-05-14 07:48:35'),
(985, '', NULL, 'Safes', 974, NULL, NULL, NULL, 'Shopping', 1, '2019-05-14 07:48:35', '2019-05-14 07:48:35'),
(986, '', NULL, 'Security Services', 974, NULL, NULL, NULL, 'Shopping', 1, '2019-05-14 07:48:35', '2019-05-14 07:48:35'),
(987, '', NULL, 'Self Defense Supplies', 974, NULL, NULL, NULL, 'Shopping', 1, '2019-05-14 07:48:35', '2019-05-14 07:48:35'),
(988, '', NULL, 'Water Safety Products', 974, NULL, NULL, NULL, 'Shopping', 1, '2019-05-14 07:48:35', '2019-05-14 07:48:35'),
(989, '', NULL, 'CCTV Camera', 974, NULL, NULL, NULL, 'Shopping', 1, '2019-05-14 07:48:35', '2019-05-14 07:48:35'),
(990, '', NULL, 'Bullet Proof Vest', 974, NULL, NULL, NULL, 'Shopping', 1, '2019-05-14 07:48:35', '2019-05-14 07:48:35'),
(991, '', NULL, 'Alcohol Tester', 974, NULL, NULL, NULL, 'Shopping', 1, '2019-05-14 07:48:35', '2019-05-14 07:48:35'),
(992, '', NULL, 'Fire Alarm', 974, NULL, NULL, NULL, 'Shopping', 1, '2019-05-14 07:48:35', '2019-05-14 07:48:35'),
(993, '', NULL, 'Electrical Equipment & Supplies', NULL, NULL, NULL, NULL, 'Shopping', 1, '2019-05-14 07:48:35', '2019-05-14 07:48:35'),
(994, '', NULL, 'Solar Energy Products', 993, NULL, NULL, NULL, 'Shopping', 1, '2019-05-14 07:48:35', '2019-05-14 07:48:35'),
(995, '', NULL, 'Batteries', 993, NULL, NULL, NULL, 'Shopping', 1, '2019-05-14 07:48:35', '2019-05-14 07:48:35'),
(996, '', NULL, 'Electrical Instruments', 993, NULL, NULL, NULL, 'Shopping', 1, '2019-05-14 07:48:35', '2019-05-14 07:48:35'),
(997, '', NULL, 'Circuit Breakers', 993, NULL, NULL, NULL, 'Shopping', 1, '2019-05-14 07:48:35', '2019-05-14 07:48:35'),
(998, '', NULL, 'Connectors & Terminals', 993, NULL, NULL, NULL, 'Shopping', 1, '2019-05-14 07:48:35', '2019-05-14 07:48:35'),
(999, '', NULL, 'Industrial Controls', 993, NULL, NULL, NULL, 'Shopping', 1, '2019-05-14 07:48:35', '2019-05-14 07:48:35'),
(1000, '', NULL, 'Contactors', 993, NULL, NULL, NULL, 'Shopping', 1, '2019-05-14 07:48:35', '2019-05-14 07:48:35'),
(1001, '', NULL, 'Electrical Plugs & Sockets', 993, NULL, NULL, NULL, 'Shopping', 1, '2019-05-14 07:48:35', '2019-05-14 07:48:35'),
(1002, '', NULL, 'Motors', 993, NULL, NULL, NULL, 'Shopping', 1, '2019-05-14 07:48:35', '2019-05-14 07:48:35'),
(1003, '', NULL, 'Electrical Supplies', 993, NULL, NULL, NULL, 'Shopping', 1, '2019-05-14 07:48:35', '2019-05-14 07:48:35'),
(1004, '', NULL, 'Electronic & Instrument Enclosures', 993, NULL, NULL, NULL, 'Shopping', 1, '2019-05-14 07:48:35', '2019-05-14 07:48:35'),
(1005, '', NULL, 'Fuse Components', 993, NULL, NULL, NULL, 'Shopping', 1, '2019-05-14 07:48:35', '2019-05-14 07:48:35'),
(1006, '', NULL, 'Fuses', 993, NULL, NULL, NULL, 'Shopping', 1, '2019-05-14 07:48:35', '2019-05-14 07:48:35'),
(1007, '', NULL, 'Generators', 993, NULL, NULL, NULL, 'Shopping', 1, '2019-05-14 07:48:35', '2019-05-14 07:48:35'),
(1008, '', NULL, 'Power Accessories', 993, NULL, NULL, NULL, 'Shopping', 1, '2019-05-14 07:48:35', '2019-05-14 07:48:35'),
(1009, '', NULL, 'Power Distribution Equipment', 993, NULL, NULL, NULL, 'Shopping', 1, '2019-05-14 07:48:35', '2019-05-14 07:48:35'),
(1010, '', NULL, 'Power Supplies', 993, NULL, NULL, NULL, 'Shopping', 1, '2019-05-14 07:48:35', '2019-05-14 07:48:35'),
(1011, '', NULL, 'Professional Audio, Video & Lighting', 993, NULL, NULL, NULL, 'Shopping', 1, '2019-05-14 07:48:35', '2019-05-14 07:48:35'),
(1012, '', NULL, 'Relays', 993, NULL, NULL, NULL, 'Shopping', 1, '2019-05-14 07:48:35', '2019-05-14 07:48:35'),
(1013, '', NULL, 'Switches', 993, NULL, NULL, NULL, 'Shopping', 1, '2019-05-14 07:48:35', '2019-05-14 07:48:35'),
(1014, '', NULL, 'Transformers', 993, NULL, NULL, NULL, 'Shopping', 1, '2019-05-14 07:48:35', '2019-05-14 07:48:35'),
(1015, '', NULL, 'Wires, Cables & Cable Assemblies', 993, NULL, NULL, NULL, 'Shopping', 1, '2019-05-14 07:48:35', '2019-05-14 07:48:35'),
(1016, '', NULL, 'Wiring Accessories', 993, NULL, NULL, NULL, 'Shopping', 1, '2019-05-14 07:48:35', '2019-05-14 07:48:35'),
(1017, '', NULL, 'Solar Cells, Solar Panel', 993, NULL, NULL, NULL, 'Shopping', 1, '2019-05-14 07:48:35', '2019-05-14 07:48:35'),
(1018, '', NULL, 'Telecommunication', NULL, NULL, NULL, NULL, 'Shopping', 1, '2019-05-14 07:48:35', '2019-05-14 07:48:35'),
(1019, '', NULL, 'Antennas for Communications', 1018, NULL, NULL, NULL, 'Shopping', 1, '2019-05-14 07:48:35', '2019-05-14 07:48:35'),
(1020, '', NULL, 'Communication Equipment', 1018, NULL, NULL, NULL, 'Shopping', 1, '2019-05-14 07:48:35', '2019-05-14 07:48:35'),
(1021, '', NULL, 'Telephones & Accessories', 1018, NULL, NULL, NULL, 'Shopping', 1, '2019-05-14 07:48:35', '2019-05-14 07:48:35'),
(1022, '', NULL, 'Communication Cables', 1018, NULL, NULL, NULL, 'Shopping', 1, '2019-05-14 07:48:35', '2019-05-14 07:48:35'),
(1023, '', NULL, 'Fiber Optic Equipment', 1018, NULL, NULL, NULL, 'Shopping', 1, '2019-05-14 07:48:35', '2019-05-14 07:48:35'),
(1024, '', NULL, 'Fixed Wireless Terminals', 1018, NULL, NULL, NULL, 'Shopping', 1, '2019-05-14 07:48:35', '2019-05-14 07:48:35'),
(1025, '', NULL, 'WiFi Finder', 1018, NULL, NULL, NULL, 'Shopping', 1, '2019-05-14 07:48:35', '2019-05-14 07:48:35');
INSERT INTO `categories` (`id`, `profile_image`, `icon_image`, `name`, `parent_id`, `is_ad_additional_fields_req`, `is_ad_type_or_make_req`, `is_ad_condition_req`, `type`, `is_active`, `created_at`, `updated_at`) VALUES
(1026, '', NULL, 'Telephone Accessories', 1018, NULL, NULL, NULL, 'Shopping', 1, '2019-05-14 07:48:35', '2019-05-14 07:48:35'),
(1027, '', NULL, 'Corded Telephones', 1018, NULL, NULL, NULL, 'Shopping', 1, '2019-05-14 07:48:35', '2019-05-14 07:48:35'),
(1028, '', NULL, 'Cordless Telephones', 1018, NULL, NULL, NULL, 'Shopping', 1, '2019-05-14 07:48:35', '2019-05-14 07:48:35'),
(1029, '', NULL, 'Wireless Networking Equipment', 1018, NULL, NULL, NULL, 'Shopping', 1, '2019-05-14 07:48:35', '2019-05-14 07:48:35'),
(1030, '', NULL, 'Telephone Headsets', 1018, NULL, NULL, NULL, 'Shopping', 1, '2019-05-14 07:48:35', '2019-05-14 07:48:35'),
(1031, '', NULL, 'VoIP Products', 1018, NULL, NULL, NULL, 'Shopping', 1, '2019-05-14 07:48:35', '2019-05-14 07:48:35'),
(1032, '', NULL, 'Repeater', 1018, NULL, NULL, NULL, 'Shopping', 1, '2019-05-14 07:48:35', '2019-05-14 07:48:35'),
(1033, '', NULL, 'PBX', 1018, NULL, NULL, NULL, 'Shopping', 1, '2019-05-14 07:48:35', '2019-05-14 07:48:35'),
(1034, '', NULL, 'Telecom Parts', 1018, NULL, NULL, NULL, 'Shopping', 1, '2019-05-14 07:48:35', '2019-05-14 07:48:35'),
(1035, '', NULL, 'Phone Cards', 1018, NULL, NULL, NULL, 'Shopping', 1, '2019-05-14 07:48:35', '2019-05-14 07:48:35'),
(1036, '', NULL, 'Telephone Cords', 1018, NULL, NULL, NULL, 'Shopping', 1, '2019-05-14 07:48:35', '2019-05-14 07:48:35'),
(1037, '', NULL, 'Answering Machines', 1018, NULL, NULL, NULL, 'Shopping', 1, '2019-05-14 07:48:35', '2019-05-14 07:48:35'),
(1038, '', NULL, 'Caller ID Boxes', 1018, NULL, NULL, NULL, 'Shopping', 1, '2019-05-14 07:48:35', '2019-05-14 07:48:35'),
(1039, '', NULL, 'Sports & Entertainment', NULL, NULL, NULL, NULL, 'Shopping', 1, '2019-05-14 07:48:35', '2019-05-14 07:48:35'),
(1040, '', NULL, 'Amusement Park', 1039, NULL, NULL, NULL, 'Shopping', 1, '2019-05-14 07:48:35', '2019-05-14 07:48:35'),
(1041, '', NULL, 'Artificial Grass & Sports Flooring', 1039, NULL, NULL, NULL, 'Shopping', 1, '2019-05-14 07:48:35', '2019-05-14 07:48:35'),
(1042, '', NULL, 'Fitness & Body Building', 1039, NULL, NULL, NULL, 'Shopping', 1, '2019-05-14 07:48:35', '2019-05-14 07:48:35'),
(1043, '', NULL, 'Gambling', 1039, NULL, NULL, NULL, 'Shopping', 1, '2019-05-14 07:48:35', '2019-05-14 07:48:35'),
(1044, '', NULL, 'Golf', 1039, NULL, NULL, NULL, 'Shopping', 1, '2019-05-14 07:48:35', '2019-05-14 07:48:35'),
(1045, '', NULL, 'Indoor Sports', 1039, NULL, NULL, NULL, 'Shopping', 1, '2019-05-14 07:48:35', '2019-05-14 07:48:35'),
(1046, '', NULL, 'Musical Instruments', 1039, NULL, NULL, NULL, 'Shopping', 1, '2019-05-14 07:48:35', '2019-05-14 07:48:35'),
(1047, '', NULL, 'Other Sports & Entertainment Products', 1039, NULL, NULL, NULL, 'Shopping', 1, '2019-05-14 07:48:35', '2019-05-14 07:48:35'),
(1048, '', NULL, 'Outdoor Sports', 1039, NULL, NULL, NULL, 'Shopping', 1, '2019-05-14 07:48:35', '2019-05-14 07:48:35'),
(1049, '', NULL, 'Sports Gloves', 1039, NULL, NULL, NULL, 'Shopping', 1, '2019-05-14 07:48:35', '2019-05-14 07:48:35'),
(1050, '', NULL, 'Sports Safety', 1039, NULL, NULL, NULL, 'Shopping', 1, '2019-05-14 07:48:35', '2019-05-14 07:48:35'),
(1051, '', NULL, 'Sports Souvenirs', 1039, NULL, NULL, NULL, 'Shopping', 1, '2019-05-14 07:48:35', '2019-05-14 07:48:35'),
(1052, '', NULL, 'Team Sports', 1039, NULL, NULL, NULL, 'Shopping', 1, '2019-05-14 07:48:35', '2019-05-14 07:48:35'),
(1053, '', NULL, 'Tennis', 1039, NULL, NULL, NULL, 'Shopping', 1, '2019-05-14 07:48:35', '2019-05-14 07:48:35'),
(1054, '', NULL, 'Water Sports', 1039, NULL, NULL, NULL, 'Shopping', 1, '2019-05-14 07:48:35', '2019-05-14 07:48:35'),
(1055, '', NULL, 'Winter Sports', 1039, NULL, NULL, NULL, 'Shopping', 1, '2019-05-14 07:48:35', '2019-05-14 07:48:35'),
(1056, '', NULL, 'Camping & Hiking', 1039, NULL, NULL, NULL, 'Shopping', 1, '2019-05-14 07:48:35', '2019-05-14 07:48:35'),
(1057, '', NULL, 'Scooters', 1039, NULL, NULL, NULL, 'Shopping', 1, '2019-05-14 07:48:35', '2019-05-14 07:48:35'),
(1058, '', NULL, 'Gym Equipment', 1039, NULL, NULL, NULL, 'Shopping', 1, '2019-05-14 07:48:35', '2019-05-14 07:48:35'),
(1059, '', NULL, 'Swimming & Diving', 1039, NULL, NULL, NULL, 'Shopping', 1, '2019-05-14 07:48:35', '2019-05-14 07:48:35'),
(1060, '', NULL, 'Gifts & Crafts', NULL, NULL, NULL, NULL, 'Shopping', 1, '2019-05-14 07:48:35', '2019-05-14 07:48:35'),
(1061, '', NULL, 'Art & Collectible', 1060, NULL, NULL, NULL, 'Shopping', 1, '2019-05-14 07:48:35', '2019-05-14 07:48:35'),
(1062, '', NULL, 'Crafts', 1060, NULL, NULL, NULL, 'Shopping', 1, '2019-05-14 07:48:35', '2019-05-14 07:48:35'),
(1063, '', NULL, 'Arts & Crafts Stocks', 1060, NULL, NULL, NULL, 'Shopping', 1, '2019-05-14 07:48:35', '2019-05-14 07:48:35'),
(1064, '', NULL, 'Cross Stitch', 1060, NULL, NULL, NULL, 'Shopping', 1, '2019-05-14 07:48:35', '2019-05-14 07:48:35'),
(1065, '', NULL, 'Festive & Party Supplies', 1060, NULL, NULL, NULL, 'Shopping', 1, '2019-05-14 07:48:35', '2019-05-14 07:48:35'),
(1066, '', NULL, 'Flags, Banners & Accessories', 1060, NULL, NULL, NULL, 'Shopping', 1, '2019-05-14 07:48:35', '2019-05-14 07:48:35'),
(1067, '', NULL, 'Gift Sets', 1060, NULL, NULL, NULL, 'Shopping', 1, '2019-05-14 07:48:35', '2019-05-14 07:48:35'),
(1068, '', NULL, 'Holiday Gifts', 1060, NULL, NULL, NULL, 'Shopping', 1, '2019-05-14 07:48:35', '2019-05-14 07:48:35'),
(1069, '', NULL, 'Home Decoration', 1060, NULL, NULL, NULL, 'Shopping', 1, '2019-05-14 07:48:35', '2019-05-14 07:48:35'),
(1070, '', NULL, 'Key Chains', 1060, NULL, NULL, NULL, 'Shopping', 1, '2019-05-14 07:48:35', '2019-05-14 07:48:35'),
(1071, '', NULL, 'Knitting & Crocheting', 1060, NULL, NULL, NULL, 'Shopping', 1, '2019-05-14 07:48:35', '2019-05-14 07:48:35'),
(1072, '', NULL, 'Lacquerware', 1060, NULL, NULL, NULL, 'Shopping', 1, '2019-05-14 07:48:35', '2019-05-14 07:48:35'),
(1073, '', NULL, 'Lanyard', 1060, NULL, NULL, NULL, 'Shopping', 1, '2019-05-14 07:48:35', '2019-05-14 07:48:35'),
(1074, '', NULL, 'Money Boxes', 1060, NULL, NULL, NULL, 'Shopping', 1, '2019-05-14 07:48:35', '2019-05-14 07:48:35'),
(1075, '', NULL, 'Music Boxes', 1060, NULL, NULL, NULL, 'Shopping', 1, '2019-05-14 07:48:35', '2019-05-14 07:48:35'),
(1076, '', NULL, 'Pottery & Enamel', 1060, NULL, NULL, NULL, 'Shopping', 1, '2019-05-14 07:48:35', '2019-05-14 07:48:35'),
(1077, '', NULL, 'Sculptures', 1060, NULL, NULL, NULL, 'Shopping', 1, '2019-05-14 07:48:35', '2019-05-14 07:48:35'),
(1078, '', NULL, 'Souvenirs', 1060, NULL, NULL, NULL, 'Shopping', 1, '2019-05-14 07:48:35', '2019-05-14 07:48:35'),
(1079, '', NULL, 'Stickers', 1060, NULL, NULL, NULL, 'Shopping', 1, '2019-05-14 07:48:35', '2019-05-14 07:48:35'),
(1080, '', NULL, 'Wedding Decorations & Gifts', 1060, NULL, NULL, NULL, 'Shopping', 1, '2019-05-14 07:48:35', '2019-05-14 07:48:35'),
(1081, '', NULL, 'Toys & Hobbies', NULL, NULL, NULL, NULL, 'Shopping', 1, '2019-05-14 07:48:35', '2019-05-14 07:48:35'),
(1082, '', NULL, 'Action Figure', 1081, NULL, NULL, NULL, 'Shopping', 1, '2019-05-14 07:48:35', '2019-05-14 07:48:35'),
(1083, '', NULL, 'Baby Toys', 1081, NULL, NULL, NULL, 'Shopping', 1, '2019-05-14 07:48:35', '2019-05-14 07:48:35'),
(1084, '', NULL, 'Balloons', 1081, NULL, NULL, NULL, 'Shopping', 1, '2019-05-14 07:48:36', '2019-05-14 07:48:36'),
(1085, '', NULL, 'Candy Toys', 1081, NULL, NULL, NULL, 'Shopping', 1, '2019-05-14 07:48:36', '2019-05-14 07:48:36'),
(1086, '', NULL, 'Classic Toys', 1081, NULL, NULL, NULL, 'Shopping', 1, '2019-05-14 07:48:36', '2019-05-14 07:48:36'),
(1087, '', NULL, 'Dolls', 1081, NULL, NULL, NULL, 'Shopping', 1, '2019-05-14 07:48:36', '2019-05-14 07:48:36'),
(1088, '', NULL, 'Educational Toys', 1081, NULL, NULL, NULL, 'Shopping', 1, '2019-05-14 07:48:36', '2019-05-14 07:48:36'),
(1089, '', NULL, 'Electronic Toys', 1081, NULL, NULL, NULL, 'Shopping', 1, '2019-05-14 07:48:36', '2019-05-14 07:48:36'),
(1090, '', NULL, 'Glass Marbles', 1081, NULL, NULL, NULL, 'Shopping', 1, '2019-05-14 07:48:36', '2019-05-14 07:48:36'),
(1091, '', NULL, 'Inflatable Toys', 1081, NULL, NULL, NULL, 'Shopping', 1, '2019-05-14 07:48:36', '2019-05-14 07:48:36'),
(1092, '', NULL, 'Light-Up Toys', 1081, NULL, NULL, NULL, 'Shopping', 1, '2019-05-14 07:48:36', '2019-05-14 07:48:36'),
(1093, '', NULL, 'Noise Maker', 1081, NULL, NULL, NULL, 'Shopping', 1, '2019-05-14 07:48:36', '2019-05-14 07:48:36'),
(1094, '', NULL, 'Other Toys & Hobbies', 1081, NULL, NULL, NULL, 'Shopping', 1, '2019-05-14 07:48:36', '2019-05-14 07:48:36'),
(1095, '', NULL, 'Outdoor Toys & Structures', 1081, NULL, NULL, NULL, 'Shopping', 1, '2019-05-14 07:48:36', '2019-05-14 07:48:36'),
(1096, '', NULL, 'Plastic Toys', 1081, NULL, NULL, NULL, 'Shopping', 1, '2019-05-14 07:48:36', '2019-05-14 07:48:36'),
(1097, '', NULL, 'Pretend Play & Preschool', 1081, NULL, NULL, NULL, 'Shopping', 1, '2019-05-14 07:48:36', '2019-05-14 07:48:36'),
(1098, '', NULL, 'Solar Toys', 1081, NULL, NULL, NULL, 'Shopping', 1, '2019-05-14 07:48:36', '2019-05-14 07:48:36'),
(1099, '', NULL, 'Toy Accessories', 1081, NULL, NULL, NULL, 'Shopping', 1, '2019-05-14 07:48:36', '2019-05-14 07:48:36'),
(1100, '', NULL, 'Toy Animal', 1081, NULL, NULL, NULL, 'Shopping', 1, '2019-05-14 07:48:36', '2019-05-14 07:48:36'),
(1101, '', NULL, 'Toy Guns', 1081, NULL, NULL, NULL, 'Shopping', 1, '2019-05-14 07:48:36', '2019-05-14 07:48:36'),
(1102, '', NULL, 'Toy Parts', 1081, NULL, NULL, NULL, 'Shopping', 1, '2019-05-14 07:48:36', '2019-05-14 07:48:36'),
(1103, '', NULL, 'Toy Robots', 1081, NULL, NULL, NULL, 'Shopping', 1, '2019-05-14 07:48:36', '2019-05-14 07:48:36'),
(1104, '', NULL, 'Toy Vehicle', 1081, NULL, NULL, NULL, 'Shopping', 1, '2019-05-14 07:48:36', '2019-05-14 07:48:36'),
(1105, '', NULL, 'Wind Up Toys', 1081, NULL, NULL, NULL, 'Shopping', 1, '2019-05-14 07:48:36', '2019-05-14 07:48:36'),
(1106, '', NULL, 'Wooden Toys', 1081, NULL, NULL, NULL, 'Shopping', 1, '2019-05-14 07:48:36', '2019-05-14 07:48:36'),
(1107, '', NULL, 'Health & Medical', NULL, NULL, NULL, NULL, 'Shopping', 1, '2019-05-14 07:48:36', '2019-05-14 07:48:36'),
(1108, '', NULL, 'Animal Extract', 1107, NULL, NULL, NULL, 'Shopping', 1, '2019-05-14 07:48:36', '2019-05-14 07:48:36'),
(1109, '', NULL, 'Plant Extracts', 1107, NULL, NULL, NULL, 'Shopping', 1, '2019-05-14 07:48:36', '2019-05-14 07:48:36'),
(1110, '', NULL, 'Body Weight', 1107, NULL, NULL, NULL, 'Shopping', 1, '2019-05-14 07:48:36', '2019-05-14 07:48:36'),
(1111, '', NULL, 'Health Care Supplement', 1107, NULL, NULL, NULL, 'Shopping', 1, '2019-05-14 07:48:36', '2019-05-14 07:48:36'),
(1112, '', NULL, 'Health Care Supplies', 1107, NULL, NULL, NULL, 'Shopping', 1, '2019-05-14 07:48:36', '2019-05-14 07:48:36'),
(1113, '', NULL, 'Crude Medicine', 1107, NULL, NULL, NULL, 'Shopping', 1, '2019-05-14 07:48:36', '2019-05-14 07:48:36'),
(1114, '', NULL, 'Prepared Drugs In Pieces', 1107, NULL, NULL, NULL, 'Shopping', 1, '2019-05-14 07:48:36', '2019-05-14 07:48:36'),
(1115, '', NULL, 'Traditional Patented Medicines', 1107, NULL, NULL, NULL, 'Shopping', 1, '2019-05-14 07:48:36', '2019-05-14 07:48:36'),
(1116, '', NULL, 'Body Fluid-Processing & Circulation Devices', 1107, NULL, NULL, NULL, 'Shopping', 1, '2019-05-14 07:48:36', '2019-05-14 07:48:36'),
(1117, '', NULL, 'Clinical Analytical Instruments', 1107, NULL, NULL, NULL, 'Shopping', 1, '2019-05-14 07:48:36', '2019-05-14 07:48:36'),
(1118, '', NULL, 'Dental Equipment', 1107, NULL, NULL, NULL, 'Shopping', 1, '2019-05-14 07:48:36', '2019-05-14 07:48:36'),
(1119, '', NULL, 'Emergency & Clinics Apparatuses', 1107, NULL, NULL, NULL, 'Shopping', 1, '2019-05-14 07:48:36', '2019-05-14 07:48:36'),
(1120, '', NULL, 'Equipments of Traditional Chinese Medicine', 1107, NULL, NULL, NULL, 'Shopping', 1, '2019-05-14 07:48:36', '2019-05-14 07:48:36'),
(1121, '', NULL, 'General Assay & Diagnostic Apparatuses', 1107, NULL, NULL, NULL, 'Shopping', 1, '2019-05-14 07:48:36', '2019-05-14 07:48:36'),
(1122, '', NULL, 'Implants & Interventional Materials', 1107, NULL, NULL, NULL, 'Shopping', 1, '2019-05-14 07:48:36', '2019-05-14 07:48:36'),
(1123, '', NULL, 'Medical Consumable', 1107, NULL, NULL, NULL, 'Shopping', 1, '2019-05-14 07:48:36', '2019-05-14 07:48:36'),
(1124, '', NULL, 'Medical Cryogenic Equipments', 1107, NULL, NULL, NULL, 'Shopping', 1, '2019-05-14 07:48:36', '2019-05-14 07:48:36'),
(1125, '', NULL, 'Medical Software', 1107, NULL, NULL, NULL, 'Shopping', 1, '2019-05-14 07:48:36', '2019-05-14 07:48:36'),
(1126, '', NULL, 'Physical Therapy Equipments', 1107, NULL, NULL, NULL, 'Shopping', 1, '2019-05-14 07:48:36', '2019-05-14 07:48:36'),
(1127, '', NULL, 'Radiology Equipment & Accessories', 1107, NULL, NULL, NULL, 'Shopping', 1, '2019-05-14 07:48:36', '2019-05-14 07:48:36'),
(1128, '', NULL, 'Sterilization Equipments', 1107, NULL, NULL, NULL, 'Shopping', 1, '2019-05-14 07:48:36', '2019-05-14 07:48:36'),
(1129, '', NULL, 'Surgical Instrument', 1107, NULL, NULL, NULL, 'Shopping', 1, '2019-05-14 07:48:36', '2019-05-14 07:48:36'),
(1130, '', NULL, 'Ultrasonic, Optical, Electronic Equipment', 1107, NULL, NULL, NULL, 'Shopping', 1, '2019-05-14 07:48:36', '2019-05-14 07:48:36'),
(1131, '', NULL, 'Ward Nursing Equipments', 1107, NULL, NULL, NULL, 'Shopping', 1, '2019-05-14 07:48:36', '2019-05-14 07:48:36'),
(1132, '', NULL, 'Medicines', 1107, NULL, NULL, NULL, 'Shopping', 1, '2019-05-14 07:48:36', '2019-05-14 07:48:36'),
(1133, '', NULL, 'Veterinary Instrument', 1107, NULL, NULL, NULL, 'Shopping', 1, '2019-05-14 07:48:36', '2019-05-14 07:48:36'),
(1134, '', NULL, 'Veterinary Medicine', 1107, NULL, NULL, NULL, 'Shopping', 1, '2019-05-14 07:48:36', '2019-05-14 07:48:36'),
(1135, '', NULL, 'Beauty & Personal Care', NULL, NULL, NULL, NULL, 'Shopping', 1, '2019-05-14 07:48:36', '2019-05-14 07:48:36'),
(1136, '', NULL, 'Baby Care', 1135, NULL, NULL, NULL, 'Shopping', 1, '2019-05-14 07:48:36', '2019-05-14 07:48:36'),
(1137, '', NULL, 'Bath Supplies', 1135, NULL, NULL, NULL, 'Shopping', 1, '2019-05-14 07:48:36', '2019-05-14 07:48:36'),
(1138, '', NULL, 'Beauty Equipment', 1135, NULL, NULL, NULL, 'Shopping', 1, '2019-05-14 07:48:36', '2019-05-14 07:48:36'),
(1139, '', NULL, 'Body Art', 1135, NULL, NULL, NULL, 'Shopping', 1, '2019-05-14 07:48:36', '2019-05-14 07:48:36'),
(1140, '', NULL, 'Breast Care', 1135, NULL, NULL, NULL, 'Shopping', 1, '2019-05-14 07:48:36', '2019-05-14 07:48:36'),
(1141, '', NULL, 'Feminine Hygiene', 1135, NULL, NULL, NULL, 'Shopping', 1, '2019-05-14 07:48:36', '2019-05-14 07:48:36'),
(1142, '', NULL, 'Fragrance & Deodorant', 1135, NULL, NULL, NULL, 'Shopping', 1, '2019-05-14 07:48:36', '2019-05-14 07:48:36'),
(1143, '', NULL, 'Hair Care', 1135, NULL, NULL, NULL, 'Shopping', 1, '2019-05-14 07:48:36', '2019-05-14 07:48:36'),
(1144, '', NULL, 'Hair Extensions & Wigs', 1135, NULL, NULL, NULL, 'Shopping', 1, '2019-05-14 07:48:36', '2019-05-14 07:48:36'),
(1145, '', NULL, 'Hair Salon Equipment', 1135, NULL, NULL, NULL, 'Shopping', 1, '2019-05-14 07:48:36', '2019-05-14 07:48:36'),
(1146, '', NULL, 'Makeup', 1135, NULL, NULL, NULL, 'Shopping', 1, '2019-05-14 07:48:36', '2019-05-14 07:48:36'),
(1147, '', NULL, 'Makeup Tools', 1135, NULL, NULL, NULL, 'Shopping', 1, '2019-05-14 07:48:36', '2019-05-14 07:48:36'),
(1148, '', NULL, 'Men Care', 1135, NULL, NULL, NULL, 'Shopping', 1, '2019-05-14 07:48:36', '2019-05-14 07:48:36'),
(1149, '', NULL, 'Nail Supplies', 1135, NULL, NULL, NULL, 'Shopping', 1, '2019-05-14 07:48:36', '2019-05-14 07:48:36'),
(1150, '', NULL, 'Oral Hygiene', 1135, NULL, NULL, NULL, 'Shopping', 1, '2019-05-14 07:48:36', '2019-05-14 07:48:36'),
(1151, '', NULL, 'Other Beauty & Personal Care Products', 1135, NULL, NULL, NULL, 'Shopping', 1, '2019-05-14 07:48:36', '2019-05-14 07:48:36'),
(1152, '', NULL, 'Sanitary Paper', 1135, NULL, NULL, NULL, 'Shopping', 1, '2019-05-14 07:48:36', '2019-05-14 07:48:36'),
(1153, '', NULL, 'Shaving & Hair Removal', 1135, NULL, NULL, NULL, 'Shopping', 1, '2019-05-14 07:48:36', '2019-05-14 07:48:36'),
(1154, '', NULL, 'Skin Care', 1135, NULL, NULL, NULL, 'Shopping', 1, '2019-05-14 07:48:36', '2019-05-14 07:48:36'),
(1155, '', NULL, 'Skin Care Tool', 1135, NULL, NULL, NULL, 'Shopping', 1, '2019-05-14 07:48:36', '2019-05-14 07:48:36'),
(1156, '', NULL, 'Spa Supplies', 1135, NULL, NULL, NULL, 'Shopping', 1, '2019-05-14 07:48:36', '2019-05-14 07:48:36'),
(1157, '', NULL, 'Weight Loss', 1135, NULL, NULL, NULL, 'Shopping', 1, '2019-05-14 07:48:36', '2019-05-14 07:48:36'),
(1158, '', NULL, 'Construction & Real Estate', NULL, NULL, NULL, NULL, 'Shopping', 1, '2019-05-14 07:48:36', '2019-05-14 07:48:36'),
(1159, '', NULL, 'Aluminum Composite Panels', 1158, NULL, NULL, NULL, 'Shopping', 1, '2019-05-14 07:48:36', '2019-05-14 07:48:36'),
(1160, '', NULL, 'Balustrades & Handrails', 1158, NULL, NULL, NULL, 'Shopping', 1, '2019-05-14 07:48:36', '2019-05-14 07:48:36'),
(1161, '', NULL, 'Bathroom', 1158, NULL, NULL, NULL, 'Shopping', 1, '2019-05-14 07:48:36', '2019-05-14 07:48:36'),
(1162, '', NULL, 'Boards', 1158, NULL, NULL, NULL, 'Shopping', 1, '2019-05-14 07:48:36', '2019-05-14 07:48:36'),
(1163, '', NULL, 'Building Glass', 1158, NULL, NULL, NULL, 'Shopping', 1, '2019-05-14 07:48:36', '2019-05-14 07:48:36'),
(1164, '', NULL, 'Ceilings', 1158, NULL, NULL, NULL, 'Shopping', 1, '2019-05-14 07:48:36', '2019-05-14 07:48:36'),
(1165, '', NULL, 'Corner Guards', 1158, NULL, NULL, NULL, 'Shopping', 1, '2019-05-14 07:48:36', '2019-05-14 07:48:36'),
(1166, '', NULL, 'Countertops,Vanity Tops & Table Tops', 1158, NULL, NULL, NULL, 'Shopping', 1, '2019-05-14 07:48:36', '2019-05-14 07:48:36'),
(1167, '', NULL, 'Curtain Walls & Accessories', 1158, NULL, NULL, NULL, 'Shopping', 1, '2019-05-14 07:48:36', '2019-05-14 07:48:36'),
(1168, '', NULL, 'Decorative Films', 1158, NULL, NULL, NULL, 'Shopping', 1, '2019-05-14 07:48:36', '2019-05-14 07:48:36'),
(1169, '', NULL, 'Door & Window Accessories', 1158, NULL, NULL, NULL, 'Shopping', 1, '2019-05-14 07:48:36', '2019-05-14 07:48:36'),
(1170, '', NULL, 'Doors & Windows', 1158, NULL, NULL, NULL, 'Shopping', 1, '2019-05-14 07:48:36', '2019-05-14 07:48:36'),
(1171, '', NULL, 'Earthwork Products', 1158, NULL, NULL, NULL, 'Shopping', 1, '2019-05-14 07:48:36', '2019-05-14 07:48:36'),
(1172, '', NULL, 'Elevators & Elevator Parts', 1158, NULL, NULL, NULL, 'Shopping', 1, '2019-05-14 07:48:36', '2019-05-14 07:48:36'),
(1173, '', NULL, 'Escalators & Escalator Parts', 1158, NULL, NULL, NULL, 'Shopping', 1, '2019-05-14 07:48:36', '2019-05-14 07:48:36'),
(1174, '', NULL, 'Faucets, Mixers & Taps', 1158, NULL, NULL, NULL, 'Shopping', 1, '2019-05-14 07:48:36', '2019-05-14 07:48:36'),
(1175, '', NULL, 'Fiberglass Wall Meshes', 1158, NULL, NULL, NULL, 'Shopping', 1, '2019-05-14 07:48:36', '2019-05-14 07:48:36'),
(1176, '', NULL, 'Fireplaces,Stoves', 1158, NULL, NULL, NULL, 'Shopping', 1, '2019-05-14 07:48:36', '2019-05-14 07:48:36'),
(1177, '', NULL, 'Fireproofing Materials', 1158, NULL, NULL, NULL, 'Shopping', 1, '2019-05-14 07:48:36', '2019-05-14 07:48:36'),
(1178, '', NULL, 'loor Heating Systems & Parts', 1158, NULL, NULL, NULL, 'Shopping', 1, '2019-05-14 07:48:36', '2019-05-14 07:48:36'),
(1179, '', NULL, 'Flooring & Accessories', 1158, NULL, NULL, NULL, 'Shopping', 1, '2019-05-14 07:48:36', '2019-05-14 07:48:36'),
(1180, '', NULL, 'Formwork', 1158, NULL, NULL, NULL, 'Shopping', 1, '2019-05-14 07:48:36', '2019-05-14 07:48:36'),
(1181, '', NULL, 'Gates', 1158, NULL, NULL, NULL, 'Shopping', 1, '2019-05-14 07:48:36', '2019-05-14 07:48:36'),
(1182, '', NULL, 'Heat Insulation Materials', 1158, NULL, NULL, NULL, 'Shopping', 1, '2019-05-14 07:48:36', '2019-05-14 07:48:36'),
(1183, '', NULL, 'HVAC Systems & Parts', 1158, NULL, NULL, NULL, 'Shopping', 1, '2019-05-14 07:48:36', '2019-05-14 07:48:36'),
(1184, '', NULL, 'Kitchen', 1158, NULL, NULL, NULL, 'Shopping', 1, '2019-05-14 07:48:36', '2019-05-14 07:48:36'),
(1185, '', NULL, 'Ladders & Scaffoldings', 1158, NULL, NULL, NULL, 'Shopping', 1, '2019-05-14 07:48:36', '2019-05-14 07:48:36'),
(1186, '', NULL, 'Landscaping Stone', 1158, NULL, NULL, NULL, 'Shopping', 1, '2019-05-14 07:48:36', '2019-05-14 07:48:36'),
(1187, '', NULL, 'Masonry Materials', 1158, NULL, NULL, NULL, 'Shopping', 1, '2019-05-14 07:48:36', '2019-05-14 07:48:36'),
(1188, '', NULL, 'Metal Building Materials', 1158, NULL, NULL, NULL, 'Shopping', 1, '2019-05-14 07:48:36', '2019-05-14 07:48:36'),
(1189, '', NULL, 'Mosaics', 1158, NULL, NULL, NULL, 'Shopping', 1, '2019-05-14 07:48:36', '2019-05-14 07:48:36'),
(1190, '', NULL, 'Mouldings', 1158, NULL, NULL, NULL, 'Shopping', 1, '2019-05-14 07:48:36', '2019-05-14 07:48:36'),
(1191, '', NULL, 'Multifunctional Materials', 1158, NULL, NULL, NULL, 'Shopping', 1, '2019-05-14 07:48:36', '2019-05-14 07:48:36'),
(1192, '', NULL, 'Other Construction & Real Estate', 1158, NULL, NULL, NULL, 'Shopping', 1, '2019-05-14 07:48:36', '2019-05-14 07:48:36'),
(1193, '', NULL, 'Plastic Building Materials', 1158, NULL, NULL, NULL, 'Shopping', 1, '2019-05-14 07:48:36', '2019-05-14 07:48:36'),
(1194, '', NULL, 'Quarry Stone & Slabs', 1158, NULL, NULL, NULL, 'Shopping', 1, '2019-05-14 07:48:36', '2019-05-14 07:48:36'),
(1195, '', NULL, 'Real Estate', 1158, NULL, NULL, NULL, 'Shopping', 1, '2019-05-14 07:48:36', '2019-05-14 07:48:36'),
(1196, '', NULL, 'Soundproofing Materials', 1158, NULL, NULL, NULL, 'Shopping', 1, '2019-05-14 07:48:36', '2019-05-14 07:48:36'),
(1197, '', NULL, 'Stairs & Stair Parts', 1158, NULL, NULL, NULL, 'Shopping', 1, '2019-05-14 07:48:36', '2019-05-14 07:48:36'),
(1198, '', NULL, 'Stone Carvings and Sculptures', 1158, NULL, NULL, NULL, 'Shopping', 1, '2019-05-14 07:48:36', '2019-05-14 07:48:36'),
(1199, '', NULL, 'Sunrooms & Glass Houses', 1158, NULL, NULL, NULL, 'Shopping', 1, '2019-05-14 07:48:36', '2019-05-14 07:48:36'),
(1200, '', NULL, 'Tiles & Accessories', 1158, NULL, NULL, NULL, 'Shopping', 1, '2019-05-14 07:48:36', '2019-05-14 07:48:36'),
(1201, '', NULL, 'Timber', 1158, NULL, NULL, NULL, 'Shopping', 1, '2019-05-14 07:48:36', '2019-05-14 07:48:36'),
(1202, '', NULL, 'Tombstones and Monuments', 1158, NULL, NULL, NULL, 'Shopping', 1, '2019-05-14 07:48:36', '2019-05-14 07:48:36'),
(1203, '', NULL, 'Wallpapers/Wall Coating', 1158, NULL, NULL, NULL, 'Shopping', 1, '2019-05-14 07:48:36', '2019-05-14 07:48:36'),
(1204, '', NULL, 'Waterproofing Materials', 1158, NULL, NULL, NULL, 'Shopping', 1, '2019-05-14 07:48:36', '2019-05-14 07:48:36'),
(1205, '', NULL, 'Home & Garden', NULL, NULL, NULL, NULL, 'Shopping', 1, '2019-05-14 07:48:36', '2019-05-14 07:48:36'),
(1206, '', NULL, 'Bakeware', 1205, NULL, NULL, NULL, 'Shopping', 1, '2019-05-14 07:48:36', '2019-05-14 07:48:36'),
(1207, '', NULL, 'Barware', 1205, NULL, NULL, NULL, 'Shopping', 1, '2019-05-14 07:48:36', '2019-05-14 07:48:36'),
(1208, '', NULL, 'Bathroom Products', 1205, NULL, NULL, NULL, 'Shopping', 1, '2019-05-14 07:48:36', '2019-05-14 07:48:36'),
(1209, '', NULL, 'Cooking Tools', 1205, NULL, NULL, NULL, 'Shopping', 1, '2019-05-14 07:48:36', '2019-05-14 07:48:36'),
(1210, '', NULL, 'Cookware', 1205, NULL, NULL, NULL, 'Shopping', 1, '2019-05-14 07:48:36', '2019-05-14 07:48:36'),
(1211, '', NULL, 'Garden Supplies', 1205, NULL, NULL, NULL, 'Shopping', 1, '2019-05-14 07:48:36', '2019-05-14 07:48:36'),
(1212, '', NULL, 'Home Decor', 1205, NULL, NULL, NULL, 'Shopping', 1, '2019-05-14 07:48:36', '2019-05-14 07:48:36'),
(1213, '', NULL, 'Home Storage & Organization', 1205, NULL, NULL, NULL, 'Shopping', 1, '2019-05-14 07:48:36', '2019-05-14 07:48:36'),
(1214, '', NULL, 'Household Chemicals', 1205, NULL, NULL, NULL, 'Shopping', 1, '2019-05-14 07:48:36', '2019-05-14 07:48:36'),
(1215, '', NULL, 'Household Cleaning Tools & Accessories', 1205, NULL, NULL, NULL, 'Shopping', 1, '2019-05-14 07:48:36', '2019-05-14 07:48:36'),
(1216, '', NULL, 'Household Sundries', 1205, NULL, NULL, NULL, 'Shopping', 1, '2019-05-14 07:48:36', '2019-05-14 07:48:36'),
(1217, '', NULL, 'Kitchen Knives & Accessories', 1205, NULL, NULL, NULL, 'Shopping', 1, '2019-05-14 07:48:36', '2019-05-14 07:48:36'),
(1218, '', NULL, 'Laundry Products', 1205, NULL, NULL, NULL, 'Shopping', 1, '2019-05-14 07:48:36', '2019-05-14 07:48:36'),
(1219, '', NULL, 'Pet Products', 1205, NULL, NULL, NULL, 'Shopping', 1, '2019-05-14 07:48:36', '2019-05-14 07:48:36'),
(1220, '', NULL, 'Tableware', 1205, NULL, NULL, NULL, 'Shopping', 1, '2019-05-14 07:48:36', '2019-05-14 07:48:36'),
(1221, '', NULL, 'Dinnerware', 1205, NULL, NULL, NULL, 'Shopping', 1, '2019-05-14 07:48:36', '2019-05-14 07:48:36'),
(1222, '', NULL, 'Drinkware', 1205, NULL, NULL, NULL, 'Shopping', 1, '2019-05-14 07:48:36', '2019-05-14 07:48:36'),
(1223, '', NULL, 'Baby Supplies & Products', 1205, NULL, NULL, NULL, 'Shopping', 1, '2019-05-14 07:48:36', '2019-05-14 07:48:36'),
(1224, '', NULL, 'Rain Gear', 1205, NULL, NULL, NULL, 'Shopping', 1, '2019-05-14 07:48:36', '2019-05-14 07:48:36'),
(1225, '', NULL, 'Lighters & Smoking Accessories', 1205, NULL, NULL, NULL, 'Shopping', 1, '2019-05-14 07:48:36', '2019-05-14 07:48:36'),
(1226, '', NULL, 'Lights & Lighting', NULL, NULL, NULL, NULL, 'Shopping', 1, '2019-05-14 07:48:36', '2019-05-14 07:48:36'),
(1227, '', NULL, 'Emergency Lighting', 1226, NULL, NULL, NULL, 'Shopping', 1, '2019-05-14 07:48:36', '2019-05-14 07:48:36'),
(1228, '', NULL, 'Holiday Lighting', 1226, NULL, NULL, NULL, 'Shopping', 1, '2019-05-14 07:48:36', '2019-05-14 07:48:36'),
(1229, '', NULL, 'Indoor Lighting', 1226, NULL, NULL, NULL, 'Shopping', 1, '2019-05-14 07:48:36', '2019-05-14 07:48:36'),
(1230, '', NULL, 'LED Lighting', 1226, NULL, NULL, NULL, 'Shopping', 1, '2019-05-14 07:48:36', '2019-05-14 07:48:36'),
(1231, '', NULL, 'Lighting Accessories', 1226, NULL, NULL, NULL, 'Shopping', 1, '2019-05-14 07:48:36', '2019-05-14 07:48:36'),
(1232, '', NULL, 'Lighting Bulbs & Tubes', 1226, NULL, NULL, NULL, 'Shopping', 1, '2019-05-14 07:48:36', '2019-05-14 07:48:36'),
(1233, '', NULL, 'Other Lights & Lighting Products', 1226, NULL, NULL, NULL, 'Shopping', 1, '2019-05-14 07:48:36', '2019-05-14 07:48:36'),
(1234, '', NULL, 'Outdoor Lighting', 1226, NULL, NULL, NULL, 'Shopping', 1, '2019-05-14 07:48:36', '2019-05-14 07:48:36'),
(1235, '', NULL, 'Professional Lighting', 1226, NULL, NULL, NULL, 'Shopping', 1, '2019-05-14 07:48:36', '2019-05-14 07:48:36'),
(1236, '', NULL, 'LED Residential Lighting', 1226, NULL, NULL, NULL, 'Shopping', 1, '2019-05-14 07:48:36', '2019-05-14 07:48:36'),
(1237, '', NULL, 'LED Outdoor Lighting', 1226, NULL, NULL, NULL, 'Shopping', 1, '2019-05-14 07:48:36', '2019-05-14 07:48:36'),
(1238, '', NULL, 'Chandeliers & Pendant Lights', 1226, NULL, NULL, NULL, 'Shopping', 1, '2019-05-14 07:48:36', '2019-05-14 07:48:36'),
(1239, '', NULL, 'Ceiling Lights', 1226, NULL, NULL, NULL, 'Shopping', 1, '2019-05-14 07:48:36', '2019-05-14 07:48:36'),
(1240, '', NULL, 'Crystal Lights', 1226, NULL, NULL, NULL, 'Shopping', 1, '2019-05-14 07:48:36', '2019-05-14 07:48:36'),
(1241, '', NULL, 'Stage Lights', 1226, NULL, NULL, NULL, 'Shopping', 1, '2019-05-14 07:48:36', '2019-05-14 07:48:36'),
(1242, '', NULL, 'Street Lights', 1226, NULL, NULL, NULL, 'Shopping', 1, '2019-05-14 07:48:36', '2019-05-14 07:48:36'),
(1243, '', NULL, 'Energy Saving & Fluorescent', 1226, NULL, NULL, NULL, 'Shopping', 1, '2019-05-14 07:48:36', '2019-05-14 07:48:36'),
(1244, '', NULL, 'LED Landscape Lamps', 1226, NULL, NULL, NULL, 'Shopping', 1, '2019-05-14 07:48:36', '2019-05-14 07:48:36'),
(1245, '', NULL, 'LED Professional Lighting', 1226, NULL, NULL, NULL, 'Shopping', 1, '2019-05-14 07:48:36', '2019-05-14 07:48:36'),
(1246, '', NULL, 'LED Encapsulation Series', 1226, NULL, NULL, NULL, 'Shopping', 1, '2019-05-14 07:48:36', '2019-05-14 07:48:36'),
(1247, '', NULL, 'Furniture', NULL, NULL, NULL, NULL, 'Shopping', 1, '2019-05-14 07:48:36', '2019-05-14 07:48:36'),
(1248, '', NULL, 'Antique Furniture', 1247, NULL, NULL, NULL, 'Shopping', 1, '2019-05-14 07:48:36', '2019-05-14 07:48:36'),
(1249, '', NULL, 'Baby Furniture', 1247, NULL, NULL, NULL, 'Shopping', 1, '2019-05-14 07:48:36', '2019-05-14 07:48:36'),
(1250, '', NULL, 'Bamboo Furniture', 1247, NULL, NULL, NULL, 'Shopping', 1, '2019-05-14 07:48:36', '2019-05-14 07:48:36'),
(1251, '', NULL, 'Children Furniture', 1247, NULL, NULL, NULL, 'Shopping', 1, '2019-05-14 07:48:36', '2019-05-14 07:48:36'),
(1252, '', NULL, 'Commercial Furniture', 1247, NULL, NULL, NULL, 'Shopping', 1, '2019-05-14 07:48:36', '2019-05-14 07:48:36'),
(1253, '', NULL, 'Folding Furniture', 1247, NULL, NULL, NULL, 'Shopping', 1, '2019-05-14 07:48:36', '2019-05-14 07:48:36'),
(1254, '', NULL, 'Furniture Accessories', 1247, NULL, NULL, NULL, 'Shopping', 1, '2019-05-14 07:48:36', '2019-05-14 07:48:36'),
(1255, '', NULL, 'Furniture Hardware', 1247, NULL, NULL, NULL, 'Shopping', 1, '2019-05-14 07:48:36', '2019-05-14 07:48:36'),
(1256, '', NULL, 'Furniture Parts', 1247, NULL, NULL, NULL, 'Shopping', 1, '2019-05-14 07:48:36', '2019-05-14 07:48:36'),
(1257, '', NULL, 'Glass Furniture', 1247, NULL, NULL, NULL, 'Shopping', 1, '2019-05-14 07:48:36', '2019-05-14 07:48:36'),
(1258, '', NULL, 'Home Furniture', 1247, NULL, NULL, NULL, 'Shopping', 1, '2019-05-14 07:48:36', '2019-05-14 07:48:36'),
(1259, '', NULL, 'Inflatable Furniture', 1247, NULL, NULL, NULL, 'Shopping', 1, '2019-05-14 07:48:36', '2019-05-14 07:48:36'),
(1260, '', NULL, 'Metal Furniture', 1247, NULL, NULL, NULL, 'Shopping', 1, '2019-05-14 07:48:36', '2019-05-14 07:48:36'),
(1261, '', NULL, 'Other Furniture', 1247, NULL, NULL, NULL, 'Shopping', 1, '2019-05-14 07:48:36', '2019-05-14 07:48:36'),
(1262, '', NULL, 'Outdoor Furniture', 1247, NULL, NULL, NULL, 'Shopping', 1, '2019-05-14 07:48:36', '2019-05-14 07:48:36'),
(1263, '', NULL, 'Plastic Furniture', 1247, NULL, NULL, NULL, 'Shopping', 1, '2019-05-14 07:48:36', '2019-05-14 07:48:36'),
(1264, '', NULL, 'Rattan / Wicker Furniture', 1247, NULL, NULL, NULL, 'Shopping', 1, '2019-05-14 07:48:36', '2019-05-14 07:48:36'),
(1265, '', NULL, 'Wood Furniture', 1247, NULL, NULL, NULL, 'Shopping', 1, '2019-05-14 07:48:36', '2019-05-14 07:48:36'),
(1266, '', NULL, 'Living Room Furniture', 1247, NULL, NULL, NULL, 'Shopping', 1, '2019-05-14 07:48:36', '2019-05-14 07:48:36'),
(1267, '', NULL, 'Bedroom Furniture', 1247, NULL, NULL, NULL, 'Shopping', 1, '2019-05-14 07:48:36', '2019-05-14 07:48:36'),
(1268, '', NULL, 'Machinery', NULL, NULL, NULL, NULL, 'Shopping', 1, '2019-05-14 07:48:36', '2019-05-14 07:48:36'),
(1269, '', NULL, 'Agriculture Machinery & Equipment', 1268, NULL, NULL, NULL, 'Shopping', 1, '2019-05-14 07:48:36', '2019-05-14 07:48:36'),
(1270, '', NULL, 'Apparel & Textile Machinery', 1268, NULL, NULL, NULL, 'Shopping', 1, '2019-05-14 07:48:36', '2019-05-14 07:48:36'),
(1271, '', NULL, 'Building Material Machinery', 1268, NULL, NULL, NULL, 'Shopping', 1, '2019-05-14 07:48:36', '2019-05-14 07:48:36'),
(1272, '', NULL, 'Chemical Machinery & Equipment', 1268, NULL, NULL, NULL, 'Shopping', 1, '2019-05-14 07:48:36', '2019-05-14 07:48:36'),
(1273, '', NULL, 'Electronic Products Machinery', 1268, NULL, NULL, NULL, 'Shopping', 1, '2019-05-14 07:48:36', '2019-05-14 07:48:36'),
(1274, '', NULL, 'Energy & Mineral Equipment', 1268, NULL, NULL, NULL, 'Shopping', 1, '2019-05-14 07:48:36', '2019-05-14 07:48:36'),
(1275, '', NULL, 'Engineering & Construction Machinery', 1268, NULL, NULL, NULL, 'Shopping', 1, '2019-05-14 07:48:36', '2019-05-14 07:48:36'),
(1276, '', NULL, 'Food & Beverage Machinery', 1268, NULL, NULL, NULL, 'Shopping', 1, '2019-05-14 07:48:36', '2019-05-14 07:48:36'),
(1277, '', NULL, 'General Industrial Equipment', 1268, NULL, NULL, NULL, 'Shopping', 1, '2019-05-14 07:48:36', '2019-05-14 07:48:36'),
(1278, '', NULL, 'Home Product Making Machinery', 1268, NULL, NULL, NULL, 'Shopping', 1, '2019-05-14 07:48:36', '2019-05-14 07:48:36'),
(1279, '', NULL, 'Industry Laser Equipment', 1268, NULL, NULL, NULL, 'Shopping', 1, '2019-05-14 07:48:36', '2019-05-14 07:48:36'),
(1280, '', NULL, 'Machine Tool Equipment', 1268, NULL, NULL, NULL, 'Shopping', 1, '2019-05-14 07:48:36', '2019-05-14 07:48:36'),
(1281, '', NULL, 'Metal & Metallurgy Machinery', 1268, NULL, NULL, NULL, 'Shopping', 1, '2019-05-14 07:48:36', '2019-05-14 07:48:36'),
(1282, '', NULL, 'Other Machinery & Industry Equipment', 1268, NULL, NULL, NULL, 'Shopping', 1, '2019-05-14 07:48:36', '2019-05-14 07:48:36'),
(1283, '', NULL, 'Packaging Machine', 1268, NULL, NULL, NULL, 'Shopping', 1, '2019-05-14 07:48:36', '2019-05-14 07:48:36'),
(1284, '', NULL, 'Paper Production Machinery', 1268, NULL, NULL, NULL, 'Shopping', 1, '2019-05-14 07:48:36', '2019-05-14 07:48:36'),
(1285, '', NULL, 'Pharmaceutical Machinery', 1268, NULL, NULL, NULL, 'Shopping', 1, '2019-05-14 07:48:36', '2019-05-14 07:48:36'),
(1286, '', NULL, 'Plastic & Rubber Machiner', 1268, NULL, NULL, NULL, 'Shopping', 1, '2019-05-14 07:48:36', '2019-05-14 07:48:36'),
(1287, '', NULL, 'Printing Machine', 1268, NULL, NULL, NULL, 'Shopping', 1, '2019-05-14 07:48:36', '2019-05-14 07:48:36'),
(1288, '', NULL, 'Refrigeration & Heat Exchange Equipment', 1268, NULL, NULL, NULL, 'Shopping', 1, '2019-05-14 07:48:36', '2019-05-14 07:48:36'),
(1289, '', NULL, 'Used Machinery & Equipment', 1268, NULL, NULL, NULL, 'Shopping', 1, '2019-05-14 07:48:36', '2019-05-14 07:48:36'),
(1290, '', NULL, 'Woodworking Machinery', 1268, NULL, NULL, NULL, 'Shopping', 1, '2019-05-14 07:48:36', '2019-05-14 07:48:36'),
(1291, '', NULL, 'Fabrication Services', NULL, NULL, NULL, NULL, 'Shopping', 1, '2019-05-14 07:48:36', '2019-05-14 07:48:36'),
(1292, '', NULL, 'Custom Fabrication Services', 1291, NULL, NULL, NULL, 'Shopping', 1, '2019-05-14 07:48:36', '2019-05-14 07:48:36'),
(1293, '', NULL, 'General Mechanical Components Design Services', 1291, NULL, NULL, NULL, 'Shopping', 1, '2019-05-14 07:48:36', '2019-05-14 07:48:36'),
(1294, '', NULL, 'General Mechanical Components Stock', 1291, NULL, NULL, NULL, 'Shopping', 1, '2019-05-14 07:48:36', '2019-05-14 07:48:36'),
(1295, '', NULL, 'Industrial Brake', 1291, NULL, NULL, NULL, 'Shopping', 1, '2019-05-14 07:48:36', '2019-05-14 07:48:36'),
(1296, '', NULL, 'Machine Tools Accessory', 1291, NULL, NULL, NULL, 'Shopping', 1, '2019-05-14 07:48:36', '2019-05-14 07:48:36'),
(1297, '', NULL, 'Moulds', 1291, NULL, NULL, NULL, 'Shopping', 1, '2019-05-14 07:48:36', '2019-05-14 07:48:36'),
(1298, '', NULL, 'Other General Mechanical Components', 1291, NULL, NULL, NULL, 'Shopping', 1, '2019-05-14 07:48:36', '2019-05-14 07:48:36'),
(1299, '', NULL, 'Other Mechanical Parts', 1291, NULL, NULL, NULL, 'Shopping', 1, '2019-05-14 07:48:36', '2019-05-14 07:48:36'),
(1300, '', NULL, 'Used General Mechanical Components', 1291, NULL, NULL, NULL, 'Shopping', 1, '2019-05-14 07:48:36', '2019-05-14 07:48:36'),
(1301, '', NULL, 'Coating Services', 1291, NULL, NULL, NULL, 'Shopping', 1, '2019-05-14 07:48:36', '2019-05-14 07:48:36'),
(1302, '', NULL, 'Tools & Hardware', NULL, NULL, NULL, NULL, 'Shopping', 1, '2019-05-14 07:48:36', '2019-05-14 07:48:36'),
(1303, '', NULL, 'Hardware', 1302, NULL, NULL, NULL, 'Shopping', 1, '2019-05-14 07:48:36', '2019-05-14 07:48:36'),
(1304, '', NULL, 'Construction Tools', 1302, NULL, NULL, NULL, 'Shopping', 1, '2019-05-14 07:48:36', '2019-05-14 07:48:36'),
(1305, '', NULL, 'Garden Tools', 1302, NULL, NULL, NULL, 'Shopping', 1, '2019-05-14 07:48:36', '2019-05-14 07:48:36'),
(1306, '', NULL, 'Hand Tools', 1302, NULL, NULL, NULL, 'Shopping', 1, '2019-05-14 07:48:36', '2019-05-14 07:48:36'),
(1307, '', NULL, 'Lifting Tools', 1302, NULL, NULL, NULL, 'Shopping', 1, '2019-05-14 07:48:36', '2019-05-14 07:48:36'),
(1308, '', NULL, 'Material Handling Tools', 1302, NULL, NULL, NULL, 'Shopping', 1, '2019-05-14 07:48:36', '2019-05-14 07:48:36'),
(1309, '', NULL, 'Power Tool Accessories', 1302, NULL, NULL, NULL, 'Shopping', 1, '2019-05-14 07:48:36', '2019-05-14 07:48:36'),
(1310, '', NULL, 'Power Tools', 1302, NULL, NULL, NULL, 'Shopping', 1, '2019-05-14 07:48:36', '2019-05-14 07:48:36'),
(1311, '', NULL, 'Tool Design Services', 1302, NULL, NULL, NULL, 'Shopping', 1, '2019-05-14 07:48:36', '2019-05-14 07:48:36'),
(1312, '', NULL, 'Tool Parts', 1302, NULL, NULL, NULL, 'Shopping', 1, '2019-05-14 07:48:36', '2019-05-14 07:48:36'),
(1313, '', NULL, 'Tool Processing Services', 1302, NULL, NULL, NULL, 'Shopping', 1, '2019-05-14 07:48:36', '2019-05-14 07:48:36'),
(1314, '', NULL, 'Tool Sets', 1302, NULL, NULL, NULL, 'Shopping', 1, '2019-05-14 07:48:36', '2019-05-14 07:48:36'),
(1315, '', NULL, 'Tool Stock', 1302, NULL, NULL, NULL, 'Shopping', 1, '2019-05-14 07:48:36', '2019-05-14 07:48:36'),
(1316, '', NULL, 'Tools Packaging', 1302, NULL, NULL, NULL, 'Shopping', 1, '2019-05-14 07:48:36', '2019-05-14 07:48:36'),
(1317, '', NULL, 'Used Tools', 1302, NULL, NULL, NULL, 'Shopping', 1, '2019-05-14 07:48:36', '2019-05-14 07:48:36'),
(1318, '', NULL, 'Electric Drill', 1302, NULL, NULL, NULL, 'Shopping', 1, '2019-05-14 07:48:36', '2019-05-14 07:48:36'),
(1319, '', NULL, 'Knife', 1302, NULL, NULL, NULL, 'Shopping', 1, '2019-05-14 07:48:36', '2019-05-14 07:48:36'),
(1320, '', NULL, 'and Carts & Trolleys', 1302, NULL, NULL, NULL, 'Shopping', 1, '2019-05-14 07:48:36', '2019-05-14 07:48:36'),
(1321, '', NULL, 'Lawn Mower', 1302, NULL, NULL, NULL, 'Shopping', 1, '2019-05-14 07:48:36', '2019-05-14 07:48:36'),
(1322, '', NULL, 'Sander', 1302, NULL, NULL, NULL, 'Shopping', 1, '2019-05-14 07:48:36', '2019-05-14 07:48:36'),
(1323, '', NULL, 'Minerals & Metallurgy', NULL, NULL, NULL, NULL, 'Shopping', 1, '2019-05-14 07:48:36', '2019-05-14 07:48:36'),
(1324, '', NULL, 'Aluminum', 1323, NULL, NULL, NULL, 'Shopping', 1, '2019-05-14 07:48:36', '2019-05-14 07:48:36'),
(1325, '', NULL, 'Barbed Wire', 1323, NULL, NULL, NULL, 'Shopping', 1, '2019-05-14 07:48:36', '2019-05-14 07:48:36'),
(1326, '', NULL, 'Billets', 1323, NULL, NULL, NULL, 'Shopping', 1, '2019-05-14 07:48:36', '2019-05-14 07:48:36'),
(1327, '', NULL, 'Carbon', 1323, NULL, NULL, NULL, 'Shopping', 1, '2019-05-14 07:48:36', '2019-05-14 07:48:36'),
(1328, '', NULL, 'Carbon Fiber', 1323, NULL, NULL, NULL, 'Shopping', 1, '2019-05-14 07:48:36', '2019-05-14 07:48:36'),
(1329, '', NULL, 'Cast & Forged', 1323, NULL, NULL, NULL, 'Shopping', 1, '2019-05-14 07:48:36', '2019-05-14 07:48:36'),
(1330, '', NULL, 'Cemented Carbid', 1323, NULL, NULL, NULL, 'Shopping', 1, '2019-05-14 07:48:36', '2019-05-14 07:48:36'),
(1331, '', NULL, 'Ceramic Fiber Products', 1323, NULL, NULL, NULL, 'Shopping', 1, '2019-05-14 07:48:36', '2019-05-14 07:48:36'),
(1332, '', NULL, 'Ceramics', 1323, NULL, NULL, NULL, 'Shopping', 1, '2019-05-14 07:48:36', '2019-05-14 07:48:36'),
(1333, '', NULL, 'Copper', 1323, NULL, NULL, NULL, 'Shopping', 1, '2019-05-14 07:48:36', '2019-05-14 07:48:36'),
(1334, '', NULL, 'Copper Forged', 1323, NULL, NULL, NULL, 'Shopping', 1, '2019-05-14 07:48:36', '2019-05-14 07:48:36'),
(1335, '', NULL, 'Fiberglass Products', 1323, NULL, NULL, NULL, 'Shopping', 1, '2019-05-14 07:48:36', '2019-05-14 07:48:36'),
(1336, '', NULL, 'Glass', 1323, NULL, NULL, NULL, 'Shopping', 1, '2019-05-14 07:48:36', '2019-05-14 07:48:36'),
(1337, '', NULL, 'Graphite Products', 1323, NULL, NULL, NULL, 'Shopping', 1, '2019-05-14 07:48:36', '2019-05-14 07:48:36'),
(1338, '', NULL, 'Ingots', 1323, NULL, NULL, NULL, 'Shopping', 1, '2019-05-14 07:48:36', '2019-05-14 07:48:36'),
(1339, '', NULL, 'Iron', 1323, NULL, NULL, NULL, 'Shopping', 1, '2019-05-14 07:48:36', '2019-05-14 07:48:36'),
(1340, '', NULL, 'Lead', 1323, NULL, NULL, NULL, 'Shopping', 1, '2019-05-14 07:48:36', '2019-05-14 07:48:36'),
(1341, '', NULL, 'Lime', 1323, NULL, NULL, NULL, 'Shopping', 1, '2019-05-14 07:48:36', '2019-05-14 07:48:36'),
(1342, '', NULL, 'Magnetic Materials', 1323, NULL, NULL, NULL, 'Shopping', 1, '2019-05-14 07:48:36', '2019-05-14 07:48:36'),
(1343, '', NULL, 'Metal Scrap', 1323, NULL, NULL, NULL, 'Shopping', 1, '2019-05-14 07:48:36', '2019-05-14 07:48:36'),
(1344, '', NULL, 'Metal Slabs', 1323, NULL, NULL, NULL, 'Shopping', 1, '2019-05-14 07:48:36', '2019-05-14 07:48:36'),
(1345, '', NULL, 'Mineral Wool', 1323, NULL, NULL, NULL, 'Shopping', 1, '2019-05-14 07:48:36', '2019-05-14 07:48:36'),
(1346, '', NULL, 'Molybdenum', 1323, NULL, NULL, NULL, 'Shopping', 1, '2019-05-14 07:48:36', '2019-05-14 07:48:36'),
(1347, '', NULL, 'Nickel', 1323, NULL, NULL, NULL, 'Shopping', 1, '2019-05-14 07:48:36', '2019-05-14 07:48:36'),
(1348, '', NULL, 'Non-Metallic Mineral Deposit', 1323, NULL, NULL, NULL, 'Shopping', 1, '2019-05-14 07:48:36', '2019-05-14 07:48:36'),
(1349, '', NULL, 'Ore', 1323, NULL, NULL, NULL, 'Shopping', 1, '2019-05-14 07:48:37', '2019-05-14 07:48:37'),
(1350, '', NULL, 'Other Metals & Metal Products', 1323, NULL, NULL, NULL, 'Shopping', 1, '2019-05-14 07:48:37', '2019-05-14 07:48:37'),
(1351, '', NULL, 'Other Non-Metallic Minerals & Products', 1323, NULL, NULL, NULL, 'Shopping', 1, '2019-05-14 07:48:37', '2019-05-14 07:48:37'),
(1352, '', NULL, 'Pig Iron', 1323, NULL, NULL, NULL, 'Shopping', 1, '2019-05-14 07:48:37', '2019-05-14 07:48:37'),
(1353, '', NULL, 'Quartz Products', 1323, NULL, NULL, NULL, 'Shopping', 1, '2019-05-14 07:48:37', '2019-05-14 07:48:37'),
(1354, '', NULL, 'Rare Earth & Products', 1323, NULL, NULL, NULL, 'Shopping', 1, '2019-05-14 07:48:37', '2019-05-14 07:48:37'),
(1355, '', NULL, 'Rare Earth Magnets', 1323, NULL, NULL, NULL, 'Shopping', 1, '2019-05-14 07:48:37', '2019-05-14 07:48:37'),
(1356, '', NULL, 'Refractory', 1323, NULL, NULL, NULL, 'Shopping', 1, '2019-05-14 07:48:37', '2019-05-14 07:48:37'),
(1357, '', NULL, 'Steel', 1323, NULL, NULL, NULL, 'Shopping', 1, '2019-05-14 07:48:37', '2019-05-14 07:48:37'),
(1358, '', NULL, 'Titanium', 1323, NULL, NULL, NULL, 'Shopping', 1, '2019-05-14 07:48:37', '2019-05-14 07:48:37'),
(1359, '', NULL, 'Tungsten', 1323, NULL, NULL, NULL, 'Shopping', 1, '2019-05-14 07:48:37', '2019-05-14 07:48:37'),
(1360, '', NULL, 'Wire Mesh', 1323, NULL, NULL, NULL, 'Shopping', 1, '2019-05-14 07:48:37', '2019-05-14 07:48:37'),
(1361, '', NULL, 'Zinc', 1323, NULL, NULL, NULL, 'Shopping', 1, '2019-05-14 07:48:37', '2019-05-14 07:48:37'),
(1362, '', NULL, 'Chemicals', NULL, NULL, NULL, NULL, 'Shopping', 1, '2019-05-14 07:48:37', '2019-05-14 07:48:37'),
(1363, '', NULL, 'Gas Disposal', 1362, NULL, NULL, NULL, 'Shopping', 1, '2019-05-14 07:48:37', '2019-05-14 07:48:37'),
(1364, '', NULL, 'Noise Reduction Device', 1362, NULL, NULL, NULL, 'Shopping', 1, '2019-05-14 07:48:37', '2019-05-14 07:48:37'),
(1365, '', NULL, 'Other Environmental Products', 1362, NULL, NULL, NULL, 'Shopping', 1, '2019-05-14 07:48:37', '2019-05-14 07:48:37'),
(1366, '', NULL, 'Other Excess Inventory', 1362, NULL, NULL, NULL, 'Shopping', 1, '2019-05-14 07:48:37', '2019-05-14 07:48:37'),
(1367, '', NULL, 'Recycling', 1362, NULL, NULL, NULL, 'Shopping', 1, '2019-05-14 07:48:37', '2019-05-14 07:48:37'),
(1368, '', NULL, 'Sewer', 1362, NULL, NULL, NULL, 'Shopping', 1, '2019-05-14 07:48:37', '2019-05-14 07:48:37'),
(1369, '', NULL, 'Waste Management', 1362, NULL, NULL, NULL, 'Shopping', 1, '2019-05-14 07:48:37', '2019-05-14 07:48:37'),
(1370, '', NULL, 'Water Treatment', 1362, NULL, NULL, NULL, 'Shopping', 1, '2019-05-14 07:48:37', '2019-05-14 07:48:37'),
(1371, '', NULL, 'Textile Waste', 1362, NULL, NULL, NULL, 'Shopping', 1, '2019-05-14 07:48:37', '2019-05-14 07:48:37'),
(1372, '', NULL, 'Waste Paper', 1362, NULL, NULL, NULL, 'Shopping', 1, '2019-05-14 07:48:37', '2019-05-14 07:48:37'),
(1373, '', NULL, 'Other Recycling Products', 1362, NULL, NULL, NULL, 'Shopping', 1, '2019-05-14 07:48:37', '2019-05-14 07:48:37'),
(1374, '', NULL, 'Rubber & Plastics', NULL, NULL, NULL, NULL, 'Shopping', 1, '2019-05-14 07:48:37', '2019-05-14 07:48:37'),
(1375, '', NULL, 'Plastic Processing Service', 1374, NULL, NULL, NULL, 'Shopping', 1, '2019-05-14 07:48:37', '2019-05-14 07:48:37'),
(1376, '', NULL, 'Plastic Products', 1374, NULL, NULL, NULL, 'Shopping', 1, '2019-05-14 07:48:37', '2019-05-14 07:48:37'),
(1377, '', NULL, 'Plastic Projects', 1374, NULL, NULL, NULL, 'Shopping', 1, '2019-05-14 07:48:37', '2019-05-14 07:48:37'),
(1378, '', NULL, 'Plastic Raw Materials', 1374, NULL, NULL, NULL, 'Shopping', 1, '2019-05-14 07:48:37', '2019-05-14 07:48:37'),
(1379, '', NULL, 'Plastic Stocks', 1374, NULL, NULL, NULL, 'Shopping', 1, '2019-05-14 07:48:37', '2019-05-14 07:48:37'),
(1380, '', NULL, 'Recycled Plastic', 1374, NULL, NULL, NULL, 'Shopping', 1, '2019-05-14 07:48:37', '2019-05-14 07:48:37'),
(1381, '', NULL, 'Recycled Rubber', 1374, NULL, NULL, NULL, 'Shopping', 1, '2019-05-14 07:48:37', '2019-05-14 07:48:37'),
(1382, '', NULL, 'Rubber Processing Service', 1374, NULL, NULL, NULL, 'Shopping', 1, '2019-05-14 07:48:37', '2019-05-14 07:48:37'),
(1383, '', NULL, 'Rubber Products', 1374, NULL, NULL, NULL, 'Shopping', 1, '2019-05-14 07:48:37', '2019-05-14 07:48:37'),
(1384, '', NULL, 'Rubber Projects', 1374, NULL, NULL, NULL, 'Shopping', 1, '2019-05-14 07:48:37', '2019-05-14 07:48:37'),
(1385, '', NULL, 'Rubber Raw Materials', 1374, NULL, NULL, NULL, 'Shopping', 1, '2019-05-14 07:48:37', '2019-05-14 07:48:37'),
(1386, '', NULL, 'Rubber Stocks', 1374, NULL, NULL, NULL, 'Shopping', 1, '2019-05-14 07:48:37', '2019-05-14 07:48:37'),
(1387, '', NULL, 'Plastic Cards', 1374, NULL, NULL, NULL, 'Shopping', 1, '2019-05-14 07:48:37', '2019-05-14 07:48:37'),
(1388, '', NULL, 'PVC', 1374, NULL, NULL, NULL, 'Shopping', 1, '2019-05-14 07:48:37', '2019-05-14 07:48:37'),
(1389, '', NULL, 'Plastic Tubes', 1374, NULL, NULL, NULL, 'Shopping', 1, '2019-05-14 07:48:37', '2019-05-14 07:48:37'),
(1390, '', NULL, 'HDPE', 1374, NULL, NULL, NULL, 'Shopping', 1, '2019-05-14 07:48:37', '2019-05-14 07:48:37'),
(1391, '', NULL, 'Rubber Hoses', 1374, NULL, NULL, NULL, 'Shopping', 1, '2019-05-14 07:48:37', '2019-05-14 07:48:37'),
(1392, '', NULL, 'Plastic Sheets', 1374, NULL, NULL, NULL, 'Shopping', 1, '2019-05-14 07:48:37', '2019-05-14 07:48:37'),
(1393, '', NULL, 'LDPE', 1374, NULL, NULL, NULL, 'Shopping', 1, '2019-05-14 07:48:37', '2019-05-14 07:48:37'),
(1394, '', NULL, 'Agricultural Rubber', 1374, NULL, NULL, NULL, 'Shopping', 1, '2019-05-14 07:48:37', '2019-05-14 07:48:37'),
(1395, '', NULL, 'Energy', NULL, NULL, NULL, NULL, 'Shopping', 1, '2019-05-14 07:48:37', '2019-05-14 07:48:37'),
(1396, '', NULL, 'Biodiesel', 1395, NULL, NULL, NULL, 'Shopping', 1, '2019-05-14 07:48:37', '2019-05-14 07:48:37'),
(1397, '', NULL, 'Biogas', 1395, NULL, NULL, NULL, 'Shopping', 1, '2019-05-14 07:48:37', '2019-05-14 07:48:37'),
(1398, '', NULL, 'Charcoal', 1395, NULL, NULL, NULL, 'Shopping', 1, '2019-05-14 07:48:37', '2019-05-14 07:48:37'),
(1399, '', NULL, 'Coal', 1395, NULL, NULL, NULL, 'Shopping', 1, '2019-05-14 07:48:37', '2019-05-14 07:48:37'),
(1400, '', NULL, 'Coal Gas', 1395, NULL, NULL, NULL, 'Shopping', 1, '2019-05-14 07:48:37', '2019-05-14 07:48:37'),
(1401, '', NULL, 'Coke Fuel', 1395, NULL, NULL, NULL, 'Shopping', 1, '2019-05-14 07:48:37', '2019-05-14 07:48:37'),
(1402, '', NULL, 'Crude Oil', 1395, NULL, NULL, NULL, 'Shopping', 1, '2019-05-14 07:48:37', '2019-05-14 07:48:37'),
(1403, '', NULL, 'Electricity Generation', 1395, NULL, NULL, NULL, 'Shopping', 1, '2019-05-14 07:48:37', '2019-05-14 07:48:37'),
(1404, '', NULL, 'Petrochemical Products', 1395, NULL, NULL, NULL, 'Shopping', 1, '2019-05-14 07:48:37', '2019-05-14 07:48:37'),
(1405, '', NULL, 'Solar Energy Products', 1395, NULL, NULL, NULL, 'Shopping', 1, '2019-05-14 07:48:37', '2019-05-14 07:48:37'),
(1406, '', NULL, 'Industrial Fuel', 1395, NULL, NULL, NULL, 'Shopping', 1, '2019-05-14 07:48:37', '2019-05-14 07:48:37'),
(1407, '', NULL, 'Natural Gas', 1395, NULL, NULL, NULL, 'Shopping', 1, '2019-05-14 07:48:37', '2019-05-14 07:48:37'),
(1408, '', NULL, 'Other Energy Related Products', 1395, NULL, NULL, NULL, 'Shopping', 1, '2019-05-14 07:48:37', '2019-05-14 07:48:37'),
(1409, '', NULL, 'Wood Pellets', 1395, NULL, NULL, NULL, 'Shopping', 1, '2019-05-14 07:48:37', '2019-05-14 07:48:37'),
(1410, '', NULL, 'Solar Energy Systems', 1395, NULL, NULL, NULL, 'Shopping', 1, '2019-05-14 07:48:37', '2019-05-14 07:48:37'),
(1411, '', NULL, 'Lubricant', 1395, NULL, NULL, NULL, 'Shopping', 1, '2019-05-14 07:48:37', '2019-05-14 07:48:37'),
(1412, '', NULL, 'Diesel Fuel', 1395, NULL, NULL, NULL, 'Shopping', 1, '2019-05-14 07:48:37', '2019-05-14 07:48:37'),
(1413, '', NULL, 'Solar Chargers', 1395, NULL, NULL, NULL, 'Shopping', 1, '2019-05-14 07:48:37', '2019-05-14 07:48:37'),
(1414, '', NULL, 'Solar Collectors', 1395, NULL, NULL, NULL, 'Shopping', 1, '2019-05-14 07:48:37', '2019-05-14 07:48:37'),
(1415, '', NULL, 'Bitumen', 1395, NULL, NULL, NULL, 'Shopping', 1, '2019-05-14 07:48:37', '2019-05-14 07:48:37'),
(1416, '', NULL, 'Packaging & Printing', NULL, NULL, NULL, NULL, 'Shopping', 1, '2019-05-14 07:48:37', '2019-05-14 07:48:37'),
(1417, '', NULL, 'Adhesive Tape', 1416, NULL, NULL, NULL, 'Shopping', 1, '2019-05-14 07:48:37', '2019-05-14 07:48:37'),
(1418, '', NULL, 'Agricultural Packaging', 1416, NULL, NULL, NULL, 'Shopping', 1, '2019-05-14 07:48:37', '2019-05-14 07:48:37'),
(1419, '', NULL, 'Aluminum Foil', 1416, NULL, NULL, NULL, 'Shopping', 1, '2019-05-14 07:48:37', '2019-05-14 07:48:37'),
(1420, '', NULL, 'Apparel Packaging', 1416, NULL, NULL, NULL, 'Shopping', 1, '2019-05-14 07:48:37', '2019-05-14 07:48:37'),
(1421, '', NULL, 'Blister Cards', 1416, NULL, NULL, NULL, 'Shopping', 1, '2019-05-14 07:48:37', '2019-05-14 07:48:37'),
(1422, '', NULL, 'Bottles', 1416, NULL, NULL, NULL, 'Shopping', 1, '2019-05-14 07:48:37', '2019-05-14 07:48:37'),
(1423, '', NULL, 'Cans', 1416, NULL, NULL, NULL, 'Shopping', 1, '2019-05-14 07:48:37', '2019-05-14 07:48:37'),
(1424, '', NULL, 'Chemical Packaging', 1416, NULL, NULL, NULL, 'Shopping', 1, '2019-05-14 07:48:37', '2019-05-14 07:48:37'),
(1425, '', NULL, 'Composite Packaging', 1416, NULL, NULL, NULL, 'Shopping', 1, '2019-05-14 07:48:37', '2019-05-14 07:48:37'),
(1426, '', NULL, 'Materials Cosmetics Packaging', 1416, NULL, NULL, NULL, 'Shopping', 1, '2019-05-14 07:48:37', '2019-05-14 07:48:37'),
(1427, '', NULL, 'Electronics Packaging', 1416, NULL, NULL, NULL, 'Shopping', 1, '2019-05-14 07:48:37', '2019-05-14 07:48:37'),
(1428, '', NULL, 'Food Packaging', 1416, NULL, NULL, NULL, 'Shopping', 1, '2019-05-14 07:48:37', '2019-05-14 07:48:37'),
(1429, '', NULL, 'Gift Packaging', 1416, NULL, NULL, NULL, 'Shopping', 1, '2019-05-14 07:48:37', '2019-05-14 07:48:37'),
(1430, '', NULL, 'Handles', 1416, NULL, NULL, NULL, 'Shopping', 1, '2019-05-14 07:48:37', '2019-05-14 07:48:37'),
(1431, '', NULL, 'Hot Stamping Foil', 1416, NULL, NULL, NULL, 'Shopping', 1, '2019-05-14 07:48:37', '2019-05-14 07:48:37'),
(1432, '', NULL, 'Jars', 1416, NULL, NULL, NULL, 'Shopping', 1, '2019-05-14 07:48:37', '2019-05-14 07:48:37'),
(1433, '', NULL, 'Lids, Bottle Caps, Closures', 1416, NULL, NULL, NULL, 'Shopping', 1, '2019-05-14 07:48:37', '2019-05-14 07:48:37');
INSERT INTO `categories` (`id`, `profile_image`, `icon_image`, `name`, `parent_id`, `is_ad_additional_fields_req`, `is_ad_type_or_make_req`, `is_ad_condition_req`, `type`, `is_active`, `created_at`, `updated_at`) VALUES
(1434, '', NULL, 'Media Packaging', 1416, NULL, NULL, NULL, 'Shopping', 1, '2019-05-14 07:48:37', '2019-05-14 07:48:37'),
(1435, '', NULL, 'Metallized Film', 1416, NULL, NULL, NULL, 'Shopping', 1, '2019-05-14 07:48:37', '2019-05-14 07:48:37'),
(1436, '', NULL, 'Other Packaging Applications', 1416, NULL, NULL, NULL, 'Shopping', 1, '2019-05-14 07:48:37', '2019-05-14 07:48:37'),
(1437, '', NULL, 'Other Packaging Materials', 1416, NULL, NULL, NULL, 'Shopping', 1, '2019-05-14 07:48:37', '2019-05-14 07:48:37'),
(1438, '', NULL, 'Packaging Bags', 1416, NULL, NULL, NULL, 'Shopping', 1, '2019-05-14 07:48:37', '2019-05-14 07:48:37'),
(1439, '', NULL, 'Packaging Boxes', 1416, NULL, NULL, NULL, 'Shopping', 1, '2019-05-14 07:48:37', '2019-05-14 07:48:37'),
(1440, '', NULL, 'Packaging Labels', 1416, NULL, NULL, NULL, 'Shopping', 1, '2019-05-14 07:48:37', '2019-05-14 07:48:37'),
(1441, '', NULL, 'Packaging Product Stocks', 1416, NULL, NULL, NULL, 'Shopping', 1, '2019-05-14 07:48:37', '2019-05-14 07:48:37'),
(1442, '', NULL, 'Packaging Rope', 1416, NULL, NULL, NULL, 'Shopping', 1, '2019-05-14 07:48:37', '2019-05-14 07:48:37'),
(1443, '', NULL, 'Packaging Trays', 1416, NULL, NULL, NULL, 'Shopping', 1, '2019-05-14 07:48:37', '2019-05-14 07:48:37'),
(1444, '', NULL, 'Packaging Tubes', 1416, NULL, NULL, NULL, 'Shopping', 1, '2019-05-14 07:48:37', '2019-05-14 07:48:37'),
(1445, '', NULL, 'Paper & Paperboard', 1416, NULL, NULL, NULL, 'Shopping', 1, '2019-05-14 07:48:37', '2019-05-14 07:48:37'),
(1446, '', NULL, 'Paper Packaging', 1416, NULL, NULL, NULL, 'Shopping', 1, '2019-05-14 07:48:37', '2019-05-14 07:48:37'),
(1447, '', NULL, 'Pharmaceutical Packaging', 1416, NULL, NULL, NULL, 'Shopping', 1, '2019-05-14 07:48:37', '2019-05-14 07:48:37'),
(1448, '', NULL, 'Plastic Film', 1416, NULL, NULL, NULL, 'Shopping', 1, '2019-05-14 07:48:37', '2019-05-14 07:48:37'),
(1449, '', NULL, 'Plastic Packaging', 1416, NULL, NULL, NULL, 'Shopping', 1, '2019-05-14 07:48:37', '2019-05-14 07:48:37'),
(1450, '', NULL, 'Printing Materials', 1416, NULL, NULL, NULL, 'Shopping', 1, '2019-05-14 07:48:37', '2019-05-14 07:48:37'),
(1451, '', NULL, 'Printing Services', 1416, NULL, NULL, NULL, 'Shopping', 1, '2019-05-14 07:48:37', '2019-05-14 07:48:37'),
(1452, '', NULL, 'Protective Packaging', 1416, NULL, NULL, NULL, 'Shopping', 1, '2019-05-14 07:48:37', '2019-05-14 07:48:37'),
(1453, '', NULL, 'Pulp', 1416, NULL, NULL, NULL, 'Shopping', 1, '2019-05-14 07:48:37', '2019-05-14 07:48:37'),
(1454, '', NULL, 'Shrink Film', 1416, NULL, NULL, NULL, 'Shopping', 1, '2019-05-14 07:48:37', '2019-05-14 07:48:37'),
(1455, '', NULL, 'Strapping', 1416, NULL, NULL, NULL, 'Shopping', 1, '2019-05-14 07:48:37', '2019-05-14 07:48:37'),
(1456, '', NULL, 'Stretch Film', 1416, NULL, NULL, NULL, 'Shopping', 1, '2019-05-14 07:48:37', '2019-05-14 07:48:37'),
(1457, '', NULL, 'Tobacco Packaging', 1416, NULL, NULL, NULL, 'Shopping', 1, '2019-05-14 07:48:37', '2019-05-14 07:48:37'),
(1458, '', NULL, 'Transport Packaging', 1416, NULL, NULL, NULL, 'Shopping', 1, '2019-05-14 07:48:37', '2019-05-14 07:48:37'),
(1459, '', NULL, 'Office & School Supplies', NULL, NULL, NULL, NULL, 'Shopping', 1, '2019-05-14 07:48:37', '2019-05-14 07:48:37'),
(1460, '', NULL, 'Art Supplies', 1459, NULL, NULL, NULL, 'Shopping', 1, '2019-05-14 07:48:37', '2019-05-14 07:48:37'),
(1461, '', NULL, 'Badge Holder & Accessories', 1459, NULL, NULL, NULL, 'Shopping', 1, '2019-05-14 07:48:37', '2019-05-14 07:48:37'),
(1462, '', NULL, 'Board', 1459, NULL, NULL, NULL, 'Shopping', 1, '2019-05-14 07:48:37', '2019-05-14 07:48:37'),
(1463, '', NULL, 'Board Eraser', 1459, NULL, NULL, NULL, 'Shopping', 1, '2019-05-14 07:48:37', '2019-05-14 07:48:37'),
(1464, '', NULL, 'Book Cover', 1459, NULL, NULL, NULL, 'Shopping', 1, '2019-05-14 07:48:37', '2019-05-14 07:48:37'),
(1465, '', NULL, 'Books', 1459, NULL, NULL, NULL, 'Shopping', 1, '2019-05-14 07:48:37', '2019-05-14 07:48:37'),
(1466, '', NULL, 'Calculator', 1459, NULL, NULL, NULL, 'Shopping', 1, '2019-05-14 07:48:37', '2019-05-14 07:48:37'),
(1467, '', NULL, 'Calendar', 1459, NULL, NULL, NULL, 'Shopping', 1, '2019-05-14 07:48:37', '2019-05-14 07:48:37'),
(1468, '', NULL, 'Clipboard', 1459, NULL, NULL, NULL, 'Shopping', 1, '2019-05-14 07:48:37', '2019-05-14 07:48:37'),
(1469, '', NULL, 'Correction Supplies', 1459, NULL, NULL, NULL, 'Shopping', 1, '2019-05-14 07:48:37', '2019-05-14 07:48:37'),
(1470, '', NULL, 'Desk Organizer', 1459, NULL, NULL, NULL, 'Shopping', 1, '2019-05-14 07:48:37', '2019-05-14 07:48:37'),
(1471, '', NULL, 'Drafting Supplies', 1459, NULL, NULL, NULL, 'Shopping', 1, '2019-05-14 07:48:37', '2019-05-14 07:48:37'),
(1472, '', NULL, 'Easels', 1459, NULL, NULL, NULL, 'Shopping', 1, '2019-05-14 07:48:37', '2019-05-14 07:48:37'),
(1473, '', NULL, 'Educational Supplies', 1459, NULL, NULL, NULL, 'Shopping', 1, '2019-05-14 07:48:37', '2019-05-14 07:48:37'),
(1474, '', NULL, 'Filing Products', 1459, NULL, NULL, NULL, 'Shopping', 1, '2019-05-14 07:48:37', '2019-05-14 07:48:37'),
(1475, '', NULL, 'Letter Pad / Paper', 1459, NULL, NULL, NULL, 'Shopping', 1, '2019-05-14 07:48:37', '2019-05-14 07:48:37'),
(1476, '', NULL, 'Magazines', 1459, NULL, NULL, NULL, 'Shopping', 1, '2019-05-14 07:48:37', '2019-05-14 07:48:37'),
(1477, '', NULL, 'Map', 1459, NULL, NULL, NULL, 'Shopping', 1, '2019-05-14 07:48:37', '2019-05-14 07:48:37'),
(1478, '', NULL, 'Notebooks & Writing Pads', 1459, NULL, NULL, NULL, 'Shopping', 1, '2019-05-14 07:48:37', '2019-05-14 07:48:37'),
(1479, '', NULL, 'Office Adhesives & Tapes', 1459, NULL, NULL, NULL, 'Shopping', 1, '2019-05-14 07:48:37', '2019-05-14 07:48:37'),
(1480, '', NULL, 'Office Binding', 1459, NULL, NULL, NULL, 'Shopping', 1, '2019-05-14 07:48:37', '2019-05-14 07:48:37'),
(1481, '', NULL, 'Supplies Office', 1459, NULL, NULL, NULL, 'Shopping', 1, '2019-05-14 07:48:37', '2019-05-14 07:48:37'),
(1482, '', NULL, 'Cutting Supplies', 1459, NULL, NULL, NULL, 'Shopping', 1, '2019-05-14 07:48:37', '2019-05-14 07:48:37'),
(1483, '', NULL, 'Office Equipment', 1459, NULL, NULL, NULL, 'Shopping', 1, '2019-05-14 07:48:37', '2019-05-14 07:48:37'),
(1484, '', NULL, 'Office Paper', 1459, NULL, NULL, NULL, 'Shopping', 1, '2019-05-14 07:48:37', '2019-05-14 07:48:37'),
(1485, '', NULL, 'Other Office & School Supplies', 1459, NULL, NULL, NULL, 'Shopping', 1, '2019-05-14 07:48:37', '2019-05-14 07:48:37'),
(1486, '', NULL, 'Paper Envelopes', 1459, NULL, NULL, NULL, 'Shopping', 1, '2019-05-14 07:48:37', '2019-05-14 07:48:37'),
(1487, '', NULL, 'Pencil Cases & Bags', 1459, NULL, NULL, NULL, 'Shopping', 1, '2019-05-14 07:48:37', '2019-05-14 07:48:37'),
(1488, '', NULL, 'Pencil Sharpeners', 1459, NULL, NULL, NULL, 'Shopping', 1, '2019-05-14 07:48:37', '2019-05-14 07:48:37'),
(1489, '', NULL, 'Printer Supplies', 1459, NULL, NULL, NULL, 'Shopping', 1, '2019-05-14 07:48:37', '2019-05-14 07:48:37'),
(1490, '', NULL, 'Stamps', 1459, NULL, NULL, NULL, 'Shopping', 1, '2019-05-14 07:48:37', '2019-05-14 07:48:37'),
(1491, '', NULL, 'Stationery Set', 1459, NULL, NULL, NULL, 'Shopping', 1, '2019-05-14 07:48:37', '2019-05-14 07:48:37'),
(1492, '', NULL, 'Stencils', 1459, NULL, NULL, NULL, 'Shopping', 1, '2019-05-14 07:48:37', '2019-05-14 07:48:37'),
(1493, '', NULL, 'Writing Accessories', 1459, NULL, NULL, NULL, 'Shopping', 1, '2019-05-14 07:48:37', '2019-05-14 07:48:37'),
(1494, '', NULL, 'Writing Instruments', 1459, NULL, NULL, NULL, 'Shopping', 1, '2019-05-14 07:48:37', '2019-05-14 07:48:37'),
(1495, '', NULL, 'Yellow Pages', 1459, NULL, NULL, NULL, 'Shopping', 1, '2019-05-14 07:48:37', '2019-05-14 07:48:37'),
(1496, '', NULL, 'Service Equipment', NULL, NULL, NULL, NULL, 'Shopping', 1, '2019-05-14 07:48:37', '2019-05-14 07:48:37'),
(1497, '', NULL, 'Advertising Equipment', 1496, NULL, NULL, NULL, 'Shopping', 1, '2019-05-14 07:48:37', '2019-05-14 07:48:37'),
(1498, '', NULL, 'Cargo & Storage Equipment', 1496, NULL, NULL, NULL, 'Shopping', 1, '2019-05-14 07:48:37', '2019-05-14 07:48:37'),
(1499, '', NULL, 'Commercial Laundry Equipment', 1496, NULL, NULL, NULL, 'Shopping', 1, '2019-05-14 07:48:37', '2019-05-14 07:48:37'),
(1500, '', NULL, 'Financial Equipment', 1496, NULL, NULL, NULL, 'Shopping', 1, '2019-05-14 07:48:37', '2019-05-14 07:48:37'),
(1501, '', NULL, 'Funeral Supplies', 1496, NULL, NULL, NULL, 'Shopping', 1, '2019-05-14 07:48:37', '2019-05-14 07:48:37'),
(1502, '', NULL, 'Other Service Equipment', 1496, NULL, NULL, NULL, 'Shopping', 1, '2019-05-14 07:48:37', '2019-05-14 07:48:37'),
(1503, '', NULL, 'Restaurant & Hotel Supplies', 1496, NULL, NULL, NULL, 'Shopping', 1, '2019-05-14 07:48:37', '2019-05-14 07:48:37'),
(1504, '', NULL, 'Store & Supermarket Supplies', 1496, NULL, NULL, NULL, 'Shopping', 1, '2019-05-14 07:48:37', '2019-05-14 07:48:37'),
(1505, '', NULL, 'Trade Show Equipment', 1496, NULL, NULL, NULL, 'Shopping', 1, '2019-05-14 07:48:37', '2019-05-14 07:48:37'),
(1506, '', NULL, 'Vending Machines', 1496, NULL, NULL, NULL, 'Shopping', 1, '2019-05-14 07:48:37', '2019-05-14 07:48:37'),
(1507, '', NULL, 'Wedding Supplies', 1496, NULL, NULL, NULL, 'Shopping', 1, '2019-05-14 07:48:37', '2019-05-14 07:48:37'),
(1508, '', NULL, 'Display Racks', 1496, NULL, NULL, NULL, 'Shopping', 1, '2019-05-14 07:48:37', '2019-05-14 07:48:37'),
(1509, '', NULL, 'Advertising Players', 1496, NULL, NULL, NULL, 'Shopping', 1, '2019-05-14 07:48:37', '2019-05-14 07:48:37'),
(1510, '', NULL, 'Advertising Light Boxes', 1496, NULL, NULL, NULL, 'Shopping', 1, '2019-05-14 07:48:37', '2019-05-14 07:48:37'),
(1511, '', NULL, 'Hotel Amenities', 1496, NULL, NULL, NULL, 'Shopping', 1, '2019-05-14 07:48:37', '2019-05-14 07:48:37'),
(1512, '', NULL, 'POS Systems', 1496, NULL, NULL, NULL, 'Shopping', 1, '2019-05-14 07:48:37', '2019-05-14 07:48:37'),
(1513, '', NULL, 'Supermarket Shelves', 1496, NULL, NULL, NULL, 'Shopping', 1, '2019-05-14 07:48:37', '2019-05-14 07:48:37'),
(1514, '', NULL, 'Stacking Racks & Shelves', 1496, NULL, NULL, NULL, 'Shopping', 1, '2019-05-14 07:48:37', '2019-05-14 07:48:37'),
(1515, '', NULL, 'Refrigeration Equipment', 1496, NULL, NULL, NULL, 'Shopping', 1, '2019-05-14 07:48:37', '2019-05-14 07:48:37'),
(1516, '', NULL, 'Trade Show Tent', 1496, NULL, NULL, NULL, 'Shopping', 1, '2019-05-14 07:48:37', '2019-05-14 07:48:37'),
(1517, '', NULL, 'Beutation', NULL, NULL, NULL, NULL, 'Professionals', 1, '2019-05-14 07:48:37', '2019-05-14 07:48:37'),
(1518, '', NULL, 'Cosmetologist', 1517, NULL, NULL, NULL, 'Professionals', 1, '2019-05-14 07:48:37', '2019-05-14 07:48:37'),
(1519, '', NULL, 'Nail Care Artists', 1517, NULL, NULL, NULL, 'Professionals', 1, '2019-05-14 07:48:37', '2019-05-14 07:48:37'),
(1520, '', NULL, 'Hairstylist', 1517, NULL, NULL, NULL, 'Professionals', 1, '2019-05-14 07:48:37', '2019-05-14 07:48:37'),
(1521, '', NULL, 'Beauty Care Distributor', 1517, NULL, NULL, NULL, 'Professionals', 1, '2019-05-14 07:48:37', '2019-05-14 07:48:37'),
(1522, '', NULL, 'Salon Sales Consultant', 1517, NULL, NULL, NULL, 'Professionals', 1, '2019-05-14 07:48:37', '2019-05-14 07:48:37'),
(1523, '', NULL, 'Makeup Artist', 1517, NULL, NULL, NULL, 'Professionals', 1, '2019-05-14 07:48:37', '2019-05-14 07:48:37'),
(1524, '', NULL, 'Manufacturer Sales Representative', 1517, NULL, NULL, NULL, 'Professionals', 1, '2019-05-14 07:48:37', '2019-05-14 07:48:37'),
(1525, '', NULL, 'Fashion Show Stylist', 1517, NULL, NULL, NULL, 'Professionals', 1, '2019-05-14 07:48:37', '2019-05-14 07:48:37'),
(1526, '', NULL, 'Cosmetology Instructor', 1517, NULL, NULL, NULL, 'Professionals', 1, '2019-05-14 07:48:37', '2019-05-14 07:48:37'),
(1527, '', NULL, 'Beauty Magazine Writer', 1517, NULL, NULL, NULL, 'Professionals', 1, '2019-05-14 07:48:37', '2019-05-14 07:48:37'),
(1528, '', NULL, 'waxing and other forms of hair removal', 1517, NULL, NULL, NULL, 'Professionals', 1, '2019-05-14 07:48:37', '2019-05-14 07:48:37'),
(1529, '', NULL, 'Nail treatments', 1517, NULL, NULL, NULL, 'Professionals', 1, '2019-05-14 07:48:37', '2019-05-14 07:48:37'),
(1530, '', NULL, 'Facials and skin care treatments', 1517, NULL, NULL, NULL, 'Professionals', 1, '2019-05-14 07:48:37', '2019-05-14 07:48:37'),
(1531, '', NULL, 'Tanninganning', 1517, NULL, NULL, NULL, 'Professionals', 1, '2019-05-14 07:48:37', '2019-05-14 07:48:37'),
(1532, '', NULL, 'Massages', 1517, NULL, NULL, NULL, 'Professionals', 1, '2019-05-14 07:48:37', '2019-05-14 07:48:37'),
(1533, '', NULL, 'Complementary care such as aromatherapy', 1517, NULL, NULL, NULL, 'Professionals', 1, '2019-05-14 07:48:37', '2019-05-14 07:48:37'),
(1534, '', NULL, 'Butcher', NULL, NULL, NULL, NULL, 'Professionals', 1, '2019-05-14 07:48:37', '2019-05-14 07:48:37'),
(1535, '', NULL, 'Beef', 1534, NULL, NULL, NULL, 'Professionals', 1, '2019-05-14 07:48:37', '2019-05-14 07:48:37'),
(1536, '', NULL, 'Chicken and Turkey', 1534, NULL, NULL, NULL, 'Professionals', 1, '2019-05-14 07:48:37', '2019-05-14 07:48:37'),
(1537, '', NULL, 'Fish', 1534, NULL, NULL, NULL, 'Professionals', 1, '2019-05-14 07:48:37', '2019-05-14 07:48:37'),
(1538, '', NULL, 'Crab', 1534, NULL, NULL, NULL, 'Professionals', 1, '2019-05-14 07:48:37', '2019-05-14 07:48:37'),
(1539, '', NULL, 'Goat', 1534, NULL, NULL, NULL, 'Professionals', 1, '2019-05-14 07:48:37', '2019-05-14 07:48:37'),
(1540, '', NULL, 'Lamb', 1534, NULL, NULL, NULL, 'Professionals', 1, '2019-05-14 07:48:37', '2019-05-14 07:48:37'),
(1541, '', NULL, 'Lobster', 1534, NULL, NULL, NULL, 'Professionals', 1, '2019-05-14 07:48:38', '2019-05-14 07:48:38'),
(1542, '', NULL, 'Building Contractor', NULL, NULL, NULL, NULL, 'Professionals', 1, '2019-05-14 07:48:38', '2019-05-14 07:48:38'),
(1543, '', NULL, 'General Contractor', 1542, NULL, NULL, NULL, 'Professionals', 1, '2019-05-14 07:48:38', '2019-05-14 07:48:38'),
(1544, '', NULL, 'Electrician', 1542, NULL, NULL, NULL, 'Professionals', 1, '2019-05-14 07:48:38', '2019-05-14 07:48:38'),
(1545, '', NULL, 'Plumber', 1542, NULL, NULL, NULL, 'Professionals', 1, '2019-05-14 07:48:38', '2019-05-14 07:48:38'),
(1546, '', NULL, 'Heating and Ductwork', 1542, NULL, NULL, NULL, 'Professionals', 1, '2019-05-14 07:48:38', '2019-05-14 07:48:38'),
(1547, '', NULL, 'Drywaller', 1542, NULL, NULL, NULL, 'Professionals', 1, '2019-05-14 07:48:38', '2019-05-14 07:48:38'),
(1548, '', NULL, 'Painter', 1542, NULL, NULL, NULL, 'Professionals', 1, '2019-05-14 07:48:38', '2019-05-14 07:48:38'),
(1549, '', NULL, 'Finish Carpenter', 1542, NULL, NULL, NULL, 'Professionals', 1, '2019-05-14 07:48:38', '2019-05-14 07:48:38'),
(1550, '', NULL, 'Baking', 33, NULL, NULL, NULL, 'Professionals', 1, '2019-05-14 07:48:38', '2019-05-14 07:48:38'),
(1551, '', NULL, 'Roasting', 33, NULL, NULL, NULL, 'Professionals', 1, '2019-05-14 07:48:38', '2019-05-14 07:48:38'),
(1552, '', NULL, 'Broiling and grilling', 33, NULL, NULL, NULL, 'Professionals', 1, '2019-05-14 07:48:38', '2019-05-14 07:48:38'),
(1553, '', NULL, 'Frying', 33, NULL, NULL, NULL, 'Professionals', 1, '2019-05-14 07:48:38', '2019-05-14 07:48:38'),
(1554, '', NULL, 'Steamin', 33, NULL, NULL, NULL, 'Professionals', 1, '2019-05-14 07:48:38', '2019-05-14 07:48:38'),
(1555, '', NULL, 'Italian', 33, NULL, NULL, NULL, 'Professionals', 1, '2019-05-14 07:48:38', '2019-05-14 07:48:38'),
(1556, '', NULL, 'Fast Food', 33, NULL, NULL, NULL, 'Professionals', 1, '2019-05-14 07:48:38', '2019-05-14 07:48:38'),
(1557, '', NULL, 'Pizza', 33, NULL, NULL, NULL, 'Professionals', 1, '2019-05-14 07:48:38', '2019-05-14 07:48:38'),
(1558, '', NULL, 'Biryani', 33, NULL, NULL, NULL, 'Professionals', 1, '2019-05-14 07:48:38', '2019-05-14 07:48:38'),
(1559, '', NULL, 'chinese', 33, NULL, NULL, NULL, 'Professionals', 1, '2019-05-14 07:48:38', '2019-05-14 07:48:38'),
(1560, '', NULL, 'Acupuncture', 31, NULL, NULL, NULL, 'Professionals', 1, '2019-05-14 07:48:38', '2019-05-14 07:48:38'),
(1561, '', NULL, 'Advanced Practice Midwife', 31, NULL, NULL, NULL, 'Professionals', 1, '2019-05-14 07:48:38', '2019-05-14 07:48:38'),
(1562, '', NULL, 'Aesthetic Medicine', 31, NULL, NULL, NULL, 'Professionals', 1, '2019-05-14 07:48:38', '2019-05-14 07:48:38'),
(1563, '', NULL, 'Aesthetician', 31, NULL, NULL, NULL, 'Professionals', 1, '2019-05-14 07:48:38', '2019-05-14 07:48:38'),
(1564, '', NULL, 'Allergist/Immunologist', 31, NULL, NULL, NULL, 'Professionals', 1, '2019-05-14 07:48:38', '2019-05-14 07:48:38'),
(1565, '', NULL, 'Anesthesiologist', 31, NULL, NULL, NULL, 'Professionals', 1, '2019-05-14 07:48:38', '2019-05-14 07:48:38'),
(1566, '', NULL, 'Cardiac Electrophysiologist', 31, NULL, NULL, NULL, 'Professionals', 1, '2019-05-14 07:48:38', '2019-05-14 07:48:38'),
(1567, '', NULL, 'Cardiologist', 31, NULL, NULL, NULL, 'Professionals', 1, '2019-05-14 07:48:38', '2019-05-14 07:48:38'),
(1568, '', NULL, 'Cardiothoracic Surgeon', 31, NULL, NULL, NULL, 'Professionals', 1, '2019-05-14 07:48:38', '2019-05-14 07:48:38'),
(1569, '', NULL, 'Child & Adolescent Psychiatry', 31, NULL, NULL, NULL, 'Professionals', 1, '2019-05-14 07:48:38', '2019-05-14 07:48:38'),
(1570, '', NULL, 'Chiropractor', 31, NULL, NULL, NULL, 'Professionals', 1, '2019-05-14 07:48:38', '2019-05-14 07:48:38'),
(1571, '', NULL, 'Clinical Social Worker', 31, NULL, NULL, NULL, 'Professionals', 1, '2019-05-14 07:48:38', '2019-05-14 07:48:38'),
(1572, '', NULL, 'Colorectal Surgeon', 31, NULL, NULL, NULL, 'Professionals', 1, '2019-05-14 07:48:38', '2019-05-14 07:48:38'),
(1573, '', NULL, 'Correactology', 31, NULL, NULL, NULL, 'Professionals', 1, '2019-05-14 07:48:38', '2019-05-14 07:48:38'),
(1574, '', NULL, 'Cosmetic Medicine', 31, NULL, NULL, NULL, 'Professionals', 1, '2019-05-14 07:48:38', '2019-05-14 07:48:38'),
(1575, '', NULL, 'Counselor Mental Health', 31, NULL, NULL, NULL, 'Professionals', 1, '2019-05-14 07:48:38', '2019-05-14 07:48:38'),
(1576, '', NULL, 'Counselor Professional', 31, NULL, NULL, NULL, 'Professionals', 1, '2019-05-14 07:48:38', '2019-05-14 07:48:38'),
(1577, '', NULL, 'Counselor', 31, NULL, NULL, NULL, 'Professionals', 1, '2019-05-14 07:48:38', '2019-05-14 07:48:38'),
(1578, '', NULL, 'Dentist', 31, NULL, NULL, NULL, 'Professionals', 1, '2019-05-14 07:48:38', '2019-05-14 07:48:38'),
(1579, '', NULL, 'Diabetology', 31, NULL, NULL, NULL, 'Professionals', 1, '2019-05-14 07:48:38', '2019-05-14 07:48:38'),
(1580, '', NULL, 'Dermatologist', 31, NULL, NULL, NULL, 'Professionals', 1, '2019-05-14 07:48:38', '2019-05-14 07:48:38'),
(1581, '', NULL, 'Diagnostic Medical Sonographer', 31, NULL, NULL, NULL, 'Professionals', 1, '2019-05-14 07:48:38', '2019-05-14 07:48:38'),
(1582, '', NULL, 'Dietitian, Registered', 31, NULL, NULL, NULL, 'Professionals', 1, '2019-05-14 07:48:38', '2019-05-14 07:48:38'),
(1583, '', NULL, 'Ear-Nose-Throat Specialist (ENT)', 31, NULL, NULL, NULL, 'Professionals', 1, '2019-05-14 07:48:38', '2019-05-14 07:48:38'),
(1584, '', NULL, 'Emergency Medicine Physician', 31, NULL, NULL, NULL, 'Professionals', 1, '2019-05-14 07:48:38', '2019-05-14 07:48:38'),
(1585, '', NULL, 'Endocrinologist', 31, NULL, NULL, NULL, 'Professionals', 1, '2019-05-14 07:48:38', '2019-05-14 07:48:38'),
(1586, '', NULL, 'Endodontist', 31, NULL, NULL, NULL, 'Professionals', 1, '2019-05-14 07:48:38', '2019-05-14 07:48:38'),
(1587, '', NULL, 'Epidemiologist', 31, NULL, NULL, NULL, 'Professionals', 1, '2019-05-14 07:48:38', '2019-05-14 07:48:38'),
(1588, '', NULL, 'Family Practitioner', 31, NULL, NULL, NULL, 'Professionals', 1, '2019-05-14 07:48:38', '2019-05-14 07:48:38'),
(1589, '', NULL, 'Gastroenterologist', 31, NULL, NULL, NULL, 'Professionals', 1, '2019-05-14 07:48:38', '2019-05-14 07:48:38'),
(1590, '', NULL, 'General Practice', 31, NULL, NULL, NULL, 'Professionals', 1, '2019-05-14 07:48:38', '2019-05-14 07:48:38'),
(1591, '', NULL, 'General Surgeon', 31, NULL, NULL, NULL, 'Professionals', 1, '2019-05-14 07:48:38', '2019-05-14 07:48:38'),
(1592, '', NULL, 'Geneticist', 31, NULL, NULL, NULL, 'Professionals', 1, '2019-05-14 07:48:38', '2019-05-14 07:48:38'),
(1593, '', NULL, 'Geriatrician', 31, NULL, NULL, NULL, 'Professionals', 1, '2019-05-14 07:48:38', '2019-05-14 07:48:38'),
(1594, '', NULL, 'Gerontologist', 31, NULL, NULL, NULL, 'Professionals', 1, '2019-05-14 07:48:38', '2019-05-14 07:48:38'),
(1595, '', NULL, 'Gynecologist (no OB)', 31, NULL, NULL, NULL, 'Professionals', 1, '2019-05-14 07:48:38', '2019-05-14 07:48:38'),
(1596, '', NULL, 'Gynegologic Oncologist', 31, NULL, NULL, NULL, 'Professionals', 1, '2019-05-14 07:48:38', '2019-05-14 07:48:38'),
(1597, '', NULL, 'Hand Surgeon', 31, NULL, NULL, NULL, 'Professionals', 1, '2019-05-14 07:48:38', '2019-05-14 07:48:38'),
(1598, '', NULL, 'Hematologist', 31, NULL, NULL, NULL, 'Professionals', 1, '2019-05-14 07:48:38', '2019-05-14 07:48:38'),
(1599, '', NULL, 'Home Care', 31, NULL, NULL, NULL, 'Professionals', 1, '2019-05-14 07:48:38', '2019-05-14 07:48:38'),
(1600, '', NULL, 'Hospice', 31, NULL, NULL, NULL, 'Professionals', 1, '2019-05-14 07:48:38', '2019-05-14 07:48:38'),
(1601, '', NULL, 'Hospitalist', 31, NULL, NULL, NULL, 'Professionals', 1, '2019-05-14 07:48:38', '2019-05-14 07:48:38'),
(1602, '', NULL, 'Infectious Disease Specialist', 31, NULL, NULL, NULL, 'Professionals', 1, '2019-05-14 07:48:38', '2019-05-14 07:48:38'),
(1603, '', NULL, 'Integrative and Functional Medicine', 31, NULL, NULL, NULL, 'Professionals', 1, '2019-05-14 07:48:38', '2019-05-14 07:48:38'),
(1604, '', NULL, 'Integrative Medicine', 31, NULL, NULL, NULL, 'Professionals', 1, '2019-05-14 07:48:38', '2019-05-14 07:48:38'),
(1605, '', NULL, 'Internist', 31, NULL, NULL, NULL, 'Professionals', 1, '2019-05-14 07:48:38', '2019-05-14 07:48:38'),
(1606, '', NULL, 'Laboratory Medicine Specialist', 31, NULL, NULL, NULL, 'Professionals', 1, '2019-05-14 07:48:38', '2019-05-14 07:48:38'),
(1607, '', NULL, 'Laser Surgery', 31, NULL, NULL, NULL, 'Professionals', 1, '2019-05-14 07:48:38', '2019-05-14 07:48:38'),
(1608, '', NULL, 'Massage Therapist', 31, NULL, NULL, NULL, 'Professionals', 1, '2019-05-14 07:48:38', '2019-05-14 07:48:38'),
(1609, '', NULL, 'Naturopathic Physician', 31, NULL, NULL, NULL, 'Professionals', 1, '2019-05-14 07:48:38', '2019-05-14 07:48:38'),
(1610, '', NULL, 'Neonatologist', 31, NULL, NULL, NULL, 'Professionals', 1, '2019-05-14 07:48:38', '2019-05-14 07:48:38'),
(1611, '', NULL, 'Nephrologist', 31, NULL, NULL, NULL, 'Professionals', 1, '2019-05-14 07:48:38', '2019-05-14 07:48:38'),
(1612, '', NULL, 'Neurologist', 31, NULL, NULL, NULL, 'Professionals', 1, '2019-05-14 07:48:38', '2019-05-14 07:48:38'),
(1613, '', NULL, 'Neuropsychology', 31, NULL, NULL, NULL, 'Professionals', 1, '2019-05-14 07:48:38', '2019-05-14 07:48:38'),
(1614, '', NULL, 'Neurosurgeon', 31, NULL, NULL, NULL, 'Professionals', 1, '2019-05-14 07:48:38', '2019-05-14 07:48:38'),
(1615, '', NULL, 'Not Actively Practicing', 31, NULL, NULL, NULL, 'Professionals', 1, '2019-05-14 07:48:38', '2019-05-14 07:48:38'),
(1616, '', NULL, 'Nuclear Medicine Specialist', 31, NULL, NULL, NULL, 'Professionals', 1, '2019-05-14 07:48:38', '2019-05-14 07:48:38'),
(1617, '', NULL, 'Nurse Practitioner', 31, NULL, NULL, NULL, 'Professionals', 1, '2019-05-14 07:48:38', '2019-05-14 07:48:38'),
(1618, '', NULL, 'Nursing', 31, NULL, NULL, NULL, 'Professionals', 1, '2019-05-14 07:48:38', '2019-05-14 07:48:38'),
(1619, '', NULL, 'Nutritionist', 31, NULL, NULL, NULL, 'Professionals', 1, '2019-05-14 07:48:38', '2019-05-14 07:48:38'),
(1620, '', NULL, 'Obstetrician/Gynecologist', 31, NULL, NULL, NULL, 'Professionals', 1, '2019-05-14 07:48:38', '2019-05-14 07:48:38'),
(1621, '', NULL, 'Occupational Medicine', 31, NULL, NULL, NULL, 'Professionals', 1, '2019-05-14 07:48:38', '2019-05-14 07:48:38'),
(1622, '', NULL, 'Occupational Therapist', 31, NULL, NULL, NULL, 'Professionals', 1, '2019-05-14 07:48:38', '2019-05-14 07:48:38'),
(1623, '', NULL, 'Oncologist', 31, NULL, NULL, NULL, 'Professionals', 1, '2019-05-14 07:48:38', '2019-05-14 07:48:38'),
(1624, '', NULL, 'Ophthalmologist', 31, NULL, NULL, NULL, 'Professionals', 1, '2019-05-14 07:48:38', '2019-05-14 07:48:38'),
(1625, '', NULL, 'Optometrist', 31, NULL, NULL, NULL, 'Professionals', 1, '2019-05-14 07:48:38', '2019-05-14 07:48:38'),
(1626, '', NULL, 'Oral Surgeon', 31, NULL, NULL, NULL, 'Professionals', 1, '2019-05-14 07:48:38', '2019-05-14 07:48:38'),
(1627, '', NULL, 'Orofacial Pain', 31, NULL, NULL, NULL, 'Professionals', 1, '2019-05-14 07:48:38', '2019-05-14 07:48:38'),
(1628, '', NULL, 'Orthodontist', 31, NULL, NULL, NULL, 'Professionals', 1, '2019-05-14 07:48:38', '2019-05-14 07:48:38'),
(1629, '', NULL, 'Orthopedic Surgeon', 31, NULL, NULL, NULL, 'Professionals', 1, '2019-05-14 07:48:38', '2019-05-14 07:48:38'),
(1630, '', NULL, 'Orthotist', 31, NULL, NULL, NULL, 'Professionals', 1, '2019-05-14 07:48:38', '2019-05-14 07:48:38'),
(1631, '', NULL, 'Other', 31, NULL, NULL, NULL, 'Professionals', 1, '2019-05-14 07:48:38', '2019-05-14 07:48:38'),
(1632, '', NULL, 'Pain Management Specialist', 31, NULL, NULL, NULL, 'Professionals', 1, '2019-05-14 07:48:38', '2019-05-14 07:48:38'),
(1633, '', NULL, 'Pathologist', 31, NULL, NULL, NULL, 'Professionals', 1, '2019-05-14 07:48:38', '2019-05-14 07:48:38'),
(1634, '', NULL, 'Pediatric Dentist', 31, NULL, NULL, NULL, 'Professionals', 1, '2019-05-14 07:48:38', '2019-05-14 07:48:38'),
(1635, '', NULL, 'Pediatric Gastroenterology', 31, NULL, NULL, NULL, 'Professionals', 1, '2019-05-14 07:48:38', '2019-05-14 07:48:38'),
(1636, '', NULL, 'Pediatric Surgeon', 31, NULL, NULL, NULL, 'Professionals', 1, '2019-05-14 07:48:38', '2019-05-14 07:48:38'),
(1637, '', NULL, 'Pediatrician', 31, NULL, NULL, NULL, 'Professionals', 1, '2019-05-14 07:48:38', '2019-05-14 07:48:38'),
(1638, '', NULL, 'Perinatologist', 31, NULL, NULL, NULL, 'Professionals', 1, '2019-05-14 07:48:38', '2019-05-14 07:48:38'),
(1639, '', NULL, 'Periodontist', 31, NULL, NULL, NULL, 'Professionals', 1, '2019-05-14 07:48:38', '2019-05-14 07:48:38'),
(1640, '', NULL, 'Physical Medicine and Rehab Specialist', 31, NULL, NULL, NULL, 'Professionals', 1, '2019-05-14 07:48:38', '2019-05-14 07:48:38'),
(1641, '', NULL, 'Physical Therapist', 31, NULL, NULL, NULL, 'Professionals', 1, '2019-05-14 07:48:38', '2019-05-14 07:48:38'),
(1642, '', NULL, 'Physician Assistant', 31, NULL, NULL, NULL, 'Professionals', 1, '2019-05-14 07:48:38', '2019-05-14 07:48:38'),
(1643, '', NULL, 'Plastic Surgeon', 31, NULL, NULL, NULL, 'Professionals', 1, '2019-05-14 07:48:38', '2019-05-14 07:48:38'),
(1644, '', NULL, 'Podiatrist', 31, NULL, NULL, NULL, 'Professionals', 1, '2019-05-14 07:48:38', '2019-05-14 07:48:38'),
(1645, '', NULL, 'Preventive-Aging Medicine', 31, NULL, NULL, NULL, 'Professionals', 1, '2019-05-14 07:48:38', '2019-05-14 07:48:38'),
(1646, '', NULL, 'Preventive Medicine/Occupational-Environmental Medicine', 31, NULL, NULL, NULL, 'Professionals', 1, '2019-05-14 07:48:38', '2019-05-14 07:48:38'),
(1647, '', NULL, 'Primary Care Physician', 31, NULL, NULL, NULL, 'Professionals', 1, '2019-05-14 07:48:38', '2019-05-14 07:48:38'),
(1648, '', NULL, 'Prosthetist', 31, NULL, NULL, NULL, 'Professionals', 1, '2019-05-14 07:48:38', '2019-05-14 07:48:38'),
(1649, '', NULL, 'Prosthodontist', 31, NULL, NULL, NULL, 'Professionals', 1, '2019-05-14 07:48:38', '2019-05-14 07:48:38'),
(1650, '', NULL, 'Psychiatrist', 31, NULL, NULL, NULL, 'Professionals', 1, '2019-05-14 07:48:38', '2019-05-14 07:48:38'),
(1651, '', NULL, 'Psychologist', 31, NULL, NULL, NULL, 'Professionals', 1, '2019-05-14 07:48:38', '2019-05-14 07:48:38'),
(1652, '', NULL, 'Public Health Professional', 31, NULL, NULL, NULL, 'Professionals', 1, '2019-05-14 07:48:38', '2019-05-14 07:48:38'),
(1653, '', NULL, 'Pulmonologist', 31, NULL, NULL, NULL, 'Professionals', 1, '2019-05-14 07:48:38', '2019-05-14 07:48:38'),
(1654, '', NULL, 'Radiation Oncologist', 31, NULL, NULL, NULL, 'Professionals', 1, '2019-05-14 07:48:38', '2019-05-14 07:48:38'),
(1655, '', NULL, 'Radiologist', 31, NULL, NULL, NULL, 'Professionals', 1, '2019-05-14 07:48:38', '2019-05-14 07:48:38'),
(1656, '', NULL, 'Registered Nurse', 31, NULL, NULL, NULL, 'Professionals', 1, '2019-05-14 07:48:38', '2019-05-14 07:48:38'),
(1657, '', NULL, 'Religious Nonmedical Practitioner', 31, NULL, NULL, NULL, 'Professionals', 1, '2019-05-14 07:48:38', '2019-05-14 07:48:38'),
(1658, '', NULL, 'Rheumatologist', 31, NULL, NULL, NULL, 'Professionals', 1, '2019-05-14 07:48:38', '2019-05-14 07:48:38'),
(1659, '', NULL, 'Sleep Medicine', 31, NULL, NULL, NULL, 'Professionals', 1, '2019-05-14 07:48:38', '2019-05-14 07:48:38'),
(1660, '', NULL, 'Speech-Language Pathologist', 31, NULL, NULL, NULL, 'Professionals', 1, '2019-05-14 07:48:38', '2019-05-14 07:48:38'),
(1661, '', NULL, 'Sports Medicine Specialist', 31, NULL, NULL, NULL, 'Professionals', 1, '2019-05-14 07:48:38', '2019-05-14 07:48:38'),
(1662, '', NULL, 'Urologist', 31, NULL, NULL, NULL, 'Professionals', 1, '2019-05-14 07:48:38', '2019-05-14 07:48:38'),
(1663, '', NULL, 'Urgent Care', 31, NULL, NULL, NULL, 'Professionals', 1, '2019-05-14 07:48:38', '2019-05-14 07:48:38'),
(1664, '', NULL, 'Vascular Surgeon', 31, NULL, NULL, NULL, 'Professionals', 1, '2019-05-14 07:48:38', '2019-05-14 07:48:38'),
(1665, '', NULL, 'Driver', NULL, NULL, NULL, NULL, 'Professionals', 1, '2019-05-14 07:48:38', '2019-05-14 07:48:38'),
(1666, '', NULL, 'Taxicab driver', 1665, NULL, NULL, NULL, 'Professionals', 1, '2019-05-14 07:48:38', '2019-05-14 07:48:38'),
(1667, '', NULL, 'Chauffeur', 1665, NULL, NULL, NULL, 'Professionals', 1, '2019-05-14 07:48:38', '2019-05-14 07:48:38'),
(1668, '', NULL, 'Pay driver', 1665, NULL, NULL, NULL, 'Professionals', 1, '2019-05-14 07:48:38', '2019-05-14 07:48:38'),
(1669, '', NULL, 'Test driver', 1665, NULL, NULL, NULL, 'Professionals', 1, '2019-05-14 07:48:38', '2019-05-14 07:48:38'),
(1670, '', NULL, 'Delivery (commerce)', 1665, NULL, NULL, NULL, 'Professionals', 1, '2019-05-14 07:48:38', '2019-05-14 07:48:38'),
(1671, '', NULL, 'Bus driver', 1665, NULL, NULL, NULL, 'Professionals', 1, '2019-05-14 07:48:38', '2019-05-14 07:48:38'),
(1672, '', NULL, 'Truck driver', 1665, NULL, NULL, NULL, 'Professionals', 1, '2019-05-14 07:48:38', '2019-05-14 07:48:38'),
(1673, '', NULL, 'Motorman', 1665, NULL, NULL, NULL, 'Professionals', 1, '2019-05-14 07:48:38', '2019-05-14 07:48:38'),
(1674, '', NULL, 'heavy machinery', 1665, NULL, NULL, NULL, 'Professionals', 1, '2019-05-14 07:48:38', '2019-05-14 07:48:38'),
(1675, '', NULL, 'Domestic Electrical Installers', 36, NULL, NULL, NULL, 'Professionals', 1, '2019-05-14 07:48:38', '2019-05-14 07:48:38'),
(1676, '', NULL, 'Installation Electrician', 36, NULL, NULL, NULL, 'Professionals', 1, '2019-05-14 07:48:38', '2019-05-14 07:48:38'),
(1677, '', NULL, 'Maintenance Electrician', 36, NULL, NULL, NULL, 'Professionals', 1, '2019-05-14 07:48:38', '2019-05-14 07:48:38'),
(1678, '', NULL, 'Electrotechnical Panel Builder', 36, NULL, NULL, NULL, 'Professionals', 1, '2019-05-14 07:48:38', '2019-05-14 07:48:38'),
(1679, '', NULL, 'Instrumentation Electrician', 36, NULL, NULL, NULL, 'Professionals', 1, '2019-05-14 07:48:38', '2019-05-14 07:48:38'),
(1680, '', NULL, 'Electrical Machine Repairer & Rewinder', 36, NULL, NULL, NULL, 'Professionals', 1, '2019-05-14 07:48:38', '2019-05-14 07:48:38'),
(1681, '', NULL, 'Highway Electrical Systems Electrician', 36, NULL, NULL, NULL, 'Professionals', 1, '2019-05-14 07:48:38', '2019-05-14 07:48:38'),
(1682, '', NULL, 'Planner', NULL, NULL, NULL, NULL, 'Professionals', 1, '2019-05-14 07:48:38', '2019-05-14 07:48:38'),
(1683, '', NULL, 'Children’s Party Planner', 1682, NULL, NULL, NULL, 'Professionals', 1, '2019-05-14 07:48:38', '2019-05-14 07:48:38'),
(1684, '', NULL, 'Corporate Event Planner', 1682, NULL, NULL, NULL, 'Professionals', 1, '2019-05-14 07:48:38', '2019-05-14 07:48:38'),
(1685, '', NULL, 'Event Planner', 1682, NULL, NULL, NULL, 'Professionals', 1, '2019-05-14 07:48:38', '2019-05-14 07:48:38'),
(1686, '', NULL, 'Financial Planner', 1682, NULL, NULL, NULL, 'Professionals', 1, '2019-05-14 07:48:38', '2019-05-14 07:48:38'),
(1687, '', NULL, 'Meeting Planner', 1682, NULL, NULL, NULL, 'Professionals', 1, '2019-05-14 07:48:38', '2019-05-14 07:48:38'),
(1688, '', NULL, 'Party Planner', 1682, NULL, NULL, NULL, 'Professionals', 1, '2019-05-14 07:48:38', '2019-05-14 07:48:38'),
(1689, '', NULL, 'Wedding Planner', 1682, NULL, NULL, NULL, 'Professionals', 1, '2019-05-14 07:48:38', '2019-05-14 07:48:38'),
(1690, '', NULL, 'Consultant', NULL, NULL, NULL, NULL, 'Professionals', 1, '2019-05-14 07:48:38', '2019-05-14 07:48:38'),
(1691, '', NULL, 'IT Systems Consultant', 1690, NULL, NULL, NULL, 'Professionals', 1, '2019-05-14 07:48:38', '2019-05-14 07:48:38'),
(1692, '', NULL, 'Affiliate Sales and Marketing Consultant', 1690, NULL, NULL, NULL, 'Professionals', 1, '2019-05-14 07:48:38', '2019-05-14 07:48:38'),
(1693, '', NULL, 'Art-Buying Consultant', 1690, NULL, NULL, NULL, 'Professionals', 1, '2019-05-14 07:48:38', '2019-05-14 07:48:38'),
(1694, '', NULL, 'Blog Consultant', 1690, NULL, NULL, NULL, 'Professionals', 1, '2019-05-14 07:48:38', '2019-05-14 07:48:38'),
(1695, '', NULL, 'Bridal Consultant', 1690, NULL, NULL, NULL, 'Professionals', 1, '2019-05-14 07:48:38', '2019-05-14 07:48:38'),
(1696, '', NULL, 'Business Consultant', 1690, NULL, NULL, NULL, 'Professionals', 1, '2019-05-14 07:48:38', '2019-05-14 07:48:38'),
(1697, '', NULL, 'College Application Consultant', 1690, NULL, NULL, NULL, 'Professionals', 1, '2019-05-14 07:48:38', '2019-05-14 07:48:38'),
(1698, '', NULL, 'Consultant on Foreign Cultures', 1690, NULL, NULL, NULL, 'Professionals', 1, '2019-05-14 07:48:38', '2019-05-14 07:48:38'),
(1699, '', NULL, 'Data Management Consultant', 1690, NULL, NULL, NULL, 'Professionals', 1, '2019-05-14 07:48:38', '2019-05-14 07:48:38'),
(1700, '', NULL, 'eBay Consultant', 1690, NULL, NULL, NULL, 'Professionals', 1, '2019-05-14 07:48:38', '2019-05-14 07:48:38'),
(1701, '', NULL, 'Financial Aid Consultant', 1690, NULL, NULL, NULL, 'Professionals', 1, '2019-05-14 07:48:38', '2019-05-14 07:48:38'),
(1702, '', NULL, 'Gardening Consultant', 1690, NULL, NULL, NULL, 'Professionals', 1, '2019-05-14 07:48:38', '2019-05-14 07:48:38'),
(1703, '', NULL, 'Green Consultant', 1690, NULL, NULL, NULL, 'Professionals', 1, '2019-05-14 07:48:38', '2019-05-14 07:48:38'),
(1704, '', NULL, 'Home Baby Proofing Consultant', 1690, NULL, NULL, NULL, 'Professionals', 1, '2019-05-14 07:48:38', '2019-05-14 07:48:38'),
(1705, '', NULL, 'Home Office Consultant', 1690, NULL, NULL, NULL, 'Professionals', 1, '2019-05-14 07:48:38', '2019-05-14 07:48:38'),
(1706, '', NULL, 'Image Consultant', 1690, NULL, NULL, NULL, 'Professionals', 1, '2019-05-14 07:48:38', '2019-05-14 07:48:38'),
(1707, '', NULL, 'Lactation Consultant', 1690, NULL, NULL, NULL, 'Professionals', 1, '2019-05-14 07:48:38', '2019-05-14 07:48:38'),
(1708, '', NULL, 'Nutrition Consultant', 1690, NULL, NULL, NULL, 'Professionals', 1, '2019-05-14 07:48:38', '2019-05-14 07:48:38'),
(1709, '', NULL, 'Online Course Consultant', 1690, NULL, NULL, NULL, 'Professionals', 1, '2019-05-14 07:48:38', '2019-05-14 07:48:38'),
(1710, '', NULL, 'Online Dating Consultant / Profile Editor', 1690, NULL, NULL, NULL, 'Professionals', 1, '2019-05-14 07:48:38', '2019-05-14 07:48:38'),
(1711, '', NULL, 'Online Security Consultant', 1690, NULL, NULL, NULL, 'Professionals', 1, '2019-05-14 07:48:38', '2019-05-14 07:48:38'),
(1712, '', NULL, 'Private School Application Consultant', 1690, NULL, NULL, NULL, 'Professionals', 1, '2019-05-14 07:48:39', '2019-05-14 07:48:39'),
(1713, '', NULL, 'Public Relations Consultant', 1690, NULL, NULL, NULL, 'Professionals', 1, '2019-05-14 07:48:39', '2019-05-14 07:48:39'),
(1714, '', NULL, 'Sales Consultant', 1690, NULL, NULL, NULL, 'Professionals', 1, '2019-05-14 07:48:39', '2019-05-14 07:48:39'),
(1715, '', NULL, 'SEO Consultant', 1690, NULL, NULL, NULL, 'Professionals', 1, '2019-05-14 07:48:39', '2019-05-14 07:48:39'),
(1716, '', NULL, 'Social Media Consultant', 1690, NULL, NULL, NULL, 'Professionals', 1, '2019-05-14 07:48:39', '2019-05-14 07:48:39'),
(1717, '', NULL, 'Acadmic Consultant', 1690, NULL, NULL, NULL, 'Professionals', 1, '2019-05-14 07:48:39', '2019-05-14 07:48:39'),
(1718, '', NULL, 'immigration consultant', 1690, NULL, NULL, NULL, 'Professionals', 1, '2019-05-14 07:48:39', '2019-05-14 07:48:39'),
(1719, '', NULL, 'IT Freelancer', NULL, NULL, NULL, NULL, 'Professionals', 1, '2019-05-14 07:48:39', '2019-05-14 07:48:39'),
(1720, '', NULL, 'Desktop Software Development', 1719, NULL, NULL, NULL, 'Professionals', 1, '2019-05-14 07:48:39', '2019-05-14 07:48:39'),
(1721, '', NULL, 'Ecommerce Development', 1719, NULL, NULL, NULL, 'Professionals', 1, '2019-05-14 07:48:39', '2019-05-14 07:48:39'),
(1722, '', NULL, 'Game Development', 1719, NULL, NULL, NULL, 'Professionals', 1, '2019-05-14 07:48:39', '2019-05-14 07:48:39'),
(1723, '', NULL, 'Mobile Development', 1719, NULL, NULL, NULL, 'Professionals', 1, '2019-05-14 07:48:39', '2019-05-14 07:48:39'),
(1724, '', NULL, 'QA & Testing', 1719, NULL, NULL, NULL, 'Professionals', 1, '2019-05-14 07:48:39', '2019-05-14 07:48:39'),
(1725, '', NULL, 'Scripts & Utilities', 1719, NULL, NULL, NULL, 'Professionals', 1, '2019-05-14 07:48:39', '2019-05-14 07:48:39'),
(1726, '', NULL, 'Web Development', 1719, NULL, NULL, NULL, 'Professionals', 1, '2019-05-14 07:48:39', '2019-05-14 07:48:39'),
(1727, '', NULL, 'Web & Mobile Design', 1719, NULL, NULL, NULL, 'Professionals', 1, '2019-05-14 07:48:39', '2019-05-14 07:48:39'),
(1728, '', NULL, 'IT & Networking', 1719, NULL, NULL, NULL, 'Professionals', 1, '2019-05-14 07:48:39', '2019-05-14 07:48:39'),
(1729, '', NULL, 'Database Administration', 1719, NULL, NULL, NULL, 'Professionals', 1, '2019-05-14 07:48:39', '2019-05-14 07:48:39'),
(1730, '', NULL, 'ERP / CRM Software', 1719, NULL, NULL, NULL, 'Professionals', 1, '2019-05-14 07:48:39', '2019-05-14 07:48:39'),
(1731, '', NULL, 'Information Security', 1719, NULL, NULL, NULL, 'Professionals', 1, '2019-05-14 07:48:39', '2019-05-14 07:48:39'),
(1732, '', NULL, 'Network & System Administration', 1719, NULL, NULL, NULL, 'Professionals', 1, '2019-05-14 07:48:39', '2019-05-14 07:48:39'),
(1733, '', NULL, 'Data Science & Analytics', 1719, NULL, NULL, NULL, 'Professionals', 1, '2019-05-14 07:48:39', '2019-05-14 07:48:39'),
(1734, '', NULL, 'A/B Testing', 1719, NULL, NULL, NULL, 'Professionals', 1, '2019-05-14 07:48:39', '2019-05-14 07:48:39'),
(1735, '', NULL, 'Data Extraction / ETL', 1719, NULL, NULL, NULL, 'Professionals', 1, '2019-05-14 07:48:39', '2019-05-14 07:48:39'),
(1736, '', NULL, 'Data Mining & Management', 1719, NULL, NULL, NULL, 'Professionals', 1, '2019-05-14 07:48:39', '2019-05-14 07:48:39'),
(1737, '', NULL, 'Data Visualization', 1719, NULL, NULL, NULL, 'Professionals', 1, '2019-05-14 07:48:39', '2019-05-14 07:48:39'),
(1738, '', NULL, 'Machine Learning', 1719, NULL, NULL, NULL, 'Professionals', 1, '2019-05-14 07:48:39', '2019-05-14 07:48:39'),
(1739, '', NULL, 'Quantitative Analysis', 1719, NULL, NULL, NULL, 'Professionals', 1, '2019-05-14 07:48:39', '2019-05-14 07:48:39'),
(1740, '', NULL, 'Design & Creative', 1719, NULL, NULL, NULL, 'Professionals', 1, '2019-05-14 07:48:39', '2019-05-14 07:48:39'),
(1741, '', NULL, 'Animation', 1719, NULL, NULL, NULL, 'Professionals', 1, '2019-05-14 07:48:39', '2019-05-14 07:48:39'),
(1742, '', NULL, 'Art & Illustration', 1719, NULL, NULL, NULL, 'Professionals', 1, '2019-05-14 07:48:39', '2019-05-14 07:48:39'),
(1743, '', NULL, 'Audio Production', 1719, NULL, NULL, NULL, 'Professionals', 1, '2019-05-14 07:48:39', '2019-05-14 07:48:39'),
(1744, '', NULL, 'Brand Identity & Strategy', 1719, NULL, NULL, NULL, 'Professionals', 1, '2019-05-14 07:48:39', '2019-05-14 07:48:39'),
(1745, '', NULL, 'Graphics & Design', 1719, NULL, NULL, NULL, 'Professionals', 1, '2019-05-14 07:48:39', '2019-05-14 07:48:39'),
(1746, '', NULL, 'Logo Design & Branding', 1719, NULL, NULL, NULL, 'Professionals', 1, '2019-05-14 07:48:39', '2019-05-14 07:48:39'),
(1747, '', NULL, 'Motion Graphics', 1719, NULL, NULL, NULL, 'Professionals', 1, '2019-05-14 07:48:39', '2019-05-14 07:48:39'),
(1748, '', NULL, 'Photography', 1719, NULL, NULL, NULL, 'Professionals', 1, '2019-05-14 07:48:39', '2019-05-14 07:48:39'),
(1749, '', NULL, 'Presentations', 1719, NULL, NULL, NULL, 'Professionals', 1, '2019-05-14 07:48:39', '2019-05-14 07:48:39'),
(1750, '', NULL, 'Video Production', 1719, NULL, NULL, NULL, 'Professionals', 1, '2019-05-14 07:48:39', '2019-05-14 07:48:39'),
(1751, '', NULL, 'Voice Talent', 1719, NULL, NULL, NULL, 'Professionals', 1, '2019-05-14 07:48:39', '2019-05-14 07:48:39'),
(1752, '', NULL, 'Display Advertising', 1719, NULL, NULL, NULL, 'Professionals', 1, '2019-05-14 07:48:39', '2019-05-14 07:48:39'),
(1753, '', NULL, 'Email & Marketing Automation', 1719, NULL, NULL, NULL, 'Professionals', 1, '2019-05-14 07:48:39', '2019-05-14 07:48:39'),
(1754, '', NULL, 'Lead Generation', 1719, NULL, NULL, NULL, 'Professionals', 1, '2019-05-14 07:48:39', '2019-05-14 07:48:39'),
(1755, '', NULL, 'Market & Customer Research', 1719, NULL, NULL, NULL, 'Professionals', 1, '2019-05-14 07:48:39', '2019-05-14 07:48:39'),
(1756, '', NULL, 'Marketing Strategy', 1719, NULL, NULL, NULL, 'Professionals', 1, '2019-05-14 07:48:39', '2019-05-14 07:48:39'),
(1757, '', NULL, 'Public Relations', 1719, NULL, NULL, NULL, 'Professionals', 1, '2019-05-14 07:48:39', '2019-05-14 07:48:39'),
(1758, '', NULL, 'SEM - Search Engine Marketing', 1719, NULL, NULL, NULL, 'Professionals', 1, '2019-05-14 07:48:39', '2019-05-14 07:48:39'),
(1759, '', NULL, 'SEO - Search Engine Optimization', 1719, NULL, NULL, NULL, 'Professionals', 1, '2019-05-14 07:48:39', '2019-05-14 07:48:39'),
(1760, '', NULL, 'SMM - Social Media Marketing', 1719, NULL, NULL, NULL, 'Professionals', 1, '2019-05-14 07:48:39', '2019-05-14 07:48:39'),
(1761, '', NULL, 'Aboriginal Law', 39, NULL, NULL, NULL, 'Professionals', 1, '2019-05-14 07:48:39', '2019-05-14 07:48:39'),
(1762, '', NULL, 'Business Law', 39, NULL, NULL, NULL, 'Professionals', 1, '2019-05-14 07:48:39', '2019-05-14 07:48:39'),
(1763, '', NULL, 'Constitutional Law', 39, NULL, NULL, NULL, 'Professionals', 1, '2019-05-14 07:48:39', '2019-05-14 07:48:39'),
(1764, '', NULL, 'Corporate/Commercial Law', 39, NULL, NULL, NULL, 'Professionals', 1, '2019-05-14 07:48:39', '2019-05-14 07:48:39'),
(1765, '', NULL, 'Criminal Law', 39, NULL, NULL, NULL, 'Professionals', 1, '2019-05-14 07:48:39', '2019-05-14 07:48:39'),
(1766, '', NULL, 'Administrative Law', 39, NULL, NULL, NULL, 'Professionals', 1, '2019-05-14 07:48:39', '2019-05-14 07:48:39'),
(1767, '', NULL, 'Civil Law', 39, NULL, NULL, NULL, 'Professionals', 1, '2019-05-14 07:48:39', '2019-05-14 07:48:39'),
(1768, '', NULL, 'Employment Law', 39, NULL, NULL, NULL, 'Professionals', 1, '2019-05-14 07:48:39', '2019-05-14 07:48:39'),
(1769, '', NULL, 'Family/Divorce Law', 39, NULL, NULL, NULL, 'Professionals', 1, '2019-05-14 07:48:39', '2019-05-14 07:48:39'),
(1770, '', NULL, 'Immigration Law', 39, NULL, NULL, NULL, 'Professionals', 1, '2019-05-14 07:48:39', '2019-05-14 07:48:39'),
(1771, '', NULL, 'Real Estate law', 39, NULL, NULL, NULL, 'Professionals', 1, '2019-05-14 07:48:39', '2019-05-14 07:48:39'),
(1772, '', NULL, 'Wills/Estate Law', 39, NULL, NULL, NULL, 'Professionals', 1, '2019-05-14 07:48:39', '2019-05-14 07:48:39'),
(1773, '', NULL, 'Mediation Services', 39, NULL, NULL, NULL, 'Professionals', 1, '2019-05-14 07:48:39', '2019-05-14 07:48:39'),
(1774, '', NULL, 'Entertainment Law', 39, NULL, NULL, NULL, 'Professionals', 1, '2019-05-14 07:48:39', '2019-05-14 07:48:39'),
(1775, '', NULL, 'Collections Law', 39, NULL, NULL, NULL, 'Professionals', 1, '2019-05-14 07:48:39', '2019-05-14 07:48:39'),
(1776, '', NULL, 'Human Rights Law', 39, NULL, NULL, NULL, 'Professionals', 1, '2019-05-14 07:48:39', '2019-05-14 07:48:39'),
(1777, '', NULL, 'Personal Injury', 39, NULL, NULL, NULL, 'Professionals', 1, '2019-05-14 07:48:39', '2019-05-14 07:48:39'),
(1778, '', NULL, 'Strata and Condominium', 39, NULL, NULL, NULL, 'Professionals', 1, '2019-05-14 07:48:39', '2019-05-14 07:48:39'),
(1779, '', NULL, 'Tax Law', 39, NULL, NULL, NULL, 'Professionals', 1, '2019-05-14 07:48:39', '2019-05-14 07:48:39'),
(1780, '', NULL, 'Collaborative Law', 39, NULL, NULL, NULL, 'Professionals', 1, '2019-05-14 07:48:39', '2019-05-14 07:48:39'),
(1781, '', NULL, 'Contract Litigation', 39, NULL, NULL, NULL, 'Professionals', 1, '2019-05-14 07:48:39', '2019-05-14 07:48:39'),
(1782, '', NULL, 'Insurance Law', 39, NULL, NULL, NULL, 'Professionals', 1, '2019-05-14 07:48:39', '2019-05-14 07:48:39'),
(1783, '', NULL, 'Trial Law', 39, NULL, NULL, NULL, 'Professionals', 1, '2019-05-14 07:48:39', '2019-05-14 07:48:39'),
(1784, '', NULL, 'Arbitration Law', 39, NULL, NULL, NULL, 'Professionals', 1, '2019-05-14 07:48:39', '2019-05-14 07:48:39'),
(1785, '', NULL, 'Court Agent', 39, NULL, NULL, NULL, 'Professionals', 1, '2019-05-14 07:48:39', '2019-05-14 07:48:39'),
(1786, '', NULL, 'Paralegal', 39, NULL, NULL, NULL, 'Professionals', 1, '2019-05-14 07:48:39', '2019-05-14 07:48:39'),
(1787, '', NULL, 'Local Servent', NULL, NULL, NULL, NULL, 'Professionals', 1, '2019-05-14 07:48:39', '2019-05-14 07:48:39'),
(1788, '', NULL, 'Maid', 1787, NULL, NULL, NULL, 'Professionals', 1, '2019-05-14 07:48:39', '2019-05-14 07:48:39'),
(1789, '', NULL, 'Office Boy', 1787, NULL, NULL, NULL, 'Professionals', 1, '2019-05-14 07:48:39', '2019-05-14 07:48:39'),
(1790, '', NULL, 'Cleaner', 1787, NULL, NULL, NULL, 'Professionals', 1, '2019-05-14 07:48:39', '2019-05-14 07:48:39'),
(1791, '', NULL, 'Painter', 1787, NULL, NULL, NULL, 'Professionals', 1, '2019-05-14 07:48:39', '2019-05-14 07:48:39'),
(1792, '', NULL, 'Security Guard', 1787, NULL, NULL, NULL, 'Professionals', 1, '2019-05-14 07:48:39', '2019-05-14 07:48:39'),
(1793, '', NULL, 'gardener', 1787, NULL, NULL, NULL, 'Professionals', 1, '2019-05-14 07:48:39', '2019-05-14 07:48:39'),
(1794, '', NULL, 'MilkMan', 1787, NULL, NULL, NULL, 'Professionals', 1, '2019-05-14 07:48:39', '2019-05-14 07:48:39'),
(1795, '', NULL, 'Air Duct Cleaner', 1787, NULL, NULL, NULL, 'Professionals', 1, '2019-05-14 07:48:39', '2019-05-14 07:48:39'),
(1796, '', NULL, 'Green Cleaner', 1787, NULL, NULL, NULL, 'Professionals', 1, '2019-05-14 07:48:39', '2019-05-14 07:48:39'),
(1797, '', NULL, 'Gutter Cleaner', 1787, NULL, NULL, NULL, 'Professionals', 1, '2019-05-14 07:48:39', '2019-05-14 07:48:39'),
(1798, '', NULL, 'Pool Cleaner', 1787, NULL, NULL, NULL, 'Professionals', 1, '2019-05-14 07:48:39', '2019-05-14 07:48:39'),
(1799, '', NULL, 'Vacuum Cleaner', 1787, NULL, NULL, NULL, 'Professionals', 1, '2019-05-14 07:48:39', '2019-05-14 07:48:39'),
(1800, '', NULL, 'Carpanter', 1787, NULL, NULL, NULL, 'Professionals', 1, '2019-05-14 07:48:39', '2019-05-14 07:48:39'),
(1801, '', NULL, 'Musician', NULL, NULL, NULL, NULL, 'Professionals', 1, '2019-05-14 07:48:39', '2019-05-14 07:48:39'),
(1802, '', NULL, 'Orchestrator', 1801, NULL, NULL, NULL, 'Professionals', 1, '2019-05-14 07:48:39', '2019-05-14 07:48:39'),
(1803, '', NULL, 'Improviser', 1801, NULL, NULL, NULL, 'Professionals', 1, '2019-05-14 07:48:39', '2019-05-14 07:48:39'),
(1804, '', NULL, 'Rapper', 1801, NULL, NULL, NULL, 'Professionals', 1, '2019-05-14 07:48:39', '2019-05-14 07:48:39'),
(1805, '', NULL, 'Conductor', 1801, NULL, NULL, NULL, 'Professionals', 1, '2019-05-14 07:48:39', '2019-05-14 07:48:39'),
(1806, '', NULL, 'Singer (vocalist)', 1801, NULL, NULL, NULL, 'Professionals', 1, '2019-05-14 07:48:39', '2019-05-14 07:48:39'),
(1807, '', NULL, 'Record producer', 1801, NULL, NULL, NULL, 'Professionals', 1, '2019-05-14 07:48:39', '2019-05-14 07:48:39'),
(1808, '', NULL, 'Composer', 1801, NULL, NULL, NULL, 'Professionals', 1, '2019-05-14 07:48:39', '2019-05-14 07:48:39'),
(1809, '', NULL, 'Arranger', 1801, NULL, NULL, NULL, 'Professionals', 1, '2019-05-14 07:48:39', '2019-05-14 07:48:39'),
(1810, '', NULL, 'Instrumentalist', 1801, NULL, NULL, NULL, 'Professionals', 1, '2019-05-14 07:48:39', '2019-05-14 07:48:39'),
(1811, '', NULL, 'Accordionist', 1801, NULL, NULL, NULL, 'Professionals', 1, '2019-05-14 07:48:39', '2019-05-14 07:48:39'),
(1812, '', NULL, 'Bassoonist', 1801, NULL, NULL, NULL, 'Professionals', 1, '2019-05-14 07:48:39', '2019-05-14 07:48:39'),
(1813, '', NULL, 'Cellist', 1801, NULL, NULL, NULL, 'Professionals', 1, '2019-05-14 07:48:39', '2019-05-14 07:48:39'),
(1814, '', NULL, 'Clarinetist', 1801, NULL, NULL, NULL, 'Professionals', 1, '2019-05-14 07:48:39', '2019-05-14 07:48:39'),
(1815, '', NULL, 'Electronic musician', 1801, NULL, NULL, NULL, 'Professionals', 1, '2019-05-14 07:48:39', '2019-05-14 07:48:39'),
(1816, '', NULL, 'Flautist', 1801, NULL, NULL, NULL, 'Professionals', 1, '2019-05-14 07:48:39', '2019-05-14 07:48:39'),
(1817, '', NULL, 'Guitarist (Electric, Acoustic)', 1801, NULL, NULL, NULL, 'Professionals', 1, '2019-05-14 07:48:39', '2019-05-14 07:48:39'),
(1818, '', NULL, 'Keyboardist (Keyboard player)', 1801, NULL, NULL, NULL, 'Professionals', 1, '2019-05-14 07:48:39', '2019-05-14 07:48:39'),
(1819, '', NULL, 'Organist', 1801, NULL, NULL, NULL, 'Professionals', 1, '2019-05-14 07:48:39', '2019-05-14 07:48:39'),
(1820, '', NULL, 'Pianist', 1801, NULL, NULL, NULL, 'Professionals', 1, '2019-05-14 07:48:39', '2019-05-14 07:48:39'),
(1821, '', NULL, 'Percussionist', 1801, NULL, NULL, NULL, 'Professionals', 1, '2019-05-14 07:48:39', '2019-05-14 07:48:39'),
(1822, '', NULL, 'Saxophonist', 1801, NULL, NULL, NULL, 'Professionals', 1, '2019-05-14 07:48:39', '2019-05-14 07:48:39'),
(1823, '', NULL, 'Trumpeter (also Trumpet player)', 1801, NULL, NULL, NULL, 'Professionals', 1, '2019-05-14 07:48:39', '2019-05-14 07:48:39'),
(1824, '', NULL, 'Violinist', 1801, NULL, NULL, NULL, 'Professionals', 1, '2019-05-14 07:48:39', '2019-05-14 07:48:39'),
(1825, '', NULL, 'Violist (Viola player)', 1801, NULL, NULL, NULL, 'Professionals', 1, '2019-05-14 07:48:39', '2019-05-14 07:48:39'),
(1826, '', NULL, 'Bassist', 1801, NULL, NULL, NULL, 'Professionals', 1, '2019-05-14 07:48:39', '2019-05-14 07:48:39'),
(1827, '', NULL, 'Harpist', 1801, NULL, NULL, NULL, 'Professionals', 1, '2019-05-14 07:48:39', '2019-05-14 07:48:39'),
(1828, '', NULL, 'Bouzouki player', 1801, NULL, NULL, NULL, 'Professionals', 1, '2019-05-14 07:48:39', '2019-05-14 07:48:39'),
(1829, '', NULL, 'Hornist', 1801, NULL, NULL, NULL, 'Professionals', 1, '2019-05-14 07:48:39', '2019-05-14 07:48:39'),
(1830, '', NULL, 'Euphoniumist', 1801, NULL, NULL, NULL, 'Professionals', 1, '2019-05-14 07:48:39', '2019-05-14 07:48:39'),
(1831, '', NULL, 'Organ grinder', 1801, NULL, NULL, NULL, 'Professionals', 1, '2019-05-14 07:48:39', '2019-05-14 07:48:39');
INSERT INTO `categories` (`id`, `profile_image`, `icon_image`, `name`, `parent_id`, `is_ad_additional_fields_req`, `is_ad_type_or_make_req`, `is_ad_condition_req`, `type`, `is_active`, `created_at`, `updated_at`) VALUES
(1832, '', NULL, 'Drummer', 1801, NULL, NULL, NULL, 'Professionals', 1, '2019-05-14 07:48:39', '2019-05-14 07:48:39'),
(1833, '', NULL, 'Bandurist', 1801, NULL, NULL, NULL, 'Professionals', 1, '2019-05-14 07:48:39', '2019-05-14 07:48:39'),
(1834, '', NULL, 'Technician/Mechanic', NULL, NULL, NULL, NULL, 'Professionals', 1, '2019-05-14 07:48:39', '2019-05-14 07:48:39'),
(1835, '', NULL, 'Auto Mechanic', 1834, NULL, NULL, NULL, 'Professionals', 1, '2019-05-14 07:48:39', '2019-05-14 07:48:39'),
(1836, '', NULL, 'Heavy Vehicle Mechanic', 1834, NULL, NULL, NULL, 'Professionals', 1, '2019-05-14 07:48:39', '2019-05-14 07:48:39'),
(1837, '', NULL, 'Motorcycle Mechanic', 1834, NULL, NULL, NULL, 'Professionals', 1, '2019-05-14 07:48:39', '2019-05-14 07:48:39'),
(1838, '', NULL, 'Small Engine Mechanic', 1834, NULL, NULL, NULL, 'Professionals', 1, '2019-05-14 07:48:39', '2019-05-14 07:48:39'),
(1839, '', NULL, 'Diesel Mechanic', 1834, NULL, NULL, NULL, 'Professionals', 1, '2019-05-14 07:48:39', '2019-05-14 07:48:39'),
(1840, '', NULL, 'Photographer', NULL, NULL, NULL, NULL, 'Professionals', 1, '2019-05-14 07:48:39', '2019-05-14 07:48:39'),
(1841, '', NULL, 'Player', NULL, NULL, NULL, NULL, 'Professionals', 1, '2019-05-14 07:48:39', '2019-05-14 07:48:39'),
(1842, '', NULL, 'Football', 1841, NULL, NULL, NULL, 'Professionals', 1, '2019-05-14 07:48:39', '2019-05-14 07:48:39'),
(1843, '', NULL, 'Basketball', 1841, NULL, NULL, NULL, 'Professionals', 1, '2019-05-14 07:48:39', '2019-05-14 07:48:39'),
(1844, '', NULL, 'Tennis', 1841, NULL, NULL, NULL, 'Professionals', 1, '2019-05-14 07:48:39', '2019-05-14 07:48:39'),
(1845, '', NULL, 'Cricket', 1841, NULL, NULL, NULL, 'Professionals', 1, '2019-05-14 07:48:39', '2019-05-14 07:48:39'),
(1846, '', NULL, 'Formula 1', 1841, NULL, NULL, NULL, 'Professionals', 1, '2019-05-14 07:48:39', '2019-05-14 07:48:39'),
(1847, '', NULL, 'Baseball', 1841, NULL, NULL, NULL, 'Professionals', 1, '2019-05-14 07:48:39', '2019-05-14 07:48:39'),
(1848, '', NULL, 'Athletics', 1841, NULL, NULL, NULL, 'Professionals', 1, '2019-05-14 07:48:39', '2019-05-14 07:48:39'),
(1849, '', NULL, 'American football', 1841, NULL, NULL, NULL, 'Professionals', 1, '2019-05-14 07:48:39', '2019-05-14 07:48:39'),
(1850, '', NULL, 'Boxing', 1841, NULL, NULL, NULL, 'Professionals', 1, '2019-05-14 07:48:39', '2019-05-14 07:48:39'),
(1851, '', NULL, 'Golf', 1841, NULL, NULL, NULL, 'Professionals', 1, '2019-05-14 07:48:39', '2019-05-14 07:48:39'),
(1852, '', NULL, 'Ice Hockey', 1841, NULL, NULL, NULL, 'Professionals', 1, '2019-05-14 07:48:39', '2019-05-14 07:48:39'),
(1853, '', NULL, 'Volleyball', 1841, NULL, NULL, NULL, 'Professionals', 1, '2019-05-14 07:48:39', '2019-05-14 07:48:39'),
(1854, '', NULL, 'Badminton', 1841, NULL, NULL, NULL, 'Professionals', 1, '2019-05-14 07:48:39', '2019-05-14 07:48:39'),
(1855, '', NULL, 'Cycling', 1841, NULL, NULL, NULL, 'Professionals', 1, '2019-05-14 07:48:39', '2019-05-14 07:48:39'),
(1856, '', NULL, 'Rugby Union', 1841, NULL, NULL, NULL, 'Professionals', 1, '2019-05-14 07:48:39', '2019-05-14 07:48:39'),
(1857, '', NULL, 'Swimming', 1841, NULL, NULL, NULL, 'Professionals', 1, '2019-05-14 07:48:39', '2019-05-14 07:48:39'),
(1858, '', NULL, 'Mixed Martial Arts', 1841, NULL, NULL, NULL, 'Professionals', 1, '2019-05-14 07:48:39', '2019-05-14 07:48:39'),
(1859, '', NULL, 'Snooker', 1841, NULL, NULL, NULL, 'Professionals', 1, '2019-05-14 07:48:39', '2019-05-14 07:48:39'),
(1860, '', NULL, 'Moto GP/Motorbike', 1841, NULL, NULL, NULL, 'Professionals', 1, '2019-05-14 07:48:39', '2019-05-14 07:48:39'),
(1861, '', NULL, 'Field Hockey', 1841, NULL, NULL, NULL, 'Professionals', 1, '2019-05-14 07:48:39', '2019-05-14 07:48:39'),
(1862, '', NULL, 'Nascar', 1841, NULL, NULL, NULL, 'Professionals', 1, '2019-05-14 07:48:39', '2019-05-14 07:48:39'),
(1863, '', NULL, 'Handball', 1841, NULL, NULL, NULL, 'Professionals', 1, '2019-05-14 07:48:39', '2019-05-14 07:48:39'),
(1864, '', NULL, 'Table Tennis', 1841, NULL, NULL, NULL, 'Professionals', 1, '2019-05-14 07:48:39', '2019-05-14 07:48:39'),
(1865, '', NULL, 'Horse Racing', 1841, NULL, NULL, NULL, 'Professionals', 1, '2019-05-14 07:48:39', '2019-05-14 07:48:39'),
(1866, '', NULL, 'Gymnastics', 1841, NULL, NULL, NULL, 'Professionals', 1, '2019-05-14 07:48:39', '2019-05-14 07:48:39'),
(1867, '', NULL, 'Rally', 1841, NULL, NULL, NULL, 'Professionals', 1, '2019-05-14 07:48:39', '2019-05-14 07:48:39'),
(1868, '', NULL, 'Wrestling', 1841, NULL, NULL, NULL, 'Professionals', 1, '2019-05-14 07:48:39', '2019-05-14 07:48:39'),
(1869, '', NULL, 'Downhill Skiing', 1841, NULL, NULL, NULL, 'Professionals', 1, '2019-05-14 07:48:39', '2019-05-14 07:48:39'),
(1870, '', NULL, 'Figure Skating', 1841, NULL, NULL, NULL, 'Professionals', 1, '2019-05-14 07:48:39', '2019-05-14 07:48:39'),
(1871, '', NULL, 'Speed Skating', 1841, NULL, NULL, NULL, 'Professionals', 1, '2019-05-14 07:48:39', '2019-05-14 07:48:39'),
(1872, '', NULL, 'Diving', 1841, NULL, NULL, NULL, 'Professionals', 1, '2019-05-14 07:48:39', '2019-05-14 07:48:39'),
(1873, '', NULL, 'Touring Cars', 1841, NULL, NULL, NULL, 'Professionals', 1, '2019-05-14 07:48:39', '2019-05-14 07:48:39'),
(1874, '', NULL, 'Weightlifting', 1841, NULL, NULL, NULL, 'Professionals', 1, '2019-05-14 07:48:39', '2019-05-14 07:48:39'),
(1875, '', NULL, 'Rugby League', 1841, NULL, NULL, NULL, 'Professionals', 1, '2019-05-14 07:48:39', '2019-05-14 07:48:39'),
(1876, '', NULL, 'Judo', 1841, NULL, NULL, NULL, 'Professionals', 1, '2019-05-14 07:48:39', '2019-05-14 07:48:39'),
(1877, '', NULL, 'Indycar', 1841, NULL, NULL, NULL, 'Professionals', 1, '2019-05-14 07:48:39', '2019-05-14 07:48:39'),
(1878, '', NULL, 'Shooting', 1841, NULL, NULL, NULL, 'Professionals', 1, '2019-05-14 07:48:39', '2019-05-14 07:48:39'),
(1879, '', NULL, 'Biathlon', 1841, NULL, NULL, NULL, 'Professionals', 1, '2019-05-14 07:48:39', '2019-05-14 07:48:39'),
(1880, '', NULL, 'Cross-Country Skiing', 1841, NULL, NULL, NULL, 'Professionals', 1, '2019-05-14 07:48:39', '2019-05-14 07:48:39'),
(1881, '', NULL, 'Kickboxing/Muay Thai', 1841, NULL, NULL, NULL, 'Professionals', 1, '2019-05-14 07:48:39', '2019-05-14 07:48:39'),
(1882, '', NULL, 'Ski Jump', 1841, NULL, NULL, NULL, 'Professionals', 1, '2019-05-14 07:48:40', '2019-05-14 07:48:40'),
(1883, '', NULL, 'Australian Rules Football', 1841, NULL, NULL, NULL, 'Professionals', 1, '2019-05-14 07:48:40', '2019-05-14 07:48:40'),
(1884, '', NULL, 'Archery', 1841, NULL, NULL, NULL, 'Professionals', 1, '2019-05-14 07:48:40', '2019-05-14 07:48:40'),
(1885, '', NULL, 'Sailing', 1841, NULL, NULL, NULL, 'Professionals', 1, '2019-05-14 07:48:40', '2019-05-14 07:48:40'),
(1886, '', NULL, 'Equestrian', 1841, NULL, NULL, NULL, 'Professionals', 1, '2019-05-14 07:48:40', '2019-05-14 07:48:40'),
(1887, '', NULL, 'Taekwando', 1841, NULL, NULL, NULL, 'Professionals', 1, '2019-05-14 07:48:40', '2019-05-14 07:48:40'),
(1888, '', NULL, 'Sumo', 1841, NULL, NULL, NULL, 'Professionals', 1, '2019-05-14 07:48:40', '2019-05-14 07:48:40'),
(1889, '', NULL, 'Fencing', 1841, NULL, NULL, NULL, 'Professionals', 1, '2019-05-14 07:48:40', '2019-05-14 07:48:40'),
(1890, '', NULL, 'Wushu (Kung fu)', 1841, NULL, NULL, NULL, 'Professionals', 1, '2019-05-14 07:48:40', '2019-05-14 07:48:40'),
(1891, '', NULL, 'Beach Volleyball', 1841, NULL, NULL, NULL, 'Professionals', 1, '2019-05-14 07:48:40', '2019-05-14 07:48:40'),
(1892, '', NULL, 'Sales & Marketer', NULL, NULL, NULL, NULL, 'Professionals', 1, '2019-05-14 07:48:40', '2019-05-14 07:48:40'),
(1893, '', NULL, 'Cause Marketing', 1892, NULL, NULL, NULL, 'Professionals', 1, '2019-05-14 07:48:40', '2019-05-14 07:48:40'),
(1894, '', NULL, 'Close Range Marketing (CRM)', 1892, NULL, NULL, NULL, 'Professionals', 1, '2019-05-14 07:48:40', '2019-05-14 07:48:40'),
(1895, '', NULL, 'Relationship Marketing', 1892, NULL, NULL, NULL, 'Professionals', 1, '2019-05-14 07:48:40', '2019-05-14 07:48:40'),
(1896, '', NULL, 'Transactional Marketing', 1892, NULL, NULL, NULL, 'Professionals', 1, '2019-05-14 07:48:40', '2019-05-14 07:48:40'),
(1897, '', NULL, 'Scarcity Marketing', 1892, NULL, NULL, NULL, 'Professionals', 1, '2019-05-14 07:48:40', '2019-05-14 07:48:40'),
(1898, '', NULL, 'Word of Mouth Marketing', 1892, NULL, NULL, NULL, 'Professionals', 1, '2019-05-14 07:48:40', '2019-05-14 07:48:40'),
(1899, '', NULL, 'Call to Action (CTA) Marketing', 1892, NULL, NULL, NULL, 'Professionals', 1, '2019-05-14 07:48:40', '2019-05-14 07:48:40'),
(1900, '', NULL, 'Viral Marketing', 1892, NULL, NULL, NULL, 'Professionals', 1, '2019-05-14 07:48:40', '2019-05-14 07:48:40'),
(1901, '', NULL, 'Diversity Marketing', 1892, NULL, NULL, NULL, 'Professionals', 1, '2019-05-14 07:48:40', '2019-05-14 07:48:40'),
(1902, '', NULL, 'Undercover Marketing', 1892, NULL, NULL, NULL, 'Professionals', 1, '2019-05-14 07:48:40', '2019-05-14 07:48:40'),
(1903, '', NULL, 'Mass Marketing', 1892, NULL, NULL, NULL, 'Professionals', 1, '2019-05-14 07:48:40', '2019-05-14 07:48:40'),
(1904, '', NULL, 'Seasonal Marketing', 1892, NULL, NULL, NULL, 'Professionals', 1, '2019-05-14 07:48:40', '2019-05-14 07:48:40'),
(1905, '', NULL, 'Online Marketing', 1892, NULL, NULL, NULL, 'Professionals', 1, '2019-05-14 07:48:40', '2019-05-14 07:48:40'),
(1906, '', NULL, 'Email Marketing', 1892, NULL, NULL, NULL, 'Professionals', 1, '2019-05-14 07:48:40', '2019-05-14 07:48:40'),
(1907, '', NULL, 'Event Marketing', 1892, NULL, NULL, NULL, 'Professionals', 1, '2019-05-14 07:48:40', '2019-05-14 07:48:40'),
(1908, '', NULL, 'Outbound Marketing', 1892, NULL, NULL, NULL, 'Professionals', 1, '2019-05-14 07:48:40', '2019-05-14 07:48:40'),
(1909, '', NULL, 'Direct Marketing', 1892, NULL, NULL, NULL, 'Professionals', 1, '2019-05-14 07:48:40', '2019-05-14 07:48:40'),
(1910, '', NULL, 'Content Marketing', 1892, NULL, NULL, NULL, 'Professionals', 1, '2019-05-14 07:48:40', '2019-05-14 07:48:40'),
(1911, '', NULL, 'B2B Marketing', 1892, NULL, NULL, NULL, 'Professionals', 1, '2019-05-14 07:48:40', '2019-05-14 07:48:40'),
(1912, '', NULL, 'Social Media Marketing', 1892, NULL, NULL, NULL, 'Professionals', 1, '2019-05-14 07:48:40', '2019-05-14 07:48:40'),
(1913, '', NULL, 'Promotional Marketing', 1892, NULL, NULL, NULL, 'Professionals', 1, '2019-05-14 07:48:40', '2019-05-14 07:48:40'),
(1914, '', NULL, 'B2C Marketing', 1892, NULL, NULL, NULL, 'Professionals', 1, '2019-05-14 07:48:40', '2019-05-14 07:48:40'),
(1915, '', NULL, 'Telemarketing', 1892, NULL, NULL, NULL, 'Professionals', 1, '2019-05-14 07:48:40', '2019-05-14 07:48:40'),
(1916, '', NULL, 'Motivational Speaker', 45, NULL, NULL, NULL, 'Professionals', 1, '2019-05-14 07:48:40', '2019-05-14 07:48:40'),
(1917, '', NULL, 'Public Speaker', 45, NULL, NULL, NULL, 'Professionals', 1, '2019-05-14 07:48:40', '2019-05-14 07:48:40'),
(1918, '', NULL, 'Pant Coat', 34, NULL, NULL, NULL, 'Professionals', 1, '2019-05-14 07:48:40', '2019-05-14 07:48:40'),
(1919, '', NULL, 'Women wear', 34, NULL, NULL, NULL, 'Professionals', 1, '2019-05-14 07:48:40', '2019-05-14 07:48:40'),
(1920, '', NULL, 'Men Wear', 34, NULL, NULL, NULL, 'Professionals', 1, '2019-05-14 07:48:40', '2019-05-14 07:48:40'),
(1921, '', NULL, 'Bridle Wear', 34, NULL, NULL, NULL, 'Professionals', 1, '2019-05-14 07:48:40', '2019-05-14 07:48:40'),
(1922, '', NULL, 'Writer/Translator', NULL, NULL, NULL, NULL, 'Professionals', 1, '2019-05-14 07:48:40', '2019-05-14 07:48:40'),
(1923, '', NULL, 'Academic Writing & Research', 1922, NULL, NULL, NULL, 'Professionals', 1, '2019-05-14 07:48:40', '2019-05-14 07:48:40'),
(1924, '', NULL, 'Article & Blog Writing', 1922, NULL, NULL, NULL, 'Professionals', 1, '2019-05-14 07:48:40', '2019-05-14 07:48:40'),
(1925, '', NULL, 'Copywriting', 1922, NULL, NULL, NULL, 'Professionals', 1, '2019-05-14 07:48:40', '2019-05-14 07:48:40'),
(1926, '', NULL, 'Creative Writing', 1922, NULL, NULL, NULL, 'Professionals', 1, '2019-05-14 07:48:40', '2019-05-14 07:48:40'),
(1927, '', NULL, 'Editing & Proofreading', 1922, NULL, NULL, NULL, 'Professionals', 1, '2019-05-14 07:48:40', '2019-05-14 07:48:40'),
(1928, '', NULL, 'Grant Writing', 1922, NULL, NULL, NULL, 'Professionals', 1, '2019-05-14 07:48:40', '2019-05-14 07:48:40'),
(1929, '', NULL, 'Resumes & Cover Letters', 1922, NULL, NULL, NULL, 'Professionals', 1, '2019-05-14 07:48:40', '2019-05-14 07:48:40'),
(1930, '', NULL, 'Technical Writing', 1922, NULL, NULL, NULL, 'Professionals', 1, '2019-05-14 07:48:40', '2019-05-14 07:48:40'),
(1931, '', NULL, 'Web Content', 1922, NULL, NULL, NULL, 'Professionals', 1, '2019-05-14 07:48:40', '2019-05-14 07:48:40'),
(1932, '', NULL, 'General Translation', 1922, NULL, NULL, NULL, 'Professionals', 1, '2019-05-14 07:48:40', '2019-05-14 07:48:40'),
(1933, '', NULL, 'Legal Translation', 1922, NULL, NULL, NULL, 'Professionals', 1, '2019-05-14 07:48:40', '2019-05-14 07:48:40'),
(1934, '', NULL, 'Medical Translation', 1922, NULL, NULL, NULL, 'Professionals', 1, '2019-05-14 07:48:40', '2019-05-14 07:48:40'),
(1935, '', NULL, 'Technical Translation', 1922, NULL, NULL, NULL, 'Professionals', 1, '2019-05-14 07:48:40', '2019-05-14 07:48:40'),
(1936, '', NULL, 'Speech Writer', 1922, NULL, NULL, NULL, 'Professionals', 1, '2019-05-14 07:48:40', '2019-05-14 07:48:40'),
(1937, '', NULL, 'Product Reviewer', 1922, NULL, NULL, NULL, 'Professionals', 1, '2019-05-14 07:48:40', '2019-05-14 07:48:40'),
(1938, '', NULL, 'Manufacturer', NULL, NULL, NULL, NULL, 'Professionals', 1, '2019-05-14 07:48:40', '2019-05-14 07:48:40'),
(1939, '', NULL, 'Food Manufacturing', 1938, NULL, NULL, NULL, 'Professionals', 1, '2019-05-14 07:48:40', '2019-05-14 07:48:40'),
(1940, '', NULL, 'Beverage and Tobacco Product Manufacturing', 1938, NULL, NULL, NULL, 'Professionals', 1, '2019-05-14 07:48:40', '2019-05-14 07:48:40'),
(1941, '', NULL, 'Textile Mills', 1938, NULL, NULL, NULL, 'Professionals', 1, '2019-05-14 07:48:40', '2019-05-14 07:48:40'),
(1942, '', NULL, 'Textile Product Mills', 1938, NULL, NULL, NULL, 'Professionals', 1, '2019-05-14 07:48:40', '2019-05-14 07:48:40'),
(1943, '', NULL, 'Apparel Manufacturing', 1938, NULL, NULL, NULL, 'Professionals', 1, '2019-05-14 07:48:40', '2019-05-14 07:48:40'),
(1944, '', NULL, 'Leather and Allied Product Manufacturing', 1938, NULL, NULL, NULL, 'Professionals', 1, '2019-05-14 07:48:40', '2019-05-14 07:48:40'),
(1945, '', NULL, 'Wood Product Manufacturing', 1938, NULL, NULL, NULL, 'Professionals', 1, '2019-05-14 07:48:40', '2019-05-14 07:48:40'),
(1946, '', NULL, 'Paper Manufacturing', 1938, NULL, NULL, NULL, 'Professionals', 1, '2019-05-14 07:48:40', '2019-05-14 07:48:40'),
(1947, '', NULL, 'Printing and Related Support Activities', 1938, NULL, NULL, NULL, 'Professionals', 1, '2019-05-14 07:48:40', '2019-05-14 07:48:40'),
(1948, '', NULL, 'Petroleum and Coal Products Manufacturing', 1938, NULL, NULL, NULL, 'Professionals', 1, '2019-05-14 07:48:40', '2019-05-14 07:48:40'),
(1949, '', NULL, 'Chemical Manufacturing', 1938, NULL, NULL, NULL, 'Professionals', 1, '2019-05-14 07:48:40', '2019-05-14 07:48:40'),
(1950, '', NULL, 'Plastics and Rubber Products Manufacturing', 1938, NULL, NULL, NULL, 'Professionals', 1, '2019-05-14 07:48:40', '2019-05-14 07:48:40'),
(1951, '', NULL, 'Nonmetallic Mineral Product Manufacturing', 1938, NULL, NULL, NULL, 'Professionals', 1, '2019-05-14 07:48:40', '2019-05-14 07:48:40'),
(1952, '', NULL, 'Primary Metal Manufacturing', 1938, NULL, NULL, NULL, 'Professionals', 1, '2019-05-14 07:48:40', '2019-05-14 07:48:40'),
(1953, '', NULL, 'Fabricated Metal Product Manufacturing', 1938, NULL, NULL, NULL, 'Professionals', 1, '2019-05-14 07:48:40', '2019-05-14 07:48:40'),
(1954, '', NULL, 'Machinery Manufacturing', 1938, NULL, NULL, NULL, 'Professionals', 1, '2019-05-14 07:48:40', '2019-05-14 07:48:40'),
(1955, '', NULL, 'Computer and Electronic Product Manufacturing', 1938, NULL, NULL, NULL, 'Professionals', 1, '2019-05-14 07:48:40', '2019-05-14 07:48:40'),
(1956, '', NULL, 'Electrical Equipment, Appliance, and Component Manufacturing', 1938, NULL, NULL, NULL, 'Professionals', 1, '2019-05-14 07:48:40', '2019-05-14 07:48:40'),
(1957, '', NULL, 'Transportation Equipment Manufacturing', 1938, NULL, NULL, NULL, 'Professionals', 1, '2019-05-14 07:48:40', '2019-05-14 07:48:40'),
(1958, '', NULL, 'Furniture and Related Product Manufacturing', 1938, NULL, NULL, NULL, 'Professionals', 1, '2019-05-14 07:48:40', '2019-05-14 07:48:40'),
(1959, '', NULL, 'Miscellaneous Manufacturing', 1938, NULL, NULL, NULL, 'Professionals', 1, '2019-05-14 07:48:40', '2019-05-14 07:48:40'),
(1960, '', NULL, 'Electrical Equipment, Appliance, and Component ManufacturingAC29:AD31', 1938, NULL, NULL, NULL, 'Professionals', 1, '2019-05-14 07:48:40', '2019-05-14 07:48:40'),
(1961, '', NULL, 'Wholesaler', NULL, NULL, NULL, NULL, 'Professionals', 1, '2019-05-14 07:48:40', '2019-05-14 07:48:40'),
(1962, '', NULL, 'Food Manufacturing', 1961, NULL, NULL, NULL, 'Professionals', 1, '2019-05-14 07:48:40', '2019-05-14 07:48:40'),
(1963, '', NULL, 'Beverage and Tobacco Product Manufacturing', 1961, NULL, NULL, NULL, 'Professionals', 1, '2019-05-14 07:48:40', '2019-05-14 07:48:40'),
(1964, '', NULL, 'Textile Mills', 1961, NULL, NULL, NULL, 'Professionals', 1, '2019-05-14 07:48:40', '2019-05-14 07:48:40'),
(1965, '', NULL, 'Textile Product Mills', 1961, NULL, NULL, NULL, 'Professionals', 1, '2019-05-14 07:48:40', '2019-05-14 07:48:40'),
(1966, '', NULL, 'Apparel Manufacturing', 1961, NULL, NULL, NULL, 'Professionals', 1, '2019-05-14 07:48:40', '2019-05-14 07:48:40'),
(1967, '', NULL, 'Leather and Allied Product Manufacturing', 1961, NULL, NULL, NULL, 'Professionals', 1, '2019-05-14 07:48:40', '2019-05-14 07:48:40'),
(1968, '', NULL, 'Wood Product Manufacturing', 1961, NULL, NULL, NULL, 'Professionals', 1, '2019-05-14 07:48:40', '2019-05-14 07:48:40'),
(1969, '', NULL, 'Paper Manufacturing', 1961, NULL, NULL, NULL, 'Professionals', 1, '2019-05-14 07:48:40', '2019-05-14 07:48:40'),
(1970, '', NULL, 'Printing and Related Support Activities', 1961, NULL, NULL, NULL, 'Professionals', 1, '2019-05-14 07:48:40', '2019-05-14 07:48:40'),
(1971, '', NULL, 'Petroleum and Coal Products Manufacturing', 1961, NULL, NULL, NULL, 'Professionals', 1, '2019-05-14 07:48:40', '2019-05-14 07:48:40'),
(1972, '', NULL, 'Chemical Manufacturing', 1961, NULL, NULL, NULL, 'Professionals', 1, '2019-05-14 07:48:40', '2019-05-14 07:48:40'),
(1973, '', NULL, 'Plastics and Rubber Products Manufacturing', 1961, NULL, NULL, NULL, 'Professionals', 1, '2019-05-14 07:48:40', '2019-05-14 07:48:40'),
(1974, '', NULL, 'Nonmetallic Mineral Product Manufacturing', 1961, NULL, NULL, NULL, 'Professionals', 1, '2019-05-14 07:48:40', '2019-05-14 07:48:40'),
(1975, '', NULL, 'Primary Metal Manufacturing', 1961, NULL, NULL, NULL, 'Professionals', 1, '2019-05-14 07:48:40', '2019-05-14 07:48:40'),
(1976, '', NULL, 'Fabricated Metal Product Manufacturing', 1961, NULL, NULL, NULL, 'Professionals', 1, '2019-05-14 07:48:40', '2019-05-14 07:48:40'),
(1977, '', NULL, 'Machinery Manufacturing', 1961, NULL, NULL, NULL, 'Professionals', 1, '2019-05-14 07:48:40', '2019-05-14 07:48:40'),
(1978, '', NULL, 'Computer and Electronic Product Manufacturing', 1961, NULL, NULL, NULL, 'Professionals', 1, '2019-05-14 07:48:41', '2019-05-14 07:48:41'),
(1979, '', NULL, 'Electrical Equipment, Appliance, and Component Manufacturing', 1961, NULL, NULL, NULL, 'Professionals', 1, '2019-05-14 07:48:41', '2019-05-14 07:48:41'),
(1980, '', NULL, 'Transportation Equipment Manufacturing', 1961, NULL, NULL, NULL, 'Professionals', 1, '2019-05-14 07:48:41', '2019-05-14 07:48:41'),
(1981, '', NULL, 'Furniture and Related Product Manufacturing', 1961, NULL, NULL, NULL, 'Professionals', 1, '2019-05-14 07:48:41', '2019-05-14 07:48:41'),
(1982, '', NULL, 'Miscellaneous Manufacturing', 1961, NULL, NULL, NULL, 'Professionals', 1, '2019-05-14 07:48:41', '2019-05-14 07:48:41'),
(1983, '', NULL, 'Retailer', NULL, NULL, NULL, NULL, 'Professionals', 1, '2019-05-14 07:48:41', '2019-05-14 07:48:41'),
(1984, '', NULL, 'Food Manufacturing', 1983, NULL, NULL, NULL, 'Professionals', 1, '2019-05-14 07:48:41', '2019-05-14 07:48:41'),
(1985, '', NULL, 'Beverage and Tobacco Product Manufacturing', 1983, NULL, NULL, NULL, 'Professionals', 1, '2019-05-14 07:48:41', '2019-05-14 07:48:41'),
(1986, '', NULL, 'Textile Mills', 1983, NULL, NULL, NULL, 'Professionals', 1, '2019-05-14 07:48:41', '2019-05-14 07:48:41'),
(1987, '', NULL, 'Textile Product Mills', 1983, NULL, NULL, NULL, 'Professionals', 1, '2019-05-14 07:48:41', '2019-05-14 07:48:41'),
(1988, '', NULL, 'Apparel Manufacturing', 1983, NULL, NULL, NULL, 'Professionals', 1, '2019-05-14 07:48:41', '2019-05-14 07:48:41'),
(1989, '', NULL, 'Leather and Allied Product Manufacturing', 1983, NULL, NULL, NULL, 'Professionals', 1, '2019-05-14 07:48:41', '2019-05-14 07:48:41'),
(1990, '', NULL, 'Wood Product Manufacturing', 1983, NULL, NULL, NULL, 'Professionals', 1, '2019-05-14 07:48:41', '2019-05-14 07:48:41'),
(1991, '', NULL, 'Paper Manufacturing', 1983, NULL, NULL, NULL, 'Professionals', 1, '2019-05-14 07:48:41', '2019-05-14 07:48:41'),
(1992, '', NULL, 'Printing and Related Support Activities', 1983, NULL, NULL, NULL, 'Professionals', 1, '2019-05-14 07:48:41', '2019-05-14 07:48:41'),
(1993, '', NULL, 'Petroleum and Coal Products Manufacturing', 1983, NULL, NULL, NULL, 'Professionals', 1, '2019-05-14 07:48:41', '2019-05-14 07:48:41'),
(1994, '', NULL, 'Chemical Manufacturing', 1983, NULL, NULL, NULL, 'Professionals', 1, '2019-05-14 07:48:41', '2019-05-14 07:48:41'),
(1995, '', NULL, 'Plastics and Rubber Products Manufacturing', 1983, NULL, NULL, NULL, 'Professionals', 1, '2019-05-14 07:48:41', '2019-05-14 07:48:41'),
(1996, '', NULL, 'Nonmetallic Mineral Product Manufacturing', 1983, NULL, NULL, NULL, 'Professionals', 1, '2019-05-14 07:48:41', '2019-05-14 07:48:41'),
(1997, '', NULL, 'Primary Metal Manufacturing', 1983, NULL, NULL, NULL, 'Professionals', 1, '2019-05-14 07:48:41', '2019-05-14 07:48:41'),
(1998, '', NULL, 'Fabricated Metal Product Manufacturing', 1983, NULL, NULL, NULL, 'Professionals', 1, '2019-05-14 07:48:41', '2019-05-14 07:48:41'),
(1999, '', NULL, 'Machinery Manufacturing', 1983, NULL, NULL, NULL, 'Professionals', 1, '2019-05-14 07:48:41', '2019-05-14 07:48:41'),
(2000, '', NULL, 'Computer and Electronic Product Manufacturing', 1983, NULL, NULL, NULL, 'Professionals', 1, '2019-05-14 07:48:41', '2019-05-14 07:48:41'),
(2001, '', NULL, 'Electrical Equipment, Appliance, and Component Manufacturing', 1983, NULL, NULL, NULL, 'Professionals', 1, '2019-05-14 07:48:41', '2019-05-14 07:48:41'),
(2002, '', NULL, 'Transportation Equipment Manufacturing', 1983, NULL, NULL, NULL, 'Professionals', 1, '2019-05-14 07:48:41', '2019-05-14 07:48:41'),
(2003, '', NULL, 'Furniture and Related Product Manufacturing', 1983, NULL, NULL, NULL, 'Professionals', 1, '2019-05-14 07:48:41', '2019-05-14 07:48:41'),
(2004, '', NULL, 'Miscellaneous Manufacturing', 1983, NULL, NULL, NULL, 'Professionals', 1, '2019-05-14 07:48:41', '2019-05-14 07:48:41'),
(2005, '', NULL, 'Instructor', NULL, NULL, NULL, NULL, 'Professionals', 1, '2019-05-14 07:48:41', '2019-05-14 07:48:41'),
(2006, '', NULL, 'Yoga Instructor', 2005, NULL, NULL, NULL, 'Professionals', 1, '2019-05-14 07:48:41', '2019-05-14 07:48:41'),
(2007, '', NULL, 'Cooking Class Instructor', 2005, NULL, NULL, NULL, 'Professionals', 1, '2019-05-14 07:48:41', '2019-05-14 07:48:41'),
(2008, '', NULL, 'Computer Instructor', 2005, NULL, NULL, NULL, 'Professionals', 1, '2019-05-14 07:48:41', '2019-05-14 07:48:41'),
(2009, '', NULL, 'Fitness Instructor', 2005, NULL, NULL, NULL, 'Professionals', 1, '2019-05-14 07:48:41', '2019-05-14 07:48:41'),
(2010, '', NULL, 'Acadmic Instructor', 2005, NULL, NULL, NULL, 'Professionals', 1, '2019-05-14 07:48:41', '2019-05-14 07:48:41'),
(2011, '', NULL, 'Music Instructor', 2005, NULL, NULL, NULL, 'Professionals', 1, '2019-05-14 07:48:41', '2019-05-14 07:48:41'),
(2012, '', NULL, 'Dance Instructor', 2005, NULL, NULL, NULL, 'Professionals', 1, '2019-05-14 07:48:41', '2019-05-14 07:48:41'),
(2013, '', NULL, 'Property Dealer', NULL, NULL, NULL, NULL, 'Professionals', 1, '2019-05-14 07:48:41', '2019-05-14 07:48:41'),
(2014, '', NULL, 'Repirest', NULL, NULL, NULL, NULL, 'Professionals', 1, '2019-05-14 07:48:41', '2019-05-14 07:48:41'),
(2015, '', NULL, 'Appliance Repair', 2014, NULL, NULL, NULL, 'Professionals', 1, '2019-05-14 07:48:41', '2019-05-14 07:48:41'),
(2016, '', NULL, 'Appliance Repair Technician', 2014, NULL, NULL, NULL, 'Professionals', 1, '2019-05-14 07:48:41', '2019-05-14 07:48:41'),
(2017, '', NULL, 'Bicycle Repair', 2014, NULL, NULL, NULL, 'Professionals', 1, '2019-05-14 07:48:41', '2019-05-14 07:48:41'),
(2018, '', NULL, 'Computer Repair and Maintenance', 2014, NULL, NULL, NULL, 'Professionals', 1, '2019-05-14 07:48:41', '2019-05-14 07:48:41'),
(2019, '', NULL, 'Jewelry/Clock/Watch Repair', 2014, NULL, NULL, NULL, 'Professionals', 1, '2019-05-14 07:48:41', '2019-05-14 07:48:41'),
(2020, '', NULL, 'Mobile Car Inspection/Repair', 2014, NULL, NULL, NULL, 'Professionals', 1, '2019-05-14 07:48:41', '2019-05-14 07:48:41'),
(2021, '', NULL, 'Porcelain Repair', 2014, NULL, NULL, NULL, 'Professionals', 1, '2019-05-14 07:48:41', '2019-05-14 07:48:41'),
(2022, '', NULL, 'Smartphone Repair', 2014, NULL, NULL, NULL, 'Professionals', 1, '2019-05-14 07:48:41', '2019-05-14 07:48:41'),
(2023, '', NULL, 'Television Repair', 2014, NULL, NULL, NULL, 'Professionals', 1, '2019-05-14 07:48:41', '2019-05-14 07:48:41'),
(2024, '', NULL, 'Service Provider', NULL, NULL, NULL, NULL, 'Professionals', 1, '2019-05-14 07:48:41', '2019-05-14 07:48:41'),
(2025, '', NULL, 'Accounting, Auditing and Tax Services', 2024, NULL, NULL, NULL, 'Professionals', 1, '2019-05-14 07:48:41', '2019-05-14 07:48:41'),
(2026, '', NULL, 'Advertising Services', 2024, NULL, NULL, NULL, 'Professionals', 1, '2019-05-14 07:48:41', '2019-05-14 07:48:41'),
(2027, '', NULL, 'Air Charter Service', 2024, NULL, NULL, NULL, 'Professionals', 1, '2019-05-14 07:48:41', '2019-05-14 07:48:41'),
(2028, '', NULL, 'Apartment Preparation Service', 2024, NULL, NULL, NULL, 'Professionals', 1, '2019-05-14 07:48:41', '2019-05-14 07:48:41'),
(2029, '', NULL, 'Arbitration Service', 2024, NULL, NULL, NULL, 'Professionals', 1, '2019-05-14 07:48:41', '2019-05-14 07:48:41'),
(2030, '', NULL, 'Art Restoration Services', 2024, NULL, NULL, NULL, 'Professionals', 1, '2019-05-14 07:48:41', '2019-05-14 07:48:41'),
(2031, '', NULL, 'Association Management Service', 2024, NULL, NULL, NULL, 'Professionals', 1, '2019-05-14 07:48:41', '2019-05-14 07:48:41'),
(2032, '', NULL, 'Baby Proofing Service', 2024, NULL, NULL, NULL, 'Professionals', 1, '2019-05-14 07:48:41', '2019-05-14 07:48:41'),
(2033, '', NULL, 'Baby-Sitting Service', 2024, NULL, NULL, NULL, 'Professionals', 1, '2019-05-14 07:48:41', '2019-05-14 07:48:41'),
(2034, '', NULL, 'Balloon Delivery Service', 2024, NULL, NULL, NULL, 'Professionals', 1, '2019-05-14 07:48:41', '2019-05-14 07:48:41'),
(2035, '', NULL, 'Banking and Financial Services', 2024, NULL, NULL, NULL, 'Professionals', 1, '2019-05-14 07:48:41', '2019-05-14 07:48:41'),
(2036, '', NULL, 'Banking Services', 2024, NULL, NULL, NULL, 'Professionals', 1, '2019-05-14 07:48:41', '2019-05-14 07:48:41'),
(2037, '', NULL, 'Bartending Service', 2024, NULL, NULL, NULL, 'Professionals', 1, '2019-05-14 07:48:41', '2019-05-14 07:48:41'),
(2038, '', NULL, 'Boat Maintenance/Cleaning Service', 2024, NULL, NULL, NULL, 'Professionals', 1, '2019-05-14 07:48:41', '2019-05-14 07:48:41'),
(2039, '', NULL, 'Building and Construction Services', 2024, NULL, NULL, NULL, 'Professionals', 1, '2019-05-14 07:48:41', '2019-05-14 07:48:41'),
(2040, '', NULL, 'Building Maintenance Service', 2024, NULL, NULL, NULL, 'Professionals', 1, '2019-05-14 07:48:41', '2019-05-14 07:48:41'),
(2041, '', NULL, 'Bulletin Board Service', 2024, NULL, NULL, NULL, 'Professionals', 1, '2019-05-14 07:48:41', '2019-05-14 07:48:41'),
(2042, '', NULL, 'Business Administration Services', 2024, NULL, NULL, NULL, 'Professionals', 1, '2019-05-14 07:48:41', '2019-05-14 07:48:41'),
(2043, '', NULL, 'Car Services and Rentals', 2024, NULL, NULL, NULL, 'Professionals', 1, '2019-05-14 07:48:41', '2019-05-14 07:48:41'),
(2044, '', NULL, 'Car Washing or Detailing Service', 2024, NULL, NULL, NULL, 'Professionals', 1, '2019-05-14 07:48:41', '2019-05-14 07:48:41'),
(2045, '', NULL, 'Carpet Installation Service', 2024, NULL, NULL, NULL, 'Professionals', 1, '2019-05-14 07:48:41', '2019-05-14 07:48:41'),
(2046, '', NULL, 'Categories for Business Service Providers', 2024, NULL, NULL, NULL, 'Professionals', 1, '2019-05-14 07:48:41', '2019-05-14 07:48:41'),
(2047, '', NULL, 'Catering Service', 2024, NULL, NULL, NULL, 'Professionals', 1, '2019-05-14 07:48:41', '2019-05-14 07:48:41'),
(2048, '', NULL, 'Child Care Service', 2024, NULL, NULL, NULL, 'Professionals', 1, '2019-05-14 07:48:41', '2019-05-14 07:48:41'),
(2049, '', NULL, 'Children’s Entertainment Services', 2024, NULL, NULL, NULL, 'Professionals', 1, '2019-05-14 07:48:41', '2019-05-14 07:48:41'),
(2050, '', NULL, 'Cloth Diaper Service', 2024, NULL, NULL, NULL, 'Professionals', 1, '2019-05-14 07:48:41', '2019-05-14 07:48:41'),
(2051, '', NULL, 'Clothing Alterations Service', 2024, NULL, NULL, NULL, 'Professionals', 1, '2019-05-14 07:48:41', '2019-05-14 07:48:41'),
(2052, '', NULL, 'Clown Service', 2024, NULL, NULL, NULL, 'Professionals', 1, '2019-05-14 07:48:41', '2019-05-14 07:48:41'),
(2053, '', NULL, 'Commercial Plant-Watering Service', 2024, NULL, NULL, NULL, 'Professionals', 1, '2019-05-14 07:48:41', '2019-05-14 07:48:41'),
(2054, '', NULL, 'Computer and Internet Services', 2024, NULL, NULL, NULL, 'Professionals', 1, '2019-05-14 07:48:41', '2019-05-14 07:48:41'),
(2055, '', NULL, 'Computer Repair Service', 2024, NULL, NULL, NULL, 'Professionals', 1, '2019-05-14 07:48:41', '2019-05-14 07:48:41'),
(2056, '', NULL, 'Construction Service', 2024, NULL, NULL, NULL, 'Professionals', 1, '2019-05-14 07:48:41', '2019-05-14 07:48:41'),
(2057, '', NULL, 'Contract Drafting & Review Service', 2024, NULL, NULL, NULL, 'Professionals', 1, '2019-05-14 07:48:41', '2019-05-14 07:48:41'),
(2058, '', NULL, 'Customer Service Phone Operator', 2024, NULL, NULL, NULL, 'Professionals', 1, '2019-05-14 07:48:41', '2019-05-14 07:48:41'),
(2059, '', NULL, 'Customer Service Professional', 2024, NULL, NULL, NULL, 'Professionals', 1, '2019-05-14 07:48:41', '2019-05-14 07:48:41'),
(2060, '', NULL, 'Damage Restoration Service', 2024, NULL, NULL, NULL, 'Professionals', 1, '2019-05-14 07:48:41', '2019-05-14 07:48:41'),
(2061, '', NULL, 'Data Entry Service', 2024, NULL, NULL, NULL, 'Professionals', 1, '2019-05-14 07:48:41', '2019-05-14 07:48:41'),
(2062, '', NULL, 'Day Care Service', 2024, NULL, NULL, NULL, 'Professionals', 1, '2019-05-14 07:48:41', '2019-05-14 07:48:41'),
(2063, '', NULL, 'Dining Services', 2024, NULL, NULL, NULL, 'Professionals', 1, '2019-05-14 07:48:41', '2019-05-14 07:48:41'),
(2064, '', NULL, 'Disaster Planning and Prevention Service', 2024, NULL, NULL, NULL, 'Professionals', 1, '2019-05-14 07:48:41', '2019-05-14 07:48:41'),
(2065, '', NULL, 'Dog Walking Service', 2024, NULL, NULL, NULL, 'Professionals', 1, '2019-05-14 07:48:41', '2019-05-14 07:48:41'),
(2066, '', NULL, 'Doula & Birth Coaching Services', 2024, NULL, NULL, NULL, 'Professionals', 1, '2019-05-14 07:48:41', '2019-05-14 07:48:41'),
(2067, '', NULL, 'Editing & Proofreading Service', 2024, NULL, NULL, NULL, 'Professionals', 1, '2019-05-14 07:48:41', '2019-05-14 07:48:41'),
(2068, '', NULL, 'Editing Service', 2024, NULL, NULL, NULL, 'Professionals', 1, '2019-05-14 07:48:41', '2019-05-14 07:48:41'),
(2069, '', NULL, 'Education and Training Services', 2024, NULL, NULL, NULL, 'Professionals', 1, '2019-05-14 07:48:41', '2019-05-14 07:48:41'),
(2070, '', NULL, 'Engineering Services', 2024, NULL, NULL, NULL, 'Professionals', 1, '2019-05-14 07:48:41', '2019-05-14 07:48:41'),
(2071, '', NULL, 'Entertainment Services', 2024, NULL, NULL, NULL, 'Professionals', 1, '2019-05-14 07:48:41', '2019-05-14 07:48:41'),
(2072, '', NULL, 'Environmental Services', 2024, NULL, NULL, NULL, 'Professionals', 1, '2019-05-14 07:48:41', '2019-05-14 07:48:41'),
(2073, '', NULL, 'Errand Service', 2024, NULL, NULL, NULL, 'Professionals', 1, '2019-05-14 07:48:41', '2019-05-14 07:48:41'),
(2074, '', NULL, 'Event Catering Services', 2024, NULL, NULL, NULL, 'Professionals', 1, '2019-05-14 07:48:41', '2019-05-14 07:48:41'),
(2075, '', NULL, 'Family History Writer (Genealogical Service)', 2024, NULL, NULL, NULL, 'Professionals', 1, '2019-05-14 07:48:41', '2019-05-14 07:48:41'),
(2076, '', NULL, 'Fence Installation Service', 2024, NULL, NULL, NULL, 'Professionals', 1, '2019-05-14 07:48:41', '2019-05-14 07:48:41'),
(2077, '', NULL, 'Firewood Service', 2024, NULL, NULL, NULL, 'Professionals', 1, '2019-05-14 07:48:41', '2019-05-14 07:48:41'),
(2078, '', NULL, 'Food Delivery Service', 2024, NULL, NULL, NULL, 'Professionals', 1, '2019-05-14 07:48:41', '2019-05-14 07:48:41'),
(2079, '', NULL, 'Formal Wear Rental Service', 2024, NULL, NULL, NULL, 'Professionals', 1, '2019-05-14 07:48:41', '2019-05-14 07:48:41'),
(2080, '', NULL, 'Framing Service', 2024, NULL, NULL, NULL, 'Professionals', 1, '2019-05-14 07:48:41', '2019-05-14 07:48:41'),
(2081, '', NULL, 'Handyman Service', 2024, NULL, NULL, NULL, 'Professionals', 1, '2019-05-14 07:48:41', '2019-05-14 07:48:41'),
(2082, '', NULL, 'Hauling Service', 2024, NULL, NULL, NULL, 'Professionals', 1, '2019-05-14 07:48:41', '2019-05-14 07:48:41'),
(2083, '', NULL, 'Home Cleaning Service', 2024, NULL, NULL, NULL, 'Professionals', 1, '2019-05-14 07:48:41', '2019-05-14 07:48:41'),
(2084, '', NULL, 'Home Entertainment System Service', 2024, NULL, NULL, NULL, 'Professionals', 1, '2019-05-14 07:48:41', '2019-05-14 07:48:41'),
(2085, '', NULL, 'Home Health Care Service', 2024, NULL, NULL, NULL, 'Professionals', 1, '2019-05-14 07:48:41', '2019-05-14 07:48:41'),
(2086, '', NULL, 'Home-Inspection Services', 2024, NULL, NULL, NULL, 'Professionals', 1, '2019-05-14 07:48:41', '2019-05-14 07:48:41'),
(2087, '', NULL, 'Horse/Cargo Trailer Service', 2024, NULL, NULL, NULL, 'Professionals', 1, '2019-05-14 07:48:41', '2019-05-14 07:48:41'),
(2088, '', NULL, 'Hospitals, Clinics and Health Services', 2024, NULL, NULL, NULL, 'Professionals', 1, '2019-05-14 07:48:41', '2019-05-14 07:48:41'),
(2089, '', NULL, 'Human Resources Service', 2024, NULL, NULL, NULL, 'Professionals', 1, '2019-05-14 07:48:41', '2019-05-14 07:48:41'),
(2090, '', NULL, 'Information & Technology Services', 2024, NULL, NULL, NULL, 'Professionals', 1, '2019-05-14 07:48:41', '2019-05-14 07:48:41'),
(2091, '', NULL, 'Insurance Services', 2024, NULL, NULL, NULL, 'Professionals', 1, '2019-05-14 07:48:41', '2019-05-14 07:48:41'),
(2092, '', NULL, 'Interior Painting Service', 2024, NULL, NULL, NULL, 'Professionals', 1, '2019-05-14 07:48:41', '2019-05-14 07:48:41'),
(2093, '', NULL, 'Investment Services', 2024, NULL, NULL, NULL, 'Professionals', 1, '2019-05-14 07:48:41', '2019-05-14 07:48:41'),
(2094, '', NULL, 'Irrigation Services', 2024, NULL, NULL, NULL, 'Professionals', 1, '2019-05-14 07:48:41', '2019-05-14 07:48:41'),
(2095, '', NULL, 'Laundry Service', 2024, NULL, NULL, NULL, 'Professionals', 1, '2019-05-14 07:48:41', '2019-05-14 07:48:41'),
(2096, '', NULL, 'Lawn Service', 2024, NULL, NULL, NULL, 'Professionals', 1, '2019-05-14 07:48:41', '2019-05-14 07:48:41'),
(2097, '', NULL, 'Legal Services', 2024, NULL, NULL, NULL, 'Professionals', 1, '2019-05-14 07:48:41', '2019-05-14 07:48:41'),
(2098, '', NULL, 'Live Chat Customer Support Service', 2024, NULL, NULL, NULL, 'Professionals', 1, '2019-05-14 07:48:41', '2019-05-14 07:48:41'),
(2099, '', NULL, 'Local Marketing Service', 2024, NULL, NULL, NULL, 'Professionals', 1, '2019-05-14 07:48:41', '2019-05-14 07:48:41'),
(2100, '', NULL, 'Locksmith Services', 2024, NULL, NULL, NULL, 'Professionals', 1, '2019-05-14 07:48:41', '2019-05-14 07:48:41'),
(2101, '', NULL, 'Mailbox Rental Service', 2024, NULL, NULL, NULL, 'Professionals', 1, '2019-05-14 07:48:41', '2019-05-14 07:48:41'),
(2102, '', NULL, 'Manufacturing and Industrial Production Services', 2024, NULL, NULL, NULL, 'Professionals', 1, '2019-05-14 07:48:41', '2019-05-14 07:48:41'),
(2103, '', NULL, 'Meal Delivery Service', 2024, NULL, NULL, NULL, 'Professionals', 1, '2019-05-14 07:48:41', '2019-05-14 07:48:41'),
(2104, '', NULL, 'Meal Preparation Service', 2024, NULL, NULL, NULL, 'Professionals', 1, '2019-05-14 07:48:41', '2019-05-14 07:48:41'),
(2105, '', NULL, 'Messenger Service', 2024, NULL, NULL, NULL, 'Professionals', 1, '2019-05-14 07:48:41', '2019-05-14 07:48:41'),
(2106, '', NULL, 'Mining and Oil and Gas Services', 2024, NULL, NULL, NULL, 'Professionals', 1, '2019-05-14 07:48:41', '2019-05-14 07:48:41'),
(2107, '', NULL, 'Mobile Billboard Service', 2024, NULL, NULL, NULL, 'Professionals', 1, '2019-05-14 07:48:41', '2019-05-14 07:48:41'),
(2108, '', NULL, 'Mobile IT Support Service', 2024, NULL, NULL, NULL, 'Professionals', 1, '2019-05-14 07:48:41', '2019-05-14 07:48:41'),
(2109, '', NULL, 'Mobile Veterinary Services', 2024, NULL, NULL, NULL, 'Professionals', 1, '2019-05-14 07:48:41', '2019-05-14 07:48:41'),
(2110, '', NULL, 'Moving Service', 2024, NULL, NULL, NULL, 'Professionals', 1, '2019-05-14 07:48:41', '2019-05-14 07:48:41'),
(2111, '', NULL, 'Nanny & Au Pair Placement Service', 2024, NULL, NULL, NULL, 'Professionals', 1, '2019-05-14 07:48:41', '2019-05-14 07:48:41'),
(2112, '', NULL, 'Nanny Service', 2024, NULL, NULL, NULL, 'Professionals', 1, '2019-05-14 07:48:41', '2019-05-14 07:48:41'),
(2113, '', NULL, 'Nursery Design Service', 2024, NULL, NULL, NULL, 'Professionals', 1, '2019-05-14 07:48:41', '2019-05-14 07:48:41'),
(2114, '', NULL, 'Office Support Services', 2024, NULL, NULL, NULL, 'Professionals', 1, '2019-05-14 07:48:41', '2019-05-14 07:48:41'),
(2115, '', NULL, 'Other Business Services', 2024, NULL, NULL, NULL, 'Professionals', 1, '2019-05-14 07:48:41', '2019-05-14 07:48:41'),
(2116, '', NULL, 'Outplacement Service', 2024, NULL, NULL, NULL, 'Professionals', 1, '2019-05-14 07:48:41', '2019-05-14 07:48:41'),
(2117, '', NULL, 'Overnight Doula Service', 2024, NULL, NULL, NULL, 'Professionals', 1, '2019-05-14 07:48:41', '2019-05-14 07:48:41'),
(2118, '', NULL, 'Paralegal Services', 2024, NULL, NULL, NULL, 'Professionals', 1, '2019-05-14 07:48:41', '2019-05-14 07:48:41'),
(2119, '', NULL, 'Patent and Trademark Law Services', 2024, NULL, NULL, NULL, 'Professionals', 1, '2019-05-14 07:48:41', '2019-05-14 07:48:41'),
(2120, '', NULL, 'Payroll Processing Service', 2024, NULL, NULL, NULL, 'Professionals', 1, '2019-05-14 07:48:41', '2019-05-14 07:48:41'),
(2121, '', NULL, 'Personal Shopping Service', 2024, NULL, NULL, NULL, 'Professionals', 1, '2019-05-14 07:48:41', '2019-05-14 07:48:41'),
(2122, '', NULL, 'Pest Control Service', 2024, NULL, NULL, NULL, 'Professionals', 1, '2019-05-14 07:48:41', '2019-05-14 07:48:41'),
(2123, '', NULL, 'Pet Taxi Service', 2024, NULL, NULL, NULL, 'Professionals', 1, '2019-05-14 07:48:41', '2019-05-14 07:48:41'),
(2124, '', NULL, 'Photo Booth Rental Service', 2024, NULL, NULL, NULL, 'Professionals', 1, '2019-05-14 07:48:41', '2019-05-14 07:48:41'),
(2125, '', NULL, 'Photo Restoration Service', 2024, NULL, NULL, NULL, 'Professionals', 1, '2019-05-14 07:48:41', '2019-05-14 07:48:41'),
(2126, '', NULL, 'Photographic Services', 2024, NULL, NULL, NULL, 'Professionals', 1, '2019-05-14 07:48:41', '2019-05-14 07:48:41'),
(2127, '', NULL, 'Plumbing Service', 2024, NULL, NULL, NULL, 'Professionals', 1, '2019-05-14 07:48:41', '2019-05-14 07:48:41'),
(2128, '', NULL, 'Power Wash Service', 2024, NULL, NULL, NULL, 'Professionals', 1, '2019-05-14 07:48:41', '2019-05-14 07:48:41'),
(2129, '', NULL, 'Power Washing Service', 2024, NULL, NULL, NULL, 'Professionals', 1, '2019-05-14 07:48:41', '2019-05-14 07:48:41'),
(2130, '', NULL, 'Printing and Publishing Services', 2024, NULL, NULL, NULL, 'Professionals', 1, '2019-05-14 07:48:41', '2019-05-14 07:48:41'),
(2131, '', NULL, 'Private Car Service', 2024, NULL, NULL, NULL, 'Professionals', 1, '2019-05-14 07:48:41', '2019-05-14 07:48:41'),
(2132, '', NULL, 'Private Nursing Service', 2024, NULL, NULL, NULL, 'Professionals', 1, '2019-05-14 07:48:41', '2019-05-14 07:48:41'),
(2133, '', NULL, 'Procurement Services', 2024, NULL, NULL, NULL, 'Professionals', 1, '2019-05-14 07:48:41', '2019-05-14 07:48:41'),
(2134, '', NULL, 'Professional Services/Consultants', 2024, NULL, NULL, NULL, 'Professionals', 1, '2019-05-14 07:48:41', '2019-05-14 07:48:41'),
(2135, '', NULL, 'Property Management Service', 2024, NULL, NULL, NULL, 'Professionals', 1, '2019-05-14 07:48:41', '2019-05-14 07:48:41'),
(2136, '', NULL, 'Rare Book Dealer/Search Service', 2024, NULL, NULL, NULL, 'Professionals', 1, '2019-05-14 07:48:41', '2019-05-14 07:48:41'),
(2137, '', NULL, 'Real Estate Services', 2024, NULL, NULL, NULL, 'Professionals', 1, '2019-05-14 07:48:41', '2019-05-14 07:48:41'),
(2138, '', NULL, 'Relocation services', 2024, NULL, NULL, NULL, 'Professionals', 1, '2019-05-14 07:48:41', '2019-05-14 07:48:41'),
(2139, '', NULL, 'Resume Service', 2024, NULL, NULL, NULL, 'Professionals', 1, '2019-05-14 07:48:41', '2019-05-14 07:48:41'),
(2140, '', NULL, 'Seamstress or Tailor Services', 2024, NULL, NULL, NULL, 'Professionals', 1, '2019-05-14 07:48:41', '2019-05-14 07:48:41'),
(2141, '', NULL, 'Shipping Services/UPS/Customs', 2024, NULL, NULL, NULL, 'Professionals', 1, '2019-05-14 07:48:41', '2019-05-14 07:48:41'),
(2142, '', NULL, 'Shipping/Freight Forwarding Service', 2024, NULL, NULL, NULL, 'Professionals', 1, '2019-05-14 07:48:41', '2019-05-14 07:48:41'),
(2143, '', NULL, 'Snow and Ice Removal Service', 2024, NULL, NULL, NULL, 'Professionals', 1, '2019-05-14 07:48:41', '2019-05-14 07:48:41'),
(2144, '', NULL, 'Snow Plow Service', 2024, NULL, NULL, NULL, 'Professionals', 1, '2019-05-14 07:48:41', '2019-05-14 07:48:41'),
(2145, '', NULL, 'Software Installation Service', 2024, NULL, NULL, NULL, 'Professionals', 1, '2019-05-14 07:48:41', '2019-05-14 07:48:41'),
(2146, '', NULL, 'Spa Service Business', 2024, NULL, NULL, NULL, 'Professionals', 1, '2019-05-14 07:48:41', '2019-05-14 07:48:41'),
(2147, '', NULL, 'Sports Equipment Sales/Service', 2024, NULL, NULL, NULL, 'Professionals', 1, '2019-05-14 07:48:41', '2019-05-14 07:48:41'),
(2148, '', NULL, 'Storage Service', 2024, NULL, NULL, NULL, 'Professionals', 1, '2019-05-14 07:48:41', '2019-05-14 07:48:41'),
(2149, '', NULL, 'Student Auxiliary Services', 2024, NULL, NULL, NULL, 'Professionals', 1, '2019-05-14 07:48:41', '2019-05-14 07:48:41'),
(2150, '', NULL, 'Tailoring Service', 2024, NULL, NULL, NULL, 'Professionals', 1, '2019-05-14 07:48:41', '2019-05-14 07:48:41'),
(2151, '', NULL, 'Trade Show and Exhibition Services', 2024, NULL, NULL, NULL, 'Professionals', 1, '2019-05-14 07:48:41', '2019-05-14 07:48:41'),
(2152, '', NULL, 'Translation Service Provider', 2024, NULL, NULL, NULL, 'Professionals', 1, '2019-05-14 07:48:41', '2019-05-14 07:48:41'),
(2153, '', NULL, 'Transportation (charter services)', 2024, NULL, NULL, NULL, 'Professionals', 1, '2019-05-14 07:48:41', '2019-05-14 07:48:41'),
(2154, '', NULL, 'Transportation, Freight Forwarder and Storage Services', 2024, NULL, NULL, NULL, 'Professionals', 1, '2019-05-14 07:48:41', '2019-05-14 07:48:41'),
(2155, '', NULL, 'Travel Concierge Services', 2024, NULL, NULL, NULL, 'Professionals', 1, '2019-05-14 07:48:41', '2019-05-14 07:48:41'),
(2156, '', NULL, 'Tree Service', 2024, NULL, NULL, NULL, 'Professionals', 1, '2019-05-14 07:48:41', '2019-05-14 07:48:41'),
(2157, '', NULL, 'Trophy/Engraving Service', 2024, NULL, NULL, NULL, 'Professionals', 1, '2019-05-14 07:48:41', '2019-05-14 07:48:41'),
(2158, '', NULL, 'Uniform Service', 2024, NULL, NULL, NULL, 'Professionals', 1, '2019-05-14 07:48:41', '2019-05-14 07:48:41'),
(2159, '', NULL, 'Valet Parking Service', 2024, NULL, NULL, NULL, 'Professionals', 1, '2019-05-14 07:48:41', '2019-05-14 07:48:41'),
(2160, '', NULL, 'Vehicle Inspection Service', 2024, NULL, NULL, NULL, 'Professionals', 1, '2019-05-14 07:48:41', '2019-05-14 07:48:41'),
(2161, '', NULL, 'Wallpaper Installation Service', 2024, NULL, NULL, NULL, 'Professionals', 1, '2019-05-14 07:48:41', '2019-05-14 07:48:41'),
(2162, '', NULL, 'Window Washing Service', 2024, NULL, NULL, NULL, 'Professionals', 1, '2019-05-14 07:48:41', '2019-05-14 07:48:41'),
(2163, '', NULL, 'Windshield Repair Service', 2024, NULL, NULL, NULL, 'Professionals', 1, '2019-05-14 07:48:41', '2019-05-14 07:48:41'),
(2164, '', NULL, 'Tablets', 52, NULL, NULL, NULL, 'Adds', 1, '2019-05-14 07:48:42', '2019-05-14 07:48:42'),
(2165, '', NULL, 'Accessories', 52, NULL, NULL, NULL, 'Adds', 1, '2019-05-14 07:48:42', '2019-05-14 07:48:42'),
(2166, '', NULL, 'Mobile Phones', 52, NULL, NULL, NULL, 'Adds', 1, '2019-05-14 07:48:42', '2019-05-14 07:48:42'),
(2167, '', NULL, 'Vechicles', NULL, NULL, NULL, NULL, 'Adds', 1, '2019-05-14 07:48:42', '2019-05-14 07:48:42'),
(2168, '', NULL, 'Cars', 2167, NULL, NULL, NULL, 'Adds', 1, '2019-05-14 07:48:42', '2019-05-14 07:48:42'),
(2169, '', NULL, 'Cars Accessories', 2167, NULL, NULL, NULL, 'Adds', 1, '2019-05-14 07:48:42', '2019-05-14 07:48:42'),
(2170, '', NULL, 'Spare Parts', 2167, NULL, NULL, NULL, 'Adds', 1, '2019-05-14 07:48:42', '2019-05-14 07:48:42'),
(2171, '', NULL, 'Buses, Vans & Trucks', 2167, NULL, NULL, NULL, 'Adds', 1, '2019-05-14 07:48:42', '2019-05-14 07:48:42'),
(2172, '', NULL, 'Rickshaw & Chingchi', 2167, NULL, NULL, NULL, 'Adds', 1, '2019-05-14 07:48:42', '2019-05-14 07:48:42'),
(2173, '', NULL, 'Other Vehicles', 2167, NULL, NULL, NULL, 'Adds', 1, '2019-05-14 07:48:42', '2019-05-14 07:48:42'),
(2174, '', NULL, 'Boats', 2167, NULL, NULL, NULL, 'Adds', 1, '2019-05-14 07:48:42', '2019-05-14 07:48:42'),
(2175, '', NULL, 'Tractors & Trailers', 2167, NULL, NULL, NULL, 'Adds', 1, '2019-05-14 07:48:42', '2019-05-14 07:48:42'),
(2176, '', NULL, 'Electronics & Home Appliances', NULL, NULL, NULL, NULL, 'Adds', 1, '2019-05-14 07:48:42', '2019-05-14 07:48:42'),
(2177, '', NULL, 'Computers & Accessories', 2176, NULL, NULL, NULL, 'Adds', 1, '2019-05-14 07:48:42', '2019-05-14 07:48:42'),
(2178, '', NULL, 'TV - Video - Audio', 2176, NULL, NULL, NULL, 'Adds', 1, '2019-05-14 07:48:42', '2019-05-14 07:48:42'),
(2179, '', NULL, 'Cameras & Accessories', 2176, NULL, NULL, NULL, 'Adds', 1, '2019-05-14 07:48:42', '2019-05-14 07:48:42'),
(2180, '', NULL, 'Games & Entertainment', 2176, NULL, NULL, NULL, 'Adds', 1, '2019-05-14 07:48:42', '2019-05-14 07:48:42'),
(2181, '', NULL, 'Other Home Appliances', 2176, NULL, NULL, NULL, 'Adds', 1, '2019-05-14 07:48:42', '2019-05-14 07:48:42'),
(2182, '', NULL, 'Generators, UPS & Power Solutions', 2176, NULL, NULL, NULL, 'Adds', 1, '2019-05-14 07:48:42', '2019-05-14 07:48:42'),
(2183, '', NULL, 'Kitchen Appliances', 2176, NULL, NULL, NULL, 'Adds', 1, '2019-05-14 07:48:42', '2019-05-14 07:48:42'),
(2184, '', NULL, 'AC & Coolers', 2176, NULL, NULL, NULL, 'Adds', 1, '2019-05-14 07:48:42', '2019-05-14 07:48:42'),
(2185, '', NULL, 'Fridges & Freezers', 2176, NULL, NULL, NULL, 'Adds', 1, '2019-05-14 07:48:42', '2019-05-14 07:48:42'),
(2186, '', NULL, 'Washing Machines & Dryers', 2176, NULL, NULL, NULL, 'Adds', 1, '2019-05-14 07:48:42', '2019-05-14 07:48:42'),
(2187, '', NULL, 'Property for Sale', NULL, NULL, NULL, NULL, 'Adds', 1, '2019-05-14 07:48:42', '2019-05-14 07:48:42'),
(2188, '', NULL, 'Land & Plots', 2187, NULL, NULL, NULL, 'Adds', 1, '2019-05-14 07:48:42', '2019-05-14 07:48:42'),
(2189, '', NULL, 'Houses', 2187, NULL, NULL, NULL, 'Adds', 1, '2019-05-14 07:48:42', '2019-05-14 07:48:42'),
(2190, '', NULL, 'Apartments & Flats', 2187, NULL, NULL, NULL, 'Adds', 1, '2019-05-14 07:48:42', '2019-05-14 07:48:42'),
(2191, '', NULL, 'Shops - Offices - Commercial Space', 2187, NULL, NULL, NULL, 'Adds', 1, '2019-05-14 07:48:42', '2019-05-14 07:48:42'),
(2192, '', NULL, 'Portions & Floors', 2187, NULL, NULL, NULL, 'Adds', 1, '2019-05-14 07:48:42', '2019-05-14 07:48:42'),
(2193, '', NULL, 'Property for Rent', NULL, NULL, NULL, NULL, 'Adds', 1, '2019-05-14 07:48:42', '2019-05-14 07:48:42'),
(2194, '', NULL, 'Houses', 2193, NULL, NULL, NULL, 'Adds', 1, '2019-05-14 07:48:42', '2019-05-14 07:48:42'),
(2195, '', NULL, 'Apartments & Flats', 2193, NULL, NULL, NULL, 'Adds', 1, '2019-05-14 07:48:42', '2019-05-14 07:48:42'),
(2196, '', NULL, 'Portions & Floors', 2193, NULL, NULL, NULL, 'Adds', 1, '2019-05-14 07:48:42', '2019-05-14 07:48:42'),
(2197, '', NULL, 'Shops - Offices - Commercial Space', 2193, NULL, NULL, NULL, 'Adds', 1, '2019-05-14 07:48:42', '2019-05-14 07:48:42'),
(2198, '', NULL, 'Roommates & Paying Guests', 2193, NULL, NULL, NULL, 'Adds', 1, '2019-05-14 07:48:42', '2019-05-14 07:48:42'),
(2199, '', NULL, 'Vacation Rentals - Guest Houses', 2193, NULL, NULL, NULL, 'Adds', 1, '2019-05-14 07:48:42', '2019-05-14 07:48:42'),
(2200, '', NULL, 'Land & Plots', 2193, NULL, NULL, NULL, 'Adds', 1, '2019-05-14 07:48:42', '2019-05-14 07:48:42'),
(2201, '', NULL, 'Motorcycles', 564, NULL, NULL, NULL, 'Adds', 1, '2019-05-14 07:48:42', '2019-05-14 07:48:42'),
(2202, '', NULL, 'Spare Parts', 564, NULL, NULL, NULL, 'Adds', 1, '2019-05-14 07:48:42', '2019-05-14 07:48:42'),
(2203, '', NULL, 'Bicycles', 564, NULL, NULL, NULL, 'Adds', 1, '2019-05-14 07:48:42', '2019-05-14 07:48:42'),
(2204, '', NULL, 'ATV & Quads', 564, NULL, NULL, NULL, 'Adds', 1, '2019-05-14 07:48:42', '2019-05-14 07:48:42'),
(2205, '', NULL, 'Scooters', 564, NULL, NULL, NULL, 'Adds', 1, '2019-05-14 07:48:42', '2019-05-14 07:48:42'),
(2206, '', NULL, 'Business, Industrial & Agriculture', NULL, NULL, NULL, NULL, 'Adds', 1, '2019-05-14 07:48:42', '2019-05-14 07:48:42'),
(2207, '', NULL, 'Business for Sale', 2206, NULL, NULL, NULL, 'Adds', 1, '2019-05-14 07:48:42', '2019-05-14 07:48:42'),
(2208, '', NULL, 'Food & Restaurants', 2206, NULL, NULL, NULL, 'Adds', 1, '2019-05-14 07:48:42', '2019-05-14 07:48:42'),
(2209, '', NULL, 'Trade & Industrial', 2206, NULL, NULL, NULL, 'Adds', 1, '2019-05-14 07:48:42', '2019-05-14 07:48:42'),
(2210, '', NULL, 'Construction & Heavy Machinery', 2206, NULL, NULL, NULL, 'Adds', 1, '2019-05-14 07:48:42', '2019-05-14 07:48:42'),
(2211, '', NULL, 'Agriculture', 2206, NULL, NULL, NULL, 'Adds', 1, '2019-05-14 07:48:42', '2019-05-14 07:48:42'),
(2212, '', NULL, 'Other Business & Industry', 2206, NULL, NULL, NULL, 'Adds', 1, '2019-05-14 07:48:42', '2019-05-14 07:48:42'),
(2213, '', NULL, 'Medical & Pharma', 2206, NULL, NULL, NULL, 'Adds', 1, '2019-05-14 07:48:42', '2019-05-14 07:48:42');
INSERT INTO `categories` (`id`, `profile_image`, `icon_image`, `name`, `parent_id`, `is_ad_additional_fields_req`, `is_ad_type_or_make_req`, `is_ad_condition_req`, `type`, `is_active`, `created_at`, `updated_at`) VALUES
(2214, '', NULL, 'Services', NULL, NULL, NULL, NULL, 'Adds', 1, '2019-05-14 07:48:42', '2019-05-14 07:48:42'),
(2215, '', NULL, 'Education & Classes', 2214, NULL, NULL, NULL, 'Adds', 1, '2019-05-14 07:48:42', '2019-05-14 07:48:42'),
(2216, '', NULL, 'Travel & Visa', 2214, NULL, NULL, NULL, 'Adds', 1, '2019-05-14 07:48:42', '2019-05-14 07:48:42'),
(2217, '', NULL, 'Car Rental', 2214, NULL, NULL, NULL, 'Adds', 1, '2019-05-14 07:48:42', '2019-05-14 07:48:42'),
(2218, '', NULL, 'Drivers & Taxi', 2214, NULL, NULL, NULL, 'Adds', 1, '2019-05-14 07:48:42', '2019-05-14 07:48:42'),
(2219, '', NULL, 'Web Development', 2214, NULL, NULL, NULL, 'Adds', 1, '2019-05-14 07:48:42', '2019-05-14 07:48:42'),
(2220, '', NULL, 'Other Services', 2214, NULL, NULL, NULL, 'Adds', 1, '2019-05-14 07:48:42', '2019-05-14 07:48:42'),
(2221, '', NULL, 'Electronics & Computer Repair', 2214, NULL, NULL, NULL, 'Adds', 1, '2019-05-14 07:48:42', '2019-05-14 07:48:42'),
(2222, '', NULL, 'Event Services', 2214, NULL, NULL, NULL, 'Adds', 1, '2019-05-14 07:48:42', '2019-05-14 07:48:42'),
(2223, '', NULL, 'Health & Beauty', 2214, NULL, NULL, NULL, 'Adds', 1, '2019-05-14 07:48:42', '2019-05-14 07:48:42'),
(2224, '', NULL, 'Maids & Domestic Help', 2214, NULL, NULL, NULL, 'Adds', 1, '2019-05-14 07:48:42', '2019-05-14 07:48:42'),
(2225, '', NULL, 'Movers & Packers', 2214, NULL, NULL, NULL, 'Adds', 1, '2019-05-14 07:48:42', '2019-05-14 07:48:42'),
(2226, '', NULL, 'Home & Office Repair', 2214, NULL, NULL, NULL, 'Adds', 1, '2019-05-14 07:48:42', '2019-05-14 07:48:42'),
(2227, '', NULL, 'Catering & Restaurant', 2214, NULL, NULL, NULL, 'Adds', 1, '2019-05-14 07:48:42', '2019-05-14 07:48:42'),
(2228, '', NULL, 'Farm & Fresh Food', 2214, NULL, NULL, NULL, 'Adds', 1, '2019-05-14 07:48:42', '2019-05-14 07:48:42'),
(2229, '', NULL, 'Jobs', NULL, NULL, NULL, NULL, 'Adds', 1, '2019-05-14 07:48:42', '2019-05-14 07:48:42'),
(2230, '', NULL, 'Online', 2229, NULL, NULL, NULL, 'Adds', 1, '2019-05-14 07:48:42', '2019-05-14 07:48:42'),
(2231, '', NULL, 'Marketing', 2229, NULL, NULL, NULL, 'Adds', 1, '2019-05-14 07:48:42', '2019-05-14 07:48:42'),
(2232, '', NULL, 'Advertising & PR Jobs', 2229, NULL, NULL, NULL, 'Adds', 1, '2019-05-14 07:48:42', '2019-05-14 07:48:42'),
(2233, '', NULL, 'Education', 2229, NULL, NULL, NULL, 'Adds', 1, '2019-05-14 07:48:42', '2019-05-14 07:48:42'),
(2234, '', NULL, 'Customer Service', 2229, NULL, NULL, NULL, 'Adds', 1, '2019-05-14 07:48:42', '2019-05-14 07:48:42'),
(2235, '', NULL, 'Sales', 2229, NULL, NULL, NULL, 'Adds', 1, '2019-05-14 07:48:42', '2019-05-14 07:48:42'),
(2236, '', NULL, 'IT & Networking', 2229, NULL, NULL, NULL, 'Adds', 1, '2019-05-14 07:48:42', '2019-05-14 07:48:42'),
(2237, '', NULL, 'Hotels & Tourism', 2229, NULL, NULL, NULL, 'Adds', 1, '2019-05-14 07:48:42', '2019-05-14 07:48:42'),
(2238, '', NULL, 'Clerical & Administration', 2229, NULL, NULL, NULL, 'Adds', 1, '2019-05-14 07:48:42', '2019-05-14 07:48:42'),
(2239, '', NULL, 'Human Resources', 2229, NULL, NULL, NULL, 'Adds', 1, '2019-05-14 07:48:42', '2019-05-14 07:48:42'),
(2240, '', NULL, 'Accounting & Finance', 2229, NULL, NULL, NULL, 'Adds', 1, '2019-05-14 07:48:42', '2019-05-14 07:48:42'),
(2241, '', NULL, 'Manufacturing', 2229, NULL, NULL, NULL, 'Adds', 1, '2019-05-14 07:48:42', '2019-05-14 07:48:42'),
(2242, '', NULL, 'Medical', 2229, NULL, NULL, NULL, 'Adds', 1, '2019-05-14 07:48:42', '2019-05-14 07:48:42'),
(2243, '', NULL, 'Domestic Staff', 2229, NULL, NULL, NULL, 'Adds', 1, '2019-05-14 07:48:42', '2019-05-14 07:48:42'),
(2244, '', NULL, 'Part - Time', 2229, NULL, NULL, NULL, 'Adds', 1, '2019-05-14 07:48:42', '2019-05-14 07:48:42'),
(2245, '', NULL, 'Other Jobs', 2229, NULL, NULL, NULL, 'Adds', 1, '2019-05-14 07:48:42', '2019-05-14 07:48:42'),
(2246, '', NULL, 'Animals', NULL, NULL, NULL, NULL, 'Adds', 1, '2019-05-14 07:48:42', '2019-05-14 07:48:42'),
(2247, '', NULL, 'Fish & Aquariums', 2246, NULL, NULL, NULL, 'Adds', 1, '2019-05-14 07:48:42', '2019-05-14 07:48:42'),
(2248, '', NULL, 'Birds', 2246, NULL, NULL, NULL, 'Adds', 1, '2019-05-14 07:48:42', '2019-05-14 07:48:42'),
(2249, '', NULL, 'Hens & Aseel', 2246, NULL, NULL, NULL, 'Adds', 1, '2019-05-14 07:48:42', '2019-05-14 07:48:42'),
(2250, '', NULL, 'Cats', 2246, NULL, NULL, NULL, 'Adds', 1, '2019-05-14 07:48:42', '2019-05-14 07:48:42'),
(2251, '', NULL, 'Dogs', 2246, NULL, NULL, NULL, 'Adds', 1, '2019-05-14 07:48:42', '2019-05-14 07:48:42'),
(2252, '', NULL, 'Livestock', 2246, NULL, NULL, NULL, 'Adds', 1, '2019-05-14 07:48:42', '2019-05-14 07:48:42'),
(2253, '', NULL, 'Horses', 2246, NULL, NULL, NULL, 'Adds', 1, '2019-05-14 07:48:42', '2019-05-14 07:48:42'),
(2254, '', NULL, 'Pet Food & Accessories', 2246, NULL, NULL, NULL, 'Adds', 1, '2019-05-14 07:48:42', '2019-05-14 07:48:42'),
(2255, '', NULL, 'Other Animals', 2246, NULL, NULL, NULL, 'Adds', 1, '2019-05-14 07:48:42', '2019-05-14 07:48:42'),
(2256, '', NULL, 'Furniture & Home Décor', NULL, NULL, NULL, NULL, 'Adds', 1, '2019-05-14 07:48:42', '2019-05-14 07:48:42'),
(2257, '', NULL, 'Sofa & Chairs', 2256, NULL, NULL, NULL, 'Adds', 1, '2019-05-14 07:48:42', '2019-05-14 07:48:42'),
(2258, '', NULL, 'Beds & Wardrobes', 2256, NULL, NULL, NULL, 'Adds', 1, '2019-05-14 07:48:42', '2019-05-14 07:48:42'),
(2259, '', NULL, 'Home Decoration', 2256, NULL, NULL, NULL, 'Adds', 1, '2019-05-14 07:48:42', '2019-05-14 07:48:42'),
(2260, '', NULL, 'Tables & Dining', 2256, NULL, NULL, NULL, 'Adds', 1, '2019-05-14 07:48:42', '2019-05-14 07:48:42'),
(2261, '', NULL, 'Garden & Outdoor', 2256, NULL, NULL, NULL, 'Adds', 1, '2019-05-14 07:48:42', '2019-05-14 07:48:42'),
(2262, '', NULL, 'Painting & Mirrors', 2256, NULL, NULL, NULL, 'Adds', 1, '2019-05-14 07:48:42', '2019-05-14 07:48:42'),
(2263, '', NULL, 'Rugs & Carpets', 2256, NULL, NULL, NULL, 'Adds', 1, '2019-05-14 07:48:42', '2019-05-14 07:48:42'),
(2264, '', NULL, 'Curtains & Blinds', 2256, NULL, NULL, NULL, 'Adds', 1, '2019-05-14 07:48:42', '2019-05-14 07:48:42'),
(2265, '', NULL, 'Office Furniture', 2256, NULL, NULL, NULL, 'Adds', 1, '2019-05-14 07:48:42', '2019-05-14 07:48:42'),
(2266, '', NULL, 'Other Household Items', 2256, NULL, NULL, NULL, 'Adds', 1, '2019-05-14 07:48:42', '2019-05-14 07:48:42'),
(2267, '', NULL, 'Fashion & Beauty', NULL, NULL, NULL, NULL, 'Adds', 1, '2019-05-14 07:48:42', '2019-05-14 07:48:42'),
(2268, '', NULL, 'Accessories', 2267, NULL, NULL, NULL, 'Adds', 1, '2019-05-14 07:48:42', '2019-05-14 07:48:42'),
(2269, '', NULL, 'Clothes', 2267, NULL, NULL, NULL, 'Adds', 1, '2019-05-14 07:48:42', '2019-05-14 07:48:42'),
(2270, '', NULL, 'Footwear', 2267, NULL, NULL, NULL, 'Adds', 1, '2019-05-14 07:48:42', '2019-05-14 07:48:42'),
(2271, '', NULL, 'Jewellery', 2267, NULL, NULL, NULL, 'Adds', 1, '2019-05-14 07:48:42', '2019-05-14 07:48:42'),
(2272, '', NULL, 'Make Up', 2267, NULL, NULL, NULL, 'Adds', 1, '2019-05-14 07:48:42', '2019-05-14 07:48:42'),
(2273, '', NULL, 'Skin & Hair', 2267, NULL, NULL, NULL, 'Adds', 1, '2019-05-14 07:48:42', '2019-05-14 07:48:42'),
(2274, '', NULL, 'Watches', 2267, NULL, NULL, NULL, 'Adds', 1, '2019-05-14 07:48:42', '2019-05-14 07:48:42'),
(2275, '', NULL, 'Wedding', 2267, NULL, NULL, NULL, 'Adds', 1, '2019-05-14 07:48:42', '2019-05-14 07:48:42'),
(2276, '', NULL, 'Lawn & Pret', 2267, NULL, NULL, NULL, 'Adds', 1, '2019-05-14 07:48:42', '2019-05-14 07:48:42'),
(2277, '', NULL, 'Couture', 2267, NULL, NULL, NULL, 'Adds', 1, '2019-05-14 07:48:42', '2019-05-14 07:48:42'),
(2278, '', NULL, 'Other Fashion', 2267, NULL, NULL, NULL, 'Adds', 1, '2019-05-14 07:48:42', '2019-05-14 07:48:42'),
(2279, '', NULL, 'Books, Sports & Hobbies', NULL, NULL, NULL, NULL, 'Adds', 1, '2019-05-14 07:48:42', '2019-05-14 07:48:42'),
(2280, '', NULL, 'Books & Magazines', 2279, NULL, NULL, NULL, 'Adds', 1, '2019-05-14 07:48:42', '2019-05-14 07:48:42'),
(2281, '', NULL, 'Musical Instruments', 2279, NULL, NULL, NULL, 'Adds', 1, '2019-05-14 07:48:42', '2019-05-14 07:48:42'),
(2282, '', NULL, 'Sports Equipment', 2279, NULL, NULL, NULL, 'Adds', 1, '2019-05-14 07:48:42', '2019-05-14 07:48:42'),
(2283, '', NULL, 'Gym & Fitness', 2279, NULL, NULL, NULL, 'Adds', 1, '2019-05-14 07:48:42', '2019-05-14 07:48:42'),
(2284, '', NULL, 'Other Hobbies', 2279, NULL, NULL, NULL, 'Adds', 1, '2019-05-14 07:48:42', '2019-05-14 07:48:42'),
(2285, '', NULL, 'Kids', NULL, NULL, NULL, NULL, 'Adds', 1, '2019-05-14 07:48:42', '2019-05-14 07:48:42'),
(2286, '', NULL, 'Kids Furniture', 2285, NULL, NULL, NULL, 'Adds', 1, '2019-05-14 07:48:42', '2019-05-14 07:48:42'),
(2287, '', NULL, 'Toys', 2285, NULL, NULL, NULL, 'Adds', 1, '2019-05-14 07:48:42', '2019-05-14 07:48:42'),
(2288, '', NULL, 'Prams & Walkers', 2285, NULL, NULL, NULL, 'Adds', 1, '2019-05-14 07:48:42', '2019-05-14 07:48:42'),
(2289, '', NULL, 'Swings & Slides', 2285, NULL, NULL, NULL, 'Adds', 1, '2019-05-14 07:48:42', '2019-05-14 07:48:42'),
(2290, '', NULL, 'Kids Bikes', 2285, NULL, NULL, NULL, 'Adds', 1, '2019-05-14 07:48:42', '2019-05-14 07:48:42'),
(2291, '', NULL, 'Kids Accessories', 2285, NULL, NULL, NULL, 'Adds', 1, '2019-05-14 07:48:42', '2019-05-14 07:48:42');

-- --------------------------------------------------------

--
-- Table structure for table `category_makers`
--

CREATE TABLE `category_makers` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_id` int(10) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `category_makers`
--

INSERT INTO `category_makers` (`id`, `name`, `category_id`, `created_at`, `updated_at`) VALUES
(1, 'Mobile Maker', 52, '2019-05-14 07:48:33', '2019-05-14 07:48:33'),
(2, 'Tablets Maker', 53, '2019-05-14 07:48:33', '2019-05-14 07:48:33'),
(3, 'Laptops Maker', 54, '2019-05-14 07:48:33', '2019-05-14 07:48:33'),
(4, 'Mobile Accessory Maker', 76, '2019-05-14 07:48:34', '2019-05-14 07:48:34'),
(5, 'Audio Maker', 84, '2019-05-14 07:48:34', '2019-05-14 07:48:34'),
(6, 'Wearable Maker', 89, '2019-05-14 07:48:34', '2019-05-14 07:48:34');

-- --------------------------------------------------------

--
-- Table structure for table `chat_messages`
--

CREATE TABLE `chat_messages` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `messages` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `real_file_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `conversation_id` int(11) NOT NULL,
  `type` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED DEFAULT NULL,
  `review_id` int(10) UNSIGNED DEFAULT NULL,
  `comment` varchar(3000) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `conversations`
--

CREATE TABLE `conversations` (
  `id` int(10) UNSIGNED NOT NULL,
  `sender` int(11) NOT NULL,
  `receiver` int(11) NOT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `degrees`
--

CREATE TABLE `degrees` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `degrees`
--

INSERT INTO `degrees` (`id`, `name`, `active`, `created_at`, `updated_at`) VALUES
(1, 'Non Matriculation', 1, '2019-05-14 07:48:57', '2019-05-14 07:48:57'),
(2, 'Matriculation/O Level', 1, '2019-05-14 07:48:57', '2019-05-14 07:48:57'),
(3, 'Intermediate/A Level', 1, '2019-05-14 07:48:57', '2019-05-14 07:48:57'),
(4, 'BA', 1, '2019-05-14 07:48:57', '2019-05-14 07:48:57'),
(5, 'BFA', 1, '2019-05-14 07:48:57', '2019-05-14 07:48:57'),
(6, 'BBA', 1, '2019-05-14 07:48:57', '2019-05-14 07:48:57'),
(7, 'BS', 1, '2019-05-14 07:48:57', '2019-05-14 07:48:57'),
(8, 'BSc', 1, '2019-05-14 07:48:57', '2019-05-14 07:48:57'),
(9, 'BDS', 1, '2019-05-14 07:48:57', '2019-05-14 07:48:57'),
(10, 'BEd', 1, '2019-05-14 07:48:57', '2019-05-14 07:48:57'),
(11, 'B.Com', 1, '2019-05-14 07:48:57', '2019-05-14 07:48:57'),
(12, 'B.Com Hons', 1, '2019-05-14 07:48:57', '2019-05-14 07:48:57'),
(13, 'LLB', 1, '2019-05-14 07:48:57', '2019-05-14 07:48:57'),
(14, 'MA', 1, '2019-05-14 07:48:58', '2019-05-14 07:48:58'),
(15, 'MEd', 1, '2019-05-14 07:48:58', '2019-05-14 07:48:58'),
(16, 'MSc', 1, '2019-05-14 07:48:58', '2019-05-14 07:48:58'),
(17, 'MBA', 1, '2019-05-14 07:48:58', '2019-05-14 07:48:58'),
(18, 'LLM', 1, '2019-05-14 07:48:58', '2019-05-14 07:48:58'),
(19, 'MS', 1, '2019-05-14 07:48:58', '2019-05-14 07:48:58'),
(20, 'M.Com', 1, '2019-05-14 07:48:58', '2019-05-14 07:48:58'),
(21, 'M.Com Hons', 1, '2019-05-14 07:48:58', '2019-05-14 07:48:58'),
(22, 'MFA', 1, '2019-05-14 07:48:58', '2019-05-14 07:48:58'),
(23, 'M.Phil', 1, '2019-05-14 07:48:58', '2019-05-14 07:48:58'),
(24, 'MBBS', 1, '2019-05-14 07:48:58', '2019-05-14 07:48:58'),
(25, 'PHD', 1, '2019-05-14 07:48:58', '2019-05-14 07:48:58'),
(26, 'Diploma', 1, '2019-05-14 07:48:58', '2019-05-14 07:48:58'),
(27, 'Certificate', 1, '2019-05-14 07:48:58', '2019-05-14 07:48:58'),
(28, 'Short Course', 1, '2019-05-14 07:48:59', '2019-05-14 07:48:59');

-- --------------------------------------------------------

--
-- Table structure for table `draft_addon`
--

CREATE TABLE `draft_addon` (
  `id` int(10) UNSIGNED NOT NULL,
  `subscription_addon_id` int(10) UNSIGNED DEFAULT NULL,
  `json_array` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `education`
--

CREATE TABLE `education` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `employee_counts`
--

CREATE TABLE `employee_counts` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `employee_counts`
--

INSERT INTO `employee_counts` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, '1 Employee', NULL, NULL),
(2, '2 - 9 Employees', NULL, NULL),
(3, '10 - 99 Employees', NULL, NULL),
(4, '100 - 499 Employees', NULL, NULL),
(5, '500 - 1000 Employees', NULL, NULL),
(6, 'More Than 1000 Employees', NULL, NULL),
(7, '1 Employee', NULL, NULL),
(8, '2 - 9 Employees', NULL, NULL),
(9, '10 - 99 Employees', NULL, NULL),
(10, '100 - 499 Employees', NULL, NULL),
(11, '500 - 1000 Employees', NULL, NULL),
(12, 'More Than 1000 Employees', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `experiences`
--

CREATE TABLE `experiences` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `experiences`
--

INSERT INTO `experiences` (`id`, `name`, `active`, `created_at`, `updated_at`) VALUES
(1, 'Less Than One Year', 1, '2019-05-14 07:48:56', '2019-05-14 07:48:56'),
(2, 'One To Three Years', 1, '2019-05-14 07:48:56', '2019-05-14 07:48:56'),
(3, 'Three To Five Years', 1, '2019-05-14 07:48:56', '2019-05-14 07:48:56'),
(4, 'Five To Seven Years', 1, '2019-05-14 07:48:56', '2019-05-14 07:48:56'),
(5, 'More Than Seven Years', 1, '2019-05-14 07:48:56', '2019-05-14 07:48:56');

-- --------------------------------------------------------

--
-- Table structure for table `fau_jobs`
--

CREATE TABLE `fau_jobs` (
  `id` int(10) UNSIGNED NOT NULL,
  `task` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `business_id` int(10) UNSIGNED DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `video` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `audio` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `city_id` int(10) UNSIGNED DEFAULT NULL,
  `location` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lat` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lng` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date` date DEFAULT NULL,
  `number_of_people` int(11) DEFAULT NULL,
  `budget` int(11) DEFAULT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT 'Pending',
  `created_by` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `fau_request_quotes`
--

CREATE TABLE `fau_request_quotes` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `quantity` int(11) DEFAULT NULL,
  `description` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `category_id` int(10) UNSIGNED DEFAULT NULL,
  `sub_category_id` int(10) UNSIGNED DEFAULT NULL,
  `currency_id` int(10) UNSIGNED DEFAULT NULL,
  `inventory_packing_unit_id` int(10) UNSIGNED NOT NULL,
  `created_by` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `fau_request_quote_attachments`
--

CREATE TABLE `fau_request_quote_attachments` (
  `id` int(10) UNSIGNED NOT NULL,
  `attachments` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fau_request_quotes_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `fau_tags`
--

CREATE TABLE `fau_tags` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `title` varchar(1000) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_id` int(10) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `fau_tags`
--

INSERT INTO `fau_tags` (`id`, `name`, `is_active`, `created_at`, `updated_at`, `title`, `category_id`) VALUES
(1, '100% Cotton Fabric', 1, '2019-05-14 07:48:42', '2019-05-14 07:48:42', '100%_cotton_fabric', NULL),
(2, '100% Polyester Fabric', 1, '2019-05-14 07:48:42', '2019-05-14 07:48:42', '100%_polyester_fabric', NULL),
(3, '3D Glasses', 1, '2019-05-14 07:48:42', '2019-05-14 07:48:42', '3d_glasses', NULL),
(4, '3D Printing Equipment', 1, '2019-05-14 07:48:42', '2019-05-14 07:48:42', '3d_printing_equipment', NULL),
(5, '3D Printing Service', 1, '2019-05-14 07:48:42', '2019-05-14 07:48:42', '3d_printing_service', NULL),
(6, '3D Rendering & Animation', 1, '2019-05-14 07:48:42', '2019-05-14 07:48:42', '3d_rendering_&_animation', NULL),
(7, 'Abortion Clinic', 1, '2019-05-14 07:48:42', '2019-05-14 07:48:42', 'abortion_clinic', NULL),
(8, 'Abrasive & Sandblasting', 1, '2019-05-14 07:48:42', '2019-05-14 07:48:42', 'abrasive_&_sandblasting', NULL),
(9, 'Access Control Systems & Products', 1, '2019-05-14 07:48:42', '2019-05-14 07:48:42', 'access_control_systems_&_products', NULL),
(10, 'Access Points', 1, '2019-05-14 07:48:42', '2019-05-14 07:48:42', 'access_points', NULL),
(11, 'Accessories & Parts', 1, '2019-05-14 07:48:42', '2019-05-14 07:48:42', 'accessories_&_parts', NULL),
(12, 'Action Camera Accessories', 1, '2019-05-14 07:48:42', '2019-05-14 07:48:42', 'action_camera_accessories', NULL),
(13, 'Action Figure', 1, '2019-05-14 07:48:42', '2019-05-14 07:48:42', 'action_figure', NULL),
(14, 'Acupuncture', 1, '2019-05-14 07:48:42', '2019-05-14 07:48:42', 'acupuncture', NULL),
(15, 'Adapters & Cables', 1, '2019-05-14 07:48:42', '2019-05-14 07:48:42', 'adapters_&_cables', NULL),
(16, 'Additives', 1, '2019-05-14 07:48:42', '2019-05-14 07:48:42', 'additives', NULL),
(17, 'Adhesive Tape', 1, '2019-05-14 07:48:42', '2019-05-14 07:48:42', 'adhesive_tape', NULL),
(18, 'Adult Entertainment', 1, '2019-05-14 07:48:42', '2019-05-14 07:48:42', 'adult_entertainment', NULL),
(19, 'Adult Shop', 1, '2019-05-14 07:48:42', '2019-05-14 07:48:42', 'adult_shop', NULL),
(20, 'Advertising Agency', 1, '2019-05-14 07:48:42', '2019-05-14 07:48:42', 'advertising_agency', NULL),
(21, 'Advertising Equipment', 1, '2019-05-14 07:48:42', '2019-05-14 07:48:42', 'advertising_equipment', NULL),
(22, 'Advertising Light Boxes', 1, '2019-05-14 07:48:42', '2019-05-14 07:48:42', 'advertising_light_boxes', NULL),
(23, 'Advertising Players', 1, '2019-05-14 07:48:42', '2019-05-14 07:48:42', 'advertising_players', NULL),
(24, 'Affiliate Marketing', 1, '2019-05-14 07:48:42', '2019-05-14 07:48:42', 'affiliate_marketing', NULL),
(25, 'African Restaurant', 1, '2019-05-14 07:48:42', '2019-05-14 07:48:42', 'african_restaurant', NULL),
(26, 'Aged Care Services', 1, '2019-05-14 07:48:42', '2019-05-14 07:48:42', 'aged_care_services', NULL),
(27, 'Agricultural Packaging', 1, '2019-05-14 07:48:42', '2019-05-14 07:48:42', 'agricultural_packaging', NULL),
(28, 'Agricultural Rubber', 1, '2019-05-14 07:48:42', '2019-05-14 07:48:42', 'agricultural_rubber', NULL),
(29, 'Agriculture Machinery & Equipment', 1, '2019-05-14 07:48:42', '2019-05-14 07:48:42', 'agriculture_machinery_&_equipment', NULL),
(30, 'Air Care', 1, '2019-05-14 07:48:42', '2019-05-14 07:48:42', 'air_care', NULL),
(31, 'Air Conditioners', 1, '2019-05-14 07:48:42', '2019-05-14 07:48:42', 'air_conditioners', NULL),
(32, 'Air Conditioning & Heating', 1, '2019-05-14 07:48:42', '2019-05-14 07:48:42', 'air_conditioning_&_heating', NULL),
(33, 'Air Conditioning Appliances', 1, '2019-05-14 07:48:42', '2019-05-14 07:48:42', 'air_conditioning_appliances', NULL),
(34, 'Air Conditioning Installation and Maintenance', 1, '2019-05-14 07:48:42', '2019-05-14 07:48:42', 'air_conditioning_installation_and_maintenance', NULL),
(35, 'Air Cooler', 1, '2019-05-14 07:48:42', '2019-05-14 07:48:42', 'air_cooler', NULL),
(36, 'Air Fresheners', 1, '2019-05-14 07:48:42', '2019-05-14 07:48:42', 'air_fresheners', NULL),
(37, 'Aircraft Charter & Rental Service', 1, '2019-05-14 07:48:42', '2019-05-14 07:48:42', 'aircraft_charter_&_rental_service', NULL),
(38, 'Alarm', 1, '2019-05-14 07:48:42', '2019-05-14 07:48:42', 'alarm', NULL),
(39, 'Alcohol Tester', 1, '2019-05-14 07:48:42', '2019-05-14 07:48:42', 'alcohol_tester', NULL),
(40, 'Alcoholic Beverage', 1, '2019-05-14 07:48:42', '2019-05-14 07:48:42', 'alcoholic_beverage', NULL),
(41, 'All-Day Breakfast Restaurant', 1, '2019-05-14 07:48:42', '2019-05-14 07:48:42', 'all-day_breakfast_restaurant', NULL),
(42, 'All-in-One', 1, '2019-05-14 07:48:42', '2019-05-14 07:48:42', 'all-in-one', NULL),
(43, 'Alterations/Seamstress Business', 1, '2019-05-14 07:48:42', '2019-05-14 07:48:42', 'alterations/seamstress_business', NULL),
(44, 'Alternative Medicine', 1, '2019-05-14 07:48:42', '2019-05-14 07:48:42', 'alternative_medicine', NULL),
(45, 'Aluminum', 1, '2019-05-14 07:48:42', '2019-05-14 07:48:42', 'aluminum', NULL),
(46, 'Aluminum Composite Panels', 1, '2019-05-14 07:48:42', '2019-05-14 07:48:42', 'aluminum_composite_panels', NULL),
(47, 'Aluminum Foil', 1, '2019-05-14 07:48:42', '2019-05-14 07:48:42', 'aluminum_foil', NULL),
(48, 'American Restaurant', 1, '2019-05-14 07:48:42', '2019-05-14 07:48:42', 'american_restaurant', NULL),
(49, 'Amusement Park', 1, '2019-05-14 07:48:42', '2019-05-14 07:48:42', 'amusement_park', NULL),
(50, 'And Carts & Trolleys', 1, '2019-05-14 07:48:42', '2019-05-14 07:48:42', 'and_carts_&_trolleys', NULL),
(51, 'Animal Extract', 1, '2019-05-14 07:48:42', '2019-05-14 07:48:42', 'animal_extract', NULL),
(52, 'Animal Products', 1, '2019-05-14 07:48:42', '2019-05-14 07:48:42', 'animal_products', NULL),
(53, 'Answering Machines', 1, '2019-05-14 07:48:42', '2019-05-14 07:48:42', 'answering_machines', NULL),
(54, 'Antennas for Communications', 1, '2019-05-14 07:48:42', '2019-05-14 07:48:42', 'antennas_for_communications', NULL),
(55, 'Antique Refurbishment', 1, '2019-05-14 07:48:42', '2019-05-14 07:48:42', 'antique_refurbishment', NULL),
(56, 'App Creator', 1, '2019-05-14 07:48:42', '2019-05-14 07:48:42', 'app_creator', NULL),
(57, 'App Design & Development', 1, '2019-05-14 07:48:42', '2019-05-14 07:48:42', 'app_design_&_development', NULL),
(58, 'Apparel & Accessories', 1, '2019-05-14 07:48:42', '2019-05-14 07:48:42', 'apparel_&_accessories', NULL),
(59, 'Apparel & Textile Machinery', 1, '2019-05-14 07:48:42', '2019-05-14 07:48:42', 'apparel_&_textile_machinery', NULL),
(60, 'Apparel Design Services', 1, '2019-05-14 07:48:42', '2019-05-14 07:48:42', 'apparel_design_services', NULL),
(61, 'Apparel Packaging', 1, '2019-05-14 07:48:42', '2019-05-14 07:48:42', 'apparel_packaging', NULL),
(62, 'Apparel Processing Services', 1, '2019-05-14 07:48:42', '2019-05-14 07:48:42', 'apparel_processing_services', NULL),
(63, 'Apparel Stock', 1, '2019-05-14 07:48:42', '2019-05-14 07:48:42', 'apparel_stock', NULL),
(64, 'Aquaium Temp Control', 1, '2019-05-14 07:48:42', '2019-05-14 07:48:42', 'aquaium_temp_control', NULL),
(65, 'Aquarium Maintenance', 1, '2019-05-14 07:48:42', '2019-05-14 07:48:42', 'aquarium_maintenance', NULL),
(66, 'Arcade/Party Rentals', 1, '2019-05-14 07:48:42', '2019-05-14 07:48:42', 'arcade/party_rentals', NULL),
(67, 'Architect', 1, '2019-05-14 07:48:42', '2019-05-14 07:48:42', 'architect', NULL),
(68, 'Art & Collectible', 1, '2019-05-14 07:48:42', '2019-05-14 07:48:42', 'art_&_collectible', NULL),
(69, 'Art Gallery', 1, '2019-05-14 07:48:42', '2019-05-14 07:48:42', 'art_gallery', NULL),
(70, 'Artificial Flowers & Plants', 1, '2019-05-14 07:48:42', '2019-05-14 07:48:42', 'artificial_flowers_&_plants', NULL),
(71, 'Artificial Grass & Sports Flooring', 1, '2019-05-14 07:48:42', '2019-05-14 07:48:42', 'artificial_grass_&_sports_flooring', NULL),
(72, 'Arts & Crafts Shop', 1, '2019-05-14 07:48:42', '2019-05-14 07:48:42', 'arts_&_crafts_shop', NULL),
(73, 'Arts & Crafts Stocks', 1, '2019-05-14 07:48:42', '2019-05-14 07:48:42', 'arts_&_crafts_stocks', NULL),
(74, 'Asian Restaurant', 1, '2019-05-14 07:48:42', '2019-05-14 07:48:42', 'asian_restaurant', NULL),
(75, 'Association', 1, '2019-05-14 07:48:42', '2019-05-14 07:48:42', 'association', NULL),
(76, 'Aternity Clothing', 1, '2019-05-14 07:48:42', '2019-05-14 07:48:42', 'aternity_clothing', NULL),
(77, 'Attorney', 1, '2019-05-14 07:48:42', '2019-05-14 07:48:42', 'attorney', NULL),
(78, 'Auction House', 1, '2019-05-14 07:48:42', '2019-05-14 07:48:42', 'auction_house', NULL),
(79, 'Audio & Video Accessories', 1, '2019-05-14 07:48:42', '2019-05-14 07:48:42', 'audio_&_video_accessories', NULL),
(80, 'Audio Visual Equipment', 1, '2019-05-14 07:48:42', '2019-05-14 07:48:42', 'audio_visual_equipment', NULL),
(81, 'Audiobook Producer/Distributor', 1, '2019-05-14 07:48:42', '2019-05-14 07:48:42', 'audiobook_producer/distributor', NULL),
(82, 'Australian Restaurant', 1, '2019-05-14 07:48:42', '2019-05-14 07:48:42', 'australian_restaurant', NULL),
(83, 'Auto Care', 1, '2019-05-14 07:48:42', '2019-05-14 07:48:42', 'auto_care', NULL),
(84, 'Auto Electronics', 1, '2019-05-14 07:48:42', '2019-05-14 07:48:42', 'auto_electronics', NULL),
(85, 'Auto Glass', 1, '2019-05-14 07:48:42', '2019-05-14 07:48:42', 'auto_glass', NULL),
(86, 'Auto Parts', 1, '2019-05-14 07:48:42', '2019-05-14 07:48:42', 'auto_parts', NULL),
(87, 'Auto Parts & Accessories', 1, '2019-05-14 07:48:42', '2019-05-14 07:48:42', 'auto_parts_&_accessories', NULL),
(88, 'Auto Parts & Spares', 1, '2019-05-14 07:48:42', '2019-05-14 07:48:42', 'auto_parts_&_spares', NULL),
(89, 'Auto Service', 1, '2019-05-14 07:48:42', '2019-05-14 07:48:42', 'auto_service', NULL),
(90, 'Auto Tires', 1, '2019-05-14 07:48:42', '2019-05-14 07:48:42', 'auto_tires', NULL),
(91, 'Auto Tools & Equipment', 1, '2019-05-14 07:48:43', '2019-05-14 07:48:43', 'auto_tools_&_equipment', NULL),
(92, 'Auto Upholstery', 1, '2019-05-14 07:48:43', '2019-05-14 07:48:43', 'auto_upholstery', NULL),
(93, 'Auto Window Tinting', 1, '2019-05-14 07:48:43', '2019-05-14 07:48:43', 'auto_window_tinting', NULL),
(94, 'Automobiles', 1, '2019-05-14 07:48:43', '2019-05-14 07:48:43', 'automobiles', NULL),
(95, 'Automotive', 1, '2019-05-14 07:48:43', '2019-05-14 07:48:43', 'automotive', NULL),
(96, 'Automotive Parts Rebuilder', 1, '2019-05-14 07:48:43', '2019-05-14 07:48:43', 'automotive_parts_rebuilder', NULL),
(97, 'Baby & Toddler Foods', 1, '2019-05-14 07:48:43', '2019-05-14 07:48:43', 'baby_&_toddler_foods', NULL),
(98, 'Baby Accessories', 1, '2019-05-14 07:48:43', '2019-05-14 07:48:43', 'baby_accessories', NULL),
(99, 'Baby Bath', 1, '2019-05-14 07:48:43', '2019-05-14 07:48:43', 'baby_bath', NULL),
(100, 'Baby Care', 1, '2019-05-14 07:48:43', '2019-05-14 07:48:43', 'baby_care', NULL),
(101, 'Baby Clothes', 1, '2019-05-14 07:48:43', '2019-05-14 07:48:43', 'baby_clothes', NULL),
(102, 'Baby Food', 1, '2019-05-14 07:48:43', '2019-05-14 07:48:43', 'baby_food', NULL),
(103, 'Baby Hire Equipment', 1, '2019-05-14 07:48:43', '2019-05-14 07:48:43', 'baby_hire_equipment', NULL),
(104, 'Baby Shoes', 1, '2019-05-14 07:48:43', '2019-05-14 07:48:43', 'baby_shoes', NULL),
(105, 'Baby Supplies & Products', 1, '2019-05-14 07:48:43', '2019-05-14 07:48:43', 'baby_supplies_&_products', NULL),
(106, 'Baby Toys', 1, '2019-05-14 07:48:43', '2019-05-14 07:48:43', 'baby_toys', NULL),
(107, 'Baby Walkers', 1, '2019-05-14 07:48:43', '2019-05-14 07:48:43', 'baby_walkers', NULL),
(108, 'Backpackers Hostel', 1, '2019-05-14 07:48:43', '2019-05-14 07:48:43', 'backpackers_hostel', NULL),
(109, 'Backpacks', 1, '2019-05-14 07:48:43', '2019-05-14 07:48:43', 'backpacks', NULL),
(110, 'Backpacks & Carriers', 1, '2019-05-14 07:48:43', '2019-05-14 07:48:43', 'backpacks_&_carriers', NULL),
(111, 'Badge Holder & Accessories', 1, '2019-05-14 07:48:43', '2019-05-14 07:48:43', 'badge_holder_&_accessories', NULL),
(112, 'Badminton', 1, '2019-05-14 07:48:43', '2019-05-14 07:48:43', 'badminton', NULL),
(113, 'Bag & Luggage Making Materials', 1, '2019-05-14 07:48:43', '2019-05-14 07:48:43', 'bag_&_luggage_making_materials', NULL),
(114, 'Bag Parts & Accessories', 1, '2019-05-14 07:48:43', '2019-05-14 07:48:43', 'bag_parts_&_accessories', NULL),
(115, 'Bagels', 1, '2019-05-14 07:48:43', '2019-05-14 07:48:43', 'bagels', NULL),
(116, 'Bail Bonds', 1, '2019-05-14 07:48:43', '2019-05-14 07:48:43', 'bail_bonds', NULL),
(117, 'Baked Goods', 1, '2019-05-14 07:48:43', '2019-05-14 07:48:43', 'baked_goods', NULL),
(118, 'Bakery', 1, '2019-05-14 07:48:43', '2019-05-14 07:48:43', 'bakery', NULL),
(119, 'Balloons', 1, '2019-05-14 07:48:43', '2019-05-14 07:48:43', 'balloons', NULL),
(120, 'Balustrades & Handrails', 1, '2019-05-14 07:48:43', '2019-05-14 07:48:43', 'balustrades_&_handrails', NULL),
(121, 'Bamboo Furniture', 1, '2019-05-14 07:48:43', '2019-05-14 07:48:43', 'bamboo_furniture', NULL),
(122, 'Bands & Musicians for Hire', 1, '2019-05-14 07:48:43', '2019-05-14 07:48:43', 'bands_&_musicians_for_hire', NULL),
(123, 'Bank', 1, '2019-05-14 07:48:43', '2019-05-14 07:48:43', 'bank', NULL),
(124, 'Banquet Facility', 1, '2019-05-14 07:48:43', '2019-05-14 07:48:43', 'banquet_facility', NULL),
(125, 'Bar', 1, '2019-05-14 07:48:43', '2019-05-14 07:48:43', 'bar', NULL),
(126, 'Bar & Grill Restaurant', 1, '2019-05-14 07:48:43', '2019-05-14 07:48:43', 'bar_&_grill_restaurant', NULL),
(127, 'Barbecue Restaurant', 1, '2019-05-14 07:48:43', '2019-05-14 07:48:43', 'barbecue_restaurant', NULL),
(128, 'Barbed Wire', 1, '2019-05-14 07:48:43', '2019-05-14 07:48:43', 'barbed_wire', NULL),
(129, 'Barbeques & Accessories', 1, '2019-05-14 07:48:43', '2019-05-14 07:48:43', 'barbeques_&_accessories', NULL),
(130, 'Barber Shop', 1, '2019-05-14 07:48:43', '2019-05-14 07:48:43', 'barber_shop', NULL),
(131, 'Bar-B-Q Restaurant', 1, '2019-05-14 07:48:43', '2019-05-14 07:48:43', 'bar-b-q_restaurant', NULL),
(132, 'Barware', 1, '2019-05-14 07:48:43', '2019-05-14 07:48:43', 'barware', NULL),
(133, 'Baseball', 1, '2019-05-14 07:48:43', '2019-05-14 07:48:43', 'baseball', NULL),
(134, 'Basement Remodeler', 1, '2019-05-14 07:48:43', '2019-05-14 07:48:43', 'basement_remodeler', NULL),
(135, 'Basketball', 1, '2019-05-14 07:48:43', '2019-05-14 07:48:43', 'basketball', NULL),
(136, 'Bath & Body', 1, '2019-05-14 07:48:43', '2019-05-14 07:48:43', 'bath_&_body', NULL),
(137, 'Bath Mats', 1, '2019-05-14 07:48:43', '2019-05-14 07:48:43', 'bath_mats', NULL),
(138, 'Bath Supplies', 1, '2019-05-14 07:48:43', '2019-05-14 07:48:43', 'bath_supplies', NULL),
(139, 'Bath Towels', 1, '2019-05-14 07:48:43', '2019-05-14 07:48:43', 'bath_towels', NULL),
(140, 'Bathing Tubs & Seats', 1, '2019-05-14 07:48:43', '2019-05-14 07:48:43', 'bathing_tubs_&_seats', NULL),
(141, 'Bathrobes', 1, '2019-05-14 07:48:43', '2019-05-14 07:48:43', 'bathrobes', NULL),
(142, 'Bathroom', 1, '2019-05-14 07:48:43', '2019-05-14 07:48:43', 'bathroom', NULL),
(143, 'Bathroom Accessories', 1, '2019-05-14 07:48:43', '2019-05-14 07:48:43', 'bathroom_accessories', NULL),
(144, 'Bathroom Design & Renovation', 1, '2019-05-14 07:48:43', '2019-05-14 07:48:43', 'bathroom_design_&_renovation', NULL),
(145, 'Bathroom Products', 1, '2019-05-14 07:48:43', '2019-05-14 07:48:43', 'bathroom_products', NULL),
(146, 'Bathroom Scales', 1, '2019-05-14 07:48:43', '2019-05-14 07:48:43', 'bathroom_scales', NULL),
(147, 'Bathroom shelving', 1, '2019-05-14 07:48:43', '2019-05-14 07:48:43', 'bathroom_shelving', NULL),
(148, 'Bean Products', 1, '2019-05-14 07:48:43', '2019-05-14 07:48:43', 'bean_products', NULL),
(149, 'Beans', 1, '2019-05-14 07:48:43', '2019-05-14 07:48:43', 'beans', NULL),
(150, 'Beautician', 1, '2019-05-14 07:48:43', '2019-05-14 07:48:43', 'beautician', NULL),
(151, 'Beauty Equipment', 1, '2019-05-14 07:48:43', '2019-05-14 07:48:43', 'beauty_equipment', NULL),
(152, 'Beauty Products', 1, '2019-05-14 07:48:43', '2019-05-14 07:48:43', 'beauty_products', NULL),
(153, 'Beauty Salon', 1, '2019-05-14 07:48:43', '2019-05-14 07:48:43', 'beauty_salon', NULL),
(154, 'Beauty School', 1, '2019-05-14 07:48:43', '2019-05-14 07:48:43', 'beauty_school', NULL),
(155, 'Beauty Supplements', 1, '2019-05-14 07:48:43', '2019-05-14 07:48:43', 'beauty_supplements', NULL),
(156, 'Bed & Breakfast', 1, '2019-05-14 07:48:43', '2019-05-14 07:48:43', 'bed_&_breakfast', NULL),
(157, 'Bed & Mattress', 1, '2019-05-14 07:48:43', '2019-05-14 07:48:43', 'bed_&_mattress', NULL),
(158, 'Bed Sheets', 1, '2019-05-14 07:48:43', '2019-05-14 07:48:43', 'bed_sheets', NULL),
(159, 'Bedding Accessories', 1, '2019-05-14 07:48:43', '2019-05-14 07:48:43', 'bedding_accessories', NULL),
(160, 'Bedding Set', 1, '2019-05-14 07:48:43', '2019-05-14 07:48:43', 'bedding_set', NULL),
(161, 'Bedroom', 1, '2019-05-14 07:48:43', '2019-05-14 07:48:43', 'bedroom', NULL),
(162, 'Beer Brewery', 1, '2019-05-14 07:48:43', '2019-05-14 07:48:43', 'beer_brewery', NULL),
(163, 'Belt Accessories', 1, '2019-05-14 07:48:43', '2019-05-14 07:48:43', 'belt_accessories', NULL),
(164, 'Belt Buckles', 1, '2019-05-14 07:48:43', '2019-05-14 07:48:43', 'belt_buckles', NULL),
(165, 'Belt Chains', 1, '2019-05-14 07:48:43', '2019-05-14 07:48:43', 'belt_chains', NULL),
(166, 'Bicycle Rentals', 1, '2019-05-14 07:48:43', '2019-05-14 07:48:43', 'bicycle_rentals', NULL),
(167, 'Bike Lights & Reflectors', 1, '2019-05-14 07:48:43', '2019-05-14 07:48:43', 'bike_lights_&_reflectors', NULL),
(168, 'Bike Shop', 1, '2019-05-14 07:48:43', '2019-05-14 07:48:43', 'bike_shop', NULL),
(169, 'Bikes', 1, '2019-05-14 07:48:43', '2019-05-14 07:48:43', 'bikes', NULL),
(170, 'Billets', 1, '2019-05-14 07:48:43', '2019-05-14 07:48:43', 'billets', NULL),
(171, 'Biodiesel', 1, '2019-05-14 07:48:43', '2019-05-14 07:48:43', 'biodiesel', NULL),
(172, 'Biogas', 1, '2019-05-14 07:48:43', '2019-05-14 07:48:43', 'biogas', NULL),
(173, 'Biscuit', 1, '2019-05-14 07:48:43', '2019-05-14 07:48:43', 'biscuit', NULL),
(174, 'Bitumen', 1, '2019-05-14 07:48:43', '2019-05-14 07:48:43', 'bitumen', NULL),
(175, 'Blankets & Throws', 1, '2019-05-14 07:48:43', '2019-05-14 07:48:43', 'blankets_&_throws', NULL),
(176, 'Blender,Mixer & Grinder', 1, '2019-05-14 07:48:43', '2019-05-14 07:48:43', 'blender,mixer_&_grinder', NULL),
(177, 'Blenders', 1, '2019-05-14 07:48:43', '2019-05-14 07:48:43', 'blenders', NULL),
(178, 'Blister Cards', 1, '2019-05-14 07:48:43', '2019-05-14 07:48:43', 'blister_cards', NULL),
(179, 'Blouses & Shirts', 1, '2019-05-14 07:48:43', '2019-05-14 07:48:43', 'blouses_&_shirts', NULL),
(180, 'Blu-Ray/DVD Players', 1, '2019-05-14 07:48:43', '2019-05-14 07:48:43', 'blu-ray/dvd_players', NULL),
(181, 'Board', 1, '2019-05-14 07:48:43', '2019-05-14 07:48:43', 'board', NULL),
(182, 'Board Eraser', 1, '2019-05-14 07:48:43', '2019-05-14 07:48:43', 'board_eraser', NULL),
(183, 'Boards', 1, '2019-05-14 07:48:43', '2019-05-14 07:48:43', 'boards', NULL),
(184, 'Boat Builder', 1, '2019-05-14 07:48:43', '2019-05-14 07:48:43', 'boat_builder', NULL),
(185, 'Boat Hire & Charter', 1, '2019-05-14 07:48:43', '2019-05-14 07:48:43', 'boat_hire_&_charter', NULL),
(186, 'Boat Operation Instructor', 1, '2019-05-14 07:48:43', '2019-05-14 07:48:43', 'boat_operation_instructor', NULL),
(187, 'Boat Service & Maintenance', 1, '2019-05-14 07:48:43', '2019-05-14 07:48:43', 'boat_service_&_maintenance', NULL),
(188, 'Boat Services', 1, '2019-05-14 07:48:43', '2019-05-14 07:48:43', 'boat_services', NULL),
(189, 'Boat Share & Syndicate', 1, '2019-05-14 07:48:43', '2019-05-14 07:48:43', 'boat_share_&_syndicate', NULL),
(190, 'Boat Storage', 1, '2019-05-14 07:48:43', '2019-05-14 07:48:43', 'boat_storage', NULL),
(191, 'Boat Tours', 1, '2019-05-14 07:48:43', '2019-05-14 07:48:43', 'boat_tours', NULL),
(192, 'Boat Trailer Sales', 1, '2019-05-14 07:48:43', '2019-05-14 07:48:43', 'boat_trailer_sales', NULL),
(193, 'Boating Supplies', 1, '2019-05-14 07:48:43', '2019-05-14 07:48:43', 'boating_supplies', NULL),
(194, 'Body & Massage Oils', 1, '2019-05-14 07:48:43', '2019-05-14 07:48:43', 'body_&_massage_oils', NULL),
(195, 'Body Art', 1, '2019-05-14 07:48:43', '2019-05-14 07:48:43', 'body_art', NULL),
(196, 'Body Fluid-Processing & Circulation Devices', 1, '2019-05-14 07:48:43', '2019-05-14 07:48:43', 'body_fluid-processing_&_circulation_devices', NULL),
(197, 'Body Jewelry', 1, '2019-05-14 07:48:43', '2019-05-14 07:48:43', 'body_jewelry', NULL),
(198, 'Body Soaps & Shower Gels', 1, '2019-05-14 07:48:43', '2019-05-14 07:48:43', 'body_soaps_&_shower_gels', NULL),
(199, 'Body Weight', 1, '2019-05-14 07:48:43', '2019-05-14 07:48:43', 'body_weight', NULL),
(200, 'Book Cover', 1, '2019-05-14 07:48:43', '2019-05-14 07:48:43', 'book_cover', NULL),
(201, 'Book Packager', 1, '2019-05-14 07:48:43', '2019-05-14 07:48:43', 'book_packager', NULL),
(202, 'Book Shop', 1, '2019-05-14 07:48:43', '2019-05-14 07:48:43', 'book_shop', NULL),
(203, 'Bookkeeping', 1, '2019-05-14 07:48:43', '2019-05-14 07:48:43', 'bookkeeping', NULL),
(204, 'Botox Clinic', 1, '2019-05-14 07:48:43', '2019-05-14 07:48:43', 'botox_clinic', NULL),
(205, 'Bottles', 1, '2019-05-14 07:48:43', '2019-05-14 07:48:43', 'bottles', NULL),
(206, 'Boudoir Photography', 1, '2019-05-14 07:48:43', '2019-05-14 07:48:43', 'boudoir_photography', NULL),
(207, 'Bowling Alley', 1, '2019-05-14 07:48:43', '2019-05-14 07:48:43', 'bowling_alley', NULL),
(208, 'Boys\' Clothing', 1, '2019-05-14 07:48:43', '2019-05-14 07:48:43', 'boys\'_clothing', NULL),
(209, 'Boy\'s Clothing', 1, '2019-05-14 07:48:43', '2019-05-14 07:48:43', 'boy\'s_clothing', NULL),
(210, 'Bracelets & Bangles', 1, '2019-05-14 07:48:43', '2019-05-14 07:48:43', 'bracelets_&_bangles', NULL),
(211, 'Brakes', 1, '2019-05-14 07:48:43', '2019-05-14 07:48:43', 'brakes', NULL),
(212, 'Brand Ambassado', 1, '2019-05-14 07:48:43', '2019-05-14 07:48:43', 'brand_ambassado', NULL),
(213, 'Brand Photographer', 1, '2019-05-14 07:48:43', '2019-05-14 07:48:43', 'brand_photographer', NULL),
(214, 'Bras', 1, '2019-05-14 07:48:43', '2019-05-14 07:48:43', 'bras', NULL),
(215, 'Brazilian Restaurant', 1, '2019-05-14 07:48:43', '2019-05-14 07:48:43', 'brazilian_restaurant', NULL),
(216, 'Breakfast Cereals', 1, '2019-05-14 07:48:43', '2019-05-14 07:48:43', 'breakfast_cereals', NULL),
(217, 'Breast Care', 1, '2019-05-14 07:48:43', '2019-05-14 07:48:43', 'breast_care', NULL),
(218, 'Bridal & Weddings', 1, '2019-05-14 07:48:43', '2019-05-14 07:48:43', 'bridal_&_weddings', NULL),
(219, 'Bridal Show Promotions', 1, '2019-05-14 07:48:43', '2019-05-14 07:48:43', 'bridal_show_promotions', NULL),
(220, 'Briefcases', 1, '2019-05-14 07:48:43', '2019-05-14 07:48:43', 'briefcases', NULL),
(221, 'Briefs', 1, '2019-05-14 07:48:43', '2019-05-14 07:48:43', 'briefs', NULL),
(222, 'British Restaurant', 1, '2019-05-14 07:48:43', '2019-05-14 07:48:43', 'british_restaurant', NULL),
(223, 'Brooms, Mops & Sweepers', 1, '2019-05-14 07:48:43', '2019-05-14 07:48:43', 'brooms,_mops_&_sweepers', NULL),
(224, 'Brothel', 1, '2019-05-14 07:48:43', '2019-05-14 07:48:43', 'brothel', NULL),
(225, 'Brushes & Sets', 1, '2019-05-14 07:48:43', '2019-05-14 07:48:43', 'brushes_&_sets', NULL),
(226, 'Brushes , Sponges & Wipers', 1, '2019-05-14 07:48:43', '2019-05-14 07:48:43', 'brushes_,_sponges_&_wipers', NULL),
(227, 'Buffet Restaurant', 1, '2019-05-14 07:48:43', '2019-05-14 07:48:43', 'buffet_restaurant', NULL),
(228, 'Building Glass', 1, '2019-05-14 07:48:43', '2019-05-14 07:48:43', 'building_glass', NULL),
(229, 'Building Material Machinery', 1, '2019-05-14 07:48:43', '2019-05-14 07:48:43', 'building_material_machinery', NULL),
(230, 'Building Materials', 1, '2019-05-14 07:48:43', '2019-05-14 07:48:43', 'building_materials', NULL),
(231, 'Building Reports & Inspections', 1, '2019-05-14 07:48:43', '2019-05-14 07:48:43', 'building_reports_&_inspections', NULL),
(232, 'Building Supplies', 1, '2019-05-14 07:48:43', '2019-05-14 07:48:43', 'building_supplies', NULL),
(233, 'Bullet Proof Vest', 1, '2019-05-14 07:48:43', '2019-05-14 07:48:43', 'bullet_proof_vest', NULL),
(234, 'Burger Restaurant', 1, '2019-05-14 07:48:43', '2019-05-14 07:48:43', 'burger_restaurant', NULL),
(235, 'Bus', 1, '2019-05-14 07:48:43', '2019-05-14 07:48:43', 'bus', NULL),
(236, 'Bus Parts & Accessories', 1, '2019-05-14 07:48:43', '2019-05-14 07:48:43', 'bus_parts_&_accessories', NULL),
(237, 'Business & Technology Park', 1, '2019-05-14 07:48:43', '2019-05-14 07:48:43', 'business_&_technology_park', NULL),
(238, 'Business Associations', 1, '2019-05-14 07:48:43', '2019-05-14 07:48:43', 'business_associations', NULL),
(239, 'Business Bags & Cases', 1, '2019-05-14 07:48:43', '2019-05-14 07:48:43', 'business_bags_&_cases', NULL),
(240, 'Business Broker', 1, '2019-05-14 07:48:43', '2019-05-14 07:48:43', 'business_broker', NULL),
(241, 'Business Plan Writer', 1, '2019-05-14 07:48:43', '2019-05-14 07:48:43', 'business_plan_writer', NULL),
(242, 'Butcher', 1, '2019-05-14 07:48:43', '2019-05-14 07:48:43', 'butcher', NULL),
(243, 'Cabinet Maker', 1, '2019-05-14 07:48:43', '2019-05-14 07:48:43', 'cabinet_maker', NULL),
(244, 'Cables', 1, '2019-05-14 07:48:43', '2019-05-14 07:48:43', 'cables', NULL),
(245, 'Cables & Converters', 1, '2019-05-14 07:48:43', '2019-05-14 07:48:43', 'cables_&_converters', NULL),
(246, 'Cafe', 1, '2019-05-14 07:48:43', '2019-05-14 07:48:43', 'cafe', NULL),
(247, 'Cake Making', 1, '2019-05-14 07:48:43', '2019-05-14 07:48:43', 'cake_making', NULL),
(248, 'Cake Shop', 1, '2019-05-14 07:48:43', '2019-05-14 07:48:43', 'cake_shop', NULL),
(249, 'Calculator', 1, '2019-05-14 07:48:43', '2019-05-14 07:48:43', 'calculator', NULL),
(250, 'Calendar', 1, '2019-05-14 07:48:43', '2019-05-14 07:48:43', 'calendar', NULL),
(251, 'Call Centre Services', 1, '2019-05-14 07:48:43', '2019-05-14 07:48:43', 'call_centre_services', NULL),
(252, 'Caller ID Boxes', 1, '2019-05-14 07:48:43', '2019-05-14 07:48:43', 'caller_id_boxes', NULL),
(253, 'Camera Cases,Covers and …', 1, '2019-05-14 07:48:43', '2019-05-14 07:48:43', 'camera_cases,covers_and_…', NULL),
(254, 'Camera Shop', 1, '2019-05-14 07:48:43', '2019-05-14 07:48:43', 'camera_shop', NULL),
(255, 'Camera, Photo & Accessories', 1, '2019-05-14 07:48:43', '2019-05-14 07:48:43', 'camera,_photo_&_accessories', NULL),
(256, 'Camisoles & Slips', 1, '2019-05-14 07:48:43', '2019-05-14 07:48:43', 'camisoles_&_slips', NULL),
(257, 'Camping & Outdoor Equipment', 1, '2019-05-14 07:48:43', '2019-05-14 07:48:43', 'camping_&_outdoor_equipment', NULL),
(258, 'Candle Maker', 1, '2019-05-14 07:48:43', '2019-05-14 07:48:43', 'candle_maker', NULL),
(259, 'Candles & Candleholders', 1, '2019-05-14 07:48:43', '2019-05-14 07:48:43', 'candles_&_candleholders', NULL),
(260, 'Candy Maker', 1, '2019-05-14 07:48:43', '2019-05-14 07:48:43', 'candy_maker', NULL),
(261, 'Candy Toys', 1, '2019-05-14 07:48:43', '2019-05-14 07:48:43', 'candy_toys', NULL),
(262, 'Canoe Livery', 1, '2019-05-14 07:48:43', '2019-05-14 07:48:43', 'canoe_livery', NULL),
(263, 'Cans', 1, '2019-05-14 07:48:43', '2019-05-14 07:48:43', 'cans', NULL),
(264, 'Car Audio & Stereo', 1, '2019-05-14 07:48:43', '2019-05-14 07:48:43', 'car_audio_&_stereo', NULL),
(265, 'Car Customisation Services', 1, '2019-05-14 07:48:43', '2019-05-14 07:48:43', 'car_customisation_services', NULL),
(266, 'Car Rental', 1, '2019-05-14 07:48:43', '2019-05-14 07:48:43', 'car_rental', NULL),
(267, 'Car Seats', 1, '2019-05-14 07:48:43', '2019-05-14 07:48:43', 'car_seats', NULL),
(268, 'Car Stereo Receivers', 1, '2019-05-14 07:48:43', '2019-05-14 07:48:43', 'car_stereo_receivers', NULL),
(269, 'Car Towing & Transport Service', 1, '2019-05-14 07:48:43', '2019-05-14 07:48:43', 'car_towing_&_transport_service', NULL),
(270, 'Car Video', 1, '2019-05-14 07:48:43', '2019-05-14 07:48:43', 'car_video', NULL),
(271, 'Car Windows & Glass', 1, '2019-05-14 07:48:43', '2019-05-14 07:48:43', 'car_windows_&_glass', NULL),
(272, 'Carbon', 1, '2019-05-14 07:48:43', '2019-05-14 07:48:43', 'carbon', NULL),
(273, 'Carbon Fiber', 1, '2019-05-14 07:48:43', '2019-05-14 07:48:43', 'carbon_fiber', NULL),
(274, 'Cardio Equipment', 1, '2019-05-14 07:48:43', '2019-05-14 07:48:43', 'cardio_equipment', NULL),
(275, 'Career Counselor', 1, '2019-05-14 07:48:43', '2019-05-14 07:48:43', 'career_counselor', NULL),
(276, 'Cargo', 1, '2019-05-14 07:48:43', '2019-05-14 07:48:43', 'cargo', NULL),
(277, 'Cargo & Storage Equipment', 1, '2019-05-14 07:48:43', '2019-05-14 07:48:43', 'cargo_&_storage_equipment', NULL),
(278, 'Carpenter', 1, '2019-05-14 07:48:43', '2019-05-14 07:48:43', 'carpenter', NULL),
(279, 'Carpet & Upholstery Cleaning', 1, '2019-05-14 07:48:43', '2019-05-14 07:48:43', 'carpet_&_upholstery_cleaning', NULL),
(280, 'Carpet Installation', 1, '2019-05-14 07:48:43', '2019-05-14 07:48:43', 'carpet_installation', NULL),
(281, 'Carpet/Upholstery Cleaning', 1, '2019-05-14 07:48:43', '2019-05-14 07:48:43', 'carpet/upholstery_cleaning', NULL),
(282, 'Carry-on Luggage', 1, '2019-05-14 07:48:43', '2019-05-14 07:48:43', 'carry-on_luggage', NULL),
(283, 'Cast & Forged', 1, '2019-05-14 07:48:43', '2019-05-14 07:48:43', 'cast_&_forged', NULL),
(284, 'Casual Shirts', 1, '2019-05-14 07:48:43', '2019-05-14 07:48:43', 'casual_shirts', NULL),
(285, 'Cataloging Art Collections', 1, '2019-05-14 07:48:43', '2019-05-14 07:48:43', 'cataloging_art_collections', NULL),
(286, 'Caterer & Catering', 1, '2019-05-14 07:48:43', '2019-05-14 07:48:43', 'caterer_&_catering', NULL),
(287, 'Catering & Hospitality', 1, '2019-05-14 07:48:43', '2019-05-14 07:48:43', 'catering_&_hospitality', NULL),
(288, 'Catering Equipment', 1, '2019-05-14 07:48:43', '2019-05-14 07:48:43', 'catering_equipment', NULL),
(289, 'Catering Equipment Hire', 1, '2019-05-14 07:48:43', '2019-05-14 07:48:43', 'catering_equipment_hire', NULL),
(290, 'CCTV Camera', 1, '2019-05-14 07:48:43', '2019-05-14 07:48:43', 'cctv_camera', NULL),
(291, 'CCTV Products', 1, '2019-05-14 07:48:43', '2019-05-14 07:48:43', 'cctv_products', NULL),
(292, 'Ceilings', 1, '2019-05-14 07:48:43', '2019-05-14 07:48:43', 'ceilings', NULL),
(293, 'Cell Phones & Accessories', 1, '2019-05-14 07:48:43', '2019-05-14 07:48:43', 'cell_phones_&_accessories', NULL),
(294, 'Cemented Carbid', 1, '2019-05-14 07:48:43', '2019-05-14 07:48:43', 'cemented_carbid', NULL),
(295, 'Center for Professional Development', 1, '2019-05-14 07:48:43', '2019-05-14 07:48:43', 'center_for_professional_development', NULL),
(296, 'Ceramic Fiber Products', 1, '2019-05-14 07:48:43', '2019-05-14 07:48:43', 'ceramic_fiber_products', NULL),
(297, 'Ceramics', 1, '2019-05-14 07:48:43', '2019-05-14 07:48:43', 'ceramics', NULL),
(298, 'Chair Cover', 1, '2019-05-14 07:48:43', '2019-05-14 07:48:43', 'chair_cover', NULL),
(299, 'Chandeliers & Pendant Lights', 1, '2019-05-14 07:48:43', '2019-05-14 07:48:43', 'chandeliers_&_pendant_lights', NULL),
(300, 'Charcoal', 1, '2019-05-14 07:48:43', '2019-05-14 07:48:43', 'charcoal', NULL),
(301, 'Charger', 1, '2019-05-14 07:48:43', '2019-05-14 07:48:43', 'charger', NULL),
(302, 'Charitable Organisation', 1, '2019-05-14 07:48:43', '2019-05-14 07:48:43', 'charitable_organisation', NULL),
(303, 'Charity Shop', 1, '2019-05-14 07:48:43', '2019-05-14 07:48:43', 'charity_shop', NULL),
(304, 'Check Cashing Service', 1, '2019-05-14 07:48:43', '2019-05-14 07:48:43', 'check_cashing_service', NULL),
(305, 'Chef for Hire', 1, '2019-05-14 07:48:43', '2019-05-14 07:48:43', 'chef_for_hire', NULL),
(306, 'Chemical Machinery & Equipment', 1, '2019-05-14 07:48:43', '2019-05-14 07:48:43', 'chemical_machinery_&_equipment', NULL),
(307, 'Chemical Packaging', 1, '2019-05-14 07:48:43', '2019-05-14 07:48:43', 'chemical_packaging', NULL),
(308, 'Chemist', 1, '2019-05-14 07:48:43', '2019-05-14 07:48:43', 'chemist', NULL),
(309, 'Cheque Cashing', 1, '2019-05-14 07:48:43', '2019-05-14 07:48:43', 'cheque_cashing', NULL),
(310, 'Chest & Back Protectors', 1, '2019-05-14 07:48:43', '2019-05-14 07:48:43', 'chest_&_back_protectors', NULL),
(311, 'Chicken & Poultry', 1, '2019-05-14 07:48:43', '2019-05-14 07:48:43', 'chicken_&_poultry', NULL),
(312, 'Child Care Centre', 1, '2019-05-14 07:48:43', '2019-05-14 07:48:43', 'child_care_centre', NULL),
(313, 'Child Development Center', 1, '2019-05-14 07:48:43', '2019-05-14 07:48:43', 'child_development_center', NULL),
(314, 'Childproofing Expert', 1, '2019-05-14 07:48:43', '2019-05-14 07:48:43', 'childproofing_expert', NULL),
(315, 'Children Furniture', 1, '2019-05-14 07:48:43', '2019-05-14 07:48:43', 'children_furniture', NULL),
(316, 'Children\'s Shoes', 1, '2019-05-14 07:48:43', '2019-05-14 07:48:43', 'children\'s_shoes', NULL),
(317, 'Chimney Sweep', 1, '2019-05-14 07:48:43', '2019-05-14 07:48:43', 'chimney_sweep', NULL),
(318, 'Chinese Restaurant', 1, '2019-05-14 07:48:43', '2019-05-14 07:48:43', 'chinese_restaurant', NULL),
(319, 'Chocolate', 1, '2019-05-14 07:48:43', '2019-05-14 07:48:43', 'chocolate', NULL),
(320, 'Cigar Shop', 1, '2019-05-14 07:48:43', '2019-05-14 07:48:43', 'cigar_shop', NULL),
(321, 'Circuit Breakers', 1, '2019-05-14 07:48:43', '2019-05-14 07:48:43', 'circuit_breakers', NULL),
(322, 'Civil Engineer', 1, '2019-05-14 07:48:43', '2019-05-14 07:48:43', 'civil_engineer', NULL),
(323, 'Classic Toys', 1, '2019-05-14 07:48:43', '2019-05-14 07:48:43', 'classic_toys', NULL),
(324, 'Cleaning', 1, '2019-05-14 07:48:43', '2019-05-14 07:48:43', 'cleaning', NULL),
(325, 'Cleaning Appliances', 1, '2019-05-14 07:48:43', '2019-05-14 07:48:43', 'cleaning_appliances', NULL),
(326, 'Cleaning Supplies', 1, '2019-05-14 07:48:43', '2019-05-14 07:48:43', 'cleaning_supplies', NULL),
(327, 'Clinical Analytical Instruments', 1, '2019-05-14 07:48:43', '2019-05-14 07:48:43', 'clinical_analytical_instruments', NULL),
(328, 'Clipboard', 1, '2019-05-14 07:48:43', '2019-05-14 07:48:43', 'clipboard', NULL),
(329, 'Clocks', 1, '2019-05-14 07:48:43', '2019-05-14 07:48:43', 'clocks', NULL),
(330, 'Cloth Diapers & Accessories', 1, '2019-05-14 07:48:43', '2019-05-14 07:48:43', 'cloth_diapers_&_accessories', NULL),
(331, 'Clothes', 1, '2019-05-14 07:48:43', '2019-05-14 07:48:43', 'clothes', NULL),
(332, 'Clothes Line & Drying Racks', 1, '2019-05-14 07:48:43', '2019-05-14 07:48:43', 'clothes_line_&_drying_racks', NULL),
(333, 'Clothing Alterations', 1, '2019-05-14 07:48:43', '2019-05-14 07:48:43', 'clothing_alterations', NULL),
(334, 'Clothing Boutique', 1, '2019-05-14 07:48:43', '2019-05-14 07:48:43', 'clothing_boutique', NULL),
(335, 'Clothing Line', 1, '2019-05-14 07:48:43', '2019-05-14 07:48:43', 'clothing_line', NULL),
(336, 'Clothing Store', 1, '2019-05-14 07:48:43', '2019-05-14 07:48:43', 'clothing_store', NULL),
(337, 'Club', 1, '2019-05-14 07:48:43', '2019-05-14 07:48:43', 'club', NULL),
(338, 'Clutches', 1, '2019-05-14 07:48:43', '2019-05-14 07:48:43', 'clutches', NULL),
(339, 'Coal', 1, '2019-05-14 07:48:43', '2019-05-14 07:48:43', 'coal', NULL),
(340, 'Coal Gas', 1, '2019-05-14 07:48:43', '2019-05-14 07:48:43', 'coal_gas', NULL),
(341, 'Coating Services', 1, '2019-05-14 07:48:43', '2019-05-14 07:48:43', 'coating_services', NULL),
(342, 'Cocoa Beans', 1, '2019-05-14 07:48:43', '2019-05-14 07:48:43', 'cocoa_beans', NULL),
(343, 'Coffee & Tea', 1, '2019-05-14 07:48:43', '2019-05-14 07:48:43', 'coffee_&_tea', NULL),
(344, 'Coffee Bar/Tea Salon', 1, '2019-05-14 07:48:43', '2019-05-14 07:48:43', 'coffee_bar/tea_salon', NULL),
(345, 'Coffee Beans', 1, '2019-05-14 07:48:43', '2019-05-14 07:48:43', 'coffee_beans', NULL),
(346, 'Coffee Cart Operator', 1, '2019-05-14 07:48:43', '2019-05-14 07:48:43', 'coffee_cart_operator', NULL),
(347, 'Coffee Equipment', 1, '2019-05-14 07:48:43', '2019-05-14 07:48:43', 'coffee_equipment', NULL),
(348, 'Coffee Makers', 1, '2019-05-14 07:48:43', '2019-05-14 07:48:43', 'coffee_makers', NULL),
(349, 'Coffee Shop', 1, '2019-05-14 07:48:43', '2019-05-14 07:48:43', 'coffee_shop', NULL),
(350, 'Coin-Operated Laundry', 1, '2019-05-14 07:48:43', '2019-05-14 07:48:43', 'coin-operated_laundry', NULL),
(351, 'Coke Fuel', 1, '2019-05-14 07:48:43', '2019-05-14 07:48:43', 'coke_fuel', NULL),
(352, 'Collectibles Trading', 1, '2019-05-14 07:48:43', '2019-05-14 07:48:43', 'collectibles_trading', NULL),
(353, 'Collection Agency', 1, '2019-05-14 07:48:43', '2019-05-14 07:48:43', 'collection_agency', NULL),
(354, 'College Essay Editor', 1, '2019-05-14 07:48:43', '2019-05-14 07:48:43', 'college_essay_editor', NULL),
(355, 'Comforters,Quilts & Duvets', 1, '2019-05-14 07:48:43', '2019-05-14 07:48:43', 'comforters,quilts_&_duvets', NULL),
(356, 'Comic Book Store', 1, '2019-05-14 07:48:43', '2019-05-14 07:48:43', 'comic_book_store', NULL),
(357, 'Commercial Appliances', 1, '2019-05-14 07:48:43', '2019-05-14 07:48:43', 'commercial_appliances', NULL),
(358, 'Commercial Builder', 1, '2019-05-14 07:48:43', '2019-05-14 07:48:43', 'commercial_builder', NULL),
(359, 'Commercial Cleaning Services', 1, '2019-05-14 07:48:43', '2019-05-14 07:48:43', 'commercial_cleaning_services', NULL),
(360, 'Commercial Furniture', 1, '2019-05-14 07:48:43', '2019-05-14 07:48:43', 'commercial_furniture', NULL),
(361, 'Commercial Laundry Equipment', 1, '2019-05-14 07:48:43', '2019-05-14 07:48:43', 'commercial_laundry_equipment', NULL),
(362, 'Commercial Real Estate Broker', 1, '2019-05-14 07:48:43', '2019-05-14 07:48:43', 'commercial_real_estate_broker', NULL),
(363, 'Commercial Real Estate...', 1, '2019-05-14 07:48:43', '2019-05-14 07:48:43', 'commercial_real_estate...', NULL),
(364, 'Communication Cables', 1, '2019-05-14 07:48:43', '2019-05-14 07:48:43', 'communication_cables', NULL),
(365, 'Communication Equipment', 1, '2019-05-14 07:48:43', '2019-05-14 07:48:43', 'communication_equipment', NULL),
(366, 'Communication Equipment & Services', 1, '2019-05-14 07:48:43', '2019-05-14 07:48:43', 'communication_equipment_&_services', NULL),
(367, 'Composite Packaging', 1, '2019-05-14 07:48:43', '2019-05-14 07:48:43', 'composite_packaging', NULL),
(368, 'Composting', 1, '2019-05-14 07:48:43', '2019-05-14 07:48:43', 'composting', NULL),
(369, 'Computer & IT Support Services', 1, '2019-05-14 07:48:43', '2019-05-14 07:48:43', 'computer_&_it_support_services', NULL),
(370, 'Computer Hardware', 1, '2019-05-14 07:48:43', '2019-05-14 07:48:43', 'computer_hardware', NULL),
(371, 'Computer Hardware & Software', 1, '2019-05-14 07:48:43', '2019-05-14 07:48:43', 'computer_hardware_&_software', NULL),
(372, 'Computer Software', 1, '2019-05-14 07:48:43', '2019-05-14 07:48:43', 'computer_software', NULL),
(373, 'Computer Trainer', 1, '2019-05-14 07:48:43', '2019-05-14 07:48:43', 'computer_trainer', NULL),
(374, 'Computer Training', 1, '2019-05-14 07:48:43', '2019-05-14 07:48:43', 'computer_training', NULL),
(375, 'Computers & Accessories', 1, '2019-05-14 07:48:43', '2019-05-14 07:48:43', 'computers_&_accessories', NULL),
(376, 'Computers: Hardware', 1, '2019-05-14 07:48:43', '2019-05-14 07:48:43', 'computers:_hardware', NULL),
(377, 'Concert Promoter', 1, '2019-05-14 07:48:43', '2019-05-14 07:48:43', 'concert_promoter', NULL),
(378, 'Concrete Equipment', 1, '2019-05-14 07:48:43', '2019-05-14 07:48:43', 'concrete_equipment', NULL),
(379, 'Concrete Pumping', 1, '2019-05-14 07:48:43', '2019-05-14 07:48:43', 'concrete_pumping', NULL),
(380, 'Concreting Services', 1, '2019-05-14 07:48:43', '2019-05-14 07:48:43', 'concreting_services', NULL),
(381, 'Condiment Dressing', 1, '2019-05-14 07:48:43', '2019-05-14 07:48:43', 'condiment_dressing', NULL),
(382, 'Condoms', 1, '2019-05-14 07:48:43', '2019-05-14 07:48:43', 'condoms', NULL),
(383, 'Conference Marketing Manager', 1, '2019-05-14 07:48:43', '2019-05-14 07:48:43', 'conference_marketing_manager', NULL),
(384, 'Connectors & Terminals', 1, '2019-05-14 07:48:43', '2019-05-14 07:48:43', 'connectors_&_terminals', NULL),
(385, 'Consoles & Organizers', 1, '2019-05-14 07:48:43', '2019-05-14 07:48:43', 'consoles_&_organizers', NULL),
(386, 'Construction Cleanup', 1, '2019-05-14 07:48:43', '2019-05-14 07:48:43', 'construction_cleanup', NULL),
(387, 'Construction Delivery', 1, '2019-05-14 07:48:43', '2019-05-14 07:48:43', 'construction_delivery', NULL),
(388, 'Construction Specialties', 1, '2019-05-14 07:48:43', '2019-05-14 07:48:43', 'construction_specialties', NULL),
(389, 'Construction Tools', 1, '2019-05-14 07:48:43', '2019-05-14 07:48:43', 'construction_tools', NULL),
(390, 'Contactors', 1, '2019-05-14 07:48:43', '2019-05-14 07:48:43', 'contactors', NULL),
(391, 'Containers', 1, '2019-05-14 07:48:43', '2019-05-14 07:48:43', 'containers', NULL),
(392, 'Content Marketing', 1, '2019-05-14 07:48:43', '2019-05-14 07:48:43', 'content_marketing', NULL),
(393, 'Content Marketing Strategist', 1, '2019-05-14 07:48:43', '2019-05-14 07:48:43', 'content_marketing_strategist', NULL),
(394, 'Conveinence Store', 1, '2019-05-14 07:48:43', '2019-05-14 07:48:43', 'conveinence_store', NULL),
(395, 'Convenience Store', 1, '2019-05-14 07:48:43', '2019-05-14 07:48:43', 'convenience_store', NULL),
(396, 'Conveying Systems', 1, '2019-05-14 07:48:43', '2019-05-14 07:48:43', 'conveying_systems', NULL),
(397, 'Cookie Business', 1, '2019-05-14 07:48:43', '2019-05-14 07:48:43', 'cookie_business', NULL),
(398, 'Cookie Shop', 1, '2019-05-14 07:48:43', '2019-05-14 07:48:43', 'cookie_shop', NULL),
(399, 'Cooking Appliances', 1, '2019-05-14 07:48:43', '2019-05-14 07:48:43', 'cooking_appliances', NULL),
(400, 'Cooking Ingredients', 1, '2019-05-14 07:48:43', '2019-05-14 07:48:43', 'cooking_ingredients', NULL),
(401, 'Cooking Tools', 1, '2019-05-14 07:48:43', '2019-05-14 07:48:43', 'cooking_tools', NULL),
(402, 'Cooktop & Range', 1, '2019-05-14 07:48:43', '2019-05-14 07:48:43', 'cooktop_&_range', NULL),
(403, 'Copper', 1, '2019-05-14 07:48:43', '2019-05-14 07:48:43', 'copper', NULL),
(404, 'Copper Forged', 1, '2019-05-14 07:48:43', '2019-05-14 07:48:43', 'copper_forged', NULL),
(405, 'Copying & Duplicating Service', 1, '2019-05-14 07:48:43', '2019-05-14 07:48:43', 'copying_&_duplicating_service', NULL),
(406, 'Copywriting Services', 1, '2019-05-14 07:48:43', '2019-05-14 07:48:43', 'copywriting_services', NULL),
(407, 'Corded Telephones', 1, '2019-05-14 07:48:43', '2019-05-14 07:48:43', 'corded_telephones', NULL),
(408, 'Cordless Telephones', 1, '2019-05-14 07:48:43', '2019-05-14 07:48:43', 'cordless_telephones', NULL),
(409, 'Corner Guards', 1, '2019-05-14 07:48:43', '2019-05-14 07:48:43', 'corner_guards', NULL),
(410, 'Corporate Clothing', 1, '2019-05-14 07:48:43', '2019-05-14 07:48:43', 'corporate_clothing', NULL),
(411, 'Corporate Insurance Broker', 1, '2019-05-14 07:48:43', '2019-05-14 07:48:43', 'corporate_insurance_broker', NULL),
(412, 'Corporate Retreat Coordinator', 1, '2019-05-14 07:48:43', '2019-05-14 07:48:43', 'corporate_retreat_coordinator', NULL),
(413, 'Correction Supplies', 1, '2019-05-14 07:48:43', '2019-05-14 07:48:43', 'correction_supplies', NULL),
(414, 'Cosmetic Bags & Cases', 1, '2019-05-14 07:48:43', '2019-05-14 07:48:43', 'cosmetic_bags_&_cases', NULL),
(415, 'Cosmetic Dentist', 1, '2019-05-14 07:48:43', '2019-05-14 07:48:43', 'cosmetic_dentist', NULL),
(416, 'Cosmetic Sales', 1, '2019-05-14 07:48:43', '2019-05-14 07:48:43', 'cosmetic_sales', NULL),
(417, 'Cosmetic Surgery', 1, '2019-05-14 07:48:43', '2019-05-14 07:48:43', 'cosmetic_surgery', NULL),
(418, 'Cosmetics', 1, '2019-05-14 07:48:43', '2019-05-14 07:48:43', 'cosmetics', NULL),
(419, 'Costume Hire', 1, '2019-05-14 07:48:43', '2019-05-14 07:48:43', 'costume_hire', NULL),
(420, 'Costumes', 1, '2019-05-14 07:48:43', '2019-05-14 07:48:43', 'costumes', NULL),
(421, 'Counseling', 1, '2019-05-14 07:48:43', '2019-05-14 07:48:43', 'counseling', NULL),
(422, 'Countertops,Vanity Tops & Table Tops', 1, '2019-05-14 07:48:43', '2019-05-14 07:48:43', 'countertops,vanity_tops_&_table_tops', NULL),
(423, 'Courier', 1, '2019-05-14 07:48:43', '2019-05-14 07:48:43', 'courier', NULL),
(424, 'Couriers', 1, '2019-05-14 07:48:43', '2019-05-14 07:48:43', 'couriers', NULL),
(425, 'Cover Letter and Resume Writer', 1, '2019-05-14 07:48:43', '2019-05-14 07:48:43', 'cover_letter_and_resume_writer', NULL),
(426, 'Craft Beer Pub', 1, '2019-05-14 07:48:43', '2019-05-14 07:48:43', 'craft_beer_pub', NULL),
(427, 'Craft Business', 1, '2019-05-14 07:48:43', '2019-05-14 07:48:43', 'craft_business', NULL),
(428, 'Crafts', 1, '2019-05-14 07:48:43', '2019-05-14 07:48:43', 'crafts', NULL),
(429, 'Crane Hire', 1, '2019-05-14 07:48:43', '2019-05-14 07:48:43', 'crane_hire', NULL),
(430, 'Creative Arts Day Camp', 1, '2019-05-14 07:48:43', '2019-05-14 07:48:43', 'creative_arts_day_camp', NULL),
(431, 'Credit Union', 1, '2019-05-14 07:48:43', '2019-05-14 07:48:43', 'credit_union', NULL),
(432, 'Cricket', 1, '2019-05-14 07:48:43', '2019-05-14 07:48:43', 'cricket', NULL),
(433, 'Cross Body & Shoulder Bags', 1, '2019-05-14 07:48:43', '2019-05-14 07:48:43', 'cross_body_&_shoulder_bags', NULL),
(434, 'Cross Stitch', 1, '2019-05-14 07:48:43', '2019-05-14 07:48:43', 'cross_stitch', NULL),
(435, 'Crude Medicine', 1, '2019-05-14 07:48:43', '2019-05-14 07:48:43', 'crude_medicine', NULL),
(436, 'Crude Oil', 1, '2019-05-14 07:48:43', '2019-05-14 07:48:43', 'crude_oil', NULL),
(437, 'Cruise Booking Agent', 1, '2019-05-14 07:48:43', '2019-05-14 07:48:43', 'cruise_booking_agent', NULL),
(438, 'Crystal Lights', 1, '2019-05-14 07:48:43', '2019-05-14 07:48:43', 'crystal_lights', NULL),
(439, 'Cuff Links & Tie Clips', 1, '2019-05-14 07:48:43', '2019-05-14 07:48:43', 'cuff_links_&_tie_clips', NULL),
(440, 'Cupcake Business', 1, '2019-05-14 07:48:43', '2019-05-14 07:48:43', 'cupcake_business', NULL),
(441, 'Curling Irons & Wands', 1, '2019-05-14 07:48:43', '2019-05-14 07:48:43', 'curling_irons_&_wands', NULL),
(442, 'Curtain Walls & Accessories', 1, '2019-05-14 07:48:43', '2019-05-14 07:48:43', 'curtain_walls_&_accessories', NULL),
(443, 'Curtains', 1, '2019-05-14 07:48:43', '2019-05-14 07:48:43', 'curtains', NULL),
(444, 'Curtains & Blinds', 1, '2019-05-14 07:48:43', '2019-05-14 07:48:43', 'curtains_&_blinds', NULL),
(445, 'Cushions & Covers', 1, '2019-05-14 07:48:43', '2019-05-14 07:48:43', 'cushions_&_covers', NULL),
(446, 'Custom Baking', 1, '2019-05-14 07:48:43', '2019-05-14 07:48:43', 'custom_baking', NULL),
(447, 'Custom Embroidery', 1, '2019-05-14 07:48:43', '2019-05-14 07:48:43', 'custom_embroidery', NULL),
(448, 'Custom Fabrication Services', 1, '2019-05-14 07:48:43', '2019-05-14 07:48:43', 'custom_fabrication_services', NULL),
(449, 'Customs Brokerage', 1, '2019-05-14 07:48:43', '2019-05-14 07:48:43', 'customs_brokerage', NULL),
(450, 'Dairy', 1, '2019-05-14 07:48:43', '2019-05-14 07:48:43', 'dairy', NULL),
(451, 'Dance Instructor', 1, '2019-05-14 07:48:43', '2019-05-14 07:48:43', 'dance_instructor', NULL),
(452, 'Dance School', 1, '2019-05-14 07:48:43', '2019-05-14 07:48:43', 'dance_school', NULL),
(453, 'Dance Shoes', 1, '2019-05-14 07:48:43', '2019-05-14 07:48:43', 'dance_shoes', NULL),
(454, 'Data Analysis', 1, '2019-05-14 07:48:43', '2019-05-14 07:48:43', 'data_analysis', NULL),
(455, 'Data Recovery Services', 1, '2019-05-14 07:48:43', '2019-05-14 07:48:43', 'data_recovery_services', NULL),
(456, 'Debt Collection', 1, '2019-05-14 07:48:43', '2019-05-14 07:48:43', 'debt_collection', NULL),
(457, 'Decks/Outdoor Furniture', 1, '2019-05-14 07:48:43', '2019-05-14 07:48:43', 'decks/outdoor_furniture', NULL),
(458, 'Decorative Films', 1, '2019-05-14 07:48:43', '2019-05-14 07:48:43', 'decorative_films', NULL),
(459, 'Dehumidifier', 1, '2019-05-14 07:48:43', '2019-05-14 07:48:43', 'dehumidifier', NULL),
(460, 'Delicatessen', 1, '2019-05-14 07:48:43', '2019-05-14 07:48:43', 'delicatessen', NULL),
(461, 'Delivery Service', 1, '2019-05-14 07:48:43', '2019-05-14 07:48:43', 'delivery_service', NULL),
(462, 'Demolition Services', 1, '2019-05-14 07:48:43', '2019-05-14 07:48:43', 'demolition_services', NULL),
(463, 'Demolition/Wrecking Contractor', 1, '2019-05-14 07:48:43', '2019-05-14 07:48:43', 'demolition/wrecking_contractor', NULL),
(464, 'Dental Equipment', 1, '2019-05-14 07:48:43', '2019-05-14 07:48:43', 'dental_equipment', NULL),
(465, 'Dentist', 1, '2019-05-14 07:48:43', '2019-05-14 07:48:43', 'dentist', NULL),
(466, 'Denture Clinic', 1, '2019-05-14 07:48:43', '2019-05-14 07:48:43', 'denture_clinic', NULL),
(467, 'Department Store', 1, '2019-05-14 07:48:43', '2019-05-14 07:48:43', 'department_store', NULL),
(468, 'Dermacare', 1, '2019-05-14 07:48:43', '2019-05-14 07:48:43', 'dermacare', NULL),
(469, 'Dermatologist', 1, '2019-05-14 07:48:43', '2019-05-14 07:48:43', 'dermatologist', NULL),
(470, 'Design Services', 1, '2019-05-14 07:48:43', '2019-05-14 07:48:43', 'design_services', NULL),
(471, 'Desk Organizer', 1, '2019-05-14 07:48:43', '2019-05-14 07:48:43', 'desk_organizer', NULL),
(472, 'Desktop Casings', 1, '2019-05-14 07:48:43', '2019-05-14 07:48:43', 'desktop_casings', NULL),
(473, 'Desktop Publishing', 1, '2019-05-14 07:48:43', '2019-05-14 07:48:43', 'desktop_publishing', NULL),
(474, 'Diaper Bags', 1, '2019-05-14 07:48:43', '2019-05-14 07:48:43', 'diaper_bags', NULL),
(475, 'Diaper Creams & Ointments', 1, '2019-05-14 07:48:43', '2019-05-14 07:48:43', 'diaper_creams_&_ointments', NULL),
(476, 'Diapering Care', 1, '2019-05-14 07:48:43', '2019-05-14 07:48:43', 'diapering_care', NULL),
(477, 'Die-Cast Vehicles', 1, '2019-05-14 07:48:43', '2019-05-14 07:48:43', 'die-cast_vehicles', NULL),
(478, 'Diesel Fuel', 1, '2019-05-14 07:48:43', '2019-05-14 07:48:43', 'diesel_fuel', NULL),
(479, 'Digital Agency', 1, '2019-05-14 07:48:43', '2019-05-14 07:48:43', 'digital_agency', NULL),
(480, 'Digital Battery', 1, '2019-05-14 07:48:43', '2019-05-14 07:48:43', 'digital_battery', NULL),
(481, 'Digital Camera', 1, '2019-05-14 07:48:43', '2019-05-14 07:48:43', 'digital_camera', NULL),
(482, 'Digital Gear & Camera Bags', 1, '2019-05-14 07:48:43', '2019-05-14 07:48:43', 'digital_gear_&_camera_bags', NULL),
(483, 'Digital Photo Frame', 1, '2019-05-14 07:48:43', '2019-05-14 07:48:43', 'digital_photo_frame', NULL),
(484, 'Digital Printing', 1, '2019-05-14 07:48:43', '2019-05-14 07:48:43', 'digital_printing', NULL),
(485, 'Discount Store', 1, '2019-05-14 07:48:43', '2019-05-14 07:48:43', 'discount_store', NULL),
(486, 'Dishwashing', 1, '2019-05-14 07:48:43', '2019-05-14 07:48:43', 'dishwashing', NULL),
(487, 'Display Racks', 1, '2019-05-14 07:48:43', '2019-05-14 07:48:43', 'display_racks', NULL),
(488, 'Disposable Diapers', 1, '2019-05-14 07:48:43', '2019-05-14 07:48:43', 'disposable_diapers', NULL),
(489, 'Distributors, Sales Agents and Importers', 1, '2019-05-14 07:48:43', '2019-05-14 07:48:43', 'distributors,_sales_agents_and_importers', NULL),
(490, 'Diving & Snorkelling', 1, '2019-05-14 07:48:43', '2019-05-14 07:48:43', 'diving_&_snorkelling', NULL),
(491, 'DIY', 1, '2019-05-14 07:48:43', '2019-05-14 07:48:43', 'diy', NULL),
(492, 'DJ Hire', 1, '2019-05-14 07:48:43', '2019-05-14 07:48:43', 'dj_hire', NULL),
(493, 'Doctor Surgery', 1, '2019-05-14 07:48:43', '2019-05-14 07:48:43', 'doctor_surgery', NULL),
(494, 'Document Destruction & Shredding', 1, '2019-05-14 07:48:43', '2019-05-14 07:48:43', 'document_destruction_&_shredding', NULL),
(495, 'Document Scanning Services', 1, '2019-05-14 07:48:43', '2019-05-14 07:48:43', 'document_scanning_services', NULL);
INSERT INTO `fau_tags` (`id`, `name`, `is_active`, `created_at`, `updated_at`, `title`, `category_id`) VALUES
(496, 'Dog Trainer', 1, '2019-05-14 07:48:43', '2019-05-14 07:48:43', 'dog_trainer', NULL),
(497, 'Dog Treat Baker', 1, '2019-05-14 07:48:43', '2019-05-14 07:48:43', 'dog_treat_baker', NULL),
(498, 'Dog Walker', 1, '2019-05-14 07:48:43', '2019-05-14 07:48:43', 'dog_walker', NULL),
(499, 'Dog Walking', 1, '2019-05-14 07:48:43', '2019-05-14 07:48:43', 'dog_walking', NULL),
(500, 'Dog Waste Remover (Pooper Scooper)', 1, '2019-05-14 07:48:43', '2019-05-14 07:48:43', 'dog_waste_remover_(pooper_scooper)', NULL),
(501, 'Doggie Bed and Breakfast', 1, '2019-05-14 07:48:43', '2019-05-14 07:48:43', 'doggie_bed_and_breakfast', NULL),
(502, 'Dolls', 1, '2019-05-14 07:48:43', '2019-05-14 07:48:43', 'dolls', NULL),
(503, 'Domain Name Trading', 1, '2019-05-14 07:48:43', '2019-05-14 07:48:43', 'domain_name_trading', NULL),
(504, 'Donate to Educate', 1, '2019-05-14 07:48:43', '2019-05-14 07:48:43', 'donate_to_educate', NULL),
(505, 'Donate to Healthcare', 1, '2019-05-14 07:48:43', '2019-05-14 07:48:43', 'donate_to_healthcare', NULL),
(506, 'Donate to Shelter', 1, '2019-05-14 07:48:43', '2019-05-14 07:48:43', 'donate_to_shelter', NULL),
(507, 'Door & Window Accessories', 1, '2019-05-14 07:48:43', '2019-05-14 07:48:43', 'door_&_window_accessories', NULL),
(508, 'Door Manufacturer', 1, '2019-05-14 07:48:43', '2019-05-14 07:48:43', 'door_manufacturer', NULL),
(509, 'Doors & Windows', 1, '2019-05-14 07:48:43', '2019-05-14 07:48:43', 'doors_&_windows', NULL),
(510, 'Doughnuts & Coffee', 1, '2019-05-14 07:48:43', '2019-05-14 07:48:43', 'doughnuts_&_coffee', NULL),
(511, 'Doula', 1, '2019-05-14 07:48:43', '2019-05-14 07:48:43', 'doula', NULL),
(512, 'Down & Feather', 1, '2019-05-14 07:48:43', '2019-05-14 07:48:43', 'down_&_feather', NULL),
(513, 'Drafting Supplies', 1, '2019-05-14 07:48:43', '2019-05-14 07:48:43', 'drafting_supplies', NULL),
(514, 'Drinking Water', 1, '2019-05-14 07:48:43', '2019-05-14 07:48:43', 'drinking_water', NULL),
(515, 'Drivetrain & Transmission', 1, '2019-05-14 07:48:43', '2019-05-14 07:48:43', 'drivetrain_&_transmission', NULL),
(516, 'Driving School', 1, '2019-05-14 07:48:43', '2019-05-14 07:48:43', 'driving_school', NULL),
(517, 'Drone Business', 1, '2019-05-14 07:48:43', '2019-05-14 07:48:43', 'drone_business', NULL),
(518, 'Drones & Accessories', 1, '2019-05-14 07:48:43', '2019-05-14 07:48:43', 'drones_&_accessories', NULL),
(519, 'Dropship Business', 1, '2019-05-14 07:48:43', '2019-05-14 07:48:43', 'dropship_business', NULL),
(520, 'Dry Cleaning Business', 1, '2019-05-14 07:48:43', '2019-05-14 07:48:43', 'dry_cleaning_business', NULL),
(521, 'Dry-Cleaning Delivery and Pick-Up', 1, '2019-05-14 07:48:43', '2019-05-14 07:48:43', 'dry-cleaning_delivery_and_pick-up', NULL),
(522, 'DSLR', 1, '2019-05-14 07:48:43', '2019-05-14 07:48:43', 'dslr', NULL),
(523, 'Dupattas, Stoles & Shawls', 1, '2019-05-14 07:48:43', '2019-05-14 07:48:43', 'dupattas,_stoles_&_shawls', NULL),
(524, 'DVD Rental', 1, '2019-05-14 07:48:43', '2019-05-14 07:48:43', 'dvd_rental', NULL),
(525, 'Earphone & Headphone', 1, '2019-05-14 07:48:43', '2019-05-14 07:48:43', 'earphone_&_headphone', NULL),
(526, 'Earth Moving Equipment', 1, '2019-05-14 07:48:43', '2019-05-14 07:48:43', 'earth_moving_equipment', NULL),
(527, 'Earthwork Products', 1, '2019-05-14 07:48:43', '2019-05-14 07:48:43', 'earthwork_products', NULL),
(528, 'Easels', 1, '2019-05-14 07:48:43', '2019-05-14 07:48:43', 'easels', NULL),
(529, 'EBay Seller', 1, '2019-05-14 07:48:43', '2019-05-14 07:48:43', 'ebay_seller', NULL),
(530, 'EBay Selling', 1, '2019-05-14 07:48:43', '2019-05-14 07:48:43', 'ebay_selling', NULL),
(531, 'EBook Author', 1, '2019-05-14 07:48:43', '2019-05-14 07:48:43', 'ebook_author', NULL),
(532, 'EBook Ghostwriter', 1, '2019-05-14 07:48:43', '2019-05-14 07:48:43', 'ebook_ghostwriter', NULL),
(533, 'EBook Publishing', 1, '2019-05-14 07:48:43', '2019-05-14 07:48:43', 'ebook_publishing', NULL),
(534, 'EBooks', 1, '2019-05-14 07:48:43', '2019-05-14 07:48:43', 'ebooks', NULL),
(535, 'E-commerce business', 1, '2019-05-14 07:48:43', '2019-05-14 07:48:43', 'e-commerce_business', NULL),
(536, 'Ecommerce Reseller', 1, '2019-05-14 07:48:43', '2019-05-14 07:48:43', 'ecommerce_reseller', NULL),
(537, 'Education Products', 1, '2019-05-14 07:48:43', '2019-05-14 07:48:43', 'education_products', NULL),
(538, 'Educational Supplies', 1, '2019-05-14 07:48:43', '2019-05-14 07:48:43', 'educational_supplies', NULL),
(539, 'Educational Toys', 1, '2019-05-14 07:48:43', '2019-05-14 07:48:43', 'educational_toys', NULL),
(540, 'Egg & Egg Products', 1, '2019-05-14 07:48:43', '2019-05-14 07:48:43', 'egg_&_egg_products', NULL),
(541, 'Elder Companion & Care Provider', 1, '2019-05-14 07:48:43', '2019-05-14 07:48:43', 'elder_companion_&_care_provider', NULL),
(542, 'Electric Bikes', 1, '2019-05-14 07:48:43', '2019-05-14 07:48:43', 'electric_bikes', NULL),
(543, 'Electric Drill', 1, '2019-05-14 07:48:43', '2019-05-14 07:48:43', 'electric_drill', NULL),
(544, 'Electric Kettle', 1, '2019-05-14 07:48:43', '2019-05-14 07:48:43', 'electric_kettle', NULL),
(545, 'Electrical Appliances', 1, '2019-05-14 07:48:43', '2019-05-14 07:48:43', 'electrical_appliances', NULL),
(546, 'Electrical Contractor/Electrician', 1, '2019-05-14 07:48:43', '2019-05-14 07:48:43', 'electrical_contractor/electrician', NULL),
(547, 'Electrical Engineer', 1, '2019-05-14 07:48:43', '2019-05-14 07:48:43', 'electrical_engineer', NULL),
(548, 'Electrical Instruments', 1, '2019-05-14 07:48:43', '2019-05-14 07:48:43', 'electrical_instruments', NULL),
(549, 'Electrical Plugs & Sockets', 1, '2019-05-14 07:48:43', '2019-05-14 07:48:43', 'electrical_plugs_&_sockets', NULL),
(550, 'Electrician', 1, '2019-05-14 07:48:43', '2019-05-14 07:48:43', 'electrician', NULL),
(551, 'Electricity Generation', 1, '2019-05-14 07:48:43', '2019-05-14 07:48:43', 'electricity_generation', NULL),
(552, 'Electronic & Instrument Enclosures', 1, '2019-05-14 07:48:43', '2019-05-14 07:48:43', 'electronic_&_instrument_enclosures', NULL),
(553, 'Electronic Cigarettes', 1, '2019-05-14 07:48:43', '2019-05-14 07:48:43', 'electronic_cigarettes', NULL),
(554, 'Electronic Components and Supplies', 1, '2019-05-14 07:48:44', '2019-05-14 07:48:44', 'electronic_components_and_supplies', NULL),
(555, 'Electronic Products Machinery', 1, '2019-05-14 07:48:44', '2019-05-14 07:48:44', 'electronic_products_machinery', NULL),
(556, 'Electronic Publications', 1, '2019-05-14 07:48:44', '2019-05-14 07:48:44', 'electronic_publications', NULL),
(557, 'Electronic Toys', 1, '2019-05-14 07:48:44', '2019-05-14 07:48:44', 'electronic_toys', NULL),
(558, 'Electronics', 1, '2019-05-14 07:48:44', '2019-05-14 07:48:44', 'electronics', NULL),
(559, 'Electronics Packaging', 1, '2019-05-14 07:48:44', '2019-05-14 07:48:44', 'electronics_packaging', NULL),
(560, 'Elevators & Elevator Parts', 1, '2019-05-14 07:48:44', '2019-05-14 07:48:44', 'elevators_&_elevator_parts', NULL),
(561, 'Embroidery Services', 1, '2019-05-14 07:48:44', '2019-05-14 07:48:44', 'embroidery_services', NULL),
(562, 'Emergency & Clinics Apparatuses', 1, '2019-05-14 07:48:44', '2019-05-14 07:48:44', 'emergency_&_clinics_apparatuses', NULL),
(563, 'Emergency Lighting', 1, '2019-05-14 07:48:44', '2019-05-14 07:48:44', 'emergency_lighting', NULL),
(564, 'Emergency Vehicles', 1, '2019-05-14 07:48:44', '2019-05-14 07:48:44', 'emergency_vehicles', NULL),
(565, 'Employee Leasing', 1, '2019-05-14 07:48:44', '2019-05-14 07:48:44', 'employee_leasing', NULL),
(566, 'Employment Services', 1, '2019-05-14 07:48:44', '2019-05-14 07:48:44', 'employment_services', NULL),
(567, 'Energy & Mineral Equipment', 1, '2019-05-14 07:48:44', '2019-05-14 07:48:44', 'energy_&_mineral_equipment', NULL),
(568, 'Energy Saving & Fluorescent', 1, '2019-05-14 07:48:44', '2019-05-14 07:48:44', 'energy_saving_&_fluorescent', NULL),
(569, 'Energy/Utilities', 1, '2019-05-14 07:48:44', '2019-05-14 07:48:44', 'energy/utilities', NULL),
(570, 'Engineering & Construction Machinery', 1, '2019-05-14 07:48:44', '2019-05-14 07:48:44', 'engineering_&_construction_machinery', NULL),
(571, 'Engineering & Mechanical Services', 1, '2019-05-14 07:48:44', '2019-05-14 07:48:44', 'engineering_&_mechanical_services', NULL),
(572, 'Engraving Services', 1, '2019-05-14 07:48:44', '2019-05-14 07:48:44', 'engraving_services', NULL),
(573, 'Entertainment', 1, '2019-05-14 07:48:44', '2019-05-14 07:48:44', 'entertainment', NULL),
(574, 'Entertainment & Lesiure Activities', 1, '2019-05-14 07:48:44', '2019-05-14 07:48:44', 'entertainment_&_lesiure_activities', NULL),
(575, 'Equipment & Plant Hire', 1, '2019-05-14 07:48:44', '2019-05-14 07:48:44', 'equipment_&_plant_hire', NULL),
(576, 'Equipments of Traditional Chinese Medicine', 1, '2019-05-14 07:48:44', '2019-05-14 07:48:44', 'equipments_of_traditional_chinese_medicine', NULL),
(577, 'Errand Runner', 1, '2019-05-14 07:48:44', '2019-05-14 07:48:44', 'errand_runner', NULL),
(578, 'Escalators & Escalator Parts', 1, '2019-05-14 07:48:44', '2019-05-14 07:48:44', 'escalators_&_escalator_parts', NULL),
(579, 'Escort Service', 1, '2019-05-14 07:48:44', '2019-05-14 07:48:44', 'escort_service', NULL),
(580, 'Ethnic Clothing', 1, '2019-05-14 07:48:44', '2019-05-14 07:48:44', 'ethnic_clothing', NULL),
(581, 'Etsy Seller', 1, '2019-05-14 07:48:44', '2019-05-14 07:48:44', 'etsy_seller', NULL),
(582, 'European Restaurant', 1, '2019-05-14 07:48:44', '2019-05-14 07:48:44', 'european_restaurant', NULL),
(583, 'Event DJ', 1, '2019-05-14 07:48:44', '2019-05-14 07:48:44', 'event_dj', NULL),
(584, 'Event Furniture & Equipment Rental', 1, '2019-05-14 07:48:44', '2019-05-14 07:48:44', 'event_furniture_&_equipment_rental', NULL),
(585, 'Excavating & Earth Moving Services', 1, '2019-05-14 07:48:44', '2019-05-14 07:48:44', 'excavating_&_earth_moving_services', NULL),
(586, 'External Hard Drives', 1, '2019-05-14 07:48:44', '2019-05-14 07:48:44', 'external_hard_drives', NULL),
(587, 'Eyeglasses Frames', 1, '2019-05-14 07:48:44', '2019-05-14 07:48:44', 'eyeglasses_frames', NULL),
(588, 'Eyes', 1, '2019-05-14 07:48:44', '2019-05-14 07:48:44', 'eyes', NULL),
(589, 'Fabric', 1, '2019-05-14 07:48:44', '2019-05-14 07:48:44', 'fabric', NULL),
(590, 'Fabric Supplies', 1, '2019-05-14 07:48:44', '2019-05-14 07:48:44', 'fabric_supplies', NULL),
(591, 'Face Scrubs & Exfoliators', 1, '2019-05-14 07:48:44', '2019-05-14 07:48:44', 'face_scrubs_&_exfoliators', NULL),
(592, 'Facial Cleansers', 1, '2019-05-14 07:48:44', '2019-05-14 07:48:44', 'facial_cleansers', NULL),
(593, 'Family Restaurant', 1, '2019-05-14 07:48:44', '2019-05-14 07:48:44', 'family_restaurant', NULL),
(594, 'Fans', 1, '2019-05-14 07:48:44', '2019-05-14 07:48:44', 'fans', NULL),
(595, 'Fans & Heatsinks', 1, '2019-05-14 07:48:44', '2019-05-14 07:48:44', 'fans_&_heatsinks', NULL),
(596, 'Farm & Agricultural Equipment', 1, '2019-05-14 07:48:44', '2019-05-14 07:48:44', 'farm_&_agricultural_equipment', NULL),
(597, 'Farm & Agricultural Services', 1, '2019-05-14 07:48:44', '2019-05-14 07:48:44', 'farm_&_agricultural_services', NULL),
(598, 'Farm & Agricultural Supplies', 1, '2019-05-14 07:48:44', '2019-05-14 07:48:44', 'farm_&_agricultural_supplies', NULL),
(599, 'Farm Machinery & Equipment', 1, '2019-05-14 07:48:44', '2019-05-14 07:48:44', 'farm_machinery_&_equipment', NULL),
(600, 'Fashion Accessories Processing Services', 1, '2019-05-14 07:48:44', '2019-05-14 07:48:44', 'fashion_accessories_processing_services', NULL),
(601, 'Fashion Accessories Stock', 1, '2019-05-14 07:48:44', '2019-05-14 07:48:44', 'fashion_accessories_stock', NULL),
(602, 'Fashion blog', 1, '2019-05-14 07:48:44', '2019-05-14 07:48:44', 'fashion_blog', NULL),
(603, 'Fast Food Restaurant', 1, '2019-05-14 07:48:44', '2019-05-14 07:48:44', 'fast_food_restaurant', NULL),
(604, 'Faucets, Mixers & Taps', 1, '2019-05-14 07:48:44', '2019-05-14 07:48:44', 'faucets,_mixers_&_taps', NULL),
(605, 'Fax Machines', 1, '2019-05-14 07:48:44', '2019-05-14 07:48:44', 'fax_machines', NULL),
(606, 'Feed', 1, '2019-05-14 07:48:44', '2019-05-14 07:48:44', 'feed', NULL),
(607, 'Feminine Hygiene', 1, '2019-05-14 07:48:44', '2019-05-14 07:48:44', 'feminine_hygiene', NULL),
(608, 'Fence Products', 1, '2019-05-14 07:48:44', '2019-05-14 07:48:44', 'fence_products', NULL),
(609, 'Fertility Clinic', 1, '2019-05-14 07:48:44', '2019-05-14 07:48:44', 'fertility_clinic', NULL),
(610, 'Festive & Party Supplies', 1, '2019-05-14 07:48:44', '2019-05-14 07:48:44', 'festive_&_party_supplies', NULL),
(611, 'Fiber', 1, '2019-05-14 07:48:44', '2019-05-14 07:48:44', 'fiber', NULL),
(612, 'Fiber Optic Equipment', 1, '2019-05-14 07:48:44', '2019-05-14 07:48:44', 'fiber_optic_equipment', NULL),
(613, 'Fiberglass Products', 1, '2019-05-14 07:48:44', '2019-05-14 07:48:44', 'fiberglass_products', NULL),
(614, 'Fiberglass Wall Meshes', 1, '2019-05-14 07:48:44', '2019-05-14 07:48:44', 'fiberglass_wall_meshes', NULL),
(615, 'Filing Products', 1, '2019-05-14 07:48:44', '2019-05-14 07:48:44', 'filing_products', NULL),
(616, 'Financial Advisor', 1, '2019-05-14 07:48:44', '2019-05-14 07:48:44', 'financial_advisor', NULL),
(617, 'Financial Auditor', 1, '2019-05-14 07:48:44', '2019-05-14 07:48:44', 'financial_auditor', NULL),
(618, 'Financial Equipment', 1, '2019-05-14 07:48:44', '2019-05-14 07:48:44', 'financial_equipment', NULL),
(619, 'Fire & Safety Equipment', 1, '2019-05-14 07:48:44', '2019-05-14 07:48:44', 'fire_&_safety_equipment', NULL),
(620, 'Fire Alarm', 1, '2019-05-14 07:48:44', '2019-05-14 07:48:44', 'fire_alarm', NULL),
(621, 'Firefighting Supplies', 1, '2019-05-14 07:48:44', '2019-05-14 07:48:44', 'firefighting_supplies', NULL),
(622, 'Fireplace Equipment', 1, '2019-05-14 07:48:44', '2019-05-14 07:48:44', 'fireplace_equipment', NULL),
(623, 'Fireplaces,Stoves', 1, '2019-05-14 07:48:44', '2019-05-14 07:48:44', 'fireplaces,stoves', NULL),
(624, 'Fireproofing Materials', 1, '2019-05-14 07:48:44', '2019-05-14 07:48:44', 'fireproofing_materials', NULL),
(625, 'First Aid Supplies', 1, '2019-05-14 07:48:44', '2019-05-14 07:48:44', 'first_aid_supplies', NULL),
(626, 'Fish & Chips Restaurant', 1, '2019-05-14 07:48:44', '2019-05-14 07:48:44', 'fish_&_chips_restaurant', NULL),
(627, 'Fishing', 1, '2019-05-14 07:48:44', '2019-05-14 07:48:44', 'fishing', NULL),
(628, 'Fishing Charter', 1, '2019-05-14 07:48:44', '2019-05-14 07:48:44', 'fishing_charter', NULL),
(629, 'Fishing Equipment', 1, '2019-05-14 07:48:44', '2019-05-14 07:48:44', 'fishing_equipment', NULL),
(630, 'Fitness & Activity Trackers', 1, '2019-05-14 07:48:44', '2019-05-14 07:48:44', 'fitness_&_activity_trackers', NULL),
(631, 'Fitness & Body Building', 1, '2019-05-14 07:48:44', '2019-05-14 07:48:44', 'fitness_&_body_building', NULL),
(632, 'Fitness Accessories', 1, '2019-05-14 07:48:44', '2019-05-14 07:48:44', 'fitness_accessories', NULL),
(633, 'Fitness Equipment', 1, '2019-05-14 07:48:44', '2019-05-14 07:48:44', 'fitness_equipment', NULL),
(634, 'Fitness Rental Equipment', 1, '2019-05-14 07:48:44', '2019-05-14 07:48:44', 'fitness_rental_equipment', NULL),
(635, 'Fitness Tracker Accessories', 1, '2019-05-14 07:48:44', '2019-05-14 07:48:44', 'fitness_tracker_accessories', NULL),
(636, 'Fixed Wireless Terminals', 1, '2019-05-14 07:48:44', '2019-05-14 07:48:44', 'fixed_wireless_terminals', NULL),
(637, 'Fixtures & Plumbing', 1, '2019-05-14 07:48:44', '2019-05-14 07:48:44', 'fixtures_&_plumbing', NULL),
(638, 'Flags, Banners & Accessories', 1, '2019-05-14 07:48:44', '2019-05-14 07:48:44', 'flags,_banners_&_accessories', NULL),
(639, 'Flash Drives', 1, '2019-05-14 07:48:44', '2019-05-14 07:48:44', 'flash_drives', NULL),
(640, 'Flat Irons', 1, '2019-05-14 07:48:44', '2019-05-14 07:48:44', 'flat_irons', NULL),
(641, 'Flat Shoes', 1, '2019-05-14 07:48:44', '2019-05-14 07:48:44', 'flat_shoes', NULL),
(642, 'Flavoring Syrups', 1, '2019-05-14 07:48:44', '2019-05-14 07:48:44', 'flavoring_syrups', NULL),
(643, 'Flea Market Organizer', 1, '2019-05-14 07:48:44', '2019-05-14 07:48:44', 'flea_market_organizer', NULL),
(644, 'Flea Market Vendor', 1, '2019-05-14 07:48:44', '2019-05-14 07:48:44', 'flea_market_vendor', NULL),
(645, 'Flip Flops & Sandals', 1, '2019-05-14 07:48:44', '2019-05-14 07:48:44', 'flip_flops_&_sandals', NULL),
(646, 'Floaties', 1, '2019-05-14 07:48:44', '2019-05-14 07:48:44', 'floaties', NULL),
(647, 'Floating Art Gallery', 1, '2019-05-14 07:48:44', '2019-05-14 07:48:44', 'floating_art_gallery', NULL),
(648, 'Floor & Carpet Supplies', 1, '2019-05-14 07:48:44', '2019-05-14 07:48:44', 'floor_&_carpet_supplies', NULL),
(649, 'Floor Lamps', 1, '2019-05-14 07:48:44', '2019-05-14 07:48:44', 'floor_lamps', NULL),
(650, 'Floor Mats & Cargo Liners', 1, '2019-05-14 07:48:44', '2019-05-14 07:48:44', 'floor_mats_&_cargo_liners', NULL),
(651, 'Floor Polisher', 1, '2019-05-14 07:48:44', '2019-05-14 07:48:44', 'floor_polisher', NULL),
(652, 'Floor Sanding & Polishing', 1, '2019-05-14 07:48:44', '2019-05-14 07:48:44', 'floor_sanding_&_polishing', NULL),
(653, 'Flooring', 1, '2019-05-14 07:48:44', '2019-05-14 07:48:44', 'flooring', NULL),
(654, 'Flooring & Accessories', 1, '2019-05-14 07:48:44', '2019-05-14 07:48:44', 'flooring_&_accessories', NULL),
(655, 'Flooring Services', 1, '2019-05-14 07:48:44', '2019-05-14 07:48:44', 'flooring_services', NULL),
(656, 'Floral Shop', 1, '2019-05-14 07:48:44', '2019-05-14 07:48:44', 'floral_shop', NULL),
(657, 'Flyscreens & Security Doors', 1, '2019-05-14 07:48:44', '2019-05-14 07:48:44', 'flyscreens_&_security_doors', NULL),
(658, 'Folding Furniture', 1, '2019-05-14 07:48:44', '2019-05-14 07:48:44', 'folding_furniture', NULL),
(659, 'Food', 1, '2019-05-14 07:48:44', '2019-05-14 07:48:44', 'food', NULL),
(660, 'Food & Beverage Machinery', 1, '2019-05-14 07:48:44', '2019-05-14 07:48:44', 'food_&_beverage_machinery', NULL),
(661, 'Food Court', 1, '2019-05-14 07:48:44', '2019-05-14 07:48:44', 'food_court', NULL),
(662, 'Food Ingredients', 1, '2019-05-14 07:48:44', '2019-05-14 07:48:44', 'food_ingredients', NULL),
(663, 'Food Manufacturer', 1, '2019-05-14 07:48:44', '2019-05-14 07:48:44', 'food_manufacturer', NULL),
(664, 'Food Packaging', 1, '2019-05-14 07:48:44', '2019-05-14 07:48:44', 'food_packaging', NULL),
(665, 'Food Truck or Food Cart', 1, '2019-05-14 07:48:44', '2019-05-14 07:48:44', 'food_truck_or_food_cart', NULL),
(666, 'Foot Care', 1, '2019-05-14 07:48:44', '2019-05-14 07:48:44', 'foot_care', NULL),
(667, 'Football', 1, '2019-05-14 07:48:44', '2019-05-14 07:48:44', 'football', NULL),
(668, 'Forklift Hire', 1, '2019-05-14 07:48:44', '2019-05-14 07:48:44', 'forklift_hire', NULL),
(669, 'Forklift Sales', 1, '2019-05-14 07:48:44', '2019-05-14 07:48:44', 'forklift_sales', NULL),
(670, 'Forklift Training Courses', 1, '2019-05-14 07:48:44', '2019-05-14 07:48:44', 'forklift_training_courses', NULL),
(671, 'Formal Shirts', 1, '2019-05-14 07:48:44', '2019-05-14 07:48:44', 'formal_shirts', NULL),
(672, 'Formal Shoes', 1, '2019-05-14 07:48:44', '2019-05-14 07:48:44', 'formal_shoes', NULL),
(673, 'Formal Wear', 1, '2019-05-14 07:48:44', '2019-05-14 07:48:44', 'formal_wear', NULL),
(674, 'Formal Wear Hire', 1, '2019-05-14 07:48:44', '2019-05-14 07:48:44', 'formal_wear_hire', NULL),
(675, 'Formwork', 1, '2019-05-14 07:48:44', '2019-05-14 07:48:44', 'formwork', NULL),
(676, 'Foundation', 1, '2019-05-14 07:48:44', '2019-05-14 07:48:44', 'foundation', NULL),
(677, 'Fragrance & Deodorant', 1, '2019-05-14 07:48:44', '2019-05-14 07:48:44', 'fragrance_&_deodorant', NULL),
(678, 'Freezer', 1, '2019-05-14 07:48:44', '2019-05-14 07:48:44', 'freezer', NULL),
(679, 'French Restaurant', 1, '2019-05-14 07:48:44', '2019-05-14 07:48:44', 'french_restaurant', NULL),
(680, 'Fresh Seafood', 1, '2019-05-14 07:48:44', '2019-05-14 07:48:44', 'fresh_seafood', NULL),
(681, 'Fried Chicken Restaurant', 1, '2019-05-14 07:48:44', '2019-05-14 07:48:44', 'fried_chicken_restaurant', NULL),
(682, 'Fruit', 1, '2019-05-14 07:48:44', '2019-05-14 07:48:44', 'fruit', NULL),
(683, 'Fruit Products', 1, '2019-05-14 07:48:44', '2019-05-14 07:48:44', 'fruit_products', NULL),
(684, 'Fryer', 1, '2019-05-14 07:48:44', '2019-05-14 07:48:44', 'fryer', NULL),
(685, 'Fun', 1, '2019-05-14 07:48:44', '2019-05-14 07:48:44', 'fun', NULL),
(686, 'Function Venue', 1, '2019-05-14 07:48:44', '2019-05-14 07:48:44', 'function_venue', NULL),
(687, 'Fundraising Event Coordinator', 1, '2019-05-14 07:48:44', '2019-05-14 07:48:44', 'fundraising_event_coordinator', NULL),
(688, 'Fund-Raising Firm', 1, '2019-05-14 07:48:44', '2019-05-14 07:48:44', 'fund-raising_firm', NULL),
(689, 'Funeral Directors', 1, '2019-05-14 07:48:44', '2019-05-14 07:48:44', 'funeral_directors', NULL),
(690, 'Funeral Supplies', 1, '2019-05-14 07:48:44', '2019-05-14 07:48:44', 'funeral_supplies', NULL),
(691, 'Fur', 1, '2019-05-14 07:48:44', '2019-05-14 07:48:44', 'fur', NULL),
(692, 'Furniture Accessories', 1, '2019-05-14 07:48:44', '2019-05-14 07:48:44', 'furniture_accessories', NULL),
(693, 'Furniture Hardware', 1, '2019-05-14 07:48:44', '2019-05-14 07:48:44', 'furniture_hardware', NULL),
(694, 'Furniture Maker', 1, '2019-05-14 07:48:44', '2019-05-14 07:48:44', 'furniture_maker', NULL),
(695, 'Furniture Manufacturer', 1, '2019-05-14 07:48:44', '2019-05-14 07:48:44', 'furniture_manufacturer', NULL),
(696, 'Furniture Mover', 1, '2019-05-14 07:48:44', '2019-05-14 07:48:44', 'furniture_mover', NULL),
(697, 'Furniture Parts', 1, '2019-05-14 07:48:44', '2019-05-14 07:48:44', 'furniture_parts', NULL),
(698, 'Furniture Rental', 1, '2019-05-14 07:48:44', '2019-05-14 07:48:44', 'furniture_rental', NULL),
(699, 'Furniture/Furnishings', 1, '2019-05-14 07:48:44', '2019-05-14 07:48:44', 'furniture/furnishings', NULL),
(700, 'Fuse Components', 1, '2019-05-14 07:48:44', '2019-05-14 07:48:44', 'fuse_components', NULL),
(701, 'Fuses', 1, '2019-05-14 07:48:44', '2019-05-14 07:48:44', 'fuses', NULL),
(702, 'Gambling', 1, '2019-05-14 07:48:44', '2019-05-14 07:48:44', 'gambling', NULL),
(703, 'Gaming Furniture', 1, '2019-05-14 07:48:44', '2019-05-14 07:48:44', 'gaming_furniture', NULL),
(704, 'Gaming Laptops', 1, '2019-05-14 07:48:44', '2019-05-14 07:48:44', 'gaming_laptops', NULL),
(705, 'Garage Clean Out and Trick Out', 1, '2019-05-14 07:48:44', '2019-05-14 07:48:44', 'garage_clean_out_and_trick_out', NULL),
(706, 'Garage Doors', 1, '2019-05-14 07:48:44', '2019-05-14 07:48:44', 'garage_doors', NULL),
(707, 'Garages & Sheds', 1, '2019-05-14 07:48:44', '2019-05-14 07:48:44', 'garages_&_sheds', NULL),
(708, 'Garden Center', 1, '2019-05-14 07:48:44', '2019-05-14 07:48:44', 'garden_center', NULL),
(709, 'Garden Centre', 1, '2019-05-14 07:48:44', '2019-05-14 07:48:44', 'garden_centre', NULL),
(710, 'Garden Nursery', 1, '2019-05-14 07:48:44', '2019-05-14 07:48:44', 'garden_nursery', NULL),
(711, 'Garden Products', 1, '2019-05-14 07:48:44', '2019-05-14 07:48:44', 'garden_products', NULL),
(712, 'Garden Supplies', 1, '2019-05-14 07:48:44', '2019-05-14 07:48:44', 'garden_supplies', NULL),
(713, 'Garden Tools', 1, '2019-05-14 07:48:44', '2019-05-14 07:48:44', 'garden_tools', NULL),
(714, 'Gardener', 1, '2019-05-14 07:48:44', '2019-05-14 07:48:44', 'gardener', NULL),
(715, 'Gardening Services', 1, '2019-05-14 07:48:44', '2019-05-14 07:48:44', 'gardening_services', NULL),
(716, 'Garment Accessories', 1, '2019-05-14 07:48:44', '2019-05-14 07:48:44', 'garment_accessories', NULL),
(717, 'Garment steamer', 1, '2019-05-14 07:48:44', '2019-05-14 07:48:44', 'garment_steamer', NULL),
(718, 'Gas Disposal', 1, '2019-05-14 07:48:44', '2019-05-14 07:48:44', 'gas_disposal', NULL),
(719, 'Gases and Fuels', 1, '2019-05-14 07:48:44', '2019-05-14 07:48:44', 'gases_and_fuels', NULL),
(720, 'Gasoline Service Station', 1, '2019-05-14 07:48:44', '2019-05-14 07:48:44', 'gasoline_service_station', NULL),
(721, 'Gates', 1, '2019-05-14 07:48:44', '2019-05-14 07:48:44', 'gates', NULL),
(722, 'GED Test Preparation', 1, '2019-05-14 07:48:44', '2019-05-14 07:48:44', 'ged_test_preparation', NULL),
(723, 'General Assay & Diagnostic Apparatuses', 1, '2019-05-14 07:48:44', '2019-05-14 07:48:44', 'general_assay_&_diagnostic_apparatuses', NULL),
(724, 'General Industrial Equipment', 1, '2019-05-14 07:48:44', '2019-05-14 07:48:44', 'general_industrial_equipment', NULL),
(725, 'General Mechanical Components Design Services', 1, '2019-05-14 07:48:44', '2019-05-14 07:48:44', 'general_mechanical_components_design_services', NULL),
(726, 'General Mechanical Components Stock', 1, '2019-05-14 07:48:44', '2019-05-14 07:48:44', 'general_mechanical_components_stock', NULL),
(727, 'Generators', 1, '2019-05-14 07:48:44', '2019-05-14 07:48:44', 'generators', NULL),
(728, 'Genuine Leather', 1, '2019-05-14 07:48:44', '2019-05-14 07:48:44', 'genuine_leather', NULL),
(729, 'Genuine Leather Belts', 1, '2019-05-14 07:48:44', '2019-05-14 07:48:44', 'genuine_leather_belts', NULL),
(730, 'Genuine Leather Shoes', 1, '2019-05-14 07:48:44', '2019-05-14 07:48:44', 'genuine_leather_shoes', NULL),
(731, 'German Restaurant', 1, '2019-05-14 07:48:44', '2019-05-14 07:48:44', 'german_restaurant', NULL),
(732, 'Gift Packaging', 1, '2019-05-14 07:48:44', '2019-05-14 07:48:44', 'gift_packaging', NULL),
(733, 'Gift Sets', 1, '2019-05-14 07:48:44', '2019-05-14 07:48:44', 'gift_sets', NULL),
(734, 'Gift Shop', 1, '2019-05-14 07:48:44', '2019-05-14 07:48:44', 'gift_shop', NULL),
(735, 'Gift Show Organizer', 1, '2019-05-14 07:48:44', '2019-05-14 07:48:44', 'gift_show_organizer', NULL),
(736, 'Gift-Basket Design', 1, '2019-05-14 07:48:44', '2019-05-14 07:48:44', 'gift-basket_design', NULL),
(737, 'Gifts & Wraping', 1, '2019-05-14 07:48:44', '2019-05-14 07:48:44', 'gifts_&_wraping', NULL),
(738, 'Girl‘s Clothing', 1, '2019-05-14 07:48:44', '2019-05-14 07:48:44', 'girl‘s_clothing', NULL),
(739, 'Girls\'  Shoes', 1, '2019-05-14 07:48:44', '2019-05-14 07:48:44', 'girls\'__shoes', NULL),
(740, 'Girls\' Clothing', 1, '2019-05-14 07:48:44', '2019-05-14 07:48:44', 'girls\'_clothing', NULL),
(741, 'Girls\'Dresses', 1, '2019-05-14 07:48:44', '2019-05-14 07:48:44', 'girls\'dresses', NULL),
(742, 'Glass', 1, '2019-05-14 07:48:44', '2019-05-14 07:48:44', 'glass', NULL),
(743, 'Glass Furniture', 1, '2019-05-14 07:48:44', '2019-05-14 07:48:44', 'glass_furniture', NULL),
(744, 'Glass Marbles', 1, '2019-05-14 07:48:44', '2019-05-14 07:48:44', 'glass_marbles', NULL),
(745, 'Glasses & Eyewear', 1, '2019-05-14 07:48:44', '2019-05-14 07:48:44', 'glasses_&_eyewear', NULL),
(746, 'Glazier & Glass Supplies', 1, '2019-05-14 07:48:44', '2019-05-14 07:48:44', 'glazier_&_glass_supplies', NULL),
(747, 'Gloves', 1, '2019-05-14 07:48:44', '2019-05-14 07:48:44', 'gloves', NULL),
(748, 'Gloves & Mittens', 1, '2019-05-14 07:48:44', '2019-05-14 07:48:44', 'gloves_&_mittens', NULL),
(749, 'Goggles', 1, '2019-05-14 07:48:44', '2019-05-14 07:48:44', 'goggles', NULL),
(750, 'Gold & Silver Merchant', 1, '2019-05-14 07:48:44', '2019-05-14 07:48:44', 'gold_&_silver_merchant', NULL),
(751, 'Golf', 1, '2019-05-14 07:48:44', '2019-05-14 07:48:44', 'golf', NULL),
(752, 'Golf Carts', 1, '2019-05-14 07:48:44', '2019-05-14 07:48:44', 'golf_carts', NULL),
(753, 'Golf Coach', 1, '2019-05-14 07:48:44', '2019-05-14 07:48:44', 'golf_coach', NULL),
(754, 'Golf Course', 1, '2019-05-14 07:48:44', '2019-05-14 07:48:44', 'golf_course', NULL),
(755, 'Golf Driving Range', 1, '2019-05-14 07:48:44', '2019-05-14 07:48:44', 'golf_driving_range', NULL),
(756, 'Golf Equipment', 1, '2019-05-14 07:48:44', '2019-05-14 07:48:44', 'golf_equipment', NULL),
(757, 'Gordon Field House', 1, '2019-05-14 07:48:44', '2019-05-14 07:48:44', 'gordon_field_house', NULL),
(758, 'Gourmet Candy Cart', 1, '2019-05-14 07:48:44', '2019-05-14 07:48:44', 'gourmet_candy_cart', NULL),
(759, 'Gourmet Food', 1, '2019-05-14 07:48:44', '2019-05-14 07:48:44', 'gourmet_food', NULL),
(760, 'GPS', 1, '2019-05-14 07:48:44', '2019-05-14 07:48:44', 'gps', NULL),
(761, 'Grain', 1, '2019-05-14 07:48:44', '2019-05-14 07:48:44', 'grain', NULL),
(762, 'Grain Products', 1, '2019-05-14 07:48:44', '2019-05-14 07:48:44', 'grain_products', NULL),
(763, 'Grains,Beans & Pulses', 1, '2019-05-14 07:48:44', '2019-05-14 07:48:44', 'grains,beans_&_pulses', NULL),
(764, 'Grants-Proposal Writer', 1, '2019-05-14 07:48:44', '2019-05-14 07:48:44', 'grants-proposal_writer', NULL),
(765, 'Graphic Cards', 1, '2019-05-14 07:48:44', '2019-05-14 07:48:44', 'graphic_cards', NULL),
(766, 'Graphic Design', 1, '2019-05-14 07:48:44', '2019-05-14 07:48:44', 'graphic_design', NULL),
(767, 'Graphic Design Agency', 1, '2019-05-14 07:48:44', '2019-05-14 07:48:44', 'graphic_design_agency', NULL),
(768, 'Graphic Designer', 1, '2019-05-14 07:48:44', '2019-05-14 07:48:44', 'graphic_designer', NULL),
(769, 'Graphite Products', 1, '2019-05-14 07:48:44', '2019-05-14 07:48:44', 'graphite_products', NULL),
(770, 'Greek Restaurant', 1, '2019-05-14 07:48:44', '2019-05-14 07:48:44', 'greek_restaurant', NULL),
(771, 'Green Grocer', 1, '2019-05-14 07:48:44', '2019-05-14 07:48:44', 'green_grocer', NULL),
(772, 'Grey Fabric', 1, '2019-05-14 07:48:44', '2019-05-14 07:48:44', 'grey_fabric', NULL),
(773, 'Grill & Bar Restaurant', 1, '2019-05-14 07:48:44', '2019-05-14 07:48:44', 'grill_&_bar_restaurant', NULL),
(774, 'Grille Restaurant', 1, '2019-05-14 07:48:44', '2019-05-14 07:48:44', 'grille_restaurant', NULL),
(775, 'Grocery Shopping and Delivery', 1, '2019-05-14 07:48:44', '2019-05-14 07:48:44', 'grocery_shopping_and_delivery', NULL),
(776, 'Grocery Store', 1, '2019-05-14 07:48:44', '2019-05-14 07:48:44', 'grocery_store', NULL),
(777, 'Grooming', 1, '2019-05-14 07:48:44', '2019-05-14 07:48:44', 'grooming', NULL),
(778, 'Grooming Appliance', 1, '2019-05-14 07:48:44', '2019-05-14 07:48:44', 'grooming_appliance', NULL),
(779, 'Guitar Lessons', 1, '2019-05-14 07:48:44', '2019-05-14 07:48:44', 'guitar_lessons', NULL),
(780, 'Gun Store', 1, '2019-05-14 07:48:44', '2019-05-14 07:48:44', 'gun_store', NULL),
(781, 'Gutter Cleaning', 1, '2019-05-14 07:48:44', '2019-05-14 07:48:44', 'gutter_cleaning', NULL),
(782, 'Gym Equipment', 1, '2019-05-14 07:48:44', '2019-05-14 07:48:44', 'gym_equipment', NULL),
(783, 'Gynecologist', 1, '2019-05-14 07:48:44', '2019-05-14 07:48:44', 'gynecologist', NULL),
(784, 'Hair & Beauty Salon', 1, '2019-05-14 07:48:44', '2019-05-14 07:48:44', 'hair_&_beauty_salon', NULL),
(785, 'Hair & Makeup Artist', 1, '2019-05-14 07:48:44', '2019-05-14 07:48:44', 'hair_&_makeup_artist', NULL),
(786, 'Hair Accessories', 1, '2019-05-14 07:48:44', '2019-05-14 07:48:44', 'hair_accessories', NULL),
(787, 'Hair Brushes & Combs', 1, '2019-05-14 07:48:44', '2019-05-14 07:48:44', 'hair_brushes_&_combs', NULL),
(788, 'Hair Care', 1, '2019-05-14 07:48:44', '2019-05-14 07:48:44', 'hair_care', NULL),
(789, 'Hair Care Accessories', 1, '2019-05-14 07:48:44', '2019-05-14 07:48:44', 'hair_care_accessories', NULL),
(790, 'Hair Coloring', 1, '2019-05-14 07:48:44', '2019-05-14 07:48:44', 'hair_coloring', NULL),
(791, 'Hair Conditioner', 1, '2019-05-14 07:48:44', '2019-05-14 07:48:44', 'hair_conditioner', NULL),
(792, 'Hair Dryer & Styling', 1, '2019-05-14 07:48:44', '2019-05-14 07:48:44', 'hair_dryer_&_styling', NULL),
(793, 'Hair Dryers', 1, '2019-05-14 07:48:44', '2019-05-14 07:48:44', 'hair_dryers', NULL),
(794, 'Hair Extensions & Wigs', 1, '2019-05-14 07:48:44', '2019-05-14 07:48:44', 'hair_extensions_&_wigs', NULL),
(795, 'Hair Loss Clinic', 1, '2019-05-14 07:48:44', '2019-05-14 07:48:44', 'hair_loss_clinic', NULL),
(796, 'Hair Removal', 1, '2019-05-14 07:48:44', '2019-05-14 07:48:44', 'hair_removal', NULL),
(797, 'Hair Removal Appliances', 1, '2019-05-14 07:48:44', '2019-05-14 07:48:44', 'hair_removal_appliances', NULL),
(798, 'Hair Replacement', 1, '2019-05-14 07:48:44', '2019-05-14 07:48:44', 'hair_replacement', NULL),
(799, 'Hair Salon Equipment', 1, '2019-05-14 07:48:44', '2019-05-14 07:48:44', 'hair_salon_equipment', NULL),
(800, 'Hair Styling', 1, '2019-05-14 07:48:44', '2019-05-14 07:48:44', 'hair_styling', NULL),
(801, 'Hair Treatments', 1, '2019-05-14 07:48:44', '2019-05-14 07:48:44', 'hair_treatments', NULL),
(802, 'Hairdresser - Mens', 1, '2019-05-14 07:48:44', '2019-05-14 07:48:44', 'hairdresser_-_mens', NULL),
(803, 'Hairdresser - Womens', 1, '2019-05-14 07:48:44', '2019-05-14 07:48:44', 'hairdresser_-_womens', NULL),
(804, 'Hairdressing Salon', 1, '2019-05-14 07:48:44', '2019-05-14 07:48:44', 'hairdressing_salon', NULL),
(805, 'Hairdressing Supplies', 1, '2019-05-14 07:48:44', '2019-05-14 07:48:44', 'hairdressing_supplies', NULL),
(806, 'Hamburger Restaurant', 1, '2019-05-14 07:48:44', '2019-05-14 07:48:44', 'hamburger_restaurant', NULL),
(807, 'Hand Care', 1, '2019-05-14 07:48:44', '2019-05-14 07:48:44', 'hand_care', NULL),
(808, 'Hand Dryers', 1, '2019-05-14 07:48:44', '2019-05-14 07:48:44', 'hand_dryers', NULL),
(809, 'Hand Tools', 1, '2019-05-14 07:48:44', '2019-05-14 07:48:44', 'hand_tools', NULL),
(810, 'Handbags', 1, '2019-05-14 07:48:44', '2019-05-14 07:48:44', 'handbags', NULL),
(811, 'Handbags & Messenger Bags', 1, '2019-05-14 07:48:44', '2019-05-14 07:48:44', 'handbags_&_messenger_bags', NULL),
(812, 'Handles', 1, '2019-05-14 07:48:44', '2019-05-14 07:48:44', 'handles', NULL),
(813, 'Handmade Crafter', 1, '2019-05-14 07:48:44', '2019-05-14 07:48:44', 'handmade_crafter', NULL),
(814, 'Handyman', 1, '2019-05-14 07:48:44', '2019-05-14 07:48:44', 'handyman', NULL),
(815, 'Hardware', 1, '2019-05-14 07:48:44', '2019-05-14 07:48:44', 'hardware', NULL),
(816, 'Hardware Store', 1, '2019-05-14 07:48:44', '2019-05-14 07:48:44', 'hardware_store', NULL),
(817, 'Hat Making Business', 1, '2019-05-14 07:48:44', '2019-05-14 07:48:44', 'hat_making_business', NULL),
(818, 'Hats & Caps', 1, '2019-05-14 07:48:44', '2019-05-14 07:48:44', 'hats_&_caps', NULL),
(819, 'HDPE', 1, '2019-05-14 07:48:44', '2019-05-14 07:48:44', 'hdpe', NULL),
(820, 'Headphones & Headsets', 1, '2019-05-14 07:48:44', '2019-05-14 07:48:44', 'headphones_&_headsets', NULL),
(821, 'Health & Fitness Center', 1, '2019-05-14 07:48:44', '2019-05-14 07:48:44', 'health_&_fitness_center', NULL),
(822, 'Health & Lifestyle Retreat', 1, '2019-05-14 07:48:44', '2019-05-14 07:48:44', 'health_&_lifestyle_retreat', NULL),
(823, 'Health Care Supplement', 1, '2019-05-14 07:48:44', '2019-05-14 07:48:44', 'health_care_supplement', NULL),
(824, 'Health Care Supplies', 1, '2019-05-14 07:48:44', '2019-05-14 07:48:44', 'health_care_supplies', NULL),
(825, 'Health Food Shop', 1, '2019-05-14 07:48:44', '2019-05-14 07:48:44', 'health_food_shop', NULL),
(826, 'Health Insurance', 1, '2019-05-14 07:48:44', '2019-05-14 07:48:44', 'health_insurance', NULL),
(827, 'Health Monitors & Tests', 1, '2019-05-14 07:48:44', '2019-05-14 07:48:44', 'health_monitors_&_tests', NULL),
(828, 'Health Products', 1, '2019-05-14 07:48:44', '2019-05-14 07:48:44', 'health_products', NULL),
(829, 'Health Services', 1, '2019-05-14 07:48:44', '2019-05-14 07:48:44', 'health_services', NULL),
(830, 'Hearing Aids', 1, '2019-05-14 07:48:44', '2019-05-14 07:48:44', 'hearing_aids', NULL),
(831, 'Heat Insulation Materials', 1, '2019-05-14 07:48:44', '2019-05-14 07:48:44', 'heat_insulation_materials', NULL),
(832, 'Heels', 1, '2019-05-14 07:48:44', '2019-05-14 07:48:44', 'heels', NULL),
(833, 'Helicopter Hire', 1, '2019-05-14 07:48:44', '2019-05-14 07:48:44', 'helicopter_hire', NULL),
(834, 'Helicopter Tour', 1, '2019-05-14 07:48:44', '2019-05-14 07:48:44', 'helicopter_tour', NULL),
(835, 'Helmet', 1, '2019-05-14 07:48:44', '2019-05-14 07:48:44', 'helmet', NULL),
(836, 'Hematologist', 1, '2019-05-14 07:48:44', '2019-05-14 07:48:44', 'hematologist', NULL),
(837, 'Herbal Cigars & Cigarettes', 1, '2019-05-14 07:48:44', '2019-05-14 07:48:44', 'herbal_cigars_&_cigarettes', NULL),
(838, 'Hire Car Service', 1, '2019-05-14 07:48:44', '2019-05-14 07:48:44', 'hire_car_service', NULL),
(839, 'Hire Equipment', 1, '2019-05-14 07:48:44', '2019-05-14 07:48:44', 'hire_equipment', NULL),
(840, 'Hobbies & Games', 1, '2019-05-14 07:48:44', '2019-05-14 07:48:44', 'hobbies_&_games', NULL),
(841, 'Holiday Apartments', 1, '2019-05-14 07:48:44', '2019-05-14 07:48:44', 'holiday_apartments', NULL),
(842, 'Holiday Decorator', 1, '2019-05-14 07:48:44', '2019-05-14 07:48:44', 'holiday_decorator', NULL),
(843, 'Holiday Gifts', 1, '2019-05-14 07:48:44', '2019-05-14 07:48:44', 'holiday_gifts', NULL),
(844, 'Holiday Lighting', 1, '2019-05-14 07:48:44', '2019-05-14 07:48:44', 'holiday_lighting', NULL),
(845, 'Home Appliance Parts', 1, '2019-05-14 07:48:44', '2019-05-14 07:48:44', 'home_appliance_parts', NULL),
(846, 'Home Appliances Stocks', 1, '2019-05-14 07:48:44', '2019-05-14 07:48:44', 'home_appliances_stocks', NULL),
(847, 'Home Audio, Video & Accessories', 1, '2019-05-14 07:48:44', '2019-05-14 07:48:44', 'home_audio,_video_&_accessories', NULL),
(848, 'Home Bakery', 1, '2019-05-14 07:48:44', '2019-05-14 07:48:44', 'home_bakery', NULL),
(849, 'Home Baking & Suger', 1, '2019-05-14 07:48:44', '2019-05-14 07:48:44', 'home_baking_&_suger', NULL),
(850, 'Home Cleaning Services', 1, '2019-05-14 07:48:44', '2019-05-14 07:48:44', 'home_cleaning_services', NULL),
(851, 'Home Contractor', 1, '2019-05-14 07:48:44', '2019-05-14 07:48:44', 'home_contractor', NULL),
(852, 'Home Decor', 1, '2019-05-14 07:48:44', '2019-05-14 07:48:44', 'home_decor', NULL),
(853, 'Home Decoration', 1, '2019-05-14 07:48:44', '2019-05-14 07:48:44', 'home_decoration', NULL),
(854, 'Home Electronics', 1, '2019-05-14 07:48:44', '2019-05-14 07:48:44', 'home_electronics', NULL),
(855, 'Home Entertainment', 1, '2019-05-14 07:48:44', '2019-05-14 07:48:44', 'home_entertainment', NULL),
(856, 'Home Entertainment Installation', 1, '2019-05-14 07:48:44', '2019-05-14 07:48:44', 'home_entertainment_installation', NULL),
(857, 'Home Furnishings', 1, '2019-05-14 07:48:44', '2019-05-14 07:48:44', 'home_furnishings', NULL),
(858, 'Home Furniture', 1, '2019-05-14 07:48:44', '2019-05-14 07:48:44', 'home_furniture', NULL),
(859, 'Home Heaters', 1, '2019-05-14 07:48:44', '2019-05-14 07:48:44', 'home_heaters', NULL),
(860, 'Home Inspection Business', 1, '2019-05-14 07:48:44', '2019-05-14 07:48:44', 'home_inspection_business', NULL),
(861, 'Home Landscaping', 1, '2019-05-14 07:48:44', '2019-05-14 07:48:44', 'home_landscaping', NULL),
(862, 'Home Loan Broker', 1, '2019-05-14 07:48:44', '2019-05-14 07:48:44', 'home_loan_broker', NULL),
(863, 'Home Maintenance Equipment Rental', 1, '2019-05-14 07:48:44', '2019-05-14 07:48:44', 'home_maintenance_equipment_rental', NULL),
(864, 'Home Office', 1, '2019-05-14 07:48:44', '2019-05-14 07:48:44', 'home_office', NULL),
(865, 'Home Product Making Machinery', 1, '2019-05-14 07:48:44', '2019-05-14 07:48:44', 'home_product_making_machinery', NULL),
(866, 'Home Stager', 1, '2019-05-14 07:48:44', '2019-05-14 07:48:44', 'home_stager', NULL),
(867, 'Home Staging Business', 1, '2019-05-14 07:48:44', '2019-05-14 07:48:44', 'home_staging_business', NULL),
(868, 'Home Storage & Organization', 1, '2019-05-14 07:48:44', '2019-05-14 07:48:44', 'home_storage_&_organization', NULL),
(869, 'Home Textile', 1, '2019-05-14 07:48:44', '2019-05-14 07:48:44', 'home_textile', NULL),
(870, 'Home Theater Designer', 1, '2019-05-14 07:48:44', '2019-05-14 07:48:44', 'home_theater_designer', NULL),
(871, 'Home Theatre', 1, '2019-05-14 07:48:44', '2019-05-14 07:48:44', 'home_theatre', NULL),
(872, 'Home Tutoring', 1, '2019-05-14 07:48:44', '2019-05-14 07:48:44', 'home_tutoring', NULL),
(873, 'Home Weatherization Professional', 1, '2019-05-14 07:48:44', '2019-05-14 07:48:44', 'home_weatherization_professional', NULL),
(874, 'Home-Based Child Care Provider', 1, '2019-05-14 07:48:44', '2019-05-14 07:48:44', 'home-based_child_care_provider', NULL),
(875, 'Homeopath', 1, '2019-05-14 07:48:44', '2019-05-14 07:48:44', 'homeopath', NULL),
(876, 'Homeschool Teacher', 1, '2019-05-14 07:48:44', '2019-05-14 07:48:44', 'homeschool_teacher', NULL),
(877, 'Homewares', 1, '2019-05-14 07:48:44', '2019-05-14 07:48:44', 'homewares', NULL),
(878, 'Honey Products', 1, '2019-05-14 07:48:44', '2019-05-14 07:48:44', 'honey_products', NULL),
(879, 'Hospice', 1, '2019-05-14 07:48:44', '2019-05-14 07:48:44', 'hospice', NULL),
(880, 'Hot Air Balloon Rides', 1, '2019-05-14 07:48:44', '2019-05-14 07:48:44', 'hot_air_balloon_rides', NULL),
(881, 'Hot Chocolate Drinks', 1, '2019-05-14 07:48:44', '2019-05-14 07:48:44', 'hot_chocolate_drinks', NULL),
(882, 'Hot Stamping Foil', 1, '2019-05-14 07:48:44', '2019-05-14 07:48:44', 'hot_stamping_foil', NULL),
(883, 'Hotel', 1, '2019-05-14 07:48:44', '2019-05-14 07:48:44', 'hotel', NULL),
(884, 'Hotel Amenities', 1, '2019-05-14 07:48:44', '2019-05-14 07:48:44', 'hotel_amenities', NULL),
(885, 'Hotels & Motels', 1, '2019-05-14 07:48:44', '2019-05-14 07:48:44', 'hotels_&_motels', NULL),
(886, 'Hotels and Meeting Facilities', 1, '2019-05-14 07:48:44', '2019-05-14 07:48:44', 'hotels_and_meeting_facilities', NULL),
(887, 'House Cleaning', 1, '2019-05-14 07:48:44', '2019-05-14 07:48:44', 'house_cleaning', NULL),
(888, 'House Painter', 1, '2019-05-14 07:48:44', '2019-05-14 07:48:44', 'house_painter', NULL),
(889, 'House Painting', 1, '2019-05-14 07:48:44', '2019-05-14 07:48:44', 'house_painting', NULL),
(890, 'Household Chemicals', 1, '2019-05-14 07:48:44', '2019-05-14 07:48:44', 'household_chemicals', NULL),
(891, 'Household Cleaning Tools & Accessories', 1, '2019-05-14 07:48:44', '2019-05-14 07:48:44', 'household_cleaning_tools_&_accessories', NULL),
(892, 'Household Sundries', 1, '2019-05-14 07:48:44', '2019-05-14 07:48:44', 'household_sundries', NULL),
(893, 'Housekeeper', 1, '2019-05-14 07:48:44', '2019-05-14 07:48:44', 'housekeeper', NULL),
(894, 'Housing Operations', 1, '2019-05-14 07:48:44', '2019-05-14 07:48:44', 'housing_operations', NULL),
(895, 'Human Resources', 1, '2019-05-14 07:48:44', '2019-05-14 07:48:44', 'human_resources', NULL),
(896, 'Humidifier', 1, '2019-05-14 07:48:44', '2019-05-14 07:48:44', 'humidifier', NULL),
(897, 'HVAC Systems & Parts', 1, '2019-05-14 07:48:44', '2019-05-14 07:48:44', 'hvac_systems_&_parts', NULL),
(898, 'Hydraulic Equipment & Supplies', 1, '2019-05-14 07:48:44', '2019-05-14 07:48:44', 'hydraulic_equipment_&_supplies', NULL),
(899, 'Hydroponic Equipment & Supplies', 1, '2019-05-14 07:48:44', '2019-05-14 07:48:44', 'hydroponic_equipment_&_supplies', NULL),
(900, 'Hypnotherapy', 1, '2019-05-14 07:48:44', '2019-05-14 07:48:44', 'hypnotherapy', NULL),
(901, 'Ice Cream Parlor', 1, '2019-05-14 07:48:44', '2019-05-14 07:48:44', 'ice_cream_parlor', NULL),
(902, 'Ice Cream Shop', 1, '2019-05-14 07:48:44', '2019-05-14 07:48:44', 'ice_cream_shop', NULL),
(903, 'Immunologist', 1, '2019-05-14 07:48:44', '2019-05-14 07:48:44', 'immunologist', NULL),
(904, 'Implants & Interventional Materials', 1, '2019-05-14 07:48:44', '2019-05-14 07:48:44', 'implants_&_interventional_materials', NULL),
(905, 'Import/Export Business', 1, '2019-05-14 07:48:44', '2019-05-14 07:48:44', 'import/export_business', NULL),
(906, 'In-Dash DVD & Video', 1, '2019-05-14 07:48:44', '2019-05-14 07:48:44', 'in-dash_dvd_&_video', NULL),
(907, 'Indian Restaurant', 1, '2019-05-14 07:48:44', '2019-05-14 07:48:44', 'indian_restaurant', NULL),
(908, 'Indian Supermarket', 1, '2019-05-14 07:48:44', '2019-05-14 07:48:44', 'indian_supermarket', NULL),
(909, 'Indonesian Restaurant', 1, '2019-05-14 07:48:44', '2019-05-14 07:48:44', 'indonesian_restaurant', NULL),
(910, 'Indoor Climbers & Structures', 1, '2019-05-14 07:48:44', '2019-05-14 07:48:44', 'indoor_climbers_&_structures', NULL),
(911, 'Indoor Lighting', 1, '2019-05-14 07:48:44', '2019-05-14 07:48:44', 'indoor_lighting', NULL),
(912, 'Indoor Sports', 1, '2019-05-14 07:48:44', '2019-05-14 07:48:44', 'indoor_sports', NULL),
(913, 'Industrial Brake', 1, '2019-05-14 07:48:44', '2019-05-14 07:48:44', 'industrial_brake', NULL),
(914, 'Industrial Controls', 1, '2019-05-14 07:48:44', '2019-05-14 07:48:44', 'industrial_controls', NULL),
(915, 'Industrial Fuel', 1, '2019-05-14 07:48:44', '2019-05-14 07:48:44', 'industrial_fuel', NULL),
(916, 'Industry Laser Equipment', 1, '2019-05-14 07:48:44', '2019-05-14 07:48:44', 'industry_laser_equipment', NULL),
(917, 'Infant & Toddlers Clothing', 1, '2019-05-14 07:48:44', '2019-05-14 07:48:44', 'infant_&_toddlers_clothing', NULL),
(918, 'Inflatable Bouncers', 1, '2019-05-14 07:48:44', '2019-05-14 07:48:44', 'inflatable_bouncers', NULL),
(919, 'Inflatable Furniture', 1, '2019-05-14 07:48:44', '2019-05-14 07:48:44', 'inflatable_furniture', NULL),
(920, 'Inflatable Toys', 1, '2019-05-14 07:48:44', '2019-05-14 07:48:44', 'inflatable_toys', NULL),
(921, 'Ingots', 1, '2019-05-14 07:48:44', '2019-05-14 07:48:44', 'ingots', NULL),
(922, 'In-Home Hair Stylist', 1, '2019-05-14 07:48:44', '2019-05-14 07:48:44', 'in-home_hair_stylist', NULL),
(923, 'In-Home Masseuse', 1, '2019-05-14 07:48:44', '2019-05-14 07:48:44', 'in-home_masseuse', NULL),
(924, 'In-Home Physical Therapist', 1, '2019-05-14 07:48:44', '2019-05-14 07:48:44', 'in-home_physical_therapist', NULL),
(925, 'Ink & Toners', 1, '2019-05-14 07:48:44', '2019-05-14 07:48:44', 'ink_&_toners', NULL),
(926, 'Ink and Toner Cartridge Refilling', 1, '2019-05-14 07:48:44', '2019-05-14 07:48:44', 'ink_and_toner_cartridge_refilling', NULL),
(927, 'Instagram Marketing Strategist', 1, '2019-05-14 07:48:44', '2019-05-14 07:48:44', 'instagram_marketing_strategist', NULL),
(928, 'Instant & Ready-to-Eat', 1, '2019-05-14 07:48:44', '2019-05-14 07:48:44', 'instant_&_ready-to-eat', NULL),
(929, 'Instant Camera', 1, '2019-05-14 07:48:44', '2019-05-14 07:48:44', 'instant_camera', NULL),
(930, 'Instant Food', 1, '2019-05-14 07:48:44', '2019-05-14 07:48:44', 'instant_food', NULL),
(931, 'Instant Signs', 1, '2019-05-14 07:48:44', '2019-05-14 07:48:44', 'instant_signs', NULL),
(932, 'Institutional Research', 1, '2019-05-14 07:48:44', '2019-05-14 07:48:44', 'institutional_research', NULL),
(933, 'Insulation', 1, '2019-05-14 07:48:44', '2019-05-14 07:48:44', 'insulation', NULL),
(934, 'Insulation Products', 1, '2019-05-14 07:48:44', '2019-05-14 07:48:44', 'insulation_products', NULL),
(935, 'Interior Accessories', 1, '2019-05-14 07:48:44', '2019-05-14 07:48:44', 'interior_accessories', NULL),
(936, 'Interior Decorating', 1, '2019-05-14 07:48:44', '2019-05-14 07:48:44', 'interior_decorating', NULL),
(937, 'Interior Decorator', 1, '2019-05-14 07:48:44', '2019-05-14 07:48:44', 'interior_decorator', NULL),
(938, 'Interior Room Painting/Wallpapering', 1, '2019-05-14 07:48:44', '2019-05-14 07:48:44', 'interior_room_painting/wallpapering', NULL),
(939, 'Internal Hard Drives', 1, '2019-05-14 07:48:44', '2019-05-14 07:48:44', 'internal_hard_drives', NULL),
(940, 'International Restaurant', 1, '2019-05-14 07:48:44', '2019-05-14 07:48:44', 'international_restaurant', NULL),
(941, 'Internet Marketing', 1, '2019-05-14 07:48:44', '2019-05-14 07:48:44', 'internet_marketing', NULL),
(942, 'Internet Marketing Specialist', 1, '2019-05-14 07:48:44', '2019-05-14 07:48:44', 'internet_marketing_specialist', NULL),
(943, 'Internet Researcher', 1, '2019-05-14 07:48:44', '2019-05-14 07:48:44', 'internet_researcher', NULL),
(944, 'Introduction Agency', 1, '2019-05-14 07:48:44', '2019-05-14 07:48:44', 'introduction_agency', NULL),
(945, 'Invisible Fencing Sales and Installation', 1, '2019-05-14 07:48:44', '2019-05-14 07:48:44', 'invisible_fencing_sales_and_installation', NULL),
(946, 'IP Security Cameras', 1, '2019-05-14 07:48:44', '2019-05-14 07:48:44', 'ip_security_cameras', NULL),
(947, 'Irish Restaurant', 1, '2019-05-14 07:48:44', '2019-05-14 07:48:44', 'irish_restaurant', NULL),
(948, 'Iron', 1, '2019-05-14 07:48:44', '2019-05-14 07:48:44', 'iron', NULL),
(949, 'Ironing Boards', 1, '2019-05-14 07:48:44', '2019-05-14 07:48:44', 'ironing_boards', NULL),
(950, 'Irons', 1, '2019-05-14 07:48:44', '2019-05-14 07:48:44', 'irons', NULL),
(951, 'Italian Restaurant', 1, '2019-05-14 07:48:44', '2019-05-14 07:48:44', 'italian_restaurant', NULL),
(952, 'Janitorial', 1, '2019-05-14 07:48:44', '2019-05-14 07:48:44', 'janitorial', NULL),
(953, 'Japanese Restaurant', 1, '2019-05-14 07:48:44', '2019-05-14 07:48:44', 'japanese_restaurant', NULL),
(954, 'Jarred Food', 1, '2019-05-14 07:48:44', '2019-05-14 07:48:44', 'jarred_food', NULL),
(955, 'Jars', 1, '2019-05-14 07:48:44', '2019-05-14 07:48:44', 'jars', NULL),
(956, 'Jeans', 1, '2019-05-14 07:48:44', '2019-05-14 07:48:44', 'jeans', NULL),
(957, 'Jet Ski Rentals', 1, '2019-05-14 07:48:44', '2019-05-14 07:48:44', 'jet_ski_rentals', NULL),
(958, 'Jewelery Shop', 1, '2019-05-14 07:48:44', '2019-05-14 07:48:44', 'jewelery_shop', NULL),
(959, 'Jewelry', 1, '2019-05-14 07:48:44', '2019-05-14 07:48:44', 'jewelry', NULL),
(960, 'Jewelry Boxes', 1, '2019-05-14 07:48:44', '2019-05-14 07:48:44', 'jewelry_boxes', NULL),
(961, 'Jewelry Designer', 1, '2019-05-14 07:48:44', '2019-05-14 07:48:44', 'jewelry_designer', NULL),
(962, 'Jewelry Sets', 1, '2019-05-14 07:48:44', '2019-05-14 07:48:44', 'jewelry_sets', NULL),
(963, 'Jewelry Tools & Equipment', 1, '2019-05-14 07:48:44', '2019-05-14 07:48:44', 'jewelry_tools_&_equipment', NULL),
(964, 'Joggers & Sweats', 1, '2019-05-14 07:48:44', '2019-05-14 07:48:44', 'joggers_&_sweats', NULL),
(965, 'Juice Bar', 1, '2019-05-14 07:48:44', '2019-05-14 07:48:44', 'juice_bar', NULL),
(966, 'Juicer & Fruit Extraction', 1, '2019-05-14 07:48:44', '2019-05-14 07:48:44', 'juicer_&_fruit_extraction', NULL),
(967, 'Key Chains', 1, '2019-05-14 07:48:44', '2019-05-14 07:48:44', 'key_chains', NULL),
(968, 'Key Control Systems', 1, '2019-05-14 07:48:44', '2019-05-14 07:48:44', 'key_control_systems', NULL),
(969, 'Keyboards', 1, '2019-05-14 07:48:44', '2019-05-14 07:48:44', 'keyboards', NULL),
(970, 'Khussa & Kohlapuri', 1, '2019-05-14 07:48:44', '2019-05-14 07:48:44', 'khussa_&_kohlapuri', NULL),
(971, 'Kids Accessories', 1, '2019-05-14 07:48:44', '2019-05-14 07:48:44', 'kids_accessories', NULL),
(972, 'Kids Bag', 1, '2019-05-14 07:48:44', '2019-05-14 07:48:44', 'kids_bag', NULL),
(973, 'Kids Clothing', 1, '2019-05-14 07:48:44', '2019-05-14 07:48:44', 'kids_clothing', NULL),
(974, 'Kids Furnishings', 1, '2019-05-14 07:48:44', '2019-05-14 07:48:44', 'kids_furnishings', NULL),
(975, 'Kids Parties & Entertainment', 1, '2019-05-14 07:48:44', '2019-05-14 07:48:44', 'kids_parties_&_entertainment', NULL),
(976, 'Kids Shoes', 1, '2019-05-14 07:48:44', '2019-05-14 07:48:44', 'kids_shoes', NULL),
(977, 'Kids Sunglasses', 1, '2019-05-14 07:48:44', '2019-05-14 07:48:44', 'kids_sunglasses', NULL),
(978, 'Kindergarten', 1, '2019-05-14 07:48:44', '2019-05-14 07:48:44', 'kindergarten', NULL),
(979, 'Kitchen', 1, '2019-05-14 07:48:44', '2019-05-14 07:48:44', 'kitchen', NULL),
(980, 'Kitchen & Dining', 1, '2019-05-14 07:48:44', '2019-05-14 07:48:44', 'kitchen_&_dining', NULL),
(981, 'Kitchen & Table Linen', 1, '2019-05-14 07:48:44', '2019-05-14 07:48:44', 'kitchen_&_table_linen', NULL),
(982, 'Kitchen Accessories', 1, '2019-05-14 07:48:44', '2019-05-14 07:48:44', 'kitchen_accessories', NULL);
INSERT INTO `fau_tags` (`id`, `name`, `is_active`, `created_at`, `updated_at`, `title`, `category_id`) VALUES
(983, 'Kitchen Appliances', 1, '2019-05-14 07:48:44', '2019-05-14 07:48:44', 'kitchen_appliances', NULL),
(984, 'Kitchen Design & Renovation', 1, '2019-05-14 07:48:44', '2019-05-14 07:48:44', 'kitchen_design_&_renovation', NULL),
(985, 'Kitchen Knives & Accessories', 1, '2019-05-14 07:48:44', '2019-05-14 07:48:44', 'kitchen_knives_&_accessories', NULL),
(986, 'Kitchen Storage & Accessori…', 1, '2019-05-14 07:48:44', '2019-05-14 07:48:44', 'kitchen_storage_&_accessori…', NULL),
(987, 'Kitchen Utensils', 1, '2019-05-14 07:48:44', '2019-05-14 07:48:44', 'kitchen_utensils', NULL),
(988, 'Knife', 1, '2019-05-14 07:48:44', '2019-05-14 07:48:44', 'knife', NULL),
(989, 'Knitting & Crocheting', 1, '2019-05-14 07:48:44', '2019-05-14 07:48:44', 'knitting_&_crocheting', NULL),
(990, 'Knitting/Crocheting Lessons', 1, '2019-05-14 07:48:44', '2019-05-14 07:48:44', 'knitting/crocheting_lessons', NULL),
(991, 'Knives & Accessories', 1, '2019-05-14 07:48:44', '2019-05-14 07:48:44', 'knives_&_accessories', NULL),
(992, 'Korean Restaurant', 1, '2019-05-14 07:48:44', '2019-05-14 07:48:44', 'korean_restaurant', NULL),
(993, 'Kurtas', 1, '2019-05-14 07:48:44', '2019-05-14 07:48:44', 'kurtas', NULL),
(994, 'Kurtis', 1, '2019-05-14 07:48:44', '2019-05-14 07:48:44', 'kurtis', NULL),
(995, 'Lacquerware', 1, '2019-05-14 07:48:44', '2019-05-14 07:48:44', 'lacquerware', NULL),
(996, 'Ladders & Scaffoldings', 1, '2019-05-14 07:48:44', '2019-05-14 07:48:44', 'ladders_&_scaffoldings', NULL),
(997, 'Lamp Shades', 1, '2019-05-14 07:48:44', '2019-05-14 07:48:44', 'lamp_shades', NULL),
(998, 'Landscape Architect', 1, '2019-05-14 07:48:44', '2019-05-14 07:48:44', 'landscape_architect', NULL),
(999, 'Landscape Designer', 1, '2019-05-14 07:48:44', '2019-05-14 07:48:44', 'landscape_designer', NULL),
(1000, 'Landscape Gardener', 1, '2019-05-14 07:48:44', '2019-05-14 07:48:44', 'landscape_gardener', NULL),
(1001, 'Landscaping Stone', 1, '2019-05-14 07:48:44', '2019-05-14 07:48:44', 'landscaping_stone', NULL),
(1002, 'Landscaping Supplies', 1, '2019-05-14 07:48:44', '2019-05-14 07:48:44', 'landscaping_supplies', NULL),
(1003, 'Language Translation', 1, '2019-05-14 07:48:44', '2019-05-14 07:48:44', 'language_translation', NULL),
(1004, 'Lanyard', 1, '2019-05-14 07:48:44', '2019-05-14 07:48:44', 'lanyard', NULL),
(1005, 'Laptops&Notebooks', 1, '2019-05-14 07:48:44', '2019-05-14 07:48:44', 'laptops&notebooks', NULL),
(1006, 'Laser Eye Correction', 1, '2019-05-14 07:48:44', '2019-05-14 07:48:44', 'laser_eye_correction', NULL),
(1007, 'Laser Hair Removal', 1, '2019-05-14 07:48:44', '2019-05-14 07:48:44', 'laser_hair_removal', NULL),
(1008, 'Laundromat', 1, '2019-05-14 07:48:44', '2019-05-14 07:48:44', 'laundromat', NULL),
(1009, 'Laundry', 1, '2019-05-14 07:48:44', '2019-05-14 07:48:44', 'laundry', NULL),
(1010, 'Laundry Appliances', 1, '2019-05-14 07:48:44', '2019-05-14 07:48:44', 'laundry_appliances', NULL),
(1011, 'Laundry Baskets & Hampers', 1, '2019-05-14 07:48:44', '2019-05-14 07:48:44', 'laundry_baskets_&_hampers', NULL),
(1012, 'Laundry Products', 1, '2019-05-14 07:48:45', '2019-05-14 07:48:45', 'laundry_products', NULL),
(1013, 'Lawn & Garden', 1, '2019-05-14 07:48:45', '2019-05-14 07:48:45', 'lawn_&_garden', NULL),
(1014, 'Lawn and Turf Supplies', 1, '2019-05-14 07:48:45', '2019-05-14 07:48:45', 'lawn_and_turf_supplies', NULL),
(1015, 'Lawn Care Specialist', 1, '2019-05-14 07:48:45', '2019-05-14 07:48:45', 'lawn_care_specialist', NULL),
(1016, 'Lawn Mower', 1, '2019-05-14 07:48:45', '2019-05-14 07:48:45', 'lawn_mower', NULL),
(1017, 'Lawn Mowing', 1, '2019-05-14 07:48:45', '2019-05-14 07:48:45', 'lawn_mowing', NULL),
(1018, 'LDPE', 1, '2019-05-14 07:48:45', '2019-05-14 07:48:45', 'ldpe', NULL),
(1019, 'Lead', 1, '2019-05-14 07:48:45', '2019-05-14 07:48:45', 'lead', NULL),
(1020, 'Lead Generator for Local Businesses', 1, '2019-05-14 07:48:45', '2019-05-14 07:48:45', 'lead_generator_for_local_businesses', NULL),
(1021, 'Leadlights & Stained Glass', 1, '2019-05-14 07:48:45', '2019-05-14 07:48:45', 'leadlights_&_stained_glass', NULL),
(1022, 'Leaflet distributing', 1, '2019-05-14 07:48:45', '2019-05-14 07:48:45', 'leaflet_distributing', NULL),
(1023, 'Leashes,Collars & Muzzles', 1, '2019-05-14 07:48:45', '2019-05-14 07:48:45', 'leashes,collars_&_muzzles', NULL),
(1024, 'Leather', 1, '2019-05-14 07:48:45', '2019-05-14 07:48:45', 'leather', NULL),
(1025, 'Leather Gloves & Mittens', 1, '2019-05-14 07:48:45', '2019-05-14 07:48:45', 'leather_gloves_&_mittens', NULL),
(1026, 'Leather Product', 1, '2019-05-14 07:48:45', '2019-05-14 07:48:45', 'leather_product', NULL),
(1027, 'Lebanese Restaurant', 1, '2019-05-14 07:48:45', '2019-05-14 07:48:45', 'lebanese_restaurant', NULL),
(1028, 'LED Encapsulation Series', 1, '2019-05-14 07:48:45', '2019-05-14 07:48:45', 'led_encapsulation_series', NULL),
(1029, 'LED Landscape Lamps', 1, '2019-05-14 07:48:45', '2019-05-14 07:48:45', 'led_landscape_lamps', NULL),
(1030, 'LED Lighting', 1, '2019-05-14 07:48:45', '2019-05-14 07:48:45', 'led_lighting', NULL),
(1031, 'LED Outdoor Lighting', 1, '2019-05-14 07:48:45', '2019-05-14 07:48:45', 'led_outdoor_lighting', NULL),
(1032, 'LED Professional Lighting', 1, '2019-05-14 07:48:45', '2019-05-14 07:48:45', 'led_professional_lighting', NULL),
(1033, 'LED Residential Lighting', 1, '2019-05-14 07:48:45', '2019-05-14 07:48:45', 'led_residential_lighting', NULL),
(1034, 'LED Televisions', 1, '2019-05-14 07:48:45', '2019-05-14 07:48:45', 'led_televisions', NULL),
(1035, 'Legal Process Server', 1, '2019-05-14 07:48:45', '2019-05-14 07:48:45', 'legal_process_server', NULL),
(1036, 'Leggings', 1, '2019-05-14 07:48:45', '2019-05-14 07:48:45', 'leggings', NULL),
(1037, 'Lenses', 1, '2019-05-14 07:48:45', '2019-05-14 07:48:45', 'lenses', NULL),
(1038, 'Letter Pad / Paper', 1, '2019-05-14 07:48:45', '2019-05-14 07:48:45', 'letter_pad_/_paper', NULL),
(1039, 'Lids, Bottle Caps, Closures', 1, '2019-05-14 07:48:45', '2019-05-14 07:48:45', 'lids,_bottle_caps,_closures', NULL),
(1040, 'Life Coach', 1, '2019-05-14 07:48:45', '2019-05-14 07:48:45', 'life_coach', NULL),
(1041, 'Life Coaching', 1, '2019-05-14 07:48:45', '2019-05-14 07:48:45', 'life_coaching', NULL),
(1042, 'Lifting Tools', 1, '2019-05-14 07:48:45', '2019-05-14 07:48:45', 'lifting_tools', NULL),
(1043, 'Light Bulbs', 1, '2019-05-14 07:48:45', '2019-05-14 07:48:45', 'light_bulbs', NULL),
(1044, 'Light Shop', 1, '2019-05-14 07:48:45', '2019-05-14 07:48:45', 'light_shop', NULL),
(1045, 'Lighters & Smoking Accessories', 1, '2019-05-14 07:48:45', '2019-05-14 07:48:45', 'lighters_&_smoking_accessories', NULL),
(1046, 'Lighting & Studio Equipment', 1, '2019-05-14 07:48:45', '2019-05-14 07:48:45', 'lighting_&_studio_equipment', NULL),
(1047, 'Lighting Accessories', 1, '2019-05-14 07:48:45', '2019-05-14 07:48:45', 'lighting_accessories', NULL),
(1048, 'Lighting Bulbs & Tubes', 1, '2019-05-14 07:48:45', '2019-05-14 07:48:45', 'lighting_bulbs_&_tubes', NULL),
(1049, 'Lighting Designer', 1, '2019-05-14 07:48:45', '2019-05-14 07:48:45', 'lighting_designer', NULL),
(1050, 'Lighting Fixtures & Compon…', 1, '2019-05-14 07:48:45', '2019-05-14 07:48:45', 'lighting_fixtures_&_compon…', NULL),
(1051, 'Light-Up Toys', 1, '2019-05-14 07:48:45', '2019-05-14 07:48:45', 'light-up_toys', NULL),
(1052, 'Lime', 1, '2019-05-14 07:48:45', '2019-05-14 07:48:45', 'lime', NULL),
(1053, 'Limo Hire', 1, '2019-05-14 07:48:45', '2019-05-14 07:48:45', 'limo_hire', NULL),
(1054, 'Linen & Bedroom Accessories', 1, '2019-05-14 07:48:45', '2019-05-14 07:48:45', 'linen_&_bedroom_accessories', NULL),
(1055, 'Linen, Laundry, & Uniforms', 1, '2019-05-14 07:48:45', '2019-05-14 07:48:45', 'linen,_laundry,_&_uniforms', NULL),
(1056, 'Lingerie Boutique', 1, '2019-05-14 07:48:45', '2019-05-14 07:48:45', 'lingerie_boutique', NULL),
(1057, 'Lingerie Sets', 1, '2019-05-14 07:48:45', '2019-05-14 07:48:45', 'lingerie_sets', NULL),
(1058, 'Lips', 1, '2019-05-14 07:48:45', '2019-05-14 07:48:45', 'lips', NULL),
(1059, 'Liquor Store', 1, '2019-05-14 07:48:45', '2019-05-14 07:48:45', 'liquor_store', NULL),
(1060, 'Litter & Toilet', 1, '2019-05-14 07:48:45', '2019-05-14 07:48:45', 'litter_&_toilet', NULL),
(1061, 'Live Sound & Stage Equipm…', 1, '2019-05-14 07:48:45', '2019-05-14 07:48:45', 'live_sound_&_stage_equipm…', NULL),
(1062, 'Live Sound&Stage Equipm…', 1, '2019-05-14 07:48:45', '2019-05-14 07:48:45', 'live_sound&stage_equipm…', NULL),
(1063, 'Live Video Producer', 1, '2019-05-14 07:48:45', '2019-05-14 07:48:45', 'live_video_producer', NULL),
(1064, 'Living Room', 1, '2019-05-14 07:48:45', '2019-05-14 07:48:45', 'living_room', NULL),
(1065, 'Living Room Furniture', 1, '2019-05-14 07:48:45', '2019-05-14 07:48:45', 'living_room_furniture', NULL),
(1066, 'Local Interest Blog', 1, '2019-05-14 07:48:45', '2019-05-14 07:48:45', 'local_interest_blog', NULL),
(1067, 'Local Tour Guide', 1, '2019-05-14 07:48:45', '2019-05-14 07:48:45', 'local_tour_guide', NULL),
(1068, 'Locks & Keys', 1, '2019-05-14 07:48:45', '2019-05-14 07:48:45', 'locks_&_keys', NULL),
(1069, 'Locksmith', 1, '2019-05-14 07:48:45', '2019-05-14 07:48:45', 'locksmith', NULL),
(1070, 'Locksmith Supplies', 1, '2019-05-14 07:48:45', '2019-05-14 07:48:45', 'locksmith_supplies', NULL),
(1071, 'Locksmiths', 1, '2019-05-14 07:48:45', '2019-05-14 07:48:45', 'locksmiths', NULL),
(1072, 'Loor Heating Systems & Parts', 1, '2019-05-14 07:48:45', '2019-05-14 07:48:45', 'loor_heating_systems_&_parts', NULL),
(1073, 'Loose Beads', 1, '2019-05-14 07:48:45', '2019-05-14 07:48:45', 'loose_beads', NULL),
(1074, 'Loose Gemstone', 1, '2019-05-14 07:48:45', '2019-05-14 07:48:45', 'loose_gemstone', NULL),
(1075, 'Lubricant', 1, '2019-05-14 07:48:45', '2019-05-14 07:48:45', 'lubricant', NULL),
(1076, 'Luggage & Travel Bags', 1, '2019-05-14 07:48:45', '2019-05-14 07:48:45', 'luggage_&_travel_bags', NULL),
(1077, 'Luggage Cart', 1, '2019-05-14 07:48:45', '2019-05-14 07:48:45', 'luggage_cart', NULL),
(1078, 'Luggage Sets', 1, '2019-05-14 07:48:45', '2019-05-14 07:48:45', 'luggage_sets', NULL),
(1079, 'Luggage Shop', 1, '2019-05-14 07:48:45', '2019-05-14 07:48:45', 'luggage_shop', NULL),
(1080, 'Macbooks', 1, '2019-05-14 07:48:45', '2019-05-14 07:48:45', 'macbooks', NULL),
(1081, 'Machine Tool Equipment', 1, '2019-05-14 07:48:45', '2019-05-14 07:48:45', 'machine_tool_equipment', NULL),
(1082, 'Machine Tools Accessory', 1, '2019-05-14 07:48:45', '2019-05-14 07:48:45', 'machine_tools_accessory', NULL),
(1083, 'Magazines', 1, '2019-05-14 07:48:45', '2019-05-14 07:48:45', 'magazines', NULL),
(1084, 'Magnetic Materials', 1, '2019-05-14 07:48:45', '2019-05-14 07:48:45', 'magnetic_materials', NULL),
(1085, 'Makeup', 1, '2019-05-14 07:48:45', '2019-05-14 07:48:45', 'makeup', NULL),
(1086, 'Makeup Accessories', 1, '2019-05-14 07:48:45', '2019-05-14 07:48:45', 'makeup_accessories', NULL),
(1087, 'Makeup Removers', 1, '2019-05-14 07:48:45', '2019-05-14 07:48:45', 'makeup_removers', NULL),
(1088, 'Makeup Tools', 1, '2019-05-14 07:48:45', '2019-05-14 07:48:45', 'makeup_tools', NULL),
(1089, 'Malaysian Restaurant', 1, '2019-05-14 07:48:45', '2019-05-14 07:48:45', 'malaysian_restaurant', NULL),
(1090, 'Man Fragrances', 1, '2019-05-14 07:48:45', '2019-05-14 07:48:45', 'man_fragrances', NULL),
(1091, 'Mannequins', 1, '2019-05-14 07:48:45', '2019-05-14 07:48:45', 'mannequins', NULL),
(1092, 'Man\'s Bags', 1, '2019-05-14 07:48:45', '2019-05-14 07:48:45', 'man\'s_bags', NULL),
(1093, 'Manufacturer', 1, '2019-05-14 07:48:45', '2019-05-14 07:48:45', 'manufacturer', NULL),
(1094, 'Map', 1, '2019-05-14 07:48:45', '2019-05-14 07:48:45', 'map', NULL),
(1095, 'Map Publisher/Distributor', 1, '2019-05-14 07:48:45', '2019-05-14 07:48:45', 'map_publisher/distributor', NULL),
(1096, 'Marijuana Dispensary', 1, '2019-05-14 07:48:45', '2019-05-14 07:48:45', 'marijuana_dispensary', NULL),
(1097, 'Marine Parts & Accessories', 1, '2019-05-14 07:48:45', '2019-05-14 07:48:45', 'marine_parts_&_accessories', NULL),
(1098, 'Market Intelligence', 1, '2019-05-14 07:48:45', '2019-05-14 07:48:45', 'market_intelligence', NULL),
(1099, 'Marketing Agency', 1, '2019-05-14 07:48:45', '2019-05-14 07:48:45', 'marketing_agency', NULL),
(1100, 'Marketing Copywriter', 1, '2019-05-14 07:48:45', '2019-05-14 07:48:45', 'marketing_copywriter', NULL),
(1101, 'Marketing Video Producer', 1, '2019-05-14 07:48:45', '2019-05-14 07:48:45', 'marketing_video_producer', NULL),
(1102, 'Marketing, Public Relations and Sales', 1, '2019-05-14 07:48:45', '2019-05-14 07:48:45', 'marketing,_public_relations_and_sales', NULL),
(1103, 'Marquee Hire', 1, '2019-05-14 07:48:45', '2019-05-14 07:48:45', 'marquee_hire', NULL),
(1104, 'Marriage Celebrant', 1, '2019-05-14 07:48:45', '2019-05-14 07:48:45', 'marriage_celebrant', NULL),
(1105, 'Martial Arts & Self Defense', 1, '2019-05-14 07:48:45', '2019-05-14 07:48:45', 'martial_arts_&_self_defense', NULL),
(1106, 'Martini Bar', 1, '2019-05-14 07:48:45', '2019-05-14 07:48:45', 'martini_bar', NULL),
(1107, 'Masonry Materials', 1, '2019-05-14 07:48:45', '2019-05-14 07:48:45', 'masonry_materials', NULL),
(1108, 'Masonry/Concrete', 1, '2019-05-14 07:48:45', '2019-05-14 07:48:45', 'masonry/concrete', NULL),
(1109, 'Material Handling Tools', 1, '2019-05-14 07:48:45', '2019-05-14 07:48:45', 'material_handling_tools', NULL),
(1110, 'Materials Cosmetics Packaging', 1, '2019-05-14 07:48:45', '2019-05-14 07:48:45', 'materials_cosmetics_packaging', NULL),
(1111, 'Materials Handling Equipment', 1, '2019-05-14 07:48:45', '2019-05-14 07:48:45', 'materials_handling_equipment', NULL),
(1112, 'Maternity Wear', 1, '2019-05-14 07:48:45', '2019-05-14 07:48:45', 'maternity_wear', NULL),
(1113, 'Mattress Protectors', 1, '2019-05-14 07:48:45', '2019-05-14 07:48:45', 'mattress_protectors', NULL),
(1114, 'Mattresses & Bedding', 1, '2019-05-14 07:48:45', '2019-05-14 07:48:45', 'mattresses_&_bedding', NULL),
(1115, 'Meat & Poultry', 1, '2019-05-14 07:48:45', '2019-05-14 07:48:45', 'meat_&_poultry', NULL),
(1116, 'Mechanical', 1, '2019-05-14 07:48:45', '2019-05-14 07:48:45', 'mechanical', NULL),
(1117, 'Mechanical Equipment', 1, '2019-05-14 07:48:45', '2019-05-14 07:48:45', 'mechanical_equipment', NULL),
(1118, 'Media Packaging', 1, '2019-05-14 07:48:45', '2019-05-14 07:48:45', 'media_packaging', NULL),
(1119, 'Medical Center', 1, '2019-05-14 07:48:45', '2019-05-14 07:48:45', 'medical_center', NULL),
(1120, 'Medical Consumable', 1, '2019-05-14 07:48:45', '2019-05-14 07:48:45', 'medical_consumable', NULL),
(1121, 'Medical Cryogenic Equipments', 1, '2019-05-14 07:48:45', '2019-05-14 07:48:45', 'medical_cryogenic_equipments', NULL),
(1122, 'Medical Equipment & Supplies', 1, '2019-05-14 07:48:45', '2019-05-14 07:48:45', 'medical_equipment_&_supplies', NULL),
(1123, 'Medical Software', 1, '2019-05-14 07:48:45', '2019-05-14 07:48:45', 'medical_software', NULL),
(1124, 'Medical Supplies/First Aid', 1, '2019-05-14 07:48:45', '2019-05-14 07:48:45', 'medical_supplies/first_aid', NULL),
(1125, 'Medical Transcriptionist', 1, '2019-05-14 07:48:45', '2019-05-14 07:48:45', 'medical_transcriptionist', NULL),
(1126, 'Medicines', 1, '2019-05-14 07:48:45', '2019-05-14 07:48:45', 'medicines', NULL),
(1127, 'Mediterranean Restaurant', 1, '2019-05-14 07:48:45', '2019-05-14 07:48:45', 'mediterranean_restaurant', NULL),
(1128, 'Memorabillia', 1, '2019-05-14 07:48:45', '2019-05-14 07:48:45', 'memorabillia', NULL),
(1129, 'Memory Cards', 1, '2019-05-14 07:48:45', '2019-05-14 07:48:45', 'memory_cards', NULL),
(1130, 'Men Care', 1, '2019-05-14 07:48:45', '2019-05-14 07:48:45', 'men_care', NULL),
(1131, 'Men Eyeglasses', 1, '2019-05-14 07:48:45', '2019-05-14 07:48:45', 'men_eyeglasses', NULL),
(1132, 'Men Sunglasses', 1, '2019-05-14 07:48:45', '2019-05-14 07:48:45', 'men_sunglasses', NULL),
(1133, 'Men‘s Clothing', 1, '2019-05-14 07:48:45', '2019-05-14 07:48:45', 'men‘s_clothing', NULL),
(1134, 'Mens Clothing', 1, '2019-05-14 07:48:45', '2019-05-14 07:48:45', 'mens_clothing', NULL),
(1135, 'Mens Fashion Accessories', 1, '2019-05-14 07:48:45', '2019-05-14 07:48:45', 'mens_fashion_accessories', NULL),
(1136, 'Mens Shoes', 1, '2019-05-14 07:48:45', '2019-05-14 07:48:45', 'mens_shoes', NULL),
(1137, 'Men\'s Shoes', 1, '2019-05-14 07:48:45', '2019-05-14 07:48:45', 'men\'s_shoes', NULL),
(1138, 'Mens Sports Clothes', 1, '2019-05-14 07:48:45', '2019-05-14 07:48:45', 'mens_sports_clothes', NULL),
(1139, 'Mens Sports Shoes', 1, '2019-05-14 07:48:45', '2019-05-14 07:48:45', 'mens_sports_shoes', NULL),
(1140, 'Mens Watches', 1, '2019-05-14 07:48:45', '2019-05-14 07:48:45', 'mens_watches', NULL),
(1141, 'Metal & Metallurgy Machinery', 1, '2019-05-14 07:48:45', '2019-05-14 07:48:45', 'metal_&_metallurgy_machinery', NULL),
(1142, 'Metal Belts', 1, '2019-05-14 07:48:45', '2019-05-14 07:48:45', 'metal_belts', NULL),
(1143, 'Metal Building Materials', 1, '2019-05-14 07:48:45', '2019-05-14 07:48:45', 'metal_building_materials', NULL),
(1144, 'Metal Furniture', 1, '2019-05-14 07:48:45', '2019-05-14 07:48:45', 'metal_furniture', NULL),
(1145, 'Metal Scrap', 1, '2019-05-14 07:48:45', '2019-05-14 07:48:45', 'metal_scrap', NULL),
(1146, 'Metal Slabs', 1, '2019-05-14 07:48:45', '2019-05-14 07:48:45', 'metal_slabs', NULL),
(1147, 'Metallized Film', 1, '2019-05-14 07:48:45', '2019-05-14 07:48:45', 'metallized_film', NULL),
(1148, 'Metals', 1, '2019-05-14 07:48:45', '2019-05-14 07:48:45', 'metals', NULL),
(1149, 'Mexican Restaurant', 1, '2019-05-14 07:48:45', '2019-05-14 07:48:45', 'mexican_restaurant', NULL),
(1150, 'Mice', 1, '2019-05-14 07:48:45', '2019-05-14 07:48:45', 'mice', NULL),
(1151, 'Microwave', 1, '2019-05-14 07:48:45', '2019-05-14 07:48:45', 'microwave', NULL),
(1152, 'Middle Eastern Restaurant', 1, '2019-05-14 07:48:45', '2019-05-14 07:48:45', 'middle_eastern_restaurant', NULL),
(1153, 'Milk Formula', 1, '2019-05-14 07:48:45', '2019-05-14 07:48:45', 'milk_formula', NULL),
(1154, 'Mineral Wool', 1, '2019-05-14 07:48:45', '2019-05-14 07:48:45', 'mineral_wool', NULL),
(1155, 'Miniature Golf Course', 1, '2019-05-14 07:48:45', '2019-05-14 07:48:45', 'miniature_golf_course', NULL),
(1156, 'Mining Equipment', 1, '2019-05-14 07:48:45', '2019-05-14 07:48:45', 'mining_equipment', NULL),
(1157, 'Mirrors', 1, '2019-05-14 07:48:45', '2019-05-14 07:48:45', 'mirrors', NULL),
(1158, 'Mirrors & Decorative Glass', 1, '2019-05-14 07:48:45', '2019-05-14 07:48:45', 'mirrors_&_decorative_glass', NULL),
(1159, 'Mobile Auto Washing', 1, '2019-05-14 07:48:45', '2019-05-14 07:48:45', 'mobile_auto_washing', NULL),
(1160, 'Mobile Car Detailing', 1, '2019-05-14 07:48:45', '2019-05-14 07:48:45', 'mobile_car_detailing', NULL),
(1161, 'Mobile Car Mechanic', 1, '2019-05-14 07:48:45', '2019-05-14 07:48:45', 'mobile_car_mechanic', NULL),
(1162, 'Mobile Car-Wash and Detailing', 1, '2019-05-14 07:48:45', '2019-05-14 07:48:45', 'mobile_car-wash_and_detailing', NULL),
(1163, 'Mobile DJ', 1, '2019-05-14 07:48:45', '2019-05-14 07:48:45', 'mobile_dj', NULL),
(1164, 'Mobile Hair Salon', 1, '2019-05-14 07:48:45', '2019-05-14 07:48:45', 'mobile_hair_salon', NULL),
(1165, 'Mobile Mechanic', 1, '2019-05-14 07:48:45', '2019-05-14 07:48:45', 'mobile_mechanic', NULL),
(1166, 'Mobile Notary Public', 1, '2019-05-14 07:48:45', '2019-05-14 07:48:45', 'mobile_notary_public', NULL),
(1167, 'Mobile Pet Grooming', 1, '2019-05-14 07:48:45', '2019-05-14 07:48:45', 'mobile_pet_grooming', NULL),
(1168, 'Mobile Phone & Accessories', 1, '2019-05-14 07:48:45', '2019-05-14 07:48:45', 'mobile_phone_&_accessories', NULL),
(1169, 'Mobile Phones', 1, '2019-05-14 07:48:45', '2019-05-14 07:48:45', 'mobile_phones', NULL),
(1170, 'Mobility Aids & Equipment', 1, '2019-05-14 07:48:45', '2019-05-14 07:48:45', 'mobility_aids_&_equipment', NULL),
(1171, 'Modelling Agency', 1, '2019-05-14 07:48:45', '2019-05-14 07:48:45', 'modelling_agency', NULL),
(1172, 'Modern Australian Restaurant', 1, '2019-05-14 07:48:45', '2019-05-14 07:48:45', 'modern_australian_restaurant', NULL),
(1173, 'Molybdenum', 1, '2019-05-14 07:48:45', '2019-05-14 07:48:45', 'molybdenum', NULL),
(1174, 'Money Boxes', 1, '2019-05-14 07:48:45', '2019-05-14 07:48:45', 'money_boxes', NULL),
(1175, 'Money Broker', 1, '2019-05-14 07:48:45', '2019-05-14 07:48:45', 'money_broker', NULL),
(1176, 'Money Transfer Service', 1, '2019-05-14 07:48:45', '2019-05-14 07:48:45', 'money_transfer_service', NULL),
(1177, 'Mongolian Restaurant', 1, '2019-05-14 07:48:45', '2019-05-14 07:48:45', 'mongolian_restaurant', NULL),
(1178, 'Monitors', 1, '2019-05-14 07:48:45', '2019-05-14 07:48:45', 'monitors', NULL),
(1179, 'Mosaics', 1, '2019-05-14 07:48:45', '2019-05-14 07:48:45', 'mosaics', NULL),
(1180, 'Motel', 1, '2019-05-14 07:48:45', '2019-05-14 07:48:45', 'motel', NULL),
(1181, 'Motherboards', 1, '2019-05-14 07:48:45', '2019-05-14 07:48:45', 'motherboards', NULL),
(1182, 'Motivational Speaker', 1, '2019-05-14 07:48:45', '2019-05-14 07:48:45', 'motivational_speaker', NULL),
(1183, 'Moto Covers', 1, '2019-05-14 07:48:45', '2019-05-14 07:48:45', 'moto_covers', NULL),
(1184, 'Motor Mechanic', 1, '2019-05-14 07:48:45', '2019-05-14 07:48:45', 'motor_mechanic', NULL),
(1185, 'Motorcycle', 1, '2019-05-14 07:48:45', '2019-05-14 07:48:45', 'motorcycle', NULL),
(1186, 'Motorcycle Apparel', 1, '2019-05-14 07:48:45', '2019-05-14 07:48:45', 'motorcycle_apparel', NULL),
(1187, 'Motorcycle Riding Gear', 1, '2019-05-14 07:48:45', '2019-05-14 07:48:45', 'motorcycle_riding_gear', NULL),
(1188, 'Motorcycles & Scooters', 1, '2019-05-14 07:48:45', '2019-05-14 07:48:45', 'motorcycles_&_scooters', NULL),
(1189, 'Motors', 1, '2019-05-14 07:48:45', '2019-05-14 07:48:45', 'motors', NULL),
(1190, 'Mouldings', 1, '2019-05-14 07:48:45', '2019-05-14 07:48:45', 'mouldings', NULL),
(1191, 'Moulds', 1, '2019-05-14 07:48:45', '2019-05-14 07:48:45', 'moulds', NULL),
(1192, 'Mover', 1, '2019-05-14 07:48:45', '2019-05-14 07:48:45', 'mover', NULL),
(1193, 'Movie Cinema', 1, '2019-05-14 07:48:45', '2019-05-14 07:48:45', 'movie_cinema', NULL),
(1194, 'Multifunctional Materials', 1, '2019-05-14 07:48:45', '2019-05-14 07:48:45', 'multifunctional_materials', NULL),
(1195, 'Multi-stylers', 1, '2019-05-14 07:48:45', '2019-05-14 07:48:45', 'multi-stylers', NULL),
(1196, 'Multivitamins', 1, '2019-05-14 07:48:45', '2019-05-14 07:48:45', 'multivitamins', NULL),
(1197, 'Murder Mystery Producer', 1, '2019-05-14 07:48:45', '2019-05-14 07:48:45', 'murder_mystery_producer', NULL),
(1198, 'Museum', 1, '2019-05-14 07:48:45', '2019-05-14 07:48:45', 'museum', NULL),
(1199, 'Mushrooms & Truffle', 1, '2019-05-14 07:48:45', '2019-05-14 07:48:45', 'mushrooms_&_truffle', NULL),
(1200, 'Music Boxes', 1, '2019-05-14 07:48:45', '2019-05-14 07:48:45', 'music_boxes', NULL),
(1201, 'Music Shop', 1, '2019-05-14 07:48:45', '2019-05-14 07:48:45', 'music_shop', NULL),
(1202, 'Music Tutoring', 1, '2019-05-14 07:48:45', '2019-05-14 07:48:45', 'music_tutoring', NULL),
(1203, 'Musical Instrument Leasing', 1, '2019-05-14 07:48:45', '2019-05-14 07:48:45', 'musical_instrument_leasing', NULL),
(1204, 'Musical Instruments', 1, '2019-05-14 07:48:45', '2019-05-14 07:48:45', 'musical_instruments', NULL),
(1205, 'Musical Instruments & Accessories', 1, '2019-05-14 07:48:45', '2019-05-14 07:48:45', 'musical_instruments_&_accessories', NULL),
(1206, 'Muslim wear', 1, '2019-05-14 07:48:45', '2019-05-14 07:48:45', 'muslim_wear', NULL),
(1207, 'Nail Supplies', 1, '2019-05-14 07:48:45', '2019-05-14 07:48:45', 'nail_supplies', NULL),
(1208, 'Nails', 1, '2019-05-14 07:48:45', '2019-05-14 07:48:45', 'nails', NULL),
(1209, 'Natropath', 1, '2019-05-14 07:48:45', '2019-05-14 07:48:45', 'natropath', NULL),
(1210, 'Natural Gas', 1, '2019-05-14 07:48:45', '2019-05-14 07:48:45', 'natural_gas', NULL),
(1211, 'Necklaces', 1, '2019-05-14 07:48:45', '2019-05-14 07:48:45', 'necklaces', NULL),
(1212, 'Nepalese Restaurant', 1, '2019-05-14 07:48:45', '2019-05-14 07:48:45', 'nepalese_restaurant', NULL),
(1213, 'Nephrology', 1, '2019-05-14 07:48:45', '2019-05-14 07:48:45', 'nephrology', NULL),
(1214, 'Neurologist', 1, '2019-05-14 07:48:45', '2019-05-14 07:48:45', 'neurologist', NULL),
(1215, 'Neurosurgeon', 1, '2019-05-14 07:48:45', '2019-05-14 07:48:45', 'neurosurgeon', NULL),
(1216, 'New Born Sets & Packs', 1, '2019-05-14 07:48:45', '2019-05-14 07:48:45', 'new_born_sets_&_packs', NULL),
(1217, 'New Born Unisex(0-6 month)', 1, '2019-05-14 07:48:45', '2019-05-14 07:48:45', 'new_born_unisex(0-6_month)', NULL),
(1218, 'New Energy Vehicle Parts & Accessories', 1, '2019-05-14 07:48:45', '2019-05-14 07:48:45', 'new_energy_vehicle_parts_&_accessories', NULL),
(1219, 'Nickel', 1, '2019-05-14 07:48:45', '2019-05-14 07:48:45', 'nickel', NULL),
(1220, 'Nightwear', 1, '2019-05-14 07:48:45', '2019-05-14 07:48:45', 'nightwear', NULL),
(1221, 'Nintendo Games', 1, '2019-05-14 07:48:45', '2019-05-14 07:48:45', 'nintendo_games', NULL),
(1222, 'Noise Maker', 1, '2019-05-14 07:48:45', '2019-05-14 07:48:45', 'noise_maker', NULL),
(1223, 'Noise Reduction Device', 1, '2019-05-14 07:48:45', '2019-05-14 07:48:45', 'noise_reduction_device', NULL),
(1224, 'Non-Metallic Mineral Deposit', 1, '2019-05-14 07:48:45', '2019-05-14 07:48:45', 'non-metallic_mineral_deposit', NULL),
(1225, 'Noodles', 1, '2019-05-14 07:48:45', '2019-05-14 07:48:45', 'noodles', NULL),
(1226, 'Notebooks & Writing Pads', 1, '2019-05-14 07:48:45', '2019-05-14 07:48:45', 'notebooks_&_writing_pads', NULL),
(1227, 'Nuts', 1, '2019-05-14 07:48:45', '2019-05-14 07:48:45', 'nuts', NULL),
(1228, 'Nuts & Kernels', 1, '2019-05-14 07:48:45', '2019-05-14 07:48:45', 'nuts_&_kernels', NULL),
(1229, 'Oatmeals', 1, '2019-05-14 07:48:45', '2019-05-14 07:48:45', 'oatmeals', NULL),
(1230, 'Office Adhesives & Tapes', 1, '2019-05-14 07:48:45', '2019-05-14 07:48:45', 'office_adhesives_&_tapes', NULL),
(1231, 'Office Binding', 1, '2019-05-14 07:48:45', '2019-05-14 07:48:45', 'office_binding', NULL),
(1232, 'Office Equipment', 1, '2019-05-14 07:48:45', '2019-05-14 07:48:45', 'office_equipment', NULL),
(1233, 'Office Paper', 1, '2019-05-14 07:48:45', '2019-05-14 07:48:45', 'office_paper', NULL),
(1234, 'OLED Televisions', 1, '2019-05-14 07:48:45', '2019-05-14 07:48:45', 'oled_televisions', NULL),
(1235, 'Oral Care', 1, '2019-05-14 07:48:45', '2019-05-14 07:48:45', 'oral_care', NULL),
(1236, 'Oral Hygiene', 1, '2019-05-14 07:48:45', '2019-05-14 07:48:45', 'oral_hygiene', NULL),
(1237, 'Ore', 1, '2019-05-14 07:48:45', '2019-05-14 07:48:45', 'ore', NULL),
(1238, 'Organic Produce', 1, '2019-05-14 07:48:45', '2019-05-14 07:48:45', 'organic_produce', NULL),
(1239, 'Ornamental Plants', 1, '2019-05-14 07:48:45', '2019-05-14 07:48:45', 'ornamental_plants', NULL),
(1240, 'OTG Drives', 1, '2019-05-14 07:48:45', '2019-05-14 07:48:45', 'otg_drives', NULL),
(1241, 'Other Agriculture Products', 1, '2019-05-14 07:48:45', '2019-05-14 07:48:45', 'other_agriculture_products', NULL),
(1242, 'Other Beauty & Personal Care Products', 1, '2019-05-14 07:48:45', '2019-05-14 07:48:45', 'other_beauty_&_personal_care_products', NULL),
(1243, 'Other Construction & Real Estate', 1, '2019-05-14 07:48:45', '2019-05-14 07:48:45', 'other_construction_&_real_estate', NULL),
(1244, 'Other Consumer Electronics', 1, '2019-05-14 07:48:45', '2019-05-14 07:48:45', 'other_consumer_electronics', NULL),
(1245, 'Other Energy Related Products', 1, '2019-05-14 07:48:45', '2019-05-14 07:48:45', 'other_energy_related_products', NULL),
(1246, 'Other Environmental Products', 1, '2019-05-14 07:48:45', '2019-05-14 07:48:45', 'other_environmental_products', NULL),
(1247, 'Other Excess Inventory', 1, '2019-05-14 07:48:45', '2019-05-14 07:48:45', 'other_excess_inventory', NULL),
(1248, 'Other Food & Beverage', 1, '2019-05-14 07:48:45', '2019-05-14 07:48:45', 'other_food_&_beverage', NULL),
(1249, 'Other Furniture', 1, '2019-05-14 07:48:45', '2019-05-14 07:48:45', 'other_furniture', NULL),
(1250, 'Other General Mechanical Components', 1, '2019-05-14 07:48:45', '2019-05-14 07:48:45', 'other_general_mechanical_components', NULL),
(1251, 'Other Home Appliances', 1, '2019-05-14 07:48:45', '2019-05-14 07:48:45', 'other_home_appliances', NULL),
(1252, 'Other Lights & Lighting Products', 1, '2019-05-14 07:48:45', '2019-05-14 07:48:45', 'other_lights_&_lighting_products', NULL),
(1253, 'Other Luggage, Bags & Cases', 1, '2019-05-14 07:48:45', '2019-05-14 07:48:45', 'other_luggage,_bags_&_cases', NULL),
(1254, 'Other Machinery & Industry Equipment', 1, '2019-05-14 07:48:45', '2019-05-14 07:48:45', 'other_machinery_&_industry_equipment', NULL),
(1255, 'Other Mechanical Parts', 1, '2019-05-14 07:48:45', '2019-05-14 07:48:45', 'other_mechanical_parts', NULL),
(1256, 'Other Metals & Metal Products', 1, '2019-05-14 07:48:45', '2019-05-14 07:48:45', 'other_metals_&_metal_products', NULL),
(1257, 'Other Non-Metallic Minerals & Products', 1, '2019-05-14 07:48:45', '2019-05-14 07:48:45', 'other_non-metallic_minerals_&_products', NULL),
(1258, 'Other Office & School Supplies', 1, '2019-05-14 07:48:45', '2019-05-14 07:48:45', 'other_office_&_school_supplies', NULL),
(1259, 'Other Packaging Applications', 1, '2019-05-14 07:48:45', '2019-05-14 07:48:45', 'other_packaging_applications', NULL),
(1260, 'Other Packaging Materials', 1, '2019-05-14 07:48:45', '2019-05-14 07:48:45', 'other_packaging_materials', NULL),
(1261, 'Other Recycling Products', 1, '2019-05-14 07:48:45', '2019-05-14 07:48:45', 'other_recycling_products', NULL),
(1262, 'Other Security & Protection Products', 1, '2019-05-14 07:48:45', '2019-05-14 07:48:45', 'other_security_&_protection_products', NULL),
(1263, 'Other Service Equipment', 1, '2019-05-14 07:48:45', '2019-05-14 07:48:45', 'other_service_equipment', NULL),
(1264, 'Other Shoes', 1, '2019-05-14 07:48:45', '2019-05-14 07:48:45', 'other_shoes', NULL),
(1265, 'Other Sports & Entertainment Products', 1, '2019-05-14 07:48:45', '2019-05-14 07:48:45', 'other_sports_&_entertainment_products', NULL),
(1266, 'Other Televisions', 1, '2019-05-14 07:48:45', '2019-05-14 07:48:45', 'other_televisions', NULL),
(1267, 'Other Textiles & Leather Products', 1, '2019-05-14 07:48:45', '2019-05-14 07:48:45', 'other_textiles_&_leather_products', NULL),
(1268, 'Other Toys & Hobbies', 1, '2019-05-14 07:48:45', '2019-05-14 07:48:45', 'other_toys_&_hobbies', NULL),
(1269, 'Other Vehicle Parts & Accessories', 1, '2019-05-14 07:48:45', '2019-05-14 07:48:45', 'other_vehicle_parts_&_accessories', NULL),
(1270, 'Other Vehicles', 1, '2019-05-14 07:48:45', '2019-05-14 07:48:45', 'other_vehicles', NULL),
(1271, 'Others', 1, '2019-05-14 07:48:45', '2019-05-14 07:48:45', 'others', NULL),
(1272, 'Outdoor Furniture', 1, '2019-05-14 07:48:45', '2019-05-14 07:48:45', 'outdoor_furniture', NULL),
(1273, 'Outdoor Lighting', 1, '2019-05-14 07:48:45', '2019-05-14 07:48:45', 'outdoor_lighting', NULL),
(1274, 'Outdoor Sports', 1, '2019-05-14 07:48:45', '2019-05-14 07:48:45', 'outdoor_sports', NULL),
(1275, 'Outdoor Toys & Structures', 1, '2019-05-14 07:48:45', '2019-05-14 07:48:45', 'outdoor_toys_&_structures', NULL),
(1276, 'Oven', 1, '2019-05-14 07:48:45', '2019-05-14 07:48:45', 'oven', NULL),
(1277, 'Packaging & Cartons', 1, '2019-05-14 07:48:45', '2019-05-14 07:48:45', 'packaging_&_cartons', NULL),
(1278, 'Packaging Bags', 1, '2019-05-14 07:48:45', '2019-05-14 07:48:45', 'packaging_bags', NULL),
(1279, 'Packaging Boxes', 1, '2019-05-14 07:48:45', '2019-05-14 07:48:45', 'packaging_boxes', NULL),
(1280, 'Packaging Labels', 1, '2019-05-14 07:48:45', '2019-05-14 07:48:45', 'packaging_labels', NULL),
(1281, 'Packaging Machine', 1, '2019-05-14 07:48:45', '2019-05-14 07:48:45', 'packaging_machine', NULL),
(1282, 'Packaging Product Stocks', 1, '2019-05-14 07:48:45', '2019-05-14 07:48:45', 'packaging_product_stocks', NULL),
(1283, 'Packaging Rope', 1, '2019-05-14 07:48:45', '2019-05-14 07:48:45', 'packaging_rope', NULL),
(1284, 'Packaging Trays', 1, '2019-05-14 07:48:45', '2019-05-14 07:48:45', 'packaging_trays', NULL),
(1285, 'Packaging Tubes', 1, '2019-05-14 07:48:45', '2019-05-14 07:48:45', 'packaging_tubes', NULL),
(1286, 'Pants', 1, '2019-05-14 07:48:45', '2019-05-14 07:48:45', 'pants', NULL),
(1287, 'Pants,Palazzos & Capris', 1, '2019-05-14 07:48:46', '2019-05-14 07:48:46', 'pants,palazzos_&_capris', NULL),
(1288, 'Paper & Paperboard', 1, '2019-05-14 07:48:46', '2019-05-14 07:48:46', 'paper_&_paperboard', NULL),
(1289, 'Paper Envelopes', 1, '2019-05-14 07:48:46', '2019-05-14 07:48:46', 'paper_envelopes', NULL),
(1290, 'Paper Packaging', 1, '2019-05-14 07:48:46', '2019-05-14 07:48:46', 'paper_packaging', NULL),
(1291, 'Paper Production Machinery', 1, '2019-05-14 07:48:46', '2019-05-14 07:48:46', 'paper_production_machinery', NULL),
(1292, 'Paper Products', 1, '2019-05-14 07:48:46', '2019-05-14 07:48:46', 'paper_products', NULL),
(1293, 'Parts & Spares', 1, '2019-05-14 07:48:46', '2019-05-14 07:48:46', 'parts_&_spares', NULL),
(1294, 'Parts & Toots', 1, '2019-05-14 07:48:46', '2019-05-14 07:48:46', 'parts_&_toots', NULL),
(1295, 'PBX', 1, '2019-05-14 07:48:46', '2019-05-14 07:48:46', 'pbx', NULL),
(1296, 'PC Audio', 1, '2019-05-14 07:48:46', '2019-05-14 07:48:46', 'pc_audio', NULL),
(1297, 'Pencil Cases & Bags', 1, '2019-05-14 07:48:46', '2019-05-14 07:48:46', 'pencil_cases_&_bags', NULL),
(1298, 'Pencil Sharpeners', 1, '2019-05-14 07:48:46', '2019-05-14 07:48:46', 'pencil_sharpeners', NULL),
(1299, 'Pendants & Charms', 1, '2019-05-14 07:48:46', '2019-05-14 07:48:46', 'pendants_&_charms', NULL),
(1300, 'Personal Protective Equipment', 1, '2019-05-14 07:48:46', '2019-05-14 07:48:46', 'personal_protective_equipment', NULL),
(1301, 'Pest Control', 1, '2019-05-14 07:48:46', '2019-05-14 07:48:46', 'pest_control', NULL),
(1302, 'Pet Products', 1, '2019-05-14 07:48:46', '2019-05-14 07:48:46', 'pet_products', NULL),
(1303, 'Petrochemical Products', 1, '2019-05-14 07:48:46', '2019-05-14 07:48:46', 'petrochemical_products', NULL),
(1304, 'Pharmaceutical Machinery', 1, '2019-05-14 07:48:46', '2019-05-14 07:48:46', 'pharmaceutical_machinery', NULL),
(1305, 'Pharmaceutical Packaging', 1, '2019-05-14 07:48:46', '2019-05-14 07:48:46', 'pharmaceutical_packaging', NULL),
(1306, 'Phone Cards', 1, '2019-05-14 07:48:46', '2019-05-14 07:48:46', 'phone_cards', NULL),
(1307, 'Phone Cases', 1, '2019-05-14 07:48:46', '2019-05-14 07:48:46', 'phone_cases', NULL),
(1308, 'Physical Therapy Equipments', 1, '2019-05-14 07:48:46', '2019-05-14 07:48:46', 'physical_therapy_equipments', NULL),
(1309, 'Picture Frames', 1, '2019-05-14 07:48:46', '2019-05-14 07:48:46', 'picture_frames', NULL),
(1310, 'Pig Iron', 1, '2019-05-14 07:48:46', '2019-05-14 07:48:46', 'pig_iron', NULL),
(1311, 'Pillow Cases', 1, '2019-05-14 07:48:46', '2019-05-14 07:48:46', 'pillow_cases', NULL),
(1312, 'Pillows & bolsters', 1, '2019-05-14 07:48:46', '2019-05-14 07:48:46', 'pillows_&_bolsters', NULL),
(1313, 'Plant & Animal Oil', 1, '2019-05-14 07:48:46', '2019-05-14 07:48:46', 'plant_&_animal_oil', NULL),
(1314, 'Plant Extracts', 1, '2019-05-14 07:48:46', '2019-05-14 07:48:46', 'plant_extracts', NULL),
(1315, 'Plant Seeds & Bulbs', 1, '2019-05-14 07:48:46', '2019-05-14 07:48:46', 'plant_seeds_&_bulbs', NULL),
(1316, 'Plastic & Rubber Machiner', 1, '2019-05-14 07:48:46', '2019-05-14 07:48:46', 'plastic_&_rubber_machiner', NULL),
(1317, 'Plastic Building Materials', 1, '2019-05-14 07:48:46', '2019-05-14 07:48:46', 'plastic_building_materials', NULL),
(1318, 'Plastic Cards', 1, '2019-05-14 07:48:46', '2019-05-14 07:48:46', 'plastic_cards', NULL),
(1319, 'Plastic Film', 1, '2019-05-14 07:48:46', '2019-05-14 07:48:46', 'plastic_film', NULL),
(1320, 'Plastic Furniture', 1, '2019-05-14 07:48:46', '2019-05-14 07:48:46', 'plastic_furniture', NULL),
(1321, 'Plastic Packaging', 1, '2019-05-14 07:48:46', '2019-05-14 07:48:46', 'plastic_packaging', NULL),
(1322, 'Plastic Processing Service', 1, '2019-05-14 07:48:46', '2019-05-14 07:48:46', 'plastic_processing_service', NULL),
(1323, 'Plastic Products', 1, '2019-05-14 07:48:46', '2019-05-14 07:48:46', 'plastic_products', NULL),
(1324, 'Plastic Projects', 1, '2019-05-14 07:48:46', '2019-05-14 07:48:46', 'plastic_projects', NULL),
(1325, 'Plastic Raw Materials', 1, '2019-05-14 07:48:46', '2019-05-14 07:48:46', 'plastic_raw_materials', NULL),
(1326, 'Plastic Sheets', 1, '2019-05-14 07:48:46', '2019-05-14 07:48:46', 'plastic_sheets', NULL),
(1327, 'Plastic Stocks', 1, '2019-05-14 07:48:46', '2019-05-14 07:48:46', 'plastic_stocks', NULL),
(1328, 'Plastic Toys', 1, '2019-05-14 07:48:46', '2019-05-14 07:48:46', 'plastic_toys', NULL),
(1329, 'Plastic Tubes', 1, '2019-05-14 07:48:46', '2019-05-14 07:48:46', 'plastic_tubes', NULL),
(1330, 'Play Trains & Railway Sets', 1, '2019-05-14 07:48:46', '2019-05-14 07:48:46', 'play_trains_&_railway_sets', NULL),
(1331, 'Play Vehicles', 1, '2019-05-14 07:48:46', '2019-05-14 07:48:46', 'play_vehicles', NULL),
(1332, 'PlayStation Audio&Accesso…', 1, '2019-05-14 07:48:46', '2019-05-14 07:48:46', 'playstation_audio&accesso…', NULL),
(1333, 'PlayStation Consoles', 1, '2019-05-14 07:48:46', '2019-05-14 07:48:46', 'playstation_consoles', NULL),
(1334, 'PlayStation Controllers', 1, '2019-05-14 07:48:46', '2019-05-14 07:48:46', 'playstation_controllers', NULL),
(1335, 'PlayStation Games', 1, '2019-05-14 07:48:46', '2019-05-14 07:48:46', 'playstation_games', NULL),
(1336, 'Point& Shoot', 1, '2019-05-14 07:48:46', '2019-05-14 07:48:46', 'point&_shoot', NULL),
(1337, 'Police & Military Supplies', 1, '2019-05-14 07:48:46', '2019-05-14 07:48:46', 'police_&_military_supplies', NULL),
(1338, 'Polishes & Waxes', 1, '2019-05-14 07:48:46', '2019-05-14 07:48:46', 'polishes_&_waxes', NULL),
(1339, 'Portable Audio, Video & Accessories', 1, '2019-05-14 07:48:46', '2019-05-14 07:48:46', 'portable_audio,_video_&_accessories', NULL),
(1340, 'Portable Players', 1, '2019-05-14 07:48:46', '2019-05-14 07:48:46', 'portable_players', NULL),
(1341, 'POS Software & Systems', 1, '2019-05-14 07:48:46', '2019-05-14 07:48:46', 'pos_software_&_systems', NULL),
(1342, 'POS Systems', 1, '2019-05-14 07:48:46', '2019-05-14 07:48:46', 'pos_systems', NULL),
(1343, 'Pottery & Enamel', 1, '2019-05-14 07:48:46', '2019-05-14 07:48:46', 'pottery_&_enamel', NULL),
(1344, 'Potty Chair', 1, '2019-05-14 07:48:46', '2019-05-14 07:48:46', 'potty_chair', NULL),
(1345, 'Powdered Drink Mixes', 1, '2019-05-14 07:48:46', '2019-05-14 07:48:46', 'powdered_drink_mixes', NULL),
(1346, 'Power Accessories', 1, '2019-05-14 07:48:46', '2019-05-14 07:48:46', 'power_accessories', NULL),
(1347, 'Power Banks', 1, '2019-05-14 07:48:46', '2019-05-14 07:48:46', 'power_banks', NULL),
(1348, 'Power Distribution Equipment', 1, '2019-05-14 07:48:46', '2019-05-14 07:48:46', 'power_distribution_equipment', NULL),
(1349, 'Power Supplies', 1, '2019-05-14 07:48:46', '2019-05-14 07:48:46', 'power_supplies', NULL),
(1350, 'Power Tool Accessories', 1, '2019-05-14 07:48:46', '2019-05-14 07:48:46', 'power_tool_accessories', NULL),
(1351, 'Power Tools', 1, '2019-05-14 07:48:46', '2019-05-14 07:48:46', 'power_tools', NULL),
(1352, 'Prepared Drugs In Pieces', 1, '2019-05-14 07:48:46', '2019-05-14 07:48:46', 'prepared_drugs_in_pieces', NULL),
(1353, 'Pressure Cookers', 1, '2019-05-14 07:48:46', '2019-05-14 07:48:46', 'pressure_cookers', NULL),
(1354, 'Pretend Play & Preschool', 1, '2019-05-14 07:48:46', '2019-05-14 07:48:46', 'pretend_play_&_preschool', NULL),
(1355, 'Printer Supplies', 1, '2019-05-14 07:48:46', '2019-05-14 07:48:46', 'printer_supplies', NULL),
(1356, 'Printers', 1, '2019-05-14 07:48:46', '2019-05-14 07:48:46', 'printers', NULL),
(1357, 'Printing Machine', 1, '2019-05-14 07:48:46', '2019-05-14 07:48:46', 'printing_machine', NULL),
(1358, 'Printing Materials', 1, '2019-05-14 07:48:46', '2019-05-14 07:48:46', 'printing_materials', NULL),
(1359, 'Printing Services', 1, '2019-05-14 07:48:46', '2019-05-14 07:48:46', 'printing_services', NULL),
(1360, 'Processors', 1, '2019-05-14 07:48:46', '2019-05-14 07:48:46', 'processors', NULL),
(1361, 'Professional Audio, Video & Lighting', 1, '2019-05-14 07:48:46', '2019-05-14 07:48:46', 'professional_audio,_video_&_lighting', NULL),
(1362, 'Professional Lighting', 1, '2019-05-14 07:48:46', '2019-05-14 07:48:46', 'professional_lighting', NULL),
(1363, 'Projectors', 1, '2019-05-14 07:48:46', '2019-05-14 07:48:46', 'projectors', NULL),
(1364, 'Protective Packaging', 1, '2019-05-14 07:48:46', '2019-05-14 07:48:46', 'protective_packaging', NULL),
(1365, 'PU Belts', 1, '2019-05-14 07:48:46', '2019-05-14 07:48:46', 'pu_belts', NULL),
(1366, 'Pulp', 1, '2019-05-14 07:48:46', '2019-05-14 07:48:46', 'pulp', NULL),
(1367, 'PVC', 1, '2019-05-14 07:48:46', '2019-05-14 07:48:46', 'pvc', NULL),
(1368, 'QLED Televisions', 1, '2019-05-14 07:48:46', '2019-05-14 07:48:46', 'qled_televisions', NULL),
(1369, 'Quarry Stone & Slabs', 1, '2019-05-14 07:48:46', '2019-05-14 07:48:46', 'quarry_stone_&_slabs', NULL),
(1370, 'Quartz Products', 1, '2019-05-14 07:48:46', '2019-05-14 07:48:46', 'quartz_products', NULL),
(1371, 'Radio & TV Accessories', 1, '2019-05-14 07:48:46', '2019-05-14 07:48:46', 'radio_&_tv_accessories', NULL),
(1372, 'Radiology Equipment & Accessories', 1, '2019-05-14 07:48:46', '2019-05-14 07:48:46', 'radiology_equipment_&_accessories', NULL),
(1373, 'Rain Gear', 1, '2019-05-14 07:48:46', '2019-05-14 07:48:46', 'rain_gear', NULL),
(1374, 'Rare Earth & Products', 1, '2019-05-14 07:48:46', '2019-05-14 07:48:46', 'rare_earth_&_products', NULL),
(1375, 'Rare Earth Magnets', 1, '2019-05-14 07:48:46', '2019-05-14 07:48:46', 'rare_earth_magnets', NULL),
(1376, 'Rattan / Wicker Furniture', 1, '2019-05-14 07:48:46', '2019-05-14 07:48:46', 'rattan_/_wicker_furniture', NULL),
(1377, 'Reading & Writing', 1, '2019-05-14 07:48:46', '2019-05-14 07:48:46', 'reading_&_writing', NULL),
(1378, 'Real Estate', 1, '2019-05-14 07:48:46', '2019-05-14 07:48:46', 'real_estate', NULL),
(1379, 'Rechargeable & Flashlights', 1, '2019-05-14 07:48:46', '2019-05-14 07:48:46', 'rechargeable_&_flashlights', NULL),
(1380, 'Recycled Plastic', 1, '2019-05-14 07:48:46', '2019-05-14 07:48:46', 'recycled_plastic', NULL),
(1381, 'Recycled Rubber', 1, '2019-05-14 07:48:46', '2019-05-14 07:48:46', 'recycled_rubber', NULL),
(1382, 'Recycling', 1, '2019-05-14 07:48:46', '2019-05-14 07:48:46', 'recycling', NULL),
(1383, 'Refractory', 1, '2019-05-14 07:48:46', '2019-05-14 07:48:46', 'refractory', NULL),
(1384, 'Refrigeration & Heat Exchange Equipment', 1, '2019-05-14 07:48:46', '2019-05-14 07:48:46', 'refrigeration_&_heat_exchange_equipment', NULL),
(1385, 'Refrigeration Equipment', 1, '2019-05-14 07:48:46', '2019-05-14 07:48:46', 'refrigeration_equipment', NULL),
(1386, 'Refrigerators', 1, '2019-05-14 07:48:46', '2019-05-14 07:48:46', 'refrigerators', NULL),
(1387, 'Refrigerators & Freezers', 1, '2019-05-14 07:48:46', '2019-05-14 07:48:46', 'refrigerators_&_freezers', NULL),
(1388, 'Relays', 1, '2019-05-14 07:48:46', '2019-05-14 07:48:46', 'relays', NULL),
(1389, 'Repeater', 1, '2019-05-14 07:48:46', '2019-05-14 07:48:46', 'repeater', NULL),
(1390, 'Restaurant & Hotel Supplies', 1, '2019-05-14 07:48:46', '2019-05-14 07:48:46', 'restaurant_&_hotel_supplies', NULL),
(1391, 'Rice', 1, '2019-05-14 07:48:46', '2019-05-14 07:48:46', 'rice', NULL),
(1392, 'Rice Cooker', 1, '2019-05-14 07:48:46', '2019-05-14 07:48:46', 'rice_cooker', NULL),
(1393, 'Rings', 1, '2019-05-14 07:48:46', '2019-05-14 07:48:46', 'rings', NULL),
(1394, 'Roadway Safety', 1, '2019-05-14 07:48:46', '2019-05-14 07:48:46', 'roadway_safety', NULL),
(1395, 'Robes', 1, '2019-05-14 07:48:46', '2019-05-14 07:48:46', 'robes', NULL),
(1396, 'Rubber Hoses', 1, '2019-05-14 07:48:46', '2019-05-14 07:48:46', 'rubber_hoses', NULL),
(1397, 'Rubber Processing Service', 1, '2019-05-14 07:48:46', '2019-05-14 07:48:46', 'rubber_processing_service', NULL),
(1398, 'Rubber Products', 1, '2019-05-14 07:48:46', '2019-05-14 07:48:46', 'rubber_products', NULL),
(1399, 'Rubber Projects', 1, '2019-05-14 07:48:46', '2019-05-14 07:48:46', 'rubber_projects', NULL),
(1400, 'Rubber Raw Materials', 1, '2019-05-14 07:48:46', '2019-05-14 07:48:46', 'rubber_raw_materials', NULL),
(1401, 'Rubber Stocks', 1, '2019-05-14 07:48:46', '2019-05-14 07:48:46', 'rubber_stocks', NULL),
(1402, 'Rugs & Carpets', 1, '2019-05-14 07:48:46', '2019-05-14 07:48:46', 'rugs_&_carpets', NULL),
(1403, 'RV Park', 1, '2019-05-14 07:48:46', '2019-05-14 07:48:46', 'rv_park', NULL),
(1404, 'Safes', 1, '2019-05-14 07:48:46', '2019-05-14 07:48:46', 'safes', NULL),
(1405, 'Sandals', 1, '2019-05-14 07:48:46', '2019-05-14 07:48:46', 'sandals', NULL),
(1406, 'Sander', 1, '2019-05-14 07:48:46', '2019-05-14 07:48:46', 'sander', NULL),
(1407, 'Sanitary Paper', 1, '2019-05-14 07:48:46', '2019-05-14 07:48:46', 'sanitary_paper', NULL),
(1408, 'Sanitizers', 1, '2019-05-14 07:48:46', '2019-05-14 07:48:46', 'sanitizers', NULL),
(1409, 'Scarf, Hat & Glove Sets', 1, '2019-05-14 07:48:46', '2019-05-14 07:48:46', 'scarf,_hat_&_glove_sets', NULL),
(1410, 'Scarves', 1, '2019-05-14 07:48:46', '2019-05-14 07:48:46', 'scarves', NULL),
(1411, 'Scarves & Shawls', 1, '2019-05-14 07:48:46', '2019-05-14 07:48:46', 'scarves_&_shawls', NULL),
(1412, 'School & Office Equipment', 1, '2019-05-14 07:48:46', '2019-05-14 07:48:46', 'school_&_office_equipment', NULL),
(1413, 'Scooters', 1, '2019-05-14 07:48:46', '2019-05-14 07:48:46', 'scooters', NULL),
(1414, 'Sculptures', 1, '2019-05-14 07:48:46', '2019-05-14 07:48:46', 'sculptures', NULL),
(1415, 'Seafood', 1, '2019-05-14 07:48:46', '2019-05-14 07:48:46', 'seafood', NULL),
(1416, 'Seasonings & Condiments', 1, '2019-05-14 07:48:46', '2019-05-14 07:48:46', 'seasonings_&_condiments', NULL),
(1417, 'Security', 1, '2019-05-14 07:48:46', '2019-05-14 07:48:46', 'security', NULL),
(1418, 'Security Services', 1, '2019-05-14 07:48:46', '2019-05-14 07:48:46', 'security_services', NULL),
(1419, 'Self Defense Supplies', 1, '2019-05-14 07:48:46', '2019-05-14 07:48:46', 'self_defense_supplies', NULL),
(1420, 'Serum & Essence', 1, '2019-05-14 07:48:46', '2019-05-14 07:48:46', 'serum_&_essence', NULL),
(1421, 'Serveware', 1, '2019-05-14 07:48:46', '2019-05-14 07:48:46', 'serveware', NULL),
(1422, 'Serviced Apartment', 1, '2019-05-14 07:48:46', '2019-05-14 07:48:46', 'serviced_apartment', NULL),
(1423, 'Services&Installations', 1, '2019-05-14 07:48:46', '2019-05-14 07:48:46', 'services&installations', NULL),
(1424, 'Sewer', 1, '2019-05-14 07:48:46', '2019-05-14 07:48:46', 'sewer', NULL),
(1425, 'Sewing Machine', 1, '2019-05-14 07:48:46', '2019-05-14 07:48:46', 'sewing_machine', NULL),
(1426, 'Sewing Supplies', 1, '2019-05-14 07:48:46', '2019-05-14 07:48:46', 'sewing_supplies', NULL),
(1427, 'Sexual Wellness', 1, '2019-05-14 07:48:46', '2019-05-14 07:48:46', 'sexual_wellness', NULL),
(1428, 'Shalwar', 1, '2019-05-14 07:48:46', '2019-05-14 07:48:46', 'shalwar', NULL),
(1429, 'Shalwar Kameez', 1, '2019-05-14 07:48:46', '2019-05-14 07:48:46', 'shalwar_kameez', NULL),
(1430, 'Shampoo', 1, '2019-05-14 07:48:46', '2019-05-14 07:48:46', 'shampoo', NULL),
(1431, 'Shapewear', 1, '2019-05-14 07:48:46', '2019-05-14 07:48:46', 'shapewear', NULL),
(1432, 'Shaving & Grooming', 1, '2019-05-14 07:48:46', '2019-05-14 07:48:46', 'shaving_&_grooming', NULL),
(1433, 'Shaving & Hair Removal', 1, '2019-05-14 07:48:46', '2019-05-14 07:48:46', 'shaving_&_hair_removal', NULL),
(1434, 'Shawls', 1, '2019-05-14 07:48:46', '2019-05-14 07:48:46', 'shawls', NULL),
(1435, 'Shirt Accessories', 1, '2019-05-14 07:48:46', '2019-05-14 07:48:46', 'shirt_accessories', NULL),
(1436, 'Shoe Materials', 1, '2019-05-14 07:48:46', '2019-05-14 07:48:46', 'shoe_materials', NULL),
(1437, 'Shoe Parts & Accessories', 1, '2019-05-14 07:48:46', '2019-05-14 07:48:46', 'shoe_parts_&_accessories', NULL),
(1438, 'Shoe Repairing Equipment', 1, '2019-05-14 07:48:46', '2019-05-14 07:48:46', 'shoe_repairing_equipment', NULL),
(1439, 'Shoes', 1, '2019-05-14 07:48:46', '2019-05-14 07:48:46', 'shoes', NULL),
(1440, 'Shoes Accessories', 1, '2019-05-14 07:48:46', '2019-05-14 07:48:46', 'shoes_accessories', NULL),
(1441, 'Shoes Design Services', 1, '2019-05-14 07:48:46', '2019-05-14 07:48:46', 'shoes_design_services', NULL),
(1442, 'Shoes Processing Services', 1, '2019-05-14 07:48:46', '2019-05-14 07:48:46', 'shoes_processing_services', NULL),
(1443, 'Shoes Stock', 1, '2019-05-14 07:48:46', '2019-05-14 07:48:46', 'shoes_stock', NULL),
(1444, 'Shopping Bags', 1, '2019-05-14 07:48:46', '2019-05-14 07:48:46', 'shopping_bags', NULL),
(1445, 'Shower Caddies & Hangers', 1, '2019-05-14 07:48:46', '2019-05-14 07:48:46', 'shower_caddies_&_hangers', NULL),
(1446, 'Shower Curtains', 1, '2019-05-14 07:48:46', '2019-05-14 07:48:46', 'shower_curtains', NULL),
(1447, 'Shrink Film', 1, '2019-05-14 07:48:46', '2019-05-14 07:48:46', 'shrink_film', NULL),
(1448, 'Skateboards', 1, '2019-05-14 07:48:46', '2019-05-14 07:48:46', 'skateboards', NULL),
(1449, 'Skin Care', 1, '2019-05-14 07:48:46', '2019-05-14 07:48:46', 'skin_care', NULL),
(1450, 'Skin Care Tool', 1, '2019-05-14 07:48:46', '2019-05-14 07:48:46', 'skin_care_tool', NULL),
(1451, 'Sleep & Loungewear', 1, '2019-05-14 07:48:46', '2019-05-14 07:48:46', 'sleep_&_loungewear', NULL),
(1452, 'Slides & Flip Flops', 1, '2019-05-14 07:48:46', '2019-05-14 07:48:46', 'slides_&_flip_flops', NULL),
(1453, 'Slimming Food', 1, '2019-05-14 07:48:46', '2019-05-14 07:48:46', 'slimming_food', NULL),
(1454, 'Slip-Ons & Loafers', 1, '2019-05-14 07:48:46', '2019-05-14 07:48:46', 'slip-ons_&_loafers', NULL),
(1455, 'Smart Televisions', 1, '2019-05-14 07:48:46', '2019-05-14 07:48:46', 'smart_televisions', NULL),
(1456, 'Smartwatches', 1, '2019-05-14 07:48:46', '2019-05-14 07:48:46', 'smartwatches', NULL),
(1457, 'Snack Food', 1, '2019-05-14 07:48:46', '2019-05-14 07:48:46', 'snack_food', NULL),
(1458, 'Sneakers', 1, '2019-05-14 07:48:46', '2019-05-14 07:48:46', 'sneakers', NULL),
(1459, 'Soap,Cleansers & Bodywa…', 1, '2019-05-14 07:48:46', '2019-05-14 07:48:46', 'soap,cleansers_&_bodywa…', NULL),
(1460, 'Socks & Tights', 1, '2019-05-14 07:48:46', '2019-05-14 07:48:46', 'socks_&_tights', NULL),
(1461, 'Soft Drinks', 1, '2019-05-14 07:48:46', '2019-05-14 07:48:46', 'soft_drinks', NULL),
(1462, 'Solar Cells, Solar Panel', 1, '2019-05-14 07:48:46', '2019-05-14 07:48:46', 'solar_cells,_solar_panel', NULL),
(1463, 'Solar Chargers', 1, '2019-05-14 07:48:46', '2019-05-14 07:48:46', 'solar_chargers', NULL),
(1464, 'Solar Collectors', 1, '2019-05-14 07:48:46', '2019-05-14 07:48:46', 'solar_collectors', NULL),
(1465, 'Solar Energy Products', 1, '2019-05-14 07:48:46', '2019-05-14 07:48:46', 'solar_energy_products', NULL),
(1466, 'Solar Energy Systems', 1, '2019-05-14 07:48:46', '2019-05-14 07:48:46', 'solar_energy_systems', NULL),
(1467, 'Solar Toys', 1, '2019-05-14 07:48:46', '2019-05-14 07:48:46', 'solar_toys', NULL),
(1468, 'Solar Water Heaters', 1, '2019-05-14 07:48:46', '2019-05-14 07:48:46', 'solar_water_heaters', NULL);
INSERT INTO `fau_tags` (`id`, `name`, `is_active`, `created_at`, `updated_at`, `title`, `category_id`) VALUES
(1469, 'Soundbars', 1, '2019-05-14 07:48:46', '2019-05-14 07:48:46', 'soundbars', NULL),
(1470, 'Soundproofing Materials', 1, '2019-05-14 07:48:46', '2019-05-14 07:48:46', 'soundproofing_materials', NULL),
(1471, 'Souvenirs', 1, '2019-05-14 07:48:46', '2019-05-14 07:48:46', 'souvenirs', NULL),
(1472, 'Spa Supplies', 1, '2019-05-14 07:48:46', '2019-05-14 07:48:46', 'spa_supplies', NULL),
(1473, 'Speaker', 1, '2019-05-14 07:48:46', '2019-05-14 07:48:46', 'speaker', NULL),
(1474, 'Speakers', 1, '2019-05-14 07:48:46', '2019-05-14 07:48:46', 'speakers', NULL),
(1475, 'Special Purpose Bags & Cases', 1, '2019-05-14 07:48:46', '2019-05-14 07:48:46', 'special_purpose_bags_&_cases', NULL),
(1476, 'Special Purpose Shoes', 1, '2019-05-14 07:48:46', '2019-05-14 07:48:46', 'special_purpose_shoes', NULL),
(1477, 'Specialty Cookware', 1, '2019-05-14 07:48:46', '2019-05-14 07:48:46', 'specialty_cookware', NULL),
(1478, 'Sports & Leisure Bags', 1, '2019-05-14 07:48:46', '2019-05-14 07:48:46', 'sports_&_leisure_bags', NULL),
(1479, 'Sports Eyewear', 1, '2019-05-14 07:48:46', '2019-05-14 07:48:46', 'sports_eyewear', NULL),
(1480, 'Sports Gloves', 1, '2019-05-14 07:48:46', '2019-05-14 07:48:46', 'sports_gloves', NULL),
(1481, 'Sports Nutrition', 1, '2019-05-14 07:48:46', '2019-05-14 07:48:46', 'sports_nutrition', NULL),
(1482, 'Sports Safety', 1, '2019-05-14 07:48:46', '2019-05-14 07:48:46', 'sports_safety', NULL),
(1483, 'Sports Shoes', 1, '2019-05-14 07:48:46', '2019-05-14 07:48:46', 'sports_shoes', NULL),
(1484, 'Sports Souvenirs', 1, '2019-05-14 07:48:46', '2019-05-14 07:48:46', 'sports_souvenirs', NULL),
(1485, 'Sportswear', 1, '2019-05-14 07:48:46', '2019-05-14 07:48:46', 'sportswear', NULL),
(1486, 'Stacking Racks & Shelves', 1, '2019-05-14 07:48:46', '2019-05-14 07:48:46', 'stacking_racks_&_shelves', NULL),
(1487, 'Stage & Dance Wear', 1, '2019-05-14 07:48:46', '2019-05-14 07:48:46', 'stage_&_dance_wear', NULL),
(1488, 'Stage Lights', 1, '2019-05-14 07:48:46', '2019-05-14 07:48:46', 'stage_lights', NULL),
(1489, 'Stairs & Stair Parts', 1, '2019-05-14 07:48:46', '2019-05-14 07:48:46', 'stairs_&_stair_parts', NULL),
(1490, 'Stamps', 1, '2019-05-14 07:48:46', '2019-05-14 07:48:46', 'stamps', NULL),
(1491, 'Standard Bikes', 1, '2019-05-14 07:48:46', '2019-05-14 07:48:46', 'standard_bikes', NULL),
(1492, 'Stationery Set', 1, '2019-05-14 07:48:46', '2019-05-14 07:48:46', 'stationery_set', NULL),
(1493, 'Steel', 1, '2019-05-14 07:48:46', '2019-05-14 07:48:46', 'steel', NULL),
(1494, 'Stencils', 1, '2019-05-14 07:48:46', '2019-05-14 07:48:46', 'stencils', NULL),
(1495, 'Sterilization Equipments', 1, '2019-05-14 07:48:46', '2019-05-14 07:48:46', 'sterilization_equipments', NULL),
(1496, 'Stickers', 1, '2019-05-14 07:48:46', '2019-05-14 07:48:46', 'stickers', NULL),
(1497, 'Stone Carvings and Sculptures', 1, '2019-05-14 07:48:46', '2019-05-14 07:48:46', 'stone_carvings_and_sculptures', NULL),
(1498, 'Storage for Mac', 1, '2019-05-14 07:48:46', '2019-05-14 07:48:46', 'storage_for_mac', NULL),
(1499, 'Store & Supermarket Supplies', 1, '2019-05-14 07:48:46', '2019-05-14 07:48:46', 'store_&_supermarket_supplies', NULL),
(1500, 'Strapping', 1, '2019-05-14 07:48:46', '2019-05-14 07:48:46', 'strapping', NULL),
(1501, 'Street Lights', 1, '2019-05-14 07:48:46', '2019-05-14 07:48:46', 'street_lights', NULL),
(1502, 'Stretch Film', 1, '2019-05-14 07:48:46', '2019-05-14 07:48:46', 'stretch_film', NULL),
(1503, 'Strollers', 1, '2019-05-14 07:48:46', '2019-05-14 07:48:46', 'strollers', NULL),
(1504, 'Suncreem & Aftersun', 1, '2019-05-14 07:48:46', '2019-05-14 07:48:46', 'suncreem_&_aftersun', NULL),
(1505, 'Sunglasses', 1, '2019-05-14 07:48:46', '2019-05-14 07:48:46', 'sunglasses', NULL),
(1506, 'Sunrooms & Glass Houses', 1, '2019-05-14 07:48:46', '2019-05-14 07:48:46', 'sunrooms_&_glass_houses', NULL),
(1507, 'Supermarket Shelves', 1, '2019-05-14 07:48:46', '2019-05-14 07:48:46', 'supermarket_shelves', NULL),
(1508, 'Supplies Office', 1, '2019-05-14 07:48:46', '2019-05-14 07:48:46', 'supplies_office', NULL),
(1509, 'Surgical Instrument', 1, '2019-05-14 07:48:46', '2019-05-14 07:48:46', 'surgical_instrument', NULL),
(1510, 'Suspenders', 1, '2019-05-14 07:48:46', '2019-05-14 07:48:46', 'suspenders', NULL),
(1511, 'Swimming & Diving', 1, '2019-05-14 07:48:46', '2019-05-14 07:48:46', 'swimming_&_diving', NULL),
(1512, 'Swimming Pool & Water Toys', 1, '2019-05-14 07:48:46', '2019-05-14 07:48:46', 'swimming_pool_&_water_toys', NULL),
(1513, 'Swings,Jumpers & Bouncers', 1, '2019-05-14 07:48:46', '2019-05-14 07:48:46', 'swings,jumpers_&_bouncers', NULL),
(1514, 'Switches', 1, '2019-05-14 07:48:46', '2019-05-14 07:48:46', 'switches', NULL),
(1515, 'Table Lamps', 1, '2019-05-14 07:48:46', '2019-05-14 07:48:46', 'table_lamps', NULL),
(1516, 'Table Tennis', 1, '2019-05-14 07:48:46', '2019-05-14 07:48:46', 'table_tennis', NULL),
(1517, 'Tablet Accessories', 1, '2019-05-14 07:48:46', '2019-05-14 07:48:46', 'tablet_accessories', NULL),
(1518, 'Tableware', 1, '2019-05-14 07:48:46', '2019-05-14 07:48:46', 'tableware', NULL),
(1519, 'Tag Guns', 1, '2019-05-14 07:48:46', '2019-05-14 07:48:46', 'tag_guns', NULL),
(1520, 'Tanks & Camisoles', 1, '2019-05-14 07:48:46', '2019-05-14 07:48:46', 'tanks_&_camisoles', NULL),
(1521, 'Tea', 1, '2019-05-14 07:48:46', '2019-05-14 07:48:46', 'tea', NULL),
(1522, 'Team Sports', 1, '2019-05-14 07:48:46', '2019-05-14 07:48:46', 'team_sports', NULL),
(1523, 'Telecom Parts', 1, '2019-05-14 07:48:46', '2019-05-14 07:48:46', 'telecom_parts', NULL),
(1524, 'Telephone Accessories', 1, '2019-05-14 07:48:46', '2019-05-14 07:48:46', 'telephone_accessories', NULL),
(1525, 'Telephone Cords', 1, '2019-05-14 07:48:46', '2019-05-14 07:48:46', 'telephone_cords', NULL),
(1526, 'Telephone Headsets', 1, '2019-05-14 07:48:46', '2019-05-14 07:48:46', 'telephone_headsets', NULL),
(1527, 'Telephones & Accessories', 1, '2019-05-14 07:48:46', '2019-05-14 07:48:46', 'telephones_&_accessories', NULL),
(1528, 'Television', 1, '2019-05-14 07:48:46', '2019-05-14 07:48:46', 'television', NULL),
(1529, 'Tennis', 1, '2019-05-14 07:48:46', '2019-05-14 07:48:46', 'tennis', NULL),
(1530, 'Textile Accessories', 1, '2019-05-14 07:48:46', '2019-05-14 07:48:46', 'textile_accessories', NULL),
(1531, 'Textile Processing', 1, '2019-05-14 07:48:46', '2019-05-14 07:48:46', 'textile_processing', NULL),
(1532, 'Textile Stock', 1, '2019-05-14 07:48:46', '2019-05-14 07:48:46', 'textile_stock', NULL),
(1533, 'Textile Waste', 1, '2019-05-14 07:48:46', '2019-05-14 07:48:46', 'textile_waste', NULL),
(1534, 'Thread', 1, '2019-05-14 07:48:46', '2019-05-14 07:48:46', 'thread', NULL),
(1535, 'Ties & Accessories', 1, '2019-05-14 07:48:46', '2019-05-14 07:48:46', 'ties_&_accessories', NULL),
(1536, 'Ties & Bow Ties', 1, '2019-05-14 07:48:46', '2019-05-14 07:48:46', 'ties_&_bow_ties', NULL),
(1537, 'Tiles & Accessories', 1, '2019-05-14 07:48:46', '2019-05-14 07:48:46', 'tiles_&_accessories', NULL),
(1538, 'Timber', 1, '2019-05-14 07:48:46', '2019-05-14 07:48:46', 'timber', NULL),
(1539, 'Timber Raw Materials', 1, '2019-05-14 07:48:46', '2019-05-14 07:48:46', 'timber_raw_materials', NULL),
(1540, 'Tires', 1, '2019-05-14 07:48:46', '2019-05-14 07:48:46', 'tires', NULL),
(1541, 'Tires & Wheels', 1, '2019-05-14 07:48:46', '2019-05-14 07:48:46', 'tires_&_wheels', NULL),
(1542, 'Titanium', 1, '2019-05-14 07:48:46', '2019-05-14 07:48:46', 'titanium', NULL),
(1543, 'Tobacco Packaging', 1, '2019-05-14 07:48:46', '2019-05-14 07:48:46', 'tobacco_packaging', NULL),
(1544, 'Tombstones and Monuments', 1, '2019-05-14 07:48:46', '2019-05-14 07:48:46', 'tombstones_and_monuments', NULL),
(1545, 'Tool Design Services', 1, '2019-05-14 07:48:46', '2019-05-14 07:48:46', 'tool_design_services', NULL),
(1546, 'Tool Parts', 1, '2019-05-14 07:48:46', '2019-05-14 07:48:46', 'tool_parts', NULL),
(1547, 'Tool Processing Services', 1, '2019-05-14 07:48:46', '2019-05-14 07:48:46', 'tool_processing_services', NULL),
(1548, 'Tool Sets', 1, '2019-05-14 07:48:46', '2019-05-14 07:48:46', 'tool_sets', NULL),
(1549, 'Tool Stock', 1, '2019-05-14 07:48:46', '2019-05-14 07:48:46', 'tool_stock', NULL),
(1550, 'Tools Packaging', 1, '2019-05-14 07:48:46', '2019-05-14 07:48:46', 'tools_packaging', NULL),
(1551, 'Top-Handle Bags', 1, '2019-05-14 07:48:46', '2019-05-14 07:48:46', 'top-handle_bags', NULL),
(1552, 'Tote Bags', 1, '2019-05-14 07:48:46', '2019-05-14 07:48:46', 'tote_bags', NULL),
(1553, 'Tour Operator', 1, '2019-05-14 07:48:46', '2019-05-14 07:48:46', 'tour_operator', NULL),
(1554, 'Towel', 1, '2019-05-14 07:48:46', '2019-05-14 07:48:46', 'towel', NULL),
(1555, 'Towel Rails & Warmers', 1, '2019-05-14 07:48:46', '2019-05-14 07:48:46', 'towel_rails_&_warmers', NULL),
(1556, 'Toy Accessories', 1, '2019-05-14 07:48:46', '2019-05-14 07:48:46', 'toy_accessories', NULL),
(1557, 'Toy Animal', 1, '2019-05-14 07:48:46', '2019-05-14 07:48:46', 'toy_animal', NULL),
(1558, 'Toy Guns', 1, '2019-05-14 07:48:46', '2019-05-14 07:48:46', 'toy_guns', NULL),
(1559, 'Toy Parts', 1, '2019-05-14 07:48:46', '2019-05-14 07:48:46', 'toy_parts', NULL),
(1560, 'Toy Robots', 1, '2019-05-14 07:48:46', '2019-05-14 07:48:46', 'toy_robots', NULL),
(1561, 'Toy Vehicle', 1, '2019-05-14 07:48:46', '2019-05-14 07:48:46', 'toy_vehicle', NULL),
(1562, 'Toys', 1, '2019-05-14 07:48:46', '2019-05-14 07:48:46', 'toys', NULL),
(1563, 'Trade Show Equipment', 1, '2019-05-14 07:48:46', '2019-05-14 07:48:46', 'trade_show_equipment', NULL),
(1564, 'Trade Show Tent', 1, '2019-05-14 07:48:46', '2019-05-14 07:48:46', 'trade_show_tent', NULL),
(1565, 'Traditional Patented Medicines', 1, '2019-05-14 07:48:46', '2019-05-14 07:48:46', 'traditional_patented_medicines', NULL),
(1566, 'Trailers', 1, '2019-05-14 07:48:46', '2019-05-14 07:48:46', 'trailers', NULL),
(1567, 'Trains', 1, '2019-05-14 07:48:46', '2019-05-14 07:48:46', 'trains', NULL),
(1568, 'Transformers', 1, '2019-05-14 07:48:46', '2019-05-14 07:48:46', 'transformers', NULL),
(1569, 'Transmission Fluids', 1, '2019-05-14 07:48:46', '2019-05-14 07:48:46', 'transmission_fluids', NULL),
(1570, 'Transport Packaging', 1, '2019-05-14 07:48:46', '2019-05-14 07:48:46', 'transport_packaging', NULL),
(1571, 'Tricycles', 1, '2019-05-14 07:48:46', '2019-05-14 07:48:46', 'tricycles', NULL),
(1572, 'Tripods & Monopods', 1, '2019-05-14 07:48:46', '2019-05-14 07:48:46', 'tripods_&_monopods', NULL),
(1573, 'Trolley Bags', 1, '2019-05-14 07:48:46', '2019-05-14 07:48:46', 'trolley_bags', NULL),
(1574, 'Truck Parts & Accessories', 1, '2019-05-14 07:48:46', '2019-05-14 07:48:46', 'truck_parts_&_accessories', NULL),
(1575, 'Trucks', 1, '2019-05-14 07:48:46', '2019-05-14 07:48:46', 'trucks', NULL),
(1576, 'Trunk & Boxers', 1, '2019-05-14 07:48:46', '2019-05-14 07:48:46', 'trunk_&_boxers', NULL),
(1577, 'T-Shirts', 1, '2019-05-14 07:48:46', '2019-05-14 07:48:46', 't-shirts', NULL),
(1578, 'Tungsten', 1, '2019-05-14 07:48:46', '2019-05-14 07:48:46', 'tungsten', NULL),
(1579, 'Tunics', 1, '2019-05-14 07:48:46', '2019-05-14 07:48:46', 'tunics', NULL),
(1580, 'TV Receivers', 1, '2019-05-14 07:48:46', '2019-05-14 07:48:46', 'tv_receivers', NULL),
(1581, 'UHT,Milk & Milk Powder', 1, '2019-05-14 07:48:46', '2019-05-14 07:48:46', 'uht,milk_&_milk_powder', NULL),
(1582, 'Ultrasonic, Optical, Electronic Equipment', 1, '2019-05-14 07:48:46', '2019-05-14 07:48:46', 'ultrasonic,_optical,_electronic_equipment', NULL),
(1583, 'Uniforms', 1, '2019-05-14 07:48:46', '2019-05-14 07:48:46', 'uniforms', NULL),
(1584, 'Unisex Sunglasses', 1, '2019-05-14 07:48:46', '2019-05-14 07:48:46', 'unisex_sunglasses', NULL),
(1585, 'Unstitched Fabric', 1, '2019-05-14 07:48:46', '2019-05-14 07:48:46', 'unstitched_fabric', NULL),
(1586, 'Used Clothes', 1, '2019-05-14 07:48:46', '2019-05-14 07:48:46', 'used_clothes', NULL),
(1587, 'Used General Mechanical Components', 1, '2019-05-14 07:48:46', '2019-05-14 07:48:46', 'used_general_mechanical_components', NULL),
(1588, 'Used Machinery & Equipment', 1, '2019-05-14 07:48:46', '2019-05-14 07:48:46', 'used_machinery_&_equipment', NULL),
(1589, 'Used Shoes', 1, '2019-05-14 07:48:46', '2019-05-14 07:48:46', 'used_shoes', NULL),
(1590, 'Used Tools', 1, '2019-05-14 07:48:46', '2019-05-14 07:48:46', 'used_tools', NULL),
(1591, 'Utensils', 1, '2019-05-14 07:48:46', '2019-05-14 07:48:46', 'utensils', NULL),
(1592, 'Vacuum Cleaner', 1, '2019-05-14 07:48:46', '2019-05-14 07:48:46', 'vacuum_cleaner', NULL),
(1593, 'Vacuum Cleaner Parts', 1, '2019-05-14 07:48:46', '2019-05-14 07:48:46', 'vacuum_cleaner_parts', NULL),
(1594, 'Vacuum Cleaners', 1, '2019-05-14 07:48:46', '2019-05-14 07:48:46', 'vacuum_cleaners', NULL),
(1595, 'Vacuums', 1, '2019-05-14 07:48:46', '2019-05-14 07:48:46', 'vacuums', NULL),
(1596, 'Vanilla Beans', 1, '2019-05-14 07:48:46', '2019-05-14 07:48:46', 'vanilla_beans', NULL),
(1597, 'Vases & Vessels', 1, '2019-05-14 07:48:46', '2019-05-14 07:48:46', 'vases_&_vessels', NULL),
(1598, 'Vegetable Products', 1, '2019-05-14 07:48:46', '2019-05-14 07:48:46', 'vegetable_products', NULL),
(1599, 'Vegetables', 1, '2019-05-14 07:48:46', '2019-05-14 07:48:46', 'vegetables', NULL),
(1600, 'Vending Machines', 1, '2019-05-14 07:48:46', '2019-05-14 07:48:46', 'vending_machines', NULL),
(1601, 'Veterinary Instrument', 1, '2019-05-14 07:48:46', '2019-05-14 07:48:46', 'veterinary_instrument', NULL),
(1602, 'Veterinary Medicine', 1, '2019-05-14 07:48:46', '2019-05-14 07:48:46', 'veterinary_medicine', NULL),
(1603, 'Video Camera', 1, '2019-05-14 07:48:46', '2019-05-14 07:48:46', 'video_camera', NULL),
(1604, 'Video Game & Accessories', 1, '2019-05-14 07:48:46', '2019-05-14 07:48:46', 'video_game_&_accessories', NULL),
(1605, 'Virtual Reality', 1, '2019-05-14 07:48:47', '2019-05-14 07:48:47', 'virtual_reality', NULL),
(1606, 'VoIP Products', 1, '2019-05-14 07:48:47', '2019-05-14 07:48:47', 'voip_products', NULL),
(1607, 'Wall Chargers', 1, '2019-05-14 07:48:47', '2019-05-14 07:48:47', 'wall_chargers', NULL),
(1608, 'Wall Lights & Sconces', 1, '2019-05-14 07:48:47', '2019-05-14 07:48:47', 'wall_lights_&_sconces', NULL),
(1609, 'Wall Mounts & Protectors', 1, '2019-05-14 07:48:47', '2019-05-14 07:48:47', 'wall_mounts_&_protectors', NULL),
(1610, 'Wall Stickers & Decals', 1, '2019-05-14 07:48:47', '2019-05-14 07:48:47', 'wall_stickers_&_decals', NULL),
(1611, 'Wallets', 1, '2019-05-14 07:48:47', '2019-05-14 07:48:47', 'wallets', NULL),
(1612, 'Wallets & Accessoris', 1, '2019-05-14 07:48:47', '2019-05-14 07:48:47', 'wallets_&_accessoris', NULL),
(1613, 'Wallets & Holders', 1, '2019-05-14 07:48:47', '2019-05-14 07:48:47', 'wallets_&_holders', NULL),
(1614, 'Wallpapers/Wall Coating', 1, '2019-05-14 07:48:47', '2019-05-14 07:48:47', 'wallpapers/wall_coating', NULL),
(1615, 'Ward Nursing Equipments', 1, '2019-05-14 07:48:47', '2019-05-14 07:48:47', 'ward_nursing_equipments', NULL),
(1616, 'Washing Machines', 1, '2019-05-14 07:48:47', '2019-05-14 07:48:47', 'washing_machines', NULL),
(1617, 'Waste Management', 1, '2019-05-14 07:48:47', '2019-05-14 07:48:47', 'waste_management', NULL),
(1618, 'Waste Paper', 1, '2019-05-14 07:48:47', '2019-05-14 07:48:47', 'waste_paper', NULL),
(1619, 'Watches', 1, '2019-05-14 07:48:47', '2019-05-14 07:48:47', 'watches', NULL),
(1620, 'Water', 1, '2019-05-14 07:48:47', '2019-05-14 07:48:47', 'water', NULL),
(1621, 'Water Heater', 1, '2019-05-14 07:48:47', '2019-05-14 07:48:47', 'water_heater', NULL),
(1622, 'Water Heaters', 1, '2019-05-14 07:48:47', '2019-05-14 07:48:47', 'water_heaters', NULL),
(1623, 'Water Purifier', 1, '2019-05-14 07:48:47', '2019-05-14 07:48:47', 'water_purifier', NULL),
(1624, 'Water Safety Products', 1, '2019-05-14 07:48:47', '2019-05-14 07:48:47', 'water_safety_products', NULL),
(1625, 'Water Sports', 1, '2019-05-14 07:48:47', '2019-05-14 07:48:47', 'water_sports', NULL),
(1626, 'Water Treatment', 1, '2019-05-14 07:48:47', '2019-05-14 07:48:47', 'water_treatment', NULL),
(1627, 'Water Treatment Appliances', 1, '2019-05-14 07:48:47', '2019-05-14 07:48:47', 'water_treatment_appliances', NULL),
(1628, 'Waterproofing Materials', 1, '2019-05-14 07:48:47', '2019-05-14 07:48:47', 'waterproofing_materials', NULL),
(1629, 'Wedding Decorations & Gifts', 1, '2019-05-14 07:48:47', '2019-05-14 07:48:47', 'wedding_decorations_&_gifts', NULL),
(1630, 'Wedding Supplies', 1, '2019-05-14 07:48:47', '2019-05-14 07:48:47', 'wedding_supplies', NULL),
(1631, 'Wedges', 1, '2019-05-14 07:48:47', '2019-05-14 07:48:47', 'wedges', NULL),
(1632, 'Weight Loss', 1, '2019-05-14 07:48:47', '2019-05-14 07:48:47', 'weight_loss', NULL),
(1633, 'Weight Management', 1, '2019-05-14 07:48:47', '2019-05-14 07:48:47', 'weight_management', NULL),
(1634, 'Weights', 1, '2019-05-14 07:48:47', '2019-05-14 07:48:47', 'weights', NULL),
(1635, 'Well Being', 1, '2019-05-14 07:48:47', '2019-05-14 07:48:47', 'well_being', NULL),
(1636, 'Wet Towel Dispensers', 1, '2019-05-14 07:48:47', '2019-05-14 07:48:47', 'wet_towel_dispensers', NULL),
(1637, 'Wheel Accessories & Parts', 1, '2019-05-14 07:48:47', '2019-05-14 07:48:47', 'wheel_accessories_&_parts', NULL),
(1638, 'WiFi Finder', 1, '2019-05-14 07:48:47', '2019-05-14 07:48:47', 'wifi_finder', NULL),
(1639, 'Wig & Hair Extensions & Pads', 1, '2019-05-14 07:48:47', '2019-05-14 07:48:47', 'wig_&_hair_extensions_&_pads', NULL),
(1640, 'Wind Up Toys', 1, '2019-05-14 07:48:47', '2019-05-14 07:48:47', 'wind_up_toys', NULL),
(1641, 'Winter Sports', 1, '2019-05-14 07:48:47', '2019-05-14 07:48:47', 'winter_sports', NULL),
(1642, 'Wipes & Holders', 1, '2019-05-14 07:48:47', '2019-05-14 07:48:47', 'wipes_&_holders', NULL),
(1643, 'Wire Mesh', 1, '2019-05-14 07:48:47', '2019-05-14 07:48:47', 'wire_mesh', NULL),
(1644, 'Wireless Chargers', 1, '2019-05-14 07:48:47', '2019-05-14 07:48:47', 'wireless_chargers', NULL),
(1645, 'Wireless Networking Equipment', 1, '2019-05-14 07:48:47', '2019-05-14 07:48:47', 'wireless_networking_equipment', NULL),
(1646, 'Wires, Cables & Cable Assemblies', 1, '2019-05-14 07:48:47', '2019-05-14 07:48:47', 'wires,_cables_&_cable_assemblies', NULL),
(1647, 'Wiring Accessories', 1, '2019-05-14 07:48:47', '2019-05-14 07:48:47', 'wiring_accessories', NULL),
(1648, 'Women Eyeglasses', 1, '2019-05-14 07:48:47', '2019-05-14 07:48:47', 'women_eyeglasses', NULL),
(1649, 'Women Fragrances', 1, '2019-05-14 07:48:47', '2019-05-14 07:48:47', 'women_fragrances', NULL),
(1650, 'Women Sunglasses', 1, '2019-05-14 07:48:47', '2019-05-14 07:48:47', 'women_sunglasses', NULL),
(1651, 'Women\'s Clothing', 1, '2019-05-14 07:48:47', '2019-05-14 07:48:47', 'women\'s_clothing', NULL),
(1652, 'Women\'s Shoes', 1, '2019-05-14 07:48:47', '2019-05-14 07:48:47', 'women\'s_shoes', NULL),
(1653, 'Wood Furniture', 1, '2019-05-14 07:48:47', '2019-05-14 07:48:47', 'wood_furniture', NULL),
(1654, 'Wood Pellets', 1, '2019-05-14 07:48:47', '2019-05-14 07:48:47', 'wood_pellets', NULL),
(1655, 'Wooden Toys', 1, '2019-05-14 07:48:47', '2019-05-14 07:48:47', 'wooden_toys', NULL),
(1656, 'Woodworking Machinery', 1, '2019-05-14 07:48:47', '2019-05-14 07:48:47', 'woodworking_machinery', NULL),
(1657, 'Wristlets', 1, '2019-05-14 07:48:47', '2019-05-14 07:48:47', 'wristlets', NULL),
(1658, 'Wristwatches', 1, '2019-05-14 07:48:47', '2019-05-14 07:48:47', 'wristwatches', NULL),
(1659, 'Writing & Correction', 1, '2019-05-14 07:48:47', '2019-05-14 07:48:47', 'writing_&_correction', NULL),
(1660, 'Writing Accessories', 1, '2019-05-14 07:48:47', '2019-05-14 07:48:47', 'writing_accessories', NULL),
(1661, 'Writing Instruments', 1, '2019-05-14 07:48:47', '2019-05-14 07:48:47', 'writing_instruments', NULL),
(1662, 'Xbox Games', 1, '2019-05-14 07:48:47', '2019-05-14 07:48:47', 'xbox_games', NULL),
(1663, 'Yarn', 1, '2019-05-14 07:48:47', '2019-05-14 07:48:47', 'yarn', NULL),
(1664, 'Yellow Pages', 1, '2019-05-14 07:48:47', '2019-05-14 07:48:47', 'yellow_pages', NULL),
(1665, 'Yoga', 1, '2019-05-14 07:48:47', '2019-05-14 07:48:47', 'yoga', NULL),
(1666, 'Zinc', 1, '2019-05-14 07:48:47', '2019-05-14 07:48:47', 'zinc', NULL),
(1667, 'Academic Tutoring', 1, '2019-05-14 07:48:47', '2019-05-14 07:48:47', 'academic_tutoring', NULL),
(1668, 'Access Control/Security', 1, '2019-05-14 07:48:47', '2019-05-14 07:48:47', 'access_control/security', NULL),
(1669, 'Accountant', 1, '2019-05-14 07:48:47', '2019-05-14 07:48:47', 'accountant', NULL),
(1670, 'Accounting, Auditing and Tax Services', 1, '2019-05-14 07:48:47', '2019-05-14 07:48:47', 'accounting,_auditing_and_tax_services', NULL),
(1671, 'Acupuncturist', 1, '2019-05-14 07:48:47', '2019-05-14 07:48:47', 'acupuncturist', NULL),
(1672, 'Adventure Tours', 1, '2019-05-14 07:48:47', '2019-05-14 07:48:47', 'adventure_tours', NULL),
(1673, 'Advertising', 1, '2019-05-14 07:48:47', '2019-05-14 07:48:47', 'advertising', NULL),
(1674, 'Advertising Services', 1, '2019-05-14 07:48:47', '2019-05-14 07:48:47', 'advertising_services', NULL),
(1675, 'Affiliate Marketer', 1, '2019-05-14 07:48:47', '2019-05-14 07:48:47', 'affiliate_marketer', NULL),
(1676, 'Affiliate Sales and Marketing Consultant', 1, '2019-05-14 07:48:47', '2019-05-14 07:48:47', 'affiliate_sales_and_marketing_consultant', NULL),
(1677, 'Air Duct Cleaner', 1, '2019-05-14 07:48:47', '2019-05-14 07:48:47', 'air_duct_cleaner', NULL),
(1678, 'Antique Furniture Sales', 1, '2019-05-14 07:48:47', '2019-05-14 07:48:47', 'antique_furniture_sales', NULL),
(1679, 'Antique Refurbisher', 1, '2019-05-14 07:48:47', '2019-05-14 07:48:47', 'antique_refurbisher', NULL),
(1680, 'App Developer', 1, '2019-05-14 07:48:47', '2019-05-14 07:48:47', 'app_developer', NULL),
(1681, 'Appliance Repair', 1, '2019-05-14 07:48:47', '2019-05-14 07:48:47', 'appliance_repair', NULL),
(1682, 'Appliance Repair Technician', 1, '2019-05-14 07:48:47', '2019-05-14 07:48:47', 'appliance_repair_technician', NULL),
(1683, 'Appliances', 1, '2019-05-14 07:48:47', '2019-05-14 07:48:47', 'appliances', NULL),
(1684, 'Architects', 1, '2019-05-14 07:48:47', '2019-05-14 07:48:47', 'architects', NULL),
(1685, 'Architecture, Interior Design and Furniture', 1, '2019-05-14 07:48:47', '2019-05-14 07:48:47', 'architecture,_interior_design_and_furniture', NULL),
(1686, 'Asbestos', 1, '2019-05-14 07:48:47', '2019-05-14 07:48:47', 'asbestos', NULL),
(1687, 'Athletics', 1, '2019-05-14 07:48:47', '2019-05-14 07:48:47', 'athletics', NULL),
(1688, 'Audio Visual', 1, '2019-05-14 07:48:47', '2019-05-14 07:48:47', 'audio_visual', NULL),
(1689, 'Audio Visual Technician', 1, '2019-05-14 07:48:47', '2019-05-14 07:48:47', 'audio_visual_technician', NULL),
(1690, 'Baker', 1, '2019-05-14 07:48:47', '2019-05-14 07:48:47', 'baker', NULL),
(1691, 'Banking and Financial Services', 1, '2019-05-14 07:48:47', '2019-05-14 07:48:47', 'banking_and_financial_services', NULL),
(1692, 'Banking Services', 1, '2019-05-14 07:48:47', '2019-05-14 07:48:47', 'banking_services', NULL),
(1693, 'Bartending Services', 1, '2019-05-14 07:48:47', '2019-05-14 07:48:47', 'bartending_services', NULL),
(1694, 'Beach Equipment Rentals', 1, '2019-05-14 07:48:47', '2019-05-14 07:48:47', 'beach_equipment_rentals', NULL),
(1695, 'Better Me', 1, '2019-05-14 07:48:47', '2019-05-14 07:48:47', 'better_me', NULL),
(1696, 'Birth Photographer', 1, '2019-05-14 07:48:47', '2019-05-14 07:48:47', 'birth_photographer', NULL),
(1697, 'Birthday Party Character Appearances', 1, '2019-05-14 07:48:47', '2019-05-14 07:48:47', 'birthday_party_character_appearances', NULL),
(1698, 'Blog Consultant', 1, '2019-05-14 07:48:47', '2019-05-14 07:48:47', 'blog_consultant', NULL),
(1699, 'Blogger', 1, '2019-05-14 07:48:47', '2019-05-14 07:48:47', 'blogger', NULL),
(1700, 'Bookkeeper', 1, '2019-05-14 07:48:47', '2019-05-14 07:48:47', 'bookkeeper', NULL),
(1701, 'Books, Subscriptions, & Publications', 1, '2019-05-14 07:48:47', '2019-05-14 07:48:47', 'books,_subscriptions,_&_publications', NULL),
(1702, 'Bookstore', 1, '2019-05-14 07:48:47', '2019-05-14 07:48:47', 'bookstore', NULL),
(1703, 'Building and Construction Services', 1, '2019-05-14 07:48:47', '2019-05-14 07:48:47', 'building_and_construction_services', NULL),
(1704, 'Business Administration Services', 1, '2019-05-14 07:48:47', '2019-05-14 07:48:47', 'business_administration_services', NULL),
(1705, 'Business Consultant', 1, '2019-05-14 07:48:47', '2019-05-14 07:48:47', 'business_consultant', NULL),
(1706, 'Business Consulting', 1, '2019-05-14 07:48:47', '2019-05-14 07:48:47', 'business_consulting', NULL),
(1707, 'Business Development', 1, '2019-05-14 07:48:47', '2019-05-14 07:48:47', 'business_development', NULL),
(1708, 'Business Plan Consultant', 1, '2019-05-14 07:48:47', '2019-05-14 07:48:47', 'business_plan_consultant', NULL),
(1709, 'Car Services and Rentals', 1, '2019-05-14 07:48:47', '2019-05-14 07:48:47', 'car_services_and_rentals', NULL),
(1710, 'Car Washing or Detailing Service', 1, '2019-05-14 07:48:47', '2019-05-14 07:48:47', 'car_washing_or_detailing_service', NULL),
(1711, 'Carpet Installation Service', 1, '2019-05-14 07:48:47', '2019-05-14 07:48:47', 'carpet_installation_service', NULL),
(1712, 'Certified Professional Accountant', 1, '2019-05-14 07:48:47', '2019-05-14 07:48:47', 'certified_professional_accountant', NULL),
(1713, 'Chambers of Commerce', 1, '2019-05-14 07:48:47', '2019-05-14 07:48:47', 'chambers_of_commerce', NULL),
(1714, 'Chemicals (non-janitorial)', 1, '2019-05-14 07:48:47', '2019-05-14 07:48:47', 'chemicals_(non-janitorial)', NULL),
(1715, 'Child Care Service', 1, '2019-05-14 07:48:47', '2019-05-14 07:48:47', 'child_care_service', NULL),
(1716, 'Children’s Entertainment Services', 1, '2019-05-14 07:48:47', '2019-05-14 07:48:47', 'children’s_entertainment_services', NULL),
(1717, 'Children’s Party Planner', 1, '2019-05-14 07:48:47', '2019-05-14 07:48:47', 'children’s_party_planner', NULL),
(1718, 'Chiropractor', 1, '2019-05-14 07:48:47', '2019-05-14 07:48:47', 'chiropractor', NULL),
(1719, 'Cloth Diaper Service', 1, '2019-05-14 07:48:47', '2019-05-14 07:48:47', 'cloth_diaper_service', NULL),
(1720, 'Clothing Alterations Service', 1, '2019-05-14 07:48:47', '2019-05-14 07:48:47', 'clothing_alterations_service', NULL),
(1721, 'College Application Consultant', 1, '2019-05-14 07:48:47', '2019-05-14 07:48:47', 'college_application_consultant', NULL),
(1722, 'Computer and Internet Services', 1, '2019-05-14 07:48:47', '2019-05-14 07:48:47', 'computer_and_internet_services', NULL),
(1723, 'Computer Repair and Maintenance', 1, '2019-05-14 07:48:47', '2019-05-14 07:48:47', 'computer_repair_and_maintenance', NULL),
(1724, 'Computer Repair Service', 1, '2019-05-14 07:48:47', '2019-05-14 07:48:47', 'computer_repair_service', NULL),
(1725, 'Content Writer', 1, '2019-05-14 07:48:47', '2019-05-14 07:48:47', 'content_writer', NULL),
(1726, 'Contract Drafting & Review Service', 1, '2019-05-14 07:48:47', '2019-05-14 07:48:47', 'contract_drafting_&_review_service', NULL),
(1727, 'Corporate Event Planner', 1, '2019-05-14 07:48:47', '2019-05-14 07:48:47', 'corporate_event_planner', NULL),
(1728, 'Courier Services', 1, '2019-05-14 07:48:47', '2019-05-14 07:48:47', 'courier_services', NULL),
(1729, 'Customer Service Phone Operator', 1, '2019-05-14 07:48:47', '2019-05-14 07:48:47', 'customer_service_phone_operator', NULL),
(1730, 'Customer Service Professional', 1, '2019-05-14 07:48:47', '2019-05-14 07:48:47', 'customer_service_professional', NULL),
(1731, 'Data Entry Service', 1, '2019-05-14 07:48:47', '2019-05-14 07:48:47', 'data_entry_service', NULL),
(1732, 'Data Management Consultant', 1, '2019-05-14 07:48:47', '2019-05-14 07:48:47', 'data_management_consultant', NULL),
(1733, 'Digital Den', 1, '2019-05-14 07:48:47', '2019-05-14 07:48:47', 'digital_den', NULL),
(1734, 'Dining Services', 1, '2019-05-14 07:48:47', '2019-05-14 07:48:47', 'dining_services', NULL),
(1735, 'Direct Mail Marketing Service', 1, '2019-05-14 07:48:47', '2019-05-14 07:48:47', 'direct_mail_marketing_service', NULL),
(1736, 'Disaster Planning and Prevention Service', 1, '2019-05-14 07:48:47', '2019-05-14 07:48:47', 'disaster_planning_and_prevention_service', NULL),
(1737, 'Doula & Birth Coaching Services', 1, '2019-05-14 07:48:47', '2019-05-14 07:48:47', 'doula_&_birth_coaching_services', NULL),
(1738, 'EBay Consultant', 1, '2019-05-14 07:48:47', '2019-05-14 07:48:47', 'ebay_consultant', NULL),
(1739, 'Editing & Proofreading Service', 1, '2019-05-14 07:48:47', '2019-05-14 07:48:47', 'editing_&_proofreading_service', NULL),
(1740, 'Education and Training Services', 1, '2019-05-14 07:48:47', '2019-05-14 07:48:47', 'education_and_training_services', NULL),
(1741, 'Electrical', 1, '2019-05-14 07:48:47', '2019-05-14 07:48:47', 'electrical', NULL),
(1742, 'Email Marketing Manager', 1, '2019-05-14 07:48:47', '2019-05-14 07:48:47', 'email_marketing_manager', NULL),
(1743, 'Employee Benefits', 1, '2019-05-14 07:48:47', '2019-05-14 07:48:47', 'employee_benefits', NULL),
(1744, 'Engineering Services', 1, '2019-05-14 07:48:47', '2019-05-14 07:48:47', 'engineering_services', NULL),
(1745, 'Engineers', 1, '2019-05-14 07:48:47', '2019-05-14 07:48:47', 'engineers', NULL),
(1746, 'Entertainment Services', 1, '2019-05-14 07:48:47', '2019-05-14 07:48:47', 'entertainment_services', NULL),
(1747, 'Environmental Services', 1, '2019-05-14 07:48:47', '2019-05-14 07:48:47', 'environmental_services', NULL),
(1748, 'Event Catering Services', 1, '2019-05-14 07:48:47', '2019-05-14 07:48:47', 'event_catering_services', NULL),
(1749, 'Event Management, Conference Equipment and Facilitation', 1, '2019-05-14 07:48:47', '2019-05-14 07:48:47', 'event_management,_conference_equipment_and_facilitation', NULL),
(1750, 'Event Photographer', 1, '2019-05-14 07:48:47', '2019-05-14 07:48:47', 'event_photographer', NULL),
(1751, 'Event Planner', 1, '2019-05-14 07:48:47', '2019-05-14 07:48:47', 'event_planner', NULL),
(1752, 'Event Videographer', 1, '2019-05-14 07:48:47', '2019-05-14 07:48:47', 'event_videographer', NULL),
(1753, 'Executive Headhunting', 1, '2019-05-14 07:48:47', '2019-05-14 07:48:47', 'executive_headhunting', NULL),
(1754, 'Export Management', 1, '2019-05-14 07:48:47', '2019-05-14 07:48:47', 'export_management', NULL),
(1755, 'Facebook Ads Strategist', 1, '2019-05-14 07:48:47', '2019-05-14 07:48:47', 'facebook_ads_strategist', NULL),
(1756, 'Facilities Management', 1, '2019-05-14 07:48:47', '2019-05-14 07:48:47', 'facilities_management', NULL),
(1757, 'Florist', 1, '2019-05-14 07:48:47', '2019-05-14 07:48:47', 'florist', NULL),
(1758, 'Food Services', 1, '2019-05-14 07:48:47', '2019-05-14 07:48:47', 'food_services', NULL),
(1759, 'Freelance Researcher', 1, '2019-05-14 07:48:47', '2019-05-14 07:48:47', 'freelance_researcher', NULL),
(1760, 'Genealogist', 1, '2019-05-14 07:48:47', '2019-05-14 07:48:47', 'genealogist', NULL),
(1761, 'Grant Writer', 1, '2019-05-14 07:48:47', '2019-05-14 07:48:47', 'grant_writer', NULL),
(1762, 'Green Cleaner', 1, '2019-05-14 07:48:47', '2019-05-14 07:48:47', 'green_cleaner', NULL),
(1763, 'Green Consultant', 1, '2019-05-14 07:48:47', '2019-05-14 07:48:47', 'green_consultant', NULL),
(1764, 'Hair Salon Owner', 1, '2019-05-14 07:48:47', '2019-05-14 07:48:47', 'hair_salon_owner', NULL),
(1765, 'Hairdresser', 1, '2019-05-14 07:48:47', '2019-05-14 07:48:47', 'hairdresser', NULL),
(1766, 'Handyman Service', 1, '2019-05-14 07:48:47', '2019-05-14 07:48:47', 'handyman_service', NULL),
(1767, 'Hauling Services', 1, '2019-05-14 07:48:47', '2019-05-14 07:48:47', 'hauling_services', NULL),
(1768, 'Home Baby Proofing Consultant', 1, '2019-05-14 07:48:47', '2019-05-14 07:48:47', 'home_baby_proofing_consultant', NULL),
(1769, 'Home Cleaning Service', 1, '2019-05-14 07:48:47', '2019-05-14 07:48:47', 'home_cleaning_service', NULL),
(1770, 'Home-Inspection Services', 1, '2019-05-14 07:48:47', '2019-05-14 07:48:47', 'home-inspection_services', NULL),
(1771, 'Hospitals, Clinics and Health Services', 1, '2019-05-14 07:48:47', '2019-05-14 07:48:47', 'hospitals,_clinics_and_health_services', NULL),
(1772, 'Ice Cream Shop Business', 1, '2019-05-14 07:48:47', '2019-05-14 07:48:47', 'ice_cream_shop_business', NULL),
(1773, 'Information & Technology Services', 1, '2019-05-14 07:48:47', '2019-05-14 07:48:47', 'information_&_technology_services', NULL),
(1774, 'Insurance', 1, '2019-05-14 07:48:47', '2019-05-14 07:48:47', 'insurance', NULL),
(1775, 'Insurance Services', 1, '2019-05-14 07:48:47', '2019-05-14 07:48:47', 'insurance_services', NULL),
(1776, 'Interior Designer', 1, '2019-05-14 07:48:47', '2019-05-14 07:48:47', 'interior_designer', NULL),
(1777, 'Interior Painting Service', 1, '2019-05-14 07:48:47', '2019-05-14 07:48:47', 'interior_painting_service', NULL),
(1778, 'Investment Services', 1, '2019-05-14 07:48:47', '2019-05-14 07:48:47', 'investment_services', NULL),
(1779, 'IT Systems Consultant', 1, '2019-05-14 07:48:47', '2019-05-14 07:48:47', 'it_systems_consultant', NULL),
(1780, 'Jewelry Maker', 1, '2019-05-14 07:48:47', '2019-05-14 07:48:47', 'jewelry_maker', NULL),
(1781, 'Lactation Consultant', 1, '2019-05-14 07:48:47', '2019-05-14 07:48:47', 'lactation_consultant', NULL),
(1782, 'Laundry Service', 1, '2019-05-14 07:48:47', '2019-05-14 07:48:47', 'laundry_service', NULL),
(1783, 'Lawn Care', 1, '2019-05-14 07:48:47', '2019-05-14 07:48:47', 'lawn_care', NULL),
(1784, 'Legal Services', 1, '2019-05-14 07:48:47', '2019-05-14 07:48:47', 'legal_services', NULL),
(1785, 'Live Chat Customer Support Service', 1, '2019-05-14 07:48:47', '2019-05-14 07:48:47', 'live_chat_customer_support_service', NULL),
(1786, 'Locksmith Services', 1, '2019-05-14 07:48:47', '2019-05-14 07:48:47', 'locksmith_services', NULL),
(1787, 'Makeup Artist', 1, '2019-05-14 07:48:47', '2019-05-14 07:48:47', 'makeup_artist', NULL),
(1788, 'Manufacturing and Industrial Production Services', 1, '2019-05-14 07:48:47', '2019-05-14 07:48:47', 'manufacturing_and_industrial_production_services', NULL),
(1789, 'Meal Delivery Service', 1, '2019-05-14 07:48:47', '2019-05-14 07:48:47', 'meal_delivery_service', NULL),
(1790, 'Mechanical Services', 1, '2019-05-14 07:48:47', '2019-05-14 07:48:47', 'mechanical_services', NULL),
(1791, 'Meditation Instructor', 1, '2019-05-14 07:48:47', '2019-05-14 07:48:47', 'meditation_instructor', NULL),
(1792, 'Memberships', 1, '2019-05-14 07:48:47', '2019-05-14 07:48:47', 'memberships', NULL),
(1793, 'Metals Services', 1, '2019-05-14 07:48:47', '2019-05-14 07:48:47', 'metals_services', NULL),
(1794, 'Mining and Oil and Gas Services', 1, '2019-05-14 07:48:47', '2019-05-14 07:48:47', 'mining_and_oil_and_gas_services', NULL),
(1795, 'Mobile IT Support Service', 1, '2019-05-14 07:48:47', '2019-05-14 07:48:47', 'mobile_it_support_service', NULL),
(1796, 'Mobile Veterinary Services', 1, '2019-05-14 07:48:47', '2019-05-14 07:48:47', 'mobile_veterinary_services', NULL),
(1797, 'Music Teacher', 1, '2019-05-14 07:48:47', '2019-05-14 07:48:47', 'music_teacher', NULL),
(1798, 'Musician', 1, '2019-05-14 07:48:47', '2019-05-14 07:48:47', 'musician', NULL),
(1799, 'Nanny & Au Pair Placement Service', 1, '2019-05-14 07:48:47', '2019-05-14 07:48:47', 'nanny_&_au_pair_placement_service', NULL),
(1800, 'Nutrition Consultant', 1, '2019-05-14 07:48:47', '2019-05-14 07:48:47', 'nutrition_consultant', NULL),
(1801, 'Nutritionist', 1, '2019-05-14 07:48:47', '2019-05-14 07:48:47', 'nutritionist', NULL),
(1802, 'Office Furniture', 1, '2019-05-14 07:48:47', '2019-05-14 07:48:47', 'office_furniture', NULL),
(1803, 'Office Rental', 1, '2019-05-14 07:48:47', '2019-05-14 07:48:47', 'office_rental', NULL),
(1804, 'Office Supplies/Equipment', 1, '2019-05-14 07:48:47', '2019-05-14 07:48:47', 'office_supplies/equipment', NULL),
(1805, 'Office Support Services', 1, '2019-05-14 07:48:47', '2019-05-14 07:48:47', 'office_support_services', NULL),
(1806, 'On-Demand Babysitter', 1, '2019-05-14 07:48:47', '2019-05-14 07:48:47', 'on-demand_babysitter', NULL),
(1807, 'Online Business Coach', 1, '2019-05-14 07:48:47', '2019-05-14 07:48:47', 'online_business_coach', NULL),
(1808, 'Online Course Consultant', 1, '2019-05-14 07:48:47', '2019-05-14 07:48:47', 'online_course_consultant', NULL),
(1809, 'Online Dating Consultant / Profile Editor', 1, '2019-05-14 07:48:47', '2019-05-14 07:48:47', 'online_dating_consultant_/_profile_editor', NULL),
(1810, 'Online English Tutor', 1, '2019-05-14 07:48:47', '2019-05-14 07:48:47', 'online_english_tutor', NULL),
(1811, 'Online Network Installation and Maintenance', 1, '2019-05-14 07:48:47', '2019-05-14 07:48:47', 'online_network_installation_and_maintenance', NULL),
(1812, 'Online Security Consultant', 1, '2019-05-14 07:48:47', '2019-05-14 07:48:47', 'online_security_consultant', NULL),
(1813, 'Organic Hair Care Products Seller', 1, '2019-05-14 07:48:47', '2019-05-14 07:48:47', 'organic_hair_care_products_seller', NULL),
(1814, 'Organic Lawn Care Provider', 1, '2019-05-14 07:48:47', '2019-05-14 07:48:47', 'organic_lawn_care_provider', NULL),
(1815, 'Other Business Services', 1, '2019-05-14 07:48:47', '2019-05-14 07:48:47', 'other_business_services', NULL),
(1816, 'Overnight Doula Service', 1, '2019-05-14 07:48:47', '2019-05-14 07:48:47', 'overnight_doula_service', NULL),
(1817, 'Painting/Interior Finishes', 1, '2019-05-14 07:48:47', '2019-05-14 07:48:47', 'painting/interior_finishes', NULL),
(1818, 'Paralegal Services', 1, '2019-05-14 07:48:47', '2019-05-14 07:48:47', 'paralegal_services', NULL),
(1819, 'Parking & Transportation', 1, '2019-05-14 07:48:47', '2019-05-14 07:48:47', 'parking_&_transportation', NULL),
(1820, 'Patent and Trademark Law Services', 1, '2019-05-14 07:48:47', '2019-05-14 07:48:47', 'patent_and_trademark_law_services', NULL),
(1821, 'Payroll Processing Service', 1, '2019-05-14 07:48:47', '2019-05-14 07:48:47', 'payroll_processing_service', NULL),
(1822, 'Personal Chef', 1, '2019-05-14 07:48:47', '2019-05-14 07:48:47', 'personal_chef', NULL),
(1823, 'Personal Fitness Trainer', 1, '2019-05-14 07:48:47', '2019-05-14 07:48:47', 'personal_fitness_trainer', NULL),
(1824, 'Personal Wardrobe Stylist', 1, '2019-05-14 07:48:47', '2019-05-14 07:48:47', 'personal_wardrobe_stylist', NULL),
(1825, 'Pest Control Professional', 1, '2019-05-14 07:48:47', '2019-05-14 07:48:47', 'pest_control_professional', NULL),
(1826, 'Pet Couture Designer/Seller', 1, '2019-05-14 07:48:47', '2019-05-14 07:48:47', 'pet_couture_designer/seller', NULL),
(1827, 'Pet Groomer', 1, '2019-05-14 07:48:47', '2019-05-14 07:48:47', 'pet_groomer', NULL),
(1828, 'Pet Sitter', 1, '2019-05-14 07:48:47', '2019-05-14 07:48:47', 'pet_sitter', NULL),
(1829, 'Photo Booth Rental Service', 1, '2019-05-14 07:48:47', '2019-05-14 07:48:47', 'photo_booth_rental_service', NULL),
(1830, 'Photo Restoration Service', 1, '2019-05-14 07:48:47', '2019-05-14 07:48:47', 'photo_restoration_service', NULL),
(1831, 'Photographer', 1, '2019-05-14 07:48:47', '2019-05-14 07:48:47', 'photographer', NULL),
(1832, 'Photographic Equipment', 1, '2019-05-14 07:48:47', '2019-05-14 07:48:47', 'photographic_equipment', NULL),
(1833, 'Photographic Services', 1, '2019-05-14 07:48:47', '2019-05-14 07:48:47', 'photographic_services', NULL),
(1834, 'Pizza Parlor', 1, '2019-05-14 07:48:47', '2019-05-14 07:48:47', 'pizza_parlor', NULL),
(1835, 'Plumbing', 1, '2019-05-14 07:48:47', '2019-05-14 07:48:47', 'plumbing', NULL),
(1836, 'Plumbing Service', 1, '2019-05-14 07:48:47', '2019-05-14 07:48:47', 'plumbing_service', NULL),
(1837, 'Podcast Producer', 1, '2019-05-14 07:48:47', '2019-05-14 07:48:47', 'podcast_producer', NULL),
(1838, 'Podcaster', 1, '2019-05-14 07:48:47', '2019-05-14 07:48:47', 'podcaster', NULL),
(1839, 'Pool Cleaner', 1, '2019-05-14 07:48:47', '2019-05-14 07:48:47', 'pool_cleaner', NULL),
(1840, 'Pool Cleaning and Maintenance Provider', 1, '2019-05-14 07:48:47', '2019-05-14 07:48:47', 'pool_cleaning_and_maintenance_provider', NULL),
(1841, 'Pool Servicing and Maintenance', 1, '2019-05-14 07:48:47', '2019-05-14 07:48:47', 'pool_servicing_and_maintenance', NULL),
(1842, 'Porcelain Repair', 1, '2019-05-14 07:48:47', '2019-05-14 07:48:47', 'porcelain_repair', NULL),
(1843, 'Postage', 1, '2019-05-14 07:48:48', '2019-05-14 07:48:48', 'postage', NULL),
(1844, 'Power Washing Service', 1, '2019-05-14 07:48:48', '2019-05-14 07:48:48', 'power_washing_service', NULL),
(1845, 'Prcruitment', 1, '2019-05-14 07:48:48', '2019-05-14 07:48:48', 'prcruitment', NULL),
(1846, 'Presentation and Proposal Designer', 1, '2019-05-14 07:48:48', '2019-05-14 07:48:48', 'presentation_and_proposal_designer', NULL),
(1847, 'Print & Postal Hub', 1, '2019-05-14 07:48:48', '2019-05-14 07:48:48', 'print_&_postal_hub', NULL),
(1848, 'Printer and Copy Machine Maintenance', 1, '2019-05-14 07:48:48', '2019-05-14 07:48:48', 'printer_and_copy_machine_maintenance', NULL),
(1849, 'Printing', 1, '2019-05-14 07:48:48', '2019-05-14 07:48:48', 'printing', NULL),
(1850, 'Printing and Publishing Services', 1, '2019-05-14 07:48:48', '2019-05-14 07:48:48', 'printing_and_publishing_services', NULL),
(1851, 'Private Car Service', 1, '2019-05-14 07:48:48', '2019-05-14 07:48:48', 'private_car_service', NULL),
(1852, 'Private Investigator', 1, '2019-05-14 07:48:48', '2019-05-14 07:48:48', 'private_investigator', NULL),
(1853, 'Private Music Teacher', 1, '2019-05-14 07:48:48', '2019-05-14 07:48:48', 'private_music_teacher', NULL),
(1854, 'Private Nursing Service', 1, '2019-05-14 07:48:48', '2019-05-14 07:48:48', 'private_nursing_service', NULL),
(1855, 'Private School Application Consultant', 1, '2019-05-14 07:48:48', '2019-05-14 07:48:48', 'private_school_application_consultant', NULL),
(1856, 'Private Tutor', 1, '2019-05-14 07:48:48', '2019-05-14 07:48:48', 'private_tutor', NULL),
(1857, 'Private Yoga Instructor', 1, '2019-05-14 07:48:48', '2019-05-14 07:48:48', 'private_yoga_instructor', NULL),
(1858, 'Procurement Services', 1, '2019-05-14 07:48:48', '2019-05-14 07:48:48', 'procurement_services', NULL),
(1859, 'Product Standards, Testing, and Certification', 1, '2019-05-14 07:48:48', '2019-05-14 07:48:48', 'product_standards,_testing,_and_certification', NULL),
(1860, 'Professional Services/Consultants', 1, '2019-05-14 07:48:48', '2019-05-14 07:48:48', 'professional_services/consultants', NULL),
(1861, 'Project Manager', 1, '2019-05-14 07:48:48', '2019-05-14 07:48:48', 'project_manager', NULL),
(1862, 'Promotional', 1, '2019-05-14 07:48:48', '2019-05-14 07:48:48', 'promotional', NULL),
(1863, 'Proofreader', 1, '2019-05-14 07:48:48', '2019-05-14 07:48:48', 'proofreader', NULL),
(1864, 'Public Relations Agency', 1, '2019-05-14 07:48:48', '2019-05-14 07:48:48', 'public_relations_agency', NULL),
(1865, 'Public Relations Consultant', 1, '2019-05-14 07:48:48', '2019-05-14 07:48:48', 'public_relations_consultant', NULL),
(1866, 'Public Speaker', 1, '2019-05-14 07:48:48', '2019-05-14 07:48:48', 'public_speaker', NULL),
(1867, 'Real Estate Services', 1, '2019-05-14 07:48:48', '2019-05-14 07:48:48', 'real_estate_services', NULL),
(1868, 'Regional Economic Development', 1, '2019-05-14 07:48:48', '2019-05-14 07:48:48', 'regional_economic_development', NULL),
(1869, 'Relocation services', 1, '2019-05-14 07:48:48', '2019-05-14 07:48:48', 'relocation_services', NULL),
(1870, 'Rental Property Management', 1, '2019-05-14 07:48:48', '2019-05-14 07:48:48', 'rental_property_management', NULL),
(1871, 'Resnet', 1, '2019-05-14 07:48:48', '2019-05-14 07:48:48', 'resnet', NULL),
(1872, 'Restaurants and Catering', 1, '2019-05-14 07:48:48', '2019-05-14 07:48:48', 'restaurants_and_catering', NULL),
(1873, 'Resume Service', 1, '2019-05-14 07:48:48', '2019-05-14 07:48:48', 'resume_service', NULL),
(1874, 'Resume Writer', 1, '2019-05-14 07:48:48', '2019-05-14 07:48:48', 'resume_writer', NULL),
(1875, 'Retailers', 1, '2019-05-14 07:48:48', '2019-05-14 07:48:48', 'retailers', NULL),
(1876, 'Reunion Coordinator', 1, '2019-05-14 07:48:48', '2019-05-14 07:48:48', 'reunion_coordinator', NULL),
(1877, 'RIT Inn & Conference Center', 1, '2019-05-14 07:48:48', '2019-05-14 07:48:48', 'rit_inn_&_conference_center', NULL),
(1878, 'Roofing', 1, '2019-05-14 07:48:48', '2019-05-14 07:48:48', 'roofing', NULL),
(1879, 'Safety/Fire', 1, '2019-05-14 07:48:48', '2019-05-14 07:48:48', 'safety/fire', NULL),
(1880, 'Sales Consultant', 1, '2019-05-14 07:48:48', '2019-05-14 07:48:48', 'sales_consultant', NULL),
(1881, 'SAT Tutoring & Preparation', 1, '2019-05-14 07:48:48', '2019-05-14 07:48:48', 'sat_tutoring_&_preparation', NULL),
(1882, 'Scientific Supplies', 1, '2019-05-14 07:48:48', '2019-05-14 07:48:48', 'scientific_supplies', NULL),
(1883, 'Scrapbook Maker', 1, '2019-05-14 07:48:48', '2019-05-14 07:48:48', 'scrapbook_maker', NULL),
(1884, 'Scrapbooker for Hire', 1, '2019-05-14 07:48:48', '2019-05-14 07:48:48', 'scrapbooker_for_hire', NULL),
(1885, 'SCUBA Diving Instructor', 1, '2019-05-14 07:48:48', '2019-05-14 07:48:48', 'scuba_diving_instructor', NULL),
(1886, 'Seamstress or Tailor Services', 1, '2019-05-14 07:48:48', '2019-05-14 07:48:48', 'seamstress_or_tailor_services', NULL),
(1887, 'Security and Personal Safety', 1, '2019-05-14 07:48:48', '2019-05-14 07:48:48', 'security_and_personal_safety', NULL),
(1888, 'Senior Care Provider', 1, '2019-05-14 07:48:48', '2019-05-14 07:48:48', 'senior_care_provider', NULL),
(1889, 'SEO Consultant', 1, '2019-05-14 07:48:48', '2019-05-14 07:48:48', 'seo_consultant', NULL),
(1890, 'SEO Strategist', 1, '2019-05-14 07:48:48', '2019-05-14 07:48:48', 'seo_strategist', NULL),
(1891, 'Shipping Services/UPS/Customs', 1, '2019-05-14 07:48:48', '2019-05-14 07:48:48', 'shipping_services/ups/customs', NULL),
(1892, 'Site/Landscaping', 1, '2019-05-14 07:48:48', '2019-05-14 07:48:48', 'site/landscaping', NULL),
(1893, 'Ski or Snowboarding Instructor', 1, '2019-05-14 07:48:48', '2019-05-14 07:48:48', 'ski_or_snowboarding_instructor', NULL),
(1894, 'Snow and Ice Removal Service', 1, '2019-05-14 07:48:48', '2019-05-14 07:48:48', 'snow_and_ice_removal_service', NULL),
(1895, 'Soap Maker', 1, '2019-05-14 07:48:48', '2019-05-14 07:48:48', 'soap_maker', NULL),
(1896, 'Social Media Consultant', 1, '2019-05-14 07:48:48', '2019-05-14 07:48:48', 'social_media_consultant', NULL),
(1897, 'Social Media Manager', 1, '2019-05-14 07:48:48', '2019-05-14 07:48:48', 'social_media_manager', NULL),
(1898, 'Software', 1, '2019-05-14 07:48:48', '2019-05-14 07:48:48', 'software', NULL),
(1899, 'Software Installation Service', 1, '2019-05-14 07:48:48', '2019-05-14 07:48:48', 'software_installation_service', NULL),
(1900, 'Speech Writer', 1, '2019-05-14 07:48:48', '2019-05-14 07:48:48', 'speech_writer', NULL),
(1901, 'Structural', 1, '2019-05-14 07:48:48', '2019-05-14 07:48:48', 'structural', NULL),
(1902, 'Student Auxiliary Services', 1, '2019-05-14 07:48:48', '2019-05-14 07:48:48', 'student_auxiliary_services', NULL),
(1903, 'Subcontract Awards', 1, '2019-05-14 07:48:48', '2019-05-14 07:48:48', 'subcontract_awards', NULL),
(1904, 'Tax Accountant', 1, '2019-05-14 07:48:48', '2019-05-14 07:48:48', 'tax_accountant', NULL),
(1905, 'Tech Support Business', 1, '2019-05-14 07:48:48', '2019-05-14 07:48:48', 'tech_support_business', NULL),
(1906, 'Telecommunications', 1, '2019-05-14 07:48:48', '2019-05-14 07:48:48', 'telecommunications', NULL),
(1907, 'Temporary Staffing', 1, '2019-05-14 07:48:48', '2019-05-14 07:48:48', 'temporary_staffing', NULL),
(1908, 'Thermal & Moisture Protection', 1, '2019-05-14 07:48:48', '2019-05-14 07:48:48', 'thermal_&_moisture_protection', NULL),
(1909, 'Tiger Bucks Program', 1, '2019-05-14 07:48:48', '2019-05-14 07:48:48', 'tiger_bucks_program', NULL),
(1910, 'Trade Show and Exhibition Services', 1, '2019-05-14 07:48:48', '2019-05-14 07:48:48', 'trade_show_and_exhibition_services', NULL),
(1911, 'Trade Show Producer', 1, '2019-05-14 07:48:48', '2019-05-14 07:48:48', 'trade_show_producer', NULL),
(1912, 'Training', 1, '2019-05-14 07:48:48', '2019-05-14 07:48:48', 'training', NULL),
(1913, 'Translation and Interpretation', 1, '2019-05-14 07:48:48', '2019-05-14 07:48:48', 'translation_and_interpretation', NULL),
(1914, 'Translation Service Provider', 1, '2019-05-14 07:48:48', '2019-05-14 07:48:48', 'translation_service_provider', NULL),
(1915, 'Translator', 1, '2019-05-14 07:48:48', '2019-05-14 07:48:48', 'translator', NULL),
(1916, 'Transportation (charter services)', 1, '2019-05-14 07:48:48', '2019-05-14 07:48:48', 'transportation_(charter_services)', NULL),
(1917, 'Transportation, Freight Forwarder and Storage Services', 1, '2019-05-14 07:48:48', '2019-05-14 07:48:48', 'transportation,_freight_forwarder_and_storage_services', NULL),
(1918, 'Travel', 1, '2019-05-14 07:48:48', '2019-05-14 07:48:48', 'travel', NULL),
(1919, 'Travel Agent', 1, '2019-05-14 07:48:48', '2019-05-14 07:48:48', 'travel_agent', NULL),
(1920, 'Travel Concierge Services', 1, '2019-05-14 07:48:48', '2019-05-14 07:48:48', 'travel_concierge_services', NULL),
(1921, 'Travel Facilitation', 1, '2019-05-14 07:48:48', '2019-05-14 07:48:48', 'travel_facilitation', NULL),
(1922, 'Tree Farmer', 1, '2019-05-14 07:48:48', '2019-05-14 07:48:48', 'tree_farmer', NULL),
(1923, 'T-shirt Designer', 1, '2019-05-14 07:48:48', '2019-05-14 07:48:48', 't-shirt_designer', NULL),
(1924, 'University Arenas', 1, '2019-05-14 07:48:48', '2019-05-14 07:48:48', 'university_arenas', NULL),
(1925, 'University Gallery', 1, '2019-05-14 07:48:48', '2019-05-14 07:48:48', 'university_gallery', NULL),
(1926, 'Utilities Specialties', 1, '2019-05-14 07:48:48', '2019-05-14 07:48:48', 'utilities_specialties', NULL),
(1927, 'Valet Parking Service', 1, '2019-05-14 07:48:48', '2019-05-14 07:48:48', 'valet_parking_service', NULL),
(1928, 'Vehicle Inspection Service', 1, '2019-05-14 07:48:48', '2019-05-14 07:48:48', 'vehicle_inspection_service', NULL),
(1929, 'Vehicles/Equipment', 1, '2019-05-14 07:48:48', '2019-05-14 07:48:48', 'vehicles/equipment', NULL),
(1930, 'Vetting/Due Diligence', 1, '2019-05-14 07:48:48', '2019-05-14 07:48:48', 'vetting/due_diligence', NULL),
(1931, 'Video Producer', 1, '2019-05-14 07:48:48', '2019-05-14 07:48:48', 'video_producer', NULL),
(1932, 'Virtual Call Center', 1, '2019-05-14 07:48:48', '2019-05-14 07:48:48', 'virtual_call_center', NULL),
(1933, 'Voice-Over Professional', 1, '2019-05-14 07:48:48', '2019-05-14 07:48:48', 'voice-over_professional', NULL),
(1934, 'Wallpaper Installation Service', 1, '2019-05-14 07:48:48', '2019-05-14 07:48:48', 'wallpaper_installation_service', NULL),
(1935, 'Waste Disposal and Recycling', 1, '2019-05-14 07:48:48', '2019-05-14 07:48:48', 'waste_disposal_and_recycling', NULL),
(1936, 'Web Designer', 1, '2019-05-14 07:48:48', '2019-05-14 07:48:48', 'web_designer', NULL),
(1937, 'Website Designer', 1, '2019-05-14 07:48:48', '2019-05-14 07:48:48', 'website_designer', NULL),
(1938, 'Wedding Planner', 1, '2019-05-14 07:48:48', '2019-05-14 07:48:48', 'wedding_planner', NULL),
(1939, 'Window Washing', 1, '2019-05-14 07:48:48', '2019-05-14 07:48:48', 'window_washing', NULL);
INSERT INTO `fau_tags` (`id`, `name`, `is_active`, `created_at`, `updated_at`, `title`, `category_id`) VALUES
(1940, 'Windows/Doors/Storefronts', 1, '2019-05-14 07:48:48', '2019-05-14 07:48:48', 'windows/doors/storefronts', NULL),
(1941, 'Windshield Repair Service', 1, '2019-05-14 07:48:48', '2019-05-14 07:48:48', 'windshield_repair_service', NULL),
(1942, 'Yoga Instructor', 1, '2019-05-14 07:48:48', '2019-05-14 07:48:48', 'yoga_instructor', NULL),
(1943, 'Yoga Teacher', 1, '2019-05-14 07:48:48', '2019-05-14 07:48:48', 'yoga_teacher', NULL),
(1944, 'YouTube Personality', 1, '2019-05-14 07:48:48', '2019-05-14 07:48:48', 'youtube_personality', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `footer_links`
--

CREATE TABLE `footer_links` (
  `id` int(10) UNSIGNED NOT NULL,
  `facebook_url` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gmail_url` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `twitter_url` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `linkedin_url` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `youtube_url` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `whats_app` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `footer_links`
--

INSERT INTO `footer_links` (`id`, `facebook_url`, `gmail_url`, `twitter_url`, `linkedin_url`, `youtube_url`, `whats_app`, `is_active`, `created_at`, `updated_at`) VALUES
(1, 'https://www.facebook.com/', 'https://gmail.com', 'https://twitter.com/', 'https://www.linkedin.com/', 'https://www.youtube.com/', 'https://web.whatsapp.com', 1, '2019-05-14 07:48:27', '2019-05-14 07:48:27');

-- --------------------------------------------------------

--
-- Table structure for table `footer_settings`
--

CREATE TABLE `footer_settings` (
  `id` int(10) UNSIGNED NOT NULL,
  `address` varchar(2000) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(2000) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT '0',
  `copy_right` varchar(2000) COLLATE utf8mb4_unicode_ci NOT NULL,
  `follow_with_us` varchar(2000) COLLATE utf8mb4_unicode_ci NOT NULL,
  `left_paragraph` varchar(2000) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `footer_settings`
--

INSERT INTO `footer_settings` (`id`, `address`, `phone`, `is_active`, `copy_right`, `follow_with_us`, `left_paragraph`, `created_at`, `updated_at`) VALUES
(1, '28800 Orchard Lake Road, Suite 180 Farmington Hills, U.S.A. Landmark : Next To Airport', '+01 1245 2541', 1, 'copyrights © 2017 RN53Themes.net.   All rights reserved.', 'Join the thousands of other There are many variations of passages of Lorem Ipsum available', 'Worlds\'s No. 1 Local Business Directory Website.\r\nIt is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout.', '2019-05-14 07:48:27', '2019-05-14 07:48:27');

-- --------------------------------------------------------

--
-- Table structure for table `galleries`
--

CREATE TABLE `galleries` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL,
  `add_id` int(10) UNSIGNED DEFAULT NULL,
  `business_id` int(10) UNSIGNED DEFAULT NULL,
  `service_id` int(10) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `galleries`
--

INSERT INTO `galleries` (`id`, `name`, `add_id`, `business_id`, `service_id`, `created_at`, `updated_at`) VALUES
(1, 'project-assets/images/face.jpg', NULL, 1, NULL, '2019-05-14 07:48:50', '2019-05-14 07:48:50'),
(2, 'project-assets/images/face.jpg', NULL, 1, NULL, '2019-05-14 07:48:50', '2019-05-14 07:48:50'),
(3, 'project-assets/images/face.jpg', NULL, 2, NULL, '2019-05-14 07:48:52', '2019-05-14 07:48:52'),
(4, 'project-assets/images/face.jpg', NULL, 2, NULL, '2019-05-14 07:48:52', '2019-05-14 07:48:52'),
(5, 'project-assets/images/face.jpg', NULL, NULL, 1, '2019-05-14 07:48:53', '2019-05-14 07:48:53'),
(6, 'project-assets/images/face.jpg', NULL, NULL, 1, '2019-05-14 07:48:53', '2019-05-14 07:48:53'),
(7, 'project-assets/images/face.jpg', NULL, NULL, 2, '2019-05-14 07:48:54', '2019-05-14 07:48:54'),
(8, 'project-assets/images/face.jpg', NULL, NULL, 2, '2019-05-14 07:48:54', '2019-05-14 07:48:54'),
(9, 'project-assets/images/face.jpg', 1, NULL, NULL, '2019-05-14 07:48:55', '2019-05-14 07:48:55'),
(10, 'project-assets/images/face.jpg', 1, NULL, NULL, '2019-05-14 07:48:55', '2019-05-14 07:48:55'),
(11, 'project-assets/images/face.jpg', 2, NULL, NULL, '2019-05-14 07:48:56', '2019-05-14 07:48:56'),
(12, 'project-assets/images/face.jpg', 2, NULL, NULL, '2019-05-14 07:48:56', '2019-05-14 07:48:56');

-- --------------------------------------------------------

--
-- Table structure for table `inventory_packing_units`
--

CREATE TABLE `inventory_packing_units` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_active` tinyint(1) DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `languages`
--

CREATE TABLE `languages` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `languages`
--

INSERT INTO `languages` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'URDU', '2019-05-14 07:49:05', '2019-05-14 07:49:05'),
(2, 'ENGLISH', '2019-05-14 07:49:05', '2019-05-14 07:49:05'),
(3, 'ARABIC', '2019-05-14 07:49:05', '2019-05-14 07:49:05'),
(4, 'Pashto', '2019-05-14 07:49:05', '2019-05-14 07:49:05'),
(5, 'Sindhi', '2019-05-14 07:49:05', '2019-05-14 07:49:05'),
(6, 'Balochi', '2019-05-14 07:49:05', '2019-05-14 07:49:05'),
(7, 'Saraiki', '2019-05-14 07:49:06', '2019-05-14 07:49:06'),
(8, 'Brahui', '2019-05-14 07:49:06', '2019-05-14 07:49:06'),
(9, 'Shina', '2019-05-14 07:49:06', '2019-05-14 07:49:06'),
(10, 'Kashmiri', '2019-05-14 07:49:06', '2019-05-14 07:49:06');

-- --------------------------------------------------------

--
-- Table structure for table `likes`
--

CREATE TABLE `likes` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED DEFAULT NULL,
  `review_id` int(10) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `comment_id` int(10) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `main_cities`
--

CREATE TABLE `main_cities` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(1055) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `state_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `main_cities`
--

INSERT INTO `main_cities` (`id`, `name`, `image`, `state_id`) VALUES
(31273, 'Barkhan', NULL, 2723),
(31274, 'Bela', NULL, 2723),
(31275, 'Bhag', NULL, 2723),
(31276, 'Chaman', NULL, 2723),
(31277, 'Chitkan', NULL, 2723),
(31278, 'Dalbandin', NULL, 2723),
(31279, 'Dera Allah Yar', NULL, 2723),
(31280, 'Dera Bugti', NULL, 2723),
(31281, 'Dera Murad Jamali', NULL, 2723),
(31282, 'Dhadar', NULL, 2723),
(31283, 'Duki', NULL, 2723),
(31284, 'Gaddani', NULL, 2723),
(31285, 'Gwadar', NULL, 2723),
(31286, 'Harnai', NULL, 2723),
(31287, 'Hub', NULL, 2723),
(31288, 'Jiwani', NULL, 2723),
(31289, 'Kalat', NULL, 2723),
(31290, 'Kharan', NULL, 2723),
(31291, 'Khuzdar', NULL, 2723),
(31292, 'Kohlu', NULL, 2723),
(31293, 'Loralai', NULL, 2723),
(31294, 'Mach', NULL, 2723),
(31295, 'Mastung', NULL, 2723),
(31296, 'Nushki', NULL, 2723),
(31297, 'Ormara', NULL, 2723),
(31298, 'Pasni', NULL, 2723),
(31299, 'Pishin', NULL, 2723),
(31300, 'Quetta', NULL, 2723),
(31301, 'Sibi', NULL, 2723),
(31302, 'Sohbatpur', NULL, 2723),
(31303, 'Surab', NULL, 2723),
(31304, 'Turbat', NULL, 2723),
(31305, 'Usta Muhammad', NULL, 2723),
(31306, 'Uthal', NULL, 2723),
(31307, 'Wadh', NULL, 2723),
(31308, 'Winder', NULL, 2723),
(31309, 'Zehri', NULL, 2723),
(31310, 'Zhob', NULL, 2723),
(31311, 'Ziarat', NULL, 2723),
(31312, 'Abdul Hakim', NULL, 2728),
(31313, 'Ahmadpur East', NULL, 2728),
(31314, 'Ahmadpur Lumma', NULL, 2728),
(31315, 'Ahmadpur Sial', NULL, 2728),
(31316, 'Ahmedabad', NULL, 2728),
(31317, 'Alipur', NULL, 2728),
(31318, 'Alipur Chatha', NULL, 2728),
(31319, 'Arifwala', NULL, 2728),
(31320, 'Attock', NULL, 2728),
(31321, 'Baddomalhi', NULL, 2728),
(31322, 'Bagh', NULL, 2728),
(31323, 'Bahawalnagar', NULL, 2728),
(31324, 'Bahawalpur', NULL, 2728),
(31325, 'Bai Pheru', NULL, 2728),
(31326, 'Basirpur', NULL, 2728),
(31327, 'Begowala', NULL, 2728),
(31328, 'Bhakkar', NULL, 2728),
(31329, 'Bhalwal', NULL, 2728),
(31330, 'Bhawana', NULL, 2728),
(31331, 'Bhera', NULL, 2728),
(31332, 'Bhopalwala', NULL, 2728),
(31333, 'Burewala', NULL, 2728),
(31334, 'Chak Azam Sahu', NULL, 2728),
(31335, 'Chak Jhumra', NULL, 2728),
(31336, 'Chak Sarwar Shahid', NULL, 2728),
(31337, 'Chakwal', NULL, 2728),
(31338, 'Chawinda', NULL, 2728),
(31339, 'Chichawatni', NULL, 2728),
(31340, 'Chiniot', NULL, 2728),
(31341, 'Chishtian Mandi', NULL, 2728),
(31342, 'Choa Saidan Shah', NULL, 2728),
(31343, 'Chuhar Kana', NULL, 2728),
(31344, 'Chunian', NULL, 2728),
(31345, 'Dajal', NULL, 2728),
(31346, 'Darya Khan', NULL, 2728),
(31347, 'Daska', NULL, 2728),
(31348, 'Daud Khel', NULL, 2728),
(31349, 'Daultala', NULL, 2728),
(31350, 'Dera Din Panah', NULL, 2728),
(31351, 'Dera Ghazi Khan', NULL, 2728),
(31352, 'Dhanote', NULL, 2728),
(31353, 'Dhonkal', NULL, 2728),
(31354, 'Dijkot', NULL, 2728),
(31355, 'Dina', NULL, 2728),
(31356, 'Dinga', NULL, 2728),
(31357, 'Dipalpur', NULL, 2728),
(31358, 'Dullewala', NULL, 2728),
(31359, 'Dunga Bunga', NULL, 2728),
(31360, 'Dunyapur', NULL, 2728),
(31361, 'Eminabad', NULL, 2728),
(31362, 'Faisalabad', NULL, 2728),
(31363, 'Faqirwali', NULL, 2728),
(31364, 'Faruka', NULL, 2728),
(31365, 'Fateh Jang', NULL, 2728),
(31366, 'Fatehpur', NULL, 2728),
(31367, 'Fazalpur', NULL, 2728),
(31368, 'Ferozwala', NULL, 2728),
(31369, 'Fort Abbas', NULL, 2728),
(31370, 'Garh Maharaja', NULL, 2728),
(31371, 'Ghakar', NULL, 2728),
(31372, 'Ghurgushti', NULL, 2728),
(31373, 'Gojra', NULL, 2728),
(31374, 'Gujar Khan', NULL, 2728),
(31375, 'Gujranwala', NULL, 2728),
(31376, 'Gujrat', NULL, 2728),
(31377, 'Hadali', NULL, 2728),
(31378, 'Hafizabad', NULL, 2728),
(31379, 'Harnoli', NULL, 2728),
(31380, 'Harunabad', NULL, 2728),
(31381, 'Hasan Abdal', NULL, 2728),
(31382, 'Hasilpur', NULL, 2728),
(31383, 'Haveli', NULL, 2728),
(31384, 'Hazro', NULL, 2728),
(31385, 'Hujra Shah Muqim', NULL, 2728),
(31386, 'Isa Khel', NULL, 2728),
(31387, 'Jahanian', NULL, 2728),
(31388, 'Jalalpur Bhattian', NULL, 2728),
(31389, 'Jalalpur Jattan', NULL, 2728),
(31390, 'Jalalpur Pirwala', NULL, 2728),
(31391, 'Jalla Jeem', NULL, 2728),
(31392, 'Jamke Chima', NULL, 2728),
(31393, 'Jampur', NULL, 2728),
(31394, 'Jand', NULL, 2728),
(31395, 'Jandanwala', NULL, 2728),
(31396, 'Jandiala Sherkhan', NULL, 2728),
(31397, 'Jaranwala', NULL, 2728),
(31398, 'Jatoi', NULL, 2728),
(31399, 'Jauharabad', NULL, 2728),
(31400, 'Jhang', NULL, 2728),
(31401, 'Jhawarian', NULL, 2728),
(31402, 'Jhelum', NULL, 2728),
(31403, 'Kabirwala', NULL, 2728),
(31404, 'Kahna Nau', NULL, 2728),
(31405, 'Kahror Pakka', NULL, 2728),
(31406, 'Kahuta', NULL, 2728),
(31407, 'Kalabagh', NULL, 2728),
(31408, 'Kalaswala', NULL, 2728),
(31409, 'Kaleke', NULL, 2728),
(31410, 'Kalur Kot', NULL, 2728),
(31411, 'Kamalia', NULL, 2728),
(31412, 'Kamar Mashani', NULL, 2728),
(31413, 'Kamir', NULL, 2728),
(31414, 'Kamoke', NULL, 2728),
(31415, 'Kamra', NULL, 2728),
(31416, 'Kanganpur', NULL, 2728),
(31417, 'Karampur', NULL, 2728),
(31418, 'Karor Lal Esan', NULL, 2728),
(31419, 'Kasur', NULL, 2728),
(31420, 'Khairpur Tamewali', NULL, 2728),
(31421, 'Khanewal', NULL, 2728),
(31422, 'Khangah Dogran', NULL, 2728),
(31423, 'Khangarh', NULL, 2728),
(31424, 'Khanpur', NULL, 2728),
(31425, 'Kharian', NULL, 2728),
(31426, 'Khewra', NULL, 2728),
(31427, 'Khundian', NULL, 2728),
(31428, 'Khurianwala', NULL, 2728),
(31429, 'Khushab', NULL, 2728),
(31430, 'Kot Abdul Malik', NULL, 2728),
(31431, 'Kot Addu', NULL, 2728),
(31432, 'Kot Mithan', NULL, 2728),
(31433, 'Kot Moman', NULL, 2728),
(31434, 'Kot Radha Kishan', NULL, 2728),
(31435, 'Kot Samaba', NULL, 2728),
(31436, 'Kotli Loharan', NULL, 2728),
(31437, 'Kundian', NULL, 2728),
(31438, 'Kunjah', NULL, 2728),
(31439, 'Lahore', NULL, 2728),
(31440, 'Lalamusa', NULL, 2728),
(31441, 'Lalian', NULL, 2728),
(31442, 'Liaqatabad', NULL, 2728),
(31443, 'Liaqatpur', NULL, 2728),
(31444, 'Lieah', NULL, 2728),
(31445, 'Liliani', NULL, 2728),
(31446, 'Lodhran', NULL, 2728),
(31447, 'Ludhewala Waraich', NULL, 2728),
(31448, 'Mailsi', NULL, 2728),
(31449, 'Makhdumpur', NULL, 2728),
(31450, 'Makhdumpur Rashid', NULL, 2728),
(31451, 'Malakwal', NULL, 2728),
(31452, 'Mamu Kanjan', NULL, 2728),
(31453, 'Mananwala Jodh Singh', NULL, 2728),
(31454, 'Mandi Bahauddin', NULL, 2728),
(31455, 'Mandi Sadiq Ganj', NULL, 2728),
(31456, 'Mangat', NULL, 2728),
(31457, 'Mangla', NULL, 2728),
(31458, 'Mankera', NULL, 2728),
(31459, 'Mian Channun', NULL, 2728),
(31460, 'Miani', NULL, 2728),
(31461, 'Mianwali', NULL, 2728),
(31462, 'Minchinabad', NULL, 2728),
(31463, 'Mitha Tiwana', NULL, 2728),
(31464, 'Multan', NULL, 2728),
(31465, 'Muridke', NULL, 2728),
(31466, 'Murree', NULL, 2728),
(31467, 'Mustafabad', NULL, 2728),
(31468, 'Muzaffargarh', NULL, 2728),
(31469, 'Nankana Sahib', NULL, 2728),
(31470, 'Narang', NULL, 2728),
(31471, 'Narowal', NULL, 2728),
(31472, 'Noorpur Thal', NULL, 2728),
(31473, 'Nowshera', NULL, 2728),
(31474, 'Nowshera Virkan', NULL, 2728),
(31475, 'Okara', NULL, 2728),
(31476, 'Pakpattan', NULL, 2728),
(31477, 'Pasrur', NULL, 2728),
(31478, 'Pattoki', NULL, 2728),
(31479, 'Phalia', NULL, 2728),
(31480, 'Phularwan', NULL, 2728),
(31481, 'Pind Dadan Khan', NULL, 2728),
(31482, 'Pindi Bhattian', NULL, 2728),
(31483, 'Pindi Gheb', NULL, 2728),
(31484, 'Pirmahal', NULL, 2728),
(31485, 'Qadirabad', NULL, 2728),
(31486, 'Qadirpur Ran', NULL, 2728),
(31487, 'Qila Disar Singh', NULL, 2728),
(31488, 'Qila Sobha Singh', NULL, 2728),
(31489, 'Quaidabad', NULL, 2728),
(31490, 'Rabwah', NULL, 2728),
(31491, 'Rahim Yar Khan', NULL, 2728),
(31492, 'Raiwind', NULL, 2728),
(31493, 'Raja Jang', NULL, 2728),
(31494, 'Rajanpur', NULL, 2728),
(31495, 'Rasulnagar', NULL, 2728),
(31496, 'Rawalpindi', NULL, 2728),
(31497, 'Renala Khurd', NULL, 2728),
(31498, 'Rojhan', NULL, 2728),
(31499, 'Saddar Gogera', NULL, 2728),
(31500, 'Sadiqabad', NULL, 2728),
(31501, 'Safdarabad', NULL, 2728),
(31502, 'Sahiwal', NULL, 2728),
(31503, 'Samasatta', NULL, 2728),
(31504, 'Sambrial', NULL, 2728),
(31505, 'Sammundri', NULL, 2728),
(31506, 'Sangala Hill', NULL, 2728),
(31507, 'Sanjwal', NULL, 2728),
(31508, 'Sarai Alamgir', NULL, 2728),
(31509, 'Sarai Sidhu', NULL, 2728),
(31510, 'Sargodha', NULL, 2728),
(31511, 'Shadiwal', NULL, 2728),
(31512, 'Shahkot', NULL, 2728),
(31513, 'Shahpur MainCity', NULL, 2728),
(31514, 'Shahpur Saddar', NULL, 2728),
(31515, 'Shakargarh', NULL, 2728),
(31516, 'Sharqpur', NULL, 2728),
(31517, 'Shehr Sultan', NULL, 2728),
(31518, 'Shekhupura', NULL, 2728),
(31519, 'Shujaabad', NULL, 2728),
(31520, 'Sialkot', NULL, 2728),
(31521, 'Sillanwali', NULL, 2728),
(31522, 'Sodhra', NULL, 2728),
(31523, 'Sohawa', NULL, 2728),
(31524, 'Sukheke', NULL, 2728),
(31525, 'Talagang', NULL, 2728),
(31526, 'Tandlianwala', NULL, 2728),
(31527, 'Taunsa', NULL, 2728),
(31528, 'Taxila', NULL, 2728),
(31529, 'Tibba Sultanpur', NULL, 2728),
(31530, 'Toba Tek Singh', NULL, 2728),
(31531, 'Tulamba', NULL, 2728),
(31532, 'Uch', NULL, 2728),
(31533, 'Vihari', NULL, 2728),
(31534, 'Wah', NULL, 2728),
(31535, 'Warburton', NULL, 2728),
(31536, 'Wazirabad', NULL, 2728),
(31537, 'Yazman', NULL, 2728),
(31538, 'Zafarwal', NULL, 2728),
(31539, 'Zahir Pir', NULL, 2728),
(31540, 'Adilpur', NULL, 2729),
(31541, 'Badah', NULL, 2729),
(31542, 'Badin', NULL, 2729),
(31543, 'Bagarji', NULL, 2729),
(31544, 'Bakshshapur', NULL, 2729),
(31545, 'Bandhi', NULL, 2729),
(31546, 'Berani', NULL, 2729),
(31547, 'Bhan', NULL, 2729),
(31548, 'Bhiria MainCity', NULL, 2729),
(31549, 'Bhiria Road', NULL, 2729),
(31550, 'Bhit Shah', NULL, 2729),
(31551, 'Bozdar', NULL, 2729),
(31552, 'Bulri', NULL, 2729),
(31553, 'Chak', NULL, 2729),
(31554, 'Chambar', NULL, 2729),
(31555, 'Chohar Jamali', NULL, 2729),
(31556, 'Chor', NULL, 2729),
(31557, 'Dadu', NULL, 2729),
(31558, 'Daharki', NULL, 2729),
(31559, 'Daro', NULL, 2729),
(31560, 'Darya Khan Mari', NULL, 2729),
(31561, 'Daulatpur', NULL, 2729),
(31562, 'Daur', NULL, 2729),
(31563, 'Dhoronaro', NULL, 2729),
(31564, 'Digri', NULL, 2729),
(31565, 'Diplo', NULL, 2729),
(31566, 'Dokri', NULL, 2729),
(31567, 'Faqirabad', NULL, 2729),
(31568, 'Gambat', NULL, 2729),
(31569, 'Garello', NULL, 2729),
(31570, 'Garhi Khairo', NULL, 2729),
(31571, 'Garhi Yasin', NULL, 2729),
(31572, 'Gharo', NULL, 2729),
(31573, 'Ghauspur', NULL, 2729),
(31574, 'Ghotki', NULL, 2729),
(31575, 'Golarchi', NULL, 2729),
(31576, 'Guddu', NULL, 2729),
(31577, 'Gulistan-E-Jauhar', NULL, 2729),
(31578, 'Hala', NULL, 2729),
(31579, 'Hingorja', NULL, 2729),
(31580, 'Hyderabad', NULL, 2729),
(31581, 'Islamkot', NULL, 2729),
(31582, 'Jacobabad', NULL, 2729),
(31583, 'Jam Nawaz Ali', NULL, 2729),
(31584, 'Jam Sahib', NULL, 2729),
(31585, 'Jati', NULL, 2729),
(31586, 'Jhol', NULL, 2729),
(31587, 'Jhudo', NULL, 2729),
(31588, 'Johi', NULL, 2729),
(31589, 'Kadhan', NULL, 2729),
(31590, 'Kambar', NULL, 2729),
(31591, 'Kandhra', NULL, 2729),
(31592, 'Kandiari', NULL, 2729),
(31593, 'Kandiaro', NULL, 2729),
(31594, 'Karachi', NULL, 2729),
(31595, 'Karampur', NULL, 2729),
(31596, 'Kario Ghanwar', NULL, 2729),
(31597, 'Karoondi', NULL, 2729),
(31598, 'Kashmor', NULL, 2729),
(31599, 'Kazi Ahmad', NULL, 2729),
(31600, 'Keti Bandar', NULL, 2729),
(31601, 'Khadro', NULL, 2729),
(31602, 'Khairpur', NULL, 2729),
(31603, 'Khairpur Nathan Shah', NULL, 2729),
(31604, 'Khandh Kot', NULL, 2729),
(31605, 'Khanpur', NULL, 2729),
(31606, 'Khipro', NULL, 2729),
(31607, 'Khoski', NULL, 2729),
(31608, 'Khuhra', NULL, 2729),
(31609, 'Khyber', NULL, 2729),
(31610, 'Kot Diji', NULL, 2729),
(31611, 'Kot Ghulam Mohammad', NULL, 2729),
(31612, 'Kotri', NULL, 2729),
(31613, 'Kumb', NULL, 2729),
(31614, 'Kunri', NULL, 2729),
(31615, 'Lakhi', NULL, 2729),
(31616, 'Larkana', NULL, 2729),
(31617, 'Madeji', NULL, 2729),
(31618, 'Matiari', NULL, 2729),
(31619, 'Matli', NULL, 2729),
(31620, 'Mehar', NULL, 2729),
(31621, 'Mehrabpur', NULL, 2729),
(31622, 'Miro Khan', NULL, 2729),
(31623, 'Mirpur Bathoro', NULL, 2729),
(31624, 'Mirpur Khas', NULL, 2729),
(31625, 'Mirpur Mathelo', NULL, 2729),
(31626, 'Mirpur Sakro', NULL, 2729),
(31627, 'Mirwah', NULL, 2729),
(31628, 'Mithi', NULL, 2729),
(31629, 'Moro', NULL, 2729),
(31630, 'Nabisar', NULL, 2729),
(31631, 'Nasarpur', NULL, 2729),
(31632, 'Nasirabad', NULL, 2729),
(31633, 'Naudero', NULL, 2729),
(31634, 'Naukot', NULL, 2729),
(31635, 'Naushahro Firoz', NULL, 2729),
(31636, 'Nawabshah', NULL, 2729),
(31637, 'Oderolal Station', NULL, 2729),
(31638, 'Pacca Chang', NULL, 2729),
(31639, 'Padidan', NULL, 2729),
(31640, 'Pano Aqil', NULL, 2729),
(31641, 'Perumal', NULL, 2729),
(31642, 'Phulji', NULL, 2729),
(31643, 'Pirjo Goth', NULL, 2729),
(31644, 'Piryaloi', NULL, 2729),
(31645, 'Pithoro', NULL, 2729),
(31646, 'Radhan', NULL, 2729),
(31647, 'Rajo Khanani', NULL, 2729),
(31648, 'Ranipur', NULL, 2729),
(31649, 'Ratodero', NULL, 2729),
(31650, 'Rohri', NULL, 2729),
(31651, 'Rustam', NULL, 2729),
(31652, 'Saeedabad', NULL, 2729),
(31653, 'Sakrand', NULL, 2729),
(31654, 'Samaro', NULL, 2729),
(31655, 'Sanghar', NULL, 2729),
(31656, 'Sann', NULL, 2729),
(31657, 'Sarhari', NULL, 2729),
(31658, 'Sehwan', NULL, 2729),
(31659, 'Setharja', NULL, 2729),
(31660, 'Shah Dipalli', NULL, 2729),
(31661, 'Shahdadkot', NULL, 2729),
(31662, 'Shahdadpur', NULL, 2729),
(31663, 'Shahpur Chakar', NULL, 2729),
(31664, 'Shahpur Jahania', NULL, 2729),
(31665, 'Shikarpur', NULL, 2729),
(31666, 'Sinjhoro', NULL, 2729),
(31667, 'Sita Road', NULL, 2729),
(31668, 'Sobhodero', NULL, 2729),
(31669, 'Sujawal', NULL, 2729),
(31670, 'Sukkur', NULL, 2729),
(31671, 'Talhar', NULL, 2729),
(31672, 'Tando Adam', NULL, 2729),
(31673, 'Tando Allah Yar', NULL, 2729),
(31674, 'Tando Bagho', NULL, 2729),
(31675, 'Tando Ghulam Ali', NULL, 2729),
(31676, 'Tando Jam', NULL, 2729),
(31677, 'Tando Jan Mohammad', NULL, 2729),
(31678, 'Tando Mitha Khan', NULL, 2729),
(31679, 'Tando Muhammad Khan', NULL, 2729),
(31680, 'Tangwani', NULL, 2729),
(31681, 'Thano Bula Khan', NULL, 2729),
(31682, 'Thari Mirwah', NULL, 2729),
(31683, 'Tharushah', NULL, 2729),
(31684, 'Thatta', NULL, 2729),
(31685, 'Ther I', NULL, 2729),
(31686, 'Ther I Mohabat', NULL, 2729),
(31687, 'Thul', NULL, 2729),
(31688, 'Ubauro', NULL, 2729),
(31689, 'Umarkot', NULL, 2729),
(31690, 'Warah', NULL, 2729),
(31691, 'Buffalo', NULL, 2729),
(31692, 'Rochester', NULL, 2729),
(31694, 'Yonkers', NULL, 2729),
(31695, 'Syracuse', NULL, 2729),
(31696, 'Albany', NULL, 2729),
(31697, 'New Rochelle', NULL, 2729),
(31698, 'Mount Vernon', NULL, 2729),
(31699, 'Schenectady', NULL, 2729),
(31700, 'Utica', NULL, 2729),
(31701, 'White Plains', NULL, 2729),
(31702, 'Hempstead', NULL, 2729),
(31703, 'Troy', NULL, 2729),
(31704, 'Niagara Falls', NULL, 2729),
(31705, 'Binghamton', NULL, 2729),
(31706, 'Freeport', NULL, 2729),
(31707, 'Valley Stream', NULL, 2729);

-- --------------------------------------------------------

--
-- Table structure for table `main_countries`
--

CREATE TABLE `main_countries` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phonecode` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `country_code` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `flag` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `main_countries`
--

INSERT INTO `main_countries` (`id`, `name`, `phonecode`, `country_code`, `flag`) VALUES
(166, 'Pakistan', '92', 'pak', '/main-assets/images/pakistan-flag.png'),
(230, 'United Kingdom', '44', 'GB', 'main-assets/images/uk-flag.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `main_currencies`
--

CREATE TABLE `main_currencies` (
  `id` int(10) UNSIGNED NOT NULL,
  `currency` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `main_currencies`
--

INSERT INTO `main_currencies` (`id`, `currency`, `price`, `created_at`, `updated_at`) VALUES
(1, 'USD', 1000, '2019-05-14 07:48:29', '2019-05-14 07:48:29'),
(2, 'PKS', 3000, '2019-05-14 07:48:29', '2019-05-14 07:48:29'),
(3, 'IND', 2000, '2019-05-14 07:48:29', '2019-05-14 07:48:29'),
(4, 'UEI', 1000, '2019-05-14 07:48:30', '2019-05-14 07:48:30'),
(5, 'USD', 1000, '2019-05-14 07:48:30', '2019-05-14 07:48:30'),
(6, 'USD', 1000, '2019-05-14 07:48:30', '2019-05-14 07:48:30'),
(7, 'USD', 1000, '2019-05-14 07:48:30', '2019-05-14 07:48:30');

-- --------------------------------------------------------

--
-- Table structure for table `main_modules`
--

CREATE TABLE `main_modules` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `stripe_product_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `icon_image_url` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `icon_code` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `main_modules`
--

INSERT INTO `main_modules` (`id`, `name`, `stripe_product_id`, `icon_image_url`, `icon_code`, `active`, `created_at`, `updated_at`) VALUES
(1, 'FindAroundU', 'prod_EdwVgXM8PHjQwH', NULL, 'abc', 1, '2019-05-14 07:48:26', '2019-05-14 07:48:26');

-- --------------------------------------------------------

--
-- Table structure for table `main_states`
--

CREATE TABLE `main_states` (
  `id` int(10) UNSIGNED NOT NULL,
  `country_id` int(11) NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `main_states`
--

INSERT INTO `main_states` (`id`, `country_id`, `name`) VALUES
(2723, 166, 'Baluchistan'),
(2724, 166, 'Federal Capital Area'),
(2725, 166, 'Federally administered Tribal '),
(2726, 166, 'North-West Frontier'),
(2727, 166, 'Northern Areas'),
(2728, 166, 'Punjab'),
(2729, 166, 'Sind'),
(3919, 231, 'Alabama'),
(3920, 231, 'Alaska'),
(3921, 231, 'Arizona'),
(3922, 231, 'Arkansas'),
(3923, 231, 'Byram'),
(3924, 231, 'California'),
(3925, 231, 'Cokato'),
(3926, 231, 'Colorado'),
(3927, 231, 'Connecticut'),
(3928, 231, 'Delaware'),
(3929, 231, 'District of Columbia'),
(3930, 231, 'Florida'),
(3931, 231, 'Georgia'),
(3932, 231, 'Hawaii'),
(3933, 231, 'Idaho'),
(3934, 231, 'Illinois'),
(3935, 231, 'Indiana'),
(3936, 231, 'Iowa'),
(3937, 231, 'Kansas'),
(3938, 231, 'Kentucky'),
(3939, 231, 'Louisiana'),
(3940, 231, 'Lowa'),
(3941, 231, 'Maine'),
(3942, 231, 'Maryland'),
(3943, 231, 'Massachusetts'),
(3944, 231, 'Medfield'),
(3945, 231, 'Michigan'),
(3946, 231, 'Minnesota'),
(3947, 231, 'Mississippi'),
(3948, 231, 'Missouri'),
(3949, 231, 'Montana'),
(3950, 231, 'Nebraska'),
(3951, 231, 'Nevada'),
(3952, 231, 'New Hampshire'),
(3953, 231, 'New Jersey'),
(3954, 231, 'New Jersy'),
(3955, 231, 'New Mexico'),
(3956, 231, 'New York'),
(3957, 231, 'North Carolina'),
(3958, 231, 'North Dakota'),
(3959, 231, 'Ohio'),
(3960, 231, 'Oklahoma'),
(3961, 231, 'Ontario'),
(3962, 231, 'Oregon'),
(3963, 231, 'Pennsylvania'),
(3964, 231, 'Ramey'),
(3965, 231, 'Rhode Island'),
(3966, 231, 'South Carolina'),
(3967, 231, 'South Dakota'),
(3968, 231, 'Sublimity'),
(3969, 231, 'Tennessee'),
(3970, 231, 'Texas'),
(3971, 231, 'Trimble'),
(3972, 231, 'Utah'),
(3973, 231, 'Vermont'),
(3974, 231, 'Virginia'),
(3975, 231, 'Washington'),
(3976, 231, 'West Virginia'),
(3977, 231, 'Wisconsin'),
(3978, 231, 'Wyoming');

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
(3, '2019_01_22_153457_create_roles_table', 1),
(4, '2019_01_22_153512_create_user_infos_table', 1),
(5, '2019_01_23_102747_role_id_in_users', 1),
(6, '2019_01_23_104603_create_countries_table', 1),
(7, '2019_01_23_104659_add_country_id_idusers_table', 1),
(8, '2019_01_23_115019_create_social_accounts_table', 1),
(9, '2019_01_24_140722_create_footer_settings_table', 1),
(10, '2019_01_24_141040_create_footer_links_table', 1),
(11, '2019_01_25_112958_create_categories_table', 1),
(12, '2019_01_29_093330_create_plans_table', 1),
(13, '2019_01_29_093655_create_plan_features_table', 1),
(14, '2019_01_29_093902_create_subscriptions_table', 1),
(15, '2019_01_29_094142_create_subscription_plan_types_table', 1),
(16, '2019_01_29_094319_create_subscription_pricig_models_table', 1),
(17, '2019_01_29_094522_create_subscription_plan_pivot_pricing_models_table', 1),
(18, '2019_01_29_102343_create_subscription_invoices_table', 1),
(19, '2019_01_29_102834_create_subscription_invoice_billings_table', 1),
(20, '2019_01_29_103045_create_subscription_invoice_payment_methods_table', 1),
(21, '2019_01_29_115933_add_columns_in_plan', 1),
(22, '2019_01_29_120328_pivot_user_subscription_table', 1),
(23, '2019_01_29_134437_create_main_modules_table', 1),
(24, '2019_01_29_150101_create_subcription_plan_packages_table', 1),
(25, '2019_01_30_162406_create_businesses_table', 1),
(26, '2019_01_30_162730_create_adds_table', 1),
(27, '2019_01_30_162757_create_services_table', 1),
(28, '2019_02_01_080706_create_pivot_categories_adds_business_services_table', 1),
(29, '2019_02_01_094746_create_adds_business_service_products_features_table', 1),
(30, '2019_02_06_104305_create_rates_table', 1),
(31, '2019_02_06_105131_create_addresses_table', 1),
(32, '2019_02_08_141936_create_timings_table', 1),
(33, '2019_02_08_170211_create_pivot_business_services_table', 1),
(34, '2019_02_08_210830_create_galleries_table', 1),
(35, '2019_02_11_092643_create_reviews_table', 1),
(36, '2019_02_11_144327_create_likes_table', 1),
(37, '2019_02_11_153226_create_comments_table', 1),
(38, '2019_02_12_150817_create_replies_table', 1),
(39, '2019_02_12_153708_add_comment_id_in_like_table', 1),
(40, '2019_02_22_100114_create_settings_table', 1),
(41, '2019_02_22_140216_create_service_id_timing', 1),
(42, '2019_02_25_121501_create_stats_table', 1),
(43, '2019_03_04_163400_add_package_column_in_subscription_table', 1),
(44, '2019_03_05_080451_create_currencies_table', 1),
(45, '2019_03_05_085626_create_subscription_billing_address', 1),
(46, '2019_03_05_102729_create_sites_table', 1),
(47, '2019_03_05_103721_create_site_id_column_in_plan_featrue_table', 1),
(48, '2019_03_06_103643_create_duration_column_table', 1),
(49, '2019_03_15_161859_subscription_addon_table', 1),
(50, '2019_03_15_164341_subscription_addons_types_table', 1),
(51, '2019_03_15_193039_create-conversation-table', 1),
(52, '2019_03_15_193603_create-chat-meessage-table', 1),
(53, '2019_03_15_202505_addon_type_id_in_addon_table', 1),
(54, '2019_03_15_203242_subscription_pivot_addon_table', 1),
(55, '2019_03_15_205402_addon_id_in_plan_pivot_pricing_model', 1),
(56, '2019_03_19_184814_add_id_in_plan_feature_table', 1),
(57, '2019_03_19_185335_create_pricing_units_table', 1),
(58, '2019_03_20_141233_create_add_ons_plans_pivot', 1),
(59, '2019_03_20_165421_add_column_subscriptions', 1),
(60, '2019_03_20_195338_create_subscription_log_table', 1),
(61, '2019_03_20_210341_create_draft_addon_table', 1),
(62, '2019_03_25_165347_add_online_field_user', 1),
(63, '2019_03_28_142048_add_chat_message_column', 1),
(64, '2019_03_28_215618_create_table_subscription_unit_features', 1),
(65, '2019_04_04_145058_add-location-column-user', 1),
(66, '2019_04_09_163633_create_fau_tags_table', 1),
(67, '2019_04_09_170914_create_fau_jobs_table', 1),
(68, '2019_04_09_195047_create_category_country_pivot_table', 1),
(69, '2019_04_09_202131_pivot_faujobs_tags', 1),
(70, '2019_04_11_154021_add_image_in_cities_table', 1),
(71, '2019_04_11_155737_create_country_cities_pivot_table', 1),
(72, '2019_04_12_161712_add_column_flag_countries', 1),
(73, '2019_04_15_142806_add_column_pivot_business_sevice_add', 1),
(74, '2019_04_15_143151_add_column_fau_jobs', 1),
(75, '2019_04_15_202732_create_inventory_packing_units', 1),
(76, '2019_04_15_202733_create_fau_request_quote', 1),
(77, '2019_04_15_202734_create_request_quote_attachments', 1),
(78, '2019_04_17_184232_add_column_reviews', 1),
(79, '2019_04_24_162237_add_skill_columm_services', 1),
(80, '2019_04_24_214937_add_profile_complete_user', 1),
(81, '2019_04_25_164217_create_pivot_cate_tags_table', 1),
(82, '2019_04_26_205547_create_employee_count_table', 1),
(83, '2019_04_26_211411_add_column_employee_count_in_business', 1),
(84, '2019_04_30_160232_create_make_table', 1),
(85, '2019_04_30_160510_add_column_categories', 1),
(86, '2019_04_30_160738_add_column_ads', 1),
(87, '2019_04_30_161427_create_ads_additional_table', 1),
(88, '2019_05_01_164124_add_column_ads_maker', 1),
(89, '2019_05_01_201711_create_business_port_folios_table', 1),
(90, '2019_05_09_155747_create_languages_table', 1),
(91, '2019_05_09_160517_create_skills_table', 1),
(92, '2019_05_09_160552_create_schools_table', 1),
(93, '2019_05_09_160647_create_degrees_table', 1),
(94, '2019_05_09_162504_create_experiences_table', 1),
(95, '2019_05_10_113442_create_education_table', 1),
(96, '2019_05_10_123606_create_careers_table', 1),
(97, '2019_05_10_132210_create_salaries_table', 1),
(98, '2019_05_10_170341_add_column_to_fau_tags', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pivot_business_services`
--

CREATE TABLE `pivot_business_services` (
  `id` int(10) UNSIGNED NOT NULL,
  `service_id` int(10) UNSIGNED NOT NULL,
  `business_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pivot_categories_adds_business_services`
--

CREATE TABLE `pivot_categories_adds_business_services` (
  `id` int(10) UNSIGNED NOT NULL,
  `category_id` int(10) UNSIGNED DEFAULT NULL,
  `add_id` int(10) UNSIGNED DEFAULT NULL,
  `business_id` int(10) UNSIGNED DEFAULT NULL,
  `service_id` int(10) UNSIGNED DEFAULT NULL,
  `job_id` int(10) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pivot_categories_adds_business_services`
--

INSERT INTO `pivot_categories_adds_business_services` (`id`, `category_id`, `add_id`, `business_id`, `service_id`, `job_id`, `created_at`, `updated_at`) VALUES
(1, 2, NULL, 1, NULL, NULL, NULL, NULL),
(2, 2, NULL, 1, NULL, NULL, NULL, NULL),
(3, 2, NULL, 2, NULL, NULL, NULL, NULL),
(4, 2, NULL, 2, NULL, NULL, NULL, NULL),
(5, 1, NULL, NULL, 1, NULL, NULL, NULL),
(6, 1, NULL, NULL, 1, NULL, NULL, NULL),
(7, 1, NULL, NULL, 2, NULL, NULL, NULL),
(8, 1, NULL, NULL, 2, NULL, NULL, NULL),
(9, 51, 1, NULL, NULL, NULL, NULL, NULL),
(10, 51, 2, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `pivot_category_country`
--

CREATE TABLE `pivot_category_country` (
  `id` int(10) UNSIGNED NOT NULL,
  `country_id` int(10) UNSIGNED NOT NULL,
  `category_id` int(10) UNSIGNED NOT NULL,
  `order_no` int(11) NOT NULL DEFAULT '0',
  `type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pivot_cate_tags`
--

CREATE TABLE `pivot_cate_tags` (
  `id` int(10) UNSIGNED NOT NULL,
  `category_id` int(10) UNSIGNED NOT NULL,
  `fau_tag_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pivot_country_city`
--

CREATE TABLE `pivot_country_city` (
  `id` int(10) UNSIGNED NOT NULL,
  `country_id` int(10) UNSIGNED NOT NULL,
  `city_id` int(10) UNSIGNED NOT NULL,
  `order_no` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pivot_faujobs_business_service_add_tags`
--

CREATE TABLE `pivot_faujobs_business_service_add_tags` (
  `id` int(10) UNSIGNED NOT NULL,
  `fau_job_id` int(10) UNSIGNED DEFAULT NULL,
  `fau_tag_id` int(10) UNSIGNED DEFAULT NULL,
  `business_id` int(10) UNSIGNED DEFAULT NULL,
  `service_id` int(10) UNSIGNED DEFAULT NULL,
  `add_id` int(10) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pivot_faujobs_business_service_add_tags`
--

INSERT INTO `pivot_faujobs_business_service_add_tags` (`id`, `fau_job_id`, `fau_tag_id`, `business_id`, `service_id`, `add_id`, `created_at`, `updated_at`) VALUES
(1, NULL, 11, 1, NULL, NULL, NULL, NULL),
(2, NULL, 12, 1, NULL, NULL, NULL, NULL),
(3, NULL, 13, 1, NULL, NULL, NULL, NULL),
(4, NULL, 11, 2, NULL, NULL, NULL, NULL),
(5, NULL, 12, 2, NULL, NULL, NULL, NULL),
(6, NULL, 13, 2, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `pricing_units`
--

CREATE TABLE `pricing_units` (
  `id` int(10) UNSIGNED NOT NULL,
  `qty` int(10) UNSIGNED DEFAULT NULL,
  `price` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `subscription_plan_feature_id` int(10) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `rates`
--

CREATE TABLE `rates` (
  `id` int(10) UNSIGNED NOT NULL,
  `price_type` enum('Project Base','Hourly Base') COLLATE utf8mb4_unicode_ci NOT NULL,
  `rate` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `service_id` int(10) UNSIGNED DEFAULT NULL,
  `business_id` int(10) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `rates`
--

INSERT INTO `rates` (`id`, `price_type`, `rate`, `service_id`, `business_id`, `created_at`, `updated_at`) VALUES
(1, 'Hourly Base', '13', NULL, 1, '2019-05-14 07:48:49', '2019-05-14 07:48:49'),
(2, 'Project Base', '13', NULL, 1, '2019-05-14 07:48:49', '2019-05-14 07:48:49'),
(3, 'Hourly Base', '13', NULL, 2, '2019-05-14 07:48:52', '2019-05-14 07:48:52'),
(4, 'Project Base', '13', NULL, 2, '2019-05-14 07:48:52', '2019-05-14 07:48:52');

-- --------------------------------------------------------

--
-- Table structure for table `replies`
--

CREATE TABLE `replies` (
  `id` int(10) UNSIGNED NOT NULL,
  `comment_id` int(10) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

CREATE TABLE `reviews` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED DEFAULT NULL,
  `service_id` int(10) UNSIGNED DEFAULT NULL,
  `business_id` int(10) UNSIGNED DEFAULT NULL,
  `add_id` int(10) UNSIGNED DEFAULT NULL,
  `fau_job_id` int(10) UNSIGNED DEFAULT NULL,
  `name` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `rating` int(11) NOT NULL,
  `review` varchar(5000) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Admin', '2019-05-14 07:48:24', '2019-05-14 07:48:24'),
(2, 'User', '2019-05-14 07:48:24', '2019-05-14 07:48:24'),
(3, 'Agent', '2019-05-14 07:48:24', '2019-05-14 07:48:24');

-- --------------------------------------------------------

--
-- Table structure for table `salaries`
--

CREATE TABLE `salaries` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `salaries`
--

INSERT INTO `salaries` (`id`, `name`, `active`, `created_at`, `updated_at`) VALUES
(1, '5,000', 1, '2019-05-14 07:49:01', '2019-05-14 07:49:01'),
(2, '6,000', 1, '2019-05-14 07:49:01', '2019-05-14 07:49:01'),
(3, '7,000', 1, '2019-05-14 07:49:01', '2019-05-14 07:49:01'),
(4, '8,000', 1, '2019-05-14 07:49:01', '2019-05-14 07:49:01'),
(5, '9,000', 1, '2019-05-14 07:49:01', '2019-05-14 07:49:01'),
(6, '10,000', 1, '2019-05-14 07:49:01', '2019-05-14 07:49:01'),
(7, '11,000', 1, '2019-05-14 07:49:01', '2019-05-14 07:49:01'),
(8, '12,000', 1, '2019-05-14 07:49:02', '2019-05-14 07:49:02'),
(9, '13,000', 1, '2019-05-14 07:49:02', '2019-05-14 07:49:02'),
(10, '14,000', 1, '2019-05-14 07:49:02', '2019-05-14 07:49:02'),
(11, '15,000', 1, '2019-05-14 07:49:02', '2019-05-14 07:49:02'),
(12, '16,000', 1, '2019-05-14 07:49:02', '2019-05-14 07:49:02'),
(13, '17,000', 1, '2019-05-14 07:49:02', '2019-05-14 07:49:02'),
(14, '18,000', 1, '2019-05-14 07:49:02', '2019-05-14 07:49:02'),
(15, '19,000', 1, '2019-05-14 07:49:02', '2019-05-14 07:49:02'),
(16, '20,000', 1, '2019-05-14 07:49:02', '2019-05-14 07:49:02'),
(17, '25,000', 1, '2019-05-14 07:49:02', '2019-05-14 07:49:02'),
(18, '30,000', 1, '2019-05-14 07:49:02', '2019-05-14 07:49:02'),
(19, '35,000', 1, '2019-05-14 07:49:02', '2019-05-14 07:49:02'),
(20, '40,000', 1, '2019-05-14 07:49:03', '2019-05-14 07:49:03'),
(21, '45,000', 1, '2019-05-14 07:49:03', '2019-05-14 07:49:03'),
(22, '50,000', 1, '2019-05-14 07:49:03', '2019-05-14 07:49:03'),
(23, '60,000', 1, '2019-05-14 07:49:03', '2019-05-14 07:49:03'),
(24, '70,000', 1, '2019-05-14 07:49:03', '2019-05-14 07:49:03'),
(25, '80,000', 1, '2019-05-14 07:49:03', '2019-05-14 07:49:03'),
(26, '90,000', 1, '2019-05-14 07:49:03', '2019-05-14 07:49:03'),
(27, '100,000', 1, '2019-05-14 07:49:03', '2019-05-14 07:49:03'),
(28, '125,000', 1, '2019-05-14 07:49:03', '2019-05-14 07:49:03'),
(29, '150,000', 1, '2019-05-14 07:49:03', '2019-05-14 07:49:03'),
(30, '175,000', 1, '2019-05-14 07:49:04', '2019-05-14 07:49:04'),
(31, '200,000', 1, '2019-05-14 07:49:04', '2019-05-14 07:49:04'),
(32, '250,000', 1, '2019-05-14 07:49:04', '2019-05-14 07:49:04'),
(33, '300,000', 1, '2019-05-14 07:49:04', '2019-05-14 07:49:04'),
(34, '350,000', 1, '2019-05-14 07:49:04', '2019-05-14 07:49:04'),
(35, '400,000', 1, '2019-05-14 07:49:04', '2019-05-14 07:49:04'),
(36, '450,000', 1, '2019-05-14 07:49:04', '2019-05-14 07:49:04'),
(37, '500,000', 1, '2019-05-14 07:49:04', '2019-05-14 07:49:04'),
(38, '550,000', 1, '2019-05-14 07:49:05', '2019-05-14 07:49:05'),
(39, '600,000', 1, '2019-05-14 07:49:05', '2019-05-14 07:49:05'),
(40, '600,000+', 1, '2019-05-14 07:49:05', '2019-05-14 07:49:05');

-- --------------------------------------------------------

--
-- Table structure for table `schools`
--

CREATE TABLE `schools` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE `services` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(1000) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lat` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `long` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `video_url` varchar(1000) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `facebook_url` varchar(1000) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gmail_url` varchar(1000) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `twitter_url` varchar(1000) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(7000) COLLATE utf8mb4_unicode_ci NOT NULL,
  `hourly_price` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `project_price` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `skills_id` int(10) UNSIGNED DEFAULT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT '1',
  `is_approve` enum('Approve','Not Approve','Rejected') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Not Approve',
  `created_by` int(10) UNSIGNED NOT NULL,
  `profile_image` varchar(2000) COLLATE utf8mb4_unicode_ci NOT NULL,
  `agent_admin_id` int(10) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`id`, `title`, `lat`, `long`, `email`, `phone`, `video_url`, `facebook_url`, `gmail_url`, `twitter_url`, `description`, `hourly_price`, `project_price`, `skills_id`, `is_active`, `is_approve`, `created_by`, `profile_image`, `agent_admin_id`, `created_at`, `updated_at`) VALUES
(1, 'test', '31.52037', '74.358749', NULL, NULL, 'https://www.youtube.com/', 'https://www.facebook.com/', 'https://gmail.com', 'https://twitter.com/', 'this is test', '122', '122', NULL, 1, 'Approve', 2, 'project-assets/images/services/2.jpg', NULL, '2019-05-14 07:48:52', '2019-05-14 07:48:52'),
(2, 'Test2', '33.684422', '73.047882', NULL, NULL, 'https://www.youtube.com/', 'https://www.facebook.com/', 'https://gmail.com', 'https://twitter.com/', 'this is test', '122', '122', NULL, 1, 'Approve', 2, 'project-assets/images/services/2.jpg', NULL, '2019-05-14 07:48:53', '2019-05-14 07:48:53');

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_user` tinyint(1) DEFAULT NULL,
  `is_business` tinyint(1) DEFAULT NULL,
  `is_adds` tinyint(1) DEFAULT NULL,
  `is_service` tinyint(1) DEFAULT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sites`
--

CREATE TABLE `sites` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sites`
--

INSERT INTO `sites` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Adds', '2019-05-14 07:48:23', '2019-05-14 07:48:23'),
(2, 'Services', '2019-05-14 07:48:23', '2019-05-14 07:48:23'),
(3, 'Business', '2019-05-14 07:48:23', '2019-05-14 07:48:23');

-- --------------------------------------------------------

--
-- Table structure for table `skills`
--

CREATE TABLE `skills` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `skills`
--

INSERT INTO `skills` (`id`, `name`, `active`, `created_at`, `updated_at`) VALUES
(1, 'HTML', 1, '2019-05-14 07:48:59', '2019-05-14 07:48:59'),
(2, 'CSS', 1, '2019-05-14 07:48:59', '2019-05-14 07:48:59'),
(3, 'JS', 1, '2019-05-14 07:48:59', '2019-05-14 07:48:59'),
(4, 'PHP', 1, '2019-05-14 07:48:59', '2019-05-14 07:48:59'),
(5, 'PROJECT MANAGEMENTS', 1, '2019-05-14 07:48:59', '2019-05-14 07:48:59'),
(6, 'Communication Skills', 1, '2019-05-14 07:48:59', '2019-05-14 07:48:59'),
(7, 'English Fluency', 1, '2019-05-14 07:48:59', '2019-05-14 07:48:59'),
(8, 'Adobe Photoshop', 1, '2019-05-14 07:48:59', '2019-05-14 07:48:59'),
(9, 'WordPress', 1, '2019-05-14 07:48:59', '2019-05-14 07:48:59'),
(10, 'MySql', 1, '2019-05-14 07:48:59', '2019-05-14 07:48:59'),
(11, 'Laravel', 1, '2019-05-14 07:48:59', '2019-05-14 07:48:59'),
(12, 'Java', 1, '2019-05-14 07:49:00', '2019-05-14 07:49:00'),
(13, 'Jquery', 1, '2019-05-14 07:49:00', '2019-05-14 07:49:00'),
(14, 'Git', 1, '2019-05-14 07:49:00', '2019-05-14 07:49:00'),
(15, 'Sale', 1, '2019-05-14 07:49:00', '2019-05-14 07:49:00'),
(16, 'MVC', 1, '2019-05-14 07:49:00', '2019-05-14 07:49:00'),
(17, 'C#', 1, '2019-05-14 07:49:00', '2019-05-14 07:49:00'),
(18, 'Marketing', 1, '2019-05-14 07:49:00', '2019-05-14 07:49:00');

-- --------------------------------------------------------

--
-- Table structure for table `social_accounts`
--

CREATE TABLE `social_accounts` (
  `user_id` int(10) UNSIGNED NOT NULL,
  `provider_user_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `provider` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `stats`
--

CREATE TABLE `stats` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(1000) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT '1',
  `image` varchar(2000) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(7000) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `stats`
--

INSERT INTO `stats` (`id`, `title`, `is_active`, `image`, `description`, `created_at`, `updated_at`) VALUES
(1, '24 Million Businesses', 1, 'project-assets/images/stats/million-business.png', 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. ', '2019-05-14 07:48:27', '2019-05-14 07:48:27'),
(2, '05 Million Visitors', 1, 'project-assets/images/stats/million-visitors.png', 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. ', '2019-05-14 07:48:28', '2019-05-14 07:48:28'),
(3, '1200 Services Offered', 1, 'project-assets/images/stats/services-offered.png', 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. ', '2019-05-14 07:48:28', '2019-05-14 07:48:28'),
(4, 'Largest Market Place', 1, 'project-assets/images/stats/Largest-Marketplace.png', 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. ', '2019-05-14 07:48:28', '2019-05-14 07:48:28');

-- --------------------------------------------------------

--
-- Table structure for table `subscriptions`
--

CREATE TABLE `subscriptions` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subscription_plan_id` int(10) UNSIGNED NOT NULL,
  `subscription_status` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_by` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `subscription_plan_package_id` int(10) UNSIGNED NOT NULL,
  `start_date` date DEFAULT NULL,
  `end_date` date DEFAULT NULL,
  `stripe_subscription_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `total_price` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cancelled_at` datetime DEFAULT NULL,
  `active` enum('active','cancel') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'active',
  `invoice_now` enum('now','unbilled') COLLATE utf8mb4_unicode_ci NOT NULL,
  `billing_count_cycles` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `shipping_to_bill_address` tinyint(1) NOT NULL DEFAULT '0',
  `subscriptions_addon_id` int(10) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `subscription_addons`
--

CREATE TABLE `subscription_addons` (
  `id` int(10) UNSIGNED NOT NULL,
  `charge_type` enum('recurring','one time payment') COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `period` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `period_unit` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_by` int(10) UNSIGNED NOT NULL,
  `total_price` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `invoice_name` varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL,
  `invoice_notes` varchar(2000) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `comments` varchar(2000) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(2000) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `price_model_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `addon_type_id` int(10) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `subscription_addons_types`
--

CREATE TABLE `subscription_addons_types` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `subscription_addons_types`
--

INSERT INTO `subscription_addons_types` (`id`, `name`, `active`, `created_at`, `updated_at`) VALUES
(1, 'Premium', 0, '2019-05-14 07:48:28', '2019-05-14 07:48:28'),
(2, 'Gold', 0, '2019-05-14 07:48:28', '2019-05-14 07:48:28'),
(3, 'Standard', 0, '2019-05-14 07:48:29', '2019-05-14 07:48:29');

-- --------------------------------------------------------

--
-- Table structure for table `subscription_addon_unit_features`
--

CREATE TABLE `subscription_addon_unit_features` (
  `id` int(10) UNSIGNED NOT NULL,
  `plan_feature_id` int(10) UNSIGNED NOT NULL,
  `price` int(11) NOT NULL,
  `subscription_addon_id` int(10) UNSIGNED NOT NULL,
  `quantity` int(11) NOT NULL,
  `pricing_unit_id` int(10) UNSIGNED NOT NULL,
  `site_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `subscription_billing_addresses`
--

CREATE TABLE `subscription_billing_addresses` (
  `id` int(10) UNSIGNED NOT NULL,
  `first_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `company_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(2000) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `city` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `zip` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `subscription_id` int(10) UNSIGNED DEFAULT NULL,
  `country_id` int(10) UNSIGNED DEFAULT NULL,
  `state` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `subscription_invoices`
--

CREATE TABLE `subscription_invoices` (
  `id` int(10) UNSIGNED NOT NULL,
  `invoice_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `plan_price` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `setup_price` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `total_amount` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `subscription_id` int(10) UNSIGNED DEFAULT NULL,
  `created_by` int(10) UNSIGNED DEFAULT NULL,
  `description` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_paid` enum('due','paid') COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `subscription_invoice_billings`
--

CREATE TABLE `subscription_invoice_billings` (
  `id` int(10) UNSIGNED NOT NULL,
  `first_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `company_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `city` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `zip` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `country_id` int(10) UNSIGNED NOT NULL,
  `state` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `subscription_invoice_id` int(10) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `subscription_inv_pay_meth`
--

CREATE TABLE `subscription_inv_pay_meth` (
  `id` int(10) UNSIGNED NOT NULL,
  `first_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `card_number` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiry` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cvv` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subscription_invoice_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `subscription_logs`
--

CREATE TABLE `subscription_logs` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED DEFAULT NULL,
  `subscription_addon_id` int(10) UNSIGNED DEFAULT NULL,
  `json_array` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `subscription_pivot_addons`
--

CREATE TABLE `subscription_pivot_addons` (
  `id` int(10) UNSIGNED NOT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '1',
  `subscription_id` int(10) UNSIGNED NOT NULL,
  `subscription_addon_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `subscription_pivot_addon_plans`
--

CREATE TABLE `subscription_pivot_addon_plans` (
  `id` int(10) UNSIGNED NOT NULL,
  `subscription_addon_id` int(10) UNSIGNED NOT NULL,
  `subscription_plan_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `subscription_pivot_user_subscriptions`
--

CREATE TABLE `subscription_pivot_user_subscriptions` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED DEFAULT NULL,
  `subscription_id` int(10) UNSIGNED DEFAULT NULL,
  `plan_id` int(10) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `subscription_plans`
--

CREATE TABLE `subscription_plans` (
  `id` int(10) UNSIGNED NOT NULL,
  `plan_type_id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `invoice_name` varchar(2000) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(2000) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `comment` varchar(2000) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `setup_cost` int(11) DEFAULT NULL,
  `bill_every_count` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bill_cycle` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '1',
  `bill_period_unit` enum('Year','Month','Day','Week') COLLATE utf8mb4_unicode_ci NOT NULL,
  `trial_limit_count` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `trial_period_unit` enum('Month','Day') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `redirect_url` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `subscription_plans`
--

INSERT INTO `subscription_plans` (`id`, `plan_type_id`, `name`, `invoice_name`, `description`, `comment`, `setup_cost`, `bill_every_count`, `bill_cycle`, `active`, `bill_period_unit`, `trial_limit_count`, `trial_period_unit`, `redirect_url`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 1, 'Free', NULL, NULL, NULL, NULL, '1', NULL, 1, 'Month', NULL, 'Day', NULL, 1, '2019-05-14 07:48:25', '2019-05-14 07:48:25');

-- --------------------------------------------------------

--
-- Table structure for table `subscription_plan_features`
--

CREATE TABLE `subscription_plan_features` (
  `id` int(10) UNSIGNED NOT NULL,
  `site_id` int(10) UNSIGNED NOT NULL,
  `subscription_plan_id` int(10) UNSIGNED DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `duration` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `subscription_addon_id` int(10) UNSIGNED DEFAULT NULL,
  `price` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `subscription_plan_features`
--

INSERT INTO `subscription_plan_features` (`id`, `site_id`, `subscription_plan_id`, `quantity`, `duration`, `subscription_addon_id`, `price`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 10, 'month', NULL, NULL, '2019-05-14 07:48:26', '2019-05-14 07:48:26'),
(2, 2, 1, 10, 'month', NULL, NULL, '2019-05-14 07:48:26', '2019-05-14 07:48:26'),
(3, 3, 1, 10, 'month', NULL, NULL, '2019-05-14 07:48:26', '2019-05-14 07:48:26');

-- --------------------------------------------------------

--
-- Table structure for table `subscription_plan_packages`
--

CREATE TABLE `subscription_plan_packages` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `module_id` int(10) UNSIGNED NOT NULL,
  `plan_id` int(10) UNSIGNED NOT NULL,
  `stripe_plan_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `subscription_plan_pivot_pricing_models`
--

CREATE TABLE `subscription_plan_pivot_pricing_models` (
  `id` int(10) UNSIGNED NOT NULL,
  `addon_id` int(10) UNSIGNED DEFAULT NULL,
  `price` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `setup_price` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pricing_model_id` int(10) UNSIGNED NOT NULL,
  `plan_id` int(10) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `subscription_plan_pivot_pricing_models`
--

INSERT INTO `subscription_plan_pivot_pricing_models` (`id`, `addon_id`, `price`, `setup_price`, `pricing_model_id`, `plan_id`, `created_at`, `updated_at`) VALUES
(1, NULL, '0', NULL, 1, 1, '2019-05-14 07:48:26', '2019-05-14 07:48:26');

-- --------------------------------------------------------

--
-- Table structure for table `subscription_plan_types`
--

CREATE TABLE `subscription_plan_types` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `subscription_plan_types`
--

INSERT INTO `subscription_plan_types` (`id`, `name`, `description`, `created_at`, `updated_at`) VALUES
(1, 'Bronc', 'Description', '2019-05-14 07:48:24', '2019-05-14 07:48:24');

-- --------------------------------------------------------

--
-- Table structure for table `subscription_pricing_models`
--

CREATE TABLE `subscription_pricing_models` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` enum('Addon','Plan') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Plan',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `subscription_pricing_models`
--

INSERT INTO `subscription_pricing_models` (`id`, `name`, `type`, `created_at`, `updated_at`) VALUES
(1, 'Flat Fee', 'Addon', '2019-05-14 07:48:25', '2019-05-14 07:48:25'),
(2, 'By Unit', 'Addon', '2019-05-14 07:48:25', '2019-05-14 07:48:25'),
(3, 'Flat Fee', 'Plan', '2019-05-14 07:48:25', '2019-05-14 07:48:25');

-- --------------------------------------------------------

--
-- Table structure for table `timings`
--

CREATE TABLE `timings` (
  `id` int(10) UNSIGNED NOT NULL,
  `_to` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `_from` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `business_id` int(10) UNSIGNED DEFAULT NULL,
  `service_id` int(10) UNSIGNED DEFAULT NULL,
  `day` enum('Monday','Tuesday','Wednesday','Thursday','Friday','Saturday','Sunday') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `timings`
--

INSERT INTO `timings` (`id`, `_to`, `_from`, `business_id`, `service_id`, `day`, `created_at`, `updated_at`) VALUES
(1, '12', '12', 1, NULL, 'Monday', '2019-05-14 07:48:49', '2019-05-14 07:48:49'),
(2, '12', '12', 2, NULL, 'Monday', '2019-05-14 07:48:52', '2019-05-14 07:48:52'),
(3, '12', '12', NULL, 1, 'Monday', '2019-05-14 07:48:53', '2019-05-14 07:48:53'),
(4, '12', '12', NULL, 2, 'Monday', '2019-05-14 07:48:54', '2019-05-14 07:48:54');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `role_id` int(10) UNSIGNED NOT NULL,
  `country_id` int(10) UNSIGNED DEFAULT NULL,
  `customers_billing_info_id` int(11) DEFAULT NULL,
  `stripe_customer_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `stripe_subscription_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_by` int(10) UNSIGNED DEFAULT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `zip` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT '1',
  `email` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_online` tinyint(1) DEFAULT NULL,
  `profile_complete` int(11) NOT NULL DEFAULT '0',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `role_id`, `country_id`, `customers_billing_info_id`, `stripe_customer_id`, `stripe_subscription_id`, `created_by`, `name`, `zip`, `is_active`, `email`, `phone`, `email_verified_at`, `password`, `is_online`, `profile_complete`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 1, NULL, NULL, NULL, NULL, NULL, 'Admin', NULL, 1, 'ahmedalvi.34@hotmail.com', '03234840813', '2019-01-15 19:00:00', '$2y$10$6fnpAQZl3ArQAN7uYWdHNet7aLHUbXWz4Zx38d5HSHoZdVcgFdvuO', 1, 0, NULL, '2019-05-14 07:48:25', '2019-05-14 07:49:31'),
(2, 3, NULL, NULL, NULL, NULL, NULL, 'ehmeyAgent', NULL, 1, 'ahmedalvi.testing@gmail.com', '03234840813', '2019-01-15 19:00:00', '$2y$10$EVx31d.BSZpo33UoGfM8D.J1E7qZMduT4SczIas2857.rKF3snNKK', NULL, 0, NULL, '2019-05-14 07:48:26', '2019-05-14 07:48:26');

-- --------------------------------------------------------

--
-- Table structure for table `user_infos`
--

CREATE TABLE `user_infos` (
  `id` int(10) UNSIGNED NOT NULL,
  `first_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `account_type` enum('Company','Individual','Admin') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Individual',
  `age` int(11) DEFAULT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `profile_image` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `long` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lat` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user_infos`
--

INSERT INTO `user_infos` (`id`, `first_name`, `last_name`, `account_type`, `age`, `user_id`, `profile_image`, `long`, `lat`, `created_at`, `updated_at`) VALUES
(1, 'ahmed', 'alvi', 'Admin', 20, 1, NULL, NULL, NULL, '2019-05-14 07:48:25', '2019-05-14 07:48:25'),
(2, 'ahmed2', 'alvi', 'Individual', 20, 2, NULL, NULL, NULL, '2019-05-14 07:48:27', '2019-05-14 07:48:27');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `addresses`
--
ALTER TABLE `addresses`
  ADD PRIMARY KEY (`id`),
  ADD KEY `addresses_main_country_id_foreign` (`main_country_id`),
  ADD KEY `addresses_user_id_foreign` (`user_id`),
  ADD KEY `addresses_main_state_id_foreign` (`main_state_id`),
  ADD KEY `addresses_main_city_id_foreign` (`main_city_id`),
  ADD KEY `addresses_service_id_foreign` (`service_id`),
  ADD KEY `addresses_add_id_foreign` (`add_id`),
  ADD KEY `addresses_business_id_foreign` (`business_id`);

--
-- Indexes for table `adds`
--
ALTER TABLE `adds`
  ADD PRIMARY KEY (`id`),
  ADD KEY `adds_created_by_foreign` (`created_by`),
  ADD KEY `adds_agent_admin_id_foreign` (`agent_admin_id`),
  ADD KEY `adds_category_maker_id_foreign` (`category_maker_id`);

--
-- Indexes for table `adds_business_service_products_features`
--
ALTER TABLE `adds_business_service_products_features`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ads_additional_fields`
--
ALTER TABLE `ads_additional_fields`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ads_additional_fields_ad_id_foreign` (`ad_id`);

--
-- Indexes for table `businesses`
--
ALTER TABLE `businesses`
  ADD PRIMARY KEY (`id`),
  ADD KEY `businesses_created_by_foreign` (`created_by`),
  ADD KEY `businesses_agent_admin_id_foreign` (`agent_admin_id`);

--
-- Indexes for table `business_port_folios`
--
ALTER TABLE `business_port_folios`
  ADD PRIMARY KEY (`id`),
  ADD KEY `business_port_folios_business_id_foreign` (`business_id`);

--
-- Indexes for table `careers`
--
ALTER TABLE `careers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `careers_name_unique` (`name`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category_makers`
--
ALTER TABLE `category_makers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category_makers_category_id_foreign` (`category_id`);

--
-- Indexes for table `chat_messages`
--
ALTER TABLE `chat_messages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `comments_user_id_foreign` (`user_id`),
  ADD KEY `comments_review_id_foreign` (`review_id`);

--
-- Indexes for table `conversations`
--
ALTER TABLE `conversations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `degrees`
--
ALTER TABLE `degrees`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `degrees_name_unique` (`name`);

--
-- Indexes for table `draft_addon`
--
ALTER TABLE `draft_addon`
  ADD PRIMARY KEY (`id`),
  ADD KEY `draft_addon_subscription_addon_id_foreign` (`subscription_addon_id`);

--
-- Indexes for table `education`
--
ALTER TABLE `education`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `education_name_unique` (`name`);

--
-- Indexes for table `employee_counts`
--
ALTER TABLE `employee_counts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `experiences`
--
ALTER TABLE `experiences`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `experiences_name_unique` (`name`);

--
-- Indexes for table `fau_jobs`
--
ALTER TABLE `fau_jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fau_jobs_business_id_foreign` (`business_id`),
  ADD KEY `fau_jobs_city_id_foreign` (`city_id`);

--
-- Indexes for table `fau_request_quotes`
--
ALTER TABLE `fau_request_quotes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fau_request_quotes_category_id_foreign` (`category_id`),
  ADD KEY `fau_request_quotes_sub_category_id_foreign` (`sub_category_id`),
  ADD KEY `fau_request_quotes_currency_id_foreign` (`currency_id`),
  ADD KEY `fau_request_quotes_inventory_packing_unit_id_foreign` (`inventory_packing_unit_id`);

--
-- Indexes for table `fau_request_quote_attachments`
--
ALTER TABLE `fau_request_quote_attachments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fau_request_quote_attachments_fau_request_quotes_id_foreign` (`fau_request_quotes_id`);

--
-- Indexes for table `fau_tags`
--
ALTER TABLE `fau_tags`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fau_tags_category_id_foreign` (`category_id`);

--
-- Indexes for table `footer_links`
--
ALTER TABLE `footer_links`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `footer_settings`
--
ALTER TABLE `footer_settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `galleries`
--
ALTER TABLE `galleries`
  ADD PRIMARY KEY (`id`),
  ADD KEY `galleries_add_id_foreign` (`add_id`),
  ADD KEY `galleries_business_id_foreign` (`business_id`),
  ADD KEY `galleries_service_id_foreign` (`service_id`);

--
-- Indexes for table `inventory_packing_units`
--
ALTER TABLE `inventory_packing_units`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `languages`
--
ALTER TABLE `languages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `likes`
--
ALTER TABLE `likes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `likes_user_id_foreign` (`user_id`),
  ADD KEY `likes_review_id_foreign` (`review_id`),
  ADD KEY `likes_comment_id_foreign` (`comment_id`);

--
-- Indexes for table `main_cities`
--
ALTER TABLE `main_cities`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `main_countries`
--
ALTER TABLE `main_countries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `main_currencies`
--
ALTER TABLE `main_currencies`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `main_modules`
--
ALTER TABLE `main_modules`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `main_states`
--
ALTER TABLE `main_states`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `pivot_business_services`
--
ALTER TABLE `pivot_business_services`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `pivot_business_services_business_id_service_id_unique` (`business_id`,`service_id`),
  ADD KEY `pivot_business_services_service_id_foreign` (`service_id`);

--
-- Indexes for table `pivot_categories_adds_business_services`
--
ALTER TABLE `pivot_categories_adds_business_services`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pivot_categories_adds_business_services_category_id_foreign` (`category_id`),
  ADD KEY `pivot_categories_adds_business_services_add_id_foreign` (`add_id`),
  ADD KEY `pivot_categories_adds_business_services_business_id_foreign` (`business_id`),
  ADD KEY `pivot_categories_adds_business_services_service_id_foreign` (`service_id`),
  ADD KEY `pivot_categories_adds_business_services_job_id_foreign` (`job_id`);

--
-- Indexes for table `pivot_category_country`
--
ALTER TABLE `pivot_category_country`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pivot_category_country_country_id_foreign` (`country_id`),
  ADD KEY `pivot_category_country_category_id_foreign` (`category_id`);

--
-- Indexes for table `pivot_cate_tags`
--
ALTER TABLE `pivot_cate_tags`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pivot_cate_tags_category_id_foreign` (`category_id`),
  ADD KEY `pivot_cate_tags_fau_tag_id_foreign` (`fau_tag_id`);

--
-- Indexes for table `pivot_country_city`
--
ALTER TABLE `pivot_country_city`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pivot_country_city_country_id_foreign` (`country_id`),
  ADD KEY `pivot_country_city_city_id_foreign` (`city_id`);

--
-- Indexes for table `pivot_faujobs_business_service_add_tags`
--
ALTER TABLE `pivot_faujobs_business_service_add_tags`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pivot_faujobs_business_service_add_tags_fau_job_id_foreign` (`fau_job_id`),
  ADD KEY `pivot_faujobs_business_service_add_tags_fau_tag_id_foreign` (`fau_tag_id`),
  ADD KEY `pivot_faujobs_business_service_add_tags_business_id_foreign` (`business_id`),
  ADD KEY `pivot_faujobs_business_service_add_tags_service_id_foreign` (`service_id`),
  ADD KEY `pivot_faujobs_business_service_add_tags_add_id_foreign` (`add_id`);

--
-- Indexes for table `pricing_units`
--
ALTER TABLE `pricing_units`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pricing_units_subscription_plan_feature_id_foreign` (`subscription_plan_feature_id`);

--
-- Indexes for table `rates`
--
ALTER TABLE `rates`
  ADD PRIMARY KEY (`id`),
  ADD KEY `rates_service_id_foreign` (`service_id`),
  ADD KEY `rates_business_id_foreign` (`business_id`);

--
-- Indexes for table `replies`
--
ALTER TABLE `replies`
  ADD PRIMARY KEY (`id`),
  ADD KEY `replies_comment_id_foreign` (`comment_id`);

--
-- Indexes for table `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`id`),
  ADD KEY `reviews_user_id_foreign` (`user_id`),
  ADD KEY `reviews_service_id_foreign` (`service_id`),
  ADD KEY `reviews_business_id_foreign` (`business_id`),
  ADD KEY `reviews_add_id_foreign` (`add_id`),
  ADD KEY `reviews_fau_job_id_foreign` (`fau_job_id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `salaries`
--
ALTER TABLE `salaries`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `salaries_name_unique` (`name`);

--
-- Indexes for table `schools`
--
ALTER TABLE `schools`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `schools_name_unique` (`name`);

--
-- Indexes for table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`id`),
  ADD KEY `services_created_by_foreign` (`created_by`),
  ADD KEY `services_agent_admin_id_foreign` (`agent_admin_id`),
  ADD KEY `services_skills_id_foreign` (`skills_id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sites`
--
ALTER TABLE `sites`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `skills`
--
ALTER TABLE `skills`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `skills_name_unique` (`name`);

--
-- Indexes for table `stats`
--
ALTER TABLE `stats`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subscriptions`
--
ALTER TABLE `subscriptions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `subscriptions_created_by_foreign` (`created_by`),
  ADD KEY `subscriptions_user_id_foreign` (`user_id`),
  ADD KEY `subscriptions_subscription_plan_package_id_foreign` (`subscription_plan_package_id`),
  ADD KEY `subscriptions_subscriptions_addon_id_foreign` (`subscriptions_addon_id`);

--
-- Indexes for table `subscription_addons`
--
ALTER TABLE `subscription_addons`
  ADD PRIMARY KEY (`id`),
  ADD KEY `subscription_addons_created_by_foreign` (`created_by`),
  ADD KEY `subscription_addons_price_model_id_foreign` (`price_model_id`),
  ADD KEY `subscription_addons_addon_type_id_foreign` (`addon_type_id`);

--
-- Indexes for table `subscription_addons_types`
--
ALTER TABLE `subscription_addons_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subscription_addon_unit_features`
--
ALTER TABLE `subscription_addon_unit_features`
  ADD PRIMARY KEY (`id`),
  ADD KEY `subscription_addon_unit_features_plan_feature_id_foreign` (`plan_feature_id`),
  ADD KEY `subscription_addon_unit_features_subscription_addon_id_foreign` (`subscription_addon_id`),
  ADD KEY `subscription_addon_unit_features_pricing_unit_id_foreign` (`pricing_unit_id`),
  ADD KEY `subscription_addon_unit_features_site_id_foreign` (`site_id`);

--
-- Indexes for table `subscription_billing_addresses`
--
ALTER TABLE `subscription_billing_addresses`
  ADD PRIMARY KEY (`id`),
  ADD KEY `subscription_billing_addresses_subscription_id_foreign` (`subscription_id`),
  ADD KEY `subscription_billing_addresses_country_id_foreign` (`country_id`);

--
-- Indexes for table `subscription_invoices`
--
ALTER TABLE `subscription_invoices`
  ADD PRIMARY KEY (`id`),
  ADD KEY `subscription_invoices_subscription_id_foreign` (`subscription_id`),
  ADD KEY `subscription_invoices_created_by_foreign` (`created_by`);

--
-- Indexes for table `subscription_invoice_billings`
--
ALTER TABLE `subscription_invoice_billings`
  ADD PRIMARY KEY (`id`),
  ADD KEY `subscription_invoice_billings_country_id_foreign` (`country_id`),
  ADD KEY `subscription_invoice_billings_subscription_invoice_id_foreign` (`subscription_invoice_id`);

--
-- Indexes for table `subscription_inv_pay_meth`
--
ALTER TABLE `subscription_inv_pay_meth`
  ADD PRIMARY KEY (`id`),
  ADD KEY `subscription_inv_pay_meth_subscription_invoice_id_foreign` (`subscription_invoice_id`);

--
-- Indexes for table `subscription_logs`
--
ALTER TABLE `subscription_logs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `subscription_logs_user_id_foreign` (`user_id`),
  ADD KEY `subscription_logs_subscription_addon_id_foreign` (`subscription_addon_id`);

--
-- Indexes for table `subscription_pivot_addons`
--
ALTER TABLE `subscription_pivot_addons`
  ADD PRIMARY KEY (`id`),
  ADD KEY `subscription_pivot_addons_subscription_id_foreign` (`subscription_id`),
  ADD KEY `subscription_pivot_addons_subscription_addon_id_foreign` (`subscription_addon_id`);

--
-- Indexes for table `subscription_pivot_addon_plans`
--
ALTER TABLE `subscription_pivot_addon_plans`
  ADD PRIMARY KEY (`id`),
  ADD KEY `subscription_pivot_addon_plans_subscription_addon_id_foreign` (`subscription_addon_id`),
  ADD KEY `subscription_pivot_addon_plans_subscription_plan_id_foreign` (`subscription_plan_id`);

--
-- Indexes for table `subscription_pivot_user_subscriptions`
--
ALTER TABLE `subscription_pivot_user_subscriptions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `subscription_pivot_user_subscriptions_user_id_foreign` (`user_id`),
  ADD KEY `subscription_pivot_user_subscriptions_subscription_id_foreign` (`subscription_id`),
  ADD KEY `subscription_pivot_user_subscriptions_plan_id_foreign` (`plan_id`);

--
-- Indexes for table `subscription_plans`
--
ALTER TABLE `subscription_plans`
  ADD PRIMARY KEY (`id`),
  ADD KEY `subscription_plans_user_id_foreign` (`user_id`),
  ADD KEY `subscription_plans_plan_type_id_foreign` (`plan_type_id`);

--
-- Indexes for table `subscription_plan_features`
--
ALTER TABLE `subscription_plan_features`
  ADD PRIMARY KEY (`id`),
  ADD KEY `subscription_plan_features_subscription_plan_id_foreign` (`subscription_plan_id`),
  ADD KEY `subscription_plan_features_site_id_foreign` (`site_id`),
  ADD KEY `subscription_plan_features_subscription_addon_id_foreign` (`subscription_addon_id`);

--
-- Indexes for table `subscription_plan_packages`
--
ALTER TABLE `subscription_plan_packages`
  ADD PRIMARY KEY (`id`),
  ADD KEY `subscription_plan_packages_module_id_foreign` (`module_id`),
  ADD KEY `subscription_plan_packages_plan_id_foreign` (`plan_id`);

--
-- Indexes for table `subscription_plan_pivot_pricing_models`
--
ALTER TABLE `subscription_plan_pivot_pricing_models`
  ADD PRIMARY KEY (`id`),
  ADD KEY `subscription_plan_pivot_pricing_models_pricing_model_id_foreign` (`pricing_model_id`),
  ADD KEY `subscription_plan_pivot_pricing_models_plan_id_foreign` (`plan_id`),
  ADD KEY `subscription_plan_pivot_pricing_models_addon_id_foreign` (`addon_id`);

--
-- Indexes for table `subscription_plan_types`
--
ALTER TABLE `subscription_plan_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subscription_pricing_models`
--
ALTER TABLE `subscription_pricing_models`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `timings`
--
ALTER TABLE `timings`
  ADD PRIMARY KEY (`id`),
  ADD KEY `timings_business_id_foreign` (`business_id`),
  ADD KEY `timings_service_id_foreign` (`service_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_phone_email_unique` (`phone`,`email`),
  ADD KEY `users_created_by_foreign` (`created_by`),
  ADD KEY `users_role_id_foreign` (`role_id`),
  ADD KEY `users_country_id_foreign` (`country_id`);

--
-- Indexes for table `user_infos`
--
ALTER TABLE `user_infos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_infos_user_id_foreign` (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `addresses`
--
ALTER TABLE `addresses`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `adds`
--
ALTER TABLE `adds`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `adds_business_service_products_features`
--
ALTER TABLE `adds_business_service_products_features`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ads_additional_fields`
--
ALTER TABLE `ads_additional_fields`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `businesses`
--
ALTER TABLE `businesses`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `business_port_folios`
--
ALTER TABLE `business_port_folios`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `careers`
--
ALTER TABLE `careers`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2292;

--
-- AUTO_INCREMENT for table `category_makers`
--
ALTER TABLE `category_makers`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `chat_messages`
--
ALTER TABLE `chat_messages`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `conversations`
--
ALTER TABLE `conversations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `degrees`
--
ALTER TABLE `degrees`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `draft_addon`
--
ALTER TABLE `draft_addon`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `education`
--
ALTER TABLE `education`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `employee_counts`
--
ALTER TABLE `employee_counts`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `experiences`
--
ALTER TABLE `experiences`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `fau_jobs`
--
ALTER TABLE `fau_jobs`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `fau_request_quotes`
--
ALTER TABLE `fau_request_quotes`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `fau_request_quote_attachments`
--
ALTER TABLE `fau_request_quote_attachments`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `fau_tags`
--
ALTER TABLE `fau_tags`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1945;

--
-- AUTO_INCREMENT for table `footer_links`
--
ALTER TABLE `footer_links`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `footer_settings`
--
ALTER TABLE `footer_settings`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `galleries`
--
ALTER TABLE `galleries`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `inventory_packing_units`
--
ALTER TABLE `inventory_packing_units`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `languages`
--
ALTER TABLE `languages`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `likes`
--
ALTER TABLE `likes`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `main_cities`
--
ALTER TABLE `main_cities`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31708;

--
-- AUTO_INCREMENT for table `main_countries`
--
ALTER TABLE `main_countries`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=231;

--
-- AUTO_INCREMENT for table `main_currencies`
--
ALTER TABLE `main_currencies`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `main_modules`
--
ALTER TABLE `main_modules`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `main_states`
--
ALTER TABLE `main_states`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3979;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=99;

--
-- AUTO_INCREMENT for table `pivot_business_services`
--
ALTER TABLE `pivot_business_services`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pivot_categories_adds_business_services`
--
ALTER TABLE `pivot_categories_adds_business_services`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `pivot_category_country`
--
ALTER TABLE `pivot_category_country`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pivot_cate_tags`
--
ALTER TABLE `pivot_cate_tags`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pivot_country_city`
--
ALTER TABLE `pivot_country_city`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pivot_faujobs_business_service_add_tags`
--
ALTER TABLE `pivot_faujobs_business_service_add_tags`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `pricing_units`
--
ALTER TABLE `pricing_units`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `rates`
--
ALTER TABLE `rates`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `replies`
--
ALTER TABLE `replies`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `reviews`
--
ALTER TABLE `reviews`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `salaries`
--
ALTER TABLE `salaries`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `schools`
--
ALTER TABLE `schools`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sites`
--
ALTER TABLE `sites`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `skills`
--
ALTER TABLE `skills`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `stats`
--
ALTER TABLE `stats`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `subscriptions`
--
ALTER TABLE `subscriptions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `subscription_addons`
--
ALTER TABLE `subscription_addons`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `subscription_addons_types`
--
ALTER TABLE `subscription_addons_types`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `subscription_addon_unit_features`
--
ALTER TABLE `subscription_addon_unit_features`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `subscription_billing_addresses`
--
ALTER TABLE `subscription_billing_addresses`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `subscription_invoices`
--
ALTER TABLE `subscription_invoices`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `subscription_invoice_billings`
--
ALTER TABLE `subscription_invoice_billings`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `subscription_inv_pay_meth`
--
ALTER TABLE `subscription_inv_pay_meth`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `subscription_logs`
--
ALTER TABLE `subscription_logs`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `subscription_pivot_addons`
--
ALTER TABLE `subscription_pivot_addons`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `subscription_pivot_addon_plans`
--
ALTER TABLE `subscription_pivot_addon_plans`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `subscription_pivot_user_subscriptions`
--
ALTER TABLE `subscription_pivot_user_subscriptions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `subscription_plans`
--
ALTER TABLE `subscription_plans`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `subscription_plan_features`
--
ALTER TABLE `subscription_plan_features`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `subscription_plan_packages`
--
ALTER TABLE `subscription_plan_packages`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `subscription_plan_pivot_pricing_models`
--
ALTER TABLE `subscription_plan_pivot_pricing_models`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `subscription_plan_types`
--
ALTER TABLE `subscription_plan_types`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `subscription_pricing_models`
--
ALTER TABLE `subscription_pricing_models`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `timings`
--
ALTER TABLE `timings`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `user_infos`
--
ALTER TABLE `user_infos`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `addresses`
--
ALTER TABLE `addresses`
  ADD CONSTRAINT `addresses_add_id_foreign` FOREIGN KEY (`add_id`) REFERENCES `adds` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `addresses_business_id_foreign` FOREIGN KEY (`business_id`) REFERENCES `businesses` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `addresses_main_city_id_foreign` FOREIGN KEY (`main_city_id`) REFERENCES `main_cities` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `addresses_main_country_id_foreign` FOREIGN KEY (`main_country_id`) REFERENCES `main_countries` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `addresses_main_state_id_foreign` FOREIGN KEY (`main_state_id`) REFERENCES `main_states` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `addresses_service_id_foreign` FOREIGN KEY (`service_id`) REFERENCES `services` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `addresses_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `adds`
--
ALTER TABLE `adds`
  ADD CONSTRAINT `adds_agent_admin_id_foreign` FOREIGN KEY (`agent_admin_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `adds_category_maker_id_foreign` FOREIGN KEY (`category_maker_id`) REFERENCES `category_makers` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `adds_created_by_foreign` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `ads_additional_fields`
--
ALTER TABLE `ads_additional_fields`
  ADD CONSTRAINT `ads_additional_fields_ad_id_foreign` FOREIGN KEY (`ad_id`) REFERENCES `adds` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `businesses`
--
ALTER TABLE `businesses`
  ADD CONSTRAINT `businesses_agent_admin_id_foreign` FOREIGN KEY (`agent_admin_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `businesses_created_by_foreign` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `business_port_folios`
--
ALTER TABLE `business_port_folios`
  ADD CONSTRAINT `business_port_folios_business_id_foreign` FOREIGN KEY (`business_id`) REFERENCES `businesses` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `category_makers`
--
ALTER TABLE `category_makers`
  ADD CONSTRAINT `category_makers_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_review_id_foreign` FOREIGN KEY (`review_id`) REFERENCES `reviews` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `comments_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `draft_addon`
--
ALTER TABLE `draft_addon`
  ADD CONSTRAINT `draft_addon_subscription_addon_id_foreign` FOREIGN KEY (`subscription_addon_id`) REFERENCES `subscription_addons` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `fau_jobs`
--
ALTER TABLE `fau_jobs`
  ADD CONSTRAINT `fau_jobs_business_id_foreign` FOREIGN KEY (`business_id`) REFERENCES `businesses` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `fau_jobs_city_id_foreign` FOREIGN KEY (`city_id`) REFERENCES `main_cities` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `fau_request_quotes`
--
ALTER TABLE `fau_request_quotes`
  ADD CONSTRAINT `fau_request_quotes_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `fau_request_quotes_currency_id_foreign` FOREIGN KEY (`currency_id`) REFERENCES `main_currencies` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `fau_request_quotes_inventory_packing_unit_id_foreign` FOREIGN KEY (`inventory_packing_unit_id`) REFERENCES `inventory_packing_units` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `fau_request_quotes_sub_category_id_foreign` FOREIGN KEY (`sub_category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `fau_request_quote_attachments`
--
ALTER TABLE `fau_request_quote_attachments`
  ADD CONSTRAINT `fau_request_quote_attachments_fau_request_quotes_id_foreign` FOREIGN KEY (`fau_request_quotes_id`) REFERENCES `fau_request_quotes` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `fau_tags`
--
ALTER TABLE `fau_tags`
  ADD CONSTRAINT `fau_tags_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `galleries`
--
ALTER TABLE `galleries`
  ADD CONSTRAINT `galleries_add_id_foreign` FOREIGN KEY (`add_id`) REFERENCES `adds` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `galleries_business_id_foreign` FOREIGN KEY (`business_id`) REFERENCES `businesses` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `galleries_service_id_foreign` FOREIGN KEY (`service_id`) REFERENCES `services` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `likes`
--
ALTER TABLE `likes`
  ADD CONSTRAINT `likes_comment_id_foreign` FOREIGN KEY (`comment_id`) REFERENCES `comments` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `likes_review_id_foreign` FOREIGN KEY (`review_id`) REFERENCES `reviews` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `likes_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `pivot_business_services`
--
ALTER TABLE `pivot_business_services`
  ADD CONSTRAINT `pivot_business_services_business_id_foreign` FOREIGN KEY (`business_id`) REFERENCES `businesses` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `pivot_business_services_service_id_foreign` FOREIGN KEY (`service_id`) REFERENCES `services` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `pivot_categories_adds_business_services`
--
ALTER TABLE `pivot_categories_adds_business_services`
  ADD CONSTRAINT `pivot_categories_adds_business_services_add_id_foreign` FOREIGN KEY (`add_id`) REFERENCES `adds` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `pivot_categories_adds_business_services_business_id_foreign` FOREIGN KEY (`business_id`) REFERENCES `businesses` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `pivot_categories_adds_business_services_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `pivot_categories_adds_business_services_job_id_foreign` FOREIGN KEY (`job_id`) REFERENCES `fau_jobs` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `pivot_categories_adds_business_services_service_id_foreign` FOREIGN KEY (`service_id`) REFERENCES `services` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `pivot_category_country`
--
ALTER TABLE `pivot_category_country`
  ADD CONSTRAINT `pivot_category_country_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `pivot_category_country_country_id_foreign` FOREIGN KEY (`country_id`) REFERENCES `main_countries` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `pivot_cate_tags`
--
ALTER TABLE `pivot_cate_tags`
  ADD CONSTRAINT `pivot_cate_tags_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `pivot_cate_tags_fau_tag_id_foreign` FOREIGN KEY (`fau_tag_id`) REFERENCES `fau_tags` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `pivot_country_city`
--
ALTER TABLE `pivot_country_city`
  ADD CONSTRAINT `pivot_country_city_city_id_foreign` FOREIGN KEY (`city_id`) REFERENCES `main_cities` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `pivot_country_city_country_id_foreign` FOREIGN KEY (`country_id`) REFERENCES `main_countries` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `pivot_faujobs_business_service_add_tags`
--
ALTER TABLE `pivot_faujobs_business_service_add_tags`
  ADD CONSTRAINT `pivot_faujobs_business_service_add_tags_add_id_foreign` FOREIGN KEY (`add_id`) REFERENCES `adds` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `pivot_faujobs_business_service_add_tags_business_id_foreign` FOREIGN KEY (`business_id`) REFERENCES `businesses` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `pivot_faujobs_business_service_add_tags_fau_job_id_foreign` FOREIGN KEY (`fau_job_id`) REFERENCES `fau_jobs` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `pivot_faujobs_business_service_add_tags_fau_tag_id_foreign` FOREIGN KEY (`fau_tag_id`) REFERENCES `fau_tags` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `pivot_faujobs_business_service_add_tags_service_id_foreign` FOREIGN KEY (`service_id`) REFERENCES `services` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `pricing_units`
--
ALTER TABLE `pricing_units`
  ADD CONSTRAINT `pricing_units_subscription_plan_feature_id_foreign` FOREIGN KEY (`subscription_plan_feature_id`) REFERENCES `subscription_plan_features` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `rates`
--
ALTER TABLE `rates`
  ADD CONSTRAINT `rates_business_id_foreign` FOREIGN KEY (`business_id`) REFERENCES `businesses` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `rates_service_id_foreign` FOREIGN KEY (`service_id`) REFERENCES `services` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `replies`
--
ALTER TABLE `replies`
  ADD CONSTRAINT `replies_comment_id_foreign` FOREIGN KEY (`comment_id`) REFERENCES `comments` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `reviews`
--
ALTER TABLE `reviews`
  ADD CONSTRAINT `reviews_add_id_foreign` FOREIGN KEY (`add_id`) REFERENCES `adds` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `reviews_business_id_foreign` FOREIGN KEY (`business_id`) REFERENCES `businesses` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `reviews_fau_job_id_foreign` FOREIGN KEY (`fau_job_id`) REFERENCES `fau_jobs` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `reviews_service_id_foreign` FOREIGN KEY (`service_id`) REFERENCES `services` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `reviews_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `services`
--
ALTER TABLE `services`
  ADD CONSTRAINT `services_agent_admin_id_foreign` FOREIGN KEY (`agent_admin_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `services_created_by_foreign` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `services_skills_id_foreign` FOREIGN KEY (`skills_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `subscriptions`
--
ALTER TABLE `subscriptions`
  ADD CONSTRAINT `subscriptions_created_by_foreign` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `subscriptions_subscription_plan_package_id_foreign` FOREIGN KEY (`subscription_plan_package_id`) REFERENCES `subscription_plan_packages` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `subscriptions_subscriptions_addon_id_foreign` FOREIGN KEY (`subscriptions_addon_id`) REFERENCES `subscription_addons` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `subscriptions_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `subscription_addons`
--
ALTER TABLE `subscription_addons`
  ADD CONSTRAINT `subscription_addons_addon_type_id_foreign` FOREIGN KEY (`addon_type_id`) REFERENCES `subscription_addons_types` (`id`),
  ADD CONSTRAINT `subscription_addons_created_by_foreign` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `subscription_addons_price_model_id_foreign` FOREIGN KEY (`price_model_id`) REFERENCES `subscription_pricing_models` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `subscription_addon_unit_features`
--
ALTER TABLE `subscription_addon_unit_features`
  ADD CONSTRAINT `subscription_addon_unit_features_plan_feature_id_foreign` FOREIGN KEY (`plan_feature_id`) REFERENCES `subscription_plan_features` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `subscription_addon_unit_features_pricing_unit_id_foreign` FOREIGN KEY (`pricing_unit_id`) REFERENCES `pricing_units` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `subscription_addon_unit_features_site_id_foreign` FOREIGN KEY (`site_id`) REFERENCES `sites` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `subscription_addon_unit_features_subscription_addon_id_foreign` FOREIGN KEY (`subscription_addon_id`) REFERENCES `subscription_addons` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `subscription_billing_addresses`
--
ALTER TABLE `subscription_billing_addresses`
  ADD CONSTRAINT `subscription_billing_addresses_country_id_foreign` FOREIGN KEY (`country_id`) REFERENCES `main_countries` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `subscription_billing_addresses_subscription_id_foreign` FOREIGN KEY (`subscription_id`) REFERENCES `subscriptions` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `subscription_invoices`
--
ALTER TABLE `subscription_invoices`
  ADD CONSTRAINT `subscription_invoices_created_by_foreign` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `subscription_invoices_subscription_id_foreign` FOREIGN KEY (`subscription_id`) REFERENCES `subscriptions` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `subscription_invoice_billings`
--
ALTER TABLE `subscription_invoice_billings`
  ADD CONSTRAINT `subscription_invoice_billings_country_id_foreign` FOREIGN KEY (`country_id`) REFERENCES `main_countries` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `subscription_invoice_billings_subscription_invoice_id_foreign` FOREIGN KEY (`subscription_invoice_id`) REFERENCES `subscription_invoices` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `subscription_inv_pay_meth`
--
ALTER TABLE `subscription_inv_pay_meth`
  ADD CONSTRAINT `subscription_inv_pay_meth_subscription_invoice_id_foreign` FOREIGN KEY (`subscription_invoice_id`) REFERENCES `subscription_invoices` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `subscription_logs`
--
ALTER TABLE `subscription_logs`
  ADD CONSTRAINT `subscription_logs_subscription_addon_id_foreign` FOREIGN KEY (`subscription_addon_id`) REFERENCES `subscription_addons` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `subscription_logs_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `subscription_pivot_addons`
--
ALTER TABLE `subscription_pivot_addons`
  ADD CONSTRAINT `subscription_pivot_addons_subscription_addon_id_foreign` FOREIGN KEY (`subscription_addon_id`) REFERENCES `subscription_addons` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `subscription_pivot_addons_subscription_id_foreign` FOREIGN KEY (`subscription_id`) REFERENCES `subscriptions` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `subscription_pivot_addon_plans`
--
ALTER TABLE `subscription_pivot_addon_plans`
  ADD CONSTRAINT `subscription_pivot_addon_plans_subscription_addon_id_foreign` FOREIGN KEY (`subscription_addon_id`) REFERENCES `subscription_addons` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `subscription_pivot_addon_plans_subscription_plan_id_foreign` FOREIGN KEY (`subscription_plan_id`) REFERENCES `subscription_plans` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `subscription_pivot_user_subscriptions`
--
ALTER TABLE `subscription_pivot_user_subscriptions`
  ADD CONSTRAINT `subscription_pivot_user_subscriptions_plan_id_foreign` FOREIGN KEY (`plan_id`) REFERENCES `subscription_plans` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `subscription_pivot_user_subscriptions_subscription_id_foreign` FOREIGN KEY (`subscription_id`) REFERENCES `subscriptions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `subscription_pivot_user_subscriptions_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `subscription_plans`
--
ALTER TABLE `subscription_plans`
  ADD CONSTRAINT `subscription_plans_plan_type_id_foreign` FOREIGN KEY (`plan_type_id`) REFERENCES `subscription_plan_types` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `subscription_plans_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `subscription_plan_features`
--
ALTER TABLE `subscription_plan_features`
  ADD CONSTRAINT `subscription_plan_features_site_id_foreign` FOREIGN KEY (`site_id`) REFERENCES `sites` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `subscription_plan_features_subscription_addon_id_foreign` FOREIGN KEY (`subscription_addon_id`) REFERENCES `subscription_addons` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `subscription_plan_features_subscription_plan_id_foreign` FOREIGN KEY (`subscription_plan_id`) REFERENCES `subscription_plans` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `subscription_plan_packages`
--
ALTER TABLE `subscription_plan_packages`
  ADD CONSTRAINT `subscription_plan_packages_module_id_foreign` FOREIGN KEY (`module_id`) REFERENCES `main_modules` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `subscription_plan_packages_plan_id_foreign` FOREIGN KEY (`plan_id`) REFERENCES `subscription_plans` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `subscription_plan_pivot_pricing_models`
--
ALTER TABLE `subscription_plan_pivot_pricing_models`
  ADD CONSTRAINT `subscription_plan_pivot_pricing_models_addon_id_foreign` FOREIGN KEY (`addon_id`) REFERENCES `subscription_addons` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `subscription_plan_pivot_pricing_models_plan_id_foreign` FOREIGN KEY (`plan_id`) REFERENCES `subscription_plans` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `subscription_plan_pivot_pricing_models_pricing_model_id_foreign` FOREIGN KEY (`pricing_model_id`) REFERENCES `subscription_pricing_models` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `timings`
--
ALTER TABLE `timings`
  ADD CONSTRAINT `timings_business_id_foreign` FOREIGN KEY (`business_id`) REFERENCES `businesses` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `timings_service_id_foreign` FOREIGN KEY (`service_id`) REFERENCES `services` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_country_id_foreign` FOREIGN KEY (`country_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `users_created_by_foreign` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `users_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `user_infos`
--
ALTER TABLE `user_infos`
  ADD CONSTRAINT `user_infos_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
