-- phpMyAdmin SQL Dump
-- version 4.4.10
-- http://www.phpmyadmin.net
--
-- Host: localhost:8889
-- Generation Time: Apr 14, 2016 at 04:29 AM
-- Server version: 5.5.42
-- PHP Version: 7.0.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `moviehome`
--

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `facebook_id` varchar(255) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `host_rating` float DEFAULT NULL,
  `guest_rating` float DEFAULT NULL,
  `age` int(11) NOT NULL,
  `genre` varchar(50) NOT NULL,
  `picture_url` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `facebook_id`, `first_name`, `last_name`, `email`, `host_rating`, `guest_rating`, `age`, `genre`, `picture_url`) VALUES
(1, '10154128945004704', 'Mickael', 'Zhang', 'mickael.zhg@gmail.com', NULL, NULL, 21, 'homme', ''),
(2, '41890912', 'Jung-Um', 'Kim', 'kim@god.com', NULL, NULL, 28, 'homme', ''),
(3, '782544855209358', 'Nans', 'Thomas', 'nans.thomas@gmail.com', NULL, NULL, 0, 'male', 'https://scontent.xx.fbcdn.net/v/t1.0-1/p50x50/12687903_750369125093598_1940770898717290316_n.jpg?oh=55bc8a134c1ab95e37daf4314b903dcf&oe=5779395F'),
(4, '10207386922289798', 'Ronan', 'Fourreau', '', NULL, NULL, 0, 'male', 'https://scontent.xx.fbcdn.net/v/t1.0-1/c11.0.50.50/p50x50/11826016_10205816709835468_649030152601744711_n.jpg?oh=9cb01f54f42d04045d33e89437377e8a&oe=57B3970A'),
(5, '876367592485676', 'Robin Bryan', 'Michay', 'robin.michay@hotmail.com', NULL, NULL, 0, 'male', 'https://scontent.xx.fbcdn.net/v/t1.0-1/c0.9.50.50/p50x50/12592191_835715899884179_9043382243906939626_n.jpg?oh=92048114db289d8edece5703993e5bed&oe=5777ACAE'),
(6, '202475033468360', 'Rene', 'Vino', 'hello@wino.fr', NULL, NULL, 0, 'female', 'https://scontent.xx.fbcdn.net/v/t1.0-1/c59.0.200.200/p200x200/1379841_10150004552801901_469209496895221757_n.jpg?oh=8fb25f957f2c6c34af4bbff851bce812&oe=57B936E8');

--
-- Indexes for dumped tables
--

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
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
