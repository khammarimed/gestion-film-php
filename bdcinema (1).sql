-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : sam. 21 déc. 2024 à 12:03
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
-- Base de données : `bdcinema`
--

-- --------------------------------------------------------

--
-- Structure de la table `admin`
--

CREATE TABLE `admin` (
  `adminename` varchar(20) NOT NULL,
  `pass` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `admin`
--

INSERT INTO `admin` (`adminename`, `pass`) VALUES
('dhia', '1234'),
('med', '123');

-- --------------------------------------------------------

--
-- Structure de la table `bdadmine`
--

CREATE TABLE `bdadmine` (
  `idadmine` int(5) NOT NULL,
  `nomadmine` varchar(20) NOT NULL,
  `emailadmin` varchar(20) NOT NULL,
  `mdpadmine` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `bdfilm`
--

CREATE TABLE `bdfilm` (
  `idfilm` int(5) NOT NULL,
  `nomfilm` varchar(20) NOT NULL,
  `src` varchar(30) NOT NULL,
  `desfilm` varchar(500) NOT NULL,
  `datefilm` date NOT NULL,
  `romfilm` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `bdfilm`
--

INSERT INTO `bdfilm` (`idfilm`, `nomfilm`, `src`, `desfilm`, `datefilm`, `romfilm`) VALUES
(154, 'Black Widow', 'blackwidow.jpg', 'Après un arc de 11 ans constituant The Infinity Saga, Marvel Studios aborde cette nouvelle décennie avec une Phase IV placée sous le signe de la transition', '2024-12-20', 'salle1'),
(155, 'souvage', 'sauvage.jpg', 'Alors que la publicité pour les films est interdite sur le petit écran, les affiches sont un des moyens incontournables pour attirer les spectateurs au cinéma.', '2024-12-26', 'salle 4'),
(156, 'a toute allure', 'unnamed.jpg', 'Alors que la pubssslicité pour les films est interdite sur le petit écran, les affiches sont un des moyens incontournables pour attirer les spectateurs au cinéma.', '2024-12-12', 'salle2'),
(162, 'Joker ', 'images.jpg', 'Joker est une histoire originale et indépendante. Arthur Fleck  un homme méprisé par la société, fait l objet d une étude de personnage brute un avertissement…', '2024-12-20', 'salle2'),
(163, 'Breaking Bad', '61sN2V8PQNL.jpg', 'Peinture sur toile en toile  durable à utiliser et respectueuse de l environnement. Elles ne contiennent aucune substance nocive', '2024-12-18', 'salle 5'),
(164, 'L Ascension de Skywa', '12.jpg', 'On espère maintenant que Luke Skywalker aura droit à son poster personnage après la sortie du film', '2025-02-07', 'salle2'),
(165, 'Brian Priske', '10.jpg', 'Brian Priske Pedersen (Priske le nom de sa mère, Pedersen celui de son père), né le 14 mai 1977 à Horsens', '2025-01-22', 'salle2'),
(166, 'zadsqd', 'unnamed.jpg', 'sqd', '2024-12-26', 'dsqd'),
(167, 'intouchables', '16.jpg', 'Les distributeurs ont ils vraiment  la flemme  de proposer des affiches différentes   Les acteurs du secteur contactés  qui pour la plupart préfèrent rester anonymes  apportent des éléments de réponse.', '2025-01-01', 'salle5'),
(169, 'ee', '12.jpg', 'eee', '2024-12-21', '1');

-- --------------------------------------------------------

--
-- Structure de la table `bdreservation`
--

CREATE TABLE `bdreservation` (
  `idr` int(5) NOT NULL,
  `iduser` int(5) NOT NULL,
  `idfilm` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `bdreservation`
--

INSERT INTO `bdreservation` (`idr`, `iduser`, `idfilm`) VALUES
(94, 55, 163),
(95, 55, 156),
(96, 56, 167),
(97, 56, 169);

-- --------------------------------------------------------

--
-- Structure de la table `bduser`
--

CREATE TABLE `bduser` (
  `iduser` int(5) NOT NULL,
  `nomuser` varchar(20) NOT NULL,
  `emailuser` varchar(35) NOT NULL,
  `mdpuser` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `bduser`
--

INSERT INTO `bduser` (`iduser`, `nomuser`, `emailuser`, `mdpuser`) VALUES
(46, 'ahmed', 'ahmed@gmail.com', '123123123'),
(47, 'm', 'm@gmail.com', '147258396'),
(48, 'dhia', 'dhiahasini456@gmail.com', '123456789'),
(49, 'dhia', 'dhia1@gmail.com', '123456789'),
(55, 'med', 'med@gmail.com', '123456789'),
(56, 'med', 'med@gmail.com', '155598756');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`adminename`);

--
-- Index pour la table `bdadmine`
--
ALTER TABLE `bdadmine`
  ADD PRIMARY KEY (`idadmine`);

--
-- Index pour la table `bdfilm`
--
ALTER TABLE `bdfilm`
  ADD PRIMARY KEY (`idfilm`);

--
-- Index pour la table `bdreservation`
--
ALTER TABLE `bdreservation`
  ADD PRIMARY KEY (`idr`),
  ADD KEY `fk_r` (`idfilm`),
  ADD KEY `fk_r1` (`iduser`);

--
-- Index pour la table `bduser`
--
ALTER TABLE `bduser`
  ADD PRIMARY KEY (`iduser`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `bdadmine`
--
ALTER TABLE `bdadmine`
  MODIFY `idadmine` int(5) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `bdfilm`
--
ALTER TABLE `bdfilm`
  MODIFY `idfilm` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=170;

--
-- AUTO_INCREMENT pour la table `bdreservation`
--
ALTER TABLE `bdreservation`
  MODIFY `idr` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=98;

--
-- AUTO_INCREMENT pour la table `bduser`
--
ALTER TABLE `bduser`
  MODIFY `iduser` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `bdreservation`
--
ALTER TABLE `bdreservation`
  ADD CONSTRAINT `fk_r` FOREIGN KEY (`idfilm`) REFERENCES `bdfilm` (`idfilm`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_r1` FOREIGN KEY (`iduser`) REFERENCES `bduser` (`iduser`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
