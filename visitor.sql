-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 27, 2019 at 02:54 PM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.3.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `visitor`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(2) NOT NULL,
  `admin_name` varchar(20) NOT NULL,
  `admin_username` varchar(20) NOT NULL,
  `admin_password` varchar(20) NOT NULL,
  `admin_contact` bigint(10) NOT NULL,
  `admin_email` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `admin_name`, `admin_username`, `admin_password`, `admin_contact`, `admin_email`) VALUES
(1, 'kunal bhandari', 'kunu21', 'let69', 8951721798, 'kunalbhandari.is.com'),
(2, 'nagashreyas sp', 'nagasp', 'tel69', 8051236541, 'nagashreyassp.is16@rvce.edu.in'),
(3, 'vinay', 'vinay', 'ami69', 8098236545, 'vinay.is16@rvce.edu.in'),
(4, 'hodise', 'isehod', 'iam69', 8051236632, 'hodise.is16@rvce.edu.in'),
(5, 'principal', 'princi', 'iam619', 7521236632, 'principal@rvce.edu.in');

-- --------------------------------------------------------

--
-- Table structure for table `current_visitors`
--

CREATE TABLE `current_visitors` (
  `cur_visitor_key` bigint(10) NOT NULL,
  `cur_visitor_id` varchar(20) NOT NULL,
  `cur_visitor_name` varchar(20) NOT NULL,
  `cur_visitor_contact` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `current_visitors`
--

INSERT INTO `current_visitors` (`cur_visitor_key`, `cur_visitor_id`, `cur_visitor_name`, `cur_visitor_contact`) VALUES
(36, '125987741045', 'dsd', '9845118967'),
(38, '178987741045', 'deepika', '8745129630'),
(37, '358963214785', 'kishan', '9845118966'),
(39, '744424069929', 'preetham', '9002323357'),
(41, 'EAW10252K', 'shwetha', '9845114541'),
(40, 'KA162016897412', 'prerna', '9845114525');

-- --------------------------------------------------------

--
-- Table structure for table `defaulters`
--

CREATE TABLE `defaulters` (
  `defaulter_key` bigint(10) NOT NULL,
  `id` varchar(20) NOT NULL,
  `name` varchar(20) NOT NULL,
  `contact` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `defaulters`
--

INSERT INTO `defaulters` (`defaulter_key`, `id`, `name`, `contact`) VALUES
(24, '100020003000', 'gundaram', '8123580220'),
(10, '789654123029', 'mujibai', '9845114899');

-- --------------------------------------------------------

--
-- Table structure for table `security`
--

CREATE TABLE `security` (
  `security_id` int(2) NOT NULL,
  `admin_id_fk` int(2) NOT NULL,
  `security_name` varchar(20) NOT NULL,
  `security_username` varchar(20) NOT NULL,
  `security_password` varchar(20) NOT NULL,
  `security_email` varchar(30) NOT NULL,
  `security_contact` bigint(10) NOT NULL,
  `link` varchar(40) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `security`
--

INSERT INTO `security` (`security_id`, `admin_id_fk`, `security_name`, `security_username`, `security_password`, `security_email`, `security_contact`, `link`) VALUES
(1, 1, 'kunal bhandari', 'kunu21', 'let69', 'kunalbhandari.is16@rvce.edu.in', 8951721798, 'NULL'),
(2, 2, 'nagashreyas', 'naga19', 'tel96', 'nagashreyassp.is16@rvce.edu.in', 9591247399, 'NULL'),
(3, 1, 'kumaranna', 'kumar', 'macho24', 'kumarabhijeet.is16@rvce.edu.in', 8618250830, 'NULL'),
(4, 5, 'bhanushekhar', 'bhanu25', 'cool69', 'kunal_bhandari15@yahoo.com', 8618250830, 'NULL'),
(5, 3, 'somashekhar', 'soma25', 'cool96', 'nagashreyas.is16@rvce.edu.in', 8951250830, 'NULL');

-- --------------------------------------------------------

--
-- Table structure for table `visitee`
--

CREATE TABLE `visitee` (
  `visitee_id` varchar(10) NOT NULL,
  `visitee_name` varchar(20) NOT NULL,
  `visitee_department` varchar(15) NOT NULL,
  `visitee_designation` varchar(15) NOT NULL,
  `visitee_email` varchar(30) NOT NULL,
  `visitee_contact` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `visitee`
--

INSERT INTO `visitee` (`visitee_id`, `visitee_name`, `visitee_department`, `visitee_designation`, `visitee_email`, `visitee_contact`) VALUES
('1RV16CS061', 'tushar', 'CSE', 'student', 'tushar@gmail.com', '9876523012'),
('1RV16CS062', 'aman', 'CSE', 'student', 'aman@gmail.com', '9658523012'),
('1RV16IS018', 'jibran', 'ISE', 'student', 'jibran15@gmail.com', '8523697410'),
('1RV16IS025', 'kunal', 'ISE', 'student', 'kunalbhandari15@gmail.com', '8951721798'),
('1RV16IS030', 'nagashreyas', 'ISE', 'student', 'nagashreyassp@gmail.com', '8053123012'),
('1RV16IS062', 'yash', 'ISE', 'student', 'yash@gmail.com', '9653123012'),
('1RV16TC061', 'tushar', 'TCE', 'student', 'tushartc@gmail.com', '9876564012'),
('1RV16TC081', 'raghu', 'TCE', 'student', 'raghutc@gmail.com', '9876564999'),
('ADMIN01', 'subramanya', 'ADMINISTRATION', 'principal', 'princi@rvce.edu.in', '8951727899'),
('ADMIN02', 'srikanth', 'ADMINISTRATION', 'administration', 'srikanth@gmail.com', '8421774888'),
('ADMIN03', 'shanmukha', 'ADMINISTRATION', 'administration', 'shanmukha@rvce.edu.in', '9001672298'),
('BASIC01', 'srinath', 'BASIC SCIENCES', 'staff', 'srinath@gmail.com', '7821774888'),
('BASIC02', 'babu', 'BASIC SCIENCES', 'staff', 'babu@rvce.edu.in', '8911652156'),
('BASIC03', 'sridhar', 'BASIC SCIENCES', 'staff', 'sridhar@rvce.edu.in', '9999160551'),
('HODASE', 'raviraj', 'ASE', 'hod', 'raviraj@rvce.edu.in', '9819246311'),
('HODBT', 'vidya', 'BTE', 'hod', 'vidya@rvce.edu.in', '9918392145'),
('HODCSE', 'ramakanth', 'CSE', 'hod', 'rama@gmail.com', '9812564999'),
('HODECE', 'geetha', 'ECE', 'hod', 'geetha.ece@rvce.edu.in', '9823310096'),
('HODEEE', 'rudranna', 'EEE', 'hod', 'rundranna@rvce.edu.in', '8796711098'),
('HODISE', 'sagar', 'ISE', 'hod', 'sagar@gmail.com', '9875632140'),
('HODTCE', 'kantharam', 'TCE', 'hod', 'kantharam@gmail.com', '6512564999'),
('HOSTEL01', 'jaykar', 'HOSTEL', 'warden', 'jaykar@gmail.com', '7821774965'),
('HOSTEL02', 'suresh', 'HOSTEL', 'staff', 'suresh@rvce.edu.in', '8819241160'),
('NONSTAFF01', 'mohan', 'MISCELLANEOUS', 'others', 'mohan@rvce.edu.in', '9631477410'),
('NONSTAFF02', 'santosh', 'MISCELLANEOUS', 'others', 'santosh@gmail.com', '6412369852'),
('NONSTAFF03', 'ujwal', 'MISCELLANEOUS', 'others', 'ujwal@rvce.edu.in', '7891625611'),
('STAFFCSE01', 'aman', 'CSE', 'staff', 'amanstaff@gmail.com', '7458523012'),
('STAFFCSE02', 'merin', 'ISE', 'staff', 'merincse@gmail.com', '6519664888'),
('STAFFCSE03', 'badrinath', 'CSE', 'staff', 'badrinath@rvce.edu.in', '9812091174'),
('STAFFEEE01', 'dinesh', 'EEE', 'staff', 'dinesh@rvce.edu.in', '7861119820'),
('STAFFISE01', 'rajshekar', 'ISE', 'staff', 'rajshekar@gmail.com', '6512964999'),
('STAFFISE02', 'chethna', 'ISE', 'staff', 'chethnaise@gmail.com', '6519664999'),
('STAFFISE03', 'anisha', 'ISE', 'staff', 'anish@rvce.edu.in', '9342912218'),
('STAFFISE04', 'padmashree', 'ISE', 'staff', 'padmashree@rvce.edu.in', '9711926435'),
('STAFFISE05', 'swetha', 'ISE', 'staff', 'swetha@rvce.edu.in', '8911245311'),
('STAFFISE06', 'priya', 'ISE', 'staff', 'priya@rvce.edu.in', '9117234511'),
('STAFFTCE01', 'yogitha', 'TCE', 'staff', 'yogitatce@gmail.com', '8419674888'),
('STAFFTCE02', 'padma', 'TCE', 'staff', 'padmatce@gmail.com', '8419664888');

-- --------------------------------------------------------

--
-- Table structure for table `visitors`
--

CREATE TABLE `visitors` (
  `visitor_key` bigint(10) NOT NULL,
  `visitor_id` varchar(20) NOT NULL,
  `visitor_name` varchar(20) NOT NULL,
  `visitor_gender` varchar(6) NOT NULL,
  `visitor_age` int(2) NOT NULL,
  `visitor_contact` varchar(10) NOT NULL,
  `visitor_email` varchar(30) DEFAULT NULL,
  `check_in_date` date NOT NULL,
  `check_in_time` time NOT NULL,
  `security_id_fk` int(2) NOT NULL,
  `security_name` varchar(20) NOT NULL,
  `check_out_date` date DEFAULT NULL,
  `check_out_time` time DEFAULT NULL,
  `visitor_image` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `visitors`
--

INSERT INTO `visitors` (`visitor_key`, `visitor_id`, `visitor_name`, `visitor_gender`, `visitor_age`, `visitor_contact`, `visitor_email`, `check_in_date`, `check_in_time`, `security_id_fk`, `security_name`, `check_out_date`, `check_out_time`, `visitor_image`) VALUES
(1, '744424069984', 'dinesh', 'male', 53, '9845114899', 'dinesh@mail.com', '2019-02-27', '11:46:50', 1, 'kunu21', '2019-03-05', '16:03:16', ''),
(2, '789654123021', 'fr', 'male', 25, '9845114578', 'fr@ymail.in', '2019-02-27', '21:12:53', 1, 'kunu21', '2019-03-05', '16:59:18', ''),
(3, '987123654000', 'mahesh', 'male', 45, '9845101234', 'mahesh@umail.in', '2019-03-03', '21:08:50', 1, 'kunu21', '2019-03-19', '20:45:17', 'imagefolder/3.png'),
(10, '789654123029', 'mujibai', 'male', 78, '9845114899', 'dedd@umail.com', '2019-03-05', '12:06:56', 1, 'kunu21', '2019-03-07', '07:00:30', 'imagefolder/10.png'),
(11, '123123456456', 'choli', 'male', 39, '9845114530', 'choli@gmail.com', '2019-03-07', '06:12:38', 1, 'kunu21', '2019-03-19', '20:45:07', 'imagefolder/11.png'),
(12, '789123654123', 'vishal', 'male', 31, '8546612305', 'vishal@gmail.com', '2019-03-07', '06:39:36', 1, 'kunu21', '2019-03-19', '20:45:10', 'imagefolder/12.png'),
(13, '456000123654', 'kumar', 'male', 28, '8974560789', 'kumarmyself@umail.in', '2019-03-07', '06:50:05', 1, 'kunu21', '2019-03-07', '07:00:49', 'imagefolder/13.png'),
(14, '125987741099', 'surekha', 'female', 26, '7641236540', 'surekha@umail.in', '2019-03-07', '06:58:22', 1, 'kunu21', '2019-03-19', '20:45:20', 'imagefolder/14.png'),
(15, '789654123864', 'faizal', 'male', 34, '9845118939', 'faizal@gmail.com', '2019-03-07', '07:08:12', 1, 'kunu21', '2019-03-07', '15:31:17', 'imagefolder/15.png'),
(16, '123789456123', 'preetham', 'male', 23, '8563214789', 'pree@umail.in', '2019-03-07', '15:29:45', 2, 'naga19', '2019-03-07', '15:30:55', 'imagefolder/16.png'),
(18, '325698741000', 'arnab', 'male', 20, '8877443320', 'kunal@rvce.edu', '2019-03-20', '06:22:37', 1, 'kunu21', '2019-03-20', '10:00:26', 'imagefolder/18.png'),
(19, '789654123028', 'vinay', 'male', 36, '8512365478', 'vinay@gmail.com', '2019-03-20', '09:59:17', 1, 'kunu21', '2019-03-25', '06:03:18', 'imagefolder/19.png'),
(20, '123123456455', 'sonam', 'female', 29, '9925259925', 'sonam@gmail.com', '2019-03-23', '10:46:30', 1, 'kunu21', '2019-03-25', '06:06:00', 'imagefolder/20.png'),
(21, '111100009874', 'sunil', 'male', 27, '9755123456', 'sunil@gmail.com', '2019-03-24', '06:19:54', 1, 'kunu21', '2019-03-24', '15:40:51', 'imagefolder/21.png'),
(22, '111100001111', 'duggu', 'male', 5, '9494940110', 'duggu@gmail.com', '2019-03-24', '06:37:49', 1, 'kunu21', '2019-03-24', '15:40:13', 'imagefolder/22.png'),
(23, '111122220000', 'dsd', 'male', 25, '9100001234', 'aman@gmail.com', '2019-03-24', '06:47:31', 1, 'kunu21', '2019-03-24', '15:40:54', 'imagefolder/23.png'),
(24, '100020003000', 'gundaram', 'male', 54, '8123580220', 'gunda@gmail.com', '2019-03-24', '06:53:25', 1, 'kunu21', '2019-03-25', '06:02:02', 'imagefolder/24.png'),
(25, '102312301000', 'Minerva', 'male', 49, '9845114578', 'srikanth@hotmail.com', '2019-03-24', '06:55:25', 1, 'kunu21', '2019-03-25', '05:36:23', 'imagefolder/25.png'),
(26, '456654456654', 'indira', 'female', 36, '9845118967', 'indiramyself@gmail.com', '2019-03-24', '15:33:21', 1, 'kunu21', '2019-03-25', '05:41:43', 'imagefolder/26.png'),
(27, '789987456654', 'rahuli', 'female', 29, '8123123123', 'rahulihotmail@hotmail.com', '2019-03-24', '15:38:59', 1, 'kunu21', '2019-03-25', '06:04:54', 'imagefolder/27.png'),
(28, '744424069981', 'arnab', 'female', 20, '9002323356', 'arnab@gmail.com', '2019-03-25', '05:07:23', 1, 'kunu21', '2019-03-25', '05:38:52', 'imagefolder/28.png'),
(29, '012301234569', 'virat', 'female', 29, '8951722798', 'virat@gmail.com', '2019-03-25', '05:32:27', 1, 'kunu21', '2019-03-25', '05:36:45', 'imagefolder/29.png'),
(30, '100020003001', 'arnab', 'male', 21, '9002323356', 'arnab@gmail.com', '2019-03-25', '06:26:39', 1, 'kunu21', '2019-03-25', '06:27:20', 'imagefolder/30.png'),
(31, '744424069987', 'dsd', 'male', 22, '9002323356', 'aman@gmail.com', '2019-03-25', '06:29:11', 1, 'kunu21', '2019-03-25', '06:29:36', 'imagefolder/31.png'),
(32, '744424069999', 'kunal', 'male', 20, '9002323356', 'kunalbhandari15@gmail.com', '2019-03-26', '08:41:30', 1, 'kunu21', '2019-03-26', '08:43:10', 'imagefolder/32.png'),
(33, '744424069999', 'mujib', 'male', 25, '9845118966', 'kunal@rvce.edu.in', '2019-03-26', '08:47:58', 1, 'kunu21', '2019-03-26', '09:00:33', NULL),
(34, '744424069998', 'lav', 'male', 19, '9002323356', 'kunalbhandari15@gmail.com', '2019-03-26', '08:55:55', 1, 'kunu21', '2019-03-26', '09:00:41', 'imagefolder/34.png'),
(35, '744424069900', 'subru', 'female', 24, '9845118966', 'dedd@gmail.com', '2019-03-26', '09:01:57', 1, 'kunu21', '2019-03-26', '15:49:12', 'imagefolder/35.png'),
(36, '125987741045', 'dsd', 'male', 22, '9845118967', 'as@gmail.com', '2019-03-26', '15:35:29', 1, 'kunu21', NULL, NULL, 'imagefolder/36.png'),
(37, '358963214785', 'kishan', 'male', 36, '9845118966', 'kishan@gmail.com', '2019-03-26', '15:52:00', 1, 'kunu21', NULL, NULL, 'imagefolder/37.png'),
(38, '178987741045', 'deepika', 'female', 24, '8745129630', 'deepika@hotmail.com', '2019-03-26', '18:32:31', 1, 'kunu21', NULL, NULL, 'imagefolder/38.png'),
(39, '744424069929', 'preetham', 'male', 21, '9002323357', 'pree@umail.in', '2019-03-27', '05:30:27', 1, 'kunu21', NULL, NULL, 'imagefolder/39.png'),
(40, 'KA162016897412', 'prerna', 'female', 21, '9845114525', '', '2019-03-27', '14:38:07', 1, 'kunu21', NULL, NULL, 'imagefolder/40.png'),
(41, 'EAW10252K', 'shwetha', 'female', 31, '9845114541', '', '2019-03-27', '14:48:57', 1, 'kunu21', NULL, NULL, 'imagefolder/41.png');

-- --------------------------------------------------------

--
-- Table structure for table `visits`
--

CREATE TABLE `visits` (
  `visitor_key_fk` bigint(10) NOT NULL,
  `visitee_id_fk` varchar(10) NOT NULL,
  `purpose_of_visit` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `visits`
--

INSERT INTO `visits` (`visitor_key_fk`, `visitee_id_fk`, `purpose_of_visit`) VALUES
(1, '1RV16IS025', 'attendance'),
(2, 'ADMIN01', 'administration purpose'),
(3, 'HODISE', 'private'),
(10, 'HODISE', 'attendance'),
(11, '1RV16IS062', 'attendance'),
(12, 'BASIC01', 'hostel'),
(13, 'HOSTEL01', 'hostel'),
(14, 'NONSTAFF01', 'administration'),
(15, 'STAFFCSE02', 'private'),
(16, 'HOSTEL01', 'private'),
(18, 'HOSTEL01', 'hostel'),
(19, '1RV16IS025', 'private'),
(20, 'STAFFTCE02', 'complaint'),
(21, '1RV16CS061', 'principal'),
(22, '1RV16IS025', 'private'),
(23, '1RV16CS062', 'hostel'),
(24, '1RV16TC081', 'ptm'),
(25, 'ADMIN02', 'administration'),
(26, '1RV16TC081', 'my life my rules y u care ok bye'),
(27, 'STAFFTCE01', 'my life my rules y u care ok bye '),
(28, '1RV16IS025', 'company meeting'),
(29, '1RV16IS025', 'my life my rules y u care ok bye'),
(30, '1RV16IS025', 'private'),
(31, '1RV16CS062', 'administration'),
(32, '1RV16IS025', 'my life my rules y u care ok bye'),
(33, '1RV16IS025', 'private'),
(34, '1RV16IS025', 'complaint'),
(35, '1RV16IS025', 'administration'),
(36, '1RV16IS025', 'ptm'),
(37, 'STAFFISE01', 'ptm'),
(38, 'HODASE', 'drdo'),
(39, '1RV16IS062', 'meeting friend'),
(40, 'HODBT', 'private'),
(41, 'HODECE', 'private');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`),
  ADD UNIQUE KEY `admin_email` (`admin_email`),
  ADD UNIQUE KEY `admin_username` (`admin_username`);

--
-- Indexes for table `current_visitors`
--
ALTER TABLE `current_visitors`
  ADD PRIMARY KEY (`cur_visitor_id`),
  ADD KEY `cur_visitor_key` (`cur_visitor_key`);

--
-- Indexes for table `defaulters`
--
ALTER TABLE `defaulters`
  ADD PRIMARY KEY (`id`),
  ADD KEY `defaulter_key` (`defaulter_key`);

--
-- Indexes for table `security`
--
ALTER TABLE `security`
  ADD PRIMARY KEY (`security_id`),
  ADD UNIQUE KEY `security_email` (`security_email`),
  ADD UNIQUE KEY `security_username` (`security_username`),
  ADD KEY `admin_id_fk` (`admin_id_fk`);

--
-- Indexes for table `visitee`
--
ALTER TABLE `visitee`
  ADD PRIMARY KEY (`visitee_id`);

--
-- Indexes for table `visitors`
--
ALTER TABLE `visitors`
  ADD PRIMARY KEY (`visitor_key`),
  ADD KEY `security_id_fk1` (`security_id_fk`);

--
-- Indexes for table `visits`
--
ALTER TABLE `visits`
  ADD PRIMARY KEY (`visitor_key_fk`),
  ADD KEY `visitee_id_fk` (`visitee_id_fk`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `visitors`
--
ALTER TABLE `visitors`
  MODIFY `visitor_key` bigint(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `visits`
--
ALTER TABLE `visits`
  MODIFY `visitor_key_fk` bigint(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `current_visitors`
--
ALTER TABLE `current_visitors`
  ADD CONSTRAINT `cur_visitor_key` FOREIGN KEY (`cur_visitor_key`) REFERENCES `visitors` (`visitor_key`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `defaulters`
--
ALTER TABLE `defaulters`
  ADD CONSTRAINT `defaulter_key` FOREIGN KEY (`defaulter_key`) REFERENCES `visitors` (`visitor_key`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `security`
--
ALTER TABLE `security`
  ADD CONSTRAINT `admin_id_fk` FOREIGN KEY (`admin_id_fk`) REFERENCES `admin` (`admin_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `visitors`
--
ALTER TABLE `visitors`
  ADD CONSTRAINT `security_id_fk1` FOREIGN KEY (`security_id_fk`) REFERENCES `security` (`security_id`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Constraints for table `visits`
--
ALTER TABLE `visits`
  ADD CONSTRAINT `visitee_id_fk` FOREIGN KEY (`visitee_id_fk`) REFERENCES `visitee` (`visitee_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `visitor_key_fk` FOREIGN KEY (`visitor_key_fk`) REFERENCES `visitors` (`visitor_key`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
