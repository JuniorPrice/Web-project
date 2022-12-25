-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 25, 2022 at 08:24 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sunsethotel`
--

-- --------------------------------------------------------

--
-- Table structure for table `reservation`
--

CREATE TABLE `reservation` (
  `clientid` int(10) NOT NULL,
  `clientname` varchar(30) NOT NULL,
  `roomnum` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `room`
--

CREATE TABLE `room` (
  `room_number` int(4) NOT NULL,
  `num_of_beds` int(2) NOT NULL,
  `price` int(3) NOT NULL,
  `description` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `room`
--

INSERT INTO `room` (`room_number`, `num_of_beds`, `price`, `description`) VALUES
(1, 2, 13, 'DESCRIPTION...'),
(2, 1, 10, 'DESCRIPTION...'),
(3, 1, 12, 'DESCRIPTION...'),
(4, 2, 20, 'DESCRIPTION...'),
(5, 3, 24, 'DESCRIPTION...'),
(6, 3, 28, 'DESCRIPTION...'),
(7, 4, 35, 'DESCRIPTION...'),
(8, 3, 30, 'DESCRIPTION...'),
(9, 2, 26, 'DESCRIPTION...'),
(10, 1, 17, 'DESCRIPTION...'),
(11, 4, 40, 'DESCRIPTION...'),
(12, 2, 30, 'DESCRIPTION...');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) NOT NULL,
  `name` varchar(40) NOT NULL,
  `username` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `username`, `email`, `password`) VALUES
(1, 'Ya\'rab Mohammed Al-mamri', 'yarab', 'yarab@gmail.com', 'y998877'),
(2, 'Mohammed Al-kasbi', 'mohammed', 'mohammed@gmail.com', 'm998877'),
(3, 'Khalid al-shihi', 'khalid', 'khalid@gmail.com', 'k998877'),
(4, 'Ali Al-salmi', 'ali', 'ali@gmail.com', 'a998877'),
(5, 'Ahmed said al-hosni', 'ahmed', 'ahmed@gmail.com', 'aa998877'),
(6, 'Gamal al-kindi', 'gamal', 'gamal@gmail.com', 'g998877'),
(7, 'Faisal al-saadi', 'faisal', 'faisal@gmail.com', 'f998877'),
(8, 'Bader al alawi', 'bader', 'bader__gmail.com', 'b998877'),
(9, 'Salim al maawli', 'salim', 'salim@gmail.com', 's998877'),
(17, 'Walee&#039;d jasem Al malki', 'waleed', 'waleed@gmail.com', 'w998877');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `room`
--
ALTER TABLE `room`
  ADD PRIMARY KEY (`room_number`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`),
  ADD KEY `id_2` (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `room`
--
ALTER TABLE `room`
  MODIFY `room_number` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
