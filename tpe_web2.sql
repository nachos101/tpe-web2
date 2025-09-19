-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost
-- Tiempo de generación: 19-09-2025 a las 23:20:22
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
-- Base de datos: `tpe_web2`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Capitulos`
--

CREATE TABLE `Capitulos` (
  `id_capitulo` int(255) NOT NULL,
  `id_temporada` int(255) NOT NULL,
  `num_capitulo` int(255) NOT NULL,
  `duracion` int(255) NOT NULL,
  `descripcion` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `Capitulos`
--

INSERT INTO `Capitulos` (`id_capitulo`, `id_temporada`, `num_capitulo`, `duracion`, `descripcion`) VALUES
(1, 1, 1, 23, 'Un equipo filma en Dunder Mifflin y Michael Scott intenta parecer líder feliz, pero falla.'),
(2, 1, 2, 22, 'Dia de la diversidad - Por ofensas de Michael, la empresa hace seminario de diversidad.'),
(3, 1, 3, 22, 'Michael evita elegir plan médico y delega en Dwight para no perder popularidad con su personal.');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Series`
--

CREATE TABLE `Series` (
  `id_serie` int(255) NOT NULL,
  `titulo` varchar(1000) NOT NULL,
  `genero` varchar(1000) NOT NULL,
  `cant. de temporadas` int(255) NOT NULL,
  `sinopsis` text NOT NULL,
  `clasificación` int(99) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `Series`
--

INSERT INTO `Series` (`id_serie`, `titulo`, `genero`, `cant. de temporadas`, `sinopsis`, `clasificación`) VALUES
(1, 'The Office', 'Comedia', 9, 'La serie narra el día a día de los empleados de una oficina situada en Scranton (Pensilvania), sucursal de la empresa papelera ficticia Dunder Mifflin, y consta de 201 episodios repartidos en nueve temporadas.', 16),
(2, 'Bon appetit majestad', 'Romance', 1, 'Tras viajar en el tiempo a los días de la dinastía Joseon, una talentosa chef conoce a un rey tirano, cuyo paladar conquista. Pero sobrevivir exigirá desafíos reales.', 13);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Temporadas`
--

CREATE TABLE `Temporadas` (
  `id_temporada` int(255) NOT NULL,
  `id_serie` int(255) NOT NULL,
  `num_temporada` int(255) NOT NULL,
  `cant_capitulos` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `Temporadas`
--

INSERT INTO `Temporadas` (`id_temporada`, `id_serie`, `num_temporada`, `cant_capitulos`) VALUES
(1, 1, 1, 6),
(2, 1, 2, 10),
(3, 2, 1, 8);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `Capitulos`
--
ALTER TABLE `Capitulos`
  ADD PRIMARY KEY (`id_capitulo`),
  ADD KEY `id_temporada` (`id_temporada`);

--
-- Indices de la tabla `Series`
--
ALTER TABLE `Series`
  ADD PRIMARY KEY (`id_serie`);

--
-- Indices de la tabla `Temporadas`
--
ALTER TABLE `Temporadas`
  ADD PRIMARY KEY (`id_temporada`),
  ADD KEY `id_serie` (`id_serie`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `Capitulos`
--
ALTER TABLE `Capitulos`
  MODIFY `id_capitulo` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `Series`
--
ALTER TABLE `Series`
  MODIFY `id_serie` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `Temporadas`
--
ALTER TABLE `Temporadas`
  MODIFY `id_temporada` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `Capitulos`
--
ALTER TABLE `Capitulos`
  ADD CONSTRAINT `Capitulos_ibfk_1` FOREIGN KEY (`id_temporada`) REFERENCES `Temporadas` (`id_temporada`);

--
-- Filtros para la tabla `Temporadas`
--
ALTER TABLE `Temporadas`
  ADD CONSTRAINT `Temporadas_ibfk_1` FOREIGN KEY (`id_serie`) REFERENCES `Series` (`id_serie`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
