-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : mar. 22 mars 2022 à 08:21
-- Version du serveur :  5.7.31
-- Version de PHP : 7.4.9

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
-- Structure de la table `categories`
--

DROP TABLE IF EXISTS `categories`;
CREATE TABLE IF NOT EXISTS `categories` (
  `id_categorie` int(11) NOT NULL AUTO_INCREMENT,
  `categorie` varchar(250) NOT NULL,
  PRIMARY KEY (`id_categorie`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `categories`
--

INSERT INTO `categories` (`id_categorie`, `categorie`) VALUES
(1, 'Jeux Video'),
(2, 'Meuble'),
(3, 'Vetements'),
(4, 'Informatique');

-- --------------------------------------------------------

--
-- Structure de la table `etudiants`
--

DROP TABLE IF EXISTS `etudiants`;
CREATE TABLE IF NOT EXISTS `etudiants` (
  `id_etudiant` int(11) NOT NULL AUTO_INCREMENT,
  `nom_etudiant` varchar(255) NOT NULL,
  `prenom_etudiant` varchar(255) NOT NULL,
  `avatar_etudiant` varchar(255) NOT NULL,
  `date_naissance_etudiant` datetime NOT NULL,
  `telephone_etudiant` varchar(255) NOT NULL,
  `email_etudiant` varchar(255) NOT NULL,
  `age_etudiant` int(11) NOT NULL,
  `formation` varchar(255) NOT NULL,
  `bac_etudiant` tinyint(1) NOT NULL,
  PRIMARY KEY (`id_etudiant`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `etudiants`
--

INSERT INTO `etudiants` (`id_etudiant`, `nom_etudiant`, `prenom_etudiant`, `avatar_etudiant`, `date_naissance_etudiant`, `telephone_etudiant`, `email_etudiant`, `age_etudiant`, `formation`, `bac_etudiant`) VALUES
(1, 'LAGADEK', 'Bob', '../assets/img/bob.png', '2021-07-21 16:40:40', '0636323285', 'bob@hotmail.fr', 32, 'Developpeur Web & Mobile', 0),
(2, 'MICHEL', 'Michael', '../../assets/img/gg.jpg', '2022-03-10 00:00:00', '0636353536', 'micpiwo@hotmail.fr', 54, 'DÃ©veloppeur Web & Mobile', 0),
(3, 'MICHEL', 'Michael', '../../assets/img/gg.jpg', '2022-03-10 00:00:00', '0636353536', 'micpiwo@hotmail.fr', 54, 'DÃ©veloppeur Web & Mobile', 0),
(4, 'MICHEL', 'Michael', '../../assets/img/gg.jpg', '2022-03-10 00:00:00', '0636353536', 'micpiwo@hotmail.fr', 54, 'DÃ©veloppeur Web & Mobile', 0);

-- --------------------------------------------------------

--
-- Structure de la table `formateurs`
--

DROP TABLE IF EXISTS `formateurs`;
CREATE TABLE IF NOT EXISTS `formateurs` (
  `id_formateur` int(11) NOT NULL AUTO_INCREMENT,
  `nom_formateur` varchar(255) NOT NULL,
  `prenom_formateur` varchar(255) NOT NULL,
  `avatar_formateur` varchar(255) NOT NULL,
  `date_naissance_formateur` datetime NOT NULL,
  `telephone_formateur` varchar(255) NOT NULL,
  `email_formateur` varchar(255) NOT NULL,
  `age_formateur` int(11) NOT NULL,
  `matiere_formateur` varchar(255) NOT NULL,
  PRIMARY KEY (`id_formateur`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `produits`
--

DROP TABLE IF EXISTS `produits`;
CREATE TABLE IF NOT EXISTS `produits` (
  `id_produit` int(11) NOT NULL AUTO_INCREMENT,
  `nom_produit` varchar(255) NOT NULL,
  `description_produit` text NOT NULL,
  `prix_produit` float NOT NULL,
  `stock_produit` tinyint(1) NOT NULL,
  `date_depot` datetime NOT NULL,
  `image_produit` varchar(255) NOT NULL,
  PRIMARY KEY (`id_produit`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `produits`
--

INSERT INTO `produits` (`id_produit`, `nom_produit`, `description_produit`, `prix_produit`, `stock_produit`, `date_depot`, `image_produit`) VALUES
(1, 'PC-ENGINE', 'La PC-Engine, connue sous le nom TurboGrafx-16 en Amérique du Nord, est une console de jeux vidéo 8 bits fabriquée par NEC et commercialisée à partir de 1987 au Japon.', 125.25, 0, '2022-02-26 07:17:37', '../assets/img/pcengine.jpg'),
(2, ' Guitare Lag NOIR Sèches', 'En 1978, un musicien de rock progressif, Michel Chavarria, guitariste, chanteur et compositeur du groupe toulousain Madrigal, passionné de design, de peinture et du travail du bois, décide avec un ami d\'université, Daniel Delfour1, de créer un atelier de lutherie. L\'objectif est de réparer, régler, transformer et fabriquer toute la gamme des guitares, acoustiques, classiques et électriques.', 123.25, 0, '2022-02-24 00:00:00', '../assets/img/guitare.jpg'),
(4, 'Table Fer & Bois', 'La table est un type de meuble composé d\'une surface plane et horizontale (le plateau, par exemple de planches de bois assemblées) soutenue par un ou plusieurs supports (pieds, tréteaux...). Dans la culture occidentale elle est notamment mais pas uniquement utilisée pour les repas.', 741.35, 1, '2022-02-24 00:00:00', '../assets/img/table.jpg'),
(5, 'Mac Pro', 'Le Mac Pro est une station de travail 64 bits d\'Apple. Il est présenté pour la première fois lors de la WWDC d’août 2006. Il remplace le Power Mac G5 dont il reprend le design, et signe la disparition de la dénomination Power Mac parmi les produits Apple.', 2250.35, 1, '2022-02-17 00:00:00', '../assets/img/mac.jpg'),
(7, 'Microphone', 'Un microphone (souvent appelé micro par apocope) est un transducteur électroacoustique, c\'est-à-dire un appareil capable de convertir un signal acoustique en signal électrique1.', 48.15, 0, '2022-02-25 00:00:00', '../assets/img/micro.jpg'),
(11, 'Bol vert', 'Un bol est un élément de vaisselle qui sert principalement lors du repas matinal mais qui peut également être utilisé à n\'importe quel autre moment de la journée. On s\'en sert le plus souvent pour boire du lait, du café, du thé, ou autres.', 78.25, 0, '2022-02-11 00:00:00', '../assets/img/bol.jpg'),
(12, 'Fourchette Fer', 'La fourchette est un couvert de table ou un ustensile de cuisine permettant d\'attraper les aliments, sans les toucher directement avec les doigts.', 12.25, 1, '2022-01-31 00:00:00', 'fouchette.jpg'),
(13, 'Stylo BIC', 'Le stylo Écouter (apocope de stylographe) est un instrument, généralement de forme allongée facilitant sa préhension, qui sert à écrire ou à dessiner. Ayant l\'avantage de posséder son propre réservoir d\'encre, il a progressivement remplacé le porte-plume.', 15.35, 0, '2022-02-16 00:00:00', '../assets/img/bic.jpg'),
(14, 'Arturia Piano', 'Arturia est une société d’informatique musicale basée à Grenoble qui développe des reproductions logicielles d\'anciens synthétiseurs (analogiques et numériques), des claviers Midi, des contrôleurs, des synthétiseurs analogiques et des interfaces audio.', 7788.25, 0, '2022-02-27 00:00:00', '../assets/img/piano.jpg');

-- --------------------------------------------------------

--
-- Structure de la table `users_admins`
--

DROP TABLE IF EXISTS `users_admins`;
CREATE TABLE IF NOT EXISTS `users_admins` (
  `id_userAdmin` int(11) NOT NULL AUTO_INCREMENT,
  `email_userAdmin` varchar(250) NOT NULL,
  `password_userAdmin` varchar(250) NOT NULL,
  PRIMARY KEY (`id_userAdmin`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `users_admins`
--

INSERT INTO `users_admins` (`id_userAdmin`, `email_userAdmin`, `password_userAdmin`) VALUES
(1, 'admin@admin.fr', 'test');

-- --------------------------------------------------------

--
-- Structure de la table `utilisateurs`
--

DROP TABLE IF EXISTS `utilisateurs`;
CREATE TABLE IF NOT EXISTS `utilisateurs` (
  `id_users` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(250) NOT NULL,
  `password` varchar(250) NOT NULL,
  PRIMARY KEY (`id_users`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `utilisateurs`
--

INSERT INTO `utilisateurs` (`id_users`, `email`, `password`) VALUES
(5, 'admin@admin.fr', 'azerty'),
(6, 'micpiwo@hotmail.fr', 'slad');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
