-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : mar. 25 jan. 2022 à 16:37
-- Version du serveur : 5.7.36
-- Version de PHP : 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `blog`
--

-- --------------------------------------------------------

--
-- Structure de la table `articles`
--

DROP TABLE IF EXISTS `articles`;
CREATE TABLE IF NOT EXISTS `articles` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `article` text NOT NULL,
  `id_utilisateur` int(11) NOT NULL,
  `id_categorie` int(11) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=16 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `articles`
--

INSERT INTO `articles` (`id`, `article`, `id_utilisateur`, `id_categorie`, `date`) VALUES
(1, 'azerty', 13, 1, '2018-01-07 21:10:00'),
(2, 'oblivion', 15, 3, '2019-01-07 08:10:00'),
(3, 'amazon dans l\'espace', 12, 5, '2021-12-07 10:49:34'),
(4, 'steve bezos 2eme miliardaire dans l\'espace', 12, 5, '2021-12-07 10:49:35'),
(5, 'Blue origin chasse space x', 12, 5, '2021-12-07 10:49:35'),
(6, 'vaincre la guerre spatiale', 12, 5, '2021-12-07 10:49:35'),
(7, 'A la conquète de l\'espace', 12, 5, '2021-12-07 10:49:36'),
(8, 'voyage sur Mars', 12, 5, '2021-12-07 10:50:31'),
(9, 'voyage sur Mars', 12, 1, '2021-12-07 10:52:16'),
(10, 'projet mercurial', 12, 7, '2021-12-07 11:00:30'),
(11, 'StarShip', 12, 1, '2021-12-07 11:03:27'),
(12, 'Station Internationnal', 12, 7, '2021-12-07 11:06:41'),
(13, 'Projet Appolon', 8, 6, '2021-12-07 11:37:21'),
(14, 'pentagone 2020', 15, 6, '2021-12-10 10:35:55'),
(15, 'Premier voyage sur la lune', 14, 8, '2022-01-25 00:14:53');

-- --------------------------------------------------------

--
-- Structure de la table `categories`
--

