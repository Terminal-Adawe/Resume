-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Nov 16, 2020 at 05:04 PM
-- Server version: 5.7.26
-- PHP Version: 7.3.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `resume`
--

-- --------------------------------------------------------

--
-- Table structure for table `certifications`
--

CREATE TABLE `certifications` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `certification` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `certifications`
--

INSERT INTO `certifications` (`id`, `certification`, `created_at`, `updated_at`) VALUES
(1, 'Degree', '2020-05-14 17:23:21', '2020-05-14 17:23:21'),
(2, 'Certificate', '2020-05-14 17:23:21', '2020-05-14 17:23:21'),
(3, 'Diploma', '2020-05-14 17:23:21', '2020-05-14 17:23:21');

-- --------------------------------------------------------

--
-- Table structure for table `education`
--

CREATE TABLE `education` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `session_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `school` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `certification_id` smallint(5) UNSIGNED DEFAULT NULL,
  `courses` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `country` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `projects` text COLLATE utf8mb4_unicode_ci,
  `date_started` date NOT NULL,
  `date_ended` date NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `education`
--

INSERT INTO `education` (`id`, `session_id`, `school`, `certification_id`, `courses`, `country`, `address`, `projects`, `date_started`, `date_ended`, `created_at`, `updated_at`) VALUES
(1, '4Z8pfaFlFYHUemWcv2kRfBRT3WZBj8w2FcKPkDyx', 'Ghana Telecom University', 1, 'Telecommunications Engineering', 'Ghana', 'Box 72', NULL, '2020-05-06', '2020-05-20', '2020-05-14 18:12:15', '2020-05-14 20:16:11'),
(2, 'd7PUS1iOiO96dbd9aZDcd8HwsVJ4gU98rgevzx02', 'Trinity', 2, 'Science', 'Ghana', 'Box 72', NULL, '2020-04-28', '2020-05-06', '2020-05-17 10:41:46', '2020-05-17 10:41:46'),
(3, 'd7PUS1iOiO96dbd9aZDcd8HwsVJ4gU98rgevzx02', 'Trinity', 2, 'Science', 'Ghana', 'Box 72', NULL, '2020-04-28', '2020-05-06', '2020-05-17 10:41:56', '2020-05-17 10:41:56'),
(4, '4i95YgW6SHsaOiYtL63aA6rqCtEjKScBWCXDNSNH', 'Ghana Telecom University', 1, 'Telecommunications Engineering', 'Ghana', 'Box 72', NULL, '2020-05-04', '2020-05-22', '2020-05-31 19:15:04', '2020-05-31 19:15:04'),
(5, '4i95YgW6SHsaOiYtL63aA6rqCtEjKScBWCXDNSNH', 'NIIT', 3, 'Software Engineering', 'Ghana', 'Box 678, Seven street', NULL, '2020-05-05', '2020-05-22', '2020-05-31 19:16:00', '2020-05-31 19:16:00'),
(6, 'z1KV8ew316NLAAEoCvAh0Vs0CD4ZYF5pkt50dfRQ', 'LA Junior High School', 3, 'Science', 'Ghana', 'Labone', NULL, '2010-09-01', '2013-06-30', '2020-06-02 00:42:16', '2020-06-02 00:42:16'),
(7, 'jcisyEd49g5UrEFe98uQi8f1iALWygQyfDflpHUu', 'Randolph High School', 3, 'Social Science', 'Ghana', 'Post Office Box, 520', NULL, '2011-06-01', '2015-05-19', '2020-06-09 23:52:18', '2020-06-09 23:52:18'),
(8, 'AB0pZW1gPaFh1OA9aO9Hs6hT9LYIVHC6NJXByaAP', 'Ghana Technology University College', 1, 'Antenna and Wave Propagation, Signals and Systems, Opto- Electronics, Digital Signal Processing, Mobile and Satellite Communication, Electromagnetic Wave Theory, Programming.', 'Ghana', 'Tesano', NULL, '2009-09-01', '2013-06-01', '2020-06-10 11:37:26', '2020-06-10 11:37:26'),
(9, 'AB0pZW1gPaFh1OA9aO9Hs6hT9LYIVHC6NJXByaAP', 'NIIT', 3, 'Java, Java EE, Jquery, database management, microsoft office', 'Ghana', 'Ring Road Central, Kokomlemle', NULL, '2013-02-03', '2016-02-01', '2020-06-10 11:39:22', '2020-06-10 11:39:22');

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
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `hobbies`
--

CREATE TABLE `hobbies` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `session_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `hobby` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `hobbies`
--

