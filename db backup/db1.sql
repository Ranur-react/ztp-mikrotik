/*
SQLyog Ultimate v8.55 
MySQL - 5.1.45-community : Database - db_ztp_1720003
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`db_ztp_1720003` /*!40100 DEFAULT CHARACTER SET utf8 */;

USE `db_ztp_1720003`;

/*Table structure for table `firewallfilter` */

DROP TABLE IF EXISTS `firewallfilter`;

CREATE TABLE `firewallfilter` (
  `chain` varchar(20) DEFAULT NULL,
  `layer7protokol` varchar(30) DEFAULT NULL,
  `action` varchar(30) DEFAULT NULL,
  `comment` varchar(30) DEFAULT NULL,
  `no` int(11) NOT NULL AUTO_INCREMENT,
  `idfilter` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`no`),
  KEY `FK_firewallfilter` (`layer7protokol`),
  CONSTRAINT `FK_firewallfilter` FOREIGN KEY (`layer7protokol`) REFERENCES `layer7protokol` (`name`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=52 DEFAULT CHARSET=latin1;

/*Data for the table `firewallfilter` */

insert  into `firewallfilter`(`chain`,`layer7protokol`,`action`,`comment`,`no`,`idfilter`) values ('forward','0','drop','0',49,'*26'),('forward','2','drop','2',51,'*3E');

/*Table structure for table `layer7protokol` */

DROP TABLE IF EXISTS `layer7protokol`;

CREATE TABLE `layer7protokol` (
  `name` varchar(30) NOT NULL,
  `regexp` varchar(30) DEFAULT NULL,
  `id` varchar(30) NOT NULL,
  PRIMARY KEY (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `layer7protokol` */

insert  into `layer7protokol`(`name`,`regexp`,`id`) values ('0','youtube.com','*1'),('2','blibi.com','*3');

/*Table structure for table `tb_remotelogin` */

DROP TABLE IF EXISTS `tb_remotelogin`;

CREATE TABLE `tb_remotelogin` (
  `no` int(11) NOT NULL AUTO_INCREMENT,
  `ip` varchar(100) DEFAULT NULL,
  `username` varchar(100) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`no`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

/*Data for the table `tb_remotelogin` */

insert  into `tb_remotelogin`(`no`,`ip`,`username`,`password`) values (1,'192.168.88.1','admin',NULL);

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
