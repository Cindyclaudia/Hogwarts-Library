-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jul 07, 2026 at 06:21 PM
-- Server version: 8.0.30
-- PHP Version: 8.2.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hogwarts_library`
--

-- --------------------------------------------------------

--
-- Table structure for table `books`
--

CREATE TABLE `books` (
  `id` bigint UNSIGNED NOT NULL,
  `category_id` bigint UNSIGNED NOT NULL,
  `judul` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `penulis` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `penerbit` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tahun_terbit` year NOT NULL,
  `stok` int NOT NULL DEFAULT '0',
  `cover` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `books`
--

INSERT INTO `books` (`id`, `category_id`, `judul`, `penulis`, `penerbit`, `tahun_terbit`, `stok`, `cover`, `created_at`, `updated_at`) VALUES
(1, 1, 'Panduan Dasar Mantra untuk Penyihir Pemula', 'Sihir Dasar Alaric Ravenshade', 'Hogwarts Press', 2022, 11, '1783439689.png', '2026-07-07 08:54:49', '2026-07-07 11:19:38'),
(2, 2, 'Ensiklopedia Ramuan Ajaib dan Alkimia Modern', 'Eliza Moonstone', 'Alchemy House', 2021, 9, '1783439812.png', '2026-07-07 08:56:52', '2026-07-07 08:56:52'),
(3, 3, 'Herbologi: Tanaman Magis dari Seluruh Dunia', 'Cedric Greenleaf', 'Greenhouse Publishing', 2023, 10, '1783439942.png', '2026-07-07 08:59:02', '2026-07-07 08:59:02'),
(4, 1, 'Bestiarium Makhluk Magis Nusantara', 'Aurelius Dragonhart', 'Mystic Beast Press', 2020, 6, '1783440026.png', '2026-07-07 09:00:26', '2026-07-07 09:00:26'),
(5, 4, 'Peta Bintang dan Seni Meramal Takdir', 'Luna Starwhisper', 'Celestial Books', 2022, 15, '1783440110.png', '2026-07-07 09:01:50', '2026-07-07 09:01:50'),
(6, 6, 'Kronik Kerajaan Sihir Kuno', 'Ignatius Blackwood', 'Wizard Archive', 2018, 4, '1783440248.png', '2026-07-07 09:04:08', '2026-07-07 11:19:49'),
(7, 7, 'Teknik Pertahanan dari Kutukan dan Ilmu Hitam', 'Magnus Ironwand', 'Guardian Press', 2023, 5, '1783440326.png', '2026-07-07 09:05:26', '2026-07-07 09:05:26'),
(8, 8, 'Pesona Pikiran: Seni Mempengaruhi dengan Jampi', 'Serena Silvermist', 'Enchanted Mind Publisher', 2022, 11, '1783440401.png', '2026-07-07 09:06:41', '2026-07-07 09:06:41'),
(9, 9, 'Penelitian tentang Evolusi Mantra Pelindung di Era Modern', 'Prof. Helena Crow', 'Academy Research Press', 2025, 11, '1783440609.png', '2026-07-07 09:10:09', '2026-07-07 09:10:09'),
(10, 10, 'Codex Arcana: Naskah Kuno Para Penyihir Agung', 'Salazar Evernight Ancient', 'Scroll Publisher', 2018, 5, '1783440799.png', '2026-07-07 09:13:19', '2026-07-07 09:13:19'),
(11, 1, 'Legenda Kastil Hogwarts dan Penyihir Terakhir', 'Emilia Nightingale', 'Owl Feather Books', 2015, 6, '1783440848.png', '2026-07-07 09:14:08', '2026-07-07 11:18:53'),
(12, 1, 'Ensiklopedia Lengkap Dunia Sihir', 'Orion Spellbinder', 'Grand Library Press', 2014, 4, '1783441065.png', '2026-07-07 09:17:45', '2026-07-07 09:17:45');

-- --------------------------------------------------------

--
-- Table structure for table `borrowings`
--

