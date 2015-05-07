# ************************************************************
# Sequel Pro SQL dump
# Version 4135
#
# http://www.sequelpro.com/
# http://code.google.com/p/sequel-pro/
#
# Host: localhost (MySQL 5.5.38)
# Database: n50
# Generation Time: 2015-05-07 00:56:18 +0000
# ************************************************************


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


# Dump of table catalog_categories
# ------------------------------------------------------------

DROP TABLE IF EXISTS `catalog_categories`;

CREATE TABLE `catalog_categories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `timestamp_created` timestamp NULL DEFAULT NULL,
  `timestamp_updated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

LOCK TABLES `catalog_categories` WRITE;
/*!40000 ALTER TABLE `catalog_categories` DISABLE KEYS */;

INSERT INTO `catalog_categories` (`id`, `name`, `slug`, `status`, `timestamp_created`, `timestamp_updated`)
VALUES
  (1,'all','all',1,'2015-04-28 14:58:36','2015-04-28 14:58:36'),
  (2,'wood','wood',1,'2015-04-28 14:58:36','2015-04-28 14:58:36'),
  (3,'pallet','pallet',1,'2015-04-28 14:58:36','2015-04-28 14:58:36'),
  (4,'nautical themed','nautical-themed',1,'2015-04-28 14:58:36','2015-04-28 14:58:36'),
  (5,'burlap','burlap',1,'2015-04-28 14:58:36','2015-04-28 14:58:36'),
  (6,'signs','signs',1,'2015-04-28 14:58:36','2015-04-28 14:58:36');

/*!40000 ALTER TABLE `catalog_categories` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table catalog_products
# ------------------------------------------------------------

DROP TABLE IF EXISTS `catalog_products`;

CREATE TABLE `catalog_products` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `sku` varchar(255) NOT NULL,
  `price` varchar(10) NOT NULL DEFAULT '',
  `description` text,
  `categories` varchar(255) DEFAULT '',
  `build_time` tinyint(1) DEFAULT NULL,
  `builder` varchar(255) DEFAULT '',
  `featured` tinyint(1) DEFAULT '0',
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `timestamp_created` timestamp NULL DEFAULT NULL,
  `timestamp_updated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

LOCK TABLES `catalog_products` WRITE;
/*!40000 ALTER TABLE `catalog_products` DISABLE KEYS */;

