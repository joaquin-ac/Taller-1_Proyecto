-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 21-02-2024 a las 10:08:58
-- Versión del servidor: 10.4.28-MariaDB
-- Versión de PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `bd_acevedo_ignacio`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categoria`
--

CREATE TABLE `categoria` (
  `Id_categoria` int(11) NOT NULL,
  `Nombre_categoria` varchar(100) NOT NULL,
  `Activo_categoria` varchar(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `categoria`
--

INSERT INTO `categoria` (`Id_categoria`, `Nombre_categoria`, `Activo_categoria`) VALUES
(1, 'Cinturones', 'si'),
(2, 'Relojes', 'si'),
(3, 'Corbatas', 'si'),
(4, 'Camisas', 'si'),
(9, 'Billeteras', 'si'),
(10, 'Pulseras', 'si'),
(12, 'Gorras', 'si'),
(14, 'Anillos', 'si');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `consulta`
--

CREATE TABLE `consulta` (
  `Id_consulta` int(11) NOT NULL,
  `Asunto_consulta` varchar(200) NOT NULL,
  `Mensaje_consulta` varchar(700) NOT NULL,
  `Visto_consulta` varchar(2) NOT NULL,
  `Id_usuario` int(11) DEFAULT NULL,
  `Nombre_consulta` varchar(100) NOT NULL,
  `Apellido_consulta` varchar(100) NOT NULL,
  `Correo_consulta` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detallefactura`
--

