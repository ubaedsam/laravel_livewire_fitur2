-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 19 Jul 2023 pada 09.37
-- Versi server: 10.1.38-MariaDB
-- Versi PHP: 7.3.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `laravel_livewire`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `appointments`
--

CREATE TABLE `appointments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `client_id` bigint(20) UNSIGNED NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `note` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `members` text COLLATE utf8mb4_unicode_ci,
  `color` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `order_position` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `appointments`
--

INSERT INTO `appointments` (`id`, `client_id`, `date`, `time`, `status`, `note`, `created_at`, `updated_at`, `members`, `color`, `order_position`) VALUES
(7, 1, '2023-07-08', '20:43:00', 'CLOSED', '<p>Data 1</p>', '2023-07-07 18:43:06', '2023-07-18 18:02:25', NULL, NULL, 1),
(8, 2, '2023-07-08', '08:43:00', 'SCHEDULED', '<p>Data 2</p>', '2023-07-07 18:43:13', '2023-07-18 19:46:09', NULL, NULL, 3),
(9, 2, '2023-07-11', '08:09:00', 'CLOSED', '<p>Test Member</p>', '2023-07-10 18:09:57', '2023-07-18 19:46:09', '[\"Alabama\",\"Delaware\",\"Tennessee\"]', NULL, 5),
(10, 3, '2023-07-11', '09:36:00', 'SCHEDULED', '<p>Test Appointment 2</p>', '2023-07-10 19:36:57', '2023-07-18 19:46:09', '[\"Delaware\",\"Washington\"]', NULL, 4),
(11, 2, '2023-07-11', '11:30:00', 'CLOSED', '<p>Ada color</p>', '2023-07-10 21:30:59', '2023-07-18 19:46:10', '[\"One\",\"Alaska\",\"Tennessee\",\"Washington\"]', '#0A2AF7', 7),
(12, 3, '2023-07-12', '10:38:00', 'SCHEDULED', '<p><strong>Hanya test</strong></p>', '2023-07-11 20:39:09', '2023-07-18 19:46:09', '[\"One\",\"California\"]', '#EF19D9', 6),
(13, 1, '2023-07-21', '10:35:00', 'SCHEDULED', '<p>Aaaaaaa</p>', '2023-07-11 20:42:54', '2023-07-18 19:46:10', '[\"California\",\"Texas\"]', '#865E5E', 8),
(14, 1, '2023-07-19', '09:44:00', 'CLOSED', '<p>mix js</p>', '2023-07-18 19:44:45', '2023-07-18 19:46:38', '[\"One\",\"Alaska\",\"California\",\"Delaware\"]', '#9E0000', 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `clients`
--

CREATE TABLE `clients` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `clients`
--

INSERT INTO `clients` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Sibyl Lindgren MD', '2023-07-06 19:57:22', '2023-07-06 19:57:22'),
(2, 'Dr. Wyatt Bernier DDS', '2023-07-06 19:57:28', '2023-07-06 19:57:28'),
(3, 'Mrs. Amely Schulist PhD', '2023-07-06 19:57:34', '2023-07-06 19:57:34');

-- --------------------------------------------------------

--
-- Struktur dari tabel `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2023_07_07_020831_create_clients_table', 2),
(6, '2023_07_07_021114_create_appointments_table', 2),
(7, '2023_07_08_095059_add_avatar_field_to_users_table', 3),
(8, '2014_10_12_200000_add_two_factor_columns_to_users_table', 4),
(9, '2023_07_10_034250_add_role_field_to_users_table', 5),
(10, '2023_07_11_010128_add_members_field_to_appointments_table', 6),
(11, '2023_07_11_042103_add_color_field_to_appointments_table', 7),
(12, '2023_07_18_012403_create_settings_table', 8),
(13, '2023_07_19_004251_add_order_position_to_appointments_table', 9);

-- --------------------------------------------------------

--
-- Struktur dari tabel `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `settings`
--

CREATE TABLE `settings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `site_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `site_email` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `site_title` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `footer_text` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sidebar_collapse` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `settings`
--

INSERT INTO `settings` (`id`, `site_name`, `site_email`, `site_title`, `footer_text`, `sidebar_collapse`, `created_at`, `updated_at`) VALUES
(1, 'S.A.M', 'ubaedasam@gmail.com', 'Velzon', 'Test Setting', 1, NULL, '2023-07-17 20:02:46');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `two_factor_secret` text COLLATE utf8mb4_unicode_ci,
  `two_factor_recovery_codes` text COLLATE utf8mb4_unicode_ci,
  `two_factor_confirmed_at` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `avatar` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `role` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'user'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `two_factor_secret`, `two_factor_recovery_codes`, `two_factor_confirmed_at`, `remember_token`, `created_at`, `updated_at`, `avatar`, `role`) VALUES
