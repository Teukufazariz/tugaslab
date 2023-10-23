-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 22, 2023 at 04:09 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `todolist`
--

-- --------------------------------------------------------

--
-- Table structure for table `datauser`
--

CREATE TABLE `datauser` (
  `user_id` int(11) NOT NULL,
  `namadepan` varchar(255) NOT NULL,
  `namabelakang` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `tanggal` date NOT NULL,
  `gender` enum('lakilaki','perempuan') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `datauser`
--

INSERT INTO `datauser` (`user_id`, `namadepan`, `namabelakang`, `username`, `password`, `tanggal`, `gender`) VALUES
(4, 'Teuku', 'Fazariz B.', 'teukufazariz', '$2y$10$wrl716gIh.UgWGScRazBM./Fcr9VUcqkJshcr3B95HJqFe/7gTyFK', '2005-01-16', 'lakilaki'),
(5, 'Senator', 'Armstrong', 'senatorkeren', '$2y$10$lcVE3mNCZSMEUMGWQLyvweWPr8KhDVB/uXpbpYFtjlIMcZoXPJIMW', '1973-04-26', 'lakilaki');

-- --------------------------------------------------------

--
-- Table structure for table `tasks`
--

CREATE TABLE `tasks` (
  `taskid` int(11) NOT NULL,
  `tasklabel` varchar(50) NOT NULL,
  `task_desc` varchar(255) NOT NULL,
  `task_deadline` datetime NOT NULL,
  `taskstatus` enum('open','close') NOT NULL,
  `createdat` timestamp NOT NULL DEFAULT current_timestamp(),
  `user_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tasks`
--

INSERT INTO `tasks` (`taskid`, `tasklabel`, `task_desc`, `task_deadline`, `taskstatus`, `createdat`, `user_id`) VALUES
(17, 'yeehaw', 'yeehaw', '2023-10-27 20:50:00', 'open', '2023-10-22 13:50:16', NULL),
(18, 'YESSSS', 'YESSSS', '2023-10-30 07:00:00', 'open', '2023-10-22 14:08:42', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `datauser`
--
ALTER TABLE `datauser`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `tasks`
--
ALTER TABLE `tasks`
  ADD PRIMARY KEY (`taskid`),
  ADD KEY `user_id` (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `datauser`
--
ALTER TABLE `datauser`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tasks`
--
ALTER TABLE `tasks`
  MODIFY `taskid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tasks`
--
ALTER TABLE `tasks`
  ADD CONSTRAINT `tasks_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `datauser` (`user_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
