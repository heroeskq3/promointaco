/*
 Navicat Premium Data Transfer

 Source Server         : LOCAL
 Source Server Type    : MySQL
 Source Server Version : 100128
 Source Host           : localhost:3306
 Source Schema         : promointaco4

 Target Server Type    : MySQL
 Target Server Version : 100128
 File Encoding         : 65001

 Date: 03/04/2018 22:20:15
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for admin_menu
-- ----------------------------
DROP TABLE IF EXISTS `admin_menu`;
CREATE TABLE `admin_menu` (
  `Id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `Name` varchar(50) NOT NULL,
  `Tittle` varchar(255) DEFAULT NULL,
  `Description` varchar(255) DEFAULT NULL,
  `Url` varchar(255) DEFAULT NULL,
  `Icon` varchar(25) DEFAULT NULL,
  `MenuId` int(11) NOT NULL DEFAULT '0',
  `UserType` varchar(255) NOT NULL DEFAULT '0',
  `Order` int(5) NOT NULL DEFAULT '0',
  `LastUpdate` datetime DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `System` int(1) DEFAULT NULL,
  `Status` int(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`Id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=145 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of admin_menu
-- ----------------------------
BEGIN;
INSERT INTO `admin_menu` VALUES (10, 'Settings', NULL, '', '#', 'fa-gear', 0, '0', 2, '2018-03-12 22:15:53', 1, 1);
INSERT INTO `admin_menu` VALUES (13, 'Users', NULL, '', 'users.php', 'fa-user', 111, '0', 4, '2018-03-19 15:14:53', 1, 1);
INSERT INTO `admin_menu` VALUES (42, 'Menu Manager', NULL, '', 'menu.php', 'fa-puzzle-piece', 111, '0', 3, '2018-03-19 15:14:33', 1, 1);
INSERT INTO `admin_menu` VALUES (45, 'Edit Profile', NULL, '', 'profile.php', '', 10, '0', 0, '2018-03-19 15:12:26', 1, 1);
INSERT INTO `admin_menu` VALUES (46, 'Logout', NULL, '', 'logout.php', 'fa-sign-out', 0, '0', 9, '2018-02-05 21:52:28', 1, 1);
INSERT INTO `admin_menu` VALUES (55, 'Privileges', NULL, '', 'privileges.php', 'fa-unlock', 111, '0', 3, '2018-03-19 15:14:46', 1, 1);
INSERT INTO `admin_menu` VALUES (58, 'Users Info', NULL, '', 'usersdetails.php', 'fa-users', 111, '0', 0, '2018-03-19 15:15:03', 1, 1);
INSERT INTO `admin_menu` VALUES (59, 'Users Type', NULL, '', 'userstype.php', 'fa-sitemap', 111, '0', 0, '2018-03-19 15:15:16', NULL, 1);
INSERT INTO `admin_menu` VALUES (110, 'Informes', NULL, '', '#', 'fa-bar-chart-o', 0, '0', 1, '2018-03-19 17:40:56', NULL, 1);
INSERT INTO `admin_menu` VALUES (111, 'Administrador', NULL, '', '#', 'fa-cubes', 0, '0', 3, '2018-03-12 22:15:37', NULL, 1);
INSERT INTO `admin_menu` VALUES (119, 'Clientes', NULL, '', 'reports_surveycustomers.php', '', 110, '0', 0, '2018-03-29 16:44:57', NULL, 1);
INSERT INTO `admin_menu` VALUES (133, 'Icons', NULL, '', 'menu.php?action=icons', '', 111, '0', 0, '2018-03-19 15:32:50', NULL, 1);
INSERT INTO `admin_menu` VALUES (134, 'Home', NULL, '', 'index.php', 'fa-dashboard', 0, '0', 0, '2018-03-19 16:14:53', NULL, 1);
INSERT INTO `admin_menu` VALUES (137, 'Survey', NULL, '', '#', 'fa-bomb', 0, '0', 1, '2018-03-27 11:40:29', NULL, 1);
INSERT INTO `admin_menu` VALUES (138, 'Posiciones', NULL, '', 'survey_positions.php', '', 137, '0', 0, '2018-03-27 11:41:46', NULL, 1);
INSERT INTO `admin_menu` VALUES (139, 'Zonas', NULL, '', 'survey_zones.php', '', 137, '0', 0, '2018-03-27 11:42:05', NULL, 1);
INSERT INTO `admin_menu` VALUES (140, 'Locales', NULL, '', 'survey_locals.php', '', 137, '0', 0, '2018-03-27 11:42:29', NULL, 1);
INSERT INTO `admin_menu` VALUES (141, 'Asesores', NULL, '', 'survey_cares.php', '', 137, '0', 0, '2018-03-29 19:24:03', NULL, 1);
INSERT INTO `admin_menu` VALUES (142, 'Encuestas', NULL, '', 'survey_services.php', '', 137, '0', 0, '2018-03-28 10:05:18', NULL, 1);
INSERT INTO `admin_menu` VALUES (144, 'Banners', NULL, '', 'survey_banners.php', '', 137, '0', 0, '2018-03-30 09:11:12', NULL, 1);
COMMIT;

-- ----------------------------
-- Table structure for admin_privileges
-- ----------------------------
DROP TABLE IF EXISTS `admin_privileges`;
CREATE TABLE `admin_privileges` (
  `Id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `TypeId` int(11) NOT NULL,
  `MenuId` int(11) NOT NULL,
  `Add` int(1) NOT NULL DEFAULT '0',
  `Update` int(1) NOT NULL DEFAULT '0',
  `Delete` int(1) NOT NULL DEFAULT '0',
  `Grant` int(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`Id`) USING BTREE,
  UNIQUE KEY `priv` (`TypeId`,`MenuId`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=80 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of admin_privileges
-- ----------------------------
BEGIN;
INSERT INTO `admin_privileges` VALUES (79, 1, 0, 1, 1, 1, 0);
COMMIT;

-- ----------------------------
-- Table structure for admin_resources
-- ----------------------------
DROP TABLE IF EXISTS `admin_resources`;
CREATE TABLE `admin_resources` (
  `Id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `Name` varchar(50) NOT NULL,
  `Description` varchar(255) DEFAULT NULL,
  `MenuId` int(11) NOT NULL,
  `File` varchar(255) NOT NULL,
  `CreateDate` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `Order` int(5) DEFAULT NULL,
  `Status` int(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`Id`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for admin_sites
-- ----------------------------
DROP TABLE IF EXISTS `admin_sites`;
CREATE TABLE `admin_sites` (
  `Id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `ThemeId` varchar(100) NOT NULL,
  `MetaTittle` varchar(100) NOT NULL,
  `MetaDescription` varchar(255) DEFAULT NULL,
  `MetaKeywords` varchar(255) DEFAULT NULL,
  `BgColor` varchar(255) DEFAULT NULL,
  `BgImage` varchar(255) DEFAULT NULL,
  `LogoHeader` varchar(255) DEFAULT NULL,
  `LogoFooter` varchar(255) DEFAULT NULL,
  `Favicon` varchar(255) DEFAULT NULL,
  `Language` varchar(5) DEFAULT NULL,
  `Phone` varchar(100) DEFAULT NULL,
  `Email` varchar(255) DEFAULT NULL,
  `Url` varchar(255) DEFAULT NULL,
  `Status` int(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`Id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of admin_sites
-- ----------------------------
BEGIN;
INSERT INTO `admin_sites` VALUES (1, '1', 'Administration', 'Admin Page', '', '', '', '', '', '', 'en', '', '', 'admin/', 1);
INSERT INTO `admin_sites` VALUES (2, '2', 'Survey', 'Landing Page', '', '', '', '', '', '', 'en', '', 'test@test.com', 'survey.php', 1);
COMMIT;

-- ----------------------------
-- Table structure for admin_users
-- ----------------------------
DROP TABLE IF EXISTS `admin_users`;
CREATE TABLE `admin_users` (
  `Id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `UsersIndex` int(11) DEFAULT NULL,
  `UserName` varchar(25) NOT NULL,
  `Password` varchar(25) NOT NULL,
  `TypeId` int(5) NOT NULL DEFAULT '0',
  `CreateDate` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `LastSession` datetime DEFAULT NULL,
  `OwnerId` int(11) NOT NULL,
  `LastUpdate` datetime DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `Created` int(11) DEFAULT NULL,
  `Status` int(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`Id`,`UserName`) USING BTREE,
  UNIQUE KEY `UserName` (`UserName`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=43 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of admin_users
-- ----------------------------
BEGIN;
INSERT INTO `admin_users` VALUES (26, 1, 'admin', 'sk101080', 1, '2018-02-06 13:46:48', NULL, 0, '2018-02-06 17:22:23', NULL, 1);
COMMIT;

-- ----------------------------
-- Table structure for admin_usersdetails
-- ----------------------------
DROP TABLE IF EXISTS `admin_usersdetails`;
CREATE TABLE `admin_usersdetails` (
  `Id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `Identification` int(11) DEFAULT NULL,
  `FirstName` varchar(25) NOT NULL,
  `LastName` varchar(25) NOT NULL,
  `MiddleName` varchar(25) NOT NULL,
  `Company` varchar(100) DEFAULT NULL,
  `Position` varchar(100) DEFAULT NULL,
  `Phone` varchar(25) DEFAULT NULL,
  `Mobile` varchar(25) DEFAULT NULL,
  `Email` varchar(255) DEFAULT NULL,
  `Country` varchar(25) DEFAULT NULL,
  `State` varchar(25) DEFAULT NULL,
  `City` varchar(25) DEFAULT NULL,
  `Address` varchar(255) DEFAULT NULL,
  `Details` text,
  `CreateDate` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `LastUpdate` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `Responsible` varchar(25) DEFAULT NULL,
  `CustomInfo1` varchar(255) DEFAULT NULL,
  `CustomInfo2` varchar(255) DEFAULT NULL,
  `CustomInfo3` varchar(255) DEFAULT NULL,
  `CustomInfo4` varchar(255) DEFAULT NULL,
  `CustomInfo5` varchar(255) DEFAULT NULL,
  `Image` varchar(255) DEFAULT NULL,
  `SessionId` varchar(255) DEFAULT NULL,
  `Status` int(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`Id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for admin_userstype
-- ----------------------------
DROP TABLE IF EXISTS `admin_userstype`;
CREATE TABLE `admin_userstype` (
  `Id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `Name` varchar(25) NOT NULL,
  `Admin` int(1) NOT NULL DEFAULT '0',
  `Level` int(5) NOT NULL DEFAULT '0',
  `Status` int(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`Id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of admin_userstype
-- ----------------------------
BEGIN;
INSERT INTO `admin_userstype` VALUES (1, 'Admin', 1, 1, 1);
INSERT INTO `admin_userstype` VALUES (2, 'Supervisor', 1, 2, 1);
INSERT INTO `admin_userstype` VALUES (3, 'Agente', 0, 3, 1);
COMMIT;

-- ----------------------------
-- Table structure for empresas
-- ----------------------------
DROP TABLE IF EXISTS `empresas`;
CREATE TABLE `empresas` (
  `EMPRESA` varchar(255) DEFAULT NULL,
  `CONTACTO` varchar(255) DEFAULT NULL,
  `CORREO` varchar(255) DEFAULT NULL,
  `TELEFONO` varchar(255) DEFAULT NULL,
  `CATEGORIA` varchar(255) DEFAULT NULL,
  `UBICACIÓN` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of empresas
-- ----------------------------
BEGIN;
INSERT INTO `empresas` VALUES ('ABB SOCIEDAD ANONIMA', 'SILVIA CALVO', 'sylvia.calvo@pa.abb.com', '2288-5484', 'A', 'San Jose');
INSERT INTO `empresas` VALUES ('ACEROS ABONOS AGRO', 'ESTEBAN CAMPOS', 'evives@abonosagro.com', '22129367', 'A', 'Alajuela');
INSERT INTO `empresas` VALUES ('CORPORACION RAYO DE LUZ', 'FRANCELLA MORERA BOGANTES', 'fmorera@frangus.com', '22652626', 'A', 'San Jose');
INSERT INTO `empresas` VALUES ('DISTRIBUIDORA LARCE', 'ROBERTO LUIS ARCE HERNANDEZ', 'rarce@dilarce.com', '22211100', 'A', 'Cartago');
INSERT INTO `empresas` VALUES ('SERVICIOS SATELITALES HJ VEGA', 'JAVIER EDUARDO VEGA CHACON', 'inshjvega@gmail.com', '2218 1443', 'A', 'San Jose');
INSERT INTO `empresas` VALUES ('AGROQUIMICA INDUSTRIAL RIMAC', 'LUIS FERNANDO ALVARADO TORRES', 'falvarado@rimacsa.com', '25720774', 'A', 'San Jose');
INSERT INTO `empresas` VALUES ('TRANSPORTES DEL ATLANTICO CARIBEÑO', 'CARLOS ENRIQUE LOPEZ SOLANO', 'rhumanos@tracasa.com', '27687232', 'A', 'San Jose');
INSERT INTO `empresas` VALUES ('COOPEMADEREROS', 'ARACELLY VARGAS CALDERÓN', 'info@coopemadereros.com', '27714438', 'A', 'San Jose');
INSERT INTO `empresas` VALUES ('OBASHE (EXOTIC FLOWERS)', 'ANA LUCRECIA ARIAS OBALDIA', 'ana@delrioexoticflowers.com', '22652513', 'A', 'San Jose');
INSERT INTO `empresas` VALUES ('INVERSIONES CONVAL SA', 'LOU VANZKY GUTHRIE BENAVIDES', 'lguthrie@jsarquitectos.com', '85351579', 'A', 'Alajuela');
INSERT INTO `empresas` VALUES ('SEGURIDAD ORION', 'MICHAEL ALBERTO BALTODANO MARTINEZ Y ALEXANDER VARGAS CHAVEZ', 'michael.baltodano@seguridadorión.com', '40017958', 'A', 'Alajuela');
INSERT INTO `empresas` VALUES ('INVERSIONES SAMO DEL OESTE', 'LUIS FERNANDO MONTES ARIAS', 'gasolinerahnosmontes@ice.co.cr', '22826230', 'A', 'San Jose');
INSERT INTO `empresas` VALUES ('IMPORTACIONES DEA INC', 'JUAN DIEGO NARANJO CASTAÑO', 'asistenteadministrativa@multiplaycr.com', '22481656', 'A', 'San Jose');
INSERT INTO `empresas` VALUES ('POAS RENTA CARRO', 'MERCIADES CAMPOS MIRANDA', 'avillalobos@poasrentacar.com', '24426178', 'A', 'San Jose');
INSERT INTO `empresas` VALUES ('UNIVERSAL MUSIC DE COSTA RICA', 'HAROLD CHAVEZ SOTO', 'harold.chaves@umusic.com', '22812430', 'A', 'San Jose');
INSERT INTO `empresas` VALUES ('FAMOSO SOCIEDAD ANONIMA', 'WILLIAM GILBERTO MACHADO SOLANO', 'machadowill17@gmail.com', '25312282', 'A', 'San Jose');
INSERT INTO `empresas` VALUES ('ALIMENTOS PRO SALUD', 'JUAN ALEJANDRO MARÍN AZOFEIFA', 'eric.sanchez@prosalud.com', '2504-7676 ext 7685 Karen Montoya', 'A', 'San Jose');
INSERT INTO `empresas` VALUES ('GAROLY BRANDS', 'RODRIGO ENRIQUE SEGURA LEIVA', 'io@garoly,com', '22862471', 'A', 'San Jose');
INSERT INTO `empresas` VALUES ('IDEAR ELECTRONICA', 'REBECA CORELLA RODRIGUEZ', 'rcorellar@yahoo.com', '40334233', 'A', 'Cartago');
INSERT INTO `empresas` VALUES ('SERVISECURITY', 'RAUL EDUARDO PAZOS FIGUEROA', 'ellis.machoro@gmail.com​', '89689559', 'A', 'San Jose');
INSERT INTO `empresas` VALUES ('ARGUES LIMITADA', 'EDUARDO ARGUEDAS CHAVERRI', 'larpeche@arguescr.com', '25891315', 'A', 'Cartago');
INSERT INTO `empresas` VALUES ('TITZIAN SOCIEDAD ANÓNIMA', 'FABRIZIO FRANCISCO COTO COTO', 'fabriziocoto@titzian.com', '22237753', 'A', 'San Jose');
INSERT INTO `empresas` VALUES ('UNIVERSIDAD HISPANOAMERICANA', 'ANGEL MARIN ESPINOZA', 'ralvarado@uh.ac.cr', '22419090', 'A', 'San Jose');
INSERT INTO `empresas` VALUES ('AGENCIA DATSUN', 'SAMUEL ALZENMAN PINCHANSKI', 'veraguille@gmail.com', '25497035', 'A', 'San Jose');
INSERT INTO `empresas` VALUES ('ALIMENTOS PROSALUD', 'JUAN ALEJANDRO MARÍN AZOFEIFA', 'eric.sanchez@prosalud.com', '25047676', 'A', 'Puntarenas');
INSERT INTO `empresas` VALUES ('CORPORACION ONIX COSTA RICA', 'RAUL EMILIO ACOSTA ARIAS', 'jacosta@inix.co.cr', '22906649', 'A', 'San Jose');
INSERT INTO `empresas` VALUES ('SOLUCIONES NEAN', 'GLORIA MARINA MATA ALVAREZ', 'david.barahona@neansa.com', '22909959', 'A', 'Alajuela');
INSERT INTO `empresas` VALUES ('Agencia Aduanal y Consolidadora de Carga AIRM', 'America Rivera Mora', 'americarivera2009@hotmail.com', '8863 0915', 'A', 'San Jose');
INSERT INTO `empresas` VALUES ('FRAVICO PROMOCIONAL SOCIEDAD ANONIMA', 'FRANCISCO JAVIER RODRIGUEZ HURTADA', 'fjavier@fravicopromocional.com', '40323838', 'A', 'Puntarenas');
INSERT INTO `empresas` VALUES ('SIBO ENERGY SOCIEDAD ANONIMA', 'EDGAR ALBERTO UGALDE SOLEY', 'eugalde@siboenergy.com', '40001510', 'A', 'Alajuela');
INSERT INTO `empresas` VALUES ('YORLENI MARIA ROJAS ROJAS ( EMBUTIDOS VALENCIANO)', 'YORLENI MARIA ROJAS ROJAS', 'anacruz@valencianocrcr.com', '22683334', 'A', 'Alajuela');
INSERT INTO `empresas` VALUES ('FABRICA DE MALLA CICLON SOCIEDAD ANONIMA', 'DANIEL JOSUE SEGREDA JOHANNING', 'contabilidad@mallaciclon.com', '2239-6383', 'A', 'San Jose');
INSERT INTO `empresas` VALUES ('BIOTRATAR TECNOLOGÌAS DE AGUAS', 'LUIS DIEGO CHACON PEREZ', 'dchacon@biotratarcr.com', '84440740', 'A', 'San Jose');
INSERT INTO `empresas` VALUES ('DST CENTER', 'MAURICIO LEON', 'tallerrme@hotmail.com', '24304633', 'B', 'San Jose');
INSERT INTO `empresas` VALUES ('TOSTADORA EL DORADO', 'HERSEL OROZCO ALPIZAR.', 'alexanderacuna@cafedorado.com', '2247-7906', 'B', 'San Jose');
INSERT INTO `empresas` VALUES ('DEMSA', 'CARLOS ALBERTO MURILLO HERRERA.', 'gabriela.murillo@demsacr.com', '24422600', 'B', 'San Jose');
INSERT INTO `empresas` VALUES ('ELDICA', 'DIRK BAETHGE PETERS', 'eliza.alvarado@eldicacr.com', '22378563', 'B', 'San Jose');
INSERT INTO `empresas` VALUES ('MADERAS DE BOLLEN', 'ENRICO CARLO GIORDANO SESIA', 'karlasanchezcalderon@gmail.com', '22113904', 'B', 'Cartago');
INSERT INTO `empresas` VALUES ('ALMACEN FISCAL SANDAL', 'RICARDO ARQUEDAS SOLERA', 'cchacon@sandal.co.cr', '22639811', 'B', 'San Jose');
INSERT INTO `empresas` VALUES ('UNIHOSPI', 'ANICETO CAMPOS ESTRADA', 'acampos@iberoamerica.cr', '22386073', 'B', 'San Jose');
INSERT INTO `empresas` VALUES ('EMPAQUE BELEN', 'JUAN FRANCISCO GONZALEZ NAVARRO', 'jgonzalez@empaquesbelen.com', '24385119', 'B', 'Alajuela');
INSERT INTO `empresas` VALUES ('ROSALA SOCIEDAD ANONIMA / FERRETERIAS EL MAR', 'VICTOR JULIO NAVARRO ROJAS', 'julionavarro@ferreteriaelmarsanpedro.com', '223464 64', 'B', 'San Jose');
INSERT INTO `empresas` VALUES ('DISTRIBUIDORA HERMANOS FUENTES', 'DAVID ADONAY FUENTES FLORES', 'hermanosfuentes@hotmail.com', '25373610', 'B', 'San Jose');
INSERT INTO `empresas` VALUES ('PMI CAPITULO DE COSTA RICA', 'EDGAR CARLOS DE JESUS VAZQUEZ RETANA', 'asistente@pmicr.org', '2224-8883', 'B', 'San Jose');
INSERT INTO `empresas` VALUES ('OLD WEST SA', 'ERNESTO MOSTES GUILLÉN', 'oldwestgrillcr.gmail.com', '2282 9210', 'B', 'San Jose');
INSERT INTO `empresas` VALUES ('PROPIAUTO UNO DEL NORTE / SOLID CAR RENT', 'FRANCISCO JAVIER HERNANDEZ GONZALEZ', 'lmontalto@solidcarrental.com', '24426000', 'B', 'San Jose');
INSERT INTO `empresas` VALUES ('SUPER BATERIAS', 'OLMAN RICARDO CESPEDES ROJAS', 'esolera@superbaterias.com', '22195454', 'B', 'San Jose');
INSERT INTO `empresas` VALUES ('SISTEMA EMPRESARIAL PSE SA', 'SANDY BERMUDEZ AGUILAR', 'angeles.seguridad@hotmail.com', '22511993', 'B', 'San Jose');
INSERT INTO `empresas` VALUES ('MEDI KOSTAX SOCIEDAD ANONIMA', 'PRISCILLA MARIA ALFARO CRUZ', 'palfaro.cr@kxmedical.com', '22931696', 'B', 'San Jose');
INSERT INTO `empresas` VALUES ('TRACTOMOTRIZ', 'HERNAN ARTURO MONGE GAMEZ', 'malopez@tractomotriz.com', '25492522', 'B', 'Alajuela');
INSERT INTO `empresas` VALUES ('PAFRAVE', 'PABLO FRANCIS VEGA', 'pfrancis@pafrave.com', '22221356', 'B', 'San Jose');
INSERT INTO `empresas` VALUES ('AQUASERVICE', 'ERICK GERARDO PORRAS ARTAVIA', 'delanaciente@gmail.com', '24876878', 'B', 'Alajuela');
INSERT INTO `empresas` VALUES ('RODRIGO SALAS SALAZAR', 'RODRIGO SALAS SALAZAR', 'lizandra00@hotmail.com', '88115775', 'B', 'Alajuela');
INSERT INTO `empresas` VALUES ('PROVEERDE INTERNACIONAL', 'JILMA CECILIA RAMIREZ UMAÑA', 'viveros.proverde@gmail.com', '22825600', 'B', 'San Jose');
INSERT INTO `empresas` VALUES ('TROPIFOODS', 'EDGAR ANTONIO MEDINA LUMBI', 'emedinam@tropifoods.com', '22931789', 'B', 'San Jose');
INSERT INTO `empresas` VALUES ('DESACAFÉ', 'LUIS FERNANDO CASTILLO CARPIO', 'mcastillo@desacafe.com', '40103737', 'B', 'San Jose');
INSERT INTO `empresas` VALUES ('FRAVICO PROMOCIONAL', 'FRANCISCO JAVIER RODRIGUEZ HURTADA', 'fjavier@fravicopromocional.com', '40323838', 'B', 'San Jose');
INSERT INTO `empresas` VALUES ('PROVEEDOR INTEGRAL DE PRECIOS CENTROAMERICA', 'EDUARDO RODRIGUEZ DEL PASO', 'nzambrana@piplatam.cr', '22047005', 'B', 'San Jose');
INSERT INTO `empresas` VALUES ('TRANSPORTES JOKEVISION', 'JESUS MARIA QUESADA ARROYO', 'rquesada@cosrticavision.net', '40525678', 'B', 'San Jose');
INSERT INTO `empresas` VALUES ('VETERINARIAN DEVELOPMENT', 'PEDRO JULIO GOMEZ VILLAVICENCIO', 'drgomez@gmail.com', '26642424', 'B', 'San Jose');
INSERT INTO `empresas` VALUES ('FERREMETRO', 'JUAN CARLOS HERNANDEZ OSPINA', 'ferremetrocr@gmail.com', '22216604', 'B', 'Cartago');
INSERT INTO `empresas` VALUES ('AGENCIA DATSUN SOCIEDAD ANONIMA', 'MARIA VIRGINIA SALAS SALAS', 'alejandro.quiros@grupodanissa.com', '25497035', 'B', 'San Jose');
INSERT INTO `empresas` VALUES ('FOOD MONGERS SOCIEDAD DE RESPONSABILIDAD LIMITADA', 'ALVARO JOSE MONGE CAMPOS', 'contabilidad@foodmongers.cr', '87290131', 'B', 'San Jose');
INSERT INTO `empresas` VALUES ('IC TRAVELGLOBAL GROUP', 'CHRISTIAN CASTRO PERAZA', 'itsupport@icglobalgroup.com', '22047200', 'B', 'Alajuela');
INSERT INTO `empresas` VALUES ('TRAVEL ACE INTERNACIONAL', 'JUAN JOSE PORRAS JIMENEZ', 'jporras@travelacecr.com', '83803082', 'B', 'Alajuela');
INSERT INTO `empresas` VALUES ('SIKA PRODUCTOS PARA LA CONSTRUCCION', 'MARIO CUBILLO', 'soto.isel@cr.sika.com', '22933870', 'C', 'Cartago');
INSERT INTO `empresas` VALUES ('CIRCUITO CINCO SOCIEDAD ANONIMA', 'IGNACIO DEL RIO FABRES', 'laura.vasquez@circuitocinco.com', '22936923', 'C', 'Cartago');
INSERT INTO `empresas` VALUES ('DICOFERSA', 'FREDDY ADRIAN SCHELBERT MONTILLA.', 'dicofersa@gmail.com', '24303963', 'C', 'Cartago');
INSERT INTO `empresas` VALUES ('GEVISA ARTES PLASTICAS', 'GEVISA ARTES GRAFICAS', 'hdormond@grupogevisa.com', '22367043', 'C', 'San Jose');
INSERT INTO `empresas` VALUES ('PROVEDORA DE SEGURIDAD INDUSTRIAL HA PROSISA', 'HUGO GERARDO AVALOS BENAVIDES', 'lavalos@prosisa.co.cr', '25606064', 'C', 'San Jose');
INSERT INTO `empresas` VALUES ('NATURE LOVERS (SANITE)', 'RODOLFO CALDERON ARAYA', 'info@sanitecostarica.com', '22141975', 'C', 'Alajuela');
INSERT INTO `empresas` VALUES ('UPALA AGRICOLA SA', 'ALFREDO VOLIO PEREZ', 'gherrera@upalagricola.com', '24800100', 'C', 'San Jose');
INSERT INTO `empresas` VALUES ('ECOSEAL', 'JOSE EDUARDO BALTODANO CASTRO', 'jbaltodano@ecoseal.ws', '24878585', 'C', 'Alajuela');
INSERT INTO `empresas` VALUES ('SHALOM INTERNACIONAL SEA LA PAZ', 'ARCADIO ALEXANDER CHAVARRIA THOMAS', 'josueisrael2014@hotmail.com', '22 53 55 33', 'C', 'Alajuela');
INSERT INTO `empresas` VALUES ('SERVINYEC - FABODIESEL / INTERPLAZA', 'FABIAN GILBERTO BONILLA BONILLA', 'fabian.bonilla@fabodiesel.com', '22361960', 'C', 'San Jose');
INSERT INTO `empresas` VALUES ('DISTRIBUIDORA VARGAS PATIÑO', 'FREDDY ALBERTO VARGAS PATIÑO', 'fvargas@disvapacr.com', '22330795', 'C', 'Alajuela');
INSERT INTO `empresas` VALUES ('CLINICA DENTAL CARLOS SEVILLA MONTERO', 'CARLOS CEVILLA MONTERO', '-', '-', 'C', 'Alajuela');
INSERT INTO `empresas` VALUES ('TROPIFOODS', 'EDGAR ANTONIO MEDINA LUMBI', 'emedinam@tropifoods.com', '22931789', 'C', 'Alajuela');
INSERT INTO `empresas` VALUES ('VEN RESANSIL SA', 'OSCAR ALONSO HERNANDEZ VARGAS', 'j.vargas@resansil.com', '22037912', 'C', 'San Jose');
INSERT INTO `empresas` VALUES ('ASA SECURITY SA', 'GUSTAVO HERNANDEZ', 'ghernandez@asaseguridad.com', '60275244', 'C', 'San Jose');
INSERT INTO `empresas` VALUES ('ADA TRENDY SOCIEDAD ANONIMA', 'JONATHAN STWARD LEITON MORA', 'jleitonm@hotmail.com', '87290131', 'C', 'Cartago');
INSERT INTO `empresas` VALUES ('CORPORACION BIOMEDICA COBISA', 'MARIA MAYELA MADRIGAL MIRANDA', 'mmadrigal@cobisacr.com ​', '25912063', 'C', 'San Jose');
INSERT INTO `empresas` VALUES ('PORCINA CERHIMA LIMITADA', 'MELZHIAN DIAZ', 'crjsanchez@gmail.com', '24302022', 'C', 'Alajuela');
INSERT INTO `empresas` VALUES ('AUTORREPUESTOS ALFARO', 'ADOLFO ENRIQUE ALFARO CARVAJAL', 'aalfaro@ice.co.cr', '22588282', 'C', 'San Jose');
INSERT INTO `empresas` VALUES ('GRUPO PRO', 'KWAN KWOK CHING', 'k.kwok@grupoprocr.com', '22506554', 'C', 'San Jose');
INSERT INTO `empresas` VALUES ('ZMW VALVERDE ( FLAMIMGO )', 'WILSON GERARDO VALVERDE MOYA', 'administracion@hoteldepasoflamingo.com', '47009274', 'C', 'San Jose');
INSERT INTO `empresas` VALUES ('ARGUES', 'EDUARDO ARGUEDAS CHAVERRI', 'larpeche@arguescr.com', '25891317', 'C', 'Cartago');
INSERT INTO `empresas` VALUES ('ELECTROMECANICACR B. F.', 'LUIS DIEGO BUSTAMANTE FERNANDEZ', 'proyectos@electromecanicacr.com', '22733553', 'C', 'Alajuela');
INSERT INTO `empresas` VALUES ('HAPAG-LLOYD COSTA RICA', 'CHRISTIAN MATZEN BONILLA', 'christian.matzen@hlag.com', '25195940', 'C', 'San Jose');
INSERT INTO `empresas` VALUES ('COMPUTRADING COSTA RICA', 'IVO CAGNONE', 'ivo.cagnone@computrading.net', '83294761', 'C', 'Cartago');
INSERT INTO `empresas` VALUES ('UNIVERSAL MUSICA DE CENTROAMERICA', 'HAROLD CHAVEZ SOTO', 'harold.chaves@umusic.com', '88229085', 'C', 'San Jose');
INSERT INTO `empresas` VALUES ('APOTEX COSTA RICA', 'SERGIO JOSE SOLANO MONTENEGRO', 'lvargas@apotex.com', '22831929', 'C', 'San Jose');
INSERT INTO `empresas` VALUES ('MAYOREO EL RAFAELEÑO', 'RAFAEL ALVARO VARGAS LARA', 'rarce08@hotmail.es', '22629808', 'C', 'Cartago');
INSERT INTO `empresas` VALUES ('Distribuidora Rodriguez Villalobos S.A.', 'Wilson Alexis Rodriguez Arias', 'Wilson.ra@hotmail.com', '27185302', 'C', 'Cartago');
INSERT INTO `empresas` VALUES ('ALQUIVAM SOCIEDAD ANONIMA', 'MERCIADES CAMPOS MIRANDA', 'avillalobos@poasrentacar.com', '24426178', 'C', 'Cartago');
INSERT INTO `empresas` VALUES ('IMESA SISTEMAS SOCIEDAD ANONIMA', 'RODOLFO JIMENEZ SOLANO', 'ronald.barrantes@imesasistemas.com', '22727536', 'C', 'San Jose');
INSERT INTO `empresas` VALUES ('INTERSOL INTERMODAL SOLUTIONS LIMITADA', 'JUAN CARLOS HERNANDEZ MENA', 'jchernandez@icscostarica.com', NULL, 'C', 'Cartago');
INSERT INTO `empresas` VALUES ('COMPRAS DIRECTAS (JETBOX)', 'ROGER CAMPOS', 'roger.campos@jetbox.com', '25283715', 'D', 'San Jose');
INSERT INTO `empresas` VALUES ('CONECLI INTERNACIONAL', 'GUILLERMO GUTIERREZ GRANADOS', 'cmartinez@ecusjo.eculine.net', '22200009', 'D', 'San Jose');
INSERT INTO `empresas` VALUES ('DIMPACK', 'CARLOS ANTONIO VAZQUEZ DAY', 'carlos@dimpack.net', '2241-0294', 'D', 'Puntarenas');
INSERT INTO `empresas` VALUES ('CORPORACIÓN COMERCIAL SIGMA INTERNACIONAL', 'LUIS FERNANDO GUERRA SUAREZ', 'lmguerra@gruposigma.net', '22347474', 'D', 'San Jose');
INSERT INTO `empresas` VALUES ('RCV INTERMODAL LOGISTICA', 'RICARDO CHINCHILLA VARGAS', 'richiva@rcvint.com', '22330003', 'D', 'Alajuela');
INSERT INTO `empresas` VALUES ('SANTILLANA SA', 'LUIS ALONSO GONZALEZ VAZQUEZ', 'kramirez@santillana.com', '22204242', 'D', 'San Jose');
INSERT INTO `empresas` VALUES ('TITZIAN', 'FABRIZIO FRANCISCO COTO COTO', 'fabriziocoto@titzian.com', '2223-7753', 'D', 'San Jose');
INSERT INTO `empresas` VALUES ('INDUSTRIAL LUGUME', 'LUIS GUSTAVO MENDEZ PALMA', 'creditoycobro@lugume.com', '22861282', 'D', 'San Jose');
INSERT INTO `empresas` VALUES ('EL RAFAELEÑO', 'RAFAEL ALVARO VARGAS LARA', 'rarce08@hotmail.es', '22629808', 'D', 'Limon');
INSERT INTO `empresas` VALUES ('SOLUCIONES NEAN DE CR SA', 'GLORIA MARINA MATA ALVAREZ', 'david.barahona@neansa.com', '22909959', 'D', 'San Jose');
INSERT INTO `empresas` VALUES ('EDIFICADORA INDUSTRIAL', 'HECTOR LEE QUIROS', 'leecorp@leecorp.net', '22950225', 'D', 'Cartago');
INSERT INTO `empresas` VALUES ('GOYCASA', 'FRANKLIN CAMPOS CALDERON', 'csalazar@goycasa.com', '22450313', 'D', 'Cartago');
INSERT INTO `empresas` VALUES ('SYMGENTA', 'MARIO ARREA SIERMANN', 'julieta.alvarado@syngenta.com', '24314707', 'D', 'San Jose');
INSERT INTO `empresas` VALUES ('CONSTRUCTORA NAVARRO Y AVILES', 'SALVADOR ANTONIO AVILES MAYORGA', 'mariana.blanco@navarroyaviles.com', '22763235', 'D', 'San Jose');
INSERT INTO `empresas` VALUES ('SOCIEDAD GANADERA SAN AGUSTIN SA', 'MARIA DEL ROSARIO LACAYO GIL', 'e-mail: hsanagustinsa@gmail.com', '85526290', 'D', 'San Jose');
INSERT INTO `empresas` VALUES ('ACELUB', 'JAIME ROLANDO SALAZAR VEGA', 'vmontano@acelub.cr', '4100 8004', 'D', 'Alajuela');
INSERT INTO `empresas` VALUES ('FIBROCENTRO', 'ORLANDO ODIO ARIZA', 'oodio@fibrocentrocr.com', '22571717 ext 124', 'D', 'Cartago');
INSERT INTO `empresas` VALUES ('DATAFORMAS DE COSTA RICA', 'ALEJANDRO JOSE JIMENEZ RODRIGUEZ', 'e-mail: jonathan.madrigal@dataformas.com', '22165000', 'D', 'Puntarenas');
INSERT INTO `empresas` VALUES ('AQUAMETRIC', 'XAVIER MORICE RODRIGUEZ', 'xmorice@aquametric.net', '2430-3838', 'D', 'San Jose');
INSERT INTO `empresas` VALUES ('GALA SPORT', 'ALAN ALTER MONTVELISKY', 'logística@grupoa.co.cr', '40103737', 'D', 'Cartago');
INSERT INTO `empresas` VALUES ('ALMACEN FISCAL SANDAL', 'RICARDO ARQUEDAS SOLERA', 'cchacon@sandal.co.cr', '22639811', 'D', 'San Jose');
INSERT INTO `empresas` VALUES ('TECNO PACK SOCIEDAD ANONIMA', 'FELIX ABDIEL SOLIS', 'administracion@tecno-packcr.com', '24310710', 'D', 'Alajuela');
INSERT INTO `empresas` VALUES ('ALEXANDER ACUÑA BALDIZON', 'ALEXANDER ACUÑA BALDIZON', 'alexacunab@hotmail.com', '22477406', 'D', 'San Jose');
INSERT INTO `empresas` VALUES ('YARA COSTA RICA', 'BERNARDO MORSINK SCHAEFER', 'ronald.cubero@yara.com', '21050250', 'D', 'San Jose');
INSERT INTO `empresas` VALUES ('DISTRIBUIDORA RODRIGUEZ VILLALOBOS', 'Wilson Alexis Rodriguez Arias', 'wilson.ra@hotmail.com', '27185302', 'D', 'San Jose');
INSERT INTO `empresas` VALUES ('FULL COPY SOLUTIONS', 'CHRISTIAN GONZALEZ GONZALEZ', 'fullcopysol@gmail.com', '83478080', 'D', 'San Jose');
INSERT INTO `empresas` VALUES ('DISTRIBUIDORA DE EQUIPO ELECTROMECANICO YARILAIT', 'ALEXANDER LAITANO BENAVIDES', 'eliza@laitanoconsultores.com', '60462744', 'D', 'San Jose');
INSERT INTO `empresas` VALUES ('ASOCIACIÓN COSTA RICA PMI CHAPTER', 'EDGAR CARLOS DE JESUS VAZQUEZ RETANA', 'asistente@pmicr.org', '22248883', 'D', 'San Jose');
INSERT INTO `empresas` VALUES ('TRANSPORTES PROFESIONALES SU AMIGO SA', 'MARCOS ROBERTO MORA MORALES', 'transprosa@gmail.com', '22506190/ 83879112', 'D', 'San Jose');
INSERT INTO `empresas` VALUES ('DEPOSITO INTERNACIONAL DE CARGA ECATRANS SA', 'MARIA ENID SERRANO RODRIGUEZ', 'bcascante@ecatrans.com', '22656566', 'D', 'San Jose');
INSERT INTO `empresas` VALUES ('INTERTEC SOCIEDAD ANONIMA', 'MIGUEL ANTONIO HERNANDEZ MENDEZ', 'mhernandez@intertec.co.cr', '22217831', 'D', 'San Jose');
INSERT INTO `empresas` VALUES ('TRANSPORTES JOKEVISION SA', 'JESUS MARIA QUESADA ARROYO', 'rquesada@cosrticavision.net', '40525678', 'D', 'San Jose');
COMMIT;

-- ----------------------------
-- Table structure for survey
-- ----------------------------
DROP TABLE IF EXISTS `survey`;
CREATE TABLE `survey` (
  `Id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `ServicesId` int(11) NOT NULL,
  `Name` varchar(100) NOT NULL,
  `Description` varchar(255) DEFAULT NULL,
  `Details` text,
  `Terms` text,
  `CreateDate` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `LastUpdate` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `InputType` varchar(50) NOT NULL,
  `InputImage` varchar(255) DEFAULT NULL,
  `Rows` int(5) NOT NULL DEFAULT '1',
  `Country` varchar(100) DEFAULT NULL,
  `Order` int(5) NOT NULL DEFAULT '0',
  `Status` int(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`Id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=62 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of survey
-- ----------------------------
BEGIN;
INSERT INTO `survey` VALUES (14, 3, 'Satisfacción con la atención de su asesor de ventas', '', '<!DOCTYPE html>\r\n<html>\r\n<head>\r\n</head>\r\n<body>\r\n<p>&iquest;C&oacute;mo calificar&iacute;a los siguientes indicadores de servicio que le ofrece el</p>\r\n<p><strong>Asesor </strong><strong>de Ventas </strong>asignado a su cuenta?</p>\r\n</body>\r\n</html>', NULL, '2018-02-08 09:52:36', '2018-04-02 19:00:49', 'radio_img', 'Gold-Star.J10.2k-300x300.png', 10, NULL, 7, 1);
INSERT INTO `survey` VALUES (15, 3, 'SATISFACCIón global', '', '<!DOCTYPE html>\r\n<html>\r\n<head>\r\n</head>\r\n<body>\r\n<p>&iquest;Cu&aacute;les son los <strong>3 principales motivos </strong>por los que trabaja con INTACO?</p>\r\n</body>\r\n</html>', NULL, '2018-02-20 05:49:02', '2018-04-02 19:00:03', 'radio_img', 'Gold-Star.J10.2k-300x300.png', 1, NULL, 1, 1);
INSERT INTO `survey` VALUES (16, 3, 'Evolución del servicio', '', '<!DOCTYPE html>\r\n<html>\r\n<head>\r\n</head>\r\n<body>\r\n<p>En el &uacute;ltimo a&ntilde;o, <strong>&iquest;c&oacute;mo ha evolucionado el nivel de servicio que le ofrecemos?</strong></p>\r\n</body>\r\n</html>', NULL, '2018-02-20 05:52:36', '2018-04-02 19:00:50', 'radio_img', 'Gold-Star.J10.2k-300x300.png', 10, NULL, 3, 1);
INSERT INTO `survey` VALUES (17, 3, 'SATISFACCIón con nuestro servicio', '', '<!DOCTYPE html>\r\n<html>\r\n<head>\r\n</head>\r\n<body>\r\n<p>&iquest;C&oacute;mo calificar&iacute;a los siguientes indicadores de <strong>disponibilidad y entrega</strong> de INTACO?</p>\r\n</body>\r\n</html>', NULL, '2018-02-20 05:54:41', '2018-04-02 19:00:52', 'radio_img', 'Gold-Star.J10.2k-300x300.png', 10, NULL, 4, 1);
INSERT INTO `survey` VALUES (18, 3, 'Atención de reclamos', '', '<!DOCTYPE html>\r\n<html>\r\n<head>\r\n</head>\r\n<body>\r\n<p>&iquest;Ha tenido incidencias con INTACO?</p>\r\n<p>De ser as&iacute;, &iquest;qu&eacute; tan frecuentes son estas incidencias?</p>\r\n<p><strong>(reclamos de productos o </strong><strong>errores de </strong><strong>despacho) </strong></p>\r\n</body>\r\n</html>', NULL, '2018-02-20 06:15:54', '2018-04-02 19:00:53', 'radio_img', 'Gold-Star.J10.2k-300x300.png', 10, NULL, 5, 1);
INSERT INTO `survey` VALUES (20, 3, 'Atención de reclamos', '', '<!DOCTYPE html>\r\n<html>\r\n<head>\r\n</head>\r\n<body>\r\n<p>&iquest;Ante una <strong>incidencia por reclamo de producto o de error de despacho</strong>, c&oacute;mo calificar&iacute;a los siguientes indicadores de atenci&oacute;n de INTACO?</p>\r\n</body>\r\n</html>', NULL, '2018-02-20 06:31:11', '2018-04-02 19:00:54', 'radio_img', 'Gold-Star.J10.2k-300x300.png', 10, NULL, 6, 1);
INSERT INTO `survey` VALUES (22, 3, 'Satisfacción con sus condiciones comerciales', '', '<!DOCTYPE html>\r\n<html>\r\n<head>\r\n</head>\r\n<body>\r\n<p>&iquest;C&oacute;mo calificar&iacute;a sus <strong>condiciones comerciales</strong>?</p>\r\n</body>\r\n</html>', NULL, '2018-02-20 06:37:40', '2018-04-02 19:00:56', 'radio_img', 'Gold-Star.J10.2k-300x300.png', 10, NULL, 8, 1);
INSERT INTO `survey` VALUES (23, 3, 'Satisfacción con nuestros productos', '', '<!DOCTYPE html>\r\n<html>\r\n<head>\r\n</head>\r\n<body>\r\n<p>&iquest;C&oacute;mo calificar&iacute;a los siguientes indicadores de <strong>nuestros productos</strong>?</p>\r\n</body>\r\n</html>', NULL, '2018-02-20 06:40:08', '2018-04-02 19:00:57', 'radio_img', 'Gold-Star.J10.2k-300x300.png', 10, NULL, 9, 1);
INSERT INTO `survey` VALUES (24, 3, 'Satisfacción con nuestro apoyo comercial', '', '<!DOCTYPE html>\r\n<html>\r\n<head>\r\n</head>\r\n<body>\r\n<p>&iquest;C&oacute;mo calificar&iacute;a los siguientes indicadores de <strong>apoyo a su negocio</strong>?</p>\r\n</body>\r\n</html>', NULL, '2018-02-20 06:43:09', '2018-04-02 19:00:59', 'radio_img', 'Gold-Star.J10.2k-300x300.png', 10, NULL, 10, 1);
INSERT INTO `survey` VALUES (25, 3, 'Percepción de INTACO', '', '<!DOCTYPE html>\r\n<html>\r\n<head>\r\n</head>\r\n<body>\r\n<p>Nos gustar&iacute;a conocer su percepci&oacute;n en cuanto a nuestra promesa de valor:</p>\r\n<p>INTACO es cercano, se preocupa y hace crecer a sus clientes</p>\r\n</body>\r\n</html>', NULL, '2018-02-20 06:45:37', '2018-04-02 19:01:00', 'radio_img', 'Gold-Star.J10.2k-300x300.png', 10, NULL, 11, 1);
INSERT INTO `survey` VALUES (26, 3, 'Percepción de INTACO', '', '<!DOCTYPE html>\r\n<html>\r\n<head>\r\n</head>\r\n<body>\r\n<p>En comparaci&oacute;n con otras empresas del sector de la construcci&oacute;n,</p>\r\n<p><strong>&iquest;C&oacute;mo calificar&iacute;a INTACO como empresa?</strong></p>\r\n</body>\r\n</html>', NULL, '2018-02-20 06:48:18', '2018-04-02 19:01:02', 'radio_img', '10', 14, NULL, 12, 1);
INSERT INTO `survey` VALUES (47, 3, 'Sugerencias finales	', '', '<!DOCTYPE html>\r\n<html>\r\n<head>\r\n</head>\r\n<body>\r\n<p>Nos encantar&iacute;a conocer m&aacute;s sobre su valoraci&oacute;n de INTACO.</p>\r\n<p>Abajo encontrar&aacute; un espacio en donde puede escribir <strong>comentarios y sugerencias</strong>:</p>\r\n</body>\r\n</html>', NULL, '2018-03-03 04:36:06', '2018-03-30 23:56:10', 'textarea', '', 1, NULL, 13, 1);
INSERT INTO `survey` VALUES (56, 3, 'SATISFACCIón global', '', '<!DOCTYPE html>\r\n<html>\r\n<head>\r\n</head>\r\n<body>\r\n<p>&iquest;C&oacute;mo calificar&iacute;a su<strong> grado de satisfacci&oacute;n </strong>con INTACO?</p>\r\n</body>\r\n</html>', NULL, '2018-03-05 23:56:05', '2018-04-02 19:01:42', 'check_img', 'Gold-Star.J10.2k-300x300.png', 1, NULL, 2, 1);
COMMIT;

-- ----------------------------
-- Table structure for survey_answers
-- ----------------------------
DROP TABLE IF EXISTS `survey_answers`;
CREATE TABLE `survey_answers` (
  `Id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `QuestionId` int(11) NOT NULL,
  `Answer` varchar(255) NOT NULL,
  `Points` int(11) NOT NULL DEFAULT '0',
  `CreateDate` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `LastUpdate` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `Status` int(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`Id`) USING BTREE,
  UNIQUE KEY `QuestionId` (`QuestionId`,`Answer`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=328 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of survey_answers
-- ----------------------------
BEGIN;
INSERT INTO `survey_answers` VALUES (2, 0, '', 0, '2018-02-07 11:05:58', '2018-02-07 11:05:58', 0);
INSERT INTO `survey_answers` VALUES (25, 35, 'No conozco', 1, '2018-02-08 23:24:51', '2018-02-08 23:24:51', 1);
INSERT INTO `survey_answers` VALUES (26, 35, 'Necesita mejorar', 2, '2018-02-08 23:24:59', '2018-02-09 01:05:55', 1);
INSERT INTO `survey_answers` VALUES (27, 35, 'Promedio', 3, '2018-02-08 23:25:07', '2018-02-08 23:25:07', 1);
INSERT INTO `survey_answers` VALUES (28, 35, 'Bueno', 4, '2018-02-08 23:25:14', '2018-02-08 23:25:14', 1);
INSERT INTO `survey_answers` VALUES (29, 35, 'Excelente', 5, '2018-02-08 23:25:21', '2018-02-08 23:25:21', 1);
INSERT INTO `survey_answers` VALUES (36, 37, 'Excelente', 5, '2018-02-20 05:50:04', '2018-02-20 05:50:04', 1);
INSERT INTO `survey_answers` VALUES (37, 37, 'Bueno', 4, '2018-02-20 05:50:16', '2018-02-20 05:50:16', 1);
INSERT INTO `survey_answers` VALUES (38, 37, 'Promedio', 3, '2018-02-20 05:50:21', '2018-02-20 05:50:21', 1);
INSERT INTO `survey_answers` VALUES (39, 37, 'Necesita mejorar', 2, '2018-02-20 05:50:31', '2018-02-20 05:50:31', 1);
INSERT INTO `survey_answers` VALUES (40, 37, 'No conozco', 1, '2018-02-20 05:50:40', '2018-02-20 05:50:40', 1);
INSERT INTO `survey_answers` VALUES (41, 38, 'Marca reconocida', 7, '2018-02-20 05:51:30', '2018-04-02 13:19:17', 1);
INSERT INTO `survey_answers` VALUES (42, 38, 'Calidad de productos', 6, '2018-02-20 05:51:35', '2018-04-02 13:19:10', 1);
INSERT INTO `survey_answers` VALUES (43, 38, 'Variedad productos', 5, '2018-02-20 05:51:39', '2018-04-02 13:19:58', 1);
INSERT INTO `survey_answers` VALUES (44, 38, 'Precio', 4, '2018-02-20 05:51:44', '2018-04-02 13:18:43', 1);
INSERT INTO `survey_answers` VALUES (45, 38, 'Genera rentabilidad', 3, '2018-02-20 05:51:48', '2018-04-02 13:18:27', 1);
INSERT INTO `survey_answers` VALUES (46, 38, 'Atención <br>personal <br>de INTACO', 2, '2018-02-20 05:51:52', '2018-04-02 13:18:19', 1);
INSERT INTO `survey_answers` VALUES (47, 38, 'Cumplimiento de entrega', 1, '2018-02-20 05:51:57', '2018-04-02 13:18:07', 1);
INSERT INTO `survey_answers` VALUES (48, 39, 'Ha mejorado', 3, '2018-02-20 05:52:53', '2018-04-02 13:21:01', 1);
INSERT INTO `survey_answers` VALUES (49, 39, 'Se ha mantenido igual', 2, '2018-02-20 05:52:59', '2018-04-02 13:20:49', 1);
INSERT INTO `survey_answers` VALUES (50, 39, 'Ha empeorado', 1, '2018-02-20 05:53:04', '2018-02-20 05:53:17', 1);
INSERT INTO `survey_answers` VALUES (51, 45, 'Excelente', 5, '2018-02-20 05:59:01', '2018-02-20 05:59:01', 1);
INSERT INTO `survey_answers` VALUES (52, 45, 'Bueno', 4, '2018-02-20 05:59:08', '2018-02-20 05:59:08', 1);
INSERT INTO `survey_answers` VALUES (53, 45, 'Promedio', 3, '2018-02-20 05:59:15', '2018-02-20 05:59:15', 1);
INSERT INTO `survey_answers` VALUES (54, 45, 'Necesita mejorar', 2, '2018-02-20 05:59:21', '2018-02-20 05:59:21', 1);
INSERT INTO `survey_answers` VALUES (55, 45, 'No conozco', 1, '2018-02-20 05:59:28', '2018-02-20 05:59:28', 1);
INSERT INTO `survey_answers` VALUES (56, 41, 'Bueno', 4, '2018-02-20 05:59:08', '2018-02-20 05:59:08', 1);
INSERT INTO `survey_answers` VALUES (57, 41, 'Excelente', 5, '2018-02-20 05:59:01', '2018-02-20 05:59:01', 1);
INSERT INTO `survey_answers` VALUES (58, 41, 'Necesita mejorar', 2, '2018-02-20 05:59:21', '2018-02-20 05:59:21', 1);
INSERT INTO `survey_answers` VALUES (59, 41, 'No conozco', 1, '2018-02-20 05:59:28', '2018-02-20 05:59:28', 1);
INSERT INTO `survey_answers` VALUES (60, 41, 'Promedio', 3, '2018-02-20 05:59:15', '2018-02-20 05:59:15', 1);
INSERT INTO `survey_answers` VALUES (63, 42, 'Bueno', 4, '2018-02-20 05:59:08', '2018-02-20 05:59:08', 1);
INSERT INTO `survey_answers` VALUES (64, 42, 'Excelente', 5, '2018-02-20 05:59:01', '2018-02-20 05:59:01', 1);
INSERT INTO `survey_answers` VALUES (65, 42, 'Necesita mejorar', 2, '2018-02-20 05:59:21', '2018-02-20 05:59:21', 1);
INSERT INTO `survey_answers` VALUES (66, 42, 'No conozco', 1, '2018-02-20 05:59:28', '2018-02-20 05:59:28', 1);
INSERT INTO `survey_answers` VALUES (67, 42, 'Promedio', 3, '2018-02-20 05:59:15', '2018-02-20 05:59:15', 1);
INSERT INTO `survey_answers` VALUES (70, 43, 'Bueno', 4, '2018-02-20 05:59:08', '2018-02-20 05:59:08', 1);
INSERT INTO `survey_answers` VALUES (71, 43, 'Excelente', 5, '2018-02-20 05:59:01', '2018-02-20 05:59:01', 1);
INSERT INTO `survey_answers` VALUES (72, 43, 'Necesita mejorar', 2, '2018-02-20 05:59:21', '2018-02-20 05:59:21', 1);
INSERT INTO `survey_answers` VALUES (73, 43, 'No conozco', 1, '2018-02-20 05:59:28', '2018-02-20 05:59:28', 1);
INSERT INTO `survey_answers` VALUES (74, 43, 'Promedio', 3, '2018-02-20 05:59:15', '2018-02-20 05:59:15', 1);
INSERT INTO `survey_answers` VALUES (77, 44, 'Bueno', 4, '2018-02-20 05:59:08', '2018-02-20 05:59:08', 1);
INSERT INTO `survey_answers` VALUES (78, 44, 'Excelente', 5, '2018-02-20 05:59:01', '2018-02-20 05:59:01', 1);
INSERT INTO `survey_answers` VALUES (79, 44, 'Necesita mejorar', 2, '2018-02-20 05:59:21', '2018-02-20 05:59:21', 1);
INSERT INTO `survey_answers` VALUES (80, 44, 'No conozco', 1, '2018-02-20 05:59:28', '2018-02-20 05:59:28', 1);
INSERT INTO `survey_answers` VALUES (81, 44, 'Promedio', 3, '2018-02-20 05:59:15', '2018-02-20 05:59:15', 1);
INSERT INTO `survey_answers` VALUES (85, 46, 'Bueno', 4, '2018-02-20 05:59:08', '2018-02-20 05:59:08', 1);
INSERT INTO `survey_answers` VALUES (86, 46, 'Excelente', 5, '2018-02-20 05:59:01', '2018-02-20 05:59:01', 1);
INSERT INTO `survey_answers` VALUES (87, 46, 'Necesita mejorar', 2, '2018-02-20 05:59:21', '2018-02-20 05:59:21', 1);
INSERT INTO `survey_answers` VALUES (88, 46, 'No conozco', 1, '2018-02-20 05:59:28', '2018-02-20 05:59:28', 1);
INSERT INTO `survey_answers` VALUES (89, 46, 'Promedio', 3, '2018-02-20 05:59:15', '2018-02-20 05:59:15', 1);
INSERT INTO `survey_answers` VALUES (92, 50, 'Muy frecuentes', 4, '2018-02-20 06:27:11', '2018-02-20 06:27:24', 1);
INSERT INTO `survey_answers` VALUES (93, 50, 'Frecuentes', 3, '2018-02-20 06:27:30', '2018-02-20 06:27:30', 1);
INSERT INTO `survey_answers` VALUES (94, 50, 'No frecuentes', 2, '2018-02-20 06:27:37', '2018-02-20 06:27:37', 1);
INSERT INTO `survey_answers` VALUES (95, 50, 'No conozco', 1, '2018-02-20 06:27:43', '2018-02-20 06:27:43', 1);
INSERT INTO `survey_answers` VALUES (96, 52, 'Frecuentes', 3, '2018-02-20 06:27:30', '2018-02-20 06:27:30', 1);
INSERT INTO `survey_answers` VALUES (97, 52, 'Muy frecuentes', 4, '2018-02-20 06:27:11', '2018-02-20 06:27:24', 1);
INSERT INTO `survey_answers` VALUES (98, 52, 'No conozco', 1, '2018-02-20 06:27:43', '2018-02-20 06:27:43', 1);
INSERT INTO `survey_answers` VALUES (99, 52, 'No frecuentes', 2, '2018-02-20 06:27:37', '2018-02-20 06:27:37', 1);
INSERT INTO `survey_answers` VALUES (103, 53, 'Excelente', 5, '2018-02-20 06:31:57', '2018-02-20 06:31:57', 1);
INSERT INTO `survey_answers` VALUES (104, 53, 'Bueno', 4, '2018-02-20 06:32:03', '2018-02-20 06:32:03', 1);
INSERT INTO `survey_answers` VALUES (105, 53, 'Promedio', 3, '2018-02-20 06:32:14', '2018-02-20 06:32:14', 1);
INSERT INTO `survey_answers` VALUES (106, 53, 'Necesita mejorar', 2, '2018-02-20 06:32:22', '2018-02-20 06:32:22', 1);
INSERT INTO `survey_answers` VALUES (107, 53, 'No conozco', 1, '2018-02-20 06:32:32', '2018-02-20 06:32:32', 1);
INSERT INTO `survey_answers` VALUES (108, 54, 'Bueno', 4, '2018-02-20 06:32:03', '2018-02-20 06:32:03', 1);
INSERT INTO `survey_answers` VALUES (109, 54, 'Excelente', 5, '2018-02-20 06:31:57', '2018-02-20 06:31:57', 1);
INSERT INTO `survey_answers` VALUES (110, 54, 'Necesita mejorar', 2, '2018-02-20 06:32:22', '2018-02-20 06:32:22', 1);
INSERT INTO `survey_answers` VALUES (111, 54, 'No conozco', 1, '2018-02-20 06:32:32', '2018-02-20 06:32:32', 1);
INSERT INTO `survey_answers` VALUES (112, 54, 'Promedio', 3, '2018-02-20 06:32:14', '2018-02-20 06:32:14', 1);
INSERT INTO `survey_answers` VALUES (115, 55, 'Bueno', 4, '2018-02-20 06:32:03', '2018-02-20 06:32:03', 1);
INSERT INTO `survey_answers` VALUES (116, 55, 'Excelente', 5, '2018-02-20 06:31:57', '2018-02-20 06:31:57', 1);
INSERT INTO `survey_answers` VALUES (117, 55, 'Necesita mejorar', 2, '2018-02-20 06:32:22', '2018-02-20 06:32:22', 1);
INSERT INTO `survey_answers` VALUES (118, 55, 'No conozco', 1, '2018-02-20 06:32:32', '2018-02-20 06:32:32', 1);
INSERT INTO `survey_answers` VALUES (119, 55, 'Promedio', 3, '2018-02-20 06:32:14', '2018-02-20 06:32:14', 1);
INSERT INTO `survey_answers` VALUES (122, 56, 'Bueno', 4, '2018-02-20 06:32:03', '2018-02-20 06:32:03', 1);
INSERT INTO `survey_answers` VALUES (123, 56, 'Excelente', 5, '2018-02-20 06:31:57', '2018-02-20 06:31:57', 1);
INSERT INTO `survey_answers` VALUES (124, 56, 'Necesita mejorar', 2, '2018-02-20 06:32:22', '2018-02-20 06:32:22', 1);
INSERT INTO `survey_answers` VALUES (125, 56, 'No conozco', 1, '2018-02-20 06:32:32', '2018-02-20 06:32:32', 1);
INSERT INTO `survey_answers` VALUES (126, 56, 'Promedio', 3, '2018-02-20 06:32:14', '2018-02-20 06:32:14', 1);
INSERT INTO `survey_answers` VALUES (129, 57, 'Bueno', 4, '2018-02-20 06:32:03', '2018-02-20 06:32:03', 1);
INSERT INTO `survey_answers` VALUES (130, 57, 'Excelente', 5, '2018-02-20 06:31:57', '2018-02-20 06:31:57', 1);
INSERT INTO `survey_answers` VALUES (131, 57, 'Necesita mejorar', 2, '2018-02-20 06:32:22', '2018-02-20 06:32:22', 1);
INSERT INTO `survey_answers` VALUES (132, 57, 'No conozco', 1, '2018-02-20 06:32:32', '2018-02-20 06:32:32', 1);
INSERT INTO `survey_answers` VALUES (133, 57, 'Promedio', 3, '2018-02-20 06:32:14', '2018-02-20 06:32:14', 1);
INSERT INTO `survey_answers` VALUES (136, 31, 'Bueno', 4, '2018-02-08 23:25:14', '2018-02-08 23:25:14', 1);
INSERT INTO `survey_answers` VALUES (137, 31, 'Excelente', 5, '2018-02-08 23:25:21', '2018-02-08 23:25:21', 1);
INSERT INTO `survey_answers` VALUES (138, 31, 'Necesita mejorar', 2, '2018-02-08 23:24:59', '2018-02-09 01:05:55', 1);
INSERT INTO `survey_answers` VALUES (139, 31, 'No conozco', 1, '2018-02-08 23:24:51', '2018-02-08 23:24:51', 1);
INSERT INTO `survey_answers` VALUES (140, 31, 'Promedio', 3, '2018-02-08 23:25:07', '2018-02-08 23:25:07', 1);
INSERT INTO `survey_answers` VALUES (143, 32, 'Bueno', 4, '2018-02-08 23:25:14', '2018-02-08 23:25:14', 1);
INSERT INTO `survey_answers` VALUES (144, 32, 'Excelente', 5, '2018-02-08 23:25:21', '2018-02-08 23:25:21', 1);
INSERT INTO `survey_answers` VALUES (145, 32, 'Necesita mejorar', 2, '2018-02-08 23:24:59', '2018-02-09 01:05:55', 1);
INSERT INTO `survey_answers` VALUES (146, 32, 'No conozco', 1, '2018-02-08 23:24:51', '2018-02-08 23:24:51', 1);
INSERT INTO `survey_answers` VALUES (147, 32, 'Promedio', 3, '2018-02-08 23:25:07', '2018-02-08 23:25:07', 1);
INSERT INTO `survey_answers` VALUES (150, 33, 'Bueno', 4, '2018-02-08 23:25:14', '2018-02-08 23:25:14', 1);
INSERT INTO `survey_answers` VALUES (151, 33, 'Excelente', 5, '2018-02-08 23:25:21', '2018-02-08 23:25:21', 1);
INSERT INTO `survey_answers` VALUES (152, 33, 'Necesita mejorar', 2, '2018-02-08 23:24:59', '2018-02-09 01:05:55', 1);
INSERT INTO `survey_answers` VALUES (153, 33, 'No conozco', 1, '2018-02-08 23:24:51', '2018-02-08 23:24:51', 1);
INSERT INTO `survey_answers` VALUES (154, 33, 'Promedio', 3, '2018-02-08 23:25:07', '2018-02-08 23:25:07', 1);
INSERT INTO `survey_answers` VALUES (157, 34, 'Bueno', 4, '2018-02-08 23:25:14', '2018-02-08 23:25:14', 1);
INSERT INTO `survey_answers` VALUES (158, 34, 'Excelente', 5, '2018-02-08 23:25:21', '2018-02-08 23:25:21', 1);
INSERT INTO `survey_answers` VALUES (159, 34, 'Necesita mejorar', 2, '2018-02-08 23:24:59', '2018-02-09 01:05:55', 1);
INSERT INTO `survey_answers` VALUES (160, 34, 'No conozco', 1, '2018-02-08 23:24:51', '2018-02-08 23:24:51', 1);
INSERT INTO `survey_answers` VALUES (161, 34, 'Promedio', 3, '2018-02-08 23:25:07', '2018-02-08 23:25:07', 1);
INSERT INTO `survey_answers` VALUES (164, 36, 'Bueno', 4, '2018-02-08 23:25:14', '2018-02-08 23:25:14', 1);
INSERT INTO `survey_answers` VALUES (165, 36, 'Excelente', 5, '2018-02-08 23:25:21', '2018-02-08 23:25:21', 1);
INSERT INTO `survey_answers` VALUES (166, 36, 'Necesita mejorar', 2, '2018-02-08 23:24:59', '2018-02-09 01:05:55', 1);
INSERT INTO `survey_answers` VALUES (167, 36, 'No conozco', 1, '2018-02-08 23:24:51', '2018-02-08 23:24:51', 1);
INSERT INTO `survey_answers` VALUES (168, 36, 'Promedio', 3, '2018-02-08 23:25:07', '2018-02-08 23:25:07', 1);
INSERT INTO `survey_answers` VALUES (171, 58, 'Bueno', 4, '2018-02-08 23:25:14', '2018-02-08 23:25:14', 1);
INSERT INTO `survey_answers` VALUES (172, 58, 'Excelente', 5, '2018-02-08 23:25:21', '2018-02-08 23:25:21', 1);
INSERT INTO `survey_answers` VALUES (173, 58, 'Necesita mejorar', 2, '2018-02-08 23:24:59', '2018-02-09 01:05:55', 1);
INSERT INTO `survey_answers` VALUES (174, 58, 'No conozco', 1, '2018-02-08 23:24:51', '2018-02-08 23:24:51', 1);
INSERT INTO `survey_answers` VALUES (175, 58, 'Promedio', 3, '2018-02-08 23:25:07', '2018-02-08 23:25:07', 1);
INSERT INTO `survey_answers` VALUES (178, 59, 'Bueno', 4, '2018-02-08 23:25:14', '2018-02-08 23:25:14', 1);
INSERT INTO `survey_answers` VALUES (179, 59, 'Excelente', 5, '2018-02-08 23:25:21', '2018-02-08 23:25:21', 1);
INSERT INTO `survey_answers` VALUES (180, 59, 'Necesita mejorar', 2, '2018-02-08 23:24:59', '2018-02-09 01:05:55', 1);
INSERT INTO `survey_answers` VALUES (181, 59, 'No conozco', 1, '2018-02-08 23:24:51', '2018-02-08 23:24:51', 1);
INSERT INTO `survey_answers` VALUES (182, 59, 'Promedio', 3, '2018-02-08 23:25:07', '2018-02-08 23:25:07', 1);
INSERT INTO `survey_answers` VALUES (185, 60, 'Bueno', 4, '2018-02-08 23:25:14', '2018-02-08 23:25:14', 1);
INSERT INTO `survey_answers` VALUES (186, 60, 'Excelente', 5, '2018-02-08 23:25:21', '2018-02-08 23:25:21', 1);
INSERT INTO `survey_answers` VALUES (187, 60, 'Necesita mejorar', 2, '2018-02-08 23:24:59', '2018-02-09 01:05:55', 1);
INSERT INTO `survey_answers` VALUES (188, 60, 'No conozco', 1, '2018-02-08 23:24:51', '2018-02-08 23:24:51', 1);
INSERT INTO `survey_answers` VALUES (189, 60, 'Promedio', 3, '2018-02-08 23:25:07', '2018-02-08 23:25:07', 1);
INSERT INTO `survey_answers` VALUES (192, 61, 'Bueno', 4, '2018-02-08 23:25:14', '2018-02-08 23:25:14', 1);
INSERT INTO `survey_answers` VALUES (193, 61, 'Excelente', 5, '2018-02-08 23:25:21', '2018-02-08 23:25:21', 1);
INSERT INTO `survey_answers` VALUES (194, 61, 'Necesita mejorar', 2, '2018-02-08 23:24:59', '2018-02-09 01:05:55', 1);
INSERT INTO `survey_answers` VALUES (195, 61, 'No conozco', 1, '2018-02-08 23:24:51', '2018-02-08 23:24:51', 1);
INSERT INTO `survey_answers` VALUES (196, 61, 'Promedio', 3, '2018-02-08 23:25:07', '2018-02-08 23:25:07', 1);
INSERT INTO `survey_answers` VALUES (199, 62, 'Bueno', 4, '2018-02-08 23:25:14', '2018-02-08 23:25:14', 1);
INSERT INTO `survey_answers` VALUES (200, 62, 'Excelente', 5, '2018-02-08 23:25:21', '2018-02-08 23:25:21', 1);
INSERT INTO `survey_answers` VALUES (201, 62, 'Necesita mejorar', 2, '2018-02-08 23:24:59', '2018-02-09 01:05:55', 1);
INSERT INTO `survey_answers` VALUES (202, 62, 'No conozco', 1, '2018-02-08 23:24:51', '2018-02-08 23:24:51', 1);
INSERT INTO `survey_answers` VALUES (203, 62, 'Promedio', 3, '2018-02-08 23:25:07', '2018-02-08 23:25:07', 1);
INSERT INTO `survey_answers` VALUES (206, 63, 'Bueno', 4, '2018-02-08 23:25:14', '2018-02-08 23:25:14', 1);
INSERT INTO `survey_answers` VALUES (207, 63, 'Excelente', 5, '2018-02-08 23:25:21', '2018-02-08 23:25:21', 1);
INSERT INTO `survey_answers` VALUES (208, 63, 'Necesita mejorar', 2, '2018-02-08 23:24:59', '2018-02-09 01:05:55', 1);
INSERT INTO `survey_answers` VALUES (209, 63, 'No conozco', 1, '2018-02-08 23:24:51', '2018-02-08 23:24:51', 1);
INSERT INTO `survey_answers` VALUES (210, 63, 'Promedio', 3, '2018-02-08 23:25:07', '2018-02-08 23:25:07', 1);
INSERT INTO `survey_answers` VALUES (213, 64, 'Bueno', 4, '2018-02-08 23:25:14', '2018-02-08 23:25:14', 1);
INSERT INTO `survey_answers` VALUES (214, 64, 'Excelente', 5, '2018-02-08 23:25:21', '2018-02-08 23:25:21', 1);
INSERT INTO `survey_answers` VALUES (215, 64, 'Necesita mejorar', 2, '2018-02-08 23:24:59', '2018-02-09 01:05:55', 1);
INSERT INTO `survey_answers` VALUES (216, 64, 'No conozco', 1, '2018-02-08 23:24:51', '2018-02-08 23:24:51', 1);
INSERT INTO `survey_answers` VALUES (217, 64, 'Promedio', 3, '2018-02-08 23:25:07', '2018-02-08 23:25:07', 1);
INSERT INTO `survey_answers` VALUES (220, 65, 'Bueno', 4, '2018-02-08 23:25:14', '2018-02-08 23:25:14', 1);
INSERT INTO `survey_answers` VALUES (221, 65, 'Excelente', 5, '2018-02-08 23:25:21', '2018-02-08 23:25:21', 1);
INSERT INTO `survey_answers` VALUES (222, 65, 'Necesita mejorar', 2, '2018-02-08 23:24:59', '2018-02-09 01:05:55', 1);
INSERT INTO `survey_answers` VALUES (223, 65, 'No conozco', 1, '2018-02-08 23:24:51', '2018-02-08 23:24:51', 1);
INSERT INTO `survey_answers` VALUES (224, 65, 'Promedio', 3, '2018-02-08 23:25:07', '2018-02-08 23:25:07', 1);
INSERT INTO `survey_answers` VALUES (227, 66, 'Bueno', 4, '2018-02-08 23:25:14', '2018-02-08 23:25:14', 1);
INSERT INTO `survey_answers` VALUES (228, 66, 'Excelente', 5, '2018-02-08 23:25:21', '2018-02-08 23:25:21', 1);
INSERT INTO `survey_answers` VALUES (229, 66, 'Necesita mejorar', 2, '2018-02-08 23:24:59', '2018-02-09 01:05:55', 1);
INSERT INTO `survey_answers` VALUES (230, 66, 'No conozco', 1, '2018-02-08 23:24:51', '2018-02-08 23:24:51', 1);
INSERT INTO `survey_answers` VALUES (231, 66, 'Promedio', 3, '2018-02-08 23:25:07', '2018-02-08 23:25:07', 1);
INSERT INTO `survey_answers` VALUES (234, 67, 'Bueno', 4, '2018-02-08 23:25:14', '2018-02-08 23:25:14', 1);
INSERT INTO `survey_answers` VALUES (235, 67, 'Excelente', 5, '2018-02-08 23:25:21', '2018-02-08 23:25:21', 1);
INSERT INTO `survey_answers` VALUES (236, 67, 'Necesita mejorar', 2, '2018-02-08 23:24:59', '2018-02-09 01:05:55', 1);
INSERT INTO `survey_answers` VALUES (237, 67, 'No conozco', 1, '2018-02-08 23:24:51', '2018-02-08 23:24:51', 1);
INSERT INTO `survey_answers` VALUES (238, 67, 'Promedio', 3, '2018-02-08 23:25:07', '2018-02-08 23:25:07', 1);
INSERT INTO `survey_answers` VALUES (241, 68, 'Bueno', 4, '2018-02-08 23:25:14', '2018-02-08 23:25:14', 1);
INSERT INTO `survey_answers` VALUES (242, 68, 'Excelente', 5, '2018-02-08 23:25:21', '2018-02-08 23:25:21', 1);
INSERT INTO `survey_answers` VALUES (243, 68, 'Necesita mejorar', 2, '2018-02-08 23:24:59', '2018-02-09 01:05:55', 1);
INSERT INTO `survey_answers` VALUES (244, 68, 'No conozco', 1, '2018-02-08 23:24:51', '2018-02-08 23:24:51', 1);
INSERT INTO `survey_answers` VALUES (245, 68, 'Promedio', 3, '2018-02-08 23:25:07', '2018-02-08 23:25:07', 1);
INSERT INTO `survey_answers` VALUES (248, 69, 'Bueno', 4, '2018-02-08 23:25:14', '2018-02-08 23:25:14', 1);
INSERT INTO `survey_answers` VALUES (249, 69, 'Excelente', 5, '2018-02-08 23:25:21', '2018-02-08 23:25:21', 1);
INSERT INTO `survey_answers` VALUES (250, 69, 'Necesita mejorar', 2, '2018-02-08 23:24:59', '2018-02-09 01:05:55', 1);
INSERT INTO `survey_answers` VALUES (251, 69, 'No conozco', 1, '2018-02-08 23:24:51', '2018-02-08 23:24:51', 1);
INSERT INTO `survey_answers` VALUES (252, 69, 'Promedio', 3, '2018-02-08 23:25:07', '2018-02-08 23:25:07', 1);
INSERT INTO `survey_answers` VALUES (255, 70, 'Bueno', 4, '2018-02-08 23:25:14', '2018-02-08 23:25:14', 1);
INSERT INTO `survey_answers` VALUES (256, 70, 'Excelente', 5, '2018-02-08 23:25:21', '2018-02-08 23:25:21', 1);
INSERT INTO `survey_answers` VALUES (257, 70, 'Necesita mejorar', 2, '2018-02-08 23:24:59', '2018-02-09 01:05:55', 1);
INSERT INTO `survey_answers` VALUES (258, 70, 'No conozco', 1, '2018-02-08 23:24:51', '2018-02-08 23:24:51', 1);
INSERT INTO `survey_answers` VALUES (259, 70, 'Promedio', 3, '2018-02-08 23:25:07', '2018-02-08 23:25:07', 1);
INSERT INTO `survey_answers` VALUES (262, 71, 'Bueno', 4, '2018-02-08 23:25:14', '2018-02-08 23:25:14', 1);
INSERT INTO `survey_answers` VALUES (263, 71, 'Excelente', 5, '2018-02-08 23:25:21', '2018-02-08 23:25:21', 1);
INSERT INTO `survey_answers` VALUES (264, 71, 'Necesita mejorar', 2, '2018-02-08 23:24:59', '2018-02-09 01:05:55', 1);
INSERT INTO `survey_answers` VALUES (265, 71, 'No conozco', 1, '2018-02-08 23:24:51', '2018-02-08 23:24:51', 1);
INSERT INTO `survey_answers` VALUES (266, 71, 'Promedio', 3, '2018-02-08 23:25:07', '2018-02-08 23:25:07', 1);
INSERT INTO `survey_answers` VALUES (269, 72, 'Bueno', 4, '2018-02-08 23:25:14', '2018-02-08 23:25:14', 1);
INSERT INTO `survey_answers` VALUES (270, 72, 'Excelente', 5, '2018-02-08 23:25:21', '2018-02-08 23:25:21', 1);
INSERT INTO `survey_answers` VALUES (271, 72, 'Necesita mejorar', 2, '2018-02-08 23:24:59', '2018-02-09 01:05:55', 1);
INSERT INTO `survey_answers` VALUES (272, 72, 'No conozco', 1, '2018-02-08 23:24:51', '2018-02-08 23:24:51', 1);
INSERT INTO `survey_answers` VALUES (273, 72, 'Promedio', 3, '2018-02-08 23:25:07', '2018-02-08 23:25:07', 1);
INSERT INTO `survey_answers` VALUES (276, 73, 'Bueno', 4, '2018-02-08 23:25:14', '2018-02-08 23:25:14', 1);
INSERT INTO `survey_answers` VALUES (277, 73, 'Excelente', 5, '2018-02-08 23:25:21', '2018-02-08 23:25:21', 1);
INSERT INTO `survey_answers` VALUES (278, 73, 'Necesita mejorar', 2, '2018-02-08 23:24:59', '2018-02-09 01:05:55', 1);
INSERT INTO `survey_answers` VALUES (279, 73, 'No conozco', 1, '2018-02-08 23:24:51', '2018-02-08 23:24:51', 1);
INSERT INTO `survey_answers` VALUES (280, 73, 'Promedio', 3, '2018-02-08 23:25:07', '2018-02-08 23:25:07', 1);
INSERT INTO `survey_answers` VALUES (283, 74, 'Bueno', 4, '2018-02-08 23:25:14', '2018-02-08 23:25:14', 1);
INSERT INTO `survey_answers` VALUES (284, 74, 'Excelente', 5, '2018-02-08 23:25:21', '2018-02-08 23:25:21', 1);
INSERT INTO `survey_answers` VALUES (285, 74, 'Necesita mejorar', 2, '2018-02-08 23:24:59', '2018-02-09 01:05:55', 1);
INSERT INTO `survey_answers` VALUES (286, 74, 'No conozco', 1, '2018-02-08 23:24:51', '2018-02-08 23:24:51', 1);
INSERT INTO `survey_answers` VALUES (287, 74, 'Promedio', 3, '2018-02-08 23:25:07', '2018-02-08 23:25:07', 1);
INSERT INTO `survey_answers` VALUES (290, 75, 'Si cumple', 3, '2018-02-20 06:46:54', '2018-02-20 06:46:54', 1);
INSERT INTO `survey_answers` VALUES (291, 75, 'Cumple parcialmente', 2, '2018-02-20 06:47:01', '2018-02-20 06:47:01', 1);
INSERT INTO `survey_answers` VALUES (292, 75, 'No cumple', 1, '2018-02-20 06:47:11', '2018-02-20 06:47:11', 1);
INSERT INTO `survey_answers` VALUES (294, 76, 'Cumple parcialmente', 2, '2018-02-20 06:47:01', '2018-02-20 06:47:01', 1);
INSERT INTO `survey_answers` VALUES (295, 76, 'No cumple', 1, '2018-02-20 06:47:11', '2018-02-20 06:47:11', 1);
INSERT INTO `survey_answers` VALUES (296, 76, 'Si cumple', 3, '2018-02-20 06:46:54', '2018-02-20 06:46:54', 1);
INSERT INTO `survey_answers` VALUES (297, 77, 'Cumple parcialmente', 2, '2018-02-20 06:47:01', '2018-02-20 06:47:01', 1);
INSERT INTO `survey_answers` VALUES (298, 77, 'No cumple', 1, '2018-02-20 06:47:11', '2018-02-20 06:47:11', 1);
INSERT INTO `survey_answers` VALUES (299, 77, 'Si cumple', 3, '2018-02-20 06:46:54', '2018-02-20 06:46:54', 1);
INSERT INTO `survey_answers` VALUES (300, 80, 'Dentro de los líderes', 3, '2018-02-20 06:49:34', '2018-03-28 09:30:33', 1);
INSERT INTO `survey_answers` VALUES (301, 80, 'Dentro del promedio', 2, '2018-02-20 06:49:41', '2018-02-20 06:49:41', 1);
INSERT INTO `survey_answers` VALUES (302, 80, 'Bajo el promedio', 1, '2018-02-20 06:49:48', '2018-02-20 06:49:48', 1);
INSERT INTO `survey_answers` VALUES (303, 78, 'Bajo el promedio', 1, '2018-02-20 06:49:48', '2018-02-20 06:49:48', 1);
INSERT INTO `survey_answers` VALUES (304, 78, 'Dentro de los líderes', 3, '2018-02-20 06:49:34', '2018-03-28 09:30:33', 1);
INSERT INTO `survey_answers` VALUES (305, 78, 'Dentro del promedio', 2, '2018-02-20 06:49:41', '2018-02-20 06:49:41', 1);
INSERT INTO `survey_answers` VALUES (306, 79, 'Bajo el promedio', 1, '2018-02-20 06:49:48', '2018-02-20 06:49:48', 1);
INSERT INTO `survey_answers` VALUES (307, 79, 'Dentro de los líderes', 3, '2018-02-20 06:49:34', '2018-03-28 09:30:33', 1);
INSERT INTO `survey_answers` VALUES (308, 79, 'Dentro del promedio', 2, '2018-02-20 06:49:41', '2018-02-20 06:49:41', 1);
INSERT INTO `survey_answers` VALUES (310, 81, 'Bajo el promedio', 1, '2018-02-20 06:49:48', '2018-02-20 06:49:48', 1);
INSERT INTO `survey_answers` VALUES (311, 81, 'Dentro de los líderes', 3, '2018-02-20 06:49:34', '2018-03-28 09:30:33', 1);
INSERT INTO `survey_answers` VALUES (312, 81, 'Dentro del promedio', 2, '2018-02-20 06:49:41', '2018-02-20 06:49:41', 1);
INSERT INTO `survey_answers` VALUES (313, 82, 'Bajo el promedio', 1, '2018-02-20 06:49:48', '2018-02-20 06:49:48', 1);
INSERT INTO `survey_answers` VALUES (314, 82, 'Dentro de los líderes', 3, '2018-02-20 06:49:34', '2018-03-28 09:30:33', 1);
INSERT INTO `survey_answers` VALUES (315, 82, 'Dentro del promedio', 2, '2018-02-20 06:49:41', '2018-02-20 06:49:41', 1);
INSERT INTO `survey_answers` VALUES (316, 83, 'Bajo el promedio', 1, '2018-02-20 06:49:48', '2018-02-20 06:49:48', 1);
INSERT INTO `survey_answers` VALUES (317, 83, 'Dentro de los líderes', 3, '2018-02-20 06:49:34', '2018-03-28 09:30:33', 1);
INSERT INTO `survey_answers` VALUES (318, 83, 'Dentro del promedio', 2, '2018-02-20 06:49:41', '2018-02-20 06:49:41', 1);
INSERT INTO `survey_answers` VALUES (319, 84, 'Bajo el promedio', 1, '2018-02-20 06:49:48', '2018-02-20 06:49:48', 1);
INSERT INTO `survey_answers` VALUES (320, 84, 'Dentro de los líderes', 3, '2018-02-20 06:49:34', '2018-03-28 09:30:33', 1);
INSERT INTO `survey_answers` VALUES (321, 84, 'Dentro del promedio', 2, '2018-02-20 06:49:41', '2018-02-20 06:49:41', 1);
COMMIT;

-- ----------------------------
-- Table structure for survey_banners
-- ----------------------------
DROP TABLE IF EXISTS `survey_banners`;
CREATE TABLE `survey_banners` (
  `Id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `ServicesId` int(11) NOT NULL,
  `Name` varchar(100) NOT NULL,
  `Description` varchar(255) DEFAULT NULL,
  `Image` varchar(255) NOT NULL,
  `Target` varchar(10) DEFAULT NULL,
  `Url` varchar(255) DEFAULT NULL,
  `Position` varchar(50) NOT NULL,
  `Status` int(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`Id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of survey_banners
-- ----------------------------
BEGIN;
INSERT INTO `survey_banners` VALUES (6, 3, 'banner 01', 'banner 01 description', 'banner01.png', '_blank', 'http://www.google.co.cr', 'top', 1);
INSERT INTO `survey_banners` VALUES (7, 3, 'banner002', '', 'banner02.png', '_blank', '', 'top', 1);
INSERT INTO `survey_banners` VALUES (14, 21, 'banner03', '', 'banner03.png', '_blank', '#', 'bottom', 1);
COMMIT;

-- ----------------------------
-- Table structure for survey_cares
-- ----------------------------
DROP TABLE IF EXISTS `survey_cares`;
CREATE TABLE `survey_cares` (
  `Id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `ZonesId` int(11) DEFAULT NULL,
  `Name` varchar(100) NOT NULL,
  `Status` int(1) NOT NULL,
  PRIMARY KEY (`Id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=51 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of survey_cares
-- ----------------------------
BEGIN;
INSERT INTO `survey_cares` VALUES (15, 4, 'Alejandro Masis', 1);
INSERT INTO `survey_cares` VALUES (16, 4, 'Alvaro Sequeira', 1);
INSERT INTO `survey_cares` VALUES (17, 4, 'Cristian Cabezas', 1);
INSERT INTO `survey_cares` VALUES (18, 4, 'German González', 1);
INSERT INTO `survey_cares` VALUES (19, 4, 'Hayram Gutiérrez', 1);
INSERT INTO `survey_cares` VALUES (20, 4, 'Israel Guido', 1);
INSERT INTO `survey_cares` VALUES (21, 4, 'Javier Ramírez', 1);
INSERT INTO `survey_cares` VALUES (22, 4, 'Juan Carlos González', 1);
INSERT INTO `survey_cares` VALUES (23, 4, 'Katherine Benavides', 1);
INSERT INTO `survey_cares` VALUES (24, 4, 'Luis Diego Montero', 1);
INSERT INTO `survey_cares` VALUES (25, 4, 'Luis Porras', 1);
INSERT INTO `survey_cares` VALUES (26, 0, 'No lo conozco', 1);
INSERT INTO `survey_cares` VALUES (27, 11, 'Alfredo Franco', 1);
INSERT INTO `survey_cares` VALUES (28, 11, 'Allen Chiriboga', 1);
INSERT INTO `survey_cares` VALUES (29, 11, 'Carlos Espinoza', 1);
INSERT INTO `survey_cares` VALUES (30, 11, 'Carlos Jurado', 1);
INSERT INTO `survey_cares` VALUES (31, 11, 'Carlos Luis Gonzalez', 1);
INSERT INTO `survey_cares` VALUES (32, 11, 'Claudio Flores', 1);
INSERT INTO `survey_cares` VALUES (33, 11, 'Daniela Morales', 1);
INSERT INTO `survey_cares` VALUES (34, 11, 'Diego Zambrano', 1);
INSERT INTO `survey_cares` VALUES (35, 11, 'Edison Coloma', 1);
INSERT INTO `survey_cares` VALUES (36, 11, 'Eliana Gonzalez', 1);
INSERT INTO `survey_cares` VALUES (37, 11, 'Elizabeth Vera', 1);
INSERT INTO `survey_cares` VALUES (38, 11, 'Héctor Muzo', 1);
INSERT INTO `survey_cares` VALUES (39, 11, 'Irina Rivas', 1);
INSERT INTO `survey_cares` VALUES (40, 11, 'Jorge Rodríguez', 1);
INSERT INTO `survey_cares` VALUES (41, 11, 'Luis Díaz', 1);
INSERT INTO `survey_cares` VALUES (42, 11, 'Mabel Retamal', 1);
INSERT INTO `survey_cares` VALUES (43, 11, 'Marcelo Pinargote', 1);
INSERT INTO `survey_cares` VALUES (44, 11, 'Mauricio Moretta', 1);
INSERT INTO `survey_cares` VALUES (45, 11, 'Michelle  Avilés', 1);
INSERT INTO `survey_cares` VALUES (46, 11, 'Oscar Pozo', 1);
INSERT INTO `survey_cares` VALUES (47, 11, 'Roberto Marroquín', 1);
INSERT INTO `survey_cares` VALUES (48, 11, 'Verónica Sotomayor', 1);
COMMIT;

-- ----------------------------
-- Table structure for survey_customers
-- ----------------------------
DROP TABLE IF EXISTS `survey_customers`;
CREATE TABLE `survey_customers` (
  `Id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `FirstName` varchar(25) NOT NULL,
  `LastName` varchar(25) NOT NULL,
  `Identification` int(11) DEFAULT NULL,
  `Phone` varchar(25) DEFAULT NULL,
  `Email` varchar(255) DEFAULT NULL,
  `Company` varchar(100) DEFAULT NULL,
  `Position` varchar(100) DEFAULT NULL,
  `Care` varchar(100) DEFAULT NULL,
  `Local` varchar(100) DEFAULT NULL,
  `Country` varchar(25) DEFAULT NULL,
  `State` varchar(50) DEFAULT NULL,
  `City` varchar(50) DEFAULT NULL,
  `CustomInfo1` varchar(255) DEFAULT NULL,
  `CustomInfo2` varchar(255) DEFAULT NULL,
  `CustomInfo3` varchar(255) DEFAULT NULL,
  `CustomInfo4` varchar(255) DEFAULT NULL,
  `CustomInfo5` varchar(255) DEFAULT NULL,
  `SessionId` varchar(255) DEFAULT NULL,
  `CreateDate` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `LastUpdate` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `Status` int(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`Id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=167 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of survey_customers
-- ----------------------------
BEGIN;
INSERT INTO `survey_customers` VALUES (132, 'test', 'test', 0, '', '', '', '', '', '', 'Costa Rica', '', '', '', NULL, NULL, NULL, NULL, 'q684vt1pbreb35qi8l7nfnf013', '2018-03-28 12:30:22', '2018-03-28 12:30:22', 1);
INSERT INTO `survey_customers` VALUES (133, 'test', 'test', 0, '', '', '', '', '', '', 'Costa Rica', '', '', '', NULL, NULL, NULL, NULL, 'q684vt1pbreb35qi8l7nfnf013', '2018-03-28 12:30:30', '2018-03-28 12:30:30', 1);
INSERT INTO `survey_customers` VALUES (134, 'test', 'test', 0, '', '', '', '', '', '', 'Costa Rica', '', '', '', NULL, NULL, NULL, NULL, 'q684vt1pbreb35qi8l7nfnf013', '2018-03-28 12:30:34', '2018-03-28 12:30:34', 1);
INSERT INTO `survey_customers` VALUES (135, 'test', 'test', 0, '', '', '', '', '', '', 'Costa Rica', '', '', '', NULL, NULL, NULL, NULL, 'q684vt1pbreb35qi8l7nfnf013', '2018-03-28 12:31:11', '2018-03-28 12:31:11', 1);
INSERT INTO `survey_customers` VALUES (136, 'TEST', '', 0, '', '', '', '', '', '', 'Costa Rica', '', '', '', NULL, NULL, NULL, NULL, 'u4h4hlge6rtjv5h0vb77n60sk2', '2018-03-28 16:59:03', '2018-03-28 16:59:03', 1);
INSERT INTO `survey_customers` VALUES (137, 'test', '', 0, '', '', '', '', '', '', 'Costa Rica', '', '', '', NULL, NULL, NULL, NULL, '7sa2g7q2pai4hde8t3iikb1gb2', '2018-03-28 17:48:47', '2018-03-28 17:48:47', 1);
INSERT INTO `survey_customers` VALUES (138, 'test', '', 0, '', '', '', '', '', '', 'Costa Rica', 'San José', 'Escazú', 'Entre 1 y 3', NULL, NULL, NULL, NULL, 'q9lbdq1f79g78l2k07k8qb1pu6', '2018-03-29 12:33:35', '2018-03-29 12:33:35', 1);
INSERT INTO `survey_customers` VALUES (139, 'TEST', '', 0, '', '', '', '', 'Alvaro Sequeira', 'Fábrica Santa Ana', 'Costa Rica', 'Cartago', 'El Guarco', 'Entre 3 y 5', NULL, NULL, NULL, NULL, 'uonuosqtoe7cihm6evdbp81c70', '2018-03-29 14:50:28', '2018-03-29 14:50:28', 1);
INSERT INTO `survey_customers` VALUES (140, 'test', '', 0, '', '', '', '', '', '', 'Ecuador', '', '', '', NULL, NULL, NULL, NULL, 'onc2cjenbn2loan3p3m87qkf02', '2018-03-29 16:49:40', '2018-03-29 16:49:40', 1);
INSERT INTO `survey_customers` VALUES (141, 'test', '', 0, '', '', '', '', '', '', 'Costa Rica', '', '', '', NULL, NULL, NULL, NULL, 'jbisd0266jqo9sp1iu1mqp4ct5', '2018-03-29 18:31:38', '2018-03-29 18:31:38', 1);
INSERT INTO `survey_customers` VALUES (142, 'test', '', 0, '', '', '', '', '', '', 'Costa Rica', '14', '47', '', NULL, NULL, NULL, NULL, 'skdlp2ek287uhp5dhhpb6a6ca5', '2018-03-30 22:46:43', '2018-03-30 22:46:43', 1);
INSERT INTO `survey_customers` VALUES (143, 'test', '', 0, '', '', '', '', '', '', 'Costa Rica', 'Alajuela', 'Grecia', '', NULL, NULL, NULL, NULL, 'g0f37igobter1rhqt7rpg7fu62', '2018-03-30 22:52:38', '2018-03-30 22:52:38', 1);
INSERT INTO `survey_customers` VALUES (144, 'test', '', 0, '', '', '', '', '', '', 'Ecuador', 'Cotopaxi', 'Pujilí', '', NULL, NULL, NULL, NULL, '36p4krtamm88p1qlf308l2dsg0', '2018-03-30 23:03:43', '2018-03-30 23:03:43', 1);
INSERT INTO `survey_customers` VALUES (145, 'test', '', 0, '', '', '', '', '', '', 'Costa Rica', '', '', '', NULL, NULL, NULL, NULL, 'vnfeerennv8jm166o0u6qjbo91', '2018-03-30 23:14:19', '2018-03-30 23:14:19', 1);
INSERT INTO `survey_customers` VALUES (146, 'test', '', 0, '', '', '', '', '', '', 'Costa Rica', '', '', '', NULL, NULL, NULL, NULL, 's7i43nc1h0tiuj283d0eagi7j4', '2018-03-30 23:33:50', '2018-03-30 23:33:50', 1);
INSERT INTO `survey_customers` VALUES (147, 'test', '', 0, '', '', '', '', '', '', 'Costa Rica', '', '', '', NULL, NULL, NULL, NULL, 'q8i7piv74ijqsd84l5t5oj8mu4', '2018-03-30 23:34:34', '2018-03-30 23:34:34', 1);
INSERT INTO `survey_customers` VALUES (148, 'test', '', 0, '', '', '', '', '', '', 'Costa Rica', '', '', '', NULL, NULL, NULL, NULL, '8qbda4cgjr1i5dsdbv0t806q53', '2018-03-30 23:37:31', '2018-03-30 23:37:31', 1);
INSERT INTO `survey_customers` VALUES (149, 'test', '', 0, '', '', '', '', '', '', 'Costa Rica', '', '', '', NULL, NULL, NULL, NULL, 'b6askfr8rmhg2bgh63u9egobc1', '2018-03-31 00:00:27', '2018-03-31 00:00:27', 1);
INSERT INTO `survey_customers` VALUES (150, 'teest', '', 0, '', '', '', '', '', '', 'Ecuador', '', '', '', NULL, NULL, NULL, NULL, 'g0oingifl0ubm3kbkgsi6ga0n2', '2018-03-31 00:00:51', '2018-03-31 00:00:51', 1);
INSERT INTO `survey_customers` VALUES (151, 'test', '', 0, '', '', '', '', '', '', 'Costa Rica', '', '', '', NULL, NULL, NULL, NULL, '9i8g3aad95jr39v59luudr8uf4', '2018-03-31 00:02:30', '2018-03-31 00:02:30', 1);
INSERT INTO `survey_customers` VALUES (152, 'test', '', 0, '', '', '', '', '', '', 'Ecuador', '', '', '', NULL, NULL, NULL, NULL, '0d3b4808b6790398d2271c9dfee0b364', '2018-03-31 02:23:15', '2018-03-31 02:23:15', 1);
INSERT INTO `survey_customers` VALUES (153, 'test', '', 0, '', '', '', '', '', '', 'Ecuador', '', '', '', NULL, NULL, NULL, NULL, 'c6a0070d132118402f7b7bca57b6e8f2', '2018-03-31 02:23:30', '2018-03-31 02:23:30', 1);
INSERT INTO `survey_customers` VALUES (154, 'test', '', 0, '', '', '', '', '', '', 'Costa Rica', '', '', '', NULL, NULL, NULL, NULL, '083082c0ea2502512253693740257b14', '2018-03-31 02:23:45', '2018-03-31 02:23:45', 1);
INSERT INTO `survey_customers` VALUES (155, 'test', '', 0, '', '', '', '', '', '', 'Costa Rica', 'Cartago', 'El Guarco', '', NULL, NULL, NULL, NULL, '8ba71634981938337daca41ed103f4c7', '2018-03-31 02:30:39', '2018-03-31 02:30:39', 1);
INSERT INTO `survey_customers` VALUES (156, 'sdasda', '', 0, '', '', '', '', '', '', 'Costa Rica', '', '', '', NULL, NULL, NULL, NULL, '8410bd7fb9a6cd1969f54d42f44333a1', '2018-04-02 12:20:40', '2018-04-02 12:20:40', 1);
INSERT INTO `survey_customers` VALUES (157, 'tghfh', '', 0, '', '', '', '', '', '', 'Costa Rica', '', '', '', NULL, NULL, NULL, NULL, 'd2ed1006a7d8476f0a5e9ab8989521db', '2018-04-02 12:42:14', '2018-04-02 12:42:14', 1);
INSERT INTO `survey_customers` VALUES (158, 'TEST', '', 0, '', '', '', '', '', '', 'Costa Rica', '', '', '', NULL, NULL, NULL, NULL, 'f14ea3459aa61a0264c0886a25efeca5', '2018-04-02 12:56:32', '2018-04-02 12:56:32', 1);
INSERT INTO `survey_customers` VALUES (159, 'dshfshfx', '', 0, '', '', '', '', '', '', 'Costa Rica', '', '', '', NULL, NULL, NULL, NULL, '98fc52cbc93ed8055a336621285c3e0e', '2018-04-02 12:59:35', '2018-04-02 12:59:35', 1);
INSERT INTO `survey_customers` VALUES (160, 'zsadasd', '', 0, '', '', '', '', '', '', 'Ecuador', '', '', '', NULL, NULL, NULL, NULL, '6ab9237d384cc7cefc9a1f6f06ba5d1c', '2018-04-02 13:13:33', '2018-04-02 13:13:33', 1);
INSERT INTO `survey_customers` VALUES (161, 'as', '', 0, '', '', '', '', '', '', 'Ecuador', '', '', '', NULL, NULL, NULL, NULL, '5aab2cea885ef82f482fdd057cae7d2e', '2018-04-02 13:14:26', '2018-04-02 13:14:26', 1);
INSERT INTO `survey_customers` VALUES (162, 'jkkh', '', 0, '', '', '', '', '', '', 'Costa Rica', '', '', '', NULL, NULL, NULL, NULL, 'b65f9658b04877d79adb6294d07154ab', '2018-04-02 13:31:08', '2018-04-02 13:31:08', 1);
INSERT INTO `survey_customers` VALUES (163, 'klpñ', '', 0, '', '', '', '', '', '', 'Costa Rica', '', '', '', NULL, NULL, NULL, NULL, '4d811b9d769fa3021cee8b9fff4efce5', '2018-04-02 13:34:21', '2018-04-02 13:34:21', 1);
INSERT INTO `survey_customers` VALUES (164, 'test', '', 0, '', '', '', '', '', '', 'Costa Rica', '', '', '', NULL, NULL, NULL, NULL, '794db5ab40e25c5137937b9fafb95f09', '2018-04-02 13:37:29', '2018-04-02 13:37:29', 1);
INSERT INTO `survey_customers` VALUES (165, 'ko', '', 0, '', '', '', '', '', '', 'Ecuador', '', '', '', NULL, NULL, NULL, NULL, '684d51aab5ddb0c9eb184888a003aa84', '2018-04-02 13:55:05', '2018-04-02 13:55:05', 1);
INSERT INTO `survey_customers` VALUES (166, 'TEST', '', 0, '', '', '', '', '', '', 'Costa Rica', '', '', '', NULL, NULL, NULL, NULL, 'lkgho1tah1hsiel6qknjm6i880', '2018-04-02 17:16:51', '2018-04-02 17:16:51', 1);
COMMIT;

-- ----------------------------
-- Table structure for survey_locals
-- ----------------------------
DROP TABLE IF EXISTS `survey_locals`;
CREATE TABLE `survey_locals` (
  `Id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `ZonesId` int(11) DEFAULT NULL,
  `Name` varchar(100) NOT NULL,
  `Status` int(1) NOT NULL,
  PRIMARY KEY (`Id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=34 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of survey_locals
-- ----------------------------
BEGIN;
INSERT INTO `survey_locals` VALUES (29, 4, 'Fábrica Santa Ana', 1);
INSERT INTO `survey_locals` VALUES (30, 11, 'Región Norte', 1);
INSERT INTO `survey_locals` VALUES (31, 11, 'Región Sur', 1);
COMMIT;

-- ----------------------------
-- Table structure for survey_positions
-- ----------------------------
DROP TABLE IF EXISTS `survey_positions`;
CREATE TABLE `survey_positions` (
  `Id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `ZonesId` int(11) DEFAULT NULL,
  `Name` varchar(100) NOT NULL,
  `Status` int(1) NOT NULL,
  PRIMARY KEY (`Id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of survey_positions
-- ----------------------------
BEGIN;
INSERT INTO `survey_positions` VALUES (2, 0, 'Analista', 1);
INSERT INTO `survey_positions` VALUES (3, 0, 'Bodeguero', 1);
INSERT INTO `survey_positions` VALUES (4, 0, 'Dueño', 1);
INSERT INTO `survey_positions` VALUES (5, 0, 'Gerente General /Administrador', 1);
INSERT INTO `survey_positions` VALUES (6, 0, 'Gerente/Jefe  ventas', 1);
INSERT INTO `survey_positions` VALUES (7, 0, 'Jefe de categorías', 1);
INSERT INTO `survey_positions` VALUES (8, 0, 'Proveedor/Comprador', 1);
INSERT INTO `survey_positions` VALUES (10, 0, 'Vendedor', 1);
INSERT INTO `survey_positions` VALUES (11, 0, 'Otro', 1);
COMMIT;

-- ----------------------------
-- Table structure for survey_questions
-- ----------------------------
DROP TABLE IF EXISTS `survey_questions`;
CREATE TABLE `survey_questions` (
  `Id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `SurveyId` int(11) NOT NULL,
  `Question` varchar(255) NOT NULL,
  `Description` varchar(255) DEFAULT NULL,
  `CreateDate` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `LastUpdate` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `Status` int(1) NOT NULL DEFAULT '1',
  `Order` int(5) NOT NULL DEFAULT '0',
  PRIMARY KEY (`Id`) USING BTREE,
  UNIQUE KEY `SurveyId` (`SurveyId`,`Question`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=90 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of survey_questions
-- ----------------------------
BEGIN;
INSERT INTO `survey_questions` VALUES (31, 14, 'Facilidad para contactar', '', '2018-02-08 09:53:07', '2018-02-08 09:53:07', 1, 0);
INSERT INTO `survey_questions` VALUES (32, 14, 'Cantidad de visitas', '', '2018-02-08 09:53:13', '2018-02-08 09:53:13', 1, 0);
INSERT INTO `survey_questions` VALUES (33, 14, 'Las visitas le brindan utilidad', '', '2018-02-08 09:53:18', '2018-02-08 09:53:18', 1, 0);
INSERT INTO `survey_questions` VALUES (34, 14, 'Profesionalismo', '', '2018-02-08 09:53:23', '2018-02-08 09:53:23', 1, 0);
INSERT INTO `survey_questions` VALUES (35, 14, 'Conocimiento del producto INTACO', '', '2018-02-08 09:53:32', '2018-02-08 09:53:32', 1, 0);
INSERT INTO `survey_questions` VALUES (36, 14, 'Rapidez en la resolución de consultas', '', '2018-02-08 09:53:38', '2018-03-28 09:30:42', 1, 0);
INSERT INTO `survey_questions` VALUES (37, 15, '¿Cómo calificaría su grado de satisfacción con INTACO?', '', '2018-02-20 05:49:50', '2018-03-28 09:34:28', 1, 0);
INSERT INTO `survey_questions` VALUES (38, 56, '¿Cuáles son los 3 principales motivos por los que trabaja con INTACO?', '<!DOCTYPE html>\r\n<html>\r\n<head>\r\n</head>\r\n<body>\r\n\r\n</body>\r\n</html>', '2018-02-20 05:51:08', '2018-03-28 09:34:28', 1, 0);
INSERT INTO `survey_questions` VALUES (39, 16, 'En el último año, ¿cómo ha evolucionado el nivel de servicio que le ofrecemos?', '', '2018-02-20 05:52:46', '2018-03-28 09:35:25', 1, 0);
INSERT INTO `survey_questions` VALUES (41, 17, 'Facilidad para contactar a INTACO', '', '2018-02-20 05:57:58', '2018-02-20 05:57:58', 1, 0);
INSERT INTO `survey_questions` VALUES (42, 17, 'Facilidad para realizar pedidos', '', '2018-02-20 05:58:03', '2018-02-20 05:58:03', 1, 0);
INSERT INTO `survey_questions` VALUES (43, 17, 'Rapidez en la resolución de consultas de sus pedidos', '', '2018-02-20 05:58:08', '2018-03-28 09:30:42', 1, 0);
INSERT INTO `survey_questions` VALUES (44, 17, 'Disponibilidad de producto', '', '2018-02-20 05:58:12', '2018-02-20 05:58:12', 1, 0);
INSERT INTO `survey_questions` VALUES (45, 17, 'Cumplimiento con nuestro compromiso de entrega en su punto de venta', '', '2018-02-20 05:58:18', '2018-02-20 05:58:18', 1, 0);
INSERT INTO `survey_questions` VALUES (46, 17, 'Cumplimiento de entrega en menos de 45 min cuando recoge en nuestra bodega', '', '2018-02-20 05:58:25', '2018-02-20 05:58:25', 1, 0);
INSERT INTO `survey_questions` VALUES (50, 18, 'Reclamos de productos', '', '2018-02-20 06:17:08', '2018-02-20 06:25:17', 1, 0);
INSERT INTO `survey_questions` VALUES (52, 18, 'Reclamos por errores de despacho	', '', '2018-02-20 06:26:44', '2018-02-20 06:26:44', 1, 0);
INSERT INTO `survey_questions` VALUES (53, 20, 'Facilidad de colocar su reclamo', '', '2018-02-20 06:31:26', '2018-02-20 06:31:26', 1, 0);
INSERT INTO `survey_questions` VALUES (54, 20, 'Rapidez de respuesta de parte de INTACO', '', '2018-02-20 06:31:30', '2018-02-20 06:31:30', 1, 0);
INSERT INTO `survey_questions` VALUES (55, 20, 'Seguimiento y retroalimentación', '', '2018-02-20 06:31:38', '2018-03-28 09:30:42', 1, 0);
INSERT INTO `survey_questions` VALUES (56, 20, 'Rapidez en la resolución', '', '2018-02-20 06:31:43', '2018-03-28 09:30:42', 1, 0);
INSERT INTO `survey_questions` VALUES (57, 20, 'Satisfacción con la resolución', '', '2018-02-20 06:31:49', '2018-03-28 09:30:42', 1, 0);
INSERT INTO `survey_questions` VALUES (58, 22, 'Claridad en la política de precios', '', '2018-02-20 06:37:52', '2018-03-28 09:30:33', 1, 0);
INSERT INTO `survey_questions` VALUES (59, 22, 'Rentabilidad para el distribuidor', '', '2018-02-20 06:37:56', '2018-02-20 06:37:56', 1, 0);
INSERT INTO `survey_questions` VALUES (60, 22, 'Rotación del producto', '', '2018-02-20 06:38:00', '2018-03-28 09:30:42', 1, 0);
INSERT INTO `survey_questions` VALUES (61, 22, 'Condiciones de crédito', '', '2018-02-20 06:38:04', '2018-03-28 09:29:28', 1, 0);
INSERT INTO `survey_questions` VALUES (62, 23, 'Calidad', '', '2018-02-20 06:40:30', '2018-02-20 06:40:30', 1, 0);
INSERT INTO `survey_questions` VALUES (63, 23, 'Relación calidad/ precio', '', '2018-02-20 06:40:34', '2018-03-28 09:30:42', 1, 0);
INSERT INTO `survey_questions` VALUES (64, 23, 'Variedad', '', '2018-02-20 06:40:38', '2018-02-20 06:40:38', 1, 0);
INSERT INTO `survey_questions` VALUES (65, 23, 'Alta demanda del consumidor final', '', '2018-02-20 06:40:56', '2018-02-20 06:40:56', 1, 0);
INSERT INTO `survey_questions` VALUES (66, 23, 'Facilidad de uso de nuestros productos', '', '2018-02-20 06:41:00', '2018-02-20 06:41:00', 1, 0);
INSERT INTO `survey_questions` VALUES (67, 23, 'Presentación/Empaque', '', '2018-02-20 06:41:04', '2018-03-28 09:30:42', 1, 0);
INSERT INTO `survey_questions` VALUES (68, 23, 'Disponibilidad de Información técnica ', '', '2018-02-20 06:41:08', '2018-03-28 09:30:42', 1, 0);
INSERT INTO `survey_questions` VALUES (69, 24, 'Promociones', '', '2018-02-20 06:43:24', '2018-02-20 06:43:24', 1, 0);
INSERT INTO `survey_questions` VALUES (70, 24, 'Demostraciones de producto a obras', '', '2018-02-20 06:43:29', '2018-02-20 06:43:29', 1, 0);
INSERT INTO `survey_questions` VALUES (71, 24, 'Capacitaciones a su fuerza de ventas', '', '2018-02-20 06:43:33', '2018-02-20 06:43:33', 1, 0);
INSERT INTO `survey_questions` VALUES (72, 24, 'Promotoría / Impulsación de productos en el punto de venta y apoyo en actividades especiales', '', '2018-02-20 06:43:38', '2018-03-28 09:30:42', 1, 0);
INSERT INTO `survey_questions` VALUES (73, 24, 'Apoyo en la rotación de su inventario', '', '2018-02-20 06:44:02', '2018-03-28 09:30:42', 1, 0);
INSERT INTO `survey_questions` VALUES (74, 24, 'Productos de alta rentabilidad', '', '2018-02-20 06:44:07', '2018-02-20 06:44:07', 1, 0);
INSERT INTO `survey_questions` VALUES (75, 25, 'INTACO es cercano', 'Contactar al personal de INTACO es fácil. INTACO es profesional, conoce las necesidades de sus clientes, es amable y busca resolver sus consultas.\r\n', '2018-02-20 06:46:06', '2018-03-28 09:29:18', 1, 0);
INSERT INTO `survey_questions` VALUES (76, 25, 'INTACO se preocupa', 'Confío en INTACO, en su personal y productos. INTACO me apoya y es comprensivo ante mis necesidades.\r\n', '2018-02-20 06:46:27', '2018-03-28 09:30:33', 1, 0);
INSERT INTO `survey_questions` VALUES (77, 25, 'INTACO hace crecer a sus clientes', 'INTACO me hace crecer. Sus productos son solicitados por el mercado. Son de de alta rotación y me generan utilidad. El personal de INTACO se preocupa en generarme negocios.\r\n', '2018-02-20 06:46:40', '2018-03-28 09:30:42', 1, 0);
INSERT INTO `survey_questions` VALUES (78, 26, 'Empresa innovadora', '', '2018-02-20 06:48:38', '2018-02-20 06:48:38', 1, 0);
INSERT INTO `survey_questions` VALUES (79, 26, 'Empresa generadora de rentabilidad', '', '2018-02-20 06:48:42', '2018-02-20 06:48:42', 1, 0);
INSERT INTO `survey_questions` VALUES (80, 26, 'Empresa con quién realizar negocios es ágil y fácil', '', '2018-02-20 06:48:46', '2018-03-28 09:32:57', 1, 0);
INSERT INTO `survey_questions` VALUES (81, 26, 'Empresa de trato cercano y amigable', '', '2018-02-20 06:49:05', '2018-02-20 06:49:05', 1, 0);
INSERT INTO `survey_questions` VALUES (82, 26, 'Empresa responsable', '', '2018-02-20 06:49:11', '2018-02-20 06:49:11', 1, 0);
INSERT INTO `survey_questions` VALUES (83, 26, 'Empresa sólida', '', '2018-02-20 06:49:16', '2018-03-28 09:30:42', 1, 0);
INSERT INTO `survey_questions` VALUES (84, 26, 'Empresa de nivel internacional', '', '2018-02-20 06:49:20', '2018-02-20 06:49:20', 1, 0);
COMMIT;

-- ----------------------------
-- Table structure for survey_services
-- ----------------------------
DROP TABLE IF EXISTS `survey_services`;
CREATE TABLE `survey_services` (
  `Id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `ZonesId` int(11) NOT NULL DEFAULT '0',
  `Name` varchar(100) DEFAULT NULL,
  `Description` varchar(255) DEFAULT NULL,
  `Details` text,
  `Terms` text,
  `Status` int(1) DEFAULT NULL,
  PRIMARY KEY (`Id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of survey_services
-- ----------------------------
BEGIN;
INSERT INTO `survey_services` VALUES (3, 4, 'Promesa de valor INTACO', 'Exclusiva para distribuidores INTACO', '<!DOCTYPE html>\r\n<html>\r\n<head>\r\n</head>\r\n<body>\r\n<p>Comparte tu experiencia con nuestro servicio y queda participando en la rifa de:<br /><br />10 pantallas planas de 32\"</p>\r\n<hr />\r\n<p><strong>&iquest;C&oacute;mo participar?</strong></p>\r\n<p>1.Tienes que trabajar en un Distribuidor de INTACO.</p>\r\n<p>2.Ingresa tus datos personales y los del negocio adonde trabajas.</p>\r\n<p>3.Responde las 12 preguntas.</p>\r\n<p>4.Comparte tus comentarios finales.</p>\r\n<p>5.&iexcl;Listo! Quedas participando.</p>\r\n<p>Fecha del sorteo: 28 de mayo, 2018</p>\r\n</body>\r\n</html>', '<!DOCTYPE html>\r\n<html>\r\n<head>\r\n</head>\r\n<body>\r\n<div>\r\n<div>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Illo error ratione adipisci, maiores excepturi aut voluptatibus veniam nemo ipsam? Blanditiis atque soluta qui consequatur hic incidunt autem iste voluptas? Ipsum.</div>\r\n</div>\r\n</body>\r\n</html>', 1);
INSERT INTO `survey_services` VALUES (19, 0, 'Encuesta 2', 'Detalle', '<!DOCTYPE html>\r\n<html>\r\n<head>\r\n</head>\r\n<body>\r\n\r\n</body>\r\n</html>', '<!DOCTYPE html>\r\n<html>\r\n<head>\r\n</head>\r\n<body>\r\n\r\n</body>\r\n</html>', 1);
INSERT INTO `survey_services` VALUES (20, 0, 'Encuesta 3', 'Detalle', '<!DOCTYPE html>\r\n<html>\r\n<head>\r\n</head>\r\n<body>\r\n\r\n</body>\r\n</html>', '<!DOCTYPE html>\r\n<html>\r\n<head>\r\n</head>\r\n<body>\r\n\r\n</body>\r\n</html>', 1);
INSERT INTO `survey_services` VALUES (21, 11, 'Promesa de valor INTACO', 'Exclusiva para distribuidores INTACO', '<!DOCTYPE html>\r\n<html>\r\n<head>\r\n</head>\r\n<body>\r\n<p>Encuesta de promesa de valor intaco</p>\r\n<p>Comparte tu experiencia con nuestro servicio y queda participando en la rifa de:</p>\r\n<p>10 Smart TV de 32&ldquo;</p>\r\n<p>10 kits prepago de direct tv (incluye mundial)</p>\r\n<hr />\r\n<p>&iquest;C&oacute;mo participar?</p>\r\n<p>1.Tienes que trabajar en un Distribuidor de INTACO.</p>\r\n<p>2.Ingresa tus datos personales y los del negocio adonde trabajas.</p>\r\n<p>3.Responde las 12 preguntas.</p>\r\n<p>4.Comparte tus comentarios finales.</p>\r\n<p>5.&iexcl;Listo! Quedas participando.</p>\r\n<p>Fecha del sorteo: 28 de mayo, 2018</p>\r\n</body>\r\n</html>', '<!DOCTYPE html>\r\n<html>\r\n<head>\r\n</head>\r\n<body>\r\n\r\n</body>\r\n</html>', 1);
COMMIT;

-- ----------------------------
-- Table structure for survey_zones
-- ----------------------------
DROP TABLE IF EXISTS `survey_zones`;
CREATE TABLE `survey_zones` (
  `Id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `Name` varchar(100) NOT NULL,
  `Details` text,
  `Image` varchar(255) DEFAULT NULL,
  `ZonesId` int(11) NOT NULL DEFAULT '0',
  `Status` int(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`Id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=356 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of survey_zones
-- ----------------------------
BEGIN;
INSERT INTO `survey_zones` VALUES (4, 'Costa Rica', '<!DOCTYPE html>\r\n<html>\r\n<head>\r\n</head>\r\n<body>\r\n<h5>COMPARTE TU EXPERIENCIA CON NOSOTROS.</h5>\r\n<ul class=\"list-unstyled\">\r\n<li>Aceptamos tus cr&iacute;ticas constructivas.</li>\r\n<li>Agradecemos tu honestidad.</li>\r\n<li>Cualquier sugerencia que tengas nos ayuda a mejorar nuestro servicio.</li>\r\n</ul>\r\n</body>\r\n</html>', 'costarica.png', 0, 1);
INSERT INTO `survey_zones` VALUES (9, 'Panamá', '<!DOCTYPE html>\r\n<html>\r\n<head>\r\n</head>\r\n<body>\r\n<h3>COMPARTE TU EXPERIENCIA CON NOSOTROS.</h3>\r\n<ul class=\"list-unstyled\">\r\n<li>Aceptamos tus cr&iacute;ticas constructivas.</li>\r\n<li>Agradecemos tu honestidad.</li>\r\n<li>Cualquier sugerencia que tengas nos ayuda a mejorar nuestro servicio.</li>\r\n</ul>\r\n</body>\r\n</html>', 'panama.png', 0, 0);
INSERT INTO `survey_zones` VALUES (10, 'Nicaragua', '<!DOCTYPE html>\r\n<html>\r\n<head>\r\n</head>\r\n<body>\r\n<h3>COMPARTE TU EXPERIENCIA CON NOSOTROS.</h3>\r\n<ul class=\"list-unstyled\">\r\n<li>Aceptamos tus cr&iacute;ticas constructivas.</li>\r\n<li>Agradecemos tu honestidad.</li>\r\n<li>Cualquier sugerencia que tengas nos ayuda a mejorar nuestro servicio.</li>\r\n</ul>\r\n</body>\r\n</html>', 'nicaragua.png', 0, 0);
INSERT INTO `survey_zones` VALUES (11, 'Ecuador', '<!DOCTYPE html>\r\n<html>\r\n<head>\r\n</head>\r\n<body>\r\n<h3>COMPARTE TU EXPERIENCIA CON NOSOTROS.</h3>\r\n<ul class=\"list-unstyled\">\r\n<li>Aceptamos tus cr&iacute;ticas constructivas.</li>\r\n<li>Agradecemos tu honestidad.</li>\r\n<li>Cualquier sugerencia que tengas nos ayuda a mejorar nuestro servicio.</li>\r\n</ul>\r\n</body>\r\n</html>', 'ecuador.png', 0, 1);
INSERT INTO `survey_zones` VALUES (12, 'Alajuela', NULL, '', 4, 1);
INSERT INTO `survey_zones` VALUES (13, 'Cartago', NULL, '', 4, 1);
INSERT INTO `survey_zones` VALUES (14, 'Guanacaste', NULL, '', 4, 1);
INSERT INTO `survey_zones` VALUES (15, 'Heredia', NULL, '', 4, 1);
INSERT INTO `survey_zones` VALUES (16, 'Limón', NULL, '', 4, 1);
INSERT INTO `survey_zones` VALUES (17, 'Puntarenas', NULL, '', 4, 1);
INSERT INTO `survey_zones` VALUES (18, 'San José', NULL, '', 4, 1);
INSERT INTO `survey_zones` VALUES (19, 'Alajuela', NULL, '', 12, 1);
INSERT INTO `survey_zones` VALUES (20, 'Atenas', NULL, '', 12, 1);
INSERT INTO `survey_zones` VALUES (21, 'Grecia', NULL, '', 12, 1);
INSERT INTO `survey_zones` VALUES (22, 'Guatuso', NULL, '', 12, 1);
INSERT INTO `survey_zones` VALUES (23, 'Los Chiles', NULL, '', 12, 1);
INSERT INTO `survey_zones` VALUES (24, 'Naranjo', NULL, '', 12, 1);
INSERT INTO `survey_zones` VALUES (25, 'Orotina', NULL, '', 12, 1);
INSERT INTO `survey_zones` VALUES (26, 'Palmares', NULL, '', 12, 1);
INSERT INTO `survey_zones` VALUES (27, 'Poás', NULL, '', 12, 1);
INSERT INTO `survey_zones` VALUES (28, 'San Carlos', NULL, '', 12, 1);
INSERT INTO `survey_zones` VALUES (29, 'San Mateo', NULL, '', 12, 1);
INSERT INTO `survey_zones` VALUES (30, 'Upala', NULL, '', 12, 1);
INSERT INTO `survey_zones` VALUES (31, 'Valverde Vega', NULL, '', 12, 1);
INSERT INTO `survey_zones` VALUES (32, 'Zarcero', NULL, '', 12, 1);
INSERT INTO `survey_zones` VALUES (33, 'Alvarado', NULL, '', 13, 1);
INSERT INTO `survey_zones` VALUES (34, 'Cartago', NULL, '', 13, 1);
INSERT INTO `survey_zones` VALUES (35, 'El Guarco', NULL, '', 13, 1);
INSERT INTO `survey_zones` VALUES (36, 'Jiménez', NULL, '', 13, 1);
INSERT INTO `survey_zones` VALUES (37, 'La Unión', NULL, '', 13, 1);
INSERT INTO `survey_zones` VALUES (38, 'Oreamuno', NULL, '', 13, 1);
INSERT INTO `survey_zones` VALUES (39, 'Paraiso', NULL, '', 13, 1);
INSERT INTO `survey_zones` VALUES (40, 'Turrialba', NULL, '', 13, 1);
INSERT INTO `survey_zones` VALUES (41, 'Abangares', NULL, '', 14, 1);
INSERT INTO `survey_zones` VALUES (42, 'Bagaces', NULL, '', 14, 1);
INSERT INTO `survey_zones` VALUES (43, 'Cañas', NULL, '', 14, 1);
INSERT INTO `survey_zones` VALUES (44, 'Carrillo', NULL, '', 14, 1);
INSERT INTO `survey_zones` VALUES (45, 'Hojancha', NULL, '', 14, 1);
INSERT INTO `survey_zones` VALUES (46, 'La Cruz', NULL, '', 14, 1);
INSERT INTO `survey_zones` VALUES (47, 'Liberia', NULL, '', 14, 1);
INSERT INTO `survey_zones` VALUES (48, 'Nandayure', NULL, '', 14, 1);
INSERT INTO `survey_zones` VALUES (49, 'Nicoya', NULL, '', 14, 1);
INSERT INTO `survey_zones` VALUES (50, 'Santa Cruz', NULL, '', 14, 1);
INSERT INTO `survey_zones` VALUES (51, 'Tilarán', NULL, '', 14, 1);
INSERT INTO `survey_zones` VALUES (52, 'Barva', NULL, '', 15, 1);
INSERT INTO `survey_zones` VALUES (53, 'Belén', NULL, '', 15, 1);
INSERT INTO `survey_zones` VALUES (54, 'Flores', NULL, '', 15, 1);
INSERT INTO `survey_zones` VALUES (55, 'Heredia', NULL, '', 15, 1);
INSERT INTO `survey_zones` VALUES (56, 'San Isidro', NULL, '', 15, 1);
INSERT INTO `survey_zones` VALUES (57, 'San Rafael', NULL, '', 15, 1);
INSERT INTO `survey_zones` VALUES (58, 'Santa Bárbara', NULL, '', 15, 1);
INSERT INTO `survey_zones` VALUES (60, 'Sarapiquí', NULL, '', 15, 1);
INSERT INTO `survey_zones` VALUES (61, 'Guácimo', NULL, '', 16, 1);
INSERT INTO `survey_zones` VALUES (62, 'Limón', NULL, '', 16, 1);
INSERT INTO `survey_zones` VALUES (63, 'Matina', NULL, '', 16, 1);
INSERT INTO `survey_zones` VALUES (64, 'Pococí', NULL, '', 16, 1);
INSERT INTO `survey_zones` VALUES (65, 'Siquirres', NULL, '', 16, 1);
INSERT INTO `survey_zones` VALUES (66, 'Talamanca', NULL, '', 16, 1);
INSERT INTO `survey_zones` VALUES (67, 'Buenos Aires', NULL, '', 17, 1);
INSERT INTO `survey_zones` VALUES (68, 'Corredores', NULL, '', 17, 1);
INSERT INTO `survey_zones` VALUES (69, 'Coto Brus', NULL, '', 17, 1);
INSERT INTO `survey_zones` VALUES (70, 'Esparza', NULL, '', 17, 1);
INSERT INTO `survey_zones` VALUES (71, 'Garabito', NULL, '', 17, 1);
INSERT INTO `survey_zones` VALUES (72, 'Golfito', NULL, '', 17, 1);
INSERT INTO `survey_zones` VALUES (73, 'Montes de Oro', NULL, '', 17, 1);
INSERT INTO `survey_zones` VALUES (74, 'Osa', NULL, '', 17, 1);
INSERT INTO `survey_zones` VALUES (75, 'Parrita', NULL, '', 17, 1);
INSERT INTO `survey_zones` VALUES (76, 'Puntarenas', NULL, '', 17, 1);
INSERT INTO `survey_zones` VALUES (77, 'Quepos', NULL, '', 17, 1);
INSERT INTO `survey_zones` VALUES (78, 'Acosta', NULL, '', 18, 1);
INSERT INTO `survey_zones` VALUES (79, 'Alajuelita', NULL, '', 18, 1);
INSERT INTO `survey_zones` VALUES (80, 'Aserrí', NULL, '', 18, 1);
INSERT INTO `survey_zones` VALUES (81, 'Curridabat', NULL, '', 18, 1);
INSERT INTO `survey_zones` VALUES (82, 'Desamparados', NULL, '', 18, 1);
INSERT INTO `survey_zones` VALUES (83, 'Dota', NULL, '', 18, 1);
INSERT INTO `survey_zones` VALUES (84, 'Escazú', NULL, '', 18, 1);
INSERT INTO `survey_zones` VALUES (85, 'Goicoechea', NULL, '', 18, 1);
INSERT INTO `survey_zones` VALUES (86, 'León Cortés', NULL, '', 18, 1);
INSERT INTO `survey_zones` VALUES (87, 'Montes de Oca', NULL, '', 18, 1);
INSERT INTO `survey_zones` VALUES (88, 'Mora', NULL, '', 18, 1);
INSERT INTO `survey_zones` VALUES (89, 'Moravia', NULL, '', 18, 1);
INSERT INTO `survey_zones` VALUES (90, 'Pérez Zeledón', NULL, '', 18, 1);
INSERT INTO `survey_zones` VALUES (91, 'Puriscal', NULL, '', 18, 1);
INSERT INTO `survey_zones` VALUES (92, 'San José', NULL, '', 18, 1);
INSERT INTO `survey_zones` VALUES (93, 'Santa Ana', NULL, '', 18, 1);
INSERT INTO `survey_zones` VALUES (94, 'Tarrazú', NULL, '', 18, 1);
INSERT INTO `survey_zones` VALUES (95, 'Tibás', NULL, '', 18, 1);
INSERT INTO `survey_zones` VALUES (96, 'Turrubares', NULL, '', 18, 1);
INSERT INTO `survey_zones` VALUES (97, 'Vázquez de Coronado', NULL, '', 18, 1);
INSERT INTO `survey_zones` VALUES (98, 'Azuay', '<!DOCTYPE html>\r\n<html>\r\n<head>\r\n</head>\r\n<body>\r\n\r\n</body>\r\n</html>', '', 11, 1);
INSERT INTO `survey_zones` VALUES (99, 'Camilo Ponce Enríquez', '<!DOCTYPE html>\r\n<html>\r\n<head>\r\n</head>\r\n<body>\r\n\r\n</body>\r\n</html>', '', 98, 1);
INSERT INTO `survey_zones` VALUES (100, 'Chordeleg', NULL, NULL, 98, 1);
INSERT INTO `survey_zones` VALUES (101, 'Cuenca', NULL, NULL, 98, 1);
INSERT INTO `survey_zones` VALUES (102, 'El Pan', NULL, NULL, 98, 1);
INSERT INTO `survey_zones` VALUES (103, 'Girón', '<!DOCTYPE html>\r\n<html>\r\n<head>\r\n</head>\r\n<body>\r\n\r\n</body>\r\n</html>', '', 98, 1);
INSERT INTO `survey_zones` VALUES (104, 'Guachapala', NULL, NULL, 98, 1);
INSERT INTO `survey_zones` VALUES (105, 'Gualaceo', NULL, NULL, 98, 1);
INSERT INTO `survey_zones` VALUES (106, 'Nabón', '<!DOCTYPE html>\r\n<html>\r\n<head>\r\n</head>\r\n<body>\r\n\r\n</body>\r\n</html>', '', 98, 1);
INSERT INTO `survey_zones` VALUES (107, 'Oña', '<!DOCTYPE html>\r\n<html>\r\n<head>\r\n</head>\r\n<body>\r\n\r\n</body>\r\n</html>', '', 98, 1);
INSERT INTO `survey_zones` VALUES (108, 'Paute', NULL, NULL, 98, 1);
INSERT INTO `survey_zones` VALUES (109, 'Pucará', '<!DOCTYPE html>\r\n<html>\r\n<head>\r\n</head>\r\n<body>\r\n\r\n</body>\r\n</html>', '', 98, 1);
INSERT INTO `survey_zones` VALUES (110, 'San Fernando', NULL, NULL, 98, 1);
INSERT INTO `survey_zones` VALUES (111, 'Santa Isabel', NULL, NULL, 98, 1);
INSERT INTO `survey_zones` VALUES (112, 'Sevilla de Oro', NULL, NULL, 98, 1);
INSERT INTO `survey_zones` VALUES (113, 'Sígsig', '<!DOCTYPE html>\r\n<html>\r\n<head>\r\n</head>\r\n<body>\r\n\r\n</body>\r\n</html>', '', 98, 1);
INSERT INTO `survey_zones` VALUES (114, 'Bolívar', '<!DOCTYPE html>\r\n<html>\r\n<head>\r\n</head>\r\n<body>\r\n\r\n</body>\r\n</html>', '', 11, 1);
INSERT INTO `survey_zones` VALUES (115, 'Caluma', NULL, NULL, 114, 1);
INSERT INTO `survey_zones` VALUES (116, 'Chillanes', NULL, NULL, 114, 1);
INSERT INTO `survey_zones` VALUES (117, 'Chimbo', NULL, NULL, 114, 1);
INSERT INTO `survey_zones` VALUES (118, 'Echeandía', '<!DOCTYPE html>\r\n<html>\r\n<head>\r\n</head>\r\n<body>\r\n\r\n</body>\r\n</html>', '', 114, 1);
INSERT INTO `survey_zones` VALUES (119, 'Guaranda', NULL, NULL, 114, 1);
INSERT INTO `survey_zones` VALUES (120, 'Las Naves', NULL, NULL, 114, 1);
INSERT INTO `survey_zones` VALUES (121, 'San Miguel', NULL, NULL, 114, 1);
INSERT INTO `survey_zones` VALUES (122, 'Cañar', '<!DOCTYPE html>\r\n<html>\r\n<head>\r\n</head>\r\n<body>\r\n\r\n</body>\r\n</html>', '', 11, 1);
INSERT INTO `survey_zones` VALUES (123, 'Azogues', NULL, NULL, 122, 1);
INSERT INTO `survey_zones` VALUES (124, 'Biblián', '<!DOCTYPE html>\r\n<html>\r\n<head>\r\n</head>\r\n<body>\r\n\r\n</body>\r\n</html>', '', 122, 1);
INSERT INTO `survey_zones` VALUES (125, 'Cañar', '<!DOCTYPE html>\r\n<html>\r\n<head>\r\n</head>\r\n<body>\r\n\r\n</body>\r\n</html>', '', 122, 1);
INSERT INTO `survey_zones` VALUES (126, 'Déleg', '<!DOCTYPE html>\r\n<html>\r\n<head>\r\n</head>\r\n<body>\r\n\r\n</body>\r\n</html>', '', 122, 1);
INSERT INTO `survey_zones` VALUES (127, 'El Tambo', NULL, NULL, 122, 1);
INSERT INTO `survey_zones` VALUES (128, 'La Troncal', NULL, NULL, 122, 1);
INSERT INTO `survey_zones` VALUES (129, 'Suscal', NULL, NULL, 122, 1);
INSERT INTO `survey_zones` VALUES (130, 'Carchi', NULL, NULL, 11, 1);
INSERT INTO `survey_zones` VALUES (131, 'Bolívar', '<!DOCTYPE html>\r\n<html>\r\n<head>\r\n</head>\r\n<body>\r\n\r\n</body>\r\n</html>', '', 130, 1);
INSERT INTO `survey_zones` VALUES (132, 'Espejo', NULL, NULL, 130, 1);
INSERT INTO `survey_zones` VALUES (133, 'Huaca', NULL, NULL, 130, 1);
INSERT INTO `survey_zones` VALUES (134, 'Mira', NULL, NULL, 130, 1);
INSERT INTO `survey_zones` VALUES (135, 'Montúfar', '<!DOCTYPE html>\r\n<html>\r\n<head>\r\n</head>\r\n<body>\r\n\r\n</body>\r\n</html>', '', 130, 1);
INSERT INTO `survey_zones` VALUES (136, 'Tulcán', '<!DOCTYPE html>\r\n<html>\r\n<head>\r\n</head>\r\n<body>\r\n\r\n</body>\r\n</html>', '', 130, 1);
INSERT INTO `survey_zones` VALUES (137, 'Chimborazo', NULL, NULL, 11, 1);
INSERT INTO `survey_zones` VALUES (138, 'Alausí', '<!DOCTYPE html>\r\n<html>\r\n<head>\r\n</head>\r\n<body>\r\n\r\n</body>\r\n</html>', '', 137, 1);
INSERT INTO `survey_zones` VALUES (139, 'Chambo', NULL, NULL, 137, 1);
INSERT INTO `survey_zones` VALUES (140, 'Chunchi', NULL, NULL, 137, 1);
INSERT INTO `survey_zones` VALUES (141, 'Colta', NULL, NULL, 137, 1);
INSERT INTO `survey_zones` VALUES (142, 'Cumandá', '<!DOCTYPE html>\r\n<html>\r\n<head>\r\n</head>\r\n<body>\r\n\r\n</body>\r\n</html>', '', 137, 1);
INSERT INTO `survey_zones` VALUES (143, 'Guamote', NULL, NULL, 137, 1);
INSERT INTO `survey_zones` VALUES (144, 'Guano', NULL, NULL, 137, 1);
INSERT INTO `survey_zones` VALUES (145, 'Pallatanga', NULL, NULL, 137, 1);
INSERT INTO `survey_zones` VALUES (146, 'Penipe', NULL, NULL, 137, 1);
INSERT INTO `survey_zones` VALUES (147, 'Riobamba', NULL, NULL, 137, 1);
INSERT INTO `survey_zones` VALUES (148, 'Cotopaxi', NULL, NULL, 11, 1);
INSERT INTO `survey_zones` VALUES (149, 'La Maná', '<!DOCTYPE html>\r\n<html>\r\n<head>\r\n</head>\r\n<body>\r\n\r\n</body>\r\n</html>', '', 148, 1);
INSERT INTO `survey_zones` VALUES (150, 'Latacunga', NULL, NULL, 148, 1);
INSERT INTO `survey_zones` VALUES (151, 'Pangua', NULL, NULL, 148, 1);
INSERT INTO `survey_zones` VALUES (152, 'Pujilí', '<!DOCTYPE html>\r\n<html>\r\n<head>\r\n</head>\r\n<body>\r\n\r\n</body>\r\n</html>', '', 148, 1);
INSERT INTO `survey_zones` VALUES (153, 'Salcedo', NULL, NULL, 148, 1);
INSERT INTO `survey_zones` VALUES (154, 'Saquisilí', '<!DOCTYPE html>\r\n<html>\r\n<head>\r\n</head>\r\n<body>\r\n\r\n</body>\r\n</html>', '', 148, 1);
INSERT INTO `survey_zones` VALUES (155, 'Sigchos', NULL, NULL, 148, 1);
INSERT INTO `survey_zones` VALUES (156, 'El Oro', NULL, NULL, 11, 1);
INSERT INTO `survey_zones` VALUES (157, 'Arenillas', NULL, NULL, 156, 1);
INSERT INTO `survey_zones` VALUES (158, 'Atahualpa', NULL, NULL, 156, 1);
INSERT INTO `survey_zones` VALUES (159, 'Balsas', NULL, NULL, 156, 1);
INSERT INTO `survey_zones` VALUES (160, 'Chilla', NULL, NULL, 156, 1);
INSERT INTO `survey_zones` VALUES (161, 'El Guabo', NULL, NULL, 156, 1);
INSERT INTO `survey_zones` VALUES (162, 'Huaquillas', NULL, NULL, 156, 1);
INSERT INTO `survey_zones` VALUES (163, 'Las Lajas', NULL, NULL, 156, 1);
INSERT INTO `survey_zones` VALUES (164, 'Machala', NULL, NULL, 156, 1);
INSERT INTO `survey_zones` VALUES (165, 'Marcabelí', '<!DOCTYPE html>\r\n<html>\r\n<head>\r\n</head>\r\n<body>\r\n\r\n</body>\r\n</html>', '', 156, 1);
INSERT INTO `survey_zones` VALUES (166, 'Pasaje', NULL, NULL, 156, 1);
INSERT INTO `survey_zones` VALUES (167, 'Piñas', '<!DOCTYPE html>\r\n<html>\r\n<head>\r\n</head>\r\n<body>\r\n\r\n</body>\r\n</html>', '', 156, 1);
INSERT INTO `survey_zones` VALUES (168, 'Portovelo', NULL, NULL, 156, 1);
INSERT INTO `survey_zones` VALUES (169, 'Santa Rosa', NULL, NULL, 156, 1);
INSERT INTO `survey_zones` VALUES (170, 'Zaruma', NULL, NULL, 156, 1);
INSERT INTO `survey_zones` VALUES (171, 'Esmeraldas', NULL, NULL, 11, 1);
INSERT INTO `survey_zones` VALUES (172, 'Atacames', NULL, NULL, 171, 1);
INSERT INTO `survey_zones` VALUES (173, 'Eloy Alfaro', NULL, NULL, 171, 1);
INSERT INTO `survey_zones` VALUES (174, 'Esmeraldas', NULL, NULL, 171, 1);
INSERT INTO `survey_zones` VALUES (175, 'Muisne', NULL, NULL, 171, 1);
INSERT INTO `survey_zones` VALUES (176, 'Quinindé', '<!DOCTYPE html>\r\n<html>\r\n<head>\r\n</head>\r\n<body>\r\n\r\n</body>\r\n</html>', '', 171, 1);
INSERT INTO `survey_zones` VALUES (177, 'Rioverde', NULL, NULL, 171, 1);
INSERT INTO `survey_zones` VALUES (178, 'San Lorenzo', NULL, NULL, 171, 1);
INSERT INTO `survey_zones` VALUES (179, 'Galápagos', '<!DOCTYPE html>\r\n<html>\r\n<head>\r\n</head>\r\n<body>\r\n\r\n</body>\r\n</html>', '', 11, 1);
INSERT INTO `survey_zones` VALUES (180, 'Isabela', NULL, NULL, 179, 1);
INSERT INTO `survey_zones` VALUES (181, 'San Cristóbal', '<!DOCTYPE html>\r\n<html>\r\n<head>\r\n</head>\r\n<body>\r\n\r\n</body>\r\n</html>', '', 179, 1);
INSERT INTO `survey_zones` VALUES (182, 'Santa Cruz', NULL, NULL, 179, 1);
INSERT INTO `survey_zones` VALUES (183, 'Guayas', NULL, NULL, 11, 1);
INSERT INTO `survey_zones` VALUES (184, 'Alfredo Baquerizo', NULL, NULL, 183, 1);
INSERT INTO `survey_zones` VALUES (185, 'Balao', NULL, NULL, 183, 1);
INSERT INTO `survey_zones` VALUES (186, 'Balzar', NULL, NULL, 183, 1);
INSERT INTO `survey_zones` VALUES (187, 'Colimes', NULL, NULL, 183, 1);
INSERT INTO `survey_zones` VALUES (188, 'Daule', NULL, NULL, 183, 1);
INSERT INTO `survey_zones` VALUES (189, 'Durán', '<!DOCTYPE html>\r\n<html>\r\n<head>\r\n</head>\r\n<body>\r\n\r\n</body>\r\n</html>', '', 183, 1);
INSERT INTO `survey_zones` VALUES (190, 'El Empalme', NULL, NULL, 183, 1);
INSERT INTO `survey_zones` VALUES (191, 'El Triunfo', NULL, NULL, 183, 1);
INSERT INTO `survey_zones` VALUES (192, 'General Antonio Elizalde', NULL, NULL, 183, 1);
INSERT INTO `survey_zones` VALUES (193, 'Guayaquil', NULL, NULL, 183, 1);
INSERT INTO `survey_zones` VALUES (194, 'Isidro Ayora', NULL, NULL, 183, 1);
INSERT INTO `survey_zones` VALUES (195, 'Lomas de Sargentillo', NULL, NULL, 183, 1);
INSERT INTO `survey_zones` VALUES (196, 'Marcelino Maridueña', '<!DOCTYPE html>\r\n<html>\r\n<head>\r\n</head>\r\n<body>\r\n\r\n</body>\r\n</html>', '', 183, 1);
INSERT INTO `survey_zones` VALUES (197, 'Milagro', NULL, NULL, 183, 1);
INSERT INTO `survey_zones` VALUES (198, 'Naranjal', NULL, NULL, 183, 1);
INSERT INTO `survey_zones` VALUES (199, 'Naranjito', NULL, NULL, 183, 1);
INSERT INTO `survey_zones` VALUES (200, 'Nobol', NULL, NULL, 183, 1);
INSERT INTO `survey_zones` VALUES (201, 'Palestina', NULL, NULL, 183, 1);
INSERT INTO `survey_zones` VALUES (202, 'Pedro Carbo', NULL, NULL, 183, 1);
INSERT INTO `survey_zones` VALUES (203, 'Playas', NULL, NULL, 183, 1);
INSERT INTO `survey_zones` VALUES (204, 'Salitre', NULL, NULL, 183, 1);
INSERT INTO `survey_zones` VALUES (205, 'Samborondón', '<!DOCTYPE html>\r\n<html>\r\n<head>\r\n</head>\r\n<body>\r\n\r\n</body>\r\n</html>', '', 183, 1);
INSERT INTO `survey_zones` VALUES (206, 'Santa Lucía', '<!DOCTYPE html>\r\n<html>\r\n<head>\r\n</head>\r\n<body>\r\n\r\n</body>\r\n</html>', '', 183, 1);
INSERT INTO `survey_zones` VALUES (207, 'Simón Bolívar', '<!DOCTYPE html>\r\n<html>\r\n<head>\r\n</head>\r\n<body>\r\n\r\n</body>\r\n</html>', '', 183, 1);
INSERT INTO `survey_zones` VALUES (208, 'Yaguachi', NULL, NULL, 183, 1);
INSERT INTO `survey_zones` VALUES (209, 'Imbabura', NULL, NULL, 11, 1);
INSERT INTO `survey_zones` VALUES (210, 'Antonio Ante', NULL, NULL, 209, 1);
INSERT INTO `survey_zones` VALUES (211, 'Cotacachi', NULL, NULL, 209, 1);
INSERT INTO `survey_zones` VALUES (212, 'Ibarra', NULL, NULL, 209, 1);
INSERT INTO `survey_zones` VALUES (213, 'Otavalo', NULL, NULL, 209, 1);
INSERT INTO `survey_zones` VALUES (214, 'Pimampiro', NULL, NULL, 209, 1);
INSERT INTO `survey_zones` VALUES (215, 'San Miguel de Urcuquí', '<!DOCTYPE html>\r\n<html>\r\n<head>\r\n</head>\r\n<body>\r\n\r\n</body>\r\n</html>', '', 209, 1);
INSERT INTO `survey_zones` VALUES (216, 'Loja', NULL, NULL, 11, 1);
INSERT INTO `survey_zones` VALUES (217, 'Calvas', NULL, NULL, 216, 1);
INSERT INTO `survey_zones` VALUES (218, 'Catamayo', NULL, NULL, 216, 1);
INSERT INTO `survey_zones` VALUES (219, 'Celica', NULL, NULL, 216, 1);
INSERT INTO `survey_zones` VALUES (220, 'Chaguarpamba', NULL, NULL, 216, 1);
INSERT INTO `survey_zones` VALUES (221, 'Espíndola', '<!DOCTYPE html>\r\n<html>\r\n<head>\r\n</head>\r\n<body>\r\n\r\n</body>\r\n</html>', '', 216, 1);
INSERT INTO `survey_zones` VALUES (222, 'Gonzanamá', '<!DOCTYPE html>\r\n<html>\r\n<head>\r\n</head>\r\n<body>\r\n\r\n</body>\r\n</html>', '', 216, 1);
INSERT INTO `survey_zones` VALUES (223, 'Loja', NULL, NULL, 216, 1);
INSERT INTO `survey_zones` VALUES (224, 'Macará', '<!DOCTYPE html>\r\n<html>\r\n<head>\r\n</head>\r\n<body>\r\n\r\n</body>\r\n</html>', '', 216, 1);
INSERT INTO `survey_zones` VALUES (225, 'Olmedo', NULL, NULL, 216, 1);
INSERT INTO `survey_zones` VALUES (226, 'Paltas', NULL, NULL, 216, 1);
INSERT INTO `survey_zones` VALUES (227, 'Pindal', NULL, NULL, 216, 1);
INSERT INTO `survey_zones` VALUES (228, 'Puyango', NULL, NULL, 216, 1);
INSERT INTO `survey_zones` VALUES (229, 'Quilanga', NULL, NULL, 216, 1);
INSERT INTO `survey_zones` VALUES (230, 'Saraguro', NULL, NULL, 216, 1);
INSERT INTO `survey_zones` VALUES (231, 'Sozoranga', NULL, NULL, 216, 1);
INSERT INTO `survey_zones` VALUES (232, 'Zapotillo', NULL, NULL, 216, 1);
INSERT INTO `survey_zones` VALUES (233, 'Los Rios', NULL, NULL, 11, 1);
INSERT INTO `survey_zones` VALUES (234, 'Baba', NULL, NULL, 233, 1);
INSERT INTO `survey_zones` VALUES (235, 'Babahoyo', NULL, NULL, 233, 1);
INSERT INTO `survey_zones` VALUES (236, 'Buena Fe', NULL, NULL, 233, 1);
INSERT INTO `survey_zones` VALUES (237, 'Mocache', NULL, NULL, 233, 1);
INSERT INTO `survey_zones` VALUES (238, 'Montalvo', NULL, NULL, 233, 1);
INSERT INTO `survey_zones` VALUES (239, 'Palenque', NULL, NULL, 233, 1);
INSERT INTO `survey_zones` VALUES (240, 'Puebloviejo', NULL, NULL, 233, 1);
INSERT INTO `survey_zones` VALUES (241, 'Quevedo', NULL, NULL, 233, 1);
INSERT INTO `survey_zones` VALUES (242, 'Quinsaloma', NULL, NULL, 233, 1);
INSERT INTO `survey_zones` VALUES (243, 'Urdaneta', NULL, NULL, 233, 1);
INSERT INTO `survey_zones` VALUES (244, 'Valencia', NULL, NULL, 233, 1);
INSERT INTO `survey_zones` VALUES (245, 'Ventanas', NULL, NULL, 233, 1);
INSERT INTO `survey_zones` VALUES (246, 'Vinces', NULL, NULL, 233, 1);
INSERT INTO `survey_zones` VALUES (247, 'Manabí', '<!DOCTYPE html>\r\n<html>\r\n<head>\r\n</head>\r\n<body>\r\n\r\n</body>\r\n</html>', '', 11, 1);
INSERT INTO `survey_zones` VALUES (248, '24 de Mayo', NULL, NULL, 247, 1);
INSERT INTO `survey_zones` VALUES (249, 'Bolívar', '<!DOCTYPE html>\r\n<html>\r\n<head>\r\n</head>\r\n<body>\r\n\r\n</body>\r\n</html>', '', 247, 1);
INSERT INTO `survey_zones` VALUES (250, 'Chone', NULL, NULL, 247, 1);
INSERT INTO `survey_zones` VALUES (251, 'El Carmen', NULL, NULL, 247, 1);
INSERT INTO `survey_zones` VALUES (252, 'Flavio Alfaro', NULL, NULL, 247, 1);
INSERT INTO `survey_zones` VALUES (253, 'Jama', NULL, NULL, 247, 1);
INSERT INTO `survey_zones` VALUES (254, 'Jaramijó', '<!DOCTYPE html>\r\n<html>\r\n<head>\r\n</head>\r\n<body>\r\n\r\n</body>\r\n</html>', '', 247, 1);
INSERT INTO `survey_zones` VALUES (255, 'Jipijapa', NULL, NULL, 247, 1);
INSERT INTO `survey_zones` VALUES (256, 'Junín', '<!DOCTYPE html>\r\n<html>\r\n<head>\r\n</head>\r\n<body>\r\n\r\n</body>\r\n</html>', '', 247, 1);
INSERT INTO `survey_zones` VALUES (257, 'Manta', NULL, NULL, 247, 1);
INSERT INTO `survey_zones` VALUES (258, 'Montecristi', NULL, NULL, 247, 1);
INSERT INTO `survey_zones` VALUES (259, 'Olmedo', NULL, NULL, 247, 1);
INSERT INTO `survey_zones` VALUES (260, 'Paján', '<!DOCTYPE html>\r\n<html>\r\n<head>\r\n</head>\r\n<body>\r\n\r\n</body>\r\n</html>', '', 247, 1);
INSERT INTO `survey_zones` VALUES (261, 'Pedernales', NULL, NULL, 247, 1);
INSERT INTO `survey_zones` VALUES (262, 'Pichincha', NULL, NULL, 247, 1);
INSERT INTO `survey_zones` VALUES (263, 'Portoviejo', NULL, NULL, 247, 1);
INSERT INTO `survey_zones` VALUES (264, 'Puerto López', '<!DOCTYPE html>\r\n<html>\r\n<head>\r\n</head>\r\n<body>\r\n\r\n</body>\r\n</html>', '', 247, 1);
INSERT INTO `survey_zones` VALUES (265, 'Rocafuerte', NULL, NULL, 247, 1);
INSERT INTO `survey_zones` VALUES (266, 'San Vicente', NULL, NULL, 247, 1);
INSERT INTO `survey_zones` VALUES (267, 'Santa Ana', NULL, NULL, 247, 1);
INSERT INTO `survey_zones` VALUES (268, 'Sucre', NULL, NULL, 247, 1);
INSERT INTO `survey_zones` VALUES (269, 'Tosagua', NULL, NULL, 247, 1);
INSERT INTO `survey_zones` VALUES (270, 'Morona Santiago', NULL, NULL, 11, 1);
INSERT INTO `survey_zones` VALUES (271, 'Gualaquiza', NULL, NULL, 270, 1);
INSERT INTO `survey_zones` VALUES (272, 'Huamboya', NULL, NULL, 270, 1);
INSERT INTO `survey_zones` VALUES (273, 'Limón Indanza', '<!DOCTYPE html>\r\n<html>\r\n<head>\r\n</head>\r\n<body>\r\n\r\n</body>\r\n</html>', '', 270, 1);
INSERT INTO `survey_zones` VALUES (274, 'Logroño', '<!DOCTYPE html>\r\n<html>\r\n<head>\r\n</head>\r\n<body>\r\n\r\n</body>\r\n</html>', '', 270, 1);
INSERT INTO `survey_zones` VALUES (275, 'Morona', NULL, NULL, 270, 1);
INSERT INTO `survey_zones` VALUES (276, 'Pablo Sexto', NULL, NULL, 270, 1);
INSERT INTO `survey_zones` VALUES (277, 'Palora', NULL, NULL, 270, 1);
INSERT INTO `survey_zones` VALUES (278, 'San Juan Bosco', NULL, NULL, 270, 1);
INSERT INTO `survey_zones` VALUES (279, 'Santiago de Méndez', '<!DOCTYPE html>\r\n<html>\r\n<head>\r\n</head>\r\n<body>\r\n\r\n</body>\r\n</html>', '', 270, 1);
INSERT INTO `survey_zones` VALUES (280, 'Sucúa', '<!DOCTYPE html>\r\n<html>\r\n<head>\r\n</head>\r\n<body>\r\n\r\n</body>\r\n</html>', '', 270, 1);
INSERT INTO `survey_zones` VALUES (281, 'Taisha', NULL, NULL, 270, 1);
INSERT INTO `survey_zones` VALUES (282, 'Tiwintza', NULL, NULL, 270, 1);
INSERT INTO `survey_zones` VALUES (283, 'Napo', NULL, NULL, 11, 1);
INSERT INTO `survey_zones` VALUES (284, 'Archidona', NULL, NULL, 283, 1);
INSERT INTO `survey_zones` VALUES (285, 'Carlos Julio Arosemena Tola', NULL, NULL, 283, 1);
INSERT INTO `survey_zones` VALUES (286, 'El Chaco', NULL, NULL, 283, 1);
INSERT INTO `survey_zones` VALUES (287, 'Quijos', NULL, NULL, 283, 1);
INSERT INTO `survey_zones` VALUES (288, 'Tena', NULL, NULL, 283, 1);
INSERT INTO `survey_zones` VALUES (289, 'Orellana', NULL, NULL, 11, 1);
INSERT INTO `survey_zones` VALUES (290, 'Aguarico', NULL, NULL, 289, 1);
INSERT INTO `survey_zones` VALUES (291, 'Francisco de Orellana', NULL, NULL, 289, 1);
INSERT INTO `survey_zones` VALUES (292, 'La Joya de los Sachas', NULL, NULL, 289, 1);
INSERT INTO `survey_zones` VALUES (293, 'Loreto', NULL, NULL, 289, 1);
INSERT INTO `survey_zones` VALUES (294, 'Pastaza', NULL, NULL, 11, 1);
INSERT INTO `survey_zones` VALUES (295, 'Arajuno', NULL, NULL, 294, 1);
INSERT INTO `survey_zones` VALUES (296, 'Mera', NULL, NULL, 294, 1);
INSERT INTO `survey_zones` VALUES (297, 'Pastaza', NULL, NULL, 294, 1);
INSERT INTO `survey_zones` VALUES (298, 'Santa Clara', NULL, NULL, 294, 1);
INSERT INTO `survey_zones` VALUES (299, 'Pichincha', NULL, NULL, 11, 1);
INSERT INTO `survey_zones` VALUES (300, 'Cayambe', NULL, NULL, 299, 1);
INSERT INTO `survey_zones` VALUES (301, 'Mejía', '<!DOCTYPE html>\r\n<html>\r\n<head>\r\n</head>\r\n<body>\r\n\r\n</body>\r\n</html>', '', 299, 1);
INSERT INTO `survey_zones` VALUES (302, 'Pedro Moncayo', NULL, NULL, 299, 1);
INSERT INTO `survey_zones` VALUES (303, 'Pedro Vicente Maldonado', NULL, NULL, 299, 1);
INSERT INTO `survey_zones` VALUES (304, 'Puerto Quito', NULL, NULL, 299, 1);
INSERT INTO `survey_zones` VALUES (305, 'Quito', NULL, NULL, 299, 1);
INSERT INTO `survey_zones` VALUES (306, 'Rumiñahui', '<!DOCTYPE html>\r\n<html>\r\n<head>\r\n</head>\r\n<body>\r\n\r\n</body>\r\n</html>', '', 299, 1);
INSERT INTO `survey_zones` VALUES (307, 'San Miguel de los Bancos', NULL, NULL, 299, 1);
INSERT INTO `survey_zones` VALUES (308, 'Santa Elena', NULL, NULL, 11, 1);
INSERT INTO `survey_zones` VALUES (309, 'La Libertad', NULL, NULL, 308, 1);
INSERT INTO `survey_zones` VALUES (310, 'Salinas', NULL, NULL, 308, 1);
INSERT INTO `survey_zones` VALUES (311, 'Santa Elena', NULL, NULL, 308, 1);
INSERT INTO `survey_zones` VALUES (312, 'Santo Domingo', NULL, NULL, 11, 1);
INSERT INTO `survey_zones` VALUES (313, 'La Concordia', NULL, NULL, 312, 1);
INSERT INTO `survey_zones` VALUES (314, 'Santo Domingo', NULL, NULL, 312, 1);
INSERT INTO `survey_zones` VALUES (315, 'Sucumbios', NULL, NULL, 11, 1);
INSERT INTO `survey_zones` VALUES (316, 'Cascales', NULL, NULL, 315, 1);
INSERT INTO `survey_zones` VALUES (317, 'Cuyabeno', NULL, NULL, 315, 1);
INSERT INTO `survey_zones` VALUES (318, 'Gonzalo Pizarro', NULL, NULL, 315, 1);
INSERT INTO `survey_zones` VALUES (319, 'Lago Agrio', NULL, NULL, 315, 1);
INSERT INTO `survey_zones` VALUES (320, 'Putumayo', NULL, NULL, 315, 1);
INSERT INTO `survey_zones` VALUES (321, 'Shushufindi', NULL, NULL, 315, 1);
INSERT INTO `survey_zones` VALUES (322, 'Sucumbios', '<!DOCTYPE html>\r\n<html>\r\n<head>\r\n</head>\r\n<body>\r\n\r\n</body>\r\n</html>', '', 315, 1);
INSERT INTO `survey_zones` VALUES (323, 'Tungurahua', NULL, NULL, 11, 1);
INSERT INTO `survey_zones` VALUES (324, 'Ambato', NULL, NULL, 323, 1);
INSERT INTO `survey_zones` VALUES (325, 'Baños', '<!DOCTYPE html>\r\n<html>\r\n<head>\r\n</head>\r\n<body>\r\n\r\n</body>\r\n</html>', '', 323, 1);
INSERT INTO `survey_zones` VALUES (326, 'Cevallos', NULL, NULL, 323, 1);
INSERT INTO `survey_zones` VALUES (327, 'Mocha', NULL, NULL, 323, 1);
INSERT INTO `survey_zones` VALUES (328, 'Patate', NULL, NULL, 323, 1);
INSERT INTO `survey_zones` VALUES (329, 'Quero', NULL, NULL, 323, 1);
INSERT INTO `survey_zones` VALUES (330, 'San Pedro de Pelileo', NULL, NULL, 323, 1);
INSERT INTO `survey_zones` VALUES (331, 'Santiago de Píllaro', '<!DOCTYPE html>\r\n<html>\r\n<head>\r\n</head>\r\n<body>\r\n\r\n</body>\r\n</html>', '', 323, 1);
INSERT INTO `survey_zones` VALUES (332, 'Tisaleo', NULL, NULL, 323, 1);
INSERT INTO `survey_zones` VALUES (333, 'Zamora', NULL, NULL, 11, 1);
INSERT INTO `survey_zones` VALUES (334, 'Centinela del Cóndor', '<!DOCTYPE html>\r\n<html>\r\n<head>\r\n</head>\r\n<body>\r\n\r\n</body>\r\n</html>', '', 333, 1);
INSERT INTO `survey_zones` VALUES (335, 'Chinchipe', NULL, NULL, 333, 1);
INSERT INTO `survey_zones` VALUES (336, 'El Pangui', NULL, NULL, 333, 1);
INSERT INTO `survey_zones` VALUES (337, 'Nangaritza', NULL, NULL, 333, 1);
INSERT INTO `survey_zones` VALUES (338, 'Palanda', NULL, NULL, 333, 1);
INSERT INTO `survey_zones` VALUES (339, 'Paquisha', NULL, NULL, 333, 1);
INSERT INTO `survey_zones` VALUES (340, 'Yacuambi', NULL, NULL, 333, 1);
INSERT INTO `survey_zones` VALUES (341, 'Yantzaza', NULL, NULL, 333, 1);
INSERT INTO `survey_zones` VALUES (342, 'Zamora', NULL, NULL, 333, 1);
INSERT INTO `survey_zones` VALUES (351, 'Santo Domingo', '<!DOCTYPE html>\r\n<html>\r\n<head>\r\n</head>\r\n<body>\r\n\r\n</body>\r\n</html>', '', 15, 1);
COMMIT;

SET FOREIGN_KEY_CHECKS = 1;
