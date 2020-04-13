/*
SQLyog Professional v12.5.1 (64 bit)
MySQL - 10.1.36-MariaDB : Database - db_absensi
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`db_absensi` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `db_absensi`;

/*Table structure for table `absensis` */

DROP TABLE IF EXISTS `absensis`;

CREATE TABLE `absensis` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `no_akun` int(5) unsigned DEFAULT NULL,
  `nip` varchar(8) DEFAULT NULL,
  `nama` varchar(35) DEFAULT NULL,
  `waktu` datetime DEFAULT NULL,
  `kondisi` varchar(20) DEFAULT NULL,
  `kondisi_baru` varchar(20) DEFAULT NULL,
  `status` varchar(20) DEFAULT NULL,
  `operasi` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=232 DEFAULT CHARSET=latin1;

/*Data for the table `absensis` */

insert  into `absensis`(`id`,`no_akun`,`nip`,`nama`,`waktu`,`kondisi`,`kondisi_baru`,`status`,`operasi`) values 
(120,720,'678768','Hasanah','2019-02-01 07:24:00','C/In',NULL,NULL,NULL),
(121,720,'678768','Hasanah','2019-02-02 07:24:00','null','null/in','Libur',NULL),
(122,720,'678768','Hasanah','2019-02-03 07:24:00','null','null/in','Libur',NULL),
(123,720,'678768','Hasanah','2019-02-04 07:24:00','C/In',NULL,NULL,NULL),
(124,720,'678768','Hasanah','2019-02-05 07:24:00','C/In',NULL,NULL,NULL),
(125,720,'678768','Hasanah','2019-02-06 07:24:00','C/In',NULL,NULL,NULL),
(126,720,'678768','Hasanah','2019-02-07 07:24:00','C/In',NULL,NULL,NULL),
(127,720,'678768','Hasanah','2019-02-08 07:24:00','C/In',NULL,NULL,NULL),
(128,720,'678768','Hasanah','2019-02-09 07:24:00','null','null/in','Libur',NULL),
(129,720,'678768','Hasanah','2019-02-10 07:24:00','null','null/in','Libur',NULL),
(130,720,'678768','Hasanah','2019-02-11 07:24:00','C/In',NULL,NULL,NULL),
(131,720,'678768','Hasanah','2019-02-12 07:24:00','C/In',NULL,NULL,NULL),
(132,720,'678768','Hasanah','2019-02-13 07:24:00','C/In',NULL,NULL,NULL),
(133,720,'678768','Hasanah','2019-02-14 07:24:00','C/In',NULL,NULL,NULL),
(134,720,'678768','Hasanah','2019-02-15 07:24:00','C/In',NULL,NULL,NULL),
(135,720,'678768','Hasanah','2019-02-16 07:24:00','null','null/in','Libur',NULL),
(136,720,'678768','Hasanah','2019-02-17 07:24:00','null','null/in','Libur',NULL),
(137,720,'678768','Hasanah','2019-02-18 07:24:00','C/In',NULL,NULL,NULL),
(138,720,'678768','Hasanah','2019-02-19 07:24:00','C/In',NULL,NULL,NULL),
(139,720,'678768','Hasanah','2019-02-20 07:24:00','C/In',NULL,NULL,NULL),
(140,720,'678768','Hasanah','2019-02-21 07:24:00','C/In',NULL,NULL,NULL),
(141,720,'678768','Hasanah','2019-02-22 07:24:00','C/In',NULL,NULL,NULL),
(142,720,'678768','Hasanah','2019-02-23 07:24:00','null','null/in','Libur',NULL),
(143,720,'678768','Hasanah','2019-02-24 07:24:00','null','null/in','Libur',NULL),
(144,720,'678768','Hasanah','2019-02-25 07:24:00','C/In',NULL,NULL,NULL),
(145,720,'678768','Hasanah','2019-02-26 07:24:00','C/In',NULL,NULL,NULL),
(146,720,'678768','Hasanah','2019-02-27 07:24:00','C/In',NULL,NULL,NULL),
(147,720,'678768','Hasanah','2019-02-28 07:24:00','C/In',NULL,NULL,NULL),
(148,720,'678768','Hasanah','2019-02-01 16:00:00','C/Out',NULL,NULL,NULL),
(149,720,'678768','Hasanah','2019-02-02 16:00:00','null','null/in','Libur',NULL),
(150,720,'678768','Hasanah','2019-02-03 16:00:00','null','null/in','Libur',NULL),
(151,720,'678768','Hasanah','2019-02-04 16:00:00','C/Out',NULL,NULL,NULL),
(152,720,'678768','Hasanah','2019-02-05 16:00:00','C/Out',NULL,NULL,NULL),
(153,720,'678768','Hasanah','2019-02-06 16:00:00','C/Out',NULL,NULL,NULL),
(154,720,'678768','Hasanah','2019-02-07 16:00:00','C/Out',NULL,NULL,NULL),
(155,720,'678768','Hasanah','2019-02-08 16:00:00','C/Out',NULL,NULL,NULL),
(156,720,'678768','Hasanah','2019-02-09 16:00:00','null','null/in','Libur',NULL),
(157,720,'678768','Hasanah','2019-02-10 16:00:00','null','null/in','Libur',NULL),
(158,720,'678768','Hasanah','2019-02-11 16:00:00','C/Out',NULL,NULL,NULL),
(159,720,'678768','Hasanah','2019-02-12 16:00:00','C/Out',NULL,NULL,NULL),
(160,720,'678768','Hasanah','2019-02-13 16:00:00','C/Out',NULL,NULL,NULL),
(161,720,'678768','Hasanah','2019-02-14 16:00:00','C/Out',NULL,NULL,NULL),
(162,720,'678768','Hasanah','2019-02-15 16:00:00','C/Out',NULL,NULL,NULL),
(163,720,'678768','Hasanah','2019-02-16 16:00:00','null','null/in','Libur',NULL),
(164,720,'678768','Hasanah','2019-02-17 16:00:00','null','null/in','Libur',NULL),
(165,720,'678768','Hasanah','2019-02-18 16:00:00','C/Out',NULL,NULL,NULL),
(166,720,'678768','Hasanah','2019-02-19 16:00:00','C/Out',NULL,NULL,NULL),
(167,720,'678768','Hasanah','2019-02-20 16:00:00','C/Out',NULL,NULL,NULL),
(168,720,'678768','Hasanah','2019-02-21 16:00:00','C/Out',NULL,NULL,NULL),
(169,720,'678768','Hasanah','2019-02-22 16:00:00','C/Out',NULL,NULL,NULL),
(170,720,'678768','Hasanah','2019-02-23 16:00:00',NULL,'null/out','Libur',NULL),
(171,720,'678768','Hasanah','2019-02-24 16:00:00',NULL,'null/out','Libur',NULL),
(172,720,'678768','Hasanah','2019-02-25 16:00:00','C/Out',NULL,NULL,NULL),
(173,720,'678768','Hasanah','2019-02-26 16:00:00','C/Out',NULL,NULL,NULL),
(174,720,'678768','Hasanah','2019-02-27 16:00:00','C/Out',NULL,NULL,NULL),
(175,720,'678768','Hasanah','2019-02-28 16:00:00','C/Out',NULL,NULL,NULL),
(176,723,'5326181','Uswatu Hasanah','2019-02-01 07:24:00','C/In','',NULL,''),
(177,723,'5326181','Uswatu Hasanah','2019-02-02 07:24:00','null','null/in','Libur',NULL),
(178,723,'5326181','Uswatu Hasanah','2019-02-03 07:24:00','null','null/in','Libur',NULL),
(179,723,'5326181','Uswatu Hasanah','2019-02-04 07:24:00','C/In',NULL,NULL,NULL),
(180,723,'5326181','Uswatu Hasanah','2019-02-05 07:24:00','C/In',NULL,NULL,NULL),
(181,723,'5326181','Uswatu Hasanah','2019-02-06 07:24:00','C/In',NULL,NULL,NULL),
(182,723,'5326181','Uswatu Hasanah','2019-02-07 07:24:00','C/In',NULL,NULL,NULL),
(183,723,'5326181','Uswatu Hasanah','2019-02-08 07:24:00','C/In',NULL,NULL,NULL),
(184,723,'5326181','Uswatu Hasanah','2019-02-09 07:24:00','null','null/in','Libur',NULL),
(185,723,'5326181','Uswatu Hasanah','2019-02-10 07:24:00','null','null/in','Libur',NULL),
(186,723,'5326181','Uswatu Hasanah','2019-02-11 07:24:00','C/In',NULL,NULL,NULL),
(187,723,'5326181','Uswatu Hasanah','2019-02-12 07:24:00','C/In',NULL,NULL,NULL),
(188,723,'5326181','Uswatu Hasanah','2019-02-13 07:24:00','C/In',NULL,NULL,NULL),
(189,723,'5326181','Uswatu Hasanah','2019-02-14 07:24:00','C/In',NULL,NULL,NULL),
(190,723,'5326181','Uswatu Hasanah','2019-02-15 07:24:00','C/In',NULL,NULL,NULL),
(191,723,'5326181','Uswatu Hasanah','2019-02-16 07:24:00','null','null/in','Libur',NULL),
(192,723,'5326181','Uswatu Hasanah','2019-02-17 07:24:00','null','null/in','Libur',NULL),
(193,723,'5326181','Uswatu Hasanah','2019-02-18 07:24:00','C/In',NULL,NULL,NULL),
(194,723,'5326181','Uswatu Hasanah','2019-02-19 07:24:00','C/In',NULL,NULL,NULL),
(195,723,'5326181','Uswatu Hasanah','2019-02-20 07:24:00','C/In',NULL,NULL,NULL),
(196,723,'5326181','Uswatu Hasanah','2019-02-21 07:24:00','C/In',NULL,NULL,NULL),
(197,723,'5326181','Uswatu Hasanah','2019-02-22 07:24:00','C/In',NULL,NULL,NULL),
(198,723,'5326181','Uswatu Hasanah','2019-02-23 07:24:00','null','null/in','Libur',NULL),
(199,723,'5326181','Uswatu Hasanah','2019-02-24 07:24:00','null','null/in','Libur',NULL),
(200,723,'5326181','Uswatu Hasanah','2019-02-25 07:24:00','C/In',NULL,NULL,NULL),
(201,723,'5326181','Uswatu Hasanah','2019-02-26 07:24:00','C/In',NULL,NULL,NULL),
(202,723,'5326181','Uswatu Hasanah','2019-02-27 07:24:00','C/In',NULL,NULL,NULL),
(203,723,'5326181','Uswatu Hasanah','2019-02-28 07:24:00','C/In',NULL,NULL,NULL),
(204,723,'5326181','Uswatu Hasanah','2019-02-01 16:00:00','C/Out',NULL,NULL,NULL),
(205,723,'5326181','Uswatu Hasanah','2019-02-02 16:00:00','null','null/in','Libur',NULL),
(206,723,'5326181','Uswatu Hasanah','2019-02-03 16:00:00','null','null/in','Libur',NULL),
(207,723,'5326181','Uswatu Hasanah','2019-02-04 16:00:00','C/Out',NULL,NULL,NULL),
(208,723,'5326181','Uswatu Hasanah','2019-02-05 16:00:00','C/Out',NULL,NULL,NULL),
(209,723,'5326181','Uswatu Hasanah','2019-02-06 16:00:00','C/Out',NULL,NULL,NULL),
(210,723,'5326181','Uswatu Hasanah','2019-02-07 16:00:00','C/Out',NULL,NULL,NULL),
(211,723,'5326181','Uswatu Hasanah','2019-02-08 16:00:00','C/Out',NULL,NULL,NULL),
(212,723,'5326181','Uswatu Hasanah','2019-02-09 16:00:00','null','null/in','Libur',NULL),
(213,723,'5326181','Uswatu Hasanah','2019-02-10 16:00:00','null','null/in','Libur',NULL),
(214,723,'5326181','Uswatu Hasanah','2019-02-11 16:00:00','C/Out',NULL,NULL,NULL),
(215,723,'5326181','Uswatu Hasanah','2019-02-12 16:00:00','C/Out',NULL,NULL,NULL),
(216,723,'5326181','Uswatu Hasanah','2019-02-13 16:00:00','C/Out',NULL,NULL,NULL),
(217,723,'5326181','Uswatu Hasanah','2019-02-14 16:00:00','C/Out',NULL,NULL,NULL),
(218,723,'5326181','Uswatu Hasanah','2019-02-15 16:00:00','C/Out',NULL,NULL,NULL),
(219,723,'5326181','Uswatu Hasanah','2019-02-16 16:00:00','null','null/in','Libur',NULL),
(220,723,'5326181','Uswatu Hasanah','2019-02-17 16:00:00','null','null/in','Libur',NULL),
(221,723,'5326181','Uswatu Hasanah','2019-02-18 16:00:00','C/Out',NULL,NULL,NULL),
(222,723,'5326181','Uswatu Hasanah','2019-02-19 16:00:00','C/Out',NULL,NULL,NULL),
(223,723,'5326181','Uswatu Hasanah','2019-02-20 16:00:00','C/Out',NULL,NULL,NULL),
(224,723,'5326181','Uswatu Hasanah','2019-02-21 16:00:00','C/Out',NULL,NULL,NULL),
(225,723,'5326181','Uswatu Hasanah','2019-02-22 16:00:00','C/Out',NULL,NULL,NULL),
(226,723,'5326181','Uswatu Hasanah','2019-02-23 16:00:00','null','null/in','Libur',NULL),
(227,723,'5326181','Uswatu Hasanah','2019-02-24 16:00:00','null','null/in','Libur',NULL),
(228,723,'5326181','Uswatu Hasanah','2019-02-25 16:00:00','C/Out',NULL,NULL,NULL),
(229,723,'5326181','Uswatu Hasanah','2019-02-26 16:00:00','C/Out',NULL,NULL,NULL),
(230,723,'5326181','Uswatu Hasanah','2019-02-27 16:00:00','C/Out',NULL,NULL,NULL),
(231,723,'5326181','Uswatu Hasanah','2019-02-28 16:00:00','C/Out',NULL,NULL,NULL);

