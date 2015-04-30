# ************************************************************
# Sequel Pro SQL dump
# Version 4135
#
# http://www.sequelpro.com/
# http://code.google.com/p/sequel-pro/
#
# Host: localhost (MySQL 5.5.38)
# Database: n50
# Generation Time: 2015-04-29 21:06:56 +0000
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
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

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
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

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
  (7,'Rope Picture Frame','rope-picture-frame','m-frame-01','63','Lorem ipsum dolor sit amet, consectetur adipisicing elit. Deserunt itaque, distinctio nobis vel sapiente obcaecati, voluptas perferendis molestias alias nulla maxime eum neque voluptatum. At, quas incidunt optio modi. Velit.','wood;pallet',4,'Michael',1,1,'2015-04-28 14:58:25','2015-04-28 14:58:25'),
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
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

LOCK TABLES `sales_cart` WRITE;
/*!40000 ALTER TABLE `sales_cart` DISABLE KEYS */;

INSERT INTO `sales_cart` (`id`, `visitor_id`, `product_id`, `quantity`, `timestamp_updated`)
VALUES
  (1,'1657976395',3,7,'2015-04-23 14:20:16'),
  (2,'1657976395',6,2,'2015-04-23 14:20:16'),
  (3,'3045842618',3,7,'2015-04-24 16:35:39'),
  (4,'1571673046',3,7,'2015-04-24 16:36:23'),
  (5,'2229306586',3,1,'2015-04-28 13:56:01'),
  (6,'2229306586',4,3,'2015-04-28 17:00:30');

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
  `subtotal` int(11) NOT NULL,
  `tax_rate` int(11) NOT NULL,
  `tax_amount` int(11) NOT NULL,
  `shipping_amount` int(11) NOT NULL,
  `shipping_method` varchar(255) NOT NULL,
  `grand_total` int(11) NOT NULL,
  `timestamp_created` timestamp NULL DEFAULT NULL,
  `timestamp_updated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

LOCK TABLES `sales_orders` WRITE;
/*!40000 ALTER TABLE `sales_orders` DISABLE KEYS */;

INSERT INTO `sales_orders` (`id`, `visitor_id`, `first_name`, `last_name`, `email`, `phone`, `address_1`, `address_2`, `city`, `state`, `zip`, `country`, `subtotal`, `tax_rate`, `tax_amount`, `shipping_amount`, `shipping_method`, `grand_total`, `timestamp_created`, `timestamp_updated`)
VALUES
  (5,'1571673046','Miguel','Pelota','miguelpelota1@yahoo.com','1112223333','11235 Knott Ave. Suite B','','Cypress','CA','90630','United States',161,7,11,15,'UPS Ground',187,'2015-04-24 17:17:36','2015-04-24 17:17:36'),
  (8,'2229306586','Miguel','Pelota','miguelpelota1@yahoo.com','1112223333','11235 Knott Ave. Suite B','','Cypress','CA','90630','United States',23,7,2,15,'UPS Ground',39,'2015-04-28 14:52:45','2015-04-28 14:52:45');

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




/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
