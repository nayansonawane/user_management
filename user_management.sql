-- MySQL dump 10.13  Distrib 5.6.19, for linux-glibc2.5 (x86_64)
--
-- Host: 127.0.0.1    Database: user_management
-- ------------------------------------------------------
-- Server version	5.6.33-0ubuntu0.14.04.1

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
-- Table structure for table `role_users`
--

DROP TABLE IF EXISTS `role_users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `role_users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `role_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `role_users`
--

LOCK TABLES `role_users` WRITE;
/*!40000 ALTER TABLE `role_users` DISABLE KEYS */;
INSERT INTO `role_users` VALUES (1,3,1,'2017-10-29 06:32:46','2017-10-29 15:01:21'),(2,1,3,'2017-10-29 07:49:50','2018-10-13 06:51:29'),(10,1,12,'2018-10-13 01:35:57','2018-10-13 01:35:57'),(11,1,13,'2018-10-13 02:26:24','2018-10-13 02:26:24');
/*!40000 ALTER TABLE `role_users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `roles`
--

DROP TABLE IF EXISTS `roles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `roles` (
  `id` int(11) NOT NULL,
  `role_name` varchar(255) NOT NULL,
  `role_slug` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `roles`
--

LOCK TABLES `roles` WRITE;
/*!40000 ALTER TABLE `roles` DISABLE KEYS */;
INSERT INTO `roles` VALUES (1,'User','user','2017-10-28 18:30:00','2018-10-13 06:00:12'),(3,'Admin','admin','2017-10-28 18:30:00','2017-10-28 18:30:00');
/*!40000 ALTER TABLE `roles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `email` varchar(320) NOT NULL,
  `password` text NOT NULL,
  `mobile_number` varchar(20) NOT NULL,
  `about` varchar(500) NOT NULL,
  `country` varchar(100) NOT NULL,
  `dob` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user`
--

LOCK TABLES `user` WRITE;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` VALUES (1,'Admin','admin@admin.com','eyJpdiI6ImF3VHZSTjY1SXh0OGlzRXV5ZXBncHc9PSIsInZhbHVlIjoiUkFOUnJlTU1tUFpDNFJ1Q25sSHlQdz09IiwibWFjIjoiMzk0MDU0N2M5ZTQ3ODZlZGQyNzgzNzJjOWNhZTZlZDlkYmI5MGZlMmU1MjhhNTdmZmI1YmU0YTlkZjRjZmEzYSJ9','11111111','demo','India','1994-02-02','2017-10-29 06:32:45','2018-10-13 07:55:18'),(3,'Rahul','rahulroy@test.com','eyJpdiI6ImF3VHZSTjY1SXh0OGlzRXV5ZXBncHc9PSIsInZhbHVlIjoiUkFOUnJlTU1tUFpDNFJ1Q25sSHlQdz09IiwibWFjIjoiMzk0MDU0N2M5ZTQ3ODZlZGQyNzgzNzJjOWNhZTZlZDlkYmI5MGZlMmU1MjhhNTdmZmI1YmU0YTlkZjRjZmEzYSJ9','12121212','this is basic descriptions','INDIA','1994-02-02','2017-10-29 07:49:50','2018-10-13 07:06:35'),(12,'Rocky','rocky@test.com','eyJpdiI6IjUxeVNLbmJcL3hDNlJxbkR5U0RTSXR3PT0iLCJ2YWx1ZSI6IndqWE9sR0xNVVUrSFBFQ0R2UmF2c1E9PSIsIm1hYyI6ImFjMTcxNjZkMjhjNDFiMzA1MmQ0NGM2OTEzZmQ1ODFlNmE4YjA2YTAwYjJmYWU5MmRhZWYxOWZlZmViMDg4MWUifQ==','121212121','this is good','India','1995-12-20','2018-10-13 01:35:57','2018-10-13 02:24:30'),(13,'Cathy','cathy@test.com','eyJpdiI6IklkaXJMVTdVTE5xQURuNWt4em51UUE9PSIsInZhbHVlIjoiMDdGb1RaM0xCZTQxOE45eFlJTWZ2UT09IiwibWFjIjoiYTk4Y2RkZWE3OGQ1OWFiNDkyNDdmNDAzODRhOWE5OTQ2MDZlMDU4ZmQyOTE1ZjVlZDQ0ZDUwY2ZhZGU2NGJjYSJ9','2324234324','this is good description','USA','2018-10-31','2018-10-13 02:26:24','2018-10-13 02:26:24');
/*!40000 ALTER TABLE `user` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2018-10-13 13:31:33
