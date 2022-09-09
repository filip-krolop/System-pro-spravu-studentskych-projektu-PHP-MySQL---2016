-- phpMyAdmin SQL Dump
-- version 2.9.0.3
-- http://www.phpmyadmin.net
-- 
-- Počítač: localhost
-- Vygenerováno: Středa 30. března 2016, 19:44
-- Verze MySQL: 5.0.77
-- Verze PHP: 5.2.12
-- 
-- Databáze: `mproj`
-- 

-- --------------------------------------------------------

-- 
-- Struktura tabulky `projekty`
-- 

CREATE TABLE `projekty` (
  `id` int(10) unsigned NOT NULL auto_increment,
  `nazev_projektu` varchar(100) collate utf8_czech_ci NOT NULL,
  `popis_projektu` varchar(1000) collate utf8_czech_ci NOT NULL,
  `kategorie` varchar(50) collate utf8_czech_ci NOT NULL,
  `autor` varchar(20) collate utf8_czech_ci NOT NULL,
  `login` varchar(20) collate utf8_czech_ci NOT NULL,
  `trida` varchar(6) collate utf8_czech_ci NOT NULL,
  `rok` varchar(9) collate utf8_czech_ci NOT NULL,
  `vedouci_prace` varchar(20) collate utf8_czech_ci NOT NULL,
  `projekt_aktivni` tinyint(1) unsigned NOT NULL default '0',
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_czech_ci AUTO_INCREMENT=7 ;

-- 
-- Vypisuji data pro tabulku `projekty`
-- 

INSERT INTO `projekty` (`id`, `nazev_projektu`, `popis_projektu`, `kategorie`, `autor`, `login`, `trida`, `rok`, `vedouci_prace`, `projekt_aktivni`) VALUES 
(1, 'Databáze projektů (PHP + MySQL)', 'Vytvoření systému pro správu studentských projektů s využitím jazyka PHP a databázového systému MySQL', 'Webové stránky', 'Filip Krolop', 'krolop.el12a', 'EL 4.A', '2015/2016', 'zavodny', 0),
(2, 'Vytvoření jednoduchého herníhu prostředí v Unreal Enginu 4', '', 'Unity', 'Viktor Krčma', 'krcma.el12b', 'EL 4.A', '2015/2016', 'kotlarik', 0),
(3, 'Návrh podnikové sítě a její simulace v Packet tracer', '', 'Sítě', 'Michal Kubík', 'kubik.el12b', 'EL 4.A', '2015/2016', 'kotlarik', 0);

-- --------------------------------------------------------

-- 
-- Struktura tabulky `uzivatele`
-- 

CREATE TABLE `uzivatele` (
  `id` int(10) unsigned NOT NULL auto_increment,
  `login` varchar(20) collate utf8_czech_ci NOT NULL,
  `jmeno_a_prijmeni` varchar(30) collate utf8_czech_ci NOT NULL,
  `heslo` varchar(32) collate utf8_czech_ci NOT NULL,
  `pocet_projektu` tinyint(1) unsigned NOT NULL,
  `opravneni` tinyint(1) unsigned NOT NULL default '0',
  `blokovat` tinyint(1) unsigned NOT NULL default '0',
  `imap` tinyint(1) unsigned NOT NULL default '0',
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_czech_ci AUTO_INCREMENT=5 ;

-- 
-- Vypisuji data pro tabulku `uzivatele`
-- 

INSERT INTO `uzivatele` (`id`, `login`, `jmeno_a_prijmeni`, `heslo`, `pocet_projektu`, `opravneni`, `blokovat`, `imap`) VALUES 
(1, 'admin', 'Administrator', '2ac9cb7dc02b3c0083eb70898e549b63', 0, 3, 0, 0),
(4, 'krolop.el12a', '', '6f9dff5af05096ea9f23cc7bedd65683', 1, 1, 0, 1);
