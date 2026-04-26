-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 27, 2026 at 12:32 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `travel_memory_tracker`
--

-- --------------------------------------------------------

--
-- Table structure for table `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `expiration` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `memories`
--

CREATE TABLE `memories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `trip_id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `location` varchar(255) NOT NULL,
  `date` date NOT NULL,
  `description` text DEFAULT NULL,
  `liked` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `memories`
--

INSERT INTO `memories` (`id`, `trip_id`, `title`, `location`, `date`, `description`, `liked`, `created_at`, `updated_at`) VALUES
(1, 1, 'Trip Highlight', 'Lisbon, Portugal', '2024-03-12', 'Pastel de nata stops, rooftop sunsets, and tram rides.', 1, '2026-04-26 16:14:40', '2026-04-26 17:17:24'),
(2, 2, 'Trip Highlight', 'Donegal, Ireland', '2024-06-01', 'Cliffs, sea air, and a notebook full of sketches.', 0, '2026-04-26 16:14:41', '2026-04-26 16:14:41'),
(3, 3, 'Trip Highlight', 'Paris, France', '2024-10-18', 'Galleries, cafe stops, and late-night photo walks.', 0, '2026-04-26 16:14:41', '2026-04-26 16:14:41'),
(4, 4, 'Trip Highlight', 'London, UK', '2024-02-09', 'Quick city break with museums and river walk.', 0, '2026-04-26 16:14:42', '2026-04-26 16:14:42'),
(5, 5, 'Trip Highlight', 'Galway, Ireland', '2024-07-05', 'Seafood market, live music, and a quiet beach stroll.', 0, '2026-04-26 16:14:42', '2026-04-26 16:14:42'),
(6, 6, 'Trip Highlight', 'Amsterdam, Netherlands', '2024-11-15', 'Canal views, bike ride, and a cozy coffee spot.', 0, '2026-04-26 16:14:43', '2026-04-26 16:14:43'),
(7, 1, 'Testimng', 'Spain', '2026-04-21', 'Today i DIDNT !!!! went to a shop', 0, '2026-04-26 18:44:52', '2026-04-26 18:50:13');

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
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_trips_table', 1),
(3, '0001_01_01_000002_create_memories_table', 1),
(4, '2026_03_31_114752_create_cache_table', 1),
(5, '2026_04_07_120922_add_cover_image_to_trips_table', 1),
(6, '2026_04_07_122833_create_trip_images_table', 1),
(7, '2026_04_08_000001_add_liked_to_memories_table', 1),
(8, '2026_04_26_170822_add_avatar_to_users_table', 1),
(9, '2026_04_26_195716_add_status_to_trips_table', 2);

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
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` longtext NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `trips`
--

CREATE TABLE `trips` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `location` varchar(255) NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date DEFAULT NULL,
  `description` text DEFAULT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'Planned',
  `cover_image` varchar(255) DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `trips`
--

INSERT INTO `trips` (`id`, `title`, `location`, `start_date`, `end_date`, `description`, `status`, `cover_image`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 'Lisbon City Break', 'Lisbon, Portugal', '2024-03-12', '2024-03-16', 'Pastel de nata stops, rooftop sunsets, and tram rides. what happens here?', 'Planned', 'trip-images/Lisbon/7Ye1hBLAu9MUlLRK2P7Jg6CPBIwFqESMkDv0o1Wz.jpg', 1, '2026-04-26 16:14:40', '2026-04-26 18:51:28'),
(2, 'Donegal Coastal Loop', 'Donegal, Ireland', '2024-06-01', '2024-06-03', 'Cliffs, sea air, and a notebook full of sketches.', 'Ongoing', 'trip-images/Donegal/pexels-donegal-pics-236006906-12675298.jpg', 1, '2026-04-26 16:14:41', '2026-04-26 19:11:19'),
(3, 'Paris Art Weekend', 'Paris, France', '2024-10-18', '2024-10-20', 'Galleries, cafe stops, and late-night photo walks.', 'Finished', 'trip-images/Paris/pexels-daria-agafonova-2147746189-30278203.jpg', 1, '2026-04-26 16:14:41', '2026-04-26 19:11:27'),
(4, 'London Weekend', 'London, UK', '2024-02-09', '2024-02-11', 'Quick city break with museums and river walk.', 'Planned', 'trip-images/London/pexels-anatoleos-35404967.jpg', 2, '2026-04-26 16:14:42', '2026-04-26 16:14:42'),
(5, 'Galway Escape', 'Galway, Ireland', '2024-07-05', '2024-07-07', 'Seafood market, live music, and a quiet beach stroll.', 'Planned', 'trip-images/Galway/pexels-alina-rossoshanska-338724645-23644598.jpg', 2, '2026-04-26 16:14:42', '2026-04-26 16:14:42'),
(6, 'Amsterdam Short Stay', 'Amsterdam, Netherlands', '2024-11-15', '2024-11-17', 'Canal views, bike ride, and a cozy coffee spot.', 'Planned', 'trip-images/Amsterdam/pexels-always-sunny-travels-198265663-16515234.jpg', 2, '2026-04-26 16:14:43', '2026-04-26 16:14:43');

