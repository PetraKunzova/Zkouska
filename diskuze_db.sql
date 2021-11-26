-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Počítač: 127.0.0.1
-- Vytvořeno: Pát 26. lis 2021, 08:31
-- Verze serveru: 10.4.17-MariaDB
-- Verze PHP: 8.0.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Databáze: `diskuze_db`
--

-- --------------------------------------------------------

--
-- Struktura tabulky `zprava`
--

CREATE TABLE `zprava` (
  `zprava` int(11) NOT NULL,
  `prezdivka` varchar(40) COLLATE utf8_czech_ci NOT NULL,
  `obsah` text COLLATE utf8_czech_ci NOT NULL,
  `odeslano` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_czech_ci;

--
-- Vypisuji data pro tabulku `zprava`
--

INSERT INTO `zprava` (`zprava`, `prezdivka`, `obsah`, `odeslano`) VALUES
(19, 'Petty PK', 'Ahoj', '2021-11-25 21:40:34'),
(20, 'PK', 'Ahoj. Jak je?', '2021-11-25 22:09:57'),
(21, 'Petty PK', 'Nic moc.', '2021-11-25 22:53:45'),
(22, 'PK', 'Jak to? ', '2021-11-25 23:21:49'),
(23, 'Petty PK', 'Chtěla jsem udělat větší projekt podle MVC a zjistila jsem, že mi to blokuje soubor .htacces. Prostě projekt s tímhle souborem mi už jen cvičně na ide, ale i na produkci hází error. ', '2021-11-25 23:29:45'),
(24, 'PK', 'A ptala jsi se někde? ', '2021-11-25 23:39:54'),
(25, 'Petty PK', 'To jsem nestihla. Prvně jsem koukala po internetu po možné odpovědi a žádnou nenašla. To že je to velký problém jsem zjistila až ve čtvrtek, kdy jsem otestovala všechny dostupné projekty. I ty z archivu itnetwork. U všech my to hlásilo : nenalezeno nebo systémovou chybu.', '2021-11-25 23:43:55');

--
-- Klíče pro exportované tabulky
--

--
-- Klíče pro tabulku `zprava`
--
ALTER TABLE `zprava`
  ADD PRIMARY KEY (`zprava`);

--
-- AUTO_INCREMENT pro tabulky
--

--
-- AUTO_INCREMENT pro tabulku `zprava`
--
ALTER TABLE `zprava`
  MODIFY `zprava` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