DROP TABLE IF EXISTS `categories`;
CREATE TABLE IF NOT EXISTS `categories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(80) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `categories`
--

INSERT INTO `categories` (`id`, `nom`) VALUES
(1, 'spaceX'),
(7, 'Thomas Pesquet'),
(3, 'MARS'),
(6, 'NASA'),
(5, 'blueOrigin'),
(8, 'niel armstrong');

-- --------------------------------------------------------

--
-- Structure de la table `commentaires`
--

DROP TABLE IF EXISTS `commentaires`;
CREATE TABLE IF NOT EXISTS `commentaires` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `commentaire` varchar(1024) NOT NULL,
  `id_article` int(11) NOT NULL,
  `id_utilisateur` int(11) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=67 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `commentaires`
--

INSERT INTO `commentaires` (`id`, `commentaire`, `id_article`, `id_utilisateur`, `date`) VALUES
(1, 'va te faire!!!', 13, 14, '2021-12-08 16:46:23'),
(2, 'va te faire!!!', 13, 14, '2021-12-08 16:51:47'),
(3, 'wxc podh,jbvk', 12, 10, '2021-12-08 16:52:48'),
(4, 'je te défonce', 12, 8, '2021-12-08 16:53:22'),
(5, 'déglinguer!!!!', 9, 9, '2021-12-08 16:54:20'),
(6, 'nique tes mort', 13, 9, '2021-12-08 16:55:45'),
(7, 'gfrtghj', 13, 10, '2021-12-08 16:57:12'),
(8, '', 13, 10, '2021-12-08 16:57:25'),
(9, 'qsdfghjk', 13, 10, '2021-12-08 16:57:29'),
(10, '', 13, 10, '2021-12-08 16:58:11'),
(11, '', 13, 10, '2021-12-08 16:58:13'),
(12, 'qsdfghj', 13, 10, '2021-12-08 16:58:17'),
(13, 'va te faire', 13, 10, '2021-12-08 16:58:28'),
(14, 'l heure du duel!!!', 13, 10, '2021-12-08 16:59:01'),
(15, 'école', 13, 10, '2021-12-08 16:59:28'),
(16, '\'', 13, 10, '2021-12-08 16:59:38'),
(17, '', 13, 10, '2021-12-08 16:59:45'),
(18, '', 13, 10, '2021-12-08 16:59:46'),
(19, '', 13, 10, '2021-12-08 16:59:47'),
(20, 'l ', 13, 10, '2021-12-08 17:10:18'),
(21, 'va te ', 13, 14, '2021-12-08 17:11:32'),
(22, 'hey hey', 13, 14, '2021-12-08 17:20:09'),
(23, 'qsdfghj mlkjhgfd', 13, 14, '2021-12-08 17:20:49'),
(24, 'l', 13, 14, '2021-12-09 12:31:36'),
(25, 'l orage', 13, 14, '2021-12-09 12:31:55'),
(26, 'l #', 13, 14, '2021-12-09 12:32:05'),
(27, 'l#', 13, 14, '2021-12-09 12:32:35'),
(28, 'lois', 13, 14, '2021-12-09 12:32:49'),
(29, 'l\"\"', 13, 14, '2021-12-09 12:33:20'),
(30, 'l\"heure', 13, 14, '2021-12-09 12:33:35'),
(31, '___', 13, 14, '2021-12-09 12:34:04'),
(32, '--', 13, 14, '2021-12-09 12:34:08'),
(33, '(((', 13, 14, '2021-12-09 12:34:12'),
(34, '~~~~~~', 13, 14, '2021-12-09 12:34:22'),
(35, '', 13, 14, '2021-12-09 12:34:34'),
(36, '\\', 13, 14, '2021-12-09 12:34:46'),
(37, '', 13, 14, '2021-12-09 12:38:02'),
(38, '', 13, 14, '2021-12-09 12:38:03'),
(39, '', 13, 14, '2021-12-09 12:38:03'),
(40, 'google', 13, 14, '2021-12-09 14:27:01'),
(41, 'fais beau', 13, 14, '2021-12-09 14:27:12'),
(42, 'fais beau', 13, 14, '2021-12-09 14:28:19'),
(43, 'azerty', 6, 0, '2021-12-09 16:04:16'),
(44, 'azerty', 6, 0, '2021-12-09 16:04:24'),
(45, 'azert', 6, 0, '2021-12-09 16:04:30'),
(46, 'azerty', 6, 0, '2021-12-09 16:05:10'),
(47, 'qsdf', 3, 0, '2021-12-09 16:05:56'),
(48, 'qsdf', 3, 0, '2021-12-09 16:06:07'),
(49, 'wxcvb', 13, 0, '2021-12-09 16:09:04'),
(50, 'test test', 13, 15, '2021-12-09 16:13:57'),
(51, 'test test', 13, 0, '2021-12-09 16:14:42'),
(52, 'test test test', 13, 15, '2021-12-09 16:17:25'),
(53, 'va te faire enculer\r\n', 13, 15, '2021-12-09 16:17:40'),
(54, 'ok test', 3, 15, '2021-12-09 16:19:01'),
(55, 'je te hais', 7, 15, '2021-12-09 16:19:16'),
(56, 'test', 5, 15, '2021-12-09 16:23:40'),
(57, 'bob', 11, 15, '2021-12-10 10:33:40'),
(58, 'super article', 14, 9, '2021-12-16 17:23:34'),
(59, 'qsfdgfhjkl', 14, 15, '2022-01-08 12:45:13'),
(60, 'cgjfghkl', 14, 14, '2022-01-19 15:04:12'),
(61, 'yahou', 14, 14, '2022-01-19 15:05:29'),
(62, '', 13, 14, '2022-01-21 09:51:36'),
(63, 'blou blou', 13, 14, '2022-01-21 09:52:52'),
(64, 'wxsfguhjgkl', 13, 14, '2022-01-21 09:54:50'),
(65, 'wxcvbn', 12, 13, '2022-01-21 10:28:14'),
(66, 'dvddjkgbk', 15, 15, '2022-01-25 12:58:35');

-- --------------------------------------------------------

--
-- Structure de la table `droits`
--

DROP TABLE IF EXISTS `droits`;
CREATE TABLE IF NOT EXISTS `droits` (
  `id` int(11) NOT NULL,
  `nom` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `droits`
--

INSERT INTO `droits` (`id`, `nom`) VALUES
(1, 'utilisateur'),
(42, 'modérateur'),
(1337, 'administrateur');

-- --------------------------------------------------------

--
-- Structure de la table `favoris`
--

DROP TABLE IF EXISTS `favoris`;
CREATE TABLE IF NOT EXISTS `favoris` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_utilisateur` int(11) NOT NULL,
  `id_article` int(11) NOT NULL,
  `etat_favoris` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=21 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `favoris`
--

