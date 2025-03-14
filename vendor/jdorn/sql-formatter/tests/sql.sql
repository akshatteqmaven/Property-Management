SELECT customer_id, customer_name, COUNT(order_id) as total
FROM customers INNER JOIN orders ON customers.customer_id = orders.customer_id
GROUP BY customer_id, customer_name
HAVING COUNT(order_id) > 5
ORDER BY COUNT(order_id) DESC;

UPDATE customers
        SET totalorders = ordersummary.total
        FROM (SELECT customer_id, count(order_id) As total 
FROM orders GROUP BY customer_id) As ordersummary
        WHERE customers.customer_id = ordersummary.customer_id

SELECT * FROM sometable
UNION ALL
SELECT * FROM someothertable;

SET NAMES 'utf8';

CREATE TABLE `PREFIX_address` (
  `id_address` int(10) unsigned NOT NULL auto_increment,
  `id_country` int(10) unsigned NOT NULL,
  `id_state` int(10) unsigned default NULL,
  `id_customer` int(10) unsigned NOT NULL default '0',
  `id_manufacturer` int(10) unsigned NOT NULL default '0',
  `id_supplier` int(10) unsigned NOT NULL default '0',
  `id_warehouse` int(10) unsigned NOT NULL default '0',
  `alias` varchar(32) NOT NULL,
  `company` varchar(64) default NULL,
  `lastname` varchar(32) NOT NULL,
  `firstname` varchar(32) NOT NULL,
  `address1` varchar(128) NOT NULL,
  `address2` varchar(128) default NULL,
  `postcode` varchar(12) default NULL,
  `city` varchar(64) NOT NULL,
  `other` text,
  `phone` varchar(16) default NULL,
  `phone_mobile` varchar(16) default NULL,
  `vat_number` varchar(32) default NULL,
  `dni` varchar(16) DEFAULT NULL,
  `date_add` datetime NOT NULL,
  `date_upd` datetime NOT NULL,
  `active` tinyint(1) unsigned NOT NULL default '1',
  `deleted` tinyint(1) unsigned NOT NULL default '0',
  PRIMARY KEY (`id_address`),
  KEY `address_customer` (`id_customer`),
  KEY `id_country` (`id_country`),
  KEY `id_state` (`id_state`),
  KEY `id_manufacturer` (`id_manufacturer`),
  KEY `id_supplier` (`id_supplier`),
  KEY `id_warehouse` (`id_warehouse`)
) ENGINE=ENGINE_TYPE DEFAULT CHARSET=utf8

CREATE TABLE `PREFIX_alias` (
  `id_alias` int(10) unsigned NOT NULL auto_increment,
  `alias` varchar(255) NOT NULL,
  `search` varchar(255) NOT NULL,
  `active` tinyint(1) NOT NULL default '1',
  PRIMARY KEY (`id_alias`),
  UNIQUE KEY `alias` (`alias`)
) ENGINE=ENGINE_TYPE DEFAULT CHARSET=utf8

CREATE TABLE `PREFIX_carrier` (
  `id_carrier` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `id_reference` int(10) unsigned NOT NULL,
  `id_tax_rules_group` int(10) unsigned DEFAULT '0',
  `name` varchar(64) NOT NULL,
  `url` varchar(255) DEFAULT NULL,
  `active` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `deleted` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `shipping_handling` tinyint(1) unsigned NOT NULL DEFAULT '1',
  `range_behavior` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `is_module` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `is_free` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `shipping_external` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `need_range` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `external_module_name` varchar(64) DEFAULT NULL,
  `shipping_method` int(2) NOT NULL DEFAULT '0',
  `position` int(10) unsigned NOT NULL default '0',
  `max_width` int(10) DEFAULT 0,
  `max_height` int(10)  DEFAULT 0,
  `max_depth` int(10)  DEFAULT 0,
  `max_weight` int(10)  DEFAULT 0,
  `grade` int(10)  DEFAULT 0,
  PRIMARY KEY (`id_carrier`),
  KEY `deleted` (`deleted`,`active`),
  KEY `id_tax_rules_group` (`id_tax_rules_group`)
) ENGINE=ENGINE_TYPE  DEFAULT CHARSET=utf8

