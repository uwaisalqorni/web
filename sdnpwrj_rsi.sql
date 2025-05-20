# Host: localhost  (Version 5.5.5-10.1.37-MariaDB)
# Date: 2021-05-11 01:04:05
# Generator: MySQL-Front 5.3  (Build 5.26)

/*!40101 SET NAMES latin1 */;

#
# Structure for table "artikel"
#

DROP TABLE IF EXISTS `artikel`;
CREATE TABLE `artikel` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(128) DEFAULT NULL,
  `deskripsi` text,
  `image` varchar(128) DEFAULT NULL,
  `urut` int(11) DEFAULT NULL,
  `user` int(11) DEFAULT NULL,
  `date_created` datetime DEFAULT NULL,
  `date_update` datetime DEFAULT NULL,
  `is_delete` tinyint(1) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

#
# Data for table "artikel"
#

INSERT INTO `artikel` VALUES (1,'INDIKATOR MUTU LAYANAN PRIORITAS','tes','0a9a6baea7b7cf98c8ec431f81c9cbc8.jpg',2,1,'2021-04-25 21:21:39','2021-04-25 21:39:18',0),(2,'Fasilitas Umum','tes2','80d9df83faeabb230eea38836fe26a2f.jpg',1,1,'2021-04-25 21:37:43',NULL,0);

#
# Structure for table "direksi"
#

DROP TABLE IF EXISTS `direksi`;
CREATE TABLE `direksi` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(128) DEFAULT NULL,
  `jabatan` varchar(128) DEFAULT NULL,
  `telp` varchar(128) DEFAULT NULL,
  `image` varchar(128) DEFAULT NULL,
  `user` int(11) DEFAULT NULL,
  `date_created` datetime DEFAULT NULL,
  `date_update` datetime DEFAULT NULL,
  `is_delete` tinyint(1) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

#
# Data for table "direksi"
#

INSERT INTO `direksi` VALUES (1,'DR.NAVIS YULIANSYAH, M.MRS','Direktur','-','40d94433bca70a6b3419ac40db9a666a.jpg',1,'2021-02-23 00:19:38','2021-02-23 00:19:38',0),(2,'DR.HUSNUL MUTTAQIN, MM','Wakil Direktur Umum','-','6e49599d2d037cb226080d7d982ab6e7.jpg',1,'2021-02-23 00:19:38','2021-02-23 00:19:28',0),(3,'DR.HENY LATIFAH','Wakil Direktur Pelayanan','-','ded4393e64d704cd2a5c29c56401779f.jpg',1,'2021-02-23 00:19:38','2021-02-23 00:20:19',0);

#
# Structure for table "dokter"
#

DROP TABLE IF EXISTS `dokter`;
CREATE TABLE `dokter` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(128) DEFAULT NULL,
  `telp` varchar(128) DEFAULT NULL,
  `image` varchar(128) DEFAULT NULL,
  `user` int(11) DEFAULT NULL,
  `date_created` datetime DEFAULT NULL,
  `date_update` datetime DEFAULT NULL,
  `is_delete` tinyint(1) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

#
# Data for table "dokter"
#

INSERT INTO `dokter` VALUES (1,'dr. J.Sudarwantono, Sp.OG','-','dokter1.jpg',1,'2021-03-13 22:27:25','2021-03-13 22:27:25',0),(2,'dr. Radyo Wiranto, Sp.M','-','dokter2.jpg',1,'2021-03-13 22:27:25','2021-03-13 22:27:25',0),(3,'dr. Niniek Burhan, Sp.PD-KPTI','-','dokter3.jpg',1,'2021-03-13 22:27:25','2021-03-13 22:27:25',0),(4,'dr. Yayuk Widaningrum, Sp.OG','-','dokter4.jpg',1,'2021-03-13 22:27:25','2021-03-13 22:27:25',0),(5,'5',NULL,'slider5.jpg',1,'2021-03-13 22:27:25','2021-03-13 22:27:25',0),(6,'DR.NAVIS YULIANSYAH, M.MRS1','09','a6b6b8569de137b710b883e54d83b36e.jpg',1,'2021-03-13 22:27:25','2021-03-13 22:27:25',0);

#
# Structure for table "download"
#

DROP TABLE IF EXISTS `download`;
CREATE TABLE `download` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(128) DEFAULT NULL,
  `deskripsi` varchar(128) DEFAULT NULL,
  `url` varchar(255) DEFAULT NULL,
  `urut` int(11) DEFAULT NULL,
  `user` int(11) DEFAULT NULL,
  `date_created` datetime DEFAULT NULL,
  `date_update` datetime DEFAULT NULL,
  `is_delete` tinyint(1) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

#
# Data for table "download"
#

INSERT INTO `download` VALUES (1,'1','-','http://',1,1,'2021-03-23 22:56:12','2021-03-23 22:56:55',0),(2,'2','-','http://',2,1,'2021-03-23 23:02:53','2021-03-23 23:04:03',0);

