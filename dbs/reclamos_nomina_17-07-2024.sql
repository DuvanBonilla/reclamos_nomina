-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:3306
-- Tiempo de generación: 17-07-2024 a las 14:45:11
-- Versión del servidor: 10.5.20-MariaDB
-- Versión de PHP: 7.3.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `id22105798_reclamoscargo`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `aprobacion_costos_nomina`
--

CREATE TABLE `aprobacion_costos_nomina` (
  `id` int(20) NOT NULL,
  `area` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `aprobacion_costos_nomina`
--

INSERT INTO `aprobacion_costos_nomina` (`id`, `area`) VALUES
(1, 'costos'),
(2, 'nomina');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `archivos`
--

CREATE TABLE `archivos` (
  `id` int(255) NOT NULL,
  `fecha` date NOT NULL,
  `nombre_archivo` varchar(255) NOT NULL,
  `archivo` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `archivos`
--

INSERT INTO `archivos` (`id`, `fecha`, `nombre_archivo`, `archivo`) VALUES
(6, '2024-05-22', 'DOTACION (2).png', 'C:xampphtdocs\reclamos_nominaarchivosDOTACION (2).png');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estado`
--

CREATE TABLE `estado` (
  `id_estado` int(11) NOT NULL,
  `estado` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `estado`
--

INSERT INTO `estado` (`id_estado`, `estado`) VALUES
(1, 'pendiente'),
(2, 'proceso'),
(3, 'terminado');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estado_aprobado_area`
--

CREATE TABLE `estado_aprobado_area` (
  `id_aprobacion` int(20) NOT NULL,
  `estado` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `estado_aprobado_area`
--

INSERT INTO `estado_aprobado_area` (`id_aprobacion`, `estado`) VALUES
(1, 'aprobado'),
(2, 'pendiente');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estado_usuarios`
--

CREATE TABLE `estado_usuarios` (
  `id` int(11) NOT NULL,
  `estado` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `estado_usuarios`
--

INSERT INTO `estado_usuarios` (`id`, `estado`) VALUES
(1, 'activo'),
(2, 'desactivado');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `novedades_nomina`
--

CREATE TABLE `novedades_nomina` (
  `id` int(11) NOT NULL,
  `fecha_registro` date DEFAULT NULL,
  `fecha_novedad` date DEFAULT NULL,
  `nombre_coordinador` varchar(100) DEFAULT NULL,
  `semana` varchar(255) NOT NULL,
  `tipo_novedad` varchar(100) DEFAULT NULL,
  `trabajador` varchar(255) DEFAULT NULL,
  `descripcion` text DEFAULT NULL,
  `id_servicio` varchar(255) DEFAULT NULL,
  `id_usuario` int(11) DEFAULT NULL,
  `id_estado` int(11) DEFAULT NULL,
  `id_zona_especifica` varchar(255) NOT NULL,
  `id_zona` int(20) NOT NULL,
  `id_aprobacionC` int(20) NOT NULL,
  `id_aprobacionN` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `novedades_nomina`
--

INSERT INTO `novedades_nomina` (`id`, `fecha_registro`, `fecha_novedad`, `nombre_coordinador`, `semana`, `tipo_novedad`, `trabajador`, `descripcion`, `id_servicio`, `id_usuario`, `id_estado`, `id_zona_especifica`, `id_zona`, `id_aprobacionC`, `id_aprobacionN`) VALUES
(14, '2024-05-30', '2024-05-06', 'AndresSierra', '19', 'saldo faltante', 'Jesus Escobar', 'Descontar a Yeiner Rudiño los días Lunes y martes sem 19 y pagar a jesus ALberto escobar', '18306', 2, 3, 'Banacol Zungo', 2, 1, 1),
(15, '2024-05-30', '2024-05-17', 'ErasmoMadarriaga', '20', 'saldo faltante', 'Diego obregon', 'Pagar jornal a Diego obregon', '2600', 2, 3, 'Muelle 2', 2, 1, 1),
(16, '2024-06-07', '2024-05-31', 'YordiJimenez', '22', 'saldo faltante', 'OSCAR ACUÑA', 'En el radicado 204147 se debe quitar a Laureano Herrera y poner a Oscar Acuña', '1065', 4, 3, 'Patio Smitco', 4, 1, 1),
(17, '2024-06-07', '2024-05-20', 'YordiJimenez', '21', 'saldo faltante', 'JHONATHAN BERDUGO', 'Del radicado 203066 quitar a Jhonatan Cervantes y poner a Jhonathan Berdugo', '1006', 4, 3, 'Patio Smitco', 4, 1, 1),
(18, '2024-06-07', '2024-05-20', 'YordiJimenez', '21', 'saldo faltante', 'JHONATHAN BERDUGO', 'Del radicado 203066 quitar a Jhonatan Cervantes y poner a Jhonathan Berdugo', '1060', 4, 3, 'Patio Smitco', 4, 1, 1),
(19, '2024-06-07', '2024-05-30', 'YordiJimenez', '22', 'Saldo sobrante', 'ANDRES BLANCO WILFRIDO ESTRADA MAURICIO ROA BRAYAN GOMEZ', 'los radicados 204141-204142-204143 se deben eliminar, se digitaron doble.', '10064', 4, 3, 'Patio Smitco', 4, 1, 1),
(20, '2024-06-07', '2024-05-30', 'YordiJimenez', '22', 'Saldo sobrante', 'SERGIO DURAN ', 'ELIMINAR EL CONSECUTIVO 204131 SE DIGITÓ DOBLE', '10406', 4, 3, 'Patio Satelite', 4, 1, 1),
(21, '2024-06-07', '2024-05-22', 'YordiJimenez', '21', 'Saldo sobrante', 'LUIS ALVIS CARLOS PEREZ', 'LOS RADICADOS 203491 203162 SE DEBEN ELIMINAR, MAL DIGITADOS.', '1077', 4, 3, 'Patio Smitco', 4, 1, 1),
(22, '2024-06-12', '2024-06-02', 'ErasmoMadarriaga', '22', 'saldo faltante', 'MADRID GOMEZ YOIBER DAVID Y OCHOA MERCADO  UBER DARIO', 'El valor a pagar Cambia de 48.921 a $54.573 para cada Uno', '20021', 2, 3, 'Patio Contenedores', 2, 1, 1),
(23, '2024-06-12', '2024-05-26', 'ErasmoMadarriaga', '21', 'saldo faltante', 'BRAVO MARTINEZ JAMER DAVID', 'Faltante por reportar este dia; pagar  $99.574', '112500', 2, 3, 'Zona Aduanera', 2, 1, 1),
(24, '2024-06-18', '2024-06-08', 'ErasmoMadarriaga', '23', 'saldo faltante', 'DIDIER NORIEGA Y FABIAN TORRES', 'REALIZAR PAGO EN EL SERVICIO 4463 = 11434 CAJAS Y EL 4464= 1798 CAJAS PARA CADA UNO', '4463 / 4464', 2, 3, 'Muelle 2', 2, 1, 1),
(25, '2024-06-18', '2024-05-25', 'ErasmoMadarriaga', '21', 'saldo faltante', 'DIEGO OBREGON', 'Descontar jornal a Juan David Rodriguez y pagarselo a Diego Obregon', '2600', 2, 3, 'Muelle 2', 2, 1, 1),
(27, '2024-06-20', '2024-06-03', 'ErasmoMadarriaga', '23', 'Saldo sobrante', 'RUDIÑO ROSARIO SILFREDO y  IBARGUEN YANEZ CARLOS ANDRES', 'Se pago de mas en el jornal, el valor a pagar solo es 43333.33 a cada uno', '4458', 2, 3, 'Muelle 2', 2, 1, 1),
(31, '2024-06-20', '2024-06-07', 'CostosLogistica', '23', 'saldo faltante', 'ARGUMEDO ARGUMEDO ABEL ENRIQUE y 	SERNA HERNANDEZ CRISTIAN CAMILO', 'La cantidad en Unidades de pago son 9881,50 cajas para cada uno; valor a pgar serian $22925.08 con las nuevas unidades', '17281', 2, 3, 'Banacol Zungo', 2, 1, 1),
(32, '2024-06-20', '2024-05-23', 'HectorMarinoMosquera', '18520', 'Saldo sobrante', 'MOSQUERA MARTINEZ HECTOR MARINO', 'Descontar labor operativa por valor de $50537.52, y pagarlo al codigo del coordinado (90050265)', '21', 2, 3, 'Patio Smitco', 2, 1, 1),
(35, '2024-06-26', '2024-06-07', 'ErasmoMadarriaga', '23', 'saldo faltante', 'ANDRES PADILLA', 'DESCONTAR A FERNEY PADILLA\r\nPAGAR A ABDRES PADILLA', '4455', 2, 3, 'Muelle 2', 2, 1, 1),
(36, '2024-06-27', '2024-06-10', 'ErasmoMadarriaga', '24', 'saldo faltante', 'SEBASTIAN HERRERA / FRANCISCO ANAYA / FABIAN GUERRA', 'AGREGAR AL 4447 A LOS 3\r\nAGREAR AL 4453 A SEBASTIAN HERRERA', '4447/4453', 2, 3, 'Muelle 2', 2, 1, 1),
(37, '2024-07-08', '2024-06-25', 'HectorMarinoMosquera', '26', 'saldo faltante', 'Camilo Guevara', '-Descontar a Jhon Fernando Escudero\r\n+Camilo Guevara', '18500', 6, 3, 'Banacol N2', 6, 1, 1),
(38, '2024-07-09', '2024-06-29', 'ErasmoMadarriaga', '26', 'saldo faltante', 'CRISTIAN SANCHEZ', 'ELIMINAR ESE DIA AL SEÑOR NUÑEZ NARVAEZ ANGEL\r\nY PAGARLE A CRISTIAN DAVID SANCHEZ', '20000 / 20001 / 20002', 2, 3, 'Carton Uniban', 2, 1, 1),
(39, '2024-07-09', '2024-07-17', 'YordiJimenez', '25', 'saldo faltante', 'YONIS DAVILA', 'En el consecutivo 206142 quitar a Yony Estrada y colocar a Yonis Dávila.', '10442', 4, 2, 'Patio Smitco', 4, 1, 2),
(40, '2024-07-09', '2024-07-18', 'YordiJimenez', '25', 'saldo faltante', 'JAINER GOMEZ PINEDO', 'En el consecutivo 206085 quitar a Numan Pabon y poner Jainer Gomez Pinedo', '1088', 4, 2, 'SPSM buque', 4, 1, 2),
(41, '2024-07-15', '2024-07-01', 'ErasmoMadarriaga', '27', 'saldo faltante', 'Amaurys Cuadrado', 'pagar  jornal de 8 horas, valor $87.318', '20021', 7, 2, 'Muelle 2', 7, 1, 2),
(42, '2024-07-15', '2024-07-01', 'ErasmoMadarriaga', '27', 'saldo faltante', 'Esteban Ramos Taborda / Oscar Espitia', 'Esteban Ramos Taborda Pagar Jornal de $78.273,97\r\nOscar Espitia pagar jornal de $89.456,03\r\n', '20020', 7, 2, 'Muelle 2', 7, 1, 2),
(43, '2024-07-15', '2024-07-06', 'ErasmoMadarriaga', '27', 'saldo faltante', 'Esteban Ramos Taborda', 'pagar jornal de $58.191,21', '20021', 7, 2, 'Muelle 2', 7, 1, 2),
(44, '2024-07-15', '2024-07-06', 'ErasmoMadarriaga', '27', 'saldo faltante', 'Mauricio Cuesta / Juan Carlos Gonzales', 'Ambos pagarles 1 jornal a cada uno $52.164,03', '20020', 7, 2, 'Muelle 2', 7, 1, 2),
(45, '2024-07-15', '2024-06-11', 'ErasmoMadarriaga', '24', 'saldo faltante', 'Jaider Martinez', 'Descontar a Juan Bautista palacios 112.764,96\r\nPagarselos a jaider Martinez', '20021', 7, 2, 'Patio Contenedores', 7, 1, 2),
(46, '2024-07-15', '2024-06-24', 'ErasmoMadarriaga', '26', 'saldo faltante', 'Lowis Cordoba', 'Descontar a Manuel Quintana \r\n4450 = $10.818,94\r\n412302= $65761,94\r\nPagarselos a Lowis Cordoba', '4450/412302', 7, 2, 'Muelle 2', 7, 1, 2),
(47, '2024-07-16', '2024-07-02', 'HectorMarinoMosquera', '27', 'saldo faltante', 'CHAVERRA LARA STIVINSON', 'ELIMINAR A SANCHEZ MOSQUERA KENNIER ALEXANDER\r\nPAGAR A CHAVERRA LARA STIVINSON', '18500', 6, 2, 'Banacol N2', 6, 1, 2),
(48, '2024-07-16', '2024-07-03', 'HectorMarinoMosquera', '27', 'saldo faltante', 'PADILLA OYOLA LUIS MARIO', 'ELIMINAR A SANCHEZ MOSQUERA KENNIER ALEXANDER\r\nAGREGAR A PADILLA OYOLA LUIS MARIO', '18500', 6, 2, 'Banacol N2', 6, 1, 2),
(49, '2024-07-16', '2024-07-02', 'ErasmoMadarriaga', '27', 'saldo faltante', 'CUADRADO USUGA AMAURIS DE JESUS', 'Descontar a RAMOS TABORDA ESTEBAN ANDRES\r\npagar a CUADRADO USUGA AMAURIS DE JESUS\r\n', '20021', 7, 2, 'Patio Contenedores', 7, 1, 2),
(50, '2024-07-16', '2024-07-02', 'ErasmoMadarriaga', '27', 'saldo faltante', 'ESPITIA ANAYA OSCAR MIGUEL', 'Descontar a GONZALEZ ARENAS JUAN CARLOS\r\npagar a ESPITIA ANAYA OSCAR MIGUEL\r\n', '20020', 7, 2, 'Patio Contenedores', 7, 1, 2),
(51, '2024-07-16', '2024-07-02', 'ErasmoMadarriaga', '27', 'saldo faltante', 'RAMOS TABORDA ESTEBAN ANDRES', 'descontar a CUESTA  MAURICIO \r\npagar a RAMOS TABORDA ESTEBAN ANDRES\r\n', '20020', 7, 2, 'Patio Contenedores', 7, 1, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `roles`
--

CREATE TABLE `roles` (
  `id_rol` int(11) NOT NULL,
  `rol` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `roles`
--

INSERT INTO `roles` (`id_rol`, `rol`) VALUES
(1, 'administrador'),
(2, 'coordinador'),
(3, 'costos'),
(4, 'nomina');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `codigo` int(11) NOT NULL,
  `id_rol` int(11) DEFAULT NULL,
  `id_zona` int(11) DEFAULT NULL,
  `estado` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`codigo`, `id_rol`, `id_zona`, `estado`) VALUES
(1, 1, 1, 1),
(2, 3, 2, 1),
(3, 4, 3, 1),
(4, 2, 4, 1),
(5, 2, 5, 1),
(6, 2, 6, 1),
(7, 2, 7, 1),
(8, 2, 8, 1),
(9, 2, 9, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `zona`
--

CREATE TABLE `zona` (
  `id_zona` int(11) NOT NULL,
  `zona` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `zona`
--

INSERT INTO `zona` (`id_zona`, `zona`) VALUES
(1, 'Administracion'),
(2, 'Costos'),
(3, 'Nomina'),
(4, 'Santa Marta'),
(5, 'Banacol Zungo'),
(6, 'Colonia'),
(7, 'Uniban Zungo'),
(8, 'Operaciones Marinas'),
(9, 'Uniban m3');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `zona_especifica`
--

CREATE TABLE `zona_especifica` (
  `id` int(255) NOT NULL,
  `zona` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `zona_especifica`
--

INSERT INTO `zona_especifica` (`id`, `zona`) VALUES
(1, 'Patio Smitco'),
(2, 'Patio satelite'),
(3, 'SPSM buque'),
(4, 'Cuarto frio'),
(5, 'Lavado de contenedores'),
(6, 'Smitco cfs'),
(7, 'Banacol zungo'),
(8, 'Banacol N1'),
(9, 'Banacol N2'),
(10, 'Uniban colonia'),
(11, 'Muelle 2'),
(12, 'Patio contenedores'),
(13, 'Zona aduanera'),
(14, 'Carton uniban'),
(15, 'Operaciones marinas'),
(16, 'Uniban m3');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `aprobacion_costos_nomina`
--
ALTER TABLE `aprobacion_costos_nomina`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `archivos`
--
ALTER TABLE `archivos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `estado`
--
ALTER TABLE `estado`
  ADD PRIMARY KEY (`id_estado`);

--
-- Indices de la tabla `estado_aprobado_area`
--
ALTER TABLE `estado_aprobado_area`
  ADD PRIMARY KEY (`id_aprobacion`);

--
-- Indices de la tabla `estado_usuarios`
--
ALTER TABLE `estado_usuarios`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `novedades_nomina`
--
ALTER TABLE `novedades_nomina`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_usuario` (`id_usuario`),
  ADD KEY `id_estado` (`id_estado`),
  ADD KEY `id_zona` (`id_zona`),
  ADD KEY `id_aprobacion` (`id_aprobacionC`),
  ADD KEY `id_aprobacionN` (`id_aprobacionN`);

--
-- Indices de la tabla `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id_rol`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`codigo`),
  ADD KEY `id_rol` (`id_rol`),
  ADD KEY `id_zona` (`id_zona`),
  ADD KEY `estado` (`estado`);

--
-- Indices de la tabla `zona`
--
ALTER TABLE `zona`
  ADD PRIMARY KEY (`id_zona`);

--
-- Indices de la tabla `zona_especifica`
--
ALTER TABLE `zona_especifica`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `aprobacion_costos_nomina`
--
ALTER TABLE `aprobacion_costos_nomina`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `estado_usuarios`
--
ALTER TABLE `estado_usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `novedades_nomina`
--
ALTER TABLE `novedades_nomina`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT de la tabla `zona_especifica`
--
ALTER TABLE `zona_especifica`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `aprobacion_costos_nomina`
--
ALTER TABLE `aprobacion_costos_nomina`
  ADD CONSTRAINT `aprobacion_costos_nomina_ibfk_1` FOREIGN KEY (`id`) REFERENCES `estado_aprobado_area` (`id_aprobacion`);

--
-- Filtros para la tabla `novedades_nomina`
--
ALTER TABLE `novedades_nomina`
  ADD CONSTRAINT `novedades_nomina_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`codigo`),
  ADD CONSTRAINT `novedades_nomina_ibfk_2` FOREIGN KEY (`id_estado`) REFERENCES `estado` (`id_estado`),
  ADD CONSTRAINT `novedades_nomina_ibfk_3` FOREIGN KEY (`id_zona`) REFERENCES `zona` (`id_zona`),
  ADD CONSTRAINT `novedades_nomina_ibfk_4` FOREIGN KEY (`id_aprobacionC`) REFERENCES `aprobacion_costos_nomina` (`id`),
  ADD CONSTRAINT `novedades_nomina_ibfk_5` FOREIGN KEY (`id_aprobacionN`) REFERENCES `aprobacion_costos_nomina` (`id`);

--
-- Filtros para la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD CONSTRAINT `usuarios_ibfk_1` FOREIGN KEY (`id_rol`) REFERENCES `roles` (`id_rol`),
  ADD CONSTRAINT `usuarios_ibfk_2` FOREIGN KEY (`id_zona`) REFERENCES `zona` (`id_zona`),
  ADD CONSTRAINT `usuarios_ibfk_3` FOREIGN KEY (`estado`) REFERENCES `estado_usuarios` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
