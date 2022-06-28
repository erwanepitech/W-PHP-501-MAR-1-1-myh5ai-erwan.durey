-- phpMyAdmin SQL Dump
-- version 4.9.5deb2
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:3306
-- Généré le : ven. 11 fév. 2022 à 14:06
-- Version du serveur :  8.0.28-0ubuntu0.20.04.3
-- Version de PHP : 7.4.27

DROP DATABASE IF EXISTS common_database;
CREATE DATABASE common_database;

USE common_database;

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `common_database`
--

-- --------------------------------------------------------

--
-- Structure de la table `Follow`
--

CREATE TABLE `Follow` (
  `user_id` int NOT NULL,
  `follower_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `Follow`
--

INSERT INTO `Follow` (`user_id`, `follower_id`) VALUES
(1, 2),
(2, 1),
(1, 3);

-- --------------------------------------------------------

--
-- Structure de la table `Message`
--

CREATE TABLE `Message` (
  `id` int NOT NULL,
  `user_id` int NOT NULL,
  `content` text NOT NULL,
  `session_message_id` int NOT NULL,
  `post_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `Message`
--

INSERT INTO `Message` (`id`, `user_id`, `content`, `session_message_id`, `post_date`) VALUES
(1, 1, 'hellow world', 1, '2022-02-10 08:58:49'),
(2, 2, 'hello', 1, '2022-02-10 09:23:35');

-- --------------------------------------------------------

--
-- Structure de la table `Session_message`
--

CREATE TABLE `Session_message` (
  `id` int NOT NULL,
  `user_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `Session_message`
--

INSERT INTO `Session_message` (`id`, `user_id`) VALUES
(1, 1),
(1, 2);

-- --------------------------------------------------------

--
-- Structure de la table `Tweet`
--

CREATE TABLE `Tweet` (
  `id` int NOT NULL,
  `user_id` int NOT NULL,
  `content` text NOT NULL,
  `img` mediumblob NOT NULL,
  `post_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Structure de la table `User`
--

CREATE TABLE `User` (
  `id` int NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `user_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `birthdate` date NOT NULL,
  `register_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `User`
--

INSERT INTO `User` (`id`, `lastname`, `firstname`, `user_name`, `email`, `password`, `birthdate`, `register_date`) VALUES
(1, 'Black', 'Randy', 'RandyBlack', 'randy.black@ore.com', '44ed40b9e7e896ff599faa94b19e3283df036901', '1997-10-28', '2022-02-10 08:56:19'),
(2, 'Wheeler', 'Jeffrey', 'JeffreyWiller', 'jeffrey.wheeler@ota.com', 'cba7e54596bd3014ec21a86b7168a90b0e7c870e', '1962-11-18', '2022-02-10 08:56:20'),
(3, 'Garza', 'Bill', 'BillGraza', 'bill.garza@mom.eu', 'e24cfd1005aea8a0c98ee904ecd833098ffb1fa1', '1995-12-10', '2022-02-10 08:56:20'),
(4, 'Duane', 'Christensen', 'ChristensenDuane', 'duane.christensen@ti.fr', '0e914009d244326fa9238ce5005a81004189726b', '1970-01-15', '2022-02-10 08:56:20'),
(5, 'Brent', 'Roberts', 'RobertBrents', 'brent.roberts@zivilzit.fr', '7ab349109fe301540315a660a073f4c8bbdcd9f6', '1970-11-19', '2022-02-10 08:56:20');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `Follow`
--
ALTER TABLE `Follow`
  ADD KEY `user_id` (`user_id`),
  ADD KEY `follower_id` (`follower_id`);

--
-- Index pour la table `Message`
--
ALTER TABLE `Message`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `discution_id` (`session_message_id`);

--
-- Index pour la table `Session_message`
--
ALTER TABLE `Session_message`
  ADD KEY `id` (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Index pour la table `Tweet`
--
ALTER TABLE `Tweet`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Index pour la table `User`
--
ALTER TABLE `User`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `user_name` (`user_name`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `Message`
--
ALTER TABLE `Message`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `Session_message`
--
ALTER TABLE `Session_message`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `Tweet`
--
ALTER TABLE `Tweet`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `User`
--
ALTER TABLE `User`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `Follow`
--
ALTER TABLE `Follow`
  ADD CONSTRAINT `Follow_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `User` (`id`),
  ADD CONSTRAINT `Follow_ibfk_2` FOREIGN KEY (`follower_id`) REFERENCES `User` (`id`),
  ADD CONSTRAINT `Follow_ibfk_3` FOREIGN KEY (`user_id`) REFERENCES `User` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `Follow_ibfk_4` FOREIGN KEY (`follower_id`) REFERENCES `User` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `Message`
--
ALTER TABLE `Message`
  ADD CONSTRAINT `Message_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `User` (`id`),
  ADD CONSTRAINT `Message_ibfk_2` FOREIGN KEY (`session_message_id`) REFERENCES `Session_message` (`id`);

--
-- Contraintes pour la table `Session_message`
--
ALTER TABLE `Session_message`
  ADD CONSTRAINT `Session_message_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `User` (`id`);

--
-- Contraintes pour la table `Tweet`
--
ALTER TABLE `Tweet`
  ADD CONSTRAINT `Tweet_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `User` (`id`),
  ADD CONSTRAINT `Tweet_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `User` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;