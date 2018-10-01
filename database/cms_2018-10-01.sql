# ************************************************************
# Sequel Pro SQL dump
# Version 4541
#
# http://www.sequelpro.com/
# https://github.com/sequelpro/sequelpro
#
# Host: 127.0.0.1 (MySQL 5.6.41)
# Database: cms
# Generation Time: 2018-10-01 12:30:30 +0000
# ************************************************************


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


# Dump of table about_me
# ------------------------------------------------------------

DROP TABLE IF EXISTS `about_me`;

CREATE TABLE `about_me` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `content` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `about_me` WRITE;
/*!40000 ALTER TABLE `about_me` DISABLE KEYS */;

INSERT INTO `about_me` (`id`, `content`)
VALUES
	(1,'Former civil engineer, who recently took big steps towards to become a software developer. In last november received a scholarship from Udacity/Google Front-End Development, selected among 200.000 students, in february 2018, got accepted 2nd phase of the scholarship by reaching top 10% of 20.000 students.');

/*!40000 ALTER TABLE `about_me` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table projects
# ------------------------------------------------------------

DROP TABLE IF EXISTS `projects`;

CREATE TABLE `projects` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `p_title` varchar(255) NOT NULL DEFAULT '',
  `p_content` text NOT NULL,
  `code_url` text,
  `see_url` text,
  `bg_image_url` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `projects` WRITE;
/*!40000 ALTER TABLE `projects` DISABLE KEYS */;

INSERT INTO `projects` (`id`, `p_title`, `p_content`, `code_url`, `see_url`, `bg_image_url`)
VALUES
	(1,'To-Do App','You can easily add a new to-do, hover and click trash-icon to delete an existing to-do, click on an existing to-do to strike-through effect','https://github.com/ucanfil/Todo-App','https://ucanfil.github.io/Todo-App/','../img/todo-medium_600.png'),
	(2,'Portfolio Website','Full responsive portfolio site build with pure vanilla javascript, css3, flexbox','https://github.com/ucanfil/Portfolio-Site','https://ucanfil.github.io/Portfolio-Site/','../img/portfolio-medium_600.png'),
	(3,'Color Game','Built with vanilla javaScript, based on RGB code given randomly, you try to guess the correct color, there are two difficulty level options','https://github.com/ucanfil/Color-Game','https://ucanfil.github.io/Color-Game/','../img/colorgame-medium_600.png'),
	(4,'Cat Clicker App','This project is made using MVC (MV*) design pattern for scaling purposes in the future. Styling was not number one priority.','https://github.com/ucanfil/Cat-Clicker','https://ucanfil.github.io/Cat-Clicker/','../img/catclicker-medium_600.png'),
	(5,'Memory Game','Built with vanilla javaScript, This is a game which players test their memory. Players pick cards from deck of 16 cards, and try to pair them.','https://github.com/ucanfil/Memory-Game','https://ucanfil.github.io/Memory-Game/','../img/matchinggame-medium_600.png'),
	(6,'Frogger Game','Project is made as part of Front-End Nanodegree by Udacity, in order to practice object-oriented programming concepts.','https://github.com/ucanfil/Arcade-Game','https://ucanfil.github.io/Arcade-Game/','../img/froggergame-medium_600.png'),
	(7,'My Reads','','https://github.com/ucanfil/MyReads',NULL,''),
	(8,'Eat\'nDrink','','https://github.com/ucanfil/dineobath','https://ucanfil.github.io/dineobath/','');

/*!40000 ALTER TABLE `projects` ENABLE KEYS */;
UNLOCK TABLES;



/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
