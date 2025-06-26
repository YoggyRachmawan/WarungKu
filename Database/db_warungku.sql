-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               8.0.30 - MySQL Community Server - GPL
-- Server OS:                    Win64
-- HeidiSQL Version:             12.1.0.6537
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

-- Dumping structure for table warungku.harga_jual
CREATE TABLE IF NOT EXISTS `harga_jual` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `nomor_produk` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `harga_jual` bigint NOT NULL,
  `satuan_produk` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table warungku.harga_jual: ~0 rows (approximately)

-- Dumping structure for table warungku.harga_modal
CREATE TABLE IF NOT EXISTS `harga_modal` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `nomor_produk` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `harga_modal` bigint NOT NULL,
  `satuan_produk` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table warungku.harga_modal: ~0 rows (approximately)

-- Dumping structure for table warungku.katalog_produk
CREATE TABLE IF NOT EXISTS `katalog_produk` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `nomor_produk` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_produk` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `foto_produk` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table warungku.katalog_produk: ~0 rows (approximately)

-- Dumping structure for table warungku.keuangan
CREATE TABLE IF NOT EXISTS `keuangan` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `tanggal` date NOT NULL,
  `omset` bigint NOT NULL,
  `modal` bigint NOT NULL,
  `laba` bigint NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table warungku.keuangan: ~0 rows (approximately)

-- Dumping structure for table warungku.migrations
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table warungku.migrations: ~1 rows (approximately)
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
	(1, '0001_01_01_000000_create_users_table', 1),
	(2, '2025_02_06_132755_create_tempat_belanja_table', 1),
	(3, '2025_02_06_132912_create_katalog_produk_table', 1),
	(4, '2025_02_06_132928_create_satuan_produk_table', 1),
	(5, '2025_02_06_132944_create_harga_modal_table', 1),
	(6, '2025_02_06_132954_create_harga_jual_table', 1),
	(7, '2025_02_06_133012_create_keuangan_table', 1),
	(8, '2025_03_14_081034_create_nota_belanja_table', 1);

-- Dumping structure for table warungku.nota_belanja
CREATE TABLE IF NOT EXISTS `nota_belanja` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `tanggal` date NOT NULL,
  `nota` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_tempat_belanja` int NOT NULL,
  `total_harga` bigint NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table warungku.nota_belanja: ~0 rows (approximately)

-- Dumping structure for table warungku.satuan_produk
CREATE TABLE IF NOT EXISTS `satuan_produk` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `satuan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table warungku.satuan_produk: ~0 rows (approximately)

-- Dumping structure for table warungku.sessions
CREATE TABLE IF NOT EXISTS `sessions` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint unsigned DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `sessions_user_id_index` (`user_id`),
  KEY `sessions_last_activity_index` (`last_activity`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table warungku.sessions: ~0 rows (approximately)

-- Dumping structure for table warungku.tempat_belanja
CREATE TABLE IF NOT EXISTS `tempat_belanja` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `nama_tempat` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kontak` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table warungku.tempat_belanja: ~0 rows (approximately)

-- Dumping structure for table warungku.users
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table warungku.users: ~1 rows (approximately)
INSERT INTO `users` (`id`, `name`, `email`, `password`, `created_at`, `updated_at`) VALUES
	(1, 'admin', 'admin@warung.com', '$2y$12$aCrPhssz.4J8mIeqkzYNuOyCv3dSd49EHGI701CnNwGxQtCSe25tC', NULL, NULL);

-- Dumping structure for view warungku.view_harga_jual
-- Creating temporary table to overcome VIEW dependency errors
CREATE TABLE `view_harga_jual` (
	`nomor_produk` VARCHAR(255) NOT NULL COLLATE 'utf8mb4_unicode_ci',
	`harga_jual` TEXT NULL COLLATE 'utf8mb4_unicode_ci'
) ENGINE=MyISAM;

-- Dumping structure for view warungku.view_harga_modal
-- Creating temporary table to overcome VIEW dependency errors
CREATE TABLE `view_harga_modal` (
	`nomor_produk` VARCHAR(255) NOT NULL COLLATE 'utf8mb4_unicode_ci',
	`harga_modal` TEXT NULL COLLATE 'utf8mb4_unicode_ci'
) ENGINE=MyISAM;

-- Dumping structure for view warungku.view_katalog_produk
-- Creating temporary table to overcome VIEW dependency errors
CREATE TABLE `view_katalog_produk` (
	`id` BIGINT(20) UNSIGNED NOT NULL,
	`nomor_produk` VARCHAR(255) NOT NULL COLLATE 'utf8mb4_unicode_ci',
	`nama_produk` VARCHAR(255) NOT NULL COLLATE 'utf8mb4_unicode_ci',
	`foto_produk` VARCHAR(255) NOT NULL COLLATE 'utf8mb4_unicode_ci',
	`harga_modal` TEXT NULL COLLATE 'utf8mb4_unicode_ci',
	`harga_jual` TEXT NULL COLLATE 'utf8mb4_unicode_ci'
) ENGINE=MyISAM;

