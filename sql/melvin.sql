-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: mysql.ct8.pl
-- Generation Time: Jan 12, 2025 at 09:36 PM
-- Server version: 8.0.39
-- PHP Version: 8.1.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `m30328_gtoria`
--

-- --------------------------------------------------------

--
-- Table structure for table `admingc`
--

CREATE TABLE `admingc` (
  `id` int NOT NULL,
  `Message` longtext CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `creatorid` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Table structure for table `forum`
--

CREATE TABLE `forum` (
  `id` int NOT NULL,
  `Subject` varchar(255) NOT NULL,
  `Description` varchar(255) NOT NULL,
  `topic_id` varchar(255) NOT NULL,
  `creator_id` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Table structure for table `forum_topics`
--

CREATE TABLE `forum_topics` (
  `id` int NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `forum_topics`
--

INSERT INTO `forum_topics` (`id`, `name`) VALUES
(1, 'Discussion'),
(2, 'Off Topic'),
(3, 'Support');

-- --------------------------------------------------------

--
-- Table structure for table `games`
--

CREATE TABLE `games` (
  `id` int NOT NULL,
  `name` varchar(255) CHARACTER SET armscii8 COLLATE armscii8_bin NOT NULL,
  `description` varchar(1000) CHARACTER SET armscii8 COLLATE armscii8_bin NOT NULL,
  `thumbnail` longtext CHARACTER SET armscii8 COLLATE armscii8_bin NOT NULL,
  `slide1` varchar(1000) CHARACTER SET armscii8 COLLATE armscii8_bin NOT NULL,
  `slide2` varchar(1000) CHARACTER SET armscii8 COLLATE armscii8_bin NOT NULL,
  `slide3` varchar(1000) CHARACTER SET armscii8 COLLATE armscii8_bin NOT NULL,
  `slide4` varchar(1000) CHARACTER SET armscii8 COLLATE armscii8_bin NOT NULL,
  `slide5` varchar(1000) CHARACTER SET armscii8 COLLATE armscii8_bin NOT NULL,
  `slide6` varchar(1000) CHARACTER SET armscii8 COLLATE armscii8_bin NOT NULL,
  `slide7` varchar(1000) CHARACTER SET armscii8 COLLATE armscii8_bin NOT NULL,
  `slide8` varchar(1000) CHARACTER SET armscii8 COLLATE armscii8_bin NOT NULL,
  `slide9` varchar(1000) CHARACTER SET armscii8 COLLATE armscii8_bin NOT NULL,
  `slide10` varchar(1000) CHARACTER SET armscii8 COLLATE armscii8_bin NOT NULL,
  `players` int NOT NULL,
  `favorites` int NOT NULL,
  `creator_id` int NOT NULL,
  `ip` varchar(50) CHARACTER SET armscii8 COLLATE armscii8_bin NOT NULL DEFAULT '127.0.0.1',
  `port` varchar(5) CHARACTER SET armscii8 COLLATE armscii8_bin NOT NULL DEFAULT '53640',
  `type` varchar(100) CHARACTER SET armscii8 COLLATE armscii8_bin NOT NULL DEFAULT 'client',
  `visits` varchar(9999) CHARACTER SET armscii8 COLLATE armscii8_bin NOT NULL,
  `datecreated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `protection` varchar(255) CHARACTER SET armscii8 COLLATE armscii8_bin NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=armscii8 COLLATE=armscii8_bin;

-- --------------------------------------------------------

--
-- Table structure for table `global`
--

CREATE TABLE `global` (
  `id` int NOT NULL,
  `ShowingSiteAlert1` varchar(255) NOT NULL,
  `SiteAlert1` varchar(255) NOT NULL,
  `SiteAlert1Color` varchar(255) NOT NULL,
  `ShowingSiteAlert2` varchar(255) NOT NULL,
  `SiteAlert2` varchar(255) NOT NULL,
  `SiteAlert2Color` varchar(255) NOT NULL,
  `ShowingSiteAlert3` varchar(255) NOT NULL,
  `SiteAlert3` varchar(255) NOT NULL,
  `SiteAlert3Color` varchar(255) NOT NULL,
  `ShowingSiteAlert4` varchar(255) NOT NULL,
  `SiteAlert4` varchar(255) NOT NULL,
  `SiteAlert4Color` varchar(255) NOT NULL,
  `ShowingSiteAlert5` varchar(255) NOT NULL,
  `SiteAlert5` varchar(255) NOT NULL,
  `SiteAlert5Color` varchar(255) NOT NULL,
  `maintenanceEnabled` varchar(255) NOT NULL,
  `maintenance` varchar(255) NOT NULL,
  `shutdownEnabled` varchar(255) NOT NULL,
  `shutdown` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `global`
--

INSERT INTO `global` (`id`, `ShowingSiteAlert1`, `SiteAlert1`, `SiteAlert1Color`, `ShowingSiteAlert2`, `SiteAlert2`, `SiteAlert2Color`, `ShowingSiteAlert3`, `SiteAlert3`, `SiteAlert3Color`, `ShowingSiteAlert4`, `SiteAlert4`, `SiteAlert4Color`, `ShowingSiteAlert5`, `SiteAlert5`, `SiteAlert5Color`, `maintenanceEnabled`, `maintenance`, `shutdownEnabled`, `shutdown`) VALUES
(1, 'no', 'ability to change profile pictures will be implemented soon *yippee!*', '', 'no', 'guys logout and relogin i fixed stuff', '', 'no', 'sql injections are being patched currently, so is XSS', '', 'no', 'same', '', 'no', 'سأقوم بضرب البرج الشمالي', '', 'no', '', 'no', 'no');

-- --------------------------------------------------------

--
-- Table structure for table `groups`
--

CREATE TABLE `groups` (
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Table structure for table `replies`
--

CREATE TABLE `replies` (
  `id` int NOT NULL,
  `reply` varchar(255) NOT NULL,
  `creator_id` longtext NOT NULL,
  `post_id` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Table structure for table `templates`
--

CREATE TABLE `templates` (
  `id` int NOT NULL,
  `name` varchar(255) CHARACTER SET armscii8 COLLATE armscii8_bin NOT NULL,
  `description` varchar(1000) CHARACTER SET armscii8 COLLATE armscii8_bin NOT NULL,
  `thumbnail` longtext CHARACTER SET armscii8 COLLATE armscii8_bin NOT NULL,
  `slide1` varchar(1000) CHARACTER SET armscii8 COLLATE armscii8_bin NOT NULL,
  `slide2` varchar(1000) CHARACTER SET armscii8 COLLATE armscii8_bin NOT NULL,
  `slide3` varchar(1000) CHARACTER SET armscii8 COLLATE armscii8_bin NOT NULL,
  `slide4` varchar(1000) CHARACTER SET armscii8 COLLATE armscii8_bin NOT NULL,
  `slide5` varchar(1000) CHARACTER SET armscii8 COLLATE armscii8_bin NOT NULL,
  `slide6` varchar(1000) CHARACTER SET armscii8 COLLATE armscii8_bin NOT NULL,
  `slide7` varchar(1000) CHARACTER SET armscii8 COLLATE armscii8_bin NOT NULL,
  `slide8` varchar(1000) CHARACTER SET armscii8 COLLATE armscii8_bin NOT NULL,
  `slide9` varchar(1000) CHARACTER SET armscii8 COLLATE armscii8_bin NOT NULL,
  `slide10` varchar(1000) CHARACTER SET armscii8 COLLATE armscii8_bin NOT NULL,
  `players` int NOT NULL,
  `favorites` int NOT NULL,
  `creator_id` int NOT NULL,
  `ip` varchar(50) CHARACTER SET armscii8 COLLATE armscii8_bin NOT NULL DEFAULT '127.0.0.1',
  `port` varchar(5) CHARACTER SET armscii8 COLLATE armscii8_bin NOT NULL DEFAULT '53640',
  `type` varchar(100) CHARACTER SET armscii8 COLLATE armscii8_bin NOT NULL DEFAULT 'client',
  `visits` varchar(9999) CHARACTER SET armscii8 COLLATE armscii8_bin NOT NULL,
  `datecreated` date NOT NULL,
  `protection` varchar(255) CHARACTER SET armscii8 COLLATE armscii8_bin NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=armscii8 COLLATE=armscii8_bin;

-- --------------------------------------------------------

--
-- Table structure for table `user_form`
--

CREATE TABLE `user_form` (
  `id` int NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `user_type` varchar(255) NOT NULL DEFAULT 'user',
  `bantype` enum('None','Reminder','Warning','Ban','1daysban','3daysban','7daysban') NOT NULL,
  `banreason` varchar(255) NOT NULL,
  `reason` varchar(255) NOT NULL,
  `off` varchar(255) NOT NULL,
  `bandate` datetime NOT NULL,
  `unbantime` int NOT NULL,
  `ip` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admingc`
--
ALTER TABLE `admingc`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `forum`
--
ALTER TABLE `forum`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `forum_topics`
--
ALTER TABLE `forum_topics`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `games`
--
ALTER TABLE `games`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `global`
--
ALTER TABLE `global`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `replies`
--
ALTER TABLE `replies`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `templates`
--
ALTER TABLE `templates`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_form`
--
ALTER TABLE `user_form`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admingc`
--
ALTER TABLE `admingc`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `forum`
--
ALTER TABLE `forum`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `forum_topics`
--
ALTER TABLE `forum_topics`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `games`
--
ALTER TABLE `games`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `replies`
--
ALTER TABLE `replies`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `templates`
--
ALTER TABLE `templates`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user_form`
--
ALTER TABLE `user_form`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
