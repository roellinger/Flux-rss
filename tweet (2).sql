-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Mar 10 Février 2015 à 18:13
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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=197 ;

--
-- Contenu de la table `followers`
--

INSERT INTO `followers` (`id_follow`, `id_user`, `id_follower`) VALUES
(90, 5, 14),
(91, 5, 6),
(92, 5, 18),
(93, 5, 11),
(94, 5, 3),
(95, 5, 16),
(96, 5, 12),
(97, 5, 4),
(98, 5, 15),
(99, 5, 13),
(100, 12, 6),
(101, 12, 14),
(102, 12, 15),
(103, 12, 13),
(104, 12, 5),
(105, 12, 3),
(106, 12, 11),
(107, 12, 18),
(108, 12, 16),
(109, 12, 4),
(110, 4, 6),
(111, 4, 5),
(112, 4, 14),
(113, 4, 3),
(114, 4, 18),
(115, 4, 12),
(116, 4, 11),
(117, 4, 13),
(118, 4, 15),
(119, 4, 16),
(120, 19, 11),
(121, 19, 13),
(122, 19, 12),
(123, 19, 15),
(124, 19, 4),
(125, 20, 4),
(126, 20, 18),
(127, 20, 16),
(128, 20, 3),
(129, 20, 15),
(130, 20, 5),
(131, 20, 14),
(132, 20, 6),
(133, 20, 13),
(134, 20, 12),
(135, 20, 11),
(136, 20, 19),
(137, 21, 19),
(138, 21, 11),
(139, 21, 15),
(140, 21, 3),
(141, 21, 16),
(142, 21, 20),
(143, 21, 12),
(144, 21, 6),
(145, 21, 18),
(146, 21, 5),
(147, 21, 14),
(148, 21, 4),
(149, 21, 13),
(150, 24, 18),
(151, 24, 4),
(152, 24, 13),
(153, 24, 6),
(154, 24, 5),
(155, 24, 11),
(156, 24, 22),
(157, 24, 19),
(158, 24, 14),
(159, 24, 12),
(160, 24, 20),
(161, 24, 21),
(162, 24, 16),
(163, 24, 3),
(164, 24, 15),
(165, 25, 3),
(166, 24, 25),
(167, 24, 5),
(168, 24, 21),
(169, 24, 20),
(170, 26, 19),
(171, 3, 19),
(172, 3, 26),
(173, 3, 19),
(174, 3, 21),
(175, 3, 19),
(176, 27, 3),
(177, 27, 4),
(178, 27, 5),
(179, 27, 6),
(180, 27, 11),
(181, 27, 12),
(182, 27, 13),
(183, 27, 14),
(184, 27, 15),
(185, 27, 16),
(186, 27, 17),
(187, 27, 18),
(188, 27, 19),
(189, 27, 20),
(190, 27, 21),
(191, 27, 22),
(192, 27, 23),
(193, 27, 24),
(194, 27, 25),
(195, 27, 26),
(196, 3, 27);

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=64 ;

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
(63, 27, 'Sports,Technologie</,Musique,Politique');

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
(3, '10806359_1519696451631540_6363427416848253273_n.jpg', ''),
(4, '10806359_1519696451631540_6363427416848253273_n.jpg', ''),
(5, '10806359_1519696451631540_6363427416848253273_n.jpg', ''),
(12, '10806359_1519696451631540_6363427416848253273_n.jpg', ''),
(19, '10461973_10203850264834131_5915673100345997692_n.jpg', ''),
(20, 'Magenta.jpg', ''),
(21, 'noavatar.gif', ''),
(22, 'noavatar.gif', ''),
(24, 'pika.png', ''),
(25, 'pika.png', ''),
(26, 'noavatar.gif', ''),
(27, 'pika.png', '');

-- --------------------------------------------------------

--
-- Structure de la table `reply`
--

