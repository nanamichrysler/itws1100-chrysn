-- phpMyAdmin SQL Dump
-- version 5.2.1deb3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Dec 01, 2025 at 08:00 PM
-- Server version: 10.11.13-MariaDB-0ubuntu0.24.04.1
-- PHP Version: 8.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `iit`
--
CREATE DATABASE IF NOT EXISTS `iit` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `iit`;

-- --------------------------------------------------------

--
-- Table structure for table `actors`
--

CREATE TABLE `actors` (
  `actorsid` int(10) UNSIGNED NOT NULL,
  `last_name` varchar(100) NOT NULL,
  `first_names` char(100) DEFAULT NULL,
  `dob` char(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `actors`
--

INSERT INTO `actors` (`actorsid`, `last_name`, `first_names`, `dob`) VALUES
(1, 'Cruise', 'Tom', '1962-07-03'),
(2, 'Lawrence', 'Jennifer', '1990-08-15'),
(3, 'Dempsey', 'Patrick', '1966-01-13'),
(4, 'Johansson', 'Scarlett', '1984-11-22'),
(5, 'Clooney', 'George', '1959-05-06');

-- --------------------------------------------------------

--
-- Table structure for table `movies`
--

CREATE TABLE `movies` (
  `movieid` int(10) UNSIGNED NOT NULL,
  `title` varchar(100) NOT NULL,
  `year` char(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `movies`
--

INSERT INTO `movies` (`movieid`, `title`, `year`) VALUES
(1, 'Elizabeth', '1998'),
(2, 'Black Widow', '2021'),
(3, 'Oh Brother Where Art Thou?', '2000'),
(4, 'The Lord of the Rings: The Fellowship of the Ring', '2001'),
(5, 'Up in the Air', '2009');

-- --------------------------------------------------------

--
-- Table structure for table `movies_actors`
--

CREATE TABLE `movies_actors` (
  `actorid` int(10) UNSIGNED NOT NULL,
  `movieid` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `movies_actors`
--

INSERT INTO `movies_actors` (`actorid`, `movieid`) VALUES
(2, 4),
(3, 5),
(5, 5);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `actors`
--
ALTER TABLE `actors`
  ADD PRIMARY KEY (`actorsid`);

--
-- Indexes for table `movies`
--
ALTER TABLE `movies`
  ADD PRIMARY KEY (`movieid`);

--
-- Indexes for table `movies_actors`
--
ALTER TABLE `movies_actors`
  ADD PRIMARY KEY (`actorid`,`movieid`),
  ADD KEY `movieid` (`movieid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `actors`
--
ALTER TABLE `actors`
  MODIFY `actorsid` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `movies`
--
ALTER TABLE `movies`
  MODIFY `movieid` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `movies_actors`
--
ALTER TABLE `movies_actors`
  ADD CONSTRAINT `movies_actors_ibfk_1` FOREIGN KEY (`actorid`) REFERENCES `actors` (`actorsid`),
  ADD CONSTRAINT `movies_actors_ibfk_2` FOREIGN KEY (`movieid`) REFERENCES `movies` (`movieid`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
