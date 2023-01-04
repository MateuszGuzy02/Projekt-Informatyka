-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Czas generowania: 04 Sty 2023, 15:05
-- Wersja serwera: 10.4.25-MariaDB
-- Wersja PHP: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Baza danych: `text`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `artykuly`
--

CREATE TABLE `artykuly` (
  `id` int(11) NOT NULL,
  `tytul` varchar(255) NOT NULL,
  `tresc` longtext NOT NULL,
  `data_utworzenia` datetime NOT NULL,
  `data_zmiany` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `akt` int(1) NOT NULL,
  `id_autora` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Zrzut danych tabeli `artykuly`
--

INSERT INTO `artykuly` (`id`, `tytul`, `tresc`, `data_utworzenia`, `data_zmiany`, `akt`, `id_autora`) VALUES
(8, 'Autorzy strony', '        Jesteśmy studentami pierwszego roku Informatyki Przemysłowej. Jest to nasz pierwszy projekt. Celem naszego projektu było nauczenie się komunikacji z bazą danych oraz przeniesienia tego na stronę internetową. \r\nAutorzy: Mateusz Guzy, Mateusz Kral    ', '2023-01-04 14:46:45', '2023-01-04 14:50:37', 1, 4),
(9, 'The standard Lorem Ipsum passage, used since the 1500s', '                Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.        ', '2023-01-04 14:49:29', '2023-01-04 14:50:24', 1, 4),
(10, '1914 translation by H. Rackham', 'But I must explain to you how all this mistaken idea of denouncing pleasure and praising pain was born and I will give you a complete account of the system, and expound the actual teachings of the great explorer of the truth, the master-builder of human happiness. No one rejects, dislikes, or avoids pleasure itself, because it is pleasure, but because those who do not know how to pursue pleasure rationally encounter consequences that are extremely painful.', '2023-01-04 14:51:25', '2023-01-04 14:51:26', 1, 4),
(11, 'Section 1.10.32 of \"de Finibus Bonorum et Malorum\", written by Cicero in 45 BC', 'Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem.', '2023-01-04 14:52:10', '2023-01-04 14:52:11', 1, 4);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `kontakt`
--

CREATE TABLE `kontakt` (
  `id` int(11) NOT NULL,
  `imie` varchar(40) NOT NULL,
  `temat` varchar(40) NOT NULL,
  `wiadomosc` longtext NOT NULL,
  `data_wyslania` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Zrzut danych tabeli `kontakt`
--

INSERT INTO `kontakt` (`id`, `imie`, `temat`, `wiadomosc`, `data_wyslania`) VALUES
(1, 'Mateusz', 'Kontakt', 'Kontakt', '2023-01-03 22:06:55');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `logowanie`
--

CREATE TABLE `logowanie` (
  `id` int(11) NOT NULL,
  `login` varchar(40) NOT NULL,
  `haslo` varchar(255) NOT NULL,
  `grupa` varchar(40) NOT NULL,
  `imie` varchar(40) NOT NULL,
  `nazwisko` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Zrzut danych tabeli `logowanie`
--

INSERT INTO `logowanie` (`id`, `login`, `haslo`, `grupa`, `imie`, `nazwisko`) VALUES
(1, 'mateusz', 'C74780982FCA069D559E5C78B4677476DC80851C', 'U', 'Mateusz', 'Guzy'),
(4, 'admin', 'd033e22ae348aeb5660fc2140aec35850c4da997', 'A', 'root', 'root'),
(6, 'Jan', '3d9b3da5fa51298098772e6d01fb92f7bc46dcf4', 'U', 'Jan', 'Kowalski'),
(13, 'Adam', 'aa898cb451da3872f3fc25cc03d793ba36ecec53', 'U', 'Adam', 'Nowak');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `onas`
--

CREATE TABLE `onas` (
  `id` int(11) NOT NULL,
  `tytul` varchar(255) NOT NULL,
  `tresc` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Zrzut danych tabeli `onas`
--

INSERT INTO `onas` (`id`, `tytul`, `tresc`) VALUES
(1, 'O nas', '                               Jesteśmy studentami pierwszego roku Informatyki Przemysłowej na Politechnice Śląskiej w Katowicach.');

--
-- Indeksy dla zrzutów tabel
--

--
-- Indeksy dla tabeli `artykuly`
--
ALTER TABLE `artykuly`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `kontakt`
--
ALTER TABLE `kontakt`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `logowanie`
--
ALTER TABLE `logowanie`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `onas`
--
ALTER TABLE `onas`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT dla zrzuconych tabel
--

--
-- AUTO_INCREMENT dla tabeli `artykuly`
--
ALTER TABLE `artykuly`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT dla tabeli `kontakt`
--
ALTER TABLE `kontakt`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT dla tabeli `logowanie`
--
ALTER TABLE `logowanie`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT dla tabeli `onas`
--
ALTER TABLE `onas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
