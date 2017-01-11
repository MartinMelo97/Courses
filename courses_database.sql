-- MySQL dump 10.13  Distrib 5.7.16, for Linux (x86_64)
--
-- Host: localhost    Database: Courses
-- ------------------------------------------------------
-- Server version	5.7.16-0ubuntu0.16.04.1

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
-- Table structure for table `alumno_curso`
--

DROP TABLE IF EXISTS `alumno_curso`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `alumno_curso` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `alumno_id` int(10) unsigned NOT NULL,
  `curso_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `alumno_curso_alumno_id_foreign` (`alumno_id`),
  KEY `alumno_curso_curso_id_foreign` (`curso_id`),
  CONSTRAINT `alumno_curso_alumno_id_foreign` FOREIGN KEY (`alumno_id`) REFERENCES `alumnos` (`id`) ON DELETE CASCADE,
  CONSTRAINT `alumno_curso_curso_id_foreign` FOREIGN KEY (`curso_id`) REFERENCES `cursos` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `alumno_curso`
--

LOCK TABLES `alumno_curso` WRITE;
/*!40000 ALTER TABLE `alumno_curso` DISABLE KEYS */;
INSERT INTO `alumno_curso` VALUES (1,1,1,'2016-12-25 03:37:36','2016-12-25 03:37:36'),(2,6,2,'2016-12-27 19:50:38','2016-12-27 19:50:38');
/*!40000 ALTER TABLE `alumno_curso` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `alumnos`
--

DROP TABLE IF EXISTS `alumnos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `alumnos` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nombre` varchar(140) COLLATE utf8_unicode_ci NOT NULL,
  `apellidos` varchar(140) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `sexo` enum('masculino','femenino') COLLATE utf8_unicode_ci NOT NULL,
  `imagen` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `pais` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `fecha_nacimiento` date NOT NULL,
  `usuario` varchar(140) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `alumnos_email_unique` (`email`),
  UNIQUE KEY `alumnos_usuario_unique` (`usuario`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `alumnos`
--

LOCK TABLES `alumnos` WRITE;
/*!40000 ALTER TABLE `alumnos` DISABLE KEYS */;
INSERT INTO `alumnos` VALUES (1,'Martin','Melo Godinez','elwwefanreik@gmail.com','masculino','/images/alumnos/profile/Alumno_MartinMelo97.png','Mexico','1997-03-21','MartinMelo97','$2y$10$uTCtqgSTVyKQtJ.7t10/lud.Mw/P4SZr45lpe09ys0s6TOl7zafEm','martin','bWVC802pWcsgqIqfz3JFA83JT3Ub15h5nshIkQwnZpsvUJuU1ftc6lxONKoG','2016-12-25 03:35:29','2016-12-28 06:42:09'),(6,'Topiltzina','Hernández Mares','topi99@vectorbr.com','femenino','/images/alumnos/profile/Alumno_Topi99.png','México','1999-01-22','Topi99','$2y$10$H2uHIN9FOCsi3aQfuKZ7YOtLzv5Y8e7iA2hGo8SpDv6LAqEgzIfDW','topiltzin','RhUkLPih78SMWb9ELOoUvpaCfJE9aJSa5oJWQQaeLQ0K4PcEvlI1KUPDAyzb','2016-12-27 19:45:33','2016-12-28 06:47:44'),(7,'Juan','Solo','juansolo@beatamina.com','masculino','/images/alumnos/profile/Alumno_JuanSolo.png','México','1978-12-12','JuanSolo','$2y$10$M8gDhK7F8qAMvPQuZZTqKOsiEpHYkoKXhCJ58bGB9cOFXFmMbP5Ey','juan',NULL,'2016-12-27 19:55:56','2016-12-27 19:55:56'),(8,'Santiago','Cano Melo','santi@hotmail.com','masculino','/images/alumnos/profile/Alumno_SantiagoCanoM.png','Mexico','1997-03-21','SantiagoCanoM','$2y$10$WAbn2CXV7OrmWxs2l6fu9eFBs2pLSjjIG82YavtBAK3osGdDdntN2','santiago','QHMqQGhhU2Ljm1l7kIDpVMAsIpoiZJChxTB2yVsbEoaT9woCZyHac4SwREiG','2016-12-28 03:35:12','2016-12-28 03:35:23'),(9,'Mateo','Huerta','mateo@hotmail.com','masculino','/images/alumnos/profile/Alumno_MateoMelo.png','Mexico','1997-03-21','MateoMelo','$2y$10$dGUc99MYup3kiqLYKqhvJ.N9pwulEZIP8BDjhIcb3Fk0E6uyeeLw2','mateo','tnDH0hmEqIJtlFnyBZCyTp2BAstiNp1anlUjWNfLI87gukolmS50ycPiITLM','2016-12-28 03:44:16','2016-12-28 05:10:49'),(10,'Adriana','Gonzalez Cheew','adriana@cheew.com','femenino','/images/alumnos/profile/Alumno_AdrianaCheew.png','México','1997-08-14','AdrianaCheew','$2y$10$NjoxdXrt4hGuNQ9leVJ1.er3XJ7kL8eHo4fKfBwkLc4jm2QGM2bTu','adriana','dUYtK2tQFwXf2KJGUzsIuAmy42Lp7m38QulTSfpwlG6ewmDz5esH9Ki9q4b6','2016-12-28 06:48:22','2016-12-28 06:48:56'),(11,'Claudia','Hernandez Mares','clau@lasrosas.com','femenino','/images/alumnos/profile/Alumno_ClauHdz.png','México','1997-03-21','ClauHdz','$2y$10$7JOPwuyGudfsNQ6NYhH5dePkJwX2y96orQun6xa/OrnxJpwcMEr6i','claudia','vvfotANWO0fquiqhp79uBcABo84HI3dSbl3llvQzSeVnOI3DgpEFR3lsZFtS','2016-12-28 06:54:00','2016-12-28 07:33:50');
/*!40000 ALTER TABLE `alumnos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `categoria_curso`
--

