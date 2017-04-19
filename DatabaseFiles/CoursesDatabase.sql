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
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `alumno_curso`
--

LOCK TABLES `alumno_curso` WRITE;
/*!40000 ALTER TABLE `alumno_curso` DISABLE KEYS */;
INSERT INTO `alumno_curso` VALUES (6,1,1,'2017-04-17 20:31:29','2017-04-17 20:31:29');
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
  `imagen_id` int(10) unsigned DEFAULT NULL,
  `pais` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `fecha_nacimiento` date NOT NULL,
  `usuario` varchar(140) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `alumnos_email_unique` (`email`),
  UNIQUE KEY `alumnos_usuario_unique` (`usuario`),
  KEY `alumnos_imagen_id_foreign` (`imagen_id`),
  CONSTRAINT `alumnos_imagen_id_foreign` FOREIGN KEY (`imagen_id`) REFERENCES `imagenes` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `alumnos`
--

LOCK TABLES `alumnos` WRITE;
/*!40000 ALTER TABLE `alumnos` DISABLE KEYS */;
INSERT INTO `alumnos` VALUES (1,'Toplitzin','Hernández Mares','topi@hotmail.com','masculino',16,'México','1999-01-22','Topi99','$2y$10$EDuUvm8hMeHJxCmip.xX9.eefHpOGFmmkVmgyh0HQRHJBnGf6Skhi',NULL,'2017-04-11 20:45:21','2017-04-11 20:45:21');
/*!40000 ALTER TABLE `alumnos` ENABLE KEYS */;
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
INSERT INTO `categorias` VALUES (1,'Programación','programacion','2017-03-03 23:12:30','2017-03-03 23:12:30'),(2,'LOL','lol','2017-04-07 21:13:31','2017-04-07 21:13:31');
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
  `slug` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `comentarios_curso_id_foreign` (`curso_id`),
  KEY `comentarios_alumno_id_foreign` (`alumno_id`),
  CONSTRAINT `comentarios_alumno_id_foreign` FOREIGN KEY (`alumno_id`) REFERENCES `alumnos` (`id`) ON DELETE CASCADE,
  CONSTRAINT `comentarios_curso_id_foreign` FOREIGN KEY (`curso_id`) REFERENCES `cursos` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `comentarios`
--

LOCK TABLES `comentarios` WRITE;
/*!40000 ALTER TABLE `comentarios` DISABLE KEYS */;
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `curso_docente`
--

