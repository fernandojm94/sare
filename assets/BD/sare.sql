-- --------------------------------------------------------
-- Host:                         localhost
-- Versión del servidor:         5.7.24 - MySQL Community Server (GPL)
-- SO del servidor:              Win64
-- HeidiSQL Versión:             10.2.0.5599
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Volcando estructura de base de datos para sare
CREATE DATABASE IF NOT EXISTS `sare` /*!40100 DEFAULT CHARACTER SET utf8 COLLATE utf8_spanish2_ci */;
USE `sare`;

-- Volcando estructura para tabla sare.dg_establecimiento
CREATE TABLE IF NOT EXISTS `dg_establecimiento` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre_comercial` varchar(100) COLLATE utf8_spanish2_ci NOT NULL,
  `horario_trabajo` varchar(100) COLLATE utf8_spanish2_ci NOT NULL,
  `calle` varchar(100) COLLATE utf8_spanish2_ci NOT NULL,
  `no_exterior` int(10) NOT NULL,
  `no_interior` int(10) NOT NULL,
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
  `servicios_existentes` varchar(50) COLLATE utf8_spanish2_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

-- Volcando datos para la tabla sare.dg_establecimiento: ~14 rows (aproximadamente)
DELETE FROM `dg_establecimiento`;
/*!40000 ALTER TABLE `dg_establecimiento` DISABLE KEYS */;
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
	(16, 'abarrotes', '2021-02-01', 'beltran', 216, 1, 'la escalera', 'matamoros y beltran', 'Jesús María', 'jesus maria', 20900, '21.96338, -102.34697', '4496330125', 'casa', 'tienda', '02-02-02-020-202-020', '10', '216', '2', '0', '1000', '5', 'Agua, Drenaje, Teléfono, ');
/*!40000 ALTER TABLE `dg_establecimiento` ENABLE KEYS */;

-- Volcando estructura para tabla sare.dimensiones_establecimiento
CREATE TABLE IF NOT EXISTS `dimensiones_establecimiento` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `frente` varchar(30) COLLATE utf8_spanish2_ci NOT NULL,
  `fondo` varchar(30) COLLATE utf8_spanish2_ci NOT NULL,
  `derecho` varchar(30) COLLATE utf8_spanish2_ci NOT NULL,
  `izquierdo` varchar(30) COLLATE utf8_spanish2_ci NOT NULL,
  `sup_terreno` varchar(30) COLLATE utf8_spanish2_ci NOT NULL,
  `sup_local` varchar(30) COLLATE utf8_spanish2_ci NOT NULL,
  `cuenta_predial` varchar(30) COLLATE utf8_spanish2_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

-- Volcando datos para la tabla sare.dimensiones_establecimiento: ~13 rows (aproximadamente)
DELETE FROM `dimensiones_establecimiento`;
/*!40000 ALTER TABLE `dimensiones_establecimiento` DISABLE KEYS */;
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
	(15, '10', '10', '10', '10', '10', '10', '020202020202020');
/*!40000 ALTER TABLE `dimensiones_establecimiento` ENABLE KEYS */;

-- Volcando estructura para tabla sare.director
CREATE TABLE IF NOT EXISTS `director` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_expediente` int(11) NOT NULL DEFAULT '0',
  `status` int(2) NOT NULL DEFAULT '2' COMMENT '0.- Revision. 1.- Aprobado. 2.- Denegado',
  `recibido` datetime NOT NULL,
  `visto` datetime NOT NULL,
  `resuelto` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

-- Volcando datos para la tabla sare.director: ~0 rows (aproximadamente)
DELETE FROM `director`;
/*!40000 ALTER TABLE `director` DISABLE KEYS */;
INSERT INTO `director` (`id`, `id_expediente`, `status`, `recibido`, `visto`, `resuelto`) VALUES
	(1, 9, 1, '2021-05-28 10:27:05', '2021-05-28 10:27:07', '2021-05-28 10:27:09');
/*!40000 ALTER TABLE `director` ENABLE KEYS */;

