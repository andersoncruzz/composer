-- MySQL dump 10.13  Distrib 5.7.9, for linux-glibc2.5 (x86_64)
--
-- Host: localhost    Database: composer
-- ------------------------------------------------------
-- Server version	5.5.50-0ubuntu0.14.04.1

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
-- Table structure for table `Alternativa`
--

DROP TABLE IF EXISTS `Alternativa`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Alternativa` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `description` varchar(500) NOT NULL,
  `corretude` int(11) NOT NULL,
  `Questao_id` int(11) NOT NULL,
  PRIMARY KEY (`id`,`Questao_id`),
  KEY `fk_Alternativa_Questao1_idx` (`Questao_id`),
  CONSTRAINT `fk_Alternativa_Questao1` FOREIGN KEY (`Questao_id`) REFERENCES `Questao` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Alternativa`
--

LOCK TABLES `Alternativa` WRITE;
/*!40000 ALTER TABLE `Alternativa` DISABLE KEYS */;
INSERT INTO `Alternativa` VALUES (1,'aaaa232zz',12,4),(2,'bbbb3333zz',52,4),(3,'ccc111zz',22,4),(4,'dddd5543zz',42,4),(5,'eee538749zz',52,4),(6,'aaaa',1,5),(7,'bbbb',5,5),(8,'ccc',2,5),(9,'dddd',4,5),(10,'eee',5,5),(11,'sss',2,6),(12,'eer',2,6),(13,'wwwwf',5,6),(14,'qqqw',1,6),(15,'fffff2',1,6),(16,'aa',1,7),(17,'cdd',2,7),(18,'df',5,7),(19,'s',1,7),(20,'sd',1,7);
/*!40000 ALTER TABLE `Alternativa` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Aula`
--

DROP TABLE IF EXISTS `Aula`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Aula` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `subject` varchar(255) NOT NULL,
  `qtChapters` int(11) NOT NULL,
  `Disciplina_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_Aula_Disciplina1_idx` (`Disciplina_id`),
  CONSTRAINT `fk_Aula_Disciplina1` FOREIGN KEY (`Disciplina_id`) REFERENCES `Disciplina` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Aula`
--

LOCK TABLES `Aula` WRITE;
/*!40000 ALTER TABLE `Aula` DISABLE KEYS */;
INSERT INTO `Aula` VALUES (7,'Segunda Guerra Mundial',0,5),(8,'Funções do 1° Grau',0,6),(9,'Reino Animal',0,7);
/*!40000 ALTER TABLE `Aula` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Capitulo`
--

DROP TABLE IF EXISTS `Capitulo`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Capitulo` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `titulo` varchar(255) NOT NULL,
  `qtObjects` int(11) NOT NULL,
  `Aula_id` int(11) NOT NULL,
  `dificuldade` int(11) DEFAULT NULL,
  `ordem` text,
  PRIMARY KEY (`id`),
  KEY `id` (`id`),
  KEY `fk_Capitulo_Aula1_idx` (`Aula_id`),
  CONSTRAINT `fk_Capitulo_Aula1` FOREIGN KEY (`Aula_id`) REFERENCES `Aula` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Capitulo`
--

LOCK TABLES `Capitulo` WRITE;
/*!40000 ALTER TABLE `Capitulo` DISABLE KEYS */;
INSERT INTO `Capitulo` VALUES (7,'Consequências da Primeira Guerra Mundial',0,7,1,NULL),(8,'Revolução',0,7,2,NULL),(9,'Período entre as guerras',0,7,3,NULL),(10,'Segunda Guerra Mundial',0,7,2,NULL),(11,'Holocausto',0,7,4,NULL),(12,'Atividades Complementares',0,7,3,NULL),(13,'Função Afim',0,8,1,'{\"1\":{\"tipo\":\"questionario\",\"descricao\":\"teste hoje\",\"ordem\":1},\"2\":{\"tipo\":\"questionario\",\"descricao\":\"teste hoje\",\"ordem\":2},\"3\":{\"tipo\":\"questionario\",\"descricao\":\"teste hoje\",\"ordem\":3}}'),(14,'Filos',0,9,1,'{\"1\":{\"tipo\":\"questionario\",\"descricao\":\"Exerc\\u00edcio I\",\"ordem\":1,\"id\":25},\"2\":{\"tipo\":\"questionario\",\"descricao\":\"Exerc\\u00edcio I\",\"ordem\":2,\"id\":27},\"3\":{\"tipo\":\"questionario\",\"descricao\":\"Exerc\\u00edcio II\",\"ordem\":3,\"id\":29},\"4\":{\"tipo\":\"Texto\\/Html\",\"descricao\":\"Classe dos animais\",\"ordem\":4,\"id\":1}}');
/*!40000 ALTER TABLE `Capitulo` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Capitulo_has_ObjApresentacao`
--

DROP TABLE IF EXISTS `Capitulo_has_ObjApresentacao`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Capitulo_has_ObjApresentacao` (
  `Capitulo_id` int(11) NOT NULL,
  `ObjApresentacao_id` int(11) NOT NULL,
  PRIMARY KEY (`Capitulo_id`,`ObjApresentacao_id`),
  KEY `fk_Capitulo_has_ObjApresentacao_ObjApresentacao1_idx` (`ObjApresentacao_id`),
  KEY `fk_Capitulo_has_ObjApresentacao_Capitulo1_idx` (`Capitulo_id`),
  CONSTRAINT `fk_Capitulo_has_ObjApresentacao_Capitulo1` FOREIGN KEY (`Capitulo_id`) REFERENCES `Capitulo` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_Capitulo_has_ObjApresentacao_ObjApresentacao1` FOREIGN KEY (`ObjApresentacao_id`) REFERENCES `ObjApresentacao` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Capitulo_has_ObjApresentacao`
--

LOCK TABLES `Capitulo_has_ObjApresentacao` WRITE;
/*!40000 ALTER TABLE `Capitulo_has_ObjApresentacao` DISABLE KEYS */;
/*!40000 ALTER TABLE `Capitulo_has_ObjApresentacao` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Capitulo_has_ObjDinamico`
--

DROP TABLE IF EXISTS `Capitulo_has_ObjDinamico`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Capitulo_has_ObjDinamico` (
  `Capitulo_id` int(11) NOT NULL,
  `ObjDinamico_id` int(11) NOT NULL,
  PRIMARY KEY (`Capitulo_id`,`ObjDinamico_id`),
  KEY `fk_Capitulo_has_ObjDinamico_ObjDinamico1_idx` (`ObjDinamico_id`),
  KEY `fk_Capitulo_has_ObjDinamico_Capitulo1_idx` (`Capitulo_id`),
  CONSTRAINT `fk_Capitulo_has_ObjDinamico_Capitulo1` FOREIGN KEY (`Capitulo_id`) REFERENCES `Capitulo` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_Capitulo_has_ObjDinamico_ObjDinamico1` FOREIGN KEY (`ObjDinamico_id`) REFERENCES `ObjDinamico` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Capitulo_has_ObjDinamico`
--

LOCK TABLES `Capitulo_has_ObjDinamico` WRITE;
/*!40000 ALTER TABLE `Capitulo_has_ObjDinamico` DISABLE KEYS */;
/*!40000 ALTER TABLE `Capitulo_has_ObjDinamico` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Capitulo_has_ObjGaleria`
--

DROP TABLE IF EXISTS `Capitulo_has_ObjGaleria`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Capitulo_has_ObjGaleria` (
  `Capitulo_id` int(11) NOT NULL,
  `ObjGaleria_id` int(11) NOT NULL,
  PRIMARY KEY (`Capitulo_id`,`ObjGaleria_id`),
  KEY `fk_Capitulo_has_ObjGaleria_ObjGaleria1_idx` (`ObjGaleria_id`),
  KEY `fk_Capitulo_has_ObjGaleria_Capitulo1_idx` (`Capitulo_id`),
  CONSTRAINT `fk_Capitulo_has_ObjGaleria_Capitulo1` FOREIGN KEY (`Capitulo_id`) REFERENCES `Capitulo` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_Capitulo_has_ObjGaleria_ObjGaleria1` FOREIGN KEY (`ObjGaleria_id`) REFERENCES `ObjGaleria` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Capitulo_has_ObjGaleria`
--

LOCK TABLES `Capitulo_has_ObjGaleria` WRITE;
/*!40000 ALTER TABLE `Capitulo_has_ObjGaleria` DISABLE KEYS */;
/*!40000 ALTER TABLE `Capitulo_has_ObjGaleria` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Capitulo_has_ObjQuestionario`
--

DROP TABLE IF EXISTS `Capitulo_has_ObjQuestionario`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Capitulo_has_ObjQuestionario` (
  `Capitulo_id` int(11) NOT NULL,
  `ObjQuestionario_id` int(11) NOT NULL,
  PRIMARY KEY (`Capitulo_id`,`ObjQuestionario_id`),
  KEY `fk_Capitulo_has_ObjQuestionario_ObjQuestionario1_idx` (`ObjQuestionario_id`),
  KEY `fk_Capitulo_has_ObjQuestionario_Capitulo1_idx` (`Capitulo_id`),
  CONSTRAINT `fk_Capitulo_has_ObjQuestionario_Capitulo1` FOREIGN KEY (`Capitulo_id`) REFERENCES `Capitulo` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_Capitulo_has_ObjQuestionario_ObjQuestionario1` FOREIGN KEY (`ObjQuestionario_id`) REFERENCES `ObjQuestionario` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Capitulo_has_ObjQuestionario`
--

LOCK TABLES `Capitulo_has_ObjQuestionario` WRITE;
/*!40000 ALTER TABLE `Capitulo_has_ObjQuestionario` DISABLE KEYS */;
INSERT INTO `Capitulo_has_ObjQuestionario` VALUES (7,3),(13,4),(13,5),(13,6),(13,7),(13,8),(13,9),(13,10),(13,11),(13,12),(13,13),(13,14),(13,15),(13,16),(13,17),(13,18),(13,19),(13,20),(13,21),(13,22),(13,23),(14,24),(14,25),(14,26),(14,27),(14,28),(14,29);
/*!40000 ALTER TABLE `Capitulo_has_ObjQuestionario` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Capitulo_has_ObjTexto`
--

DROP TABLE IF EXISTS `Capitulo_has_ObjTexto`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Capitulo_has_ObjTexto` (
  `Capitulo_id` int(11) NOT NULL,
  `ObjTexto_id` int(11) NOT NULL,
  PRIMARY KEY (`Capitulo_id`,`ObjTexto_id`),
  KEY `fk_Capitulo_has_ObjTexto_ObjTexto1_idx` (`ObjTexto_id`),
  KEY `fk_Capitulo_has_ObjTexto_Capitulo1_idx` (`Capitulo_id`),
  CONSTRAINT `fk_Capitulo_has_ObjTexto_Capitulo1` FOREIGN KEY (`Capitulo_id`) REFERENCES `Capitulo` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_Capitulo_has_ObjTexto_ObjTexto1` FOREIGN KEY (`ObjTexto_id`) REFERENCES `ObjTexto` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Capitulo_has_ObjTexto`
--

LOCK TABLES `Capitulo_has_ObjTexto` WRITE;
/*!40000 ALTER TABLE `Capitulo_has_ObjTexto` DISABLE KEYS */;
INSERT INTO `Capitulo_has_ObjTexto` VALUES (14,1);
/*!40000 ALTER TABLE `Capitulo_has_ObjTexto` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Capitulo_has_ObjVideo`
--

DROP TABLE IF EXISTS `Capitulo_has_ObjVideo`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Capitulo_has_ObjVideo` (
  `Capitulo_id` int(11) NOT NULL,
  `ObjVideo_id` int(11) NOT NULL,
  PRIMARY KEY (`Capitulo_id`,`ObjVideo_id`),
  KEY `fk_Capitulo_has_ObjVideo_ObjVideo1_idx` (`ObjVideo_id`),
  KEY `fk_Capitulo_has_ObjVideo_Capitulo1_idx` (`Capitulo_id`),
  CONSTRAINT `fk_Capitulo_has_ObjVideo_Capitulo1` FOREIGN KEY (`Capitulo_id`) REFERENCES `Capitulo` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_Capitulo_has_ObjVideo_ObjVideo1` FOREIGN KEY (`ObjVideo_id`) REFERENCES `ObjVideo` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Capitulo_has_ObjVideo`
--

LOCK TABLES `Capitulo_has_ObjVideo` WRITE;
/*!40000 ALTER TABLE `Capitulo_has_ObjVideo` DISABLE KEYS */;
/*!40000 ALTER TABLE `Capitulo_has_ObjVideo` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Disciplina`
--

DROP TABLE IF EXISTS `Disciplina`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Disciplina` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(255) NOT NULL,
  `user_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_Disciplina_user1_idx` (`user_id`),
  CONSTRAINT `fk_Disciplina_user1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Disciplina`
--

LOCK TABLES `Disciplina` WRITE;
/*!40000 ALTER TABLE `Disciplina` DISABLE KEYS */;
INSERT INTO `Disciplina` VALUES (5,'História',2),(6,'Matemática',3),(7,'Ciências',4);
/*!40000 ALTER TABLE `Disciplina` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Imagem`
--

DROP TABLE IF EXISTS `Imagem`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Imagem` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `caminho` varchar(255) NOT NULL,
  `Galeria_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_Imagem_Galeria1_idx` (`Galeria_id`),
  CONSTRAINT `fk_Imagem_Galeria1` FOREIGN KEY (`Galeria_id`) REFERENCES `ObjGaleria` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Imagem`
--

LOCK TABLES `Imagem` WRITE;
/*!40000 ALTER TABLE `Imagem` DISABLE KEYS */;
/*!40000 ALTER TABLE `Imagem` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ObjApresentacao`
--

DROP TABLE IF EXISTS `ObjApresentacao`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ObjApresentacao` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `assunto` varchar(255) NOT NULL,
  `caminho` varchar(255) NOT NULL,
  `qteSlides` int(11) NOT NULL,
  `topicos` text NOT NULL,
  `exerciciosResolvidos` tinyint(1) NOT NULL,
  `tipo` text NOT NULL,
  `duracao` int(11) NOT NULL,
  `serie` varchar(45) NOT NULL,
  `avaliacao` int(11) NOT NULL,
  `referencias` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ObjApresentacao`
--

LOCK TABLES `ObjApresentacao` WRITE;
/*!40000 ALTER TABLE `ObjApresentacao` DISABLE KEYS */;
/*!40000 ALTER TABLE `ObjApresentacao` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ObjDinamico`
--

DROP TABLE IF EXISTS `ObjDinamico`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ObjDinamico` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `assunto` varchar(255) NOT NULL,
  `caminho` varchar(255) NOT NULL,
  `descricao` text,
  `topicos` text,
  `exerciciosResolvidos` tinyint(1) DEFAULT NULL,
  `duracao` int(11) DEFAULT NULL,
  `avaliacao` int(11) DEFAULT NULL,
  `referencias` text,
  `tipo` text,
  `serie` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ObjDinamico`
--

LOCK TABLES `ObjDinamico` WRITE;
/*!40000 ALTER TABLE `ObjDinamico` DISABLE KEYS */;
/*!40000 ALTER TABLE `ObjDinamico` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ObjGaleria`
--

DROP TABLE IF EXISTS `ObjGaleria`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ObjGaleria` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `assunto` varchar(255) NOT NULL,
  `qteImagens` int(11) NOT NULL,
  `topicos` text NOT NULL,
  `exerciciosResolvidos` tinyint(1) NOT NULL,
  `tipo` text NOT NULL,
  `duracao` int(11) NOT NULL,
  `serie` varchar(45) NOT NULL,
  `avaliacao` int(11) NOT NULL,
  `referencias` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ObjGaleria`
--

LOCK TABLES `ObjGaleria` WRITE;
/*!40000 ALTER TABLE `ObjGaleria` DISABLE KEYS */;
/*!40000 ALTER TABLE `ObjGaleria` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ObjQuestionario`
--

DROP TABLE IF EXISTS `ObjQuestionario`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ObjQuestionario` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `assunto` varchar(45) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=30 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ObjQuestionario`
--

LOCK TABLES `ObjQuestionario` WRITE;
/*!40000 ALTER TABLE `ObjQuestionario` DISABLE KEYS */;
INSERT INTO `ObjQuestionario` VALUES (3,'Questionário teste'),(4,'Exercício sobre Função do 1° Grau'),(5,'2'),(6,'2'),(7,'teste'),(8,'novo'),(9,'teste hoje'),(10,'teste hoje'),(11,'teste hoje'),(12,'teste hoje'),(13,'teste hoje'),(14,'teste hoje'),(15,'teste hoje'),(16,'teste hoje'),(17,'teste hoje'),(18,'teste hoje'),(19,'teste hoje'),(20,'o questionário'),(21,'o questionário'),(22,'o questionário'),(23,'o questionário'),(24,'Exercício I'),(25,'Exercício I'),(26,'Exercício I'),(27,'Exercício I'),(28,'Exercício II'),(29,'Exercício II');
/*!40000 ALTER TABLE `ObjQuestionario` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ObjQuestionario_has_Questao`
--

DROP TABLE IF EXISTS `ObjQuestionario_has_Questao`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ObjQuestionario_has_Questao` (
  `ObjQuestionario_id` int(11) NOT NULL,
  `Questao_id` int(11) NOT NULL,
  PRIMARY KEY (`ObjQuestionario_id`,`Questao_id`),
  KEY `fk_ObjQuestionario_has_Questao_Questao1_idx` (`Questao_id`),
  KEY `fk_ObjQuestionario_has_Questao_ObjQuestionario1_idx` (`ObjQuestionario_id`),
  CONSTRAINT `fk_ObjQuestionario_has_Questao_ObjQuestionario1` FOREIGN KEY (`ObjQuestionario_id`) REFERENCES `ObjQuestionario` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_ObjQuestionario_has_Questao_Questao1` FOREIGN KEY (`Questao_id`) REFERENCES `Questao` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ObjQuestionario_has_Questao`
--

LOCK TABLES `ObjQuestionario_has_Questao` WRITE;
/*!40000 ALTER TABLE `ObjQuestionario_has_Questao` DISABLE KEYS */;
INSERT INTO `ObjQuestionario_has_Questao` VALUES (3,1),(7,2),(7,3),(7,4),(7,5),(19,6),(29,7);
/*!40000 ALTER TABLE `ObjQuestionario_has_Questao` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ObjTexto`
--

DROP TABLE IF EXISTS `ObjTexto`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ObjTexto` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `assunto` varchar(255) NOT NULL,
  `conteudo` text NOT NULL,
  `topicos` text,
  `exerciciosResolvidos` tinyint(1) DEFAULT NULL,
  `tipo` text,
  `duracao` int(11) NOT NULL,
  `serie` varchar(45) NOT NULL,
  `avaliacao` int(11) DEFAULT NULL,
  `referencias` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ObjTexto`
--

LOCK TABLES `ObjTexto` WRITE;
/*!40000 ALTER TABLE `ObjTexto` DISABLE KEYS */;
INSERT INTO `ObjTexto` VALUES (1,'Classe dos animais','<p>era uma vez um le&atilde;ozinho</p>\r\n','#Got A, B, D',1,'Formula,Exemplo,Tutorial',20,'2',NULL,'o livro');
/*!40000 ALTER TABLE `ObjTexto` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ObjVideo`
--

DROP TABLE IF EXISTS `ObjVideo`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ObjVideo` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `assunto` varchar(255) NOT NULL,
  `caminho` varchar(255) NOT NULL,
  `topicos` text NOT NULL,
  `exerciciosResolvidos` tinyint(1) NOT NULL,
  `tipo` text NOT NULL,
  `duracao` int(11) NOT NULL,
  `serie` varchar(45) NOT NULL,
  `avaliacao` int(11) NOT NULL,
  `referencias` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ObjVideo`
--

LOCK TABLES `ObjVideo` WRITE;
/*!40000 ALTER TABLE `ObjVideo` DISABLE KEYS */;
/*!40000 ALTER TABLE `ObjVideo` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Questao`
--

DROP TABLE IF EXISTS `Questao`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Questao` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nivel` varchar(16) NOT NULL,
  `assunto` varchar(255) DEFAULT NULL,
  `enunciado` text NOT NULL,
  `duracao` int(11) NOT NULL,
  `dica` text NOT NULL,
  `correta` varchar(45) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Questao`
--

LOCK TABLES `Questao` WRITE;
/*!40000 ALTER TABLE `Questao` DISABLE KEYS */;
INSERT INTO `Questao` VALUES (1,'2','Segunda Guerra','A Segunda Grande Guerra (1939-1945) adquiriu caráter mundial a partir de 7 de dezembro de 1941, quando:',2,'Leia o conteúdo 1 do capítulo 1',''),(2,'11','Logaritmo','Era uma vez a função',360,'estude!','b'),(3,'11','Logaritmo','Era uma vez a função',360,'estude!','b'),(4,'15','Logaritmo level hard','Era uma vez a função',360,'estude!','b'),(5,'11','Logaritmo','Era uma vez a função',360,'estude!','b'),(6,'sdfsdf','hhjhghghgghghg','gggggggggggggggggggggggggggggggggg',11111111,'dsdf','c'),(7,'ei','sad','dds',1,'ss','c');
/*!40000 ALTER TABLE `Questao` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `migration`
--

DROP TABLE IF EXISTS `migration`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `migration` (
  `version` varchar(180) NOT NULL,
  `apply_time` int(11) DEFAULT NULL,
  PRIMARY KEY (`version`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migration`
--

LOCK TABLES `migration` WRITE;
/*!40000 ALTER TABLE `migration` DISABLE KEYS */;
INSERT INTO `migration` VALUES ('m000000_000000_base',1473709560),('m130524_201442_init',1473709562);
/*!40000 ALTER TABLE `migration` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `auth_key` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `password_hash` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password_reset_token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` smallint(6) NOT NULL DEFAULT '10',
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`),
  UNIQUE KEY `email` (`email`),
  UNIQUE KEY `password_reset_token` (`password_reset_token`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user`
--

LOCK TABLES `user` WRITE;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` VALUES (2,'professor','UjZAPOLRotScuYpJFEcyp3O1aucj9X6V','$2y$13$.MQd2.zLLfPhUX3sDT3KHOp3.VZTssjhpkvRGlhlt5Eb6WyaQXHTO',NULL,'professor@gmail.com',10,1474393067,1474393067),(3,'eribeiro','gHZ7fTrYMKtOlWfN1_dLjZLGO5k7tf1Z','$2y$13$QlRlUUc1.b8UmjtA9WJPQ./MADxBRie8IJep0jNQCUBpEdPRTPnWe',NULL,'erick.ribeiro.17@hotmail.com',10,1474459019,1474459019),(4,'erickribeiro','g0TnYAFX3IhUSeTl2U5bOlcjTVE0DkNr','$2y$13$s5JOEzjOl/c9gTKkMUH6O.4xv5zjmyc8A07EE6CSZJvJFJV3JMMQi',NULL,'erick.ribeiro.18@hotmail.com',10,1474889801,1474889801);
/*!40000 ALTER TABLE `user` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2016-09-26  9:15:37
