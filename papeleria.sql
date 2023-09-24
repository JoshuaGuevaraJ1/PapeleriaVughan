-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3306
-- Tiempo de generación: 25-11-2022 a las 14:44:32
-- Versión del servidor: 8.0.27
-- Versión de PHP: 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `papeleria`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clientes`
--

DROP TABLE IF EXISTS `clientes`;
CREATE TABLE IF NOT EXISTS `clientes` (
  `idClientes` int NOT NULL,
  `nombreClientes` varchar(25) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish_ci NOT NULL,
  `primerApellidoClientes` varchar(25) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish_ci NOT NULL,
  `segundoApellidoClientes` varchar(25) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish_ci DEFAULT NULL,
  `telefono` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish_ci NOT NULL,
  `correo` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish_ci NOT NULL,
  PRIMARY KEY (`idClientes`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `clientes`
--

INSERT INTO `clientes` (`idClientes`, `nombreClientes`, `primerApellidoClientes`, `segundoApellidoClientes`, `telefono`, `correo`) VALUES
(1, 'Rosa', 'Hernandez', NULL, '3284921893', 'rosher@gmail.com'),
(2, 'Pedro', 'Fernandez', NULL, '1468392590', 'pedrofer@gmail.com'),
(3, 'Daniel', 'Kessler', NULL, '8493214509', 'dankes@outlook.com'),
(4, 'Efrain', 'Sosa', 'Fernandez', '3456789874', 'efrafer@gmail.com'),
(5, 'Juan', 'Perez', 'Cardenas', '9876543234', 'juan_perez@gmail.com'),
(6, 'Ines', 'Cervantes', 'Romero', '6789876543', 'romercer@outlook.com'),
(7, 'Veronica', 'Lopez', 'Vasquez', '1234567890', 'pezver@hotmail.com'),
(8, 'Omar', 'Saavedra', NULL, '0987654321', 'saavoma@gmail.com'),
(9, 'Roberto', 'Cabrera', NULL, '1236789456', 'cabrob@gmail.com'),
(10, 'Israel', 'Bonilla', 'Lezma', '0981236547', 'lezmais@gmail.com');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empleados`
--

