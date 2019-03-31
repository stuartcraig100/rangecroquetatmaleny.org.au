
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
DROP TABLE IF EXISTS `jupiter_bsk_pdf_manager_cats`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `jupiter_bsk_pdf_manager_cats` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `parent` int(11) DEFAULT 0,
  `title` varchar(512) COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `description` varchar(512) COLLATE utf8mb4_unicode_520_ci DEFAULT NULL,
  `password` varchar(32) COLLATE utf8mb4_unicode_520_ci DEFAULT NULL,
  `empty_message` varchar(512) COLLATE utf8mb4_unicode_520_ci DEFAULT NULL,
  `last_date` datetime DEFAULT NULL,
  UNIQUE KEY `id` (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

LOCK TABLES `jupiter_bsk_pdf_manager_cats` WRITE;
/*!40000 ALTER TABLE `jupiter_bsk_pdf_manager_cats` DISABLE KEYS */;
INSERT INTO `jupiter_bsk_pdf_manager_cats` VALUES (1,0,'Local Tournaments','',NULL,'','2018-12-20 00:00:00'),(2,0,'Croquet Newsletters','',NULL,'','2018-12-22 00:00:00'),(3,0,'Weekly Newsletter','',NULL,'','2019-01-16 00:00:00'),(4,0,'Membership List','','','','2019-03-23 00:00:00'),(5,0,'Club Meeting Minutes','','','','2019-03-23 00:00:00');
/*!40000 ALTER TABLE `jupiter_bsk_pdf_manager_cats` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