-- Dumping structure for view warungku.view_keuangan_bulanan
-- Creating temporary table to overcome VIEW dependency errors
CREATE TABLE `view_keuangan_bulanan` (
	`tahun` INT(10) NULL,
	`bulan` INT(10) NULL,
	`omset` DECIMAL(41,0) NULL,
	`modal` DECIMAL(41,0) NULL,
	`laba` DECIMAL(41,0) NULL
) ENGINE=MyISAM;

-- Dumping structure for view warungku.view_total_keuangan
-- Creating temporary table to overcome VIEW dependency errors
CREATE TABLE `view_total_keuangan` (
	`total_omset` DECIMAL(41,0) NULL,
	`total_modal` DECIMAL(41,0) NULL,
	`total_laba` DECIMAL(41,0) NULL
) ENGINE=MyISAM;

-- Dumping structure for view warungku.view_harga_jual
-- Removing temporary table and create final VIEW structure
DROP TABLE IF EXISTS `view_harga_jual`;
CREATE ALGORITHM=UNDEFINED SQL SECURITY DEFINER VIEW `view_harga_jual` AS select `harga_jual`.`nomor_produk` AS `nomor_produk`,group_concat(concat('Rp ',replace(format(`harga_jual`.`harga_jual`,0),',','.'),' / ',`harga_jual`.`satuan_produk`) separator '<br>') AS `harga_jual` from `harga_jual` group by `harga_jual`.`nomor_produk`;

-- Dumping structure for view warungku.view_harga_modal
-- Removing temporary table and create final VIEW structure
DROP TABLE IF EXISTS `view_harga_modal`;
CREATE ALGORITHM=UNDEFINED SQL SECURITY DEFINER VIEW `view_harga_modal` AS select `harga_modal`.`nomor_produk` AS `nomor_produk`,group_concat(concat('Rp ',replace(format(`harga_modal`.`harga_modal`,0),',','.'),' / ',`harga_modal`.`satuan_produk`) separator '<br>') AS `harga_modal` from `harga_modal` group by `harga_modal`.`nomor_produk`;

-- Dumping structure for view warungku.view_katalog_produk
-- Removing temporary table and create final VIEW structure
DROP TABLE IF EXISTS `view_katalog_produk`;
CREATE ALGORITHM=UNDEFINED SQL SECURITY DEFINER VIEW `view_katalog_produk` AS select `katalog_produk`.`id` AS `id`,`katalog_produk`.`nomor_produk` AS `nomor_produk`,`katalog_produk`.`nama_produk` AS `nama_produk`,`katalog_produk`.`foto_produk` AS `foto_produk`,`view_harga_modal`.`harga_modal` AS `harga_modal`,`view_harga_jual`.`harga_jual` AS `harga_jual` from ((`katalog_produk` join `view_harga_modal` on((`katalog_produk`.`nomor_produk` = `view_harga_modal`.`nomor_produk`))) join `view_harga_jual` on((`katalog_produk`.`nomor_produk` = `view_harga_jual`.`nomor_produk`))) group by `katalog_produk`.`id`,`katalog_produk`.`nomor_produk`,`katalog_produk`.`nama_produk`,`katalog_produk`.`foto_produk`;

-- Dumping structure for view warungku.view_keuangan_bulanan
-- Removing temporary table and create final VIEW structure
DROP TABLE IF EXISTS `view_keuangan_bulanan`;
CREATE ALGORITHM=UNDEFINED SQL SECURITY DEFINER VIEW `view_keuangan_bulanan` AS select year(`keuangan`.`tanggal`) AS `tahun`,month(`keuangan`.`tanggal`) AS `bulan`,sum(`keuangan`.`omset`) AS `omset`,sum(`keuangan`.`modal`) AS `modal`,sum(`keuangan`.`laba`) AS `laba` from `keuangan` group by year(`keuangan`.`tanggal`),month(`keuangan`.`tanggal`) order by `tahun`,`bulan`;

-- Dumping structure for view warungku.view_total_keuangan
-- Removing temporary table and create final VIEW structure
DROP TABLE IF EXISTS `view_total_keuangan`;
CREATE ALGORITHM=UNDEFINED SQL SECURITY DEFINER VIEW `view_total_keuangan` AS select sum(`keuangan`.`omset`) AS `total_omset`,sum(`keuangan`.`modal`) AS `total_modal`,sum(`keuangan`.`laba`) AS `total_laba` from `keuangan`;

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
