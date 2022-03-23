-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : mer. 23 mars 2022 à 11:23
-- Version du serveur : 10.4.22-MariaDB
-- Version de PHP : 8.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `ecommerce`
--

-- --------------------------------------------------------

--
-- Structure de la table `formateurs`
--

CREATE TABLE `formateurs` (
  `id_formateur` int(11) NOT NULL,
  `nom_formateur` varchar(255) NOT NULL,
  `prenom_formateur` varchar(255) NOT NULL,
  `avatar_formateur` varchar(255) NOT NULL,
  `date_naissance_formateur` datetime NOT NULL,
  `telephone_formateur` varchar(255) NOT NULL,
  `email_formateur` varchar(255) NOT NULL,
  `age_formateur` int(11) NOT NULL,
  `matiere_formateur` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `formateurs`
--

INSERT INTO `formateurs` (`id_formateur`, `nom_formateur`, `prenom_formateur`, `avatar_formateur`, `date_naissance_formateur`, `telephone_formateur`, `email_formateur`, `age_formateur`, `matiere_formateur`) VALUES
(2, 'Michel', 'Michael', '../assets/img/dark.jpg', '1984-03-01 15:23:57', '00.00.00.00.00', 'm.michel@onlineformapro.com', 38, 'Développeur Web et Mobile'),
(4, 'Bellont', 'Laurent', '../assets/img/link.jpg', '2021-01-15 09:24:42', '01.23.45.67.89', 'email@onlineformapro.com', 47, 'Développement Web et Web Mobile'),
(6, 'Hendrix', 'Jimi', '../assets/img/jimi.jfif', '1942-11-27 09:16:06', '0123345678', 'hendrix-jimi@legend.com', 90, 'Formateur de guitare'),
(7, 'Kurosaki', 'Ichigo', '../assets/img/ichigo.jfif', '0000-00-00 00:00:00', '01.23.34.56.78', 'ichigo-kurosaki@shinigami.com', 22, 'Technique pugilistique de haut niveau');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `formateurs`
--
ALTER TABLE `formateurs`
  ADD PRIMARY KEY (`id_formateur`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `formateurs`
--
ALTER TABLE `formateurs`
  MODIFY `id_formateur` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
