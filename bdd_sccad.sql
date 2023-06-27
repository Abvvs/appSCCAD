-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 27-06-2023 a las 00:44:31
-- Versión del servidor: 10.4.27-MariaDB
-- Versión de PHP: 8.0.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `bdd_sccad`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_empleados`
--

CREATE TABLE `tbl_empleados` (
  `emp_id` int(11) NOT NULL,
  `emp_estado` int(11) DEFAULT NULL,
  `emp_nombre` varchar(45) DEFAULT NULL,
  `emp_apellido` varchar(45) DEFAULT NULL,
  `emp_identificacion` varchar(45) DEFAULT NULL,
  `emp_direccion` varchar(45) DEFAULT NULL,
  `emp_salario` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;


-- Estructura de tabla para la tabla `tbl_emp_trb`
--

CREATE TABLE `tbl_emp_trb` (
  `etr_id` int(11) NOT NULL,
  `etr_estado` int(11) NOT NULL,
  `etr_observaciones` varchar(100) NOT NULL,
  `tbl_empleados_emp_id` int(11) NOT NULL,
  `tbl_trabajos_trb_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_trabajos`
--

CREATE TABLE `tbl_trabajos` (
  `trb_id` int(11) NOT NULL,
  `trb_estado` int(11) DEFAULT NULL,
  `trb_detalle` varchar(45) DEFAULT NULL,
  `trb_fecha` datetime DEFAULT NULL,
  `trb_direccion` varchar(45) DEFAULT NULL,
  `trb_telefono` varchar(45) DEFAULT NULL,
  `trb_total` double DEFAULT NULL,
  `trb_propietario` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_usuarios`
--

CREATE TABLE `tbl_usuarios` (
  `us_id` int(11) NOT NULL,
  `us_estado` int(11) DEFAULT NULL,
  `us_usuario` varchar(45) DEFAULT NULL,
  `us_password` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Volcado de datos para la tabla `tbl_usuarios`
--

INSERT INTO `tbl_usuarios` (`us_id`, `us_estado`, `us_usuario`, `us_password`) VALUES
(1, 1, 'admin', 'admin');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `tbl_empleados`
--
ALTER TABLE `tbl_empleados`
  ADD PRIMARY KEY (`emp_id`);

--
-- Indices de la tabla `tbl_emp_trb`
--
ALTER TABLE `tbl_emp_trb`
  ADD PRIMARY KEY (`etr_id`),
  ADD KEY `fk_tbl_emp_trb_tbl_empleados_id` (`tbl_empleados_emp_id`) USING BTREE,
  ADD KEY `fk_tbl_emp_trb_tbl_trabajos1_id` (`tbl_trabajos_trb_id`) USING BTREE;

--
-- Indices de la tabla `tbl_trabajos`
--
ALTER TABLE `tbl_trabajos`
  ADD PRIMARY KEY (`trb_id`);

--
-- Indices de la tabla `tbl_usuarios`
--
ALTER TABLE `tbl_usuarios`
  ADD PRIMARY KEY (`us_id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `tbl_empleados`
--
ALTER TABLE `tbl_empleados`
  MODIFY `emp_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=87;

--
-- AUTO_INCREMENT de la tabla `tbl_emp_trb`
--
ALTER TABLE `tbl_emp_trb`
  MODIFY `etr_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tbl_trabajos`
--
ALTER TABLE `tbl_trabajos`
  MODIFY `trb_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tbl_usuarios`
--
ALTER TABLE `tbl_usuarios`
  MODIFY `us_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `tbl_emp_trb`
--
ALTER TABLE `tbl_emp_trb`
  ADD CONSTRAINT `tbl_emp_trb_ibfk_1` FOREIGN KEY (`tbl_empleados_emp_id`) REFERENCES `tbl_empleados` (`emp_id`),
  ADD CONSTRAINT `tbl_emp_trb_ibfk_2` FOREIGN KEY (`tbl_trabajos_trb_id`) REFERENCES `tbl_trabajos` (`trb_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
