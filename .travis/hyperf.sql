# ************************************************************
# Sequel Pro SQL dump
# Version 5446
#
# https://www.sequelpro.com/
# https://github.com/sequelpro/sequelpro
#
# Host: 127.0.0.1 (MySQL 5.7.30)
# Database: hyperf
# Generation Time: 2020-09-27 03:07:36 +0000
# ************************************************************


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
SET NAMES utf8mb4;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


# Dump of table book
# ------------------------------------------------------------

DROP TABLE IF EXISTS `book`;

CREATE TABLE `book` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) unsigned NOT NULL,
  `title` varchar(128) NOT NULL DEFAULT '',
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

LOCK TABLES `book` WRITE;
/*!40000 ALTER TABLE `book` DISABLE KEYS */;

INSERT INTO `book` (`id`, `user_id`, `title`, `created_at`, `updated_at`)
VALUES
	(1,1,'Hyperf Guide','2018-01-01 00:00:00','2018-01-01 00:00:00'),
	(2,1,'Hyperf Guide 2019','2018-01-02 00:00:00','2018-01-02 00:00:00'),
	(3,2,'Hyperf Component Guide','2018-01-02 00:00:00','2018-01-02 00:00:00');

/*!40000 ALTER TABLE `book` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table images
# ------------------------------------------------------------

DROP TABLE IF EXISTS `images`;

CREATE TABLE `images` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `url` varchar(128) NOT NULL DEFAULT '',
  `imageable_id` int(10) unsigned NOT NULL,
  `imageable_type` varchar(32) NOT NULL DEFAULT '',
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

LOCK TABLES `images` WRITE;
/*!40000 ALTER TABLE `images` DISABLE KEYS */;

INSERT INTO `images` (`id`, `url`, `imageable_id`, `imageable_type`, `created_at`, `updated_at`)
VALUES
	(1,'https://avatars2.githubusercontent.com/u/44228082?s=200&v=4',1,'user','2018-01-01 00:00:00','2018-01-01 00:00:00'),
	(2,'https://avatars2.githubusercontent.com/u/44228082?s=200&v=4',2,'user','2018-01-01 00:00:00','2018-01-01 00:00:00'),
	(3,'https://avatars2.githubusercontent.com/u/44228082?s=200&v=4',1,'book','2018-01-01 00:00:00','2018-01-01 00:00:00'),
	(4,'https://avatars2.githubusercontent.com/u/44228082?s=200&v=4',2,'book','2018-01-01 00:00:00','2018-01-01 00:00:00'),
	(5,'https://avatars2.githubusercontent.com/u/44228082?s=200&v=4',3,'book','2018-01-01 00:00:00','2018-01-01 00:00:00'),
	(6,'https://avatars2.githubusercontent.com/u/44228082?s=200&v=4',0,'','2018-01-01 00:00:00','2018-01-01 00:00:00');

/*!40000 ALTER TABLE `images` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table role
# ------------------------------------------------------------

DROP TABLE IF EXISTS `role`;

CREATE TABLE `role` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(32) NOT NULL DEFAULT '',
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

LOCK TABLES `role` WRITE;
/*!40000 ALTER TABLE `role` DISABLE KEYS */;

INSERT INTO `role` (`id`, `name`, `created_at`, `updated_at`)
VALUES
	(1,'author','2018-01-01 00:00:00','2018-01-01 00:00:00');

/*!40000 ALTER TABLE `role` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table user
# ------------------------------------------------------------

DROP TABLE IF EXISTS `user`;

CREATE TABLE `user` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(32) NOT NULL DEFAULT '' COMMENT 'user name',
  `gender` tinyint(3) unsigned NOT NULL DEFAULT '0' COMMENT '0:unknow 1:male 2:female',
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

LOCK TABLES `user` WRITE;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;

INSERT INTO `user` (`id`, `name`, `gender`, `created_at`, `updated_at`)
VALUES
	(1,'Hyperf',1,'2018-01-01 00:00:00','2019-06-05 03:27:14'),
	(2,'Hyperflex',1,'2019-01-01 00:00:00','2019-02-16 09:59:36'),
	(3,'Hidden',1,'2019-01-01 00:00:00','2020-09-24 10:06:22'),
	(100,'John',0,NULL,NULL),
	(101,'5f6c6d164b4e9',2,NULL,NULL),
	(102,'5f6c6d164d5f1',1,NULL,NULL),
	(104,'trans5f6c6d1651aba',0,NULL,NULL),
	(209,'5f6c76c71c2fb',2,NULL,NULL),
	(210,'5f6c76c71de45',0,NULL,NULL),
	(212,'trans5f6c76c721edf',2,NULL,NULL);

/*!40000 ALTER TABLE `user` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table user_ext
# ------------------------------------------------------------

DROP TABLE IF EXISTS `user_ext`;

CREATE TABLE `user_ext` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `count` int(10) unsigned NOT NULL DEFAULT '0',
  `float_num` decimal(10,2) DEFAULT '0.00',
  `str` varchar(16) DEFAULT NULL,
  `json` json DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

LOCK TABLES `user_ext` WRITE;
/*!40000 ALTER TABLE `user_ext` DISABLE KEYS */;

INSERT INTO `user_ext` (`id`, `count`, `float_num`, `str`, `json`, `created_at`, `updated_at`)
VALUES
	(1,0,1.20,'','{\"id\": 1}','2019-03-13 02:38:04','2020-09-17 10:43:39'),
	(2,0,0.00,NULL,NULL,'2019-02-07 16:24:02','2019-02-17 04:44:41');

/*!40000 ALTER TABLE `user_ext` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table user_role
# ------------------------------------------------------------

DROP TABLE IF EXISTS `user_role`;

CREATE TABLE `user_role` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) NOT NULL,
  `role_id` bigint(20) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

LOCK TABLES `user_role` WRITE;
/*!40000 ALTER TABLE `user_role` DISABLE KEYS */;

INSERT INTO `user_role` (`id`, `user_id`, `role_id`, `created_at`, `updated_at`)
VALUES
	(1,1,1,'2018-01-01 00:00:00','2020-09-11 10:37:12'),
	(2,2,1,'2018-01-01 00:00:00','2018-01-01 00:00:00');

/*!40000 ALTER TABLE `user_role` ENABLE KEYS */;
UNLOCK TABLES;



/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
