-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : ven. 26 jan. 2024 à 11:56
-- Version du serveur : 10.4.28-MariaDB
-- Version de PHP : 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `vetotoil`
--

-- --------------------------------------------------------

--
-- Structure de la table `ajouter`
--

CREATE TABLE `ajouter` (
  `id_ajouter_configuration` int(11) NOT NULL,
  `jours_travailler` varchar(14) NOT NULL,
  `date_entree_employer` date NOT NULL,
  `date_sortie_employer` date NOT NULL,
  `date_jours_vacances` date NOT NULL,
  `date_fin_vacances` date NOT NULL,
  `siret` varchar(14) NOT NULL,
  `id_employer` int(11) NOT NULL,
  `droit_utilisateur` varchar(10) DEFAULT NULL,
  `debut_repas` time DEFAULT NULL,
  `fin_repas` time DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `animal`
--

CREATE TABLE `animal` (
  `id_animal` int(11) NOT NULL,
  `prenom` varchar(50) NOT NULL,
  `date_naissance` date NOT NULL,
  `id_race` int(11) NOT NULL,
  `id_patient` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `employer`
--

CREATE TABLE `employer` (
  `id_employer` int(11) NOT NULL,
  `nom` varchar(50) NOT NULL,
  `prenom` varchar(50) NOT NULL,
  `adresse` varchar(255) NOT NULL,
  `complement_adresse` varchar(255) NOT NULL,
  `code_postal` varchar(5) NOT NULL,
  `ville` varchar(50) NOT NULL,
  `telephone` varchar(10) NOT NULL,
  `email` varchar(100) NOT NULL,
  `profession` varchar(20) NOT NULL,
  `password` varchar(255) NOT NULL,
  `date_creation` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `patient`
--

CREATE TABLE `patient` (
  `id_patient` int(11) NOT NULL,
  `nom` varchar(50) NOT NULL,
  `prenom` varchar(50) NOT NULL,
  `adresse` varchar(255) NOT NULL,
  `complement_adresse` varchar(255) NOT NULL,
  `code_postal` varchar(5) NOT NULL,
  `ville` varchar(50) NOT NULL,
  `telephone` varchar(10) NOT NULL,
  `mdp` varchar(255) NOT NULL,
  `email` varchar(100) NOT NULL,
  `date_creation` date NOT NULL,
  `date_fin` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Déchargement des données de la table `patient`
--

INSERT INTO `patient` (`id_patient`, `nom`, `prenom`, `adresse`, `complement_adresse`, `code_postal`, `ville`, `telephone`, `mdp`, `email`, `date_creation`, `date_fin`) VALUES
(107, 'regnier', 'sylvain', 'AVENUE DU MARECHAL NEY, BÂT C6BÂT C6', '', '13011', 'MARSEILLE', '0620941745', '1234', 'regnier.lena44@yahoo.fr', '2024-01-21', NULL),
(108, 'regnier', 'sylvain', 'AVENUE DU MARECHAL NEY, BÂT C6BÂT C6', '', '13011', 'MARSEILLE', '0620941745', '1234', 'regnier.lena44@yahoo.fr', '2024-01-21', NULL),
(109, 'regnier', 'sylvain', 'AVENUE DU MARECHAL NEY, BÂT C6BÂT C6', '', '13011', 'MARSEILLE', '0620941745', '1234', 'regnier.lena44@yahoo.fr', '2024-01-21', NULL),
(211, 'thierry', 'thierry', '6 rue judaïque', '', '33000', 'bordeaux', '0101010101', '1234', 'thierry.leng@gmail.com', '2024-01-23', NULL),
(212, '@toto', ':tata', 'zerzea', '', 'azer', 'azerez', '0101010101', '1234', 'toto@gmail.com', '2024-01-23', NULL),
(213, '@//////////¨¨  popo', '@//////////¨¨  popo', 'zerzea', '', 'azer', 'azerez', '0101010101', '1234', 'popo@gmail.com', '2024-01-23', NULL),
(214, '&amp;#039;/&amp;#039;&amp;quot;&amp;quot; &amp;lt;', '&amp;#039;/&amp;#039;&amp;quot;&amp;quot; &amp;lt;', 'rue l&rsquo;herminot', '', '77550', 'moissy-cramayel', '0101010101', '1234', 'dfyghij@gmail.com', '2024-01-23', NULL),
(215, '&lt;/script&gt;', '&lt;/script&gt;', 'rue l’herminot', '', '77550', 'moissy-cramayel', '0101010101', '1234', 'script@gmail.com', '2024-01-23', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `race`
--

CREATE TABLE `race` (
  `id_race` int(11) NOT NULL,
  `race_animal` varchar(30) NOT NULL,
  `id_type` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Déchargement des données de la table `race`
--

INSERT INTO `race` (`id_race`, `race_animal`, `id_type`) VALUES
(1, 'Ainou', 1),
(2, 'Airedale Terrier', 1),
(3, 'Akbash', 1),
(4, 'Akita Inu', 1),
(5, 'Akita americain', 1),
(6, 'Alangu Mastiff', 1),
(7, 'Alano espagnol', 1),
(8, 'Bulldog de sang bleu alpha', 1),
(9, 'Alaskan Klee Kai', 1),
(10, 'Alaunt', 1),
(11, 'Alopekis', 1),
(12, 'Intimidateur americain', 1),
(13, 'Terrier glabre americain', 1),
(14, 'Ariegeois ', 1),
(15, 'Armant dog', 1),
(16, 'Bandog', 1),
(17, 'Bangkaew de Thailande  ', 1),
(18, 'Barbet ', 1),
(19, 'Basenji ', 1),
(20, 'Basset ardennais, race disparu', 1),
(21, 'Basset artesien normand ', 1),
(22, 'Basset d\'Artois', 1),
(23, 'Basset bleu de Gascogne ', 1),
(24, 'Basset des Alpes  ', 1),
(25, 'Basset fauve de Bretagne ', 1),
(26, 'Basset hound ', 1),
(27, 'Basset suedois', 1),
(28, 'Basset de Westphalie', 1),
(29, 'Beagle ', 1),
(30, 'Beagle-harrier ', 1),
(31, 'Beaglier', 1),
(32, 'Bedlington Terrier ', 1),
(33, 'Berger allemand  ', 1),
(34, 'Berger americain miniature ', 1),
(35, 'Berger d\'Anatolie', 1),
(36, 'Berger anglais ancestral', 1),
(37, 'Berger d\'Artois race disparue', 1),
(38, 'Berger d\'Asie centrale  ', 1),
(39, 'Berger australien  ', 1),
(40, 'Berger australien miniature', 1),
(41, 'Berger d\'Auvergne', 1),
(42, 'Berger basque', 1),
(43, 'Berger de Beauce  ', 1),
(44, 'Berger belge ', 1),
(45, 'Berger belge Groenendael ', 1),
(46, 'Berger belge Laekenois ', 1),
(47, 'Berger belge malinois ', 1),
(48, 'Berger Belge Tervueren ', 1),
(49, 'Berger de Bergame', 1),
(50, 'Berger blanc suisse ', 1),
(51, 'Berger de Boheme  ', 1),
(52, 'Berger de Bosnie-Herzegovine e', 1),
(53, 'Berger de Brie', 1),
(54, 'Berger bulgare', 1),
(55, 'Berger catalan', 1),
(56, 'Berger du Caucase', 1),
(57, 'Berger de la Crau', 1),
(58, 'Berger Croate  ', 1),
(59, 'Berger finnois de Laponie  ', 1),
(60, 'Berger Hellenique', 1),
(61, 'Berger Himalayen', 1),
(62, 'Berger hollandais  ', 1),
(63, 'Berger islandais ', 1),
(64, 'Berger du Karst  ', 1),
(65, 'Berger du Larzac race disparue', 1),
(66, 'Berger de Majorque ', 1),
(67, 'Berger de Maremme et Abruzzes ', 1),
(68, 'Berger picard  ', 1),
(69, 'Berger polonais de plaine  ', 1),
(70, 'Berger Portugais', 1),
(71, 'Berger des Pyrenees', 1),
(72, 'Berger des Pyrenees ? face ras', 1),
(73, 'Berger des Pyrenees ? poil lon', 1),
(74, 'Berger roumain', 1),
(75, 'Berger roumain des Carpates  ', 1),
(76, 'Berger roumain de Mioritza  ', 1),
(77, 'Berger roumain Bucovina  ', 1),
(78, 'Berger de Russie meridionale o', 1),
(79, 'Berger de Savoie ou berger des', 1),
(80, 'Berger de Shiloh ', 1),
(81, 'Berger des Shetland', 1),
(82, 'Berger Tahitien', 1),
(83, 'Berger des Tatras', 1),
(84, 'Berger yougoslave de Charplani', 1),
(85, 'Bouvier des Ardennes', 1),
(86, 'Bouvier des Flandres', 1),
(87, 'Boxer', 1),
(88, 'Boykin Spaniel ', 1),
(89, 'Brachet allemand  ', 1),
(90, 'Brachet noir et feu   ', 1),
(91, 'Brachet de Styrie ? poil dur  ', 1),
(92, 'Brachet polonais  ', 1),
(93, 'Brachet tyrolien  ', 1),
(94, 'Braque allemand ? poil court  ', 1),
(95, 'Braque d\'Auvergne ', 1),
(96, 'Braque de Burgos  ', 1),
(97, 'Braque de l\'Ariege ', 1),
(98, 'Braque du Bourbonnais ', 1),
(99, 'Braque du Dupuy race disparue', 1),
(100, 'Braque fran?ais  ', 1),
(102, 'Braque de Weimar  ', 1),
(103, 'Braque de Weimar ? poil court ', 1),
(104, 'Braque de Weimar ? poil long ', 1),
(105, 'Braque hongrois ? poil court  ', 1),
(106, 'Braque hongrois ? poil dur  ', 1),
(107, 'Braque italien  ', 1),
(108, 'Braque portugais ', 1),
(109, 'Braque Saint-Germain ', 1),
(110, 'Braque slovaque ? poil dur ', 1),
(111, 'Griffon vendeen ', 1),
(112, 'Broholmer  ', 1),
(113, 'Bruno du Jura', 1),
(114, 'Bruno du Jura type Saint-Huber', 1),
(115, 'Buhund norvegien  ', 1),
(116, 'Bull Boxer', 1),
(117, 'Bull Terrier ', 1),
(119, 'Bulldog anglais  ', 1),
(120, 'Bulldog Americain', 1),
(121, 'Bulldog australien', 1),
(122, 'Bullmastiff', 1),
(123, 'Cairn Terrier ', 1),
(124, 'Caniche ', 1),
(125, 'Caniche Royal', 1),
(126, 'Carlin', 1),
(127, 'Cavalier King Charles Spaniel', 1),
(128, 'Cavoodle', 1),
(129, 'Charnaigre, race disparue', 1),
(130, 'Chiba ', 1),
(131, 'Chien Afghan', 1),
(132, 'Chien africain', 1),
(133, 'Chien d\'arret allemand ? poil ', 1),
(136, 'Chien d\'arret danois ancestral', 1),
(137, 'Chien d\'arret frison  ', 1),
(138, 'Chien d\'arret italien ? poil d', 1),
(139, 'Chien d\'arret portugais  ', 1),
(140, 'Chien d\'Artois ', 1),
(141, 'Chien de Bali  ', 1),
(142, 'Chien de Canaan  ', 1),
(143, 'Chien chanteur ', 1),
(144, 'Chien chinois ? crete  ', 1),
(145, 'Chien chinois de Chongqing ', 1),
(146, 'Chien Corse Cursinu  ', 1),
(147, 'Chien de Castro Laboreiro  ', 1),
(148, 'Chien de cour italien   ', 1),
(149, 'Chien courant de Bosnie ? poil', 1),
(150, 'Chien courant espagnol  ', 1),
(151, 'Chien courant d\'Estonie  ', 1),
(152, 'Chien courant finlandais  ', 1),
(153, 'Chien courant grec  ', 1),
(154, 'Chien courant de Halden  ', 1),
(155, 'Chien courant de Hamilton  ', 1),
(156, 'Chien courant de Hygen  ', 1),
(157, 'Chien courant d\'Istrie ? poil ', 1),
(159, 'Chien courant italien ', 1),
(160, 'Chien courant italien ? poil d', 1),
(161, 'Chien courant italien ? poil r', 1),
(162, 'Chien courant de montagne du M', 1),
(163, 'Chien courant norvegien  ', 1),
(164, 'Chien courant polonais  ', 1),
(165, 'Chien courant de Posavatz  ', 1),
(166, 'Chien courant de Schiller  ', 1),
(167, 'Chien courant serbe ou chien c', 1),
(168, 'Chien courant slovaque  ', 1),
(169, 'Chien courant du Smaland  ', 1),
(170, 'Chien courant suisse ', 1),
(171, 'Chien courant bernois ', 1),
(172, 'Chien courant du Jura  ', 1),
(173, 'Chien courant lucernois ', 1),
(174, 'Chien courant schwytzois ', 1),
(175, 'Chien courant de Transylvanie ', 1),
(176, 'Chien courant tricolore serbe ', 1),
(177, 'Chien courant de Virelade, rac', 1),
(178, 'Chien de ferme dano-suedois  ', 1),
(179, 'Chien d\'eau americain  ', 1),
(180, 'Chien d\'eau espagnol  ', 1),
(181, 'Chien d\'eau frison  ', 1),
(182, 'Chien d\'eau irlandais  ', 1),
(183, 'Chien d\'eau portugais', 1),
(184, 'Chien d\'eau romagnol', 1),
(185, 'Chien d\'elan norvegien gris', 1),
(186, 'Chien d\'elan norvegien noir', 1),
(187, 'Chien d\'elan suedois', 1),
(188, 'Chien Fila de Saint Miguel', 1),
(189, 'Chien finnois de Laponie', 1),
(190, 'Chien de garenne des Canaries', 1),
(191, 'Chien de Taimyr', 1),
(192, 'Chien du Groenland', 1),
(193, 'Chien leopard catahoula', 1),
(194, 'Chien-loup de Saarloos', 1),
(195, 'Chien-loup tchecoslovaque', 1),
(196, 'Chien ? loutre', 1),
(197, 'Chien de montagne portugais', 1),
(198, 'Chien de montagne des Pyrenees', 1),
(199, 'Chien norvegien de macareux', 1),
(200, 'Chien nu mexicain', 1),
(201, 'Chien nu du Perou', 1),
(202, 'Chien d\'ours de Carelie', 1),
(203, 'Chien d\'oysel allemand', 1),
(204, 'Chien paria', 1),
(205, 'Chien de perdrix de Drente', 1),
(206, 'Chien de recherche au sang de ', 1),
(207, 'Chien de recherche au sang du ', 1),
(208, 'Chien de Saint-Hubert ', 1),
(209, 'Chien suedois de Laponie', 1),
(210, 'Chien de Taiwan', 1),
(211, 'Chien de Terre-Neuve', 1),
(212, 'Chien thailandais ? crete dors', 1),
(213, 'Chihuahua', 1),
(214, 'Chinook', 1),
(215, 'Chow-Chow', 1),
(216, 'Cimarron uruguayen', 1),
(217, 'Cirneco de l\'etna', 1),
(218, 'Clumber Spaniel', 1),
(219, 'Cockapoo', 1),
(220, 'Cocker Spaniel americain', 1),
(221, 'Cocker Spaniel anglais', 1),
(222, 'Colley', 1),
(223, 'Colley ? poil long', 1),
(224, 'Colley ? poil court', 1),
(225, 'Colley barbu', 1),
(226, 'Chien noir et feu pour la chas', 1),
(227, 'Coton de Tulear', 1),
(228, 'Cursinu', 1),
(229, 'Dalmatien', 1),
(230, 'Dandie Dinmont Terrier', 1),
(231, 'Deerhound', 1),
(232, 'Dingo Americain', 1),
(233, 'Dingo', 1),
(234, 'Dogue du Tibet', 1),
(235, 'Dobermann', 1),
(236, 'Dogue allemand', 1),
(237, 'Dogue argentin', 1),
(238, 'Dogue de Bordeaux', 1),
(239, 'Dogue des Canaries', 1),
(240, 'Dogue de Majorque', 1),
(241, 'English Coonhound', 1),
(242, 'English Springer Spaniel', 1),
(243, 'epagneul bleu de Picardie', 1),
(244, 'epagneul breton', 1),
(245, 'epagneul fran?ais', 1),
(246, 'epagneul japonais', 1),
(247, 'epagneul de Munster', 1),
(248, 'Grand Munsterlander', 1),
(249, 'Petit Munsterlander', 1),
(250, 'epagneul nain continental', 1),
(251, 'epagneul nain continental papi', 1),
(252, 'epagneul nain continental phal', 1),
(253, 'epagneul picard', 1),
(254, 'epagneul de Pont-Audemer', 1),
(255, 'epagneul de Saint-Usuge', 1),
(256, 'epagneul tibetain', 1),
(257, 'Esquimau americain', 1),
(258, 'Esquimau canadien', 1),
(259, 'Estonian Hound', 1),
(260, 'Eurasier', 1),
(261, 'Field Spaniel', 1),
(262, 'Fila Brasileiro', 1),
(263, 'Foxhound anglais', 1),
(264, 'Foxhound americain', 1),
(265, 'Fox Terrier', 1),
(266, 'Fox-terrier ? poil lisse', 1),
(267, 'Fox-terrier ? poil dur', 1),
(268, 'Miniature Fox Terrier', 1),
(269, 'Fran?ais blanc et noir', 1),
(270, 'Fran?ais blanc et orange', 1),
(271, 'Fran?ais tricolore', 1),
(272, 'Gascon saintongeois', 1),
(273, 'Goldendoodle', 1),
(274, 'Golden Retriever', 1),
(275, 'Goldador', 1),
(276, 'Grand anglo-fran?ais blanc et ', 1),
(278, 'Grand anglo-fran?ais tricolore', 1),
(279, 'Grand basset griffon vendeen', 1),
(280, 'Grand bleu de Gascogne', 1),
(281, 'Grand bouvier suisse', 1),
(282, 'Grand griffon vendeen', 1),
(284, 'Griffon belge', 1),
(285, 'Griffon bleu de Gascogne', 1),
(286, 'Griffon boulet ? poil laineux', 1),
(287, 'Griffon de Bresse', 1),
(288, 'Griffon bruxellois', 1),
(289, 'Griffon d\'arret ? poil dur Kor', 1),
(290, 'Griffon fauve de Bretagne', 1),
(291, 'Griffon nivernais', 1),
(292, 'Griffon d\'arret tcheque', 1),
(293, 'Harrier', 1),
(294, 'Hovawart', 1),
(295, 'Huntaway', 1),
(296, 'Husky de Sakhaline', 1),
(297, 'Husky siberien', 1),
(298, 'Irish wolfhound', 1),
(299, 'Jack Russell Terrier', 1),
(300, 'Jindo coreen', 1),
(301, 'Jug', 1),
(302, 'Kai', 1),
(303, 'Kangal Dog', 1),
(304, 'Keeshond', 1),
(305, 'Kelpie australien', 1),
(306, 'Kerry beagle', 1),
(307, 'King Charles Spaniel', 1),
(308, 'King Shepherd', 1),
(309, 'Kishu', 1),
(310, 'Komondor', 1),
(311, 'Kooikerhondje', 1),
(312, 'Koolie', 1),
(313, 'Kromfohrlander', 1),
(314, 'Kuchi dog', 1),
(315, 'Kuvasz', 1),
(316, 'Kyi Leo', 1),
(317, 'Labernois', 1),
(318, 'Labrabull', 1),
(319, 'Labradinger', 1),
(320, 'Labradoodle', 1),
(321, 'Labrador', 1),
(322, 'Labrastaff', 1),
(323, 'Laika de Iakoutie', 1),
(324, 'Laika de Siberie occidentale', 1),
(325, 'Laika de Siberie orientale', 1),
(326, 'Laika russo-europeen', 1),
(327, 'Lakeland Terrier', 1),
(328, 'Lancashire Heeler', 1),
(329, 'Landseer', 1),
(330, 'Leonberg', 1),
(331, 'Levesque', 1),
(332, 'Levrette italienne', 1),
(333, 'Levrier afghan', 1),
(334, 'Levrier arabe', 1),
(335, 'Levrier australien', 1),
(336, 'Levrier azawakh', 1),
(337, 'Levrier Bakhmull', 1),
(338, 'Levrier des Baleares', 1),
(339, 'Levrier des Canaries', 1),
(340, 'Levrier Caravan hound', 1),
(341, 'Levrier Chortaj', 1),
(342, 'Levrier ecossais', 1),
(343, 'Levrier espagnol', 1),
(344, 'Levrier grec', 1),
(345, 'Levrier anglais', 1),
(346, 'Levrier hongrois', 1),
(347, 'Levrier irlandais', 1),
(348, 'Levrier persan', 1),
(349, 'Levrier de Pharaon', 1),
(350, 'Levrier polonais', 1),
(351, 'Levrier portugais', 1),
(352, 'Levrier Rampur', 1),
(353, 'Levrier russe', 1),
(354, 'Levrier Taigan', 1),
(355, 'Levrier de soie', 1),
(356, 'Levrier whippet', 1),
(357, 'Lhassa Apso', 1),
(358, 'Lithuanian Hound', 1),
(359, 'Longdog', 1),
(360, 'Loulou de Pomeranie', 1),
(361, 'Lurcher', 1),
(362, 'Mackenzie River husky', 1),
(363, 'Malamute d\'Alaska', 1),
(364, 'malinois', 1),
(365, 'Mal-shi', 1),
(366, 'Manchester terrier', 1),
(367, 'Mastiff', 1),
(368, 'Mastiff d\'Anatolie', 1),
(369, 'Maltipoo', 1),
(370, 'Matin belge', 1),
(371, 'Matin de l\'Alentejo', 1),
(372, 'Matin des Pyrenees', 1),
(373, 'Matin espagnol', 1),
(374, 'Matin napolitain', 1),
(375, 'Matin transmontano', 1),
(376, 'Mountain Cur', 1),
(377, 'Mudi', 1),
(378, 'Norfolk Terrier ', 1),
(379, 'Norwich Terrier ', 1),
(380, 'Old English Bulldog', 1),
(381, 'Papillon', 1),
(382, 'Patterdale Terrier', 1),
(383, 'Pekinois ', 1),
(384, 'Perro fino Colombiano', 1),
(385, 'Perro sin pelo del Peru', 1),
(386, 'Petit basset griffon vendeen', 1),
(387, 'Petit bleu de Gascogne', 1),
(388, 'Petit braban?on', 1),
(389, 'Petit chien courant suisse', 1),
(390, 'Petit chien courant bernois', 1),
(391, 'Petit chien courant lucernois', 1),
(392, 'Petit chien courant schwytzois', 1),
(393, 'Petit chien hollandais de chas', 1),
(394, 'Petit chien lion', 1),
(395, 'Petit chien russe', 1),
(397, 'Petit levrier italien', 1),
(398, 'Phalene', 1),
(399, 'Pinscher autrichien', 1),
(400, 'Pinscher allemand', 1),
(401, 'Pinscher nain', 1),
(402, 'pit-bull', 1),
(403, 'Plott Hound', 1),
(404, 'Pointer', 1),
(405, 'Poitevin', 1),
(406, 'Porcelaine', 1),
(407, 'Pudelpointer', 1),
(408, 'Puggle', 1),
(409, 'Puli ', 1),
(410, 'Pumi', 1),
(411, 'Ratonero Bodeguero Andaluz', 1),
(412, 'Ratier de Prague', 1),
(413, 'Redbone Coonhound', 1),
(414, 'Retriever de la baie de Chesap', 1),
(415, 'Retriever du Labrador', 1),
(416, 'Retriever de la Nouvelle-ecoss', 1),
(417, 'Retriever ? poil boucle', 1),
(418, 'Retriever ? poil plat', 1),
(419, 'Rhodesian Ridgeback', 1),
(420, 'Rottweiler', 1),
(421, 'Sabueso espagnol', 1),
(422, 'Saint-bernard', 1),
(423, 'Samoyede', 1),
(424, 'Sapsali', 1),
(425, 'Schapendoes neerlandais', 1),
(426, 'Sheeoadoodle', 1),
(427, 'Schillerstovare', 1),
(428, 'Schipperke', 1),
(429, 'Schnauzer', 1),
(430, 'Schnauzer nain', 1),
(431, 'Schnauzer moyen', 1),
(432, 'Schnauzer geant', 1),
(433, 'Schnoodle', 1),
(434, 'Schweizer Laufhund', 1),
(435, 'Sealyham Terrier', 1),
(436, 'Segugio Maremmano', 1),
(437, 'Traineau de Siberie de Seppala', 1),
(438, 'Setter anglais', 1),
(439, 'Setter Gordon', 1),
(440, 'Setter irlandais rouge', 1),
(441, 'Setter irlandais rouge et blan', 1),
(442, 'Shar Pei', 1),
(443, 'Shiba Inu', 1),
(444, 'Shih-poo', 1),
(445, 'Shih Tzu', 1),
(446, 'Shikoku', 1),
(447, 'Skye Terrier', 1),
(448, 'Smous des Pays-Bas', 1),
(449, 'Spitz allemand', 1),
(450, 'Spitz Loup', 1),
(451, 'Grand spitz', 1),
(452, 'Spitz moyen', 1),
(453, 'Petit spitz', 1),
(454, 'Spitz nain', 1),
(455, 'Spitz de Norrbotten', 1),
(456, 'Spitz des Visigoths', 1),
(457, 'Spitz finlandais', 1),
(458, 'Spitz italien', 1),
(459, 'Spitz japonais ', 1),
(460, 'Sporting Lucas Terrier', 1),
(461, 'Staffordshire Bull Terrier', 1),
(462, 'staffie', 1),
(463, 'Staffordshire Terrier americai', 1),
(464, 'Stephens Cur', 1),
(465, 'Sussex Spaniel ', 1),
(466, 'Talbot race disparue', 1),
(467, 'Tamaskan', 1),
(468, 'Tchouvatch slovaque', 1),
(469, 'Teckel', 1),
(470, 'Teddy Roosevelt Terrier', 1),
(471, 'Tenterfield Terrier', 1),
(472, 'Terre-neuve', 1),
(473, 'Terrier australien', 1),
(474, 'Terrier australien ? poil soye', 1),
(475, 'Terrier bresilien', 1),
(476, 'Terrier anglais d\'agrement noi', 1),
(477, 'Terrier de Boston  ', 1),
(478, 'Terrier de chasse allemand', 1),
(479, 'Terrier du Reverend Russel  ', 1),
(480, 'Terrier ecossais', 1),
(481, 'Terrier gallois  ', 1),
(482, 'Terrier Glen of Imaal', 1),
(483, 'Terrier irlandais  ', 1),
(484, 'Terrier irlandais ? poil doux ', 1),
(485, 'Terrier japonais   ', 1),
(486, 'Terrier Kerry Blue  ', 1),
(487, 'Terrier noir  ', 1),
(488, 'Terrier tcheque  ', 1),
(489, 'Terrier tibetain', 1),
(490, 'Texas Heeler', 1),
(491, 'Kyi apso tibetain', 1),
(492, 'Tosa', 1),
(493, 'Bouledogue jouet', 1),
(494, 'Jouet fox terrier', 1),
(495, 'Jouet Manchester terrier', 1),
(496, 'Treeing Cur', 1),
(497, 'Treeing Tennessee Brindle', 1),
(498, 'Treeing Walker Coonhound', 1),
(499, 'Welsh Corgi Cardigan', 1),
(500, 'Welsh Corgi Pembroke', 1),
(501, 'epagneul springer gallois', 1),
(502, 'Terrier blanc des Highlands de', 1),
(503, 'Yorkillon', 1),
(504, 'Yorkipoo', 1),
(505, 'Yorkshire Terrier', 1),
(506, 'Zuchon Shichon', 1),
(507, 'Abyssin', 2),
(508, 'American Bobtail', 2),
(509, 'American Curl', 2),
(510, 'American Shorthair', 2),
(511, 'American Wirehair', 2),
(512, 'Balinais', 2),
(513, 'Bengal', 2),
(514, 'Birman', 2),
(515, 'Bombay', 2),
(516, 'British Shorthair', 2),
(517, 'Burmese', 2),
(518, 'Burmilla', 2),
(519, 'Californian Spangled', 2),
(520, 'Chartreux', 2),
(521, 'Chausie', 2),
(522, 'Cornish Rex', 2),
(523, 'Cymric', 2),
(524, 'Devon Rex', 2),
(525, 'Donskoy', 2),
(526, 'Egyptian Mau', 2),
(527, 'European Shorthair', 2),
(528, 'Exotic Shorthair', 2),
(529, 'German Rex', 2),
(530, 'Havana Brown', 2),
(531, 'Highland Fold', 2),
(532, 'Himalayen', 2),
(533, 'Japanese Bobtail', 2),
(534, 'Javanais', 2),
(535, 'Khao Manee', 2),
(536, 'Korat', 2),
(537, 'Kurilian Bobtail', 2),
(538, 'LaPerm', 2),
(539, 'Maine Coon', 2),
(540, 'Manx', 2),
(541, 'Mau Egyptien', 2),
(542, 'Munchkin', 2),
(543, 'Nebelung', 2),
(544, 'Norvégien', 2),
(545, 'Ocicat', 2),
(546, 'Ojos Azules', 2),
(547, 'Oriental', 2),
(548, 'Persan', 2),
(549, 'Peterbald', 2),
(550, 'Pixie-bob', 2),
(551, 'Ragdoll', 2),
(552, 'Rex de Selkirk', 2),
(553, 'Sacré de Birmanie', 2),
(554, 'Savannah', 2),
(555, 'Scottish Fold', 2),
(556, 'Scottish Straight', 2),
(557, 'Selkirk Rex', 2),
(558, 'Serval domestique', 2),
(559, 'Seychellois', 2),
(560, 'Siamois', 2),
(561, 'Sibérien', 2),
(562, 'Singapura', 2),
(563, 'Snowshoe', 2),
(564, 'Autre', 1),
(566, 'Autres', 2);

-- --------------------------------------------------------

--
-- Structure de la table `rdv`
--

CREATE TABLE `rdv` (
  `id_rdv` int(11) NOT NULL,
  `date_rdv` date NOT NULL,
  `status` varchar(20) NOT NULL,
  `id_employer` int(11) NOT NULL,
  `id_patient` int(11) NOT NULL,
  `siret` varchar(14) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `societe`
--

CREATE TABLE `societe` (
  `siret` varchar(14) NOT NULL,
  `nom_societe` varchar(50) NOT NULL,
  `profession` varchar(20) NOT NULL,
  `nom_dirigeant` varchar(50) NOT NULL,
  `adresse` varchar(255) NOT NULL,
  `complement_adresse` varchar(255) NOT NULL,
  `code_postal` varchar(5) NOT NULL,
  `ville` varchar(50) NOT NULL,
  `telephone_societe` varchar(10) NOT NULL,
  `telephone_dirigeant` varchar(10) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `date_creation` date NOT NULL,
  `date_resiliation` date DEFAULT NULL,
  `date_validation` datetime DEFAULT NULL,
  `status` varchar(20) DEFAULT NULL,
  `droit_utilisateur` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Déchargement des données de la table `societe`
--

INSERT INTO `societe` (`siret`, `nom_societe`, `profession`, `nom_dirigeant`, `adresse`, `complement_adresse`, `code_postal`, `ville`, `telephone_societe`, `telephone_dirigeant`, `email`, `password`, `date_creation`, `date_resiliation`, `date_validation`, `status`, `droit_utilisateur`) VALUES
('', '', '', '', '', '', '', '', '', '', '', '', '2024-01-23', NULL, NULL, NULL, 'Admin'),
('11111111111111', 'tata', 'Vétérinaire', 'SYLVAIN REGNIER', 'ZERZEA', 'tata', '12011', 'AZEREZ', '0101010101', '0202020202', 'regnier.sylvain@yahoo.fr', '', '2024-01-22', NULL, NULL, NULL, 'Admin'),
('12341564897897', 'toto', 'vétérinaire', 'sylvain regnier', 'zerzea', '', '13011', 'azerez', '0101010101', '0202020202', 'regnier.sylvain@yahoo.fr', '1234', '2024-01-23', NULL, NULL, 'Valider', 'Admin'),
('33333333333333', 'gfdgd', 'vétérinaire', 'sylvain regnier', 'zerzea', '', '13011', 'azerez', '0101010101', '0202020202', 'thierry.leng@gmail.com', '1234', '2024-01-23', NULL, NULL, NULL, 'Admin'),
('55555555555555', 'toto', 'vétérinaire', 'sylvain regnier', 'zerzea', '', '13011', 'tr', '0101010101', '0202020202', 'popo@gmail.com', '1234', '2024-01-23', NULL, NULL, NULL, 'Admin'),
('88888888888888', 'toto', 'vétérinaire', 'toto', '6 rue du general leclec', '', '13011', 'paris', '0101010101', '0101010101', 'srrdtfygh@gmail.com', '1234', '2024-01-23', NULL, NULL, NULL, 'Admin'),
('99999999999999', 'toto', 'vétérinaire', 'sylvain regnier', 'zerzea', '', '13011', 'azerez', '0101010101', '0202020202', 'toto@gmail.com', '1234', '2024-01-23', NULL, NULL, NULL, 'Admin');

-- --------------------------------------------------------

--
-- Structure de la table `soigner`
--

CREATE TABLE `soigner` (
  `id_soigner` int(11) NOT NULL,
  `acte_soins` varchar(50) NOT NULL,
  `traitement` varchar(100) NOT NULL,
  `nombre_fois` int(11) NOT NULL,
  `date_soins` date NOT NULL,
  `id_employer` int(11) NOT NULL,
  `id_patient` int(11) NOT NULL,
  `id_animal` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `type`
--

CREATE TABLE `type` (
  `id_type` int(11) NOT NULL,
  `type_animal` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Déchargement des données de la table `type`
--

INSERT INTO `type` (`id_type`, `type_animal`) VALUES
(2, 'Chat'),
(1, 'Chien');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `ajouter`
--
ALTER TABLE `ajouter`
  ADD PRIMARY KEY (`id_ajouter_configuration`),
  ADD KEY `date_entree_employer` (`date_entree_employer`,`date_sortie_employer`),
  ADD KEY `siret` (`siret`),
  ADD KEY `id_employer` (`id_employer`);

--
-- Index pour la table `animal`
--
ALTER TABLE `animal`
  ADD PRIMARY KEY (`id_animal`),
  ADD KEY `date_naissance` (`date_naissance`),
  ADD KEY `id_patient` (`id_patient`),
  ADD KEY `id_race` (`id_race`) USING BTREE;

--
-- Index pour la table `employer`
--
ALTER TABLE `employer`
  ADD PRIMARY KEY (`id_employer`);

--
-- Index pour la table `patient`
--
ALTER TABLE `patient`
  ADD PRIMARY KEY (`id_patient`);

--
-- Index pour la table `race`
--
ALTER TABLE `race`
  ADD PRIMARY KEY (`id_race`),
  ADD UNIQUE KEY `race_animal` (`race_animal`) USING BTREE,
  ADD KEY `id_type` (`id_type`);

--
-- Index pour la table `rdv`
--
ALTER TABLE `rdv`
  ADD PRIMARY KEY (`id_rdv`),
  ADD KEY `id_employer` (`id_employer`),
  ADD KEY `id_patient` (`id_patient`),
  ADD KEY `siret` (`siret`);

--
-- Index pour la table `societe`
--
ALTER TABLE `societe`
  ADD PRIMARY KEY (`siret`),
  ADD KEY `nom_societe` (`nom_societe`),
  ADD KEY `nom_dirigeant` (`nom_dirigeant`),
  ADD KEY `code_postal` (`code_postal`),
  ADD KEY `ville` (`ville`),
  ADD KEY `date_creation` (`date_creation`),
  ADD KEY `date_validation` (`date_validation`),
  ADD KEY `date_resiliation` (`date_resiliation`);

--
-- Index pour la table `soigner`
--
ALTER TABLE `soigner`
  ADD PRIMARY KEY (`id_soigner`),
  ADD KEY `id_employer` (`id_employer`),
  ADD KEY `id_patient` (`id_patient`),
  ADD KEY `id_animal` (`id_animal`);

--
-- Index pour la table `type`
--
ALTER TABLE `type`
  ADD PRIMARY KEY (`id_type`),
  ADD UNIQUE KEY `type_animal` (`type_animal`) USING BTREE,
  ADD KEY `id_type` (`id_type`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `ajouter`
--
ALTER TABLE `ajouter`
  MODIFY `id_ajouter_configuration` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `animal`
--
ALTER TABLE `animal`
  MODIFY `id_animal` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `employer`
--
ALTER TABLE `employer`
  MODIFY `id_employer` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `patient`
--
ALTER TABLE `patient`
  MODIFY `id_patient` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=216;

--
-- AUTO_INCREMENT pour la table `race`
--
ALTER TABLE `race`
  MODIFY `id_race` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=567;

--
-- AUTO_INCREMENT pour la table `rdv`
--
ALTER TABLE `rdv`
  MODIFY `id_rdv` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `soigner`
--
ALTER TABLE `soigner`
  MODIFY `id_soigner` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `type`
--
ALTER TABLE `type`
  MODIFY `id_type` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `ajouter`
--
ALTER TABLE `ajouter`
  ADD CONSTRAINT `ajouter_ibfk_2` FOREIGN KEY (`id_employer`) REFERENCES `employer` (`id_employer`),
  ADD CONSTRAINT `ajouter_ibfk_3` FOREIGN KEY (`siret`) REFERENCES `societe` (`siret`);

--
-- Contraintes pour la table `animal`
--
ALTER TABLE `animal`
  ADD CONSTRAINT `animal_ibfk_1` FOREIGN KEY (`id_patient`) REFERENCES `patient` (`id_patient`),
  ADD CONSTRAINT `animal_ibfk_2` FOREIGN KEY (`id_race`) REFERENCES `race` (`id_race`);

--
-- Contraintes pour la table `employer`
--
ALTER TABLE `employer`
  ADD CONSTRAINT `employer_ibfk_1` FOREIGN KEY (`id_employer`) REFERENCES `soigner` (`id_employer`);

--
-- Contraintes pour la table `race`
--
ALTER TABLE `race`
  ADD CONSTRAINT `race_ibfk_1` FOREIGN KEY (`id_type`) REFERENCES `type` (`id_type`);

--
-- Contraintes pour la table `rdv`
--
ALTER TABLE `rdv`
  ADD CONSTRAINT `rdv_ibfk_1` FOREIGN KEY (`id_employer`) REFERENCES `employer` (`id_employer`),
  ADD CONSTRAINT `rdv_ibfk_2` FOREIGN KEY (`id_patient`) REFERENCES `patient` (`id_patient`),
  ADD CONSTRAINT `rdv_ibfk_3` FOREIGN KEY (`siret`) REFERENCES `societe` (`siret`);

--
-- Contraintes pour la table `soigner`
--
ALTER TABLE `soigner`
  ADD CONSTRAINT `soigner_ibfk_1` FOREIGN KEY (`id_animal`) REFERENCES `animal` (`id_animal`),
  ADD CONSTRAINT `soigner_ibfk_2` FOREIGN KEY (`id_patient`) REFERENCES `patient` (`id_patient`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
