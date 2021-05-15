-- --------------------------------------------------------
-- Servidor:                     127.0.0.1
-- Versão do servidor:           5.7.31 - MySQL Community Server (GPL)
-- OS do Servidor:               Win64
-- HeidiSQL Versão:              11.1.0.6116
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Copiando estrutura do banco de dados para ci4
DROP DATABASE IF EXISTS `ci4`;
CREATE DATABASE IF NOT EXISTS `ci4` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `ci4`;

-- Copiando estrutura para tabela ci4.administrators
DROP TABLE IF EXISTS `administrators`;
CREATE TABLE IF NOT EXISTS `administrators` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` char(60) NOT NULL,
  `email` char(150) NOT NULL,
  `whatsappNumber` char(20) DEFAULT NULL,
  `mobileNumber` char(20) DEFAULT NULL,
  `profile` char(60) DEFAULT NULL,
  `password` char(250) NOT NULL,
  `dtUpdate` datetime DEFAULT NULL,
  `display` enum('Y','N') DEFAULT 'Y',
  `active` enum('Y','N') DEFAULT 'Y',
  `dtRegister` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `active` (`active`),
  KEY `email` (`email`),
  KEY `password` (`password`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8;

-- Exportação de dados foi desmarcado.

-- Copiando estrutura para tabela ci4.banner
DROP TABLE IF EXISTS `banner`;
CREATE TABLE IF NOT EXISTS `banner` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `title` char(100) NOT NULL,
  `link` char(250) DEFAULT NULL,
  `image_full` char(250) DEFAULT NULL,
  `image_mobile` char(250) DEFAULT NULL,
  `type` enum('V','I') DEFAULT 'I',
  `section` char(25) DEFAULT NULL,
  `dtStart` date DEFAULT NULL,
  `dtEnd` date DEFAULT NULL,
  `order` int(11) DEFAULT NULL,
  `plataform` char(45) DEFAULT NULL,
  `dtLastUpdate` datetime DEFAULT NULL,
  `dtRegister` timestamp NULL DEFAULT NULL,
  `active` enum('Y','N') DEFAULT 'Y',
  PRIMARY KEY (`id`),
  KEY `dtStart_dtEnd` (`dtStart`,`dtEnd`),
  KEY `active` (`active`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;

-- Exportação de dados foi desmarcado.

-- Copiando estrutura para tabela ci4.brand
DROP TABLE IF EXISTS `brand`;
CREATE TABLE IF NOT EXISTS `brand` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `idCategoryFk` int(11) unsigned NOT NULL DEFAULT '0',
  `name` char(80) NOT NULL,
  `rewrite` char(100) NOT NULL,
  `imageCover` varchar(400) NOT NULL,
  `dtPublication` date NOT NULL,
  `dtLastUpdate` datetime DEFAULT NULL,
  `dtRegister` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `active` enum('Y','N') DEFAULT 'Y',
  PRIMARY KEY (`id`),
  KEY `active` (`active`),
  KEY `idCategoryFk` (`idCategoryFk`)
) ENGINE=InnoDB AUTO_INCREMENT=877 DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

-- Exportação de dados foi desmarcado.

-- Copiando estrutura para tabela ci4.brand_files
DROP TABLE IF EXISTS `brand_files`;
CREATE TABLE IF NOT EXISTS `brand_files` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `idBrandFk` int(11) unsigned NOT NULL DEFAULT '0',
  `type` char(40) NOT NULL,
  `name` char(80) NOT NULL,
  `file_1` varchar(400) NOT NULL,
  `file_2` varchar(400) DEFAULT NULL,
  `file_1_ext` char(45) DEFAULT NULL,
  `file_2_ext` char(45) DEFAULT NULL,
  `dtLastUpdate` datetime DEFAULT NULL,
  `dtRegister` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `active` enum('Y','N') DEFAULT 'Y',
  PRIMARY KEY (`id`),
  KEY `active` (`active`),
  KEY `idTabloidFk` (`idBrandFk`)
) ENGINE=InnoDB AUTO_INCREMENT=972 DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

-- Exportação de dados foi desmarcado.

-- Copiando estrutura para tabela ci4.campaigns
DROP TABLE IF EXISTS `campaigns`;
CREATE TABLE IF NOT EXISTS `campaigns` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `title` char(70) NOT NULL,
  `rewrite` char(150) NOT NULL,
  `uri_soon` char(250) NOT NULL,
  `dtRegister` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `active` enum('Y','N') DEFAULT 'Y',
  PRIMARY KEY (`id`),
  KEY `rewrite` (`rewrite`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

-- Exportação de dados foi desmarcado.

-- Copiando estrutura para tabela ci4.category
DROP TABLE IF EXISTS `category`;
CREATE TABLE IF NOT EXISTS `category` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(60) DEFAULT NULL,
  `description` mediumtext,
  `dtRegister` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `dtUpdate` timestamp NULL DEFAULT NULL,
  `idAdministratorFk` int(10) unsigned DEFAULT NULL,
  `module` char(60) DEFAULT NULL,
  `active` enum('Y','N') NOT NULL DEFAULT 'Y',
  PRIMARY KEY (`id`),
  KEY `idAdministratorFk` (`idAdministratorFk`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

-- Exportação de dados foi desmarcado.

-- Copiando estrutura para tabela ci4.cfg_terms
DROP TABLE IF EXISTS `cfg_terms`;
CREATE TABLE IF NOT EXISTS `cfg_terms` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `text` longtext NOT NULL,
  `type` char(20) NOT NULL,
  `group` varchar(60) DEFAULT NULL,
  `dtLastUpdate` datetime DEFAULT NULL,
  `dtRegister` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `active` enum('Y','N') NOT NULL DEFAULT 'Y',
  PRIMARY KEY (`id`),
  KEY `plataform_type` (`type`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8 COMMENT='Tabela de termos ';

-- Exportação de dados foi desmarcado.

-- Copiando estrutura para tabela ci4.ci_sessions
DROP TABLE IF EXISTS `ci_sessions`;
CREATE TABLE IF NOT EXISTS `ci_sessions` (
  `id` varchar(128) NOT NULL,
  `ip_address` varchar(45) NOT NULL,
  `timestamp` int(10) unsigned NOT NULL DEFAULT '0',
  `data` blob NOT NULL,
  KEY `ci_sessions_timestamp` (`timestamp`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Exportação de dados foi desmarcado.

-- Copiando estrutura para tabela ci4.companions
DROP TABLE IF EXISTS `companions`;
CREATE TABLE IF NOT EXISTS `companions` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `type` enum('A','F','C') NOT NULL,
  `idUserFk` int(10) unsigned DEFAULT NULL,
  `active` enum('Y','N') NOT NULL DEFAULT 'Y',
  `dtRegister` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `dtUpdate` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `idUserFk` (`idUserFk`)
) ENGINE=MyISAM AUTO_INCREMENT=40 DEFAULT CHARSET=latin1;

-- Exportação de dados foi desmarcado.

-- Copiando estrutura para tabela ci4.featured
DROP TABLE IF EXISTS `featured`;
CREATE TABLE IF NOT EXISTS `featured` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` char(100) NOT NULL,
  `link` char(250) DEFAULT NULL,
  `image` char(250) DEFAULT NULL,
  `dtStart` date DEFAULT NULL,
  `dtEnd` date DEFAULT NULL,
  `dtLastUpdate` datetime DEFAULT NULL,
  `dtRegister` timestamp NULL DEFAULT NULL,
  `active` enum('Y','N') DEFAULT 'Y',
  PRIMARY KEY (`id`),
  KEY `dtStart_dtEnd` (`dtStart`,`dtEnd`),
  KEY `active` (`active`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

-- Exportação de dados foi desmarcado.

-- Copiando estrutura para tabela ci4.files
DROP TABLE IF EXISTS `files`;
CREATE TABLE IF NOT EXISTS `files` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `idCategoryFk` int(11) unsigned NOT NULL DEFAULT '0',
  `idBrandFk` int(11) unsigned DEFAULT NULL,
  `title` char(160) NOT NULL,
  `code` char(60) DEFAULT NULL,
  `description` text,
  `uri_cover` varchar(400) DEFAULT NULL,
  `rewrite` char(100) DEFAULT NULL,
  `module` char(45) DEFAULT NULL,
  `dtLastUpdate` date DEFAULT NULL,
  `dtRegister` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `active` enum('Y','N') DEFAULT 'Y',
  PRIMARY KEY (`id`),
  KEY `active` (`active`),
  KEY `idCategoryFk_idBrandFk` (`idCategoryFk`,`idBrandFk`)
) ENGINE=InnoDB AUTO_INCREMENT=187 DEFAULT CHARSET=utf8;

