-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 05, 2024 at 11:42 PM
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
-- Database: `county`
--

-- --------------------------------------------------------

--
-- Table structure for table `attendance`
--

CREATE TABLE `attendance` (
  `id` int(11) NOT NULL,
  `employee_id` int(20) NOT NULL,
  `log_type` tinyint(1) NOT NULL COMMENT '1 = AM IN,2 = AM out, 3= PM IN, 4= PM out\r\n',
  `datetime_log` datetime NOT NULL DEFAULT current_timestamp(),
  `date_updated` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `attendance`
--

INSERT INTO `attendance` (`id`, `employee_id`, `log_type`, `datetime_log`, `date_updated`) VALUES
(10, 9, 1, '2020-09-16 08:00:00', '2020-09-29 16:16:57'),
(11, 9, 2, '2020-09-16 12:00:00', '2020-09-29 16:16:57'),
(12, 9, 3, '2020-09-16 13:00:00', '2020-09-29 16:16:57'),
(16, 9, 4, '2020-09-16 17:00:00', '2020-09-29 16:16:57');

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

CREATE TABLE `department` (
  `id` int(30) NOT NULL,
  `name` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `department`
--

INSERT INTO `department` (`id`, `name`) VALUES
(2, 'Departmental meetings'),
(3, 'Inter-departmental meetings'),
(4, 'Governors working committee'),
(5, 'Budget and economic council'),
(6, 'Monthly review meetings'),
(7, 'CEC Meetings'),
(8, 'COC meetings'),
(9, 'Directors meeting'),
(12, 'Hospital board');

-- --------------------------------------------------------

--
-- Table structure for table `employees`
--

CREATE TABLE `employees` (
  `id` int(11) NOT NULL,
  `firstname` text NOT NULL,
  `lastname` text NOT NULL,
  `work_id` varchar(15) NOT NULL,
  `work_email` varchar(30) NOT NULL,
  `phonenumber` varchar(15) NOT NULL,
  `password` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `employees`
--

INSERT INTO `employees` (`id`, `firstname`, `lastname`, `work_id`, `work_email`, `phonenumber`, `password`) VALUES
(2, 'AUSTINE', 'OJUMA', 'J67836490', 'ojuma@gmail.com', '783736389', '12345'),
(3, 'John', 'Marande', 'MJ12345', 'marandej@wku.adventist.org', '734572018', 'marande'),
(4, 'Peter', 'Albert', 'PA567845', 'pert3@gmail.com', '756453790', 'peter'),
(5, 'KIPTANUI', 'PETER', 'PR3567', 'peter@gmail.com', '0747483647', 'wekesa'),
(6, 'isaiah', 'Wainaina', 'WK12345', 'wainaina58gmail.com', '786345725', '78499'),
(7, 'AUSTINE', 'Aluoch', 'WKUC123', 'aluoch@wku.org', '0789467834', 'Aluoch'),
(8, 'Kevin', 'Bengi', 'SKEVBE1811', 'bengike@ueab.ac.ke', '0799676823', 'love@2018'),
(9, 'Kevin', 'Kipto', 'WKU124', 'kiptoke@ueab.ac.ke', '0789467834', 'kipto'),
(10, 'Janet ', 'Naliaka', 'WKUC29', 'janetnaliaka@wkuc.com', '0707235678', 'janet'),
(11, 'Isaac', 'Wainaina', 'IWA3467', 'wainainaisaiah@gmail.com', '0789563415', ''),
(12, 'peter', 'Njuguna Murena', 'PETENJUMUN456', 'njugunapeter@gmail.com', '0789367482', ''),
(13, '', '', '', '', '', ''),
(14, '', '', '', '', '', ''),
(15, '', '', '', '', '', ''),
(16, '', '', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `start` datetime NOT NULL,
  `end` datetime NOT NULL,
  `all_day` tinyint(1) NOT NULL,
  `location` varchar(255) DEFAULT NULL,
  `recurring` tinyint(1) NOT NULL,
  `notification_sent` tinyint(1) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`id`, `title`, `start`, `end`, `all_day`, `location`, `recurring`, `notification_sent`) VALUES
(1, 'Board mee', '2024-06-02 09:57:00', '2024-06-02 10:57:00', 0, 'Bungoma', 1, 0),
(2, 'CEE meeting', '2024-06-02 10:10:00', '2024-06-02 02:15:00', 1, 'Kisumu', 0, 0),
(3, 'Assembly', '2024-06-13 08:10:00', '2024-06-02 09:10:00', 0, 'Kisumu', 1, 0),
(4, 'Conference meeting', '2024-06-13 11:30:00', '2024-06-02 12:30:00', 0, 'Conference hall', 1, 0),
(5, 'Budget planning', '2024-06-06 08:00:00', '2024-06-06 11:00:00', 0, 'Conference hall', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `meetings`
--

CREATE TABLE `meetings` (
  `id` int(10) NOT NULL,
  `type` text NOT NULL,
  `date` date NOT NULL,
  `time` time(5) NOT NULL,
  `agenda` text NOT NULL,
  `absent` text NOT NULL,
  `attendees` text NOT NULL,
  `content` varchar(100) NOT NULL,
  `file` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `meetings`
--

INSERT INTO `meetings` (`id`, `type`, `date`, `time`, `agenda`, `absent`, `attendees`, `content`, `file`) VALUES
(7, 'Budget and economic council', '2024-06-08', '09:33:00.00000', '1. Reading minutes from the previous meetings.\n2. Finance report\n3. Department budgets\n4. Adjournment', '1. Mike wafula', '1. The C.E.O\r\n2. Peter Njaga\r\n3. Millicent Wafula\r\n4. Ken Barasa', 'come with departmental plans', ''),
(8, 'Directors meeting', '2024-06-06', '09:35:00.00000', '1. reading of previous meeting report\r\n2. Election of new boeard members', 'none', 'All previous and upcoming board members', 'come with departmental plans', ''),
(9, 'Governors working committee', '2024-06-05', '21:39:00.00000', '1. Interviews\r\n2. Awards and appreciations', 'none', 'all governor working committee members', 'come with departmental plans', ''),
(13, 'Governors working committee', '2024-06-14', '12:00:00.00000', 'discuss the work plan', 'none', 'all members of the committee present', 'governors working committee for the year 2024', 'minutes_7.pdf');

-- --------------------------------------------------------

--
-- Table structure for table `message`
--

CREATE TABLE `message` (
  `user_id` int(11) NOT NULL,
  `subject` varchar(50) NOT NULL,
  `message` varchar(400) NOT NULL,
  `from` text NOT NULL,
  `date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `message`
--

INSERT INTO `message` (`user_id`, `subject`, `message`, `from`, `date`) VALUES
(1, 'Project Assistance', 'please assist me with this project on password reset using email', 'Kevin Bengi', '2021-06-28 00:00:00'),
(2, 'Project Assistance', 'I will be happy to assist you. I will create a link so that we can work on it together tomorrow', ' Isaiah Wainaina', '2021-06-28 00:00:00'),
(3, 'Project Assistance', 'thanks. i will be waiting', 'Kevin Bengi', '2021-06-28 00:00:00'),
(4, 'project assistance', 'noted', 'kevin', '2024-06-03 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `minutes`
--

CREATE TABLE `minutes` (
  `id` int(10) NOT NULL,
  `title` text NOT NULL,
  `date` date NOT NULL,
  `prepared` text NOT NULL,
  `location` text NOT NULL,
  `time` time(6) NOT NULL,
  `purpose` text NOT NULL,
  `attendance` text NOT NULL,
  `absent` text NOT NULL,
  `content` varchar(500) NOT NULL,
  `next` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `minutes`
--

INSERT INTO `minutes` (`id`, `title`, `date`, `prepared`, `location`, `time`, `purpose`, `attendance`, `absent`, `content`, `next`) VALUES
(1, 'Board meeting', '2024-06-04', 'Ednah Toto', 'Baraton University', '08:00:00.000000', 'selecting of board members', 'Timothy Wafula, Peter Njoroge, Philip Maiyo, Kelvin Nyamiaka', 'Andrew Mukhebi, Naomi Tabi', 'Choosing of nominating commettee which will then choose the leadership team', 'The next meeting will be carried out on 10th of Next month 2024. The meeting ended with a prayer from pastor Duncun Mumbo');

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `Id` int(30) NOT NULL,
  `Subject` text NOT NULL,
  `Message` text NOT NULL,
  `From` varchar(30) NOT NULL,
  `Date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `notifications`
--

INSERT INTO `notifications` (`Id`, `Subject`, `Message`, `From`, `Date`) VALUES
(2, 'Employees Work From Home', 'You are hereby notified that the work from home period has been extended up to June 16th', '', '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `position`
--

CREATE TABLE `position` (
  `id` int(30) NOT NULL,
  `department_id` int(30) NOT NULL,
  `name` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `position`
--

INSERT INTO `position` (`id`, `department_id`, `name`) VALUES
(1, 1, 'Programmer'),
(2, 2, 'HR Supervisor'),
(4, 3, 'Accounting Clerk');

-- --------------------------------------------------------

--
-- Table structure for table `register`
--

CREATE TABLE `register` (
  `id` int(11) NOT NULL,
  `firstname` text NOT NULL,
  `lastname` text NOT NULL,
  `work_id` varchar(15) NOT NULL,
  `work_email` varchar(30) NOT NULL,
  `department` text NOT NULL,
  `phonenumber` varchar(15) NOT NULL,
  `salary` int(30) NOT NULL,
  `password` varchar(15) NOT NULL,
  `image` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `register`
--

INSERT INTO `register` (`id`, `firstname`, `lastname`, `work_id`, `work_email`, `department`, `phonenumber`, `salary`, `password`, `image`) VALUES
(1, 'Isaac', 'Wainaina', 'IWA3467', 'wainainaisaiah@gmail.com', 'Human Resource', '0789563415', 20000, 'izo', ''),
(2, 'AUSTINE', 'OJUMA', 'J67836490', 'ojuma@gmail.com', 'Human Resource', '783736389', 30000, '12345', ''),
(3, 'John', 'Marande', 'MJ12345', 'marandej@wku.adventist.org', 'Accounting and Finance', '734572018', 40000, 'marande', ''),
(4, 'Peter', 'Albert', 'PA567845', 'pert3@gmail.com', 'Human Resource', '756453790', 25000, 'peter', ''),
(5, 'KIPTANUI', 'PETER', 'PR3567', 'peter@gmail.com', 'Human Resource', '0747483647', 45000, 'wekesa', ''),
(6, 'isaiah', 'Wainaina', 'WK12345', 'wainaina58gmail.com', 'Accounting and Finance', '786345725', 35000, '78499', ''),
(7, 'AUSTINE', 'Aluoch', 'WKUC123', 'aluoch@wku.org', 'Human Resource', '0789467834', 70000, 'Aluoch', ''),
(8, 'Kevin', 'Bengi', 'SKEVBE1811', 'bengike@ueab.ac.ke', 'Accounting and Finance', '0796172980', 60000, 'love@2018', 'kevin.jpg'),
(9, 'Kevin', 'Kipto', 'WKU124', 'kiptoke@ueab.ac.ke', 'Accounting and Finance', '0789467834', 48000, 'kipto', 'kipto.jpg'),
(10, 'Janet ', 'Naliaka', 'WKUC29', 'janetnaliaka@wkuc.com', 'Human Resource', '0707235678', 45000, 'janet', '933f9a7495054639af6f79096eeb09fe.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(30) NOT NULL,
  `work_id` varchar(30) NOT NULL,
  `work_email` varchar(30) NOT NULL,
  `name` varchar(200) NOT NULL,
  `address` text NOT NULL,
  `contact` text NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(200) NOT NULL,
  `type` tinyint(3) NOT NULL DEFAULT 2 COMMENT '1=admin , 2 = staff, 3=Secretary'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `work_id`, `work_email`, `name`, `address`, `contact`, `username`, `password`, `type`) VALUES
(1, 'SKEVBE1811', 'bengike@muranga.org.ke', 'Kevin Bengi', '', '', 'Kevo', 'IEC61508', 1),
(7, '', '', 'Eunice Kiruto', '', '', 'eunicekip', 'EuniceKip123', 3),
(10, 'STEPS1811', 'STEPH_4966@outlook.com', 'Stephen Letoo', '340 Bungoma', '0796172980', 'STEVTO123', 'STEVTO123', 2),
(11, '', '', 'peter Njuguna', '', '', 'NJUGPETER123', 'Perfection@2024', 1),
(21, '', '', 'Kelvin Wafula', '', '', 'KELVOWAF123', 'STEVTO123', 2),
(25, '', '', 'DARRYL W HONDORP', '', '', 'secretary', 'IEC61508', 3),
(26, '', '', 'Frank', '', '', 'Frank123', 'Frank', 3),
(27, '', '', 'Naserian', '', '', 'Naserian123', 'Naserian123', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `attendance`
--
ALTER TABLE `attendance`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `department`
--
ALTER TABLE `department`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `employees`
--
ALTER TABLE `employees`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `meetings`
--
ALTER TABLE `meetings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `message`
--
ALTER TABLE `message`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `minutes`
--
ALTER TABLE `minutes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `position`
--
ALTER TABLE `position`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `register`
--
ALTER TABLE `register`
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
-- AUTO_INCREMENT for table `attendance`
--
ALTER TABLE `attendance`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `department`
--
ALTER TABLE `department`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `employees`
--
ALTER TABLE `employees`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `meetings`
--
ALTER TABLE `meetings`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `message`
--
ALTER TABLE `message`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `minutes`
--
ALTER TABLE `minutes`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `notifications`
--
ALTER TABLE `notifications`
  MODIFY `Id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `position`
--
ALTER TABLE `position`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `register`
--
ALTER TABLE `register`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
