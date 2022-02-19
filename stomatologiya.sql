-- Adminer 4.1.0 MySQL dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

DROP TABLE IF EXISTS `clients`;
CREATE TABLE `clients` (
  `id` int(11) NOT NULL,
  `fullname` varchar(200) NOT NULL,
  `birth` varchar(200) NOT NULL,
  `address` varchar(200) NOT NULL,
  `tel` varchar(200) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `clients` (`id`, `fullname`, `birth`, `address`, `tel`) VALUES
(0,	'Muhiddin Xalimetov',	'2000',	'Al-Xorazmiy 11',	''),
(1,	'Faxriddin Xalimetov',	'1998-05-11',	'Al-Xorazmiy 11',	'');

DROP TABLE IF EXISTS `doctors`;
CREATE TABLE `doctors` (
  `id` int(11) NOT NULL,
  `fullname` varchar(200) NOT NULL,
  `login` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `doctors` (`id`, `fullname`, `login`, `password`) VALUES
(0,	'Hamza Xalimetov',	'hamza',	'123456');

DROP TABLE IF EXISTS `list`;
CREATE TABLE `list` (
  `id` int(11) NOT NULL,
  `client` int(11) NOT NULL,
  `doctor` int(11) NOT NULL,
  `money` int(11) NOT NULL,
  `time` int(20) NOT NULL,
  `description` text,
  `status` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `list` (`id`, `client`, `doctor`, `money`, `time`, `description`, `status`) VALUES
(0,	0,	0,	20000,	1494938544,	'Molodes',	'12');

DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `type` int(11) NOT NULL,
  `id` int(11) NOT NULL,
  `fullname` varchar(200) NOT NULL,
  `login` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `users` (`type`, `id`, `fullname`, `login`, `password`) VALUES
(0,	1,	'Zoirjon Xalimetov',	'zoirjon',	'shivaki72'),
(1,	2,	'Registratura',	'registratura',	'159951');

-- 2017-05-17 14:27:48
