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

INSERT INTO `catalog_categories` (`id`, `name`, `slug`, `status`, `timestamp_created`, `timestamp_updated`)
VALUES
	(1,'all','all',1,'2015-04-22 17:36:47','2015-04-22 17:36:47'),
	(2,'wood','wood',1,'2015-04-22 17:36:47','2015-04-22 17:36:47'),
	(3,'pallet','pallet',1,'2015-04-22 17:36:47','2015-04-22 17:36:47'),
	(4,'nautical themed','nautical-themed',1,'2015-04-22 17:36:47','2015-04-22 17:36:47'),
	(5,'burlap','burlap',1,'2015-04-22 17:36:47','2015-04-22 17:36:47'),
	(6,'signs','signs',1,'2015-04-22 17:36:47','2015-04-22 17:36:47');

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

INSERT INTO `catalog_products` (`id`, `name`, `slug`, `sku`, `price`, `description`, `categories`, `build_time`, `status`, `timestamp_created`, `timestamp_updated`)
VALUES
	(1,'Pallet Tray','pallet-tray','m-tray-01','49','Lorem ipsum dolor sit amet, consectetur adipisicing elit. Deserunt itaque, distinctio nobis vel sapiente obcaecati, voluptas perferendis molestias alias nulla maxime eum neque voluptatum. At, quas incidunt optio modi. Velit.','wood;pallet',2,1,'2015-04-21 14:20:01','2015-04-21 14:29:01'),
	(2,'Nesting Tray','nesting-tray','m-tray-02','57','Lorem ipsum dolor sit amet, consectetur adipisicing elit. Deserunt itaque, distinctio nobis vel sapiente obcaecati, voluptas perferendis molestias alias nulla maxime eum neque voluptatum. At, quas incidunt optio modi. Velit.','wood;pallet',2,1,'2015-04-21 14:20:01','2015-04-21 14:29:01'),
	(3,'Magazine Tray','magazine-tray','m-tray-03','23','Lorem ipsum dolor sit amet, consectetur adipisicing elit. Deserunt itaque, distinctio nobis vel sapiente obcaecati, voluptas perferendis molestias alias nulla maxime eum neque voluptatum. At, quas incidunt optio modi. Velit.','wood;nautical themed',1,1,'2015-04-21 14:20:01','2015-04-21 15:57:08'),
	(4,'Wooden Crate','wooden-crate','m-crate-01','89','Lorem ipsum dolor sit amet, consectetur adipisicing elit. Deserunt itaque, distinctio nobis vel sapiente obcaecati, voluptas perferendis molestias alias nulla maxime eum neque voluptatum. At, quas incidunt optio modi. Velit.','wood;pallet',5,1,'2015-04-21 14:20:01','2015-04-21 14:29:01'),
	(5,'Planter Box','planter-box','m-planter-01','124','Lorem ipsum dolor sit amet, consectetur adipisicing elit. Deserunt itaque, distinctio nobis vel sapiente obcaecati, voluptas perferendis molestias alias nulla maxime eum neque voluptatum. At, quas incidunt optio modi. Velit.','wood;pallet',9,1,'2015-04-21 14:20:01','2015-04-21 14:29:01'),
	(6,'Burlap Letter Sign','burlap-letter-sign','m-sign-01','17','Lorem ipsum dolor sit amet, consectetur adipisicing elit. Deserunt itaque, distinctio nobis vel sapiente obcaecati, voluptas perferendis molestias alias nulla maxime eum neque voluptatum. At, quas incidunt optio modi. Velit.','wood;pallet;burlap',1,1,'2015-04-21 14:20:01','2015-04-21 14:29:01'),
	(7,'Rope Picture Frame','rope-picture-frame','m-frame-01','63','Lorem ipsum dolor sit amet, consectetur adipisicing elit. Deserunt itaque, distinctio nobis vel sapiente obcaecati, voluptas perferendis molestias alias nulla maxime eum neque voluptatum. At, quas incidunt optio modi. Velit.','wood;pallet',4,1,'2015-04-21 14:20:01','2015-04-21 14:29:01'),
	(8,'Ring Life Preserver Sign','ring-life-preserver-sign','m-sign-02','98','Lorem ipsum dolor sit amet, consectetur adipisicing elit. Deserunt itaque, distinctio nobis vel sapiente obcaecati, voluptas perferendis molestias alias nulla maxime eum neque voluptatum. At, quas incidunt optio modi. Velit.','wood;pallet;signs',5,1,'2015-04-21 14:20:01','2015-04-21 14:29:01'),
	(9,'Sandy Salty Happy Sign','sandy-salty-happy-sign','m-sign-03','76','Lorem ipsum dolor sit amet, consectetur adipisicing elit. Deserunt itaque, distinctio nobis vel sapiente obcaecati, voluptas perferendis molestias alias nulla maxime eum neque voluptatum. At, quas incidunt optio modi. Velit.','wood;pallet;signs',5,1,'2015-04-21 14:20:01','2015-04-21 14:29:01'),
	(10,'Beach Direction Sign','beach-direction-sign','m-sign-04','54','Lorem ipsum dolor sit amet, consectetur adipisicing elit. Deserunt itaque, distinctio nobis vel sapiente obcaecati, voluptas perferendis molestias alias nulla maxime eum neque voluptatum. At, quas incidunt optio modi. Velit.','wood;pallet;signs',4,1,'2015-04-21 14:20:01','2015-04-21 14:29:01');

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

INSERT INTO `sales_cart` (`id`, `visitor_id`, `product_id`, `quantity`, `timestamp_updated`)
VALUES
	(1,'2164377453',3,7,'2015-04-21 16:57:06'),
	(2,'2164377453',6,2,'2015-04-21 16:57:06');

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
  `subtotal` decimal(10,0) NOT NULL,
  `tax_rate` int(11) NOT NULL,
  `tax_amount` decimal(10,0) NOT NULL,
  `shipping_amount` decimal(10,0) NOT NULL,
  `shipping_method` varchar(255) NOT NULL,
  `grand_total` decimal(10,0) NOT NULL,
  `timestamp_created` timestamp NULL DEFAULT NULL,
  `timestamp_updated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

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