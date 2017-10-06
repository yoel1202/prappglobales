-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 06-10-2017 a las 17:56:49
-- Versión del servidor: 10.1.10-MariaDB
-- Versión de PHP: 7.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `bd_ventas`
--

DELIMITER $$
--
-- Procedimientos
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `insertar` (IN `idvendedor` INT, IN `idsubcategoria` INT, IN `pesos` VARCHAR(5), IN `colores` VARCHAR(20), IN `anchos` VARCHAR(10), IN `alturas` VARCHAR(10), IN `estados` VARCHAR(20), IN `precio_envios` INT(15), IN `cantidades` INT(10), IN `tamas` VARCHAR(10), IN `precios` INT(15), IN `titulos` VARCHAR(100), IN `garantias` VARCHAR(20), IN `descripciones` VARCHAR(500))  BEGIN


 INSERT INTO tbl_productos(idtbl_productos,tbl_vendedor_idtbl_vendedor,tbl_subcategorias_idtbl_subcategorias,Peso,color,ancho,altura,estado,price_shipping,cantidad,tama,precio,titulo,garantia,descripcion) VALUES('',idvendedor ,idsubcategoria,pesos,colores,anchos,alturas,estados,precio_envios,cantidades,tamas,precios,titulos,garantias,descripciones);
 

END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `search` (`word` VARCHAR(25))  BEGIN
 SELECT titulo,precio,descripcion,picture_code FROM tbl_productos as tp
 INNER JOIN tbl_photo AS TPH ON TPH.tbl_productos_idtbl_productos=idtbl_productos inner join tbl_seller as ts on tp.tbl_vendedor_idtbl_vendedor=ts.idtbl_vendedor inner join tbl_ranking  tr on 
 tr.tbl_vendedor_idtbl_vendedor =ts.idtbl_vendedor   where titulo like concat(word,'%') order by tr.value_ranking ASC;
END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_agreement`
--

CREATE TABLE `tbl_agreement` (
  `idtbl_agreement` int(11) NOT NULL,
  `agreement` tinytext,
  `help` tinytext,
  `tbl_page_idtbl_page` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tbl_agreement`
--

