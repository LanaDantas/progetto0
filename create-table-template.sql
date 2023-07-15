-- Active: 1688828753525@@127.0.0.1@3306@progetto1
CREATE TABLE `utenti`( 
    `user_id` int NOT NULL,
    `nome` VARCHAR(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
    `cognome` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
    `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO `utenti` (`user_id`, `nome`, `cognome`, `email`) VALUES
(1, 'Alvin', 'Olinski', 'alvin@mail.it'),
(2, 'Amelie', 'Poulain', 'ammm@mail.it'),
(3, 'Mario', 'Bros', 'mario_top@mail.it');

ALTER TABLE `utenti`
  ADD PRIMARY KEY (`user_id`);

ALTER TABLE `utenti`
  MODIFY `user_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;