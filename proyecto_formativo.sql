-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 29-09-2021 a las 00:30:29
-- Versión del servidor: 10.4.19-MariaDB
-- Versión de PHP: 8.0.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `proyecto_formativo`
--

DELIMITER $$
--
-- Procedimientos
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `dettalle_compra` (IN `can` INT, IN `des` DECIMAL(10,2), IN `fk_p` INT, IN `fk_com` INT, OUT `men` VARCHAR(50))  BEGIN
 insert into detalle_compra ( cantidad, descuento, fk_pdto, fk_compra)
 values (can, des, fk_p, fk_com );
 
 set men ="Detalle de Compra Registrado!";
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `registar_compra` (IN `fech` DATE, IN `val` DECIMAL(10,2), IN `for_p` VARCHAR(50), IN `fk_en` INT, IN `fk_usua` INT, OUT `men` VARCHAR(50))  BEGIN
 insert into compra ( fecha, valor, forma_pago, fk_envio, fk_usuario)
   values (fech, val, for_p, fk_en, fk_usua);
   
   set men ="Compra registrada";
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `registrar_envio` (IN `esta` VARCHAR(50), IN `fec` DATE, IN `emp` VARCHAR(50), IN `dest` VARCHAR(50), IN `obser` VARCHAR(50), OUT `men` VARCHAR(50))  BEGIN
  insert into envio (estado, fecha, empresa, destino, observacion )
   values (esta, fec, emp, dest, obser);
   
   set men ="Envio registrado";
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `registrar_producto` (IN `nomb` VARCHAR(50), IN `descri` VARCHAR(50), IN `val` DECIMAL(10,2), IN `sto` INT, IN `cate` VARCHAR(50), IN `fk_pro` INT, OUT `men` VARCHAR(50))  BEGIN
insert into productos ( nombre, descripcion, valor, stock, categoria, fk_provedor )
 values (nomb, descri, val, sto, cate, fk_pro);
 
 set men ="Producto Registrado!";
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `registro_proveedor` (IN `nt` VARCHAR(20), IN `nom` VARCHAR(50), OUT `men` VARCHAR(50))  BEGIN
 insert into proveedor (nit, nombre )
 values (nt, nom);
 
 set men ="Proveedro Registrado!";
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `registro_usuario` (IN `ident` INT, IN `nom` VARCHAR(50), IN `tel` VARCHAR(20), IN `tip_usu` VARCHAR(50), IN `dir` VARCHAR(50), IN `usu` VARCHAR(29), IN `pas` VARCHAR(10), OUT `men` VARCHAR(50))  BEGIN
insert into usuario (pk_identificacion, nombre, telefono, tipo_usuario, direccion, usuario, contraseña)
values (ident, nom, tel, tip_usu, dir, usu, pas);

set men= "Usuario registrado!";

END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `compra`
--

