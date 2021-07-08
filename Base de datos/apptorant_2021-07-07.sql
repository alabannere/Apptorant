# ************************************************************
# Sequel Pro SQL dump
# Versión 4541
#
# http://www.sequelpro.com/
# https://github.com/sequelpro/sequelpro
#
# Host: 190.228.29.62 (MySQL 5.7.18)
# Base de datos: apptorant
# Tiempo de Generación: 2021-07-08 01:46:27 +0000
# ************************************************************


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


# Volcado de tabla categories
# ------------------------------------------------------------

DROP TABLE IF EXISTS `categories`;

CREATE TABLE `categories` (
  `ID` bigint(200) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(200) DEFAULT NULL,
  `image` varchar(200) DEFAULT NULL,
  `update_data` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `active` varchar(200) NOT NULL DEFAULT 'yes',
  `icon` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `categories` WRITE;
/*!40000 ALTER TABLE `categories` DISABLE KEYS */;

INSERT INTO `categories` (`ID`, `name`, `image`, `update_data`, `active`, `icon`)
VALUES
	(1,'Gaseosas',NULL,'2021-07-07 22:42:25','yes','fa fa-wine-bottle'),
	(2,'Postres',NULL,'2019-10-23 01:13:53','yes','fa fa-ice-cream'),
	(3,'Pizzas',NULL,'2019-10-22 23:31:15','yes','fa fa-pizza-slice'),
	(4,'Cervezas',NULL,'2019-10-23 01:37:48','yes','fa fa-wine-bottle');

/*!40000 ALTER TABLE `categories` ENABLE KEYS */;
UNLOCK TABLES;


# Volcado de tabla clients
# ------------------------------------------------------------

DROP TABLE IF EXISTS `clients`;

CREATE TABLE `clients` (
  `ID` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL DEFAULT '',
  `phone` varchar(255) NOT NULL DEFAULT '',
  `address` varchar(255) NOT NULL DEFAULT '',
  `email` varchar(100) NOT NULL DEFAULT '',
  PRIMARY KEY (`ID`),
  KEY `user_login_key` (`name`),
  KEY `user_nicename` (`address`),
  KEY `user_email` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `clients` WRITE;
/*!40000 ALTER TABLE `clients` DISABLE KEYS */;

INSERT INTO `clients` (`ID`, `name`, `phone`, `address`, `email`)
VALUES
	(1,'Alejandro Labannere','1151385190','moreno 579, capilla del señor, bueno aires argentin','alabannere@me.com');

/*!40000 ALTER TABLE `clients` ENABLE KEYS */;
UNLOCK TABLES;


# Volcado de tabla config
# ------------------------------------------------------------

DROP TABLE IF EXISTS `config`;

CREATE TABLE `config` (
  `ID` bigint(200) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(200) DEFAULT NULL,
  `value` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `config` WRITE;
/*!40000 ALTER TABLE `config` DISABLE KEYS */;

INSERT INTO `config` (`ID`, `name`, `value`)
VALUES
	(1,'name','La roti'),
	(2,'phone','123123123'),
	(3,'address','moreno 579'),
	(4,'ticket_logo','url'),
	(5,'ticket_top',''),
	(6,'ticket_bottom_l1',''),
	(7,'ticket_bottom_l2','');

/*!40000 ALTER TABLE `config` ENABLE KEYS */;
UNLOCK TABLES;


# Volcado de tabla orders
# ------------------------------------------------------------

DROP TABLE IF EXISTS `orders`;

CREATE TABLE `orders` (
  `ID` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `type` varchar(255) DEFAULT '' COMMENT 'salon o delivery',
  `state` varchar(255) DEFAULT 'active',
  `number_table` varchar(255) DEFAULT '',
  `pay_type` varchar(255) DEFAULT 'efectivo' COMMENT 'efectivo, tarjeta',
  `order` varchar(2000) DEFAULT '' COMMENT 'json order',
  `total` varchar(255) DEFAULT '' COMMENT 'total costo',
  `id_client` varchar(255) DEFAULT '' COMMENT 'total costo',
  `pay_with` varchar(255) DEFAULT '' COMMENT 'paga con',
  `pay_turned` varchar(255) DEFAULT '' COMMENT 'vuelto',
  `date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP COMMENT 'vuelto',
  `id_user` varchar(255) DEFAULT '' COMMENT 'usuario',
  PRIMARY KEY (`ID`),
  KEY `user_nicename` (`state`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `orders` WRITE;
/*!40000 ALTER TABLE `orders` DISABLE KEYS */;

INSERT INTO `orders` (`ID`, `type`, `state`, `number_table`, `pay_type`, `order`, `total`, `id_client`, `pay_with`, `pay_turned`, `date`, `id_user`)
VALUES
	(18,'salon','active','3','efectivo','3','160.000','','','','2019-10-23 14:02:35',''),
	(19,'salon','active','3','efectivo','3','80.000','','','','2019-10-23 14:04:04',''),
	(20,'salon','active','2','efectivo','2','240.430','','','','2019-10-23 14:25:03',''),
	(21,'salon','active','2','efectivo','2','240.430','','','','2019-10-23 14:25:03',''),
	(22,'salon','active','1','efectivo','1','1000.900','','','','2019-10-23 14:29:14',''),
	(23,'salon','active','2','efectivo','2','240.000','','','','2021-07-07 22:37:49',''),
	(24,'salon','active','5','efectivo','5','480.000','','','','2021-07-07 22:39:15',''),
	(25,'salon','active','5','efectivo','5','160.000','','','','2021-07-07 22:41:40',''),
	(26,'salon','active','3','efectivo','3','80.000','','','','2021-07-07 22:43:11',''),
	(27,'salon','active','4','efectivo','4','160.000','','','','2021-07-07 22:44:04','');

/*!40000 ALTER TABLE `orders` ENABLE KEYS */;
UNLOCK TABLES;


# Volcado de tabla products
# ------------------------------------------------------------

DROP TABLE IF EXISTS `products`;

CREATE TABLE `products` (
  `ID` bigint(200) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(200) DEFAULT NULL,
  `image` varchar(200) DEFAULT NULL,
  `stock` varchar(200) DEFAULT NULL,
  `update_data` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `active` varchar(200) NOT NULL DEFAULT 'yes',
  `category` varchar(200) DEFAULT NULL,
  `price` varchar(200) DEFAULT '00.00',
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `products` WRITE;
/*!40000 ALTER TABLE `products` DISABLE KEYS */;

INSERT INTO `products` (`ID`, `name`, `image`, `stock`, `update_data`, `active`, `category`, `price`)
VALUES
	(1,'Coca-cola 1/4','files/general/bebidas/cocacola.jpg','12','2019-10-23 02:50:47','yes','1','80'),
	(2,'Fanta 1/4','files/general/bebidas/fanta.jpg','12','2019-10-23 02:50:50','yes','1','80'),
	(3,'Manaos 1/4','files/general/bebidas/manaos-cola.jpg','12','2019-10-23 02:50:53','yes','1','80'),
	(4,'Manaos Lima 1/4','files/general/bebidas/manaos-lima.jpg','12','2019-10-23 02:50:59','yes','1','80'),
	(5,'Manaos Pomelo 1/4','files/general/bebidas/manaos-pomelo.jpg','12','2019-10-23 02:51:01','yes','1','80'),
	(6,'Pizza napolitana','files/general/pizza.jpg','12','2019-10-14 00:14:58','yes','3','80.43'),
	(7,'Pizza napolitana','files/general/pizza.jpg','12','2019-10-13 23:50:51','yes','3','1000.90'),
	(8,'Quilmes Porron','files/general/bebidas/quilmes-porron.jpg','12','2019-10-23 02:46:47','yes','4','80'),
	(9,'Quilmes Lata','files/general/bebidas/quilmes-lata.jpg','12','2019-10-23 02:46:47','yes','4','80.43'),
	(10,'Coca-cola 2L','files/general/bebidas/cocacola.jpg','12','2019-10-23 02:50:47','yes','1','80'),
	(11,'Coca-cola 600cc','files/general/bebidas/cocacola-600.jpg','12','2019-10-23 02:54:27','yes','1','80'),
	(12,'Coca-cola 3L','files/general/bebidas/cocacola.jpg','12','2019-10-23 02:50:47','yes','1','80'),
	(13,'Coca-cola lata','files/general/bebidas/cocacola-lata.jpg','12','2019-10-23 02:50:47','yes','1','80');

/*!40000 ALTER TABLE `products` ENABLE KEYS */;
UNLOCK TABLES;


# Volcado de tabla tables
# ------------------------------------------------------------

DROP TABLE IF EXISTS `tables`;

CREATE TABLE `tables` (
  `ID` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `number` varchar(255) NOT NULL DEFAULT '',
  `active` varchar(255) NOT NULL DEFAULT 'false',
  `sector` varchar(255) NOT NULL DEFAULT 'interior',
  PRIMARY KEY (`ID`),
  KEY `user_nicename` (`active`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `tables` WRITE;
/*!40000 ALTER TABLE `tables` DISABLE KEYS */;

INSERT INTO `tables` (`ID`, `number`, `active`, `sector`)
VALUES
	(1,'1','true','a'),
	(2,'2','true','a'),
	(3,'3','true','a'),
	(4,'4','true','b'),
	(5,'5','true','b'),
	(6,'6','false','b');

/*!40000 ALTER TABLE `tables` ENABLE KEYS */;
UNLOCK TABLES;


# Volcado de tabla users
# ------------------------------------------------------------

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `ID` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `user_login` varchar(60) NOT NULL DEFAULT '',
  `user_pass` varchar(255) NOT NULL DEFAULT '',
  `user_email` varchar(100) NOT NULL DEFAULT '',
  `user_status` int(11) NOT NULL DEFAULT '0',
  `user_name` varchar(250) NOT NULL DEFAULT '',
  `user_type` varchar(250) NOT NULL DEFAULT 'user',
  `user_code` varchar(250) DEFAULT '',
  PRIMARY KEY (`ID`),
  KEY `user_login_key` (`user_login`),
  KEY `user_email` (`user_email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;

INSERT INTO `users` (`ID`, `user_login`, `user_pass`, `user_email`, `user_status`, `user_name`, `user_type`, `user_code`)
VALUES
	(0,'laroti','$2y$10$iQhWgEX1.cYiVPPPsbZ7cuzAe9v05LSsCXQSUBI243PygQJ.KQy8u','',0,'Admin','admin','123');

/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;



/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