-- Volcando estructura para tabla sare.expedientes
CREATE TABLE IF NOT EXISTS `expedientes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `folio` varchar(100) COLLATE utf8_spanish2_ci NOT NULL,
  `fecha_apertura` datetime NOT NULL,
  `tipo_persona` tinyint(1) NOT NULL COMMENT '0: persona fisica; 1 persona moral',
  `id_persona` int(10) NOT NULL,
  `id_dg_establecimiento` int(10) NOT NULL,
  `id_dimensiones_establecimiento` int(10) NOT NULL,
  `etapa` varchar(50) COLLATE utf8_spanish2_ci NOT NULL DEFAULT '' COMMENT '2.- ventanilla unica. 3.- Pago. 4.- Uso de suelo. 5.- Director. 6.- Secretario',
  `resolucion` varchar(50) COLLATE utf8_spanish2_ci NOT NULL DEFAULT '0',
  `id_usuario` int(11) NOT NULL DEFAULT '0',
  `status` int(11) NOT NULL COMMENT '0.- Revision. 1.- Aprobado. 2.- Denegado',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

-- Volcando datos para la tabla sare.expedientes: ~2 rows (aproximadamente)
DELETE FROM `expedientes`;
/*!40000 ALTER TABLE `expedientes` DISABLE KEYS */;
INSERT INTO `expedientes` (`id`, `folio`, `fecha_apertura`, `tipo_persona`, `id_persona`, `id_dg_establecimiento`, `id_dimensiones_establecimiento`, `etapa`, `resolucion`, `id_usuario`, `status`) VALUES
	(8, 'SARE-2021-05-11-18-05-52', '2021-05-11 13:50:52', 0, 1, 14, 13, '5', '0', 0, 0),
	(9, 'SARE-2021-05-11-19-05-57', '2021-05-11 14:05:57', 0, 1, 15, 14, '7', '0', 0, 2),
	(10, 'SARE-2021-05-20-14-05-04', '2021-05-20 09:49:04', 0, 10, 16, 15, '2', '0', 0, 0);
/*!40000 ALTER TABLE `expedientes` ENABLE KEYS */;

-- Volcando estructura para tabla sare.pagos
CREATE TABLE IF NOT EXISTS `pagos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_expediente` int(11) NOT NULL DEFAULT '0',
  `status` int(1) NOT NULL DEFAULT '2' COMMENT '0.- Revision. 1.- Aprobado. 2.- Denegado',
  `recibido` datetime NOT NULL,
  `visto` datetime NOT NULL,
  `resuelto` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

-- Volcando datos para la tabla sare.pagos: ~0 rows (aproximadamente)
DELETE FROM `pagos`;
/*!40000 ALTER TABLE `pagos` DISABLE KEYS */;
/*!40000 ALTER TABLE `pagos` ENABLE KEYS */;

-- Volcando estructura para vista sare.pendientes
-- Creando tabla temporal para superar errores de dependencia de VIEW
CREATE TABLE `pendientes` (
	`id` INT(11) NOT NULL,
	`fecha_apertura` DATETIME NOT NULL,
	`nombre_comercial` VARCHAR(100) NULL COLLATE 'utf8_spanish2_ci',
	`domicilio` VARCHAR(376) NULL COLLATE 'utf8_spanish2_ci',
	`telefono` VARCHAR(20) NULL COLLATE 'utf8_spanish2_ci',
	`status` INT(11) NOT NULL COMMENT '0.- Revision. 1.- Aprobado. 2.- Denegado',
	`etapa` VARCHAR(50) NOT NULL COMMENT '2.- ventanilla unica. 3.- Pago. 4.- Uso de suelo. 5.- Director. 6.- Secretario' COLLATE 'utf8_spanish2_ci'
) ENGINE=MyISAM;

-- Volcando estructura para tabla sare.personas_fisicas
CREATE TABLE IF NOT EXISTS `personas_fisicas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
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
  `email` varchar(150) COLLATE utf8_spanish2_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

-- Volcando datos para la tabla sare.personas_fisicas: ~10 rows (aproximadamente)
DELETE FROM `personas_fisicas`;
/*!40000 ALTER TABLE `personas_fisicas` DISABLE KEYS */;
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
	(10, 'jose manuel', 'la misma', '123', '', 'la colonia', 'Jesus Maria', 'la misma', 20292, 'CAEM860323ES3', 'CAEM860323HASSSS00', '2147483647', 'correo@gmail.com');
/*!40000 ALTER TABLE `personas_fisicas` ENABLE KEYS */;

-- Volcando estructura para tabla sare.personas_morales
CREATE TABLE IF NOT EXISTS `personas_morales` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
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
  `email_rl` varchar(100) COLLATE utf8_spanish2_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

