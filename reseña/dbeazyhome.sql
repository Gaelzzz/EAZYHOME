-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 05-08-2025 a las 05:27:16
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.1.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `dbeazyhome`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `admin`
--

CREATE TABLE `admin` (
  `Id_admin` int(11) NOT NULL,
  `correo` varchar(100) NOT NULL,
  `contrasena` varchar(255) NOT NULL,
  `nivel` varchar(50) DEFAULT NULL,
  `nombre` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `citas`
--

CREATE TABLE `citas` (
  `Id_cita` int(11) NOT NULL,
  `Id_cliente` int(11) DEFAULT NULL,
  `Id_serv` int(11) DEFAULT NULL,
  `descripcion_trabajo` text DEFAULT NULL,
  `fecha` date DEFAULT NULL,
  `urgencia` enum('Baja','Media','Alta') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clientes`
--

CREATE TABLE `clientes` (
  `id_cliente` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `apellido` varchar(100) NOT NULL,
  `telefono` varchar(20) DEFAULT NULL,
  `correo` varchar(100) NOT NULL,
  `fecha_nacimiento` date DEFAULT NULL,
  `contrasena` varchar(255) NOT NULL,
  `direccion` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `clientes`
--

INSERT INTO `clientes` (`id_cliente`, `nombre`, `apellido`, `telefono`, `correo`, `fecha_nacimiento`, `contrasena`, `direccion`) VALUES
(1, 'Test', 'User', NULL, 'test@example.com', '2000-01-01', 'password123', NULL),
(3, 'Test', 'User', NULL, 'test@gmail.com', '2000-01-01', 'test123', NULL),
(4, 'Juan', 'Perez', '6692299866', 'juan@test.com', '2000-01-01', '$2y$10$W3w7oW3XpABvhNNsevrdtuOMwrqZs691cMIHBCKxUpp5U676wxbjS', NULL),
(5, 'Pedro', 'Alfonsio', '675675443', 'pedrito@gmail.com', '2025-07-02', '$2y$10$vwVdVP73ZX5QQwmhflnbCuecDJk.yfcFp04iHea/c4HSViLlBIpRi', NULL),
(6, 'Mya', 'Valdes', '6691242226', 'mya@gmail.com', '2025-07-02', '$2y$10$ozQQEQv9Xkgv9QF5p9/n3O.3E2lU.E.YhIwHyIb9tUyq.1TSDzl3W', NULL),
(7, 'Vanesa', 'Perez', '6692299866', 'vanesa@gmail.com', '2025-07-02', '$2y$10$ocMvY9.LwVNW6tTaq4jiZO94m6j3seWep5CNy2B8/hSFK1wRkEDOS', NULL),
(8, ' nicole', 'hsfbisjdb', '6692299866', 'niicole@hotmail.com', '2005-12-21', '$2y$10$YLqCsDyFPEa6CLqn5Yt2NO8EKvvbS.p2hbjUCT8Qey8xr3O0J/9ZW', NULL),
(9, 'Estefani', 'Sanchez Diaz', '6691321971', 'estef12@gmail.com', '2004-07-12', '$2y$10$IQhRTprfLWp9WP.g1FK73.AVR4R1BsfRrM35itG3FoQHr49cbB/HO', NULL),
(10, 'Gael', 'Perez', '6692299866', 'gael@gmail.com', '2025-07-02', '$2y$10$Eo40W1vGNeo0A3vS6GVKmOy8lJ1PyLJDQzVIE6pXu7urK.JsC9APW', NULL),
(11, 'Gael', 'Perez', '+526692299866', 'gael21@gmail.com', '2025-07-07', '$2y$10$dmRuRRyOjLQv8xkNHvNoY.Udke4ULCMlY8XqDCs2XKvw.s34B9m/K', NULL),
(12, 'Pablito', 'Coquito', '6694675903', 'kokito123@gmail.com', '2003-01-14', '$2y$10$FCc6QFT7SPJx3sgiiefBpeaBoY32aR5F0R14L2T6o/FU.lo7J8d8.', NULL),
(13, 'nicole ', 'ontiveros ', '6692472591', 'niicole_21@hotmail.com', '2005-12-21', '$2y$10$f5Zn7BYv8oGqxP6XxaJrPOnLSwdWDS1l/AuXpqFOBFVgIKpGiRGm6', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `contratar`
--

CREATE TABLE `contratar` (
  `Id_contrato` int(11) NOT NULL,
  `Id_cliente` int(11) DEFAULT NULL,
  `Id_serv` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `contratista`
--

CREATE TABLE `contratista` (
  `Id_contratista` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `apellido` varchar(100) NOT NULL,
  `telefono` varchar(20) DEFAULT NULL,
  `correo` varchar(100) DEFAULT NULL,
  `direccion` text DEFAULT NULL,
  `CURP` varchar(18) DEFAULT NULL,
  `RFC` varchar(13) DEFAULT NULL,
  `calificacion` decimal(2,1) DEFAULT NULL,
  `Id_serv` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cotizaciones`
--

CREATE TABLE `cotizaciones` (
  `id` int(11) NOT NULL,
  `id_direccion` int(11) DEFAULT NULL,
  `usuario_email` varchar(100) DEFAULT NULL,
  `servicio` varchar(50) DEFAULT NULL,
  `descripcion` text DEFAULT NULL,
  `fecha` date DEFAULT NULL,
  `urgencia` varchar(20) DEFAULT NULL,
  `direccion_old` varchar(255) DEFAULT NULL,
  `fecha_envio` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `cotizaciones`
--

INSERT INTO `cotizaciones` (`id`, `id_direccion`, `usuario_email`, `servicio`, `descripcion`, `fecha`, `urgencia`, `direccion_old`, `fecha_envio`) VALUES
(1, NULL, 'niicole@hotmail.com', 'electricidad', 'jfhf', '2006-06-07', 'urgente', 'hghghg', '2025-07-02 19:48:28'),
(2, NULL, 'estef12@gmail.com', 'pintura', 'Necesito que me pinten mi cuarto, desconozco  las medidas, ya tengo el material, solo necesito la mano de obra. ', '2025-07-20', 'normal', 'Tauro 3512 Villa Galaxia', '2025-07-02 20:00:54'),
(3, NULL, 'gael@gmail.com', 'electricidad', 'hola', '2025-07-02', 'urgente', 'upsin', '2025-07-02 21:01:01'),
(4, NULL, 'gael21@gmail.com', 'electricidad', 'pintar la casa', '2025-07-11', 'urgente', 'upsin', '2025-07-07 16:12:08');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `direcciones_cliente`
--

CREATE TABLE `direcciones_cliente` (
  `id_direccion` int(11) NOT NULL,
  `id_cliente` int(11) NOT NULL,
  `direccion_completa` varchar(255) NOT NULL,
  `alias` varchar(100) DEFAULT NULL,
  `ciudad` varchar(100) DEFAULT NULL,
  `estado` varchar(50) DEFAULT NULL,
  `codigo_postal` varchar(20) DEFAULT NULL,
  `referencias` text DEFAULT NULL,
  `fecha_registro` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `realizar`
--

CREATE TABLE `realizar` (
  `Id_realizar` int(11) NOT NULL,
  `Id_contratista` int(11) DEFAULT NULL,
  `Id_serv` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `servicios`
--

CREATE TABLE `servicios` (
  `Id_serv` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`Id_admin`),
  ADD UNIQUE KEY `correo` (`correo`);

--
-- Indices de la tabla `citas`
--
ALTER TABLE `citas`
  ADD PRIMARY KEY (`Id_cita`),
  ADD KEY `Id_serv` (`Id_serv`),
  ADD KEY `citas_ibfk_1` (`Id_cliente`);

--
-- Indices de la tabla `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`id_cliente`),
  ADD UNIQUE KEY `correo` (`correo`),
  ADD UNIQUE KEY `correo_2` (`correo`);

--
-- Indices de la tabla `contratar`
--
ALTER TABLE `contratar`
  ADD PRIMARY KEY (`Id_contrato`),
  ADD KEY `Id_serv` (`Id_serv`),
  ADD KEY `contratar_ibfk_1` (`Id_cliente`);

--
-- Indices de la tabla `contratista`
--
ALTER TABLE `contratista`
  ADD PRIMARY KEY (`Id_contratista`),
  ADD UNIQUE KEY `correo` (`correo`),
  ADD KEY `Id_serv` (`Id_serv`);

--
-- Indices de la tabla `cotizaciones`
--
ALTER TABLE `cotizaciones`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_cotizacion_direccion` (`id_direccion`);

--
-- Indices de la tabla `direcciones_cliente`
--
ALTER TABLE `direcciones_cliente`
  ADD PRIMARY KEY (`id_direccion`),
  ADD KEY `id_cliente` (`id_cliente`);

--
-- Indices de la tabla `realizar`
--
ALTER TABLE `realizar`
  ADD PRIMARY KEY (`Id_realizar`),
  ADD KEY `Id_contratista` (`Id_contratista`),
  ADD KEY `Id_serv` (`Id_serv`);

--
-- Indices de la tabla `servicios`
--
ALTER TABLE `servicios`
  ADD PRIMARY KEY (`Id_serv`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `citas`
--
ALTER TABLE `citas`
  MODIFY `Id_cita` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `clientes`
--
ALTER TABLE `clientes`
  MODIFY `id_cliente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de la tabla `contratar`
--
ALTER TABLE `contratar`
  MODIFY `Id_contrato` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `contratista`
--
ALTER TABLE `contratista`
  MODIFY `Id_contratista` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `cotizaciones`
--
ALTER TABLE `cotizaciones`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `direcciones_cliente`
--
ALTER TABLE `direcciones_cliente`
  MODIFY `id_direccion` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `realizar`
--
ALTER TABLE `realizar`
  MODIFY `Id_realizar` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `servicios`
--
ALTER TABLE `servicios`
  MODIFY `Id_serv` int(11) NOT NULL AUTO_INCREMENT;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `citas`
--
ALTER TABLE `citas`
  ADD CONSTRAINT `citas_ibfk_2` FOREIGN KEY (`Id_serv`) REFERENCES `servicios` (`Id_serv`);

--
-- Filtros para la tabla `contratar`
--
ALTER TABLE `contratar`
  ADD CONSTRAINT `contratar_ibfk_2` FOREIGN KEY (`Id_serv`) REFERENCES `servicios` (`Id_serv`);

--
-- Filtros para la tabla `contratista`
--
ALTER TABLE `contratista`
  ADD CONSTRAINT `contratista_ibfk_1` FOREIGN KEY (`Id_serv`) REFERENCES `servicios` (`Id_serv`);

--
-- Filtros para la tabla `cotizaciones`
--
ALTER TABLE `cotizaciones`
  ADD CONSTRAINT `fk_cotizacion_direccion` FOREIGN KEY (`id_direccion`) REFERENCES `direcciones_cliente` (`id_direccion`);

--
-- Filtros para la tabla `direcciones_cliente`
--
ALTER TABLE `direcciones_cliente`
  ADD CONSTRAINT `direcciones_cliente_ibfk_1` FOREIGN KEY (`id_cliente`) REFERENCES `clientes` (`id_cliente`) ON DELETE CASCADE;

--
-- Filtros para la tabla `realizar`
--
ALTER TABLE `realizar`
  ADD CONSTRAINT `realizar_ibfk_1` FOREIGN KEY (`Id_contratista`) REFERENCES `contratista` (`Id_contratista`),
  ADD CONSTRAINT `realizar_ibfk_2` FOREIGN KEY (`Id_serv`) REFERENCES `servicios` (`Id_serv`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
