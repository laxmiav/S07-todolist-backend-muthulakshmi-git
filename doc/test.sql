
-- Adminer 4.7.6 MySQL dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

SET NAMES utf8mb4;

DROP TABLE IF EXISTS `categories`;
CREATE TABLE `categories` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(64) NOT NULL COMMENT 'Le nom de la catégorie',
  `status` tinyint(1) NOT NULL DEFAULT 0 COMMENT 'Le statut du category (1=dispo, 2=pas dispo)',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() COMMENT 'La date de création de la catégorie',
  `updated_at` timestamp NULL DEFAULT NULL COMMENT 'La date de la dernière mise à jour de la catégorie',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


DROP TABLE IF EXISTS `status`;
CREATE TABLE `status` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(64) NOT NULL COMMENT 'Le nom de la status',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() COMMENT 'La date de création de la status',
  `updated_at` timestamp NULL DEFAULT NULL COMMENT 'La date de la dernière mise à jour de la status',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


DROP TABLE IF EXISTS `tasks`;
CREATE TABLE `tasks` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(45) NOT NULL COMMENT 'Le nom du tache',
  `completion` int(45) NOT NULL DEFAULT 0 COMMENT 'completion du tache',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() COMMENT 'La date de création du tache',
  `updated_at` timestamp NULL DEFAULT NULL COMMENT 'La date de la dernière mise à jour du tache',
  `status_id` int(10) unsigned NOT NULL,
  `category_id` int(10) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_tasks_status_id` (`status_id`),
  KEY `fk_tasks_category_id` (`category_id`),
  CONSTRAINT `tasks_ibfk_3` FOREIGN KEY (`status_id`) REFERENCES `status` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `tasks_ibfk_4` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


-- 2022-01-30 17:41:21
