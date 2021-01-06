-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 06, 2021 at 09:50 AM
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
(1, 10, 'positive', 'TB found Positive on the basis of AFB Staining Test.', 'this is testing entr', 'this is testing entr'),
(2, 11, 'positive', ' ', '0', '5'),
(3, 12, 'positive', ' Remarks Here', '1', '5'),
(4, 13, 'positive', 'Treatment started of TB.', 'Nil', '3'),
(5, 27, 'positive', ' TB found Positive', '1', '2'),
(6, 47, 'positive', ' TB found Positive', '0', '8'),
(7, 53, 'positive', ' TB found in the sample.', '5', '5'),
(8, 54, 'positive', ' TB found in the sample.', '3', '5');

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
(26, 9, 'Common Mouse', 0, 2, '2020-12-04 11:01:30'),
(27, 9, 'Laboratory Mouse', 0, 2, '2020-12-04 11:02:05'),
(28, 6, 'Black & White Rabbit', 0, 2, '2020-12-04 11:44:09'),
(29, 6, 'White Rabbit', 0, 2, '2020-12-04 11:44:36'),
(30, 6, 'Black Rabbit', 0, 2, '2020-12-04 11:45:22'),
(31, 6, 'Brown Rabbit', 0, 2, '2020-12-04 11:45:35'),
(32, 6, 'White Bay Rabbit', 0, 2, '2020-12-04 11:45:56'),
(33, 6, 'Bay Rabbit', 0, 2, '2020-12-04 11:46:15'),
(34, 7, 'Desert Camel', 0, 2, '2020-12-04 13:57:40'),
(35, 7, 'Beach Camel', 0, 2, '2020-12-04 13:58:13'),
(36, 7, 'Hill Camel', 0, 2, '2020-12-04 13:58:37'),
(37, 7, 'Racing Camel', 0, 2, '2020-12-04 13:58:56');

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
(1, 3, 2, 'Center of Animal Nutrition - DLR&D ', '091-9213161', '091-9210639', 'procan.lddr@kp.gov.pk', 'http://livestockres.kp.gov.pk', 'Bacha Khan Chowk, Peshawar     ', 2, '2020-07-21 08:54:24', 0),
(2, 3, 2, 'Center of VRI', '3333-333333', '3333-333333', 'test@gmail.com', 'http://lims.kpdata.gov.pk/	', '  ', 2, '2020-07-21 08:58:49', 1),
(3, 3, 3, 'CBP - Veterinary Research Institute', '091-9210218', '091-9210220', 'procbp.lddr@kp.gov.pk', 'http://livestockres.kp.gov.pk', ' Bacha Khan Chowk, Peshawar ', 2, '2020-07-23 16:41:54', 0),
(4, 3, 3, 'CMB - Veterinary Research Institute', '091-9210218', '091-9210220', 'procmb.lddr@kp.gov.pk', 'http://livestockres.kp.gov.pk', 'Bacha Khan Chowk, Peshawar  ', 2, '2020-08-06 15:54:59', 0),
(5, 3, 3, 'CPP - Veterinary Research Institute', '091-9210218', '	091-9210220', 'procpp.lddr@kp.gov.pk', 'http://livestockres.kp.gov.pk', 'Bacha Khan Chowk, Peshawar ', 2, '2020-09-24 12:18:52', 0),
(6, 3, 3, 'FMDVRC, VRI Peshawar', '0919-210218', '0919-210218', 'test@gmail.com', 'http://lims.kpdata.gov.pk/	', ' VRI, Bacha Khan Chowk, Peshawar ', 2, '2020-10-01 03:45:01', 0),
(7, 7, 3, 'Veterinary Research & Disease Investigation Center Abbattabad', '0992-383763', '0992-383763', 'rdabbottabad.lddr@kp.gov.', 'http://livestockres.kp.gov.pk', '  Misile Chowk, Mandian, Abbottabad  ', 2, '2020-10-01 03:47:18', 0),
(8, 4, 3, 'Veterinary Research & Disease Investigation Center Swat', '0946-9240259', '0946-9240259', 'rdswat.lddr@kp.gov.pk', 'http://livestockres.kp.gov.pk', 'Kalam Bypass Road, Balogram Chowk, Swat', 2, '2020-10-01 03:48:44', 0),
(9, 1, 3, 'Veterinary Research & Disease Investigation Center Kohat', '0922-9260225', 'Nil', 'rdkohat.lddr@kp.gov.pk', 'http://livestockres.kp.gov.pk', '  Railway Patak, Hangu Chowk, Kohat  ', 2, '2020-10-01 03:50:04', 0),
(10, 5, 3, 'Veterinary Research & Disease Investigation Center DI Khan', '0966-740205', '0966-740205', 'rddik.lddr@kp.gov.pk', 'http://livestockres.kp.gov.pk', 'Ratta Kulachi, Bannu Road near Wild Life Park, Dera Ismail Khan  ', 2, '2020-10-01 03:52:25', 0),
(11, 18, 3, 'Veterinary Research & Disease Investigation Center Chitral', '0943-412492', '0943-412492', 'rdchitral.lddr@kp.gov.pk', 'http://livestockres.kp.gov.pk', 'Gahtak Road, Danin, Chitral ', 2, '2020-10-01 04:02:29', 0),
(12, 3, 2, 'Livestock Research & Development Station Surezai', '091-5510384', 'Nil', 'sdsurezai.lddr@kp.gov.pk', 'http://livestockres.kp.gov.pk', 'Surezai, Peshawar  ', 2, '2020-10-01 04:03:22', 0),
(13, 5, 2, 'Livestock Research & Development Station Paharpur', '0331-4521830', 'Nil', 'sdpaharpur.lddr@kp.gov.pk', 'http://livestockres.kp.gov.pk', '  Paharpur, Dera Ismail Khan  ', 2, '2020-10-01 04:04:40', 0),
(14, 1, 2, 'Arid Zone Small Ruminants Research Institute', '0333-9206812', 'Nil', 'sdazsrri.lddr@kp.gov.pk', 'http://livestockres.kp.gov.pk', 'Ghulam Banda, Kohat ', 2, '2020-10-01 04:06:03', 0),
(15, 9, 2, 'Livestock Research & Development Station Dir Lower', '0945-835801', 'Nil', 'sddir.lddr@kp.gov.pk', 'http://livestockres.kp.gov.pk', ' Hanifa, Dir Lower ', 2, '2020-10-01 04:06:45', 0),
(16, 11, 2, 'Poultry Research Institute', '0997-410028', 'Nil', 'dpri.lddr@kp.gov.pk', 'http://livestockres.kp.gov.pk', 'Jabba, Mansehra ', 2, '2020-10-01 04:07:32', 0),
(17, 4, 2, 'Goat Production Research Station', '0333-9352339', 'Nil', 'sdcharbagh.lddr@gmail.com', 'http://livestockres.kp.gov.pk', '  Charbagh, Swat  ', 2, '2020-10-01 04:08:08', 0),
(18, 2, 2, 'Livestock Research & Development Station Swabi', '0314-2460540', 'Nil', 'sdswabi.lddr@kp.gov.pk', 'http://livestockres.kp.gov.pk', 'Gulu Dherai, Bam Khel, Swabi', 2, '2020-10-01 04:08:35', 0),
(19, 3, 4, 'Information Technology Cell', '0919-210218', '0919-210218', 'test@gmail.com', 'http://lims.kpdata.gov.pk/	', 'Information Technology Cell ', 2, '2020-10-05 23:06:37', 0),
(20, 3, 4, 'Veterinary Research Institute', '091-9210218', '091-9210220', 'dvri.lddr@kp.gov.pk', 'http://livestockres.kp.gov.pk', 'Bacha Khan Chowk, Peshawar    ', 2, '2020-11-20 11:01:58', 0);

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
(10, 'Tariq ali', '', '0312-2222222', '', 'Surezai, Peshawar', '22222-2222222-2', 3, 6, 'Telaband, Surezai', NULL, '2020-09-25 06:06:20', '2020-09-25 06:06:20', 2, 'Patient'),
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
(27, 'Mumtaz Khan', '', '0000-0000000', '', 'Sarkai', '00000-0000000-0', 3, 4, 'Dabgari Garden', NULL, '2020-10-13 06:43:49', '2020-10-13 06:43:49', 8, 'farm_visited'),
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
(89, 'Fayaz khan', '', '0000-0000000', '', 'charsadda', '86000-0000000-0', 26, 0, 'sardazy', NULL, '2020-10-27 09:38:06', '2020-10-27 09:38:06', 7, 'farmer'),
(90, 'Tariq Ali', '', '0000-0000000', '', 'Telaband, Peshawar.', '01010-0000000-0', 3, 7, 'Telaband, Surezai', NULL, '2020-11-13 15:41:14', '2020-11-13 15:41:14', 7, 'farmer'),
(91, 'Ali Khan ', '', '0000-0000000', '', 'Gul Bahar, Peshawar City.', '00123-0000000-0', 3, 4, 'Gul Bahar, Peshawar City.', NULL, '2020-11-16 07:59:51', '2020-11-16 07:59:51', 2, 'farmer'),
(92, 'Wali Khan', '', '0000-0000000', '', 'Nothia Jadeed, Peshawar Cantt', '01010-1000000-0', 3, 4, 'Nothia Jadeed', NULL, '2020-11-17 09:12:25', '2020-11-17 09:12:25', 9, 'farmer'),
(93, 'Mr Jawad', '', '0345-0000000', '', 'Charbagh', '02120-0000000-0', 4, 59, 'Charbagh Swat', NULL, '2020-11-17 09:30:38', '2020-11-17 09:30:38', 9, 'farmer'),
(94, 'Akmal Jawad', '', '0000-0000000', '', 'Kulachi D.I. Khan', '12012-0120000-0', 5, 12, 'Kulachi', NULL, '2020-11-17 09:53:08', '2020-11-17 09:53:08', 9, 'farmer'),
(95, 'Kamal Khan', '', '0000-0000000', '', 'Location: Takht Bhai Stop.', '01010-2000000-0', 6, 67, 'Village / UC Takht Bhai ', NULL, '2020-11-17 10:38:20', '2020-11-17 10:38:20', 9, 'farmer'),
(96, 'Ahmad Khan', '', '0000-0000000', '', 'Location: Mian Essa', '12012-0000000-0', 26, 74, 'Village Shabqadar', NULL, '2020-11-17 10:49:12', '2020-11-17 10:49:12', 9, 'farmer'),
(97, 'Zainab', '', '0000-0000000', '', 'Location: Parachinar', '01010-1022222-2', 22, 31, 'Village Parachinar', NULL, '2020-11-18 05:16:45', '2020-11-18 05:16:45', 2, 'Patient'),
(98, 'Yaseen', '', '0000-0000000', '', 'Location: Charsadda', '10203-2000000-0', 26, 73, 'Village Charsadda', NULL, '2020-11-18 05:37:08', '2020-11-18 05:37:08', 2, 'Patient'),
(99, 'Anwar Gul', '', '0000-0000000', '', 'Location: Bana Manrhi', '01314-5000000-0', 3, 79, 'Village Bana Marhi', NULL, '2020-11-18 06:03:14', '2020-11-18 06:03:14', 2, 'farmer'),
(100, 'Aftab Khan', '', '0000-0000000', '', 'Gul Bahar, Peshawar City.', '10201-0000000-0', 3, 5, 'Gul Bahar, Peshawar City.', NULL, '2020-11-18 10:09:02', '2020-11-18 10:09:02', 2, 'farmer'),
(101, 'Haider Ali ', '', '0000-0000000', '', 'Loc: Charsadda Road', '10110-1022000-0', 3, 79, 'Charsadda Road', NULL, '2020-11-18 10:23:56', '2020-11-18 10:23:56', 2, 'farmer'),
(102, '', '', '', '', 'Telaband, Peshawar.', '11011-0020000-0', 0, 5, 'Telaband, Surezai', NULL, '2020-11-19 08:19:30', '2020-11-19 08:19:30', 2, 'farmer'),
(103, '', '', '0000-0000000', '', 'Location Charsadda', '01230-4000000-0', 26, 73, 'Village Charsadda', NULL, '2020-11-19 09:44:18', '2020-11-19 09:44:18', 2, 'Patient'),
(104, 'Hassan Khan', '', '0000-0000000', '', 'location telaband.', '00001-2350000-0', 3, 7, 'village telaband.', NULL, '2020-11-20 06:08:36', '2020-11-20 06:08:36', 8, 'farmer'),
(105, 'Jawad Hussain', '', '0000-0000000', '', 'Gul Bahar, Peshawar City.', '01235-8000000-0', 3, 4, 'Gul Bahar, Peshawar City.', NULL, '2020-11-20 09:45:46', '2020-11-20 09:45:46', 7, 'farmer'),
(106, 'Junaid Khan', '', '0000-0000000', '', 'Telaband, Peshawar.', '20145-6000000-0', 3, 7, 'Telaband, Surezai', NULL, '2020-11-20 10:37:51', '2020-11-20 10:37:51', 8, 'farmer'),
(107, 'Tariq Jamal', '', '0000-0000000', '', 'Dir Upper', '01235-6450000-0', 8, 48, 'Dir', NULL, '2020-11-20 10:49:41', '2020-11-20 10:49:41', 8, 'farmer'),
(108, 'Hassan Jan', '', '0000-0000000', '', 'Location: Babuzai Swat', '01216-3000000-0', 4, 56, 'Village: Babuzai Swat', NULL, '2020-11-20 10:56:53', '2020-11-20 10:56:53', 9, 'farmer'),
(109, '', 'AZSRRI Ghulam Banda, Kohat', '', '091-2594862', '', '', 0, 0, '', NULL, '2020-11-20 11:04:29', '2020-11-20 11:04:29', 12, 'own_dept'),
(110, 'Yaseen', '', '0000-0000000', '', 'Location: Kohat', '52684-0000000-0', 1, 36, 'Village Kohat', NULL, '2020-11-20 11:09:19', '2020-11-20 11:09:19', 9, 'farmer'),
(111, 'Malik Rehman', '', '0000-0000000', '', 'Location Takht Bhai.', '12035-2000000-0', 6, 67, 'Village: Takht Bhai', NULL, '2020-11-23 07:00:59', '2020-11-23 07:00:59', 9, 'farmer'),
(112, 'Rehmat Khan', '', '0000-0000000', '', 'Location Abbottabad', '12536-0000000-0', 7, 16, 'Village Abbottabad', NULL, '2020-11-23 07:17:03', '2020-11-23 07:17:03', 9, 'farmer'),
(113, 'Zainab', '', '0000-0000000', '', 'Location Bara.', '12548-0000000-0', 28, 80, 'Village Bara.', NULL, '2020-11-23 08:29:47', '2020-11-23 08:29:47', 11, 'Patient'),
(114, 'Haider Ali ', '', '0000-0000000', '', 'Location Charsadda Road.', '52648-0258000-0', 3, 79, 'Village Charsadda Road.', NULL, '2020-11-23 08:56:00', '2020-11-23 08:56:00', 11, 'farmer'),
(115, 'Zahir', '', '0000-0000000', '', 'Location Peshawar', '25483-0580000-0', 3, 79, 'Village Peshawar', NULL, '2020-11-23 09:11:12', '2020-11-23 09:11:12', 11, 'farmer'),
(116, 'Mumtaz Saima', '', '0000-0000000', '', 'Location Ekka Ghund', '12568-8015000-0', 29, 85, 'Village Ekka Ghund', NULL, '2020-11-23 09:48:20', '2020-11-23 09:48:20', 11, 'Patient'),
(117, 'Major Arshad', '', '0000-0000000', '', '', '32580-0000000-0', 2, 1, '', NULL, '2020-11-23 10:20:54', '2020-11-23 10:20:54', 11, 'farmer'),
(118, 'Nasreen Bibi', '', '0000-0000000', '', 'Location Timergara', '25136-0125800-0', 9, 47, 'Village Timergara', NULL, '2020-11-23 10:54:39', '2020-11-23 10:54:39', 11, 'Patient'),
(119, 'Salman', '', '0000-0000000', '', 'Gul Bahar, Peshawar City.', '02153-6800000-0', 3, 4, 'Gul Bahar, Peshawar City.', NULL, '2020-11-23 11:26:23', '2020-11-23 11:26:23', 11, 'farmer'),
(120, 'Huma Khan', '', '0000-0000000', '', 'Gul Burg, Peshawar Cantt', '21563-2000000-0', 3, 79, 'Gul Burg, Peshawar Cantt', NULL, '2020-11-26 22:13:07', '2020-11-26 22:13:07', 11, 'Patient'),
(121, 'Hasan Iqbal', '', '0000-0000000', '', 'Location: Abbottabad', '21356-0000000-0', 7, 16, 'UC Abbottabad', NULL, '2020-11-26 22:42:34', '2020-11-26 22:42:34', 12, 'farmer'),
(122, 'Sadam Khan', '', '0000-0000000', '', 'Location: Abbottabad', '23152-0000000-0', 7, 16, 'UC Abbottabad', NULL, '2020-11-27 06:40:46', '2020-11-27 06:40:46', 12, 'farmer'),
(123, 'Ahsan Khan', '', '0000-0000000', '', 'Gul Burg, Peshawar Cantt', '23510-6800000-0', 3, 79, 'Gul Burg, Peshawar Cantt', NULL, '2020-11-27 09:13:26', '2020-11-27 09:13:26', 8, 'farmer'),
(124, 'Ahsan Iqbal', '', '0000-0000000', '', 'Location Main City', '02351-0000000-0', 3, 79, 'UC Gul Bahar', NULL, '2020-11-30 22:19:49', '2020-11-30 22:19:49', 11, 'Patient'),
(125, 'Shamroz Khan', '', '0333-0000000', '', 'Hasan Khel', '13208-8450000-0', 27, 78, 'Taru Jaba', NULL, '2020-12-02 08:05:48', '2020-12-02 08:05:48', 7, 'farmer'),
(126, 'Haider Ali ', '', '0000-0000000', '', 'Mian Essa', '23658-4000000-0', 26, 73, 'Shabqadar', NULL, '2020-12-02 08:55:33', '2020-12-02 08:55:33', 11, 'farmer'),
(127, 'Mumtaz Saima', '', '0000-0000000', '', 'Chaman', '02365-9900000-0', 29, 85, 'Ekka Ghund', NULL, '2020-12-02 09:30:01', '2020-12-02 09:30:01', 11, 'Patient'),
(128, 'Major Arshad', '', '0000-0000000', '', 'Ali Khel', '21356-4233056-0', 2, 3, 'Dulu Dherai', NULL, '2020-12-02 09:39:44', '2020-12-02 09:39:44', 11, 'farmer'),
(129, 'Mst. Nasreen Bibi', '', '0000-0000000', '', 'G-2 Street', '62180-3548000-0', 9, 47, 'Hanfia', NULL, '2020-12-02 09:45:49', '2020-12-02 09:45:49', 11, 'Patient'),
(130, 'Salman', '', '0000-0000000', '', 'Gul Khan House', '03215-8020000-0', 13, 41, 'Ajiba', NULL, '2020-12-02 09:56:26', '2020-12-02 09:56:26', 11, 'farmer'),
(131, 'Jamal Qadir', '', '0000-0000000', '', 'Molaganu Street', '21351-6900000-0', 3, 79, 'Nothia Qadeem', NULL, '2020-12-02 10:07:18', '2020-12-02 10:07:18', 8, 'farmer'),
(132, 'Jibran Khan', '', '0000-0000000', '', 'Usman Khel', '03215-6000000-0', 2, 2, 'Gulu Dherai', NULL, '2020-12-02 10:56:44', '2020-12-02 10:56:44', 8, 'farm_visited'),
(133, 'Gohar Zaman', '', '0000-0000000', '', 'House No.5', '23025-0050051-0', 11, 24, 'Sangarh', NULL, '2020-12-02 11:20:49', '2020-12-02 11:20:49', 8, 'farmer'),
(134, 'Mohsin Khan', '', '0231-0000000', '', 'Koki Khel', '31900-0000000-0', 28, 80, 'Bara Bazar', NULL, '2020-12-03 05:30:41', '2020-12-03 05:30:41', 9, 'farmer'),
(135, 'Arshad Kamal', '', '0312-0000000', '', 'Hassan Khel', '23568-0000000-0', 6, 63, 'Hassan Garhi', NULL, '2020-12-03 06:08:25', '2020-12-03 06:08:25', 9, 'farmer'),
(136, 'Ali Ahmad', '', '0000-0000000', '', 'Kalu Khel', '23591-3058000-0', 3, 5, 'Pajaggi Road', NULL, '2020-12-03 06:20:27', '2020-12-03 06:20:27', 9, 'farmer'),
(137, 'Tariq Ali', '', '0000-0000000', '', 'Mali Khel', '02315-0000000-0', 4, 60, 'Showr', NULL, '2020-12-03 07:28:53', '2020-12-03 07:28:53', 9, 'farmer'),
(138, 'Mumtaz Khan', '', '0000-0000000', '', 'Sarkai', '02300-0000000-0', 3, 4, 'Dabgari Garden', NULL, '2020-12-03 08:27:17', '2020-12-03 08:27:17', 11, 'Patient');

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

