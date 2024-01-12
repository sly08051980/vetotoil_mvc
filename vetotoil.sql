-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : ven. 12 jan. 2024 à 11:18
-- Version du serveur : 10.4.28-MariaDB
-- Version de PHP : 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `vetotoil`
--

-- --------------------------------------------------------

--
-- Structure de la table `ajouter`
--

CREATE TABLE `ajouter` (
  `id_ajouter_configuration` int(11) NOT NULL,
  `jours_travailler` varchar(14) NOT NULL,
  `date_entree_employer` date NOT NULL,
  `date_sortie_employer` date NOT NULL,
  `date_jours_vacances` date NOT NULL,
  `date_fin_vacances` date NOT NULL,
  `siret` int(11) NOT NULL,
  `id_employer` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `animal`
--

CREATE TABLE `animal` (
  `id_animal` int(11) NOT NULL,
  `race` varchar(50) NOT NULL,
  `type` varchar(50) NOT NULL,
  `prenom` varchar(50) NOT NULL,
  `date_naissance` date NOT NULL,
  `id_patient` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `employer`
--

CREATE TABLE `employer` (
  `id_employer` int(11) NOT NULL,
  `nom` varchar(50) NOT NULL,
  `prenom` varchar(50) NOT NULL,
  `adresse` varchar(255) NOT NULL,
  `complement_adresse` varchar(255) NOT NULL,
  `code_postal` varchar(5) NOT NULL,
  `ville` varchar(50) NOT NULL,
  `telephone` varchar(10) NOT NULL,
  `email` varchar(100) NOT NULL,
  `profession` varchar(20) NOT NULL,
  `password` varchar(50) NOT NULL,
  `date_creation` datetime NOT NULL,
  `date_fin` datetime NOT NULL,
  `droit_utilisateur` varchar(10) NOT NULL,
  `debut_repas` time NOT NULL,
  `fin_repas` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `patient`
--

CREATE TABLE `patient` (
  `id_patient` int(11) NOT NULL,
  `nom` varchar(50) NOT NULL,
  `prenom` varchar(50) NOT NULL,
  `adresse` varchar(255) NOT NULL,
  `complement_adresse` varchar(255) NOT NULL,
  `code_postal` varchar(5) NOT NULL,
  `ville` varchar(50) NOT NULL,
  `telephone` varchar(10) NOT NULL,
  `password` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `date_creation` datetime NOT NULL,
  `date_fin` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Déchargement des données de la table `patient`
--

INSERT INTO `patient` (`id_patient`, `nom`, `prenom`, `adresse`, `complement_adresse`, `code_postal`, `ville`, `telephone`, `password`, `email`, `date_creation`, `date_fin`) VALUES
(1, 'Regnier', 'sylvain', '6 avenue du marechal ney', '', '13011', 'Marseille', '0620941745', '123456', 'regnier.sylvain@yahoo.fr', '2024-01-03 15:40:19', '2024-01-03 15:40:19');

-- --------------------------------------------------------

--
-- Structure de la table `rdv`
--

CREATE TABLE `rdv` (
  `id_rdv` int(11) NOT NULL,
  `date_rdv` date NOT NULL,
  `status` varchar(20) NOT NULL,
  `id_employer` int(11) NOT NULL,
  `id_patient` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `societe`
--

CREATE TABLE `societe` (
  `siret` int(11) NOT NULL,
  `nom_societe` varchar(50) NOT NULL,
  `profession` varchar(20) NOT NULL,
  `nom_dirigeant` varchar(50) NOT NULL,
  `adresse` varchar(255) NOT NULL,
  `complement_adresse` varchar(255) NOT NULL,
  `code_postal` varchar(5) NOT NULL,
  `ville` varchar(50) NOT NULL,
  `telephone_societe` varchar(10) NOT NULL,
  `telephone_dirigeant` varchar(10) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(50) NOT NULL,
  `date_creation` datetime NOT NULL,
  `date_resiliation` datetime NOT NULL,
  `date_validation` datetime NOT NULL,
  `status` varchar(20) NOT NULL,
  `droit_utilisateur` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Déchargement des données de la table `societe`
--

INSERT INTO `societe` (`siret`, `nom_societe`, `profession`, `nom_dirigeant`, `adresse`, `complement_adresse`, `code_postal`, `ville`, `telephone_societe`, `telephone_dirigeant`, `email`, `password`, `date_creation`, `date_resiliation`, `date_validation`, `status`, `droit_utilisateur`) VALUES
(0, 'toto', 'veterinaire', '', '5 rue leclec', '', '13012', 'marseille', '0606060606', '0101010101', 'toto@gmail.com', '123456', '2024-01-03 15:41:15', '0000-00-00 00:00:00', '2024-01-03 15:41:15', '', '');

-- --------------------------------------------------------

--
-- Structure de la table `soigner`
--

CREATE TABLE `soigner` (
  `id_soigner` int(11) NOT NULL,
  `acte_soins` varchar(50) NOT NULL,
  `traitement` varchar(100) NOT NULL,
  `nombre_fois` int(11) NOT NULL,
  `date_soins` date NOT NULL,
  `id_employer` int(11) NOT NULL,
  `id_patient` int(11) NOT NULL,
  `id_animal` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `ajouter`
--
ALTER TABLE `ajouter`
  ADD PRIMARY KEY (`id_ajouter_configuration`),
  ADD KEY `date_entree_employer` (`date_entree_employer`,`date_sortie_employer`),
  ADD KEY `siret` (`siret`),
  ADD KEY `id_employer` (`id_employer`);

--
-- Index pour la table `animal`
--
ALTER TABLE `animal`
  ADD PRIMARY KEY (`id_animal`),
  ADD KEY `type` (`type`) USING BTREE,
  ADD KEY `race` (`race`),
  ADD KEY `date_naissance` (`date_naissance`),
  ADD KEY `id_patient` (`id_patient`);

--
-- Index pour la table `employer`
--
ALTER TABLE `employer`
  ADD PRIMARY KEY (`id_employer`);

--
-- Index pour la table `patient`
--
ALTER TABLE `patient`
  ADD PRIMARY KEY (`id_patient`);

--
-- Index pour la table `rdv`
--
ALTER TABLE `rdv`
  ADD PRIMARY KEY (`id_rdv`),
  ADD KEY `id_employer` (`id_employer`),
  ADD KEY `id_patient` (`id_patient`);

--
-- Index pour la table `societe`
--
ALTER TABLE `societe`
  ADD PRIMARY KEY (`siret`),
  ADD KEY `nom_societe` (`nom_societe`),
  ADD KEY `nom_dirigeant` (`nom_dirigeant`),
  ADD KEY `code_postal` (`code_postal`),
  ADD KEY `ville` (`ville`),
  ADD KEY `date_creation` (`date_creation`),
  ADD KEY `date_validation` (`date_validation`),
  ADD KEY `date_resiliation` (`date_resiliation`);

--
-- Index pour la table `soigner`
--
ALTER TABLE `soigner`
  ADD PRIMARY KEY (`id_soigner`),
  ADD KEY `id_employer` (`id_employer`),
  ADD KEY `id_patient` (`id_patient`),
  ADD KEY `id_animal` (`id_animal`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `ajouter`
--
ALTER TABLE `ajouter`
  MODIFY `id_ajouter_configuration` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `animal`
--
ALTER TABLE `animal`
  MODIFY `id_animal` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `employer`
--
ALTER TABLE `employer`
  MODIFY `id_employer` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `patient`
--
ALTER TABLE `patient`
  MODIFY `id_patient` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `rdv`
--
ALTER TABLE `rdv`
  MODIFY `id_rdv` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `soigner`
--
ALTER TABLE `soigner`
  MODIFY `id_soigner` int(11) NOT NULL AUTO_INCREMENT;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `ajouter`
--
ALTER TABLE `ajouter`
  ADD CONSTRAINT `ajouter_ibfk_1` FOREIGN KEY (`siret`) REFERENCES `societe` (`siret`),
  ADD CONSTRAINT `ajouter_ibfk_2` FOREIGN KEY (`id_employer`) REFERENCES `employer` (`id_employer`);

--
-- Contraintes pour la table `animal`
--
ALTER TABLE `animal`
  ADD CONSTRAINT `animal_ibfk_1` FOREIGN KEY (`id_patient`) REFERENCES `patient` (`id_patient`);

--
-- Contraintes pour la table `employer`
--
ALTER TABLE `employer`
  ADD CONSTRAINT `employer_ibfk_1` FOREIGN KEY (`id_employer`) REFERENCES `soigner` (`id_employer`);

--
-- Contraintes pour la table `rdv`
--
ALTER TABLE `rdv`
  ADD CONSTRAINT `rdv_ibfk_1` FOREIGN KEY (`id_employer`) REFERENCES `employer` (`id_employer`),
  ADD CONSTRAINT `rdv_ibfk_2` FOREIGN KEY (`id_patient`) REFERENCES `patient` (`id_patient`);

--
-- Contraintes pour la table `soigner`
--
ALTER TABLE `soigner`
  ADD CONSTRAINT `soigner_ibfk_1` FOREIGN KEY (`id_animal`) REFERENCES `animal` (`id_animal`),
  ADD CONSTRAINT `soigner_ibfk_2` FOREIGN KEY (`id_patient`) REFERENCES `patient` (`id_patient`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
