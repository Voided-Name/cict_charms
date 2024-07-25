-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 07, 2024 at 04:56 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cictcharms_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `alumni_awards`
--

CREATE TABLE `alumni_awards` (
  `id` int(11) NOT NULL,
  `award_name` varchar(100) DEFAULT NULL,
  `award_date` date DEFAULT NULL,
  `award_description` varchar(200) DEFAULT NULL,
  `given_by` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `alumni_graduated_course`
--

CREATE TABLE `alumni_graduated_course` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `studnum` varchar(50) NOT NULL,
  `course_id` int(11) DEFAULT NULL,
  `campus` int(11) DEFAULT NULL,
  `year_started` year(4) DEFAULT NULL,
  `year_graduated` year(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `alumni_graduated_course`
--

INSERT INTO `alumni_graduated_course` (`id`, `user_id`, `studnum`, `course_id`, `campus`, `year_started`, `year_graduated`) VALUES
(1, 5, 'PPY123456', NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `alumni_work_experience`
--

CREATE TABLE `alumni_work_experience` (
  `id` int(11) NOT NULL,
  `owner_id` int(11) DEFAULT NULL,
  `work_name` varchar(100) DEFAULT NULL,
  `work_position` varchar(100) DEFAULT NULL,
  `date_started` date DEFAULT NULL,
  `date_end` date DEFAULT NULL,
  `is_present` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `campuses`
--

CREATE TABLE `campuses` (
  `id` int(11) NOT NULL,
  `campusName` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `companies`
--

CREATE TABLE `companies` (
  `id` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `email_add` varchar(100) DEFAULT NULL,
  `contact_number` varchar(50) DEFAULT NULL,
  `website` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `companies`
--

INSERT INTO `companies` (`id`, `name`, `email_add`, `contact_number`, `website`) VALUES
(1, 'Meralco', 'meralco@gmail.com', '09546464611', 'meralco.com'),
(2, 'ASKI', 'aski@gmail.com', '09991112345', 'aski.com');

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE `courses` (
  `id` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `accronym` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `employer_job_posts`
--

CREATE TABLE `employer_job_posts` (
  `id` int(11) NOT NULL,
  `author_id` int(11) DEFAULT NULL,
  `position` varchar(50) DEFAULT NULL,
  `slot_available` int(11) DEFAULT NULL,
  `job_type` varchar(100) DEFAULT NULL,
  `job_location` varchar(255) DEFAULT NULL,
  `slot_category` int(11) DEFAULT NULL,
  `work_hours` varchar(50) DEFAULT NULL,
  `job_description` varchar(255) DEFAULT NULL,
  `is_draft` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `employer_users`
--

CREATE TABLE `employer_users` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `employer_num` varchar(50) NOT NULL,
  `company_id` int(11) DEFAULT NULL,
  `company_position` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `employer_users`
--

INSERT INTO `employer_users` (`id`, `user_id`, `employer_num`, `company_id`, `company_position`) VALUES
(1, 6, 'rwqrwerqwer', 2, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `faculty`
--

CREATE TABLE `faculty` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `employee_num` varchar(50) NOT NULL,
  `campus_id` int(11) DEFAULT NULL,
  `acadrank_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `faculty`
--

INSERT INTO `faculty` (`id`, `user_id`, `employee_num`, `campus_id`, `acadrank_id`) VALUES
(1, 7, '', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `job_categories`
--

CREATE TABLE `job_categories` (
  `id` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `post_comments`
--

CREATE TABLE `post_comments` (
  `id` int(11) NOT NULL,
  `post_id` int(11) DEFAULT NULL,
  `reply_at` datetime DEFAULT current_timestamp(),
  `author_id` int(11) DEFAULT NULL,
  `content` varchar(255) DEFAULT NULL,
  `replied_to_id` int(11) DEFAULT NULL,
  `is_draft` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `userdetails`
--

CREATE TABLE `userdetails` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `profile_pic_url` varchar(255) DEFAULT NULL,
  `email_address` varchar(100) DEFAULT NULL,
  `contact_number` varchar(20) DEFAULT NULL,
  `first_name` varchar(50) DEFAULT NULL,
  `middle_name` varchar(50) DEFAULT NULL,
  `last_name` varchar(50) DEFAULT NULL,
  `birth_date` date DEFAULT NULL,
  `sex` int(1) DEFAULT NULL,
  `region` varchar(255) DEFAULT NULL,
  `province` varchar(255) DEFAULT NULL,
  `city` varchar(255) DEFAULT NULL,
  `barangay` varchar(255) DEFAULT NULL,
  `street_add` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `userdetails`
--

INSERT INTO `userdetails` (`id`, `user_id`, `profile_pic_url`, `email_address`, `contact_number`, `first_name`, `middle_name`, `last_name`, `birth_date`, `sex`, `region`, `province`, `city`, `barangay`, `street_add`, `address`) VALUES
(1, 5, 'images/profilepix/lady_def.jpg', 'alumni@gmail.com', '09558881234', 'alu', 'mi', 'num', '2000-06-03', 1, '1', 'CAMARINES SUR', 'GAINZA', 'DISTRICT II (POB.)', 'werfg', NULL),
(2, 6, 'images/profilepix/lady_def.jpg', 'empee@gmail.com', '09999999999', 'empee', 'pee', 'ploy', '2000-06-19', 1, '1', 'BATAAN', 'MORONG', 'MABAYO', 'Luna', NULL),
(3, 7, 'images/profilepix/man_gen.jpg', 'facundo@gmail.com', '09222222222', 'Facundo', 'Gon', 'Santos', '2004-01-08', 1, '1', 'CAVITE', 'KAWIT', 'SAN SEBASTIAN', 'asdfg', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `passAlias` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` int(11) DEFAULT 1,
  `is_invited` int(11) DEFAULT NULL,
  `invite_by` int(11) DEFAULT NULL,
  `is_verified` int(11) DEFAULT 0,
  `verificationDetails` int(11) DEFAULT NULL,
  `created_at` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `passAlias`, `password`, `role`, `is_invited`, `invite_by`, `is_verified`, `verificationDetails`, `created_at`) VALUES
(1, 'test@admin.com', 'testAdmin*123', '21acffead58e9a2359033eb149ce47dd', 4, NULL, NULL, 1, NULL, '2024-06-04 10:54:49'),
(2, 'test@alumni.com', 'newPass*123', '6d60e464d807435601927a70a5f62ed2', 1, NULL, NULL, 1, NULL, '2024-06-04 10:54:49'),
(3, 'test@faculty.com', 'newPass*123', '6d60e464d807435601927a70a5f62ed2', 3, NULL, NULL, 0, NULL, '2024-06-04 10:54:49'),
(4, 'test@employer.com', 'newPass*123', '6d60e464d807435601927a70a5f62ed2', 2, NULL, NULL, 0, NULL, '2024-06-04 10:54:49'),
(5, '', 'password', 'd41d8cd98f00b204e9800998ecf8427e', 1, NULL, NULL, NULL, NULL, '2024-06-06 15:51:41'),
(6, 'empee@gmail.com', 'password', 'd41d8cd98f00b204e9800998ecf8427e', 2, NULL, NULL, 0, NULL, '2024-06-06 16:02:13'),
(7, 'facundo@gmail.com', 'password', 'd41d8cd98f00b204e9800998ecf8427e', 3, NULL, NULL, 0, NULL, '2024-06-06 16:11:43');

-- --------------------------------------------------------

--
-- Table structure for table `user_invites`
--

CREATE TABLE `user_invites` (
  `id` int(11) NOT NULL,
  `author_id` int(11) DEFAULT NULL,
  `invitee_id` int(11) DEFAULT NULL,
  `invited_at` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user_notification`
--

CREATE TABLE `user_notification` (
  `id` int(11) NOT NULL,
  `for_user_id` int(11) DEFAULT NULL,
  `author_id` int(11) DEFAULT NULL,
  `is_viewed` int(11) DEFAULT NULL,
  `title` varchar(100) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `verificationstatus`
--

CREATE TABLE `verificationstatus` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `verified_by` int(11) DEFAULT NULL,
  `verified_at` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `alumni_awards`
--
ALTER TABLE `alumni_awards`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `alumni_graduated_course`
--
ALTER TABLE `alumni_graduated_course`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `alumni_work_experience`
--
ALTER TABLE `alumni_work_experience`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `campuses`
--
ALTER TABLE `campuses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `companies`
--
ALTER TABLE `companies`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `employer_job_posts`
--
ALTER TABLE `employer_job_posts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `employer_users`
--
ALTER TABLE `employer_users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `faculty`
--
ALTER TABLE `faculty`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `job_categories`
--
ALTER TABLE `job_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `post_comments`
--
ALTER TABLE `post_comments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `userdetails`
--
ALTER TABLE `userdetails`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_invites`
--
ALTER TABLE `user_invites`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_notification`
--
ALTER TABLE `user_notification`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `verificationstatus`
--
ALTER TABLE `verificationstatus`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `alumni_awards`
--
ALTER TABLE `alumni_awards`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `alumni_graduated_course`
--
ALTER TABLE `alumni_graduated_course`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `alumni_work_experience`
--
ALTER TABLE `alumni_work_experience`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `campuses`
--
ALTER TABLE `campuses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `companies`
--
ALTER TABLE `companies`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `courses`
--
ALTER TABLE `courses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `employer_job_posts`
--
ALTER TABLE `employer_job_posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `employer_users`
--
ALTER TABLE `employer_users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `faculty`
--
ALTER TABLE `faculty`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `job_categories`
--
ALTER TABLE `job_categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `post_comments`
--
ALTER TABLE `post_comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `userdetails`
--
ALTER TABLE `userdetails`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `user_invites`
--
ALTER TABLE `user_invites`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user_notification`
--
ALTER TABLE `user_notification`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `verificationstatus`
--
ALTER TABLE `verificationstatus`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