INSERT INTO `hobbies` (`id`, `session_id`, `hobby`, `created_at`, `updated_at`) VALUES
(1, 'EJ2Mtopri9fGaw8GCvgLIIx4eLa6aG8kSycPvvfx', 'dancing', '2020-05-16 19:59:15', '2020-05-16 19:59:15'),
(2, 'EJ2Mtopri9fGaw8GCvgLIIx4eLa6aG8kSycPvvfx', 'coding', '2020-05-16 20:01:46', '2020-05-16 20:01:46'),
(3, 'd7PUS1iOiO96dbd9aZDcd8HwsVJ4gU98rgevzx02', 'eating', '2020-05-17 10:48:45', '2020-05-17 10:48:45'),
(4, 'd7PUS1iOiO96dbd9aZDcd8HwsVJ4gU98rgevzx02', 'running', '2020-05-17 10:48:51', '2020-05-17 10:48:51'),
(5, 'd7PUS1iOiO96dbd9aZDcd8HwsVJ4gU98rgevzx02', 'coding', '2020-05-17 10:48:58', '2020-05-17 10:48:58'),
(6, 'd7PUS1iOiO96dbd9aZDcd8HwsVJ4gU98rgevzx02', 'designing', '2020-05-17 10:49:09', '2020-05-17 10:49:09'),
(7, 'd7PUS1iOiO96dbd9aZDcd8HwsVJ4gU98rgevzx02', 'drawing', '2020-05-17 10:49:15', '2020-05-17 10:49:15'),
(8, '4i95YgW6SHsaOiYtL63aA6rqCtEjKScBWCXDNSNH', 'Drawing', '2020-05-31 19:18:13', '2020-05-31 19:18:13'),
(9, '4i95YgW6SHsaOiYtL63aA6rqCtEjKScBWCXDNSNH', 'Coding', '2020-05-31 19:19:35', '2020-05-31 19:19:35'),
(10, '4i95YgW6SHsaOiYtL63aA6rqCtEjKScBWCXDNSNH', 'Playing video games', '2020-05-31 19:21:16', '2020-05-31 19:21:16'),
(11, 'z1KV8ew316NLAAEoCvAh0Vs0CD4ZYF5pkt50dfRQ', 'Swimming', '2020-06-02 00:42:50', '2020-06-02 00:42:50'),
(12, 'z1KV8ew316NLAAEoCvAh0Vs0CD4ZYF5pkt50dfRQ', 'Dancing', '2020-06-02 00:42:55', '2020-06-02 00:42:55'),
(13, 'z1KV8ew316NLAAEoCvAh0Vs0CD4ZYF5pkt50dfRQ', 'Singing', '2020-06-02 00:43:00', '2020-06-02 00:43:00'),
(14, 'jcisyEd49g5UrEFe98uQi8f1iALWygQyfDflpHUu', 'Running', '2020-06-09 23:53:46', '2020-06-09 23:53:46'),
(15, 'jcisyEd49g5UrEFe98uQi8f1iALWygQyfDflpHUu', 'Eating', '2020-06-09 23:53:52', '2020-06-09 23:53:52'),
(16, 'jcisyEd49g5UrEFe98uQi8f1iALWygQyfDflpHUu', 'Sleeping', '2020-06-09 23:53:56', '2020-06-09 23:53:56'),
(17, 'AB0pZW1gPaFh1OA9aO9Hs6hT9LYIVHC6NJXByaAP', 'Programming', '2020-06-10 11:41:08', '2020-06-10 11:41:08'),
(18, 'AB0pZW1gPaFh1OA9aO9Hs6hT9LYIVHC6NJXByaAP', 'Gaming', '2020-06-10 11:41:12', '2020-06-10 11:41:12'),
(19, 'AB0pZW1gPaFh1OA9aO9Hs6hT9LYIVHC6NJXByaAP', 'Drawing', '2020-06-10 11:41:17', '2020-06-10 11:41:17'),
(20, 'AB0pZW1gPaFh1OA9aO9Hs6hT9LYIVHC6NJXByaAP', 'Swimming', '2020-06-10 11:41:23', '2020-06-10 11:41:23'),
(21, 'AB0pZW1gPaFh1OA9aO9Hs6hT9LYIVHC6NJXByaAP', 'Listening to music', '2020-06-10 11:41:45', '2020-06-10 11:41:45'),
(22, 'AB0pZW1gPaFh1OA9aO9Hs6hT9LYIVHC6NJXByaAP', 'Watching Movies', '2020-06-10 11:42:29', '2020-06-10 11:42:29'),
(23, 'AB0pZW1gPaFh1OA9aO9Hs6hT9LYIVHC6NJXByaAP', 'Playing Football', '2020-06-10 11:42:37', '2020-06-10 11:42:37');

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
(4, '2020_05_14_102915_create_sessions_table', 2),
(5, '2020_05_14_103140_create_personal_details_table', 3),
(6, '2020_05_14_113629_create_professional_experiences_table', 4),
(7, '2020_05_14_114421_create_certifications_table', 4),
(8, '2020_05_14_114427_create_education_table', 4),
(9, '2020_05_14_114803_create_skills_table', 4),
(10, '2020_05_14_114814_create_hobbies_table', 4),
(11, '2020_05_14_114825_create_personal_projects_table', 4),
(12, '2020_06_01_002056_create_summaries_table', 5);

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
-- Table structure for table `personal_details`
--

