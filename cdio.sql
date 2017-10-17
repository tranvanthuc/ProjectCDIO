-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Apr 03, 2017 at 09:33 AM
-- Server version: 10.1.19-MariaDB
-- PHP Version: 7.0.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cdio`
--

-- --------------------------------------------------------

--
-- Table structure for table `levels`
--

CREATE TABLE `levels` (
  `id` int(11) NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `levels`
--

INSERT INTO `levels` (`id`, `name`) VALUES
(0, 'Super Admin'),
(1, 'Admin'),
(2, 'Censor'),
(3, 'Member VIP'),
(4, 'Member Normal');

-- --------------------------------------------------------

--
-- Table structure for table `majors`
--

CREATE TABLE `majors` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `majors`
--

INSERT INTO `majors` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Kỹ thuật mạng', NULL, NULL),
(2, 'Công nghệ Phần mềm', NULL, NULL),
(3, 'Thiết kế đồ họa/Game/Multimedia', NULL, NULL),
(4, 'Hệ thống thông tin quản lý', NULL, NULL),
(5, 'Xây Dựng Dân dụng & Công Nghiệp', NULL, NULL),
(6, 'Xây dựng Cầu Đường', NULL, NULL),
(7, 'Công NGhệ quản lý Xây Dựng', NULL, NULL),
(8, 'Kiến trúc công trình', NULL, NULL),
(9, 'Thiết kế nội thất', NULL, NULL),
(10, 'Điện tự động', NULL, NULL),
(11, 'Thiết kế số', NULL, NULL),
(12, 'Điện tử - Viễn thông', NULL, NULL),
(13, 'Công nghệ & kỹ thuật mội trường', NULL, NULL),
(14, 'Công nghệ & quản lý môi trường', NULL, NULL),
(15, 'Công Nghệ Thực phẩm', NULL, NULL),
(16, 'Quản trị Marketing', NULL, NULL),
(17, 'Quản trị Kinh doanh Tổng hợp', NULL, NULL),
(18, 'Ngoại Thương', NULL, NULL),
(19, 'Quản trị Du lịch Khách sạn', NULL, NULL),
(20, 'Quản trị Du lịch Lữ Hành', NULL, NULL),
(21, 'Kinh Doanh Ngoại Thương', NULL, NULL),
(22, 'Tài chính doanh nghiệp', NULL, NULL),
(23, 'Ngân Hàng', NULL, NULL),
(24, 'Kế toán Kiểm Toán', NULL, NULL),
(25, 'Kế toán Doanh Nghiệp', NULL, NULL),
(26, 'Tiếng anh Biên-Phiên dịch', NULL, NULL),
(27, 'Tiếng Anh Du lịch', NULL, NULL),
(28, 'Văn - Báo Chí', NULL, NULL),
(29, 'Quan hệ quốc tế', NULL, NULL),
(30, 'Khác', '2017-04-02 23:05:55', '2017-04-02 23:05:55');

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
(1, '2017_02_09_015055_create_levels_table', 1),
(2, '2017_02_20_121848_create_majors_table', 1),
(3, '2017_03_21_065459_create_subjects_table', 1),
(4, '2017_02_09_015314_create_users_table', 2),
(6, '2017_02_21_085914_create_reports_table', 3),
(7, '2017_03_01_142352_create_social_providers_table', 3),
(8, '2017_02_09_015328_create_news_table', 4);

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE `news` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `desc` text COLLATE utf8mb4_unicode_ci,
  `price` decimal(8,0) NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '0',
  `user_lock` tinyint(4) NOT NULL DEFAULT '0',
  `viewed` int(11) NOT NULL DEFAULT '0',
  `user_id` int(10) UNSIGNED NOT NULL,
  `major_id` int(10) UNSIGNED NOT NULL,
  `subject_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `news`
--

