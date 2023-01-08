-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Czas generowania: 08 Sty 2023, 17:26
-- Wersja serwera: 10.4.24-MariaDB
-- Wersja PHP: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Baza danych: `portal2`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `user_login` varchar(25) COLLATE utf8mb4_polish_ci NOT NULL,
  `user_pass` varchar(64) COLLATE utf8mb4_polish_ci NOT NULL,
  `user_email` varchar(50) COLLATE utf8mb4_polish_ci NOT NULL,
  `usr_name` varchar(25) COLLATE utf8mb4_polish_ci NOT NULL,
  `user_surname` varchar(32) COLLATE utf8mb4_polish_ci NOT NULL,
  `user_addr` varchar(50) COLLATE utf8mb4_polish_ci NOT NULL,
  `user_acn` varchar(26) COLLATE utf8mb4_polish_ci NOT NULL,
  `user_perm` int(3) NOT NULL,
  `user_aa` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_polish_ci;

--
-- Zrzut danych tabeli `users`
--

INSERT INTO `users` (`user_id`, `user_login`, `user_pass`, `user_email`, `usr_name`, `user_surname`, `user_addr`, `user_acn`, `user_perm`, `user_aa`) VALUES
(1, 'Admin', '$2y$10$M8ghz/0DQHrBJTiEbO2fsO3MPUnpSWdUe6FtV5./DtdMcaCYRGCfS', 'szymon.nowacki@portal.pl', 'Szymon', 'Nowacki', 'Dąbrowskiego 27 10-123 Poznań', '49102028922276300500000000', 3, 1),
(2, 'Admin2', '$2y$10$xKeqNBWE44w6GSdUznrEqObyM4Sp7qQQIukyZj9wN1jvRdV.TtrCK', 'hubert.moscicki@portal.pl', 'Hubert', 'Mościcki', 'os. Adminów 1/2 60-700 Poznań', '49102028922276300500000001', 3, 1),
(3, 'Kierownik', '$2y$10$WCtlsqD./Nhy9GcuTeZ7W.JzxvE2FsxaIjQvimwOT.OfFyj51ocMC', 'kierownik@portal.pl', 'Tomasz', 'Działowy', 'Kierowników 10/5 60-100 Poznań', '49102028922276300500000003', 2, 1),
(4, 'Pracownik1', '$2y$10$dqtLwKJ9O0xo4q3ACeoO2eodx9c8bv8SpHczTyhk8s4i8QrRbcqLq', 'pracownik1@portal.pl', 'Michał', 'Spychała', 'Ul. Wojska Polskiego 12/10 30-123 Poznań', '49102028922276300500000004', 1, 0),
(5, 'Pracownik2', '$2y$10$qjffAmv.phb3kr9vJRvvheeMPw7JzTdLOanF.F9LDMF3/e6G8MOg6', 'pracownik2@portal.pl', 'Maciej', 'Krotoszyński', 'Ul. Jana Pawła II 21/37 30-123 Poznań', '49102028922276300500000005', 1, 1),
(6, 'Pracownik3', '$2y$10$xas8Dwq/2QO/G89gy3fco.PLTpATkBsuqibDg80kYqFkIY/W3ou/m', 'pracownik3@portal.pl', 'Jurek', 'Ogórek', 'Os. Rataje 17/10 01-100 Poznań', '49102028922276300500000006', 1, 1);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `work`
--

CREATE TABLE `work` (
  `work_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `data` date NOT NULL,
  `czas` int(2) NOT NULL,
  `komentarz` varchar(255) COLLATE utf8mb4_polish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_polish_ci;

--
-- Zrzut danych tabeli `work`
--

INSERT INTO `work` (`work_id`, `user_id`, `data`, `czas`, `komentarz`) VALUES
(16, 1, '2022-12-27', 12, 'Super praca'),
(17, 2, '2022-12-15', 8, 'Super praca'),
(18, 3, '2022-12-21', 1, 'Co za nierób'),
(19, 5, '2022-12-31', 8, 'Solidna robota'),
(20, 6, '2022-12-27', 8, '10/10');

--
-- Indeksy dla zrzutów tabel
--

--
-- Indeksy dla tabeli `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- Indeksy dla tabeli `work`
--
ALTER TABLE `work`
  ADD PRIMARY KEY (`work_id`);

--
-- AUTO_INCREMENT dla zrzuconych tabel
--

--
-- AUTO_INCREMENT dla tabeli `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT dla tabeli `work`
--
ALTER TABLE `work`
  MODIFY `work_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
