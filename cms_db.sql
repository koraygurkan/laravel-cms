-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Anamakine: localhost:3306
-- Üretim Zamanı: 21 May 2024, 17:45:03
-- Sunucu sürümü: 5.5.68-MariaDB
-- PHP Sürümü: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Veritabanı: `cms_db`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `abouts`
--

CREATE TABLE `abouts` (
  `id` int(11) NOT NULL,
  `about_image` varchar(255) DEFAULT NULL,
  `about_video` varchar(255) DEFAULT NULL,
  `about_slug` varchar(255) DEFAULT NULL,
  `about_title` varchar(255) DEFAULT NULL,
  `about_content` varchar(255) DEFAULT NULL,
  `about_must` int(11) DEFAULT NULL,
  `about_status` enum('0','1') NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `abouts`
--

INSERT INTO `abouts` (`id`, `about_image`, `about_video`, `about_slug`, `about_title`, `about_content`, `about_must`, `about_status`, `created_at`, `updated_at`) VALUES
(2, '664cfb28d2e05.jpg', '664d008679760.mp4', 'test-2', 'Title 2 Koray', '<p>Content İ&ccedil;erik 2 2 2</p>', 1, '1', NULL, '2024-05-22 00:13:58'),
(20, '664d06c0c2074.png', '664d06860a6bd.mp4', 'test-1', 'Test 1', '<p>Test 1</p>', 1, '1', NULL, '2024-05-22 00:40:32'),
(21, '664cfb6b374ea.png', '664d051b2c36d.mp4', 'distinctio-ipsa-au', 'Test 4', '<p>Test 4 icardi</p>', 0, '1', '2024-01-04 15:43:31', '2024-05-22 00:33:31'),
(23, '664d06fa2aa51.png', '664d06fa2c4ab.mp4', 'hakkimizda', 'hakkimizda', '<p>hakkimizda&nbsp;hakkimizda</p>', NULL, '1', NULL, NULL);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `blogs`
--

CREATE TABLE `blogs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `blog_title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `blog_slug` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `blog_file` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `blog_must` int(11) DEFAULT NULL,
  `blog_content` text COLLATE utf8mb4_unicode_ci,
  `blog_status` enum('0','1') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Tablo döküm verisi `blogs`
--

INSERT INTO `blogs` (`id`, `created_at`, `updated_at`, `blog_title`, `blog_slug`, `blog_file`, `blog_must`, `blog_content`, `blog_status`) VALUES
(1, '2023-11-01 15:19:09', '2023-12-17 23:38:58', 'Blog Title 01', 'blog-title-01', '654890223fc96.png', 0, '<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>', '1'),
(2, '2023-11-02 15:19:15', '2023-12-17 23:38:58', 'Blog Title 02', 'blog-title-02', '6548902b112c3.png', 1, '<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>', '1'),
(3, '2023-11-03 15:19:19', '2024-05-22 00:15:43', 'Blog Title 03', 'blog-title-03', '664d00efe637f.png', 2, '<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>', '1'),
(4, '2023-11-04 15:19:22', '2023-12-17 23:38:58', 'Blog Title 04', 'blog-title-04', '65489037f0155.png', 3, '<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>', '1'),
(5, '2023-11-05 16:19:26', '2023-12-17 23:38:58', 'Blog Title 05', 'blog-title-05', '6548903e4a6d2.png', 4, '<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>', '1'),
(6, '2023-11-05 16:19:50', '2023-12-17 23:38:58', 'Blog Title 06', 'blog-title-06', '65489045ced61.png', 5, '<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>', '1');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `contacts`
--

CREATE TABLE `contacts` (
  `id` int(11) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `contact_ad` varchar(255) NOT NULL,
  `contact_email` varchar(255) NOT NULL,
  `contact_phone` varchar(33) DEFAULT NULL,
  `contact_mesaj` varchar(999) NOT NULL,
  `contact_must` int(11) DEFAULT NULL,
  `contact_status` enum('0','1') NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `contacts`
--

INSERT INTO `contacts` (`id`, `created_at`, `updated_at`, `contact_ad`, `contact_email`, `contact_phone`, `contact_mesaj`, `contact_must`, `contact_status`) VALUES
(1, NULL, NULL, 'ali', 'koray@hotmail.com', '555', 'bU beni bilgilerimdir', 2, '1'),
(2, NULL, NULL, 'Mehmet', 'koray@hotmail.com', '555', 'bU beni bilgilerimdir', 4, '1'),
(3, NULL, NULL, 'cansu', 'koray@hotmail.com', '05453545857', 'bU beni bilgilerimdir', 5, '1'),
(4, NULL, NULL, 'Veli', 'koray@hotmail.com', '555', 'bU beni bilgilerimdir', 10, '1'),
(5, NULL, NULL, 'Sint occaecat explic', 'goty@mailinator.com', '123', 'Asperiores ea et dol', 6, '1'),
(17, NULL, NULL, 'Aliquip ea est cumq', 'furit@mailinator.com', '+1 (621) 723-4257', 'Eaque nulla eos inci', 7, '1'),
(24, NULL, NULL, 'Nisi molestias ut ne', 'qiravesy@mailinator.com', '+1 (366) 812-5214', 'Quae odit consequatu', 9, '1'),
(25, NULL, NULL, 'Duis labore qui Nam', 'gowo@mailinator.com', '+1 (285) 726-8184', 'Quasi cumque esse qu', 8, '1'),
(27, NULL, NULL, 'Vel dignissimos dolo', 'kimisytovo@mailinator.com', '+1 (738) 831-9504', 'Voluptatem velit o', 12, '1'),
(28, NULL, NULL, 'Consequuntur autem s', 'gusymuhy@mailinator.com', '+1 (373) 556-3468', 'Saepe saepe magnam c', 11, '1'),
(29, NULL, NULL, 'Cansu DANACI', 'xoje@mailinator.com', '+1 (903) 994-1852', 'Nisi ullamco unde re', 3, '1'),
(30, NULL, NULL, 'uras', 'vesasod@mailinator.com', '+1 (487) 453-7073', 'Eveniet eiusmod qui', 0, '1'),
(31, NULL, NULL, 'Cum culpa qui lorem', 'vahez@mailinator.com', '+1 (328) 493-9382', 'Vel in non voluptate', 1, '1'),
(32, NULL, NULL, 'Voluptatem Animi a', 'pugezy@mailinator.com', '+1 (381) 849-5938', 'Repellendus Vel nih', NULL, '1');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `failed_jobs`
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
-- Tablo için tablo yapısı `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Tablo döküm verisi `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2023_10_08_105237_create_settings_table', 2),
(5, '2023_10_21_125810_create_blogs_table', 3),
(6, '2024_04_19_204106_create_missions_table', 4),
(7, '2024_04_19_204750_create_missions_table', 5);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `missions`
--

CREATE TABLE `missions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `mission_title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mission_slug` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mission_file` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mission_must` int(11) DEFAULT NULL,
  `mission_content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `mission_status` enum('0','1') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Tablo döküm verisi `missions`
--

INSERT INTO `missions` (`id`, `created_at`, `updated_at`, `mission_title`, `mission_slug`, `mission_file`, `mission_must`, `mission_content`, `mission_status`) VALUES
(1, NULL, '2024-04-30 00:50:09', 'Mission Title 01', 'mission-title-01', NULL, 0, 'Why do we use it?\nIt is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).', '1'),
(2, NULL, '2024-05-02 00:20:01', 'Mission Title 02', 'mission-title-02', NULL, 3, 'Why do we use it?\r\nIt is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).', '1'),
(3, NULL, '2024-05-02 00:20:01', 'Sint voluptatem cu', 'laborum-quod-ut-eos', '662ea6ec688fe.jpg', 5, '<p>2</p>', '0'),
(4, NULL, '2024-05-02 00:20:01', 'Test Misyon 2', 'test-misyon-2', '662ea7b740875.jpg', 2, '<p>Test Misyon 2</p>', '1'),
(8, NULL, '2024-05-02 00:20:01', 'Misyon GÜNCELLEME', 'koray-misyon-update-2', '66300d2c2333c.jpg', 4, '<p>Misyon G&Uuml;NCELLEME</p>', '1'),
(9, NULL, '2024-05-02 00:20:01', 'Koray Misyon Update 4', 'koray-misyon-update-4', '66300d0ccec41.jpg', 1, '<p>Koray Misyon Update 22</p>', '1');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `pages`
--

CREATE TABLE `pages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `page_title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `page_slug` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `page_file` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `page_must` int(11) DEFAULT NULL,
  `page_content` text COLLATE utf8mb4_unicode_ci,
  `page_status` enum('0','1') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Tablo döküm verisi `pages`
--

INSERT INTO `pages` (`id`, `created_at`, `updated_at`, `page_title`, `page_slug`, `page_file`, `page_must`, `page_content`, `page_status`) VALUES
(1, '2023-11-01 17:37:15', '2024-05-22 00:36:59', 'Page Title 01', 'page-title-01', '664d05eb355f5.png', 2, '<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>', '1'),
(2, '2023-11-02 17:37:25', '2023-12-22 00:57:20', 'Page Title 02', 'page-title-02', '6548c3c499681.png', 3, '<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>', '1'),
(3, '2023-11-03 17:37:29', '2024-05-22 00:37:35', 'Page Title 03', 'page-title-03', '664d060fc7f70.png', 4, '<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>', '1'),
(4, '2023-11-04 17:37:32', '2024-05-22 00:37:28', 'Page Title 04', 'page-title-04', '664d0608c69d2.png', 5, '<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>', '1'),
(5, '2023-11-05 18:37:36', '2024-05-22 00:37:21', 'Page Title 05', 'page-title-05', '664d0601cbd8f.png', 6, '<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>', '1'),
(6, '2023-11-06 18:37:39', '2024-05-22 00:36:45', 'Page Title 06', 'page-title-06', '664d05dd64ce5.png', 1, '<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>', '1');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `settings`
--

CREATE TABLE `settings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `settings_description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `settings_key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `settings_value` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `settings_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `settings_must` int(11) NOT NULL,
  `settings_delete` enum('0','1') COLLATE utf8mb4_unicode_ci NOT NULL,
  `settings_status` enum('0','1') COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Tablo döküm verisi `settings`
--

INSERT INTO `settings` (`id`, `created_at`, `updated_at`, `settings_description`, `settings_key`, `settings_value`, `settings_type`, `settings_must`, `settings_delete`, `settings_status`) VALUES
(1, NULL, '2023-10-18 23:40:22', 'Başlık', 'title', 'Laravel CMS Yönetimi', 'text', 0, '0', '1'),
(2, NULL, '2023-10-18 23:19:01', 'Açıklama', 'description', 'Laravel CMS description', 'text', 1, '0', '1'),
(3, NULL, '2024-05-21 23:39:08', 'logo', 'logo', '664cf85cc65b6.jpg', 'file', 2, '0', '1'),
(4, NULL, '2024-05-21 23:38:58', 'Icon', 'icon', '664cf85216574.jpg', 'file', 3, '0', '1'),
(5, NULL, '2023-10-18 23:19:01', 'Anahtar Kelimeler', 'keywords', 'laravel,cms, php, html, software', 'text', 4, '0', '1'),
(6, NULL, '2023-10-18 23:19:08', 'Telefon Sabit', 'phone_sabit', '0555 188 11 22', 'text', 7, '0', '1'),
(7, NULL, '2023-10-18 23:19:08', 'Telefon GSM', 'phone_gsm', '0554 148 11 29', 'text', 5, '0', '1'),
(8, NULL, '2023-10-18 23:19:08', 'Mail', 'mail', 'koraygurkandanaci@gmail.com', 'text', 6, '0', '1'),
(9, NULL, '2023-10-18 23:19:08', 'İlçe', 'ilce', 'Avcılar', 'text', 8, '0', '1'),
(10, NULL, '2023-10-18 23:18:55', 'İl', 'il', 'İstanbul', 'textarea', 10, '0', '1'),
(11, NULL, '2023-10-18 23:18:55', 'Açık Adres', 'adres', 'Cihangir Mahallesi, Sandal Sok. No:123', 'ckeditor', 9, '0', '1'),
(16, NULL, '2023-10-18 23:18:55', 'Footer Bilgi', 'footer', 'KGD Yazılım Tüm Hakları Saklıdır', 'text', 10, '0', '1'),
(17, NULL, '2023-10-18 23:18:55', 'Home Title', 'home_title', 'Contemporary Business Features', 'text', 11, '0', '1'),
(18, NULL, '2023-10-18 23:18:55', 'Home Detay', 'home_detail', '            <p>The Modern Business template by Start Bootstrap includes:</p>\n            <ul>\n                <li>\n                    <strong>Bootstrap v4</strong>\n                </li>\n                <li>jQuery</li>\n                <li>Font Awesome</li>\n                <li>Working contact form with validation</li>\n                <li>Unstyled page elements for easy customization</li>\n            </ul>\n            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Corporis, omnis doloremque non cum id reprehenderit, quisquam totam aspernatur tempora minima unde aliquid ea culpa sunt. Reiciendis quia dolorum ducimus unde.</p>', 'ckeditor', 11, '0', '1'),
(19, NULL, '2024-05-22 00:15:07', 'Home Image', 'home_image', '664d00cb62ba8.png', 'file', 11, '0', '1'),
(20, NULL, '2023-11-06 19:48:13', 'Slogan', 'home_slogan', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Molestias, expedita, saepe, vero rerum deleniti beatae veniam harum neque nemo praesentium cum alias asperiores commodi.\r\n\r\n', 'textarea', 11, '0', '1');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `sliders`
--

CREATE TABLE `sliders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `slider_title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slider_slug` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slider_url` varchar(255) CHARACTER SET utf8 COLLATE utf8_turkish_ci DEFAULT NULL,
  `slider_file` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slider_must` int(11) DEFAULT NULL,
  `slider_content` text COLLATE utf8mb4_unicode_ci,
  `slider_status` enum('0','1') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Tablo döküm verisi `sliders`
--

INSERT INTO `sliders` (`id`, `created_at`, `updated_at`, `slider_title`, `slider_slug`, `slider_url`, `slider_file`, `slider_must`, `slider_content`, `slider_status`) VALUES
(1, NULL, '2023-10-27 00:42:54', 'Slider Title 01', 'slider-title-01', 'https://koraygurkandanaci.com/', '653acf4e3a16f.png', 0, '<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>', '1'),
(2, NULL, '2023-10-27 00:43:21', 'Slider Title 02', 'slider-title-02', 'https://koraygurkandanaci.com/', '653acf6929a9c.png', 1, '<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>', '1'),
(3, NULL, '2023-10-27 00:44:30', 'Slider Title 03', 'slider-title-03', 'https://koraygurkandanaci.com/', '653acf86c3854.png', 2, '<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>', '1');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_file` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `role` enum('admin','user') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'admin',
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `user_status` enum('0','1') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Tablo döküm verisi `users`
--

INSERT INTO `users` (`id`, `user_file`, `role`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `user_status`) VALUES
(7, '664cf81aecb1e.jpg', 'admin', 'Koray Gürkan Danacı', 'koraygurkandanaci@gmail.com', NULL, '$2y$10$tarx6ziXKiFIPNlmHCogmOEYWFMe/XTz/Q9CVDq0VjbAg4gN70yYy', 'Pip3vTnDMg9ZIx49Gs8e8qHlUj1Zkx6yNq29rgW5QdtRgJ0ERNuJBmOpSYje', '2023-11-01 22:02:34', '2024-05-21 23:38:02', '1'),
(9, '664cf7f0d1c29.jpg', 'admin', 'koray', 'koraygurkandanaci@hotmail.com', NULL, '$2y$10$j4.GsgM6EWgZWjda6N9XQeiMO0yg29IvYBJ1B06k/hpr145YgQgum', NULL, '2023-11-03 00:22:35', '2024-05-21 23:37:20', '1');

--
-- Dökümü yapılmış tablolar için indeksler
--

--
-- Tablo için indeksler `abouts`
--
ALTER TABLE `abouts`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `blogs`
--
ALTER TABLE `blogs`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `missions`
--
ALTER TABLE `missions`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `pages`
--
ALTER TABLE `pages`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`(191));

--
-- Tablo için indeksler `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `sliders`
--
ALTER TABLE `sliders`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Dökümü yapılmış tablolar için AUTO_INCREMENT değeri
--

--
-- Tablo için AUTO_INCREMENT değeri `abouts`
--
ALTER TABLE `abouts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- Tablo için AUTO_INCREMENT değeri `blogs`
--
ALTER TABLE `blogs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Tablo için AUTO_INCREMENT değeri `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- Tablo için AUTO_INCREMENT değeri `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Tablo için AUTO_INCREMENT değeri `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Tablo için AUTO_INCREMENT değeri `missions`
--
ALTER TABLE `missions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Tablo için AUTO_INCREMENT değeri `pages`
--
ALTER TABLE `pages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Tablo için AUTO_INCREMENT değeri `settings`
--
ALTER TABLE `settings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- Tablo için AUTO_INCREMENT değeri `sliders`
--
ALTER TABLE `sliders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Tablo için AUTO_INCREMENT değeri `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