INSERT INTO `news` (`id`, `title`, `slug`, `desc`, `price`, `image`, `status`, `user_lock`, `viewed`, `user_id`, `major_id`, `subject_id`, `created_at`, `updated_at`) VALUES
(1, 'Sach anh Van Chuyen Nganh', 'sach-anh-van-chuyen-nganh', NULL, '10000', '1491103542.jpg', 1, 0, 2, 2, 3, 4, '2017-04-01 20:25:42', '2017-04-02 16:00:53'),
(2, 'Sach anh Van Chuyen Nganh', 'sach-anh-van-chuyen-nganh', NULL, '10000', '1491103745.jpg', 1, 0, 2, 4, 15, 12, '2017-04-01 20:29:05', '2017-04-01 20:41:56'),
(3, 'Sach anh Van Chuyen Nganh tap 3', 'sach-anh-van-chuyen-nganh-tap-3', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has', '10000', '1491171948.jpg', 1, 0, 1, 2, 16, 14, '2017-04-02 15:25:48', '2017-04-02 15:59:38'),
(4, 'Toán Cao Cấp A1', 'toan-cao-cap-a1', NULL, '20000', '1491171986.jpg', 1, 0, 20, 2, 15, 16, '2017-04-02 15:26:26', '2017-04-02 15:59:28'),
(5, 'Tư tưởng Hồ Chí Minh', 'tu-tuong-ho-chi-minh', NULL, '15000', '1491172034.jpg', 1, 0, 0, 2, 7, 15, '2017-04-02 15:27:14', '2017-04-02 15:30:14'),
(6, 'Toán Cao Cấp A2', 'toan-cao-cap-a2', NULL, '17000', '1491172064.jpg', 1, 0, 5, 2, 1, 2, '2017-04-02 15:27:44', '2017-04-02 16:05:59'),
(7, 'Sach Longman Toiec', 'sach-longman-toiec', NULL, '10000', '1491197896.jpg', 1, 0, 2, 4, 2, 27, '2017-04-02 22:38:16', '2017-04-02 23:12:14'),
(8, 'Sách bài tập Tiếng Anh', 'sach-bai-tap-tieng-anh', NULL, '10000', '1491199875.jpg', 1, 0, 1, 2, 2, 15, '2017-04-02 23:11:15', '2017-04-02 23:12:18');

-- --------------------------------------------------------

--
-- Table structure for table `reports`
--

CREATE TABLE `reports` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `content` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `reports`
--

INSERT INTO `reports` (`id`, `user_id`, `content`, `created_at`, `updated_at`) VALUES
(1, 4, 'Added News: Sach Toan Cao Cấp', '2017-04-01 18:31:29', '2017-04-01 18:31:29'),
(2, 4, 'Edited News: Sach Toan Cao Cấp', '2017-04-01 18:32:37', '2017-04-01 18:32:37'),
(3, 2, 'Added News: Sach anh Van Chuyen Nganh', '2017-04-01 20:25:42', '2017-04-01 20:25:42'),
(4, 4, 'Added News: Sach anh Van Chuyen Nganh', '2017-04-01 20:29:06', '2017-04-01 20:29:06'),
(5, 2, 'Added News: Sach anh Van Chuyen Nganh tap...', '2017-04-02 15:25:48', '2017-04-02 15:25:48'),
(6, 2, 'Added News: Toán Cao Cấp A1', '2017-04-02 15:26:26', '2017-04-02 15:26:26'),
(7, 2, 'Added News: Tư tưởng Hồ Chí Minh', '2017-04-02 15:27:14', '2017-04-02 15:27:14'),
(8, 2, 'Added News: Toán Cao Cấp A2', '2017-04-02 15:27:44', '2017-04-02 15:27:44'),
(9, 2, 'Unlocked User News: Sach anh Van Chuyen Nganh tap 3', '2017-04-02 15:28:50', '2017-04-02 15:28:50'),
(10, 2, 'Unlocked User News: Sach anh Van Chuyen Nganh', '2017-04-02 15:28:52', '2017-04-02 15:28:52'),
(11, 2, 'Unlocked User News: Toán Cao Cấp A1', '2017-04-02 15:30:10', '2017-04-02 15:30:10'),
(12, 2, 'Unlocked User News: Tư tưởng Hồ Chí Minh', '2017-04-02 15:30:14', '2017-04-02 15:30:14'),
(13, 2, 'Unlocked User News: Toán Cao Cấp A2', '2017-04-02 15:30:17', '2017-04-02 15:30:17'),
(14, 4, 'Edited User: tranvanthuc', '2017-04-02 22:36:25', '2017-04-02 22:36:25'),
(15, 4, 'Added News: Sach Longman Toiec', '2017-04-02 22:38:16', '2017-04-02 22:38:16'),
(16, 2, 'Added Major: Khác', '2017-04-02 23:05:55', '2017-04-02 23:05:55'),
(17, 2, 'Unlocked News: Sach Longman Toiec', '2017-04-02 23:08:11', '2017-04-02 23:08:11'),
(18, 2, 'Added News: Sách bài tập Tiếng Anh', '2017-04-02 23:11:15', '2017-04-02 23:11:15'),
(19, 2, 'Edited News: Sách bài tập Tiếng Anh', '2017-04-02 23:11:33', '2017-04-02 23:11:33'),
(20, 4, 'Changed password User: tranvanthuc', '2017-04-02 23:58:05', '2017-04-02 23:58:05'),
(21, 4, 'Changed password User: tranvanthuc', '2017-04-03 00:10:11', '2017-04-03 00:10:11'),
(22, 4, 'Changed password User: tranvanthuc', '2017-04-03 00:18:36', '2017-04-03 00:18:36');

-- --------------------------------------------------------

--
-- Table structure for table `social_providers`
--

CREATE TABLE `social_providers` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `provider_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `provider` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `social_providers`
--

INSERT INTO `social_providers` (`id`, `user_id`, `provider_id`, `provider`, `created_at`, `updated_at`) VALUES
(1, 6, '607336289461190', 'facebook', '2017-04-01 18:20:50', '2017-04-01 18:20:50');

-- --------------------------------------------------------

--
-- Table structure for table `subjects`
--

CREATE TABLE `subjects` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `subjects`
--

INSERT INTO `subjects` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Toán Cao Cấp A1', NULL, NULL),
(2, 'Toán Cao Cấp A2', NULL, NULL),
(3, 'Toán rời rạc', NULL, NULL),
(4, 'KTin đại cương', NULL, NULL),
(5, 'Tin ứng dụng', NULL, NULL),
(6, 'Nói và Viết Tiếng Việt', NULL, NULL),
(7, 'Đồ Án CDIO 1', NULL, NULL),
(8, 'C#', NULL, NULL),
(9, 'C', NULL, NULL),
(10, 'C++', NULL, NULL),
(11, 'Java', NULL, NULL),
(12, 'ASP.NET', NULL, NULL),
(13, 'Hệ Quản Trị Cơ Sở Dữ Liệu', NULL, NULL),
(14, 'Lý Thuyết Mạch', NULL, NULL),
(15, 'Văn Học Dân Gian Việt Nam', NULL, NULL),
(16, 'Thể Chế Chính Trị Thế Giới', NULL, NULL),
(17, 'Đồ Án CDIO 2', NULL, NULL),
(18, 'Lý Thuyết Dịch Anh Văn', NULL, NULL),
(19, 'Căn Bản Vi Sinh Học', NULL, NULL),
(20, 'Sinh Học Phân Tử', NULL, NULL),
(21, 'Hệ Thống Thông Tin Địa Lý (GIS)', NULL, NULL),
(22, 'Thuế Nhà Nước', NULL, NULL),
(23, 'Sức Khỏe Môi Trường', NULL, NULL),
(24, 'Hóa Lý Căn Bản', NULL, NULL),
(25, 'Kỹ Thuật Số', NULL, NULL),
(26, 'Dược Học Cổ Truyền', NULL, NULL),
(27, 'Kết Cấu Nhà Thép', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `username` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT 'default.jpg',
  `lock` tinyint(4) NOT NULL DEFAULT '0',
  `level_id` int(11) NOT NULL,
  `major_id` int(10) UNSIGNED DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `name`, `email`, `phone`, `address`, `image`, `lock`, `level_id`, `major_id`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'super', '$2y$10$XjmQ5nGR6gvO/xem59xkYurvq5.Pyi4ULw/OJybqr/pk4nlqhHYye', 'super', '', NULL, NULL, 'default.jpg', 0, 0, NULL, NULL, NULL, NULL),
(2, 'admin', '$2y$10$8Qxqrj9Q897SH1LGtNrm3eTb9k/JZbv7jY8IFFTAV0Em.Ux5IahbO', 'admin', '', NULL, NULL, 'default.jpg', 0, 1, NULL, 'WEW7Va9zx2HHC4kzLc0Z0EJDYmpVC3LdqeaHoDVtU9ymtWFMWGQ4KwJdXPHV', NULL, NULL),
(3, 'thuc', '$2y$10$eXfAbxPkbZTm8C7ZEXpprugOygcOuXGxgBOBNK2raqXfDNqo3jo/6', 'thuc', '', NULL, NULL, 'default.jpg', 0, 2, NULL, NULL, NULL, NULL),
(4, 'tranvanthuc', '$2y$10$hDFsiK4hj2C2/VX2nypsGeTvnd6mXIVTLlGAwzWxmPglJ1mglPozS', 'thuc', 'thuc@gmail.com', '01285136039', '123TT', 'default.jpg', 0, 3, 2, 'rVOiXOXrorzOWiSbwimEmTZl17fnPcxJ7RiCfMbDtDjPtrlKxR3zh17nDZ7T', NULL, '2017-04-03 00:18:36'),
(5, 'thuc365', '$2y$10$ztYwKMjibDs/ZrhIw37.w.X0X8YLy0ukeJ5tZAx4/yHxhiNFRgrMK', 'hung', 'hung@gmail.com', '0993213922', '123ASD', 'default.jpg', 0, 3, 3, NULL, NULL, NULL),
(6, NULL, NULL, 'Trần Văn Thức', 'tranvanthuc365@gmail.com', NULL, NULL, 'https://graph.facebook.com/v2.8/607336289461190/picture?width=1920', 0, 4, NULL, 'EMej8fjxnhokO1aMjPC2oBTuesimn8OGYgzNLcKuT5Pkttejh5npqiwLRvyk', '2017-04-01 18:20:50', '2017-04-01 18:20:50'),
(7, 'nobitran', '$2y$10$osJ8xfJhe6h2X4muoEFGNeEvbZKobkJUmIQ7UbbzHVEyf//bw8YlG', 'Tran Van Thuc', 'nobitran@gmail.com', NULL, NULL, 'default.jpg', 0, 4, NULL, NULL, '2017-04-01 18:44:30', '2017-04-01 18:44:30'),
(8, 'nobitran365', '$2y$10$z8BB2EdI3zfSWLIDlQEjAO6EZtlCcWlhHFf1qXNxsJBDWDD.Dpknm', 'Tran Van Thuc', 'nobitran365@gmail.com', NULL, NULL, 'default.jpg', 0, 4, NULL, NULL, '2017-04-01 18:47:03', '2017-04-01 18:47:03'),
(9, 'minhtoan', '$2y$10$ObW9EDYPj27TIC9ynmvcjO1IqwmLIFsutV7xM1giPA05itNaSQuly', 'minh toan', 'minhtoan@gmail.com', NULL, NULL, 'default.jpg', 0, 4, NULL, NULL, '2017-04-01 19:42:29', '2017-04-01 19:42:29'),
(10, 'minhtoan1', '$2y$10$4nsGmaWusFhz8CqNYAp7Yef1hxD8cuomyNTNZLulOsG5wrxbLHpMi', 'minh toan', 'minhtoan1@gmail.com', NULL, NULL, 'default.jpg', 0, 4, NULL, 'ONiI1IseYoSgBXmbvU8LChd2b89vlhPGeow9fUcFuExlFcnTXH6DJMoAlYYz', '2017-04-01 19:43:14', '2017-04-01 19:43:14');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `levels`
--
ALTER TABLE `levels`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `majors`
--
ALTER TABLE `majors`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id`),
  ADD KEY `news_user_id_foreign` (`user_id`),
  ADD KEY `news_major_id_foreign` (`major_id`),
  ADD KEY `news_subject_id_foreign` (`subject_id`);

