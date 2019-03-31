
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
DROP TABLE IF EXISTS `jupiter_bsk_pdf_manager_pdfs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `jupiter_bsk_pdf_manager_pdfs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cat_id` varchar(32) COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `order_num` int(11) DEFAULT NULL,
  `thumbnail_id` int(11) DEFAULT NULL,
  `title` varchar(512) COLLATE utf8mb4_unicode_520_ci DEFAULT NULL,
  `file_name` varchar(512) COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `description` varchar(512) COLLATE utf8mb4_unicode_520_ci DEFAULT NULL,
  `by_media_uploader` int(11) DEFAULT 0,
  `last_date` datetime DEFAULT NULL,
  `weekday` varchar(8) COLLATE utf8mb4_unicode_520_ci DEFAULT NULL,
  `download_count` int(11) DEFAULT 0,
  `publish_date` datetime DEFAULT NULL,
  `expiry_date` datetime DEFAULT NULL,
  UNIQUE KEY `id` (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=20 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

LOCK TABLES `jupiter_bsk_pdf_manager_pdfs` WRITE;
/*!40000 ALTER TABLE `jupiter_bsk_pdf_manager_pdfs` DISABLE KEYS */;
INSERT INTO `jupiter_bsk_pdf_manager_pdfs` VALUES (1,'999999',NULL,NULL,'Southport Tournament March 2019','wp-content/uploads/bsk-pdf-manager/2018/12/southporttournamentmarch2019.pdf','',0,'2018-12-20 00:00:00',NULL,0,NULL,'0000-00-00 00:00:00'),(2,'999999',NULL,NULL,'Gold Coast tournament July 2019','wp-content/uploads/bsk-pdf-manager/2018/12/flyergoldcoasttournament1907.pdf','',0,'2018-12-20 00:00:00',NULL,0,NULL,'0000-00-00 00:00:00'),(3,'999999',NULL,NULL,'Sunshine Coast Tournament April 2019','wp-content/uploads/bsk-pdf-manager/2018/12/sunshinecoasttournamentapril2019.pdf','',0,'2018-12-20 00:00:00',NULL,0,NULL,'0000-00-00 00:00:00'),(4,'999999',NULL,NULL,'Croquet Newsletter Nov-Dec 2018','wp-content/uploads/bsk-pdf-manager/2018/12/Issue-6-Nov._Dec.-2018-Croquet-Newsletter-Publisher-Version3001.pdf','',0,'2018-12-22 00:00:00',NULL,0,NULL,NULL),(6,'999999',NULL,NULL,'Newsletter 7 February 2019','wp-content/uploads/bsk-pdf-manager/2019/02/The-Range-croquet-070219.pdf','',0,'2019-02-06 00:00:00',NULL,0,NULL,NULL),(8,'999999',NULL,NULL,'Newsletter 11 February 2019','wp-content/uploads/bsk-pdf-manager/2019/02/The-Range-croquet-110219.pdf','',0,'2019-02-10 00:00:00',NULL,0,NULL,NULL),(9,'999999',NULL,NULL,'Croquet Newsletter Jan/Feb 2019','wp-content/uploads/bsk-pdf-manager/2019/02/Issue-1-Croquet-Newsletter-Jan_-Feb.-2019-Publisher-version3562.pdf','',0,'2019-02-11 00:00:00',NULL,0,NULL,NULL),(10,'999999',NULL,NULL,'Newsletter 18 February 2019','wp-content/uploads/bsk-pdf-manager/2019/02/The-Range-croquet-180219.pdf','',0,'2019-02-17 00:00:00',NULL,0,NULL,NULL),(11,'999999',NULL,NULL,'Newsletter 28 February 2019','wp-content/uploads/bsk-pdf-manager/2019/02/The-Range-croquet-280219.pdf','',0,'2019-02-28 00:00:00',NULL,0,NULL,NULL),(12,'999999',NULL,NULL,'Newsletter 4 March 2019','wp-content/uploads/bsk-pdf-manager/2019/03/The-Range-croquet-190304.pdf','',0,'2019-03-03 00:00:00',NULL,0,NULL,NULL),(13,'999999',NULL,NULL,'Newsletter 14 March 2019','wp-content/uploads/bsk-pdf-manager/2019/03/The-Range-croquet-190314.pdf','',0,'2019-03-13 00:00:00',NULL,0,NULL,NULL),(14,'999999',NULL,NULL,'Newsletter 21 March 2019','wp-content/uploads/bsk-pdf-manager/2019/03/The-Range-croquet-190321.pdf','',0,'2019-03-20 00:00:00',NULL,0,NULL,NULL),(15,'999999',NULL,NULL,'Contact Details','wp-content/uploads/bsk-pdf-manager/2019/03/PLAYERS-CONTACT-DETAILS-FEBRUARY-2019-1.pdf','',0,'2019-03-23 00:00:00',NULL,0,NULL,NULL),(16,'999999',NULL,NULL,'Meeting 9 March 2019','wp-content/uploads/bsk-pdf-manager/2019/03/MINUTES-MARCH-MEETING-20194252.pdf','',0,'2019-03-23 00:00:00',NULL,0,NULL,NULL),(17,'999999',NULL,NULL,'Treasurer\'s Report february 2019','wp-content/uploads/bsk-pdf-manager/2019/03/Trreasurers-report-Feb-2019.pdf','',0,'2019-03-23 00:00:00',NULL,0,NULL,NULL),(18,'999999',NULL,NULL,'Newsletter 28 March 2019','wp-content/uploads/bsk-pdf-manager/2019/03/The-Range-croquet-190328.pdf','',0,'2019-03-27 00:00:00',NULL,0,NULL,NULL),(19,'999999',NULL,NULL,'Newsletter 1 April 2019','wp-content/uploads/bsk-pdf-manager/2019/04/The-Range-croquet-190401.pdf','',0,'2019-04-01 00:00:00',NULL,0,NULL,NULL);
/*!40000 ALTER TABLE `jupiter_bsk_pdf_manager_pdfs` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

