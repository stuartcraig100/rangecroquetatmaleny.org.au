
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
DROP TABLE IF EXISTS `jupiter_em_locations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `jupiter_em_locations` (
  `location_id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `post_id` bigint(20) unsigned NOT NULL,
  `blog_id` bigint(20) unsigned DEFAULT NULL,
  `location_slug` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `location_name` mediumtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `location_owner` bigint(20) unsigned NOT NULL DEFAULT 0,
  `location_address` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `location_town` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `location_state` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `location_postcode` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `location_region` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `location_country` char(2) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `location_latitude` float(10,6) DEFAULT NULL,
  `location_longitude` float(10,6) DEFAULT NULL,
  `post_content` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `location_status` int(1) DEFAULT NULL,
  `location_private` tinyint(1) NOT NULL DEFAULT 0,
  PRIMARY KEY (`location_id`),
  KEY `location_state` (`location_state`(191)),
  KEY `location_region` (`location_region`(191)),
  KEY `location_country` (`location_country`),
  KEY `post_id` (`post_id`),
  KEY `blog_id` (`blog_id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

LOCK TABLES `jupiter_em_locations` WRITE;
/*!40000 ALTER TABLE `jupiter_em_locations` DISABLE KEYS */;
INSERT INTO `jupiter_em_locations` VALUES (1,217,0,'range-croquet-club','Range Croquet Club',1,'Maleny-Stanley River Road','Maleny','Queensland','4552',NULL,'AU',NULL,NULL,NULL,1,0),(2,454,0,'nambour-croquet-club','Nambour Croquet Club',1,'78 Coronation Ave','Nambour','Queensland','4560',NULL,'AU',NULL,NULL,NULL,1,0),(3,455,0,'noosa-croquet-club','Noosa Croquet Club',1,'9 Seashell Place, ','Noosaville','Queensland','4566',NULL,'AU',NULL,NULL,NULL,1,0),(4,456,0,'headland-buderim-croquet-club','Headland Buderim Croquet Club',1,'Syd Lingard Drive','Buderim','Queensland','4556',NULL,'AU',NULL,NULL,NULL,1,0),(5,457,0,'croquet-club-bribie-island','Croquet Club Bribie Island',1,'Cosmos Park Sunderland Drive','Banksia Beach','Queensland','4507',NULL,'AU',NULL,NULL,NULL,1,0),(6,458,0,'coolum-croquet-club','Coolum Croquet Club',1,'25 Seacove Lane','Coolum Beach','Queensland','4573',NULL,'AU',NULL,NULL,NULL,1,0),(7,477,0,'caloundra-croquet-club','Caloundra Croquet Club',1,'78 Arthur St','Caloundra','Queensland','4551',NULL,'AU',NULL,NULL,NULL,1,0);
/*!40000 ALTER TABLE `jupiter_em_locations` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