-- Exportação de dados foi desmarcado.

-- Copiando estrutura para tabela ci4.files_itens
DROP TABLE IF EXISTS `files_itens`;
CREATE TABLE IF NOT EXISTS `files_itens` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `idFileFk` int(11) unsigned NOT NULL DEFAULT '0',
  `name` char(70) DEFAULT NULL,
  `uri_file` varchar(500) NOT NULL DEFAULT '0',
  `file_ext` char(20) DEFAULT NULL,
  `dtRegister` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `active` enum('Y','N') DEFAULT 'Y',
  PRIMARY KEY (`id`),
  KEY `active` (`active`),
  KEY `idFileFk` (`idFileFk`)
) ENGINE=InnoDB AUTO_INCREMENT=271 DEFAULT CHARSET=utf8;

-- Exportação de dados foi desmarcado.

-- Copiando estrutura para tabela ci4.file_imports
DROP TABLE IF EXISTS `file_imports`;
CREATE TABLE IF NOT EXISTS `file_imports` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `module` char(45) NOT NULL,
  `identification` char(150) NOT NULL,
  `separator` enum(',',';') DEFAULT ';',
  `isHeader` enum('Y','N') DEFAULT 'N',
  `type` char(35) DEFAULT NULL COMMENT 'Coluna de identificação do tipo de Cargas ',
  `typeDoc` char(2) DEFAULT NULL,
  `file` char(250) DEFAULT NULL,
  `isProcessed` enum('Y','N','L') DEFAULT 'N',
  `statusProcessed` enum('E','C') DEFAULT NULL,
  `jsonLog` longtext,
  `notes` text,
  `dtProcessed` datetime DEFAULT NULL,
  `dtRegister` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `active` enum('Y','N') DEFAULT 'Y',
  PRIMARY KEY (`id`),
  KEY `identification` (`identification`),
  KEY `isProcessed` (`isProcessed`),
  KEY `active` (`active`)
) ENGINE=InnoDB AUTO_INCREMENT=249 DEFAULT CHARSET=utf8;

