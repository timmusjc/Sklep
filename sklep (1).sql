-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 26, 2024 at 04:27 PM
-- Wersja serwera: 10.4.32-MariaDB
-- Wersja PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sklep`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `image` varchar(150) NOT NULL,
  `opis` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_polish_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `name`, `image`, `opis`) VALUES
(3, 'głośniki', '', '');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `products`
--

CREATE TABLE `products` (
  `products_id` int(11) NOT NULL,
  `category` varchar(100) NOT NULL,
  `firma` varchar(100) NOT NULL,
  `model` varchar(150) NOT NULL,
  `price` int(100) NOT NULL,
  `image` varchar(150) NOT NULL,
  `colour` varchar(100) NOT NULL,
  `memory` varchar(100) NOT NULL,
  `category_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_polish_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`products_id`, `category`, `firma`, `model`, `price`, `image`, `colour`, `memory`, `category_id`) VALUES
(1, 'telefon', 'Apple', 'IPhone 15 Pro', 6499, 'images/iphone_15pro_tytan.jpg', 'Tytan czarny', '256GB', 0),
(2, 'telefon', 'Samsung', 'S24 Ultra', 6999, 'images/Samsung_s24ultra_żółty.jpg', 'Zółty', '512GB', 0),
(3, 'słuchawki', 'Samsung', 'Galaxy Buds Pro ANC', 899, 'images/samsung_budsproanc_czarny.jpg', 'Czarne', '', 0),
(4, 'telefon', 'Apple', 'IPhone 15 Pro', 6499, 'images/iphone_15pro_tytan.jpg', 'Tytan czarny', '512GB', 0),
(7, 'Głośnik', 'JBL', 'Boombox 3', 1839, 'images/jbl_boombox3_kamuflaż.jpg', 'Kamuflaż', '', 0),
(8, 'głośnik', 'JBL', 'Partybox Ultimate', 6499, 'images/jbl_partyboxultimate.jpg', '', '', 0),
(9, 'słuchawki', 'Apple', 'AirPods Pro 2', 1149, 'images/airpods_pro2_.jpg', '', '', 0),
(10, 'telefon', 'Apple', 'IPhone 14', 3185, 'images/iphone_14_księżycowa poświata.jpg', 'Księżycowa poświata', '128GB', 0);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `users`
--

CREATE TABLE `users` (
  `users_id` int(111) UNSIGNED NOT NULL,
  `login` varchar(50) NOT NULL,
  `pass` varchar(32) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`users_id`, `login`, `pass`) VALUES
(16, 'mup', '59a28c84a59f3ad59cd5f9087edd9ed6'),
(15, 'query', 'efb2233fa45e9f8f9cfff245a9b9f1ad'),
(14, 'lena', 'd1202c6d451fb600a1accbd6a10067ed'),
(13, 'vasya', '013cf400ec861752b404416fff2432f1'),
(12, 'timlion', '80d4ad8f28a07ee27c5270f62704421b');

--
-- Indeksy dla zrzutów tabel
--

--
-- Indeksy dla tabeli `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`products_id`),
  ADD KEY `category_id` (`category_id`),
  ADD KEY `category_id_2` (`category_id`);

--
-- Indeksy dla tabeli `users`
--
ALTER TABLE `users`
  ADD UNIQUE KEY `id` (`users_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `products_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `users_id` int(111) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
