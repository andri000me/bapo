-- Valentina Studio --
-- MySQL dump --
-- ---------------------------------------------------------


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
-- ---------------------------------------------------------


-- CREATE TABLE "activity_category" ----------------------------
CREATE TABLE `activity_category` ( 
	`id` Int( 255 ) AUTO_INCREMENT NOT NULL,
	`parent_category` Int( 255 ) NULL,
	`selectable` Enum( 'Y', 'N' ) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
	`name` VarChar( 50 ) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
	`slug` VarChar( 50 ) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
	`fields` Text CHARACTER SET utf8 COLLATE utf8_general_ci NULL,
	`type` Enum( 'Non Lomba', 'Lomba Nasional', 'Lomba International' ) CHARACTER SET utf8 COLLATE utf8_general_ci NULL,
	`status` Enum( 'Y', 'N' ) CHARACTER SET utf8 COLLATE utf8_general_ci NULL,
	`icon` VarChar( 30 ) CHARACTER SET utf8 COLLATE utf8_general_ci NULL,
	PRIMARY KEY ( `id` ) )
CHARACTER SET = utf8
COLLATE = utf8_general_ci
ENGINE = InnoDB
AUTO_INCREMENT = 7;
-- -------------------------------------------------------------


-- CREATE TABLE "admin_groups" ---------------------------------
CREATE TABLE `admin_groups` ( 
	`id` MediumInt( 8 ) UNSIGNED AUTO_INCREMENT NOT NULL,
	`name` VarChar( 20 ) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
	`description` VarChar( 100 ) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
	PRIMARY KEY ( `id` ) )
CHARACTER SET = utf8
COLLATE = utf8_general_ci
ENGINE = InnoDB
AUTO_INCREMENT = 5;
-- -------------------------------------------------------------


-- CREATE TABLE "admin_login_attempts" -------------------------
CREATE TABLE `admin_login_attempts` ( 
	`id` Int( 11 ) UNSIGNED AUTO_INCREMENT NOT NULL,
	`ip_address` VarChar( 15 ) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
	`login` VarChar( 100 ) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
	`time` Int( 11 ) UNSIGNED NULL,
	PRIMARY KEY ( `id` ) )
CHARACTER SET = utf8
COLLATE = utf8_general_ci
ENGINE = InnoDB
AUTO_INCREMENT = 1;
-- -------------------------------------------------------------


-- CREATE TABLE "admin_users" ----------------------------------
CREATE TABLE `admin_users` ( 
	`id` Int( 11 ) UNSIGNED AUTO_INCREMENT NOT NULL,
	`ip_address` VarChar( 15 ) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
	`username` VarChar( 100 ) CHARACTER SET utf8 COLLATE utf8_general_ci NULL,
	`password` VarChar( 255 ) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
	`salt` VarChar( 255 ) CHARACTER SET utf8 COLLATE utf8_general_ci NULL,
	`email` VarChar( 100 ) CHARACTER SET utf8 COLLATE utf8_general_ci NULL,
	`activation_code` VarChar( 40 ) CHARACTER SET utf8 COLLATE utf8_general_ci NULL,
	`forgotten_password_code` VarChar( 40 ) CHARACTER SET utf8 COLLATE utf8_general_ci NULL,
	`forgotten_password_time` Int( 11 ) UNSIGNED NULL,
	`remember_code` VarChar( 40 ) CHARACTER SET utf8 COLLATE utf8_general_ci NULL,
	`created_on` Int( 11 ) UNSIGNED NOT NULL,
	`last_login` Int( 11 ) UNSIGNED NULL,
	`active` TinyInt( 1 ) UNSIGNED NULL,
	`first_name` VarChar( 50 ) CHARACTER SET utf8 COLLATE utf8_general_ci NULL,
	`last_name` VarChar( 50 ) CHARACTER SET utf8 COLLATE utf8_general_ci NULL,
	PRIMARY KEY ( `id` ) )
CHARACTER SET = utf8
COLLATE = utf8_general_ci
ENGINE = InnoDB
AUTO_INCREMENT = 5;
-- -------------------------------------------------------------


-- CREATE TABLE "admin_users_groups" ---------------------------
CREATE TABLE `admin_users_groups` ( 
	`id` Int( 11 ) UNSIGNED AUTO_INCREMENT NOT NULL,
	`user_id` Int( 11 ) UNSIGNED NOT NULL,
	`group_id` MediumInt( 8 ) UNSIGNED NOT NULL,
	PRIMARY KEY ( `id` ) )
CHARACTER SET = utf8
COLLATE = utf8_general_ci
ENGINE = InnoDB
AUTO_INCREMENT = 5;
-- -------------------------------------------------------------


-- CREATE TABLE "api_access" -----------------------------------
CREATE TABLE `api_access` ( 
	`id` Int( 11 ) UNSIGNED AUTO_INCREMENT NOT NULL,
	`key` VarChar( 40 ) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
	`controller` VarChar( 50 ) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
	`date_created` DateTime NULL,
	`date_modified` Timestamp NOT NULL ON UPDATE CURRENT_TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
	PRIMARY KEY ( `id` ) )
CHARACTER SET = utf8
COLLATE = utf8_general_ci
ENGINE = InnoDB
AUTO_INCREMENT = 1;
-- -------------------------------------------------------------


-- CREATE TABLE "api_keys" -------------------------------------
CREATE TABLE `api_keys` ( 
	`id` Int( 11 ) AUTO_INCREMENT NOT NULL,
	`user_id` Int( 11 ) NOT NULL,
	`key` VarChar( 40 ) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
	`level` Int( 2 ) NOT NULL,
	`ignore_limits` TinyInt( 1 ) NOT NULL DEFAULT 0,
	`is_private_key` TinyInt( 1 ) NOT NULL DEFAULT 0,
	`ip_addresses` Text CHARACTER SET utf8 COLLATE utf8_general_ci NULL,
	`date_created` Int( 11 ) NOT NULL,
	PRIMARY KEY ( `id` ) )
CHARACTER SET = utf8
COLLATE = utf8_general_ci
ENGINE = InnoDB
AUTO_INCREMENT = 2;
-- -------------------------------------------------------------


-- CREATE TABLE "api_limits" -----------------------------------
CREATE TABLE `api_limits` ( 
	`id` Int( 11 ) AUTO_INCREMENT NOT NULL,
	`uri` VarChar( 255 ) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
	`count` Int( 10 ) NOT NULL,
	`hour_started` Int( 11 ) NOT NULL,
	`api_key` VarChar( 40 ) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
	PRIMARY KEY ( `id` ) )
CHARACTER SET = utf8
COLLATE = utf8_general_ci
ENGINE = InnoDB
AUTO_INCREMENT = 1;
-- -------------------------------------------------------------


-- CREATE TABLE "api_logs" -------------------------------------
CREATE TABLE `api_logs` ( 
	`id` Int( 11 ) AUTO_INCREMENT NOT NULL,
	`uri` VarChar( 255 ) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
	`method` VarChar( 6 ) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
	`params` Text CHARACTER SET utf8 COLLATE utf8_general_ci NULL,
	`api_key` VarChar( 40 ) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
	`ip_address` VarChar( 45 ) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
	`time` Int( 11 ) NOT NULL,
	`rtime` Float( 12, 0 ) NULL,
	`authorized` VarChar( 1 ) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
	`response_code` Smallint( 3 ) NULL DEFAULT 0,
	PRIMARY KEY ( `id` ) )
CHARACTER SET = utf8
COLLATE = utf8_general_ci
ENGINE = InnoDB
AUTO_INCREMENT = 1;
-- -------------------------------------------------------------


-- CREATE TABLE "blog_categories" ------------------------------
CREATE TABLE `blog_categories` ( 
	`id` Int( 11 ) AUTO_INCREMENT NOT NULL,
	`pos` Int( 11 ) NOT NULL DEFAULT 0,
	`title` VarChar( 100 ) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
	PRIMARY KEY ( `id` ) )
CHARACTER SET = utf8
COLLATE = utf8_unicode_ci
ENGINE = InnoDB
AUTO_INCREMENT = 4;
-- -------------------------------------------------------------


-- CREATE TABLE "blog_posts" -----------------------------------
CREATE TABLE `blog_posts` ( 
	`id` Int( 11 ) AUTO_INCREMENT NOT NULL,
	`category_id` Int( 11 ) NOT NULL DEFAULT 1,
	`author_id` Int( 11 ) NOT NULL,
	`title` VarChar( 300 ) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
	`image_url` VarChar( 300 ) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
	`content_brief` Text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
	`content` Text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
	`publish_time` Timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
	`status` Enum( 'draft', 'active', 'hidden' ) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL DEFAULT 'draft',
	PRIMARY KEY ( `id` ) )
CHARACTER SET = utf8
COLLATE = utf8_unicode_ci
ENGINE = InnoDB
AUTO_INCREMENT = 3;
-- -------------------------------------------------------------


-- CREATE TABLE "blog_posts_tags" ------------------------------
CREATE TABLE `blog_posts_tags` ( 
	`id` Int( 11 ) AUTO_INCREMENT NOT NULL,
	`post_id` Int( 11 ) NOT NULL,
	`tag_id` Int( 11 ) NOT NULL,
	PRIMARY KEY ( `id` ) )
CHARACTER SET = utf8
COLLATE = utf8_unicode_ci
ENGINE = InnoDB
AUTO_INCREMENT = 4;
-- -------------------------------------------------------------


-- CREATE TABLE "blog_tags" ------------------------------------
CREATE TABLE `blog_tags` ( 
	`id` Int( 11 ) AUTO_INCREMENT NOT NULL,
	`title` VarChar( 100 ) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
	PRIMARY KEY ( `id` ) )
CHARACTER SET = utf8
COLLATE = utf8_unicode_ci
ENGINE = InnoDB
AUTO_INCREMENT = 5;
-- -------------------------------------------------------------


-- CREATE TABLE "cover_photos" ---------------------------------
CREATE TABLE `cover_photos` ( 
	`id` Int( 11 ) AUTO_INCREMENT NOT NULL,
	`pos` Int( 11 ) NOT NULL DEFAULT 0,
	`image_url` VarChar( 300 ) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
	`status` Enum( 'active', 'hidden' ) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL DEFAULT 'active',
	PRIMARY KEY ( `id` ) )
CHARACTER SET = utf8
COLLATE = utf8_unicode_ci
ENGINE = InnoDB
AUTO_INCREMENT = 4;
-- -------------------------------------------------------------


-- CREATE TABLE "cpl" ------------------------------------------
CREATE TABLE `cpl` ( 
	`id_cpl` Int( 11 ) AUTO_INCREMENT NOT NULL,
	`deskripsi` Text CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
	`id_kategori_cpl` Int( 11 ) NOT NULL,
	PRIMARY KEY ( `id_cpl` ) )
CHARACTER SET = latin1
COLLATE = latin1_swedish_ci
ENGINE = InnoDB
AUTO_INCREMENT = 35;
-- -------------------------------------------------------------


-- CREATE TABLE "fakultas" -------------------------------------
CREATE TABLE `fakultas` ( 
	`id` Int( 11 ) AUTO_INCREMENT NOT NULL,
	`name` VarChar( 255 ) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
	CONSTRAINT `unique_id` UNIQUE( `id` ) )
CHARACTER SET = utf8
COLLATE = utf8_general_ci
ENGINE = InnoDB
AUTO_INCREMENT = 4;
-- -------------------------------------------------------------


-- CREATE TABLE "groups" ---------------------------------------
CREATE TABLE `groups` ( 
	`id` MediumInt( 8 ) UNSIGNED AUTO_INCREMENT NOT NULL,
	`name` VarChar( 20 ) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
	`description` VarChar( 100 ) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
	PRIMARY KEY ( `id` ) )
CHARACTER SET = utf8
COLLATE = utf8_general_ci
ENGINE = InnoDB
AUTO_INCREMENT = 2;
-- -------------------------------------------------------------


-- CREATE TABLE "informasi" ------------------------------------
CREATE TABLE `informasi` ( 
	`id_informasi` Int( 11 ) AUTO_INCREMENT NOT NULL,
	`nm_informasi` VarChar( 75 ) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
	`isi_informasi` Text CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
	`tampil_skpi` Enum( 'N', 'Y' ) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
	PRIMARY KEY ( `id_informasi` ) )
CHARACTER SET = latin1
COLLATE = latin1_swedish_ci
ENGINE = InnoDB
AUTO_INCREMENT = 15;
-- -------------------------------------------------------------


-- CREATE TABLE "jenis_kegiatan" -------------------------------
CREATE TABLE `jenis_kegiatan` ( 
	`id_jenis_kegiatan` Int( 11 ) AUTO_INCREMENT NOT NULL,
	`nm_jenis_kegiatan` VarChar( 225 ) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
	`jenis_kegiatan` Enum( 'Wajib', 'Tidak Wajib' ) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
	PRIMARY KEY ( `id_jenis_kegiatan` ) )
CHARACTER SET = latin1
COLLATE = latin1_swedish_ci
ENGINE = InnoDB
AUTO_INCREMENT = 6;
-- -------------------------------------------------------------


-- CREATE TABLE "kategori_cpl" ---------------------------------
CREATE TABLE `kategori_cpl` ( 
	`id_kategori_cpl` Int( 11 ) AUTO_INCREMENT NOT NULL,
	`nm_kategori_cpl` VarChar( 100 ) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
	PRIMARY KEY ( `id_kategori_cpl` ) )
CHARACTER SET = latin1
COLLATE = latin1_swedish_ci
ENGINE = InnoDB
AUTO_INCREMENT = 7;
-- -------------------------------------------------------------


-- CREATE TABLE "kegiatan" -------------------------------------
CREATE TABLE `kegiatan` ( 
	`id_kegiatan` Int( 11 ) AUTO_INCREMENT NOT NULL,
	`nm_kegiatan` Text CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
	`dasar_penilaian` VarChar( 75 ) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
	`id_jenis_kegiatan` Int( 11 ) NOT NULL,
	PRIMARY KEY ( `id_kegiatan` ) )
CHARACTER SET = latin1
COLLATE = latin1_swedish_ci
ENGINE = InnoDB
AUTO_INCREMENT = 58;
-- -------------------------------------------------------------


-- CREATE TABLE "login_attempts" -------------------------------
CREATE TABLE `login_attempts` ( 
	`id` Int( 11 ) UNSIGNED AUTO_INCREMENT NOT NULL,
	`ip_address` VarChar( 15 ) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
	`login` VarChar( 100 ) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
	`time` Int( 11 ) UNSIGNED NULL,
	PRIMARY KEY ( `id` ) )
CHARACTER SET = utf8
COLLATE = utf8_general_ci
ENGINE = InnoDB
AUTO_INCREMENT = 1;
-- -------------------------------------------------------------


-- CREATE TABLE "magang" ---------------------------------------
CREATE TABLE `magang` ( 
	`id_magang` Int( 10 ) AUTO_INCREMENT NOT NULL,
	`npm_mhs` Int( 10 ) NOT NULL,
	`judul_keg_magang` Text CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
	`tempat_magang` VarChar( 85 ) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
	`tglmulai_magang` Date NOT NULL,
	`tglselesai_magang` Date NOT NULL,
	`surat_magang` VarChar( 225 ) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
	PRIMARY KEY ( `id_magang` ) )
CHARACTER SET = latin1
COLLATE = latin1_swedish_ci
ENGINE = InnoDB
AUTO_INCREMENT = 44;
-- -------------------------------------------------------------


-- CREATE TABLE "mahasiswa" ------------------------------------
CREATE TABLE `mahasiswa` ( 
	`npm_mhs` Int( 10 ) NOT NULL,
	`nama_mhs` VarChar( 75 ) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
	`tempatlahir_mhs` VarChar( 75 ) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
	`tanggallahir_mhs` Date NOT NULL,
	`id_prodi` Int( 11 ) NOT NULL,
	`tahun_masuk` Int( 4 ) NOT NULL,
	`password` VarChar( 100 ) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
	`layak_skpi` Enum( 'N', 'Y' ) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
	PRIMARY KEY ( `npm_mhs` ) )
CHARACTER SET = latin1
COLLATE = latin1_swedish_ci
ENGINE = InnoDB;
-- -------------------------------------------------------------


-- CREATE TABLE "penilaian_skke" -------------------------------
CREATE TABLE `penilaian_skke` ( 
	`id_penilaian_skke` Int( 11 ) AUTO_INCREMENT NOT NULL,
	`id_kegiatan` Int( 11 ) NOT NULL,
	`id_tingkat_kegiatan` Int( 11 ) NOT NULL,
	`nilai_prestasi` VarChar( 45 ) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
	`nilai_bobot` Int( 11 ) NOT NULL,
	PRIMARY KEY ( `id_penilaian_skke` ) )
CHARACTER SET = latin1
COLLATE = latin1_swedish_ci
ENGINE = InnoDB
AUTO_INCREMENT = 274;
-- -------------------------------------------------------------


-- CREATE TABLE "prodi" ----------------------------------------
CREATE TABLE `prodi` ( 
	`id_prodi` Int( 11 ) AUTO_INCREMENT NOT NULL,
	`nm_prodi` VarChar( 45 ) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
	`inisial` VarChar( 3 ) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
	`fakultas_id` Int( 11 ) NOT NULL,
	PRIMARY KEY ( `id_prodi` ) )
CHARACTER SET = latin1
COLLATE = latin1_swedish_ci
ENGINE = InnoDB
AUTO_INCREMENT = 7;
-- -------------------------------------------------------------


-- CREATE TABLE "profil_lulusan" -------------------------------
CREATE TABLE `profil_lulusan` ( 
	`id_profil` Int( 11 ) AUTO_INCREMENT NOT NULL,
	`deskripsi` Text CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
	PRIMARY KEY ( `id_profil` ) )
CHARACTER SET = latin1
COLLATE = latin1_swedish_ci
ENGINE = InnoDB
AUTO_INCREMENT = 4;
-- -------------------------------------------------------------


-- CREATE TABLE "skke" -----------------------------------------
CREATE TABLE `skke` ( 
	`id_skke` Int( 10 ) AUTO_INCREMENT NOT NULL,
	`npm_mhs` Int( 10 ) NOT NULL,
	`id_jenis_kegiatan` Int( 11 ) NOT NULL,
	`id_kegiatan` Int( 11 ) NOT NULL,
	`nama_kegiatan` VarChar( 225 ) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
	`id_tingkat_kegiatan` Int( 11 ) NOT NULL,
	`prestasi` VarChar( 45 ) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
	`bobot` Int( 11 ) NOT NULL,
	`deskripsi` Text CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
	`tgl_mulai` Date NOT NULL,
	`tgl_selesai` Date NOT NULL,
	`tgl_sertifikat` Date NOT NULL,
	`instansi_sertifikat` VarChar( 225 ) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
	`dasar_penilaian` VarChar( 225 ) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
	`photo` Text CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
	`tgl_isi` Date NOT NULL,
	PRIMARY KEY ( `id_skke` ) )
CHARACTER SET = latin1
COLLATE = latin1_swedish_ci
ENGINE = InnoDB
AUTO_INCREMENT = 206;
-- -------------------------------------------------------------


-- CREATE TABLE "skke_angkatan" --------------------------------
CREATE TABLE `skke_angkatan` ( 
	`id_skkeangkatan` Int( 10 ) AUTO_INCREMENT NOT NULL,
	`angkatan` Int( 4 ) NOT NULL,
	`skke_minimum` Int( 4 ) NOT NULL,
	PRIMARY KEY ( `id_skkeangkatan` ) )
CHARACTER SET = latin1
COLLATE = latin1_swedish_ci
ENGINE = InnoDB
AUTO_INCREMENT = 9;
-- -------------------------------------------------------------


-- CREATE TABLE "skpi" -----------------------------------------
CREATE TABLE `skpi` ( 
	`id_skpi` Int( 10 ) AUTO_INCREMENT NOT NULL,
	`npm_mhs` Int( 10 ) NOT NULL,
	`no_skpi` VarChar( 75 ) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
	`tgl_terbuat` Date NOT NULL,
	`thn_lulus` Year NOT NULL,
	`no_ijazah` VarChar( 75 ) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
	`gelar` VarChar( 75 ) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
	`lama_studireg` Int( 11 ) NOT NULL,
	PRIMARY KEY ( `id_skpi` ) )
CHARACTER SET = latin1
COLLATE = latin1_swedish_ci
ENGINE = InnoDB
AUTO_INCREMENT = 29;
-- -------------------------------------------------------------


-- CREATE TABLE "skripsi" --------------------------------------
CREATE TABLE `skripsi` ( 
	`id_skripsi` Int( 10 ) AUTO_INCREMENT NOT NULL,
	`judul_skripsi` Text CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
	`deskripsi_skripsi` Text CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
	`tgl_surattugas` Date NOT NULL,
	`tgl_lulussidang` Date NOT NULL,
	`npm_mhs` Int( 10 ) NOT NULL,
	`surat_tugas` VarChar( 225 ) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
	`surat_selesai` VarChar( 225 ) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
	PRIMARY KEY ( `id_skripsi` ) )
CHARACTER SET = latin1
COLLATE = latin1_swedish_ci
ENGINE = InnoDB
AUTO_INCREMENT = 31;
-- -------------------------------------------------------------


-- CREATE TABLE "tingkat_kegiatan" -----------------------------
CREATE TABLE `tingkat_kegiatan` ( 
	`id_tingkat_kegiatan` Int( 11 ) AUTO_INCREMENT NOT NULL,
	`nm_tingkat_kegiatan` VarChar( 225 ) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
	PRIMARY KEY ( `id_tingkat_kegiatan` ) )
CHARACTER SET = latin1
COLLATE = latin1_swedish_ci
ENGINE = InnoDB
AUTO_INCREMENT = 36;
-- -------------------------------------------------------------