CREATE TABLE `detallefactura` (
  `Id_detalle_factura` int(11) NOT NULL,
  `Cantidad_detalle` int(11) NOT NULL,
  `Subtotal_detalle` int(11) NOT NULL,
  `Id_factura` int(11) NOT NULL,
  `Id_producto` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `detallefactura`
--

INSERT INTO `detallefactura` (`Id_detalle_factura`, `Cantidad_detalle`, `Subtotal_detalle`, `Id_factura`, `Id_producto`) VALUES
(29, 2, 16000, 25, 32),
(30, 1, 9900, 25, 21),
(31, 1, 20000, 25, 29),
(32, 1, 21000, 26, 18),
(33, 1, 21000, 26, 15),
(34, 1, 60000, 27, 23),
(35, 1, 9900, 27, 21),
(36, 1, 7400, 27, 31),
(37, 1, 9900, 28, 21),
(38, 1, 10500, 28, 22),
(39, 1, 50000, 28, 25),
(40, 1, 12000, 28, 28),
(41, 1, 11500, 29, 20),
(42, 1, 45000, 29, 26),
(43, 1, 5500, 29, 33),
(44, 2, 40000, 30, 29),
(45, 1, 21000, 30, 18);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `domicilio`
--

CREATE TABLE `domicilio` (
  `Id_domicilio` int(11) NOT NULL,
  `Calle_domicilio` varchar(100) NOT NULL,
  `Numero_domicilio` int(11) NOT NULL,
  `Codigo_postal_domicilio` int(11) NOT NULL,
  `Localidad_domicilio` varchar(100) NOT NULL,
  `Provincia_domicilio` varchar(100) NOT NULL,
  `Pais_domicilio` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `domicilio`
--

INSERT INTO `domicilio` (`Id_domicilio`, `Calle_domicilio`, `Numero_domicilio`, `Codigo_postal_domicilio`, `Localidad_domicilio`, `Provincia_domicilio`, `Pais_domicilio`) VALUES
(3, '9 de Julio', 1400, 3400, 'Corrientes', 'Corrientes', 'Argentina'),
(5, 'Jujuy', 1600, 3400, 'Corrientes', 'Corrientes', 'Argentina');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `factura`
--

CREATE TABLE `factura` (
  `Id_factura` int(11) NOT NULL,
  `Importe_total_factura` int(11) NOT NULL,
  `Forma_pago_factura` varchar(50) NOT NULL,
  `Fecha_factura` datetime NOT NULL,
  `Id_usuario` int(11) NOT NULL,
  `Id_domicilio` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `factura`
--

INSERT INTO `factura` (`Id_factura`, `Importe_total_factura`, `Forma_pago_factura`, `Fecha_factura`, `Id_usuario`, `Id_domicilio`) VALUES
(25, 45900, 'Tarjeta de Credito', '2024-02-18 22:42:18', 7, 5),
(26, 42000, 'Tarjeta de Credito', '2024-02-18 22:42:55', 7, 5),
(27, 77300, 'Tarjeta de Credito', '2024-02-19 04:32:33', 7, 5),
(28, 82400, 'Tarjeta de Credito', '2024-02-19 04:47:26', 7, 5),
(29, 62000, 'Tarjeta de Credito', '2024-02-20 16:37:36', 7, 5),
(30, 61000, 'Tarjeta de Debito', '2024-02-21 09:07:21', 7, 5);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `producto`
--

CREATE TABLE `producto` (
  `Id_producto` int(11) NOT NULL,
  `Nombre_producto` varchar(50) NOT NULL,
  `Descripcion_producto` varchar(256) NOT NULL,
  `Precio_producto` float NOT NULL,
  `Cantidad_producto` int(11) NOT NULL,
  `url_imagen_producto` varchar(256) NOT NULL,
  `Activo_producto` varchar(2) NOT NULL,
  `Id_categoria` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `producto`
--

INSERT INTO `producto` (`Id_producto`, `Nombre_producto`, `Descripcion_producto`, `Precio_producto`, `Cantidad_producto`, `url_imagen_producto`, `Activo_producto`, `Id_categoria`) VALUES
(15, 'Billetera Croc', 'Billetera de cuero 100% color negra con detalles azules', 21000, 119, 'billetera1.jpg', 'si', 9),
(16, 'Billetera Halo', 'Billetera de cuero 100% color marrón claro', 20000, 131, 'billetera2.jpg', 'si', 9),
(17, 'Billetera Nivus', 'Billetera de cuero 100% color negra con detalles e', 24000, 142, 'billetera5.jpg', 'si', 9),
(18, 'Billetera Nivus Marron', 'Billetera de cuero 100% color marrón con detalles ', 21000, 149, 'billetera4.jpg', 'si', 9),
(19, 'Corbata Rayada Azul Oscuro', '100% Poliéster', 11000, 112, 'corbata1.jpg', 'si', 3),
(20, 'Corbata Puntos Bordo', '100% Poliéster', 11500, 77, 'corbata2.jpg', 'si', 3),
(21, 'Corbata Puntos Azul Claro', '100% Poliéster', 9900, 87, 'corbata3.jpg', 'si', 3),
(22, 'Corbata Cuadros Azul Oscuro', '100% Poliéster', 10500, 119, 'corbata4.jpg', 'si', 3),
(23, 'Reloj Rolex Acero Analogo ', 'Color de la malla: Plateado', 60000, 44, 'reloj2.jpg', 'si', 2),
(24, 'Reloj Analogo', 'Malla de cuero de color negro', 45000, 40, 'reloj6.jpg', 'si', 2),
(25, 'Reloj Minimalista', 'Malla de acero color plata', 50000, 34, 'reloj5.jpg', 'si', 2),
(26, 'Reloj Analogo Acero Negro', 'Malla de acero color plata', 45000, 41, 'reloj3.jpg', 'si', 2),
(27, 'Gorra Snapback 6 ', 'Visera Plana Alta Calidad', 4500, 235, 'gorra1.png', 'si', 12),
(28, 'Gorro Piper O\'neill', 'Gorro piluso. Diametro 56 CM.', 12000, 34, 'gorra2.png', 'si', 12),
(29, 'Gorra BZRP', 'Cierre ajustable. Visera curvada.', 20000, 50, 'gorra3.png', 'si', 12),
(30, 'Anillo De Titanio', 'Material: Fabricado en carburo de titanio de alta ', 5100, 320, 'anillo.png', 'si', 14),
(31, 'Anillo Acero Quirúrgico', 'Acero quirúrgico esmaltado de excelente calidad.', 7400, 93, 'anillo2.png', 'si', 14),
(32, 'Anillo Acero Y Madera', 'Material: acero quirúrgico esmaltado y madera de e', 8000, 51, 'anillo3.png', 'si', 14),
(33, 'Pulsera Cuero& Acero', 'Material: Cuero Genuino / Dije en Acero Quirúrgico', 5500, 40, 'pulsera1.png', 'si', 10);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rol`
--

CREATE TABLE `rol` (
  `Id_rol` int(11) NOT NULL,
  `Nombre_rol` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `rol`
--

INSERT INTO `rol` (`Id_rol`, `Nombre_rol`) VALUES
(1, 'Cliente'),
(2, 'Admin');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `Id_usuario` int(11) NOT NULL,
  `Dni_usuario` int(11) NOT NULL,
  `Nombre_usuario` varchar(50) NOT NULL,
  `Apellido_usuario` varchar(50) NOT NULL,
  `Telefono_usuario` decimal(10,0) NOT NULL,
  `Activo_usuario` varchar(2) NOT NULL,
  `Id_domicilio` int(11) NOT NULL,
  `Id_rol` int(11) NOT NULL,
  `Password_usuario` varchar(400) NOT NULL,
  `Correo_usuario` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`Id_usuario`, `Dni_usuario`, `Nombre_usuario`, `Apellido_usuario`, `Telefono_usuario`, `Activo_usuario`, `Id_domicilio`, `Id_rol`, `Password_usuario`, `Correo_usuario`) VALUES
(6, 87654321, 'Admin', 'Admin', 3794123456, 'si', 3, 2, '$2y$10$T21x3XAUeUD2XpjToJOwYeeL6PX9BUeuKLKVcXUPSgU.IVb/lNqQm', 'admin@gmail.com'),
(7, 12345678, 'Usuario', 'usuario', 3794654321, 'si', 5, 1, '$2y$10$nbkLfDNXbp/Ma7PCOG7mMu5gPRDyz66aKsDAw/m7P4o/3/.bUSItG', 'usuario@gmail.com');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `categoria`
--
ALTER TABLE `categoria`
  ADD PRIMARY KEY (`Id_categoria`);

--
-- Indices de la tabla `consulta`
--
ALTER TABLE `consulta`
  ADD PRIMARY KEY (`Id_consulta`),
  ADD KEY `Id_usuario` (`Id_usuario`);

--
-- Indices de la tabla `detallefactura`
--
ALTER TABLE `detallefactura`
  ADD PRIMARY KEY (`Id_detalle_factura`),
  ADD KEY `Id_factura` (`Id_factura`),
  ADD KEY `Id_producto` (`Id_producto`);

--
-- Indices de la tabla `domicilio`
--
ALTER TABLE `domicilio`
  ADD PRIMARY KEY (`Id_domicilio`);

--
-- Indices de la tabla `factura`
--
ALTER TABLE `factura`
  ADD PRIMARY KEY (`Id_factura`),
  ADD KEY `Id_usuario` (`Id_usuario`),
  ADD KEY `Id_domicilio` (`Id_domicilio`);

--
-- Indices de la tabla `producto`
--
ALTER TABLE `producto`
  ADD PRIMARY KEY (`Id_producto`),
  ADD KEY `Id_categoria` (`Id_categoria`);

--
-- Indices de la tabla `rol`
--
ALTER TABLE `rol`
  ADD PRIMARY KEY (`Id_rol`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`Id_usuario`),
  ADD KEY `Id_domicilio` (`Id_domicilio`),
  ADD KEY `Id_rol` (`Id_rol`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `categoria`
--
ALTER TABLE `categoria`
  MODIFY `Id_categoria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de la tabla `consulta`
--
ALTER TABLE `consulta`
  MODIFY `Id_consulta` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `detallefactura`
--
ALTER TABLE `detallefactura`
  MODIFY `Id_detalle_factura` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT de la tabla `domicilio`
--
ALTER TABLE `domicilio`
  MODIFY `Id_domicilio` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `factura`
--
ALTER TABLE `factura`
  MODIFY `Id_factura` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT de la tabla `producto`
--
ALTER TABLE `producto`
  MODIFY `Id_producto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT de la tabla `rol`
--
ALTER TABLE `rol`
  MODIFY `Id_rol` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `Id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `consulta`
--
ALTER TABLE `consulta`
  ADD CONSTRAINT `consulta_ibfk_1` FOREIGN KEY (`Id_usuario`) REFERENCES `usuario` (`Id_usuario`);

--
-- Filtros para la tabla `detallefactura`
--
ALTER TABLE `detallefactura`
  ADD CONSTRAINT `detallefactura_ibfk_1` FOREIGN KEY (`Id_factura`) REFERENCES `factura` (`Id_factura`),
  ADD CONSTRAINT `detallefactura_ibfk_2` FOREIGN KEY (`Id_producto`) REFERENCES `producto` (`Id_producto`);

--
-- Filtros para la tabla `factura`
--
ALTER TABLE `factura`
  ADD CONSTRAINT `factura_ibfk_1` FOREIGN KEY (`Id_usuario`) REFERENCES `usuario` (`Id_usuario`),
  ADD CONSTRAINT `factura_ibfk_2` FOREIGN KEY (`Id_domicilio`) REFERENCES `domicilio` (`Id_domicilio`);

--
-- Filtros para la tabla `producto`
--
ALTER TABLE `producto`
  ADD CONSTRAINT `producto_ibfk_1` FOREIGN KEY (`Id_categoria`) REFERENCES `categoria` (`Id_categoria`);

--
-- Filtros para la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD CONSTRAINT `usuario_ibfk_1` FOREIGN KEY (`Id_domicilio`) REFERENCES `domicilio` (`Id_domicilio`),
  ADD CONSTRAINT `usuario_ibfk_2` FOREIGN KEY (`Id_rol`) REFERENCES `rol` (`Id_rol`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
