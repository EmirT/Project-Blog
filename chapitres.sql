-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Nov 08, 2018 at 11:16 AM
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
-- Table structure for table `chapitres`
--

DROP TABLE IF EXISTS `chapitres`;
CREATE TABLE IF NOT EXISTS `chapitres` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `titre` varchar(255) NOT NULL,
  `chapitres_id` int(11) NOT NULL,
  `chapitre_livre` text NOT NULL,
  `creation_chap_date` datetime NOT NULL,
  `chapitre_details` text,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `chapitres`
--

INSERT INTO `chapitres` (`id`, `titre`, `chapitres_id`, `chapitre_livre`, `creation_chap_date`, `chapitre_details`) VALUES
(1, 'Billet simple pour l\'Alaska', 1, 'Je dans le primitif...', '2006-04-01 13:28:22', '27 avril 1992\r\nSalutations de Fairbanks! C\'est la dernière fois que tu vas entendre parler de moi, Wayne.\r\nArrivé ici il y a 2 jours. Il était très difficile d\'attraper des promenades au Yukon\r\nTerritoire. Mais je suis enfin arrivé ici.\r\nVeuillez renvoyer tout le courrier que je reçois à l\'expéditeur. Ça pourrait être très long\r\navant que je retourne au sud. Si cette aventure s\'avère fatale et que vous n\'entendez jamais parler\r\nde nouveau, je veux que vous sachiez que vous êtes un grand homme. Je marche maintenant dans le\r\nsauvage. Alex P\r\nEn été, la route aurait été rudimentaire mais praticable. maintenant c\'était\r\nrendues non navigables par un pied et demi de neige de printemps pâteuse. Dix miles de la\r\nautoroute, inquiet de rester coincé s’il conduisait plus loin, Gallien arrêta son gréement\r\nsur la crête d\'une faible hauteur. Les sommets glacés de la plus haute chaîne de montagnes de\r\nL’Amérique du Nord brillait à l’horizon sud-ouest.\r\nAlex a insisté pour donner à Gallien sa montre, son peigne et tout ce qu’il disait était\r\nson argent: quatre-vingt-cinq cents en pièces de monnaie. \"Je ne veux pas de votre argent\", Gallien\r\nprotesté, \"et j\'ai déjà une montre.\"\r\nGallien fit demi-tour, retourna à l’autoroute des parcs,\r\net a continué vers Anchorage. Quelques kilomètres plus loin, il est arrivé au\r\npetite communauté de Healy, où les soldats de l’État de l’Alaska maintiennent un poste.\r\nGallien envisagea brièvement de s’arrêter pour parler aux autorités d’Alex, puis\r\npensé mieux de lui. \"Je pensais qu\'il irait bien\", explique-t-il. \"Je pensais qu\'il\r\nprobablement avoir assez rapidement faim et sortir de l’autoroute. C\'est ce que\r\ntoute personne normale ferait. \"');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
