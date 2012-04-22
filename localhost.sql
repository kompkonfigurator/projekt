-- phpMyAdmin SQL Dump
-- version 3.4.5
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Czas wygenerowania: 18 Kwi 2012, 12:50
-- Wersja serwera: 5.5.16
-- Wersja PHP: 5.3.8

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Baza danych: `kohana`
--
CREATE DATABASE `kohana` DEFAULT CHARACTER SET utf8 COLLATE utf8_polish_ci;
USE `kohana`;

-- --------------------------------------------------------

--
-- Struktura tabeli dla  `konfiguracja`
--

CREATE TABLE IF NOT EXISTS `konfiguracja` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_plyta` int(11) DEFAULT NULL,
  `id_procesor` int(11) DEFAULT NULL,
  `id_pamiec` int(11) DEFAULT NULL,
  `id_pamiec2` int(11) DEFAULT NULL,
  `id_karta_graf` int(11) DEFAULT NULL,
  `id_dysk` int(11) DEFAULT NULL,
  `id_dysk2` int(11) DEFAULT NULL,
  `id_obudowa` int(11) DEFAULT NULL,
  `id_zasilacz` int(11) DEFAULT NULL,
  `id_naped` int(11) DEFAULT NULL,
  `id_karta_muz` int(11) DEFAULT NULL,
  `id_klawiatura` int(11) DEFAULT NULL,
  `id_mysz` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci AUTO_INCREMENT=3 ;

-- --------------------------------------------------------

--
-- Struktura tabeli dla  `produkty`
--

CREATE TABLE IF NOT EXISTS `produkty` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_nokaut` bigint(11) NOT NULL,
  `name` text COLLATE utf8_polish_ci NOT NULL,
  `shop_count` int(11) NOT NULL,
  `offer_count` int(11) NOT NULL,
  `price_min` text COLLATE utf8_polish_ci NOT NULL,
  `price_max` text COLLATE utf8_polish_ci NOT NULL,
  `price_avg` text COLLATE utf8_polish_ci NOT NULL,
  `url` text COLLATE utf8_polish_ci NOT NULL,
  `opis` text COLLATE utf8_polish_ci NOT NULL,
  `socket` text COLLATE utf8_polish_ci NOT NULL,
  `typ_pamieci` text COLLATE utf8_polish_ci NOT NULL,
  `co` text COLLATE utf8_polish_ci NOT NULL,
  `image_mini` text COLLATE utf8_polish_ci NOT NULL,
  `image_medium` text COLLATE utf8_polish_ci NOT NULL,
  `image_large` text COLLATE utf8_polish_ci NOT NULL,
  `rate` text COLLATE utf8_polish_ci NOT NULL,
  `thumbnail` text COLLATE utf8_polish_ci NOT NULL,
  `image` text COLLATE utf8_polish_ci NOT NULL,
  `found` text COLLATE utf8_polish_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci AUTO_INCREMENT=1457 ;

-- --------------------------------------------------------

--
-- Struktura tabeli dla  `produkty_sklepy`
--

CREATE TABLE IF NOT EXISTS `produkty_sklepy` (
  `id_sklep` bigint(11) NOT NULL,
  `id_produkt` bigint(11) NOT NULL,
  `price` text COLLATE utf8_polish_ci NOT NULL,
  `availability` int(11) NOT NULL,
  `price_delivery` text COLLATE utf8_polish_ci NOT NULL,
  `direct_click_url` text COLLATE utf8_polish_ci NOT NULL,
  `image` text COLLATE utf8_polish_ci NOT NULL,
  `found` text COLLATE utf8_polish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

-- --------------------------------------------------------

--
-- Struktura tabeli dla  `roles`
--

CREATE TABLE IF NOT EXISTS `roles` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(32) NOT NULL,
  `description` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `uniq_name` (`name`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

-- --------------------------------------------------------

--
-- Struktura tabeli dla  `roles_users`
--

CREATE TABLE IF NOT EXISTS `roles_users` (
  `user_id` int(10) unsigned NOT NULL,
  `role_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`user_id`,`role_id`),
  KEY `fk_role_id` (`role_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Struktura tabeli dla  `sklepy`
--

CREATE TABLE IF NOT EXISTS `sklepy` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_nokaut` bigint(11) NOT NULL,
  `shop_name` text COLLATE utf8_polish_ci NOT NULL,
  `shop_logo` text COLLATE utf8_polish_ci NOT NULL,
  `shop_id` text COLLATE utf8_polish_ci NOT NULL,
  `shop_url` text COLLATE utf8_polish_ci NOT NULL,
  `found` text COLLATE utf8_polish_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci AUTO_INCREMENT=131 ;

-- --------------------------------------------------------

--
-- Struktura tabeli dla  `user_tokens`
--

CREATE TABLE IF NOT EXISTS `user_tokens` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) unsigned NOT NULL,
  `user_agent` varchar(40) NOT NULL,
  `token` varchar(40) NOT NULL,
  `type` varchar(100) NOT NULL,
  `created` int(10) unsigned NOT NULL,
  `expires` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `uniq_token` (`token`),
  KEY `fk_user_id` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Struktura tabeli dla  `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `email` varchar(127) NOT NULL,
  `username` varchar(32) NOT NULL DEFAULT '',
  `password` varchar(64) NOT NULL,
  `logins` int(10) unsigned NOT NULL DEFAULT '0',
  `last_login` int(10) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `uniq_username` (`username`),
  UNIQUE KEY `uniq_email` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Ograniczenia dla zrzutów tabel
--

--
-- Ograniczenia dla tabeli `roles_users`
--
ALTER TABLE `roles_users`
  ADD CONSTRAINT `roles_users_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `roles_users_ibfk_2` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Ograniczenia dla tabeli `user_tokens`
--
ALTER TABLE `user_tokens`
  ADD CONSTRAINT `user_tokens_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
