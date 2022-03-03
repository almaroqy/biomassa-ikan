DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `user_id` INT(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  PRIMARY KEY (`user_id`)
);

INSERT INTO `user` (`username`, `password`) VALUES
('admin', '21232f297a57a5a743894a0e4a801fc3');

DROP TABLE IF EXISTS `pakan`;
CREATE TABLE IF NOT EXISTS `pakan` (
  `pakan_id` INT(11) NOT NULL AUTO_INCREMENT,
  `jenis_pakan` varchar(100) NOT NULL,
  `deskripsi` varchar(200),
  `user_id` INT(11) NOT NULL,
  PRIMARY KEY (`pakan_id`),
  CONSTRAINT `FK_PakanOwner` FOREIGN KEY (`user_id`)
  REFERENCES `user`(`user_id`) ON DELETE CASCADE ON UPDATE CASCADE
);


DROP TABLE IF EXISTS `keramba`;
CREATE TABLE IF NOT EXISTS `keramba` (
  `keramba_id` INT(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(75) NOT NULL,
  `ukuran` FLOAT(5,2) NOT NULL,
  `tanggal_install` date NOT NULL,
  `user_id` INT(11) NOT NULL,
  PRIMARY KEY (`keramba_id`),
  CONSTRAINT `FK_KerambaOwner` FOREIGN KEY (`user_id`)
  REFERENCES `user`(`user_id`) ON DELETE CASCADE ON UPDATE CASCADE
);


DROP TABLE IF EXISTS `biota`;
CREATE TABLE IF NOT EXISTS `biota` (
  `biota_id` INT(11) NOT NULL AUTO_INCREMENT,
  `jenis_biota` varchar(75) NOT NULL,
  `bobot` FLOAT(5,2) NOT NULL,
  `panjang` FLOAT(5,2) NOT NULL,
  `jumlah_bibit` INT(11) NOT NULL,
  `tanggal_tebar` date NOT NULL,
  `tanggal_panen` date,
  `keramba_id` INT(11) NOT NULL,
  PRIMARY KEY (`biota_id`),
  CONSTRAINT `FK_KerambaAsal` FOREIGN KEY (`keramba_id`)
  REFERENCES `keramba`(`keramba_id`) ON DELETE CASCADE ON UPDATE CASCADE
);

DROP TABLE IF EXISTS `pengukuran`;
CREATE TABLE IF NOT EXISTS `pengukuran` (
  `pengukuran_id` INT(11) NOT NULL AUTO_INCREMENT,
  `panjang` FLOAT(5,2) NOT NULL,
  `bobot` FLOAT(5,2) NOT NULL,
  `tanggal_ukur` date NOT NULL,
  `biota_id` INT(11) NOT NULL,
  `user_id` INT(11) NOT NULL,
  PRIMARY KEY (`pengukuran_id`),
  CONSTRAINT `FK_BiotaUkur` FOREIGN KEY (`biota_id`)
  REFERENCES `biota`(`biota_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_Pengukur` FOREIGN KEY (`user_id`)
  REFERENCES `user`(`user_id`) ON DELETE CASCADE ON UPDATE CASCADE
);

DROP TABLE IF EXISTS `feeding`;
CREATE TABLE IF NOT EXISTS `feeding` (
  `activity_id` INT(11) NOT NULL AUTO_INCREMENT,
  `tanggal_feeding` date NOT NULL,
  `keramba_id` INT(11) NOT NULL,
  `user_id` INT(11) NOT NULL,
  PRIMARY KEY (`activity_id`),
  CONSTRAINT `FK_FeededKeramba` FOREIGN KEY (`keramba_id`)
  REFERENCES `keramba`(`keramba_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_Feeder` FOREIGN KEY (`user_id`)
  REFERENCES `user`(`user_id`) ON DELETE CASCADE ON UPDATE CASCADE
);


DROP TABLE IF EXISTS `panen`;
CREATE TABLE IF NOT EXISTS `panen` (
  `activity_id` INT(11) NOT NULL AUTO_INCREMENT,
  `tanggal_panen` date NOT NULL,
  `panjang` FLOAT(5,2) NOT NULL,
  `bobot` FLOAT(5,2) NOT NULL,
  `jumlah_hidup` INT(11) NOT NULL,
  `jumlah_mati` INT(11) NOT NULL,
  `biota_id` INT(11) NOT NULL,
  `keramba_id` INT(11) NOT NULL,
  `user_id` INT(11) NOT NULL,
  PRIMARY KEY (`activity_id`),
  CONSTRAINT `FK_BiotaTerpanen` FOREIGN KEY (`biota_id`)
  REFERENCES `biota`(`biota_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_KerambaPanen` FOREIGN KEY (`keramba_id`)
  REFERENCES `keramba`(`keramba_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_Pemanen` FOREIGN KEY (`user_id`)
  REFERENCES `user`(`user_id`) ON DELETE CASCADE ON UPDATE CASCADE
);

DROP TABLE IF EXISTS `detail_feeding`;
CREATE TABLE IF NOT EXISTS `detail_feeding` (
  `activity_id` INT(11) NOT NULL AUTO_INCREMENT,
  `ukuran_tebar` FLOAT(5,2) NOT NULL,
  `jam_feeding` time NOT NULL,
  `pakan_id` INT(11) NOT NULL,
  PRIMARY KEY (`activity_id`),
  CONSTRAINT `FK_TabelFeeding` FOREIGN KEY (`activity_id`)
  REFERENCES `feeding`(`activity_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_JenisPakan` FOREIGN KEY (`pakan_id`)
  REFERENCES `pakan`(`pakan_id`) ON DELETE CASCADE ON UPDATE CASCADE
);