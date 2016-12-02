# ************************************************************
# Sequel Pro SQL dump
# Version 4541
#
# http://www.sequelpro.com/
# https://github.com/sequelpro/sequelpro
#
# Hôte: 127.0.0.1 (MySQL 5.5.5-10.1.16-MariaDB)
# Base de données: mvc
# Temps de génération: 2016-12-02 08:36:30 +0000
# ************************************************************


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


# Affichage de la table hours
# ------------------------------------------------------------

DROP TABLE IF EXISTS `hours`;

CREATE TABLE `hours` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `id_stop` int(11) DEFAULT NULL,
  `id_line` int(11) DEFAULT NULL,
  `way` tinyint(1) DEFAULT NULL,
  `hour` time DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `hours` WRITE;
/*!40000 ALTER TABLE `hours` DISABLE KEYS */;

INSERT INTO `hours` (`id`, `id_stop`, `id_line`, `way`, `hour`)
VALUES
	(1,1,21,0,'08:14:00'),
	(2,1,21,0,'10:33:00'),
	(3,1,21,0,'11:33:00'),
	(4,1,21,0,'12:33:00'),
	(5,1,21,0,'13:33:00'),
	(6,1,21,0,'14:18:00'),
	(7,1,21,0,'15:33:00'),
	(8,2,21,0,'08:14:00'),
	(9,2,21,0,'10:33:00'),
	(10,2,21,0,'11:33:00'),
	(11,2,21,0,'12:33:00'),
	(12,2,21,0,'13:33:00'),
	(13,2,21,0,'14:18:00'),
	(14,2,21,0,'15:33:00'),
	(15,3,21,0,'08:16:00'),
	(16,3,21,0,'10:35:00'),
	(17,3,21,0,'11:35:00'),
	(18,3,21,0,'12:35:00'),
	(19,3,21,0,'13:35:00'),
	(20,3,21,0,'14:20:00'),
	(21,3,21,0,'15:35:00'),
	(22,4,21,0,'08:17:00'),
	(23,4,21,0,'10:36:00'),
	(24,4,21,0,'11:36:00'),
	(25,4,21,0,'12:36:00'),
	(26,4,21,0,'13:36:00'),
	(27,4,21,0,'14:21:00'),
	(28,4,21,0,'15:36:00'),
	(29,5,21,0,'08:18:00'),
	(30,5,21,0,'10:37:00'),
	(31,5,21,0,'11:37:00'),
	(32,5,21,0,'12:37:00'),
	(33,5,21,0,'13:37:00'),
	(34,5,21,0,'14:22:00'),
	(35,5,21,0,'15:37:00'),
	(36,6,21,0,'08:19:00'),
	(37,6,21,0,'10:38:00'),
	(38,6,21,0,'11:38:00'),
	(39,6,21,0,'12:38:00'),
	(40,6,21,0,'13:38:00'),
	(41,6,21,0,'14:23:00'),
	(42,6,21,0,'15:38:00'),
	(43,7,21,0,'08:20:00'),
	(44,7,21,0,'10:39:00'),
	(45,7,21,0,'11:39:00'),
	(46,7,21,0,'12:39:00'),
	(47,7,21,0,'13:39:00'),
	(48,7,21,0,'14:24:00'),
	(49,7,21,0,'15:39:00'),
	(50,8,21,0,'08:21:00'),
	(51,8,21,0,'10:40:00'),
	(52,8,21,0,'11:40:00'),
	(53,8,21,0,'12:40:00'),
	(54,8,21,0,'13:40:00'),
	(55,8,21,0,'14:25:00'),
	(56,8,21,0,'15:40:00'),
	(57,1,21,1,'11:27:00'),
	(58,1,21,1,'12:27:00'),
	(59,1,21,1,'13:27:00'),
	(60,1,21,1,'14:00:00'),
	(61,1,21,1,'15:27:00'),
	(62,1,21,1,'17:15:00'),
	(63,2,21,1,'11:25:00'),
	(64,2,21,1,'12:25:00'),
	(65,2,21,1,'13:25:00'),
	(66,2,21,1,'13:58:00'),
	(67,2,21,1,'15:25:00'),
	(68,2,21,1,'17:13:00'),
	(69,3,21,1,'11:23:00'),
	(70,3,21,1,'12:23:00'),
	(71,3,21,1,'13:23:00'),
	(72,3,21,1,'13:56:00'),
	(73,3,21,1,'15:23:00'),
	(74,3,21,1,'17:11:00'),
	(75,4,21,1,'11:22:00'),
	(76,4,21,1,'12:22:00'),
	(77,4,21,1,'13:22:00'),
	(78,4,21,1,'13:55:00'),
	(79,4,21,1,'15:22:00'),
	(80,4,21,1,'17:10:00'),
	(81,5,21,1,'11:20:00'),
	(82,5,21,1,'12:20:00'),
	(83,5,21,1,'13:20:00'),
	(84,5,21,1,'13:53:00'),
	(85,5,21,1,'15:20:00'),
	(86,5,21,1,'17:08:00'),
	(87,7,21,1,'11:17:00'),
	(88,7,21,1,'12:17:00'),
	(89,7,21,1,'13:17:00'),
	(90,7,21,1,'13:50:00'),
	(91,7,21,1,'15:17:00'),
	(92,7,21,1,'17:05:00'),
	(93,8,21,1,'11:15:00'),
	(94,8,21,1,'12:15:00'),
	(95,8,21,1,'13:15:00'),
	(96,8,21,1,'13:48:00'),
	(97,8,21,1,'15:15:00'),
	(98,8,21,1,'17:03:00');

