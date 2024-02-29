-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : sam. 17 fév. 2024 à 15:42
-- Version du serveur : 10.4.27-MariaDB
-- Version de PHP : 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `meko_collaborative_app`
--

-- --------------------------------------------------------

--
-- Structure de la table `messages`
--

CREATE TABLE `messages` (
  `id_m` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `msg` varchar(1000) NOT NULL,
  `date` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `messages`
--

INSERT INTO `messages` (`id_m`, `email`, `msg`, `date`) VALUES
(46, 'timo@gmail.com', 'Yo les frère !', '2024-01-11 12:58:54'),
(47, 'onanavital@outlook.com', 'Bonjour ! Frère comment vas-tu ? Je suis allez vérifieubr le code source de VLC sur GitHub.', '2024-02-08 23:11:51'),
(48, 'onanavital@outlook.com', 'Bonjour ! Frère comment vas-tu ? Je suis allez vérifieubr le code source de VLC sur GitHub.Bonjour ! Frère comment vas-tu ? Je suis allez vérifieubr le code source de VLC sur GitHub.Bonjour ! Frère comment vas-tu ? Je suis allez vérifieubr le code source de VLC sur GitHub.Bonjour ! Frère comment vas-tu ? Je suis allez vérifieubr le code source de VLC sur GitHub.Bonjour ! Frère comment vas-tu ? Je suis allez vérifieubr le code source de VLC sur GitHub.Bonjour ! Frère comment vas-tu ? Je suis allez vérifieubr le code source de VLC sur GitHub.', '2024-02-08 23:12:02');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `pseudo` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `whatsapp` varchar(255) NOT NULL,
  `country` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `pseudo`, `email`, `whatsapp`, `country`, `password`) VALUES
(1, 'ONANA', 'onanavital@outlook.com', '6 52 14 84 17', 'Cameroun', '$2y$12$SVskwt1vDZK.P0wm4zaub.DHWVXFYDMMwZ5WhS7lkpPXogwNK3dLS'),
(2, 'Daniel ', 'daniel@gmail.com', '6 00 00 00 00', 'Cameroun', '$2y$12$PR8CR63DazKq1hvIwDIqgusYIqJ3t/Rf9uKZ4dPNSaGrIzzNgP2K.');

-- --------------------------------------------------------

--
-- Structure de la table `utilisateurs`
--

CREATE TABLE `utilisateurs` (
  `id_u` int(11) NOT NULL,
  `pseudo` varchar(255) NOT NULL,
  `work` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `mdp` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `utilisateurs`
--

INSERT INTO `utilisateurs` (`id_u`, `pseudo`, `work`, `email`, `mdp`) VALUES
(8, '', '', 'onanavital@outlook.com', 'password'),
(9, 'ONANA vital', 'Lead Developer', 'vital@gmail.com', 'password'),
(10, 'Thomas Shelby', 'Community manager', 'thomasshelby@gmail.com', 'password'),
(11, 'Timothée', 'Développeur', 'timo@gmail.com', 'password');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id_m`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `utilisateurs`
--
ALTER TABLE `utilisateurs`
  ADD PRIMARY KEY (`id_u`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `messages`
--
ALTER TABLE `messages`
  MODIFY `id_m` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `utilisateurs`
--
ALTER TABLE `utilisateurs`
  MODIFY `id_u` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;