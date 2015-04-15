-- MySQL dump 10.13  Distrib 5.1.73, for debian-linux-gnu (x86_64)
--
-- Host: 10.10.27.6    Database: angio
-- ------------------------------------------------------
-- Server version	5.1.73-14.12-log

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
-- Table structure for table `categories`
--

DROP TABLE IF EXISTS `categories`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `categories` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(256) NOT NULL,
  `info` text NOT NULL,
  `image` varchar(256) NOT NULL,
  `parent` tinyint(1) NOT NULL,
  `order` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `categories`
--

LOCK TABLES `categories` WRITE;
/*!40000 ALTER TABLE `categories` DISABLE KEYS */;
INSERT INTO `categories` VALUES (4,'Skeleton Appendiculare','','',0,4),(3,'Skeleton Axiale','','',0,0),(5,'Columna vertebralis','','',0,1),(6,'Thorax','','',0,2),(7,'Cranium','','',0,3),(8,'Ossa Membri Superioris','','',0,5),(9,'Ossa Membri Inferioris','','',0,6);
/*!40000 ALTER TABLE `categories` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ci_sessions`
--

DROP TABLE IF EXISTS `ci_sessions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ci_sessions` (
  `session_id` varchar(40) NOT NULL DEFAULT '0',
  `ip_address` varchar(45) NOT NULL DEFAULT '0',
  `user_agent` varchar(120) NOT NULL,
  `last_activity` int(10) unsigned NOT NULL DEFAULT '0',
  `user_data` text NOT NULL,
  PRIMARY KEY (`session_id`),
  KEY `last_activity_idx` (`last_activity`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ci_sessions`
--

LOCK TABLES `ci_sessions` WRITE;
/*!40000 ALTER TABLE `ci_sessions` DISABLE KEYS */;
/*!40000 ALTER TABLE `ci_sessions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `content_files`
--

DROP TABLE IF EXISTS `content_files`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `content_files` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `filename` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=768 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `content_files`
--

LOCK TABLES `content_files` WRITE;
/*!40000 ALTER TABLE `content_files` DISABLE KEYS */;
INSERT INTO `content_files` VALUES (663,'1_alveolaris inferior.js'),(664,'1_angularis.js'),(665,'1_auricularis post.js'),(666,'1_buccalis.js'),(667,'1_carotis comumunis.js'),(668,'1_carotis externa.js'),(669,'1_carotis interna.js'),(670,'1_dorsalis linguae.js'),(671,'1_facialis.js'),(672,'1_labialis inferior.js'),(673,'1_labialis superior.js'),(674,'1_laryngea sup.js'),(675,'1_lingualis.js'),(676,'1_maxillaris.js'),(677,'1_occipitalis.js'),(678,'1_palatina ascendens.js'),(679,'1_pharyngea ascendens.js'),(680,'1_profunda linguae.js'),(681,'1_ramus crickothyroideus.js'),(682,'1_ramus glandularis.js'),(683,'1_ramus sternocleidomastoideus (occ).js'),(684,'1_skeletonhlava.js'),(685,'1_sublingualis.js'),(686,'1_submentalis.js'),(687,'1_temporalis prof. ant.js'),(688,'1_temporalis prof. post.js'),(689,'1_temporalis superficialis.js'),(690,'1_thyroidea superior.js'),(691,'1_vertebralis.js'),(692,'1_vsetky cievy.js'),(693,'2_aorta.js'),(694,'2_carotis communis.js'),(695,'2_cervicalis ascendens.js'),(696,'2_cervicalis profunda.js'),(697,'2_cervicalis superficialis.js'),(698,'2_circumflexa scapulae sin.js'),(699,'2_intercostales int dx.js'),(700,'2_intercostales sin.js'),(701,'2_kostratrup.js'),(702,'2_mesentercia superior.js'),(703,'2_mesenterica inferior.js'),(704,'2_pars acromialis subscapularis sin.js'),(705,'2_pars acromialis suprascapularis dx.js'),(706,'2_pars acromialis thoracoacromialis dx.js'),(707,'2_rami pectorales dx.js'),(708,'2_rami pectorales sin.js'),(709,'2_ramus acromialis (thoracoacromiali).js'),(710,'2_ramus deltoideus thoracoacromialis.js'),(711,'2_ramus deltoideus.js'),(712,'2_ramus profundus transverse colli dx.js'),(713,'2_renales.js'),(714,'2_subclavia dx.js'),(715,'2_subclavia sin.js'),(716,'2_subscapularis dx.js'),(717,'2_subscapularis sin.js'),(718,'2_suprascapularis dx.js'),(719,'2_suprascapularis sin.js'),(720,'2_thoracica int dx.js'),(721,'2_thoracica int.js'),(722,'2_thoracica lat dx.js'),(723,'2_thoracica lat sin.js'),(724,'2_thoracica superior dx.js'),(725,'2_thoracica superior sin.js'),(726,'2_thoracoacromialis dx.js'),(727,'2_thoracoacromialis sin.js'),(728,'2_thoracodorsalis dx.js'),(729,'2_thoracodorsalis sin.js'),(730,'2_thyroidea inferior.js'),(731,'2_transversa colli ramus profundus sin.js'),(732,'2_truncus brachiocephalicus.js'),(733,'2_truncus coeliacus.js'),(734,'2_truncus thyreocervicalis.js'),(735,'2_trup cievyspolu.js'),(736,'2_vertebralis.js'),(737,'3_circumflexa ilium profunda.js'),(738,'3_glutea inferior.js'),(739,'3_glutea superior.js'),(740,'3_iliaca communis.js'),(741,'3_iliaca externa.js'),(742,'3_iliaca interna.js'),(743,'3_kostpanva.js'),(744,'3_obturatoria.js'),(745,'3_pudenda interior.js'),(746,'3_rectalis inferior.js'),(747,'3_sacrales laterales.js'),(748,'3_sacralis mediana.js'),(749,'3_umbilicalis.js'),(750,'3_vesicalis inferior.js'),(751,'3_vesicalis superior.js'),(752,'3_vsetky cievy spolu.js'),(753,'cievy-hlava.js'),(754,'cievy-lava-noha.js'),(755,'cievy-panva.js'),(756,'cievy-prava-noha.js'),(757,'cievy-trup.js'),(758,'data'),(759,'kostra lava ruka.js'),(760,'kostra trup.js'),(761,'kostra-hlava.js'),(762,'kostra-lava-noha.js'),(763,'kostra-panva.js'),(764,'kostra-prava-noha.js'),(765,'kostra-prava-ruka.js'),(766,'kostra-trup.js'),(767,'old');
/*!40000 ALTER TABLE `content_files` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `migrations` (
  `version` int(3) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES (6);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `password` varchar(128) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'pixelshade','9158685909b77a22ca61d4c806a962907ebdec647ed6dd6b73f063fb3b8b1517fce5597f73132f0b443dd73cff51634f91ab3a8388fa21ecba3a3496585552f6'),(2,'Bejsla','5fc4b7f0e79799b5ae906e5f41dfeb40d8697b8b0cad1c0abd269e11c92afe4143bd02367ca11a44a6e3c46b65f7d49ae195ce279c8e82f2bd2f5d6e13206b65'),(3,'Havran','89bb70b5abe4ce2db1f7a05e368e95fe0f0af08568d5c2eafbab5dc7ddd34314b0861fd53810281e462a6b6a72478cca103a1e5100275aa3c50ce38dd0fbbe98');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `vein_parts`
--

DROP TABLE IF EXISTS `vein_parts`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `vein_parts` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `vein_id` int(11) unsigned NOT NULL,
  `name` varchar(100) NOT NULL,
  `is_tag` int(2) unsigned NOT NULL,
  `model` varchar(256) NOT NULL,
  `color` varchar(20) NOT NULL,
  `image` varchar(256) NOT NULL,
  `info` text NOT NULL,
  `scale_x` varchar(20) NOT NULL,
  `scale_y` varchar(20) NOT NULL,
  `scale_z` varchar(20) NOT NULL,
  `rotation_x` varchar(20) NOT NULL,
  `rotation_y` varchar(20) NOT NULL,
  `rotation_z` varchar(20) NOT NULL,
  `position_x` varchar(20) NOT NULL,
  `position_y` varchar(20) NOT NULL,
  `position_z` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=983 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `vein_parts`
--

LOCK TABLES `vein_parts` WRITE;
/*!40000 ALTER TABLE `vein_parts` DISABLE KEYS */;
INSERT INTO `vein_parts` VALUES (876,73,'hlava cievy',1,'cievy-hlava.js','0xff6eb2','','<p>cievyhlavyakrku</p>','1','1','1','0','0','0','0','-110.0','0'),(870,73,'hlava',0,'cievy-hlava.js','0xff0000','','','1','1','1','0','0','0','0','-110.0','0'),(871,73,'Lava ruka',0,'kostra lava ruka.js','','','','1','1','1','0','0','0','0','-110.0','0'),(872,73,'Prava ruka',0,'kostra-prava-ruka.js','','','','1','1','1','0','0','0','0','-110.0','0'),(873,73,'Panva',0,'kostra-panva.js','','','','1','1','1','0','0','0','0','-110.0','0'),(874,73,'Prava noha',0,'kostra-prava-noha.js','','','','1','1','1','0','0','0','0','-110.0','0'),(875,73,'Lava noha',0,'kostra-lava-noha.js','','','','1','1','1','0','0','0','0','-110.0','0'),(877,73,'cievy lava noha',0,'cievy-lava-noha.js','0xff0000','','','1','1','1','0','0','0','0','-110.0','0'),(878,73,'Cievy trupu',0,'cievy-trup.js','0xff0000','','','1','1','1','0','0','0','0','-110.0','0'),(898,76,'Arteria circumflexa scapulae',1,'2_circumflexa scapulae sin.js','0xff0000','data','','1','1','1','0','0','0','0','0','0'),(885,73,'Trup',0,'kostra-trup.js','','','','1','1','1','0','0','0','0','-110.0','0'),(897,76,'Arteria cervicalis superficialis',1,'2_cervicalis superficialis.js','0xff0000','data','','1','1','1','0','0','0','0','0','0'),(892,76,'Cievy trupu',0,'2_trup cievyspolu.js','0xff0000','data','','1','1','1','0','0','0','0','0','0'),(893,76,'Aorta',0,'2_aorta.js','0xff0000','data','','1','1','1','0','0','0','0','0','0'),(894,76,'Arteria carotis communis',1,'2_carotis communis.js','0xff0000','data','','1','1','1','0','0','0','0','0','0'),(895,76,'Arteria cervicalis ascendens',1,'2_cervicalis ascendens.js','0xff0000','data','','1','1','1','0','0','0','0','0','0'),(896,76,'Arteria cervicalis profunda',1,'2_cervicalis profunda.js','0xff0000','data','','1','1','1','0','0','0','0','0','0'),(982,73,'Cievy panvy',0,'cievy-panva.js','0xff0000','','','1','1','1','0','0','0','0','-110.0','0'),(981,73,'Cievy trupu',1,'cievy-trup.js','0xff6eb3','','<p>cievyhrudnika</p>','1','1','1','0','0','0','0','-110.0','0'),(979,78,'Arteria vertebralis',1,'1_vertebralis.js','0xff0000','data','','1','1','1','0','0','0','0','0','0'),(977,78,'Arteria temporalis profunda posterior',1,'1_temporalis prof. post.js','0xff0000','data','','1','1','1','0','0','0','0','0','0'),(974,78,'Arteria sublingualis',1,'1_sublingualis.js','0xff0000','data','','1','1','1','0','0','0','0','0','0'),(973,78,'Ramus sternocleidomastoideus',1,'1_ramus sternocleidomastoideus (occ).js','0xff0000','data','','1','1','1','0','0','0','0','0','0'),(971,78,'Ramus cricothyroideus',1,'1_ramus crickothyroideus.js','0xff0000','data','','1','1','1','0','0','0','0','0','0'),(969,78,'Arteria pharyngea ascendens',1,'1_pharyngea ascendens.js','0xff0000','data','','1','1','1','0','0','0','0','0','0'),(966,78,'Arteria maxillaris',1,'1_maxillaris.js','0xff0000','data','','1','1','1','0','0','0','0','0','0'),(963,78,'Arteria laryngea superior',1,'1_laryngea sup.js','0xff0000','data','','1','1','1','0','0','0','0','0','0'),(960,78,'Arteria facialis',1,'1_facialis.js','0xff0000','data','','1','1','1','0','0','0','0','0','0'),(958,78,'Arteria carotis interna',1,'1_carotis interna.js','0xff0000','data','','1','1','1','0','0','0','0','0','0'),(956,78,'Arteria carotis communis',1,'1_carotis comumunis.js','0xff0000','data','','1','1','1','0','0','0','0','0','0'),(952,78,'Arteria alveolaris inferior',1,'1_alveolaris inferior.js','0xff0000','data','','1','1','1','0','0','0','0','0','0'),(951,78,'vsetky cievy',0,'1_vsetky cievy.js','0xff0000','data','','1','1','1','0','0','0','0','0','0'),(950,77,'Arteriae vesicales superiores',1,'3_vesicalis superior.js','0xff0000','data','','1','1','1','0','0','0','0','0','0'),(948,77,'Arteria umbilicalis',1,'3_umbilicalis.js','0xff0000','data','','1','1','1','0','0','0','0','0','0'),(945,77,'Arteria rectalis inferior',1,'3_rectalis inferior.js','0xff0000','data','','1','1','1','0','0','0','0','0','0'),(941,77,'Arteria iliaca externa',1,'3_iliaca externa.js','0xff0000','data','','1','1','1','0','0','0','0','0','0'),(939,77,'Arteria glutea superior',1,'3_glutea superior.js','0xff0000','data','','1','1','1','0','0','0','0','0','0'),(938,77,'Arteria glutea inferior',1,'3_glutea inferior.js','0xff0000','data','','1','1','1','0','0','0','0','0','0'),(936,77,'Arteria circumflexa profunda',1,'3_circumflexa ilium profunda.js','0xff0000','data','','1','1','1','0','0','0','0','0','0'),(933,76,'Truncus coeliacus',1,'2_truncus coeliacus.js','0xff0000','data','','1','1','1','0','0','0','0','0','0'),(930,76,'Arteriae thyroideae inferiores',1,'2_thyroidea inferior.js','0xff0000','data','','1','1','1','0','0','0','0','0','0'),(928,76,'Arteria thoracodorsalis dx',1,'2_thoracodorsalis dx.js','0xff0000','data','','1','1','1','0','0','0','0','0','0'),(926,76,'Arteria thoracoacromialis dx',1,'2_thoracoacromialis dx.js','0xff0000','data','','1','1','1','0','0','0','0','0','0'),(924,76,'Arteria thoracica superior dx',1,'2_thoracica superior dx.js','0xff0000','data','','1','1','1','0','0','0','0','0','0'),(922,76,'Arteria thoracica lateralis dx',1,'2_thoracica lat dx.js','0xff0000','data','','1','1','1','0','0','0','0','0','0'),(920,76,'Arteria thoracica interna dx',1,'2_thoracica int dx.js','0xff0000','data','','1','1','1','0','0','0','0','0','0'),(918,76,'Arteria suprascapularis sin',1,'2_suprascapularis sin.js','0xff0000','data','','1','1','1','0','0','0','0','0','0'),(916,76,'Arteria subscapularis sin',1,'2_subscapularis sin.js','0xff0000','data','','1','1','1','0','0','0','0','0','0'),(915,76,'Arteria subscapularis dx',1,'2_subscapularis dx.js','0xff0000','data','','1','1','1','0','0','0','0','0','0'),(907,76,'Rami pectorales sin',1,'2_rami pectorales sin.js','0xff0000','data','','1','1','1','0','0','0','0','0','0'),(904,76,'Pars acromialis arteriae subscapularis dx',1,'2_pars acromialis suprascapularis dx.js','0xff0000','data','','1','1','1','0','0','0','0','0','0'),(903,76,'Pars acromialis arteriae subscapularis sin',1,'2_pars acromialis subscapularis sin.js','0xff0000','data','','1','1','1','0','0','0','0','0','0'),(899,76,'Arteriae intercostales dx',1,'2_intercostales int dx.js','0xff0000','data','','1','1','1','0','0','0','0','0','0'),(900,76,'Arteriae intercostales sin',1,'2_intercostales sin.js','0xff0000','data','','1','1','1','0','0','0','0','0','0'),(901,76,'Arteria mesenterica superior',1,'2_mesentercia superior.js','0xff0000','data','','1','1','1','0','0','0','0','0','0'),(980,78,'Arteria thyroidea superior',1,'1_thyroidea superior.js','0xff0000','data','','1','1','1','0','0','0','0','0','0'),(978,78,'Arteria temporalis superficialis',1,'1_temporalis superficialis.js','0xff0000','data','','1','1','1','0','0','0','0','0','0'),(976,78,'Arteria temporalis profunda anterior',1,'1_temporalis prof. ant.js','0xff0000','data','','1','1','1','0','0','0','0','0','0'),(975,78,'Arteria submentalis',1,'1_submentalis.js','0xff0000','data','','1','1','1','0','0','0','0','0','0'),(972,78,'Ramus glandularis',1,'1_ramus glandularis.js','0xff0000','data','','1','1','1','0','0','0','0','0','0'),(970,78,'Arteria profunda linguae',1,'1_profunda linguae.js','0xff0000','data','','1','1','1','0','0','0','0','0','0'),(968,78,'Arteria palatina ascendens',1,'1_palatina ascendens.js','0xff0000','data','','1','1','1','0','0','0','0','0','0'),(967,78,'Arteria occipitalis',1,'1_occipitalis.js','0xff0000','data','','1','1','1','0','0','0','0','0','0'),(965,78,'Arteria lingualis',1,'1_lingualis.js','0xff0000','data','','1','1','1','0','0','0','0','0','0'),(964,78,'Arteria lingualis',1,'1_lingualis.js','0xff0000','data','','1','1','1','0','0','0','0','0','0'),(962,78,'Arteria labialis superior',1,'1_labialis superior.js','0xff0000','data','','1','1','1','0','0','0','0','0','0'),(961,78,'Arteria labialis inferior',1,'1_labialis inferior.js','0xff0000','data','','1','1','1','0','0','0','0','0','0'),(959,78,'Arteria dorsalis linguae',1,'1_dorsalis linguae.js','0xff0000','data','','1','1','1','0','0','0','0','0','0'),(957,78,'Arteria carotis externa',1,'1_carotis externa.js','0xff0000','data','','1','1','1','0','0','0','0','0','0'),(955,78,'Arteria buccalis',1,'1_buccalis.js','0xff0000','data','','1','1','1','0','0','0','0','0','0'),(954,78,'Arteria auricularis posterior',1,'1_auricularis post.js','0xff0000','data','','1','1','1','0','0','0','0','0','0'),(953,78,'Arteria angularis',1,'1_angularis.js','0xff0000','data','','1','1','1','0','0','0','0','0','0'),(949,77,'Arteriae vesicales inferiores',1,'3_vesicalis inferior.js','0xff0000','data','','1','1','1','0','0','0','0','0','0'),(947,77,'Arteria sacralis mediana',1,'3_sacralis mediana.js','0xff0000','data','','1','1','1','0','0','0','0','0','0'),(946,77,'Arteriae sacrales laterles',1,'3_sacrales laterales.js','0xff0000','data','','1','1','1','0','0','0','0','0','0'),(944,77,'Arteria pudenda interior',1,'3_pudenda interior.js','0xff0000','data','','1','1','1','0','0','0','0','0','0'),(943,77,'Arteria obturatoria',1,'3_obturatoria.js','0xff0000','data','','1','1','1','0','0','0','0','0','0'),(942,77,'Arteria iliaca interna',1,'3_iliaca interna.js','0xff0000','data','','1','1','1','0','0','0','0','0','0'),(940,77,'Arteria iliaca communis',1,'3_iliaca communis.js','0xff0000','data','','1','1','1','0','0','0','0','0','0'),(937,77,'Cievy panvy spolu',0,'3_vsetky cievy spolu.js','0xff0000','data','','1','1','1','0','0','0','0','0','0'),(935,76,'Arteriae vertebrales',1,'2_vertebralis.js','0xff0000','data','','1','1','1','0','0','0','0','0','0'),(934,76,'Trunci thyreocervicales',1,'2_truncus thyreocervicalis.js','0xff0000','data','','1','1','1','0','0','0','0','0','0'),(932,76,'Truncus brachiocephalicus',1,'2_truncus brachiocephalicus.js','0xff0000','data','','1','1','1','0','0','0','0','0','0'),(931,76,'Ramus profundus arteriae transverse colli sin',1,'2_transversa colli ramus profundus sin.js','0xff0000','data','','1','1','1','0','0','0','0','0','0'),(929,76,'Arteria thoracodorsalis sin',1,'2_thoracodorsalis sin.js','0xff0000','data','','1','1','1','0','0','0','0','0','0'),(927,76,'Arteria thoracoacromialis sin',1,'2_thoracoacromialis sin.js','0xff0000','data','','1','1','1','0','0','0','0','0','0'),(925,76,'Arteria thoracica superior sin',1,'2_thoracica superior sin.js','0xff0000','data','','1','1','1','0','0','0','0','0','0'),(923,76,'Arteria thoracica lateralis sin',1,'2_thoracica lat sin.js','0xff0000','data','','1','1','1','0','0','0','0','0','0'),(921,76,'Arteria thoracica interna sin',1,'2_thoracica int.js','0xff0000','data','','1','1','1','0','0','0','0','0','0'),(919,76,'Arteria thoracica interna dx',1,'2_thoracica int dx.js','0xff0000','data','','1','1','1','0','0','0','0','0','0'),(917,76,'Arteria suprascapularis dx',1,'2_suprascapularis dx.js','0xff0000','data','','1','1','1','0','0','0','0','0','0'),(914,76,'Arteria subclavia sin',1,'2_subclavia sin.js','0xff0000','data','','1','1','1','0','0','0','0','0','0'),(913,76,'Arteria subclavia dx',1,'2_subclavia dx.js','0xff0000','data','','1','1','1','0','0','0','0','0','0'),(912,76,'Arteriae renales',1,'2_renales.js','0xff0000','data','','1','1','1','0','0','0','0','0','0'),(911,76,'Ramus profundus arteriae transverse colli dx',1,'2_ramus profundus transverse colli dx.js','0xff0000','data','','1','1','1','0','0','0','0','0','0'),(910,76,'Ramus deltoideus arteriae thoracoacromialis sin',1,'2_ramus deltoideus.js','0xff0000','data','','1','1','1','0','0','0','0','0','0'),(909,76,'Ramus deltoideus arteriae thoracoacromialis dx',1,'2_ramus deltoideus thoracoacromialis.js','0xff0000','data','','1','1','1','0','0','0','0','0','0'),(908,76,'Pars acromialis arteriae thoracoacromialis sin',1,'2_ramus acromialis (thoracoacromiali).js','0xff0000','data','','1','1','1','0','0','0','0','0','0'),(906,76,'Rami pectorales dx',1,'2_rami pectorales dx.js','0xff0000','data','','1','1','1','0','0','0','0','0','0'),(905,76,'Pars acromialis arteriae thoracoacromialis dx',1,'2_pars acromialis thoracoacromialis dx.js','0xff0000','data','','1','1','1','0','0','0','0','0','0'),(902,76,'Arteria mesenterica inferior',1,'2_mesenterica inferior.js','0xff0000','data','','1','1','1','0','0','0','0','0','0'),(891,73,'Cievy panva',1,'cievy-panva.js','0xff6eb2','','<p>cievypanvy</p>','1','1','1','0','0','0','0','-110.0','0'),(890,73,'Prava noha cievy',0,'cievy-prava-noha.js','0xff0000','','','1','1','1','0','0','0','0','-110.0','0');
/*!40000 ALTER TABLE `vein_parts` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `veins`
--

DROP TABLE IF EXISTS `veins`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `veins` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `category_id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `image` varchar(256) NOT NULL,
  `slug` varchar(128) NOT NULL,
  `model` varchar(256) NOT NULL,
  `info` text NOT NULL,
  `scale_x` varchar(20) NOT NULL,
  `scale_y` varchar(20) NOT NULL,
  `scale_z` varchar(20) NOT NULL,
  `rotation_x` varchar(20) NOT NULL,
  `rotation_y` varchar(20) NOT NULL,
  `rotation_z` varchar(20) NOT NULL,
  `position_x` varchar(20) NOT NULL,
  `position_y` varchar(20) NOT NULL,
  `position_z` varchar(20) NOT NULL,
  `published` int(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=79 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `veins`
--

LOCK TABLES `veins` WRITE;
/*!40000 ALTER TABLE `veins` DISABLE KEYS */;
INSERT INTO `veins` VALUES (73,6,'Skeleton','data','main','kostra-hlava.js','','1','1','1','0','0','0','0','-110.0','0',1),(76,5,'Cievy hrudníka a brucha','data','cievyhrudnika','2_kostratrup.js','','1','1','1','0','0','0','0','0','0',1),(77,3,'Cievy panvy','data','cievypanvy','3_kostpanva.js','','1','1','1','0','0','0','0','0','0',1),(78,7,'Cievy hlavy a krku','data','cievyhlavyakrku','1_skeletonhlava.js','','1','1','1','0','0','0','0','0','0',1);
/*!40000 ALTER TABLE `veins` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping routines for database 'angio'
--
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2015-04-15 21:25:16
