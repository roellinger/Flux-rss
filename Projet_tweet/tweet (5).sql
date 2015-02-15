-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Dim 15 Février 2015 à 15:20
-- Version du serveur :  5.6.17
-- Version de PHP :  5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données :  `tweet`
--
CREATE DATABASE IF NOT EXISTS `tweet` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `tweet`;

-- --------------------------------------------------------

--
-- Structure de la table `favoris`
--

CREATE TABLE IF NOT EXISTS `favoris` (
  `id_tweet` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_favoris` int(11) NOT NULL,
  PRIMARY KEY (`id_tweet`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `favoris`
--

INSERT INTO `favoris` (`id_tweet`, `id_user`, `id_favoris`) VALUES
(71, 35, 42),
(104, 43, 43),
(122, 35, 35);

-- --------------------------------------------------------

--
-- Structure de la table `followers`
--

CREATE TABLE IF NOT EXISTS `followers` (
  `id_follow` int(11) NOT NULL AUTO_INCREMENT,
  `id_user` int(11) NOT NULL,
  `id_follower` int(11) NOT NULL,
  PRIMARY KEY (`id_follow`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=410 ;

--
-- Contenu de la table `followers`
--

INSERT INTO `followers` (`id_follow`, `id_user`, `id_follower`) VALUES
(346, 36, 35),
(348, 38, 36),
(351, 40, 35),
(352, 40, 36),
(353, 40, 38),
(354, 40, 39),
(355, 41, 35),
(356, 41, 36),
(357, 41, 38),
(358, 41, 39),
(359, 41, 40),
(361, 42, 35),
(362, 42, 38),
(363, 42, 39),
(366, 43, 38),
(367, 43, 39),
(368, 43, 41),
(369, 43, 42),
(371, 44, 38),
(372, 44, 39),
(373, 44, 41),
(374, 44, 42),
(375, 44, 43),
(402, 35, 41),
(403, 35, 43);

-- --------------------------------------------------------

--
-- Structure de la table `inbox`
--

CREATE TABLE IF NOT EXISTS `inbox` (
  `id_msg` int(11) NOT NULL AUTO_INCREMENT,
  `id_from_user` int(11) NOT NULL,
  `id_to_user` int(11) NOT NULL,
  `content` varchar(140) NOT NULL,
  `date` datetime NOT NULL,
  `activate_send` int(11) NOT NULL,
  `activate_receiver` int(11) NOT NULL,
  PRIMARY KEY (`id_msg`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `info`
--

CREATE TABLE IF NOT EXISTS `info` (
  `id_info` int(11) NOT NULL AUTO_INCREMENT,
  `id_user` int(11) NOT NULL,
  `activite` varchar(255) NOT NULL,
  PRIMARY KEY (`id_info`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=80 ;

--
-- Contenu de la table `info`
--

INSERT INTO `info` (`id_info`, `id_user`, `activite`) VALUES
(43, 3, 'Comptes populaires,Sports'),
(44, 4, 'Sports,Culture'),
(45, 5, 'Associations et Caritatif,Technologie</,Culture'),
(46, 6, 'Culture,Musique'),
(47, 14, 'Associations et Caritatif,Technologie</,Art, Mode et Design'),
(48, 15, 'Humour,Politique'),
(49, 12, 'Musique,Humour'),
(50, 11, 'Sports,Associations et Caritatif'),
(51, 13, 'Art, Mode et Design,Humour'),
(52, 16, 'Comptes populaires,Humour'),
(53, 16, 'Humour'),
(54, 18, 'Sports,Art, Mode et Design,Culture'),
(55, 18, 'Sports,Art, Mode et Design,Culture'),
(56, 19, 'Art, Mode et Design,Culture'),
(57, 20, 'Sports,Art, Mode et Design'),
(58, 21, 'Associations et Caritatif,Technologie</'),
(59, 22, 'Culture'),
(60, 24, 'Comptes populaires,Associations et Caritatif'),
(61, 25, 'Associations et Caritatif,Technologie</'),
(62, 26, 'Associations et Caritatif,Technologie</'),
(63, 27, 'Sports,Technologie</,Musique,Politique'),
(64, 29, 'Technologie</'),
(65, 16, 'Technologie</,Art, Mode et Design'),
(66, 30, 'Associations et Caritatif'),
(67, 6, 'Comptes populaires'),
(68, 31, 'Sports,Associations et Caritatif'),
(69, 32, 'Culture'),
(70, 33, 'Associations et Caritatif,Technologie</'),
(71, 34, 'Art, Mode et Design,Culture'),
(72, 35, 'Art, Mode et Design'),
(73, 36, 'Art, Mode et Design,Culture'),
(74, 38, 'Art, Mode et Design,Culture'),
(75, 40, 'Technologie</,Art, Mode et Design'),
(76, 41, 'Culture,Musique'),
(77, 42, 'Culture,Musique'),
(78, 43, 'Sports,TV'),
(79, 44, 'Associations et Caritatif,Technologie</');

-- --------------------------------------------------------

--
-- Structure de la table `media`
--

CREATE TABLE IF NOT EXISTS `media` (
  `id_media` int(11) NOT NULL,
  `type` varchar(255) NOT NULL,
  `url` varchar(255) NOT NULL,
  PRIMARY KEY (`id_media`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `media`
--

INSERT INTO `media` (`id_media`, `type`, `url`) VALUES
(35, 'pika.png', ''),
(36, '250px-Carapuce-RFVF.png', ''),
(38, '10806359_1519696451631540_6363427416848253273_n.jpg', ''),
(40, '151.png', ''),
(41, 'noavatar.gif', ''),
(42, '250px-Carapuce-RFVF.png', ''),
(43, '151.png', ''),
(44, 'miaous.jpg', '');

-- --------------------------------------------------------

--
-- Structure de la table `tweet`
--

CREATE TABLE IF NOT EXISTS `tweet` (
  `id_tweet` int(11) NOT NULL AUTO_INCREMENT,
  `id_user` int(11) NOT NULL,
  `id_media` int(11) NOT NULL,
  `created` date NOT NULL,
  `content` varchar(140) NOT NULL,
  `id_origin` int(11) NOT NULL,
  `hashtag` varchar(140) NOT NULL,
  `activate` int(11) NOT NULL,
  PRIMARY KEY (`id_tweet`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=150 ;

--
-- Contenu de la table `tweet`
--

INSERT INTO `tweet` (`id_tweet`, `id_user`, `id_media`, `created`, `content`, `id_origin`, `hashtag`, `activate`) VALUES
(145, 35, 0, '2015-02-15', 'Pikaaa !', 0, '', 0),
(146, 44, 0, '2015-02-15', 'Miaouusss', 0, '', 0),
(149, 35, 0, '2015-02-15', 'dd', 0, '', 0);

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id_user` int(11) NOT NULL AUTO_INCREMENT,
  `biography` varchar(140) NOT NULL,
  `login` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `fullname` varchar(255) NOT NULL,
  `mail` varchar(255) NOT NULL,
  `f_name` varchar(255) NOT NULL,
  `l_name` varchar(255) NOT NULL,
  `date_register` datetime NOT NULL,
  `follows` varchar(500) NOT NULL,
  `activate` int(11) NOT NULL,
  `privacy` int(11) NOT NULL,
  `key_activation` int(11) NOT NULL,
  `localisation` varchar(255) NOT NULL,
  `id_theme` varchar(255) NOT NULL,
  PRIMARY KEY (`id_user`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=45 ;

--
-- Contenu de la table `user`
--

INSERT INTO `user` (`id_user`, `biography`, `login`, `password`, `fullname`, `mail`, `f_name`, `l_name`, `date_register`, `follows`, `activate`, `privacy`, `key_activation`, `localisation`, `id_theme`) VALUES
(35, 'Pika Pikaaa', 'Pikachu', 'test', 'Pikachu deSacha', 'roellinger.robin@gmail.com', '', '', '0000-00-00 00:00:00', '', 1, 0, 0, '', 'rgb(221, 46, 68) none repeat scroll 0% 0% / auto padding-box border-box'),
(38, 'Mmmh le caca c''est delicieux !! ', 'orane', '5e52fee47e6b070565f74372468cdc699de89107', 'orane', 'orane@gmail.com', '', '', '0000-00-00 00:00:00', '', 1, 0, 0, 'Paris', 'rgb(250, 116, 62) none repeat scroll 0% 0% / auto padding-box border-box'),
(39, '', 'Salameche', '2ad5bf35987417ba7fd8db75e3e46fdfa8e89e19', 'Sala', 'sala@gmail.com', '', '', '0000-00-00 00:00:00', '', 0, 0, 0, '', ''),
(41, '', 'test123', '2ad5bf35987417ba7fd8db75e3e46fdfa8e89e19', 'test123', 'test@gmail.com', '', '', '0000-00-00 00:00:00', '', 1, 0, 0, '', 'rgb(146, 102, 204) none repeat scroll 0% 0% / auto padding-box border-box'),
(42, 'Pistolet a oo', 'Carapuce', '2ad5bf35987417ba7fd8db75e3e46fdfa8e89e19', 'carapuce', 'cara@gmail.com', '', '', '0000-00-00 00:00:00', '', 1, 0, 0, '', 'rgb(137, 201, 250) none repeat scroll 0% 0% / auto padding-box border-box'),
(43, 'Je suis le plus fort des pokemon, My name is Mew', 'Mewmew', '2ad5bf35987417ba7fd8db75e3e46fdfa8e89e19', 'mew pokemon', 'mew@gmail.com', '', '', '0000-00-00 00:00:00', '', 1, 0, 0, '?', 'rgb(146, 102, 204) none repeat scroll 0% 0% / auto padding-box border-box'),
(44, '', 'Miaous ', '2ad5bf35987417ba7fd8db75e3e46fdfa8e89e19', 'miaous pokemon', 'miaous@gmail.com', '', '', '0000-00-00 00:00:00', '', 1, 0, 0, '', '');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
