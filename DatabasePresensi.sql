/*
SQLyog Community v13.1.6 (64 bit)
MySQL - 10.4.25-MariaDB : Database - absensi
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`absensi` /*!40100 DEFAULT CHARACTER SET utf8mb4 */;

USE `absensi`;

/*Table structure for table `absensi` */

DROP TABLE IF EXISTS `absensi`;

CREATE TABLE `absensi` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nik` char(10) NOT NULL,
  `nama_lengkap` char(30) NOT NULL,
  `tgl_presensi` date NOT NULL,
  `jam_in` time NOT NULL,
  `jam_out` time DEFAULT NULL,
  `foto_in` varchar(255) NOT NULL,
  `foto_out` varchar(255) DEFAULT NULL,
  `lokasi_in` varchar(255) DEFAULT NULL,
  `lokasi_out` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=122 DEFAULT CHARSET=utf8mb4;

/*Data for the table `absensi` */

insert  into `absensi`(`id`,`nik`,`nama_lengkap`,`tgl_presensi`,`jam_in`,`jam_out`,`foto_in`,`foto_out`,`lokasi_in`,`lokasi_out`) values 
(118,'123456','hehe','2023-03-25','00:45:59','00:46:19','123456-2023-03-25-in.png','123456-2023-03-25-out.png','-7.5044321,110.7658867','-7.5044321,110.7658867'),
(119,'123456','hehe','2023-03-30','14:13:25','14:13:47','123456-2023-03-30-in.png','123456-2023-03-30-out.png','-6.219574,107.0657549','-6.219574,107.0657549'),
(121,'123456','hehe','2023-04-01','18:02:22','18:02:35','123456-2023-04-01-in.png','123456-2023-04-01-out.png','-7.8379704,110.3175409','-7.8379704,110.3175409');

/*Table structure for table `admin` */

DROP TABLE IF EXISTS `admin`;

CREATE TABLE `admin` (
  `nik` char(20) NOT NULL,
  `nama_lengkap` varchar(40) NOT NULL,
  `jabatan` varchar(25) NOT NULL,
  `no_hp` varchar(13) NOT NULL,
  `password` varchar(255) NOT NULL,
  `alamat` varchar(70) NOT NULL,
  `remember_token` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`nik`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*Data for the table `admin` */

insert  into `admin`(`nik`,`nama_lengkap`,`jabatan`,`no_hp`,`password`,`alamat`,`remember_token`) values 
('1234567','udin','kepala cabang','988988989','$2y$10$FaIok4d7EnNi81Mer/C.5eFas1EtTmf1zMBcc/7Rov67qoqBug13W','suradita',NULL);

/*Table structure for table `barang` */

DROP TABLE IF EXISTS `barang`;

CREATE TABLE `barang` (
  `nomorbarang` int(30) NOT NULL AUTO_INCREMENT,
  `namabarang` varchar(30) DEFAULT NULL,
  `noruangan` int(30) DEFAULT NULL,
  PRIMARY KEY (`nomorbarang`),
  KEY `noruangan` (`noruangan`),
  CONSTRAINT `barang_ibfk_1` FOREIGN KEY (`noruangan`) REFERENCES `ruangan` (`noruangan`)
) ENGINE=InnoDB AUTO_INCREMENT=36 DEFAULT CHARSET=utf8mb4;

/*Data for the table `barang` */

insert  into `barang`(`nomorbarang`,`namabarang`,`noruangan`) values 
(23,'ucok',1661127576),
(24,'yahas',1661127576),
(25,'apel',1661127576),
(27,'tykjdkjas',1661127576),
(31,'jvnvvnvbv',1661127576),
(32,'mencobakembali',1267634005),
(33,'hehe',1267634005),
(35,'raszx',1661127576);

/*Table structure for table `failed_jobs` */

DROP TABLE IF EXISTS `failed_jobs`;

CREATE TABLE `failed_jobs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `failed_jobs` */

/*Table structure for table `karyawan` */

DROP TABLE IF EXISTS `karyawan`;

