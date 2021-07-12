-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 12, 2021 at 07:54 AM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 8.0.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `anypost`
--
CREATE DATABASE IF NOT EXISTS `anypost` DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci;
USE `anypost`;

-- --------------------------------------------------------

--
-- Table structure for table `message`
--

CREATE TABLE `message` (
  `id` int(11) NOT NULL,
  `user` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `message` text COLLATE utf8_unicode_ci NOT NULL,
  `time` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `message`
--

INSERT INTO `message` (`id`, `user`, `message`, `time`) VALUES
(10, 'Abhishek', 'Did you know the mascot of php is a big Blue Elephant.', '2021-03-21 14:48:27'),
(11, 'Abhishek', 'I accidentally committed the wrong files to Git, but didn\'t push the commit to the server yet.\r\nHow can I undo those commits from the local repository?', '2021-03-21 15:00:30'),
(12, 'Ankit', 'Which is currently the best laptop in market?', '2021-03-21 15:08:43');

-- --------------------------------------------------------

--
-- Table structure for table `replies`
--

CREATE TABLE `replies` (
  `id` int(11) NOT NULL,
  `msgid` int(11) NOT NULL,
  `user` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `reply` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `replies`
--

INSERT INTO `replies` (`id`, `msgid`, `user`, `reply`) VALUES
(38, 10, 'Ankit', 'Once upon a time, there was a lovely language called HTML, which was so simple that writing websites with it was very easy. But some people were not happy and here we are.'),
(42, 11, 'Shashank', 'option 1: git reset --hard\noption 2: git reset\noption 3: git reset --soft'),
(44, 10, 'Shashank', 'The first computer bug was an actual bug. A moth, to be precise. And now we have debugging jobs. :)'),
(75, 12, 'Amar', '1. ASUS ZENBOOK PRO DUO\n2. HP SPECTRE X360 13\n3. ASUS ZENBOOK PRO\n4. LENOVO IDEAPAD C340\n5. DELL XPS 15\n6. ASUS ZENBOOK 14 (UM431)\n7. LENOVO IDEAPAD S540\n8. ASUS TUF GAMING FX505DT\n9. LENOVO THINKPAD X1 EXTREME\n10. ASUS VIVOBOOK X403'),
(89, 11, 'Amar', '$ git commit -m \\\"Something terribly misguided\\\" # (0: Your Accident) \n$ git reset HEAD~ # (1) [ edit files as necessary ] # (2)\n$ git add . # (3) \n$ git commit -c ORIG_HEAD # (4)');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `uname` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `fname` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `lname` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `pwd` varchar(100) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`uname`, `fname`, `lname`, `email`, `pwd`) VALUES
('Abhishek', 'Abhishek', 'Kumar', 'abhishek@gmail.com', '$2y$10$3qNXxq5WuZPf6tBIElvJ2uTJPzGsC2GxdgQEj.0fmulxtcb8fJEHu'),
('Amar', 'Amar', 'Sinha', 'amar@reiffmail.com', '$2y$10$r5b.FsZrRuv0EcmptrCJpuclxjyzD1l31rJCOob1ZJGZKLcX/Tgsy'),
('Ankit', 'Ankit', 'Pathak', 'ankit@yahoo.com', '$2y$10$BuAzUrnjcGW9ZFVmOze8kelsGNxdX4NnukoF37OPPfTmXA50tjSfG'),
('Shashank', 'Shashank', 'Sharma', 'shashank@hotmail.com', '$2y$10$.DXBRHMCueIyN5c3b37dkO4DoJrZWBGgzEe8dG.75H4XK67eJe6XG');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `message`
--
ALTER TABLE `message`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `replies`
--
ALTER TABLE `replies`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`uname`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `message`
--
ALTER TABLE `message`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `replies`
--
ALTER TABLE `replies`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=93;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
