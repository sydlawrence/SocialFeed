-- MySQL dump 10.11
--
-- Host: localhost    Database: socialfeed
-- ------------------------------------------------------
-- Server version	5.0.32-Debian_7etch6-log

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
-- Table structure for table `zest_activities`
--

DROP TABLE IF EXISTS `zest_activities`;
CREATE TABLE `zest_activities` (
  `id` int(11) unsigned NOT NULL auto_increment,
  `user_id` int(11) NOT NULL,
  `item_type` text,
  `item_id` int(11) NOT NULL,
  `activity_type` text,
  `item_old` text,
  `date` timestamp NOT NULL default CURRENT_TIMESTAMP,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `zest_activities`
--

LOCK TABLES `zest_activities` WRITE;
/*!40000 ALTER TABLE `zest_activities` DISABLE KEYS */;
INSERT INTO `zest_activities` VALUES (1,1,'page',1,'update','O:10:\"Page_Model\":6:{s:14:\"\0*\0object_name\";s:4:\"page\";s:9:\"\0*\0object\";a:12:{s:2:\"id\";i:1;s:11:\"template_id\";i:1;s:5:\"title\";s:4:\"Home\";s:9:\"parent_id\";i:0;s:6:\"seoURL\";s:0:\"\";s:7:\"extraJS\";s:0:\"\";s:8:\"extraCSS\";s:0:\"\";s:9:\"status_id\";i:2;s:7:\"form_id\";i:0;s:13:\"display_order\";i:1;s:9:\"navbar_id\";i:1;s:12:\"date_updated\";s:19:\"0000-00-00 00:00:00\";}s:10:\"\0*\0changed\";a:8:{s:11:\"template_id\";s:11:\"template_id\";s:9:\"navbar_id\";s:9:\"navbar_id\";s:9:\"parent_id\";s:9:\"parent_id\";s:6:\"seoURL\";s:6:\"seoURL\";s:7:\"form_id\";s:7:\"form_id\";s:7:\"extraJS\";s:7:\"extraJS\";s:8:\"extraCSS\";s:8:\"extraCSS\";s:9:\"status_id\";s:9:\"status_id\";}s:9:\"\0*\0loaded\";b:1;s:8:\"\0*\0saved\";b:0;s:10:\"\0*\0sorting\";a:1:{s:2:\"id\";s:3:\"asc\";}}','2009-05-01 19:01:33'),(2,1,'page',1,'update','O:10:\"Page_Model\":6:{s:14:\"\0*\0object_name\";s:4:\"page\";s:9:\"\0*\0object\";a:12:{s:2:\"id\";i:1;s:11:\"template_id\";i:1;s:5:\"title\";s:4:\"Home\";s:9:\"parent_id\";i:0;s:6:\"seoURL\";s:0:\"\";s:7:\"extraJS\";s:0:\"\";s:8:\"extraCSS\";s:0:\"\";s:9:\"status_id\";i:2;s:7:\"form_id\";i:0;s:13:\"display_order\";i:1;s:9:\"navbar_id\";i:1;s:12:\"date_updated\";s:19:\"0000-00-00 00:00:00\";}s:10:\"\0*\0changed\";a:8:{s:11:\"template_id\";s:11:\"template_id\";s:9:\"navbar_id\";s:9:\"navbar_id\";s:9:\"parent_id\";s:9:\"parent_id\";s:6:\"seoURL\";s:6:\"seoURL\";s:7:\"form_id\";s:7:\"form_id\";s:7:\"extraJS\";s:7:\"extraJS\";s:8:\"extraCSS\";s:8:\"extraCSS\";s:9:\"status_id\";s:9:\"status_id\";}s:9:\"\0*\0loaded\";b:1;s:8:\"\0*\0saved\";b:0;s:10:\"\0*\0sorting\";a:1:{s:2:\"id\";s:3:\"asc\";}}','2009-05-01 19:03:00'),(3,1,'page',1,'update','O:10:\"Page_Model\":6:{s:14:\"\0*\0object_name\";s:4:\"page\";s:9:\"\0*\0object\";a:12:{s:2:\"id\";i:1;s:11:\"template_id\";i:1;s:5:\"title\";s:4:\"Home\";s:9:\"parent_id\";i:0;s:6:\"seoURL\";s:0:\"\";s:7:\"extraJS\";s:0:\"\";s:8:\"extraCSS\";s:0:\"\";s:9:\"status_id\";i:2;s:7:\"form_id\";i:0;s:13:\"display_order\";i:1;s:9:\"navbar_id\";i:1;s:12:\"date_updated\";s:19:\"0000-00-00 00:00:00\";}s:10:\"\0*\0changed\";a:8:{s:11:\"template_id\";s:11:\"template_id\";s:9:\"navbar_id\";s:9:\"navbar_id\";s:9:\"parent_id\";s:9:\"parent_id\";s:6:\"seoURL\";s:6:\"seoURL\";s:7:\"form_id\";s:7:\"form_id\";s:7:\"extraJS\";s:7:\"extraJS\";s:8:\"extraCSS\";s:8:\"extraCSS\";s:9:\"status_id\";s:9:\"status_id\";}s:9:\"\0*\0loaded\";b:1;s:8:\"\0*\0saved\";b:0;s:10:\"\0*\0sorting\";a:1:{s:2:\"id\";s:3:\"asc\";}}','2009-05-01 19:03:28'),(4,1,'page',1,'update','O:10:\"Page_Model\":6:{s:14:\"\0*\0object_name\";s:4:\"page\";s:9:\"\0*\0object\";a:12:{s:2:\"id\";i:1;s:11:\"template_id\";i:1;s:5:\"title\";s:4:\"Home\";s:9:\"parent_id\";i:0;s:6:\"seoURL\";s:0:\"\";s:7:\"extraJS\";s:0:\"\";s:8:\"extraCSS\";s:0:\"\";s:9:\"status_id\";i:2;s:7:\"form_id\";i:0;s:13:\"display_order\";i:1;s:9:\"navbar_id\";i:1;s:12:\"date_updated\";s:19:\"0000-00-00 00:00:00\";}s:10:\"\0*\0changed\";a:8:{s:11:\"template_id\";s:11:\"template_id\";s:9:\"navbar_id\";s:9:\"navbar_id\";s:9:\"parent_id\";s:9:\"parent_id\";s:6:\"seoURL\";s:6:\"seoURL\";s:7:\"form_id\";s:7:\"form_id\";s:7:\"extraJS\";s:7:\"extraJS\";s:8:\"extraCSS\";s:8:\"extraCSS\";s:9:\"status_id\";s:9:\"status_id\";}s:9:\"\0*\0loaded\";b:1;s:8:\"\0*\0saved\";b:0;s:10:\"\0*\0sorting\";a:1:{s:2:\"id\";s:3:\"asc\";}}','2009-05-01 19:04:19'),(5,1,'page',1,'update','O:10:\"Page_Model\":6:{s:14:\"\0*\0object_name\";s:4:\"page\";s:9:\"\0*\0object\";a:12:{s:2:\"id\";i:1;s:11:\"template_id\";i:1;s:5:\"title\";s:4:\"Home\";s:9:\"parent_id\";i:0;s:6:\"seoURL\";s:0:\"\";s:7:\"extraJS\";s:0:\"\";s:8:\"extraCSS\";s:0:\"\";s:9:\"status_id\";i:2;s:7:\"form_id\";i:0;s:13:\"display_order\";i:1;s:9:\"navbar_id\";i:1;s:12:\"date_updated\";s:19:\"0000-00-00 00:00:00\";}s:10:\"\0*\0changed\";a:8:{s:11:\"template_id\";s:11:\"template_id\";s:9:\"navbar_id\";s:9:\"navbar_id\";s:9:\"parent_id\";s:9:\"parent_id\";s:6:\"seoURL\";s:6:\"seoURL\";s:7:\"form_id\";s:7:\"form_id\";s:7:\"extraJS\";s:7:\"extraJS\";s:8:\"extraCSS\";s:8:\"extraCSS\";s:9:\"status_id\";s:9:\"status_id\";}s:9:\"\0*\0loaded\";b:1;s:8:\"\0*\0saved\";b:0;s:10:\"\0*\0sorting\";a:1:{s:2:\"id\";s:3:\"asc\";}}','2009-05-01 19:30:33'),(6,1,'page',1,'update','O:10:\"Page_Model\":6:{s:14:\"\0*\0object_name\";s:4:\"page\";s:9:\"\0*\0object\";a:12:{s:2:\"id\";i:1;s:11:\"template_id\";i:1;s:5:\"title\";s:4:\"Home\";s:9:\"parent_id\";i:0;s:6:\"seoURL\";s:0:\"\";s:7:\"extraJS\";s:0:\"\";s:8:\"extraCSS\";s:0:\"\";s:9:\"status_id\";i:2;s:7:\"form_id\";i:0;s:13:\"display_order\";i:1;s:9:\"navbar_id\";i:1;s:12:\"date_updated\";s:19:\"0000-00-00 00:00:00\";}s:10:\"\0*\0changed\";a:8:{s:11:\"template_id\";s:11:\"template_id\";s:9:\"navbar_id\";s:9:\"navbar_id\";s:9:\"parent_id\";s:9:\"parent_id\";s:6:\"seoURL\";s:6:\"seoURL\";s:7:\"form_id\";s:7:\"form_id\";s:7:\"extraJS\";s:7:\"extraJS\";s:8:\"extraCSS\";s:8:\"extraCSS\";s:9:\"status_id\";s:9:\"status_id\";}s:9:\"\0*\0loaded\";b:1;s:8:\"\0*\0saved\";b:0;s:10:\"\0*\0sorting\";a:1:{s:2:\"id\";s:3:\"asc\";}}','2009-05-01 19:30:52'),(7,1,'page',1,'update','O:10:\"Page_Model\":6:{s:14:\"\0*\0object_name\";s:4:\"page\";s:9:\"\0*\0object\";a:12:{s:2:\"id\";i:1;s:11:\"template_id\";i:1;s:5:\"title\";s:4:\"Home\";s:9:\"parent_id\";i:0;s:6:\"seoURL\";s:0:\"\";s:7:\"extraJS\";s:0:\"\";s:8:\"extraCSS\";s:0:\"\";s:9:\"status_id\";i:2;s:7:\"form_id\";i:0;s:13:\"display_order\";i:1;s:9:\"navbar_id\";i:1;s:12:\"date_updated\";s:19:\"0000-00-00 00:00:00\";}s:10:\"\0*\0changed\";a:8:{s:11:\"template_id\";s:11:\"template_id\";s:9:\"navbar_id\";s:9:\"navbar_id\";s:9:\"parent_id\";s:9:\"parent_id\";s:6:\"seoURL\";s:6:\"seoURL\";s:7:\"form_id\";s:7:\"form_id\";s:7:\"extraJS\";s:7:\"extraJS\";s:8:\"extraCSS\";s:8:\"extraCSS\";s:9:\"status_id\";s:9:\"status_id\";}s:9:\"\0*\0loaded\";b:1;s:8:\"\0*\0saved\";b:0;s:10:\"\0*\0sorting\";a:1:{s:2:\"id\";s:3:\"asc\";}}','2009-05-01 19:32:19'),(8,1,'page_definition',0,'insert','O:21:\"Page_definition_Model\":6:{s:14:\"\0*\0object_name\";s:15:\"page_definition\";s:9:\"\0*\0object\";a:8:{s:2:\"id\";i:0;s:7:\"page_id\";i:0;s:11:\"language_id\";i:1;s:5:\"title\";s:5:\"Hello\";s:8:\"seoTitle\";N;s:11:\"seoKeywords\";N;s:14:\"seoDescription\";N;s:8:\"bodyText\";N;}s:10:\"\0*\0changed\";a:2:{s:11:\"language_id\";s:11:\"language_id\";s:5:\"title\";s:5:\"title\";}s:9:\"\0*\0loaded\";b:0;s:8:\"\0*\0saved\";b:0;s:10:\"\0*\0sorting\";a:1:{s:2:\"id\";s:3:\"asc\";}}','2009-05-02 16:58:41'),(9,1,'page_definition',5,'update','O:21:\"Page_definition_Model\":6:{s:14:\"\0*\0object_name\";s:15:\"page_definition\";s:9:\"\0*\0object\";a:8:{s:2:\"id\";i:5;s:7:\"page_id\";i:1;s:11:\"language_id\";i:1;s:5:\"title\";s:5:\"Hello\";s:8:\"seoTitle\";N;s:11:\"seoKeywords\";N;s:14:\"seoDescription\";N;s:8:\"bodyText\";s:11:\"<p>Test</p>\";}s:10:\"\0*\0changed\";a:2:{s:11:\"language_id\";s:11:\"language_id\";s:8:\"bodyText\";s:8:\"bodyText\";}s:9:\"\0*\0loaded\";b:1;s:8:\"\0*\0saved\";b:0;s:10:\"\0*\0sorting\";a:1:{s:2:\"id\";s:3:\"asc\";}}','2009-05-02 16:58:41'),(10,1,'page_definition',5,'update','O:21:\"Page_definition_Model\":6:{s:14:\"\0*\0object_name\";s:15:\"page_definition\";s:9:\"\0*\0object\";a:8:{s:2:\"id\";i:5;s:7:\"page_id\";i:1;s:11:\"language_id\";i:1;s:5:\"title\";s:4:\"rwer\";s:8:\"seoTitle\";N;s:11:\"seoKeywords\";N;s:14:\"seoDescription\";N;s:8:\"bodyText\";s:11:\"<p>Test</p>\";}s:10:\"\0*\0changed\";a:2:{s:11:\"language_id\";s:11:\"language_id\";s:5:\"title\";s:5:\"title\";}s:9:\"\0*\0loaded\";b:1;s:8:\"\0*\0saved\";b:0;s:10:\"\0*\0sorting\";a:1:{s:2:\"id\";s:3:\"asc\";}}','2009-05-02 16:58:41'),(11,1,'page_definition',5,'update','O:21:\"Page_definition_Model\":6:{s:14:\"\0*\0object_name\";s:15:\"page_definition\";s:9:\"\0*\0object\";a:8:{s:2:\"id\";i:5;s:7:\"page_id\";i:1;s:11:\"language_id\";i:1;s:5:\"title\";s:4:\"rwer\";s:8:\"seoTitle\";N;s:11:\"seoKeywords\";N;s:14:\"seoDescription\";N;s:8:\"bodyText\";s:12:\"<p>efewf</p>\";}s:10:\"\0*\0changed\";a:2:{s:11:\"language_id\";s:11:\"language_id\";s:8:\"bodyText\";s:8:\"bodyText\";}s:9:\"\0*\0loaded\";b:1;s:8:\"\0*\0saved\";b:0;s:10:\"\0*\0sorting\";a:1:{s:2:\"id\";s:3:\"asc\";}}','2009-05-02 16:58:41'),(12,1,'page_definition',5,'update','O:21:\"Page_definition_Model\":6:{s:14:\"\0*\0object_name\";s:15:\"page_definition\";s:9:\"\0*\0object\";a:8:{s:2:\"id\";i:5;s:7:\"page_id\";i:1;s:11:\"language_id\";i:1;s:5:\"title\";s:4:\"rwer\";s:8:\"seoTitle\";N;s:11:\"seoKeywords\";s:0:\"\";s:14:\"seoDescription\";N;s:8:\"bodyText\";s:12:\"<p>efewf</p>\";}s:10:\"\0*\0changed\";a:2:{s:11:\"language_id\";s:11:\"language_id\";s:11:\"seoKeywords\";s:11:\"seoKeywords\";}s:9:\"\0*\0loaded\";b:1;s:8:\"\0*\0saved\";b:0;s:10:\"\0*\0sorting\";a:1:{s:2:\"id\";s:3:\"asc\";}}','2009-05-02 16:58:41'),(13,1,'page_definition',5,'update','O:21:\"Page_definition_Model\":6:{s:14:\"\0*\0object_name\";s:15:\"page_definition\";s:9:\"\0*\0object\";a:8:{s:2:\"id\";i:5;s:7:\"page_id\";i:1;s:11:\"language_id\";i:1;s:5:\"title\";s:4:\"rwer\";s:8:\"seoTitle\";N;s:11:\"seoKeywords\";s:0:\"\";s:14:\"seoDescription\";s:0:\"\";s:8:\"bodyText\";s:12:\"<p>efewf</p>\";}s:10:\"\0*\0changed\";a:2:{s:11:\"language_id\";s:11:\"language_id\";s:14:\"seoDescription\";s:14:\"seoDescription\";}s:9:\"\0*\0loaded\";b:1;s:8:\"\0*\0saved\";b:0;s:10:\"\0*\0sorting\";a:1:{s:2:\"id\";s:3:\"asc\";}}','2009-05-02 16:58:41'),(14,1,'page_definition',5,'update','O:21:\"Page_definition_Model\":6:{s:14:\"\0*\0object_name\";s:15:\"page_definition\";s:9:\"\0*\0object\";a:8:{s:2:\"id\";i:5;s:7:\"page_id\";i:1;s:11:\"language_id\";i:1;s:5:\"title\";s:4:\"rwer\";s:8:\"seoTitle\";N;s:11:\"seoKeywords\";s:0:\"\";s:14:\"seoDescription\";s:0:\"\";s:8:\"bodyText\";s:12:\"<p>efewf</p>\";}s:10:\"\0*\0changed\";a:2:{s:11:\"language_id\";s:11:\"language_id\";s:11:\"seoKeywords\";s:11:\"seoKeywords\";}s:9:\"\0*\0loaded\";b:1;s:8:\"\0*\0saved\";b:0;s:10:\"\0*\0sorting\";a:1:{s:2:\"id\";s:3:\"asc\";}}','2009-05-02 16:58:41'),(15,1,'page_definition',5,'update','O:21:\"Page_definition_Model\":6:{s:14:\"\0*\0object_name\";s:15:\"page_definition\";s:9:\"\0*\0object\";a:8:{s:2:\"id\";i:5;s:7:\"page_id\";i:1;s:11:\"language_id\";i:1;s:5:\"title\";s:4:\"rwer\";s:8:\"seoTitle\";N;s:11:\"seoKeywords\";s:0:\"\";s:14:\"seoDescription\";s:0:\"\";s:8:\"bodyText\";s:12:\"<p>efewf</p>\";}s:10:\"\0*\0changed\";a:2:{s:11:\"language_id\";s:11:\"language_id\";s:14:\"seoDescription\";s:14:\"seoDescription\";}s:9:\"\0*\0loaded\";b:1;s:8:\"\0*\0saved\";b:0;s:10:\"\0*\0sorting\";a:1:{s:2:\"id\";s:3:\"asc\";}}','2009-05-02 16:58:41'),(16,1,'page_definition',5,'update','O:21:\"Page_definition_Model\":6:{s:14:\"\0*\0object_name\";s:15:\"page_definition\";s:9:\"\0*\0object\";a:8:{s:2:\"id\";i:5;s:7:\"page_id\";i:1;s:11:\"language_id\";i:1;s:5:\"title\";s:4:\"rwer\";s:8:\"seoTitle\";N;s:11:\"seoKeywords\";s:0:\"\";s:14:\"seoDescription\";s:0:\"\";s:8:\"bodyText\";s:12:\"<p>efewf</p>\";}s:10:\"\0*\0changed\";a:0:{}s:9:\"\0*\0loaded\";b:1;s:8:\"\0*\0saved\";b:1;s:10:\"\0*\0sorting\";a:1:{s:2:\"id\";s:3:\"asc\";}}','2009-05-02 16:58:41'),(17,1,'page_definition',5,'update','O:21:\"Page_definition_Model\":6:{s:14:\"\0*\0object_name\";s:15:\"page_definition\";s:9:\"\0*\0object\";a:8:{s:2:\"id\";i:5;s:7:\"page_id\";i:1;s:11:\"language_id\";i:1;s:5:\"title\";s:5:\"Hello\";s:8:\"seoTitle\";N;s:11:\"seoKeywords\";s:0:\"\";s:14:\"seoDescription\";s:0:\"\";s:8:\"bodyText\";s:12:\"<p>efewf</p>\";}s:10:\"\0*\0changed\";a:2:{s:11:\"language_id\";s:11:\"language_id\";s:5:\"title\";s:5:\"title\";}s:9:\"\0*\0loaded\";b:1;s:8:\"\0*\0saved\";b:0;s:10:\"\0*\0sorting\";a:1:{s:2:\"id\";s:3:\"asc\";}}','2009-05-02 16:59:03'),(18,1,'page_definition',5,'update','O:21:\"Page_definition_Model\":6:{s:14:\"\0*\0object_name\";s:15:\"page_definition\";s:9:\"\0*\0object\";a:8:{s:2:\"id\";i:5;s:7:\"page_id\";i:1;s:11:\"language_id\";i:1;s:5:\"title\";s:5:\"Hello\";s:8:\"seoTitle\";N;s:11:\"seoKeywords\";s:0:\"\";s:14:\"seoDescription\";s:0:\"\";s:8:\"bodyText\";s:11:\"<p>Test</p>\";}s:10:\"\0*\0changed\";a:2:{s:11:\"language_id\";s:11:\"language_id\";s:8:\"bodyText\";s:8:\"bodyText\";}s:9:\"\0*\0loaded\";b:1;s:8:\"\0*\0saved\";b:0;s:10:\"\0*\0sorting\";a:1:{s:2:\"id\";s:3:\"asc\";}}','2009-05-02 16:59:03'),(19,1,'page_definition',5,'update','O:21:\"Page_definition_Model\":6:{s:14:\"\0*\0object_name\";s:15:\"page_definition\";s:9:\"\0*\0object\";a:8:{s:2:\"id\";i:5;s:7:\"page_id\";i:1;s:11:\"language_id\";i:1;s:5:\"title\";s:4:\"rwer\";s:8:\"seoTitle\";N;s:11:\"seoKeywords\";s:0:\"\";s:14:\"seoDescription\";s:0:\"\";s:8:\"bodyText\";s:11:\"<p>Test</p>\";}s:10:\"\0*\0changed\";a:2:{s:11:\"language_id\";s:11:\"language_id\";s:5:\"title\";s:5:\"title\";}s:9:\"\0*\0loaded\";b:1;s:8:\"\0*\0saved\";b:0;s:10:\"\0*\0sorting\";a:1:{s:2:\"id\";s:3:\"asc\";}}','2009-05-02 16:59:03'),(20,1,'page_definition',5,'update','O:21:\"Page_definition_Model\":6:{s:14:\"\0*\0object_name\";s:15:\"page_definition\";s:9:\"\0*\0object\";a:8:{s:2:\"id\";i:5;s:7:\"page_id\";i:1;s:11:\"language_id\";i:1;s:5:\"title\";s:4:\"rwer\";s:8:\"seoTitle\";N;s:11:\"seoKeywords\";s:0:\"\";s:14:\"seoDescription\";s:0:\"\";s:8:\"bodyText\";s:12:\"<p>efewf</p>\";}s:10:\"\0*\0changed\";a:2:{s:11:\"language_id\";s:11:\"language_id\";s:8:\"bodyText\";s:8:\"bodyText\";}s:9:\"\0*\0loaded\";b:1;s:8:\"\0*\0saved\";b:0;s:10:\"\0*\0sorting\";a:1:{s:2:\"id\";s:3:\"asc\";}}','2009-05-02 16:59:03'),(21,1,'page_definition',5,'update','O:21:\"Page_definition_Model\":6:{s:14:\"\0*\0object_name\";s:15:\"page_definition\";s:9:\"\0*\0object\";a:8:{s:2:\"id\";i:5;s:7:\"page_id\";i:1;s:11:\"language_id\";i:1;s:5:\"title\";s:4:\"rwer\";s:8:\"seoTitle\";N;s:11:\"seoKeywords\";s:0:\"\";s:14:\"seoDescription\";s:0:\"\";s:8:\"bodyText\";s:12:\"<p>efewf</p>\";}s:10:\"\0*\0changed\";a:2:{s:11:\"language_id\";s:11:\"language_id\";s:11:\"seoKeywords\";s:11:\"seoKeywords\";}s:9:\"\0*\0loaded\";b:1;s:8:\"\0*\0saved\";b:0;s:10:\"\0*\0sorting\";a:1:{s:2:\"id\";s:3:\"asc\";}}','2009-05-02 16:59:03'),(22,1,'page_definition',5,'update','O:21:\"Page_definition_Model\":6:{s:14:\"\0*\0object_name\";s:15:\"page_definition\";s:9:\"\0*\0object\";a:8:{s:2:\"id\";i:5;s:7:\"page_id\";i:1;s:11:\"language_id\";i:1;s:5:\"title\";s:4:\"rwer\";s:8:\"seoTitle\";N;s:11:\"seoKeywords\";s:0:\"\";s:14:\"seoDescription\";s:0:\"\";s:8:\"bodyText\";s:12:\"<p>efewf</p>\";}s:10:\"\0*\0changed\";a:2:{s:11:\"language_id\";s:11:\"language_id\";s:14:\"seoDescription\";s:14:\"seoDescription\";}s:9:\"\0*\0loaded\";b:1;s:8:\"\0*\0saved\";b:0;s:10:\"\0*\0sorting\";a:1:{s:2:\"id\";s:3:\"asc\";}}','2009-05-02 16:59:03'),(23,1,'page_definition',5,'update','O:21:\"Page_definition_Model\":6:{s:14:\"\0*\0object_name\";s:15:\"page_definition\";s:9:\"\0*\0object\";a:8:{s:2:\"id\";i:5;s:7:\"page_id\";i:1;s:11:\"language_id\";i:1;s:5:\"title\";s:4:\"rwer\";s:8:\"seoTitle\";N;s:11:\"seoKeywords\";s:0:\"\";s:14:\"seoDescription\";s:0:\"\";s:8:\"bodyText\";s:12:\"<p>efewf</p>\";}s:10:\"\0*\0changed\";a:2:{s:11:\"language_id\";s:11:\"language_id\";s:11:\"seoKeywords\";s:11:\"seoKeywords\";}s:9:\"\0*\0loaded\";b:1;s:8:\"\0*\0saved\";b:0;s:10:\"\0*\0sorting\";a:1:{s:2:\"id\";s:3:\"asc\";}}','2009-05-02 16:59:03'),(24,1,'page_definition',5,'update','O:21:\"Page_definition_Model\":6:{s:14:\"\0*\0object_name\";s:15:\"page_definition\";s:9:\"\0*\0object\";a:8:{s:2:\"id\";i:5;s:7:\"page_id\";i:1;s:11:\"language_id\";i:1;s:5:\"title\";s:4:\"rwer\";s:8:\"seoTitle\";N;s:11:\"seoKeywords\";s:0:\"\";s:14:\"seoDescription\";s:0:\"\";s:8:\"bodyText\";s:12:\"<p>efewf</p>\";}s:10:\"\0*\0changed\";a:2:{s:11:\"language_id\";s:11:\"language_id\";s:14:\"seoDescription\";s:14:\"seoDescription\";}s:9:\"\0*\0loaded\";b:1;s:8:\"\0*\0saved\";b:0;s:10:\"\0*\0sorting\";a:1:{s:2:\"id\";s:3:\"asc\";}}','2009-05-02 16:59:03'),(25,1,'page',1,'update','O:10:\"Page_Model\":6:{s:14:\"\0*\0object_name\";s:4:\"page\";s:9:\"\0*\0object\";a:12:{s:2:\"id\";i:1;s:11:\"template_id\";i:1;s:5:\"title\";s:4:\"Home\";s:9:\"parent_id\";i:0;s:6:\"seoURL\";s:0:\"\";s:7:\"extraJS\";s:0:\"\";s:8:\"extraCSS\";s:0:\"\";s:9:\"status_id\";i:2;s:7:\"form_id\";i:0;s:13:\"display_order\";i:1;s:9:\"navbar_id\";i:1;s:12:\"date_updated\";s:19:\"0000-00-00 00:00:00\";}s:10:\"\0*\0changed\";a:8:{s:11:\"template_id\";s:11:\"template_id\";s:9:\"navbar_id\";s:9:\"navbar_id\";s:9:\"parent_id\";s:9:\"parent_id\";s:6:\"seoURL\";s:6:\"seoURL\";s:7:\"form_id\";s:7:\"form_id\";s:7:\"extraJS\";s:7:\"extraJS\";s:8:\"extraCSS\";s:8:\"extraCSS\";s:9:\"status_id\";s:9:\"status_id\";}s:9:\"\0*\0loaded\";b:1;s:8:\"\0*\0saved\";b:0;s:10:\"\0*\0sorting\";a:1:{s:2:\"id\";s:3:\"asc\";}}','2009-05-02 16:59:03'),(26,1,'page_definition',5,'update','O:21:\"Page_definition_Model\":6:{s:14:\"\0*\0object_name\";s:15:\"page_definition\";s:9:\"\0*\0object\";a:8:{s:2:\"id\";i:5;s:7:\"page_id\";i:1;s:11:\"language_id\";i:1;s:5:\"title\";s:7:\"English\";s:8:\"seoTitle\";N;s:11:\"seoKeywords\";s:0:\"\";s:14:\"seoDescription\";s:0:\"\";s:8:\"bodyText\";s:12:\"<p>efewf</p>\";}s:10:\"\0*\0changed\";a:1:{s:5:\"title\";s:5:\"title\";}s:9:\"\0*\0loaded\";b:1;s:8:\"\0*\0saved\";b:0;s:10:\"\0*\0sorting\";a:1:{s:2:\"id\";s:3:\"asc\";}}','2009-05-02 17:01:34'),(27,1,'page_definition',5,'update','O:21:\"Page_definition_Model\":6:{s:14:\"\0*\0object_name\";s:15:\"page_definition\";s:9:\"\0*\0object\";a:8:{s:2:\"id\";i:5;s:7:\"page_id\";i:1;s:11:\"language_id\";i:1;s:5:\"title\";s:7:\"English\";s:8:\"seoTitle\";N;s:11:\"seoKeywords\";s:0:\"\";s:14:\"seoDescription\";s:0:\"\";s:8:\"bodyText\";s:19:\"<p>English text</p>\";}s:10:\"\0*\0changed\";a:1:{s:8:\"bodyText\";s:8:\"bodyText\";}s:9:\"\0*\0loaded\";b:1;s:8:\"\0*\0saved\";b:0;s:10:\"\0*\0sorting\";a:1:{s:2:\"id\";s:3:\"asc\";}}','2009-05-02 17:01:34'),(28,1,'page_definition',5,'update','O:21:\"Page_definition_Model\":6:{s:14:\"\0*\0object_name\";s:15:\"page_definition\";s:9:\"\0*\0object\";a:8:{s:2:\"id\";i:5;s:7:\"page_id\";i:1;s:11:\"language_id\";i:1;s:5:\"title\";s:6:\"french\";s:8:\"seoTitle\";N;s:11:\"seoKeywords\";s:0:\"\";s:14:\"seoDescription\";s:0:\"\";s:8:\"bodyText\";s:19:\"<p>English text</p>\";}s:10:\"\0*\0changed\";a:1:{s:5:\"title\";s:5:\"title\";}s:9:\"\0*\0loaded\";b:1;s:8:\"\0*\0saved\";b:0;s:10:\"\0*\0sorting\";a:1:{s:2:\"id\";s:3:\"asc\";}}','2009-05-02 17:01:34'),(29,1,'page_definition',5,'update','O:21:\"Page_definition_Model\":6:{s:14:\"\0*\0object_name\";s:15:\"page_definition\";s:9:\"\0*\0object\";a:8:{s:2:\"id\";i:5;s:7:\"page_id\";i:1;s:11:\"language_id\";i:1;s:5:\"title\";s:6:\"french\";s:8:\"seoTitle\";N;s:11:\"seoKeywords\";s:0:\"\";s:14:\"seoDescription\";s:0:\"\";s:8:\"bodyText\";s:18:\"<p>french text</p>\";}s:10:\"\0*\0changed\";a:1:{s:8:\"bodyText\";s:8:\"bodyText\";}s:9:\"\0*\0loaded\";b:1;s:8:\"\0*\0saved\";b:0;s:10:\"\0*\0sorting\";a:1:{s:2:\"id\";s:3:\"asc\";}}','2009-05-02 17:01:34'),(30,1,'page_definition',5,'update','O:21:\"Page_definition_Model\":6:{s:14:\"\0*\0object_name\";s:15:\"page_definition\";s:9:\"\0*\0object\";a:8:{s:2:\"id\";i:5;s:7:\"page_id\";i:1;s:11:\"language_id\";i:1;s:5:\"title\";s:6:\"french\";s:8:\"seoTitle\";N;s:11:\"seoKeywords\";s:0:\"\";s:14:\"seoDescription\";s:0:\"\";s:8:\"bodyText\";s:18:\"<p>french text</p>\";}s:10:\"\0*\0changed\";a:1:{s:11:\"seoKeywords\";s:11:\"seoKeywords\";}s:9:\"\0*\0loaded\";b:1;s:8:\"\0*\0saved\";b:0;s:10:\"\0*\0sorting\";a:1:{s:2:\"id\";s:3:\"asc\";}}','2009-05-02 17:01:34'),(31,1,'page_definition',5,'update','O:21:\"Page_definition_Model\":6:{s:14:\"\0*\0object_name\";s:15:\"page_definition\";s:9:\"\0*\0object\";a:8:{s:2:\"id\";i:5;s:7:\"page_id\";i:1;s:11:\"language_id\";i:1;s:5:\"title\";s:6:\"french\";s:8:\"seoTitle\";N;s:11:\"seoKeywords\";s:0:\"\";s:14:\"seoDescription\";s:0:\"\";s:8:\"bodyText\";s:18:\"<p>french text</p>\";}s:10:\"\0*\0changed\";a:1:{s:14:\"seoDescription\";s:14:\"seoDescription\";}s:9:\"\0*\0loaded\";b:1;s:8:\"\0*\0saved\";b:0;s:10:\"\0*\0sorting\";a:1:{s:2:\"id\";s:3:\"asc\";}}','2009-05-02 17:01:34'),(32,1,'page_definition',5,'update','O:21:\"Page_definition_Model\":6:{s:14:\"\0*\0object_name\";s:15:\"page_definition\";s:9:\"\0*\0object\";a:8:{s:2:\"id\";i:5;s:7:\"page_id\";i:1;s:11:\"language_id\";i:1;s:5:\"title\";s:6:\"french\";s:8:\"seoTitle\";N;s:11:\"seoKeywords\";s:0:\"\";s:14:\"seoDescription\";s:0:\"\";s:8:\"bodyText\";s:18:\"<p>french text</p>\";}s:10:\"\0*\0changed\";a:1:{s:11:\"seoKeywords\";s:11:\"seoKeywords\";}s:9:\"\0*\0loaded\";b:1;s:8:\"\0*\0saved\";b:0;s:10:\"\0*\0sorting\";a:1:{s:2:\"id\";s:3:\"asc\";}}','2009-05-02 17:01:34'),(33,1,'page_definition',5,'update','O:21:\"Page_definition_Model\":6:{s:14:\"\0*\0object_name\";s:15:\"page_definition\";s:9:\"\0*\0object\";a:8:{s:2:\"id\";i:5;s:7:\"page_id\";i:1;s:11:\"language_id\";i:1;s:5:\"title\";s:6:\"french\";s:8:\"seoTitle\";N;s:11:\"seoKeywords\";s:0:\"\";s:14:\"seoDescription\";s:0:\"\";s:8:\"bodyText\";s:18:\"<p>french text</p>\";}s:10:\"\0*\0changed\";a:1:{s:14:\"seoDescription\";s:14:\"seoDescription\";}s:9:\"\0*\0loaded\";b:1;s:8:\"\0*\0saved\";b:0;s:10:\"\0*\0sorting\";a:1:{s:2:\"id\";s:3:\"asc\";}}','2009-05-02 17:01:34'),(34,1,'page',1,'update','O:10:\"Page_Model\":6:{s:14:\"\0*\0object_name\";s:4:\"page\";s:9:\"\0*\0object\";a:12:{s:2:\"id\";i:1;s:11:\"template_id\";i:1;s:5:\"title\";s:4:\"Home\";s:9:\"parent_id\";i:0;s:6:\"seoURL\";s:0:\"\";s:7:\"extraJS\";s:0:\"\";s:8:\"extraCSS\";s:0:\"\";s:9:\"status_id\";i:2;s:7:\"form_id\";i:0;s:13:\"display_order\";i:1;s:9:\"navbar_id\";i:1;s:12:\"date_updated\";s:19:\"0000-00-00 00:00:00\";}s:10:\"\0*\0changed\";a:8:{s:11:\"template_id\";s:11:\"template_id\";s:9:\"navbar_id\";s:9:\"navbar_id\";s:9:\"parent_id\";s:9:\"parent_id\";s:6:\"seoURL\";s:6:\"seoURL\";s:7:\"form_id\";s:7:\"form_id\";s:7:\"extraJS\";s:7:\"extraJS\";s:8:\"extraCSS\";s:8:\"extraCSS\";s:9:\"status_id\";s:9:\"status_id\";}s:9:\"\0*\0loaded\";b:1;s:8:\"\0*\0saved\";b:0;s:10:\"\0*\0sorting\";a:1:{s:2:\"id\";s:3:\"asc\";}}','2009-05-02 17:01:34'),(35,1,'page_definition',0,'insert','O:21:\"Page_definition_Model\":6:{s:14:\"\0*\0object_name\";s:15:\"page_definition\";s:9:\"\0*\0object\";a:8:{s:2:\"id\";i:0;s:7:\"page_id\";i:1;s:11:\"language_id\";i:2;s:5:\"title\";N;s:8:\"seoTitle\";N;s:11:\"seoKeywords\";N;s:14:\"seoDescription\";N;s:8:\"bodyText\";N;}s:10:\"\0*\0changed\";a:2:{s:11:\"language_id\";s:11:\"language_id\";s:7:\"page_id\";s:7:\"page_id\";}s:9:\"\0*\0loaded\";b:0;s:8:\"\0*\0saved\";b:0;s:10:\"\0*\0sorting\";a:1:{s:2:\"id\";s:3:\"asc\";}}','2009-05-02 17:03:50'),(36,1,'page_definition',5,'update','O:21:\"Page_definition_Model\":6:{s:14:\"\0*\0object_name\";s:15:\"page_definition\";s:9:\"\0*\0object\";a:8:{s:2:\"id\";i:5;s:7:\"page_id\";i:1;s:11:\"language_id\";i:1;s:5:\"title\";s:6:\"french\";s:8:\"seoTitle\";N;s:11:\"seoKeywords\";s:0:\"\";s:14:\"seoDescription\";s:0:\"\";s:8:\"bodyText\";s:18:\"<p>french text</p>\";}s:10:\"\0*\0changed\";a:1:{s:5:\"title\";s:5:\"title\";}s:9:\"\0*\0loaded\";b:1;s:8:\"\0*\0saved\";b:0;s:10:\"\0*\0sorting\";a:1:{s:2:\"id\";s:3:\"asc\";}}','2009-05-02 17:04:10'),(37,1,'page_definition',5,'update','O:21:\"Page_definition_Model\":6:{s:14:\"\0*\0object_name\";s:15:\"page_definition\";s:9:\"\0*\0object\";a:8:{s:2:\"id\";i:5;s:7:\"page_id\";i:1;s:11:\"language_id\";i:1;s:5:\"title\";s:6:\"french\";s:8:\"seoTitle\";N;s:11:\"seoKeywords\";s:0:\"\";s:14:\"seoDescription\";s:0:\"\";s:8:\"bodyText\";s:18:\"<p>french text</p>\";}s:10:\"\0*\0changed\";a:1:{s:8:\"bodyText\";s:8:\"bodyText\";}s:9:\"\0*\0loaded\";b:1;s:8:\"\0*\0saved\";b:0;s:10:\"\0*\0sorting\";a:1:{s:2:\"id\";s:3:\"asc\";}}','2009-05-02 17:04:10'),(38,1,'page_definition',5,'update','O:21:\"Page_definition_Model\":6:{s:14:\"\0*\0object_name\";s:15:\"page_definition\";s:9:\"\0*\0object\";a:8:{s:2:\"id\";i:5;s:7:\"page_id\";i:1;s:11:\"language_id\";i:1;s:5:\"title\";s:0:\"\";s:8:\"seoTitle\";N;s:11:\"seoKeywords\";s:0:\"\";s:14:\"seoDescription\";s:0:\"\";s:8:\"bodyText\";s:18:\"<p>french text</p>\";}s:10:\"\0*\0changed\";a:1:{s:5:\"title\";s:5:\"title\";}s:9:\"\0*\0loaded\";b:1;s:8:\"\0*\0saved\";b:0;s:10:\"\0*\0sorting\";a:1:{s:2:\"id\";s:3:\"asc\";}}','2009-05-02 17:04:10'),(39,1,'page_definition',5,'update','O:21:\"Page_definition_Model\":6:{s:14:\"\0*\0object_name\";s:15:\"page_definition\";s:9:\"\0*\0object\";a:8:{s:2:\"id\";i:5;s:7:\"page_id\";i:1;s:11:\"language_id\";i:1;s:5:\"title\";s:0:\"\";s:8:\"seoTitle\";N;s:11:\"seoKeywords\";s:0:\"\";s:14:\"seoDescription\";s:0:\"\";s:8:\"bodyText\";s:0:\"\";}s:10:\"\0*\0changed\";a:1:{s:8:\"bodyText\";s:8:\"bodyText\";}s:9:\"\0*\0loaded\";b:1;s:8:\"\0*\0saved\";b:0;s:10:\"\0*\0sorting\";a:1:{s:2:\"id\";s:3:\"asc\";}}','2009-05-02 17:04:10'),(40,1,'page_definition',5,'update','O:21:\"Page_definition_Model\":6:{s:14:\"\0*\0object_name\";s:15:\"page_definition\";s:9:\"\0*\0object\";a:8:{s:2:\"id\";i:5;s:7:\"page_id\";i:1;s:11:\"language_id\";i:1;s:5:\"title\";s:0:\"\";s:8:\"seoTitle\";N;s:11:\"seoKeywords\";s:0:\"\";s:14:\"seoDescription\";s:0:\"\";s:8:\"bodyText\";s:0:\"\";}s:10:\"\0*\0changed\";a:1:{s:11:\"seoKeywords\";s:11:\"seoKeywords\";}s:9:\"\0*\0loaded\";b:1;s:8:\"\0*\0saved\";b:0;s:10:\"\0*\0sorting\";a:1:{s:2:\"id\";s:3:\"asc\";}}','2009-05-02 17:04:10'),(41,1,'page_definition',5,'update','O:21:\"Page_definition_Model\":6:{s:14:\"\0*\0object_name\";s:15:\"page_definition\";s:9:\"\0*\0object\";a:8:{s:2:\"id\";i:5;s:7:\"page_id\";i:1;s:11:\"language_id\";i:1;s:5:\"title\";s:0:\"\";s:8:\"seoTitle\";N;s:11:\"seoKeywords\";s:0:\"\";s:14:\"seoDescription\";s:0:\"\";s:8:\"bodyText\";s:0:\"\";}s:10:\"\0*\0changed\";a:1:{s:14:\"seoDescription\";s:14:\"seoDescription\";}s:9:\"\0*\0loaded\";b:1;s:8:\"\0*\0saved\";b:0;s:10:\"\0*\0sorting\";a:1:{s:2:\"id\";s:3:\"asc\";}}','2009-05-02 17:04:10'),(42,1,'page_definition',5,'update','O:21:\"Page_definition_Model\":6:{s:14:\"\0*\0object_name\";s:15:\"page_definition\";s:9:\"\0*\0object\";a:8:{s:2:\"id\";i:5;s:7:\"page_id\";i:1;s:11:\"language_id\";i:1;s:5:\"title\";s:0:\"\";s:8:\"seoTitle\";N;s:11:\"seoKeywords\";s:0:\"\";s:14:\"seoDescription\";s:0:\"\";s:8:\"bodyText\";s:0:\"\";}s:10:\"\0*\0changed\";a:1:{s:11:\"seoKeywords\";s:11:\"seoKeywords\";}s:9:\"\0*\0loaded\";b:1;s:8:\"\0*\0saved\";b:0;s:10:\"\0*\0sorting\";a:1:{s:2:\"id\";s:3:\"asc\";}}','2009-05-02 17:04:10'),(43,1,'page_definition',5,'update','O:21:\"Page_definition_Model\":6:{s:14:\"\0*\0object_name\";s:15:\"page_definition\";s:9:\"\0*\0object\";a:8:{s:2:\"id\";i:5;s:7:\"page_id\";i:1;s:11:\"language_id\";i:1;s:5:\"title\";s:0:\"\";s:8:\"seoTitle\";N;s:11:\"seoKeywords\";s:0:\"\";s:14:\"seoDescription\";s:0:\"\";s:8:\"bodyText\";s:0:\"\";}s:10:\"\0*\0changed\";a:1:{s:14:\"seoDescription\";s:14:\"seoDescription\";}s:9:\"\0*\0loaded\";b:1;s:8:\"\0*\0saved\";b:0;s:10:\"\0*\0sorting\";a:1:{s:2:\"id\";s:3:\"asc\";}}','2009-05-02 17:04:10'),(44,1,'page',1,'update','O:10:\"Page_Model\":6:{s:14:\"\0*\0object_name\";s:4:\"page\";s:9:\"\0*\0object\";a:12:{s:2:\"id\";i:1;s:11:\"template_id\";i:1;s:5:\"title\";s:4:\"Home\";s:9:\"parent_id\";i:0;s:6:\"seoURL\";s:0:\"\";s:7:\"extraJS\";s:0:\"\";s:8:\"extraCSS\";s:0:\"\";s:9:\"status_id\";i:2;s:7:\"form_id\";i:0;s:13:\"display_order\";i:1;s:9:\"navbar_id\";i:1;s:12:\"date_updated\";s:19:\"0000-00-00 00:00:00\";}s:10:\"\0*\0changed\";a:8:{s:11:\"template_id\";s:11:\"template_id\";s:9:\"navbar_id\";s:9:\"navbar_id\";s:9:\"parent_id\";s:9:\"parent_id\";s:6:\"seoURL\";s:6:\"seoURL\";s:7:\"form_id\";s:7:\"form_id\";s:7:\"extraJS\";s:7:\"extraJS\";s:8:\"extraCSS\";s:8:\"extraCSS\";s:9:\"status_id\";s:9:\"status_id\";}s:9:\"\0*\0loaded\";b:1;s:8:\"\0*\0saved\";b:0;s:10:\"\0*\0sorting\";a:1:{s:2:\"id\";s:3:\"asc\";}}','2009-05-02 17:04:10'),(45,1,'page_definition',5,'update','O:21:\"Page_definition_Model\":6:{s:14:\"\0*\0object_name\";s:15:\"page_definition\";s:9:\"\0*\0object\";a:8:{s:2:\"id\";i:5;s:7:\"page_id\";i:1;s:11:\"language_id\";i:1;s:5:\"title\";s:13:\"English Title\";s:8:\"seoTitle\";N;s:11:\"seoKeywords\";s:0:\"\";s:14:\"seoDescription\";s:0:\"\";s:8:\"bodyText\";s:0:\"\";}s:10:\"\0*\0changed\";a:1:{s:5:\"title\";s:5:\"title\";}s:9:\"\0*\0loaded\";b:1;s:8:\"\0*\0saved\";b:0;s:10:\"\0*\0sorting\";a:1:{s:2:\"id\";s:3:\"asc\";}}','2009-05-02 17:04:45'),(46,1,'page_definition',5,'update','O:21:\"Page_definition_Model\":6:{s:14:\"\0*\0object_name\";s:15:\"page_definition\";s:9:\"\0*\0object\";a:8:{s:2:\"id\";i:5;s:7:\"page_id\";i:1;s:11:\"language_id\";i:1;s:5:\"title\";s:13:\"English Title\";s:8:\"seoTitle\";N;s:11:\"seoKeywords\";s:0:\"\";s:14:\"seoDescription\";s:0:\"\";s:8:\"bodyText\";s:19:\"<p>English Text</p>\";}s:10:\"\0*\0changed\";a:1:{s:8:\"bodyText\";s:8:\"bodyText\";}s:9:\"\0*\0loaded\";b:1;s:8:\"\0*\0saved\";b:0;s:10:\"\0*\0sorting\";a:1:{s:2:\"id\";s:3:\"asc\";}}','2009-05-02 17:04:45'),(47,1,'page_definition',5,'update','O:21:\"Page_definition_Model\":6:{s:14:\"\0*\0object_name\";s:15:\"page_definition\";s:9:\"\0*\0object\";a:8:{s:2:\"id\";i:5;s:7:\"page_id\";i:1;s:11:\"language_id\";i:1;s:5:\"title\";s:6:\"French\";s:8:\"seoTitle\";N;s:11:\"seoKeywords\";s:0:\"\";s:14:\"seoDescription\";s:0:\"\";s:8:\"bodyText\";s:19:\"<p>English Text</p>\";}s:10:\"\0*\0changed\";a:1:{s:5:\"title\";s:5:\"title\";}s:9:\"\0*\0loaded\";b:1;s:8:\"\0*\0saved\";b:0;s:10:\"\0*\0sorting\";a:1:{s:2:\"id\";s:3:\"asc\";}}','2009-05-02 17:04:45'),(48,1,'page_definition',5,'update','O:21:\"Page_definition_Model\":6:{s:14:\"\0*\0object_name\";s:15:\"page_definition\";s:9:\"\0*\0object\";a:8:{s:2:\"id\";i:5;s:7:\"page_id\";i:1;s:11:\"language_id\";i:1;s:5:\"title\";s:6:\"French\";s:8:\"seoTitle\";N;s:11:\"seoKeywords\";s:0:\"\";s:14:\"seoDescription\";s:0:\"\";s:8:\"bodyText\";s:18:\"<p>French text</p>\";}s:10:\"\0*\0changed\";a:1:{s:8:\"bodyText\";s:8:\"bodyText\";}s:9:\"\0*\0loaded\";b:1;s:8:\"\0*\0saved\";b:0;s:10:\"\0*\0sorting\";a:1:{s:2:\"id\";s:3:\"asc\";}}','2009-05-02 17:04:45'),(49,1,'page_definition',5,'update','O:21:\"Page_definition_Model\":6:{s:14:\"\0*\0object_name\";s:15:\"page_definition\";s:9:\"\0*\0object\";a:8:{s:2:\"id\";i:5;s:7:\"page_id\";i:1;s:11:\"language_id\";i:1;s:5:\"title\";s:6:\"French\";s:8:\"seoTitle\";N;s:11:\"seoKeywords\";s:0:\"\";s:14:\"seoDescription\";s:0:\"\";s:8:\"bodyText\";s:18:\"<p>French text</p>\";}s:10:\"\0*\0changed\";a:1:{s:11:\"seoKeywords\";s:11:\"seoKeywords\";}s:9:\"\0*\0loaded\";b:1;s:8:\"\0*\0saved\";b:0;s:10:\"\0*\0sorting\";a:1:{s:2:\"id\";s:3:\"asc\";}}','2009-05-02 17:04:45'),(50,1,'page_definition',5,'update','O:21:\"Page_definition_Model\":6:{s:14:\"\0*\0object_name\";s:15:\"page_definition\";s:9:\"\0*\0object\";a:8:{s:2:\"id\";i:5;s:7:\"page_id\";i:1;s:11:\"language_id\";i:1;s:5:\"title\";s:6:\"French\";s:8:\"seoTitle\";N;s:11:\"seoKeywords\";s:0:\"\";s:14:\"seoDescription\";s:0:\"\";s:8:\"bodyText\";s:18:\"<p>French text</p>\";}s:10:\"\0*\0changed\";a:1:{s:14:\"seoDescription\";s:14:\"seoDescription\";}s:9:\"\0*\0loaded\";b:1;s:8:\"\0*\0saved\";b:0;s:10:\"\0*\0sorting\";a:1:{s:2:\"id\";s:3:\"asc\";}}','2009-05-02 17:04:45'),(51,1,'page_definition',5,'update','O:21:\"Page_definition_Model\":6:{s:14:\"\0*\0object_name\";s:15:\"page_definition\";s:9:\"\0*\0object\";a:8:{s:2:\"id\";i:5;s:7:\"page_id\";i:1;s:11:\"language_id\";i:1;s:5:\"title\";s:6:\"French\";s:8:\"seoTitle\";N;s:11:\"seoKeywords\";s:0:\"\";s:14:\"seoDescription\";s:0:\"\";s:8:\"bodyText\";s:18:\"<p>French text</p>\";}s:10:\"\0*\0changed\";a:1:{s:11:\"seoKeywords\";s:11:\"seoKeywords\";}s:9:\"\0*\0loaded\";b:1;s:8:\"\0*\0saved\";b:0;s:10:\"\0*\0sorting\";a:1:{s:2:\"id\";s:3:\"asc\";}}','2009-05-02 17:04:45'),(52,1,'page_definition',5,'update','O:21:\"Page_definition_Model\":6:{s:14:\"\0*\0object_name\";s:15:\"page_definition\";s:9:\"\0*\0object\";a:8:{s:2:\"id\";i:5;s:7:\"page_id\";i:1;s:11:\"language_id\";i:1;s:5:\"title\";s:6:\"French\";s:8:\"seoTitle\";N;s:11:\"seoKeywords\";s:0:\"\";s:14:\"seoDescription\";s:0:\"\";s:8:\"bodyText\";s:18:\"<p>French text</p>\";}s:10:\"\0*\0changed\";a:1:{s:14:\"seoDescription\";s:14:\"seoDescription\";}s:9:\"\0*\0loaded\";b:1;s:8:\"\0*\0saved\";b:0;s:10:\"\0*\0sorting\";a:1:{s:2:\"id\";s:3:\"asc\";}}','2009-05-02 17:04:45'),(53,1,'page',1,'update','O:10:\"Page_Model\":6:{s:14:\"\0*\0object_name\";s:4:\"page\";s:9:\"\0*\0object\";a:12:{s:2:\"id\";i:1;s:11:\"template_id\";i:1;s:5:\"title\";s:4:\"Home\";s:9:\"parent_id\";i:0;s:6:\"seoURL\";s:0:\"\";s:7:\"extraJS\";s:0:\"\";s:8:\"extraCSS\";s:0:\"\";s:9:\"status_id\";i:2;s:7:\"form_id\";i:0;s:13:\"display_order\";i:1;s:9:\"navbar_id\";i:1;s:12:\"date_updated\";s:19:\"0000-00-00 00:00:00\";}s:10:\"\0*\0changed\";a:8:{s:11:\"template_id\";s:11:\"template_id\";s:9:\"navbar_id\";s:9:\"navbar_id\";s:9:\"parent_id\";s:9:\"parent_id\";s:6:\"seoURL\";s:6:\"seoURL\";s:7:\"form_id\";s:7:\"form_id\";s:7:\"extraJS\";s:7:\"extraJS\";s:8:\"extraCSS\";s:8:\"extraCSS\";s:9:\"status_id\";s:9:\"status_id\";}s:9:\"\0*\0loaded\";b:1;s:8:\"\0*\0saved\";b:0;s:10:\"\0*\0sorting\";a:1:{s:2:\"id\";s:3:\"asc\";}}','2009-05-02 17:04:45'),(54,1,'page_definition',5,'update','O:21:\"Page_definition_Model\":6:{s:14:\"\0*\0object_name\";s:15:\"page_definition\";s:9:\"\0*\0object\";a:8:{s:2:\"id\";i:5;s:7:\"page_id\";i:1;s:11:\"language_id\";i:1;s:5:\"title\";s:4:\"Engl\";s:8:\"seoTitle\";N;s:11:\"seoKeywords\";s:0:\"\";s:14:\"seoDescription\";s:0:\"\";s:8:\"bodyText\";s:18:\"<p>French text</p>\";}s:10:\"\0*\0changed\";a:1:{s:5:\"title\";s:5:\"title\";}s:9:\"\0*\0loaded\";b:1;s:8:\"\0*\0saved\";b:0;s:10:\"\0*\0sorting\";a:1:{s:2:\"id\";s:3:\"asc\";}}','2009-05-02 17:08:44'),(55,1,'page_definition',5,'update','O:21:\"Page_definition_Model\":6:{s:14:\"\0*\0object_name\";s:15:\"page_definition\";s:9:\"\0*\0object\";a:8:{s:2:\"id\";i:5;s:7:\"page_id\";i:1;s:11:\"language_id\";i:1;s:5:\"title\";s:4:\"Engl\";s:8:\"seoTitle\";N;s:11:\"seoKeywords\";s:0:\"\";s:14:\"seoDescription\";s:0:\"\";s:8:\"bodyText\";s:14:\"<p>English</p>\";}s:10:\"\0*\0changed\";a:1:{s:8:\"bodyText\";s:8:\"bodyText\";}s:9:\"\0*\0loaded\";b:1;s:8:\"\0*\0saved\";b:0;s:10:\"\0*\0sorting\";a:1:{s:2:\"id\";s:3:\"asc\";}}','2009-05-02 17:08:44'),(56,1,'page_definition',6,'update','O:21:\"Page_definition_Model\":6:{s:14:\"\0*\0object_name\";s:15:\"page_definition\";s:9:\"\0*\0object\";a:8:{s:2:\"id\";i:6;s:7:\"page_id\";i:1;s:11:\"language_id\";i:2;s:5:\"title\";s:6:\"French\";s:8:\"seoTitle\";N;s:11:\"seoKeywords\";N;s:14:\"seoDescription\";N;s:8:\"bodyText\";N;}s:10:\"\0*\0changed\";a:1:{s:5:\"title\";s:5:\"title\";}s:9:\"\0*\0loaded\";b:1;s:8:\"\0*\0saved\";b:0;s:10:\"\0*\0sorting\";a:1:{s:2:\"id\";s:3:\"asc\";}}','2009-05-02 17:08:44'),(57,1,'page_definition',6,'update','O:21:\"Page_definition_Model\":6:{s:14:\"\0*\0object_name\";s:15:\"page_definition\";s:9:\"\0*\0object\";a:8:{s:2:\"id\";i:6;s:7:\"page_id\";i:1;s:11:\"language_id\";i:2;s:5:\"title\";s:6:\"French\";s:8:\"seoTitle\";N;s:11:\"seoKeywords\";N;s:14:\"seoDescription\";N;s:8:\"bodyText\";s:13:\"<p>French</p>\";}s:10:\"\0*\0changed\";a:1:{s:8:\"bodyText\";s:8:\"bodyText\";}s:9:\"\0*\0loaded\";b:1;s:8:\"\0*\0saved\";b:0;s:10:\"\0*\0sorting\";a:1:{s:2:\"id\";s:3:\"asc\";}}','2009-05-02 17:08:44'),(58,1,'page_definition',5,'update','O:21:\"Page_definition_Model\":6:{s:14:\"\0*\0object_name\";s:15:\"page_definition\";s:9:\"\0*\0object\";a:8:{s:2:\"id\";i:5;s:7:\"page_id\";i:1;s:11:\"language_id\";i:1;s:5:\"title\";s:4:\"Engl\";s:8:\"seoTitle\";N;s:11:\"seoKeywords\";s:0:\"\";s:14:\"seoDescription\";s:0:\"\";s:8:\"bodyText\";s:14:\"<p>English</p>\";}s:10:\"\0*\0changed\";a:1:{s:11:\"seoKeywords\";s:11:\"seoKeywords\";}s:9:\"\0*\0loaded\";b:1;s:8:\"\0*\0saved\";b:0;s:10:\"\0*\0sorting\";a:1:{s:2:\"id\";s:3:\"asc\";}}','2009-05-02 17:08:44'),(59,1,'page_definition',5,'update','O:21:\"Page_definition_Model\":6:{s:14:\"\0*\0object_name\";s:15:\"page_definition\";s:9:\"\0*\0object\";a:8:{s:2:\"id\";i:5;s:7:\"page_id\";i:1;s:11:\"language_id\";i:1;s:5:\"title\";s:4:\"Engl\";s:8:\"seoTitle\";N;s:11:\"seoKeywords\";s:0:\"\";s:14:\"seoDescription\";s:0:\"\";s:8:\"bodyText\";s:14:\"<p>English</p>\";}s:10:\"\0*\0changed\";a:1:{s:14:\"seoDescription\";s:14:\"seoDescription\";}s:9:\"\0*\0loaded\";b:1;s:8:\"\0*\0saved\";b:0;s:10:\"\0*\0sorting\";a:1:{s:2:\"id\";s:3:\"asc\";}}','2009-05-02 17:08:44'),(60,1,'page_definition',6,'update','O:21:\"Page_definition_Model\":6:{s:14:\"\0*\0object_name\";s:15:\"page_definition\";s:9:\"\0*\0object\";a:8:{s:2:\"id\";i:6;s:7:\"page_id\";i:1;s:11:\"language_id\";i:2;s:5:\"title\";s:6:\"French\";s:8:\"seoTitle\";N;s:11:\"seoKeywords\";s:0:\"\";s:14:\"seoDescription\";N;s:8:\"bodyText\";s:13:\"<p>French</p>\";}s:10:\"\0*\0changed\";a:1:{s:11:\"seoKeywords\";s:11:\"seoKeywords\";}s:9:\"\0*\0loaded\";b:1;s:8:\"\0*\0saved\";b:0;s:10:\"\0*\0sorting\";a:1:{s:2:\"id\";s:3:\"asc\";}}','2009-05-02 17:08:44'),(61,1,'page_definition',6,'update','O:21:\"Page_definition_Model\":6:{s:14:\"\0*\0object_name\";s:15:\"page_definition\";s:9:\"\0*\0object\";a:8:{s:2:\"id\";i:6;s:7:\"page_id\";i:1;s:11:\"language_id\";i:2;s:5:\"title\";s:6:\"French\";s:8:\"seoTitle\";N;s:11:\"seoKeywords\";s:0:\"\";s:14:\"seoDescription\";s:0:\"\";s:8:\"bodyText\";s:13:\"<p>French</p>\";}s:10:\"\0*\0changed\";a:1:{s:14:\"seoDescription\";s:14:\"seoDescription\";}s:9:\"\0*\0loaded\";b:1;s:8:\"\0*\0saved\";b:0;s:10:\"\0*\0sorting\";a:1:{s:2:\"id\";s:3:\"asc\";}}','2009-05-02 17:08:44'),(62,1,'page',1,'update','O:10:\"Page_Model\":6:{s:14:\"\0*\0object_name\";s:4:\"page\";s:9:\"\0*\0object\";a:12:{s:2:\"id\";i:1;s:11:\"template_id\";i:1;s:5:\"title\";s:4:\"Home\";s:9:\"parent_id\";i:0;s:6:\"seoURL\";s:0:\"\";s:7:\"extraJS\";s:0:\"\";s:8:\"extraCSS\";s:0:\"\";s:9:\"status_id\";i:2;s:7:\"form_id\";i:0;s:13:\"display_order\";i:1;s:9:\"navbar_id\";i:1;s:12:\"date_updated\";s:19:\"0000-00-00 00:00:00\";}s:10:\"\0*\0changed\";a:8:{s:11:\"template_id\";s:11:\"template_id\";s:9:\"navbar_id\";s:9:\"navbar_id\";s:9:\"parent_id\";s:9:\"parent_id\";s:6:\"seoURL\";s:6:\"seoURL\";s:7:\"form_id\";s:7:\"form_id\";s:7:\"extraJS\";s:7:\"extraJS\";s:8:\"extraCSS\";s:8:\"extraCSS\";s:9:\"status_id\";s:9:\"status_id\";}s:9:\"\0*\0loaded\";b:1;s:8:\"\0*\0saved\";b:0;s:10:\"\0*\0sorting\";a:1:{s:2:\"id\";s:3:\"asc\";}}','2009-05-02 17:08:44'),(63,1,'page_definition',5,'update','O:21:\"Page_definition_Model\":6:{s:14:\"\0*\0object_name\";s:15:\"page_definition\";s:9:\"\0*\0object\";a:8:{s:2:\"id\";i:5;s:7:\"page_id\";i:1;s:11:\"language_id\";i:1;s:5:\"title\";s:4:\"Home\";s:8:\"seoTitle\";N;s:11:\"seoKeywords\";s:0:\"\";s:14:\"seoDescription\";s:0:\"\";s:8:\"bodyText\";s:14:\"<p>English</p>\";}s:10:\"\0*\0changed\";a:1:{s:5:\"title\";s:5:\"title\";}s:9:\"\0*\0loaded\";b:1;s:8:\"\0*\0saved\";b:0;s:10:\"\0*\0sorting\";a:1:{s:2:\"id\";s:3:\"asc\";}}','2009-05-02 17:09:54'),(64,1,'page_definition',5,'update','O:21:\"Page_definition_Model\":6:{s:14:\"\0*\0object_name\";s:15:\"page_definition\";s:9:\"\0*\0object\";a:8:{s:2:\"id\";i:5;s:7:\"page_id\";i:1;s:11:\"language_id\";i:1;s:5:\"title\";s:4:\"Home\";s:8:\"seoTitle\";N;s:11:\"seoKeywords\";s:0:\"\";s:14:\"seoDescription\";s:0:\"\";s:8:\"bodyText\";s:26:\"<p>But yes, it\'s true!</p>\";}s:10:\"\0*\0changed\";a:1:{s:8:\"bodyText\";s:8:\"bodyText\";}s:9:\"\0*\0loaded\";b:1;s:8:\"\0*\0saved\";b:0;s:10:\"\0*\0sorting\";a:1:{s:2:\"id\";s:3:\"asc\";}}','2009-05-02 17:09:54'),(65,1,'page_definition',6,'update','O:21:\"Page_definition_Model\":6:{s:14:\"\0*\0object_name\";s:15:\"page_definition\";s:9:\"\0*\0object\";a:8:{s:2:\"id\";i:6;s:7:\"page_id\";i:1;s:11:\"language_id\";i:2;s:5:\"title\";s:7:\"Bonjour\";s:8:\"seoTitle\";N;s:11:\"seoKeywords\";s:0:\"\";s:14:\"seoDescription\";s:0:\"\";s:8:\"bodyText\";s:13:\"<p>French</p>\";}s:10:\"\0*\0changed\";a:1:{s:5:\"title\";s:5:\"title\";}s:9:\"\0*\0loaded\";b:1;s:8:\"\0*\0saved\";b:0;s:10:\"\0*\0sorting\";a:1:{s:2:\"id\";s:3:\"asc\";}}','2009-05-02 17:09:54'),(66,1,'page_definition',6,'update','O:21:\"Page_definition_Model\":6:{s:14:\"\0*\0object_name\";s:15:\"page_definition\";s:9:\"\0*\0object\";a:8:{s:2:\"id\";i:6;s:7:\"page_id\";i:1;s:11:\"language_id\";i:2;s:5:\"title\";s:7:\"Bonjour\";s:8:\"seoTitle\";N;s:11:\"seoKeywords\";s:0:\"\";s:14:\"seoDescription\";s:0:\"\";s:8:\"bodyText\";s:27:\"<p>Mais oui, c\'est vrai</p>\";}s:10:\"\0*\0changed\";a:1:{s:8:\"bodyText\";s:8:\"bodyText\";}s:9:\"\0*\0loaded\";b:1;s:8:\"\0*\0saved\";b:0;s:10:\"\0*\0sorting\";a:1:{s:2:\"id\";s:3:\"asc\";}}','2009-05-02 17:09:54'),(67,1,'page_definition',5,'update','O:21:\"Page_definition_Model\":6:{s:14:\"\0*\0object_name\";s:15:\"page_definition\";s:9:\"\0*\0object\";a:8:{s:2:\"id\";i:5;s:7:\"page_id\";i:1;s:11:\"language_id\";i:1;s:5:\"title\";s:4:\"Home\";s:8:\"seoTitle\";N;s:11:\"seoKeywords\";s:0:\"\";s:14:\"seoDescription\";s:0:\"\";s:8:\"bodyText\";s:26:\"<p>But yes, it\'s true!</p>\";}s:10:\"\0*\0changed\";a:1:{s:11:\"seoKeywords\";s:11:\"seoKeywords\";}s:9:\"\0*\0loaded\";b:1;s:8:\"\0*\0saved\";b:0;s:10:\"\0*\0sorting\";a:1:{s:2:\"id\";s:3:\"asc\";}}','2009-05-02 17:09:54'),(68,1,'page_definition',5,'update','O:21:\"Page_definition_Model\":6:{s:14:\"\0*\0object_name\";s:15:\"page_definition\";s:9:\"\0*\0object\";a:8:{s:2:\"id\";i:5;s:7:\"page_id\";i:1;s:11:\"language_id\";i:1;s:5:\"title\";s:4:\"Home\";s:8:\"seoTitle\";N;s:11:\"seoKeywords\";s:0:\"\";s:14:\"seoDescription\";s:0:\"\";s:8:\"bodyText\";s:26:\"<p>But yes, it\'s true!</p>\";}s:10:\"\0*\0changed\";a:1:{s:14:\"seoDescription\";s:14:\"seoDescription\";}s:9:\"\0*\0loaded\";b:1;s:8:\"\0*\0saved\";b:0;s:10:\"\0*\0sorting\";a:1:{s:2:\"id\";s:3:\"asc\";}}','2009-05-02 17:09:54'),(69,1,'page_definition',6,'update','O:21:\"Page_definition_Model\":6:{s:14:\"\0*\0object_name\";s:15:\"page_definition\";s:9:\"\0*\0object\";a:8:{s:2:\"id\";i:6;s:7:\"page_id\";i:1;s:11:\"language_id\";i:2;s:5:\"title\";s:7:\"Bonjour\";s:8:\"seoTitle\";N;s:11:\"seoKeywords\";s:0:\"\";s:14:\"seoDescription\";s:0:\"\";s:8:\"bodyText\";s:27:\"<p>Mais oui, c\'est vrai</p>\";}s:10:\"\0*\0changed\";a:1:{s:11:\"seoKeywords\";s:11:\"seoKeywords\";}s:9:\"\0*\0loaded\";b:1;s:8:\"\0*\0saved\";b:0;s:10:\"\0*\0sorting\";a:1:{s:2:\"id\";s:3:\"asc\";}}','2009-05-02 17:09:54'),(70,1,'page_definition',6,'update','O:21:\"Page_definition_Model\":6:{s:14:\"\0*\0object_name\";s:15:\"page_definition\";s:9:\"\0*\0object\";a:8:{s:2:\"id\";i:6;s:7:\"page_id\";i:1;s:11:\"language_id\";i:2;s:5:\"title\";s:7:\"Bonjour\";s:8:\"seoTitle\";N;s:11:\"seoKeywords\";s:0:\"\";s:14:\"seoDescription\";s:0:\"\";s:8:\"bodyText\";s:27:\"<p>Mais oui, c\'est vrai</p>\";}s:10:\"\0*\0changed\";a:1:{s:14:\"seoDescription\";s:14:\"seoDescription\";}s:9:\"\0*\0loaded\";b:1;s:8:\"\0*\0saved\";b:0;s:10:\"\0*\0sorting\";a:1:{s:2:\"id\";s:3:\"asc\";}}','2009-05-02 17:09:54'),(71,1,'page',1,'update','O:10:\"Page_Model\":6:{s:14:\"\0*\0object_name\";s:4:\"page\";s:9:\"\0*\0object\";a:12:{s:2:\"id\";i:1;s:11:\"template_id\";i:1;s:5:\"title\";s:4:\"Home\";s:9:\"parent_id\";i:0;s:6:\"seoURL\";s:0:\"\";s:7:\"extraJS\";s:0:\"\";s:8:\"extraCSS\";s:0:\"\";s:9:\"status_id\";i:2;s:7:\"form_id\";i:0;s:13:\"display_order\";i:1;s:9:\"navbar_id\";i:1;s:12:\"date_updated\";s:19:\"0000-00-00 00:00:00\";}s:10:\"\0*\0changed\";a:8:{s:11:\"template_id\";s:11:\"template_id\";s:9:\"navbar_id\";s:9:\"navbar_id\";s:9:\"parent_id\";s:9:\"parent_id\";s:6:\"seoURL\";s:6:\"seoURL\";s:7:\"form_id\";s:7:\"form_id\";s:7:\"extraJS\";s:7:\"extraJS\";s:8:\"extraCSS\";s:8:\"extraCSS\";s:9:\"status_id\";s:9:\"status_id\";}s:9:\"\0*\0loaded\";b:1;s:8:\"\0*\0saved\";b:0;s:10:\"\0*\0sorting\";a:1:{s:2:\"id\";s:3:\"asc\";}}','2009-05-02 17:09:54'),(72,1,'page',0,'insert','O:10:\"Page_Model\":6:{s:14:\"\0*\0object_name\";s:4:\"page\";s:9:\"\0*\0object\";a:12:{s:2:\"id\";i:0;s:11:\"template_id\";i:1;s:5:\"title\";s:4:\"Test\";s:9:\"parent_id\";i:0;s:6:\"seoURL\";s:4:\"test\";s:7:\"extraJS\";N;s:8:\"extraCSS\";N;s:9:\"status_id\";i:0;s:7:\"form_id\";i:0;s:13:\"display_order\";N;s:9:\"navbar_id\";N;s:12:\"date_updated\";s:0:\"\";}s:10:\"\0*\0changed\";a:4:{s:5:\"title\";s:5:\"title\";s:6:\"seoURL\";s:6:\"seoURL\";s:9:\"parent_id\";s:9:\"parent_id\";s:11:\"template_id\";s:11:\"template_id\";}s:9:\"\0*\0loaded\";b:0;s:8:\"\0*\0saved\";b:0;s:10:\"\0*\0sorting\";a:1:{s:2:\"id\";s:3:\"asc\";}}','2009-05-02 17:15:12'),(73,1,'page_definition',0,'insert','O:21:\"Page_definition_Model\":6:{s:14:\"\0*\0object_name\";s:15:\"page_definition\";s:9:\"\0*\0object\";a:8:{s:2:\"id\";i:0;s:7:\"page_id\";i:2;s:11:\"language_id\";i:1;s:5:\"title\";N;s:8:\"seoTitle\";N;s:11:\"seoKeywords\";N;s:14:\"seoDescription\";N;s:8:\"bodyText\";N;}s:10:\"\0*\0changed\";a:2:{s:11:\"language_id\";s:11:\"language_id\";s:7:\"page_id\";s:7:\"page_id\";}s:9:\"\0*\0loaded\";b:0;s:8:\"\0*\0saved\";b:0;s:10:\"\0*\0sorting\";a:1:{s:2:\"id\";s:3:\"asc\";}}','2009-05-02 17:15:49'),(74,1,'page_definition',0,'insert','O:21:\"Page_definition_Model\":6:{s:14:\"\0*\0object_name\";s:15:\"page_definition\";s:9:\"\0*\0object\";a:8:{s:2:\"id\";i:0;s:7:\"page_id\";i:2;s:11:\"language_id\";i:2;s:5:\"title\";N;s:8:\"seoTitle\";N;s:11:\"seoKeywords\";N;s:14:\"seoDescription\";N;s:8:\"bodyText\";N;}s:10:\"\0*\0changed\";a:2:{s:11:\"language_id\";s:11:\"language_id\";s:7:\"page_id\";s:7:\"page_id\";}s:9:\"\0*\0loaded\";b:0;s:8:\"\0*\0saved\";b:0;s:10:\"\0*\0sorting\";a:1:{s:2:\"id\";s:3:\"asc\";}}','2009-05-02 17:15:49'),(75,1,'page_definition',7,'update','O:21:\"Page_definition_Model\":6:{s:14:\"\0*\0object_name\";s:15:\"page_definition\";s:9:\"\0*\0object\";a:8:{s:2:\"id\";i:7;s:7:\"page_id\";i:2;s:11:\"language_id\";i:1;s:5:\"title\";s:5:\"Hello\";s:8:\"seoTitle\";N;s:11:\"seoKeywords\";N;s:14:\"seoDescription\";N;s:8:\"bodyText\";N;}s:10:\"\0*\0changed\";a:1:{s:5:\"title\";s:5:\"title\";}s:9:\"\0*\0loaded\";b:1;s:8:\"\0*\0saved\";b:0;s:10:\"\0*\0sorting\";a:1:{s:2:\"id\";s:3:\"asc\";}}','2009-05-02 17:15:49'),(76,1,'page_definition',7,'update','O:21:\"Page_definition_Model\":6:{s:14:\"\0*\0object_name\";s:15:\"page_definition\";s:9:\"\0*\0object\";a:8:{s:2:\"id\";i:7;s:7:\"page_id\";i:2;s:11:\"language_id\";i:1;s:5:\"title\";s:5:\"Hello\";s:8:\"seoTitle\";N;s:11:\"seoKeywords\";N;s:14:\"seoDescription\";N;s:8:\"bodyText\";s:25:\"<p>So, this is a test</p>\";}s:10:\"\0*\0changed\";a:1:{s:8:\"bodyText\";s:8:\"bodyText\";}s:9:\"\0*\0loaded\";b:1;s:8:\"\0*\0saved\";b:0;s:10:\"\0*\0sorting\";a:1:{s:2:\"id\";s:3:\"asc\";}}','2009-05-02 17:15:49'),(77,1,'page_definition',8,'update','O:21:\"Page_definition_Model\":6:{s:14:\"\0*\0object_name\";s:15:\"page_definition\";s:9:\"\0*\0object\";a:8:{s:2:\"id\";i:8;s:7:\"page_id\";i:2;s:11:\"language_id\";i:2;s:5:\"title\";s:7:\"Bonjour\";s:8:\"seoTitle\";N;s:11:\"seoKeywords\";N;s:14:\"seoDescription\";N;s:8:\"bodyText\";N;}s:10:\"\0*\0changed\";a:1:{s:5:\"title\";s:5:\"title\";}s:9:\"\0*\0loaded\";b:1;s:8:\"\0*\0saved\";b:0;s:10:\"\0*\0sorting\";a:1:{s:2:\"id\";s:3:\"asc\";}}','2009-05-02 17:15:49'),(78,1,'page_definition',8,'update','O:21:\"Page_definition_Model\":6:{s:14:\"\0*\0object_name\";s:15:\"page_definition\";s:9:\"\0*\0object\";a:8:{s:2:\"id\";i:8;s:7:\"page_id\";i:2;s:11:\"language_id\";i:2;s:5:\"title\";s:7:\"Bonjour\";s:8:\"seoTitle\";N;s:11:\"seoKeywords\";N;s:14:\"seoDescription\";N;s:8:\"bodyText\";s:14:\"<p>fwefwef</p>\";}s:10:\"\0*\0changed\";a:1:{s:8:\"bodyText\";s:8:\"bodyText\";}s:9:\"\0*\0loaded\";b:1;s:8:\"\0*\0saved\";b:0;s:10:\"\0*\0sorting\";a:1:{s:2:\"id\";s:3:\"asc\";}}','2009-05-02 17:15:49'),(79,1,'page_definition',7,'update','O:21:\"Page_definition_Model\":6:{s:14:\"\0*\0object_name\";s:15:\"page_definition\";s:9:\"\0*\0object\";a:8:{s:2:\"id\";i:7;s:7:\"page_id\";i:2;s:11:\"language_id\";i:1;s:5:\"title\";s:5:\"Hello\";s:8:\"seoTitle\";N;s:11:\"seoKeywords\";s:0:\"\";s:14:\"seoDescription\";N;s:8:\"bodyText\";s:25:\"<p>So, this is a test</p>\";}s:10:\"\0*\0changed\";a:1:{s:11:\"seoKeywords\";s:11:\"seoKeywords\";}s:9:\"\0*\0loaded\";b:1;s:8:\"\0*\0saved\";b:0;s:10:\"\0*\0sorting\";a:1:{s:2:\"id\";s:3:\"asc\";}}','2009-05-02 17:15:49'),(80,1,'page_definition',7,'update','O:21:\"Page_definition_Model\":6:{s:14:\"\0*\0object_name\";s:15:\"page_definition\";s:9:\"\0*\0object\";a:8:{s:2:\"id\";i:7;s:7:\"page_id\";i:2;s:11:\"language_id\";i:1;s:5:\"title\";s:5:\"Hello\";s:8:\"seoTitle\";N;s:11:\"seoKeywords\";s:0:\"\";s:14:\"seoDescription\";s:0:\"\";s:8:\"bodyText\";s:25:\"<p>So, this is a test</p>\";}s:10:\"\0*\0changed\";a:1:{s:14:\"seoDescription\";s:14:\"seoDescription\";}s:9:\"\0*\0loaded\";b:1;s:8:\"\0*\0saved\";b:0;s:10:\"\0*\0sorting\";a:1:{s:2:\"id\";s:3:\"asc\";}}','2009-05-02 17:15:49'),(81,1,'page_definition',8,'update','O:21:\"Page_definition_Model\":6:{s:14:\"\0*\0object_name\";s:15:\"page_definition\";s:9:\"\0*\0object\";a:8:{s:2:\"id\";i:8;s:7:\"page_id\";i:2;s:11:\"language_id\";i:2;s:5:\"title\";s:7:\"Bonjour\";s:8:\"seoTitle\";N;s:11:\"seoKeywords\";s:0:\"\";s:14:\"seoDescription\";N;s:8:\"bodyText\";s:14:\"<p>fwefwef</p>\";}s:10:\"\0*\0changed\";a:1:{s:11:\"seoKeywords\";s:11:\"seoKeywords\";}s:9:\"\0*\0loaded\";b:1;s:8:\"\0*\0saved\";b:0;s:10:\"\0*\0sorting\";a:1:{s:2:\"id\";s:3:\"asc\";}}','2009-05-02 17:15:49'),(82,1,'page_definition',8,'update','O:21:\"Page_definition_Model\":6:{s:14:\"\0*\0object_name\";s:15:\"page_definition\";s:9:\"\0*\0object\";a:8:{s:2:\"id\";i:8;s:7:\"page_id\";i:2;s:11:\"language_id\";i:2;s:5:\"title\";s:7:\"Bonjour\";s:8:\"seoTitle\";N;s:11:\"seoKeywords\";s:0:\"\";s:14:\"seoDescription\";s:0:\"\";s:8:\"bodyText\";s:14:\"<p>fwefwef</p>\";}s:10:\"\0*\0changed\";a:1:{s:14:\"seoDescription\";s:14:\"seoDescription\";}s:9:\"\0*\0loaded\";b:1;s:8:\"\0*\0saved\";b:0;s:10:\"\0*\0sorting\";a:1:{s:2:\"id\";s:3:\"asc\";}}','2009-05-02 17:15:49'),(83,1,'page',2,'update','O:10:\"Page_Model\":6:{s:14:\"\0*\0object_name\";s:4:\"page\";s:9:\"\0*\0object\";a:12:{s:2:\"id\";i:2;s:11:\"template_id\";i:1;s:5:\"title\";s:4:\"Test\";s:9:\"parent_id\";i:0;s:6:\"seoURL\";s:4:\"test\";s:7:\"extraJS\";s:0:\"\";s:8:\"extraCSS\";s:0:\"\";s:9:\"status_id\";i:2;s:7:\"form_id\";i:0;s:13:\"display_order\";N;s:9:\"navbar_id\";i:1;s:12:\"date_updated\";s:19:\"0000-00-00 00:00:00\";}s:10:\"\0*\0changed\";a:8:{s:11:\"template_id\";s:11:\"template_id\";s:9:\"navbar_id\";s:9:\"navbar_id\";s:9:\"parent_id\";s:9:\"parent_id\";s:6:\"seoURL\";s:6:\"seoURL\";s:7:\"form_id\";s:7:\"form_id\";s:7:\"extraJS\";s:7:\"extraJS\";s:8:\"extraCSS\";s:8:\"extraCSS\";s:9:\"status_id\";s:9:\"status_id\";}s:9:\"\0*\0loaded\";b:1;s:8:\"\0*\0saved\";b:0;s:10:\"\0*\0sorting\";a:1:{s:2:\"id\";s:3:\"asc\";}}','2009-05-02 17:15:49'),(84,1,'page_definition',7,'update','O:21:\"Page_definition_Model\":6:{s:14:\"\0*\0object_name\";s:15:\"page_definition\";s:9:\"\0*\0object\";a:8:{s:2:\"id\";i:7;s:7:\"page_id\";i:2;s:11:\"language_id\";i:1;s:5:\"title\";s:5:\"Hello\";s:8:\"seoTitle\";N;s:11:\"seoKeywords\";s:0:\"\";s:14:\"seoDescription\";s:0:\"\";s:8:\"bodyText\";s:25:\"<p>So, this is a test</p>\";}s:10:\"\0*\0changed\";a:1:{s:5:\"title\";s:5:\"title\";}s:9:\"\0*\0loaded\";b:1;s:8:\"\0*\0saved\";b:0;s:10:\"\0*\0sorting\";a:1:{s:2:\"id\";s:3:\"asc\";}}','2009-05-02 17:48:37'),(85,1,'page_definition',7,'update','O:21:\"Page_definition_Model\":6:{s:14:\"\0*\0object_name\";s:15:\"page_definition\";s:9:\"\0*\0object\";a:8:{s:2:\"id\";i:7;s:7:\"page_id\";i:2;s:11:\"language_id\";i:1;s:5:\"title\";s:5:\"Hello\";s:8:\"seoTitle\";N;s:11:\"seoKeywords\";s:0:\"\";s:14:\"seoDescription\";s:0:\"\";s:8:\"bodyText\";s:25:\"<p>So, this is a test</p>\";}s:10:\"\0*\0changed\";a:1:{s:8:\"bodyText\";s:8:\"bodyText\";}s:9:\"\0*\0loaded\";b:1;s:8:\"\0*\0saved\";b:0;s:10:\"\0*\0sorting\";a:1:{s:2:\"id\";s:3:\"asc\";}}','2009-05-02 17:48:37'),(86,1,'page_definition',8,'update','O:21:\"Page_definition_Model\":6:{s:14:\"\0*\0object_name\";s:15:\"page_definition\";s:9:\"\0*\0object\";a:8:{s:2:\"id\";i:8;s:7:\"page_id\";i:2;s:11:\"language_id\";i:2;s:5:\"title\";s:7:\"Bonjour\";s:8:\"seoTitle\";N;s:11:\"seoKeywords\";s:0:\"\";s:14:\"seoDescription\";s:0:\"\";s:8:\"bodyText\";s:14:\"<p>fwefwef</p>\";}s:10:\"\0*\0changed\";a:1:{s:5:\"title\";s:5:\"title\";}s:9:\"\0*\0loaded\";b:1;s:8:\"\0*\0saved\";b:0;s:10:\"\0*\0sorting\";a:1:{s:2:\"id\";s:3:\"asc\";}}','2009-05-02 17:48:37'),(87,1,'page_definition',8,'update','O:21:\"Page_definition_Model\":6:{s:14:\"\0*\0object_name\";s:15:\"page_definition\";s:9:\"\0*\0object\";a:8:{s:2:\"id\";i:8;s:7:\"page_id\";i:2;s:11:\"language_id\";i:2;s:5:\"title\";s:7:\"Bonjour\";s:8:\"seoTitle\";N;s:11:\"seoKeywords\";s:0:\"\";s:14:\"seoDescription\";s:0:\"\";s:8:\"bodyText\";s:14:\"<p>fwefwef</p>\";}s:10:\"\0*\0changed\";a:1:{s:8:\"bodyText\";s:8:\"bodyText\";}s:9:\"\0*\0loaded\";b:1;s:8:\"\0*\0saved\";b:0;s:10:\"\0*\0sorting\";a:1:{s:2:\"id\";s:3:\"asc\";}}','2009-05-02 17:48:37'),(88,1,'page_definition',7,'update','O:21:\"Page_definition_Model\":6:{s:14:\"\0*\0object_name\";s:15:\"page_definition\";s:9:\"\0*\0object\";a:8:{s:2:\"id\";i:7;s:7:\"page_id\";i:2;s:11:\"language_id\";i:1;s:5:\"title\";s:5:\"Hello\";s:8:\"seoTitle\";N;s:11:\"seoKeywords\";s:0:\"\";s:14:\"seoDescription\";s:0:\"\";s:8:\"bodyText\";s:25:\"<p>So, this is a test</p>\";}s:10:\"\0*\0changed\";a:1:{s:11:\"seoKeywords\";s:11:\"seoKeywords\";}s:9:\"\0*\0loaded\";b:1;s:8:\"\0*\0saved\";b:0;s:10:\"\0*\0sorting\";a:1:{s:2:\"id\";s:3:\"asc\";}}','2009-05-02 17:48:37'),(89,1,'page_definition',7,'update','O:21:\"Page_definition_Model\":6:{s:14:\"\0*\0object_name\";s:15:\"page_definition\";s:9:\"\0*\0object\";a:8:{s:2:\"id\";i:7;s:7:\"page_id\";i:2;s:11:\"language_id\";i:1;s:5:\"title\";s:5:\"Hello\";s:8:\"seoTitle\";N;s:11:\"seoKeywords\";s:0:\"\";s:14:\"seoDescription\";s:0:\"\";s:8:\"bodyText\";s:25:\"<p>So, this is a test</p>\";}s:10:\"\0*\0changed\";a:1:{s:14:\"seoDescription\";s:14:\"seoDescription\";}s:9:\"\0*\0loaded\";b:1;s:8:\"\0*\0saved\";b:0;s:10:\"\0*\0sorting\";a:1:{s:2:\"id\";s:3:\"asc\";}}','2009-05-02 17:48:37'),(90,1,'page_definition',8,'update','O:21:\"Page_definition_Model\":6:{s:14:\"\0*\0object_name\";s:15:\"page_definition\";s:9:\"\0*\0object\";a:8:{s:2:\"id\";i:8;s:7:\"page_id\";i:2;s:11:\"language_id\";i:2;s:5:\"title\";s:7:\"Bonjour\";s:8:\"seoTitle\";N;s:11:\"seoKeywords\";s:0:\"\";s:14:\"seoDescription\";s:0:\"\";s:8:\"bodyText\";s:14:\"<p>fwefwef</p>\";}s:10:\"\0*\0changed\";a:1:{s:11:\"seoKeywords\";s:11:\"seoKeywords\";}s:9:\"\0*\0loaded\";b:1;s:8:\"\0*\0saved\";b:0;s:10:\"\0*\0sorting\";a:1:{s:2:\"id\";s:3:\"asc\";}}','2009-05-02 17:48:37'),(91,1,'page_definition',8,'update','O:21:\"Page_definition_Model\":6:{s:14:\"\0*\0object_name\";s:15:\"page_definition\";s:9:\"\0*\0object\";a:8:{s:2:\"id\";i:8;s:7:\"page_id\";i:2;s:11:\"language_id\";i:2;s:5:\"title\";s:7:\"Bonjour\";s:8:\"seoTitle\";N;s:11:\"seoKeywords\";s:0:\"\";s:14:\"seoDescription\";s:0:\"\";s:8:\"bodyText\";s:14:\"<p>fwefwef</p>\";}s:10:\"\0*\0changed\";a:1:{s:14:\"seoDescription\";s:14:\"seoDescription\";}s:9:\"\0*\0loaded\";b:1;s:8:\"\0*\0saved\";b:0;s:10:\"\0*\0sorting\";a:1:{s:2:\"id\";s:3:\"asc\";}}','2009-05-02 17:48:37'),(92,1,'page',2,'update','O:10:\"Page_Model\":6:{s:14:\"\0*\0object_name\";s:4:\"page\";s:9:\"\0*\0object\";a:12:{s:2:\"id\";i:2;s:11:\"template_id\";i:1;s:5:\"title\";s:4:\"Test\";s:9:\"parent_id\";i:0;s:6:\"seoURL\";s:4:\"test\";s:7:\"extraJS\";s:0:\"\";s:8:\"extraCSS\";s:0:\"\";s:9:\"status_id\";i:2;s:7:\"form_id\";i:0;s:13:\"display_order\";N;s:9:\"navbar_id\";i:1;s:12:\"date_updated\";s:19:\"2009-05-02 18:15:49\";}s:10:\"\0*\0changed\";a:8:{s:11:\"template_id\";s:11:\"template_id\";s:9:\"navbar_id\";s:9:\"navbar_id\";s:9:\"parent_id\";s:9:\"parent_id\";s:6:\"seoURL\";s:6:\"seoURL\";s:7:\"form_id\";s:7:\"form_id\";s:7:\"extraJS\";s:7:\"extraJS\";s:8:\"extraCSS\";s:8:\"extraCSS\";s:9:\"status_id\";s:9:\"status_id\";}s:9:\"\0*\0loaded\";b:1;s:8:\"\0*\0saved\";b:0;s:10:\"\0*\0sorting\";a:1:{s:2:\"id\";s:3:\"asc\";}}','2009-05-02 17:48:37'),(93,1,'page_definition',5,'update','O:21:\"Page_definition_Model\":6:{s:14:\"\0*\0object_name\";s:15:\"page_definition\";s:9:\"\0*\0object\";a:8:{s:2:\"id\";i:5;s:7:\"page_id\";i:1;s:11:\"language_id\";i:1;s:5:\"title\";s:4:\"Home\";s:8:\"seoTitle\";N;s:11:\"seoKeywords\";s:0:\"\";s:14:\"seoDescription\";s:0:\"\";s:8:\"bodyText\";s:26:\"<p>But yes, it\'s true!</p>\";}s:10:\"\0*\0changed\";a:1:{s:5:\"title\";s:5:\"title\";}s:9:\"\0*\0loaded\";b:1;s:8:\"\0*\0saved\";b:0;s:10:\"\0*\0sorting\";a:1:{s:2:\"id\";s:3:\"asc\";}}','2009-05-02 17:49:49'),(94,1,'page_definition',5,'update','O:21:\"Page_definition_Model\":6:{s:14:\"\0*\0object_name\";s:15:\"page_definition\";s:9:\"\0*\0object\";a:8:{s:2:\"id\";i:5;s:7:\"page_id\";i:1;s:11:\"language_id\";i:1;s:5:\"title\";s:4:\"Home\";s:8:\"seoTitle\";N;s:11:\"seoKeywords\";s:0:\"\";s:14:\"seoDescription\";s:0:\"\";s:8:\"bodyText\";s:26:\"<p>But yes, it\'s true!</p>\";}s:10:\"\0*\0changed\";a:1:{s:8:\"bodyText\";s:8:\"bodyText\";}s:9:\"\0*\0loaded\";b:1;s:8:\"\0*\0saved\";b:0;s:10:\"\0*\0sorting\";a:1:{s:2:\"id\";s:3:\"asc\";}}','2009-05-02 17:49:49'),(95,1,'page_definition',6,'update','O:21:\"Page_definition_Model\":6:{s:14:\"\0*\0object_name\";s:15:\"page_definition\";s:9:\"\0*\0object\";a:8:{s:2:\"id\";i:6;s:7:\"page_id\";i:1;s:11:\"language_id\";i:2;s:5:\"title\";s:9:\"Bienvenue\";s:8:\"seoTitle\";N;s:11:\"seoKeywords\";s:0:\"\";s:14:\"seoDescription\";s:0:\"\";s:8:\"bodyText\";s:27:\"<p>Mais oui, c\'est vrai</p>\";}s:10:\"\0*\0changed\";a:1:{s:5:\"title\";s:5:\"title\";}s:9:\"\0*\0loaded\";b:1;s:8:\"\0*\0saved\";b:0;s:10:\"\0*\0sorting\";a:1:{s:2:\"id\";s:3:\"asc\";}}','2009-05-02 17:49:49'),(96,1,'page_definition',6,'update','O:21:\"Page_definition_Model\":6:{s:14:\"\0*\0object_name\";s:15:\"page_definition\";s:9:\"\0*\0object\";a:8:{s:2:\"id\";i:6;s:7:\"page_id\";i:1;s:11:\"language_id\";i:2;s:5:\"title\";s:9:\"Bienvenue\";s:8:\"seoTitle\";N;s:11:\"seoKeywords\";s:0:\"\";s:14:\"seoDescription\";s:0:\"\";s:8:\"bodyText\";s:27:\"<p>Mais oui, c\'est vrai</p>\";}s:10:\"\0*\0changed\";a:1:{s:8:\"bodyText\";s:8:\"bodyText\";}s:9:\"\0*\0loaded\";b:1;s:8:\"\0*\0saved\";b:0;s:10:\"\0*\0sorting\";a:1:{s:2:\"id\";s:3:\"asc\";}}','2009-05-02 17:49:49'),(97,1,'page_definition',5,'update','O:21:\"Page_definition_Model\":6:{s:14:\"\0*\0object_name\";s:15:\"page_definition\";s:9:\"\0*\0object\";a:8:{s:2:\"id\";i:5;s:7:\"page_id\";i:1;s:11:\"language_id\";i:1;s:5:\"title\";s:4:\"Home\";s:8:\"seoTitle\";N;s:11:\"seoKeywords\";s:0:\"\";s:14:\"seoDescription\";s:0:\"\";s:8:\"bodyText\";s:26:\"<p>But yes, it\'s true!</p>\";}s:10:\"\0*\0changed\";a:1:{s:11:\"seoKeywords\";s:11:\"seoKeywords\";}s:9:\"\0*\0loaded\";b:1;s:8:\"\0*\0saved\";b:0;s:10:\"\0*\0sorting\";a:1:{s:2:\"id\";s:3:\"asc\";}}','2009-05-02 17:49:49'),(98,1,'page_definition',5,'update','O:21:\"Page_definition_Model\":6:{s:14:\"\0*\0object_name\";s:15:\"page_definition\";s:9:\"\0*\0object\";a:8:{s:2:\"id\";i:5;s:7:\"page_id\";i:1;s:11:\"language_id\";i:1;s:5:\"title\";s:4:\"Home\";s:8:\"seoTitle\";N;s:11:\"seoKeywords\";s:0:\"\";s:14:\"seoDescription\";s:0:\"\";s:8:\"bodyText\";s:26:\"<p>But yes, it\'s true!</p>\";}s:10:\"\0*\0changed\";a:1:{s:14:\"seoDescription\";s:14:\"seoDescription\";}s:9:\"\0*\0loaded\";b:1;s:8:\"\0*\0saved\";b:0;s:10:\"\0*\0sorting\";a:1:{s:2:\"id\";s:3:\"asc\";}}','2009-05-02 17:49:49'),(99,1,'page_definition',6,'update','O:21:\"Page_definition_Model\":6:{s:14:\"\0*\0object_name\";s:15:\"page_definition\";s:9:\"\0*\0object\";a:8:{s:2:\"id\";i:6;s:7:\"page_id\";i:1;s:11:\"language_id\";i:2;s:5:\"title\";s:9:\"Bienvenue\";s:8:\"seoTitle\";N;s:11:\"seoKeywords\";s:0:\"\";s:14:\"seoDescription\";s:0:\"\";s:8:\"bodyText\";s:27:\"<p>Mais oui, c\'est vrai</p>\";}s:10:\"\0*\0changed\";a:1:{s:11:\"seoKeywords\";s:11:\"seoKeywords\";}s:9:\"\0*\0loaded\";b:1;s:8:\"\0*\0saved\";b:0;s:10:\"\0*\0sorting\";a:1:{s:2:\"id\";s:3:\"asc\";}}','2009-05-02 17:49:49'),(100,1,'page_definition',6,'update','O:21:\"Page_definition_Model\":6:{s:14:\"\0*\0object_name\";s:15:\"page_definition\";s:9:\"\0*\0object\";a:8:{s:2:\"id\";i:6;s:7:\"page_id\";i:1;s:11:\"language_id\";i:2;s:5:\"title\";s:9:\"Bienvenue\";s:8:\"seoTitle\";N;s:11:\"seoKeywords\";s:0:\"\";s:14:\"seoDescription\";s:0:\"\";s:8:\"bodyText\";s:27:\"<p>Mais oui, c\'est vrai</p>\";}s:10:\"\0*\0changed\";a:1:{s:14:\"seoDescription\";s:14:\"seoDescription\";}s:9:\"\0*\0loaded\";b:1;s:8:\"\0*\0saved\";b:0;s:10:\"\0*\0sorting\";a:1:{s:2:\"id\";s:3:\"asc\";}}','2009-05-02 17:49:49'),(101,1,'page',1,'update','O:10:\"Page_Model\":6:{s:14:\"\0*\0object_name\";s:4:\"page\";s:9:\"\0*\0object\";a:12:{s:2:\"id\";i:1;s:11:\"template_id\";i:1;s:5:\"title\";s:4:\"Home\";s:9:\"parent_id\";i:0;s:6:\"seoURL\";s:0:\"\";s:7:\"extraJS\";s:0:\"\";s:8:\"extraCSS\";s:0:\"\";s:9:\"status_id\";i:2;s:7:\"form_id\";i:0;s:13:\"display_order\";i:1;s:9:\"navbar_id\";i:1;s:12:\"date_updated\";s:19:\"0000-00-00 00:00:00\";}s:10:\"\0*\0changed\";a:8:{s:11:\"template_id\";s:11:\"template_id\";s:9:\"navbar_id\";s:9:\"navbar_id\";s:9:\"parent_id\";s:9:\"parent_id\";s:6:\"seoURL\";s:6:\"seoURL\";s:7:\"form_id\";s:7:\"form_id\";s:7:\"extraJS\";s:7:\"extraJS\";s:8:\"extraCSS\";s:8:\"extraCSS\";s:9:\"status_id\";s:9:\"status_id\";}s:9:\"\0*\0loaded\";b:1;s:8:\"\0*\0saved\";b:0;s:10:\"\0*\0sorting\";a:1:{s:2:\"id\";s:3:\"asc\";}}','2009-05-02 17:49:49'),(102,1,'page',1,'update','O:10:\"Page_Model\":6:{s:14:\"\0*\0object_name\";s:4:\"page\";s:9:\"\0*\0object\";a:12:{s:2:\"id\";i:1;s:11:\"template_id\";i:1;s:5:\"title\";s:4:\"Home\";s:9:\"parent_id\";i:0;s:6:\"seoURL\";s:0:\"\";s:7:\"extraJS\";s:0:\"\";s:8:\"extraCSS\";s:0:\"\";s:9:\"status_id\";i:2;s:7:\"form_id\";i:0;s:13:\"display_order\";i:1;s:9:\"navbar_id\";i:1;s:12:\"date_updated\";s:19:\"0000-00-00 00:00:00\";}s:10:\"\0*\0changed\";a:1:{s:13:\"display_order\";s:13:\"display_order\";}s:9:\"\0*\0loaded\";b:1;s:8:\"\0*\0saved\";b:0;s:10:\"\0*\0sorting\";a:1:{s:2:\"id\";s:3:\"asc\";}}','2009-05-02 17:50:36'),(103,1,'page',2,'update','O:10:\"Page_Model\":6:{s:14:\"\0*\0object_name\";s:4:\"page\";s:9:\"\0*\0object\";a:12:{s:2:\"id\";i:2;s:11:\"template_id\";i:1;s:5:\"title\";s:4:\"Test\";s:9:\"parent_id\";i:0;s:6:\"seoURL\";s:4:\"test\";s:7:\"extraJS\";s:0:\"\";s:8:\"extraCSS\";s:0:\"\";s:9:\"status_id\";i:2;s:7:\"form_id\";i:0;s:13:\"display_order\";i:2;s:9:\"navbar_id\";i:1;s:12:\"date_updated\";s:19:\"2009-05-02 18:15:49\";}s:10:\"\0*\0changed\";a:1:{s:13:\"display_order\";s:13:\"display_order\";}s:9:\"\0*\0loaded\";b:1;s:8:\"\0*\0saved\";b:0;s:10:\"\0*\0sorting\";a:1:{s:2:\"id\";s:3:\"asc\";}}','2009-05-02 17:50:36'),(104,1,'page',2,'update','O:10:\"Page_Model\":6:{s:14:\"\0*\0object_name\";s:4:\"page\";s:9:\"\0*\0object\";a:12:{s:2:\"id\";i:2;s:11:\"template_id\";i:1;s:5:\"title\";s:4:\"Test\";s:9:\"parent_id\";i:0;s:6:\"seoURL\";s:4:\"test\";s:7:\"extraJS\";s:0:\"\";s:8:\"extraCSS\";s:0:\"\";s:9:\"status_id\";i:2;s:7:\"form_id\";i:0;s:13:\"display_order\";i:1;s:9:\"navbar_id\";i:1;s:12:\"date_updated\";s:19:\"2009-05-02 18:50:36\";}s:10:\"\0*\0changed\";a:1:{s:13:\"display_order\";s:13:\"display_order\";}s:9:\"\0*\0loaded\";b:1;s:8:\"\0*\0saved\";b:0;s:10:\"\0*\0sorting\";a:1:{s:2:\"id\";s:3:\"asc\";}}','2009-05-02 17:56:58'),(105,1,'page',1,'update','O:10:\"Page_Model\":6:{s:14:\"\0*\0object_name\";s:4:\"page\";s:9:\"\0*\0object\";a:12:{s:2:\"id\";i:1;s:11:\"template_id\";i:1;s:5:\"title\";s:4:\"Home\";s:9:\"parent_id\";i:0;s:6:\"seoURL\";s:0:\"\";s:7:\"extraJS\";s:0:\"\";s:8:\"extraCSS\";s:0:\"\";s:9:\"status_id\";i:2;s:7:\"form_id\";i:0;s:13:\"display_order\";i:2;s:9:\"navbar_id\";i:1;s:12:\"date_updated\";s:19:\"0000-00-00 00:00:00\";}s:10:\"\0*\0changed\";a:1:{s:13:\"display_order\";s:13:\"display_order\";}s:9:\"\0*\0loaded\";b:1;s:8:\"\0*\0saved\";b:0;s:10:\"\0*\0sorting\";a:1:{s:2:\"id\";s:3:\"asc\";}}','2009-05-02 17:56:58'),(106,1,'page',1,'update','O:10:\"Page_Model\":6:{s:14:\"\0*\0object_name\";s:4:\"page\";s:9:\"\0*\0object\";a:12:{s:2:\"id\";i:1;s:11:\"template_id\";i:1;s:5:\"title\";s:4:\"Home\";s:9:\"parent_id\";i:0;s:6:\"seoURL\";s:0:\"\";s:7:\"extraJS\";s:0:\"\";s:8:\"extraCSS\";s:0:\"\";s:9:\"status_id\";i:2;s:7:\"form_id\";i:0;s:13:\"display_order\";i:1;s:9:\"navbar_id\";i:1;s:12:\"date_updated\";s:19:\"2009-05-02 18:56:58\";}s:10:\"\0*\0changed\";a:1:{s:13:\"display_order\";s:13:\"display_order\";}s:9:\"\0*\0loaded\";b:1;s:8:\"\0*\0saved\";b:0;s:10:\"\0*\0sorting\";a:1:{s:2:\"id\";s:3:\"asc\";}}','2009-05-02 17:57:00'),(107,1,'page',2,'update','O:10:\"Page_Model\":6:{s:14:\"\0*\0object_name\";s:4:\"page\";s:9:\"\0*\0object\";a:12:{s:2:\"id\";i:2;s:11:\"template_id\";i:1;s:5:\"title\";s:4:\"Test\";s:9:\"parent_id\";i:0;s:6:\"seoURL\";s:4:\"test\";s:7:\"extraJS\";s:0:\"\";s:8:\"extraCSS\";s:0:\"\";s:9:\"status_id\";i:2;s:7:\"form_id\";i:0;s:13:\"display_order\";i:2;s:9:\"navbar_id\";i:1;s:12:\"date_updated\";s:19:\"2009-05-02 18:56:58\";}s:10:\"\0*\0changed\";a:1:{s:13:\"display_order\";s:13:\"display_order\";}s:9:\"\0*\0loaded\";b:1;s:8:\"\0*\0saved\";b:0;s:10:\"\0*\0sorting\";a:1:{s:2:\"id\";s:3:\"asc\";}}','2009-05-02 17:57:00'),(108,1,'page',2,'delete','O:10:\"Page_Model\":6:{s:14:\"\0*\0object_name\";s:4:\"page\";s:9:\"\0*\0object\";a:12:{s:2:\"id\";i:2;s:11:\"template_id\";i:1;s:5:\"title\";s:4:\"Test\";s:9:\"parent_id\";i:0;s:6:\"seoURL\";s:4:\"test\";s:7:\"extraJS\";s:0:\"\";s:8:\"extraCSS\";s:0:\"\";s:9:\"status_id\";i:2;s:7:\"form_id\";i:0;s:13:\"display_order\";i:2;s:9:\"navbar_id\";i:1;s:12:\"date_updated\";s:19:\"2009-05-02 18:57:00\";}s:10:\"\0*\0changed\";a:0:{}s:9:\"\0*\0loaded\";b:1;s:8:\"\0*\0saved\";b:1;s:10:\"\0*\0sorting\";a:1:{s:2:\"id\";s:3:\"asc\";}}','2009-05-02 18:20:23'),(109,1,'page',1,'update','O:10:\"Page_Model\":6:{s:14:\"\0*\0object_name\";s:4:\"page\";s:9:\"\0*\0object\";a:12:{s:2:\"id\";i:1;s:11:\"template_id\";i:1;s:5:\"title\";s:4:\"Home\";s:9:\"parent_id\";i:0;s:6:\"seoURL\";s:0:\"\";s:7:\"extraJS\";s:0:\"\";s:8:\"extraCSS\";s:0:\"\";s:9:\"status_id\";i:1;s:7:\"form_id\";i:0;s:13:\"display_order\";i:1;s:9:\"navbar_id\";i:1;s:12:\"date_updated\";s:19:\"2009-05-02 18:57:00\";}s:10:\"\0*\0changed\";a:1:{s:9:\"status_id\";s:9:\"status_id\";}s:9:\"\0*\0loaded\";b:1;s:8:\"\0*\0saved\";b:0;s:10:\"\0*\0sorting\";a:1:{s:2:\"id\";s:3:\"asc\";}}','2009-05-03 15:00:16'),(110,1,'page',1,'update','O:10:\"Page_Model\":6:{s:14:\"\0*\0object_name\";s:4:\"page\";s:9:\"\0*\0object\";a:12:{s:2:\"id\";i:1;s:11:\"template_id\";i:1;s:5:\"title\";s:4:\"Home\";s:9:\"parent_id\";i:0;s:6:\"seoURL\";s:0:\"\";s:7:\"extraJS\";s:0:\"\";s:8:\"extraCSS\";s:0:\"\";s:9:\"status_id\";i:2;s:7:\"form_id\";i:0;s:13:\"display_order\";i:1;s:9:\"navbar_id\";i:1;s:12:\"date_updated\";s:19:\"2009-05-03 16:00:16\";}s:10:\"\0*\0changed\";a:1:{s:9:\"status_id\";s:9:\"status_id\";}s:9:\"\0*\0loaded\";b:1;s:8:\"\0*\0saved\";b:0;s:10:\"\0*\0sorting\";a:1:{s:2:\"id\";s:3:\"asc\";}}','2009-05-03 15:00:25'),(111,1,'page',0,'insert','O:10:\"Page_Model\":6:{s:14:\"\0*\0object_name\";s:4:\"page\";s:9:\"\0*\0object\";a:12:{s:2:\"id\";i:0;s:11:\"template_id\";i:1;s:5:\"title\";s:2:\"fe\";s:9:\"parent_id\";i:0;s:6:\"seoURL\";s:2:\"fe\";s:7:\"extraJS\";N;s:8:\"extraCSS\";N;s:9:\"status_id\";i:0;s:7:\"form_id\";i:0;s:13:\"display_order\";N;s:9:\"navbar_id\";N;s:12:\"date_updated\";s:0:\"\";}s:10:\"\0*\0changed\";a:4:{s:5:\"title\";s:5:\"title\";s:6:\"seoURL\";s:6:\"seoURL\";s:9:\"parent_id\";s:9:\"parent_id\";s:11:\"template_id\";s:11:\"template_id\";}s:9:\"\0*\0loaded\";b:0;s:8:\"\0*\0saved\";b:0;s:10:\"\0*\0sorting\";a:1:{s:2:\"id\";s:3:\"asc\";}}','2009-05-03 16:14:34'),(112,1,'page',0,'insert','O:10:\"Page_Model\":6:{s:14:\"\0*\0object_name\";s:4:\"page\";s:9:\"\0*\0object\";a:12:{s:2:\"id\";i:0;s:11:\"template_id\";i:1;s:5:\"title\";s:2:\"fe\";s:9:\"parent_id\";i:0;s:6:\"seoURL\";s:2:\"fe\";s:7:\"extraJS\";N;s:8:\"extraCSS\";N;s:9:\"status_id\";i:0;s:7:\"form_id\";i:0;s:13:\"display_order\";N;s:9:\"navbar_id\";N;s:12:\"date_updated\";s:0:\"\";}s:10:\"\0*\0changed\";a:4:{s:5:\"title\";s:5:\"title\";s:6:\"seoURL\";s:6:\"seoURL\";s:9:\"parent_id\";s:9:\"parent_id\";s:11:\"template_id\";s:11:\"template_id\";}s:9:\"\0*\0loaded\";b:0;s:8:\"\0*\0saved\";b:0;s:10:\"\0*\0sorting\";a:1:{s:2:\"id\";s:3:\"asc\";}}','2009-05-03 16:14:36'),(113,1,'page',3,'delete','O:10:\"Page_Model\":6:{s:14:\"\0*\0object_name\";s:4:\"page\";s:9:\"\0*\0object\";a:12:{s:2:\"id\";i:3;s:11:\"template_id\";i:1;s:5:\"title\";s:2:\"fe\";s:9:\"parent_id\";i:0;s:6:\"seoURL\";s:2:\"fe\";s:7:\"extraJS\";N;s:8:\"extraCSS\";N;s:9:\"status_id\";i:1;s:7:\"form_id\";i:0;s:13:\"display_order\";N;s:9:\"navbar_id\";N;s:12:\"date_updated\";s:19:\"0000-00-00 00:00:00\";}s:10:\"\0*\0changed\";a:0:{}s:9:\"\0*\0loaded\";b:1;s:8:\"\0*\0saved\";b:1;s:10:\"\0*\0sorting\";a:1:{s:2:\"id\";s:3:\"asc\";}}','2009-05-03 16:14:48'),(114,1,'page',4,'delete','O:10:\"Page_Model\":6:{s:14:\"\0*\0object_name\";s:4:\"page\";s:9:\"\0*\0object\";a:12:{s:2:\"id\";i:4;s:11:\"template_id\";i:1;s:5:\"title\";s:2:\"fe\";s:9:\"parent_id\";i:0;s:6:\"seoURL\";s:2:\"fe\";s:7:\"extraJS\";N;s:8:\"extraCSS\";N;s:9:\"status_id\";i:1;s:7:\"form_id\";i:0;s:13:\"display_order\";N;s:9:\"navbar_id\";N;s:12:\"date_updated\";s:19:\"0000-00-00 00:00:00\";}s:10:\"\0*\0changed\";a:0:{}s:9:\"\0*\0loaded\";b:1;s:8:\"\0*\0saved\";b:1;s:10:\"\0*\0sorting\";a:1:{s:2:\"id\";s:3:\"asc\";}}','2009-05-03 16:14:50');
/*!40000 ALTER TABLE `zest_activities` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `zest_addresses`
--

DROP TABLE IF EXISTS `zest_addresses`;
CREATE TABLE `zest_addresses` (
  `id` int(11) NOT NULL auto_increment,
  `user_id` int(11) NOT NULL default '0',
  `company` text,
  `vat_no` varchar(32) default NULL,
  `address_one` text,
  `address_two` text,
  `address_three` text,
  `telephone` varchar(32) default NULL,
  `post_code` varchar(32) default NULL,
  `country_id` int(11) NOT NULL default '0',
  `date_added` timestamp NOT NULL default CURRENT_TIMESTAMP,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `zest_addresses`
--

LOCK TABLES `zest_addresses` WRITE;
/*!40000 ALTER TABLE `zest_addresses` DISABLE KEYS */;
/*!40000 ALTER TABLE `zest_addresses` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `zest_attribute_definitions`
--

DROP TABLE IF EXISTS `zest_attribute_definitions`;
CREATE TABLE `zest_attribute_definitions` (
  `id` int(11) NOT NULL auto_increment,
  `attribute_id` int(11) NOT NULL default '0',
  `language_id` int(11) NOT NULL default '0',
  `title` text,
  PRIMARY KEY  (`id`),
  KEY `attribute_id` (`attribute_id`),
  KEY `language_id` (`language_id`),
  CONSTRAINT `zest_attribute_definitions_ibfk_1` FOREIGN KEY (`attribute_id`) REFERENCES `zest_attributes` (`id`) ON DELETE CASCADE,
  CONSTRAINT `zest_attribute_definitions_ibfk_2` FOREIGN KEY (`language_id`) REFERENCES `zest_languages` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `zest_attribute_definitions`
--

LOCK TABLES `zest_attribute_definitions` WRITE;
/*!40000 ALTER TABLE `zest_attribute_definitions` DISABLE KEYS */;
/*!40000 ALTER TABLE `zest_attribute_definitions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `zest_attributes`
--

DROP TABLE IF EXISTS `zest_attributes`;
CREATE TABLE `zest_attributes` (
  `id` int(11) NOT NULL auto_increment,
  `title` text,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `zest_attributes`
--

LOCK TABLES `zest_attributes` WRITE;
/*!40000 ALTER TABLE `zest_attributes` DISABLE KEYS */;
/*!40000 ALTER TABLE `zest_attributes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `zest_banners`
--

DROP TABLE IF EXISTS `zest_banners`;
CREATE TABLE `zest_banners` (
  `id` int(11) NOT NULL auto_increment,
  `title` text,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `zest_banners`
--

LOCK TABLES `zest_banners` WRITE;
/*!40000 ALTER TABLE `zest_banners` DISABLE KEYS */;
/*!40000 ALTER TABLE `zest_banners` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `zest_banners_medias`
--

DROP TABLE IF EXISTS `zest_banners_medias`;
CREATE TABLE `zest_banners_medias` (
  `banner_id` int(11) default NULL,
  `media_id` int(11) default NULL,
  KEY `banner_id` (`banner_id`),
  CONSTRAINT `zest_banners_medias_ibfk_1` FOREIGN KEY (`banner_id`) REFERENCES `zest_banners` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `zest_banners_medias`
--

LOCK TABLES `zest_banners_medias` WRITE;
/*!40000 ALTER TABLE `zest_banners_medias` DISABLE KEYS */;
/*!40000 ALTER TABLE `zest_banners_medias` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `zest_banners_pages`
--

DROP TABLE IF EXISTS `zest_banners_pages`;
CREATE TABLE `zest_banners_pages` (
  `banner_id` int(11) NOT NULL auto_increment,
  `page_id` int(11) default NULL,
  PRIMARY KEY  (`banner_id`),
  KEY `page_id` (`page_id`),
  CONSTRAINT `zest_banners_pages_ibfk_1` FOREIGN KEY (`banner_id`) REFERENCES `zest_banners` (`id`) ON DELETE CASCADE,
  CONSTRAINT `zest_banners_pages_ibfk_2` FOREIGN KEY (`page_id`) REFERENCES `zest_pages` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `zest_banners_pages`
--

LOCK TABLES `zest_banners_pages` WRITE;
/*!40000 ALTER TABLE `zest_banners_pages` DISABLE KEYS */;
/*!40000 ALTER TABLE `zest_banners_pages` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `zest_comments`
--

DROP TABLE IF EXISTS `zest_comments`;
CREATE TABLE `zest_comments` (
  `id` int(11) NOT NULL auto_increment,
  `user_id` int(11) default NULL,
  `feedpost_id` int(11) default NULL,
  `date` timestamp NOT NULL default CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP,
  `title` text,
  `display_name` text,
  `email` text,
  `status_id` int(11) default NULL,
  `fl_deleted` int(11) default NULL,
  PRIMARY KEY  (`id`),
  KEY `feedpost_id` (`feedpost_id`),
  CONSTRAINT `zest_comments_ibfk_1` FOREIGN KEY (`feedpost_id`) REFERENCES `zest_feedposts` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `zest_comments`
--

LOCK TABLES `zest_comments` WRITE;
/*!40000 ALTER TABLE `zest_comments` DISABLE KEYS */;
/*!40000 ALTER TABLE `zest_comments` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `zest_countries`
--

DROP TABLE IF EXISTS `zest_countries`;
CREATE TABLE `zest_countries` (
  `id` int(11) unsigned NOT NULL auto_increment,
  `title` text NOT NULL,
  `zone_id` int(11) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `zest_countries`
--

LOCK TABLES `zest_countries` WRITE;
/*!40000 ALTER TABLE `zest_countries` DISABLE KEYS */;
/*!40000 ALTER TABLE `zest_countries` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `zest_countries_products`
--

DROP TABLE IF EXISTS `zest_countries_products`;
CREATE TABLE `zest_countries_products` (
  `country_id` int(11) NOT NULL default '0',
  `product_id` int(11) NOT NULL default '0',
  KEY `product_id` (`product_id`),
  CONSTRAINT `zest_countries_products_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `zest_products` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `zest_countries_products`
--

LOCK TABLES `zest_countries_products` WRITE;
/*!40000 ALTER TABLE `zest_countries_products` DISABLE KEYS */;
/*!40000 ALTER TABLE `zest_countries_products` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `zest_currencies`
--

DROP TABLE IF EXISTS `zest_currencies`;
CREATE TABLE `zest_currencies` (
  `id` int(11) NOT NULL auto_increment,
  `title` varchar(32) default NULL,
  `code` varchar(32) default NULL,
  `symbol_left` varchar(32) default NULL,
  `symbol_right` varchar(32) default NULL,
  `decimal_point` varchar(4) default NULL,
  `conversion_rate` varchar(32) NOT NULL default '1',
  `last_updated` timestamp NOT NULL default CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `zest_currencies`
--

LOCK TABLES `zest_currencies` WRITE;
/*!40000 ALTER TABLE `zest_currencies` DISABLE KEYS */;
/*!40000 ALTER TABLE `zest_currencies` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `zest_delivery_rates`
--

DROP TABLE IF EXISTS `zest_delivery_rates`;
CREATE TABLE `zest_delivery_rates` (
  `id` int(11) NOT NULL auto_increment,
  `country_id` int(11) NOT NULL default '0',
  `single_value` varchar(32) NOT NULL default '0',
  `multiple_value` varchar(32) NOT NULL default '0',
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `zest_delivery_rates`
--

LOCK TABLES `zest_delivery_rates` WRITE;
/*!40000 ALTER TABLE `zest_delivery_rates` DISABLE KEYS */;
/*!40000 ALTER TABLE `zest_delivery_rates` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `zest_discount_bands`
--

DROP TABLE IF EXISTS `zest_discount_bands`;
CREATE TABLE `zest_discount_bands` (
  `id` int(11) NOT NULL auto_increment,
  `discount_id` int(11) NOT NULL default '0',
  `min_qty` int(11) NOT NULL default '0',
  `max_qty` int(11) NOT NULL default '0',
  `percentage` varchar(6) NOT NULL default '0',
  PRIMARY KEY  (`id`),
  KEY `discount_id` (`discount_id`),
  CONSTRAINT `zest_discount_bands_ibfk_1` FOREIGN KEY (`discount_id`) REFERENCES `zest_discounts` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `zest_discount_bands`
--

LOCK TABLES `zest_discount_bands` WRITE;
/*!40000 ALTER TABLE `zest_discount_bands` DISABLE KEYS */;
/*!40000 ALTER TABLE `zest_discount_bands` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `zest_discounts`
--

DROP TABLE IF EXISTS `zest_discounts`;
CREATE TABLE `zest_discounts` (
  `id` int(11) NOT NULL auto_increment,
  `code` varchar(4) NOT NULL default '',
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `zest_discounts`
--

LOCK TABLES `zest_discounts` WRITE;
/*!40000 ALTER TABLE `zest_discounts` DISABLE KEYS */;
/*!40000 ALTER TABLE `zest_discounts` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `zest_events`
--

DROP TABLE IF EXISTS `zest_events`;
CREATE TABLE `zest_events` (
  `id` int(11) NOT NULL auto_increment,
  `title` text,
  `date_added` timestamp NOT NULL default CURRENT_TIMESTAMP,
  `description` text,
  `media_id` int(11) default NULL,
  `user_id` int(11) default NULL,
  `venue` text,
  `price` float(7,2) default NULL,
  `status_id` int(11) NOT NULL default '1',
  `date` datetime default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `zest_events`
--

LOCK TABLES `zest_events` WRITE;
/*!40000 ALTER TABLE `zest_events` DISABLE KEYS */;
/*!40000 ALTER TABLE `zest_events` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `zest_events_medias`
--

DROP TABLE IF EXISTS `zest_events_medias`;
CREATE TABLE `zest_events_medias` (
  `event_id` int(11) default NULL,
  `media_id` int(11) default NULL,
  KEY `event_id` (`event_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `zest_events_medias`
--

LOCK TABLES `zest_events_medias` WRITE;
/*!40000 ALTER TABLE `zest_events_medias` DISABLE KEYS */;
/*!40000 ALTER TABLE `zest_events_medias` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `zest_events_users`
--

DROP TABLE IF EXISTS `zest_events_users`;
CREATE TABLE `zest_events_users` (
  `event_id` int(11) default NULL,
  `user_id` int(11) default NULL,
  KEY `event_id` (`event_id`),
  KEY `user_id` (`user_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `zest_events_users`
--

LOCK TABLES `zest_events_users` WRITE;
/*!40000 ALTER TABLE `zest_events_users` DISABLE KEYS */;
/*!40000 ALTER TABLE `zest_events_users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `zest_external_feedposts`
--

DROP TABLE IF EXISTS `zest_external_feedposts`;
CREATE TABLE `zest_external_feedposts` (
  `id` int(11) NOT NULL auto_increment,
  `external_feed_id` int(11) default NULL,
  `title` text,
  `text` text,
  `pubDate` timestamp NOT NULL default CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP,
  `permalink` text,
  `fl_deleted` int(11) default NULL,
  `status_id` int(11) default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=229 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `zest_external_feedposts`
--

LOCK TABLES `zest_external_feedposts` WRITE;
/*!40000 ALTER TABLE `zest_external_feedposts` DISABLE KEYS */;
INSERT INTO `zest_external_feedposts` VALUES (179,80,'sydlawrence: @wozman I am so pleased I am not the only one! oh yeah and \'ninja\' http://mobypicture.com/?fzgdjf','','2009-05-08 15:24:19','http://twitter.com/sydlawrence/statuses/1738396330',NULL,2),(180,80,'sydlawrence: @plinkk yeah looks really good.  Right back to the app. ciao for now, Twitter OFF','','2009-05-08 13:12:42','http://twitter.com/sydlawrence/statuses/1737286799',NULL,2),(181,80,'sydlawrence: @plinkk just like a writer\'s block / processing problem, trying to work out how to solve a problem like maria','','2009-05-08 13:09:24','http://twitter.com/sydlawrence/statuses/1737262407',NULL,2),(182,80,'sydlawrence: @_hb I am going up from winchester, getting the train which gets in at 8:38','','2009-05-08 11:34:44','http://twitter.com/sydlawrence/statuses/1736676761',NULL,2),(183,80,'sydlawrence: Am I the only one to find these release notes funny?  http://mobypicture.com/?fzgdjf','','2009-05-08 11:19:32','http://twitter.com/sydlawrence/statuses/1736598626',NULL,2),(184,80,'sydlawrence: Productivity has gone down hill since trying to install 3.0b on my phone, managed to brick phone twice (user error)','','2009-05-08 11:04:49','http://twitter.com/sydlawrence/statuses/1736527243',NULL,2),(185,80,'sydlawrence: ? sweet as a nut, sweet like tropicana ?','','2009-05-08 10:47:06','http://twitter.com/sydlawrence/statuses/1736446005',NULL,2),(186,80,'sydlawrence: @dalelane I\'m getting the 07:24, arriving waterloo at 08:38','','2009-05-08 10:30:48','http://twitter.com/sydlawrence/statuses/1736372822',NULL,2),(187,80,'sydlawrence: at #theJar having fun with itunes dj, first real use. @peteoconnor is the odd one out, no iphone','','2009-05-08 10:28:30','http://twitter.com/sydlawrence/statuses/1736362287',NULL,2),(188,80,'sydlawrence: @dalelane I am going up from winchester on train, which train are you getting? #openhackday #hackday #openhack','','2009-05-08 10:24:30','http://twitter.com/sydlawrence/statuses/1736344318',NULL,2),(189,80,'sydlawrence: #twin 3 beers, 12 cups of coffee, 9 emails sent (9?!?!), 6 \'thought showers\' drawn','','2009-05-08 09:36:36','http://twitter.com/sydlawrence/statuses/1736144253',NULL,2),(190,80,'sydlawrence: @gradplanner whoa, why speak to them about it before getting a patent?? bad move','','2009-05-07 13:38:12','http://twitter.com/sydlawrence/statuses/1727079330',NULL,2),(191,80,'sydlawrence: @gradplanner did you ever get a patent on ibooth in the end? http://bit.ly/iqF39 Might make an intere$ting read','','2009-05-07 13:24:03','http://twitter.com/sydlawrence/statuses/1726973851',NULL,2),(192,80,'sydlawrence: @plinkk Not only do they not contain any crab, they dont contain any nice taste either! eurgh','','2009-05-07 09:19:17','http://twitter.com/sydlawrence/statuses/1725690876',NULL,2),(193,80,'sydlawrence: Trying to sleep. But too many ideas / thoughts going through my head. Had to get pen & paper.So far jotted down 4 pages of notes!','','2009-05-07 00:55:15','http://twitter.com/sydlawrence/statuses/1722455238',NULL,2),(194,80,'sydlawrence: Just thought of a freaking sweet idea for #hackday. I can has teli bochs? @samsoir @xigme d me your emails','','2009-05-06 22:15:47','http://twitter.com/sydlawrence/statuses/1721172436',NULL,2),(195,80,'sydlawrence: @isitaboat I take it this is your first time on twitter for a few days :p','','2009-05-06 19:57:10','http://twitter.com/sydlawrence/statuses/1719936107',NULL,2),(196,80,'sydlawrence: @fakedarren ps maybe you could teach me some as3 oneday?','','2009-05-06 18:36:17','http://twitter.com/sydlawrence/statuses/1719206293',NULL,2),(197,80,'sydlawrence: @fakedarren why not? I\'ll tell you what, next time you are booking a place for something like this let me know, and vice versa?','','2009-05-06 18:36:00','http://twitter.com/sydlawrence/statuses/1719203754',NULL,2),(198,80,'sydlawrence: @dangriffey Couldnt agree more, I went to bruges the other weekend, the hotel wanted to charge 20€ for wifi','','2009-05-06 18:22:38','http://twitter.com/sydlawrence/statuses/1719084435',NULL,2),(199,81,'Jcrop - Deep Liquid','','2009-05-03 12:09:56','http://deepliquid.com/content/Jcrop.html',NULL,2),(200,81,'Israel renames unkosher swine flu','','2009-05-03 00:52:31','http://news.bbc.co.uk/1/hi/world/middle_east/8021301.stm',NULL,2),(201,81,'White noise jquery.cycle','','2009-04-09 02:27:27','http://www.alexjudd.com/?p=5',NULL,2),(202,81,'JQuery Corner Demo','','2009-04-09 02:02:08','http://www.malsup.com/jquery/corner/',NULL,2),(203,81,'Pipes: Rewire the web','','2009-04-06 18:59:52','http://pipes.yahoo.com/pipes/',NULL,2),(204,81,'jQuery Selectors','','2009-04-02 17:39:35','http://www.codylindley.com/jqueryselectors/',NULL,2),(205,81,'iPhone GUI PSD','','2009-03-25 23:04:59','http://www.teehanlax.com/blog/?p=447',NULL,2),(206,81,'How to Install Windows 7 Beta on an Acer Aspire One Netbook','','2009-03-25 19:13:16','http://garyshortblog.wordpress.com/2009/01/10/how-to-install-windows-7-beta-on-an-acer-aspire-one-netbook/',NULL,2),(207,81,'Chrome Experiments - Detail - Browser Ball','','2009-03-19 16:19:42','http://www.chromeexperiments.com/detail/browser-ball/#',NULL,2),(208,81,'hackday.org','','2009-03-18 11:14:28','http://www.hackday.org/',NULL,2),(209,81,'How developers work','','2009-03-17 11:59:26','http://ninjamonkeys.co.za/2009/03/17/how-software-developers-work/',NULL,2),(210,81,'Twitter integrates OAuth','','2009-03-17 09:41:53','http://twitter.com/oauth_clients/new',NULL,2),(211,81,'10 Tips for Blogging Your Way to Small Business Success','','2009-03-17 08:14:49','http://www.problogger.net/archives/2009/02/23/10-tips-for-blogging-your-way-to-small-business-success/',NULL,2),(212,81,'Flash CS3 & AS3. What\'s the best way to learn?','','2009-03-16 21:05:10','http://forums.macrumors.com/archive/index.php/t-614118.html',NULL,2),(213,81,'FavIcon Generator','','2009-03-11 16:40:25','http://tools.dynamicdrive.com/favicon/',NULL,2),(214,82,'Stop motion with wolf and pig.','','2009-05-08 10:55:03','http://www.youtube.com/watch?v=rmkLlVzUBn4',NULL,2),(215,82,'Prezi - The zooming presentation editor','','2009-05-08 08:00:49','http://prezi.com/',NULL,2),(216,82,'JQueryCheatSheet','','2009-05-08 07:36:48','http://www.javascripttoolbox.com/jquery/cheatsheet/JQueryCheatSheet-1.3.2.png',NULL,2),(217,82,'The Do’s & Don’ts of Modern Web Design • Relevant, snacksized web design resources','','2009-05-06 08:15:48','http://webdosanddonts.com/',NULL,2),(218,82,'85+ of the Best Twitterers Designers Should Follow','','2009-05-05 09:22:40','http://mashable.com/2009/05/04/twitter-designers/',NULL,2),(219,82,'Website Wireframe and Prototype Tool','','2009-05-05 08:03:11','http://www.protoshare.com/',NULL,2),(220,82,'Is Dwoodle too late?','','2009-05-01 21:06:21','http://drawball.com/',NULL,2),(221,82,'Estimating time for Web Projects more accurately','','2009-05-01 19:00:07','http://www.thesambarnes.com/web-project-management/web-project-management/estimating-time-for-web-projects-more-accurately-part-1/',NULL,2),(222,82,'39 Masterpieces Of Creative Advertisements @ SmashingApps','','2009-05-01 08:15:51','http://www.smashingapps.com/2008/09/10/39-masterpieces-of-creative-advertisements.html',NULL,2),(223,82,'31 Masterpieces Of Creative And Clever Advertising Concepts @ SmashingApps','','2009-05-01 08:08:57','http://www.smashingapps.com/2009/03/20/31-masterpieces-of-creative-and-clever-advertising-concepts.html',NULL,2),(224,82,'flipping typical: use this for checking fonts for clients','','2009-05-01 07:59:00','http://flippingtypical.com/',NULL,2),(225,82,'Mind Map Art','','2009-04-29 21:52:10','http://www.mindmapart.com/',NULL,2),(226,82,'Clever use of flickr','','2009-04-29 16:08:05','http://www.flickr.com/photos/norby',NULL,2),(227,82,'Google launches public data search, visualization features','','2009-04-29 15:12:14','http://www.downloadsquad.com/2009/04/29/google-launches-public-data-search-visualization-features/',NULL,2),(228,82,'20 More Excellent AJAX Effects You Should Know - Nettuts+','','2009-04-28 15:20:53','http://net.tutsplus.com/articles/web-roundups/20-more-excellent-ajax-effects-you-should-know/',NULL,2);
/*!40000 ALTER TABLE `zest_external_feedposts` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `zest_external_feeds`
--

DROP TABLE IF EXISTS `zest_external_feeds`;
CREATE TABLE `zest_external_feeds` (
  `id` int(11) NOT NULL auto_increment,
  `title` text,
  `url` text,
  `favicon` text,
  `last_updated` timestamp NOT NULL default CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP,
  `snippet` text,
  `username` text,
  `password` text,
  `box_short` text,
  `seoKeywords` text,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=83 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `zest_external_feeds`
--

LOCK TABLES `zest_external_feeds` WRITE;
/*!40000 ALTER TABLE `zest_external_feeds` DISABLE KEYS */;
INSERT INTO `zest_external_feeds` VALUES (80,'Twitter','http://twitter.com/statuses/user_timeline/14860093.rss','http://twitter.com/favicon.ico','2009-05-08 20:15:48',NULL,'','',NULL,NULL),(81,'Delicious','http://feeds.delicious.com/v2/rss/sydlawrence?count=15','http://delicious.com/favicon.ico','2009-05-08 20:15:48',NULL,'','',NULL,NULL),(82,'Delicious_marm','http://feeds.delicious.com/v2/rss/marmaladeontoast?count=15','http://www.delicious.com/favicon.ico','2009-05-08 20:15:49',NULL,'','',NULL,NULL);
/*!40000 ALTER TABLE `zest_external_feeds` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `zest_feedposts`
--

DROP TABLE IF EXISTS `zest_feedposts`;
CREATE TABLE `zest_feedposts` (
  `id` int(11) NOT NULL auto_increment,
  `url` text,
  `title` text,
  `date` timestamp NOT NULL default CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP,
  `text` text,
  `user_id` int(11) default NULL,
  `feed_id` int(11) default NULL,
  `media_id` int(11) default NULL,
  `status_id` int(11) NOT NULL default '1',
  `tweeted` int(11) default NULL,
  PRIMARY KEY  (`id`),
  KEY `feed_id` (`feed_id`),
  CONSTRAINT `zest_feedposts_ibfk_1` FOREIGN KEY (`feed_id`) REFERENCES `zest_feeds` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `zest_feedposts`
--

LOCK TABLES `zest_feedposts` WRITE;
/*!40000 ALTER TABLE `zest_feedposts` DISABLE KEYS */;
INSERT INTO `zest_feedposts` VALUES (1,NULL,'Test story','2009-05-03 16:36:17','<p>This is just a test story, does it work?</p>',1,1,0,2,NULL),(2,NULL,'test','2009-05-08 20:12:08','<p>This is just a test feed</p>',1,1,0,2,NULL);
/*!40000 ALTER TABLE `zest_feedposts` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `zest_feedposts_tags`
--

DROP TABLE IF EXISTS `zest_feedposts_tags`;
CREATE TABLE `zest_feedposts_tags` (
  `feedpost_id` int(11) default NULL,
  `tag_id` int(11) default NULL,
  KEY `feedpost_id` (`feedpost_id`),
  CONSTRAINT `zest_feedposts_tags_ibfk_1` FOREIGN KEY (`feedpost_id`) REFERENCES `zest_feedposts` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `zest_feedposts_tags`
--

LOCK TABLES `zest_feedposts_tags` WRITE;
/*!40000 ALTER TABLE `zest_feedposts_tags` DISABLE KEYS */;
INSERT INTO `zest_feedposts_tags` VALUES (1,0),(2,0);
/*!40000 ALTER TABLE `zest_feedposts_tags` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `zest_feeds`
--

DROP TABLE IF EXISTS `zest_feeds`;
CREATE TABLE `zest_feeds` (
  `id` int(11) NOT NULL auto_increment,
  `title` text,
  `tweet` int(11) default '0',
  `tweet_desc` text,
  `description` text,
  `allow_comments` int(11) default '0',
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `zest_feeds`
--

LOCK TABLES `zest_feeds` WRITE;
/*!40000 ALTER TABLE `zest_feeds` DISABLE KEYS */;
INSERT INTO `zest_feeds` VALUES (1,'news',0,'','',1);
/*!40000 ALTER TABLE `zest_feeds` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `zest_form_submissions`
--

DROP TABLE IF EXISTS `zest_form_submissions`;
CREATE TABLE `zest_form_submissions` (
  `id` int(11) NOT NULL auto_increment,
  `post` text,
  `form_id` int(11) default NULL,
  `date` timestamp NOT NULL default CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP,
  PRIMARY KEY  (`id`),
  KEY `form_id` (`form_id`),
  CONSTRAINT `zest_form_submissions_ibfk_1` FOREIGN KEY (`form_id`) REFERENCES `zest_forms` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `zest_form_submissions`
--

LOCK TABLES `zest_form_submissions` WRITE;
/*!40000 ALTER TABLE `zest_form_submissions` DISABLE KEYS */;
/*!40000 ALTER TABLE `zest_form_submissions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `zest_forms`
--

DROP TABLE IF EXISTS `zest_forms`;
CREATE TABLE `zest_forms` (
  `id` int(11) NOT NULL auto_increment,
  `title` text,
  `view` text,
  `to_email` text,
  `success_message` text,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `zest_forms`
--

LOCK TABLES `zest_forms` WRITE;
/*!40000 ALTER TABLE `zest_forms` DISABLE KEYS */;
INSERT INTO `zest_forms` VALUES (1,'contact','contact','syd.lawrence@marmaladeontoast.co.uk','Thanks for getting in touch');
/*!40000 ALTER TABLE `zest_forms` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `zest_languages`
--

DROP TABLE IF EXISTS `zest_languages`;
CREATE TABLE `zest_languages` (
  `id` int(11) NOT NULL auto_increment,
  `title` text,
  `charset` text,
  `code` text,
  `fl_use` tinyint(4) NOT NULL default '0',
  `fl_default` tinyint(4) NOT NULL default '0',
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `zest_languages`
--

LOCK TABLES `zest_languages` WRITE;
/*!40000 ALTER TABLE `zest_languages` DISABLE KEYS */;
INSERT INTO `zest_languages` VALUES (1,'ENGLISH','utf8','en',1,1),(2,'FRENCH','utf8','fr',1,0),(3,'GERMAN','utf8','de',0,0),(4,'SPANISH','utf8','es',0,0),(5,'ITALIAN','utf8','il',0,0);
/*!40000 ALTER TABLE `zest_languages` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `zest_media_types`
--

DROP TABLE IF EXISTS `zest_media_types`;
CREATE TABLE `zest_media_types` (
  `id` int(11) unsigned NOT NULL auto_increment,
  `name` text NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `zest_media_types`
--

LOCK TABLES `zest_media_types` WRITE;
/*!40000 ALTER TABLE `zest_media_types` DISABLE KEYS */;
INSERT INTO `zest_media_types` VALUES (1,'image'),(2,'flv'),(3,'file');
/*!40000 ALTER TABLE `zest_media_types` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `zest_medias`
--

DROP TABLE IF EXISTS `zest_medias`;
CREATE TABLE `zest_medias` (
  `id` int(11) unsigned NOT NULL auto_increment,
  `media_type_id` int(11) default NULL,
  `filename` text,
  `title` text,
  `category` text,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `zest_medias`
--

LOCK TABLES `zest_medias` WRITE;
/*!40000 ALTER TABLE `zest_medias` DISABLE KEYS */;
INSERT INTO `zest_medias` VALUES (2,NULL,NULL,'hello world2','Test2'),(3,NULL,NULL,'hello world2','Test2'),(4,NULL,NULL,'hello world2','Test2');
/*!40000 ALTER TABLE `zest_medias` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `zest_medias_pages`
--

DROP TABLE IF EXISTS `zest_medias_pages`;
CREATE TABLE `zest_medias_pages` (
  `media_id` int(11) default NULL,
  `page_id` int(11) default NULL,
  KEY `page_id` (`page_id`),
  CONSTRAINT `zest_medias_pages_ibfk_1` FOREIGN KEY (`page_id`) REFERENCES `zest_pages` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `zest_medias_pages`
--

LOCK TABLES `zest_medias_pages` WRITE;
/*!40000 ALTER TABLE `zest_medias_pages` DISABLE KEYS */;
/*!40000 ALTER TABLE `zest_medias_pages` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `zest_medias_products`
--

DROP TABLE IF EXISTS `zest_medias_products`;
CREATE TABLE `zest_medias_products` (
  `media_id` int(11) NOT NULL default '0',
  `product_id` int(11) NOT NULL default '0',
  KEY `product_id` (`product_id`),
  CONSTRAINT `zest_medias_products_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `zest_products` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `zest_medias_products`
--

LOCK TABLES `zest_medias_products` WRITE;
/*!40000 ALTER TABLE `zest_medias_products` DISABLE KEYS */;
/*!40000 ALTER TABLE `zest_medias_products` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `zest_navbars`
--

DROP TABLE IF EXISTS `zest_navbars`;
CREATE TABLE `zest_navbars` (
  `id` int(11) NOT NULL auto_increment,
  `title` text,
  `view` text,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `zest_navbars`
--

LOCK TABLES `zest_navbars` WRITE;
/*!40000 ALTER TABLE `zest_navbars` DISABLE KEYS */;
INSERT INTO `zest_navbars` VALUES (1,'Main',NULL);
/*!40000 ALTER TABLE `zest_navbars` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `zest_order_products`
--

DROP TABLE IF EXISTS `zest_order_products`;
CREATE TABLE `zest_order_products` (
  `id` int(11) NOT NULL auto_increment,
  `vat` varchar(32) default NULL,
  `vat_rate_id` int(11) NOT NULL default '0',
  `item_price` varchar(32) default NULL,
  `quantity` int(11) NOT NULL default '0',
  `order_id` int(11) NOT NULL default '0',
  `product_id` int(11) NOT NULL default '0',
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `zest_order_products`
--

LOCK TABLES `zest_order_products` WRITE;
/*!40000 ALTER TABLE `zest_order_products` DISABLE KEYS */;
/*!40000 ALTER TABLE `zest_order_products` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `zest_order_status_definitions`
--

DROP TABLE IF EXISTS `zest_order_status_definitions`;
CREATE TABLE `zest_order_status_definitions` (
  `id` int(11) NOT NULL auto_increment,
  `order_status_id` int(11) NOT NULL default '0',
  `language_id` int(11) NOT NULL default '0',
  `title` text,
  PRIMARY KEY  (`id`),
  KEY `order_status_id` (`order_status_id`),
  KEY `language_id` (`language_id`),
  CONSTRAINT `zest_order_status_definitions_ibfk_1` FOREIGN KEY (`order_status_id`) REFERENCES `zest_order_statuses` (`id`) ON DELETE CASCADE,
  CONSTRAINT `zest_order_status_definitions_ibfk_2` FOREIGN KEY (`language_id`) REFERENCES `zest_languages` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `zest_order_status_definitions`
--

LOCK TABLES `zest_order_status_definitions` WRITE;
/*!40000 ALTER TABLE `zest_order_status_definitions` DISABLE KEYS */;
/*!40000 ALTER TABLE `zest_order_status_definitions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `zest_order_statuses`
--

DROP TABLE IF EXISTS `zest_order_statuses`;
CREATE TABLE `zest_order_statuses` (
  `id` int(11) NOT NULL auto_increment,
  `title` text,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `zest_order_statuses`
--

LOCK TABLES `zest_order_statuses` WRITE;
/*!40000 ALTER TABLE `zest_order_statuses` DISABLE KEYS */;
/*!40000 ALTER TABLE `zest_order_statuses` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `zest_orders`
--

DROP TABLE IF EXISTS `zest_orders`;
CREATE TABLE `zest_orders` (
  `id` int(11) NOT NULL auto_increment,
  `user_id` int(11) NOT NULL default '0',
  `purchase_order` varchar(32) default NULL,
  `basket_serialized` text,
  `product_quantity` int(11) NOT NULL default '0',
  `total_price` varchar(32) default NULL,
  `currency_id` int(11) NOT NULL default '0',
  `delivery_address` int(11) NOT NULL default '0',
  `invoice_address_id` int(11) NOT NULL default '0',
  `delivery_type` varchar(32) default NULL,
  `extra_info` text,
  `payment_method_id` int(11) NOT NULL default '0',
  `order_status_id` int(11) NOT NULL default '0',
  `shipping_method` varchar(32) default NULL,
  `tracking_number` varchar(32) default NULL,
  `date_added` timestamp NOT NULL default CURRENT_TIMESTAMP,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `zest_orders`
--

LOCK TABLES `zest_orders` WRITE;
/*!40000 ALTER TABLE `zest_orders` DISABLE KEYS */;
/*!40000 ALTER TABLE `zest_orders` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `zest_page_definitions`
--

DROP TABLE IF EXISTS `zest_page_definitions`;
CREATE TABLE `zest_page_definitions` (
  `id` int(11) NOT NULL auto_increment,
  `page_id` int(11) NOT NULL default '1',
  `language_id` int(11) NOT NULL default '1',
  `title` text,
  `seoTitle` text,
  `seoKeywords` text,
  `seoDescription` text,
  `bodyText` text,
  PRIMARY KEY  (`id`),
  KEY `page_id` (`page_id`),
  KEY `language_id` (`language_id`),
  CONSTRAINT `zest_page_definitions_ibfk_1` FOREIGN KEY (`page_id`) REFERENCES `zest_pages` (`id`) ON DELETE CASCADE,
  CONSTRAINT `zest_page_definitions_ibfk_2` FOREIGN KEY (`language_id`) REFERENCES `zest_languages` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `zest_page_definitions`
--

LOCK TABLES `zest_page_definitions` WRITE;
/*!40000 ALTER TABLE `zest_page_definitions` DISABLE KEYS */;
INSERT INTO `zest_page_definitions` VALUES (5,1,1,'Home',NULL,'','','<p>But yes, it\'s true!</p>'),(6,1,2,'Bienvenue',NULL,'','','<p>Mais oui, c\'est vrai</p>');
/*!40000 ALTER TABLE `zest_page_definitions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `zest_pages`
--

DROP TABLE IF EXISTS `zest_pages`;
CREATE TABLE `zest_pages` (
  `id` int(11) NOT NULL auto_increment,
  `template_id` int(11) NOT NULL default '1',
  `title` text,
  `parent_id` int(11) NOT NULL default '0',
  `seoURL` text,
  `extraJS` text,
  `extraCSS` text,
  `status_id` int(11) NOT NULL default '1',
  `form_id` int(11) NOT NULL default '0',
  `display_order` int(11) default NULL,
  `navbar_id` int(11) default NULL,
  `date_updated` timestamp NOT NULL default '0000-00-00 00:00:00' on update CURRENT_TIMESTAMP,
  `seoTitle` text,
  `bodyText` text,
  `seoKeywords` text,
  `seoDescription` text,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `zest_pages`
--

LOCK TABLES `zest_pages` WRITE;
/*!40000 ALTER TABLE `zest_pages` DISABLE KEYS */;
INSERT INTO `zest_pages` VALUES (1,1,'Home',0,'','','',2,0,1,1,'2009-05-03 15:00:25',NULL,NULL,NULL,NULL);
/*!40000 ALTER TABLE `zest_pages` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `zest_payment_method_definitions`
--

DROP TABLE IF EXISTS `zest_payment_method_definitions`;
CREATE TABLE `zest_payment_method_definitions` (
  `id` int(11) NOT NULL auto_increment,
  `payment_method_id` int(11) NOT NULL default '0',
  `language_id` int(11) NOT NULL default '0',
  `title` text,
  `description` text,
  PRIMARY KEY  (`id`),
  KEY `payment_method_id` (`payment_method_id`),
  KEY `language_id` (`language_id`),
  CONSTRAINT `zest_payment_method_definitions_ibfk_1` FOREIGN KEY (`payment_method_id`) REFERENCES `zest_payment_methods` (`id`) ON DELETE CASCADE,
  CONSTRAINT `zest_payment_method_definitions_ibfk_2` FOREIGN KEY (`language_id`) REFERENCES `zest_languages` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `zest_payment_method_definitions`
--

LOCK TABLES `zest_payment_method_definitions` WRITE;
/*!40000 ALTER TABLE `zest_payment_method_definitions` DISABLE KEYS */;
/*!40000 ALTER TABLE `zest_payment_method_definitions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `zest_payment_methods`
--

DROP TABLE IF EXISTS `zest_payment_methods`;
CREATE TABLE `zest_payment_methods` (
  `id` int(11) NOT NULL auto_increment,
  `title` text,
  `fl_payment_taken` tinyint(4) default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `zest_payment_methods`
--

LOCK TABLES `zest_payment_methods` WRITE;
/*!40000 ALTER TABLE `zest_payment_methods` DISABLE KEYS */;
/*!40000 ALTER TABLE `zest_payment_methods` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `zest_product_attributes`
--

DROP TABLE IF EXISTS `zest_product_attributes`;
CREATE TABLE `zest_product_attributes` (
  `id` int(11) NOT NULL auto_increment,
  `product_id` int(11) NOT NULL default '0',
  `attribute_id` int(11) NOT NULL default '0',
  `value` varchar(32) NOT NULL default '0',
  `unit` varchar(32) NOT NULL default '',
  PRIMARY KEY  (`id`),
  KEY `product_id` (`product_id`),
  KEY `attribute_id` (`attribute_id`),
  CONSTRAINT `zest_product_attributes_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `zest_products` (`id`) ON DELETE CASCADE,
  CONSTRAINT `zest_product_attributes_ibfk_2` FOREIGN KEY (`attribute_id`) REFERENCES `zest_attributes` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `zest_product_attributes`
--

LOCK TABLES `zest_product_attributes` WRITE;
/*!40000 ALTER TABLE `zest_product_attributes` DISABLE KEYS */;
/*!40000 ALTER TABLE `zest_product_attributes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `zest_product_categories`
--

DROP TABLE IF EXISTS `zest_product_categories`;
CREATE TABLE `zest_product_categories` (
  `id` int(11) NOT NULL auto_increment,
  `media_id` int(11) NOT NULL default '0',
  `parent_id` int(11) NOT NULL default '0',
  `display_order` int(11) NOT NULL default '0',
  `title` text,
  `date_added` datetime default NULL,
  `date_modified` timestamp NOT NULL default '0000-00-00 00:00:00' on update CURRENT_TIMESTAMP,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `zest_product_categories`
--

LOCK TABLES `zest_product_categories` WRITE;
/*!40000 ALTER TABLE `zest_product_categories` DISABLE KEYS */;
/*!40000 ALTER TABLE `zest_product_categories` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `zest_product_category_definitions`
--

DROP TABLE IF EXISTS `zest_product_category_definitions`;
CREATE TABLE `zest_product_category_definitions` (
  `id` int(11) NOT NULL auto_increment,
  `product_category_id` int(11) NOT NULL default '0',
  `language_id` int(11) NOT NULL default '0',
  `title` text,
  `description` text,
  PRIMARY KEY  (`id`),
  KEY `product_category_id` (`product_category_id`),
  KEY `language_id` (`language_id`),
  CONSTRAINT `zest_product_category_definitions_ibfk_1` FOREIGN KEY (`product_category_id`) REFERENCES `zest_product_categories` (`id`) ON DELETE CASCADE,
  CONSTRAINT `zest_product_category_definitions_ibfk_2` FOREIGN KEY (`language_id`) REFERENCES `zest_languages` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `zest_product_category_definitions`
--

LOCK TABLES `zest_product_category_definitions` WRITE;
/*!40000 ALTER TABLE `zest_product_category_definitions` DISABLE KEYS */;
/*!40000 ALTER TABLE `zest_product_category_definitions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `zest_product_definitions`
--

DROP TABLE IF EXISTS `zest_product_definitions`;
CREATE TABLE `zest_product_definitions` (
  `id` int(11) NOT NULL auto_increment,
  `product_id` int(11) NOT NULL default '0',
  `language_id` int(11) NOT NULL default '0',
  `title` text,
  `description` text,
  PRIMARY KEY  (`id`),
  KEY `product_id` (`product_id`),
  KEY `language_id` (`language_id`),
  CONSTRAINT `zest_product_definitions_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `zest_products` (`id`) ON DELETE CASCADE,
  CONSTRAINT `zest_product_definitions_ibfk_2` FOREIGN KEY (`language_id`) REFERENCES `zest_languages` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `zest_product_definitions`
--

LOCK TABLES `zest_product_definitions` WRITE;
/*!40000 ALTER TABLE `zest_product_definitions` DISABLE KEYS */;
/*!40000 ALTER TABLE `zest_product_definitions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `zest_products`
--

DROP TABLE IF EXISTS `zest_products`;
CREATE TABLE `zest_products` (
  `id` int(11) NOT NULL auto_increment,
  `media_id` int(11) NOT NULL default '0',
  `quantity_in_stock` int(11) NOT NULL default '0',
  `lead_time` int(11) NOT NULL default '0',
  `date_added` datetime default NULL,
  `date_modified` timestamp NOT NULL default '0000-00-00 00:00:00' on update CURRENT_TIMESTAMP,
  `list_price` varchar(8) NOT NULL default '0',
  `vat_rate_id` int(11) NOT NULL default '0',
  `weight` int(11) NOT NULL default '0',
  `product_category_id` int(11) NOT NULL default '0',
  `status_id` int(11) NOT NULL default '0',
  `discount_id` int(11) NOT NULL default '0',
  `title` text,
  `ref` text,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `zest_products`
--

LOCK TABLES `zest_products` WRITE;
/*!40000 ALTER TABLE `zest_products` DISABLE KEYS */;
/*!40000 ALTER TABLE `zest_products` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `zest_roles`
--

DROP TABLE IF EXISTS `zest_roles`;
CREATE TABLE `zest_roles` (
  `id` int(11) unsigned NOT NULL auto_increment,
  `name` varchar(32) NOT NULL,
  `description` text NOT NULL,
  PRIMARY KEY  (`id`),
  UNIQUE KEY `uniq_name` (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `zest_roles`
--

LOCK TABLES `zest_roles` WRITE;
/*!40000 ALTER TABLE `zest_roles` DISABLE KEYS */;
INSERT INTO `zest_roles` VALUES (1,'superuser','Super Access'),(2,'admin','Has access to everything'),(3,'editor','Has access to everything except the Admin or Users tabs'),(4,'public','Only has access to the public area of the site');
/*!40000 ALTER TABLE `zest_roles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `zest_roles_users`
--

DROP TABLE IF EXISTS `zest_roles_users`;
CREATE TABLE `zest_roles_users` (
  `user_id` int(10) unsigned NOT NULL,
  `role_id` int(10) unsigned NOT NULL,
  KEY `user_id` (`user_id`),
  KEY `role_id` (`role_id`),
  CONSTRAINT `zest_roles_users_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `zest_users` (`id`) ON DELETE CASCADE,
  CONSTRAINT `zest_roles_users_ibfk_2` FOREIGN KEY (`role_id`) REFERENCES `zest_roles` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `zest_roles_users`
--

LOCK TABLES `zest_roles_users` WRITE;
/*!40000 ALTER TABLE `zest_roles_users` DISABLE KEYS */;
INSERT INTO `zest_roles_users` VALUES (1,1),(2,1),(3,2);
/*!40000 ALTER TABLE `zest_roles_users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `zest_settings`
--

DROP TABLE IF EXISTS `zest_settings`;
CREATE TABLE `zest_settings` (
  `id` int(11) NOT NULL auto_increment,
  `variable` text,
  `value` text,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `zest_settings`
--

LOCK TABLES `zest_settings` WRITE;
/*!40000 ALTER TABLE `zest_settings` DISABLE KEYS */;
INSERT INTO `zest_settings` VALUES (1,'PAYPAL_ID',''),(2,'COMPANY_NAME','Social Feed'),(3,'ANALYTICS_CODE',''),(4,'UNDER_DEVELOPMENT',''),(5,'EXTRA_HEAD',''),(6,'twitter_username',''),(7,'twitter_password',''),(10,'technorati_ping',''),(11,'bitly_login','marmalade'),(12,'bitly_api','R_ae99fbd581304c31e79f77989f524b67');
/*!40000 ALTER TABLE `zest_settings` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `zest_statistics`
--

DROP TABLE IF EXISTS `zest_statistics`;
CREATE TABLE `zest_statistics` (
  `id` int(11) NOT NULL auto_increment,
  `when_log` timestamp NOT NULL default CURRENT_TIMESTAMP,
  `ip` text,
  `item_type` text,
  `item_id` int(11) default NULL,
  `referrer` text,
  `user_agent` text,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `zest_statistics`
--

LOCK TABLES `zest_statistics` WRITE;
/*!40000 ALTER TABLE `zest_statistics` DISABLE KEYS */;
INSERT INTO `zest_statistics` VALUES (1,'2009-04-27 20:42:46','86.7.67.16','page',1,'','Mozilla/5.0 (Macintosh; U; Intel Mac OS X 10_5_6; en-us) AppleWebKit/528.16 (KHTML, like Gecko) Version/4.0 Safari/528.16'),(2,'2009-04-27 20:53:49','86.7.67.16','page',1,'','Mozilla/5.0 (Macintosh; U; Intel Mac OS X 10_5_6; en-us) AppleWebKit/528.16 (KHTML, like Gecko) Version/4.0 Safari/528.16'),(3,'2009-04-27 20:55:14','86.7.67.16','page',1,'','Mozilla/5.0 (Macintosh; U; Intel Mac OS X 10_5_6; en-us) AppleWebKit/528.16 (KHTML, like Gecko) Version/4.0 Safari/528.16'),(4,'2009-04-27 20:56:00','86.7.67.16','page',1,'','Mozilla/5.0 (Macintosh; U; Intel Mac OS X 10_5_6; en-us) AppleWebKit/528.16 (KHTML, like Gecko) Version/4.0 Safari/528.16'),(5,'2009-04-27 21:00:12','86.7.67.16','page',1,'','Mozilla/5.0 (Macintosh; U; Intel Mac OS X 10_5_6; en-us) AppleWebKit/528.16 (KHTML, like Gecko) Version/4.0 Safari/528.16'),(6,'2009-04-27 21:00:38','86.7.67.16','page',1,'','Mozilla/5.0 (Macintosh; U; Intel Mac OS X 10_5_6; en-us) AppleWebKit/528.16 (KHTML, like Gecko) Version/4.0 Safari/528.16'),(7,'2009-04-27 21:00:43','86.7.67.16','page',1,'','Mozilla/5.0 (Macintosh; U; Intel Mac OS X 10_5_6; en-us) AppleWebKit/528.16 (KHTML, like Gecko) Version/4.0 Safari/528.16'),(8,'2009-04-27 21:01:11','86.7.67.16','page',1,'','Mozilla/5.0 (Macintosh; U; Intel Mac OS X 10_5_6; en-us) AppleWebKit/528.16 (KHTML, like Gecko) Version/4.0 Safari/528.16'),(9,'2009-04-27 21:01:22','86.7.67.16','page',1,'','Mozilla/5.0 (Macintosh; U; Intel Mac OS X 10_5_6; en-us) AppleWebKit/528.16 (KHTML, like Gecko) Version/4.0 Safari/528.16'),(10,'2009-04-27 21:03:03','86.7.67.16','page',1,'','Mozilla/5.0 (Macintosh; U; Intel Mac OS X 10_5_6; en-us) AppleWebKit/528.16 (KHTML, like Gecko) Version/4.0 Safari/528.16'),(11,'2009-04-27 21:03:58','86.7.67.16','page',1,'','Mozilla/5.0 (Macintosh; U; Intel Mac OS X 10_5_6; en-us) AppleWebKit/528.16 (KHTML, like Gecko) Version/4.0 Safari/528.16'),(12,'2009-04-28 07:29:41','86.7.67.16','page',1,'','Mozilla/5.0 (Macintosh; U; Intel Mac OS X 10_5_6; en-us) AppleWebKit/528.16 (KHTML, like Gecko) Version/4.0 Safari/528.16'),(13,'2009-04-28 07:46:51','86.7.67.16','page',1,'','Mozilla/5.0 (Macintosh; U; Intel Mac OS X 10_5_6; en-us) AppleWebKit/528.16 (KHTML, like Gecko) Version/4.0 Safari/528.16'),(14,'2009-04-28 08:06:13','86.7.67.16','page',1,'','Mozilla/5.0 (Macintosh; U; Intel Mac OS X 10_5_6; en-us) AppleWebKit/528.16 (KHTML, like Gecko) Version/4.0 Safari/528.16'),(15,'2009-04-28 08:06:15','86.7.67.16','page',1,'','Mozilla/5.0 (Macintosh; U; Intel Mac OS X 10_5_6; en-us) AppleWebKit/528.16 (KHTML, like Gecko) Version/4.0 Safari/528.16'),(16,'2009-04-28 08:06:56','86.7.67.16','page',1,'','Mozilla/5.0 (Macintosh; U; Intel Mac OS X 10_5_6; en-us) AppleWebKit/528.16 (KHTML, like Gecko) Version/4.0 Safari/528.16'),(17,'2009-04-28 08:07:16','86.7.67.16','page',1,'','Mozilla/5.0 (Macintosh; U; Intel Mac OS X 10_5_6; en-us) AppleWebKit/528.16 (KHTML, like Gecko) Version/4.0 Safari/528.16'),(18,'2009-04-28 08:09:02','86.7.67.16','page',1,'','Mozilla/5.0 (Macintosh; U; Intel Mac OS X 10_5_6; en-us) AppleWebKit/528.16 (KHTML, like Gecko) Version/4.0 Safari/528.16'),(19,'2009-04-28 08:09:36','86.7.67.16','page',1,'','Mozilla/5.0 (Macintosh; U; Intel Mac OS X 10_5_6; en-us) AppleWebKit/528.16 (KHTML, like Gecko) Version/4.0 Safari/528.16'),(20,'2009-04-28 08:09:52','86.7.67.16','page',1,'','Mozilla/5.0 (Macintosh; U; Intel Mac OS X 10_5_6; en-us) AppleWebKit/528.16 (KHTML, like Gecko) Version/4.0 Safari/528.16'),(21,'2009-04-28 08:11:25','86.7.67.16','page',1,'','Mozilla/5.0 (Macintosh; U; Intel Mac OS X 10_5_6; en-us) AppleWebKit/528.16 (KHTML, like Gecko) Version/4.0 Safari/528.16'),(22,'2009-04-28 08:11:39','86.7.67.16','page',1,'','Mozilla/5.0 (Macintosh; U; Intel Mac OS X 10_5_6; en-us) AppleWebKit/528.16 (KHTML, like Gecko) Version/4.0 Safari/528.16'),(23,'2009-04-28 08:11:48','86.7.67.16','page',1,'','Mozilla/5.0 (Macintosh; U; Intel Mac OS X 10_5_6; en-us) AppleWebKit/528.16 (KHTML, like Gecko) Version/4.0 Safari/528.16'),(24,'2009-04-28 08:12:29','86.7.67.16','page',1,'','Mozilla/5.0 (Macintosh; U; Intel Mac OS X 10_5_6; en-us) AppleWebKit/528.16 (KHTML, like Gecko) Version/4.0 Safari/528.16'),(25,'2009-04-28 08:12:43','86.7.67.16','page',1,'','Mozilla/5.0 (Macintosh; U; Intel Mac OS X 10_5_6; en-us) AppleWebKit/528.16 (KHTML, like Gecko) Version/4.0 Safari/528.16'),(26,'2009-04-28 08:13:23','86.7.67.16','page',1,'','Mozilla/5.0 (Macintosh; U; Intel Mac OS X 10_5_6; en-us) AppleWebKit/528.16 (KHTML, like Gecko) Version/4.0 Safari/528.16'),(27,'2009-04-28 08:19:57','86.7.67.16','page',1,'','Mozilla/5.0 (Macintosh; U; Intel Mac OS X 10_5_6; en-us) AppleWebKit/528.16 (KHTML, like Gecko) Version/4.0 Safari/528.16'),(28,'2009-04-28 08:20:30','86.7.67.16','page',1,'','Mozilla/5.0 (Macintosh; U; Intel Mac OS X 10_5_6; en-us) AppleWebKit/528.16 (KHTML, like Gecko) Version/4.0 Safari/528.16'),(29,'2009-04-28 08:20:57','86.7.67.16','page',1,'','Mozilla/5.0 (Macintosh; U; Intel Mac OS X 10_5_6; en-us) AppleWebKit/528.16 (KHTML, like Gecko) Version/4.0 Safari/528.16'),(30,'2009-04-28 08:23:02','86.7.67.16','page',1,'','Mozilla/5.0 (Macintosh; U; Intel Mac OS X 10_5_6; en-us) AppleWebKit/528.16 (KHTML, like Gecko) Version/4.0 Safari/528.16'),(31,'2009-04-28 08:23:37','86.7.67.16','page',1,'','Mozilla/5.0 (Macintosh; U; Intel Mac OS X 10_5_6; en-us) AppleWebKit/528.16 (KHTML, like Gecko) Version/4.0 Safari/528.16'),(32,'2009-04-28 08:23:58','86.7.67.16','page',1,'','Mozilla/5.0 (Macintosh; U; Intel Mac OS X 10_5_6; en-us) AppleWebKit/528.16 (KHTML, like Gecko) Version/4.0 Safari/528.16'),(33,'2009-04-28 08:24:27','86.7.67.16','page',1,'','Mozilla/5.0 (Macintosh; U; Intel Mac OS X 10_5_6; en-us) AppleWebKit/528.16 (KHTML, like Gecko) Version/4.0 Safari/528.16'),(34,'2009-04-28 08:25:59','86.7.67.16','page',1,'','Mozilla/5.0 (Macintosh; U; Intel Mac OS X 10_5_6; en-us) AppleWebKit/528.16 (KHTML, like Gecko) Version/4.0 Safari/528.16'),(35,'2009-04-28 08:27:26','86.7.67.16','page',1,'','Mozilla/5.0 (Macintosh; U; Intel Mac OS X 10_5_6; en-us) AppleWebKit/528.16 (KHTML, like Gecko) Version/4.0 Safari/528.16'),(36,'2009-04-28 08:28:34','86.7.67.16','page',1,'','Mozilla/5.0 (Macintosh; U; Intel Mac OS X 10_5_6; en-us) AppleWebKit/528.16 (KHTML, like Gecko) Version/4.0 Safari/528.16'),(37,'2009-04-28 08:28:42','86.7.67.16','page',1,'','Mozilla/5.0 (Macintosh; U; Intel Mac OS X 10_5_6; en-us) AppleWebKit/528.16 (KHTML, like Gecko) Version/4.0 Safari/528.16'),(38,'2009-04-28 08:29:25','86.7.67.16','page',1,'','Mozilla/5.0 (Macintosh; U; Intel Mac OS X 10_5_6; en-us) AppleWebKit/528.16 (KHTML, like Gecko) Version/4.0 Safari/528.16'),(39,'2009-04-28 08:32:22','86.7.67.16','page',1,'','Mozilla/5.0 (Macintosh; U; Intel Mac OS X 10_5_6; en-us) AppleWebKit/528.16 (KHTML, like Gecko) Version/4.0 Safari/528.16'),(40,'2009-04-28 08:33:10','86.7.67.16','page',1,'','Mozilla/5.0 (Macintosh; U; Intel Mac OS X 10_5_6; en-us) AppleWebKit/528.16 (KHTML, like Gecko) Version/4.0 Safari/528.16'),(41,'2009-04-28 08:49:21','86.7.67.16','page',1,'','Mozilla/5.0 (Macintosh; U; Intel Mac OS X 10_5_6; en-us) AppleWebKit/528.16 (KHTML, like Gecko) Version/4.0 Safari/528.16'),(42,'2009-04-28 08:49:32','86.7.67.16','page',1,'','Mozilla/5.0 (Macintosh; U; Intel Mac OS X 10_5_6; en-us) AppleWebKit/528.16 (KHTML, like Gecko) Version/4.0 Safari/528.16'),(43,'2009-04-28 08:56:44','86.7.67.16','page',1,'','Mozilla/5.0 (Macintosh; U; Intel Mac OS X 10_5_6; en-us) AppleWebKit/528.16 (KHTML, like Gecko) Version/4.0 Safari/528.16'),(44,'2009-04-28 08:56:59','86.7.67.16','page',1,'','Mozilla/5.0 (Macintosh; U; Intel Mac OS X 10_5_6; en-us) AppleWebKit/528.16 (KHTML, like Gecko) Version/4.0 Safari/528.16'),(45,'2009-04-28 10:00:26','86.151.155.59','page',1,'','Mozilla/5.0 (Macintosh; U; Intel Mac OS X 10_5_6; en-us) AppleWebKit/528.16 (KHTML, like Gecko) Version/4.0 Safari/528.16'),(46,'2009-04-28 10:10:22','86.151.155.59','page',1,'','Mozilla/5.0 (Macintosh; U; Intel Mac OS X 10_5_6; en-us) AppleWebKit/528.16 (KHTML, like Gecko) Version/4 Public Beta Safari/528.16'),(47,'2009-04-28 11:22:31','86.151.155.59','page',1,'','Mozilla/5.0 (Macintosh; U; Intel Mac OS X 10_5_6; en-us) AppleWebKit/528.16 (KHTML, like Gecko) Version/4 Public Beta Safari/528.16'),(48,'2009-04-28 22:16:09','67.220.101.136','page',1,'','Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; .NET CLR 1.0.3705)'),(49,'2009-04-28 22:16:09','67.220.101.136','page',1,'','Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; .NET CLR 1.0.3705)'),(50,'2009-04-29 10:43:02','86.7.67.16','page',1,'','Mozilla/5.0 (Macintosh; U; Intel Mac OS X 10_5_6; en-us) AppleWebKit/528.16 (KHTML, like Gecko) Version/4 Public Beta Safari/528.16'),(51,'2009-04-29 20:57:18','86.7.67.16','page',1,'','Mozilla/5.0 (Macintosh; U; Intel Mac OS X 10_5_6; en-us) AppleWebKit/528.16 (KHTML, like Gecko) Version/4 Public Beta Safari/528.16'),(52,'2009-05-01 12:06:18','86.154.126.235','page',1,'','Mozilla/5.0 (Macintosh; U; Intel Mac OS X 10_5_6; en-us) AppleWebKit/528.16 (KHTML, like Gecko) Version/4.0 Safari/528.16'),(53,'2009-05-01 12:23:22','86.154.126.235','page',1,'','Mozilla/5.0 (Macintosh; U; Intel Mac OS X 10.5; en-US; rv:1.9.0.10) Gecko/2009042315 Firefox/3.0.10'),(54,'2009-05-01 13:22:45','86.154.126.235','page',1,'','Mozilla/5.0 (Macintosh; U; Intel Mac OS X 10_5_6; en-us) AppleWebKit/528.16 (KHTML, like Gecko) Version/4.0 Safari/528.16'),(55,'2009-05-02 16:46:37','86.7.67.16','page',1,'','Mozilla/5.0 (Macintosh; U; Intel Mac OS X 10_5_6; en-us) AppleWebKit/528.16 (KHTML, like Gecko) Version/4.0 Safari/528.16'),(56,'2009-05-02 17:09:16','86.7.67.16','page',1,'','Mozilla/5.0 (Macintosh; U; Intel Mac OS X 10_5_6; en-us) AppleWebKit/528.16 (KHTML, like Gecko) Version/4.0 Safari/528.16'),(57,'2009-05-02 17:14:56','86.7.67.16','page',1,'','Mozilla/5.0 (Macintosh; U; Intel Mac OS X 10_5_6; en-us) AppleWebKit/528.16 (KHTML, like Gecko) Version/4.0 Safari/528.16'),(58,'2009-05-02 17:15:58','86.7.67.16','page',1,'','Mozilla/5.0 (Macintosh; U; Intel Mac OS X 10_5_6; en-us) AppleWebKit/528.16 (KHTML, like Gecko) Version/4.0 Safari/528.16'),(59,'2009-05-02 17:16:05','86.7.67.16','page',1,'http://beta.zestcms.com/','Mozilla/5.0 (Macintosh; U; Intel Mac OS X 10_5_6; en-us) AppleWebKit/528.16 (KHTML, like Gecko) Version/4.0 Safari/528.16'),(60,'2009-05-02 17:16:07','86.7.67.16','page',1,'http://beta.zestcms.com/test','Mozilla/5.0 (Macintosh; U; Intel Mac OS X 10_5_6; en-us) AppleWebKit/528.16 (KHTML, like Gecko) Version/4.0 Safari/528.16'),(61,'2009-05-02 17:16:09','86.7.67.16','page',1,'http://beta.zestcms.com/','Mozilla/5.0 (Macintosh; U; Intel Mac OS X 10_5_6; en-us) AppleWebKit/528.16 (KHTML, like Gecko) Version/4.0 Safari/528.16'),(62,'2009-05-02 17:16:12','86.7.67.16','page',1,'http://beta.zestcms.com/test','Mozilla/5.0 (Macintosh; U; Intel Mac OS X 10_5_6; en-us) AppleWebKit/528.16 (KHTML, like Gecko) Version/4.0 Safari/528.16'),(63,'2009-05-02 17:16:40','86.7.67.16','page',1,'http://beta.zestcms.com/test','Mozilla/5.0 (Macintosh; U; Intel Mac OS X 10_5_6; en-us) AppleWebKit/528.16 (KHTML, like Gecko) Version/4.0 Safari/528.16'),(64,'2009-05-02 17:24:13','86.7.67.16','page',2,'','Mozilla/5.0 (Macintosh; U; Intel Mac OS X 10_5_6; en-us) AppleWebKit/528.16 (KHTML, like Gecko) Version/4.0 Safari/528.16'),(65,'2009-05-02 17:25:34','86.7.67.16','page',2,'','Mozilla/5.0 (Macintosh; U; Intel Mac OS X 10_5_6; en-us) AppleWebKit/528.16 (KHTML, like Gecko) Version/4.0 Safari/528.16'),(66,'2009-05-02 17:25:44','86.7.67.16','page',1,'','Mozilla/5.0 (Macintosh; U; Intel Mac OS X 10_5_6; en-us) AppleWebKit/528.16 (KHTML, like Gecko) Version/4.0 Safari/528.16'),(67,'2009-05-02 17:25:54','86.7.67.16','page',1,'','Mozilla/5.0 (Macintosh; U; Intel Mac OS X 10_5_6; en-us) AppleWebKit/528.16 (KHTML, like Gecko) Version/4.0 Safari/528.16'),(68,'2009-05-02 17:26:10','86.7.67.16','page',1,'','Mozilla/5.0 (Macintosh; U; Intel Mac OS X 10_5_6; en-us) AppleWebKit/528.16 (KHTML, like Gecko) Version/4.0 Safari/528.16'),(69,'2009-05-02 17:26:17','86.7.67.16','page',1,'','Mozilla/5.0 (Macintosh; U; Intel Mac OS X 10_5_6; en-us) AppleWebKit/528.16 (KHTML, like Gecko) Version/4.0 Safari/528.16'),(70,'2009-05-02 17:26:20','86.7.67.16','page',2,'','Mozilla/5.0 (Macintosh; U; Intel Mac OS X 10_5_6; en-us) AppleWebKit/528.16 (KHTML, like Gecko) Version/4.0 Safari/528.16'),(71,'2009-05-02 17:26:24','86.7.67.16','page',1,'','Mozilla/5.0 (Macintosh; U; Intel Mac OS X 10_5_6; en-us) AppleWebKit/528.16 (KHTML, like Gecko) Version/4.0 Safari/528.16'),(72,'2009-05-02 17:26:33','86.7.67.16','page',2,'','Mozilla/5.0 (Macintosh; U; Intel Mac OS X 10_5_6; en-us) AppleWebKit/528.16 (KHTML, like Gecko) Version/4.0 Safari/528.16'),(73,'2009-05-02 17:29:47','86.7.67.16','page',2,'','Mozilla/5.0 (Macintosh; U; Intel Mac OS X 10_5_6; en-us) AppleWebKit/528.16 (KHTML, like Gecko) Version/4.0 Safari/528.16'),(74,'2009-05-02 17:29:51','86.7.67.16','page',2,'','Mozilla/5.0 (Macintosh; U; Intel Mac OS X 10_5_6; en-us) AppleWebKit/528.16 (KHTML, like Gecko) Version/4.0 Safari/528.16'),(75,'2009-05-02 17:30:10','86.7.67.16','page',2,'','Mozilla/5.0 (Macintosh; U; Intel Mac OS X 10_5_6; en-us) AppleWebKit/528.16 (KHTML, like Gecko) Version/4.0 Safari/528.16'),(76,'2009-05-02 17:36:52','86.7.67.16','page',2,'','Mozilla/5.0 (Macintosh; U; Intel Mac OS X 10_5_6; en-us) AppleWebKit/528.16 (KHTML, like Gecko) Version/4.0 Safari/528.16'),(77,'2009-05-02 17:36:56','86.7.67.16','page',2,'','Mozilla/5.0 (Macintosh; U; Intel Mac OS X 10_5_6; en-us) AppleWebKit/528.16 (KHTML, like Gecko) Version/4.0 Safari/528.16'),(78,'2009-05-02 17:37:01','86.7.67.16','page',2,'','Mozilla/5.0 (Macintosh; U; Intel Mac OS X 10_5_6; en-us) AppleWebKit/528.16 (KHTML, like Gecko) Version/4.0 Safari/528.16'),(79,'2009-05-02 17:37:04','86.7.67.16','page',2,'','Mozilla/5.0 (Macintosh; U; Intel Mac OS X 10_5_6; en-us) AppleWebKit/528.16 (KHTML, like Gecko) Version/4.0 Safari/528.16'),(80,'2009-05-02 17:38:49','86.7.67.16','page',2,'','Mozilla/5.0 (Macintosh; U; Intel Mac OS X 10_5_6; en-us) AppleWebKit/528.16 (KHTML, like Gecko) Version/4.0 Safari/528.16'),(81,'2009-05-02 17:38:54','86.7.67.16','page',1,'http://beta.zestcms.com/en/test','Mozilla/5.0 (Macintosh; U; Intel Mac OS X 10_5_6; en-us) AppleWebKit/528.16 (KHTML, like Gecko) Version/4.0 Safari/528.16'),(82,'2009-05-02 17:38:56','86.7.67.16','page',2,'http://beta.zestcms.com/en/','Mozilla/5.0 (Macintosh; U; Intel Mac OS X 10_5_6; en-us) AppleWebKit/528.16 (KHTML, like Gecko) Version/4.0 Safari/528.16'),(83,'2009-05-02 17:39:01','86.7.67.16','page',2,'','Mozilla/5.0 (Macintosh; U; Intel Mac OS X 10_5_6; en-us) AppleWebKit/528.16 (KHTML, like Gecko) Version/4.0 Safari/528.16'),(84,'2009-05-02 17:39:05','86.7.67.16','page',1,'http://beta.zestcms.com/fr/test','Mozilla/5.0 (Macintosh; U; Intel Mac OS X 10_5_6; en-us) AppleWebKit/528.16 (KHTML, like Gecko) Version/4.0 Safari/528.16'),(85,'2009-05-02 17:39:19','86.7.67.16','page',1,'','Mozilla/5.0 (Macintosh; U; Intel Mac OS X 10_5_6; en-us) AppleWebKit/528.16 (KHTML, like Gecko) Version/4.0 Safari/528.16'),(86,'2009-05-02 17:44:33','86.7.67.16','page',1,'','Mozilla/5.0 (Macintosh; U; Intel Mac OS X 10_5_6; en-us) AppleWebKit/528.16 (KHTML, like Gecko) Version/4.0 Safari/528.16'),(87,'2009-05-02 17:45:03','86.7.67.16','page',1,'','Mozilla/5.0 (Macintosh; U; Intel Mac OS X 10_5_6; en-us) AppleWebKit/528.16 (KHTML, like Gecko) Version/4.0 Safari/528.16'),(88,'2009-05-02 17:45:07','86.7.67.16','page',2,'http://beta.zestcms.com/','Mozilla/5.0 (Macintosh; U; Intel Mac OS X 10_5_6; en-us) AppleWebKit/528.16 (KHTML, like Gecko) Version/4.0 Safari/528.16'),(89,'2009-05-02 17:48:41','86.7.67.16','page',1,'','Mozilla/5.0 (Macintosh; U; Intel Mac OS X 10_5_6; en-us) AppleWebKit/528.16 (KHTML, like Gecko) Version/4.0 Safari/528.16'),(90,'2009-05-02 17:48:46','86.7.67.16','page',2,'http://beta.zestcms.com/','Mozilla/5.0 (Macintosh; U; Intel Mac OS X 10_5_6; en-us) AppleWebKit/528.16 (KHTML, like Gecko) Version/4.0 Safari/528.16'),(91,'2009-05-02 17:48:52','86.7.67.16','page',2,'','Mozilla/5.0 (Macintosh; U; Intel Mac OS X 10_5_6; en-us) AppleWebKit/528.16 (KHTML, like Gecko) Version/4.0 Safari/528.16'),(92,'2009-05-02 17:48:54','86.7.67.16','page',1,'http://beta.zestcms.com/fr/test','Mozilla/5.0 (Macintosh; U; Intel Mac OS X 10_5_6; en-us) AppleWebKit/528.16 (KHTML, like Gecko) Version/4.0 Safari/528.16'),(93,'2009-05-02 17:50:02','86.7.67.16','page',1,'','Mozilla/5.0 (Macintosh; U; Intel Mac OS X 10_5_6; en-us) AppleWebKit/528.16 (KHTML, like Gecko) Version/4.0 Safari/528.16'),(94,'2009-05-02 17:50:48','86.7.67.16','page',1,'','Mozilla/5.0 (Macintosh; U; Intel Mac OS X 10_5_6; en-us) AppleWebKit/528.16 (KHTML, like Gecko) Version/4.0 Safari/528.16'),(95,'2009-05-03 11:21:20','86.7.67.16','page',1,'','Mozilla/5.0 (Macintosh; U; Intel Mac OS X 10_5_6; en-us) AppleWebKit/528.16 (KHTML, like Gecko) Version/4 Public Beta Safari/528.16'),(96,'2009-05-03 12:50:08','86.7.67.16','page',1,'','Mozilla/5.0 (Macintosh; U; Intel Mac OS X 10_5_6; en-us) AppleWebKit/528.16 (KHTML, like Gecko) Version/4.0 Safari/528.16'),(97,'2009-05-03 12:58:22','86.7.67.16','page',1,'','Mozilla/5.0 (Macintosh; U; Intel Mac OS X 10_5_6; en-us) AppleWebKit/528.16 (KHTML, like Gecko) Version/4 Public Beta Safari/528.16'),(98,'2009-05-03 13:05:53','86.7.67.16','page',1,'http://beta.zestcms.com/admin/login','Mozilla/5.0 (Macintosh; U; Intel Mac OS X 10_5_6; en-us) AppleWebKit/528.16 (KHTML, like Gecko) Version/4.0 Safari/528.16'),(99,'2009-05-03 14:14:48','86.7.67.16','page',1,'','Mozilla/5.0 (Macintosh; U; Intel Mac OS X 10_5_6; en-us) AppleWebKit/528.16 (KHTML, like Gecko) Version/4 Public Beta Safari/528.16'),(100,'2009-05-03 15:00:35','86.7.67.16','page',1,'','Mozilla/5.0 (Macintosh; U; Intel Mac OS X 10_5_6; en-us) AppleWebKit/528.16 (KHTML, like Gecko) Version/4.0 Safari/528.16'),(101,'2009-05-03 15:00:39','86.7.67.16','page',1,'','Mozilla/5.0 (Macintosh; U; Intel Mac OS X 10_5_6; en-us) AppleWebKit/528.16 (KHTML, like Gecko) Version/4.0 Safari/528.16'),(102,'2009-05-03 15:00:42','86.7.67.16','page',1,'','Mozilla/5.0 (Macintosh; U; Intel Mac OS X 10_5_6; en-us) AppleWebKit/528.16 (KHTML, like Gecko) Version/4.0 Safari/528.16'),(103,'2009-05-03 15:01:33','86.7.67.16','page',1,'','Mozilla/5.0 (Macintosh; U; Intel Mac OS X 10_5_6; en-us) AppleWebKit/528.16 (KHTML, like Gecko) Version/4.0 Safari/528.16'),(104,'2009-05-03 15:31:34','86.7.67.16','page',1,'','Mozilla/5.0 (Macintosh; U; Intel Mac OS X 10.5; en-US; rv:1.9.0.10) Gecko/2009042315 Firefox/3.0.10'),(105,'2009-05-03 16:34:47','86.7.67.16','page',1,'http://beta.zestcms.com/admin/profile','Mozilla/5.0 (Macintosh; U; Intel Mac OS X 10.5; en-US; rv:1.9.0.10) Gecko/2009042315 Firefox/3.0.10'),(106,'2009-05-03 17:29:56','86.7.67.16','page',1,'http://beta.zestcms.com/admin/media','Mozilla/5.0 (Macintosh; U; Intel Mac OS X 10.5; en-US; rv:1.9.0.10) Gecko/2009042315 Firefox/3.0.10'),(107,'2009-05-03 17:31:51','86.7.67.16','page',1,'http://beta.zestcms.com/admin/media','Mozilla/5.0 (Macintosh; U; Intel Mac OS X 10.5; en-US; rv:1.9.0.10) Gecko/2009042315 Firefox/3.0.10'),(108,'2009-05-03 17:34:06','86.7.67.16','page',1,'http://beta.zestcms.com/admin/media','Mozilla/5.0 (Macintosh; U; Intel Mac OS X 10.5; en-US; rv:1.9.0.10) Gecko/2009042315 Firefox/3.0.10'),(109,'2009-05-03 17:38:00','86.7.67.16','page',1,'http://beta.zestcms.com/admin/media','Mozilla/5.0 (Macintosh; U; Intel Mac OS X 10.5; en-US; rv:1.9.0.10) Gecko/2009042315 Firefox/3.0.10'),(110,'2009-05-03 17:38:40','86.7.67.16','page',1,'http://beta.zestcms.com/admin/media','Mozilla/5.0 (Macintosh; U; Intel Mac OS X 10.5; en-US; rv:1.9.0.10) Gecko/2009042315 Firefox/3.0.10'),(111,'2009-05-04 15:34:50','86.7.67.16','page',1,'','Mozilla/5.0 (Macintosh; U; Intel Mac OS X 10_5_6; en-us) AppleWebKit/528.16 (KHTML, like Gecko) Version/4 Public Beta Safari/528.16'),(112,'2009-05-04 17:35:21','86.7.67.16','page',1,'','Mozilla/5.0 (Macintosh; U; Intel Mac OS X 10_5_6; en-us) AppleWebKit/528.16 (KHTML, like Gecko) Version/4 Public Beta Safari/528.16'),(113,'2009-05-05 03:02:47','66.249.65.49','page',1,'','Mozilla/5.0 (compatible; Googlebot/2.1; +http://www.google.com/bot.html)'),(114,'2009-05-05 03:02:47','66.249.65.49','page',1,'','Mozilla/5.0 (compatible; Googlebot/2.1; +http://www.google.com/bot.html)'),(115,'2009-05-05 03:12:47','66.249.65.49','page',1,'','Mozilla/5.0 (compatible; Googlebot/2.1; +http://www.google.com/bot.html)'),(116,'2009-05-05 03:21:27','66.249.65.49','page',1,'','Mozilla/5.0 (compatible; Googlebot/2.1; +http://www.google.com/bot.html)'),(117,'2009-05-05 06:21:31','66.249.65.49','page',1,'','Mozilla/5.0 (compatible; Googlebot/2.1; +http://www.google.com/bot.html)'),(118,'2009-05-05 07:57:49','86.7.67.16','page',1,'','Mozilla/5.0 (Macintosh; U; Intel Mac OS X 10_5_6; en-us) AppleWebKit/528.16 (KHTML, like Gecko) Version/4 Public Beta Safari/528.16'),(119,'2009-05-05 08:49:03','86.154.126.235','page',1,'','Mozilla/5.0 (Macintosh; U; Intel Mac OS X 10_5_6; en-us) AppleWebKit/528.16 (KHTML, like Gecko) Version/4.0 Safari/528.16'),(120,'2009-05-05 09:14:50','86.154.126.235','page',1,'','Mozilla/5.0 (Macintosh; U; Intel Mac OS X 10_5_6; en-us) AppleWebKit/528.16 (KHTML, like Gecko) Version/4.0 Safari/528.16'),(121,'2009-05-05 10:48:17','62.6.157.74','page',1,'','Mozilla/4.0 (compatible; MSIE 7.0; Windows NT 5.1; .NET CLR 1.1.4322; .NET CLR 2.0.50727; .NET CLR 3.0.04506.30)'),(122,'2009-05-05 10:48:54','62.6.157.74','page',1,'','Mozilla/4.0 (compatible; MSIE 7.0; Windows NT 5.1; .NET CLR 1.1.4322; .NET CLR 2.0.50727; .NET CLR 3.0.04506.30)'),(123,'2009-05-06 00:23:58','66.249.65.49','page',1,'','Mozilla/5.0 (compatible; Googlebot/2.1; +http://www.google.com/bot.html)'),(124,'2009-05-06 09:29:24','86.147.248.220','page',1,'','Mozilla/5.0 (Macintosh; U; Intel Mac OS X 10_5_6; en-us) AppleWebKit/528.16 (KHTML, like Gecko) Version/4 Public Beta Safari/528.16'),(125,'2009-05-06 11:01:27','86.147.248.220','page',1,'','Mozilla/5.0 (Macintosh; U; Intel Mac OS X 10_5_6; en-us) AppleWebKit/528.16 (KHTML, like Gecko) Version/4 Public Beta Safari/528.16'),(126,'2009-05-06 12:46:02','86.147.248.220','page',1,'','Mozilla/5.0 (Macintosh; U; Intel Mac OS X 10_5_6; en-us) AppleWebKit/528.16 (KHTML, like Gecko) Version/4 Public Beta Safari/528.16'),(127,'2009-05-06 15:03:18','86.147.248.220','page',1,'','Mozilla/5.0 (Macintosh; U; Intel Mac OS X 10_5_6; en-us) AppleWebKit/528.16 (KHTML, like Gecko) Version/4 Public Beta Safari/528.16'),(128,'2009-05-06 21:09:15','66.249.65.49','page',1,'','Mozilla/5.0 (compatible; Googlebot/2.1; +http://www.google.com/bot.html)'),(129,'2009-05-06 21:09:15','66.249.65.49','page',1,'','Mozilla/5.0 (compatible; Googlebot/2.1; +http://www.google.com/bot.html)'),(130,'2009-05-07 00:26:09','66.249.65.49','page',1,'','Mozilla/5.0 (compatible; Googlebot/2.1; +http://www.google.com/bot.html)'),(131,'2009-05-07 00:26:10','66.249.65.49','page',1,'','Mozilla/5.0 (compatible; Googlebot/2.1; +http://www.google.com/bot.html)'),(132,'2009-05-07 01:03:43','66.249.65.49','page',1,'','Mozilla/5.0 (compatible; Googlebot/2.1; +http://www.google.com/bot.html)'),(133,'2009-05-07 07:02:03','24.98.109.144','page',1,'','Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1)'),(134,'2009-05-07 10:13:27','86.7.67.16','page',1,'','Mozilla/5.0 (Macintosh; U; Intel Mac OS X 10_5_6; en-us) AppleWebKit/528.16 (KHTML, like Gecko) Version/4.0 Safari/528.16'),(135,'2009-05-07 14:19:19','88.96.119.190','page',1,'http://www.google.co.uk/search?client=firefox-a&rls=org.mozilla%3Aen-GB%3Aofficial&channel=s&hl=en&q=zest+cms&meta=&btnG=Google+Search','Mozilla/5.0 (Windows; U; Windows NT 5.1; en-GB; rv:1.8.1.17) Gecko/20080829 Firefox/2.0.0.17'),(136,'2009-05-07 14:19:26','88.96.119.190','page',1,'http://www.google.co.uk/search?client=firefox-a&rls=org.mozilla%3Aen-GB%3Aofficial&channel=s&hl=en&q=zest+cms&meta=&btnG=Google+Search','Mozilla/5.0 (Windows; U; Windows NT 5.1; en-GB; rv:1.8.1.17) Gecko/20080829 Firefox/2.0.0.17'),(137,'2009-05-07 14:19:48','88.96.119.190','page',1,'http://zest.marmdevelopment.co.uk/','Mozilla/5.0 (Windows; U; Windows NT 5.1; en-GB; rv:1.8.1.17) Gecko/20080829 Firefox/2.0.0.17'),(138,'2009-05-08 19:30:07','86.7.67.16','page',1,'','Mozilla/5.0 (Macintosh; U; Intel Mac OS X 10.5; en-US; rv:1.9.0.10) Gecko/2009042315 Firefox/3.0.10'),(139,'2009-05-08 19:30:43','86.7.67.16','page',1,'','Mozilla/5.0 (Macintosh; U; Intel Mac OS X 10.5; en-US; rv:1.9.0.10) Gecko/2009042315 Firefox/3.0.10'),(140,'2009-05-08 19:31:12','86.7.67.16','page',1,'','Mozilla/5.0 (Macintosh; U; Intel Mac OS X 10.5; en-US; rv:1.9.0.10) Gecko/2009042315 Firefox/3.0.10'),(141,'2009-05-08 19:41:58','86.7.67.16','page',1,'','Mozilla/5.0 (Macintosh; U; Intel Mac OS X 10.5; en-US; rv:1.9.0.10) Gecko/2009042315 Firefox/3.0.10'),(142,'2009-05-08 19:43:43','86.7.67.16','page',1,'','Mozilla/5.0 (Macintosh; U; Intel Mac OS X 10.5; en-US; rv:1.9.0.10) Gecko/2009042315 Firefox/3.0.10'),(143,'2009-05-08 19:44:40','86.7.67.16','page',1,'','Mozilla/5.0 (Macintosh; U; Intel Mac OS X 10.5; en-US; rv:1.9.0.10) Gecko/2009042315 Firefox/3.0.10'),(144,'2009-05-08 19:46:44','86.7.67.16','page',1,'','Mozilla/5.0 (Macintosh; U; Intel Mac OS X 10.5; en-US; rv:1.9.0.10) Gecko/2009042315 Firefox/3.0.10'),(145,'2009-05-08 19:49:13','86.7.67.16','page',1,'','Mozilla/5.0 (Macintosh; U; Intel Mac OS X 10.5; en-US; rv:1.9.0.10) Gecko/2009042315 Firefox/3.0.10'),(146,'2009-05-08 19:49:44','86.7.67.16','page',1,'','Mozilla/5.0 (Macintosh; U; Intel Mac OS X 10.5; en-US; rv:1.9.0.10) Gecko/2009042315 Firefox/3.0.10'),(147,'2009-05-08 19:50:10','86.7.67.16','page',1,'','Mozilla/5.0 (Macintosh; U; Intel Mac OS X 10.5; en-US; rv:1.9.0.10) Gecko/2009042315 Firefox/3.0.10'),(148,'2009-05-08 19:50:32','86.7.67.16','page',1,'','Mozilla/5.0 (Macintosh; U; Intel Mac OS X 10.5; en-US; rv:1.9.0.10) Gecko/2009042315 Firefox/3.0.10'),(149,'2009-05-08 19:51:45','86.7.67.16','page',1,'','Mozilla/5.0 (Macintosh; U; Intel Mac OS X 10.5; en-US; rv:1.9.0.10) Gecko/2009042315 Firefox/3.0.10'),(150,'2009-05-08 20:10:32','86.7.67.16','page',1,'','Mozilla/5.0 (Macintosh; U; Intel Mac OS X 10.5; en-US; rv:1.9.0.10) Gecko/2009042315 Firefox/3.0.10'),(151,'2009-05-08 20:12:14','86.7.67.16','page',1,'','Mozilla/5.0 (Macintosh; U; Intel Mac OS X 10.5; en-US; rv:1.9.0.10) Gecko/2009042315 Firefox/3.0.10'),(152,'2009-05-08 20:13:38','86.7.67.16','page',1,'','Mozilla/5.0 (Macintosh; U; Intel Mac OS X 10.5; en-US; rv:1.9.0.10) Gecko/2009042315 Firefox/3.0.10'),(153,'2009-05-08 20:13:59','86.7.67.16','page',1,'','Mozilla/5.0 (Macintosh; U; Intel Mac OS X 10.5; en-US; rv:1.9.0.10) Gecko/2009042315 Firefox/3.0.10'),(154,'2009-05-08 20:15:59','86.7.67.16','page',1,'','Mozilla/5.0 (Macintosh; U; Intel Mac OS X 10.5; en-US; rv:1.9.0.10) Gecko/2009042315 Firefox/3.0.10'),(155,'2009-05-08 20:32:08','86.7.67.16','page',1,'','Mozilla/5.0 (Macintosh; U; Intel Mac OS X 10.5; en-US; rv:1.9.0.10) Gecko/2009042315 Firefox/3.0.10'),(156,'2009-05-08 20:32:37','86.7.67.16','page',1,'','Mozilla/5.0 (Macintosh; U; Intel Mac OS X 10.5; en-US; rv:1.9.0.10) Gecko/2009042315 Firefox/3.0.10'),(157,'2009-05-08 20:33:00','86.7.67.16','page',1,'','Mozilla/5.0 (Macintosh; U; Intel Mac OS X 10.5; en-US; rv:1.9.0.10) Gecko/2009042315 Firefox/3.0.10'),(158,'2009-05-08 20:33:18','86.7.67.16','page',1,'','Mozilla/5.0 (Macintosh; U; Intel Mac OS X 10.5; en-US; rv:1.9.0.10) Gecko/2009042315 Firefox/3.0.10'),(159,'2009-05-08 20:36:51','86.7.67.16','page',1,'','Mozilla/5.0 (Macintosh; U; Intel Mac OS X 10.5; en-US; rv:1.9.0.10) Gecko/2009042315 Firefox/3.0.10'),(160,'2009-05-08 20:48:44','86.7.67.16','page',1,'','Mozilla/5.0 (Macintosh; U; Intel Mac OS X 10.5; en-US; rv:1.9.0.10) Gecko/2009042315 Firefox/3.0.10'),(161,'2009-05-08 20:52:04','86.7.67.16','page',1,'','Mozilla/5.0 (Macintosh; U; Intel Mac OS X 10.5; en-US; rv:1.9.0.10) Gecko/2009042315 Firefox/3.0.10'),(162,'2009-05-08 21:09:49','86.7.67.16','page',1,'','Mozilla/5.0 (Macintosh; U; Intel Mac OS X 10.5; en-US; rv:1.9.0.10) Gecko/2009042315 Firefox/3.0.10'),(163,'2009-05-08 21:11:49','86.7.67.16','page',1,'','Mozilla/5.0 (Macintosh; U; Intel Mac OS X 10.5; en-US; rv:1.9.0.10) Gecko/2009042315 Firefox/3.0.10'),(164,'2009-05-08 21:14:20','86.7.67.16','page',1,'','Mozilla/5.0 (Macintosh; U; Intel Mac OS X 10.5; en-US; rv:1.9.0.10) Gecko/2009042315 Firefox/3.0.10'),(165,'2009-05-08 21:17:00','86.7.67.16','page',1,'','Mozilla/5.0 (Macintosh; U; Intel Mac OS X 10.5; en-US; rv:1.9.0.10) Gecko/2009042315 Firefox/3.0.10'),(166,'2009-05-08 21:17:24','86.7.67.16','page',1,'','Mozilla/5.0 (Macintosh; U; Intel Mac OS X 10.5; en-US; rv:1.9.0.10) Gecko/2009042315 Firefox/3.0.10');
/*!40000 ALTER TABLE `zest_statistics` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `zest_statuses`
--

DROP TABLE IF EXISTS `zest_statuses`;
CREATE TABLE `zest_statuses` (
  `id` int(11) NOT NULL auto_increment,
  `title` text,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `zest_statuses`
--

LOCK TABLES `zest_statuses` WRITE;
/*!40000 ALTER TABLE `zest_statuses` DISABLE KEYS */;
INSERT INTO `zest_statuses` VALUES (1,'Unpublished'),(2,'Published');
/*!40000 ALTER TABLE `zest_statuses` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `zest_tags`
--

DROP TABLE IF EXISTS `zest_tags`;
CREATE TABLE `zest_tags` (
  `id` int(11) NOT NULL auto_increment,
  `title` text,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `zest_tags`
--

LOCK TABLES `zest_tags` WRITE;
/*!40000 ALTER TABLE `zest_tags` DISABLE KEYS */;
/*!40000 ALTER TABLE `zest_tags` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `zest_templates`
--

DROP TABLE IF EXISTS `zest_templates`;
CREATE TABLE `zest_templates` (
  `id` int(11) NOT NULL auto_increment,
  `title` text,
  `url` text,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `zest_templates`
--

LOCK TABLES `zest_templates` WRITE;
/*!40000 ALTER TABLE `zest_templates` DISABLE KEYS */;
INSERT INTO `zest_templates` VALUES (1,'main','main');
/*!40000 ALTER TABLE `zest_templates` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `zest_user_discounts`
--

DROP TABLE IF EXISTS `zest_user_discounts`;
CREATE TABLE `zest_user_discounts` (
  `id` int(11) NOT NULL auto_increment,
  `user_id` int(11) NOT NULL default '0',
  `product_category_id` int(11) NOT NULL default '0',
  `value` varchar(8) default NULL,
  PRIMARY KEY  (`id`),
  KEY `product_category_id` (`product_category_id`),
  CONSTRAINT `zest_user_discounts_ibfk_1` FOREIGN KEY (`product_category_id`) REFERENCES `zest_product_categories` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `zest_user_discounts`
--

LOCK TABLES `zest_user_discounts` WRITE;
/*!40000 ALTER TABLE `zest_user_discounts` DISABLE KEYS */;
/*!40000 ALTER TABLE `zest_user_discounts` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `zest_user_tokens`
--

DROP TABLE IF EXISTS `zest_user_tokens`;
CREATE TABLE `zest_user_tokens` (
  `id` int(11) unsigned NOT NULL auto_increment,
  `user_id` int(11) unsigned NOT NULL,
  `user_agent` text NOT NULL,
  `token` varchar(32) NOT NULL,
  `created` int(10) unsigned NOT NULL,
  `expires` int(10) unsigned NOT NULL,
  PRIMARY KEY  (`id`),
  UNIQUE KEY `uniq_token` (`token`),
  KEY `user_id` (`user_id`),
  CONSTRAINT `zest_user_tokens_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `zest_users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `zest_user_tokens`
--

LOCK TABLES `zest_user_tokens` WRITE;
/*!40000 ALTER TABLE `zest_user_tokens` DISABLE KEYS */;
/*!40000 ALTER TABLE `zest_user_tokens` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `zest_users`
--

DROP TABLE IF EXISTS `zest_users`;
CREATE TABLE `zest_users` (
  `id` int(11) unsigned NOT NULL auto_increment,
  `email` varchar(42) NOT NULL,
  `first_name` text,
  `last_name` text,
  `username` varchar(32) NOT NULL default '',
  `password` char(50) NOT NULL,
  `language_id` int(11) unsigned NOT NULL default '1',
  `receive_newsletter` tinyint(4) unsigned NOT NULL default '0',
  `date_added` timestamp NOT NULL default CURRENT_TIMESTAMP,
  `logins` int(10) unsigned NOT NULL default '0',
  `last_login` int(10) unsigned default NULL,
  `openid` text,
  PRIMARY KEY  (`id`),
  UNIQUE KEY `uniq_username` (`username`),
  UNIQUE KEY `uniq_email` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `zest_users`
--

LOCK TABLES `zest_users` WRITE;
/*!40000 ALTER TABLE `zest_users` DISABLE KEYS */;
INSERT INTO `zest_users` VALUES (1,'enquiries@marmaladeontoast.co.uk','Syd','Lawrence','marmalade','8242c47ff12698f1bbbf07bd880cf838e24594b495226fb8f0',1,0,'2009-04-27 20:38:31',14,1241811796,'http://marmaladeontoast.myopenid.com'),(2,'syd@sydlawrence.com',NULL,NULL,'sydlawrence','464c9af492941e27a20e28caf17ea71e789533ccabd8752306',1,0,'2009-05-03 13:01:25',4,1241356995,''),(3,'sydlawrence@me.com',NULL,NULL,'hackday','78d3d74c2f382a319d7858070a67abb4ac3ace204f8a70a3e8',1,0,'2009-05-08 20:54:57',0,NULL,NULL);
/*!40000 ALTER TABLE `zest_users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `zest_vat_rates`
--

DROP TABLE IF EXISTS `zest_vat_rates`;
CREATE TABLE `zest_vat_rates` (
  `id` int(11) NOT NULL auto_increment,
  `code` varchar(32) default NULL,
  `value` varchar(32) default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `zest_vat_rates`
--

LOCK TABLES `zest_vat_rates` WRITE;
/*!40000 ALTER TABLE `zest_vat_rates` DISABLE KEYS */;
/*!40000 ALTER TABLE `zest_vat_rates` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `zest_zones`
--

DROP TABLE IF EXISTS `zest_zones`;
CREATE TABLE `zest_zones` (
  `id` int(11) unsigned NOT NULL auto_increment,
  `title` text NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `zest_zones`
--

LOCK TABLES `zest_zones` WRITE;
/*!40000 ALTER TABLE `zest_zones` DISABLE KEYS */;
INSERT INTO `zest_zones` VALUES (1,'Africa'),(2,'Asia'),(3,'Europe'),(4,'Middle East'),(5,'South America'),(6,'North America');
/*!40000 ALTER TABLE `zest_zones` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2009-05-08 21:19:41
