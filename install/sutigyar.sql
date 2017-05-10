-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Hoszt: localhost
-- Létrehozás ideje: 2017. Máj 10. 15:48
-- Szerver verzió: 5.6.20-log
-- PHP verzió: 5.4.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Adatbázis: `sutigyar`
--

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `osszetevo`
--

CREATE TABLE IF NOT EXISTS `osszetevo` (
`id` int(11) NOT NULL,
  `nev` varchar(255) NOT NULL,
  `torzs` text NOT NULL,
  `slug` varchar(255) NOT NULL,
  `kategoria_id` int(11) NOT NULL,
  `letrehozva` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=9 ;

--
-- A tábla adatainak kiíratása `osszetevo`
--

INSERT INTO `osszetevo` (`id`, `nev`, `torzs`, `slug`, `kategoria_id`, `letrehozva`) VALUES
(1, 'Búza liszt', 'Sime fehér búzaliszt', 'buza-liszt', 1, '2017-04-22 12:36:12'),
(2, 'Rozsliszt', 'rozsliszt', 'rozsliszt', 1, '2017-04-22 12:36:12'),
(3, 'Márkázott vaj', 'Sima márkézott vaj', 'markazott-vaj', 2, '2017-04-22 12:37:36'),
(4, 'Margarin', 'Sime rama margarin', 'margarin', 2, '2017-04-22 12:37:36'),
(5, 'Fehér csokoládé', '<p>Ez egy &uacute;j feh&eacute;r csoki Tescos</p>\r\n', 'Fehér-csokoládé', 3, '2017-04-24 19:23:23'),
(6, 'Graham liszt', '<h1>A Graham liszt t&ouml;rt&eacute;nete</h1>\r\n\r\n<p>Volt Graham aki feltel&aacute;lta ezt a lisztet.</p>\r\n', 'Graham-liszt', 1, '2017-04-25 19:01:45'),
(7, 'Rum aroma', '<p>Rum aroma a rumot helyettes&iacute;ti</p>\r\n', 'Rum-aroma', 6, '2017-04-26 20:47:51'),
(8, 'Étcsokoládé', '<p>K&ouml;z&ouml;ns&eacute;ges &eacute;tcsokol&aacute;d&eacute;</p>\r\n', 'Étcsokoládé', 3, '2017-04-27 07:00:09');

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `osszetevo_kategoriak`
--

CREATE TABLE IF NOT EXISTS `osszetevo_kategoriak` (
`id` int(11) NOT NULL,
  `nev` varchar(255) NOT NULL
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

--
-- A tábla adatainak kiíratása `osszetevo_kategoriak`
--

INSERT INTO `osszetevo_kategoriak` (`id`, `nev`) VALUES
(1, 'Lisztek'),
(2, 'Vajfélék'),
(3, 'Csokoládék'),
(4, 'Gyümölcsök'),
(5, 'Tészták'),
(6, 'Aromák');

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `receptek`
--

CREATE TABLE IF NOT EXISTS `receptek` (
`id` int(11) NOT NULL,
  `cim` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `torzs` text NOT NULL,
  `letrehozva` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='Receptek táblája' AUTO_INCREMENT=3 ;

--
-- A tábla adatainak kiíratása `receptek`
--

INSERT INTO `receptek` (`id`, `cim`, `slug`, `torzs`, `letrehozva`) VALUES
(1, 'Süti 1', 'suti-1', 'Ez az első süti az adatbázisban, mindenki nagyon örül neki. Finom édes lekváros. Nagyanyáink receptje alapján készíthetjük el ezt a finomságot. Sok szöveg kéne ide és nem nagyon jut már eszembe semmi más. Remélem ennyi elég lesz ebbe a mezőbe. Ampi már megint brümmög.', '2017-04-20 13:13:46'),
(2, 'Süti 2', 'suti-2', 'A Lorem Ipsum egy egyszerû szövegrészlete, szövegutánzata a betûszedõ és nyomdaiparnak. A Lorem Ipsum az 1500-as évek óta standard szövegrészletként szolgált az iparban; mikor egy ismeretlen nyomdász összeállította a betûkészletét és egy példa-könyvet vagy szöveget nyomott papírra, ezt használta. Nem csak 5 évszázadot élt túl, de az elektronikus betûkészleteknél is változatlanul megmaradt. Az 1960-as években népszerûsítették a Lorem Ipsum részleteket magukbafoglaló Letraset lapokkal, és legutóbb softwarekkel mint például az Aldus Pagemaker.', '2017-04-20 13:16:41');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `osszetevo`
--
ALTER TABLE `osszetevo`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `osszetevo_kategoriak`
--
ALTER TABLE `osszetevo_kategoriak`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `receptek`
--
ALTER TABLE `receptek`
 ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `osszetevo`
--
ALTER TABLE `osszetevo`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `osszetevo_kategoriak`
--
ALTER TABLE `osszetevo_kategoriak`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `receptek`
--
ALTER TABLE `receptek`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
