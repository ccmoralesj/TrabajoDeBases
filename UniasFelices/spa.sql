-- phpMyAdmin SQL Dump
-- version 4.0.4.1
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 02-12-2013 a las 03:18:45
-- Versión del servidor: 5.5.32
-- Versión de PHP: 5.4.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `spa`
--
CREATE DATABASE IF NOT EXISTS `spa` DEFAULT CHARACTER SET utf8 COLLATE utf8_spanish_ci;
USE `spa`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `carrito`
--

CREATE TABLE IF NOT EXISTS `carrito` (
  `cod` int(4) NOT NULL,
  `color` varchar(15) COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`cod`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `carrito`
--

INSERT INTO `carrito` (`cod`, `color`) VALUES
(5, 'Blanco2'),
(6, 'rrr');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `carritoxitem`
--

CREATE TABLE IF NOT EXISTS `carritoxitem` (
  `cod_carrito` int(4) NOT NULL DEFAULT '0',
  `cod_herramienta` int(4) NOT NULL DEFAULT '0',
  `cantidad` int(2) NOT NULL,
  PRIMARY KEY (`cod_carrito`,`cod_herramienta`),
  KEY `uu` (`cod_herramienta`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `carritoxitem`
--

INSERT INTO `carritoxitem` (`cod_carrito`, `cod_herramienta`, `cantidad`) VALUES
(5, 10, 20),
(5, 11, 20),
(6, 11, 55);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `herramienta`
--

CREATE TABLE IF NOT EXISTS `herramienta` (
  `codherr` int(4) NOT NULL,
  PRIMARY KEY (`codherr`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `herramienta`
--

INSERT INTO `herramienta` (`codherr`) VALUES
(10),
(11);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `item`
--

CREATE TABLE IF NOT EXISTS `item` (
  `codigo` int(4) NOT NULL,
  `nombre` varchar(40) COLLATE utf8_spanish_ci NOT NULL,
  `precio_compra` int(6) NOT NULL,
  `tipo` varchar(1) COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`codigo`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `item`
--

INSERT INTO `item` (`codigo`, `nombre`, `precio_compra`, `tipo`) VALUES
(10, 'asfa', 20000, 'h'),
(11, 'fff', 80, 'h');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `producto`
--

CREATE TABLE IF NOT EXISTS `producto` (
  `codprod` int(4) NOT NULL,
  `precio_venta` int(4) NOT NULL,
  PRIMARY KEY (`codprod`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `carritoxitem`
--
ALTER TABLE `carritoxitem`
  ADD CONSTRAINT `hh` FOREIGN KEY (`cod_carrito`) REFERENCES `carrito` (`cod`),
  ADD CONSTRAINT `uu` FOREIGN KEY (`cod_herramienta`) REFERENCES `herramienta` (`codherr`);

--
-- Filtros para la tabla `herramienta`
--
ALTER TABLE `herramienta`
  ADD CONSTRAINT `jj` FOREIGN KEY (`codherr`) REFERENCES `item` (`codigo`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