CREATE TABLE `personal_details` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `session_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `surname` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `other_names` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `city` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `country` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `contact_number_1` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `contact_number_2` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `personal_details`
--

INSERT INTO `personal_details` (`id`, `session_id`, `surname`, `other_names`, `email`, `city`, `country`, `address`, `contact_number_1`, `contact_number_2`, `created_at`, `updated_at`) VALUES
(1, '4Z8pfaFlFYHUemWcv2kRfBRT3WZBj8w2FcKPkDyx', NULL, 'Bede Adawe', NULL, 'Accra', 'Ghana', 'Box 72', '233557881327', NULL, '2020-05-14 17:11:35', '2020-05-14 17:11:35'),
(2, 'C0ufgz3quQqyh7nVG4CGKLRIyUwPYrB4nhrTtWUD', NULL, 'John', NULL, 'Accra', 'Ghana', '3rd Roundabout, Jisonayili', '2332455802', NULL, '2020-05-16 13:36:33', '2020-05-16 13:36:33'),
(4, 'njummnTMLCzMSf5hSaU8sOSXbjBSnHWyR9f7Rt9t', NULL, 'Bede Adawe', NULL, 'Accra', 'Ghana', 'Box 678, Seven street', '233557881327', NULL, '2020-05-16 23:20:08', '2020-05-16 23:20:08'),
(5, 'd7PUS1iOiO96dbd9aZDcd8HwsVJ4gU98rgevzx02', 'Stan', 'Gary Marrk', 'gmarrk@gmail.com', 'Accra', 'Ghana', 'Box 72', '233557881327', NULL, '2020-05-17 10:23:00', '2020-05-17 10:23:00'),
(6, 'XEG2wDpYknmXn15ubrvR3OQaaaAugTcQ90bE8E7f', 'Abbe', 'Bede Adawe', 'bede.abbe91@gmail.com', 'Accra', 'Ghana', 'Box 678, Seven street', '233557881327', NULL, '2020-05-24 17:58:52', '2020-05-24 17:58:52'),
(7, '4i95YgW6SHsaOiYtL63aA6rqCtEjKScBWCXDNSNH', 'Abbe', 'Bede Adawe', 'bede.abbe91@gmail.com', 'Accra', 'Ghana', 'Box 72', '233557881327', '233507064062', '2020-05-31 19:12:01', '2020-05-31 19:12:01'),
(8, 'z1KV8ew316NLAAEoCvAh0Vs0CD4ZYF5pkt50dfRQ', 'Blazy', 'Adams Wepia', 'adamswepia@gmail.com', 'Accra', 'Ghana', 'Pokuase, Ghana', '233557881327', NULL, '2020-06-02 00:14:07', '2020-06-02 00:14:07'),
(9, 'jcisyEd49g5UrEFe98uQi8f1iALWygQyfDflpHUu', 'Annancy', 'Patrick Aboagye', 'patrick.aboagye@gmail.com', 'Accra', 'Ghana', 'Post Office Box, 520', '233272920404', '233240050021', '2020-06-09 23:49:02', '2020-06-09 23:49:02'),
(10, 'AB0pZW1gPaFh1OA9aO9Hs6hT9LYIVHC6NJXByaAP', 'Abbe', 'Bede Adawe', 'bede.abbe91@gmail.com', 'Accra', 'Ghana', 'Adjiringanor, Junction bus stop', '233557881327', '233507064062', '2020-06-10 11:11:35', '2020-06-10 11:11:35'),
(11, 'T2wZHhFg4fuMXfJl6DIA3dAj2BYTM64HhDNtIV7S', 'Abbe', 'Adawe Abbe', 'bede.abbe91@gmail.com', 'Accra', 'Ghana', 'Post Office Box, 49', '233557881327', '233269008514', '2020-06-17 07:15:54', '2020-06-17 07:15:54');

-- --------------------------------------------------------

--
-- Table structure for table `personal_projects`
--

CREATE TABLE `personal_projects` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `session_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `project` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `link` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `professional_experiences`
--

