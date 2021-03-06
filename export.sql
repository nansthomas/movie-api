-- phpMyAdmin SQL Dump
-- version 4.4.10
-- http://www.phpmyadmin.net
--
-- Host: localhost:8889
-- Generation Time: Apr 15, 2016 at 03:52 PM
-- Server version: 5.5.42
-- PHP Version: 7.0.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `moviehome`
--

-- --------------------------------------------------------

--
-- Table structure for table `attend`
--

CREATE TABLE `attend` (
  `user_id` int(11) NOT NULL,
  `event_id` int(11) NOT NULL,
  `is_accepted` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `attend`
--

INSERT INTO `attend` (`user_id`, `event_id`, `is_accepted`) VALUES
(2, 5, 1),
(2, 5, 1),
(2, 5, 1),
(2, 5, 1),
(2, 9, 1),
(1, 10, 1),
(2, 12, 1);

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `event_id` int(11) NOT NULL,
  `event_name` varchar(50) NOT NULL,
  `begin_date` date NOT NULL,
  `begin_hour` time NOT NULL,
  `approximate_duration` time DEFAULT NULL,
  `label` varchar(255) NOT NULL,
  `house_number` varchar(255) NOT NULL,
  `street` varchar(255) NOT NULL,
  `zip_code` varchar(10) NOT NULL,
  `city` varchar(100) NOT NULL,
  `latitude` decimal(11,7) NOT NULL,
  `longitude` decimal(11,7) NOT NULL,
  `setup_display` varchar(100) NOT NULL,
  `setup_sound` varchar(100) NOT NULL,
  `description` text,
  `supp_info` text,
  `place_nb` int(11) NOT NULL,
  `place_taken` int(11) NOT NULL DEFAULT '0',
  `pending_request` int(11) NOT NULL DEFAULT '0',
  `rating_event` float DEFAULT NULL,
  `is_public` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`event_id`, `event_name`, `begin_date`, `begin_hour`, `approximate_duration`, `label`, `house_number`, `street`, `zip_code`, `city`, `latitude`, `longitude`, `setup_display`, `setup_sound`, `description`, `supp_info`, `place_nb`, `place_taken`, `pending_request`, `rating_event`, `is_public`) VALUES
