-- Migration 002: Database integrity hardening for MySQL 8
-- Run this after the current schema is installed.
-- This migration only uses ALTER TABLE and is safe to re-run.

USE `diagnosa_kucing`;

-- ---------------------------------------------------------------------
-- Unique indexes for domain rules.
-- ---------------------------------------------------------------------
SET @sql := (
  SELECT IF(COUNT(*) = 0,
    'ALTER TABLE `rule` ADD UNIQUE KEY `uq_rule_penyakit_gejala` (`penyakit_id`, `gejala_id`)',
    'SELECT ''skip uq_rule_penyakit_gejala exists'' AS info')
  FROM information_schema.statistics
  WHERE table_schema = DATABASE()
    AND table_name = 'rule'
    AND index_name = 'uq_rule_penyakit_gejala'
);
PREPARE stmt FROM @sql; EXECUTE stmt; DEALLOCATE PREPARE stmt;

SET @sql := (
  SELECT IF(COUNT(*) = 0,
    'ALTER TABLE `solusi` ADD UNIQUE KEY `uq_solusi_penyakit` (`penyakit_id`)',
    'SELECT ''skip uq_solusi_penyakit exists'' AS info')
  FROM information_schema.statistics
  WHERE table_schema = DATABASE()
    AND table_name = 'solusi'
    AND index_name = 'uq_solusi_penyakit'
);
PREPARE stmt FROM @sql; EXECUTE stmt; DEALLOCATE PREPARE stmt;

SET @sql := (
  SELECT IF(COUNT(*) = 0,
    'ALTER TABLE `detail_konsultasi` ADD UNIQUE KEY `uq_detail_konsultasi_gejala` (`konsultasi_id`, `gejala_id`)',
    'SELECT ''skip uq_detail_konsultasi_gejala exists'' AS info')
  FROM information_schema.statistics
  WHERE table_schema = DATABASE()
    AND table_name = 'detail_konsultasi'
    AND index_name = 'uq_detail_konsultasi_gejala'
);
PREPARE stmt FROM @sql; EXECUTE stmt; DEALLOCATE PREPARE stmt;

SET @sql := (
  SELECT IF(COUNT(*) = 0,
    'ALTER TABLE `hasil_diagnosa` ADD KEY `idx_hasil_konsultasi_cf` (`konsultasi_id`, `cf_persentase`, `id_hasil`)',
    'SELECT ''skip idx_hasil_konsultasi_cf exists'' AS info')
  FROM information_schema.statistics
  WHERE table_schema = DATABASE()
    AND table_name = 'hasil_diagnosa'
    AND index_name = 'idx_hasil_konsultasi_cf'
);
PREPARE stmt FROM @sql; EXECUTE stmt; DEALLOCATE PREPARE stmt;

-- ---------------------------------------------------------------------
-- Check constraints for Certainty Factor ranges.
-- MySQL enforces CHECK constraints from 8.0.16 onward.
-- ---------------------------------------------------------------------
SET @sql := (
  SELECT IF(COUNT(*) = 0,
    'ALTER TABLE `rule` ADD CONSTRAINT `chk_rule_mb_range` CHECK (`mb` >= 0 AND `mb` <= 1)',
    'SELECT ''skip chk_rule_mb_range exists'' AS info')
  FROM information_schema.check_constraints
  WHERE constraint_schema = DATABASE()
    AND constraint_name = 'chk_rule_mb_range'
);
PREPARE stmt FROM @sql; EXECUTE stmt; DEALLOCATE PREPARE stmt;

SET @sql := (
  SELECT IF(COUNT(*) = 0,
    'ALTER TABLE `rule` ADD CONSTRAINT `chk_rule_md_range` CHECK (`md` >= 0 AND `md` <= 1)',
    'SELECT ''skip chk_rule_md_range exists'' AS info')
  FROM information_schema.check_constraints
  WHERE constraint_schema = DATABASE()
    AND constraint_name = 'chk_rule_md_range'
);
PREPARE stmt FROM @sql; EXECUTE stmt; DEALLOCATE PREPARE stmt;

SET @sql := (
  SELECT IF(COUNT(*) = 0,
    'ALTER TABLE `rule` ADD CONSTRAINT `chk_rule_cf_pakar_range` CHECK (`cf_pakar` >= -1 AND `cf_pakar` <= 1)',
    'SELECT ''skip chk_rule_cf_pakar_range exists'' AS info')
  FROM information_schema.check_constraints
  WHERE constraint_schema = DATABASE()
    AND constraint_name = 'chk_rule_cf_pakar_range'
);
PREPARE stmt FROM @sql; EXECUTE stmt; DEALLOCATE PREPARE stmt;

SET @sql := (
  SELECT IF(COUNT(*) = 0,
    'ALTER TABLE `detail_konsultasi` ADD CONSTRAINT `chk_detail_cf_user_range` CHECK (`cf_user` > 0 AND `cf_user` <= 1)',
    'SELECT ''skip chk_detail_cf_user_range exists'' AS info')
  FROM information_schema.check_constraints
  WHERE constraint_schema = DATABASE()
    AND constraint_name = 'chk_detail_cf_user_range'
);
PREPARE stmt FROM @sql; EXECUTE stmt; DEALLOCATE PREPARE stmt;

