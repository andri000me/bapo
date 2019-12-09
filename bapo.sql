-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               5.7.28-0ubuntu0.18.04.4 - (Ubuntu)
-- Server OS:                    Linux
-- HeidiSQL Version:             10.2.0.5599
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

-- Dumping structure for table sap.absensi
CREATE TABLE IF NOT EXISTS `absensi` (
  `id_absensi` varchar(50) NOT NULL,
  `kd_mata_kuliah` varchar(50) NOT NULL,
  `npm` text NOT NULL,
  `w1` text NOT NULL,
  `w2` text NOT NULL,
  `w3` text NOT NULL,
  `w4` text NOT NULL,
  `w5` text NOT NULL,
  `w6` text NOT NULL,
  `w7` text NOT NULL,
  `w8` text NOT NULL,
  `w9` text NOT NULL,
  `w10` text NOT NULL,
  `w11` text NOT NULL,
  `w12` text NOT NULL,
  `w13` text NOT NULL,
  `w14` text NOT NULL,
  `w15` text NOT NULL,
  `w16` text NOT NULL,
  `total_hadir` text NOT NULL,
  `total_tidak_hadir` text NOT NULL,
  `sign` int(5) NOT NULL,
  PRIMARY KEY (`id_absensi`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- Dumping data for table sap.absensi: 2 rows
/*!40000 ALTER TABLE `absensi` DISABLE KEYS */;
INSERT INTO `absensi` (`id_absensi`, `kd_mata_kuliah`, `npm`, `w1`, `w2`, `w3`, `w4`, `w5`, `w6`, `w7`, `w8`, `w9`, `w10`, `w11`, `w12`, `w13`, `w14`, `w15`, `w16`, `total_hadir`, `total_tidak_hadir`, `sign`) VALUES
	('05-CRIPTO-6-TEORI-1', '05-CRIPTO', '1402012001, 1402012002, ', '1402012001-1, 1402012002-1, ', '1402012001-1, 1402012002-1, ', '1402012001-1, 1402012002-1, ', '1402012001-1, ', '', '', '', '', '', '', '', '', '', '', '', '', '7', '-1', 0),
	('05-CRIPTO-6-PRAKTIKUM-1', '05-CRIPTO', '1402012001, 1402012002, ', '1402012001-1, 1402012002-1, ', '1402012001-1, ', '1402012001-1, 1402012002-1, ', '', '', '', '', '', '', '', '', '', '', '', '', '', '5', '0', 0);
/*!40000 ALTER TABLE `absensi` ENABLE KEYS */;

-- Dumping structure for table sap.admin_groups
CREATE TABLE IF NOT EXISTS `admin_groups` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(20) NOT NULL,
  `description` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- Dumping data for table sap.admin_groups: ~4 rows (approximately)
/*!40000 ALTER TABLE `admin_groups` DISABLE KEYS */;
INSERT INTO `admin_groups` (`id`, `name`, `description`) VALUES
	(1, 'webmaster', 'Webmaster'),
	(2, 'admin', 'Administrator'),
	(3, 'manager', 'Manager'),
	(4, 'staff', 'Staff');
/*!40000 ALTER TABLE `admin_groups` ENABLE KEYS */;

-- Dumping structure for table sap.admin_login_attempts
CREATE TABLE IF NOT EXISTS `admin_login_attempts` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `ip_address` varchar(15) NOT NULL,
  `login` varchar(100) NOT NULL,
  `time` int(11) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Dumping data for table sap.admin_login_attempts: ~0 rows (approximately)
/*!40000 ALTER TABLE `admin_login_attempts` DISABLE KEYS */;
/*!40000 ALTER TABLE `admin_login_attempts` ENABLE KEYS */;

-- Dumping structure for table sap.admin_users
CREATE TABLE IF NOT EXISTS `admin_users` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `ip_address` varchar(15) NOT NULL,
  `username` varchar(100) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `salt` varchar(255) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `activation_code` varchar(40) DEFAULT NULL,
  `forgotten_password_code` varchar(40) DEFAULT NULL,
  `forgotten_password_time` int(11) unsigned DEFAULT NULL,
  `remember_code` varchar(40) DEFAULT NULL,
  `created_on` int(11) unsigned NOT NULL,
  `last_login` int(11) unsigned DEFAULT NULL,
  `active` tinyint(1) unsigned DEFAULT NULL,
  `first_name` varchar(50) DEFAULT NULL,
  `last_name` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- Dumping data for table sap.admin_users: ~4 rows (approximately)
/*!40000 ALTER TABLE `admin_users` DISABLE KEYS */;
INSERT INTO `admin_users` (`id`, `ip_address`, `username`, `password`, `salt`, `email`, `activation_code`, `forgotten_password_code`, `forgotten_password_time`, `remember_code`, `created_on`, `last_login`, `active`, `first_name`, `last_name`) VALUES
	(1, '127.0.0.1', 'webmaster', '$2y$08$/X5gzWjesYi78GqeAv5tA.dVGBVP7C1e1PzqnYCVe5s1qhlDIPPES', NULL, NULL, NULL, NULL, NULL, NULL, 1451900190, 1574754633, 1, 'Webmaster', NULL),
	(2, '127.0.0.1', 'admin', '$2y$08$7Bkco6JXtC3Hu6g9ngLZDuHsFLvT7cyAxiz1FzxlX5vwccvRT7nKW', NULL, NULL, NULL, NULL, NULL, NULL, 1451900228, 1572067926, 1, 'Admin', ''),
	(3, '127.0.0.1', 'manager', '$2y$08$snzIJdFXvg/rSHe0SndIAuvZyjktkjUxBXkrrGdkPy1K6r5r/dMLa', NULL, NULL, NULL, NULL, NULL, NULL, 1451900430, 1465489585, 1, 'Manager', ''),
	(4, '127.0.0.1', 'staff', '$2y$08$NigAXjN23CRKllqe3KmjYuWXD5iSRPY812SijlhGeKfkrMKde9da6', NULL, NULL, NULL, NULL, NULL, NULL, 1451900439, 1465489590, 1, 'Staff', '');
/*!40000 ALTER TABLE `admin_users` ENABLE KEYS */;

-- Dumping structure for table sap.admin_users_groups
CREATE TABLE IF NOT EXISTS `admin_users_groups` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) unsigned NOT NULL,
  `group_id` mediumint(8) unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- Dumping data for table sap.admin_users_groups: ~4 rows (approximately)
/*!40000 ALTER TABLE `admin_users_groups` DISABLE KEYS */;
INSERT INTO `admin_users_groups` (`id`, `user_id`, `group_id`) VALUES
	(1, 1, 1),
	(2, 2, 2),
	(3, 3, 3),
	(4, 4, 4);
/*!40000 ALTER TABLE `admin_users_groups` ENABLE KEYS */;

-- Dumping structure for table sap.krs
CREATE TABLE IF NOT EXISTS `krs` (
  `npm` varchar(50) DEFAULT NULL,
  `kd_mata_kuliah` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- Dumping data for table sap.krs: 2 rows
/*!40000 ALTER TABLE `krs` DISABLE KEYS */;
INSERT INTO `krs` (`npm`, `kd_mata_kuliah`) VALUES
	('1402012001', '05-CRIPTO'),
	('1402012002', '05-CRIPTO');
/*!40000 ALTER TABLE `krs` ENABLE KEYS */;

-- Dumping structure for table sap.laboratorium
CREATE TABLE IF NOT EXISTS `laboratorium` (
  `kd_ruang` varchar(50) NOT NULL,
  `kd_prodi` varchar(50) NOT NULL,
  `nik_dosen_pj` varchar(50) DEFAULT NULL,
  `nama_lab` varchar(100) NOT NULL,
  PRIMARY KEY (`kd_ruang`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- Dumping data for table sap.laboratorium: 2 rows
/*!40000 ALTER TABLE `laboratorium` DISABLE KEYS */;
INSERT INTO `laboratorium` (`kd_ruang`, `kd_prodi`, `nik_dosen_pj`, `nama_lab`) VALUES
	('1', 'KU-FK-UY-01', '121', '1'),
	('2', 'TI-FTI-UY-05', '22', '2');
/*!40000 ALTER TABLE `laboratorium` ENABLE KEYS */;

-- Dumping structure for table sap.mata_kuliah
CREATE TABLE IF NOT EXISTS `mata_kuliah` (
  `kd_mata_kuliah` varchar(50) NOT NULL,
  `kd_prodi` varchar(50) NOT NULL,
  `nik` varchar(50) NOT NULL,
  `nama_mata_kuliah` varchar(100) NOT NULL,
  `semester` int(5) NOT NULL,
  `tahun_ajaran` varchar(20) NOT NULL,
  `sks_teori` int(5) DEFAULT NULL,
  `sks_praktikum` int(5) DEFAULT NULL,
  `total_sks` int(5) NOT NULL,
  `sifat` enum('Wajib','Pilihan') NOT NULL,
  PRIMARY KEY (`kd_mata_kuliah`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- Dumping data for table sap.mata_kuliah: 2 rows
/*!40000 ALTER TABLE `mata_kuliah` DISABLE KEYS */;
INSERT INTO `mata_kuliah` (`kd_mata_kuliah`, `kd_prodi`, `nik`, `nama_mata_kuliah`, `semester`, `tahun_ajaran`, `sks_teori`, `sks_praktikum`, `total_sks`, `sifat`) VALUES
	('05-CRIPTO', 'TI-FTI-UY-05', '1402012089', 'CRIPTOGRAFI', 6, '2015/2016', 2, 1, 3, 'Pilihan'),
	('06-CRIPTO', 'TI-FTI-UY-05', '1402012089', 'CRIPTOGRAFI 2', 6, '2015/2016', 2, 1, 3, 'Pilihan');
/*!40000 ALTER TABLE `mata_kuliah` ENABLE KEYS */;

-- Dumping structure for table sap.mst_dosen
CREATE TABLE IF NOT EXISTS `mst_dosen` (
  `nik` varchar(50) NOT NULL,
  `kd_prodi` varchar(50) NOT NULL,
  `nama_dosen` varchar(100) NOT NULL,
  `jabatan` varchar(100) DEFAULT NULL,
  `mata_kuliah` text NOT NULL,
  PRIMARY KEY (`nik`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- Dumping data for table sap.mst_dosen: 9 rows
/*!40000 ALTER TABLE `mst_dosen` DISABLE KEYS */;
INSERT INTO `mst_dosen` (`nik`, `kd_prodi`, `nama_dosen`, `jabatan`, `mata_kuliah`) VALUES
	('1102012089', 'KU-FK-UY-01', 'Adara Zahra Callysta', '', ''),
	('0514062017', 'TI-FTI-UY-05', 'KPS FTI', 'KPS', ''),
	('1402012089', 'TI-FTI-UY-05', 'Ocky Aditia Saputra', '', ''),
	('121', 'KU-FK-UY-01', '121', '121', ''),
	('22', 'TI-FTI-UY-05', '22', '22', ''),
	('4', 'KU-FK-UY-01', '4', '4', ''),
	('5', 'TI-FTI-UY-05', '5', '5', ''),
	('6', 'TI-FTI-UY-05', '6', '6', ''),
	('8', 'MANAJEMEN-FE-UY-04', '8', '8', '');
/*!40000 ALTER TABLE `mst_dosen` ENABLE KEYS */;

-- Dumping structure for table sap.mst_dpt
CREATE TABLE IF NOT EXISTS `mst_dpt` (
  `nik` varchar(50) NOT NULL,
  `kd_prodi` varchar(50) NOT NULL,
  `nama_dpt` varchar(100) NOT NULL,
  `jabatan` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`nik`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- Dumping data for table sap.mst_dpt: 2 rows
/*!40000 ALTER TABLE `mst_dpt` DISABLE KEYS */;
INSERT INTO `mst_dpt` (`nik`, `kd_prodi`, `nama_dpt`, `jabatan`) VALUES
	('321', '', '321', NULL),
	('213', '', '213', NULL);
/*!40000 ALTER TABLE `mst_dpt` ENABLE KEYS */;

-- Dumping structure for table sap.mst_fakultas
CREATE TABLE IF NOT EXISTS `mst_fakultas` (
  `kd_fakultas` varchar(50) NOT NULL,
  `nama_fakultas` varchar(100) NOT NULL,
  PRIMARY KEY (`kd_fakultas`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- Dumping data for table sap.mst_fakultas: 6 rows
/*!40000 ALTER TABLE `mst_fakultas` DISABLE KEYS */;
INSERT INTO `mst_fakultas` (`kd_fakultas`, `nama_fakultas`) VALUES
	('FK-UY-01', 'Kedokteran'),
	('FTI-UY-05', 'Teknologi Informasi'),
	('FH-UY-03', 'Hukum'),
	('FE-UY-04', 'Ekonomi'),
	('FPsi-UY-06', 'Psikologi'),
	('FKG-UY-02', 'Kedokteran Gigi');
/*!40000 ALTER TABLE `mst_fakultas` ENABLE KEYS */;

-- Dumping structure for table sap.mst_koordinator_rmk
CREATE TABLE IF NOT EXISTS `mst_koordinator_rmk` (
  `nik` varchar(50) NOT NULL,
  `kd_prodi` varchar(50) NOT NULL,
  `nama_koordinator_rmk` varchar(100) NOT NULL,
  `jabatan` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`nik`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- Dumping data for table sap.mst_koordinator_rmk: 2 rows
/*!40000 ALTER TABLE `mst_koordinator_rmk` DISABLE KEYS */;
INSERT INTO `mst_koordinator_rmk` (`nik`, `kd_prodi`, `nama_koordinator_rmk`, `jabatan`) VALUES
	('3333', '', '3333', NULL),
	('4444', '', 'rmk', NULL);
/*!40000 ALTER TABLE `mst_koordinator_rmk` ENABLE KEYS */;

-- Dumping structure for table sap.mst_kps
CREATE TABLE IF NOT EXISTS `mst_kps` (
  `nik` varchar(50) NOT NULL,
  `kd_prodi` varchar(50) DEFAULT NULL,
  `nama_kps` varchar(100) NOT NULL,
  PRIMARY KEY (`nik`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- Dumping data for table sap.mst_kps: 2 rows
/*!40000 ALTER TABLE `mst_kps` DISABLE KEYS */;
INSERT INTO `mst_kps` (`nik`, `kd_prodi`, `nama_kps`) VALUES
	('91', '', '919'),
	('123123123', '', 'kps');
/*!40000 ALTER TABLE `mst_kps` ENABLE KEYS */;

-- Dumping structure for table sap.mst_mahasiswa
CREATE TABLE IF NOT EXISTS `mst_mahasiswa` (
  `npm` varchar(50) NOT NULL,
  `kd_prodi` varchar(50) NOT NULL,
  `nama_mahasiswa` varchar(100) NOT NULL,
  PRIMARY KEY (`npm`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- Dumping data for table sap.mst_mahasiswa: 6 rows
/*!40000 ALTER TABLE `mst_mahasiswa` DISABLE KEYS */;
INSERT INTO `mst_mahasiswa` (`npm`, `kd_prodi`, `nama_mahasiswa`) VALUES
	('1102012094', 'KU-FK-UY-01', 'Milatianingrum'),
	('1402012001', 'TI-FTI-UY-05', 'Adara'),
	('1402012002', 'TI-FTI-UY-05', 'Zahra'),
	('1402014082', 'TI-FTI-UY-05', 'Rahmadhina Ajeng'),
	('121231231', 'TI-FTI-UY-05', 'fak ti'),
	('123456', 'KU-FK-UY-01', '123456');
/*!40000 ALTER TABLE `mst_mahasiswa` ENABLE KEYS */;

-- Dumping structure for table sap.mst_program_studi
CREATE TABLE IF NOT EXISTS `mst_program_studi` (
  `kd_prodi` varchar(50) NOT NULL,
  `kd_fakultas` varchar(50) NOT NULL,
  `nama_prodi` varchar(100) NOT NULL,
  PRIMARY KEY (`kd_prodi`),
  KEY `kd_fakultas` (`kd_fakultas`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- Dumping data for table sap.mst_program_studi: 5 rows
/*!40000 ALTER TABLE `mst_program_studi` DISABLE KEYS */;
INSERT INTO `mst_program_studi` (`kd_prodi`, `kd_fakultas`, `nama_prodi`) VALUES
	('KU-FK-UY-01', 'FK-UY-01', 'Kedokteran Umum'),
	('TI-FTI-UY-05', 'FTI-UY-05', 'Teknik Informatika'),
	('AKUNTANSI-FE-UY-04', 'FE-UY-04', 'Akuntansi'),
	('MANAJEMEN-FE-UY-04', 'FE-UY-04', 'Manajemen'),
	('IP-FTI-UY-05', 'FTI-UY-05', 'Ilmu Perpustakaan');
/*!40000 ALTER TABLE `mst_program_studi` ENABLE KEYS */;

-- Dumping structure for table sap.mst_tata_usaha
CREATE TABLE IF NOT EXISTS `mst_tata_usaha` (
  `nik` varchar(50) NOT NULL,
  `kd_prodi` varchar(50) NOT NULL DEFAULT '',
  `nama_tata_usaha` varchar(100) NOT NULL,
  PRIMARY KEY (`nik`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- Dumping data for table sap.mst_tata_usaha: 12 rows
/*!40000 ALTER TABLE `mst_tata_usaha` DISABLE KEYS */;
INSERT INTO `mst_tata_usaha` (`nik`, `kd_prodi`, `nama_tata_usaha`) VALUES
	('0023022017', '', 'TU Universitas'),
	('01213022017', 'KU-FK-UY-01', 'TU FK Umum'),
	('05123022017', 'TI-FTI-UY-05', 'TU FTI TI'),
	('04116062017', 'AKUNTANSI-FE-UY-04', 'TU FE AKUNTANSI'),
	('04216062017', 'MANAJEMEN-FE-UY-04', 'TU FE MANAJEMEN'),
	('05223022017', 'IP-FTI-UY-05', 'TU FTI IP'),
	('012312', '', 'TU UNIV'),
	('12', 'KU-FK-UY-01', '12'),
	('123', 'KU-FK-UY-01', '123'),
	('1', '', '1'),
	('3', 'TI-FTI-UY-05', '3'),
	('9', '', '9');
/*!40000 ALTER TABLE `mst_tata_usaha` ENABLE KEYS */;

-- Dumping structure for table sap.pelaksanaan_perkuliahan
CREATE TABLE IF NOT EXISTS `pelaksanaan_perkuliahan` (
  `id_pelaksanaan_perkuliahan` varchar(50) NOT NULL,
  `kd_mata_kuliah` varchar(50) NOT NULL,
  `kd_ruang` varchar(50) NOT NULL,
  `nik_tata_usaha` varchar(50) DEFAULT NULL,
  `hari_perkuliahan` varchar(15) NOT NULL,
  `jam_perkuliahan` varchar(20) NOT NULL,
  `hari_dan_tgl_rencana1` varchar(50) NOT NULL,
  `hari_dan_tgl_rencana2` varchar(50) NOT NULL,
  `hari_dan_tgl_rencana3` varchar(50) NOT NULL,
  `hari_dan_tgl_rencana4` varchar(50) NOT NULL,
  `hari_dan_tgl_rencana5` varchar(50) NOT NULL,
  `hari_dan_tgl_rencana6` varchar(50) NOT NULL,
  `hari_dan_tgl_rencana7` varchar(50) NOT NULL,
  `hari_dan_tgl_rencana8` varchar(50) NOT NULL,
  `hari_dan_tgl_realisasi1` varchar(50) NOT NULL,
  `hari_dan_tgl_realisasi2` varchar(50) NOT NULL,
  `hari_dan_tgl_realisasi3` varchar(50) NOT NULL,
  `hari_dan_tgl_realisasi4` varchar(50) NOT NULL,
  `hari_dan_tgl_realisasi5` varchar(50) NOT NULL,
  `hari_dan_tgl_realisasi6` varchar(50) NOT NULL,
  `hari_dan_tgl_realisasi7` varchar(50) NOT NULL,
  `hari_dan_tgl_realisasi8` varchar(50) NOT NULL,
  `jam_mulai1` varchar(15) NOT NULL,
  `jam_mulai2` varchar(15) NOT NULL,
  `jam_mulai3` varchar(15) NOT NULL,
  `jam_mulai4` varchar(15) NOT NULL,
  `jam_mulai5` varchar(15) NOT NULL,
  `jam_mulai6` varchar(15) NOT NULL,
  `jam_mulai7` varchar(15) NOT NULL,
  `jam_mulai8` varchar(15) NOT NULL,
  `jam_selesai1` varchar(15) NOT NULL,
  `jam_selesai2` varchar(15) NOT NULL,
  `jam_selesai3` varchar(15) NOT NULL,
  `jam_selesai4` varchar(15) NOT NULL,
  `jam_selesai5` varchar(15) NOT NULL,
  `jam_selesai6` varchar(15) NOT NULL,
  `jam_selesai7` varchar(15) NOT NULL,
  `jam_selesai8` varchar(15) NOT NULL,
  `materi_kuliah1` text NOT NULL,
  `materi_kuliah2` text NOT NULL,
  `materi_kuliah3` text NOT NULL,
  `materi_kuliah4` text NOT NULL,
  `materi_kuliah5` text NOT NULL,
  `materi_kuliah6` text NOT NULL,
  `materi_kuliah7` text NOT NULL,
  `materi_kuliah8` text NOT NULL,
  `sign_dosen1` int(5) NOT NULL DEFAULT '0',
  `sign_dosen2` int(5) NOT NULL DEFAULT '0',
  `sign_dosen3` int(5) NOT NULL DEFAULT '0',
  `sign_dosen4` int(5) NOT NULL DEFAULT '0',
  `sign_dosen5` int(5) NOT NULL DEFAULT '0',
  `sign_dosen6` int(5) NOT NULL DEFAULT '0',
  `sign_dosen7` int(5) NOT NULL DEFAULT '0',
  `sign_dosen8` int(5) NOT NULL DEFAULT '0',
  `sign_mahasiswa1` int(5) NOT NULL DEFAULT '0',
  `sign_mahasiswa2` int(5) NOT NULL DEFAULT '0',
  `sign_mahasiswa3` int(5) NOT NULL DEFAULT '0',
  `sign_mahasiswa4` int(5) NOT NULL DEFAULT '0',
  `sign_mahasiswa5` int(5) NOT NULL DEFAULT '0',
  `sign_mahasiswa6` int(5) NOT NULL DEFAULT '0',
  `sign_mahasiswa7` int(5) NOT NULL DEFAULT '0',
  `sign_mahasiswa8` int(5) NOT NULL DEFAULT '0',
  `sign_tu1` int(5) NOT NULL DEFAULT '0',
  `sign_tu2` int(5) NOT NULL DEFAULT '0',
  `sign_tu3` int(5) NOT NULL DEFAULT '0',
  `sign_tu4` int(5) NOT NULL DEFAULT '0',
  `sign_tu5` int(5) NOT NULL DEFAULT '0',
  `sign_tu6` int(5) NOT NULL DEFAULT '0',
  `sign_tu7` int(5) NOT NULL DEFAULT '0',
  `sign_tu8` int(5) NOT NULL DEFAULT '0',
  `keterangan1` text NOT NULL,
  `keterangan2` text NOT NULL,
  `keterangan3` text NOT NULL,
  `keterangan4` text NOT NULL,
  `keterangan5` text NOT NULL,
  `keterangan6` text NOT NULL,
  `keterangan7` text NOT NULL,
  `keterangan8` text NOT NULL,
  PRIMARY KEY (`id_pelaksanaan_perkuliahan`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- Dumping data for table sap.pelaksanaan_perkuliahan: 1 rows
/*!40000 ALTER TABLE `pelaksanaan_perkuliahan` DISABLE KEYS */;
INSERT INTO `pelaksanaan_perkuliahan` (`id_pelaksanaan_perkuliahan`, `kd_mata_kuliah`, `kd_ruang`, `nik_tata_usaha`, `hari_perkuliahan`, `jam_perkuliahan`, `hari_dan_tgl_rencana1`, `hari_dan_tgl_rencana2`, `hari_dan_tgl_rencana3`, `hari_dan_tgl_rencana4`, `hari_dan_tgl_rencana5`, `hari_dan_tgl_rencana6`, `hari_dan_tgl_rencana7`, `hari_dan_tgl_rencana8`, `hari_dan_tgl_realisasi1`, `hari_dan_tgl_realisasi2`, `hari_dan_tgl_realisasi3`, `hari_dan_tgl_realisasi4`, `hari_dan_tgl_realisasi5`, `hari_dan_tgl_realisasi6`, `hari_dan_tgl_realisasi7`, `hari_dan_tgl_realisasi8`, `jam_mulai1`, `jam_mulai2`, `jam_mulai3`, `jam_mulai4`, `jam_mulai5`, `jam_mulai6`, `jam_mulai7`, `jam_mulai8`, `jam_selesai1`, `jam_selesai2`, `jam_selesai3`, `jam_selesai4`, `jam_selesai5`, `jam_selesai6`, `jam_selesai7`, `jam_selesai8`, `materi_kuliah1`, `materi_kuliah2`, `materi_kuliah3`, `materi_kuliah4`, `materi_kuliah5`, `materi_kuliah6`, `materi_kuliah7`, `materi_kuliah8`, `sign_dosen1`, `sign_dosen2`, `sign_dosen3`, `sign_dosen4`, `sign_dosen5`, `sign_dosen6`, `sign_dosen7`, `sign_dosen8`, `sign_mahasiswa1`, `sign_mahasiswa2`, `sign_mahasiswa3`, `sign_mahasiswa4`, `sign_mahasiswa5`, `sign_mahasiswa6`, `sign_mahasiswa7`, `sign_mahasiswa8`, `sign_tu1`, `sign_tu2`, `sign_tu3`, `sign_tu4`, `sign_tu5`, `sign_tu6`, `sign_tu7`, `sign_tu8`, `keterangan1`, `keterangan2`, `keterangan3`, `keterangan4`, `keterangan5`, `keterangan6`, `keterangan7`, `keterangan8`) VALUES
	('05-CRIPTO-6-TEORI-1', '05-CRIPTO', 'R. TI. 01', '0523022017', 'Senin', '09.00-10.50', '06/18/2017', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', '', '', '', '', '', '', '');
/*!40000 ALTER TABLE `pelaksanaan_perkuliahan` ENABLE KEYS */;

-- Dumping structure for table sap.rincian_materi_kuliah
CREATE TABLE IF NOT EXISTS `rincian_materi_kuliah` (
  `kd_mata_kuliah` varchar(50) NOT NULL,
  `topik1` text NOT NULL,
  `topik2` text NOT NULL,
  `topik3` text NOT NULL,
  `topik4` text NOT NULL,
  `topik5` text NOT NULL,
  `topik6` text NOT NULL,
  `topik7` text NOT NULL,
  `topik8` text NOT NULL,
  `topik9` text NOT NULL,
  `topik10` text NOT NULL,
  `topik11` text NOT NULL,
  `topik12` text NOT NULL,
  `topik13` text NOT NULL,
  `topik14` text NOT NULL,
  `topik15` text NOT NULL,
  `topik16` text NOT NULL,
  `sub_topik1` text NOT NULL,
  `sub_topik2` text NOT NULL,
  `sub_topik3` text NOT NULL,
  `sub_topik4` text NOT NULL,
  `sub_topik5` text NOT NULL,
  `sub_topik6` text NOT NULL,
  `sub_topik7` text NOT NULL,
  `sub_topik8` text NOT NULL,
  `sub_topik9` text NOT NULL,
  `sub_topik10` text NOT NULL,
  `sub_topik11` text NOT NULL,
  `sub_topik12` text NOT NULL,
  `sub_topik13` text NOT NULL,
  `sub_topik14` text NOT NULL,
  `sub_topik15` text NOT NULL,
  `sub_topik16` text NOT NULL,
  `tik1` text NOT NULL,
  `tik2` text NOT NULL,
  `tik3` text NOT NULL,
  `tik4` text NOT NULL,
  `tik5` text NOT NULL,
  `tik6` text NOT NULL,
  `tik7` text NOT NULL,
  `tik8` text NOT NULL,
  `tik9` text NOT NULL,
  `tik10` text NOT NULL,
  `tik11` text NOT NULL,
  `tik12` text NOT NULL,
  `tik13` text NOT NULL,
  `tik14` text NOT NULL,
  `tik15` text NOT NULL,
  `tik16` text NOT NULL,
  `kegiatan_belajar1` varchar(15) NOT NULL,
  `kegiatan_belajar2` varchar(15) NOT NULL,
  `kegiatan_belajar3` varchar(15) NOT NULL,
  `kegiatan_belajar4` varchar(15) NOT NULL,
  `kegiatan_belajar5` varchar(15) NOT NULL,
  `kegiatan_belajar6` varchar(15) NOT NULL,
  `kegiatan_belajar7` varchar(15) NOT NULL,
  `kegiatan_belajar8` varchar(15) NOT NULL,
  `kegiatan_belajar9` varchar(15) NOT NULL,
  `kegiatan_belajar10` varchar(15) NOT NULL,
  `kegiatan_belajar11` varchar(15) NOT NULL,
  `kegiatan_belajar12` varchar(15) NOT NULL,
  `kegiatan_belajar13` varchar(15) NOT NULL,
  `kegiatan_belajar14` varchar(15) NOT NULL,
  `kegiatan_belajar15` varchar(15) NOT NULL,
  `kegiatan_belajar16` varchar(15) NOT NULL,
  `sign_koordinator_mata_kuliah` int(5) NOT NULL,
  `sign_koordinator_program_studi` int(5) NOT NULL,
  `tanggal` varchar(50) NOT NULL,
  PRIMARY KEY (`kd_mata_kuliah`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- Dumping data for table sap.rincian_materi_kuliah: 0 rows
/*!40000 ALTER TABLE `rincian_materi_kuliah` DISABLE KEYS */;
/*!40000 ALTER TABLE `rincian_materi_kuliah` ENABLE KEYS */;

-- Dumping structure for table sap.ruang
CREATE TABLE IF NOT EXISTS `ruang` (
  `kd_ruang` varchar(50) NOT NULL,
  `kd_prodi` varchar(50) NOT NULL,
  `nama_ruang` varchar(50) NOT NULL,
  `mata_kuliah` text NOT NULL,
  PRIMARY KEY (`kd_ruang`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- Dumping data for table sap.ruang: 4 rows
/*!40000 ALTER TABLE `ruang` DISABLE KEYS */;
INSERT INTO `ruang` (`kd_ruang`, `kd_prodi`, `nama_ruang`, `mata_kuliah`) VALUES
	('R. TI. 01', 'TI-FTI-UY-05', 'TI-001', '["CRIPTOGRAFI","CRIPTOGRAFI 2"]'),
	('1', 'TI-FTI-UY-05', '1', '["CRIPTOGRAFI", "CRIPTOGRAFI 2"]'),
	('123', 'TI-FTI-UY-05', '123', ''),
	('1234', 'KU-FK-UY-01', '124', '');
/*!40000 ALTER TABLE `ruang` ENABLE KEYS */;

-- Dumping structure for table sap.sap
CREATE TABLE IF NOT EXISTS `sap` (
  `kd_mata_kuliah` varchar(50) NOT NULL,
  `nik_koordinator_mata_kuliah` varchar(50) DEFAULT NULL,
  `silabus_ringkas` text NOT NULL,
  `tiu` text NOT NULL,
  `mk_prasyarat` varchar(100) NOT NULL,
  `media` varchar(150) NOT NULL,
  `waktu_kuliah` int(10) NOT NULL,
  `waktu_pr` int(10) NOT NULL,
  `waktu_diskusi_kelompok` int(10) NOT NULL,
  `lain_lain1` varchar(100) NOT NULL,
  `waktu_lain_lain1` int(10) NOT NULL,
  `bobot_UTS` int(10) NOT NULL,
  `bobot_UAS` int(10) NOT NULL,
  `bobot_quiz` int(10) NOT NULL,
  `bobot_tugas` int(10) NOT NULL,
  `bobot_praktikum` int(10) NOT NULL,
  `bobot_keaktifan` int(10) NOT NULL,
  `lain_lain2` varchar(100) NOT NULL,
  `bobot_lain_lain2` int(10) NOT NULL,
  `rujukan` text NOT NULL,
  PRIMARY KEY (`kd_mata_kuliah`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- Dumping data for table sap.sap: 0 rows
/*!40000 ALTER TABLE `sap` DISABLE KEYS */;
/*!40000 ALTER TABLE `sap` ENABLE KEYS */;

-- Dumping structure for table sap.user
CREATE TABLE IF NOT EXISTS `user` (
  `id_user` int(10) NOT NULL AUTO_INCREMENT,
  `level` varchar(30) NOT NULL,
  `username` varchar(45) NOT NULL,
  `password` varchar(30) NOT NULL,
  `nama_user` varchar(45) NOT NULL,
  `hp_user` varchar(12) NOT NULL,
  `email_user` varchar(45) NOT NULL,
  `aktif` enum('Y','N') NOT NULL,
  `nik` varchar(75) NOT NULL,
  `jabatan` varchar(75) NOT NULL,
  `unit` varchar(75) NOT NULL,
  PRIMARY KEY (`id_user`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

-- Dumping data for table sap.user: ~6 rows (approximately)
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` (`id_user`, `level`, `username`, `password`, `nama_user`, `hp_user`, `email_user`, `aktif`, `nik`, `jabatan`, `unit`) VALUES
	(1, 'superadmin', 'superadmin', 'superadmin', 'Super Admin', '083870158207', 'superadmin@gmail.com', 'Y', '-', 'IT', 'Fakultas Teknologi Informasi'),
	(2, 'kps_ti', 'kpsti', 'kpsti', 'Herika Hayurani, S.Kom., M.Kom.', '08119252759', 'kps_ti@gmail.com', 'Y', '531141106018', 'KPS TI', 'Teknik Informatika'),
	(3, 'kps_ip', 'kpsip', 'kpsip', 'Nita Ismayati, S.IP., M.Hum', '087800090059', 'kpsip@gmail.com', 'Y', '531142109016', 'KPS IP', 'Program Studi Ilmu Perpustakaan'),
	(4, 'dekan', 'dekanfti', 'dekanfti', 'Dr. Ummi Azizah Rachmawati, S.Kom., M.Kom.', '087771278367', 'dekanfti@gmail.com', 'Y', '531141106017', 'Dekan FTI', 'Fakultas Teknologi Informasi'),
	(5, 'tu', 'sbaak', 'sbaak', 'Slamet Robani', '087771278367', 'sbaak@gmail.com', 'Y', '531142194008', 'Karyawan', 'Fakultas Teknologi Informasi'),
	(6, 'admin', 'admin', 'admin', 'Admin', '087771728367', 'admin@gmail.com', 'Y', '-', 'Admin FTI', 'Fakultas Teknologi Informasi');
/*!40000 ALTER TABLE `user` ENABLE KEYS */;

-- Dumping structure for table sap.user_akses
CREATE TABLE IF NOT EXISTS `user_akses` (
  `kd_user` varchar(50) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` text NOT NULL,
  `status` enum('Dosen','Tata Usaha','KPS','Mahasiswa','DPT','RMK') NOT NULL,
  PRIMARY KEY (`kd_user`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- Dumping data for table sap.user_akses: 29 rows
/*!40000 ALTER TABLE `user_akses` DISABLE KEYS */;
INSERT INTO `user_akses` (`kd_user`, `username`, `password`, `status`) VALUES
	('0023022017', 'tu_univ', 'dXDgIR/+R3NR+IzAV+c1cJCWQ02on9WCnbNGfp/jYS9wgFfFeVQpW/EfekTHap9insZhgk85mTMGEFN0sJ265pFdccBFep9UnYPgEabBL6OF/ZJfCA1YPEvMFXIZGXPMTCqr/6kAovgIvtbffm0kD1f81VNy92kGuWc4SCklgz4=', 'Tata Usaha'),
	('01213022017', 'tu_fk_umum', 'YJDX0c6EAxQTEeTfpth4raPh4CqYkzrZOdZMDWam5A545KvklqJG6TJ69zgfqyDzruIn14x91K22A0eLSKZIWVwVJ6eyYJ3J2Ic1VSfLQ9v6tHlk5oY4FN+Sj9EhcsZlceS78yQeFuRRUYJaE80hnG8IIzfquuLbsFJARB3HHwA=', 'Tata Usaha'),
	('05123022017', 'tu_fti_ti', 'bI9cZR/LBMkXWTGYuTU2IyjVIVmkQKY5y5cDbjfUXgq3oQcowgb/u44nMMmt2CZdo0i8Yt82YmF++uJz0nrb1Q37bB6BE07n9foN8GxmU/aCAKRRTF13jHKIl0TUB/pDsdiEpX2mtM9TebByxpzAi85EL8dyUcKrkT6PosmY6YY=', 'Tata Usaha'),
	('1102012089', 'zahra.callysta', 'Nnfjli+G7P3GIdFzMw5BZOxuDWbf/zKG9sE0HKvVZ/HGGXOPEaYrPGL/szChE1vBqhIQshhjVwZhVmlwqgdiQRCJR7KpRXWaVYhZCDA+5z6a584em9Sp4RvHgfXZMXr9uV27FCPdD/XuSWmWYvFIGKZXXqTt3sieHTP+Qa59FyE=', 'Dosen'),
	('0514062017', 'kps_fti', 'ib/+OvxJOfn6d84zNA2zG4C3b8GpI2DUIHNj50eL2SfgRWDM8yqbxfhVPnuPzFSJLKpwAvrwblHzjQCz9obf1qjwqr1Lb6wRlzCbG4wbRqKoGKQQB0Xv+yXu0uUlBNNRifwMpxGenq3uA+3nBKCmM5leMB1NaeeDDAilAwTBRCg=', 'Dosen'),
	('1402012089', 'ockyaditia', 'gvFG+HFN01sn2lvPk/TSQEDsZOzwNJwsDfyfR7d8GquFm57Ow0BTCQCj2iloc0deHn0UKr/2CDlLsqrSp/x3W2LsHrE3JRav57Llbduf+MGH5/oiR4FeaN6xViDPHLLDSZ1QkbXfCZeWJvCJNg5X9R/zkVTQihM0IlzmpQGIDQU=', 'Dosen'),
	('04116062017', 'tu_fe_akuntansi', 'ByxMoGAUu0l85F5M7rviM/xhiEQbUniOCBi6hzSDp7v6tEiVuROVTBAAIBTtg4bLhoXoHnwfD9hqYaSg4cjmGLs6f8njD+ZzZlQr1SXuRamyjYhHpCnWZI52K1x/Ny4H8kdl6HPGp0AJ9ho5vFuhRRFjbtAg4cFbNQtH0PTA55M=', 'Tata Usaha'),
	('04216062017', 'tu_fe_manajemen', 'ksrvW8roJAdf3KH9PzTj6SDXkhTCOdPHxy+xr+yo671SBCD3rRT1a0xcPmdUZCfdQWWkrkvKN2g8MZOe06+m0I5JA9KlOkGl4TXTi2Pft3TbWtwM5JTMz2Ubg4/fSY22fmSrrCwlYPhSkn7g9NpzDDmwVOElcxJoed2Gn8QaKcM=', 'Tata Usaha'),
	('05223022017', 'tu_fti_ip', 'SxC1qXdwVbXn48PUGOVXatSWya5M7jcMq20baQ0JTiTrkAd+SsLKHd32VRhLDBRfd16aFYWZQj9VPicVWFW6L3JacWDHVCgSXq5hnvGCZDshkiTf5w6UVygyI0Sfl3QNdWMdledGkEgel+yLdqJCVHZpCqf+3dj4hRe/Re0IzWs=', 'Tata Usaha'),
	('012312', 'tu_univ_2', 'dXDgIR/+R3NR+IzAV+c1cJCWQ02on9WCnbNGfp/jYS9wgFfFeVQpW/EfekTHap9insZhgk85mTMGEFN0sJ265pFdccBFep9UnYPgEabBL6OF/ZJfCA1YPEvMFXIZGXPMTCqr/6kAovgIvtbffm0kD1f81VNy92kGuWc4SCklgz4=', 'Tata Usaha'),
	('3', '3', 'QMRFrbM6Dvm5QubkTeKD+JdfsZClFrKQzUNOoUp+axB5tlA6FWv0z+ArP2JBnkI5Y7WEKk6/D6CS+fWRfKH5JRAie3JoEclDnMGkOm/vwcDpaIdVZeR1Jhlrbsm9BM9XaUHr6BpG6Fvvv1Sj5Lnyi2LcIbnzbaZIzkSTSjv730Y=', 'Tata Usaha'),
	('12', '12', 'XZxX6nGR7gXz6dRdsBHSUNhjoocz/JlCNqN94Kn3E5uLadoAgUqhSCvmkgJktVC3T8qJmesIO5B+p/6j1zZAwTfBapImCRL913HCiMGdrEi3Wect1u4xgelDrVFUziIXhk9o6RMVYEqcQq+UGCiWwWbUuyGeGCRzytksF2ZunjI=', 'Tata Usaha'),
	('123', '123', 'AKYx7SGkzEofYOrOO3Fkpj4gP7myDwdQQbw4LzABcb6CS20i/XHxzuuTgZkQxK+vwAVojx+jKAYckDse0woguttNiGTfhsujr2h7IKKud2BEIYQwpn3rfk/n7XyaHlS8H281DATOlTeNGqTjegTCEYj1yA0dow0diQNaZrMEKP0=', 'Tata Usaha'),
	('1', '1', 'ADPwJtUJxoEIpFVICskM03Tf9laadM6Q05Mv+7wYSht/Lo6Nk5+DdZs/iqXvbZfxFu5MBrORN3MDy3w8zPE7HWtB1VQxu8wQ8z45aZ0yTOy/LcNN198b3WIBVc+9iDS10oRFKWQBUTsGaA8byN2NVyAa7Sea5MfVpZMHPYkviCg=', 'Tata Usaha'),
	('121', '121', 'WzFF9E6d71NTvC3UpIotrpneUx/JnEi5v6DGmLfnK5OyUKV0xqKN2YaDkj+pH/z/f5bdxKO43dWCrvgLG1Ks6qeSmSDxtO59wKJTdFNVUGo8cyLoiD+BVGewcfyvtQ10sJVCLD/zHe+XOZDNMXuje47r6fb2lGwzy/XDM6QYVxg=', 'Dosen'),
	('22', '22', 'ilxSy/elZZFUVHIL+cvzsJ8mao1SCVGtdUHvQuTMaXrxzQhqefHmtC9w8VLh07KljwG5u5vXhf11jD9xa24PjiPZtWQ/ie2xG0Gf8C+hue92A3H7472H6QYhAv5WebFHsmCGaCq9flPKA6yaDOdz3r57+CusgZC/SnKC9wGIXa4=', 'Dosen'),
	('4', '4', 'eYb71fEKqSn3kf25C2gpgBtqvQw18hPTrrq+/UiC+x4I3OYydiWzEIpE3uX6/jqb8SD2N5vpQ/M2bPMcOY0V3nYmB3uxChU74elMozyok0OuaCwH0LrwYnX3dD+/12Ap7iZyJDY6bE971DAV3LWzulnFrMHf41U9KJywMXTGVxs=', 'Dosen'),
	('5', '5', 'cFocDs31eumNdojmqmRBWg6ld152wSDfkJBDdGbgkUwaP+vuPbrlovx1cwo3YZVaQILE4sA7wTW5WDC8/zIfwHjsrqE1WcrdVS8D0zG/+z1mlIbEE2jhdjAxUhAjezRaK4UNMjqmwKbY+u5JZWUZQI5+GCQPzaOpuDyrfCoszZU=', 'Dosen'),
	('6', '6', 'c6g8W6JInOlSsaRnCdc2qjeuZSjxM9pyhU0mVDMvBtZphCi4PG0LqaCuLq6hv8ogQZCn3MgXtdOvgzGe+X1Xmsq6w8qlbyFjjL5nW4Q1Ipd49DKHFHTAQjrOAbw9acbWQSYaMLNEANsgxlBGqsU6fTo7s6A437P9qYzH8qOUSo0=', 'Dosen'),
	('8', '8', 'OoFkRXLdMNCdWVpHZxNnSOk32FVadh4p1IS23SKFXrkV3+mYMtDWLy2pfdARKw+uphVzRV1BNaJkGf6ueNgYWaySNvS/+32oi6i4YBxM//1Pe28jCpGHMUgFOR2RaZiJPCUtIue1FDIPJxATXmysYXz4+NOEAFrkVCwAVDR3mSA=', 'Dosen'),
	('9', '9', 'prH7ljn2yIp0v9aM1nJ4crkKM7miQLg4m8IR9Pci56bY2Qy7awe9Jh761NH65pQ9LF2cbGNySHh3i/a6C1/JzXycd6QD7gdRXBAQX1IDVRkYH3YDchW7hVnBRBPq9cAHrg9/Q6Qhhcwv28S/Ayu7F62lOX1XaE9OjH497xlHLVI=', 'Tata Usaha'),
	('91', '919', 'euTZR7P/l/n4x27ys+0iaj56rsvrBZPi0dVSeWMATawtP84mcFb9SvvHk+1IzFZXkaH7N6Fw6/hJUkfuzP2l/1ZsLpOBjMYErPh3T/asBsARziZn/ac/KboT19I8bDcy4JAQSsCF6rCQraT9PXaZ62qxHDmfMM+XGnapdUbKaSc=', 'KPS'),
	('3333', '3333', 'THjjz3jXm13iOcGj+FD+m9oMal5J798Kn0KYGV3pfRMcvBbRxBOVLw11hmHnGiNR4ia2s+YMpP6cPAaHGeXvt+P3hDf8DLmqYv6z80vM1zejWlOfvLcWvdPVzCMdFg6qh85bFBLJ2m9UBL1J0lnUQN2RCxU94A2pVIwOiZl/+gI=', 'RMK'),
	('321', '321', 'JCf8XwkKBQv33i4PbG8G05Z3opOESdSUVBhj27XO/x/2PUewfA2JbU2daMnitUARMW6x+WYz3XFM4OaFTz1lbkdyP+bDJfGYojnM1a5ane4Px4xGLjzd+m7J+EuqNV0IU1beYUU1gei9x584LX9uO9adeAhWoAQ7SHmABACb+sY=', 'DPT'),
	('121231231', 'fak ti', 'otuKqvozx08kCxvBNOFU53ZRHqKaaX1R1rE+996VA6KuSj87auovG3bwLtSBX5swGEB0kQ+fEojKY9iGpLGpKBVqgfx9ZgFqnFswRh6ogiX0xsnKJjsmPcLDy6E0a3KmWuMpPMP5vlEZOhXhsgxBaPX64cvuuIlIKfTpoBAbiLA=', 'Mahasiswa'),
	('123456', '123456', 'A0/1SRbe4AA8E+p6LTG3KOOvjiQarqFiUAay7NgYIMWqwfLv5wCyVIyDY+7wPoYrxu4tkm1L+GqiIhGOH0n9/mpwXkGjz2VdRnwZZq5Pg6AhfliSp58Cj76NRUGavcyyK1kyllCmCgsA/j0MMFg5tgBstfnmZ4B8lz4UrNsEZ+I=', 'Mahasiswa'),
	('123123123', 'kps', 'UXltMqNnX0EG8rVhGFQiBima56/LiZczZSTI8NpeQKJz2xXo47hNi53TvhHKu6B2ttBqR+17eD0ZenKs8QOT1PKdi4tI+Moj7qfr0nHGsCZIYTAqAGQorVbn9AFf328+Ir/ewH8XXkhttwp2L2vyQ1fIZhMZBqi95EL7+aTWusA=', 'KPS'),
	('4444', 'rmk', 'pgQAO3tZ/K+oqX6/Zh6tyu67VK/16O+mfoywY3Czz6W8ZGzXtEczyT66z5A1K8Pflu6ZI7sGUwYXAuBKmEC/5fZ+dNg8kuTnpMAJNobv3Fa8BfaBqZilAGRFxRG1A9to/H65gEaV4PDyamL/CM/neJCtLI0JYuwFhLRs3O0Hv4o=', 'RMK'),
	('213', '213asdsdas', 'UrC0F3JTkNvMhzQjG8ZmBbGlArK1l+EzccPe0E4Lbp/m1B7kizxg+NP3kEd37BvEFlocA/CJ6Tf5MseYjQrFsZhNkV4bDjDU23LROeikaMT2LT37nbKaLV5gmxCJpwY+a23BP36pEDPlMfc+lATv53kO6+II+LjmsheQ8OSd7QE=', 'DPT');
/*!40000 ALTER TABLE `user_akses` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
