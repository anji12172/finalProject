CREATE DATABASE  IF NOT EXISTS `classinvoicer` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `classinvoicer`;
-- MySQL dump 10.13  Distrib 5.6.17, for Win32 (x86)
--
-- Host: localhost    Database: classinvoicer
-- ------------------------------------------------------
-- Server version	5.6.16

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
-- Table structure for table `ci_consultants`
--

DROP TABLE IF EXISTS `ci_consultants`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ci_consultants` (
  `conslt_id` int(11) NOT NULL AUTO_INCREMENT,
  `conslt_name` varchar(255) NOT NULL,
  `conslt_skill` varchar(255) NOT NULL,
  `conslt_buy_price` double NOT NULL,
  `conslt_sell_price` double NOT NULL,
  `client_id` int(11) DEFAULT NULL,
  `emp_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`conslt_id`),
  KEY `FK_ci_consultant_1` (`client_id`),
  KEY `FK_ci_consultant_2` (`emp_id`),
  CONSTRAINT `FK_ci_consultant_1` FOREIGN KEY (`client_id`) REFERENCES `ci_clients` (`client_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_ci_consultant_2` FOREIGN KEY (`emp_id`) REFERENCES `ci_employer` (`emp_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ci_consultants`
--

LOCK TABLES `ci_consultants` WRITE;
/*!40000 ALTER TABLE `ci_consultants` DISABLE KEYS */;
INSERT INTO `ci_consultants` VALUES (1,'NONE','NULL',0,0,NULL,NULL),(2,'Bell India','bell',150060,2500060,NULL,NULL);
/*!40000 ALTER TABLE `ci_consultants` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2015-12-19  5:54:58