-- Volcando datos para la tabla sare.personas_morales: ~5 rows (aproximadamente)
DELETE FROM `personas_morales`;
/*!40000 ALTER TABLE `personas_morales` DISABLE KEYS */;
INSERT INTO `personas_morales` (`id`, `nombre_empresa`, `fecha_constitucion`, `rfc_empresa`, `telefono_empresa`, `email_empresa`, `nombre_rl`, `rfc_rl`, `curp`, `calle`, `no_exterior`, `no_interior`, `colonia`, `estado`, `municipio`, `localidad`, `cp`, `telefono_rl`, `email_rl`) VALUES
	(1, 'los tres', '2012-03-23 00:00:00', 'LTR120323ES4', '4491234567', 'contacto@lostres.com', 'jose manuel castañeda espino', 'CAEM860323', 'CAEM860323HASSSN00', 'calle', 201, '', 'colonia', 'Aguascalientes', 'Jesús María', 'jesus maria', 20900, '4491234567', 'contacto@lostres.com'),
	(2, 'los tres', '2012-03-23 00:00:00', 'LTR120323ES4', '4491234567', 'contacto@lostres.com', 'jose manuel castañeda espino', 'CAEM860323ES3', 'CAEM860323HASSSN00', 'calle', 201, '', 'colonia', 'Aguascalientes', 'Jesús María', 'jesus maria', 20900, '4491234567', 'contacto@lostres.com'),
	(3, 'los tres', '2012-03-23 00:00:00', 'LTR120323ES4', '4491234567', 'contacto@lostres.com', 'jose manuel castañeda espino', 'CAEM860323ES3', 'CAEM860323HASSSN00', 'calle', 201, '', 'colonia', 'Aguascalientes', 'Jesús María', 'jesus maria', 20900, '4491234567', 'contacto@lostres.com'),
	(5, 'juan manuelk', '2012-03-23 00:00:00', 'LTR120323ES4', '4496330125', 'contacto@lostres.com', 'jose manuel castañeda espino', 'CAEM860323ES3', 'CAEM860323HASSSN00', 'calle', 1, '', 'colonia', 'Aguascalientes', 'Jesús María', 'jesus maria', 20900, '4496330125', 'contacto@lostres.com'),
	(10, 'los tres', '2012-03-23 00:00:00', 'LTR120323ES4', '4491234567', 'contacto@lostres.com', 'jose manuel castañeda espino', 'CAEM860323ES3', 'CAEM860323HASSSN00', 'calle', 201, '', 'colonia', 'Aguascalientes', 'Jesús María', 'jesus maria', 20900, '4491234567', 'contacto@lostres.com');
/*!40000 ALTER TABLE `personas_morales` ENABLE KEYS */;

-- Volcando estructura para vista sare.resueltas
-- Creando tabla temporal para superar errores de dependencia de VIEW
CREATE TABLE `resueltas` (
	`id` INT(11) NOT NULL,
	`fecha_apertura` DATETIME NOT NULL,
	`nombre_comercial` VARCHAR(100) NULL COLLATE 'utf8_spanish2_ci',
	`domicilio` VARCHAR(376) NULL COLLATE 'utf8_spanish2_ci',
	`telefono` VARCHAR(20) NULL COLLATE 'utf8_spanish2_ci',
	`status` INT(11) NOT NULL COMMENT '0.- Revision. 1.- Aprobado. 2.- Denegado',
	`etapa` VARCHAR(50) NOT NULL COMMENT '2.- ventanilla unica. 3.- Pago. 4.- Uso de suelo. 5.- Director. 6.- Secretario' COLLATE 'utf8_spanish2_ci'
) ENGINE=MyISAM;

-- Volcando estructura para tabla sare.secretario
CREATE TABLE IF NOT EXISTS `secretario` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_expediente` int(11) NOT NULL DEFAULT '0',
  `status` int(2) NOT NULL DEFAULT '2' COMMENT '0.- Revision. 1.- Aprobado. 2.- Denegado',
  `recibido` datetime NOT NULL,
  `visto` datetime NOT NULL,
  `reselto` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

-- Volcando datos para la tabla sare.secretario: ~0 rows (aproximadamente)
DELETE FROM `secretario`;
/*!40000 ALTER TABLE `secretario` DISABLE KEYS */;
INSERT INTO `secretario` (`id`, `id_expediente`, `status`, `recibido`, `visto`, `reselto`) VALUES
	(1, 9, 1, '2021-05-28 10:47:08', '2021-05-28 10:47:10', '2021-05-28 10:47:11');
/*!40000 ALTER TABLE `secretario` ENABLE KEYS */;

-- Volcando estructura para tabla sare.suelo
CREATE TABLE IF NOT EXISTS `suelo` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_expediente` int(11) NOT NULL DEFAULT '0',
  `status` int(2) NOT NULL DEFAULT '2' COMMENT '0.- Revision. 1.- Aprobado. 2.- Denegado',
  `recibido` datetime NOT NULL,
  `visto` datetime NOT NULL,
  `resuelto` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci COMMENT='uso';

-- Volcando datos para la tabla sare.suelo: ~0 rows (aproximadamente)
DELETE FROM `suelo`;
/*!40000 ALTER TABLE `suelo` DISABLE KEYS */;
INSERT INTO `suelo` (`id`, `id_expediente`, `status`, `recibido`, `visto`, `resuelto`) VALUES
	(1, 9, 1, '2021-05-28 10:46:01', '2021-05-28 10:46:02', '2021-05-28 10:46:04');
/*!40000 ALTER TABLE `suelo` ENABLE KEYS */;

