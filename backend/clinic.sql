-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: May 09, 2017 at 08:51 PM
-- Server version: 5.7.18-0ubuntu0.16.04.1
-- PHP Version: 7.0.15-0ubuntu0.16.04.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `clinic`
--

-- --------------------------------------------------------

--
-- Table structure for table `doctor`
--

CREATE TABLE `doctor` (
  `id` int(11) NOT NULL,
  `first_name` varchar(30) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `last_name` varchar(30) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `specialist` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `doctor`
--

INSERT INTO `doctor` (`id`, `first_name`, `last_name`, `specialist`) VALUES
(1, 'Дмитро Петрович', 'Ігнатенко', 'Ортопед'),
(2, 'Іван Михайлович', 'Коваленко', 'Хірург'),
(3, 'Христина Петрівна', 'Гостра', 'Отолариголог'),
(4, 'Петро Миколайович', 'Вітрук', 'Уролог'),
(5, 'Андрій Петрович', 'Кондрат', 'Отолариголог'),
(6, 'Микола Володимирович', 'Петрук', 'Отолариголог');

-- --------------------------------------------------------

--
-- Table structure for table `meeting`
--

CREATE TABLE `meeting` (
  `id` int(11) NOT NULL,
  `doctor_id` int(11) DEFAULT NULL,
  `patient_id` int(11) DEFAULT NULL,
  `date_time_meeting` datetime DEFAULT CURRENT_TIMESTAMP,
  `date_time_request` datetime DEFAULT CURRENT_TIMESTAMP,
  `reason` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `meeting`
--

INSERT INTO `meeting` (`id`, `doctor_id`, `patient_id`, `date_time_meeting`, `date_time_request`, `reason`) VALUES
(44, 1, 1, '2017-05-09 01:30:00', '2017-05-08 12:48:24', '1'),
(45, 1, 1, '2017-05-09 02:00:00', '2017-05-08 12:48:31', '1');

-- --------------------------------------------------------

--
-- Table structure for table `patient`
--

CREATE TABLE `patient` (
  `id` int(11) NOT NULL,
  `first_name` varchar(30) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `last_name` varchar(30) NOT NULL,
  `age` int(11) NOT NULL,
  `city` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `street` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `building` int(11) NOT NULL,
  `family_doctor` int(11) DEFAULT NULL,
  `conversation_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `patient`
--

INSERT INTO `patient` (`id`, `first_name`, `last_name`, `age`, `city`, `street`, `building`, `family_doctor`, `conversation_id`) VALUES
(1, 'awds', 'sacd', 12, 'svdc', 'csa', 12, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `auth_key` varchar(32) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `password_hash` varchar(255) NOT NULL,
  `password_reset_token` varchar(255) DEFAULT NULL,
  `email` varchar(100) NOT NULL,
  `status` smallint(10) NOT NULL,
  `role` int(11) DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `auth_key`, `password_hash`, `password_reset_token`, `email`, `status`, `role`, `created_at`, `updated_at`) VALUES
(1, 'admin', '', '$2y$13$uqe3LPW9ya3RZhynJpPN5um9fvdxUmoqjOqQBJDdIDXSKxRZB5bPu', '', '', 10, 10, 0, 0),
(2, 'vova', 'LTQlYSBogA3IlgwfqIL_EbOUP2EyA2tc', '$2y$13$G3ux9RJfRswbbYtRfdNBseT9S8ov10EdXFo39fRC.slUUfWW1yUMG', NULL, 'vova@mail.com', 10, NULL, 1494243884, 1494243884),
(8, 'ben', 'LrvEP37O6Aesa7CXlsIEMyeA6VZviN_m', '$2y$13$28JPESRx7S3.mne4CfND/eli9gsjw6x0Ig3l/UtVhsaFsq9QE50Iq', NULL, 'fendeka@mail.ru', 10, NULL, 1494351567, 1494351567),
(9, 'ww', 'zbIHVe1lE1TJJFCKon0vWQyhwtsM7ojN', '$2y$13$B.w91GMuKB2..8y8Vp0/cOOIsWs/IMg1gp3CUaDxFCbs7XzQu.tCG', NULL, 'ema@mai.ri', 10, NULL, 1494352080, 1494352080);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `doctor`
--
ALTER TABLE `doctor`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `meeting`
--
ALTER TABLE `meeting`
  ADD PRIMARY KEY (`id`),
  ADD KEY `doctor_id` (`doctor_id`),
  ADD KEY `patient_id` (`patient_id`);

--
-- Indexes for table `patient`
--
ALTER TABLE `patient`
  ADD PRIMARY KEY (`id`),
  ADD KEY `family_doctor` (`family_doctor`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `doctor`
--
ALTER TABLE `doctor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `meeting`
--
ALTER TABLE `meeting`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;
--
-- AUTO_INCREMENT for table `patient`
--
ALTER TABLE `patient`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `meeting`
--
ALTER TABLE `meeting`
  ADD CONSTRAINT `meeting_ibfk_1` FOREIGN KEY (`patient_id`) REFERENCES `patient` (`id`),
  ADD CONSTRAINT `meeting_ibfk_2` FOREIGN KEY (`doctor_id`) REFERENCES `doctor` (`id`);

--
-- Constraints for table `patient`
--
ALTER TABLE `patient`
  ADD CONSTRAINT `patient_ibfk_1` FOREIGN KEY (`family_doctor`) REFERENCES `doctor` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
