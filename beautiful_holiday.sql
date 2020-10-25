-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : Dim 25 oct. 2020 à 22:17
-- Version du serveur :  5.7.31
-- Version de PHP : 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `beautiful_holiday`
--

-- --------------------------------------------------------

--
-- Structure de la table `bookings`
--

DROP TABLE IF EXISTS `bookings`;
CREATE TABLE IF NOT EXISTS `bookings` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `property_id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` int(11) NOT NULL,
  `phone` varchar(100) NOT NULL,
  `city_id` int(11) NOT NULL,
  `zip` int(11) NOT NULL,
  `country_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `checkin_date` date NOT NULL,
  `checkin_time` time NOT NULL,
  `checkout_date` timestamp NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `cities`
--

DROP TABLE IF EXISTS `cities`;
CREATE TABLE IF NOT EXISTS `cities` (
  `city_id` int(11) NOT NULL AUTO_INCREMENT,
  `city_name` varchar(100) NOT NULL,
  PRIMARY KEY (`city_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `comments`
--

DROP TABLE IF EXISTS `comments`;
CREATE TABLE IF NOT EXISTS `comments` (
  `comment_id` int(11) NOT NULL AUTO_INCREMENT,
  `comment_title` varchar(100) NOT NULL,
  `comment_content` text NOT NULL,
  `comment_author` varchar(100) NOT NULL,
  `submission_date` date NOT NULL,
  `user_id` int(11) NOT NULL,
  PRIMARY KEY (`comment_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `properties`
--

DROP TABLE IF EXISTS `properties`;
CREATE TABLE IF NOT EXISTS `properties` (
  `property_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `year` year(4) NOT NULL,
  `description` varchar(255) NOT NULL,
  `category_id` int(11) NOT NULL,
  `address` varchar(255) NOT NULL,
  `country_id` int(11) NOT NULL,
  `city_id` int(11) NOT NULL,
  `region_id` int(11) NOT NULL,
  `comment_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `user_type` int(11) NOT NULL,
  `image` varchar(255) NOT NULL,
  PRIMARY KEY (`property_id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `properties`
--

INSERT INTO `properties` (`property_id`, `name`, `year`, `description`, `category_id`, `address`, `country_id`, `city_id`, `region_id`, `comment_id`, `user_id`, `user_type`, `image`) VALUES
(1, 'California, San Francisco ', 2020, 'Furnished apartment in the wonderful Marina District of San Francisco, walk to Crissy Fields. Single story no steps. 1 Bedroom, living room, full kitchen, bathroom, washer/dryer and back yard area. Private location with excellent security. ', 0, '2071  Pretty View Lane\r\nSan Francisco\r\n94103\r\nCalifornia', 1, 1, 1, 1, 1, 0, '');

-- --------------------------------------------------------

--
-- Structure de la table `regions`
--

DROP TABLE IF EXISTS `regions`;
CREATE TABLE IF NOT EXISTS `regions` (
  `region_id` int(11) NOT NULL AUTO_INCREMENT,
  `region_name` varchar(100) NOT NULL,
  PRIMARY KEY (`region_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `firstname` varchar(100) NOT NULL,
  `lastname` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `user_type` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `firstname`, `lastname`, `email`, `password`, `user_type`) VALUES
(1, 'aaa', 'aaa', 'aaa@aaa.aaa', '$2y$10$cSBcVtC8vGfjZAm8tVAa9OfCBgJ2kE3hnMGajJWXtHAstRovmO4Wm', 0),
(2, 'AmÃ©lie', 'Serafini', 'amelie@gmail.com', '$2y$10$jIThlGP4yeAPf80H.Nl4fOCot5Wai5VxcUPQzXe4.qQCI/FyKX0w2', 0),
(3, 'aurore', 'lemoine', 'aurore@lemoine.fr', '$2y$10$1P/lvRIse/nuXdXNJQqepO7DWu7e0FQliwHY1jHho09CIqi6hBr7.', 0),
(4, 'bb', 'b', 'bb@b.fr', '$2y$10$2tibqCQXjQzbJbKA93QxD.sANEkWFnCX0DyRURAKt0B6VyNgxSuby', 0),
(5, 'audrey', 'fleurot', 'audrey@fleurot.fr', '$2y$10$GWvXdEC.2VXiEpyaVNjnX.lvqJ5ehcjh/Jpps/m24dFpeAyxRmMSK', 1);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