CREATE TABLE `compra` (
  `pk_codigo` int(11) NOT NULL,
  `fecha` date NOT NULL,
  `valor` decimal(10,2) NOT NULL,
  `forma_pago` enum('online','contra_entrega') NOT NULL,
  `fk_envio` int(11) NOT NULL,
  `fk_usuario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `compra`
--

INSERT INTO `compra` (`pk_codigo`, `fecha`, `valor`, `forma_pago`, `fk_envio`, `fk_usuario`) VALUES
(1, '2021-07-21', '140000.00', 'online', 1, 1080365889),
(2, '2021-02-11', '28000.00', 'online', 2, 1080365889),
(3, '2021-08-17', '67000.00', '', 3, 1004033920),
(4, '2021-03-17', '17900.00', 'online', 4, 1004033920),
(5, '2021-01-15', '33900.00', 'online', 5, 1193043017),
(6, '2021-05-14', '130900.00', '', 1, 1193043017);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalle_compra`
--

CREATE TABLE `detalle_compra` (
  `id_detalle` int(11) NOT NULL,
  `cantidad` int(11) DEFAULT NULL,
  `descuento` decimal(10,0) DEFAULT NULL,
  `fk_pdto` int(11) NOT NULL,
  `fk_compra` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `detalle_compra`
--

INSERT INTO `detalle_compra` (`id_detalle`, `cantidad`, `descuento`, `fk_pdto`, `fk_compra`) VALUES
(2, 3, '2', 3, 1),
(3, 1, '4', 2, 3),
(4, 8, '20', 4, 1),
(5, 5, '5', 1, 4);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `envio`
--

CREATE TABLE `envio` (
  `codigo_env` int(11) NOT NULL,
  `estado` varchar(50) NOT NULL,
  `fecha` date DEFAULT NULL,
  `empresa` varchar(50) DEFAULT NULL,
  `destino` varchar(50) DEFAULT NULL,
  `observacion` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `envio`
--

INSERT INTO `envio` (`codigo_env`, `estado`, `fecha`, `empresa`, `destino`, `observacion`) VALUES
(1, 'Enviado', '2021-06-02', 'Servientrega', 'Bogota', 'Todo bien'),
(2, 'Retenido', '2021-03-10', 'Inter Rapidisimo', 'Neiva', 'Daño en el empaque'),
(3, 'Pendiente', '2021-02-01', 'Rapidisimo', 'Cali', 'Completar pedido'),
(4, 'Enviado', '2021-04-21', 'Trasprensa', 'Medellin', ' A punto de llegar'),
(5, 'Enviado', '2021-07-21', 'Servi entrega', 'Florencia', 'LLegando'),
(6, '2021-07-21', '0000-00-00', 'Online', '1', '1080365889');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `codigo_pdto` int(11) NOT NULL,
  `nombre_pro` varchar(50) NOT NULL,
  `descripcion` varchar(50) NOT NULL,
  `valor` decimal(10,2) NOT NULL,
  `stock` int(11) NOT NULL,
  `categoria` enum('fragancia','maquillaje','cuidado_personal','bebe') NOT NULL,
  `fk_provedor` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`codigo_pdto`, `nombre_pro`, `descripcion`, `valor`, `stock`, `categoria`, `fk_provedor`) VALUES
(1, 'Vibranza', 'Locion femenina con aroma floral', '70000.00', 43, 'fragancia', 1),
(2, 'Avellana', 'Gel exfoliante  para manos', '16900.00', 32, 'cuidado_personal', 1),
(3, 'Vital', 'Shampoo 2 en 1 todo tipo de cabello', '27900.00', 42, 'cuidado_personal', 1),
(4, 'Agu Mañana feliz', 'Shampoo cabello y cuerpo ', '27900.00', 25, 'maquillaje', 9),
(5, 'Labial emn', 'Labial picmentado larga duracion ', '219033.00', 30, 'maquillaje', 1),
(6, 'Arom', 'Locian masculina con aroma citrica', '110000.00', 12, 'fragancia', 1),
(19, 'Exfoliante', 'Crema corporal', '250000.00', 33, 'maquillaje', 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proveedor`
--

CREATE TABLE `proveedor` (
  `codigo` int(11) NOT NULL,
  `nit` varchar(50) DEFAULT NULL,
  `nombre` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `proveedor`
--

INSERT INTO `proveedor` (`codigo`, `nit`, `nombre`) VALUES
(1, '22859', 'Esika'),
(2, '984211', 'Yambal'),
(9, '234543', 'Natura'),
(11, '2423545', 'Avon');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `pk_identificacion` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `telefono` varchar(20) DEFAULT NULL,
  `tipo_usuario` enum('administrador','cliente') NOT NULL,
  `direccion` varchar(50) DEFAULT NULL,
  `usuario` varchar(50) DEFAULT NULL,
  `contraseña` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`pk_identificacion`, `nombre`, `telefono`, `tipo_usuario`, `direccion`, `usuario`, `contraseña`) VALUES
(23423423, 'Yheison', '345234', 'administrador', 'colombiano ', 'yhes@misena', '214324eqw'),
(1003983623, 'Adriana Pinzon', '3293474379', 'cliente', 'calle 12 ', 'apinzon', '123'),
(1004033920, 'Yheison Lanza', '3202786727', 'administrador', 'Acevedo', 'yheslanza@misena.edu.co', 'yheison200'),
(1078746496, 'alba', '311580762346', 'cliente', 'pitalito', 'alba@ysdgcyfsa', '32534rtfs'),
(1080365876, 'Karen Cordoba', '3202786727', 'administrador', 'Pitalito', 'loren@misena.edu.co', 'lore432'),
(1080365889, 'Derly Soto', '3212952396', 'administrador', 'Suaza', 'deryso@misena. edu', 'derly98'),
(1193043017, 'Yenifer Alvarado', '3212062308', 'administrador', 'Pitalito', 'yendalvarado@misena. edu', 'yenifer18');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `compra`
--
ALTER TABLE `compra`
  ADD PRIMARY KEY (`pk_codigo`),
  ADD KEY `realiza` (`fk_envio`),
  ADD KEY `hace` (`fk_usuario`);

--
-- Indices de la tabla `detalle_compra`
--
ALTER TABLE `detalle_compra`
  ADD PRIMARY KEY (`id_detalle`),
  ADD KEY `tiene` (`fk_compra`),
  ADD KEY `posee` (`fk_pdto`);

--
-- Indices de la tabla `envio`
--
ALTER TABLE `envio`
  ADD PRIMARY KEY (`codigo_env`);

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`codigo_pdto`),
  ADD KEY `esta` (`fk_provedor`);

--
-- Indices de la tabla `proveedor`
--
ALTER TABLE `proveedor`
  ADD PRIMARY KEY (`codigo`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`pk_identificacion`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `compra`
--
ALTER TABLE `compra`
  MODIFY `pk_codigo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `detalle_compra`
--
ALTER TABLE `detalle_compra`
  MODIFY `id_detalle` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `envio`
--
ALTER TABLE `envio`
  MODIFY `codigo_env` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `codigo_pdto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT de la tabla `proveedor`
--
ALTER TABLE `proveedor`
  MODIFY `codigo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `compra`
--
ALTER TABLE `compra`
  ADD CONSTRAINT `hace` FOREIGN KEY (`fk_usuario`) REFERENCES `usuario` (`pk_identificacion`),
  ADD CONSTRAINT `realiza` FOREIGN KEY (`fk_envio`) REFERENCES `envio` (`codigo_env`);

--
-- Filtros para la tabla `detalle_compra`
--
ALTER TABLE `detalle_compra`
  ADD CONSTRAINT `posee` FOREIGN KEY (`fk_pdto`) REFERENCES `productos` (`codigo_pdto`),
  ADD CONSTRAINT `tiene` FOREIGN KEY (`fk_compra`) REFERENCES `compra` (`pk_codigo`);

--
-- Filtros para la tabla `productos`
--
ALTER TABLE `productos`
  ADD CONSTRAINT `esta` FOREIGN KEY (`fk_provedor`) REFERENCES `proveedor` (`codigo`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