-- CREATE TABLE "user" -----------------------------------------
CREATE TABLE `user` ( 
	`id_user` Int( 10 ) AUTO_INCREMENT NOT NULL,
	`level` VarChar( 30 ) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
	`username` VarChar( 45 ) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
	`password` VarChar( 30 ) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
	`nama_user` VarChar( 45 ) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
	`hp_user` VarChar( 12 ) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
	`email_user` VarChar( 45 ) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
	`aktif` Enum( 'Y', 'N' ) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
	`nik` VarChar( 75 ) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
	`jabatan` VarChar( 75 ) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
	`unit` VarChar( 75 ) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
	PRIMARY KEY ( `id_user` ) )
CHARACTER SET = latin1
COLLATE = latin1_swedish_ci
ENGINE = InnoDB
AUTO_INCREMENT = 7;
-- -------------------------------------------------------------


-- CREATE TABLE "users" ----------------------------------------
CREATE TABLE `users` ( 
	`id` Int( 11 ) UNSIGNED AUTO_INCREMENT NOT NULL,
	`ip_address` VarChar( 15 ) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
	`username` VarChar( 100 ) CHARACTER SET utf8 COLLATE utf8_general_ci NULL,
	`password` VarChar( 255 ) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
	`salt` VarChar( 255 ) CHARACTER SET utf8 COLLATE utf8_general_ci NULL,
	`email` VarChar( 100 ) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
	`activation_code` VarChar( 40 ) CHARACTER SET utf8 COLLATE utf8_general_ci NULL,
	`forgotten_password_code` VarChar( 40 ) CHARACTER SET utf8 COLLATE utf8_general_ci NULL,
	`forgotten_password_time` Int( 11 ) UNSIGNED NULL,
	`remember_code` VarChar( 40 ) CHARACTER SET utf8 COLLATE utf8_general_ci NULL,
	`created_on` Int( 11 ) UNSIGNED NOT NULL,
	`last_login` Int( 11 ) UNSIGNED NULL,
	`active` TinyInt( 1 ) UNSIGNED NULL,
	`first_name` VarChar( 50 ) CHARACTER SET utf8 COLLATE utf8_general_ci NULL,
	`last_name` VarChar( 50 ) CHARACTER SET utf8 COLLATE utf8_general_ci NULL,
	`company` VarChar( 100 ) CHARACTER SET utf8 COLLATE utf8_general_ci NULL,
	`phone` VarChar( 20 ) CHARACTER SET utf8 COLLATE utf8_general_ci NULL,
	`about` Text CHARACTER SET utf8 COLLATE utf8_general_ci NULL,
	PRIMARY KEY ( `id` ) )
CHARACTER SET = utf8
COLLATE = utf8_general_ci
ENGINE = InnoDB
AUTO_INCREMENT = 2;
-- -------------------------------------------------------------


-- CREATE TABLE "users_groups" ---------------------------------
CREATE TABLE `users_groups` ( 
	`id` Int( 11 ) UNSIGNED AUTO_INCREMENT NOT NULL,
	`user_id` Int( 11 ) UNSIGNED NOT NULL,
	`group_id` MediumInt( 8 ) UNSIGNED NOT NULL,
	PRIMARY KEY ( `id` ) )
CHARACTER SET = utf8
COLLATE = utf8_general_ci
ENGINE = InnoDB
AUTO_INCREMENT = 2;
-- -------------------------------------------------------------


