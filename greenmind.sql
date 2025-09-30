-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : dim. 28 sep. 2025 à 13:36
-- Version du serveur : 10.4.32-MariaDB
-- Version de PHP : 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `greenmind`
--

-- --------------------------------------------------------

--
-- Structure de la table `projet`
--

CREATE TABLE `projet` (
  `idp` int(11) NOT NULL,
  `idu` int(11) NOT NULL,
  `titrep` varchar(500) NOT NULL,
  `motivationp` varchar(1000) NOT NULL,
  `descriptiionp` text NOT NULL,
  `datedebp` date NOT NULL,
  `deadlinep` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `tache`
--

CREATE TABLE `tache` (
  `idt` int(11) NOT NULL,
  `idp` int(11) NOT NULL,
  `idu` int(11) NOT NULL,
  `titret` varchar(500) NOT NULL,
  `descript` text NOT NULL,
  `prioritet` varchar(500) NOT NULL,
  `statut` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `utilisateurs`
--

CREATE TABLE `utilisateurs` (
  `idu` int(11) NOT NULL,
  `nomu` varchar(500) NOT NULL,
  `prenomu` varchar(500) NOT NULL,
  `mailu` varchar(1000) NOT NULL,
  `motdepass` text NOT NULL,
  `datecrea` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `projet`
--
ALTER TABLE `projet`
  ADD PRIMARY KEY (`idp`),
  ADD KEY `fk_projet_utilisateurs` (`idu`);

--
-- Index pour la table `tache`
--
ALTER TABLE `tache`
  ADD PRIMARY KEY (`idt`),
  ADD KEY `fk_tache_projet` (`idp`),
  ADD KEY `fk_tache_utilisateurs` (`idu`);

--
-- Index pour la table `utilisateurs`
--
ALTER TABLE `utilisateurs`
  ADD PRIMARY KEY (`idu`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `projet`
--
ALTER TABLE `projet`
  MODIFY `idp` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `tache`
--
ALTER TABLE `tache`
  MODIFY `idt` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `utilisateurs`
--
ALTER TABLE `utilisateurs`
  MODIFY `idu` int(11) NOT NULL AUTO_INCREMENT;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `projet`
--
ALTER TABLE `projet`
  ADD CONSTRAINT `fk_projet_utilisateurs` FOREIGN KEY (`idu`) REFERENCES `utilisateurs` (`idu`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `tache`
--
ALTER TABLE `tache`
  ADD CONSTRAINT `fk_tache_projet` FOREIGN KEY (`idp`) REFERENCES `projet` (`idp`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_tache_utilisateurs` FOREIGN KEY (`idu`) REFERENCES `utilisateurs` (`idu`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
