-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le :  lun. 17 mai 2021 à 13:46
-- Version du serveur :  10.1.38-MariaDB
-- Version de PHP :  7.3.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `seminaire_db`
--

-- --------------------------------------------------------

--
-- Structure de la table `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(11) NOT NULL,
  `login` varchar(50) DEFAULT NULL,
  `mdp` varchar(35) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `admin`
--

INSERT INTO `admin` (`id_admin`, `login`, `mdp`) VALUES
(1, 'admin', 'admin'),
(2, 'root', 'root#600'),
(3, '', 'admin2'),
(4, '', 'admin2'),
(5, '', 'admin2'),
(6, 'test', 'test'),
(7, 'test2', 'text'),
(8, 'test', 'tzst'),
(9, 'test', 'test'),
(10, 'ali', 'ali'),
(11, '', 'zef'),
(12, 'ada', 'zefze'),
(13, 'sdvs', 'fvv'),
(14, 'zad', 'eff'),
(15, 'zefe', 'ezfze'),
(16, 'fef', 'efze'),
(17, 'zfzf', 'efze'),
(18, 'efze', 'ezfz');

-- --------------------------------------------------------

--
-- Doublure de structure pour la vue `nombrefeminin`
-- (Voir ci-dessous la vue réelle)
--
CREATE TABLE `nombrefeminin` (
`f` bigint(21)
);

-- --------------------------------------------------------

--
-- Doublure de structure pour la vue `nombremasculin`
-- (Voir ci-dessous la vue réelle)
--
CREATE TABLE `nombremasculin` (
`M` bigint(21)
);

-- --------------------------------------------------------

--
-- Structure de la table `participant`
--

CREATE TABLE `participant` (
  `idp` int(11) NOT NULL,
  `nom` varchar(35) DEFAULT NULL,
  `prenom` varchar(35) DEFAULT NULL,
  `sexe` varchar(20) DEFAULT NULL,
  `email` varchar(60) DEFAULT NULL,
  `id_societe` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `participant`
--

INSERT INTO `participant` (`idp`, `nom`, `prenom`, `sexe`, `email`, `id_societe`) VALUES
(1, 'OUMAROU SEINI', 'Abdoulnasser', 'M', 'abdoulnasser600@hotmail.fr', 1),
(2, 'Abdourhamane', 'Allassan', 'M', 'Abdourhamane74@gmail.com', 3),
(6, 'Hama', 'Bachir', 'M', 'hama52@gmail.com', 4),
(10, 'Abdourhamane', 'Allassan', 'M', 'Abdourhamane@gmail.com', 5),
(13, 'Hajhara', 'Harouna Salissou', 'F', 'hajara74@hotmail.fr', 6),
(22, 'Saley', 'Mounira', 'F', 'mounira745@hotmail.fr', 3),
(23, 'OUMAROU SEINI ', 'Djamila', 'F', 'Djami852@hotmail.fr', 4),
(24, 'Hamadou', 'Hassana', 'F', 'hassana56@hotmail.fr', 6),
(30, 'Abdoulaziz', 'Almoustapha', 'M', 'mousto78@gmail.com', 4);

-- --------------------------------------------------------

--
-- Structure de la table `societe`
--

CREATE TABLE `societe` (
  `id_societe` int(11) NOT NULL,
  `nom_societe` varchar(35) DEFAULT NULL,
  `email_societe` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `societe`
--

INSERT INTO `societe` (`id_societe`, `nom_societe`, `email_societe`) VALUES
(1, 'STM', 'STM@yahoo.com'),
(2, 'Sonef', 'sonef@yahoo.com'),
(3, 'ENA', 'ena-naimey@yahoo.com'),
(4, 'Solidarite', 'solidarite_niger@yahoo.fr'),
(5, 'Rimbo', 'rimbo@gmail.com'),
(6, 'Afrcica woo', 'africa_woo@hotmail.fr');

-- --------------------------------------------------------

--
-- Structure de la vue `nombrefeminin`
--
DROP TABLE IF EXISTS `nombrefeminin`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `nombrefeminin`  AS  select count(`participant`.`idp`) AS `f` from `participant` where (`participant`.`sexe` = 'f') ;

-- --------------------------------------------------------

--
-- Structure de la vue `nombremasculin`
--
DROP TABLE IF EXISTS `nombremasculin`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `nombremasculin`  AS  select count(`participant`.`idp`) AS `M` from `participant` where (`participant`.`sexe` = 'M') ;

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Index pour la table `participant`
--
ALTER TABLE `participant`
  ADD PRIMARY KEY (`idp`),
  ADD KEY `fk_id_societe` (`id_societe`);

--
-- Index pour la table `societe`
--
ALTER TABLE `societe`
  ADD UNIQUE KEY `id_societe` (`id_societe`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT pour la table `participant`
--
ALTER TABLE `participant`
  MODIFY `idp` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT pour la table `societe`
--
ALTER TABLE `societe`
  MODIFY `id_societe` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `participant`
--
ALTER TABLE `participant`
  ADD CONSTRAINT `fk_idsociete` FOREIGN KEY (`id_societe`) REFERENCES `societe` (`id_societe`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
