-- phpMyAdmin SQL Dump
-- version 4.4.10
-- http://www.phpmyadmin.net
--
-- Client :  localhost:8889
-- Généré le :  Mar 12 Avril 2016 à 15:54
-- Version du serveur :  5.5.42
-- Version de PHP :  5.6.10
​
SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";
​
​
/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;
​
--
-- Base de données :  `moviehome`
--
​
-- --------------------------------------------------------
​
--
-- Structure de la table `attend`
--
​
CREATE TABLE `attend` (
  `user_id` int(11) NOT NULL,
  `event_id` int(11) NOT NULL,
  `is_accepted` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
​
--
-- Contenu de la table `attend`
--
​
INSERT INTO `attend` (`user_id`, `event_id`, `is_accepted`) VALUES
(1, 11, NULL);
​
-- --------------------------------------------------------
​
--
-- Structure de la table `events`
--
​
CREATE TABLE `events` (
  `event_id` int(11) NOT NULL,
  `event_name` varchar(50) NOT NULL,
  `begin_date` date NOT NULL,
  `begin_hour` time NOT NULL,
  `approximate_duration` time DEFAULT NULL,
  `adress` varchar(100) NOT NULL,
  `zip_code` int(11) NOT NULL,
  `city` varchar(50) NOT NULL,
  `setup_display` varchar(100) NOT NULL,
  `setup_sound` varchar(100) NOT NULL,
  `description` text,
  `supp_info` text,
  `places_nb` int(11) NOT NULL,
  `place_taken` int(11) NOT NULL DEFAULT '0',
  `rating_event` float DEFAULT NULL,
  `is_public` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8;
​
--
-- Contenu de la table `events`
--
​
INSERT INTO `events` (`event_id`, `event_name`, `begin_date`, `begin_hour`, `approximate_duration`, `adress`, `zip_code`, `city`, `setup_display`, `setup_sound`, `description`, `supp_info`, `places_nb`, `place_taken`, `rating_event`, `is_public`) VALUES
(1, 'Deadpool', '2016-05-17', '22:46:00', '01:58:00', '167 Rue du Temple', 75003, 'Paris', 'pc', 'bq', 'SoirÃ©e Deadpool !', 'J''ai pas de canap', 7, 0, NULL, 1),
(2, 'SoirÃ©e Inception', '2016-07-17', '18:46:00', '01:38:00', '167 Rue du Temple', 75003, 'Paris', 'tv', 'bq', '', 'Toujours pas de canap', 5, 0, NULL, 1),
(11, 'North Korea Best Korea', '2016-04-14', '06:03:00', '02:32:00', 'Great Palace', 88888, 'Pyongyong', 'projecteur', 'hq', '', '', 1000, 0, NULL, 1),
(19, 'North Korea Best Korea', '2016-04-14', '06:03:00', '02:32:00', 'Great Palace', 88888, 'Pyongyong', 'projecteur', 'hq', '', '', 1000, 0, NULL, 1);
​
-- --------------------------------------------------------
​
--
-- Structure de la table `event_movies`
--
​
CREATE TABLE `event_movies` (
  `event_id` int(11) NOT NULL,
  `movie_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
​
--
-- Contenu de la table `event_movies`
--
​
INSERT INTO `event_movies` (`event_id`, `movie_id`) VALUES
(1, 293660),
(2, 27205),
(11, 24428),
(19, 24428);
​
-- --------------------------------------------------------
​
--
-- Structure de la table `organized`
--
​
CREATE TABLE `organized` (
  `user_id` int(11) NOT NULL,
  `event_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
​
--
-- Contenu de la table `organized`
--
​
INSERT INTO `organized` (`user_id`, `event_id`) VALUES
(1, 1),
(1, 2),
(2, 11),
(1, 19);
​
-- --------------------------------------------------------
​
--
-- Structure de la table `users`
--
​
CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `facebook_id` varchar(255) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `host_rating` float DEFAULT NULL,
  `guest_rating` float DEFAULT NULL,
  `age` int(11) NOT NULL,
  `genre` varchar(50) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
​
--
-- Contenu de la table `users`
--
​
INSERT INTO `users` (`user_id`, `facebook_id`, `first_name`, `last_name`, `email`, `host_rating`, `guest_rating`, `age`, `genre`) VALUES
(1, '10154128945004704', 'Mickael', 'Zhang', 'mickael.zhg@gmail.com', NULL, NULL, 21, 'homme'),
(2, '41890912', 'Jung-Um', 'Kim', 'kim@god.com', NULL, NULL, 28, 'homme');
​
--
-- Index pour les tables exportées
--
​
--
-- Index pour la table `attend`
--
ALTER TABLE `attend`
  ADD KEY `user_id` (`user_id`),
  ADD KEY `event_id` (`event_id`);
​
--
-- Index pour la table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`event_id`);
​
--
-- Index pour la table `event_movies`
--
ALTER TABLE `event_movies`
  ADD KEY `event_id` (`event_id`);
​
--
-- Index pour la table `organized`
--
ALTER TABLE `organized`
  ADD KEY `user_id` (`user_id`),
  ADD KEY `event_id` (`event_id`);
​
--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `facebook_id` (`facebook_id`);
​
--
-- AUTO_INCREMENT pour les tables exportées
--
​
--
-- AUTO_INCREMENT pour la table `events`
--
ALTER TABLE `events`
  MODIFY `event_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- Contraintes pour les tables exportées
--
​
--
-- Contraintes pour la table `attend`
--
ALTER TABLE `attend`
  ADD CONSTRAINT `attend_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`),
  ADD CONSTRAINT `attend_ibfk_2` FOREIGN KEY (`event_id`) REFERENCES `events` (`event_id`);
​
--
-- Contraintes pour la table `event_movies`
--
ALTER TABLE `event_movies`
  ADD CONSTRAINT `event_movies_ibfk_1` FOREIGN KEY (`event_id`) REFERENCES `events` (`event_id`) ON DELETE CASCADE ON UPDATE CASCADE;
​
--
-- Contraintes pour la table `organized`
--
ALTER TABLE `organized`
  ADD CONSTRAINT `organized_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `organized_ibfk_2` FOREIGN KEY (`event_id`) REFERENCES `events` (`event_id`) ON DELETE CASCADE ON UPDATE CASCADE;
​
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
