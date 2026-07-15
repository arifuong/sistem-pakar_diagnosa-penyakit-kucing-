CREATE DATABASE IF NOT EXISTS `diagnosa_kucing` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `diagnosa_kucing`;

-- Drop tables if they exist in correct order (dependency order)
DROP TABLE IF EXISTS `hasil_diagnosa`;
DROP TABLE IF EXISTS `detail_konsultasi`;
DROP TABLE IF EXISTS `konsultasi`;
DROP TABLE IF EXISTS `rule`;
DROP TABLE IF EXISTS `solusi`;
DROP TABLE IF EXISTS `penyakit`;
DROP TABLE IF EXISTS `gejala`;
DROP TABLE IF EXISTS `jenis_kucing`;
DROP TABLE IF EXISTS `users`;
DROP TABLE IF EXISTS `admin`;
DROP TABLE IF EXISTS `jenis`;
DROP TABLE IF EXISTS `namakucing`;
DROP TABLE IF EXISTS `relasi`;

-- =============================================
-- Tabel: users
-- =============================================
CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(100) NOT NULL UNIQUE,
  `password` varchar(255) NOT NULL,
  `nama_lengkap` varchar(255) NOT NULL,
  `role` enum('admin','pakar') NOT NULL DEFAULT 'admin',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Hashed password is 'admin'
INSERT INTO `users` (`id`, `username`, `password`, `nama_lengkap`, `role`) VALUES
(1, 'admin', '$2y$12$5pO2gI4J1cB3C2lgkQbLv.eMTCBMDzygKGU.qbpSpUuWEQND7AnfK', 'Drh. Feline Expert', 'admin');