DROP TABLE IF EXISTS `categoria_curso`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `categoria_curso` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `categoria_id` int(10) unsigned NOT NULL,
  `curso_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `categoria_curso_categoria_id_foreign` (`categoria_id`),
  KEY `categoria_curso_curso_id_foreign` (`curso_id`),
  CONSTRAINT `categoria_curso_categoria_id_foreign` FOREIGN KEY (`categoria_id`) REFERENCES `categorias` (`id`) ON DELETE CASCADE,
  CONSTRAINT `categoria_curso_curso_id_foreign` FOREIGN KEY (`curso_id`) REFERENCES `cursos` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `categoria_curso`
--

LOCK TABLES `categoria_curso` WRITE;
/*!40000 ALTER TABLE `categoria_curso` DISABLE KEYS */;
INSERT INTO `categoria_curso` VALUES (1,1,1,'2016-12-25 03:37:18','2016-12-25 03:37:18'),(2,2,1,'2016-12-26 07:28:29','2016-12-26 07:28:29'),(3,2,2,'2016-12-26 09:03:40','2016-12-26 09:03:40');
/*!40000 ALTER TABLE `categoria_curso` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `categorias`
--

DROP TABLE IF EXISTS `categorias`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `categorias` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nombre` varchar(140) COLLATE utf8_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `categorias_nombre_unique` (`nombre`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `categorias`
--

LOCK TABLES `categorias` WRITE;
/*!40000 ALTER TABLE `categorias` DISABLE KEYS */;
INSERT INTO `categorias` VALUES (1,'Programacion','programacion','2016-12-25 03:24:17','2016-12-25 03:24:17'),(2,'Informatica','informatica','2016-12-26 07:27:42','2016-12-26 07:27:42');
/*!40000 ALTER TABLE `categorias` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `comentarios`
--

DROP TABLE IF EXISTS `comentarios`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `comentarios` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `comentario` text COLLATE utf8_unicode_ci NOT NULL,
  `curso_id` int(10) unsigned NOT NULL,
  `alumno_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `comentarios_curso_id_foreign` (`curso_id`),
  KEY `comentarios_alumno_id_foreign` (`alumno_id`),
  CONSTRAINT `comentarios_alumno_id_foreign` FOREIGN KEY (`alumno_id`) REFERENCES `alumnos` (`id`) ON DELETE CASCADE,
  CONSTRAINT `comentarios_curso_id_foreign` FOREIGN KEY (`curso_id`) REFERENCES `cursos` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `comentarios`
--

LOCK TABLES `comentarios` WRITE;
/*!40000 ALTER TABLE `comentarios` DISABLE KEYS */;
INSERT INTO `comentarios` VALUES (1,'Esta perron',1,1,'2016-12-26 08:08:14','2016-12-26 08:08:14');
/*!40000 ALTER TABLE `comentarios` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `curso_docente`
--

DROP TABLE IF EXISTS `curso_docente`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `curso_docente` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `curso_id` int(10) unsigned NOT NULL,
  `docente_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `curso_docente_curso_id_foreign` (`curso_id`),
  KEY `curso_docente_docente_id_foreign` (`docente_id`),
  CONSTRAINT `curso_docente_curso_id_foreign` FOREIGN KEY (`curso_id`) REFERENCES `cursos` (`id`) ON DELETE CASCADE,
  CONSTRAINT `curso_docente_docente_id_foreign` FOREIGN KEY (`docente_id`) REFERENCES `docentes` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `curso_docente`
--

LOCK TABLES `curso_docente` WRITE;
/*!40000 ALTER TABLE `curso_docente` DISABLE KEYS */;
INSERT INTO `curso_docente` VALUES (1,1,1,'2016-12-25 03:36:46','2016-12-25 03:36:46'),(2,2,1,'2016-12-26 09:04:38','2016-12-26 09:04:38');
/*!40000 ALTER TABLE `curso_docente` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `curso_tag`
--

DROP TABLE IF EXISTS `curso_tag`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `curso_tag` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `tag_id` int(10) unsigned NOT NULL,
  `curso_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `curso_tag_tag_id_foreign` (`tag_id`),
  KEY `curso_tag_curso_id_foreign` (`curso_id`),
  CONSTRAINT `curso_tag_curso_id_foreign` FOREIGN KEY (`curso_id`) REFERENCES `cursos` (`id`) ON DELETE CASCADE,
  CONSTRAINT `curso_tag_tag_id_foreign` FOREIGN KEY (`tag_id`) REFERENCES `tags` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `curso_tag`
--

LOCK TABLES `curso_tag` WRITE;
/*!40000 ALTER TABLE `curso_tag` DISABLE KEYS */;
INSERT INTO `curso_tag` VALUES (1,1,1,'2016-12-25 03:44:44','2016-12-25 03:44:44'),(2,2,1,NULL,NULL),(3,1,2,'2016-12-26 09:04:28','2016-12-26 09:04:28');
/*!40000 ALTER TABLE `curso_tag` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cursos`
--

DROP TABLE IF EXISTS `cursos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cursos` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `duracion` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `fecha_inicio` date NOT NULL,
  `lenguaje` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `nivel` enum('facil','intermedio','alto') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'facil',
  `gratis` tinyint(1) NOT NULL,
  `descripcion` text COLLATE utf8_unicode_ci NOT NULL,
  `calificacion` int(11) NOT NULL,
  `institucion_id` int(10) unsigned NOT NULL,
  `slug` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `cursos_institucion_id_foreign` (`institucion_id`),
  CONSTRAINT `cursos_institucion_id_foreign` FOREIGN KEY (`institucion_id`) REFERENCES `instituciones` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cursos`
--

LOCK TABLES `cursos` WRITE;
/*!40000 ALTER TABLE `cursos` DISABLE KEYS */;
INSERT INTO `cursos` VALUES (1,'Programacion Estructurada con C++','1 semestre','2017-02-03','Español','facil',1,'para noobs',4,3,'programacion-estructurada-con-c','2016-12-25 03:32:27','2016-12-25 03:32:27'),(2,'Laravel 5.3','3 semanas','2017-01-01','Español','intermedio',0,'No esta chido como Django',2,3,'laravel-5-3','2016-12-26 09:02:31','2016-12-26 09:02:31');
/*!40000 ALTER TABLE `cursos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `docentes`
--

DROP TABLE IF EXISTS `docentes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `docentes` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nombre` varchar(140) COLLATE utf8_unicode_ci NOT NULL,
  `grado_estudio` varchar(140) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `usuario` varchar(140) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `institucion_id` int(10) unsigned NOT NULL,
  `slug` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `docentes_email_unique` (`email`),
  KEY `docentes_institucion_id_foreign` (`institucion_id`),
  CONSTRAINT `docentes_institucion_id_foreign` FOREIGN KEY (`institucion_id`) REFERENCES `instituciones` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `docentes`
--

LOCK TABLES `docentes` WRITE;
/*!40000 ALTER TABLE `docentes` DISABLE KEYS */;
INSERT INTO `docentes` VALUES (1,'Guadalupe Mata','Mtra en Informática','gambymatacbtis@hotmail.com','GambyMata','$2y$10$o2QcRCHi8JkSZ8DdBmFV1eoh/UivP.bNgk55RM4XmxWaBa8VyCZIu',3,'guadalupe-mata','VQ5BARN3AZ4dYJwW0V5J8YkB2bAyWz1Ib4R3qgNwC2xJqFCBAzxTm992EJ0Q','2016-12-25 03:21:26','2016-12-28 23:27:58');
/*!40000 ALTER TABLE `docentes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `instituciones`
--

DROP TABLE IF EXISTS `instituciones`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `instituciones` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nombre` varchar(140) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(140) COLLATE utf8_unicode_ci NOT NULL,
  `imagen` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `instituciones_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `instituciones`
--

LOCK TABLES `instituciones` WRITE;
/*!40000 ALTER TABLE `instituciones` DISABLE KEYS */;
INSERT INTO `instituciones` VALUES (2,'Instituto Politécnico Nacional','ipn@edu.mx','som','instituto-politecnico-nacional','2016-12-25 03:11:42','2016-12-25 03:11:42'),(3,'Cbtis 83','cbtis83@dgeti.com','some','cbtis-83','2016-12-25 03:20:56','2016-12-25 03:20:56');
/*!40000 ALTER TABLE `instituciones` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=37 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES (23,'2014_10_12_000000_create_users_table',1),(24,'2014_10_12_100000_create_password_resets_table',1),(25,'2016_12_19_183947_instituciones',1),(26,'2016_12_19_184005_docentes',1),(27,'2016_12_19_184017_categorias',1),(28,'2016_12_19_184023_alumnos',1),(29,'2016_12_19_184027_cursos',1),(30,'2016_12_19_184039_curso_docente',1),(31,'2016_12_20_232545_comentarios_new',1),(32,'2016_12_20_234800_alumno_curso',1),(33,'2016_12_20_234811_categoria_curso',1),(34,'2016_12_24_192711_tags',1),(35,'2016_12_24_213925_curso_tag',2),(36,'2016_12_24_214327_curso_tag2',3);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`),
  KEY `password_resets_token_index` (`token`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `password_resets`
--

LOCK TABLES `password_resets` WRITE;
/*!40000 ALTER TABLE `password_resets` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_resets` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tags`
--

DROP TABLE IF EXISTS `tags`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tags` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nombre` text COLLATE utf8_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tags`
--

LOCK TABLES `tags` WRITE;
/*!40000 ALTER TABLE `tags` DISABLE KEYS */;
INSERT INTO `tags` VALUES (1,'Tag de prueba','tag-de-prueba','2016-12-25 03:29:51','2016-12-25 03:29:51'),(2,'Otro tag de prueba','otro-tag-de-prueba',NULL,NULL);
/*!40000 ALTER TABLE `tags` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'Martin Melo','nitram-210397@hotmail.com','$2y$10$VntjfVdD2Z/LLBnLBnkvSu3CWRGz3KkrSkt7Bw5Iy5kadx4U6jsem',NULL,'2016-12-30 21:37:45','2016-12-30 21:37:45');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2017-01-04 20:08:52