CREATE TABLE IF NOT EXISTS `reply` (
  `id_reply` int(11) NOT NULL AUTO_INCREMENT,
  `id_tweet` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `reply` varchar(140) NOT NULL,
  `created` datetime NOT NULL,
  PRIMARY KEY (`id_reply`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `retweet`
--

CREATE TABLE IF NOT EXISTS `retweet` (
  `id_tweet` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `date_retweet` datetime NOT NULL,
  PRIMARY KEY (`id_tweet`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `theme`
--

CREATE TABLE IF NOT EXISTS `theme` (
  `id_theme` int(11) NOT NULL AUTO_INCREMENT,
  `id_user` int(11) NOT NULL,
  `th_color` varchar(255) NOT NULL,
  `th_main_theme` varchar(255) NOT NULL,
  `th_pos` varchar(255) NOT NULL,
  PRIMARY KEY (`id_theme`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=26 ;

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
(25, 27, 0, '2015-02-10', 'Pikaaa gus !!', 0, '', 0);

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
  PRIMARY KEY (`id_user`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=29 ;

--
-- Contenu de la table `user`
--

INSERT INTO `user` (`id_user`, `biography`, `login`, `password`, `fullname`, `mail`, `f_name`, `l_name`, `date_register`, `follows`, `activate`, `privacy`, `key_activation`) VALUES
(3, 'caca', 'Robinouzz', 'test', 'Robin', 'roellinger.robin@gmail.com', '', '', '0000-00-00 00:00:00', '', 1, 0, 0),
(4, '', 'Oranette', 'test', 'Orane', 'orane@gmail.com', '', '', '0000-00-00 00:00:00', '', 1, 0, 0),
(5, '', 'besac', 'test', 'axel', 'Besa@gmail.com', '', '', '0000-00-00 00:00:00', '', 1, 0, 0),
(6, '', 'besac1', 'test', 'axel', 'rosellinger.robin@gmail.com', '', '', '0000-00-00 00:00:00', '', 0, 0, 0),
(11, '', 'loulou', 'test', 'louis', 'roellingaaaer.robin@gmail.com', '', '', '0000-00-00 00:00:00', '', 0, 0, 0),
(12, '', 'Rito', 'test', 'vincent graul', 'vincent@gmail.com', '', '', '0000-00-00 00:00:00', '', 1, 0, 0),
(13, '', 'delhomme', 'test', 'theo', 'theo@gmail.com', '', '', '0000-00-00 00:00:00', '', 0, 0, 0),
(14, '', 'besac2', 'test', 'axel', 'besac@gmail.com', '', '', '0000-00-00 00:00:00', '', 0, 0, 0),
(15, '', 'oranette123', 'test', 'orane ', 'oran1e@gmail.com', '', '', '0000-00-00 00:00:00', '', 0, 0, 0),
(16, '', 'Max', 'test', 'max', 'max@gmail.com', '', '', '0000-00-00 00:00:00', '', 0, 0, 0),
(17, '', 'max1', 'test', 'maxence', 'maxence@gmail.com', '', '', '0000-00-00 00:00:00', '', 0, 0, 0),
(18, '', 'sucrÃ©', 'test', 'julie planque', 'julie@gmail.com', '', '', '0000-00-00 00:00:00', '', 0, 0, 0),
(19, '', 'pangolin', 'test', 'pango', 'pangolin@gmail.com', '', '', '0000-00-00 00:00:00', '', 1, 0, 0),
(20, '', 'toto', 'test', 'naruto', 'naruto@gmail.com', '', '', '0000-00-00 00:00:00', '', 1, 0, 0),
(21, '', 'robisco', 'test', 'Robin ROellinger', 'roellinger.robin1@gmail.com', '', '', '0000-00-00 00:00:00', '', 1, 0, 0),
(22, '', 'besac3', 'test', 'lolilol', 'roellinger.rssobin@gmail.com2', '', '', '0000-00-00 00:00:00', '', 1, 0, 0),
(23, '', 'tataÂ²', 'test', 'toto', 'roellinger.rzzobin@gmail.com', '', '', '0000-00-00 00:00:00', '', 0, 0, 0),
(24, '', 'pika', 'test', 'Pikachu', 'pikachu@gmail.com', '', '', '0000-00-00 00:00:00', '', 1, 0, 0),
(25, '', 'anais', 'test', 'anais karaman', 'anais@gmail.com', '', '', '0000-00-00 00:00:00', '', 1, 0, 0),
(26, '', 'caca', 'gfhj', 'k,vhbnk,', 'ss@gmail.com', '', '', '0000-00-00 00:00:00', '', 1, 0, 0),
(27, '', 'Gus', 'test', 'Gustave pango', 'gus@gmail.com', '', '', '0000-00-00 00:00:00', '', 1, 0, 0),
(28, '', 'gus', 'test', 'gus', 'guss@gmail.com', '', '', '0000-00-00 00:00:00', '', 0, 0, 0);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
