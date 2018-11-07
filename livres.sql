-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Nov 07, 2018 at 11:58 PM
-- Server version: 5.7.23
-- PHP Version: 7.2.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `project-blog`
--

-- --------------------------------------------------------

--
-- Table structure for table `livres`
--

DROP TABLE IF EXISTS `livres`;
CREATE TABLE IF NOT EXISTS `livres` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `titre` varchar(255) NOT NULL,
  `contenu` text NOT NULL,
  `date_creation` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `livres`
--

INSERT INTO `livres` (`id`, `titre`, `contenu`, `date_creation`) VALUES
(1, 'Billet simple pour l\'Alaska', 'Un homme, une hache et un chien nommé Fuzzy... que l\'aventure commence! Pris au piège d\'un travail qu\'il détestait et endetté jusqu\'au cou, la vie de Guy Grieve allait nulle part. Mais avec un coup de chance, son rêve d\'échapper à tout pour vivre dans la lointaine toundra de l\'Alaska s\'est soudainement réalisé. À quelques kilomètres de l\'homme le plus proche et armé de l\'équipement le plus élémentaire, Guy a construit une cabane en rondins et a commencé à se faire une vie en pêchant, en chassant et en évitant diligemment les ours. Rempli d\'aventures, d\'humour et de perspicacité, c\'est l\'histoire passionnante d\'un homme ordinaire qui apprend les chemins de la nature.', '2007-06-01 07:07:07');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
