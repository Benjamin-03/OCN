-- phpMyAdmin SQL Dump
-- version 4.9.3
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:3306
-- Généré le :  Dim 24 mai 2020 à 14:53
-- Version du serveur :  5.7.26
-- Version de PHP :  7.4.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Base de données :  `OCN`
--

-- --------------------------------------------------------

--
-- Structure de la table `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(11) NOT NULL,
  `email` text NOT NULL,
  `password` text NOT NULL,
  `secret` text NOT NULL,
  `date_add` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `blocked` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `admin`
--

INSERT INTO `admin` (`id_admin`, `email`, `password`, `secret`, `date_add`, `blocked`) VALUES
(2, 'benjamin@france-automatismes.com', 'ako254d9be4c752112ed1cbfd39349e1e2419b545ca9ik', '871c4d08172e7178cd52cb2794d85ec45b01d4f815895360411589536041', '2020-05-15 11:47:21', 0),
(3, 'benjamin.rezel@orange.fr', 'test', 'test', '2020-05-24 13:46:38', 0);

-- --------------------------------------------------------

--
-- Structure de la table `events`
--

CREATE TABLE `events` (
  `id_event` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `name` text NOT NULL,
  `description` text,
  `limit_user` int(11) NOT NULL DEFAULT '12',
  `date_add` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `date_end` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `personnage`
--

CREATE TABLE `personnage` (
  `id_personnage` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `nom` text NOT NULL,
  `classe` text NOT NULL,
  `cp` text NOT NULL,
  `role` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `personnage`
--

INSERT INTO `personnage` (`id_personnage`, `id_user`, `nom`, `classe`, `cp`, `role`) VALUES
(1, 0, 'jorvan', 'sorcier', '750', ''),
(2, 0, 'jorvan', 'sorcier', '4', ''),
(3, 0, 'jorvan', 'lamenoire', '4', ''),
(4, 0, 'jorvan', 'lamenoire', '1', ''),
(5, 0, 'jorvan', 'sorcier', '4', ''),
(6, 0, 'jorvan', 'sorcier', '4', ''),
(7, 0, 'jorvan', 'sorcier', '4', ''),
(8, 0, 'jorvan', 'chevalier', '1', ''),
(9, 9, 'nirn couvreflamme', 'chevalier', '600-810', ''),
(10, 9, 'Ramalor', 'templier', '600-810', ''),
(11, 9, 'test', '--', '10-160', ''),
(12, 9, 'teste', '--', '10-160', ''),
(13, 9, 'trdg', '--', '10-160', ''),
(14, 9, 'Erhynn', 'sorcier', '300-600', 'dps-distance');

-- --------------------------------------------------------

--
-- Structure de la table `roles`
--

CREATE TABLE `roles` (
  `id_role` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `dps` varchar(255) NOT NULL,
  `tank` varchar(255) NOT NULL,
  `heal` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id_user` int(11) NOT NULL,
  `pseudo` text NOT NULL,
  `email` text NOT NULL,
  `profil` text NOT NULL,
  `password` text NOT NULL,
  `secret` text NOT NULL,
  `date_add` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `blocked` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id_user`, `pseudo`, `email`, `profil`, `password`, `secret`, `date_add`, `blocked`) VALUES
(9, 'toxicgunhd', 'benjamin.rezel@orange.fr', '../image/profil/1589744614profil.png', 'ako254d9be4c752112ed1cbfd39349e1e2419b545ca9ik', '07201b1fccf2e3bc110ba773a2f1934f69200ee015895503981589550398', '2020-05-15 15:46:38', 0),
(11, 'kiwi', 'kiwi@kiwi.kiwi', '../image/profil/profil_default.png', 'akod90a4b4378774516977b9a011047cb7ccc9eba0a9ik', '703fd4d61dd046292320cb3270bebf91ae5bd08015900607481590060748', '2020-05-21 13:32:28', 0);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Index pour la table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`id_event`),
  ADD KEY `id_user` (`id_user`);

--
-- Index pour la table `personnage`
--
ALTER TABLE `personnage`
  ADD PRIMARY KEY (`id_personnage`),
  ADD KEY `id_user` (`id_user`) USING BTREE;

--
-- Index pour la table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id_role`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `events`
--
ALTER TABLE `events`
  MODIFY `id_event` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `personnage`
--
ALTER TABLE `personnage`
  MODIFY `id_personnage` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT pour la table `roles`
--
ALTER TABLE `roles`
  MODIFY `id_role` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
