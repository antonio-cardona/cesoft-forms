ALTER TABLE `users`
	CHANGE COLUMN `role` `role` VARCHAR(33) NOT NULL DEFAULT 'PARTICIPANTE' COLLATE 'utf8mb4_unicode_ci' AFTER `updated_at`;