LOCK TABLES `curso_docente` WRITE;
/*!40000 ALTER TABLE `curso_docente` DISABLE KEYS */;
/*!40000 ALTER TABLE `curso_docente` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `curso_imagen`
--

DROP TABLE IF EXISTS `curso_imagen`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `curso_imagen` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `curso_id` int(10) unsigned NOT NULL,
  `imagen_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `curso_imagen_curso_id_foreign` (`curso_id`),
  KEY `curso_imagen_imagen_id_foreign` (`imagen_id`),
  CONSTRAINT `curso_imagen_curso_id_foreign` FOREIGN KEY (`curso_id`) REFERENCES `cursos` (`id`) ON DELETE CASCADE,
  CONSTRAINT `curso_imagen_imagen_id_foreign` FOREIGN KEY (`imagen_id`) REFERENCES `imagenes` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `curso_imagen`
--

LOCK TABLES `curso_imagen` WRITE;
/*!40000 ALTER TABLE `curso_imagen` DISABLE KEYS */;
INSERT INTO `curso_imagen` VALUES (1,1,2,'2017-03-23 17:28:56','2017-03-23 17:28:56'),(2,1,3,'2017-03-23 17:28:56','2017-03-23 17:28:56'),(3,1,4,'2017-03-23 17:28:56','2017-03-23 17:28:56'),(4,1,5,'2017-03-23 17:28:57','2017-03-23 17:28:57'),(5,2,6,'2017-03-30 22:22:43','2017-03-30 22:22:43'),(6,2,7,'2017-03-30 22:22:43','2017-03-30 22:22:43'),(7,2,8,'2017-03-30 22:22:43','2017-03-30 22:22:43'),(8,2,9,'2017-03-30 22:22:43','2017-03-30 22:22:43'),(11,5,14,'2017-03-30 23:09:39','2017-03-30 23:09:39'),(12,6,15,'2017-03-30 23:23:16','2017-03-30 23:23:16');
/*!40000 ALTER TABLE `curso_imagen` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `curso_tag`
--

DROP TABLE IF EXISTS `curso_tag`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `curso_tag` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `curso_id` int(10) unsigned NOT NULL,
  `tag_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `curso_tag_curso_id_foreign` (`curso_id`),
  KEY `curso_tag_tag_id_foreign` (`tag_id`),
  CONSTRAINT `curso_tag_curso_id_foreign` FOREIGN KEY (`curso_id`) REFERENCES `cursos` (`id`) ON DELETE CASCADE,
  CONSTRAINT `curso_tag_tag_id_foreign` FOREIGN KEY (`tag_id`) REFERENCES `tags` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=62 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `curso_tag`
--

LOCK TABLES `curso_tag` WRITE;
/*!40000 ALTER TABLE `curso_tag` DISABLE KEYS */;
INSERT INTO `curso_tag` VALUES (39,6,12,'2017-04-07 22:03:22','2017-04-07 22:03:22'),(40,5,13,'2017-04-07 22:03:29','2017-04-07 22:03:29'),(41,5,14,'2017-04-07 22:03:29','2017-04-07 22:03:29'),(42,5,15,'2017-04-07 22:03:29','2017-04-07 22:03:29'),(49,1,1,'2017-04-07 22:03:56','2017-04-07 22:03:56'),(50,1,2,'2017-04-07 22:03:56','2017-04-07 22:03:56'),(51,1,3,'2017-04-07 22:03:56','2017-04-07 22:03:56'),(52,1,4,'2017-04-07 22:03:56','2017-04-07 22:03:56'),(53,1,5,'2017-04-07 22:03:56','2017-04-07 22:03:56'),(54,1,6,'2017-04-07 22:03:56','2017-04-07 22:03:56'),(55,1,7,'2017-04-07 22:03:56','2017-04-07 22:03:56'),(56,2,8,'2017-04-07 22:05:58','2017-04-07 22:05:58'),(57,2,1,'2017-04-07 22:05:58','2017-04-07 22:05:58'),(58,2,4,'2017-04-07 22:05:58','2017-04-07 22:05:58'),(59,2,9,'2017-04-07 22:05:58','2017-04-07 22:05:58'),(60,2,10,'2017-04-07 22:05:58','2017-04-07 22:05:58'),(61,2,11,'2017-04-07 22:05:58','2017-04-07 22:05:58');
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
  `descripcion` text COLLATE utf8_unicode_ci NOT NULL,
  `bloqueo` enum('correo','social','login') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'social',
  `calificacion` int(11) NOT NULL DEFAULT '0',
  `visitas` int(11) NOT NULL DEFAULT '0',
  `clicks` int(11) NOT NULL DEFAULT '0',
  `video` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `categoria_id` int(10) unsigned NOT NULL,
  `subcategoria_id` int(10) unsigned NOT NULL,
  `institucion_id` int(10) unsigned NOT NULL,
  `slug` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `precio` int(11) NOT NULL,
  `estado` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `cursos_categoria_id_foreign` (`categoria_id`),
  KEY `cursos_subcategoria_id_foreign` (`subcategoria_id`),
  KEY `cursos_institucion_id_foreign` (`institucion_id`),
  CONSTRAINT `cursos_categoria_id_foreign` FOREIGN KEY (`categoria_id`) REFERENCES `categorias` (`id`) ON DELETE CASCADE,
  CONSTRAINT `cursos_institucion_id_foreign` FOREIGN KEY (`institucion_id`) REFERENCES `instituciones` (`id`) ON DELETE CASCADE,
  CONSTRAINT `cursos_subcategoria_id_foreign` FOREIGN KEY (`subcategoria_id`) REFERENCES `subcategorias` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cursos`
--

LOCK TABLES `cursos` WRITE;
/*!40000 ALTER TABLE `cursos` DISABLE KEYS */;
INSERT INTO `cursos` VALUES (1,'ReactJS','15 semanas','2017-12-12','español','alto','Hola hola hola','login',2,1,3,NULL,1,1,1,'reactjs','2017-03-23 17:28:55','2017-04-07 22:03:56',3500,'Pachuca'),(2,'ReactJS w/ Flux','150 semanas','2017-12-12','ingles','alto','Cory House es un cabrón','social',1,1,2,'https://youtube.com/embed/iT6AxnD7B0M',1,1,1,'reactjs-w-flux','2017-03-30 22:22:41','2017-04-07 22:05:58',6000,'Hidalgo'),(5,'Ingeniería Web','12 dias','2017-05-14','español','intermedio','Que onda que pez React que pez que ponda','social',5,0,0,NULL,1,2,2,'ingenieria-web','2017-03-30 23:09:38','2017-04-07 22:03:29',1000,'Puebla'),(6,'Frontend','14 dias','2017-11-11','español','intermedio','Jacobos + Minion React JS Angular','login',0,0,0,NULL,1,2,3,'frontend','2017-03-30 23:23:13','2017-04-07 22:02:46',1500,'Puebla');
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
  `apellidos` varchar(140) COLLATE utf8_unicode_ci NOT NULL,
  `grado_estudio` varchar(140) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `usuario` varchar(140) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `institucion_id` int(10) unsigned NOT NULL,
  `imagen_id` int(10) unsigned DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `docentes_email_unique` (`email`),
  KEY `docentes_institucion_id_foreign` (`institucion_id`),
  KEY `docentes_imagen_id_foreign` (`imagen_id`),
  CONSTRAINT `docentes_imagen_id_foreign` FOREIGN KEY (`imagen_id`) REFERENCES `imagenes` (`id`) ON DELETE CASCADE,
  CONSTRAINT `docentes_institucion_id_foreign` FOREIGN KEY (`institucion_id`) REFERENCES `instituciones` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `docentes`
--

LOCK TABLES `docentes` WRITE;
/*!40000 ALTER TABLE `docentes` DISABLE KEYS */;
/*!40000 ALTER TABLE `docentes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `imagenes`
--

