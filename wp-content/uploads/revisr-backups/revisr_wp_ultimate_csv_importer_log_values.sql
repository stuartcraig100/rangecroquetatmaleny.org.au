
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
DROP TABLE IF EXISTS `wp_ultimate_csv_importer_log_values`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `wp_ultimate_csv_importer_log_values` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `eventKey` varchar(50) COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `recordId` int(10) NOT NULL,
  `module` varchar(50) COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `method_of_import` varchar(50) COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `log_message` blob NOT NULL,
  `imported_time` varchar(100) COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `mode_of_import` varchar(100) COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `sequence` varchar(100) COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `status` varchar(100) COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `assigned_user_id` int(10) NOT NULL,
  `imported_by` int(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

LOCK TABLES `wp_ultimate_csv_importer_log_values` WRITE;
/*!40000 ALTER TABLE `wp_ultimate_csv_importer_log_values` DISABLE KEYS */;
/*!40000 ALTER TABLE `wp_ultimate_csv_importer_log_values` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