-- Dump data of "activity_category" ------------------------
INSERT INTO `activity_category`(`id`,`parent_category`,`selectable`,`name`,`slug`,`fields`,`type`,`status`,`icon`) VALUES 
( '1', NULL, 'Y', 'Kegiatan', '', NULL, NULL, 'Y', 'fa fa-table' ),
( '2', '1', 'Y', 'Non Lomba', '', '<p>asd</p>
', NULL, 'Y', NULL ),
( '3', '1', 'Y', 'Lomba Nasional', '', NULL, NULL, 'Y', NULL ),
( '4', '1', 'Y', 'Lomba International', '', NULL, NULL, 'Y', NULL ),
( '5', '2', 'N', 'Wirausaha', '', NULL, 'Non Lomba', 'Y', '' ),
( '6', '3', 'N', 'test', '', '<p>[ { &quot;tag&quot;: &quot;input&quot; } ]</p>
', NULL, 'Y', NULL );
-- ---------------------------------------------------------


-- Dump data of "admin_groups" -----------------------------
INSERT INTO `admin_groups`(`id`,`name`,`description`) VALUES 
( '1', 'webmaster', 'Webmaster' ),
( '2', 'admin', 'Administrator' ),
( '3', 'manager', 'Manager' ),
( '4', 'staff', 'Staff' );
-- ---------------------------------------------------------


-- Dump data of "admin_login_attempts" ---------------------
-- ---------------------------------------------------------


-- Dump data of "admin_users" ------------------------------
INSERT INTO `admin_users`(`id`,`ip_address`,`username`,`password`,`salt`,`email`,`activation_code`,`forgotten_password_code`,`forgotten_password_time`,`remember_code`,`created_on`,`last_login`,`active`,`first_name`,`last_name`) VALUES 
( '1', '127.0.0.1', 'webmaster', '$2y$08$/X5gzWjesYi78GqeAv5tA.dVGBVP7C1e1PzqnYCVe5s1qhlDIPPES', NULL, NULL, NULL, NULL, NULL, NULL, '1451900190', '1572962307', '1', 'Webmaster', NULL ),
( '2', '127.0.0.1', 'admin', '$2y$08$7Bkco6JXtC3Hu6g9ngLZDuHsFLvT7cyAxiz1FzxlX5vwccvRT7nKW', NULL, NULL, NULL, NULL, NULL, NULL, '1451900228', '1572067926', '1', 'Admin', '' ),
( '3', '127.0.0.1', 'manager', '$2y$08$snzIJdFXvg/rSHe0SndIAuvZyjktkjUxBXkrrGdkPy1K6r5r/dMLa', NULL, NULL, NULL, NULL, NULL, NULL, '1451900430', '1465489585', '1', 'Manager', '' ),
( '4', '127.0.0.1', 'staff', '$2y$08$NigAXjN23CRKllqe3KmjYuWXD5iSRPY812SijlhGeKfkrMKde9da6', NULL, NULL, NULL, NULL, NULL, NULL, '1451900439', '1465489590', '1', 'Staff', '' );
-- ---------------------------------------------------------


-- Dump data of "admin_users_groups" -----------------------
INSERT INTO `admin_users_groups`(`id`,`user_id`,`group_id`) VALUES 
( '1', '1', '1' ),
( '2', '2', '2' ),
( '3', '3', '3' ),
( '4', '4', '4' );
-- ---------------------------------------------------------


-- Dump data of "api_access" -------------------------------
-- ---------------------------------------------------------


-- Dump data of "api_keys" ---------------------------------
INSERT INTO `api_keys`(`id`,`user_id`,`key`,`level`,`ignore_limits`,`is_private_key`,`ip_addresses`,`date_created`) VALUES 
( '1', '0', 'anonymous', '1', '1', '0', NULL, '1463388382' );
-- ---------------------------------------------------------


-- Dump data of "api_limits" -------------------------------
-- ---------------------------------------------------------


-- Dump data of "api_logs" ---------------------------------
-- ---------------------------------------------------------


-- Dump data of "blog_categories" --------------------------
INSERT INTO `blog_categories`(`id`,`pos`,`title`) VALUES 
( '1', '1', 'Category 1' ),
( '2', '2', 'Category 2' ),
( '3', '3', 'Category 3' );
-- ---------------------------------------------------------


-- Dump data of "blog_posts" -------------------------------
INSERT INTO `blog_posts`(`id`,`category_id`,`author_id`,`title`,`image_url`,`content_brief`,`content`,`publish_time`,`status`) VALUES 
( '1', '1', '2', 'Blog Post 1', '', '<p>
	Blog Post 1 Content Brief</p>
', '<p>
	Blog Post 1 Content</p>
', '2015-09-26 07:00:00', 'active' ),
( '2', '2', '2', '', '', '', '', '0000-00-00 00:00:00', 'draft' );
-- ---------------------------------------------------------


-- Dump data of "blog_posts_tags" --------------------------
INSERT INTO `blog_posts_tags`(`id`,`post_id`,`tag_id`) VALUES 
( '1', '1', '2' ),
( '2', '1', '1' ),
( '3', '1', '3' );
-- ---------------------------------------------------------


-- Dump data of "blog_tags" --------------------------------
INSERT INTO `blog_tags`(`id`,`title`) VALUES 
( '1', 'Tag 1' ),
( '2', 'Tag 2' ),
( '3', 'Tag 3' ),
( '4', 'a' );
-- ---------------------------------------------------------


-- Dump data of "cover_photos" -----------------------------
INSERT INTO `cover_photos`(`id`,`pos`,`image_url`,`status`) VALUES 
( '1', '2', '45296-2.jpg', 'active' ),
( '2', '1', '2934f-1.jpg', 'active' ),
( '3', '3', '3717d-3.jpg', 'active' );
-- ---------------------------------------------------------


-- Dump data of "cpl" --------------------------------------
INSERT INTO `cpl`(`id_cpl`,`deskripsi`,`id_kategori_cpl`) VALUES 
( '1', 'Bertakwa kepada Tuhan Yang Maha Esa dan mampu menunjukkan sikap religious.', '1' ),
( '2', 'Menjunjung tinggi nilai kemanusiaan dalam menjalankan tugas berdasarkan agama, moral, dan etika.', '1' ),
( '3', 'Dapat berperan sebagai warga negara yang bangga dan cinta tanah air, memiliki nasionalisme serta rasa tanggungjawab pada negara dan bangsa.', '1' ),
( '4', 'Dapat berkontribusi dalam peningkatan mutu kehidupan bermasyarakat, berbangsa, dan bernegara berdasarkan Pancasila.', '1' ),
( '5', 'Dapat bekerja sama dan mimiliki kepekaan sosial serta kepedulian terhadap masyarakat dan lingkungan.', '1' ),
( '6', 'Dapat menghargai keanekaragaman budaya, pandangan, agama, dan kepercayaan, serta pendapat atau temuan orisinal orang lain.', '1' ),
( '7', 'Taat hukum dan disiplin dalam kehidupan bermasyarakat dan bernegara.', '1' ),
( '8', 'Menunjukkan sikap bertanggungjawab atas pekerjaan di bidang keahliannya secara mandiri.', '1' ),
( '9', 'Menginternalisasi nilai, norma, dan etika akademik.', '1' ),
( '10', 'Menginternalisasi semangat kemandirian, kejuangan, dan kewirausahaan.', '1' ),
( '11', 'Menjalani kehidupannya sebagai seorang muslim yang saleh dan taat tanpa terikat ruang dan waktu.', '1' ),
( '12', 'Menjadi muslim yang ScoRe (Smart, Compassionate, Reliable) To be a Smart Moslem (fathonah) To be a Compassionate Moslem (bersyukur, pemaaf, sabar, santun, dan bijak) To be a Reliable Moslem (Kokoh, Shidiq, Amanah, Tabligh).', '1' ),
( '13', 'Memiliki pengetahuan tentang dasar-dasar Islam.', '2' ),
( '14', 'Menginternalisasi karakteristik islami dalam keseharian dan berinteraksi dengan masyarakat.', '2' ),
( '15', 'Mampu meninjau bidang keahlian menurut pandangan agama Islam.', '2' ),
( '16', 'Mampu mengimplementasikan ilmu bidang keahliannya untuk menyelesaikan permasalahan di masyarakat.', '2' ),
( '18', 'Menguasai konsep teoritis bidang pengetahuan informatika secara umum dan konsep teoritis bagian khusus dalam bidang pengetahuan tersebut secara mendalam, serta mampu memformulasikan penyelesaian masalah procedural.', '4' ),
( '19', 'Memiliki pengetahuan yang memadai terkait dengan cara kerja sistem komputer dan mampu merancang dan mengembangkan berbagai algoritma/metode untuk memecahkan masalah.', '4' ),
( '20', 'Mempunyai pengetahuan dalam mengembangkan algoritma/metode yang diimplementasikan dalam perangkat lunak berbasis komputer.', '4' ),
( '21', 'Mampu menerapkan pemikiran logis, kritis, sistematis, dan inovatif dalam konteks pengembangan atau implementasi ilmu pengetahuan dan teknologi yang memperlihatkan dan menerapkan nilai humaniora yang sesuai dengan bidang keahliannya.', '5' ),
( '22', 'Mampu menunjukkan kinerja mandiri, bermutu, dan terukur.', '5' ),
( '23', 'Mampu mengkaji implikasi pengetahuan atau implementasi ilmu 
pengetahuan teknologi yang memperhatikan dan menerapkan nilai humaniora sesuai dengan keahliannya berdasarkan kaidah, tata cara dan etika ilmiah dalam rangka menghasilkan solusi, gagasan, desai atau kritik seni, menyusun deskripsi saintifik hasil kajiannya dalam bentuk skripsi atau laporan tugas akhir, dan mengunggahnya dalam laman perguruan tinggi.', '5' ),
( '24', 'Menyusun deskripsi saintifik hasil kajian tersebut di atas dalam bentuk skripsi atau laporan tugas akhir, dan mengunggahnya dalam laman perguruan tinggi.', '5' ),
( '25', 'Mampu mengambil keputuan secara tepat dalam konteks penyelesaian masalah di bidang keahliannya, berdasarkan hasil analisis informasi dan data.', '5' ),
( '26', 'Mampu memelihara dan mengembangkan jaringan kerja dengan pembimbing, kolega, sejawat baik di dalam maupun luar lembaganya.', '5' ),
( '27', 'Mampu bertanggungjawab atas pencapaian hasil kerja kelompok dan melakukan supervise dan evaluasi terhadap penyelesaian pekerjaan â€“yang ditugaskan kepada pekerja yang berada di bawh tanggungjawabnya.', '5' ),
( '28', 'Mampu melakukan proses evaluasi diri terhadap kelompok kerja yang berada di bawah tanggung jawabnya, dan mampu mengelola pembelajaran secara mandiri.', '5' ),
( '29', 'Mampu mendokumentasikan, menyimpan, mengamankan, dan menemukan kembali data untuk menjamin kesahihan dan mencegah plagiasi.', '5' ),
( '30', 'Mempunyai kemampuan dalam mendefinisikan kebutuhan pengguna atau pasar terhadap kinerja (menganalisis, mengevaluasi dan mengembangkan) algoritma/metode berbasis komputer.', '5' ),
( '31', 'Memiliki kemampuan (pengelolaan) manajerial tim dan kerja sama (team work), manajemen diri, mampu berkomunikasi baik lisan maupun tertulis dengan baik dan mampu melakukan presentasi.', '5' ),
( '32', 'Mampu menghasilkan aplikasi yang dapat membantu proses bisnis terutama bidang e-health.', '6' ),
( '33', 'Mampu merancang aplikasi untuk keperluan seperti sistem cerdas, grafika visual, pengelolaan informasi dan data, serta jaringan dan komunikasi.', '6' ),
( '34', '<p>asd</p>
', '6' );
-- ---------------------------------------------------------


-- Dump data of "fakultas" ---------------------------------
INSERT INTO `fakultas`(`id`,`name`) VALUES 
( '1', 'Teknik Informasi' ),
( '2', 'Fakultas Kesehatan & Kedokteran' ),
( '3', 'Fakultas Hukum' );
-- ---------------------------------------------------------


-- Dump data of "groups" -----------------------------------
INSERT INTO `groups`(`id`,`name`,`description`) VALUES 
( '1', 'members', 'General User' );
-- ---------------------------------------------------------


-- Dump data of "informasi" --------------------------------
INSERT INTO `informasi`(`id_informasi`,`nm_informasi`,`isi_informasi`,`tampil_skpi`) VALUES 
( '1', 'Visi & Misi Universitas YARSI', '<p><i><b></b></i></p><blockquote><p><b>Universitas YARSI</b><br></p><p><b><br></b></p><p>
</p><p><b></b><b>Visi</b></p>
<p>"Mewujudkan perguruan Tinggi Islam yang terpandang, berwibawa, 
bermutu tinggi dan mampu bersaing dalam fora nasional maupun  
Internasional dan termasuk dalam kelompok 500 perguruan tinggi terbaik 
dunia di akhir tahun 2020"</p>
<p>&nbsp;</p>
<p><b>Misi</b></p>
<ol>
<li>Mengembangkan ilmu pengetahuan, teknologi, dan seni, melalui 
pendidikan, pengajaran dan pembelajaran yang unggul dan bermutu tinggi 
sesuai Islam</li>
<li>Mengembangkan ilmu pengetahuan, teknologi dan seni, melalui 
pengkajian, penelitian dan publikasi yang unggul dan bermutu tinggi 
sesuai Islam</li>
<li>Mengembangkan ilmu pengetahuan, teknologi, dan seni, yang dapat 
menjawab masalah dan tantangan masyarakat dunia yang unggul dan bermutu 
tinggi sesuai Islam</li>
<li>Mengembangkan sumberdaya manusia dan tata kelola yang dapat menjawab
 persoalan yang timbul di masyarakat serta memberi arah perubahan dalam 
rangka membangun masyarakat dunia, khususnya masyarakat Indonesia yang 
adil, makmur, merata dan beradab sesuai Islam.</li></ol><p></p><b><ol>
</ol>

</b><p></p></blockquote>', 'N' ),
( '2', 'Visi & Misi Prodi TI', '<h4><b></b></h4>

<div><b>Visi, Misi, dan Tujuan</b></div><div><b>Program Studi Teknik Informatika</b></div><div></div><div><b>Universitas YARSI</b></div><br><p></p><p></p><div><div><div><div><b>Visi</b></div><b><br></b></div><i>"</i><i>Menjadi Program Studi Teknik Informatika yang berkarakteristik Islam dan mampu bersaing dalam fora nasional maupun internasional pada akhir tahun 2020"</i><br><i></i></div><i></i><br></div><p><b>Misi</b></p><ol><li>Menyelenggarakan pendidikan, pengajaran, dan pembelajaran bertaraf internasional di bidang teknik informatika yang unggul, bermutu tinggi, dan berkarakteristik Islammelalui pengembangan kompetensi terutama di bidang <i>e-Health</i>.</li><li>Meningkatkan kegiatan penelitian dan publikasi ilmiah yang unggul, bermutu tinggi, Â­Â­dan berkarakteristik Islam terutama di bidang <i>e-Health</i>.</li><li>Meningkatkan peran serta dan kontribusi dalam memecahkan berbagai permasalahan dalam masyarakat, bangsa, dan negara dengan memanfaatkan Teknologi Informasi dan Komunikasi (TIK).</li><li>Meningkatkan sumber daya dan tata kelola Program Studi yang baik.</li></ol><div><br></div><div><p><b>Tujuan</b></p><p></p><ol><li>Menghasilkan lulusan yang berkarakteristik Islam yang mempunyai kompetensi di bidang Manajemen Data dan Informasi, Komputasional Cerdas, dan atau Jaringan Komputer dan Komunikasi.</li><li>Menghasilkan lulusan berstandar internasional dengan memiliki sertifikat bertaraf internasional dan mampu berbahasa Inggris secara aktif.</li><li>Menjadi pelopor penelitian di bidang e-Health guna memecahkan masalah lokal dan global.</li><li>Membantu meningkatkan mutu hidup masyarakat yang lebih baik melalui pengabdian kepada masyarakat di bidang teknologi informasi.</li></ol></div>

<p><br></p>', 'N' ),
( '3', 'SK PENDIRIAN PERGURUAN TINGGI', 'No: 115/BA-PEMB/BA-PWING/YRS/X/1987, Tanggal 5 OKTOBER 1987', 'Y' ),
( '4', 'NAMA PERGURUAN TINGGI', '<p>Universitas YARSI</p>', 'Y' ),
( '5', 'PROGRAM STUDI', '<p>Teknologi Informasi</p><p>Kelas: Reguler</p><p>Program: Teknik Informatika</p>', 'Y' ),
( '6', 'JENIS & JENJANG PENDIDIKAN', 'Akademik &amp; Sarjana (Strata 1)', 'Y' ),
( '7', 'JENJANG KUALIFIKASI SESUAI KKNI', '<p>Level 6</p>', 'Y' ),
( '8', 'PERSYARATAN PENERIMAAN', 'Lulus pendidikan menengah atas/sederajat', 'Y' ),
( '9', 'BAHASA PENGANTAR KULIAH', '<p>Indonesia</p>', 'Y' ),
( '10', 'Visi & Misi Fakultas TI', '<p>

</p><div><div><b>Visi, Misi, dan Tujuan</b></div><div><b>Fakultas Teknologi Informasi</b></div><div></div><div><b>Universitas YARSI</b></div><div><p></p><div><div><div><div><i></i><b>Visi</b></div><div><i>â€œTerwujudnya Fakultas Teknologi Informasi yang berkarakteristik Islam, terpandang, berwibawa, bermutu tinggi, dan mampu bersaing dalam fora nasional maupun internasional sehingga dapat mengantarkan Universitas YARSI menjadi kelompok 500 Universitas terbaik dunia di akhir tahun 2020â€</i></div></div><i></i></div><i></i><br></div><p><b>Misi</b></p><p></p><ol><li>Menyelenggarakan pendidikan, pengajaran, dan pembelajaran berkelas dunia di bidang teknologi informasi yang unggul, bermutu tinggi, dan berkarakteristik Islam melalui pengembangan kompetensi terutama di bidang informatika kesehatan (e-Health) dan perpustakaan digital (digital library).</li><li>Meningkatkan jumlah penelitian dan publikasi ilmiah yang unggul, bermutu tinggi, dan berkarakteristik Islam terutama di bidang informatika kesehatan (e-Health) dan perpustakaan digital (digital library), untuk memecahkan berbagai permasalahan dalam masyarakat, bangsa, dan negara.</li><li>Meningkatkan peran serta dan kontribusi dalam memecahkan berbagai permasalahan dalam masyarakat, bangsa, dan negara melalui kegiatan pengabdian kepada masyarakat dengan memanfaatkan Teknologi Informasi dan Komunikasi (TIK).</li></ol><p></p></div></div><br><p><b>Tujuan</b></p><p></p><ol><li>Menghasilkan lulusan yang berkarakter Islam dan profesional yang mempunyai kompetensi di bidang Manajemen Data dan Informasi, Komputasi Cerdas, dan atau Jaringan Komputer Komunikasi.</li><li>Menjadi fakultas yang bereputasi dan bertata kelola baik (Good Faculty Governance).</li><li>Menghasilkan penelitian yang berkualitas dan inovatif yang mendukung bidang kesehatan (e-Health) dan perpustakaan digital (digital library).</li><li>Menghasilkan publikasi ilmiah dan paten bereputasi nasional dan internasional melalui penelitian dan kerjasama dalam skala lokal, nasional, maupun global.</li><li>Menjadikan fakultas yang dapat membantu meningkatkan kualitas hidup masyarakat melalui kegiatan pengabdian kepada masyarakat.</li></ol>

<br><p></p>', 'N' ),
( '11', 'SKKE Angkatan', '<p><b>Total Bobot SKKE yang harus dicapai agar Mahasiswa memperoleh SKPI adalah:</b></p><p><br>1. Tahun Akademik 2012 adalah 80 SKKE <br><br>2. Tahun Akademik 2013 adalah 80 SKKE <br><br>3. Tahun Akademik 2014 adalah 80 SKKE<br><br>4. Tahun Akademik 2015 adalah 100 SKKE<br><br>5. Tahun Akademik 2016 adalah 110 SKKE<br><br>6. Tahun Akademik 2017 adalah 120 SKKE<br><br>7. Tahun Akademik 2018 adalah 130 SKKE<br></p>', 'N' ),
( '12', 'SISTEM PENILAIAN', '<p>Skala 1-4; A=4, A-=3.75, B+=3.5, B=3, B-=2.75, C+=2.5, C=2, D=1, E=0</p>', 'Y' ),
( '13', 'JENIS & JENJANG PENDIDIKAN LANJUTAN', '<p>Program Magister &amp; Doktoral</p>', 'Y' ),
( '14', 'STATUS PROFESI (BILA ADA)', '<p>-</p>', 'Y' );
-- ---------------------------------------------------------


-- Dump data of "jenis_kegiatan" ---------------------------
INSERT INTO `jenis_kegiatan`(`id_jenis_kegiatan`,`nm_jenis_kegiatan`,`jenis_kegiatan`) VALUES 
( '1', 'Kegiatan Wajib Institusi', 'Wajib' ),
( '2', 'Bidang Penalaran dan Keilmuan', 'Tidak Wajib' ),
( '3', 'Minat, Bakat dan Kerohanian', 'Tidak Wajib' ),
( '4', 'Bidang Organisasi dan Kepemimpinan', 'Tidak Wajib' ),
( '5', 'Bidang Pengabdian kepada Masyarakat', 'Tidak Wajib' );
-- ---------------------------------------------------------


-- Dump data of "kategori_cpl" -----------------------------
INSERT INTO `kategori_cpl`(`id_kategori_cpl`,`nm_kategori_cpl`) VALUES 
( '1', 'Sikap dan Tata Nilai (S)' ),
( '2', 'Kompetensi Umum Penciri Universitas (KU)' ),
( '3', 'Kompetensi Khusus (KK)' ),
( '4', 'Pengetahuan' ),
( '5', 'Keterampilan Umum' ),
( '6', 'Keterampilan Khusus' );
-- ---------------------------------------------------------


-- Dump data of "kegiatan" ---------------------------------
INSERT INTO `kegiatan`(`id_kegiatan`,`nm_kegiatan`,`dasar_penilaian`,`id_jenis_kegiatan`) VALUES 
( '17', 'Pengenalan Kehidupan Kampus Bagi Mahasiswa Baru (PKKMB)', 'Sertifikat', '1' ),
( '18', 'PKM Maba (*1)', 'Sertifikat', '1' ),
( '19', 'Memperoleh prestasi dalam Lomba Karya Tulis Ilmiah/Inovasi/Kreativitas/Pemikiran kritis/Populer/Lingkungan Hidup/Entrepreneurship', 'Sertifikat', '2' ),
( '20', 'Mengikuti Kegiatan Lomba Ilmiah', 'Surat & Bukti Pendaftaran', '2' ),
( '21', 'Mengikuti kegiatan/ forum ilmiah (seminar, lokakarya, workshop, pameran, dll), diluar seminar PKL, TA ', 'Sert./SK/ST', '2' ),
( '22', 'Pertukaran mahasiswa (Student exchange)', 'Sert./SK/ST', '2' ),
( '23', 'Menghasilkan temuan inovasi yang dipatenkan', 'Sert./Paten', '2' ),
( '24', 'Menghasilkan karya ilmiah yang dipublikasikan dalam jurnal/ majalah ilmiah', 'Bukti Fisik', '2' ),
( '26', 'Menghasilakan karya popular yang diterbitkan di surat kabar, majalah (media cetak)', 'Foto Copy Karya', '2' ),
( '27', 'Menghasilkan karya yang didanai oleh pemerintah/pihak lain (*4)', 'SK/ST', '2' ),
( '28', 'Mengikuti kuliah dosen tamu', 'Daftar Hadir / Bukti Hadir', '2' ),
( '29', 'Terlibat dalam kegiatan/ penelitian dengan pihak lain diluar kampus (*5)', 'SK/ST/SKet', '2' ),
( '30', 'Mahasiswa Berprestasi (Mawapres)', 'Sert./SK/ST', '2' ),
( '31', 'Membuat proposal PKM dan telah diunggah', 'SK/S.Ket', '2' ),
( '32', 'Memperoleh pendanaan PKM', 'SK/S.Ket', '2' ),
( '33', 'Mengikuti Pimnas', 'SK/S.Ket', '2' ),
( '34', 'Asisten Lab/Praktikum/Tugas Besar (*6)', 'SK/S.Ket', '2' ),
( '35', 'Memperoleh pengakuan kompetensi', 'Sertifikat', '2' ),
( '36', 'Memperoleh Sertifikat penguasaan Bahasa Inggris yang masih berlaku (*7)', 'Sertifikat', '2' ),
( '37', 'Studi Ekskursi', 'Sertifikat', '2' ),
( '38', 'Pelatihan Keterampilan (S1  plus)', 'Per Sertifikat (dibawah 10 jam)', '2' ),
( '39', 'Pelatihan Keterampilan (S1  plus)', '10 - 40 jam', '2' ),
( '40', 'Pelatihan Keterampilan (S1  plus)', 'Diatas 40 jam', '2' ),
( '41', 'Memperoleh prestasi dalam bidang olah raga, seni, pers, pecinta alam, kerohanian', 'Sert./SK/ST', '3' ),
( '42', 'Mengikuti kegiatan dalam bidang olah raga, seni, pers, pecinta alam, kerohanian', 'Sert./SK/ST', '3' ),
( '43', 'Menjadi pelatih/ pembimbing Kegiatan Minat, Bakat dan Kerohanian', 'Sert./SK/ST', '3' ),
( '44', 'Melaksanakan latihan gabungan', 'Sert./Daftar Hadir', '3' ),
( '45', 'Menghasilkan karya (puisi, seni, konser, teather, musik) yang dipamerkan/ dipentaskan', 'Hasil Karya/Sert.(Kec. Keg. Rutin)', '3' ),
( '46', 'Mengelola Kopma', 'Sert./SK/ST', '3' ),
( '47', 'Mengikuti pelatihan kewirausahaan', 'Sert./SK/ST', '3' ),
( '48', 'Memiliki usaha sendiri', 'Sert./Bukti Kepemilikan', '3' ),
( '49', 'Pengurus Organisasi', 'Sert./SK/ST', '4' ),
( '50', 'Pengurus Organisasi', 'Sert./SK/Kartu Anggota', '4' ),
( '51', 'Mengikuti Latihan Keterampilan Manajemen Mahasiswa (LKMM)', 'Sert./SK/ST', '4' ),
( '52', 'Panitia dalam kegiatan kemahasiswaan', 'Sert./SK/ST', '4' ),
( '53', 'Mengikuti Upacara Bendera (hari-hari besar nasional) (*8)', 'Absensi/Bukti Kehadiran', '4' ),
( '54', 'Mengikuti pelaksanaan bakti sosial (*9)', 'Sert./SK/ST', '5' ),
( '55', 'Bantuan pembimbingan rutin (TPA, PAUD) setiap semester ', 'Sert./SK/ST', '5' ),
( '56', '', '10 - 40 jam', '1' ),
( '57', 'test', 'Absensi/Bukti Kehadiran', '4' );
-- ---------------------------------------------------------


-- Dump data of "login_attempts" ---------------------------
-- ---------------------------------------------------------


-- Dump data of "magang" -----------------------------------
INSERT INTO `magang`(`id_magang`,`npm_mhs`,`judul_keg_magang`,`tempat_magang`,`tglmulai_magang`,`tglselesai_magang`,`surat_magang`) VALUES 
( '7', '1402014053', 'Pengolahan data pada SAP Business Objects/ Business Intelligence (BI)', 'PT Taspen (PERSERO)', '2017-07-19', '2017-08-25', '180804102443magang.jpg' ),
( '8', '1402014041', 'Magang', 'Kementrian Riset dan Teknologi Pendidikan Tinggi', '2016-07-19', '2016-08-22', '18080511551617.jpg' ),
( '9', '1402014001', 'Magang', 'Kementrian Riset dan Teknologi Pendidikan Tinggi', '2017-07-19', '2017-08-22', '18080612084212.jpg' ),
( '11', '1402014034', 'Sistem REVO (Reservasi Online)', 'PT. PGAS Solution', '2017-07-17', '2017-09-15', '180806115231IMG_0007.pdf' ),
( '13', '1402014032', 'Sistem REVO (Reservation Online)', 'PT. PGAS Solution', '2017-07-17', '2017-09-15', '180806115453new doc 2018-08-06 09.06.36_1.jpg' ),
( '14', '1402014023', 'Sistem penjadwalan debarkasih dan embarkasih kapal pelabuhan', 'PT Pelabuhan Indonesia II', '2017-07-03', '2017-08-31', '180806115748IMG-20180806-WA0002.jpg' ),
( '15', '1402014021', 'Sistem Penjadwalan Debarkasi/Embarkasi di Terminal Penumpang', 'PT. Pelabuhan Indonesia II (Persero) Cabang Tanjung Priok', '2017-07-03', '2017-08-31', '180806120211WhatsApp Image 2018-08-06 at 12.01.29.jpeg' ),
( '16', '1402013005', 'Sosialisasi BI Corner & Bedah Buku 5cm', 'Ruang Seminar Ar-Rahim', '2016-04-08', '2016-04-08', '1808060115111.jpeg' ),
( '17', '1402013005', 'Seminar And Workshop "Malware Incident Prevention And Handling For Corporate"', 'Lab Workshop Lantai 5 Universitas YARSI', '2015-06-01', '2005-06-01', '1808060117452.jpeg' ),
( '18', '1402013005', 'Pembekalan Mahasiswa Baru 2015', 'Lantai 5 Universitas YARSI', '2015-08-24', '2015-08-26', '1808060119183.jpeg' ),
( '19', '1402014061', 'Pembuatan Sistem CCTV', 'PT Pelabuhan Tanjung Priok', '2017-07-18', '2017-09-01', '180806024510Dok baru 2018-08-06_15.jpg' ),
( '20', '1402014049', 'Pembuatan Sistem CCTV', 'PT Pelabuhan Tanjung Priok', '2017-07-18', '2017-09-01', '180806032438Dok baru 2018-08-06 (5)_1.jpg' ),
( '21', '1402014083', 'Magang', 'Direktotat Jendral Bea dan Cukai', '2017-07-24', '2017-08-25', '180806075911magang.jpg' ),
( '22', '1402014102', 'Magang', 'PT. Summarecon Agung Tbk', '2017-07-10', '2017-08-31', '180807063906New Doc 2018-08-07_2_magang.jpg' ),
( '24', '1402014087', 'Pengolahan data pada SAP Business Objects/Business Intelligence (BI)', 'PT Taspen (PERSERO)', '2017-07-19', '2017-08-25', '180807080335Dok baru 2018-08-06 (3)_9.jpg' ),
( '25', '1402014058', 'Pengolahan SAP', 'TASPEN', '2017-07-19', '2017-08-25', '180807085013Dok baru 2018-08-06 (4)_2.jpg' ),
( '26', '1402014005', 'Magang', 'PT Taspen PERSERO', '2017-07-03', '2017-08-11', '180807092759922D1462-A5F2-486E-B423-07C2BAB8C7E0.jpeg' ),
( '27', '1402014057', 'Magang', 'PT GEMA NAWAGRAHA SEJATI', '2017-08-01', '2017-08-25', 'mbokindri.png' ),
( '28', '1402014098', 'Membuat kuesioner pelanggan dengan menggunakan web', 'PT Summarecon', '2017-07-01', '2017-08-30', 'mbokindri.png' ),
( '29', '1402014108', 'Menginput data nasabah', 'Bank BRI ', '2017-07-01', '2017-08-30', 'mbokindri.png' ),
( '30', '1402014012', 'Magang', 'Universal Satelit', '2017-07-25', '2017-08-31', '180807021228New Doc 2018-08-07 - Page 9.pdf' ),
( '31', '1402014095', 'Log info', 'PT JICT', '2017-07-10', '2017-08-25', '180807022005New Doc 2018-08-07_3.jpg' ),
( '32', '1402014052', 'Magang', 'Bea dan Cukai', '2017-07-24', '2017-08-25', '180807030055042190C6-7273-455A-A6C2-00533AAB1893.jpeg' ),
( '33', '1402014072', 'Payroll Aplication', 'PT. Antheus Organizer Indonesia', '2017-07-03', '2017-08-31', '180807032644Antheus.jpg' ),
( '34', '1402014094', 'Peminjaman Ruangan Di Lingkungan YARSI', 'Universtias YARSI', '2017-07-20', '2018-09-07', 'nofile.png' ),
( '35', '1402014017', 'Web Developer', 'PT. TASPEN PERSERO', '2017-07-10', '2017-08-18', '180807083133Scan1_0004.jpg' ),
( '36', '1402014127', 'Magang', 'Sekretariat Direktorat Jendral Kebudayaan Kementrian Pendidikan dan Kebudayaan', '2017-07-01', '2017-08-25', '180807093455S28C-6e18080714410_0002.jpg' ),
( '37', '1402014144', 'magang', 'KANTOR CABANG BANK BRI CUT MUTIAH ', '2017-07-10', '2018-08-18', 'img/tdkadafile.png' ),
( '38', '1402014030', 'Sertifikat magang', 'Universal satelite indonesia', '2017-08-25', '2017-08-31', '180807100707New Doc 2018-08-07_1.jpg' ),
( '39', '1402014074', 'Kegiatan Magang', 'PT. Unisat', '2017-06-25', '2017-08-31', '180807102129img020.jpg' ),
( '40', '1402014103', 'Mencari dan mamasukkan profil data calon pelapor devisa ', 'Bank Indonesia', '2017-07-23', '2017-08-25', 'img/tdkadafile.png' ),
( '41', '1402013086', 'Magang', 'PT.KAI Indonesia', '2017-07-03', '2017-08-30', '180808085703IMG_0001.jpg' ),
( '42', '1402014081', 'Praktek Kerja Lapangan', 'Direktorat Jenderal Bea dan Cukai', '2017-07-24', '2017-08-25', '180808112448Sertifikat Magang.jpg' ),
( '43', '1402014100', 'kegiatan magang 2017', 'PT. Maju Persada Rejeki', '2017-07-07', '2017-08-07', 'img/tdkadafile.png' );
-- ---------------------------------------------------------


-- Dump data of "mahasiswa" --------------------------------
INSERT INTO `mahasiswa`(`npm_mhs`,`nama_mhs`,`tempatlahir_mhs`,`tanggallahir_mhs`,`id_prodi`,`tahun_masuk`,`password`,`layak_skpi`) VALUES 
( '140201423', 'Indriyani', 'Pemalang', '1996-02-08', '5', '2014', 'coba', 'N' ),
( '1402012026', 'Emir Aprian Ambiar', 'Jakarta', '1995-04-19', '5', '2012', 'dadada123', 'Y' ),
( '1402012078', 'rizky saputra', 'Jakarta', '1994-11-24', '5', '2012', 'gocengaja', 'N' ),
( '1402013005', 'Adenda Galih Kacida', 'Jakarta', '1995-04-30', '5', '2013', '123456op', 'N' ),
( '1402013038', 'Handyka Eza Prathama', 'Jakarta', '1995-07-27', '5', '2013', 'pejuang7', 'N' ),
( '1402013060', 'Muhammad Ridhallah ', 'Depok', '1994-12-18', '5', '2013', 'marantau', 'N' ),
( '1402013075', 'Rosi Maharani', 'Jakarta ', '1995-03-31', '5', '2013', 'dzunnun17', 'N' ),
( '1402013086', 'Wendy Kurniawan', 'Jakarta', '1995-11-27', '5', '2013', 'kurniawan27', 'N' ),
( '1402014001', 'Andi Batari Ahmad', 'Ujung Pandang ', '1997-01-13', '5', '2014', 'aanudieta', 'Y' ),
( '1402014005', 'Aditya Efrian', 'Bekasi', '1996-04-08', '5', '2014', 'sayaganteng', 'Y' ),
( '1402014009', 'Ahmad Alif Ghufron Syaifuddin ', 'DKI Jakarta', '1996-12-13', '5', '2014', 'qwerty123', 'N' ),
( '1402014012', 'Ahmad Zaki Makarim', 'Brebes', '1994-04-16', '5', '2014', 'makarim16', 'Y' ),
( '1402014017', 'Andicha Gundala Rachmatulloh Putra', 'Jakarta', '1996-06-06', '5', '2014', '828478', 'N' ),
( '1402014021', 'Anis Chaerunisa', 'Jakarta', '1997-07-13', '5', '2014', 'terserah', 'Y' ),
( '1402014023', 'Arlita Putri Satyaningrum', 'Jakarta', '1996-09-16', '5', '2014', 'arlita16', 'Y' ),
( '1402014029', 'Debita Febriana', 'Jakarta', '1996-02-07', '5', '2014', '388919', 'Y' ),
( '1402014030', 'Dennis Bagus Wismayoga', 'Nganjuk ', '1996-08-04', '5', '2014', 'kardus', 'Y' ),
( '1402014032', 'Dhianika Cahyati', 'Bekasi', '1995-06-23', '5', '2014', 'dhianika23', 'Y' ),
( '1402014034', 'Diga Amallia Krisna Utami', 'Jakarta', '1996-12-02', '5', '2014', 'digaaku02', 'Y' ),
( '1402014041', 'Evi Damayanti Firdaus', 'Jakarta', '1996-06-23', '5', '2014', '989431', 'Y' ),
( '1402014049', 'Gilang Samudra', 'Jakarta', '1995-12-12', '5', '2014', '185414', 'Y' ),
( '1402014052', 'Husni Adi Nugroho', 'Jakarta', '1996-10-22', '5', '2014', 'husniadi', 'N' ),
( '1402014053', 'Indriyani', 'Pemalang', '1996-02-08', '5', '2014', '805245', 'Y' ),
( '1402014057', 'Joko Supriyono', 'Jakarta', '1996-07-03', '5', '2014', '629223', 'Y' ),
( '1402014058', 'Kartini Susilo Fitri', 'Jakarta', '1996-04-22', '5', '2014', 'kartini96', 'N' ),
( '1402014061', 'Maya Nirmala', 'Jakarta', '1996-08-05', '5', '2014', '12345', 'Y' ),
( '1402014067', 'Muhamad Reza Shahensha', 'Jakarta', '1996-02-26', '5', '2014', '486641', 'N' ),
( '1402014072', 'Muhammad Fajar Firmansyah', 'Jakarta', '1995-06-01', '5', '2014', '123456', 'N' ),
( '1402014074', 'Muhammad Faris', 'Jakarta', '1996-11-12', '5', '2014', 'farisfaris12', 'Y' ),
( '1402014079', 'Muhammad Syauqi Farhan', 'Bekasi', '1996-10-16', '5', '2014', '969634', 'N' ),
( '1402014081', 'Mutia Kentuah Nieate', 'Bekasi', '1996-03-01', '5', '2014', 'Qwerty13-', 'N' ),
( '1402014083', 'Nadya Afifahtul Khoir', 'Jakarta', '1997-04-26', '5', '2014', 'Afifahtul1997', 'N' ),
( '1402014087', 'Nuraisah', 'Jakarta', '1996-10-07', '5', '2014', 'aisah071096', 'Y' ),
( '1402014094', 'R.Andito Rizky Pratama', 'Jakarta', '1996-04-03', '5', '2014', 'king1234', 'Y' ),
( '1402014095', 'Rachmadhani Ajeng Nurmufti', 'Jakarta', '1997-02-04', '5', '2014', '447481', 'Y' ),
( '1402014098', 'Ranti Purwati', 'Padang', '1995-11-15', '5', '2014', '151111', 'N' ),
( '1402014100', 'reza arief wiyarta', 'jakarta', '1996-11-27', '5', '2014', '307869', 'Y' ),
( '1402014102', 'Rizka Nur Fazri', 'Jakarta', '1997-01-16', '5', '2014', '114111', 'Y' ),
( '1402014103', 'Rizki Muhamad Nawawi', 'Sukabumi', '1995-12-12', '5', '2014', '123456', 'N' ),
( '1402014108', 'Runtari putri', 'Jakarta', '1996-06-26', '5', '2014', '123putri', 'Y' ),
( '1402014118', 'Siti Khalifah', 'Jakarta', '1996-07-17', '5', '2014', 'sitikhalifah17', 'Y' ),
( '1402014127', 'Wiwiet Sri Mulyaningrum', 'Jakarta', '1997-03-08', '5', '2014', '08maret97', 'Y' ),
( '1402014130', 'Zakiah Husnul Aghniya', 'Jakarta', '1996-10-12', '5', '2014', '12oktober', 'Y' ),
( '1402014133', 'Asma Amanina', 'Bekasi', '1995-03-25', '5', '2014', '123', 'Y' ),
( '1402014138', 'Kamaludin', 'Brebes', '1993-12-13', '5', '2014', 'SERTIFIKAT', 'N' ),
( '1402014144', 'Yessi ida fitriyani', 'Bojonegoro', '1996-07-09', '5', '2014', 'yarsi132', 'N' );
-- ---------------------------------------------------------


-- Dump data of "penilaian_skke" ---------------------------
INSERT INTO `penilaian_skke`(`id_penilaian_skke`,`id_kegiatan`,`id_tingkat_kegiatan`,`nilai_prestasi`,`nilai_bobot`) VALUES 
( '23', '17', '31', 'Prestasi', '35' ),
( '24', '18', '31', 'Prestasi', '25' ),
( '25', '19', '11', 'Juara 1', '150' ),
( '26', '19', '11', 'Juara 2', '140' ),
( '27', '19', '11', 'Juara 3', '130' ),
( '28', '19', '11', 'Peserta terpilih (*3)', '100' ),
( '29', '19', '11', 'Finalis', '75' ),
( '30', '19', '12', 'Juara 1', '100' ),
( '31', '19', '12', 'Juara 2', '90' ),
( '32', '19', '12', 'Juara 3', '80' ),
( '33', '19', '12', 'Peserta terpilih', '70' ),
( '34', '19', '12', 'Finalis', '60' ),
( '35', '19', '13', 'Juara 1', '75' ),
( '36', '19', '13', 'Juara 2', '70' ),
( '37', '19', '13', 'Juara 3', '65' ),
( '38', '19', '13', 'Peserta terpilih', '50' ),
( '39', '19', '13', 'Finalis', '40' ),
( '40', '19', '14', 'Juara 1', '50' ),
( '41', '19', '14', 'Juara 2', '45' ),
( '42', '19', '14', 'Juara 3', '40' ),
( '43', '19', '14', 'Peserta terpilih', '30' ),
( '44', '19', '14', 'Finalis', '20' ),
( '45', '19', '15', 'Juara 1', '40' ),
( '46', '19', '15', 'Juara 2', '35' ),
( '47', '19', '15', 'Juara 3', '30' ),
( '48', '19', '15', 'Peserta terpilih', '20' ),
( '49', '19', '15', 'Finalis', '10' ),
( '50', '19', '16', 'Juara 1', '30' ),
( '51', '19', '16', 'Juara 2', '25' ),
( '52', '19', '16', 'Juara 3', '20' ),
( '53', '19', '16', 'Peserta terpilih', '10' ),
( '54', '19', '16', 'Finalis', '5' ),
( '55', '20', '11', 'Peserta', '50' ),
( '56', '20', '12', 'Peserta', '40' ),
( '57', '20', '13', 'Peserta', '30' ),
( '58', '20', '14', 'Peserta', '20' ),
( '59', '20', '15', 'Peserta', '10' ),
( '60', '20', '16', 'Peserta', '5' ),
( '61', '21', '11', 'Pembicara', '100' ),
( '62', '21', '11', 'Moderator', '75' ),
( '63', '21', '11', 'Peserta', '50' ),
( '64', '21', '12', 'Pembicara', '75' ),
( '65', '21', '12', 'Moderator', '50' ),
( '66', '21', '12', 'Peserta', '30' ),
( '67', '21', '13', 'Pembicara', '50' ),
( '68', '21', '13', 'Moderator', '40' ),
( '69', '21', '13', 'Peserta', '20' ),
( '70', '21', '14', 'Pembicara', '40' ),
( '71', '21', '14', 'Moderator', '30' ),
( '72', '21', '14', 'Peserta', '15' ),
( '73', '21', '15', 'Pembicara', '30' ),
( '74', '21', '15', 'Moderator', '20' ),
( '75', '21', '15', 'Peserta', '10' ),
( '76', '21', '16', 'Pembicara', '20' ),
( '77', '21', '16', 'Moderator', '10' ),
( '78', '21', '16', 'Peserta', '5' ),
( '79', '22', '11', 'Peserta (6 bulan)', '75' ),
( '80', '22', '11', 'Peserta (3 bulan)', '60' ),
( '81', '22', '11', 'Peserta (1 bulan)', '50' ),
( '82', '22', '11', 'Peserta (2 minggu)', '40' ),
( '83', '22', '11', 'Peserta (1 minggu)', '30' ),
( '84', '22', '12', 'Peserta (6 bulan)', '60' ),
( '85', '22', '12', 'Peserta (3 bulan)', '50' ),
( '86', '22', '12', 'Peserta (1 bulan)', '40' ),
( '87', '22', '12', 'Peserta (2 minggu)', '30' ),
( '88', '22', '12', 'Peserta (1 minggu)', '20' ),
( '89', '23', '11', '-', '300' ),
( '90', '23', '12', '-', '150' ),
( '91', '24', '11', 'Ketua', '150' ),
( '92', '24', '11', 'Anggota', '75' ),
( '93', '24', '17', 'Ketua', '100' ),
( '94', '24', '17', 'Anggota', '50' ),
( '95', '24', '18', 'Ketua', '50' ),
( '96', '24', '18', 'Anggota', '20' ),
( '97', '26', '11', '-', '80' ),
( '98', '26', '12', '-', '65' ),
( '99', '26', '13', '-', '40' ),
( '100', '26', '14', '-', '30' ),
( '101', '26', '15', '-', '20' ),
( '102', '26', '16', '-', '10' ),
( '103', '27', '31', 'Ketua', '40' ),
( '104', '27', '31', 'Anggota', '20' ),
( '105', '28', '31', 'Peserta', '5' ),
( '106', '29', '31', '-', '10' ),
( '107', '30', '12', 'Juara 1', '100' ),
( '108', '30', '12', 'Juara 2', '90' ),
( '109', '30', '12', 'Juara 3', '80' ),
( '110', '30', '12', 'Finalis', '70' ),
( '111', '30', '14', 'Juara 1', '75' ),
( '112', '30', '14', 'Juara 2', '65' ),
( '113', '30', '14', 'Juara 3', '55' ),
( '114', '30', '14', 'Finalis', '45' ),
( '115', '30', '15', 'Juara 1', '60' ),
( '116', '30', '15', 'Juara 2', '50' ),
( '117', '30', '15', 'Juara 3', '40' ),
( '119', '30', '15', 'Finalis', '30' ),
( '120', '30', '19', 'Juara 1', '40' ),
( '121', '30', '19', 'Juara 2', '30' ),
( '122', '30', '19', 'Juara 3', '20' ),
( '123', '30', '19', 'Finalis', '10' ),
( '124', '31', '31', 'Ketua', '20' ),
( '126', '32', '31', 'Ketua', '40' ),
( '127', '32', '31', 'Anggota', '20' ),
( '128', '31', '31', 'Anggota', '15' ),
( '129', '33', '31', 'Ketua', '50' ),
( '130', '33', '31', 'Anggota', '30' ),
( '131', '34', '31', '-', '15' ),
( '132', '35', '11', '-', '50' ),
( '133', '35', '12', '-', '40' ),
( '134', '36', '32', '-', '10' ),
( '135', '36', '33', '-', '15' ),
( '136', '36', '34', '-', '20' ),
( '137', '36', '35', '-', '25' ),
( '138', '37', '20', 'Peserta', '10' ),
( '139', '37', '21', 'Peserta', '20' ),
( '140', '38', '31', 'Peserta', '15' ),
( '141', '39', '31', 'Peserta', '25' ),
( '142', '40', '31', 'Peserta', '40' ),
( '143', '41', '11', 'Juara 1', '150' ),
( '144', '41', '11', 'Juara 2', '140' ),
( '145', '41', '11', 'Juara 3', '130' ),
( '146', '41', '11', 'Finalis', '100' ),
( '147', '41', '12', 'Juara 1', '100' ),
( '148', '41', '12', 'Juara 2', '90' ),
( '149', '41', '12', 'Juara 3', '80' ),
( '150', '41', '12', 'Finalis', '70' ),
( '151', '41', '13', 'Juara 1', '60' ),
( '152', '41', '13', 'Juara 2', '50' ),
( '153', '41', '13', 'Juara 3', '40' ),
( '154', '41', '13', 'Finalis', '30' ),
( '155', '41', '14', 'Juara 1', '50' ),
( '156', '41', '14', 'Juara 2', '40' ),
( '157', '41', '14', 'Juara 3', '30' ),
( '158', '41', '14', 'Finalis', '20' ),
( '159', '41', '15', 'Juara 1', '40' ),
( '160', '41', '15', 'Juara 2', '30' ),
( '161', '41', '15', 'Juara 3', '20' ),
( '162', '41', '15', 'Finalis', '10' ),
( '163', '41', '19', 'Juara 1', '30' ),
( '164', '41', '19', 'Juara 2', '20' ),
( '165', '41', '19', 'Juara 3', '10' ),
( '166', '41', '19', 'Finalis', '5' ),
( '167', '42', '11', 'Delegasi', '100' ),
( '168', '42', '11', 'Peserta', '40' ),
( '169', '42', '12', 'Delegasi', '60' ),
( '170', '42', '12', 'Peserta', '20' ),
( '171', '42', '13', 'Delegasi', '30' ),
( '172', '42', '13', 'Peserta', '15' ),
( '173', '42', '14', 'Delegasi', '20' ),
( '174', '42', '14', 'Peserta', '10' ),
( '175', '42', '15', 'Delegasi', '10' ),
( '176', '42', '15', 'Peserta', '5' ),
( '177', '43', '12', '-', '50' ),
( '178', '43', '14', '-', '30' ),
( '179', '43', '15', '-', '20' ),
( '180', '44', '31', '-', '25' ),
( '181', '45', '31', 'Pemimpin Produksi/ Sutradara', '30' ),
( '182', '45', '31', 'Anggota', '15' ),
( '183', '46', '31', 'Ketua', '25' ),
( '184', '46', '31', 'Sekretaris', '15' ),
( '185', '46', '31', 'Bendahara', '15' ),
( '186', '47', '13', 'Peserta', '25' ),
( '187', '47', '14', 'Peserta', '20' ),
( '188', '47', '15', 'Peserta', '15' ),
( '189', '48', '31', 'Pemilik', '30' ),
( '190', '49', '22', 'Ketua', '60' ),
( '191', '49', '22', 'Sekretaris', '50' ),
( '192', '49', '22', 'Bendahara', '50' ),
( '193', '49', '22', 'Pengurus Inti', '40' ),
( '194', '49', '22', 'Anggota Pengurus', '20' ),
( '195', '49', '23', 'Ketua', '40' ),
( '196', '49', '23', 'Sekretaris', '35' ),
( '197', '49', '23', 'Bendahara', '35' ),
( '198', '49', '23', 'Pengurus Inti', '25' ),
( '199', '49', '23', 'Anggota Pengurus', '15' ),
( '200', '49', '24', 'Ketua', '40' ),
( '201', '49', '24', 'Sekretaris', '35' ),
( '204', '49', '24', 'Bendahara', '35' ),
( '205', '49', '24', 'Pengurus Inti', '25' ),
( '206', '49', '24', 'Anggota Pengurus', '15' ),
( '207', '49', '25', 'Ketua', '30' ),
( '208', '49', '25', 'Sekretaris', '25' ),
( '209', '49', '25', 'Bendahara', '25' ),
( '210', '49', '25', 'Pengurus Inti', '15' ),
( '211', '49', '25', 'Anggota Pengurus', '10' ),
( '212', '49', '26', 'Ketua', '30' ),
( '213', '49', '26', 'Sekretaris', '25' ),
( '214', '49', '26', 'Bendahara', '25' ),
( '215', '49', '26', 'Pengurus Inti', '15' ),
( '216', '49', '26', 'Anggota Pengurus', '10' ),
( '217', '49', '12', 'Ketua', '70' ),
( '218', '49', '12', 'Sekretaris', '60' ),
( '219', '49', '12', 'Bendahara', '60' ),
( '221', '49', '12', 'Pengurus Inti', '50' ),
( '222', '49', '12', 'Anggota Pengurus', '30' ),
( '223', '50', '11', 'Ketua', '90' ),
( '224', '50', '11', 'Sekretaris', '80' ),
( '225', '50', '11', 'Bendahara', '80' ),
( '226', '50', '11', 'Pengurus Inti', '70' ),
( '227', '50', '11', 'Anggota Pengurus', '60' ),
( '228', '51', '27', 'Peserta', '15' ),
( '229', '51', '28', 'Peserta', '30' ),
( '230', '51', '29', 'Peserta', '50' ),
( '231', '52', '25', 'Ketua', '20' ),
( '232', '52', '25', 'Sekretaris', '10' ),
( '233', '52', '25', 'Bendahara', '10' ),
( '234', '52', '25', 'Divisi/ Koord. Bid', '10' ),
( '235', '52', '25', 'Anggota Panitia', '5' ),
( '236', '52', '24', 'Ketua', '25' ),
( '237', '52', '24', 'Sekretaris', '15' ),
( '238', '52', '24', 'Bendahara', '15' ),
( '239', '52', '24', 'Divisi/ Koord. Bid', '10' ),
( '240', '52', '24', 'Anggota Panitia', '5' ),
( '241', '52', '22', 'Ketua', '30' ),
( '242', '52', '22', 'Sekretaris', '20' ),
( '243', '52', '22', 'Bendahara', '20' ),
( '244', '52', '22', 'Divisi/ Koord. Bid', '15' ),
( '245', '52', '22', 'Anggota Panitia', '10' ),
( '246', '52', '23', 'Ketua', '25' ),
( '247', '52', '23', 'Sekretaris', '15' ),
( '248', '52', '23', 'Bendahara', '15' ),
( '249', '52', '23', 'Divisi/ Koord. Bid', '10' ),
( '250', '52', '23', 'Anggota Panitia', '5' ),
( '251', '52', '12', 'Ketua', '70' ),
( '252', '52', '12', 'Sekretaris', '60' ),
( '253', '52', '12', 'Bendahara', '60' ),
( '254', '52', '12', 'Divisi/ Koord. Bid', '60' ),
( '255', '52', '12', 'Anggota Panitia', '50' ),
( '256', '52', '13', 'Ketua', '60' ),
( '257', '52', '13', 'Sekretaris', '50' ),
( '258', '52', '13', 'Bendahara', '50' ),
( '259', '52', '13', 'Divisi/ Koord. Bid', '50' ),
( '260', '52', '13', 'Anggota Panitia', '40' ),
( '261', '52', '11', 'Ketua', '80' ),
( '262', '52', '11', 'Sekretaris', '70' ),
( '263', '52', '11', 'Bendahara', '60' ),
( '264', '52', '11', 'Divisi/ Koord. Bid', '60' ),
( '265', '52', '11', 'Anggota Panitia', '50' ),
( '266', '53', '31', 'Peserta', '5' ),
( '267', '54', '11', '-', '100' ),
( '268', '54', '12', '-', '60' ),
( '269', '54', '30', '-', '50' ),
( '270', '54', '14', '-', '30' ),
( '271', '54', '15', '-', '20' ),
( '272', '54', '16', '-', '15' ),
( '273', '55', '31', '-', '30' );
-- ---------------------------------------------------------


-- Dump data of "prodi" ------------------------------------
INSERT INTO `prodi`(`id_prodi`,`nm_prodi`,`inisial`,`fakultas_id`) VALUES 
( '5', 'Teknik Informatika', 'TI', '1' ),
( '6', 'Ilmu Perpustakaan', 'IP', '1' );
-- ---------------------------------------------------------


-- Dump data of "profil_lulusan" ---------------------------
INSERT INTO `profil_lulusan`(`id_profil`,`deskripsi`) VALUES 
( '1', 'Menguasai bidang keilmuan informatika, serta memiliki rasa empati, kemandirian 
dan kepemimpinan untuk menyelesaikan permasalahan tingkat nasional maupun 
internasional berdasarkan hasil analisis yang sistematis dan teroganisir.' ),
( '2', ' Menghasilkan karya penelitian yang inovatif dan bermanfaat bagi masyarakat, 
terutama di bidang informatika kesehatan (e-health), serta publikasi ilmiah di 
seminar/jurnal nasional atau internasional yang bereputasi.' ),
( '3', 'Memiliki kepribadian islami yang mengedepankan moral, etika, empati, dan 
nasionalisme, serta memiliki kemampuan pembelajaran sepanjang hayat sehingga 
dapat berkembang secara professional.' );
-- ---------------------------------------------------------


-- Dump data of "skke" -------------------------------------
INSERT INTO `skke`(`id_skke`,`npm_mhs`,`id_jenis_kegiatan`,`id_kegiatan`,`nama_kegiatan`,`id_tingkat_kegiatan`,`prestasi`,`bobot`,`deskripsi`,`tgl_mulai`,`tgl_selesai`,`tgl_sertifikat`,`instansi_sertifikat`,`dasar_penilaian`,`photo`,`tgl_isi`) VALUES 
( '12', '1402014053', '1', '17', 'SPT (Sistem Pendidikan Tinggi) Universitas Yarsi 2014', '31', 'Prestasi', '35', 'SPT (Sistem Pendidikan Tinggi) Universitas Yarsi 2014', '2014-08-20', '2014-08-22', '2014-09-01', 'Universitas YARSI', 'Sertifikat', '180725091543SPT.jpg', '2018-07-25' ),
( '13', '1402014053', '2', '21', 'Peningkatan Kapasitas Perempuan di Lembaga Politik', '14', 'Peserta', '15', 'Peningkatan Kapasitas Perempuan di Lembaga Politik dalam Rangka Kesetaraan Gender Angkatan VI Tahun 2016', '2016-05-26', '2016-05-26', '2016-05-26', 'Universitas YARSI', 'Sertifikat', '180725093036Peningkatan kapasitas perempuan.jpg', '2018-07-25' ),
( '14', '1402014053', '2', '21', 'Microsoft Imagine Cup Indonesia 2015', '14', 'Peserta', '15', 'Microsoft Imagine Cup Indonesia 2015', '2015-10-10', '2015-10-10', '2015-10-10', 'Universitas YARSI', 'Sert./SK/ST', '180804121443Imagine Cup.jpg', '2018-08-04' ),
( '15', '1402014053', '2', '21', 'Penyerapan Aspirasi Masyarakat', '13', 'Peserta', '20', 'Penyerapan Aspirasi Masyarakat "Ibadah Puasa sebagai Pancaran Nilai Pancasila" ', '2015-07-02', '2015-07-02', '2015-07-02', 'Majelis Pemusyawaratan Rakyat RI', 'Sert./SK/ST', '180804121725Penyerapan aspirasi masyarakat.jpg', '2018-08-04' ),
( '16', '1402014053', '2', '34', 'Asisten Dosen Fakultas Teknologi Informasi Basis Data 1 2015/2016', '31', '-', '15', 'Asisten Dosen Fakultas Teknologi Informasi Basis Data 1 2015/2016', '2015-09-07', '2016-12-30', '2018-02-17', 'Universitas YARSI', 'Sertifikat', '180804122233Asdos.jpg', '2018-08-04' ),
( '17', '1402014041', '2', '21', 'Indonesia Android Kejar 3.0 Beginner', '12', 'Peserta', '30', 'Pelatihan pembuatan aplikasi android
', '0000-00-00', '0000-00-00', '0000-00-00', 'Google Developers', 'Sertifikat', '180805061903android beginner.pdf', '2018-08-05' ),
( '18', '1402014041', '2', '20', 'Lomba Karya Tulis Ilmiah Semarak Bidik Misi Prestatif 2016', '12', 'Peserta', '40', 'Lomba Karya Tulis Ilmiah Semarak Bidik Misi Prestatif 2016 dengan tema "Optimalisasi Sumber Daya Alam untuk Tercapainya Indonesia Sejahtera" ', '0000-00-00', '0000-00-00', '2016-11-20', 'Kementrian Riset, Teknologi, dan Pendidikan Tinggi Universitas Diponegoro', '10 - 40 jam', '180805062341EVI.jpg', '2018-08-05' ),
( '19', '1402014041', '2', '21', 'Save The Nation From Cyber War', '14', 'Peserta', '15', 'Seminar yang diselenggarakan oleh sema fti berjudul "Save The Nation From Cyber War"
', '0000-00-00', '0000-00-00', '2015-03-14', 'Universitas YARSI', 'Sertifikat', '18080506332316.jpg', '2018-08-05' ),
( '20', '1402014041', '2', '36', 'TOEIC SCORE', '35', '-', '25', 'TOEIC Score', '2018-02-13', '2018-02-13', '2018-02-13', 'Optima Language Universitas YARSI', 'Sertifikat', '180805071235WhatsApp Image 2018-08-05 at 18.58.17.jpeg', '2018-08-05' ),
( '21', '1402014041', '2', '34', 'Asisten Praktikum', '31', '-', '15', 'Asisten lab', '0000-00-00', '0000-00-00', '0000-00-00', 'Universitas YARSI', 'Per Sertifikat (dibawah 10 jam)', '180805071836WhatsApp Image 2018-08-05 at 19.02.43.jpeg', '2018-08-05' ),
( '22', '1402014001', '2', '21', 'Save The Nation From Cyber War', '14', 'Peserta', '15', 'Save The Nation From Cyber War', '0000-00-00', '0000-00-00', '2015-03-14', 'Universitas YARSI', 'Sertifikat', '18080507330511.jpg', '2018-08-05' ),
( '23', '1402014001', '2', '21', 'Sharing Session Program Graduate Study Opportunity in UST with Scholarship', '12', 'Peserta', '30', 'Sharing Session Program Graduate Study Opportunity in UST with Scholarship', '0000-00-00', '0000-00-00', '0000-00-00', 'UST Overseas Honorary Ambassador', 'Sertifikat', '180805073707WhatsApp Image 2018-08-05 at 19.30.28.jpeg', '2018-08-05' ),
( '24', '1402014001', '2', '21', 'International Symposium On Bioinformatics', '11', 'Peserta', '50', 'International Symposium On Bioinformatics', '0000-00-00', '0000-00-00', '0000-00-00', 'Universitas YARSI', 'Sertifikat', '180805073821WhatsApp Image 2018-08-05 at 19.31.19.jpeg', '2018-08-05' ),
( '25', '1402014001', '3', '41', 'Techno Sport Cup 2018', '15', 'Juara 1', '40', 'Juara 1 badminton ganda putri Techno Sport Cup 2018', '0000-00-00', '0000-00-00', '0000-00-00', 'Universitas YARSI', 'Sertifikat', '180805073954WhatsApp Image 2018-08-05 at 19.26.28.jpeg', '2018-08-05' ),
( '26', '1402014041', '2', '19', 'Lomba Logical Programming Competition FTI YARSI 2016', '15', 'Juara 2', '35', 'Juara 2 Lomba Logical Programming Competition FTI YARSI 2016', '0000-00-00', '0000-00-00', '0000-00-00', 'Universitas YARSI', 'Sertifikat', '180805074334WhatsApp Image 2018-08-05 at 18.59.37.jpeg', '2018-08-05' ),
( '27', '1402014034', '1', '17', 'SPT 2014', '31', 'Prestasi', '35', 'SPT Universitas YARSI 2014', '2014-08-21', '2014-09-22', '2018-02-17', 'Universitas YARSI', 'Sertifikat', '180806120315IMG_0005.pdf', '2018-08-06' ),
( '29', '1402014023', '1', '17', 'SPT (sistem Pendidikan Tinggi)', '31', 'Prestasi', '35', 'SPT Yarsi 2014', '2014-08-21', '2014-08-22', '2018-02-17', 'Universitas Yarsi', 'Sertifikat', '180806120854IMG-20180806-WA0004.jpg', '2018-08-06' ),
( '30', '1402014032', '2', '21', 'Seminar and workshop malware incident prevention and handling for corporate', '14', 'Peserta', '15', 'Menambah wawasan mengenai virus dan anti virus', '2015-06-01', '2015-06-01', '2015-07-06', 'Universitas YARSI', '10 - 40 jam', '180806121057new doc 2018-08-06 09.06.36_6.jpg', '2018-08-06' ),
( '31', '1402014034', '4', '49', 'SENAT MAHASISWA FTI 2016-2017', '24', 'Sekretaris', '35', 'Sekretaris Seat Mahasiswa FTI 2016-2017', '2016-08-15', '2017-08-11', '2017-08-29', 'Universitas YARSI', 'Sertifikat', '180806121129IMG.pdf', '2018-08-06' ),
( '32', '1402014023', '2', '31', 'Pelatihan Penulisan Proposal PKM Untuk Dosen dan Mahasiswa Universita YARSI', '31', 'Anggota', '15', 'Pelatihan Proposal PKM', '2015-09-28', '2015-08-28', '2015-09-28', 'Universitas Yarsi', 'Sertifikat', '180806121401IMG-20180806-WA0003.jpg', '2018-08-06' ),
( '33', '1402014021', '1', '17', 'SPT (Sistem Pendidikan Tinggi) Universitas Yarsi 2014', '31', 'Prestasi', '35', 'pengenalan kampus', '2014-08-21', '2014-08-22', '2018-02-16', 'Universitas Yarsi', 'Sertifikat', '180806121639WhatsApp Image 2018-08-06 at 12.01.30(1).jpeg', '2018-08-06' ),
( '34', '1402014023', '2', '34', 'Asisten Lab  / Asisten Dosen', '31', '-', '15', 'Sebagai Asisten Lab / Dosen matakuliah PTI', '2015-09-07', '2016-01-31', '2018-02-17', 'Universitas Yarsi', 'Sertifikat', '180806121748IMG-20180806-WA0006.jpg', '2018-08-06' ),
( '35', '1402014034', '2', '34', 'Asisten Dosen FTI YARSI', '31', '-', '15', 'Asisten Dosen Mata Kuliah Pengantar Teknologi Informasi', '2015-09-07', '2016-01-31', '2018-02-17', 'Universitas YARSI', 'Sertifikat', '180806121820IMG_0003.pdf', '2018-08-06' ),
( '36', '1402014032', '2', '34', 'Asisten Dosen Matakuliah Pengantar Teknologi Informasi', '31', '-', '15', 'Asisten Dosen Matakuliah Pengantar Teknologi Informasi', '2015-09-07', '2016-01-04', '2018-02-17', 'Universitas YARSI', 'Sertifikat', '180806122256new doc 2018-08-06 09.06.36_10.jpg', '2018-08-06' ),
( '37', '1402014021', '3', '47', 'Sosialisasi Program Wirausaha Muda Mandiri (WMM) 2016', '14', 'Peserta', '20', 'sosialisasi kewirausahaan', '2016-11-24', '2016-11-24', '2016-11-24', 'Universitas Yarsi', 'Sertifikat', '180806122305WhatsApp Image 2018-08-06 at 12.01.28.jpeg', '2018-08-06' ),
( '38', '1402014023', '2', '21', 'Seminar Kebebasan dan Keamanan Berekspresi di Dunia Maya', '14', 'Peserta', '15', 'Seminar Kebebasan dan Keamanan Berekspresi di Dunia Maya', '2016-06-04', '2016-06-04', '2019-06-04', 'Universitas Muhammadiyah Jakarta', 'Sertifikat', '180806122335IMG-20180806-WA0005.jpg', '2018-08-06' ),
( '39', '1402014034', '2', '21', 'Seminar Kebebasan dan Keamanan Berekspresi di Dunia Maya', '14', 'Peserta', '15', 'Peserta Seminar Kebebasan dan Keamanan Berekspresi di Dunia Maya yang diselenggarakan oleh Himpunan Mahasiswa Teknik Informatika Badan Eksekutif Mahasiswa Fakultas Teknik Universitas Muhammadiyah Jakarta.', '2016-06-04', '2016-06-04', '0000-00-00', 'Universitas Muhammadiyah Jakarta', 'Sertifikat', '180806122517diga4.jpg', '2018-08-06' ),
( '40', '1402014023', '2', '21', 'Sosialisasi Program Wirausaha Muda Mandiri', '14', 'Peserta', '15', 'Sosialisasi Program Wirausaha Muda Mandiri', '2016-11-24', '2016-11-24', '2016-11-24', 'Universitas Yarsi', 'Sertifikat', '180806122609IMG-20180806-WA0007.jpg', '2018-08-06' ),
( '41', '1402014023', '2', '21', 'Seminar "Internet of Things, Game, and Real Sense Technology"', '14', 'Peserta', '15', 'Seminar "Internet of Things, Game, and Real Sense Technology"', '2015-06-13', '2015-06-13', '2015-06-13', 'Universitas Yarsi', 'Sertifikat', '180806123033IMG-20180806-WA0009.jpg', '2018-08-06' ),
( '42', '1402014032', '2', '21', 'Internet of things, game, and real sense technology', '14', 'Peserta', '15', 'Seminar kegiatan Internet of things, game, and real sense technology', '2015-06-13', '2015-06-13', '2015-06-13', 'Universitas YARSI', '10 - 40 jam', '180806123051new doc 2018-08-06 09.06.36_7.jpg', '2018-08-06' ),
( '43', '1402014034', '4', '49', 'SENAT MAHASISWA FTI 2016-2017', '24', 'Anggota Pengurus', '15', 'Anggota Departemen KOMINFO Senat Mahasiswa 2015-2016', '2015-09-07', '2016-09-15', '2016-10-20', 'Universitas YARSI', 'Sertifikat', '180806123152diga.pdf', '2018-08-06' ),
( '44', '1402014021', '2', '21', 'Peningkatan Kapasitas Perempuan di Lembaga Politik Dalam Rangka Kesetaraan Gender Angkatan VI Tahun 2016', '12', 'Peserta', '30', 'emansipasi wanita', '2016-05-26', '2016-05-26', '2016-05-26', 'Pemerintah Provinsi Daerah Khusus Ibukota Jakarta', 'Sertifikat', '180806123312WhatsApp Image 2018-08-06 at 12.26.38.jpeg', '2018-08-06' ),
( '45', '1402014032', '2', '21', 'Peningkatan kapasitas perempuan dilembaga politik kesetaraan gender angkatan VI tahun 2016', '12', 'Peserta', '30', 'Peningkatan kapasitas perempuan dilembaga politik kesetaraan gender angkatan VI tahun 2016', '2016-05-26', '2016-05-26', '2016-05-26', 'Universitas YARSI', 'Sertifikat', '180806123545new doc 2018-08-06 09.06.36_9.jpg', '2018-08-06' ),
( '46', '1402014021', '2', '34', 'Asisten Dosen Fakultas Teknologi Informasi', '31', '-', '15', 'Asisten Lab Mata Kuliah Pengantar Teknologi Informasi', '2015-09-07', '2016-02-17', '2018-02-17', 'Universitas Yarsi', 'Sertifikat', '180806123721WhatsApp Image 2018-08-06 at 12.01.30.jpeg', '2018-08-06' ),
( '47', '1402014032', '1', '17', 'Sistem Pendidikan Tinggi (SPT)', '31', 'Prestasi', '35', 'Sistem Pendidikan Tinggi (SPT)', '2014-08-21', '2014-08-22', '2018-02-01', 'Universitas YARSI', 'Sertifikat', '180806123852new doc 2018-08-06 09.06.36_8.jpg', '2018-08-06' ),
( '48', '1402014118', '1', '17', 'SPT (Sistem Pendidikan Tinggi Universitas Yarsi 2014)', '31', 'Prestasi', '35', 'SPT (Sistem Pendidikan Tinggi Universitas Yarsi 2014)', '2014-08-20', '2014-08-24', '2014-09-01', 'Universitas YARSI', 'Sertifikat', '180806013846sertifikat_SPT.jpg', '2018-08-06' ),
( '49', '1402014118', '2', '34', 'Asisten Lab dan Praktikum', '31', '-', '15', 'Asisten Dosen 
1. Basis Data 1 Semester Genap 2016/2017
2. Basis Data 2 Semester Ganjil 2016/2017
3. Data Mining Semester Ganjil 2017/2018
4. Metode Numerik Semester Genap 2016/2017', '2016-02-07', '2017-12-01', '2018-02-17', 'Universitas YARSI', 'Sertifikat', '180806014737sertifikat_asdos.jpg', '2018-08-06' ),
( '50', '1402014118', '2', '21', 'International Symposium On Bioinformatics', '11', 'Peserta', '50', 'International Symposium On Bioinformatics', '2017-07-11', '2017-07-12', '2017-07-18', 'Universitas YARSI', 'Sertifikat', '180806015343sertifikat_simposium.jpg', '2018-08-06' ),
( '51', '1402014118', '2', '21', 'Sosialisai Program Wirausaha Muda Mandiri (WMM) 2016', '14', 'Peserta', '15', 'Memberikan materi tentang berwirausaha', '2016-11-24', '2016-11-24', '2016-11-24', 'Universitas YARSI', 'Sertifikat', '180806015837sertifikat_wirausaha.jpg', '2018-08-06' ),
( '52', '1402014118', '2', '21', 'Pelatihan Penulisan Proposal PKM Untuk Dosen dan Mahasiswa Universitas YARSI', '14', 'Peserta', '15', 'Memberikan materi tentang Penulisan Proposal Kegiatan Mahasiswa', '2015-09-28', '2015-09-28', '2015-09-28', 'Universitas YARSI', 'Sertifikat', '180806020210sertifikat_penulisan proposal PKM.jpg', '2018-08-06' ),
( '53', '1402014118', '2', '21', 'Imagine Cup Indonesia 2016', '15', 'Peserta', '10', 'Imagine Cup Indonesia 2016', '2016-04-19', '2016-02-19', '2016-02-19', 'Microsoft Indonesia', 'Sertifikat', '180806020539sertifikat_imagine cup.jpg', '2018-08-06' ),
( '54', '1402014061', '2', '21', 'Workshop Broadcast and Jurnalist', '12', 'Peserta', '30', 'Seminar Jurnalistik', '2016-05-21', '2016-05-21', '2016-05-21', 'STIAMI', '10 - 40 jam', '180806025343Dok baru 2018-08-06_5.jpg', '2018-08-06' ),
( '55', '1402014061', '2', '21', 'Imagine Cup 2015 Seminar Microsoft "Global Student Technology Competition"', '14', 'Peserta', '15', 'Seminar Microsoft Global Student Technology Competition', '0000-00-00', '0000-00-00', '0000-00-00', 'Universitas YARSI', 'Sertifikat', '180806025741Dok baru 2018-08-06_4.jpg', '2018-08-06' ),
( '56', '1402014061', '2', '21', 'Seminar and Workshop "Malware Incident Prevention And Handling For Corporate ', '14', 'Peserta', '15', 'Seminar dan workshop mengenai malware', '2015-06-01', '2015-06-01', '2015-06-01', 'Universitas YARSI', 'Sertifikat', '180806030136Dok baru 2018-08-06_7.jpg', '2018-08-06' ),
( '57', '1402014061', '2', '21', 'Seminar Nasional Aplikasi Teknologi Informasi (SNATi)', '12', 'Pembicara', '75', 'seminar hasil prosiding ', '2017-08-05', '2017-08-05', '2017-08-05', 'Universitas Islam Indonesia', 'Sertifikat', '180806030644Dok baru 2018-08-06_8.jpg', '2018-08-06' ),
( '58', '1402014061', '2', '21', 'Internet of Things, Game, and Real Sense Technology', '14', 'Peserta', '15', 'FTI Festival', '2015-06-13', '2015-06-13', '2015-06-13', 'Universitas YARSI', 'Sertifikat', '180806030849Dok baru 2018-08-06_9.jpg', '2018-08-06' ),
( '59', '1402014061', '2', '21', 'Penyerapan Aspirasi Masyarakat', '12', 'Peserta', '30', 'Ibadah Puasa sebagai Pancaran Nilai Pancasila ', '2015-07-02', '2015-07-02', '2015-07-02', 'Majelis Pemusyawaratan Rakyat RI', 'Sertifikat', '180806031048Dok baru 2018-08-06_10.jpg', '2018-08-06' ),
( '60', '1402014061', '2', '21', 'Peningkatan Kapasitas Perempuan di Lembaga Politik', '14', 'Peserta', '15', 'Peningkatan Kapasitas Perempuan di Lembaga Politik dalam Rangka Kesetaraan Gender', '2016-05-26', '2016-05-26', '2016-05-26', 'Universitas YARSI', 'Sertifikat', '180806031325Dok baru 2018-08-06_11.jpg', '2018-08-06' ),
( '61', '1402014061', '2', '21', 'Talkshow Digitalpreneur', '14', 'Peserta', '15', 'Talkshow Digitalpreneur bersama Raditya Dika', '2017-03-24', '2017-03-24', '2017-03-24', 'Universitas YARSI', 'Sertifikat', '180806031534Dok baru 2018-08-06_12.jpg', '2018-08-06' ),
( '62', '1402014061', '2', '21', 'UPGRADE  "Your Passion Graphic Design"', '14', 'Peserta', '15', 'seminar dan workshop upgrade your passion graphic design, edit foto dan video', '2018-05-12', '2018-05-12', '2018-05-12', 'Universitas YARSI', '10 - 40 jam', '180806031957Dok baru 2018-08-06_16.jpg', '2018-08-06' ),
( '63', '1402014049', '2', '21', 'UPGRADE', '14', 'Peserta', '15', 'seminar dan workshop upgrade your passion graphic design ', '2018-05-12', '2018-05-12', '2018-05-12', 'Universitas YARSI', 'Sertifikat', '180806033304Dok baru 2018-08-06 (5)_9.jpg', '2018-08-06' ),
( '64', '1402014049', '2', '21', 'Imagine cup 2016', '14', 'Peserta', '15', 'Global Student Tehcnology Competition', '2016-05-26', '2016-05-26', '2016-05-26', 'Universitas YARSI', 'Sertifikat', '180806034016Dok baru 2018-08-06 (5)_2.jpg', '2018-08-06' ),
( '65', '1402014049', '2', '19', 'Lomba Greenfoot', '14', 'Juara 1', '50', 'lomba greenfoot', '2015-05-11', '2015-05-31', '2015-06-13', 'Universitas YARSI', 'Sertifikat', '180806034504Dok baru 2018-08-06 (5)_6.jpg', '2018-08-06' ),
( '66', '1402014049', '1', '17', 'sistem pendidikan tinggi', '31', 'Prestasi', '35', 'spt maba', '2014-08-21', '2014-08-22', '2014-08-22', 'Universitas YARSI', 'Sertifikat', '180806034723Dok baru 2018-08-06 (5)_7.jpg', '2018-08-06' ),
( '67', '1402014049', '2', '35', 'CISCO', '11', '-', '50', 'ccna routing and switching : introducing to networks', '2016-09-21', '2016-09-21', '2016-09-21', 'CISCO', 'Sertifikat', '180806035344Dok baru 2018-08-06 (5)_4.jpg', '2018-08-06' ),
( '68', '1402014049', '2', '34', 'Asisten Dosen Fakultas Teknologi Informasi', '31', '-', '15', 'asisten dosen fakultas teknologi informai ', '2018-02-17', '2018-02-17', '2018-02-17', 'Universitas YARSI', 'Sertifikat', '180806035601Dok baru 2018-08-06 (5)_5.jpg', '2018-08-06' ),
( '70', '1402014029', '1', '18', 'SPT (Sistem Pendidikan TInggi)', '31', 'Prestasi', '25', 'Sebagai peserta SPT (Sistem Pendidikan TInggi) Universitas YARSI', '2018-08-06', '2018-08-06', '2018-08-06', 'Universitas YARSI', '10 - 40 jam', '180806072745a3.jpg', '2018-08-06' ),
( '71', '1402014029', '2', '21', 'Seminar Indonesia Backtrack Team', '12', 'Peserta', '30', 'Seminar dengan topik "Save The Nation From Cyber War"', '2015-03-14', '2015-03-14', '2015-03-14', 'Indonesia Backtrack Team', 'Sertifikat', '1808060733567.jpg', '2018-08-06' ),
( '73', '1402014029', '2', '34', 'Asisten Dosen Fakultas Teknologi Informasi', '31', '-', '15', 'Menjadi Asisten Dosen selama periode tahun ajaran 2015/2016', '2015-08-06', '2018-01-23', '2018-02-17', 'Universitas YARSI', 'Sertifikat', '180806074832a8.jpg', '2018-08-06' ),
( '74', '1402014083', '4', '51', 'Sosialisasi Program Wirausaha Muda Mandiri', '27', 'Peserta', '15', 'Sosialisasi Program Wirausaha Muda Mandirin (WMM) 2016', '2016-11-24', '2016-11-24', '2016-11-24', 'Universitas YARSI', 'Sertifikat', '180806075726wmm.jpg', '2018-08-06' ),
( '75', '1402014029', '2', '21', 'Indonesia Android Kejar 3.0  Begginer', '12', 'Peserta', '30', 'Pelatihan android yang bekerjasama dengan Google.', '2017-10-13', '2017-12-19', '2017-12-20', 'Google Developers', 'Sertifikat', '180806080534doc.pdf', '2018-08-06' ),
( '76', '1402014083', '2', '34', 'BATIK (Badan Asisten Teknologi Informatika)', '31', '-', '15', 'BATIK (Badan Asisten Teknologi Informatika)', '2018-02-17', '2018-02-17', '2018-02-17', 'Universitas YARSI', 'Absensi/Bukti Kehadiran', '180806080709batik.jpg', '2018-08-06' ),
( '77', '1402014029', '2', '35', 'TOEIC', '12', '-', '40', 'Lulus TOEIC dari Optima Language', '2018-02-13', '2018-02-13', '2018-02-20', 'Optima Language', 'Sertifikat', '180806081257a1.jpg', '2018-08-06' ),
( '78', '1402014083', '2', '31', 'Pelatihan Penulisan Proposal PKM Untuk Dosen dan Mahasiswa Universitas YARSI', '31', 'Anggota', '15', 'Pelatihan Penulisan Proposal PKM Untuk Dosen dan Mahasiswa Universitas YARSI di ruang Ar-rahman lantai 12', '2015-09-28', '2015-09-28', '2015-09-28', 'Universitas YARSI', 'Absensi/Bukti Kehadiran', '180806081621proposal pkm.jpg', '2018-08-06' ),
( '79', '1402014029', '2', '21', 'Indonesia Android Kejar 3.0 Intermediate', '12', 'Peserta', '30', 'Menjadi salah satu peserta pelatihan Android dalam tingkat level intermediate', '2017-12-29', '2018-02-02', '2018-03-13', 'Google Developers', 'Sertifikat', '180806082504doc(1).pdf', '2018-08-06' ),
( '80', '1402014029', '2', '21', 'Profit (Prospect Of IT) 2018', '15', 'Peserta', '10', 'Profit (Prospect Of IT) 2018 adalah sebuah acara seminar yang yang dilakukan oleh Senat Mahasiswa YARSI', '2018-02-24', '2018-02-24', '2018-02-24', 'Universitas YARSI', 'Sertifikat', '180806084151Debita Febriana.jpg', '2018-08-06' ),
( '81', '1402014029', '2', '21', 'Pelatihan Perencanaan Karier Siswa', '15', 'Peserta', '10', 'Musyawarah Guru Bimbingan Konseling (MGBK) SMK Jakarta Pusat Fakultas Psikologi dan Fakultas Teknologi Informasi Universitas YARSI', '2018-05-08', '2018-05-09', '2018-05-10', 'Universitas YARSI', 'Sertifikat', '180806084551a7.jpg', '2018-08-06' ),
( '82', '1402014029', '2', '21', 'Pelatihan Pengamanan Penggunaan Komputer pada Anak dan Remaja Bagi Orang Tua di Wilayah RW II Cempaka Putih, Kec. Cempaka Putih, Jakarta Pusat', '15', 'Peserta', '10', 'Melakukan pelatihan kepada orang tua, untuk mengawasi apa yang dilakukan oleh anak saat menggunakan komputer', '2018-01-15', '2018-01-15', '2018-01-15', 'Universitas YARSI', 'Sertifikat', '180806085051a6.jpg', '2018-08-06' ),
( '83', '1402014029', '2', '21', 'CompFest 8', '12', 'Peserta', '30', 'COMPFEST adalah sebuah acara IT tahunan yang diselenggarakan oleh mahasiswa Fakultas Ilmu Komputer, Universitas Indonesia sejak tahun 2009. Melalui Competition yang membawa berbagai inovasi dalam teknologi, pameran IT yang menyajikan berbagai perkembangan teknologi dibungkus dalam konsep gamifikasi, seminar mengenai topik terhangat di dunia IT, dan rangkaian Academy yang mendidik generasi muda Indonesia, COMPFEST memiliki tujuan berbagi visi akan Indonesia yang lebih maju. Dengan rangkaian acara COMPFEST, harapannya adalah semua orang dapat belajar dan menikmati kemajuan terbaru di dunia IT.', '2016-09-17', '2016-09-17', '2016-09-17', 'Universitas Indonesia', '10 - 40 jam', '180806090403Debita Febriana(1).pdf', '2018-08-06' ),
( '84', '1402014029', '2', '21', 'Participation NetRiders', '11', 'Peserta', '50', 'Representing your academy in the Cisco Networking Academy Asia Pacific and Japan 2016 NetRiders CCENT Skills Competition. ', '2016-05-12', '2016-05-19', '2016-05-20', 'Cicso Networking Academy', 'Sert./SK/ST', '1808060917092.jpg', '2018-08-06' ),
( '85', '1402014029', '2', '21', 'ImagineCup Indonesia 2016', '11', 'Peserta', '50', 'Seminar Microsoft kompetisi dibidang teknologi', '2016-05-09', '2016-05-10', '2016-05-10', 'Microsoft Indonesia', 'Sert./SK/ST', '1808060924216.jpg', '2018-08-06' ),
( '86', '1402014061', '2', '34', 'Asisten Dosen Fakultas Teknologi Informasi', '31', '-', '15', 'Asisten Dosen Fakultas Teknologi Informasi 
Algoritma Pemrograman 1 Semester Ganjil 2015/2016
Algoritma Pemrograman 2 Semester Genap 2015/2016
Pemrograman Web Semester Genap 2016/2017
Struktur Data Semester Ganjil 2016/2017', '2015-02-09', '2017-12-31', '2018-02-17', 'Universitas YARSI', 'Sertifikat', '180806111805Dok baru 2018-08-06_14.jpg', '2018-08-06' ),
( '87', '1402014061', '2', '34', 'Pelatihan Pemrograman Java bagi Guru', '31', '-', '15', 'Fasilitator Pendamping dalam acara Pelatihan Pemrograman Java bagi Guru ', '2015-08-19', '2015-08-21', '2015-08-21', 'Universitas YARSI', 'Sertifikat', '180806112609Dok baru 2018-08-06_2.jpg', '2018-08-06' ),
( '88', '1402014061', '2', '34', 'Pelatihan Pembuatan Game Animasi Menggunakan Greenfoot ', '31', '-', '15', 'Fasilitator Pendamping dalam acara Pelatihan Pembuatan Game Animasi Menggunakan Greenfoot ', '2015-05-08', '2015-05-09', '2015-05-09', 'Universitas YARSI', 'Sertifikat', '180806112823Dok baru 2018-08-06_3.jpg', '2018-08-06' ),
( '89', '1402014061', '1', '18', 'Pelatihan Penulisan Proposal PKM untuk Dosen dan Mahasiswa Universitas YARSI', '31', 'Prestasi', '25', 'Pelatihan Penulisan Proposal PKM untuk Dosen dan Mahasiswa Universitas YARSI', '2015-09-28', '2015-09-28', '2015-09-28', 'Universitas YARSI', 'Sertifikat', '180806113218Dok baru 2018-08-06_6.jpg', '2018-08-06' ),
( '90', '1402014061', '1', '17', 'Sistem Pendidikan Tinggi 2014', '31', 'Prestasi', '35', 'Peserta Sistem Pendidikan Tinggi 2014', '2014-08-21', '2014-08-22', '2014-08-22', 'Universitas YARSI', 'Sertifikat', '180806113529Dok baru 2018-08-06_13.jpg', '2018-08-06' ),
( '91', '1402014061', '2', '38', 'Seminar dan Workshop UPGRADE "Your Passion Graphic Design"', '31', 'Peserta', '15', 'Seminar dan Workshop UPGRADE "Your Passion Graphic Design"
Editing Video dan Gambar', '2018-05-12', '2018-05-12', '2018-05-12', 'Universitas YARSI', 'Sertifikat', '180806113925Dok baru 2018-08-06_17.jpg', '2018-08-06' ),
( '92', '1402014005', '1', '17', 'SPT 2014', '31', 'Prestasi', '35', 'Sebagai peserta dalam acara SPT 2014', '2014-08-21', '2014-08-22', '2018-03-12', 'Universitas', '10 - 40 jam', '18080710042686FF53F0-2739-4EF8-938F-A34C91DE84F6.jpeg', '2018-08-07' ),
( '93', '1402014057', '2', '21', 'Google Cloud OnBoard', '11', 'Peserta', '50', 'Seminar tentang search engine dan penyimpanan data berbasis cloud', '2018-04-19', '2018-04-19', '2018-04-19', 'Google Cloud', 'Sert./Daftar Hadir', '1808071016521533611702158..jpg', '2018-08-07' ),
( '94', '1402013060', '1', '18', 'Pelatihan Penulisan Proposal', '31', 'Prestasi', '25', 'Pelatihan dalam penulisan proposal untuk dosen dan mahasiswa universitas yarsi', '2015-09-28', '2015-09-28', '2015-09-28', 'Yarsi', 'Sertifikat', '1808071021001-1.jpg', '2018-08-07' ),
( '95', '1402014057', '1', '17', 'Sistem Pendidika Tinggi', '31', 'Prestasi', '35', 'Acara Sistem Penataran Tinggi Mahasiswa Baru', '2014-08-21', '2014-08-22', '2018-04-18', 'Universitas YARSI', '10 - 40 jam', '1808071022531533612146017..jpg', '2018-08-07' ),
( '96', '1402013060', '2', '21', 'Seminar Android dan Keamanannya', '14', 'Peserta', '15', 'Menjelaskan tentang Android serta Keamanannya', '2013-05-23', '2013-05-23', '2013-05-23', 'Yarsi', 'Sertifikat', '1808071024262-1.jpg', '2018-08-07' ),
( '97', '1402014057', '2', '34', 'Pelatihan Pembuatan Game Animasi Menggunakan Greenfoot', '31', '-', '15', 'Sebagai fasilitator pendamping dalam acara pelatihan pembuatan game animasi menggunakan greenfoot', '2015-05-08', '2015-05-09', '2015-05-09', 'Universitas YARSI', '10 - 40 jam', '1808071027481533612422371..jpg', '2018-08-07' ),
( '98', '1402014057', '2', '21', 'Seminar dan Workshop Upgrade Your Passion Graphic Design', '14', 'Peserta', '15', 'Acara seminar graphic design', '2018-05-12', '2018-05-12', '2018-05-12', 'Universitas YARSI', 'Sert./Daftar Hadir', '1808071031201533612661496..jpg', '2018-08-07' ),
( '99', '1402014057', '2', '21', 'Seminar dan Open House FTI Festival 2015', '15', 'Peserta', '10', 'Internet of things, game dan real sense technology', '2015-06-13', '2015-06-13', '2015-06-13', 'Universitas YARSI', 'Sert./Daftar Hadir', '1808071034381533612858086..jpg', '2018-08-07' ),
( '100', '1402013060', '2', '21', 'Sosialisasi Program Wirausaha Muda Mandiri', '14', 'Peserta', '15', 'Mengikuti Sosialisasi dalam program wirausaha muda mandiri', '2016-11-24', '2016-11-24', '2016-11-24', 'Yarsi', 'Sertifikat', '1808071035473-1.jpg', '2018-08-07' ),
( '101', '1402014057', '3', '47', 'Sosialisasi Program Wirausaha Muda Mandiri 2016', '14', 'Peserta', '20', 'Program Wirausaha Muda Mandiri', '2016-11-26', '2016-11-26', '2016-11-26', 'Universitas YARSI', '10 - 40 jam', '1808071037461533613050991..jpg', '2018-08-07' ),
( '102', '1402013060', '2', '21', 'Imagine Cup Indonesia 2015', '14', 'Peserta', '15', 'Global Student Technology Competition', '2015-03-18', '2015-03-18', '2015-03-18', 'Yarsi', 'Sertifikat', '1808071039259-1.jpg', '2018-08-07' ),
( '103', '1402014057', '2', '21', 'Imagine Cup Indonesia 2016', '12', 'Peserta', '30', 'Microsoft Global Student Technology Competition', '2016-09-21', '2016-09-21', '2016-09-21', 'Microsoft Indonesia', 'Sert./Daftar Hadir', '1808071043201533613277816..jpg', '2018-08-07' ),
( '104', '1402014012', '2', '31', 'Pelatihan penulisan', '31', 'Anggota', '15', 'Penulisan Proposal PKM', '2015-09-25', '2018-09-28', '2018-09-28', 'Universitas Yarsi', 'Sertifikat', '180807121724New Doc 2018-08-07 - Page 3.pdf', '2018-08-07' ),
( '105', '1402014012', '4', '49', 'Career Day', '23', 'Anggota Pengurus', '15', 'Career Day', '2015-09-07', '2018-09-09', '2018-09-10', 'Universitas Yarsi', 'Sertifikat', '180807122034New Doc 2018-08-07 - Page 4.pdf', '2018-08-07' ),
( '106', '1402014005', '2', '31', 'PKM', '31', 'Anggota', '15', 'Penulisan PKM', '2015-09-28', '2015-09-28', '2015-09-28', 'Universitas', 'Sertifikat', '18080712372457F137BB-F043-4730-AFDF-F4EC13792ADF.jpeg', '2018-08-07' ),
( '107', '1402014012', '4', '49', 'Senat Mahasiswa', '22', 'Anggota Pengurus', '20', 'Senat Mahasiswa Fakultas Teknik Informasi', '2015-09-01', '2017-09-09', '2017-09-10', 'Universitas Yarsi', 'Sertifikat', '180807123758New Doc 2018-08-07 - Page 2.pdf', '2018-08-07' ),
( '108', '1402014012', '2', '34', 'Asisten Dosen', '31', '-', '15', 'Asisten Dosen CCNA 1', '2017-08-01', '2018-02-17', '2018-02-17', 'Universitas Yarsi', 'Sertifikat', '180807124237New Doc 2018-08-07 - Page 5.pdf', '2018-08-07' ),
( '109', '1402014005', '2', '34', 'Asisten PMB', '31', '-', '15', 'PMB 2015', '2015-08-24', '2015-08-26', '2015-08-26', 'Fakultas', 'Sertifikat', '18080712424383318044-6E4D-441C-9167-4FF327D31252.jpeg', '2018-08-07' ),
( '110', '1402014012', '2', '20', 'CCNA', '11', 'Peserta', '50', 'Mengikuti Tes CCNA 1', '2016-09-01', '2017-01-26', '2017-01-26', 'Universitas Yarsi', 'Sertifikat', '180807124633New Doc 2018-08-07 - Page 1.pdf', '2018-08-07' ),
( '111', '1402014005', '2', '21', 'Cisco Networking', '11', 'Peserta', '50', 'Cisco Networking', '2016-09-21', '2016-09-21', '2016-09-21', 'Universitas', 'Sertifikat', '1808071249252A34A66E-E532-433E-8101-EA4E56422211.jpeg', '2018-08-07' ),
( '112', '1402014012', '2', '20', 'Netriders', '11', 'Peserta', '50', 'Tes Netriders', '2016-12-28', '2016-12-28', '2017-01-17', 'Cisco', 'Sertifikat', '180807125039New Doc 2018-08-07 - Page 6.pdf', '2018-08-07' ),
( '113', '1402014005', '4', '51', 'LKOM', '27', 'Peserta', '15', 'LKOM FTI 2016', '2016-10-29', '2016-10-29', '2016-10-29', 'Universitas', 'Sertifikat', '180807125303A4708B85-B90A-4277-800B-6BCB2A550987.jpeg', '2018-08-07' ),
( '114', '1402014012', '2', '20', 'CCNA', '11', 'Peserta', '50', 'Tes CCNA 2', '2015-09-01', '2016-01-26', '2016-01-26', 'Cisco', 'Sertifikat', '180807125339New Doc 2018-08-07 - Page 7.pdf', '2018-08-07' ),
( '115', '1402014012', '2', '20', 'CCNA', '11', 'Peserta', '50', 'Tes CCNA 1', '2016-01-29', '2016-09-21', '2016-09-21', 'Cisco', 'Sertifikat', '180807125648New Doc 2018-08-07 - Page 8.pdf', '2018-08-07' ),
( '116', '1402014095', '1', '17', 'SPT Yarsi Tahun 2014', '31', 'Prestasi', '35', 'SPT Yarsi ', '2014-08-21', '2014-08-22', '2014-09-10', 'Universitas Yarsi', 'Sertifikat', '180807022826New Doc 2018-08-07_8.jpg', '2018-08-07' ),
( '117', '1402014095', '2', '36', 'TOEIC Score Optima Language', '35', '-', '25', 'TOEIC SCORE', '2017-01-04', '2017-01-04', '2018-02-21', 'Optima Language', 'Sertifikat', '180807023842New Doc 2018-08-07_1.jpg', '2018-08-07' ),
( '118', '1402014052', '1', '17', 'SPT Universitas YARSI 2014', '31', 'Prestasi', '35', 'pengenalan tentang kehidupan di universitas YARSI', '2014-08-21', '2014-08-24', '2014-09-01', 'Universitas YARSI', 'Sertifikat', '1808070310318637DBF5-772B-4FDD-9D8F-334BD497F912.jpeg', '2018-08-07' ),
( '119', '1402014072', '4', '52', 'Panitia SPT Universitas Yarsi Tahun 2015', '25', 'Anggota Panitia', '5', 'Panitia SPT Universitas Yarsi Tahun 2015', '2015-08-20', '2015-08-22', '2015-08-25', 'Universitas', 'Sertifikat', '180807033544SPTMB.jpg', '2018-08-07' ),
( '120', '1402014094', '1', '17', 'SPT', '31', 'Prestasi', '35', 'Kegiatan SPT', '2014-08-21', '2014-08-22', '2018-07-10', 'Universitas YARSI', 'Sertifikat', '180807042516image.jpg', '2018-08-07' ),
( '121', '1402014094', '2', '21', 'Internasional Symposium on Bioinformatics', '11', 'Peserta', '50', 'seminar internasional', '2017-07-11', '2017-07-12', '2017-07-19', 'Universitas YARSI', 'Sertifikat', '180807044450perdana.jpg', '2018-08-07' ),
( '122', '1402014094', '2', '21', 'Pelatihan Proposal PKM', '14', 'Peserta', '15', 'Pelatihan Proposal PKM', '2015-09-28', '2015-09-28', '2015-11-23', 'Universitas YARSI', 'Sertifikat', '180807044823pkm.jpg', '2018-08-07' ),
( '123', '1402014094', '2', '21', 'Imagine Cup 2015', '14', 'Peserta', '15', 'Imagine Cup 2015', '2015-09-23', '2015-09-23', '2015-09-30', 'Universitas YARSI', 'Sertifikat', '180807045045imagine 2015.jpg', '2018-08-07' ),
( '124', '1402014094', '2', '21', 'Imagine Cup 2016', '14', 'Peserta', '15', 'Imagine Cup 2016', '2016-09-21', '2015-09-21', '2016-09-28', 'Universitas YARSI', 'Sertifikat', '180807045159imagine 2016.jpg', '2018-08-07' ),
( '125', '1402014094', '2', '21', 'Net Riders', '11', 'Peserta', '50', 'Net Riders', '2015-07-21', '2015-07-29', '2017-08-28', 'Universitas YARSI', 'Sertifikat', '180807045433net riders.jpg', '2018-08-07' ),
( '126', '1402014094', '2', '21', 'CISCO', '11', 'Peserta', '50', 'CISCO', '2015-07-13', '2015-07-22', '2015-07-29', 'Universitas YARSI', 'Sertifikat', '180807045545cisco.jpg', '2018-08-07' ),
( '127', '1402014094', '2', '34', 'Asisten Lab Praktikum', '31', '-', '15', 'Asisten Lab Praktikum', '2016-09-13', '2018-02-14', '2018-07-17', 'Universitas YARSI', 'Sertifikat', '180807045938asdos.jpg', '2018-08-07' ),
( '128', '1402014102', '2', '21', 'Seminar And Workshop ', '16', 'Peserta', '5', 'Seminar dan Workshop tentang Malware Incident Prevention dan Handling For Corporate', '2015-06-01', '2015-06-01', '2015-06-01', 'YARSI', 'Sertifikat', '180807064440New_Doc_2018-08-07_10_malware[1].jpg', '2018-08-07' ),
( '129', '1402014133', '2', '36', 'Prediction Test Administered by Optima Language, /form FA', '35', '-', '25', 'Toeic Score Slip', '2018-02-13', '2018-02-13', '2018-02-20', 'Universitas Yarsi', '10 - 40 jam', '180807064646bing.jpg', '2018-08-07' ),
( '130', '1402014133', '4', '49', 'Pengurusan SEMA FTI tahun 2016-2017', '22', 'Pengurus Inti', '40', 'sertifikat pengurusan senat mahasiswa', '2016-08-02', '2017-08-02', '2017-08-29', 'Universitas Yarsi', '10 - 40 jam', '180807065137senat.jpg', '2018-08-07' ),
( '131', '1402014102', '2', '21', 'Seminar dan Open House FTI Festival 2015', '15', 'Peserta', '10', 'Seminar dan Open House FTI Festival 2015 dengan tema : Internet of Things, Game, and Real Sense Technology', '2015-06-13', '2015-06-13', '2015-06-13', 'YARSI', 'Daftar Hadir/Bukti Hadir', '180807070207New Doc 2018-08-07 (1)_6_yafest.jpg', '2018-08-07' ),
( '132', '1402014133', '2', '21', 'global student technology competition', '12', 'Peserta', '30', 'berpartisipasi dalam seminar Microsoft', '2016-02-17', '2016-02-17', '2016-02-24', 'Microsoft', '10 - 40 jam', '180807070504icup.jpg', '2018-08-07' ),
( '133', '1402014102', '4', '49', 'Kepengurusan Senat Mahasiswa FTI', '22', 'Anggota Pengurus', '20', 'Kepengurusan Senat Mahasiswa FTI', '2016-08-20', '2017-08-20', '2017-08-29', 'YARSI', 'Sertifikat', '180807070740New Doc 2018-08-07 (1)_4_sema.jpg', '2018-08-07' ),
( '134', '1402014102', '1', '17', 'SPT (Sistem Pendidikan Tinggi)', '31', 'Prestasi', '35', 'SPT (Sistem Pendidikan Tinggi) atau pengenalan kehidupan kampus bagi mahasiswa baru', '2014-08-21', '2014-08-22', '2014-08-29', 'YARSI', 'Daftar Hadir/Bukti Hadir', '180807071215New Doc 2018-08-07 (1)_5_spt.jpg', '2018-08-07' ),
( '135', '1402014133', '2', '34', 'asisten dosen fakultas teknologi informasi', '31', '-', '15', 'sebagai asdos basdat 1, SDA,  RPL', '2017-02-01', '2018-02-01', '2018-02-17', 'Universitas Yarsi', '10 - 40 jam', '180807071455asdos.jpg', '2018-08-07' ),
( '136', '1402014102', '2', '36', 'prediction test administered by Optima Language', '35', '-', '25', 'toeic score slip', '2018-01-22', '2018-01-22', '2018-01-29', 'YARSI', 'Sertifikat', '180807071618New Doc 2018-08-07 (1)_1_toeic.jpg', '2018-08-07' ),
( '137', '1402014133', '4', '52', 'career day', '24', 'Divisi/ Koord. Bid', '10', 'kepanitiaan acara career day', '2015-09-07', '2015-09-09', '2015-09-14', 'Universitas Yarsi', 'Sertifikat', '180807072003careerday.jpg', '2018-08-07' ),
( '138', '1402014102', '2', '34', 'Seminar BATIK', '31', '-', '15', 'Pemberian Sertifikat sebagai asisten dosen fakultas teknologi informasi', '2018-02-17', '2018-02-17', '2018-02-24', 'YARSI', 'Sertifikat', '180807072014New Doc 2018-08-07 (1)_3_batik.jpg', '2018-08-07' ),
( '139', '1402014133', '2', '21', 'pelatihan penulisan proposal PKM untuk dosen dan mahasiswa', '14', 'Peserta', '15', 'keikut sertaan dalam pelatihan', '2015-09-28', '2015-09-28', '2015-09-28', 'Universitas Yarsi', 'Sertifikat', '180807072406pkm.jpg', '2018-08-07' ),
( '140', '1402014102', '2', '35', 'Certificate of Achievement', '12', '-', '40', 'Les tambahan bahasa inggris', '2014-06-24', '2014-12-17', '2014-12-24', 'LIA', 'Sertifikat', '180807072548New Doc 2018-08-07 (1)_9_lia.jpg', '2018-08-07' ),
( '141', '1402014102', '2', '21', 'Seminar Microsoft "GLOBAL STUDENT TECHNOLOGY COMPETITION"', '12', 'Peserta', '30', 'Seminar Microsoft bertema "GLOBAL STUDENT TECHNOLOGY COMPETITION"', '2016-02-17', '2016-02-17', '2016-02-24', 'Microsoft', 'Sertifikat', '180807072820New Doc 2018-08-07 (1)_11_imaginecup.jpg', '2018-08-07' ),
( '142', '1402014133', '1', '17', 'Sistem Pendidian Tinggi', '31', 'Prestasi', '35', 'peserta acara spt', '2014-08-21', '2014-08-22', '2014-08-27', 'Universitas Yarsi', 'Sertifikat', '180807073213spt.jpg', '2018-08-07' ),
( '143', '1402014095', '2', '34', 'Asisten Dosen FTI', '31', '-', '15', 'Asdos AP1, asdos AP2, asdos Struktur Data', '2015-09-15', '2017-07-21', '2018-02-17', 'Universitas Yarsi', 'Sertifikat', '180807073519New Doc 2018-08-07_7.jpg', '2018-08-07' ),
( '144', '1402014095', '2', '21', 'Seminar ', '12', 'Peserta', '30', 'Seminar microsoft "Global Student Technology Competition"', '2016-02-15', '2016-02-15', '2016-02-25', 'Microsoft', 'Sertifikat', '180807074056New Doc 2018-08-07_10.jpg', '2018-08-07' ),
( '145', '1402014095', '2', '21', 'Seminar', '14', 'Peserta', '15', 'Seminar dan open housr fti festival 2015 "internet of things, game, and real sense technology"', '2015-05-21', '2015-05-21', '2015-06-13', 'Universitas Yarsi', 'Sertifikat', '180807074349New Doc 2018-08-07_6.jpg', '2018-08-07' ),
( '146', '1402014095', '4', '51', 'Latihan kepemimpinan organisasi mahasiswa (LKOM) FTI Universitas Yarsi', '27', 'Peserta', '15', 'Latihan kepemimpinan organisasi mahasiswa', '2016-10-15', '2016-10-15', '2016-10-29', 'Universitas Yarsi', 'Sertifikat', '180807075158New Doc 2018-08-07_5.jpg', '2018-08-07' ),
( '147', '1402014095', '2', '21', 'Seminar', '15', 'Peserta', '10', 'Seminar and workshop "malware incident prevention and handling for corporate"', '2015-06-01', '2015-06-01', '2015-06-15', 'Universitas Yarsi', 'Sertifikat', '180807075557New Doc 2018-08-07_2.jpg', '2018-08-07' ),
( '148', '1402014095', '4', '49', 'Pengurus SEMA FTI', '22', 'Anggota Pengurus', '20', 'Pengurus SEMA FTI tahun 2016-2017', '2016-08-15', '2017-08-20', '2017-08-29', 'Universitas Yarsi', 'Sertifikat', '180807075909New Doc 2018-08-07_4.jpg', '2018-08-07' ),
( '149', '1402014127', '2', '21', 'Penyerapan Aspirasi Masyarakat', '13', 'Peserta', '20', 'Bekerjasama dengan Jaringan Pemuda Indonesia. Tema tentang "Ibadah Puasa Sebagai Pancaran Nilai Pancasila"', '2015-07-02', '2015-07-02', '2015-07-02', 'Majelis Permusyawaratan Rakyat Republik Indonesia', 'Sertifikat', '180807083511MPR.jpg', '2018-08-07' ),
( '150', '1402014127', '1', '18', 'Sistem Pendidikan Tinggi (SPT)', '31', 'Prestasi', '25', 'SPT (Sistem Pendidikan Tinggi)', '2014-08-21', '2014-08-22', '2014-08-22', 'Universitas Yarsi', 'Sertifikat', '180807084114Yarsi.jpg', '2018-08-07' ),
( '151', '1402014127', '2', '21', 'Peningkatan Kapasitas Perempuan di Lembaga Politik Dalam Rangka Kesetaraan Gender Angkatan VI Tahun 2016', '13', 'Peserta', '20', 'Peningkatan Kapasitas Perempuan di Lembaga Politik Dalam Rangka Kesetaraan Gender Angkatan VI Tahun 2016', '2016-05-26', '2016-05-26', '2016-05-26', 'Pemerintah Provinsi Daerah Khusus Ibukota Jakarta', 'Sertifikat', '180807084504Jakarta.jpg', '2018-08-07' ),
( '152', '1402014127', '2', '36', 'TOEIC', '35', '-', '25', 'Prediction Test Administered by Optima Language, From FA', '2018-01-22', '2018-01-22', '2018-01-29', 'Optima Language', 'Sertifikat', '180807091800S28C-6e18080714410_0001.jpg', '2018-08-07' ),
( '153', '1402014127', '2', '21', 'Imagine Cup Indonesia 2016', '14', 'Peserta', '15', 'Seminar Microsoft "GLOBAL STUDENT TECHNOLOGY COMPETITION"', '2016-01-01', '2016-01-01', '2016-01-01', 'Microsoft Indonesia', 'Sertifikat', '180807092153S28C-6e18080714410_0003.jpg', '2018-08-07' ),
( '154', '1402014127', '2', '21', 'Sosialisasi Program Wirausaha Muda Mandiri (WMM) 2016', '14', 'Peserta', '15', 'Sosialisasi Program Wirausaha Muda Mandiri (WMM) 2016', '2016-11-24', '2016-11-24', '2016-11-24', 'Universitas Yarsi', 'Sertifikat', '180807092610S28C-6e18080714410_0005.jpg', '2018-08-07' ),
( '155', '1402014130', '2', '21', 'Seminar dan Open House FTI Festival 2015', '15', 'Peserta', '10', 'FTI Festival yang diadakan di Universitas Yarsi', '2015-05-13', '2015-06-13', '2015-06-13', 'Universitas Yarsi', 'Sert./SK/ST', '180807093148seminar.jpg', '2018-08-07' ),
( '156', '1402014127', '2', '34', 'Asisten Dosen Teknologi Informasi', '31', '-', '15', 'Asisten Dosen Teknologi Informasi matakuliah metode numerik, sistem operasi', '2017-01-01', '2017-01-01', '2018-02-17', 'Universitas Yarsi', 'Sertifikat', '180807093206S28C-6e18080714410_0004.jpg', '2018-08-07' ),
( '157', '1402014130', '2', '34', 'Asisten Dosen Fakultas Teknologi Informasi', '31', '-', '15', 'Pembagian asisten dosen fakultas teknologi informasi', '2018-02-17', '2018-02-17', '2018-02-17', 'Universitas Yarsi', 'SK/S.Ket', '180807093502asdos.jpg', '2018-08-07' ),
( '158', '1402014087', '1', '17', 'SPT (SISTEM PENDIDIKAN TINGGI)', '31', 'Prestasi', '35', 'SPT', '2014-08-21', '2014-08-22', '2014-08-21', 'UNIVERSITAS YARSI', 'Sertifikat', '180807093926Dok baru 2018-08-06 (3)_4.jpg', '2018-08-07' ),
( '159', '1402014130', '4', '49', 'Senat Mahasiswa', '25', 'Bendahara', '25', 'Dedikasi sebagai pengurus Senat Mahasiswa tahun 2016/2017', '2017-08-29', '2017-08-29', '2017-08-29', 'Universitas Yarsi', '10 - 40 jam', '180807094159SEMA.jpg', '2018-08-07' ),
( '160', '1402014127', '2', '21', 'Kosmetika Wardah', '14', 'Peserta', '15', 'beauty class / training / seminar kosmetika wardah', '2018-08-07', '2018-08-07', '2017-01-01', 'Wardah', 'Sertifikat', '180807094207wardah.png', '2018-08-07' ),
( '161', '1402014130', '2', '36', 'Optima Language Sertifikat Toiec', '35', '-', '25', 'Ujian exit toiec', '2017-07-07', '2017-07-07', '2017-09-19', 'Universitas Yarsi', 'Sertifikat', '180807094647toiec.jpg', '2018-08-07' ),
( '162', '1402014130', '1', '17', 'SPT ', '31', 'Prestasi', '35', 'Kegiatan SPT (Sistem Pendidikan Tinggi)', '2014-08-21', '2014-08-22', '2018-05-10', 'Universitas Yarsi', 'Sertifikat', '180807094956SPT.jpg', '2018-08-07' ),
( '163', '1402014130', '2', '21', 'Cisco', '16', 'Peserta', '5', 'Cisco Networking Academy', '2016-09-21', '2016-09-21', '2016-09-21', 'Universitas Yarsi', 'Sert./SK/ST', '180807095535DDJ.jpg', '2018-08-07' ),
( '164', '1402012026', '2', '21', 'PELATIHAN PENULISAN PROPOSAL PKM UNTUK DOSEN DAN MAHASISWA UNIVERSITAS YARSI', '14', 'Peserta', '15', 'Cara merancang penulisan pkm.', '2015-09-28', '2015-09-28', '2015-09-28', 'Dr.Hj. Rika Yuliwulandari, Phd. (wakil rektor II)', 'Sertifikat', '180807095704S28C-6e18080721000_0002.jpg', '2018-08-07' ),
( '165', '1402012026', '2', '21', 'Kolaborasi Pada Teknologi Jaringan Komputer Saat Ini', '14', 'Peserta', '15', 'Teknologi jaringan komputer pada masa kini.', '2012-09-11', '2012-09-11', '2012-09-11', 'Sri Puji Utami A, MT(ketua penyelenggara di universitas yarsi)', 'Sertifikat', '180807100410S28C-6e18080721000_0001.jpg', '2018-08-07' ),
( '166', '1402014087', '2', '36', 'TOEIC SCORE', '35', '-', '25', 'OPTIMA LANGUAGE TOEIC SCORE SLIP RESULT 755', '2017-06-07', '2017-06-07', '2017-09-19', 'OPTIMA LANGUAGE UNIVERSITAS YARSI', 'Sertifikat', '180807100832Dok baru 2018-08-06 (3)_2.jpg', '2018-08-07' ),
( '167', '1402012026', '2', '21', 'GLOBAL STUDENT TECHNOLOGY COMPETITION', '14', 'Peserta', '15', 'Persaingan dalam teknologi dunia internet yg diselenggarakan oleh microsoft.', '2016-03-16', '2016-03-16', '2016-03-16', 'Microsoft', 'Sertifikat', '180807100833S28C-6e18080721000_0004.jpg', '2018-08-07' ),
( '168', '1402014030', '2', '35', 'Mengikuti mata kuliah CCNA', '12', '-', '40', 'Mengikuti lomba netriders', '2016-08-01', '2016-08-01', '2018-08-01', 'Cisco', 'Sertifikat', '180807101154New Doc 2018-08-07 (1)_2.jpg', '2018-08-07' ),
( '169', '1402014030', '2', '21', 'Seminar pendidikan karakter ', '12', 'Peserta', '30', 'Mengikuti seminar', '2016-06-06', '2016-06-06', '2016-06-06', 'Universita negeri jakarta', 'Sertifikat', '180807102123New Doc 2018-08-07 (1)_1.jpg', '2018-08-07' ),
( '170', '1402014087', '2', '34', 'ASISTEN DOSEN FAKULTAS TEKNOLOGI INFORMASI', '31', '-', '15', 'ASISTEN DOSEN FAKULTAS TEKNOLOGI INFORMASI', '2018-02-17', '2018-02-17', '2018-02-17', 'UNIVERSITAS YARSI', 'SK/S.Ket', '180807102344Dok baru 2018-08-06 (3)_1.jpg', '2018-08-07' ),
( '171', '1402014030', '2', '35', 'Mengikuti mata kuliah CCNA', '12', '-', '40', 'Mengikuti kuliah CCNA', '2016-06-06', '2016-06-06', '2016-06-06', 'Universitas yarsi', 'Sertifikat', '180807102435New Doc 2018-08-07 (1)_3.jpg', '2018-08-07' ),
( '172', '1402014074', '4', '49', 'Pengurus SEMA FTI tahun 2016-2017', '22', 'Pengurus Inti', '40', 'Dedikasi sebagai pengurus SEMA FTI tahun 2016-2017', '2016-12-01', '2017-02-01', '2018-03-15', 'Universitas Yarsi', 'Sertifikat', '180807102444img019.jpg', '2018-08-07' ),
( '173', '1402014074', '1', '17', 'Pelatihan Penulisan Proposal PKM Untuk Dosen dan Mahasiswa Universitas YARSI', '31', 'Prestasi', '35', 'Pelatihan Penulisan Proposal PKM Untuk Dosen dan Mahasiswa Universitas YARSI', '2015-09-28', '2015-09-28', '2015-09-28', 'Yarsi University', 'Sertifikat', '180807102740img018.jpg', '2018-08-07' ),
( '174', '1402014074', '1', '18', 'SPT (Sistem Pendidikan Tinggi)', '31', 'Prestasi', '25', 'SPT 2014', '2014-08-21', '2014-08-22', '2014-09-01', 'Yarsi University', 'Sertifikat', '180807102944img017.jpg', '2018-08-07' ),
( '175', '1402012026', '4', '52', 'FTI Cup', '13', 'Anggota Panitia', '40', 'Menyelenggarakan lomba-lomba untuk fakultas teknologi informasi', '2013-04-01', '2013-06-30', '2013-06-30', 'M. faturrachman (ketua senat mahasiswa universitas yarsi)', 'Sert./SK/ST', '180807103028S28C-6e18080721000_0003.jpg', '2018-08-07' ),
( '176', '1402014087', '2', '21', 'FTI FESTIVAL 2015', '15', 'Peserta', '10', 'SEMINAR DAN OPEN HOUSE FTI FESTIVAL 2015 : "INTERNET OF THINGS,GAME, AND REAL SENSE TECHNOLOGY"', '2015-06-13', '2015-06-13', '2015-06-13', 'UNIVERSITAS YARSI', 'Sert./SK/ST', '180807103032Dok baru 2018-08-06 (3)_3.jpg', '2018-08-07' ),
( '177', '1402014087', '2', '21', 'IMAGINE CUP INDONESIA 2016', '12', 'Peserta', '30', 'IMAGINE CUP INDONESIA 2016', '2016-10-07', '2016-10-07', '2016-10-07', 'UNIVERSITAS YARSI', 'Sert./SK/ST', '180807103907Dok baru 2018-08-06 (3)_7.jpg', '2018-08-07' ),
( '178', '1402014087', '2', '21', 'IMAGINE CUP INDONESIA 2015', '12', 'Peserta', '30', 'IMAGINE CUP INDONESIA 2015', '2015-10-07', '2015-10-07', '2015-10-07', 'UNIVERSITAS YARSI', 'Sert./SK/ST', '180807104059Dok baru 2018-08-06 (3)_8.jpg', '2018-08-07' ),
( '179', '1402014087', '3', '47', 'WIRAUSAHA MUDA MANDIRI (WMM) 2016', '14', 'Peserta', '20', 'SOSIALISASI PROGRAM WIRAUSAHA MUDA MANDIRI (WMM) 2016', '2016-11-24', '2016-11-24', '2016-11-24', 'UNIVERSITAS YARSI', 'Sert./SK/ST', '180807104831Dok baru 2018-08-06 (3)_6.jpg', '2018-08-07' ),
( '180', '1402014021', '2', '21', 'Imagine Cup Indonesia 2016', '12', 'Peserta', '30', 'Imagine Cup dari Microsoft Indonesia', '2016-08-30', '2016-08-30', '2016-08-30', 'Microsoft Indonesia', 'Sertifikat', '180808082243anis1(1).jpg', '2018-08-08' ),
( '182', '1402014021', '2', '21', 'Seminar Teknologi dan Bisnis', '12', 'Peserta', '30', 'seminar yg pembahasannya meliputi teknologi dan bisnis ', '2017-06-13', '2017-06-13', '2017-06-13', 'Fakultas Teknik Universitas Muhamadiyah Jakarta', 'Sertifikat', '180808083652anis3.jpg', '2018-08-08' ),
( '183', '1402014021', '2', '21', 'Kebebasan dan Keamanan Berekspresi di Dunia Maya', '14', 'Peserta', '15', 'Seminar mengenai Kebebasan dan Keamanan Berekspresi di Dunia Maya', '2016-06-04', '2016-06-04', '2016-06-04', 'Fakultas Teknik Universitas Muhamadiyah Jakarta', 'Sertifikat', '180808084219anis4.jpg', '2018-08-08' ),
( '184', '1402014021', '2', '21', 'Pelatihan Hardsoft', '14', 'Peserta', '15', 'Seminar Pelatihan Hardsoft', '2017-01-24', '2017-01-24', '2017-01-24', 'Universitas Muhamadiyah Jakarta', 'Sertifikat', '180808084722anis2(1).jpg', '2018-08-08' ),
( '185', '1402013086', '1', '18', 'Pelatihan Penulisan proposal PKM untuk dosen dan mahasiswa Universitas YARSI', '31', 'Prestasi', '25', 'Pelatihan penulisan PKM untuk mahasiswa baru', '2015-09-28', '2015-09-28', '2015-10-06', 'Universitas YARSI', 'Sertifikat', '180808091037IMG_0003.jpg', '2018-08-08' ),
( '186', '1402013086', '2', '21', 'Seminar and workshop "Malware incident prevention and handling for corporate"', '15', 'Peserta', '10', 'Seminar pengamanan dan pencegahan malware dalam suatu perusahaan', '2015-06-01', '2015-06-01', '2015-07-08', 'Fakultas Teknologi Informasi Universitas YARSI', 'Sert./SK/ST', '180808092526IMG_0002.jpg', '2018-08-08' ),
( '187', '1402013086', '2', '21', 'Internet of thing, game and real sense technology', '15', 'Peserta', '10', 'seminar tentang game dan teknologi yang sedang banyak dibicarakan di internet', '2015-06-13', '2015-06-13', '2015-07-02', 'Fakultas Teknologi Informasi Universitas YARSI', 'Sert./SK/ST', '180808093033IMG.jpg', '2018-08-08' ),
( '188', '1402013086', '2', '36', 'Nilai bahasa inggris', '35', '-', '25', 'Penilaian bahasa inggris', '2016-06-30', '2016-06-30', '2016-07-21', 'Optima Language', 'Sertifikat', '180808101553IMG.jpg', '2018-08-08' ),
( '189', '1402014103', '1', '18', 'SPT', '31', 'Prestasi', '25', 'SPT (Sistem Pendidikan Tinggi)', '2014-08-21', '2018-08-22', '2018-08-09', 'Universitas YARSI', '10 - 40 jam', '180809022901FullSizeRender (16).jpg', '2018-08-09' ),
( '190', '1402014103', '3', '42', 'Imagine Cup Indonesia', '14', 'Peserta', '10', 'Seminar Microsoft  "GLOBAL STUDENT TECHNOLOGY COMPETITION"', '2017-02-14', '2017-02-14', '2017-02-14', 'Universitas YARSI', '10 - 40 jam', '180809023349FullSizeRender (17).jpg', '2018-08-09' ),
( '191', '1402014100', '3', '41', 'techno sport cup 2018', '19', 'Juara 2', '20', 'juara 2 kegiatan futsal antar jurusan', '2018-04-14', '2018-04-20', '2018-05-05', 'Senat Mahasiswa', 'Sertifikat', '180809085030img001.jpg', '2018-08-09' ),
( '192', '1402014100', '2', '21', 'Global Student technologi competition', '15', 'Peserta', '10', 'imagine cup 2016', '2015-12-16', '2015-12-16', '2016-02-09', 'Fakultas teknologi informasi', 'Sertifikat', '180809095550photo_2018-08-09_21-37-18.jpg', '2018-08-09' ),
( '193', '1402014100', '2', '29', 'Pelatihan pembuatan game animasimenggunakan greenfoot', '31', '-', '10', 'fti festival 2015', '2015-05-08', '2015-05-09', '2015-05-09', 'Fakultas teknologi informasi', 'Sertifikat', '180809095723photo_2018-08-09_21-37-11.jpg', '2018-08-09' ),
( '194', '1402014100', '2', '20', 'netriders', '11', 'Peserta', '50', 'cisco netriders 2016', '2016-08-08', '2016-08-08', '2016-08-30', 'Fakultas teknologi informasi', 'Sertifikat', '180809100412photo_2018-08-09_21-37-07.jpg', '2018-08-09' ),
( '195', '1402014108', '3', '47', 'Sosialisasi Program Wirausaha Muda Mandiri (WMM) 2016', '14', 'Peserta', '20', 'Melakukan Program Wirausaha', '2016-11-24', '2016-11-24', '2016-11-24', 'Universitas Yarsi', 'Sert./SK/ST', '18081010163820180807_203659.jpg', '2018-08-10' ),
( '196', '1402014108', '2', '21', 'Knowledge Share Series: The Power of Story Telling in Digital Era', '14', 'Peserta', '15', 'Sebagai PESERTA dalam kegiatan workshop ', '2018-04-17', '2018-04-17', '2018-04-17', 'Universitas Yarsi', 'Sert./SK/ST', '18081010210420180807_203740.jpg', '2018-08-10' ),
( '197', '1402014108', '2', '21', 'Pelatihan Penulisan Proposal PKM Untuk Dosen dan Mahasiswa Universitas YARSI', '14', 'Peserta', '15', 'Melakukan Pelatihan Penulisan Proposal PKM', '2015-09-28', '2015-09-28', '2015-09-28', 'Universitas Yarsi', 'Sert./SK/ST', '18081010241720180807_203822.jpg', '2018-08-10' ),
( '198', '1402014108', '2', '21', 'GLOBAL STUDENT TECNOLOGY COMPETITION', '14', 'Peserta', '15', 'Melakukan seminar Microsoft', '2016-04-16', '2016-04-16', '2016-04-16', 'Universitas Yarsi', 'Sert./SK/ST', '18081010274920180807_203843.jpg', '2018-08-10' ),
( '199', '1402014108', '2', '21', 'NetRiders', '11', 'Peserta', '50', 'Melakukan Ujian dari pihak Cisco', '2016-07-13', '2016-07-13', '2016-07-13', 'Cisco Networking Academy', 'Sert./SK/ST', '18081010322120180807_203907.jpg', '2018-08-10' ),
( '200', '1402014108', '2', '34', 'Asisten Dosen Fakultas Teknologi Informasi', '31', '-', '15', 'Sebagai Asisten Dosen Fakultas Teknologi Informasi', '2018-02-17', '2018-02-17', '2018-02-17', 'Universitas Yarsi', 'Sert./SK/ST', '18081010360420180807_204115.jpg', '2018-08-10' ),
( '201', '1402014108', '2', '21', 'CCNA Routing and Switching: Introduction to Networks', '11', 'Peserta', '50', 'Melakukan Ujian CCNA Routing and Switching: Introduction to Networks', '2016-09-21', '2016-09-21', '2016-09-21', 'Universitas Yarsi', 'Sert./SK/ST', '18081010392520180807_204155.jpg', '2018-08-10' ),
( '202', '1402014108', '1', '18', 'SPT (Sistem Pendidikan Tinggi)', '31', 'Prestasi', '25', 'Sebagai PESERTA dalam acara SPT (Sistem Pendidikan Tinggi)', '2014-08-21', '2014-08-22', '2014-08-22', 'Universitas Yarsi', 'Sert./SK/ST', '18081010424820180807_204317.jpg', '2018-08-10' ),
( '203', '1402014052', '2', '21', 'Internet of things, game, real sense technology', '15', 'Peserta', '10', 'seminar dan open house FTI festival 2015', '2015-06-13', '2015-06-13', '2015-06-13', 'FTI Universitas Yarsi', '10 - 40 jam', '180813011103FB19AEFE-75BC-40FD-BA72-CE23F1100F7A.jpeg', '2018-08-13' ),
( '204', '1402014052', '2', '34', 'Asisten Dosen Fakultas Teknologi Informasi Universitas Yarsi', '31', '-', '15', 'Asisten dosen', '2016-09-05', '2016-11-28', '2018-02-17', 'FTI Universitas Yarsi', '10 - 40 jam', '180813011525CD50D5E9-8790-40E1-93F6-6F097E5E233B.jpeg', '2018-08-13' ),
( '205', '1402014052', '2', '21', 'pelatihan penulisan proposal PKM', '14', 'Peserta', '15', 'pelatihan penulisan', '2015-09-28', '2015-09-28', '2015-09-28', 'Universitas Yarsi', '10 - 40 jam', '18081301191596AE9B9C-D6C6-4012-B91E-41E34D4D4284.jpeg', '2018-08-13' );
-- ---------------------------------------------------------


-- Dump data of "skke_angkatan" ----------------------------
INSERT INTO `skke_angkatan`(`id_skkeangkatan`,`angkatan`,`skke_minimum`) VALUES 
( '1', '2012', '80' ),
( '2', '2013', '80' ),
( '3', '2014', '80' ),
( '4', '2015', '100' ),
( '6', '2016', '110' ),
( '7', '2017', '120' ),
( '8', '2018', '130' );
-- ---------------------------------------------------------


-- Dump data of "skpi" -------------------------------------
INSERT INTO `skpi`(`id_skpi`,`npm_mhs`,`no_skpi`,`tgl_terbuat`,`thn_lulus`,`no_ijazah`,`gelar`,`lama_studireg`) VALUES 
( '2', '1402014053', 'SKPI/FTI/2018/BNN00001', '2018-08-04', '2018', '500/FTI/REK/X/2018', 'Sarjana Komputer (S.Kom)', '8' ),
( '3', '1402014041', 'SKPI/FTI/2018/BNN00002', '2018-08-05', '0000', '', '', '0' ),
( '4', '1402014001', 'SKPI/FTI/2018/BNN00003', '2018-08-05', '0000', '', '', '0' ),
( '5', '1402014034', 'SKPI/FTI/2018/BNN00004', '2018-08-06', '0000', '', '', '0' ),
( '6', '1402014023', 'SKPI/FTI/2018/BNN00005', '2018-08-06', '0000', '', '', '0' ),
( '7', '1402014021', 'SKPI/FTI/2018/BNN00006', '2018-08-06', '0000', '', '', '0' ),
( '9', '1402014032', 'SKPI/FTI/2018/BNN00007', '2018-08-06', '0000', '', '', '0' ),
( '10', '1402014118', 'SKPI/FTI/2018/BNN00008', '2018-08-06', '0000', '', '', '0' ),
( '11', '1402014061', 'SKPI/FTI/2018/BNN00009', '2018-08-06', '2018', '499/FTI/REK/X/2018', 'Sarjana Komputer (S.Kom)', '8' ),
( '12', '1402014049', 'SKPI/FTI/2018/BNN10', '2018-08-06', '0000', '', '', '0' ),
( '13', '1402014029', 'SKPI/FTI/2018/BNN11', '2018-08-06', '0000', '', '', '0' ),
( '14', '1402014057', 'SKPI/FTI/2018/BNN12', '2018-08-07', '0000', '', '', '0' ),
( '15', '1402014012', 'SKPI/FTI/2018/BNN13', '2018-08-07', '0000', '', '', '0' ),
( '16', '1402014005', 'SKPI/FTI/2018/BNN14', '2018-08-07', '0000', '', '', '0' ),
( '17', '1402014094', 'SKPI/FTI/2018/BNN15', '2018-08-07', '0000', '', '', '0' ),
( '18', '1402014133', 'SKPI/FTI/2018/BNN16', '2018-08-07', '0000', '', '', '0' ),
( '19', '1402014102', 'SKPI/FTI/2018/BNN17', '2018-08-07', '0000', '', '', '0' ),
( '20', '1402014095', 'SKPI/FTI/2018/BNN18', '2018-08-07', '0000', '', '', '0' ),
( '21', '1402014127', 'SKPI/FTI/2018/BNN19', '2018-08-07', '0000', '', '', '0' ),
( '22', '1402014130', 'SKPI/FTI/2018/BNN20', '2018-08-07', '0000', '', '', '0' ),
( '23', '1402014030', 'SKPI/FTI/2018/BNN21', '2018-08-07', '0000', '', '', '0' ),
( '24', '1402014074', 'SKPI/FTI/2018/BNN22', '2018-08-07', '0000', '', '', '0' ),
( '25', '1402012026', 'SKPI/FTI/2018/BNN23', '2018-08-07', '0000', '500/FTI/REK/X/2018', 'Sarjana Komputer (S.Kom)', '8' ),
( '26', '1402014087', 'SKPI/FTI/2018/BNN24', '2018-08-07', '0000', '', '', '0' ),
( '27', '1402014100', 'SKPI/FTI/2018/BNN25', '2018-08-09', '0000', '', '', '0' ),
( '28', '1402014108', 'SKPI/FTI/2018/BNN26', '2018-08-10', '0000', '', '', '0' );
-- ---------------------------------------------------------


-- Dump data of "skripsi" ----------------------------------
INSERT INTO `skripsi`(`id_skripsi`,`judul_skripsi`,`deskripsi_skripsi`,`tgl_surattugas`,`tgl_lulussidang`,`npm_mhs`,`surat_tugas`,`surat_selesai`) VALUES 
( '13', 'Pembangunan Sistem Pendataan, Pengolahan dan Visualisasi Informasi Pasar Komoditas Peternakan Berbasis Mobile serta Tinjuannya Menurut Agama Islam ( Studi Kasus: Kabupaten Garut) ', 'membuat sistem aplikasi mobile mengenai pendataan, pengolahan dan visualisasi informasi pasar komoditas peternakan ', '2018-03-16', '2018-08-13', '1402014041', 'Surat_Tugas_180806120409WhatsApp Image 2018-08-06 at 00.01.19.jpeg', 'Surat_Selesai_180806120409WhatsApp Image 2018-08-06 at 00.01.19.jpeg' ),
( '15', 'Rancang Bangun Sistem Magang FTI Universitas YARSI Berbasi Web Menurut Tinjauan Agama Islalm', 'Sistem magang dibuat untuk mengajukan magang dan mengontrol kegiatan magang mahasiswa.', '2018-03-01', '2018-08-15', '1402014034', 'Surat_Tugas_180806115637', 'Surat_Selesai_180806115637' ),
( '16', 'Pembangunan Sistem Pengelolaan ATK di FTI Universitas YARSI berbasis Web serta Tinjauannya menurut Agama Islam', 'Sistem untuk mengelola kebutuhan ATK', '2018-03-03', '2018-08-23', '1402014032', 'Surat_Tugas_180806115705', 'Surat_Selesai_180806115705' ),
( '17', 'Sistem penentuan mustahik ZIS FTI Universitas YARSI Berbasis Web serta Tinjauannya Menurut Agama Islam', 'Sistem ini untuk menentukan mustahik yang tepat dan akurat serta membantu dalam pengolaan keuangan.', '2018-03-01', '2018-08-15', '1402014023', 'Surat_Tugas_180806120250', 'Surat_Selesai_180806120250' ),
( '18', 'Sistem Penjadwalan Kegiatan UKM (Upaya Kesehatan Masyarakat) Pada Puskesmas Kecamatan Tanjung Priok Berbasis Web Serta Tinjauannya Menurut Agama Islam', 'sistem penjadwalan untuk kegiatan pada upaya kesehatan yang terdapat di puskesmas', '2018-03-16', '2018-08-23', '1402014021', 'Surat_Tugas_180806120903WhatsApp Image 2018-08-06 at 12.08.26.jpeg', 'Surat_Selesai_180806120903' ),
( '19', 'Penentuan Rute Terbaik dengan Metode Q-Learning dan Softmax Equation Serta Tinjauannya Menurut Agama Islam', 'Menentukan rute terbaik dari titik A ke titik B dengan beberapa alternatif jalur dengan menggunakan metode Q-Learning kemudian dibandingkan dengan metode Softmax Equation untuk menentukan metode yang lebih efisien', '2018-03-01', '2018-08-23', '1402014061', 'Surat_Tugas_180806024757', 'Surat_Selesai_180806024757' ),
( '20', 'Metode Klasifikasi Kanker Serviks Berdasarkan Citra Pap-Smear Menggunakan Deep Belief Network(DBN) dan Tinjauannya Menurut Agama Islam', 'Mengklasifikasikan citra kanker serviks menjadi 2 kelas yaitu kanker normal dan tidak normal ', '2018-03-01', '2018-08-23', '1402014049', 'Surat_Tugas_180806033111', 'Surat_Selesai_180806033111' ),
( '21', 'Sistem Informasi Surat Keterangan Pendamping Ijazah (SKPI) serta Tinjauannya menurut Agama Islam (Studi Kasus di Fakultas Teknologi Informasi)', 'Sistem Informasi Surat Keterangan Pendamping Ijazah (SKPI) merupakan sistem untuk meminimalisir permasalahan di atas, sistem ini berguna untuk mengolah data kompetensi mahasiswa menjadi SKPI, serta memberikan kemudahan kepada pihak akademik dan mahasiswa dalam mengumpulkan data kompetensi calon lulusan.', '2018-03-01', '2018-08-23', '1402014053', 'Surat_Tugas_180818072706surattugas.jpg', 'Surat_Selesai_180818072706suratlulus.jpg' ),
( '22', 'SISTEM DETEKSI WABAH DIFTERI BERBASIS PETA INTERAKTIF DI DAERAH KHUSUS IBUKOTA JAKARTA SERTA TINJAUANNYA MENURUT AGAMA ISLAM', 'Sistem deteksi berbasis peta interaktif menunjukan lokasi penderita yang terkena penyakit difteri', '0000-00-00', '0000-00-00', '1402014058', 'tdkadafile.png', 'tdkadafile.png' ),
( '23', 'Aplikasi Virtual Reality untuk Pembelajaran Sistem Peredaran Darah Berbasis Experience', 'Aplikasi ini bertujuan untuk pembelajaran sistem peredaran darah dimana menggunaka teknologi virtual reality ', '2018-03-01', '2018-08-23', '1402014098', 'tdkadafile.png', 'tdkadafile.png' ),
( '24', 'Metode Klasifikasi Kanker Serviks Berdasarkan Citra CT-Scan Menggunakan Multi Feature Fusion Convolutional Neural Network dan Tinjauannya Menurut Agama Islam', 'Klasifikasi kanker serviks (normal dan abnormal) berdasarkan Multi Feature Fusion menggunakan Convolutional Neural Network', '2018-03-01', '2018-08-17', '1402014095', 'tdkadafile.png', 'tdkadafile.png' ),
( '25', 'Pembuatan Sistem Informasi Penjadwalan Mahasiswa Kepaniteraan Fakultas Kedokteran Universitas YARSI dan Tinjauannya Menurut Agama Islam', 'Sistem ini bertujuan untuk membuat jadwal kepaniteraan mahasiswa fakultas kedokteran', '2018-03-01', '2018-08-22', '1402014052', 'tdkadafile.png', 'tdkadafile.png' ),
( '26', 'SISTEM ABSENSI MENGGUNAKAN RFID (RADIO FREQUENCY IDENTIFICATION) DAN RASPBERRY PI CAMERA BERBASIS WEB SERTA TINJAUAN MENURUT AGAMA ISLAM', 'Sistem Absensi menggunakan RFID untuk membaca KTM(Kartu Tanda Mahasiswa) dan Pi Camera untuk memfoto wajah mahasiswa yang hadir dan membuat dashboard kehadiran mahasiswa', '2018-03-16', '2018-08-20', '1402014094', 'Surat_Tugas_180807035801surat tugas skripsi.jpg', 'nofile.png' ),
( '27', 'Sisrekomenasi Pemeriksaan Lab Pasien Tersuspek DBD Dengan Metode Back Propagation Untuk Diagnosa Pasien DBD Serta Tijaunnya Menurut Agama Islam', 'Sistem yang di buat ini akan memberika keputusan terhadap pasien tersuspek DBD dengan cara menginput nilai - nilai yang diperoleh dari laboratorium', '0000-00-00', '0000-00-00', '1402014017', 'skripsi/nofile.png', 'skripsi/nofile.png' ),
( '28', 'aplikasi pembelajaran karakter berbasis mobile  untuk anak usia dini serta tinjauannya menurut agama ilam', 'Game berbasis pembelajaran digunakan oleh peserta untuk menarik dan memotivasi anak usia dini dalam belajar karakter. Aplikasi mobile merupakan salah satu media untuk menyampaikan informasi dan pengetahuan. Perkembangan game pembelajaran berbasis mobile untuk anak usia dini saat ini mengalami peningkatan yang sangat pesat. Oleh karena itu, kualitas aplikasi telah dipertanyakan. Dengan menggunakan metode 9 pilar pendidikan karakter yang sesuai dan menarik dalam mengembangkan aplikasi pembelajaran karakter berbasis mobile diharapkan dapat meningkatkan kemampuan anak-anak usia dini dalam belajar karakter. Oleh karena itu penulis melakukan pengembangan aplikasi berbasis mobile dengan menggunakan metode 9 pilar pendidikan karakter dengan nama â€œpembelajaran karakterâ€. ', '0000-00-00', '0000-00-00', '1402014144', 'skripsi/nofile.png', 'skripsi/nofile.png' ),
( '29', 'SISTEM INFORMASI PENYAKIT TUBERKULOSIS (TBC) BERBASIS PETA INTERAKTIF DI DAERAH KHUSUS IBUKOTA JAKARTA SERTA TINJAUANNYA MENURUT AGAMA ISLAM', 'Sistem untuk memantau penyakit Tuberkulosis di Daerah Khusus Ibukota (DKI) Jakarta berbasis peta interaktif. Pada sistem ini divisualisasikan titik â€“ titik koordinat terjangkitnya Penderita TB dalam bentuk peta yang didukung menggunakan Google map di wilayah Jakarta Timur, Kemudian dari visualisasi tersebut akan terlihat dimana pasien TB yang akan menjadi prioritas bagi masyarakat khususnya Dinas Kesehatan agar dapat menanggulangi permasalahan penderita TB saat ini.', '2018-02-03', '2018-08-26', '1402014087', 'skripsi/nofile.png', 'skripsi/nofile.png' ),
( '30', 'Sistem Pengukuran Kualitas Pelayanan Sarana Akademik Menggunakan Fuzzy Service Quality Serta Tinjauannya Menurut Agama Islam (Studi Kasus: Fakultas Teknologi Informasi Universitas YARSI)', 'Hasil dari penelitian ini adalah sebuah sistem yang digunakan untuk mengukur kualitas pelayanan sarana akademik.', '0000-00-00', '0000-00-00', '1402014102', 'skripsi/nofile.png', 'skripsi/nofile.png' );
-- ---------------------------------------------------------


-- Dump data of "tingkat_kegiatan" -------------------------
INSERT INTO `tingkat_kegiatan`(`id_tingkat_kegiatan`,`nm_tingkat_kegiatan`) VALUES 
( '11', 'Internasional' ),
( '12', 'Nasional' ),
( '13', 'Wilayah' ),
( '14', 'Universitas' ),
( '15', 'Fakultas' ),
( '16', 'Prodi' ),
( '17', 'Nasional - Akreditasi' ),
( '18', 'Tidak Terakreditasi' ),
( '19', 'Jurusan/ Prodi' ),
( '20', 'Dalam Propinsi' ),
( '21', 'Luar Propinsi' ),
( '22', 'BEM/DPMU' ),
( '23', 'UKMU' ),
( '24', 'BEMF/ DPMF' ),
( '25', 'HMJ/ HMPS' ),
( '26', 'UKF/ UKK' ),
( '27', 'Dasar' ),
( '28', 'Menengah' ),
( '29', 'Lanjut' ),
( '30', 'Daerah' ),
( '31', '-' ),
( '32', '< 400' ),
( '33', '400 - 450' ),
( '34', '450 - 500' ),
( '35', '> 500' ),
( '36', 'asdasdas' );
-- ---------------------------------------------------------


-- Dump data of "user" -------------------------------------
INSERT INTO `user`(`id_user`,`level`,`username`,`password`,`nama_user`,`hp_user`,`email_user`,`aktif`,`nik`,`jabatan`,`unit`) VALUES 
( '1', 'superadmin', 'superadmin', 'superadmin', 'Super Admin', '083870158207', 'superadmin@gmail.com', 'Y', '-', 'IT', 'Fakultas Teknologi Informasi' ),
( '2', 'kps_ti', 'kpsti', 'kpsti', 'Herika Hayurani, S.Kom., M.Kom.', '08119252759', 'kps_ti@gmail.com', 'Y', '531141106018', 'KPS TI', 'Teknik Informatika' ),
( '3', 'kps_ip', 'kpsip', 'kpsip', 'Nita Ismayati, S.IP., M.Hum', '087800090059', 'kpsip@gmail.com', 'Y', '531142109016', 'KPS IP', 'Program Studi Ilmu Perpustakaan' ),
( '4', 'dekan', 'dekanfti', 'dekanfti', 'Dr. Ummi Azizah Rachmawati, S.Kom., M.Kom.', '087771278367', 'dekanfti@gmail.com', 'Y', '531141106017', 'Dekan FTI', 'Fakultas Teknologi Informasi' ),
( '5', 'tu', 'sbaak', 'sbaak', 'Slamet Robani', '087771278367', 'sbaak@gmail.com', 'Y', '531142194008', 'Karyawan', 'Fakultas Teknologi Informasi' ),
( '6', 'admin', 'admin', 'admin', 'Admin', '087771728367', 'admin@gmail.com', 'Y', '-', 'Admin FTI', 'Fakultas Teknologi Informasi' );
-- ---------------------------------------------------------


-- Dump data of "users" ------------------------------------
INSERT INTO `users`(`id`,`ip_address`,`username`,`password`,`salt`,`email`,`activation_code`,`forgotten_password_code`,`forgotten_password_time`,`remember_code`,`created_on`,`last_login`,`active`,`first_name`,`last_name`,`company`,`phone`,`about`) VALUES 
( '1', '127.0.0.1', 'member', '$2y$08$kkqUE2hrqAJtg.pPnAhvL.1iE7LIujK5LZ61arONLpaBBWh/ek61G', NULL, 'member@member.com', NULL, NULL, NULL, NULL, '1451903855', '1451905011', '1', 'Member', 'One', NULL, NULL, NULL );
-- ---------------------------------------------------------


-- Dump data of "users_groups" -----------------------------
INSERT INTO `users_groups`(`id`,`user_id`,`group_id`) VALUES 
( '1', '1', '1' );
-- ---------------------------------------------------------


-- CREATE INDEX "parent" ---------------------------------------
CREATE INDEX `parent` USING BTREE ON `activity_category`( `parent_category` );
-- -------------------------------------------------------------


-- CREATE INDEX "id_jenis_kegiatan" ----------------------------
CREATE INDEX `id_jenis_kegiatan` USING BTREE ON `kegiatan`( `id_jenis_kegiatan` );
-- -------------------------------------------------------------


-- CREATE INDEX "FK_mahasiswa_prodi" ---------------------------
CREATE INDEX `FK_mahasiswa_prodi` USING BTREE ON `mahasiswa`( `id_prodi` );
-- -------------------------------------------------------------


-- CREATE INDEX "index_fakultas_id" ----------------------------
CREATE INDEX `index_fakultas_id` USING BTREE ON `prodi`( `fakultas_id` );
-- -------------------------------------------------------------


-- CREATE LINK "FK_kegiatan_jenis_kegiatan" --------------------
ALTER TABLE `kegiatan`
	ADD CONSTRAINT `FK_kegiatan_jenis_kegiatan` FOREIGN KEY ( `id_jenis_kegiatan` )
	REFERENCES `jenis_kegiatan`( `id_jenis_kegiatan` )
	ON DELETE Cascade
	ON UPDATE Cascade;
-- -------------------------------------------------------------


-- CREATE LINK "FK_mahasiswa_prodi" ----------------------------
ALTER TABLE `mahasiswa`
	ADD CONSTRAINT `FK_mahasiswa_prodi` FOREIGN KEY ( `id_prodi` )
	REFERENCES `prodi`( `id_prodi` )
	ON DELETE Restrict
	ON UPDATE Restrict;
-- -------------------------------------------------------------


/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
-- ---------------------------------------------------------


