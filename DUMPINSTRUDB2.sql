/*
SQLyog Community v13.1.2 (64 bit)
MySQL - 10.4.10-MariaDB : Database - instrumagasin
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`instrumagasin` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `instrumagasin`;

/*Table structure for table `articles` */

DROP TABLE IF EXISTS `articles`;

CREATE TABLE `articles` (
  `articleId` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) DEFAULT NULL,
  `brand` varchar(50) DEFAULT NULL,
  `picture` varchar(255) DEFAULT NULL,
  `price` decimal(5,2) DEFAULT NULL,
  `comment` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`articleId`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

/*Data for the table `articles` */

insert  into `articles`(`articleId`,`name`,`brand`,`picture`,`price`,`comment`) values 
(8,'Zenox','Cort','fehu.png',360.00,'A marvelous guitar'),
(9,'Test','Terre','deviantart_logo.png',45.00,'jijiji'),
(10,'Carré','Noix','53049-Wall-Street--Lower-Manhattan.jpg',45.00,'trtr'),
(11,'Park','Linkin','bibjesus.jpg',47.00,'best band in the world');

/*Table structure for table `carts` */

DROP TABLE IF EXISTS `carts`;

CREATE TABLE `carts` (
  `cartId` int(11) NOT NULL AUTO_INCREMENT,
  `articleId` int(11) DEFAULT NULL,
  `userId` int(11) DEFAULT NULL,
  PRIMARY KEY (`cartId`),
  KEY `articleId` (`articleId`),
  KEY `userId` (`userId`),
  CONSTRAINT `carts_ibfk_1` FOREIGN KEY (`articleId`) REFERENCES `articles` (`articleId`),
  CONSTRAINT `carts_ibfk_2` FOREIGN KEY (`userId`) REFERENCES `users` (`userId`)
) ENGINE=InnoDB AUTO_INCREMENT=33 DEFAULT CHARSET=latin1;

/*Data for the table `carts` */

insert  into `carts`(`cartId`,`articleId`,`userId`) values 
(24,10,11),
(32,8,13);

/*Table structure for table `roles` */

DROP TABLE IF EXISTS `roles`;

CREATE TABLE `roles` (
  `roleId` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`roleId`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

/*Data for the table `roles` */

insert  into `roles`(`roleId`,`name`) values 
(1,'admin'),
(2,'user');

/*Table structure for table `sellarticles` */

DROP TABLE IF EXISTS `sellarticles`;

CREATE TABLE `sellarticles` (
  `sellArticleId` int(11) NOT NULL AUTO_INCREMENT,
  `articleId` int(11) DEFAULT NULL,
  `userId` int(11) DEFAULT NULL,
  `active` tinyint(4) DEFAULT 1,
  PRIMARY KEY (`sellArticleId`),
  KEY `articleId` (`articleId`),
  KEY `userId` (`userId`),
  CONSTRAINT `sellarticles_ibfk_1` FOREIGN KEY (`articleId`) REFERENCES `articles` (`articleId`),
  CONSTRAINT `sellarticles_ibfk_2` FOREIGN KEY (`userId`) REFERENCES `users` (`userId`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

/*Data for the table `sellarticles` */

insert  into `sellarticles`(`sellArticleId`,`articleId`,`userId`,`active`) values 
(2,8,12,0),
(3,9,13,1),
(4,10,13,1),
(5,11,13,1);

/*Table structure for table `users` */

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `userId` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(50) NOT NULL,
  `pseudo` varchar(50) NOT NULL,
  `pswd` varchar(100) NOT NULL,
  `city` varchar(50) NOT NULL,
  `street` varchar(50) NOT NULL,
  `number` varchar(50) NOT NULL,
  `rating` decimal(5,2) DEFAULT NULL,
  `RoleId` int(11) DEFAULT NULL,
  PRIMARY KEY (`userId`),
  KEY `RoleId` (`RoleId`),
  CONSTRAINT `users_ibfk_1` FOREIGN KEY (`RoleId`) REFERENCES `roles` (`roleId`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

/*Data for the table `users` */

insert  into `users`(`userId`,`email`,`pseudo`,`pswd`,`city`,`street`,`number`,`rating`,`RoleId`) values 
(11,'admin@hotmail.com','admin','$2y$10$qw12qukv99xHmJ2yXOwxyeWm0qTGgSWk4kNYEP6A.YKQtduX.DWya','Le Roeulx','Chaussée de soignies','53B',0.00,1),
(12,'alexandre@hotmail.com','Alex','$2y$10$7IbHlRredbzC3gCzuWLRg.e3BvFFdS9s46YBgejc4aW1iNg./HPty','Le Roeulx','Chaussée lol','7845',0.00,2),
(13,'runolf@hotmail.com','Runolf','$2y$10$REH6e3anEBIoQs0nfZ5uG.SU0vAR9WbYqVXsSuFR6mUTJym1IV14G','Kattegat','Regnar','1066',0.00,2);

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
