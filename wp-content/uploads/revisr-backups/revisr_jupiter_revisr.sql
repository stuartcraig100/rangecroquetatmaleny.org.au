
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
DROP TABLE IF EXISTS `jupiter_revisr`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `jupiter_revisr` (
  `id` mediumint(9) NOT NULL AUTO_INCREMENT,
  `time` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `message` text DEFAULT NULL,
  `event` varchar(42) NOT NULL,
  `user` varchar(60) DEFAULT NULL,
  UNIQUE KEY `id` (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=29 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

LOCK TABLES `jupiter_revisr` WRITE;
/*!40000 ALTER TABLE `jupiter_revisr` DISABLE KEYS */;
INSERT INTO `jupiter_revisr` VALUES (1,'2018-12-16 10:28:55','Successfully created a new repository.','init','jupiteradmin'),(2,'2018-12-16 10:50:03','Committed <a href=\"http://rangecroquetatmaleny.org.au/wp-admin/admin.php?page=revisr_view_commit&commit=f33a043&success=true\">#f33a043</a> to the local repository.','commit','jupiteradmin'),(3,'2018-12-16 10:50:06','Error pushing changes to the remote repository.','error','jupiteradmin'),(4,'2018-12-16 10:55:20','Successfully backed up the database.','backup','jupiteradmin'),(5,'2018-12-16 10:55:27','Committed <a href=\"http://rangecroquetatmaleny.org.au/wp-admin/admin.php?page=revisr_view_commit&commit=148a748&success=true\">#148a748</a> to the local repository.','commit','jupiteradmin'),(6,'2018-12-16 10:55:29','Error pushing changes to the remote repository.','error','jupiteradmin'),(7,'2018-12-20 11:38:21','There was an error committing the changes to the local repository.','error','jupiteradmin'),(8,'2018-12-20 11:38:51','Committed <a href=\"http://rangecroquetatmaleny.org.au/wp-admin/admin.php?page=revisr_view_commit&commit=d6d81a6&success=true\">#d6d81a6</a> to the local repository.','commit','jupiteradmin'),(9,'2018-12-20 11:38:54','Error pushing changes to the remote repository.','error','jupiteradmin'),(10,'2018-12-22 23:06:37','Committed <a href=\"http://rangecroquetatmaleny.org.au/wp-admin/admin.php?page=revisr_view_commit&commit=78b771c&success=true\">#78b771c</a> to the local repository.','commit','jupiteradmin'),(11,'2018-12-22 23:06:39','Error pushing changes to the remote repository.','error','jupiteradmin'),(12,'2019-01-12 21:45:40','Committed <a href=\"http://rangecroquetatmaleny.org.au/wp-admin/admin.php?page=revisr_view_commit&commit=4326c55&success=true\">#4326c55</a> to the local repository.','commit','jupiteradmin'),(13,'2019-01-12 21:45:43','Error pushing changes to the remote repository.','error','jupiteradmin'),(14,'2019-01-15 04:12:19','Committed <a href=\"http://rangecroquetatmaleny.org.au/wp-admin/admin.php?page=revisr_view_commit&commit=af96f75&success=true\">#af96f75</a> to the local repository.','commit','jupiteradmin'),(15,'2019-01-15 04:12:21','Error pushing changes to the remote repository.','error','jupiteradmin'),(16,'2019-01-16 09:48:48','Successfully created a new repository.','init','jupiteradmin'),(17,'2019-01-16 09:51:44','Error backing up the database.','error','jupiteradmin'),(18,'2019-01-16 11:08:05','There was an error committing the changes to the local repository.','error','jupiteradmin'),(19,'2019-01-16 11:15:20','Committed <a href=\"http://rangecroquetatmaleny.org.au/wp-admin/admin.php?page=revisr_view_commit&commit=dad4b6a&success=true\">#dad4b6a</a> to the local repository.','commit','jupiteradmin'),(20,'2019-01-25 13:22:27','Committed <a href=\"http://rangecroquetatmaleny.org.au/wp-admin/admin.php?page=revisr_view_commit&commit=86dee6c&success=true\">#86dee6c</a> to the local repository.','commit','jupiteradmin'),(21,'2019-01-25 13:23:35','Successfully pushed 2 commits to origin/master.','push','jupiteradmin'),(22,'2019-01-27 22:49:41','Committed <a href=\"http://rangecroquetatmaleny.org.au/wp-admin/admin.php?page=revisr_view_commit&commit=4fd8ea9&success=true\">#4fd8ea9</a> to the local repository.','commit','jupiteradmin'),(23,'2019-01-27 22:50:10','Successfully pushed 1 commit to origin/master.','push','jupiteradmin'),(24,'2019-01-31 20:33:13','Committed <a href=\"http://rangecroquetatmaleny.org.au/wp-admin/admin.php?page=revisr_view_commit&commit=8f80e40&success=true\">#8f80e40</a> to the local repository.','commit','jupiteradmin'),(25,'2019-01-31 20:33:40','Successfully pushed 1 commit to origin/master.','push','jupiteradmin'),(26,'2019-02-04 21:22:08','Committed <a href=\"http://rangecroquetatmaleny.org.au/wp-admin/admin.php?page=revisr_view_commit&commit=0a273d7&success=true\">#0a273d7</a> to the local repository.','commit','jupiteradmin'),(27,'2019-02-10 20:39:04','Committed <a href=\"http://rangecroquetatmaleny.org.au/wp-admin/admin.php?page=revisr_view_commit&commit=cfed2f7&success=true\">#cfed2f7</a> to the local repository.','commit','jupiteradmin'),(28,'2019-02-10 20:39:35','Successfully pushed 1 commit to origin/master.','push','jupiteradmin');
/*!40000 ALTER TABLE `jupiter_revisr` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

