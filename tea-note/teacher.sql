# Host: localhost  (Version: 5.5.53)
# Date: 2018-06-20 10:36:52
# Generator: MySQL-Front 5.3  (Build 4.234)

/*!40101 SET NAMES utf8 */;

#
# Structure for table "teacher"
#

DROP TABLE IF EXISTS `teacher`;
CREATE TABLE `teacher` (
  `tea_id` int(11) NOT NULL AUTO_INCREMENT,
  `DepartNo` char(2) NOT NULL,
  `tea_name` varchar(50) NOT NULL DEFAULT '',
  `Pwd` varchar(50) NOT NULL DEFAULT '',
  PRIMARY KEY (`tea_id`),
  KEY `DepartNo` (`DepartNo`)
) ENGINE=MyISAM AUTO_INCREMENT=926 DEFAULT CHARSET=utf8 ROW_FORMAT=FIXED;

#
# Data for table "teacher"
#

/*!40000 ALTER TABLE `teacher` DISABLE KEYS */;
/*!40000 ALTER TABLE `teacher` ENABLE KEYS */;
