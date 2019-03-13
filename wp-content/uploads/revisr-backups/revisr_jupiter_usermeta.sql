
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
DROP TABLE IF EXISTS `jupiter_usermeta`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `jupiter_usermeta` (
  `umeta_id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) unsigned NOT NULL DEFAULT 0,
  `meta_key` varchar(255) COLLATE utf8mb4_unicode_520_ci DEFAULT NULL,
  `meta_value` longtext COLLATE utf8mb4_unicode_520_ci DEFAULT NULL,
  PRIMARY KEY (`umeta_id`),
  KEY `user_id` (`user_id`),
  KEY `meta_key` (`meta_key`(191))
) ENGINE=MyISAM AUTO_INCREMENT=84 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

LOCK TABLES `jupiter_usermeta` WRITE;
/*!40000 ALTER TABLE `jupiter_usermeta` DISABLE KEYS */;
INSERT INTO `jupiter_usermeta` VALUES (1,1,'nickname','jupiteradmin'),(2,1,'first_name',''),(3,1,'last_name',''),(4,1,'description',''),(5,1,'rich_editing','true'),(6,1,'syntax_highlighting','true'),(7,1,'comment_shortcuts','false'),(8,1,'admin_color','fresh'),(9,1,'use_ssl','0'),(10,1,'show_admin_bar_front','true'),(11,1,'locale',''),(12,1,'jupiter_capabilities','a:1:{s:13:\"administrator\";b:1;}'),(13,1,'jupiter_user_level','10'),(14,1,'dismissed_wp_pointers','wp496_privacy,text_widget_custom_html,theme_editor_notice'),(15,1,'show_welcome_panel','1'),(16,1,'session_tokens','a:1:{s:64:\"2e80021cc0ffd3d5744589df5528065e547d54aef99b489846c7afd37b25fa37\";a:4:{s:10:\"expiration\";i:1552645689;s:2:\"ip\";s:38:\"2001:8003:71ca:1e00:801:a573:aace:9ca3\";s:2:\"ua\";s:129:\"Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/64.0.3282.140 Safari/537.36 Edge/17.17134\";s:5:\"login\";i:1552472889;}}'),(17,1,'jupiter_user-settings','libraryContent=browse&urlbutton=none&align=left&editor=tinymce&imgsize=full&post_dfw=off&wplink=1&advImgDetails=show&uploader=1'),(18,1,'jupiter_user-settings-time','1548585128'),(19,1,'jupiter_dashboard_quick_press_last_post_id','446'),(20,1,'nav_menu_recently_edited','6'),(21,1,'managenav-menuscolumnshidden','a:5:{i:0;s:11:\"link-target\";i:1;s:11:\"css-classes\";i:2;s:3:\"xfn\";i:3;s:11:\"description\";i:4;s:15:\"title-attribute\";}'),(22,1,'metaboxhidden_nav-menus','a:4:{i:0;s:23:\"add-post-type-portfolio\";i:1;s:12:\"add-post_tag\";i:2;s:22:\"add-portfolio_category\";i:3;s:17:\"add-portfolio_tag\";}'),(23,1,'closedpostboxes_page','a:0:{}'),(24,1,'metaboxhidden_page','a:0:{}'),(73,3,'syntax_highlighting','true'),(25,1,'community-events-location','a:1:{s:2:\"ip\";s:21:\"2001:8003:71ca:1e00::\";}'),(26,1,'manageedit-eventcolumnshidden','a:1:{i:0;s:8:\"event-id\";}'),(27,1,'manageedit-locationcolumnshidden','a:1:{i:0;s:11:\"location-id\";}'),(82,1,'closedpostboxes_attachment','a:0:{}'),(83,1,'metaboxhidden_attachment','a:4:{i:0;s:16:\"commentstatusdiv\";i:1;s:11:\"commentsdiv\";i:2;s:7:\"slugdiv\";i:3;s:9:\"authordiv\";}'),(68,3,'nickname','user'),(69,3,'first_name','us'),(70,3,'last_name','er'),(71,3,'description',''),(72,3,'rich_editing','true'),(74,3,'comment_shortcuts','false'),(75,3,'admin_color','fresh'),(76,3,'use_ssl','0'),(77,3,'show_admin_bar_front','true'),(78,3,'locale',''),(79,3,'jupiter_capabilities','a:1:{s:10:\"subscriber\";b:1;}'),(80,3,'jupiter_user_level','0'),(81,3,'dismissed_wp_pointers','wp496_privacy'),(67,1,'jupiter_aam_cache','a:4:{s:6:\"policy\";a:3:{s:7:\"default\";a:2:{s:10:\"Statements\";a:0:{}s:8:\"Features\";a:0:{}}s:18:\"role.administrator\";a:2:{s:10:\"Statements\";a:0:{}s:8:\"Features\";a:0:{}}s:6:\"user.1\";a:2:{s:10:\"Statements\";a:0:{}s:8:\"Features\";a:0:{}}}s:4:\"post\";a:89:{i:332;b:0;i:3;b:0;i:231;b:0;i:46;b:0;i:53;b:0;i:58;b:0;i:179;b:0;i:74;b:0;i:183;b:0;i:127;b:0;i:200;b:0;i:89;b:0;i:325;b:0;i:251;b:0;i:329;b:0;i:297;b:0;i:193;b:0;i:262;b:0;i:300;b:0;i:169;b:0;i:165;a:1:{s:13:\"frontend.list\";s:1:\"0\";}i:161;b:0;i:157;b:0;i:303;b:0;i:267;b:0;i:270;b:0;i:71;b:0;i:102;b:0;i:189;b:0;i:206;b:0;i:209;b:0;i:210;b:0;i:211;b:0;i:212;b:0;i:240;b:0;i:214;b:0;i:201;b:0;i:131;b:0;i:128;b:0;i:2;b:0;i:10;b:0;i:218;b:0;i:219;b:0;i:220;b:0;i:221;b:0;i:222;b:0;i:223;b:0;i:213;b:0;i:224;b:0;i:225;b:0;i:226;b:0;i:227;b:0;i:228;b:0;i:229;b:0;i:340;b:0;i:6;b:0;i:343;b:0;i:347;b:0;i:349;b:0;i:351;b:0;i:93;b:0;i:361;b:0;i:290;b:0;i:363;b:0;i:364;b:0;i:365;b:0;i:366;b:0;i:368;b:0;i:370;b:0;i:376;b:0;i:378;b:0;i:379;b:0;i:381;b:0;i:383;b:0;i:384;b:0;i:385;b:0;i:391;b:0;i:392;b:0;i:393;b:0;i:394;b:0;i:395;b:0;i:396;b:0;i:406;b:0;i:408;b:0;i:417;b:0;i:419;b:0;i:432;b:0;i:436;b:0;i:443;b:0;}s:10:\"visibility\";a:1:{i:0;a:1:{s:4:\"post\";a:1:{s:8:\"165|page\";a:1:{s:13:\"frontend.list\";s:1:\"0\";}}}}s:10:\"policyTree\";a:1:{i:0;a:2:{s:9:\"Statement\";a:0:{}s:5:\"Param\";a:0:{}}}}');
/*!40000 ALTER TABLE `jupiter_usermeta` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

