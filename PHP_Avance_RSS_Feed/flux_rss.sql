-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Dim 22 Février 2015 à 12:17
-- Version du serveur :  5.6.17
-- Version de PHP :  5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données :  `flux_rss`
--
CREATE DATABASE IF NOT EXISTS `flux_rss` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `flux_rss`;

-- --------------------------------------------------------

--
-- Structure de la table `flux_rss`
--

CREATE TABLE IF NOT EXISTS `flux_rss` (
  `id_user` int(11) NOT NULL,
  `id_flux` int(11) NOT NULL AUTO_INCREMENT,
  `type` varchar(255) NOT NULL,
  `url` varchar(255) NOT NULL,
  `activate` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `count_flux` varchar(255) NOT NULL,
  PRIMARY KEY (`id_flux`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=85 ;

--
-- Contenu de la table `flux_rss`
--

INSERT INTO `flux_rss` (`id_user`, `id_flux`, `type`, `url`, `activate`, `title`, `description`, `image`, `count_flux`) VALUES
(8, 42, '', 'http://www.lemonde.fr/services-aux-internautes/rss_full.xml', 1, 'Aide : Toute l''actualitÃ© sur Le Monde.fr.', 'Aide - DÃ©couvrez gratuitement tous les articles, les vidÃ©os et les infographies de la rubrique Aide sur Le Monde.fr.', 'http://www.lemonde.fr/medias/web/img/export/logo_lmfr_90x20_export.png', '1'),
(8, 43, '', 'http://www.jeuxvideo.com/rss/rss.xml', 1, '', '', '', '0'),
(8, 44, '', 'http://www.lemonde.fr/m-actu/rss_full.xml', 1, 'Actu : Toute l''actualitÃ© sur Le Monde.fr.', 'Actu - DÃ©couvrez gratuitement tous les articles, les vidÃ©os et les infographies de la rubrique Actu sur Le Monde.fr.', 'http://www.lemonde.fr/medias/web/img/export/logo_lmfr_90x20_export.png', '0'),
(8, 45, '', 'http://www.lemonde.fr/services-aux-internautes/rss_full.xml', 1, 'Aide : Toute l''actualitÃ© sur Le Monde.fr.', 'Aide - DÃ©couvrez gratuitement tous les articles, les vidÃ©os et les infographies de la rubrique Aide sur Le Monde.fr.', 'http://www.lemonde.fr/medias/web/img/export/logo_lmfr_90x20_export.png', '0'),
(8, 46, '', 'http://www.lemonde.fr/services-aux-internautes/rss_full.xml', 1, 'Aide : Toute l''actualitÃ© sur Le Monde.fr.', 'Aide - DÃ©couvrez gratuitement tous les articles, les vidÃ©os et les infographies de la rubrique Aide sur Le Monde.fr.', 'http://www.lemonde.fr/medias/web/img/export/logo_lmfr_90x20_export.png', '0'),
(8, 47, '', 'http://www.jeuxvideo.com/rss/rss.xml', 1, '', '', '', '0'),
(8, 48, '', 'http://www.lemonde.fr/services-aux-internautes/rss_full.xml', 1, 'Aide : Toute l''actualitÃ© sur Le Monde.fr.', 'Aide - DÃ©couvrez gratuitement tous les articles, les vidÃ©os et les infographies de la rubrique Aide sur Le Monde.fr.', 'http://www.lemonde.fr/medias/web/img/export/logo_lmfr_90x20_export.png', '0'),
(8, 49, '', 'http://www.lemonde.fr/services-aux-internautes/rss_full.xml', 1, 'Aide : Toute l''actualitÃ© sur Le Monde.fr.', 'Aide - DÃ©couvrez gratuitement tous les articles, les vidÃ©os et les infographies de la rubrique Aide sur Le Monde.fr.', 'http://www.lemonde.fr/medias/web/img/export/logo_lmfr_90x20_export.png', '0'),
(8, 50, '', 'http://www.lemonde.fr/services-aux-internautes/rss_full.xml', 1, 'Aide : Toute l''actualitÃ© sur Le Monde.fr.', 'Aide - DÃ©couvrez gratuitement tous les articles, les vidÃ©os et les infographies de la rubrique Aide sur Le Monde.fr.', 'http://www.lemonde.fr/medias/web/img/export/logo_lmfr_90x20_export.png', '0'),
(8, 51, '', 'http://www.lemonde.fr/afrique/rss_full.xml', 1, 'Afrique : Toute l''actualitÃ© sur Le Monde.fr.', 'Afrique - DÃ©couvrez gratuitement tous les articles, les vidÃ©os et les infographies de la rubrique Afrique sur Le Monde.fr.', 'http://www.lemonde.fr/medias/web/img/export/logo_lmfr_90x20_export.png', '0'),
(8, 52, '', 'http://www.lemonde.fr/afrique/rss_full.xml', 1, 'Afrique : Toute l''actualitÃ© sur Le Monde.fr.', 'Afrique - DÃ©couvrez gratuitement tous les articles, les vidÃ©os et les infographies de la rubrique Afrique sur Le Monde.fr.', 'http://www.lemonde.fr/medias/web/img/export/logo_lmfr_90x20_export.png', '0'),
(8, 53, '', 'http://www.lemonde.fr/afrique/rss_full.xml', 1, 'Afrique : Toute l''actualitÃ© sur Le Monde.fr.', 'Afrique - DÃ©couvrez gratuitement tous les articles, les vidÃ©os et les infographies de la rubrique Afrique sur Le Monde.fr.', 'http://www.lemonde.fr/medias/web/img/export/logo_lmfr_90x20_export.png', '0'),
(8, 54, '', 'http://www.lemonde.fr/afrique/rss_full.xml', 1, 'Afrique : Toute l''actualitÃ© sur Le Monde.fr.', 'Afrique - DÃ©couvrez gratuitement tous les articles, les vidÃ©os et les infographies de la rubrique Afrique sur Le Monde.fr.', 'http://www.lemonde.fr/medias/web/img/export/logo_lmfr_90x20_export.png', '0'),
(8, 55, '', 'http://www.lemonde.fr/afrique/rss_full.xml', 1, 'Afrique : Toute l''actualitÃ© sur Le Monde.fr.', 'Afrique - DÃ©couvrez gratuitement tous les articles, les vidÃ©os et les infographies de la rubrique Afrique sur Le Monde.fr.', 'http://www.lemonde.fr/medias/web/img/export/logo_lmfr_90x20_export.png', '0'),
(8, 56, '', 'http://www.lemonde.fr/afrique/rss_full.xml', 1, 'Afrique : Toute l''actualitÃ© sur Le Monde.fr.', 'Afrique - DÃ©couvrez gratuitement tous les articles, les vidÃ©os et les infographies de la rubrique Afrique sur Le Monde.fr.', 'http://www.lemonde.fr/medias/web/img/export/logo_lmfr_90x20_export.png', '0'),
(8, 57, '', 'http://www.lemonde.fr/afrique/rss_full.xml', 1, 'Afrique : Toute l''actualitÃ© sur Le Monde.fr.', 'Afrique - DÃ©couvrez gratuitement tous les articles, les vidÃ©os et les infographies de la rubrique Afrique sur Le Monde.fr.', 'http://www.lemonde.fr/medias/web/img/export/logo_lmfr_90x20_export.png', '0'),
(8, 58, '', 'http://rss.lemonde.fr/c/205/f/3050/index.rss', 1, 'Le Monde.fr - ActualitÃ© Ã  la Une', 'Le Monde.fr - 1er site d''information. Les articles du journal et toute l''actualitÃ© en continu : International, France, SociÃ©tÃ©, Economie, Culture, Environnement, Blogs ...', 'http://www.lemonde.fr/mmpub/img/lgo/lemondefr_rss.gif', '0'),
(8, 59, '', 'http://www.jeuxvideo.com/rss/rss.xml', 1, '', '', '', '0'),
(8, 60, '', 'http://www.jeuxvideo.com/rss/rss.xml', 1, '', '', '', '0'),
(8, 61, '', 'http://www.jeuxvideo.com/rss/rss.xml', 1, '', '', '', '0'),
(8, 62, '', 'http://www.lemonde.fr/services-aux-internautes/rss_full.xml', 1, 'Aide : Toute l''actualitÃ© sur Le Monde.fr.', 'Aide - DÃ©couvrez gratuitement tous les articles, les vidÃ©os et les infographies de la rubrique Aide sur Le Monde.fr.', 'http://www.lemonde.fr/medias/web/img/export/logo_lmfr_90x20_export.png', '1'),
(8, 63, '', 'http://rss.lemonde.fr/c/205/f/3050/index.rss', 1, 'Le Monde.fr - ActualitÃ© Ã  la Une', 'Le Monde.fr - 1er site d''information. Les articles du journal et toute l''actualitÃ© en continu : International, France, SociÃ©tÃ©, Economie, Culture, Environnement, Blogs ...', 'http://www.lemonde.fr/mmpub/img/lgo/lemondefr_rss.gif', '0'),
(8, 64, '', 'http://www.jeuxvideo.com/rss/rss.xml', 1, '', '', '', '0'),
(9, 65, '', 'http://www.jeuxvideo.com/rss/rss.xml', 0, '', '', '', '0'),
(8, 66, '', 'http://rss.lemonde.fr/c/205/f/3050/index.rss', 1, 'Le Monde.fr - ActualitÃ© Ã  la Une', 'Le Monde.fr - 1er site d''information. Les articles du journal et toute l''actualitÃ© en continu : International, France, SociÃ©tÃ©, Economie, Culture, Environnement, Blogs ...', 'http://www.lemonde.fr/mmpub/img/lgo/lemondefr_rss.gif', '0'),
(8, 67, '', 'http://rss.lemonde.fr/c/205/f/3050/index.rss', 1, 'Le Monde.fr - ActualitÃ© Ã  la Une', 'Le Monde.fr - 1er site d''information. Les articles du journal et toute l''actualitÃ© en continu : International, France, SociÃ©tÃ©, Economie, Culture, Environnement, Blogs ...', 'http://www.lemonde.fr/mmpub/img/lgo/lemondefr_rss.gif', '0'),
(8, 68, '', 'http://rss.lemonde.fr/c/205/f/3050/index.rss', 1, 'Le Monde.fr - ActualitÃ© Ã  la Une', 'Le Monde.fr - 1er site d''information. Les articles du journal et toute l''actualitÃ© en continu : International, France, SociÃ©tÃ©, Economie, Culture, Environnement, Blogs ...', 'http://www.lemonde.fr/mmpub/img/lgo/lemondefr_rss.gif', '0'),
(8, 69, '', 'http://rss.lemonde.fr/c/205/f/3050/index.rss', 1, 'Le Monde.fr - ActualitÃ© Ã  la Une', 'Le Monde.fr - 1er site d''information. Les articles du journal et toute l''actualitÃ© en continu : International, France, SociÃ©tÃ©, Economie, Culture, Environnement, Blogs ...', 'http://www.lemonde.fr/mmpub/img/lgo/lemondefr_rss.gif', '0'),
(8, 70, '', 'http://rss.lemonde.fr/c/205/f/3050/index.rss', 1, 'Le Monde.fr - ActualitÃ© Ã  la Une', 'Le Monde.fr - 1er site d''information. Les articles du journal et toute l''actualitÃ© en continu : International, France, SociÃ©tÃ©, Economie, Culture, Environnement, Blogs ...', 'http://www.lemonde.fr/mmpub/img/lgo/lemondefr_rss.gif', '0'),
(8, 71, '', 'http://rss.lemonde.fr/c/205/f/3050/index.rss', 1, 'Le Monde.fr - ActualitÃ© Ã  la Une', 'Le Monde.fr - 1er site d''information. Les articles du journal et toute l''actualitÃ© en continu : International, France, SociÃ©tÃ©, Economie, Culture, Environnement, Blogs ...', 'http://www.lemonde.fr/mmpub/img/lgo/lemondefr_rss.gif', '0'),
(8, 72, '', 'http://rss.lemonde.fr/c/205/f/3050/index.rss', 1, 'Le Monde.fr - ActualitÃ© Ã  la Une', 'Le Monde.fr - 1er site d''information. Les articles du journal et toute l''actualitÃ© en continu : International, France, SociÃ©tÃ©, Economie, Culture, Environnement, Blogs ...', 'http://www.lemonde.fr/mmpub/img/lgo/lemondefr_rss.gif', '0'),
(8, 73, '', 'http://rss.lemonde.fr/c/205/f/3050/index.rss', 1, 'Le Monde.fr - ActualitÃ© Ã  la Une', 'Le Monde.fr - 1er site d''information. Les articles du journal et toute l''actualitÃ© en continu : International, France, SociÃ©tÃ©, Economie, Culture, Environnement, Blogs ...', 'http://www.lemonde.fr/mmpub/img/lgo/lemondefr_rss.gif', '0'),
(8, 74, '', 'http://rss.lemonde.fr/c/205/f/3050/index.rss', 1, 'Le Monde.fr - ActualitÃ© Ã  la Une', 'Le Monde.fr - 1er site d''information. Les articles du journal et toute l''actualitÃ© en continu : International, France, SociÃ©tÃ©, Economie, Culture, Environnement, Blogs ...', 'http://www.lemonde.fr/mmpub/img/lgo/lemondefr_rss.gif', '0'),
(8, 75, '', 'http://rss.lemonde.fr/c/205/f/3050/index.rss', 1, 'Le Monde.fr - ActualitÃ© Ã  la Une', 'Le Monde.fr - 1er site d''information. Les articles du journal et toute l''actualitÃ© en continu : International, France, SociÃ©tÃ©, Economie, Culture, Environnement, Blogs ...', 'http://www.lemonde.fr/mmpub/img/lgo/lemondefr_rss.gif', '0'),
(8, 76, '', 'http://rss.lemonde.fr/c/205/f/3050/index.rss', 1, 'Le Monde.fr - ActualitÃ© Ã  la Une', 'Le Monde.fr - 1er site d''information. Les articles du journal et toute l''actualitÃ© en continu : International, France, SociÃ©tÃ©, Economie, Culture, Environnement, Blogs ...', 'http://www.lemonde.fr/mmpub/img/lgo/lemondefr_rss.gif', '0'),
(8, 77, '', 'http://rss.lemonde.fr/c/205/f/3050/index.rss', 1, 'Le Monde.fr - ActualitÃ© Ã  la Une', 'Le Monde.fr - 1er site d''information. Les articles du journal et toute l''actualitÃ© en continu : International, France, SociÃ©tÃ©, Economie, Culture, Environnement, Blogs ...', 'http://www.lemonde.fr/mmpub/img/lgo/lemondefr_rss.gif', '0'),
(8, 78, '', 'http://rss.lemonde.fr/c/205/f/3050/index.rss', 0, 'Le Monde.fr - ActualitÃ© Ã  la Une', 'Le Monde.fr - 1er site d''information. Les articles du journal et toute l''actualitÃ© en continu : International, France, SociÃ©tÃ©, Economie, Culture, Environnement, Blogs ...', 'http://www.lemonde.fr/mmpub/img/lgo/lemondefr_rss.gif', '19'),
(8, 79, '', 'http://www.agoravox.fr/spip.php?page=backend&id_mot=31', 0, 'AgoraVox le mÃ©dia citoyen', 'AgoraVox constitue l''une des premiÃ¨res initiatives europÃ©ennes de journalisme citoyen Ã  grande Ã©chelle complÃ¨tement gratuite. AgoraVox est une plate-forme multimÃ©dia mise Ã  la disposition de tous les citoyens qui souhaitent diffuser des information', 'http://www.agoravox.fr/local/cache-vignettes/L144xH41/siteon0-dd267.png', '11'),
(8, 80, '', 'http://www.agoravox.fr/spip.php?page=backend&id_mot=1708', 0, 'AgoraVox le mÃ©dia citoyen', 'AgoraVox constitue l''une des premiÃ¨res initiatives europÃ©ennes de journalisme citoyen Ã  grande Ã©chelle complÃ¨tement gratuite. AgoraVox est une plate-forme multimÃ©dia mise Ã  la disposition de tous les citoyens qui souhaitent diffuser des information', 'http://www.agoravox.fr/local/cache-vignettes/L144xH41/siteon0-dd267.png', '3'),
(8, 81, '', 'http://www.lemonde.fr/services-aux-internautes/rss_full.xml', 0, 'Aide : Toute l''actualitÃ© sur Le Monde.fr.', 'Aide - DÃ©couvrez gratuitement tous les articles, les vidÃ©os et les infographies de la rubrique Aide sur Le Monde.fr.', 'http://www.lemonde.fr/medias/web/img/export/logo_lmfr_90x20_export.png', '3'),
(8, 82, '', 'http://www.lemonde.fr/services-aux-internautes/rss_full.xml', 0, 'Aide : Toute l''actualitÃ© sur Le Monde.fr.', 'Aide - DÃ©couvrez gratuitement tous les articles, les vidÃ©os et les infographies de la rubrique Aide sur Le Monde.fr.', 'http://www.lemonde.fr/medias/web/img/export/logo_lmfr_90x20_export.png', '2'),
(8, 83, '', 'http://www.lemonde.fr/services-aux-internautes/rss_full.xml', 0, 'Aide : Toute l''actualitÃ© sur Le Monde.fr.', 'Aide - DÃ©couvrez gratuitement tous les articles, les vidÃ©os et les infographies de la rubrique Aide sur Le Monde.fr.', 'http://www.lemonde.fr/medias/web/img/export/logo_lmfr_90x20_export.png', '1'),
(8, 84, '', 'http://www.lemonde.fr/services-aux-internautes/rss_full.xml', 0, 'Aide : Toute l''actualitÃ© sur Le Monde.fr.', 'Aide - DÃ©couvrez gratuitement tous les articles, les vidÃ©os et les infographies de la rubrique Aide sur Le Monde.fr.', 'http://www.lemonde.fr/medias/web/img/export/logo_lmfr_90x20_export.png', '');

-- --------------------------------------------------------

--
-- Structure de la table `picture`
--

CREATE TABLE IF NOT EXISTS `picture` (
  `id_user` int(11) NOT NULL,
  `url` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `suggest_flux`
--

CREATE TABLE IF NOT EXISTS `suggest_flux` (
  `id_suggest` int(11) NOT NULL AUTO_INCREMENT,
  `id_user` int(11) NOT NULL,
  `content` varchar(255) NOT NULL,
  `date` varchar(255) NOT NULL,
  PRIMARY KEY (`id_suggest`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=97 ;

--
-- Contenu de la table `suggest_flux`
--

INSERT INTO `suggest_flux` (`id_suggest`, `id_user`, `content`, `date`) VALUES
(94, 8, 'http://www.lemonde.fr/services-aux-internautes/rss_full.xml', '2015-02-22 12:05:18'),
(95, 8, 'http://www.agoravox.fr/spip.php?page=backend', '2015-02-22 12:10:48'),
(96, 8, 'http://www.lemonde.fr/services-aux-internautes/rss_full.xml', '2015-02-22 12:14:15');

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id_user` int(11) NOT NULL AUTO_INCREMENT,
  `login` varchar(255) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `mail` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `localisation` text NOT NULL,
  `naissance` text NOT NULL,
  `description` text NOT NULL,
  PRIMARY KEY (`id_user`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=10 ;

--
-- Contenu de la table `user`
--

INSERT INTO `user` (`id_user`, `login`, `firstname`, `lastname`, `mail`, `password`, `localisation`, `naissance`, `description`) VALUES
(8, 'Robinouzzz', 'Roellinger', 'Robin', 'roellinger.robin@gmail.com', 'test', 'Kanto', '1994-12-23', ''),
(9, 'test', 'test', 'test', 'test@gmail.com', 'test', '', '', '');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
