-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 08, 2022 at 02:53 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `php_login_register`
--

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(9) NOT NULL,
  `Email` varchar(255) NOT NULL,
  `Username` varchar(255) NOT NULL,
  `Password` varchar(255) NOT NULL,
  `datetime` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `Email`, `Username`, `Password`, `datetime`) VALUES
(1, 'jibbs@gmail.com', 'jibbs001', '$2y$10$ExrYaFkSHDMrUzloqRUhLuOMGidDyAC4/d1fFePV1hkoFLS3zGoZu', 'March-18-2022 01:27:PM'),
(2, 'eva@gmail.com', 'eva101', '$2y$10$kk477GZhdka/uVNnz1YvneQHiKkCPc0.swZAYu8RevWe59fptZJ7.', 'March-18-2022 01:29:PM'),
(3, 'ken@gmail.com', 'ken007', '$2y$10$WSaArX1DpOw1iJWTu0Rew.i90KdcKLzPYHYCJTODluQuQMxWIF6Di', 'March-18-2022 01:29:PM'),
(4, 'Yousef@gmail.com', 'yousef001', '$2y$10$tL2dNbgHNSgOHmkc8bRjoOXIdbc5T3fcXvtTCtKLDxQqGM6l/na6u', 'April-05-2022 04:01:PM'),
(5, 'cindy@gmail.com', 'cindodo', '$2y$10$BqLsV7ZU/rOyquqUsEJjleAwB0NY8faeWdqUjVkcQaJmJDvaHYfGS', 'April-05-2022 10:06:PM'),
(6, 'maria@gmail.com', 'maria001', '$2y$10$/dLkeK7W0kRAPX6l8tdesOVGlCpssj2gVfO2dOfHefbAg5W55ni6a', 'April-05-2022 10:57:PM');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