DROP TABLE IF EXISTS `empleados`;
CREATE TABLE IF NOT EXISTS `empleados` (
  `idEmpleados` int NOT NULL,
  `nombreEmpleados` varchar(25) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish_ci NOT NULL,
  `primerApellidoEmpleados` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish_ci NOT NULL,
  `segundoApellidoEpleados` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish_ci DEFAULT NULL,
  `calle` varchar(25) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish_ci NOT NULL,
  `numeroInterior` varchar(5) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish_ci DEFAULT NULL,
  `numeroExterior` varchar(5) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish_ci NOT NULL,
  `colonia` varchar(25) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish_ci NOT NULL,
  `telefono` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish_ci NOT NULL,
  `correo` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish_ci NOT NULL,
  `idSexo` int NOT NULL,
  PRIMARY KEY (`idEmpleados`),
  KEY `idSexo` (`idSexo`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `empleados`
--

INSERT INTO `empleados` (`idEmpleados`, `nombreEmpleados`, `primerApellidoEmpleados`, `segundoApellidoEpleados`, `calle`, `numeroInterior`, `numeroExterior`, `colonia`, `telefono`, `correo`, `idSexo`) VALUES
(1, 'Carmen', 'Marquez', 'Rosas', 'Morelos', NULL, '12', 'Loma Verde', '2349876501', 'marquezcar@gmail.com', 1),
(2, 'Rose', 'Perez', 'Sanchez', 'Los Pinos', NULL, '6', 'Indios', '9876432167', 'sanch@gmail.com', 1),
(3, 'Alberto', 'Cruz', 'Romero', 'Cuathemoc', NULL, '8', 'El Palmar', '3456782344', 'betorom@outlook.com', 2),
(4, 'Eduardo', 'Gonzales', NULL, 'Miguel Reyes', '2', '14', 'El Calvario', '8769543567', 'edurgin@outlook.vom', 2),
(5, 'Marisol', 'Juarez', 'Peña', 'Roble', NULL, '12', 'La Loma', '7658493492', 'soljuar@gmail.com', 1),
(6, 'Jorge', 'Fernandez', 'Gonzalez', 'Observatorio', NULL, '102', 'San Jose', '6574389283', 'jorfer@gmail.com', 2),
(7, 'Guadalupe', 'Bastida', NULL, 'Mercurio', '3', '56', 'Girasoles', '7689543762', 'lupeba@outlook.com', 1),
(8, 'David', 'Zamora', 'Pasten', 'Privada de las Estrellas', NULL, '13', 'Insurgentes', '7568943256', 'davidmora@hotmail.com', 2),
(9, 'Laura', 'Torres', 'Morales', 'Avenida 19 de marzo', NULL, '98', 'El Palmar', '9311234567', 'laura_torr@gmail.com', 1),
(10, 'Oscar', 'Rezza', 'Dias', 'Justo Sierra', NULL, '90', 'Espejel', '9841223455', 'rezzadias@gmail.com', 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `facturas`
--

DROP TABLE IF EXISTS `facturas`;
CREATE TABLE IF NOT EXISTS `facturas` (
  `idFacturas` int NOT NULL,
  `idVentas` int NOT NULL,
  `idProductos` int NOT NULL,
  `total` varchar(6) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish_ci NOT NULL,
  PRIMARY KEY (`idFacturas`),
  KEY `idVentas` (`idVentas`),
  KEY `idProductos` (`idProductos`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `facturas`
--

INSERT INTO `facturas` (`idFacturas`, `idVentas`, `idProductos`, `total`) VALUES
(1, 1, 1, '10'),
(2, 2, 2, '8'),
(3, 3, 3, '6'),
(4, 4, 4, '6'),
(5, 5, 5, '2'),
(6, 6, 6, '12'),
(7, 7, 7, '30'),
(8, 8, 8, '13'),
(9, 9, 9, '60'),
(10, 10, 10, '130');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `inventarios`
--

DROP TABLE IF EXISTS `inventarios`;
CREATE TABLE IF NOT EXISTS `inventarios` (
  `idInventarios` varchar(5) COLLATE utf8mb4_spanish_ci NOT NULL,
  `idProveedores` int NOT NULL,
  `idProductos` int NOT NULL,
  `cantidad` varchar(5) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish_ci NOT NULL,
  `precio` float NOT NULL,
  `descripción` text CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish_ci NOT NULL,
  PRIMARY KEY (`idInventarios`),
  KEY `idProveedor` (`idProveedores`),
  KEY `idProducto` (`idProductos`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `inventarios`
--

INSERT INTO `inventarios` (`idInventarios`, `idProveedores`, `idProductos`, `cantidad`, `precio`, `descripción`) VALUES
('00011', 10, 11, '50', 5, 'Hojas color blanco, ideales para impresión, mejor absorción de tinta de impresora, material resistente, no son muy transparentes, ideales para el doblado.'),
('000WX', 13, 5, '25', 100, 'Hojas de color de alta calidad, tamaño A4'),
('00216', 14, 5, '40', 100, 'Hojas de color con absorción rápida, alta durabilidad, cada paquete de hojas incluye 100 hojas de diferentes colores.'),
('00230', 10, 8, '56', 47.5, 'Lapiceros de punta gruesa, con material de plástico reciclado, tinta de alta duración y resalte. Por su forma triangular tiene mejor agarre.'),
('00236', 9, 10, '25', 40, 'Paquete de colores de alta calidad, ideables para dibujo técnico, incluye goma para borrar adecuada para estos colores.'),
('0025H', 13, 8, '56', 47.5, 'Lapiceros de punta gruesa, con material de plástico reciclado, tinta de alta duración y resalte. Por su forma triangular tiene mejor agarre.'),
('00299', 10, 11, '50', 5, 'Hojas color blanco, ideales para impresión, mejor absorción de tinta de impresora, material resistente, no son muy transparentes, ideales para el doblado.'),
('00358', 8, 6, '56', 47.5, 'Resistol tamaño jumbo de secado inmediato, no deja residuos.'),
('00427', 6, 7, '84', 25, 'Libretas cuadro chico, de pasta dura, ya enmicada y reforzada, resorte doble metálico'),
('00CBG', 10, 6, '56', 47.5, 'Resistol tamaño jumbo de secado inmediato, no deja residuos.'),
('00CBY', 8, 5, '25', 100, 'Hojas de color ideales para impresión, incluye 100 hojas de color más 20 hojas más de regalo. Papel resistentes al borrado, fácil de manejar.'),
('00FFC', 9, 1, '15', 25, 'Tijeras de plástico, con resorte de corte invertido, facil agarre y mejor corte'),
('00H25', 12, 7, '120', 35, 'Libreta de pasta dura de diferentes colores, con 100 hojas cuadro chico, resorte metálico y pasta de cartón reciclado y biodegradable'),
('00K55', 5, 7, '11', 31, 'Libretas con 200 hojas, blanca, incluye separador por cada 40 paginas'),
('01496', 13, 9, '50', 5, 'Plumones de colores brillantes, buen resalte, incluye colores metálicos, plumones de doble punta, por su forma triangular tienen mejor agarre.'),
('01B25', 3, 10, '200', 40, 'Paquete de colores con 24 colores cada uno, incluye un sacapuntas, color dorado y plateado, madera de alta calidad, ideal para niños.'),
('023ZX', 10, 2, '50', 5, 'Sacapuntas de buen filo, con caja que almacena los residuos, alta duración, ideal para niños, no rompe las puntas, diferentes colores cada uno, resistente material.'),
('02450', 10, 2, '50', 5, 'Sacapuntas de buen filo, con caja que almacena los residuos, alta duración, ideal para niños, no rompe las puntas, diferentes colores cada uno, resistente material.'),
('0256X', 10, 11, '50', 5, 'Hojas color blanco, ideales para impresión, mejor absorción de tinta de impresora, material resistente, no son muy transparentes, ideales para el doblado.'),
('02589', 5, 9, '50', 5, 'Plumones de colores brillantes, buen resalte, incluye colores metálicos, plumones de doble punta, por su forma triangular tienen mejor agarre.'),
('025BC', 10, 4, '20', 10, 'Goma de migajón que borra mejor, ideal para hojas de libreta, njo rompe las hojas, no maltrata las hojas, y es de alta duración.'),
('02CVQ', 10, 4, '20', 10, 'Goma de migajón que borra mejor, ideal para hojas de libreta, njo rompe las hojas, no maltrata las hojas, y es de alta duración.'),
('05AJM', 14, 10, '50', 25, 'Colores de alta duración, punta de material resistente y mejor resalte, colores más brillantes, mejor agarre.'),
('09DVN', 11, 6, '91', 10, 'Resistol marca pencil, ideal para los utiles escolares '),
('09KSD', 6, 10, '10', 200, 'Colores maped, con 12 piezas de punta gruesa, colores básicos'),
('0CBUC', 10, 8, '56', 47.5, 'Lapiceros de punta gruesa, con material de plástico reciclado, tinta de alta duración y resalte. Por su forma triangular tiene mejor agarre.'),
('12589', 10, 8, '56', 47.5, 'Lapiceros de punta gruesa, con material de plástico reciclado, tinta de alta duración y resalte. Por su forma triangular tiene mejor agarre.'),
('1258A', 5, 6, '56', 47.5, 'Resistol tamaño jumbo de secado inmediato, no deja residuos.'),
('12654', 10, 6, '56', 47.5, 'Resistol tamaño jumbo de secado inmediato, no deja residuos.'),
('1289Z', 10, 4, '20', 10, 'Goma de migajón que borra mejor, ideal para hojas de libreta, njo rompe las hojas, no maltrata las hojas, y es de alta duración.'),
('12CV0', 10, 2, '50', 5, 'Sacapuntas de buen filo, con caja que almacena los residuos, alta duración, ideal para niños, no rompe las puntas, diferentes colores cada uno, resistente material.'),
('12RD8', 10, 4, '20', 10, 'Goma de migajón que borra mejor, ideal para hojas de libreta, njo rompe las hojas, no maltrata las hojas, y es de alta duración.'),
('91829', 14, 1, '31', 19, 'Tijeras escolares sin punta, color azul'),
('AB129', 13, 5, '25', 100, 'Hojas de color de alta calidad, tamaño carta, incluye colores fosforescentes.'),
('AB85X', 10, 2, '50', 5, 'Sacapuntas de buen filo, con caja que almacena los residuos, alta duración, ideal para niños, no rompe las puntas, diferentes colores cada uno, resistente material.'),
('ABC25', 12, 10, '50', 40, 'Colores de madera resistente, punta de color de alto brillo y mejor resalte, punta resistente y soporta mucha presión sobre la hoja.'),
('BCD12', 13, 5, '25', 100, 'Hojas de color de alta calidad, tamaño carta, incluye colores fosforescentes.'),
('CC10V', 6, 1, '60', 30, 'Tijeras para niños, puntas de plastico, corte de figuras'),
('CV02X', 10, 9, '50', 5, 'Plumones de colores brillantes, buen resalte, incluye colores metálicos, plumones de doble punta, por su forma triangular tienen mejor agarre.'),
('CV125', 9, 6, '56', 47.5, 'Resistol tamaño jumbo de secado inmediato, no deja residuos.'),
('CVFX1', 10, 6, '56', 47.5, 'Resistol tamaño jumbo de secado inmediato, no deja residuos.'),
('CVWSZ', 10, 8, '56', 47.5, 'Lapiceros de punta gruesa, con material de plástico reciclado, tinta de alta duración y resalte. Por su forma triangular tiene mejor agarre.'),
('CVXZA', 11, 8, '56', 47.5, 'Lapiceros de punta gruesa, con material de plástico reciclado, tinta de alta duración y resalte. Por su forma triangular tiene mejor agarre.'),
('DC123', 14, 5, '25', 100, 'Hojas de color de alta calidad, tamaño carta, incluye colores fosforescentes.'),
('DC125', 9, 1, '200', 18, 'Tijeras para zurdos'),
('DDDDD', 11, 7, '50', 50, 'Libretas cuadro grande de alta calidad'),
('FC215', 13, 1, '40', 20, 'Tijeras metálicas de buen corte yu alta durabilidad'),
('FG023', 8, 9, '50', 5, 'Plumones de colores brillantes, buen resalte, incluye colores metálicos, plumones de doble punta, por su forma triangular tienen mejor agarre.'),
('NKBVU', 10, 11, '50', 5, 'Hojas color blanco, ideales para impresión, mejor absorción de tinta de impresora, material resistente, no son muy transparentes, ideales para el doblado.'),
('NN023', 10, 11, '50', 5, 'Hojas color blanco, ideales para impresión, mejor absorción de tinta de impresora, material resistente, no son muy transparentes, ideales para el doblado.'),
('XX023', 10, 2, '50', 5, 'Sacapuntas de buen filo, con caja que almacena los residuos, alta duración, ideal para niños, no rompe las puntas, diferentes colores cada uno, resistente material.');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

DROP TABLE IF EXISTS `productos`;
CREATE TABLE IF NOT EXISTS `productos` (
  `idProductos` int NOT NULL,
  `nombreProductos` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish_ci NOT NULL,
  PRIMARY KEY (`idProductos`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`idProductos`, `nombreProductos`) VALUES
(1, 'Tijeras'),
(2, 'Sacapuntas'),
(3, 'Lápiz'),
(4, 'Goma'),
(5, 'Hojas de color'),
(6, 'Resistol'),
(7, 'Libretas'),
(8, 'Lapiceros'),
(9, 'Plumones'),
(10, 'Colores'),
(11, 'Hojas blancas');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proveedores`
--

DROP TABLE IF EXISTS `proveedores`;
CREATE TABLE IF NOT EXISTS `proveedores` (
  `idProveedores` int NOT NULL AUTO_INCREMENT,
  `nombreProveedores` varchar(25) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish_ci NOT NULL,
  PRIMARY KEY (`idProveedores`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `proveedores`
--

INSERT INTO `proveedores` (`idProveedores`, `nombreProveedores`) VALUES
(3, 'Paper mate'),
(4, 'Crayola'),
(5, 'Upak'),
(6, 'Maped'),
(8, 'Pelikan'),
(9, 'Sharpie'),
(10, 'Verol'),
(11, 'Pencil'),
(12, 'Scribe'),
(13, 'Picture'),
(14, 'Pelikan');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sexo`
--

DROP TABLE IF EXISTS `sexo`;
CREATE TABLE IF NOT EXISTS `sexo` (
  `idSexo` int NOT NULL,
  `nombreSexo` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish_ci NOT NULL,
  PRIMARY KEY (`idSexo`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `sexo`
--

INSERT INTO `sexo` (`idSexo`, `nombreSexo`) VALUES
(1, 'Femenino'),
(2, 'Masculino');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ventas`
--

DROP TABLE IF EXISTS `ventas`;
CREATE TABLE IF NOT EXISTS `ventas` (
  `idVentas` int NOT NULL,
  `fechaVentas` date NOT NULL,
  `idClientes` int NOT NULL,
  `idEmpleados` int NOT NULL,
  PRIMARY KEY (`idVentas`),
  KEY `idClientes` (`idClientes`),
  KEY `idEmpleados` (`idEmpleados`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `ventas`
--

INSERT INTO `ventas` (`idVentas`, `fechaVentas`, `idClientes`, `idEmpleados`) VALUES
(1, '2022-06-13', 1, 1),
(2, '2022-07-12', 2, 2),
(3, '2022-08-09', 3, 3),
(4, '2022-07-11', 4, 4),
(5, '2022-08-24', 5, 5),
(6, '2022-08-25', 6, 6),
(7, '2022-07-15', 7, 7),
(8, '2022-08-17', 8, 8),
(9, '2022-08-19', 9, 9),
(10, '2022-08-27', 10, 10);

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `empleados`
--
ALTER TABLE `empleados`
  ADD CONSTRAINT `empleados_ibfk_1` FOREIGN KEY (`idSexo`) REFERENCES `sexo` (`idSexo`);

--
-- Filtros para la tabla `facturas`
--
ALTER TABLE `facturas`
  ADD CONSTRAINT `facturas_ibfk_1` FOREIGN KEY (`idProductos`) REFERENCES `productos` (`idProductos`),
  ADD CONSTRAINT `facturas_ibfk_2` FOREIGN KEY (`idVentas`) REFERENCES `ventas` (`idVentas`);

--
-- Filtros para la tabla `inventarios`
--
ALTER TABLE `inventarios`
  ADD CONSTRAINT `inventarios_ibfk_2` FOREIGN KEY (`idProductos`) REFERENCES `productos` (`idProductos`),
  ADD CONSTRAINT `inventarios_ibfk_3` FOREIGN KEY (`idProveedores`) REFERENCES `proveedores` (`idProveedores`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Filtros para la tabla `ventas`
--
ALTER TABLE `ventas`
  ADD CONSTRAINT `ventas_ibfk_1` FOREIGN KEY (`idClientes`) REFERENCES `clientes` (`idClientes`),
  ADD CONSTRAINT `ventas_ibfk_2` FOREIGN KEY (`idEmpleados`) REFERENCES `empleados` (`idEmpleados`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