--
-- Dumping data for table `culture_sensitivity`
--

INSERT INTO `culture_sensitivity` (`culture_sensitivity_id`, `testDetails_id`, `antibiotics_id`, `amipicilin`, `norfloxacin`, `ampiclox`, `kanamycin`, `toramycin`, `lincomycin`, `chlorampherical`, `flumiquine`, `cloacilin`, `ciprofloxacin`, `neomycin`, `negram`, `cephradin`, `penicillin`, `doxyeyclin`, `polymixin`, `erythromycin`, `sulphamethoxazoe`, `amoxicillin`, `streptomycin`, `enrofloxacin`, `urixin`, `gentamicin`, `augmentin`, `ofloxacinl`, `oxytetracyclin`, `reports`, `created_by`, `created_date`, `fLoramphenical`, `cefotaxime_Clavulanic_acid`, `tylosin`, `sulfamethoxazole`, `sulfamethoxazoleTrimethoprim`, `doxycycline`, `tilmicosin`) VALUES
(1, 16, NULL, 'N/A', 'N/A', 'N/A', 'N/A', 'N/A', 'N/A', 'N/A', 'Sensitive', 'N/A', 'N/A', 'N/A', 'N/A', 'N/A', 'Sensitive', 'N/A', 'N/A', 'N/A', 'N/A', 'Sensitive', 'N/A', 'Sensitive', 'N/A', 'N/A', 'N/A', 'N/A', 'N/A', 'Salmonella', 9, '2020-11-17 09:53:08', 'N/A', 'N/A', 'N/A', 'N/A', 'N/A', 'N/A', 'N/A'),
(2, 67, NULL, 'N/A', 'N/A', 'N/A', 'N/A', 'N/A', 'N/A', 'N/A', 'Sensitive', 'N/A', 'N/A', 'Intermediate', 'N/A', 'N/A', 'N/A', 'N/A', 'N/A', 'N/A', 'N/A', 'Sensitive', 'N/A', 'N/A', 'N/A', 'N/A', 'N/A', 'N/A', 'N/A', 'e-coli', 9, '2020-12-03 06:20:27', 'N/A', 'N/A', 'N/A', 'N/A', 'N/A', 'N/A', 'N/A');

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
(2, 7, 'yes', 'this is testing entry', 'this is testing entry', NULL, NULL, 2, '2020-11-05 18:52:22'),
(3, 39, 'No', '', 'No', '145%', 'Positive', 11, '2020-11-23 10:20:54'),
(4, 59, 'Yes', '', 'No', '145%', 'Positive', 11, '2020-12-02 09:39:44');

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
(1, 6, NULL, 'this is testing entry', 'Yes', 'this is testing entry', '', 2, '2020-11-05 12:41:18'),
(2, 38, '6.5', 'Fever', 'Yes', 'Nil', 'Negative', 11, '2020-11-23 09:53:35'),
(3, 58, '6.5', 'Fever and Pain', 'Yes', 'Nil', 'Negative', 11, '2020-12-02 09:33:41'),
(4, 80, NULL, 'Fever', 'Yes', 'Nil', '', 11, '2020-12-08 07:18:43');

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
(1, 18, '13.9', '258', '86', '1235', NULL, NULL, NULL, '6.28', '6.3', '19.9', '31.7', '31.6', '31.6', '18.1', '1055', '3.9', '15.9', '0.1411', 9, '2020-11-17 10:49:12'),
(2, 31, '8.3', '254', '25', '365', NULL, NULL, NULL, '8.17', '8.1', '27.4', '33.6', '9.9', '29.5', '16.7', '324', '4.3', '16.6', '0.139', 9, '2020-11-20 11:04:29'),
(3, 32, '8.3', '125', '258', '36', NULL, NULL, NULL, '8.17', '8.1', '27.4', '33.6', '9.9', '29.5', '16.7', '324', '4.3', '16.6', '0.139', 9, '2020-11-20 11:09:19'),
(4, 33, '8.3', NULL, NULL, NULL, NULL, NULL, NULL, '8.17', '8.1', '27.4', '33.6', '9.9', '29.5', '16.7', '324', '4.3', '16.6', '0.139', 9, '2020-11-23 07:00:59'),
(5, 68, '8.3', '125', '258', '36', NULL, NULL, NULL, '8.17', '8.1', '27.4', '33.6', '9.9', '29.5', '16.7', '324', '4.3', '16.6', '0.139', 9, '2020-12-03 07:28:53'),
(6, 73, '6.1', '42.2', '3.9', '53.9', NULL, NULL, NULL, '5.23', '8.6', '33.7', '64.6', '16.4', '25.5', '18.3', '573', '7.1', '17.7', '0.406', 9, '2020-12-04 06:04:13'),
(7, 74, '6.2', '40.8', '4.0', '55.2', NULL, NULL, NULL, '5.15', '8.8', '33.4', '65.0', '17.0', '26.3', '18.2', '556', '7.3', '17.7', '0.405', 9, '2020-12-04 06:49:28'),
(8, 75, '6.2', '44.2', '6.3', '49.5', NULL, NULL, NULL, '5.14', '8.8', '33.1', '64.5', '17.1', '26.5', '18.1', '549', '7.1', '17.3', '0.389', 9, '2020-12-04 07:31:15'),
(9, 76, '6.1', NULL, NULL, NULL, NULL, NULL, NULL, '5.19', '8.8', '33.6', '64.9', '16.9', '26.1', '17.9', '540', '7.6', '17.4', '0.410', 9, '2020-12-04 08:24:35'),
(10, 77, '6.1', NULL, NULL, NULL, NULL, NULL, NULL, '5.72', '9.0', '35.1', '61.4', '15.7', '25.6', '18.5', '?????', '???????', '???????', '??????', 9, '2020-12-04 09:00:29'),
(11, 78, '6.2', NULL, NULL, NULL, NULL, NULL, NULL, '6.34', '10.3', '39.4', '62.2', '16.2', '26.1', '18.2', '??????????', '?????????', '?????????', '?????????', 9, '2020-12-04 09:23:27');

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
(1, 14, NULL, NULL, NULL, 'Gram Positive Bicili  was obse', 'Nil', 'Dr. InamUllah Wazir', 9, '2020-11-17 09:12:25'),
(2, 15, NULL, NULL, NULL, 'Gram Positive Bicili ', ' Nil', 'Dr. InamUllah Wazir', 9, '2020-11-17 09:30:38'),
(3, 30, NULL, NULL, NULL, 'Bicili Bacteria', ' Bicili Bacteria found the sam', 'Dr. Inam Ullah Wazir', 9, '2020-11-20 10:56:53'),
(4, 65, NULL, NULL, NULL, 'Bicili', ' Bicili Bacteria found in the ', 'Dr. Inam Ullah Wazir', 9, '2020-12-03 05:30:41'),
(5, 81, NULL, NULL, NULL, 'Bicili', ' Bicili Bacteria was observed ', 'Dr. Inam Ullah Wazir', 9, '2020-12-08 07:34:44');

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
(6, 2, 4, 4, 'Bacteriology Lab ', 'lab', 'this is Pathology & Bacteriology Lab ', 1, 2, '2020-08-31 13:44:25'),
(7, 3, 4, 3, 'TB&VPH Lab', 'lab', 'TB&VPH Lab', 0, 2, '2020-08-31 13:46:48'),
(8, 2, 4, 2, 'Virology  Lab ', 'lab', 'Virology lab peshawar', 0, 2, '2020-08-31 13:47:25'),
(9, 2, 4, 6, 'Animal Biotechnology Lab', 'lab', 'this is Animal Biotechnology Lab', 0, 2, '2020-09-24 07:35:53'),
(10, 4, 19, 8, 'Information Technology Cell', 'lab', 'IT Cell - L&DD(Research) KP Peshawar', 0, 2, '2020-10-06 06:08:48'),
(11, 3, 7, 9, 'Microbiology Laboratory', 'lab', 'Micro Lab', 1, 2, '2020-11-26 22:30:45'),
(12, 3, 7, 10, 'Pathology & Bacteriology Laboratory', 'lab', 'Pathology & Bacteriology Laboratory of the VR&DIC Abbottabad', 1, 2, '2020-11-27 10:39:12'),
(13, 3, 7, 10, 'Pathology & Bacteriology Laboratory', 'lab', 'Pathology & Bacteriology Lab at VR&DIC Abbottabad', 0, 2, '2020-11-27 10:42:17');