CREATE TABLE IF NOT EXISTS `PREFIX_specific_price_rule` (
	`id_specific_price_rule` int(10) unsigned NOT NULL AUTO_INCREMENT,
	`name` VARCHAR(255) NOT NULL,
	`id_shop` int(11) unsigned NOT NULL DEFAULT '1',
	`id_currency` int(10) unsigned NOT NULL,
	`id_country` int(10) unsigned NOT NULL,
	`id_group` int(10) unsigned NOT NULL,
	`from_quantity` mediumint(8) unsigned NOT NULL,
	`price` DECIMAL(20,6),
	`reduction` decimal(20,6) NOT NULL,
	`reduction_type` enum('amount','percentage') NOT NULL,
	`from` datetime NOT NULL,
	`to` datetime NOT NULL,
	PRIMARY KEY (`id_specific_price_rule`),
	KEY `id_product` (`id_shop`,`id_currency`,`id_country`,`id_group`,`from_quantity`,`from`,`to`)
) ENGINE=ENGINE_TYPE  DEFAULT CHARSET=utf8

UPDATE `PREFIX_configuration` SET value = '6' WHERE name = 'PS_SEARCH_WEIGHT_PNAME'

UPDATE `PREFIX_hook_module` SET position = 1
WHERE
	id_hook = (SELECT id_hook FROM `PREFIX_hook` WHERE name = 'displayPayment') AND id_module = (SELECT id_module FROM `PREFIX_module` WHERE name = 'cheque')
	OR
	id_hook = (SELECT id_hook FROM `PREFIX_hook` WHERE name = 'displayPaymentReturn') AND id_module = (SELECT id_module FROM `PREFIX_module` WHERE name = 'cheque')
	OR
	id_hook = (SELECT id_hook FROM `PREFIX_hook` WHERE name = 'displayHome') AND id_module = (SELECT id_module FROM `PREFIX_module` WHERE name = 'homeslider')
	OR
	id_hook = (SELECT id_hook FROM `PREFIX_hook` WHERE name = 'actionAuthentication') AND id_module = (SELECT id_module FROM `PREFIX_module` WHERE name = 'statsdata')
	OR
	id_hook = (SELECT id_hook FROM `PREFIX_hook` WHERE name = 'actionShopDataDuplication') AND id_module = (SELECT id_module FROM `PREFIX_module` WHERE name = 'homeslider')
	OR
	id_hook = (SELECT id_hook FROM `PREFIX_hook` WHERE name = 'displayTop') AND id_module = (SELECT id_module FROM `PREFIX_module` WHERE name = 'blocklanguages')
	OR
	id_hook = (SELECT id_hook FROM `PREFIX_hook` WHERE name = 'actionCustomerAccountAdd') AND id_module = (SELECT id_module FROM `PREFIX_module` WHERE name = 'statsdata')
	OR
	id_hook = (SELECT id_hook FROM `PREFIX_hook` WHERE name = 'displayCustomerAccount') AND id_module = (SELECT id_module FROM `PREFIX_module` WHERE name = 'favoriteproducts')
	OR
	id_hook = (SELECT id_hook FROM `PREFIX_hook` WHERE name = 'displayAdminStatsModules') AND id_module = (SELECT id_module FROM `PREFIX_module` WHERE name = 'statsvisits')
	OR
	id_hook = (SELECT id_hook FROM `PREFIX_hook` WHERE name = 'displayAdminStatsGraphEngine') AND id_module = (SELECT id_module FROM `PREFIX_module` WHERE name = 'graphvisifire')
	OR
	id_hook = (SELECT id_hook FROM `PREFIX_hook` WHERE name = 'displayAdminStatsGridEngine') AND id_module = (SELECT id_module FROM `PREFIX_module` WHERE name = 'gridhtml')
	OR
	id_hook = (SELECT id_hook FROM `PREFIX_hook` WHERE name = 'displayLeftColumnProduct') AND id_module = (SELECT id_module FROM `PREFIX_module` WHERE name = 'blocksharefb')
	OR
	id_hook = (SELECT id_hook FROM `PREFIX_hook` WHERE name = 'actionSearch') AND id_module = (SELECT id_module FROM `PREFIX_module` WHERE name = 'statssearch')
	OR
	id_hook = (SELECT id_hook FROM `PREFIX_hook` WHERE name = 'actionproperty_categoryAdd') AND id_module = (SELECT id_module FROM `PREFIX_module` WHERE name = 'blockcategories')
	OR
	id_hook = (SELECT id_hook FROM `PREFIX_hook` WHERE name = 'actionproperty_categoryUpdate') AND id_module = (SELECT id_module FROM `PREFIX_module` WHERE name = 'blockcategories')
	OR
	id_hook = (SELECT id_hook FROM `PREFIX_hook` WHERE name = 'actionproperty_categoryDelete') AND id_module = (SELECT id_module FROM `PREFIX_module` WHERE name = 'blockcategories')
	OR
	id_hook = (SELECT id_hook FROM `PREFIX_hook` WHERE name = 'actionAdminMetaSave') AND id_module = (SELECT id_module FROM `PREFIX_module` WHERE name = 'blockcategories')
	OR
	id_hook = (SELECT id_hook FROM `PREFIX_hook` WHERE name = 'displayMyAccountBlock') AND id_module = (SELECT id_module FROM `PREFIX_module` WHERE name = 'favoriteproducts')
	OR
	id_hook = (SELECT id_hook FROM `PREFIX_hook` WHERE name = 'displayFooter') AND id_module = (SELECT id_module FROM `PREFIX_module` WHERE name = 'blockreinsurance')

