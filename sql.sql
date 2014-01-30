-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               5.6.14-log - MySQL Community Server (GPL)
-- Server OS:                    Win32
-- HeidiSQL Version:             8.1.0.4545
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

-- Dumping database structure for e-registrar
DROP DATABASE IF EXISTS `e-registrar`;
CREATE DATABASE IF NOT EXISTS `e-registrar` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `e-registrar`;


-- Dumping structure for table e-registrar.documents
DROP TABLE IF EXISTS `documents`;
CREATE TABLE IF NOT EXISTS `documents` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `others` tinyint(1) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table e-registrar.documents: ~8 rows (approximately)
DELETE FROM `documents`;
/*!40000 ALTER TABLE `documents` DISABLE KEYS */;
INSERT INTO `documents` (`id`, `name`, `others`, `created_at`, `updated_at`) VALUES
	(1, 'Transcript of Records', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(3, 'Certifications', 1, '0000-00-00 00:00:00', '2013-11-15 20:21:06'),
	(5, 'Diploma', 0, '2013-11-10 00:34:57', '2014-01-16 11:50:57'),
	(8, 'Sample', 0, '2013-11-10 01:17:54', '2013-11-10 01:27:45'),
	(9, 'Some Documents', 0, '2013-11-15 20:15:31', '2014-01-30 06:22:38'),
	(10, 'Other Document Type', 1, '2013-11-21 03:36:35', '2014-01-30 06:20:21'),
	(11, 'Honorable Dismisal', 0, '2014-01-01 00:16:38', '2014-01-01 00:16:38'),
	(12, 'Certificate of Verificagtion', 0, '2014-01-28 07:10:07', '2014-01-28 07:10:07');
/*!40000 ALTER TABLE `documents` ENABLE KEYS */;


-- Dumping structure for table e-registrar.document_request
DROP TABLE IF EXISTS `document_request`;
CREATE TABLE IF NOT EXISTS `document_request` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `request_id` int(11) unsigned NOT NULL,
  `document_id` int(11) unsigned NOT NULL,
  `status` tinyint(1) NOT NULL,
  `level_id` tinyint(1) NOT NULL DEFAULT '1',
  `label_id` tinyint(1) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  KEY `FK_document_request_requests` (`request_id`),
  KEY `FK_document_request_documents` (`document_id`),
  CONSTRAINT `FK_document_request_documents` FOREIGN KEY (`document_id`) REFERENCES `documents` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_document_request_requests` FOREIGN KEY (`request_id`) REFERENCES `requests` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table e-registrar.document_request: ~0 rows (approximately)
DELETE FROM `document_request`;
/*!40000 ALTER TABLE `document_request` DISABLE KEYS */;
INSERT INTO `document_request` (`id`, `request_id`, `document_id`, `status`, `level_id`, `label_id`, `created_at`, `updated_at`) VALUES
	(1, 16, 12, 0, 1, NULL, '2014-01-30 06:21:43', '2014-01-30 06:21:43'),
	(2, 16, 8, 0, 1, NULL, '2014-01-30 06:21:43', '2014-01-30 06:21:43'),
	(3, 16, 9, 0, 2, NULL, '2014-01-30 06:21:44', '2014-01-30 06:30:14'),
	(4, 16, 1, 0, 2, NULL, '2014-01-30 06:21:44', '2014-01-30 06:29:58');
/*!40000 ALTER TABLE `document_request` ENABLE KEYS */;


-- Dumping structure for table e-registrar.document_requirement
DROP TABLE IF EXISTS `document_requirement`;
CREATE TABLE IF NOT EXISTS `document_requirement` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `document_id` int(11) unsigned NOT NULL,
  `requirement_id` int(11) unsigned NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  KEY `FK_document_requirement_documents` (`document_id`),
  KEY `FK_document_requirement_requirements` (`requirement_id`),
  CONSTRAINT `FK_document_requirement_documents` FOREIGN KEY (`document_id`) REFERENCES `documents` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_document_requirement_requirements` FOREIGN KEY (`requirement_id`) REFERENCES `requirements` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=30 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table e-registrar.document_requirement: ~21 rows (approximately)
DELETE FROM `document_requirement`;
/*!40000 ALTER TABLE `document_requirement` DISABLE KEYS */;
INSERT INTO `document_requirement` (`id`, `document_id`, `requirement_id`, `created_at`, `updated_at`) VALUES
	(1, 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(2, 1, 2, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(3, 8, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(4, 8, 2, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(5, 3, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(6, 9, 4, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(8, 3, 4, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(10, 3, 2, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(12, 5, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(13, 10, 3, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(14, 10, 6, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(15, 11, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(16, 11, 2, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(17, 11, 7, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(18, 5, 2, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(19, 5, 3, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(20, 12, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(21, 10, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(22, 10, 2, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(23, 10, 4, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(24, 10, 7, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(25, 9, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(26, 9, 2, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(27, 9, 3, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(28, 9, 6, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(29, 9, 7, '0000-00-00 00:00:00', '0000-00-00 00:00:00');
/*!40000 ALTER TABLE `document_requirement` ENABLE KEYS */;


-- Dumping structure for table e-registrar.labels
DROP TABLE IF EXISTS `labels`;
CREATE TABLE IF NOT EXISTS `labels` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `color` varchar(7) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table e-registrar.labels: ~2 rows (approximately)
DELETE FROM `labels`;
/*!40000 ALTER TABLE `labels` DISABLE KEYS */;
INSERT INTO `labels` (`id`, `name`, `color`, `created_at`, `updated_at`) VALUES
	(1, 'NEW', '#fbc70e', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(2, 'IN-PROGRESS', '#007d3d', '0000-00-00 00:00:00', '0000-00-00 00:00:00');
/*!40000 ALTER TABLE `labels` ENABLE KEYS */;


-- Dumping structure for table e-registrar.levels
DROP TABLE IF EXISTS `levels`;
CREATE TABLE IF NOT EXISTS `levels` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `route` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `desc` text COLLATE utf8_unicode_ci NOT NULL,
  `order` int(11) DEFAULT NULL,
  `icon` varchar(50) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'entypo-right-bold',
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  UNIQUE KEY `order` (`order`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table e-registrar.levels: ~11 rows (approximately)
DELETE FROM `levels`;
/*!40000 ALTER TABLE `levels` DISABLE KEYS */;
INSERT INTO `levels` (`id`, `name`, `route`, `desc`, `order`, `icon`, `created_at`, `updated_at`) VALUES
	(1, 'Front Desk', 'frontdesks', '', 1, 'entypo-box', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(2, 'Record Station', '', '', 2, 'entypo-right-bold', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(3, 'For Evaluation', '', '', 3, 'entypo-right-bold', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(4, 'For Encoding', '', '', 4, 'entypo-right-bold', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(5, 'For Picture', '', '', 5, 'entypo-right-bold', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(6, 'For Verification', '', '', 6, 'entypo-right-bold', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(7, 'For Signing', '', '', 7, 'entypo-right-bold', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(8, 'For Release', '', '', 8, 'entypo-right-bold', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(9, 'Release', '', '', 9, 'entypo-right-bold', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(10, 'Pending', '', '', 10, 'entypo-right-bold', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(11, 'Clear for Release', '', '', 11, 'entypo-right-bold', '0000-00-00 00:00:00', '0000-00-00 00:00:00');
/*!40000 ALTER TABLE `levels` ENABLE KEYS */;


-- Dumping structure for table e-registrar.level_user
DROP TABLE IF EXISTS `level_user`;
CREATE TABLE IF NOT EXISTS `level_user` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `level_id` int(11) unsigned NOT NULL,
  `user_id` int(11) unsigned NOT NULL,
  `status` int(1) NOT NULL DEFAULT '1' COMMENT '0=Suspended, 1=Active',
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  KEY `level_id` (`level_id`),
  KEY `user_id` (`user_id`),
  CONSTRAINT `FK_level_user_levels` FOREIGN KEY (`level_id`) REFERENCES `levels` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_level_user_users` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=32 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table e-registrar.level_user: ~26 rows (approximately)
DELETE FROM `level_user`;
/*!40000 ALTER TABLE `level_user` DISABLE KEYS */;
INSERT INTO `level_user` (`id`, `level_id`, `user_id`, `status`, `created_at`, `updated_at`) VALUES
	(1, 1, 2, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(6, 1, 9, 1, '2014-01-20 10:47:12', '2014-01-20 10:47:12'),
	(7, 1, 10, 1, '2014-01-20 11:04:52', '2014-01-20 11:04:52'),
	(8, 2, 10, 1, '2014-01-20 11:37:47', '2014-01-20 11:37:47'),
	(9, 3, 10, 1, '2014-01-20 11:37:47', '2014-01-20 11:37:47'),
	(10, 8, 10, 1, '2014-01-20 11:38:01', '2014-01-20 11:38:01'),
	(11, 9, 10, 1, '2014-01-20 11:38:01', '2014-01-20 11:38:01'),
	(12, 4, 9, 1, '2014-01-22 01:15:46', '2014-01-22 01:15:46'),
	(13, 5, 9, 1, '2014-01-22 01:15:46', '2014-01-22 01:15:46'),
	(14, 6, 9, 1, '2014-01-22 01:15:46', '2014-01-22 01:15:46'),
	(15, 7, 9, 1, '2014-01-22 01:15:46', '2014-01-22 01:15:46'),
	(16, 9, 11, 1, '2014-01-23 02:28:50', '2014-01-23 02:28:50'),
	(18, 2, 11, 1, '2014-01-23 08:14:37', '2014-01-23 08:14:37'),
	(19, 3, 11, 1, '2014-01-23 08:14:37', '2014-01-23 08:14:37'),
	(20, 1, 11, 1, '2014-01-25 05:15:59', '2014-01-25 05:15:59'),
	(21, 4, 11, 1, '2014-01-25 05:15:59', '2014-01-25 05:15:59'),
	(22, 5, 11, 1, '2014-01-25 05:15:59', '2014-01-25 05:15:59'),
	(23, 6, 11, 1, '2014-01-25 05:15:59', '2014-01-25 05:15:59'),
	(24, 7, 11, 1, '2014-01-25 05:15:59', '2014-01-25 05:15:59'),
	(25, 8, 11, 1, '2014-01-25 05:15:59', '2014-01-25 05:15:59'),
	(26, 10, 11, 1, '2014-01-25 05:16:00', '2014-01-25 05:16:00'),
	(27, 1, 6, 1, '2014-01-25 05:43:24', '2014-01-25 05:43:24'),
	(28, 2, 12, 1, '2014-01-25 10:02:13', '2014-01-25 10:02:13'),
	(29, 3, 12, 1, '2014-01-25 10:02:13', '2014-01-25 10:02:13'),
	(30, 1, 13, 1, '2014-01-28 07:12:45', '2014-01-28 07:12:45'),
	(31, 2, 13, 1, '2014-01-28 07:12:45', '2014-01-28 07:12:45');
/*!40000 ALTER TABLE `level_user` ENABLE KEYS */;


-- Dumping structure for table e-registrar.migrations
DROP TABLE IF EXISTS `migrations`;
CREATE TABLE IF NOT EXISTS `migrations` (
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table e-registrar.migrations: ~15 rows (approximately)
DELETE FROM `migrations`;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` (`migration`, `batch`) VALUES
	('2013_11_01_220312_create_students_table', 1),
	('2013_11_01_220655_create_users_table', 2),
	('2013_11_01_235208_create_documents_table', 3),
	('2013_11_01_235410_create_reasons_table', 4),
	('2013_11_01_235502_create_requirements_table', 4),
	('2013_11_01_235809_create_request_table', 5),
	('2013_11_02_000345_create_document_request_table', 6),
	('2013_11_02_000530_create_reason_request_table', 7),
	('2013_11_02_000735_create_document_requirement_table', 8),
	('2013_12_20_102004_create_pages_table', 9),
	('2014_01_16_114333_create_levels_table', 10),
	('2014_01_17_171345_create_level_user_table', 11),
	('2014_01_22_171136_create_settings_table', 12),
	('2014_01_25_051800_create_labels_table', 13),
	('2014_01_30_045249_create_task_done_table', 14);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;


-- Dumping structure for table e-registrar.pages
DROP TABLE IF EXISTS `pages`;
CREATE TABLE IF NOT EXISTS `pages` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `content` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table e-registrar.pages: ~0 rows (approximately)
DELETE FROM `pages`;
/*!40000 ALTER TABLE `pages` DISABLE KEYS */;
/*!40000 ALTER TABLE `pages` ENABLE KEYS */;


-- Dumping structure for table e-registrar.reasons
DROP TABLE IF EXISTS `reasons`;
CREATE TABLE IF NOT EXISTS `reasons` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `others` tinyint(1) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table e-registrar.reasons: ~3 rows (approximately)
DELETE FROM `reasons`;
/*!40000 ALTER TABLE `reasons` DISABLE KEYS */;
INSERT INTO `reasons` (`id`, `name`, `others`, `created_at`, `updated_at`) VALUES
	(1, 'Passport', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(2, 'Transfering', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(3, 'Abroad', 0, '2013-12-11 03:18:31', '2013-12-11 03:18:31');
/*!40000 ALTER TABLE `reasons` ENABLE KEYS */;


-- Dumping structure for table e-registrar.reason_request
DROP TABLE IF EXISTS `reason_request`;
CREATE TABLE IF NOT EXISTS `reason_request` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `request_id` int(11) unsigned NOT NULL,
  `reason_id` int(11) unsigned NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  KEY `FK_reason_request_requests` (`request_id`),
  KEY `FK_reason_request_reasons` (`reason_id`),
  CONSTRAINT `FK_reason_request_reasons` FOREIGN KEY (`reason_id`) REFERENCES `reasons` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_reason_request_requests` FOREIGN KEY (`request_id`) REFERENCES `requests` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table e-registrar.reason_request: ~26 rows (approximately)
DELETE FROM `reason_request`;
/*!40000 ALTER TABLE `reason_request` DISABLE KEYS */;
INSERT INTO `reason_request` (`id`, `request_id`, `reason_id`, `created_at`, `updated_at`) VALUES
	(1, 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(2, 1, 2, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(3, 3, 2, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(4, 4, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(5, 4, 2, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(6, 5, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(7, 5, 2, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(8, 6, 3, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(9, 6, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(10, 7, 3, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(11, 7, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(12, 8, 3, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(13, 8, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(14, 9, 2, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(15, 10, 3, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(16, 10, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(17, 10, 2, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(18, 11, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(19, 11, 2, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(20, 12, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(21, 12, 2, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(22, 13, 3, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(23, 14, 3, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(24, 14, 2, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(25, 15, 3, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(26, 15, 2, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(27, 16, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(28, 16, 2, '0000-00-00 00:00:00', '0000-00-00 00:00:00');
/*!40000 ALTER TABLE `reason_request` ENABLE KEYS */;


-- Dumping structure for table e-registrar.requests
DROP TABLE IF EXISTS `requests`;
CREATE TABLE IF NOT EXISTS `requests` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `student_id` int(11) unsigned NOT NULL,
  `status` tinyint(1) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  KEY `FK_request_students` (`student_id`),
  CONSTRAINT `FK_request_students` FOREIGN KEY (`student_id`) REFERENCES `students` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table e-registrar.requests: ~15 rows (approximately)
DELETE FROM `requests`;
/*!40000 ALTER TABLE `requests` DISABLE KEYS */;
INSERT INTO `requests` (`id`, `student_id`, `status`, `created_at`, `updated_at`) VALUES
	(1, 1, 2, '2013-11-01 21:07:27', '2013-11-02 06:02:28'),
	(2, 2, 2, '2013-11-01 21:14:20', '2014-01-01 00:08:14'),
	(3, 3, 2, '0000-00-00 00:00:00', '2013-11-02 08:12:41'),
	(4, 1, 1, '2013-12-11 03:11:44', '2013-12-11 03:12:35'),
	(5, 1, 1, '2013-12-11 03:13:46', '2014-01-16 11:51:14'),
	(6, 2, 1, '2013-12-11 03:19:33', '2013-12-11 03:20:25'),
	(7, 2, 1, '2013-12-20 09:38:06', '2014-01-01 00:40:51'),
	(8, 2, 0, '2014-01-01 00:07:14', '2014-01-01 00:07:14'),
	(9, 1, 2, '2014-01-01 00:18:30', '2014-01-01 00:19:20'),
	(10, 2, 1, '2014-01-08 12:03:03', '2014-01-16 11:49:49'),
	(11, 2, 2, '2014-01-17 16:55:38', '2014-01-17 17:58:39'),
	(12, 1, 0, '2014-01-20 11:43:06', '2014-01-20 11:43:06'),
	(13, 2, 0, '2014-01-23 10:36:02', '2014-01-23 10:36:02'),
	(14, 1, 0, '2014-01-24 18:10:44', '2014-01-24 18:10:44'),
	(15, 1, 0, '2014-01-28 07:14:20', '2014-01-28 07:14:20'),
	(16, 1, 0, '2014-01-30 06:21:43', '2014-01-30 06:21:43');
/*!40000 ALTER TABLE `requests` ENABLE KEYS */;


-- Dumping structure for table e-registrar.requirements
DROP TABLE IF EXISTS `requirements`;
CREATE TABLE IF NOT EXISTS `requirements` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table e-registrar.requirements: ~6 rows (approximately)
DELETE FROM `requirements`;
/*!40000 ALTER TABLE `requirements` DISABLE KEYS */;
INSERT INTO `requirements` (`id`, `name`, `created_at`, `updated_at`) VALUES
	(1, 'Picture 2x2', '2013-11-15 12:24:05', '0000-00-00 00:00:00'),
	(2, 'NSO Birth Certificate', '2013-11-15 12:24:09', '0000-00-00 00:00:00'),
	(3, '1x1 Picture', '2013-11-15 12:24:12', '2014-01-30 04:30:56'),
	(4, 'New requirement', '2013-11-15 20:14:54', '2013-11-15 20:14:54'),
	(6, 'Old ID', '2013-11-15 22:08:43', '2013-11-15 22:08:43'),
	(7, 'Cedula', '2014-01-01 00:15:58', '2014-01-01 00:15:58');
/*!40000 ALTER TABLE `requirements` ENABLE KEYS */;


-- Dumping structure for table e-registrar.settings
DROP TABLE IF EXISTS `settings`;
CREATE TABLE IF NOT EXISTS `settings` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `site_name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `logo` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table e-registrar.settings: ~1 rows (approximately)
DELETE FROM `settings`;
/*!40000 ALTER TABLE `settings` DISABLE KEYS */;
INSERT INTO `settings` (`id`, `site_name`, `logo`) VALUES
	(1, 'Electronic Tracking System for NORSU Registrar\'s Office.', '');
/*!40000 ALTER TABLE `settings` ENABLE KEYS */;


-- Dumping structure for table e-registrar.students
DROP TABLE IF EXISTS `students`;
CREATE TABLE IF NOT EXISTS `students` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `studentID` int(11) NOT NULL,
  `fname` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `lname` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `mname` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `gender` enum('Male','Female') COLLATE utf8_unicode_ci NOT NULL,
  `civilstatus` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `bdate` date NOT NULL,
  `course` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `lya` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  UNIQUE KEY `students_studentid_unique` (`studentID`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table e-registrar.students: ~3 rows (approximately)
DELETE FROM `students`;
/*!40000 ALTER TABLE `students` DISABLE KEYS */;
INSERT INTO `students` (`id`, `studentID`, `fname`, `lname`, `mname`, `gender`, `civilstatus`, `bdate`, `course`, `lya`, `created_at`, `updated_at`) VALUES
	(1, 20131091, 'Asshurim', 'Larita', 'Ortado', 'Male', 'Single', '2013-11-01', 'BSINT', 2008, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(2, 20131092, 'Maverick', 'Merjuar', 'Dela Pena', 'Female', 'Single', '2013-11-01', 'BSBA', 2010, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(3, 201232, 'Mike', 'Chuma', 'Chemjor', 'Male', 'Single', '2013-11-02', 'BSINT', 2010, '0000-00-00 00:00:00', '0000-00-00 00:00:00');
/*!40000 ALTER TABLE `students` ENABLE KEYS */;


-- Dumping structure for table e-registrar.task_done
DROP TABLE IF EXISTS `task_done`;
CREATE TABLE IF NOT EXISTS `task_done` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `document_request_id` int(11) NOT NULL,
  `ref_id` int(11) NOT NULL,
  `type` enum('r','t') COLLATE utf8_unicode_ci NOT NULL COMMENT 'r=requirement, t=task',
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=39 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table e-registrar.task_done: ~16 rows (approximately)
DELETE FROM `task_done`;
/*!40000 ALTER TABLE `task_done` DISABLE KEYS */;
INSERT INTO `task_done` (`id`, `document_request_id`, `ref_id`, `type`, `created_at`, `updated_at`) VALUES
	(1, 42, 2, 'r', '2014-01-30 05:29:17', '2014-01-30 05:29:17'),
	(2, 42, 1, 'r', '2014-01-30 05:29:42', '2014-01-30 05:29:42'),
	(3, 42, 3, 'r', '2014-01-30 05:29:43', '2014-01-30 05:29:43'),
	(14, 40, 1, 'r', '2014-01-30 06:07:04', '2014-01-30 06:07:04'),
	(15, 40, 2, 'r', '2014-01-30 06:07:05', '2014-01-30 06:07:05'),
	(16, 40, 7, 'r', '2014-01-30 06:07:06', '2014-01-30 06:07:06'),
	(17, 34, 1, 'r', '2014-01-30 06:07:51', '2014-01-30 06:07:51'),
	(19, 34, 2, 'r', '2014-01-30 06:07:54', '2014-01-30 06:07:54'),
	(20, 48, 1, 'r', '2014-01-30 06:11:17', '2014-01-30 06:11:17'),
	(21, 48, 2, 'r', '2014-01-30 06:11:18', '2014-01-30 06:11:18'),
	(22, 45, 4, 'r', '2014-01-30 06:11:59', '2014-01-30 06:11:59'),
	(23, 43, 3, 'r', '2014-01-30 06:12:40', '2014-01-30 06:12:40'),
	(24, 43, 6, 'r', '2014-01-30 06:12:41', '2014-01-30 06:12:41'),
	(25, 32, 1, 'r', '2014-01-30 06:13:34', '2014-01-30 06:13:34'),
	(26, 32, 2, 'r', '2014-01-30 06:13:35', '2014-01-30 06:13:35'),
	(27, 29, 1, 'r', '2014-01-30 06:14:03', '2014-01-30 06:14:03'),
	(28, 3, 1, 'r', '2014-01-30 06:22:53', '2014-01-30 06:22:53'),
	(29, 3, 2, 'r', '2014-01-30 06:22:54', '2014-01-30 06:22:54'),
	(30, 3, 6, 'r', '2014-01-30 06:22:55', '2014-01-30 06:22:55'),
	(31, 3, 7, 'r', '2014-01-30 06:22:56', '2014-01-30 06:22:56'),
	(32, 3, 4, 'r', '2014-01-30 06:22:57', '2014-01-30 06:22:57'),
	(33, 4, 1, 'r', '2014-01-30 06:29:54', '2014-01-30 06:29:54'),
	(34, 4, 2, 'r', '2014-01-30 06:29:56', '2014-01-30 06:29:56'),
	(35, 3, 3, 'r', '2014-01-30 06:30:13', '2014-01-30 06:30:13'),
	(38, 1, 1, 'r', '2014-01-30 06:30:44', '2014-01-30 06:30:44');
/*!40000 ALTER TABLE `task_done` ENABLE KEYS */;


-- Dumping structure for table e-registrar.users
DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `fname` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `lname` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `suspended` tinyint(1) NOT NULL DEFAULT '1' COMMENT '0=Suspended, 1=Active',
  `is_admin` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table e-registrar.users: ~8 rows (approximately)
DELETE FROM `users`;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` (`id`, `username`, `password`, `fname`, `lname`, `suspended`, `is_admin`, `created_at`, `updated_at`) VALUES
	(2, 'admin', '$2y$10$rPzmJHlV4JyuZEQPuX6gu.Gk6zSIBpVGLIlUaLpoglFqpcUSRGgjW', 'Asshurim', 'Larita', 0, 1, '0000-00-00 00:00:00', '2014-01-20 11:46:10'),
	(6, 'test', '$2y$10$3japfeER3xOpJnZCk2FGOeJKn./Yq9V7HQpOtCQKRgG6fYvaGMviW', 'Test', 'Test', 0, 0, '2014-01-20 09:44:43', '2014-01-25 05:43:24'),
	(7, 'as', '$2y$10$xBsEZcf3haffy8ea6zjwEuPmeUJnN/Vz/bgr/hfA8sfCegCpN0zke', 'as', 'as', 1, 0, '2014-01-20 09:45:54', '2014-01-20 09:45:54'),
	(9, 'mike', '$2y$10$5TvBvgRoTUawM6aPftOQW.5uMUT9QS.JUE5iQCk/VbN1L2cMHH2nm', 'mike', 'chumba', 1, 1, '2014-01-20 10:47:12', '2014-01-22 01:15:46'),
	(10, 'yahn', '$2y$10$vHf0XCZnPPm8g1.3uaWWoOHv8LAPSC/HOB9tW25HZqJZ2DYsvvhvi', 'Yahn', 'Nah!', 1, 0, '2014-01-20 11:04:52', '2014-01-20 11:52:53'),
	(11, 'ash', '$2y$10$xFgMAl2qGfBlpehu0e6UzuA2B8SzPnqdw80mMGmCss4PRDc1OE9SO', 'asshurim', 'larita', 0, 0, '2014-01-23 02:28:50', '2014-01-23 02:29:04'),
	(12, 'briggs', '$2y$10$1BztBkBFQl/fwMmnF3MQz.Xfe9tE03.MGGtlDA6ucVTsYCedmdTEO', 'Briggs ', 'Horcerada', 0, 0, '2014-01-25 10:02:13', '2014-01-25 10:04:26'),
	(13, 'drose', '$2y$10$p5mnamMiGW5m0p9UevHB1eFz.2DhQ6lnqJJ96pRj8gEC5nVVTDltu', 'Drose', 'Bolo', 0, 0, '2014-01-28 07:12:45', '2014-01-28 07:13:08');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
