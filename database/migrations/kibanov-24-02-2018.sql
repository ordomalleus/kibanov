-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1
-- Время создания: Фев 26 2018 г., 18:51
-- Версия сервера: 10.1.25-MariaDB
-- Версия PHP: 7.1.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `kibanov`
--

-- --------------------------------------------------------

--
-- Структура таблицы `attributes_directories`
--

CREATE TABLE `attributes_directories` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп данных таблицы `attributes_directories`
--

INSERT INTO `attributes_directories` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Размер', '2018-02-08 19:00:00', '2018-02-08 19:00:00'),
(2, 'тестовый атрибут Цвет', '2018-02-12 13:51:47', '2018-02-12 13:51:47'),
(3, 'тестовый атрибут размер', '2018-02-12 13:52:04', '2018-02-12 13:52:04');

-- --------------------------------------------------------

--
-- Структура таблицы `attributes_directory_values`
--

CREATE TABLE `attributes_directory_values` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `type` varchar(256) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп данных таблицы `attributes_directory_values`
--

INSERT INTO `attributes_directory_values` (`id`, `name`, `type`, `created_at`, `updated_at`) VALUES
(5, 'XXL', 'Размер', '2018-02-12 14:12:38', '2018-02-12 14:12:38'),
(6, 'Красный', 'Цвет', '2018-02-12 14:12:46', '2018-02-12 14:12:46'),
(7, 'тестовый полная', 'Полнота', '2018-02-12 14:13:03', '2018-02-12 14:13:03'),
(8, 'Тестовый зеленый', 'Цвет', '2018-02-12 14:13:12', '2018-02-12 14:13:12'),
(9, 'Тестовый белый', 'Цвет', '2018-02-12 14:13:20', '2018-02-12 14:13:20'),
(10, 'XL', 'Размер', '2018-02-12 14:13:28', '2018-02-12 14:13:28'),
(11, '25', 'Размер', '2018-02-12 14:13:33', '2018-02-12 14:13:33'),
(12, '24', 'Размер', '2018-02-12 14:13:38', '2018-02-12 14:13:38'),
(13, '23', 'Размер', '2018-02-12 14:13:42', '2018-02-12 14:13:42'),
(14, 'M', 'Размер', '2018-02-12 14:13:59', '2018-02-12 14:13:59'),
(15, 'Тестовый малая', 'Полнота', '2018-02-12 14:14:10', '2018-02-12 14:14:10'),
(16, 'белый', 'Цвет', '2018-02-14 13:57:05', '2018-02-14 13:57:05'),
(17, 'зеленый', 'Цвет', '2018-02-14 13:57:10', '2018-02-14 13:57:10');

-- --------------------------------------------------------

--
-- Структура таблицы `categories`
--

CREATE TABLE `categories` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `parent_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп данных таблицы `categories`
--

INSERT INTO `categories` (`id`, `name`, `parent_id`, `created_at`, `updated_at`) VALUES
(10, 'test9', NULL, '2018-02-05 16:32:05', '2018-02-05 16:32:05'),
(11, '123', NULL, '2018-02-08 13:01:23', '2018-02-08 13:01:23'),
(13, 'впвап', NULL, '2018-02-08 13:05:20', '2018-02-08 13:05:20'),
(14, 'ываываыв', 0, '2018-02-08 13:05:25', '2018-02-08 13:05:25');

-- --------------------------------------------------------

--
-- Структура таблицы `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп данных таблицы `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(4, '2018_02_12_100000_create_products_table', 2),
(5, '2018_02_05_194205_create_categories_table', 3),
(6, '2018_02_08_200057_create_attributes_directories_table', 4),
(7, '2018_02_08_200454_create_attributes_directory_values_table', 4),
(9, '2018_02_12_193328_create_product_group_attributes_table', 5),
(10, '2018_02_12_193930_create_product_group_attributes_values_table', 6),
(11, '2018_02_14_195914_create_product_attributes_table', 7);

-- --------------------------------------------------------

--
-- Структура таблицы `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `products`
--

CREATE TABLE `products` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `category_id` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `img_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `show` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп данных таблицы `products`
--

INSERT INTO `products` (`id`, `name`, `description`, `category_id`, `price`, `img_name`, `show`, `created_at`, `updated_at`) VALUES
(3, '123123', '12312313', 10, 123, '1517948281_general-section-2-bal-1.jpg', 1, '2018-02-06 15:18:01', '2018-02-19 15:48:20'),
(4, 'тестовый товар', 'фыв фыв йцуй', 9, 111, '1517948815_general-section-8-bal-1.jpg', 1, '2018-02-06 15:26:55', '2018-02-06 15:26:55'),
(5, 'тест 3', 'ывфывфывфы', 1, 333, '1517948855_general-section-2-bal-3.jpg', 1, '2018-02-06 15:27:35', '2018-02-06 15:27:35'),
(6, 'новый товар 08.02.2018', 'новый товар 08.02.2018 новый товар 08.02.2018 новый товар 08.02.2018', 7, 67, '1518032260_general-section-8-bal-1.jpg', 1, '2018-02-07 14:37:40', '2018-02-07 14:37:40'),
(7, '123123', '123123', 10, 123, '1518114102_general-section-7-bal-2.jpg', 1, '2018-02-08 13:21:42', '2018-02-08 13:21:42'),
(8, 'яывпра', 'мммммммм', 10, 567, '1518114234_general-section-1.jpg', 1, '2018-02-08 13:23:54', '2018-02-08 13:23:54'),
(9, 'товар тест 2', 'товар тест 2 аываыва ываыва выаыв', 11, 777, '1518456283_general-section-4-bal-1.jpg', 1, '2018-02-12 12:24:43', '2018-02-12 12:24:43'),
(10, '555', '555', 11, 555555, '1518723456_general-section-5.jpg', 1, '2018-02-14 15:36:10', '2018-02-19 15:31:38');

-- --------------------------------------------------------

--
-- Структура таблицы `product_attributes`
--

CREATE TABLE `product_attributes` (
  `id` int(10) UNSIGNED NOT NULL,
  `product_id` int(11) NOT NULL,
  `product_group_attributes_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп данных таблицы `product_attributes`
