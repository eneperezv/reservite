-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 24-09-2024 a las 05:40:47
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
-- Estructura de tabla para la tabla `dbo_booking`
--

CREATE TABLE `dbo_booking` (
  `id_booking` int(11) NOT NULL,
  `date_checkin` datetime(6) DEFAULT NULL,
  `date_checkout` datetime(6) DEFAULT NULL,
  `date_expire` datetime(6) DEFAULT NULL,
  `qrcode` varchar(100) DEFAULT NULL,
  `status` bigint(20) DEFAULT NULL,
  `id_client` bigint(20) NOT NULL,
  `id_room` bigint(20) NOT NULL,
  `mailsent` bigint(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `dbo_booking`
--

INSERT INTO `dbo_booking` (`id_booking`, `date_checkin`, `date_checkout`, `date_expire`, `qrcode`, `status`, `id_client`, `id_room`, `mailsent`) VALUES
(1, '2024-09-21 10:00:00.000000', '2024-09-22 07:00:00.000000', '2024-09-21 15:00:00.000000', '5111cc7ef3bd2911e712f4202c0cd080', 1, 5, 1, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `dbo_client`
--

CREATE TABLE `dbo_client` (
  `id_client` bigint(20) NOT NULL,
  `address` varchar(350) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `name` varchar(100) DEFAULT NULL,
  `phone` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `dbo_client`
--

INSERT INTO `dbo_client` (`id_client`, `address`, `email`, `name`, `phone`) VALUES
(1, 'Calle 152', 'nela@hotmail.com', 'Daniela Sanchez', '5556969'),
(2, 'Calle 236', 'nela123@gmail.com', 'Daniela Rodriguez', '4525555'),
(3, 'Calle 30', 'jose@hotmail.com', 'Jose Perez', '8744444'),
(4, 'Calle 89', 'anto@hotmail.com', 'Antonio Rodriguez', '3254414'),
(5, 'Calle 50', 'npeliezere@gmail.com', 'Eliezer Navarro Pérez', '5524545');

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

--
-- Volcado de datos para la tabla `dbo_hotel`
--

INSERT INTO `dbo_hotel` (`id_hotel`, `address`, `email`, `name`, `phone`) VALUES
(1, 'Calle 121', 'hilton@gmail.com', 'Hilton', '5225522'),
(2, 'Calle 212', 'marriot@gmail.com', 'Marriot', '2552255');

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
  `status` bigint(20) DEFAULT NULL,
  `id_hotel` bigint(20) NOT NULL,
  `roomnumber` varchar(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `dbo_room`
--

INSERT INTO `dbo_room` (`id_room`, `capacity`, `description`, `floor`, `number`, `status`, `id_hotel`, `roomnumber`) VALUES
(1, 2, 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam.', 1, 1, 0, 1, '101'),
(2, 2, 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam.', 1, 2, 1, 1, '102'),
(3, 2, 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam.', 1, 3, 1, 1, '103'),
(4, 2, 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam.', 1, 4, 1, 1, '104'),
(5, 4, 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam.', 1, 5, 1, 1, '105'),
(6, 2, 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam.', 2, 1, 1, 1, '201'),
(7, 2, 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam.', 2, 2, 1, 1, '202'),
(8, 2, 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam.', 2, 3, 1, 1, '203'),
(9, 2, 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam.', 2, 4, 1, 1, '204'),
(10, 4, 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam.', 2, 5, 1, 1, '205'),
(11, 2, 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam.', 3, 1, 1, 1, '301'),
(12, 2, 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam.', 3, 2, 1, 1, '302'),
(13, 2, 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam.', 3, 3, 1, 1, '303'),
(14, 2, 'Super habitacion con todo', 1, 1, 1, 2, '101');

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
-- Indices de la tabla `dbo_booking`
--
ALTER TABLE `dbo_booking`
  ADD PRIMARY KEY (`id_booking`),
  ADD KEY `FKfpvj0had17ksg3xmoreco6dl2` (`id_client`),
  ADD KEY `FK9o02f8r2qj5y7wrd7nvsk9a38` (`id_room`);

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
  ADD KEY `FKtbp2f0ws1ue7c7j6amp7jjklp` (`id_hotel`);

--
-- Indices de la tabla `dbo_users`
--
ALTER TABLE `dbo_users`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `dbo_booking`
--
ALTER TABLE `dbo_booking`
  MODIFY `id_booking` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `dbo_client`
--
ALTER TABLE `dbo_client`
  MODIFY `id_client` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `dbo_hotel`
--
ALTER TABLE `dbo_hotel`
  MODIFY `id_hotel` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `dbo_room`
--
ALTER TABLE `dbo_room`
  MODIFY `id_room` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de la tabla `dbo_users`
--
ALTER TABLE `dbo_users`
  MODIFY `id_user` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `dbo_booking`
--
ALTER TABLE `dbo_booking`
  ADD CONSTRAINT `FK9o02f8r2qj5y7wrd7nvsk9a38` FOREIGN KEY (`id_room`) REFERENCES `dbo_room` (`id_room`),
  ADD CONSTRAINT `FKfpvj0had17ksg3xmoreco6dl2` FOREIGN KEY (`id_client`) REFERENCES `dbo_client` (`id_client`);

--
-- Filtros para la tabla `dbo_room`
--
ALTER TABLE `dbo_room`
  ADD CONSTRAINT `FKtbp2f0ws1ue7c7j6amp7jjklp` FOREIGN KEY (`id_hotel`) REFERENCES `dbo_hotel` (`id_hotel`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
