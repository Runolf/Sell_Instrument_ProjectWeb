/*
SQLyog Community v13.1.2 (64 bit)
MySQL - 10.4.11-MariaDB : Database - instrumagasin
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
DROP DATABASE IF EXISTS `instrumagasin` ;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`instrumagasin` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `instrumagasin`;

/*Table structure for table `articles` */

DROP TABLE IF EXISTS `articles`;

CREATE TABLE `articles` (
  `articleId` INT(11) NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(50) DEFAULT NULL,
  `brand` VARCHAR(50) DEFAULT NULL,
  `picture` VARCHAR(255) DEFAULT NULL,
  `price` DECIMAL(5,2) DEFAULT NULL,
  `comment` VARCHAR(255) DEFAULT NULL,
  PRIMARY KEY (`articleId`)
) ENGINE=INNODB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

/*Data for the table `articles` */

INSERT  INTO `articles`(`articleId`,`name`,`brand`,`picture`,`price`,`comment`) VALUES 
(8,'Zenox','Cort','cort_zenox.jpg',360.00,'A marvelous guitar'),
(9,'les paul','gibson','gibson_les_paul.png',999.99,'the best guitar in the world'),
(10,'mpk mini mk2','akai','akai_mini.jpg',288.00,'good for production'),
(11,'tim jr 5/6bk','stagg','stagg_tim_jr.jpg',125.00,'for kids');

/*Table structure for table `carts` */

DROP TABLE IF EXISTS `carts`;

CREATE TABLE `carts` (
  `cartId` INT(11) NOT NULL AUTO_INCREMENT,
  `articleId` INT(11) DEFAULT NULL,
  `userId` INT(11) DEFAULT NULL,
  PRIMARY KEY (`cartId`),
  KEY `articleId` (`articleId`),
  KEY `userId` (`userId`),
  CONSTRAINT `carts_ibfk_1` FOREIGN KEY (`articleId`) REFERENCES `articles` (`articleId`),
  CONSTRAINT `carts_ibfk_2` FOREIGN KEY (`userId`) REFERENCES `users` (`userId`)
) ENGINE=INNODB AUTO_INCREMENT=33 DEFAULT CHARSET=latin1;

/*Data for the table `carts` */

INSERT  INTO `carts`(`cartId`,`articleId`,`userId`) VALUES 
(24,10,11),
(32,8,13);

/*Table structure for table `roles` */

DROP TABLE IF EXISTS `roles`;

CREATE TABLE `roles` (
  `roleId` INT(11) NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(50) DEFAULT NULL,
  PRIMARY KEY (`roleId`)
) ENGINE=INNODB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

/*Data for the table `roles` */

INSERT  INTO `roles`(`roleId`,`name`) VALUES 
(1,'admin'),
(2,'user');

/*Table structure for table `sellarticles` */

DROP TABLE IF EXISTS `sellarticles`;

CREATE TABLE `sellarticles` (
  `sellArticleId` INT(11) NOT NULL AUTO_INCREMENT,
  `articleId` INT(11) DEFAULT NULL,
  `userId` INT(11) DEFAULT NULL,
  `active` TINYINT(4) DEFAULT 1,
  PRIMARY KEY (`sellArticleId`),
  KEY `articleId` (`articleId`),
  KEY `userId` (`userId`),
  CONSTRAINT `sellarticles_ibfk_1` FOREIGN KEY (`articleId`) REFERENCES `articles` (`articleId`),
  CONSTRAINT `sellarticles_ibfk_2` FOREIGN KEY (`userId`) REFERENCES `users` (`userId`)
) ENGINE=INNODB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

/*Data for the table `sellarticles` */

INSERT  INTO `sellarticles`(`sellArticleId`,`articleId`,`userId`,`active`) VALUES 
(2,8,12,0),
(3,9,13,1),
(4,10,13,1),
(5,11,13,1);

/*Table structure for table `users` */

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `userId` INT(11) NOT NULL AUTO_INCREMENT,
  `email` VARCHAR(50) NOT NULL,
  `pseudo` VARCHAR(50) NOT NULL,
  `pswd` VARCHAR(100) NOT NULL,
  `city` VARCHAR(50) NOT NULL,
  `street` VARCHAR(50) NOT NULL,
  `number` VARCHAR(50) NOT NULL,
  `rating` DECIMAL(5,2) DEFAULT NULL,
  `RoleId` INT(11) DEFAULT NULL,
  PRIMARY KEY (`userId`),
  KEY `RoleId` (`RoleId`),
  CONSTRAINT `users_ibfk_1` FOREIGN KEY (`RoleId`) REFERENCES `roles` (`roleId`)
) ENGINE=INNODB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

/*Data for the table `users` */

INSERT  INTO `users`(`userId`,`email`,`pseudo`,`pswd`,`city`,`street`,`number`,`rating`,`RoleId`) VALUES 
(11,'admin@hotmail.com','admin','$2y$10$qw12qukv99xHmJ2yXOwxyeWm0qTGgSWk4kNYEP6A.YKQtduX.DWya','Le Roeulx','Chaussée de soignies','53B',0.00,1),
(12,'alexandre@hotmail.com','Alex','$2y$10$7IbHlRredbzC3gCzuWLRg.e3BvFFdS9s46YBgejc4aW1iNg./HPty','Le Roeulx','Chaussée lol','7845',0.00,2),
(13,'runolf@hotmail.com','Runolf','$2y$10$REH6e3anEBIoQs0nfZ5uG.SU0vAR9WbYqVXsSuFR6mUTJym1IV14G','Kattegat','Regnar','1066',0.00,2);

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
