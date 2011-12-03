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
INSERT INTO `locations` VALUES ('4ed7eac2-cf84-432b-b1fc-24e77f000101','Muntinlupa Plant','M','Luzon'),('4ed7ec77-7604-4f66-934c-047e7f000101','Baguio Plant','A','Luzon');
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
INSERT INTO `rates` VALUES ('4ed7f2b4-02a0-4fd0-8985-28227f000101','Breakfast','M','MS','80.00'),('4ed7f2b4-34a0-4f64-a45e-28227f000101','Breakfast','M','RF','70.00'),('4ed7f2b4-569c-4e8a-ae72-28227f000101','Breakfast','A','SO','100.00'),('4ed7f2b4-776c-45db-a608-28227f000101','Breakfast','A','RF','60.00'),('4ed7f2b4-983c-4823-95ba-28227f000101','Breakfast','A','MS','70.00'),('4ed7f2b4-b844-4917-aed5-28227f000101','Breakfast','M','SO','120.00'),('4ed7f2b4-d914-4ad3-b115-28227f000101','Breakfast','B','RF','50.00'),('4ed7f2b4-09e8-4d2d-ac16-28227f000101','Breakfast','B','MS','70.00'),('4ed7f2b4-2b80-4be2-84b2-28227f000101','Breakfast','B','SO','80.00'),('4ed7f2b4-4c50-436d-856a-28227f000101','Breakfast','C','RF','40.00'),('4ed7f2b4-a6f0-424b-86bb-28227f000101','Breakfast','C','SO','70.00'),('4ed7f2b4-cb44-443f-ae45-28227f000101','Lunch','M','RF','90.00'),('4ed7f2b4-ec78-4d79-80ed-28227f000101','Lunch','M','MS','120.00'),('4ed7f2b4-0c80-476d-851e-28227f000101','Breakfast','C','MS','55.00'),('4ed7f2b4-37dc-4467-837d-28227f000101','Lunch','M','SO','150.00'),('4ed7f2b4-58ac-4c92-8851-28227f000101','Lunch','A','RF','80.00'),('4ed7f2b4-79e0-491a-a3c9-28227f000101','Lunch','A','MS','100.00'),('4ed7f2b4-9ab0-4181-bca1-28227f000101','Lunch','A','SO','120.00'),('4ed7f2b4-bbe4-4410-acb1-28227f000101','Lunch','B','RF','70.00'),('4ed7f2b4-dd18-4bd0-9fba-28227f000101','Lunch','B','MS','100.00'),('4ed7f2b5-1d4c-4353-b713-28227f000101','Lunch','B','SO','100.00'),('4ed7f2b5-3e1c-425f-97b5-28227f000101','Lunch','C','RF','60.00'),('4ed7f2b5-5f50-4332-a971-28227f000101','Dinner','M','RF','90.00'),('4ed7f2b5-8020-4757-ae3e-28227f000101','Lunch','C','MS','70.00'),('4ed7f2b5-a08c-4a2f-99aa-28227f000101','Lunch','C','SO','80.00'),('4ed7f2b5-c15c-433e-8c19-28227f000101','Dinner','M','MS','120.00'),('4ed7f2b5-e22c-4300-ad83-28227f000101','Dinner','M','SO','150.00'),('4ed7f2b5-02fc-4f3d-90e7-28227f000101','Dinner','A','RF','80.00'),('4ed7f2b5-2430-454e-b28e-28227f000101','Dinner','A','MS','120.00'),('4ed7f2b5-4564-4aa8-85d3-28227f000101','Dinner','A','SO','120.00'),('4ed7f2b5-68f0-476d-a907-28227f000101','Dinner','B','RF','70.00'),('4ed7f2b5-89c0-46be-98c3-28227f000101','Dinner','B','MS','80.00'),('4ed7f2b5-aaf4-4610-9bcd-28227f000101','Dinner','B','SO','100.00'),('4ed7f2b5-cc28-40be-966b-28227f000101','Dinner','C','RF','60.00'),('4ed7f2b5-ecf8-4c77-a06a-28227f000101','Dinner','C','MS','70.00'),('4ed7f2b5-0d64-4d6d-bf29-28227f000101','Dinner','C','SO','80.00'),('4ed7f2b5-2d6c-4684-a82e-28227f000101','Lodging','M','RF','950.00'),('4ed7f2b5-64e4-4d79-ae4b-28227f000101','Lodging','M','MS','1200.00'),('4ed7f2b5-86e0-440e-88ab-28227f000101','Lodging','M','SO','1600.00'),('4ed7f2b5-a74c-46ef-893d-28227f000101','Lodging','A','RF','800.00'),('4ed7f2b5-c7b8-4530-bbc5-28227f000101','Lodging','A','MS','1000.00'),('4ed7f2b5-e824-4a36-91c9-28227f000101','Lodging','A','SO','1200.00'),('4ed7f2b5-08f4-467b-a64c-28227f000101','Lodging','B','RF','500.00'),('4ed7f2b5-29c4-478b-ab69-28227f000101','Lodging','B','MS','700.00'),('4ed7f2b5-4a94-4f40-a1ec-28227f000101','Lodging','B','SO','900.00'),('4ed7f2b5-6b00-4ea6-901e-28227f000101','Lodging','C','RF','350.00'),('4ed7f2b5-8b6c-4b60-b427-28227f000101','Lodging','C','MS','550.00'),('4ed7f2b5-abd8-4436-a1ea-28227f000101','Lodging','C','SO','750.00');
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

-- Dump completed on 2011-12-02 18:04:51
