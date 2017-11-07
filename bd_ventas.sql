-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 07-11-2017 a las 19:29:58
-- Versión del servidor: 10.1.16-MariaDB
-- Versión de PHP: 5.6.24

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
CREATE DEFINER=`root`@`localhost` PROCEDURE `Actualizarconfotovendedor` (`id` INT, `nombreuser` VARCHAR(20), `nom` VARCHAR(50), `ced` INT, `email` VARCHAR(20), `pass` VARCHAR(20), `tel` INT, `fot` VARCHAR(500))  BEGIN
UPDATE tbl_seller SET nombre=nom, nombre_usuario=nombreuser,password=pass,correo=email,cedula_juridica=ced,foto=fot,telefono=tel WHERE idtbl_vendedor=id;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `Actualizarfoto` (`foto` VARCHAR(500), `id` INT)  BEGIN
 INSERT INTO tbl_photo(idtbl_photo,picture_code,tbl_productos_idtbl_productos) VALUES('',foto,id);
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `Actualizarperfiluser` (`id` INT, `nombreuser` VARCHAR(20), `nom` VARCHAR(20), `ced` INT, `email` VARCHAR(20), `pass` VARCHAR(20), `tel` INT, `fot` VARCHAR(500))  BEGIN
UPDATE tbl_user SET nombre_usuario=nombreuser,nombre=nom,cedula=ced,correo=email,password=pass,telefono=tel,foto=fot WHERE idtbl_usuario=id;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `Actualizarperfilusertexto` (`id` INT, `nombreuser` VARCHAR(20), `nom` VARCHAR(20), `ced` INT, `email` VARCHAR(20), `pass` VARCHAR(20), `tel` INT)  BEGIN
UPDATE tbl_user SET nombre_usuario=nombreuser,nombre=nom,cedula=ced,correo=email,password=pass,telefono=tel WHERE idtbl_usuario=id;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `Actualizarproducto` (IN `id` INT, IN `idsubcategoria` INT, IN `pesos` VARCHAR(5), IN `colores` VARCHAR(20), IN `anchos` VARCHAR(10), IN `alturas` VARCHAR(10), IN `precio_envios` INT(15), IN `cantidades` INT(10), IN `tamas` VARCHAR(10), IN `precios` INT(15), IN `titulos` VARCHAR(100), IN `garantias` VARCHAR(20), IN `descripciones` VARCHAR(500))  BEGIN
UPDATE tbl_productos SET tbl_subcategorias_idtbl_subcategorias=idsubcategoria,Peso=pesos,color=colores,ancho=anchos,altura=alturas,price_shipping=precio_envios,cantidad=cantidades,tama=tamas,precio=precios,titulo=titulos,garantia=garantias,descripcion=descripciones WHERE idtbl_productos=id;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `Actualizarshiipinguser` (`nam` VARCHAR(20), `lastnam` VARCHAR(20), `adress1` VARCHAR(50), `adress2` VARCHAR(50), `provinces` VARCHAR(20), `cantones` VARCHAR(20), `districts` VARCHAR(20), `zips` INT, `coun` VARCHAR(20), `id` INT)  BEGIN
UPDATE tbl_shipping SET name=nam,last_name=lastnam,firts_adress=adress1,second_adress=adress2,province=provinces,canton=cantones,district=districts,zip=zips,country=coun WHERE id_tblshipping=id;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `Actualizarvendedortexto` (`id` INT, `nombreuser` VARCHAR(20), `nom` VARCHAR(50), `ced` INT, `email` VARCHAR(20), `pass` VARCHAR(20), `tel` INT)  BEGIN
UPDATE tbl_seller SET nombre=nom, nombre_usuario=nombreuser,password=pass,correo=email,cedula_juridica=ced,telefono=tel WHERE idtbl_vendedor=id;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `EnviarMensajeAdmi` (`msg` VARCHAR(320), `email` VARCHAR(50))  BEGIN
 INSERT INTO tbl_message_manager(mensaje,correo,id_tbl_manager) VALUES(msg,email,'2');
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `insertar` (IN `idvendedor` INT, IN `idsubcategoria` INT, IN `pesos` VARCHAR(5), IN `colores` VARCHAR(20), IN `anchos` VARCHAR(10), IN `alturas` VARCHAR(10), IN `estados` VARCHAR(20), IN `precio_envios` INT(15), IN `cantidades` INT(10), IN `tamas` VARCHAR(10), IN `precios` INT(15), IN `titulos` VARCHAR(100), IN `garantias` VARCHAR(20), IN `descripciones` VARCHAR(500))  BEGIN


 INSERT INTO tbl_productos(tbl_vendedor_idtbl_vendedor,tbl_subcategorias_idtbl_subcategorias,Peso,color,ancho,altura,estado,price_shipping,cantidad,tama,precio,titulo,garantia,descripcion) VALUES(idvendedor ,idsubcategoria,pesos,colores,anchos,alturas,estados,precio_envios,cantidades,tamas,precios,titulos,garantias,descripciones);
 

