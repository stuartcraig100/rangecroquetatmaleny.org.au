
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
DROP TABLE IF EXISTS `jupiter_participants_database_fields`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `jupiter_participants_database_fields` (
  `id` int(3) NOT NULL AUTO_INCREMENT,
  `order` int(3) NOT NULL DEFAULT 0,
  `name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `title` tinytext COLLATE utf8_unicode_ci NOT NULL,
  `default` tinytext COLLATE utf8_unicode_ci DEFAULT NULL,
  `group` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `help_text` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `form_element` tinytext COLLATE utf8_unicode_ci DEFAULT NULL,
  `values` longtext COLLATE utf8_unicode_ci DEFAULT NULL,
  `options` longtext COLLATE utf8_unicode_ci DEFAULT NULL,
  `attributes` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `validation` tinytext COLLATE utf8_unicode_ci DEFAULT NULL,
  `validation_message` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `display_column` int(3) DEFAULT 0,
  `admin_column` int(3) DEFAULT 0,
  `sortable` tinyint(1) DEFAULT 0,
  `CSV` tinyint(1) DEFAULT 0,
  `persistent` tinyint(1) DEFAULT 0,
  `signup` tinyint(1) DEFAULT 0,
  `readonly` tinyint(1) DEFAULT 0,
  PRIMARY KEY (`id`),
  UNIQUE KEY `name` (`name`),
  KEY `order` (`order`),
  KEY `group` (`group`)
) ENGINE=MyISAM AUTO_INCREMENT=20 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

LOCK TABLES `jupiter_participants_database_fields` WRITE;
/*!40000 ALTER TABLE `jupiter_participants_database_fields` DISABLE KEYS */;
INSERT INTO `jupiter_participants_database_fields` VALUES (1,0,'first_name','First Name',NULL,'main',NULL,'text-line',NULL,NULL,NULL,'yes',NULL,1,2,1,1,0,1,0),(2,1,'last_name','Last Name',NULL,'main',NULL,'text-line',NULL,NULL,NULL,'yes',NULL,2,3,1,1,0,1,0),(3,2,'address','Address',NULL,'main',NULL,'text-line',NULL,NULL,NULL,'no',NULL,0,0,0,1,0,0,0),(4,3,'city','City',NULL,'main',NULL,'text-line',NULL,NULL,NULL,'no',NULL,0,0,1,1,1,0,0),(5,4,'state','State',NULL,'main',NULL,'text-line',NULL,NULL,NULL,'no',NULL,0,0,1,1,1,0,0),(6,5,'country','Country',NULL,'main',NULL,'text-line',NULL,NULL,NULL,'no',NULL,0,0,1,1,1,0,0),(7,6,'zip','Zip Code',NULL,'main',NULL,'text-line',NULL,NULL,NULL,'no',NULL,0,0,1,1,1,0,0),(8,7,'phone','Phone',NULL,'main','Your primary contact number','text-line',NULL,NULL,NULL,'no',NULL,3,0,0,1,0,0,0),(9,8,'email','Email',NULL,'main',NULL,'text-line',NULL,NULL,NULL,'#^[A-Z0-9._%+-]+@[A-Z0-9.-]+\\.[A-Z]{2,4}$#i',NULL,4,4,0,1,0,1,0),(10,9,'mailing_list','Mailing List','Yes','main','do you want to receive our newsletter and occasional announcements?','checkbox',NULL,'a:2:{i:0;s:3:\"Yes\";i:1;s:2:\"No\";}',NULL,'no',NULL,0,0,1,1,0,1,0),(11,10,'photo','Photo',NULL,'personal','Upload a photo of yourself. 300 pixels maximum width or height.','image-upload',NULL,NULL,NULL,'no',NULL,0,0,0,0,0,0,0),(12,11,'website','Website, Blog or Social Media Link',NULL,'personal','Put the URL in the left box and the link text that will be shown on the right','link',NULL,NULL,NULL,'no',NULL,0,0,0,0,0,0,0),(13,12,'interests','Interests or Hobbies',NULL,'personal',NULL,'multi-select-other',NULL,'a:7:{s:6:\"Sports\";s:6:\"sports\";s:11:\"Photography\";s:11:\"photography\";s:10:\"Art/Crafts\";s:6:\"crafts\";s:8:\"Outdoors\";s:8:\"outdoors\";s:4:\"Yoga\";s:4:\"yoga\";s:5:\"Music\";s:5:\"music\";s:7:\"Cuisine\";s:7:\"cuisine\";}',NULL,'no',NULL,0,0,0,0,0,0,0),(14,13,'approved','Approved','no','admin',NULL,'checkbox',NULL,'a:2:{i:0;s:3:\"yes\";i:1;s:2:\"no\";}',NULL,'no',NULL,0,0,1,0,0,0,0),(15,14,'id','Record ID',NULL,'internal',NULL,'text-line',NULL,NULL,NULL,'no',NULL,0,0,0,1,0,1,1),(16,15,'private_id','Private ID','RPNE2','internal',NULL,'text',NULL,NULL,NULL,'no',NULL,0,90,0,0,0,1,1),(17,16,'date_recorded','Date Recorded',NULL,'internal',NULL,'timestamp',NULL,NULL,NULL,'no',NULL,0,100,1,0,0,0,1),(18,17,'date_updated','Date Updated',NULL,'internal',NULL,'timestamp',NULL,NULL,NULL,'no',NULL,0,0,1,0,0,0,1),(19,18,'last_accessed','Last Accessed',NULL,'internal',NULL,'timestamp',NULL,NULL,NULL,'no',NULL,0,0,1,0,0,0,1);
/*!40000 ALTER TABLE `jupiter_participants_database_fields` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

