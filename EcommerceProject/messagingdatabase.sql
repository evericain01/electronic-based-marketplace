-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 26, 2021 at 05:40 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `messagingdatabase`
--
CREATE DATABASE IF NOT EXISTS `messagingdatabase` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `messagingdatabase`;

-- --------------------------------------------------------

--
-- Table structure for table `message`
--

DROP TABLE IF EXISTS `message`;
CREATE TABLE `message` (
  `message_id` int(11) NOT NULL,
  `sender` int(11) NOT NULL,
  `receiver` int(11) NOT NULL,
  `message` text NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `read_status` enum('unread','read','to reread') NOT NULL,
  `private_status` enum('public','private') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `message`
--

INSERT INTO `message` (`message_id`, `sender`, `receiver`, `message`, `timestamp`, `read_status`, `private_status`) VALUES
(2, 2, 1, 'Hi timmy, whats cookn\'?', '2021-03-25 16:14:55', 'read', 'private'),
(9, 2, 1, 'YO Timmy, SUP!', '2021-03-25 03:40:35', 'read', 'public'),
(13, 1, 2, 'Hey, Jonny its timmyyyyyyy', '2021-03-25 18:29:37', 'to reread', 'private');

-- --------------------------------------------------------

--
-- Table structure for table `picture`
--

DROP TABLE IF EXISTS `picture`;
CREATE TABLE `picture` (
  `picture_id` int(11) NOT NULL,
  `profile_id` int(11) NOT NULL,
  `filename` varchar(64) NOT NULL,
  `caption` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `picture`
--

INSERT INTO `picture` (`picture_id`, `profile_id`, `filename`, `caption`) VALUES
(15, 2, '605c00ca71cdc.jpg', 'Jesse! Its time to cook!'),
(16, 1, '605c042d89dfe.jpg', 'Israel Adesanya, The Middleweight Champ!'),
(18, 1, '605c05c0e5493.jpg', 'This is a picture of pepe'),
(19, 1, '605cb37c1869f.jpg', 'pic of vanier!!!');

-- --------------------------------------------------------

--
-- Table structure for table `picture_like`
--

DROP TABLE IF EXISTS `picture_like`;
CREATE TABLE `picture_like` (
  `picture_id` int(11) NOT NULL,
  `profile_id` int(11) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp(),
  `read_status` enum('seen','unseen') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `picture_like`
--

INSERT INTO `picture_like` (`picture_id`, `profile_id`, `timestamp`, `read_status`) VALUES
(18, 2, '2021-03-25 04:24:03', 'seen'),
(16, 2, '2021-03-25 04:26:04', 'seen'),
(15, 1, '2021-03-25 18:15:15', 'seen');

-- --------------------------------------------------------

--
-- Table structure for table `profile`
--

DROP TABLE IF EXISTS `profile`;
CREATE TABLE `profile` (
  `profile_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `first_name` varchar(64) NOT NULL,
  `middle_name` varchar(64) NOT NULL,
  `last_name` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `profile`
--

INSERT INTO `profile` (`profile_id`, `user_id`, `first_name`, `middle_name`, `last_name`) VALUES
(1, 7, 'Timmy', 'Oli', 'Williams'),
(2, 8, 'Jonathan', 'Theodore', 'Griffin'),
(4, 33, 'Authenticate ', 'Aut', 'Ticate');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `username` varchar(64) NOT NULL,
  `password_hash` varchar(255) NOT NULL,
  `secret_key` varchar(16) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `username`, `password_hash`, `secret_key`) VALUES
(7, 'timmy203', '$2y$10$KdG1VcLgGczGyNViiyseSORYkejyMbrUW8KJ3KaYZeF21kHlNP.P2', NULL),
(8, 'johnny', '$2y$10$V5z4sXolr3jrtELTGTIVg.YM55MDBSAEissx0NR8nPAmM7IIuNxCy', NULL),
(33, '2fasetup', '$2y$10$apZpu.Y7wfJadjjD0aNQuOsR63xMA3iynWtDTP9LArcFDxPHmq8be', 'JIZXTR24ZDBWLRI2');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `message`
--
ALTER TABLE `message`
  ADD PRIMARY KEY (`message_id`),
  ADD KEY `sender_FK` (`sender`),
  ADD KEY `receiver_FK` (`receiver`);

--
-- Indexes for table `picture`
--
ALTER TABLE `picture`
  ADD PRIMARY KEY (`picture_id`),
  ADD KEY `profile_FK` (`profile_id`);

--
-- Indexes for table `picture_like`
--
ALTER TABLE `picture_like`
  ADD KEY `picture_id` (`picture_id`),
  ADD KEY `profile_id` (`profile_id`);

--
-- Indexes for table `profile`
--
ALTER TABLE `profile`
  ADD PRIMARY KEY (`profile_id`),
  ADD KEY `user_id_FK` (`user_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `message`
--
ALTER TABLE `message`
  MODIFY `message_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `picture`
--
ALTER TABLE `picture`
  MODIFY `picture_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `profile`
--
ALTER TABLE `profile`
  MODIFY `profile_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `message`
--
ALTER TABLE `message`
  ADD CONSTRAINT `receiver_FK` FOREIGN KEY (`receiver`) REFERENCES `profile` (`profile_id`),
  ADD CONSTRAINT `sender_FK` FOREIGN KEY (`sender`) REFERENCES `profile` (`profile_id`);

--
-- Constraints for table `picture`
--
ALTER TABLE `picture`
  ADD CONSTRAINT `profile_FK` FOREIGN KEY (`profile_id`) REFERENCES `profile` (`profile_id`);

--
-- Constraints for table `picture_like`
--
ALTER TABLE `picture_like`
  ADD CONSTRAINT `picture_id` FOREIGN KEY (`picture_id`) REFERENCES `picture` (`picture_id`),
  ADD CONSTRAINT `profile_id` FOREIGN KEY (`profile_id`) REFERENCES `profile` (`profile_id`);

--
-- Constraints for table `profile`
--
ALTER TABLE `profile`
  ADD CONSTRAINT `user_id_FK` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
