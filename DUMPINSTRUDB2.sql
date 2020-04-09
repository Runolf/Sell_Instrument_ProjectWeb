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
) ENGINE=INNODB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

/*Data for the table `articles` */

INSERT  INTO `articles`(`articleId`,`name`,`brand`,`picture`,`price`,`comment`) VALUES 
(1,'cort zenox','cort','C:UsersalexaDocumentsprojetdevSell_Instrument_ProjectWebprojectimgcort_zenox.jpg',300.99,'amazing guitar'),
(2,'Bodhran','Gaia','*',50.99,'Beautiful bodhran from Ireland'),
(3,'stagg 457','stagg','...',99.99,'shitty guitar'),
(4,'Bat 1452','Batterie','...',998.99,'wtf'),
(5,'Lenovo 41441','Pc Master Race','...',999.99,'OK BOOMER'),
(6,'Skyrim celeste','Jeu video','...',15.99,'Nope'),
(7,'Wars','Star','...',999.99,'I have a bad feeling about this!');

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
) ENGINE=INNODB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

/*Data for the table `carts` */

INSERT  INTO `carts`(`cartId`,`articleId`,`userId`) VALUES 
(1,1,3);

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
  PRIMARY KEY (`sellArticleId`),
  KEY `articleId` (`articleId`),
  KEY `userId` (`userId`),
  CONSTRAINT `sellarticles_ibfk_1` FOREIGN KEY (`articleId`) REFERENCES `articles` (`articleId`),
  CONSTRAINT `sellarticles_ibfk_2` FOREIGN KEY (`userId`) REFERENCES `users` (`userId`)
) ENGINE=INNODB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

/*Data for the table `sellarticles` */

INSERT  INTO `sellarticles`(`sellArticleId`,`articleId`,`userId`) VALUES 
(1,1,2);

/*Table structure for table `users` */

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `userId` INT(11) NOT NULL AUTO_INCREMENT,
  `email` VARCHAR(50) NOT NULL,
  `pseudo` VARCHAR(50) NOT NULL,
  `pswd` VARCHAR(50) NOT NULL,
  `city` VARCHAR(50) NOT NULL,
  `street` VARCHAR(50) NOT NULL,
  `number` VARCHAR(50) NOT NULL,
  `rating` DECIMAL(5,2) DEFAULT NULL,
  `RoleId` INT(11) DEFAULT NULL,
  PRIMARY KEY (`userId`),
  KEY `RoleId` (`RoleId`),
  CONSTRAINT `users_ibfk_1` FOREIGN KEY (`RoleId`) REFERENCES `roles` (`roleId`)
) ENGINE=INNODB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

/*Data for the table `users` */

INSERT  INTO `users`(`userId`,`email`,`pseudo`,`pswd`,`city`,`street`,`number`,`rating`,`RoleId`) VALUES 
(1,'alexandreliskiewicz@hotmail.com','Runolf','Test1234','Le Roeulx','Chaussée de Soignies','54',100.00,1);


/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
