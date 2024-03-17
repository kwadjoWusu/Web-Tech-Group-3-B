-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 17, 2024 at 08:36 PM
-- Server version: 8.0.35
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `natembea`
--

-- --------------------------------------------------------

--
-- Table structure for table `answers`
--

CREATE TABLE `answers` (
  `ans_id` int NOT NULL,
  `answer` varchar(255) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `answers`
--

INSERT INTO `answers` (`ans_id`, `answer`) VALUES
(16, 'Cajetan'),
(17, 'Wa'),
(18, 'Chang'),
(19, 'Hellen'),
(20, 'Sombo'),
(21, 'Chang'),
(22, 'Cajetan'),
(23, 'Hellen'),
(24, 'Cajetan'),
(25, 'Hellen'),
(26, 'Kaleo'),
(27, 'jam'),
(28, 'gladys'),
(29, 'yaounde'),
(30, 'GBHS'),
(31, 'gladys'),
(32, 'mother'),
(33, 'hjf'),
(34, 'gladys'),
(35, 'awing'),
(36, 'gbhs');

-- --------------------------------------------------------

--
-- Table structure for table `appointment`
--

CREATE TABLE `appointment` (
  `appointment_id` int NOT NULL,
  `UserID` int NOT NULL,
  `appointment_date` date NOT NULL,
  `appointment_time` time NOT NULL,
  `problemDescription` text COLLATE utf8mb4_unicode_ci,
  `status` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `appointment`
--

INSERT INTO `appointment` (`appointment_id`, `UserID`, `appointment_date`, `appointment_time`, `problemDescription`, `status`) VALUES
(15, 23, '2024-03-16', '05:21:00', 'Stomach bite', 1),
(16, 24, '2024-03-22', '06:35:00', 'Snake bite\r\n', 2),
(17, 24, '2024-04-06', '17:13:00', 'wound bleeding ', 1),
(18, 24, '2024-03-20', '18:31:00', 'head', 1);

-- --------------------------------------------------------

--
-- Table structure for table `availability`
--

CREATE TABLE `availability` (
  `availability_id` int NOT NULL,
  `doctor_id` int DEFAULT NULL,
  `date` date DEFAULT NULL,
  `start_time` time DEFAULT NULL,
  `end_time` time DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `doctor`
--

CREATE TABLE `doctor` (
  `doctor_id` int NOT NULL,
  `doctor_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `qualification` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `speciality_id` int NOT NULL,
  `yearsofexperience` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `insurance`
--

CREATE TABLE `insurance` (
  `insurance_id` int NOT NULL,
  `providername` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `patient_id` int DEFAULT NULL,
  `policyNumber` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `coveragedetails` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `validity` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `notification_id` int NOT NULL,
  `user_id` int DEFAULT NULL,
  `notification_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `message` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `timestamp` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `patient`
--

CREATE TABLE `patient` (
  `patient_id` int NOT NULL,
  `medical_history` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `gender` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `contact_Infos` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int DEFAULT NULL,
  `dateofbirth` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `patient`
--

INSERT INTO `patient` (`patient_id`, `medical_history`, `gender`, `contact_Infos`, `user_id`, `dateofbirth`) VALUES
(0, '', '', '', 3, '2024-03-01'),
(2, '', '', '', 3, '0000-00-00'),
(6, '', '', '', 3, '0000-00-00'),
(7, '', '', '', 3, '0000-00-00'),
(8, '', '', '', 3, '0000-00-00'),
(9, '', '', '', 3, '0000-00-00'),
(10, '', '', '', 3, '0000-00-00'),
(11, '', '', '', 3, '0000-00-00'),
(12, '', '', '', 3, '0000-00-00'),
(13, '', '', '', 3, '0000-00-00'),
(14, '', '', '', 3, '0000-00-00'),
(15, '', '', '', 23, '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `patient_records`
--

CREATE TABLE `patient_records` (
  `record_id` int NOT NULL,
  `patient_id` int DEFAULT NULL,
  `doctor_id` int DEFAULT NULL,
  `record_date` date DEFAULT NULL,
  `record_details` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `photo`
--

CREATE TABLE `photo` (
  `ph_id` int NOT NULL,
  `UserID` int NOT NULL,
  `photo` blob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `questions`
--

CREATE TABLE `questions` (
  `q_id` int NOT NULL,
  `question` varchar(255) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `questions`
--

INSERT INTO `questions` (`q_id`, `question`) VALUES
(1, 'What is your mother\'s maiden name?'),
(2, 'In what city were you born?'),
(3, 'What is the name of your first elementary school?');

-- --------------------------------------------------------

--
-- Table structure for table `q_arelation`
--

CREATE TABLE `q_arelation` (
  `q_aid` int NOT NULL,
  `UserID` int NOT NULL,
  `q_id` int NOT NULL,
  `ans_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `q_arelation`
--

INSERT INTO `q_arelation` (`q_aid`, `UserID`, `q_id`, `ans_id`) VALUES
(14, 22, 1, 16),
(15, 22, 1, 17),
(16, 22, 1, 18),
(17, 23, 1, 19),
(18, 23, 2, 20),
(19, 23, 3, 21),
(20, 24, 1, 22),
(21, 24, 2, 23),
(22, 24, 3, 24),
(23, 31, 1, 25),
(24, 31, 2, 26),
(25, 31, 3, 27),
(26, 32, 1, 28),
(27, 32, 2, 29),
(28, 32, 3, 30),
(29, 33, 1, 31),
(30, 33, 2, 32),
(31, 33, 3, 33),
(32, 34, 1, 34),
(33, 34, 2, 35),
(34, 34, 3, 36);

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

CREATE TABLE `reviews` (
  `review_id` int NOT NULL,
  `doctor_id` int DEFAULT NULL,
  `patient_id` int DEFAULT NULL,
  `rating` int DEFAULT NULL,
  `comment` text COLLATE utf8mb4_unicode_ci,
  `Reviewdate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `roleID` int NOT NULL,
  `roleName` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`roleID`, `roleName`) VALUES
(0, 'doctor'),
(1, 'Admin'),
(2, 'patient');

-- --------------------------------------------------------

--
-- Table structure for table `speciality`
--

CREATE TABLE `speciality` (
  `speciality_id` int NOT NULL,
  `speciality_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Ddescription` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `status`
--

CREATE TABLE `status` (
  `s_id` int NOT NULL,
  `status_name` varchar(255) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `status`
--

INSERT INTO `status` (`s_id`, `status_name`) VALUES
(1, 'Scheduled'),
(2, 'Cancelled'),
(3, 'Completed');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `UserID` int NOT NULL,
  `roleID` int NOT NULL,
  `email` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `passwd` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fname` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lname` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `yeargroup` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `major` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gender` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`UserID`, `roleID`, `email`, `passwd`, `fname`, `lname`, `yeargroup`, `major`, `gender`) VALUES
(3, 0, 'songwae2000@gmail.com', 'Myresult1$', 'Cajetan', 'Songwae', '2025', 'computer science', 'male'),
(4, 2, 'songwae2000@gmail.com', '$2y$10$cSda6P6Vrkw0Tz.zqtjbwusu3116MJcs7EAMFqvOkVJzMBAmrAGJq', 'Cajetan', 'Songwae', '2024', 'computer_science', '0'),
(5, 2, 'songwae2000@gmail.com', '$2y$10$vvwObnXctkvwMpwCamnzo.fqlrdxwhpNnzEDUqNYjm3VSegi0jgES', 'Cajetan', 'Songwae', '2024', 'computer_science', '0'),
(6, 1, 'songwae000@gmail.com', '$2y$10$hGEdFyicngOG3Do19WsA6.9ffs9jccmGkcdfeNmYaXVSFwuS9RdQK', 'Cajetan', 'Song', '2025', 'mechanical_engineering', '0'),
(7, 1, 'songwae000@gmail.com', '$2y$10$.iDLC/ov1vQ4FoLoTCollOXtsxMbPSHF3Nh6/gbL4QgflTaQwzHyC', 'Cajetan', 'Song', '2025', 'mechanical_engineering', '0'),
(19, 2, 'songwae2000@gmail.com', '$2y$10$BRuCeSXeZJb47/.7Jj9Z5e/gM9VypqBK24eQMLeDTyxuqkjI8H.1q', 'jjjjj', 'bbbb', '2025', 'business_administration', '0'),
(20, 2, 'songwae2000@gmail.com', '$2y$10$miCEnHPrJmMj5Ezbi7kj6urMgme6Yi2bibI8ri5cA6wy21qa0RAs.', 'jjjjj', 'bbbb', '2026', 'computer_engineering', '0'),
(22, 2, 'cajetan@ashesi.edu.gh', '$2y$10$me4K/0k9KK5KDAhtLGY6h.eHOeMhBNbmap2mF4ynedYaZWPs.5BLm', 'Simon', 'Gyaang', '2025', 'computer_engineering', '0'),
(23, 2, 'songwae@ashesi.edu.gh', '$2y$10$nZ.qwmKjLBQ6hCiR.os42OKxUCkVQ.jBHt/txTkKL.D3OEVAYMGhm', 'Casper', 'Gyaang', '2024', 'electrical_engineering', '0'),
(24, 2, 'cajetan.songw@ashesi.edu.gh', '$2y$10$y01kKSjfQTxqycmLVzMieuN59HLLsFub2./Ywq5WJQTVBlAkIjyLO', 'Simon', 'bbbb', '2026', 'mechanical_engineering', '1'),
(31, 1, 'so@gmail.com', '$2y$10$LavO8cgyvPOUE.vE.O8jme0DoiYJaubBqxsCtH5xAAvpUOTCBYGDy', 'Caje ', 'Song', '2026', 'mechanical_engineering', '0'),
(32, 1, 'hannah.nah-anzoh@ashesi.edu.gh', '$2y$10$1aIfc8Rvx4lUnCHCXUVy7ukY8oVuZJ4G3bvdVof2qVCI6EWa11B3y', 'Public', 'service', '2025', 'business_administration', '0'),
(33, 1, 'florenceforchu379@ashesi.edu.gh', '$2y$10$3vZ/FC4QRgCp6cpqlzQY1OhzRtrFI11Zhs/L9.6A2UwIROSYXijCu', 'Pohmah', 'hannah', '2026', 'mechanical_engineering', '0'),
(34, 1, 'joshua@ashesi.edu.gh', '$2y$10$LjSOExuGabgJHZL17eWK2u2s9/Nn.WdJGxI4808x0dZemLHcGigDy', 'joel', 'joshua', '2025', 'computer_engineering', '0');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `answers`
--
ALTER TABLE `answers`
  ADD PRIMARY KEY (`ans_id`);

--
-- Indexes for table `appointment`
--
ALTER TABLE `appointment`
  ADD PRIMARY KEY (`appointment_id`),
  ADD KEY `patient_id` (`UserID`),
  ADD KEY `fk_appointment_status` (`status`);

--
-- Indexes for table `availability`
--
ALTER TABLE `availability`
  ADD PRIMARY KEY (`availability_id`),
  ADD KEY `doctor_id` (`doctor_id`);

--
-- Indexes for table `doctor`
--
ALTER TABLE `doctor`
  ADD PRIMARY KEY (`doctor_id`),
  ADD KEY `speciality_id` (`speciality_id`);

--
-- Indexes for table `insurance`
--
ALTER TABLE `insurance`
  ADD PRIMARY KEY (`insurance_id`);

--
-- Indexes for table `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`notification_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `patient`
--
ALTER TABLE `patient`
  ADD PRIMARY KEY (`patient_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `patient_records`
--
ALTER TABLE `patient_records`
  ADD PRIMARY KEY (`record_id`),
  ADD KEY `patient_id` (`patient_id`);

--
-- Indexes for table `photo`
--
ALTER TABLE `photo`
  ADD PRIMARY KEY (`ph_id`),
  ADD KEY `fk_photo` (`UserID`);

--
-- Indexes for table `questions`
--
ALTER TABLE `questions`
  ADD PRIMARY KEY (`q_id`);

--
-- Indexes for table `q_arelation`
--
ALTER TABLE `q_arelation`
  ADD PRIMARY KEY (`q_aid`),
  ADD KEY `fk_question` (`q_id`),
  ADD KEY `fk_answer` (`ans_id`),
  ADD KEY `fk_user` (`UserID`);

--
-- Indexes for table `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`review_id`),
  ADD KEY `doctor_id` (`doctor_id`),
  ADD KEY `patient_id` (`patient_id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`roleID`);

--
-- Indexes for table `speciality`
--
ALTER TABLE `speciality`
  ADD PRIMARY KEY (`speciality_id`);

--
-- Indexes for table `status`
--
ALTER TABLE `status`
  ADD PRIMARY KEY (`s_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`UserID`),
  ADD KEY `roleID` (`roleID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `answers`
--
ALTER TABLE `answers`
  MODIFY `ans_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `appointment`
--
ALTER TABLE `appointment`
  MODIFY `appointment_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `availability`
--
ALTER TABLE `availability`
  MODIFY `availability_id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `doctor`
--
ALTER TABLE `doctor`
  MODIFY `doctor_id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `insurance`
--
ALTER TABLE `insurance`
  MODIFY `insurance_id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `notifications`
--
ALTER TABLE `notifications`
  MODIFY `notification_id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `patient`
--
ALTER TABLE `patient`
  MODIFY `patient_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `patient_records`
--
ALTER TABLE `patient_records`
  MODIFY `record_id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `photo`
--
ALTER TABLE `photo`
  MODIFY `ph_id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `questions`
--
ALTER TABLE `questions`
  MODIFY `q_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `q_arelation`
--
ALTER TABLE `q_arelation`
  MODIFY `q_aid` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `reviews`
--
ALTER TABLE `reviews`
  MODIFY `review_id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `speciality`
--
ALTER TABLE `speciality`
  MODIFY `speciality_id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `UserID` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `appointment`
--
ALTER TABLE `appointment`
  ADD CONSTRAINT `fk_appointment_status` FOREIGN KEY (`status`) REFERENCES `status` (`s_id`),
  ADD CONSTRAINT `fk_UserID` FOREIGN KEY (`UserID`) REFERENCES `user` (`UserID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `availability`
--
ALTER TABLE `availability`
  ADD CONSTRAINT `availability_ibfk_1` FOREIGN KEY (`doctor_id`) REFERENCES `doctor` (`doctor_id`);

--
-- Constraints for table `doctor`
--
ALTER TABLE `doctor`
  ADD CONSTRAINT `doctor_ibfk_1` FOREIGN KEY (`speciality_id`) REFERENCES `speciality` (`speciality_id`);

--
-- Constraints for table `notifications`
--
ALTER TABLE `notifications`
  ADD CONSTRAINT `notifications_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`UserID`);

--
-- Constraints for table `patient`
--
ALTER TABLE `patient`
  ADD CONSTRAINT `patient_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`UserID`);

--
-- Constraints for table `patient_records`
--
ALTER TABLE `patient_records`
  ADD CONSTRAINT `patient_records_ibfk_1` FOREIGN KEY (`patient_id`) REFERENCES `patient` (`patient_id`);

--
-- Constraints for table `photo`
--
ALTER TABLE `photo`
  ADD CONSTRAINT `fk_photo` FOREIGN KEY (`UserID`) REFERENCES `user` (`UserID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `q_arelation`
--
ALTER TABLE `q_arelation`
  ADD CONSTRAINT `fk_answer` FOREIGN KEY (`ans_id`) REFERENCES `answers` (`ans_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_question` FOREIGN KEY (`q_id`) REFERENCES `questions` (`q_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_user` FOREIGN KEY (`UserID`) REFERENCES `user` (`UserID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `reviews`
--
ALTER TABLE `reviews`
  ADD CONSTRAINT `reviews_ibfk_1` FOREIGN KEY (`doctor_id`) REFERENCES `doctor` (`doctor_id`),
  ADD CONSTRAINT `reviews_ibfk_2` FOREIGN KEY (`patient_id`) REFERENCES `patient` (`patient_id`);

--
-- Constraints for table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `user_ibfk_1` FOREIGN KEY (`roleID`) REFERENCES `roles` (`roleID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
