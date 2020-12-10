-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 09, 2020 at 01:18 PM
-- Server version: 10.1.30-MariaDB
-- PHP Version: 7.2.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `lab_management`
--

-- --------------------------------------------------------

--
-- Table structure for table `acid_fast_staining`
--

CREATE TABLE `acid_fast_staining` (
  `afs_id` int(11) NOT NULL,
  `testDetails_id` int(11) DEFAULT NULL,
  `afs_lab_findings` varchar(255) DEFAULT NULL,
  `afs_remarks` varchar(300) DEFAULT NULL,
  `parity` varchar(20) DEFAULT NULL,
  `daily_milk_production` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `acid_fast_staining`
--

INSERT INTO `acid_fast_staining` (`afs_id`, `testDetails_id`, `afs_lab_findings`, `afs_remarks`, `parity`, `daily_milk_production`) VALUES
(1, 10, NULL, '', 'this is testing entr', 'this is testing entr');

-- --------------------------------------------------------

--
-- Table structure for table `antibiotics`
--

CREATE TABLE `antibiotics` (
  `antibiotics_id` int(11) NOT NULL,
  `antibiotics_name` varchar(50) DEFAULT NULL,
  `created_by` int(11) NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `is_trash` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `breeds`
--

CREATE TABLE `breeds` (
  `breed_id` int(11) NOT NULL,
  `cattle_id` int(11) NOT NULL,
  `breed_name` varchar(50) DEFAULT NULL,
  `is_trash` int(11) NOT NULL DEFAULT '0',
  `created_by` int(11) NOT NULL,
  `created_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `breeds`
--

INSERT INTO `breeds` (`breed_id`, `cattle_id`, `breed_name`, `is_trash`, `created_by`, `created_date`) VALUES
(1, 2, 'Austrillian', 1, 2, '2020-07-24 14:29:08'),
(2, 1, 'Fresien', 0, 2, '2020-07-24 14:30:22'),
(3, 3, 'Germans Shepherd  ', 1, 2, '2020-07-24 14:30:51'),
(4, 1, 'Jersy', 0, 2, '2020-07-30 10:12:06'),
(5, 1, 'Sahiwaal', 0, 2, '2020-10-02 18:32:59'),
(6, 1, 'Achai', 0, 2, '2020-10-02 18:33:26'),
(7, 1, 'Non Descriptive', 0, 2, '2020-10-02 18:34:31'),
(8, 5, 'Balkhi', 0, 2, '2020-10-06 00:08:09'),
(9, 5, 'Damani', 0, 2, '2020-10-11 22:13:29'),
(10, 5, 'Hashtnagri', 0, 2, '2020-10-11 22:13:45'),
(11, 5, 'Kaghani', 0, 2, '2020-10-11 22:13:59'),
(12, 5, 'Rambouieet', 0, 2, '2020-10-11 22:14:25'),
(13, 5, 'Waziri', 0, 2, '2020-10-11 22:14:37'),
(14, 1, 'Crossed', 0, 2, '2020-10-11 22:15:00'),
(15, 2, 'Azakhili', 0, 2, '2020-10-11 22:15:22'),
(16, 2, 'Kundi', 0, 2, '2020-10-11 22:15:36'),
(17, 2, 'Nili Ravi', 0, 2, '2020-10-11 22:15:50'),
(18, 4, 'Beetal', 0, 2, '2020-10-11 22:16:22'),
(19, 4, 'Damani', 0, 2, '2020-10-11 22:17:06'),
(20, 4, 'Kaghani', 0, 2, '2020-10-11 22:18:24'),
(21, 4, 'Potohari', 0, 2, '2020-10-11 22:18:43'),
(22, 4, 'Surgulai', 0, 2, '2020-10-11 22:19:05'),
(23, 4, 'Teddy', 0, 2, '2020-10-11 22:19:19'),
(24, 4, 'Local', 0, 2, '2020-10-11 22:19:31'),
(25, 3, 'Al Session', 0, 2, '2020-10-20 03:46:49'),
(26, 9, 'Others', 0, 2, '2020-12-07 16:43:51');

-- --------------------------------------------------------

--
-- Table structure for table `brucella_animal_ind`
--

CREATE TABLE `brucella_animal_ind` (
  `brucella_animal_ind_id` int(11) NOT NULL,
  `testDetails_id` int(11) NOT NULL,
  `tag_no` varchar(20) DEFAULT NULL,
  `history` varchar(25) DEFAULT NULL,
  `vac_against_brucellosis` varchar(25) DEFAULT NULL,
  `sample` varchar(20) DEFAULT NULL,
  `result` varchar(50) DEFAULT NULL,
  `parity` varchar(20) DEFAULT NULL,
  `technician` varchar(25) DEFAULT NULL,
  `created_by` int(11) NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `cattles`
--

CREATE TABLE `cattles` (
  `cattle_id` int(11) NOT NULL,
  `cattle_name` varchar(50) DEFAULT NULL,
  `created_by` int(11) NOT NULL,
  `created_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `is_trash` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cattles`
--

INSERT INTO `cattles` (`cattle_id`, `cattle_name`, `created_by`, `created_date`, `is_trash`) VALUES
(1, 'Cow', 2, '2020-07-24 14:24:12', 0),
(2, 'Buffalo', 2, '2020-07-24 14:25:09', 0),
(3, 'Dog', 2, '2020-07-24 14:25:16', 0),
(4, 'Goat', 2, '2020-07-24 14:25:23', 0),
(5, 'Sheep', 2, '2020-10-02 18:30:40', 0),
(6, 'Rabbit', 2, '2020-10-19 03:47:29', 0),
(7, 'Camel', 2, '2020-10-19 03:48:27', 0),
(8, 'Horse', 2, '2020-10-19 03:49:06', 0),
(9, 'Mouse', 2, '2020-10-19 03:49:27', 0),
(10, 'Rat', 2, '2020-10-19 03:49:36', 0),
(11, 'Monkey', 2, '2020-10-19 03:49:44', 0),
(12, 'Cat', 2, '2020-10-19 03:50:31', 0);

-- --------------------------------------------------------

--
-- Table structure for table `center_station`
--

CREATE TABLE `center_station` (
  `center_station_id` int(11) NOT NULL,
  `district_id` int(11) NOT NULL,
  `directorate_id` int(11) NOT NULL,
  `center_station_name` varchar(255) NOT NULL,
  `center_station_phone` varchar(20) DEFAULT NULL,
  `center_station_fax` varchar(25) DEFAULT NULL,
  `center_station_email` varchar(25) DEFAULT NULL,
  `center_station_website` varchar(50) DEFAULT NULL,
  `center_station_address` varchar(255) DEFAULT NULL,
  `created_by` int(11) NOT NULL,
  `created_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `is_trash` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `center_station`
--

INSERT INTO `center_station` (`center_station_id`, `district_id`, `directorate_id`, `center_station_name`, `center_station_phone`, `center_station_fax`, `center_station_email`, `center_station_website`, `center_station_address`, `created_by`, `created_date`, `is_trash`) VALUES
(1, 3, 2, 'CAN, LR&D Peshawar', '0919-210218', '0919-210218', 'test@gmail.com', 'http://lims.kpdata.gov.pk/	', 'VRI, Bacha Khan Chowk, Peshawar    ', 2, '2020-07-21 08:54:24', 0),
(2, 3, 2, 'Center of VRI', '3333-333333', '0919-210218', 'test@gmail.com', 'http://lims.kpdata.gov.pk/	', '  ', 2, '2020-07-21 08:58:49', 1),
(3, 3, 3, 'CBP, VRI Peshawar', '0919-210218', '0919-210218', 'test@gmail.com', 'http://lims.kpdata.gov.pk/	', 'VRI, Bacha Khan Chowk, Peshawar', 2, '2020-07-23 16:41:54', 0),
(4, 3, 3, 'CMB, VRI Peshawar', '0919-210218', '0919-210218', 'test@gmail.com', 'http://lims.kpdata.gov.pk/	', ' VRI, Bacha Khan Chowk, Peshawar ', 2, '2020-08-06 15:54:59', 0),
(5, 3, 3, 'CPP, VRI Peshawar', '0919-210218', '0919-210218', 'test@gmail.com', 'http://lims.kpdata.gov.pk/	', 'VRI, Bacha Khan Chowk, Peshawar', 2, '2020-09-24 12:18:52', 0),
(6, 3, 3, 'FMDVRC, VRI Peshawar', '0919-210218', '0919-210218', 'test@gmail.com', 'http://lims.kpdata.gov.pk/	', ' VRI, Bacha Khan Chowk, Peshawar ', 2, '2020-10-01 03:45:01', 0),
(7, 7, 3, 'VR&DIC, Abbattabad', '0919-210218', '0919-210218', 'test@gmail.com', 'http://lims.kpdata.gov.pk/	', ' Misile Chowk, Mandian, Abbottabad ', 2, '2020-10-01 03:47:18', 0),
(8, 4, 3, 'VR&DIC Swat', '0919-210218', '0919-210218', 'test@gmail.com', 'http://lims.kpdata.gov.pk/	', 'Balogram, Swat', 2, '2020-10-01 03:48:44', 0),
(9, 1, 3, 'VR&DIC, Kohat', '0919-210218', '0919-210218', 'test@gmail.com', 'http://lims.kpdata.gov.pk/	', ' Railway Patak, Hangu Chowk, Kohat ', 2, '2020-10-01 03:50:04', 0),
(10, 5, 3, 'VR&DIC, Dera Ismail Khan', '0919-210218', '0919-210218', 'test@gmail.com', 'http://lims.kpdata.gov.pk/	', ' Dera Ismail Khan ', 2, '2020-10-01 03:52:25', 0),
(11, 18, 3, 'VR&DIC Chitral', '0919-210218', '0919-210218', 'test@gmail.com', 'http://lims.kpdata.gov.pk/	', 'Chitral', 2, '2020-10-01 04:02:29', 0),
(12, 3, 2, 'LR&DS Surezai, Peshawar', '0919-210218', '0919-210218', 'test@gmail.com', 'http://lims.kpdata.gov.pk/	', ' Surezai, Peshawar ', 2, '2020-10-01 04:03:22', 0),
(13, 5, 2, 'LR&DS Paharpur, Dera Ismail Khan', '0919-210218', '0919-210218', 'test@gmail.com', 'http://lims.kpdata.gov.pk/	', ' Paharpur, Dera Ismail Khan ', 2, '2020-10-01 04:04:40', 0),
(14, 1, 2, 'AZSRRI Ghulam Banda Kohat', '0919-210218', '0919-210218', 'test@gmail.com', 'http://lims.kpdata.gov.pk/	', 'Ghulam Banda, Kohat', 2, '2020-10-01 04:06:03', 0),
(15, 9, 2, 'LR&DS Dir Lower', '0919-210218', '0919-210218', 'test@gmail.com', 'http://lims.kpdata.gov.pk/	', 'Hanifa, Dir Lower', 2, '2020-10-01 04:06:45', 0),
(16, 11, 2, 'PRI Jabba Mansehra', '0919-210218', '0919-210218', 'test@gmail.com', 'http://lims.kpdata.gov.pk/	', 'Jabba, Mansehra', 2, '2020-10-01 04:07:32', 0),
(17, 4, 2, 'GPRS Charbagh Swat', '0919-210218', '0919-210218', 'test@gmail.com', 'http://lims.kpdata.gov.pk/	', 'Charbagh, Swat', 2, '2020-10-01 04:08:08', 0),
(18, 2, 2, 'LR&DS Swabi', '0919-210218', '0919-210218', 'test@gmail.com', 'http://lims.kpdata.gov.pk/	', 'Swabi', 2, '2020-10-01 04:08:35', 0),
(19, 3, 4, 'Information Technology Cell', '0919-210218', '0919-210218', 'test@gmail.com', 'http://lims.kpdata.gov.pk/	', 'Information Technology Cell', 2, '2020-10-05 23:06:37', 0),
(20, 3, 4, 'Veterinary Research Institute Bacha Khan Chowk Peshawar ', '0919-210218', '0919-210218', 'test@gmail.com', 'http://lims.kpdata.gov.pk/', ' Bacha Khan Chowk, Peshawar ', 2, '2020-11-20 11:01:58', 0);

-- --------------------------------------------------------

--
-- Table structure for table `client_info`
--

CREATE TABLE `client_info` (
  `client_id` int(11) NOT NULL,
  `client_name` varchar(25) DEFAULT NULL,
  `dept_name` varchar(255) DEFAULT NULL,
  `client_contact` varchar(20) DEFAULT NULL,
  `dept_phone` varchar(20) DEFAULT NULL,
  `client_address` varchar(100) DEFAULT NULL,
  `client_cnic` varchar(20) DEFAULT NULL,
  `district_id` int(11) NOT NULL,
  `tehsil_id` int(11) NOT NULL,
  `client_vil_uc_area` text,
  `referred_by` varchar(25) DEFAULT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_by` int(11) DEFAULT NULL,
  `type` varchar(25) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `client_info`
--

INSERT INTO `client_info` (`client_id`, `client_name`, `dept_name`, `client_contact`, `dept_phone`, `client_address`, `client_cnic`, `district_id`, `tehsil_id`, `client_vil_uc_area`, `referred_by`, `date`, `created_date`, `created_by`, `type`) VALUES
(1, 'Mr. James', NULL, '2333', NULL, 'New York', '222', 0, 0, NULL, 'Dr. Yorkey', '2020-07-13 10:39:30', '2020-07-13 10:39:30', 2, NULL),
(2, 'KHan', NULL, '233', NULL, 'ksajdflkj', '3223', 0, 0, NULL, 'kkhana', '2020-07-15 05:52:37', '2020-07-15 05:52:37', 2, NULL),
(3, 'asdf', NULL, '34', NULL, 'asdf', '234', 0, 0, NULL, '33', '2020-07-27 23:42:13', '2020-07-27 23:42:13', 2, 'farmer'),
(4, 'Farmer - 1', NULL, '03113455583', NULL, 'jamie@gmail.com', '33332343', 0, 0, NULL, '', '2020-08-04 04:21:57', '2020-08-04 04:21:57', 2, 'farmer'),
(5, 'Nazim', NULL, '0346', NULL, 'nothia peshawar', '17301', 0, 0, NULL, 'Dr. Lenkin', '2020-08-06 06:33:49', '2020-08-06 06:33:49', 2, 'farmer'),
(6, 'asd', NULL, 'sadf', NULL, 'sdaf', 'sdf', 0, 0, NULL, '', '2020-08-06 13:40:01', '2020-08-06 13:40:01', 2, 'farmer'),
(7, 'asdf', NULL, 'sadf', NULL, 'sdf', 'sadf', 0, 0, NULL, '', '2020-08-06 13:41:09', '2020-08-06 13:41:09', 2, 'farmer'),
(8, 'Usman khan', '', '03119047946', '', 'Peshawar', '162027352175', 0, 0, NULL, '', '2020-08-26 01:52:39', '2020-08-26 01:52:39', 5, 'farmer'),
(9, 'Mr Jawad', '', '0311-1111111', '', 'Village Telaband Peshawar', '11111-1111111-1', 3, 6, 'Telaband', NULL, '2020-09-24 03:22:35', '2020-09-24 03:22:35', 2, 'farmer'),
(10, 'Tariq Ali', '', '0312-2222222', '', 'Surezai, Peshawar', '22222-2222222-2', 3, 7, 'Telaband, Surezai', NULL, '2020-09-25 06:06:20', '2020-09-25 06:06:20', 2, 'farmer'),
(11, 'Mr John', '', '0322-2222222', '', 'Peshawar', '31023-3333333-3', 3, 5, NULL, '', '2020-09-29 07:25:03', '2020-09-29 07:25:03', 7, 'farmer'),
(12, 'Ms. Sara Lyani', 'AZSRRI Ghulam Banda, Kohat', '0315-6666666', '0000-000000', 'Ghulam Banda Kohat', '44444-4444444-4', 1, 0, 'Ghulam Banda', '', '2020-09-29 17:19:46', '2020-09-29 17:19:46', 9, 'other_dept'),
(13, 'Anwar saeed', '', '0311-0000000', '', 'Gul Bahar, Peshawar City.', '33333-3333333-3', 3, 6, 'Gul Bahar, Peshawar City.', NULL, '2020-10-02 07:16:53', '2020-10-02 07:16:53', 2, 'farmer'),
(14, 'khan gul', '', '0322-5555555', '', 'Gul Bahar, Peshawar City.', '33333-3333333-3', 3, 6, 'Telaband', NULL, '2020-10-03 01:45:16', '2020-10-03 01:45:16', 2, 'Patient'),
(15, 'Wakeel Khan', '', '0000-0000000', '', 'Village Telaband Peshawar', '66666-6666666-6', 3, 7, 'Telaband', '', '2020-10-05 10:06:09', '2020-10-05 10:06:09', 2, 'farmer'),
(16, 'Akmal khan', '', '0000-0000000', '', 'Nasir Pur Peshawar', '77777-7777777-7', 3, 5, 'Nasir Pur', '', '2020-10-06 08:54:08', '2020-10-06 08:54:08', 8, 'farmer'),
(17, 'Muhammad ali', '', '0000-0000000', '', 'spair sung', '00000-0000000-1', 3, 79, 'spair sung', NULL, '2020-10-12 06:33:03', '2020-10-12 06:33:03', 7, 'farmer'),
(18, 'Shair bahadur', '', '0000-0000000', '', 'pabbi', '00000-0000000-2', 27, 78, 'pabbi', NULL, '2020-10-12 07:59:37', '2020-10-12 07:59:37', 7, 'farmer'),
(19, 'Rafiullah', '', '0000-0000000', '', 'Warsak ', '00000-0000000-3', 3, 5, 'Warsak', NULL, '2020-10-12 09:20:49', '2020-10-12 09:20:49', 7, 'farmer'),
(20, 'Umer shair', '', '0000-0000000', '', 'pawaki', '00000-0000000-4', 3, 6, 'pawaki', NULL, '2020-10-12 09:40:27', '2020-10-12 09:40:27', 7, 'farmer'),
(21, 'Akhtar shah', '', '0000-0000000', '', 'Adrima Peshawar', '10000-0000000-0', 3, 79, 'Adrima Peshawar', NULL, '2020-10-12 09:52:01', '2020-10-12 09:52:01', 8, 'farmer'),
(22, 'Ikram nasir pur', '', '0000-0000000', '', 'Nasir pur', '20000-0000000-0', 27, 76, 'Nasir Pur', NULL, '2020-10-12 10:30:04', '2020-10-12 10:30:04', 8, 'farmer'),
(23, 'Kafayat ullah ', '', '0000-0000000', '', 'khyber', '00000-0000000-5', 0, 0, 'khyber', NULL, '2020-10-13 05:00:57', '2020-10-13 05:00:57', 7, 'farmer'),
(24, 'Janas khan', '', '0000-0000000', '', 'charssada', '00000-0000000-7', 26, 73, 'charsadda', NULL, '2020-10-13 05:11:40', '2020-10-13 05:11:40', 7, 'farmer'),
(25, 'Abdul latif ', '', '0000-0000000', '', 'nasar pur', '00000-0000000-8', 3, 5, 'nasar pur', NULL, '2020-10-13 06:22:11', '2020-10-13 06:22:11', 7, 'farmer'),
(26, 'Azeem khan', '', '0000-0000000', '', 'phando road', '00000-0000000-9', 3, 7, 'phando road', NULL, '2020-10-13 06:29:49', '2020-10-13 06:29:49', 7, 'farmer'),
(27, 'Mumtaz khan', '', '0000-0000000', '', 'Asia gate', '00000-0000000-0', 3, 4, 'Asia gate', NULL, '2020-10-13 06:43:49', '2020-10-13 06:43:49', 7, 'farmer'),
(28, 'Yasin', '', '0000-0000000', '', 'sarband bara', '00000-0000000-6', 3, 6, 'sarband', NULL, '2020-10-13 06:55:15', '2020-10-13 06:55:15', 7, 'farmer'),
(29, 'Zahir khan', '', '0000-0000000', '', 'shabqadar', '30000-0000000-0', 26, 74, 'shabqadar', NULL, '2020-10-13 12:39:55', '2020-10-13 12:39:55', 7, 'farmer'),
(30, 'Falaq niaz ', '', '0000-0000000', '', 'Wadpaga', '00000-0000001-1', 3, 79, 'Wadpaga', NULL, '2020-10-16 10:47:15', '2020-10-16 10:47:15', 9, 'farmer'),
(31, 'Yasin', '', '0000-0000000', '', 'sarband', '24000-0000000-0', 3, 6, 'sarband', NULL, '2020-10-20 07:05:59', '2020-10-20 07:05:59', 7, 'farmer'),
(32, 'Rashid ', '', '0000-0000000', '', 'tehkal', '25000-0000000-0', 3, 6, 'tehkal', NULL, '2020-10-20 07:11:26', '2020-10-20 07:11:26', 7, 'farmer'),
(33, 'Gullfam', '', '0000-0000000', '', 'pajagi', '27600-0000000-0', 3, 5, 'pajagi', NULL, '2020-10-20 07:18:25', '2020-10-20 07:18:25', 7, 'farmer'),
(34, 'Azhar ', '', '0000-0000000', '', 'matani', '27000-0000000-0', 3, 7, 'matani', NULL, '2020-10-20 07:23:56', '2020-10-20 07:23:56', 7, 'farmer'),
(35, 'Muhammad zeb', '', '0000-0000000', '', 'tehkal', '29000-0000000-0', 3, 6, 'tehkal', NULL, '2020-10-20 07:30:15', '2020-10-20 07:30:15', 7, 'farmer'),
(36, 'Ihsanullah', '', '0000-0000000', '', 'mamukaty shabqadar', '31000-0000000-0', 26, 74, 'mamukaty', NULL, '2020-10-20 07:39:56', '2020-10-20 07:39:56', 7, 'farmer'),
(37, 'Qasim khan', '', '0000-0000000', '', 'jhagra', '32000-0000000-0', 3, 79, 'jhagra', NULL, '2020-10-20 07:45:41', '2020-10-20 07:45:41', 7, 'farmer'),
(38, '', '', '', '', 'khyber', '33000-0000000-0', 28, 80, 'khyber', NULL, '2020-10-20 09:25:31', '2020-10-20 09:25:31', 7, 'farmer'),
(39, 'Amir jan', '', '0000-0000000', '', 'charssada', '34000-0000000-0', 26, 73, 'charsadda', NULL, '2020-10-20 09:30:35', '2020-10-20 09:30:35', 7, 'farmer'),
(40, 'Amir hussain', '', '0000-0000000', '', 'Pubbi', '40000-0000000-0', 27, 78, 'Pabbi Nowshera', NULL, '2020-10-20 09:51:21', '2020-10-20 09:51:21', 8, 'farmer'),
(41, 'Syed kamran', '', '0000-0000000', '', 'Charsadda', '50000-0000000-0', 26, 73, 'Charsadda', NULL, '2020-10-20 10:11:35', '2020-10-20 10:11:35', 8, 'farmer'),
(42, 'Pervez', '', '0000-0000000', '', '35 Military Police Peshawar', '00000-1000000-0', 3, 79, '35 Military Police Peshawar', NULL, '2020-10-20 10:50:30', '2020-10-20 10:50:30', 2, 'farmer'),
(43, 'Muhammad siraj', '', '0000-0000000', '', 'Bara Khyber ', '12000-0000000-0', 28, 80, 'Bara Khyber', NULL, '2020-10-21 05:29:18', '2020-10-21 05:29:18', 8, 'farmer'),
(44, 'Hazrat ali ', '', '0000-0000000', '', 'Wadpaga Peshawar', '00000-0000010-1', 3, 79, 'Wadpaga', NULL, '2020-10-22 05:55:24', '2020-10-22 05:55:24', 2, 'farmer'),
(45, 'Wasal khan', '', '0000-0000000', '', 'Sheikh Ismail Banda', '17301-1504623-7', 27, 78, 'Sheikh Ismail Banda', NULL, '2020-10-22 07:30:48', '2020-10-22 07:30:48', 9, 'farmer'),
(46, 'Rashid', '', '0313-5370418', '', 'Badaber', '00000-0000010-2', 3, 7, 'Badaber', NULL, '2020-10-22 07:55:21', '2020-10-22 07:55:21', 9, 'farmer'),
(47, 'Arshad ali', '', '0344-9292459', '', 'Mohallah Rehan Abad', '17301-4480710-1', 3, 79, 'Landi Arbab', NULL, '2020-10-22 08:04:09', '2020-10-22 08:04:09', 9, 'farmer'),
(48, 'Ms. sara lyani', '', '0000-0000000', '', 'Gul Burg, Peshawar Cantt', '00000-0012000-0', 3, 79, 'Gul Burg, Peshawar Cantt', NULL, '2020-10-23 00:31:31', '2020-10-23 00:31:31', 2, 'farmer'),
(49, 'Ali', '', '0000-0000000', '', 'Gul Burg, Peshawar Cantt', '01000-0000000-0', 3, 79, 'Gul Burg, Peshawar Cantt', NULL, '2020-10-23 03:14:55', '2020-10-23 03:14:55', 2, 'farmer'),
(50, 'Rehman gul', '', '0000-0000000', '', 'Warsak ', '35000-0000000-0', 3, 5, 'Warsak', NULL, '2020-10-23 09:11:46', '2020-10-23 09:11:46', 7, 'farmer'),
(51, 'Atif ', '', '0000-0000000', '', 'kohat road', '36000-0000000-0', 3, 79, 'kohat road', NULL, '2020-10-23 09:19:26', '2020-10-23 09:19:26', 7, 'farmer'),
(52, 'Razi khan', '', '0000-0000000', '', 'nahqi', '37000-0000000-0', 3, 5, 'nahqi', NULL, '2020-10-23 09:23:35', '2020-10-23 09:23:35', 7, 'farmer'),
(53, 'Altaf khan', '', '0000-0000000', '', 'jumma khan kally', '38000-0000000-0', 29, 84, 'jumma khan kally', NULL, '2020-10-23 09:29:04', '2020-10-23 09:29:04', 7, 'farmer'),
(54, 'Nawaz khan', '', '0000-0000000', '', 'tangee ', '39000-0000000-0', 26, 75, 'charsadda', NULL, '2020-10-23 09:38:28', '2020-10-23 09:38:28', 7, 'farmer'),
(55, 'Muhammad nabi', '', '0000-0000000', '', 'regi', '51000-0000000-0', 3, 6, 'regi', NULL, '2020-10-26 09:42:49', '2020-10-26 09:42:49', 7, 'farmer'),
(56, 'Shah sawar', '', '0000-0000000', '', 'Warsak ', '52000-0000000-0', 3, 5, 'warsak', NULL, '2020-10-26 09:46:16', '2020-10-26 09:46:16', 7, 'farmer'),
(57, 'Zia', '', '0000-0000000', '', 'ganj gate', '53000-0000000-0', 3, 4, 'ganj gate', NULL, '2020-10-26 09:49:37', '2020-10-26 09:49:37', 7, 'farmer'),
(58, 'Zia', '', '0000-0000000', '', 'gunj gate', '54000-0000000-0', 3, 4, 'gunj gate', NULL, '2020-10-26 09:52:58', '2020-10-26 09:52:58', 7, 'farmer'),
(59, 'Jehangir', '', '0000-0000000', '', 'karkhano', '55000-0000000-0', 3, 79, 'karkhano', NULL, '2020-10-26 09:59:49', '2020-10-26 09:59:49', 7, 'farmer'),
(60, 'Tauseef', '', '0000-0000000', '', 'board bazar', '56000-0000000-0', 3, 6, 'board bazar', NULL, '2020-10-26 10:03:54', '2020-10-26 10:03:54', 7, 'farmer'),
(61, 'Baseer jamal', '', '0000-0000000', '', 'shabqadar', '57000-0000000-0', 26, 74, 'shabqadar', NULL, '2020-10-27 05:47:45', '2020-10-27 05:47:45', 7, 'farmer'),
(62, 'Baseer jamal', '', '0000-0000000', '', 'shabqadar', '58000-0000000-0', 26, 74, 'shabqadar', NULL, '2020-10-27 06:03:56', '2020-10-27 06:03:56', 7, 'farmer'),
(63, 'Sayed muzaffar shah', '', '0000-0000000', '', 'budu', '59000-0000000-0', 3, 79, 'Budu', NULL, '2020-10-27 06:20:50', '2020-10-27 06:20:50', 7, 'farmer'),
(64, 'Gulfaam ', '', '0000-0000000', '', 'tarojaba', '60000-0000000-0', 3, 79, 'tarojaba', NULL, '2020-10-27 06:30:48', '2020-10-27 06:30:48', 7, 'farmer'),
(65, 'Bait muhammad', '', '0313-9697935', '', 'achni', '61000-0000000-0', 3, 6, 'achni', NULL, '2020-10-27 06:36:12', '2020-10-27 06:36:12', 7, 'farmer'),
(66, 'Fazl e rehman', '', '0000-0000000', '', 'surezai', '62000-0000000-0', 3, 7, 'surezai', NULL, '2020-10-27 06:39:14', '2020-10-27 06:39:14', 7, 'farmer'),
(67, 'Fazl e rehman', '', '0000-0000000', '', 'surezai', '63000-0000000-0', 3, 7, 'surezai', NULL, '2020-10-27 06:42:03', '2020-10-27 06:42:03', 7, 'farmer'),
(68, 'Bait muhammad', '', '0000-0000000', '', 'achni', '64000-0000000-0', 3, 6, 'achni', NULL, '2020-10-27 06:46:11', '2020-10-27 06:46:11', 7, 'farmer'),
(69, 'Amin', '', '0000-0000000', '', 'kohat road', '66000-0000000-0', 3, 4, 'kohat road', NULL, '2020-10-27 07:06:01', '2020-10-27 07:06:01', 7, 'farmer'),
(70, 'Wahid', '', '0000-0000000', '', 'khazana', '67000-0000000-0', 3, 5, 'khazana', NULL, '2020-10-27 07:10:55', '2020-10-27 07:10:55', 7, 'farmer'),
(71, 'Ijaz', '', '0000-0000000', '', 'shabqadar', '68000-0000000-0', 26, 74, 'shabqadar', NULL, '2020-10-27 07:14:30', '2020-10-27 07:14:30', 7, 'farmer'),
(72, 'Nadir khan', '', '0000-0000000', '', 'shabqadar', '69000-0000000-0', 26, 74, 'shabqadar', NULL, '2020-10-27 07:20:49', '2020-10-27 07:20:49', 7, 'farmer'),
(73, 'Nisaar', '', '0000-0000000', '', 'shabqadar', '70000-0000000-0', 26, 74, 'shabqadar', NULL, '2020-10-27 07:24:06', '2020-10-27 07:24:06', 7, 'farmer'),
(74, 'Doulat khan', '', '0000-0000000', '', 'doranpur', '71000-0000000-0', 3, 79, 'Doran pur', NULL, '2020-10-27 07:30:12', '2020-10-27 07:30:12', 7, 'farmer'),
(75, 'Doulat khan', '', '0000-0000000', '', 'doranpur', '72000-0000000-0', 3, 79, 'Doran pur', NULL, '2020-10-27 07:33:01', '2020-10-27 07:33:01', 7, 'farmer'),
(76, 'Riaz', '', '0000-0000000', '', 'sarband', '73000-0000000-0', 3, 6, 'sarband', NULL, '2020-10-27 07:36:25', '2020-10-27 07:36:25', 7, 'farmer'),
(77, 'Noshair awan', '', '0000-0000000', '', 'muslim abad, bakhsipul', '74000-0000000-0', 3, 79, 'bakhshi pul', NULL, '2020-10-27 07:44:27', '2020-10-27 07:44:27', 7, 'farmer'),
(78, 'Hayat khan', '', '0000-0000000', '', 'bara', '75000-0000000-0', 3, 79, 'bara', NULL, '2020-10-27 07:48:00', '2020-10-27 07:48:00', 7, 'farmer'),
(79, 'Zubair khan', '', '0000-0000000', '', 'charsada', '76000-0000000-0', 26, 73, 'charsadda', NULL, '2020-10-27 07:50:52', '2020-10-27 07:50:52', 7, 'farmer'),
(80, 'Anwar khan', '', '0000-0000000', '', 'tangi', '77000-0000000-0', 26, 75, 'tangi', NULL, '2020-10-27 07:55:45', '2020-10-27 07:55:45', 7, 'farmer'),
(81, 'Anwar khan', '', '0000-0000000', '', 'tangi', '78000-0000000-0', 26, 75, 'tangi', NULL, '2020-10-27 08:39:13', '2020-10-27 08:39:13', 7, 'farmer'),
(82, 'Fayaz khan', '', '0000-0000000', '', 'muhmand', '79000-0000000-0', 29, 84, 'muhmand', NULL, '2020-10-27 08:42:10', '2020-10-27 08:42:10', 7, 'farmer'),
(83, 'Fayaz khan', '', '0000-0000000', '', 'muhmand', '80000-0000000-0', 29, 84, 'muhmand', NULL, '2020-10-27 08:56:30', '2020-10-27 08:56:30', 7, 'farmer'),
(84, 'Fayaz khan', '', '0000-0000000', '', 'mohmand', '81000-0000000-0', 29, 84, 'muhmand', NULL, '2020-10-27 09:00:16', '2020-10-27 09:00:16', 7, 'farmer'),
(85, 'Fayaz khan', '', '0000-0000000', '', 'mohmand', '82000-0000000-0', 29, 84, 'muhmand', NULL, '2020-10-27 09:05:41', '2020-10-27 09:05:41', 7, 'farmer'),
(86, 'Fayaz khan', '', '0000-0000000', '', 'mohmand', '83000-0000000-0', 29, 84, 'muhmand', NULL, '2020-10-27 09:09:32', '2020-10-27 09:09:32', 7, 'farmer'),
(87, 'Waris khan', '', '0000-0000000', '', 'mattani', '84000-0000000-0', 3, 7, 'mattani', NULL, '2020-10-27 09:30:58', '2020-10-27 09:30:58', 7, 'farmer'),
(88, 'Muslim khan', '', '0000-0000000', '', 'shabqadar', '85000-0000000-0', 26, 74, 'shabqadar', NULL, '2020-10-27 09:34:52', '2020-10-27 09:34:52', 7, 'farmer'),
(89, 'Fayaz khan', '', '0000-0000000', '', 'charsadda', '86000-0000000-0', 26, 0, 'sardazy', NULL, '2020-10-27 09:38:06', '2020-10-27 09:38:06', 7, 'farmer');

-- --------------------------------------------------------

--
-- Table structure for table `culture_sensitivity`
--

CREATE TABLE `culture_sensitivity` (
  `culture_sensitivity_id` int(11) NOT NULL,
  `testDetails_id` int(11) NOT NULL,
  `antibiotics_id` int(11) DEFAULT NULL,
  `amipicilin` varchar(100) DEFAULT NULL,
  `norfloxacin` varchar(30) DEFAULT NULL,
  `ampiclox` varchar(30) DEFAULT NULL,
  `kanamycin` varchar(30) DEFAULT NULL,
  `toramycin` varchar(30) DEFAULT NULL,
  `lincomycin` varchar(30) DEFAULT NULL,
  `chlorampherical` varchar(30) DEFAULT NULL,
  `flumiquine` varchar(30) DEFAULT NULL,
  `cloacilin` varchar(30) DEFAULT NULL,
  `ciprofloxacin` varchar(30) DEFAULT NULL,
  `neomycin` varchar(30) DEFAULT NULL,
  `negram` varchar(30) DEFAULT NULL,
  `cephradin` varchar(30) DEFAULT NULL,
  `penicillin` varchar(30) DEFAULT NULL,
  `doxyeyclin` varchar(30) DEFAULT NULL,
  `polymixin` varchar(30) DEFAULT NULL,
  `erythromycin` varchar(30) DEFAULT NULL,
  `sulphamethoxazoe` varchar(30) DEFAULT NULL,
  `amoxicillin` varchar(30) DEFAULT NULL,
  `streptomycin` varchar(30) DEFAULT NULL,
  `enrofloxacin` varchar(30) DEFAULT NULL,
  `urixin` varchar(30) DEFAULT NULL,
  `gentamicin` varchar(30) DEFAULT NULL,
  `augmentin` varchar(30) DEFAULT NULL,
  `ofloxacinl` varchar(30) DEFAULT NULL,
  `oxytetracyclin` varchar(30) DEFAULT NULL,
  `reports` varchar(100) DEFAULT NULL,
  `created_by` int(11) NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `fLoramphenical` varchar(30) DEFAULT NULL,
  `cefotaxime_Clavulanic_acid` varchar(30) DEFAULT NULL,
  `tylosin` varchar(30) DEFAULT NULL,
  `sulfamethoxazole` varchar(30) DEFAULT NULL,
  `sulfamethoxazoleTrimethoprim` varchar(30) DEFAULT NULL,
  `doxycycline` varchar(30) DEFAULT NULL,
  `tilmicosin` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `directorates`
--

CREATE TABLE `directorates` (
  `directorate_id` int(11) NOT NULL,
  `directorate_name` varchar(255) DEFAULT NULL,
  `directorate_head` varchar(100) DEFAULT NULL,
  `created_by` int(11) NOT NULL,
  `created_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `is_trash` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `directorates`
--

INSERT INTO `directorates` (`directorate_id`, `directorate_name`, `directorate_head`, `created_by`, `created_date`, `is_trash`) VALUES
(1, 'Directorate of Planning & Development KP Peshawar', 'Dr. Pervez Shah', 2, '2020-07-20 21:56:41', 0),
(2, 'Directorate of Livestock  Research & Development, Peshawar', 'Dr. Bakht Daraz Khan', 2, '2020-07-23 14:46:21', 0),
(3, 'Directorate of Veterinary Research Institute, Peshawar', 'Dr. Muhammad Ijaz Ali', 2, '2020-09-15 22:14:22', 0),
(4, 'Directorate General (Research) Livestock & Dairy Development Department Khyber Pakhtunkhwa', 'Dr. Mirza Ali Khan', 2, '2020-10-05 22:54:56', 0);

-- --------------------------------------------------------

--
-- Table structure for table `districts`
--

CREATE TABLE `districts` (
  `district_id` int(11) NOT NULL,
  `district_name` varchar(50) DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `is_trash` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `districts`
--

INSERT INTO `districts` (`district_id`, `district_name`, `created_by`, `created_date`, `is_trash`) VALUES
(1, 'Kohat', 2, '2020-07-03 13:35:13', 0),
(2, 'Swabi', 2, '2020-07-03 13:35:52', 0),
(3, 'Peshawar', 2, '2020-07-03 14:34:29', 0),
(4, 'Swat', 2, '2020-07-04 06:29:17', 0),
(5, 'Dera Ismail Khan', 2, '2020-07-04 06:31:44', 0),
(6, 'Mardan', 2, '2020-07-10 02:04:31', 0),
(7, 'Abbottabad ', 2, '2020-07-21 01:55:25', 0),
(8, 'Dir Upper', 2, '2020-10-01 05:36:30', 0),
(9, 'Dir Lower', 2, '2020-10-01 05:36:41', 0),
(10, 'Haripur', 2, '2020-10-01 05:36:56', 0),
(11, 'Mansehra', 2, '2020-10-01 05:37:09', 0),
(12, 'Shangla', 2, '2020-10-01 05:37:20', 0),
(13, 'Buner', 2, '2020-10-01 05:37:29', 0),
(14, 'Tor Ghar', 2, '2020-10-01 05:37:42', 0),
(15, 'Lakki Marwat', 2, '2020-10-01 05:38:27', 0),
(16, 'Tank', 2, '2020-10-01 05:38:33', 0),
(17, 'Bannu', 2, '2020-10-01 05:38:45', 0),
(18, 'Lower Chitral', 2, '2020-10-01 06:01:50', 0),
(19, 'Batagram', 2, '2020-10-08 00:14:29', 0),
(20, 'Lower Kohistan', 2, '2020-10-08 00:16:24', 0),
(21, 'Upper Kohistan', 2, '2020-10-08 00:20:32', 0),
(22, 'Hangu', 2, '2020-10-08 00:22:02', 0),
(23, 'Karak', 2, '2020-10-08 00:23:25', 0),
(24, 'Upper Chitral', 2, '2020-10-08 00:43:28', 0),
(25, 'Malakand', 2, '2020-10-08 00:44:19', 0),
(26, 'Charsadda', 2, '2020-10-08 01:00:50', 0),
(27, 'Nowshera', 2, '2020-10-08 01:03:13', 0),
(28, 'Khyber', 2, '2020-10-14 08:06:15', 0),
(29, 'Mohmand', 2, '2020-10-14 08:06:34', 0),
(30, 'North Waziristan', 2, '2020-10-14 08:30:57', 0),
(31, 'South Waziristan', 2, '2020-10-14 08:32:17', 0);

-- --------------------------------------------------------

--
-- Table structure for table `elisa_animal`
--

CREATE TABLE `elisa_animal` (
  `elisa_animal_id` int(11) NOT NULL,
  `testDetails_id` int(11) NOT NULL,
  `abortion_history` varchar(20) DEFAULT NULL,
  `parity` varchar(25) DEFAULT NULL,
  `vac_against_brucellosis` varchar(25) DEFAULT NULL,
  `antibody_index` varchar(25) DEFAULT NULL,
  `result_status` varchar(50) DEFAULT NULL,
  `created_by` int(11) NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `elisa_animal`
--

INSERT INTO `elisa_animal` (`elisa_animal_id`, `testDetails_id`, `abortion_history`, `parity`, `vac_against_brucellosis`, `antibody_index`, `result_status`, `created_by`, `created_date`) VALUES
(1, 8, 'Yes', 'this is testing entry', 'this is testing entry', NULL, NULL, 2, '2020-11-05 18:50:53'),
(2, 7, 'yes', 'this is testing entry', 'this is testing entry', NULL, NULL, 2, '2020-11-05 18:52:22');

-- --------------------------------------------------------

--
-- Table structure for table `elisa_human`
--

CREATE TABLE `elisa_human` (
  `elisa_human_id` int(11) NOT NULL,
  `testDetails_id` int(11) NOT NULL,
  `intibody_index` varchar(10) DEFAULT NULL,
  `clinical_sign` varchar(50) DEFAULT NULL,
  `animal_contact` varchar(10) DEFAULT NULL,
  `treatment_used` varchar(50) DEFAULT NULL,
  `result_status` varchar(20) DEFAULT NULL,
  `created_by` int(11) NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `elisa_human`
--

INSERT INTO `elisa_human` (`elisa_human_id`, `testDetails_id`, `intibody_index`, `clinical_sign`, `animal_contact`, `treatment_used`, `result_status`, `created_by`, `created_date`) VALUES
(1, 6, NULL, 'this is testing entry', 'Yes', 'this is testing entry', '', 2, '2020-11-05 12:41:18');

-- --------------------------------------------------------

--
-- Table structure for table `haematology`
--

CREATE TABLE `haematology` (
  `haematology_id` int(11) NOT NULL,
  `testDetails_id` int(11) NOT NULL,
  `WBC` varchar(25) DEFAULT NULL,
  `lymph1` varchar(30) DEFAULT NULL,
  `mon1` varchar(30) DEFAULT NULL,
  `gran1` varchar(30) DEFAULT NULL,
  `lymph2` varchar(30) DEFAULT NULL,
  `mon2` varchar(30) DEFAULT NULL,
  `gran2` varchar(30) DEFAULT NULL,
  `RBC` varchar(25) DEFAULT NULL,
  `HGB` varchar(15) DEFAULT NULL,
  `HCT` varchar(11) DEFAULT NULL,
  `MCV` varchar(11) DEFAULT NULL,
  `MCH` varchar(10) DEFAULT NULL,
  `MCHC` varchar(5) DEFAULT NULL,
  `RDW` varchar(20) DEFAULT NULL,
  `PLT` varchar(10) DEFAULT NULL,
  `MPV` varchar(25) DEFAULT NULL,
  `PDW` varchar(255) DEFAULT NULL,
  `PCT` varchar(255) DEFAULT NULL,
  `created_by` int(11) NOT NULL,
  `created_date` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `haematology`
--

INSERT INTO `haematology` (`haematology_id`, `testDetails_id`, `WBC`, `lymph1`, `mon1`, `gran1`, `lymph2`, `mon2`, `gran2`, `RBC`, `HGB`, `HCT`, `MCV`, `MCH`, `MCHC`, `RDW`, `PLT`, `MPV`, `PDW`, `PCT`, `created_by`, `created_date`) VALUES
(1, 13, '3', NULL, NULL, NULL, NULL, NULL, NULL, '3', '4', '2', '2', '3', '4', '2', '34', '4', '5', '4', 2, '2020-12-07 07:33:26'),
(2, 14, '34', '23', '3', '43', NULL, NULL, NULL, '324', '3', '43', '32', '23', '2', '4', '32', '2', '34', '4', 2, '2020-12-07 11:33:07');

-- --------------------------------------------------------

--
-- Table structure for table `impression_smear`
--

CREATE TABLE `impression_smear` (
  `impression_smear_id` int(11) NOT NULL,
  `testDetails_id` int(11) NOT NULL,
  `type_specimen` varchar(30) DEFAULT NULL,
  `animals_specimen` varchar(30) DEFAULT NULL,
  `examined_for` varchar(30) DEFAULT NULL,
  `result` varchar(30) DEFAULT NULL,
  `remarks` varchar(30) DEFAULT NULL,
  `examined_by` varchar(30) DEFAULT NULL,
  `created_by` int(11) NOT NULL,
  `created_date` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `impression_smear`
--

INSERT INTO `impression_smear` (`impression_smear_id`, `testDetails_id`, `type_specimen`, `animals_specimen`, `examined_for`, `result`, `remarks`, `examined_by`, `created_by`, `created_date`) VALUES
(1, 12, NULL, NULL, NULL, NULL, NULL, NULL, 2, '2020-11-25 07:12:37');

-- --------------------------------------------------------

--
-- Table structure for table `labs`
--

CREATE TABLE `labs` (
  `lab_id` int(11) NOT NULL,
  `directorate_id` int(11) NOT NULL,
  `center_station_id` int(11) NOT NULL,
  `section_id` int(11) NOT NULL,
  `lab_name` varchar(100) NOT NULL,
  `lab_address` varchar(50) NOT NULL,
  `lab_description` varchar(255) DEFAULT NULL,
  `is_trash` int(11) NOT NULL DEFAULT '0',
  `created_by` int(11) DEFAULT NULL,
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `labs`
--

INSERT INTO `labs` (`lab_id`, `directorate_id`, `center_station_id`, `section_id`, `lab_name`, `lab_address`, `lab_description`, `is_trash`, `created_by`, `created_date`) VALUES
(2, 2, 4, 5, 'Brucellosis Lab', 'lab', 'this is Brucellosis lab', 0, 1, '2020-07-03 19:46:51'),
(3, 2, 4, 3, 'Pathology Lab', 'lab', 'dsfa', 1, 2, '2020-08-06 11:00:10'),
(4, 3, 4, 4, 'Pathology & Bacteriology Lab', 'lab', 'This is Pathology & Bacteriology Lab at CMB, VRI Peshawar', 0, 2, '2020-08-26 06:19:28'),
(5, 2, 4, 1, 'Mastitis Lab', 'lab', 'this is Mastitis Lab Peshawar', 0, 2, '2020-08-31 13:31:56'),
(6, 2, 4, 4, 'Bacteriology Lab ', 'lab', 'this is Pathology & Bacteriology Lab ', 0, 2, '2020-08-31 13:44:25'),
(7, 3, 4, 3, 'TB&VPH Lab', 'lab', 'TB&VPH Lab', 0, 2, '2020-08-31 13:46:48'),
(8, 2, 4, 2, 'Virology  Lab ', 'lab', 'Virology lab peshawar', 0, 2, '2020-08-31 13:47:25'),
(9, 2, 4, 6, 'Animal Biotechnology Lab', 'lab', 'this is Animal Biotechnology Lab', 0, 2, '2020-09-24 07:35:53'),
(10, 4, 19, 8, 'Information Technology Cell', 'lab', 'IT Cell - L&DD(Research) KP Peshawar', 0, 2, '2020-10-06 06:08:48');

-- --------------------------------------------------------

--
-- Table structure for table `mastitis`
--

CREATE TABLE `mastitis` (
  `mastitis_id` int(11) NOT NULL,
  `testDetails_id` int(11) NOT NULL,
  `cal_kid_lambing_date` varchar(50) DEFAULT NULL,
  `daily_milk_production` varchar(50) DEFAULT NULL,
  `lactation_no` varchar(50) DEFAULT NULL,
  `total_animals_at_farm` varchar(50) DEFAULT NULL,
  `in_milk` varchar(10) DEFAULT NULL,
  `dry_period_given` varchar(50) DEFAULT NULL,
  `prev_mastatis_rec_of_anim` varchar(50) DEFAULT NULL,
  `prev_mastatis_rec_of_farm` varchar(50) DEFAULT NULL,
  `prac_mastatis_test_at_farm` varchar(50) DEFAULT NULL,
  `mastitis_r1` varchar(20) DEFAULT NULL,
  `mastitis_r2` varchar(20) DEFAULT NULL,
  `mastitis_l1` varchar(20) DEFAULT NULL,
  `mastitis_l2` varchar(20) DEFAULT NULL,
  `milk_ph_r1` varchar(20) NOT NULL,
  `milk_ph_r2` varchar(20) DEFAULT NULL,
  `milk_ph_l1` varchar(20) DEFAULT NULL,
  `milk_ph_l2` varchar(20) DEFAULT NULL,
  `s_c_c_r1` varchar(20) DEFAULT NULL,
  `s_c_c_r2` varchar(20) DEFAULT NULL,
  `s_c_c_l1` varchar(20) DEFAULT NULL,
  `s_c_c_l2` varchar(20) DEFAULT NULL,
  `gross_appearance_r1` varchar(20) DEFAULT NULL,
  `gross_appearance_r2` varchar(20) DEFAULT NULL,
  `gross_appearance_l1` varchar(20) DEFAULT NULL,
  `gross_appearance_l2` varchar(20) DEFAULT NULL,
  `quarters` varchar(30) DEFAULT NULL,
  `mastitis_severity` varchar(30) DEFAULT NULL,
  `milk_ph` varchar(30) DEFAULT NULL,
  `s_c_c` varchar(30) DEFAULT NULL,
  `gross_appearance` varchar(30) DEFAULT NULL,
  `clinical_gross_appearance` varchar(30) DEFAULT NULL,
  `clinical_or_sub` varchar(30) DEFAULT NULL,
  `composite_or_ind` varchar(30) DEFAULT NULL,
  `refer_to_bacteriology_sec_for` varchar(100) DEFAULT NULL,
  `created_by` int(11) NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mastitis`
--

INSERT INTO `mastitis` (`mastitis_id`, `testDetails_id`, `cal_kid_lambing_date`, `daily_milk_production`, `lactation_no`, `total_animals_at_farm`, `in_milk`, `dry_period_given`, `prev_mastatis_rec_of_anim`, `prev_mastatis_rec_of_farm`, `prac_mastatis_test_at_farm`, `mastitis_r1`, `mastitis_r2`, `mastitis_l1`, `mastitis_l2`, `milk_ph_r1`, `milk_ph_r2`, `milk_ph_l1`, `milk_ph_l2`, `s_c_c_r1`, `s_c_c_r2`, `s_c_c_l1`, `s_c_c_l2`, `gross_appearance_r1`, `gross_appearance_r2`, `gross_appearance_l1`, `gross_appearance_l2`, `quarters`, `mastitis_severity`, `milk_ph`, `s_c_c`, `gross_appearance`, `clinical_gross_appearance`, `clinical_or_sub`, `composite_or_ind`, `refer_to_bacteriology_sec_for`, `created_by`, `created_date`) VALUES
(1, 11, '11/17/2020', '', '2', '50', '2', '2', 'No', 'No', 'No', 'Mild', 'Mild', 'Mild', '', '32423', '324', '234', '', '423423', '23423', '234', '', 'Clots', 'Clots', 'Clots', '', 'L2', '', '', '', '', '', 'Sub Clinical', 'Individual', '', 2, '2020-11-17 08:42:46');

-- --------------------------------------------------------

--
-- Table structure for table `modules`
--

CREATE TABLE `modules` (
  `module_id` int(11) NOT NULL,
  `module` varchar(50) DEFAULT NULL,
  `is_trash` int(11) NOT NULL DEFAULT '0',
  `created_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `modules`
--

INSERT INTO `modules` (`module_id`, `module`, `is_trash`, `created_date`) VALUES
(1, 'Dashboard', 0, '2020-07-28 12:43:18'),
(2, 'Admin Panel', 0, '2020-07-28 12:43:18'),
(3, 'Test Panel', 0, '2020-07-28 12:43:18'),
(4, 'User Panel', 0, '2020-07-28 12:43:18'),
(5, 'Reports', 0, '2020-08-19 00:43:22');

-- --------------------------------------------------------

--
-- Table structure for table `mrt`
--

CREATE TABLE `mrt` (
  `mrt_id` int(11) NOT NULL,
  `testDetails_id` int(11) NOT NULL,
  `abortion_history` varchar(20) DEFAULT NULL,
  `parity` varchar(25) DEFAULT NULL,
  `vac_against_brucellosis` varchar(25) DEFAULT NULL,
  `result_status` varchar(50) DEFAULT NULL,
  `created_by` int(11) NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mrt`
--

INSERT INTO `mrt` (`mrt_id`, `testDetails_id`, `abortion_history`, `parity`, `vac_against_brucellosis`, `result_status`, `created_by`, `created_date`) VALUES
(1, 4, 'Yes', 'this is testing entry', 'this is testing entry', '', 2, '2020-11-05 12:38:25');

-- --------------------------------------------------------

--
-- Table structure for table `pcr_animal`
--

CREATE TABLE `pcr_animal` (
  `pcr_animal_id` int(11) NOT NULL,
  `testDetails_id` int(11) NOT NULL,
  `abortion_history` varchar(20) DEFAULT NULL,
  `parity` varchar(25) DEFAULT NULL,
  `vac_against_brucellosis` varchar(25) DEFAULT NULL,
  `result_status` varchar(50) DEFAULT NULL,
  `created_by` int(11) NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pcr_animal`
--

INSERT INTO `pcr_animal` (`pcr_animal_id`, `testDetails_id`, `abortion_history`, `parity`, `vac_against_brucellosis`, `result_status`, `created_by`, `created_date`) VALUES
(1, 9, 'Yes', 'this is testing entry', 'this is testing entry', '', 2, '2020-11-05 19:05:51');

-- --------------------------------------------------------

--
-- Table structure for table `pcr_human`
--

CREATE TABLE `pcr_human` (
  `pcr_human_id` int(11) NOT NULL,
  `testDetails_id` int(11) NOT NULL,
  `result_status` varchar(20) DEFAULT NULL,
  `created_by` int(11) NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `clinical_sign` varchar(50) DEFAULT NULL,
  `animal_contact` varchar(10) DEFAULT NULL,
  `treatment_used` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pcr_human`
--

INSERT INTO `pcr_human` (`pcr_human_id`, `testDetails_id`, `result_status`, `created_by`, `created_date`, `clinical_sign`, `animal_contact`, `treatment_used`) VALUES
(1, 1, 'not_found', 2, '2020-11-04 17:17:12', 'this is testing entry', 'Yes', 'this is testing entry');

-- --------------------------------------------------------

--
-- Table structure for table `rbpt`
--

CREATE TABLE `rbpt` (
  `rbpt_id` int(11) NOT NULL,
  `testDetails_id` int(11) NOT NULL,
  `abortion_history` varchar(20) DEFAULT NULL,
  `parity` varchar(25) DEFAULT NULL,
  `vac_against_brucellosis` varchar(25) DEFAULT NULL,
  `result_status` varchar(50) DEFAULT NULL,
  `created_by` int(11) NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rbpt`
--

INSERT INTO `rbpt` (`rbpt_id`, `testDetails_id`, `abortion_history`, `parity`, `vac_against_brucellosis`, `result_status`, `created_by`, `created_date`) VALUES
(1, 3, 'Yes', 'this is testing entry', 'this is testing entry', '', 2, '2020-11-05 12:19:06');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `role_id` int(11) NOT NULL,
  `role_name` varchar(25) NOT NULL,
  `is_trash` int(11) NOT NULL DEFAULT '0',
  `created_by` int(11) DEFAULT NULL,
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`role_id`, `role_name`, `is_trash`, `created_by`, `created_date`) VALUES
(1, 'Admin', 0, 1, '2020-07-03 20:29:41'),
(2, 'Data Entry Operator', 1, 1, '2020-07-03 21:24:05'),
(3, 'Lab InchargeU', 1, 2, '2020-07-06 09:32:50'),
(4, 'Test Role', 1, 2, '2020-07-30 05:34:40'),
(5, 'Visiter', 1, 2, '2020-08-10 05:24:51'),
(6, 'Lab User', 0, 2, '2020-08-26 06:08:28'),
(7, 'Lab Visiter', 1, 2, '2020-09-15 17:58:12'),
(8, 'Foreign', 1, 2, '2020-09-15 17:59:56');

-- --------------------------------------------------------

--
-- Table structure for table `role_permissions`
--

CREATE TABLE `role_permissions` (
  `role_perm_id` int(11) NOT NULL,
  `module_id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL,
  `show_created_by` int(11) NOT NULL,
  `show_lab_by` int(11) NOT NULL,
  `show_all` int(11) NOT NULL,
  `show_none` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `role_permissions`
--

INSERT INTO `role_permissions` (`role_perm_id`, `module_id`, `role_id`, `show_created_by`, `show_lab_by`, `show_all`, `show_none`) VALUES
(1, 1, 1, 2, 0, 1, 0),
(2, 2, 1, 2, 0, 1, 0),
(3, 3, 1, 2, 0, 1, 0),
(4, 4, 1, 2, 0, 1, 0),
(21, 5, 1, 2, 0, 1, 0),
(22, 1, 6, 2, 1, 0, 0),
(23, 2, 6, 2, 0, 0, 1),
(24, 3, 6, 2, 1, 0, 0),
(25, 4, 6, 2, 0, 0, 1),
(26, 5, 6, 2, 0, 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `samples`
--

CREATE TABLE `samples` (
  `sample_id` int(11) NOT NULL,
  `sample_name` varchar(100) NOT NULL,
  `sample_color` varchar(25) DEFAULT NULL,
  `sample_size` varchar(25) DEFAULT NULL,
  `sample_time` varchar(25) DEFAULT NULL,
  `sample_weight` varchar(25) DEFAULT NULL,
  `is_trash` int(11) NOT NULL DEFAULT '0',
  `created_by` int(11) DEFAULT NULL,
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `samples`
--

INSERT INTO `samples` (`sample_id`, `sample_name`, `sample_color`, `sample_size`, `sample_time`, `sample_weight`, `is_trash`, `created_by`, `created_date`) VALUES
(1, 'Milk', NULL, NULL, NULL, NULL, 0, 2, '2020-07-06 18:31:54'),
(2, 'Liver', NULL, NULL, NULL, NULL, 0, 2, '2020-07-07 21:18:41'),
(3, 'Lungs', NULL, NULL, NULL, NULL, 0, 2, '2020-07-07 21:18:50'),
(4, 'Blood', NULL, NULL, NULL, NULL, 0, 2, '2020-07-07 21:18:56'),
(5, 'Urine', NULL, NULL, NULL, NULL, 0, 2, '2020-07-22 08:09:59'),
(6, 'Water', NULL, NULL, NULL, NULL, 0, 2, '2020-09-24 07:49:00'),
(7, 'Feacal', NULL, NULL, NULL, NULL, 0, 2, '2020-10-02 06:38:59'),
(8, 'Heart', NULL, NULL, NULL, NULL, 0, 2, '2020-10-03 01:28:15'),
(9, 'Spleen', NULL, NULL, NULL, NULL, 0, 2, '2020-10-03 01:28:30'),
(10, 'Kidney', NULL, NULL, NULL, NULL, 0, 2, '2020-10-03 01:28:46'),
(11, 'Pus', NULL, NULL, NULL, NULL, 0, 2, '2020-10-03 01:28:57'),
(12, 'Nasal', NULL, NULL, NULL, NULL, 0, 2, '2020-10-03 01:29:12'),
(13, 'Rectal', NULL, NULL, NULL, NULL, 0, 2, '2020-10-03 01:29:21'),
(14, 'Oral Ocular Swab', NULL, NULL, NULL, NULL, 0, 2, '2020-10-03 01:29:30'),
(15, 'Tissue', NULL, NULL, NULL, NULL, 0, 2, '2020-10-20 18:54:09'),
(16, 'Semen', NULL, NULL, NULL, NULL, 0, 2, '2020-10-20 18:54:28'),
(17, 'Abortid Fetal Stomach Content', NULL, NULL, NULL, NULL, 0, 2, '2020-10-23 03:06:12'),
(18, 'Vaginal Fluid', NULL, NULL, NULL, NULL, 0, 2, '2020-10-23 03:06:34');

-- --------------------------------------------------------

--
-- Table structure for table `sectionhelp`
--

CREATE TABLE `sectionhelp` (
  `sectionHelp_id` int(11) NOT NULL,
  `sectionHelp_name` varchar(100) DEFAULT NULL,
  `is_trash` int(11) NOT NULL DEFAULT '0',
  `created_by` int(11) DEFAULT NULL,
  `created_date` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sectionhelp`
--

INSERT INTO `sectionhelp` (`sectionHelp_id`, `sectionHelp_name`, `is_trash`, `created_by`, `created_date`) VALUES
(1, 'Pathology & Bacteriology Section', 0, 1, '2020-08-08 20:24:29'),
(2, 'Mastitis Section', 0, 1, '2020-08-08 20:24:29'),
(3, 'TB & VPH Section', 0, 1, '2020-08-08 20:24:29'),
(4, 'Brucellosis Section', 0, 1, '2020-08-08 20:24:29'),
(5, 'Animal Biotecnology Section', 0, 1, '2020-08-08 20:24:29'),
(6, 'Virology Section', 0, 1, '2020-08-08 20:24:29'),
(7, 'afadsf & adsf', 1, 2, '2020-09-15 19:07:09'),
(8, 'Information Technology Cell', 0, 2, '2020-10-06 06:07:25');

-- --------------------------------------------------------

--
-- Table structure for table `sections`
--

CREATE TABLE `sections` (
  `section_id` int(11) NOT NULL,
  `directorate_id` int(11) NOT NULL,
  `center_station_id` int(11) NOT NULL,
  `sectionHelp_id` int(11) DEFAULT NULL,
  `is_trash` int(11) NOT NULL DEFAULT '0',
  `created_by` int(11) DEFAULT NULL,
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sections`
--

INSERT INTO `sections` (`section_id`, `directorate_id`, `center_station_id`, `sectionHelp_id`, `is_trash`, `created_by`, `created_date`) VALUES
(1, 3, 4, 2, 0, 2, '2020-07-07 19:13:16'),
(2, 3, 4, 6, 0, 2, '2020-07-08 09:16:44'),
(3, 3, 4, 3, 0, 2, '2020-08-06 10:58:34'),
(4, 3, 4, 1, 0, 2, '2020-08-26 06:14:13'),
(5, 3, 4, 4, 0, 2, '2020-09-24 07:16:47'),
(6, 3, 4, 5, 0, 2, '2020-09-24 07:25:10'),
(7, 3, 4, 1, 1, 2, '2020-10-01 11:18:53'),
(8, 4, 19, 8, 0, 2, '2020-10-06 06:07:54');

-- --------------------------------------------------------

--
-- Table structure for table `spat_human`
--

CREATE TABLE `spat_human` (
  `spat_human_id` int(11) NOT NULL,
  `testDetails_id` int(11) NOT NULL,
  `result_status` varchar(20) DEFAULT NULL,
  `brucella_abortus_20` varchar(10) DEFAULT NULL,
  `brucella_abortus_40` varchar(10) DEFAULT NULL,
  `brucella_abortus_80` varchar(10) DEFAULT NULL,
  `brucella_abortus_160` varchar(10) DEFAULT NULL,
  `brucella_abortus_320` varchar(10) DEFAULT NULL,
  `brucella_meletensis_20` varchar(10) DEFAULT NULL,
  `brucella_meletensis_40` varchar(10) DEFAULT NULL,
  `brucella_meletensis_80` varchar(10) DEFAULT NULL,
  `brucella_meletensis_160` varchar(10) DEFAULT NULL,
  `brucella_meletensis_320` varchar(10) DEFAULT NULL,
  `created_by` int(11) NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `clinical_sign` varchar(50) DEFAULT NULL,
  `animal_contact` varchar(10) DEFAULT NULL,
  `treatment_used` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `spat_human`
--

INSERT INTO `spat_human` (`spat_human_id`, `testDetails_id`, `result_status`, `brucella_abortus_20`, `brucella_abortus_40`, `brucella_abortus_80`, `brucella_abortus_160`, `brucella_abortus_320`, `brucella_meletensis_20`, `brucella_meletensis_40`, `brucella_meletensis_80`, `brucella_meletensis_160`, `brucella_meletensis_320`, `created_by`, `created_date`, `clinical_sign`, `animal_contact`, `treatment_used`) VALUES
(1, 2, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, '2020-11-05 12:13:29', 'this is testing entry', 'Yes', 'this is testing entry');

-- --------------------------------------------------------

--
-- Table structure for table `tb_and_vph`
--

CREATE TABLE `tb_and_vph` (
  `tb_and_vph_id` int(11) NOT NULL,
  `testDetails_id` int(11) NOT NULL,
  `symptoms` varchar(255) DEFAULT NULL,
  `specimen` varchar(100) DEFAULT NULL,
  `referred_by` varchar(25) DEFAULT NULL,
  `lab_findings` varchar(255) DEFAULT NULL,
  `remarks` varchar(255) DEFAULT NULL,
  `examined_by` varchar(25) DEFAULT NULL,
  `created_by` int(11) NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tehsil`
--

CREATE TABLE `tehsil` (
  `tehsil_id` int(11) NOT NULL,
  `district_id` int(11) NOT NULL,
  `tehsil_name` varchar(100) DEFAULT NULL,
  `is_trash` int(11) NOT NULL DEFAULT '0',
  `created_by` int(11) NOT NULL,
  `created_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tehsil`
--

INSERT INTO `tehsil` (`tehsil_id`, `district_id`, `tehsil_name`, `is_trash`, `created_by`, `created_date`) VALUES
(1, 2, 'Swabi', 0, 2, '2020-09-09 13:47:09'),
(2, 2, 'Topi', 0, 2, '2020-09-09 13:47:22'),
(3, 2, 'Razzar', 0, 2, '2020-09-09 14:00:49'),
(4, 3, 'Town 1', 0, 2, '2020-09-24 13:03:33'),
(5, 3, 'Town 2', 0, 2, '2020-09-24 13:04:04'),
(6, 3, 'Town 3', 0, 2, '2020-09-29 20:26:58'),
(7, 3, 'Town 4', 0, 2, '2020-10-02 00:05:17'),
(8, 17, 'Bannu', 0, 2, '2020-10-07 22:10:20'),
(9, 17, 'Domel', 0, 2, '2020-10-07 22:10:41'),
(10, 5, 'Daraban', 0, 2, '2020-10-07 22:11:09'),
(11, 5, 'Dera Ismail Khan', 0, 2, '2020-10-07 22:11:25'),
(12, 5, 'Kulachi', 0, 2, '2020-10-07 22:11:44'),
(13, 5, 'Paharpur', 0, 2, '2020-10-07 22:12:06'),
(14, 5, 'Paroa', 0, 2, '2020-10-07 22:12:26'),
(15, 16, 'Tank', 0, 2, '2020-10-07 22:12:48'),
(16, 7, 'Abbottabad', 0, 2, '2020-10-07 22:13:14'),
(17, 7, 'Havelian', 0, 2, '2020-10-07 22:13:34'),
(18, 19, 'Allai', 0, 2, '2020-10-07 22:14:53'),
(19, 19, 'Batagram (Banna)', 0, 2, '2020-10-07 22:15:17'),
(20, 10, 'Ghazi', 0, 2, '2020-10-07 22:15:51'),
(21, 10, 'Haripur', 0, 2, '2020-10-07 22:16:05'),
(22, 20, 'Palas', 0, 2, '2020-10-07 22:16:56'),
(23, 20, 'Pattan', 0, 2, '2020-10-07 22:17:16'),
(24, 11, 'Bala Kot', 0, 2, '2020-10-07 22:17:57'),
(25, 11, 'Mansehra', 0, 2, '2020-10-07 22:18:14'),
(26, 11, 'Oghi', 0, 2, '2020-10-07 22:18:31'),
(27, 14, 'Judba', 0, 2, '2020-10-07 22:19:29'),
(28, 14, 'Khander', 0, 2, '2020-10-07 22:20:01'),
(29, 21, 'Dassu', 0, 2, '2020-10-07 22:20:53'),
(30, 21, 'Kandia', 0, 2, '2020-10-07 22:21:18'),
(31, 22, 'Hangu', 0, 2, '2020-10-07 22:22:30'),
(32, 22, 'Tall', 0, 2, '2020-10-07 22:22:42'),
(33, 23, 'Banda Daud Shah', 0, 2, '2020-10-07 22:23:49'),
(34, 23, 'Karak', 0, 2, '2020-10-07 22:24:06'),
(35, 23, 'Takht-e-Nasrati', 0, 2, '2020-10-07 22:24:26'),
(36, 1, 'Kohat', 0, 2, '2020-10-07 22:24:56'),
(37, 1, 'Lachi', 0, 2, '2020-10-07 22:25:16'),
(38, 13, 'Daggar (Buner)', 0, 2, '2020-10-07 22:25:47'),
(39, 13, 'Gagra', 0, 2, '2020-10-07 22:26:09'),
(40, 13, 'Khudu Khel', 0, 2, '2020-10-07 22:26:30'),
(41, 13, 'Mandanr', 0, 2, '2020-10-07 22:35:56'),
(42, 18, 'Chitral', 0, 2, '2020-10-07 22:37:11'),
(43, 9, 'Adenzai', 0, 2, '2020-10-07 22:45:47'),
(44, 24, 'Mastuj', 0, 2, '2020-10-07 22:49:24'),
(45, 9, 'Lal Qilla', 0, 2, '2020-10-07 22:49:49'),
(46, 9, 'Samar Bagh', 0, 2, '2020-10-07 22:50:09'),
(47, 9, 'Timergara', 0, 2, '2020-10-07 22:50:29'),
(48, 8, 'Dir', 0, 2, '2020-10-07 22:50:49'),
(49, 8, 'Sharingal', 0, 2, '2020-10-07 22:51:06'),
(50, 8, 'Wari', 0, 2, '2020-10-07 22:51:31'),
(51, 25, 'Sam Rani Zai', 0, 2, '2020-10-07 22:52:21'),
(52, 25, 'Swat Rani Zai', 0, 2, '2020-10-07 22:52:39'),
(53, 12, 'Alpuri', 0, 2, '2020-10-07 22:53:10'),
(54, 12, 'Bisham', 0, 2, '2020-10-07 22:53:28'),
(55, 12, 'Puran', 0, 2, '2020-10-07 22:53:53'),
(56, 4, 'Babuzai', 0, 2, '2020-10-07 22:54:43'),
(57, 4, 'Barikot', 0, 2, '2020-10-07 22:54:59'),
(58, 4, 'Behrain', 0, 2, '2020-10-07 22:55:14'),
(59, 4, 'Charbagh', 0, 2, '2020-10-07 22:55:30'),
(60, 4, 'Kabal', 0, 2, '2020-10-07 22:55:46'),
(61, 4, 'Khwaza Khela', 0, 2, '2020-10-07 22:56:03'),
(62, 4, 'Matta', 0, 2, '2020-10-07 22:56:13'),
(63, 6, 'Katlang', 0, 2, '2020-10-07 22:56:53'),
(64, 6, 'Rustam', 0, 2, '2020-10-07 22:57:13'),
(65, 6, 'Ghari Kapura', 0, 2, '2020-10-07 22:57:33'),
(66, 6, 'Mardan', 0, 2, '2020-10-07 22:57:49'),
(67, 6, 'Takht Bhai', 0, 2, '2020-10-07 22:58:08'),
(68, 6, 'Lund Khwar', 0, 2, '2020-10-07 22:58:25'),
(69, 2, 'Lahor', 0, 2, '2020-10-07 22:58:46'),
(70, 2, 'Razar', 0, 2, '2020-10-07 22:59:03'),
(71, 2, 'Swabi', 0, 2, '2020-10-07 22:59:17'),
(72, 2, 'Topi', 0, 2, '2020-10-07 22:59:33'),
(73, 26, 'Charsadda', 0, 2, '2020-10-07 23:01:05'),
(74, 26, 'Shabqadar', 0, 2, '2020-10-07 23:01:24'),
(75, 26, 'Tangi', 0, 2, '2020-10-07 23:01:34'),
(76, 27, 'Nowshera', 0, 2, '2020-10-07 23:03:25'),
(77, 27, 'Jehangira', 0, 2, '2020-10-07 23:03:42'),
(78, 27, 'Pabbi', 0, 2, '2020-10-07 23:04:04'),
(79, 3, 'Peshawar', 0, 2, '2020-10-07 23:04:29'),
(80, 28, 'Bara', 0, 2, '2020-10-14 01:07:00'),
(81, 28, 'Jamrud', 0, 2, '2020-10-14 01:07:34'),
(82, 28, 'Landi Kotal', 0, 2, '2020-10-14 01:07:48'),
(83, 28, 'Mula Gori', 0, 2, '2020-10-14 01:08:08'),
(84, 29, 'Ambar Utman Khel', 0, 2, '2020-10-14 01:09:43'),
(85, 29, 'Ekka Ghund', 0, 2, '2020-10-14 01:10:07'),
(86, 29, 'Halim Zai', 0, 2, '2020-10-14 01:10:42'),
(87, 29, 'Pindiali', 0, 2, '2020-10-14 01:11:13'),
(88, 29, 'Prhang Ghar', 0, 2, '2020-10-14 01:12:04'),
(89, 29, 'Safi', 0, 2, '2020-10-14 01:12:26'),
(90, 29, 'Upper Mohmand', 0, 2, '2020-10-14 01:12:44');

-- --------------------------------------------------------

--
-- Table structure for table `testdetails`
--

CREATE TABLE `testdetails` (
  `testDetails_id` int(11) NOT NULL,
  `tracking_id` int(11) DEFAULT NULL,
  `test_id` int(11) NOT NULL,
  `client_id` int(11) NOT NULL,
  `sample_id` int(11) NOT NULL,
  `sample_desc` varchar(255) DEFAULT NULL,
  `cattle_name` varchar(24) DEFAULT NULL,
  `cattle_tag_no` varchar(20) DEFAULT NULL,
  `cattle_sex` varchar(10) DEFAULT NULL,
  `cattle_year` varchar(20) DEFAULT NULL,
  `cattle_month` varchar(20) DEFAULT NULL,
  `cattle_breed` varchar(20) DEFAULT NULL,
  `cattle_total_no` int(11) NOT NULL DEFAULT '1',
  `referred_by` varchar(25) DEFAULT NULL,
  `sender_name` varchar(80) DEFAULT NULL,
  `sender_designation` varchar(80) DEFAULT NULL,
  `received_date` date DEFAULT NULL,
  `result_date` date DEFAULT NULL,
  `post_status` int(11) NOT NULL DEFAULT '0',
  `posted_date` date DEFAULT NULL,
  `recommendations` varchar(255) DEFAULT NULL,
  `symptoms_info` varchar(255) DEFAULT NULL,
  `house_hold_or_farm_info` varchar(255) DEFAULT NULL,
  `test_total_fee` varchar(50) DEFAULT NULL,
  `additional_info` text,
  `is_cancel` int(11) NOT NULL DEFAULT '0',
  `cancel_reason` varchar(100) NOT NULL,
  `cancel_by` int(11) DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modified_date` datetime DEFAULT NULL,
  `cows_no` int(11) NOT NULL DEFAULT '0',
  `buffalos_no` int(11) NOT NULL DEFAULT '0',
  `goat_no` int(11) NOT NULL DEFAULT '0',
  `sheep_no` int(11) NOT NULL DEFAULT '0',
  `disease_found` varchar(20) DEFAULT NULL,
  `disease_name` varchar(30) DEFAULT NULL,
  `examined_by` varchar(100) DEFAULT NULL,
  `examined_by_desi` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `testdetails`
--

INSERT INTO `testdetails` (`testDetails_id`, `tracking_id`, `test_id`, `client_id`, `sample_id`, `sample_desc`, `cattle_name`, `cattle_tag_no`, `cattle_sex`, `cattle_year`, `cattle_month`, `cattle_breed`, `cattle_total_no`, `referred_by`, `sender_name`, `sender_designation`, `received_date`, `result_date`, `post_status`, `posted_date`, `recommendations`, `symptoms_info`, `house_hold_or_farm_info`, `test_total_fee`, `additional_info`, `is_cancel`, `cancel_reason`, `cancel_by`, `created_by`, `created_date`, `modified_date`, `cows_no`, `buffalos_no`, `goat_no`, `sheep_no`, `disease_found`, `disease_name`, `examined_by`, `examined_by_desi`) VALUES
(1, 11120, 12, 14, 4, 'this is testing entry', '', '', 'Female', '9', '8', '', 0, NULL, 'nill', 'nill', '2020-11-04', '2020-11-04', 1, '2020-11-04', 'this is testing entry & testing recommendation', 'this is testing entry', NULL, '120', 'this is testing entry', 0, '', NULL, 2, '2020-11-04 16:31:19', '2020-11-04 22:17:12', 0, 0, 0, 0, NULL, NULL, 'Dr. James', 'Lab Incharge'),
(2, 21120, 7, 9, 15, 'this is testing entry', '', '', 'Female', '4', '5', '', 0, NULL, 'nill', 'nill', '2020-11-05', NULL, 0, NULL, NULL, 'this is testing entry', NULL, '100', 'this is testing entry', 0, '', NULL, 2, '2020-11-05 12:13:29', NULL, 0, 0, 0, 0, NULL, NULL, NULL, NULL),
(3, 31120, 8, 10, 16, 'this is testing entry', '1', '020', 'Female', '3', '9', '5', 1, NULL, 'nill', 'nill', '2020-11-05', NULL, 0, NULL, NULL, 'this is testing entry', NULL, '200', 'this is testing entry', 0, '', NULL, 2, '2020-11-05 12:19:06', NULL, 1, 0, 0, 0, NULL, NULL, NULL, NULL),
(4, 41120, 9, 13, 1, 'this is testing entry', '2', '020', 'Female', '2', '4', '17', 1, NULL, 'nill', 'nill', '2020-11-05', NULL, 0, NULL, NULL, 'this is testing entry', NULL, '60.00', 'this is testing entry', 0, '', NULL, 2, '2020-11-05 12:38:25', NULL, 0, 1, 0, 0, NULL, NULL, NULL, NULL),
(6, 51120, 10, 10, 4, 'this is testing entry', '', '', 'Female', '3', '4', '', 0, NULL, 'nill', 'nill', '2020-11-05', NULL, 0, NULL, NULL, 'this is testing entry', NULL, '220', 'this is testing entry', 0, '', NULL, 2, '2020-11-05 12:41:18', NULL, 0, 0, 0, 0, NULL, NULL, NULL, NULL),
(7, 61120, 11, 9, 1, 'this is testing entry', '', '', 'Female', '6', '6', '', 0, NULL, 'nill', 'nill', '2020-11-05', NULL, 0, NULL, NULL, 'this is testing entry', NULL, '320.00', 'this is testing entry', 0, '', NULL, 2, '2020-11-05 18:50:28', NULL, 0, 0, 0, 0, NULL, NULL, NULL, NULL),
(8, 71120, 11, 9, 1, 'this is testing entry', '', '', 'Female', '6', '6', '', 0, NULL, 'nill', 'nill', '2020-11-05', NULL, 0, NULL, NULL, 'this is testing entry', NULL, '320.00', 'this is testing entry', 0, '', NULL, 2, '2020-11-05 18:50:53', NULL, 0, 0, 0, 0, NULL, NULL, NULL, NULL),
(9, 81120, 13, 9, 4, 'this is testing entry', '2', '020', 'Female', '4', '3', '16', 1, NULL, 'nill', 'nill', '2020-11-06', NULL, 0, NULL, NULL, 'this is testing entry', NULL, '180', 'this is testing entry', 0, '', NULL, 2, '2020-11-05 19:05:51', NULL, 0, 1, 0, 0, NULL, NULL, NULL, NULL),
(10, 91120, 3, 9, 1, 'this is testing entry', '1', '020', 'Female', '4', '8', '4', 2, NULL, 'nill', 'nill', '2020-11-13', NULL, 0, NULL, NULL, 'this is testing entry', NULL, '25', 'this is testing entry', 0, '', NULL, 2, '2020-11-13 07:29:14', NULL, 2, 0, 0, 0, NULL, NULL, NULL, NULL),
(11, 101120, 4, 9, 1, 'this is testing entry', '1', '020', 'Female', '2', '2', '6', 2, NULL, 'nill', 'nill', '2020-11-17', '2020-11-18', 1, '2020-11-18', '       this is test recommendation/Remarks for this test entry', 'this is testing entry', NULL, '26.00', 'this is testing entry', 0, '', NULL, 2, '2020-11-17 08:42:46', '2020-11-18 21:49:50', 2, 0, 0, 0, 'No', 'nill', 'Dr. Ikram', 'RO'),
(12, 111120, 2, 9, 3, 'this is testing entry', '1', '020', 'Female', '3', '3', '4', 1, NULL, 'nill', 'nill', '2020-11-25', NULL, 0, NULL, NULL, 'this is testing entry', NULL, '222.00', 'this is testing entry', 0, '', NULL, 2, '2020-11-25 07:12:37', NULL, 1, 0, 0, 0, NULL, NULL, NULL, NULL),
(13, 121220, 5, 9, 1, 'this is test entry', '2', '0202', 'Male', '3', '4', '16', 1, NULL, 'nill', 'nill', '2020-12-07', '2020-12-07', 1, '2020-12-07', 'this is refer Mastitis lab for further inquiries.', 'this is test entrt', NULL, '500', 'this is test entrt', 0, '', NULL, 2, '2020-12-07 07:33:26', '2020-12-07 14:51:28', 0, 1, 0, 0, 'Doubtful', '', 'Dr. Ikram khan', 'RO'),
(14, 131220, 5, 10, 3, 'This is testing entry', '9', '0202', 'Female', '1', '1', '26', 0, NULL, 'nill', 'nill', '2020-12-07', '1970-01-01', 1, '2020-12-07', ' This is testing entry', 'This is testing entry', NULL, '500.00', 'This is testing entry', 0, '', NULL, 2, '2020-12-07 11:33:07', '2020-12-07 16:34:36', 0, 0, 0, 0, 'Doubtful', '', 'Dr Bakht e  rawan ', 'DI (Deputy Incharge)');

-- --------------------------------------------------------

--
-- Table structure for table `testhelp`
--

CREATE TABLE `testhelp` (
  `testHelp_id` int(11) NOT NULL,
  `testHelp_name` varchar(255) DEFAULT NULL,
  `disease_or_research` varchar(10) DEFAULT NULL,
  `testHelp_fee` double DEFAULT NULL,
  `is_trash` int(11) NOT NULL DEFAULT '0',
  `created_by` int(11) DEFAULT NULL,
  `created_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `testhelp`
--

INSERT INTO `testhelp` (`testHelp_id`, `testHelp_name`, `disease_or_research`, `testHelp_fee`, `is_trash`, `created_by`, `created_date`) VALUES
(1, 'Impression Smear', 'Research', 50, 0, 1, '2020-08-12 03:23:54'),
(2, 'Hematology', 'Disease', 150, 0, 1, '2020-08-12 03:23:54'),
(3, 'Mastitis', 'Disease', 20, 0, 1, '2020-08-12 03:23:54'),
(4, 'Culture Sensitivity', 'Disease', 150, 0, 1, '2020-08-12 03:23:54'),
(5, 'Urine Examination', 'Disease', 50, 0, 1, '2020-08-12 03:23:54'),
(6, 'MRT (Animal)', 'Disease', 60, 0, 1, '2020-08-12 03:23:54'),
(7, 'RBPT (Animal)', 'Disease', 200, 0, 1, '2020-08-12 03:23:54'),
(8, 'SPAT (Human)', 'Disease', 100, 0, 1, '2020-08-12 03:23:54'),
(9, 'Tuberculin Skin Test (TST)', 'Disease', 35, 0, 1, '2020-08-12 03:23:54'),
(10, 'Water Bacteriology', 'Disease', 200, 0, 2, '2020-09-29 20:18:57'),
(11, 'Acid Fast Bicilin (AFB for TB)', 'Disease', 25, 0, 2, '2020-10-05 19:47:16'),
(12, 'INDIRECT ELISA (Human)', 'Disease', 220, 0, 2, '2020-10-28 14:16:43'),
(13, 'INDIRECT ELISA (Animal)', 'Disease', 320, 0, 2, '2020-10-28 14:16:58'),
(14, 'PCR (Human)', 'Disease', 120, 0, 2, '2020-10-28 14:17:24'),
(15, 'PCR (Animal)', 'Disease', 180, 0, 2, '2020-10-28 14:17:41');

-- --------------------------------------------------------

--
-- Table structure for table `tests`
--

CREATE TABLE `tests` (
  `test_id` int(11) NOT NULL,
  `directorate_id` int(11) NOT NULL,
  `center_station_id` int(11) NOT NULL,
  `section_id` int(11) NOT NULL,
  `lab_id` int(11) NOT NULL,
  `testHelp_id` int(11) DEFAULT NULL,
  `test_fee` double DEFAULT NULL,
  `description` varchar(255) NOT NULL,
  `is_trash` int(11) DEFAULT '0',
  `created_by` int(11) DEFAULT NULL,
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tests`
--

INSERT INTO `tests` (`test_id`, `directorate_id`, `center_station_id`, `section_id`, `lab_id`, `testHelp_id`, `test_fee`, `description`, `is_trash`, `created_by`, `created_date`) VALUES
(1, 2, 4, 4, 4, 5, 500, 'this is desc of the test', 0, 2, '2020-09-24 07:47:24'),
(2, 3, 4, 4, 4, 1, 500, 'This is Impression Smear Test', 0, 2, '2020-09-24 07:49:23'),
(3, 3, 4, 3, 7, 11, 25, 'Acid Fast Staining Test', 0, 2, '2020-09-29 07:19:35'),
(4, 3, 4, 1, 5, 3, 20, ' This is Mastitis Tests Records', 0, 2, '2020-09-29 17:17:07'),
(5, 3, 4, 4, 4, 2, 500, 'Hematology Lab at Pathology & Bacteriology Section, CMB, VRI Peshawar', 0, 2, '2020-10-03 01:27:04'),
(6, 3, 4, 4, 4, 4, 0, '', 0, 2, '2020-10-16 09:58:06'),
(7, 2, 1, 5, 2, 8, 100, '  SPAT Test', 0, 2, '2020-10-20 18:53:28'),
(8, 2, 1, 5, 2, 7, 200, ' RBPT', 0, 2, '2020-10-26 16:22:11'),
(9, 4, 19, 8, 10, 6, 60, 'this is testing entry', 0, 2, '2020-11-02 13:37:51'),
(10, 4, 19, 8, 10, 12, 220, 'this is testing entry', 0, 2, '2020-11-02 13:40:42'),
(11, 4, 19, 8, 10, 13, 320, 'this is testing entry', 0, 2, '2020-11-02 13:41:14'),
(12, 4, 19, 8, 10, 14, 120, 'this is testing entry', 0, 2, '2020-11-02 13:43:34'),
(13, 4, 19, 8, 10, 15, 180, 'this is testing entry', 0, 2, '2020-11-02 13:44:08');

-- --------------------------------------------------------

--
-- Table structure for table `test_samples`
--

CREATE TABLE `test_samples` (
  `test_sample_id` int(11) NOT NULL,
  `test_id` int(11) NOT NULL,
  `sample_id` int(11) DEFAULT NULL,
  `is_trash` int(11) NOT NULL DEFAULT '0',
  `created_by` int(11) DEFAULT NULL,
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `test_samples`
--

INSERT INTO `test_samples` (`test_sample_id`, `test_id`, `sample_id`, `is_trash`, `created_by`, `created_date`) VALUES
(1, 1, 5, 0, 2, '2020-09-24 07:47:24'),
(5, 3, 1, 0, NULL, '2020-10-02 06:39:54'),
(6, 3, 7, 0, NULL, '2020-10-02 06:39:54'),
(8, 5, 1, 0, 2, '2020-10-03 01:27:04'),
(9, 5, 2, 0, 2, '2020-10-03 01:27:04'),
(10, 5, 3, 0, 2, '2020-10-03 01:27:04'),
(11, 5, 4, 0, 2, '2020-10-03 01:27:04'),
(12, 5, 5, 0, 2, '2020-10-03 01:27:04'),
(13, 5, 6, 0, 2, '2020-10-03 01:27:04'),
(14, 5, 7, 0, 2, '2020-10-03 01:27:04'),
(15, 4, 1, 0, NULL, '2020-10-06 08:30:33'),
(16, 6, 1, 0, 2, '2020-10-16 09:58:06'),
(17, 6, 2, 0, 2, '2020-10-16 09:58:06'),
(18, 6, 3, 0, 2, '2020-10-16 09:58:06'),
(19, 6, 4, 0, 2, '2020-10-16 09:58:06'),
(20, 6, 5, 0, 2, '2020-10-16 09:58:06'),
(21, 6, 6, 0, 2, '2020-10-16 09:58:06'),
(22, 6, 7, 0, 2, '2020-10-16 09:58:06'),
(23, 6, 8, 0, 2, '2020-10-16 09:58:06'),
(24, 6, 9, 0, 2, '2020-10-16 09:58:06'),
(25, 6, 10, 0, 2, '2020-10-16 09:58:06'),
(26, 6, 11, 0, 2, '2020-10-16 09:58:06'),
(27, 6, 12, 0, 2, '2020-10-16 09:58:06'),
(28, 6, 13, 0, 2, '2020-10-16 09:58:06'),
(29, 6, 14, 0, 2, '2020-10-16 09:58:06'),
(32, 2, 1, 0, NULL, '2020-10-23 00:25:39'),
(33, 2, 2, 0, NULL, '2020-10-23 00:25:39'),
(34, 2, 3, 0, NULL, '2020-10-23 00:25:39'),
(35, 2, 4, 0, NULL, '2020-10-23 00:25:39'),
(36, 2, 5, 0, NULL, '2020-10-23 00:25:39'),
(37, 2, 6, 0, NULL, '2020-10-23 00:25:39'),
(38, 2, 7, 0, NULL, '2020-10-23 00:25:39'),
(39, 2, 8, 0, NULL, '2020-10-23 00:25:39'),
(40, 2, 9, 0, NULL, '2020-10-23 00:25:39'),
(41, 2, 10, 0, NULL, '2020-10-23 00:25:39'),
(42, 2, 11, 0, NULL, '2020-10-23 00:25:39'),
(43, 2, 12, 0, NULL, '2020-10-23 00:25:39'),
(44, 2, 13, 0, NULL, '2020-10-23 00:25:39'),
(45, 2, 14, 0, NULL, '2020-10-23 00:25:39'),
(46, 2, 15, 0, NULL, '2020-10-23 00:25:39'),
(47, 2, 16, 0, NULL, '2020-10-23 00:25:39'),
(60, 8, 1, 0, NULL, '2020-10-28 09:28:58'),
(61, 8, 4, 0, NULL, '2020-10-28 09:28:58'),
(62, 8, 15, 0, NULL, '2020-10-28 09:28:58'),
(63, 8, 16, 0, NULL, '2020-10-28 09:28:58'),
(64, 8, 17, 0, NULL, '2020-10-28 09:28:58'),
(65, 8, 18, 0, NULL, '2020-10-28 09:28:58'),
(66, 7, 1, 0, NULL, '2020-10-28 09:29:11'),
(67, 7, 4, 0, NULL, '2020-10-28 09:29:11'),
(68, 7, 15, 0, NULL, '2020-10-28 09:29:11'),
(69, 7, 16, 0, NULL, '2020-10-28 09:29:11'),
(70, 7, 17, 0, NULL, '2020-10-28 09:29:11'),
(71, 7, 18, 0, NULL, '2020-10-28 09:29:11'),
(72, 9, 1, 0, 2, '2020-11-02 13:37:51'),
(73, 10, 4, 0, 2, '2020-11-02 13:40:42'),
(74, 11, 1, 0, 2, '2020-11-02 13:41:14'),
(75, 12, 4, 0, 2, '2020-11-02 13:43:34'),
(76, 13, 4, 0, 2, '2020-11-02 13:44:08');

-- --------------------------------------------------------

--
-- Table structure for table `tuberculin_skin_test`
--

CREATE TABLE `tuberculin_skin_test` (
  `tst_id` int(11) NOT NULL,
  `testDetails_id` int(11) NOT NULL,
  `A_1st` varchar(25) DEFAULT NULL,
  `A_2nd` varchar(25) DEFAULT NULL,
  `A_result` varchar(25) DEFAULT NULL,
  `M_1st` int(25) DEFAULT NULL,
  `M_2nd` varchar(25) DEFAULT NULL,
  `M_result` varchar(25) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `urine_examination`
--

CREATE TABLE `urine_examination` (
  `urine_id` int(11) NOT NULL,
  `testDetails_id` int(11) NOT NULL,
  `colour` varchar(50) DEFAULT NULL,
  `appearance` varchar(50) DEFAULT NULL,
  `leukocytes` varchar(50) DEFAULT NULL,
  `specific_gravity` varchar(50) DEFAULT NULL,
  `glucose` varchar(50) DEFAULT NULL,
  `protein` varchar(50) DEFAULT NULL,
  `nitrite` varchar(50) DEFAULT NULL,
  `urobilinogen` varchar(50) DEFAULT NULL,
  `ketone_bodies` varchar(50) DEFAULT NULL,
  `yeastFungi` varchar(50) DEFAULT NULL,
  `bilirubin` varchar(50) DEFAULT NULL,
  `ph` double DEFAULT NULL,
  `blood` varchar(50) DEFAULT NULL,
  `pus_cell` varchar(50) DEFAULT NULL,
  `epithelial_cell` varchar(50) DEFAULT NULL,
  `rb_cs` varchar(50) DEFAULT NULL,
  `casts` varchar(50) DEFAULT NULL,
  `crystals` varchar(50) DEFAULT NULL,
  `amorphous` varchar(50) DEFAULT NULL,
  `parasites` varchar(50) DEFAULT NULL,
  `bacteria` varchar(50) DEFAULT NULL,
  `created_by` int(11) NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `directorate_id` int(11) NOT NULL,
  `center_station_id` int(11) NOT NULL,
  `section_id` int(11) NOT NULL,
  `lab_id` int(11) DEFAULT NULL,
  `user_name` varchar(50) NOT NULL,
  `user_email` varchar(50) NOT NULL,
  `user_contact` varchar(20) NOT NULL,
  `user_password` varchar(255) NOT NULL,
  `user_role` int(11) NOT NULL,
  `designation` varchar(50) DEFAULT NULL,
  `gender` varchar(10) DEFAULT NULL,
  `user_img` varchar(100) DEFAULT NULL,
  `is_block` int(11) NOT NULL DEFAULT '0',
  `is_active` int(11) NOT NULL DEFAULT '1',
  `is_trash` int(11) NOT NULL DEFAULT '0',
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_by` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `directorate_id`, `center_station_id`, `section_id`, `lab_id`, `user_name`, `user_email`, `user_contact`, `user_password`, `user_role`, `designation`, `gender`, `user_img`, `is_block`, `is_active`, `is_trash`, `created_date`, `created_by`) VALUES
(2, 4, 19, 8, 2, 'Mr. Arshad Ali Durrani', 'admin@gmail.com', '0315-9393788', '$2y$10$k0JniyM3CaDf7cQYnd.u6.QjGnACjhhEWAiUS.EUBwjJgDP4sQJmK', 1, 'Administrator', 'Male', '', 0, 1, 0, '2020-07-04 12:01:21', 1),
(6, 2, 4, 4, NULL, 'Dr Din Muhammad', 'ddm@gmail.com', '1233-3333333', '$2y$10$V0NJcM1gLHb43pjARvwIgupZadclxyS0W31eeFGO.5LfalaKRLjzG', 6, 'SRO', 'Male', '10airhosttess.jpg', 0, 1, 1, '2020-09-24 07:54:10', 2),
(7, 3, 4, 3, NULL, 'Dr. Maleeha Anwar', 'tbvph.cmb.vripsh@gmail.com', '1111-1111111', '$2y$10$ay6FDWPJnUAMY2IX5KvgRe8Nm6orKKlFAeQ2fi8vXo3C1t77DuBxK', 6, 'Research Officer (B-17)', 'Female', '34download.png', 0, 1, 0, '2020-09-29 07:16:05', 2),
(8, 3, 4, 1, NULL, 'Dr. Kamran', 'mastitis.cmb.vripsh@gmail.com', '0000-0000000', '$2y$10$1XvIWnYwhxOUvt.I8wzk1OQBkabnw5LLIDnFDUvAEunbIVfilu2R6', 6, 'Research Officer (B-17)', 'Male', '', 0, 1, 0, '2020-10-02 07:09:58', 2),
(9, 3, 4, 4, NULL, 'Dr. Inam Ullah Wazir', 'path&bac.cmb.vripsh@gmail.com', '0000-0000000', '$2y$10$ktU5O3KDY9UhSHM4MuXH3ekCPS/hrUAMlIDPvL9LPLGCwZuQ6boT.', 6, 'Research Officer (B-17)', 'Male', '56pic3.jpg', 0, 1, 0, '2020-10-03 01:37:50', 2),
(10, 3, 4, 3, NULL, 'Dr. Maleeha ', 'tb.cmb.vripsh@gmail.com', '5555-5555555', '$2y$10$5rEpQJjOrAADZbtAEO2rm.B0AbssIb/LM/ohEk8JwNJJcQNB4ss.y', 6, 'Research Officer (B-17)', 'Female', '', 0, 1, 1, '2020-10-05 09:52:00', 2);

-- --------------------------------------------------------

--
-- Table structure for table `user_labs`
--

CREATE TABLE `user_labs` (
  `ul_id` int(11) NOT NULL,
  `ul_user_id` int(11) NOT NULL,
  `ul_lab_id` int(11) NOT NULL,
  `created_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_labs`
--

INSERT INTO `user_labs` (`ul_id`, `ul_user_id`, `ul_lab_id`, `created_date`) VALUES
(7, 6, 4, '2020-09-25 12:36:00'),
(8, 6, 6, '2020-09-25 12:36:00'),
(11, 8, 5, '2020-10-02 00:09:58'),
(15, 10, 7, '2020-10-05 02:54:59'),
(17, 2, 10, '2020-10-05 23:12:10'),
(18, 7, 7, '2020-10-05 23:18:34'),
(22, 9, 4, '2020-10-09 00:12:56');

-- --------------------------------------------------------

--
-- Table structure for table `water_bacteriology`
--

CREATE TABLE `water_bacteriology` (
  `water_bacteriology_id` int(11) NOT NULL,
  `testDetails_id` int(11) NOT NULL,
  `type_specimen` varchar(30) DEFAULT NULL,
  `animals_specimen` varchar(30) DEFAULT NULL,
  `examined_for` varchar(30) DEFAULT NULL,
  `result` varchar(30) DEFAULT NULL,
  `remarks` varchar(30) DEFAULT NULL,
  `examined_by` varchar(30) DEFAULT NULL,
  `created_by` int(11) NOT NULL,
  `created_date` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `acid_fast_staining`
--
ALTER TABLE `acid_fast_staining`
  ADD PRIMARY KEY (`afs_id`);

--
-- Indexes for table `antibiotics`
--
ALTER TABLE `antibiotics`
  ADD PRIMARY KEY (`antibiotics_id`);

--
-- Indexes for table `breeds`
--
ALTER TABLE `breeds`
  ADD PRIMARY KEY (`breed_id`);

--
-- Indexes for table `brucella_animal_ind`
--
ALTER TABLE `brucella_animal_ind`
  ADD PRIMARY KEY (`brucella_animal_ind_id`),
  ADD KEY `testDetails_id` (`testDetails_id`);

--
-- Indexes for table `cattles`
--
ALTER TABLE `cattles`
  ADD PRIMARY KEY (`cattle_id`);

--
-- Indexes for table `center_station`
--
ALTER TABLE `center_station`
  ADD PRIMARY KEY (`center_station_id`);

--
-- Indexes for table `client_info`
--
ALTER TABLE `client_info`
  ADD PRIMARY KEY (`client_id`);

--
-- Indexes for table `culture_sensitivity`
--
ALTER TABLE `culture_sensitivity`
  ADD PRIMARY KEY (`culture_sensitivity_id`),
  ADD KEY `testDetails_id` (`testDetails_id`),
  ADD KEY `antibiotics_id` (`antibiotics_id`);

--
-- Indexes for table `directorates`
--
ALTER TABLE `directorates`
  ADD PRIMARY KEY (`directorate_id`);

--
-- Indexes for table `districts`
--
ALTER TABLE `districts`
  ADD PRIMARY KEY (`district_id`);

--
-- Indexes for table `elisa_animal`
--
ALTER TABLE `elisa_animal`
  ADD PRIMARY KEY (`elisa_animal_id`),
  ADD KEY `testDetails_id` (`testDetails_id`);

--
-- Indexes for table `elisa_human`
--
ALTER TABLE `elisa_human`
  ADD PRIMARY KEY (`elisa_human_id`);

--
-- Indexes for table `haematology`
--
ALTER TABLE `haematology`
  ADD PRIMARY KEY (`haematology_id`),
  ADD KEY `testDetails_id` (`testDetails_id`);

--
-- Indexes for table `impression_smear`
--
ALTER TABLE `impression_smear`
  ADD PRIMARY KEY (`impression_smear_id`),
  ADD KEY `testDetails_id` (`testDetails_id`);

--
-- Indexes for table `labs`
--
ALTER TABLE `labs`
  ADD PRIMARY KEY (`lab_id`);

--
-- Indexes for table `mastitis`
--
ALTER TABLE `mastitis`
  ADD PRIMARY KEY (`mastitis_id`),
  ADD KEY `testDetails_id` (`testDetails_id`);

--
-- Indexes for table `modules`
--
ALTER TABLE `modules`
  ADD PRIMARY KEY (`module_id`);

--
-- Indexes for table `mrt`
--
ALTER TABLE `mrt`
  ADD PRIMARY KEY (`mrt_id`),
  ADD KEY `testDetails_id` (`testDetails_id`);

--
-- Indexes for table `pcr_animal`
--
ALTER TABLE `pcr_animal`
  ADD PRIMARY KEY (`pcr_animal_id`),
  ADD KEY `testDetails_id` (`testDetails_id`);

--
-- Indexes for table `pcr_human`
--
ALTER TABLE `pcr_human`
  ADD PRIMARY KEY (`pcr_human_id`),
  ADD KEY `testDetails_id` (`testDetails_id`);

--
-- Indexes for table `rbpt`
--
ALTER TABLE `rbpt`
  ADD PRIMARY KEY (`rbpt_id`),
  ADD KEY `testDetails_id` (`testDetails_id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`role_id`);

--
-- Indexes for table `role_permissions`
--
ALTER TABLE `role_permissions`
  ADD PRIMARY KEY (`role_perm_id`);

--
-- Indexes for table `samples`
--
ALTER TABLE `samples`
  ADD PRIMARY KEY (`sample_id`);

--
-- Indexes for table `sectionhelp`
--
ALTER TABLE `sectionhelp`
  ADD PRIMARY KEY (`sectionHelp_id`);

--
-- Indexes for table `sections`
--
ALTER TABLE `sections`
  ADD PRIMARY KEY (`section_id`);

--
-- Indexes for table `spat_human`
--
ALTER TABLE `spat_human`
  ADD PRIMARY KEY (`spat_human_id`),
  ADD KEY `testDetails_id` (`testDetails_id`);

--
-- Indexes for table `tb_and_vph`
--
ALTER TABLE `tb_and_vph`
  ADD PRIMARY KEY (`tb_and_vph_id`),
  ADD KEY `testDetails_id` (`testDetails_id`);

--
-- Indexes for table `tehsil`
--
ALTER TABLE `tehsil`
  ADD PRIMARY KEY (`tehsil_id`);

--
-- Indexes for table `testdetails`
--
ALTER TABLE `testdetails`
  ADD PRIMARY KEY (`testDetails_id`),
  ADD KEY `test_id` (`test_id`),
  ADD KEY `client_id` (`client_id`);

--
-- Indexes for table `testhelp`
--
ALTER TABLE `testhelp`
  ADD PRIMARY KEY (`testHelp_id`);

--
-- Indexes for table `tests`
--
ALTER TABLE `tests`
  ADD PRIMARY KEY (`test_id`);

--
-- Indexes for table `test_samples`
--
ALTER TABLE `test_samples`
  ADD PRIMARY KEY (`test_sample_id`),
  ADD KEY `test_id` (`test_id`),
  ADD KEY `sample_id` (`sample_id`);

--
-- Indexes for table `tuberculin_skin_test`
--
ALTER TABLE `tuberculin_skin_test`
  ADD PRIMARY KEY (`tst_id`);

--
-- Indexes for table `urine_examination`
--
ALTER TABLE `urine_examination`
  ADD PRIMARY KEY (`urine_id`),
  ADD KEY `testDetails_id` (`testDetails_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD KEY `user_role` (`user_role`);

--
-- Indexes for table `user_labs`
--
ALTER TABLE `user_labs`
  ADD PRIMARY KEY (`ul_id`);

--
-- Indexes for table `water_bacteriology`
--
ALTER TABLE `water_bacteriology`
  ADD PRIMARY KEY (`water_bacteriology_id`),
  ADD KEY `testDetails_id` (`testDetails_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `acid_fast_staining`
--
ALTER TABLE `acid_fast_staining`
  MODIFY `afs_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `antibiotics`
--
ALTER TABLE `antibiotics`
  MODIFY `antibiotics_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `breeds`
--
ALTER TABLE `breeds`
  MODIFY `breed_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `brucella_animal_ind`
--
ALTER TABLE `brucella_animal_ind`
  MODIFY `brucella_animal_ind_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `cattles`
--
ALTER TABLE `cattles`
  MODIFY `cattle_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `center_station`
--
ALTER TABLE `center_station`
  MODIFY `center_station_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `client_info`
--
ALTER TABLE `client_info`
  MODIFY `client_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=90;

--
-- AUTO_INCREMENT for table `culture_sensitivity`
--
ALTER TABLE `culture_sensitivity`
  MODIFY `culture_sensitivity_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `directorates`
--
ALTER TABLE `directorates`
  MODIFY `directorate_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `districts`
--
ALTER TABLE `districts`
  MODIFY `district_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `elisa_animal`
--
ALTER TABLE `elisa_animal`
  MODIFY `elisa_animal_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `elisa_human`
--
ALTER TABLE `elisa_human`
  MODIFY `elisa_human_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `haematology`
--
ALTER TABLE `haematology`
  MODIFY `haematology_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `impression_smear`
--
ALTER TABLE `impression_smear`
  MODIFY `impression_smear_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `labs`
--
ALTER TABLE `labs`
  MODIFY `lab_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `mastitis`
--
ALTER TABLE `mastitis`
  MODIFY `mastitis_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `modules`
--
ALTER TABLE `modules`
  MODIFY `module_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `mrt`
--
ALTER TABLE `mrt`
  MODIFY `mrt_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `pcr_animal`
--
ALTER TABLE `pcr_animal`
  MODIFY `pcr_animal_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `pcr_human`
--
ALTER TABLE `pcr_human`
  MODIFY `pcr_human_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `rbpt`
--
ALTER TABLE `rbpt`
  MODIFY `rbpt_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `role_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `role_permissions`
--
ALTER TABLE `role_permissions`
  MODIFY `role_perm_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `samples`
--
ALTER TABLE `samples`
  MODIFY `sample_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `sectionhelp`
--
ALTER TABLE `sectionhelp`
  MODIFY `sectionHelp_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `sections`
--
ALTER TABLE `sections`
  MODIFY `section_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `spat_human`
--
ALTER TABLE `spat_human`
  MODIFY `spat_human_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tb_and_vph`
--
ALTER TABLE `tb_and_vph`
  MODIFY `tb_and_vph_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tehsil`
--
ALTER TABLE `tehsil`
  MODIFY `tehsil_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=91;

--
-- AUTO_INCREMENT for table `testdetails`
--
ALTER TABLE `testdetails`
  MODIFY `testDetails_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `testhelp`
--
ALTER TABLE `testhelp`
  MODIFY `testHelp_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `tests`
--
ALTER TABLE `tests`
  MODIFY `test_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `test_samples`
--
ALTER TABLE `test_samples`
  MODIFY `test_sample_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=77;

--
-- AUTO_INCREMENT for table `tuberculin_skin_test`
--
ALTER TABLE `tuberculin_skin_test`
  MODIFY `tst_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `urine_examination`
--
ALTER TABLE `urine_examination`
  MODIFY `urine_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `user_labs`
--
ALTER TABLE `user_labs`
  MODIFY `ul_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `water_bacteriology`
--
ALTER TABLE `water_bacteriology`
  MODIFY `water_bacteriology_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `brucella_animal_ind`
--
ALTER TABLE `brucella_animal_ind`
  ADD CONSTRAINT `brucella_animal_ind_ibfk_1` FOREIGN KEY (`testDetails_id`) REFERENCES `testdetails` (`testDetails_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `culture_sensitivity`
--
ALTER TABLE `culture_sensitivity`
  ADD CONSTRAINT `culture_sensitivity_ibfk_1` FOREIGN KEY (`testDetails_id`) REFERENCES `testdetails` (`testDetails_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `culture_sensitivity_ibfk_2` FOREIGN KEY (`antibiotics_id`) REFERENCES `antibiotics` (`antibiotics_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `elisa_animal`
--
ALTER TABLE `elisa_animal`
  ADD CONSTRAINT `elisa_animal_ibfk_1` FOREIGN KEY (`testDetails_id`) REFERENCES `testdetails` (`testDetails_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `haematology`
--
ALTER TABLE `haematology`
  ADD CONSTRAINT `haematology_ibfk_1` FOREIGN KEY (`testDetails_id`) REFERENCES `testdetails` (`testDetails_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `impression_smear`
--
ALTER TABLE `impression_smear`
  ADD CONSTRAINT `impression_smear_ibfk_1` FOREIGN KEY (`testDetails_id`) REFERENCES `testdetails` (`testDetails_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `mastitis`
--
ALTER TABLE `mastitis`
  ADD CONSTRAINT `mastitis_ibfk_1` FOREIGN KEY (`testDetails_id`) REFERENCES `testdetails` (`testDetails_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `mrt`
--
ALTER TABLE `mrt`
  ADD CONSTRAINT `mrt_ibfk_1` FOREIGN KEY (`testDetails_id`) REFERENCES `testdetails` (`testDetails_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `pcr_animal`
--
ALTER TABLE `pcr_animal`
  ADD CONSTRAINT `pcr_animal_ibfk_1` FOREIGN KEY (`testDetails_id`) REFERENCES `testdetails` (`testDetails_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `pcr_human`
--
ALTER TABLE `pcr_human`
  ADD CONSTRAINT `pcr_human_ibfk_1` FOREIGN KEY (`testDetails_id`) REFERENCES `testdetails` (`testDetails_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `rbpt`
--
ALTER TABLE `rbpt`
  ADD CONSTRAINT `rbpt_ibfk_1` FOREIGN KEY (`testDetails_id`) REFERENCES `testdetails` (`testDetails_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `spat_human`
--
ALTER TABLE `spat_human`
  ADD CONSTRAINT `spat_human_ibfk_1` FOREIGN KEY (`testDetails_id`) REFERENCES `testdetails` (`testDetails_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `tb_and_vph`
--
ALTER TABLE `tb_and_vph`
  ADD CONSTRAINT `tb_and_vph_ibfk_1` FOREIGN KEY (`testDetails_id`) REFERENCES `testdetails` (`testDetails_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `testdetails`
--
ALTER TABLE `testdetails`
  ADD CONSTRAINT `testdetails_ibfk_1` FOREIGN KEY (`test_id`) REFERENCES `tests` (`test_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `testdetails_ibfk_4` FOREIGN KEY (`client_id`) REFERENCES `client_info` (`client_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `test_samples`
--
ALTER TABLE `test_samples`
  ADD CONSTRAINT `test_samples_ibfk_1` FOREIGN KEY (`test_id`) REFERENCES `tests` (`test_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `test_samples_ibfk_2` FOREIGN KEY (`sample_id`) REFERENCES `samples` (`sample_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `urine_examination`
--
ALTER TABLE `urine_examination`
  ADD CONSTRAINT `urine_examination_ibfk_1` FOREIGN KEY (`testDetails_id`) REFERENCES `testdetails` (`testDetails_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_2` FOREIGN KEY (`user_role`) REFERENCES `roles` (`role_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `water_bacteriology`
--
ALTER TABLE `water_bacteriology`
  ADD CONSTRAINT `water_bacteriology_ibfk_1` FOREIGN KEY (`testDetails_id`) REFERENCES `testdetails` (`testDetails_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
