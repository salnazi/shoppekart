-- MySQL dump 10.16  Distrib 10.1.16-MariaDB, for Win32 (AMD64)
--
-- Host: localhost    Database: a2zdb
-- ------------------------------------------------------
-- Server version	10.1.16-MariaDB

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
-- Table structure for table `compinfo`
--

DROP TABLE IF EXISTS `compinfo`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `compinfo` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `compname` varchar(13) NOT NULL,
  `compaddress` text NOT NULL,
  `compemail` varchar(255) NOT NULL,
  `compweb` varchar(255) NOT NULL,
  `comptel` varchar(255) NOT NULL,
  `comprand` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `compinfo`
--

LOCK TABLES `compinfo` WRITE;
/*!40000 ALTER TABLE `compinfo` DISABLE KEYS */;
INSERT INTO `compinfo` VALUES (1,'Shoppe Kart','25, Rajamaaniyam Street,\r\nKundrathur,\r\nChennai - 600 069.','info@shoppekart.com','','','192873981723');
/*!40000 ALTER TABLE `compinfo` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `expenses`
--

DROP TABLE IF EXISTS `expenses`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `expenses` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `date` varchar(255) NOT NULL,
  `details` varchar(255) NOT NULL,
  `amt` decimal(65,2) NOT NULL,
  `randid` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `expenses`
--

LOCK TABLES `expenses` WRITE;
/*!40000 ALTER TABLE `expenses` DISABLE KEYS */;
/*!40000 ALTER TABLE `expenses` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `grandsales`
--

DROP TABLE IF EXISTS `grandsales`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `grandsales` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `stItemCode` varchar(255) NOT NULL,
  `stQty` varchar(255) NOT NULL,
  `stAmt` decimal(65,16) NOT NULL,
  `stProfit` decimal(65,16) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `stItemCode` (`stItemCode`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `grandsales`
--

LOCK TABLES `grandsales` WRITE;
/*!40000 ALTER TABLE `grandsales` DISABLE KEYS */;
/*!40000 ALTER TABLE `grandsales` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `investment`
--

DROP TABLE IF EXISTS `investment`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `investment` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `date` varchar(255) NOT NULL,
  `details` varchar(255) NOT NULL,
  `amt` decimal(65,2) NOT NULL,
  `randid` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `investment`
--

LOCK TABLES `investment` WRITE;
/*!40000 ALTER TABLE `investment` DISABLE KEYS */;
/*!40000 ALTER TABLE `investment` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `invoice`
--

DROP TABLE IF EXISTS `invoice`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `invoice` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `billno` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `invoice`
--

LOCK TABLES `invoice` WRITE;
/*!40000 ALTER TABLE `invoice` DISABLE KEYS */;
INSERT INTO `invoice` VALUES (1,'0');
/*!40000 ALTER TABLE `invoice` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `loginaccess`
--

DROP TABLE IF EXISTS `loginaccess`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `loginaccess` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `snfirst` varchar(255) NOT NULL,
  `snlast` varchar(255) NOT NULL,
  `snuser` varchar(255) NOT NULL,
  `snpass` varchar(255) NOT NULL,
  `snaccess` varchar(255) NOT NULL,
  `sncompname` varchar(255) NOT NULL,
  `snrand` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `loginaccess`
--

LOCK TABLES `loginaccess` WRITE;
/*!40000 ALTER TABLE `loginaccess` DISABLE KEYS */;
INSERT INTO `loginaccess` VALUES (1,'Salim','Nazir','admin','iqbal','Administrator','JapanCo.Ltd.,','1230948'),(2,'MindTree','Technology','MT4593','admin','Employer','MindTree','20934842934'),(3,'Salim','Jaseena','admin123','admin123','Administrator123','Admin','3123123123');
/*!40000 ALTER TABLE `loginaccess` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `profitpaidout`
--

DROP TABLE IF EXISTS `profitpaidout`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `profitpaidout` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `date` varchar(255) NOT NULL,
  `details` varchar(255) NOT NULL,
  `amt` decimal(65,2) NOT NULL,
  `randid` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `profitpaidout`
--

LOCK TABLES `profitpaidout` WRITE;
/*!40000 ALTER TABLE `profitpaidout` DISABLE KEYS */;
/*!40000 ALTER TABLE `profitpaidout` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `purchase`
--

DROP TABLE IF EXISTS `purchase`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `purchase` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `date` varchar(255) NOT NULL,
  `invNo` varchar(255) NOT NULL,
  `purFrom` varchar(255) NOT NULL,
  `itemCode` varchar(255) NOT NULL,
  `itemDesc` text NOT NULL,
  `Qty` int(65) NOT NULL,
  `totPrice` decimal(65,16) NOT NULL,
  `cost` decimal(65,16) NOT NULL,
  `randid` varchar(255) NOT NULL,
  `rQty` varchar(255) NOT NULL,
  `rtotPrice` decimal(65,16) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `purchase`
--

LOCK TABLES `purchase` WRITE;
/*!40000 ALTER TABLE `purchase` DISABLE KEYS */;
/*!40000 ALTER TABLE `purchase` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `purchasedata`
--

DROP TABLE IF EXISTS `purchasedata`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `purchasedata` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `date` varchar(255) NOT NULL,
  `invNo` varchar(255) NOT NULL,
  `purFrom` varchar(255) NOT NULL,
  `itemCode` varchar(255) NOT NULL,
  `itemDesc` text NOT NULL,
  `Qty` int(65) NOT NULL,
  `totPrice` decimal(65,2) NOT NULL,
  `cost` decimal(65,16) NOT NULL,
  `randid` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `purchasedata`
--

LOCK TABLES `purchasedata` WRITE;
/*!40000 ALTER TABLE `purchasedata` DISABLE KEYS */;
/*!40000 ALTER TABLE `purchasedata` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `salaryinfo`
--

DROP TABLE IF EXISTS `salaryinfo`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `salaryinfo` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `premp` varchar(255) NOT NULL,
  `pruser` varchar(255) NOT NULL,
  `empname` varchar(255) NOT NULL,
  `empsid` varchar(255) NOT NULL,
  `empnetsal` varchar(255) NOT NULL,
  `empsal` varchar(255) NOT NULL,
  `empsa` varchar(255) NOT NULL,
  `empgp` varchar(255) NOT NULL,
  `empbsbc` varchar(255) NOT NULL,
  `empbhfc` varchar(255) NOT NULL,
  `emppen` varchar(255) NOT NULL,
  `empmed` varchar(255) NOT NULL,
  `emumemp` varchar(255) NOT NULL,
  `empssb` varchar(255) NOT NULL,
  `emphf` varchar(255) NOT NULL,
  `empti` varchar(255) NOT NULL,
  `emptd` varchar(255) NOT NULL,
  `empoth` varchar(255) NOT NULL,
  `empsifinal` varchar(255) NOT NULL,
  `prsalary` varchar(255) NOT NULL,
  `prrand` varchar(255) NOT NULL,
  `emprandid` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `salaryinfo`
--

LOCK TABLES `salaryinfo` WRITE;
/*!40000 ALTER TABLE `salaryinfo` DISABLE KEYS */;
INSERT INTO `salaryinfo` VALUES (1,'','salnazi','','','','','','','','','','','','','','','','','','40000','766565675\r\n','');
/*!40000 ALTER TABLE `salaryinfo` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sales`
--

DROP TABLE IF EXISTS `sales`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sales` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `date` varchar(255) NOT NULL,
  `invNo` varchar(255) NOT NULL,
  `soldTo` varchar(255) NOT NULL,
  `itemCode` varchar(255) NOT NULL,
  `itemDesc` text NOT NULL,
  `Qty` int(65) NOT NULL,
  `unitPrice` decimal(65,2) NOT NULL,
  `GsalesAmt` decimal(65,2) NOT NULL,
  `sProfit` decimal(65,16) NOT NULL,
  `randid` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `invNo` (`invNo`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sales`
--

LOCK TABLES `sales` WRITE;
/*!40000 ALTER TABLE `sales` DISABLE KEYS */;
/*!40000 ALTER TABLE `sales` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `salesreturn`
--

DROP TABLE IF EXISTS `salesreturn`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `salesreturn` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `date` varchar(255) NOT NULL,
  `invNo` varchar(255) NOT NULL,
  `returnFrom` varchar(255) NOT NULL,
  `itemCode` varchar(255) NOT NULL,
  `itemDesc` text NOT NULL,
  `Qty` int(65) NOT NULL,
  `totPrice` decimal(65,2) NOT NULL,
  `randid` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `salesreturn`
--

LOCK TABLES `salesreturn` WRITE;
/*!40000 ALTER TABLE `salesreturn` DISABLE KEYS */;
/*!40000 ALTER TABLE `salesreturn` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `stock`
--

DROP TABLE IF EXISTS `stock`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `stock` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `date` varchar(255) NOT NULL,
  `invNo` varchar(255) NOT NULL,
  `purFrom` varchar(255) NOT NULL,
  `itemCode` varchar(255) NOT NULL,
  `itemDesc` text NOT NULL,
  `Qty` int(65) NOT NULL,
  `totPrice` decimal(65,2) NOT NULL,
  `cost` decimal(65,16) NOT NULL,
  `randid` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `stock`
--

LOCK TABLES `stock` WRITE;
/*!40000 ALTER TABLE `stock` DISABLE KEYS */;
/*!40000 ALTER TABLE `stock` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2016-12-02 11:19:27