CREATE TABLE `borrowings` (
  `id` bigint UNSIGNED NOT NULL,
  `member_id` bigint UNSIGNED NOT NULL,
  `tanggal_pinjam` date NOT NULL,
  `tanggal_kembali` date NOT NULL,
  `tanggal_pengembalian` date DEFAULT NULL,
  `status` enum('Dipinjam','Dikembalikan') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Dipinjam',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `borrowings`
--

INSERT INTO `borrowings` (`id`, `member_id`, `tanggal_pinjam`, `tanggal_kembali`, `tanggal_pengembalian`, `status`, `created_at`, `updated_at`) VALUES
(4, 3, '2026-07-07', '2026-07-14', NULL, 'Dipinjam', '2026-07-07 11:18:53', '2026-07-07 11:18:53'),
(5, 1, '2026-07-07', '2026-07-06', NULL, 'Dipinjam', '2026-07-07 11:19:38', '2026-07-07 11:20:36'),
(6, 2, '2026-07-07', '2026-07-08', NULL, 'Dipinjam', '2026-07-07 11:19:49', '2026-07-07 11:20:11');

-- --------------------------------------------------------

--
-- Table structure for table `borrowing_details`
--

CREATE TABLE `borrowing_details` (
  `id` bigint UNSIGNED NOT NULL,
  `borrowing_id` bigint UNSIGNED NOT NULL,
  `book_id` bigint UNSIGNED NOT NULL,
  `qty` int NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `borrowing_details`
--

INSERT INTO `borrowing_details` (`id`, `borrowing_id`, `book_id`, `qty`, `created_at`, `updated_at`) VALUES
(5, 4, 11, 1, '2026-07-07 11:18:53', '2026-07-07 11:18:53'),
(6, 5, 1, 1, '2026-07-07 11:19:38', '2026-07-07 11:19:38'),
(7, 6, 6, 1, '2026-07-07 11:19:49', '2026-07-07 11:19:49');

-- --------------------------------------------------------

--
-- Table structure for table `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cache`
--

INSERT INTO `cache` (`key`, `value`, `expiration`) VALUES
('laravel-cache-adminhogwarts@gmail.com|127.0.0.1', 'i:1;', 1783437338),
('laravel-cache-adminhogwarts@gmail.com|127.0.0.1:timer', 'i:1783437338;', 1783437338);

-- --------------------------------------------------------

--
-- Table structure for table `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `owner` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint UNSIGNED NOT NULL,
  `nama_kategori` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deskripsi` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `nama_kategori`, `deskripsi`, `created_at`, `updated_at`) VALUES
(1, 'Mantra & Sihir Dasar', 'Buku-buku pengantar, pengetahuan umum, dan dasar-dasar sihir.', '2026-07-07 08:15:38', '2026-07-07 08:15:38'),
(2, 'Ramuan & Alkimia', 'Kimia, biologi, kesehatan, farmasi, dan eksperimen.', '2026-07-07 08:17:19', '2026-07-07 08:17:19'),
(3, 'Herbologi', 'Tumbuhan, pertanian, lingkungan, dan alam.', '2026-07-07 08:17:40', '2026-07-07 08:17:40'),
(4, 'Makhluk Magis', 'Zoologi, hewan, ekosistem, dan kehidupan liar.', '2026-07-07 08:17:58', '2026-07-07 08:17:58'),
(5, 'Astronomi & Ramalan', 'Astronomi, fisika, matematika, dan sains luar angkasa.', '2026-07-07 08:18:35', '2026-07-07 08:18:35'),
(6, 'Sejarah Dunia Sihir', 'Sejarah, budaya, peradaban, dan arkeologi.', '2026-07-07 08:18:53', '2026-07-07 08:18:53'),
(7, 'Pertahanan Terhadap Ilmu Hitam', 'Keamanan siber, hukum, etika, dan keamanan informasi.', '2026-07-07 08:19:13', '2026-07-07 08:19:13'),
(8, 'Pesona & Jampi', 'Psikologi, komunikasi, pengembangan diri, dan motivasi.', '2026-07-07 08:19:33', '2026-07-07 08:19:33'),
(9, 'Arsip Gulungan Kuno', 'Skripsi, tesis, penelitian, dan karya ilmiah.', '2026-07-07 08:19:55', '2026-07-07 08:19:55'),
(10, 'Koleksi Langka', 'Buku klasik, naskah kuno, dan koleksi spesial.', '2026-07-07 08:20:15', '2026-07-07 08:20:15'),
(11, 'Sastra Penyihir', 'Novel, cerpen, puisi, drama, dan komik.', '2026-07-07 08:20:33', '2026-07-07 08:20:33'),
(17, 'Ruang Refensi', 'Ensiklopedia Dunia Sihir', '2026-07-07 09:07:52', '2026-07-07 09:07:52');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `fines`
--

CREATE TABLE `fines` (
  `id` bigint UNSIGNED NOT NULL,
  `borrowing_id` bigint UNSIGNED NOT NULL,
  `jumlah_denda` decimal(12,2) NOT NULL,
  `status_bayar` enum('Belum Bayar','Sudah Bayar') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Belum Bayar',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `fines`
--

INSERT INTO `fines` (`id`, `borrowing_id`, `jumlah_denda`, `status_bayar`, `created_at`, `updated_at`) VALUES
(6, 5, '15000.00', 'Belum Bayar', '2026-07-07 11:21:23', '2026-07-07 11:21:23');

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `queue` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `attempts` tinyint UNSIGNED NOT NULL,
  `reserved_at` int UNSIGNED DEFAULT NULL,
  `available_at` int UNSIGNED NOT NULL,
  `created_at` int UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `job_batches`
--

CREATE TABLE `job_batches` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_jobs` int NOT NULL,
  `pending_jobs` int NOT NULL,
  `failed_jobs` int NOT NULL,
  `failed_job_ids` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `options` mediumtext COLLATE utf8mb4_unicode_ci,
  `cancelled_at` int DEFAULT NULL,
  `created_at` int NOT NULL,
  `finished_at` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `members`
--

CREATE TABLE `members` (
  `id` bigint UNSIGNED NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `telepon` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `members`
--

INSERT INTO `members` (`id`, `nama`, `alamat`, `telepon`, `email`, `created_at`, `updated_at`) VALUES
(1, 'Harry Potter', 'Gryffindor', '0812-3456-7001', 'harry@hogwarts.com', '2026-06-24 08:49:58', '2026-07-07 09:48:26'),
(2, 'Hermione Granger', 'Gryffindor', '0812-3456-7002', 'hermione@hogwarts.com', '2026-06-24 08:49:58', '2026-07-07 09:48:42'),
(3, 'Ron Weasley', 'Gryffindor', '0812-3456-7003', 'ron.weasley@hogwarts.edu', '2026-07-07 09:46:46', '2026-07-07 09:46:46'),
(4, 'Draco Malfoy', 'Slytherin', '0812-3456-7004', 'draco.malfoy@hogwarts.edu', '2026-07-07 09:47:27', '2026-07-07 09:47:27'),
(5, 'Luna Lovegood', 'Ravenclaw', '0812-3456-7005', 'luna.lovegood@hogwarts.edu', '2026-07-07 09:48:10', '2026-07-07 09:48:10'),
(6, 'Neville Longbottom', 'Gryffindor', '0812-3456-7006', 'neville.longbottom@hogwarts.edu', '2026-07-07 09:49:52', '2026-07-07 09:49:52'),
(7, 'Ginny Weasley', 'Gryffindor', '0812-3456-7007', 'ginny.weasley@hogwarts.edu', '2026-07-07 09:52:02', '2026-07-07 09:52:02'),
(8, 'Cedric Diggory', 'Hufflepuff', '0812-3456-7008', 'cedric.diggory@hogwarts.edu', '2026-07-07 11:16:46', '2026-07-07 11:16:46'),
(9, 'Cho Chang', 'Ravenclaw', '0812-3456-7009', 'cho.chang@hogwarts.edu', '2026-07-07 11:17:45', '2026-07-07 11:17:45'),
(10, 'Severus Snape', 'Slytherin', '0812-3456-7010', 'severus.snape@hogwarts.edu', '2026-07-07 11:18:29', '2026-07-07 11:18:29');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1),
(4, '2026_06_24_085034_create_categories_table', 1),
(5, '2026_06_24_085034_create_members_table', 1),
(6, '2026_06_24_085035_create_books_table', 1),
(7, '2026_06_24_085035_create_borrowings_table', 1),
(8, '2026_06_24_085036_create_borrowing_details_table', 1),
(9, '2026_06_24_085036_create_fines_table', 1),
(10, '2026_07_07_090816_add_tanggal_pengembalian_to_borrowings_table', 2);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` enum('admin','petugas') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'petugas',
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `role`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Admin Hogwarts', 'admin@hogwarts.com', 'admin', NULL, '$2y$12$WA4m7T4K2.K1BDyHgCEqb.XmxUKVIwnGNCutIjVBDKAL..YEV8cce', NULL, '2026-06-24 08:49:58', '2026-06-24 08:49:58'),
(2, 'Petugas Hogwarts', 'petugas@hogwarts.com', 'petugas', NULL, '$2y$12$WTYh1OvYuu.wyr/FZXGPmerSQAxrNko2D69IK0yxK6MBTp07niQ9i', NULL, '2026-06-24 08:49:58', '2026-06-24 08:49:58');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`id`),
  ADD KEY `books_category_id_foreign` (`category_id`);

--
-- Indexes for table `borrowings`
--
ALTER TABLE `borrowings`
  ADD PRIMARY KEY (`id`),
  ADD KEY `borrowings_member_id_foreign` (`member_id`);

--
-- Indexes for table `borrowing_details`
--
ALTER TABLE `borrowing_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `borrowing_details_borrowing_id_foreign` (`borrowing_id`),
  ADD KEY `borrowing_details_book_id_foreign` (`book_id`);

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
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `fines`
--
ALTER TABLE `fines`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fines_borrowing_id_foreign` (`borrowing_id`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indexes for table `job_batches`
--
ALTER TABLE `job_batches`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `members`
--
ALTER TABLE `members`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `members_email_unique` (`email`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
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
-- AUTO_INCREMENT for table `books`
--
ALTER TABLE `books`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `borrowings`
--
ALTER TABLE `borrowings`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `borrowing_details`
--
ALTER TABLE `borrowing_details`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `fines`
--
ALTER TABLE `fines`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `members`
--
ALTER TABLE `members`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `books`
--
ALTER TABLE `books`
  ADD CONSTRAINT `books_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `borrowings`
--
ALTER TABLE `borrowings`
  ADD CONSTRAINT `borrowings_member_id_foreign` FOREIGN KEY (`member_id`) REFERENCES `members` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `borrowing_details`
--
ALTER TABLE `borrowing_details`
  ADD CONSTRAINT `borrowing_details_book_id_foreign` FOREIGN KEY (`book_id`) REFERENCES `books` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `borrowing_details_borrowing_id_foreign` FOREIGN KEY (`borrowing_id`) REFERENCES `borrowings` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `fines`
--
ALTER TABLE `fines`
  ADD CONSTRAINT `fines_borrowing_id_foreign` FOREIGN KEY (`borrowing_id`) REFERENCES `borrowings` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
