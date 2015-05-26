-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 05-05-2015 a las 22:33:55
-- Versión del servidor: 5.6.21
-- Versión de PHP: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `prueba`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `menus`
--

CREATE TABLE IF NOT EXISTS `menus` (
`id_menu` int(3) NOT NULL,
  `id_padre` int(3) NOT NULL,
  `titulo` varchar(100) NOT NULL,
  `ruta` varchar(200) NOT NULL,
  `jerarquia` varchar(2) NOT NULL,
  `posicion` varchar(50) DEFAULT NULL,
  `estado` varchar(2) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `menus`
--

INSERT INTO `menus` (`id_menu`, `id_padre`, `titulo`, `ruta`, `jerarquia`, `posicion`, `estado`) VALUES
(1, 0, 'HOME', 'index?id=1', '1', 'cabeza', '1'),
(2, 0, 'AYUDA', '#', '3', 'cabeza', '1'),
(3, 2, 'Acerca de..', '#', '1', 'cabeza', '1'),
(4, 3, 'Versión', '#', '1', 'cabeza', '1'),
(5, 0, 'SERVICIOS', '#', '2', 'cabeza', '1'),
(6, 4, 'Mas Información..', '#', '1', 'cabeza', '1'),
(7, 0, 'Proyectos', '#', '1', 'izquierda', '1'),
(8, 0, 'Evaluación', '#', '1', 'izquierda', '1'),
(9, 7, 'Proyecto 1', '#', '1', 'izquierda', '1'),
(10, 7, 'Proyecto 2', '#', '2', 'izquierda', '1');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `menus`
--
ALTER TABLE `menus`
 ADD PRIMARY KEY (`id_menu`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `menus`
--
ALTER TABLE `menus`
MODIFY `id_menu` int(3) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=11;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