-- Exportação de dados foi desmarcado.

-- Copiando estrutura para tabela ci4.images_send_mail
DROP TABLE IF EXISTS `images_send_mail`;
CREATE TABLE IF NOT EXISTS `images_send_mail` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `id_image` int(10) unsigned NOT NULL,
  `id_dist` int(10) unsigned DEFAULT NULL,
  `id_manager` int(10) unsigned DEFAULT NULL,
  `email_sent` enum('Y','N') NOT NULL DEFAULT 'N',
  `send_date` date DEFAULT NULL,
  `status` enum('Y','N') NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_image` (`id_image`),
  KEY `id_dist` (`id_dist`),
  KEY `id_manager` (`id_manager`),
  CONSTRAINT `images_send_mail_ibfk_1` FOREIGN KEY (`id_image`) REFERENCES `image_sent` (`id`),
  CONSTRAINT `images_send_mail_ibfk_2` FOREIGN KEY (`id_dist`) REFERENCES `users` (`id`),
  CONSTRAINT `images_send_mail_ibfk_3` FOREIGN KEY (`id_manager`) REFERENCES `users` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=99 DEFAULT CHARSET=utf8;

-- Exportação de dados foi desmarcado.

-- Copiando estrutura para tabela ci4.image_sent
DROP TABLE IF EXISTS `image_sent`;
CREATE TABLE IF NOT EXISTS `image_sent` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `idUserFk` int(11) unsigned NOT NULL DEFAULT '0',
  `userDocNumber` bigint(30) unsigned NOT NULL DEFAULT '0',
  `docNumber` bigint(30) unsigned NOT NULL DEFAULT '0',
  `socialReason` char(200) NOT NULL,
  `rackType` int(5) NOT NULL,
  `uri_contract` char(250) DEFAULT NULL,
  `uri_rack` char(250) DEFAULT NULL,
  `situation` enum('A','Y','N') DEFAULT 'A',
  `administrator` int(11) DEFAULT NULL,
  `ip` char(35) DEFAULT NULL,
  `browser` char(120) DEFAULT NULL,
  `internalNote` text,
  `noteFail` text,
  `dtSendFile` datetime DEFAULT NULL,
  `dtLastUpdate` datetime DEFAULT NULL,
  `dtRegister` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `active` enum('Y','N') DEFAULT 'Y',
  PRIMARY KEY (`id`),
  KEY `idUserFk_userDocNumber` (`idUserFk`,`userDocNumber`),
  KEY `active` (`active`)
) ENGINE=InnoDB AUTO_INCREMENT=6182 DEFAULT CHARSET=utf8;

-- Exportação de dados foi desmarcado.

-- Copiando estrutura para tabela ci4.image_validate
DROP TABLE IF EXISTS `image_validate`;
CREATE TABLE IF NOT EXISTS `image_validate` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `distribuidor` bigint(30) NOT NULL,
  `docNumber` bigint(30) NOT NULL DEFAULT '0',
  `name` char(120) NOT NULL,
  `year` int(11) NOT NULL,
  `type` char(65) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `docNumber` (`docNumber`)
) ENGINE=InnoDB AUTO_INCREMENT=47823 DEFAULT CHARSET=utf8;

-- Exportação de dados foi desmarcado.

-- Copiando estrutura para tabela ci4.log_accept_term
DROP TABLE IF EXISTS `log_accept_term`;
CREATE TABLE IF NOT EXISTS `log_accept_term` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `idUserFk` bigint(20) unsigned NOT NULL DEFAULT '0',
  `browser` varchar(300) DEFAULT NULL,
  `ip` char(25) DEFAULT NULL,
  `file` longtext,
  `dtRegister` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `mechanics` varchar(60) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

-- Exportação de dados foi desmarcado.

-- Copiando estrutura para tabela ci4.log_access
DROP TABLE IF EXISTS `log_access`;
CREATE TABLE IF NOT EXISTS `log_access` (
  `idUserFk` int(11) unsigned NOT NULL,
  `browser` char(150) DEFAULT NULL,
  `ip` char(20) DEFAULT NULL,
  `dtRegister` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  KEY `idUserFk` (`idUserFk`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Exportação de dados foi desmarcado.

-- Copiando estrutura para tabela ci4.log_actions
DROP TABLE IF EXISTS `log_actions`;
CREATE TABLE IF NOT EXISTS `log_actions` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `dtRegister` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `activity` char(60) NOT NULL,
  `module` char(60) DEFAULT NULL,
  `idAdministratorFk` int(11) unsigned NOT NULL,
  `idItemFk` int(11) unsigned NOT NULL,
  `json_old_post` mediumtext,
  `json_new_post` mediumtext,
  `ip` char(25) DEFAULT NULL,
  `browser` char(120) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `idAdministratorFk` (`idAdministratorFk`),
  KEY `itemFk` (`idItemFk`)
) ENGINE=InnoDB AUTO_INCREMENT=8345 DEFAULT CHARSET=utf8;

-- Exportação de dados foi desmarcado.

-- Copiando estrutura para tabela ci4.modules
DROP TABLE IF EXISTS `modules`;
CREATE TABLE IF NOT EXISTS `modules` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `idDad` int(11) unsigned DEFAULT NULL,
  `title` char(30) NOT NULL,
  `icon` char(45) NOT NULL,
  `route` char(45) NOT NULL,
  `order` decimal(10,0) DEFAULT '0',
  `active` enum('Y','N') DEFAULT 'Y',
  `dtRegister` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=69 DEFAULT CHARSET=utf8;

-- Exportação de dados foi desmarcado.

-- Copiando estrutura para tabela ci4.modules_rel_administrators
DROP TABLE IF EXISTS `modules_rel_administrators`;
CREATE TABLE IF NOT EXISTS `modules_rel_administrators` (
  `idAdministratorFk` int(11) unsigned NOT NULL,
  `idModuleFk` int(11) unsigned NOT NULL,
  `dtRegister` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Exportação de dados foi desmarcado.

-- Copiando estrutura para tabela ci4.orders
DROP TABLE IF EXISTS `orders`;
CREATE TABLE IF NOT EXISTS `orders` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `idItemsFk` int(10) unsigned DEFAULT NULL,
  `idUserFk` int(10) unsigned DEFAULT NULL,
  `active` enum('Y','N') NOT NULL DEFAULT 'Y',
  `status` enum('W','Y','N') NOT NULL DEFAULT 'W',
  `dtRegister` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `dtUpdate` timestamp NULL DEFAULT NULL,
  `idAdministratorFk` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `idItemsFk` (`idItemsFk`),
  KEY `idUserFk` (`idUserFk`),
  KEY `idAdministratorFk` (`idAdministratorFk`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- Exportação de dados foi desmarcado.

-- Copiando estrutura para tabela ci4.product
DROP TABLE IF EXISTS `product`;
CREATE TABLE IF NOT EXISTS `product` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `description` mediumtext,
  `dtRegister` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `dtUpdate` timestamp NULL DEFAULT NULL,
  `idAdministratorFk` int(10) unsigned DEFAULT NULL,
  `idCategoryFk` int(10) unsigned DEFAULT NULL,
  `price` decimal(9,2) NOT NULL DEFAULT '0.00',
  `active` enum('Y','N','L') NOT NULL DEFAULT 'Y',
  `stock` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `idCategoryFk` (`idCategoryFk`),
  KEY `idAdministratorFk` (`idAdministratorFk`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

-- Exportação de dados foi desmarcado.

-- Copiando estrutura para tabela ci4.product_rel_orders
DROP TABLE IF EXISTS `product_rel_orders`;
CREATE TABLE IF NOT EXISTS `product_rel_orders` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `idProductFk` int(10) unsigned DEFAULT NULL,
  `idUserFk` int(10) unsigned DEFAULT NULL,
  `active` enum('Y','N') NOT NULL DEFAULT 'Y',
  `quantity` int(11) DEFAULT NULL,
  `dtRegister` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `idProductFk` (`idProductFk`),
  KEY `idUserFk` (`idUserFk`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- Exportação de dados foi desmarcado.

-- Copiando estrutura para tabela ci4.users
DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `idImportFk` int(10) unsigned DEFAULT NULL,
  `name` char(65) DEFAULT NULL,
  `docNumber` bigint(20) NOT NULL,
  `docNumberHigher` bigint(20) DEFAULT NULL,
  `password` char(200) DEFAULT NULL,
  `phoneNumber` char(15) DEFAULT NULL,
  `mobileNumber` char(15) DEFAULT NULL,
  `email` char(150) DEFAULT NULL,
  `gender` enum('F','M','O') DEFAULT NULL,
  `office` char(35) DEFAULT NULL,
  `zipcode` char(15) DEFAULT NULL,
  `place` char(150) DEFAULT NULL,
  `complement` char(60) DEFAULT NULL,
  `neighborhood` char(60) DEFAULT NULL,
  `city` char(45) DEFAULT NULL,
  `state` char(45) DEFAULT NULL,
  `firstAccess` datetime DEFAULT NULL,
  `notes` text,
  `isPed` enum('Y','N') DEFAULT 'N',
  `isSeara` enum('Y','N') DEFAULT 'N',
  `dtRegister` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `active` enum('Y','N') DEFAULT 'Y',
  `dtUpdate` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `docNumber` (`docNumber`),
  KEY `firstAccess` (`firstAccess`),
  KEY `password` (`password`)
) ENGINE=InnoDB AUTO_INCREMENT=367 DEFAULT CHARSET=utf8;

-- Exportação de dados foi desmarcado.

-- Copiando estrutura para tabela ci4.users_campaigns
DROP TABLE IF EXISTS `users_campaigns`;
CREATE TABLE IF NOT EXISTS `users_campaigns` (
  `idUserFk` int(11) unsigned NOT NULL,
  `idCampaignFk` int(11) NOT NULL,
  `nivel` int(11) DEFAULT NULL,
  `dtRegister` timestamp NULL DEFAULT NULL,
  KEY `idUserFk` (`idUserFk`),
  KEY `idCampaignFk` (`idCampaignFk`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Tabela de relação de usuário e campanhas que ele participa';

-- Exportação de dados foi desmarcado.

-- Copiando estrutura para tabela ci4.users_log_action
DROP TABLE IF EXISTS `users_log_action`;
CREATE TABLE IF NOT EXISTS `users_log_action` (
  `idUserFk` int(11) unsigned NOT NULL,
  `action` varchar(100) NOT NULL,
  `dataJson` longtext,
  `plataform` char(50) DEFAULT NULL,
  `dtRegister` timestamp NULL DEFAULT NULL,
  KEY `idUserFk` (`idUserFk`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Tabela registra ações dos usuários nas plataformas';

-- Exportação de dados foi desmarcado.

-- Copiando estrutura para tabela ci4.users_plataform
DROP TABLE IF EXISTS `users_plataform`;
CREATE TABLE IF NOT EXISTS `users_plataform` (
  `idUserFk` int(11) unsigned NOT NULL,
  `plataform` varchar(50) NOT NULL,
  `dtRegister` timestamp NULL DEFAULT NULL,
  KEY `idUserFk` (`idUserFk`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Tabela que registar quais plataforma usuário já se cadastrou';

-- Exportação de dados foi desmarcado.

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
