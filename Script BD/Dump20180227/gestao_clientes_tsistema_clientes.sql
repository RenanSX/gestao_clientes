-- MySQL dump 10.13  Distrib 5.7.17, for Win64 (x86_64)
--
-- Host: 127.0.0.1    Database: gestao_clientes
-- ------------------------------------------------------
-- Server version	5.7.19

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `tsistema_clientes`
--

DROP TABLE IF EXISTS `tsistema_clientes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tsistema_clientes` (
  `cli_codigo` int(11) NOT NULL AUTO_INCREMENT,
  `cli_cpfcnpj` varchar(19) DEFAULT NULL,
  `cli_nomerazaosocial` varchar(100) DEFAULT NULL,
  `cli_endereco` varchar(100) DEFAULT NULL,
  `cli_endereco_numero` int(5) DEFAULT NULL,
  `cli_endereco_complemento` varchar(50) DEFAULT NULL,
  `cli_telefonecomercial` varchar(20) DEFAULT NULL,
  `cli_telefonecelular` varchar(20) DEFAULT NULL,
  `cli_email` varchar(100) DEFAULT NULL,
  `cli_site` varchar(100) DEFAULT NULL,
  `cli_datahorainclusao` datetime DEFAULT NULL,
  `Tsistema_Usuarios_usu_cpf` int(11) DEFAULT NULL,
  `TAuxiliar_RamoAtividade_ramati_codigo` int(11) DEFAULT NULL,
  PRIMARY KEY (`cli_codigo`),
  KEY `usu_codigo_idx` (`Tsistema_Usuarios_usu_cpf`),
  KEY `RamoCliente_ramati_codigo_fk_idx` (`TAuxiliar_RamoAtividade_ramati_codigo`),
  CONSTRAINT `CliRamo_ramati_codigo_FK` FOREIGN KEY (`TAuxiliar_RamoAtividade_ramati_codigo`) REFERENCES `tauxiliar_ramoatividade` (`ramati_codigo`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `CliUsu_codigo_FK` FOREIGN KEY (`Tsistema_Usuarios_usu_cpf`) REFERENCES `tsistema_usuarios` (`usu_codigo`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tsistema_clientes`
--

LOCK TABLES `tsistema_clientes` WRITE;
/*!40000 ALTER TABLE `tsistema_clientes` DISABLE KEYS */;
/*!40000 ALTER TABLE `tsistema_clientes` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2018-02-27 20:43:07