-- =============================================
-- Tabel: jenis_kucing
-- =============================================
CREATE TABLE `jenis_kucing` (
  `id` varchar(10) NOT NULL,
  `nama` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `jenis_kucing` (`id`, `nama`) VALUES
('JK01', 'Persia'),
('JK02', 'Anggora'),
('JK03', 'Maine Coon'),
('JK04', 'Siamese'),
('JK05', 'Ragdoll'),
('JK06', 'Domestic / Kampung'),
('JK07', 'Sphynx'),
('JK08', 'Bengal');

-- =============================================
-- Tabel: gejala
-- =============================================
CREATE TABLE `gejala` (
  `id_gejala` int(11) NOT NULL AUTO_INCREMENT,
  `kode_gejala` varchar(10) NOT NULL UNIQUE,
  `nama_gejala` varchar(255) NOT NULL,
  `deskripsi` text DEFAULT NULL,
  PRIMARY KEY (`id_gejala`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `gejala` (`id_gejala`, `kode_gejala`, `nama_gejala`, `deskripsi`) VALUES
(1, 'G01', 'Demam tinggi', 'Suhu tubuh kucing meningkat di atas normal (> 39.5 derajat Celcius).'),
(2, 'G02', 'Lesu dan lemas', 'Kucing tampak tidak bergairah, enggan bergerak, dan tidur terus-menerus.'),
(3, 'G03', 'Kehilangan nafsu makan / Anoreksia', 'Kucing menolak makanan yang biasa disukainya atau makan dalam jumlah sangat sedikit.'),
(4, 'G04', 'Muntah berulang', 'Mengeluarkan isi lambung berulang kali, dapat berupa makanan, cairan kuning, atau lendir.'),
(5, 'G05', 'Diare parah atau berdarah', 'Feses kucing berair, berbau sangat menyengat, atau bercampur darah segar.'),
(6, 'G06', 'Dehidrasi', 'Elastisitas kulit menurun (kulit lambat kembali saat dicubit), mata cekung, dan gusi kering.'),
(7, 'G07', 'Bersin-bersin kronis', 'Aktivitas bersin yang terjadi berulang-ulang dan sering.'),
(8, 'G08', 'Pilek / Hidung mengeluarkan lendir', 'Adanya cairan bening atau ingus kental berwarna kuning kehijauan dari hidung.'),
(9, 'G09', 'Mata merah, berair, atau bengkak', 'Konjungtivitis yang menyebabkan mata tampak meradang, berair, atau tertutup kotoran.'),
(10, 'G10', 'Luka / Sariawan pada mulut dan lidah', 'Ulkus kemerahan di gusi atau lidah yang menyebabkan kucing kesakitan saat makan.'),
(11, 'G11', 'Air liur berlebih / Drooling', 'Kucing terus-menerus meneteskan air liur akibat nyeri mulut atau mual.'),
(12, 'G12', 'Batuk', 'Mengeluarkan suara batuk kering atau basah seperti tersedak.'),
(13, 'G13', 'Napas cepat atau sesak napas', 'Frekuensi napas meningkat (takipnea) atau tampak kesulitan bernapas (dispnea).'),
(14, 'G14', 'Kerak di sekitar mata dan hidung', 'Adanya kotoran kering (sekresi) yang menempel erat di lubang hidung dan sudut mata.'),
(15, 'G15', 'Perut membesar secara abnormal (cairan di perut)', 'Akumulasi cairan bebas (efusi) di dalam rongga perut kucing (asites).'),
(16, 'G16', 'Napas dengan mulut terbuka', 'Kucing bernapas menggunakan mulut akibat kekurangan oksigen (keadaan darurat).'),
(17, 'G17', 'Mengedan saat buang air kecil', 'Kucing tampak mengejan lama di dalam bak pasir dan mengeluarkan suara kesakitan.'),
(18, 'G18', 'Buang air kecil berdarah', 'Urine berwarna merah muda, kemerahan, atau terdapat bercak darah segar.'),
(19, 'G19', 'Buang air kecil sangat sering tapi sedikit-sedikit', 'Kondisi polakiuria akibat iritasi atau sumbatan saluran kemih.'),
(20, 'G20', 'Buang air kecil di luar bak pasir / sembarangan', 'Urinasi sembarangan (periuria) karena ketidaknyamanan saat buang air kecil.'),
(21, 'G21', 'Menjilat area kelamin secara berlebihan', 'Licking area genital berulang kali untuk mengurangi rasa nyeri atau gatal.'),
(22, 'G22', 'Kehilangan berat badan secara drastis', 'Tubuh kucing terlihat semakin kurus dengan tulang rusuk yang menonjol.'),
(23, 'G23', 'Meningkatnya rasa haus dan sering minum', 'Kucing minum jauh lebih banyak dari biasanya (polidipsia).'),
(24, 'G24', 'Meningkatnya frekuensi buang air kecil dalam volume besar', 'Produksi urine sangat banyak dan sering (poliuria).'),
(25, 'G25', 'Kebotakan melingkar pada kulit', 'Area rontok berbentuk lingkaran (alopecia) dengan tepi kemerahan.'),
(26, 'G26', 'Kulit bersisik, kering, atau berkerak', 'Ketombe tebal atau kerak keras pada permukaan kulit kucing.'),
(27, 'G27', 'Rasa gatal ekstrem / sering menggaruk tubuh', 'Pruritus yang membuat kucing terus-menerus menggaruk atau menggigit kulitnya.'),
(28, 'G28', 'Sering menggeleng-gelengkan kepala', 'Head shaking berulang akibat rasa tidak nyaman di dalam telinga.'),
(29, 'G29', 'Kotoran telinga berwarna hitam mirip bubuk kopi', 'Sekresi telinga berlebih berwarna gelap kecokelatan/hitam akibat tungau.'),
(30, 'G30', 'Kucing tampak gelisah atau mencakar area telinga', 'Menggosokkan telinga ke lantai atau mencakar pangkal telinga secara agresif.');

-- =============================================
-- Tabel: penyakit
-- =============================================
CREATE TABLE `penyakit` (
  `id_penyakit` int(11) NOT NULL AUTO_INCREMENT,
  `kode_penyakit` varchar(10) NOT NULL UNIQUE,
  `nama_penyakit` varchar(255) NOT NULL,
  `definisi` text NOT NULL,
  `penyebab` text NOT NULL,
  `pencegahan` text NOT NULL,
  PRIMARY KEY (`id_penyakit`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `penyakit` (`id_penyakit`, `kode_penyakit`, `nama_penyakit`, `definisi`, `penyebab`, `pencegahan`) VALUES
(1, 'P01', 'Feline Panleukopenia', 'Penyakit virus yang sangat menular dan fatal pada kucing, menyerang sel-sel yang membelah cepat di sumsum tulang dan saluran pencernaan.', 'Feline Panleukopenia Virus (FPV), bagian dari keluarga Parvoviridae.', 'Lakukan vaksinasi inti (FVRCP) secara teratur, isolasi ketat kucing baru, dan gunakan disinfektan khusus (seperti pemutih/bleach encer) untuk membersihkan kandang.'),
(2, 'P02', 'Feline Calicivirus', 'Infeksi saluran pernapasan atas yang sangat umum pada kucing, ditandai dengan gejala flu dan luka/sariawan menyakitkan di mulut.', 'Feline Calicivirus (FCV).', 'Vaksinasi rutin FVRCP, menjaga ventilasi ruangan tetap baik, membatasi populasi kucing dalam satu ruangan, serta mencuci tangan setelah menangani kucing sakit.'),
(3, 'P03', 'Feline Herpesvirus', 'Penyakit pernapasan atas akut yang disebabkan oleh virus herpes kucing tipe 1, seringkali menyebabkan gejala mata berair dan bersin yang parah.', 'Feline Herpesvirus-1 (FHV-1).', 'Berikan vaksinasi rutin FVRCP, minimalkan tingkat stres pada kucing, serta jaga kebersihan mata dan hidung kucing secara rutin.'),
(4, 'P04', 'Feline Infectious Peritonitis (FIP)', 'Penyakit viral sistemik yang mematikan akibat mutasi virus corona kucing, menyebabkan akumulasi cairan di perut (basah) atau peradangan granulomatosa organ (kering).', 'Mutasi internal dari Feline Coronavirus (FCoV).', 'Menjaga kebersihan bak pasir (litter box) secara ketat, menghindari penumpukan kucing yang terlalu padat, serta menjaga sistem imun kucing tetap optimal.'),
(5, 'P05', 'Feline Lower Urinary Tract Disease (FLUTD)', 'Istilah umum untuk berbagai kondisi yang memengaruhi kandung kemih dan uretra kucing, seringkali menyebabkan sumbatan urinasi yang fatal terutama pada kucing jantan.', 'Faktor multifaktorial termasuk stres, kurang minum air, pakan kering tinggi magnesium, batu kemih (urolithiasis), atau sistitis idiopatik.', 'Sediakan air minum bersih di beberapa tempat, berikan pakan basah (wet food), sediakan bak pasir yang bersih dan cukup, serta hindari perubahan lingkungan yang mendadak.'),
(6, 'P06', 'Ringworm', 'Infeksi jamur zoonosis pada lapisan luar kulit, rambut, dan kuku kucing yang dapat menular ke manusia.', 'Jamur dermatofit, paling sering Microsporum canis.', 'Mandikan kucing dengan sampo antijamur secara berkala, bersihkan debu dan bulu di lingkungan secara rutin, dan karantina kucing yang menunjukkan gejala botak melingkar.'),
(7, 'P07', 'Ear Mites', 'Infeksi tungau parasit mikroskopis di dalam saluran telinga kucing, menyebabkan rasa gatal yang hebat dan kotoran telinga kehitaman.', 'Tungau Otodectes cynotis.', 'Bersihkan telinga kucing secara rutin dengan ear cleaner, berikan obat kutu tetes tengkuk (spot-on) secara berkala, dan jauhkan dari kucing liar yang terinfeksi.'),
(8, 'P08', 'Chronic Kidney Disease (CKD)', 'Penurunan fungsi ginjal secara perlahan dan progresif yang umumnya terjadi pada kucing berusia lanjut, ditandai dengan peningkatan rasa haus dan penurunan berat badan.', 'Kerusakan ginjal degeneratif karena penuaan, infeksi ginjal kronis, toksin, atau kelainan bawaan.', 'Lakukan pemeriksaan darah dan urine tahunan pada kucing berusia di atas 7 tahun, pastikan akses air minum selalu tersedia, dan berikan pakan rendah fosfor sesuai rekomendasi dokter.');

-- =============================================
-- Tabel: solusi
-- =============================================
CREATE TABLE `solusi` (
  `id_solusi` int(11) NOT NULL AUTO_INCREMENT,
  `penyakit_id` int(11) NOT NULL,
  `solusi` text NOT NULL,
  PRIMARY KEY (`id_solusi`),
  KEY `penyakit_id` (`penyakit_id`),
  CONSTRAINT `fk_solusi_penyakit` FOREIGN KEY (`penyakit_id`) REFERENCES `penyakit` (`id_penyakit`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `solusi` (`id_solusi`, `penyakit_id`, `solusi`) VALUES
(1, 1, 'Segera bawa kucing ke klinik hewan untuk perawatan suportif agresif seperti terapi cairan infus IV, obat anti-muntah, dan antibiotik spektrum luas untuk mencegah infeksi sekunder.'),
(2, 2, 'Berikan obat pereda nyeri mulut yang diresepkan dokter hewan, suapkan makanan basah yang dihaluskan dan dihangatkan, serta bersihkan lendir hidung dengan air hangat.'),
(3, 3, 'Gunakan salep mata antiviral atau tetes mata antibiotik sesuai resep dokter hewan, berikan suplemen L-Lysine untuk menekan replikasi virus, dan lakukan terapi uap (nebulisasi) untuk melegakan hidung tersumbat.'),
(4, 4, 'Konsultasikan dengan dokter hewan mengenai terapi antiviral modern seperti GS-441524, berikan terapi suportif cairan jika terjadi asites, dan obat anti-inflamasi untuk mengurangi peradangan.'),
(5, 5, 'Bawa segera ke dokter hewan terutama jika kucing jantan mengalami penyumbatan urine (tidak bisa pipis sama sekali) untuk dilakukan kateterisasi darurat, berikan obat pereda nyeri/spasmolitik, dan transisi ke pakan khusus urinary.'),
(6, 6, 'Mandikan kucing dengan sampo antijamur (mengandung ketokonazol/mikonazol) 2 kali seminggu, oleskan salep antijamur pada area kebotakan, and berikan obat antijamur oral (seperti itraconazole) sesuai dosis dokter hewan.'),
(7, 7, 'Bersihkan telinga kucing dengan ear cleaner khusus untuk melunakkan kerak hitam, lalu berikan tetes telinga khusus anti-tungau (mengandung ivermectin/pyrethrin) atau gunakan obat kutu spot-on (selamectin).'),
(8, 8, 'Berikan terapi cairan subkutan (bila direkomendasikan dokter), berikan pakan khusus ginjal (renal diet) yang rendah fosfor, suplemen pengikat fosfor, obat penurun tekanan darah jika ada hipertensi, dan obat anti-mual.');

-- =============================================
-- Tabel: rule
-- =============================================
CREATE TABLE `rule` (
  `id_rule` int(11) NOT NULL AUTO_INCREMENT,
  `penyakit_id` int(11) NOT NULL,
  `gejala_id` int(11) NOT NULL,
  `mb` decimal(4,2) NOT NULL,
  `md` decimal(4,2) NOT NULL,
  `cf_pakar` decimal(4,2) NOT NULL,
  PRIMARY KEY (`id_rule`),
  KEY `penyakit_id` (`penyakit_id`),
  KEY `gejala_id` (`gejala_id`),
  CONSTRAINT `fk_rule_gejala` FOREIGN KEY (`gejala_id`) REFERENCES `gejala` (`id_gejala`) ON DELETE CASCADE,
  CONSTRAINT `fk_rule_penyakit` FOREIGN KEY (`penyakit_id`) REFERENCES `penyakit` (`id_penyakit`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `rule` (`id_rule`, `penyakit_id`, `gejala_id`, `mb`, `md`, `cf_pakar`) VALUES
-- P01 Feline Panleukopenia
(1, 1, 1, 0.80, 0.10, 0.70), -- G01
(2, 1, 2, 0.70, 0.20, 0.50), -- G02
(3, 1, 3, 0.70, 0.20, 0.50), -- G03
(4, 1, 4, 0.90, 0.10, 0.80), -- G04
(5, 1, 5, 0.90, 0.10, 0.80), -- G05
(6, 1, 6, 0.80, 0.10, 0.70), -- G06

-- P02 Feline Calicivirus
(7, 2, 2, 0.60, 0.20, 0.40), -- G02
(8, 2, 3, 0.60, 0.20, 0.40), -- G03
(9, 2, 7, 0.80, 0.10, 0.70), -- G07
(10, 2, 8, 0.80, 0.10, 0.70), -- G08
(11, 2, 9, 0.70, 0.10, 0.60), -- G09
(12, 2, 10, 0.95, 0.05, 0.90), -- G10
(13, 2, 11, 0.80, 0.10, 0.70), -- G11

-- P03 Feline Herpesvirus
(14, 3, 1, 0.70, 0.10, 0.60), -- G01
(15, 3, 2, 0.60, 0.20, 0.40), -- G02
(16, 3, 3, 0.60, 0.20, 0.40), -- G03
(17, 3, 7, 0.90, 0.10, 0.80), -- G07
(18, 3, 8, 0.80, 0.10, 0.70), -- G08
(19, 3, 9, 0.85, 0.05, 0.80), -- G09
(20, 3, 14, 0.80, 0.10, 0.70), -- G14

-- P04 Feline Infectious Peritonitis (FIP)
(21, 4, 1, 0.80, 0.10, 0.70), -- G01
(22, 4, 2, 0.70, 0.20, 0.50), -- G02
(23, 4, 3, 0.70, 0.20, 0.50), -- G03
(24, 4, 13, 0.70, 0.10, 0.60), -- G13
(25, 4, 15, 0.95, 0.05, 0.90), -- G15
(26, 4, 16, 0.80, 0.10, 0.70), -- G16
(27, 4, 22, 0.80, 0.10, 0.70), -- G22

-- P05 Feline Lower Urinary Tract Disease (FLUTD)
(28, 5, 2, 0.50, 0.20, 0.30), -- G02
(29, 5, 17, 0.95, 0.05, 0.90), -- G17
(30, 5, 18, 0.90, 0.10, 0.80), -- G18
(31, 5, 19, 0.90, 0.10, 0.80), -- G19
(32, 5, 20, 0.80, 0.10, 0.70), -- G20
(33, 5, 21, 0.80, 0.10, 0.70), -- G21

-- P06 Ringworm
(34, 6, 25, 0.95, 0.05, 0.90), -- G25
(35, 6, 26, 0.80, 0.10, 0.70), -- G26
(36, 6, 27, 0.70, 0.10, 0.60), -- G27

-- P07 Ear Mites
(37, 7, 27, 0.60, 0.10, 0.50), -- G27
(38, 7, 28, 0.90, 0.10, 0.80), -- G28
(39, 7, 29, 0.95, 0.05, 0.90), -- G29
(40, 7, 30, 0.85, 0.05, 0.80), -- G30

-- P08 Chronic Kidney Disease (CKD)
(41, 8, 2, 0.60, 0.20, 0.40), -- G02
(42, 8, 3, 0.70, 0.20, 0.50), -- G03
(43, 8, 4, 0.70, 0.20, 0.50), -- G04
(44, 8, 22, 0.80, 0.10, 0.70), -- G22
(45, 8, 23, 0.90, 0.10, 0.80), -- G23
(46, 8, 24, 0.90, 0.10, 0.80); -- G24

-- =============================================
-- Tabel: konsultasi
-- =============================================
CREATE TABLE `konsultasi` (
  `id_konsultasi` int(11) NOT NULL AUTO_INCREMENT,
  `nama_pemilik` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `nama_kucing` varchar(100) NOT NULL,
  `jenis_kucing` varchar(100) NOT NULL,
  `tanggal` datetime DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_konsultasi`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- =============================================
-- Tabel: detail_konsultasi
-- =============================================
CREATE TABLE `detail_konsultasi` (
  `id_detail` int(11) NOT NULL AUTO_INCREMENT,
  `konsultasi_id` int(11) NOT NULL,
  `gejala_id` int(11) NOT NULL,
  `cf_user` decimal(4,2) NOT NULL,
  PRIMARY KEY (`id_detail`),
  KEY `konsultasi_id` (`konsultasi_id`),
  KEY `gejala_id` (`gejala_id`),
  CONSTRAINT `fk_detail_gejala` FOREIGN KEY (`gejala_id`) REFERENCES `gejala` (`id_gejala`) ON DELETE CASCADE,
  CONSTRAINT `fk_detail_konsultasi` FOREIGN KEY (`konsultasi_id`) REFERENCES `konsultasi` (`id_konsultasi`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- =============================================
-- Tabel: hasil_diagnosa
-- =============================================
CREATE TABLE `hasil_diagnosa` (
  `id_hasil` int(11) NOT NULL AUTO_INCREMENT,
  `konsultasi_id` int(11) NOT NULL,
  `penyakit_id` int(11) NOT NULL,
  `cf_persentase` decimal(5,2) NOT NULL,
  PRIMARY KEY (`id_hasil`),
  KEY `konsultasi_id` (`konsultasi_id`),
  KEY `penyakit_id` (`penyakit_id`),
  CONSTRAINT `fk_hasil_konsultasi` FOREIGN KEY (`konsultasi_id`) REFERENCES `konsultasi` (`id_konsultasi`) ON DELETE CASCADE,
  CONSTRAINT `fk_hasil_penyakit` FOREIGN KEY (`penyakit_id`) REFERENCES `penyakit` (`id_penyakit`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
