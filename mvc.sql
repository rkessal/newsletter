-- phpMyAdmin SQL Dump
-- version 4.6.6deb4
-- https://www.phpmyadmin.net/
--
-- Client :  localhost:3306
-- Généré le :  Mer 12 Septembre 2018 à 01:06
-- Version du serveur :  10.1.26-MariaDB-0+deb9u1
-- Version de PHP :  7.0.30-0+deb9u1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `mvc`
--

-- --------------------------------------------------------

--
-- Structure de la table `mvc_inscrit`
--

CREATE TABLE `mvc_inscrit` (
  `idInscrit` int(11) NOT NULL,
  `mail` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Contenu de la table `mvc_inscrit`
--

INSERT INTO `mvc_inscrit` (`idInscrit`, `mail`) VALUES
(1, 'jbaubry25@gmail.com');

-- --------------------------------------------------------

--
-- Structure de la table `mvc_mail`
--

CREATE TABLE `mvc_mail` (
  `idMail` int(11) NOT NULL,
  `objet` text NOT NULL,
  `corps` mediumtext NOT NULL,
  `horaire` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `mvc_utilisateur`
--

CREATE TABLE `mvc_utilisateur` (
  `idUtilisateur` int(11) NOT NULL,
  `pseudo` varchar(50) NOT NULL,
  `motDePasse` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Contenu de la table `mvc_utilisateur`
--

INSERT INTO `mvc_utilisateur` (`idUtilisateur`, `pseudo`, `motDePasse`) VALUES
(1, 'root', '$2y$10$qihx2IDYLopCtdfXYEmZO.256ykg458AoShgCkPhuxFCH4xqAz9Di');

--
-- Index pour les tables exportées
--

--
-- Index pour la table `mvc_inscrit`
--
ALTER TABLE `mvc_inscrit`
  ADD PRIMARY KEY (`idInscrit`);

--
-- Index pour la table `mvc_mail`
--
ALTER TABLE `mvc_mail`
  ADD PRIMARY KEY (`idMail`);

--
-- Index pour la table `mvc_utilisateur`
--
ALTER TABLE `mvc_utilisateur`
  ADD PRIMARY KEY (`idUtilisateur`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `mvc_inscrit`
--
ALTER TABLE `mvc_inscrit`
  MODIFY `idInscrit` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT pour la table `mvc_mail`
--
ALTER TABLE `mvc_mail`
  MODIFY `idMail` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `mvc_utilisateur`
--
ALTER TABLE `mvc_utilisateur`
  MODIFY `idUtilisateur` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