#
# Structure for table "foto"
#

DROP TABLE IF EXISTS `foto`;
CREATE TABLE `foto` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `kategori_id` int(11) DEFAULT NULL,
  `nama` varchar(128) DEFAULT NULL,
  `deskripsi` varchar(128) DEFAULT NULL,
  `image` varchar(128) DEFAULT NULL,
  `urut` int(11) DEFAULT NULL,
  `user` int(11) DEFAULT NULL,
  `date_created` datetime DEFAULT NULL,
  `date_update` datetime DEFAULT NULL,
  `is_delete` tinyint(1) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

#
# Data for table "foto"
#

INSERT INTO `foto` VALUES (1,1,'1','1','b9c952cb0fc75b23273f9e696c1d75a9.jpg',2,1,'2021-03-23 22:33:06','2021-03-23 22:39:21',0),(2,2,'2','-','e6fac5b6127e7434e20328ee00294f04.jpg',2,1,'2021-03-23 22:35:27',NULL,0),(3,1,'3','3','d35380fc7744ac3aa3566045f80259a5.jpg',1,1,'2021-03-23 22:37:30',NULL,0);

#
# Structure for table "foto_kategori"
#

DROP TABLE IF EXISTS `foto_kategori`;
CREATE TABLE `foto_kategori` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(128) DEFAULT NULL,
  `urut` int(11) DEFAULT NULL,
  `user` int(11) DEFAULT NULL,
  `date_created` datetime DEFAULT NULL,
  `date_update` datetime DEFAULT NULL,
  `is_delete` tinyint(1) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

#
# Data for table "foto_kategori"
#

INSERT INTO `foto_kategori` VALUES (1,'Kegiatan',1,1,'2021-03-23 22:04:52','2021-03-23 22:04:52',0),(2,'Fasilitas',2,1,'2021-03-23 22:05:04','2021-03-23 22:05:15',0);

#
# Structure for table "imageslider"
#

DROP TABLE IF EXISTS `imageslider`;
CREATE TABLE `imageslider` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(128) DEFAULT NULL,
  `image` varchar(128) DEFAULT NULL,
  `urut` int(11) DEFAULT NULL,
  `user` int(11) DEFAULT NULL,
  `date_created` datetime DEFAULT NULL,
  `date_update` datetime DEFAULT NULL,
  `is_delete` tinyint(1) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

#
# Data for table "imageslider"
#

INSERT INTO `imageslider` VALUES (1,'1','d455cc1421b6d1b2acf20818b80383e4.jpg',1,1,'2021-02-21 22:06:34','2021-02-26 23:32:31',0),(2,'2','3872784aeb214d545e4bc1c707f462be.jpg',2,1,'2021-02-21 22:06:34','2021-02-21 22:06:56',0),(3,'3','2da377bc50489238feca8eab0f7efb69.jpg',3,1,'2021-02-21 22:06:34','2021-02-21 22:07:10',0),(4,'4','adb486825bc124720c8245a298df1783.jpg',4,1,'2021-02-21 22:06:34','2021-02-21 22:07:19',0),(5,'5','250cd54c946fb35680957756967d7bb6.jpg',5,1,'2021-02-21 22:06:34','2021-02-21 22:07:28',0),(6,'6','4526fe8d449c7bb3e7eb27fbee91840f.jpg',6,1,'2021-02-21 22:34:37','2021-02-23 00:17:57',0);

#
# Structure for table "indikatormutu"
#

DROP TABLE IF EXISTS `indikatormutu`;
CREATE TABLE `indikatormutu` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(128) DEFAULT NULL,
  `deskripsi` varchar(128) DEFAULT NULL,
  `periode` varchar(128) DEFAULT NULL,
  `detail` varchar(128) DEFAULT NULL,
  `user` int(11) DEFAULT NULL,
  `date_created` datetime DEFAULT NULL,
  `date_update` datetime DEFAULT NULL,
  `is_delete` tinyint(1) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

#
# Data for table "indikatormutu"
#

INSERT INTO `indikatormutu` VALUES (1,'INDIKATOR MUTU LAYANAN PRIORITAS','INSTALASI GAWAT DARURAT','PERIODE TRIWULAN I TAHUN 2019',NULL,1,'2021-03-23 19:47:33','2021-03-23 19:47:09',0),(2,'INDIKATOR MUTU LAYANAN PRIORITAS','INSTALASI KAMAR OPERASI','PERIODE TRIWULAN I TAHUN 2019',NULL,1,'2021-03-23 19:47:33',NULL,0),(3,'INDIKATOR MUTU LAYANAN PRIORITAS','INSTALASI RAWAT INAP (IRNA) STROKE','PERIODE TRIWULAN I TAHUN 2019',NULL,1,'2021-03-23 19:52:54',NULL,0),(4,'INDIKATOR MUTU LAYANAN PRIORITAS','INSTALASI GIZI','PERIODE TRIWULAN I TAHUN 2019',NULL,1,'2021-03-23 19:53:15',NULL,0),(5,'INDIKATOR MUTU LAYANAN PRIORITAS','INSTALASI RAWAT INAP (IRNA) GARDENIA','PERIODE TRIWULAN I TAHUN 2019',NULL,1,'2021-03-23 19:53:32','2021-03-23 19:53:52',0);

