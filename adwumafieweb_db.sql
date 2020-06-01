-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 01, 2020 at 12:52 PM
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
-- Database: `adwumafieweb_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `email` varchar(200) NOT NULL,
  `name` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `bid`
--

CREATE TABLE `bid` (
  `id` int(11) NOT NULL,
  `job_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `price` double(10,2) DEFAULT NULL,
  `deadline` varchar(255) DEFAULT NULL,
  `proposal` text NOT NULL,
  `accepted` tinyint(1) NOT NULL DEFAULT 0,
  `closed` tinyint(1) DEFAULT 0,
  `created` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `bid`
--

INSERT INTO `bid` (`id`, `job_id`, `user_id`, `price`, `deadline`, `proposal`, `accepted`, `closed`, `created`) VALUES
(4, 9, 16, 23.00, '', 'iotueroiutjlkjielrjt', 0, 0, '2020-05-19 04:21:23'),
(5, 10, 16, 90.00, '', 'hjhdfjkghjfghjkhjkhsjhjkhjghjhgjhgjkhjghjhg', 1, 0, '2020-05-23 12:33:04'),
(6, 13, 19, 300.00, '', 'jlksjkdjfjsdhfkjdhfsjkdhfdjkshfkjhsdkjf', 0, 0, '2020-05-28 11:30:24'),
(7, 11, 19, 343.00, '5 days', 'ajsdgjksgadjgasjgdjsgjdasgd', 0, 0, '2020-05-28 13:16:09'),
(8, 13, 24, 345.00, '5 days', 'you send, the better I am able to transform it into something you will love. Dark or pixelated photos will be difficult to create from so please try to include the highest quality you can. All art packages are high quality vector art in', 0, 0, '2020-05-28 13:25:33');

-- --------------------------------------------------------

--
-- Table structure for table `bid2`
--

