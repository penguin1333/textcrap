SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

DROP TABLE IF EXISTS `crap`;
CREATE TABLE `crap` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `url` text CHARACTER SET latin2 COLLATE latin2_czech_cs NOT NULL,
  `crap` text NOT NULL,
  `title` text NOT NULL,
  `ip` text NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