CREATE TABLE `karyawan` (
  `nik` varchar(50) NOT NULL,
  `nama_lengkap` varchar(90) NOT NULL,
  `tanggallahir` date NOT NULL,
  `jenis_kelamin` enum('laki-laki','perempuan') NOT NULL,
  `jabatan` varchar(25) NOT NULL,
  `no_hp` varchar(13) NOT NULL,
  `password` varchar(255) DEFAULT NULL,
  `alamat` varchar(70) NOT NULL,
  `foto` varchar(255) DEFAULT NULL,
  `remember_token` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`nik`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*Data for the table `karyawan` */

insert  into `karyawan`(`nik`,`nama_lengkap`,`tanggallahir`,`jenis_kelamin`,`jabatan`,`no_hp`,`password`,`alamat`,`foto`,`remember_token`) values 
('123456','hehe','2023-03-21','laki-laki','supervisor','89076','$2y$10$WLZcGfkqmN5mLJE3o3sN4eaT.W2d9PSPaUkjQ2QCgoeVJwE2SYsg.','serpong','123456.png',NULL),
('1815919601','pak prasetyo','1993-06-29','laki-laki','direktur','0858414788987','$2y$10$nJbFafwf1h5nYIvJpO08EevI18MsmIJ6zjQ2QVt4hV88.tte4kAji','jogja',NULL,NULL),
('2001405441','ucok','2023-03-15','laki-laki','supervisor','12312312','$2y$10$gnoMKkn1Er7lGprHylPpmeqlVwt4UZMNn0rJnTYyAUYLYuyhWkW2.','bangkok',NULL,NULL),
('419272041','mencoba','2023-03-13','perempuan','manager','085854632345','$2y$10$hmoHDsWCdtyD2eMx2VAHSuo7b3Ucle86l5qhN9gkmwL2QmE4qG6LG','bangkok','419272041.png',NULL),
('70965537','mencoba','2023-03-21','perempuan','manager','123456','$2y$10$9bRSA0wySrPzey5XJYZ4weD8Gjxl4THgMRryhSZJnmvkh5rVclQXe','serpong','70965537.png',NULL);

/*Table structure for table `migrations` */

DROP TABLE IF EXISTS `migrations`;

CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `migrations` */

insert  into `migrations`(`id`,`migration`,`batch`) values 
(1,'2014_10_12_000000_create_users_table',1),
(2,'2014_10_12_100000_create_password_resets_table',1),
(3,'2019_08_19_000000_create_failed_jobs_table',1),
(4,'2019_12_14_000001_create_personal_access_tokens_table',1);

/*Table structure for table `password_resets` */

DROP TABLE IF EXISTS `password_resets`;

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `password_resets` */

/*Table structure for table `pengajuanizin` */

DROP TABLE IF EXISTS `pengajuanizin`;

CREATE TABLE `pengajuanizin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nik` varchar(90) NOT NULL,
  `nama_lengkap` varchar(90) NOT NULL,
  `izinawal` date NOT NULL,
  `izinakhir` date NOT NULL,
  `surat` varchar(255) DEFAULT NULL,
  `keterangan` varchar(255) DEFAULT NULL,
  `status_persetujuan` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=utf8mb4;

/*Data for the table `pengajuanizin` */

insert  into `pengajuanizin`(`id`,`nik`,`nama_lengkap`,`izinawal`,`izinakhir`,`surat`,`keterangan`,`status_persetujuan`) values 
(23,'123456','hehe','2023-03-22','2023-03-24','123456-sakit.png','sakit',NULL),
(25,'123456','hehe','2023-03-22','2023-03-23','123456-acara_keluarga.pdf','acara_keluarga','disetujui'),
(26,'123456','hehe','2023-03-15','2023-03-17','123456-acara_keluarga.pdf','acara_keluarga',NULL);

/*Table structure for table `personal_access_tokens` */

DROP TABLE IF EXISTS `personal_access_tokens`;

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `personal_access_tokens` */

/*Table structure for table `ruangan` */

DROP TABLE IF EXISTS `ruangan`;

CREATE TABLE `ruangan` (
  `noruangan` int(11) NOT NULL AUTO_INCREMENT,
  `namaruangan` varchar(50) NOT NULL,
  `fungsiruangan` varchar(60) NOT NULL,
  `status` enum('aktif','tidakaktif') DEFAULT NULL,
  `penanggungjawab` varchar(90) NOT NULL,
  PRIMARY KEY (`noruangan`)
) ENGINE=InnoDB AUTO_INCREMENT=1661127577 DEFAULT CHARSET=utf8mb4;

/*Data for the table `ruangan` */

insert  into `ruangan`(`noruangan`,`namaruangan`,`fungsiruangan`,`status`,`penanggungjawab`) values 
(457247502,'azza','buatnsimpanmeja','aktif','xxss'),
(1267634005,'barucoba','meyimpanngepet','aktif','wahyu'),
(1661127576,'yuhu','hehe','aktif','Dr.Achmad Sachroni, Sp.id');

/*Table structure for table `users` */

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `users` */

insert  into `users`(`id`,`name`,`email`,`email_verified_at`,`password`,`remember_token`,`created_at`,`updated_at`) values 
(1,'hafiz','hafiz35crv@gmail.com',NULL,'$2y$10$FaIok4d7EnNi81Mer/C.5eFas1EtTmf1zMBcc/7Rov67qoqBug13W',NULL,NULL,NULL);

/*Table structure for table `itungbulan` */

DROP TABLE IF EXISTS `itungbulan`;

/*!50001 DROP VIEW IF EXISTS `itungbulan` */;
/*!50001 DROP TABLE IF EXISTS `itungbulan` */;

/*!50001 CREATE TABLE  `itungbulan`(
 `id` int(11) ,
 `nik` char(10) ,
 `nama_lengkap` char(30) ,
 `tgl_presensi` date ,
 `jam_in` time ,
 `jam_out` time ,
 `foto_in` varchar(255) ,
 `foto_out` varchar(255) ,
 `lokasi_in` varchar(255) ,
 `lokasi_out` varchar(255) ,
 `jumlahjamkerja` time ,
 `bulan` int(2) 
)*/;

/*Table structure for table `selisihcuti` */

DROP TABLE IF EXISTS `selisihcuti`;

/*!50001 DROP VIEW IF EXISTS `selisihcuti` */;
/*!50001 DROP TABLE IF EXISTS `selisihcuti` */;

/*!50001 CREATE TABLE  `selisihcuti`(
 `id` int(11) ,
 `nik` varchar(90) ,
 `nama_lengkap` varchar(90) ,
 `izinawal` date ,
 `izinakhir` date ,
 `totalcutidiajukan` int(8) ,
 `surat` varchar(255) ,
 `keterangan` varchar(255) ,
 `status_persetujuan` varchar(200) 
)*/;

/*Table structure for table `viewtampildata` */

DROP TABLE IF EXISTS `viewtampildata`;

/*!50001 DROP VIEW IF EXISTS `viewtampildata` */;
/*!50001 DROP TABLE IF EXISTS `viewtampildata` */;

/*!50001 CREATE TABLE  `viewtampildata`(
 `id` int(11) ,
 `nik` char(10) ,
 `nama_lengkap` char(30) ,
 `tgl_presensi` date ,
 `jam_in` time ,
 `jam_out` time ,
 `foto_in` varchar(255) ,
 `foto_out` varchar(255) ,
 `lokasi_in` varchar(255) ,
 `lokasi_out` varchar(255) ,
 `jumlahjamkerja` time 
)*/;

/*View structure for view itungbulan */

/*!50001 DROP TABLE IF EXISTS `itungbulan` */;
/*!50001 DROP VIEW IF EXISTS `itungbulan` */;

/*!50001 CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `itungbulan` AS (select `viewtampildata`.`id` AS `id`,`viewtampildata`.`nik` AS `nik`,`viewtampildata`.`nama_lengkap` AS `nama_lengkap`,`viewtampildata`.`tgl_presensi` AS `tgl_presensi`,`viewtampildata`.`jam_in` AS `jam_in`,`viewtampildata`.`jam_out` AS `jam_out`,`viewtampildata`.`foto_in` AS `foto_in`,`viewtampildata`.`foto_out` AS `foto_out`,`viewtampildata`.`lokasi_in` AS `lokasi_in`,`viewtampildata`.`lokasi_out` AS `lokasi_out`,`viewtampildata`.`jumlahjamkerja` AS `jumlahjamkerja`,month(`viewtampildata`.`tgl_presensi`) AS `bulan` from `viewtampildata`) */;

/*View structure for view selisihcuti */

/*!50001 DROP TABLE IF EXISTS `selisihcuti` */;
/*!50001 DROP VIEW IF EXISTS `selisihcuti` */;

/*!50001 CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `selisihcuti` AS (select `pengajuanizin`.`id` AS `id`,`pengajuanizin`.`nik` AS `nik`,`pengajuanizin`.`nama_lengkap` AS `nama_lengkap`,`pengajuanizin`.`izinawal` AS `izinawal`,`pengajuanizin`.`izinakhir` AS `izinakhir`,to_days(`pengajuanizin`.`izinakhir`) - to_days(`pengajuanizin`.`izinawal`) + 1 AS `totalcutidiajukan`,`pengajuanizin`.`surat` AS `surat`,`pengajuanizin`.`keterangan` AS `keterangan`,`pengajuanizin`.`status_persetujuan` AS `status_persetujuan` from `pengajuanizin`) */;

/*View structure for view viewtampildata */

/*!50001 DROP TABLE IF EXISTS `viewtampildata` */;
/*!50001 DROP VIEW IF EXISTS `viewtampildata` */;

/*!50001 CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `viewtampildata` AS (select `absensi`.`id` AS `id`,`absensi`.`nik` AS `nik`,`absensi`.`nama_lengkap` AS `nama_lengkap`,`absensi`.`tgl_presensi` AS `tgl_presensi`,`absensi`.`jam_in` AS `jam_in`,`absensi`.`jam_out` AS `jam_out`,`absensi`.`foto_in` AS `foto_in`,`absensi`.`foto_out` AS `foto_out`,`absensi`.`lokasi_in` AS `lokasi_in`,`absensi`.`lokasi_out` AS `lokasi_out`,timediff(`absensi`.`jam_out`,`absensi`.`jam_in`) AS `jumlahjamkerja` from `absensi`) */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