CREATE TABLE `bid2` (
  `id` int(11) NOT NULL,
  `job_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `price` int(11) DEFAULT NULL,
  `deadline` varchar(255) DEFAULT NULL,
  `proposal` text NOT NULL,
  `accepted` tinyint(1) NOT NULL DEFAULT 0,
  `closed` tinyint(1) DEFAULT 0,
  `created` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `name`) VALUES
(1, 'Web Development'),
(2, 'Web Design');

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `id` int(11) NOT NULL,
  `bid_id` int(11) NOT NULL,
  `client_rate` tinyint(1) DEFAULT NULL COMMENT 'Rate for client posted by contractor',
  `client_feedback` text DEFAULT NULL COMMENT 'Feedback for client posted by contractor',
  `contractor_rate` tinyint(1) DEFAULT NULL COMMENT 'Rate for contractor posted by client',
  `contractor_feedback` text DEFAULT NULL COMMENT 'Feedback for contractor posted by client'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`id`, `bid_id`, `client_rate`, `client_feedback`, `contractor_rate`, `contractor_feedback`) VALUES
(1, 1, 5, 'Great client - highly recommended.', 3, 'Awesome dev, highly recommended.');

-- --------------------------------------------------------

--
-- Table structure for table `job`
--

CREATE TABLE `job` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `budget` double(10,2) DEFAULT NULL,
  `type` enum('fixed','hourly') NOT NULL DEFAULT 'fixed',
  `expertize_level` enum('beginner','intermediate','expert') DEFAULT 'beginner',
  `created` timestamp NOT NULL DEFAULT current_timestamp(),
  `category_id` int(11) NOT NULL,
  `author_id` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `job`
--

INSERT INTO `job` (`id`, `title`, `description`, `budget`, `type`, `expertize_level`, `created`, `category_id`, `author_id`) VALUES
(10, 'Bootsatrap', 'jjksfjkjhgskfjgkgf', 100.00, 'fixed', 'beginner', '2020-05-23 12:31:46', 1, 18),
(11, 'Bootsatrapwewe', 'ewewewe', 787.00, 'fixed', 'expert', '2020-05-28 05:40:54', 2, 23),
(12, 'build me a website', 'I need a decent blog website that will be able to support media player and download', 187.00, 'hourly', 'intermediate', '2020-05-28 10:53:15', 2, 23),
(13, 'create a newspaper website', 'I am available to re-create your photo into cartoon vector artwork. This artwork is perfect for announcements, birthdays, graduations etc. Imagine a cartoon vector illustration for a banner or celebration cake?\r\n\r\nThe better the quality of the photo you send, the better I am able to transform it into something you will love. Dark or pixelated photos will be difficult to create from so please try to include the highest quality you can. All art packages are high quality vector art in 5000 x 5000 pixel (300 dpi)', 400.00, 'fixed', 'expert', '2020-05-28 11:02:56', 2, 23),
(14, 'I want Robot for take copy datas from Site A and write SQL for dump', 'I want a basic robot with basic management page.\r\nWhat need?\r\nWant robot for bazar.bg websites web scraping. Surf to bazaar.bg website and copy (download) some datas from site pages and build a SQL for my script. And i dump this sql file.\r\n\r\nOnly i want page for eample at bazar.bg category \"ABC\" is for my site \"XYZ\" i want select categories and show my site categories target. ofcourse first i run roboto script and first check categories and show dynamic and every founded bazar.bg categories i select which target at my website.\r\n\r\nAnd if possible every downloaded images have site self watermark (web scraping). I give my watermark image get paste everydownloaded image my watermark image.\r\n\r\nI share all files etc after who hired , budget low\r\nSkills Required\r\nPHP\r\nWebsite Design\r\nSQL\r\nCodeigniter\r\nMySQL', 20.00, 'fixed', 'intermediate', '2020-05-29 06:21:52', 2, 23);

-- --------------------------------------------------------

--
-- Table structure for table `job2`
--

CREATE TABLE `job2` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `budget` double(10,2) DEFAULT NULL,
  `type` enum('fixed','hourly') NOT NULL DEFAULT 'fixed',
  `expertize_level` enum('beginner','intermediate','expert') DEFAULT 'beginner',
  `created` timestamp NOT NULL DEFAULT current_timestamp(),
  `category_id` int(11) NOT NULL,
  `author_id` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `message`
--

CREATE TABLE `message` (
  `id` int(11) NOT NULL,
  `sender_id` int(11) NOT NULL,
  `receiver_id` int(11) NOT NULL,
  `text` text NOT NULL,
  `created` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `message`
--

INSERT INTO `message` (`id`, `sender_id`, `receiver_id`, `text`, `created`) VALUES
(6, 18, 16, 'can you do this work', '2020-05-23 12:33:46'),
(7, 16, 18, 'yes I can do it', '2020-05-23 12:34:21'),
(8, 23, 19, 'hey suraj are u sure u can do the work', '2020-05-28 11:31:34'),
(9, 23, 19, 'hyy', '2020-05-28 13:03:54'),
(10, 23, 19, 'can u reduce the price', '2020-05-28 13:17:55'),
(11, 29, 31, 'hello boss', '2020-05-31 20:11:02'),
(12, 31, 29, 'how are you doing', '2020-05-31 20:19:21'),
(13, 31, 29, 'how may I help you pls', '2020-05-31 20:20:43'),
(14, 31, 29, 'hello akjdkljas', '2020-05-31 20:48:32'),
(15, 31, 29, 'yh', '2020-05-31 21:19:47'),
(16, 29, 31, 'hy', '2020-06-01 01:52:06'),
(17, 29, 31, 'hy', '2020-06-01 01:52:26'),
(18, 29, 31, 'helooo', '2020-06-01 01:52:36');

-- --------------------------------------------------------

--
-- Table structure for table `portfolio`
--

CREATE TABLE `portfolio` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `link` varchar(255) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `created` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `portfolio`
--

INSERT INTO `portfolio` (`id`, `title`, `description`, `link`, `image`, `created`, `user_id`) VALUES
(1, 'kljfjsdjfkljsd', 'dslkjflkjskjf', 'sdlfjdskjflkjkds', NULL, '2020-06-01 05:24:12', 0),
(2, 'lsjfslfjdsf', 'sd;fkd;skflksd;lkf', 'dfs;f;sdkf;lkfs;lk', NULL, '2020-06-01 05:25:47', 29);

-- --------------------------------------------------------

--
-- Table structure for table `profile`
--

CREATE TABLE `profile` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `biography` text DEFAULT NULL,
  `linkedin` varchar(255) DEFAULT NULL,
  `location` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `profile`
--

INSERT INTO `profile` (`id`, `user_id`, `biography`, `linkedin`, `location`) VALUES
(11, 15, 'kljlj;kljljfd', '', 'Ghana'),
(12, 18, 'hjkfhkjhfkjhsjf', 'hjhjfh', 'yueyuyruyr'),
(13, 23, 'fdskhflkshfh', 'hjjksjdgjg', 'fdksfkf');

-- --------------------------------------------------------

--
-- Table structure for table `schema_version`
--

CREATE TABLE `schema_version` (
  `version_rank` int(11) NOT NULL,
  `installed_rank` int(11) NOT NULL,
  `version` varchar(50) NOT NULL,
  `description` varchar(200) NOT NULL,
  `type` varchar(20) NOT NULL,
  `script` varchar(1000) NOT NULL,
  `checksum` int(11) DEFAULT NULL,
  `installed_by` varchar(100) NOT NULL,
  `installed_on` timestamp NOT NULL DEFAULT current_timestamp(),
  `execution_time` int(11) NOT NULL,
  `success` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(200) NOT NULL,
  `password` varchar(255) DEFAULT NULL,
  `created` timestamp NULL DEFAULT current_timestamp(),
  `role` varchar(20) NOT NULL,
  `activation_code` varchar(30) NOT NULL,
  `is_verified` int(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `first_name`, `last_name`, `password`, `created`, `role`, `activation_code`, `is_verified`) VALUES
(29, 'test1@gmail.com', 'test', 'One', '$2y$10$XEwoWPF/D4AEBVcL92hFx.e4rpLvxaP3C1h0MsKeFjOUa618B/sgu', '2020-05-31 09:30:10', 'freelancer', '200575', 1),
(30, 'test2@gmail.com', 'test', 'two', '$2y$10$7kIQPT7iTJ1LqQaa2h/VEeC3bV9WBAIY1Nrb926J6/V37TdvXI8gu', '2020-05-31 10:03:29', 'freelancer', '219785', 1),
(31, 'test3@gmail.com', 'test', 'three', '$2y$10$k.75l8gRU0N6QGuUEjsXN.dJYF.BRBUMVyG8HNVdTDAmbP5VB5oBe', '2020-05-31 10:11:43', 'client', '63455', 1),
(32, 'test4@gmail.com', 'test', 'four', '$2y$10$XTX2gflgFeUiAoslJYeHDOgOCKn4nUWip2SUiZDvwCi08xlgKfIrW', '2020-05-31 10:13:43', 'client', '200655', 0),
(33, 'test5@gmail.com', 'test', 'five', '$2y$10$YlkOp4Fpv406tuOD//U9DuJF8RzvTmQ5WH2QOD/xa3b9icZQmOJUK', '2020-05-31 10:19:53', 'client', '190185', 0),
(34, 'test6@gmail.com', 'test6', 'Six', '$2y$10$W/V9kp6qS/KKvqEe4P4gNOa9.06lKG5Xstoq85.g/OSzYWdfXbLIy', '2020-06-01 09:27:06', 'client', '50405', 0),
(35, 'test7@gmail.com', 'test7', 'seven', '$2y$10$YDNymjMt.pherbYm4pMSseYRNxBFoN8agaT2XuNz2gCo3szVyXKGq', '2020-06-01 09:33:01', 'freelancer', '220085', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bid`
--
ALTER TABLE `bid`
  ADD PRIMARY KEY (`id`),
  ADD KEY `job_id` (`job_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `bid2`
--
ALTER TABLE `bid2`
  ADD PRIMARY KEY (`id`),
  ADD KEY `job_id` (`job_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`id`),
  ADD KEY `bid_id` (`bid_id`);

--
-- Indexes for table `job`
--
ALTER TABLE `job`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category_id` (`category_id`),
  ADD KEY `author_id` (`author_id`);

--
-- Indexes for table `job2`
--
ALTER TABLE `job2`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category_id` (`category_id`),
  ADD KEY `author_id` (`author_id`);

--
-- Indexes for table `message`
--
ALTER TABLE `message`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `portfolio`
--
ALTER TABLE `portfolio`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `profile`
--
ALTER TABLE `profile`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `schema_version`
--
ALTER TABLE `schema_version`
  ADD PRIMARY KEY (`version`),
  ADD KEY `schema_version_vr_idx` (`version_rank`),
  ADD KEY `schema_version_ir_idx` (`installed_rank`),
  ADD KEY `schema_version_s_idx` (`success`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `bid`
--
ALTER TABLE `bid`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `bid2`
--
ALTER TABLE `bid2`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `job`
--
ALTER TABLE `job`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `job2`
--
ALTER TABLE `job2`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `message`
--
ALTER TABLE `message`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `portfolio`
--
ALTER TABLE `portfolio`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `profile`
--
ALTER TABLE `profile`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `bid`
--
ALTER TABLE `bid`
  ADD CONSTRAINT `bid_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `bid_ibfk_2` FOREIGN KEY (`job_id`) REFERENCES `job` (`id`);

--
-- Constraints for table `job`
--
ALTER TABLE `job`
  ADD CONSTRAINT `job_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `category` (`id`),
  ADD CONSTRAINT `job_ibfk_2` FOREIGN KEY (`author_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `profile`
--
ALTER TABLE `profile`
  ADD CONSTRAINT `profile_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
