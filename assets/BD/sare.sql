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
DROP DATABASE IF EXISTS `sare`;
CREATE DATABASE IF NOT EXISTS `sare` /*!40100 DEFAULT CHARACTER SET utf8 COLLATE utf8_spanish2_ci */;
USE `sare`;

-- Volcando estructura para tabla sare.dg_establecimiento
DROP TABLE IF EXISTS `dg_establecimiento`;
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
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

-- La exportación de datos fue deseleccionada.

-- Volcando estructura para tabla sare.dimensiones_establecimiento
DROP TABLE IF EXISTS `dimensiones_establecimiento`;
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

-- La exportación de datos fue deseleccionada.

-- Volcando estructura para tabla sare.expedientes
DROP TABLE IF EXISTS `expedientes`;
CREATE TABLE IF NOT EXISTS `expedientes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `folio` varchar(100) COLLATE utf8_spanish2_ci NOT NULL,
  `fecha_apertura` datetime NOT NULL,
  `tipo_persona` tinyint(1) NOT NULL COMMENT '0: persona fisica; 1 persona moral',
  `id_persona` int(10) NOT NULL,
  `id_dg_establecimiento` int(10) NOT NULL,
  `id_dimensiones_establecimiento` int(10) NOT NULL,
  `status` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

-- La exportación de datos fue deseleccionada.

-- Volcando estructura para tabla sare.personas_fisicas
DROP TABLE IF EXISTS `personas_fisicas`;
CREATE TABLE IF NOT EXISTS `personas_fisicas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre_completo` varchar(200) COLLATE utf8_spanish2_ci NOT NULL,
  `calle` varchar(200) COLLATE utf8_spanish2_ci NOT NULL,
  `no_exterior` varchar(10) COLLATE utf8_spanish2_ci NOT NULL,
  `no_interior` varchar(10) COLLATE utf8_spanish2_ci NOT NULL,
  `colonia` varchar(100) COLLATE utf8_spanish2_ci NOT NULL,
  `municipio` varchar(200) COLLATE utf8_spanish2_ci NOT NULL,
  `localidad` varchar(200) COLLATE utf8_spanish2_ci NOT NULL,
  `c_p` int(10) NOT NULL,
  `rfc` varchar(20) COLLATE utf8_spanish2_ci NOT NULL,
  `curp` varchar(20) COLLATE utf8_spanish2_ci NOT NULL,
  `telefono` int(15) DEFAULT NULL,
  `email` varchar(150) COLLATE utf8_spanish2_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

-- La exportación de datos fue deseleccionada.

-- Volcando estructura para tabla sare.personas_morales
DROP TABLE IF EXISTS `personas_morales`;
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
  `no_exterior` int(10) NOT NULL,
  `no_interior` int(10) NOT NULL,
  `colonia` varchar(100) COLLATE utf8_spanish2_ci NOT NULL,
  `estado` varchar(100) COLLATE utf8_spanish2_ci NOT NULL,
  `municipio` varchar(150) COLLATE utf8_spanish2_ci NOT NULL,
  `localidad` varchar(200) COLLATE utf8_spanish2_ci NOT NULL,
  `cp` int(10) NOT NULL,
  `telefono_rl` varchar(20) COLLATE utf8_spanish2_ci NOT NULL,
  `email_rl` varchar(100) COLLATE utf8_spanish2_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

-- La exportación de datos fue deseleccionada.

-- Volcando estructura para tabla sare.usuarios
DROP TABLE IF EXISTS `usuarios`;
CREATE TABLE IF NOT EXISTS `usuarios` (
  `id_usuario` int(11) NOT NULL AUTO_INCREMENT,
  `nombre_usuario` varchar(100) COLLATE utf8_spanish2_ci NOT NULL,
  `usuario` varchar(25) COLLATE utf8_spanish2_ci NOT NULL,
  `password` varchar(50) COLLATE utf8_spanish2_ci NOT NULL,
  `id_tipo_usuario` int(11) NOT NULL,
  `status` tinyint(4) DEFAULT NULL,
  PRIMARY KEY (`id_usuario`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

-- La exportación de datos fue deseleccionada.

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
