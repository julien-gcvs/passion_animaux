-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  mar. 03 juil. 2018 à 13:18
-- Version du serveur :  5.7.21
-- Version de PHP :  7.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `passion_animaux`
--

-- --------------------------------------------------------

--
-- Structure de la table `animal`
--

DROP TABLE IF EXISTS `animal`;
CREATE TABLE IF NOT EXISTS `animal` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(30) NOT NULL,
  `peau` varchar(30) NOT NULL,
  `type` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_type` (`type`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `animal`
--

INSERT INTO `animal` (`id`, `nom`, `peau`, `type`) VALUES
(1, 'crocodile', 'vertes', 1),
(4, 'Ara de Spix', 'bleu', 3),
(5, 'chat européen', 'variable', 2),
(6, 'diable de Tasmanie', 'noire et blanche', 2),
(7, 'ornithorynque', 'marron foncée', 2);

-- --------------------------------------------------------

--
-- Structure de la table `type_animal`
--

DROP TABLE IF EXISTS `type_animal`;
CREATE TABLE IF NOT EXISTS `type_animal` (
  `nom` varchar(30) NOT NULL,
  `bootstrap_color` varchar(16) NOT NULL,
  `peau` varchar(16) NOT NULL,
  `id` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `type_animal`
--

INSERT INTO `type_animal` (`nom`, `bootstrap_color`, `peau`, `id`) VALUES
('reptile', 'success', 'es écailles sont', 1),
('mammifère', 'warning', 'a fourrure est', 2),
('oiseau', 'info', 'on plumage est', 3);

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `animal`
--
ALTER TABLE `animal`
  ADD CONSTRAINT `fk_type` FOREIGN KEY (`type`) REFERENCES `type_animal` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
 
