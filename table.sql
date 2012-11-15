-- phpMyAdmin SQL Dump
-- version 3.3.7deb7
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generato il: 15 nov, 2012 at 12:21 PM
-- Versione MySQL: 5.1.63
-- Versione PHP: 5.3.3-7+squeeze14

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";

--
-- Database: `gestiolusdev`
--

-- --------------------------------------------------------

--
-- Struttura della tabella `guasti`
--

CREATE TABLE IF NOT EXISTS `guasti` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `nomepc` varchar(100) NOT NULL,
  `ubicazione` varchar(50) NOT NULL,
  `descrizione` text NOT NULL,
  `nome` varchar(100) NOT NULL,
  `data_apertura` date NOT NULL,
  `soluzione` text NOT NULL,
  `risolutore` varchar(50) NOT NULL,
  `data_chiusura` date NOT NULL,
  `stato` int(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=0 ;

-- --------------------------------------------------------

--
-- Struttura della tabella `lab`
--

CREATE TABLE IF NOT EXISTS `lab` (
  `id` int(3) NOT NULL AUTO_INCREMENT,
  `nome` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=0 ;

-- --------------------------------------------------------

--
-- Struttura della tabella `notepad`
--

CREATE TABLE IF NOT EXISTS `notepad` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `note` text NOT NULL,
  `name` varchar(50) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id` (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=0 ;

-- --------------------------------------------------------

--
-- Struttura della tabella `tecnici`
--

CREATE TABLE IF NOT EXISTS `tecnici` (
  `id` int(50) NOT NULL AUTO_INCREMENT,
  `nome` varchar(255) NOT NULL,
  `punteggio` int(5) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=0 ;
