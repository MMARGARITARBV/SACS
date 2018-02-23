-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 23-02-2018 a las 20:52:28
-- Versión del servidor: 10.1.26-MariaDB
-- Versión de PHP: 7.1.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `siniestros`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `auto`
--

CREATE TABLE `auto` (
  `idAuto` varchar(11) COLLATE utf8_spanish_ci NOT NULL,
  `titPolzAuto` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `comAsegAuto` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `numPolzAuto` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `matriPolzAuto` varchar(10) COLLATE utf8_spanish_ci NOT NULL,
  `domicSiniAuto` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `provinSiniAuto` varchar(20) CHARACTER SET utf32 COLLATE utf32_spanish_ci NOT NULL,
  `fechaSiniAuto` date NOT NULL,
  `descripSiniAuto` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `fecha_publicacion` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `auto`
--

INSERT INTO `auto` (`idAuto`, `titPolzAuto`, `comAsegAuto`, `numPolzAuto`, `matriPolzAuto`, `domicSiniAuto`, `provinSiniAuto`, `fechaSiniAuto`, `descripSiniAuto`, `fecha_publicacion`) VALUES
('2', 'Pablo Lopez', 'Liberty', '4153', 'SDF7859', 'Calle Bejarano', 'Sevilla', '2018-02-04', 'Todo bien... una tontería', '2018-02-19 14:14:17'),
('3', 'Lucia Blanco', 'Genesis', '7894', '1238GFD', 'Calle Lucerito del alba', 'Jaen', '2017-12-13', 'Amistoso', '2018-02-21 17:51:32'),
('4', 'Lucas Negro', 'Liberty', '1478', '4567GFD', 'Calle sol', 'Jaen', '2018-01-09', 'A uno se le ha caido una uña', '2018-02-21 17:51:32'),
('9', 'hola ', 'hola', '1234', 'q tal', 'holla', 'hola', '2018-02-20', 'hola', '2018-02-21 19:27:52');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `diversospyme`
--

CREATE TABLE `diversospyme` (
  `idSiniDiverPyme` int(11) NOT NULL,
  `titPolzDiverPyme` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `telfTitPolzDiverPyme` int(13) NOT NULL,
  `comAsegDiverPyme` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `numPolzDiverPyme` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `DomicSiniDiverPyme` int(50) NOT NULL,
  `ProvinSiniDiverPyme` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `FechaSiniDiverPyme` date NOT NULL,
  `DescripSiniDiverPyme` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `TipoSiniDiverPyme` varchar(20) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `diversosrc`
--

CREATE TABLE `diversosrc` (
  `idSiniDiverRc` int(11) NOT NULL,
  `titPolizDiverRc` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `telfTitPolzDiverRc` int(13) NOT NULL,
  `comAsegDiverRc` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `numPolzDiverRc` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `DomicSiniDiverRc` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `provinSiniDiverRc` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `FechaSiniDiverRc` date NOT NULL,
  `DescripSiniDiverRc` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `tipoSiniDiverRc` varchar(20) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `gestor`
--

CREATE TABLE `gestor` (
  `idGestor` int(10) NOT NULL,
  `nombreGestoria` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `responsableGestoria` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `direccion` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `telefono` varchar(20) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `gestor`
--

INSERT INTO `gestor` (`idGestor`, `nombreGestoria`, `responsableGestoria`, `direccion`, `telefono`) VALUES
(1, 'Gestoría Palomares', 'David Palomares', 'Calle Palomares', '952555555'),
(2, 'Villa Linda', 'Carolina Villamizar', 'Calle Villa', '952333333'),
(3, 'Estrella', 'Estrella Morante', 'Calle Estrella', '952222222'),
(4, 'Gestoría Pino', 'Cruz Pino', 'Calle Pinito', '951111111'),
(5, 'Sol', 'Soledad Gomez', 'Calle Sol', '952345678'),
(6, 'Camina', 'David Busta', 'Calle Caminito', '952444444');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `titularpoliza`
--

CREATE TABLE `titularpoliza` (
  `IdTitPoliza` int(20) NOT NULL,
  `dniTitularPoliza` varchar(10) COLLATE utf8_spanish_ci NOT NULL,
  `NomCompletTitularPolz` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `DireccTitularPolz` varchar(50) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `id` int(2) NOT NULL,
  `usuario` varchar(10) COLLATE utf8_spanish_ci NOT NULL,
  `password` varchar(10) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id`, `usuario`, `password`) VALUES
(1, 'admin', 'admin'),
(2, 'usuario', 'usuario');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `auto`
--
ALTER TABLE `auto`
  ADD PRIMARY KEY (`idAuto`);

--
-- Indices de la tabla `diversospyme`
--
ALTER TABLE `diversospyme`
  ADD PRIMARY KEY (`idSiniDiverPyme`);

--
-- Indices de la tabla `diversosrc`
--
ALTER TABLE `diversosrc`
  ADD PRIMARY KEY (`idSiniDiverRc`);

--
-- Indices de la tabla `gestor`
--
ALTER TABLE `gestor`
  ADD PRIMARY KEY (`idGestor`);

--
-- Indices de la tabla `titularpoliza`
--
ALTER TABLE `titularpoliza`
  ADD PRIMARY KEY (`IdTitPoliza`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `diversospyme`
--
ALTER TABLE `diversospyme`
  MODIFY `idSiniDiverPyme` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `diversosrc`
--
ALTER TABLE `diversosrc`
  MODIFY `idSiniDiverRc` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `gestor`
--
ALTER TABLE `gestor`
  MODIFY `idGestor` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `titularpoliza`
--
ALTER TABLE `titularpoliza`
  MODIFY `IdTitPoliza` int(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