(3, 'Jaka edit', 'jaka@gmail.comada', NULL, '$2y$10$wlhTRUutEyfSJIn5SIBCVObnHR2f5UYXTPhmw/alXAHd373ZzMnai', NULL, NULL, NULL, NULL, '2023-07-06 00:28:53', '2023-07-06 01:06:18', NULL, 'user'),
(4, 'Brian O Conners', 'brian@gmail.com', NULL, '$2y$10$f4O/9kPLXu3zCjgBufWheeq73oxC29uDnuduiQ4CA18SHoTSqdM2W', NULL, NULL, NULL, NULL, '2023-07-06 01:07:26', '2023-07-17 22:11:54', NULL, 'admin'),
(5, 'Ubaed Shibghahtallah Ashri Muharam', 'ubaedasam2@gmail.com', NULL, '$2y$10$8n6yh855A4ED3AIhb07L9OBSPWtGnDgSe9iPJS3EwdpVfsw0.YP1u', NULL, NULL, NULL, NULL, '2023-07-08 02:59:22', '2023-07-08 02:59:22', '4wUVTTGmbtloOnykkZ6y7lRgOz4zgUQrRykhhi7V.jpg', 'user'),
(6, 'Uknown', 'ukown@gmail.com', NULL, '$2y$10$G2z28ixvE73P43qCcQujj.ehCq7C8tfFEWI1cOsfg30yGGyxL0EL2', NULL, NULL, NULL, NULL, '2023-07-08 03:10:42', '2023-07-08 04:06:56', 'e7Y6QtdGltMV1xLj8LGCCErgtdcm2pP3dd1F46JX.jpg', 'user'),
(7, 'Uknown 2', 'ukonwowo@gmail.com', NULL, '$2y$10$0DAy2Dq1V2TakFRFUT0EtOhYfhiMF9tps8w8cI6.Ev9eJ0Wx0WPEC', NULL, NULL, NULL, NULL, '2023-07-08 03:21:04', '2023-07-08 03:21:04', NULL, 'user'),
(8, 'Bisma', 'bisma@gmail.com', NULL, '$2y$10$e8lMFyVdPyy//PYawbMFOu5Qpa0LW95SC8nLlqP6fU3lahuj.r8W2', NULL, NULL, NULL, NULL, '2023-07-08 03:27:26', '2023-07-09 21:30:23', NULL, 'admin'),
(9, 'Bismaaa', 'contoh8372@gmail.com', NULL, '$2y$10$7RT48Htq.59dnBHuj.f.A.QbfGElKMdkT544ou75tPy6sIZr1zrUO', NULL, NULL, NULL, NULL, '2023-07-08 03:31:09', '2023-07-08 04:07:24', 'aGpkexKtUCaFj92MFrfhGmve27b4aZDY3rFyH8SW.jpg', 'user'),
(10, 'Sutejo baru', 'barusutejo@gmail.com', NULL, '$2y$10$LsRBM8ScEsmI9k4BnxUCXObl7/W/vUPfqgPwwIBaGOROkXxAlP.tS', NULL, NULL, NULL, NULL, '2023-07-08 04:41:02', '2023-07-08 04:41:02', 'V8zOXPUzTX4mf1YGq69rHwgverSIaObONUkfIYe2.jpg', 'user'),
(11, 'ubaed', 'ubaedasam@gmail.com', NULL, '$2y$10$BpHzv1crYGlHJ6XhPiH5.OrPjjZjsH9tApYiDixLKKWjnNokGMGei', NULL, NULL, NULL, NULL, '2023-07-09 21:05:00', '2023-07-10 02:32:06', 'L9bXdcyNlKQFO0tCh9hRGPJuT0izUec9j436PsjO.jpg', 'admin'),
(12, 'uknown ya', 'uknpownadn@gmail.com', NULL, '$2y$10$QK4XsPB1s4zUmc/7TpaOhuLUPhyORhHf5/Al36vDOITuVKaVM34UW', NULL, NULL, NULL, NULL, NULL, '2023-07-19 00:27:43', 'hb5Vg2PqNrOtZOm8D2lmtHlZucQywekLDPorOarY.jpg', 'user');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `appointments`
--
ALTER TABLE `appointments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `appointments_client_id_foreign` (`client_id`);

--
-- Indeks untuk tabel `clients`
--
ALTER TABLE `clients`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indeks untuk tabel `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indeks untuk tabel `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `appointments`
--
ALTER TABLE `appointments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT untuk tabel `clients`
--
ALTER TABLE `clients`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT untuk tabel `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `settings`
--
ALTER TABLE `settings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `appointments`
--
ALTER TABLE `appointments`
  ADD CONSTRAINT `appointments_client_id_foreign` FOREIGN KEY (`client_id`) REFERENCES `clients` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