(5, 'SoirÃ©e Deadpool ðŸŽ‰', '2016-04-16', '20:45:00', NULL, '2 Rue du Sentier 75002 Paris', '2', 'Rue du Sentier', '75002', 'Paris', '2.3454890', '48.8678310', 'projecteur', 'hq', 'SoirÃ©e Deadpool, les costumes, la biÃ¨re et la bonne humeurs sont les bienvenues ! A trÃ¨s vite !', '', 15, 1, 3, NULL, 1),
(9, 'Antman 3D', '2016-04-16', '22:00:00', NULL, '27 Rue du ProgrÃ¨s 93100 Montreuil', '27', 'Rue du ProgrÃ¨s', '93100', 'Montreuil', '2.4214890', '48.8518660', 'projecteur', 'hq', 'Je viens de recevoir mon nouveau video projecteur 3D, je vous invite donc Ã  venir le tester avec moi ! ðŸ‘', NULL, 20, 1, 0, NULL, 1),
(10, 'OSS 117', '2016-04-17', '13:00:00', NULL, '167 Rue du Temple 75003 Paris', '167', 'Rue du Temple', '75003', 'Paris', '2.3596880', '48.8648920', 'pc', 'natif', 'Super soirÃ©e pour les fans de OSS 117 ðŸš€', NULL, 5, 1, 0, NULL, 1),
(11, 'zef', '2016-04-16', '15:23:00', NULL, '27 Rue du Chazeau 54220 MalzÃ©ville', '27', 'Rue du Chazeau', '54220', 'MalzÃ©ville', '6.1876160', '48.7153560', '', '', 'fznefzefzef', NULL, 3, 0, 0, NULL, 1),
(12, 'Test redirect', '2016-04-30', '15:30:00', NULL, '27 Rue du Chazeau 54220 MalzÃ©ville', '27', 'Rue du Chazeau', '54220', 'MalzÃ©ville', '6.1876160', '48.7153560', '', '', 'fnzeifnzef', NULL, 2, 1, 0, NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `event_movies`
--

CREATE TABLE `event_movies` (
  `event_id` int(11) NOT NULL,
  `movie_id` int(11) NOT NULL,
  `movie_name` varchar(250) NOT NULL,
  `poster_path` varchar(200) NOT NULL,
  `backdrop_path` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `event_movies`
--

INSERT INTO `event_movies` (`event_id`, `movie_id`, `movie_name`, `poster_path`, `backdrop_path`) VALUES
(5, 293660, 'Deadpool', '/eJyRzC5uFjQryu8Hm61yqtrzj4S.jpg', '/n1y094tVDFATSzkTnFxoGZ1qNsG.jpg'),
(9, 102899, 'Ant-Man', '/n2guSYqwSQfWJnh301xIfV8OjUm.jpg', '/kvXLZqY0Ngl1XSw7EaMQO0C1CCj.jpg'),
(10, 15588, 'OSS 117 : Rio ne rÃ©pond plus', '/zBs9y04GVM31gIl12hoqgcxHVK2.jpg', '/gRZPAilYlNoaTApTk9FpibkqEyW.jpg'),
(11, 150540, 'Vice-versa', '/7N5B2fyYS95ARjyMLfX5vbAYjT1.jpg', '/szytSpLAyBh3ULei3x663mAv5ZT.jpg'),
(12, 271110, 'Captain America - Civil War', '/ehjpo1YkXN3jiVt5L0SJMbTDAtQ.jpg', '/rqAHkvXldb9tHlnbQDwOzRi0yVD.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `organized`
--

CREATE TABLE `organized` (
  `user_id` int(11) NOT NULL,
  `event_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `organized`
--

INSERT INTO `organized` (`user_id`, `event_id`) VALUES
(1, 5),
(1, 9),
(2, 10),
(1, 11),
(1, 12);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `facebook_id` varchar(255) NOT NULL,
  `picture_url` varchar(500) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `host_rating` float DEFAULT NULL,
  `guest_rating` float DEFAULT NULL,
  `age` int(11) NOT NULL,
  `birthday_date` date NOT NULL,
  `genre` varchar(50) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `facebook_id`, `picture_url`, `first_name`, `last_name`, `email`, `host_rating`, `guest_rating`, `age`, `birthday_date`, `genre`) VALUES
(1, '782544855209358', 'https://scontent.xx.fbcdn.net/hprofile-xfp1/v/t1.0-1/p200x200/12687903_750369125093598_1940770898717290316_n.jpg?oh=cd131f2b9e79014125e185c732c89f07&oe=57BC363E', 'Nans', 'Thomas', 'nans.thomas@gmail.com', NULL, NULL, 0, '0000-00-00', 'male'),
(2, '202475033468360', 'https://scontent.xx.fbcdn.net/hprofile-xpf1/v/t1.0-1/p200x200/12998550_202493593466504_2373300648863641484_n.jpg?oh=3251f98ff60346bd8f680c3d40e913ab&oe=57795494', 'Jerome', 'Vino', 'hello@wino.fr', NULL, NULL, 0, '0000-00-00', 'female');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `attend`
--
ALTER TABLE `attend`
  ADD KEY `user_id` (`user_id`),
  ADD KEY `event_id` (`event_id`),
  ADD KEY `event_id_2` (`event_id`),
  ADD KEY `user_id_2` (`user_id`);

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`event_id`);

--
-- Indexes for table `event_movies`
--
ALTER TABLE `event_movies`
  ADD KEY `event_id` (`event_id`),
  ADD KEY `event_id_2` (`event_id`);

--
-- Indexes for table `organized`
--
ALTER TABLE `organized`
  ADD KEY `user_id` (`user_id`),
  ADD KEY `event_id` (`event_id`),
  ADD KEY `user_id_2` (`user_id`),
  ADD KEY `event_id_2` (`event_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `facebook_id` (`facebook_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `event_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `attend`
--
ALTER TABLE `attend`
  ADD CONSTRAINT `attend_ibfk_2` FOREIGN KEY (`event_id`) REFERENCES `events` (`event_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `attend_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `event_movies`
--
ALTER TABLE `event_movies`
  ADD CONSTRAINT `event_movies_ibfk_1` FOREIGN KEY (`event_id`) REFERENCES `events` (`event_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `organized`
--
ALTER TABLE `organized`
  ADD CONSTRAINT `organized_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `organized_ibfk_2` FOREIGN KEY (`event_id`) REFERENCES `events` (`event_id`) ON DELETE CASCADE ON UPDATE CASCADE;