CREATE TABLE `professional_experiences` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `session_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `company` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `role` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `city` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `country` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `duties` text COLLATE utf8mb4_unicode_ci,
  `projects` text COLLATE utf8mb4_unicode_ci,
  `date_started` date NOT NULL,
  `date_ended` date NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `professional_experiences`
--

INSERT INTO `professional_experiences` (`id`, `session_id`, `company`, `role`, `city`, `country`, `address`, `duties`, `projects`, `date_started`, `date_ended`, `created_at`, `updated_at`) VALUES
(1, 'C0ufgz3quQqyh7nVG4CGKLRIyUwPYrB4nhrTtWUD', 'Grannada', 'Engineer', 'Accra', 'Ghana', 'Pokuase, Ghana', 'grateful', NULL, '2020-04-28', '2020-05-15', '2020-05-16 14:11:04', '2020-05-16 15:57:19'),
(2, 'C0ufgz3quQqyh7nVG4CGKLRIyUwPYrB4nhrTtWUD', 'Comviva', 'Engineer', 'Accra', 'Ghana', 'Pokuase, Ghana', 'this is it', NULL, '2020-04-27', '2020-05-15', '2020-05-16 16:00:02', '2020-05-16 16:00:02'),
(3, 'C0ufgz3quQqyh7nVG4CGKLRIyUwPYrB4nhrTtWUD', 'Mikel Industries', 'Engineer', 'Accra', 'Ghana', 'Pokuase, Ghana', 'general stuff', NULL, '2020-05-07', '2020-05-15', '2020-05-16 16:18:27', '2020-05-16 16:18:27'),
(4, 'd7PUS1iOiO96dbd9aZDcd8HwsVJ4gU98rgevzx02', 'Mahindra', 'Engineer', 'Accra', 'Ghana', 'Box 72', 'laying cables', NULL, '2020-04-27', '2020-05-21', '2020-05-17 10:24:39', '2020-05-17 10:24:39'),
(5, 'd7PUS1iOiO96dbd9aZDcd8HwsVJ4gU98rgevzx02', 'Haven', 'Project Manager', 'Freetown', 'Liberia', 'Box 678, Seven street', 'Out of this world', NULL, '2016-04-27', '2019-05-14', '2020-05-17 10:26:49', '2020-05-17 10:26:49'),
(6, 'XEG2wDpYknmXn15ubrvR3OQaaaAugTcQ90bE8E7f', 'Starhouse', 'Engineer', 'Accra', 'Ghana', 'Fr street 24, box 11', 'Development', NULL, '2020-05-18', '2020-05-22', '2020-05-24 18:00:52', '2020-05-24 18:00:52'),
(7, '4i95YgW6SHsaOiYtL63aA6rqCtEjKScBWCXDNSNH', 'Cellulant', 'Engineer', 'Accra', 'Ghana', 'Box 678, Seven street', 'Taking things and doing things', NULL, '2020-04-28', '2020-05-29', '2020-05-31 19:14:00', '2020-05-31 19:14:00'),
(8, '4i95YgW6SHsaOiYtL63aA6rqCtEjKScBWCXDNSNH', 'Comviva', 'Engineer', 'Accra', 'Ghana', 'Box 72', 'Nothing really', NULL, '2020-05-06', '2020-06-05', '2020-05-31 19:14:34', '2020-05-31 19:14:34'),
(9, 'z1KV8ew316NLAAEoCvAh0Vs0CD4ZYF5pkt50dfRQ', 'Starbytes', 'Waiter', 'Accra', 'Ghana', 'Adjiringanor', 'Taking orders and serving customers\r\nManaging junior staff', NULL, '2014-06-01', '2014-03-11', '2020-06-02 00:27:01', '2020-06-02 00:27:01'),
(10, 'z1KV8ew316NLAAEoCvAh0Vs0CD4ZYF5pkt50dfRQ', 'Professional Diet', 'Drink Servers Supervisor', 'Accra', 'Ghana', 'Box 678, Seven street', 'serving drinks', NULL, '2020-06-02', '2020-06-11', '2020-06-02 01:56:27', '2020-06-02 01:56:27'),
(11, 'jcisyEd49g5UrEFe98uQi8f1iALWygQyfDflpHUu', 'Bankers Inn', 'Cashier', 'Kumasi', 'Ghana', 'Box 12, Elm\'s street', 'Performing Cashier Duties', NULL, '2015-06-01', '2017-06-04', '2020-06-09 23:50:46', '2020-06-09 23:50:46'),
(12, 'AB0pZW1gPaFh1OA9aO9Hs6hT9LYIVHC6NJXByaAP', 'Cellulant', 'SeniorEngineer(Consultant)', 'Accra', 'Ghana', 'ACC Building, 1st Floor room 125, Airport Bypass Rd', '● Ecobank application backend support\r\n● Support projects and operations of the mobile app for the\r\nbank\r\n● Provide solutions for continual improvement of the service\r\n● Manage client communication with Technical, Business and\r\nSr Management\r\n● Carry out system tests for new products\r\n● Implementation of configurational or policy changes as per\r\nguidelines given by client.', '● Setup of Ecobank mobile application on the UAT servers.', '2018-07-01', '2020-06-10', '2020-06-10 11:15:13', '2020-06-10 11:15:13'),
(13, 'AB0pZW1gPaFh1OA9aO9Hs6hT9LYIVHC6NJXByaAP', 'Mahindra Comviva Technologies', 'Senior associate support engineer', 'Accra', 'Ghana', 'AirtelTigo Ghana Head Office', '● Airtel Money backend support\r\n● Monitoring and implementation and operation of defined controls and recommendations on ongoing basis via client team.\r\n● Support all project and Operations\r\n● Creating/changing and deleting users on the GUI application as per request.\r\n● Contributing and maintaining system standards\r\n● Make Policy changes as per guidelines given by client\r\n● Patch updating and signature pattern updating required for firewall/IDS\r\n● Password Policy Enforcement and server and Database hardening\r\n● Application of security patches for OS/DB and other applications\r\n● Report generation from oracle database\r\n● Backup of system information\r\n● Manage client communication with Technical, Business and Sr Management\r\n● Responsible to deliver all Contractual scope and meeting KPIs/SLAs with no penalty\r\n● Develop and maintain documentation for supported infrastructure\r\n● Carry out System integration testing (SIT) of Value Added Services\r\n● Resolve applications problem within agreed SLA’s and coordinates users’ requirements\r\n● Contribute to quarterly interest payments of customers on the mobile money platform.\r\n\r\nOther tasks\r\n● Churn management of ported out customers\r\n● Reconciliation on customer balances to ensure there is no variance\r\n\r\nNodes Managed\r\n● Mobiquity ecommerce platform for AirtelTigo Money\r\n● Symantec Backup Exec 2012', 'Projects worked on\r\n● Mobile Money Interoperability Project to allow transfer of funds between customers of different mobile money operators\r\n● AirtelTigo mobile money merger\r\n● Multiple bank integrations with AirtelTigo Money including Barclays bank, Fidelity bank, First Atlantic bank, Ecobank, GT Bank, Zenith Bank etc\r\n● Third party integrations with AirtelTigo Money', '2015-05-01', '2018-06-01', '2020-06-10 11:26:40', '2020-06-10 11:26:40'),
(14, 'AB0pZW1gPaFh1OA9aO9Hs6hT9LYIVHC6NJXByaAP', 'AirtelGhana', 'IT Support', 'Accra', 'Ghana', 'AirtelTigoGhanaHeadOffice', '● Maintenance and supervision of power equipment at Tigo cell sites\r\n● Compiling of equipment information', NULL, '2013-10-01', '2014-05-01', '2020-06-10 11:33:33', '2020-06-10 11:33:33');

-- --------------------------------------------------------

--
-- Table structure for table `skills`
--

CREATE TABLE `skills` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `session_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `skill` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `skills`
--

