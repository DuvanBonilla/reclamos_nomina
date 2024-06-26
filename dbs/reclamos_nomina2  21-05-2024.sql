-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 21, 2024 at 04:18 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `reclamos_nomina`
--

-- --------------------------------------------------------

--
-- Table structure for table `aprobacion_costos_nomina`
--

CREATE TABLE `aprobacion_costos_nomina` (
  `id` int(20) NOT NULL,
  `area` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `aprobacion_costos_nomina`
--

INSERT INTO `aprobacion_costos_nomina` (`id`, `area`) VALUES
(1, 'costos'),
(2, 'nomina');

-- --------------------------------------------------------

--
-- Table structure for table `archivos`
--

CREATE TABLE `archivos` (
  `id` int(255) NOT NULL,
  `fecha` date NOT NULL,
  `nombre_archivo` varchar(255) NOT NULL,
  `archivo` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `estado`
--

CREATE TABLE `estado` (
  `id_estado` int(11) NOT NULL,
  `estado` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `estado`
--

INSERT INTO `estado` (`id_estado`, `estado`) VALUES
(1, 'pendiente'),
(2, 'proceso'),
(3, 'terminado');

-- --------------------------------------------------------

--
-- Table structure for table `estado_aprobado_area`
--

CREATE TABLE `estado_aprobado_area` (
  `id_aprobacion` int(20) NOT NULL,
  `estado` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `estado_aprobado_area`
--

INSERT INTO `estado_aprobado_area` (`id_aprobacion`, `estado`) VALUES
(1, 'aprobado'),
(2, 'pendiente');

-- --------------------------------------------------------

--
-- Table structure for table `estado_usuarios`
--

CREATE TABLE `estado_usuarios` (
  `id` int(11) NOT NULL,
  `estado` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `estado_usuarios`
--

INSERT INTO `estado_usuarios` (`id`, `estado`) VALUES
(1, 'activo'),
(2, 'desactivado');

-- --------------------------------------------------------

--
-- Table structure for table `novedades_nomina`
--

CREATE TABLE `novedades_nomina` (
  `id` int(25) NOT NULL,
  `fecha_registro` date DEFAULT NULL,
  `fecha_novedad` date DEFAULT NULL,
  `nombre_coordinador` varchar(100) DEFAULT NULL,
  `semana` varchar(255) NOT NULL,
  `tipo_novedad` varchar(100) DEFAULT NULL,
  `trabajador` varchar(100) DEFAULT NULL,
  `descripcion` text DEFAULT NULL,
  `id_servicio` int(11) DEFAULT NULL,
  `id_usuario` int(11) DEFAULT NULL,
  `id_estado` int(11) DEFAULT NULL,
  `id_zona_especifica` varchar(255) NOT NULL,
  `id_zona` int(20) NOT NULL,
  `id_aprobacionC` int(20) NOT NULL,
  `id_aprobacionN` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id_rol` int(11) NOT NULL,
  `rol` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id_rol`, `rol`) VALUES
(1, 'administrador'),
(2, 'coordinador'),
(3, 'costos'),
(4, 'nomina');

-- --------------------------------------------------------

--
-- Table structure for table `usuarios`
--

CREATE TABLE `usuarios` (
  `codigo` int(11) NOT NULL,
  `id_rol` int(11) DEFAULT NULL,
  `id_zona` int(11) DEFAULT NULL,
  `estado` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `usuarios`
--

INSERT INTO `usuarios` (`codigo`, `id_rol`, `id_zona`, `estado`) VALUES
(1, 2, 4, 1),
(2, 2, 5, 1),
(3, 2, 6, 1),
(4, 2, 7, 1),
(5, 2, 8, 1),
(6, 2, 9, 1),
(88, 4, 3, 1),
(99, 1, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `zona`
--

CREATE TABLE `zona` (
  `id_zona` int(11) NOT NULL,
  `zona` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `zona`
--

INSERT INTO `zona` (`id_zona`, `zona`) VALUES
(1, 'Administracion'),
(2, 'Costos'),
(3, 'Nomina'),
(4, 'Santa Marta'),
(5, 'Banacol zungo'),
(6, 'Colonia'),
(7, 'Uniban zungo'),
(8, 'Operaciones marinas'),
(9, 'Uniban m3');

-- --------------------------------------------------------

--
-- Table structure for table `zona_especifica`
--

CREATE TABLE `zona_especifica` (
  `id` int(255) NOT NULL,
  `zona` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `zona_especifica`
--

INSERT INTO `zona_especifica` (`id`, `zona`) VALUES
(1, 'Patio Smitco'),
(2, 'Patio satelite'),
(3, 'SPSM buque'),
(4, 'Cuarto frio'),
(5, 'Lavado de contenedores'),
(6, 'Smitco csf'),
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
-- Indexes for dumped tables
--

--
-- Indexes for table `aprobacion_costos_nomina`
--
ALTER TABLE `aprobacion_costos_nomina`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `archivos`
--
ALTER TABLE `archivos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `estado`
--
ALTER TABLE `estado`
  ADD PRIMARY KEY (`id_estado`);

--
-- Indexes for table `estado_aprobado_area`
--
ALTER TABLE `estado_aprobado_area`
  ADD PRIMARY KEY (`id_aprobacion`);

--
-- Indexes for table `estado_usuarios`
--
ALTER TABLE `estado_usuarios`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `novedades_nomina`
--
ALTER TABLE `novedades_nomina`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_usuario` (`id_usuario`),
  ADD KEY `id_estado` (`id_estado`),
  ADD KEY `id_zona` (`id_zona`),
  ADD KEY `id_aprobacion` (`id_aprobacionC`),
  ADD KEY `id_aprobacionN` (`id_aprobacionN`),
  ADD KEY `id_zona_especifica` (`id_zona_especifica`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id_rol`);

--
-- Indexes for table `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`codigo`),
  ADD KEY `id_rol` (`id_rol`),
  ADD KEY `id_zona` (`id_zona`),
  ADD KEY `estado` (`estado`);

--
-- Indexes for table `zona`
--
ALTER TABLE `zona`
  ADD PRIMARY KEY (`id_zona`);

--
-- Indexes for table `zona_especifica`
--
ALTER TABLE `zona_especifica`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `aprobacion_costos_nomina`
--
ALTER TABLE `aprobacion_costos_nomina`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `estado_usuarios`
--
ALTER TABLE `estado_usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `novedades_nomina`
--
ALTER TABLE `novedades_nomina`
  MODIFY `id` int(25) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `aprobacion_costos_nomina`
--
ALTER TABLE `aprobacion_costos_nomina`
  ADD CONSTRAINT `aprobacion_costos_nomina_ibfk_1` FOREIGN KEY (`id`) REFERENCES `estado_aprobado_area` (`id_aprobacion`);

--
-- Constraints for table `novedades_nomina`
--
ALTER TABLE `novedades_nomina`
  ADD CONSTRAINT `novedades_nomina_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`codigo`),
  ADD CONSTRAINT `novedades_nomina_ibfk_2` FOREIGN KEY (`id_estado`) REFERENCES `estado` (`id_estado`),
  ADD CONSTRAINT `novedades_nomina_ibfk_3` FOREIGN KEY (`id_zona`) REFERENCES `zona` (`id_zona`),
  ADD CONSTRAINT `novedades_nomina_ibfk_4` FOREIGN KEY (`id_aprobacionC`) REFERENCES `aprobacion_costos_nomina` (`id`),
  ADD CONSTRAINT `novedades_nomina_ibfk_5` FOREIGN KEY (`id_aprobacionN`) REFERENCES `aprobacion_costos_nomina` (`id`);

--
-- Constraints for table `usuarios`
--
ALTER TABLE `usuarios`
  ADD CONSTRAINT `usuarios_ibfk_1` FOREIGN KEY (`id_rol`) REFERENCES `roles` (`id_rol`),
  ADD CONSTRAINT `usuarios_ibfk_2` FOREIGN KEY (`id_zona`) REFERENCES `zona` (`id_zona`),
  ADD CONSTRAINT `usuarios_ibfk_3` FOREIGN KEY (`estado`) REFERENCES `estado_usuarios` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
