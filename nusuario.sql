-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 04-06-2025 a las 02:31:19
-- Versión del servidor: 10.4.28-MariaDB
-- Versión de PHP: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `nusuario`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `recuperar`
--

CREATE TABLE `recuperar` (
  `EMAIL` varchar(100) NOT NULL,
  `CLAVE_NUEVA` int(8) NOT NULL,
  `TOKEN` varchar(100) NOT NULL,
  `FECHA_ALTA` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `recuperar`
--

INSERT INTO `recuperar` (`EMAIL`, `CLAVE_NUEVA`, `TOKEN`, `FECHA_ALTA`) VALUES
('ivanpellitadeo@gmail.com', 92087221, '0ba10f4cbcd5764b392910e6ba3e2026', '2025-05-27 21:07:55'),
('ivanpellitadeo@gmail.com', 91180739, '0426ad67faee86d7221d69a0d4ce70a3', '2025-05-27 21:08:22'),
('ivanpellitadeo@gmail.com', 32782057, 'd1678f8877faa86fbda96e2b922275bd', '2025-05-27 21:09:40'),
('masimo@gmail.com', 31537911, '9af399932f397aab96cd9fd053be692e', '2025-06-03 20:18:12');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `registronuevo`
--

CREATE TABLE `registronuevo` (
  `nombre` varchar(50) NOT NULL,
  `apellido` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `pass` varchar(60) NOT NULL,
  `user` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `registronuevo`
--

INSERT INTO `registronuevo` (`nombre`, `apellido`, `email`, `pass`, `user`) VALUES
('santiago', 'vazquez', 'santiagovazquez2121@gmail.com', '$2y$10$c.b.9GWLTPi63eXGN2orBukpSKfyxeGr/npCQj416MJdUlRb9NipK', 'santiago21'),
('juan', 'perez', 'jperez@gmail.com', '$2y$10$SOzkPwLCIZ.SEliFVQFTheoDPerXkbf/jfLfvQ8azVeedJSJKec.2', 'jperez'),
('Ivan', 'Pelli', 'ivanpellitadeo@gmail.com', '$2y$10$ou6ERO/hGvQ9B0nd/8aC.ONZCRk4pWsmQw6MV1i.YUB0KyYZY4W2.', 'ivan'),
('Massimo', 'Olmedini', 'massimoolmedo@gmail.com', '$2y$10$WxRqmeBlq3T.iaefPmixieK5dJUQezTW7NcaxJduC7EwZC6w4iNIy', 'massimo.o'),
('Masi', 'olme', 'masimo@gmail.com', '$2y$10$vRphlB92RCVnToSI.aNmWObpJZ4YnaB0pbCHhXUFehyMZFmy0iEUO', 'masi');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
