-- MariaDB dump 10.19  Distrib 10.4.24-MariaDB, for Win64 (AMD64)
--
-- Host: localhost    Database: cinema
-- ------------------------------------------------------
-- Server version	10.4.24-MariaDB

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `atores`
--

DROP TABLE IF EXISTS `atores`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `atores` (
  `idator` int(11) NOT NULL AUTO_INCREMENT,
  `nomeator` varchar(255) NOT NULL,
  PRIMARY KEY (`idator`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `atores`
--

LOCK TABLES `atores` WRITE;
/*!40000 ALTER TABLE `atores` DISABLE KEYS */;
INSERT INTO `atores` VALUES (1,'George Clooney'),(2,'Julia Roberts'),(3,'Billie Lourd'),(4,'Florence Pugh'),(5,'Olivia Wilde'),(6,'Harry Styles'),(7,'Viola Davis'),(8,'Thuso Mbedu'),(9,'Lashana Lynch'),(10,'Lupita Nyong o'),(11,'Sosie Bacon'),(12,'Kyle Gallner'),(13,'Rob Morgan'),(14,'Kal Penn'),(15,'Michele Morrone'),(16,'Marieta Severo'),(17,'Rodrigo Lombardi'),(18,'Giancarlo Giannini');
/*!40000 ALTER TABLE `atores` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `diretores`
--

DROP TABLE IF EXISTS `diretores`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `diretores` (
  `iddiretor` int(11) NOT NULL AUTO_INCREMENT,
  `nomediretor` varchar(255) NOT NULL,
  PRIMARY KEY (`iddiretor`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `diretores`
--

LOCK TABLES `diretores` WRITE;
/*!40000 ALTER TABLE `diretores` DISABLE KEYS */;
INSERT INTO `diretores` VALUES (1,'Ol Parker'),(2,'Olivia Wilde'),(3,'Gina Prince-Bythewood'),(4,'Parker Finn'),(5,'Vicente Amorim'),(6,'Quentin Tarantino'),(9,'Nicholas Stoller');
/*!40000 ALTER TABLE `diretores` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `elenco`
--

DROP TABLE IF EXISTS `elenco`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `elenco` (
  `idfilme` int(11) NOT NULL,
  `idator` int(11) NOT NULL,
  PRIMARY KEY (`idfilme`,`idator`),
  KEY `idator` (`idator`),
  CONSTRAINT `elenco_ibfk_1` FOREIGN KEY (`idfilme`) REFERENCES `filmes` (`idfilme`),
  CONSTRAINT `elenco_ibfk_2` FOREIGN KEY (`idator`) REFERENCES `atores` (`idator`),
  CONSTRAINT `elenco_ibfk_3` FOREIGN KEY (`idfilme`) REFERENCES `filmes` (`idfilme`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `elenco`
--

LOCK TABLES `elenco` WRITE;
/*!40000 ALTER TABLE `elenco` DISABLE KEYS */;
INSERT INTO `elenco` VALUES (4,7),(4,8),(4,9),(4,10),(5,11),(5,12),(5,13),(5,14),(6,15),(6,16),(6,17),(6,18);
/*!40000 ALTER TABLE `elenco` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `filmes`
--

DROP TABLE IF EXISTS `filmes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `filmes` (
  `idfilme` int(11) NOT NULL AUTO_INCREMENT,
  `titulopt` varchar(255) DEFAULT NULL,
  `tituloen` varchar(255) DEFAULT NULL,
  `anolancamento` int(11) DEFAULT NULL,
  `sinopse` varchar(1000) DEFAULT NULL,
  `duracao` time DEFAULT NULL,
  `datain` date DEFAULT NULL,
  `dataf` date DEFAULT NULL,
  `classificacao` varchar(10) NOT NULL,
  `iddiretor` int(11) DEFAULT NULL,
  `idpais` int(11) DEFAULT NULL,
  `idgenero` int(11) DEFAULT NULL,
  `elenco` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`idfilme`),
  KEY `iddiretor` (`iddiretor`),
  KEY `idpais` (`idpais`),
  KEY `idgenero` (`idgenero`),
  CONSTRAINT `filmes_ibfk_1` FOREIGN KEY (`iddiretor`) REFERENCES `diretores` (`iddiretor`),
  CONSTRAINT `filmes_ibfk_2` FOREIGN KEY (`idpais`) REFERENCES `paises` (`idpais`),
  CONSTRAINT `filmes_ibfk_3` FOREIGN KEY (`idgenero`) REFERENCES `generos` (`idgenero`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `filmes`
--

LOCK TABLES `filmes` WRITE;
/*!40000 ALTER TABLE `filmes` DISABLE KEYS */;
INSERT INTO `filmes` VALUES (4,'A Mulher Rei ','The Woman King',2022,' A história memorável da Agojie, uma unidade de guerreiras composta apenas por mulheres que protegiam o reino africano de Dahomey nos anos 1800, com habilidades e uma força diferentes de tudo já visto. Inspirado em eventos reais, o filme acompanha a emocionante jornada épica da General Nanisca enquanto ela treina uma nova geração de recrutas e as prepara para a batalha contra um inimigo determinado a destruir o modo de vida delas. Algumas coisas valem a luta. ','02:35:00','2022-09-22','2022-11-01','14',3,1,2,'jonaS'),(5,'Sorria','Smile',2022,' Depois de testemunhar um incidente bizarro e traumático envolvendo um paciente, a Dra. Rose Cotter começa a experimentar ocorrências assustadoras que ela não consegue explicar. Rose deve enfrentar seu passado perturbador para sobreviver e escapar de sua nova e horrível realidade. ','02:15:00','2022-10-01','2022-11-29','16',4,1,6,'Andres'),(6,'Duetto','Duetto',2022,' Em 1965, Cora é uma adolescente brasileira de 18 anos que faz parte de uma família italiana. Após perder seu pai em um trágico acidente de carro, ela viaja com a avó Lúcia para Puglia, na Itália, onde a propriedade da família ainda existe. Lucia, com objetivo de vender o antigo terreno, reencontra sua irmã Sofia com quem não conversa há 40 anos. Tudo complica quando a venda se perde em uma burocracia causada pela chegada de um grande festival na cidade. Para resolver a situação, a dupla é obrigada a prolongar a estadia e, enquanto isso, antigos problemas familiares ressurgem, criando para Cora uma jornada de luto e crescimento. ','02:02:00','2022-10-01','2022-11-01','14',5,2,2,'Virginia'),(17,'ÓRFÃ 2: A ORIGEM','Orphan: First Kill',2022,'Em Órfã 2: A Origem, Leena Klammer/Esther Albright (Isabelle Fuhrman) está de volta para nos mostrar sua mente perversa e instável. Nesta prequela ao filme original de 2009, depois de orquestrar uma brilhante fuga de uma clínica psiquiátrica da Estônia, Esther viaja para os Estados Unidos se passando pela filha desaparecida de uma família rica que procura uma menina por quatro anos. Após ser acolhida pela nova família, luxo e uma psicóloga, \"Esther\" começa a mostrar suas reais intenções com o pai e a mãe \"biológicos\". Esther começa a ser vigiada por um detetive, que fará tudo para mostrar à família que a menina não diz ser quem é de verdade','01:38:33','2022-10-21','2022-11-04','16',4,1,7,' Isabelle Fuhrman, Julia Stiles, Rossif Sutherland'),(19,'Mais que Amigos, Friends','Bros',2022,'Um curador de um museu de Nova York é contratado para escrever uma comédia romântica sobre um casal gay. Ao longo do caminho, ele conhece um advogado machista','01:56:00','2022-10-06','2022-10-20','16',1,1,3,'Billy Eichner, Luke MacFarlane, Monica Raymundo');
/*!40000 ALTER TABLE `filmes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `generos`
--

DROP TABLE IF EXISTS `generos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `generos` (
  `idgenero` int(11) NOT NULL AUTO_INCREMENT,
  `nomegenero` varchar(255) NOT NULL,
  PRIMARY KEY (`idgenero`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `generos`
--

LOCK TABLES `generos` WRITE;
/*!40000 ALTER TABLE `generos` DISABLE KEYS */;
INSERT INTO `generos` VALUES (1,'Drama'),(2,'Comedia'),(3,'Comedia Romântica'),(4,'Suspense'),(5,'Ação'),(6,'Avetura'),(7,'Terror');
/*!40000 ALTER TABLE `generos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `horarios`
--

DROP TABLE IF EXISTS `horarios`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `horarios` (
  `idhorario` int(11) NOT NULL AUTO_INCREMENT,
  `horario` time DEFAULT NULL,
  PRIMARY KEY (`idhorario`)
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `horarios`
--

LOCK TABLES `horarios` WRITE;
/*!40000 ALTER TABLE `horarios` DISABLE KEYS */;
INSERT INTO `horarios` VALUES (1,'14:00:00'),(2,'14:30:00'),(3,'14:45:00'),(4,'15:00:00'),(5,'15:30:00'),(6,'15:40:00'),(7,'16:30:00'),(8,'17:00:00'),(9,'17:30:00'),(10,'18:00:00'),(11,'18:30:00'),(12,'18:45:00'),(13,'19:00:00'),(14,'19:30:00'),(15,'19:45:00'),(16,'20:00:00'),(17,'20:30:00'),(18,'20:45:00'),(19,'21:00:00'),(20,'21:30:00'),(21,'21:45:00'),(22,'22:00:00'),(23,'22:30:00'),(24,'22:45:00'),(25,'23:00:00'),(26,'23:30:00'),(27,'23:45:00');
/*!40000 ALTER TABLE `horarios` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `paises`
--

DROP TABLE IF EXISTS `paises`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `paises` (
  `idpais` int(11) NOT NULL AUTO_INCREMENT,
  `nomepais` varchar(255) NOT NULL,
  PRIMARY KEY (`idpais`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `paises`
--

LOCK TABLES `paises` WRITE;
/*!40000 ALTER TABLE `paises` DISABLE KEYS */;
INSERT INTO `paises` VALUES (1,'Estados Unidos'),(2,'Brasil'),(3,'Canadá'),(4,'Coréia do Sul'),(5,'Inglaterra'),(11,'Dinamarca'),(12,'México');
/*!40000 ALTER TABLE `paises` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `salas`
--

DROP TABLE IF EXISTS `salas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `salas` (
  `idsala` int(11) NOT NULL AUTO_INCREMENT,
  `nomesala` varchar(255) DEFAULT NULL,
  `capacidade` int(11) DEFAULT NULL,
  PRIMARY KEY (`idsala`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `salas`
--

LOCK TABLES `salas` WRITE;
/*!40000 ALTER TABLE `salas` DISABLE KEYS */;
INSERT INTO `salas` VALUES (1,'Sala 1',30),(2,'Sala 2',30),(3,'Sala 3',50),(4,'Sala 4',60),(8,'Sala 7',78);
/*!40000 ALTER TABLE `salas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sessoes`
--

DROP TABLE IF EXISTS `sessoes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sessoes` (
  `idsessao` int(11) NOT NULL AUTO_INCREMENT,
  `tiposessao` varchar(2) DEFAULT NULL,
  `sigla` varchar(3) DEFAULT NULL,
  `datasessao` date DEFAULT NULL,
  `idfilme` int(11) DEFAULT NULL,
  `idsala` int(11) DEFAULT NULL,
  `idhorario` int(11) DEFAULT NULL,
  PRIMARY KEY (`idsessao`),
  KEY `idfilme` (`idfilme`),
  KEY `idsala` (`idsala`),
  KEY `idhorario` (`idhorario`),
  CONSTRAINT `sessoes_ibfk_1` FOREIGN KEY (`idfilme`) REFERENCES `filmes` (`idfilme`),
  CONSTRAINT `sessoes_ibfk_2` FOREIGN KEY (`idsala`) REFERENCES `salas` (`idsala`),
  CONSTRAINT `sessoes_ibfk_3` FOREIGN KEY (`idhorario`) REFERENCES `horarios` (`idhorario`)
) ENGINE=InnoDB AUTO_INCREMENT=32 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sessoes`
--

LOCK TABLES `sessoes` WRITE;
/*!40000 ALTER TABLE `sessoes` DISABLE KEYS */;
INSERT INTO `sessoes` VALUES (4,'2D','DUB','2022-10-08',6,1,21),(6,'2D','NAC','2022-10-22',6,4,19),(7,'2D','DUB','2022-10-06',5,2,23),(8,'2D','DUB','2022-10-06',4,3,15),(27,'3d','DUB','2022-10-21',17,8,17),(28,'2D','DUB','2022-10-21',17,2,17),(29,'2D','DUB','2022-10-13',4,8,3),(30,'2D','DUB','2022-10-07',19,2,11),(31,'2D','DUB','2022-10-07',19,8,9);
/*!40000 ALTER TABLE `sessoes` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2022-10-06 16:43:55
