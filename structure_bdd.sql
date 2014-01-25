-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- Client: localhost
-- Généré le: Sam 25 Janvier 2014 à 11:43
-- Version du serveur: 5.6.12-log
-- Version de PHP: 5.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données: `blogphp`
--
CREATE DATABASE IF NOT EXISTS `blogphp` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `blogphp`;

-- --------------------------------------------------------

--
-- Structure de la table `articles`
--

CREATE TABLE IF NOT EXISTS `articles` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `titre` varchar(255) NOT NULL,
  `texte` text NOT NULL,
  `date` int(11) NOT NULL,
  `id_tag` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Contenu de la table `articles`
--

INSERT INTO `articles` (`id`, `titre`, `texte`, `date`, `id_tag`) VALUES
(1, 'Bienvenue !', 'Bonjour et bienvenue sur ce blog.\r\n\r\nCe blog a Ã©tÃ© crÃ©e durant ma licence professionnelle RÃ©seaux et SystÃ¨mes de communication dans le cours de PHP. \r\n\r\nIl m''a permit de dÃ©velopper en PHP, d''aborder le framework Smarty et Bootstrap. J''ai aussi pu manipuler Jquery.\r\n\r\nCe blog permet de visualiser des articles, d''en ajouter, d''en modifier et d''en supprimer tout en manipulant des tags et des images.\r\n\r\n\r\n', 1390569931, 0),
(2, 'Smarty', 'Smarty est un moteur de template rapide et qui permet la gestion des caches. Il sÃ©pare le fond et la forme.\r\n\r\nIl est simple et permet la collaboration en Ã©quipe. On.On obtient ainsi un code simplifiÃ© et propre.', 1390572104, 1),
(3, 'Jquery', 'Jquery est une bibliothÃ¨que Javascript qui permet de simplifier les commandes Javascript.\r\n\r\nElle permet de gÃ©rer des animations, des Ã©lÃ©ments du navigateur. Ainsi la page peut contenir des Ã©lÃ©ments dynamiques.', 1390572669, 3),
(4, 'Bootstrap', 'Bootstrap qui provient du rÃ©seau social permet de structurer les pages web grÃ¢ce Ã  un systÃ¨me de grille.\r\n\r\nIl propose aussi quelques plugins Jquery.', 1390573364, 1);

-- --------------------------------------------------------

--
-- Structure de la table `tags`
--

CREATE TABLE IF NOT EXISTS `tags` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) NOT NULL,
  `compteur` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Contenu de la table `tags`
--

INSERT INTO `tags` (`id`, `nom`, `compteur`) VALUES
(1, 'framework', 2),
(3, 'javascript', 1);

-- --------------------------------------------------------

--
-- Structure de la table `utilisateurs`
--

CREATE TABLE IF NOT EXISTS `utilisateurs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(100) NOT NULL,
  `mdp` varchar(30) NOT NULL,
  `sid` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Contenu de la table `utilisateurs`
--

INSERT INTO `utilisateurs` (`id`, `email`, `mdp`, `sid`) VALUES
(1, 'test@test.fr', 'test', '3d427d9549c1431272464956f05b4dcc');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
