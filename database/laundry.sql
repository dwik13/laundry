-- MySQL dump 10.13  Distrib 5.7.17, for Win64 (x86_64)
--
-- Host: 127.0.0.1    Database: laundry
-- ------------------------------------------------------
-- Server version	5.5.5-10.4.24-MariaDB

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
-- Table structure for table `about`
--

DROP TABLE IF EXISTS `about`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `about` (
  `id_about` int(11) NOT NULL AUTO_INCREMENT,
  `judul_about` varchar(50) NOT NULL,
  `deskripsi_about` text NOT NULL,
  `gambar_about` varchar(100) NOT NULL,
  PRIMARY KEY (`id_about`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `about`
--

LOCK TABLES `about` WRITE;
/*!40000 ALTER TABLE `about` DISABLE KEYS */;
INSERT INTO `about` VALUES (3,'About: D-Laundry','D-Laundry adalah aplikasi khusus untuk mengelola bisnis laundry, mempermudah operasional, proteksi bisnis, mengantisipasi dari kemungkinan masalah masalah yg kerap muncul dalam mengelola bisnis laundry. mengacu pada pencucian pakaian dan tekstil lainnya, dan, lebih luas lagi, pengeringan dan penyetrikaannya juga. D-Laundry juga sebagai tempat untuk memberikan layanan pencucian linen hotel, uniform karyawan maupun pakaian tamu yang kotor.','LaundryMobile.jpg');
/*!40000 ALTER TABLE `about` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `konsumen`
--

DROP TABLE IF EXISTS `konsumen`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `konsumen` (
  `kode_konsumen` varchar(12) NOT NULL,
  `nama_konsumen` varchar(50) NOT NULL,
  `alamat_konsumen` text NOT NULL,
  `no_telp` varchar(15) NOT NULL,
  PRIMARY KEY (`kode_konsumen`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `konsumen`
--

LOCK TABLES `konsumen` WRITE;
/*!40000 ALTER TABLE `konsumen` DISABLE KEYS */;
INSERT INTO `konsumen` VALUES ('K001','dwikhusnul  ','jember','082333050921'),('K002','yahya ','jember','08345699099'),('K003','ririn','jember','082333129909'),('K004','bu setyo','umbulsari','083456990990');
/*!40000 ALTER TABLE `konsumen` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `paket`
--

DROP TABLE IF EXISTS `paket`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `paket` (
  `kode_paket` varchar(20) NOT NULL,
  `nama_paket` varchar(128) NOT NULL,
  `harga_paket` varchar(20) NOT NULL,
  PRIMARY KEY (`kode_paket`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `paket`
--

LOCK TABLES `paket` WRITE;
/*!40000 ALTER TABLE `paket` DISABLE KEYS */;
INSERT INTO `paket` VALUES ('P001','Paket Reguler: cuci setrika','8000'),('P002','Paket Reguler: cuci kering','7000'),('P003','Paket Reguler: strika','6000'),('P004','Paket Satuan: Selimut Tebal','16000'),('P005','Paket Satuan: Selimut Tipis','13000'),('P006','Paket Satuan: Boneka Besar','17000'),('P007','Paket Satuan: Boneka Sedang','15000'),('P008','Paket Satuan: Jaket','6000');
/*!40000 ALTER TABLE `paket` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `slider`
--

DROP TABLE IF EXISTS `slider`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `slider` (
  `id_slider` int(11) NOT NULL AUTO_INCREMENT,
  `judul_slider` varchar(128) NOT NULL,
  `deskripsi_slider` text NOT NULL,
  `status_slider` varchar(30) NOT NULL,
  `gambar_slider` varchar(100) NOT NULL,
  PRIMARY KEY (`id_slider`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `slider`
--

LOCK TABLES `slider` WRITE;
/*!40000 ALTER TABLE `slider` DISABLE KEYS */;
INSERT INTO `slider` VALUES (8,'D-LAUNDRY','Aplikasi Pengelolaan Laundry.\r\nSolusi dari Pakaian Kotor ','Aktif','Eco_laundry_Room_NorthMelbourne.jpg'),(10,'KUALITAS LAYANAN TEKNIK TERDEPAN','Dapatkan layanan yang cepat dan profesional saat proses instalasi, perawatan, dan penggantian suku cadang asli, dimana pun dan kapan pun','Aktif','LaundrySmartPhonePayment.jpg'),(11,'Detergent','Dilengkapi dengan berbagai macam chemical pembersih atau detergen sesuai jenis noda dan jenis bahan pakaian anda. Dukungan staff yang terlatih untuk menangani setiap permasalahan pada pakaian anda.\r\n\r\n','Aktif','Types_of_Detergents_based_on_physical_state.jpg'),(12,'Pakaian Anda','Kami mengedepankan konsep ramah lingkungan dan keamanan kesehatan anda, Oleh karena hal tersebut kami menggunakan teknologi wet clean. Dengan metode ini, pakaian lebih terlihat bersih, aman untuk kesehatan dan resiko pudar akibat bahan kimia keras dapat diminimalisir.','Aktif','menghilangkan-noda-cipratan-hujan-di-baju-vuV3L1lFun_1.png');
/*!40000 ALTER TABLE `slider` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `transaksi`
--

DROP TABLE IF EXISTS `transaksi`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `transaksi` (
  `kode_transaksi` varchar(20) NOT NULL,
  `kode_konsumen` varchar(12) NOT NULL,
  `kode_paket` varchar(20) NOT NULL,
  `tgl_masuk` datetime NOT NULL,
  `tgl_ambil` datetime NOT NULL,
  `berat` int(10) NOT NULL,
  `grand_total` int(12) NOT NULL,
  `bayar` varchar(20) NOT NULL,
  `status` varchar(20) NOT NULL,
  PRIMARY KEY (`kode_transaksi`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `transaksi`
--

LOCK TABLES `transaksi` WRITE;
/*!40000 ALTER TABLE `transaksi` DISABLE KEYS */;
INSERT INTO `transaksi` VALUES ('TR20221102001','K002','P001','2022-11-02 08:48:48','2022-11-05 05:25:21',5,40000,'Lunas','Selesai'),('TR20221102002','K003','P002','2022-11-02 08:50:37','2022-11-05 00:00:00',3,15000,'Lunas','Selesai'),('TR20221105003','K001','P001','2022-11-05 07:13:24','2022-11-05 01:15:32',5,40000,'Lunas','Selesai'),('TR20221105004','K003','P001','2022-11-07 08:41:57','2022-11-19 04:01:15',4,10000,'Lunas','Selesai'),('TR20221113005','K001','P002','2022-11-13 07:31:22','2022-11-23 02:17:50',10,50000,'Lunas','Selesai'),('TR20221202006','K001','P002','2022-12-02 00:00:00','2022-12-02 04:16:29',6,42000,'Lunas','Selesai'),('TR20221211007','K002','P003','2022-12-11 00:00:00','2022-12-13 00:00:00',4,24000,'Belum Lunas','Proses');
/*!40000 ALTER TABLE `transaksi` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(128) NOT NULL,
  `password` varchar(225) NOT NULL,
  `image` varchar(255) NOT NULL,
  `is_active` int(1) NOT NULL,
  `date_created` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user`
--

LOCK TABLES `user` WRITE;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` VALUES (1,'dwikhusnul','$2y$10$AS1k0l9eiQt6JuAeezFgWe9XMa2febzB50OK4M8HZ5zTNsU1wqsRK','default.png',1,1665975157),(2,'yahya','$2y$10$071A796Av8AfaUmrSCtbNOWARntjw64d1.Sr7zM3j4pTRyHuH7TgO','default.png',1,1667793234),(3,'admin','$2y$10$zHxUJxcpGLVsihEGapQBtOzYcqqleCsa8b8S9vYuERRYWPDrqUvcq','default.png',1,1668398443);
/*!40000 ALTER TABLE `user` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping events for database 'laundry'
--

--
-- Dumping routines for database 'laundry'
--
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2022-12-12  9:25:54
