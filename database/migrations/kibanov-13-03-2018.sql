-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1
-- Время создания: Мар 12 2018 г., 21:54
-- Версия сервера: 10.1.28-MariaDB
-- Версия PHP: 7.1.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `niver-kibanov`
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
(5, 'Размер обуви', '2018-02-28 07:29:54', '2018-02-28 07:30:53'),
(6, 'Цвет', '2018-02-28 07:30:05', '2018-02-28 07:30:47'),
(7, 'Размер одежды', '2018-02-28 07:30:17', '2018-02-28 07:31:02'),
(9, 'Полнота обуви', '2018-02-28 08:26:21', '2018-03-01 14:18:59'),
(10, 'Жескость стельки', '2018-03-01 14:11:52', '2018-03-01 14:19:04');

-- --------------------------------------------------------

--
-- Структура таблицы `attributes_directory_values`
--

CREATE TABLE `attributes_directory_values` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `value` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `type` varchar(256) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп данных таблицы `attributes_directory_values`
--

INSERT INTO `attributes_directory_values` (`id`, `name`, `value`, `type`, `created_at`, `updated_at`) VALUES
(5, 'XXL', NULL, 'Размер', '2018-02-12 14:12:38', '2018-02-28 04:42:51'),
(8, 'зеленый', 'green', 'Цвет', '2018-02-12 14:13:12', '2018-03-01 14:10:37'),
(9, 'белый', '#fff', 'Цвет', '2018-02-12 14:13:20', '2018-02-28 08:24:52'),
(10, 'XL', NULL, 'Размер', '2018-02-12 14:13:28', '2018-02-12 14:13:28'),
(11, '25', NULL, 'Размер', '2018-02-12 14:13:33', '2018-02-12 14:13:33'),
(12, '24', NULL, 'Размер', '2018-02-12 14:13:38', '2018-02-12 14:13:38'),
(13, '23', NULL, 'Размер', '2018-02-12 14:13:42', '2018-02-12 14:13:42'),
(14, 'M', NULL, 'Размер', '2018-02-12 14:13:59', '2018-02-12 14:13:59'),
(16, 'синий', 'blue', 'Цвет', '2018-02-14 13:57:05', '2018-02-28 08:24:58'),
(17, 'черный', '#000', 'Цвет', '2018-02-14 13:57:10', '2018-02-28 08:25:05'),
(19, 'Средняя', NULL, 'Полнота', '2018-03-01 14:11:21', '2018-03-12 01:15:54'),
(20, 'Широкая', NULL, 'Полнота', '2018-03-01 14:11:28', '2018-03-12 01:16:00'),
(21, 'Средняя', NULL, 'Жесткость', '2018-03-01 14:14:25', '2018-03-11 08:30:06'),
(22, 'бежевый', '#00f', 'Цвет', '2018-03-05 08:03:18', '2018-03-10 15:07:27'),
(23, '26', NULL, 'Размер', '2018-03-11 08:55:39', '2018-03-11 08:55:39'),
(24, '27', NULL, 'Размер', '2018-03-11 08:55:45', '2018-03-11 08:55:45'),
(25, '28', NULL, 'Размер', '2018-03-11 08:55:50', '2018-03-11 08:55:50'),
(26, '29', NULL, 'Размер', '2018-03-11 08:55:55', '2018-03-11 08:55:55'),
(27, '30', NULL, 'Размер', '2018-03-11 08:56:00', '2018-03-11 08:56:00'),
(28, 'S', NULL, 'Размер', '2018-03-11 08:56:44', '2018-03-11 08:56:44'),
(29, 'SL', NULL, 'Размер', '2018-03-11 08:56:53', '2018-03-11 08:56:53');

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
(15, 'Обувь для танца и гимнастики', NULL, '2018-03-01 13:53:30', '2018-03-01 13:53:30'),
(16, 'Пуанты', 0, '2018-03-01 13:53:52', '2018-03-01 13:53:52'),
(17, 'Мягкая балетная обувь', 0, '2018-03-01 13:54:10', '2018-03-01 13:54:10'),
(18, 'Джазовая обувь', 0, '2018-03-01 13:54:26', '2018-03-01 13:54:26'),
(19, 'Обувь для бальных танцев', 0, '2018-03-01 13:54:50', '2018-03-01 13:54:50'),
(20, 'Аксессуары', NULL, '2018-03-01 15:03:36', '2018-03-01 15:03:36'),
(21, 'Аксессуары для танцоров', 5, '2018-03-01 15:04:20', '2018-03-01 15:04:20');

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
  `description` text COLLATE utf8_unicode_ci NOT NULL,
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
(11, 'Балетки для танцев МБО', 'Lorem ipsum — dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat.', 19, 410, '1519930769_general-section-2-bal-4.jpg', 1, '2018-03-01 13:58:32', '2018-03-01 13:59:29'),
(12, 'Босоножки бальные женские', 'Lorem ipsum — dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat.', 19, 500, '1519931050_general-section-2-bal-3.jpg', 1, '2018-03-01 14:04:10', '2018-03-01 14:04:10'),
(13, 'Джазовые ботинки текстильные', 'Lorem ipsum — dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat.', 18, 750, '1519931272_general-section-4-bal-2.jpg', 1, '2018-03-01 14:07:52', '2018-03-01 14:07:52'),
(14, 'Джазовые полуботинки', 'Lorem ipsum — dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat.', 18, 600, '1519931315_general-section-4-bal-1.jpg', 1, '2018-03-01 14:08:35', '2018-03-01 14:08:35'),
(15, 'Повязки', 'Lorem ipsum — dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat.', 21, 200, '1519934725_general-section-7-bal-1.jpg', 1, '2018-03-01 15:05:25', '2018-03-01 15:05:25'),
(16, 'Мешочек', 'Lorem ipsum — dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat.', 21, 100, '1519934751_general-section-7-bal-2.jpg', 1, '2018-03-01 15:05:51', '2018-03-01 15:05:51');

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
(21, 11, 10, '2018-03-01 14:28:30', '2018-03-01 14:28:30'),
(22, 11, 13, '2018-03-01 14:28:35', '2018-03-01 14:28:35'),
(23, 11, 14, '2018-03-01 14:28:52', '2018-03-01 14:28:52'),
(24, 11, 17, '2018-03-01 14:29:36', '2018-03-01 14:29:36'),
(25, 12, 18, '2018-03-01 14:29:53', '2018-03-01 14:29:53'),
(26, 12, 10, '2018-03-01 14:29:57', '2018-03-01 14:29:57'),
(27, 12, 13, '2018-03-01 14:30:08', '2018-03-01 14:30:08'),
(28, 13, 18, '2018-03-01 14:30:21', '2018-03-01 14:30:21'),
(29, 13, 9, '2018-03-01 14:30:33', '2018-03-01 14:30:33'),
(30, 13, 15, '2018-03-01 14:30:40', '2018-03-01 14:30:40'),
(31, 14, 17, '2018-03-01 14:53:49', '2018-03-01 14:53:49'),
(32, 14, 10, '2018-03-01 14:53:59', '2018-03-01 14:53:59'),
(33, 14, 9, '2018-03-01 14:54:04', '2018-03-01 14:54:04'),
(34, 11, 9, '2018-03-11 08:31:59', '2018-03-11 08:31:59');

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
(9, 'Размер одежды мужской', 7, 'Размер', '2018-02-28 07:31:29', '2018-02-28 07:31:29'),
(10, 'Размер обуви женской', 5, 'Размер', '2018-02-28 07:32:28', '2018-02-28 07:32:28'),
(12, 'Цвет одежды пиджаков', 6, 'Цвет', '2018-02-28 08:24:25', '2018-02-28 08:24:25'),
(13, 'Полнота женских туфель', 9, 'Полнота', '2018-02-28 08:26:37', '2018-02-28 08:26:37'),
(14, 'Жескость стельки женской', 10, 'Жесткость', '2018-03-01 14:23:05', '2018-03-01 14:23:05'),
(15, 'Полнота мужских туфель', 9, 'Полнота', '2018-03-01 14:24:12', '2018-03-01 14:24:12'),
(17, 'Цвет - зеленый - белый - синий', 6, 'Цвет', '2018-03-01 14:26:46', '2018-03-01 14:26:46'),
(18, 'Цвет - белый - черный', 6, 'Цвет', '2018-03-01 14:27:43', '2018-03-01 14:27:43'),
(19, 'Тестовый атрибут', 6, 'Цвет', '2018-03-05 08:02:43', '2018-03-05 08:02:43');

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
(15, 9, 5, 100, '2018-02-28 07:31:47', '2018-02-28 07:31:47'),
(16, 9, 10, 50, '2018-02-28 07:31:56', '2018-02-28 07:31:56'),
(17, 9, 14, 0, '2018-02-28 07:32:06', '2018-02-28 07:32:06'),
(18, 10, 13, 0, '2018-02-28 07:32:36', '2018-02-28 07:32:36'),
(19, 10, 12, 20, '2018-02-28 07:32:44', '2018-02-28 07:32:44'),
(20, 10, 11, 30, '2018-02-28 07:32:57', '2018-02-28 07:32:57'),
(26, 12, 8, 20, '2018-03-01 14:15:25', '2018-03-01 14:15:25'),
(27, 12, 9, 0, '2018-03-01 14:15:32', '2018-03-01 14:15:32'),
(28, 12, 16, 30, '2018-03-01 14:15:42', '2018-03-01 14:15:42'),
(29, 12, 17, 0, '2018-03-01 14:15:50', '2018-03-01 14:15:50'),
(31, 13, 19, 0, '2018-03-01 14:21:24', '2018-03-01 14:21:24'),
(33, 15, 19, 10, '2018-03-01 14:24:26', '2018-03-01 14:24:26'),
(34, 15, 20, 0, '2018-03-01 14:24:37', '2018-03-01 14:24:37'),
(35, 17, 8, 0, '2018-03-01 14:26:54', '2018-03-01 14:26:54'),
(36, 17, 9, 10, '2018-03-01 14:27:05', '2018-03-01 14:27:05'),
(37, 17, 16, 30, '2018-03-01 14:27:18', '2018-03-01 14:27:18'),
(38, 18, 9, 0, '2018-03-01 14:27:53', '2018-03-01 14:27:53'),
(39, 18, 17, 0, '2018-03-01 14:28:00', '2018-03-01 14:28:00'),
(40, 14, 21, 0, '2018-03-01 14:29:12', '2018-03-01 14:29:12'),
(41, 10, 23, 1, '2018-03-11 08:57:43', '2018-03-11 08:57:43'),
(42, 10, 24, 2, '2018-03-11 08:57:55', '2018-03-11 08:57:55'),
(43, 10, 25, 3, '2018-03-11 08:58:03', '2018-03-11 08:58:03'),
(44, 10, 26, 3, '2018-03-11 08:58:30', '2018-03-11 08:58:30'),
(45, 10, 27, 4, '2018-03-11 08:58:38', '2018-03-11 08:58:38'),
(46, 9, 28, 22, '2018-03-11 08:59:52', '2018-03-11 08:59:52'),
(47, 9, 29, 34, '2018-03-11 09:00:07', '2018-03-11 09:00:07'),
(48, 13, 20, 5, '2018-03-11 16:31:13', '2018-03-11 16:31:13');

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
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT для таблицы `attributes_directory_values`
--
ALTER TABLE `attributes_directory_values`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT для таблицы `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT для таблицы `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT для таблицы `products`
--
ALTER TABLE `products`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT для таблицы `product_attributes`
--
ALTER TABLE `product_attributes`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT для таблицы `product_group_attributes`
--
ALTER TABLE `product_group_attributes`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT для таблицы `product_group_attributes_values`
--
ALTER TABLE `product_group_attributes_values`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
