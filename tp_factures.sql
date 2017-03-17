-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Client :  127.0.0.1
-- Généré le :  Jeu 16 Mars 2017 à 14:19
-- Version du serveur :  5.7.14
-- Version de PHP :  5.6.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `tp_factures`
--

-- --------------------------------------------------------

--
-- Structure de la table `detailfacture`
--

CREATE TABLE `detailfacture` (
  `idP` int(11) NOT NULL,
  `idF` int(11) NOT NULL,
  `qte` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `detailfacture`
--

INSERT INTO `detailfacture` (`idP`, `idF`, `qte`) VALUES
(1, 2, 3),
(1, 3, 1),
(2, 5, 8),
(4, 1, 2),
(4, 4, 6),
(7, 1, 10);

-- --------------------------------------------------------

--
-- Structure de la table `facture`
--

CREATE TABLE `facture` (
  `idF` int(11) NOT NULL,
  `idU` int(11) NOT NULL,
  `dateF` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `facture`
--

INSERT INTO `facture` (`idF`, `idU`, `dateF`) VALUES
(1, 1, '2017-01-08'),
(2, 1, '2016-09-15'),
(3, 2, '2016-12-18'),
(4, 3, '2017-01-11'),
(5, 4, '2017-01-08'),
(6, 1, '2004-05-08'),
(7, 1, '2006-06-10'),
(8, 1, '2000-01-18'),
(10, 1, '2017-01-01'),
(11, 1, '2010-05-01');

-- --------------------------------------------------------

--
-- Structure de la table `produit`
--

CREATE TABLE `produit` (
  `idP` int(11) NOT NULL,
  `nom` varchar(50) NOT NULL,
  `des` varchar(200) NOT NULL,
  `prix` decimal(8,2) NOT NULL,
  `stock` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `produit`
--

INSERT INTO `produit` (`idP`, `nom`, `des`, `prix`, `stock`) VALUES
(1, 'Crayon', 'A base de peuplier. Mine fine.', '0.75', 184),
(2, 'Craie', '30*5cm. Coloris : Blanc/Rouge/Jaune de Damas', '5.00', 0),
(3, 'Bescherelle', 'Version de 2016. Editions Chat perdu.', '12.25', 12),
(4, 'Chevilles', 'Paquet de 50 chevilles adaptables.', '50.95', 31),
(5, 'Meches', 'Pour toutes les perceuses universelles', '10.25', 212),
(6, 'Bidule', 'Peut entourer des machins, ou remplir des trucs ', '0.10', 452),
(7, 'Aspirateur dernier cri', 'Pas de fil, pas de sac a changer. A partir de peuplier.', '50.00', 0),
(8, 'Raquette', 'Dedicassee par Roger Federer ! Pour enfant de 10 max.', '67.25', 1);

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur`
--

CREATE TABLE `utilisateur` (
  `idU` int(11) NOT NULL,
  `pseudo` varchar(20) NOT NULL,
  `mdp` varchar(30) NOT NULL,
  `adresse` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `utilisateur`
--

INSERT INTO `utilisateur` (`idU`, `pseudo`, `mdp`, `adresse`) VALUES
(1, 'toto', 'toto', '3, rue de tata TOTOVILLE'),
(2, 'bobby550', '48GkOpaTkP5', '24, rue de Mangtern 68000 Colmar'),
(3, 'OeilAffute', 'dfk4uOpMa', '4, rue de la crepe 35000 Rennes'),
(4, 'Galaway', 'OpgZxnnPkO', '5, rue du Jhon JOHNVILLE'),
(5, 'a', 'a', 'a');

--
-- Index pour les tables exportées
--

--
-- Index pour la table `detailfacture`
--
ALTER TABLE `detailfacture`
  ADD PRIMARY KEY (`idP`,`idF`),
  ADD UNIQUE KEY `idP` (`idP`,`idF`),
  ADD KEY `idF` (`idF`);

--
-- Index pour la table `facture`
--
ALTER TABLE `facture`
  ADD PRIMARY KEY (`idF`),
  ADD UNIQUE KEY `idF` (`idF`,`idU`),
  ADD KEY `idU` (`idU`);

--
-- Index pour la table `produit`
--
ALTER TABLE `produit`
  ADD PRIMARY KEY (`idP`);

--
-- Index pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  ADD PRIMARY KEY (`idU`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `facture`
--
ALTER TABLE `facture`
  MODIFY `idF` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT pour la table `produit`
--
ALTER TABLE `produit`
  MODIFY `idP` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  MODIFY `idU` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `detailfacture`
--
ALTER TABLE `detailfacture`
  ADD CONSTRAINT `detailfacture_ibfk_1` FOREIGN KEY (`idP`) REFERENCES `produit` (`idP`),
  ADD CONSTRAINT `detailfacture_ibfk_2` FOREIGN KEY (`idF`) REFERENCES `facture` (`idF`);

--
-- Contraintes pour la table `facture`
--
ALTER TABLE `facture`
  ADD CONSTRAINT `facture_ibfk_1` FOREIGN KEY (`idU`) REFERENCES `utilisateur` (`idU`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
