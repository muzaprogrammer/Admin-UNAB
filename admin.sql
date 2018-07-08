# Host: localhost  (Version 5.7.17-log)
# Date: 2018-05-06 12:11:07
# Generator: MySQL-Front 6.0  (Build 2.20)


#
# Structure for table "alumnos"
#

DROP TABLE IF EXISTS `alumnos`;
CREATE TABLE `alumnos` (
  `idalumno` int(11) NOT NULL AUTO_INCREMENT,
  `carnet` varchar(255) DEFAULT NULL,
  `nom_completo` varchar(255) DEFAULT NULL,
  `nombre` varchar(255) DEFAULT NULL,
  `apellido` varchar(255) DEFAULT NULL,
  `sexo` tinyint(3) DEFAULT NULL,
  `fecha_nac` date DEFAULT NULL,
  `tsangre` varchar(255) DEFAULT NULL,
  `dui` varchar(255) DEFAULT NULL,
  `nit` varchar(255) DEFAULT NULL,
  `departamento` int(11) DEFAULT NULL,
  `municipio` int(11) DEFAULT NULL,
  `direccion` text,
  `tel_casa` varchar(255) DEFAULT NULL,
  `tel_celular` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `compania` varchar(255) DEFAULT NULL,
  `tiposmartphone` int(11) DEFAULT NULL,
  `smartphone` int(11) DEFAULT NULL,
  `contacto_emergencia` varchar(255) DEFAULT NULL,
  `tel_contac_emergencia` varchar(255) DEFAULT NULL,
  `empresa` varchar(255) DEFAULT NULL,
  `cargo` varchar(255) DEFAULT NULL,
  `tel_trabajo` varchar(255) DEFAULT NULL,
  `dir_empresa` varchar(255) DEFAULT NULL,
  `foto` varchar(255) DEFAULT NULL,
  `fecha_creacion` date DEFAULT NULL,
  `user` varchar(255) DEFAULT NULL,
  `pass` varchar(255) DEFAULT NULL,
  `idrol` int(11) DEFAULT '2',
  `autorizar` tinyint(3) DEFAULT '0',
  `estado` tinyint(3) DEFAULT '0',
  `id_pensum` int(11) DEFAULT NULL,
  PRIMARY KEY (`idalumno`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

#
# Data for table "alumnos"
#

INSERT INTO `alumnos` VALUES (1,'2561842015','Ma qeda','Ma','qeda',1,'2010-01-01','','+626+26+','3+6262+62',8,141,'wqe','89515615','1919516','2561842015@mail.utec.edu.sv','2',1,1,'56','56156','156','65','4116','0','blue-user-icon.png','2018-05-04','2561842015','01012010',2,0,0,1);

#
# Structure for table "carreras"
#

DROP TABLE IF EXISTS `carreras`;
CREATE TABLE `carreras` (
  `idcarrera` int(11) NOT NULL AUTO_INCREMENT,
  `idfacultad` int(11) DEFAULT NULL,
  `carrera` varchar(255) DEFAULT NULL,
  `estado` tinyint(3) DEFAULT '0',
  PRIMARY KEY (`idcarrera`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

#
# Data for table "carreras"
#


#
# Structure for table "ciclo"
#

DROP TABLE IF EXISTS `ciclo`;
CREATE TABLE `ciclo` (
  `id_ciclo` int(11) NOT NULL AUTO_INCREMENT,
  `ciclo` varchar(255) DEFAULT NULL,
  `fecha_inicio` date DEFAULT NULL,
  `fecha_fin` date DEFAULT NULL,
  `estado` tinyint(3) DEFAULT '0',
  PRIMARY KEY (`id_ciclo`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

#
# Data for table "ciclo"
#

INSERT INTO `ciclo` VALUES (1,'01-2017','2017-01-01','2017-06-30',0),(2,'02-2017','2017-07-01','2017-12-30',0),(3,'01-2018','2018-01-01','2018-06-30',0),(4,'02-2018','2018-07-01','2018-12-30',1);

#
# Structure for table "companias"
#

DROP TABLE IF EXISTS `companias`;
CREATE TABLE `companias` (
  `idcompania` int(11) NOT NULL AUTO_INCREMENT,
  `compania` varchar(10) NOT NULL,
  `estado` tinyint(4) NOT NULL DEFAULT '0',
  PRIMARY KEY (`idcompania`),
  UNIQUE KEY `idcompania_UNIQUE` (`idcompania`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

#
# Data for table "companias"
#

/*!40000 ALTER TABLE `companias` DISABLE KEYS */;
INSERT INTO `companias` VALUES (1,'CLARO',0),(2,'TIGO',0),(3,'MOVISTAR',0),(4,'DIGICEL',0),(5,'RED',0),(6,'OTRO',0);
/*!40000 ALTER TABLE `companias` ENABLE KEYS */;

#
# Structure for table "datos_empresa"
#

DROP TABLE IF EXISTS `datos_empresa`;
CREATE TABLE `datos_empresa` (
  `iddatos_empresa` int(11) NOT NULL AUTO_INCREMENT,
  `nombre_empresa` varchar(55) DEFAULT NULL,
  `direccion` varchar(55) DEFAULT NULL,
  `idmunicipio` int(11) DEFAULT NULL,
  `iva` decimal(10,2) NOT NULL,
  `iva_percibido` decimal(10,2) NOT NULL,
  `logo_empresa` varchar(45) NOT NULL,
  `telefono_1` varchar(8) DEFAULT NULL,
  `telefono_2` varchar(8) DEFAULT NULL,
  `id` int(11) NOT NULL,
  `iddepartamento` int(11) DEFAULT NULL,
  PRIMARY KEY (`iddatos_empresa`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

#
# Data for table "datos_empresa"
#

/*!40000 ALTER TABLE `datos_empresa` DISABLE KEYS */;
INSERT INTO `datos_empresa` VALUES (1,'Universidad Dr. Andrés Bello','Direccion Prueba',80,0.13,0.10,'hospital_logo.jpg','2222-222','2222-222',0,5);
/*!40000 ALTER TABLE `datos_empresa` ENABLE KEYS */;

#
# Structure for table "departamentos"
#

DROP TABLE IF EXISTS `departamentos`;
CREATE TABLE `departamentos` (
  `iddepartamento` int(11) NOT NULL AUTO_INCREMENT,
  `departamento` varchar(45) NOT NULL,
  `estado` tinyint(4) NOT NULL DEFAULT '0',
  PRIMARY KEY (`iddepartamento`),
  UNIQUE KEY `idDepartamentos_UNIQUE` (`iddepartamento`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

#
# Data for table "departamentos"
#

INSERT INTO `departamentos` VALUES (1,'Ahuachapán',0),(2,'Cabañas',0),(3,'Chalatenango',0),(4,'Cuscatlán',0),(5,'La Libertad',0),(6,'La Paz',0),(7,'La Unión',0),(8,'Morazán',0),(9,'San Miguel',0),(10,'San Salvador',0),(11,'San Vicente',0),(12,'Santa Ana',0),(13,'Sonsonate',0),(14,'Usulután',0);

#
# Structure for table "detalle_pensum"
#

DROP TABLE IF EXISTS `detalle_pensum`;
CREATE TABLE `detalle_pensum` (
  `id_detalle_pensum` int(11) NOT NULL AUTO_INCREMENT,
  `id_pensum` int(11) DEFAULT NULL,
  `correlativo` int(11) DEFAULT NULL,
  `id_materia` int(11) DEFAULT NULL,
  `num_ciclo` int(11) DEFAULT NULL,
  `id_mat_requisito` int(11) DEFAULT NULL,
  `unidades_valorativas` tinyint(3) DEFAULT NULL,
  `estado` tinyint(3) DEFAULT '0',
  PRIMARY KEY (`id_detalle_pensum`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

#
# Data for table "detalle_pensum"
#


#
# Structure for table "facultades"
#

DROP TABLE IF EXISTS `facultades`;
CREATE TABLE `facultades` (
  `idfacultad` int(11) NOT NULL AUTO_INCREMENT,
  `facultad` varchar(255) DEFAULT NULL,
  `estado` tinyint(3) DEFAULT '0',
  PRIMARY KEY (`idfacultad`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

#
# Data for table "facultades"
#


#
# Structure for table "inscripciones_ciclo"
#

DROP TABLE IF EXISTS `inscripciones_ciclo`;
CREATE TABLE `inscripciones_ciclo` (
  `id_inscripcion_ciclo` int(11) NOT NULL AUTO_INCREMENT,
  `idalumno` int(11) DEFAULT NULL,
  `idciclo` int(11) DEFAULT NULL,
  `fecha_inscripcion` datetime DEFAULT NULL,
  `fecha_pago` datetime DEFAULT NULL,
  `estado` tinyint(3) DEFAULT '0',
  PRIMARY KEY (`id_inscripcion_ciclo`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

#
# Data for table "inscripciones_ciclo"
#


#
# Structure for table "inscripciones_materias"
#

DROP TABLE IF EXISTS `inscripciones_materias`;
CREATE TABLE `inscripciones_materias` (
  `id_inscripcion_materia` int(11) NOT NULL AUTO_INCREMENT,
  `id_inscripcion_ciclo` int(11) DEFAULT NULL,
  `id_seccion_materia` int(11) DEFAULT NULL,
  `estado` tinyint(3) DEFAULT NULL,
  PRIMARY KEY (`id_inscripcion_materia`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

#
# Data for table "inscripciones_materias"
#


#
# Structure for table "materias"
#

DROP TABLE IF EXISTS `materias`;
CREATE TABLE `materias` (
  `idmateria` int(11) NOT NULL AUTO_INCREMENT,
  `codigo` varchar(255) DEFAULT NULL,
  `materia` varchar(255) DEFAULT NULL,
  `estado` tinyint(3) DEFAULT '0',
  PRIMARY KEY (`idmateria`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

#
# Data for table "materias"
#


#
# Structure for table "municipios"
#

DROP TABLE IF EXISTS `municipios`;
CREATE TABLE `municipios` (
  `idmunicipio` int(11) NOT NULL AUTO_INCREMENT,
  `iddepartamento` int(11) DEFAULT NULL,
  `municipio` varchar(200) COLLATE utf8_spanish_ci DEFAULT NULL,
  `estado` tinyint(3) NOT NULL DEFAULT '0',
  PRIMARY KEY (`idmunicipio`),
  KEY `FK_municipios` (`iddepartamento`)
) ENGINE=InnoDB AUTO_INCREMENT=266 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci ROW_FORMAT=COMPACT;

#
# Data for table "municipios"
#

INSERT INTO `municipios` VALUES (1,1,'Ahuachapán',0),(2,1,'Jujutla',0),(3,1,'Atiquizaya',0),(4,1,'Concepción de Ataco',0),(5,1,'El Refugio',0),(6,1,'Guaymango',0),(7,1,'Apaneca',0),(8,1,'San Francisco Menéndez',0),(9,1,'San Lorenzo',0),(10,1,'San Pedro Puxtla',0),(11,1,'Tacuba',0),(12,1,'Turín',0),(13,2,'Cinquera',0),(14,2,'Villa Dolores',0),(15,2,'Guacotecti',0),(16,2,'Ilobasco',0),(17,2,'Jutiapa',0),(18,2,'San Isidro',0),(19,2,'Sensuntepeque',0),(20,2,'Ciudad de Tejutepeque',0),(21,2,'Victoria',0),(22,3,'Agua Caliente',0),(23,3,'Arcatao',0),(24,3,'Azacualpa',0),(25,3,'Chalatenango',0),(26,3,'Citalá',0),(27,3,'Comalapa',0),(28,3,'Concepción Quezaltepeque',0),(29,3,'Dulce Nombre de María',0),(30,3,'El Carrizal',0),(31,3,'El Paraíso',0),(32,3,'La Laguna',0),(33,3,'La Palma',0),(34,3,'La Reina',0),(35,3,'Las Vueltas',0),(36,3,'Nombre de Jesús',0),(37,3,'Nueva Concepción',0),(38,3,'Nueva Trinidad',0),(39,3,'Ojos de Agua',0),(40,3,'Potonico',0),(41,3,'San Antonio de la Cruz',0),(42,3,'San Antonio Los Ranchos',0),(43,3,'San Fernando',0),(44,3,'San Francisco Lempa',0),(45,3,'San Francisco Morazán',0),(46,3,'San Ignacio',0),(47,3,'San Isidro Labrador',0),(48,3,'San José Cancasque',0),(49,3,'San José Las Flores',0),(50,3,'San Luis del Carmen',0),(51,3,'San Miguel de Mercedes',0),(52,3,'San Rafael',0),(53,3,'Santa Rita',0),(54,3,'Tejutla',0),(55,4,'Candelaria',0),(56,4,'Cojutepeque',0),(57,4,'El Carmen',0),(58,4,'El Rosario',0),(59,4,'Monte San Juan',0),(60,4,'Oratorio de Concepción',0),(61,4,'San Bartolomé Perulapía',0),(62,4,'San Cristóbal',0),(63,4,'San José Guayabal',0),(64,4,'San Pedro Perulapán',0),(65,4,'San Rafael Cedros',0),(66,4,'San Ramón',0),(67,4,'Santa Cruz Analquito',0),(68,4,'Santa Cruz Michapa',0),(69,4,'Suchitoto',0),(70,4,'Tenancingo',0),(71,5,'Antiguo Cuscatlán',0),(72,5,'Chiltiupán',0),(73,5,'Ciudad Arce',0),(74,5,'Colón',0),(75,5,'Comasagua',0),(76,5,'Huizúcar',0),(77,5,'Jayaque',0),(78,5,'Jicalapa',0),(79,5,'La Libertad',0),(80,5,'Santa Tecla',0),(81,5,'Nuevo Cuscatlán',0),(82,5,'San Juan Opico',0),(83,5,'Quezaltepeque',0),(84,5,'Sacacoyo',0),(85,5,'San José Villanueva',0),(86,5,'San Matías',0),(87,5,'San Pablo Tacachico',0),(88,5,'Talnique',0),(89,5,'Tamanique',0),(90,5,'Teotepeque',0),(91,5,'Tepecoyo',0),(92,5,'Zaragoza',0),(93,6,'Cuyultitán',0),(94,6,'El Rosario',0),(95,6,'Jerusalén',0),(96,6,'Mercedes La Ceiba',0),(97,6,'Olocuilta',0),(98,6,'Paraíso de Osorio',0),(99,6,'San Antonio Masahuat',0),(100,6,'San Emigdio',0),(101,6,'San Francisco Chinameca',0),(102,6,'San Juan Nonualco',0),(103,6,'San Juan Talpa',0),(104,6,'San Juan Tepezontes',0),(105,6,'San Luis La Herradura',0),(106,6,'San Luis Talpa',0),(107,6,'San Miguel Tepezontes',0),(108,6,'San Pedro Masahuat',0),(109,6,'San Pedro Nonualco',0),(110,6,'San Rafael Obrajuelo',0),(111,6,'Santa María Ostuma',0),(112,6,'Santiago Nonualco',0),(113,6,'Tapalhuaca',0),(114,6,'Zacatecoluca',0),(115,7,'Anamorós',0),(116,7,'Bolívar',0),(117,7,'Concepción de Oriente',0),(118,7,'Conchagua',0),(119,7,'El Carmen',0),(120,7,'El Sauce',0),(121,7,'Intipucá',0),(122,7,'La Unión',0),(123,7,'Lislique',0),(124,7,'Meanguera del Golfo',0),(125,7,'Nueva Esparta',0),(126,7,'Pasaquina',0),(127,7,'Polorós',0),(128,7,'San Alejo',0),(129,7,'San José',0),(130,7,'Santa Rosa de Lima',0),(131,7,'Yayantique',0),(132,7,'Yucuayquín',0),(133,8,'Arambala',0),(134,8,'Cacaopera',0),(135,8,'Chilanga',0),(136,8,'Corinto',0),(137,8,'Delicias de Concepción',0),(138,8,'El Divisadero',0),(139,8,'El Rosario',0),(140,8,'Gualococti',0),(141,8,'Guatajiagua',0),(142,8,'Joateca',0),(143,8,'Jocoaitique',0),(144,8,'Jocoro',0),(145,8,'Lolotiquillo',0),(146,8,'Meanguera',0),(147,8,'Osicala',0),(148,8,'Perquín',0),(149,8,'San Carlos',0),(150,8,'San Fernando',0),(151,8,'San Francisco Gotera',0),(152,8,'San Isidro',0),(153,8,'San Simón',0),(154,8,'Sensembra',0),(155,8,'Sociedad',0),(156,8,'Torola',0),(157,8,'Yamabal',0),(158,8,'Yoloaiquín',0),(159,9,'Carolina',0),(160,9,'Chapeltique',0),(161,9,'Chinameca',0),(162,9,'Chirilagua',0),(163,9,'Ciudad Barrios',0),(164,9,'Comacarán',0),(165,9,'El Tránsito',0),(166,9,'Lolotique',0),(167,9,'Moncagua',0),(168,9,'Nueva Guadalupe',0),(169,9,'Nuevo Edén de San Juan',0),(170,9,'Quelepa',0),(171,9,'San Antonio',0),(172,9,'San Gerardo',0),(173,9,'San Jorge',0),(174,9,'San Luis de la Reina',0),(175,9,'San Miguel',0),(176,9,'San Rafael',0),(177,9,'Sesori',0),(178,9,'Uluazapa',0),(179,10,'Aguilares',0),(180,10,'Apopa',0),(181,10,'Ayutuxtepeque',0),(182,10,'Cuscatancingo',0),(183,10,'Delgado',0),(184,10,'El Paisnal',0),(185,10,'Guazapa',0),(186,10,'Ilopango',0),(187,10,'Mejicanos',0),(188,10,'Nejapa',0),(189,10,'Panchimalco',0),(190,10,'Rosario de Mora',0),(191,10,'San Marcos',0),(192,10,'San Martín',0),(193,10,'San Salvador',0),(194,10,'Santiago Texacuangos',0),(195,10,'Santo Tomás',0),(196,10,'Soyapango',0),(197,10,'Tonacatepeque',0),(198,11,'Apastepeque',0),(199,11,'Guadalupe',0),(200,11,'San Cayetano Istepeque',0),(201,11,'San Esteban Catarina',0),(202,11,'San Ildefonso',0),(203,11,'San Lorenzo',0),(204,11,'San Sebastián',0),(205,11,'Santa Clara',0),(206,11,'Santo Domingo',0),(207,11,'San Vicente',0),(208,11,'Tecoluca',0),(209,11,'Tepetitán',0),(210,11,'Verapaz',0),(211,12,'Candelaria de la Frontera',0),(212,12,'Chalchuapa',0),(213,12,'Coatepeque',0),(214,12,'El Congo',0),(215,12,'El Porvenir',0),(216,12,'Masahuat',0),(217,12,'Metapán',0),(218,12,'San Antonio Pajonal',0),(219,12,'San Sebastián Salitrillo',0),(220,12,'Santa Ana',0),(221,12,'Santa Rosa Guachipilín',0),(222,12,'Santiago de la Frontera',0),(223,12,'Texistepeque',0),(224,13,'Acajutla',0),(225,13,'Armenia',0),(226,13,'Caluco',0),(227,13,'Cuisnahuat',0),(228,13,'Izalco',0),(229,13,'Juayúa',0),(230,13,'Nahuizalco',0),(231,13,'Nahulingo',0),(232,13,'Salcoatitán',0),(233,13,'San Antonio del Monte',0),(234,13,'San Julián',0),(235,13,'Santa Catarina Masahuat',0),(236,13,'Santa Isabel Ishuatán',0),(237,13,'Santo Domingo',0),(238,13,'Sonsonate',0),(239,13,'Sonzacate',0),(240,14,'Alegría',0),(241,14,'Berlín',0),(242,14,'California',0),(243,14,'Concepción Batres',0),(244,14,'El Triunfo',0),(245,14,'Ereguayquín',0),(246,14,'Estanzuelas',0),(247,14,'Jiquilisco',0),(248,14,'Jucuapa',0),(249,14,'Jucuarán',0),(250,14,'Mercedes Umaña',0),(251,14,'Nueva Granada',0),(252,14,'Ozatlán',0),(253,14,'Puerto El Triunfo',0),(254,14,'San Agustín',0),(255,14,'San Buenaventura',0),(256,14,'San Dionisio',0),(257,14,'San Francisco Javier',0),(258,14,'Santa Elena',0),(259,14,'Santa María',0),(260,14,'Santiago de María',0),(261,14,'Tecapán',0),(262,14,'Usulután',0),(263,15,'Guatemala',0),(264,16,'Honduras',0),(265,17,'Nicaragua',0);

#
# Structure for table "notas"
#

DROP TABLE IF EXISTS `notas`;
CREATE TABLE `notas` (
  `id_nota` int(11) NOT NULL AUTO_INCREMENT,
  `id_seccion_materia` int(11) DEFAULT NULL,
  `ev1` decimal(2,2) DEFAULT '0.00',
  `ev2` decimal(2,2) DEFAULT '0.00',
  `ev3` decimal(2,2) DEFAULT '0.00',
  `ev4` decimal(2,2) DEFAULT '0.00',
  `ev5` decimal(2,2) DEFAULT '0.00',
  `prom` decimal(2,2) DEFAULT '0.00',
  `estado` tinyint(3) DEFAULT '0',
  PRIMARY KEY (`id_nota`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

#
# Data for table "notas"
#


#
# Structure for table "pensum"
#

DROP TABLE IF EXISTS `pensum`;
CREATE TABLE `pensum` (
  `id_pensum` int(11) NOT NULL AUTO_INCREMENT,
  `id_carrera` int(11) DEFAULT NULL,
  `version_pensum` varchar(255) DEFAULT NULL,
  `estado` tinyint(3) DEFAULT '0',
  PRIMARY KEY (`id_pensum`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

#
# Data for table "pensum"
#


#
# Structure for table "roles"
#

DROP TABLE IF EXISTS `roles`;
CREATE TABLE `roles` (
  `idrol` int(11) NOT NULL AUTO_INCREMENT,
  `rol` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `menu` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`idrol`)
) ENGINE=MyISAM AUTO_INCREMENT=25 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci ROW_FORMAT=DYNAMIC;

#
# Data for table "roles"
#

/*!40000 ALTER TABLE `roles` DISABLE KEYS */;
INSERT INTO `roles` VALUES (1,'Administrador','Administrador_menu.php'),(2,'Alumno','Alumno_menu.php'),(3,'Recepcion','Recepcion_menu.php'),(4,'Docente','Docente_menu.php');
/*!40000 ALTER TABLE `roles` ENABLE KEYS */;

#
# Structure for table "secciones"
#

DROP TABLE IF EXISTS `secciones`;
CREATE TABLE `secciones` (
  `id_seccion` int(11) NOT NULL AUTO_INCREMENT,
  `id_materia` int(11) DEFAULT NULL,
  `seccion` int(11) DEFAULT NULL,
  `id_ciclo` int(11) DEFAULT NULL,
  `aula` varchar(255) DEFAULT NULL,
  `cantidad_alumnos` int(11) DEFAULT NULL,
  `lunes` tinyint(3) DEFAULT '0',
  `martes` tinyint(3) DEFAULT '0',
  `miercoles` tinyint(3) DEFAULT NULL,
  `jueves` tinyint(3) DEFAULT '0',
  `viernes` tinyint(3) DEFAULT '0',
  `sabado` tinyint(3) DEFAULT '0',
  `domingo` tinyint(3) DEFAULT '0',
  `hora_desde` time DEFAULT NULL,
  `hora_hasta` time DEFAULT NULL,
  `estado` tinyint(3) DEFAULT '0',
  PRIMARY KEY (`id_seccion`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

#
# Data for table "secciones"
#


#
# Structure for table "sexo"
#

DROP TABLE IF EXISTS `sexo`;
CREATE TABLE `sexo` (
  `idsexo` int(11) NOT NULL AUTO_INCREMENT,
  `sexo` varchar(10) NOT NULL,
  `estado` tinyint(4) NOT NULL DEFAULT '0',
  PRIMARY KEY (`idsexo`),
  UNIQUE KEY `idsexo_UNIQUE` (`idsexo`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

#
# Data for table "sexo"
#

/*!40000 ALTER TABLE `sexo` DISABLE KEYS */;
INSERT INTO `sexo` VALUES (1,'HOMBRE',0),(2,'MUJER',0);
/*!40000 ALTER TABLE `sexo` ENABLE KEYS */;

#
# Structure for table "smartphones"
#

DROP TABLE IF EXISTS `smartphones`;
CREATE TABLE `smartphones` (
  `idsmartphone` int(11) NOT NULL AUTO_INCREMENT,
  `smartphone` varchar(10) NOT NULL,
  `estado` tinyint(4) NOT NULL DEFAULT '0',
  PRIMARY KEY (`idsmartphone`),
  UNIQUE KEY `idsmartphone_UNIQUE` (`idsmartphone`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

#
# Data for table "smartphones"
#

/*!40000 ALTER TABLE `smartphones` DISABLE KEYS */;
INSERT INTO `smartphones` VALUES (1,'ANDROID',0),(2,'IPHONE',0),(3,'BLACKBERRY',0),(4,'OTRO',0);
/*!40000 ALTER TABLE `smartphones` ENABLE KEYS */;

#
# Structure for table "solicitud_cambio"
#

DROP TABLE IF EXISTS `solicitud_cambio`;
CREATE TABLE `solicitud_cambio` (
  `id_solicitud` int(11) NOT NULL AUTO_INCREMENT,
  `id_inscripcion_materia` int(11) DEFAULT NULL,
  `id_seccion` int(11) DEFAULT NULL,
  `fecha_solicitud` datetime DEFAULT NULL,
  `fecha_pago` datetime DEFAULT NULL,
  `estado` tinyint(3) DEFAULT '0',
  PRIMARY KEY (`id_solicitud`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

#
# Data for table "solicitud_cambio"
#


#
# Structure for table "usuarios"
#

DROP TABLE IF EXISTS `usuarios`;
CREATE TABLE `usuarios` (
  `idusuario` int(11) NOT NULL AUTO_INCREMENT,
  `usuario` varchar(25) NOT NULL,
  `password` varchar(45) NOT NULL,
  `idrol` tinyint(4) NOT NULL,
  `nombre` varchar(55) NOT NULL,
  `dui` varchar(10) DEFAULT NULL,
  `fecha_ultimo_ingreso` date DEFAULT NULL,
  `ses_iniciado` tinyint(4) DEFAULT NULL,
  `estado` tinyint(4) NOT NULL DEFAULT '0',
  `idsucursal` tinyint(4) NOT NULL,
  `autorizar` tinyint(4) NOT NULL DEFAULT '0',
  `foto` varchar(45) NOT NULL DEFAULT 'user.png',
  PRIMARY KEY (`idusuario`),
  UNIQUE KEY `idusuario_UNIQUE` (`idusuario`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

#
# Data for table "usuarios"
#

/*!40000 ALTER TABLE `usuarios` DISABLE KEYS */;
INSERT INTO `usuarios` VALUES (1,'admin','12345',1,'Administrador',NULL,NULL,1,1,1,1,'1.png'),(2,'recepcion','1234',3,'recepcion','65161961',NULL,NULL,1,1,0,'2.png');
/*!40000 ALTER TABLE `usuarios` ENABLE KEYS */;

#
# Structure for table "vitacora"
#

DROP TABLE IF EXISTS `vitacora`;
CREATE TABLE `vitacora` (
  `idvitacora` int(11) NOT NULL AUTO_INCREMENT,
  `usuario` varchar(255) DEFAULT NULL,
  `fecha` date DEFAULT NULL,
  `hora` time NOT NULL DEFAULT '00:00:00',
  `accion` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`idvitacora`)
) ENGINE=MyISAM AUTO_INCREMENT=538 DEFAULT CHARSET=latin1 ROW_FORMAT=FIXED;

#
# Data for table "vitacora"
#

/*!40000 ALTER TABLE `vitacora` DISABLE KEYS */;
INSERT INTO `vitacora` VALUES (1,'admin','2017-09-27','10:19:05','Inició sesión.'),(2,'admin','2017-10-03','10:50:37','Inició sesión.'),(3,'admin','2017-10-09','21:01:08','Inició sesión.'),(4,'admin','2017-10-10','00:22:12','Inició sesión.'),(5,'admin','2017-10-10','12:19:54','Inició sesión.'),(6,'admin','2017-10-11','21:39:22','Inició sesión.'),(7,'admin','2017-10-11','22:43:58','Inició sesión.'),(8,'admin','2017-10-11','23:00:00','Registró en el sistema el Alumno Mario Hernandez'),(9,'admin','2017-10-11','23:01:20','Registró en el sistema el Alumno Mario Hernandez'),(10,'admin','2017-10-11','23:02:50','Registró en el sistema el Alumno 313 1321'),(11,'admin','2017-10-11','23:12:39','Inició sesión.'),(12,'admin','2017-10-11','23:42:46','Registró en el sistema el Alumno Maruo Juan'),(13,'admin','2017-10-11','23:45:39','Registró en el sistema el Alumno Mario perez'),(14,'admin','2017-10-11','23:49:01','Actualizó la foto de expediente del alumno '),(15,'admin','2017-10-11','23:50:00','Actualizó la foto de expediente del alumno '),(16,'admin','2017-10-11','23:55:06','Registró en el sistema el Alumno jUAN PEREZ'),(17,'admin','2017-10-12','00:01:48','Registró en el sistema el Alumno 561651 6165165'),(18,'admin','2017-10-12','19:25:15','Inició sesión.'),(19,'admin','2017-10-12','20:58:41','Inició sesión.'),(20,'admin','2017-10-12','20:59:09','Inició sesión.'),(21,'admin','2017-10-13','20:56:04','Inició sesión.'),(22,'admin','2017-10-13','21:28:37','Registró en el sistema el Alumno MARIO ALBERTO HERNANDEZ VASQUEZ'),(23,'admin','2017-10-13','22:45:41','Inició sesión.'),(24,'admin','2017-10-13','23:15:47','Actualizó la información general del alumno MARIO ALBERTO HERNANDEZ VASQUEZ'),(25,'admin','2017-10-13','23:17:02','Actualizó la información general del alumno MARIO ALBERTO HERNANDEZ VASQUEZ'),(26,'admin','2017-10-13','23:17:59','Actualizó la información general del alumno MARIO ALBERTO HERNANDEZ VASQUEZ'),(27,'admin','2017-10-13','23:19:19','Actualizó la información general del alumno MARIO ALBERTO HERNANDEZ VASQUEZ'),(28,'admin','2017-10-13','23:20:19','Actualizó la información general del alumno MARIO ALBERTO HERNANDEZ VASQUEZ'),(29,'admin','2017-10-13','23:21:21','Actualizó la información general del alumno MARIO ALBERTO HERNANDEZ VASQUEZ'),(30,'admin','2017-10-13','23:22:57','Registró en el sistema el Alumno juan pedro'),(31,'admin','2017-10-13','23:33:49','Dio de baja al alumno MARIO ALBERTO HERNANDEZ VASQUEZ'),(32,'admin','2017-10-13','23:33:59','Dio de baja al alumno juan pedro'),(33,'admin','2017-10-13','23:34:49','Actualizó la información general del alumno MARIO ALBERTO HERNANDEZ VASQUEZ'),(34,'admin','2017-10-13','23:37:18','Actualizó la información general del alumno juan pedro'),(35,'admin','2017-10-13','23:37:29','Dio de baja al alumno MARIO ALBERTO HERNANDEZ VASQUEZ'),(36,'admin','2017-10-13','23:37:44','Actualizó la información general del alumno MARIO ALBERTO HERNANDEZ VASQUEZ'),(37,'admin','2017-10-14','00:45:19','Dio de baja la facultad '),(38,'admin','2017-10-14','00:45:26','Dio de baja la facultad '),(39,'admin','2017-10-14','00:45:54','Dio de baja la facultad INGENIERIA'),(40,'admin','2017-10-14','00:45:57','Dio de baja la facultad CIENCIAS SOCIALES'),(41,'admin','2017-10-14','00:47:40','Activo la facultad CIENCIAS SOCIALES'),(42,'admin','2017-10-14','00:47:44','Dio de baja la facultad CIENCIAS SOCIALES'),(43,'admin','2017-10-14','00:47:47','Activo la facultad INGENIERIA'),(44,'admin','2017-10-14','00:47:50','Activo la facultad CIENCIAS SOCIALES'),(45,'admin','2017-10-14','00:48:04','Dio de baja la facultad CIENCIAS SOCIALES'),(46,'admin','2017-10-14','00:54:08','Registró en el sistema la facultad DERECHO'),(47,'admin','2017-10-14','00:54:38','Registró en el sistema la facultad PRUEBA'),(48,'admin','2017-10-14','00:54:54','Registró en el sistema la facultad PRUEBA 2'),(49,'admin','2017-10-14','01:04:34','Edito la facultad Prueba 555555'),(50,'admin','2017-10-14','01:06:02','Edito la facultad INgenieria medica'),(51,'admin','2017-10-14','01:11:14','Edito la facultad '),(52,'admin','2017-10-14','01:11:26','Edito la facultad '),(53,'admin','2017-10-14','01:12:03','Edito la facultad Prueba editar2'),(54,'admin','2017-10-14','01:12:07','Dio de baja la facultad Prueba editar2'),(55,'admin','2017-10-14','01:12:39','Registró en el sistema la facultad INGENIERIA'),(56,'admin','2017-10-14','01:12:51','Registró en el sistema la facultad CIENCIAS SOCIALES'),(57,'admin','2017-10-14','16:33:34','Inició sesión.'),(58,'admin','2017-10-15','10:16:25','Inició sesión.'),(59,'admin','2017-10-15','12:06:47','Inició sesión.'),(60,'admin','2017-10-15','14:02:00','Inició sesión.'),(61,'admin','2017-10-15','15:22:09','Registró en el sistema la carrera '),(62,'admin','2017-10-15','15:22:44','Registró en el sistema la carrera aaaaaaaaa'),(63,'admin','2017-10-15','15:33:33','Edito la carrera bbbbbbbbb'),(64,'admin','2017-10-15','15:33:41','Edito la carrera bbbbbbbbb'),(65,'admin','2017-10-15','15:38:22','Dio de baja la carrera bbbbbbbbb'),(66,'admin','2017-10-15','15:38:33','Activo la carrera bbbbbbbbb'),(67,'mario','2017-10-15','17:05:29','Inició sesión.'),(68,'mario','2017-10-15','17:33:42','Dio de baja la materia Expresion oral y escrita'),(69,'mario','2017-10-15','17:33:45','Activo la materia Expresion oral y escrita'),(70,'mario','2017-10-15','17:37:49','Registró en el sistema la materia Programacion 1'),(71,'mario','2017-10-15','17:41:39','Edito la materia Programacion 2'),(72,'mario','2017-10-15','18:12:51','Registró en el sistema el usuario recepcion'),(73,'mario','2017-10-15','18:15:05','Editó la información del usuario recepcion'),(74,'mario','2017-10-15','18:15:18','Editó la información del usuario recepcion'),(75,'mario','2017-10-15','18:36:28','Inició sesión.'),(76,'mario','2017-10-15','18:39:29','Inició sesión.'),(77,'admin','2017-10-15','18:40:38','Inició sesión.'),(78,'mario','2017-10-15','18:42:01','Inició sesión.'),(79,'mario','2017-10-15','19:11:30','Registró en el sistema el usuario 5646541'),(80,'mario','2017-10-15','19:14:35','Registró en el sistema el usuario jhvfyhuj'),(81,'mario','2017-10-15','19:18:55','Registró en el sistema el usuario 4854985'),(82,'mario','2017-10-15','19:19:17','Actualizó la foto del usuario6456'),(83,'admin','2017-10-15','19:28:55','Inició sesión.'),(84,'admin','2017-10-15','19:29:49','Actualizó la foto del usuarioAdministrador'),(85,'admin','2017-10-15','19:50:01','Actualizó la foto del usuario6456'),(86,'admin','2017-10-15','19:50:47','Actualizó la foto del usuarioAdministrador'),(87,'admin','2017-10-15','19:51:16','Actualizó la foto del usuarioMario Hernández'),(88,'admin','2017-10-15','19:53:45','Actualizó la foto del usuario6456'),(89,'admin','2017-10-15','19:54:50','Actualizó la foto del usuario6456'),(90,'admin','2017-10-15','19:55:40','Registró en el sistema el usuario 12'),(91,'admin','2017-10-15','19:55:57','Actualizó la foto del usuarioHshsh'),(92,'12','2017-10-15','19:56:40','Inició sesión.'),(93,'12','2017-10-15','19:57:40','Inició sesión.'),(94,'12','2017-10-15','19:58:10','Registró en el sistema el usuario 13'),(95,'12','2017-10-15','19:58:31','Registró en el sistema el usuario 14'),(96,'12','2017-10-15','19:59:38','Registró en el sistema el usuario 15'),(97,'15','2017-10-15','19:59:48','Inició sesión.'),(98,'admin','2017-10-15','23:40:29','Inició sesión.'),(99,'admin','2017-10-22','21:03:01','Inició sesión.'),(100,'admin','2017-10-31','20:27:00','Inició sesión.'),(101,'mario','2017-11-06','21:50:07','Inició sesión.'),(102,'mario','2017-11-06','22:15:01','Inició sesión.'),(103,'admin','2017-11-07','22:14:17','Inició sesión.'),(104,'admin','2017-11-07','22:18:35','Actualizó la foto del usuario6456'),(105,'admin','2017-11-07','22:18:47','Actualizó la foto del usuario6456'),(106,'admin','2017-11-07','22:19:08','Actualizó la foto del usuario6456'),(107,'admin','2017-11-07','22:26:32','Actualizó la foto del usuario6456'),(108,'admin','2017-11-07','22:27:22','Actualizó la foto del usuario6456'),(109,'admin','2017-11-07','22:29:05','Actualizó la foto del usuario6456'),(110,'admin','2017-11-10','19:42:47','Inició sesión.'),(111,'admin','2017-11-10','19:46:03','Registró en el sistema la seccion con id 1'),(112,'admin','2017-11-10','19:50:39','Elimino la seccion con id 0'),(113,'admin','2017-11-10','19:52:37','Dio de baja la materia ALGORITMOS I'),(114,'admin','2017-11-10','19:52:40','Activo la materia ALGORITMOS I'),(115,'admin','2017-11-10','20:05:17','Elimino la seccion con id 0'),(116,'admin','2017-11-10','20:05:22','Elimino la seccion con id 0'),(117,'admin','2017-11-10','20:06:00','Elimino la seccion con id 0'),(118,'admin','2017-11-10','20:33:58','Elimino la seccion con id 0'),(119,'admin','2017-11-10','20:43:15','Activo la seccion con id 0'),(120,'admin','2017-11-10','20:44:58','Activo la seccion con id 0'),(121,'admin','2017-11-10','20:45:53','Activo la seccion con id 0'),(122,'admin','2017-11-10','20:46:59','Activo la seccion con id 0'),(123,'admin','2017-11-10','20:47:05','Elimino la seccion con id 0'),(124,'admin','2017-11-10','20:47:12','Activo la seccion con id 0'),(125,'admin','2017-11-10','20:52:23','Registró en el sistema la seccion con id 2'),(126,'admin','2017-11-10','20:53:10','Registró en el sistema la seccion con id 3'),(127,'admin','2017-11-10','20:53:19','Elimino la seccion con id 0'),(128,'admin','2017-11-10','20:53:22','Activo la seccion con id 0'),(129,'admin','2017-11-10','20:53:52','Registró en el sistema la seccion con id 4'),(130,'admin','2017-11-10','21:45:51','Actualizo la seccion con id 3'),(131,'admin','2017-11-10','21:46:01','Actualizo la seccion con id 3'),(132,'admin','2017-11-10','21:48:41','Actualizo la seccion con id 3'),(133,'admin','2017-11-10','21:48:54','Actualizo la seccion con id 3'),(134,'admin','2017-11-10','22:29:00','Actualizó la información general del alumno MARIO ALBERTO HERNANDEZ VASQUEZ'),(135,'admin','2017-11-10','22:29:24','Actualizó la información general del alumno juan pedro'),(136,'mario','2017-11-10','22:49:50','Inició sesión.'),(137,'mario','2017-11-10','22:49:50','Inició sesión.'),(138,'mario','2017-11-10','22:51:32','Inició sesión.'),(139,'admin','2017-11-10','23:06:12','Inició sesión.'),(140,'admin','2017-11-10','23:06:12','Inició sesión.'),(141,'admin','2017-11-10','23:06:12','Inició sesión.'),(142,'admin','2017-11-10','23:06:12','Inició sesión.'),(143,'admin','2017-11-10','23:07:07','Inició sesión.'),(144,'admin','2017-11-10','23:07:07','Inició sesión.'),(145,'admin','2017-11-10','23:07:07','Inició sesión.'),(146,'admin','2017-11-10','23:07:07','Inició sesión.'),(147,'admin','2017-11-10','23:15:13','Inició sesión.'),(148,'admin','2017-11-10','23:17:32','Inició sesión.'),(149,'admin','2017-11-10','23:17:46','Inició sesión.'),(150,'2561842015','2017-11-10','23:21:04','Inició sesión.'),(151,'2561842015','2017-11-10','23:21:04','Inició sesión.'),(152,'2561842015','2017-11-10','23:21:04','Inició sesión.'),(153,'2561842015','2017-11-10','23:21:04','Inició sesión.'),(154,'2561842015','2017-11-10','23:25:32','Inició sesión.'),(155,'2561842015','2017-11-10','23:25:32','Inició sesión.'),(156,'2561842015','2017-11-10','23:25:32','Inició sesión.'),(157,'2561842015','2017-11-10','23:25:32','Inició sesión.'),(158,'admin','2017-11-10','23:29:39','Inició sesión.'),(159,'2561842015','2017-11-10','23:31:11','Inició sesión.'),(160,'2561842015','2017-11-10','23:31:11','Inició sesión.'),(161,'2561842015','2017-11-10','23:31:11','Inició sesión.'),(162,'2561842015','2017-11-10','23:31:11','Inició sesión.'),(163,'2561842015','2017-11-11','13:53:09','Inició sesión.'),(164,'2561842015','2017-11-11','13:53:09','Inició sesión.'),(165,'2561842015','2017-11-11','13:53:09','Inició sesión.'),(166,'2561842015','2017-11-11','13:53:09','Inició sesión.'),(167,'mario','2017-11-11','13:58:01','Inició sesión.'),(168,'2561842015','2017-11-11','14:11:40','Inició sesión.'),(169,'2561842015','2017-11-11','14:11:40','Inició sesión.'),(170,'2561842015','2017-11-11','14:11:40','Inició sesión.'),(171,'2561842015','2017-11-11','14:11:40','Inició sesión.'),(172,'mario','2017-11-11','14:32:44','Inició sesión.'),(173,'2561842015','2017-11-11','16:59:38','Inició sesión.'),(174,'2561842015','2017-11-11','16:59:38','Inició sesión.'),(175,'2561842015','2017-11-11','16:59:38','Inició sesión.'),(176,'2561842015','2017-11-11','16:59:38','Inició sesión.'),(177,'mario','2017-11-11','17:03:22','Inició sesión.'),(178,'2561842015','2017-11-11','17:04:12','Inició sesión.'),(179,'2561842015','2017-11-11','17:04:12','Inició sesión.'),(180,'2561842015','2017-11-11','17:04:12','Inició sesión.'),(181,'2561842015','2017-11-11','17:04:12','Inició sesión.'),(182,'2561842015','2017-11-12','10:34:50','Inició sesión.'),(183,'2561842015','2017-11-12','10:34:50','Inició sesión.'),(184,'2561842015','2017-11-12','10:34:50','Inició sesión.'),(185,'2561842015','2017-11-12','10:34:50','Inició sesión.'),(186,'2561842015','2017-11-12','10:35:06','Actualizó la información general del alumno MARIO ALBERTO HERNANDEZ VASQUEZ'),(187,'2561842015','2017-11-12','10:35:54','Actualizó la información general del alumno MARIO ALBERTO HERNANDEZ VASQUEZ'),(188,'2561842015','2017-11-12','10:36:22','Actualizó la información general del alumno MARIO ALBERTO HERNANDEZ VASQUEZ'),(189,'2561842015','2017-11-12','10:38:32','Actualizó la información general del alumno MARIO ALBERTO HERNANDEZ VASQUEZ'),(190,'mario','2017-11-12','10:59:42','Inició sesión.'),(191,'2561842015','2017-11-12','11:07:01','Inició sesión.'),(192,'2561842015','2017-11-12','11:07:01','Inició sesión.'),(193,'2561842015','2017-11-12','11:07:01','Inició sesión.'),(194,'2561842015','2017-11-12','11:07:01','Inició sesión.'),(195,'2561842015','2017-11-12','11:45:49','Se inscribio'),(196,'2561842015','2017-11-12','11:51:16','Se inscribio'),(197,'2561842015','2017-11-12','11:59:27','Se inscribio'),(198,'mario','2017-11-12','12:15:52','Inició sesión.'),(199,'admin','2017-11-12','18:06:44','Inició sesión.'),(200,'2561842015','2017-11-12','18:07:00','Inició sesión.'),(201,'2561842015','2017-11-12','18:07:00','Inició sesión.'),(202,'2561842015','2017-11-12','18:07:00','Inició sesión.'),(203,'2561842015','2017-11-12','18:07:00','Inició sesión.'),(204,'admin','2017-11-12','18:11:30','Inició sesión.'),(205,'admin','2017-11-12','18:24:09','Registró en el sistema el usuario docente1'),(206,'admin','2017-11-12','18:24:41','Actualizó la foto del usuarioRamiro Puente'),(207,'admin','2017-11-12','18:54:43','Inició sesión.'),(208,'admin','2017-11-12','18:55:15','Inició sesión.'),(209,'admin','2017-11-12','19:13:40','Registró en el sistema el pensum Pensum 2011 de la carrera Ingeniería en Sistemas y Computación'),(210,'admin','2017-11-12','19:33:24','Registró en el sistema el pensum Pensum 2012 de la carrera Ingeniería en Sistemas y Computación'),(211,'admin','2017-11-12','19:34:50','Edito el pensum Pensum 2011'),(212,'admin','2017-11-12','19:36:17','Edito el pensum Pensum 2011'),(213,'admin','2017-11-12','19:37:18','Edito el pensum Pensum 2011'),(214,'admin','2017-11-12','19:37:28','Edito el pensum Pensum 2011'),(215,'admin','2017-11-12','19:46:21','Edito la materia ALGORITMOS I'),(216,'admin','2017-11-12','19:46:46','Edito la materia MATEMATICA I'),(217,'admin','2017-11-12','19:47:16','Edito la materia ORIENTACION TECNICA DE INGENIERIA'),(218,'admin','2017-11-12','19:48:15','Edito la materia ORIENTACION TECNICA DE INGENIERIA'),(219,'admin','2017-11-12','19:48:24','Dio de baja el pensum con id 1'),(220,'admin','2017-11-12','19:48:38','Edito la materia SEMINARIO TALLER DE COMPETENCIAS'),(221,'admin','2017-11-12','19:49:10','Edito la materia BASE DE DATOS I'),(222,'admin','2017-11-12','19:49:33','Activo el pensum con id 1'),(223,'admin','2017-11-12','19:49:36','Dio de baja el pensum con id 1'),(224,'admin','2017-11-12','19:49:40','Edito la materia DIBUJO TECNICO'),(225,'admin','2017-11-12','19:49:44','Activo el pensum con id 1'),(226,'admin','2017-11-12','19:49:59','Edito la materia MATEMATICA II'),(227,'admin','2017-11-12','19:50:29','Edito la materia MATEMATICA II'),(228,'admin','2017-11-12','19:50:59','Edito la materia PROGRAMACION ORIENTADA A OBJETOS'),(229,'admin','2017-11-12','19:51:07','Dio de baja al alumno MARIO ALBERTO HERNANDEZ VASQUEZ'),(230,'admin','2017-11-12','19:51:23','Edito la materia REALIDAD NACIONAL'),(231,'admin','2017-11-12','19:51:24','Actualizó la información general del alumno MARIO ALBERTO HERNANDEZ VASQUEZ'),(232,'admin','2017-11-12','19:51:49','Edito la materia LENGUAJE UNIFICADO DE MOLDEADO (UML)'),(233,'admin','2017-11-12','19:52:09','Edito la materia FILOSOFIA'),(234,'admin','2017-11-12','19:52:43','Edito la materia FISICA I'),(235,'admin','2017-11-12','19:53:04','Edito la materia MATEMATICA III'),(236,'admin','2017-11-12','19:53:29','Edito la materia PROGRAMACION I'),(237,'admin','2017-11-12','19:53:53','Edito la materia MATEMATICA IV'),(238,'admin','2017-11-12','19:54:23','Edito la materia DIBUJO APLICADO'),(239,'admin','2017-11-12','19:54:45','Edito la materia DESAROLLO DE LA PLATAFORMA WEB'),(240,'admin','2017-11-12','19:55:16','Edito la materia FISICA II'),(241,'admin','2017-11-12','19:55:42','Edito la materia PROGRAMACION II'),(242,'admin','2017-11-12','19:56:11','Edito la materia ESTADISTICA Y PROBABILIDADES'),(243,'admin','2017-11-12','19:56:42','Edito la materia ETICA'),(244,'admin','2017-11-12','19:57:03','Edito la materia FISICA III'),(245,'admin','2017-11-12','19:57:30','Edito la materia PROGRAMACION III'),(246,'admin','2017-11-12','19:58:11','Edito la materia REDES DE DATOS I'),(247,'admin','2017-11-12','19:59:28','Edito la materia INTRODUCCION AL ANALISIS DE CIRCUITOS'),(248,'admin','2017-11-12','20:00:48','Edito la materia MATEMATICA FINANCIERA'),(249,'admin','2017-11-12','20:01:24','Edito la materia ORGANIZACION DE LAS COMPUTADORAS'),(250,'admin','2017-11-12','20:01:57','Edito la materia MATEMATICA FINANCIERA'),(251,'admin','2017-11-12','20:02:50','Edito la materia PROGRAMACION IV'),(252,'admin','2017-11-12','20:04:39','Edito la materia REDES DE DATOS II'),(253,'admin','2017-11-12','20:05:26','Edito la materia ADMINISTRACION I'),(254,'admin','2017-11-12','20:05:58','Edito la materia LENGUAJE DE MAQUINA'),(255,'admin','2017-11-12','20:07:02','Edito la materia ELECTRONICA'),(256,'admin','2017-11-12','20:07:47','Edito la materia EXPRESION ORAL Y ESCRITA DEL ESPAÑOL'),(257,'admin','2017-11-12','20:08:37','Edito la materia INGLES I'),(258,'admin','2017-11-12','20:09:20','Edito la materia ADMINISTRACION DE CENTROS DE COMPUTO'),(259,'admin','2017-11-12','20:10:07','Edito la materia SISTEMAS DIGITALES'),(260,'admin','2017-11-12','20:11:01','Edito la materia INGLES II'),(261,'admin','2017-11-12','20:12:13','Edito la materia SISTEMAS DE INFORMACION GERENCIAL'),(262,'admin','2017-11-12','20:12:40','Edito la materia ESTANDARES DE PROGRAMACION'),(263,'admin','2017-11-12','20:14:27','Edito la materia DESAROLLO DE REDES DE DATOS I'),(264,'admin','2017-11-12','20:18:30','Edito la materia SISTEMAS OPERATIVOS'),(265,'admin','2017-11-12','20:19:43','Edito la materia FORMULACION Y EVALUACION DE PROYECTOS'),(266,'admin','2017-11-12','20:21:30','Edito la materia DESAROLLO DE REDES DE DATOS I'),(267,'admin','2017-11-12','22:23:15','Registró la materia FORMULACION Y EVALUACION DE PROYECTOS en el pensum 1'),(268,'admin','2017-11-12','22:50:59','Edito el pensum con id '),(269,'admin','2017-11-12','22:51:57','Edito el pensum con id 1'),(270,'admin','2017-11-12','22:53:10','Edito el pensum con id 1'),(271,'admin','2017-11-12','23:06:04','Edito el pensum con id 1'),(272,'admin','2017-11-12','23:06:18','Edito el pensum con id 1'),(273,'admin','2017-11-12','23:10:06','Edito el pensum con id 1'),(274,'admin','2017-11-12','23:40:36','Dio de baja el pensum con id 1'),(275,'admin','2017-11-12','23:40:39','Activo el pensum con id 1'),(276,'admin','2017-11-12','23:45:51','Dio de baja la materia 6 del pensum'),(277,'admin','2017-11-12','23:45:55','Activo la materia 6 del pensum'),(278,'admin','2017-11-12','23:46:32','Dio de baja la materia 6 del pensum'),(279,'admin','2017-11-12','23:46:37','Activo la materia 6 del pensum'),(280,'admin','2017-11-13','01:13:06','Edito el pensum con id 1'),(281,'admin','2017-11-13','02:09:12','Registró la materia FISICA I en el pensum 2'),(282,'admin','2017-11-13','02:36:41','Actualizó la información general del alumno MARIO ALBERTO HERNANDEZ VASQUEZ'),(283,'admin','2017-11-13','02:40:00','Actualizó la información general del alumno juan pedro'),(284,'admin','2017-11-13','02:40:58','Actualizó la información general del alumno MARIO ALBERTO HERNANDEZ VASQUEZ'),(285,'2561842015','2017-11-13','02:47:11','Inició sesión.'),(286,'2561842015','2017-11-13','02:47:11','Inició sesión.'),(287,'2561842015','2017-11-13','02:47:11','Inició sesión.'),(288,'2561842015','2017-11-13','02:47:11','Inició sesión.'),(289,'2561842015','2017-11-13','08:33:22','Inició sesión.'),(290,'2561842015','2017-11-13','08:33:22','Inició sesión.'),(291,'2561842015','2017-11-13','08:33:22','Inició sesión.'),(292,'2561842015','2017-11-13','08:33:22','Inició sesión.'),(293,'admin','2017-11-13','08:34:25','Inició sesión.'),(294,'admin','2017-11-13','08:35:00','Registró la materia MATEMATICA I en el pensum 2'),(295,'admin','2017-11-13','09:50:43','Registró la materia MATEMATICA FINANCIERA en el pensum 2'),(296,'2561842015','2017-11-13','09:51:55','Inició sesión.'),(297,'2561842015','2017-11-13','09:51:55','Inició sesión.'),(298,'2561842015','2017-11-13','09:51:55','Inició sesión.'),(299,'2561842015','2017-11-13','09:51:55','Inició sesión.'),(300,'2561842015','2017-11-13','09:52:33','Se inscribio'),(301,'mario','2017-11-13','19:43:01','Inició sesión.'),(302,'mario','2017-11-13','19:46:54','Registró en el sistema el Alumno VICTOR ARTURO  TICAS COLOCHO'),(303,'mario','2017-11-13','19:48:19','Registró en el sistema la facultad FACULTAD DE PRUEBA'),(304,'mario','2017-11-13','19:48:27','Edito la facultad FACULTAD DE PRUEBA2'),(305,'mario','2017-11-13','19:48:32','Dio de baja la facultad FACULTAD DE PRUEBA2'),(306,'mario','2017-11-13','19:48:39','Activo la facultad FACULTAD DE PRUEBA2'),(307,'mario','2017-11-13','19:50:54','Registró en el sistema la seccion con id 5'),(308,'mario','2017-11-13','19:52:55','Registró en el sistema el usuario victor'),(309,'mario','2017-11-13','19:53:07','Actualizó la foto del usuarioVICTOR TICAS'),(310,'victor','2017-11-13','19:53:36','Inició sesión.'),(311,'2260312011','2017-11-13','19:56:39','Inició sesión.'),(312,'2260312011','2017-11-13','19:56:39','Inició sesión.'),(313,'2260312011','2017-11-13','19:56:39','Inició sesión.'),(314,'2260312011','2017-11-13','19:56:39','Inició sesión.'),(315,'2260312011','2017-11-13','19:57:44','Se inscribio'),(316,'2561842015','2017-11-13','19:58:40','Inició sesión.'),(317,'2561842015','2017-11-13','19:58:40','Inició sesión.'),(318,'2561842015','2017-11-13','19:58:40','Inició sesión.'),(319,'2561842015','2017-11-13','19:58:40','Inició sesión.'),(320,'admin','2017-11-13','20:01:59','Inició sesión.'),(321,'admin','2017-11-13','20:02:12','Actualizo la seccion con id 5'),(322,'admin','2017-11-13','20:03:31','Elimino la seccion con id 0'),(323,'admin','2017-11-13','20:03:47','Activo la seccion con id 0'),(324,'2561842015','2017-11-15','14:23:21','Inició sesión.'),(325,'2561842015','2017-11-15','14:23:21','Inició sesión.'),(326,'2561842015','2017-11-15','14:23:21','Inició sesión.'),(327,'2561842015','2017-11-15','14:23:21','Inició sesión.'),(328,'admin','2017-11-16','00:25:36','Inició sesión.'),(329,'mario','2017-11-16','20:13:35','Inició sesión.'),(330,'2561842015','2017-11-16','20:13:53','Inició sesión.'),(331,'2561842015','2017-11-16','20:13:53','Inició sesión.'),(332,'2561842015','2017-11-16','20:13:53','Inició sesión.'),(333,'2561842015','2017-11-16','20:13:53','Inició sesión.'),(334,'2561842015','2017-11-16','20:14:34','Se inscribio'),(335,'2561842015','2017-11-16','22:32:49','Se inscribio una materia'),(336,'2561842015','2017-11-16','22:33:20','Se inscribio una materia'),(337,'2561842015','2017-11-16','22:38:31','Se elimino una materia'),(338,'2561842015','2017-11-16','22:38:35','Se elimino una materia'),(339,'2561842015','2017-11-16','22:38:38','Se elimino una materia'),(340,'2561842015','2017-11-16','22:38:49','Se inscribio una materia'),(341,'mario','2017-11-16','22:40:19','Inició sesión.'),(342,'mario','2017-11-16','22:41:02','Registró en el sistema la seccion con id 6'),(343,'mario','2017-11-16','22:41:25','Registró en el sistema la seccion con id 7'),(344,'mario','2017-11-16','22:42:02','Registró en el sistema la seccion con id 8'),(345,'mario','2017-11-16','22:44:31','Registró en el sistema la seccion con id 9'),(346,'2561842015','2017-11-16','22:44:54','Se inscribio una materia'),(347,'2561842015','2017-11-16','22:44:57','Se inscribio una materia'),(348,'2561842015','2017-11-16','22:44:59','Se inscribio una materia'),(349,'2561842015','2017-11-16','22:45:02','Se inscribio una materia'),(350,'2561842015','2017-11-16','22:45:05','Se inscribio una materia'),(351,'2561842015','2017-11-16','22:45:32','Se elimino una materia'),(352,'2561842015','2017-11-16','22:45:36','Se elimino una materia'),(353,'2561842015','2017-11-16','22:45:41','Se inscribio una materia'),(354,'mario','2017-11-17','01:33:11','Inició sesión.'),(355,'2561842015','2017-11-17','01:54:33','Se realizo una solicitud de cambio de seccion'),(356,'mario','2017-11-17','01:59:29','Registró en el sistema el usuario recepcion'),(357,'recepcion','2017-11-17','02:01:51','Inició sesión.'),(358,'recepcion','2017-11-17','02:01:51','Inició sesión.'),(359,'recepcion','2017-11-17','02:06:29','Inició sesión.'),(360,'recepcion','2017-11-17','02:06:29','Inició sesión.'),(361,'2561842015','2017-11-17','02:08:38','Inició sesión.'),(362,'2561842015','2017-11-17','02:08:38','Inició sesión.'),(363,'2561842015','2017-11-17','02:08:38','Inició sesión.'),(364,'2561842015','2017-11-17','02:08:38','Inició sesión.'),(365,'recepcion','2017-11-17','02:10:12','Inició sesión.'),(366,'recepcion','2017-11-17','02:10:12','Inició sesión.'),(367,'recepcion','2017-11-17','02:39:40','Se realizo un cobro'),(368,'recepcion','2017-11-17','03:05:29','Se realizo un cobro'),(369,'2561842015','2017-11-17','03:06:12','Inició sesión.'),(370,'2561842015','2017-11-17','03:06:12','Inició sesión.'),(371,'2561842015','2017-11-17','03:06:12','Inició sesión.'),(372,'2561842015','2017-11-17','03:06:12','Inició sesión.'),(373,'2561842015','2017-11-17','03:06:45','Se realizo una solicitud de cambio de seccion'),(374,'recepcion','2017-11-17','03:07:00','Se realizo un cobro'),(375,'recepcion','2017-11-17','03:07:03','Se realizo un cobro'),(376,'2561842015','2017-11-17','03:08:17','Se realizo una solicitud de cambio de seccion'),(377,'recepcion','2017-11-17','03:08:48','Se realizo un cobro'),(378,'recepcion','2017-11-17','03:11:51','Se realizo un cobro'),(379,'2561842015','2017-11-17','03:12:37','Se realizo una solicitud de cambio de seccion'),(380,'recepcion','2017-11-17','03:12:47','Se realizo un cobro'),(381,'recepcion','2017-11-17','03:17:27','Se realizo un cobro'),(382,'recepcion','2017-11-17','03:20:41','Se realizo un cobro'),(383,'recepcion','2017-11-17','03:21:28','Se realizo un cobro'),(384,'2561842015','2017-11-17','03:25:16','Se realizo una solicitud de cambio de seccion'),(385,'2561842015','2017-11-17','03:27:17','Inició sesión.'),(386,'2561842015','2017-11-17','03:27:17','Inició sesión.'),(387,'2561842015','2017-11-17','03:27:17','Inició sesión.'),(388,'2561842015','2017-11-17','03:27:17','Inició sesión.'),(389,'2561842015','2017-11-17','03:29:04','Inició sesión.'),(390,'2561842015','2017-11-17','03:29:04','Inició sesión.'),(391,'2561842015','2017-11-17','03:29:04','Inició sesión.'),(392,'2561842015','2017-11-17','03:29:04','Inició sesión.'),(393,'2561842015','2017-11-17','03:29:36','Se realizo una solicitud de cambio de seccion'),(394,'recepcion','2017-11-17','03:29:59','Inició sesión.'),(395,'recepcion','2017-11-17','03:29:59','Inició sesión.'),(396,'recepcion','2017-11-17','03:30:14','Se realizo un cobro'),(397,'recepcion','2017-11-17','03:30:17','Se realizo un cobro'),(398,'2561842015','2017-11-17','19:19:28','Inició sesión.'),(399,'2561842015','2017-11-17','19:19:28','Inició sesión.'),(400,'2561842015','2017-11-17','19:19:28','Inició sesión.'),(401,'2561842015','2017-11-17','19:19:28','Inició sesión.'),(402,'2561842015','2017-11-17','19:21:49','Se inscribio'),(403,'2561842015','2017-11-17','19:21:54','Se inscribio una materia'),(404,'2561842015','2017-11-17','19:21:56','Se inscribio una materia'),(405,'2561842015','2017-11-17','19:22:05','Se inscribio una materia'),(406,'2561842015','2017-11-17','19:22:05','Se inscribio una materia'),(407,'2561842015','2017-11-17','19:22:20','Se inscribio una materia'),(408,'recepcion','2017-11-17','19:25:33','Inició sesión.'),(409,'recepcion','2017-11-17','19:25:33','Inició sesión.'),(410,'admin','2017-11-17','19:25:51','Inició sesión.'),(411,'recepcion','2017-11-17','19:26:01','Se realizo un cobro'),(412,'2561842015','2017-11-17','19:26:31','Inició sesión.'),(413,'2561842015','2017-11-17','19:26:31','Inició sesión.'),(414,'2561842015','2017-11-17','19:26:31','Inició sesión.'),(415,'2561842015','2017-11-17','19:26:31','Inició sesión.'),(416,'admin','2017-11-17','19:27:08','Registró en el sistema el usuario vticas'),(417,'vticas','2017-11-17','19:28:21','Inició sesión.'),(418,'2561842015','2017-11-17','19:28:26','Se realizo una solicitud de cambio de seccion'),(419,'admin','2017-11-17','19:29:15','Inició sesión.'),(420,'recepcion','2017-11-17','19:29:39','Inició sesión.'),(421,'recepcion','2017-11-17','19:29:39','Inició sesión.'),(422,'recepcion','2017-11-17','19:30:37','Se realizo un cobro'),(423,'admin','2017-11-17','19:31:47','Inició sesión.'),(424,'admin','2017-11-17','19:33:18','Registró en el sistema la materia ESTUDIO DEL TRABAJO 1'),(425,'admin','2017-11-17','19:35:28','Registró la materia ESTUDIO DEL TRABAJO 1 en el pensum 2'),(426,'vticas','2017-11-17','19:36:39','Registró en el sistema la materia OPERACIONES DE FABRICACION'),(427,'admin','2017-11-17','19:36:50','Registró en el sistema la seccion con id 10'),(428,'vticas','2017-11-17','19:38:34','Registró la materia OPERACIONES DE FABRICACION en el pensum 2'),(429,'vticas','2017-11-17','19:41:21','Registró en el sistema la seccion con id 11'),(430,'admin','2017-11-18','06:11:54','Inició sesión.'),(431,'admin','2017-11-18','06:16:16','Inició sesión.'),(432,'admin','2017-11-18','06:24:02','Registró en el sistema el Alumno Carmen Matilde Hernández Sandoval'),(433,'vticas','2017-11-18','09:05:31','Inició sesión.'),(434,'vticas','2017-11-18','09:11:07','Registró en el sistema el Alumno Francisco Antonio Palacios Rivera'),(435,'2215462013','2017-11-18','09:57:54','Inició sesión.'),(436,'2215462013','2017-11-18','09:57:54','Inició sesión.'),(437,'2215462013','2017-11-18','09:57:54','Inició sesión.'),(438,'2215462013','2017-11-18','09:57:54','Inició sesión.'),(439,'2215462013','2017-11-18','10:15:36','Se inscribio'),(440,'2215462013','2017-11-18','10:16:08','Se inscribio una materia'),(441,'admin','2017-12-04','21:56:04','Inició sesión.'),(442,'admin','2018-04-29','23:37:12','Inició sesión.'),(443,'admin','2018-04-29','23:37:35','Inició sesión.'),(444,'admin','2018-04-29','23:37:43','Inició sesión.'),(445,'recepcion','2018-04-29','23:39:15','Inició sesión.'),(446,'recepcion','2018-04-29','23:39:15','Inició sesión.'),(447,'admin','2018-04-29','23:40:00','Inició sesión.'),(448,'2561842015','2018-04-29','23:43:34','Inició sesión.'),(449,'2561842015','2018-04-29','23:43:34','Inició sesión.'),(450,'2561842015','2018-04-29','23:43:34','Inició sesión.'),(451,'2561842015','2018-04-29','23:43:34','Inició sesión.'),(452,'recepcion','2018-04-29','23:45:42','Inició sesión.'),(453,'recepcion','2018-04-29','23:45:42','Inició sesión.'),(454,'2561842015','2018-04-29','23:56:45','Inició sesión.'),(455,'2561842015','2018-04-29','23:56:45','Inició sesión.'),(456,'2561842015','2018-04-29','23:56:45','Inició sesión.'),(457,'2561842015','2018-04-29','23:56:45','Inició sesión.'),(458,'admin','2018-04-29','23:57:02','Inició sesión.'),(459,'admin','2018-04-29','23:57:09','Inició sesión.'),(460,'recepcion','2018-04-29','23:57:19','Inició sesión.'),(461,'recepcion','2018-04-29','23:57:19','Inició sesión.'),(462,'admin','2018-04-30','00:06:31','Inició sesión.'),(463,'recepcion','2018-04-30','00:06:54','Inició sesión.'),(464,'recepcion','2018-04-30','00:06:54','Inició sesión.'),(465,'2561842015','2018-04-30','00:07:07','Inició sesión.'),(466,'2561842015','2018-04-30','00:07:07','Inició sesión.'),(467,'2561842015','2018-04-30','00:07:07','Inició sesión.'),(468,'2561842015','2018-04-30','00:07:07','Inició sesión.'),(469,'admin','2018-04-30','00:27:56','Inició sesión.'),(470,'admin','2018-04-30','00:34:26','Inició sesión.'),(471,'admin','2018-04-30','18:37:37','Inició sesión.'),(472,'admin','2018-04-30','19:22:58','Dio de baja la facultad CIENCIAS SOCIALES'),(473,'admin','2018-04-30','19:23:02','Activo la facultad CIENCIAS SOCIALES'),(474,'admin','2018-04-30','19:51:24','Inició sesión.'),(475,'recepcion','2018-04-30','19:53:02','Inició sesión.'),(476,'recepcion','2018-04-30','19:53:02','Inició sesión.'),(477,'2561842015','2018-04-30','19:53:31','Inició sesión.'),(478,'2561842015','2018-04-30','19:53:31','Inició sesión.'),(479,'2561842015','2018-04-30','19:53:31','Inició sesión.'),(480,'2561842015','2018-04-30','19:53:31','Inició sesión.'),(481,'2561842015','2018-04-30','19:53:45','Se inscribio'),(482,'admin','2018-04-30','19:55:23','Inició sesión.'),(483,'admin','2018-04-30','19:56:43','Actualizó la foto del usuariorecepcion'),(484,'2561842015','2018-04-30','19:59:41','Inició sesión.'),(485,'2561842015','2018-04-30','19:59:41','Inició sesión.'),(486,'2561842015','2018-04-30','19:59:41','Inició sesión.'),(487,'2561842015','2018-04-30','19:59:41','Inició sesión.'),(488,'recepcion','2018-04-30','19:59:55','Inició sesión.'),(489,'recepcion','2018-04-30','19:59:55','Inició sesión.'),(490,'admin','2018-05-04','21:10:57','Inició sesión.'),(491,'admin','2018-05-04','21:11:38','Inició sesión.'),(492,'2561842015','2018-05-04','21:12:28','Inició sesión.'),(493,'2561842015','2018-05-04','21:12:28','Inició sesión.'),(494,'2561842015','2018-05-04','21:12:28','Inició sesión.'),(495,'2561842015','2018-05-04','21:12:28','Inició sesión.'),(496,'2561842015','2018-05-04','21:12:42','Se inscribio'),(497,'2561842015','2018-05-04','21:19:56','Se inscribio una materia'),(498,'2561842015','2018-05-04','21:20:00','Se inscribio una materia'),(499,'2561842015','2018-05-04','21:20:03','Se inscribio una materia'),(500,'2561842015','2018-05-04','21:20:06','Se inscribio una materia'),(501,'2561842015','2018-05-04','21:31:40','Se elimino una materia'),(502,'2561842015','2018-05-04','21:31:45','Se inscribio una materia'),(503,'recepcion','2018-05-04','21:33:45','Inició sesión.'),(504,'recepcion','2018-05-04','21:33:45','Inició sesión.'),(505,'recepcion','2018-05-04','21:33:50','Se realizo un cobro'),(506,'2561842015','2018-05-04','21:34:08','Inició sesión.'),(507,'2561842015','2018-05-04','21:34:08','Inició sesión.'),(508,'2561842015','2018-05-04','21:34:08','Inició sesión.'),(509,'2561842015','2018-05-04','21:34:08','Inició sesión.'),(510,'2561842015','2018-05-04','21:34:36','Se realizo una solicitud de cambio de seccion'),(511,'2561842015','2018-05-04','21:34:41','Se realizo una solicitud de cambio de seccion'),(512,'recepcion','2018-05-04','21:34:50','Inició sesión.'),(513,'recepcion','2018-05-04','21:34:50','Inició sesión.'),(514,'2561842015','2018-05-04','21:35:08','Inició sesión.'),(515,'2561842015','2018-05-04','21:35:08','Inició sesión.'),(516,'2561842015','2018-05-04','21:35:08','Inició sesión.'),(517,'2561842015','2018-05-04','21:35:08','Inició sesión.'),(518,'2561842015','2018-05-04','21:35:18','Se realizo una solicitud de cambio de seccion'),(519,'2561842015','2018-05-04','21:35:30','Inició sesión.'),(520,'2561842015','2018-05-04','21:35:30','Inició sesión.'),(521,'2561842015','2018-05-04','21:35:30','Inició sesión.'),(522,'2561842015','2018-05-04','21:35:30','Inició sesión.'),(523,'recepcion','2018-05-04','21:35:44','Inició sesión.'),(524,'recepcion','2018-05-04','21:35:44','Inició sesión.'),(525,'recepcion','2018-05-04','21:35:53','Se realizo un cobro'),(526,'recepcion','2018-05-04','21:35:55','Se realizo un cobro'),(527,'recepcion','2018-05-04','21:35:58','Se realizo un cobro'),(528,'2561842015','2018-05-04','21:36:15','Inició sesión.'),(529,'2561842015','2018-05-04','21:36:15','Inició sesión.'),(530,'2561842015','2018-05-04','21:36:15','Inició sesión.'),(531,'2561842015','2018-05-04','21:36:15','Inició sesión.'),(532,'admin','2018-05-04','21:37:47','Inició sesión.'),(533,'admin','2018-05-04','21:38:59','Registró en el sistema el Alumno Ma qeda'),(534,'2561842015','2018-05-04','21:39:15','Inició sesión.'),(535,'2561842015','2018-05-04','21:39:15','Inició sesión.'),(536,'2561842015','2018-05-04','21:39:15','Inició sesión.'),(537,'2561842015','2018-05-04','21:39:15','Inició sesión.');
/*!40000 ALTER TABLE `vitacora` ENABLE KEYS */;