--
-- Indexes for table `reports`
--
ALTER TABLE `reports`
  ADD PRIMARY KEY (`id`),
  ADD KEY `reports_user_id_foreign` (`user_id`);

--
-- Indexes for table `social_providers`
--
ALTER TABLE `social_providers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subjects`
--
ALTER TABLE `subjects`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_username_unique` (`username`),
  ADD KEY `users_level_id_foreign` (`level_id`),
  ADD KEY `users_major_id_foreign` (`major_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `majors`
--
ALTER TABLE `majors`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;
--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `news`
--
ALTER TABLE `news`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `reports`
--
ALTER TABLE `reports`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
--
-- AUTO_INCREMENT for table `social_providers`
--
ALTER TABLE `social_providers`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `subjects`
--
ALTER TABLE `subjects`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `news`
--
ALTER TABLE `news`
  ADD CONSTRAINT `news_major_id_foreign` FOREIGN KEY (`major_id`) REFERENCES `majors` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `news_subject_id_foreign` FOREIGN KEY (`subject_id`) REFERENCES `subjects` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `news_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `reports`
--
ALTER TABLE `reports`
  ADD CONSTRAINT `reports_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_level_id_foreign` FOREIGN KEY (`level_id`) REFERENCES `levels` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `users_major_id_foreign` FOREIGN KEY (`major_id`) REFERENCES `majors` (`id`) ON DELETE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
