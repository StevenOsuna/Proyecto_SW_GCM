-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 19-05-2026 a las 05:44:44
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `consultorio`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `administradores`
--

CREATE TABLE `administradores` (
  `id` int(11) NOT NULL,
  `usuario` varchar(50) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `administradores`
--

INSERT INTO `administradores` (`id`, `usuario`, `password`) VALUES
(1, 'admin', '$2y$10$nOiRiOXbvc.Y6aGK//QTW.Dd85VGCJWz2zdreEVsfZ/AiuuHf6Soi'),
(2, 'admin2', '$2y$10$G4V8BhO4wAgsyocO8XkBKejr8k4XA0IrJvJ1JmZ5H1JnoAY/V1HES');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `citas`
--

CREATE TABLE `citas` (
  `id` int(11) NOT NULL,
  `paciente_id` int(11) DEFAULT NULL,
  `fecha` date DEFAULT NULL,
  `hora` time DEFAULT NULL,
  `estado` varchar(50) DEFAULT 'Agendada'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `citas`
--

INSERT INTO `citas` (`id`, `paciente_id`, `fecha`, `hora`, `estado`) VALUES
(1, 1, '2026-02-22', '09:00:00', 'Agendada'),
(2, 1, '0000-00-00', '00:00:00', 'Agendada'),
(3, 1, '2026-02-22', '10:00:00', 'Agendada'),
(4, 6, '2026-05-22', '13:00:00', 'Agendada'),
(5, 6, '2026-05-22', '14:00:00', 'Agendada');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `dias_bloqueados`
--

CREATE TABLE `dias_bloqueados` (
  `id` int(11) NOT NULL,
  `fecha` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `dias_bloqueados`
--

INSERT INTO `dias_bloqueados` (`id`, `fecha`) VALUES
(1, '2026-05-20');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `horarios`
--

CREATE TABLE `horarios` (
  `id` int(11) NOT NULL,
  `hora` time NOT NULL,
  `activo` tinyint(1) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `horarios`
--

INSERT INTO `horarios` (`id`, `hora`, `activo`) VALUES
(1, '09:00:00', 1),
(2, '10:00:00', 1),
(3, '11:00:00', 1),
(4, '12:00:00', 1),
(5, '13:00:00', 1),
(6, '14:00:00', 1),
(7, '15:00:00', 1),
(8, '16:00:00', 1),
(9, '17:00:00', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pacientes`
--

CREATE TABLE `pacientes` (
  `id` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `telefono` varchar(20) DEFAULT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `fecha_registro` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `pacientes`
--

INSERT INTO `pacientes` (`id`, `nombre`, `telefono`, `email`, `password`, `fecha_registro`) VALUES
(1, 'Diego Alberto Rojo Beltran', '6681525990', 'diego.beltran@gmail.com', '$2y$10$P2iZq883CFdzY5db4F7SkOvj7I8h.qh4r0a3Rdfu.H25.yRvwsVxq', '2026-02-23 01:25:28'),
(2, 'Steven Osuna', '6682657297', 'osuna.steven95@gmail.com', '$2y$10$yqFaGT70HVBYLD5RiWJnp.maSTZp3ufwIKdwUUVHimQABSfiKtwoa', '2026-02-25 02:16:11'),
(3, 'maria', '6682828282', 'maria@gmail.com', '$2y$10$ZKi2/hCO3CcFG802Cul7hu1OAWRAPj5z60i2jy5ZZE5PgIJ2EKD2e', '2026-02-25 02:17:44'),
(4, 'Steven Dominguez', '6682656565', 'steven@correo.com', '$2y$10$.a1wYH7f4lrdFquTMswDkOzDSSjqQK20YqeSsssDA/cfuKADksgBq', '2026-05-18 21:18:48'),
(6, 'mauricio osuna', '6682656564', 'steven2@correo.com', '$2y$10$qstbjaOSjHHdU6jK9zRP9O056SECe.9U.WEVsxkO1yrFsKxy.tHue', '2026-05-18 21:45:02');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `administradores`
--
ALTER TABLE `administradores`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `citas`
--
ALTER TABLE `citas`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `dias_bloqueados`
--
ALTER TABLE `dias_bloqueados`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `horarios`
--
ALTER TABLE `horarios`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `pacientes`
--
ALTER TABLE `pacientes`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `administradores`
--
ALTER TABLE `administradores`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `citas`
--
ALTER TABLE `citas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `dias_bloqueados`
--
ALTER TABLE `dias_bloqueados`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `horarios`
--
ALTER TABLE `horarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `pacientes`
--
ALTER TABLE `pacientes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
