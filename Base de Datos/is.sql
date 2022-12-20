-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 20-12-2022 a las 21:16:38
-- Versión del servidor: 10.4.27-MariaDB
-- Versión de PHP: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `is`
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
  `Ponente` varchar(100) NOT NULL,
  `Aforo` int(5) NOT NULL,
  `Aula` varchar(25) NOT NULL,
  `Camara` int(5) NOT NULL,
  `Proyectores` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `cursos`
--

INSERT INTO `cursos` (`Id`, `Nombre`, `FechaInicio`, `FechaFin`, `Descripcion`, `Ponente`, `Aforo`, `Aula`, `Camara`, `Proyectores`) VALUES
(1, 'SSH', '2023-01-10', '2023-06-26', 'Este curso consiste de 120 horas totales de clases repartidas en 24 semanas, es decir, 5 horas semanales dedicadas al estudio en profundidad del Secure Shell Protocol. ', 'Alberto', 0, 'A3', 5, 7),
(2, 'PHP', '2023-01-09', '2023-07-19', 'Este curso consiste de 120 horas totales de clases repartidas en 24 semanas, es decir, 5 horas semanales dedicadas al estudio en profundidad del lenguaje PHP. Se recomienda disponer de conocimientos previos sobre PHP, aunque en la primera semana se realizará una introducción. El precio de este curso es de 1200€. ', 'Silvia', 1, 'B1', 0, 0),
(3, 'HTML', '2025-01-21', '2022-11-30', 'Este curso consiste de 8 horas totales de clases repartidas en 24 semanas, es decir, 5 horas semanales dedicadas al estudio en profundidad del lenguaje PHP. No hace falta ningún conocimiento previo. El precio de este curso es de 1200€. ', 'Silvia', 0, 'C2', 0, 0),
(4, 'Java', '2026-11-16', '2022-11-22', 'Java', 'Luis', 0, 'A2', 0, 0),
(5, 'Python', '2022-12-20', '2022-12-31', 'Python', 'Maria', 2, 'A2', 1, 1);

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
(11111111, 3),
(44444444, 3),
(55555555, 1),
(77777777, 1),
(77777777, 2),
(77777777, 3);

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
(77777777, 3, '2022-12-20 19:29:54'),
(55555555, 2, '2022-12-20 19:33:00'),
(55555555, 3, '2022-12-20 19:33:05');

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
(2, 'Luis'),
(3, 'Alberto'),
(4, 'Maria'),
(5, 'Silvia');

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
('11111111A', 'administrador', 'administrador', 'uco', 'administrador@uco.es', 'root', 1),
('22222222B', 'coordcursos', 'coordinador cursos', 'uco', 'coordinadorcursos@uco.es', 'root', 2),
('33333333C', 'coordrecursos', 'coordinador recursos', 'uco', 'coordinadorrecursos@uco.es', 'root', 4),
('44444444D', 'i12mocab', 'Belén', 'Montes', 'i12mocab@uco.es', 'usuario', 3),
('55555555Y', 'i12rumon', 'Noelia', 'Ruiz', 'i12rumon@uco.es', 'usuario', 3),
('77777777G', 'i12qugaa', 'Antonio Javier', 'Quintero', 'i12qugaa@uco.es', 'usuario', 3);

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
-- Indices de la tabla `ponentes`
--
ALTER TABLE `ponentes`
  ADD PRIMARY KEY (`Id`);

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
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=130;

--
-- AUTO_INCREMENT de la tabla `roles`
--
ALTER TABLE `roles`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
