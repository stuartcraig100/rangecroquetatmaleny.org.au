
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
DROP TABLE IF EXISTS `jupiter_participants_database`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `jupiter_participants_database` (
  `id` int(6) NOT NULL AUTO_INCREMENT,
  `private_id` varchar(9) COLLATE utf8_unicode_ci DEFAULT NULL,
  `first_name` tinytext COLLATE utf8_unicode_ci DEFAULT NULL,
  `last_name` tinytext COLLATE utf8_unicode_ci DEFAULT NULL,
  `address` tinytext COLLATE utf8_unicode_ci DEFAULT NULL,
  `city` tinytext COLLATE utf8_unicode_ci DEFAULT NULL,
  `state` tinytext COLLATE utf8_unicode_ci DEFAULT NULL,
  `country` tinytext COLLATE utf8_unicode_ci DEFAULT NULL,
  `zip` tinytext COLLATE utf8_unicode_ci DEFAULT NULL,
  `phone` tinytext COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` tinytext COLLATE utf8_unicode_ci DEFAULT NULL,
  `mailing_list` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `photo` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `website` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `interests` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `approved` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `date_recorded` timestamp NULL DEFAULT current_timestamp(),
  `date_updated` timestamp NULL DEFAULT NULL,
  `last_accessed` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

LOCK TABLES `jupiter_participants_database` WRITE;
/*!40000 ALTER TABLE `jupiter_participants_database` DISABLE KEYS */;
INSERT INTO `jupiter_participants_database` VALUES (1,'DU9GL','Stuart','Craig','9 Pepper Berry Drive','Maleny',NULL,NULL,'4552','54942990','stuart_craig100@hotmail.com','No',NULL,NULL,NULL,'no','2019-01-16 05:52:23','2019-01-16 05:52:23',NULL);
/*!40000 ALTER TABLE `jupiter_participants_database` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