#
# Structure for table "layanan"
#

DROP TABLE IF EXISTS `layanan`;
CREATE TABLE `layanan` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(128) DEFAULT NULL,
  `deskripsi` varchar(128) DEFAULT NULL,
  `url` varchar(128) DEFAULT NULL,
  `icon` varchar(128) DEFAULT NULL,
  `user` int(11) DEFAULT NULL,
  `date_created` datetime DEFAULT NULL,
  `date_update` datetime DEFAULT NULL,
  `is_delete` tinyint(1) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

#
# Data for table "layanan"
#

INSERT INTO `layanan` VALUES (1,'Pelayanan','Macam-macam pelayanan yang tersedia dan tidak tersedia di RSI Gondanglegi','layanan/pelayanan','fas fa-hand-holding-medical',1,'2021-02-26 23:09:58','2021-02-26 23:09:58',0),(2,'Penunjang Medis','Macam-macam penunjang medis / instalasi yang ada di RSI Gondanglegi','layanan/instalasi','fas fa-briefcase-medical',1,'2021-02-26 23:09:58','2021-02-26 23:09:58',0),(3,'Fasilitas Umum','Macam-macam fasilitas umum yang disediakan oleh RSI Gondanglegi','layanan/fasum','fas fa-wifi',1,'2021-02-26 23:13:56','2021-02-26 23:16:47',0);

#
# Structure for table "layanan_detail"
#

DROP TABLE IF EXISTS `layanan_detail`;
CREATE TABLE `layanan_detail` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `layanan_id` int(11) DEFAULT NULL,
  `nama` varchar(128) DEFAULT NULL,
  `deskripsi` text,
  `jenis` int(11) DEFAULT '1',
  `user` int(11) DEFAULT NULL,
  `date_created` datetime DEFAULT NULL,
  `date_update` datetime DEFAULT NULL,
  `is_delete` tinyint(1) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

#
# Data for table "layanan_detail"
#