DROP TABLE IF EXISTS `imagenes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `imagenes` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `ruta` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `imagenes`
--

LOCK TABLES `imagenes` WRITE;
/*!40000 ALTER TABLE `imagenes` DISABLE KEYS */;
INSERT INTO `imagenes` VALUES (1,'/images/instituciones/Institucion_FixterGeek.jpg','2017-03-03 23:12:16','2017-03-03 23:12:16'),(2,'/images/cursos/Curso_ReactJS-1.png','2017-03-23 17:28:56','2017-03-23 17:28:56'),(3,'/images/cursos/Curso_ReactJS-2.png','2017-03-23 17:28:56','2017-03-23 17:28:56'),(4,'/images/cursos/Curso_ReactJS-3.jpg','2017-03-23 17:28:56','2017-03-23 17:28:56'),(5,'/images/cursos/Curso_ReactJS-4.jpg','2017-03-23 17:28:56','2017-03-23 17:28:56'),(6,'/images/cursos/Curso_ReactJS w/ Flux-1.jpg','2017-03-30 22:22:43','2017-03-30 22:22:43'),(7,'/images/cursos/Curso_ReactJS w/ Flux-2.png','2017-03-30 22:22:43','2017-03-30 22:22:43'),(8,'/images/cursos/Curso_ReactJS w/ Flux-3.png','2017-03-30 22:22:43','2017-03-30 22:22:43'),(9,'/images/cursos/Curso_ReactJS w/ Flux-4.jpg','2017-03-30 22:22:43','2017-03-30 22:22:43'),(10,'/images/instituciones/Institucion_UPP.png','2017-03-30 22:35:11','2017-03-30 22:35:11'),(11,'/images/instituciones/Institucion_UTTTTTTTTTTTTTTT.jpg','2017-03-30 22:36:56','2017-03-30 22:36:56'),(12,'/images/cursos/Curso_Ingeniería Web-1.png','2017-03-30 22:43:46','2017-03-30 22:43:46'),(13,'/images/cursos/Curso_Frontend-1.jpg','2017-03-30 23:02:14','2017-03-30 23:02:14'),(14,'/images/cursos/Curso_Ingeniería Web-1.jpg','2017-03-30 23:09:39','2017-03-30 23:09:39'),(15,'/images/cursos/Curso_Frontend-1.jpg','2017-03-30 23:23:14','2017-03-30 23:23:14'),(16,'/images/alumnos/profile/Alumno_Topi99.png','2017-04-11 20:45:20','2017-04-11 20:45:20');
/*!40000 ALTER TABLE `imagenes` ENABLE KEYS */;
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
  `telefono` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `codigo_postal` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `pais` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `estado` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `municipio` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `direccion` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `membresia` enum('gratuita','extraordinaria','premium') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'gratuita',
  `latitud` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `longitud` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `facebook` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `twitter` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `google` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `pagina_web` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `imagen_id` int(10) unsigned DEFAULT NULL,
  `slug` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `instituciones_email_unique` (`email`),
  UNIQUE KEY `instituciones_telefono_unique` (`telefono`),
  KEY `instituciones_imagen_id_foreign` (`imagen_id`),
  CONSTRAINT `instituciones_imagen_id_foreign` FOREIGN KEY (`imagen_id`) REFERENCES `imagenes` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `instituciones`
--

LOCK TABLES `instituciones` WRITE;
/*!40000 ALTER TABLE `instituciones` DISABLE KEYS */;
INSERT INTO `instituciones` VALUES (1,'FixterGeek','contacto@fixtergeek.com','7721018271','42500','México','Hidalgo','Pachuca de Soto','CITNOVA','premium','','','https://www.facebook.com/fixterme/?fref=ts','https://twitter.com/FixTeR_','','fixter.camp',1,'fixtergeek','2017-03-03 23:12:16','2017-03-03 23:12:16'),(2,'UPP','upp@universidades.com','771123123123','32323','México','Hidalgo','Zempoala','En la tierrita','gratuita','','','https://www.facebook.com/UPPachuca/?fref=ts','','','http://www.upp.edu.mx/front/',10,'upp','2017-03-30 22:35:11','2017-03-30 22:35:11'),(3,'UTTTTTTTTTTTTTTT','uttt@universidad.com','7721231231231','42500','México','Hidalgo','Tula','Tepeji','extraordinaria','','','https://www.facebook.com/ut.tulatepeji?fref=ts','','','http://www.uttt.edu.mx/',11,'uttttttttttttttt','2017-03-30 22:36:56','2017-03-30 22:36:56');
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
) ENGINE=InnoDB AUTO_INCREMENT=39 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES (18,'2014_10_12_000000_create_users_table',1),(19,'2014_10_12_100000_create_password_resets_table',1),(20,'2016_12_19_180922_Imagenes',1),(21,'2016_12_19_183947_instituciones',1),(22,'2016_12_19_184005_docentes',1),(23,'2016_12_19_184017_categorias',1),(24,'2016_12_19_184020_subcategorias',1),(25,'2016_12_19_184023_alumnos',1),(26,'2016_12_19_184027_cursos',1),(27,'2016_12_19_184039_curso_docente',1),(28,'2016_12_20_232545_comentarios_new',1),(29,'2016_12_20_234800_alumno_curso',1),(30,'2017_01_07_160800_ventajas',1),(31,'2017_01_07_160900_temario',1),(32,'2017_01_10_222415_tagss',1),(33,'2017_01_26_152804_curso_tag',1),(34,'2017_02_20_180936_curso_imagen',1),(35,'2017_04_07_151253_precioCurso',2),(36,'2017_04_07_153009_LaCague',3),(37,'2017_04_07_155936_OtravezPrecio',4),(38,'2017_04_07_165420_AddUbicationtoCourses',5);
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
-- Table structure for table `subcategorias`
--

DROP TABLE IF EXISTS `subcategorias`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `subcategorias` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `categoria_id` int(10) unsigned NOT NULL,
  `slug` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `subcategorias_categoria_id_foreign` (`categoria_id`),
  CONSTRAINT `subcategorias_categoria_id_foreign` FOREIGN KEY (`categoria_id`) REFERENCES `categorias` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `subcategorias`
--

LOCK TABLES `subcategorias` WRITE;
/*!40000 ALTER TABLE `subcategorias` DISABLE KEYS */;
INSERT INTO `subcategorias` VALUES (1,'Python3',1,'python3','2017-03-03 23:30:26','2017-03-03 23:33:26'),(2,'React',1,'react','2017-03-30 22:38:06','2017-03-30 22:38:06'),(3,'Gnar',2,'gnar','2017-04-07 21:13:41','2017-04-07 21:13:41');
/*!40000 ALTER TABLE `subcategorias` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tags`
--

