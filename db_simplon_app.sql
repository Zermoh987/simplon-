-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : sam. 21 jan. 2023 à 11:20
-- Version du serveur : 10.4.24-MariaDB
-- Version de PHP : 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `db_simplon.app`
--

-- --------------------------------------------------------

--
-- Structure de la table `tb_simplonregister`
--

CREATE TABLE `tb_simplonregister` (
  `Id` int(11) NOT NULL,
  `nom` varchar(100) NOT NULL,
  `prenom` varchar(100) NOT NULL,
  `numero` varchar(15) NOT NULL,
  `email` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `tb_simplonregister`
--

INSERT INTO `tb_simplonregister` (`Id`, `nom`, `prenom`, `numero`, `email`) VALUES
(1, 'ZERBO', 'MOHAMED', '0769033937', 'hamedzerrouss@gmail.com'),
(2, 'ZERBO', 'MOHAMED', '0769033937', 'mohamedzerrouss@gmail.com'),
(3, 'Koffi', 'Jean', '0708708090', 'koffijean@gmail.com');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `tb_simplonregister`
--
ALTER TABLE `tb_simplonregister`
  ADD PRIMARY KEY (`Id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `tb_simplonregister`
--
ALTER TABLE `tb_simplonregister`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
