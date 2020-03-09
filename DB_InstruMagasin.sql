CREATE DATABASE instrumagasin;
USE instrumagasin;

CREATE TABLE Roles(
	roleId INT PRIMARY KEY AUTO_INCREMENT NOT NULL, 
	`name` VARCHAR(50) 
)ENGINE=INNODB;

INSERT INTO Roles(`name`) VALUES("admin");
INSERT INTO Roles(`name`) VALUES("user");

CREATE TABLE Users(
	userId INT PRIMARY KEY AUTO_INCREMENT NOT NULL, 
	email VARCHAR(50) NOT NULL,
	pseudo VARCHAR(50) NOT NULL,
	pswd VARCHAR(50) NOT NULL,
	city VARCHAR(50) NOT NULL,
	street VARCHAR(50) NOT NULL,
	number VARCHAR(50) NOT NULL,
	rating DECIMAL(5,2),
	RoleId INT,
	FOREIGN KEY (RoleId) REFERENCES Roles(RoleId)
)ENGINE=INNODB;

INSERT INTO Users(email, pseudo, pswd, city, street, number, rating, RoleId)
	   VALUES("alexandreliskiewicz@hotmail.com", "Runolf", "Test1234","Le Roeulx", "Chaussée de Soignies", "54", 100, 1), 
	   VALUES("jeffbezos@hotmail.com", "Jeffounet", "Amazon1234", "Somewhere", "Street Something", "666", 100, 2),
	   VALUES("elonmusk@gmail.com", "HeyLone", "SpaceCake666", "Somewhere", "Street Something", "777", 100, 2);
	  
-- select u.pseudo, r.name as 'role'
-- from Users as u
-- join Roles as r
-- on u.RoleId = r.RoleId;

CREATE TABLE Articles(
	articleId INT PRIMARY KEY AUTO_INCREMENT NOT NULL, 
	`name` VARCHAR(50), 
	brand VARCHAR(50),
	picture VARCHAR(255),
	price DECIMAL(5,2),
	`comment` VARCHAR(255) 
)ENGINE=INNODB;



INSERT INTO Articles(`name`, brand, picture, price, `comment`)
		VALUES("cort zenox", "cort", "C:\Users\alexa\Documents\projetdev\Sell_Instrument_ProjectWeb\project\img\cort_zenox.jpg", 300.99, "amazing guitar");
		

CREATE TABLE sellArticles(
	sellArticleId INT PRIMARY KEY AUTO_INCREMENT NOT NULL,
	articleId INT,
	userId INT,
	FOREIGN KEY(articleId) REFERENCES Articles(articleId),
	FOREIGN KEY(userId) REFERENCES Users(userId)
)ENGINE=INNODB;

INSERT INTO sellarticles(articleId, userId) VALUES(1,2);


CREATE TABLE Carts(
	cartId INT PRIMARY KEY AUTO_INCREMENT NOT NULL,
	articleId INT,
	userId INT,
	FOREIGN KEY(articleId) REFERENCES Articles(articleId),
	FOREIGN KEY(userId) REFERENCES Users(userId)
)ENGINE=INNODB;

INSERT INTO carts(articleId, userId) VALUES(1,3);