END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `insertshipping` (IN `nam` VARCHAR(20), IN `lastnam` VARCHAR(20), IN `address1` VARCHAR(50), IN `address2` VARCHAR(50), IN `provinces` VARCHAR(20), IN `cantones` VARCHAR(20), IN `districts` VARCHAR(20), IN `zips` INT, IN `coun` VARCHAR(20), IN `id` INT)  BEGIN
 INSERT INTO tbl_shipping(name,last_name,firts_adress,second_adress,province,canton,district,zip,country,id_user) VALUES(nam,lastnam,address1,address2,provinces,cantones,districts,zips,coun,id);
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `search` (`word` VARCHAR(25))  BEGIN
 SELECT titulo,precio,descripcion,picture_code,idtbl_productos FROM tbl_productos as tp
 INNER JOIN tbl_photo AS TPH ON TPH.tbl_productos_idtbl_productos=idtbl_productos inner join tbl_seller as ts on tp.tbl_vendedor_idtbl_vendedor=ts.idtbl_vendedor inner join tbl_ranking  tr on 
 tr.tbl_vendedor_idtbl_vendedor =ts.idtbl_vendedor   where titulo like concat(word,'%') group by titulo order by tr.value_ranking ASC   ;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `verificarusershipping` (`id` INT)  BEGIN
select id_tblshipping from  tbl_shipping where id_user=id;
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
(10, 1, '10', 1),
(12, 13, '5', 1),
(13, 18, '1', 3);

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
-- Estructura de tabla para la tabla `tbl_message_manager`
--