DROP TABLE IF EXISTS `tags`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tags` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nombre` varchar(140) COLLATE utf8_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tags`
--

LOCK TABLES `tags` WRITE;
/*!40000 ALTER TABLE `tags` DISABLE KEYS */;
INSERT INTO `tags` VALUES (1,'react','react','2017-03-23 17:28:55','2017-03-23 17:28:55'),(2,'javascript','javascript','2017-03-23 17:28:55','2017-03-23 17:28:55'),(3,'ecmascript','ecmascript','2017-03-23 17:28:55','2017-03-23 17:28:55'),(4,'flux','flux','2017-03-23 17:28:55','2017-03-23 17:28:55'),(5,'redux','redux','2017-03-23 17:28:56','2017-03-23 17:28:56'),(6,'gulp','gulp','2017-03-23 17:28:56','2017-03-23 17:28:56'),(7,'browserify','browserify','2017-03-23 17:28:56','2017-03-23 17:28:56'),(8,'pluralsight','pluralsight','2017-03-30 22:22:41','2017-03-30 22:22:41'),(9,'facebook','facebook','2017-03-30 22:22:41','2017-03-30 22:22:41'),(10,'cory','cory','2017-03-30 22:22:41','2017-03-30 22:22:41'),(11,'house','house','2017-03-30 22:22:41','2017-03-30 22:22:41'),(12,'',NULL,'2017-03-30 22:43:46','2017-03-30 22:43:46'),(13,'hola','hola','2017-03-30 23:09:38','2017-03-30 23:09:38'),(14,'que','que','2017-03-30 23:09:38','2017-03-30 23:09:38'),(15,'hace','hace','2017-03-30 23:09:39','2017-03-30 23:09:39');
/*!40000 ALTER TABLE `tags` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `temarios`
--

DROP TABLE IF EXISTS `temarios`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `temarios` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `tema` text COLLATE utf8_unicode_ci NOT NULL,
  `curso_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `temarios_curso_id_foreign` (`curso_id`),
  CONSTRAINT `temarios_curso_id_foreign` FOREIGN KEY (`curso_id`) REFERENCES `cursos` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `temarios`
