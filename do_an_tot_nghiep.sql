-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th4 20, 2022 lúc 01:50 PM
-- Phiên bản máy phục vụ: 10.4.21-MariaDB
-- Phiên bản PHP: 8.0.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `do_an_tot_nghiep`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `classmates`
--

CREATE TABLE `classmates` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `major_id` bigint(20) UNSIGNED NOT NULL,
  `number` int(20) DEFAULT NULL,
  `information` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `classmates`
--

INSERT INTO `classmates` (`id`, `name`, `image`, `major_id`, `number`, `information`, `created_at`, `updated_at`) VALUES
(1, 'PHP3', NULL, 1, 4, 'Hê hê', '2022-04-17 06:14:48', '2022-04-17 06:14:48');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `classmate_tutors`
--

CREATE TABLE `classmate_tutors` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `information` varchar(255) DEFAULT NULL,
  `link` varchar(255) DEFAULT NULL,
  `date` varchar(255) DEFAULT NULL,
  `start_time` varchar(255) DEFAULT NULL,
  `end_time` varchar(255) DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `classmate_id` bigint(20) UNSIGNED NOT NULL,
  `votes` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `classmate_tutors`
--

INSERT INTO `classmate_tutors` (`id`, `name`, `information`, `link`, `date`, `start_time`, `end_time`, `user_id`, `classmate_id`, `votes`, `created_at`, `updated_at`) VALUES
(9, 'Nguyễn Thế Anh', 'không học thì đi', 'chưa có', '2022-04-21', '18:34', '18:33', 8, 1, NULL, '2022-04-20 11:29:54', '2022-04-20 11:31:17'),
(11, 'Nguyễn Thế Anh', 'không học thì đi', 'https://meet.google.com/ccu-kygs-yaf', '2022-04-20', '22:31', '23:36', 8, 1, NULL, '2022-04-20 11:31:49', '2022-04-20 11:31:49');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `departments`
--

CREATE TABLE `departments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `information` varchar(255) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `departments`
--

INSERT INTO `departments` (`id`, `name`, `information`, `image`, `created_at`, `updated_at`) VALUES
(1, 'CNTT', 'Công nghệ thông tin', NULL, '2022-04-16 18:49:11', '2022-04-16 18:49:27'),
(2, 'QTKD', 'Quản trị kinh doanh', NULL, '2022-04-16 18:50:32', '2022-04-16 18:50:32'),
(3, 'TMLD', 'Thẩm mỹ làm đẹp', NULL, '2022-04-16 18:50:58', '2022-04-16 18:50:58'),
(4, 'CNKTDK & TDH', 'Công nghệ kĩ thuật điều khiển và tự động hóa', NULL, '2022-04-16 18:52:00', '2022-04-16 18:52:00');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `list_students`
--

CREATE TABLE `list_students` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `classmatetutor_id` bigint(20) UNSIGNED NOT NULL,
  `action_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `list_students`
--

INSERT INTO `list_students` (`id`, `user_id`, `classmatetutor_id`, `action_id`, `created_at`, `updated_at`) VALUES
(5, 9, 9, NULL, '2022-04-20 11:32:13', '2022-04-20 11:32:13'),
(6, 9, 11, NULL, '2022-04-20 11:43:57', '2022-04-20 11:43:57');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `majors`
--

CREATE TABLE `majors` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `department_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `majors`
--

INSERT INTO `majors` (`id`, `name`, `image`, `department_id`, `created_at`, `updated_at`) VALUES
(1, 'Thiết kế website', NULL, 1, '2022-04-17 06:12:07', '2022-04-17 06:12:07');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `confirm_password` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `provider` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `provider_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `avatar` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gender` int(20) DEFAULT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` int(20) DEFAULT NULL,
  `birth_date` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_login` timestamp NULL DEFAULT NULL,
  `role` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'USR',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `confirm_password`, `provider`, `provider_id`, `avatar`, `gender`, `address`, `phone`, `birth_date`, `last_login`, `role`, `remember_token`, `created_at`, `updated_at`) VALUES
(7, 'Nguyen The Anh (FPL HN)', 'anhntph11659@fpt.edu.vn', NULL, NULL, NULL, 'google', '118075497884680436099', 'https://lh3.googleusercontent.com/a-/AOh14GgftLMdEwC653WxWgeX37bcJ80yzAoKFV_MWnCR=s96-c', NULL, NULL, NULL, NULL, '2022-04-20 11:05:31', 'ADM', NULL, '2022-04-20 11:04:16', '2022-04-20 11:05:31'),
(8, 'Nguyễn Thế Anh', 'tutor1@gmail.com', NULL, '$2y$10$w1WiZmU7zlRyZ75KmEtwYe4Wk2tCQhB6SAex7XcdrmFvOYi0l5q0W', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-04-20 11:18:31', 'TT', NULL, '2022-04-20 11:14:52', '2022-04-20 11:18:31'),
(9, 'Nguyễn Thế Anh', 'user1@gmail.com', NULL, '$2y$10$VpwqXhG0ke8PpE8BkDBZ1.WdLNAvFTWFcvs/uaYyntSpDmQnZiTvm', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-04-20 11:32:03', 'USR', NULL, '2022-04-20 11:15:10', '2022-04-20 11:32:03');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `classmates`
--
ALTER TABLE `classmates`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_classmates_major` (`major_id`);

--
-- Chỉ mục cho bảng `classmate_tutors`
--
ALTER TABLE `classmate_tutors`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_classmatetutor_classmate` (`classmate_id`),
  ADD KEY `FK_classmatetutor_tutor` (`user_id`);

--
-- Chỉ mục cho bảng `departments`
--
ALTER TABLE `departments`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Chỉ mục cho bảng `list_students`
--
ALTER TABLE `list_students`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_liststudent_classmatetutor` (`classmatetutor_id`),
  ADD KEY `FK_liststudent_user` (`user_id`);

--
-- Chỉ mục cho bảng `majors`
--
ALTER TABLE `majors`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_major_department` (`department_id`);

--
-- Chỉ mục cho bảng `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Chỉ mục cho bảng `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `classmates`
--
ALTER TABLE `classmates`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `classmate_tutors`
--
ALTER TABLE `classmate_tutors`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT cho bảng `departments`
--
ALTER TABLE `departments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT cho bảng `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `list_students`
--
ALTER TABLE `list_students`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT cho bảng `majors`
--
ALTER TABLE `majors`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `classmates`
--
ALTER TABLE `classmates`
  ADD CONSTRAINT `FK_classmates_major` FOREIGN KEY (`major_id`) REFERENCES `majors` (`id`);

--
-- Các ràng buộc cho bảng `classmate_tutors`
--
ALTER TABLE `classmate_tutors`
  ADD CONSTRAINT `FK_classmatetutor_classmate` FOREIGN KEY (`classmate_id`) REFERENCES `classmates` (`id`),
  ADD CONSTRAINT `FK_classmatetutor_user` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Các ràng buộc cho bảng `list_students`
--
ALTER TABLE `list_students`
  ADD CONSTRAINT `FK_liststudent_classmatetutor` FOREIGN KEY (`classmatetutor_id`) REFERENCES `classmate_tutors` (`id`),
  ADD CONSTRAINT `FK_liststudent_user` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Các ràng buộc cho bảng `majors`
--
ALTER TABLE `majors`
  ADD CONSTRAINT `FK_major_department` FOREIGN KEY (`department_id`) REFERENCES `departments` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