INSERT INTO `skills` (`id`, `session_id`, `skill`, `created_at`, `updated_at`) VALUES
(1, 'd7PUS1iOiO96dbd9aZDcd8HwsVJ4gU98rgevzx02', 'Eating', '2020-05-17 10:48:01', '2020-05-17 10:48:01'),
(2, 'd7PUS1iOiO96dbd9aZDcd8HwsVJ4gU98rgevzx02', 'running', '2020-05-17 10:48:06', '2020-05-17 10:48:06'),
(3, 'XEG2wDpYknmXn15ubrvR3OQaaaAugTcQ90bE8E7f', 'Unix', '2020-05-24 18:01:30', '2020-05-24 18:01:30'),
(4, 'XEG2wDpYknmXn15ubrvR3OQaaaAugTcQ90bE8E7f', 'Java', '2020-05-24 18:02:21', '2020-05-24 18:02:21'),
(5, '4i95YgW6SHsaOiYtL63aA6rqCtEjKScBWCXDNSNH', 'Unix', '2020-05-31 19:16:06', '2020-05-31 19:16:06'),
(6, '4i95YgW6SHsaOiYtL63aA6rqCtEjKScBWCXDNSNH', 'PHP', '2020-05-31 19:16:56', '2020-05-31 19:16:56'),
(7, '4i95YgW6SHsaOiYtL63aA6rqCtEjKScBWCXDNSNH', 'Java', '2020-05-31 19:17:03', '2020-05-31 19:17:03'),
(8, 'z1KV8ew316NLAAEoCvAh0Vs0CD4ZYF5pkt50dfRQ', 'Fast techniques', '2020-06-02 00:42:29', '2020-06-02 00:42:29'),
(9, 'z1KV8ew316NLAAEoCvAh0Vs0CD4ZYF5pkt50dfRQ', 'Tethering', '2020-06-02 00:42:37', '2020-06-02 00:42:37'),
(10, 'z1KV8ew316NLAAEoCvAh0Vs0CD4ZYF5pkt50dfRQ', 'Juggler', '2020-06-02 00:42:43', '2020-06-02 00:42:43'),
(11, 'jcisyEd49g5UrEFe98uQi8f1iALWygQyfDflpHUu', 'Typing', '2020-06-09 23:53:32', '2020-06-09 23:53:32'),
(12, 'jcisyEd49g5UrEFe98uQi8f1iALWygQyfDflpHUu', 'Calculations', '2020-06-09 23:53:39', '2020-06-09 23:53:39'),
(13, 'AB0pZW1gPaFh1OA9aO9Hs6hT9LYIVHC6NJXByaAP', 'Unix proficiency', '2020-06-10 11:39:36', '2020-06-10 11:39:36'),
(14, 'AB0pZW1gPaFh1OA9aO9Hs6hT9LYIVHC6NJXByaAP', 'Troubleshooting', '2020-06-10 11:39:43', '2020-06-10 11:39:43'),
(15, 'AB0pZW1gPaFh1OA9aO9Hs6hT9LYIVHC6NJXByaAP', 'Web designing with html and CSS', '2020-06-10 11:39:50', '2020-06-10 11:39:50'),
(16, 'AB0pZW1gPaFh1OA9aO9Hs6hT9LYIVHC6NJXByaAP', 'PHP', '2020-06-10 11:39:56', '2020-06-10 11:39:56'),
(17, 'AB0pZW1gPaFh1OA9aO9Hs6hT9LYIVHC6NJXByaAP', 'JQuery / Javascript', '2020-06-10 11:40:06', '2020-06-10 11:40:06'),
(18, 'AB0pZW1gPaFh1OA9aO9Hs6hT9LYIVHC6NJXByaAP', 'Java', '2020-06-10 11:40:12', '2020-06-10 11:40:12'),
(19, 'AB0pZW1gPaFh1OA9aO9Hs6hT9LYIVHC6NJXByaAP', 'ReactJs', '2020-06-10 11:40:16', '2020-06-10 11:40:16'),
(20, 'AB0pZW1gPaFh1OA9aO9Hs6hT9LYIVHC6NJXByaAP', 'Python', '2020-06-10 11:40:21', '2020-06-10 11:40:21'),
(21, 'AB0pZW1gPaFh1OA9aO9Hs6hT9LYIVHC6NJXByaAP', 'Kubernetes', '2020-06-10 11:40:28', '2020-06-10 11:40:28'),
(22, 'AB0pZW1gPaFh1OA9aO9Hs6hT9LYIVHC6NJXByaAP', 'Docker', '2020-06-10 11:40:33', '2020-06-10 11:40:33'),
(23, 'AB0pZW1gPaFh1OA9aO9Hs6hT9LYIVHC6NJXByaAP', 'MySQL / Database management', '2020-06-10 11:40:50', '2020-06-10 11:40:50'),
(24, 'AB0pZW1gPaFh1OA9aO9Hs6hT9LYIVHC6NJXByaAP', 'Laravel', '2020-06-10 11:40:56', '2020-06-10 11:40:56'),
(25, 'AB0pZW1gPaFh1OA9aO9Hs6hT9LYIVHC6NJXByaAP', 'Django', '2020-06-10 11:41:01', '2020-06-10 11:41:01');

