/*=====================================================================================================
les mot de passe decrypté sont pour le premiere admin 'bouaddi1997@gmail.com' mot de passe 0611298559
les mot de passe decrypté sont pour le 2eme admin mourinho@gmail.com mot de passe mourinho@gmail.com
=======================================================================================================*/
-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Client :  127.0.0.1
-- Généré le :  Ven 08 Juin 2018 à 23:21
-- Version du serveur :  5.7.14
-- Version de PHP :  5.6.25

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
  `password` varchar(50) DEFAULT NULL,
  `TELE` varchar(25) NOT NULL,
  `DATE_NAISSANCE` date NOT NULL,
  `POSTE` varchar(25) DEFAULT NULL,
  `photo` varchar(300) NOT NULL,
  `id_etablissement` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `administrateur`
--

INSERT INTO `administrateur` (`id`, `NOM`, `PRENOM`, `ADRESS`, `EMAIL`, `password`, `TELE`, `DATE_NAISSANCE`, `POSTE`, `photo`, `id_etablissement`) VALUES
(2, 'bouaddi', 'ismail', 'AIT OUMANAR EL MAADER EL KABIRE TIZNIT', 'bouaddi1997@gmail.com', 'CEcxWrNfaEL3U76BKmWthQgnh7ZLXLFEv67NfefgNtU=', '0611298559', '1997-01-27', 'organisateur', ',events_app,images,profils,20140821_193756.jpg', 1),
(3, 'Jozi', 'Mourinho', 'Portugal avenue de france', 'mourinho@gmail.com', '/S5ZFCX0i9zm2p8P9pRzRafvXY+YmH6w/oBwSbC4LJU=', '36254512', '1985-06-14', 'Coach', ',events_app,images,profils,Jos_Mourinho_.jpg', 4);
/*
les mot de passe decrypté sont pour le premiere admin 'bouaddi1997@gmail.com' mot de passe 0611298559
les mot de passe decrypté sont pour le 2eme admin mourinho@gmail.com mot de passe mourinho@gmail.com
*/
-- --------------------------------------------------------

--
-- Structure de la table `competition`
--

