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
-- Table structure for table `tsistema_registrocontato`
--

DROP TABLE IF EXISTS `tsistema_registrocontato`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tsistema_registrocontato` (
  `regcon_codigo` int(11) NOT NULL AUTO_INCREMENT,
  `TSistema_Clientes_cli_codigo` int(11) DEFAULT NULL,
  `TAuxiliar_MeioContato_meicon_codigo` int(11) DEFAULT NULL,
  `TSistema_Usuarios_usu_cpf` int(11) DEFAULT NULL,
  `regcon_datadocontato` date DEFAULT NULL,
  `regcon_horadocontato` time DEFAULT NULL,
  `regcon_assuntodocontato` varchar(100) DEFAULT NULL,
  `regcon_descricao` varchar(100) DEFAULT NULL,
  `regcon_datahorainclusao` datetime DEFAULT NULL,
  PRIMARY KEY (`regcon_codigo`),
  KEY `RegCli_codigo_FK_idx` (`TSistema_Clientes_cli_codigo`),
  KEY `RegUsu_codigo_FK_idx` (`TSistema_Usuarios_usu_cpf`),
  KEY `RegMContato_codigo_FK_idx` (`TAuxiliar_MeioContato_meicon_codigo`),
  CONSTRAINT `RegCli_codigo_FK` FOREIGN KEY (`TSistema_Clientes_cli_codigo`) REFERENCES `tsistema_clientes` (`cli_codigo`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `RegMeiCon_codigo_FK` FOREIGN KEY (`TAuxiliar_MeioContato_meicon_codigo`) REFERENCES `tauxiliar_meiocontato` (`meicon_codigo`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `RegUsu_codigo_FK` FOREIGN KEY (`TSistema_Usuarios_usu_cpf`) REFERENCES `tsistema_usuarios` (`usu_codigo`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tsistema_registrocontato`
--

LOCK TABLES `tsistema_registrocontato` WRITE;
/*!40000 ALTER TABLE `tsistema_registrocontato` DISABLE KEYS */;
/*!40000 ALTER TABLE `tsistema_registrocontato` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2018-02-27 20:43:06