-- Volcando estructura para tabla sare.suplente
CREATE TABLE IF NOT EXISTS `suplente` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_suplente` int(11) NOT NULL DEFAULT '0',
  `status` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

-- Volcando datos para la tabla sare.suplente: ~0 rows (aproximadamente)
DELETE FROM `suplente`;
/*!40000 ALTER TABLE `suplente` DISABLE KEYS */;
INSERT INTO `suplente` (`id`, `id_suplente`, `status`) VALUES
	(1, 3, 0);
/*!40000 ALTER TABLE `suplente` ENABLE KEYS */;

-- Volcando estructura para tabla sare.tipo_usuario
CREATE TABLE IF NOT EXISTS `tipo_usuario` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tipo` varchar(50) COLLATE utf8_spanish2_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

-- Volcando datos para la tabla sare.tipo_usuario: ~0 rows (aproximadamente)
DELETE FROM `tipo_usuario`;
/*!40000 ALTER TABLE `tipo_usuario` DISABLE KEYS */;
/*!40000 ALTER TABLE `tipo_usuario` ENABLE KEYS */;

-- Volcando estructura para tabla sare.usuarios
CREATE TABLE IF NOT EXISTS `usuarios` (
  `id_usuario` int(11) NOT NULL AUTO_INCREMENT,
  `nombre_usuario` varchar(100) COLLATE utf8_spanish2_ci NOT NULL,
  `usuario` varchar(25) COLLATE utf8_spanish2_ci NOT NULL,
  `password` varchar(50) COLLATE utf8_spanish2_ci NOT NULL,
  `id_tipo_usuario` int(11) NOT NULL,
  `status` tinyblob NOT NULL,
  PRIMARY KEY (`id_usuario`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

-- Volcando datos para la tabla sare.usuarios: ~2 rows (aproximadamente)
DELETE FROM `usuarios`;
/*!40000 ALTER TABLE `usuarios` DISABLE KEYS */;
INSERT INTO `usuarios` (`id_usuario`, `nombre_usuario`, `usuario`, `password`, `id_tipo_usuario`, `status`) VALUES
	(1, 'SUPER ADMIN', 'admin', 'e10adc3949ba59abbe56e057f20f883e', 1, _binary 0x31),
	(2, 'Fernando', 'fermar', 'e10adc3949ba59abbe56e057f20f883e', 1, _binary 0x31),
	(3, 'Director SEDATUM', 'director', 'e10adc3949ba59abbe56e057f20f883e', 4, _binary 0x31);
/*!40000 ALTER TABLE `usuarios` ENABLE KEYS */;

-- Volcando estructura para tabla sare.ventanilla
CREATE TABLE IF NOT EXISTS `ventanilla` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_expediente` int(11) NOT NULL DEFAULT '0',
  `status` int(2) NOT NULL DEFAULT '2' COMMENT '0.- Revision. 1.- Aprobado. 2.- Denegado',
  `recibido` datetime NOT NULL,
  `visto` datetime NOT NULL,
  `resuelto` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

-- Volcando datos para la tabla sare.ventanilla: ~0 rows (aproximadamente)
DELETE FROM `ventanilla`;
/*!40000 ALTER TABLE `ventanilla` DISABLE KEYS */;
INSERT INTO `ventanilla` (`id`, `id_expediente`, `status`, `recibido`, `visto`, `resuelto`) VALUES
	(1, 9, 1, '2021-05-28 10:39:01', '2021-05-28 10:39:03', '2021-05-28 10:39:05');
/*!40000 ALTER TABLE `ventanilla` ENABLE KEYS */;

-- Volcando estructura para vista sare.pendientes
-- Eliminando tabla temporal y crear estructura final de VIEW
DROP TABLE IF EXISTS `pendientes`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `pendientes` AS SELECT e.id, e.fecha_apertura, dg.nombre_comercial, CONCAT(dg.calle, " ", dg.no_exterior, " ", dg.no_interior, " ", dg.colonia, " ", dg.localidad ) AS domicilio, dg.telefono, e. status, e.etapa
	FROM expedientes AS e
	LEFT JOIN dg_establecimiento AS dg ON dg.id = e.id_dg_establecimiento
WHERE e.etapa != "7" ;

-- Volcando estructura para vista sare.resueltas
-- Eliminando tabla temporal y crear estructura final de VIEW
DROP TABLE IF EXISTS `resueltas`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `resueltas` AS SELECT e.id, e.fecha_apertura, dg.nombre_comercial, CONCAT(dg.calle, " ", dg.no_exterior, " ", dg.no_interior, " ", dg.colonia, " ", dg.localidad ) AS domicilio, dg.telefono, e. status, e.etapa
	FROM expedientes AS e
	LEFT JOIN dg_establecimiento AS dg ON dg.id = e.id_dg_establecimiento
WHERE e.etapa = "7" ;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
