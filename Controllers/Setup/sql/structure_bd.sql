/*
SQLyog Community v13.0.1 (32 bit)
MySQL - 5.7.17 : Database - ak1bd
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`ak1bd` /*!40100 DEFAULT CHARACTER SET utf8 */;

USE `ak1bd`;

/*Table structure for table `t_accedes` */

DROP TABLE IF EXISTS `t_accedes`;

CREATE TABLE `t_accedes` (
  `id_w` int(6) NOT NULL,
  `cd_me` char(4) NOT NULL,
  `user_ac` char(30) NOT NULL,
  `dat_ss_ac` datetime NOT NULL,
  PRIMARY KEY (`id_w`,`cd_me`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

/*Table structure for table `t_agences` */

DROP TABLE IF EXISTS `t_agences`;

CREATE TABLE `t_agences` (
  `id_ag` int(11) NOT NULL AUTO_INCREMENT,
  `cd_soc` char(6) NOT NULL,
  `cd_ag` char(6) NOT NULL,
  `nm_ag` char(80) NOT NULL,
  `ad_ag` char(60) NOT NULL,
  `ml_ag` char(80) DEFAULT NULL,
  `tl1_ag` char(20) NOT NULL,
  `tl2_ag` char(20) DEFAULT NULL,
  `user_ag` char(30) NOT NULL,
  `dt_ss_ag` datetime NOT NULL,
  PRIMARY KEY (`cd_ag`),
  KEY `id_ag` (`id_ag`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

/*Table structure for table `t_agents` */

DROP TABLE IF EXISTS `t_agents`;

CREATE TABLE `t_agents` (
  `id_agt` int(11) NOT NULL AUTO_INCREMENT,
  `mle_pers` char(22) NOT NULL,
  `mle_agt` int(4) NOT NULL,
  `login` char(80) NOT NULL DEFAULT '',
  `actif` char(1) NOT NULL DEFAULT 'O',
  `connecte` char(1) NOT NULL DEFAULT 'N',
  `modif` char(1) NOT NULL DEFAULT 'O',
  `dipl_agt` char(30) DEFAULT NULL,
  `dt_entree` date NOT NULL,
  `cd_tp_cnt` char(4) NOT NULL,
  `retr_agt` date NOT NULL,
  `agt_srt` char(1) NOT NULL DEFAULT 'N',
  `retrt_agt` char(1) NOT NULL DEFAULT 'N',
  `user_agt` char(30) NOT NULL,
  `dt_ss_agt` datetime NOT NULL,
  PRIMARY KEY (`mle_agt`),
  UNIQUE KEY `login` (`login`),
  KEY `id_agt` (`id_agt`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

/*Table structure for table `t_groupe` */

DROP TABLE IF EXISTS `t_groupe`;

CREATE TABLE `t_groupe` (
  `id_grp` int(11) NOT NULL AUTO_INCREMENT,
  `cd_grp` char(4) NOT NULL,
  `nm_grp` char(50) NOT NULL,
  `ad_grp` char(60) NOT NULL,
  `ml_grp` char(80) DEFAULT NULL,
  `tl1_grp` char(20) NOT NULL,
  `tl2_grp` char(20) DEFAULT NULL,
  `user_grp` char(30) NOT NULL,
  `dt_ss_grp` datetime NOT NULL,
  PRIMARY KEY (`cd_grp`),
  KEY `id_grp` (`id_grp`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

/*Table structure for table `t_machines` */

DROP TABLE IF EXISTS `t_machines`;

CREATE TABLE `t_machines` (
  `id_mc` int(3) NOT NULL AUTO_INCREMENT,
  `ip` char(100) NOT NULL DEFAULT '',
  `nom_mch` char(30) NOT NULL DEFAULT '',
  `mle_agt` int(4) NOT NULL,
  `mask` char(100) NOT NULL DEFAULT '',
  `autor` char(1) NOT NULL,
  `user_mc` char(30) NOT NULL,
  `dt_ss_mc` datetime NOT NULL,
  PRIMARY KEY (`ip`),
  KEY `id_mc` (`id_mc`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

/*Table structure for table `t_menus` */

DROP TABLE IF EXISTS `t_menus`;

CREATE TABLE `t_menus` (
  `id_me` int(4) NOT NULL AUTO_INCREMENT,
  `cd_tp_m` char(4) NOT NULL,
  `cd_md` char(4) NOT NULL,
  `cd_me` char(4) NOT NULL,
  `lb_me` char(50) NOT NULL,
  `lien_me` char(100) NOT NULL,
  `act_me` char(1) NOT NULL,
  `user_me` char(30) NOT NULL,
  `dt_ss_me` datetime NOT NULL,
  PRIMARY KEY (`cd_me`),
  KEY `id_me` (`id_me`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

/*Table structure for table `t_modules` */

DROP TABLE IF EXISTS `t_modules`;

CREATE TABLE `t_modules` (
  `id_md` int(1) NOT NULL AUTO_INCREMENT,
  `cd_md` char(4) NOT NULL,
  `lb_md` char(100) NOT NULL,
  `user_md` char(30) NOT NULL,
  `dt_ss_md` datetime NOT NULL,
  PRIMARY KEY (`cd_md`),
  KEY `id_md` (`id_md`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

/*Table structure for table `t_niveaux` */

DROP TABLE IF EXISTS `t_niveaux`;

CREATE TABLE `t_niveaux` (
  `id_n` int(1) NOT NULL AUTO_INCREMENT,
  `cd_n` char(4) NOT NULL DEFAULT '0',
  `lib_n` char(40) NOT NULL DEFAULT '',
  `user_n` char(30) NOT NULL,
  `dt_ss_n` datetime NOT NULL,
  PRIMARY KEY (`cd_n`),
  KEY `id_n` (`id_n`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

/*Table structure for table `t_pays` */

DROP TABLE IF EXISTS `t_pays`;

CREATE TABLE `t_pays` (
  `id_py` int(11) NOT NULL AUTO_INCREMENT,
  `cd_py` char(4) NOT NULL,
  `lb_py` char(80) NOT NULL,
  `ctn_py` char(50) DEFAULT NULL,
  `user_py` char(30) NOT NULL,
  `dt_ss_py` datetime NOT NULL,
  PRIMARY KEY (`cd_py`),
  KEY `id_py` (`id_py`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

/*Table structure for table `t_personnes` */

DROP TABLE IF EXISTS `t_personnes`;

CREATE TABLE `t_personnes` (
  `id_pers` int(11) NOT NULL AUTO_INCREMENT,
  `cd_ty_ps` char(4) NOT NULL,
  `mle_pers` char(12) NOT NULL,
  `nm_pers` char(80) NOT NULL,
  `prm_pers` char(100) NOT NULL,
  `sex_pers` char(5) NOT NULL,
  `dt_nais` date NOT NULL,
  `lie_nais` char(50) NOT NULL,
  `ph_pers` char(50) DEFAULT NULL,
  `pce_idn_p` char(30) NOT NULL,
  `cd_py` char(4) DEFAULT NULL,
  `ville_pers` char(80) NOT NULL,
  `tel_pers` char(22) DEFAULT NULL,
  `cel1_pers` char(22) NOT NULL,
  `cel2_pers` char(22) DEFAULT NULL,
  `mail_pers` char(80) DEFAULT NULL,
  `user_pers` char(30) NOT NULL,
  `dt_ss_pers` datetime NOT NULL,
  PRIMARY KEY (`mle_pers`),
  KEY `id_pers` (`id_pers`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

/*Table structure for table `t_postes` */

DROP TABLE IF EXISTS `t_postes`;

CREATE TABLE `t_postes` (
  `id_pst` int(4) NOT NULL AUTO_INCREMENT,
  `cd_sr` char(4) NOT NULL,
  `n_pst` char(6) NOT NULL,
  `lib_pst` char(80) NOT NULL,
  `user_pst` char(30) NOT NULL,
  `dt_pst` datetime NOT NULL,
  PRIMARY KEY (`n_pst`),
  KEY `id_pst` (`id_pst`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

/*Table structure for table `t_services` */

DROP TABLE IF EXISTS `t_services`;

CREATE TABLE `t_services` (
  `id_sr` int(2) NOT NULL AUTO_INCREMENT,
  `cd_sr` char(4) NOT NULL,
  `nm_sr` char(80) NOT NULL,
  `obs_sr` char(150) NOT NULL,
  `cd_md` char(4) NOT NULL DEFAULT '0',
  `user_sr` varchar(30) NOT NULL,
  `dt_ss_sr` datetime NOT NULL,
  PRIMARY KEY (`cd_sr`),
  KEY `id_sr` (`id_sr`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

/*Table structure for table `t_societes` */

DROP TABLE IF EXISTS `t_societes`;

CREATE TABLE `t_societes` (
  `id_soc` int(11) NOT NULL AUTO_INCREMENT,
  `cd_py` char(4) NOT NULL,
  `cd_soc` char(6) NOT NULL,
  `rs_soc` char(80) NOT NULL,
  `ad_soc` char(60) NOT NULL,
  `ml_soc` char(80) DEFAULT NULL,
  `tl1_soc` char(20) NOT NULL,
  `tl2_soc` char(20) DEFAULT NULL,
  `id_cnss` char(6) DEFAULT NULL,
  `dat_cnss` date DEFAULT NULL,
  `user_soc` char(30) NOT NULL,
  `dt_ss_soc` datetime NOT NULL,
  PRIMARY KEY (`cd_soc`),
  KEY `id_soc` (`id_soc`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

/*Table structure for table `t_travail` */

DROP TABLE IF EXISTS `t_travail`;

CREATE TABLE `t_travail` (
  `id_w` int(6) NOT NULL AUTO_INCREMENT,
  `n_pst` char(6) NOT NULL DEFAULT '',
  `cd_n` char(4) NOT NULL DEFAULT '0',
  `login` char(30) NOT NULL DEFAULT '',
  `cd_ag` char(6) NOT NULL DEFAULT '',
  `cd_cat` char(4) NOT NULL DEFAULT '',
  `mot_pass` varchar(100) NOT NULL DEFAULT '',
  `dat_w` date NOT NULL DEFAULT '0000-00-00',
  `motif_w` varchar(120) NOT NULL DEFAULT '',
  `arch_statut` char(1) NOT NULL DEFAULT 'N',
  `user_w` char(50) NOT NULL,
  `dt_ss_w` datetime NOT NULL,
  PRIMARY KEY (`n_pst`,`cd_n`,`login`,`cd_ag`,`cd_cat`,`dat_w`),
  UNIQUE KEY `mot_pass` (`mot_pass`),
  KEY `id_w` (`id_w`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

/*Table structure for table `t_types_contrat` */

DROP TABLE IF EXISTS `t_types_contrat`;

CREATE TABLE `t_types_contrat` (
  `id_ty_cnt` int(1) NOT NULL AUTO_INCREMENT,
  `cd_ty_cnt` char(4) NOT NULL,
  `lb_ty_cnt` char(50) NOT NULL,
  `user_ty_cnt` char(30) NOT NULL,
  `dt_ss_cnt` datetime NOT NULL,
  PRIMARY KEY (`cd_ty_cnt`),
  KEY `id_ty_cnt` (`id_ty_cnt`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

/*Table structure for table `t_types_menu` */

DROP TABLE IF EXISTS `t_types_menu`;

CREATE TABLE `t_types_menu` (
  `id_tp_m` int(1) NOT NULL AUTO_INCREMENT,
  `cd_tp_m` char(4) NOT NULL,
  `lb_tp_m` char(30) NOT NULL,
  `user_tp_m` char(30) NOT NULL,
  `dt_ss_tp_m` datetime NOT NULL,
  PRIMARY KEY (`cd_tp_m`),
  KEY `id_tp_m` (`id_tp_m`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

/*Table structure for table `t_types_personne` */

DROP TABLE IF EXISTS `t_types_personne`;

CREATE TABLE `t_types_personne` (
  `id_ty_ps` int(1) NOT NULL AUTO_INCREMENT,
  `cd_ty_ps` char(4) NOT NULL,
  `lb_ty_ps` char(30) NOT NULL,
  `user_ty_ps` char(30) NOT NULL,
  `dt_ss_ty_ps` datetime NOT NULL,
  PRIMARY KEY (`cd_ty_ps`),
  KEY `id_ty_ps` (`id_ty_ps`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

/*Table structure for table `v_mch_auto` */

DROP TABLE IF EXISTS `v_mch_auto`;

/*!50001 DROP VIEW IF EXISTS `v_mch_auto` */;
/*!50001 DROP TABLE IF EXISTS `v_mch_auto` */;

/*!50001 CREATE TABLE  `v_mch_auto`(
 `ip` char(100) 
)*/;

/*Table structure for table `v_menu_ok` */

DROP TABLE IF EXISTS `v_menu_ok`;

/*!50001 DROP VIEW IF EXISTS `v_menu_ok` */;
/*!50001 DROP TABLE IF EXISTS `v_menu_ok` */;

/*!50001 CREATE TABLE  `v_menu_ok`(
 `cd_tp_m` char(4) ,
 `lb_tp_m` char(30) ,
 `cd_me` char(4) ,
 `lb_me` char(50) ,
 `lien_me` char(100) ,
 `act_me` char(1) ,
 `login` char(30) 
)*/;

/*Table structure for table `v_users_auto` */

DROP TABLE IF EXISTS `v_users_auto`;

/*!50001 DROP VIEW IF EXISTS `v_users_auto` */;
/*!50001 DROP TABLE IF EXISTS `v_users_auto` */;

/*!50001 CREATE TABLE  `v_users_auto`(
 `nm_pers` char(80) ,
 `prm_pers` char(100) ,
 `lib_pst` char(80) ,
 `login` char(80) ,
 `cd_sr` char(4) ,
 `nm_sr` char(80) ,
 `applic` char(4) ,
 `cdsoc` char(6) ,
 `agce` char(6) ,
 `motpass` varchar(100) ,
 `cd_n` char(4) ,
 `nom_agce` char(80) ,
 `lib_n` char(40) 
)*/;

/*View structure for view v_mch_auto */

/*!50001 DROP TABLE IF EXISTS `v_mch_auto` */;
/*!50001 DROP VIEW IF EXISTS `v_mch_auto` */;

/*!50001 CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_mch_auto` AS (select `t_machines`.`ip` AS `ip` from `t_machines` where (`t_machines`.`autor` = 'O')) */;

/*View structure for view v_menu_ok */

/*!50001 DROP TABLE IF EXISTS `v_menu_ok` */;
/*!50001 DROP VIEW IF EXISTS `v_menu_ok` */;

/*!50001 CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_menu_ok` AS (select `t_types_menu`.`cd_tp_m` AS `cd_tp_m`,`t_types_menu`.`lb_tp_m` AS `lb_tp_m`,`t_menus`.`cd_me` AS `cd_me`,`t_menus`.`lb_me` AS `lb_me`,`t_menus`.`lien_me` AS `lien_me`,`t_menus`.`act_me` AS `act_me`,`t_travail`.`login` AS `login` from (((`t_types_menu` join `t_menus` on((`t_types_menu`.`cd_tp_m` = `t_menus`.`cd_tp_m`))) join `t_accedes` on((`t_menus`.`cd_me` = `t_accedes`.`cd_me`))) join `t_travail` on((`t_accedes`.`id_w` = `t_travail`.`id_w`)))) */;

/*View structure for view v_users_auto */

/*!50001 DROP TABLE IF EXISTS `v_users_auto` */;
/*!50001 DROP VIEW IF EXISTS `v_users_auto` */;

/*!50001 CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_users_auto` AS (select `t_personnes`.`nm_pers` AS `nm_pers`,`t_personnes`.`prm_pers` AS `prm_pers`,`t_postes`.`lib_pst` AS `lib_pst`,`t_agents`.`login` AS `login`,`t_postes`.`cd_sr` AS `cd_sr`,`t_services`.`nm_sr` AS `nm_sr`,`t_services`.`cd_md` AS `applic`,`t_agences`.`cd_soc` AS `cdsoc`,`t_travail`.`cd_ag` AS `agce`,`t_travail`.`mot_pass` AS `motpass`,`t_niveaux`.`cd_n` AS `cd_n`,`t_agences`.`nm_ag` AS `nom_agce`,`t_niveaux`.`lib_n` AS `lib_n` from ((((((`t_travail` join `t_agents` on((`t_agents`.`login` = `t_travail`.`login`))) join `t_postes` on((`t_postes`.`n_pst` = `t_travail`.`n_pst`))) join `t_niveaux` on((`t_niveaux`.`cd_n` = `t_travail`.`cd_n`))) join `t_agences` on((`t_agences`.`cd_ag` = `t_travail`.`cd_ag`))) join `t_services` on((`t_services`.`cd_sr` = `t_postes`.`cd_sr`))) join `t_personnes` on((`t_personnes`.`mle_pers` = `t_agents`.`mle_pers`))) where ((`t_agents`.`actif` = 'O') and (`t_agents`.`connecte` = 'N') and (`t_travail`.`arch_statut` = 'N'))) */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
