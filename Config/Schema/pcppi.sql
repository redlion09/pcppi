-- MySQL dump 10.13  Distrib 5.1.58, for debian-linux-gnu (i686)
--
-- Host: localhost    Database: pcppi
-- ------------------------------------------------------
-- Server version	5.1.58-1ubuntu1

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

--
-- Table structure for table `acos`
--

DROP TABLE IF EXISTS `acos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `acos` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `parent_id` int(10) DEFAULT NULL,
  `model` varchar(255) DEFAULT NULL,
  `foreign_key` int(10) DEFAULT NULL,
  `alias` varchar(255) DEFAULT NULL,
  `lft` int(10) DEFAULT NULL,
  `rght` int(10) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=93 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `acos`
--

LOCK TABLES `acos` WRITE;
/*!40000 ALTER TABLE `acos` DISABLE KEYS */;
INSERT INTO `acos` VALUES (1,NULL,NULL,NULL,'controllers',1,184),(2,1,NULL,NULL,'Announcements',2,13),(3,2,NULL,NULL,'index',3,4),(4,2,NULL,NULL,'view',5,6),(5,2,NULL,NULL,'add',7,8),(6,2,NULL,NULL,'edit',9,10),(7,2,NULL,NULL,'delete',11,12),(8,1,NULL,NULL,'AnnouncementsTags',14,25),(9,8,NULL,NULL,'index',15,16),(10,8,NULL,NULL,'view',17,18),(11,8,NULL,NULL,'add',19,20),(12,8,NULL,NULL,'edit',21,22),(13,8,NULL,NULL,'delete',23,24),(14,1,NULL,NULL,'Departments',26,37),(15,14,NULL,NULL,'index',27,28),(16,14,NULL,NULL,'view',29,30),(17,14,NULL,NULL,'add',31,32),(18,14,NULL,NULL,'edit',33,34),(19,14,NULL,NULL,'delete',35,36),(20,1,NULL,NULL,'Groups',38,49),(21,20,NULL,NULL,'index',39,40),(22,20,NULL,NULL,'view',41,42),(23,20,NULL,NULL,'add',43,44),(24,20,NULL,NULL,'edit',45,46),(25,20,NULL,NULL,'delete',47,48),(26,1,NULL,NULL,'Liquidations',50,61),(27,26,NULL,NULL,'index',51,52),(28,26,NULL,NULL,'view',53,54),(29,26,NULL,NULL,'add',55,56),(30,26,NULL,NULL,'edit',57,58),(31,26,NULL,NULL,'delete',59,60),(32,1,NULL,NULL,'Locations',62,73),(33,32,NULL,NULL,'index',63,64),(34,32,NULL,NULL,'view',65,66),(35,32,NULL,NULL,'add',67,68),(36,32,NULL,NULL,'edit',69,70),(37,32,NULL,NULL,'delete',71,72),(38,1,NULL,NULL,'MiscellaneousFees',74,85),(39,38,NULL,NULL,'index',75,76),(40,38,NULL,NULL,'view',77,78),(41,38,NULL,NULL,'add',79,80),(42,38,NULL,NULL,'edit',81,82),(43,38,NULL,NULL,'delete',83,84),(44,1,NULL,NULL,'Notifications',86,97),(45,44,NULL,NULL,'index',87,88),(46,44,NULL,NULL,'view',89,90),(47,44,NULL,NULL,'add',91,92),(48,44,NULL,NULL,'edit',93,94),(49,44,NULL,NULL,'delete',95,96),(50,1,NULL,NULL,'Pages',98,101),(51,50,NULL,NULL,'display',99,100),(52,1,NULL,NULL,'Positions',102,113),(53,52,NULL,NULL,'index',103,104),(54,52,NULL,NULL,'view',105,106),(55,52,NULL,NULL,'add',107,108),(56,52,NULL,NULL,'edit',109,110),(57,52,NULL,NULL,'delete',111,112),(58,1,NULL,NULL,'Rates',114,125),(59,58,NULL,NULL,'index',115,116),(60,58,NULL,NULL,'view',117,118),(61,58,NULL,NULL,'add',119,120),(62,58,NULL,NULL,'edit',121,122),(63,58,NULL,NULL,'delete',123,124),(64,1,NULL,NULL,'Reports',126,137),(65,64,NULL,NULL,'index',127,128),(66,64,NULL,NULL,'view',129,130),(67,64,NULL,NULL,'add',131,132),(68,64,NULL,NULL,'edit',133,134),(69,64,NULL,NULL,'delete',135,136),(70,1,NULL,NULL,'Tags',138,149),(71,70,NULL,NULL,'index',139,140),(72,70,NULL,NULL,'view',141,142),(73,70,NULL,NULL,'add',143,144),(74,70,NULL,NULL,'edit',145,146),(75,70,NULL,NULL,'delete',147,148),(76,1,NULL,NULL,'Transportations',150,161),(77,76,NULL,NULL,'index',151,152),(78,76,NULL,NULL,'view',153,154),(79,76,NULL,NULL,'add',155,156),(80,76,NULL,NULL,'edit',157,158),(81,76,NULL,NULL,'delete',159,160),(82,1,NULL,NULL,'Users',162,181),(83,82,NULL,NULL,'login',163,164),(84,82,NULL,NULL,'logout',165,166),(85,82,NULL,NULL,'index',167,168),(86,82,NULL,NULL,'view',169,170),(87,82,NULL,NULL,'profile',171,172),(88,82,NULL,NULL,'add',173,174),(89,82,NULL,NULL,'edit',175,176),(90,82,NULL,NULL,'delete',177,178),(91,82,NULL,NULL,'initDB',179,180),(92,1,NULL,NULL,'AclExtras',182,183);
/*!40000 ALTER TABLE `acos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `announcements`
--

