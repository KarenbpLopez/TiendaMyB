-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 26-10-2020 a las 01:55:03
-- Versión del servidor: 10.4.8-MariaDB
-- Versión de PHP: 7.3.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `tiendamb`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `t_ajustes`
--

CREATE TABLE `t_ajustes` (
  `e_idajuaste` int(11) NOT NULL,
  `c_nombreempresa` varchar(50) NOT NULL,
  `l_logo` longblob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `t_bitacora`
--

CREATE TABLE `t_bitacora` (
  `e_idbitacora` int(11) NOT NULL,
  `dt_fecha` datetime NOT NULL,
  `c_detalle` varchar(255) NOT NULL,
  `e_idusuario` int(11) NOT NULL,
  `c_accion` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `t_cargo`
--

CREATE TABLE `t_cargo` (
  `e_idcargo` int(11) NOT NULL,
  `c_nombrecargo` varchar(50) NOT NULL,
  `db_salario` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `t_cargo`
--

INSERT INTO `t_cargo` (`e_idcargo`, `c_nombrecargo`, `db_salario`) VALUES
(1, 'Admon', 20000);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `t_categoria`
--

CREATE TABLE `t_categoria` (
  `e_idcategoria` int(11) NOT NULL,
  `c_nombrecategoria` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `t_categoria`
--

INSERT INTO `t_categoria` (`e_idcategoria`, `c_nombrecategoria`) VALUES
(1, 'hjdfhdhsadas'),
(2, '2'),
(3, 'rewrew'),
(5, 'Guardar'),
(6, 'Guardar'),
(7, 'Hoy si'),
(8, 'jdjdjdjsjsjsj'),
(9, 'rrtert');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `t_cliente`
--

CREATE TABLE `t_cliente` (
  `e_idcliente` int(11) NOT NULL,
  `c_dui` varchar(20) NOT NULL,
  `c_nombre` varchar(25) NOT NULL,
  `c_apellido` varchar(25) NOT NULL,
  `c_direccion` varchar(100) NOT NULL,
  `c_telefono` varchar(9) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `t_compra`
--

CREATE TABLE `t_compra` (
  `e_idcompra` int(11) NOT NULL,
  `e_fecha` int(11) NOT NULL,
  `e_idproveedor` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `t_descuentos`
--

CREATE TABLE `t_descuentos` (
  `e_iddescuento` int(11) NOT NULL,
  `db_porcentaje` double NOT NULL,
  `d_fechainicio` date NOT NULL,
  `d_fechafin` date NOT NULL,
  `ty_estado` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `t_descuentosproducto`
--

CREATE TABLE `t_descuentosproducto` (
  `e_iddescuentoproducto` int(11) NOT NULL,
  `e_iddescuento` int(11) NOT NULL,
  `e_idproducto` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `t_detalleproducto`
--

CREATE TABLE `t_detalleproducto` (
  `e_iddetalleproducto` int(11) NOT NULL,
  `e_cantidad` int(11) NOT NULL,
  `e_unidadporpaquete` int(11) NOT NULL,
  `e_fechavencimiento` int(11) NOT NULL,
  `e_tipopaquete` int(11) NOT NULL,
  `e_idcompra` int(11) NOT NULL,
  `e_preciocompra` int(11) NOT NULL,
  `e_idproducto` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `t_detalleventa`
--

CREATE TABLE `t_detalleventa` (
  `e_iddetalleventa` int(11) NOT NULL,
  `e_idproducto` int(11) NOT NULL,
  `e_cantidad` int(11) NOT NULL,
  `db_precio` double NOT NULL,
  `ty_tipoventa` tinyint(1) NOT NULL,
  `e_idventa` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `t_diashorario`
--

CREATE TABLE `t_diashorario` (
  `e_iddias` int(11) NOT NULL,
  `e_idhorario` int(11) NOT NULL,
  `e_dia` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `t_diashorario`
--

INSERT INTO `t_diashorario` (`e_iddias`, `e_idhorario`, `e_dia`) VALUES
(24, 1, 1),
(25, 1, 4);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `t_empleado`
--

CREATE TABLE `t_empleado` (
  `e_idempleado` int(11) NOT NULL,
  `c_dui` varchar(10) NOT NULL,
  `c_nombre` varchar(25) NOT NULL,
  `c_apellido` varchar(25) NOT NULL,
  `c_direccion` varchar(100) NOT NULL,
  `c_telefono` varchar(9) NOT NULL,
  `e_idcargo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `t_empleado`
--

INSERT INTO `t_empleado` (`e_idempleado`, `c_dui`, `c_nombre`, `c_apellido`, `c_direccion`, `c_telefono`, `e_idcargo`) VALUES
(1, '323224', 'Pepito', 'Juarez', 'Mi casa', '42323', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `t_factura`
--

CREATE TABLE `t_factura` (
  `e_idfactura` int(11) NOT NULL,
  `e_idventa` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `t_horario`
--

CREATE TABLE `t_horario` (
  `e_idhorario` int(11) NOT NULL,
  `c_horainicio` varchar(9) NOT NULL,
  `c_horafin` varchar(9) NOT NULL,
  `e_idempleado` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `t_horario`
--

INSERT INTO `t_horario` (`e_idhorario`, `c_horainicio`, `c_horafin`, `e_idempleado`) VALUES
(1, '15:00', '20:00', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `t_marca`
--

CREATE TABLE `t_marca` (
  `e_idmarca` int(11) NOT NULL,
  `c_nombremarca` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `t_producto`
--

CREATE TABLE `t_producto` (
  `e_idproducto` int(11) NOT NULL,
  `c_nombreproducto` varchar(50) NOT NULL,
  `c_codigo` varchar(25) NOT NULL,
  `e_porcentajeganancia` int(11) NOT NULL,
  `e_precioventa` int(11) NOT NULL,
  `e_idmarca` int(11) NOT NULL,
  `e_idcategoria` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `t_proveedor`
--

CREATE TABLE `t_proveedor` (
  `e_idproveedor` int(11) NOT NULL,
  `c_nombre` varchar(50) NOT NULL,
  `c_telefono` varchar(9) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `t_proveedor`
--

INSERT INTO `t_proveedor` (`e_idproveedor`, `c_nombre`, `c_telefono`) VALUES
(2, 'Prove2', '5423432');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `t_usuario`
--

CREATE TABLE `t_usuario` (
  `e_idusuario` int(11) NOT NULL,
  `c_nombreusuario` varchar(10) NOT NULL,
  `c_clave` varchar(150) NOT NULL,
  `ty_nivel` tinyint(1) NOT NULL,
  `c_preguntarespaldo` varchar(50) NOT NULL,
  `c_respuestarespaldo` varchar(50) NOT NULL,
  `e_idempleado` int(11) NOT NULL,
  `c_correo` varchar(75) NOT NULL,
  `c_passwordtmp` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `t_usuario`
--

INSERT INTO `t_usuario` (`e_idusuario`, `c_nombreusuario`, `c_clave`, `ty_nivel`, `c_preguntarespaldo`, `c_respuestarespaldo`, `e_idempleado`, `c_correo`, `c_passwordtmp`) VALUES
(1, 'User 1', '123', 1, 'Como se llama', 'Francisco', 1, 'franhdez97@gmail.com', 'f73b3ad82dcf455df19d7c81b6e31f40'),
(2, 'fran', '25d55ad283aa400af464c76d713c07ad', 0, 'Cual es su color favorito', 'Azul', 1, 'franhdez97@gmail.com', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `t_venta`
--

CREATE TABLE `t_venta` (
  `e_idventa` int(11) NOT NULL,
  `dt_fecha` datetime NOT NULL,
  `e_idempleado` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `t_ventacliente`
--

CREATE TABLE `t_ventacliente` (
  `e_idventacliente` int(11) NOT NULL,
  `e_idcliente` int(11) NOT NULL,
  `e_idventa` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `t_ajustes`
--
ALTER TABLE `t_ajustes`
  ADD PRIMARY KEY (`e_idajuaste`);

--
-- Indices de la tabla `t_bitacora`
--
ALTER TABLE `t_bitacora`
  ADD KEY `idusuario` (`e_idusuario`);

--
-- Indices de la tabla `t_cargo`
--
ALTER TABLE `t_cargo`
  ADD PRIMARY KEY (`e_idcargo`);

--
-- Indices de la tabla `t_categoria`
--
ALTER TABLE `t_categoria`
  ADD PRIMARY KEY (`e_idcategoria`);

--
-- Indices de la tabla `t_cliente`
--
ALTER TABLE `t_cliente`
  ADD PRIMARY KEY (`e_idcliente`);

--
-- Indices de la tabla `t_compra`
--
ALTER TABLE `t_compra`
  ADD PRIMARY KEY (`e_idcompra`),
  ADD KEY `idproveedor` (`e_idproveedor`);

--
-- Indices de la tabla `t_descuentos`
--
ALTER TABLE `t_descuentos`
  ADD PRIMARY KEY (`e_iddescuento`);

--
-- Indices de la tabla `t_descuentosproducto`
--
ALTER TABLE `t_descuentosproducto`
  ADD PRIMARY KEY (`e_iddescuentoproducto`),
  ADD KEY `iddescuento` (`e_iddescuento`),
  ADD KEY `idproducto` (`e_idproducto`);

--
-- Indices de la tabla `t_detalleproducto`
--
ALTER TABLE `t_detalleproducto`
  ADD PRIMARY KEY (`e_iddetalleproducto`),
  ADD KEY `idcompra` (`e_idcompra`),
  ADD KEY `idproducto` (`e_idproducto`);

--
-- Indices de la tabla `t_detalleventa`
--
ALTER TABLE `t_detalleventa`
  ADD PRIMARY KEY (`e_iddetalleventa`),
  ADD KEY `idproducto` (`e_idproducto`),
  ADD KEY `idventa` (`e_idventa`);

--
-- Indices de la tabla `t_diashorario`
--
ALTER TABLE `t_diashorario`
  ADD PRIMARY KEY (`e_iddias`),
  ADD KEY `idhorario` (`e_idhorario`);

--
-- Indices de la tabla `t_empleado`
--
ALTER TABLE `t_empleado`
  ADD PRIMARY KEY (`e_idempleado`),
  ADD KEY `idcargo` (`e_idcargo`);

--
-- Indices de la tabla `t_factura`
--
ALTER TABLE `t_factura`
  ADD PRIMARY KEY (`e_idfactura`),
  ADD KEY `idventa` (`e_idventa`);

--
-- Indices de la tabla `t_horario`
--
ALTER TABLE `t_horario`
  ADD PRIMARY KEY (`e_idhorario`),
  ADD KEY `idempleado` (`e_idempleado`);

--
-- Indices de la tabla `t_marca`
--
ALTER TABLE `t_marca`
  ADD PRIMARY KEY (`e_idmarca`);

--
-- Indices de la tabla `t_producto`
--
ALTER TABLE `t_producto`
  ADD PRIMARY KEY (`e_idproducto`),
  ADD KEY `idmarca` (`e_idmarca`),
  ADD KEY `idcategoria` (`e_idcategoria`);

--
-- Indices de la tabla `t_proveedor`
--
ALTER TABLE `t_proveedor`
  ADD PRIMARY KEY (`e_idproveedor`);

--
-- Indices de la tabla `t_usuario`
--
ALTER TABLE `t_usuario`
  ADD PRIMARY KEY (`e_idusuario`),
  ADD KEY `idempleado` (`e_idempleado`);

--
-- Indices de la tabla `t_venta`
--
ALTER TABLE `t_venta`
  ADD PRIMARY KEY (`e_idventa`),
  ADD KEY `idempleado` (`e_idempleado`);

--
-- Indices de la tabla `t_ventacliente`
--
ALTER TABLE `t_ventacliente`
  ADD PRIMARY KEY (`e_idventacliente`),
  ADD KEY `idcliente` (`e_idcliente`),
  ADD KEY `idventa` (`e_idventa`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `t_ajustes`
--
ALTER TABLE `t_ajustes`
  MODIFY `e_idajuaste` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `t_cargo`
--
ALTER TABLE `t_cargo`
  MODIFY `e_idcargo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `t_categoria`
--
ALTER TABLE `t_categoria`
  MODIFY `e_idcategoria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `t_cliente`
--
ALTER TABLE `t_cliente`
  MODIFY `e_idcliente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `t_compra`
--
ALTER TABLE `t_compra`
  MODIFY `e_idcompra` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `t_descuentos`
--
ALTER TABLE `t_descuentos`
  MODIFY `e_iddescuento` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `t_detalleproducto`
--
ALTER TABLE `t_detalleproducto`
  MODIFY `e_iddetalleproducto` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `t_detalleventa`
--
ALTER TABLE `t_detalleventa`
  MODIFY `e_iddetalleventa` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `t_diashorario`
--
ALTER TABLE `t_diashorario`
  MODIFY `e_iddias` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT de la tabla `t_empleado`
--
ALTER TABLE `t_empleado`
  MODIFY `e_idempleado` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `t_factura`
--
ALTER TABLE `t_factura`
  MODIFY `e_idfactura` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `t_horario`
--
ALTER TABLE `t_horario`
  MODIFY `e_idhorario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `t_marca`
--
ALTER TABLE `t_marca`
  MODIFY `e_idmarca` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `t_proveedor`
--
ALTER TABLE `t_proveedor`
  MODIFY `e_idproveedor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `t_usuario`
--
ALTER TABLE `t_usuario`
  MODIFY `e_idusuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `t_venta`
--
ALTER TABLE `t_venta`
  MODIFY `e_idventa` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `t_ventacliente`
--
ALTER TABLE `t_ventacliente`
  MODIFY `e_idventacliente` int(11) NOT NULL AUTO_INCREMENT;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `t_bitacora`
--
ALTER TABLE `t_bitacora`
  ADD CONSTRAINT `t_bitacora_ibfk_1` FOREIGN KEY (`e_idusuario`) REFERENCES `t_usuario` (`e_idusuario`);

--
-- Filtros para la tabla `t_compra`
--
ALTER TABLE `t_compra`
  ADD CONSTRAINT `t_compra_ibfk_1` FOREIGN KEY (`e_idproveedor`) REFERENCES `t_proveedor` (`e_idproveedor`);

--
-- Filtros para la tabla `t_descuentosproducto`
--
ALTER TABLE `t_descuentosproducto`
  ADD CONSTRAINT `t_descuentosproducto_ibfk_1` FOREIGN KEY (`e_idproducto`) REFERENCES `t_producto` (`e_idproducto`),
  ADD CONSTRAINT `t_descuentosproducto_ibfk_2` FOREIGN KEY (`e_iddescuento`) REFERENCES `t_descuentos` (`e_iddescuento`);

--
-- Filtros para la tabla `t_detalleproducto`
--
ALTER TABLE `t_detalleproducto`
  ADD CONSTRAINT `t_detalleproducto_ibfk_1` FOREIGN KEY (`e_idproducto`) REFERENCES `t_producto` (`e_idproducto`),
  ADD CONSTRAINT `t_detalleproducto_ibfk_2` FOREIGN KEY (`e_idcompra`) REFERENCES `t_compra` (`e_idcompra`);

--
-- Filtros para la tabla `t_detalleventa`
--
ALTER TABLE `t_detalleventa`
  ADD CONSTRAINT `t_detalleventa_ibfk_1` FOREIGN KEY (`e_idventa`) REFERENCES `t_venta` (`e_idventa`),
  ADD CONSTRAINT `t_detalleventa_ibfk_2` FOREIGN KEY (`e_idproducto`) REFERENCES `t_producto` (`e_idproducto`);

--
-- Filtros para la tabla `t_diashorario`
--
ALTER TABLE `t_diashorario`
  ADD CONSTRAINT `t_diashorario_ibfk_1` FOREIGN KEY (`e_idhorario`) REFERENCES `t_horario` (`e_idhorario`);

--
-- Filtros para la tabla `t_empleado`
--
ALTER TABLE `t_empleado`
  ADD CONSTRAINT `t_empleado_ibfk_1` FOREIGN KEY (`e_idcargo`) REFERENCES `t_cargo` (`e_idcargo`);

--
-- Filtros para la tabla `t_factura`
--
ALTER TABLE `t_factura`
  ADD CONSTRAINT `t_factura_ibfk_1` FOREIGN KEY (`e_idventa`) REFERENCES `t_venta` (`e_idventa`);

--
-- Filtros para la tabla `t_horario`
--
ALTER TABLE `t_horario`
  ADD CONSTRAINT `t_horario_ibfk_1` FOREIGN KEY (`e_idempleado`) REFERENCES `t_empleado` (`e_idempleado`);

--
-- Filtros para la tabla `t_producto`
--
ALTER TABLE `t_producto`
  ADD CONSTRAINT `t_producto_ibfk_2` FOREIGN KEY (`e_idcategoria`) REFERENCES `t_categoria` (`e_idcategoria`),
  ADD CONSTRAINT `t_producto_ibfk_3` FOREIGN KEY (`e_idmarca`) REFERENCES `t_marca` (`e_idmarca`);

--
-- Filtros para la tabla `t_usuario`
--
ALTER TABLE `t_usuario`
  ADD CONSTRAINT `t_usuario_ibfk_1` FOREIGN KEY (`e_idempleado`) REFERENCES `t_empleado` (`e_idempleado`);

--
-- Filtros para la tabla `t_venta`
--
ALTER TABLE `t_venta`
  ADD CONSTRAINT `t_venta_ibfk_1` FOREIGN KEY (`e_idempleado`) REFERENCES `t_empleado` (`e_idempleado`);

--
-- Filtros para la tabla `t_ventacliente`
--
ALTER TABLE `t_ventacliente`
  ADD CONSTRAINT `t_ventacliente_ibfk_1` FOREIGN KEY (`e_idventa`) REFERENCES `t_venta` (`e_idventa`),
  ADD CONSTRAINT `t_ventacliente_ibfk_2` FOREIGN KEY (`e_idcliente`) REFERENCES `t_cliente` (`e_idcliente`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
