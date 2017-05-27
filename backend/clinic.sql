-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: May 27, 2017 at 06:50 PM
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
(1, 'Дмитро Петрович', 'Ігнатенко', 'Orthopedist'),
(2, 'Іван Михайлович', 'Коваленко', 'Surgeon'),
(3, 'Христина Петрівна', 'Гостра', 'Otolaryngologist'),
(4, 'Петро Миколайович', 'Вітрук', 'Urologist'),
(5, 'Андрій Петрович', 'Кондрат', 'Otolaryngologist'),
(6, 'Микола Володимирович', 'Петрук', 'Otolaryngologist'),
(7, 'Григорій Павлович', 'Кукрудза', 'Neurologist'),
(8, 'Петро Петрович', 'Колоско', 'Neurologist'),
(9, 'Дмитро Васильович', 'Потенко', 'Endocrinologist'),
(10, 'Іванна Михайлівна', 'Коваленко', 'Dermatologist'),
(11, 'Аліна Йосипівна', 'Жук', 'Dermatologist'),
(12, 'Микола Ігнатович', 'Дмитрук', 'Ophthalmologist'),
(13, 'Галій Корнелійович', 'Кравчук', 'Ophthalmologist'),
(14, 'Вадим Володимиров', 'Мерха', 'Endocrinologist'),
(15, 'Андрій Іванович', 'Павук', 'Endocrinologist');

-- --------------------------------------------------------

--
-- Table structure for table `image`
--