INSERT INTO `favoris` (`id`, `id_utilisateur`, `id_article`, `etat_favoris`) VALUES
(16, 14, 13, 1),
(2, 14, 9, 1),
(3, 14, 7, 1),
(4, 13, 14, 1),
(5, 13, 13, 1),
(17, 14, 2, 1),
(18, 14, 10, 1),
(8, 14, 4, 1),
(9, 13, 12, 1),
(10, 13, 8, 1),
(11, 13, 1, 1),
(12, 13, 3, 1),
(19, 14, 14, 1),
(20, 15, 14, 1);

-- --------------------------------------------------------

--
-- Structure de la table `intermediaire_article_like`
--

DROP TABLE IF EXISTS `intermediaire_article_like`;
CREATE TABLE IF NOT EXISTS `intermediaire_article_like` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_article` int(11) NOT NULL,
  `id_utilisateur` int(11) NOT NULL,
  `etat_like` int(1) NOT NULL,
  `dislike` int(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=242 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `intermediaire_article_like`
--

INSERT INTO `intermediaire_article_like` (`id`, `id_article`, `id_utilisateur`, `etat_like`, `dislike`) VALUES
(156, 13, 15, 1, 0),
(28, 13, 16, 0, 1),
(151, 14, 15, 1, 0),
(228, 13, 14, 0, 1),
(239, 14, 14, 1, 0),
(184, 11, 14, 1, 0),
(234, 12, 13, 1, 0),
(235, 8, 13, 1, 0),
(236, 14, 13, 0, 1),
(240, 11, 15, 1, 0),
(241, 15, 15, 1, 0);

-- --------------------------------------------------------

--
-- Structure de la table `utilisateurs`
--

DROP TABLE IF EXISTS `utilisateurs`;
CREATE TABLE IF NOT EXISTS `utilisateurs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `login` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `id_droits` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=19 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `utilisateurs`
--

INSERT INTO `utilisateurs` (`id`, `login`, `password`, `email`, `id_droits`) VALUES
(16, 'kenshiro', '$2y$10$ubnDCrWbHz11XLEnu4AnK.3q5bc5eUPyQI5YdIMQT9gVQKus2ei7i', 'ken@gmail.com', 1),
(15, 'b', '$argon2id$v=19$m=65536,t=4,p=1$MGtEU1djQmRWWFMuNm9aVw$yev8WAu5PRJ0bRtcPD0JZemDvZRmuXm6BSJtrArIW6E', 'b@b.com', 1337),
(14, 'a', '$argon2id$v=19$m=65536,t=4,p=1$Q0V5TGxtODBsd3RKOVZhaQ$+/usxXFnG0JKnVz9awY5wIjmOHGg42FDUHk+rgMLnz8', 'a@a.com', 42),
(13, 'broly', '$argon2i$v=19$m=65536,t=4,p=1$d1ZyQS9RMnc2ak9lak50ZA$7eASto3/pjEk8b5ISB6BgD8ymXI+s9Uz/lFWNRrtpBo', 'vegeta@gmail.com', 1),
(8, 'yamcha', '$argon2i$v=19$m=65536,t=4,p=1$YkhIQWVsOTY1aC9QcU9SOA$tP6uVayuWDsP17lVVAzwBML0mhl42uZqvSnZepSuw/o', 'yamcha@gmail.com', 1),
(9, 'free', '$argon2i$v=19$m=65536,t=4,p=1$SmJTeVR1UXpyVldJOS9sRg$pQiJtzoWnPtkieX2riWvwaXPe2LOGATw7JbBzCqdg8M', 'freezer@gamail.com', 42),
(10, 'tenshinhan', '$argon2i$v=19$m=65536,t=4,p=1$YXYxNjV5Z3JkZW1lVUpLOQ$35t+AP1ndi/pVkGv2uJoDal/286qXecy2TkSN4TLj58', 'yoyo@gmail.com', 1),
(12, 'goku', '$argon2i$v=19$m=65536,t=4,p=1$alpwejlQQkJqeEVSdTRrNQ$9hgaIEPyFhh82eM05xn2Mt6ps0cCYCpAmA7NEYeCcec', 'goku@gmail.com', 1),
(17, 'c', '$2y$10$0RjbzfbaQsIcA/eSYjiK4e2h0MHtafeZQOiSRoDqg5qGr.YjUfVXO', 'c@c.com', 1),
(18, 'x', '$2y$10$9xkw5R1jWkd1yVFq9va36OK4yQFkqCiQqDSYi4DyCOVU.uTxohsJi', 'x@x.com', 1);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
