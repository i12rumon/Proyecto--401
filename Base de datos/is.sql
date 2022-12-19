-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 19-12-2022 a las 12:40:57
-- Versión del servidor: 10.4.27-MariaDB
-- Versión de PHP: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `is_new`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cursos`
--

CREATE TABLE `cursos` (
  `Id` int(11) NOT NULL,
  `Nombre` varchar(30) NOT NULL,
  `FechaInicio` date NOT NULL,
  `FechaFin` date NOT NULL,
  `Descripcion` varchar(3000) NOT NULL,
  `Ponente` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `cursos`
--

INSERT INTO `cursos` (`Id`, `Nombre`, `FechaInicio`, `FechaFin`, `Descripcion`, `Ponente`) VALUES
(1, 'SSH', '2023-01-09', '2023-06-26', 'Este curso consiste de 120 horas totales de clases repartidas en 24 semanas, es decir, 5 horas semanales dedicadas al estudio en profundidad del Secure Shell Protocol. ', 'Alberto'),
(2, 'PHP', '2023-01-09', '2023-07-19', 'Este curso consiste de 120 horas totales de clases repartidas en 24 semanas, es decir, 5 horas semanales dedicadas al estudio en profundidad del lenguaje PHP. Se recomienda disponer de conocimientos previos sobre PHP, aunque en la primera semana se realizará una introducción. El precio de este curso es de 1200€. ', 'Luis'),
(3, 'HTML', '2025-01-21', '2022-11-30', 'HTML', 'Luis'),
(4, 'Java', '2026-11-16', '2022-11-22', 'Java', 'Luis'),
(106, 'Python', '2022-12-24', '2022-12-30', 'descripción', 'Luis');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cursousuario`
--

CREATE TABLE `cursousuario` (
  `Dni` int(9) NOT NULL,
  `IdCurso` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `cursousuario`
--

INSERT INTO `cursousuario` (`Dni`, `IdCurso`) VALUES
(6, 1),
(6, 3),
(44444444, 1),
(44444444, 2),
(44444444, 3),
(55555555, 1),
(55555555, 4);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `curso_recurso`
--

CREATE TABLE `curso_recurso` (
  `recursos` varchar(40) NOT NULL,
  `curso` int(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `curso_recurso`
--

INSERT INTO `curso_recurso` (`recursos`, `curso`) VALUES
('A1', 1),
('A12', 2),
('A5', 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `lista_espera`
--

CREATE TABLE `lista_espera` (
  `Dni` int(11) NOT NULL,
  `IdCurso` int(11) NOT NULL,
  `Fecha_ingreso` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `lista_espera`
--

INSERT INTO `lista_espera` (`Dni`, `IdCurso`, `Fecha_ingreso`) VALUES
(44444444, 2, '2022-12-18 18:41:48'),
(44444444, 3, '2022-12-18 18:46:14');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ponentes`
--

CREATE TABLE `ponentes` (
  `Id` int(5) NOT NULL,
  `Nombre` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `ponentes`
--

INSERT INTO `ponentes` (`Id`, `Nombre`) VALUES
(1, 'Pedro'),
(2, 'Luis');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `recursos`
--

CREATE TABLE `recursos` (
  `id` varchar(40) NOT NULL,
  `aforo` int(11) NOT NULL,
  `camaras` tinyint(1) NOT NULL,
  `proyectores` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `recursos`
--

INSERT INTO `recursos` (`id`, `aforo`, `camaras`, `proyectores`) VALUES
('A1', 80, 1, 1),
('A12', 80, 1, 1),
('A5', 1, 0, 0),
('B10', 60, 0, 1),
('C34', 30, 0, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `roles`
--

CREATE TABLE `roles` (
  `Id` int(11) NOT NULL,
  `Nombre` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `roles`
--

INSERT INTO `roles` (`Id`, `Nombre`) VALUES
(1, 'Administrador'),
(2, 'Coordinador_curso'),
(3, 'Participante'),
(4, 'Coordinador_recursos');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `Dni` varchar(40) NOT NULL,
  `UsuarioUco` varchar(40) NOT NULL,
  `Nombre` varchar(40) NOT NULL,
  `Apellidos` varchar(40) NOT NULL,
  `Correo` varchar(50) NOT NULL,
  `password` varchar(30) NOT NULL,
  `Rol` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`Dni`, `UsuarioUco`, `Nombre`, `Apellidos`, `Correo`, `password`, `Rol`) VALUES
('11111111A', 'administrador', 'administrador', 'uco', 'administrador@uco.es', 'administrador', 1),
('22222222B', 'coordcursos', 'coordinador cursos', 'uco', 'coordinadorcursos@uco.es', 'coordcursos', 2),
('33333333C', 'coordrecursos', 'coordinador recursos', 'uco', 'coordinadorrecursos@uco.es', 'coordrecursos', 4),
('44444444D', 'i12mocab', 'Belén', 'Montes', 'i12mocab@uco.es', 'i12mocab', 3),
('55555555Y', 'i12rumon', 'Noelia', 'Ruiz', 'i12rumon@uco.es', 'belen11', 3),
('77777777G', 'i12qugaa', 'Antonio Javier', 'Quintero', 'i12qugaa@uco.es', 'i12qugaa', 3);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `cursos`
--
ALTER TABLE `cursos`
  ADD PRIMARY KEY (`Id`) USING BTREE;

--
-- Indices de la tabla `cursousuario`
--
ALTER TABLE `cursousuario`
  ADD KEY `Dni` (`Dni`,`IdCurso`);

--
-- Indices de la tabla `curso_recurso`
--
ALTER TABLE `curso_recurso`
  ADD KEY `curso` (`curso`,`recursos`) USING BTREE;

--
-- Indices de la tabla `ponentes`
--
ALTER TABLE `ponentes`
  ADD PRIMARY KEY (`Id`);

--
-- Indices de la tabla `recursos`
--
ALTER TABLE `recursos`
  ADD UNIQUE KEY `id` (`id`) USING BTREE;

--
-- Indices de la tabla `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`Id`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`Dni`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `cursos`
--
ALTER TABLE `cursos`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=107;

--
-- AUTO_INCREMENT de la tabla `roles`
--
ALTER TABLE `roles`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
