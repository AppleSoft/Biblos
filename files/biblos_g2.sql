-- phpMyAdmin SQL Dump
-- version 3.4.4
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 02-09-2011 a las 12:56:01
-- Versión del servidor: 5.5.8
-- Versión de PHP: 5.3.5

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `biblos_g2`
--

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

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `autor`
--

CREATE TABLE IF NOT EXISTS `autor` (
  `id_autor` tinyint(3) unsigned zerofill NOT NULL AUTO_INCREMENT,
  `nombre` varchar(30) COLLATE latin1_spanish_ci NOT NULL,
  `apellido1` varchar(35) COLLATE latin1_spanish_ci DEFAULT NULL,
  `apellido2` varchar(35) COLLATE latin1_spanish_ci DEFAULT NULL,
  `nacionalidad` varchar(30) COLLATE latin1_spanish_ci NOT NULL,
  PRIMARY KEY (`id_autor`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci AUTO_INCREMENT=19 ;

--
-- Volcado de datos para la tabla `autor`
--

INSERT INTO `autor` (`id_autor`, `nombre`, `apellido1`, `apellido2`, `nacionalidad`) VALUES
(001, 'Gabriel', 'Garcia', 'Marquez', 'Mexico'),
(002, 'George ', 'Orwell', NULL, 'USA'),
(003, 'Nikos', 'Kazantzakis', NULL, 'Grecia'),
(004, 'Truman', 'Capote', NULL, 'USA'),
(005, 'Guy', 'de MMaupassant', NULL, 'Francia'),
(006, 'Fiodor', 'Dostoyevsky', NULL, 'URSS'),
(007, 'Giovanni', 'Bocaccio', NULL, 'Italia'),
(008, 'Bram', 'Stoker', NULL, 'UK'),
(009, 'Marguerite', 'Duras', NULL, 'Francia'),
(010, 'Alejandro', 'Dumas', NULL, 'Francia'),
(011, 'Jules', 'Verne', NULL, 'Francia'),
(012, 'Edgar', 'Allan', 'Poe', 'USA'),
(013, 'Albert', 'Camus', NULL, 'Francia'),
(014, 'Robert', 'Louis', 'Stevenson', 'UK'),
(015, 'Francis', 'Scott', 'Fitzgerald', 'USA'),
(016, 'Miguel', 'Cervantes', 'Saavedra', 'España'),
(017, 'Herman', 'Hesse', NULL, 'Alemania'),
(018, 'Umberto', 'Eco', NULL, 'Italia');

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
-- Volcado de datos para la tabla `categoria`
--

INSERT INTO `categoria` (`id_categoria`, `nombre_categoria`) VALUES
(000, 'Obras Generales'),
(100, 'Filosofia'),
(200, 'Religion'),
(300, 'Ciencias Sociales'),
(400, 'Linguistica'),
(500, 'Ciencias Puras'),
(600, 'Ciencias Aplicadas'),
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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci AUTO_INCREMENT=5 ;

--
-- Volcado de datos para la tabla `editorial`
--

INSERT INTO `editorial` (`id_editorial`, `nombre_editorial`) VALUES
(1, 'Anaya'),
(2, 'Anaya Multimedia'),
(3, 'Aenor'),
(4, 'Altamar');

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
-- Volcado de datos para la tabla `idiomas_639_1`
--

INSERT INTO `idiomas_639_1` (`id_idioma_639_1`, `idioma`) VALUES
('ar', 'arabe'),
('bg', 'bulgaro'),
('cs', 'checo'),
('da', 'danes'),
('de', 'aleman'),
('el', 'griego'),
('en', 'english'),
('es', 'español'),
('fr', 'frances'),
('it', 'italiano'),
('la', 'latin'),
('pt', 'portugues'),
('ro', 'rumano'),
('ru', 'ruso'),
('sv', 'sueco'),
('tr', 'turco'),
('uk', 'ucraniano'),
('zh', 'chino'),
('zu', 'zulu');

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
-- Volcado de datos para la tabla `libro`
--

INSERT INTO `libro` (`categoria_id_categoria`, `cod_apellido`, `cod_titulo`, `isbn`, `titulo`, `fecha_publicacion`, `fecha_adquisicion`, `num_paginas`, `sinopsis`, `edicion`, `autor_id_autor`, `editorial_id_editorial`, `idiomas_639_1_id_idioma_639_1`) VALUES
(000, 'All', 'El ', 0, 'El Coliseo', '0000-00-00', '0000-00-00', 0, '', 0, 12, 3, 'es'),
(000, 'Cam', 'El ', 0, 'El reves y el derecho', '0000-00-00', '0000-00-00', 0, '', 0, 13, 3, 'es'),
(000, 'Cap', 'Los', 0, 'Los perros ladran', '0000-00-00', '0000-00-00', 0, '', 0, 4, 3, 'es'),
(000, 'Sco', 'El ', 0, 'El palacio de hielo', '0000-00-00', '0000-00-00', 0, '', 0, 15, 3, 'es'),
(100, 'Boc', 'Las', 0, 'Las ninfas de FiÃ©sole', '0000-00-00', '0000-00-00', 0, '', 0, 7, 3, 'es'),
(100, 'Dos', 'La ', 0, 'La mujer ajena y el marido debajo de la cama', '0000-00-00', '0000-00-00', 0, '', 0, 6, 3, 'es'),
(100, 'Sco', 'Cab', 0, 'Cabeza y hombros', '0000-00-00', '0000-00-00', 0, '', 0, 15, 3, 'es'),
(300, 'Orw', 'Reb', 0, 'Rebelion en la granja', '0000-00-00', '0000-00-00', 0, '', 0, 2, 3, 'es'),
(400, 'Boc', 'Cor', 0, 'Corbacho', '0000-00-00', '0000-00-00', 0, '', 0, 7, 3, 'es'),
(400, 'Boc', 'La ', 0, 'La elegÃ­a de doÃ±a Frameta', '0000-00-00', '0000-00-00', 0, '', 0, 7, 3, 'es'),
(400, 'Boc', 'Los', 0, 'Los quince libros de la GenealogÃ­a de los di', '0000-00-00', '0000-00-00', 0, '', 0, 7, 3, 'es'),
(400, 'Boc', 'Vid', 0, 'Vida de Dante', '0000-00-00', '0000-00-00', 0, '', 0, 7, 3, 'es'),
(400, 'Eco', 'Sig', 0, 'Signo', '0000-00-00', '0000-00-00', 0, '', 0, 18, 3, 'es'),
(700, 'All', 'El ', 0, 'El palacio encantado', '0000-00-00', '0000-00-00', 0, '', 0, 12, 3, 'es'),
(700, 'All', 'sdv', 0, 'sdvcsd', '0000-00-00', '0000-00-00', 0, '', 0, 12, 3, 'de'),
(700, 'All', 'Tie', 0, 'Tierra de sueÃ±os', '0000-00-00', '0000-00-00', 0, '', 0, 12, 3, 'es'),
(700, 'All', 'Tit', 0, 'Titulo1', '0000-00-00', '0000-00-00', 0, '', 1, 12, 3, 'es'),
(700, 'All', 'xyz', 0, 'xyz', '0000-00-00', '0000-00-00', 0, '', 0, 12, 3, 'de'),
(700, 'Cam', 'Cal', 0, 'Caligula', '0000-00-00', '0000-00-00', 0, '', 0, 13, 3, 'es'),
(700, 'Cam', 'El ', 0, 'El mal entendido', '0000-00-00', '0000-00-00', 0, '', 0, 13, 3, 'es'),
(700, 'Cam', 'Los', 0, 'Los justos', '0000-00-00', '0000-00-00', 0, '', 0, 13, 3, 'es'),
(700, 'Cap', 'Cas', 0, 'Casa de flores', '0000-00-00', '0000-00-00', 0, '', 0, 4, 3, 'es'),
(700, 'Cap', 'Ple', 0, 'Plegarias atendidas', '0000-00-00', '0000-00-00', 0, '', 0, 4, 3, 'es'),
(700, 'de ', 'La ', 0, 'La seÃ±orita FifÃ­', '0000-00-00', '0000-00-00', 0, '', 0, 5, 3, 'es'),
(700, 'Dur', 'Aga', 0, 'Agatha', '0000-00-00', '0000-00-00', 0, '', 0, 9, 3, 'es'),
(700, 'Dur', 'Ind', 0, 'India Song', '0000-00-00', '0000-00-00', 0, '', 0, 9, 3, 'es'),
(700, 'Eco', 'Lec', 0, 'Lector in fabula', '0000-00-00', '0000-00-00', 0, '', 0, 18, 3, 'es'),
(700, 'Gar', ' Di', 0, ' Diatriba de amor contra un hombre sentado', '0000-00-00', '0000-00-00', 0, '', 0, 1, 3, 'es'),
(700, 'Kaz', 'Ale', 0, 'Alexis Zorbas', '0000-00-00', '0000-00-00', 0, '', 0, 3, 3, 'es'),
(700, 'Kaz', 'El ', 0, 'El jardin de la rocas', '0000-00-00', '0000-00-00', 0, '', 0, 3, 3, 'es'),
(700, 'Kaz', 'La ', 0, 'La Odisea', '0000-00-00', '0000-00-00', 0, '', 0, 3, 3, 'es'),
(800, 'All', 'A a', 0, 'A alguien en el paraÃ­so', '0000-00-00', '0000-00-00', 0, '', 0, 12, 3, 'es'),
(800, 'All', 'Cor', 2147483647, 'Corazon Revelador', '1843-12-31', '2011-03-31', 150, 'un cuento que te llegara al corazon', 1, 12, 4, 'en'),
(800, 'All', 'El ', 0, 'El dÃ­a mÃ¡s feliz, la hora mÃ¡s Feliz', '0000-00-00', '0000-00-00', 0, '', 0, 12, 3, 'es'),
(800, 'All', 'Est', 0, 'Estrella del anochecer', '0000-00-00', '0000-00-00', 0, '', 0, 12, 3, 'es'),
(800, 'All', 'La ', 0, 'La ciudad en el mar', '0000-00-00', '0000-00-00', 0, '', 0, 12, 3, 'es'),
(800, 'All', 'Las', 0, 'Las campanas', '0000-00-00', '0000-00-00', 0, '', 0, 12, 3, 'es'),
(800, 'All', 'Los', 0, 'Los dias de Birmania', '0000-00-00', '0000-00-00', 0, '', 0, 12, 3, 'es'),
(800, 'All', 'Sin', 0, 'Sin blanca en Paris y Londres', '0000-00-00', '0000-00-00', 0, '', 0, 12, 3, 'es'),
(800, 'All', 'Sue', 0, 'SueÃ±os', '0000-00-00', '0000-00-00', 0, '', 0, 12, 3, 'es'),
(800, 'Cam', 'El ', 0, 'El extranjero', '0000-00-00', '0000-00-00', 0, '', 0, 13, 3, 'es'),
(800, 'Cam', 'La ', 0, 'La peste', '0000-00-00', '0000-00-00', 0, '', 0, 13, 3, 'es'),
(800, 'Cap', 'A s', 0, 'A sangre fria', '0000-00-00', '0000-00-00', 0, '', 0, 4, 3, 'es'),
(800, 'Cap', 'Cru', 0, 'Crucero de verano', '0000-00-00', '0000-00-00', 0, '', 0, 4, 3, 'es'),
(800, 'Cap', 'El ', 0, 'El arpa de hierba', '0000-00-00', '0000-00-00', 0, '', 0, 4, 3, 'es'),
(800, 'Cer', ' El', 0, ' El licenciado Vidriera', '0000-00-00', '0000-00-00', 0, '', 0, 16, 3, 'es'),
(800, 'Cer', ' La', 0, ' La fuerza de la sangre', '0000-00-00', '0000-00-00', 0, '', 0, 16, 3, 'es'),
(800, 'Cer', ' Ri', 0, ' Rinconete y Cortadillo', '0000-00-00', '0000-00-00', 0, '', 0, 16, 3, 'es'),
(800, 'Cer', 'Don', 0, 'Don Quijote de la Mancha', '0000-00-00', '0000-00-00', 0, '', 0, 16, 3, 'es'),
(800, 'Cer', 'El ', 0, 'El amante liberal', '0000-00-00', '0000-00-00', 0, '', 0, 16, 3, 'es'),
(800, 'Cer', 'La ', 0, 'La Galatea', '0000-00-00', '0000-00-00', 0, '', 0, 16, 3, 'es'),
(800, 'de ', 'Cla', 0, 'Claro de luna ', '0000-00-00', '0000-00-00', 0, '', 0, 5, 3, 'es'),
(800, 'de ', 'Cue', 0, 'Cuentos del dÃ­a y de la noche', '0000-00-00', '0000-00-00', 0, '', 0, 5, 3, 'es'),
(800, 'de ', 'El ', 0, 'El Padre de SimÃ³n ', '0000-00-00', '0000-00-00', 0, '', 0, 5, 3, 'es'),
(800, 'de ', 'Jun', 0, 'Junto a un mueto', '0000-00-00', '0000-00-00', 0, '', 0, 5, 3, 'es'),
(800, 'de ', 'La ', 0, 'La mano izquierda', '0000-00-00', '0000-00-00', 0, '', 0, 5, 3, 'es'),
(800, 'de ', 'Las', 0, 'Las Joyas', '0000-00-00', '0000-00-00', 0, '', 0, 5, 3, 'es'),
(800, 'de ', 'Mag', 0, 'Magnetismo', '0000-00-00', '0000-00-00', 0, '', 0, 5, 3, 'es'),
(800, 'Dos', 'El ', 0, 'El seÃ±or Projarchin', '0000-00-00', '0000-00-00', 0, '', 0, 6, 3, 'es'),
(800, 'Dos', 'La ', 0, 'La patrona', '0000-00-00', '0000-00-00', 0, '', 0, 6, 3, 'es'),
(800, 'Dos', 'Un ', 0, 'Un corazon debil', '0000-00-00', '0000-00-00', 0, '', 0, 6, 3, 'es'),
(800, 'Dos', 'Una', 0, 'Una novela en nueve cartas', '0000-00-00', '0000-00-00', 0, '', 0, 6, 3, 'es'),
(800, 'Dum', 'Des', 0, 'Deseo y posesiÃ³n', '0000-00-00', '0000-00-00', 0, '', 0, 10, 3, 'es'),
(800, 'Dum', 'El ', 0, 'El cura de Boulogne', '0000-00-00', '0000-00-00', 0, '', 0, 10, 3, 'es'),
(800, 'Dum', 'La ', 0, 'La reina Margot', '0000-00-00', '0000-00-00', 0, '', 0, 10, 3, 'es'),
(800, 'Dum', 'Las', 0, 'Las gachas de la condesa Berta', '0000-00-00', '0000-00-00', 0, '', 0, 10, 3, 'es'),
(800, 'Dum', 'Los', 0, 'Los hermanos corsos', '0000-00-00', '0000-00-00', 0, '', 0, 10, 3, 'es'),
(800, 'Dum', 'Un ', 0, 'Un baile de mÃ¡scaras ', '0000-00-00', '0000-00-00', 0, '', 0, 10, 3, 'es'),
(800, 'Dum', 'Vei', 0, 'Veinte aÃ±os despues', '0000-00-00', '0000-00-00', 0, '', 0, 10, 3, 'es'),
(800, 'Eco', 'Obr', 0, 'Obra abierta', '0000-00-00', '0000-00-00', 0, '', 0, 18, 3, 'es'),
(800, 'Gar', 'Cie', 2147483647, 'Cien anyos de soledad', '1967-01-01', '2011-03-31', 180, 'Dos familias, la de los BuendÃ­a y los IguarÃ¡n, han acabado por dar luz a un muchacho con cola de iguana a fuerza de casarse entre sÃ­...', 1, 1, 3, 'es'),
(800, 'Gar', 'El ', 0, 'El secuestro', '0000-00-00', '0000-00-00', 0, '', 0, 1, 3, 'es'),
(800, 'Hes', ' Ed', 0, ' Edmund', '0000-00-00', '0000-00-00', 0, '', 0, 17, 3, 'es'),
(800, 'Hes', 'Ami', 0, 'Amigos', '0000-00-00', '0000-00-00', 0, '', 0, 17, 3, 'es'),
(800, 'Hes', 'La ', 0, 'La ciudad', '0000-00-00', '0000-00-00', 0, '', 0, 17, 3, 'es'),
(800, 'Hes', 'Poe', 0, 'Poemas', '0000-00-00', '0000-00-00', 0, '', 0, 17, 3, 'es'),
(800, 'Hes', 'Sob', 0, 'Sobre El lobo estepario', '0000-00-00', '0000-00-00', 0, '', 0, 17, 3, 'es'),
(800, 'Kaz', 'Lib', 0, 'Libertad o muerte', '0000-00-00', '0000-00-00', 0, '', 0, 3, 3, 'es'),
(800, 'Lou', 'La ', 0, 'La isla del tesoro', '0000-00-00', '0000-00-00', 0, '', 0, 14, 3, 'es'),
(800, 'Lou', 'Pri', 0, 'Prince Otto', '0000-00-00', '0000-00-00', 0, '', 0, 14, 3, 'es'),
(800, 'Orw', '198', 0, '1984', '0000-00-00', '0000-00-00', 0, '', 0, 2, 3, 'de'),
(800, 'Orw', 'Reb', 0, 'Rebelion en la granja', '0000-00-00', '0000-00-00', 0, '', 0, 2, 3, 'es'),
(800, 'Orw', 'Sin', 0, 'Sin blanca en Paris y Londres', '0000-00-00', '0000-00-00', 0, '', 0, 2, 3, 'es'),
(800, 'Sco', 'El ', 0, 'El pirata de la costa,', '0000-00-00', '0000-00-00', 0, '', 0, 15, 3, 'es'),
(800, 'Sco', 'Sue', 0, 'SueÃ±os de invierno', '0000-00-00', '0000-00-00', 0, '', 0, 15, 3, 'es'),
(800, 'Sto', 'DrÃ', 0, 'DrÃ¡cula', '0000-00-00', '0000-00-00', 0, '', 0, 8, 3, 'es'),
(800, 'Sto', 'El ', 0, 'El desfiladero de la serpiente', '0000-00-00', '0000-00-00', 0, '', 0, 8, 3, 'es'),
(800, 'Sto', 'La ', 0, 'La Guariada del Gusano Blanco', '0000-00-00', '0000-00-00', 0, '', 0, 8, 3, 'es'),
(800, 'Ver', 'La ', 0, 'La vuelta del mundo en 80 dias', '0000-00-00', '0000-00-00', 0, '', 0, 11, 3, 'es'),
(900, 'All', 'Hom', 0, 'Homenaje a CataluÃ±a', '0000-00-00', '0000-00-00', 0, '', 0, 12, 3, 'es'),
(900, 'Boc', 'Fil', 0, 'FilÃ³colo', '0000-00-00', '0000-00-00', 0, '', 0, 7, 3, 'es'),
(900, 'Cam', 'El ', 0, 'El exilio y el reino', '0000-00-00', '0000-00-00', 0, '', 0, 13, 3, 'es'),
(900, 'Cap', 'Mir', 0, 'Miriam', '0000-00-00', '0000-00-00', 0, '', 0, 4, 3, 'es'),
(900, 'Cer', ' La', 0, ' La espaÃ±ola inglesa ', '0000-00-00', '0000-00-00', 0, '', 0, 16, 3, 'es'),
(900, 'Orw', 'El ', 0, 'El camino a Wigan Pier', '0000-00-00', '0000-00-00', 0, '', 0, 2, 3, 'es'),
(900, 'Orw', 'Hom', 0, 'Homenaje a CataluÃ±a', '0000-00-00', '0000-00-00', 0, '', 0, 2, 3, 'es'),
(900, 'Orw', 'Los', 0, 'Los dias de Birmania', '0000-00-00', '0000-00-00', 0, '', 0, 2, 3, 'es'),
(900, 'Orw', 'Sub', 0, 'Subir a por aire', '0000-00-00', '0000-00-00', 0, '', 0, 2, 3, 'es');

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
-- Volcado de datos para la tabla `plantilla`
--

INSERT INTO `plantilla` (`id_plantilla`, `nombre_plantilla`) VALUES
(1, 'plantilla1'),
(2, 'plantilla2');

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
-- Volcado de datos para la tabla `tipos_usuario`
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
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`dni`, `clave`, `nombre_usuario`, `apellido1_usuario`, `apellido2_usuario`, `email`, `telefono`, `direccion`, `plantilla_id_plantilla`, `tipos_usuario_id_tipo_usuario`) VALUES
(00000001, 'clave1', 'lector1', 'lector1_apellido1', 'lector1_apellido2', 'lector1_email', NULL, 'lector1_direccion', 2, 2),
(00000002, 'clave2', 'administrador', 'administrador_apellido1', 'administrador_apellido2', 'administrador_email', NULL, 'administrador1_direccion', 2, 1),
(00000003, 'clave2', 'lector2', 'apellido2', 'apellido22', 'e@mail.com', 43424, 'call ate', 2, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario_has_libro`
--

CREATE TABLE IF NOT EXISTS `usuario_has_libro` (
  `usuario_dni` int(8) unsigned zerofill NOT NULL,
  `libro_categoria_id_categoria` smallint(3) unsigned zerofill NOT NULL,
  `libro_cod_apellido` varchar(3) COLLATE latin1_spanish_ci NOT NULL,
  `libro_cod_titulo` varchar(3) COLLATE latin1_spanish_ci NOT NULL,
  `fecha_hora_prestamo` varchar(45) COLLATE latin1_spanish_ci NOT NULL,
  `fecha_hora_devolucion_propuesta` datetime NOT NULL,
  `fecha_hora_devolucion_efectivo` datetime DEFAULT NULL,
  PRIMARY KEY (`usuario_dni`,`libro_categoria_id_categoria`,`libro_cod_apellido`,`libro_cod_titulo`),
  KEY `fk_usuario_has_libro_libro1` (`libro_categoria_id_categoria`,`libro_cod_apellido`,`libro_cod_titulo`),
  KEY `fk_usuario_has_libro_usuario1` (`usuario_dni`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci COMMENT='Tabla para logs de prestamos';

--
-- Volcado de datos para la tabla `usuario_has_libro`
--

INSERT INTO `usuario_has_libro` (`usuario_dni`, `libro_categoria_id_categoria`, `libro_cod_apellido`, `libro_cod_titulo`, `fecha_hora_prestamo`, `fecha_hora_devolucion_propuesta`, `fecha_hora_devolucion_efectivo`) VALUES
(00000001, 700, 'Gar', ' Di', '2011/08/30-11:15:19', '0000-00-00 00:00:00', NULL),
(00000003, 700, 'All', 'xyz', '2011/08/24-10:00:42', '0000-00-00 00:00:00', NULL);

--
-- Restricciones para tablas volcadas
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
  ADD CONSTRAINT `fk_usuario_has_libro_libro1` FOREIGN KEY (`libro_categoria_id_categoria`, `libro_cod_apellido`, `libro_cod_titulo`) REFERENCES `libro` (`categoria_id_categoria`, `cod_apellido`, `cod_titulo`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_usuario_has_libro_usuario1` FOREIGN KEY (`usuario_dni`) REFERENCES `usuario` (`dni`) ON DELETE NO ACTION ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