--

LOCK TABLES `temarios` WRITE;
/*!40000 ALTER TABLE `temarios` DISABLE KEYS */;
INSERT INTO `temarios` VALUES (19,'Entorno de Desarrollo con Gulp',1,'2017-04-07 22:03:57','2017-04-07 22:03:57'),(20,'JSX',1,'2017-04-07 22:03:57','2017-04-07 22:03:57'),(21,'Integrando Flux',1,'2017-04-07 22:03:57','2017-04-07 22:03:57'),(22,'Javascript',2,'2017-04-07 22:05:58','2017-04-07 22:05:58'),(23,'ES2015',2,'2017-04-07 22:05:58','2017-04-07 22:05:58'),(24,'React',2,'2017-04-07 22:05:58','2017-04-07 22:05:58'),(25,'Flux',2,'2017-04-07 22:05:58','2017-04-07 22:05:58');
/*!40000 ALTER TABLE `temarios` ENABLE KEYS */;
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
INSERT INTO `users` VALUES (1,'Martin Melo Godínez','nitram-210397@hotmail.com','$2y$10$sYqbW2xAypaJEnchVhW.6uoQm3o2U2kVkD9hsjU4p4gP28SGG.Er6','7b96IAWo2shDEnhN8Mr50w9DiND06H9eBLO21tQUTDpHnq1YrEKEU3dZjO4W','2017-03-03 23:09:30','2017-04-11 20:41:19');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ventajas`
--

DROP TABLE IF EXISTS `ventajas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ventajas` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `ventaja` text COLLATE utf8_unicode_ci NOT NULL,
  `curso_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `ventajas_curso_id_foreign` (`curso_id`),
  CONSTRAINT `ventajas_curso_id_foreign` FOREIGN KEY (`curso_id`) REFERENCES `cursos` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=36 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ventajas`
--

LOCK TABLES `ventajas` WRITE;
/*!40000 ALTER TABLE `ventajas` DISABLE KEYS */;
INSERT INTO `ventajas` VALUES (23,'',6,'2017-04-07 22:03:22','2017-04-07 22:03:22'),(24,'nunga alv',5,'2017-04-07 22:03:29','2017-04-07 22:03:29'),(29,'Certificado',1,'2017-04-07 22:03:56','2017-04-07 22:03:56'),(30,'24/7',1,'2017-04-07 22:03:56','2017-04-07 22:03:56'),(31,'Mejor que Hackter alv',1,'2017-04-07 22:03:56','2017-04-07 22:03:56'),(32,'Es de Plural Sight',2,'2017-04-07 22:05:58','2017-04-07 22:05:58'),(33,'Facilito',2,'2017-04-07 22:05:58','2017-04-07 22:05:58'),(34,'Instructor mamalón',2,'2017-04-07 22:05:58','2017-04-07 22:05:58'),(35,'Alguna otra',2,'2017-04-07 22:05:58','2017-04-07 22:05:58');
/*!40000 ALTER TABLE `ventajas` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2017-04-19 16:06:28
