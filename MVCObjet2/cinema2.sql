-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : mar. 17 jan. 2023 à 11:36
-- Version du serveur : 10.4.27-MariaDB
-- Version de PHP : 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `cinema2`
--

-- --------------------------------------------------------

--
-- Structure de la table `actor`
--

CREATE TABLE `actor` (
  `id` int(11) NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Déchargement des données de la table `actor`
--

INSERT INTO `actor` (`id`, `firstname`, `lastname`) VALUES
(1, 'clint', 'eastwood'),
(2, 'jacques', 'nicolson'),
(3, 'jane', 'fonda'),
(4, 'jamie', 'foxx'),
(5, 'brigitte', 'bardot'),
(6, 'michel', 'piccoli'),
(7, 'sam', 'neil'),
(8, 'jeff', 'goldlum'),
(9, 'robert ', 'de niro'),
(10, 'anna', 'paquin');

-- --------------------------------------------------------

--
-- Structure de la table `director`
--

CREATE TABLE `director` (
  `id` int(11) NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Déchargement des données de la table `director`
--

INSERT INTO `director` (`id`, `firstname`, `lastname`) VALUES
(1, 'quentin', 'tarantino'),
(2, 'jean-luc', 'godard'),
(3, 'steven', 'spielbierg'),
(4, 'martin', 'scorsese');

-- --------------------------------------------------------

--
-- Structure de la table `genre`
--

CREATE TABLE `genre` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Déchargement des données de la table `genre`
--

INSERT INTO `genre` (`id`, `name`) VALUES
(1, 'western'),
(2, 'fantastique'),
(3, 'fiction'),
(4, 'action');

-- --------------------------------------------------------

--
-- Structure de la table `joue`
--

CREATE TABLE `joue` (
  `id_acteur` int(11) NOT NULL,
  `id_movie` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Déchargement des données de la table `joue`
--

INSERT INTO `joue` (`id_acteur`, `id_movie`) VALUES
(4, 1),
(5, 2),
(6, 2),
(7, 3),
(8, 3),
(9, 4),
(10, 4);

-- --------------------------------------------------------

--
-- Structure de la table `movie`
--

CREATE TABLE `movie` (
  `id` int(11) NOT NULL,
  `title` varchar(50) NOT NULL,
  `description` varchar(500) NOT NULL,
  `duration` int(11) NOT NULL,
  `date` date NOT NULL,
  `coverimage` varchar(500) NOT NULL,
  `id_director` int(11) NOT NULL,
  `id_genre` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Déchargement des données de la table `movie`
--

INSERT INTO `movie` (`id`, `title`, `description`, `duration`, `date`, `coverimage`, `id_director`, `id_genre`) VALUES
(1, 'django unchained', 'blabla bla long film sympa', 165, '2013-01-16', 'https://fr.web.img6.acsta.net/medias/nmedia/18/90/08/59/20366454.jpg', 1, 1),
(2, 'le mepris', 'avec michel piccoli et brigite bardot', 103, '1963-12-20', 'https://encrypted-tbn1.gstatic.com/images?q=tbn:ANd9GcSPsqRCLbP7OUZCVRbRG4_XsNQJckuex5lTqheuZ0k3aNiwWOnw', 2, 3),
(3, 'jurassic park', 'oh des dinosaures', 127, '1993-10-20', 'https://fr.web.img4.acsta.net/pictures/20/07/21/16/53/1319265.jpg', 3, 2),
(4, 'the irishman', 'il parait qu\'ils sont irlandais', 210, '2019-09-27', 'https://fr.web.img5.acsta.net/pictures/19/09/18/09/17/1349272.jpg', 4, 4);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `actor`
--
ALTER TABLE `actor`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `director`
--
ALTER TABLE `director`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `genre`
--
ALTER TABLE `genre`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `joue`
--
ALTER TABLE `joue`
  ADD PRIMARY KEY (`id_acteur`,`id_movie`),
  ADD KEY `joue_movie0_FK` (`id_movie`);

--
-- Index pour la table `movie`
--
ALTER TABLE `movie`
  ADD PRIMARY KEY (`id`),
  ADD KEY `movie_director_FK` (`id_director`),
  ADD KEY `movie_genre0_FK` (`id_genre`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `actor`
--
ALTER TABLE `actor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT pour la table `director`
--
ALTER TABLE `director`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `genre`
--
ALTER TABLE `genre`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `movie`
--
ALTER TABLE `movie`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `joue`
--
ALTER TABLE `joue`
  ADD CONSTRAINT `joue_actor_FK` FOREIGN KEY (`id_acteur`) REFERENCES `actor` (`id`),
  ADD CONSTRAINT `joue_movie0_FK` FOREIGN KEY (`id_movie`) REFERENCES `movie` (`id`);

--
-- Contraintes pour la table `movie`
--
ALTER TABLE `movie`
  ADD CONSTRAINT `movie_director_FK` FOREIGN KEY (`id_director`) REFERENCES `director` (`id`),
  ADD CONSTRAINT `movie_genre0_FK` FOREIGN KEY (`id_genre`) REFERENCES `genre` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