/*Table structure for table `karyawans` */

DROP TABLE IF EXISTS `karyawans`;

CREATE TABLE `karyawans` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `kd_outsorsing` int(5) DEFAULT NULL,
  `no_akun` int(6) DEFAULT NULL,
  `nama_lengkap` varchar(35) DEFAULT NULL,
  `nip` varchar(8) DEFAULT NULL,
  `no_telp` varchar(14) DEFAULT NULL,
  `alamat` varchar(100) DEFAULT NULL,
  `nik` varchar(25) DEFAULT NULL,
  `gol_darah` varchar(4) DEFAULT NULL,
  `agama` enum('Islam','Kristen','Protestan','Hindu','Budha','Kohucu') DEFAULT NULL,
  `tmpt_lahir` varchar(35) DEFAULT NULL,
  `tgl_lahir` date DEFAULT NULL,
  `npwp` varchar(35) DEFAULT NULL,
  `divisi` varchar(35) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk` (`kd_outsorsing`),
  CONSTRAINT `fk` FOREIGN KEY (`kd_outsorsing`) REFERENCES `outsorsings` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

/*Data for the table `karyawans` */

insert  into `karyawans`(`id`,`kd_outsorsing`,`no_akun`,`nama_lengkap`,`nip`,`no_telp`,`alamat`,`nik`,`gol_darah`,`agama`,`tmpt_lahir`,`tgl_lahir`,`npwp`,`divisi`) values 
(1,1,723,'Uswatun Hasanah','5326181','','Cilegon Steell','123456780','O+','Islam','Serang','1991-06-12','1234567890','BPJS'),
(2,2,720,'Hasanah','678768','2736518239','Cilegon','12159021','AB','Islam','Cilegon','2018-12-01','159879','LOKET');

/*Table structure for table `menus` */

DROP TABLE IF EXISTS `menus`;

CREATE TABLE `menus` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `judul_menu` varchar(100) NOT NULL,
  `link` varchar(50) NOT NULL,
  `icon` varchar(50) NOT NULL,
  `is_active` int(2) NOT NULL,
  `is_parent` int(2) NOT NULL,
  `role` int(2) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7002 DEFAULT CHARSET=latin1;

/*Data for the table `menus` */

insert  into `menus`(`id`,`judul_menu`,`link`,`icon`,`is_active`,`is_parent`,`role`) values 
(100,'Dashboard','Dashboard','icon-home',1,0,1),
(200,'User','User','icon-user',1,0,1),
(201,'Daftar User','User/list','',1,200,NULL),
(300,'Outsorsing','Outsorsing','icon-globe',1,0,1),
(301,'Daftar Outsorsing','Outsorsing/list','',1,300,NULL),
(400,'Karyawan','Karyawan','icon-layers',1,0,1),
(401,'Daftar Karyawan','Karyawan/list','',1,400,NULL),
(402,'Absensi','Karyawan/Absensi','icon-note',1,400,NULL),
(500,'Laporan','Laporan','icon-book',1,0,1),
(501,'Laporan Karyawan','Laporan/karyawan','',1,500,NULL),
(502,'Laporan Absensi','Laporan/Absensi','',1,500,NULL),
(600,'Utility','Utility','icon-settings',0,0,1),
(601,'Profile','','',0,600,NULL),
(602,'Company','','',0,600,NULL),
(700,'Karyawan','Karyawan','icon-layers',1,0,2),
(701,'Daftar Karyawan','Karyawan/list','',1,700,NULL),
(702,'Absensi','Karyawan/Absensi','icon-note',1,700,NULL),
(800,'Outsorsing','Outsorsing','icon-globe',1,0,2),
(801,'Daftar Outsorsing','Outsorsing/list','',1,800,NULL),
(1000,'Laporan','Laporan','icon-book',1,0,2),
(1001,'Laporan Karyawan','Laporan/karyawan','',1,1000,NULL),
(1002,'Laporan Absensi','Laporan/Absensi','',1,1000,NULL);

/*Table structure for table `outsorsings` */

DROP TABLE IF EXISTS `outsorsings`;

CREATE TABLE `outsorsings` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `nama` varchar(50) DEFAULT NULL,
  `alamat` varchar(100) DEFAULT NULL,
  `no_telp` varchar(12) DEFAULT NULL,
  `create_at` datetime DEFAULT NULL,
  `update_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