DROP TABLE IF EXISTS `announcements`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `announcements` (
  `id` char(36) NOT NULL,
  `title` varchar(100) NOT NULL,
  `content` text NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  `user_id` char(36) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `announcements`
--

LOCK TABLES `announcements` WRITE;
/*!40000 ALTER TABLE `announcements` DISABLE KEYS */;
/*!40000 ALTER TABLE `announcements` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `announcements_tags`
--

DROP TABLE IF EXISTS `announcements_tags`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `announcements_tags` (
  `id` char(36) NOT NULL,
  `announcement_id` char(36) NOT NULL,
  `tag_id` char(36) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `announcements_tags`
--

LOCK TABLES `announcements_tags` WRITE;
/*!40000 ALTER TABLE `announcements_tags` DISABLE KEYS */;
INSERT INTO `announcements_tags` VALUES ('4ecf563f-5c20-48b8-931c-0b197f000101','4ecf563f-0b28-49cb-83b8-0b197f000101','4ecf5612-8d08-4a12-b26f-0b0b7f000101');
/*!40000 ALTER TABLE `announcements_tags` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `aros`
--

DROP TABLE IF EXISTS `aros`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `aros` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `parent_id` int(10) DEFAULT NULL,
  `model` varchar(255) DEFAULT NULL,
  `foreign_key` char(40) DEFAULT NULL,
  `alias` varchar(255) DEFAULT NULL,
  `lft` int(10) DEFAULT NULL,
  `rght` int(10) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `aros`
--

LOCK TABLES `aros` WRITE;
/*!40000 ALTER TABLE `aros` DISABLE KEYS */;
INSERT INTO `aros` VALUES (1,NULL,'Group','4ed1cad3-0d70-4965-b963-055c7f000101',NULL,1,4),(2,NULL,'Group','4ed1cb14-f3f8-452b-b627-055f7f000101',NULL,5,8),(3,NULL,'Group','4ed1cb93-1050-4480-804f-299b7f000101',NULL,9,12),(4,1,'User','4ed1cbef-5ff0-4bf6-9742-055e7f000101',NULL,2,3),(5,3,'User','4ed2bade-35b0-4c5e-b586-046f7f000101',NULL,10,11),(6,2,'User','4ed2bf93-d23c-426e-a2e5-0ff87f000101',NULL,6,7);
/*!40000 ALTER TABLE `aros` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `aros_acos`
--

DROP TABLE IF EXISTS `aros_acos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `aros_acos` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `aro_id` int(10) NOT NULL,
  `aco_id` int(10) NOT NULL,
  `_create` varchar(2) NOT NULL DEFAULT '0',
  `_read` varchar(2) NOT NULL DEFAULT '0',
  `_update` varchar(2) NOT NULL DEFAULT '0',
  `_delete` varchar(2) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `ARO_ACO_KEY` (`aro_id`,`aco_id`)
) ENGINE=MyISAM AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `aros_acos`
--

LOCK TABLES `aros_acos` WRITE;
/*!40000 ALTER TABLE `aros_acos` DISABLE KEYS */;
INSERT INTO `aros_acos` VALUES (1,1,1,'1','1','1','1'),(2,2,1,'-1','-1','-1','-1'),(3,2,29,'-1','-1','-1','-1'),(4,2,50,'1','1','1','1'),(5,2,26,'1','1','1','1'),(6,2,2,'1','1','1','1'),(7,2,87,'1','1','1','1'),(8,2,45,'1','1','1','1'),(9,3,1,'-1','-1','-1','-1'),(10,3,50,'1','1','1','1'),(11,3,26,'1','1','1','1'),(12,3,87,'1','1','1','1'),(13,3,4,'1','1','1','1'),(14,3,45,'1','1','1','1');
/*!40000 ALTER TABLE `aros_acos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `departments`
--

DROP TABLE IF EXISTS `departments`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `departments` (
  `id` char(36) NOT NULL,
  `department` varchar(29) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `departments`
--

LOCK TABLES `departments` WRITE;
/*!40000 ALTER TABLE `departments` DISABLE KEYS */;
INSERT INTO `departments` VALUES ('4ea027ed-c574-4980-bbbf-04d57f000101','IT');
/*!40000 ALTER TABLE `departments` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `groups`
--

DROP TABLE IF EXISTS `groups`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `groups` (
  `id` char(36) NOT NULL,
  `group` varchar(14) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `groups`
--

LOCK TABLES `groups` WRITE;
/*!40000 ALTER TABLE `groups` DISABLE KEYS */;
INSERT INTO `groups` VALUES ('4ed1cad3-0d70-4965-b963-055c7f000101','Administrator','2011-11-27 13:29:55','2011-11-27 13:29:55'),('4ed1cb14-f3f8-452b-b627-055f7f000101','Accounting','2011-11-27 13:31:00','2011-11-27 13:31:00'),('4ed1cb93-1050-4480-804f-299b7f000101','Regular','2011-11-27 13:33:07','2011-11-27 13:33:07');
/*!40000 ALTER TABLE `groups` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `liquidations`
--

DROP TABLE IF EXISTS `liquidations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `liquidations` (
  `id` char(36) NOT NULL,
  `lodging` decimal(6,2) NOT NULL,
  `total` decimal(7,2) NOT NULL,
  `isAccepted` tinyint(1) DEFAULT NULL,
  `user_id` char(36) NOT NULL,
  `location_id` char(36) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `liquidations`
--

LOCK TABLES `liquidations` WRITE;
/*!40000 ALTER TABLE `liquidations` DISABLE KEYS */;
/*!40000 ALTER TABLE `liquidations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `locations`
--

DROP TABLE IF EXISTS `locations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `locations` (
  `id` char(36) NOT NULL,
  `location` varchar(32) NOT NULL,
  `class` char(1) NOT NULL,
  `region` varchar(8) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `locations`
--

LOCK TABLES `locations` WRITE;
/*!40000 ALTER TABLE `locations` DISABLE KEYS */;
INSERT INTO `locations` VALUES ('4ea6480d-d174-42c8-be4a-0ede7f000101','Muntinlupa Plant','M','Luzon');
/*!40000 ALTER TABLE `locations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `miscellaneous_fees`
--

DROP TABLE IF EXISTS `miscellaneous_fees`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `miscellaneous_fees` (
  `id` char(36) NOT NULL,
  `description` varchar(100) NOT NULL,
  `amount` decimal(5,2) NOT NULL,
  `report_id` char(36) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `miscellaneous_fees`
--

LOCK TABLES `miscellaneous_fees` WRITE;
/*!40000 ALTER TABLE `miscellaneous_fees` DISABLE KEYS */;
/*!40000 ALTER TABLE `miscellaneous_fees` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `notifications`
--

DROP TABLE IF EXISTS `notifications`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `notifications` (
  `id` char(36) NOT NULL,
  `created` datetime NOT NULL,
  `user_id` char(36) DEFAULT NULL,
  `group_id` char(36) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `notifications`
--

LOCK TABLES `notifications` WRITE;
/*!40000 ALTER TABLE `notifications` DISABLE KEYS */;
/*!40000 ALTER TABLE `notifications` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `positions`
--

DROP TABLE IF EXISTS `positions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `positions` (
  `id` char(36) NOT NULL,
  `position` varchar(24) NOT NULL,
  `class` char(2) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `positions`
--

LOCK TABLES `positions` WRITE;
/*!40000 ALTER TABLE `positions` DISABLE KEYS */;
INSERT INTO `positions` VALUES ('4ea027e3-e448-458e-a51b-04d57f000101','Developer','SO');
/*!40000 ALTER TABLE `positions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `rates`
--

DROP TABLE IF EXISTS `rates`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `rates` (
  `id` char(36) NOT NULL,
  `expense` varchar(15) NOT NULL,
  `location_class` char(1) NOT NULL,
  `position_class` char(2) NOT NULL,
  `rate` decimal(6,2) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `rates`
--

LOCK TABLES `rates` WRITE;
/*!40000 ALTER TABLE `rates` DISABLE KEYS */;
INSERT INTO `rates` VALUES ('4ea93316-d658-4fb2-a575-0f767f000101','Breakfast','M','SO','120.00'),('4ea9332a-75ec-4d19-a0e1-047a7f000101','Lunch','M','SO','150.00'),('4ea93333-8924-4c50-98dd-0f757f000101','Dinner','M','SO','150.00'),('4ea9333f-6578-4550-833f-0f8b7f000101','Lodging','M','SO','1600.00');
/*!40000 ALTER TABLE `rates` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `reports`
--

DROP TABLE IF EXISTS `reports`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `reports` (
  `id` char(36) NOT NULL,
  `day` varchar(9) NOT NULL,
  `date` date NOT NULL,
  `breakfast` decimal(5,2) NOT NULL,
  `lunch` decimal(5,2) NOT NULL,
  `dinner` decimal(5,2) NOT NULL,
  `user_id` char(36) NOT NULL,
  `liquidation_id` char(36) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `reports`
--

LOCK TABLES `reports` WRITE;
/*!40000 ALTER TABLE `reports` DISABLE KEYS */;
/*!40000 ALTER TABLE `reports` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tags`
--

DROP TABLE IF EXISTS `tags`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tags` (
  `id` char(36) NOT NULL,
  `tag` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tags`
--

LOCK TABLES `tags` WRITE;
/*!40000 ALTER TABLE `tags` DISABLE KEYS */;
INSERT INTO `tags` VALUES ('4ecf5612-8d08-4a12-b26f-0b0b7f000101','Maintenance'),('4ecf5623-a4e8-4cd7-be15-044c7f000101','Holiday'),('4ecf5629-d40c-4e4c-be27-044c7f000101','Cut Off');
/*!40000 ALTER TABLE `tags` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `transportations`
--

DROP TABLE IF EXISTS `transportations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `transportations` (
  `id` char(36) NOT NULL,
  `description` varchar(100) NOT NULL,
  `amount` decimal(5,2) NOT NULL,
  `report_id` char(36) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `transportations`
--

LOCK TABLES `transportations` WRITE;
/*!40000 ALTER TABLE `transportations` DISABLE KEYS */;
/*!40000 ALTER TABLE `transportations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` char(36) NOT NULL,
  `username` varchar(18) NOT NULL,
  `password` varchar(40) NOT NULL,
  `first_name` varchar(18) NOT NULL,
  `middle_name` varchar(16) NOT NULL,
  `last_name` varchar(28) NOT NULL,
  `email` varchar(117) NOT NULL,
  `address` varchar(67) NOT NULL,
  `city` varchar(16) NOT NULL,
  `mobile` varchar(11) NOT NULL,
  `home` varchar(10) NOT NULL,
  `created` datetime NOT NULL,
  `position_id` char(36) NOT NULL,
  `department_id` char(36) NOT NULL,
  `group_id` char(36) NOT NULL,
  `file` varchar(255) DEFAULT NULL,
  `dirname` varchar(255) DEFAULT NULL,
  `basename` varchar(255) DEFAULT NULL,
  `checksum` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES ('4ed1cbef-5ff0-4bf6-9742-055e7f000101','jaggygauran','1b3d6eb484667caaa2b632944fe037244b1a4367','Jose Andres','Cruz','Gauran','jaggygauran@gmail.com','3933 Marigold St. Sun Valley','Paranaque','09178611310','8236793','2011-11-27 13:34:39','4ea027e3-e448-458e-a51b-04d57f000101','4ea027ed-c574-4980-bbbf-04d57f000101','4ed1cad3-0d70-4965-b963-055c7f000101','','','',''),('4ed2bade-35b0-4c5e-b586-046f7f000101','aatabucol','1b3d6eb484667caaa2b632944fe037244b1a4367','James Mervin','Aguilar','Tabucol','aatabucol@apc.edu.ph','Malibay','Pasay','09187112470','8231111','2011-11-28 06:34:06','4ea027e3-e448-458e-a51b-04d57f000101','4ea027ed-c574-4980-bbbf-04d57f000101','4ed1cb93-1050-4480-804f-299b7f000101','','','',''),('4ed2bf93-d23c-426e-a2e5-0ff87f000101','alronquillo','1b3d6eb484667caaa2b632944fe037244b1a4367','Randel','Laurente','Ronquillo','alronquillo@apc.edu.ph','Kawit','Cavite','09228536022','8212769','2011-11-28 06:54:11','4ea027e3-e448-458e-a51b-04d57f000101','4ea027ed-c574-4980-bbbf-04d57f000101','4ed1cb14-f3f8-452b-b627-055f7f000101','','','','');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2011-11-30 12:36:46
