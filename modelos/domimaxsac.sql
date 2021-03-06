-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 06-11-2017 a las 00:53:18
-- Versión del servidor: 10.1.21-MariaDB
-- Versión de PHP: 7.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `domimaxsac`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `factura`
--

CREATE TABLE `factura` (
  `nguia_f` int(11) DEFAULT NULL,
  `otn` int(11) NOT NULL,
  `descripcion_factura` varchar(500) COLLATE utf8_spanish_ci NOT NULL,
  `subtotal_f` int(11) DEFAULT NULL,
  `total_f` int(11) DEFAULT NULL,
  `fecha_servicio_f` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ordenotn`
--

CREATE TABLE `ordenotn` (
  `otn` int(11) NOT NULL,
  `hora_inicio` varchar(13) COLLATE utf8_spanish_ci DEFAULT NULL,
  `hora_termino` varchar(13) COLLATE utf8_spanish_ci DEFAULT NULL,
  `fecha_dv` date DEFAULT NULL,
  `tipomantenimiento_dv` varchar(40) COLLATE utf8_spanish_ci DEFAULT NULL,
  `marca_dv` varchar(40) COLLATE utf8_spanish_ci NOT NULL,
  `placa_dv` varchar(15) COLLATE utf8_spanish_ci NOT NULL,
  `modelovehiculo_dv` varchar(40) COLLATE utf8_spanish_ci NOT NULL,
  `modelocarroceria_dv` varchar(40) COLLATE utf8_spanish_ci NOT NULL,
  `color_dv` varchar(40) COLLATE utf8_spanish_ci NOT NULL,
  `kilometraje_dv` varchar(10) COLLATE utf8_spanish_ci DEFAULT NULL,
  `sede_dv` varchar(15) COLLATE utf8_spanish_ci NOT NULL,
  `descripcion_dv` varchar(500) COLLATE utf8_spanish_ci NOT NULL,
  `descripcion_tr` varchar(500) COLLATE utf8_spanish_ci NOT NULL,
  `descripcion_rau` varchar(500) COLLATE utf8_spanish_ci NOT NULL,
  `descripcion_st` varchar(500) COLLATE utf8_spanish_ci NOT NULL,
  `observacionesgenerales` varchar(500) COLLATE utf8_spanish_ci NOT NULL,
  `nombre_rv` varchar(40) COLLATE utf8_spanish_ci NOT NULL,
  `dni_rv` varchar(8) COLLATE utf8_spanish_ci NOT NULL,
  `nombre_ev` varchar(40) COLLATE utf8_spanish_ci NOT NULL,
  `dni_ev` varchar(8) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `ordenotn`
--

INSERT INTO `ordenotn` (`otn`, `hora_inicio`, `hora_termino`, `fecha_dv`, `tipomantenimiento_dv`, `marca_dv`, `placa_dv`, `modelovehiculo_dv`, `modelocarroceria_dv`, `color_dv`, `kilometraje_dv`, `sede_dv`, `descripcion_dv`, `descripcion_tr`, `descripcion_rau`, `descripcion_st`, `observacionesgenerales`, `nombre_rv`, `dni_rv`, `nombre_ev`, `dni_ev`) VALUES
(1, '15:21:01 p.m.', '15:23:41 p.m.', '2017-06-11', 'MANTENIMIENTO DE LLAMTA', 'MANTENIMIENTO DE LLANTAS', 'A5Y-778', '6TO', 'AUTO', 'PLOMO CLARO', '200 00', 'ATE', 'DESCRIPCION DE TRABAJOS REALIZADOS DE PRUEBA 1', 'TRABAJOS REALIZADOS DE PRUEBA 1', '   REPUESTO 1 DE PRUEBA.\r\nREPUESTO 1 DE PRUEBA.\r\nREPUESTO 1 DE PRUEBA.', '   SERVICIOS DE TERCEROS DE PRUEBA 1', 'OBSERVACIONES DE PRUEBA 1', 'Adolfo Hitler', '12349882', 'Jorge Quispe Cotrina', '40389290'),
(2, '15:38:44 p.m.', '15:41:25 p.m.', '2017-06-11', 'MANTENIMIENTO AL MOTOR', 'TOYOTA', 'B42-912', '6TO', 'COMIONETA', 'NEGRO', '250', 'Callao', 'DESCRIPCIÓN DE TRABAJOS REALIZADOS DE PRUEBA 2', 'TRABAJOS REALIZADOS DE PRUEBA 2', '1° REPUESTOS DE PRUEBA 2.\r\n2° REPUESTOS DE PRUEBA 2.\r\n3° REPUESTOS DE PRUEBA 2.', 'SERVICIOS DE TERCEROS DE PRUEBA 2', 'OBSERVACIONES DE PRUEBA 2', 'RODRIGUEZ ZAPATA JULIO', '87776756', 'JORDY RAMIREZ TREJO', '67262726'),
(3, '15:42:01 p.m.', '15:45:55 p.m.', '2017-06-11', 'MANTENIMIENTO AL ENLLANTE', 'NISSAN', 'C3G-515', '7MO', 'AUTO', 'ROJO', '200', 'ATE', 'DESCRIPCIÓN DE TRABAJOS REALIZADOS DE PRUEBA 3', 'TRABAJOS REALIZADOS DE PRUEBA 3', '1° REPUESTO DE PRUEBA 3.\r\n2° REPUESTO DE PRUEBA 3.\r\n3° REPUESTO DE PRUEBA 3.', 'SERVICIOS DE TERCEROS DE PRUEBA 3', 'OBSERVACIONES DE PRUEBA 3', 'MANUEL LOPEZ NORIEGA', '87875554', 'NICOLAS ESPINOZA TREJO', '34343356'),
(4, '15:46:11 p.m.', '15:53:36 p.m.', '2017-06-11', 'MANTENIMIENTO AL PARACHOQUE', 'BUGGATI', 'C3G-515', '1ERO', 'AUTO MODERNO', 'ROJO CLARO', '250', 'Callao', 'DESCRIPCIÓN DE TRABAJOS REALIZADOS DE PRUEBA 4', 'TRABAJOS REALIZADOS DE PRUEBA 4', '1° REPUESTOS DE PRUEBA 4.\r\n2° REPUESTOS DE PRUEBA 4.\r\n3° REPUESTOS DE PRUEBA 4', 'SERVICIOS DE TERCEROS DE PRUEBA 4', 'OBSERVACIONES DE PRUEBA 4', 'WALTER IZQUIERDO QUILLCA', '98878267', 'MIGUEL SANANCINO HILARIO', '87878786'),
(6, '15:57:16 p.m.', '16:01:35 p.m.', '2017-06-11', 'MANTENIMIENTO AL MOTOR', 'MANTENIMIENTO AL MOTOR', 'E6H-912', 'ALTISIO', 'AUTO', 'NEGRO', '200', 'SJL', 'DESCRIPCIÓN DE TRABAJOS REALIZADOS DE PRUEBA 6', 'TRABAJOS REALIZADOS DE PRUEBA 6', ' 1° REPUESTOS DE PRUEBA 6.\r\n2° REPUESTOS DE PRUEBA 6.\r\n3° REPUESTOS DE PRUEBA 6.', ' SERVICIOS DE TERCEROS DE PRUEBA 6', 'OBSERVACIONES DE PRUEBA 6', 'JORGE CORAZAO GIEZEKE', '88787766', 'ROCIO QUISPE CONDORI', '76654433');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proforma`
--

CREATE TABLE `proforma` (
  `otn` int(8) NOT NULL,
  `descripciones_d` varchar(500) COLLATE utf8_spanish_ci NOT NULL,
  `cantidades_p` varchar(500) COLLATE utf8_spanish_ci NOT NULL,
  `precios_p` varchar(500) COLLATE utf8_spanish_ci NOT NULL,
  `numero_proforma` varchar(11) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `nombre_usuario` varchar(10) COLLATE utf8_spanish_ci NOT NULL,
  `nombre_apellidos` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `contrasenia` varchar(8) COLLATE utf8_spanish_ci NOT NULL,
  `telefono` int(9) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`nombre_usuario`, `nombre_apellidos`, `contrasenia`, `telefono`) VALUES
('bryanpal', 'Bryan Palacios Prueba', 'bryan123', 982947468),
('rodoesca', 'Rodolfo Escalante Cumpa', 'rodi1234', 982947468);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `factura`
--
ALTER TABLE `factura`
  ADD KEY `otn` (`otn`);

--
-- Indices de la tabla `ordenotn`
--
ALTER TABLE `ordenotn`
  ADD PRIMARY KEY (`otn`);

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `factura`
--
ALTER TABLE `factura`
  ADD CONSTRAINT `factura_ibfk_1` FOREIGN KEY (`otn`) REFERENCES `ordenotn` (`otn`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