/*Data for the table `outsorsings` */

insert  into `outsorsings`(`id`,`nama`,`alamat`,`no_telp`,`create_at`,`update_at`) values 
(1,'CV Alifa Mandiri','Cilegon ','021xx','2019-01-31 21:51:04','2019-02-02 21:57:02'),
(2,'CV. B ','Serang Damai','09891281','2019-01-31 21:55:14','2019-02-02 20:26:42');

/*Table structure for table `test_ex` */

DROP TABLE IF EXISTS `test_ex`;

CREATE TABLE `test_ex` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `no_akun` int(5) unsigned DEFAULT NULL,
  `nip` varchar(8) DEFAULT NULL,
  `nama` varchar(35) DEFAULT NULL,
  `waktu` datetime DEFAULT NULL,
  `kondisi` varchar(20) DEFAULT NULL,
  `kondisi_baru` varchar(20) DEFAULT NULL,
  `status` varchar(20) DEFAULT NULL,
  `operasi` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=40 DEFAULT CHARSET=latin1;

/*Data for the table `test_ex` */

insert  into `test_ex`(`id`,`no_akun`,`nip`,`nama`,`waktu`,`kondisi`,`kondisi_baru`,`status`,`operasi`) values 
(1,723,'5326181\r','Karyawan 1','2019-02-12 07:48:40','C/In',NULL,'Tepat',NULL),
(21,613,'','613','2019-01-20 15:15:00','C/In','Mulai Lembur','FOT',''),
(22,613,'','613','2019-01-20 20:03:00','C/In','Akhir Lembur','FOT',''),
(23,613,'','613','2019-01-23 20:26:00','C/In','','Mengulang',''),
(24,613,'','613','2019-01-23 20:26:00','C/In','','Tak Tepat',''),
(25,719,'','719','2019-01-20 16:02:00','C/In','','Tak Tepat',''),
(26,719,'','719','2019-01-20 16:12:00','C/In','','Tak Tepat',''),
(27,719,'','719','2019-01-20 16:27:00','C/In','','Tak Tepat',''),
(28,719,'','719','2019-01-20 16:37:00','C/In','Mulai Lembur','FOT',''),
(29,719,'','719','2019-01-20 19:36:00','C/In','Akhir Lembur','FOT',''),
(30,719,'','719','2019-01-23 20:22:00','C/In','','Tak Tepat',''),
(31,720,'','720','2019-01-25 18:11:00','C/In','','Tak Tepat',''),
(32,720,'','720','2019-01-27 13:02:00','C/In','','Mengulang',''),
(33,720,'','720','2019-01-27 13:02:00','C/In','','Tak Tepat',''),
(34,720,'','720','2019-01-27 13:12:00','C/In','','Tak Tepat',''),
(35,720,'','720','2019-01-27 14:26:00','C/In','','Tak Tepat',''),
(36,720,'','720','2019-01-27 15:15:00','C/In','','Tak Tepat',''),
(37,722,'','722','2019-01-27 13:34:00','C/In','','Tak Tepat',''),
(38,723,'5326181','Syarif','2019-01-27 14:34:00','C/In','','Mengulang',''),
(39,723,'5326181','Syarif','2019-01-27 14:34:00','C/Out','','Tak Tepat','');

/*Table structure for table `users` */

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(35) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL,
  `nama` varchar(35) DEFAULT NULL,
  `role` varchar(15) DEFAULT NULL,
  `picture` text,
  `create_at` datetime DEFAULT NULL,
  `update_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

/*Data for the table `users` */

insert  into `users`(`id`,`username`,`password`,`nama`,`role`,`picture`,`create_at`,`update_at`) values 
(1,'admin','21232f297a57a5a743894a0e4a801fc3','administrator','1','assets/images/user-avatar.png','2019-01-30 20:48:17','2019-02-16 22:01:19'),
(2,'staffsdm','21232f297a57a5a743894a0e4a801fc3','Staff SDM','2','assets/images/user-avatar.png','2019-01-31 20:48:22',NULL);

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
