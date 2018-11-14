-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Nov 14, 2018 at 10:20 PM
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
-- Database: `blogmvc`
--

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

DROP TABLE IF EXISTS `comments`;
CREATE TABLE IF NOT EXISTS `comments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `post_id` int(11) NOT NULL,
  `author` varchar(255) NOT NULL,
  `comment` text NOT NULL,
  `comment_date` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=33 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `post_id`, `author`, `comment`, `comment_date`) VALUES
(1, 1, 'ET', 'Un peu court ce billet !', '2010-03-25 16:49:53'),
(2, 1, 'ST', 'Oui, ça commence pas très fort ce blog...', '2010-03-25 16:57:16'),
(3, 2, 'Elenor', 'Preum\'s !', '2010-03-27 18:59:49'),
(4, 1, 'SArah', 'Excellente analyse de la situation !\r\nIl y arrivera plus tôt qu\'on ne le pense !', '2010-03-27 22:02:13'),
(5, 2, 'Mathieu', 'Preum\'s', '2017-09-24 17:12:30'),
(6, 2, 'Sam', 'Quelqu\'un a un avis là-dessus ? Je ne sais pas quoi en penser.', '2017-09-24 17:21:34'),
(7, 1, 'Jojo', 'C\'est moi !', '2017-09-28 19:50:14'),
(8, 2, 'Mathieu', 'Retest\r\nEncore', '2017-10-27 11:46:50'),
(9, 2, 'Sam', 'tu testes quoi ?', '2017-10-27 15:44:14'),
(10, 1, 'Emir', 'This is good\r\n', '2018-11-12 22:37:11'),
(11, 4, 'Sarah', 'I am happy to say this is the first comment in here\r\n', '2018-11-12 22:37:32'),
(12, 4, 'Elenor', 'I want my food', '2018-11-12 22:37:45'),
(13, 3, 'Emir', 'I am the dady here', '2018-11-12 22:38:03'),
(14, 2, 'EETTt', 'cool', '2018-11-13 21:52:53'),
(15, 1, 'HET', 'Yep', '2018-11-13 21:53:15'),
(16, 2, 'cghjgdf', 'dfghdf', '2018-11-14 11:15:01'),
(17, 2, 'sdg', 'dasfhsd', '2018-11-14 11:25:05'),
(18, 2, 'tetete', 'swtgefsd', '2018-11-14 12:07:46'),
(19, 1, 'SArah', 'Hellleo\r\n', '2018-11-14 20:17:54'),
(20, 1, 'ads', 'asfd', '2018-11-14 20:36:00'),
(21, 1, 'hgf', 'gfds', '2018-11-14 20:36:53'),
(22, 1, 'fd', 'hfd', '2018-11-14 20:37:26'),
(23, 1, 'bfd', 'dfg', '2018-11-14 20:38:04'),
(24, 1, 'tew', 'tre', '2018-11-14 20:38:33'),
(25, 1, 'tre', 'hjgdr', '2018-11-14 20:40:16'),
(26, 1, 'easrg', 'erf', '2018-11-14 20:40:34'),
(27, 1, 'swed', 'df', '2018-11-14 20:40:53'),
(28, 1, 'sadgf', 'asdf', '2018-11-14 20:41:53'),
(29, 1, 'asfs', 'aSS', '2018-11-14 20:44:03'),
(30, 1, 'asgdf', 'wEASR', '2018-11-14 20:44:59'),
(31, 1, 'aER', 'qwer', '2018-11-14 20:45:16'),
(32, 2, 'asfd', 'SD', '2018-11-14 20:56:55');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

DROP TABLE IF EXISTS `posts`;
CREATE TABLE IF NOT EXISTS `posts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `creation_date` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `title`, `content`, `creation_date`) VALUES
(1, 'Bienvenue sur mon blog !', 'Je vous souhaite à toutes et à tous la bienvenue sur mon blog qui parlera de... PHP bien sûr !', '2010-03-25 16:28:41'),
(2, 'Le PHP à la conquête du monde !', 'C\'est officiel, l\'éléPHPant a annoncé à la radio hier soir \"J\'ai l\'intention de conquérir le monde !\".\r\nIl a en outre précisé que le monde serait à sa botte en moins de temps qu\'il n\'en fallait pour dire \"éléPHPant\". Pas dur, ceci dit entre nous...', '2010-03-27 18:31:11');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