INSERT INTO `layanan_detail` VALUES (1,1,'A. Pelayanan Gawat Darurat 24 jam','',1,1,'2021-02-27 01:28:50','2021-02-27 01:28:36',0),(2,1,'B. Pelayanan Medik Umum','1) Pelayanan Medik Dasar;<br>\r\n2) Pelayanan KIA-KB;<br>\r\n3) Pelayanan Gigi dan Mulut;<br>\r\n4) Pelayanan Geriatri.',1,1,'2021-02-27 00:17:11','2021-02-27 23:15:43',0),(3,1,'C. Pelayanan Medik Spesialis Dasar','1) Pelayanan Penyakit Dalam;<br>\n2) Pelayanan Kesehatan Anak;<br>\n3) Pelayanan Bedah;<br>\n4) Pelayanan Obstetri dan Ginekologi.',1,1,'2021-02-27 00:19:38','2021-02-27 01:24:03',0),(4,1,'D. Pelayanan Medik Spesialis Lainnya','1) Pelayanan Penyakit Syaraf;<br>\n2) Pelayanan Penyakit Paru;<br>\n3) Pelayanan Penyakit Mata;<br>\n4) Pelayanan Penyakit THT;<br>\n5) Pelayanan Orthopedi;<br>\n6) Pelayanan Rehabilitasi Medik;<br>\n7) Pelayanan Jiwa.',1,1,'2021-02-27 01:28:50','2021-02-27 01:29:11',0),(5,1,'E. Pelayanan Spesialis Penunjang Medik','1) Pelayanan Anestesiologi;<br>\n2) Pelayanan Radiologi;<br>\n3) Pelayanan Patologi Klinik.',1,1,'2021-02-27 01:28:50',NULL,0),(6,1,'F. Pelayanan Keperawatan dan Kebidanan','1) Pelayanan Asuhan Keperawatan;<br>\n2) Pelayanan Asuhan Kebidanan.',1,1,'2021-02-27 01:28:50',NULL,0),(7,1,'G. Pelayanan Penunjang Klinik','1) Pelayanan Darah;<br>\n2) Pelayanan Gizi;<br>\n3) Pelayanan Farmasi;<br>\n4) Pelayanan Sterilisasi Instrumen;<br>\n5) Rekam Medik.',1,1,'2021-02-27 01:28:50',NULL,0),(8,1,'H. Pelayanan Penunjang Non Klinik','1) Pelayanan Laundry/Linen;<br>\n2) Pelayanan Teknik dan Pemeliharaan Fasilitas;<br>\n3) Pelayanan Pengelolaan Limbah;<br>\n4) Transportasi/ Ambulance;<br>\n5) Pelayanan Pemulasaran Jenazah;<br>\n6) Pengelolaan Gas Medik.',1,1,'2021-02-27 01:28:50',NULL,0),(9,1,'I. Pelayanan Rawat Inap','1) Rawat Inap VVIP;<br>\n2) Rawat Inap VIP;<br>\n3) Rawat Inap Kelas I;<br>\n4) Rawat Inap Kelas II;<br>\n5) Rawat Inap Kelas III;<br>\n6) Perinatologi.',1,1,'2021-02-27 01:28:50',NULL,0),(10,1,'J. Pelayanan Rawat Inap Khusus','1) Pelayanan Perawatan Intensif;<br>\n2) Pelayanan Perawatan Khusus Stroke;<br>\n3) Pelayanan Kamar Operasi dan Pemulihan.',1,1,'2021-02-27 01:28:50',NULL,0),(11,1,'A. Pasien dengan diagnosis','1) TBC dengan XDR / MDR;<br>\n2) Gaduh Gelisah dan rawat inap ec Psikiatri;<br>\n3) Gagal ginjal yang memerlukan HD;<br>\n4) HIV AIDS yang memerlukan ARV atau terapi definitif HIV AIDS;<br>\n5) Kanker yang perlu konsultan hematologi dan onkologi medis;<br>\n6) Pasien KLL indikasi bedah syaraf;<br>\n7) Flu burung (kasus dengan hasil Laboratorium penunjang positif);<br>\n8) Flu babi (kasus dengan hasil Laboratorium penunjang positif);<br>\n9) SARS (kasus dengan hasil Laboratorium penunjang positif);<br>\n10) MERScoV (kasus dengan hasil Laboratorium penunjang positif).',2,1,'2021-02-27 01:28:50',NULL,0),(12,1,'B. Tidak ada DPJP kasus terkait kecuali pasien menghendaki atau menyetujui dirawat dokter lain',NULL,2,1,'2021-02-27 01:28:50',NULL,0),(13,1,'C. Tidak tersedia bed dan peralatan yang sangat diperlukan oleh pasien',NULL,2,1,'2021-02-27 01:28:50',NULL,0),(14,1,'D. Tidak tersedia pemeriksaan penunjang yang diperlukan pasien','Tidak tersedia pemeriksaan penunjang yang diperlukan pasien kecuali pasien menghendaki atau menyetujui pemeriksaan penunjang dilakukan di Luar RSI Gondanglegi dan perawatan tetap dilakukan di RSI Gondanglegi.',2,1,'2021-02-27 01:28:50',NULL,0),(15,2,'1. Instalasi Radiologi','Pelayanan meliputi : <br>\na. X-Ray Computerized Radiology.<br>\nb. X-Ray Kontras.<br>\nc. USG Multipurpose.<br>\nd. USG Color Dopler.<br>\ne. USG Mammae.',1,1,'2021-02-27 01:28:50',NULL,0),(16,2,'2. Instalasi Patologi Klinik','Pelayanan meliputi : <br>\na. Hematologi, meliputi : LED, hemoglobin, leukosit, hitung jenis, eritrosit, hematrocit, trombosit, ddl.<br>\nb. Gula darah acak.<br>\nc. Gula darah puasa 2 jam PP.<br>\nd. Fungsi ginjal, meliputi : BUN, kreatinin, asam urat, dll.<br>\ne. Lemak darah, meliputi : kolesterol total, kolesterol HDL, kolesterol LDL dan trigliserida.<br>\nf. Fungsi hati, meliputi : SGOT, SGPT, albumin, globulin, dll.<br>\ng. Urin lengkap.',1,1,'2021-02-27 01:28:50',NULL,0),(17,2,'3. Instalasi Farmasi',NULL,1,1,'2021-02-27 01:28:50',NULL,0),(18,2,'4. Instalasi Gizi','Melayani konsultasi gizi pada jam berikut:<br>\nSenin-Kamis, dan Sabtu pukul 07.00-14.00<br>\nJumat pukul 07.00-11.00',1,1,'2021-02-27 01:28:50',NULL,0),(19,2,'5. Instalasi Rekam Medis',NULL,1,1,'2021-02-27 01:28:50',NULL,0),(20,2,'6. Instalasi Sterilisasi Sentral',NULL,1,1,'2021-02-27 01:28:50',NULL,0),(21,3,'1. Antar Jemput Ambulance',NULL,1,1,'2021-02-27 01:28:50',NULL,0),(22,3,'2. Mushollah',NULL,1,1,'2021-02-27 01:28:50',NULL,0),(23,3,'3. Tempat Parkir',NULL,1,1,'2021-02-27 01:28:50',NULL,0),(24,3,'4. Ruang Tunggu',NULL,1,1,'2021-02-27 01:28:50',NULL,0),(25,3,'5. Kantin dan Toko',NULL,1,1,'2021-02-27 01:28:50',NULL,0),(26,3,'6. Wifi',NULL,1,1,'2021-02-27 01:28:50',NULL,0),(27,3,'7. ATM',NULL,1,1,'2021-02-27 01:28:50',NULL,0);