SET @sql := (
  SELECT IF(COUNT(*) = 0,
    'ALTER TABLE `hasil_diagnosa` ADD CONSTRAINT `chk_hasil_cf_persentase_range` CHECK (`cf_persentase` >= 0 AND `cf_persentase` <= 100)',
    'SELECT ''skip chk_hasil_cf_persentase_range exists'' AS info')
  FROM information_schema.check_constraints
  WHERE constraint_schema = DATABASE()
    AND constraint_name = 'chk_hasil_cf_persentase_range'
);
PREPARE stmt FROM @sql; EXECUTE stmt; DEALLOCATE PREPARE stmt;

-- ---------------------------------------------------------------------
-- Foreign keys. These statements are idempotent and only add constraints
-- when the expected constraint name is missing.
-- ---------------------------------------------------------------------
SET @sql := (
  SELECT IF(COUNT(*) = 0,
    'ALTER TABLE `solusi` ADD CONSTRAINT `fk_solusi_penyakit` FOREIGN KEY (`penyakit_id`) REFERENCES `penyakit` (`id_penyakit`) ON DELETE CASCADE',
    'SELECT ''skip fk_solusi_penyakit exists'' AS info')
  FROM information_schema.referential_constraints
  WHERE constraint_schema = DATABASE()
    AND constraint_name = 'fk_solusi_penyakit'
);
PREPARE stmt FROM @sql; EXECUTE stmt; DEALLOCATE PREPARE stmt;

SET @sql := (
  SELECT IF(COUNT(*) = 0,
    'ALTER TABLE `rule` ADD CONSTRAINT `fk_rule_gejala` FOREIGN KEY (`gejala_id`) REFERENCES `gejala` (`id_gejala`) ON DELETE CASCADE',
    'SELECT ''skip fk_rule_gejala exists'' AS info')
  FROM information_schema.referential_constraints
  WHERE constraint_schema = DATABASE()
    AND constraint_name = 'fk_rule_gejala'
);
PREPARE stmt FROM @sql; EXECUTE stmt; DEALLOCATE PREPARE stmt;

SET @sql := (
  SELECT IF(COUNT(*) = 0,
    'ALTER TABLE `rule` ADD CONSTRAINT `fk_rule_penyakit` FOREIGN KEY (`penyakit_id`) REFERENCES `penyakit` (`id_penyakit`) ON DELETE CASCADE',
    'SELECT ''skip fk_rule_penyakit exists'' AS info')
  FROM information_schema.referential_constraints
  WHERE constraint_schema = DATABASE()
    AND constraint_name = 'fk_rule_penyakit'
);
PREPARE stmt FROM @sql; EXECUTE stmt; DEALLOCATE PREPARE stmt;

SET @sql := (
  SELECT IF(COUNT(*) = 0,
    'ALTER TABLE `detail_konsultasi` ADD CONSTRAINT `fk_detail_gejala` FOREIGN KEY (`gejala_id`) REFERENCES `gejala` (`id_gejala`) ON DELETE CASCADE',
    'SELECT ''skip fk_detail_gejala exists'' AS info')
  FROM information_schema.referential_constraints
  WHERE constraint_schema = DATABASE()
    AND constraint_name = 'fk_detail_gejala'
);
PREPARE stmt FROM @sql; EXECUTE stmt; DEALLOCATE PREPARE stmt;

SET @sql := (
  SELECT IF(COUNT(*) = 0,
    'ALTER TABLE `detail_konsultasi` ADD CONSTRAINT `fk_detail_konsultasi` FOREIGN KEY (`konsultasi_id`) REFERENCES `konsultasi` (`id_konsultasi`) ON DELETE CASCADE',
    'SELECT ''skip fk_detail_konsultasi exists'' AS info')
  FROM information_schema.referential_constraints
  WHERE constraint_schema = DATABASE()
    AND constraint_name = 'fk_detail_konsultasi'
);
PREPARE stmt FROM @sql; EXECUTE stmt; DEALLOCATE PREPARE stmt;

SET @sql := (
  SELECT IF(COUNT(*) = 0,
    'ALTER TABLE `hasil_diagnosa` ADD CONSTRAINT `fk_hasil_konsultasi` FOREIGN KEY (`konsultasi_id`) REFERENCES `konsultasi` (`id_konsultasi`) ON DELETE CASCADE',
    'SELECT ''skip fk_hasil_konsultasi exists'' AS info')
  FROM information_schema.referential_constraints
  WHERE constraint_schema = DATABASE()
    AND constraint_name = 'fk_hasil_konsultasi'
);
PREPARE stmt FROM @sql; EXECUTE stmt; DEALLOCATE PREPARE stmt;

SET @sql := (
  SELECT IF(COUNT(*) = 0,
    'ALTER TABLE `hasil_diagnosa` ADD CONSTRAINT `fk_hasil_penyakit` FOREIGN KEY (`penyakit_id`) REFERENCES `penyakit` (`id_penyakit`) ON DELETE CASCADE',
    'SELECT ''skip fk_hasil_penyakit exists'' AS info')
  FROM information_schema.referential_constraints
  WHERE constraint_schema = DATABASE()
    AND constraint_name = 'fk_hasil_penyakit'
);
PREPARE stmt FROM @sql; EXECUTE stmt; DEALLOCATE PREPARE stmt;