CREATE TABLE `competition` (
  `id` int(11) NOT NULL,
  `titre` varchar(250) DEFAULT NULL,
  `slogon` varchar(250) DEFAULT NULL,
  `details` varchar(3000) DEFAULT NULL,
  `regles` varchar(3000) DEFAULT NULL,
  `frais` float DEFAULT NULL,
  `phase1` varchar(50) DEFAULT NULL,
  `dateDebut` date DEFAULT NULL,
  `dateFin` date DEFAULT NULL,
  `dateLimite` date DEFAULT NULL,
  `nbrMaxEqui` int(11) DEFAULT NULL,
  `img` varchar(300) DEFAULT NULL,
  `id_administrateur` int(11) DEFAULT NULL,
  `id_etablissement` int(11) DEFAULT NULL,
  `id_type` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `competition`
--

INSERT INTO `competition` (`id`, `titre`, `slogon`, `details`, `regles`, `frais`, `phase1`, `dateDebut`, `dateFin`, `dateLimite`, `nbrMaxEqui`, `img`, `id_administrateur`, `id_etablissement`, `id_type`) VALUES
(2, 'Team-Tennis', 'garder votre calme et joue le tennis', 'L idÃ©e de cette nouvelle compÃ©tition a Ã©tÃ© lancÃ©e par les Ã©lÃ¨ves de l universitÃ© de Mohamed 5 de rabat  qui ont  reÃ§u le soutien de la FÃ©dÃ©ration Marocaine de tennis.\r\n L Ã©preuve sera organisÃ©e par TennisGo, l agence de management fondÃ©e par la FÃ©dÃ©ration Royale Marocaine du Sport Pour Tous FRMSPT  en 2013 pour rendre\r\n l hommage aux efforts des anciens joueurs. Le tournoi devrait se tenir tout la mois de aoÃ»t (sauf les jours fÃ©riÃ©s) . La premiÃ¨re Ã©dition devrait se tenir en Ensias avant de voyager Ã  travers tout les autres Ã©coles ou universitÃ©s .\r\n           ', ' - Le court :\r\n\r\nLe court de tennis est un rectangle de 23,77m de long sur 8,23m (simple) ou 10,97m (double). SÃ©parÃ© en son milieu par un filet, dâ€™une hauteur de 0,914m (hauteur rÃ©glementaire).\r\n Le jeu :\r\n\r\nLe dÃ©compte des points, au tennis, un jeu se compose de 4 points.\r\n\r\nOn compte les points du serveur en premier.\r\n\r\nPas de point : Â« zÃ©ro Â»\r\n\r\nPremier point : Â« 15 Â»\r\n\r\nDeuxiÃ¨me point : Â« 30 Â»\r\n\r\nTroisiÃ¨me point : Â« 40 Â»\r\n\r\nQuatriÃ¨me point : Â« jeu Â»             ', 100, 'Championnat', '2018-08-01', '2018-08-31', '2018-07-27', 10, ',events_app,images,uploads,photos,roger-federer-shanghai.jpg', 2, 1, 2),
(3, 'tournoi dâ€™excellence', ' plus vite, plus haut, plus fort', '                jeu collectif de football jouÃ© tout aussi bien\r\npar les garcons et les fille \r\nil se  dÃ©roule une fois l an a l occasion de la\r\ncelebration de la tete de printemps\r\nil se joue sur un terrain vague dans les limite \r\nne sont pas prÃ©cisÃ©es;\r\ncomme matÃ©riel des balles et des tenus sont nÃ©cessaire \r\npour le tournoi               ', '                Loi 1 Le terrain\r\n\r\nUn piquet de coin doit Ãªtre plantÃ© Ã  chacun des quatre angles du terrain. La hampe ne devra pas Ãªtre pointue et les piquets de coin, dâ€™une hauteur minimum de 1,5 mÃ¨tre, seront fabriquÃ©s dans un matÃ©riau ne prÃ©sentant aucun danger en cas de rupture\r\nLoi 2 Le ballon\r\n\r\nSi le ballon Ã©clate ou est arrÃªtÃ© dans sa course par un Ã©lÃ©ment extÃ©rieur, le jeu sera repris par une balle Ã  terre Ã  lâ€™endroit oÃ¹ le ballon est devenu dÃ©fectueux ou a Ã©tÃ© arrÃªtÃ©. Sauf si le ballon Ã©clate ou est endommagÃ© durant lâ€™exÃ©cution dâ€™un coup de pied de rÃ©paration ou dâ€™un tir au but une fois frappÃ© vers lâ€™avant et avant de toucher un autre joueur ou la barre ou les poteaux.\r\nLoi 3 Lâ€™arbitre \r\nChaque match se dispute sous le contrÃ´le dâ€™un arbitre assistÃ© de deux arbitres assistants et dâ€™un Ã©ventuel quatriÃ¨me officielâ€¦\r\nLes arbitres et arbitres assistants disposent de toute lâ€™autoritÃ© nÃ©cessaire pour veiller Ã  lâ€™application des lois du jeu              ', 100, 'Championnat', '2018-08-01', '2018-08-12', '2018-08-01', 16, ',events_app,images,uploads,photos,tournoi.png', 2, 1, 1),
(4, ' Basketball Champions League', 'En Basketball, dÃ¨s qu on s arrÃªte, on rÃ©gresse.', 'Ã‰cole nationale supÃ©rieure de l administration d agadir a annoncÃ©  un premier tournoi univerisitaire de basketball pour les juniors destinÃ© aux meilleures Ã©quipes masculines et fÃ©minines de 21 ans a 23 ans.\r\n\r\ncette competition mettra en vedette des divisions de garÃ§ons et de filles, chacune composÃ©e de 16 champions universitaire (huit Ã©quipes ensa d agadir et huit Ã©quipes ensa  marakesh) qui recevront des voyages tous frais payÃ©s pour participer Ã  l Ã©vÃ©nement inaugural du 7 au 12 aoÃ»t 2018 Ã  Agadir Wide World of Sports Complex prÃ¨s d souk al ahaad. \r\n\r\n', 'Le temps de jeu\r\n\r\nLa partie se compose de 4 pÃ©riodes de 10 minutes sÃ©parÃ©es par un intervalle de 2 minutes sauf entre la 2Ã¨me et 3Ã¨me pÃ©riode oÃ¹ lâ€™intervalle est de 15 minutes (mi-temps).\r\nEn cas dâ€™Ã©galitÃ©, une seule prolongation est jouÃ©e, puis dâ€™autres si nÃ©cessaire jusquâ€™Ã  ce quâ€™une Ã©quipe gagne la rencontre. Les prolongations sont de 5 minutes avec un intervalle de 2 minutes entre la 4e pÃ©riode et la 1Ã¨re prolongation et de 2 minutes avant chaque prolongation.\r\nComment dÃ©bute-t-on une rencontre ?\r\n\r\nChaque Ã©quipe doit prÃ©senter sur le terrain cinq joueurs en tenue, prÃªts Ã  jouer, pour que le jeu puisse commencer.\r\nChaque rencontre dÃ©bute par un entre-deux et ce sera lâ€™unique entre-deux de la partie. Chaque nouvelle situation dâ€™entre-deux fait appel Ã  la rÃ¨gle de lâ€™alternance :\r\nLâ€™Ã©quipe qui a gagnÃ© le ballon sur le 1er entre-deux devra laisser lâ€™Ã©quipe adverse prendre possession du ballon en lieu et place de la situation dâ€™entredeux suivante. Il en sera de mÃªme pour le dÃ©but de chaque pÃ©riode ou prolongation.\r\nUne flÃ¨che sur la table de marque indique quelle Ã©quipe bÃ©nÃ©ficiera de la prochaine remise en jeu alternÃ©e.\r\n2-Le panier rÃ©ussi et sa valeur\r\n\r\nUn tir rÃ©ussi en cours de jeu compte 2 points Ã  lâ€™intÃ©rieur de la zone des 6,25 mÃ¨tres et 3 points Ã  lâ€™extÃ©rieur de cette zone. La ligne fait partie de la zone des 2 points.\r\nUn tir de lancer-franc compte 1 point.\r\n3-Comment jouer le ballon ?\r\n\r\nPeut-on utiliser autre chose que les mains pour manipuler le ballon ?\r\n\r\nLe ballon est jouÃ© avec les mains. Jouer dÃ©libÃ©rÃ©ment le ballon avec le pied ou le poing est une violation, câ€™est-Ã -dire une infraction Ã  une rÃ¨gle sanctionnÃ©e par une remise en jeu accordÃ©e Ã  lâ€™Ã©quipe adverse derriÃ¨re la ligne de touche la plus proche.\r\n\r\nToucher accidentellement avec le pied nâ€™est pas une violation. Jouer le ballon au sol mÃªme en glissant nâ€™est pas une infraction. Rouler au sol ou se relever avec le ballon est une violation.\r\n\r\n4-La remise en jeu ?\r\n\r\nAprÃ¨s une infraction ne donnant pas lieu Ã  lancers-francs, une remise en jeu est effectuÃ©e par nâ€™importe quel joueur de lâ€™Ã©quipe derriÃ¨re la ligne de touche la plus proche du lieu oÃ¹ lâ€™infraction a Ã©tÃ© commise.\r\n\r\nCe joueur dispose de 5 secondes pour passer le ballon. Il ne peut pas se dÃ©placer de plus dâ€™un mÃ¨tre du lieu fixÃ© par lâ€™arbitre mais peut se reculer autant quâ€™il le souhaite pour Ãªtre Ã  lâ€™aise. Les adversaires ne doivent pas dÃ©passer la ligne avec leur bras pour gÃªner le joueur effectuant la remise en jeu.', 60, 'Championnat', '2018-08-08', '2018-08-12', '2018-08-05', 16, ',events_app,images,uploads,photos,ccc_summerbasketballcomp.jpg', 2, 2, 3),
(5, 'Volleyball Festival', 'Voleyball ethics and competition', 'CHAMPIONNATS INTERNATIONAUX DU FESTIVAL DE VOLLEYBALL 2018\r\nLes 35Ã¨mes championnats annuels auront lieu du 28 juin au 1er juillet a EMI. Les Ã©quipes jouent tous les 4 jours. La fÃªte de bienvenue est le 27 juin (de 18h Ã  20h). Plus de 50 Ã©quipes Ã¢gÃ©es de 21 Ã  24 ans provenant des autres universite et du monde entier sont en compÃ©tition. L inscription dÃ©bute le 1er juin  1000dh  par Ã©quipe si payÃ© avant le 25 juin 2018 (1150dh aprÃ¨s).', '      But du jeu\r\nFaire tomber la balle dans le camp adverse.\r\n\r\nAmener lâ€™adversaire Ã  ne pas pouvoir la renvoyer chez soi.\r\n\r\nLâ€™Ã©quipe qui remporte lâ€™Ã©change marque un point quâ€™elle ait ou non le service. Un point est donc marquÃ© Ã  chaque ballon jouÃ©.\r\n\r\n\r\nGagner le set\r\nUn set est gagnÃ© par lâ€™Ã©quipe qui marque 25 points, avec un Ã©cart de 2 pts.\r\n\r\nEn cas dâ€™Ã©galitÃ© Ã  24, le jeu continue jusquâ€™au 2 points dâ€™Ã©cart (on peut gagner 38-36).\r\n\r\n\r\nGagner le match\r\nLe match est gagnÃ© par lâ€™Ã©quipe qui remporte 3 sets. En cas dâ€™Ã©galitÃ© 2 sets partout, le 5Ã¨me set  ( tie-break) est jouÃ© en 15 points avec 2 points dâ€™Ã©cart.\r\n\r\n \r\n\r\n\r\nLes frappes de balle :\r\nOn peut frapper la balle avec toutes les parties du corps (y compris le pied, sauf au service).\r\n\r\n3 touches successives maximum par Ã©quipe.  \r\n\r\nException : Le contre nâ€™est pas comptÃ© comme une touche.\r\n\r\nLa balle doit Ãªtre frappÃ©e : Frappe = 1 contact bref.\r\n\r\nFautes : le collÃ© (La balle est poussÃ©e et non frappÃ©e)\r\n\r\nException : Sur la 1Â° touche de lâ€™Ã©quipe.\r\n\r\nle doublÃ© (La balle est touchÃ©e 2 fois par le mÃªme joueur)\r\n\r\nException :  En  dÃ©fense,  si  2  touches  dans  la mÃªme action.\r\n\r\n \r\n\r\n\r\nLe service\r\nLe  serveur  attend  le  coup  de  sifflet  de  lâ€™arbitre  pour  frapper la balle Ã  une main.  Il doit servir Ã  son premier lancer de balle et ne peut  pas laisser  tomber le ballon.   Il peut servir sur toute la largeur du terrain.\r\n\r\nIl doit Ãªtre derriÃ¨re la ligne, sans marcher dessus avant la frappe.\r\n\r\nLe serveur a 8 sec. pour servir aprÃ¨s le coup de sifflet \r\n\r\nLe service peut toucher le filet.', 120, 'Championnat', '2018-06-27', '2018-07-15', '2018-06-25', 50, ',events_app,images,uploads,photos,White Tanks 16s-S.jpg', 3, 2, 4);

-- --------------------------------------------------------

--
-- Structure de la table `equipe`
--

CREATE TABLE `equipe` (
  `id` int(11) NOT NULL,
  `nom` varchar(100) DEFAULT NULL,
  `nbrMembre` int(11) DEFAULT NULL,
  `photo` varchar(300) NOT NULL,
  `id_etudiant` int(11) DEFAULT NULL,
  `id_Competition` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `etablissement`
--

CREATE TABLE `etablissement` (
  `id` int(11) NOT NULL,
  `nom` varchar(30) DEFAULT NULL,
  `adress` varchar(100) DEFAULT NULL,
  `ville` varchar(25) DEFAULT NULL,
  `codePostal` int(11) DEFAULT NULL,
  `email` varchar(25) DEFAULT NULL,
  `id_universite` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `etablissement`
--

INSERT INTO `etablissement` (`id`, `nom`, `adress`, `ville`, `codePostal`, `email`, `id_universite`) VALUES
(1, 'ENSIAS', 'al irfane ', 'RABAT', 265000, 'ensias@um5.ma', 1),
(2, 'EMI', ' Avenue Ibn Sina, Rabat', 'RABAT', 195960, 'Emi1959@um5.ma', 1),
(3, 'ENSA', 'BP 1136 ', 'Agadir', 80000, 'ensa8agadir@ac.ma', 3),
(4, 'ENCG', 'B.P 37/S Hay Salam', 'Agadir', 80000, 'encg@iz.ma', 3);

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
  `photo` varchar(300) DEFAULT NULL,
  `id_etablissement` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `membre`
--

CREATE TABLE `membre` (
  `id` int(11) NOT NULL,
  `id_equipe` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `type`
--

CREATE TABLE `type` (
  `id` int(11) NOT NULL,
  `nom` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `type`
--

INSERT INTO `type` (`id`, `nom`) VALUES
(1, 'footbal'),
(2, 'tennis'),
(3, 'basketball '),
(4, 'volleyball'),
(5, 'handball ');

-- --------------------------------------------------------

--
-- Structure de la table `universite`
--

CREATE TABLE `universite` (
  `id` int(11) NOT NULL,
  `nom` varchar(100) DEFAULT NULL,
  `adress` varchar(400) DEFAULT NULL,
  `codePostal` int(11) DEFAULT NULL,
  `email` varchar(25) DEFAULT NULL,
  `ville` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `universite`
--

INSERT INTO `universite` (`id`, `nom`, `adress`, `codePostal`, `email`, `ville`) VALUES
(1, 'UM5', 'AGDAL', 15028, 'UM@1962.MA', 'RABAT'),
(2, 'CADI AYYAD', 'Av Abdelkrim Khattabi', 549801, 'cadi@ayyad.ma', ' Marrakech '),
(3, 'Ibn Zohr', 'BP 32/S Agadir ', 80000, 'uiz@agadir.ma', 'Agadir');

--
-- Index pour les tables exportées
--

--
-- Index pour la table `administrateur`
--
ALTER TABLE `administrateur`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_administrateur_id_etablissement` (`id_etablissement`);

--
-- Index pour la table `competition`
--
ALTER TABLE `competition`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_Competition_id_administrateur` (`id_administrateur`),
  ADD KEY `FK_Competition_id_etablissement` (`id_etablissement`),
  ADD KEY `FK_Competition_id_type` (`id_type`);

--
-- Index pour la table `equipe`
--
ALTER TABLE `equipe`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_equipe_id_etudiant` (`id_etudiant`),
  ADD KEY `FK_equipe_id_Competition` (`id_Competition`);

--
-- Index pour la table `etablissement`
--
ALTER TABLE `etablissement`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_etablissement_id_Universite` (`id_universite`);

--
-- Index pour la table `etudiant`
--
ALTER TABLE `etudiant`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_etudiant_id_etablissement` (`id_etablissement`);

--
-- Index pour la table `membre`
--
ALTER TABLE `membre`
  ADD PRIMARY KEY (`id`,`id_equipe`),
  ADD KEY `FK_membre_id_equipe` (`id_equipe`);

--
-- Index pour la table `type`
--
ALTER TABLE `type`
  ADD PRIMARY KEY (`id`);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT pour la table `competition`
--
ALTER TABLE `competition`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT pour la table `equipe`
--
ALTER TABLE `equipe`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `etablissement`
--
ALTER TABLE `etablissement`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT pour la table `etudiant`
--
ALTER TABLE `etudiant`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `type`
--
ALTER TABLE `type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT pour la table `universite`
--
ALTER TABLE `universite`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `administrateur`
--
ALTER TABLE `administrateur`
  ADD CONSTRAINT `FK_administrateur_id_etablissement` FOREIGN KEY (`id_etablissement`) REFERENCES `etablissement` (`id`);

--
-- Contraintes pour la table `competition`
--
ALTER TABLE `competition`
  ADD CONSTRAINT `FK_Competition_id_administrateur` FOREIGN KEY (`id_administrateur`) REFERENCES `administrateur` (`id`),
  ADD CONSTRAINT `FK_Competition_id_etablissement` FOREIGN KEY (`id_etablissement`) REFERENCES `etablissement` (`id`),
  ADD CONSTRAINT `FK_Competition_id_type` FOREIGN KEY (`id_type`) REFERENCES `type` (`id`);

--
-- Contraintes pour la table `equipe`
--
ALTER TABLE `equipe`
  ADD CONSTRAINT `FK_equipe_id_Competition` FOREIGN KEY (`id_Competition`) REFERENCES `competition` (`id`),
  ADD CONSTRAINT `FK_equipe_id_etudiant` FOREIGN KEY (`id_etudiant`) REFERENCES `etudiant` (`id`);

--
-- Contraintes pour la table `etablissement`
--
ALTER TABLE `etablissement`
  ADD CONSTRAINT `FK_etablissement_id_Universite` FOREIGN KEY (`id_universite`) REFERENCES `universite` (`id`);

--
-- Contraintes pour la table `etudiant`
--
ALTER TABLE `etudiant`
  ADD CONSTRAINT `FK_etudiant_id_etablissement` FOREIGN KEY (`id_etablissement`) REFERENCES `etablissement` (`id`);

--
-- Contraintes pour la table `membre`
--
ALTER TABLE `membre`
  ADD CONSTRAINT `FK_membre_id` FOREIGN KEY (`id`) REFERENCES `etudiant` (`id`),
  ADD CONSTRAINT `FK_membre_id_equipe` FOREIGN KEY (`id_equipe`) REFERENCES `equipe` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
