-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 12-11-2019 a las 18:42:43
-- Versión del servidor: 10.4.8-MariaDB
-- Versión de PHP: 7.3.10

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
-- Estructura de tabla para la tabla `disponibilidad`
--

CREATE TABLE `disponibilidad` (
  `id_disponible` int(11) NOT NULL,
  `disponibilidad` datetime NOT NULL,
  `estado` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empresa`
--

CREATE TABLE `empresa` (
  `id_empresa` int(11) NOT NULL,
  `nombre` varchar(20) NOT NULL,
  `responsable` varchar(20) NOT NULL,
  `cif` varchar(9) NOT NULL,
  `telefono` int(9) NOT NULL,
  `email` varchar(20) NOT NULL,
  `contraseña` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empresa_genera_servicio`
--

CREATE TABLE `empresa_genera_servicio` (
  `id_servicio_generado` int(11) NOT NULL,
  `id_servicio` int(11) NOT NULL,
  `id_empresa` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empresa_paga_interprete`
--

CREATE TABLE `empresa_paga_interprete` (
  `id_factura` int(11) NOT NULL,
  `id_empresa` int(11) NOT NULL,
  `id_interprete` int(11) NOT NULL,
  `fecha` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `interprete`
--

CREATE TABLE `interprete` (
  `id_interprete` int(11) NOT NULL,
  `nombre` varchar(10) NOT NULL,
  `apellido` varchar(15) NOT NULL,
  `apellido2` varchar(15) NOT NULL,
  `dni` varchar(9) NOT NULL,
  `direccion` varchar(20) NOT NULL,
  `telefono` varchar(9) NOT NULL,
  `email` varchar(30) NOT NULL,
  `contraseña` varchar(20) NOT NULL,
  `nCC` int(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `interprete_tiene_disponibilidad`
--

CREATE TABLE `interprete_tiene_disponibilidad` (
  `id_disponible` int(11) NOT NULL,
  `id_interprete` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `servicios`
--

CREATE TABLE `servicios` (
  `id_servicio` int(11) NOT NULL,
  `tipo` varchar(20) NOT NULL,
  `fecha_dia` datetime NOT NULL,
  `id_interprete` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `servicio_es_solicitado_por_usuario`
--

CREATE TABLE `servicio_es_solicitado_por_usuario` (
  `id_servicio_prestado` int(11) NOT NULL,
  `id_servicio` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `fecha_inic` datetime NOT NULL,
  `fecha_fin` datetime NOT NULL,
  `observaciones` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `id_usuario` int(11) NOT NULL,
  `nombre` varchar(10) NOT NULL,
  `apellido` varchar(15) NOT NULL,
  `apellido2` varchar(15) NOT NULL,
  `dni` varchar(9) NOT NULL,
  `direccion` varchar(20) NOT NULL,
  `telefono` varchar(9) NOT NULL,
  `email` varchar(30) NOT NULL,
  `contraseña` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `disponibilidad`
--
ALTER TABLE `disponibilidad`
  ADD PRIMARY KEY (`id_disponible`);

--
-- Indices de la tabla `empresa`
--
ALTER TABLE `empresa`
  ADD PRIMARY KEY (`id_empresa`);

--
-- Indices de la tabla `empresa_genera_servicio`
--
ALTER TABLE `empresa_genera_servicio`
  ADD PRIMARY KEY (`id_servicio_generado`),
  ADD KEY `id_servicio` (`id_servicio`),
  ADD KEY `id_empresa` (`id_empresa`);

--
-- Indices de la tabla `empresa_paga_interprete`
--
ALTER TABLE `empresa_paga_interprete`
  ADD PRIMARY KEY (`id_factura`),
  ADD KEY `id_empresa` (`id_empresa`),
  ADD KEY `id_interprete` (`id_interprete`);

--
-- Indices de la tabla `interprete`
--
ALTER TABLE `interprete`
  ADD PRIMARY KEY (`id_interprete`);

--
-- Indices de la tabla `interprete_tiene_disponibilidad`
--
ALTER TABLE `interprete_tiene_disponibilidad`
  ADD PRIMARY KEY (`id_disponible`),
  ADD KEY `id_interprete` (`id_interprete`);

--
-- Indices de la tabla `servicios`
--
ALTER TABLE `servicios`
  ADD PRIMARY KEY (`id_servicio`),
  ADD KEY `id_interprete` (`id_interprete`);

--
-- Indices de la tabla `servicio_es_solicitado_por_usuario`
--
ALTER TABLE `servicio_es_solicitado_por_usuario`
  ADD PRIMARY KEY (`id_servicio_prestado`),
  ADD KEY `id_servicio` (`id_servicio`),
  ADD KEY `id_usuario` (`id_usuario`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id_usuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `disponibilidad`
--
ALTER TABLE `disponibilidad`
  MODIFY `id_disponible` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `empresa`
--
ALTER TABLE `empresa`
  MODIFY `id_empresa` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `empresa_genera_servicio`
--
ALTER TABLE `empresa_genera_servicio`
  MODIFY `id_servicio_generado` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `empresa_paga_interprete`
--
ALTER TABLE `empresa_paga_interprete`
  MODIFY `id_factura` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `interprete`
--
ALTER TABLE `interprete`
  MODIFY `id_interprete` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `interprete_tiene_disponibilidad`
--
ALTER TABLE `interprete_tiene_disponibilidad`
  MODIFY `id_disponible` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `servicios`
--
ALTER TABLE `servicios`
  MODIFY `id_servicio` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `servicio_es_solicitado_por_usuario`
--
ALTER TABLE `servicio_es_solicitado_por_usuario`
  MODIFY `id_servicio_prestado` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `empresa_genera_servicio`
--
ALTER TABLE `empresa_genera_servicio`
  ADD CONSTRAINT `empresa_genera_servicio_ibfk_1` FOREIGN KEY (`id_servicio`) REFERENCES `servicios` (`id_servicio`),
  ADD CONSTRAINT `empresa_genera_servicio_ibfk_2` FOREIGN KEY (`id_empresa`) REFERENCES `empresa` (`id_empresa`);

--
-- Filtros para la tabla `empresa_paga_interprete`
--
ALTER TABLE `empresa_paga_interprete`
  ADD CONSTRAINT `empresa_paga_interprete_ibfk_1` FOREIGN KEY (`id_empresa`) REFERENCES `empresa` (`id_empresa`),
  ADD CONSTRAINT `empresa_paga_interprete_ibfk_2` FOREIGN KEY (`id_interprete`) REFERENCES `interprete` (`id_interprete`);

--
-- Filtros para la tabla `interprete_tiene_disponibilidad`
--
ALTER TABLE `interprete_tiene_disponibilidad`
  ADD CONSTRAINT `interprete_tiene_disponibilidad_ibfk_1` FOREIGN KEY (`id_disponible`) REFERENCES `disponibilidad` (`id_disponible`),
  ADD CONSTRAINT `interprete_tiene_disponibilidad_ibfk_2` FOREIGN KEY (`id_interprete`) REFERENCES `interprete` (`id_interprete`);

--
-- Filtros para la tabla `servicios`
--
ALTER TABLE `servicios`
  ADD CONSTRAINT `servicios_ibfk_1` FOREIGN KEY (`id_interprete`) REFERENCES `interprete` (`id_interprete`);

--
-- Filtros para la tabla `servicio_es_solicitado_por_usuario`
--
ALTER TABLE `servicio_es_solicitado_por_usuario`
  ADD CONSTRAINT `servicio_es_solicitado_por_usuario_ibfk_1` FOREIGN KEY (`id_servicio`) REFERENCES `servicios` (`id_servicio`),
  ADD CONSTRAINT `servicio_es_solicitado_por_usuario_ibfk_2` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id_usuario`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