CREATE TABLE `image` (
  `id` int(11) NOT NULL,
  `patient_id` int(11) DEFAULT NULL,
  `doctor_id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `size` varchar(100) DEFAULT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `image`
--

INSERT INTO `image` (`id`, `patient_id`, `doctor_id`, `name`, `size`, `description`) VALUES
(1, 2, 1, 'avatar.jpg', 'svcd', 'vsd'),
(2, 2, 3, 'KD2PExwBrnI.jpg', '1212', 'vcz');

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
  `reason` text CHARACTER SET utf8 COLLATE utf8_unicode_ci
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `meeting`
--

INSERT INTO `meeting` (`id`, `doctor_id`, `patient_id`, `date_time_meeting`, `date_time_request`, `reason`) VALUES
(63, 1, 2, '2017-05-18 11:00:00', '2017-05-18 21:17:45', 'sd'),
(83, 2, 2, '2017-05-24 09:00:00', '2017-05-23 15:15:52', 'acs'),
(84, 2, 2, '2017-05-24 09:00:00', '2017-05-23 15:20:43', 'sdc'),
(85, 2, 2, '2017-05-23 15:00:00', '2017-05-23 15:22:46', 'dfbxc'),
(86, 2, 2, '2017-05-23 14:00:00', '2017-05-23 15:30:27', 'wef'),
(87, 2, 2, '2017-05-23 16:00:00', '2017-05-23 15:30:45', 'wef'),
(88, 2, 2, '2017-05-23 11:00:00', '2017-05-23 15:30:53', 'wef'),
(89, 3, 2, '2017-05-29 10:00:00', '2017-05-26 23:50:57', 'kjbn'),
(90, 3, 2, '2017-05-29 11:00:00', '2017-05-26 23:51:32', 'kl;m,'),
(91, 3, 2, '2017-05-29 09:00:00', '2017-05-26 23:51:55', 'kl;m,'),
(92, 5, 2, '2017-05-30 14:00:00', '2017-05-27 11:10:47', 'sdv');

-- --------------------------------------------------------

--
-- Table structure for table `patient`
--

CREATE TABLE `patient` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `first_name` varchar(30) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `last_name` varchar(30) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `age` int(11) DEFAULT NULL,
  `city` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `street` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `building` int(11) DEFAULT NULL,
  `family_doctor` int(11) DEFAULT '1',
  `conversation_id` int(11) DEFAULT NULL,
  `image` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `mail_index` varchar(10) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `home_phone` varchar(10) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `cell_phone` varchar(15) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `patient`
--

INSERT INTO `patient` (`id`, `user_id`, `first_name`, `last_name`, `age`, `city`, `street`, `building`, `family_doctor`, `conversation_id`, `image`, `mail_index`, `home_phone`, `cell_phone`) VALUES
(1, 1, 'awds', 'sacd', 12, 'svdc', 'csa', 12, 1, 1, NULL, NULL, NULL, NULL),
(2, 2, 'Volodymyr', 'Deka', 25, 'Ternopil', 'Monastyrskogo', 42, 1, NULL, 'avatar.jpg', '46000', '248565', '096720332'),
(15, 22, 'Ivan', 'Talahovskii', 24, 'Ternopil', 'Zluku', 23, 5, NULL, NULL, '23334', NULL, NULL),
(16, 23, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL),
(17, 24, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `prescription`
--

CREATE TABLE `prescription` (
  `id` int(11) NOT NULL,
  `patient_id` int(11) NOT NULL,
  `doctor_id` int(11) NOT NULL,
  `diagnosis` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `pharmacy` varchar(11) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `pills_number` int(11) DEFAULT NULL,
  `refills_number` int(11) DEFAULT NULL,
  `instruction` text CHARACTER SET utf8 COLLATE utf8_unicode_ci,
  `start_period` datetime DEFAULT NULL,
  `end_period` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `prescription`
--

INSERT INTO `prescription` (`id`, `patient_id`, `doctor_id`, `diagnosis`, `pharmacy`, `pills_number`, `refills_number`, `instruction`, `start_period`, `end_period`) VALUES
(1, 22, 1, 'flue', 'farmacy', 2, 2, '1 pill per day', NULL, NULL),
(2, 2, 2, 'hcf', 'v h', 4, NULL, 'cv vn', NULL, NULL),
(3, 2, 2, 'ujvbjn', NULL, NULL, NULL, NULL, NULL, NULL);

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
(22, 'ivan', 'nEaxJ82jVdqiF1aErkJluJFaHWdWeAEN', '$2y$13$MpEG8sV71TG1S.Pk61j7CenOrStpRpz4hVnNGeY1F2NS5zKmx9R7y', NULL, 'ivan@mail.com', 10, NULL, 1495203147, 1495203147),
(23, 'petro', 'e7UCF8RKMzWQoyZTiCHnrh7eEMIAqW7q', '$2y$13$pdQm9RTS.9AZZUSl.HHbmuUHZwRBNBHw8rXTM6nIKhu1Kl7LRgH8u', NULL, 'petro@mail.com', 10, NULL, 1495206020, 1495206020),
(24, 'krust', '_nyjejVvwh1ISAM8rdlVHGggbAGuXQAX', '$2y$13$XOsVAcwj3TtJZMSPM1zjwePm3/Yc3sfuCiK277cWxgHcXVJEmh2km', NULL, 'emailwww@mail.con', 10, NULL, 1495831733, 1495831733);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `doctor`
--
ALTER TABLE `doctor`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `image`
--
ALTER TABLE `image`
  ADD PRIMARY KEY (`id`),
  ADD KEY `patiend_id` (`patient_id`),
  ADD KEY `doctor_id` (`doctor_id`);

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
  ADD KEY `family_doctor` (`family_doctor`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `prescription`
--
ALTER TABLE `prescription`
  ADD PRIMARY KEY (`id`),
  ADD KEY `patient_id` (`patient_id`),
  ADD KEY `doctor_id` (`doctor_id`);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `image`
--
ALTER TABLE `image`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `meeting`
--
ALTER TABLE `meeting`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=93;
--
-- AUTO_INCREMENT for table `patient`
--
ALTER TABLE `patient`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT for table `prescription`
--
ALTER TABLE `prescription`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `image`
--
ALTER TABLE `image`
  ADD CONSTRAINT `image_ibfk_1` FOREIGN KEY (`patient_id`) REFERENCES `patient` (`user_id`),
  ADD CONSTRAINT `image_ibfk_2` FOREIGN KEY (`doctor_id`) REFERENCES `doctor` (`id`);

--
-- Constraints for table `meeting`
--
ALTER TABLE `meeting`
  ADD CONSTRAINT `meeting_ibfk_2` FOREIGN KEY (`doctor_id`) REFERENCES `doctor` (`id`),
  ADD CONSTRAINT `meeting_ibfk_3` FOREIGN KEY (`patient_id`) REFERENCES `patient` (`user_id`);

--
-- Constraints for table `patient`
--
ALTER TABLE `patient`
  ADD CONSTRAINT `patient_ibfk_1` FOREIGN KEY (`family_doctor`) REFERENCES `doctor` (`id`),
  ADD CONSTRAINT `patient_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`);

--
-- Constraints for table `prescription`
--
ALTER TABLE `prescription`
  ADD CONSTRAINT `prescription_ibfk_1` FOREIGN KEY (`doctor_id`) REFERENCES `doctor` (`id`),
  ADD CONSTRAINT `prescription_ibfk_2` FOREIGN KEY (`patient_id`) REFERENCES `patient` (`user_id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
