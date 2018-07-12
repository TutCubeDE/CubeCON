-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Erstellungszeit: 12. Jul 2018 um 23:56
-- Server-Version: 10.1.21-MariaDB
-- PHP-Version: 7.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Datenbank: `tutcubede`
--

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `eintraege`
--

CREATE TABLE `eintraege` (
  `eintrag_id` int(11) NOT NULL,
  `datum` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `headline` varchar(150) CHARACTER SET utf8 NOT NULL,
  `eintrag` text CHARACTER SET utf8 NOT NULL,
  `autor` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Daten für Tabelle `eintraege`
--

INSERT INTO `eintraege` (`eintrag_id`, `datum`, `headline`, `eintrag`, `autor`) VALUES
(1, '2010-10-13 22:00:00', 'Hallo Welt und Welt', '<p>Haha Testnews Hallo Welt Welt Welteeeeeeee</p>', 1),
(3, '2018-07-09 20:00:00', 'Weitere Videos', '<p>Es geht endlich weiter - die Reihe wird fortgesetzt! Schreibt mir, was ihr sehen wollt. :)</p>', 1);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `sites`
--

CREATE TABLE `sites` (
  `id` int(11) NOT NULL,
  `name_file` varchar(255) NOT NULL,
  `name_link` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Daten für Tabelle `sites`
--

INSERT INTO `sites` (`id`, `name_file`, `name_link`, `title`) VALUES
(1, 'startseite', 'home', 'Home'),
(2, 'videos', 'videos', 'Videos'),
(3, 'ueber_mich', 'ueber_mich', 'Über mich'),
(4, 'impressum', 'impressum', 'Impressum'),
(5, 'login', 'login', 'Login');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `email` varchar(200) CHARACTER SET utf8 NOT NULL,
  `passwort` varchar(200) CHARACTER SET utf8 NOT NULL,
  `vorname` varchar(200) CHARACTER SET utf8 NOT NULL,
  `nachname` varchar(200) CHARACTER SET utf8 NOT NULL,
  `session` varchar(26) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Daten für Tabelle `users`
--

INSERT INTO `users` (`user_id`, `email`, `passwort`, `vorname`, `nachname`, `session`) VALUES
(1, 'info@tutcube.de', '84ace9c3ed43280df785e1b6bff8c9f901761012', 'Timo', 'Jeske', '');

--
-- Indizes der exportierten Tabellen
--

--
-- Indizes für die Tabelle `eintraege`
--
ALTER TABLE `eintraege`
  ADD PRIMARY KEY (`eintrag_id`),
  ADD KEY `autor` (`autor`);

--
-- Indizes für die Tabelle `sites`
--
ALTER TABLE `sites`
  ADD PRIMARY KEY (`id`);

--
-- Indizes für die Tabelle `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT für exportierte Tabellen
--

--
-- AUTO_INCREMENT für Tabelle `eintraege`
--
ALTER TABLE `eintraege`
  MODIFY `eintrag_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT für Tabelle `sites`
--
ALTER TABLE `sites`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT für Tabelle `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- Constraints der exportierten Tabellen
--

--
-- Constraints der Tabelle `eintraege`
--
ALTER TABLE `eintraege`
  ADD CONSTRAINT `eintraege_ibfk_1` FOREIGN KEY (`autor`) REFERENCES `users` (`user_id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
