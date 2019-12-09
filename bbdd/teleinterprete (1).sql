-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 10-12-2019 a las 00:55:21
-- Versión del servidor: 10.4.8-MariaDB
-- Versión de PHP: 7.3.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `teleinterprete`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categoria`
--

CREATE TABLE `categoria` (
  `id_categoria` int(3) NOT NULL,
  `nombre` varchar(50) COLLATE utf8mb4_spanish2_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;

--
-- Volcado de datos para la tabla `categoria`
--

INSERT INTO `categoria` (`id_categoria`, `nombre`) VALUES
(1, 'ATENCION AL CLIENTE'),
(2, 'PAGO FACTURAS'),
(3, 'MEDICO CABECERA'),
(4, 'ESPECIALISTA'),
(5, 'EDUCACION PRIMARIA'),
(6, 'EDUCACION SECUNDARIA'),
(7, 'EDUCACION UNIVERSITARIOS'),
(8, 'FORMACION ACADEMICA '),
(9, 'OTROS');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cita`
--

CREATE TABLE `cita` (
  `id_citas` int(10) NOT NULL,
  `id_usuario` int(3) DEFAULT NULL,
  `id_interprete` int(3) DEFAULT NULL,
  `id_servicio` int(3) DEFAULT NULL,
  `dia` date DEFAULT NULL,
  `hora_inicio` time DEFAULT NULL,
  `hora_fin` time DEFAULT '00:00:00',
  `total` int(8) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;

--
-- Volcado de datos para la tabla `cita`
--

INSERT INTO `cita` (`id_citas`, `id_usuario`, `id_interprete`, `id_servicio`, `dia`, `hora_inicio`, `hora_fin`, `total`) VALUES
(1, 1, 3, 1, '2018-11-21', '19:00:00', '21:00:00', 2),
(2, 2, 3, 1, '2018-11-22', '11:00:00', '15:00:00', 4),
(4, 2, 3, 2, '2019-12-03', '09:00:00', '15:00:00', 6),
(5, 2, 3, 1, '2019-12-05', '08:00:00', NULL, 0),
(6, 2, 3, 1, '2019-12-03', '07:00:00', NULL, 0),
(7, 2, 3, 1, '2019-12-03', '07:00:00', NULL, 0),
(8, 2, 3, 1, '2019-12-13', '04:00:00', NULL, 0),
(9, 2, 3, 1, '2019-12-13', '04:00:00', NULL, 0),
(10, 2, 3, 1, '2019-12-13', '04:00:00', NULL, 0),
(11, 2, 3, 1, '2019-12-13', '04:00:00', NULL, 0),
(12, 2, 3, 1, '2019-12-13', '04:00:00', NULL, 0),
(13, 2, 3, 1, '2019-12-13', '04:00:00', NULL, 0),
(14, 2, 3, 1, '2019-12-13', '04:00:00', NULL, 0),
(15, 2, 3, 1, '2019-12-13', '04:00:00', '00:20:19', 3),
(16, 2, 3, 1, '2019-12-13', '04:00:00', NULL, 0),
(17, 2, 3, 1, '2019-12-21', '12:00:00', NULL, 0),
(18, 2, 3, 1, '2019-12-21', '12:00:00', NULL, 0),
(19, 2, 3, 1, '2019-12-21', '12:00:00', NULL, 0),
(20, 2, 3, 1, '2019-12-21', '12:00:00', NULL, 0),
(21, 2, 3, 1, '2019-12-05', '09:00:00', NULL, 0),
(23, 2, 3, 2, '2020-01-09', '10:00:00', NULL, 0),
(24, 2, 3, 2, '2020-01-09', '10:00:00', NULL, 0),
(25, 2, 3, 2, '2020-01-09', '10:00:00', NULL, 0),
(26, 2, 3, 2, '2019-12-26', '20:00:00', NULL, 0),
(27, 2, 3, 2, '2019-12-26', '20:00:00', NULL, 0),
(28, 2, 3, 1, '2019-12-14', '04:00:00', NULL, 0),
(29, 2, 3, 1, '2019-12-14', '04:00:00', NULL, 0),
(30, 2, 3, 1, '0000-00-00', '00:00:00', NULL, 0),
(31, 2, 3, 1, '0000-00-00', '00:00:00', NULL, 0),
(32, 2, 3, 1, '0000-00-00', '00:00:00', NULL, 0),
(33, 2, 3, 2, '2019-12-25', '23:00:00', NULL, 0),
(34, 3, 3, 4, '2019-06-22', '15:00:00', '16:00:00', 1),
(35, 3, 3, 3, '2019-11-22', '18:00:00', '21:00:00', 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empresa`
--

CREATE TABLE `empresa` (
  `id_empresa` int(3) NOT NULL,
  `cif` varchar(12) COLLATE utf8mb4_spanish2_ci NOT NULL,
  `nombre` varchar(20) COLLATE utf8mb4_spanish2_ci NOT NULL,
  `direccion` varchar(100) COLLATE utf8mb4_spanish2_ci DEFAULT NULL,
  `cp` int(5) NOT NULL,
  `ciudad` varchar(30) COLLATE utf8mb4_spanish2_ci DEFAULT NULL,
  `provincia` int(9) DEFAULT NULL,
  `personal_contacto` varchar(20) COLLATE utf8mb4_spanish2_ci NOT NULL,
  `telefono_contacto` int(9) NOT NULL,
  `visible` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;

--
-- Volcado de datos para la tabla `empresa`
--

INSERT INTO `empresa` (`id_empresa`, `cif`, `nombre`, `direccion`, `cp`, `ciudad`, `provincia`, `personal_contacto`, `telefono_contacto`, `visible`) VALUES
(1, '47312748X', 'Telefonica', 'Gran via 16', 28001, 'Madrid', 28, 'MJ', 2147483647, 1),
(2, '04417456P', 'CEACC', NULL, 1026, 'Galicia', 15, 'Pepe', 2147483647, 1),
(3, '654783M', 'Ayto.Madrid', 'Cibeles', 28001, 'Madrid', 28, 'Manuela', 2147483647, 1),
(4, '66985120Q', 'Vithas', 'Arturo Soria, 37', 28056, 'Madrid', 28, 'Jesus', 2147483647, 1),
(5, 'H', 'Pinturas Pepe', 'Sandovall', 1862, 'Toledo', NULL, 'Jose', 626303647, 1),
(6, '23846517R', 'Fontanería Luis', 'Quintana 36', 29047, 'Madrid', 29, 'Luis', 68745236, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `interprete`
--

CREATE TABLE `interprete` (
  `id_interprete` int(3) NOT NULL,
  `nombre` varchar(20) COLLATE utf8mb4_spanish2_ci NOT NULL,
  `apellido` varchar(15) COLLATE utf8mb4_spanish2_ci DEFAULT NULL,
  `apellido2` varchar(15) COLLATE utf8mb4_spanish2_ci DEFAULT NULL,
  `dni` varchar(9) COLLATE utf8mb4_spanish2_ci NOT NULL,
  `direccion` varchar(100) COLLATE utf8mb4_spanish2_ci DEFAULT NULL,
  `provincia` int(11) DEFAULT NULL,
  `telefono` varchar(9) COLLATE utf8mb4_spanish2_ci DEFAULT NULL,
  `email` varchar(50) COLLATE utf8mb4_spanish2_ci NOT NULL,
  `contrasena` varchar(180) COLLATE utf8mb4_spanish2_ci NOT NULL,
  `urgencias` tinyint(1) DEFAULT 0,
  `categoria` int(2) NOT NULL DEFAULT 1,
  `nCC` int(20) DEFAULT NULL,
  `visible` int(11) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;

--
-- Volcado de datos para la tabla `interprete`
--

INSERT INTO `interprete` (`id_interprete`, `nombre`, `apellido`, `apellido2`, `dni`, `direccion`, `provincia`, `telefono`, `email`, `contrasena`, `urgencias`, `categoria`, `nCC`, `visible`) VALUES
(1, 'Paloma', 'Baamer', 'Ruiz', '05315823V', 'general romero', 1, '689456123', 'baameiro.r.paloma@gmail.com', 'bf14f2eab89229b72e52fa0c3eafa2f5897ba18a', 0, 0, 2147483647, 1),
(2, 'David', 'Monty', 'Python', '03525668V', 'general romero', 1, '689456123', 'david@gmail.com', '906c95477e6b41e2573130ebb517d0bfec2b9c5e', NULL, 1, 2147483647, 1),
(3, 'Milena', 'Cuba', 'Ruiz', '31663180H', 'general romero', 29, '689456123', 'milena@gmail.com', 'dbde9a227ba31fa4b9405ea0f783d2a3456720d3', 1, 1, 2147483647, 1),
(4, 'Rosa', 'Del Río', 'Perez', '43651516G', 'Oro , 86', 46, '699365847', 'rosa@gmail.com', '677c46eec8fe2d09cb420d50bff34be5511f356c', NULL, 1, 2147483647, 1),
(8, 'Dora', 'Exploradora', 'Camino', '8888777P', 'Aventura ,1 ', 29, '666555414', 'dora@gmail.com', 'da39a3ee5e6b4b0d3255bfef95601890afd80709', NULL, 1, 2147483647, 1),
(9, 'Dora', 'Exploradora', 'Camino', '8888777P', 'Aventura ,1 ', 18, '666555414', 'dora@gmail.com', 'ad45e4d104a78cf12f3bd982bd5376bf6bc90521', NULL, 1, 2147483647, 1),
(10, 'Fermin', 'Trujillo', 'Lopez', '3344555D', 'Fez', 34, '644885512', 'fermin@gmail.com', 'ad45e4d104a78cf12f3bd982bd5376bf6bc90521', NULL, 1, 2147483647, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `provincias`
--

CREATE TABLE `provincias` (
  `id_provincia` int(11) NOT NULL,
  `nombre` varchar(50) COLLATE utf8mb4_spanish2_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;

--
-- Volcado de datos para la tabla `provincias`
--

INSERT INTO `provincias` (`id_provincia`, `nombre`) VALUES
(1, 'Araba/?lava'),
(2, 'Albacete'),
(3, 'Alicante/Alacant'),
(4, 'Almer?a'),
(5, '?vila'),
(6, 'Badajoz'),
(7, 'Balears, Illes'),
(8, 'Barcelona'),
(9, 'Burgos'),
(10, 'C?ceres'),
(11, 'C?diz'),
(12, 'Castell?n/Castell?'),
(13, 'Ciudad Real'),
(14, 'C?rdoba'),
(15, 'Coru?a, A'),
(16, 'Cuenca'),
(17, 'Girona'),
(18, 'Granada'),
(19, 'Guadalajara'),
(20, 'Gipuzkoa'),
(21, 'Huelva'),
(22, 'Huesca'),
(23, 'Ja?n'),
(24, 'Le?n'),
(25, 'Lleida'),
(26, 'Rioja, La'),
(27, 'Lugo'),
(28, 'Madrid'),
(29, 'M?laga'),
(30, 'Murcia'),
(31, 'Navarra'),
(32, 'Ourense'),
(33, 'Asturias'),
(34, 'Palencia'),
(35, 'Palmas, Las'),
(36, 'Pontevedra'),
(37, 'Salamanca'),
(38, 'Santa Cruz de Tenerife'),
(39, 'Cantabria'),
(40, 'Segovia'),
(41, 'Sevilla'),
(42, 'Soria'),
(43, 'Tarragona'),
(44, 'Teruel'),
(45, 'Toledo'),
(46, 'Valencia/Val?ncia'),
(47, 'Valladolid'),
(48, 'Bizkaia'),
(49, 'Zamora'),
(50, 'Zaragoza'),
(51, 'Ceuta'),
(52, 'Melilla');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `servicio`
--

CREATE TABLE `servicio` (
  `id_servicio` int(3) NOT NULL,
  `id_empresa` int(3) DEFAULT NULL,
  `categoria` int(3) DEFAULT NULL,
  `especialidad` varchar(50) COLLATE utf8mb4_spanish2_ci DEFAULT NULL,
  `centro` varchar(40) COLLATE utf8mb4_spanish2_ci NOT NULL,
  `visible` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;

--
-- Volcado de datos para la tabla `servicio`
--

INSERT INTO `servicio` (`id_servicio`, `id_empresa`, `categoria`, `especialidad`, `centro`, `visible`) VALUES
(1, 1, 1, 'Gran via, 56', 'reclamacion', 1),
(2, 3, 4, 'Hosp.12 Oct', 'oncologia', 1),
(3, 1, 2, 'pago facturas', 'Gran via, 56', 1),
(4, 1, 9, 'exposici?n marte', 'Gran v?a, 56', 1),
(5, 1, 9, 'Exposicion tecnologia', 'Gran via 16', 1),
(7, 3, 5, '1E', 'Colegio Tirso de Molina,Madrid', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `id_usuario` int(3) NOT NULL,
  `nombre` varchar(20) COLLATE utf8mb4_spanish2_ci NOT NULL,
  `apellido` varchar(15) COLLATE utf8mb4_spanish2_ci DEFAULT NULL,
  `apellido2` varchar(15) COLLATE utf8mb4_spanish2_ci DEFAULT NULL,
  `dni` varchar(9) COLLATE utf8mb4_spanish2_ci NOT NULL,
  `direccion` varchar(100) COLLATE utf8mb4_spanish2_ci DEFAULT NULL,
  `provincia` int(11) DEFAULT NULL,
  `telefono` varchar(9) COLLATE utf8mb4_spanish2_ci DEFAULT NULL,
  `email` varchar(50) COLLATE utf8mb4_spanish2_ci NOT NULL,
  `contrasena` varchar(180) COLLATE utf8mb4_spanish2_ci NOT NULL,
  `visible` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id_usuario`, `nombre`, `apellido`, `apellido2`, `dni`, `direccion`, `provincia`, `telefono`, `email`, `contrasena`, `visible`) VALUES
(1, 'Puri', 'Garcia', 'Bernardo', '54786231G', 'Plaza Castilla, 54', 28, '64598712', 'puri@gmail.com', 'ada6d34bca926b40be00893cabc0aeae138ea2a0', 1),
(2, 'Esperanza', 'Petrov', 'Menendez', '54786231G', 'Plaza Castilla3', NULL, '64598712', 'espe@gmail.com', '515ab0557a960be2bcc227943c20de357fb5672d', 1),
(3, 'Basi', 'Cano', 'Rodriguez', '48751684D', 'Cigueña,156', 42, '699485621', 'basi@gmail.com', 'cd016c515962508538b851783fee065726058a4a', 1),
(4, 'Gema', 'Aranda', 'Cascón', '74658954Y', 'Antonio Nebrija, 6', 28, '658743204', 'gema@gmail.com', '3077ac558f0bb4c8c4834e6907f6ee0fa5b45171', 0),
(5, 'Ramon', 'Ruiz', 'Rodriguez', '4455666F', 'Oro , 86', 24, '666555414', 'ramon@gmail.com', '0a5c0018b56b509b5061ed054c2fb0c8ba67039f', 1),
(6, 'Amapola', 'Ramos', 'Santos', '88777444S', 'Fuentes ', 43, '676358457', 'amapola@gmail.com', '39e2e3c16e0bcf2bac6b6cdd02e2cb6b74a7f1ac', 1);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `categoria`
--
ALTER TABLE `categoria`
  ADD PRIMARY KEY (`id_categoria`);

--
-- Indices de la tabla `cita`
--
ALTER TABLE `cita`
  ADD PRIMARY KEY (`id_citas`),
  ADD KEY `FK_usuario` (`id_usuario`),
  ADD KEY `FK_interprete` (`id_interprete`),
  ADD KEY `FK_servicio` (`id_servicio`);

--
-- Indices de la tabla `empresa`
--
ALTER TABLE `empresa`
  ADD PRIMARY KEY (`id_empresa`),
  ADD KEY `FK_provincias` (`provincia`);

--
-- Indices de la tabla `interprete`
--
ALTER TABLE `interprete`
  ADD PRIMARY KEY (`id_interprete`);

--
-- Indices de la tabla `provincias`
--
ALTER TABLE `provincias`
  ADD PRIMARY KEY (`id_provincia`);

--
-- Indices de la tabla `servicio`
--
ALTER TABLE `servicio`
  ADD PRIMARY KEY (`id_servicio`),
  ADD KEY `FK_categoria` (`categoria`),
  ADD KEY `FK_empresa` (`id_empresa`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id_usuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `categoria`
--
ALTER TABLE `categoria`
  MODIFY `id_categoria` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `cita`
--
ALTER TABLE `cita`
  MODIFY `id_citas` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT de la tabla `empresa`
--
ALTER TABLE `empresa`
  MODIFY `id_empresa` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT de la tabla `interprete`
--
ALTER TABLE `interprete`
  MODIFY `id_interprete` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `provincias`
--
ALTER TABLE `provincias`
  MODIFY `id_provincia` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT de la tabla `servicio`
--
ALTER TABLE `servicio`
  MODIFY `id_servicio` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id_usuario` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `cita`
--
ALTER TABLE `cita`
  ADD CONSTRAINT `FK_interprete` FOREIGN KEY (`id_interprete`) REFERENCES `interprete` (`id_interprete`),
  ADD CONSTRAINT `FK_servicio` FOREIGN KEY (`id_servicio`) REFERENCES `servicio` (`id_servicio`),
  ADD CONSTRAINT `FK_usuario` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id_usuario`);

--
-- Filtros para la tabla `empresa`
--
ALTER TABLE `empresa`
  ADD CONSTRAINT `FK_provincias` FOREIGN KEY (`provincia`) REFERENCES `provincias` (`id_provincia`);

--
-- Filtros para la tabla `servicio`
--
ALTER TABLE `servicio`
  ADD CONSTRAINT `FK_categoria` FOREIGN KEY (`categoria`) REFERENCES `categoria` (`id_categoria`),
  ADD CONSTRAINT `FK_empresa` FOREIGN KEY (`id_empresa`) REFERENCES `empresa` (`id_empresa`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
