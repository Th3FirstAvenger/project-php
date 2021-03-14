-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Servidor: db
-- Temps de generació: 01-03-2021 a les 18:10:28
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
  `categoria` varchar(50) NOT NULL,
  `descripcio` varchar(500) NOT NULL,
  `preu` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Bolcament de dades per a la taula `classes`
--

INSERT INTO `classes` (`id`, `assignatura`, `categoria`, `descripcio`, `preu`) VALUES
(1, 'PHP PARA PRINCIPIANTES', 'CODING LANGUAGE', 'Curso de PHP para aprender la nociones básicas del lenguaje', 20),
(2, 'PYTHON PARA PRINCIPIANTES', 'CODING LANGUAGE', 'Curso de Python para aprender la nociones básicas del lenguaje', 50),
(3, 'SCRIPTING EN BASH PARA PRINCIPIANTES', 'CODING LANGUAGE', 'Curso de bash para aprender la nociones básicas del lenguaje', 90),
(4, 'CERTIFICADO CEH', 'HACKING', 'La formación CEH versión 11 (CEHv11) dedica más de la mitad del curso a habilidades prácticas a través de los laboratorios de EC-Council y su certificación está considerada una de las más avanzadas del mundo en materia de Hacking Ético y Auditoria de Seguridad de Sistemas Informáticos.', 250.5),
(5, 'DOCKER PARA DESARROLLADORES', 'DEVELOPMENT', 'Curso de Docker para aprender el funcionamiento de esta herramienta', 150),
(6, 'OSINT', 'HACKING', 'Este curso se centra en el tratamiento de datos recogidos de fuentes disponibles de forma pública para ser utilizados en un contexto de inteligencia', 80),
(7, 'HTML Y CSS', 'MARKUP LANGUAGE', 'Curso para aprender las nociones básicas del lenguaje y sus utilidades', 170),
(8, 'MARKDOWN', 'MARKUP LANGUAGE', 'Curso para aprender las nociones básicas del lenguaje y sus utilidades', 60),
(9, 'RUBY', 'CODING LANGUAGE', 'Curso para aprender las nociones básicas del lenguaje y sus utilidades', 120),
(10, 'KUBERNETES PARA DESARROLLADORES', 'DEVELOPMENT', 'Este curso se centra en la automatización del despliegue, ajuste de escala y manejo de aplicaciones en contenedores usando kubernetes', 100),
(11, 'JAVASCRIPT', 'CODING LANGUAGE', 'Curso de JavaScript, dirigido a personas con conocimientos previos de programación, para aprender a programar con este lenguaje.', 120),
(12, 'INTRODUCCION A TCP/IP', 'INTERNET', 'Curso para comprender las características principales de los protocolos TCP/IP para ser capaz de configurar y utilizar configuraciones de red básicas.', 30),
(13, 'SSH', 'FILE TRANSFER', 'Curso para entender el protocolo SSH y como utilizarlo para la transferencia de ficheros.', 70),
(14, 'FTP', 'FILE TRANSFER', ' Curso para entender el protocolo FTP y como utilizarlo para la transferencia de ficheros.', 30),
(15, 'INTRODUCCION A LA INGENIERIA SOCIAL ', 'HACKING', 'Curso para entender los fundamentos y la importancia de la ingeniería social en el ámbito de la ciberseguridad.', 50),
(16, 'INGENIERIA SOCIAL AVANZADA', 'HACKING', 'Curso para aprender a aplicar ingeniería social en técnicas de pentesting y auditorías.', 150),
(17, 'INGENIERIA INVERSA', 'HACKING', 'Curso para aprender a descubrir los principios tecnológicos de un objeto, herramienta, dispositivo o sistema.', 160),
(18, 'CRIPTOGRAFIA APLICADA', 'CRYPTOGRAPHY', 'Curso para aprender a aplicar protocolos de protección de la información en los sistemas informáticos mediante diferentes métodos criptográficos.', 65),
(19, 'METASPLOIT', 'HACKING', 'Curso para aprender a utilizar Metasploit, el framework de herramientas más usado para hacer pentesting. ', 125),
(20, 'CERTIFICADO eJPT', 'HACKING', 'Curso para obtener el certificado oficial de Pentester Junior', 250.5);

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
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
