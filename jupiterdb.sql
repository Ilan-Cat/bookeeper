-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:8889
-- Généré le : ven. 17 mars 2023 à 20:46
-- Version du serveur :  5.7.34
-- Version de PHP : 7.4.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `jupiterdb`
--

-- --------------------------------------------------------

--
-- Structure de la table `books`
--

CREATE TABLE `books` (
  `isbn` bigint(8) NOT NULL,
  `title` varchar(100) NOT NULL,
  `author` varchar(20) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `bestseller` tinyint(4) NOT NULL DEFAULT '0',
  `year` int(11) DEFAULT NULL,
  `publisher` varchar(45) DEFAULT NULL,
  `cover` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `books`
--

INSERT INTO `books` (`isbn`, `title`, `author`, `description`, `bestseller`, `year`, `publisher`, `cover`) VALUES
(2005018, 'Clara Callan', 'Richard Bruce Wright', NULL, 0, 2001, 'HarperFlamingo Canada', 'img/covers/2005018.jpg'),
(60168013, 'Pigs in Heaven', 'Barbara Kingsolver', NULL, 0, 1993, 'Harpercollins', 'img/covers/60168013.jpg'),
(195153448, 'Classical Mythology', 'Mark P. O. Morford', NULL, 1, 2002, 'Oxford University Press', 'img/covers/195153448.jpg'),
(345402871, 'Airframe', 'Michael Crichton', NULL, 0, 1997, 'Ballantine Books', 'img/covers/345402871.jpg'),
(345417623, 'Timeline', 'MICHAEL CRICHTON', NULL, 1, 2000, 'Ballantine Books', 'img/covers/345417623.jpg'),
(375406328, 'Lying Awake', 'Mark Salzman', NULL, 0, 2000, 'Alfred A. Knopf', 'img/covers/375406328.jpg'),
(375759778, 'Prague : A Novel', 'ARTHUR PHILLIPS', NULL, 0, 2003, 'Random House Trade Paperbacks', 'img/covers/375759778.jpg'),
(425163091, 'Chocolate Jesus', 'Stephan Jaramillo', NULL, 0, 1998, 'Berkley Publishing Group', 'img/covers/425163091.jpg'),
(439095026, 'Tell Me This Isn\'t Happening', 'Robynn Clairday', NULL, 0, 1999, 'Scholastic', 'img/covers/439095026.jpg'),
(446310786, 'To Kill a Mockingbird', 'Harper Lee', NULL, 1, 1988, 'Little Brown &amp; Company', 'img/covers/446310786.jpg'),
(449005615, 'Seabiscuit: An American Legend', 'LAURA HILLENBRAND', NULL, 0, 2002, 'Ballantine Books', 'img/covers/449005615.jpg'),
(684823802, 'OUT OF THE SILENT PLANET', 'C.S. Lewis', NULL, 0, 1996, 'Scribner', 'img/covers/684823802.jpg'),
(689821166, 'Flood : Mississippi 1927', 'Kathleen Duey', NULL, 0, 1998, 'Aladdin', 'img/covers/689821166.jpg'),
(887841740, 'The Middle Stories', 'Sheila Heti', NULL, 0, 2004, 'House of Anansi Press', 'img/covers/887841740.jpg'),
(971880107, 'Wild Animus', 'Rich Shapero', NULL, 1, 2004, 'Too Far', 'img/covers/971880107.jpg'),
(1552041778, 'Jane Doe', 'R. J. Kaiser', NULL, 0, 1999, 'Mira Books', 'img/covers/1552041778.jpg'),
(1841721522, 'New Vegetarian: Bold and Beautiful Recipes for Every Occasion', 'Celia Brooks Brown', NULL, 0, 2001, 'Ryland Peters &amp; Small Ltd', 'img/covers/1841721522.jpg'),
(3442353866, 'Der Fluch der Kaiserin. Ein Richter- Di- Roman.', 'Eleanor Cooney', NULL, 0, 2001, 'Goldmann', 'img/covers/3442353866.jpg'),
(3442410665, 'Sturmzeit. Roman.', 'Charlotte Link', NULL, 0, 1991, 'Goldmann', 'img/covers/3442410665.jpg');

-- --------------------------------------------------------

--
-- Structure de la table `contactform`
--

CREATE TABLE `contactform` (
  `name` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `subject` varchar(50) NOT NULL,
  `content` text NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `newsletter`
--

CREATE TABLE `newsletter` (
  `email` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `userfavorites`
--

CREATE TABLE `userfavorites` (
  `user_id` int(11) NOT NULL,
  `isbn` bigint(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `salt` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`isbn`);

--
-- Index pour la table `userfavorites`
--
ALTER TABLE `userfavorites`
  ADD KEY `isbn` (`isbn`),
  ADD KEY `user_id` (`user_id`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `userfavorites`
--
ALTER TABLE `userfavorites`
  ADD CONSTRAINT `userfavorites_ibfk_1` FOREIGN KEY (`isbn`) REFERENCES `books` (`isbn`),
  ADD CONSTRAINT `userfavorites_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