#
# Structure for table "poliklinik"
#

DROP TABLE IF EXISTS `poliklinik`;
CREATE TABLE `poliklinik` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(128) DEFAULT NULL,
  `deskripsi` varchar(128) DEFAULT NULL,
  `icon` varchar(128) DEFAULT NULL,
  `user` int(11) DEFAULT NULL,
  `date_created` datetime DEFAULT NULL,
  `date_update` datetime DEFAULT NULL,
  `is_delete` tinyint(1) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

#
# Data for table "poliklinik"
#

INSERT INTO `poliklinik` VALUES (1,'Klinik Spesialis Paru',NULL,'fas fa-clinic-medical',1,'2021-02-26 23:09:58','2021-02-26 23:09:58',0),(2,'Klinik Spesialis Anak',NULL,'fas fa-clinic-medical',1,'2021-02-26 23:09:58','2021-02-26 23:09:58',0),(3,'Klinik Spesialis Penyakit Dalam',NULL,'fas fa-clinic-medical',1,'2021-02-26 23:13:56','2021-02-26 23:16:47',0),(4,'Klinik Spesialis Obgyn',NULL,'fas fa-clinic-medical',1,'2021-02-27 23:46:59','2021-02-27 23:47:42',0);

#
# Structure for table "poliklinik_dokter"
#

DROP TABLE IF EXISTS `poliklinik_dokter`;
CREATE TABLE `poliklinik_dokter` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `poliklinik_id` int(11) DEFAULT NULL,
  `dokter_id` int(11) DEFAULT NULL,
  `urut_hari` tinyint(1) DEFAULT NULL,
  `hari` varchar(255) DEFAULT NULL,
  `jam` varchar(255) DEFAULT NULL,
  `user` int(11) DEFAULT NULL,
  `date_created` datetime DEFAULT NULL,
  `date_update` datetime DEFAULT NULL,
  `is_delete` tinyint(1) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

#
# Data for table "poliklinik_dokter"
#

INSERT INTO `poliklinik_dokter` VALUES (1,2,1,2,'Kamis','09:00 - 11:00 WIB',1,'2021-03-09 22:32:03','2021-03-14 00:28:29',0),(2,1,4,5,'Rabu','07:00 - 09:00 WIB',1,'2021-03-09 22:32:03','2021-03-14 00:28:26',0),(3,3,1,1,'Selasa','07:00 - 10:00 WIB',1,'2021-03-13 23:33:59','2021-03-14 00:28:32',0),(4,1,1,1,'Senin','00:00 - 24:00 WIB',1,'2021-03-14 00:28:53','2021-03-14 00:33:40',0);

#
# Structure for table "profil"
#

DROP TABLE IF EXISTS `profil`;
CREATE TABLE `profil` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(128) DEFAULT NULL,
  `detail` varchar(128) DEFAULT NULL,
  `deskripsi` text,
  `alamat` varchar(128) DEFAULT NULL,
  `telp` varchar(128) DEFAULT NULL,
  `email` varchar(128) DEFAULT NULL,
  `wa` varchar(128) DEFAULT NULL,
  `fb` varchar(128) DEFAULT NULL,
  `ig` varchar(128) DEFAULT NULL,
  `tw` varchar(128) DEFAULT NULL,
  `image` varchar(128) DEFAULT NULL,
  `jmldokter` int(11) DEFAULT NULL,
  `jmlperawat` int(11) DEFAULT NULL,
  `jmlkaryawan` int(11) DEFAULT NULL,
  `jmlpasien` int(11) DEFAULT NULL,
  `user` int(11) DEFAULT NULL,
  `date_created` datetime DEFAULT NULL,
  `date_update` datetime DEFAULT NULL,
  `is_delete` tinyint(1) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

#
# Data for table "profil"
#

INSERT INTO `profil` VALUES (1,'RSI Gondanglegi','Yayasan Rumah Sakit Islam Gondanglegi','Rumah Sakit Islam Gondanglegi merupakan rumah sakit tipe C di bawah naungan Yayasan Rumah Sakit Islam Gondanglegi, yang mana pada tanggal 30 Juni 2019 telah terakreditasi UTAMA dengan sertifikat dari Komisi Akreditasi Rumah Sakit (KARS).','Jl. Hayam Wuruk No.66 Gondanglegi','(0341) 879879 - 879047 - 879205 - 878593','rsigondanglegi@ymail.com','081231543474','RSI Gondanglegi','@rsigondanglegi','-','18d2ef46919403276516e84acfe48718.jpg',15,20,10,30,1,'2021-02-22 22:22:14','2021-02-26 23:35:16',0);

#
# Structure for table "rekanan"
#

DROP TABLE IF EXISTS `rekanan`;
CREATE TABLE `rekanan` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(128) DEFAULT NULL,
  `image` varchar(128) DEFAULT NULL,
  `urut` int(11) DEFAULT NULL,
  `user` int(11) DEFAULT NULL,
  `date_created` datetime DEFAULT NULL,
  `date_update` datetime DEFAULT NULL,
  `is_delete` tinyint(1) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

