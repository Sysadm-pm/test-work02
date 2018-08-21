-- Adminer 4.3.1 MySQL dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

DROP TABLE IF EXISTS `obj_contracts`;
CREATE TABLE `obj_contracts` (
  `id_contract` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `id_customer` int(11) NOT NULL,
  `number` varchar(100) NOT NULL,
  `date_sign` date NOT NULL,
  `staff_number` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id_contract`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

INSERT INTO `obj_contracts` (`id_contract`, `id_customer`, `number`, `date_sign`, `staff_number`) VALUES
(1,	1,	'122',	'2018-08-21',	'1'),
(4,	2,	'33',	'2018-08-10',	'1212');

DROP TABLE IF EXISTS `obj_customers`;
CREATE TABLE `obj_customers` (
  `id_customer` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name_customer` varchar(250) NOT NULL,
  `company` enum('company_1','company_2','company_3') NOT NULL,
  PRIMARY KEY (`id_customer`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

INSERT INTO `obj_customers` (`id_customer`, `name_customer`, `company`) VALUES
(1,	'Jhon1',	'company_1'),
(2,	'Rachel',	'company_2');

DROP TABLE IF EXISTS `obj_services`;
CREATE TABLE `obj_services` (
  `id_service` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `id_contract` int(11) NOT NULL,
  `title_service` varchar(250) NOT NULL,
  `status` enum('work','connecting','disconnected') NOT NULL,
  PRIMARY KEY (`id_service`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

INSERT INTO `obj_services` (`id_service`, `id_contract`, `title_service`, `status`) VALUES
(1,	1,	'some service1',	'work'),
(3,	1,	'some service 2',	'connecting'),
(4,	1,	'some service 3',	'disconnected'),
(5,	2,	'some service 4',	'work');

DROP TABLE IF EXISTS `pages`;
CREATE TABLE `pages` (
  `id` tinyint(3) unsigned NOT NULL AUTO_INCREMENT,
  `alias` varchar(100) NOT NULL,
  `title` varchar(100) NOT NULL,
  `content` text,
  `is_published` tinyint(1) unsigned DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

INSERT INTO `pages` (`id`, `alias`, `title`, `content`, `is_published`) VALUES
(2,	'qwe',	'Some page',	'qweqweqwe',	1),
(4,	'Some page 2',	'Some page 2',	'Some page 2Some page 2Some page 2Some page 2Some page 2',	1),
(5,	'Some page 3',	'Some page 3',	'Some page 3Some page 3Some page 3Some page 3Some page 3Some page 3Some page 3Some page 3Some page 3Some page 3Some page 3Some page 3Some page 3',	1);

SET NAMES utf8mb4;

DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;


-- 2018-08-21 14:30:53
