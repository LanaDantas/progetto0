-- phpMyAdmin SQL Dump

-- version 5.2.0

-- https://www.phpmyadmin.net/

--

-- Host: localhost:3306

-- Generation Time: Jul 11, 2023 at 06:58 AM

-- Server version: 8.0.30

-- PHP Version: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";

START TRANSACTION;

SET time_zone = "+00:00";

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */

;

/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */

;

/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */

;

/*!40101 SET NAMES utf8mb4 */

;

--

-- Database: `teatri_db`

--

CREATE DATABASE
    IF NOT EXISTS `teatri_db` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;

USE `teatri_db`;

-- --------------------------------------------------------

--

-- Table structure for table `biglietti`

--

DROP TABLE IF EXISTS `biglietti`;

CREATE TABLE
    `biglietti` (
        `COD_OPERAZIONE` int NOT NULL,
        `COD_CLIENTE` varchar(4) NOT NULL,
        `COD_REPLICA` int DEFAULT NULL,
        `DATA_ORA` date DEFAULT NULL,
        `TIPO_PAGAMENTO` varchar(20) DEFAULT NULL,
        `QUANTITA` int DEFAULT NULL
    ) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4 COLLATE = utf8mb4_general_ci;

--

-- Dumping data for table `biglietti`

--

INSERT INTO `biglietti`
VALUES (
        1,
        '0001',
        4,
        '2022-04-14',
        'Bonifico',
        3
    ), (
        2,
        '0001',
        5,
        '2022-05-13',
        'Bonifico',
        7
    ), (
        3,
        '0001',
        5,
        '2022-05-13',
        'Bonifico',
        7
    ), (
        4,
        '0001',
        5,
        '2022-05-13',
        'Bonifico',
        7
    );

-- --------------------------------------------------------

--

-- Table structure for table `repliche`

--
DROP TABLE IF EXISTS `repliche`;

CREATE TABLE
    `repliche` (
        `COD_REPLICA` varchar(4) NOT NULL,
        `COD_SPETTACOLO` varchar(4) NOT NULL,
        `DATA_REPLICA` date DEFAULT NULL
    ) ENGINE = InnoDB DEFAULT CHARSET = utf8mb3;

--

-- Dumping data for table `repliche`

--

INSERT INTO `repliche`
VALUES ('R001', 'S001', '2018-10-05'), ('R002', 'S002', '2018-10-05'), ('R003', 'S003', '2018-10-05'), ('R004', 'S004', '2018-10-05'), ('R005', 'S005', '2018-10-05'), ('R006', 'S006', '2018-10-05'), ('R007', 'S007', '2018-10-05'), ('R008', 'S008', '2018-10-05'), ('R009', 'S009', '2018-10-05'), ('R010', 'S010', '2018-10-05');

-- --------------------------------------------------------

--

-- Table structure for table `spettacoli`

--
DROP TABLE IF EXISTS `spettacoli`;

CREATE TABLE
    `spettacoli` (
        `COD_SPETTACOLO` varchar(4) NOT NULL,
        `TITOLO` varchar(70) DEFAULT NULL,
        `AUTORE` varchar(70) DEFAULT NULL,
        `REGISTA` varchar(70) DEFAULT NULL,
        `PREZZO` decimal(4, 2) DEFAULT NULL,
        `COD_TEATRO` varchar(4) NOT NULL
    ) ENGINE = InnoDB DEFAULT CHARSET = utf8mb3;

--

-- Indexes for table `spettacoli`

--

INSERT INTO `spettacoli`
VALUES (
        'S001',
        'Appunti per un film sulla lotta di classe',
        'Ascanio Celestino',
        'Ascanio Celestino',
        20.00,
        'T001'
    ), (
        'S002',
        'Il birraio di Preston',
        'Andrea Camilleri',
        'Giuseppe Dipasquale',
        20.00,
        'T001'
    ), (
        'S003',
        'La Traviata',
        'Giuseppe Verdi',
        'Laurent Pelly',
        40.00,
        'T002'
    ), (
        'S005',
        'La Bohème',
        'Giacomo Puccini',
        'Giuseppe Patroni Griffi',
        40.00,
        'T002'
    ), (
        'S004',
        'Poveri, ma belli',
        'Gianni Togni',
        'Massimo Ranieri',
        25.00,
        'T003'
    ), (
        'S006',
        'Il sogno del piccolo imperatore',
        'Gian Mesturino',
        'Alberto Barbi',
        25.00,
        'T003'
    );

--

-- Table structure for table `teatri`