ALTER TABLE `PREFIX_employee` ADD `bo_color` varchar(32) default NULL AFTER `stats_date_to`

INSERT INTO `PREFIX_cms_property_category_lang` VALUES(1, 3, 'Inicio', '', 'home', NULL, NULL, NULL)

INSERT INTO `PREFIX_cms_property_category` VALUES(1, 0, 0, 1, NOW(), NOW(),0)

UPDATE `PREFIX_cms_property_category` SET `position` = 0

ALTER TABLE `PREFIX_customer` ADD `note` text AFTER `secure_key`

ALTER TABLE `PREFIX_contact` ADD `customer_service` tinyint(1) NOT NULL DEFAULT 0 AFTER `email`

INSERT INTO `PREFIX_specific_price` (`id_product`, `id_shop`, `id_currency`, `id_country`, `id_group`, `priority`, `price`, `from_quantity`, `reduction`, `reduction_type`, `from`, `to`)
	(	SELECT dq.`id_product`, 1, 1, 0, 1, 0, 0.00, dq.`quantity`, IF(dq.`id_discount_type` = 2, dq.`value`, dq.`value` / 100), IF (dq.`id_discount_type` = 2, 'amount', 'percentage'), '0000-00-00 00:00:00', '0000-00-00 00:00:00'
		FROM `PREFIX_discount_quantity` dq
		INNER JOIN `PREFIX_product` p ON (p.`id_product` = dq.`id_product`)
	)

DROP TABLE `PREFIX_discount_quantity`

INSERT INTO `PREFIX_specific_price` (`id_product`, `id_shop`, `id_currency`, `id_country`, `id_group`, `priority`, `price`, `from_quantity`, `reduction`, `reduction_type`, `from`, `to`) (
	SELECT
		p.`id_product`,
		1,
		0,
		0,
		0,
		0,
		0.00,
		1,
		IF(p.`reduction_price` > 0, p.`reduction_price`, p.`reduction_percent` / 100),
		IF(p.`reduction_price` > 0, 'amount', 'percentage'),
		IF (p.`reduction_from` = p.`reduction_to`, '0000-00-00 00:00:00', p.`reduction_from`),
		IF (p.`reduction_from` = p.`reduction_to`, '0000-00-00 00:00:00', p.`reduction_to`)
	FROM `PREFIX_product` p
	WHERE p.`reduction_price` OR p.`reduction_percent`
)

