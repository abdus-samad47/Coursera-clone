-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 26, 2024 at 07:53 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `coursera_clone`
--

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE `courses` (
  `course_id` int(11) NOT NULL,
  `course_name` varchar(100) NOT NULL,
  `description` text DEFAULT NULL,
  `category_id` int(11) DEFAULT NULL,
  `fees` float DEFAULT NULL,
  `duration` int(11) DEFAULT NULL,
  `level` enum('beginer','intermediate','professional') DEFAULT NULL,
  `uni_image` varchar(255) DEFAULT NULL,
  `uni_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`course_id`, `course_name`, `description`, `category_id`, `fees`, `duration`, `level`, `uni_image`, `uni_id`) VALUES
(1, 'Introduction to Economics', 'This course provides an overview of basic economic principles.', 2, 100, 5, 'beginer', 'img/campus 1.png', 3),
(2, 'Introduction to Python', 'This course provides with basic concepts of programming in python.', 4, 75, 4, 'beginer', 'img/campus 2.png', 4),
(3, 'Introduction to Database', 'This course provides an overview of basic database operations.', 5, 65, 5, 'beginer', 'img/campus 3.png', 5),
(4, 'APIs In Web', 'This course provides a detailed concepts of API.', 4, 150, 8, 'intermediate', 'img/campus 5.png', 1);

-- --------------------------------------------------------

--
-- Table structure for table `course_category`
--

CREATE TABLE `course_category` (
  `category_id` int(11) NOT NULL,
  `category_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `course_category`
--

INSERT INTO `course_category` (`category_id`, `category_name`) VALUES
(1, 'Data Science'),
(2, 'Finance'),
(3, 'Web Development'),
(4, 'Python'),
(5, 'Data Base'),
(6, 'Artificial Intelligence');

-- --------------------------------------------------------

--
-- Table structure for table `enrollments`
--

CREATE TABLE `enrollments` (
  `enrollment_id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `course_id` int(11) DEFAULT NULL,
  `progress` varchar(255) DEFAULT NULL,
  `enrollment_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `enrollments`
--

INSERT INTO `enrollments` (`enrollment_id`, `user_id`, `course_id`, `progress`, `enrollment_date`) VALUES
(2, 4, 1, NULL, '2024-06-09'),
(4, 4, 2, NULL, '2024-06-09'),
(5, 4, 4, NULL, '2024-06-09'),
(6, 4, 3, NULL, '2024-06-10'),
(7, 7, 1, NULL, '2024-06-10'),
(8, 7, 2, NULL, '2024-06-10'),
(9, 7, 4, NULL, '2024-06-10'),
(10, 7, 3, NULL, '2024-06-10');

-- --------------------------------------------------------

--
-- Table structure for table `universities`
--

CREATE TABLE `universities` (
  `uni_id` int(11) NOT NULL,
  `uni_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `universities`
--

INSERT INTO `universities` (`uni_id`, `uni_name`) VALUES
(4, 'Arizona state University'),
(5, 'Imperial College London'),
(1, 'University of Colorada Boulder'),
(3, 'University of illinois at Urbana-Champaign'),
(2, 'University of Michigan');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `username`, `email`, `password`) VALUES
(4, 'Ibtihaj Bin Azhar', 'ibtihaj@gmail.com', '$2y$10$q./8qnH.cBlEQy7.BiUU/OW.OnIMcSmrxcreWfVJWta.r.ge2a1ky'),
(5, 'Deedan Sajjid', 'deedan@gmail.com', '$2y$10$65OPWlWcLbviH56eKVObKOnAV3nsEqEXfS2qeMZz7BS.lONb4Qrnq'),
(6, 'Abdus Samad', 'samad@gmail.com', '$2y$10$gQABNLYyAAjZ.dyub6DnWeH2iRRgNcGbRbkGDq5qqz7WKtCmIwZEi'),
(7, 'Ali', 'ali@yahoo.com', '$2y$10$fxn1DA/3mp/hKbspeZ7L.uJy2lskfCY3Rp5Boyh1uI6WzQOBhYPge');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`course_id`),
  ADD KEY `category_id` (`category_id`),
  ADD KEY `fk_uni_id` (`uni_id`);

--
-- Indexes for table `course_category`
--
ALTER TABLE `course_category`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `enrollments`
--
ALTER TABLE `enrollments`
  ADD PRIMARY KEY (`enrollment_id`),
  ADD KEY `fk_user_id` (`user_id`) USING BTREE,
  ADD KEY `fk_course_id` (`course_id`) USING BTREE;

--
-- Indexes for table `universities`
--
ALTER TABLE `universities`
  ADD PRIMARY KEY (`uni_id`),
  ADD UNIQUE KEY `unique_uni_name` (`uni_name`) USING BTREE;

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `courses`
--
ALTER TABLE `courses`
  MODIFY `course_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `course_category`
--
ALTER TABLE `course_category`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `enrollments`
--
ALTER TABLE `enrollments`
  MODIFY `enrollment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `universities`
--
ALTER TABLE `universities`
  MODIFY `uni_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `courses`
--
ALTER TABLE `courses`
  ADD CONSTRAINT `fk_course_id` FOREIGN KEY (`category_id`) REFERENCES `course_category` (`category_id`),
  ADD CONSTRAINT `fk_uni_id` FOREIGN KEY (`uni_id`) REFERENCES `universities` (`uni_id`);

--
-- Constraints for table `enrollments`
--
ALTER TABLE `enrollments`
  ADD CONSTRAINT `enrollments_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`),
  ADD CONSTRAINT `enrollments_ibfk_2` FOREIGN KEY (`course_id`) REFERENCES `courses` (`course_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
