
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
DROP TABLE IF EXISTS `jupiter_wpgmza`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `jupiter_wpgmza` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `map_id` int(11) NOT NULL,
  `address` varchar(700) NOT NULL,
  `description` mediumtext NOT NULL,
  `pic` varchar(700) NOT NULL,
  `link` varchar(700) NOT NULL,
  `icon` varchar(700) NOT NULL,
  `lat` varchar(100) NOT NULL,
  `lng` varchar(100) NOT NULL,
  `anim` varchar(3) NOT NULL,
  `title` varchar(700) NOT NULL,
  `infoopen` varchar(3) NOT NULL,
  `category` varchar(500) NOT NULL,
  `approved` tinyint(1) DEFAULT 1,
  `retina` tinyint(1) DEFAULT 0,
  `type` tinyint(1) DEFAULT 0,
  `did` varchar(500) NOT NULL,
  `other_data` longtext NOT NULL,
  `latlng` point DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

LOCK TABLES `jupiter_wpgmza` WRITE;
/*!40000 ALTER TABLE `jupiter_wpgmza` DISABLE KEYS */;
INSERT INTO `jupiter_wpgmza` VALUES (3,1,'-26.76386243582146, 152.84814941883084','','','','','-26.763862','152.848149','0','','0','',1,0,0,'','','\0\0\0\0\0\0\0þ~}ŒÃ:Àÿÿ?\n$c@');
/*!40000 ALTER TABLE `jupiter_wpgmza` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