INSERT INTO `catalog_products` (`id`, `name`, `slug`, `sku`, `price`, `description`, `categories`, `build_time`, `builder`, `featured`, `status`, `timestamp_created`, `timestamp_updated`)
VALUES
  (1,'Pallet Tray','pallet-tray','m-tray-01','49','Lorem ipsum dolor sit amet, consectetur adipisicing elit. Deserunt itaque, distinctio nobis vel sapiente obcaecati, voluptas perferendis molestias alias nulla maxime eum neque voluptatum. At, quas incidunt optio modi. Velit.','wood;pallet',2,'Michael',1,1,'2015-04-28 14:58:25','2015-04-28 14:58:25'),
  (2,'Nesting Tray','nesting-tray','m-tray-02','57','Lorem ipsum dolor sit amet, consectetur adipisicing elit. Deserunt itaque, distinctio nobis vel sapiente obcaecati, voluptas perferendis molestias alias nulla maxime eum neque voluptatum. At, quas incidunt optio modi. Velit.','wood;pallet',2,'Michael',0,1,'2015-04-28 14:58:25','2015-04-28 14:58:25'),
  (3,'Magazine Tray','magazine-tray','m-tray-03','23','Lorem ipsum dolor sit amet, consectetur adipisicing elit. Deserunt itaque, distinctio nobis vel sapiente obcaecati, voluptas perferendis molestias alias nulla maxime eum neque voluptatum. At, quas incidunt optio modi. Velit.','wood;nautical themed',1,'Michael',0,1,'2015-04-28 14:58:25','2015-04-28 14:58:25'),
  (4,'Wooden Crate','wooden-crate','m-crate-01','89','Lorem ipsum dolor sit amet, consectetur adipisicing elit. Deserunt itaque, distinctio nobis vel sapiente obcaecati, voluptas perferendis molestias alias nulla maxime eum neque voluptatum. At, quas incidunt optio modi. Velit.','wood;pallet',5,'Michael',0,1,'2015-04-28 14:58:25','2015-04-28 14:58:25'),
  (5,'Planter Box','planter-box','m-planter-01','124','Lorem ipsum dolor sit amet, consectetur adipisicing elit. Deserunt itaque, distinctio nobis vel sapiente obcaecati, voluptas perferendis molestias alias nulla maxime eum neque voluptatum. At, quas incidunt optio modi. Velit.','wood;pallet',9,'Michael',0,1,'2015-04-28 14:58:25','2015-04-28 14:58:25'),
  (6,'Burlap Letter Sign','burlap-letter-sign','m-sign-01','17','Lorem ipsum dolor sit amet, consectetur adipisicing elit. Deserunt itaque, distinctio nobis vel sapiente obcaecati, voluptas perferendis molestias alias nulla maxime eum neque voluptatum. At, quas incidunt optio modi. Velit.','wood;pallet;burlap',1,'Michael',1,1,'2015-04-28 14:58:25','2015-04-28 14:58:25'),
  (7,'Rope Picture Frame','rope-picture-frame','m-frame-01','63','Lorem ipsum dolor sit amet, consectetur adipisicing elit. Deserunt itaque, distinctio nobis vel sapiente obcaecati, voluptas perferendis molestias alias nulla maxime eum neque voluptatum. At, quas incidunt optio modi. Velit.','wood',4,'Michael',1,1,'2015-04-28 14:58:25','2015-04-29 22:45:59'),
  (8,'Ring Life Preserver Sign','ring-life-preserver-sign','m-sign-02','98','Lorem ipsum dolor sit amet, consectetur adipisicing elit. Deserunt itaque, distinctio nobis vel sapiente obcaecati, voluptas perferendis molestias alias nulla maxime eum neque voluptatum. At, quas incidunt optio modi. Velit.','wood;pallet;signs',5,'Michael',0,1,'2015-04-28 14:58:25','2015-04-28 14:58:25'),
  (9,'Sandy Salty Happy Sign','sandy-salty-happy-sign','m-sign-03','76','Lorem ipsum dolor sit amet, consectetur adipisicing elit. Deserunt itaque, distinctio nobis vel sapiente obcaecati, voluptas perferendis molestias alias nulla maxime eum neque voluptatum. At, quas incidunt optio modi. Velit.','wood;pallet;signs',5,'Michael',0,1,'2015-04-28 14:58:25','2015-04-28 14:58:25'),
  (10,'Beach Direction Sign','beach-direction-sign','m-sign-04','54','Lorem ipsum dolor sit amet, consectetur adipisicing elit. Deserunt itaque, distinctio nobis vel sapiente obcaecati, voluptas perferendis molestias alias nulla maxime eum neque voluptatum. At, quas incidunt optio modi. Velit.','wood;pallet;signs',4,'Michael',1,1,'2015-04-28 14:58:25','2015-04-28 14:58:25');

/*!40000 ALTER TABLE `catalog_products` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table sales_cart
# ------------------------------------------------------------

DROP TABLE IF EXISTS `sales_cart`;

CREATE TABLE `sales_cart` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `visitor_id` varchar(25) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(11) DEFAULT NULL,
  `timestamp_updated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

LOCK TABLES `sales_cart` WRITE;
/*!40000 ALTER TABLE `sales_cart` DISABLE KEYS */;

INSERT INTO `sales_cart` (`id`, `visitor_id`, `product_id`, `quantity`, `timestamp_updated`)
VALUES
  (1,'1657976395',3,7,'2015-04-23 14:20:16'),
  (2,'1657976395',6,2,'2015-04-23 14:20:16'),
  (3,'3045842618',3,7,'2015-04-24 16:35:39'),
  (4,'1571673046',3,7,'2015-04-24 16:36:23'),
  (5,'2229306586',3,1,'2015-04-28 13:56:01'),
  (6,'2229306586',4,3,'2015-04-28 17:00:30'),
  (7,'1469346976',1,6,'2015-05-05 22:45:24'),
  (8,'1469346976',8,4,'2015-04-29 22:47:09'),
  (14,'1469346976',5,5,'2015-05-05 22:45:31'),
  (13,'1839433233',2,2,'2015-04-30 23:08:46'),
  (15,'2829218243',10,1,'2015-05-06 16:32:38'),
  (16,'2407421816',3,1,'2015-05-06 16:33:28'),
  (17,'3443819065',8,16,'2015-05-06 16:43:59'),
  (18,'2054441972',4,1,'2015-05-06 16:48:58'),
  (19,'2054441972',1,1,'2015-05-06 16:56:55'),
  (20,'3462583336',2,1,'2015-05-06 17:23:08'),
  (21,'3334284843',3,102,'2015-05-06 17:24:45');

