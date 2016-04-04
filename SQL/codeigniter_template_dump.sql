CREATE DATABASE  IF NOT EXISTS `codeigniter_template` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `codeigniter_template`;
-- MySQL dump 10.13  Distrib 5.6.17, for Win32 (x86)
--
-- Host: localhost    Database: codeigniter_template
-- ------------------------------------------------------
-- Server version	5.6.19

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `ospos_app_config`
--

DROP TABLE IF EXISTS `ospos_app_config`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ospos_app_config` (
  `key` varchar(255) NOT NULL,
  `value` varchar(255) NOT NULL,
  PRIMARY KEY (`key`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ospos_app_config`
--

LOCK TABLES `ospos_app_config` WRITE;
/*!40000 ALTER TABLE `ospos_app_config` DISABLE KEYS */;
INSERT INTO `ospos_app_config` VALUES ('address','15/108 Indiranagar'),('company','Point of Sale'),('currency_side','0'),('currency_symbol','Rs '),('custom10_name',''),('custom1_name','Weight'),('custom2_name',''),('custom3_name',''),('custom4_name',''),('custom5_name',''),('custom6_name',''),('custom7_name',''),('custom8_name',''),('custom9_name',''),('default_tax_1_name','Sales Tax'),('default_tax_1_rate',''),('default_tax_2_name','Sales Tax 2'),('default_tax_2_rate',''),('default_tax_rate','8'),('email',''),('fax',''),('language','en'),('phone','555-555-5555'),('print_after_sale','print_after_sale'),('recv_invoice_format','$CO'),('return_policy','Test'),('sales_invoice_format','$CO'),('tax_included','tax_included'),('timezone','Asia/Kolkata'),('website','');
/*!40000 ALTER TABLE `ospos_app_config` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ospos_customers`
--

DROP TABLE IF EXISTS `ospos_customers`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ospos_customers` (
  `person_id` int(10) NOT NULL,
  `account_number` varchar(255) DEFAULT NULL,
  `taxable` int(1) NOT NULL DEFAULT '1',
  `deleted` int(1) NOT NULL DEFAULT '0',
  UNIQUE KEY `account_number` (`account_number`),
  KEY `person_id` (`person_id`),
  CONSTRAINT `ospos_customers_ibfk_1` FOREIGN KEY (`person_id`) REFERENCES `ospos_people` (`person_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ospos_customers`
--

LOCK TABLES `ospos_customers` WRITE;
/*!40000 ALTER TABLE `ospos_customers` DISABLE KEYS */;
INSERT INTO `ospos_customers` VALUES (3,NULL,1,1),(4,NULL,1,0),(5,NULL,1,1),(6,NULL,1,1),(7,NULL,1,1),(8,NULL,1,1),(9,NULL,1,1),(10,NULL,1,0),(11,NULL,0,1),(12,NULL,0,1),(13,NULL,0,1),(14,NULL,1,1),(15,NULL,1,1),(16,NULL,1,1),(17,NULL,1,1),(18,NULL,1,1),(19,NULL,1,1),(20,NULL,1,1),(21,NULL,1,0),(22,NULL,1,1),(23,NULL,1,1),(24,NULL,1,1),(25,NULL,1,0),(26,NULL,1,0),(27,NULL,1,0);
/*!40000 ALTER TABLE `ospos_customers` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ospos_employees`
--

DROP TABLE IF EXISTS `ospos_employees`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ospos_employees` (
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `person_id` int(10) NOT NULL,
  `deleted` int(1) NOT NULL DEFAULT '0',
  UNIQUE KEY `username` (`username`),
  KEY `person_id` (`person_id`),
  CONSTRAINT `ospos_employees_ibfk_1` FOREIGN KEY (`person_id`) REFERENCES `ospos_people` (`person_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ospos_employees`
--

LOCK TABLES `ospos_employees` WRITE;
/*!40000 ALTER TABLE `ospos_employees` DISABLE KEYS */;
INSERT INTO `ospos_employees` VALUES ('admin','1a1dc91c907325c69271ddf0c944bc72',1,0),('prashant','648605c11bdb955e16e7febc8db54103',2,0);
/*!40000 ALTER TABLE `ospos_employees` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ospos_giftcards`
--

DROP TABLE IF EXISTS `ospos_giftcards`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ospos_giftcards` (
  `record_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `giftcard_id` int(11) NOT NULL AUTO_INCREMENT,
  `giftcard_number` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `value` decimal(15,2) NOT NULL,
  `deleted` int(1) NOT NULL DEFAULT '0',
  `person_id` int(11) NOT NULL,
  PRIMARY KEY (`giftcard_id`),
  UNIQUE KEY `giftcard_number` (`giftcard_number`),
  KEY `ospos_giftcards_ibfk_1` (`person_id`),
  CONSTRAINT `ospos_giftcards_ibfk_1` FOREIGN KEY (`person_id`) REFERENCES `ospos_people` (`person_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ospos_giftcards`
--

LOCK TABLES `ospos_giftcards` WRITE;
/*!40000 ALTER TABLE `ospos_giftcards` DISABLE KEYS */;
/*!40000 ALTER TABLE `ospos_giftcards` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ospos_grants`
--

DROP TABLE IF EXISTS `ospos_grants`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ospos_grants` (
  `permission_id` varchar(255) NOT NULL,
  `person_id` int(10) NOT NULL,
  PRIMARY KEY (`permission_id`,`person_id`),
  KEY `ospos_grants_ibfk_2` (`person_id`),
  CONSTRAINT `ospos_grants_ibfk_1` FOREIGN KEY (`permission_id`) REFERENCES `ospos_permissions` (`permission_id`),
  CONSTRAINT `ospos_grants_ibfk_2` FOREIGN KEY (`person_id`) REFERENCES `ospos_employees` (`person_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ospos_grants`
--

LOCK TABLES `ospos_grants` WRITE;
/*!40000 ALTER TABLE `ospos_grants` DISABLE KEYS */;
INSERT INTO `ospos_grants` VALUES ('config',1),('customers',1),('employees',1),('giftcards',1),('items',1),('items_stock',1),('item_kits',1),('receivings',1),('reports',1),('reports_categories',1),('reports_customers',1),('reports_discounts',1),('reports_employees',1),('reports_inventory',1),('reports_items',1),('reports_payments',1),('reports_receivings',1),('reports_sales',1),('reports_suppliers',1),('reports_taxes',1),('sales',1),('suppliers',1),('items',2),('items_stock',2),('reports',2),('reports_items',2),('reports_sales',2),('sales',2);
/*!40000 ALTER TABLE `ospos_grants` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ospos_inventory`
--

DROP TABLE IF EXISTS `ospos_inventory`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ospos_inventory` (
  `trans_id` int(11) NOT NULL AUTO_INCREMENT,
  `trans_items` int(11) NOT NULL DEFAULT '0',
  `trans_user` int(11) NOT NULL DEFAULT '0',
  `trans_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `trans_comment` text NOT NULL,
  `trans_location` int(11) NOT NULL,
  `trans_inventory` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`trans_id`),
  KEY `trans_items` (`trans_items`),
  KEY `trans_user` (`trans_user`),
  KEY `trans_location` (`trans_location`),
  CONSTRAINT `ospos_inventory_ibfk_1` FOREIGN KEY (`trans_items`) REFERENCES `ospos_items` (`item_id`),
  CONSTRAINT `ospos_inventory_ibfk_2` FOREIGN KEY (`trans_user`) REFERENCES `ospos_employees` (`person_id`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ospos_inventory`
--

LOCK TABLES `ospos_inventory` WRITE;
/*!40000 ALTER TABLE `ospos_inventory` DISABLE KEYS */;
INSERT INTO `ospos_inventory` VALUES (1,1,1,'2015-05-28 20:40:27','Manual Edit of Quantity',1,50),(2,4,1,'2015-05-28 20:41:53','Manual Edit of Quantity',1,50),(3,4,1,'2015-05-29 06:16:13','POS 1',1,-1),(4,4,1,'2015-05-29 07:11:31','POS 2',1,-1),(5,5,1,'2015-06-01 01:51:28','Manual Edit of Quantity',1,10),(6,4,1,'2015-06-01 01:52:49','POS 3',1,-1),(7,5,1,'2015-06-01 01:52:49','POS 3',1,-1),(8,4,1,'2015-06-01 04:52:09','RECV 1',1,1),(9,5,1,'2015-06-01 04:53:15','RECV 2',1,11),(10,4,1,'2015-06-01 04:53:59','',1,2),(11,6,1,'2015-06-01 06:33:30','Manual Edit of Quantity',1,10),(12,6,1,'2015-06-01 06:35:20','',1,20),(13,6,1,'2015-06-01 06:35:29','',1,-10),(14,4,2,'2015-06-01 07:27:12','POS 4',1,-1),(15,5,2,'2015-06-01 07:27:12','POS 4',1,-1),(16,6,2,'2015-06-01 07:27:12','POS 4',1,-1),(17,8,1,'2015-06-12 01:38:39','Manual Edit of Quantity',1,10);
/*!40000 ALTER TABLE `ospos_inventory` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ospos_item_kit_items`
--

DROP TABLE IF EXISTS `ospos_item_kit_items`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ospos_item_kit_items` (
  `item_kit_id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL,
  `quantity` decimal(15,2) NOT NULL,
  PRIMARY KEY (`item_kit_id`,`item_id`,`quantity`),
  KEY `ospos_item_kit_items_ibfk_2` (`item_id`),
  CONSTRAINT `ospos_item_kit_items_ibfk_1` FOREIGN KEY (`item_kit_id`) REFERENCES `ospos_item_kits` (`item_kit_id`) ON DELETE CASCADE,
  CONSTRAINT `ospos_item_kit_items_ibfk_2` FOREIGN KEY (`item_id`) REFERENCES `ospos_items` (`item_id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ospos_item_kit_items`
--

LOCK TABLES `ospos_item_kit_items` WRITE;
/*!40000 ALTER TABLE `ospos_item_kit_items` DISABLE KEYS */;
/*!40000 ALTER TABLE `ospos_item_kit_items` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ospos_item_kits`
--

DROP TABLE IF EXISTS `ospos_item_kits`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ospos_item_kits` (
  `item_kit_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  PRIMARY KEY (`item_kit_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ospos_item_kits`
--

LOCK TABLES `ospos_item_kits` WRITE;
/*!40000 ALTER TABLE `ospos_item_kits` DISABLE KEYS */;
/*!40000 ALTER TABLE `ospos_item_kits` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ospos_item_quantities`
--

DROP TABLE IF EXISTS `ospos_item_quantities`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ospos_item_quantities` (
  `item_id` int(11) NOT NULL,
  `location_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`item_id`,`location_id`),
  KEY `item_id` (`item_id`),
  KEY `location_id` (`location_id`),
  CONSTRAINT `ospos_item_quantities_ibfk_1` FOREIGN KEY (`item_id`) REFERENCES `ospos_items` (`item_id`),
  CONSTRAINT `ospos_item_quantities_ibfk_2` FOREIGN KEY (`location_id`) REFERENCES `ospos_stock_locations` (`location_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ospos_item_quantities`
--

LOCK TABLES `ospos_item_quantities` WRITE;
/*!40000 ALTER TABLE `ospos_item_quantities` DISABLE KEYS */;
INSERT INTO `ospos_item_quantities` VALUES (1,1,50),(4,1,49),(5,1,19),(6,1,19),(8,1,10);
/*!40000 ALTER TABLE `ospos_item_quantities` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ospos_items`
--

DROP TABLE IF EXISTS `ospos_items`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ospos_items` (
  `item_id` int(10) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `category` varchar(255) NOT NULL,
  `supplier_id` int(11) DEFAULT NULL,
  `item_number` varchar(255) DEFAULT NULL,
  `description` varchar(255) NOT NULL,
  `cost_price` decimal(15,2) NOT NULL,
  `unit_price` decimal(15,2) NOT NULL,
  `reorder_level` decimal(15,2) NOT NULL DEFAULT '0.00',
  `receiving_quantity` int(11) NOT NULL DEFAULT '1',
  `allow_alt_description` tinyint(1) NOT NULL,
  `is_serialized` tinyint(1) NOT NULL,
  `deleted` int(1) NOT NULL DEFAULT '0',
  `custom1` varchar(25) NOT NULL,
  `custom2` varchar(25) NOT NULL,
  `custom3` varchar(25) NOT NULL,
  `custom4` varchar(25) NOT NULL,
  `custom5` varchar(25) NOT NULL,
  `custom6` varchar(25) NOT NULL,
  `custom7` varchar(25) NOT NULL,
  `custom8` varchar(25) NOT NULL,
  `custom9` varchar(25) NOT NULL,
  `custom10` varchar(25) NOT NULL,
  PRIMARY KEY (`item_id`),
  UNIQUE KEY `item_number` (`item_number`),
  KEY `ospos_items_ibfk_1` (`supplier_id`),
  CONSTRAINT `ospos_items_ibfk_1` FOREIGN KEY (`supplier_id`) REFERENCES `ospos_suppliers` (`person_id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ospos_items`
--

LOCK TABLES `ospos_items` WRITE;
/*!40000 ALTER TABLE `ospos_items` DISABLE KEYS */;
INSERT INTO `ospos_items` VALUES (1,'Asus Zenphone','Mobiles',NULL,'ITE201234','',11999.00,12999.00,10.00,50,0,0,1,'0','0','0','0','0','0','0','0','0','0'),(4,'Asus Zenphone','Mobiles',NULL,'ITE2012345','',11999.00,12999.00,10.00,0,0,0,0,'0','0','0','0','0','0','0','0','0','0'),(5,'Samsung Grand','Mobiles',NULL,'ITE2012346','',7999.00,9999.00,1.00,0,0,0,0,'0','0','0','0','0','0','0','0','0','0'),(6,'Sony Xperia','Mobiles',NULL,NULL,'',19999.00,21999.00,1.00,0,0,0,0,'0','0','0','0','0','0','0','0','0','0'),(7,'Sony Xperia','Mobiles',NULL,NULL,'',19999.00,21999.00,1.00,20,0,0,0,'0','0','0','0','0','0','0','0','0','0'),(8,'Ring','Ring',NULL,NULL,'',17000.00,19000.00,1.00,0,0,0,0,'50 Gram','0','0','0','0','0','0','0','0','0');
/*!40000 ALTER TABLE `ospos_items` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ospos_items_taxes`
--

DROP TABLE IF EXISTS `ospos_items_taxes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ospos_items_taxes` (
  `item_id` int(10) NOT NULL,
  `name` varchar(255) NOT NULL,
  `percent` decimal(15,2) NOT NULL,
  PRIMARY KEY (`item_id`,`name`,`percent`),
  CONSTRAINT `ospos_items_taxes_ibfk_1` FOREIGN KEY (`item_id`) REFERENCES `ospos_items` (`item_id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ospos_items_taxes`
--

LOCK TABLES `ospos_items_taxes` WRITE;
/*!40000 ALTER TABLE `ospos_items_taxes` DISABLE KEYS */;
INSERT INTO `ospos_items_taxes` VALUES (4,'Sales Tax',14.00),(5,'Sales Tax',14.00),(6,'Sales Tax',14.00),(7,'Sales Tax',14.00);
/*!40000 ALTER TABLE `ospos_items_taxes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ospos_modules`
--

DROP TABLE IF EXISTS `ospos_modules`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ospos_modules` (
  `name_lang_key` varchar(255) NOT NULL,
  `desc_lang_key` varchar(255) NOT NULL,
  `sort` int(10) NOT NULL,
  `module_id` varchar(255) NOT NULL,
  PRIMARY KEY (`module_id`),
  UNIQUE KEY `desc_lang_key` (`desc_lang_key`),
  UNIQUE KEY `name_lang_key` (`name_lang_key`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ospos_modules`
--

LOCK TABLES `ospos_modules` WRITE;
/*!40000 ALTER TABLE `ospos_modules` DISABLE KEYS */;
INSERT INTO `ospos_modules` VALUES ('module_config','module_config_desc',100,'config'),('module_customers','module_customers_desc',10,'customers'),('module_employees','module_employees_desc',80,'employees'),('module_giftcards','module_giftcards_desc',90,'giftcards'),('module_items','module_items_desc',20,'items'),('module_item_kits','module_item_kits_desc',30,'item_kits'),('module_receivings','module_receivings_desc',60,'receivings'),('module_reports','module_reports_desc',50,'reports'),('module_sales','module_sales_desc',70,'sales'),('module_suppliers','module_suppliers_desc',40,'suppliers');
/*!40000 ALTER TABLE `ospos_modules` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ospos_people`
--

DROP TABLE IF EXISTS `ospos_people`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ospos_people` (
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `phone_number` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `address_1` varchar(255) NOT NULL,
  `address_2` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `state` varchar(255) NOT NULL,
  `zip` varchar(255) NOT NULL,
  `country` varchar(255) NOT NULL,
  `comments` text NOT NULL,
  `person_id` int(10) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`person_id`)
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ospos_people`
--

LOCK TABLES `ospos_people` WRITE;
/*!40000 ALTER TABLE `ospos_people` DISABLE KEYS */;
INSERT INTO `ospos_people` VALUES ('System','Administrator','555-555-5555','admin@openpos.familyshop.co.in','Address 1','','','','','','',1),('Prashant','Singh','','','','','','','','','',2),('Amit','Pandey','','','','','','','','','',3),('Prashant','Singh','9839358811','prashant@gmail.com','','','','','','','',4),('','','','','','','','','','','',5),('Gaurav','Bajpai','','gaurav.jconnect.in','','','','','','','                             ',6),('Mukesh','Kumar','','','','','','','','','                             ',7),('Rohit','Kumar','','rohit@jconnect.in','','','','','','','                             ',8),('','','','','','','','','','','                             ',9),('Brajesh','Singh','','brajesh@jconnect.in','','','','','','','                             ',10),('Gaurav','Bajpai','','gaurav.jconnect.in','','','','','','','                                                          ',11),('Gaurav','Bajpai','','gaurav.jconnect.in','','','','','','','                                                          ',12),('Gaurav','Bajpai','','gaurav.jconnect.in','','','','','','','                                                          ',13),('Gaurav','Bajpai','','gaurav.jconnect.in','','','','','','','                                                          ',14),('','','','','','','','','','','                             ',15),('Pawan','Kumar','','','','','','','','','                             ',16),('Amit','Pandey','','amit@jconnect.in','','','','','','','                             ',17),('shweta','Pandey','','','','','','','','','                             ',18),('Gaurav','Bajpai','','','','','','','','','                             ',19),('Rohit','Tiwari','','','','','','','','','                             ',20),('Mukesh','Kumar','','mukesh@jconnect.in','','','','','','','                             ',21),('Gaurav','Bajpai','','','','','','','','','                                                          ',22),('Gaurav','Bajpai','','','','','','','','','                                                          ',23),('Swati','Pandey','','','','','','','','','                             ',24),('Gaurav','Bajpai','','gaurav@jconnect.in','','','','','','','                                                                                       ',25),('Swati','Pandey','','swati@jconnect.in','','','','','','','                                                          ',26),('Rohit','Tiwari','2345456456565','rohit@jconnect.in','','','','','','','                                                                                       ',27);
/*!40000 ALTER TABLE `ospos_people` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ospos_permissions`
--

DROP TABLE IF EXISTS `ospos_permissions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ospos_permissions` (
  `permission_id` varchar(255) NOT NULL,
  `module_id` varchar(255) NOT NULL,
  `location_id` int(10) DEFAULT NULL,
  PRIMARY KEY (`permission_id`),
  KEY `module_id` (`module_id`),
  KEY `ospos_permissions_ibfk_2` (`location_id`),
  CONSTRAINT `ospos_permissions_ibfk_1` FOREIGN KEY (`module_id`) REFERENCES `ospos_modules` (`module_id`) ON DELETE CASCADE,
  CONSTRAINT `ospos_permissions_ibfk_2` FOREIGN KEY (`location_id`) REFERENCES `ospos_stock_locations` (`location_id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ospos_permissions`
--

LOCK TABLES `ospos_permissions` WRITE;
/*!40000 ALTER TABLE `ospos_permissions` DISABLE KEYS */;
INSERT INTO `ospos_permissions` VALUES ('config','config',NULL),('customers','customers',NULL),('employees','employees',NULL),('giftcards','giftcards',NULL),('items','items',NULL),('items_stock','items',1),('item_kits','item_kits',NULL),('receivings','receivings',NULL),('reports','reports',NULL),('reports_categories','reports',NULL),('reports_customers','reports',NULL),('reports_discounts','reports',NULL),('reports_employees','reports',NULL),('reports_inventory','reports',NULL),('reports_items','reports',NULL),('reports_payments','reports',NULL),('reports_receivings','reports',NULL),('reports_sales','reports',NULL),('reports_suppliers','reports',NULL),('reports_taxes','reports',NULL),('sales','sales',NULL),('suppliers','suppliers',NULL);
/*!40000 ALTER TABLE `ospos_permissions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ospos_receivings`
--

DROP TABLE IF EXISTS `ospos_receivings`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ospos_receivings` (
  `receiving_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `supplier_id` int(10) DEFAULT NULL,
  `employee_id` int(10) NOT NULL DEFAULT '0',
  `comment` text NOT NULL,
  `receiving_id` int(10) NOT NULL AUTO_INCREMENT,
  `payment_type` varchar(20) DEFAULT NULL,
  `invoice_number` varchar(32) DEFAULT NULL,
  PRIMARY KEY (`receiving_id`),
  UNIQUE KEY `invoice_number` (`invoice_number`),
  KEY `supplier_id` (`supplier_id`),
  KEY `employee_id` (`employee_id`),
  CONSTRAINT `ospos_receivings_ibfk_1` FOREIGN KEY (`employee_id`) REFERENCES `ospos_employees` (`person_id`),
  CONSTRAINT `ospos_receivings_ibfk_2` FOREIGN KEY (`supplier_id`) REFERENCES `ospos_suppliers` (`person_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ospos_receivings`
--

LOCK TABLES `ospos_receivings` WRITE;
/*!40000 ALTER TABLE `ospos_receivings` DISABLE KEYS */;
INSERT INTO `ospos_receivings` VALUES ('2015-06-01 04:52:09',NULL,1,'',1,'Cash','0'),('2015-06-01 04:53:15',NULL,1,'',2,'Cash','1');
/*!40000 ALTER TABLE `ospos_receivings` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ospos_receivings_items`
--

DROP TABLE IF EXISTS `ospos_receivings_items`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ospos_receivings_items` (
  `receiving_id` int(10) NOT NULL DEFAULT '0',
  `item_id` int(10) NOT NULL DEFAULT '0',
  `description` varchar(30) DEFAULT NULL,
  `serialnumber` varchar(30) DEFAULT NULL,
  `line` int(3) NOT NULL,
  `quantity_purchased` decimal(15,2) NOT NULL DEFAULT '0.00',
  `item_cost_price` decimal(15,2) NOT NULL,
  `item_unit_price` decimal(15,2) NOT NULL,
  `discount_percent` decimal(15,2) NOT NULL DEFAULT '0.00',
  `item_location` int(11) NOT NULL,
  PRIMARY KEY (`receiving_id`,`item_id`,`line`),
  KEY `item_id` (`item_id`),
  CONSTRAINT `ospos_receivings_items_ibfk_1` FOREIGN KEY (`item_id`) REFERENCES `ospos_items` (`item_id`),
  CONSTRAINT `ospos_receivings_items_ibfk_2` FOREIGN KEY (`receiving_id`) REFERENCES `ospos_receivings` (`receiving_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ospos_receivings_items`
--

LOCK TABLES `ospos_receivings_items` WRITE;
/*!40000 ALTER TABLE `ospos_receivings_items` DISABLE KEYS */;
INSERT INTO `ospos_receivings_items` VALUES (1,4,'','',1,1.00,11999.00,11999.00,0.00,1),(2,5,'','0',1,11.00,7999.00,7999.00,0.00,1);
/*!40000 ALTER TABLE `ospos_receivings_items` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ospos_sales`
--

DROP TABLE IF EXISTS `ospos_sales`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ospos_sales` (
  `sale_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `customer_id` int(10) DEFAULT NULL,
  `employee_id` int(10) NOT NULL DEFAULT '0',
  `comment` text NOT NULL,
  `invoice_number` varchar(32) DEFAULT NULL,
  `sale_id` int(10) NOT NULL AUTO_INCREMENT,
  `payment_type` varchar(512) DEFAULT NULL,
  PRIMARY KEY (`sale_id`),
  UNIQUE KEY `invoice_number` (`invoice_number`),
  KEY `customer_id` (`customer_id`),
  KEY `employee_id` (`employee_id`),
  CONSTRAINT `ospos_sales_ibfk_1` FOREIGN KEY (`employee_id`) REFERENCES `ospos_employees` (`person_id`),
  CONSTRAINT `ospos_sales_ibfk_2` FOREIGN KEY (`customer_id`) REFERENCES `ospos_customers` (`person_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ospos_sales`
--

LOCK TABLES `ospos_sales` WRITE;
/*!40000 ALTER TABLE `ospos_sales` DISABLE KEYS */;
INSERT INTO `ospos_sales` VALUES ('2015-05-28 13:00:00',NULL,1,'Test payment','IN01',1,'Cash: Rs 12999.00<br />'),('2015-05-29 07:11:31',NULL,1,'test print','1',2,'Cash: Rs 12999.00<br />'),('2015-06-01 01:52:49',NULL,1,'0','2',3,'Cash: Rs22998.00<br />'),('2015-06-01 07:27:12',NULL,2,'0','3',4,'Cash: Rs 44997.00<br />');
/*!40000 ALTER TABLE `ospos_sales` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ospos_sales_items`
--

DROP TABLE IF EXISTS `ospos_sales_items`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ospos_sales_items` (
  `sale_id` int(10) NOT NULL DEFAULT '0',
  `item_id` int(10) NOT NULL DEFAULT '0',
  `description` varchar(30) DEFAULT NULL,
  `serialnumber` varchar(30) DEFAULT NULL,
  `line` int(3) NOT NULL DEFAULT '0',
  `quantity_purchased` decimal(15,2) NOT NULL DEFAULT '0.00',
  `item_cost_price` decimal(15,2) NOT NULL,
  `item_unit_price` decimal(15,2) NOT NULL,
  `discount_percent` decimal(15,2) NOT NULL DEFAULT '0.00',
  `item_location` int(11) NOT NULL,
  PRIMARY KEY (`sale_id`,`item_id`,`line`),
  KEY `sale_id` (`sale_id`),
  KEY `item_id` (`item_id`),
  KEY `item_location` (`item_location`),
  CONSTRAINT `ospos_sales_items_ibfk_1` FOREIGN KEY (`item_id`) REFERENCES `ospos_items` (`item_id`),
  CONSTRAINT `ospos_sales_items_ibfk_2` FOREIGN KEY (`sale_id`) REFERENCES `ospos_sales` (`sale_id`),
  CONSTRAINT `ospos_sales_items_ibfk_3` FOREIGN KEY (`item_location`) REFERENCES `ospos_stock_locations` (`location_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ospos_sales_items`
--

LOCK TABLES `ospos_sales_items` WRITE;
/*!40000 ALTER TABLE `ospos_sales_items` DISABLE KEYS */;
INSERT INTO `ospos_sales_items` VALUES (1,4,'','',1,1.00,11999.00,12999.00,0.00,1),(2,4,'','',1,1.00,11999.00,12999.00,0.00,1),(3,4,'','',1,1.00,11999.00,12999.00,0.00,1),(3,5,'','',2,1.00,7999.00,9999.00,0.00,1),(4,4,'','',1,1.00,11999.00,12999.00,0.00,1),(4,5,'','',2,1.00,7999.00,9999.00,0.00,1),(4,6,'','',3,1.00,19999.00,21999.00,0.00,1);
/*!40000 ALTER TABLE `ospos_sales_items` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ospos_sales_items_taxes`
--

DROP TABLE IF EXISTS `ospos_sales_items_taxes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ospos_sales_items_taxes` (
  `sale_id` int(10) NOT NULL,
  `item_id` int(10) NOT NULL,
  `line` int(3) NOT NULL DEFAULT '0',
  `name` varchar(255) NOT NULL,
  `percent` decimal(15,2) NOT NULL,
  PRIMARY KEY (`sale_id`,`item_id`,`line`,`name`,`percent`),
  KEY `sale_id` (`sale_id`),
  KEY `item_id` (`item_id`),
  CONSTRAINT `ospos_sales_items_taxes_ibfk_1` FOREIGN KEY (`sale_id`) REFERENCES `ospos_sales_items` (`sale_id`),
  CONSTRAINT `ospos_sales_items_taxes_ibfk_2` FOREIGN KEY (`item_id`) REFERENCES `ospos_items` (`item_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ospos_sales_items_taxes`
--

LOCK TABLES `ospos_sales_items_taxes` WRITE;
/*!40000 ALTER TABLE `ospos_sales_items_taxes` DISABLE KEYS */;
INSERT INTO `ospos_sales_items_taxes` VALUES (3,5,2,'Sales Tax',14.00),(4,4,1,'Sales Tax',14.00),(4,5,2,'Sales Tax',14.00),(4,6,3,'Sales Tax',14.00);
/*!40000 ALTER TABLE `ospos_sales_items_taxes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ospos_sales_payments`
--

DROP TABLE IF EXISTS `ospos_sales_payments`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ospos_sales_payments` (
  `sale_id` int(10) NOT NULL,
  `payment_type` varchar(40) NOT NULL,
  `payment_amount` decimal(15,2) NOT NULL,
  PRIMARY KEY (`sale_id`,`payment_type`),
  KEY `sale_id` (`sale_id`),
  CONSTRAINT `ospos_sales_payments_ibfk_1` FOREIGN KEY (`sale_id`) REFERENCES `ospos_sales` (`sale_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ospos_sales_payments`
--

LOCK TABLES `ospos_sales_payments` WRITE;
/*!40000 ALTER TABLE `ospos_sales_payments` DISABLE KEYS */;
INSERT INTO `ospos_sales_payments` VALUES (1,'Cash',12999.00),(2,'Cash',12999.00),(3,'Cash',22998.00),(4,'Cash',44997.00);
/*!40000 ALTER TABLE `ospos_sales_payments` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ospos_sales_suspended`
--

DROP TABLE IF EXISTS `ospos_sales_suspended`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ospos_sales_suspended` (
  `sale_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `customer_id` int(10) DEFAULT NULL,
  `employee_id` int(10) NOT NULL DEFAULT '0',
  `comment` text NOT NULL,
  `invoice_number` varchar(32) DEFAULT NULL,
  `sale_id` int(10) NOT NULL AUTO_INCREMENT,
  `payment_type` varchar(512) DEFAULT NULL,
  PRIMARY KEY (`sale_id`),
  UNIQUE KEY `invoice_number` (`invoice_number`),
  KEY `customer_id` (`customer_id`),
  KEY `employee_id` (`employee_id`),
  CONSTRAINT `ospos_sales_suspended_ibfk_1` FOREIGN KEY (`employee_id`) REFERENCES `ospos_employees` (`person_id`),
  CONSTRAINT `ospos_sales_suspended_ibfk_2` FOREIGN KEY (`customer_id`) REFERENCES `ospos_customers` (`person_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ospos_sales_suspended`
--

LOCK TABLES `ospos_sales_suspended` WRITE;
/*!40000 ALTER TABLE `ospos_sales_suspended` DISABLE KEYS */;
/*!40000 ALTER TABLE `ospos_sales_suspended` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ospos_sales_suspended_items`
--

DROP TABLE IF EXISTS `ospos_sales_suspended_items`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ospos_sales_suspended_items` (
  `sale_id` int(10) NOT NULL DEFAULT '0',
  `item_id` int(10) NOT NULL DEFAULT '0',
  `description` varchar(30) DEFAULT NULL,
  `serialnumber` varchar(30) DEFAULT NULL,
  `line` int(3) NOT NULL DEFAULT '0',
  `quantity_purchased` decimal(15,2) NOT NULL DEFAULT '0.00',
  `item_cost_price` decimal(15,2) NOT NULL,
  `item_unit_price` decimal(15,2) NOT NULL,
  `discount_percent` decimal(15,2) NOT NULL DEFAULT '0.00',
  `item_location` int(11) NOT NULL,
  PRIMARY KEY (`sale_id`,`item_id`,`line`),
  KEY `sale_id` (`sale_id`),
  KEY `item_id` (`item_id`),
  KEY `ospos_sales_suspended_items_ibfk_3` (`item_location`),
  CONSTRAINT `ospos_sales_suspended_items_ibfk_1` FOREIGN KEY (`item_id`) REFERENCES `ospos_items` (`item_id`),
  CONSTRAINT `ospos_sales_suspended_items_ibfk_2` FOREIGN KEY (`sale_id`) REFERENCES `ospos_sales_suspended` (`sale_id`),
  CONSTRAINT `ospos_sales_suspended_items_ibfk_3` FOREIGN KEY (`item_location`) REFERENCES `ospos_stock_locations` (`location_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ospos_sales_suspended_items`
--

LOCK TABLES `ospos_sales_suspended_items` WRITE;
/*!40000 ALTER TABLE `ospos_sales_suspended_items` DISABLE KEYS */;
/*!40000 ALTER TABLE `ospos_sales_suspended_items` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ospos_sales_suspended_items_taxes`
--

DROP TABLE IF EXISTS `ospos_sales_suspended_items_taxes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ospos_sales_suspended_items_taxes` (
  `sale_id` int(10) NOT NULL,
  `item_id` int(10) NOT NULL,
  `line` int(3) NOT NULL DEFAULT '0',
  `name` varchar(255) NOT NULL,
  `percent` decimal(15,2) NOT NULL,
  PRIMARY KEY (`sale_id`,`item_id`,`line`,`name`,`percent`),
  KEY `item_id` (`item_id`),
  CONSTRAINT `ospos_sales_suspended_items_taxes_ibfk_1` FOREIGN KEY (`sale_id`) REFERENCES `ospos_sales_suspended_items` (`sale_id`),
  CONSTRAINT `ospos_sales_suspended_items_taxes_ibfk_2` FOREIGN KEY (`item_id`) REFERENCES `ospos_items` (`item_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ospos_sales_suspended_items_taxes`
--

LOCK TABLES `ospos_sales_suspended_items_taxes` WRITE;
/*!40000 ALTER TABLE `ospos_sales_suspended_items_taxes` DISABLE KEYS */;
/*!40000 ALTER TABLE `ospos_sales_suspended_items_taxes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ospos_sales_suspended_payments`
--

DROP TABLE IF EXISTS `ospos_sales_suspended_payments`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ospos_sales_suspended_payments` (
  `sale_id` int(10) NOT NULL,
  `payment_type` varchar(40) NOT NULL,
  `payment_amount` decimal(15,2) NOT NULL,
  PRIMARY KEY (`sale_id`,`payment_type`),
  CONSTRAINT `ospos_sales_suspended_payments_ibfk_1` FOREIGN KEY (`sale_id`) REFERENCES `ospos_sales_suspended` (`sale_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ospos_sales_suspended_payments`
--

LOCK TABLES `ospos_sales_suspended_payments` WRITE;
/*!40000 ALTER TABLE `ospos_sales_suspended_payments` DISABLE KEYS */;
/*!40000 ALTER TABLE `ospos_sales_suspended_payments` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ospos_sessions`
--

DROP TABLE IF EXISTS `ospos_sessions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ospos_sessions` (
  `session_id` varchar(40) NOT NULL DEFAULT '0',
  `ip_address` varchar(45) NOT NULL DEFAULT '0',
  `user_agent` varchar(120) NOT NULL,
  `last_activity` int(10) unsigned NOT NULL DEFAULT '0',
  `user_data` text,
  PRIMARY KEY (`session_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ospos_sessions`
--

LOCK TABLES `ospos_sessions` WRITE;
/*!40000 ALTER TABLE `ospos_sessions` DISABLE KEYS */;
INSERT INTO `ospos_sessions` VALUES ('025dd832f9d2e9429a96c955121667b4','127.0.0.1','Mozilla/5.0 (Windows NT 6.1; rv:42.0) Gecko/20100101 Firefox/42.0',1450249866,'a:2:{s:9:\"user_data\";s:0:\"\";s:9:\"person_id\";s:1:\"1\";}'),('0a3d65b224a7e230d3e52a662264a63a','127.0.0.1','Mozilla/5.0 (Windows NT 6.1; rv:42.0) Gecko/20100101 Firefox/42.0',1450247471,'a:1:{s:9:\"person_id\";s:1:\"1\";}'),('0be06156a02290f85636d73775dbc3b7','127.0.0.1','Mozilla/5.0 (Windows NT 6.1; rv:42.0) Gecko/20100101 Firefox/42.0',1450252761,'a:2:{s:9:\"user_data\";s:0:\"\";s:9:\"person_id\";s:1:\"1\";}'),('0c25221b4651126d8cd260bea3a4fcc3','127.0.0.1','Mozilla/5.0 (Windows NT 6.1; rv:42.0) Gecko/20100101 Firefox/42.0',1450352735,'a:2:{s:9:\"user_data\";s:0:\"\";s:9:\"person_id\";s:1:\"1\";}'),('0cd99c1db86043d12ad551906c50d10f','127.0.0.1','Mozilla/5.0 (Windows NT 6.1; rv:42.0) Gecko/20100101 Firefox/42.0',1450244065,''),('0ecfea6c8825f6dcac9aa6eab6e277cf','127.0.0.1','Mozilla/5.0 (Windows NT 6.1; rv:42.0) Gecko/20100101 Firefox/42.0',1450258273,'a:2:{s:9:\"user_data\";s:0:\"\";s:9:\"person_id\";s:1:\"1\";}'),('1a57b1a0630b0b7aa5ff7f952ac4ba40','127.0.0.1','Mozilla/5.0 (Windows NT 6.1; rv:42.0) Gecko/20100101 Firefox/42.0',1450252051,'a:2:{s:9:\"user_data\";s:0:\"\";s:9:\"person_id\";s:1:\"1\";}'),('2fa4999c34fa7497f008049317de9df6','127.0.0.1','Mozilla/5.0 (Windows NT 6.1; rv:42.0) Gecko/20100101 Firefox/42.0',1450249346,'a:1:{s:9:\"person_id\";s:1:\"1\";}'),('316ed2ffe9a2dac009502777a6de96e2','127.0.0.1','Mozilla/5.0 (Windows NT 6.1; rv:42.0) Gecko/20100101 Firefox/42.0',1450184292,''),('3c8fc8a1fe7e49056486b41a74a47dd1','127.0.0.1','Mozilla/5.0 (Windows NT 6.1; rv:42.0) Gecko/20100101 Firefox/42.0',1450263992,''),('3ffce5a55942bc9b8d99a7921170a65e','127.0.0.1','Mozilla/5.0 (Windows NT 6.1; rv:42.0) Gecko/20100101 Firefox/42.0',1450184775,'a:2:{s:9:\"user_data\";s:0:\"\";s:9:\"person_id\";s:1:\"1\";}'),('45b4c6c3bb4f591cd12fc4c16bfe2682','127.0.0.1','Mozilla/5.0 (Windows NT 6.1; rv:42.0) Gecko/20100101 Firefox/42.0',1450246284,''),('539222f1fbd50f7f878e191f3a112854','127.0.0.1','Mozilla/5.0 (Windows NT 6.1; rv:42.0) Gecko/20100101 Firefox/42.0',1450258997,'a:2:{s:9:\"user_data\";s:0:\"\";s:9:\"person_id\";s:1:\"1\";}'),('683b37b82ec313416fc1e60fb1d35ef8','127.0.0.1','Mozilla/5.0 (Windows NT 6.1; rv:42.0) Gecko/20100101 Firefox/42.0',1450184644,''),('6b659c1e363aa42926bcbd3483a8186d','127.0.0.1','Mozilla/5.0 (Windows NT 6.1; rv:42.0) Gecko/20100101 Firefox/42.0',1450352246,''),('7e023aea7b66ce099e2fbd482c54718e','127.0.0.1','Mozilla/5.0 (Windows NT 6.1; rv:42.0) Gecko/20100101 Firefox/42.0',1450253042,'a:1:{s:9:\"person_id\";s:1:\"1\";}'),('7fda720c85f5da2ec50a2a934ec69400','127.0.0.1','Mozilla/5.0 (Windows NT 6.1; rv:42.0) Gecko/20100101 Firefox/42.0',1450243081,''),('86f161c8d8642ae4fceac25038ff95a2','127.0.0.1','Mozilla/5.0 (Windows NT 6.1; rv:42.0) Gecko/20100101 Firefox/42.0',1450246061,''),('8cb34dbc25a79bab23b740b765aca43e','127.0.0.1','Mozilla/5.0 (Windows NT 6.1; rv:42.0) Gecko/20100101 Firefox/42.0',1450184966,''),('8ea0a3c3691c2509e52dfdd5f41ffe6a','127.0.0.1','Mozilla/5.0 (Windows NT 6.1; rv:42.0) Gecko/20100101 Firefox/42.0',1450358405,'a:3:{s:9:\"user_data\";s:0:\"\";s:9:\"person_id\";s:1:\"1\";s:22:\"flash:old:flashSuccess\";s:7:\"success\";}'),('9c1776c49b45778dafe5ff5c028fbc65','127.0.0.1','Mozilla/5.0 (Windows NT 6.1; rv:42.0) Gecko/20100101 Firefox/42.0',1450184532,''),('9f9ece6d18b2a70a87405e57140fc216','127.0.0.1','Mozilla/5.0 (Windows NT 6.1; rv:42.0) Gecko/20100101 Firefox/42.0',1450184008,''),('a585cc71129a01d7330864a992250e1e','::1','Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/47.0.2526.80 Safari/537.36',1450247066,''),('b1165f758ac9f0e661a327ff63f3dfca','127.0.0.1','Mozilla/5.0 (Windows NT 6.1; rv:42.0) Gecko/20100101 Firefox/42.0',1450253375,'a:2:{s:9:\"user_data\";s:0:\"\";s:9:\"person_id\";s:1:\"1\";}'),('b6f0c66d330ef6d26f336c6e3bc6dc9d','127.0.0.1','Mozilla/5.0 (Windows NT 6.1; rv:42.0) Gecko/20100101 Firefox/42.0',1450248770,''),('b85647abce619ad8da4b40a95fd23f68','127.0.0.1','Mozilla/5.0 (Windows NT 6.1; rv:42.0) Gecko/20100101 Firefox/42.0',1450259525,'a:2:{s:9:\"user_data\";s:0:\"\";s:9:\"person_id\";s:1:\"1\";}'),('bada8679c9b7f0b949d3979b21f62f69','127.0.0.1','Mozilla/5.0 (Windows NT 6.1; rv:42.0) Gecko/20100101 Firefox/42.0',1450185101,''),('c931b4d23fc3e0e9250bb9e947f01a0d','127.0.0.1','Mozilla/5.0 (Windows NT 6.1; rv:42.0) Gecko/20100101 Firefox/42.0',1450249115,'a:2:{s:9:\"user_data\";s:0:\"\";s:9:\"person_id\";s:1:\"1\";}'),('cb059840f29b81bea4ff8913c71cf53f','127.0.0.1','Mozilla/5.0 (Windows NT 6.1; rv:42.0) Gecko/20100101 Firefox/42.0',1450248628,'a:1:{s:9:\"person_id\";s:1:\"1\";}'),('e209d2fd1a733ac3b7e93acc1ad719d7','127.0.0.1','Mozilla/5.0 (Windows NT 6.1; rv:42.0) Gecko/20100101 Firefox/42.0',1450267030,''),('f08f55d59adad51e1cc3a029f0f84a56','127.0.0.1','Mozilla/5.0 (Windows NT 6.1; rv:42.0) Gecko/20100101 Firefox/42.0',1450251834,'a:2:{s:9:\"user_data\";s:0:\"\";s:9:\"person_id\";s:1:\"1\";}'),('f2996ed696c6a9d0301b381e1db6ee1f','127.0.0.1','Mozilla/5.0 (Windows NT 6.1; rv:42.0) Gecko/20100101 Firefox/42.0',1450184550,'a:1:{s:9:\"person_id\";s:1:\"1\";}');
/*!40000 ALTER TABLE `ospos_sessions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ospos_stock_locations`
--

DROP TABLE IF EXISTS `ospos_stock_locations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ospos_stock_locations` (
  `location_id` int(11) NOT NULL AUTO_INCREMENT,
  `location_name` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `deleted` int(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`location_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ospos_stock_locations`
--

LOCK TABLES `ospos_stock_locations` WRITE;
/*!40000 ALTER TABLE `ospos_stock_locations` DISABLE KEYS */;
INSERT INTO `ospos_stock_locations` VALUES (1,'stock',0);
/*!40000 ALTER TABLE `ospos_stock_locations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ospos_suppliers`
--

DROP TABLE IF EXISTS `ospos_suppliers`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ospos_suppliers` (
  `person_id` int(10) NOT NULL,
  `company_name` varchar(255) NOT NULL,
  `account_number` varchar(255) DEFAULT NULL,
  `deleted` int(1) NOT NULL DEFAULT '0',
  UNIQUE KEY `account_number` (`account_number`),
  KEY `person_id` (`person_id`),
  CONSTRAINT `ospos_suppliers_ibfk_1` FOREIGN KEY (`person_id`) REFERENCES `ospos_people` (`person_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ospos_suppliers`
--

LOCK TABLES `ospos_suppliers` WRITE;
/*!40000 ALTER TABLE `ospos_suppliers` DISABLE KEYS */;
/*!40000 ALTER TABLE `ospos_suppliers` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping routines for database 'codeigniter_template'
--
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2015-12-17 18:55:25
