-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 27-05-2025 a las 19:58:24
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `proyectopi`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `formulario`
--

CREATE TABLE `formulario` (
  `Id` int(11) NOT NULL,
  `Nombre` varchar(255) DEFAULT NULL,
  `Mail` varchar(255) DEFAULT NULL,
  `Mensaje` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `formulario`
--

INSERT INTO `formulario` (`Id`, `Nombre`, `Mail`, `Mensaje`) VALUES
(1, 'Nuria', 'nuriaguevarafuentes@gmail.com', 'qqqq'),
(2, 'Nuria', 'nuriaguevarafuentes@gmail.com', 'qqqq'),
(3, 'Nuria', 'nuriaguevarafuentes@gmail.com', 'qqqq'),
(4, 'Nuria', 'nuriaguevarafuentes@gmail.com', 'qqqq'),
(5, 'Nuria', 'nuriaguevarafuentes@gmail.com', 'qqqq'),
(6, 'Nuria', 'nuriaguevarafuentes@gmail.com', 'qqqq'),
(7, 'Nuria', 'nuriaguevarafuentes@gmail.com', 'qqqq'),
(8, 'Nuria', 'nuriaguevarafuentes@gmail.com', 'qqqq'),
(9, 'Nuria', 'nuriaguevarafuentes@gmail.com', 'qqqq'),
(10, 'Nuria', 'nuriaguevarafuentes@gmail.com', 'qqqq'),
(11, 'Nuria', 'nuriaguevarafuentes@gmail.com', '222'),
(12, 'w', 'nuriaguevarafuentes@gmail.com', 'wwww'),
(13, 'Nuria', 'nuriaguevarafuentes@gmail.com', 'ujjj'),
(14, 'Nuria', 'nuriaguevarafuentes@gmail.com', '3333');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `imagen_jugadores`
--

CREATE TABLE `imagen_jugadores` (
  `Jugador_id` int(11) NOT NULL,
  `Ruta_imagen` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `imagen_jugadores`
--

INSERT INTO `imagen_jugadores` (`Jugador_id`, `Ruta_imagen`) VALUES
(1, 'includeshurts.png'),
(2, 'includes/dejean.png'),
(3, 'icnludes/jenkins.png');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `jugadores`
--

CREATE TABLE `jugadores` (
  `Id` int(11) NOT NULL,
  `Nombre` varchar(100) NOT NULL,
  `Posicion` varchar(50) DEFAULT NULL,
  `Ruta_imagen` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `jugadores`
--

INSERT INTO `jugadores` (`Id`, `Nombre`, `Posicion`, `Ruta_imagen`) VALUES
(1, 'Jalen Hurts', 'QB', 'includes/hurts.png'),
(2, 'Cooper DeJean', 'CB', 'includes/dejean.png'),
(3, 'EJ Jenkins', 'WR', 'includes/jenkins.png');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `formulario`
--
ALTER TABLE `formulario`
  ADD PRIMARY KEY (`Id`);

--
-- Indices de la tabla `imagen_jugadores`
--
ALTER TABLE `imagen_jugadores`
  ADD KEY `Jugador_id` (`Jugador_id`);

--
-- Indices de la tabla `jugadores`
--
ALTER TABLE `jugadores`
  ADD PRIMARY KEY (`Id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `formulario`
--
ALTER TABLE `formulario`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `imagen_jugadores`
--
ALTER TABLE `imagen_jugadores`
  ADD CONSTRAINT `imagen_jugadores_ibfk_1` FOREIGN KEY (`Jugador_id`) REFERENCES `jugadores` (`Id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
