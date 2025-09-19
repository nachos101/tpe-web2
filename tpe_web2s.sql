-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 20-09-2025 a las 00:00:44
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
-- Base de datos: `tpe_web2s`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `capitulos`
--

CREATE TABLE `capitulos` (
  `id_capitulo` int(255) NOT NULL,
  `id_temporada` int(255) NOT NULL,
  `num_capitulo` int(255) NOT NULL,
  `duracion` int(255) NOT NULL,
  `descripcion` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `capitulos`
--

INSERT INTO `capitulos` (`id_capitulo`, `id_temporada`, `num_capitulo`, `duracion`, `descripcion`) VALUES
(1, 1, 1, 23, 'Un equipo filma en Dunder Mifflin y Michael Scott intenta parecer líder feliz, pero falla.'),
(2, 1, 2, 22, 'Dia de la diversidad - Por ofensas de Michael, la empresa hace seminario de diversidad.'),
(3, 1, 3, 22, 'Michael evita elegir plan médico y delega en Dwight para no perder popularidad con su personal.'),
(4, 3, 1, 80, 'Tras ganar un concurso de cocina francés, Yeon Ji‑young viaja en el tiempo gracias a un libro de recetas antiguo y, al llegar, se topa con el rey Yi Heon.'),
(6, 3, 2, 80, 'Cautiva en condiciones difíciles, Ji‑young prepara un festín para ganar su libertad, pero ni su talento la salva cuando una crisis pone su vida en peligro.'),
(7, 3, 4, 81, 'Ji‑young debe ponerse a prueba en una competencia culinaria de alto riesgo, y su destino en la corte pende de un hilo. Afligido y borracho, Yi Heon la llama a su lado.'),
(8, 3, 5, 76, 'Luego de compartir un momento íntimo, Yi Heon deja de comer con Ji‑young…, pero ninguno puede parar de pensar en el otro, a pesar de la distancia.'),
(9, 3, 6, 75, 'Se ordena un concurso de comida, y Ji‑young acepta el desafío para representar a Joseon… y ganar algo más que el honor.'),
(10, 3, 7, 81, 'Para conseguir una ventaja en la competencia de cocina, Ji‑young se propone crear una olla única. Sin embargo, encontrar al artesano correcto resulta ser todo un desafío.'),
(11, 3, 8, 81, 'Ji‑young llega a duras penas a la competencia y comienza a cocinar. ¡Pero pronto descubre que le faltan sus ingredientes claves! ¿Podrá sobreponerse a la crisis?'),
(13, 3, 3, 82, 'Ji‑young se convierte en la nueva cocinera real de Yi Heon luego de impresionarlo con sus delicias francesas. Consumida por los celos, Kang Mok‑ju conspira en su contra.'),
(14, 1, 4, 22, 'En medio de rumores de reducción de personal, Michael intenta elevar la moral con una fiesta de cumpleaños, a pesar de que no es el cumpleaños de nadie. Dwight le pide a Jim que forme una alianza al estilo \"Superviviente\".'),
(15, 1, 5, 22, 'Michael y su pandilla juegan contra los trabajadores del almacén en un juego de baloncesto no tan amigable. Con demasiada confianza, Michael apuesta a que los perdedores tendrán que trabajar el sábado.'),
(16, 1, 6, 22, 'Dwight, Michael y Jim compiten por la atención de una mujer atractiva que viene a la oficina a vender carteras.');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `series`
--

CREATE TABLE `series` (
  `id_serie` int(255) NOT NULL,
  `titulo` varchar(1000) NOT NULL,
  `genero` varchar(1000) NOT NULL,
  `cant. de temporadas` int(255) NOT NULL,
  `sinopsis` text NOT NULL,
  `clasificación` int(99) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `series`
--

INSERT INTO `series` (`id_serie`, `titulo`, `genero`, `cant. de temporadas`, `sinopsis`, `clasificación`) VALUES
(1, 'The Office', 'Comedia', 9, 'La serie narra el día a día de los empleados de una oficina situada en Scranton (Pensilvania), sucursal de la empresa papelera ficticia Dunder Mifflin, y consta de 201 episodios repartidos en nueve temporadas.', 16),
(2, 'Bon appetit majestad', 'Romance', 1, 'Tras viajar en el tiempo a los días de la dinastía Joseon, una talentosa chef conoce a un rey tirano, cuyo paladar conquista. Pero sobrevivir exigirá desafíos reales.', 13);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `temporadas`
--

CREATE TABLE `temporadas` (
  `id_temporada` int(255) NOT NULL,
  `id_serie` int(255) NOT NULL,
  `num_temporada` int(255) NOT NULL,
  `cant_capitulos` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `temporadas`
--

INSERT INTO `temporadas` (`id_temporada`, `id_serie`, `num_temporada`, `cant_capitulos`) VALUES
(1, 1, 1, 6),
(2, 1, 2, 10),
(3, 2, 1, 8);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `capitulos`
--
ALTER TABLE `capitulos`
  ADD PRIMARY KEY (`id_capitulo`),
  ADD KEY `id_temporada` (`id_temporada`);

--
-- Indices de la tabla `series`
--
ALTER TABLE `series`
  ADD PRIMARY KEY (`id_serie`);

--
-- Indices de la tabla `temporadas`
--
ALTER TABLE `temporadas`
  ADD PRIMARY KEY (`id_temporada`),
  ADD KEY `id_serie` (`id_serie`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `capitulos`
--
ALTER TABLE `capitulos`
  MODIFY `id_capitulo` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT de la tabla `series`
--
ALTER TABLE `series`
  MODIFY `id_serie` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `temporadas`
--
ALTER TABLE `temporadas`
  MODIFY `id_temporada` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `capitulos`
--
ALTER TABLE `capitulos`
  ADD CONSTRAINT `Capitulos_ibfk_1` FOREIGN KEY (`id_temporada`) REFERENCES `temporadas` (`id_temporada`);

--
-- Filtros para la tabla `temporadas`
--
ALTER TABLE `temporadas`
  ADD CONSTRAINT `Temporadas_ibfk_1` FOREIGN KEY (`id_serie`) REFERENCES `series` (`id_serie`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
