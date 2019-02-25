
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
DROP TABLE IF EXISTS `jupiter_em_events`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `jupiter_em_events` (
  `event_id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `post_id` bigint(20) unsigned NOT NULL,
  `event_slug` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `event_owner` bigint(20) unsigned DEFAULT NULL,
  `event_status` int(1) DEFAULT NULL,
  `event_name` mediumtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `event_start_date` date DEFAULT NULL,
  `event_end_date` date DEFAULT NULL,
  `event_start_time` time DEFAULT NULL,
  `event_end_time` time DEFAULT NULL,
  `event_all_day` int(1) DEFAULT NULL,
  `event_start` datetime DEFAULT NULL,
  `event_end` datetime DEFAULT NULL,
  `event_timezone` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `post_content` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `event_rsvp` tinyint(1) NOT NULL DEFAULT 0,
  `event_rsvp_date` date DEFAULT NULL,
  `event_rsvp_time` time DEFAULT NULL,
  `event_rsvp_spaces` int(5) DEFAULT NULL,
  `event_spaces` int(5) DEFAULT 0,
  `event_private` tinyint(1) NOT NULL DEFAULT 0,
  `location_id` bigint(20) unsigned DEFAULT NULL,
  `recurrence_id` bigint(20) unsigned DEFAULT NULL,
  `event_date_created` datetime DEFAULT NULL,
  `event_date_modified` datetime DEFAULT NULL,
  `recurrence` tinyint(1) DEFAULT 0,
  `recurrence_interval` int(4) DEFAULT NULL,
  `recurrence_freq` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `recurrence_byday` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `recurrence_byweekno` int(4) DEFAULT NULL,
  `recurrence_days` int(4) DEFAULT NULL,
  `recurrence_rsvp_days` int(3) DEFAULT NULL,
  `blog_id` bigint(20) unsigned DEFAULT NULL,
  `group_id` bigint(20) unsigned DEFAULT NULL,
  PRIMARY KEY (`event_id`),
  KEY `event_status` (`event_status`),
  KEY `post_id` (`post_id`),
  KEY `blog_id` (`blog_id`),
  KEY `group_id` (`group_id`),
  KEY `location_id` (`location_id`),
  KEY `event_start` (`event_start`),
  KEY `event_end` (`event_end`),
  KEY `event_start_date` (`event_start_date`),
  KEY `event_end_date` (`event_end_date`)
) ENGINE=MyISAM AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

LOCK TABLES `jupiter_em_events` WRITE;
/*!40000 ALTER TABLE `jupiter_em_events` DISABLE KEYS */;
INSERT INTO `jupiter_em_events` VALUES (1,213,'gold-coast-tournament-2019',1,1,'Gold Coast Tournament July 2019','2019-07-06','2019-07-09','08:00:00','17:00:00',0,'2019-07-05 22:00:00','2019-07-09 07:00:00','Australia/Brisbane','[pdf-embedder url=\"http://rangecroquetatmaleny.org.au/wp-content/uploads/2018/12/flyergoldcoasttournament1907.pdf\"]',0,NULL,NULL,NULL,NULL,0,0,NULL,'2018-12-22 12:42:01','2018-12-22 13:14:34',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0),(2,216,'rcc-monthly-meetings',1,1,'RCC Monthly Meetings','2019-01-01','2020-01-01','09:00:00','10:00:00',0,'2018-12-31 23:00:00','2020-01-01 00:00:00','Australia/Brisbane','',0,NULL,NULL,NULL,NULL,0,1,NULL,'2018-12-22 12:49:19','2018-12-22 12:53:10',1,1,'monthly','6',3,0,NULL,NULL,0),(3,218,'rcc-monthly-meetings-2019-01-19',1,1,'RCC Monthly Meetings','2019-01-19','2019-01-19','09:00:00','10:00:00',0,'2019-01-18 23:00:00','2019-01-19 00:00:00','Australia/Brisbane',NULL,0,'2019-01-19',NULL,NULL,NULL,0,1,2,'2018-12-22 12:53:10',NULL,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0),(4,219,'rcc-monthly-meetings-2019-02-16',1,1,'RCC Monthly Meetings','2019-02-16','2019-02-16','09:00:00','10:00:00',0,'2019-02-15 23:00:00','2019-02-16 00:00:00','Australia/Brisbane',NULL,0,'2019-02-16',NULL,NULL,NULL,0,1,2,'2018-12-22 12:53:10',NULL,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0),(5,220,'rcc-monthly-meetings-2019-03-16',1,1,'RCC Monthly Meetings','2019-03-16','2019-03-16','09:00:00','10:00:00',0,'2019-03-15 23:00:00','2019-03-16 00:00:00','Australia/Brisbane',NULL,0,'2019-03-16',NULL,NULL,NULL,0,1,2,'2018-12-22 12:53:10',NULL,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0),(6,221,'rcc-monthly-meetings-2019-04-20',1,1,'RCC Monthly Meetings','2019-04-20','2019-04-20','09:00:00','10:00:00',0,'2019-04-19 23:00:00','2019-04-20 00:00:00','Australia/Brisbane',NULL,0,'2019-04-20',NULL,NULL,NULL,0,1,2,'2018-12-22 12:53:10',NULL,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0),(7,222,'rcc-monthly-meetings-2019-05-18',1,1,'RCC Monthly Meetings','2019-05-18','2019-05-18','09:00:00','10:00:00',0,'2019-05-17 23:00:00','2019-05-18 00:00:00','Australia/Brisbane',NULL,0,'2019-05-18',NULL,NULL,NULL,0,1,2,'2018-12-22 12:53:10',NULL,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0),(8,223,'rcc-monthly-meetings-2019-06-15',1,1,'RCC Monthly Meetings','2019-06-15','2019-06-15','09:00:00','10:00:00',0,'2019-06-14 23:00:00','2019-06-15 00:00:00','Australia/Brisbane',NULL,0,'2019-06-15',NULL,NULL,NULL,0,1,2,'2018-12-22 12:53:10',NULL,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0),(9,224,'rcc-monthly-meetings-2019-07-20',1,1,'RCC Monthly Meetings','2019-07-20','2019-07-20','09:00:00','10:00:00',0,'2019-07-19 23:00:00','2019-07-20 00:00:00','Australia/Brisbane',NULL,0,'2019-07-20',NULL,NULL,NULL,0,1,2,'2018-12-22 12:53:10',NULL,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0),(10,225,'rcc-monthly-meetings-2019-08-17',1,1,'RCC Monthly Meetings','2019-08-17','2019-08-17','09:00:00','10:00:00',0,'2019-08-16 23:00:00','2019-08-17 00:00:00','Australia/Brisbane',NULL,0,'2019-08-17',NULL,NULL,NULL,0,1,2,'2018-12-22 12:53:10',NULL,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0),(11,226,'rcc-monthly-meetings-2019-09-21',1,1,'RCC Monthly Meetings','2019-09-21','2019-09-21','09:00:00','10:00:00',0,'2019-09-20 23:00:00','2019-09-21 00:00:00','Australia/Brisbane',NULL,0,'2019-09-21',NULL,NULL,NULL,0,1,2,'2018-12-22 12:53:10',NULL,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0),(12,227,'rcc-monthly-meetings-2019-10-19',1,1,'RCC Monthly Meetings','2019-10-19','2019-10-19','09:00:00','10:00:00',0,'2019-10-18 23:00:00','2019-10-19 00:00:00','Australia/Brisbane',NULL,0,'2019-10-19',NULL,NULL,NULL,0,1,2,'2018-12-22 12:53:10',NULL,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0),(13,228,'rcc-monthly-meetings-2019-11-16',1,1,'RCC Monthly Meetings','2019-11-16','2019-11-16','09:00:00','10:00:00',0,'2019-11-15 23:00:00','2019-11-16 00:00:00','Australia/Brisbane',NULL,0,'2019-11-16',NULL,NULL,NULL,0,1,2,'2018-12-22 12:53:10',NULL,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0),(14,229,'rcc-monthly-meetings-2019-12-21',1,1,'RCC Monthly Meetings','2019-12-21','2019-12-21','09:00:00','10:00:00',0,'2019-12-20 23:00:00','2019-12-21 00:00:00','Australia/Brisbane',NULL,0,'2019-12-21',NULL,NULL,NULL,0,1,2,'2018-12-22 12:53:10',NULL,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0);
/*!40000 ALTER TABLE `jupiter_em_events` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