#
# Data for table "rekanan"
#

INSERT INTO `rekanan` VALUES (1,'1','e93c590a162638540a39ee067ccc55f0.png',1,1,'2021-03-13 22:27:25','2021-05-05 00:53:13',0),(2,'2','fc66d08bb40b1a9cd6396a2b3140bbac.jpg',2,1,'2021-03-13 22:27:25','2021-05-05 00:53:21',0),(3,'3','0890a705c01d611d40212965877fbdb0.jpg',3,1,'2021-03-13 22:27:25','2021-05-05 00:53:29',0),(4,'4','f12b804eca11360014eda2602ce3696d.png',4,1,'2021-03-13 22:27:25','2021-05-05 00:53:36',0),(5,'5','0f67748fcf78866f772f814caf062934.png',5,1,'2021-03-13 22:27:25','2021-05-05 00:53:44',0),(6,'6','1ed87e956f43c722fa12bd6772593440.png',6,1,'2021-03-13 22:27:25','2021-05-05 00:53:52',0),(7,'7','60d7fd279b0a828fc4f682f10ff69aa7.png',7,1,'2021-03-13 22:27:25','2021-05-05 00:54:00',0),(8,'8','aee966faf9c26a60fd5947e1a2657a22.png',8,1,'2021-03-13 22:27:25','2021-05-05 00:54:14',0),(9,'9','34f2fae6ae0d676fb7d247c67047d053.png',9,1,'2021-03-13 22:27:25','2021-05-05 00:49:54',0),(10,'10','6e9bf8b65b09f070a50c1885e72ab5ac.png',10,1,'2021-03-13 22:27:25','2021-05-05 00:54:32',0);

#
# Structure for table "sejarah"
#

DROP TABLE IF EXISTS `sejarah`;
CREATE TABLE `sejarah` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `judul` varchar(255) DEFAULT NULL,
  `deskripsi` text,
  `image` varchar(255) DEFAULT NULL,
  `user` int(11) DEFAULT NULL,
  `date_created` datetime DEFAULT NULL,
  `date_update` datetime DEFAULT NULL,
  `is_delete` tinyint(1) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

#
# Data for table "sejarah"
#

INSERT INTO `sejarah` VALUES (1,'Sejarah Rumah Sakit Islam Gondanglegi','Sejarah berdirinya Rumah Sakit Islam Gondanglegi dimulai dari gagasan luhur para tokoh yang tergabung dalam koperasi Petani Tebu Rakyat Malang Selatan (PETERMAS) tahun 1954. Pada tahun 1955 koperasi PETERMAS membeli bekas pabrik rokok bernama ISIMA dan dirubah penggunaannya menjadi Balai Kesehatan Ibu dan Anak (BKIA) diberi nama Dewi Masyithoh dan Panti Asuhan Yatim Piatu.<br>Pada perkembangannya, tahun 1985 mendapat ijin operasional rumah sakit dari Bupati Malang nomor: 445/2078/452.016/1985. Selanjutnya pada tanggal 18 April 1996 mendapat ijin dari Menteri Kesehatan nomor: Y.M.02.04.3.5.01599 kepada Yayasan Kesejahteraan Islam Gondanglegi untuk menyelenggarakan Rumah Sakit Islam Gondanglegi (RSIG).<br>Rumah Sakit Islam Gondanglegi merupakan rumah sakit tipe ”C”, dengan luas tanah 4.764,20 M2 dan bangunan fisik seluas 5.959,2 M2. Dan pada 30 Juni 2019 telah terakreditasi Utama dengan sertifikat dari Komisi Akreditasi Rumah Sakit (KARS).','336fffeb01cd33d56b7fed2b1b40d00d.jpg',1,'2021-02-22 22:22:14','2021-03-23 19:26:37',0);

#
# Structure for table "testimoni"
#

DROP TABLE IF EXISTS `testimoni`;
CREATE TABLE `testimoni` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(128) DEFAULT NULL,
  `deskripsi` varchar(128) DEFAULT NULL,
  `testimoni` varchar(255) DEFAULT NULL,
  `user` int(11) DEFAULT NULL,
  `date_created` datetime DEFAULT NULL,
  `date_update` datetime DEFAULT NULL,
  `is_delete` tinyint(1) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

#
# Data for table "testimoni"
#

