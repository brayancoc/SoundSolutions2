-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 09-11-2023 a las 02:36:48
-- Versión del servidor: 10.4.28-MariaDB
-- Versión de PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `producto`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `producto`
--

CREATE TABLE `producto` (
  `id` int(11) NOT NULL,
  `nombre` varchar(255) DEFAULT NULL,
  `precio` double NOT NULL,
  `cantidad` int(11) NOT NULL,
  `marca` varchar(30) NOT NULL,
  `fechamodificacion` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `producto`
--

INSERT INTO `producto` (`id`, `nombre`, `precio`, `cantidad`, `marca`, `fechamodificacion`) VALUES
(2, 'Producto', 1, 92, 'JBL new', '2023-11-6'),
(3, 'Auriculares', 18, 76, 'Sony', '2023-11-6'),
(4, 'Amplificador de potencia', 14, 92, 'modificado', '2023-11-6'),
(5, 'Barra de sonido', 16, 89, 'nuevo', '2023-11-6'),
(6, 'mod', 2, 94, 'ocultarrrrr', '2023-10-29'),
(7, 'modificadoweb', 40.4, 97, 'ocultarboton', '2023-10-28'),
(8, 'Micrófono', 1.5, 98, 'editado', '2023-10-28'),
(9, 'Mezcladora de audio', 15, 99, 'clase 7 de octubre', '2023-10-28'),
(10, 'Cables de conexión', 12, 100, 'modificado', '2023-08-14'),
(11, 'Altavoces Bluetooth', 16, 100, 'marca', '2023-10-31'),
(12, 'Reproductor de vinilos', 18.55, 100, '', '2023-09-30'),
(13, 'Barra de sonido 5.1', 19, 100, '', '2024-03-31'),
(14, 'Proyector de cine en casa', 20, 100, '', '2024-02-28'),
(15, 'Soporte de altavoz', 11, 100, '', '2023-09-30'),
(16, 'Control remoto universal', 14, 100, '', '2023-10-31'),
(17, 'Receptor AV', 17, 100, '', '2023-11-30'),
(18, 'Altavoz de techo', 13, 100, '', '2024-01-31'),
(19, 'Kit de cables de altavoz', 12, 100, '', '2023-12-31'),
(20, 'Sistema de sonido envolvente', 19, 100, '', '2023-09-20'),
(21, 'Micrófono inalámbrico', 16, 100, '', '2023-10-15'),
(22, 'Convertidor de audio digital', 15, 100, '', '2023-10-27');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `user`
--

CREATE TABLE `user` (
  `id` bigint(20) NOT NULL,
  `contrasena` varchar(255) DEFAULT NULL,
  `correo` varchar(255) DEFAULT NULL,
  `nombre` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `user`
--

INSERT INTO `user` (`id`, `contrasena`, `correo`, `nombre`) VALUES
(1, '1234', 'brayan@gmail.com', 'brayan coc'),
(2, '1234', 'prueba@gmail.com', 'prueba');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `producto`
--
ALTER TABLE `producto`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `producto`
--
ALTER TABLE `producto`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;

--
-- AUTO_INCREMENT de la tabla `user`
--
ALTER TABLE `user`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
