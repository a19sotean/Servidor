drop table if exists superhero_ability;
drop table if exists ability;
drop table if exists request;
drop table if exists citizen;
drop table if exists superhero;
drop table if exists evolution;
drop table if exists user;

CREATE TABLE `ability` (
  `id` int NOT NULL,
  `name` varchar(50) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `ability` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'destreza', '2022-02-14 12:17:06', '2022-02-14 12:17:06'),
(4, 'percepcion', '2022-02-22 18:19:47', '2022-02-22 18:19:47'),
(5, 'fuerza', '2022-02-22 18:19:57', '2022-02-22 18:19:57'),
(6, 'inteligencia', '2022-02-22 18:20:05', '2022-02-22 18:20:05'),
(7, 'carisma', '2022-02-22 18:20:23', '2022-02-22 18:20:23'),
(8, 'resiliencia', '2022-02-22 18:20:37', '2022-02-22 18:20:37');


DELIMITER $$
CREATE TRIGGER `ability_update_updated_at` BEFORE UPDATE ON `ability` FOR EACH ROW SET NEW.updated_at=CURRENT_TIMESTAMP
$$
DELIMITER ;


CREATE TABLE `citizen` (
  `id` int NOT NULL,
  `name` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `idUser` int NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


INSERT INTO `citizen` (`id`, `name`, `email`, `idUser`, `created_at`, `updated_at`) VALUES
(1, 'andrea', 'andrea@gmail.com', 2, '2022-02-14 08:36:44', '2022-02-14 08:36:44'),
(3, 'sara', 'sara@gmail.com', 1, '2022-02-14 14:48:00', '2022-02-22 23:09:36'),
(4, 'pepe', 'pepe@gmail.com', 6, '2022-03-04 01:58:26', '2022-03-04 01:58:26');

DELIMITER $$
CREATE TRIGGER `citizen_update_updated_at` BEFORE UPDATE ON `citizen` FOR EACH ROW SET NEW.updated_at=CURRENT_TIMESTAMP
$$
DELIMITER ;


CREATE TABLE `evolution` (
  `name` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `evolution` (`name`) VALUES
('beginner'),
('expert');


CREATE TABLE `request` (
  `id` int NOT NULL,
  `title` varchar(20) NOT NULL,
  `description` varchar(100) NOT NULL,
  `done` tinyint(1) NOT NULL,
  `id_superhero` int NOT NULL,
  `id_citizen` int NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `request` (`id`, `title`, `description`, `done`, `id_superhero`, `id_citizen`, `created_at`, `updated_at`) VALUES
(1, 'Villano', 'Hay un villano en mi casa', 1, 1, 1, '2022-02-15 07:40:02', '2022-02-15 07:55:33'),
(11, 'Gato', 'Mi gato se ha escapado', 1, 3, 2, '2022-03-04 00:08:41', '2022-03-04 00:09:04');

DELIMITER $$
CREATE TRIGGER `request_update_updated_at` BEFORE UPDATE ON `request` FOR EACH ROW SET NEW.updated_at=CURRENT_TIMESTAMP
$$
DELIMITER ;


CREATE TABLE `superhero` (
  `id` int NOT NULL,
  `name` varchar(20) NOT NULL,
  `image` varchar(50) NOT NULL,
  `evolution` varchar(20) NOT NULL,
  `id_user` int NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `superhero` (`id`, `name`, `image`, `evolution`, `id_user`, `created_at`, `updated_at`) VALUES
(1, 'deku', 'deku.jpeg', 'expert', 1, '2022-02-14 08:35:23', '2022-02-14 08:35:23'),
(2, 'todoroki', 'todoroki.png', 'beginner', 3, '2022-02-23 01:09:41', '2022-03-03 22:05:13'),
(3, 'tsuyu', 'tsuyu.jpeg', 'beginner', 5, '2022-03-04 01:52:04', '2022-03-04 01:52:04');

DELIMITER $$
CREATE TRIGGER `superhero_update_updated_at` BEFORE UPDATE ON `superhero` FOR EACH ROW SET NEW.updated_at=CURRENT_TIMESTAMP
$$
DELIMITER ;


CREATE TABLE `superhero_ability` (
  `id` int NOT NULL,
  `id_superhero` int NOT NULL,
  `id_abillity` int NOT NULL,
  `value` int NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

DELIMITER $$
CREATE TRIGGER `superhero_ability_update_updated_at` BEFORE UPDATE ON `superhero_ability` FOR EACH ROW set NEW.updated_at = CURRENT_TIMESTAMP
$$
DELIMITER ;


CREATE TABLE `user` (
  `id` int NOT NULL,
  `user` varchar(20) NOT NULL,
  `psw` varchar(20) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `user` (`id`, `user`, `psw`, `created_at`, `updated_at`) VALUES
(1, 'andrea', 'andrea', '2022-02-14 08:33:20', '2022-02-14 08:33:20'),
(2, 'antonio', 'antonio', '2022-02-14 08:35:58', '2022-02-14 08:35:58'),
(3, 'sara', 'sara', '2022-03-03 22:02:19', '2022-03-03 22:02:19'),
(4, 'pepe', 'pepe', '2022-03-04 01:52:04', '2022-03-04 01:52:04'),
(5, 'laura', 'laura', '2022-03-04 01:58:26', '2022-03-04 01:58:26');

DELIMITER $$
CREATE TRIGGER `user_update_updated_at` BEFORE UPDATE ON `user` FOR EACH ROW SET NEW.updated_at=CURRENT_TIMESTAMP
$$
DELIMITER ;

ALTER TABLE `ability`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `citizen`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FOREIGN_KEY_CITIZEN_USER` (`idUser`);

ALTER TABLE `evolution`
  ADD UNIQUE KEY `NAME` (`name`);

ALTER TABLE `request`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FOREIGN_KEY_REQUEST_CITIZEN_ID` (`id_citizen`),
  ADD KEY `FOREIGN_KEY_REQUEST_SUPERHERO_ID` (`id_superhero`);

ALTER TABLE `superhero`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FOREIGN_KEY_SUPERHERO_USER_ID` (`id_user`) USING BTREE;

ALTER TABLE `superhero_ability`
  ADD PRIMARY KEY (`id`),
  ADD KEY `superhero_ability_superhero_id` (`id_superhero`),
  ADD KEY `superhero_ability_ability_id` (`id_abillity`);

ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `ability`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

ALTER TABLE `citizen`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

ALTER TABLE `request`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

ALTER TABLE `superhero`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

ALTER TABLE `superhero_ability`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

ALTER TABLE `user`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

ALTER TABLE `citizen`
  ADD CONSTRAINT `FOREIGN_KEY_CITIZEN_USER` FOREIGN KEY (`idUser`) REFERENCES `user` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

ALTER TABLE `request`
  ADD CONSTRAINT `FOREIGN_KEY_REQUEST_CITIZEN_ID` FOREIGN KEY (`id_citizen`) REFERENCES `citizen` (`id`),
  ADD CONSTRAINT `FOREIGN_KEY_REQUEST_SUPERHERO_ID` FOREIGN KEY (`id_superhero`) REFERENCES `superhero` (`id`);

ALTER TABLE `superhero`
  ADD CONSTRAINT `FOREIGN_KEY_SUPERHERO_USER` FOREIGN KEY (`id_user`) REFERENCES `user` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

ALTER TABLE `superhero_ability`
  ADD CONSTRAINT `superhero_ability_ability_id` FOREIGN KEY (`id_abillity`) REFERENCES `ability` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `superhero_ability_superhero_id` FOREIGN KEY (`id_superhero`) REFERENCES `superhero` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;