ALTER TABLE `PREFIX_product`
	DROP `reduction_price`,
	DROP `reduction_percent`,
	DROP `reduction_from`,
	DROP `reduction_to`

INSERT INTO `PREFIX_configuration` (`name`, `value`, `date_add`, `date_upd`) VALUES
('PS_SPECIFIC_PRICE_PRIORITIES', 'id_shop;id_currency;id_country;id_group', NOW(), NOW()),
('PS_TAX_DISPLAY', 0, NOW(), NOW()),
('PS_SMARTY_FORCE_COMPILE', 1, NOW(), NOW()),
('PS_DISTANCE_UNIT', 'km', NOW(), NOW()),
('PS_STORES_DISPLAY_CMS', 0, NOW(), NOW()),
('PS_STORES_DISPLAY_FOOTER', 0, NOW(), NOW()),
('PS_STORES_SIMPLIFIED', 0, NOW(), NOW()),
('PS_STATSDATA_CUSTOMER_PAGESVIEWS', 1, NOW(), NOW()),
('PS_STATSDATA_PAGESVIEWS', 1, NOW(), NOW()),
('PS_STATSDATA_PLUGINS', 1, NOW(), NOW())

INSERT INTO `PREFIX_configuration` (`name`, `value`, `date_add`, `date_upd`) VALUES ('PS_CONDITIONS_CMS_ID', IFNULL((SELECT `id_cms` FROM `PREFIX_cms` WHERE `id_cms` = 3), 0), NOW(), NOW())

CREATE TEMPORARY TABLE `PREFIX_configuration_tmp` (
	`value` text
)

SET @defaultOOS = (SELECT value FROM `PREFIX_configuration` WHERE name = 'PS_ORDER_OUT_OF_STOCK')

UPDATE `PREFIX_product` p SET `cache_default_attribute` =  0 WHERE `id_product` NOT IN (SELECT `id_product` FROM `PREFIX_product_attribute`)

INSERT INTO `PREFIX_hook` (`name`, `title`, `description`, `position`) VALUES ('processCarrier', 'Carrier Process', NULL, 0)

INSERT INTO `PREFIX_stock_mvt_reason_lang` (`id_stock_mvt_reason`, `id_lang`, `name`) VALUES
(1, 1, 'Order'),
(1, 2, 'Commande'),
(2, 1, 'Missing Stock Movement'),
(2, 2, 'Mouvement de stock manquant'),
(3, 1, 'Restocking'),
(3, 2, 'RÃ©assort')

INSERT INTO `PREFIX_meta_lang` (`id_lang`, `id_meta`, `title`, `url_rewrite`) VALUES
(1, (SELECT `id_meta` FROM `PREFIX_meta` WHERE `page` = 'authentication'), 'Authentication', 'authentication'),
(2, (SELECT `id_meta` FROM `PREFIX_meta` WHERE `page` = 'authentication'), 'Authentification', 'authentification'),
(3, (SELECT `id_meta` FROM `PREFIX_meta` WHERE `page` = 'authentication'), 'AutenticaciÃ³n', 'autenticacion')

LOCK TABLES `admin_assert` WRITE

UNLOCK TABLES

DROP TABLE IF EXISTS `admin_role`

SELECT * FROM
-- This is another comment
MyTable # One final comment
/* This is a block comment 
*/ WHERE 1 = 2;

SELECT -- This is a test

SELECT Test FROM Test WHERE
(
 MyColumn = 1 )) AND ((( SomeOtherColumn = 2);

SELECT * LIMIT 1; SELECT a,b,c,d FROM e LIMIT 1, 2; SELECT 1,2,3 WHERE a in (1,2,3,4,5) and b=5;

SELECT count - 50
WHERE a-50 = b
WHERE 1 and - 50
WHERE -50 = a
WHERE a = -50
WHERE 1 /*test*/ - 50
WHERE 1 and -50;

SELECT @ and b;

SELECT @"weird variable name";

SELECT "no closing quote
