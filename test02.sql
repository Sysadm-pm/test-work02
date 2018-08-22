-- Adminer 4.3.1 MySQL dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

DROP TABLE IF EXISTS `obj_contracts`;
CREATE TABLE `obj_contracts` (
  `id_contract` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `id_customer` int(11) DEFAULT NULL,
  `number` varchar(100) NOT NULL,
  `date_sign` date NOT NULL,
  `staff_number` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id_contract`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

INSERT INTO `obj_contracts` (`id_contract`, `id_customer`, `number`, `date_sign`, `staff_number`) VALUES
(4,	2,	'33',	'2018-08-10',	'1212'),
(6,	1,	'22',	'2018-08-20',	'1'),
(7,	2,	'12123',	'2018-08-22',	'1');

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
(1,	1,	'some service 1',	'work'),
(3,	1,	'some service 2',	'connecting'),
(4,	1,	'some service 3',	'disconnected'),
(5,	4,	'some service 4',	'work'),
(6,	4,	'some service 5',	'work'),
(7,	4,	'some service 6',	'work');

-- 2018-08-22 14:06:54
