-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Maj 12, 2024 at 04:05 PM
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
-- Struktura tabeli dla tabeli `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `nazwa` varchar(100) NOT NULL,
  `image` varchar(150) NOT NULL,
  `opis` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_polish_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `nazwa`, `image`, `opis`) VALUES
(7, 'Głośniki', 'images/głośniki.png', ''),
(8, 'Słuchawki', 'images/słuchawki.png', ''),
(9, 'Smartfony', 'images/smartfony.png', ''),
(11, 'Zegarki', 'images/zegarki.png', ''),
(12, 'Laptopy', 'images/laptopy.png', '');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `opis`
--

CREATE TABLE `opis` (
  `id` int(11) NOT NULL,
  `wyswietlacz` varchar(100) DEFAULT NULL,
  `procesor` varchar(100) DEFAULT NULL,
  `pamiec_wbudowana` varchar(50) DEFAULT NULL,
  `ram` varchar(30) DEFAULT NULL,
  `komunikacja` varchar(100) DEFAULT NULL,
  `product_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_polish_ci;

--
-- Dumping data for table `opis`
--

INSERT INTO `opis` (`id`, `wyswietlacz`, `procesor`, `pamiec_wbudowana`, `ram`, `komunikacja`, `product_id`) VALUES
(1, '6.1\", 120HZ, 2556 x 1179px, Super Retina XDR, OLED', 'Apple A17 Pro, Sześciordzeniowy', '256 GB', '8 GB', '5G, Wi-Fi, NFC, Bluetooth 5.3, USB type C', 1),
(4, '6.8\", 3120 x 1440px, Dynamic AMOLED 2X', 'Qualcomm Snapdragon 8 Gen 3, Ośmiordzeniowy', '512 GB', '12 GB', '5G, Wi-Fi, NFC, Bluetooth 5.3, USB typ C', 2),
(5, NULL, NULL, NULL, NULL, NULL, 2);

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
  `opis` varchar(1000) NOT NULL,
  `category_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_polish_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`products_id`, `category`, `firma`, `model`, `price`, `image`, `colour`, `memory`, `opis`, `category_id`) VALUES
(1, 'Smartfon', 'Apple', 'IPhone 15 Pro', 6499, 'images/iphone_15pro_tytan.jpg', 'Tytan czarny', '256GB', 'Wyświetlacz: 6.1\", 2556 x 1179px, Super Retina XDR, OLED\r\n\r\nPamięć wbudowana [GB]: 256\r\nProcesor: Apple A17 Pro, Sześciordzeniowy\r\nAparat: Tylny 2x12 Mpx + 48 Mpx, Przedni 12 Mpx\r\nKomunikacja: 5G, Wi-Fi, NFC, Bluetooth 5.3, USB typ C\r\nWersja systemu: iOS 17', 9),
(2, 'Smartfon', 'Samsung', 'S24 Ultra', 6999, 'images/Samsung_s24ultra_żółty.jpg', 'Zółty', '512GB', '', 9),
(3, 'słuchawki', 'Samsung', 'Galaxy Buds Pro ANC', 899, 'images/samsung_budsproanc_czarny.jpg', 'Czarne', '', '', 8),
(4, 'Smartfon', 'Apple', 'IPhone 15 Pro', 7649, 'images/iphone_15pro_tytan.jpg', 'Tytan czarny', '512GB', '', 9),
(7, 'Głośnik', 'JBL', 'Boombox 3', 1839, 'images/jbl_boombox3_kamuflaż.jpg', 'Kamuflaż', '', '', 7),
(8, 'Głośnik', 'JBL', 'Partybox Ultimate', 6499, 'images/jbl_partyboxultimate.jpg', '', '', '', 7),
(9, 'Słuchawki', 'Apple', 'AirPods Pro 2', 1149, 'images/airpods_pro2_.jpg', '', '', '', 8),
(10, 'Smartfon', 'Apple', 'IPhone 14', 3185, 'images/iphone_14_księżycowa poświata.jpg', 'Księżycowa poświata', '128GB', '', 9),
(22, 'Zegarek', 'Apple', 'Watch Series 8', 2199, 'images/applewatch_8.jpg', 'Północ', '32 GB', '', 11),
(23, 'Laptop', 'Lenovo', 'Legion 9 16IRX8', 19999, 'images/lenovo.jpg', 'Szary', '32 GB RAM', '', 12);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `users`
--

CREATE TABLE `users` (
  `users_id` int(111) UNSIGNED NOT NULL,
  `login` varchar(50) NOT NULL,
  `pass` varchar(32) NOT NULL,
  `pu` smallint(6) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`users_id`, `login`, `pass`, `pu`) VALUES
(17, 'admin', '26a3175e8cb5d39d9dcbea23e209386c', 1),
(16, 'mup', '59a28c84a59f3ad59cd5f9087edd9ed6', 0),
(15, 'query', 'efb2233fa45e9f8f9cfff245a9b9f1ad', 0),
(14, 'lena', 'd1202c6d451fb600a1accbd6a10067ed', 0),
(13, 'vasya', '013cf400ec861752b404416fff2432f1', 0),
(12, 'timlion', '80d4ad8f28a07ee27c5270f62704421b', 0);

--
-- Indeksy dla zrzutów tabel
--

--
-- Indeksy dla tabeli `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `opis`
--
ALTER TABLE `opis`
  ADD PRIMARY KEY (`id`),
  ADD KEY `products_id` (`product_id`);

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
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `opis`
--
ALTER TABLE `opis`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `products_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `users_id` int(111) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `opis`
--
ALTER TABLE `opis`
  ADD CONSTRAINT `opis_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `products` (`products_id`);

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
