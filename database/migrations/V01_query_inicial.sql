 	CREATE DATABASE IF NOT EXISTS todo_list;
USE todo_list;

CREATE TABLE IF NOT EXISTS `users` (
	  `user_id` INT(11) NOT NULL AUTO_INCREMENT,
	  `name` VARCHAR(250) NOT NULL,
	  `email` VARCHAR(250) UNIQUE NOT NULL,
	  `password` VARCHAR(250) NOT NULL,
	  `updated_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
	  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE INDEX `idx_email` ON `users` (`email`);

CREATE TABLE IF NOT EXISTS `list_to_do` (
	`to_do_id` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT,
	`text_to_do` VARCHAR(500) NOT NULL,
	`done` TINYINT(1) NOT NULL DEFAULT '0',
	`user_id` INT(11) NOT NULL,
	PRIMARY KEY (`to_do_id`),
	KEY `fk_user_id` (`user_id`),
	CONSTRAINT `fk_user_id` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


