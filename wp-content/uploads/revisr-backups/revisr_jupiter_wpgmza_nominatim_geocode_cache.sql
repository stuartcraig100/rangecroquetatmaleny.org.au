
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
DROP TABLE IF EXISTS `jupiter_wpgmza_nominatim_geocode_cache`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `jupiter_wpgmza_nominatim_geocode_cache` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `query` varchar(512) DEFAULT NULL,
  `response` text DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

LOCK TABLES `jupiter_wpgmza_nominatim_geocode_cache` WRITE;
/*!40000 ALTER TABLE `jupiter_wpgmza_nominatim_geocode_cache` DISABLE KEYS */;
INSERT INTO `jupiter_wpgmza_nominatim_geocode_cache` VALUES (1,'1284 landsborough maleny rd maleny australia','[{\\\"place_id\\\":\\\"148899453\\\",\\\"licence\\\":\\\"Data © OpenStreetMap contributors, ODbL 1.0. https://osm.org/copyright\\\",\\\"osm_type\\\":\\\"way\\\",\\\"osm_id\\\":\\\"319055522\\\",\\\"boundingbox\\\":[\\\"-26.7758551\\\",\\\"-26.7682616\\\",\\\"152.8850462\\\",\\\"152.8928146\\\"],\\\"lat\\\":\\\"-26.770838\\\",\\\"lon\\\":\\\"152.8890431\\\",\\\"display_name\\\":\\\"Landsborough-Maleny Road, Maleny, Queensland, 4552, Australia\\\",\\\"class\\\":\\\"highway\\\",\\\"type\\\":\\\"primary\\\",\\\"importance\\\":0.5,\\\"geometry\\\":{\\\"location\\\":{\\\"_lat\\\":-26.770838,\\\"_lng\\\":152.8890431}},\\\"latLng\\\":{\\\"lat\\\":-26.770838,\\\"lng\\\":152.8890431},\\\"lng\\\":\\\"152.8890431\\\"},{\\\"place_id\\\":\\\"149315095\\\",\\\"licence\\\":\\\"Data © OpenStreetMap contributors, ODbL 1.0. https://osm.org/copyright\\\",\\\"osm_type\\\":\\\"way\\\",\\\"osm_id\\\":\\\"319055124\\\",\\\"boundingbox\\\":[\\\"-26.7966078\\\",\\\"-26.7751334\\\",\\\"152.8928146\\\",\\\"152.9388263\\\"],\\\"lat\\\":\\\"-26.7852826\\\",\\\"lon\\\":\\\"152.920438\\\",\\\"display_name\\\":\\\"Landsborough-Maleny Road, Landsborough, Queensland, 4552, Australia\\\",\\\"class\\\":\\\"highway\\\",\\\"type\\\":\\\"primary\\\",\\\"importance\\\":0.5,\\\"geometry\\\":{\\\"location\\\":{\\\"_lat\\\":-26.7852826,\\\"_lng\\\":152.920438}},\\\"latLng\\\":{\\\"lat\\\":-26.7852826,\\\"lng\\\":152.920438},\\\"lng\\\":\\\"152.920438\\\"}]');
/*!40000 ALTER TABLE `jupiter_wpgmza_nominatim_geocode_cache` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