INSERT INTO `testimoni` VALUES (1,'*****','Keluarga pasien IRNA Dahlia','Kami sekeluarga mengucapkan terimakasih atas pelayanan dari RSI Gondanglegi. Gak kekurangan suatu apapun, baik, sopan, ramah. Kami sekeluarga mengucapkan banyak-banyak terimakasih.',1,'2021-03-23 23:17:05','2021-03-23 23:24:12',0),(2,'*****','Keluarga pasien IRNA Mawar','Kami juga mengucapkan banyak-banyak terimakasih atas pelayanan yang terbaik bagi kami. Semoga RSI semakin maju dan eksis di masa depan.',1,'2021-05-05 00:10:11','2021-05-05 00:11:13',0),(3,'*****','Keluarga pasien IRNA Dahlia','Saya juga ucapkan banyak-banyak makasih atas pelayanan di RSI yang sangat baik dan tidak mengecewakan. Pasien atau keluarga pasien sekali lagi terimakasih. Semoga RSI tetap jaya selamanya.',1,'2021-05-05 00:10:39',NULL,0),(4,'*****','Keluarga pasien IRNA Cendana','Kami dari segenap keluarga mengucapkan terimakasih atas pelayanan yang kami rasa sangat baik. Semoga semua petugas RSI Gondanglegi selalu dalam lindungan Allah. Amin.',1,'2021-05-05 00:11:06',NULL,0);

#
# Structure for table "user"
#

DROP TABLE IF EXISTS `user`;
CREATE TABLE `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(128) NOT NULL,
  `email` varchar(128) NOT NULL,
  `username` varchar(128) NOT NULL DEFAULT '',
  `image` varchar(128) NOT NULL,
  `password` varchar(128) NOT NULL DEFAULT '',
  `role_id` int(11) NOT NULL,
  `is_active` tinyint(1) NOT NULL,
  `date_created` datetime DEFAULT NULL,
  `date_updated` datetime DEFAULT NULL,
  `last_login` datetime DEFAULT NULL,
  `is_delete` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

#
# Data for table "user"
#

INSERT INTO `user` VALUES (1,'admin','admin@gmail.com','admin','default.png','$2y$10$yUg0yksk2.7NWLJIWG60duiF9CxIXhM5Bw0ME2EDI2IrjkBuTHWNG',1,1,'2020-11-14 18:22:13','2020-11-14 18:22:13','2021-02-21 22:41:28',0);

#
# Structure for table "user_access_section"
#

DROP TABLE IF EXISTS `user_access_section`;
CREATE TABLE `user_access_section` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `role_id` int(11) NOT NULL,
  `section_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

#
# Data for table "user_access_section"
#

INSERT INTO `user_access_section` VALUES (1,1,1),(2,1,2),(3,1,3),(4,1,4),(5,1,5),(6,2,1),(7,2,2),(8,2,4);

#
# Structure for table "user_menu"
#

DROP TABLE IF EXISTS `user_menu`;
CREATE TABLE `user_menu` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `section_id` int(11) NOT NULL,
  `title` varchar(128) NOT NULL,
  `url` varchar(128) NOT NULL,
  `icon` varchar(128) NOT NULL,
  `urut` int(11) DEFAULT NULL,
  `is_active` tinyint(1) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

#
# Data for table "user_menu"
#

INSERT INTO `user_menu` VALUES (1,1,'Dashboard','myadmin/dashboard','fas fa-fw fa-home',1,1),(2,2,'MyProfile','myadmin/profile','fas fa-fw fa-user',2,1),(3,3,'Role','myadmin/manage/role','fas fa-fw fa-user-shield',1,1),(4,3,'User Management','myadmin/manage/user','fas fa-users-cog',5,1),(5,3,'Section Menu','myadmin/manage/section','fas fa-fw fa-folder-plus',2,1),(6,3,'Menu Management','myadmin/manage/menu','fas fa-fw fa-folder',3,1),(7,3,'Submenu Management','myadmin/manage/submenu','fas fa-fw fa-folder-open',4,1),(8,4,'Company Profile','#','fas fa-fw fa-folder',2,1),(9,4,'Image Slider','myadmin/menu/imageslider','fas fa-fw fa-folder',1,1),(10,4,'Layanan','myadmin/menu/layanan','fas fa-fw fa-folder',3,1),(11,4,'PoliKlinik','myadmin/menu/poliklinik','fas fa-fw fa-folder',4,1),(12,4,'Dokter','myadmin/menu/dokter','fas fa-fw fa-folder',5,1),(13,4,'Indikator Mutu','myadmin/menu/indikatormutu','fas fa-fw fa-folder',6,1),(14,4,'Artikel','myadmin/menu/artikel','fas fa-fw fa-folder',7,1),(15,4,'Galery','#','fas fa-fw fa-folder',8,1),(16,4,'Download','myadmin/menu/download','fas fa-fw fa-folder',9,1),(17,4,'Testimoni','myadmin/menu/testimoni','fas fa-fw fa-folder',10,1),(18,5,'Editor','myadmin/editor','fas fa-fw fa-folder',1,1),(19,5,'tes2','myadmin/editor/edit','fas fa-fw fa-key',3,1),(20,4,'Rekanan','myadmin/menu/rekanan','fas fa-fw fa-folder',11,1);

#
# Structure for table "user_role"
#

DROP TABLE IF EXISTS `user_role`;
CREATE TABLE `user_role` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `role` varchar(128) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