-- --------------------------------------------------------

--
-- Table structure for table `mastitis`
--

CREATE TABLE `mastitis` (
  `mastitis_id` int(11) NOT NULL,
  `testDetails_id` int(11) NOT NULL,
  `result_status` varchar(30) DEFAULT NULL,
  `neg_ph` float DEFAULT NULL,
  `neg_ssc` double DEFAULT NULL,
  `neg_gross_appearance` varchar(30) DEFAULT NULL,
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

INSERT INTO `mastitis` (`mastitis_id`, `testDetails_id`, `result_status`, `neg_ph`, `neg_ssc`, `neg_gross_appearance`, `cal_kid_lambing_date`, `daily_milk_production`, `lactation_no`, `total_animals_at_farm`, `in_milk`, `dry_period_given`, `prev_mastatis_rec_of_anim`, `prev_mastatis_rec_of_farm`, `prac_mastatis_test_at_farm`, `mastitis_r1`, `mastitis_r2`, `mastitis_l1`, `mastitis_l2`, `milk_ph_r1`, `milk_ph_r2`, `milk_ph_l1`, `milk_ph_l2`, `s_c_c_r1`, `s_c_c_r2`, `s_c_c_l1`, `s_c_c_l2`, `gross_appearance_r1`, `gross_appearance_r2`, `gross_appearance_l1`, `gross_appearance_l2`, `quarters`, `mastitis_severity`, `milk_ph`, `s_c_c`, `gross_appearance`, `clinical_gross_appearance`, `clinical_or_sub`, `composite_or_ind`, `refer_to_bacteriology_sec_for`, `created_by`, `created_date`) VALUES
(1, 26, NULL, NULL, NULL, NULL, '11/20/2020', '', '2', '1', '1', '2 Months', 'No', 'No', 'No', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'L2', '', '', '', '', 'Yellowish', 'Clinical', NULL, '', 8, '2020-11-20 06:08:36'),
(2, 28, NULL, NULL, NULL, NULL, '11/20/2020', '', '3', '1', '1', '2 Months', 'No', 'No', 'No', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'L2', 'Moderate', '5', '500000', 'Bloody', '', 'Sub Clinical', 'Composite', '', 8, '2020-11-20 10:37:51'),
(3, 29, NULL, NULL, NULL, NULL, '11/20/2020', '', '2', '1', '1', '2 Months', 'No', 'No', 'No', '', 'Mild', '', 'Severe', '', '5', '', '8', '', '290000', '', '800000', '', 'Beads', '', 'Normal', 'L2', '', '', '', '', '', 'Sub Clinical', 'Individual', '', 8, '2020-11-20 10:49:41'),
(4, 43, NULL, NULL, NULL, NULL, '11/27/2020', '', '3', '10', '5', 'No Record', 'No', 'No', 'No', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'L2', '', '', '', '', 'Beads', 'Clinical', NULL, '', 12, '2020-11-26 22:42:34'),
(5, 44, 'Negative', 2, 2, 'Yellowish', '11/27/2020', '', '4', '4', '2', 'No Record', 'No', 'No', 'No', '', '', '', '', '0.00', '0.00', '0.00', '', '', '', '', '', '', '', '', '', 'L2', '', '0.00', '', '', '', 'Clinical', NULL, '', 12, '2020-11-27 06:40:46'),
(6, 45, NULL, NULL, NULL, NULL, '11/27/2020', '', '3', '7', '2', '3 months', 'No', 'No', 'No', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'L2', 'Severe', '6', '500000', 'Normal', '', 'Sub Clinical', 'Composite', '', 12, '2020-11-27 07:38:19'),
(7, 46, NULL, NULL, NULL, NULL, '11/27/2020', '', '2', '2', '2', 'No Record', 'No', 'No', 'No', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'L2', 'Moderate', '8', '600000', 'Yellowish', '', 'Sub Clinical', 'Composite', '', 8, '2020-11-27 09:13:26'),
(8, 48, NULL, NULL, NULL, NULL, '11/27/2020', '', '2', '5', '2', '3 months', 'No', 'No', 'No', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'L2', '', '', '', '', 'Clots', 'Clinical', NULL, '', 2, '2020-11-27 09:32:52'),
(9, 62, NULL, NULL, NULL, NULL, '12/02/2020', '', '2', '3', '1', '2 Months', 'No', 'No', 'No', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'L2', 'Moderate', '8', '300000', 'Yellowish', 'Beads', 'Clinical', 'Composite', '', 8, '2020-12-02 10:07:18'),
(10, 63, NULL, NULL, NULL, NULL, '12/02/2020', '', '2', '5', '2', '2 Months', 'No', 'No', 'No', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'L2', 'Severe', '9', '3400000', 'Bloody', '', 'Sub Clinical', 'Composite', '', 8, '2020-12-02 10:56:44'),
(11, 64, NULL, NULL, NULL, NULL, '12/02/2020', '', '3', '23', '14', '2 Months', 'No', 'No', 'No', 'Negative', 'Severe', 'Mild', '', '7', '9', '8', '', '100000', '350000', '290000', '', 'Yellowish', 'Normal', 'Normal', '', 'L2', '', '', '', '', '', 'Sub Clinical', 'Individual', '', 8, '2020-12-02 11:20:49'),
(12, 70, NULL, NULL, NULL, NULL, '12/03/2020', '', '2', '6', '2', '2 Months', 'No', 'No', 'No', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'L2', '', '', '', '', 'Yellowish', 'Clinical', NULL, '', 8, '2020-12-03 09:19:38'),
(13, 72, NULL, NULL, NULL, NULL, '12/03/2020', '', '1', '5', '2', '2 Months', 'No', 'No', 'No', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'L2', 'Mild', '8', '350000', 'Clots', '', 'Sub Clinical', 'Composite', '', 8, '2020-12-03 10:55:18'),
(14, 82, NULL, NULL, NULL, NULL, '12/08/2020', '', '2', '3', '2', '2 Months', 'No', 'No', 'No', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'L2', 'Moderate', '8', '600000', 'Yellowish', '', 'Sub Clinical', 'Composite', '', 8, '2020-12-08 10:18:19'),
(15, 83, NULL, NULL, NULL, NULL, '12/08/2020', '', '1', '7', '3', '2 Months', 'No', 'No', 'No', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'L2', 'Severe', '9', '600000', 'Normal', '', 'Sub Clinical', 'Composite', '', 8, '2020-12-08 10:27:40'),
(16, 84, NULL, NULL, NULL, NULL, '12/08/2020', '', '1', '8', '2', '2 Months', 'No', 'No', 'No', 'Mild', '', 'Moderate', 'Negative', '8', '', '6', '6', '200000', '', '600000', '100000', 'Clots', '', 'Bloody', 'Normal', 'L2', '', '', '', '', '', 'Sub Clinical', 'Individual', '', 8, '2020-12-08 10:34:58');

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
(1, 4, 'Yes', 'this is testing entry', 'this is testing entry', '', 2, '2020-11-05 12:38:25'),
(2, 24, 'Yes', '', 'No', '', 2, '2020-11-19 08:19:30'),
(3, 37, 'Yes', '', 'No', 'Negative', 11, '2020-11-23 09:11:12'),
(4, 55, 'Yes', '', 'No', 'Negative', 11, '2020-12-02 08:55:33');

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
(1, 9, 'Yes', 'this is testing entry', 'this is testing entry', 'Found', 2, '2020-11-05 19:05:51'),
(2, 41, 'No', '', 'No', 'Found', 11, '2020-11-23 11:26:23'),
(3, 61, 'Yes', '', 'No', 'Negative', 11, '2020-12-02 09:56:26');

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
(1, 1, 'not_found', 2, '2020-11-04 17:17:12', 'this is testing entry', 'Yes', 'this is testing entry'),
(2, 40, 'not_found', 11, '2020-11-23 11:03:59', 'Fever and Pain', 'Yes', 'Nil'),
(3, 60, 'Negative', 11, '2020-12-02 09:47:43', 'Fever', 'Yes', 'Nil');

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
(1, 3, 'Yes', 'this is testing entry', 'this is testing entry', '', 2, '2020-11-05 12:19:06'),
(2, 23, 'Yes', '', 'No', 'Negative', 2, '2020-11-18 10:23:56'),
(3, 36, 'No', '', 'No', 'Negative', 11, '2020-11-23 08:56:00'),
(4, 52, 'Yes', '', 'No', 'Positive', 11, '2020-12-01 11:27:30'),
(5, 57, 'Yes', '', 'No', 'Positive', 11, '2020-12-02 09:19:25');

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
(8, 'Information Technology Cell', 0, 2, '2020-10-06 06:07:25'),
(9, 'Microbiology Section', 1, 2, '2020-11-26 22:29:22');

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
(8, 4, 19, 8, 0, 2, '2020-10-06 06:07:54'),
(9, 3, 7, 9, 1, 2, '2020-11-26 22:29:59'),
(10, 3, 7, 1, 0, 2, '2020-11-27 10:37:52');

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
(1, 2, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, '2020-11-05 12:13:29', 'this is testing entry', 'Yes', 'this is testing entry'),
(2, 19, 'Negative', '+', '-', '-', '-', '-', '+', '-', '-', '-', '-', 2, '2020-11-18 05:29:48', 'Fever', 'No', 'Nil'),
(3, 20, 'Postive', '+', '+', '+', '-', '-', '+', '+', '+', '-', '-', 2, '2020-11-18 05:41:33', 'Fever', 'Yes', 'Nil'),
(4, 25, 'Postive', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', 2, '2020-11-26 21:30:30', 'Fever', 'Yes', 'Nil'),
(5, 35, 'Negative', '+', '-', '-', '-', '-', '+', '-', '-', '-', '-', 11, '2020-11-23 08:35:19', 'Fever and Pain', 'No', 'Nil'),
(6, 42, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 11, '2020-11-26 22:13:07', 'Fever and Pain', 'No', 'No'),
(7, 49, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 11, '2020-11-30 22:19:49', 'Fever and Pain', 'Yes', 'No'),
(8, 50, 'Postive', '+', '+', '+', '-', '-', '+', '+', '+', '-', '-', 11, '2020-12-01 09:42:30', 'Fever and Pain', 'Yes', 'Nil'),
(9, 51, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 11, '2020-12-01 11:10:22', 'Fever and Pain', 'Yes', 'No'),
(10, 56, 'Postive', '+', '+', '+', '-', '-', '+', '+', '+', '-', '-', 11, '2020-12-02 09:03:43', 'Fever and Pain', 'Yes', 'Nil'),
(11, 69, 'Postive', '+', '+', '+', '-', '-', '+', '+', '+', '-', '-', 11, '2020-12-03 08:30:05', 'Fever and Pain', 'Yes', 'Nil'),
(12, 79, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 11, '2020-12-08 06:50:18', 'Fever', 'Yes', 'Nil');

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
(9, 81120, 13, 9, 4, 'this is testing entry', '2', '020', 'Female', '4', '3', '16', 1, NULL, 'nill', 'nill', '2020-11-06', '2020-11-27', 1, '2020-11-27', ' Brucellosis Antigen found in the specimen.', 'this is testing entry', NULL, '180', 'this is testing entry', 0, '', NULL, 11, '2020-11-05 19:05:51', '2020-11-27 02:37:27', 0, 1, 0, 0, 'Yes', 'Brucellosis', 'Dr. Muhammad Shahid', 'Research Officer'),
(10, 91120, 3, 9, 1, 'this is testing entry', '1', '020', 'Female', '4', '8', '4', 2, NULL, 'nill', 'nill', '2020-11-13', '2020-12-02', 1, '2020-12-02', 'TB found Positive on the basis of AFB Staining Test.', 'this is testing entry', NULL, '25', 'this is testing entry', 0, '', NULL, 7, '2020-11-13 07:29:14', '2020-12-02 10:02:35', 2, 0, 0, 0, 'Yes', 'TB', 'Dr. Maleeha Anwar', 'Research Officer'),
(11, 101120, 3, 90, 7, 'Nil', '', '', 'Female', '5', '0', '', 0, NULL, 'Parasitology CMB VRI Peshawar', 'Research Officer /Incharge', '2020-11-13', '2020-11-25', 1, '2020-11-25', ' ', 'Nil', NULL, '25', 'Nil', 0, '', NULL, 7, '2020-11-13 15:41:14', '2020-11-25 11:51:32', 0, 0, 0, 0, 'Yes', 'TB', 'Dr. Maleeha Anwar', 'Research Officer'),
(12, 111120, 3, 91, 7, 'Nil', '1', 'Nil', 'Female', '6', '3', '7', 1, NULL, 'Parasitology Section, CMB, VRI Peshawar', 'Research Officer', '2020-11-16', '2020-11-16', 1, '2020-11-16', ' Remarks Here', 'Nil', NULL, '25', 'Nil', 0, '', NULL, 2, '2020-11-16 07:59:51', '2020-11-16 13:07:04', 1, 0, 0, 0, 'Yes', 'TB', 'Dr. Maleeha Anwar', 'Research Officer'),
(13, 121120, 3, 90, 7, 'Nil', '1', 'Nil', 'Female', '5', '0', '14', 1, NULL, 'Parasitology Section, CMB, VRI Peshawar', 'Research Officer', '2020-11-17', '2020-11-17', 1, '2020-11-17', 'Treatment started of TB.', 'Diahrea', NULL, '25', 'Nil', 0, '', NULL, 7, '2020-11-17 06:03:13', '2020-11-17 11:23:19', 1, 0, 0, 0, 'Yes', 'TB', 'Dr. Maleeha Anwar', 'Research Officer'),
(14, 131120, 2, 92, 2, 'Nil', '2', 'Nil', 'Female', '6', '0', '16', 1, NULL, 'Nil', 'Nil', '2020-11-17', '2020-11-17', 1, '2020-11-17', 'Nil', 'Nil', NULL, '50.00', 'Nil', 0, '', NULL, 9, '2020-11-17 09:12:25', '2020-11-17 14:23:03', 0, 1, 0, 0, 'Yes', 'Bicili', 'Dr. InamUllah Wazir', 'Research Officer'),
(15, 141120, 2, 93, 3, 'Nil', '4', 'Nil', 'Female', '2', '6', '20', 20, NULL, 'DD L&DD(Ext) District Swat', 'District Director - L&DD(Ext) Swat', '2020-11-17', '2020-11-17', 1, '2020-11-17', ' Nil', 'Nil', NULL, '50.00', 'Nil', 0, '', NULL, 9, '2020-11-17 09:30:38', '2020-11-17 14:42:15', 0, 0, 10, 10, 'Yes', 'Bicili', 'Dr. InamUllah Wazir', 'Research Officer'),
(16, 151120, 6, 94, 4, 'Nil', '5', 'Nil', 'Female', '3', '0', '12', 5, NULL, 'nill', 'nill', '2020-11-17', '2020-11-17', 1, '2020-11-17', ' Nil', 'Nil', NULL, '150.00', 'Nil', 0, '', NULL, 9, '2020-11-17 09:53:08', '2020-11-17 15:04:49', 0, 0, 0, 5, 'Yes', 'Mastitis', 'Dr. InamUllah Wazir', 'Research Officer'),
(17, 161120, 1, 95, 5, 'Nil', '1', 'Nil', 'Female', '3', '6', '2', 10, NULL, 'nill', 'nill', '2020-11-17', '2020-11-17', 1, '2020-11-17', ' Nil', 'Symptoms Here', NULL, '50.00', 'Additional Information Here', 0, '', NULL, 9, '2020-11-17 10:38:20', '2020-11-17 15:44:34', 10, 0, 0, 0, 'N/A', 'Not Applicable', 'Dr. InamUllah Wazir', 'Research Officer'),
(18, 171120, 5, 96, 4, 'No Specimen Detail', '1', 'Nil', 'Female', '4', '0', '5', 5, NULL, 'nill', 'nill', '2020-11-17', '2020-11-17', 1, '2020-11-17', 'No Remarks ', 'No Symptoms', NULL, '150.00', 'No Additional Information', 0, '', NULL, 9, '2020-11-17 10:49:12', '2020-11-17 15:54:21', 5, 0, 0, 0, 'N/A', 'Not Applicable', 'Dr. InamUllah Wazir', 'Research Officer'),
(19, 181120, 7, 97, 4, 'No Specimen Details', '', '', 'Female', '', '0', '', 0, NULL, 'HMC', 'RMO', '2020-11-18', '2020-11-18', 1, '2020-11-18', ' No Remarks', 'Fever / Pain.', NULL, '100', 'No Additional Information', 0, '', NULL, 2, '2020-11-18 05:16:45', '2020-11-18 10:29:48', 0, 0, 0, 0, 'No', 'No disease found.', 'Dr. Muhammad Shahid', 'Research Officer'),
(20, 191120, 7, 98, 4, 'No Specimen Details', '', '', 'Male', '', '0', '', 0, NULL, 'KTH', 'RMO', '2020-11-18', '2020-11-18', 1, '2020-11-18', ' Brucella antigen found positive in the patient specimen.', 'Fever', NULL, '100', 'No Additional Information', 0, '', NULL, 2, '2020-11-18 05:37:08', '2020-11-18 10:41:33', 0, 0, 0, 0, 'Yes', 'Brucella', 'Dr. Muhammad Shahid', 'Research Officer'),
(21, 201120, 4, 99, 1, 'No Sample Details', '2', 'Nil', 'Female', '5', '6', '17', 6, NULL, 'nill', 'nill', '2020-11-18', '2020-11-18', 1, '2020-11-18', ' No Remarks!', 'No Symptoms', NULL, '20', 'No Additional Information', 0, '', NULL, 2, '2020-11-18 06:03:14', '2020-11-18 14:51:41', 0, 6, 0, 0, 'Yes', 'Mastitis', 'Dr. Kamran', 'Research Officer'),
(22, 211120, 4, 100, 1, 'No Specimen Detail', '1', 'Nil', 'Female', '5', '6', '2', 1, NULL, 'nill', 'nill', '2020-11-18', '2020-11-18', 1, '2020-11-18', ' Mastitis found in the specimen of the Cow.', 'No Symptoms', NULL, '20', 'No Additional Info', 0, '', NULL, 2, '2020-11-18 10:09:02', '2020-11-18 15:10:15', 1, 0, 0, 0, 'Yes', 'Mastitis', 'Dr. Kamran', 'Research Officer'),
(23, 221120, 8, 101, 4, 'No Speciment Detail', '2', 'Nil', 'Female', '5', '0', '17', 1, NULL, 'nill', 'nill', '2020-11-18', '2020-11-18', 1, '2020-11-18', ' No Antigen of Brucellosis found.', 'No Symptoms.', NULL, '199.00', 'No Additional Information.', 0, '', NULL, 2, '2020-11-18 10:23:56', '2020-11-18 15:26:14', 0, 1, 0, 0, 'No', 'No disease found.', 'Dr. Muhammad Shahid', 'Research Officer'),
(24, 231120, 9, 102, 1, 'No Specimen Detail', '1', 'Nil', 'Female', '6', '0', '14', 1, NULL, 'Self', 'Self', '2020-11-19', NULL, 0, NULL, NULL, 'No Symptoms', NULL, '100.00', 'No Additional Information', 0, '', NULL, 2, '2020-11-19 08:19:30', NULL, 1, 0, 0, 0, NULL, NULL, NULL, NULL),
(25, 241120, 7, 103, 4, 'No Specimen Detail', '', '', 'Male', '', '0', '', 0, NULL, 'Self', 'Self', '2020-11-19', '2020-11-27', 1, '2020-11-27', ' Remarks', 'No History', NULL, '100', 'No Additional Information', 0, '', NULL, 2, '2020-11-19 09:44:18', '2020-11-27 02:30:30', 0, 0, 0, 0, 'Yes', 'Positive', 'Dr. InamUllah Wazir', 'Research Officer'),
(26, 251120, 4, 104, 1, 'No Specimen Detail', '2', 'Nil', 'Female', '4', '0', '17', 1, NULL, 'nill', 'nill', '2020-11-20', '2020-11-20', 1, '2020-11-20', ' Clinical Mastitis found. Referred to Bacteriology Lab for Culture Sensitivity.', 'No History/Symptoms', NULL, '20', 'No Additional Info', 0, '', NULL, 8, '2020-11-20 06:08:36', '2020-11-20 15:45:42', 0, 1, 0, 0, 'Yes', 'Mastitis', 'Dr. Kamran', 'Research Officer'),
(27, 261120, 3, 105, 7, 'No Specimen Detail', '1', 'Nil', 'Female', '5', '0', '6', 8, NULL, 'Parasitology Section, CMB, VRI Peshawar', 'Research Officer', '2020-11-20', '2020-11-20', 1, '2020-11-20', ' TB found Positive', 'No Symptoms', NULL, '25', 'No Additional Info', 0, '', NULL, 7, '2020-11-20 09:45:46', '2020-11-20 14:50:27', 5, 1, 1, 1, 'Yes', 'TB', 'Dr. Maleeha Anwar', 'Research Officer'),
(28, 271120, 4, 106, 1, 'No Specimen Detail', '2', 'Nil', 'Female', '4', '0', '15', 1, NULL, 'nill', 'nill', '2020-11-20', '2020-11-20', 1, '2020-11-20', ' Mastitis found in Moderate level.', 'No Symptoms', NULL, '20', 'No Additional Info', 0, '', NULL, 8, '2020-11-20 10:37:51', '2020-11-20 15:43:09', 0, 1, 0, 0, 'Yes', 'Mastitis', 'Dr. Kamran', 'Research Officer'),
(29, 281120, 4, 107, 1, 'No Specimen Detail', '1', 'Nil', 'Female', '5', '0', '14', 1, NULL, 'nill', 'nill', '2020-11-20', '2020-11-20', 1, '2020-11-20', ' Mastitis found.', 'Nil', NULL, '20', 'Nil', 0, '', NULL, 8, '2020-11-20 10:49:41', '2020-11-20 15:51:19', 1, 0, 0, 0, 'Yes', 'Mastitis', 'Dr. Kamran', 'Research Officer'),
(30, 291120, 2, 108, 2, 'No specimen detail', '3', 'Nil', 'Male', '2', '0', '25', 1, NULL, 'nill', 'nill', '2020-11-20', '2020-11-20', 1, '2020-11-20', ' Bicili Bacteria found the sample of Dog.', 'No Symptoms', NULL, '50', 'No Additional Info', 0, '', NULL, 9, '2020-11-20 10:56:53', '2020-11-20 16:00:12', 0, 0, 0, 0, 'N/A', 'Not Applicable', 'Dr. Inam Ullah Wazir', 'Research Officer'),
(31, 301120, 5, 109, 4, 'Nil', '1', '102', 'Female', '3', '6', '7', 1, NULL, 'Dr. Barkat Khan', 'Station Director', '2020-11-20', '2020-11-20', 1, '2020-11-20', ' Nil', 'Nil', NULL, '500', 'Nil', 0, '', NULL, 9, '2020-11-20 11:04:29', '2020-11-20 16:06:36', 1, 0, 0, 0, 'N/A', 'Not Applicable', 'Dr. Inam Ullah Wazir', 'Research Officer'),
(32, 311120, 5, 110, 4, 'Nil', '3', 'T-56(2020)', 'Male', '3', '4', '25', 1, NULL, 'nill', 'nill', '2020-11-20', '2020-11-20', 1, '2020-11-20', ' Nill', 'Nil', NULL, '500', 'nil', 0, '', NULL, 9, '2020-11-20 11:09:19', '2020-11-20 16:11:39', 0, 0, 0, 0, 'N/A', 'Not Applicable', 'Dr. Inam Ullah Wazir', 'Research Officer'),
(33, 321120, 5, 111, 4, 'No Specimen Detail', '4', 'Nil', 'Female', '2', '6', '18', 13, NULL, 'nill', 'nill', '2020-11-23', '2020-11-23', 1, '2020-11-23', ' Hndd', 'No Symptoms', NULL, '500', 'No Additional Info', 0, '', NULL, 9, '2020-11-23 07:00:59', '2020-11-23 12:03:28', 0, 0, 10, 3, 'N/A', 'Not Applicable', 'Dr. Inam Ullah Wazir', 'Research Officer'),
(34, 331120, 1, 112, 5, 'No Specimen Detail', '1', 'Nil', 'Female', '4', '6', '7', 6, NULL, 'nill', 'nill', '2020-11-23', '2020-11-23', 1, '2020-11-23', ' ? found.', 'No Symptoms', NULL, '500', 'No Additional Info', 0, '', NULL, 9, '2020-11-23 07:17:03', '2020-11-23 12:22:14', 5, 1, 0, 0, 'N/A', 'Not Applicable', 'Dr. Inam Ullah Wazir', 'Research Officer'),
(35, 341120, 7, 113, 4, 'No Specimen Detail', '', '', 'Female', '', '0', '', 0, NULL, 'HMC', 'RMO', '2020-11-23', '2020-11-23', 1, '2020-11-23', ' No Brucella Antigen found after SPAT Test for Brucella for Human Sample.', 'Nil', NULL, '100', 'No Additional Info', 0, '', NULL, 11, '2020-11-23 08:29:47', '2020-11-23 13:35:19', 0, 0, 0, 0, 'No', 'Negative', 'Dr. Muhammad Shahid', 'Research Officer'),
(36, 351120, 8, 114, 4, 'No Specimen Detail', '2', 'Nil', 'Female', '5', '0', '17', 1, NULL, 'Self', 'Nil', '2020-11-23', '2020-11-23', 1, '2020-11-23', ' Brucella Antigen not found after RBPT Test for Brucella (for Animal Blood Sample)', 'Nil', NULL, '100', 'Nil', 0, '', NULL, 11, '2020-11-23 08:56:00', '2020-11-23 14:00:24', 0, 1, 0, 0, 'No', 'Negative', 'Dr. Muhammad Shahid', 'Research Officer'),
(37, 361120, 9, 115, 1, 'No Specimen Detail', '1', 'Nil', 'Female', '6', '0', '14', 1, NULL, 'Self', 'nill', '2020-11-23', '2020-11-23', 1, '2020-11-23', ' No Brucella Antigen found after MRT test (for Animal Milk sample).', 'Nil', NULL, '100', 'Nil', 0, '', NULL, 11, '2020-11-23 09:11:12', '2020-11-23 14:17:29', 1, 0, 0, 0, 'No', 'Negative', 'Dr. Muhammad Shahid', 'Research Officer'),
(38, 371120, 10, 116, 4, 'No Specimen Detail', '', '', 'Female', '', '0', '', 0, NULL, 'KTH', 'RMO', '2020-11-23', '2020-11-23', 1, '2020-11-23', ' No Brucella Antigen found by i-ELISA (IgG) test for Human.', 'Nil', NULL, '500', 'Nil', 0, '', NULL, 11, '2020-11-23 09:48:20', '2020-11-23 14:53:35', 0, 0, 0, 0, 'No', 'Negative', 'Dr. Muhammad Shahid', 'Research Officer'),
(39, 381120, 11, 117, 4, 'No Specimen Detail', '1', '17', 'Female', '3', '0', '2', 100, NULL, 'nill', 'nill', '2020-11-23', '2020-11-23', 1, '2020-11-23', ' Brucellosis antigen found after i-ELISA test (for Animal).', 'Nil', NULL, '500', 'Nil', 0, '', NULL, 11, '2020-11-23 10:20:54', '2020-11-23 15:25:02', 100, 0, 0, 0, 'Yes', 'Brucellosis', 'Dr. Muhammad Shahid', 'Research Officer'),
(40, 391120, 12, 118, 4, 'No Specimen Detail', '', '', 'Female', '', '0', '', 0, NULL, 'KTH', 'nill', '2020-11-23', '2020-11-23', 1, '2020-11-23', 'Brucella Antigen no found by conducting PCR for Brucellosis Test.', 'Nil', NULL, '1000', 'Nil', 0, '', NULL, 11, '2020-11-23 10:54:39', '2020-11-23 16:03:59', 0, 0, 0, 0, 'No', 'Negative', 'Dr. Muhammad Shahid', 'Research Officer'),
(41, 401120, 13, 119, 4, 'No Specimen Detail', '1', 'Nil', 'Female', '4', '0', '2', 1, NULL, 'Dr. Meezan', 'nill', '2020-11-23', '2020-11-23', 1, '2020-11-23', ' Brucellosis antigen found after PCR (for Animal sample).', 'Nil', NULL, '1000', 'Nil', 0, '', NULL, 11, '2020-11-23 11:26:23', '2020-11-23 16:29:25', 1, 0, 0, 0, 'Yes', 'Brucellosis', 'Dr. Muhammad Shahid', 'Research Officer'),
(42, 411120, 7, 120, 4, 'No Specimen Detail', '', '', 'Female', '', '0', '', 0, NULL, 'KTH', 'nill', '2020-11-27', NULL, 0, NULL, NULL, 'Nil', NULL, '100', 'Nil', 0, '', NULL, 11, '2020-11-26 22:13:07', NULL, 0, 0, 0, 0, NULL, NULL, NULL, NULL),
(43, 421120, 16, 121, 1, 'No Specimen Detail', '1', 'Nil', 'Female', '4', '0', '7', 10, NULL, 'L&DD(Ext)', 'nill', '2020-11-27', '2020-11-27', 1, '2020-11-27', 'Clinical Mastitis found in the milk sample.', 'No History', NULL, '20', 'No Additional Info', 0, '', NULL, 12, '2020-11-26 22:42:34', '2020-11-27 11:03:58', 10, 0, 0, 0, 'Yes', 'Mastitis', 'Dr. Kamran', 'Research Officer'),
(44, 431120, 17, 122, 1, 'No Specimen Detail', '1', 'Nil', 'Female', '5', '0', '2', 4, NULL, 'Dr. Safdar L&DD(Ext)', 'District Director - L&DD(Ext) Abbottabad', '2020-11-27', '2021-01-06', 1, '2021-01-06', 'this is test Remarks and Description', 'No Symptoms', NULL, '20', 'No Additional Info', 0, '', NULL, 2, '2020-11-27 06:40:46', '2021-01-06 13:25:48', 4, 0, 0, 0, 'No', '', 'Dr. Test Dr', 'Test Designation'),
(45, 441120, 16, 109, 1, 'No Specimen Detail', '2', 'Nil', 'Female', '5', '5', '17', 7, NULL, 'Dr. Barkat Khan ', 'Station Director', '2020-11-27', '2020-11-27', 1, '2020-11-27', ' Sub Clinical Mastitis found of +++ severity.', 'Symptoms', NULL, '20', 'No Additional Info', 0, '', NULL, 12, '2020-11-27 07:38:19', '2020-11-27 12:42:45', 0, 5, 0, 2, 'Yes', 'Mastitis', 'Dr. Kamran', 'Research Officer'),
(46, 451120, 4, 123, 1, 'No Specimen Detail', '1', 'Nil', 'Female', '5', '0', '7', 2, NULL, 'DD-L&DD(Ext) Peshawar', 'Nil', '2020-11-27', '2020-12-01', 1, '2020-12-01', ' llgfg', 'No Symptoms', NULL, '20', 'No Additional Info', 0, '', NULL, 2, '2020-11-27 09:13:26', '2020-12-01 02:44:09', 2, 0, 0, 0, 'Yes', 'Mastitis', 'Dr. Kamran', 'Research Officer'),
(47, 461120, 3, 27, 7, 'Nil', '1', 'Nil', 'Female', '4', '0', '7', 2, NULL, 'nill', 'nill', '2020-11-27', '2020-11-30', 1, '2020-11-30', ' TB found Positive', 'No Symptoms', NULL, '25', 'No Additional Info', 0, '', NULL, 2, '2020-11-27 09:24:37', '2020-11-30 10:25:59', 2, 0, 0, 0, 'Yes', 'TB', 'Dr. Maleeha Anwar', 'Research Officer'),
(48, 471120, 4, 27, 1, 'Nil', '2', 'Nil', 'Female', '2', '0', '15', 5, NULL, 'nill', 'nill', '2020-11-27', '2020-11-28', 1, '2020-11-28', ' Mastitis found.', 'Nil', NULL, '20', 'Nil', 0, '', NULL, 2, '2020-11-27 09:32:52', '2020-11-28 15:16:37', 2, 3, 0, 0, 'Yes', 'Mastitis', 'Dr. Kamran', 'Research Officer'),
(49, 481220, 7, 124, 4, 'No Detail', '', '', 'Male', '', '4', '', 0, NULL, 'nill', 'nill', '2020-12-01', NULL, 0, NULL, NULL, 'No Symptoms', NULL, '100', 'No Info', 0, '', NULL, 11, '2020-11-30 22:19:49', NULL, 0, 0, 0, 0, NULL, NULL, NULL, NULL),
(50, 491220, 7, 27, 4, 'No Specimen Detail', '', '', 'Male', '', '0', '', 0, NULL, 'nill', 'nill', '2020-12-01', '2020-12-01', 1, '2020-12-01', 'Brucellosis Antigen found in the blood sample of human after SPAT Test.', 'No Symptoms', NULL, '100', 'No Additional Info', 0, '', NULL, 11, '2020-12-01 09:35:55', '2020-12-01 14:42:30', 0, 0, 0, 0, 'Yes', 'Brucellosis', 'Dr. Kamran', 'Research Officer'),
(51, 501220, 7, 27, 4, 'Nil', '', '', 'Male', '', '0', '', 0, NULL, 'nill', 'nill', '2020-12-01', NULL, 0, NULL, NULL, 'Nil', NULL, '100', 'Nil', 0, '', NULL, 11, '2020-12-01 11:10:22', NULL, 0, 0, 0, 0, NULL, NULL, NULL, NULL),
(52, 511220, 8, 27, 4, 'No Detial', '1', 'Nil', 'Female', '5', '0', '14', 2, NULL, 'nill', 'nill', '2020-12-01', '2020-12-01', 1, '2020-12-01', ' Brucella Antigen found in the provided Blood specimen of the Cow after RBPT Test.', 'No Symptoms', NULL, '100', 'No Additional Info', 0, '', NULL, 11, '2020-12-01 11:27:30', '2020-12-01 16:30:38', 2, 0, 0, 0, 'Yes', 'Brucellosis', 'Dr. Muhammad Shahid', 'Research Officer'),
(53, 521220, 3, 27, 7, 'No Detail', '1', 'Nil', 'Female', '5', '0', '7', 5, NULL, 'Dr. Sabz Ali L&DD(Ext)', 'Veterinary Officer - CVH Peshawar', '2020-12-02', '2020-12-02', 1, '2020-12-02', ' TB found in the sample.', 'No Symptoms', NULL, '25', 'No Additional Info', 0, '', NULL, 7, '2020-12-02 05:13:03', '2020-12-02 12:54:54', 5, 0, 0, 0, 'Yes', 'TB', 'Dr. Maleeha Anwar', 'Research Officer'),
(54, 531220, 3, 125, 1, 'No Detail', '1', 'Nil', 'Female', '5', '0', '7', 10, NULL, 'DD - L&DD(Ext) Nowshera', 'District Director ', '2020-12-02', '2020-12-02', 1, '2020-12-02', ' TB found in the sample.', 'No Symptoms', NULL, '25', 'No Additional Information', 0, '', NULL, 7, '2020-12-02 08:05:48', '2020-12-02 13:07:25', 10, 0, 0, 0, 'Yes', 'TB', 'Dr. Maleeha Anwar', 'Research Officer'),
(55, 541220, 9, 126, 1, 'Nil', '2', 'Nil', 'Female', '6', '0', '17', 3, NULL, 'Self', 'nill', '2020-12-02', '2020-12-02', 1, '2020-12-02', ' The processed sample of animal is found Negative for Brucella Antigen.', 'Nil', NULL, '100', 'Nil', 0, '', NULL, 11, '2020-12-02 08:55:33', '2020-12-02 13:57:08', 0, 3, 0, 0, 'No', '', 'Dr. Muhammad Shahid', 'Research Officer'),
(56, 551220, 7, 27, 4, 'Nil', '', '', 'Male', '', '0', '', 0, NULL, 'KTH', 'Medical Specialist', '2020-12-02', '2020-12-02', 1, '2020-12-02', ' Brucella Antigen found in SPAT test.', 'No Symptoms', NULL, '100', 'No Additional Information', 0, '', NULL, 11, '2020-12-02 09:02:31', '2020-12-02 14:03:43', 0, 0, 0, 0, 'Yes', 'Brucellosis', 'Dr. Muhammad Shahid', 'Research Officer'),
(57, 561220, 8, 27, 4, 'Nil', '2', 'Nil', 'Female', '8', '6', '17', 5, NULL, 'HMC', 'nill', '2020-12-02', '2020-12-02', 1, '2020-12-02', ' Brucella Antigen found in specimen.', 'Nil', NULL, '100', 'Nil', 0, '', NULL, 11, '2020-12-02 09:19:25', '2020-12-02 14:20:37', 0, 5, 0, 0, 'Yes', 'Brucellosis', 'Dr. Muhammad Shahid', 'Research Officer'),
(58, 571220, 10, 127, 4, 'Nil', '', '', 'Female', '', '0', '', 0, NULL, 'KTH', 'Hospital Director', '2020-12-02', '2020-12-02', 1, '2020-12-02', ' Brucella Antigen not found in the specimen.', 'Nil', NULL, '500', 'Nil', 0, '', NULL, 11, '2020-12-02 09:30:01', '2020-12-02 14:33:41', 0, 0, 0, 0, 'No', '', 'Dr. Muhammad Shahid', 'Research Officer'),
(59, 581220, 11, 128, 4, 'Nil', '1', 'Nil', 'Female', '4', '0', '2', 4, NULL, 'Self', 'nill', '2020-12-02', '2020-12-02', 1, '2020-12-02', ' Brucella Antigen found in the sample by i-ELISA for Brucellosis (Animal).', 'Nil', NULL, '500', 'Nil', 0, '', NULL, 11, '2020-12-02 09:39:44', '2020-12-02 14:41:31', 0, 4, 0, 0, 'Yes', 'Brucellosis', 'Dr. Muhammad Shahid', 'Research Officer'),
(60, 591220, 12, 129, 4, 'Nil', '', '', 'Female', '', '0', '', 0, NULL, 'KTH', 'Hospital Director', '2020-12-02', '2020-12-02', 1, '2020-12-02', 'Not found Brucella Antigen on PCR for Human.', 'Nil', NULL, '1000', 'Nil', 0, '', NULL, 11, '2020-12-02 09:45:49', '2020-12-02 14:47:43', 0, 0, 0, 0, 'No', '', 'Dr. Muhammad Shahid', 'Research Officer'),
(61, 601220, 13, 130, 4, 'Nil', '1', 'Nil', 'Female', '4', '0', '4', 3, NULL, 'Dr. Meezan', 'nill', '2020-12-02', '2020-12-02', 1, '2020-12-02', ' Brucella Antigen no t found.', 'Nil', NULL, '1000', 'Nil', 0, '', NULL, 11, '2020-12-02 09:56:26', '2020-12-02 14:57:29', 3, 0, 0, 0, 'No', '', 'Dr. Muhammad Shahid', 'Research Officer'),
(62, 611220, 4, 131, 1, 'Nil', '1', 'Nil', 'Female', '3', '0', '6', 3, NULL, 'Self', 'nill', '2020-12-02', '2020-12-02', 1, '2020-12-02', ' Clinical Mastitis found in the milk sample.', 'Nil', NULL, '20', 'Nil', 0, '', NULL, 8, '2020-12-02 10:07:18', '2020-12-02 15:12:57', 3, 0, 0, 0, 'Yes', 'Mastitis', 'Dr. Kamran', 'Research Officer'),
(63, 621220, 4, 132, 1, 'Nil', '2', 'Nil', 'Female', '6', '0', '17', 5, NULL, 'Self', 'nill', '2020-12-02', '2020-12-02', 1, '2020-12-02', 'Sub-Clinical Mastitis found with a severity of +++.', 'Nil', NULL, '20', 'Nil', 0, '', NULL, 8, '2020-12-02 10:56:44', '2020-12-02 16:03:05', 2, 3, 0, 0, 'Yes', 'Mastitis', 'Dr. Kamran', 'Research Officer'),
(64, 631220, 4, 133, 1, 'Nil', '4', 'Nil', 'Female', '3', '0', '18', 23, NULL, 'Self', 'nill', '2020-12-02', '2020-12-02', 1, '2020-12-02', ' Mastitis found  as in the above teat.', 'Nil', NULL, '20', 'Nil', 0, '', NULL, 8, '2020-12-02 11:20:49', '2020-12-02 16:25:02', 2, 1, 10, 10, 'Yes', 'Mastitis', 'Dr. Kamran', 'Research Officer'),
(65, 641220, 2, 134, 2, 'Nil', '1', 'Nil', 'Female', '5', '0', '7', 19, NULL, 'Self', 'nill', '2020-12-03', '2020-12-03', 1, '2020-12-03', ' Bicili Bacteria found in the Impression Smear of the provided sample of liver.', 'Nil', NULL, '50', 'Nil', 0, '', NULL, 9, '2020-12-03 05:30:41', '2020-12-03 10:50:34', 2, 5, 2, 10, 'N/A', '', 'Dr. Inam Ullah Wazir', 'Research Officer'),
(66, 651220, 1, 135, 5, 'Nil', '2', 'Nil', 'Female', '5', '0', '17', 3, NULL, 'Self', 'nill', '2020-12-03', '2020-12-03', 1, '2020-12-03', ' ', 'Nil', NULL, '50', 'Nil', 0, '', NULL, 9, '2020-12-03 06:08:25', '2020-12-03 11:13:30', 0, 3, 0, 0, 'N/A', '', 'Dr. Inam Ullah Wazir', 'Research Officer'),
(67, 661220, 6, 136, 1, 'Nil', '1', 'Nil', 'Female', '4', '0', '14', 6, NULL, 'Self', 'nill', '2020-12-03', '2020-12-03', 1, '2020-12-03', 'Sensitive for Amoxicillin.', 'Nil', NULL, '150', 'Nil', 0, '', NULL, 9, '2020-12-03 06:20:27', '2020-12-03 12:15:02', 6, 0, 0, 0, 'N/A', '', 'Dr. Inam Ullah Wazir', 'Research Officer'),
(68, 671220, 5, 137, 4, 'Nil', '1', 'Nil', 'Female', '4', '0', '5', 16, NULL, 'Self', 'nill', '2020-12-03', '2020-12-03', 1, '2020-12-03', ' Remarks Here', 'Nil', NULL, '150', 'Nil', 0, '', NULL, 9, '2020-12-03 07:28:53', '2020-12-03 12:30:44', 4, 4, 2, 4, 'N/A', '', 'Dr. Inam Ullah Wazir', 'Research Officer'),
(69, 681220, 7, 138, 4, 'Nil', '', '', 'Male', '', '0', '', 0, NULL, 'KTH', 'nill', '2020-12-03', '2020-12-03', 1, '2020-12-03', ' Brucella antigen found in the blood sample.', 'Nil', NULL, '100', 'Nil', 0, '', NULL, 11, '2020-12-03 08:27:17', '2020-12-03 13:30:05', 0, 0, 0, 0, 'Yes', 'Brucellosis', 'Dr. Muhammad Shahid', 'Research Officer'),
(70, 691220, 4, 27, 1, 'Nil', '1', 'Nil', 'Female', '5', '0', '14', 6, NULL, 'Self', 'nill', '2020-12-03', '2020-12-03', 1, '2020-12-03', ' Clinical Mastitis found in the specimen. Forwarded to Pathology & Bacteriology Laboratory for Culture Sensitivity.', 'Nil', NULL, '20', 'Nil', 0, '', NULL, 8, '2020-12-03 09:19:38', '2020-12-03 14:21:37', 3, 3, 0, 0, 'Yes', 'Mastitis', 'Dr. Kamran', 'Research Officer'),
(71, 701220, 1, 27, 5, 'Nil', '1', 'Nil', 'Female', '5', '0', '4', 0, NULL, 'nill', 'nill', '2020-12-03', NULL, 0, NULL, NULL, 'Nil', NULL, '50', 'Nil', 0, '', NULL, 9, '2020-12-03 10:37:01', NULL, 0, 0, 0, 0, NULL, NULL, NULL, NULL),
(72, 711220, 4, 27, 1, 'Nil', '1', 'Nil', 'Female', '4', '0', '2', 3, NULL, 'nill', 'nill', '2020-12-03', '2020-12-03', 1, '2020-12-03', ' kjg', 'Nil', NULL, '20', 'Nil', 0, '', NULL, 8, '2020-12-03 10:55:18', '2020-12-03 15:59:10', 3, 0, 0, 0, 'Yes', 'Mastitis', 'Dr. Muhammad Shahid', 'Research Officer'),
(73, 721220, 5, 27, 4, 'Nil', '9', 'Nil', 'Male', '0', '6', '27', 10, NULL, 'Self', 'nill', '2020-12-04', '2020-12-04', 1, '2020-12-04', ' The values Gran#, Gran%, MCV, RDW & MPV are High . Values of Lymph%, RBC, HGB, HCT MCHC are Low from their normal ranges while the remaining parameters are found Normal.', 'Nil', NULL, '150', 'Nil', 0, '', NULL, 9, '2020-12-04 06:04:13', '2020-12-04 11:12:23', 0, 0, 0, 0, 'N/A', '', 'Dr. Inam Ullah Wazir', 'Research Officer'),
(74, 731220, 5, 27, 4, 'Nil', '6', 'Nil', 'Female', '0', '4', '28', 5, NULL, 'Self', 'nill', '2020-12-04', '2020-12-04', 1, '2020-12-04', ' In the above parameters, the value of only MPV parameter is High, the values of Lymph#, HGB, MCH & MCHC are Low  from their Normal Ranges, while values of the remaining parameters are Normal.', 'Nil', NULL, '150', 'Nil', 0, '', NULL, 9, '2020-12-04 06:49:28', '2020-12-04 11:56:12', 0, 0, 0, 0, 'N/A', '', 'Dr. Inam Ullah Wazir', 'Research Officer'),
(75, 741220, 5, 27, 4, 'Nil', '1', 'Nil', 'Female', '2', '0', '7', 10, NULL, 'Self', 'nill', '2020-12-04', '2020-12-04', 1, '2020-12-04', ' In the above parameter values of MCV & MPV are High, values of HGB & MCHC are Low from their Normal Ranges while the remaining parameters are Normal.', 'Nil', NULL, '150', 'Nil', 0, '', NULL, 9, '2020-12-04 07:31:15', '2020-12-04 12:36:48', 10, 0, 0, 0, 'N/A', '', 'Dr. Inam Ullah Wazir', 'Research Officer'),
(76, 751220, 5, 27, 4, 'Nil', '2', 'Nil', 'Female', '2', '0', '17', 5, NULL, 'Self', 'nill', '2020-12-04', '2020-12-04', 1, '2020-12-04', ' In the above parameters value of only PLT is High, value of HGB, MCH & MCHC are Low from their Normal Ranges, while the remaining parameters are Normal. ', 'Nil', NULL, '150', 'Nil', 0, '', NULL, 9, '2020-12-04 08:24:35', '2020-12-04 13:30:18', 0, 5, 0, 0, 'N/A', '', 'Dr. Inam Ullah Wazir', 'Research Officer'),
(77, 761220, 5, 27, 4, 'Nil', '7', 'Nil', 'Male', '3', '0', '34', 4, NULL, 'Self', 'nill', '2020-12-04', '2020-12-04', 1, '2020-12-04', ' slfsldjf sdfjsldkfnlskdfn', 'Nil', NULL, '150', 'Nil', 0, '', NULL, 9, '2020-12-04 09:00:29', '2020-12-04 14:03:28', 0, 0, 0, 0, 'N/A', '', 'Dr. Inam Ullah Wazir', 'Research Officer'),
(78, 771220, 5, 27, 4, 'Nil', '4', 'Nil', 'Female', '3', '0', '18', 4, NULL, 'nill', 'nill', '2020-12-04', '2020-12-04', 1, '2020-12-04', ' Nil', 'Nil', NULL, '150', 'Nil', 0, '', NULL, 9, '2020-12-04 09:23:27', '2020-12-04 14:30:22', 0, 0, 4, 0, 'N/A', '', 'Dr. Inam Ullah Wazir', 'Research Officer'),
(79, 781220, 7, 27, 4, 'Nil', '', '', 'Female', '', '0', '', 0, NULL, 'nill', 'nill', '2020-12-08', NULL, 0, NULL, NULL, 'Nil', NULL, '100', 'Nil', 0, '', NULL, 11, '2020-12-08 06:50:18', NULL, 0, 0, 0, 0, NULL, NULL, NULL, NULL),
(80, 791220, 10, 27, 4, 'Nil', '1', 'Nil', 'Male', '5', '0', '4', 4, NULL, 'nill', 'nill', '2020-12-08', NULL, 0, NULL, NULL, 'Nil', NULL, '500', 'Nil', 0, '', NULL, 11, '2020-12-08 07:18:43', NULL, 4, 0, 0, 0, NULL, NULL, NULL, NULL),
(81, 801220, 2, 27, 10, 'Nil', '1', 'Nil', 'Female', '5', '0', '14', 3, NULL, 'nill', 'nill', '2020-12-08', '2020-12-08', 1, '2020-12-08', ' Bicili Bacteria was observed in the impression smear after Gram Staining.', 'Nil', NULL, '50', 'Nil', 0, '', NULL, 9, '2020-12-08 07:34:44', '2020-12-08 12:36:13', 3, 0, 0, 0, 'N/A', '', 'Dr. Inam Ullah Wazir', 'Research Officer'),
(82, 811220, 4, 27, 1, 'Nil', '1', 'Nil', 'Female', '4', '0', '2', 3, NULL, 'nill', 'nill', '2020-12-08', '2020-12-08', 1, '2020-12-08', ' Sub-Clinical Mastitis found in the specimen.', 'Nil', NULL, '20', 'Nil', 0, '', NULL, 8, '2020-12-08 10:18:19', '2020-12-08 15:23:01', 3, 0, 0, 0, 'Yes', 'Mastitis', 'Dr. Kamran', 'Research Officer'),
(83, 821220, 4, 27, 1, 'Nil', '2', 'Nil', 'Female', '4', '0', '16', 7, NULL, 'nill', 'nill', '2020-12-08', '2020-12-08', 1, '2020-12-08', ' mstitis', 'Nil', NULL, '20', 'Nil', 0, '', NULL, 8, '2020-12-08 10:27:40', '2020-12-08 15:30:52', 0, 7, 0, 0, 'Yes', 'Mastitis', 'Dr. Kamran', 'Research Officer'),
(84, 831220, 4, 27, 1, 'Nil', '1', 'Nil', 'Female', '2', '0', '5', 8, NULL, 'nill', 'nill', '2020-12-08', '2020-12-08', 1, '2020-12-08', ' Mastitis found in two ', 'Nil', NULL, '20', 'Nil', 0, '', NULL, 8, '2020-12-08 10:34:58', '2020-12-08 15:37:07', 8, 0, 0, 0, 'Yes', 'Mastitis', 'Dr. Kamran', 'Research Officer');

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
(1, 'Impression Smear', 'Disease', 50, 0, 1, '2020-08-12 03:23:54'),
(2, 'Hematology', 'Disease', 150, 0, 1, '2020-08-12 03:23:54'),
(3, 'Mastitis Test', 'Disease', 20, 0, 1, '2020-08-12 03:23:54'),
(4, 'Culture Sensitivity', 'Disease', 150, 0, 1, '2020-08-12 03:23:54'),
(5, 'Urine Examination', 'Disease', 50, 0, 1, '2020-08-12 03:23:54'),
(6, 'MRT', 'Disease', 100, 0, 1, '2020-08-12 03:23:54'),
(7, 'RBPT', 'Disease', 100, 0, 1, '2020-08-12 03:23:54'),
(8, 'SPAT', 'Disease', 100, 0, 1, '2020-08-12 03:23:54'),
(9, 'Tuberculin Skin Test (TST)', 'Disease', 35, 0, 1, '2020-08-12 03:23:54'),
(10, 'Water Bacteriology', 'Disease', 200, 0, 2, '2020-09-29 20:18:57'),
(11, 'AFB Staining Test', 'Disease', 25, 0, 2, '2020-10-05 19:47:16'),
(12, 'i-ELISA for Brucellosis (Human)', 'Disease', 500, 0, 2, '2020-10-28 14:16:43'),
(13, 'i-ELISA for Brucellosis (Animal)', 'Disease', 500, 0, 2, '2020-10-28 14:16:58'),
(14, 'PCR for Brucellosis (Human)', 'Disease', 1000, 0, 2, '2020-10-28 14:17:24'),
(15, 'PCR for Brucellosis (Animal)', 'Disease', 1000, 0, 2, '2020-10-28 14:17:41');

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
(1, 3, 4, 4, 4, 5, 50, 'Urine Examination Test', 0, 2, '2020-09-24 07:47:24'),
(2, 3, 4, 4, 4, 1, 50, '  This is Impression Smear Test', 0, 2, '2020-09-24 07:49:23'),
(3, 3, 4, 3, 7, 11, 25, 'Acid Fast Staining Test', 0, 2, '2020-09-29 07:19:35'),
(4, 3, 4, 1, 5, 3, 20, ' This is Mastitis Tests Records', 0, 2, '2020-09-29 17:17:07'),
(5, 3, 4, 4, 4, 2, 150, ' Hematology Lab at Pathology & Bacteriology Section, CMB, VRI Peshawar', 0, 2, '2020-10-03 01:27:04'),
(6, 3, 4, 4, 4, 4, 150, ' ', 0, 2, '2020-10-16 09:58:06'),
(7, 3, 4, 5, 2, 8, 100, 'SPAT Test for Brucella (for Human Sample)', 0, 2, '2020-10-20 18:53:28'),
(8, 3, 4, 5, 2, 7, 100, '  RBPT Test for Brucella (for Animal Blood Sample)', 0, 2, '2020-10-26 16:22:11'),
(9, 3, 4, 5, 2, 6, 100, 'Brucellosis Laboratory', 0, 2, '2020-11-02 13:37:51'),
(10, 3, 4, 5, 2, 12, 500, 'i-ELISA Test for Brucellosis (for Human Sample)', 0, 2, '2020-11-02 13:40:42'),
(11, 3, 4, 5, 2, 13, 500, 'i-ELISA Test for Brucellosis (for Animal Sample)', 0, 2, '2020-11-02 13:41:14'),
(12, 3, 4, 5, 2, 14, 1000, 'PCR for Brucellosis Test (for Human Sample)', 0, 2, '2020-11-02 13:43:34'),
(13, 3, 4, 5, 2, 15, 1000, 'PCR for Brucellosis Test (for Animal Sample)', 0, 2, '2020-11-02 13:44:08'),
(14, 3, 7, 9, 11, 1, 0, 'Impression Smear Test', 0, 2, '2020-11-26 22:33:56'),
(15, 3, 7, 9, 11, 1, 100, 'Impression Smear Test', 0, 2, '2020-11-26 22:34:10'),
(16, 3, 7, 9, 11, 3, 20, 'Mastitis Test', 0, 2, '2020-11-26 22:34:59'),
(17, 3, 7, 9, 11, 3, 20, 'Mastitis Test', 0, 2, '2020-11-26 22:35:18'),
(18, 3, 7, 10, 13, 8, 100, 'SPAT Test for Brucella (for Human Sample)', 0, 2, '2020-11-27 10:55:20');

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
(5, 3, 1, 0, NULL, '2020-10-02 06:39:54'),
(6, 3, 7, 0, NULL, '2020-10-02 06:39:54'),
(15, 4, 1, 0, NULL, '2020-10-06 08:30:33'),
(93, 2, 1, 0, NULL, '2020-11-17 10:20:42'),
(94, 2, 2, 0, NULL, '2020-11-17 10:20:42'),
(95, 2, 3, 0, NULL, '2020-11-17 10:20:42'),
(96, 2, 4, 0, NULL, '2020-11-17 10:20:42'),
(97, 2, 5, 0, NULL, '2020-11-17 10:20:42'),
(98, 2, 6, 0, NULL, '2020-11-17 10:20:42'),
(99, 2, 7, 0, NULL, '2020-11-17 10:20:42'),
(100, 2, 8, 0, NULL, '2020-11-17 10:20:42'),
(101, 2, 9, 0, NULL, '2020-11-17 10:20:42'),
(102, 2, 10, 0, NULL, '2020-11-17 10:20:42'),
(103, 2, 11, 0, NULL, '2020-11-17 10:20:42'),
(104, 2, 12, 0, NULL, '2020-11-17 10:20:42'),
(105, 2, 13, 0, NULL, '2020-11-17 10:20:42'),
(106, 2, 14, 0, NULL, '2020-11-17 10:20:42'),
(107, 2, 15, 0, NULL, '2020-11-17 10:20:42'),
(108, 2, 16, 0, NULL, '2020-11-17 10:20:42'),
(109, 6, 1, 0, NULL, '2020-11-17 10:30:15'),
(110, 6, 2, 0, NULL, '2020-11-17 10:30:15'),
(111, 6, 3, 0, NULL, '2020-11-17 10:30:15'),
(112, 6, 4, 0, NULL, '2020-11-17 10:30:15'),
(113, 6, 5, 0, NULL, '2020-11-17 10:30:15'),
(114, 6, 6, 0, NULL, '2020-11-17 10:30:15'),
(115, 6, 7, 0, NULL, '2020-11-17 10:30:15'),
(116, 6, 8, 0, NULL, '2020-11-17 10:30:15'),
(117, 6, 9, 0, NULL, '2020-11-17 10:30:15'),
(118, 6, 10, 0, NULL, '2020-11-17 10:30:15'),
(119, 6, 11, 0, NULL, '2020-11-17 10:30:15'),
(120, 6, 12, 0, NULL, '2020-11-17 10:30:15'),
(121, 6, 13, 0, NULL, '2020-11-17 10:30:15'),
(122, 6, 14, 0, NULL, '2020-11-17 10:30:15'),
(123, 9, 1, 0, NULL, '2020-11-23 08:06:11'),
(132, 11, 1, 0, NULL, '2020-11-23 08:11:55'),
(133, 11, 4, 0, NULL, '2020-11-23 08:11:55'),
(134, 11, 15, 0, NULL, '2020-11-23 08:11:55'),
(135, 11, 16, 0, NULL, '2020-11-23 08:11:55'),
(136, 11, 17, 0, NULL, '2020-11-23 08:11:55'),
(137, 11, 18, 0, NULL, '2020-11-23 08:11:55'),
(138, 10, 1, 0, NULL, '2020-11-23 08:13:35'),
(139, 10, 4, 0, NULL, '2020-11-23 08:13:35'),
(140, 10, 15, 0, NULL, '2020-11-23 08:13:35'),
(141, 10, 16, 0, NULL, '2020-11-23 08:13:35'),
(142, 10, 17, 0, NULL, '2020-11-23 08:13:35'),
(143, 10, 18, 0, NULL, '2020-11-23 08:13:35'),
(144, 13, 1, 0, NULL, '2020-11-23 08:15:04'),
(145, 13, 4, 0, NULL, '2020-11-23 08:15:04'),
(146, 13, 15, 0, NULL, '2020-11-23 08:15:04'),
(147, 13, 16, 0, NULL, '2020-11-23 08:15:04'),
(148, 13, 17, 0, NULL, '2020-11-23 08:15:04'),
(149, 13, 18, 0, NULL, '2020-11-23 08:15:04'),
(150, 12, 1, 0, NULL, '2020-11-23 08:16:17'),
(151, 12, 4, 0, NULL, '2020-11-23 08:16:17'),
(152, 12, 15, 0, NULL, '2020-11-23 08:16:17'),
(153, 12, 17, 0, NULL, '2020-11-23 08:16:17'),
(154, 12, 18, 0, NULL, '2020-11-23 08:16:17'),
(155, 7, 4, 0, NULL, '2020-11-23 08:19:06'),
(156, 8, 4, 0, NULL, '2020-11-23 08:20:11'),
(157, 1, 5, 0, NULL, '2020-11-23 08:21:33'),
(158, 5, 1, 0, NULL, '2020-11-23 08:22:31'),
(159, 5, 2, 0, NULL, '2020-11-23 08:22:31'),
(160, 5, 3, 0, NULL, '2020-11-23 08:22:31'),
(161, 5, 4, 0, NULL, '2020-11-23 08:22:31'),
(162, 5, 5, 0, NULL, '2020-11-23 08:22:31'),
(163, 5, 6, 0, NULL, '2020-11-23 08:22:31'),
(164, 5, 7, 0, NULL, '2020-11-23 08:22:31'),
(165, 14, 1, 0, 2, '2020-11-26 22:33:56'),
(166, 14, 2, 0, 2, '2020-11-26 22:33:56'),
(167, 14, 3, 0, 2, '2020-11-26 22:33:56'),
(168, 14, 4, 0, 2, '2020-11-26 22:33:56'),
(169, 14, 5, 0, 2, '2020-11-26 22:33:56'),
(170, 14, 6, 0, 2, '2020-11-26 22:33:56'),
(171, 14, 7, 0, 2, '2020-11-26 22:33:56'),
(172, 14, 8, 0, 2, '2020-11-26 22:33:56'),
(173, 14, 9, 0, 2, '2020-11-26 22:33:56'),
(174, 14, 10, 0, 2, '2020-11-26 22:33:56'),
(175, 14, 11, 0, 2, '2020-11-26 22:33:56'),
(176, 14, 12, 0, 2, '2020-11-26 22:33:56'),
(177, 14, 13, 0, 2, '2020-11-26 22:33:56'),
(178, 14, 14, 0, 2, '2020-11-26 22:33:56'),
(179, 14, 15, 0, 2, '2020-11-26 22:33:56'),
(180, 14, 16, 0, 2, '2020-11-26 22:33:56'),
(181, 14, 17, 0, 2, '2020-11-26 22:33:56'),
(182, 14, 18, 0, 2, '2020-11-26 22:33:56'),
(183, 15, 1, 0, 2, '2020-11-26 22:34:10'),
(184, 15, 2, 0, 2, '2020-11-26 22:34:10'),
(185, 15, 3, 0, 2, '2020-11-26 22:34:10'),
(186, 15, 4, 0, 2, '2020-11-26 22:34:10'),
(187, 15, 5, 0, 2, '2020-11-26 22:34:10'),
(188, 15, 6, 0, 2, '2020-11-26 22:34:10'),
(189, 15, 7, 0, 2, '2020-11-26 22:34:10'),
(190, 15, 8, 0, 2, '2020-11-26 22:34:10'),
(191, 15, 9, 0, 2, '2020-11-26 22:34:10'),
(192, 15, 10, 0, 2, '2020-11-26 22:34:10'),
(193, 15, 11, 0, 2, '2020-11-26 22:34:10'),
(194, 15, 12, 0, 2, '2020-11-26 22:34:10'),
(195, 15, 13, 0, 2, '2020-11-26 22:34:10'),
(196, 15, 14, 0, 2, '2020-11-26 22:34:10'),
(197, 15, 15, 0, 2, '2020-11-26 22:34:10'),
(198, 15, 16, 0, 2, '2020-11-26 22:34:10'),
(199, 15, 17, 0, 2, '2020-11-26 22:34:10'),
(200, 15, 18, 0, 2, '2020-11-26 22:34:10'),
(201, 16, 1, 0, 2, '2020-11-26 22:34:59'),
(202, 17, 1, 0, 2, '2020-11-26 22:35:18'),
(203, 18, 4, 0, 2, '2020-11-27 10:55:20');

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

--
-- Dumping data for table `urine_examination`
--

INSERT INTO `urine_examination` (`urine_id`, `testDetails_id`, `colour`, `appearance`, `leukocytes`, `specific_gravity`, `glucose`, `protein`, `nitrite`, `urobilinogen`, `ketone_bodies`, `yeastFungi`, `bilirubin`, `ph`, `blood`, `pus_cell`, `epithelial_cell`, `rb_cs`, `casts`, `crystals`, `amorphous`, `parasites`, `bacteria`, `created_by`, `created_date`) VALUES
(1, 17, 'Brown', 'Transparent', 'Small', '3.788', 'Moderate', '100mg/dL', 'Positive', '4', 'Small', 'Nil', 'Moderate', 7.8, 'Hemolyzed', '2', '5', '3', 'Nil', 'Nil', 'Nil', 'Nil', 'Nil', 9, '2020-11-17 10:38:20'),
(2, 34, 'Red', 'Bloody', 'Small', '0.568', 'Trace', 'Trace', 'Positive', '2', 'Trace', 'Nil', 'Small', 8.58, 'Non-Hemolyzed', '2-3', '5', '2', '3', '1', 'Nil', 'Nil', 'Nil', 9, '2020-11-23 07:17:03'),
(3, 66, 'Red', 'Bloody', 'Small', '0.598', 'Large', '100mg/dL', 'Positive', '2', 'Small', 'Nil', 'Small', 8.95, 'Small', '2-3', '5', '2', '3', '1', 'Nil', 'Nil', 'Nil', 9, '2020-12-03 06:08:25'),
(4, 71, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 9, '2020-12-03 10:37:01');

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
(2, 4, 19, 8, 2, 'Mr. Arshad Ali Durrani', 'admin@gmail.com', '0315-9393788', '$2y$10$k0JniyM3CaDf7cQYnd.u6.QjGnACjhhEWAiUS.EUBwjJgDP4sQJmK', 1, 'Administrator', 'Male', '43China-Southern-Airlines-Cabin-Crew.jpg', 0, 1, 0, '2020-07-04 12:01:21', 1),
(6, 2, 4, 4, NULL, 'Dr Din Muhammad', 'ddm@gmail.com', '1233-3333333', '$2y$10$V0NJcM1gLHb43pjARvwIgupZadclxyS0W31eeFGO.5LfalaKRLjzG', 6, 'SRO', 'Male', '10airhosttess.jpg', 0, 1, 1, '2020-09-24 07:54:10', 2),
(7, 3, 4, 3, NULL, 'Dr. Maleeha Anwar', 'tbvph.cmb.vripsh@gmail.com', '1111-1111111', '$2y$10$ay6FDWPJnUAMY2IX5KvgRe8Nm6orKKlFAeQ2fi8vXo3C1t77DuBxK', 6, 'Research Officer (B-17)', 'Female', '34download.png', 0, 1, 0, '2020-09-29 07:16:05', 2),
(8, 3, 4, 1, NULL, 'Dr. Kamran', 'mastitis.cmb.vripsh@gmail.com', '0000-0000000', '$2y$10$1XvIWnYwhxOUvt.I8wzk1OQBkabnw5LLIDnFDUvAEunbIVfilu2R6', 6, 'Research Officer (B-17)', 'Male', '', 0, 1, 0, '2020-10-02 07:09:58', 2),
(9, 3, 4, 4, NULL, 'Dr. Inam Ullah Wazir', 'path&bac.cmb.vripsh@gmail.com', '0000-0000000', '$2y$10$ktU5O3KDY9UhSHM4MuXH3ekCPS/hrUAMlIDPvL9LPLGCwZuQ6boT.', 6, 'Research Officer (B-17)', 'Male', '56pic3.jpg', 0, 1, 0, '2020-10-03 01:37:50', 2),
(10, 3, 4, 3, NULL, 'Dr. Maleeha ', 'tb.cmb.vripsh@gmail.com', '5555-5555555', '$2y$10$5rEpQJjOrAADZbtAEO2rm.B0AbssIb/LM/ohEk8JwNJJcQNB4ss.y', 6, 'Research Officer (B-17)', 'Female', '', 0, 1, 1, '2020-10-05 09:52:00', 2),
(11, 3, 4, 5, NULL, 'Dr. Muhammad Shahid', 'brucella.cmb.vripsh@gmail.com', '0000-0000000', '$2y$10$3wa73dUKwm3QsHf0gPG.f.b9NxxETk19x3jpf1jNKN9JHE.AzC2ki', 6, 'Research Officer (B-17)', 'Male', '', 0, 1, 0, '2020-11-23 08:03:15', 2),
(12, 3, 7, 9, NULL, 'Mr. Murad Ali', 'vrdicabt@gmail.com', '0000-0000000', '$2y$10$AJ4kJqY6wQVEUQvVkkYpaOg/T7XWljmBZAWOVuAHgUWYR6wfopw.y', 6, 'Computer Operator', 'Male', '', 0, 1, 0, '2020-11-26 22:38:27', 2);

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
(22, 9, 4, '2020-10-09 00:12:56'),
(23, 11, 2, '2020-11-23 13:03:15'),
(24, 12, 11, '2020-11-27 03:38:27');

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
  MODIFY `afs_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `antibiotics`
--
ALTER TABLE `antibiotics`
  MODIFY `antibiotics_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `breeds`
--
ALTER TABLE `breeds`
  MODIFY `breed_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

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
  MODIFY `client_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=139;

--
-- AUTO_INCREMENT for table `culture_sensitivity`
--
ALTER TABLE `culture_sensitivity`
  MODIFY `culture_sensitivity_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

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
  MODIFY `elisa_animal_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `elisa_human`
--
ALTER TABLE `elisa_human`
  MODIFY `elisa_human_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `haematology`
--
ALTER TABLE `haematology`
  MODIFY `haematology_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `impression_smear`
--
ALTER TABLE `impression_smear`
  MODIFY `impression_smear_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `labs`
--
ALTER TABLE `labs`
  MODIFY `lab_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `mastitis`
--
ALTER TABLE `mastitis`
  MODIFY `mastitis_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `modules`
--
ALTER TABLE `modules`
  MODIFY `module_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `mrt`
--
ALTER TABLE `mrt`
  MODIFY `mrt_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `pcr_animal`
--
ALTER TABLE `pcr_animal`
  MODIFY `pcr_animal_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `pcr_human`
--
ALTER TABLE `pcr_human`
  MODIFY `pcr_human_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `rbpt`
--
ALTER TABLE `rbpt`
  MODIFY `rbpt_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

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
  MODIFY `sectionHelp_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `sections`
--
ALTER TABLE `sections`
  MODIFY `section_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `spat_human`
--
ALTER TABLE `spat_human`
  MODIFY `spat_human_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

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
  MODIFY `testDetails_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=85;

--
-- AUTO_INCREMENT for table `testhelp`
--
ALTER TABLE `testhelp`
  MODIFY `testHelp_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `tests`
--
ALTER TABLE `tests`
  MODIFY `test_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `test_samples`
--
ALTER TABLE `test_samples`
  MODIFY `test_sample_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=204;

--
-- AUTO_INCREMENT for table `tuberculin_skin_test`
--
ALTER TABLE `tuberculin_skin_test`
  MODIFY `tst_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `urine_examination`
--
ALTER TABLE `urine_examination`
  MODIFY `urine_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `user_labs`
--
ALTER TABLE `user_labs`
  MODIFY `ul_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

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
