CREATE DATABASE IF NOT EXISTS `diagnosa_kucing` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `diagnosa_kucing`;

-- =============================================
-- Tabel: admin
-- =============================================
CREATE TABLE IF NOT EXISTS `admin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `admin` (`id`, `username`, `password`) VALUES
(1, 'admin', '$2y$12$5pO2gI4J1cB3C2lgkQbLv.eMTCBMDzygKGU.qbpSpUuWEQND7AnfK');

-- =============================================
-- Tabel: gejala
-- =============================================
CREATE TABLE IF NOT EXISTS `gejala` (
  `id_gejala` int(11) NOT NULL AUTO_INCREMENT,
  `kode_gejala` varchar(10) NOT NULL,
  `gejala` text NOT NULL,
  PRIMARY KEY (`id_gejala`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `gejala` (`id_gejala`, `kode_gejala`, `gejala`) VALUES
(1, 'G01', 'Apakah kucing anda batuk?'),
(2, 'G02', 'Apakah kucing anda bersin-bersin?'),
(3, 'G03', 'Apakah kucing anda pilek?'),
(4, 'G04', 'Apakah kucing anda demam?'),
(5, 'G05', 'Apakah kucing anda muntah?'),
(6, 'G06', 'Apakah kucing anda diare?'),
(7, 'G07', 'Apakah nafsu makan kucing anda berkurang?'),
(8, 'G08', 'Apakah kucing anda lesu?'),
(9, 'G09', 'Apakah mata kucing anda berair?'),
(10, 'G10', 'Apakah kucing anda mengalami kejang?');

-- =============================================
-- Tabel: penyakit
-- =============================================
CREATE TABLE IF NOT EXISTS `penyakit` (
  `id_penyakit` int(11) NOT NULL AUTO_INCREMENT,
  `kode_penyakit` varchar(10) NOT NULL,
  `penyakit` varchar(255) NOT NULL,
  `solusi` text NOT NULL,
  PRIMARY KEY (`id_penyakit`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `penyakit` (`id_penyakit`, `kode_penyakit`, `penyakit`, `solusi`) VALUES
(1, 'P01', 'Flu Kucing (Feline Upper Respiratory Infection)', 'Berikan obat flu kucing yang diresepkan dokter hewan, jaga suhu tubuh kucing tetap hangat, berikan makanan yang mudah dicerna, dan pastikan kucing tetap minum air yang cukup.'),
(2, 'P02', 'Panleukopenia (Feline Distemper)', 'Segera bawa ke dokter hewan untuk perawatan intensif, berikan cairan infus untuk mencegah dehidrasi, berikan antibiotik untuk mencegah infeksi sekunder, dan isolasi kucing dari kucing lain.'),
(3, 'P03', 'Gastroenteritis (Radang Lambung)', 'Berikan makanan yang mudah dicerna (boiled chicken), hindari makanan berlemak, berikan probiotik untuk kesehatan pencernaan, dan bawa ke dokter hewan jika gejala memburuk.'),
(4, 'P04', 'Virus Rabies', 'Segera bawa ke dokter hewan, tidak ada obat yang pasti untuk rabies, lakukan vaksinasi rutin untuk pencegahan, dan jauhkan kucing dari kontak dengan hewan liar.');

-- =============================================
-- Tabel: relasi (penyakit <-> gejala)
-- =============================================
CREATE TABLE IF NOT EXISTS `relasi` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `penyakit_id` int(11) NOT NULL,
  `gejala_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `penyakit_id` (`penyakit_id`),
  KEY `gejala_id` (`gejala_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `relasi` (`id`, `penyakit_id`, `gejala_id`) VALUES
(1, 1, 1), (2, 1, 2), (3, 1, 3), (4, 1, 4), (5, 1, 9),
(6, 2, 1), (7, 2, 4), (8, 2, 5), (9, 2, 6), (10, 2, 7), (11, 2, 8),
(12, 3, 5), (13, 3, 6), (14, 3, 7), (15, 3, 8),
(16, 4, 4), (17, 4, 8), (18, 4, 10);

-- =============================================
-- Tabel: rule (decision tree)
-- =============================================
CREATE TABLE IF NOT EXISTS `rule` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `gejala_id` int(11) NOT NULL,
  `parent` varchar(10) DEFAULT NULL,
  `ya` varchar(10) DEFAULT NULL,
  `tidak` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `gejala_id` (`gejala_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `rule` (`id`, `gejala_id`, `parent`, `ya`, `tidak`) VALUES
(1, 1, NULL, 'G02', 'G05'),
(2, 2, 'G01', 'G03', 'G04'),
(3, 3, 'G02', 'P01', 'G04'),
(4, 4, 'G02', 'P02', 'G06'),
(5, 5, 'G01', 'G06', 'G07'),
(6, 6, 'G05', 'P03', 'G08'),
(7, 7, 'G05', 'G08', 'G09'),
(8, 8, 'G05', 'G10', 'P04'),
(9, 9, 'G07', 'P01', NULL),
(10, 10, 'G08', 'P04', NULL);

-- =============================================
-- Tabel: user (data konsultasi)
-- =============================================
CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `jenis` varchar(100) DEFAULT NULL,
  `namakucing` varchar(100) DEFAULT NULL,
  `penyakit_kode` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- =============================================
-- Tabel: jenis (jenis kucing)
-- =============================================
CREATE TABLE IF NOT EXISTS `jenis` (
  `id` varchar(10) NOT NULL,
  `nama` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `jenis` (`id`, `nama`) VALUES
('M001', 'Persia'),
('M002', 'Anggora'),
('M003', 'Maine Coon'),
('M004', 'Siamese'),
('M005', 'Ragdoll');

-- =============================================
-- Tabel: namakucing
-- =============================================
CREATE TABLE IF NOT EXISTS `namakucing` (
  `id` varchar(10) NOT NULL,
  `nama` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `namakucing` (`id`, `nama`) VALUES
('S001', 'Kitty'),
('S002', 'Mochi'),
('S003', 'Jagung'),
('S004', 'Baso'),
('S005', 'Putri');
