-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:3306
-- Tiempo de generación: 30-06-2021 a las 15:28:54
-- Versión del servidor: 5.7.24
-- Versión de PHP: 7.3.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `sare`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `dg_establecimiento`
--

CREATE TABLE `dg_establecimiento` (
  `id` int(11) NOT NULL,
  `nombre_comercial` varchar(100) COLLATE utf8_spanish2_ci NOT NULL,
  `horario_trabajo` varchar(100) COLLATE utf8_spanish2_ci NOT NULL,
  `calle` varchar(100) COLLATE utf8_spanish2_ci NOT NULL,
  `no_exterior` int(10) NOT NULL,
  `no_interior` int(10) DEFAULT NULL,
  `colonia` varchar(100) COLLATE utf8_spanish2_ci NOT NULL,
  `entre_calles` varchar(200) COLLATE utf8_spanish2_ci NOT NULL,
  `municipio` varchar(100) COLLATE utf8_spanish2_ci NOT NULL,
  `localidad` varchar(150) COLLATE utf8_spanish2_ci NOT NULL,
  `cp` int(10) NOT NULL,
  `latitud_longitud` varchar(200) COLLATE utf8_spanish2_ci NOT NULL,
  `telefono` varchar(20) COLLATE utf8_spanish2_ci NOT NULL,
  `uso_actual` varchar(100) COLLATE utf8_spanish2_ci NOT NULL,
  `giro_scian` varchar(100) COLLATE utf8_spanish2_ci NOT NULL,
  `cuenta_catastral` varchar(50) COLLATE utf8_spanish2_ci NOT NULL,
  `manzana` varchar(50) COLLATE utf8_spanish2_ci NOT NULL,
  `lote` varchar(50) COLLATE utf8_spanish2_ci NOT NULL,
  `distancia_esquina` varchar(50) COLLATE utf8_spanish2_ci NOT NULL,
  `cajones_estacionamiento` varchar(50) COLLATE utf8_spanish2_ci NOT NULL,
  `monto_inversion` varchar(50) COLLATE utf8_spanish2_ci NOT NULL,
  `pesonal_ocupado` varchar(50) COLLATE utf8_spanish2_ci NOT NULL,
  `servicios_existentes` varchar(250) COLLATE utf8_spanish2_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `dg_establecimiento`
--

INSERT INTO `dg_establecimiento` (`id`, `nombre_comercial`, `horario_trabajo`, `calle`, `no_exterior`, `no_interior`, `colonia`, `entre_calles`, `municipio`, `localidad`, `cp`, `latitud_longitud`, `telefono`, `uso_actual`, `giro_scian`, `cuenta_catastral`, `manzana`, `lote`, `distancia_esquina`, `cajones_estacionamiento`, `monto_inversion`, `pesonal_ocupado`, `servicios_existentes`) VALUES
(1, 'abarrotes', '2021-03-10', 'beltran', 216, 1, 'la escalera', 'matamoros y beltran', 'Jesus Maria', 'jesus maria', 20900, '21.96338, -102.34697', '4496330125', 'casa', 'tienda', '02-02-02-020-202-020', '10', '216', '2', '0', '1000', '5', 'Agua, Drenaje, Alumbrado, '),
(2, 'abarrotes2', '2021-03-10', 'beltran', 217, 1, 'la escalera', 'matamoros y beltran', 'Jesus Maria', 'jesus maria', 20900, '21.96338, -102.34697', '4496330125', 'casa', 'tienda', '02-02-02-020-202-020', '10', '216', '2', '0', '1000', '5', 'Agua, Drenaje, Alumbrado, '),
(3, 'abarrotes', '2021-03-10', 'beltran', 216, 1, 'la escalera', 'matamoros y beltran', 'Jesus Maria', 'jesus maria', 20900, '21.96338, -102.34697', '4496330125', 'casa', 'tienda', '02-02-02-020-202-020', '10', '216', '2', '0', '1000', '5', 'Agua, Drenaje, Alumbrado, '),
(4, 'abarrotes', '2021-03-10', 'beltran', 216, 1, 'la escalera', 'matamoros y beltran', 'Jesus Maria', 'jesus maria', 20900, '21.96338, -102.34697', '4496330125', 'casa', 'tienda', '02-02-02-020-202-020', '10', '216', '2', '0', '1000', '5', 'Agua, Drenaje, Alumbrado, '),
(5, 'abarrotes', '2021-03-10', 'beltran', 216, 1, 'la escalera', 'matamoros y beltran', 'Jesus Maria', 'jesus maria', 20900, '21.96338, -102.34697', '4496330125', 'casa', 'tienda', '02-02-02-020-202-020', '10', '216', '2', '0', '1000', '5', 'Agua, Drenaje, Alumbrado, '),
(6, 'abarrotes', '2021-03-10', 'beltran', 216, 1, 'la escalera', 'matamoros y beltran', 'Jesus Maria', 'jesus maria', 20900, '21.96338, -102.34697', '4496330125', 'casa', 'tienda', '02-02-02-020-202-020', '10', '216', '2', '0', '1000', '5', 'Agua, Drenaje, Alumbrado, '),
(7, 'abarrotes', '2021-03-10', 'beltran', 216, 1, 'la escalera', 'matamoros y beltran', 'Jesus Maria', 'jesus maria', 20900, '21.96338, -102.34697', '4496330125', 'casa', 'tienda', '02-02-02-020-202-020', '10', '216', '2', '0', '1000', '5', 'Agua, Drenaje, Alumbrado, '),
(8, 'abarrotes', '2021-02-01', 'beltran', 216, 1, 'la escalera', 'matamoros y beltran', 'Jesus Maria', 'jesus maria', 20900, '21.96338, -102.34697', '4496330125', 'casa', 'tienda', '02-02-02-020-202-020', '10', '216', '2', '0', '1000', '5', 'Agua, Alumbrado, Teléfono, '),
(9, 'abarrotes', '2021-02-01', 'beltran', 216, 1, 'la escalera', 'matamoros y beltran', 'Jesus Maria', 'jesus maria', 20900, '21.96338, -102.34697', '4496330125', 'casa', 'tienda', '02-02-02-020-202-020', '10', '216', '2', '0', '1000', '5', 'Agua, Drenaje, Alumbrado, '),
(10, 'abarrotes', '2021-02-01', 'beltran', 216, 1, 'la escalera', 'matamoros y beltran', 'Jesus Maria', 'jesus maria', 20900, '21.96338, -102.34697', '4496330125', 'casa', 'tienda', '02-02-02-020-202-020', '10', '216', '2', '0', '1000', '5', 'Agua, Drenaje, Alumbrado, '),
(11, 'abarrotes', '2021-04-21', 'undefined', 333, 333, 'Jesús María Centro', 'asdfasdfasdf', 'Jesús María', 'Jesús María', 20920, '21.96148, -102.34366', '4496330125', 'sdfasdf', 'asdfasdf', '23-33-33-333-333-333', '23', '32', 'asdfasdf', 'asdfasdf', 'asdfasdf', 'asdfasdf', 'Drenaje, Pavimento, Electrificación, '),
(12, 'abarrotes los tres', '2021-05-11', 'beltran', 216, 1, 'Jesús María Centro', 'matamoros y beltran', 'Jesús María', 'Jesús María', 20920, '21.96338, -102.34697', '4496330125', 'casa', 'tienda', '02-02-02-020-202-020', '2', '3', '5', '5', '5000', '5', 'Agua, Drenaje, Alumbrado, '),
(13, 'abarrotes los tres', '2021-03-10', 'beltran', 216, 1, 'la escalera', 'matamoros y beltran', 'Jesús María', 'jesus maria', 20900, '21.96338, -102.34697', '4496330125', 'casa', 'tienda', '02-02-02-020-202-020', '10', '216', '2', '0', '1000', '5', 'Agua, Drenaje, Teléfono, '),
(14, 'abarrotes los tres', '2021-02-10', 'beltran', 216, 1, 'la escalera', 'matamoros y beltran', 'Jesús María', 'jesus maria', 20900, '21.96338, -102.34697', '4496330125', 'casa', 'tienda', '02-02-02-020-202-020', '10', '216', '2', '0', '1000', '5', 'Agua, Alumbrado, Teléfono, '),
(15, 'abarrotes', '2021-02-01', 'beltran', 216, 1, 'la escalera', 'matamoros y beltran', 'Jesús María', 'jesus maria', 20900, '21.96338, -102.34697', '4496330125', 'casa', 'tienda', '02-02-02-020-202-020', '10', '216', '2', '0', '1000', '5', 'Agua, Drenaje, Alumbrado, '),
(16, 'abarrotes', '2021-02-01', 'beltran', 216, 1, 'la escalera', 'matamoros y beltran', 'Jesús María', 'jesus maria', 20900, '21.96338, -102.34697', '4496330125', 'casa', 'tienda', '02-02-02-020-202-020', '10', '216', '2', '0', '1000', '5', 'Agua, Drenaje, Teléfono, '),
(17, 'empresa', '2021-03-10', 'emiliano zapata', 119, 5, 'Jesús María Centro', 'calle 1', 'Jesús María', 'La Ribera', 20358, '21.96137650007046, -102.34366270339672', '4491156367', 'comercio', '1', '56-56-56-565-656-565', '4', '512', '12', '2', '2125454', '4', 'Drenaje, Alumbrado, Banqueta, Electrificación, '),
(18, 'Turismo 260', '2021-06-22', 'Paseos de las maravillas', 308, 2, 'Corral de Barrancos', 'Miguel de la Madrid y Paseo del Molino', 'Jesús María', 'Jesús María', 20900, '21.9453089, -102.3252149', '4499140370', 'Comercial', '1', '05-02-02-015-069-000', '0', '0', '0', '0', '0', '0', 'Agua, Alumbrado, Pavimento, Banqueta, Electrificación, Otro, ');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `dimensiones_establecimiento`
--

CREATE TABLE `dimensiones_establecimiento` (
  `id` int(11) NOT NULL,
  `frente` varchar(30) COLLATE utf8_spanish2_ci NOT NULL,
  `fondo` varchar(30) COLLATE utf8_spanish2_ci NOT NULL,
  `derecho` varchar(30) COLLATE utf8_spanish2_ci NOT NULL,
  `izquierdo` varchar(30) COLLATE utf8_spanish2_ci NOT NULL,
  `sup_terreno` varchar(30) COLLATE utf8_spanish2_ci NOT NULL,
  `sup_local` varchar(30) COLLATE utf8_spanish2_ci NOT NULL,
  `cuenta_predial` varchar(30) COLLATE utf8_spanish2_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `dimensiones_establecimiento`
--

INSERT INTO `dimensiones_establecimiento` (`id`, `frente`, `fondo`, `derecho`, `izquierdo`, `sup_terreno`, `sup_local`, `cuenta_predial`) VALUES
(1, '10', '10', '10', '10', '10', '10', '02-02-02-020-202-020'),
(2, '20', '20', '20', '20', '20', '20', '02-02-02-020-202-020'),
(3, '10', '10', '10', '10', '10', '10', '02-02-02-020-202-020'),
(4, '10', '10', '10', '10', '10', '10', '02-02-02-020-202-020'),
(5, '10', '10', '10', '10', '10', '10', '02-02-02-020-202-020'),
(6, '10', '10', '10', '10', '10', '10', '02-02-02-020-202-020'),
(7, '10', '10', '10', '10', '10', '10', '02-02-02-020-202-020'),
(8, '10', '10', '10', '10', '10', '10', '02-02-02-020-202-020'),
(9, '10', '10', '10', '10', '10', '10', '02-02-02-020-202-020'),
(10, '44', '44', '44', '44', '44', '44', '34343434343434343434'),
(11, '10', '20', '20', '25', '15', '13', '020202020202020'),
(12, '10', '10', '10', '10', '10', '10', '020202020202020'),
(13, '10', '10', '10', '10', '10', '10', '020202020202020'),
(14, '10', '10', '10', '10', '10', '10', '020202020202020'),
(15, '10', '10', '10', '10', '10', '10', '020202020202020'),
(16, '55', '50', '65', '78', '149', '59', '21312312312312312'),
(17, '4', '4', '5', '5', '20', '20', '050202015069000');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `director`
--

CREATE TABLE `director` (
  `id` int(11) NOT NULL,
  `id_expediente` int(11) NOT NULL DEFAULT '0',
  `status` int(2) NOT NULL DEFAULT '0' COMMENT '0.- Revision. 1.- Aprobado. 2.- Denegado',
  `recibido` datetime DEFAULT NULL,
  `visto` datetime DEFAULT NULL,
  `resuelto` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `director`
--

INSERT INTO `director` (`id`, `id_expediente`, `status`, `recibido`, `visto`, `resuelto`) VALUES
(1, 9, 2, '2021-05-28 10:27:05', '2021-06-10 14:40:03', '2021-06-10 14:40:07'),
(2, 8, 1, '2021-06-09 15:53:48', '2021-06-09 15:54:29', '2021-06-09 15:54:36'),
(3, 9, 2, '2021-06-10 13:20:09', '2021-06-10 14:40:03', '2021-06-10 14:40:07'),
(4, 9, 2, '2021-06-10 13:22:38', '2021-06-10 14:40:03', '2021-06-10 14:40:07'),
(5, 9, 2, '2021-06-10 13:33:19', '2021-06-10 14:40:03', '2021-06-10 14:40:07'),
(6, 9, 2, '2021-06-10 14:37:26', '2021-06-10 14:40:03', '2021-06-10 14:40:07'),
(7, 11, 1, '2021-06-22 10:35:57', '2021-06-22 10:36:08', '2021-06-22 10:36:54'),
(8, 12, 1, '2021-06-22 13:02:17', '2021-06-22 13:02:34', '2021-06-22 13:02:45');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `expedientes`
--

CREATE TABLE `expedientes` (
  `id` int(11) NOT NULL,
  `folio` varchar(100) COLLATE utf8_spanish2_ci NOT NULL,
  `fecha_apertura` datetime NOT NULL,
  `tipo_persona` tinyint(1) NOT NULL COMMENT '0: persona fisica; 1 persona moral',
  `id_persona` int(10) NOT NULL,
  `id_dg_establecimiento` int(10) NOT NULL,
  `id_dimensiones_establecimiento` int(10) NOT NULL,
  `etapa` varchar(50) COLLATE utf8_spanish2_ci NOT NULL DEFAULT '' COMMENT '2.- ventanilla unica. 3.- Pago. 4.- Uso de suelo. 5.- Director. 6.- Secretario',
  `tipo_usuario` varchar(50) COLLATE utf8_spanish2_ci NOT NULL DEFAULT '0',
  `id_usuario` int(11) NOT NULL DEFAULT '0',
  `status` int(11) NOT NULL DEFAULT '0' COMMENT '0.- Revision. 1.- Aprobado. 2.- Denegado'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `expedientes`
--

INSERT INTO `expedientes` (`id`, `folio`, `fecha_apertura`, `tipo_persona`, `id_persona`, `id_dg_establecimiento`, `id_dimensiones_establecimiento`, `etapa`, `tipo_usuario`, `id_usuario`, `status`) VALUES
(8, 'SARE-2021-05-11-18-05-52', '2021-05-11 13:50:52', 0, 1, 14, 13, '7', '0', 0, 0),
(9, 'SARE-2021-05-11-19-05-57', '2021-05-11 14:05:57', 0, 1, 15, 14, '6', '1', 1, 2),
(10, 'SARE-2021-05-20-14-05-04', '2021-05-20 09:49:04', 0, 10, 16, 15, '2', '0', 0, 2),
(11, 'SARE-2021-06-22-15-06-22', '2021-06-22 10:28:22', 0, 11, 17, 16, '7', '1', 1, 1),
(12, 'SARE-2021-06-22-17-06-28', '2021-06-22 12:40:28', 0, 12, 18, 17, '7', '1', 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `giros`
--

CREATE TABLE `giros` (
  `id` int(11) NOT NULL,
  `giro` varchar(200) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `precio` int(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `giros`
--

INSERT INTO `giros` (`id`, `giro`, `precio`) VALUES
(1, 'Abarrotes', 677),
(2, 'Abastecedora de Diésel y/o combustibles', 27083),
(3, 'Aceros y materiales', 7387),
(4, 'Actividades culturales', 1847),
(5, 'Agencia de expedición de juegos y sorteos, pronósticos deportivos', 616),
(6, 'Agencia de modelos y edecanes', 1847),
(7, 'Agencia3 de viajes', 735),
(8, 'Alfombras, cortinas, tapetes, linóleo, pisos, parquet (sólo venta )', 1847),
(9, 'Alquiler de autos y cualquier vehículo transporte público de personal', 1232),
(10, 'Alquiler de mesas, sillas, rockolas, brincolines, toldos y accesorios  para fiestas', 616),
(11, 'Antenas parabólicas  (sólo venta )', 1232),
(12, 'Aparatos ortopédicos ( sólo venta )', 1232),
(13, 'Artículos de limpieza y jarcería', 616),
(14, 'Artículos para restaurante y refrigeraciones (sólo venta )', 1847),
(15, 'Asesoría nutricional y venta de productos naturistas', 904),
(16, 'Asociaciones y organizaciones (con prestación de servicios)', 924),
(17, 'Ataúdes (sólo venta)', 1232),
(18, 'Auto cinema', 4368),
(19, 'Auto lavado y servicio básico de autos', 616),
(20, 'Banco o Institución Financiera', 27000),
(21, 'Balconearía, herrería, y productos de acero', 1232),
(22, 'Balneario', 6155),
(23, 'Bazar, compra venta de artículos de segunda mano al menudeo', 431),
(24, 'Bascula Pública', 817),
(25, 'Billar sin venta de cerveza', 2462),
(26, 'Bodega', 1847),
(27, 'Bodega abarrotera mayorista y varios', 6945),
(28, 'Bolería, reparación y aseo de calzado', 431),
(29, 'Bonetería al menudeo', 616),
(30, 'Boutique', 840),
(31, 'Cafetería (menos de 10 mesas)', 616),
(32, 'Caja de ahorro', 12310),
(33, 'Carnicería', 616),
(34, 'Carnicería con venta de abarrotes y/o frutería', 837),
(35, 'Casa de cambio', 12310),
(36, 'Casa de empeño', 12310),
(37, 'Casa de huéspedes', 3079),
(38, 'Centro de acopio de residuos peligrosos', 1232),
(39, 'Centro de educación básica y media', 1847),
(40, 'Centro de educación superior y especialidades', 6945),
(41, 'Centro recreativo, deportivo y canchas', 616),
(42, 'Cerrajería', 431),
(43, 'Cigarros, puros, tabaco y porteo (solo venta)', 1232),
(44, 'Cine (costo por sala)', 5460),
(45, 'Clínica de belleza, estética, barbería y peluquería', 616),
(46, 'Clínica naturista', 3693),
(47, 'Clínica y servicios de maternidad', 3472),
(48, 'Club deportivo', 23227),
(49, 'Cocina económica, lonchería, cenaduría y taquería', 616),
(50, 'Comercialización de telas y derivados', 1232),
(51, 'Comercializadora de miel y sus derivados apícolas', 431),
(52, 'Comercio al por menor de artículos desechables', 616),
(53, 'Compra venta de artículos y material reciclable', 1232),
(54, 'Compra venta de equipos de cómputo y consumibles', 1232),
(55, 'Compra venta de lacas, barnices y solventes', 1232),
(56, 'Compra venta y consignación de autos', 1232),
(57, 'Compra y venta de semillas, chiles, cereales y especias', 431),
(58, 'Compra, venta y reparación de equipo de telefonía celular y equipo de radiocomunicación.', 1232),
(59, 'Confección y comercialización de vestidos de novia y de XV años', 1232),
(60, 'Corsetería y lencería', 616),
(61, 'Cremería', 1232),
(62, 'Despacho administrativo, fiscal, contable, jurídico, escritorio público y prestación de servicios profesionales y técnicos', 616),
(63, 'Dulcería, artículos para fiestas y desechables al mayoreo', 1157),
(64, 'Elaboración y comercialización de productos de cantera', 616),
(65, 'Elaboración y venta de tortillas hechas a mano de harina, maíz y/o molino de nixtamal', 616),
(66, 'Elaboración, reparación y venta de artesanías', 616),
(67, 'Empacadora de carnes y embutidos', 1232),
(68, 'Envasadora y venta de agua purificada', 3693),
(69, 'Estacionamiento público hasta 25 vehículos', 3472),
(70, 'Estacionamiento público mayor a 25 vehículos', 5788),
(71, 'Estancias infantiles, guarderías y CENDI', 1847),
(72, 'Estudio de Tatuajes', 924),
(73, 'Estudio fotográfico, revelado e impresión', 1232),
(74, 'Exhibición y venta de muebles y accesorios', 1232),
(75, 'Exhibición y/o venta de equipo médico', 1157),
(76, 'Expendio y venta de pan, así como productos de harina.', 616),
(77, 'Fábrica de block', 3079),
(78, 'Fábrica de calzado', 1847),
(79, 'Fabricación de bolsas de polietileno', 1232),
(80, 'Fabricación de telas y estambres', 1847),
(81, 'Fabricación y comercialización de botanas', 1847),
(82, 'Fabricación y comercialización de lavaderos', 616),
(83, 'Fabricación y comercialización de muebles (más de 20 empleados)', 3472),
(84, 'Fabricación y comercialización de muebles (menos de 20 empleados)', 1737),
(85, 'Fabricación y venta de accesorios para mascotas', 1737),
(86, 'Fabricación y venta de cerámica y cristalería al menudeo', 616),
(87, 'Fabricación y/o venta de bolsas y accesorios de dama y/o caballero', 1232),
(88, 'Farmacia con autoservicio', 8051),
(89, 'Farmacia con autoservicio y consultorio médico', 9000),
(90, 'Farmacia con consultorio médico', 1847),
(91, 'Farmacia sin consultorio médico', 1199),
(92, 'Ferretería, tlapalería y tienda de pinturas', 1232),
(93, 'Florería', 924),
(94, 'Fundidora', 7387),
(95, 'Funeraria ( oficina y sala de velación)', 1232),
(96, 'Gaseras', 27083),
(97, 'Gasolineras', 27083),
(98, 'Gimnasio y/o centro para realizar actividad física', 1232),
(99, 'Granulación de plásticos termófilos', 1232),
(100, 'Hotel *', 3079),
(101, 'Hotel **', 3693),
(102, 'Hotel ***', 4923),
(103, 'Hotel ****', 8618),
(104, 'Hotel *****', 9848),
(105, 'Imprenta', 1232),
(106, 'Industria', 6552),
(107, 'Industria metal mecánica', 7387),
(108, 'Inmobiliaria y corredores de bienes raíces', 1232),
(109, 'Instituto de crédito', 12310),
(110, 'Internet público, café internet', 616),
(111, 'Jardín de niños, escuela primaria y secundaria', 1847),
(112, 'Joyería y relojería', 1847),
(113, 'Juguetería y venta de productos infantiles', 924),
(114, 'Laboratorio clínico', 3079),
(115, 'Ladrilleras', 1232),
(116, 'Lavandería industrial', 4368),
(117, 'Lavandería y planchaduría', 431),
(118, 'Lonas y toldos', 1847),
(119, 'Maderería (venta de materia prima)', 868),
(120, 'Maderería y accesorios', 1157),
(121, 'Manufactura', 5788),
(122, 'Manufactura de componentes electrónicos', 3472),
(123, 'Maquiladora de pinturas en polvo', 1847),
(124, 'Máquina de videojuego ( 51.00 por máquina )', 616),
(125, 'Materiales para la construcción', 1847),
(126, 'Mercería, venta de regalos, curiosidades y manualidades', 431),
(127, 'Microindustria', 3276),
(128, 'Minisúper', 1232),
(129, 'Motel', 12310),
(130, 'Óptica', 1232),
(131, 'Panadería, pastelería y repostería', 1232),
(132, 'Papelería, centro de copiado e impresión', 616),
(133, 'Paquetería y mensajería', 1847),
(134, 'Pizzería', 1847),
(135, 'Pollería', 431),
(136, 'Productos lácteos (elaboración)', 3693),
(137, 'Publicaciones, revistas y periódicos (sólo venta )', 431),
(138, 'Puesto de revistas', 431),
(139, 'Recolección y transporte de residuos sólidos', 1232),
(140, 'Refaccionaria automotriz', 2315),
(141, 'Renta y venta de DVD, USB, y CD´s', 616),
(142, 'Renta, venta y reparación de trajes', 616),
(143, 'Reparación de aparatos electrodomésticos', 616),
(144, 'Reparación de bombas sumergibles y motores industriales', 1232),
(145, 'Reparación de escapes y mofles, para automotores', 616),
(146, 'Reparación y venta de accesorios para bicicletas', 431),
(147, 'Restaurant sin venta de bebidas alcohólicas', 1847),
(148, 'Rótulos', 616),
(149, 'Salón de fiestas infantiles', 2315),
(150, 'Sanitarios públicos', 431),
(151, 'Servicio de control y exterminación de plagas', 1847),
(152, 'Servicio de grúa', 1847),
(153, 'Servicio de limpieza de oficinas, casas e industria', 1847),
(154, 'Servicio de renta de televisión por cable', 2315),
(155, 'Sex Shop', 3200),
(156, 'Spa', 3079),
(157, 'Supermercado', 24000),
(158, 'Talabartería', 1232),
(159, 'Taller auto eléctrico', 1232),
(160, 'Taller de costura y reparación de ropa (de 1 a 5 máquinas)', 405),
(161, 'Taller de elaboración y reparación de artículos de madera (artesanías)', 431),
(162, 'Taller de hojalatería y pintura', 1232),
(163, 'Taller de torno', 1847),
(164, 'Taller mecánico', 1232),
(165, 'Taller, fabricación y maquila de ropa (de 11 a 25 máquinas)', 4368),
(166, 'Taller, fabricación y maquila de ropa (de 6 a 10 máquinas)', 1638),
(167, 'Taller, fabricación y maquila de ropa más de 26 a 40 máquinas)', 7644),
(168, 'Taller, fabricación y maquila de ropa más de 40 máquinas)', 21840),
(169, 'Talleres de reparación de muebles y tapicerías', 616),
(170, 'Temazcal', 3079),
(171, 'Tendajón', 431),
(172, 'Tienda departamental', 9848),
(173, 'Tienda departamental y Servicios Financieros', 29848),
(174, 'Tintorerías', 1847),
(175, 'Tortillería', 1847),
(176, 'Venta de accesorios y artículos deportivos', 1232),
(177, 'Venta de aditivos y productos para la industria alimenticia', 924),
(178, 'Venta de Agroquímicos', 1232),
(179, 'Venta de artículos de belleza y perfumería', 431),
(180, 'Venta de blancos para el hogar', 616),
(181, 'Venta de botanas y sus derivados', 431),
(182, 'Venta de discos y música o cualquier forma de reproducción musical(legal)', 616),
(183, 'Venta de forrajes, alimentos y semillas para consumo animal', 616),
(184, 'Venta de frutas y verduras', 616),
(185, 'Venta de instrumentos y accesorios musicales', 616),
(186, 'Venta de llantas alineación y balanceo', 1232),
(187, 'Venta de material eléctrico', 1232),
(188, 'Venta de muebles y accesorios para baño', 1847),
(189, 'Venta de nieves, frappés, paletas y productos comestibles de hielo', 616),
(190, 'Venta de pañales', 616),
(191, 'Venta de pescados y mariscos', 616),
(192, 'Venta de pollos rostizados o preparados al carbón', 616),
(193, 'Venta de muebles, electrodomésticos y artículos para el hogar', 1232),
(194, 'Venta y almacenamiento de productos químicos', 1232),
(195, 'Venta y comercialización al mayoreo de productos cárnicos (obrador)', 3472),
(196, 'Venta y Mantenimiento de Calentadores Solares, Paneles y demás productos que funcionan con energía solar', 1232),
(197, 'Venta y reparación de libros nuevos y/o usados', 431),
(198, 'Venta y reparación de motocicletas y accesorios', 1847),
(199, 'Venta y reparación de sombreros', 431),
(200, 'Venta, elaboración y comercialización de bisutería y sus accesorios', 431),
(201, 'Venta, reparación e instalación de accesorios automotrices', 1848),
(202, 'Veterinaria y venta de medicamento para animales', 1232),
(203, 'Vidrios, cristales, cancelería de aluminio y marcos', 1232),
(204, 'Vivero y servicio de jardinería', 431),
(205, 'Vulcanizadora y cambio de aceite', 1232),
(206, 'Zapatería', 616);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `historico`
--

CREATE TABLE `historico` (
  `id` int(11) NOT NULL,
  `id_expediente` int(11) DEFAULT NULL,
  `pago` char(10) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `fecha` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `historico`
--

INSERT INTO `historico` (`id`, `id_expediente`, `pago`, `fecha`) VALUES
(1, 11, '189', '2021-06-22 10:31:28'),
(2, 12, '150', '2021-06-22 12:57:51');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pagos`
--

CREATE TABLE `pagos` (
  `id` int(11) NOT NULL,
  `id_expediente` int(11) NOT NULL DEFAULT '0',
  `status` int(2) DEFAULT '0' COMMENT '0.- Revision. 1.- Aprobado. 2.- Denegado',
  `recibido` datetime DEFAULT NULL,
  `visto` datetime DEFAULT NULL,
  `resuelto` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `pagos`
--

INSERT INTO `pagos` (`id`, `id_expediente`, `status`, `recibido`, `visto`, `resuelto`) VALUES
(1, 10, 0, '2021-06-08 15:39:29', '2021-06-09 15:45:31', NULL),
(2, 9, 1, '2021-06-08 15:39:52', '2021-06-09 15:46:00', '2021-06-09 15:50:52'),
(3, 8, 1, '2021-06-08 15:40:07', '2021-06-09 15:46:00', '2021-06-09 15:47:01'),
(4, 10, 0, '2021-06-11 11:44:42', NULL, NULL),
(5, 10, 0, '2021-06-22 10:30:08', NULL, NULL),
(6, 11, 1, '2021-06-22 10:31:28', '2021-06-22 10:31:37', '2021-06-22 10:31:59'),
(7, 12, 1, '2021-06-22 12:57:51', '2021-06-22 12:58:01', '2021-06-22 13:00:48');

-- --------------------------------------------------------

--
-- Estructura Stand-in para la vista `pendientes`
-- (Véase abajo para la vista actual)
--
CREATE TABLE `pendientes` (
`id` int(11)
,`fecha_apertura` datetime
,`nombre_comercial` varchar(100)
,`domicilio` varchar(376)
,`telefono` varchar(20)
,`status` int(11)
,`etapa` varchar(50)
);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `personas_fisicas`
--

CREATE TABLE `personas_fisicas` (
  `id` int(11) NOT NULL,
  `nombre_completo` varchar(200) COLLATE utf8_spanish2_ci NOT NULL,
  `calle` varchar(200) COLLATE utf8_spanish2_ci NOT NULL,
  `no_exterior` varchar(10) COLLATE utf8_spanish2_ci NOT NULL,
  `no_interior` varchar(10) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `colonia` varchar(100) COLLATE utf8_spanish2_ci NOT NULL,
  `municipio` varchar(200) COLLATE utf8_spanish2_ci NOT NULL,
  `localidad` varchar(200) COLLATE utf8_spanish2_ci NOT NULL,
  `c_p` int(10) NOT NULL,
  `rfc` varchar(20) COLLATE utf8_spanish2_ci NOT NULL,
  `curp` varchar(20) COLLATE utf8_spanish2_ci NOT NULL,
  `telefono` varchar(15) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `email` varchar(150) COLLATE utf8_spanish2_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `personas_fisicas`
--

INSERT INTO `personas_fisicas` (`id`, `nombre_completo`, `calle`, `no_exterior`, `no_interior`, `colonia`, `municipio`, `localidad`, `c_p`, `rfc`, `curp`, `telefono`, `email`) VALUES
(1, 'jose manuel castañeda espino', 'la misma', '123', '', 'la colonia', 'Jesus Maria', 'la misma', 20292, 'CAEM860323ES3', 'CAEM860323HASSSS00', '2147483647', 'correo@gmail.com'),
(2, 'jose manuel', 'la misma calle', '258', '', 'la otra colonia', 'Jesus Maria', 'cualquiera', 20920, 'CAEM860323ES3', 'CAEM860323HASSSN00', '1234567890', 'correo@email.com'),
(3, 'Jose Manuel Castañeda Espino', 'Casa Blanca', '806', '', 'casa blanca', 'Aguascalientes', 'jesus maria', 20900, 'CAEM860323ES3', 'CAEM860323HASSSN00', '4496330125', 'jose.espino@jesusmaria.gob.mx'),
(4, 'Jose Manuel Castañeda Espino-CAEM860323ES3', 'la misma', '123', '', 'la colonia', 'Jesus Maria', 'la misma', 20292, 'CAEM860323ES3', 'CAEM860323HASSSS00', '2147483647', 'correo@gmail.com'),
(5, 'Jose Manuel Castañeda Espino-CAEM860323ES3-CAEM860323ES3', 'la misma', '123', '', 'la colonia', 'Jesus Maria', 'la misma', 20292, 'CAEM860323ES3', 'CAEM860323HASSSS00', '2147483647', 'correo@gmail.com'),
(6, 'jose manuel-CAEM860323ES3', 'la misma', '123', '', 'la colonia', 'Jesus Maria', 'la misma', 20292, 'CAEM860323ES3', 'CAEM860323HASSSS00', '2147483647', 'correo@gmail.com'),
(7, 'tucan', 'Casa Blanca', '443', '444', 'adfgasdf', 'Aguascalientes', 'asdfasdf', 25000, 'ASDFASDF', 'ASDFASDFASDF', '4491324567', 'ASDaasd@gmail.com'),
(8, 'tucan-ASDFASDF', 'Casa Blanca', '444', '444', 'adfgasdf', 'Aguascalientes', 'asdfasdf', 12341234, 'ASDFASDF', 'ASDFASDFASDF', '12341234123', 'ASDaasd@gmail.com'),
(9, 'jose manuel-CAEM860323ES3', 'la misma', '123', '', 'la colonia', 'Jesus Maria', 'la misma', 20292, '', '', '2147483647', 'correo@gmail.com'),
(10, 'jose manuel', 'la misma', '123', '', 'la colonia', 'Jesus Maria', 'la misma', 20292, 'CAEM860323ES3', 'CAEM860323HASSSS00', '2147483647', 'correo@gmail.com'),
(11, 'Eleazar Cortez', 'Calle', '115', '', 'Centro', 'Aguascalientes', 'La Ribera', 20358, 'COME911105PE1', 'COME911105HASRRL05', '4491156367', 'tokr2010@gmail.com'),
(12, 'Jennifer Padilla Loza', 'San Mateo', '169', '', 'Alcazar', 'Jesus Maria', 'Jesús María', 20900, 'XAXX000000XA0', 'PALJ910124MASDZN07', '4499140370', 'tokr2010@gmail.com');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `personas_morales`
--

CREATE TABLE `personas_morales` (
  `id` int(11) NOT NULL,
  `nombre_empresa` varchar(100) COLLATE utf8_spanish2_ci NOT NULL,
  `fecha_constitucion` datetime NOT NULL,
  `rfc_empresa` varchar(20) COLLATE utf8_spanish2_ci NOT NULL,
  `telefono_empresa` varchar(20) COLLATE utf8_spanish2_ci NOT NULL,
  `email_empresa` varchar(50) COLLATE utf8_spanish2_ci NOT NULL,
  `nombre_rl` varchar(100) COLLATE utf8_spanish2_ci NOT NULL,
  `rfc_rl` varchar(20) COLLATE utf8_spanish2_ci NOT NULL,
  `curp` varchar(20) COLLATE utf8_spanish2_ci NOT NULL,
  `calle` varchar(200) COLLATE utf8_spanish2_ci NOT NULL,
  `no_exterior` int(6) NOT NULL,
  `no_interior` char(6) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `colonia` varchar(100) COLLATE utf8_spanish2_ci NOT NULL,
  `estado` varchar(100) COLLATE utf8_spanish2_ci NOT NULL,
  `municipio` varchar(150) COLLATE utf8_spanish2_ci NOT NULL,
  `localidad` varchar(200) COLLATE utf8_spanish2_ci NOT NULL,
  `cp` int(10) NOT NULL,
  `telefono_rl` varchar(20) COLLATE utf8_spanish2_ci NOT NULL,
  `email_rl` varchar(100) COLLATE utf8_spanish2_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `personas_morales`
--

INSERT INTO `personas_morales` (`id`, `nombre_empresa`, `fecha_constitucion`, `rfc_empresa`, `telefono_empresa`, `email_empresa`, `nombre_rl`, `rfc_rl`, `curp`, `calle`, `no_exterior`, `no_interior`, `colonia`, `estado`, `municipio`, `localidad`, `cp`, `telefono_rl`, `email_rl`) VALUES
(1, 'los tres', '2012-03-23 00:00:00', 'LTR120323ES4', '4491234567', 'contacto@lostres.com', 'jose manuel castañeda espino', 'CAEM860323', 'CAEM860323HASSSN00', 'calle', 201, '', 'colonia', 'Aguascalientes', 'Jesús María', 'jesus maria', 20900, '4491234567', 'contacto@lostres.com'),
(2, 'los tres', '2012-03-23 00:00:00', 'LTR120323ES4', '4491234567', 'contacto@lostres.com', 'jose manuel castañeda espino', 'CAEM860323ES3', 'CAEM860323HASSSN00', 'calle', 201, '', 'colonia', 'Aguascalientes', 'Jesús María', 'jesus maria', 20900, '4491234567', 'contacto@lostres.com'),
(3, 'los tres', '2012-03-23 00:00:00', 'LTR120323ES4', '4491234567', 'contacto@lostres.com', 'jose manuel castañeda espino', 'CAEM860323ES3', 'CAEM860323HASSSN00', 'calle', 201, '', 'colonia', 'Aguascalientes', 'Jesús María', 'jesus maria', 20900, '4491234567', 'contacto@lostres.com'),
(5, 'juan manuelk', '2012-03-23 00:00:00', 'LTR120323ES4', '4496330125', 'contacto@lostres.com', 'jose manuel castañeda espino', 'CAEM860323ES3', 'CAEM860323HASSSN00', 'calle', 1, '', 'colonia', 'Aguascalientes', 'Jesús María', 'jesus maria', 20900, '4496330125', 'contacto@lostres.com'),
(10, 'los tres', '2012-03-23 00:00:00', 'LTR120323ES4', '4491234567', 'contacto@lostres.com', 'jose manuel castañeda espino', 'CAEM860323ES3', 'CAEM860323HASSSN00', 'calle', 201, '', 'colonia', 'Aguascalientes', 'Jesús María', 'jesus maria', 20900, '4491234567', 'contacto@lostres.com');

-- --------------------------------------------------------

--
-- Estructura Stand-in para la vista `resueltas`
-- (Véase abajo para la vista actual)
--
CREATE TABLE `resueltas` (
`id` int(11)
,`fecha_apertura` datetime
,`nombre_comercial` varchar(100)
,`domicilio` varchar(376)
,`telefono` varchar(20)
,`status` int(11)
,`etapa` varchar(50)
);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `secretario`
--

CREATE TABLE `secretario` (
  `id` int(11) NOT NULL,
  `id_expediente` int(11) NOT NULL DEFAULT '0',
  `status` int(2) NOT NULL DEFAULT '0' COMMENT '0.- Revision. 1.- Aprobado. 2.- Denegado',
  `recibido` datetime DEFAULT NULL,
  `visto` datetime DEFAULT NULL,
  `resuelto` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `secretario`
--

INSERT INTO `secretario` (`id`, `id_expediente`, `status`, `recibido`, `visto`, `resuelto`) VALUES
(1, 9, 2, '2021-05-28 10:47:08', '2021-06-10 15:14:38', '2021-06-11 11:39:10'),
(2, 8, 1, '2021-06-09 15:54:36', '2021-06-09 15:54:55', '2021-06-09 15:57:54'),
(3, 9, 2, '2021-06-10 13:36:25', '2021-06-10 15:14:38', '2021-06-11 11:39:10'),
(4, 9, 2, '2021-06-10 14:19:46', '2021-06-10 15:14:38', '2021-06-11 11:39:10'),
(5, 9, 2, '2021-06-10 14:22:35', '2021-06-10 15:14:38', '2021-06-11 11:39:10'),
(6, 9, 2, '2021-06-10 14:40:07', '2021-06-10 15:14:38', '2021-06-11 11:39:10'),
(7, 11, 1, '2021-06-22 10:36:54', '2021-06-22 10:38:41', '2021-06-22 10:38:45'),
(8, 12, 1, '2021-06-22 13:02:45', '2021-06-22 13:02:59', '2021-06-22 13:03:03');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `suelo`
--

CREATE TABLE `suelo` (
  `id` int(11) NOT NULL,
  `id_expediente` int(11) NOT NULL DEFAULT '0',
  `status` int(2) NOT NULL DEFAULT '0' COMMENT '0.- Revision. 1.- Aprobado. 2.- Denegado',
  `recibido` datetime DEFAULT NULL,
  `visto` datetime DEFAULT NULL,
  `resuelto` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci COMMENT='uso';

--
-- Volcado de datos para la tabla `suelo`
--

INSERT INTO `suelo` (`id`, `id_expediente`, `status`, `recibido`, `visto`, `resuelto`) VALUES
(19, 10, 0, '2021-06-08 15:52:58', '2021-06-08 16:31:40', NULL),
(20, 8, 1, '2021-06-09 15:47:01', '2021-06-09 15:47:22', '2021-06-09 15:53:48'),
(21, 9, 2, '2021-06-09 15:50:52', '2021-06-09 15:51:40', '2021-06-10 14:37:26'),
(22, 11, 1, '2021-06-22 10:31:59', '2021-06-22 10:33:56', '2021-06-22 10:35:57'),
(23, 12, 1, '2021-06-22 13:00:48', '2021-06-22 13:01:03', '2021-06-22 13:02:17');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `suplente`
--

CREATE TABLE `suplente` (
  `id` int(11) NOT NULL,
  `id_suplente` int(11) NOT NULL DEFAULT '0',
  `status` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `suplente`
--

INSERT INTO `suplente` (`id`, `id_suplente`, `status`) VALUES
(1, 3, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_usuario`
--

CREATE TABLE `tipo_usuario` (
  `id` int(11) NOT NULL,
  `tipo` varchar(50) COLLATE utf8_spanish2_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `tipo_usuario`
--

INSERT INTO `tipo_usuario` (`id`, `tipo`) VALUES
(1, 'Administrador'),
(2, 'SARE'),
(3, 'Ventanilla Unica'),
(4, 'Uso de Suelo'),
(5, 'Director'),
(6, 'Secretario'),
(7, 'Anexos');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id_usuario` int(11) NOT NULL,
  `nombre_usuario` varchar(100) COLLATE utf8_spanish2_ci NOT NULL,
  `usuario` varchar(25) COLLATE utf8_spanish2_ci NOT NULL,
  `password` varchar(50) COLLATE utf8_spanish2_ci NOT NULL,
  `id_tipo_usuario` int(11) NOT NULL,
  `status` tinyblob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id_usuario`, `nombre_usuario`, `usuario`, `password`, `id_tipo_usuario`, `status`) VALUES
(1, 'SUPER ADMIN', 'admin', 'e10adc3949ba59abbe56e057f20f883e', 1, 0x31),
(2, 'Fernando', 'fermar', 'e10adc3949ba59abbe56e057f20f883e', 1, 0x31),
(3, 'Director SEDATUM', 'director', '3d4e992d8d8a7d848724aa26ed7f4176', 5, 0x31),
(4, 'SARE', 'sare', '0a83c364fbc08ae01c5d4da2f52b901e', 2, 0x31),
(7, 'Ventanilla Unica', 'ventanilla', 'cc5637a974d5e9a68966054a88bb6dd9', 3, 0x31),
(8, 'Uso de Suelo', 'uso_suelo', '13c593f256c372906cbf7eaec91f6c16', 4, 0x31),
(9, 'Secretario', 'secretario', '09ca0d5095609fe35bb7c9c7246e3cae', 6, 0x31),
(10, 'Anexos', 'anexos', '9985dc49496c2f7dcd78199e1145aeed', 7, 0x31);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ventanilla`
--

CREATE TABLE `ventanilla` (
  `id` int(11) NOT NULL,
  `id_expediente` int(11) NOT NULL DEFAULT '0',
  `status` int(2) NOT NULL DEFAULT '0' COMMENT '0.- Revision. 1.- Aprobado. 2.- Denegado',
  `recibido` datetime DEFAULT NULL,
  `visto` datetime DEFAULT NULL,
  `resuelto` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `ventanilla`
--

INSERT INTO `ventanilla` (`id`, `id_expediente`, `status`, `recibido`, `visto`, `resuelto`) VALUES
(1, 9, 1, '2021-05-28 10:39:01', '2021-05-28 10:39:03', '2021-05-28 10:39:05'),
(2, 8, 0, '2021-06-08 10:14:15', '2021-06-09 10:14:26', NULL),
(3, 10, 2, '2021-06-08 10:15:07', '2021-06-09 10:15:14', '2021-06-22 10:30:08');

-- --------------------------------------------------------

--
-- Estructura para la vista `pendientes`
--
DROP TABLE IF EXISTS `pendientes`;

CREATE VIEW `pendientes`  AS SELECT `e`.`id` AS `id`, `e`.`fecha_apertura` AS `fecha_apertura`, `dg`.`nombre_comercial` AS `nombre_comercial`, concat(`dg`.`calle`,' ',`dg`.`no_exterior`,' ',`dg`.`no_interior`,' ',`dg`.`colonia`,' ',`dg`.`localidad`) AS `domicilio`, `dg`.`telefono` AS `telefono`, `e`.`status` AS `status`, `e`.`etapa` AS `etapa` FROM (`expedientes` `e` left join `dg_establecimiento` `dg` on((`dg`.`id` = `e`.`id_dg_establecimiento`))) WHERE ((`e`.`etapa` <> '7') AND (`e`.`status` <> 2)) ;

-- --------------------------------------------------------

--
-- Estructura para la vista `resueltas`
--
DROP TABLE IF EXISTS `resueltas`;

CREATE VIEW `resueltas`  AS SELECT `e`.`id` AS `id`, `e`.`fecha_apertura` AS `fecha_apertura`, `dg`.`nombre_comercial` AS `nombre_comercial`, concat(`dg`.`calle`,' ',`dg`.`no_exterior`,' ',`dg`.`no_interior`,' ',`dg`.`colonia`,' ',`dg`.`localidad`) AS `domicilio`, `dg`.`telefono` AS `telefono`, `e`.`status` AS `status`, `e`.`etapa` AS `etapa` FROM (`expedientes` `e` left join `dg_establecimiento` `dg` on((`dg`.`id` = `e`.`id_dg_establecimiento`))) WHERE ((`e`.`etapa` = '7') OR (`e`.`status` = 2)) ;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `dg_establecimiento`
--
ALTER TABLE `dg_establecimiento`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `dimensiones_establecimiento`
--
ALTER TABLE `dimensiones_establecimiento`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `director`
--
ALTER TABLE `director`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `expedientes`
--
ALTER TABLE `expedientes`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `giros`
--
ALTER TABLE `giros`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `historico`
--
ALTER TABLE `historico`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_expediente` (`id_expediente`);

--
-- Indices de la tabla `pagos`
--
ALTER TABLE `pagos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `personas_fisicas`
--
ALTER TABLE `personas_fisicas`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `personas_morales`
--
ALTER TABLE `personas_morales`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `secretario`
--
ALTER TABLE `secretario`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `suelo`
--
ALTER TABLE `suelo`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `suplente`
--
ALTER TABLE `suplente`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tipo_usuario`
--
ALTER TABLE `tipo_usuario`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id_usuario`);

--
-- Indices de la tabla `ventanilla`
--
ALTER TABLE `ventanilla`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `dg_establecimiento`
--
ALTER TABLE `dg_establecimiento`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT de la tabla `dimensiones_establecimiento`
--
ALTER TABLE `dimensiones_establecimiento`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT de la tabla `director`
--
ALTER TABLE `director`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `expedientes`
--
ALTER TABLE `expedientes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de la tabla `historico`
--
ALTER TABLE `historico`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `pagos`
--
ALTER TABLE `pagos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `personas_fisicas`
--
ALTER TABLE `personas_fisicas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de la tabla `personas_morales`
--
ALTER TABLE `personas_morales`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `secretario`
--
ALTER TABLE `secretario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `suelo`
--
ALTER TABLE `suelo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT de la tabla `suplente`
--
ALTER TABLE `suplente`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `tipo_usuario`
--
ALTER TABLE `tipo_usuario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `ventanilla`
--
ALTER TABLE `ventanilla`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