--

DROP TABLE IF EXISTS `teatri`;

CREATE TABLE
    `teatri` (
        `COD_TEATRO` varchar(4) NOT NULL,
        `NOME` varchar(100) DEFAULT NULL,
        `INDIRIZZO` varchar(30) DEFAULT NULL,
        `CITTA` varchar(25) DEFAULT NULL,
        `PROVINCIA` varchar(2) DEFAULT NULL,
        `TELEFONO` varchar(14) DEFAULT NULL,
        `POSTI` int DEFAULT NULL
    ) ENGINE = InnoDB DEFAULT CHARSET = utf8mb3;

--

-- Dumping data for table `sedi`

--

INSERT INTO `teatri`
VALUES (
        'T001',
        'Teatro Carignano',
        'Piazza Carignano 6',
        'Torino',
        'TO',
        '011/3456759',
        875
    ), (
        'T002',
        'Teatro Regio',
        'Piazza Castello 2',
        'Torino',
        'TO',
        '011/9870654',
        1592
    ), (
        'T003',
        'Teatro Alfieri',
        'Piazza Solferino 4',
        'Torino',
        'TO',
        '011/6574895',
        1500
    );

--

-- Table structure for table `clienti`

--

DROP TABLE IF EXISTS `clienti`;

CREATE TABLE
    `clienti` (
        `COD_CLIENTE` int NOT NULL,
        `COGNOME` varchar(20) DEFAULT NULL,
        `NOME` varchar(20) DEFAULT NULL,
        `TELEFONO` varchar(14) DEFAULT NULL,
        `EMAIL` varchar(30) DEFAULT NULL
    ) ENGINE = InnoDB DEFAULT CHARSET = utf8mb3;

--

-- Dumping data for table `clienti`

--

INSERT INTO `CLIENTI`
VALUES (
        1,
        'Alfieri',
        'Valeria',
        '011/4328346',
        'alf@libero.it'
    ), (
        2,
        'Bellotti',
        'Cinzia',
        '011/79876658',
        'bel@tin.it'
    ), (
        3,
        'Morgeri',
        'Giuseppe',
        '011/76547648',
        'dig@email.it'
    ), (
        4,
        'Bastioni',
        'Gianluca',
        '011/76586548',
        'fai@virgilio.it'
    ), (
        5,
        'Francini',
        'Massimiliano',
        '011/543326565',
        'fra@libero.it'
    ), (
        6,
        'Mattone',
        'Fabrizio',
        '011/98765762',
        'gat@tin.it'
    ), (
        7,
        'Maistoni',
        'Ivan',
        '011/5483678',
        'mai@email.it'
    ), (
        8,
        'Parenti',
        'Michele',
        '011/5367548',
        'mik@tin.it'
    ), (
        9,
        'Morrini',
        'Marco',
        '011/53645872',
        'mor@libero.it'
    ), (
        10,
        'Pagini',
        'Giuliana',
        '011/78363459',
        'pag@yahoo.it'
    ), (
        11,
        'Picati',
        'Annamaria',
        '011/67598721',
        'pic@email.it'
    ), (
        12,
        'Rugliese',
        'Antonio',
        '011/3678465',
        'pug@tin.it'
    ), (
        13,
        'Romanotti',
        'Davide',
        '011/34254367',
        'rom@libero.it'
    ), (
        14,
        'Straniti',
        'Annamaria',
        '011/845673865',
        'str@libero.it'
    );

--

-- Indexes for table `biglietti`

--

ALTER TABLE `biglietti`
ADD
    PRIMARY KEY (`COD_OPERAZIONE`),
ADD
    KEY `clienti` (`COD_CLIENTE`),
ADD
    KEY `repliche` (`COD_REPLICA`);

--

-- Indexes for table `repliche`

--

ALTER TABLE `repliche`
ADD
    PRIMARY KEY (`COD_REPLICA`),
ADD
    KEY `spettacoli` (`COD_SPETTACOLO`);

--

-- Indexes for table `spettacoli`

--

ALTER TABLE `spettacoli`
ADD
    PRIMARY KEY (`COD_SPETTACOLO`),
ADD KEY `teatri` (`COD_TEATRO`);

--

-- Indexes for table `teatri`

--

ALTER TABLE `teatri` ADD PRIMARY KEY (`COD_TEATRO`);

--

-- Indexes for table `teatri`

--

ALTER TABLE `clienti`
ADD
    PRIMARY KEY (`COD_CLIENTE`); 
    
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */

;

/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */

;

/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */

;