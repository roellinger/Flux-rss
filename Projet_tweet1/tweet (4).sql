-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Ven 13 Février 2015 à 09:20
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
  PRIMARY KEY (`id_tweet`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `followers`
--

CREATE TABLE IF NOT EXISTS `followers` (
  `id_follow` int(11) NOT NULL AUTO_INCREMENT,
  `id_user` int(11) NOT NULL,
  `id_follower` int(11) NOT NULL,
  PRIMARY KEY (`id_follow`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=346 ;

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=73 ;

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
(72, 35, 'Art, Mode et Design');

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
(35, 'pika.png', '');

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=34 ;

--
-- Contenu de la table `tweet`
--

INSERT INTO `tweet` (`id_tweet`, `id_user`, `id_media`, `created`, `content`, `id_origin`, `hashtag`, `activate`) VALUES
(2, 3, 0, '2015-02-08', 'bonjour', 0, '', 0),
(3, 3, 0, '2015-02-08', 'comment as ? ', 0, '', 0),
(4, 3, 0, '2015-02-08', 'comment as ? ', 0, '', 0),
(5, 3, 0, '2015-02-08', 'comment as ? ', 0, '', 0),
(6, 3, 0, '2015-02-08', 'comment as ? ', 0, '', 0),
(7, 3, 0, '2015-02-08', 'dddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddd', 0, '', 0),
(8, 3, 0, '2015-02-08', 'Hello wordl', 0, '', 0),
(9, 3, 0, '2015-02-08', 'Hello', 0, '', 0),
(10, 21, 0, '2015-02-08', 'Hello !', 0, '', 0),
(11, 21, 0, '2015-02-08', 'fff', 0, '', 0),
(12, 21, 0, '2015-02-08', 'vvv', 0, '', 0),
(13, 21, 0, '2015-02-08', 'aa', 0, '', 0),
(14, 22, 0, '2015-02-08', 'yes', 0, '', 0),
(15, 3, 0, '2015-02-08', 'T''es fort ma lloutte', 0, '', 0),
(16, 21, 0, '2015-02-08', 'love', 0, '', 0),
(17, 20, 0, '2015-02-09', 'incryable', 0, '', 0),
(18, 20, 0, '2015-02-09', 'youhouuuuuu', 0, '', 0),
(19, 20, 0, '2015-02-09', 'lol', 0, '', 0),
(20, 3, 0, '2015-02-09', 'ldjkjd', 0, '', 0),
(21, 24, 0, '2015-02-09', 'hello ! ', 0, '', 0),
(22, 24, 0, '2015-02-09', 'Pikaa Pikaaa !!', 0, '', 0),
(23, 3, 0, '2015-02-10', 'hello', 0, '', 0),
(24, 3, 0, '2015-02-10', 'bonjour les amis !\r\n', 0, '', 0),
(25, 27, 0, '2015-02-10', 'Pikaaa gus !!', 0, '', 0),
(26, 29, 0, '2015-02-10', 'hello je suis une pute', 0, '', 0),
(27, 3, 0, '2015-02-10', 'hello ! ', 0, '', 0),
(28, 30, 0, '2015-02-11', 'coucou', 0, '', 0),
(29, 24, 0, '2015-02-12', 'bb', 0, '', 0),
(30, 3, 0, '2015-02-12', ':)\r\n', 0, '', 0),
(31, 3, 0, '2015-02-12', 'hello ! ', 0, '', 0),
(32, 32, 0, '2015-02-12', 'Pikachuuuuuuu !!! ', 0, '', 0),
(33, 33, 0, '2015-02-13', 'Caraaapuceee !!', 0, '', 0);

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=36 ;

--
-- Contenu de la table `user`
--

INSERT INTO `user` (`id_user`, `biography`, `login`, `password`, `fullname`, `mail`, `f_name`, `l_name`, `date_register`, `follows`, `activate`, `privacy`, `key_activation`, `localisation`, `id_theme`) VALUES
(35, '', 'Pikachu', 'test', 'Pikachu deSacha', 'roellinger.robin@gmail.com', '', '', '0000-00-00 00:00:00', '', 1, 0, 0, '', 'rgb(221, 46, 68) none repeat scroll 0% 0% / auto padding-box border-box');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
