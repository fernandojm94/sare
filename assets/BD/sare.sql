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
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

-- Volcando datos para la tabla sare.dg_establecimiento: ~0 rows (aproximadamente)
DELETE FROM `dg_establecimiento`;
/*!40000 ALTER TABLE `dg_establecimiento` DISABLE KEYS */;
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

-- Volcando datos para la tabla sare.dimensiones_establecimiento: ~0 rows (aproximadamente)
DELETE FROM `dimensiones_establecimiento`;
/*!40000 ALTER TABLE `dimensiones_establecimiento` DISABLE KEYS */;
/*!40000 ALTER TABLE `dimensiones_establecimiento` ENABLE KEYS */;

-- Volcando estructura para tabla sare.director
CREATE TABLE IF NOT EXISTS `director` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_expediente` int(11) NOT NULL DEFAULT '0',
  `status` int(2) NOT NULL DEFAULT '2' COMMENT '0->rechazado 1-> aprobado 2->pendiente',
  `recibido` datetime NOT NULL,
  `visto` datetime NOT NULL,
  `resuelto` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

-- Volcando datos para la tabla sare.director: ~0 rows (aproximadamente)
DELETE FROM `director`;
/*!40000 ALTER TABLE `director` DISABLE KEYS */;
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
  `status` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

-- Volcando datos para la tabla sare.expedientes: ~0 rows (aproximadamente)
DELETE FROM `expedientes`;
/*!40000 ALTER TABLE `expedientes` DISABLE KEYS */;
/*!40000 ALTER TABLE `expedientes` ENABLE KEYS */;

-- Volcando estructura para tabla sare.personas_fisicas
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
  `telefono` varchar(15) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `email` varchar(150) COLLATE utf8_spanish2_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

-- Volcando datos para la tabla sare.personas_fisicas: ~2 rows (aproximadamente)
DELETE FROM `personas_fisicas`;
/*!40000 ALTER TABLE `personas_fisicas` DISABLE KEYS */;
INSERT INTO `personas_fisicas` (`id`, `nombre_completo`, `calle`, `no_exterior`, `no_interior`, `colonia`, `municipio`, `localidad`, `c_p`, `rfc`, `curp`, `telefono`, `email`) VALUES
	(1, 'jose manuel castañeda espino', 'la misma', '123', '', 'la colonia', 'Jesus Maria', 'la misma', 20292, 'CAEM860323ES3', 'CAEM860323HASSSS00', '2147483647', 'correo@gmail.com'),
	(2, 'jose manuel', 'la misma calle', '258', '', 'la otra colonia', 'Jesus Maria', 'cualquiera', 20920, 'CAEM860323ES3', 'CAEM860323HASSSN00', '1234567890', 'correo@email.com'),
	(3, 'Jose Manuel Castañeda Espino', 'Casa Blanca', '806', '', 'casa blanca', 'Aguascalientes', 'jesus maria', 20900, 'CAEM860323ES3', 'CAEM860323HASSSN00', '4496330125', 'jose.espino@jesusmaria.gob.mx');
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

-- Volcando datos para la tabla sare.personas_morales: ~0 rows (aproximadamente)
DELETE FROM `personas_morales`;
/*!40000 ALTER TABLE `personas_morales` DISABLE KEYS */;
/*!40000 ALTER TABLE `personas_morales` ENABLE KEYS */;

-- Volcando estructura para tabla sare.secretario
CREATE TABLE IF NOT EXISTS `secretario` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_expediente` int(11) NOT NULL DEFAULT '0',
  `status` int(2) NOT NULL DEFAULT '2' COMMENT '0->rechazado 1->aprobado 2->rechazado',
  `recibido` datetime NOT NULL,
  `visto` datetime NOT NULL,
  `reselto` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

-- Volcando datos para la tabla sare.secretario: ~0 rows (aproximadamente)
DELETE FROM `secretario`;
/*!40000 ALTER TABLE `secretario` DISABLE KEYS */;
/*!40000 ALTER TABLE `secretario` ENABLE KEYS */;

-- Volcando estructura para tabla sare.suelo
CREATE TABLE IF NOT EXISTS `suelo` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_expediente` int(11) NOT NULL DEFAULT '0',
  `status` int(2) NOT NULL DEFAULT '2' COMMENT '0->rechazado 1->aprobado 2->Pendiente',
  `recibido` datetime NOT NULL,
  `visto` datetime NOT NULL,
  `resuelto` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci COMMENT='uso';

-- Volcando datos para la tabla sare.suelo: ~0 rows (aproximadamente)
DELETE FROM `suelo`;
/*!40000 ALTER TABLE `suelo` DISABLE KEYS */;
/*!40000 ALTER TABLE `suelo` ENABLE KEYS */;

-- Volcando estructura para tabla sare.usuarios
CREATE TABLE IF NOT EXISTS `usuarios` (
  `id_usuario` int(11) NOT NULL AUTO_INCREMENT,
  `nombre_usuario` varchar(100) COLLATE utf8_spanish2_ci NOT NULL,
  `usuario` varchar(25) COLLATE utf8_spanish2_ci NOT NULL,
  `password` varchar(50) COLLATE utf8_spanish2_ci NOT NULL,
  `id_tipo_usuario` int(11) NOT NULL,
  `status` tinyblob NOT NULL,
  PRIMARY KEY (`id_usuario`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

-- Volcando datos para la tabla sare.usuarios: ~2 rows (aproximadamente)
DELETE FROM `usuarios`;
/*!40000 ALTER TABLE `usuarios` DISABLE KEYS */;
INSERT INTO `usuarios` (`id_usuario`, `nombre_usuario`, `usuario`, `password`, `id_tipo_usuario`, `status`) VALUES
	(1, 'SUPER ADMIN', 'admin', 'e10adc3949ba59abbe56e057f20f883e', 1, _binary 0x31),
	(2, 'Fernando', 'fermar', 'e10adc3949ba59abbe56e057f20f883e', 1, _binary 0x31);
/*!40000 ALTER TABLE `usuarios` ENABLE KEYS */;

-- Volcando estructura para tabla sare.ventanilla
CREATE TABLE IF NOT EXISTS `ventanilla` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_expediente` int(11) NOT NULL DEFAULT '0',
  `status` int(2) NOT NULL DEFAULT '2' COMMENT '0 -> rechazado 1 -> aprobado 2-> Pendiente',
  `recibido` datetime NOT NULL,
  `visto` datetime NOT NULL,
  `resuelto` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
CREATE VIEW pendientes AS SELECT e.id, e.fecha_apertura, dg.nombre_comercial, CONCAT(dg.calle, " ", dg.no_exterior, " ", dg.no_interior, " ", dg.colonia, " ", dg.localidad ) AS domicilio, dg.telefono, e. status
  FROM expedientes AS e
  LEFT JOIN dg_establecimiento AS dg ON dg.id = e.id_dg_establecimiento
WHERE e.status != 4 

CREATE VIEW resueltas AS SELECT e.id, e.fecha_apertura, dg.nombre_comercial, CONCAT(dg.calle, " ", dg.no_exterior, " ", dg.no_interior, " ", dg.colonia, " ", dg.localidad ) AS domicilio, dg.telefono, e. status
  FROM expedientes AS e
  LEFT JOIN dg_establecimiento AS dg ON dg.id = e.id_dg_establecimiento
WHERE e.status != 4 

-- Volcando datos para la tabla sare.ventanilla: ~0 rows (aproximadamente)
DELETE FROM `ventanilla`;
/*!40000 ALTER TABLE `ventanilla` DISABLE KEYS */;
/*!40000 ALTER TABLE `ventanilla` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
