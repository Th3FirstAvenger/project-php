-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Servidor: db
-- Temps de generació: 24-02-2021 a les 16:48:45
-- Versió del servidor: 8.0.23
-- Versió de PHP: 7.4.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de dades: `elearning`
--

-- --------------------------------------------------------

--
-- Estructura de la taula `administradors`
--

CREATE TABLE `administradors` (
  `username` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Bolcament de dades per a la taula `administradors`
--

INSERT INTO `administradors` (`username`, `password`, `email`) VALUES
('marc', '1234QWer', 'marc.hortelano@gmai.com');

-- --------------------------------------------------------

--
-- Estructura de la taula `classes`
--

CREATE TABLE `classes` (
  `id` int NOT NULL,
  `assignatura` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `categoria` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Bolcament de dades per a la taula `classes`
--

INSERT INTO `classes` (`id`, `assignatura`, `categoria`) VALUES
(1, 'Curso php basico', 'php');

-- --------------------------------------------------------

--
-- Estructura de la taula `users`
--

CREATE TABLE `users` (
  `username` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(32) NOT NULL,
  `permissions` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Bolcament de dades per a la taula `users`
--

INSERT INTO `users` (`username`, `email`, `password`, `permissions`) VALUES
('ernest', 'ernest', '81dc9bdb52d04dc20036dbd8313ed055', 'student'),
('irene', 'irene@itb.cat', '81dc9bdb52d04dc20036dbd8313ed055', 'teacher'),
('isaac', 'isaac@itb.cat', '81dc9bdb52d04dc20036dbd8313ed055', 'student'),
('test', 'test@itb.cat', '81dc9bdb52d04dc20036dbd8313ed055', 'teacher');

--
-- Índexs per a les taules bolcades
--

--
-- Índexs per a la taula `administradors`
--
ALTER TABLE `administradors`
  ADD PRIMARY KEY (`username`,`email`);

--
-- Índexs per a la taula `classes`
--
ALTER TABLE `classes`
  ADD PRIMARY KEY (`id`);

--
-- Índexs per a la taula `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`username`,`email`);

--
-- AUTO_INCREMENT per les taules bolcades
--

--
-- AUTO_INCREMENT per la taula `administradors`
--
ALTER TABLE `administradors`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT per la taula `classes`
--
ALTER TABLE `classes`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
