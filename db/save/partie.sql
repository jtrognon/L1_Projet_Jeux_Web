-- phpMyAdmin SQL Dump
-- version 5.0.4deb2+deb11u1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Mar 20, 2024 at 10:29 AM
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
-- Table structure for table `partie`
--

CREATE TABLE `partie` (
  `id` int(11) NOT NULL,
  `blanc` varchar(100) NOT NULL,
  `noir` varchar(100) NOT NULL,
  `rb` tinyint(1) NOT NULL,
  `rn` tinyint(1) NOT NULL,
  `annee` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `partie`
--

INSERT INTO `partie` (`id`, `blanc`, `noir`, `rb`, `rn`, `annee`) VALUES
(1, 'Deep Blue', 'Kasparov', 1, 0, 1996),
(2, 'Kasparov', 'Deep Blue', 1, 0, 1996),
(3, 'Deep Blue', 'Kasparov', 1, 1, 1996),
(4, 'Kasparov', 'Deep Blue', 1, 1, 1996),
(5, 'Deep Blue', 'Kasparov', 0, 1, 1996),
(6, 'Kasparov', 'Deep Blue', 1, 0, 1996),
(7, 'Duda', 'Nakamura', 1, 1, 2024);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `partie`
--
ALTER TABLE `partie`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `partie`
--
ALTER TABLE `partie`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