-- --------------------------------------------------------

--
-- Table structure for table `summaries`
--

CREATE TABLE `summaries` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `session_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `summary` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `summaries`
--

INSERT INTO `summaries` (`id`, `session_id`, `summary`, `created_at`, `updated_at`) VALUES
(1, 'AB0pZW1gPaFh1OA9aO9Hs6hT9LYIVHC6NJXByaAP', 'Skilled  DevOps Engineer  with valuable years of experience and desire to learn in this rapidly growing technological environment.\r\nProficient in PHP, JQuery/Javascript, mysql and python.', '2020-06-01 00:45:16', '2020-06-10 11:43:11'),
(2, 'AB0pZW1gPaFh1OA9aO9Hs6hT9LYIVHC6NJXByaAP', 'Skilled  DevOps Engineer  with valuable years of experience and desire to learn in this rapidly growing technological environment.\r\nProficient in PHP, JQuery/Javascript, mysql and python.', '2020-06-02 00:43:23', '2020-06-10 11:43:11'),
(3, 'AB0pZW1gPaFh1OA9aO9Hs6hT9LYIVHC6NJXByaAP', 'Skilled  DevOps Engineer  with valuable years of experience and desire to learn in this rapidly growing technological environment.\r\nProficient in PHP, JQuery/Javascript, mysql and python.', '2020-06-09 23:54:55', '2020-06-10 11:43:11'),
(4, 'AB0pZW1gPaFh1OA9aO9Hs6hT9LYIVHC6NJXByaAP', 'Skilled  DevOps Engineer  with valuable years of experience and desire to learn in this rapidly growing technological environment.\r\nProficient in PHP, JQuery/Javascript, mysql and python.', '2020-06-10 11:43:09', '2020-06-10 11:43:09');

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
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `certifications`
--
ALTER TABLE `certifications`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `education`
--
ALTER TABLE `education`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hobbies`
--
ALTER TABLE `hobbies`
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
-- Indexes for table `personal_details`
--
ALTER TABLE `personal_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `personal_projects`
--
ALTER TABLE `personal_projects`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `professional_experiences`
--
ALTER TABLE `professional_experiences`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `skills`
--
ALTER TABLE `skills`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `summaries`
--
ALTER TABLE `summaries`
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
-- AUTO_INCREMENT for table `certifications`
--
ALTER TABLE `certifications`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `education`
--
ALTER TABLE `education`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `hobbies`
--
ALTER TABLE `hobbies`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `personal_details`
--
ALTER TABLE `personal_details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `personal_projects`
--
ALTER TABLE `personal_projects`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `professional_experiences`
--
ALTER TABLE `professional_experiences`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `skills`
--
ALTER TABLE `skills`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `summaries`
--
ALTER TABLE `summaries`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;
