# ************************************************************
# Sequel Pro SQL dump
# Version 4541
#
# http://www.sequelpro.com/
# https://github.com/sequelpro/sequelpro
#
# Hôte: 127.0.0.1 (MySQL 5.5.5-10.1.16-MariaDB)
# Base de données: mvc
# Temps de génération: 2016-11-30 15:57:20 +0000
# ************************************************************


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


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
