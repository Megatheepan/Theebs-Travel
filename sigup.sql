-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Apr 25, 2025 at 09:51 AM
-- Server version: 9.1.0
-- PHP Version: 8.3.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sigup`
--

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

DROP TABLE IF EXISTS `contacts`;
CREATE TABLE IF NOT EXISTS `contacts` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `mobile` varchar(20) NOT NULL,
  `message` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `contacts`
--

INSERT INTO `contacts` (`id`, `name`, `email`, `mobile`, `message`) VALUES
(1, 'Theepan AK', 'theepanak4@gmail.com', '0769290116', 'hiii'),
(2, 'MegaTheepan AK', 'theepanak43@gmail.com', '0769290116', 'hii this good '),
(3, 'TheepanTheepan', 'e2320035@bit.uom.lk', '0778987765', 'hiiiii');

-- --------------------------------------------------------

--
-- Table structure for table `theepan`
--

DROP TABLE IF EXISTS `theepan`;
CREATE TABLE IF NOT EXISTS `theepan` (
  `name` varchar(250) NOT NULL,
  `email` varchar(250) NOT NULL,
  `password` varchar(250) NOT NULL,
  UNIQUE KEY `name` (`name`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `theepan`
--

INSERT INTO `theepan` (`name`, `email`, `password`) VALUES
('TheepantheepanAK', 'theepanak434@gmail.com', '$2y$10$6psVueEeBJq4oFsP6er75uwIeXtichsBoDEb3aPMY7p8CXA8JIyIa'),
('Theepan AK', 'theepanak4@gmail.com', '$2y$10$WWN0S8ajjcCY./HSmZ9QKOjv7bKWMArJU8Q8hZ2xTO9BxSDbXGpo.'),
('Theepantheepan2AK', 'theepanak45@gmail.com', '$2y$10$7uRv7Ll.b8WBoHMyHY/xS.hIZ5VrDAwfImbbWgf7ZWALoTjKul3cq'),
('MegaTheepan AK', 'theepanak47@gmail.com', '$2y$10$MZRGRBJD1UWOlwQmB09EeurQ.vZSraUIrenOH8j2weEBIlUv/P0HG'),
('Kinthusan', 'kinthusan@gmail.com', '$2y$10$Y0vfLstLBzhJzJ1LKQkUauONxkWK/P0viub4begqpA1ZZzsx4UoKW'),
('', '', '$2y$10$rmQjXU3qVRt.FqlQHsTlf.jQ7k.bJ68I32pQeU6oWyFJrqaoCAlAS');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
