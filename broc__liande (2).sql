-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : lun. 07 avr. 2025 à 16:21
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
-- Base de données : `brocéliande`
--

-- --------------------------------------------------------

--
-- Structure de la table `annonces_rent`
--

CREATE TABLE `annonces_rent` (
  `id` int(11) NOT NULL,
  `title_1` varchar(255) NOT NULL,
  `image_1` varchar(255) NOT NULL,
  `content_1` text NOT NULL,
  `space_1` double NOT NULL,
  `price_1` double NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `annonces_sale`
--

CREATE TABLE `annonces_sale` (
  `id` int(11) NOT NULL,
  `title_2` varchar(255) NOT NULL,
  `image_2` varchar(255) NOT NULL,
  `content_2` text NOT NULL,
  `space_2` double NOT NULL,
  `price_2` double NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `formulaire_contact`
--

CREATE TABLE `formulaire_contact` (
  `id` int(11) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `mail` text NOT NULL,
  `tel` double NOT NULL,
  `content` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `mail` varchar(255) NOT NULL,
  `pass` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `mail`, `pass`, `username`) VALUES
(19, 'ivain@broceliande.com', '$2y$10$yC/OFnPKQ3Uujn6Q1NrWW.keu7bJkZidEaMnrBeGOlCa2cxWGLdY6', 'Ivain'),
(20, 'gauvain@broceliande.com', '$2y$10$2Azbsqs7DbmByxWuZlo43u4taZjc8NOvT1osP60VTrNS/Wzm00pKm', 'Gauvain');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `annonces_rent`
--
ALTER TABLE `annonces_rent`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `user_id` (`user_id`) USING BTREE;

--
-- Index pour la table `annonces_sale`
--
ALTER TABLE `annonces_sale`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `user_id_2` (`user_id`);

--
-- Index pour la table `formulaire_contact`
--
ALTER TABLE `formulaire_contact`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `mail` (`mail`) USING HASH;

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `mail` (`mail`) USING BTREE;

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `annonces_rent`
--
ALTER TABLE `annonces_rent`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT pour la table `annonces_sale`
--
ALTER TABLE `annonces_sale`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT pour la table `formulaire_contact`
--
ALTER TABLE `formulaire_contact`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `annonces_rent`
--
ALTER TABLE `annonces_rent`
  ADD CONSTRAINT `annonces_rent_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Contraintes pour la table `annonces_sale`
--
ALTER TABLE `annonces_sale`
  ADD CONSTRAINT `annonces_sale_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
