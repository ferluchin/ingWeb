-- phpMyAdmin SQL Dump
-- version 4.3.11
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 27-05-2015 a las 02:05:30
-- Versión del servidor: 5.6.24
-- Versión de PHP: 5.6.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `tallerweb`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `asistencia`
--

CREATE TABLE IF NOT EXISTS `asistencia` (
  `ida` int(11) NOT NULL,
  `idparticipante` int(11) NOT NULL,
  `idconferencia` int(11) NOT NULL,
  `idcurso` int(11) NOT NULL,
  `costo` double NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `asistencia`
--

INSERT INTO `asistencia` (`ida`, `idparticipante`, `idconferencia`, `idcurso`, `costo`) VALUES
(1, 12345, 1, 1, 163.63636363636),
(2, 0, 1, 1, 163.63636363636);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `conferencias`
--

CREATE TABLE IF NOT EXISTS `conferencias` (
  `idconferencia` int(11) NOT NULL,
  `auditorio` varchar(100) NOT NULL,
  `hora` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `conferencias`
--

INSERT INTO `conferencias` (`idconferencia`, `auditorio`, `hora`) VALUES
(1, 'AUDITORIO 1', '8H00 a 10H00'),
(2, 'AUDITORIO 1', '11H00 a 13H00'),
(3, 'AUDITORIO 2', '08H00 a 10H00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cursos`
--

CREATE TABLE IF NOT EXISTS `cursos` (
  `id` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `costo` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `cursos`
--

INSERT INTO `cursos` (`id`, `nombre`, `costo`) VALUES
(1, 'INNOVACION', 120),
(2, 'DESARROLLO', 50),
(3, 'EMPRENDIMIENTO', 125);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `participantes`
--

CREATE TABLE IF NOT EXISTS `participantes` (
  `id` int(11) NOT NULL,
  `nombre` varchar(200) NOT NULL,
  `apellido` varchar(200) NOT NULL,
  `direccion` varchar(200) NOT NULL,
  `correo` varchar(100) NOT NULL,
  `institucion` varchar(100) NOT NULL,
  `tipo` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `participantes`
--

INSERT INTO `participantes` (`id`, `nombre`, `apellido`, `direccion`, `correo`, `institucion`, `tipo`) VALUES
(0, '', '', '', '', '', ''),
(127, 'jodie', 'hernandez', 'loja', 'jodie', 'UTPL', 'EXPOSITOR'),
(1104, 'Luis Fernando', 'Granda Morales', 'Loja', 'luis', 'UTPL', 'ESTUDIANTE'),
(11044, 'Luis', 'Gr', 'loja', 'sdaasdsa', 'UTPL', 'ESTUDIANTE'),
(12345, 'usuario', 'das', '@@@', 'correo', 'UTPL', 'ESTUDIANTE');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `asistencia`
--
ALTER TABLE `asistencia`
  ADD PRIMARY KEY (`ida`), ADD KEY `idparticipante` (`idparticipante`,`idconferencia`,`idcurso`), ADD KEY `idconferencia` (`idconferencia`), ADD KEY `idcurso` (`idcurso`);

--
-- Indices de la tabla `conferencias`
--
ALTER TABLE `conferencias`
  ADD PRIMARY KEY (`idconferencia`);

--
-- Indices de la tabla `cursos`
--
ALTER TABLE `cursos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `participantes`
--
ALTER TABLE `participantes`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `asistencia`
--
ALTER TABLE `asistencia`
  MODIFY `ida` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `asistencia`
--
ALTER TABLE `asistencia`
ADD CONSTRAINT `asistencia_ibfk_1` FOREIGN KEY (`idconferencia`) REFERENCES `conferencias` (`idconferencia`),
ADD CONSTRAINT `asistencia_ibfk_2` FOREIGN KEY (`idcurso`) REFERENCES `cursos` (`id`),
ADD CONSTRAINT `asistencia_ibfk_3` FOREIGN KEY (`idparticipante`) REFERENCES `participantes` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
