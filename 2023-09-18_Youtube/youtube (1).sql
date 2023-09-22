-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 20, 2023 at 10:12 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `youtube`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) UNSIGNED NOT NULL COMMENT 'Category id',
  `name` varchar(50) NOT NULL COMMENT 'Category Name'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`) VALUES
(1, 'Fashion'),
(2, 'Comedy'),
(3, 'Movie Trailers'),
(4, 'Music'),
(5, 'News');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) UNSIGNED NOT NULL COMMENT 'user id',
  `user_name` varchar(50) NOT NULL COMMENT 'user name',
  `email` varchar(50) NOT NULL COMMENT 'user email'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `user_name`, `email`) VALUES
(1, 'Septintokas', 'septintokas@gmail.com'),
(12, 'Koko', 'koko@gmail.com'),
(14, 'mika', 'mika@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `videos`
--

CREATE TABLE `videos` (
  `id` int(11) UNSIGNED NOT NULL COMMENT 'video id',
  `author` varchar(50) NOT NULL COMMENT 'video title',
  `video title` varchar(255) NOT NULL COMMENT 'video title',
  `url` varchar(255) NOT NULL COMMENT 'video url',
  `category_id` int(11) UNSIGNED DEFAULT NULL,
  `user_id` int(11) UNSIGNED DEFAULT NULL COMMENT 'user id'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `videos`
--

INSERT INTO `videos` (`id`, `author`, `video title`, `url`, `category_id`, `user_id`) VALUES
(3, 'Mantas Bartusevicius', 'Darbai', 'https://www.youtube.com/embed/v8ROVhaHzCk?si=Pjgg1op_VB5s5mCH', 2, 1),
(4, 'Warner Bros. Pictures', 'Barbie | Main Trailer', 'https://www.youtube.com/embed/pBk4NYhWNMM?si=G3KnASVrgTa0NtkC', 3, 1),
(6, 'Imagine Dragons', 'Natural', 'https://www.youtube.com/embed/0I647GU3Jsc?si=QqbV1gJzDi5hDaPv', 4, 1),
(7, 'Laisves TV', 'TŽ: Žemaitaičio apkalta | Azerbaidžano karinė operacija | Puidokas ir gyvenimo įgūdžiai | Pedagogai', 'https://www.youtube.com/embed/Zv0ZMe4qO9o?si=w33Pg9r8doeMozXS', 5, 1),
(8, 'alexrainbirdMusic', 'An Indie/Folk/Acoustic Playlist | Vol. 4', 'https://www.youtube.com/embed/KDJLpgF9oxQ?si=KRiB6pyG1IDIRbzV', 4, 12),
(10, 'FF Channel', 'Valentino | Fall Winter 2023/2024 | Full Show', 'https://www.youtube.com/embed/dTawXdxXzp0?si=bE6PBGJAwwT0R1ki', 1, 14);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `videos`
--
ALTER TABLE `videos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user delete` (`user_id`),
  ADD KEY `category` (`category_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT 'Category id', AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT 'user id', AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `videos`
--
ALTER TABLE `videos`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT 'video id', AUTO_INCREMENT=11;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `videos`
--
ALTER TABLE `videos`
  ADD CONSTRAINT `category` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `user delete` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
