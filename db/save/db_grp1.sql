-- phpMyAdmin SQL Dump
-- version 5.0.4deb2+deb11u1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: May 15, 2024 at 10:02 AM
-- Server version: 10.5.23-MariaDB-0+deb11u1
-- PHP Version: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_grp1`
--

-- --------------------------------------------------------

--
-- Table structure for table `connexion`
--

CREATE TABLE `connexion` (
  `id` int(11) NOT NULL,
  `login` varchar(100) NOT NULL,
  `passwd` varchar(100) NOT NULL,
  `admin` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `connexion`
--

INSERT INTO `connexion` (`id`, `login`, `passwd`, `admin`) VALUES
(1, 'user', 'user', 0),
(12, 'admin', 'admin', 1),
(16, 'a', 'b', 0),
(22, 'fino_lovni', 'b', 0);

-- --------------------------------------------------------

--
-- Table structure for table `dialogue`
--

CREATE TABLE `dialogue` (
  `id` float NOT NULL,
  `id_histoire` int(11) NOT NULL,
  `id_personnage` int(11) NOT NULL,
  `texte` varchar(500) NOT NULL,
  `id_suite_dialogue_1` int(11) NOT NULL,
  `id_suite_dialogue_2` int(11) NOT NULL,
  `id_suite_dialogue_3` int(11) NOT NULL,
  `dé` tinyint(1) NOT NULL,
  `premier_dialogue` tinyint(1) NOT NULL,
  `id_dialogue_necessaire` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `dialogue`
--

INSERT INTO `dialogue` (`id`, `id_histoire`, `id_personnage`, `texte`, `id_suite_dialogue_1`, `id_suite_dialogue_2`, `id_suite_dialogue_3`, `dé`, `premier_dialogue`, `id_dialogue_necessaire`) VALUES
(1, 1, 1, 'Voici le premier dialogue', 2, 0, 0, 0, 1, 0),
(2, 1, 1, 'Ceci est le 2nd dialogue', 3, 4, 0, 0, 0, 0),
(3, 1, 1, '3ème', 4, 0, 0, 0, 0, 0),
(4, 1, 1, 'Je suis le 4eme.', 0, 0, 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `histoire`
--

CREATE TABLE `histoire` (
  `id` int(11) NOT NULL,
  `nom` varchar(100) NOT NULL,
  `url_img` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `histoire`
--

INSERT INTO `histoire` (`id`, `nom`, `url_img`) VALUES
(1, 'La conquête des étoiles.', 'r2d2.jpg'),
(2, 'Les schtroumphs', 'strom.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `Personnage`
--

CREATE TABLE `Personnage` (
  `id` int(11) NOT NULL,
  `url_image` varchar(100) NOT NULL,
  `nom` varchar(100) NOT NULL,
  `couleur` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `Personnage`
--

INSERT INTO `Personnage` (`id`, `url_image`, `nom`, `couleur`) VALUES
(1, 'r2d2.jpg', 'R2D', 'Bleu'),
(2, 'C3Pedro.jpg', 'C3Pedro', 'Jaune'),
(3, 'storm.jpg', 'Stormstopeur', 'Corail');

-- --------------------------------------------------------

--
-- Table structure for table `progression`
--

CREATE TABLE `progression` (
  `id` int(11) NOT NULL,
  `id_histoire` int(11) NOT NULL,
  `id_dialogue` int(11) NOT NULL,
  `id_progression_precedent` int(11) NOT NULL,
  `id_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `progression`
--

INSERT INTO `progression` (`id`, `id_histoire`, `id_dialogue`, `id_progression_precedent`, `id_user`) VALUES
(1, 1, 1, 0, 1),
(2, 1, 2, 1, 1),
(3, 1, 3, 2, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `connexion`
--
ALTER TABLE `connexion`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dialogue`
--
ALTER TABLE `dialogue`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `histoire`
--
ALTER TABLE `histoire`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `Personnage`
--
ALTER TABLE `Personnage`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `progression`
--
ALTER TABLE `progression`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `connexion`
--
ALTER TABLE `connexion`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `dialogue`
--
ALTER TABLE `dialogue`
  MODIFY `id` float NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `histoire`
--
ALTER TABLE `histoire`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `Personnage`
--
ALTER TABLE `Personnage`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `progression`
--
ALTER TABLE `progression`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
