-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : mar. 15 fév. 2022 à 01:32
-- Version du serveur : 10.4.22-MariaDB
-- Version de PHP : 7.4.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `employe_pme`
--

-- --------------------------------------------------------

--
-- Structure de la table `employe`
--

CREATE TABLE `employe` (
  `Matricule` char(4) NOT NULL,
  `Nom` varchar(50) NOT NULL,
  `Prenom` varchar(50) NOT NULL,
  `Date` date DEFAULT NULL,
  `Departement` varchar(50) DEFAULT NULL,
  `Salaire` decimal(10,0) DEFAULT NULL,
  `Fonction` varchar(50) DEFAULT NULL,
  `Photo` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `employe`
--

INSERT INTO `employe` (`Matricule`, `Nom`, `Prenom`, `Date`, `Departement`, `Salaire`, `Fonction`, `Photo`) VALUES
('A123', 'ALI', 'KARIM', '2022-02-02', 'logistique', '4000', 'RESPONSABLE', 'A123.jpg'),
('', '', '', '0000-00-00', '', '0', '', NULL),
('', '', '', '0000-00-00', '', '0', '', NULL),
('A222', 'zak', 'zaki', '2022-02-05', 'A', '9000', 'admin', NULL);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
