-- MySQL dump 10.13  Distrib 8.0.34, for Win64 (x86_64)
--
-- Host: 127.0.0.1    Database: bd_coneplit
-- ------------------------------------------------------
-- Server version	8.0.35

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `empresa`
--

DROP TABLE IF EXISTS `empresa`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `empresa` (
  `IDEmpresa` int NOT NULL AUTO_INCREMENT,
  `Nombre` varchar(30) NOT NULL,
  `Contacto` varchar(30) NOT NULL,
  PRIMARY KEY (`IDEmpresa`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `empresa`
--

LOCK TABLES `empresa` WRITE;
/*!40000 ALTER TABLE `empresa` DISABLE KEYS */;
INSERT INTO `empresa` VALUES (1,'Tigo','4G'),(2,'WOM','4G'),(3,'Claro','4G'),(4,'Movistar','4G'),(5,'ETB','4G'),(6,'Avantel','4G'),(7,'Virgin Mobile','4G'),(8,'Movil Exito','4G');
/*!40000 ALTER TABLE `empresa` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `reportes`
--

DROP TABLE IF EXISTS `reportes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `reportes` (
  `IDReportes` int NOT NULL,
  `Descripcion` varchar(45) NOT NULL,
  `Fecha` datetime NOT NULL,
  `Estado` int NOT NULL,
  `FK_IDZona` int NOT NULL,
  `FK_ID` int NOT NULL,
  `FK_IDEmpresa` int NOT NULL,
  PRIMARY KEY (`IDReportes`),
  KEY `FK_CodigoPostal_idx` (`FK_IDZona`),
  KEY `FK_IDEmpresa_idx` (`FK_IDEmpresa`),
  KEY `FK_ID_idx` (`FK_ID`),
  CONSTRAINT `FK_ID` FOREIGN KEY (`FK_ID`) REFERENCES `usuarios` (`ID`),
  CONSTRAINT `FK_IDEmpresa` FOREIGN KEY (`FK_IDEmpresa`) REFERENCES `empresa` (`IDEmpresa`),
  CONSTRAINT `FK_IDZona` FOREIGN KEY (`FK_IDZona`) REFERENCES `zona` (`IDZona`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `reportes`
--

LOCK TABLES `reportes` WRITE;
/*!40000 ALTER TABLE `reportes` DISABLE KEYS */;
/*!40000 ALTER TABLE `reportes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ubicacion`
--

DROP TABLE IF EXISTS `ubicacion`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `ubicacion` (
  `IDUbicacion` int NOT NULL AUTO_INCREMENT,
  `RADIO` int NOT NULL,
  `LATITUD` int NOT NULL,
  `LONGITUD` int NOT NULL,
  `FK_IDZona1` int DEFAULT NULL,
  `FK_ID1` int DEFAULT NULL,
  PRIMARY KEY (`IDUbicacion`),
  KEY `FK_IDZona_idx` (`FK_IDZona1`),
  KEY `FK_ID1_idx` (`FK_ID1`),
  CONSTRAINT `FK_ID1` FOREIGN KEY (`FK_ID1`) REFERENCES `usuarios` (`ID`),
  CONSTRAINT `FK_IDZona1` FOREIGN KEY (`FK_IDZona1`) REFERENCES `zona` (`IDZona`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ubicacion`
--

LOCK TABLES `ubicacion` WRITE;
/*!40000 ALTER TABLE `ubicacion` DISABLE KEYS */;
/*!40000 ALTER TABLE `ubicacion` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `usuarios`
--

DROP TABLE IF EXISTS `usuarios`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `usuarios` (
  `ID` int NOT NULL AUTO_INCREMENT,
  `Usuario` varchar(50) NOT NULL,
  `Email` varchar(100) NOT NULL,
  `Contrasena` varchar(255) NOT NULL,
  `UltimoCierreSesion` datetime DEFAULT NULL,
  `Admin` tinyint NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usuarios`
--

LOCK TABLES `usuarios` WRITE;
/*!40000 ALTER TABLE `usuarios` DISABLE KEYS */;
INSERT INTO `usuarios` VALUES (6,'jotha','jonatan-041204@hotmail.es','$2y$10$gP2/nzvkMDU/cTTLj8l6DeRzkmJqR59ePVrgdY3.zgSOWi9YwIMjm',NULL,1),(12,'Pinto','pinto@hotmail.es','$2y$10$MTpxIe0bs8gM/GO2KTJ2fulgiyDal2y1YSsyfY9TPaSr2gimcKXKe',NULL,0);
/*!40000 ALTER TABLE `usuarios` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `zona`
--

DROP TABLE IF EXISTS `zona`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `zona` (
  `IDZona` int NOT NULL AUTO_INCREMENT,
  `Poblacion` varchar(30) NOT NULL,
  `InfraestructuraExistente` varchar(45) DEFAULT NULL,
  `ProyectosEnCurso` varchar(45) DEFAULT NULL,
  `FK_IDUbicacion` int NOT NULL,
  PRIMARY KEY (`IDZona`),
  KEY `FK_IDUbicacion` (`FK_IDUbicacion`),
  CONSTRAINT `FK_IDUbicacion` FOREIGN KEY (`FK_IDUbicacion`) REFERENCES `ubicacion` (`IDUbicacion`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `zona`
--

LOCK TABLES `zona` WRITE;
/*!40000 ALTER TABLE `zona` DISABLE KEYS */;
/*!40000 ALTER TABLE `zona` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2024-11-08 20:42:05
