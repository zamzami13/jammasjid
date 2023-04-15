/*
 Navicat MariaDB Data Transfer

 Source Server         : local
 Source Server Type    : MariaDB
 Source Server Version : 100607 (10.6.7-MariaDB-2ubuntu1.1)
 Source Host           : localhost:3306
 Source Schema         : jammasjid

 Target Server Type    : MariaDB
 Target Server Version : 100607 (10.6.7-MariaDB-2ubuntu1.1)
 File Encoding         : 65001

 Date: 23/10/2022 23:25:47
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for jadwal_imam
-- ----------------------------
DROP TABLE IF EXISTS `jadwal_imam`;
CREATE TABLE `jadwal_imam` (
  `jadwalimam_id` int(11) NOT NULL AUTO_INCREMENT,
  `jadwalimam_hari` varchar(255) DEFAULT NULL,
  `jadwalimam_subuh` int(11) DEFAULT NULL,
  `jadwalimam_dzuhur` int(11) DEFAULT NULL,
  `jadwalimam_ashar` int(11) DEFAULT NULL,
  `jadwalimam_maghrib` int(11) DEFAULT NULL,
  `jadwalimam_isya` int(11) DEFAULT NULL,
  PRIMARY KEY (`jadwalimam_id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb3 ROW_FORMAT=COMPACT;

-- ----------------------------
-- Records of jadwal_imam
-- ----------------------------
BEGIN;
INSERT INTO `jadwal_imam` (`jadwalimam_id`, `jadwalimam_hari`, `jadwalimam_subuh`, `jadwalimam_dzuhur`, `jadwalimam_ashar`, `jadwalimam_maghrib`, `jadwalimam_isya`) VALUES (1, 'minggu', 3, 4, 2, 5, 4);
INSERT INTO `jadwal_imam` (`jadwalimam_id`, `jadwalimam_hari`, `jadwalimam_subuh`, `jadwalimam_dzuhur`, `jadwalimam_ashar`, `jadwalimam_maghrib`, `jadwalimam_isya`) VALUES (2, 'senin', 5, 3, 2, 3, 2);
INSERT INTO `jadwal_imam` (`jadwalimam_id`, `jadwalimam_hari`, `jadwalimam_subuh`, `jadwalimam_dzuhur`, `jadwalimam_ashar`, `jadwalimam_maghrib`, `jadwalimam_isya`) VALUES (3, 'selasa', 4, 5, 6, 4, 3);
INSERT INTO `jadwal_imam` (`jadwalimam_id`, `jadwalimam_hari`, `jadwalimam_subuh`, `jadwalimam_dzuhur`, `jadwalimam_ashar`, `jadwalimam_maghrib`, `jadwalimam_isya`) VALUES (4, 'rabu', 5, 2, 5, 6, 5);
INSERT INTO `jadwal_imam` (`jadwalimam_id`, `jadwalimam_hari`, `jadwalimam_subuh`, `jadwalimam_dzuhur`, `jadwalimam_ashar`, `jadwalimam_maghrib`, `jadwalimam_isya`) VALUES (5, 'kamis', 6, 3, 6, 2, 6);
INSERT INTO `jadwal_imam` (`jadwalimam_id`, `jadwalimam_hari`, `jadwalimam_subuh`, `jadwalimam_dzuhur`, `jadwalimam_ashar`, `jadwalimam_maghrib`, `jadwalimam_isya`) VALUES (6, 'jumat', 2, 6, 4, 3, 4);
INSERT INTO `jadwal_imam` (`jadwalimam_id`, `jadwalimam_hari`, `jadwalimam_subuh`, `jadwalimam_dzuhur`, `jadwalimam_ashar`, `jadwalimam_maghrib`, `jadwalimam_isya`) VALUES (7, 'sabtu', 5, 3, 5, 2, 5);
COMMIT;

-- ----------------------------
-- Table structure for jadwal_kajian
-- ----------------------------
DROP TABLE IF EXISTS `jadwal_kajian`;
CREATE TABLE `jadwal_kajian` (
  `kajian_id` int(11) NOT NULL AUTO_INCREMENT,
  `kajian_userid` int(11) DEFAULT NULL,
  `kajian_materi` varchar(255) DEFAULT NULL,
  `kajian_tanggal` date DEFAULT NULL,
  `kajian_waktu` varchar(255) DEFAULT NULL,
  `kajian_isdelete` enum('0','1') DEFAULT '0',
  `kajian_createdate` datetime DEFAULT NULL,
  `kajian_lastupdate` datetime DEFAULT NULL,
  PRIMARY KEY (`kajian_id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8mb3 ROW_FORMAT=COMPACT;

-- ----------------------------
-- Records of jadwal_kajian
-- ----------------------------
BEGIN;
INSERT INTO `jadwal_kajian` (`kajian_id`, `kajian_userid`, `kajian_materi`, `kajian_tanggal`, `kajian_waktu`, `kajian_isdelete`, `kajian_createdate`, `kajian_lastupdate`) VALUES (1, 2, 'Adab Menuntut Ilmu', '2022-10-29', 'Ba\'da Maghrib - Selesai', '0', '2019-03-06 08:04:03', '2022-10-21 17:45:24');
INSERT INTO `jadwal_kajian` (`kajian_id`, `kajian_userid`, `kajian_materi`, `kajian_tanggal`, `kajian_waktu`, `kajian_isdelete`, `kajian_createdate`, `kajian_lastupdate`) VALUES (2, 2, 'Menjauhi Sikap Sombong', '2022-10-06', 'Ba\'da Maghib - Selesai', '1', '2019-03-06 08:05:21', '2022-10-07 10:24:10');
INSERT INTO `jadwal_kajian` (`kajian_id`, `kajian_userid`, `kajian_materi`, `kajian_tanggal`, `kajian_waktu`, `kajian_isdelete`, `kajian_createdate`, `kajian_lastupdate`) VALUES (3, 2, 'Bedah Kitab Tauhid', '2022-10-22', 'Ba\'da Maghrib - Selesai', '0', '2019-03-06 13:25:34', '2022-10-21 17:45:14');
INSERT INTO `jadwal_kajian` (`kajian_id`, `kajian_userid`, `kajian_materi`, `kajian_tanggal`, `kajian_waktu`, `kajian_isdelete`, `kajian_createdate`, `kajian_lastupdate`) VALUES (4, 2, 'Penuntut Ilmu Harus Rendah Hati', '2022-10-30', '18:30 - 19:10', '0', '2019-03-06 13:29:06', '2022-10-21 17:49:49');
INSERT INTO `jadwal_kajian` (`kajian_id`, `kajian_userid`, `kajian_materi`, `kajian_tanggal`, `kajian_waktu`, `kajian_isdelete`, `kajian_createdate`, `kajian_lastupdate`) VALUES (5, 2, 'Mengenal Dakwah Ahlussunah Wal Jamaah', '2022-11-02', '08:30 - 11:15', '0', '2019-03-06 13:29:54', '2022-10-21 17:50:00');
INSERT INTO `jadwal_kajian` (`kajian_id`, `kajian_userid`, `kajian_materi`, `kajian_tanggal`, `kajian_waktu`, `kajian_isdelete`, `kajian_createdate`, `kajian_lastupdate`) VALUES (6, 2, 'Adab Menuntut Ilmu (Lanjutan)', '2019-10-22', 'Ba\'da Maghrib - Selesai', '0', '2019-03-06 13:30:20', '2019-10-01 10:28:43');
INSERT INTO `jadwal_kajian` (`kajian_id`, `kajian_userid`, `kajian_materi`, `kajian_tanggal`, `kajian_waktu`, `kajian_isdelete`, `kajian_createdate`, `kajian_lastupdate`) VALUES (7, 2, 'Pembahasan Kitab Fiqih', '2019-10-26', 'Ba\'da Maghrib - Selesai', '0', '2019-03-06 13:30:47', '2019-10-01 10:29:01');
INSERT INTO `jadwal_kajian` (`kajian_id`, `kajian_userid`, `kajian_materi`, `kajian_tanggal`, `kajian_waktu`, `kajian_isdelete`, `kajian_createdate`, `kajian_lastupdate`) VALUES (12, 2, 'Akidah dan Adab', '2019-10-06', 'Ba\'da Dzuhur', '0', '2019-10-06 02:19:16', NULL);
INSERT INTO `jadwal_kajian` (`kajian_id`, `kajian_userid`, `kajian_materi`, `kajian_tanggal`, `kajian_waktu`, `kajian_isdelete`, `kajian_createdate`, `kajian_lastupdate`) VALUES (13, 2, 'Akidah dan Adab Lanjutan', '2019-10-06', 'Ba\'da Ashar', '0', '2019-10-06 02:19:51', NULL);
INSERT INTO `jadwal_kajian` (`kajian_id`, `kajian_userid`, `kajian_materi`, `kajian_tanggal`, `kajian_waktu`, `kajian_isdelete`, `kajian_createdate`, `kajian_lastupdate`) VALUES (17, 7, 'Menjauhi Sikap Sombong', '2022-10-25', 'Ba\'da Maghrib - Selesai', '0', '2022-10-19 16:44:04', '2022-10-21 17:45:01');
COMMIT;

-- ----------------------------
-- Table structure for konten
-- ----------------------------
DROP TABLE IF EXISTS `konten`;
CREATE TABLE `konten` (
  `konten_id` int(11) NOT NULL AUTO_INCREMENT,
  `konten_posisi` enum('1','2') DEFAULT NULL,
  `konten_arab` text DEFAULT NULL,
  `konten_teks` text DEFAULT NULL,
  `konten_masa_tayang` enum('0','1') DEFAULT '0',
  `konten_tglmulai` datetime DEFAULT NULL,
  `konten_tglselesai` datetime DEFAULT NULL,
  `konten_interval` tinyint(11) DEFAULT NULL,
  `konten_status` enum('0','1') DEFAULT '1',
  `konten_isdelete` enum('0','1') DEFAULT '0',
  `konten_createby` int(11) DEFAULT NULL,
  `konten_editedby` int(11) DEFAULT NULL,
  `konten_createdate` datetime DEFAULT NULL,
  `konten_lastupdate` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`konten_id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8mb3 ROW_FORMAT=COMPACT;

-- ----------------------------
-- Records of konten
-- ----------------------------
BEGIN;
INSERT INTO `konten` (`konten_id`, `konten_posisi`, `konten_arab`, `konten_teks`, `konten_masa_tayang`, `konten_tglmulai`, `konten_tglselesai`, `konten_interval`, `konten_status`, `konten_isdelete`, `konten_createby`, `konten_editedby`, `konten_createdate`, `konten_lastupdate`) VALUES (1, '1', NULL, '“Sebaik-baik manusia adalah yang paling bermanfaat bagi manusia.” (HR. Ahmad).', '0', NULL, NULL, 10, '1', '0', 1, 1, '2018-11-27 07:32:37', '2018-12-12 16:50:36');
INSERT INTO `konten` (`konten_id`, `konten_posisi`, `konten_arab`, `konten_teks`, `konten_masa_tayang`, `konten_tglmulai`, `konten_tglselesai`, `konten_interval`, `konten_status`, `konten_isdelete`, `konten_createby`, `konten_editedby`, `konten_createdate`, `konten_lastupdate`) VALUES (2, '1', NULL, '\"Dan mohonlah pertolongan (kepada Allah) dengan sabar dan sholat. Dan (sholat) itu sungguh berat kecuali bagi orang-orang yang khusyuk,\"\n(QS. Al-Baqarah 2: Ayat 45)', '0', NULL, NULL, 10, '0', '0', 1, 1, '2018-11-27 07:32:37', '2018-12-10 13:45:23');
INSERT INTO `konten` (`konten_id`, `konten_posisi`, `konten_arab`, `konten_teks`, `konten_masa_tayang`, `konten_tglmulai`, `konten_tglselesai`, `konten_interval`, `konten_status`, `konten_isdelete`, `konten_createby`, `konten_editedby`, `konten_createdate`, `konten_lastupdate`) VALUES (3, '2', NULL, 'masukkan informasi lainnya di menu konten', '0', NULL, NULL, NULL, '1', '0', 1, NULL, '2018-11-22 10:10:34', '2018-11-28 17:30:00');
INSERT INTO `konten` (`konten_id`, `konten_posisi`, `konten_arab`, `konten_teks`, `konten_masa_tayang`, `konten_tglmulai`, `konten_tglselesai`, `konten_interval`, `konten_status`, `konten_isdelete`, `konten_createby`, `konten_editedby`, `konten_createdate`, `konten_lastupdate`) VALUES (4, '1', 'بِسْمِ اللَّهِ الرَّحْمٰنِ الرَّحِيمِ', 'Awali setiap aktivitas dengan Basmalah', '0', NULL, NULL, NULL, '1', '0', 1, 1, '2018-11-22 10:06:07', '2018-12-10 13:43:49');
INSERT INTO `konten` (`konten_id`, `konten_posisi`, `konten_arab`, `konten_teks`, `konten_masa_tayang`, `konten_tglmulai`, `konten_tglselesai`, `konten_interval`, `konten_status`, `konten_isdelete`, `konten_createby`, `konten_editedby`, `konten_createdate`, `konten_lastupdate`) VALUES (15, '2', NULL, 'HP mohon dimode pesawat dulu', '0', NULL, NULL, NULL, '1', '0', 2, 2, '2022-10-08 07:25:41', '2022-10-15 09:40:26');
INSERT INTO `konten` (`konten_id`, `konten_posisi`, `konten_arab`, `konten_teks`, `konten_masa_tayang`, `konten_tglmulai`, `konten_tglselesai`, `konten_interval`, `konten_status`, `konten_isdelete`, `konten_createby`, `konten_editedby`, `konten_createdate`, `konten_lastupdate`) VALUES (16, '1', 'فَبِاَيِّ اٰلَاۤءِ رَبِّكُمَا تُكَذِّبٰنِ', 'Maka, nikmat Tuhanmu manakah yang kamu dustakan?', '0', NULL, NULL, NULL, '1', '1', 2, 2, '2022-10-19 06:19:44', '2022-10-19 06:45:24');
INSERT INTO `konten` (`konten_id`, `konten_posisi`, `konten_arab`, `konten_teks`, `konten_masa_tayang`, `konten_tglmulai`, `konten_tglselesai`, `konten_interval`, `konten_status`, `konten_isdelete`, `konten_createby`, `konten_editedby`, `konten_createdate`, `konten_lastupdate`) VALUES (17, '1', 'فَبِاَيِّ اٰلَاۤءِ رَبِّكُمَا تُكَذِّبٰنِ', 'Maka, nikmat Tuhanmu manakah yang kamu dustakan?', '0', NULL, NULL, NULL, '1', '0', 2, NULL, '2022-10-19 16:33:38', NULL);
COMMIT;

-- ----------------------------
-- Table structure for master_user
-- ----------------------------
DROP TABLE IF EXISTS `master_user`;
CREATE TABLE `master_user` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_foto` varchar(255) DEFAULT NULL,
  `user_uid` varchar(255) DEFAULT NULL,
  `user_password` varchar(255) DEFAULT NULL,
  `user_nama` varchar(255) DEFAULT NULL,
  `user_jk` enum('L','P') DEFAULT NULL,
  `user_level` enum('1','2','3','4') DEFAULT '4',
  `user_isdelete` enum('0','1') DEFAULT '0',
  `user_createdate` datetime DEFAULT NULL,
  `user_lastupdate` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`user_id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb3 ROW_FORMAT=COMPACT;

-- ----------------------------
-- Records of master_user
-- ----------------------------
BEGIN;
INSERT INTO `master_user` (`user_id`, `user_foto`, `user_uid`, `user_password`, `user_nama`, `user_jk`, `user_level`, `user_isdelete`, `user_createdate`, `user_lastupdate`) VALUES (1, NULL, 'system', '0ef6239a7e74cd742d1f7fa8348d9132', 'Erik Sanjaya', 'L', '1', '0', '2018-11-22 16:38:29', '2018-12-11 15:28:24');
INSERT INTO `master_user` (`user_id`, `user_foto`, `user_uid`, `user_password`, `user_nama`, `user_jk`, `user_level`, `user_isdelete`, `user_createdate`, `user_lastupdate`) VALUES (2, NULL, '1801', 'cd14821dab219ea06e2fd1a2df2e3582', 'Zakaria', 'L', '2', '0', '2018-12-12 16:22:21', '2022-10-15 09:36:56');
INSERT INTO `master_user` (`user_id`, `user_foto`, `user_uid`, `user_password`, `user_nama`, `user_jk`, `user_level`, `user_isdelete`, `user_createdate`, `user_lastupdate`) VALUES (3, NULL, '1902', 'f478d13386a6b5a47e94a5fbd6a30db7', 'Hedi', 'L', '3', '0', '2019-10-04 14:04:53', '2022-09-11 10:41:58');
INSERT INTO `master_user` (`user_id`, `user_foto`, `user_uid`, `user_password`, `user_nama`, `user_jk`, `user_level`, `user_isdelete`, `user_createdate`, `user_lastupdate`) VALUES (4, NULL, '1903', '9058de69682aa1f159de84426d4c51df', 'Yusuf', 'L', '3', '0', '2019-10-08 09:31:28', '2022-09-11 10:42:33');
INSERT INTO `master_user` (`user_id`, `user_foto`, `user_uid`, `user_password`, `user_nama`, `user_jk`, `user_level`, `user_isdelete`, `user_createdate`, `user_lastupdate`) VALUES (5, NULL, '1904', 'c91591a8d461c2869b9f535ded3e213e', 'Abu Hamzah', 'L', '3', '0', '2019-11-10 11:30:07', '2022-10-15 09:03:11');
INSERT INTO `master_user` (`user_id`, `user_foto`, `user_uid`, `user_password`, `user_nama`, `user_jk`, `user_level`, `user_isdelete`, `user_createdate`, `user_lastupdate`) VALUES (6, NULL, '2005', '827ccb0eea8a706c4c34a16891f84e7b', 'Abdullah', 'L', '3', '0', '2020-02-14 19:53:02', '2022-09-11 10:44:15');
INSERT INTO `master_user` (`user_id`, `user_foto`, `user_uid`, `user_password`, `user_nama`, `user_jk`, `user_level`, `user_isdelete`, `user_createdate`, `user_lastupdate`) VALUES (7, NULL, '2206', '202cb962ac59075b964b07152d234b70', 'Abdillah', 'L', '3', '0', '2022-10-19 16:28:03', '2022-10-19 16:28:19');
COMMIT;

-- ----------------------------
-- Table structure for petugas_shalat_jumat
-- ----------------------------
DROP TABLE IF EXISTS `petugas_shalat_jumat`;
CREATE TABLE `petugas_shalat_jumat` (
  `petugasshalatjumat_id` int(11) NOT NULL AUTO_INCREMENT,
  `petugasshalatjumat_tanggal` date DEFAULT NULL,
  `petugasshalatjumat_khatib` int(11) DEFAULT NULL,
  `petugasshalatjumat_imam` int(11) DEFAULT NULL,
  `petugasshalatjumat_muadzin_1` int(11) DEFAULT NULL,
  `petugasshalatjumat_muadzin_2` int(11) DEFAULT NULL,
  `petugasshalatjumat_isdelete` enum('0','1') DEFAULT '0',
  `petugasshalatjumat_createby` int(11) DEFAULT NULL,
  `petugasshalatjumat_createdate` datetime DEFAULT NULL,
  `petugasshalatjumat_lastupdate` datetime DEFAULT NULL,
  PRIMARY KEY (`petugasshalatjumat_id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb3 ROW_FORMAT=COMPACT;

-- ----------------------------
-- Records of petugas_shalat_jumat
-- ----------------------------
BEGIN;
INSERT INTO `petugas_shalat_jumat` (`petugasshalatjumat_id`, `petugasshalatjumat_tanggal`, `petugasshalatjumat_khatib`, `petugasshalatjumat_imam`, `petugasshalatjumat_muadzin_1`, `petugasshalatjumat_muadzin_2`, `petugasshalatjumat_isdelete`, `petugasshalatjumat_createby`, `petugasshalatjumat_createdate`, `petugasshalatjumat_lastupdate`) VALUES (1, '2019-10-25', 2, 2, 2, 2, '1', 2, '2019-03-05 20:57:57', '2022-10-18 23:01:06');
INSERT INTO `petugas_shalat_jumat` (`petugasshalatjumat_id`, `petugasshalatjumat_tanggal`, `petugasshalatjumat_khatib`, `petugasshalatjumat_imam`, `petugasshalatjumat_muadzin_1`, `petugasshalatjumat_muadzin_2`, `petugasshalatjumat_isdelete`, `petugasshalatjumat_createby`, `petugasshalatjumat_createdate`, `petugasshalatjumat_lastupdate`) VALUES (2, '2022-10-28', 6, 6, 2, 5, '1', NULL, '2019-03-06 18:47:45', '2022-10-15 09:46:28');
INSERT INTO `petugas_shalat_jumat` (`petugasshalatjumat_id`, `petugasshalatjumat_tanggal`, `petugasshalatjumat_khatib`, `petugasshalatjumat_imam`, `petugasshalatjumat_muadzin_1`, `petugasshalatjumat_muadzin_2`, `petugasshalatjumat_isdelete`, `petugasshalatjumat_createby`, `petugasshalatjumat_createdate`, `petugasshalatjumat_lastupdate`) VALUES (3, NULL, 2, 5, 5, 5, '1', 2, '2019-09-29 11:05:51', '2019-09-29 11:18:18');
INSERT INTO `petugas_shalat_jumat` (`petugasshalatjumat_id`, `petugasshalatjumat_tanggal`, `petugasshalatjumat_khatib`, `petugasshalatjumat_imam`, `petugasshalatjumat_muadzin_1`, `petugasshalatjumat_muadzin_2`, `petugasshalatjumat_isdelete`, `petugasshalatjumat_createby`, `petugasshalatjumat_createdate`, `petugasshalatjumat_lastupdate`) VALUES (4, NULL, 2, 3, 2, 2, '1', 2, '2019-09-29 11:18:37', NULL);
INSERT INTO `petugas_shalat_jumat` (`petugasshalatjumat_id`, `petugasshalatjumat_tanggal`, `petugasshalatjumat_khatib`, `petugasshalatjumat_imam`, `petugasshalatjumat_muadzin_1`, `petugasshalatjumat_muadzin_2`, `petugasshalatjumat_isdelete`, `petugasshalatjumat_createby`, `petugasshalatjumat_createdate`, `petugasshalatjumat_lastupdate`) VALUES (5, NULL, 3, 5, 3, 3, '1', 2, '2019-09-29 11:30:11', NULL);
INSERT INTO `petugas_shalat_jumat` (`petugasshalatjumat_id`, `petugasshalatjumat_tanggal`, `petugasshalatjumat_khatib`, `petugasshalatjumat_imam`, `petugasshalatjumat_muadzin_1`, `petugasshalatjumat_muadzin_2`, `petugasshalatjumat_isdelete`, `petugasshalatjumat_createby`, `petugasshalatjumat_createdate`, `petugasshalatjumat_lastupdate`) VALUES (6, NULL, 3, 5, 3, 3, '1', 2, '2019-09-29 11:31:30', NULL);
INSERT INTO `petugas_shalat_jumat` (`petugasshalatjumat_id`, `petugasshalatjumat_tanggal`, `petugasshalatjumat_khatib`, `petugasshalatjumat_imam`, `petugasshalatjumat_muadzin_1`, `petugasshalatjumat_muadzin_2`, `petugasshalatjumat_isdelete`, `petugasshalatjumat_createby`, `petugasshalatjumat_createdate`, `petugasshalatjumat_lastupdate`) VALUES (7, '2022-11-04', 5, 5, 3, 4, '1', 2, '2019-09-29 11:33:43', '2022-10-15 09:47:32');
INSERT INTO `petugas_shalat_jumat` (`petugasshalatjumat_id`, `petugasshalatjumat_tanggal`, `petugasshalatjumat_khatib`, `petugasshalatjumat_imam`, `petugasshalatjumat_muadzin_1`, `petugasshalatjumat_muadzin_2`, `petugasshalatjumat_isdelete`, `petugasshalatjumat_createby`, `petugasshalatjumat_createdate`, `petugasshalatjumat_lastupdate`) VALUES (8, '2022-10-21', 3, 3, 6, NULL, '1', 2, '2019-09-29 11:34:45', '2022-10-15 09:48:03');
INSERT INTO `petugas_shalat_jumat` (`petugasshalatjumat_id`, `petugasshalatjumat_tanggal`, `petugasshalatjumat_khatib`, `petugasshalatjumat_imam`, `petugasshalatjumat_muadzin_1`, `petugasshalatjumat_muadzin_2`, `petugasshalatjumat_isdelete`, `petugasshalatjumat_createby`, `petugasshalatjumat_createdate`, `petugasshalatjumat_lastupdate`) VALUES (9, '2022-10-21', 6, 6, 2, NULL, '0', 2, '2022-10-19 16:37:15', NULL);
INSERT INTO `petugas_shalat_jumat` (`petugasshalatjumat_id`, `petugasshalatjumat_tanggal`, `petugasshalatjumat_khatib`, `petugasshalatjumat_imam`, `petugasshalatjumat_muadzin_1`, `petugasshalatjumat_muadzin_2`, `petugasshalatjumat_isdelete`, `petugasshalatjumat_createby`, `petugasshalatjumat_createdate`, `petugasshalatjumat_lastupdate`) VALUES (10, '2022-10-28', 7, 7, 3, 5, '0', 2, '2022-10-19 16:37:39', NULL);
COMMIT;

-- ----------------------------
-- Table structure for set_background
-- ----------------------------
DROP TABLE IF EXISTS `set_background`;
CREATE TABLE `set_background` (
  `background_id` int(11) NOT NULL AUTO_INCREMENT,
  `background_tipe` enum('picture','video') DEFAULT NULL,
  `background_file` text DEFAULT NULL,
  `background_createby` int(11) DEFAULT NULL,
  `background_status` enum('0','1') DEFAULT '1',
  `background_isdelete` enum('0','1') DEFAULT '0',
  `background_createdate` datetime DEFAULT NULL,
  PRIMARY KEY (`background_id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=utf8mb3 ROW_FORMAT=COMPACT;

-- ----------------------------
-- Records of set_background
-- ----------------------------
BEGIN;
INSERT INTO `set_background` (`background_id`, `background_tipe`, `background_file`, `background_createby`, `background_status`, `background_isdelete`, `background_createdate`) VALUES (15, 'picture', 'sunrise-g7b08f7ddb_1920.jpg', 2, '0', '0', '2022-10-07 14:39:55');
INSERT INTO `set_background` (`background_id`, `background_tipe`, `background_file`, `background_createby`, `background_status`, `background_isdelete`, `background_createdate`) VALUES (21, 'video', 'Cosmos_-_14244.mp4', 2, '1', '0', '2022-10-08 13:07:34');
INSERT INTO `set_background` (`background_id`, `background_tipe`, `background_file`, `background_createby`, `background_status`, `background_isdelete`, `background_createdate`) VALUES (23, 'picture', 'aurora.jpg', 2, '1', '0', '2022-10-19 17:10:39');
INSERT INTO `set_background` (`background_id`, `background_tipe`, `background_file`, `background_createby`, `background_status`, `background_isdelete`, `background_createdate`) VALUES (24, 'video', 'sea.mp4', 2, '0', '0', '2022-10-19 17:11:11');
COMMIT;

-- ----------------------------
-- Table structure for set_font
-- ----------------------------
DROP TABLE IF EXISTS `set_font`;
CREATE TABLE `set_font` (
  `font_id` int(11) NOT NULL AUTO_INCREMENT,
  `font_src` varchar(255) DEFAULT NULL,
  `font_nama` varchar(255) DEFAULT NULL,
  `font_family` varchar(255) DEFAULT NULL,
  `font_style` varchar(255) DEFAULT NULL,
  `font_weight` double DEFAULT NULL,
  `font_status` enum('0','1') DEFAULT '1',
  `font_isdelete` enum('0','1') DEFAULT '0',
  `font_createdate` datetime DEFAULT NULL,
  `font_lastupdate` datetime DEFAULT NULL,
  PRIMARY KEY (`font_id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb3 ROW_FORMAT=COMPACT;

-- ----------------------------
-- Records of set_font
-- ----------------------------
BEGIN;
INSERT INTO `set_font` (`font_id`, `font_src`, `font_nama`, `font_family`, `font_style`, `font_weight`, `font_status`, `font_isdelete`, `font_createdate`, `font_lastupdate`) VALUES (2, 'Product_Sans_Bold.ttf', 'Product Sans Bold.ttf', 'Products Sans', 'Bold', 400, '0', '0', '2019-03-06 22:27:19', '2019-11-06 13:55:14');
INSERT INTO `set_font` (`font_id`, `font_src`, `font_nama`, `font_family`, `font_style`, `font_weight`, `font_status`, `font_isdelete`, `font_createdate`, `font_lastupdate`) VALUES (3, 'ShadowsIntoLight.ttf', 'ShadowsIntoLight.ttf', 'Shadows Into Light', 'Bold', 400, '0', '0', '2019-03-06 22:48:22', '2019-03-06 23:10:44');
INSERT INTO `set_font` (`font_id`, `font_src`, `font_nama`, `font_family`, `font_style`, `font_weight`, `font_status`, `font_isdelete`, `font_createdate`, `font_lastupdate`) VALUES (5, NULL, 'Ubuntu', 'Ubuntu', 'Bold', 400, '0', '0', '2019-03-07 05:58:57', NULL);
INSERT INTO `set_font` (`font_id`, `font_src`, `font_nama`, `font_family`, `font_style`, `font_weight`, `font_status`, `font_isdelete`, `font_createdate`, `font_lastupdate`) VALUES (6, 'Nunito-VariableFont_wght.ttf', 'Nunito-VariableFont_wght.ttf', 'Nunito', 'Bold', 700, '1', '0', '2022-10-07 17:16:10', '2022-10-07 18:03:57');
INSERT INTO `set_font` (`font_id`, `font_src`, `font_nama`, `font_family`, `font_style`, `font_weight`, `font_status`, `font_isdelete`, `font_createdate`, `font_lastupdate`) VALUES (7, 'Comfortaa-VariableFont_wght.ttf', 'Comfortaa-VariableFont_wght.ttf', 'Comfortaa', 'Bold', 600, '0', '0', '2022-10-07 17:17:28', NULL);
INSERT INTO `set_font` (`font_id`, `font_src`, `font_nama`, `font_family`, `font_style`, `font_weight`, `font_status`, `font_isdelete`, `font_createdate`, `font_lastupdate`) VALUES (8, 'Quicksand-VariableFont_wght.ttf', 'Quicksand-VariableFont_wght.ttf', 'Quicksand', 'Bold', 600, '0', '0', '2022-10-07 17:18:05', NULL);
INSERT INTO `set_font` (`font_id`, `font_src`, `font_nama`, `font_family`, `font_style`, `font_weight`, `font_status`, `font_isdelete`, `font_createdate`, `font_lastupdate`) VALUES (9, 'FredokaOne-Regular.ttf', 'FredokaOne-Regular.ttf', 'Fredoka one', 'Bold', 400, '0', '0', '2022-10-19 17:30:35', NULL);
COMMIT;

-- ----------------------------
-- Table structure for set_general
-- ----------------------------
DROP TABLE IF EXISTS `set_general`;
CREATE TABLE `set_general` (
  `general_id` int(11) NOT NULL AUTO_INCREMENT,
  `general_nama` varchar(255) DEFAULT NULL,
  `general_status` enum('0','1') DEFAULT '0',
  `general_keterangan` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`general_id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb3 ROW_FORMAT=COMPACT;

-- ----------------------------
-- Records of set_general
-- ----------------------------
BEGIN;
INSERT INTO `set_general` (`general_id`, `general_nama`, `general_status`, `general_keterangan`) VALUES (1, 'Background', '0', NULL);
INSERT INTO `set_general` (`general_id`, `general_nama`, `general_status`, `general_keterangan`) VALUES (2, 'Black Screen', '0', 'Menjadikan layar TV Gelap');
INSERT INTO `set_general` (`general_id`, `general_nama`, `general_status`, `general_keterangan`) VALUES (3, 'Reload Page', '1', 'Muat ulang halaman');
INSERT INTO `set_general` (`general_id`, `general_nama`, `general_status`, `general_keterangan`) VALUES (7, 'Auto Shutdown', '0', NULL);
COMMIT;

-- ----------------------------
-- Table structure for set_masjid
-- ----------------------------
DROP TABLE IF EXISTS `set_masjid`;
CREATE TABLE `set_masjid` (
  `masjid_id` int(11) NOT NULL AUTO_INCREMENT,
  `invoice` varchar(100) DEFAULT NULL,
  `sn_hit` int(11) DEFAULT NULL,
  `sd_hit` int(11) DEFAULT NULL,
  `data` text DEFAULT NULL,
  `masjid_tema` tinyint(4) DEFAULT NULL,
  `masjid_nama` varchar(255) DEFAULT NULL,
  `masjid_nama_sub` varchar(255) DEFAULT NULL,
  `masjid_alamat` text DEFAULT NULL,
  `masjid_updateby` int(11) DEFAULT NULL,
  `masjid_createdate` datetime DEFAULT NULL,
  `masjid_lastupdate` datetime DEFAULT NULL,
  PRIMARY KEY (`masjid_id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb3 ROW_FORMAT=COMPACT;

-- ----------------------------
-- Records of set_masjid
-- ----------------------------
BEGIN;
INSERT INTO `set_masjid` (`masjid_id`, `invoice`, `sn_hit`, `sd_hit`, `data`, `masjid_tema`, `masjid_nama`, `masjid_nama_sub`, `masjid_alamat`, `masjid_updateby`, `masjid_createdate`, `masjid_lastupdate`) VALUES (1, NULL, NULL, NULL, NULL, 0, 'Masjid At Taqwa', NULL, 'Kp. Cimuncang, Rt 13 / Rw 01', 1, '2018-11-22 09:15:08', '2022-10-04 08:12:47');
COMMIT;

-- ----------------------------
-- Table structure for set_perhitungan_waktu_shalat
-- ----------------------------
DROP TABLE IF EXISTS `set_perhitungan_waktu_shalat`;
CREATE TABLE `set_perhitungan_waktu_shalat` (
  `waktushalat_id` int(11) NOT NULL AUTO_INCREMENT,
  `waktushalat_timezone_set` varchar(255) DEFAULT 'Asia/Jakarta',
  `waktushalat_latitude` varchar(255) DEFAULT NULL,
  `waktushalat_longitude` varchar(255) DEFAULT NULL,
  `waktushalat_ketinggian_laut` varchar(255) DEFAULT NULL,
  `waktushalat_sudut_fajar_senja` varchar(255) DEFAULT NULL,
  `waktushalat_sudut_malam_senja` varchar(255) DEFAULT NULL,
  `waktushalat_time_zone` int(11) DEFAULT NULL,
  `waktushalat_mazhab` enum('1','2') DEFAULT NULL,
  `waktushalat_updateby` int(11) DEFAULT NULL,
  PRIMARY KEY (`waktushalat_id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb3 ROW_FORMAT=COMPACT;

-- ----------------------------
-- Records of set_perhitungan_waktu_shalat
-- ----------------------------
BEGIN;
INSERT INTO `set_perhitungan_waktu_shalat` (`waktushalat_id`, `waktushalat_timezone_set`, `waktushalat_latitude`, `waktushalat_longitude`, `waktushalat_ketinggian_laut`, `waktushalat_sudut_fajar_senja`, `waktushalat_sudut_malam_senja`, `waktushalat_time_zone`, `waktushalat_mazhab`, `waktushalat_updateby`) VALUES (1, 'Asia/Jakarta', '1.4479055', '109.2379534', '0', '19.5', '18.5', 7, '1', NULL);
COMMIT;

-- ----------------------------
-- Table structure for set_perwaktu_shalat
-- ----------------------------
DROP TABLE IF EXISTS `set_perwaktu_shalat`;
CREATE TABLE `set_perwaktu_shalat` (
  `perwaktushalat_id` int(11) NOT NULL AUTO_INCREMENT,
  `perwaktushalat_nama` varchar(255) DEFAULT NULL,
  `perwaktushalat_jeda_iqomah` int(11) DEFAULT NULL COMMENT 'menit',
  `perwaktushalat_jeda_layar_mati` int(11) DEFAULT NULL,
  `perwaktushalat_penyesuaian` varchar(255) DEFAULT NULL,
  `perwaktushalat_konten` text DEFAULT NULL COMMENT 'konten setelah adzan (array json)',
  `perwaktushalat_kontenid` int(11) DEFAULT NULL COMMENT 'konten setelah adzan (ambil dari konten)',
  PRIMARY KEY (`perwaktushalat_id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb3 ROW_FORMAT=COMPACT;

-- ----------------------------
-- Records of set_perwaktu_shalat
-- ----------------------------
BEGIN;
INSERT INTO `set_perwaktu_shalat` (`perwaktushalat_id`, `perwaktushalat_nama`, `perwaktushalat_jeda_iqomah`, `perwaktushalat_jeda_layar_mati`, `perwaktushalat_penyesuaian`, `perwaktushalat_konten`, `perwaktushalat_kontenid`) VALUES (1, 'Subuh', 10, 5, '2', NULL, NULL);
INSERT INTO `set_perwaktu_shalat` (`perwaktushalat_id`, `perwaktushalat_nama`, `perwaktushalat_jeda_iqomah`, `perwaktushalat_jeda_layar_mati`, `perwaktushalat_penyesuaian`, `perwaktushalat_konten`, `perwaktushalat_kontenid`) VALUES (2, 'Dzuhur', 10, 5, '0', NULL, NULL);
INSERT INTO `set_perwaktu_shalat` (`perwaktushalat_id`, `perwaktushalat_nama`, `perwaktushalat_jeda_iqomah`, `perwaktushalat_jeda_layar_mati`, `perwaktushalat_penyesuaian`, `perwaktushalat_konten`, `perwaktushalat_kontenid`) VALUES (3, 'Ashar', 10, 5, '0', NULL, NULL);
INSERT INTO `set_perwaktu_shalat` (`perwaktushalat_id`, `perwaktushalat_nama`, `perwaktushalat_jeda_iqomah`, `perwaktushalat_jeda_layar_mati`, `perwaktushalat_penyesuaian`, `perwaktushalat_konten`, `perwaktushalat_kontenid`) VALUES (4, 'Maghrib', 10, 5, '0', NULL, NULL);
INSERT INTO `set_perwaktu_shalat` (`perwaktushalat_id`, `perwaktushalat_nama`, `perwaktushalat_jeda_iqomah`, `perwaktushalat_jeda_layar_mati`, `perwaktushalat_penyesuaian`, `perwaktushalat_konten`, `perwaktushalat_kontenid`) VALUES (5, 'Isya', 10, 5, '0', NULL, NULL);
INSERT INTO `set_perwaktu_shalat` (`perwaktushalat_id`, `perwaktushalat_nama`, `perwaktushalat_jeda_iqomah`, `perwaktushalat_jeda_layar_mati`, `perwaktushalat_penyesuaian`, `perwaktushalat_konten`, `perwaktushalat_kontenid`) VALUES (6, 'Jumat', NULL, 30, '0', NULL, NULL);
INSERT INTO `set_perwaktu_shalat` (`perwaktushalat_id`, `perwaktushalat_nama`, `perwaktushalat_jeda_iqomah`, `perwaktushalat_jeda_layar_mati`, `perwaktushalat_penyesuaian`, `perwaktushalat_konten`, `perwaktushalat_kontenid`) VALUES (7, 'Terbit', NULL, NULL, '0', NULL, NULL);
INSERT INTO `set_perwaktu_shalat` (`perwaktushalat_id`, `perwaktushalat_nama`, `perwaktushalat_jeda_iqomah`, `perwaktushalat_jeda_layar_mati`, `perwaktushalat_penyesuaian`, `perwaktushalat_konten`, `perwaktushalat_kontenid`) VALUES (8, 'Hijriah', NULL, NULL, '1', NULL, NULL);
COMMIT;

-- ----------------------------
-- Table structure for set_reload
-- ----------------------------
DROP TABLE IF EXISTS `set_reload`;
CREATE TABLE `set_reload` (
  `reload_id` int(11) NOT NULL AUTO_INCREMENT,
  `reload_status` enum('0','1') DEFAULT '0',
  PRIMARY KEY (`reload_id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb3 ROW_FORMAT=COMPACT;

-- ----------------------------
-- Records of set_reload
-- ----------------------------
BEGIN;
INSERT INTO `set_reload` (`reload_id`, `reload_status`) VALUES (1, '0');
COMMIT;

SET FOREIGN_KEY_CHECKS = 1;
