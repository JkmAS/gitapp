-- phpMyAdmin SQL Dump
-- version 4.4.15.1


SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Databáze: `d48301_gitapp`
--

-- --------------------------------------------------------

--
-- Struktura tabulky `query`
--

CREATE TABLE IF NOT EXISTS `query` (
  `id` int(11) NOT NULL,
  `query` text COLLATE utf8_czech_ci NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `ip` varchar(50) COLLATE utf8_czech_ci DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=87 DEFAULT CHARSET=utf8 COLLATE=utf8_czech_ci;

-- --------------------------------------------------------

--
-- Struktura tabulky `repo`
--

CREATE TABLE IF NOT EXISTS `repo` (
  `id` int(11) NOT NULL,
  `name` varchar(200) COLLATE utf8_czech_ci NOT NULL,
  `description` text COLLATE utf8_czech_ci,
  `url` text COLLATE utf8_czech_ci NOT NULL,
  `stargazers_count` int(11) DEFAULT NULL,
  `language` varchar(100) COLLATE utf8_czech_ci DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `query_id` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=582 DEFAULT CHARSET=utf8 COLLATE=utf8_czech_ci;

--
-- Klíče pro exportované tabulky
--

--
-- Klíče pro tabulku `query`
--
ALTER TABLE `query`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id` (`id`);

--
-- Klíče pro tabulku `repo`
--
ALTER TABLE `repo`
  ADD PRIMARY KEY (`id`),
  ADD KEY `search_id` (`query_id`);

--
-- AUTO_INCREMENT pro tabulky
--

--
-- AUTO_INCREMENT pro tabulku `query`
--
ALTER TABLE `query`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=87;
--
-- AUTO_INCREMENT pro tabulku `repo`
--
ALTER TABLE `repo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=582;
--
-- Omezení pro exportované tabulky
--

--
-- Omezení pro tabulku `repo`
--
ALTER TABLE `repo`
  ADD CONSTRAINT `repo_search` FOREIGN KEY (`query_id`) REFERENCES `query` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;