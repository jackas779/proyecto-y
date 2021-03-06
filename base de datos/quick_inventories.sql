-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 13-10-2020 a las 07:32:21
-- Versión del servidor: 5.5.24-log
-- Versión de PHP: 5.4.3

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `quick_inventories`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categorias`
--

CREATE TABLE IF NOT EXISTS `categorias` (
  `id_categoria` int(5) NOT NULL AUTO_INCREMENT,
  `categoria` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `fk_id_estado` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`id_categoria`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=20 ;

--
-- Volcado de datos para la tabla `categorias`
--

INSERT INTO `categorias` (`id_categoria`, `categoria`, `fk_id_estado`) VALUES
(1, 'Pantallas', '1'),
(2, 'Teclados', '1'),
(3, 'CPU', '1'),
(4, 'Mouse', '1'),
(19, '123', '1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estados`
--

CREATE TABLE IF NOT EXISTS `estados` (
  `id_estado` int(5) NOT NULL AUTO_INCREMENT,
  `nombre_estado` varchar(15) COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`id_estado`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=3 ;

--
-- Volcado de datos para la tabla `estados`
--

INSERT INTO `estados` (`id_estado`, `nombre_estado`) VALUES
(1, 'activo'),
(2, 'inactivo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `permisos`
--

CREATE TABLE IF NOT EXISTS `permisos` (
  `id_permiso` int(5) DEFAULT NULL,
  `documento` varchar(15) COLLATE utf8_spanish_ci NOT NULL,
  `fk_id_rol` varchar(5) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `permisos`
--

INSERT INTO `permisos` (`id_permiso`, `documento`, `fk_id_rol`) VALUES
(NULL, '123', '1'),
(NULL, '123', '2');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE IF NOT EXISTS `productos` (
  `id_producto` int(5) NOT NULL AUTO_INCREMENT,
  `cod_producto` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `producto` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `descripcion` varchar(500) COLLATE utf8_spanish_ci NOT NULL,
  `fk_id_categoria` varchar(5) COLLATE utf8_spanish_ci NOT NULL,
  `fk_id_estado` varchar(5) COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`id_producto`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=19 ;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`id_producto`, `cod_producto`, `producto`, `descripcion`, `fk_id_categoria`, `fk_id_estado`) VALUES
(1, '000123', 'Pantalla Sansung LCD', 'BUEN ESTADO', ' 2', '2'),
(2, '000124', 'pantalla LG LCD', 'DAÑADA', '3', '1'),
(4, '000125', 'Pantalla CHALLENGER LCD', 'BUEN ESTADO', '4', '1'),
(13, '000127', 'prrueba', 'pruea', ' 2', '1'),
(15, '123', '123', '123', ' 1', '1'),
(16, '12333', '123', '213', ' 2', '1'),
(18, '123444', '', '', '', ' 2');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reportes`
--

CREATE TABLE IF NOT EXISTS `reportes` (
  `id_reporte` int(5) NOT NULL AUTO_INCREMENT,
  `producto` varchar(10) COLLATE utf8_spanish_ci NOT NULL,
  `reporte` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `fk_id_documento` varchar(17) COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`id_reporte`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=5 ;

--
-- Volcado de datos para la tabla `reportes`
--

INSERT INTO `reportes` (`id_reporte`, `producto`, `reporte`, `fk_id_documento`) VALUES
(1, '000123', 'Dañado', '12345'),
(2, '000123', 'se daño', '12345'),
(4, '000123', 'buen estado', '12345');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `roles`
--

CREATE TABLE IF NOT EXISTS `roles` (
  `id_roles` int(5) NOT NULL AUTO_INCREMENT,
  `roles` varchar(40) COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`id_roles`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=3 ;

--
-- Volcado de datos para la tabla `roles`
--

INSERT INTO `roles` (`id_roles`, `roles`) VALUES
(1, 'admin'),
(2, 'usuario');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE IF NOT EXISTS `usuarios` (
  `id_usuario` int(5) NOT NULL AUTO_INCREMENT,
  `documento` varchar(15) COLLATE utf8_spanish_ci NOT NULL,
  `password` varchar(40) COLLATE utf8_spanish_ci NOT NULL,
  `nombres` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `apellidos` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `fk_id_roles` varchar(5) COLLATE utf8_spanish_ci NOT NULL,
  `fk_id_estado` varchar(5) COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`id_usuario`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=6 ;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id_usuario`, `documento`, `password`, `nombres`, `apellidos`, `fk_id_roles`, `fk_id_estado`) VALUES
(1, '123', '123', 'haiber', 'xp', '1', '1'),
(3, '1234', 'prueba', 'prueba', 'prueba', '2', '2'),
(4, '12', '123', '123', '123', '2', '1'),
(5, '12345', '123', 'prueba', 'preuba', '2', '1');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
