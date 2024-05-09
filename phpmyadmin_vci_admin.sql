-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 08-05-2024 a las 10:50:30
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
  `FO_departamento` int(11) NOT NULL
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
(13, 'Manizales', 3);

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
(91886754, 'Daniel Cepulveda', '3145637812', 'otello_34.12@gmail.com', 'Cll 34 # 12 - 53');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `compra`
--

CREATE TABLE `compra` (
  `id_compra` int(11) NOT NULL,
  `FO_proveedor` int(11) NOT NULL,
  `subtotal` float NOT NULL,
  `impuestos` float NOT NULL,
  `total` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Volcado de datos para la tabla `compra`
--

INSERT INTO `compra` (`id_compra`, `FO_proveedor`, `subtotal`, `impuestos`, `total`) VALUES
(1234, 92394297, 980000, 156800, 1136800),
(1235, 90066599, 796300, 127408, 923708),
(1236, 91135464, 2100000, 336000, 2436000),
(1237, 91737891, 598600, 95776, 694376),
(1238, 90034567, 12458900, 1993430, 14452400);

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
  `FO_producto` int(11) NOT NULL,
  `cantidad_dev` int(11) NOT NULL,
  `descripcion` longtext NOT NULL,
  `subtotal` float NOT NULL,
  `impuestos` float NOT NULL,
  `total` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

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
-- Estructura de tabla para la tabla `error_ciudad`
--

CREATE TABLE `error_ciudad` (
  `id_error` int(11) NOT NULL,
  `FO_error` int(11) NOT NULL,
  `FO_ciudad` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `error_cliente`
--

CREATE TABLE `error_cliente` (
  `id_error` int(11) NOT NULL,
  `FO_error` int(11) NOT NULL,
  `FO_cliente` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `error_compra`
--

CREATE TABLE `error_compra` (
  `id_error` int(11) NOT NULL,
  `FO_error` int(11) NOT NULL,
  `FO_compra` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `error_departamento`
--

CREATE TABLE `error_departamento` (
  `id_error` int(11) NOT NULL,
  `FO_error` int(11) NOT NULL,
  `FO_departamento` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `error_devolucion`
--

CREATE TABLE `error_devolucion` (
  `id_error` int(11) NOT NULL,
  `FO_error` int(11) NOT NULL,
  `FO_devolucion` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `error_marca`
--

CREATE TABLE `error_marca` (
  `id_error` int(11) NOT NULL,
  `FO_error` int(11) NOT NULL,
  `FO_marca` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `error_producto`
--

CREATE TABLE `error_producto` (
  `id_error` int(11) NOT NULL,
  `FO_error` int(11) NOT NULL,
  `FO_producto` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `error_proveedor`
--

CREATE TABLE `error_proveedor` (
  `id_error` int(11) NOT NULL,
  `FO_error` int(11) NOT NULL,
  `FO_proveedor` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `error_unidad`
--

CREATE TABLE `error_unidad` (
  `id_error` int(11) NOT NULL,
  `FO_error` int(11) NOT NULL,
  `FO_unidad` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `error_usuario`
--

CREATE TABLE `error_usuario` (
  `id_error` int(11) NOT NULL,
  `FO_error` int(11) NOT NULL,
  `FO_usuario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `error_venta`
--

CREATE TABLE `error_venta` (
  `id_error` int(11) NOT NULL,
  `FO_error` int(11) NOT NULL,
  `FO_venta` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

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
(10, 'Offi-Esco');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `producto`
--

CREATE TABLE `producto` (
  `id_producto` int(11) NOT NULL,
  `nombre` varchar(80) NOT NULL,
  `FO_marca` int(11) NOT NULL,
  `cantidad_producto` int(11) NOT NULL,
  `medida` int(11) NOT NULL,
  `FO_unidad` int(11) NOT NULL,
  `precio_venta` float NOT NULL,
  `fecha_venc` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Volcado de datos para la tabla `producto`
--

INSERT INTO `producto` (`id_producto`, `nombre`, `FO_marca`, `cantidad_producto`, `medida`, `FO_unidad`, `precio_venta`, `fecha_venc`) VALUES
(1, 'Chocolate Corona', 3, 22, 500, 3, 10000, '2026-02-14'),
(2, 'Agua brisa', 4, 30, 600, 1, 2100, '2015-06-24'),
(3, 'Queso sabana', 1, 15, 450, 3, 13000, '2024-11-23'),
(4, 'Caldo Maggi', 2, 20, 132, 3, 4800, '2026-07-12'),
(5, 'Tennis Runner', 7, 10, 39, 12, 229000, '2099-12-31'),
(6, 'Camisa Campshire', 5, 5, 1, 6, 158000, '2099-12-31'),
(7, 'Jean 510', 6, 10, 28, 12, 280000, '2099-12-31'),
(8, 'Boligrafo semi gel', 10, 30, 7, 8, 1200, '2026-02-10'),
(9, 'zapato longonni 1210', 8, 5, 40, 12, 340000, '2099-12-31'),
(10, 'Morral JeanBook', 9, 8, 12, 2, 112000, '2099-12-31');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proveedor`
--

CREATE TABLE `proveedor` (
  `id_proveedor_nit` int(11) NOT NULL,
  `razon_social` varchar(80) NOT NULL,
  `contacto` varchar(80) NOT NULL,
  `telefono` varchar(15) DEFAULT NULL,
  `correo` varchar(45) NOT NULL,
  `direccion` varchar(45) NOT NULL,
  `FO_ciudad` int(11) NOT NULL
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
(2, 'lt'),
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
  `contrasenia` varchar(30) NOT NULL,
  `telefono` varchar(15) NOT NULL,
  `correo` varchar(45) NOT NULL,
  `rol` varchar(25) NOT NULL,
  `caja` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id_usuario`, `nombre`, `contrasenia`, `telefono`, `correo`, `rol`, `caja`) VALUES
(2, 'Cesar Avellaneda', '989843', '3214895671', 'cesar_avella_12@hotmail.com', 'Vendedor', 3),
(1000, 'Eduardo Castro', '453689', '3118645734', 'administracion_nogal@gmail.com', 'Administrador', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `venta`
--

CREATE TABLE `venta` (
  `id_venta` int(11) NOT NULL,
  `fecha` date NOT NULL,
  `FO_usuario_vendedor` int(11) NOT NULL,
  `FO_cliente` int(11) NOT NULL,
  `subtotal` float NOT NULL,
  `impuestos` float NOT NULL,
  `total` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Volcado de datos para la tabla `venta`
--

INSERT INTO `venta` (`id_venta`, `fecha`, `FO_usuario_vendedor`, `FO_cliente`, `subtotal`, `impuestos`, `total`) VALUES
(300, '2024-06-04', 2, 91886754, 21084, 4016, 25100);

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
  ADD KEY `FO_venta` (`FO_venta`,`FO_vendedor`,`FO_producto`),
  ADD KEY `FO_vendedor` (`FO_vendedor`),
  ADD KEY `FO_producto` (`FO_producto`);

--
-- Indices de la tabla `errorh`
--
ALTER TABLE `errorh`
  ADD PRIMARY KEY (`id_errorh`);

--
-- Indices de la tabla `error_ciudad`
--
ALTER TABLE `error_ciudad`
  ADD PRIMARY KEY (`id_error`),
  ADD KEY `FO_error` (`FO_error`,`FO_ciudad`),
  ADD KEY `FO_ciudad` (`FO_ciudad`);

--
-- Indices de la tabla `error_cliente`
--
ALTER TABLE `error_cliente`
  ADD PRIMARY KEY (`id_error`),
  ADD KEY `FO_error` (`FO_error`,`FO_cliente`),
  ADD KEY `FO_cliente` (`FO_cliente`);

--
-- Indices de la tabla `error_compra`
--
ALTER TABLE `error_compra`
  ADD PRIMARY KEY (`id_error`),
  ADD KEY `FO_error` (`FO_error`,`FO_compra`),
  ADD KEY `FO_compra` (`FO_compra`);

--
-- Indices de la tabla `error_departamento`
--
ALTER TABLE `error_departamento`
  ADD PRIMARY KEY (`id_error`),
  ADD KEY `FO_error` (`FO_error`,`FO_departamento`),
  ADD KEY `FO_departamento` (`FO_departamento`);

--
-- Indices de la tabla `error_devolucion`
--
ALTER TABLE `error_devolucion`
  ADD PRIMARY KEY (`id_error`),
  ADD KEY `FO_error` (`FO_error`,`FO_devolucion`),
  ADD KEY `FO_devolucion` (`FO_devolucion`);

--
-- Indices de la tabla `error_marca`
--
ALTER TABLE `error_marca`
  ADD PRIMARY KEY (`id_error`),
  ADD KEY `FO_error` (`FO_error`,`FO_marca`),
  ADD KEY `FO_marca` (`FO_marca`);

--
-- Indices de la tabla `error_producto`
--
ALTER TABLE `error_producto`
  ADD PRIMARY KEY (`id_error`),
  ADD KEY `FO_error` (`FO_error`,`FO_producto`),
  ADD KEY `FO_producto` (`FO_producto`);

--
-- Indices de la tabla `error_proveedor`
--
ALTER TABLE `error_proveedor`
  ADD PRIMARY KEY (`id_error`),
  ADD KEY `FO_error` (`FO_error`,`FO_proveedor`),
  ADD KEY `FO_proveedor` (`FO_proveedor`);

--
-- Indices de la tabla `error_unidad`
--
ALTER TABLE `error_unidad`
  ADD PRIMARY KEY (`id_error`),
  ADD KEY `FO_error` (`FO_error`,`FO_unidad`),
  ADD KEY `FO_unidad` (`FO_unidad`);

--
-- Indices de la tabla `error_usuario`
--
ALTER TABLE `error_usuario`
  ADD PRIMARY KEY (`id_error`),
  ADD KEY `FO_error` (`FO_error`,`FO_usuario`),
  ADD KEY `FO_usuario` (`FO_usuario`);

--
-- Indices de la tabla `error_venta`
--
ALTER TABLE `error_venta`
  ADD PRIMARY KEY (`id_error`),
  ADD KEY `FO_error` (`FO_error`,`FO_venta`),
  ADD KEY `FO_venta` (`FO_venta`);

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
  ADD UNIQUE KEY `id_usuario_UNIQUE` (`id_usuario`);

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
  MODIFY `id_ciudad` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de la tabla `compra`
--
ALTER TABLE `compra`
  MODIFY `id_compra` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1241;

--
-- AUTO_INCREMENT de la tabla `departamento`
--
ALTER TABLE `departamento`
  MODIFY `id_departamento` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de la tabla `devolucion`
--
ALTER TABLE `devolucion`
  MODIFY `id_devolucion` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `errorh`
--
ALTER TABLE `errorh`
  MODIFY `id_errorh` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=431;

--
-- AUTO_INCREMENT de la tabla `error_ciudad`
--
ALTER TABLE `error_ciudad`
  MODIFY `id_error` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `error_cliente`
--
ALTER TABLE `error_cliente`
  MODIFY `id_error` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `error_compra`
--
ALTER TABLE `error_compra`
  MODIFY `id_error` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `error_departamento`
--
ALTER TABLE `error_departamento`
  MODIFY `id_error` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `error_devolucion`
--
ALTER TABLE `error_devolucion`
  MODIFY `id_error` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `error_marca`
--
ALTER TABLE `error_marca`
  MODIFY `id_error` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `error_producto`
--
ALTER TABLE `error_producto`
  MODIFY `id_error` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `error_proveedor`
--
ALTER TABLE `error_proveedor`
  MODIFY `id_error` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `error_unidad`
--
ALTER TABLE `error_unidad`
  MODIFY `id_error` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `error_usuario`
--
ALTER TABLE `error_usuario`
  MODIFY `id_error` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `error_venta`
--
ALTER TABLE `error_venta`
  MODIFY `id_error` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `marca`
--
ALTER TABLE `marca`
  MODIFY `id_marca` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `producto`
--
ALTER TABLE `producto`
  MODIFY `id_producto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de la tabla `unidad_medida`
--
ALTER TABLE `unidad_medida`
  MODIFY `id_unidad` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1003;

--
-- AUTO_INCREMENT de la tabla `venta`
--
ALTER TABLE `venta`
  MODIFY `id_venta` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=303;

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
  ADD CONSTRAINT `ciudad_ibfk_1` FOREIGN KEY (`FO_departamento`) REFERENCES `departamento` (`id_departamento`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `compra`
--
ALTER TABLE `compra`
  ADD CONSTRAINT `compra_ibfk_1` FOREIGN KEY (`FO_proveedor`) REFERENCES `proveedor` (`id_proveedor_nit`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `devolucion`
--
ALTER TABLE `devolucion`
  ADD CONSTRAINT `devolucion_ibfk_1` FOREIGN KEY (`FO_vendedor`) REFERENCES `usuario` (`id_usuario`) ON UPDATE CASCADE,
  ADD CONSTRAINT `devolucion_ibfk_2` FOREIGN KEY (`FO_venta`) REFERENCES `venta` (`id_venta`) ON UPDATE CASCADE,
  ADD CONSTRAINT `devolucion_ibfk_3` FOREIGN KEY (`FO_producto`) REFERENCES `vinculo_v_p` (`FO_producto`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `error_ciudad`
--
ALTER TABLE `error_ciudad`
  ADD CONSTRAINT `error_ciudad_ibfk_1` FOREIGN KEY (`FO_ciudad`) REFERENCES `ciudad` (`id_ciudad`) ON UPDATE CASCADE,
  ADD CONSTRAINT `error_ciudad_ibfk_2` FOREIGN KEY (`FO_error`) REFERENCES `errorh` (`id_errorh`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `error_cliente`
--
ALTER TABLE `error_cliente`
  ADD CONSTRAINT `error_cliente_ibfk_1` FOREIGN KEY (`FO_cliente`) REFERENCES `cliente` (`id_cliente`) ON UPDATE CASCADE,
  ADD CONSTRAINT `error_cliente_ibfk_2` FOREIGN KEY (`FO_error`) REFERENCES `errorh` (`id_errorh`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `error_compra`
--
ALTER TABLE `error_compra`
  ADD CONSTRAINT `error_compra_ibfk_1` FOREIGN KEY (`FO_compra`) REFERENCES `compra` (`id_compra`) ON UPDATE CASCADE,
  ADD CONSTRAINT `error_compra_ibfk_2` FOREIGN KEY (`FO_error`) REFERENCES `errorh` (`id_errorh`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `error_departamento`
--
ALTER TABLE `error_departamento`
  ADD CONSTRAINT `error_departamento_ibfk_1` FOREIGN KEY (`FO_error`) REFERENCES `errorh` (`id_errorh`) ON UPDATE CASCADE,
  ADD CONSTRAINT `error_departamento_ibfk_2` FOREIGN KEY (`FO_departamento`) REFERENCES `departamento` (`id_departamento`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `error_devolucion`
--
ALTER TABLE `error_devolucion`
  ADD CONSTRAINT `error_devolucion_ibfk_1` FOREIGN KEY (`FO_error`) REFERENCES `errorh` (`id_errorh`) ON UPDATE CASCADE,
  ADD CONSTRAINT `error_devolucion_ibfk_2` FOREIGN KEY (`FO_devolucion`) REFERENCES `devolucion` (`id_devolucion`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `error_marca`
--
ALTER TABLE `error_marca`
  ADD CONSTRAINT `error_marca_ibfk_1` FOREIGN KEY (`FO_error`) REFERENCES `errorh` (`id_errorh`) ON UPDATE CASCADE,
  ADD CONSTRAINT `error_marca_ibfk_2` FOREIGN KEY (`FO_marca`) REFERENCES `marca` (`id_marca`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `error_producto`
--
ALTER TABLE `error_producto`
  ADD CONSTRAINT `error_producto_ibfk_1` FOREIGN KEY (`FO_error`) REFERENCES `errorh` (`id_errorh`) ON UPDATE CASCADE,
  ADD CONSTRAINT `error_producto_ibfk_2` FOREIGN KEY (`FO_producto`) REFERENCES `producto` (`id_producto`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `error_proveedor`
--
ALTER TABLE `error_proveedor`
  ADD CONSTRAINT `error_proveedor_ibfk_1` FOREIGN KEY (`FO_error`) REFERENCES `errorh` (`id_errorh`) ON UPDATE CASCADE,
  ADD CONSTRAINT `error_proveedor_ibfk_2` FOREIGN KEY (`FO_proveedor`) REFERENCES `proveedor` (`id_proveedor_nit`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `error_unidad`
--
ALTER TABLE `error_unidad`
  ADD CONSTRAINT `error_unidad_ibfk_1` FOREIGN KEY (`FO_error`) REFERENCES `errorh` (`id_errorh`) ON UPDATE CASCADE,
  ADD CONSTRAINT `error_unidad_ibfk_2` FOREIGN KEY (`FO_unidad`) REFERENCES `unidad_medida` (`id_unidad`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `error_usuario`
--
ALTER TABLE `error_usuario`
  ADD CONSTRAINT `error_usuario_ibfk_1` FOREIGN KEY (`FO_error`) REFERENCES `errorh` (`id_errorh`) ON UPDATE CASCADE,
  ADD CONSTRAINT `error_usuario_ibfk_2` FOREIGN KEY (`FO_usuario`) REFERENCES `usuario` (`id_usuario`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `error_venta`
--
ALTER TABLE `error_venta`
  ADD CONSTRAINT `error_venta_ibfk_1` FOREIGN KEY (`FO_error`) REFERENCES `errorh` (`id_errorh`) ON UPDATE CASCADE,
  ADD CONSTRAINT `error_venta_ibfk_2` FOREIGN KEY (`FO_venta`) REFERENCES `venta` (`id_venta`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `producto`
--
ALTER TABLE `producto`
  ADD CONSTRAINT `producto_ibfk_1` FOREIGN KEY (`FO_unidad`) REFERENCES `unidad_medida` (`id_unidad`) ON UPDATE CASCADE,
  ADD CONSTRAINT `producto_ibfk_2` FOREIGN KEY (`FO_marca`) REFERENCES `marca` (`id_marca`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `proveedor`
--
ALTER TABLE `proveedor`
  ADD CONSTRAINT `proveedor_ibfk_1` FOREIGN KEY (`FO_ciudad`) REFERENCES `ciudad` (`id_ciudad`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `venta`
--
ALTER TABLE `venta`
  ADD CONSTRAINT `venta_ibfk_1` FOREIGN KEY (`FO_usuario_vendedor`) REFERENCES `usuario` (`id_usuario`) ON UPDATE CASCADE,
  ADD CONSTRAINT `venta_ibfk_2` FOREIGN KEY (`FO_cliente`) REFERENCES `cliente` (`id_cliente`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `vinculo_p_c`
--
ALTER TABLE `vinculo_p_c`
  ADD CONSTRAINT `vinculo_p_c_ibfk_1` FOREIGN KEY (`id_producto`) REFERENCES `producto` (`id_producto`) ON UPDATE CASCADE,
  ADD CONSTRAINT `vinculo_p_c_ibfk_2` FOREIGN KEY (`id_compra`) REFERENCES `compra` (`id_compra`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `vinculo_v_p`
--
ALTER TABLE `vinculo_v_p`
  ADD CONSTRAINT `vinculo_v_p_ibfk_1` FOREIGN KEY (`FO_venta`) REFERENCES `venta` (`id_venta`) ON UPDATE CASCADE,
  ADD CONSTRAINT `vinculo_v_p_ibfk_2` FOREIGN KEY (`FO_producto`) REFERENCES `producto` (`id_producto`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
