-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 23, 2022 at 02:01 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `facebook_pnc`
--

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` int(11) NOT NULL,
  `content` varchar(250) NOT NULL,
  `user_id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `content`, `user_id`, `post_id`) VALUES
(41, 'SDFGBN', 10, 123);

-- --------------------------------------------------------

--
-- Stand-in structure for view `comment_post`
-- (See below for the actual view)
--
CREATE TABLE `comment_post` (
`comment_id` int(11)
,`post_id` int(11)
,`comment` varchar(250)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `data_users`
-- (See below for the actual view)
--
CREATE TABLE `data_users` (
`user_id` int(11)
,`logined` tinyint(1)
,`post_id` int(11)
,`first_name` varchar(100)
,`last_name` varchar(100)
,`file_img` char(150)
,`description` varchar(250)
,`current_time` timestamp
);

-- --------------------------------------------------------

--
-- Table structure for table `friendship`
--

CREATE TABLE `friendship` (
  `user_request_id` int(11) DEFAULT NULL,
  `user_accept_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `likes`
--

CREATE TABLE `likes` (
  `post_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `likes`
--

INSERT INTO `likes` (`post_id`, `user_id`) VALUES
(123, 10),
(123, 10),
(123, 10),
(123, 10),
(123, 10),
(123, 10);

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` int(11) NOT NULL,
  `title` varchar(200) DEFAULT NULL,
  `description` varchar(250) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `file_img` char(150) DEFAULT NULL,
  `post_date` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `title`, `description`, `user_id`, `file_img`, `post_date`) VALUES
(123, NULL, '', 10, 'IMG-623aa404663206.34435058.jpg', '2023-03-22 04:37:24'),
(125, NULL, '', 11, 'IMG-623b11b32592d2.08214320.png', '2023-03-22 00:25:23');

-- --------------------------------------------------------

--
-- Table structure for table `profiles`
--

CREATE TABLE `profiles` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `img` char(200) NOT NULL,
  `title` varchar(250) NOT NULL,
  `date_upload` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `first_name` varchar(100) DEFAULT NULL,
  `last_name` varchar(100) DEFAULT NULL,
  `gender` char(5) DEFAULT NULL,
  `email` varchar(200) DEFAULT NULL,
  `user_password` varchar(200) DEFAULT NULL,
  `birthday` date DEFAULT NULL,
  `image` char(150) DEFAULT NULL,
  `login` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `gender`, `email`, `user_password`, `birthday`, `image`, `login`) VALUES
(10, 'TIM', 'XAM', 'M', 'tim@gmail.com', 'c4ca4238a0b923820dcc509a6f75849b', '2022-03-28', 'IMG-623aa5c66da629.97443154.jpg', 0),
(11, 'Shaut', 'B', NULL, 'tim@gmail.com', 'b46664b842fb3c84da0674949f35e9ae', '2022-03-10', 'IMG-623b11fe0876a4.13882221.png', 1);

-- --------------------------------------------------------

--
-- Structure for view `comment_post`
--
DROP TABLE IF EXISTS `comment_post`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `comment_post`  AS SELECT `comments`.`id` AS `comment_id`, `comments`.`post_id` AS `post_id`, `comments`.`content` AS `comment` FROM ((`comments` join `posts` on(`posts`.`id` = `comments`.`post_id`)) join `users` on(`users`.`id` = `comments`.`user_id`)) ;

-- --------------------------------------------------------

--
-- Structure for view `data_users`
--
DROP TABLE IF EXISTS `data_users`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `data_users`  AS SELECT `users`.`id` AS `user_id`, `users`.`login` AS `logined`, `posts`.`id` AS `post_id`, `users`.`first_name` AS `first_name`, `users`.`last_name` AS `last_name`, `posts`.`file_img` AS `file_img`, `posts`.`description` AS `description`, `posts`.`post_date` AS `current_time` FROM (`users` left join `posts` on(`posts`.`user_id` = `users`.`id`)) ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `post_id` (`post_id`);

--
-- Indexes for table `friendship`
--
ALTER TABLE `friendship`
  ADD KEY `user_request_id` (`user_request_id`),
  ADD KEY `user_accept_id` (`user_accept_id`);

--
-- Indexes for table `likes`
--
ALTER TABLE `likes`
  ADD KEY `post_id` (`post_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `profiles`
--
ALTER TABLE `profiles`
  ADD PRIMARY KEY (`id`),
  ADD KEY `userID` (`user_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=126;

--
-- AUTO_INCREMENT for table `profiles`
--
ALTER TABLE `profiles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `post_id` FOREIGN KEY (`post_id`) REFERENCES `posts` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `user_id` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `friendship`
--
ALTER TABLE `friendship`
  ADD CONSTRAINT `friendship_ibfk_1` FOREIGN KEY (`user_request_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `friendship_ibfk_2` FOREIGN KEY (`user_accept_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `likes`
--
ALTER TABLE `likes`
  ADD CONSTRAINT `likes_ibfk_1` FOREIGN KEY (`post_id`) REFERENCES `posts` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `likes_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `posts`
--
ALTER TABLE `posts`
  ADD CONSTRAINT `posts_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `profiles`
--
ALTER TABLE `profiles`
  ADD CONSTRAINT `userID` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
