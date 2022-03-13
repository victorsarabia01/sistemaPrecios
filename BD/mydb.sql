-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 08-07-2021 a las 22:46:44
-- Versión del servidor: 10.4.11-MariaDB
-- Versión de PHP: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `mydb`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `entrada`
--

CREATE TABLE `entrada` (
  `id_entrada` int(11) NOT NULL,
  `id_producto` varchar(45) DEFAULT NULL,
  `descripcion` varchar(45) DEFAULT NULL,
  `costo` varchar(10) DEFAULT NULL,
  `precioDolar` varchar(10) DEFAULT NULL,
  `costoEnDolar` varchar(10) DEFAULT NULL,
  `precioVenta` varchar(10) DEFAULT NULL,
  `gana10` varchar(10) DEFAULT NULL,
  `gana20` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `entrada`
--

INSERT INTO `entrada` (`id_entrada`, `id_producto`, `descripcion`, `costo`, `precioDolar`, `costoEnDolar`, `precioVenta`, `gana10`, `gana20`) VALUES
(1, 'h135', 'harina pan', '700000', '1800000', '0.38888888', '1279494.99', '1407444.48', '1535393.98'),
(2, 'leche', 'lche la campiña', '4000000', '1800000', '2.22222222', '7311400.10', '8042540.11', '8773680.12'),
(3, 'f125', 'leche', '500000', '1800000', '0.27777777', '913924.988', '1005317.48', '1096709.98'),
(4, 'n24', 'suero', '700000', '1800000', '0.38888888', '1279494.99', '1407444.48', '1535393.98'),
(5, 'p520', 'crema dental', '1500000', '1800000', '0.83333333', '2741775.03', '3015952.53', '3290130.03'),
(6, 'q104', 'avena', '700000', '1800000', '0.38888888', '1279494.99', '1407444.48', '1535393.98'),
(7, 'm455', 'margarina', '500000', '1800000', '0.27777777', '913924.988', '1005317.48', '1096709.98'),
(8, 'l15', 'ddd', '500000', '1500000', '0.33333333', '1096710.00', '1206381.00', '1316052.00'),
(9, 'x104', 'harina juana 1kg', '2700000', '3200000', '0.84375', '2776047.22', '3053651.95', '3331256.67'),
(10, 'x104', 'harina juana 1kg', '2700000', '3500000', '0.77142857', '2700000.09', '2970000.20', '3240000.21'),
(11, 'x105', 'aceite girasol 1l', '5300000', '3200000', '1.65625', '5449277.89', '5994205.68', '6539133.47'),
(12, 'x456', 'harina robin hood1kg', '5400000', '3300000', '1.63636363', '5400000.07', '5940000.18', '6480000.19'),
(13, 'f304', 'leche condensada lata', '7000000', '3200000', '2.1875', '7000000', '7700000', '8400000'),
(38, 'f567', 'jugo manzana', '7000000', '3200000', '2.1875', '7000000', '7700000', '8400000'),
(39, 'G567', 'galleta oreo', '2500000', '3200000', '0.78125', '2500000', '2750000', '3000000'),
(40, 'f567', 'prueba1', '6700000', '3200000', '2.09375', '6700000', '7370000', '8040000'),
(41, 'g456', 'prueba2', '5400000', '3200000', '1.6875', '5400000', '5940000', '6480000'),
(42, 'h564', 'agua21', '5400000', '3200000', '1.6875', '5400000', '5940000', '6480000'),
(43, 'f456', 'pruebax', '5700000', '3200000', '1.78125', '5700000', '6270000', '6840000'),
(44, 'gh455', 'pruebaaa', '4399000', '3200000', '1.3746875', '4399000', '4838900', '5278800'),
(45, 'g432', 'prueba12', '3200000', '3200000', '1', '3200000', '3520000', '3840000');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `fecha`
--

CREATE TABLE `fecha` (
  `id_fecha` int(11) NOT NULL,
  `id_entrada` int(11) NOT NULL,
  `fecha` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `fecha`
--

INSERT INTO `fecha` (`id_fecha`, `id_entrada`, `fecha`) VALUES
(1, 1, '2021-03-2'),
(2, 2, '2020-06-15'),
(3, 3, '2021-03-6'),
(4, 4, '2021-03-7'),
(5, 5, '2021-03-07'),
(6, 6, '--07'),
(7, 7, '2021-03-7'),
(8, 8, '2021-03-7'),
(9, 9, '2021-06-21'),
(10, 10, '2021-06-21'),
(11, 11, '2021-06-21'),
(12, 12, '2021-07-01'),
(13, 13, '2021-07-01'),
(38, 38, '2021-06-01'),
(39, 39, '2021-07-01'),
(40, 40, '2021-07-01'),
(41, 41, '2021-07-01'),
(42, 42, '2021-07-01'),
(43, 43, '2021-07-01'),
(44, 44, '2021-07-01'),
(45, 45, '2021-07-01');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `entrada`
--
ALTER TABLE `entrada`
  ADD PRIMARY KEY (`id_entrada`);

--
-- Indices de la tabla `fecha`
--
ALTER TABLE `fecha`
  ADD PRIMARY KEY (`id_fecha`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `entrada`
--
ALTER TABLE `entrada`
  MODIFY `id_entrada` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `entrada`
--
ALTER TABLE `entrada`
  ADD CONSTRAINT `id_entrada` FOREIGN KEY (`id_entrada`) REFERENCES `fecha` (`id_fecha`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
