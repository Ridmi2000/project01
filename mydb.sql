-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 13, 2023 at 06:34 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mydb`
--

-- --------------------------------------------------------

--
-- Table structure for table `absencerecords`
--

CREATE TABLE `absencerecords` (
  `id` int(11) NOT NULL,
  `fullName` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `enrollmentNumber` varchar(50) NOT NULL,
  `contactNumber` varchar(20) NOT NULL,
  `sportType` varchar(50) NOT NULL,
  `dateFrom` date NOT NULL,
  `dateTo` date NOT NULL,
  `numberOfDates` int(11) NOT NULL,
  `reasonForAbsence` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `absencerecords`
--

INSERT INTO `absencerecords` (`id`, `fullName`, `address`, `enrollmentNumber`, `contactNumber`, `sportType`, `dateFrom`, `dateTo`, `numberOfDates`, `reasonForAbsence`) VALUES
(1, 'dinoshi sewwandi', 'no 04,madugasthenna,maharathenna,menikhinna', 'uwu/iit/20/27', '+94765609128', 'basketball', '2023-11-07', '2023-11-15', 3, 'no'),
(2, 'dinoshi sewwandi', 'no 04,madugasthenna,maharathenna,menikhinna', 'uwu/iit/20/27', '+94765609128', 'basketball', '2023-11-07', '2023-11-15', 3, 'no'),
(3, 'dinoshi sewwandi', 'no 04,madugasthenna,maharathenna,menikhinna', 'uwu/iit/20/27', '+94765609128', 'basketball', '2023-11-07', '2023-11-15', 3, 'no'),
(4, 'dinoshi sewwandi', 'no 04,madugasthenna,maharathenna,menikhinna', 'uwu/iit/20/27', '+94765609128', 'basketball', '2023-11-07', '2023-11-15', 3, 'no'),
(5, 'dinoshi sewwandi', 'no 04,madugasthenna,maharathenna,menikhinna', 'uwu/iit/20/27', '+94765609128', 'tennis', '2022-12-12', '2022-12-12', 3, 'no'),
(6, 'dinoshi sewwandi', 'no 04,madugasthenna,maharathenna,menikhinna', 'uwu/iit/20/27', '+94765609128', 'tennis', '2022-12-12', '2022-12-12', 3, 'no'),
(7, 'dinoshi sewwandi', 'no 04,madugasthenna,maharathenna,menikhinna', 'uwu/iit/20/27', '+94765609128', 'tennis', '2022-12-12', '2022-12-12', 3, 'no'),
(8, 'dinoshi sewwandi', 'no 04,madugasthenna,maharathenna,menikhinna', 'uwu/iit/20/27', '+94765609128', 'tennis', '2022-12-12', '2022-12-12', 3, 'no'),
(9, 'dinoshi sewwandi', 'no 04,madugasthenna,maharathenna,menikhinna', 'uwu/iit/20/27', '+94765609128', 'basketball', '2023-11-02', '2023-11-14', 12, 'no'),
(10, 'dinoshi sewwandi', 'no 04,madugasthenna,maharathenna,menikhinna', 'uwu/iit/20/27', '+94765609128', 'basketball', '2023-11-02', '2023-11-14', 12, 'no'),
(11, 'dinoshi sewwandi', 'no 04,madugasthenna,maharathenna,menikhinna', 'uwu/iit/20/27', '+94765609128', 'basketball', '2023-11-02', '2023-11-14', 12, 'no'),
(12, 'dinoshi sewwandi', 'no 04,madugasthenna,maharathenna,menikhinna', 'uwu/iit/20/27', '+94765609128', 'basketball', '2023-11-02', '2023-11-14', 12, 'no'),
(13, 'kamani rathnayaka', 'no 04,madugasthenna,maharathenna,menikhinna', 'uwu/iit/20/27', '+94765609128', 'basketball', '2023-11-22', '2023-11-29', 2, 'no'),
(14, 'kamani rathnayaka', 'no 04,madugasthenna,maharathenna,menikhinna', 'uwu/iit/20/27', '+94765609128', 'basketball', '2023-11-22', '2023-11-29', 2, 'no');

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `full_name` varchar(255) NOT NULL,
  `university_email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `sport_type` varchar(20) NOT NULL,
  `phone_no` varchar(15) NOT NULL,
  `is_team_captain` tinyint(1) NOT NULL DEFAULT 0,
  `address` varchar(255) NOT NULL,
  `district` varchar(255) NOT NULL,
  `birthday` date NOT NULL,
  `nic` varchar(12) NOT NULL,
  `degree` varchar(255) NOT NULL,
  `faculty` varchar(255) NOT NULL,
  `enrollment_no` varchar(20) NOT NULL,
  `gender` enum('male','female') NOT NULL,
  `medical_issues` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `full_name`, `university_email`, `password`, `sport_type`, `phone_no`, `is_team_captain`, `address`, `district`, `birthday`, `nic`, `degree`, `faculty`, `enrollment_no`, `gender`, `medical_issues`) VALUES
(1, 'L.M.Perera', 'iit20001@std.uwu.ac.lk', 'Perera@1234', 'Cricket', '0775855588', 1, 'No 335/1 Passara', 'galle', '1998-05-02', '199805219819', 'iit', 'applied science', 'iit20001', 'male', 'No');

-- --------------------------------------------------------

--
-- Table structure for table `adminresignation`
--

