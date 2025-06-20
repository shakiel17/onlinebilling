/*
SQLyog Community v13.3.0 (64 bit)
MySQL - 10.4.32-MariaDB : Database - onlinebilling
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`onlinebilling` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci */;

USE `onlinebilling`;

/*Table structure for table `admin` */

DROP TABLE IF EXISTS `admin`;

CREATE TABLE `admin` (
  `id` int(45) NOT NULL AUTO_INCREMENT,
  `fullname` varchar(100) DEFAULT NULL,
  `username` varchar(100) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Table structure for table `bill_history_college` */

DROP TABLE IF EXISTS `bill_history_college`;

CREATE TABLE `bill_history_college` (
  `id` int(45) NOT NULL AUTO_INCREMENT,
  `refno` varchar(100) DEFAULT NULL,
  `school_id` varchar(100) DEFAULT NULL,
  `student_id` varchar(100) DEFAULT NULL,
  `amount` double DEFAULT NULL,
  `semester` int(11) DEFAULT NULL,
  `syear` varchar(100) DEFAULT NULL,
  `amount_paid` double DEFAULT NULL,
  `remarks` text DEFAULT NULL,
  `datearray` date DEFAULT NULL,
  `timearray` time DEFAULT NULL,
  `status` varchar(100) DEFAULT NULL,
  `due_date` date DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Table structure for table `bill_history_hs` */

DROP TABLE IF EXISTS `bill_history_hs`;

CREATE TABLE `bill_history_hs` (
  `id` int(45) NOT NULL AUTO_INCREMENT,
  `refno` varchar(100) DEFAULT NULL,
  `school_id` varchar(100) DEFAULT NULL,
  `student_id` varchar(100) DEFAULT NULL,
  `amount` double DEFAULT NULL,
  `syear` varchar(100) DEFAULT NULL,
  `amount_paid` double DEFAULT NULL,
  `remarks` text DEFAULT NULL,
  `datearray` date DEFAULT NULL,
  `timearray` time DEFAULT NULL,
  `status` varchar(100) DEFAULT 'pending',
  `due_date` date DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Table structure for table `course` */

DROP TABLE IF EXISTS `course`;

CREATE TABLE `course` (
  `id` int(45) NOT NULL AUTO_INCREMENT,
  `school_id` varchar(100) DEFAULT NULL,
  `description` varchar(100) DEFAULT NULL,
  `amount` double DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Table structure for table `exam_frequency` */

DROP TABLE IF EXISTS `exam_frequency`;

CREATE TABLE `exam_frequency` (
  `id` int(45) NOT NULL AUTO_INCREMENT,
  `school_id` varchar(100) DEFAULT NULL,
  `frequency` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Table structure for table `gcash` */

DROP TABLE IF EXISTS `gcash`;

CREATE TABLE `gcash` (
  `id` int(45) NOT NULL AUTO_INCREMENT,
  `school_id` varchar(100) DEFAULT NULL,
  `acctno` varchar(100) DEFAULT NULL,
  `acctname` varchar(100) DEFAULT NULL,
  `img` longblob DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Table structure for table `grade` */

DROP TABLE IF EXISTS `grade`;

CREATE TABLE `grade` (
  `id` int(45) NOT NULL AUTO_INCREMENT,
  `school_id` varchar(100) DEFAULT NULL,
  `description` varchar(100) DEFAULT NULL,
  `amount` double DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Table structure for table `guardian` */

DROP TABLE IF EXISTS `guardian`;

CREATE TABLE `guardian` (
  `id` int(45) NOT NULL AUTO_INCREMENT,
  `school_id` varchar(100) DEFAULT NULL,
  `g_id` varchar(100) DEFAULT NULL,
  `g_name` varchar(100) DEFAULT NULL,
  `g_email` varchar(100) DEFAULT NULL,
  `g_contact` varchar(100) DEFAULT NULL,
  `g_username` varchar(100) DEFAULT NULL,
  `g_password` varchar(100) DEFAULT NULL,
  `datearray` date DEFAULT NULL,
  `timearray` time DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Table structure for table `guardian_details` */

DROP TABLE IF EXISTS `guardian_details`;

CREATE TABLE `guardian_details` (
  `id` int(45) NOT NULL AUTO_INCREMENT,
  `school_id` varchar(100) DEFAULT NULL,
  `g_id` varchar(100) DEFAULT NULL,
  `student_id` varchar(100) DEFAULT NULL,
  `datearray` date DEFAULT NULL,
  `timearray` time DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Table structure for table `notification` */

DROP TABLE IF EXISTS `notification`;

CREATE TABLE `notification` (
  `id` int(45) NOT NULL AUTO_INCREMENT,
  `school_id` varchar(100) DEFAULT NULL,
  `invno` varchar(100) DEFAULT NULL,
  `student_id` varchar(100) DEFAULT NULL,
  `datearray` date DEFAULT NULL,
  `timearray` time DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Table structure for table `payment` */

DROP TABLE IF EXISTS `payment`;

CREATE TABLE `payment` (
  `id` int(45) NOT NULL AUTO_INCREMENT,
  `refno` varchar(100) DEFAULT NULL,
  `school_id` varchar(100) DEFAULT NULL,
  `student_id` varchar(100) DEFAULT NULL,
  `amount` double DEFAULT NULL,
  `remarks` text DEFAULT NULL,
  `payment_proof` longblob DEFAULT NULL,
  `status` varchar(100) DEFAULT 'pending',
  `datearray` date DEFAULT NULL,
  `timearray` time DEFAULT NULL,
  `date_approved` date DEFAULT NULL,
  `time_approved` time DEFAULT NULL,
  `approved_by` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Table structure for table `school` */

DROP TABLE IF EXISTS `school`;

CREATE TABLE `school` (
  `id` int(45) NOT NULL AUTO_INCREMENT,
  `school_id` varchar(100) NOT NULL,
  `school_name` varchar(100) DEFAULT NULL,
  `school_logo` longblob DEFAULT NULL,
  `school_address` text DEFAULT NULL,
  `school_contact` varchar(100) DEFAULT NULL,
  `school_email` varchar(100) DEFAULT NULL,
  `status` varchar(100) DEFAULT 'pending',
  `datearray` date DEFAULT NULL,
  `timearray` time DEFAULT NULL,
  `date_approved` date DEFAULT NULL,
  `time_approved` time DEFAULT NULL,
  `username` varchar(100) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Table structure for table `school_staff` */

DROP TABLE IF EXISTS `school_staff`;

CREATE TABLE `school_staff` (
  `id` int(45) NOT NULL AUTO_INCREMENT,
  `school_id` varchar(100) DEFAULT NULL,
  `staff_id` varchar(100) DEFAULT NULL,
  `staff_name` varchar(100) DEFAULT NULL,
  `status` varchar(100) DEFAULT 'Active',
  `datearray` date DEFAULT NULL,
  `timearray` time DEFAULT NULL,
  `username` varchar(100) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Table structure for table `schoolyear` */

DROP TABLE IF EXISTS `schoolyear`;

CREATE TABLE `schoolyear` (
  `id` int(45) NOT NULL AUTO_INCREMENT,
  `school_id` varchar(100) DEFAULT NULL,
  `schoolyear` varchar(100) DEFAULT NULL,
  `semester` int(11) DEFAULT NULL,
  `status` varchar(100) DEFAULT 'Active',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Table structure for table `student` */

DROP TABLE IF EXISTS `student`;

CREATE TABLE `student` (
  `id` int(45) NOT NULL AUTO_INCREMENT,
  `student_id` varchar(100) DEFAULT NULL,
  `school_id` varchar(100) DEFAULT NULL,
  `student_lastname` varchar(100) DEFAULT NULL,
  `student_firstname` varchar(100) DEFAULT NULL,
  `student_middlename` varchar(100) DEFAULT NULL,
  `student_address` varchar(100) DEFAULT NULL,
  `student_gender` varchar(100) DEFAULT NULL,
  `student_birthdate` varchar(100) DEFAULT NULL,
  `student_type` varchar(100) DEFAULT NULL,
  `student_course` int(11) DEFAULT NULL,
  `datearray` date DEFAULT NULL,
  `timearray` time DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Table structure for table `student_account_college` */

DROP TABLE IF EXISTS `student_account_college`;

CREATE TABLE `student_account_college` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `school_id` varchar(100) DEFAULT NULL,
  `student_id` varchar(100) DEFAULT NULL,
  `course` int(11) DEFAULT NULL,
  `unitcost` double DEFAULT NULL,
  `units` double DEFAULT NULL,
  `semester` int(11) DEFAULT NULL,
  `syear` varchar(100) DEFAULT NULL,
  `datearray` date DEFAULT NULL,
  `timearray` time DEFAULT NULL,
  `rem_balance` double DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Table structure for table `student_account_hs` */

DROP TABLE IF EXISTS `student_account_hs`;

CREATE TABLE `student_account_hs` (
  `id` int(45) NOT NULL AUTO_INCREMENT,
  `school_id` varchar(100) DEFAULT NULL,
  `student_id` varchar(100) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `amount` double DEFAULT NULL,
  `grade_level` int(11) DEFAULT NULL,
  `syear` varchar(100) DEFAULT NULL,
  `datearray` date DEFAULT NULL,
  `timearray` time DEFAULT NULL,
  `rem_balance` double DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
