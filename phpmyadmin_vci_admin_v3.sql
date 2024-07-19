-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 19-07-2024 a las 14:50:01
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
-- Base de datos: `vci_admin`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ciudad`
--

CREATE TABLE `ciudad` (
  `id_ciudad` int(11) NOT NULL,
  `nombre` varchar(45) NOT NULL,
  `FO_departamento` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Volcado de datos para la tabla `ciudad`
--

INSERT INTO `ciudad` (`id_ciudad`, `nombre`, `FO_departamento`) VALUES
(1, 'Popayan', 9),
(2, 'Barbosa', 6),
(3, 'Facatativá', 4),
(4, 'Mocoa', 7),
(5, 'Cali', 8),
(6, 'Manaure', 13),
(7, 'Sogamoso', 2),
(8, 'Apartadó', 1),
(9, 'Ipiales', 10),
(10, 'Barranquilla', 11),
(11, 'Balboa', 5),
(12, 'Cartagena', 12),
(13, 'Manizales', 3),
(14, 'Gamarra', 13);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cliente`
--

CREATE TABLE `cliente` (
  `id_cliente` int(11) NOT NULL,
  `nombre_apellido` varchar(80) NOT NULL,
  `telefono` varchar(15) DEFAULT NULL,
  `correo` varchar(45) NOT NULL,
  `domicilio` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Volcado de datos para la tabla `cliente`
--

INSERT INTO `cliente` (`id_cliente`, `nombre_apellido`, `telefono`, `correo`, `domicilio`) VALUES
(91886754, 'Daniel Cepulveda', '3145637812', 'otello_34.12@gmail.com', 'Cll 34 # 12 - 53'),
(1053611645, 'Omar Guarin', '3215006745', 'guarinomar@outlook.com', 'Cra 67 # 102 - 54');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `compra`
--

CREATE TABLE `compra` (
  `id_compra` int(11) NOT NULL,
  `FO_proveedor` int(11) DEFAULT NULL,
  `fecha_adq` date NOT NULL,
  `lista_prod` longtext NOT NULL,
  `total` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Volcado de datos para la tabla `compra`
--

INSERT INTO `compra` (`id_compra`, `FO_proveedor`, `fecha_adq`, `lista_prod`, `total`) VALUES
(1234, 92394297, '2024-04-28', 'a:2:{i:0;a:4:{i:0;s:25:\"Queso Sabana 450gr Alpina\";i:1;i:15;i:2;i:8200;i:3;i:123000;}i:1;a:4:{i:0;s:29:\"Caldo Maggi caja 132gr Nestle\";i:1;i:20;i:2;i:2300;i:3;i:46000;}}', 169000),
(1235, 90066599, '2022-05-12', 'a:2:{i:0;a:4:{i:0;s:28:\"Tennis Runner 39talla Adidas\";i:1;i:10;i:2;i:150000;i:3;i:1500000;}i:1;a:4:{i:0;s:29:\"Camisa CampShire 1M NorthFace\";i:1;i:5;i:2;i:100000;i:3;i:500000;}}', 2000000),
(1236, 91135464, '2023-08-14', 'a:2:{i:0;a:4:{i:0;s:31:\"Boligrafo semiGel 7mm Offi-Esco\";i:1;i:30;i:2;i:650;i:3;i:19500;}i:1;a:4:{i:0;s:27:\"Morral JeanBook 12lt  Norma\";i:1;i:8;i:2;i:80000;i:3;i:640000;}}', 659500),
(1237, 91737891, '2022-03-03', 'a:2:{i:0;a:4:{i:0;s:22:\"Jean 510 28talla Levis\";i:1;i:10;i:2;i:180000;i:3;i:1800000;}i:1;a:4:{i:0;s:38:\"zapato longonni 1210 40talla La Corona\";i:1;i:5;i:2;i:300000;i:3;i:1500000;}}', 3300000),
(1238, 90034567, '2024-03-06', 'a:2:{i:0;a:4:{i:0;s:30:\"Chocolate Corona 500gr Nutresa\";i:1;i:22;i:2;i:6800;i:3;i:149600;}i:1;a:4:{i:0;s:25:\"Agua Brisa 600ml CocaCola\";i:1;i:30;i:2;i:900;i:3;i:27000;}}', 176600);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `departamento`
--

CREATE TABLE `departamento` (
  `id_departamento` int(11) NOT NULL,
  `nombre` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Volcado de datos para la tabla `departamento`
--

INSERT INTO `departamento` (`id_departamento`, `nombre`) VALUES
(1, 'Antioquia'),
(2, 'Boyacá'),
(3, 'Caldas'),
(4, 'Cundinamarca'),
(5, 'Risaralda'),
(6, 'Santander'),
(7, 'Putumayo'),
(8, 'Valle del Cauca'),
(9, 'Cauca'),
(10, 'Nariño'),
(11, 'Atlántico'),
(12, 'Bolívar'),
(13, 'Cesar');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `devolucion`
--

CREATE TABLE `devolucion` (
  `id_devolucion` int(11) NOT NULL,
  `FO_venta` int(11) NOT NULL,
  `fecha` date NOT NULL,
  `FO_vendedor` int(11) NOT NULL,
  `lista_dev` longtext DEFAULT NULL,
  `total` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Volcado de datos para la tabla `devolucion`
--

INSERT INTO `devolucion` (`id_devolucion`, `FO_venta`, `fecha`, `FO_vendedor`, `lista_dev`, `total`) VALUES
(1, 301, '2024-07-15', 2, 'a:1:{i:0;a:5:{i:0;s:1:\"7\";i:1;s:23:\"Jean 510 28 talla Levis\";i:2;i:1;i:3;i:280000;i:4;i:280000;}}', 280000),
(2, 300, '2024-07-15', 2, 'a:2:{i:0;a:5:{i:0;s:1:\"1\";i:1;s:31:\"Chocolate Corona 500 gr Nutresa\";i:2;i:1;i:3;i:10000;i:4;i:10000;}i:1;a:5:{i:0;s:1:\"2\";i:1;s:26:\"Agua Brisa 600 ml CocaCola\";i:2;i:1;i:3;i:2100;i:4;i:2100;}}', 12100),
(3, 302, '2024-07-17', 2, 'a:2:{i:0;a:5:{i:0;s:1:\"8\";i:1;s:33:\"Boligrafo semi Gel 7 mm Offi-Esco\";i:2;i:1;i:3;i:1200;i:4;i:1200;}i:1;a:5:{i:0;s:1:\"7\";i:1;s:23:\"Jean 510 28 talla Levis\";i:2;i:1;i:3;i:280000;i:4;i:280000;}}', 281200);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `errorh`
--

CREATE TABLE `errorh` (
  `id_errorh` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `descripcion` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Volcado de datos para la tabla `errorh`
--

INSERT INTO `errorh` (`id_errorh`, `nombre`, `descripcion`) VALUES
(422, 'Error de configuración', 'No se puede configurar archivo myphp.ini'),
(423, 'Error de configuración', 'La ruta no es valida para alojar la carpeta home.');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `marca`
--

CREATE TABLE `marca` (
  `id_marca` int(11) NOT NULL,
  `nombre` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Volcado de datos para la tabla `marca`
--

INSERT INTO `marca` (`id_marca`, `nombre`) VALUES
(1, 'Alpina'),
(2, 'Nestle'),
(3, 'Nutresa'),
(4, 'CocaCola'),
(5, 'NorthFace'),
(6, 'Levis'),
(7, 'Adidas'),
(8, 'La corona'),
(9, 'Norma'),
(10, 'Offi-Esco'),
(11, 'UniLever');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `producto`
--

CREATE TABLE `producto` (
  `id_producto` int(11) NOT NULL,
  `nombre` varchar(80) NOT NULL,
  `FO_marca` int(11) DEFAULT NULL,
  `cantidad_producto` int(11) NOT NULL,
  `medida` int(11) NOT NULL,
  `FO_unidad` int(11) DEFAULT NULL,
  `precio_venta` float NOT NULL,
  `fecha_venc` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Volcado de datos para la tabla `producto`
--

INSERT INTO `producto` (`id_producto`, `nombre`, `FO_marca`, `cantidad_producto`, `medida`, `FO_unidad`, `precio_venta`, `fecha_venc`) VALUES
(1, 'Chocolate Corona', 3, 22, 500, 3, 10000, '2026-02-14'),
(2, 'Agua Brisa', 4, 30, 600, 1, 2100, '2025-06-24'),
(3, 'Queso Sabana', 1, 16, 450, 3, 12000, '2024-11-23'),
(4, 'Caldo Maggi', 2, 20, 132, 3, 4800, '2026-07-12'),
(5, 'Tennis Runner', 7, 10, 39, 12, 229000, '2099-12-31'),
(6, 'Camisa CampShire', 5, 5, 1, 6, 158000, '2099-12-31'),
(7, 'Jean 510', 6, 10, 28, 12, 280000, '2099-12-31'),
(8, 'Boligrafo semi Gel', 10, 30, 7, 8, 1200, '2026-02-10'),
(9, 'zapato longonni 1210', 8, 5, 40, 12, 340000, '2099-12-31'),
(10, 'Morral JeanBook', 9, 8, 12, 2, 112000, '2099-12-31'),
(11, 'Arequipe en pote', 1, 30, 125, 3, 4800, '2024-10-17'),
(12, 'Boligrafo BIC Negro', 9, 50, 5, 8, 1100, '2091-06-12'),
(13, 'Shampoo HS for Men', 11, 15, 375, 1, 18000, '2030-06-28');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proveedor`
--

CREATE TABLE `proveedor` (
  `id_proveedor_nit` int(12) NOT NULL,
  `razon_social` varchar(80) NOT NULL,
  `contacto` varchar(80) NOT NULL,
  `telefono` varchar(15) DEFAULT NULL,
  `correo` varchar(45) NOT NULL,
  `direccion` varchar(45) NOT NULL,
  `FO_ciudad` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Volcado de datos para la tabla `proveedor`
--

INSERT INTO `proveedor` (`id_proveedor_nit`, `razon_social`, `contacto`, `telefono`, `correo`, `direccion`, `FO_ciudad`) VALUES
(90034567, 'Distribuciones Boyaca', 'Ventas', '768-35567', 'ventas@distribucionesboyaca.com', 'Direccion 1', 7),
(90066599, 'Luz del Norte', 'Oficina Distribuciones', '785-45617', 'distribuciones_luznorte@outlook.com', 'DIRECCION #4', 10),
(91135464, 'La Gran Andina', 'Alexandra Pineda', '3218790567', 'asesora_alexa@granandina.com', 'DIRECCION 3', 11),
(91737891, 'ZipaCab', 'Andrés Castro', '3208715634', 'andres_ditribuciones@zipacab.com', 'DIRECCION #5', 3),
(92394297, 'Probac', 'Jersson Ramirez', '3245612249', 'jersson_probac@gmail.com', 'DIRECCION 2', 8);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rol`
--

CREATE TABLE `rol` (
  `id_rol` int(11) NOT NULL,
  `rol` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Volcado de datos para la tabla `rol`
--

INSERT INTO `rol` (`id_rol`, `rol`) VALUES
(1, 'Vendedor'),
(2, 'Gestor de Bodega'),
(3, 'Administrador'),
(4, 'Soporte Técnico');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `unidad_medida`
--

CREATE TABLE `unidad_medida` (
  `id_unidad` int(11) NOT NULL,
  `nombre` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Volcado de datos para la tabla `unidad_medida`
--

INSERT INTO `unidad_medida` (`id_unidad`, `nombre`) VALUES
(1, 'ml'),
(2, 'Lt'),
(3, 'gr'),
(4, 'Kg'),
(5, 'S'),
(6, 'M'),
(7, 'L'),
(8, 'mm'),
(9, 'cm'),
(10, 'in'),
(11, 'hojas'),
(12, 'talla');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `id_usuario` int(11) NOT NULL,
  `nombre` varchar(80) NOT NULL,
  `contrasenia` varchar(80) NOT NULL,
  `telefono` varchar(15) NOT NULL,
  `correo` varchar(45) NOT NULL,
  `FO_rol` int(11) DEFAULT NULL,
  `caja` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id_usuario`, `nombre`, `contrasenia`, `telefono`, `correo`, `FO_rol`, `caja`) VALUES
(2, 'Cesar Avellaneda', 'df1b970abd38a17f13665e7d4aa4c7c6738ee655', '3214895671', 'cesar_avella_12@hotmail.com', 1, 3),
(1000, 'Eduardo Castro', '71454dfffa8fa471d2646358de55b4dce518f3ca', '3118645734', 'administracion_nogal@gmail.com', 3, 0),
(1008, 'Jesús Ortega', '3b38191d961661da0477f491807b233d6da3641a', '3125673453', 'yizuz_O_o_@mail.com', 2, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `venta`
--

CREATE TABLE `venta` (
  `id_venta` int(11) NOT NULL,
  `fecha` date NOT NULL,
  `FO_usuario_vendedor` int(11) DEFAULT NULL,
  `FO_cliente` int(11) DEFAULT NULL,
  `productos_venta` longtext DEFAULT NULL,
  `total` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Volcado de datos para la tabla `venta`
--

INSERT INTO `venta` (`id_venta`, `fecha`, `FO_usuario_vendedor`, `FO_cliente`, `productos_venta`, `total`) VALUES
(300, '2024-06-04', 1000, 91886754, 'a:3:{i:0;a:5:{i:0;s:1:\"1\";i:1;s:31:\"Chocolate Corona 500 gr Nutresa\";i:2;i:1;i:3;i:10000;i:4;i:10000;}i:1;a:5:{i:0;s:1:\"2\";i:1;s:26:\"Agua Brisa 600 ml CocaCola\";i:2;i:3;i:3;i:2100;i:4;i:6300;}i:2;a:5:{i:0;s:1:\"3\";i:1;s:26:\"Queso Sabana 450 gr Alpina\";i:2;i:2;i:3;i:12000;i:4;i:24000;}}', 40300),
(301, '2024-07-05', 1000, 1053611645, 'a:1:{i:0;a:5:{i:0;s:1:\"7\";i:1;s:23:\"Jean 510 28 talla Levis\";i:2;i:2;i:3;i:280000;i:4;i:560000;}}', 560000),
(302, '2024-07-07', 2, 91886754, 'a:2:{i:0;a:5:{i:0;s:1:\"7\";i:1;s:23:\"Jean 510 28 talla Levis\";i:2;i:2;i:3;i:280000;i:4;i:560000;}i:1;a:5:{i:0;s:1:\"8\";i:1;s:33:\"Boligrafo semi Gel 7 mm Offi-Esco\";i:2;i:2;i:3;i:1200;i:4;i:2400;}}', 562400),
(303, '2024-07-08', 2, 1053611645, 'a:1:{i:0;a:5:{i:0;s:2:\"12\";i:1;s:30:\"Boligrafo BIC Negro 5 mm Norma\";i:2;i:10;i:3;i:1100;i:4;i:11000;}}', 11000),
(304, '2024-07-09', 1000, 91886754, 'a:2:{i:0;a:5:{i:0;s:1:\"5\";i:1;s:29:\"Tennis Runner 39 talla Adidas\";i:2;i:1;i:3;i:229000;i:4;i:229000;}i:1;a:5:{i:0;s:1:\"4\";i:1;s:25:\"Caldo Maggi 132 gr Nestle\";i:2;i:1;i:3;i:4800;i:4;i:4800;}}', 233800);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `vinculo_p_c`
--

CREATE TABLE `vinculo_p_c` (
  `id_vinculo` int(11) NOT NULL,
  `id_compra` int(11) NOT NULL,
  `id_producto` int(11) NOT NULL,
  `fecha_adq` date NOT NULL,
  `cantidad_adq` int(11) NOT NULL,
  `precio_compra` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Volcado de datos para la tabla `vinculo_p_c`
--

INSERT INTO `vinculo_p_c` (`id_vinculo`, `id_compra`, `id_producto`, `fecha_adq`, `cantidad_adq`, `precio_compra`) VALUES
(34, 1236, 7, '2022-07-15', 10, 243600),
(35, 1237, 6, '2023-11-11', 5, 135000),
(36, 1237, 8, '2023-11-11', 30, 645.86);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `vinculo_v_p`
--

CREATE TABLE `vinculo_v_p` (
  `id_vinculo` int(11) NOT NULL,
  `FO_venta` int(11) NOT NULL,
  `FO_producto` int(11) NOT NULL,
  `cantidad_venta` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Volcado de datos para la tabla `vinculo_v_p`
--

INSERT INTO `vinculo_v_p` (`id_vinculo`, `FO_venta`, `FO_producto`, `cantidad_venta`) VALUES
(786, 300, 1, 1),
(787, 300, 2, 1),
(788, 300, 3, 1);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `ciudad`
--
ALTER TABLE `ciudad`
  ADD PRIMARY KEY (`id_ciudad`),
  ADD KEY `FO_departamento` (`FO_departamento`);

--
-- Indices de la tabla `cliente`
--
ALTER TABLE `cliente`
  ADD PRIMARY KEY (`id_cliente`),
  ADD UNIQUE KEY `id_cliente_UNIQUE` (`id_cliente`);

--
-- Indices de la tabla `compra`
--
ALTER TABLE `compra`
  ADD PRIMARY KEY (`id_compra`),
  ADD KEY `FO_proveedor` (`FO_proveedor`);

--
-- Indices de la tabla `departamento`
--
ALTER TABLE `departamento`
  ADD PRIMARY KEY (`id_departamento`);

--
-- Indices de la tabla `devolucion`
--
ALTER TABLE `devolucion`
  ADD PRIMARY KEY (`id_devolucion`),
  ADD KEY `FO_vendedor` (`FO_vendedor`),
  ADD KEY `FO_venta` (`FO_venta`,`FO_vendedor`) USING BTREE;

--
-- Indices de la tabla `errorh`
--
ALTER TABLE `errorh`
  ADD PRIMARY KEY (`id_errorh`);

--
-- Indices de la tabla `marca`
--
ALTER TABLE `marca`
  ADD PRIMARY KEY (`id_marca`),
  ADD UNIQUE KEY `id_marca_UNIQUE` (`id_marca`);

--
-- Indices de la tabla `producto`
--
ALTER TABLE `producto`
  ADD PRIMARY KEY (`id_producto`),
  ADD KEY `FO_marca` (`FO_marca`,`FO_unidad`),
  ADD KEY `FO_unidad` (`FO_unidad`);

--
-- Indices de la tabla `proveedor`
--
ALTER TABLE `proveedor`
  ADD PRIMARY KEY (`id_proveedor_nit`),
  ADD KEY `FO_ciudad` (`FO_ciudad`);

--
-- Indices de la tabla `rol`
--
ALTER TABLE `rol`
  ADD PRIMARY KEY (`id_rol`);

--
-- Indices de la tabla `unidad_medida`
--
ALTER TABLE `unidad_medida`
  ADD PRIMARY KEY (`id_unidad`),
  ADD UNIQUE KEY `id_unidad_UNIQUE` (`id_unidad`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id_usuario`),
  ADD UNIQUE KEY `id_usuario_UNIQUE` (`id_usuario`),
  ADD KEY `FO_rol` (`FO_rol`);

--
-- Indices de la tabla `venta`
--
ALTER TABLE `venta`
  ADD PRIMARY KEY (`id_venta`),
  ADD KEY `FO_usuario_vendedor` (`FO_usuario_vendedor`,`FO_cliente`),
  ADD KEY `FO_cliente` (`FO_cliente`);

--
-- Indices de la tabla `vinculo_p_c`
--
ALTER TABLE `vinculo_p_c`
  ADD PRIMARY KEY (`id_vinculo`),
  ADD KEY `id_compra` (`id_compra`,`id_producto`),
  ADD KEY `id_producto` (`id_producto`);

--
-- Indices de la tabla `vinculo_v_p`
--
ALTER TABLE `vinculo_v_p`
  ADD PRIMARY KEY (`id_vinculo`),
  ADD KEY `FO_venta` (`FO_venta`,`FO_producto`),
  ADD KEY `FO_producto` (`FO_producto`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `ciudad`
--
ALTER TABLE `ciudad`
  MODIFY `id_ciudad` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de la tabla `compra`
--
ALTER TABLE `compra`
  MODIFY `id_compra` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1244;

--
-- AUTO_INCREMENT de la tabla `departamento`
--
ALTER TABLE `departamento`
  MODIFY `id_departamento` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de la tabla `devolucion`
--
ALTER TABLE `devolucion`
  MODIFY `id_devolucion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `errorh`
--
ALTER TABLE `errorh`
  MODIFY `id_errorh` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=431;

--
-- AUTO_INCREMENT de la tabla `marca`
--
ALTER TABLE `marca`
  MODIFY `id_marca` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de la tabla `rol`
--
ALTER TABLE `rol`
  MODIFY `id_rol` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `unidad_medida`
--
ALTER TABLE `unidad_medida`
  MODIFY `id_unidad` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1009;

--
-- AUTO_INCREMENT de la tabla `venta`
--
ALTER TABLE `venta`
  MODIFY `id_venta` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=306;

--
-- AUTO_INCREMENT de la tabla `vinculo_p_c`
--
ALTER TABLE `vinculo_p_c`
  MODIFY `id_vinculo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT de la tabla `vinculo_v_p`
--
ALTER TABLE `vinculo_v_p`
  MODIFY `id_vinculo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=789;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `ciudad`
--
ALTER TABLE `ciudad`
  ADD CONSTRAINT `ciudad_ibfk_1` FOREIGN KEY (`FO_departamento`) REFERENCES `departamento` (`id_departamento`);

--
-- Filtros para la tabla `compra`
--
ALTER TABLE `compra`
  ADD CONSTRAINT `compra_ibfk_1` FOREIGN KEY (`FO_proveedor`) REFERENCES `proveedor` (`id_proveedor_nit`);

--
-- Filtros para la tabla `devolucion`
--
ALTER TABLE `devolucion`
  ADD CONSTRAINT `devolucion_ibfk_4` FOREIGN KEY (`FO_vendedor`) REFERENCES `usuario` (`id_usuario`),
  ADD CONSTRAINT `devolucion_ibfk_5` FOREIGN KEY (`FO_venta`) REFERENCES `venta` (`id_venta`);

--
-- Filtros para la tabla `producto`
--
ALTER TABLE `producto`
  ADD CONSTRAINT `producto_ibfk_1` FOREIGN KEY (`FO_unidad`) REFERENCES `unidad_medida` (`id_unidad`),
  ADD CONSTRAINT `producto_ibfk_2` FOREIGN KEY (`FO_marca`) REFERENCES `marca` (`id_marca`);

--
-- Filtros para la tabla `proveedor`
--
ALTER TABLE `proveedor`
  ADD CONSTRAINT `proveedor_ibfk_1` FOREIGN KEY (`FO_ciudad`) REFERENCES `ciudad` (`id_ciudad`);

--
-- Filtros para la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD CONSTRAINT `usuario_ibfk_1` FOREIGN KEY (`FO_rol`) REFERENCES `rol` (`id_rol`);

--
-- Filtros para la tabla `venta`
--
ALTER TABLE `venta`
  ADD CONSTRAINT `venta_ibfk_2` FOREIGN KEY (`FO_cliente`) REFERENCES `cliente` (`id_cliente`),
  ADD CONSTRAINT `venta_ibfk_3` FOREIGN KEY (`FO_usuario_vendedor`) REFERENCES `usuario` (`id_usuario`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