-- --------------------------------------------------------

--
-- Table structure for table `trip_images`
--

CREATE TABLE `trip_images` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `trip_id` bigint(20) UNSIGNED NOT NULL,
  `path` varchar(255) NOT NULL,
  `caption` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `trip_images`
--

INSERT INTO `trip_images` (`id`, `trip_id`, `path`, `caption`, `created_at`, `updated_at`) VALUES
(1, 1, 'trip-images/Lisbon/irNfTnohrhsJH0OdnuIK5ifQ2DxCkCSDVukDaLCD.webp', NULL, '2026-04-26 16:14:40', '2026-04-26 16:14:40'),
(2, 1, 'trip-images/Lisbon/7Ye1hBLAu9MUlLRK2P7Jg6CPBIwFqESMkDv0o1Wz.jpg', NULL, '2026-04-26 16:14:40', '2026-04-26 16:14:40'),
(3, 1, 'trip-images/Lisbon/pexels-alina-chernii-682289345-31861323.jpg', NULL, '2026-04-26 16:14:40', '2026-04-26 16:14:40'),
(4, 1, 'trip-images/Lisbon/pexels-buxteh-6723898.jpg', NULL, '2026-04-26 16:14:40', '2026-04-26 16:14:40'),
(5, 1, 'trip-images/Lisbon/pexels-edwar-cruz-1869695441-28611328.jpg', NULL, '2026-04-26 16:14:40', '2026-04-26 16:14:40'),
(6, 1, 'trip-images/Lisbon/pexels-efrem-efre-2786187-30709373.jpg', NULL, '2026-04-26 16:14:40', '2026-04-26 16:14:40'),
(7, 1, 'trip-images/Lisbon/pexels-efrem-efre-2786187-35466242.jpg', NULL, '2026-04-26 16:14:40', '2026-04-26 16:14:40'),
(8, 1, 'trip-images/Lisbon/pexels-gonzalo-mendiola-95842233-30917822.jpg', NULL, '2026-04-26 16:14:40', '2026-04-26 16:14:40'),
(9, 1, 'trip-images/Lisbon/pexels-joao-aldeia-1232168247-25308902.jpg', NULL, '2026-04-26 16:14:40', '2026-04-26 16:14:40'),
(10, 1, 'trip-images/Lisbon/pexels-thorl5-2154653228-33672645.jpg', NULL, '2026-04-26 16:14:40', '2026-04-26 16:14:40'),
(11, 1, 'trip-images/Lisbon/pexels-zeydeey-2151723618-32837229.jpg', NULL, '2026-04-26 16:14:41', '2026-04-26 16:14:41'),
(12, 2, 'trip-images/Donegal/pexels-donegal-pics-236006906-12675298.jpg', NULL, '2026-04-26 16:14:41', '2026-04-26 16:14:41'),
(13, 2, 'trip-images/Donegal/pexels-donegal-pics-236006906-12965172.jpg', NULL, '2026-04-26 16:14:41', '2026-04-26 16:14:41'),
(14, 2, 'trip-images/Donegal/pexels-donegal-pics-236006906-12993887.jpg', NULL, '2026-04-26 16:14:41', '2026-04-26 16:14:41'),
(15, 2, 'trip-images/Donegal/pexels-donegal-pics-236006906-14962130.jpg', NULL, '2026-04-26 16:14:41', '2026-04-26 16:14:41'),
(16, 2, 'trip-images/Donegal/pexels-fabianwiktor-3470473.jpg', NULL, '2026-04-26 16:14:41', '2026-04-26 16:14:41'),
(17, 2, 'trip-images/Donegal/pexels-jaroslaw-zebrowski-307185908-13526805.jpg', NULL, '2026-04-26 16:14:41', '2026-04-26 16:14:41'),
(18, 2, 'trip-images/Donegal/pexels-ludakavun-18104018.jpg', NULL, '2026-04-26 16:14:41', '2026-04-26 16:14:41'),
(19, 3, 'trip-images/Paris/pexels-daria-agafonova-2147746189-30278203.jpg', NULL, '2026-04-26 16:14:41', '2026-04-26 16:14:41'),
(20, 3, 'trip-images/Paris/pexels-daria-agafonova-2147746189-30278211.jpg', NULL, '2026-04-26 16:14:41', '2026-04-26 16:14:41'),
(21, 3, 'trip-images/Paris/pexels-daria-agafonova-2147746189-30278212.jpg', NULL, '2026-04-26 16:14:41', '2026-04-26 16:14:41'),
(22, 3, 'trip-images/Paris/pexels-gfg48-33992812.jpg', NULL, '2026-04-26 16:14:41', '2026-04-26 16:14:41'),
(23, 3, 'trip-images/Paris/pexels-ismail-abou-khalil-461417538-34199634.jpg', NULL, '2026-04-26 16:14:41', '2026-04-26 16:14:41'),
(24, 3, 'trip-images/Paris/pexels-peter-kraeft-803097256-33223864.jpg', NULL, '2026-04-26 16:14:42', '2026-04-26 16:14:42'),
(25, 3, 'trip-images/Paris/pexels-zoey-trocme-737732592-18492737.jpg', NULL, '2026-04-26 16:14:42', '2026-04-26 16:14:42'),
(26, 4, 'trip-images/London/pexels-anatoleos-35404967.jpg', NULL, '2026-04-26 16:14:42', '2026-04-26 16:14:42'),
(27, 4, 'trip-images/London/pexels-ekrulila-29438404.jpg', NULL, '2026-04-26 16:14:42', '2026-04-26 16:14:42'),
(28, 4, 'trip-images/London/pexels-ivan-drazic-20457695-35696211.jpg', NULL, '2026-04-26 16:14:42', '2026-04-26 16:14:42'),
(29, 4, 'trip-images/London/pexels-jack-brown-376393468-14555250.jpg', NULL, '2026-04-26 16:14:42', '2026-04-26 16:14:42'),
(30, 4, 'trip-images/London/pexels-jorrynmorais-16955002.jpg', NULL, '2026-04-26 16:14:42', '2026-04-26 16:14:42'),
(31, 4, 'trip-images/London/pexels-liam-broder-2155455606-35284525.jpg', NULL, '2026-04-26 16:14:42', '2026-04-26 16:14:42'),
(32, 4, 'trip-images/London/pexels-sonya-livshits-113472440-9825919.jpg', NULL, '2026-04-26 16:14:42', '2026-04-26 16:14:42'),
(33, 4, 'trip-images/London/pexels-sonya-livshits-113472440-9828253.jpg', NULL, '2026-04-26 16:14:42', '2026-04-26 16:14:42'),
(34, 4, 'trip-images/London/pexels-yl-lew-88954986-35873553.jpg', NULL, '2026-04-26 16:14:42', '2026-04-26 16:14:42'),
(35, 5, 'trip-images/Galway/pexels-alina-rossoshanska-338724645-23644598.jpg', NULL, '2026-04-26 16:14:42', '2026-04-26 16:14:42'),
(36, 5, 'trip-images/Galway/pexels-gonchifacello-36826071.jpg', NULL, '2026-04-26 16:14:42', '2026-04-26 16:14:42'),
(37, 5, 'trip-images/Galway/pexels-jonathanborba-33865625.jpg', NULL, '2026-04-26 16:14:42', '2026-04-26 16:14:42'),
(38, 5, 'trip-images/Galway/pexels-jonathanborba-33865634.jpg', NULL, '2026-04-26 16:14:42', '2026-04-26 16:14:42'),
(39, 5, 'trip-images/Galway/pexels-jonathanborba-33865637.jpg', NULL, '2026-04-26 16:14:42', '2026-04-26 16:14:42'),
(40, 5, 'trip-images/Galway/pexels-jonathanborba-33865642.jpg', NULL, '2026-04-26 16:14:42', '2026-04-26 16:14:42'),
(41, 5, 'trip-images/Galway/pexels-jonathanborba-33865643.jpg', NULL, '2026-04-26 16:14:42', '2026-04-26 16:14:42'),
(42, 5, 'trip-images/Galway/pexels-jonathanborba-33943881.jpg', NULL, '2026-04-26 16:14:42', '2026-04-26 16:14:42'),
(43, 5, 'trip-images/Galway/pexels-jonathanborba-33943889.jpg', NULL, '2026-04-26 16:14:42', '2026-04-26 16:14:42'),
(44, 5, 'trip-images/Galway/pexels-jonathanborba-33943892.jpg', NULL, '2026-04-26 16:14:42', '2026-04-26 16:14:42'),
(45, 5, 'trip-images/Galway/pexels-maksuatravel-770165523-18865173.jpg', NULL, '2026-04-26 16:14:43', '2026-04-26 16:14:43'),
(46, 5, 'trip-images/Galway/pexels-sergei-36892724.jpg', NULL, '2026-04-26 16:14:43', '2026-04-26 16:14:43'),
(47, 5, 'trip-images/Galway/pexels-spencphoto-19728853.jpg', NULL, '2026-04-26 16:14:43', '2026-04-26 16:14:43'),
(48, 6, 'trip-images/Amsterdam/pexels-always-sunny-travels-198265663-16515234.jpg', NULL, '2026-04-26 16:14:43', '2026-04-26 16:14:43'),
(49, 6, 'trip-images/Amsterdam/pexels-bertellifotografia-18800471.jpg', NULL, '2026-04-26 16:14:43', '2026-04-26 16:14:43'),
(50, 6, 'trip-images/Amsterdam/pexels-bertellifotografia-18999414.jpg', NULL, '2026-04-26 16:14:43', '2026-04-26 16:14:43'),
(51, 6, 'trip-images/Amsterdam/pexels-dylangkz-32762723.jpg', NULL, '2026-04-26 16:14:43', '2026-04-26 16:14:43'),
(52, 6, 'trip-images/Amsterdam/pexels-filiamariss-32350063.jpg', NULL, '2026-04-26 16:14:43', '2026-04-26 16:14:43'),
(53, 6, 'trip-images/Amsterdam/pexels-frostroomhead-17006088.jpg', NULL, '2026-04-26 16:14:43', '2026-04-26 16:14:43'),
(54, 6, 'trip-images/Amsterdam/pexels-marceloverfe-13059449.jpg', NULL, '2026-04-26 16:14:43', '2026-04-26 16:14:43'),
(55, 6, 'trip-images/Amsterdam/pexels-matreding-17959988.jpg', NULL, '2026-04-26 16:14:43', '2026-04-26 16:14:43'),
(56, 6, 'trip-images/Amsterdam/pexels-naimish17-29351195.jpg', NULL, '2026-04-26 16:14:44', '2026-04-26 16:14:44'),
(57, 6, 'trip-images/Amsterdam/pexels-omergulen-19749717.jpg', NULL, '2026-04-26 16:14:44', '2026-04-26 16:14:44'),
(58, 6, 'trip-images/Amsterdam/pexels-thatguycraig000-30201046.jpg', NULL, '2026-04-26 16:14:44', '2026-04-26 16:14:44'),
(59, 6, 'trip-images/Amsterdam/pexels-wolfart-16092926.jpg', NULL, '2026-04-26 16:14:44', '2026-04-26 16:14:44');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `avatar` varchar(255) DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `avatar`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Sarah Smith', 'sarah.smith@example.com', 'avatars/R29jRaKDoZqVycSVOB1a0OmGhnngSs5PfZlIaZkn.jpg', NULL, '$2y$12$hjGym33kjKOnPVExmI.6Tu62g0SZUQQpKXefA0jEiwUh6BRVV3qJq', NULL, '2026-04-26 16:14:40', '2026-04-26 16:15:01'),
(2, 'Mark Byrne', 'mark.byrne@example.com', NULL, NULL, '$2y$12$hjGym33kjKOnPVExmI.6Tu62g0SZUQQpKXefA0jEiwUh6BRVV3qJq', NULL, '2026-04-26 16:14:40', '2026-04-26 16:14:40');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`),
  ADD KEY `cache_expiration_index` (`expiration`);

--
-- Indexes for table `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`),
  ADD KEY `cache_locks_expiration_index` (`expiration`);

--
-- Indexes for table `memories`
--
ALTER TABLE `memories`
  ADD PRIMARY KEY (`id`),
  ADD KEY `memories_trip_id_foreign` (`trip_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `trips`
--
ALTER TABLE `trips`
  ADD PRIMARY KEY (`id`),
  ADD KEY `trips_user_id_foreign` (`user_id`);

--
-- Indexes for table `trip_images`
--
ALTER TABLE `trip_images`
  ADD PRIMARY KEY (`id`),
  ADD KEY `trip_images_trip_id_foreign` (`trip_id`);

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
-- AUTO_INCREMENT for table `memories`
--
ALTER TABLE `memories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `trips`
--
ALTER TABLE `trips`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `trip_images`
--
ALTER TABLE `trip_images`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `memories`
--
ALTER TABLE `memories`
  ADD CONSTRAINT `memories_trip_id_foreign` FOREIGN KEY (`trip_id`) REFERENCES `trips` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `trips`
--
ALTER TABLE `trips`
  ADD CONSTRAINT `trips_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `trip_images`
--
ALTER TABLE `trip_images`
  ADD CONSTRAINT `trip_images_trip_id_foreign` FOREIGN KEY (`trip_id`) REFERENCES `trips` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