CREATE TABLE `tbl_message_manager` (
  `id_tbl_message_maneger` int(11) NOT NULL,
  `mensaje` varchar(320) NOT NULL,
  `correo` varchar(50) NOT NULL,
  `id_tbl_manager` int(11) NOT NULL
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
(0, 'img/productos/vfcon0798601.jpg', 18),
(1, 'http://www.evisionstore.com/catalogo/samsung_wa14f5l2udy.jpg', 1),
(2, 'https://www.tiendamonge.com/content/images/thumbs/0021337_lg-lavadora-automatica-16kg.jpg', 1),
(3, 'https://www.calidadtelstar.com/contenido/wp-content/uploads/2016/06/TLA012510MD.jpg', 1),
(10, 'https://famsa_imagenes2.storage.googleapis.com/473931024WMC1786SXCG.GRI.jpg', 1),
(11, 'img/productos/comparison-phones-s80.jpg', 18),
(12, 'img/productos/15220006_1287216378006343_5008424892848480740_n1.jpg', 18),
(13, 'img/productos/12670292_101324590256825_133399599940571132_n0.jpg', 18);

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
(1, 4, 2, '100', 'Blanca nieve', '50', '75', 'activo', '250', 25, '0', 100000, 'Lavadora automatica', '24 meses', 'Ultima generacion de lavadoras.'),
(18, 4, 1, '140', 'Negro', '10', '20', 'activo', '0', 10, '118', 250000, 'Samsung Galaxy S8', '12 meses', 'El Galaxy S8 tiene la pantalla más grande de cualquiera de nuestros teléfonos a la fecha en una pantalla Infinity redondeada continua, que mejora la función multiventana de nuestros teléfonos anteriores y provee una experiencia inmersiva y cinemática.\n'),
(19, 4, 1, '', '', '', '', 'activo', '0', 0, '', 0, '', '', ''),
(20, 4, 1, '', '', '', '', 'activo', '0', 0, '', 0, '', '', '');

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

--
-- Volcado de datos para la tabla `tbl_record_seller`
--

INSERT INTO `tbl_record_seller` (`idtbl_historial_vendedor`, `tbl_vendedor_idtbl_vendedor`) VALUES
(1, 4);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_sales`
--

CREATE TABLE `tbl_sales` (
  `idtbl_ventas` int(11) NOT NULL,
  `tbl_usuario_idtbl_usuario` int(11) NOT NULL,
  `tbl_productos_idtbl_productos` int(11) NOT NULL,
  `id_tblshipping` int(11) NOT NULL,
  `cantidad` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tbl_sales`
--

INSERT INTO `tbl_sales` (`idtbl_ventas`, `tbl_usuario_idtbl_usuario`, `tbl_productos_idtbl_productos`, `id_tblshipping`, `cantidad`) VALUES
(2, 1, 1, 8, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_see`
--

CREATE TABLE `tbl_see` (
  `id_tbl_see` int(11) NOT NULL,
  `visitas` int(50) NOT NULL,
  `id_tbl_productos` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tbl_see`
--

INSERT INTO `tbl_see` (`id_tbl_see`, `visitas`, `id_tbl_productos`) VALUES
(1, 34, 1),
(3, 13, 13),
(4, 51, 17),
(5, 2, 14),
(6, 20, 15),
(7, 12, 18);

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
(4, 1, 'Gollo', 'gollo1', 'gollo1', 'gollo@', 123456789, 'activo', 'img/Vendedor/Logo-Gollo-300x2530.jpg', 84915419);

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
  `name` varchar(50) NOT NULL,
  `last_name` varchar(30) NOT NULL,
  `firts_adress` varchar(50) NOT NULL,
  `second_adress` varchar(50) NOT NULL,
  `province` varchar(15) NOT NULL,
  `canton` varchar(15) NOT NULL,
  `district` varchar(15) NOT NULL,
  `zip` int(11) NOT NULL,
  `country` varchar(15) NOT NULL,
  `id_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tbl_shipping`
--

INSERT INTO `tbl_shipping` (`id_tblshipping`, `name`, `last_name`, `firts_adress`, `second_adress`, `province`, `canton`, `district`, `zip`, `country`, `id_user`) VALUES
(0, 'Steven', 'Orozco', '', '', '', '', '', 0, '', 3),
(9, 'Yoel', '', '', '', 'Puntarenas', '', '', 0, '', 1);

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
(1, 'samsung', 1),
(2, 'LG', 1),
(3, 'Pandora', 2);

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
(1, 'yoel1202', 'yoel cerdas', 604140385, 'yoel1202@hotmail.com', '1', 87109682, 'img/Usuario/profile111.jpeg', '1', 1),
(2, 'yoe', 'yoe', 604140385, 'yoel120294@gmail.com', '123', 87109682, '1', 'img/Usuari', 1),
(3, 'steven1', 'Steven', 604250344, 'steven10795@gmail.co', '1', 62567388, 'img/Usuario/15220006_1287216378006343_5008424892848480740_n0.jpg', 'img/Usuari', 1);

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
-- Indices de la tabla `tbl_message_manager`
--
ALTER TABLE `tbl_message_manager`
  ADD PRIMARY KEY (`id_tbl_message_maneger`);

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
  ADD UNIQUE KEY `tbl_productos_idtbl_productos` (`tbl_productos_idtbl_productos`),
  ADD KEY `fk_tbl_ventas_tbl_usuario1_idx` (`tbl_usuario_idtbl_usuario`),
  ADD KEY `fk_tbl_ventas_tbl_productos1_idx` (`tbl_productos_idtbl_productos`);

--
-- Indices de la tabla `tbl_see`
--
ALTER TABLE `tbl_see`
  ADD PRIMARY KEY (`id_tbl_see`);

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
  ADD UNIQUE KEY `nombre_usuario` (`nombre_usuario`),
  ADD UNIQUE KEY `correo` (`correo`),
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
  MODIFY `id_cart` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
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
-- AUTO_INCREMENT de la tabla `tbl_message_manager`
--
ALTER TABLE `tbl_message_manager`
  MODIFY `id_tbl_message_maneger` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `tbl_page`
--
ALTER TABLE `tbl_page`
  MODIFY `idtbl_page` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `tbl_photo`
--
ALTER TABLE `tbl_photo`
  MODIFY `idtbl_photo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT de la tabla `tbl_productos`
--
ALTER TABLE `tbl_productos`
  MODIFY `idtbl_productos` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT de la tabla `tbl_ranking`
--
ALTER TABLE `tbl_ranking`
  MODIFY `idtbl_ranking` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `tbl_record_seller`
--
ALTER TABLE `tbl_record_seller`
  MODIFY `idtbl_historial_vendedor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `tbl_sales`
--
ALTER TABLE `tbl_sales`
  MODIFY `idtbl_ventas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `tbl_see`
--
ALTER TABLE `tbl_see`
  MODIFY `id_tbl_see` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT de la tabla `tbl_seller`
--
ALTER TABLE `tbl_seller`
  MODIFY `idtbl_vendedor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT de la tabla `tbl_shipping`
--
ALTER TABLE `tbl_shipping`
  MODIFY `id_tblshipping` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT de la tabla `tbl_subcategories`
--
ALTER TABLE `tbl_subcategories`
  MODIFY `idtbl_subcategorias` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de la tabla `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `idtbl_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
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
