/*!999999\- enable the sandbox mode */ 
-- MariaDB dump 10.19  Distrib 10.11.8-MariaDB, for debian-linux-gnu (x86_64)
--
-- Host: localhost    Database: pwe
-- ------------------------------------------------------
-- Server version	10.11.8-MariaDB-0ubuntu0.24.04.1

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
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `migrations` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `version` varchar(255) NOT NULL,
  `class` varchar(255) NOT NULL,
  `group` varchar(255) NOT NULL,
  `namespace` varchar(255) NOT NULL,
  `time` int(11) NOT NULL,
  `batch` int(11) unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES
(12,'2024-10-21-151639','App\\Database\\Migrations\\TblKamar','default','App',1730733391,1),
(13,'2024-10-21-151806','App\\Database\\Migrations\\TblFasilitas','default','App',1730733391,1),
(14,'2024-10-21-151821','App\\Database\\Migrations\\TblKamarFasilitas','default','App',1730733391,1),
(15,'2024-10-21-151836','App\\Database\\Migrations\\TblTamu','default','App',1730733391,1),
(16,'2024-10-21-151851','App\\Database\\Migrations\\TblBooking','default','App',1730733391,1),
(17,'2024-11-04-080330','App\\Database\\Migrations\\TblLogin','default','App',1730733391,1);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tblbooking`
--

DROP TABLE IF EXISTS `tblbooking`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tblbooking` (
  `id` int(6) unsigned NOT NULL AUTO_INCREMENT,
  `id_tamu` int(6) unsigned NOT NULL,
  `id_kamar` int(6) unsigned NOT NULL,
  `tanggal_checkin` date NOT NULL,
  `tanggal_checkout` date NOT NULL,
  `jumlah_kamar` int(11) NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`),
  KEY `tblbooking_id_tamu_foreign` (`id_tamu`),
  KEY `tblbooking_id_kamar_foreign` (`id_kamar`),
  CONSTRAINT `tblbooking_id_kamar_foreign` FOREIGN KEY (`id_kamar`) REFERENCES `tblkamar` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `tblbooking_id_tamu_foreign` FOREIGN KEY (`id_tamu`) REFERENCES `tbltamu` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tblbooking`
--

LOCK TABLES `tblbooking` WRITE;
/*!40000 ALTER TABLE `tblbooking` DISABLE KEYS */;
INSERT INTO `tblbooking` VALUES
(1,3,2,'2024-11-09','2024-11-10',1);
/*!40000 ALTER TABLE `tblbooking` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tblfasilitas`
--

DROP TABLE IF EXISTS `tblfasilitas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tblfasilitas` (
  `id` int(6) unsigned NOT NULL AUTO_INCREMENT,
  `nama_fasilitas` varchar(50) NOT NULL,
  `deskripsi` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tblfasilitas`
--

LOCK TABLES `tblfasilitas` WRITE;
/*!40000 ALTER TABLE `tblfasilitas` DISABLE KEYS */;
INSERT INTO `tblfasilitas` VALUES
(1,'Bathtub','Bak mandi besar'),
(2,'Baby Bed','Ranjang tidur untuk bayi usia 0-2 tahun'),
(3,'Pemanas Air','Pemanas air dengan suhu yang dapat diatur'),
(4,'Pemanggang Roti','Alat pemanggang roti elektrik'),
(5,'TV Digital','Televisi'),
(6,'Treadmill','Alat olahraga treadmill'),
(7,'Radio','Radio FM'),
(8,'King-size Bed','Ranjang tidur besar ukuran \'king\''),
(9,'Queen Size Bed','Ranjang tidur menengah ukuran \'queen\''),
(10,'Single Bed','Ranjang tidur kecil'),
(11,'Double Bed','2 buah ranjang tidur kecil untuk 2 orang'),
(12,'Mini Bar','Bar kecil untuk minuman ringan');
/*!40000 ALTER TABLE `tblfasilitas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tblkamar`
--

DROP TABLE IF EXISTS `tblkamar`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tblkamar` (
  `id` int(6) unsigned NOT NULL AUTO_INCREMENT,
  `tipe_kamar` varchar(10) NOT NULL,
  `harga` double NOT NULL DEFAULT 0,
  `deskripsi` varchar(50) NOT NULL,
  `jumlah_kamar` double NOT NULL DEFAULT 0,
  `gambar` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tblkamar`
--

LOCK TABLES `tblkamar` WRITE;
/*!40000 ALTER TABLE `tblkamar` DISABLE KEYS */;
INSERT INTO `tblkamar` VALUES
(1,'Melati',150000,'Kamar kecil - Basic',12,NULL),
(2,'Anggrek',200000,'Kamar kecil - Mewah',4,NULL);
/*!40000 ALTER TABLE `tblkamar` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tblkamarfasilitas`
--

DROP TABLE IF EXISTS `tblkamarfasilitas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tblkamarfasilitas` (
  `id_kamar` int(6) unsigned NOT NULL,
  `id_fasilitas` int(6) unsigned NOT NULL,
  PRIMARY KEY (`id_kamar`,`id_fasilitas`),
  KEY `tblkamarfasilitas_id_fasilitas_foreign` (`id_fasilitas`),
  CONSTRAINT `tblkamarfasilitas_id_fasilitas_foreign` FOREIGN KEY (`id_fasilitas`) REFERENCES `tblfasilitas` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `tblkamarfasilitas_id_kamar_foreign` FOREIGN KEY (`id_kamar`) REFERENCES `tblkamar` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tblkamarfasilitas`
--

LOCK TABLES `tblkamarfasilitas` WRITE;
/*!40000 ALTER TABLE `tblkamarfasilitas` DISABLE KEYS */;
INSERT INTO `tblkamarfasilitas` VALUES
(1,5),
(1,7),
(1,10),
(2,1),
(2,5),
(2,6),
(2,10);
/*!40000 ALTER TABLE `tblkamarfasilitas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbltamu`
--

DROP TABLE IF EXISTS `tbltamu`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbltamu` (
  `id` int(6) unsigned NOT NULL AUTO_INCREMENT,
  `nama` varchar(10) NOT NULL,
  `email` varchar(30) NOT NULL,
  `no_telpon` varchar(13) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbltamu`
--

LOCK TABLES `tbltamu` WRITE;
/*!40000 ALTER TABLE `tbltamu` DISABLE KEYS */;
INSERT INTO `tbltamu` VALUES
(2,'Ebpan','ebpan@mail.com','081282819434'),
(3,'Alif','alif@mail.com','089521757581'),
(4,'Septian','septian@mail.com','083878451743'),
(5,'Firly','firly@mail.com','081383776768');
/*!40000 ALTER TABLE `tbltamu` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbluser`
--

DROP TABLE IF EXISTS `tbluser`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbluser` (
  `id` int(6) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(20) NOT NULL,
  `password` varchar(128) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `role` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbluser`
--

LOCK TABLES `tbluser` WRITE;
/*!40000 ALTER TABLE `tbluser` DISABLE KEYS */;
INSERT INTO `tbluser` VALUES
(5,'@pwe','$2y$10$UFIm0aaPCxX.nVIojXmgp.FJHgSK9LgslhDBAqX1XIR6pBUdcLZr.','Admin PWE',1),
(6,'seal','$2y$10$UTfXoPyRrwqhXtGWBVvTx.ydgG1uC9K4AbcCwy55gfrve8KqJ1P2K','Septian',0);
/*!40000 ALTER TABLE `tbluser` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2024-11-09  8:56:38
