-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3307
-- Généré le : lun. 22 avr. 2024 à 00:15
-- Version du serveur : 10.4.32-MariaDB
-- Version de PHP : 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `gestionnoteeleve`
--

-- --------------------------------------------------------

--
-- Structure de la table `administrateur`
--

CREATE TABLE `administrateur` (
  `nom_ad` varchar(20) NOT NULL,
  `mp_ad` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `administrateur`
--

INSERT INTO `administrateur` (`nom_ad`, `mp_ad`) VALUES
('admin', 'admin1234');

-- --------------------------------------------------------

--
-- Structure de la table `affectation_directeur`
--

CREATE TABLE `affectation_directeur` (
  `ID_directeur` varchar(10) NOT NULL,
  `ID_ecole` varchar(10) NOT NULL,
  `Année-secondaire` year(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `affectation_directeur`
--

INSERT INTO `affectation_directeur` (`ID_directeur`, `ID_ecole`, `Année-secondaire`) VALUES
('300', 'm1', '2019'),
('301', 'mn1', '2016'),
('305', 'sf1', '2022'),
('309', 'so1', '2023'),
('300', 'm1', '2024'),
('305', 'm4', '2024');

-- --------------------------------------------------------

--
-- Structure de la table `affectation_eleve`
--

CREATE TABLE `affectation_eleve` (
  `Annee_scolaire` year(4) NOT NULL,
  `ID_eleve` varchar(10) NOT NULL,
  `code_classe` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `affectation_eleve`
--

INSERT INTO `affectation_eleve` (`Annee_scolaire`, `ID_eleve`, `code_classe`) VALUES
('2024', '197', 22),
('2024', '200', 12),
('2024', '201', 22),
('2024', '201', 61),
('2024', '202', 51),
('2024', '204', 53),
('2024', '210', 43),
('2024', '215', 63),
('2024', '222', 12),
('2024', '231', 41),
('2024', '235', 64),
('2024', '236', 44),
('2024', '254', 61),
('2024', '258', 11),
('2024', '258', 62),
('2024', '262', 63),
('2024', '265', 52),
('2024', '271', 61),
('2024', '273', 63),
('2024', '278', 51),
('2024', '280', 11),
('2024', '280', 51),
('2024', '297', 41),
('2024', '588', 41),
('2024', '696', 41),
('2024', '771', 41);

-- --------------------------------------------------------

--
-- Structure de la table `classe`
--

CREATE TABLE `classe` (
  `Code_classe` int(10) NOT NULL,
  `libelle_classe` varchar(20) NOT NULL,
  `code_niveau` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `classe`
--

INSERT INTO `classe` (`Code_classe`, `libelle_classe`, `code_niveau`) VALUES
(5, '5 ابتدائي ه', 5),
(11, 'سنة ثانية أ', 2),
(12, 'سنة أولى ب', 1),
(13, 'سنة أولى ج', 1),
(14, 'سنة أولى د', 1),
(16, 'سنة أولى  ر', 1),
(21, 'سنة ثانية أ', 2),
(22, 'سنة ثانية ب ', 2),
(23, 'سنة ثانية ج', 2),
(24, 'سنة ثانية د', 2),
(31, 'سنة ثالثة أ', 3),
(32, 'سنة ثالثة ب', 3),
(33, 'سنة ثالثة ج', 3),
(34, 'سنة ثالثة د', 3),
(41, 'سنة رابعة أ', 4),
(42, 'سنة رابعة ب', 4),
(43, 'سنة رابعة ج', 4),
(44, 'سنة رابعة د', 4),
(51, 'سنة خامسة أ', 5),
(52, 'سنة خامسة ب', 5),
(53, 'سنة خامسة ج', 5),
(54, 'سنة خامسة د', 5),
(61, 'سنة سادسة أ', 6),
(62, 'سنة سادسة ب', 6),
(63, 'سنة سادسة ج', 6),
(64, 'سنة سادسة د', 6);

-- --------------------------------------------------------

--
-- Structure de la table `directeur`
--

CREATE TABLE `directeur` (
  `ID_directeur` varchar(10) NOT NULL,
  `Nom&Prenom_directeur` varchar(100) NOT NULL,
  `Adresse_directeur` varchar(100) NOT NULL,
  `Date_Naissance` varchar(10) NOT NULL,
  `mpd` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `directeur`
--

INSERT INTO `directeur` (`ID_directeur`, `Nom&Prenom_directeur`, `Adresse_directeur`, `Date_Naissance`, `mpd`) VALUES
('300', 'Akrim Rafi', 'Bizert', '12/05/1989', 6666),
('301', 'Ines Rebai', 'Sfax', '17/06/1988', 5555),
('305', 'Anis Jlasi', 'Mahdia', '04/02/1987', 4444),
('309', 'Asma Sakka', 'Mahdia', '19/07/1985', 3333);

-- --------------------------------------------------------

--
-- Structure de la table `ecole`
--

CREATE TABLE `ecole` (
  `ID_ecole` varchar(10) NOT NULL,
  `nom_ecole` varchar(100) NOT NULL,
  `Adresse_ecole` varchar(30) NOT NULL,
  `Ville_ecole` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `ecole`
--

INSERT INTO `ecole` (`ID_ecole`, `nom_ecole`, `Adresse_ecole`, `Ville_ecole`) VALUES
('m1', 'Ecole mahdia', 'Mahdia', 'Mahdia'),
('m4', 'Ecole Tunis', 'Tunis', 'Tunis'),
('mn1', 'Ecole Monastir', 'Monastir', 'Monastir'),
('sf1', 'Ecole Sfax', 'Sfax', 'Sfax'),
('so1', 'Ecole Sousse', 'Sousse', 'Sousse');

-- --------------------------------------------------------

--
-- Structure de la table `eleve`
--

CREATE TABLE `eleve` (
  `ID_eleve` varchar(10) NOT NULL,
  `Nom&Prenom_eleve` varchar(100) NOT NULL,
  `Date_Naissance` date NOT NULL,
  `Ville_eleve` varchar(20) NOT NULL,
  `ID_parent` varchar(10) NOT NULL,
  `nbrab` int(10) NOT NULL,
  `nbrpr` int(10) NOT NULL,
  `mpe` varchar(20) NOT NULL,
  `sexe` varchar(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `eleve`
--

INSERT INTO `eleve` (`ID_eleve`, `Nom&Prenom_eleve`, `Date_Naissance`, `Ville_eleve`, `ID_parent`, `nbrab`, `nbrpr`, `mpe`, `sexe`) VALUES
('197', 'narjes', '0000-00-00', 'Mahdia', '199', 12, 2, '197', 'F'),
('200', 'Nada Sabri', '2017-05-18', 'Sfax', '178', 2, 150, '200', 'f'),
('201', 'Rania Sahlia', '2012-04-17', 'Sousse', '111', 100, 2, '111', 'F'),
('202', 'Arawa Sahli', '2013-07-27', 'Mahdia', '111', 0, 0, '222', 'F'),
('204', 'Ayoub Farhi', '2014-07-17', 'Sousse', '130', 0, 0, '333', 'H'),
('210', 'Sarra Farhi', '2013-07-20', 'Sousse', '130', 0, 0, '444', 'F'),
('215', 'Rahil Sanzi', '2011-05-19', 'Sousse', '144', 0, 0, '555', 'F'),
('222', 'Safa Farhi', '2017-05-18', 'Sfax', '130', 0, 0, '222', 'f'),
('231', 'Assil Karimi', '2014-04-08', 'Mahdia', '124', 0, 0, '666', 'F'),
('235', 'Salim Saidi', '2013-04-17', 'Sfax', '169', 0, 0, '777', 'H'),
('236', 'Ilyes Saidi', '2014-05-15', 'Sfax', '169', 0, 0, '888', 'H'),
('254', 'Anis Karimi', '2013-04-10', 'Mahdia', '124', 0, 0, '999', 'H'),
('258', 'Hamadi Gaoud', '2015-03-18', 'Tlelsa', '100', 0, 0, '123', 'h'),
('262', 'Hamza Abidi', '2013-06-01', 'Sousse', '188', 0, 0, '180', 'H'),
('265', 'Ranim Rbai', '2014-05-08', 'Monastir', '145', 0, 0, '170', 'F'),
('271', 'Arwa Ghoul', '2013-04-17', 'Mahdia', '199', 0, 0, '190', 'F'),
('273', 'Folla Sanzi', '2012-01-10', 'Sousse', '144', 0, 0, '150', 'F'),
('278', 'Aymen Sahli', '2014-04-17', 'Mahdia', '111', 0, 0, '160', 'H'),
('280', 'Ikram Ghoul', '2014-04-16', 'Mahdia', '199', 0, 0, '166', ''),
('297', 'Rania Riahi', '2015-02-17', 'Mahdia', '151', 0, 0, '175', 'F'),
('588', 'Hakim Sabri ', '2015-04-09', 'Mahdia', '100', 0, 0, '366', 'H'),
('696', 'Ranim Sahli', '2015-01-07', 'Mahdia', '111', 0, 0, '2015', 'F'),
('771', 'Jihen Riahi', '2015-06-05', 'Mahdia', '151', 25, 1, '1212', 'F');

-- --------------------------------------------------------

--
-- Structure de la table `matiere`
--

CREATE TABLE `matiere` (
  `code_matiere` varchar(10) NOT NULL,
  `libelle_matiere` varchar(50) NOT NULL,
  `coefficient_matiere` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `matiere`
--

INSERT INTO `matiere` (`code_matiere`, `libelle_matiere`, `coefficient_matiere`) VALUES
('anglais', 'اللغة الانجليزية', 1),
('exprfr', ' Exp.or. et réc', 1),
('geo', 'الجغرافيا', 1),
('histoire', 'التاريخ', 1),
('islamic', 'التربية الاسلامية', 1),
('languear', 'قواعد اللغة', 1),
('lecturear', 'القراءة', 1),
('lecturefr', 'Lecture', 1),
('madania', 'التربية المدنية ', 1),
('math', 'الرياضيات', 1),
('music', 'التربية الموسيقية', 1),
('oralear', 'التواصل الشفوي و المحفوظات ', 1),
('pinture', 'التربية التشكيلية ', 1),
('prod', 'Prod. écrite langue et dict.', 1),
('production', 'الانتاج الكتابي ', 1),
('science', 'الايقاظ العلمي ', 1),
('sport', 'التربية البدنية ', 1),
('technique', 'التربية التكنولوجية', 1);

-- --------------------------------------------------------

--
-- Structure de la table `matiere_niveau`
--

CREATE TABLE `matiere_niveau` (
  `code_matiere` varchar(10) NOT NULL,
  `Code_Niveau` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `matiere_niveau`
--

INSERT INTO `matiere_niveau` (`code_matiere`, `Code_Niveau`) VALUES
('prod', 6),
('anglais', 6),
('histoire', 6),
('anglais', 6),
('anglais', 6),
('technique', 6),
('exprfr', 2),
('exprfr', 3),
('exprfr', 4),
('exprfr', 5),
('islamic', 1),
('islamic', 2),
('islamic', 6),
('islamic', 3),
('islamic', 4),
('islamic', 5),
('languear', 1),
('languear', 2),
('languear', 3),
('languear', 4),
('languear', 5),
('languear', 6),
('madania', 1),
('madania', 2),
('madania', 3),
('madania', 4),
('madania', 5),
('madania', 6);

-- --------------------------------------------------------

--
-- Structure de la table `niveau`
--

CREATE TABLE `niveau` (
  `Code_Niveau` int(1) NOT NULL,
  `libelle_niveau` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `niveau`
--

INSERT INTO `niveau` (`Code_Niveau`, `libelle_niveau`) VALUES
(1, '1ére année d\'école primai'),
(2, '2 ème année d\'école prima'),
(3, '3 ème année d\'école prima'),
(4, '4 ème année d\'école prima'),
(5, '5 ème année d\'école prima'),
(6, '6 ème année d\'école prima');

-- --------------------------------------------------------

--
-- Structure de la table `note`
--

CREATE TABLE `note` (
  `Annee_scolaire` year(4) NOT NULL,
  `ID_eleve` varchar(10) NOT NULL,
  `code_classe` int(10) NOT NULL,
  `code_matiere` varchar(10) NOT NULL,
  `code_T` int(1) NOT NULL,
  `note` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `note`
--

INSERT INTO `note` (`Annee_scolaire`, `ID_eleve`, `code_classe`, `code_matiere`, `code_T`, `note`) VALUES
('2024', '201', 61, 'anglais', 3, 18),
('2024', '201', 61, 'exprfr', 3, 15),
('2024', '201', 61, 'geo', 3, 16),
('2024', '201', 61, 'histoire', 3, 18.5),
('2024', '201', 61, 'islamic', 3, 20),
('2024', '201', 61, 'languear', 3, 16.5),
('2024', '201', 61, 'lecturefr', 3, 20),
('2024', '201', 61, 'math', 3, 17),
('2024', '201', 61, 'music', 3, 19.5),
('2024', '201', 61, 'oralear', 3, 17.75),
('2024', '201', 61, 'pinture', 3, 18.5),
('2024', '201', 61, 'prod', 3, 20),
('2024', '201', 61, 'production', 3, 14.75),
('2024', '201', 61, 'science', 3, 19),
('2024', '201', 61, 'sport', 3, 16),
('2024', '201', 61, 'technique', 3, 17),
('2024', '201', 62, 'madania', 3, 18),
('2024', '202', 51, 'anglais', 3, 18),
('2024', '202', 51, 'exprfr', 3, 18.5),
('2024', '202', 51, 'geo', 3, 16.5),
('2024', '202', 51, 'histoire', 3, 17),
('2024', '202', 51, 'islamic', 3, 18.75),
('2024', '202', 51, 'languear', 3, 18),
('2024', '202', 51, 'lecturear', 3, 17),
('2024', '202', 51, 'lecturefr', 3, 19.5),
('2024', '202', 51, 'madania', 3, 17.75),
('2024', '202', 51, 'math', 3, 15.5),
('2024', '202', 51, 'music', 3, 15.5),
('2024', '202', 51, 'oralear', 3, 16.5),
('2024', '202', 51, 'pinture', 3, 20),
('2024', '202', 51, 'prod', 3, 12.5),
('2024', '202', 51, 'production', 3, 16),
('2024', '202', 51, 'science', 3, 18),
('2024', '202', 51, 'sport', 3, 20),
('2024', '202', 51, 'technique', 3, 16.5),
('2024', '204', 53, 'exprfr', 3, 18),
('2024', '204', 53, 'geo', 3, 18.5),
('2024', '204', 53, 'histoire', 3, 20),
('2024', '204', 53, 'islamic', 3, 16.5),
('2024', '204', 53, 'languear', 3, 20),
('2024', '204', 53, 'lecturear', 3, 17.5),
('2024', '204', 53, 'lecturefr', 3, 17),
('2024', '204', 53, 'madania', 3, 15.75),
('2024', '204', 53, 'math', 3, 17.75),
('2024', '204', 53, 'music', 3, 12),
('2024', '204', 53, 'oralear', 3, 16),
('2024', '204', 53, 'pinture', 3, 15),
('2024', '204', 53, 'prod', 3, 19),
('2024', '204', 53, 'production', 3, 16.5),
('2024', '204', 53, 'science', 3, 17),
('2024', '204', 53, 'sport', 3, 14),
('2024', '204', 53, 'technique', 3, 17),
('2024', '210', 43, 'exprfr', 3, 18),
('2024', '210', 43, 'geo', 3, 15),
('2024', '210', 43, 'histoire', 3, 14.75),
('2024', '210', 43, 'islamic', 3, 16.5),
('2024', '210', 43, 'languear', 3, 20),
('2024', '210', 43, 'lecturefr', 3, 14),
('2024', '210', 43, 'madania', 3, 17),
('2024', '210', 43, 'math', 3, 19.5),
('2024', '210', 43, 'music', 3, 17.75),
('2024', '210', 43, 'oralear', 3, 12),
('2024', '210', 43, 'pinture', 3, 17),
('2024', '210', 43, 'prod', 3, 13.5),
('2024', '210', 43, 'production', 3, 14.75),
('2024', '210', 43, 'science', 3, 13.5),
('2024', '210', 43, 'sport', 3, 14),
('2024', '210', 43, 'technique', 3, 14),
('2024', '262', 63, 'anglais', 3, 1),
('2024', '262', 63, 'histoire', 3, 3.25),
('2024', '262', 63, 'prod', 3, 7),
('2024', '262', 63, 'technique', 3, 0.5);

-- --------------------------------------------------------

--
-- Structure de la table `parent`
--

CREATE TABLE `parent` (
  `ID_parent` varchar(10) NOT NULL,
  `Nom&Prenom_parent` varchar(100) NOT NULL,
  `Numero_telephone` int(25) NOT NULL,
  `ville_parent` varchar(30) NOT NULL,
  `mpp` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `parent`
--

INSERT INTO `parent` (`ID_parent`, `Nom&Prenom_parent`, `Numero_telephone`, `ville_parent`, `mpp`) VALUES
('100', 'Zied Sabri', 25897654, 'Mahdia', '123'),
('111', 'Sofien Sahli', 25468795, 'Mahdia', '321'),
('124', 'Maram karimi', 54876957, 'Mahdia', '456'),
('130', 'Najib Farhi', 25874698, 'Sousse', '654'),
('144', 'Hatem Sanzi', 54875984, 'Sousse', '789'),
('145', 'Anas Rebai', 96587341, 'Monastir', '987'),
('151', 'Mohamed Riahi', 45487564, 'Mahdia', '101'),
('169', 'Rania Saidi', 89587145, 'Sfax', '102'),
('174', 'Rami Skhiri', 47568954, 'Sousse', '103'),
('177', 'Mahmoud Jaziri', 48987581, 'Sousse', '104'),
('178', 'Ali Sabri', 25487689, 'Monastir', '105'),
('185', 'Maha khmisi', 25471658, 'Sousse', '106'),
('188', 'Nizar Abidi', 96587154, 'Sousse', '107'),
('189', 'Ahmed Skhiri', 96587324, 'Sfax', '108'),
('199', 'Sami Ghoul', 40156984, 'Mahdia', '109');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `affectation_directeur`
--
ALTER TABLE `affectation_directeur`
  ADD KEY `direct` (`ID_directeur`),
  ADD KEY `ecole` (`ID_ecole`);

--
-- Index pour la table `affectation_eleve`
--
ALTER TABLE `affectation_eleve`
  ADD PRIMARY KEY (`Annee_scolaire`,`ID_eleve`,`code_classe`),
  ADD KEY `eleve` (`ID_eleve`),
  ADD KEY `classe` (`code_classe`);

--
-- Index pour la table `classe`
--
ALTER TABLE `classe`
  ADD PRIMARY KEY (`Code_classe`),
  ADD KEY `kk` (`code_niveau`);

--
-- Index pour la table `directeur`
--
ALTER TABLE `directeur`
  ADD PRIMARY KEY (`ID_directeur`);

--
-- Index pour la table `ecole`
--
ALTER TABLE `ecole`
  ADD PRIMARY KEY (`ID_ecole`);

--
-- Index pour la table `eleve`
--
ALTER TABLE `eleve`
  ADD PRIMARY KEY (`ID_eleve`),
  ADD KEY `parent` (`ID_parent`);

--
-- Index pour la table `matiere`
--
ALTER TABLE `matiere`
  ADD PRIMARY KEY (`code_matiere`);

--
-- Index pour la table `matiere_niveau`
--
ALTER TABLE `matiere_niveau`
  ADD KEY `rel` (`code_matiere`),
  ADD KEY `rel2` (`Code_Niveau`);

--
-- Index pour la table `niveau`
--
ALTER TABLE `niveau`
  ADD PRIMARY KEY (`Code_Niveau`);

--
-- Index pour la table `note`
--
ALTER TABLE `note`
  ADD PRIMARY KEY (`Annee_scolaire`,`ID_eleve`,`code_classe`,`code_matiere`,`code_T`),
  ADD KEY `el` (`ID_eleve`),
  ADD KEY `m` (`code_matiere`),
  ADD KEY `cla` (`code_classe`),
  ADD KEY `code_T` (`code_T`);

--
-- Index pour la table `parent`
--
ALTER TABLE `parent`
  ADD PRIMARY KEY (`ID_parent`);

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `affectation_directeur`
--
ALTER TABLE `affectation_directeur`
  ADD CONSTRAINT `direct` FOREIGN KEY (`ID_directeur`) REFERENCES `directeur` (`ID_directeur`),
  ADD CONSTRAINT `directuer` FOREIGN KEY (`ID_directeur`) REFERENCES `directeur` (`ID_directeur`),
  ADD CONSTRAINT `ecole` FOREIGN KEY (`ID_ecole`) REFERENCES `ecole` (`ID_ecole`);

--
-- Contraintes pour la table `affectation_eleve`
--
ALTER TABLE `affectation_eleve`
  ADD CONSTRAINT `classe` FOREIGN KEY (`code_classe`) REFERENCES `classe` (`Code_classe`),
  ADD CONSTRAINT `eleve` FOREIGN KEY (`ID_eleve`) REFERENCES `eleve` (`ID_eleve`);

--
-- Contraintes pour la table `classe`
--
ALTER TABLE `classe`
  ADD CONSTRAINT `kk` FOREIGN KEY (`code_niveau`) REFERENCES `niveau` (`Code_Niveau`);

--
-- Contraintes pour la table `eleve`
--
ALTER TABLE `eleve`
  ADD CONSTRAINT `parent` FOREIGN KEY (`ID_parent`) REFERENCES `parent` (`ID_parent`);

--
-- Contraintes pour la table `matiere_niveau`
--
ALTER TABLE `matiere_niveau`
  ADD CONSTRAINT `rel` FOREIGN KEY (`code_matiere`) REFERENCES `matiere` (`code_matiere`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `rel2` FOREIGN KEY (`Code_Niveau`) REFERENCES `niveau` (`Code_Niveau`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `note`
--
ALTER TABLE `note`
  ADD CONSTRAINT `a` FOREIGN KEY (`Annee_scolaire`) REFERENCES `affectation_eleve` (`Annee_scolaire`),
  ADD CONSTRAINT `cla` FOREIGN KEY (`code_classe`) REFERENCES `classe` (`Code_classe`),
  ADD CONSTRAINT `el` FOREIGN KEY (`ID_eleve`) REFERENCES `eleve` (`ID_eleve`),
  ADD CONSTRAINT `m` FOREIGN KEY (`code_matiere`) REFERENCES `matiere` (`code_matiere`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