INSERT INTO `tbl_agreement` (`idtbl_agreement`, `agreement`, `help`, `tbl_page_idtbl_page`) VALUES
(1, 'Este contrato esta estipulado...', 'Esta es la ayuda', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_cart`
--

CREATE TABLE `tbl_cart` (
  `id_cart` int(11) NOT NULL,
  `id_product` int(11) NOT NULL,
  `quantity` varchar(100) NOT NULL,
  `id_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tbl_cart`
--

INSERT INTO `tbl_cart` (`id_cart`, `id_product`, `quantity`, `id_user`) VALUES
(10, 1, '1', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_categories`
--

CREATE TABLE `tbl_categories` (
  `idtbl_categorias` int(11) NOT NULL,
  `nombre_categoria` varchar(45) DEFAULT NULL,
  `descripcion` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tbl_categories`
--

INSERT INTO `tbl_categories` (`idtbl_categorias`, `nombre_categoria`, `descripcion`) VALUES
(1, 'Electrodomésticos', 'En este apartado es exclusivo para publicar articulo que son del hogar .'),
(2, 'Joyas', 'Este aparatado es exclusivo para joyas y para relojes aqui cabe cualquier tipo de joyas que usted desee publicar'),
(3, 'Libros', 'este apartado es exclusivo para librerias y cualquier otro tipo de tieneda que desee publicar aqui con el fin de vender sus libros'),
(4, 'Ropa', 'apartado unicamente para ropa aqui podemos publicar articulos como camisas, zapatos, tennis y demas artiulos que tengan que ver con la categoria de ropa'),
(5, 'Tecnología', 'apartado unicamente para tecnologia aqui podemos publicar articulos como celulares, tablet,  y demas artiulos que tengan que ver con la categoria de tecnologia'),
(6, 'Deportes', 'apartado unicamente para deporte aqui podemos publicar articulos como camisas deportivas, tennis deportivas, balones y demas artiulos que tengan que ver con la categoria de deportes'),
(7, 'Arte', 'apartado unicamente para arte aqui podemos publicar articulos como pinturas y demas artiulos que tengan que ver con la categoria de arte'),
(8, 'Juguetes', 'apartado unicamente para juguetes aqui podemos publicar articulos como legos, figuras de accion y demas artiulos que tengan que ver con la categoria de juguetes'),
(10, 'Vehículos', 'Este aparatado es para cualquier tipo de carro que usted desee publicar.');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_comments`
--

CREATE TABLE `tbl_comments` (
  `idtbl_comments` int(11) NOT NULL,
  `comments` varchar(45) DEFAULT NULL,
  `tbl_user_idtbl_usuario` int(11) NOT NULL,
  `tbl_productos_idtbl_productos` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_manager`
--

CREATE TABLE `tbl_manager` (
  `idtbl_administrador` int(11) NOT NULL,
  `nombre` varchar(45) DEFAULT NULL,
  `password` varchar(45) DEFAULT NULL,
  `tbl_page_idtbl_page` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tbl_manager`
--

INSERT INTO `tbl_manager` (`idtbl_administrador`, `nombre`, `password`, `tbl_page_idtbl_page`) VALUES
(2, 'Steven Orozco', 'claveventas', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_message`
--

CREATE TABLE `tbl_message` (
  `idtbl_message` int(11) NOT NULL,
  `tbl_user_idtbl_usuario` int(11) NOT NULL,
  `tbl_vendedor_idtbl_vendedor` int(11) NOT NULL,
  `message` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_page`
--

CREATE TABLE `tbl_page` (
  `idtbl_page` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tbl_page`
--

INSERT INTO `tbl_page` (`idtbl_page`) VALUES
(1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_photo`
--

CREATE TABLE `tbl_photo` (
  `idtbl_photo` int(11) NOT NULL,
  `picture_code` varchar(200) DEFAULT NULL,
  `tbl_productos_idtbl_productos` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tbl_photo`
--

INSERT INTO `tbl_photo` (`idtbl_photo`, `picture_code`, `tbl_productos_idtbl_productos`) VALUES
(1, 'http://www.evisionstore.com/catalogo/samsung_wa14f5l2udy.jpg', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_productos`
--

CREATE TABLE `tbl_productos` (
  `idtbl_productos` int(11) NOT NULL,
  `tbl_vendedor_idtbl_vendedor` int(11) NOT NULL,
  `tbl_subcategorias_idtbl_subcategorias` int(11) NOT NULL,
  `Peso` varchar(45) DEFAULT NULL,
  `color` varchar(45) DEFAULT NULL,
  `ancho` varchar(45) DEFAULT NULL,
  `altura` varchar(45) DEFAULT NULL,
  `estado` varchar(45) DEFAULT NULL,
  `price_shipping` varchar(45) DEFAULT NULL,
  `cantidad` int(11) NOT NULL,
  `tama` varchar(11) NOT NULL,
  `precio` int(15) NOT NULL,
  `titulo` varchar(20) NOT NULL,
  `garantia` varchar(50) NOT NULL,
  `descripcion` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tbl_productos`
--

INSERT INTO `tbl_productos` (`idtbl_productos`, `tbl_vendedor_idtbl_vendedor`, `tbl_subcategorias_idtbl_subcategorias`, `Peso`, `color`, `ancho`, `altura`, `estado`, `price_shipping`, `cantidad`, `tama`, `precio`, `titulo`, `garantia`, `descripcion`) VALUES
(1, 4, 1, '100', 'Blanco', '50', '75', '1', '250', 25, '0', 100000, 'Lavadora automatica', '24 meses', 'Ultima generacion de lavadoras');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_ranking`
--

CREATE TABLE `tbl_ranking` (
  `idtbl_ranking` int(11) NOT NULL,
  `tbl_vendedor_idtbl_vendedor` int(11) NOT NULL,
  `value_ranking` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tbl_ranking`
--

INSERT INTO `tbl_ranking` (`idtbl_ranking`, `tbl_vendedor_idtbl_vendedor`, `value_ranking`) VALUES
(1, 4, '0');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_record_seller`
--

CREATE TABLE `tbl_record_seller` (
  `idtbl_historial_vendedor` int(11) NOT NULL,
  `tbl_vendedor_idtbl_vendedor` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_sales`
--

CREATE TABLE `tbl_sales` (
  `idtbl_ventas` int(11) NOT NULL,
  `tbl_usuario_idtbl_usuario` int(11) NOT NULL,
  `tbl_productos_idtbl_productos` int(11) NOT NULL,
  `id_tblshipping` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_seller`
--

CREATE TABLE `tbl_seller` (
  `idtbl_vendedor` int(11) NOT NULL,
  `tbl_contract_idtbl_contract` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `nombre_usuario` varchar(20) NOT NULL,
  `password` varchar(50) NOT NULL,
  `correo` varchar(50) NOT NULL,
  `cedula_juridica` int(20) NOT NULL,
  `estado` varchar(10) NOT NULL,
  `foto` varchar(100) NOT NULL,
  `telefono` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tbl_seller`
--

INSERT INTO `tbl_seller` (`idtbl_vendedor`, `tbl_contract_idtbl_contract`, `nombre`, `nombre_usuario`, `password`, `correo`, `cedula_juridica`, `estado`, `foto`, `telefono`) VALUES
(4, 1, 'Gollo', 'gollo1', 'gollo1', 'gollo@', 123456789, 'activo', 'ld', 84915419);

--
-- Disparadores `tbl_seller`
--
DELIMITER $$
CREATE TRIGGER `tbl_seller_AFTER_INSERT` AFTER INSERT ON `tbl_seller` FOR EACH ROW BEGIN
 INSERT INTO tbl_ranking(idtbl_ranking,tbl_vendedor_idtbl_vendedor,value_ranking) VALUES('',new.idtbl_vendedor,'0');
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_shipping`
--

CREATE TABLE `tbl_shipping` (
  `id_tblshipping` int(11) NOT NULL,
  `name` int(11) NOT NULL,
  `last_name` int(11) NOT NULL,
  `firts_adress` int(11) NOT NULL,
  `second_adress` int(11) NOT NULL,
  `province` int(11) NOT NULL,
  `canton` int(11) NOT NULL,
  `district` int(11) NOT NULL,
  `zip` int(11) NOT NULL,
  `country` int(11) NOT NULL,
  `id_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_subcategories`
--

CREATE TABLE `tbl_subcategories` (
  `idtbl_subcategorias` int(11) NOT NULL,
  `nombre_subcategoria` varchar(45) DEFAULT NULL,
  `tbl_categorias_idtbl_categorias` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tbl_subcategories`
--

INSERT INTO `tbl_subcategories` (`idtbl_subcategorias`, `nombre_subcategoria`, `tbl_categorias_idtbl_categorias`) VALUES
(1, 'samsung', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_user`
--

CREATE TABLE `tbl_user` (
  `idtbl_usuario` int(11) NOT NULL,
  `nombre_usuario` varchar(45) DEFAULT NULL,
  `nombre` varchar(45) DEFAULT NULL,
  `cedula` int(11) NOT NULL,
  `correo` varchar(45) DEFAULT NULL,
  `password` varchar(45) DEFAULT NULL,
  `telefono` int(15) NOT NULL,
  `foto` varchar(200) NOT NULL,
  `estado` varchar(10) NOT NULL,
  `tbl_contract_idtbl_contract` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tbl_user`
--

INSERT INTO `tbl_user` (`idtbl_usuario`, `nombre_usuario`, `nombre`, `cedula`, `correo`, `password`, `telefono`, `foto`, `estado`, `tbl_contract_idtbl_contract`) VALUES
(1, 'stevenorozco', 'steven orozco montoya', 604250344, 'steven', 'steven1', 62567388, 'nulo', '1', 1);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `tbl_agreement`
--
ALTER TABLE `tbl_agreement`
  ADD PRIMARY KEY (`idtbl_agreement`),
  ADD KEY `fk_tbl_agreement_tbl_page1_idx` (`tbl_page_idtbl_page`);

--
-- Indices de la tabla `tbl_cart`
--
ALTER TABLE `tbl_cart`
  ADD PRIMARY KEY (`id_cart`);

--
-- Indices de la tabla `tbl_categories`
--
ALTER TABLE `tbl_categories`
  ADD PRIMARY KEY (`idtbl_categorias`);

--
-- Indices de la tabla `tbl_comments`
--
ALTER TABLE `tbl_comments`
  ADD PRIMARY KEY (`idtbl_comments`),
  ADD KEY `fk_tbl_comments_tbl_user1_idx` (`tbl_user_idtbl_usuario`),
  ADD KEY `fk_tbl_comments_tbl_productos1_idx` (`tbl_productos_idtbl_productos`);

--
-- Indices de la tabla `tbl_manager`
--
ALTER TABLE `tbl_manager`
  ADD PRIMARY KEY (`idtbl_administrador`),
  ADD KEY `fk_tbl_manager_tbl_page1_idx` (`tbl_page_idtbl_page`);

--
-- Indices de la tabla `tbl_message`
--
ALTER TABLE `tbl_message`
  ADD PRIMARY KEY (`idtbl_message`),
  ADD KEY `fk_tbl_message_tbl_user1_idx` (`tbl_user_idtbl_usuario`),
  ADD KEY `fk_tbl_message_tbl_vendedor1_idx` (`tbl_vendedor_idtbl_vendedor`);

--
-- Indices de la tabla `tbl_page`
--
ALTER TABLE `tbl_page`
  ADD PRIMARY KEY (`idtbl_page`);

--
-- Indices de la tabla `tbl_photo`
--
ALTER TABLE `tbl_photo`
  ADD PRIMARY KEY (`idtbl_photo`),
  ADD KEY `fk_tbl_photo_tbl_productos1_idx` (`tbl_productos_idtbl_productos`);

--
-- Indices de la tabla `tbl_productos`
--
ALTER TABLE `tbl_productos`
  ADD PRIMARY KEY (`idtbl_productos`),
  ADD KEY `fk_tbl_productos_tbl_vendedor_idx` (`tbl_vendedor_idtbl_vendedor`),
  ADD KEY `fk_tbl_productos_tbl_subcategorias1_idx` (`tbl_subcategorias_idtbl_subcategorias`);

--
-- Indices de la tabla `tbl_ranking`
--
ALTER TABLE `tbl_ranking`
  ADD PRIMARY KEY (`idtbl_ranking`),
  ADD KEY `fk_tbl_ranking_tbl_vendedor1_idx` (`tbl_vendedor_idtbl_vendedor`);

--
-- Indices de la tabla `tbl_record_seller`
--
ALTER TABLE `tbl_record_seller`
  ADD PRIMARY KEY (`idtbl_historial_vendedor`),
  ADD KEY `fk_tbl_historial_vendedor_tbl_vendedor1_idx` (`tbl_vendedor_idtbl_vendedor`);

--
-- Indices de la tabla `tbl_sales`
--
ALTER TABLE `tbl_sales`
  ADD PRIMARY KEY (`idtbl_ventas`),
  ADD KEY `fk_tbl_ventas_tbl_usuario1_idx` (`tbl_usuario_idtbl_usuario`),
  ADD KEY `fk_tbl_ventas_tbl_productos1_idx` (`tbl_productos_idtbl_productos`);

--
-- Indices de la tabla `tbl_seller`
--
ALTER TABLE `tbl_seller`
  ADD PRIMARY KEY (`idtbl_vendedor`),
  ADD KEY `fk_tbl_vendedor_tbl_contract1_idx` (`tbl_contract_idtbl_contract`);

--
-- Indices de la tabla `tbl_shipping`
--
ALTER TABLE `tbl_shipping`
  ADD PRIMARY KEY (`id_tblshipping`);

--
-- Indices de la tabla `tbl_subcategories`
--
ALTER TABLE `tbl_subcategories`
  ADD PRIMARY KEY (`idtbl_subcategorias`),
  ADD KEY `fk_tbl_subcategorias_tbl_categorias1_idx` (`tbl_categorias_idtbl_categorias`);

--
-- Indices de la tabla `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`idtbl_usuario`),
  ADD KEY `fk_tbl_user_tbl_contract1_idx` (`tbl_contract_idtbl_contract`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `tbl_agreement`
--
ALTER TABLE `tbl_agreement`
  MODIFY `idtbl_agreement` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `tbl_cart`
--
ALTER TABLE `tbl_cart`
  MODIFY `id_cart` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT de la tabla `tbl_categories`
--
ALTER TABLE `tbl_categories`
  MODIFY `idtbl_categorias` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT de la tabla `tbl_comments`
--
ALTER TABLE `tbl_comments`
  MODIFY `idtbl_comments` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `tbl_manager`
--
ALTER TABLE `tbl_manager`
  MODIFY `idtbl_administrador` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `tbl_message`
--
ALTER TABLE `tbl_message`
  MODIFY `idtbl_message` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `tbl_page`
--
ALTER TABLE `tbl_page`
  MODIFY `idtbl_page` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `tbl_photo`
--
ALTER TABLE `tbl_photo`
  MODIFY `idtbl_photo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `tbl_productos`
--
ALTER TABLE `tbl_productos`
  MODIFY `idtbl_productos` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `tbl_ranking`
--
ALTER TABLE `tbl_ranking`
  MODIFY `idtbl_ranking` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `tbl_record_seller`
--
ALTER TABLE `tbl_record_seller`
  MODIFY `idtbl_historial_vendedor` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `tbl_sales`
--
ALTER TABLE `tbl_sales`
  MODIFY `idtbl_ventas` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `tbl_seller`
--
ALTER TABLE `tbl_seller`
  MODIFY `idtbl_vendedor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT de la tabla `tbl_subcategories`
--
ALTER TABLE `tbl_subcategories`
  MODIFY `idtbl_subcategorias` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `idtbl_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `tbl_agreement`
--
ALTER TABLE `tbl_agreement`
  ADD CONSTRAINT `fk_tbl_agreement_tbl_page1` FOREIGN KEY (`tbl_page_idtbl_page`) REFERENCES `tbl_page` (`idtbl_page`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `tbl_comments`
--
ALTER TABLE `tbl_comments`
  ADD CONSTRAINT `fk_tbl_comments_tbl_productos1` FOREIGN KEY (`tbl_productos_idtbl_productos`) REFERENCES `tbl_productos` (`idtbl_productos`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_tbl_comments_tbl_user1` FOREIGN KEY (`tbl_user_idtbl_usuario`) REFERENCES `tbl_user` (`idtbl_usuario`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `tbl_manager`
--
ALTER TABLE `tbl_manager`
  ADD CONSTRAINT `fk_tbl_manager_tbl_page1` FOREIGN KEY (`tbl_page_idtbl_page`) REFERENCES `tbl_page` (`idtbl_page`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `tbl_message`
--
ALTER TABLE `tbl_message`
  ADD CONSTRAINT `fk_tbl_message_tbl_user1` FOREIGN KEY (`tbl_user_idtbl_usuario`) REFERENCES `tbl_user` (`idtbl_usuario`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_tbl_message_tbl_vendedor1` FOREIGN KEY (`tbl_vendedor_idtbl_vendedor`) REFERENCES `tbl_seller` (`idtbl_vendedor`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `tbl_photo`
--
ALTER TABLE `tbl_photo`
  ADD CONSTRAINT `tbl_photo_ibfk_1` FOREIGN KEY (`tbl_productos_idtbl_productos`) REFERENCES `tbl_productos` (`idtbl_productos`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `tbl_productos`
--
ALTER TABLE `tbl_productos`
  ADD CONSTRAINT `tbl_productos_ibfk_1` FOREIGN KEY (`tbl_vendedor_idtbl_vendedor`) REFERENCES `tbl_seller` (`idtbl_vendedor`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `tbl_productos_ibfk_2` FOREIGN KEY (`tbl_subcategorias_idtbl_subcategorias`) REFERENCES `tbl_subcategories` (`idtbl_subcategorias`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `tbl_ranking`
--
ALTER TABLE `tbl_ranking`
  ADD CONSTRAINT `fk_tbl_ranking_tbl_vendedor1` FOREIGN KEY (`tbl_vendedor_idtbl_vendedor`) REFERENCES `tbl_seller` (`idtbl_vendedor`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `tbl_record_seller`
--
ALTER TABLE `tbl_record_seller`
  ADD CONSTRAINT `fk_tbl_historial_vendedor_tbl_vendedor1` FOREIGN KEY (`tbl_vendedor_idtbl_vendedor`) REFERENCES `tbl_seller` (`idtbl_vendedor`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `tbl_sales`
--
ALTER TABLE `tbl_sales`
  ADD CONSTRAINT `tbl_sales_ibfk_1` FOREIGN KEY (`tbl_productos_idtbl_productos`) REFERENCES `tbl_productos` (`idtbl_productos`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `tbl_sales_ibfk_2` FOREIGN KEY (`tbl_usuario_idtbl_usuario`) REFERENCES `tbl_user` (`idtbl_usuario`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `tbl_seller`
--
ALTER TABLE `tbl_seller`
  ADD CONSTRAINT `fk_tbl_vendedor_tbl_contract1` FOREIGN KEY (`tbl_contract_idtbl_contract`) REFERENCES `tbl_agreement` (`idtbl_agreement`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `tbl_subcategories`
--
ALTER TABLE `tbl_subcategories`
  ADD CONSTRAINT `fk_tbl_subcategorias_tbl_categorias1` FOREIGN KEY (`tbl_categorias_idtbl_categorias`) REFERENCES `tbl_categories` (`idtbl_categorias`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD CONSTRAINT `fk_tbl_user_tbl_contract1` FOREIGN KEY (`tbl_contract_idtbl_contract`) REFERENCES `tbl_agreement` (`idtbl_agreement`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
