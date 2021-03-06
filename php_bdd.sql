-- MySQL dump 10.13  Distrib 5.7.12, for osx10.9 (x86_64)
--
-- Host: localhost    Database: mvc
-- ------------------------------------------------------
-- Server version	5.5.5-10.1.16-MariaDB

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `hours`
--

DROP TABLE IF EXISTS `hours`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `hours` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `id_line_stop` int(11) unsigned DEFAULT NULL,
  `hour` time DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `hours`
--

LOCK TABLES `hours` WRITE;
/*!40000 ALTER TABLE `hours` DISABLE KEYS */;
INSERT INTO `hours` VALUES (1,1,'08:14:00'),(2,2,'08:14:00'),(3,3,'08:16:00'),(4,4,'08:17:00'),(5,5,'08:18:00'),(6,6,'08:19:00'),(7,7,'08:20:00'),(8,8,'08:21:00'),(9,1,'10:33:00'),(10,1,'11:33:00'),(11,1,'12:33:00'),(12,1,'13:33:00'),(13,1,'15:33:00');
/*!40000 ALTER TABLE `hours` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `line_stop`
--

DROP TABLE IF EXISTS `line_stop`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `line_stop` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `id_line` int(11) unsigned DEFAULT NULL,
  `id_stop` int(11) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `id_stop_idx` (`id_stop`),
  KEY `id_line_idx` (`id_line`),
  CONSTRAINT `id_line` FOREIGN KEY (`id_line`) REFERENCES `lines` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `id_stop` FOREIGN KEY (`id_stop`) REFERENCES `stops` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `line_stop`
--

LOCK TABLES `line_stop` WRITE;
/*!40000 ALTER TABLE `line_stop` DISABLE KEYS */;
INSERT INTO `line_stop` VALUES (1,10,1),(2,10,2),(3,10,3),(4,10,4),(5,10,5),(6,10,6),(7,10,7),(8,10,8),(9,9,8),(10,9,7),(11,9,5),(12,9,4),(13,9,3),(14,9,2),(15,9,1);
/*!40000 ALTER TABLE `line_stop` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `lines`
--

DROP TABLE IF EXISTS `lines`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `lines` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `number` int(11) DEFAULT NULL,
  `terminuses` varchar(45) NOT NULL,
  `way` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `lines`
--

LOCK TABLES `lines` WRITE;
/*!40000 ALTER TABLE `lines` DISABLE KEYS */;
INSERT INTO `lines` VALUES (1,1,'Oyards/Verlaine',0),(2,1,'Oyards/Verlaine',1),(3,2,'Norelan/Ainterexpo',0),(4,2,'Norelan/Ainterexpo',1),(5,3,'Péronnas blés d\'or/Alagnier',0),(6,3,'Péronnas blés d\'or/Alagnier',1),(7,4,'St Denis Collège/Clinique Convert',0),(8,4,'St Denis Collège/Clinique Convert',1),(9,21,'Peloux Gare/Sources',0),(10,21,'Peloux Gare/Sources',1);
/*!40000 ALTER TABLE `lines` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `stops`
--

DROP TABLE IF EXISTS `stops`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `stops` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `stops`
--

LOCK TABLES `stops` WRITE;
/*!40000 ALTER TABLE `stops` DISABLE KEYS */;
INSERT INTO `stops` VALUES (1,'Peloux Gare'),(2,'Peloux'),(3,'Ferry'),(4,'Crouy'),(5,'Valery'),(6,'Arbelles'),(7,'Providence'),(8,'Sources');
/*!40000 ALTER TABLE `stops` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `lastname` varchar(45) DEFAULT NULL,
  `firstname` varchar(45) DEFAULT NULL,
  `arretMaison` varchar(45) DEFAULT NULL,
  `arretTravail` varchar(45) DEFAULT NULL,
  `login` varchar(45) DEFAULT NULL,
  `password` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (12,'Turon-Lagot','Robin','Oyards','Norelan',NULL,NULL),(13,NULL,NULL,NULL,NULL,NULL,NULL),(14,NULL,NULL,NULL,NULL,NULL,NULL),(15,NULL,NULL,NULL,NULL,NULL,NULL),(16,NULL,NULL,NULL,NULL,NULL,NULL),(17,'t','t','t','t',NULL,NULL),(18,'t','t','t','t',NULL,NULL),(19,'j','j','j','j',NULL,NULL),(20,'j','j','j','j',NULL,NULL),(21,'\'','\'','\'','\'',NULL,NULL),(22,'\"','\"','\"','\"',NULL,NULL),(23,'t','t','t','t',NULL,NULL),(24,'j','j','j','j',NULL,NULL),(25,'j','j','j','j',NULL,NULL),(26,'jean',NULL,NULL,NULL,NULL,NULL),(27,'test','test','test','test',NULL,NULL),(28,'test','test',NULL,NULL,'test','test'),(29,'test2','test2',NULL,NULL,'test2','test'),(30,NULL,NULL,NULL,NULL,NULL,NULL);
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2017-02-03 11:18:06
