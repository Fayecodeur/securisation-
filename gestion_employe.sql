-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:3306
-- Généré le : mer. 03 juil. 2024 à 22:48
-- Version du serveur : 8.0.30
-- Version de PHP : 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `gestion_salaire`
--

-- --------------------------------------------------------

--
-- Structure de la table `administrateur`
--

CREATE TABLE `administrateur` (
  `id_admin` int NOT NULL,
  `prenom` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `nom` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `mdp` varchar(255) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `administrateur`
--

INSERT INTO `administrateur` (`id_admin`, `prenom`, `nom`, `email`, `mdp`) VALUES
(4, 'Demba', 'Faye', 'admin@gmail.com', '0b99b27a7eaace770fce6371c28feae44365a939'),
(12, 'Thierno Bara', 'Diallo', 'poulo@gmail.com', 'd033e22ae348aeb5660fc2140aec35850c4da997'),
(13, 'Jonh', 'Doe', 'admin@gmail.com', '97aa211cd82f0197e4efcce4c1707fe172fe4702'),
(14, 'Fatou', 'Faye', 'admin@gmail.com', '1e3592a295c8ca3b4a4e398fa537937233677a65');

-- --------------------------------------------------------

--
-- Structure de la table `employes`
--

CREATE TABLE `employes` (
  `id_employe` int NOT NULL,
  `prenom` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `nom` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `etat` varchar(20) COLLATE utf8mb4_general_ci NOT NULL,
  `salaire` int NOT NULL,
  `date_paiement` date NOT NULL,
  `id_poste` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `employes`
--

INSERT INTO `employes` (`id_employe`, `prenom`, `nom`, `etat`, `salaire`, `date_paiement`, `id_poste`) VALUES
(67, 'Nassira', 'Diarra', 'Payé', 300000, '2024-01-18', 52),
(69, 'Demba', 'Faye', 'Payé', 200000, '2024-01-16', 53),
(70, 'Omar', 'Dia', 'Payé', 250000, '2024-01-05', 52),
(71, 'Mouhammadou', 'Dieng', 'Payé', 300000, '2024-01-16', 52),
(72, 'Djeyni', 'Mbodj', 'Payé', 200000, '2024-01-16', 52),
(77, 'Jonh', 'Doe', 'Payé', 20000, '2024-08-03', 52),
(78, 'Jonh', 'Doe', 'Payé', 20000, '2024-08-03', 57);

-- --------------------------------------------------------

--
-- Structure de la table `poste`
--

CREATE TABLE `poste` (
  `id_poste` int NOT NULL,
  `nom_poste` varchar(255) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `poste`
--

INSERT INTO `poste` (`id_poste`, `nom_poste`) VALUES
(52, 'Develeppeur web'),
(53, 'Web Master'),
(54, 'Comptabe'),
(55, 'Administrateur'),
(57, 'Rédacteur Web'),
(58, 'Transporteur'),
(59, 'Mécanicien'),
(60, 'Menusier');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `administrateur`
--
ALTER TABLE `administrateur`
  ADD PRIMARY KEY (`id_admin`);

--
-- Index pour la table `employes`
--
ALTER TABLE `employes`
  ADD PRIMARY KEY (`id_employe`),
  ADD KEY `id_poste` (`id_poste`);

--
-- Index pour la table `poste`
--
ALTER TABLE `poste`
  ADD PRIMARY KEY (`id_poste`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `administrateur`
--
ALTER TABLE `administrateur`
  MODIFY `id_admin` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT pour la table `employes`
--
ALTER TABLE `employes`
  MODIFY `id_employe` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=80;

--
-- AUTO_INCREMENT pour la table `poste`
--
ALTER TABLE `poste`
  MODIFY `id_poste` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `employes`
--
ALTER TABLE `employes`
  ADD CONSTRAINT `employes_ibfk_1` FOREIGN KEY (`id_poste`) REFERENCES `poste` (`id_poste`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
