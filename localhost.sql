-- phpMyAdmin SQL Dump
-- version 3.3.9
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 11-08-2011 a las 02:53:40
-- Versión del servidor: 5.5.8
-- Versión de PHP: 5.3.5

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `biblos_g2`
--
CREATE DATABASE `biblos_g2` DEFAULT CHARACTER SET latin1 COLLATE latin1_spanish_ci;
USE `biblos_g2`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `acceso`
--

CREATE TABLE IF NOT EXISTS `acceso` (
  `usuario_dni` int(8) unsigned zerofill NOT NULL,
  `fecha_hora_entrada` datetime NOT NULL,
  `fecha_hora_salida` datetime DEFAULT NULL,
  PRIMARY KEY (`usuario_dni`,`fecha_hora_entrada`),
  KEY `fk_acceso_usuario1` (`usuario_dni`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

--
-- Volcar la base de datos para la tabla `acceso`
--


-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `autor`
--

CREATE TABLE IF NOT EXISTS `autor` (
  `id_autor` tinyint(3) unsigned NOT NULL AUTO_INCREMENT,
  `nombre` varchar(30) COLLATE latin1_spanish_ci NOT NULL,
  `apellido1` varchar(35) COLLATE latin1_spanish_ci DEFAULT NULL,
  `apellido2` varchar(35) COLLATE latin1_spanish_ci DEFAULT NULL,
  `nacionalidad` varchar(30) COLLATE latin1_spanish_ci NOT NULL,
  PRIMARY KEY (`id_autor`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci AUTO_INCREMENT=3 ;

--
-- Volcar la base de datos para la tabla `autor`
--

INSERT INTO `autor` (`id_autor`, `nombre`, `apellido1`, `apellido2`, `nacionalidad`) VALUES
(1, 'Mirco', 'Castellani', 'Gauto', 'Italia'),
(2, 'Tobias', 'Diaz', 'Gauto', 'Paraguay');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categoria`
--

CREATE TABLE IF NOT EXISTS `categoria` (
  `id_categoria` smallint(3) unsigned zerofill NOT NULL,
  `nombre_categoria` varchar(45) COLLATE latin1_spanish_ci NOT NULL,
  PRIMARY KEY (`id_categoria`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

--
-- Volcar la base de datos para la tabla `categoria`
--

INSERT INTO `categoria` (`id_categoria`, `nombre_categoria`) VALUES
(000, 'Obras Generales'),
(100, 'Filosofia'),
(200, 'Religion'),
(300, 'Ciencias Sociales'),
(400, 'Linguistica'),
(500, 'Ciencias Puras'),
(600, 'Ciencias aplicadas'),
(700, 'Artes y Recreacion'),
(800, 'Literatura'),
(900, 'Historia');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `editorial`
--

CREATE TABLE IF NOT EXISTS `editorial` (
  `id_editorial` tinyint(3) unsigned NOT NULL AUTO_INCREMENT,
  `nombre_editorial` varchar(45) COLLATE latin1_spanish_ci NOT NULL,
  PRIMARY KEY (`id_editorial`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci AUTO_INCREMENT=3 ;

--
-- Volcar la base de datos para la tabla `editorial`
--

INSERT INTO `editorial` (`id_editorial`, `nombre_editorial`) VALUES
(1, 'Atalaya'),
(2, 'Catalaya');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `idiomas_639_1`
--

CREATE TABLE IF NOT EXISTS `idiomas_639_1` (
  `id_idioma_639_1` varchar(2) COLLATE latin1_spanish_ci NOT NULL,
  `idioma` varchar(45) COLLATE latin1_spanish_ci NOT NULL,
  PRIMARY KEY (`id_idioma_639_1`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

--
-- Volcar la base de datos para la tabla `idiomas_639_1`
--

INSERT INTO `idiomas_639_1` (`id_idioma_639_1`, `idioma`) VALUES
('en', 'english'),
('es', 'espanol');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `libro`
--

CREATE TABLE IF NOT EXISTS `libro` (
  `categoria_id_categoria` smallint(3) unsigned zerofill NOT NULL,
  `cod_apellido` varchar(3) COLLATE latin1_spanish_ci NOT NULL,
  `cod_titulo` varchar(3) COLLATE latin1_spanish_ci NOT NULL,
  `isbn` int(11) DEFAULT NULL,
  `titulo` varchar(45) COLLATE latin1_spanish_ci NOT NULL,
  `fecha_publicacion` date DEFAULT NULL,
  `fecha_adquisicion` date DEFAULT NULL,
  `num_paginas` smallint(5) unsigned DEFAULT NULL,
  `sinopsis` text COLLATE latin1_spanish_ci,
  `edicion` tinyint(3) unsigned DEFAULT NULL,
  `autor_id_autor` tinyint(3) unsigned NOT NULL,
  `editorial_id_editorial` tinyint(3) unsigned NOT NULL,
  `idiomas_639_1_id_idioma_639_1` varchar(2) COLLATE latin1_spanish_ci NOT NULL,
  PRIMARY KEY (`categoria_id_categoria`,`cod_apellido`,`cod_titulo`),
  KEY `fk_libro_autor1` (`autor_id_autor`),
  KEY `fk_libro_categoria1` (`categoria_id_categoria`),
  KEY `fk_libro_editorial1` (`editorial_id_editorial`),
  KEY `fk_libro_idiomas_639_11` (`idiomas_639_1_id_idioma_639_1`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

--
-- Volcar la base de datos para la tabla `libro`
--

INSERT INTO `libro` (`categoria_id_categoria`, `cod_apellido`, `cod_titulo`, `isbn`, `titulo`, `fecha_publicacion`, `fecha_adquisicion`, `num_paginas`, `sinopsis`, `edicion`, `autor_id_autor`, `editorial_id_editorial`, `idiomas_639_1_id_idioma_639_1`) VALUES
(500, 'Dia', 'Que', 2147483647, 'Que es esto', '0000-00-00', '0000-00-00', 120, 'me parece un buen libro vaya', 1, 2, 2, 'en');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `plantilla`
--

CREATE TABLE IF NOT EXISTS `plantilla` (
  `id_plantilla` tinyint(3) unsigned NOT NULL,
  `nombre_plantilla` varchar(15) COLLATE latin1_spanish_ci NOT NULL,
  PRIMARY KEY (`id_plantilla`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

--
-- Volcar la base de datos para la tabla `plantilla`
--

INSERT INTO `plantilla` (`id_plantilla`, `nombre_plantilla`) VALUES
(1, 'plantilla1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipos_usuario`
--

CREATE TABLE IF NOT EXISTS `tipos_usuario` (
  `id_tipo_usuario` tinyint(3) unsigned NOT NULL,
  `tipo_usuario` varchar(45) COLLATE latin1_spanish_ci NOT NULL,
  PRIMARY KEY (`id_tipo_usuario`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

--
-- Volcar la base de datos para la tabla `tipos_usuario`
--

INSERT INTO `tipos_usuario` (`id_tipo_usuario`, `tipo_usuario`) VALUES
(0, 'super administrador'),
(1, 'administrador'),
(2, 'lector');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE IF NOT EXISTS `usuario` (
  `dni` int(8) unsigned zerofill NOT NULL,
  `clave` varchar(10) COLLATE latin1_spanish_ci NOT NULL,
  `nombre_usuario` varchar(30) COLLATE latin1_spanish_ci NOT NULL,
  `apellido1_usuario` varchar(45) COLLATE latin1_spanish_ci NOT NULL,
  `apellido2_usuario` varchar(45) COLLATE latin1_spanish_ci DEFAULT NULL,
  `email` varchar(45) COLLATE latin1_spanish_ci NOT NULL,
  `telefono` int(9) unsigned DEFAULT NULL,
  `direccion` varchar(45) COLLATE latin1_spanish_ci NOT NULL,
  `plantilla_id_plantilla` tinyint(3) unsigned NOT NULL,
  `tipos_usuario_id_tipo_usuario` tinyint(3) unsigned NOT NULL,
  PRIMARY KEY (`dni`),
  KEY `fk_usuario_plantilla1` (`plantilla_id_plantilla`),
  KEY `fk_usuario_tipos_usuario1` (`tipos_usuario_id_tipo_usuario`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

--
-- Volcar la base de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`dni`, `clave`, `nombre_usuario`, `apellido1_usuario`, `apellido2_usuario`, `email`, `telefono`, `direccion`, `plantilla_id_plantilla`, `tipos_usuario_id_tipo_usuario`) VALUES
(00000001, '1', 'lector1', 'lector1_apellido1', 'lector1_apellido2', 'lector1_email', NULL, 'lector1_direccion', 1, 2),
(00000002, '2', 'administrador', 'administrador_apellido1', 'administrador_apellido2', 'administrador_email', NULL, 'administrador1_direccion', 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario_has_libro`
--

CREATE TABLE IF NOT EXISTS `usuario_has_libro` (
  `usuario_dni` int(8) unsigned zerofill NOT NULL,
  `libro_categoria_id_categoria` smallint(3) unsigned zerofill NOT NULL,
  `libro_cod_apellido` varchar(3) COLLATE latin1_spanish_ci NOT NULL,
  `libro_cod_titulo` varchar(3) COLLATE latin1_spanish_ci NOT NULL,
  `fecha_hora_prestamo` datetime NOT NULL,
  `fecha_hora_devolucion_propuesta` datetime NOT NULL,
  `fecha_hora_devolucion_efectivo` datetime DEFAULT NULL,
  PRIMARY KEY (`usuario_dni`,`libro_categoria_id_categoria`,`libro_cod_apellido`,`libro_cod_titulo`),
  KEY `fk_usuario_has_libro_libro1` (`libro_categoria_id_categoria`,`libro_cod_apellido`,`libro_cod_titulo`),
  KEY `fk_usuario_has_libro_usuario1` (`usuario_dni`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci COMMENT='Tabla para logs de prestamos';

--
-- Volcar la base de datos para la tabla `usuario_has_libro`
--


--
-- Filtros para las tablas descargadas (dump)
--

--
-- Filtros para la tabla `acceso`
--
ALTER TABLE `acceso`
  ADD CONSTRAINT `fk_acceso_usuario1` FOREIGN KEY (`usuario_dni`) REFERENCES `usuario` (`dni`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `libro`
--
ALTER TABLE `libro`
  ADD CONSTRAINT `fk_libro_autor1` FOREIGN KEY (`autor_id_autor`) REFERENCES `autor` (`id_autor`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_libro_categoria1` FOREIGN KEY (`categoria_id_categoria`) REFERENCES `categoria` (`id_categoria`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_libro_editorial1` FOREIGN KEY (`editorial_id_editorial`) REFERENCES `editorial` (`id_editorial`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_libro_idiomas_639_11` FOREIGN KEY (`idiomas_639_1_id_idioma_639_1`) REFERENCES `idiomas_639_1` (`id_idioma_639_1`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Filtros para la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD CONSTRAINT `fk_usuario_plantilla1` FOREIGN KEY (`plantilla_id_plantilla`) REFERENCES `plantilla` (`id_plantilla`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_usuario_tipos_usuario1` FOREIGN KEY (`tipos_usuario_id_tipo_usuario`) REFERENCES `tipos_usuario` (`id_tipo_usuario`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Filtros para la tabla `usuario_has_libro`
--
ALTER TABLE `usuario_has_libro`
  ADD CONSTRAINT `fk_usuario_has_libro_usuario1` FOREIGN KEY (`usuario_dni`) REFERENCES `usuario` (`dni`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_usuario_has_libro_libro1` FOREIGN KEY (`libro_categoria_id_categoria`, `libro_cod_apellido`, `libro_cod_titulo`) REFERENCES `libro` (`categoria_id_categoria`, `cod_apellido`, `cod_titulo`) ON DELETE NO ACTION ON UPDATE CASCADE;
