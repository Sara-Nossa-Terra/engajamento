-- MySQL dump 10.13  Distrib 5.7.27, for Linux (x86_64)
--
-- Host: localhost    Database: engajamento
-- ------------------------------------------------------
-- Server version	5.7.27

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
-- Table structure for table `tb_atividade`
--

DROP TABLE IF EXISTS `tb_atividade`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tb_atividade` (
  `id_atividade` int(11) NOT NULL AUTO_INCREMENT,
  `tx_nome` varchar(200) NOT NULL,
  `tx_dia` char(1) NOT NULL,
  `tx_hora` char(1) NOT NULL,
  `dt_cadastro` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `dt_deletado` timestamp NULL DEFAULT NULL,
  `id_deletado` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_atividade`),
  KEY `tb_atividade_id_atividade_index` (`id_atividade`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='Tabela de atividades';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_atividade`
--

LOCK TABLES `tb_atividade` WRITE;
/*!40000 ALTER TABLE `tb_atividade` DISABLE KEYS */;
/*!40000 ALTER TABLE `tb_atividade` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tb_lider`
--

DROP TABLE IF EXISTS `tb_lider`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tb_lider` (
  `id_lider` int(11) NOT NULL AUTO_INCREMENT,
  `tx_nome` varchar(200) NOT NULL,
  `tx_email` varchar(120) NOT NULL,
  `tx_senha` varchar(255) NOT NULL,
  `dt_nascimento` date NOT NULL,
  `tx_telefone` varchar(15) NOT NULL,
  `dt_cadastro` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `dt_deletado` timestamp NULL DEFAULT NULL,
  `id_deletado` int(11) DEFAULT NULL,
  `fk_lider` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_lider`),
  KEY `tb_lider_id_lider_index` (`id_lider`),
  KEY `fk_tb_lider_tb_lider_idx` (`fk_lider`),
  CONSTRAINT `fk_tb_lider_tb_lider` FOREIGN KEY (`fk_lider`) REFERENCES `tb_lider` (`id_lider`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='Tabela de com informações sobre os líderes.';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_lider`
--

LOCK TABLES `tb_lider` WRITE;
/*!40000 ALTER TABLE `tb_lider` DISABLE KEYS */;
/*!40000 ALTER TABLE `tb_lider` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tb_pessoa`
--

DROP TABLE IF EXISTS `tb_pessoa`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tb_pessoa` (
  `id_pessoa` int(11) NOT NULL AUTO_INCREMENT,
  `tx_nome` varchar(200) NOT NULL,
  `dt_nascimento` date DEFAULT NULL,
  `tx_telefone` varchar(15) DEFAULT NULL,
  `dt_cadastro` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `dt_deletado` timestamp NULL DEFAULT NULL,
  `id_deletado` int(11) DEFAULT NULL,
  `fk_lider` int(11) NOT NULL,
  PRIMARY KEY (`id_pessoa`),
  KEY `tb_pessoa_id_pessoa_index` (`id_pessoa`),
  KEY `fk_tb_pessoa_tb_lider1_idx` (`fk_lider`),
  CONSTRAINT `fk_tb_pessoa_tb_lider1` FOREIGN KEY (`fk_lider`) REFERENCES `tb_lider` (`id_lider`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='Tabela para cadastro de pessoas ajudadas.';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_pessoa`
--

LOCK TABLES `tb_pessoa` WRITE;
/*!40000 ALTER TABLE `tb_pessoa` DISABLE KEYS */;
/*!40000 ALTER TABLE `tb_pessoa` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tb_revisao`
--

DROP TABLE IF EXISTS `tb_revisao`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tb_revisao` (
  `id_revisao` int(11) NOT NULL AUTO_INCREMENT,
  `dt_revisao` date NOT NULL,
  `dt_cadastro` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `dt_deletado` timestamp NULL DEFAULT NULL,
  `id_deletado` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_revisao`),
  KEY `tb_revisao_id_revisao_index` (`id_revisao`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='Tabela do evento de revisão de vida.';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_revisao`
--

LOCK TABLES `tb_revisao` WRITE;
/*!40000 ALTER TABLE `tb_revisao` DISABLE KEYS */;
/*!40000 ALTER TABLE `tb_revisao` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tb_usuario`
--

DROP TABLE IF EXISTS `tb_usuario`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tb_usuario` (
  `id_usuario` int(11) NOT NULL AUTO_INCREMENT,
  `tx_nome` varchar(45) NOT NULL,
  `tx_senha` varchar(255) NOT NULL,
  `tx_email` varchar(65) NOT NULL,
  `nu_telefone` varchar(11) DEFAULT NULL,
  `tx_status_2` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id_usuario`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_usuario`
--

LOCK TABLES `tb_usuario` WRITE;
/*!40000 ALTER TABLE `tb_usuario` DISABLE KEYS */;
INSERT INTO `tb_usuario` VALUES (1,'Admin','$2y$10$DnnDu3gZ8zlffs7ASozqk.8wOaHjf3AI3EStw53jlnY2zNj13/AoK','admin@admin.com',NULL,1),(2,'Douglas x ','$2y$10$bUss9DDGk6UXodEj1N5PxuXb8Dmzux6L14ghOOc3xmI9WI9c.XhvO','douglas@gmail.com','',0);
/*!40000 ALTER TABLE `tb_usuario` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2020-01-19 18:49:50
