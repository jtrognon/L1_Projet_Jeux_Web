-- phpMyAdmin SQL Dump
-- version 5.0.4deb2+deb11u1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Apr 04, 2024 at 11:55 AM
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
-- Database: `db_trognon`
--

-- --------------------------------------------------------

--
-- Table structure for table `coup`
--

CREATE TABLE `coup` (
  `id` int(11) NOT NULL,
  `id_partie` int(11) NOT NULL DEFAULT 7,
  `piece` varchar(5) NOT NULL,
  `xi` int(11) NOT NULL,
  `yi` int(11) NOT NULL,
  `xf` int(11) NOT NULL,
  `yf` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `coup`
--

INSERT INTO `coup` (`id`, `id_partie`, `piece`, `xi`, `yi`, `xf`, `yf`) VALUES
(64, 7, 'b', 4, 6, 4, 4),
(67, 7, 'n', 2, 1, 2, 2),
(68, 7, 'b', 3, 6, 3, 4),
(69, 7, 'n', 3, 1, 3, 3),
(70, 7, 'Nb', 1, 7, 2, 5),
(72, 7, 'n', 3, 3, 4, 4),
(73, 7, 'Nb', 2, 5, 4, 4),
(74, 7, 'Nn', 6, 0, 5, 2),
(75, 7, 'Nb', 4, 4, 5, 2),
(76, 7, 'n', 6, 1, 5, 2),
(77, 7, 'b', 2, 6, 2, 5),
(78, 7, 'n', 1, 2, 0, 0),
(79, 1, 'b', 2, 1, 2, 3),
(80, 1, 'n', 2, 6, 2, 4);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `coup`
--
ALTER TABLE `coup`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `coup`
--
ALTER TABLE `coup`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=81;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