/*!40000 ALTER TABLE `sales_cart` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table sales_orders
# ------------------------------------------------------------

DROP TABLE IF EXISTS `sales_orders`;

CREATE TABLE `sales_orders` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `visitor_id` varchar(25) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `address_1` varchar(255) NOT NULL,
  `address_2` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `state` varchar(255) NOT NULL,
  `zip` varchar(255) NOT NULL,
  `country` varchar(255) NOT NULL,
  `subtotal` varchar(255) NOT NULL,
  `tax_rate` varchar(255) NOT NULL,
  `tax_amount` varchar(255) NOT NULL,
  `shipping_amount` varchar(255) NOT NULL,
  `shipping_method` varchar(255) NOT NULL,
  `grand_total` varchar(255) NOT NULL,
  `timestamp_created` timestamp NULL DEFAULT NULL,
  `timestamp_updated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

LOCK TABLES `sales_orders` WRITE;
/*!40000 ALTER TABLE `sales_orders` DISABLE KEYS */;

INSERT INTO `sales_orders` (`id`, `visitor_id`, `first_name`, `last_name`, `email`, `phone`, `address_1`, `address_2`, `city`, `state`, `zip`, `country`, `subtotal`, `tax_rate`, `tax_amount`, `shipping_amount`, `shipping_method`, `grand_total`, `timestamp_created`, `timestamp_updated`)
VALUES
  (11,'1469346976','Miguel','Pelota','miguelpelota1@yahoo.com','1112223333','11235 Knott Ave. Suite B','','Cypress','CA','90630','United States','1','7','0','15','UPS Ground','16','2015-05-05 22:45:38','2015-05-05 22:45:38'),
  (10,'1839433233','Miguel','Pelota','miguelpelota1@yahoo.com','1112223333','11235 Knott Ave. Suite B','','Cypress','CA','90630','United States','114','7','8','15','UPS Ground','137','2015-04-30 23:11:55','2015-04-30 23:11:55'),
  (12,'2829218243','Miguel','Pelota','miguelpelota1@yahoo.com','1112223333','11235 Knott Ave. Suite B','','Cypress','CA','90630','United States','54.00','7','3.78','14.73','UPS Ground','72.51','2015-05-06 16:32:44','2015-05-06 16:32:44'),
  (13,'2407421816','Miguel','Pelota','miguelpelota1@yahoo.com','1112223333','11235 Knott Ave. Suite B','','Cypress','CA','90630','United States','23.00','7','1.61','14.73','UPS Ground','39.34','2015-05-06 16:33:32','2015-05-06 16:33:32'),
  (15,'3443819065','Miguel','Pelota','miguelpelota1@yahoo.com','1112223333','11235 Knott Ave. Suite B','','Cypress','CA','90630','United States','1568.00','7','109.76','14.73','UPS Ground','1692.49','2015-05-06 16:47:43','2015-05-06 16:47:43'),
  (19,'2054441972','Miguel','Pelota','miguelpelota1@yahoo.com','1112223333','11235 Knott Ave. Suite B','','Cypress','CA','90630','United States','138.00','7','9.66','14.73','UPS Ground','162.39','2015-05-06 17:05:35','2015-05-06 17:05:35'),
  (23,'3462583336','Miguel','Pelota','miguelpelota1@yahoo.com','1112223333','11235 Knott Ave. Suite B','','Cypress','CA','90630','United States','57.00','7','3.99','14.73','UPS Ground','75.72','2015-05-06 17:23:45','2015-05-06 17:23:45'),
  (24,'3334284843','Miguel','Pelota','miguelpelota1@yahoo.com','1112223333','11235 Knott Ave. Suite B','','Cypress','CA','90630','United States','2346.00','7','164.22','14.73','UPS Ground','2524.95','2015-05-06 17:24:50','2015-05-06 17:24:50');

