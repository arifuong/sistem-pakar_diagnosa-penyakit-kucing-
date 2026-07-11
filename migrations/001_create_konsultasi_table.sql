-- Migration 001: Replace user table with konsultasi table
-- Run this SQL to migrate the database schema

-- Drop the old user table
DROP TABLE IF EXISTS `user`;

-- Create the new konsultasi table
CREATE TABLE IF NOT EXISTS `konsultasi` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama_pemilik` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `id_jenis_kucing` varchar(10) NOT NULL,
  `nama_kucing` varchar(100) NOT NULL,
  `gejala_dipilih` text DEFAULT NULL,
  `hasil_penyakit` varchar(255) DEFAULT NULL,
  `solusi` text DEFAULT NULL,
  `persentase` varchar(10) DEFAULT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
