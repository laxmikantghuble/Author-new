-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 26, 2020 at 03:22 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.3.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `publication`
--

-- --------------------------------------------------------

--
-- Table structure for table `articals`
--

CREATE TABLE `articals` (
  `artical_id` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `tags` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `user_id` int(11) NOT NULL COMMENT 'foreign key which ref from users table',
  `articalimage` varchar(255) NOT NULL,
  `status` enum('1','0') NOT NULL COMMENT '1-active,0-inactive',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `articals`
--

INSERT INTO `articals` (`artical_id`, `title`, `tags`, `description`, `user_id`, `articalimage`, `status`, `created_at`) VALUES
(5, 'Water', 'Sea', 'In publishing and graphic design, Lorem ipsum is a placeholder text commonly used to demonstrate the visual form of a ', 14, 'img/uploads/article/surf.jpg', '1', '2020-06-25 19:04:59'),
(6, 'Desert title 44 55', 'Desert 334455', '33 44 55I 66n publishing and graphic design, Lorem ipsum is a placeholder text commonly used to demonstrate the visual form of a document or a typeface without relying on meaningful content.In publishing and ', 14, 'img/uploads/article/city.jpg', '1', '2020-06-25 19:56:01'),
(7, 'This is from Rishikesh Mane', 'Addict', 'Get the details from the pages itself', 13, 'img/uploads/article/tiger.jpg', '1', '2020-06-26 08:24:09');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` int(11) NOT NULL,
  `artical_id` int(11) NOT NULL COMMENT 'this is foreign key from articals table',
  `comment` varchar(255) NOT NULL,
  `user_id` int(11) NOT NULL COMMENT 'this is foreign key from users table',
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `artical_id`, `comment`, `user_id`, `created_at`) VALUES
(1, 7, 'This is good artical I have seen', 14, '2020-06-26 10:40:49'),
(2, 7, 'nice', 14, '2020-06-26 11:20:43');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `firstname` varchar(100) NOT NULL,
  `lastname` varchar(100) NOT NULL,
  `email` varchar(50) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `user_type` enum('1','2') NOT NULL COMMENT '1- end user, 2 Author',
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `firstname`, `lastname`, `email`, `phone`, `username`, `password`, `user_type`, `created_at`) VALUES
(1, 'Laxmikant', 'Ghubde', 'laxmikantghuble@gmail.com', '9850563609', 'lax', '$2y$10$k684OP9GlmEMXzvb3J034e4xvUcVgOa.eQgCeD4p4RQiv2QdBNx/e', '1', '2020-06-24 23:24:27'),
(12, 'Raj', 'Pande', 'raj@gmail.com', '54755896952145', 'raj', '$2y$10$iIdJtHh83pnTNxs18axBv.MkS3qF4VgPOK4iRNcOvf5d/gna2kyYa', '1', '2020-06-25 04:40:41'),
(13, 'Rishi', 'mane', 'rishi@gmail.com', '56254154755', 'rishi', '$2y$10$1ZAK00D51h2XcdfB8xYJieWYrO1NmECt/1JP6EeFDE9jvMPkRvQh2', '2', '2020-06-25 12:00:56'),
(14, 'lax', 'ghuble', 'lax@gmail.com', '54785489655', 'laxmikant', '$2y$10$k684OP9GlmEMXzvb3J034e4xvUcVgOa.eQgCeD4p4RQiv2QdBNx/e', '2', '2020-06-25 13:29:47');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `articals`
--
ALTER TABLE `articals`
  ADD PRIMARY KEY (`artical_id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `articals`
--
ALTER TABLE `articals`
  MODIFY `artical_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