CREATE TABLE `adminresignation` (
  `id` int(11) NOT NULL,
  `fullName` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `nic` varchar(15) NOT NULL,
  `degree` varchar(255) NOT NULL,
  `enrollmentNumber` varchar(20) NOT NULL,
  `sportsName` varchar(50) NOT NULL,
  `reason` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `attendance`
--

CREATE TABLE `attendance` (
  `ID` int(11) NOT NULL,
  `SportType` varchar(255) DEFAULT NULL,
  `Date` date DEFAULT NULL,
  `EnrollmentNumber` varchar(255) DEFAULT NULL,
  `FullName` varchar(255) DEFAULT NULL,
  `Status` enum('present','absent') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `attendance`
--

INSERT INTO `attendance` (`ID`, `SportType`, `Date`, `EnrollmentNumber`, `FullName`, `Status`) VALUES
(1, 'basketball', '2023-11-14', 'EN345678', 'Bob Johnson', 'present'),
(2, 'basketball', '2023-11-14', 'EN890123', 'Sophia Taylor', 'present'),
(3, 'basketball', '2023-11-14', 'EN123012', 'Matthew Moore', 'present'),
(4, 'basketball', '2023-11-14', 'EN456345', 'Ava White', 'present'),
(5, 'basketball', '2023-11-14', 'EN789678', 'Nathan Hall', 'present'),
(6, 'basketball', '2023-11-14', 'EN012901', 'Lily Garcia', 'present'),
(7, 'football', '2023-11-14', 'EN123456', 'John Doe', 'present'),
(8, 'football', '2023-11-14', 'EN456789', 'Alice Williams', 'absent'),
(9, 'football', '2023-11-14', 'EN678901', 'Eva Anderson', 'absent'),
(10, 'football', '2023-11-14', 'EN901234', 'Daniel Brown', 'absent'),
(11, 'football', '2023-11-14', 'EN234123', 'Emily Jones', 'absent'),
(12, 'football', '2023-11-14', 'EN567456', 'Michael Lee', 'present'),
(13, 'football', '2023-11-14', 'EN890789', 'Aria Baker', 'present'),
(14, 'football', '2023-11-14', 'EN123456', 'John Doe', 'present'),
(15, 'football', '2023-11-14', 'EN456789', 'Alice Williams', 'present'),
(16, 'football', '2023-11-14', 'EN678901', 'Eva Anderson', 'present'),
(17, 'football', '2023-11-14', 'EN901234', 'Daniel Brown', 'absent'),
(18, 'football', '2023-11-14', 'EN234123', 'Emily Jones', 'absent'),
(19, 'football', '2023-11-14', 'EN567456', 'Michael Lee', 'absent'),
(20, 'football', '2023-11-14', 'EN890789', 'Aria Baker', 'absent'),
(21, 'basketball', '2023-11-13', 'EN345678', 'Bob Johnson', 'present'),
(22, 'basketball', '2023-11-13', 'EN890123', 'Sophia Taylor', 'present'),
(23, 'basketball', '2023-11-13', 'EN123012', 'Matthew Moore', 'absent'),
(24, 'basketball', '2023-11-13', 'EN456345', 'Ava White', 'absent'),
(25, 'basketball', '2023-11-13', 'EN789678', 'Nathan Hall', 'present'),
(26, 'basketball', '2023-11-13', 'EN012901', 'Lily Garcia', 'present'),
(27, 'football', '2023-11-14', 'EN123456', 'John Doe', 'present'),
(28, 'football', '2023-11-14', 'EN456789', 'Alice Williams', 'present'),
(29, 'football', '2023-11-14', 'EN678901', 'Eva Anderson', 'present'),
(30, 'football', '2023-11-14', 'EN901234', 'Daniel Brown', 'present'),
(31, 'football', '2023-11-14', 'EN234123', 'Emily Jones', 'absent'),
(32, 'football', '2023-11-14', 'EN567456', 'Michael Lee', 'absent'),
(33, 'football', '2023-11-14', 'EN890789', 'Aria Baker', 'absent'),
(34, 'basketball', '2023-11-15', 'EN345678', 'Bob Johnson', 'present'),
(35, 'basketball', '2023-11-15', 'EN890123', 'Sophia Taylor', 'present'),
(36, 'basketball', '2023-11-15', 'EN123012', 'Matthew Moore', 'present'),
(37, 'basketball', '2023-11-15', 'EN456345', 'Ava White', 'absent'),
(38, 'basketball', '2023-11-15', 'EN789678', 'Nathan Hall', 'absent'),
(39, 'basketball', '2023-11-15', 'EN012901', 'Lily Garcia', 'absent'),
(40, 'basketball', '2023-11-14', 'EN345678', 'Bob Johnson', 'present'),
(41, 'basketball', '2023-11-14', 'EN890123', 'Sophia Taylor', 'present'),
(42, 'basketball', '2023-11-14', 'EN123012', 'Matthew Moore', 'present'),
(43, 'basketball', '2023-11-14', 'EN456345', 'Ava White', 'absent'),
(44, 'basketball', '2023-11-14', 'EN789678', 'Nathan Hall', 'absent'),
(45, 'basketball', '2023-11-14', 'EN012901', 'Lily Garcia', 'absent'),
(46, 'basketball', '2023-11-01', 'EN345678', 'Bob Johnson', 'present'),
(47, 'basketball', '2023-11-01', 'EN890123', 'Sophia Taylor', 'present'),
(48, 'basketball', '2023-11-01', 'EN123012', 'Matthew Moore', 'present'),
(49, 'basketball', '2023-11-01', 'EN456345', 'Ava White', 'absent'),
(50, 'basketball', '2023-11-01', 'EN789678', 'Nathan Hall', 'absent'),
(51, 'basketball', '2023-11-01', 'EN012901', 'Lily Garcia', 'absent'),
(52, 'football', '2023-11-17', 'EN123456', 'John Doe', 'present'),
(53, 'football', '2023-11-17', 'EN456789', 'Alice Williams', 'absent'),
(54, 'football', '2023-11-17', 'EN678901', 'Eva Anderson', 'present'),
(55, 'football', '2023-11-17', 'EN901234', 'Daniel Brown', 'present'),
(56, 'football', '2023-11-17', 'EN234123', 'Emily Jones', 'absent'),
(57, 'football', '2023-11-17', 'EN567456', 'Michael Lee', 'absent'),
(58, 'football', '2023-11-17', 'EN890789', 'Aria Baker', 'absent'),
(59, 'football', '2023-11-14', 'EN123456', 'John Doe', 'present'),
(60, 'football', '2023-11-14', 'EN456789', 'Alice Williams', 'present'),
(61, 'football', '2023-11-14', 'EN678901', 'Eva Anderson', 'present'),
(62, 'football', '2023-11-14', 'EN901234', 'Daniel Brown', 'present'),
(63, 'football', '2023-11-14', 'EN234123', 'Emily Jones', 'absent'),
(64, 'football', '2023-11-14', 'EN567456', 'Michael Lee', 'absent'),
(65, 'football', '2023-11-14', 'EN890789', 'Aria Baker', 'absent'),
(66, 'basketball', '2023-11-23', 'EN123456', 'John Doe', 'present'),
(67, 'basketball', '2023-11-23', 'EN654321', 'Alice Smith', 'present'),
(68, 'basketball', '2023-11-23', 'EN789012', 'Bob Johnson', 'present'),
(69, 'basketball', '2023-11-23', 'EN345678', 'Emma Davis', 'present'),
(70, 'basketball', '2023-11-23', 'EN222333', 'Michael Wilson', 'present'),
(71, 'basketball', '2023-11-23', 'EN456789', 'Sophia Brown', 'absent'),
(72, 'basketball', '2023-11-23', 'EN567890', 'William Miller', 'absent'),
(73, 'basketball', '2023-11-23', 'EN901234', 'Olivia Lee', 'absent'),
(74, 'basketball', '2023-11-23', 'EN678901', 'Daniel Taylor', 'absent'),
(75, 'basketball', '2023-11-23', 'EN123789', 'Mia Garcia', 'absent'),
(76, 'basketball', '2023-11-23', 'EN123456', 'John Doe', 'present'),
(77, 'basketball', '2023-11-23', 'EN654321', 'Alice Smith', 'present'),
(78, 'basketball', '2023-11-23', 'EN789012', 'Bob Johnson', 'present'),
(79, 'basketball', '2023-11-23', 'EN345678', 'Emma Davis', 'present'),
(80, 'basketball', '2023-11-23', 'EN222333', 'Michael Wilson', 'present'),
(81, 'basketball', '2023-11-23', 'EN456789', 'Sophia Brown', 'absent'),
(82, 'basketball', '2023-11-23', 'EN567890', 'William Miller', 'absent'),
(83, 'basketball', '2023-11-23', 'EN901234', 'Olivia Lee', 'absent'),
(84, 'basketball', '2023-11-23', 'EN678901', 'Daniel Taylor', 'absent'),
(85, 'basketball', '2023-11-23', 'EN123789', 'Mia Garcia', 'absent'),
(86, 'basketball', '2023-11-23', 'uwu/iit/20/27', 'dinoshi sewwandi', 'present'),
(87, 'basketball', '2023-11-24', 'EN345678', 'Bob Johnson', 'present'),
(88, 'basketball', '2023-11-24', 'EN890123', 'Sophia Taylor', 'present'),
(89, 'basketball', '2023-11-24', 'EN123012', 'Matthew Moore', 'present'),
(90, 'basketball', '2023-11-24', 'EN456345', 'Ava White', 'absent'),
(91, 'basketball', '2023-11-24', 'EN789678', 'Nathan Hall', 'absent'),
(92, 'basketball', '2023-11-24', 'EN012901', 'Lily Garcia', 'absent'),
(93, 'basketball', '2023-11-24', 'EN345678', 'Bob Johnson', 'present'),
(94, 'basketball', '2023-11-24', 'EN890123', 'Sophia Taylor', 'present'),
(95, 'basketball', '2023-11-24', 'EN123012', 'Matthew Moore', 'present'),
(96, 'basketball', '2023-11-24', 'EN456345', 'Ava White', 'absent'),
(97, 'basketball', '2023-11-24', 'EN789678', 'Nathan Hall', 'absent'),
(98, 'basketball', '2023-11-24', 'EN012901', 'Lily Garcia', 'absent'),
(99, 'basketball', '2023-12-03', 'EN345678', 'Bob Johnson', 'present'),
(100, 'basketball', '2023-12-03', 'EN890123', 'Sophia Taylor', 'present'),
(101, 'basketball', '2023-12-03', 'EN123012', 'Matthew Moore', 'present'),
(102, 'basketball', '2023-12-03', 'EN456345', 'Ava White', 'absent'),
(103, 'basketball', '2023-12-03', 'EN789678', 'Nathan Hall', 'absent'),
(104, 'basketball', '2023-12-03', 'EN012901', 'Lily Garcia', 'absent');

-- --------------------------------------------------------

--
-- Table structure for table `badminton`
--

CREATE TABLE `badminton` (
  `id` int(11) NOT NULL,
  `time` varchar(255) NOT NULL,
  `monday` varchar(255) NOT NULL,
  `tuesday` varchar(255) NOT NULL,
  `wednesday` varchar(255) NOT NULL,
  `thursday` varchar(255) NOT NULL,
  `friday` varchar(255) NOT NULL,
  `saturday` varchar(255) NOT NULL,
  `sunday` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `chess`
--

CREATE TABLE `chess` (
  `id` int(11) NOT NULL,
  `time` varchar(255) NOT NULL,
  `monday` varchar(255) NOT NULL,
  `tuesday` varchar(255) NOT NULL,
  `wednesday` varchar(255) NOT NULL,
  `thursday` varchar(255) NOT NULL,
  `friday` varchar(255) NOT NULL,
  `saturday` varchar(255) NOT NULL,
  `sunday` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cricket`
--

CREATE TABLE `cricket` (
  `id` int(11) NOT NULL,
  `time` varchar(255) NOT NULL,
  `monday` varchar(255) NOT NULL,
  `tuesday` varchar(255) NOT NULL,
  `wednesday` varchar(255) NOT NULL,
  `thursday` varchar(255) NOT NULL,
  `friday` varchar(255) NOT NULL,
  `saturday` varchar(255) NOT NULL,
  `sunday` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `donations`
--

CREATE TABLE `donations` (
  `id` int(11) NOT NULL,
  `full_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `contact_number` varchar(20) NOT NULL,
  `nic_number` varchar(12) NOT NULL,
  `occupation` varchar(255) NOT NULL,
  `donation_date` date NOT NULL,
  `donation_amount` decimal(10,2) NOT NULL,
  `description` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `donations`
--

INSERT INTO `donations` (`id`, `full_name`, `email`, `address`, `contact_number`, `nic_number`, `occupation`, `donation_date`, `donation_amount`, `description`) VALUES
(1, 'dinoshi sewwandi', 'dinosewwandi@gmail.com', 'no 04,madugasthenna,maharathenna,menikhinna', '+94765609128', '2004345678', 'dgdfg', '2023-11-30', 1.00, 'no'),
(2, 'dinoshi sewwandi', 'dinosewwandi@gmail.com', 'no 04,madugasthenna,maharathenna,menikhinna', '+94765609128', '2004345678', 'dgdfg', '2023-11-30', 1.00, 'no'),
(3, 'dinoshi sewwandi', 'dinosewwandi@gmail.com', 'no 04,madugasthenna,maharathenna,menikhinna', '+94765609128', '20012345', 'dgdfg', '2023-11-24', 500.00, 'no'),
(4, 'dinoshi sewwandi', 'dinosewwandi@gmail.com', 'no 04,madugasthenna,maharathenna,menikhinna', '+94765609128', '20012345', 'dgdfg', '2023-11-24', 500.00, 'no'),
(5, 'dinoshi sewwandi', 'dinosewwandi@gmail.com', 'no 04,madugasthenna,maharathenna,menikhinna', '+94765609128', '2004345678', 'teacher', '2023-11-24', 4000.00, 'no');

-- --------------------------------------------------------

--
-- Table structure for table `elle`
--

CREATE TABLE `elle` (
  `id` int(11) NOT NULL,
  `time` varchar(255) NOT NULL,
  `monday` varchar(255) NOT NULL,
  `tuesday` varchar(255) NOT NULL,
  `wednesday` varchar(255) NOT NULL,
  `thursday` varchar(255) NOT NULL,
  `friday` varchar(255) NOT NULL,
  `saturday` varchar(255) NOT NULL,
  `sunday` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `equipment`
--

CREATE TABLE `equipment` (
  `id` int(11) NOT NULL,
  `sports_name` varchar(255) NOT NULL,
  `equipment_type` varchar(255) NOT NULL,
  `qty` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `equipment`
--

INSERT INTO `equipment` (`id`, `sports_name`, `equipment_type`, `qty`) VALUES
(1, 'new', 'sdsd2', 3),
(2, 'ddd', 'ssd', 1);

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `start` timestamp NOT NULL DEFAULT current_timestamp(),
  `end` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`id`, `title`, `description`, `start`, `end`) VALUES
(21, 'wellassa batles', 'first year degree match', '2024-01-16 18:30:00', '2024-01-18 18:29:59');

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `subject` varchar(255) NOT NULL,
  `feedback` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`id`, `name`, `subject`, `feedback`, `created_at`) VALUES
(1, 'dinoshi sewwandi', 'ground booking', 'no clear method', '2023-11-23 16:08:19'),
(2, 'kamani rathnayaka', 'dfdfg', 'good', '2023-11-24 05:19:47'),
(3, 'vindya', 'tesst', 'sdsd', '2023-12-13 13:41:13');

-- --------------------------------------------------------

--
-- Table structure for table `football`
--

CREATE TABLE `football` (
  `id` int(11) NOT NULL,
  `time` varchar(255) NOT NULL,
  `monday` varchar(255) NOT NULL,
  `tuesday` varchar(255) NOT NULL,
  `wednesday` varchar(255) NOT NULL,
  `thursday` varchar(255) NOT NULL,
  `friday` varchar(255) NOT NULL,
  `saturday` varchar(255) NOT NULL,
  `sunday` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `order_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `student_name` varchar(255) NOT NULL,
  `enrollment_number` varchar(50) NOT NULL,
  `contact_number` varchar(20) NOT NULL,
  `sport_kit_id` int(11) NOT NULL,
  `sport_kit_name` varchar(255) NOT NULL,
  `selected_color` varchar(50) NOT NULL,
  `selected_size` varchar(50) NOT NULL,
  `quantity` int(11) NOT NULL,
  `order_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`order_id`, `user_id`, `student_name`, `enrollment_number`, `contact_number`, `sport_kit_id`, `sport_kit_name`, `selected_color`, `selected_size`, `quantity`, `order_date`) VALUES
(1, 11, 'dinoshi sewwandi', 'uwu/iit/20/27', '+94765609128', 13, 'shirt', 'Red', 'Small', 4, '2023-11-23 09:09:09'),
(2, 11, 'dinoshi sewwandi', 'uwu/iit/20/27', '+94765609128', 13, 'shirt', 'Red', 'Small', 4, '2023-11-23 09:17:09'),
(3, 11, 'dinoshi sewwandi', 'uwu/iit/20/27', '+94765609128', 13, 'shirt', 'Red', 'Small', 4, '2023-11-23 09:17:18'),
(4, 11, 'dinoshi sewwandi', 'uwu/iit/20/27', '+94765609128', 13, 'shirt', 'Red', 'Small', 2, '2023-11-23 09:18:42'),
(5, 11, 'dinoshi sewwandi', 'uwu/iit/20/27', '+94765609128', 13, 'shirt', 'Red', 'Small', 2, '2023-11-23 09:27:05'),
(6, 11, 'dinoshi sewwandi', 'uwu/iit/20/27', '+94765609128', 13, 'shirt', 'Red', 'Small', 3, '2023-11-23 09:29:49'),
(7, 11, 'dinoshi sewwandi', 'uwu/iit/20/27', '+94765609128', 13, 'shirt', 'Red', 'Small', 3, '2023-11-23 09:32:21'),
(8, 11, 'dinoshi sewwandi', 'uwu/iit/20/27', '+94765609128', 13, 'shirt', 'Red', 'Small', 3, '2023-11-23 09:35:37'),
(9, 11, 'dinoshi sewwandi', 'uwu/iit/20/27', '+94765609128', 13, 'shirt', 'Red', 'Small', 3, '2023-11-23 09:35:42'),
(10, 11, 'dinoshi sewwandi', 'uwu/iit/20/27', '+94765609128', 13, 'shirt', 'Red', 'Small', 3, '2023-11-23 09:37:00'),
(11, 11, 'dinoshi sewwandi', 'uwu/iit/20/27', '+94765609128', 13, 'shirt', 'Red', 'Small', 4, '2023-11-23 09:38:10'),
(12, 11, 'dinoshi sewwandi', 'uwu/iit/20/27', '+94765609128', 13, 'shirt', 'Red', 'Small', 4, '2023-11-23 09:39:55'),
(13, 11, 'dinoshi sewwandi', 'uwu/iit/20/27', '+94765609128', 13, 'shirt', 'Red', 'Small', 4, '2023-11-23 09:40:46'),
(14, 11, 'dinoshi sewwandi', 'uwu/iit/20/27', '+94765609128', 13, 'shirt', 'Red', 'Small', 4, '2023-11-23 09:41:34'),
(15, 11, 'dinoshi sewwandi', 'uwu/iit/20/27', '+94765609128', 13, 'shirt', 'Red', 'Small', 6, '2023-11-23 09:42:04'),
(16, 11, 'dinoshi sewwandi', 'uwu/iit/20/27', '+94765609128', 13, 'shirt', 'Red', 'Small', 6, '2023-11-23 09:42:34'),
(17, 11, 'dinoshi sewwandi', 'uwu/iit/20/27', '+94765609128', 13, 'shirt', 'Red', 'Small', 2, '2023-11-23 09:42:47'),
(18, 11, 'dinoshi sewwandi', 'uwu/iit/20/27', '+94765609128', 13, 'shirt', 'Red', 'Small', 2, '2023-11-23 09:45:22'),
(19, 11, 'dinoshi sewwandi', 'uwu/iit/20/27', '+94765609128', 13, 'shirt', 'Red', 'Small', 2, '2023-11-23 09:48:18'),
(20, 11, 'dinoshi sewwandi', 'uwu/iit/20/27', '+94765609128', 13, 'shirt', 'Red', 'Small', 5, '2023-11-23 09:48:31'),
(21, 11, 'dinoshi sewwandi', 'uwu/iit/20/27', '+94765609128', 13, 'shirt', 'Red', 'Small', 5, '2023-11-23 09:48:53'),
(22, 11, 'dinoshi sewwandi', 'uwu/iit/20/27', '+94765609128', 13, 'shirt', 'Red', 'Small', 5, '2023-11-23 09:51:18'),
(23, 11, 'dinoshi sewwandi', 'uwu/iit/20/27', '+94765609128', 13, 'shirt', 'Red', 'Small', 5, '2023-11-23 09:51:46'),
(24, 11, 'dinoshi sewwandi', 'uwu/iit/20/27', '+94765609128', 13, 'shirt', 'Red', 'Small', 5, '2023-11-23 09:56:56'),
(25, 11, 'dinoshi sewwandi', 'uwu/iit/20/27', '+94765609128', 13, 'shirt', 'Red', 'Small', 5, '2023-11-23 09:57:07'),
(26, 11, 'dinoshi sewwandi', 'uwu/iit/20/27', '+94765609128', 13, 'shirt', 'Red', 'Small', 5, '2023-11-23 09:58:56'),
(27, 11, 'dinoshi sewwandi', 'uwu/iit/20/27', '+94765609128', 13, 'shirt', 'Red', 'Small', 90, '2023-11-23 09:59:25'),
(28, 11, 'dinoshi sewwandi', 'uwu/iit/20/27', '+94765609128', 13, 'shirt', 'Red', 'Small', 90, '2023-11-23 09:59:31'),
(29, 11, 'dinoshi sewwandi', 'uwu/iit/20/27', '+94765609128', 13, 'shirt', 'Red', 'Small', 3, '2023-11-23 10:00:20'),
(30, 11, 'dinoshi sewwandi', 'uwu/iit/20/27', '+94765609128', 13, 'shirt', 'Red', 'Small', 3, '2023-11-23 10:05:32'),
(31, 11, 'dinoshi sewwandi', 'uwu/iit/20/27', '+94765609128', 13, 'shirt', 'Red', 'Small', 3, '2023-11-23 10:06:06'),
(32, 11, 'dinoshi sewwandi', 'uwu/iit/20/27', '+94765609128', 13, 'shirt', 'Red', 'Small', 56, '2023-11-23 10:06:22'),
(33, 11, 'dinoshi sewwandi', 'uwu/iit/20/27', '+94765609128', 13, 'shirt', 'Red', 'Small', 56, '2023-11-23 10:27:43'),
(34, 11, 'dinoshi sewwandi', 'uwu/iit/20/27', '+94765609128', 13, 'shirt', 'Red', 'Small', 56, '2023-11-23 10:27:55'),
(35, 11, 'dinoshi sewwandi', 'uwu/iit/20/27', '+94765609128', 13, 'shirt', 'Red', 'Small', 3, '2023-11-23 10:33:32'),
(36, 11, 'dinoshi sewwandi', 'uwu/iit/20/27', '+94765609128', 13, 'shirt', 'Red', 'Small', 3, '2023-11-23 10:35:04'),
(37, 11, 'dinoshi sewwandi', 'uwu/iit/20/27', '+94765609128', 13, 'shirt', 'Red', 'Small', 2, '2023-11-23 10:43:08'),
(38, 11, 'dinoshi sewwandi', 'uwu/iit/20/27', '+94765609128', 13, 'shirt', 'Red', 'Small', 2, '2023-11-23 10:51:18'),
(39, 11, 'dinoshi sewwandi', 'uwu/iit/20/27', '+94765609128', 13, 'shirt', 'Red', 'Small', 2, '2023-11-23 10:53:19'),
(40, 11, 'dinoshi sewwandi', 'uwu/iit/20/27', '+94765609128', 13, 'shirt', 'Red', 'Small', 56, '2023-11-23 11:00:56'),
(41, 11, 'dinoshi sewwandi', 'uwu/iit/20/27', '+94765609128', 13, 'shirt', 'Red', 'Small', 45, '2023-11-23 11:07:54'),
(42, 11, 'dinoshi sewwandi', 'uwu/iit/20/27', '+94765609128', 13, 'shirt', 'Red', 'Small', 2, '2023-11-23 12:31:02'),
(43, 11, 'dinoshi sewwandi', 'uwu/iit/20/27', '+94765609128', 13, 'shirt', 'Red', 'Small', 1, '2023-11-23 12:31:58'),
(44, 11, 'dinoshi sewwandi', 'uwu/iit/20/27', '+94765609128', 13, 'shirt', 'Red', 'Small', 2, '2023-11-23 12:32:24'),
(45, 11, 'dinoshi sewwandi', 'uwu/iit/20/27', '+94765609128', 13, 'shirt', 'Red', 'Small', 2, '2023-11-23 12:35:20'),
(46, 11, 'dinoshi sewwandi', 'uwu/iit/20/27', '+94765609128', 13, 'shirt', 'Red', 'Small', 2, '2023-11-23 12:37:40'),
(47, 11, 'dinoshi sewwandi', 'uwu/iit/20/27', '+94765609128', 13, 'shirt', 'Red', 'Small', 1, '2023-11-23 12:39:51'),
(48, 11, 'dinoshi sewwandi', 'uwu/iit/20/27', '+94765609128', 13, 'shirt', 'Red', 'Small', 33, '2023-11-23 12:40:02'),
(49, 11, 'dinoshi sewwandi', 'uwu/iit/20/27', '+94765609128', 13, 'shirt', 'Red', 'Small', 12, '2023-11-23 12:40:27'),
(50, 11, 'dinoshi sewwandi', 'uwu/iit/20/27', '+94765609128', 14, 't shirt', 'Red', 'Small', 1, '2023-11-23 14:09:52'),
(51, 11, 'dinoshi sewwandi', 'uwu/iit/20/27', '+94765609128', 14, 't shirt', 'Red', 'Small', 0, '2023-11-23 14:16:36'),
(52, 13, 'kamani rathnayaka', 'uwu/iit/20/27', '+94765609128', 15, 'shirt', 'Red', 'Small', 3, '2023-11-24 05:19:06');

-- --------------------------------------------------------

--
-- Table structure for table `sports`
--

CREATE TABLE `sports` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `category` enum('Indoor','Outdoor') NOT NULL,
  `type` enum('Men','Women','Both') NOT NULL,
  `image_path` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `sports`
--

INSERT INTO `sports` (`id`, `name`, `category`, `type`, `image_path`) VALUES
(1, 'Football', 'Outdoor', 'Both', 'images/football.jpg'),
(2, 'Basketball', 'Indoor', 'Both', 'images/basketball.jpg'),
(3, 'Tennis', 'Outdoor', 'Both', 'images/tennis.jpg'),
(4, 'Volleyball', 'Indoor', 'Both', 'images/volleyball.jpg'),
(5, 'Swimming', 'Indoor', 'Both', 'images/swimming.jpg'),
(6, 'Soccer', 'Outdoor', 'Both', 'images/soccer.jpg'),
(7, 'Gymnastics', 'Indoor', 'Both', 'images/gymnastics.jpg'),
(8, 'Track and Field', 'Outdoor', 'Both', 'images/track_field.jpg'),
(0, 'sasa', 'Indoor', 'Men', 'uploads/pexels-pavel-danilyuk-8438918.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `sportskits`
--

CREATE TABLE `sportskits` (
  `id` int(11) NOT NULL,
  `sportName` varchar(100) NOT NULL,
  `availableColors` varchar(255) DEFAULT NULL,
  `availableSizes` varchar(255) DEFAULT NULL,
  `price` decimal(10,2) NOT NULL,
  `description` text DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `sportskits`
--

INSERT INTO `sportskits` (`id`, `sportName`, `availableColors`, `availableSizes`, `price`, `description`, `image`) VALUES
(15, 'shirt', 'black and white', 'x', 2500.00, 'no', 'kit 6.jpg'),
(16, 'shirt', 'red', 'XL, L ,M', 2500.00, 'no', 'kit 3.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `StudentID` int(11) NOT NULL,
  `FirstName` varchar(50) NOT NULL,
  `LastName` varchar(50) NOT NULL,
  `FullName` varchar(101) NOT NULL,
  `EnrollmentNumber` varchar(20) NOT NULL,
  `Degree` varchar(50) NOT NULL,
  `SportType` varchar(50) NOT NULL,
  `Gender` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`StudentID`, `FirstName`, `LastName`, `FullName`, `EnrollmentNumber`, `Degree`, `SportType`, `Gender`) VALUES
(1, 'John', 'Doe', 'John Doe', 'EN123456', 'Computer Science', 'football', 'Male'),
(2, 'Jane', 'Smith', 'Jane Smith', 'EN234567', 'Biology', 'netball', 'Female'),
(3, 'Bob', 'Johnson', 'Bob Johnson', 'EN345678', 'Mathematics', 'basketball', 'Male'),
(4, 'Alice', 'Williams', 'Alice Williams', 'EN456789', 'Physics', 'football', 'Female'),
(5, 'Charlie', 'Davis', 'Charlie Davis', 'EN567890', 'History', 'netball', 'Male'),
(6, 'Eva', 'Anderson', 'Eva Anderson', 'EN678901', 'Chemistry', 'football', 'Female'),
(7, 'David', 'Miller', 'David Miller', 'EN789012', 'Engineering', 'netball', 'Male'),
(8, 'Sophia', 'Taylor', 'Sophia Taylor', 'EN890123', 'Psychology', 'basketball', 'Female'),
(9, 'Daniel', 'Brown', 'Daniel Brown', 'EN901234', 'Political Science', 'football', 'Male'),
(10, 'Olivia', 'Wilson', 'Olivia Wilson', 'EN012345', 'Sociology', 'netball', 'Female'),
(11, 'Matthew', 'Moore', 'Matthew Moore', 'EN123012', 'English', 'basketball', 'Male'),
(12, 'Emily', 'Jones', 'Emily Jones', 'EN234123', 'Geology', 'football', 'Female'),
(13, 'Ryan', 'Clark', 'Ryan Clark', 'EN345234', 'Economics', 'netball', 'Male'),
(14, 'Ava', 'White', 'Ava White', 'EN456345', 'Business Administration', 'basketball', 'Female'),
(15, 'Michael', 'Lee', 'Michael Lee', 'EN567456', 'Marketing', 'football', 'Male'),
(16, 'Grace', 'Lewis', 'Grace Lewis', 'EN678567', 'Philosophy', 'netball', 'Female'),
(17, 'Nathan', 'Hall', 'Nathan Hall', 'EN789678', 'Music', 'basketball', 'Male'),
(18, 'Aria', 'Baker', 'Aria Baker', 'EN890789', 'Environmental Science', 'football', 'Female'),
(19, 'James', 'Cooper', 'James Cooper', 'EN901890', 'Health Sciences', 'netball', 'Male'),
(20, 'Lily', 'Garcia', 'Lily Garcia', 'EN012901', 'Communication Studies', 'basketball', 'Female');

-- --------------------------------------------------------

--
-- Table structure for table `teams`
--

CREATE TABLE `teams` (
  `id` int(11) NOT NULL,
  `sport` int(11) NOT NULL,
  `fullname` varchar(255) NOT NULL,
  `position` varchar(255) NOT NULL,
  `image_path` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `teams`
--

INSERT INTO `teams` (`id`, `sport`, `fullname`, `position`, `image_path`, `description`) VALUES
(1, 1, 'Team A', 'Forward', 'team_images/team_a.jpg', 'A highly skilled football team.'),
(2, 2, 'Team B', 'Point Guard', 'team_images/team_b.jpg', 'A competitive basketball team aiming for championships.'),
(3, 3, 'Team C', 'Singles Player', 'team_images/team_c.jpg', 'Tennis players with exceptional agility and technique.'),
(4, 4, 'Team D', 'Setter', 'team_images/team_d.jpg', 'A strong volleyball team with excellent teamwork.'),
(5, 5, 'Team E', 'Swimmer', 'team_images/team_e.jpg', 'Elite swimmers with multiple records.'),
(6, 6, 'Team F', 'Striker', 'team_images/team_f.jpg', 'Soccer team known for its aggressive playstyle.'),
(8, 8, 'Team H', 'Sprinter', 'team_images/team_h.jpg', 'Track and field athletes setting new speed records.'),
(0, 2, 'tharindu dasun', 'Captain', 'uploads/Teams/main img.png', 'sdsd');

-- --------------------------------------------------------

--
-- Table structure for table `university_students`
--

CREATE TABLE `university_students` (
  `id` int(11) NOT NULL,
  `full_name` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `district` varchar(255) NOT NULL,
  `birthday` date NOT NULL,
  `nic` varchar(12) NOT NULL,
  `degree` varchar(255) NOT NULL,
  `faculty` varchar(255) NOT NULL,
  `enrollment_no` varchar(20) NOT NULL,
  `phone_no` varchar(15) NOT NULL,
  `university_email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `gender` enum('male','female') NOT NULL,
  `sport_type` varchar(20) NOT NULL,
  `medical_issues` text NOT NULL,
  `confirm_password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `university_students`
--

INSERT INTO `university_students` (`id`, `full_name`, `address`, `district`, `birthday`, `nic`, `degree`, `faculty`, `enrollment_no`, `phone_no`, `university_email`, `password`, `gender`, `sport_type`, `medical_issues`, `confirm_password`) VALUES
(1, 'John Doe', '123 Main St', 'XYZ District', '1998-05-15', '123456789012', 'Computer Science', 'Science', 'EN123456', '123-456-7890', 'john@example.com', 'hashedpassword', 'male', 'basketball', 'None', 'hashedpassword'),
(2, 'Alice Smith', '456 Elm St', 'ABC District', '1999-08-20', '987654321098', 'Mechanical Engineering', 'Engineering', 'EN654321', '987-654-3210', 'alice@example.com', 'hashedpassword', 'female', 'basketball', 'Allergies', 'hashedpassword'),
(3, 'Bob Johnson', '789 Oak St', 'PQR District', '1997-12-10', '567890123456', 'Business Administration', 'Business', 'EN789012', '789-012-3456', 'bob@example.com', 'hashedpassword', 'male', 'basketball', 'None', 'hashedpassword'),
(4, 'Emma Davis', '101 Pine St', 'LMN District', '2000-03-25', '345678901234', 'Psychology', 'Social Sciences', 'EN345678', '234-567-8901', 'emma@example.com', 'hashedpassword', 'female', 'basketball', 'Asthma', 'hashedpassword'),
(5, 'Michael Wilson', '222 Cedar St', 'JKL District', '1996-09-05', '901234567890', 'Electrical Engineering', 'Engineering', 'EN222333', '890-123-4567', 'michael@example.com', 'hashedpassword', 'male', 'basketball', 'None', 'hashedpassword'),
(6, 'Sophia Brown', '333 Maple St', 'FGH District', '1998-11-30', '678901234567', 'Biology', 'Science', 'EN456789', '567-890-1234', 'sophia@example.com', 'hashedpassword', 'female', 'basketball', 'None', 'hashedpassword'),
(7, 'William Miller', '444 Walnut St', 'OPQ District', '1999-02-18', '012345678901', 'Economics', 'Business', 'EN567890', '678-901-2345', 'william@example.com', 'hashedpassword', 'male', 'basketball', 'Allergies', 'hashedpassword'),
(8, 'Olivia Lee', '555 Birch St', 'IJK District', '1997-07-08', '890123456789', 'Nursing', 'Health Sciences', 'EN901234', '789-012-3456', 'olivia@example.com', 'hashedpassword', 'female', 'basketball', 'None', 'hashedpassword'),
(9, 'Daniel Taylor', '666 Cherry St', 'RST District', '1998-10-12', '234567890123', 'Political Science', 'Social Sciences', 'EN678901', '901-234-5678', 'daniel@example.com', 'hashedpassword', 'male', 'basketball', 'None', 'hashedpassword'),
(10, 'Mia Garcia', '777 Ash St', 'UVW District', '2000-01-22', '456789012345', 'Communications', 'Humanities', 'EN123789', '012-345-6789', 'mia@example.com', 'hashedpassword', 'female', 'basketball', 'None', 'hashedpassword'),
(11, 'dinoshi sewwandi', 'no 04,madugasthenna,maharathenna,menikhinna', 'kandy', '2023-11-06', '2004345678', 'industrial information technology', 'applied science', 'uwu/iit/20/27', '+94765609128', 'darani@gmail.com', '$2y$10$bcWLt1JGTRR.ePzf.JnuZ.4wx5.LK31nKZT..9YtfiKkWQPBQOlHW', 'female', 'basketball', 'no', '$2y$10$pFqBWg8YfHPM9EF8Ewbeeex3pU1Km12Pbk9DZkWGOOYXqxxQRHLBG'),
(12, 'ama perera', 'no 22,panadura', 'colombo', '1999-12-12', '200152501358', 'industrial information technology', 'applied science', 'iit/20/007', '+94765609128', 'dinoshi@gmail.com', '$2y$10$dC0b1OLb0WXxNQ75uhoFAeqKYmiZTJGYVi4I79DfVsF78tVwWxbEm', 'female', 'football', 'no', '$2y$10$lHYFNLMaBkagkcU6dM4lWOCfato4YvNNX6FHWqhs.b1nuW6bOfd2G'),
(13, 'kamani rathnayaka', 'no 04,madugasthenna,maharathenna,menikhinna', 'kandy', '2023-10-30', '2004345678', 'industrial information technology', 'applied science', 'uwu/iit/20/27', '0702204003', 'kamani@gmail.com', '$2y$10$9FipJZ.COAfNLFZp1LEfp.06lm83tkormMUAo0Q5mTQWT/NkqKxCa', 'female', 'football', 'no', '$2y$10$/i7/IDTOWfVNSvitg8c/6epDhaz6BeUePcrK8RX/i6/QvCYSlw3mm'),
(14, 'vindya', 'no 20', 'kandy', '1998-12-02', '9836608274v', 'as', 'sd', 'sd', '0712312', 'std@gmail.com', '$2y$10$F9K9Ow6WtCVXkDiNoY3HYuc4yUMt0qj70KwYktyATClmklP7YuBPa', 'female', 'football', 'sdsd', '$2y$10$mXvRCoQtIsBxUc/pPmuHq.NxHF2L3Se.Py1mrU8zvwB.vVtFok5Ue');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(20) NOT NULL,
  `sport` varchar(255) NOT NULL,
  `role` varchar(255) NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `sport`, `role`, `date`, `time`, `description`) VALUES
(1, 'hokey', 'all', '2023-12-13', '10:38:00', 'annual general meeting new');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `nic` varchar(20) DEFAULT NULL,
  `enrollment_number` varchar(20) DEFAULT NULL,
  `gender` enum('male','female') DEFAULT NULL,
  `birthday` date DEFAULT NULL,
  `sport_types` varchar(255) DEFAULT NULL,
  `contact_number` varchar(20) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `district` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `nic`, `enrollment_number`, `gender`, `birthday`, `sport_types`, `contact_number`, `address`, `district`) VALUES
(1, '', 'dinoshi@gmail.com', '$2y$10$S./nh2n9u3y1hiT/2HyQV.rA7.LRZSKmoSj31BXsdBYV57el1GoGu', '', '', NULL, '0000-00-00', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `volleyball`
--

CREATE TABLE `volleyball` (
  `id` int(11) NOT NULL,
  `time` varchar(255) NOT NULL,
  `monday` varchar(255) NOT NULL,
  `tuesday` varchar(255) NOT NULL,
  `wednesday` varchar(255) NOT NULL,
  `thursday` varchar(255) NOT NULL,
  `friday` varchar(255) NOT NULL,
  `saturday` varchar(255) NOT NULL,
  `sunday` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `absencerecords`
--
ALTER TABLE `absencerecords`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `adminresignation`
--
ALTER TABLE `adminresignation`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `attendance`
--
ALTER TABLE `attendance`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `badminton`
--
ALTER TABLE `badminton`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `chess`
--
ALTER TABLE `chess`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cricket`
--
ALTER TABLE `cricket`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `donations`
--
ALTER TABLE `donations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `elle`
--
ALTER TABLE `elle`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `equipment`
--
ALTER TABLE `equipment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `football`
--
ALTER TABLE `football`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `sportskits`
--
ALTER TABLE `sportskits`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`StudentID`);

--
-- Indexes for table `university_students`
--
ALTER TABLE `university_students`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `volleyball`
--
ALTER TABLE `volleyball`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `absencerecords`
--
ALTER TABLE `absencerecords`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `adminresignation`
--
ALTER TABLE `adminresignation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `attendance`
--
ALTER TABLE `attendance`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=105;

--
-- AUTO_INCREMENT for table `badminton`
--
ALTER TABLE `badminton`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `chess`
--
ALTER TABLE `chess`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `cricket`
--
ALTER TABLE `cricket`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `donations`
--
ALTER TABLE `donations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `elle`
--
ALTER TABLE `elle`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `equipment`
--
ALTER TABLE `equipment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `football`
--
ALTER TABLE `football`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT for table `sportskits`
--
ALTER TABLE `sportskits`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `StudentID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `university_students`
--
ALTER TABLE `university_students`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `volleyball`
--
ALTER TABLE `volleyball`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `university_students` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
