-- MySQL dump 10.13  Distrib 8.0.42, for Win64 (x86_64)
--
-- Host: 127.0.0.1    Database: onlinebilling
-- ------------------------------------------------------
-- Server version	8.0.42

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
-- Table structure for table `admin`
--

DROP TABLE IF EXISTS `admin`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `admin` (
  `id` int NOT NULL AUTO_INCREMENT,
  `fullname` varchar(100) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `username` varchar(100) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `password` varchar(100) COLLATE utf8mb4_general_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `admin`
--

LOCK TABLES `admin` WRITE;
/*!40000 ALTER TABLE `admin` DISABLE KEYS */;
INSERT INTO `admin` VALUES (2,'Administrator','admin','1234');
/*!40000 ALTER TABLE `admin` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `bill_history_college`
--

DROP TABLE IF EXISTS `bill_history_college`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `bill_history_college` (
  `id` int NOT NULL AUTO_INCREMENT,
  `refno` varchar(100) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `school_id` varchar(100) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `student_id` varchar(100) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `amount` double DEFAULT NULL,
  `semester` int DEFAULT NULL,
  `syear` varchar(100) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `amount_paid` double DEFAULT NULL,
  `remarks` text COLLATE utf8mb4_general_ci,
  `datearray` date DEFAULT NULL,
  `timearray` time DEFAULT NULL,
  `status` varchar(100) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `due_date` date DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `bill_history_college`
--

LOCK TABLES `bill_history_college` WRITE;
/*!40000 ALTER TABLE `bill_history_college` DISABLE KEYS */;
INSERT INTO `bill_history_college` VALUES (7,'CdK-20251021102157','CDK20251007095009','25-1234',1890,1,'2025-2026',0,'','2025-10-21','10:21:57','pending','2025-10-31'),(8,'CdK-20251021102214','CDK20251007095009','25-2312',1946.6666666667,1,'2025-2026',0,'','2025-10-21','10:22:14','pending','2025-10-31');
/*!40000 ALTER TABLE `bill_history_college` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `bill_history_hs`
--

DROP TABLE IF EXISTS `bill_history_hs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `bill_history_hs` (
  `id` int NOT NULL AUTO_INCREMENT,
  `refno` varchar(100) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `school_id` varchar(100) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `student_id` varchar(100) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `amount` double DEFAULT NULL,
  `syear` varchar(100) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `amount_paid` double DEFAULT NULL,
  `remarks` text COLLATE utf8mb4_general_ci,
  `datearray` date DEFAULT NULL,
  `timearray` time DEFAULT NULL,
  `status` varchar(100) COLLATE utf8mb4_general_ci DEFAULT 'pending',
  `due_date` date DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `bill_history_hs`
--

LOCK TABLES `bill_history_hs` WRITE;
/*!40000 ALTER TABLE `bill_history_hs` DISABLE KEYS */;
/*!40000 ALTER TABLE `bill_history_hs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `course`
--

DROP TABLE IF EXISTS `course`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `course` (
  `id` int NOT NULL AUTO_INCREMENT,
  `school_id` varchar(100) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `description` varchar(100) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `amount_lec` double DEFAULT NULL,
  `amount_lab` double DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `course`
--

LOCK TABLES `course` WRITE;
/*!40000 ALTER TABLE `course` DISABLE KEYS */;
INSERT INTO `course` VALUES (5,'CDK20251007095009','BSIT',185,195),(6,'CDK20251007095009','BSCpE',190,200);
/*!40000 ALTER TABLE `course` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `exam_frequency`
--

DROP TABLE IF EXISTS `exam_frequency`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `exam_frequency` (
  `id` int NOT NULL AUTO_INCREMENT,
  `school_id` varchar(100) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `frequency` int DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `exam_frequency`
--

LOCK TABLES `exam_frequency` WRITE;
/*!40000 ALTER TABLE `exam_frequency` DISABLE KEYS */;
INSERT INTO `exam_frequency` VALUES (3,'CDK20251007095009',3);
/*!40000 ALTER TABLE `exam_frequency` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `gcash`
--

DROP TABLE IF EXISTS `gcash`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `gcash` (
  `id` int NOT NULL AUTO_INCREMENT,
  `school_id` varchar(100) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `acctno` varchar(100) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `acctname` varchar(100) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `img` longblob,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `gcash`
--

LOCK TABLES `gcash` WRITE;
/*!40000 ALTER TABLE `gcash` DISABLE KEYS */;
/*!40000 ALTER TABLE `gcash` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `grade`
--

DROP TABLE IF EXISTS `grade`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `grade` (
  `id` int NOT NULL AUTO_INCREMENT,
  `school_id` varchar(100) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `description` varchar(100) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `amount` double DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `grade`
--

LOCK TABLES `grade` WRITE;
/*!40000 ALTER TABLE `grade` DISABLE KEYS */;
INSERT INTO `grade` VALUES (2,'CDK20251007095009','Grade 9',5000),(3,'CDK20251007095009','Grade 8',7000),(4,'CDK20251007095009','Grade 9',10000),(5,'CDK20251007095009','Grade 10',12000),(6,'CDK20251007095009','Grade 11',15000),(7,'CDK20251007095009','Grade 12',17000);
/*!40000 ALTER TABLE `grade` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `guardian`
--

DROP TABLE IF EXISTS `guardian`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `guardian` (
  `id` int NOT NULL AUTO_INCREMENT,
  `school_id` varchar(100) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `g_id` varchar(100) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `g_name` varchar(100) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `g_email` varchar(100) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `g_contact` varchar(100) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `g_username` varchar(100) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `g_password` varchar(100) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `datearray` date DEFAULT NULL,
  `timearray` time DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `guardian`
--

LOCK TABLES `guardian` WRITE;
/*!40000 ALTER TABLE `guardian` DISABLE KEYS */;
INSERT INTO `guardian` VALUES (3,'CDK20251007095009','G20251007100423','Eczekiel Aboy','easykill.aboy@gmail.com','09107524284','shakiel17','1234','2025-10-07','10:04:23');
/*!40000 ALTER TABLE `guardian` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `guardian_details`
--

DROP TABLE IF EXISTS `guardian_details`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `guardian_details` (
  `id` int NOT NULL AUTO_INCREMENT,
  `school_id` varchar(100) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `g_id` varchar(100) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `student_id` varchar(100) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `datearray` date DEFAULT NULL,
  `timearray` time DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `guardian_details`
--

LOCK TABLES `guardian_details` WRITE;
/*!40000 ALTER TABLE `guardian_details` DISABLE KEYS */;
INSERT INTO `guardian_details` VALUES (7,'CDK20251007095009','G20251007100423','25-1234','2025-10-21','14:22:34'),(8,'CDK20251007095009','G20251007100423','25-2312','2025-10-21','14:22:46');
/*!40000 ALTER TABLE `guardian_details` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `notification`
--

DROP TABLE IF EXISTS `notification`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `notification` (
  `id` int NOT NULL AUTO_INCREMENT,
  `school_id` varchar(100) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `invno` varchar(100) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `student_id` varchar(100) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `datearray` date DEFAULT NULL,
  `timearray` time DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `notification`
--

LOCK TABLES `notification` WRITE;
/*!40000 ALTER TABLE `notification` DISABLE KEYS */;
/*!40000 ALTER TABLE `notification` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `payment`
--

DROP TABLE IF EXISTS `payment`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `payment` (
  `id` int NOT NULL AUTO_INCREMENT,
  `refno` varchar(100) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `school_id` varchar(100) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `student_id` varchar(100) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `amount` double DEFAULT NULL,
  `remarks` text COLLATE utf8mb4_general_ci,
  `payment_proof` longblob,
  `status` varchar(100) COLLATE utf8mb4_general_ci DEFAULT 'pending',
  `datearray` date DEFAULT NULL,
  `timearray` time DEFAULT NULL,
  `date_approved` date DEFAULT NULL,
  `time_approved` time DEFAULT NULL,
  `approved_by` varchar(100) COLLATE utf8mb4_general_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `payment`
--

LOCK TABLES `payment` WRITE;
/*!40000 ALTER TABLE `payment` DISABLE KEYS */;
/*!40000 ALTER TABLE `payment` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `school`
--

DROP TABLE IF EXISTS `school`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `school` (
  `id` int NOT NULL AUTO_INCREMENT,
  `school_id` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `school_name` varchar(100) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `school_logo` longblob,
  `school_address` text COLLATE utf8mb4_general_ci,
  `school_contact` varchar(100) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `school_email` varchar(100) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `status` varchar(100) COLLATE utf8mb4_general_ci DEFAULT 'pending',
  `datearray` date DEFAULT NULL,
  `timearray` time DEFAULT NULL,
  `date_approved` date DEFAULT NULL,
  `time_approved` time DEFAULT NULL,
  `username` varchar(100) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `password` varchar(100) COLLATE utf8mb4_general_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `school`
--

LOCK TABLES `school` WRITE;
/*!40000 ALTER TABLE `school` DISABLE KEYS */;
INSERT INTO `school` VALUES (3,'CDK20251007095009','Colegio de Kidapawan',NULL,'Quezon Blvd., Kidapawan City','09107524284','easykill.aboy@gmail.com','approved','2025-10-07','09:50:09','2025-10-07','09:50:37','shakiel17','1234');
/*!40000 ALTER TABLE `school` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `school_staff`
--

DROP TABLE IF EXISTS `school_staff`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `school_staff` (
  `id` int NOT NULL AUTO_INCREMENT,
  `school_id` varchar(100) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `staff_id` varchar(100) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `staff_name` varchar(100) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `status` varchar(100) COLLATE utf8mb4_general_ci DEFAULT 'Active',
  `datearray` date DEFAULT NULL,
  `timearray` time DEFAULT NULL,
  `username` varchar(100) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `password` varchar(100) COLLATE utf8mb4_general_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `school_staff`
--

LOCK TABLES `school_staff` WRITE;
/*!40000 ALTER TABLE `school_staff` DISABLE KEYS */;
/*!40000 ALTER TABLE `school_staff` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `schoolyear`
--

DROP TABLE IF EXISTS `schoolyear`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `schoolyear` (
  `id` int NOT NULL AUTO_INCREMENT,
  `school_id` varchar(100) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `schoolyear` varchar(100) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `semester` int DEFAULT NULL,
  `status` varchar(100) COLLATE utf8mb4_general_ci DEFAULT 'Active',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `schoolyear`
--

LOCK TABLES `schoolyear` WRITE;
/*!40000 ALTER TABLE `schoolyear` DISABLE KEYS */;
INSERT INTO `schoolyear` VALUES (3,'CDK20251007095009','2025-2026',1,'Active');
/*!40000 ALTER TABLE `schoolyear` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `student`
--

DROP TABLE IF EXISTS `student`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `student` (
  `id` int NOT NULL AUTO_INCREMENT,
  `student_id` varchar(100) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `school_id` varchar(100) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `student_lastname` varchar(100) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `student_firstname` varchar(100) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `student_middlename` varchar(100) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `student_address` varchar(100) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `student_gender` varchar(100) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `student_birthdate` varchar(100) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `student_type` varchar(100) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `student_course` int DEFAULT NULL,
  `datearray` date DEFAULT NULL,
  `timearray` time DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `student`
--

LOCK TABLES `student` WRITE;
/*!40000 ALTER TABLE `student` DISABLE KEYS */;
INSERT INTO `student` VALUES (5,'25-1234','CDK20251007095009','ABOY','ECZEKIEL','HERMOCILLA','PUROK 7C, SUDAPIN, KIDAPAWAN CITY','Male','1986-05-14','college',5,'2025-10-21','09:59:53'),(6,'25-2312','CDK20251007095009','ABOY','JONAH EM','HERMOSILLA','PUROK 7, SITIO MALIGAYA, BALINDOG, KIDAPAWAN CITY','Male','1992-02-24','college',6,'2025-10-21','10:04:31');
/*!40000 ALTER TABLE `student` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `student_account_college`
--

DROP TABLE IF EXISTS `student_account_college`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `student_account_college` (
  `id` int NOT NULL AUTO_INCREMENT,
  `school_id` varchar(100) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `student_id` varchar(100) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `course` int DEFAULT NULL,
  `unitcost_lec` double DEFAULT NULL,
  `units_lec` double DEFAULT NULL,
  `unitcost_lab` double DEFAULT NULL,
  `units_lab` double DEFAULT NULL,
  `semester` int DEFAULT NULL,
  `syear` varchar(100) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `datearray` date DEFAULT NULL,
  `timearray` time DEFAULT NULL,
  `rem_balance` double DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `student_account_college`
--

LOCK TABLES `student_account_college` WRITE;
/*!40000 ALTER TABLE `student_account_college` DISABLE KEYS */;
INSERT INTO `student_account_college` VALUES (14,'CDK20251007095009','25-1234',5,185,18,195,12,1,'2025-2026','2025-10-21','10:18:24',5670),(15,'CDK20251007095009','25-2312',6,190,16,200,14,1,'2025-2026','2025-10-21','10:18:40',5840);
/*!40000 ALTER TABLE `student_account_college` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `student_account_hs`
--

DROP TABLE IF EXISTS `student_account_hs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `student_account_hs` (
  `id` int NOT NULL AUTO_INCREMENT,
  `school_id` varchar(100) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `student_id` varchar(100) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_general_ci,
  `amount` double DEFAULT NULL,
  `grade_level` int DEFAULT NULL,
  `syear` varchar(100) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `datearray` date DEFAULT NULL,
  `timearray` time DEFAULT NULL,
  `rem_balance` double DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `student_account_hs`
--

LOCK TABLES `student_account_hs` WRITE;
/*!40000 ALTER TABLE `student_account_hs` DISABLE KEYS */;
/*!40000 ALTER TABLE `student_account_hs` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2025-10-21 14:51:19