--

INSERT INTO `product_attributes` (`id`, `product_id`, `product_group_attributes_id`, `created_at`, `updated_at`) VALUES
(1, 3, 6, '2018-02-20 13:55:46', '2018-02-20 13:55:46'),
(2, 10, 6, '2018-02-20 14:44:21', '2018-02-20 14:44:21'),
(3, 10, 1, '2018-02-20 14:44:27', '2018-02-20 14:44:27'),
(4, 10, 3, '2018-02-20 14:44:33', '2018-02-20 14:44:33'),
(5, 10, 2, '2018-02-20 14:44:51', '2018-02-20 14:44:51'),
(6, 10, 4, '2018-02-20 14:44:57', '2018-02-20 14:44:57'),
(7, 9, 3, '2018-02-20 14:54:36', '2018-02-20 14:54:36'),
(8, 9, 4, '2018-02-20 14:54:40', '2018-02-20 14:54:40'),
(9, 8, 6, '2018-02-20 14:54:55', '2018-02-20 14:54:55'),
(10, 8, 1, '2018-02-20 14:55:26', '2018-02-20 14:55:26'),
(11, 8, 3, '2018-02-20 14:56:21', '2018-02-20 14:56:21');

-- --------------------------------------------------------

--
-- Структура таблицы `product_group_attributes`
--

CREATE TABLE `product_group_attributes` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `attributes_directories_id` int(11) NOT NULL,
  `type` varchar(256) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп данных таблицы `product_group_attributes`
--

INSERT INTO `product_group_attributes` (`id`, `name`, `attributes_directories_id`, `type`, `created_at`, `updated_at`) VALUES
(1, 'тестоый атрибут товара - 1', 1, 'Размер', '2018-02-12 15:14:27', '2018-02-12 15:14:27'),
(2, 'тестоый атрибут товара - 2', 2, 'Цвет', '2018-02-12 15:14:41', '2018-02-12 15:14:41'),
(3, 'test 3', 3, 'Размер', '2018-02-12 15:38:01', '2018-02-12 15:38:01'),
(4, 'test 4', 2, 'Цвет', '2018-02-12 15:38:12', '2018-02-12 15:38:12'),
(6, 'Тестовый атрибут товара цвет (белый, зеленый, красный)', 2, 'Цвет', '2018-02-14 13:56:54', '2018-02-14 13:56:54');

-- --------------------------------------------------------

--
-- Структура таблицы `product_group_attributes_values`
--

CREATE TABLE `product_group_attributes_values` (
  `id` int(10) UNSIGNED NOT NULL,
  `product_group_attributes_id` int(11) NOT NULL,
  `attributes_directory_values_id` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп данных таблицы `product_group_attributes_values`
--

INSERT INTO `product_group_attributes_values` (`id`, `product_group_attributes_id`, `attributes_directory_values_id`, `price`, `created_at`, `updated_at`) VALUES
(1, 6, 16, 10, '2018-02-14 14:27:37', '2018-02-14 14:27:37'),
(2, 1, 10, 0, '2018-02-14 14:40:51', '2018-02-14 14:40:51'),
(3, 1, 5, 1, '2018-02-14 14:40:59', '2018-02-14 14:40:59'),
(4, 6, 17, 5, '2018-02-14 14:41:09', '2018-02-14 14:41:09'),
(5, 6, 6, 20, '2018-02-14 14:41:20', '2018-02-14 14:41:20'),
(6, 3, 13, 10, '2018-02-20 14:55:57', '2018-02-20 14:55:57'),
(7, 3, 12, 20, '2018-02-20 14:56:07', '2018-02-20 14:56:07'),
(8, 3, 11, 30, '2018-02-20 14:56:15', '2018-02-20 14:56:15');

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `admin` tinyint(1) DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `name`, `admin`, `email`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'q', 1, 'q@q.q', '$2y$10$BM9VIzS6xvP1chz8o8GpVeIb4jm3DdkcviwAe3AexXAGMIBE5ZVWe', 'mhCife4VCyiGcqWpLxfsuz53pFMNqkycMQra8rwd8i5XZIfr9PWox1fF7d8Z', '2018-01-30 13:57:56', '2018-01-30 13:57:56');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `attributes_directories`
--
ALTER TABLE `attributes_directories`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `attributes_directory_values`
--
ALTER TABLE `attributes_directory_values`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Индексы таблицы `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `product_attributes`
--
ALTER TABLE `product_attributes`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `product_group_attributes`
--
ALTER TABLE `product_group_attributes`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `product_group_attributes_values`
--
ALTER TABLE `product_group_attributes_values`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `attributes_directories`
--
ALTER TABLE `attributes_directories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT для таблицы `attributes_directory_values`
--
ALTER TABLE `attributes_directory_values`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT для таблицы `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT для таблицы `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT для таблицы `products`
--
ALTER TABLE `products`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT для таблицы `product_attributes`
--
ALTER TABLE `product_attributes`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT для таблицы `product_group_attributes`
--
ALTER TABLE `product_group_attributes`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT для таблицы `product_group_attributes_values`
--
ALTER TABLE `product_group_attributes_values`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
