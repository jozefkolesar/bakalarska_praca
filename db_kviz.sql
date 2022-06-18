-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Hostiteľ: 127.0.0.1
-- Čas generovania: St 27.Máj 2020, 09:48
-- Verzia serveru: 5.7.17
-- Verzia PHP: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Databáza: `db_kviz`
--

-- --------------------------------------------------------

--
-- Štruktúra tabuľky pre tabuľku `obmedzenie`
--

CREATE TABLE `obmedzenie` (
  `ID` tinyint(10) NOT NULL,
  `Meno` varchar(40) COLLATE utf8_slovak_ci NOT NULL,
  `Skola` varchar(40) COLLATE utf8_slovak_ci NOT NULL,
  `Pouzite` varchar(40) COLLATE utf8_slovak_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_slovak_ci;

--
-- Sťahujem dáta pre tabuľku `obmedzenie`
--

INSERT INTO `obmedzenie` (`ID`, `Meno`, `Skola`, `Pouzite`) VALUES
(46, 'Lucka22', 'uzivatelia_vs', 'prvaotazka'),
(66, 'Lucka22', 'uzivatelia_vs', 'patnastnaotazka'),
(67, 'Lucka22', 'uzivatelia_vs', 'dvanastaotazka'),
(27, 'Janko', 'uzivatelia_vs', 'skuska');

-- --------------------------------------------------------

--
-- Štruktúra tabuľky pre tabuľku `otazky`
--

CREATE TABLE `otazky` (
  `ID` int(11) NOT NULL,
  `Znenie` char(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_slovak_ci NOT NULL,
  `Spravna` char(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_slovak_ci NOT NULL,
  `Kod` varchar(40) COLLATE utf8_slovak_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_slovak_ci;

--
-- Sťahujem dáta pre tabuľku `otazky`
--

INSERT INTO `otazky` (`ID`, `Znenie`, `Spravna`, `Kod`) VALUES
(1, 'Koľko profesorov má centrum Hospodárskej informatiky? (číslom)', '1', 'prvaotazka'),
(2, 'Koľko docentov má centrum Hospodárskej informatiky? (číslom)', '2', 'druhaotazka'),
(11, 'Má TUKE viac ako 10 tisíc študentov? (áno/nie)', 'nie', 'tretiaotazka'),
(12, 'Koľko fakúlt má TUKE? (číslom)', '9', 'stvrtaotazka'),
(13, 'Ktorá je najväčšia fakulta TUKE? (skratka fakulty)', 'fei', 'piataotazka'),
(14, ' Je možné na TUKE študovať medicínu? (áno/nie)', 'nie', 'siestaotazka'),
(15, 'Koľko katedier má FEI? (číslom)', '9', 'siedmaotazka'),
(16, 'Ktorá katedra FEI má najviac študentov? (skratka fakulty)', 'kpi', 'osmaotazka'),
(17, 'Ktorá katedra FEI sídli v budove Park Komenského 3? (skratka fakulty)', 'ktpe', 'deviataotazka'),
(18, 'Ktorá katedra FEI sídli v budove Vysokoškolská 4? (skratka fakulty)', 'kkui', 'desiataotazka'),
(19, 'Na ktorom poschodí Hlavnej budovy je umiestnený OpenLab? (číslom)', '5', 'jedenastaotazka'),
(20, 'Koľko PC je v miestnosti Laboratórium dátovej analytiky? (číslom)', '13', 'dvanastaotazka'),
(21, 'Je v posluchárni ZP1 viac ako 200 miest na sedenie? (áno/nie)', 'áno', 'trinastaotazka'),
(22, 'Ktorý programátorský jazyk učia na FEI študentov ako prvý? (názov)', 'c', 'strnastaotazka'),
(23, 'Ktorý jazyk okrem Rka môžeme ešte použiť na dátovú analytiku? (názov jazyka)', 'python', 'patnastaotazka');

-- --------------------------------------------------------

--
-- Štruktúra tabuľky pre tabuľku `uzivatelia_ss`
--

CREATE TABLE `uzivatelia_ss` (
  `ID` int(11) NOT NULL,
  `Meno` varchar(40) COLLATE utf8_slovak_ci NOT NULL,
  `Heslo` char(30) COLLATE utf8_slovak_ci NOT NULL,
  `Email` varchar(40) COLLATE utf8_slovak_ci NOT NULL,
  `Body` tinyint(10) DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_slovak_ci;

-- --------------------------------------------------------

--
-- Štruktúra tabuľky pre tabuľku `uzivatelia_vs`
--

CREATE TABLE `uzivatelia_vs` (
  `ID` int(11) NOT NULL,
  `Meno` varchar(40) COLLATE utf8_slovak_ci NOT NULL,
  `Heslo` varchar(30) COLLATE utf8_slovak_ci NOT NULL,
  `Email` varchar(40) COLLATE utf8_slovak_ci NOT NULL,
  `Body` tinyint(10) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_slovak_ci;

--
-- Sťahujem dáta pre tabuľku `uzivatelia_vs`
--

INSERT INTO `uzivatelia_vs` (`ID`, `Meno`, `Heslo`, `Email`, `Body`) VALUES
(1, 'Jozef', '123', 'jozo@gmail.com', 34),
(2, 'Janko', '123', 'janik@azet.sk', 1),
(9, 'Kiko', '123', 'kristian@gmail.com', 12),
(4, 'admin', 'admin', 'admin@admin.sk', 0),
(13, 'Juraj32', 'jurajj', 'juro@azet.sk', 35),
(14, 'Juro456', '654', 'j.juraj@gmail.com', 14),
(10, 'Lucka22', 'lucia', 'lucia.k@gmail.com', 5),
(11, 'Iveta', '456', 'ivetka@azet.sk', 33),
(12, 'MartinM', '123', 'mato@gmail.com', 10),
(15, 'patoo', 'patrikk', 'patrik@patrik.sk', 24),
(16, 'Iva99', 'ivanka', 'ivanka@centrum.sk', 17);

--
-- Kľúče pre exportované tabuľky
--

--
-- Indexy pre tabuľku `obmedzenie`
--
ALTER TABLE `obmedzenie`
  ADD PRIMARY KEY (`ID`);

--
-- Indexy pre tabuľku `otazky`
--
ALTER TABLE `otazky`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `ID` (`ID`);

--
-- Indexy pre tabuľku `uzivatelia_ss`
--
ALTER TABLE `uzivatelia_ss`
  ADD PRIMARY KEY (`ID`);

--
-- Indexy pre tabuľku `uzivatelia_vs`
--
ALTER TABLE `uzivatelia_vs`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT pre exportované tabuľky
--

--
-- AUTO_INCREMENT pre tabuľku `obmedzenie`
--
ALTER TABLE `obmedzenie`
  MODIFY `ID` tinyint(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=68;
--
-- AUTO_INCREMENT pre tabuľku `otazky`
--
ALTER TABLE `otazky`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;
--
-- AUTO_INCREMENT pre tabuľku `uzivatelia_ss`
--
ALTER TABLE `uzivatelia_ss`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;
--
-- AUTO_INCREMENT pre tabuľku `uzivatelia_vs`
--
ALTER TABLE `uzivatelia_vs`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