/*!40000 ALTER TABLE `hours` ENABLE KEYS */;
UNLOCK TABLES;


# Affichage de la table stops
# ------------------------------------------------------------

DROP TABLE IF EXISTS `stops`;

CREATE TABLE `stops` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) DEFAULT NULL,
  `line` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `stops` WRITE;
/*!40000 ALTER TABLE `stops` DISABLE KEYS */;

INSERT INTO `stops` (`id`, `name`, `line`)
VALUES
	(1,'Peloux Gare','21'),
	(2,'Peloux','21'),
	(3,'Ferry','21'),
	(4,'Crouy','21'),
	(5,'Valery','21'),
	(6,'Arbelles','21'),
	(7,'Providence','21'),
	(8,'Sources','21');

/*!40000 ALTER TABLE `stops` ENABLE KEYS */;
UNLOCK TABLES;


# Affichage de la table users
# ------------------------------------------------------------

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `lastname` varchar(45) DEFAULT NULL,
  `firstname` varchar(45) DEFAULT NULL,
  `arretMaison` varchar(45) DEFAULT NULL,
  `arretTravail` varchar(45) DEFAULT NULL,
  `login` varchar(45) DEFAULT NULL,
  `password` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;

INSERT INTO `users` (`id`, `lastname`, `firstname`, `arretMaison`, `arretTravail`, `login`, `password`)
VALUES
	(12,'Turon-Lagot','Robin','Oyards','Norelan',NULL,NULL),
	(13,NULL,NULL,NULL,NULL,NULL,NULL),
	(14,NULL,NULL,NULL,NULL,NULL,NULL),
	(15,NULL,NULL,NULL,NULL,NULL,NULL),
	(16,NULL,NULL,NULL,NULL,NULL,NULL),
	(17,'t','t','t','t',NULL,NULL),
	(18,'t','t','t','t',NULL,NULL),
	(19,'j','j','j','j',NULL,NULL),
	(20,'j','j','j','j',NULL,NULL),
	(21,'\'','\'','\'','\'',NULL,NULL),
	(22,'\"','\"','\"','\"',NULL,NULL),
	(23,'t','t','t','t',NULL,NULL),
	(24,'j','j','j','j',NULL,NULL),
	(25,'j','j','j','j',NULL,NULL),
	(26,'jean',NULL,NULL,NULL,NULL,NULL),
	(27,'test','test','test','test',NULL,NULL),
	(28,'test','test',NULL,NULL,'test','test'),
	(29,'test2','test2',NULL,NULL,'test2','test');

/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;



/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
