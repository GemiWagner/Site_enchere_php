-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Sam 23 Janvier 2016 à 14:07
-- Version du serveur :  5.6.17
-- Version de PHP :  5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données :  `p1403797`
--

-- --------------------------------------------------------

--
-- Structure de la table `enchere`
--

CREATE TABLE IF NOT EXISTS `enchere` (
  `id_acheteur` int(11) unsigned NOT NULL,
  `id_obj` int(11) unsigned NOT NULL,
  `prix_enchere` float DEFAULT NULL,
  PRIMARY KEY (`id_acheteur`,`id_obj`),
  KEY `est_encherie` (`id_obj`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_520_ci;

-- --------------------------------------------------------

--
-- Structure de la table `objets`
--

CREATE TABLE IF NOT EXISTS `objets` (
  `id_o` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nom` varchar(30) COLLATE utf8_unicode_520_ci NOT NULL,
  `photo` varchar(200) COLLATE utf8_unicode_520_ci NOT NULL,
  `prix_mini` float NOT NULL,
  `date_debut` date NOT NULL,
  `date_fin` date NOT NULL,
  PRIMARY KEY (`id_o`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_520_ci AUTO_INCREMENT=15 ;

--
-- Contenu de la table `objets`
--

INSERT INTO `objets` (`id_o`, `nom`, `photo`, `prix_mini`, `date_debut`, `date_fin`) VALUES
(13, 'Arkenstone', 'http://img1.wikia.nocookie.net/__cb20141214115640/lotr/images/1/1b/Arkenstone.jpg', 481516000, '2015-11-04', '2015-11-19'),
(14, 'Arc', 'http://lagbt.wiwiland.net/wikibiblio/images/thumb/5/56/Auriels_bow.png/400px-Auriels_bow.png', 4003, '2015-11-11', '2015-11-14');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id_u` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nom` varchar(30) COLLATE utf8_unicode_520_ci NOT NULL,
  `mdp` varchar(30) COLLATE utf8_unicode_520_ci NOT NULL,
  `login` varchar(30) COLLATE utf8_unicode_520_ci NOT NULL,
  `adresse` varchar(100) COLLATE utf8_unicode_520_ci NOT NULL,
  `tel` varchar(10) COLLATE utf8_unicode_520_ci NOT NULL,
  PRIMARY KEY (`id_u`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_520_ci AUTO_INCREMENT=8 ;

--
-- Contenu de la table `users`
--

INSERT INTO `users` (`id_u`, `nom`, `mdp`, `login`, `adresse`, `tel`) VALUES
(1, 'admin', 'admin123', 'admin', 'romaint69@gmail.com', '0600000000'),
(7, 'Prez', 'prezprez', 'moi', 'moimoi@gmail.com', '0475659632');

-- --------------------------------------------------------

--
-- Structure de la table `vente`
--

CREATE TABLE IF NOT EXISTS `vente` (
  `id_vendeur` int(11) unsigned NOT NULL,
  `id_obj` int(11) unsigned NOT NULL,
  PRIMARY KEY (`id_vendeur`,`id_obj`),
  KEY `est_vendu` (`id_obj`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_520_ci;

--
-- Contenu de la table `vente`
--

INSERT INTO `vente` (`id_vendeur`, `id_obj`) VALUES
(1, 13),
(7, 14);

--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `enchere`
--
ALTER TABLE `enchere`
  ADD CONSTRAINT `encherie` FOREIGN KEY (`id_acheteur`) REFERENCES `users` (`id_u`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `est_encherie` FOREIGN KEY (`id_obj`) REFERENCES `objets` (`id_o`);

--
-- Contraintes pour la table `vente`
--
ALTER TABLE `vente`
  ADD CONSTRAINT `est_vendu` FOREIGN KEY (`id_obj`) REFERENCES `objets` (`id_o`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `vend` FOREIGN KEY (`id_vendeur`) REFERENCES `users` (`id_u`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
