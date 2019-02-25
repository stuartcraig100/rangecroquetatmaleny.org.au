
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
DROP TABLE IF EXISTS `smackuci_events`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `smackuci_events` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `revision` bigint(20) NOT NULL DEFAULT 0,
  `name` varchar(255) COLLATE utf8mb4_unicode_520_ci DEFAULT NULL,
  `original_file_name` varchar(255) COLLATE utf8mb4_unicode_520_ci DEFAULT NULL,
  `friendly_name` varchar(255) COLLATE utf8mb4_unicode_520_ci DEFAULT NULL,
  `import_type` varchar(32) COLLATE utf8mb4_unicode_520_ci DEFAULT NULL,
  `filetype` text COLLATE utf8mb4_unicode_520_ci DEFAULT NULL,
  `filepath` text COLLATE utf8mb4_unicode_520_ci DEFAULT NULL,
  `eventKey` varchar(32) COLLATE utf8mb4_unicode_520_ci DEFAULT NULL,
  `registered_on` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `parent_node` varchar(255) COLLATE utf8mb4_unicode_520_ci DEFAULT NULL,
  `processing` tinyint(1) NOT NULL DEFAULT 0,
  `executing` tinyint(1) NOT NULL DEFAULT 0,
  `triggered` tinyint(1) NOT NULL DEFAULT 0,
  `event_started_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `count` bigint(20) NOT NULL DEFAULT 0,
  `processed` bigint(20) NOT NULL DEFAULT 0,
  `created` bigint(20) NOT NULL DEFAULT 0,
  `updated` bigint(20) NOT NULL DEFAULT 0,
  `skipped` bigint(20) NOT NULL DEFAULT 0,
  `deleted` bigint(20) NOT NULL DEFAULT 0,
  `is_terminated` tinyint(1) NOT NULL DEFAULT 0,
  `terminated_on` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `last_activity` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `siteid` int(11) NOT NULL DEFAULT 1,
  `month` varchar(60) COLLATE utf8mb4_unicode_520_ci DEFAULT NULL,
  `year` varchar(60) COLLATE utf8mb4_unicode_520_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

LOCK TABLES `smackuci_events` WRITE;
/*!40000 ALTER TABLE `smackuci_events` DISABLE KEYS */;
/*!40000 ALTER TABLE `smackuci_events` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

