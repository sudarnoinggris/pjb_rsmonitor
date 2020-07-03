-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               10.4.11-MariaDB - mariadb.org binary distribution
-- Server OS:                    Win64
-- HeidiSQL Version:             10.3.0.5771
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Dumping database structure for rs_monitor
CREATE DATABASE IF NOT EXISTS `rs_monitor` /*!40100 DEFAULT CHARACTER SET utf8mb4 */;
USE `rs_monitor`;

-- Dumping structure for table rs_monitor.master_distrik
CREATE TABLE IF NOT EXISTS `master_distrik` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `kode` varchar(4) NOT NULL,
  `nama` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `kode` (`kode`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table rs_monitor.master_distrik: ~1 rows (approximately)
/*!40000 ALTER TABLE `master_distrik` DISABLE KEYS */;
INSERT INTO `master_distrik` (`id`, `kode`, `nama`) VALUES
	(1, 'PJB2', 'Kantor Pusat');
/*!40000 ALTER TABLE `master_distrik` ENABLE KEYS */;

-- Dumping structure for table rs_monitor.master_pegawai
CREATE TABLE IF NOT EXISTS `master_pegawai` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nid` varchar(20) NOT NULL,
  `nama` varchar(50) DEFAULT NULL,
  `kode_distrik` varchar(4) DEFAULT NULL,
  `email` varchar(50) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `nid` (`nid`),
  KEY `FK_master_pegawai_master_distrik` (`kode_distrik`),
  CONSTRAINT `FK_master_pegawai_master_distrik` FOREIGN KEY (`kode_distrik`) REFERENCES `master_distrik` (`kode`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table rs_monitor.master_pegawai: ~0 rows (approximately)
/*!40000 ALTER TABLE `master_pegawai` DISABLE KEYS */;
INSERT INTO `master_pegawai` (`id`, `nid`, `nama`, `kode_distrik`, `email`) VALUES
	(1, '6285025JA', 'BUDI SARWONO', 'PJB2', 'budi.sarwono@ptpjb.com');
/*!40000 ALTER TABLE `master_pegawai` ENABLE KEYS */;

-- Dumping structure for table rs_monitor.master_rs
CREATE TABLE IF NOT EXISTS `master_rs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(50) DEFAULT NULL,
  `alamat` varchar(150) DEFAULT NULL,
  `telp` varchar(30) DEFAULT NULL,
  `email` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table rs_monitor.master_rs: ~0 rows (approximately)
/*!40000 ALTER TABLE `master_rs` DISABLE KEYS */;
INSERT INTO `master_rs` (`id`, `nama`, `alamat`, `telp`, `email`) VALUES
	(1, 'Mitra Keluarga Waru', 'Jl Raya Waru', '031-8549854', 'mitra@mitrakeluarga.com');
/*!40000 ALTER TABLE `master_rs` ENABLE KEYS */;

-- Dumping structure for table rs_monitor.users
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) DEFAULT NULL,
  `name` varchar(100) DEFAULT NULL,
  `password` varchar(32) DEFAULT NULL,
  `level` varchar(4) DEFAULT NULL,
  `is_active` int(11) DEFAULT NULL,
  `image` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table rs_monitor.users: ~3 rows (approximately)
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` (`id`, `username`, `name`, `password`, `level`, `is_active`, `image`) VALUES
	(1, 'adminpusat', 'Admin Pusat', '21232f297a57a5a743894a0e4a801fc3', 'PJB', 1, NULL),
	(2, 'adminrs', 'Admin Rumah Sakit', '21232f297a57a5a743894a0e4a801fc3', 'RS', 1, NULL),
	(3, 'admin', 'Administrator', '21232f297a57a5a743894a0e4a801fc3', 'PJB', 1, NULL);
/*!40000 ALTER TABLE `users` ENABLE KEYS */;

-- Dumping structure for table rs_monitor.validasi_keluarga
CREATE TABLE IF NOT EXISTS `validasi_keluarga` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nid_pegawai` varchar(50) DEFAULT NULL,
  `nama` varchar(50) DEFAULT NULL,
  `status` varchar(50) DEFAULT NULL,
  `kode_distrik` varchar(4) DEFAULT NULL,
  `id_rs` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_master_keluarga_master_pegawai` (`nid_pegawai`),
  KEY `FK_master_keluarga_master_distrik` (`kode_distrik`),
  KEY `FK_validasi_keluarga_master_rs` (`id_rs`),
  CONSTRAINT `FK_master_keluarga_master_distrik` FOREIGN KEY (`kode_distrik`) REFERENCES `master_distrik` (`kode`),
  CONSTRAINT `FK_validasi_keluarga_master_rs` FOREIGN KEY (`id_rs`) REFERENCES `master_rs` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table rs_monitor.validasi_keluarga: ~0 rows (approximately)
/*!40000 ALTER TABLE `validasi_keluarga` DISABLE KEYS */;
INSERT INTO `validasi_keluarga` (`id`, `nid_pegawai`, `nama`, `status`, `kode_distrik`, `id_rs`) VALUES
	(2, '6285025JA', 'Ananda', 'Anak', 'PJB2', 1);
/*!40000 ALTER TABLE `validasi_keluarga` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
