-- MySQL dump 10.13  Distrib 8.0.19, for Linux (x86_64)
--
-- Host: 127.0.0.1    Database: simplesystem
-- ------------------------------------------------------
-- Server version	8.0.19-0ubuntu0.19.10.3

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `buyer`
--

DROP TABLE IF EXISTS `buyer`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `buyer` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `auth_token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `buyer`
--

LOCK TABLES `buyer` WRITE;
/*!40000 ALTER TABLE `buyer` DISABLE KEYS */;
INSERT INTO `buyer` VALUES (1,'Augustus Charleston','N5cW2DXCLn-Z-ck89FrhGapCv32GFQgMuz6t-fzZDtY'),(2,'Ninfa Rylander','xnkCsz-4sAVJ_nM_X3OheOb3cYYDh9Xrll1lElN5MvM'),(3,'Julienne Harbour','OjLQdhfdPw9_rkPB_-89CJrz4Kjvri8l8tqIIhfLnEg'),(4,'Thaddeus Ludwick','4ywmvSFoIWim2gCqXgzfjOR6vuF4w7n4Np2ayPf3QHw'),(5,'Concetta Melgar','Y-EQLn8Dbgdo1DXuPGHEqBSYSN7mPZAz2elhKapu-YE'),(6,'Agustin Caswell','YhttHLCHby0VDVxuLCFqGD4e8er_0_I58MhOHPhVkvs'),(7,'Ninfa Rylander','2wE6j0FWClrvlP7k1j0Zgc7uN3etp08oxxRND3u1Dmc'),(8,'Julienne Harbour','LUAzbzD0MJUptvyQXZ6dcFhGUkHOx5DYGJEBpeAcDjs'),(9,'Georgette Breiner','aJNNISSl8OY1SOIJBRNnHYwoRz7a7aYZT_OKMeD1bPQ'),(10,'Amalia Mick','5EDAvo7HebLFOzUzarYMXOu19OL4sIvX8nJ3ARAkf0o'),(11,'Augustus Charleston','qN8f0WAxz0mruzgB6ePn9uSYJt6JpWAPT55wJWfUVxs'),(12,'Deidre Nielson','O0j-SmH59rqBAYvfDC_7wMhEIvKRqghnkEXMgkyUp2A'),(13,'Theola Mccollough','vULn9jkf43V8yDxRVlKAseZk9kN_19FoE0pyH676V5U'),(14,'Jamaal Kober','gBRC1DAddkSgMg0op6H7V5Z0OYA3pe_3nusSKy6xnwc'),(15,'Julienne Harbour','KVwnus-B6Lh0frmi1VwwRs0VQA3lpil3P8iWvQJ3Tag'),(16,'Thaddeus Ludwick','mdtm5oAB6zVZioUL5ajW2U2OQpjz9UXftT-ssyH3AaI'),(17,'Tena Plamondon','yrhUF4b8UxX5HUy1EbfwiDe-zXGDpteLADUPKs9awSE'),(18,'Gaye Linger','Hc8WAqGlvl8wlqHh6OxXoZvVDPbPxDRii-WVRwiNJEk'),(19,'Kecia Edmondson','UPpvLGbZmlqwUeaa5yJZyNV4S1FySiU3Kg_G1wpOj1s'),(20,'Robby Kyler','c1Rbx9EjqaS6Jt3hwDN9K1R1nZEGb-RxzBHOmfgDhys'),(21,'Agustin Caswell','raO0Hw9Cm51kwvBIvaup3V8vT2cmUZS6hTKqCFg2zB8'),(22,'Gaye Linger','aR12D2LIhVBuh3dcrJbRsjWHHbdcrJNhM5EKobWN3mI'),(23,'Gaye Linger','c-kI3-2iPgoamaU_XIp5Kq0gwz5wWppctPBztC3PI5o'),(24,'Georgette Breiner','9UmJtkKQLrxAouikU2WEwSTecHSplwyN6AYxPmy6GG4'),(25,'Micheal Bentz','TszSbs83_irNYJn0LijC-OB9EHlp5P23h29KF9LBVDc'),(26,'Dorthea Kaylor','-ZIFxL2oy_UzfHNmkz0-raM0ab96W_fNzAgvsXkm2Sw');
/*!40000 ALTER TABLE `buyer` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `migration_versions`
--

DROP TABLE IF EXISTS `migration_versions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `migration_versions` (
  `version` varchar(14) COLLATE utf8mb4_unicode_ci NOT NULL,
  `executed_at` datetime NOT NULL COMMENT '(DC2Type:datetime_immutable)',
  PRIMARY KEY (`version`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migration_versions`
--

LOCK TABLES `migration_versions` WRITE;
/*!40000 ALTER TABLE `migration_versions` DISABLE KEYS */;
/*!40000 ALTER TABLE `migration_versions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `orders`
--

DROP TABLE IF EXISTS `orders`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `orders` (
  `id` int NOT NULL AUTO_INCREMENT,
  `buyer_id` int DEFAULT NULL,
  `time_stamp` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_E52FFDEE6C755722` (`buyer_id`),
  CONSTRAINT `FK_E52FFDEE6C755722` FOREIGN KEY (`buyer_id`) REFERENCES `buyer` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `orders`
--

LOCK TABLES `orders` WRITE;
/*!40000 ALTER TABLE `orders` DISABLE KEYS */;
/*!40000 ALTER TABLE `orders` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `orders_product`
--

DROP TABLE IF EXISTS `orders_product`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `orders_product` (
  `orders_id` int NOT NULL,
  `product_id` int NOT NULL,
  PRIMARY KEY (`orders_id`,`product_id`),
  KEY `IDX_223F76D6CFFE9AD6` (`orders_id`),
  KEY `IDX_223F76D64584665A` (`product_id`),
  CONSTRAINT `FK_223F76D64584665A` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`) ON DELETE CASCADE,
  CONSTRAINT `FK_223F76D6CFFE9AD6` FOREIGN KEY (`orders_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `orders_product`
--

LOCK TABLES `orders_product` WRITE;
/*!40000 ALTER TABLE `orders_product` DISABLE KEYS */;
/*!40000 ALTER TABLE `orders_product` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `product`
--

DROP TABLE IF EXISTS `product`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `product` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `product`
--

LOCK TABLES `product` WRITE;
/*!40000 ALTER TABLE `product` DISABLE KEYS */;
INSERT INTO `product` VALUES (1,'Dorthea Kaylor'),(2,'Susy Lonzo'),(3,'Gaye Linger'),(4,'Concetta Melgar'),(5,'Julienne Harbour'),(6,'Andra Pellham'),(7,'Kathryn Marroquin'),(8,'Sharda Destefano'),(9,'Kecia Edmondson'),(10,'Dorthea Kaylor'),(11,'Sharda Destefano'),(12,'Caterina Trogdon'),(13,'Silvia Sleeth'),(14,'Micheal Bentz'),(15,'Gaye Linger'),(16,'Agustin Caswell'),(17,'Silvana Bohland'),(18,'Dorthea Kaylor'),(19,'Ninfa Rylander'),(20,'Gaye Linger'),(21,'Susy Lonzo'),(22,'Georgette Breiner'),(23,'Staci Ceja'),(24,'Ninfa Rylander'),(25,'Zula Torrence'),(26,'Kecia Edmondson');
/*!40000 ALTER TABLE `product` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2020-02-19  7:55:59
