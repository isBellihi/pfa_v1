-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Client :  127.0.0.1
-- Généré le :  Dim 03 Juin 2018 à 02:01
-- Version du serveur :  10.1.21-MariaDB
-- Version de PHP :  7.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `pfa`
--

-- --------------------------------------------------------

--
-- Structure de la table `administrateur`
--

CREATE TABLE `administrateur` (
  `id` int(11) NOT NULL,
  `NOM` varchar(25) NOT NULL,
  `PRENOM` varchar(25) NOT NULL,
  `ADRESS` varchar(100) NOT NULL,
  `EMAIL` varchar(25) NOT NULL,
  `password` varchar(30) NOT NULL,
  `TELE` varchar(25) NOT NULL,
  `DATE_NAISSANCE` date NOT NULL,
  `POSTE` varchar(25) DEFAULT NULL,
  `id_etablissement` int(11) DEFAULT NULL,
  `photo` varchar(300) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `administrateur`
--

INSERT INTO `administrateur` (`id`, `NOM`, `PRENOM`, `ADRESS`, `EMAIL`, `password`, `TELE`, `DATE_NAISSANCE`, `POSTE`, `id_etablissement`, `photo`) VALUES
(1, 'ismail', 'eee', 'eeeee', 'eeee@GMAIL.COM', '4f9d68ebe2ec211c8f981fa0fa4b58', '056666666', '2018-06-09', 'eeee', 4, ',events_app,images,profils,CCF11072016_00000.jpg'),
(5, 'bouaadi', 'ismail', 'Tiznit ouled zian', 'bouadi@um5.ma', '4804c716fa2825aca4506758c89076', '0611121314', '1991-06-06', 'Agent', 1, ',events_app,..,..,images,profils,photo.png');

-- --------------------------------------------------------

--
-- Structure de la table `competition`
--

CREATE TABLE `competition` (
  `id` int(11) NOT NULL,
  `titre` varchar(250) DEFAULT NULL,
  `slogon` varchar(250) DEFAULT NULL,
  `details` varchar(300) DEFAULT NULL,
  `regles` varchar(300) DEFAULT NULL,
  `frais` float DEFAULT NULL,
  `id_type` int(4) NOT NULL,
  `phase1` varchar(50) DEFAULT NULL,
  `dateDebut` date DEFAULT NULL,
  `dateFin` date DEFAULT NULL,
  `dateLimite` date DEFAULT NULL,
  `nbrMaxEqui` int(11) DEFAULT NULL,
  `img` varchar(300) DEFAULT NULL,
  `id_admin` int(11) DEFAULT NULL,
  `id_etablissement` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Contenu de la table `competition`
--

INSERT INTO `competition` (`id`, `titre`, `slogon`, `details`, `regles`, `frais`, `id_type`, `phase1`, `dateDebut`, `dateFin`, `dateLimite`, `nbrMaxEqui`, `img`, `id_admin`, `id_etablissement`) VALUES
(6, '0ssss', 'slogon', '                                                                                                                                                                                                                                                                                                            ', '                                                                                                                                                                                                                                                                                                            ', 200, 1, 'Groupe', '2018-05-12', '2018-05-12', '2018-05-12', 16, ',events_app,images,uploads,photos,CCF11072016_00000.jpg', NULL, 1),
(22, 'competition', '', '                                                                                                                                                                                                                                                                                                            ', '                                                                                                                                                                                                                                                                                                            ', 0, 1, '', '2018-05-12', '2018-05-12', '2018-05-12', 0, ',events_app,images,uploads,photos,CCF11072016_00000.jpg', NULL, 1),
(23, 'titre', '', '                                                                                                                                                                                                                                                      ', '                                                                                                                                                                                                                                                      ', 100, 3, '', '2018-05-12', '2018-05-12', '2018-05-12', 0, ',events_app,images,uploads,photos,', NULL, 1),
(24, 'football competition', '', 'description                                                                                                                 ', '                                                                                                                                                                                                  ', 100, 1, '', '2018-05-12', '2018-05-12', '2018-05-12', 0, ',events_app,images,uploads,photos,', NULL, 1),
(33, '', '', '              ', '              ', 0, 1, '', '2018-05-12', '2018-05-12', '2018-05-12', 0, ',events_app,images,uploads,photos,', NULL, 2);

-- --------------------------------------------------------

--
-- Structure de la table `equipe`
--

CREATE TABLE `equipe` (
  `id_eq` int(11) NOT NULL,
  `nom` varchar(100) DEFAULT NULL,
  `nbrMembre` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `etablissement`
--

CREATE TABLE `etablissement` (
  `id` int(4) NOT NULL,
  `id_universite` int(4) NOT NULL,
  `nom` varchar(100) NOT NULL,
  `adresse` varchar(100) NOT NULL,
  `email` varchar(30) NOT NULL,
  `codePostal` varchar(30) NOT NULL,
  `ville` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `etablissement`
--

INSERT INTO `etablissement` (`id`, `id_universite`, `nom`, `adresse`, `email`, `codePostal`, `ville`) VALUES
(1, 1, 'ENSIAS', 'Avenue Mohamed Ben Abdellah Regragui, Rabat', 'ensias@um5.ma', '8007', 'Rabat'),
(2, 1, 'Faculty of Sciences Rabat', 'Avenue Ibn Batouta, Rabat\r\n', 'fsr@um5.ma', '8007', 'rabat'),
(4, 2, 'Faculte des sciences FSA', 'B.P 8106, Agadir 80000', 'fsa@uiz.ma', '80000', 'Agadir');

-- --------------------------------------------------------

--
-- Structure de la table `etudiant`
--

CREATE TABLE `etudiant` (
  `id` int(11) NOT NULL,
  `NOM` varchar(25) DEFAULT NULL,
  `PRENOM` varchar(25) DEFAULT NULL,
  `ADRESS` varchar(100) DEFAULT NULL,
  `EMAIL` varchar(25) DEFAULT NULL,
  `TELE` varchar(25) DEFAULT NULL,
  `DATE_NAISSANCE` date DEFAULT NULL,
  `id_etablissement` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `matchs`
--

CREATE TABLE `matchs` (
  `dure` int(11) DEFAULT NULL,
  `mi_temps` int(11) DEFAULT NULL,
  `lieu` varchar(100) DEFAULT NULL,
  `quand` time DEFAULT NULL,
  `id_comp` int(11) NOT NULL,
  `id_eq` int(11) NOT NULL,
  `id_eq_equipe` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `responsable`
--

CREATE TABLE `responsable` (
  `id_etu` int(11) NOT NULL,
  `id_comp` int(11) NOT NULL,
  `id_eq` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `type`
--

CREATE TABLE `type` (
  `id` int(4) NOT NULL,
  `nom` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `type`
--

INSERT INTO `type` (`id`, `nom`) VALUES
(2, 'basketball'),
(1, 'football'),
(3, 'handball');

-- --------------------------------------------------------

--
-- Structure de la table `universite`
--

CREATE TABLE `universite` (
  `id` int(4) NOT NULL,
  `nom` varchar(100) NOT NULL,
  `adresse` varchar(100) NOT NULL,
  `codePostal` varchar(20) NOT NULL,
  `email` varchar(30) NOT NULL,
  `villle` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `universite`
--

INSERT INTO `universite` (`id`, `nom`, `adresse`, `codePostal`, `email`, `villle`) VALUES
(1, 'Universite Mohamed V', 'Avenue des Nations Unies, Agdal,\r\nRabat Maroc', '8007', 'um5@um5.ma', 'Rabat'),
(2, 'Universite Ibno Zohr', ' Annexe de l\'université Ibn Zohr', '80000', 'uiz@uiz.ma', 'Agadir ');

--
-- Index pour les tables exportées
--

--
-- Index pour la table `administrateur`
--
ALTER TABLE `administrateur`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `EMAIL` (`EMAIL`),
  ADD KEY `FK_administrateur_id_etab` (`id_etablissement`);

--
-- Index pour la table `competition`
--
ALTER TABLE `competition`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_Competition_id_admin` (`id_admin`),
  ADD KEY `type` (`id_type`),
  ADD KEY `FK_Competition_id_etab` (`id_etablissement`);

--
-- Index pour la table `equipe`
--
ALTER TABLE `equipe`
  ADD PRIMARY KEY (`id_eq`);

--
-- Index pour la table `etablissement`
--
ALTER TABLE `etablissement`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_un_eta` (`id_universite`);

--
-- Index pour la table `etudiant`
--
ALTER TABLE `etudiant`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_etudiant_id_etab` (`id_etablissement`);

--
-- Index pour la table `matchs`
--
ALTER TABLE `matchs`
  ADD PRIMARY KEY (`id_comp`,`id_eq`,`id_eq_equipe`),
  ADD KEY `FK_matchs_id_eq` (`id_eq`),
  ADD KEY `FK_matchs_id_eq_equipe` (`id_eq_equipe`);

--
-- Index pour la table `responsable`
--
ALTER TABLE `responsable`
  ADD PRIMARY KEY (`id_etu`,`id_comp`,`id_eq`),
  ADD KEY `FK_responsable_id_comp` (`id_comp`),
  ADD KEY `FK_responsable_id_eq` (`id_eq`);

--
-- Index pour la table `type`
--
ALTER TABLE `type`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `unque_nom_type` (`nom`);

--
-- Index pour la table `universite`
--
ALTER TABLE `universite`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `administrateur`
--
ALTER TABLE `administrateur`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT pour la table `competition`
--
ALTER TABLE `competition`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;
--
-- AUTO_INCREMENT pour la table `equipe`
--
ALTER TABLE `equipe`
  MODIFY `id_eq` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `etablissement`
--
ALTER TABLE `etablissement`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT pour la table `etudiant`
--
ALTER TABLE `etudiant`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `type`
--
ALTER TABLE `type`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT pour la table `universite`
--
ALTER TABLE `universite`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `administrateur`
--
ALTER TABLE `administrateur`
  ADD CONSTRAINT `FK_administrateur_id_etab` FOREIGN KEY (`id_etablissement`) REFERENCES `etablissement` (`id`);

--
-- Contraintes pour la table `competition`
--
ALTER TABLE `competition`
  ADD CONSTRAINT `FK_Competition_id_admin` FOREIGN KEY (`id_admin`) REFERENCES `administrateur` (`id`),
  ADD CONSTRAINT `FK_Competition_id_etab` FOREIGN KEY (`id_etablissement`) REFERENCES `etablissement` (`id`),
  ADD CONSTRAINT `competition_ibfk_1` FOREIGN KEY (`id_type`) REFERENCES `type` (`id`);

--
-- Contraintes pour la table `etablissement`
--
ALTER TABLE `etablissement`
  ADD CONSTRAINT `id_un_eta` FOREIGN KEY (`id_universite`) REFERENCES `universite` (`id`);

--
-- Contraintes pour la table `etudiant`
--
ALTER TABLE `etudiant`
  ADD CONSTRAINT `FK_etudiant_id_etab` FOREIGN KEY (`id_etablissement`) REFERENCES `etablissement` (`id`);

--
-- Contraintes pour la table `matchs`
--
ALTER TABLE `matchs`
  ADD CONSTRAINT `FK_matchs_id_comp` FOREIGN KEY (`id_comp`) REFERENCES `competition` (`id`),
  ADD CONSTRAINT `FK_matchs_id_eq` FOREIGN KEY (`id_eq`) REFERENCES `equipe` (`id_eq`),
  ADD CONSTRAINT `FK_matchs_id_eq_equipe` FOREIGN KEY (`id_eq_equipe`) REFERENCES `equipe` (`id_eq`);

--
-- Contraintes pour la table `responsable`
--
ALTER TABLE `responsable`
  ADD CONSTRAINT `FK_responsable_id_comp` FOREIGN KEY (`id_comp`) REFERENCES `competition` (`id`),
  ADD CONSTRAINT `FK_responsable_id_eq` FOREIGN KEY (`id_eq`) REFERENCES `equipe` (`id_eq`),
  ADD CONSTRAINT `FK_responsable_id_etu` FOREIGN KEY (`id_etu`) REFERENCES `etudiant` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
