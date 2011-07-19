-- MySQL Administrator dump 1.4
--
-- ------------------------------------------------------
-- Server version	5.1.41-3ubuntu12.10


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


--
-- Create schema pendriverapido
--

CREATE DATABASE IF NOT EXISTS pendriverapido;
USE pendriverapido;

--
-- Definition of table `pendriverapido`.`arq_arquivo`
--

DROP TABLE IF EXISTS `pendriverapido`.`arq_arquivo`;
CREATE TABLE  `pendriverapido`.`arq_arquivo` (
  `arq_id` int(5) NOT NULL AUTO_INCREMENT,
  `arq_nome` varchar(60) NOT NULL,
  `arq_criacao` datetime NOT NULL,
  `cac_id` int(5) NOT NULL,
  `tac_id` int(5) NOT NULL,
  `dir_id` int(5) NOT NULL,
  PRIMARY KEY (`arq_id`),
  KEY `fk_arq_tac_id` (`tac_id`),
  KEY `fk_arq_cac_id` (`cac_id`),
  KEY `fk_arq_dir_id` (`dir_id`),
  CONSTRAINT `fk_arq_cac_id` FOREIGN KEY (`cac_id`) REFERENCES `cac_codigoacesso` (`cac_id`),
  CONSTRAINT `fk_arq_dir_id` FOREIGN KEY (`dir_id`) REFERENCES `dir_diretorio` (`dir_id`),
  CONSTRAINT `fk_arq_tac_id` FOREIGN KEY (`tac_id`) REFERENCES `tac_tipoacesso` (`tac_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pendriverapido`.`arq_arquivo`
--

/*!40000 ALTER TABLE `arq_arquivo` DISABLE KEYS */;
LOCK TABLES `arq_arquivo` WRITE;
UNLOCK TABLES;
/*!40000 ALTER TABLE `arq_arquivo` ENABLE KEYS */;


--
-- Definition of table `pendriverapido`.`cac_codigoacesso`
--

DROP TABLE IF EXISTS `pendriverapido`.`cac_codigoacesso`;
CREATE TABLE  `pendriverapido`.`cac_codigoacesso` (
  `cac_id` int(5) NOT NULL AUTO_INCREMENT,
  `cac_codigo` varchar(20) NOT NULL,
  PRIMARY KEY (`cac_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pendriverapido`.`cac_codigoacesso`
--

/*!40000 ALTER TABLE `cac_codigoacesso` DISABLE KEYS */;
LOCK TABLES `cac_codigoacesso` WRITE;
UNLOCK TABLES;
/*!40000 ALTER TABLE `cac_codigoacesso` ENABLE KEYS */;


--
-- Definition of table `pendriverapido`.`dir_diretorio`
--

DROP TABLE IF EXISTS `pendriverapido`.`dir_diretorio`;
CREATE TABLE  `pendriverapido`.`dir_diretorio` (
  `dir_id` int(5) NOT NULL AUTO_INCREMENT,
  `dir_nome` varchar(45) NOT NULL,
  `dir_parent` int(5) NOT NULL,
  `dir_criacao` datetime NOT NULL,
  `pen_id` int(5) NOT NULL,
  `tac_id` int(5) NOT NULL,
  `cac_id` int(5) NOT NULL,
  `tdi_id` int(5) NOT NULL,
  PRIMARY KEY (`dir_id`),
  KEY `fk_dir_pen_id` (`pen_id`),
  KEY `fk_dir_tac_id` (`tac_id`),
  KEY `fk_dir_tdi_id` (`tdi_id`),
  CONSTRAINT `fk_dir_tdi_id` FOREIGN KEY (`tdi_id`) REFERENCES `tdi_tipodiretorio` (`tdi_id`),
  CONSTRAINT `fk_dir_pen_id` FOREIGN KEY (`pen_id`) REFERENCES `pen_pendrive` (`pen_id`),
  CONSTRAINT `fk_dir_tac_id` FOREIGN KEY (`tac_id`) REFERENCES `tac_tipoacesso` (`tac_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pendriverapido`.`dir_diretorio`
--

/*!40000 ALTER TABLE `dir_diretorio` DISABLE KEYS */;
LOCK TABLES `dir_diretorio` WRITE;
UNLOCK TABLES;
/*!40000 ALTER TABLE `dir_diretorio` ENABLE KEYS */;


--
-- Definition of table `pendriverapido`.`dow_download`
--

DROP TABLE IF EXISTS `pendriverapido`.`dow_download`;
CREATE TABLE  `pendriverapido`.`dow_download` (
  `dow_id` int(5) NOT NULL AUTO_INCREMENT,
  `dow_datahora` datetime NOT NULL,
  `arq_id` int(5) NOT NULL,
  PRIMARY KEY (`dow_id`),
  KEY `fk_dow_arq_id` (`arq_id`),
  CONSTRAINT `fk_dow_arq_id` FOREIGN KEY (`arq_id`) REFERENCES `arq_arquivo` (`arq_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pendriverapido`.`dow_download`
--

/*!40000 ALTER TABLE `dow_download` DISABLE KEYS */;
LOCK TABLES `dow_download` WRITE;
UNLOCK TABLES;
/*!40000 ALTER TABLE `dow_download` ENABLE KEYS */;


--
-- Definition of table `pendriverapido`.`pen_pendrive`
--

DROP TABLE IF EXISTS `pendriverapido`.`pen_pendrive`;
CREATE TABLE  `pendriverapido`.`pen_pendrive` (
  `pen_id` int(5) NOT NULL AUTO_INCREMENT,
  `pen_nome` varchar(45) NOT NULL,
  `pen_criacao` datetime NOT NULL,
  `usu_id` int(5) NOT NULL,
  PRIMARY KEY (`pen_id`),
  KEY `fk_pen_usu_id` (`usu_id`),
  CONSTRAINT `fk_pen_usu_id` FOREIGN KEY (`usu_id`) REFERENCES `usu_usuario` (`usu_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pendriverapido`.`pen_pendrive`
--

/*!40000 ALTER TABLE `pen_pendrive` DISABLE KEYS */;
LOCK TABLES `pen_pendrive` WRITE;
UNLOCK TABLES;
/*!40000 ALTER TABLE `pen_pendrive` ENABLE KEYS */;


--
-- Definition of table `pendriverapido`.`tac_tipoacesso`
--

DROP TABLE IF EXISTS `pendriverapido`.`tac_tipoacesso`;
CREATE TABLE  `pendriverapido`.`tac_tipoacesso` (
  `tac_id` int(5) NOT NULL AUTO_INCREMENT,
  `tac_descricao` varchar(45) NOT NULL,
  PRIMARY KEY (`tac_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pendriverapido`.`tac_tipoacesso`
--

/*!40000 ALTER TABLE `tac_tipoacesso` DISABLE KEYS */;
LOCK TABLES `tac_tipoacesso` WRITE;
UNLOCK TABLES;
/*!40000 ALTER TABLE `tac_tipoacesso` ENABLE KEYS */;


--
-- Definition of table `pendriverapido`.`tdi_tipodiretorio`
--

DROP TABLE IF EXISTS `pendriverapido`.`tdi_tipodiretorio`;
CREATE TABLE  `pendriverapido`.`tdi_tipodiretorio` (
  `tdi_id` int(5) NOT NULL AUTO_INCREMENT,
  `tdi_descricao` varchar(45) NOT NULL,
  PRIMARY KEY (`tdi_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pendriverapido`.`tdi_tipodiretorio`
--

/*!40000 ALTER TABLE `tdi_tipodiretorio` DISABLE KEYS */;
LOCK TABLES `tdi_tipodiretorio` WRITE;
INSERT INTO `pendriverapido`.`tdi_tipodiretorio` VALUES  (1,'principal'),
 (2,'opcional');
UNLOCK TABLES;
/*!40000 ALTER TABLE `tdi_tipodiretorio` ENABLE KEYS */;


--
-- Definition of table `pendriverapido`.`usu_usuario`
--

DROP TABLE IF EXISTS `pendriverapido`.`usu_usuario`;
CREATE TABLE  `pendriverapido`.`usu_usuario` (
  `usu_id` int(5) NOT NULL AUTO_INCREMENT,
  `usu_apelido` varchar(15) NOT NULL,
  `usu_senha` varchar(12) NOT NULL,
  PRIMARY KEY (`usu_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pendriverapido`.`usu_usuario`
--

/*!40000 ALTER TABLE `usu_usuario` DISABLE KEYS */;
LOCK TABLES `usu_usuario` WRITE;
UNLOCK TABLES;
/*!40000 ALTER TABLE `usu_usuario` ENABLE KEYS */;




/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