#
# Data for table "user_role"
#

INSERT INTO `user_role` VALUES (1,'Administrator'),(2,'Member');

#
# Structure for table "user_section"
#

DROP TABLE IF EXISTS `user_section`;
CREATE TABLE `user_section` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `section` varchar(128) NOT NULL,
  `urut` int(11) DEFAULT NULL,
  `is_active` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

#
# Data for table "user_section"
#

INSERT INTO `user_section` VALUES (1,'Dashboard',1,1),(2,'Profile',3,1),(3,'Manage',4,1),(4,'Menu',2,1),(5,'Editor',5,1);

#
# Structure for table "user_sub_menu"
#

DROP TABLE IF EXISTS `user_sub_menu`;
CREATE TABLE `user_sub_menu` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `menu_id` int(11) NOT NULL,
  `title` varchar(128) NOT NULL,
  `url` varchar(128) NOT NULL,
  `urut` int(11) DEFAULT NULL,
  `is_active` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

#
# Data for table "user_sub_menu"
#

INSERT INTO `user_sub_menu` VALUES (1,8,'Umum','myadmin/menu/umum',1,1),(2,8,'Sejarah','myadmin/menu/sejarah',2,1),(3,8,'Visi Misi','myadmin/menu/visimisi',3,1),(4,8,'Direksi','myadmin/menu/direksi',4,1),(5,15,'Foto','myadmin/menu/foto',1,1),(6,15,'Video','myadmin/menu/video',2,1);

#
# Structure for table "video"
#

DROP TABLE IF EXISTS `video`;
CREATE TABLE `video` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(128) DEFAULT NULL,
  `deskripsi` varchar(128) DEFAULT NULL,
  `url` varchar(255) DEFAULT NULL,
  `urut` int(11) DEFAULT NULL,
  `user` int(11) DEFAULT NULL,
  `date_created` datetime DEFAULT NULL,
  `date_update` datetime DEFAULT NULL,
  `is_delete` tinyint(1) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

#
# Data for table "video"
#

INSERT INTO `video` VALUES (1,'1','-','http://',1,1,'2021-03-23 22:56:12','2021-03-23 22:56:55',1);

#
# Structure for table "visimisi"
#

DROP TABLE IF EXISTS `visimisi`;
CREATE TABLE `visimisi` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `judul` varchar(128) DEFAULT NULL,
  `visi` varchar(128) DEFAULT NULL,
  `misi` text,
  `motto` varchar(128) DEFAULT NULL,
  `image` varchar(128) DEFAULT NULL,
  `user` int(11) DEFAULT NULL,
  `date_created` datetime DEFAULT NULL,
  `date_update` datetime DEFAULT NULL,
  `is_delete` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

#
# Data for table "visimisi"
#

INSERT INTO `visimisi` VALUES (1,'Untuk mencapai kesuksesan dan kemajuan dalam pelayanan, RSI Gondanglegi berjalan sesuai dengan Visi, Misi &amp; Motto','Rumah Sakit Islam Favorit yang Mengutamakan Mutu dan Keselamatan Pasien','1. Meningkatkan tipe rumah sakit dari tipe D ke tipe C yang terakreditasi.<br>2. Menjaga mutu pelayanan dan mengutamakan keselamatan pasien.<br>3. Meningkatkan kerja sama kepada seluruh rekanan rumah sakit.<br>4. Membangun, merenovasi, mengadakan sarana prasarana dengan terencana, sesuai standar berestetika dengan pembiayaan rasional.<br>5. Menjadikan sebagai rumah sakit percontohan dalam pengelolaan lingkungan hidup.<br>','Ikhlas dan Profesional dalam pelayanan','c60965c63a1f17c053c1818f8c0b4e51.jpg',1,'2021-02-22 22:50:16','2021-02-23 00:06:11',0);

#
# Structure for table "view_jadwal"
#

DROP VIEW IF EXISTS `view_jadwal`;
CREATE VIEW `view_jadwal` AS 
  select `poliklinik_dokter`.`id` AS `id`,`poliklinik_dokter`.`poliklinik_id` AS `poliklinik_id`,`poliklinik_dokter`.`dokter_id` AS `dokter_id`,`poliklinik_dokter`.`hari` AS `hari`,`poliklinik_dokter`.`jam` AS `jam`,`poliklinik_dokter`.`user` AS `user`,`poliklinik_dokter`.`date_created` AS `date_created`,`poliklinik_dokter`.`date_update` AS `date_update`,`poliklinik_dokter`.`is_delete` AS `is_delete`,`poliklinik`.`nama` AS `poliklinik`,`dokter`.`nama` AS `dokter` from ((`poliklinik_dokter` join `poliklinik` on((`poliklinik_dokter`.`poliklinik_id` = `poliklinik`.`id`))) join `dokter` on((`poliklinik_dokter`.`dokter_id` = `dokter`.`id`))) where (`poliklinik_dokter`.`is_delete` = 0);