/*!40000 ALTER TABLE `sales_orders` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table sales_payments
# ------------------------------------------------------------

DROP TABLE IF EXISTS `sales_payments`;

CREATE TABLE `sales_payments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `visitor_id` varchar(25) NOT NULL,
  `stripe_token` varchar(255) NOT NULL,
  `stripe_token_type` varchar(255) NOT NULL,
  `stripe_email` varchar(255) NOT NULL,
  `grand_total` decimal(10,0) NOT NULL,
  `charge_id` varchar(255) NOT NULL,
  `charge_status` varchar(255) NOT NULL,
  `timestamp_created` timestamp NULL DEFAULT NULL,
  `timestamp_updated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

LOCK TABLES `sales_payments` WRITE;
/*!40000 ALTER TABLE `sales_payments` DISABLE KEYS */;

INSERT INTO `sales_payments` (`id`, `visitor_id`, `stripe_token`, `stripe_token_type`, `stripe_email`, `grand_total`, `charge_id`, `charge_status`, `timestamp_created`, `timestamp_updated`)
VALUES
  (1,'1839433233','tok_15xXO4DfIHng7w804k8a7xfH','card','miguelpelota1@yahoo.com',137,'ch_15xXO7DfIHng7w80Y9FowUPA','succeeded','2015-04-30 23:12:39','2015-04-30 23:12:39'),
  (2,'1469346976','tok_15zLLlDfIHng7w80IsMxCaar','card','miguelpelota1@yahoo.com',16,'ch_15zLLoDfIHng7w80CVOCep1K','succeeded','2015-05-05 22:45:46','2015-05-05 22:45:46'),
  (3,'2829218243','tok_15zc0cDfIHng7w80kE4BFTvR','card','miguelpelota1@yahoo.com',73,'ch_15zc0qDfIHng7w802BBklZ24','succeeded','2015-05-06 16:33:13','2015-05-06 16:33:13'),
  (4,'2407421816','tok_15zc8ZDfIHng7w80s9J2gHSV','card','miguelpelota1@yahoo.com',39,'ch_15zc8cDfIHng7w800nQnoDLZ','succeeded','2015-05-06 16:41:17','2015-05-06 16:41:17'),
  (5,'3443819065','tok_15zcExDfIHng7w80ZCazTsRU','card','miguelpelota1@yahoo.com',1692,'ch_15zcF0DfIHng7w807PmGyDUA','succeeded','2015-05-06 16:47:50','2015-05-06 16:47:50'),
  (6,'2054441972','tok_15zcWJDfIHng7w80hBaKrNXT','card','miguelpelota1@yahoo.com',162,'ch_15zcWMDfIHng7w80ERZh8tmG','succeeded','2015-05-06 17:05:47','2015-05-06 17:05:47'),
  (7,'3462583336','tok_15zco8DfIHng7w80uF00FrvH','card','miguelpelota1@yahoo.com',76,'ch_15zcoBDfIHng7w80AwVPrUNd','succeeded','2015-05-06 17:24:11','2015-05-06 17:24:11'),
  (8,'3334284843','tok_15zcp2DfIHng7w80rAjZKJAA','card','miguelpelota1@yahoo.com',2525,'ch_15zcp7DfIHng7w80hBpR57Ga','succeeded','2015-05-06 17:25:09','2015-05-06 17:25:09');

/*!40000 ALTER TABLE `sales_payments` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table users_newsletter
# ------------------------------------------------------------

DROP TABLE IF EXISTS `users_newsletter`;

CREATE TABLE `users_newsletter` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `visitor_id` varchar(25) NOT NULL,
  `email` varchar(255) NOT NULL,
  `timestamp_created` timestamp NULL DEFAULT NULL,
  `timestamp_updated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

LOCK TABLES `users_newsletter` WRITE;
/*!40000 ALTER TABLE `users_newsletter` DISABLE KEYS */;

INSERT INTO `users_newsletter` (`id`, `visitor_id`, `email`, `timestamp_created`, `timestamp_updated`)
VALUES
  (2,'1469346976','miguelpelota1@yahoo.com','2015-05-03 22:58:16','2015-05-03 22:58:16'),
  (3,'1469346976','michael.b@530medialab.com','2015-05-03 23:05:35','2015-05-03 23:05:35'),
  (4,'1469346976','123@abc.com','2015-05-03 23:06:20','2015-05-03 23:06:20');

/*!40000 ALTER TABLE `users_newsletter` ENABLE KEYS */;
UNLOCK TABLES;



/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
