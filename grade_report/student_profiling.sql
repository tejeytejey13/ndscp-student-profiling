-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 18, 2023 at 03:53 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.1.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `student_profiling`
--
CREATE DATABASE IF NOT EXISTS `student_profiling` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `student_profiling`;

-- --------------------------------------------------------

--
-- Table structure for table `course`
--

DROP TABLE IF EXISTS `course`;
CREATE TABLE `course` (
  `course_id` int(11) NOT NULL,
  `course_name` varchar(255) NOT NULL,
  `course_belong` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `course`
--

INSERT INTO `course` (`course_id`, `course_name`, `course_belong`) VALUES
(1, 'Bachelor of Secondary Education (Major in English)', 'Bachelor of Secondary Education '),
(2, 'Bachelor of Elementary Education', ''),
(3, 'Bachelor of Science in Information Technology', ''),
(4, 'Bachelor of Science in Computer Science', ''),
(5, 'Bachelor of Science in Business Administration', ''),
(6, 'Bachelor of Technology and Livelihood Education (Home Economics)', ''),
(7, 'Bachelor of Secondary Education (Major in Filipino)', 'Bachelor of Secondary Education '),
(8, 'Bachelor of Secondary Education (Major in Religious Education)', 'Bachelor of Secondary Education '),
(9, 'Bachelor of Secondary Education (Major in Mathematics)', 'Bachelor of Secondary Education ');

-- --------------------------------------------------------

--
-- Table structure for table `files`
--

DROP TABLE IF EXISTS `files`;
CREATE TABLE `files` (
  `id` int(11) NOT NULL,
  `adviser_id` int(11) NOT NULL,
  `file_name` varchar(255) NOT NULL,
  `category` varchar(255) NOT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `files`
--

INSERT INTO `files` (`id`, `adviser_id`, `file_name`, `category`, `date`) VALUES
(3, 3, 'Carla', 'TASK-1.pdf', '0000-00-00 00:00:00'),
(4, 3, 'test', 'elibing.sql', '2023-09-24 18:11:00');

-- --------------------------------------------------------

--
-- Table structure for table `fillup`
--

DROP TABLE IF EXISTS `fillup`;
CREATE TABLE `fillup` (
  `id` int(11) NOT NULL,
  `student_pic` varchar(255) NOT NULL,
  `lrn` varchar(255) NOT NULL,
  `lname` varchar(255) NOT NULL,
  `fname` varchar(255) NOT NULL,
  `mname` varchar(255) NOT NULL,
  `course_name` varchar(255) NOT NULL,
  `semester` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `provaddress` varchar(255) NOT NULL,
  `contact_number` varchar(255) NOT NULL,
  `birth_of_date` date NOT NULL,
  `place_of_birth` varchar(255) NOT NULL,
  `nationality` varchar(255) NOT NULL,
  `religion` varchar(255) NOT NULL,
  `baptized` varchar(255) NOT NULL,
  `confirmed` varchar(255) NOT NULL,
  `communion` varchar(255) NOT NULL,
  `familyposition` varchar(255) NOT NULL,
  `numofbro` varchar(255) NOT NULL,
  `numofsis` varchar(255) NOT NULL,
  `areapplicant` varchar(255) NOT NULL,
  `coe` varchar(255) NOT NULL,
  `emergencynumber` varchar(255) NOT NULL,
  `father_name` varchar(255) NOT NULL,
  `foccupation` varchar(255) NOT NULL,
  `feducattain` varchar(255) NOT NULL,
  `fschool` varchar(255) NOT NULL,
  `fbirth` date NOT NULL,
  `fbusiness` varchar(255) NOT NULL,
  `fcontact` varchar(255) NOT NULL,
  `mother_name` varchar(255) NOT NULL,
  `moccupation` varchar(255) NOT NULL,
  `meducattain` varchar(255) NOT NULL,
  `mschool` varchar(255) NOT NULL,
  `mbirth` date NOT NULL,
  `mbusiness` varchar(255) NOT NULL,
  `mcontact` varchar(255) NOT NULL,
  `married` varchar(255) NOT NULL,
  `parents` varchar(255) NOT NULL,
  `income` varchar(255) NOT NULL,
  `nameofbroandsis` varchar(255) NOT NULL,
  `gradeschool` varchar(255) NOT NULL,
  `highschool` varchar(255) NOT NULL,
  `college` varchar(255) NOT NULL,
  `gender` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `fillup`
--

INSERT INTO `fillup` (`id`, `student_pic`, `lrn`, `lname`, `fname`, `mname`, `course_name`, `semester`, `address`, `provaddress`, `contact_number`, `birth_of_date`, `place_of_birth`, `nationality`, `religion`, `baptized`, `confirmed`, `communion`, `familyposition`, `numofbro`, `numofsis`, `areapplicant`, `coe`, `emergencynumber`, `father_name`, `foccupation`, `feducattain`, `fschool`, `fbirth`, `fbusiness`, `fcontact`, `mother_name`, `moccupation`, `meducattain`, `mschool`, `mbirth`, `mbusiness`, `mcontact`, `married`, `parents`, `income`, `nameofbroandsis`, `gradeschool`, `highschool`, `college`, `gender`) VALUES
(1, '372572801_267656512884800_5484268126099682720_n.jpg', '', 'awdad', 'wad', 'awd', 'Bachelor of Secondary Education (Major in Filipino)', '1st Semester', 'awd', 'awd', '2123123', '2023-10-15', 'awd', 'awd', 'Catholic', 'awd', 'Yes', 'Yes', '', '1', '1', '', 'awd', 'awd', 'aw', 'awd', 'awd', 'awd', '0000-00-00', 'awd', 'awd', 'awd', 'awd', 'awd', 'ad', '0000-00-00', 'WD', 'aawd', '', 'Living Together', 'Bellow 100,000', 'awd', 'awd', 'awd', 'awd', 'Male'),
(2, '', '', '', '', '', 'Bachelor of Secondary Education (Major in English)', '', '', '', '', '0000-00-00', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '0000-00-00', '', '', '', '', '', '', '0000-00-00', '', '', '', '', '', '', '', '', '', ''),
(3, '', '', '', '', '', 'Bachelor of Secondary Education (Major in Mathematics)', '', '', '', '', '0000-00-00', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '0000-00-00', '', '', '', '', '', '', '0000-00-00', '', '', '', '', '', '', '', '', '', ''),
(4, '', '', '', '', '', 'Bachelor of Secondary Education (Major in English)', '', '', '', '', '0000-00-00', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '0000-00-00', '', '', '', '', '', '', '0000-00-00', '', '', '', '', '', '', '', '', '', ''),
(5, '', '', '', '', '', 'Bachelor of Science in Information Technology', '', '', '', '', '0000-00-00', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '0000-00-00', '', '', '', '', '', '', '0000-00-00', '', '', '', '', '', '', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `report`
--

DROP TABLE IF EXISTS `report`;
CREATE TABLE `report` (
  `id` int(11) NOT NULL,
  `place` varchar(255) NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL,
  `person_name` varchar(255) NOT NULL,
  `witness_name` varchar(255) NOT NULL,
  `reportby` varchar(255) NOT NULL,
  `reason` varchar(255) NOT NULL,
  `solve` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `report`
--

INSERT INTO `report` (`id`, `place`, `date`, `time`, `person_name`, `witness_name`, `reportby`, `reason`, `solve`) VALUES
(1, 'awda', '2023-09-16', '00:00:12', 'qawd', 'sad', 'awd', 'wadwa', 'pending');

-- --------------------------------------------------------

--
-- Table structure for table `subjects`
--

DROP TABLE IF EXISTS `subjects`;
CREATE TABLE `subjects` (
  `course_id` int(11) NOT NULL,
  `course_code` varchar(255) NOT NULL,
  `course_description` varchar(255) NOT NULL,
  `units` int(255) NOT NULL,
  `prerequisite` varchar(255) NOT NULL,
  `semester` int(11) NOT NULL,
  `year` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `subjects`
--

INSERT INTO `subjects` (`course_id`, `course_code`, `course_description`, `units`, `prerequisite`, `semester`, `year`) VALUES
(1, 're 1', 'salvation history', 3, '', 1, 1),
(1, 'fil 101', 'kontekstwalisadong komunikasyon sa filipino (KOMFIL)', 3, '', 1, 1),
(1, 'eng 100', 'introduction to linguistics', 3, '', 1, 1),
(1, 'ge 1', 'understanding the self', 3, '', 1, 1),
(1, 'ge 2', 'readings in philippine history', 3, '', 1, 1),
(1, 'ge 3', 'the contemporary world', 3, '', 1, 1),
(1, 'ge 4', 'mathematics in the modern world', 3, '', 1, 1),
(1, 'pe 101', 'physical fitness and self testing activities', 2, '', 1, 1),
(1, 'nstp1', 'national service training program 1', 3, '', 1, 1),
(1, 're 2', 'christology and gospel parables', 3, '', 2, 1),
(1, 'fil 102', 'filipino sa iba’t-ibang disciplina (FILDIS)', 3, '', 2, 1),
(1, 'ge 5', 'purposive communication', 3, '', 2, 1),
(1, 'ge 6', 'arts appreciation', 3, '', 2, 1),
(1, 'educ 101', 'the child and adolescent learner and learning principles', 3, '', 2, 1),
(1, 'educ 102', 'the teaching profession', 3, '', 2, 1),
(1, 'eng 101', 'language, culture and society', 3, '', 2, 1),
(1, 'pe 102', 'rhythmic activities', 2, '', 2, 1),
(1, 'nstp 2', 'national service training program 2', 3, '', 2, 1),
(1, 're 3', 'liturgy and sacraments', 3, '', 1, 2),
(1, 'fil 103', 'sosyedad at literatura/ panitikang panlipunan (SOSLIT)', 3, '', 1, 2),
(1, 'educ 103', 'the teacher and the community, school culture and organizational leadership', 3, '', 1, 2),
(1, 'educ 104', 'foundation of special inclusive education', 3, '', 1, 2),
(1, 'educ 106', 'assessment of learning 1', 3, '', 1, 2),
(1, 'eng 102', 'structure of english', 3, '', 1, 2),
(1, 'eng 103', 'principle and theories of language acquisition and learning', 3, '', 1, 2),
(1, 'pe 103', 'individual anddual sports', 2, '', 1, 2),
(1, 're 4', 'morals', 3, '', 2, 2),
(1, 'educ 105', 'facilitating learner centered teaching', 3, '', 2, 2),
(1, 'educ 107', 'assessment of learning 2', 3, '', 2, 2),
(1, 'educ 108', 'technology for teaching and learning 1', 3, '', 2, 2),
(1, 'educ 109', 'the teacher and school curriculum ', 3, '', 2, 2),
(1, 'eng 104', 'language programs and policies in multilingual societies', 3, '', 2, 2),
(1, 'eng 105', 'preparation of language learning materials', 3, '', 2, 2),
(1, 'pe 104', 'team sports', 2, '', 2, 2),
(1, 'ge 7', 'science technology and society ', 3, '', 3, 2),
(1, 'ge 8', 'ethcis ', 3, '', 3, 2),
(1, 'ge 9', 'life and works of rizal', 3, '', 3, 2),
(1, 're 5', 'history of church and contemporary church society ', 3, '', 1, 3),
(1, 'eng 106', 'teaching and assessment of literature ', 3, '', 1, 3),
(1, 'eng 107', 'teaching and assessment of Macro-Skills ', 3, '', 1, 3),
(1, 'eng 108', 'teaching and assessment of grammar', 3, '', 1, 3),
(1, 'eng 109', 'speech and theatre arts', 3, '', 1, 3),
(1, 'eng 111', 'child and adolescent literature', 3, '', 1, 3),
(1, 'eng 112', 'mythology and folklore', 3, '', 1, 3),
(1, 'euc 110', 'building and enhancing new literacies across curriculum', 3, '', 1, 3),
(1, 're 6', 'responsible family life and ecological responsibility ', 3, '', 2, 3),
(1, 'eng 113', 'survey of philippine literature', 3, '', 2, 3),
(1, 'eng 114', 'survey of afro-asian literature', 3, '', 2, 3),
(1, 'eng 115', 'survey of english american literature', 3, '', 2, 3),
(1, 'eng 116', 'contemporary popular and emergent literature', 3, '', 2, 3),
(1, 'eng 116 ', 'contemporary popular and emergent literature', 3, '', 2, 3),
(1, 'eng 117', 'literacy critiscism', 3, '', 2, 3),
(1, 'eng 118 ', 'technical writing', 3, '', 2, 3),
(1, 'educ 111', 'field study 1', 3, '', 2, 3),
(1, 'eng 110', 'language research', 3, '', 1, 4),
(1, 'eng 119 ', 'campus journalism', 3, '', 1, 4),
(1, 'eng 120', 'technology for teaching and learning 2', 3, '', 1, 4),
(1, 'eng-elect 3', 'english for specific purpose', 3, '', 1, 4),
(1, 'eng-elect 3 ', 'creative writing 3', 3, '', 1, 4),
(1, 'educ 112', 'field study 2', 3, '', 1, 4),
(1, 'educ 113', 'teaching intership', 6, '', 2, 4),
(1, 'eng 112', 'mythology and folklore', 3, '', 1, 3),
(1, 'euc 110', 'building and enhancing new literacies across curriculum', 3, '', 1, 3),
(1, 're 6', 'responsible family life and ecological responsibility ', 3, '', 2, 3),
(1, 'eng 113', 'survey of philippine literature', 3, '', 2, 3),
(1, 'eng 114', 'survey of afro-asian literature', 3, '', 2, 3),
(1, 'eng 115', 'survey of english american literature', 3, '', 2, 3),
(1, 'eng 116', 'contemporary popular and emergent literature', 3, '', 2, 3),
(1, 'eng 116 ', 'contemporary popular and emergent literature', 3, '', 2, 3),
(1, 'eng 117', 'literacy critiscism', 3, '', 2, 3),
(1, 'eng 118 ', 'technical writing', 3, '', 2, 3),
(1, 'educ 111', 'field study 1', 3, '', 2, 3),
(1, 'eng 110', 'language research', 3, '', 1, 4),
(1, 'eng 119 ', 'campus journalism', 3, '', 1, 4),
(1, 'eng 120', 'technology for teaching and learning 2', 3, '', 1, 4),
(1, 'eng-elect 3', 'english for specific purpose', 3, '', 1, 4),
(1, 'eng-elect 3 ', 'creative writing 3', 3, '', 1, 4),
(1, 'educ 112', 'field study 2', 3, '', 1, 4),
(1, 'educ 113', 'teaching intership', 6, '', 2, 4),
(2, 're 1', 'salvation history', 3, '', 1, 1),
(2, 'fil 101', 'kontekstwalisadong komunikasyon sa filipino (KOMFIL)', 3, '', 1, 1),
(2, 'ge 1', 'readings in philippine history', 3, '', 1, 1),
(2, 'ge 2 ', 'understanding the self', 3, '', 1, 1),
(2, 'ge 3', 'the contemporary world', 3, '', 1, 1),
(2, 'ge 4 ', 'mathematics in the modern world', 3, '', 1, 1),
(2, 'lit 101', 'contemporary philippine literature in english', 3, '', 1, 1),
(2, 'pe 101 ', 'physical fitness and self-testing activities', 2, '', 1, 1),
(2, 'nstp 1', 'national service training program', 3, '', 1, 1),
(2, 're 2 ', 'christology and gospel parables', 3, '', 2, 1),
(2, 'fil 102', 'filipino sa iba\'t-ibang disiplina (FILDIS)', 3, '', 2, 1),
(2, 'ge 5', 'purposive communications', 3, '', 2, 1),
(2, 'ge 6', 'arts appreciation', 3, '', 2, 1),
(2, 'educ 101', 'the child and adolescent learner and learning principles', 3, '', 2, 1),
(2, 'euc 102', 'the teaching profession', 3, '', 2, 1),
(2, 'educ 109', 'the teacher and the school curriculum', 3, '', 2, 1),
(2, 'pe 102', 'rhythmic activies', 2, '', 2, 1),
(2, 'nstp 2', 'national services program', 3, '', 2, 1),
(2, 're 3', 'liturgy and sacraments', 3, '', 1, 2),
(2, 'fil 103 ', 'retorika masining na pagpapahayag ', 3, '', 1, 2),
(2, 'educ 103', 'the teacher and the community, school culture and organizational leadership', 3, '', 1, 2),
(2, 'educ 104', 'foundation of special inclusive education', 3, '', 1, 2),
(2, 'gemc 100 ', 'teaching science in the elementary grades (bio and chemistry)', 3, '', 1, 2),
(2, 'gemc 101', 'teaching science in elementary grades (physics, earth and space sciece) ', 3, '', 1, 2),
(2, 'gemc 102', 'teaching social studies in the elementary grades (philippine history and government)', 3, '', 1, 2),
(2, 'pe 103', 'individual and dual sports', 2, '', 1, 2),
(2, 're 4 ', 'morals ', 3, '', 2, 2),
(2, 'educ 105', 'facilitating learner-centered teaching ', 3, '', 2, 2),
(2, 'lit 102 ', 'sosyedad at literatura/panitikang panlipunan (SOSLIT)', 3, '', 2, 2),
(2, 'educ 107', 'assessment of learning 2', 3, '', 2, 2),
(2, 'educ 108', 'technology for teaching and learning 1', 3, '', 2, 2),
(2, 'gemc 103 ', 'teaching social studies in elementary grades (culture and geography)', 3, '', 2, 2),
(2, 'gemc 104', 'pagtuturo ng filipino sa elementarya (1) estraktura at gamit ng wikang filipino ', 3, '', 2, 2),
(2, 'gemc 106', 'teaching math in the primary grades', 3, '', 2, 2),
(2, 'pe 104 ', 'team sports', 2, '', 2, 2),
(2, 're 1', 'salvation history', 3, '', 1, 1),
(2, 'fil 101', 'kontekstwalisadong komunikasyon sa filipino (KOMFIL)', 3, '', 1, 1),
(2, 'ge 1', 'readings in philippine history', 3, '', 1, 1),
(2, 'ge 2 ', 'understanding the self', 3, '', 1, 1),
(2, 'ge 3', 'the contemporary world', 3, '', 1, 1),
(2, 'ge 4 ', 'mathematics in the modern world', 3, '', 1, 1),
(2, 'lit 101', 'contemporary philippine literature in english', 3, '', 1, 1),
(2, 'pe 101 ', 'physical fitness and self-testing activities', 2, '', 1, 1),
(2, 'nstp 1', 'national service training program', 3, '', 1, 1),
(2, 're 2 ', 'christology and gospel parables', 3, '', 2, 1),
(2, 'fil 102', 'filipino sa iba\'t-ibang disiplina (FILDIS)', 3, '', 2, 1),
(2, 'ge 5', 'purposive communications', 3, '', 2, 1),
(2, 'ge 6', 'arts appreciation', 3, '', 2, 1),
(2, 'educ 101', 'the child and adolescent learner and learning principles', 3, '', 2, 1),
(2, 'euc 102', 'the teaching profession', 3, '', 2, 1),
(2, 'educ 109', 'the teacher and the school curriculum', 3, '', 2, 1),
(2, 'pe 102', 'rhythmic activies', 2, '', 2, 1),
(2, 'nstp 2', 'national services program', 3, '', 2, 1),
(2, 're 3', 'liturgy and sacraments', 3, '', 1, 2),
(2, 'fil 103 ', 'retorika masining na pagpapahayag ', 3, '', 1, 2),
(2, 'educ 103', 'the teacher and the community, school culture and organizational leadership', 3, '', 1, 2),
(2, 'educ 104', 'foundation of special inclusive education', 3, '', 1, 2),
(2, 'gemc 100 ', 'teaching science in the elementary grades (bio and chemistry)', 3, '', 1, 2),
(2, 'gemc 101', 'teaching science in elementary grades (physics, earth and space sciece) ', 3, '', 1, 2),
(2, 'gemc 102', 'teaching social studies in the elementary grades (philippine history and government)', 3, '', 1, 2),
(2, 'pe 103', 'individual and dual sports', 2, '', 1, 2),
(2, 're 4 ', 'morals ', 3, '', 2, 2),
(2, 'educ 105', 'facilitating learner-centered teaching ', 3, '', 2, 2),
(2, 'lit 102 ', 'sosyedad at literatura/panitikang panlipunan (SOSLIT)', 3, '', 2, 2),
(2, 'educ 107', 'assessment of learning 2', 3, '', 2, 2),
(2, 'educ 108', 'technology for teaching and learning 1', 3, '', 2, 2),
(2, 'gemc 103 ', 'teaching social studies in elementary grades (culture and geography)', 3, '', 2, 2),
(2, 'gemc 104', 'pagtuturo ng filipino sa elementarya (1) estraktura at gamit ng wikang filipino ', 3, '', 2, 2),
(2, 'gemc 106', 'teaching math in the primary grades', 3, '', 2, 2),
(2, 'pe 104 ', 'team sports', 2, '', 2, 2),
(2, 'ge 7', 'science technology and society ', 3, '', 3, 2),
(2, 'ge 8 ', 'ethics', 3, '', 3, 2),
(2, 'ge 9', 'life and works of rizal ', 3, '', 3, 2),
(2, 're 5', 'history of the church and contemporary church society', 3, '', 1, 3),
(2, 'gemc 105 ', 'pagtuturo ng filipino sa elementarya (II) panitikan ng pilipinas', 3, '', 1, 3),
(2, 'gemc 107', 'teaching math in intermediate', 3, '', 1, 3),
(2, 'gemc 108', 'edukasyon pantahanan at pangkabuhayan', 3, '', 1, 3),
(2, 'gemc 110', 'teaching music in elementary grades', 3, '', 1, 3),
(2, 'gemc 111', 'teaching arts in elementary grades', 3, '', 1, 3),
(2, 'educ 110 ', 'building and enhancing new literacies across curriculum', 3, '', 1, 3),
(2, 'gemc ', 'teaching english in the elementary grades through literature', 3, '', 1, 3),
(2, 're 6', 'reponsible family life and ecological responsibility', 3, '', 2, 3),
(2, 'gemc 109', 'edukasyon pantahanan at pangkabuhayan (II) enterpreneurship', 3, '', 2, 3),
(2, 'gemc 112', 'teaching PE and health in elementary grades', 3, '', 2, 3),
(2, 'gemc 113 ', 'teaching english in elementary grades (language arts', 3, '', 2, 3),
(2, 'gemc 116', 'good manners and right conduct (edukasyon sa pagpapakatao)', 3, '', 2, 3),
(2, 'gemc 115', 'content and pedagogy for the mother-tongue', 3, '', 2, 3),
(2, 'gemc 118 ', 'technology for teaching and elementary grades', 3, '', 2, 3),
(2, 'gened-elec 1', 'teaching multi-grade classes', 3, '', 2, 3),
(2, 'educ 111', 'field study 1', 3, '', 1, 4),
(2, 'educ 112 ', 'field study 2', 3, '', 1, 4),
(2, 'gemc 117', 'research in education', 3, '', 1, 4),
(2, 'educ 113', 'teaching internship ', 6, '', 2, 4),
(2, 'ge 7', 'science technology and society ', 3, '', 3, 2),
(2, 'ge 8 ', 'ethics', 3, '', 3, 2),
(2, 'ge 9', 'life and works of rizal ', 3, '', 3, 2),
(2, 're 5', 'history of the church and contemporary church society', 3, '', 1, 3),
(2, 'gemc 105 ', 'pagtuturo ng filipino sa elementarya (II) panitikan ng pilipinas', 3, '', 1, 3),
(2, 'gemc 107', 'teaching math in intermediate', 3, '', 1, 3),
(2, 'gemc 108', 'edukasyon pantahanan at pangkabuhayan', 3, '', 1, 3),
(2, 'gemc 110', 'teaching music in elementary grades', 3, '', 1, 3),
(2, 'gemc 111', 'teaching arts in elementary grades', 3, '', 1, 3),
(2, 'educ 110 ', 'building and enhancing new literacies across curriculum', 3, '', 1, 3),
(2, 'gemc ', 'teaching english in the elementary grades through literature', 3, '', 1, 3),
(2, 're 6', 'reponsible family life and ecological responsibility', 3, '', 2, 3),
(2, 'gemc 109', 'edukasyon pantahanan at pangkabuhayan (II) enterpreneurship', 3, '', 2, 3),
(2, 'gemc 112', 'teaching PE and health in elementary grades', 3, '', 2, 3),
(2, 'gemc 113 ', 'teaching english in elementary grades (language arts', 3, '', 2, 3),
(2, 'gemc 116', 'good manners and right conduct (edukasyon sa pagpapakatao)', 3, '', 2, 3),
(2, 'gemc 115', 'content and pedagogy for the mother-tongue', 3, '', 2, 3),
(2, 'gemc 118 ', 'technology for teaching and elementary grades', 3, '', 2, 3),
(2, 'gened-elec 1', 'teaching multi-grade classes', 3, '', 2, 3),
(2, 'educ 111', 'field study 1', 3, '', 1, 4),
(2, 'educ 112 ', 'field study 2', 3, '', 1, 4),
(2, 'gemc 117', 'research in education', 3, '', 1, 4),
(2, 'educ 113', 'teaching internship ', 6, '', 2, 4),
(7, 're 1', 'Salvation History', 3, '', 1, 1),
(7, 'fil 101', 'Kontekstwalisadong Komunikasyon sa Filipino (KOMFIL)', 3, '', 1, 1),
(7, 'ge 1', 'Understanding the self', 3, '', 1, 1),
(7, 'ge 2', 'Readings in Philippine History', 3, '', 1, 1),
(7, 'ge 3', 'The Contemporary World', 7, '', 1, 1),
(7, 'ge 4', 'Mathematics in the Modern World', 3, '', 1, 1),
(7, 'pe 101', 'Physical fitness and Self Testing Activities', 2, '', 1, 1),
(7, 'nstp 1', 'National Service Training Program 1', 3, '', 1, 1),
(7, 're 2', 'Christology and Gospel Parables', 3, '', 2, 1),
(7, 'fil 102', 'Filipino sa Iba’t-ibang Disciplina (FILDIS)', 3, '', 2, 1),
(7, 'ge 5', 'Purposive Communication', 3, '', 2, 1),
(7, 'ge 6', 'Arts Appreciation', 3, '', 2, 1),
(7, 'educ 101', 'The child and adolescent Learner and learning principles', 3, '', 2, 1),
(7, 'educ 102', 'The teaching Profession', 3, '', 2, 1),
(7, 'pe 102', 'Rhythmic Activities', 2, '', 2, 1),
(7, 'nstp 2', 'National Service Training Program 2', 3, '', 2, 1),
(7, 're 3', 'Liturgy and Sacraments', 3, '', 1, 2),
(7, 'fil 103', 'Sosyedad at Literatura/ Panitikang Panlipunan (SOSLIT)', 3, '', 1, 2),
(7, 'educ 103', 'The Teacher and the Community, School Culture and Organizational Leadership', 3, '', 1, 2),
(7, 'educ 104', 'Foundation of Special Inclusive Education', 3, '', 1, 2),
(7, 'educ 106', 'Assessment of Learning 1', 3, '', 1, 2),
(7, 'fili 101', 'Introduksyon sa Pag-aaral ng Wika', 3, '', 1, 2),
(7, 'fili 102', 'Panimulang Linggwistika', 3, '', 1, 2),
(7, 'pe 103', 'Individual and Dual sports ', 2, '', 1, 2),
(7, 're 4', 'morals', 3, '', 2, 2),
(7, 'educ 105', 'Facilitating Learner Centered Teaching', 3, '', 2, 2),
(7, 'educ 107', 'Assessment of Learning 2', 3, '', 2, 2),
(7, 'educ 108', 'Technology for teaching and learning 1', 3, '', 2, 2),
(7, 'educ 109', 'The teacher and School Curriculum', 3, '', 2, 2),
(7, 'fili 103', 'Ang Filipino sa Kurikulum ng Batayang Edukasyon', 3, '', 2, 2),
(7, 'fili 104', 'Estraktura ng Wikang Filipino', 3, '', 2, 2),
(7, 'pe 104', 'Team sports', 2, '', 2, 2),
(7, 'ge 7', 'Science, Technology and Society', 3, '', 3, 2),
(7, 'ge 8', 'ethics', 3, '', 3, 2),
(7, 'ge 9', 'life and works of rizal', 3, '', 3, 2),
(7, 're 5', 'History of Church and Contemporary Church Society', 3, '', 1, 3),
(7, 'fili 105', 'Pagtuturo at Pagtataya sa Makrong kasanayang pangwika', 3, '', 1, 3),
(7, 'fili 106', 'Ugnayan ng wika kultura at Lipunan', 3, '', 1, 3),
(7, 'fil 118', 'Panulaang Filipino', 3, '', 1, 3),
(7, 'fil 119', 'Dulaang Filipino', 3, '', 1, 3),
(7, 'fili 110', 'Introduksyon sa Pamamahayag', 3, '', 1, 3),
(7, 'fili 111', 'Barayti at Baryasyon ng wika', 3, '', 1, 3),
(7, 'educ 110', 'Building and Enhancing New literacies Across Curriculum', 3, '', 1, 3),
(7, 're 6', 'Responsible Family life and Ecological Responsibility', 3, '', 2, 3),
(7, 'fili 112', 'Mga Nata tanging Diskurso sa Wika at Panitikan', 3, '', 2, 3),
(7, 'fili 113', 'Panitikan ng Rehiyon', 3, '', 2, 3),
(7, 'fili 114', 'Kulturang Popular', 3, '', 2, 3),
(7, 'fili 115', 'sanaysay at talumpati', 3, '', 2, 3),
(7, 'fili 107', 'Paghahanda sa Ebalwasyon ng Kagamitang panturo', 3, '', 1, 4),
(7, 'fili 108', 'Introduksyon sa Pagsasalin', 3, '', 1, 4),
(7, 'fili 107', 'Paghahanda sa Ebalwasyon ng Kagamitang panturo', 3, '', 1, 4),
(7, 'fili 108', 'Introduksyon sa Pagsasalin', 3, '', 1, 4),
(7, 'fili 109', 'Introduksyon sa Pananaliksik - Wika at Panitikan', 3, '', 1, 4),
(7, 'fili 110', 'Technology for teaching and Learning 2', 3, '', 1, 4),
(7, 'fil-elec 2', 'Filipino bilang ikalawang wika', 3, '', 1, 4),
(7, 'fil-elec 3', 'Malikhaing pagsulat', 3, '', 1, 4),
(7, 'educ 112', 'field study 2', 3, '', 1, 4),
(7, 'educ 113', 'teaching intership', 6, '', 2, 4),
(7, 'fili 109', 'Introduksyon sa Pananaliksik - Wika at Panitikan', 3, '', 1, 4),
(7, 'fili 110', 'Technology for teaching and Learning 2', 3, '', 1, 4),
(7, 'fil-elec 2', 'Filipino bilang ikalawang wika', 3, '', 1, 4),
(7, 'fil-elec 3', 'Malikhaing pagsulat', 3, '', 1, 4),
(7, 'educ 112', 'field study 2', 3, '', 1, 4),
(7, 'educ 113', 'teaching intership', 6, '', 2, 4);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `lname` varchar(255) NOT NULL,
  `mname` varchar(255) NOT NULL,
  `fname` varchar(255) NOT NULL,
  `course_belong` varchar(255) NOT NULL,
  `profile` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `role` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `lname`, `mname`, `fname`, `course_belong`, `profile`, `username`, `password`, `title`, `role`, `status`) VALUES
(1, 'Buaron', 'A.', 'Kenno', '', '', 'admin', 'password', '', 'admin', 'approved'),
(3, 'Calunsag', 'B. ', 'James Lloyd', 'Bachelor of Secondary Education ', 'download.jpg', 'jems', '123', 'LPT', 'adviser', 'approved');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `course`
--
ALTER TABLE `course`
  ADD PRIMARY KEY (`course_id`);

--
-- Indexes for table `files`
--
ALTER TABLE `files`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fillup`
--
ALTER TABLE `fillup`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `report`
--
ALTER TABLE `report`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `course`
--
ALTER TABLE `course`
  MODIFY `course_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `files`
--
ALTER TABLE `files`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `fillup`
--
ALTER TABLE `fillup`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `report`
--
ALTER TABLE `report`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
