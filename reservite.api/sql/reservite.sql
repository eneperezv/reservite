-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 12-09-2024 a las 05:15:41
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
-- Base de datos: `reservite`
--
CREATE DATABASE IF NOT EXISTS `reservite` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `reservite`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `dbo_client`
--

CREATE TABLE `dbo_client` (
  `id_client` bigint(20) NOT NULL,
  `address` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `dbo_hotel`
--

CREATE TABLE `dbo_hotel` (
  `id_hotel` bigint(20) NOT NULL,
  `address` varchar(500) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `name` varchar(100) DEFAULT NULL,
  `phone` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `dbo_room`
--

CREATE TABLE `dbo_room` (
  `id_room` bigint(20) NOT NULL,
  `capacity` bigint(20) DEFAULT NULL,
  `description` varchar(1500) DEFAULT NULL,
  `floor` bigint(20) DEFAULT NULL,
  `number` bigint(20) DEFAULT NULL,
  `hotel` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `dbo_users`
--

CREATE TABLE `dbo_users` (
  `id_user` bigint(20) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `role` varchar(255) DEFAULT NULL,
  `username` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `dbo_users`
--

INSERT INTO `dbo_users` (`id_user`, `name`, `password`, `role`, `username`) VALUES
(1, 'Eliezer Navarro', '$2a$10$DRtD6u4iWycTIrKGcrYuTOITp0JZq88lClhTIgzJ3YMvzlB7LnWOG', 'USER', 'enp'),
(2, 'Rayme Velandia', '$2a$10$DRtD6u4iWycTIrKGcrYuTOITp0JZq88lClhTIgzJ3YMvzlB7LnWOG', 'USER', 'raymevg'),
(3, 'Gladys Perez', '$2a$10$DRtD6u4iWycTIrKGcrYuTOITp0JZq88lClhTIgzJ3YMvzlB7LnWOG', 'USER', 'cocoperez');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `dbo_client`
--
ALTER TABLE `dbo_client`
  ADD PRIMARY KEY (`id_client`);

--
-- Indices de la tabla `dbo_hotel`
--
ALTER TABLE `dbo_hotel`
  ADD PRIMARY KEY (`id_hotel`);

--
-- Indices de la tabla `dbo_room`
--
ALTER TABLE `dbo_room`
  ADD PRIMARY KEY (`id_room`),
  ADD KEY `FKb14ruf7kfmuhtgn60e2362x9a` (`hotel`);

--
-- Indices de la tabla `dbo_users`
--
ALTER TABLE `dbo_users`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `dbo_client`
--
ALTER TABLE `dbo_client`
  MODIFY `id_client` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `dbo_hotel`
--
ALTER TABLE `dbo_hotel`
  MODIFY `id_hotel` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `dbo_room`
--
ALTER TABLE `dbo_room`
  MODIFY `id_room` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `dbo_users`
--
ALTER TABLE `dbo_users`
  MODIFY `id_user` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `dbo_room`
--
ALTER TABLE `dbo_room`
  ADD CONSTRAINT `FKb14ruf7kfmuhtgn60e2362x9a` FOREIGN KEY (`hotel`) REFERENCES `dbo_hotel` (`id_hotel`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
