-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 23-11-2021 a las 14:42:08
-- Versión del servidor: 10.4.21-MariaDB
-- Versión de PHP: 8.0.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
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
  `costo` varchar(50) DEFAULT NULL,
  `precioDolar` varchar(50) DEFAULT NULL,
  `costoEnDolar` varchar(50) DEFAULT NULL,
  `precioVenta` varchar(50) DEFAULT NULL,
  `gana10` varchar(50) DEFAULT NULL,
  `gana20` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `entrada`
--

INSERT INTO `entrada` (`id_entrada`, `id_producto`, `descripcion`, `costo`, `precioDolar`, `costoEnDolar`, `precioVenta`, `gana10`, `gana20`) VALUES
(1, 'x104', 'harina pan 1kg', '4', '4', '1', '4.69', '5.159', '5.628'),
(2, 'x104', 'harina pan', '5.5', '3.9', '1.4102564102564', '6.6141025641025', '7.2755128205128', '7.936923076923'),
(3, 'x104', 'harina', '5.4', '3.9', '1.3846153846154', '6.4938461538462', '7.1432307692308', '7.7926153846155'),
(4, 'as', 'as', '33', '33', '1', '33.1', '36.51', '39.82'),
(5, 'AS', 'asasasas', '111', '111344', '0.00099691047564305', '111', '122.1', '133.2'),
(6, 'swd', 'wed', '11', '11', '1', '11.1', '12.31', '13.42'),
(7, 'sd', 'sd', '111', '11', '10.090909090909', '111.1', '122.31', '133.42'),
(8, 'ds', 'sdsd', '1111', '111', '10.009009009009', '1111.1', '1222.31', '1333.42'),
(9, '12', '12', '111', '1111', '0.0999099909991', '111.1', '122.31', '133.42'),
(10, 'sas', 'sdsd', '1', '112', '0.0089285714285714', '1.1', '1.31', '1.42'),
(11, 'sd', 'sd', '121', '11', '11', '121.1', '133.31', '145.42'),
(12, 'sdfd', 'hbnb', '211', '2112', '0.099905303030303', '211.1', '232.31', '253.42'),
(13, 'fdfg', '445', '21', '21', '1', '21.1', '23.31', '25.42'),
(14, '44', '454', '1', '12', '0.083333333333333', '1.1', '1.31', '1.42'),
(15, '21', '12', '1', '12', '0.083333333333333', '1.1', '1.31', '1.42'),
(16, '21', '12', '21', '12', '1.75', '21.1', '23.31', '25.42'),
(17, 'x104', 'harina', '3.9', '4', '0.975', '4.57275', '5.030025', '5.4873'),
(18, 'x104', 'leche condensada', '4.6', '4.35', '1.0574712643678', '4.959540229885', '5.4554942528735', '5.951448275862'),
(19, 'as', 'as', '11', '11', '1', '11.1', '12.31', '13.42'),
(20, 'asas', 'asas', '111', '111', '1', '111.1', '122.31', '133.42'),
(21, 'asas', 'asas', '411', '11', '37.363636363636', '411.1', '452.31', '493.42'),
(22, 'sdsd', 'sdsd', '111', '11', '10.090909090909', '111.1', '122.31', '133.42'),
(23, 'asas', 'asas', '4', '44', '0.090909090909091', '4.1', '4.61', '5.02'),
(24, 'sdsd', 'sdsd', '11', '11', '1', '11.1', '12.31', '13.42'),
(25, 'sd', 'sd', '1121', '112', '10.008928571429', '1121.1', '1233.3100000001', '1345.4200000001'),
(26, 'fdf', 'df', '222', '22', '10.090909090909', '222.1', '244.41', '266.62'),
(27, 'dfdf', 'dfdf', '11', '11', '1', '11.1', '12.31', '13.42'),
(28, 'dsds', 'sdsd', '555', '55', '10.090909090909', '555.1', '610.70999999999', '666.21999999999'),
(29, 'dfdf', 'df', '1221', '221', '5.5248868778281', '1221.1', '1343.31', '1465.42'),
(30, 'dfdf', 'dfdf', '111', '11', '10.090909090909', '111.1', '122.31', '133.42'),
(31, 'dfdfdfdf', 'dfdffdfd', '4141', '4141', '1', '4141.1', '4555.31', '4969.42'),
(32, 'fd', 'df', '4141', '41', '101', '4141.1', '4555.31', '4969.42'),
(33, 'fgfg', 'fggf', '444', '44', '10.090909090909', '444.1', '488.61', '533.02'),
(34, 'sd', 'sd', '444', '44', '10.090909090909', '444.1', '488.61', '533.02'),
(35, 'fgfg', 'fggf', '414', '44', '9.4090909090909', '414.1', '455.61', '497.02'),
(36, 'fdf', 'dfdf', '414141', '44', '9412.2954545455', '414141.1', '455555.31', '496969.42'),
(37, 'dfdfdf', '444', '444', '44', '10.090909090909', '444.1', '488.61', '533.02'),
(38, 'frgfg', 'fgfg', '111', '11', '10.090909090909', '111.1', '122.31', '133.42'),
(39, 'dfdf', '744', '54554', '5', '10910.8', '54554.1', '60009.61', '65465.02'),
(40, 'aas', 'asas', '412112', '212121', '1.9428156571014', '412112.10000001', '453323.41000001', '494534.62000001'),
(41, 'dfdf', 'dfdf', '111', '11', '10.090909090909', '111.1', '122.31', '133.42'),
(42, 'sdsd', 'sdsd', '111', '111', '1', '111.1', '122.31', '133.42'),
(43, 'sdsd', 'sd', '2121', '1221', '1.7371007371007', '2121.1', '2333.3099999999', '2545.4199999999'),
(44, 'jjjh', 'jhhjjh', '444', '444', '1', '444.1', '488.61', '533.02'),
(45, 'jhhjjh', 'jjjjh', '454', '5454', '0.083241657499083', '454.1', '499.61', '545.02'),
(46, 'cxvdfbd', 'jhhjjh', '5655', '6565', '0.86138613861386', '5655.1', '6220.71', '6786.22');

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
(1, 1, '2021-10-06'),
(2, 2, '2021-10-06'),
(3, 3, '2021-10-06'),
(4, 4, '2019-01-01'),
(5, 5, '2019-01-01'),
(6, 6, '2019-01-01'),
(7, 7, '2020-03-10'),
(8, 8, '2020-03-11'),
(9, 9, '2019-02-02'),
(10, 10, '2019-02-02'),
(11, 11, '2019-01-01'),
(12, 12, '2020-03-03'),
(13, 13, '2019-01-01'),
(14, 14, '2019-01-01'),
(15, 15, '2019-01-10'),
(16, 16, '2019-01-01'),
(17, 17, '2021-10-06'),
(18, 18, '2020-03-03'),
(19, 19, '2020-01-02'),
(20, 20, '2020-02-14'),
(21, 21, '2020-06-18'),
(22, 22, '2021-03-03'),
(23, 23, '2021-03-16'),
(24, 24, '2020-02-03'),
(25, 25, '2020-10-17'),
(26, 26, '2021-09-16'),
(27, 27, '2019-01-01'),
(28, 28, '2019-01-01'),
(29, 29, '2020-03-01'),
(30, 30, '2019-01-01'),
(31, 31, '2021-02-05'),
(32, 32, '2021-05-04'),
(33, 33, '2021-03-04'),
(34, 34, '2021-04-05'),
(35, 35, '2020-03-02'),
(36, 36, '2020-03-02'),
(37, 37, '2019-01-01'),
(38, 38, '2019-01-01'),
(39, 39, '2019-01-01'),
(40, 40, '2020-04-03'),
(41, 41, '2019-01-02'),
(42, 42, '2019-01-01'),
(43, 43, '2019-02-02'),
(44, 44, '2019-01-01'),
(45, 45, '2019-01-01'),
(46, 46, '2019-01-01');

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
  MODIFY `id_entrada` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

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
