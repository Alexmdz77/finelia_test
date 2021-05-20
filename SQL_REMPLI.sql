-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : jeu. 20 mai 2021 à 20:30
-- Version du serveur :  10.4.18-MariaDB
-- Version de PHP : 7.3.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `finelia`
--

-- --------------------------------------------------------

--
-- Structure de la table `etudiant`
--

CREATE TABLE `etudiant` (
  `id_etudiant` int(11) NOT NULL,
  `nom_etudiant` varchar(45) DEFAULT NULL,
  `prenom_etudiant` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `etudiant`
--

INSERT INTO `etudiant` (`id_etudiant`, `nom_etudiant`, `prenom_etudiant`) VALUES
(1, 'Etudiant', '1'),
(2, 'Etudiant', '2'),
(3, 'Etudiant', '3'),
(4, 'Etudiant', '4');

-- --------------------------------------------------------

--
-- Structure de la table `matiere`
--

CREATE TABLE `matiere` (
  `id_matiere` int(11) NOT NULL,
  `nom_matiere` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `matiere`
--

INSERT INTO `matiere` (`id_matiere`, `nom_matiere`) VALUES
(1, 'Symfony'),
(2, 'Javascript'),
(3, 'NodeJs'),
(4, 'React'),
(5, 'MongoDB');

-- --------------------------------------------------------

--
-- Structure de la table `note`
--

CREATE TABLE `note` (
  `id_note` int(11) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp(),
  `coefficient` tinyint(4) DEFAULT NULL,
  `note` tinyint(4) DEFAULT NULL,
  `id_matiere` int(11) NOT NULL,
  `id_etudiant` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `note`
--

INSERT INTO `note` (`id_note`, `date`, `coefficient`, `note`, `id_matiere`, `id_etudiant`) VALUES
(3, '2021-05-20 18:24:41', 1, 18, 2, 1),
(4, '2021-05-20 18:24:48', 2, 19, 3, 1),
(5, '2021-05-20 18:24:55', 3, 12, 4, 2),
(6, '2021-05-20 18:25:01', 1, 17, 5, 2),
(7, '2021-05-20 18:25:08', 2, 5, 1, 4),
(8, '2021-05-20 18:25:15', 1, 5, 5, 2),
(9, '2021-05-20 18:25:24', 1, 2, 1, 1),
(10, '2021-05-20 18:25:38', 1, 15, 1, 1),
(11, '2021-05-20 18:25:56', 2, 15, 4, 3),
(12, '2021-05-20 18:26:07', 1, 0, 4, 3),
(13, '2021-05-20 18:26:20', 1, 19, 2, 3),
(14, '2021-05-20 18:26:30', 3, 0, 2, 3),
(15, '2021-05-20 18:26:41', 2, 14, 3, 4),
(16, '2021-05-20 18:26:50', 4, 12, 3, 4);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `etudiant`
--
ALTER TABLE `etudiant`
  ADD PRIMARY KEY (`id_etudiant`);

--
-- Index pour la table `matiere`
--
ALTER TABLE `matiere`
  ADD PRIMARY KEY (`id_matiere`);

--
-- Index pour la table `note`
--
ALTER TABLE `note`
  ADD PRIMARY KEY (`id_note`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `etudiant`
--
ALTER TABLE `etudiant`
  MODIFY `id_etudiant` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT pour la table `matiere`
--
ALTER TABLE `matiere`
  MODIFY `id_matiere` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pour la table `note`
--
ALTER TABLE `note`
  MODIFY `id_note` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
