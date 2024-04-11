-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 11, 2024 at 03:41 AM
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
-- Database: `cpesd_mis`
--

-- --------------------------------------------------------

--
-- Table structure for table `action_logs`
--

CREATE TABLE `action_logs` (
  `action_id` int(11) NOT NULL,
  `action` text NOT NULL,
  `web_type` enum('dts','wl') NOT NULL,
  `user_type` enum('admin','user','receiver') DEFAULT NULL,
  `user_id` int(11) NOT NULL,
  `_id` int(11) NOT NULL,
  `action_datetime` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `action_logs`
--

INSERT INTO `action_logs` (`action_id`, `action`, `web_type`, `user_type`, `user_id`, `_id`, `action_datetime`) VALUES
(1, 'Added Document No. 20240408420', 'dts', 'user', 8, 267, '2024-04-08 15:06:50'),
(2, 'Added Document No. 20240408421', 'dts', 'user', 8, 268, '2024-04-08 16:02:12'),
(3, 'Added Document No. 20240408421', 'dts', 'user', 8, 268, '2024-04-08 16:18:12'),
(4, 'Added Document No. 20240408422', 'dts', 'user', 8, 269, '2024-04-08 16:19:04'),
(5, 'Updated Document No. 20240408422', 'dts', 'user', 8, 269, '2024-04-08 16:19:28'),
(6, 'Deleted Document No. 20240408422', 'dts', 'user', 8, 269, '2024-04-08 16:21:35'),
(7, 'Canceled Document No. 20240408421', 'dts', 'admin', 8, 268, '2024-04-08 16:39:30'),
(8, 'Canceled Document No. 20240408420', 'dts', 'admin', 8, 267, '2024-04-08 16:39:39'),
(9, 'Canceled Document No. 20240408419', 'dts', 'admin', 8, 266, '2024-04-08 16:39:39'),
(10, 'Received Document No. 20240321328', 'dts', 'user', 8, 174, '2024-04-11 08:29:44'),
(11, 'Received Document No. 20240321327', 'dts', 'user', 8, 173, '2024-04-11 08:29:44'),
(12, 'Received Document No. 20240319319', 'dts', 'user', 8, 165, '2024-04-11 08:35:34'),
(13, 'Received Document No. 20240319318', 'dts', 'user', 8, 164, '2024-04-11 08:35:34'),
(14, 'Received Document No. 20240319313', 'dts', 'user', 8, 159, '2024-04-11 08:35:34'),
(15, 'Canceled Document No. 20240408411', 'dts', 'admin', 8, 258, '2024-04-11 08:53:41'),
(16, 'Canceled Document No. 20240405410', 'dts', 'admin', 8, 257, '2024-04-11 08:53:41'),
(17, 'Canceled Document No. 20240405409', 'dts', 'admin', 8, 256, '2024-04-11 08:53:41'),
(18, 'Canceled Document No. 20240405408', 'dts', 'admin', 8, 255, '2024-04-11 08:53:41'),
(19, 'Canceled Document No. 20240405407', 'dts', 'admin', 8, 254, '2024-04-11 08:53:41'),
(20, 'Canceled Document No. 20240405406', 'dts', 'admin', 8, 253, '2024-04-11 08:53:41'),
(21, 'Canceled Document No. 20240405405', 'dts', 'admin', 8, 252, '2024-04-11 08:53:41'),
(22, 'Canceled Document No. 20240405404', 'dts', 'admin', 8, 251, '2024-04-11 08:53:41'),
(23, 'Canceled Document No. 20240405403', 'dts', 'admin', 8, 250, '2024-04-11 08:53:41'),
(24, 'Canceled Document No. 20240405402', 'dts', 'admin', 8, 249, '2024-04-11 08:53:41'),
(25, 'Canceled Document No. 20240408421', 'dts', 'admin', 8, 268, '2024-04-11 08:56:27'),
(26, 'Canceled Document No. 20240408420', 'dts', 'admin', 8, 267, '2024-04-11 08:56:48'),
(27, 'Reverted Document No. 20240408420', 'dts', 'admin', 8, 267, '2024-04-11 08:57:10'),
(28, 'Deleted Document No. 20240408416', 'dts', 'user', 8, 263, '2024-04-11 09:04:41'),
(29, 'Deleted Document No. 20240408415', 'dts', 'user', 8, 262, '2024-04-11 09:04:41'),
(30, 'Received Document No. 20240404398', 'dts', 'user', 23, 244, '2024-04-11 09:35:35'),
(31, 'Received Document No. 20240326364', 'dts', 'user', 23, 210, '2024-04-11 09:35:35'),
(32, 'Received Document No. 20240325340', 'dts', 'user', 23, 186, '2024-04-11 09:39:33'),
(33, 'Forwarded Document No. 20240408414 to Richard Cariaga  Liberto  ', 'dts', 'user', 23, 261, '2024-04-11 09:40:18'),
(34, 'Received Document No. 20240408414', 'dts', 'user', 23, 261, '2024-04-11 09:40:26');

-- --------------------------------------------------------

--
-- Table structure for table `documents`
--

CREATE TABLE `documents` (
  `document_id` int(11) NOT NULL,
  `tracking_number` varchar(150) NOT NULL,
  `document_name` varchar(255) NOT NULL,
  `u_id` int(11) NOT NULL,
  `offi_id` int(11) NOT NULL,
  `origin` int(11) DEFAULT NULL,
  `doc_type` int(11) NOT NULL,
  `document_description` text DEFAULT NULL,
  `doc_status` set('pending','completed','cancelled') NOT NULL,
  `completed_on` datetime DEFAULT NULL,
  `destination_type` set('simple','complex') NOT NULL,
  `note` text DEFAULT NULL,
  `created` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `documents`
--

INSERT INTO `documents` (`document_id`, `tracking_number`, `document_name`, `u_id`, `offi_id`, `origin`, `doc_type`, `document_description`, `doc_status`, `completed_on`, `destination_type`, `note`, `created`) VALUES
(20, '20240227181', 'Letter /North western Mindanao State College of Science and Technology/Tangub City', 23, 21, NULL, 48, 'Conducting Academic Research Street Vendors Strategies Towards Competitive Advantage.', 'completed', NULL, 'complex', '', '2024-02-27 10:04:22'),
(21, '20240227182', 'Letter', 23, 21, NULL, 48, '/Requesting your PESO Manager/SPES designated focal person to attend our SPES implementer\'s Orientation and planning Activity  on March 6,2024 wednesday ,at 8;00 am 5;00  to be held at Hugrilla Diners ,Oroquieta City ,Mis.Occ.', 'completed', '2024-04-08 11:56:52', 'complex', '', '2024-02-27 10:10:31'),
(22, '20240227183', 'Letter', 23, 21, NULL, 48, 'Applying OFOP-Program \\Earl Josua P. Alimpio', 'pending', NULL, 'complex', '', '2024-02-27 10:15:04'),
(23, '20240227184', 'Dole approved allocation', 23, 21, NULL, 48, 'Employers  pledge Commitment', 'completed', NULL, 'complex', '', '2024-02-27 10:19:44'),
(24, '20240227185', 'Letter/ MIS.OCC.TECH.INSTITUTE', 23, 21, NULL, 48, 'PROFILE form of the applicants/TESDA-TULONG TRABAHO SCHOLARSHIP PROG.[TTSP]', 'completed', NULL, 'complex', '', '2024-02-27 10:24:54'),
(25, '20240227186', 'ENDORSEMENT LETTER/  [SIAKEAN\'S INTEGRATED FARM (SIF)', 23, 21, NULL, 48, 'DA-ATI RFO X  -PROGRAM with TESDA for the PRODUCE ORGANIC VEGETABLES[leading to organic agriculture  NC II With 15 scholars and produce organic fertilizers (Leading to organic agriculture NC II )WITH 20 Scholars.', 'pending', NULL, 'complex', '', '2024-02-27 10:31:02'),
(26, '20240227187', 'RESOLUTION NO. 03 series -2023', 23, 21, NULL, 48, 'APPROVING THE COMPREHENSIVE BRGY.YOUTH DEVELOPMENT PLAN [CBYDP] POB.I', 'pending', NULL, 'complex', '', '2024-02-27 10:34:38'),
(27, '20240227188', 'RESOLUTION NO.04 series-2023', 23, 21, NULL, 48, 'approving annual Brgy.youth investment Program  SK,Pob ;I', 'pending', NULL, 'complex', '', '2024-02-27 10:37:38'),
(28, '20240227189', 'Notice of Special Meeting (OCEMCO)', 23, 21, NULL, 49, 'OCEMCO Board of Directors will meet for Special Meeting  on thursday. february 29,2024 @1;00 pm ,Restobar,lower langcangan Oroq.City.', 'completed', NULL, 'complex', '', '2024-02-27 15:44:49'),
(29, '20240227190', 'Starter kits applicantsLi/Barangay Tipan', 23, 21, NULL, 49, 'List of indorse beneficiary.', 'cancelled', NULL, 'complex', '', '2024-02-27 16:41:24'),
(30, '20240228191', 'List of applying starter kits (Brgy. Tipan)', 23, 21, NULL, 49, 'List of indorse Beneficiary (Brgy.Tipan)', 'completed', '2024-03-22 14:48:41', 'complex', '', '2024-02-28 11:25:26'),
(31, '20240228192', 'Letter', 23, 21, NULL, 48, 'applying for one Family one Professional ScholarshipPogram/Noralyn U.Codilla-2nd year College.UNIVERSITY OF SCIENCE AND TECHNOLGY OF SOUTHERN PHILIPPINES.', 'pending', NULL, 'complex', '', '2024-02-28 13:09:14'),
(32, '20240228193', 'Letter', 23, 21, NULL, 48, 'APPLYING  ONE FAMILY ONE PROFESIONAL SCHOLARSHIP PROGRAM JONAH B. DAGOHOY-2ND year College ,University of Science  Technology', 'pending', NULL, 'complex', '', '2024-02-28 13:16:12'),
(33, '20240228194', 'Letter', 23, 21, NULL, 48, 'Applying One Family One Professional Scholarship Program /Gerome T. Bedolido /3rd year Maritime.', 'pending', NULL, 'complex', '', '2024-02-28 13:26:32'),
(34, '20240228195', 'Letter', 23, 21, NULL, 48, 'Applying One Famliy One Professional Sholarship Program/Marilou B.Tubay -University of Science and Technology of Southern Phillipines', 'pending', NULL, 'complex', '', '2024-02-28 13:33:45'),
(35, '20240228196', 'Letter', 23, 21, NULL, 48, 'Applying One Family One Professional Scholarship Program./Patricia Jane T. Alindam- 2ND YEAR College/ USTP', 'pending', NULL, 'complex', '', '2024-02-28 13:41:14'),
(37, '20240229197', 'Letter/ One Family one professional Scholarship', 23, 21, NULL, 48, 'Applying One Family One Professional Scholarship Program./Francine J.Lanipa -Misamis University', 'pending', NULL, 'complex', '', '2024-02-29 09:27:21'),
(38, '20240229198', 'Letter/ One Family ,One Professional Scholar Programm', 23, 21, NULL, 48, 'Applying One Family, One Professional Scholar  Program/Rodulfo Andrei A. Sinodivila -Misamis University  Oroqueita City', 'pending', NULL, 'complex', '', '2024-02-29 10:08:37'),
(39, '20240229199', 'Notice Of Public Hearing/ Sangguniang Panlungsod', 23, 21, NULL, 49, 'Public Hearing on March 15 ,2024 Friday ,9;00 AM at the Sangguniang Panlungsod Session Hall ,Civic Arena Area, Oroq.City Town Center.', 'completed', NULL, 'complex', '', '2024-02-29 10:31:21'),
(40, '20240229200', 'NOTICE OF MEETING /City Council for the protection of children', 23, 21, NULL, 49, 'Meeting on March 6,2024 wednesday,9;00 A.M at Learning Center ,Oroq. City.', 'completed', NULL, 'complex', '', '2024-02-29 10:42:02'),
(41, '20240229201', 'RESOLUTION NO.04-2023/ Burgos', 23, 21, NULL, 49, 'APPROVING the Comprehensive Brgy. youth Development  Plan (CBYDP) for the year 2023 to 2025 of Brgy, Burgos', 'pending', NULL, 'complex', '', '2024-02-29 11:19:23'),
(42, '20240229202', 'Resolution No.05 2023/BURGOS', 23, 21, NULL, 49, 'Resolution No. 05-2023 A resolution for approving the annual Brgy.youth investment plan (abyip) of 10%current fund of Brgy. Burgos CY.2024 amounting,243,991.00', 'pending', NULL, 'complex', '', '2024-02-29 11:27:33'),
(43, '20240229203', 'Nootice of Meeting (OCM)', 23, 21, NULL, 49, 'Meeting on friday ,March 1,2024, 1;30 pm at city Engeineer\'s Office.', 'completed', NULL, 'complex', '', '2024-02-29 13:30:09'),
(44, '20240229204', 'Workers Hired in infrastructure Projects /Brgy. Clarin Settlement P-1', 23, 21, NULL, 49, 'List of Worker Hired/Brgy. Clarin Settlement P1 - Artemio Calamba-et al', 'completed', NULL, 'complex', ' ', '2024-02-29 14:06:27'),
(45, '20240229205', 'Letter/ One Family ,One Professional  Scholarship Program', 23, 21, NULL, 48, 'Applying /One Family One Professional Scholarship Program- Diana G, Gregorio -Jose Risal Memorial State University -Main Campos.', 'pending', NULL, 'complex', '', '2024-02-29 15:34:15'),
(46, '20240301206', 'City Resolution No.2024-02-047/ SP', 23, 21, NULL, 48, 'Authorizing the Hon. City Mayor Lemuel Meyrick M. Acosta to sign the Memorandum of Agreement to be executed by and between the Local Government of Oroq. City and the LA SALLE UNIVERSITY, OZAMIS CITY ,for the on-job- training deployment of its BACHELOR OF LIBRARY and INFORMATION SCIENCE .(BLIS) student at the Oroq. City Library.', 'completed', NULL, 'complex', '', '2024-03-01 08:29:33'),
(47, '20240301207', 'Communication Letter/ Province of Misamis Occidental', 23, 21, NULL, 48, 'Reversion of the new ASENSO LOGO and PLACEMENT OF BAGONG PILIPINAS LOGO', 'completed', NULL, 'complex', '', '2024-03-01 09:45:42'),
(48, '20240301208', 'RESOLUTION NO.2023-12-03-Brgy.Sibucal', 23, 21, NULL, 49, 'resolution to approve the annual Barangay youth investment Program of sangguniang Kabataan 10% fund of Barangay Sibucal Sk. CY 2024.', 'pending', NULL, 'complex', '', '2024-03-01 13:55:09'),
(49, '20240301209', 'RESOLUTION No.2023-12-02/Barangay Sibucal', 23, 21, NULL, 49, 'Resolution to approved the comprehensive Barangay Youth  Development Plan (CBYDP) of Sangguiniang Kabataan 10% Fund of Barangaay Sibucal Sk CY,2024.', 'pending', NULL, 'complex', '', '2024-03-01 14:15:08'),
(50, '20240301210', 'EXECUTIVE ORDER NO.026-2024(OCM)', 23, 21, NULL, 49, 'An order reconstituting the City- inter agency committee for the implementation of KAPIT- BISIG LABAN SA  KAHIRAPAN- Comprehensive and integrated delivery of Social Services;:PAYAPA AT MASAGANANG PAMAYANAN  COMMUNITY- DRIVEN DEVELOPMENT(KALAHI-CIDSS;PAMANA CDD) under the department of social welfare and development in Oroquieta City .Misamis Occ.', 'completed', NULL, 'complex', '', '2024-03-01 14:37:44'),
(51, '20240301211', 'Resolution No.3 series-2024/UPPER LAMAC', 23, 21, NULL, 49, 'approving the comprehensive brgy, youth investment plan.(CBYDP) A three years plan of SK. Upper Lamac Council for the youth development starting this current year until 2025.', 'pending', NULL, 'complex', '', '2024-03-01 15:00:06'),
(52, '20240301212', 'RESOLUTION NO. 03 series -2023 UPPER LAMAC', 23, 21, NULL, 49, 'APPROVING THE CY 2024 ANNUAL BARANGAY YOUTH INVESTMENT PROGRAM (ABYIP)', 'pending', NULL, 'complex', '', '2024-03-01 15:02:42'),
(53, '20240301213', 'RESOLUTION NO.2023-12-04 Canubay', 23, 21, NULL, 49, 'Resolution to approve the annual barangay youth investment program of SK.10% fund of  Barangay Canubay  SK. CY 2024', 'pending', NULL, 'complex', '', '2024-03-01 15:06:34'),
(54, '20240301214', 'RESOLUTION NO. 2023-12-03', 23, 21, NULL, 49, 'Resolution to approve the comprehensive Barangay youth Development Plan of SK. 10% fund of Brgy, Canubay SK> CY 2024', 'pending', NULL, 'complex', '', '2024-03-01 15:09:50'),
(55, '20240301215', 'COMMUNICATION  LETTER/WHIP', 23, 21, NULL, 48, 'Monthly Status report of the project ,Construction of Brgy, Lower Loboc Parking Lot  at El triumpo Beach.', 'completed', '2024-04-08 11:08:40', 'complex', '', '2024-03-01 15:15:18'),
(56, '20240304216', 'List of jobseekers-placed/hired /PRYCE GASES  INC.', 23, 21, NULL, 59, 'Name jobseeker placed/hired -outside Oroq. City  .- - WEE, OLIVER JUMAWAN JR.', 'pending', NULL, 'complex', '', '2024-03-04 10:58:14'),
(57, '20240304217', 'Application for Leave - Masayon', 8, 21, NULL, 60, 'Application for Leave - Masayon\r\nSick Leave March 1, 2024', 'completed', NULL, 'simple', '', '2024-03-04 11:05:25'),
(60, '20240304218', 'OBR PLDT Payment', 8, 21, NULL, 65, 'OBR, DV and Certification for PLDT Payment - March 2024', 'completed', NULL, 'simple', '', '2024-03-04 13:39:48'),
(61, '20240304219', 'SKMT (ABYIP) Pob.2 Oroq. City', 23, 21, NULL, 63, 'ABYIP W/ attach Resolution No.-2023-o3', 'pending', NULL, 'complex', '', '2024-03-04 13:55:01'),
(62, '20240304220', '1st Indorsement from SP, re: application for SP Accreditation - Pines Agri Venture Association', 8, 76, NULL, 66, '1st Indorsement from SP, re: application for SP Accreditation - Pines Agri Venture Association which includes LOI, Annexes C, E, F, G, H, I and COR from DOLE', 'completed', NULL, 'simple', '', '2024-03-04 14:06:31'),
(63, '20240304221', 'Notice To Proceed for OJT', 8, 21, NULL, 67, 'Issuance of NTP to 5 La Salle University students , BLIS for 150 hours', 'completed', '2024-04-02 14:43:31', 'simple', '', '2024-03-04 14:12:59'),
(64, '20240304222', 'SKMT(CBYDP) Poblacion 2 Oroq.city', 23, 74, NULL, 64, 'CBYDP-attach Resolution 2023-12-03 -Barangay Pob.2 Oroq. City', 'pending', NULL, 'complex', '', '2024-03-04 14:26:52'),
(65, '20240304223', 'SKMT (ABYIP) Lower Langcangan Oroq.City', 23, 21, NULL, 63, 'ABYIP/ 10%Fund of Barangay Lower Langcangan -attach Resolution No.2024-02-005', 'pending', NULL, 'complex', '', '2024-03-04 15:30:09'),
(66, '20240304224', 'SKMT (CBYDP) Barangay Lower Langcangan', 23, 21, NULL, 64, 'CBYDP 10% fund of Barangay Lower Langcangan Oroquieta City/Attach Resolution No.2024-01-004', 'pending', NULL, 'complex', '', '2024-03-04 15:39:23'),
(67, '20240304225', 'Application for Accreditation', 23, 21, NULL, 48, 'to seek accreditation /GITIB,Inc.', 'completed', NULL, 'complex', '', '2024-03-04 16:49:24'),
(68, '20240304226', 'Justification letter - OFOP', 23, 21, NULL, 68, 'Renewal Application for the One Family One Professional Scholarship | Kean Louise S. Tagactac', 'pending', NULL, 'complex', '', '2024-03-04 17:12:14'),
(69, '20240304227', 'Justification letter - OFOP', 23, 21, NULL, 68, 'Renewal Application for the One Family One Professional Scholarship - Mariel Jane B. Uba', 'pending', NULL, 'complex', '', '2024-03-04 17:13:04'),
(70, '20240304228', 'Justification letter - OFOP', 23, 21, NULL, 68, 'Renewal Application for the One Family One Professional Scholarship - Raziel Jane F. Gumapac', 'pending', NULL, 'complex', '', '2024-03-04 17:14:06'),
(71, '20240304229', 'Justification letter - OFOP', 23, 21, NULL, 68, 'Renewal Application for the One Family One Professional Scholarship - Mick Vincent C. Yew', 'pending', NULL, 'complex', '', '2024-03-04 17:15:23'),
(72, '20240304230', 'Justification letter - OFOP', 23, 21, NULL, 68, 'Renewal Application for the One Family One Professional Scholarship - VINCENT N. DAJAO', 'pending', NULL, 'complex', '', '2024-03-04 17:15:54'),
(73, '20240305231', 'SKMT (ABYIP) Barangay Bunga', 23, 21, NULL, 63, 'ABYIP/Barangay Bunga -Attach Resolution No.3-S-2024', 'pending', NULL, 'complex', '', '2024-03-05 09:45:58'),
(74, '20240305232', 'SKMT (CBYDP) Barangay Bunga', 23, 21, NULL, 64, 'CBYDP-Barangay Bunga Attach Resolution No.02-S-2024', 'pending', NULL, 'complex', '', '2024-03-05 09:53:41'),
(75, '20240305233', 'Application for Leave - Tacastacas', 8, 21, NULL, 60, 'Application for Leave on March 6, 2024', 'completed', NULL, 'simple', '', '2024-03-05 11:14:47'),
(76, '20240305234', 'Letter/DSWD Oroqiueta City', 23, 21, NULL, 58, 'Request the assistance personnel from your office for a period of one week to help us in monitoring our livelihood project', 'completed', '2024-04-08 11:52:31', 'complex', '', '2024-03-05 13:20:13'),
(77, '20240305235', 'Communication Letter/ DTI', 23, 21, NULL, 48, 'To coordinate,consult and seek your kind consideration to allow the conduct of the assessment,Consultation and Triage(ACT) session in your City./on March 13,2024 -9;00 a.m to 4;00 pm', 'completed', NULL, 'complex', '', '2024-03-05 16:52:50'),
(78, '20240305236', 'Liquidation Report -', 8, 21, NULL, 49, 'for compliance for acceptance report, re: Starter Kit Poultry - Domingo Lumacang', 'pending', NULL, 'complex', '', '2024-03-05 17:21:21'),
(79, '20240305237', 'POW', 8, 86, NULL, 49, 'POW Installation of Flood Light at City Plaza Basketball Court', 'completed', NULL, 'complex', '', '2024-03-05 17:26:06'),
(80, '20240306238', 'Notice of Meeting', 23, 21, NULL, 55, 'Requested to attend the 4Ps Quarterly Meeting on 08 March 2024,1;00 p.m at the E-LEARNING , CENTER,City Library ,this city', 'completed', NULL, 'simple', '', '2024-03-06 09:37:52'),
(81, '20240306239', 'Communication Letter/DPWH', 23, 21, NULL, 48, 'Monthly Status Report of infrastructure Projects implemented in the city of Oroquieta as of February 2024.', 'completed', NULL, 'complex', '', '2024-03-06 09:56:25'),
(82, '20240306240', 'MEMORANDUM ORDER -No.080-2024', 23, 21, NULL, 56, 'Requested to attend the exit conference with the Commission- on Audit on 21 March 2024,8;30 A.M to 5;00 P.M at Bocter\'s Place Dolipos Bajo,this City', 'completed', '2024-03-22 14:49:57', 'simple', '', '2024-03-06 10:08:38'),
(83, '20240306241', 'Application letter,One Family One Professional Scholarship Program', 23, 21, NULL, 48, 'Applying One Family One Professional -JEFFRY SUGALAM TEVES,-Barangay Bunga,/University of Science and technology.', 'pending', NULL, 'simple', '', '2024-03-06 11:38:12'),
(84, '20240306242', 'Application letter One family One Professional', 23, 21, NULL, 48, 'ELLA MAE A.TUMALA-  Barangay pINES 3rd year College (USTSP)  Applying One Family One Professional Scholarship Program.', 'pending', NULL, 'simple', '', '2024-03-06 11:52:30'),
(85, '20240306243', 'Application letter One Family One Professional Scholarship Program', 23, 21, NULL, 48, 'NASH LUMASAG DIJON-BARANGAY cANUBAY  1st year college -Cebu institute iof Technology \'Apllying -One Family One Professional.', 'pending', NULL, 'simple', '', '2024-03-06 11:59:54'),
(86, '20240306244', 'Application for Leave - Cario', 13, 21, NULL, 60, 'for approval', 'pending', NULL, 'complex', '', '2024-03-06 13:03:30'),
(87, '20240306245', 'Application for Leave - abuhon', 13, 21, NULL, 60, 'for approval', 'completed', NULL, 'complex', '', '2024-03-06 13:04:14'),
(88, '20240306246', 'Information and Request Letter', 23, 21, NULL, 48, 'Permission to conduct surveys within offices', 'pending', NULL, 'simple', '', '2024-03-06 13:22:45'),
(89, '20240306247', 'NOTICE OF MEETING/City Project monitoring', 23, 21, NULL, 55, 'Project Monitoring Committee will conduct an inspection of the following projects on March 08,2024,friday at 1;30 p.m.', 'completed', NULL, 'complex', '', '2024-03-06 14:45:04'),
(90, '20240306248', 'SKMT CBYDP-Barangay Tuyabang Alto', 23, 21, NULL, 64, 'CBYDP-10% FUND OF Barangay tuyabang Alto -attach Resolution No.2024-01-004', 'pending', NULL, 'complex', '', '2024-03-06 15:04:45'),
(91, '20240306249', 'ABYIP- Barangay Tuyabang Alto', 23, 21, NULL, 63, 'ABYIP -Barangay Tuyabang Alto attach resolution No.2024-01-005', 'pending', NULL, 'complex', '', '2024-03-06 15:11:19'),
(92, '20240306250', 'Communication Letter/DPWH', 23, 21, NULL, 48, 'Close  collaboration and Coordination with the Local Government Units in the implementation of insfrastructure Project in this region.', 'completed', NULL, 'complex', '', '2024-03-06 15:58:05'),
(93, '20240307251', 'Application for Leave - Tacastacas', 13, 21, NULL, 60, 'for approval', 'completed', NULL, 'complex', '', '2024-03-07 09:17:25'),
(94, '20240307252', 'SK(ABYIP )Barangay Victoria Oroquieta city', 23, 21, NULL, 63, 'SK-ABYIP-Attached Resolution No.4 Series of 2024', 'pending', NULL, 'simple', '', '2024-03-07 09:36:08'),
(95, '20240307253', 'SK.(CBYDP) Barangay Victoria', 23, 21, NULL, 64, 'SK-CBYDP-Barangay Victoria Attached Resolution No.3-Series No.2023', 'pending', NULL, 'simple', '', '2024-03-07 09:42:45'),
(96, '20240307254', 'EXECUTIVE ORDER-No.028-2024', 23, 21, NULL, 50, 'AN ORDER REORGANIZING THE GENDER AND DEVELOPMENT FOCAL POINT IN OROQUIETA CITY.', 'pending', NULL, 'simple', '', '2024-03-07 10:17:27'),
(97, '20240307255', 'EXECUTIVE ORDER No.029-2024', 23, 21, NULL, 50, 'AN ORDER CREATING THE LOCAL YOUTH DEVELOPMENT COUNCIL IN OROQUIETA CITY', 'pending', NULL, 'simple', '', '2024-03-07 10:20:18'),
(98, '20240307256', 'RESPONSE LETTER/ University of Science and Technology of Southern Philippines', 23, 21, NULL, 48, 'We would like to express our sincerest desire and interest to work in partnership with the Local Government of Oroquieta on  the conduct of diffrent livelihood and skills training for organization and communities in the city under our Extension and Community Relations Office', 'pending', NULL, 'simple', '', '2024-03-07 11:32:51'),
(99, '20240307257', 'PR- Catering Services -Snacks', 13, 21, NULL, 65, 'for approval', 'pending', NULL, 'complex', '', '2024-03-07 14:14:48'),
(100, '20240307258', 'Communication Letter/Optimistic Milestone Man power In\'l. Services Co.', 23, 21, NULL, 48, 'OPTIMISTC MILESTONE MANPOWER IN\'L SERVICES CO.-are respectfully requesting to your good office to Conduct our Special Recruitment Activity(SRA)for possible job placement of a qualified candidates (domestic worker) to be deployed in Riyadh,Jeddah City in Kingdom of saudi  Arabia,Qatar, Malaysia and Kuwait.', 'pending', NULL, 'simple', '', '2024-03-07 14:36:21'),
(101, '20240307259', 'MEMORANDUM NO. ORDER No. 084-2024', 23, 21, NULL, 56, 'In views of this, let us join nations around the world in celebrating EARTH HOUR 2024 by switching-off lights, during this Global \"LIGHT OUT\" on March 23 2024,Saturday, from 8:30 p.m 9:30 p.m', 'completed', NULL, 'simple', '', '2024-03-07 14:50:00'),
(102, '20240307260', 'SK.(CBYDP) Barangay Mobod', 23, 21, NULL, 50, 'CBYDP Barangay Mobod Oroquieta City. Attached Resolution N.2023-12-03', 'pending', NULL, 'simple', '', '2024-03-07 16:58:31'),
(103, '20240307261', 'SK(ABYIP) Barangay Mobod -Oroquieta City', 23, 21, NULL, 63, 'ABYIP- Barangay Mobod Oroquieta City-Attached Resolution No.2024-01-004', 'pending', NULL, 'complex', '', '2024-03-07 17:01:04'),
(104, '20240308262', 'SK>(CBYDP) Barangay Mialen Oroq. City', 23, 21, NULL, 64, 'CBYDP-Barangay Mialen -Attached Resolution No.003-S-2023.', 'pending', NULL, 'simple', '', '2024-03-08 10:43:53'),
(105, '20240308263', 'SK (ABYIP) Barangay Mialen.Oroq.City', 23, 21, NULL, 63, 'ABYIP-Barangay Mialen Oroquieta City-Attached Resolution No.001-S-2024', 'pending', NULL, 'simple', '', '2024-03-08 10:46:52'),
(106, '20240308264', 'SK(CBYDP) Barangay Upper Langcangan Oroquieta City', 23, 21, NULL, 64, 'CBYDP-Barangay Upper Langcangan Oroquieta city- Attached Resolution No.01-Series-2024', 'pending', NULL, 'simple', '', '2024-03-08 11:27:23'),
(107, '20240308265', 'SK.(ABYIP)Barangay Upper Langcangan Oroquieta City', 23, 21, NULL, 63, 'ABYIP- Barangay Upper Langcangan Oroquieta City-Attached Resolution No.02-Series-2024', 'pending', NULL, 'simple', '', '2024-03-08 11:30:06'),
(108, '20240308266', 'MEMORANDUM NO.087-2024', 23, 21, NULL, 56, 'MEMORANDUM No.087-2024-DESIGNATION TO TAKE OF OFFICE- WELTA C. LARA- On march 11,2024,While the undersigned is on official business, you are hereby officially designated to take charge of the office of the city Mayor', 'completed', '2024-03-22 14:40:20', 'simple', '', '2024-03-08 13:18:21'),
(109, '20240308267', 'MEMORANDUM NO.088-2024', 23, 21, NULL, 56, 'DESIGNATION TO TAKE CHARGE OF OFFICE- HON.VERGINIA M. ALMONTE,City Vice Mayor Oroq.City, Effective 12 march 2024,while the undersigned is on official business in connection to his official travel to Cebu City, Until his return,you are hereby officially designated to take charge of he office of the City Mayor', 'completed', NULL, 'simple', '', '2024-03-08 13:26:48'),
(110, '20240308268', 'ENDORSEMENT LETTER SIAKEAN\'S INTEGRATED FARM', 23, 21, NULL, 48, 'Siakean\'s integrated Farm is committed to support agricultural Technology education not only in our city but also in neighboring towns over the year./(D-ATI RFOX) and has registered program with TESDA-for the Produce Organic Vegetables (leading to organic Agriculture NC II)with 15  Scholars And Produce Organic Fertilizers(leading to organic Agriculture NCII)with 20 Scholars', 'pending', NULL, 'simple', '', '2024-03-08 15:03:52'),
(111, '20240308269', 'Information letter-DPWH', 23, 21, NULL, 48, 'We are submitting for your information and guidance a partial list of completed and turn- over project undertaken by our District Engineering office', 'completed', NULL, 'simple', '', '2024-03-08 15:10:29'),
(112, '20240308270', 'SK.(CBYDP) Barangay Talairon Oroquieta City', 23, 21, NULL, 64, 'CBYDP- Barangay talairon Oroquieta City,Attached Resolution No.2-2023', 'pending', NULL, 'simple', '', '2024-03-08 16:03:34'),
(113, '20240308271', 'SK.(ABYIP) Barangay talairon Oroquieta City', 23, 21, NULL, 63, 'ABYIP-Barangay Talairon ,Attached Resolution No.1-2024', 'pending', NULL, 'simple', '', '2024-03-08 16:06:58'),
(114, '20240311272', 'SK(ABYIP)barangay Dolipos Bajo Oroquieta City', 23, 21, NULL, 63, 'ABYIP_Barangay Dolipos Bajo Oroquieta City-Attached Resolution No.02-2024', 'pending', NULL, 'simple', NULL, '2024-03-11 09:12:37'),
(115, '20240311273', 'SK(CBYDP)-Barangay Dolipos Bajo Oroquieta City', 23, 21, NULL, 64, 'CBYDP-Barangay Dolipos Bajo Oroquieta City-Attached Resolution No.01-2024', 'pending', NULL, 'simple', NULL, '2024-03-11 09:15:26'),
(116, '20240311274', 'SK(ABYIP)Barangay Lower Rizal Oroquieta City', 23, 21, NULL, 63, 'ABYIP- Barangay Lower Rizal Oroquieta City Attached Resolution No.02-2024', 'pending', NULL, 'simple', NULL, '2024-03-11 09:20:29'),
(117, '20240311275', 'SK(CBYDP)-Barangay Lower Rizal Oroquieta City', 23, 21, NULL, 64, 'CBYDP_Barangay Lower Rizal Oroquieta City- Attached Resolution No,04 2023', 'pending', NULL, 'simple', NULL, '2024-03-11 09:23:33'),
(118, '20240311276', 'SK.(ABYIP)-Barangay Layawan Oroquieta City', 23, 21, NULL, 63, 'ABYIP-Barangay Layawan-Oroquieta City-Attached resolution No.2024-02', 'pending', NULL, 'simple', NULL, '2024-03-11 09:34:10'),
(119, '20240311277', 'SK.(CBYDP)-Barangay Layawan Oroquieta City', 23, 21, NULL, 64, 'CBYDP-Barangay Layawan Oroquieta City-Attached Resolution No.2024-01', 'pending', NULL, 'simple', NULL, '2024-03-11 09:37:24'),
(120, '20240311278', 'URGENT MESSAGE-DILG', 23, 21, NULL, 48, 'ALL PDs AND CDs/  Dissemination of advisory re; WEBINARS ON \'GAD GAVE ME YOU; creating Gender-Responsive Programs and Policies for SK Officials\' and leading the SK Pederasyon by the National Youth Commission.', 'completed', '2024-04-08 11:57:10', 'simple', NULL, '2024-03-11 14:57:12'),
(121, '20240311279', 'Communication Letter/ LA SALLE UNIVRSITY-OZAMIZ CITY', 23, 21, NULL, 48, 'Our Student are eager to apply the Theoretical knowledge they have gained in the Classroom to real world settings, and we firmly believe  that OJT placement of our student at the INFRASTRUCTURE AND TECHNICAL SERVICES SECTION OF THE CITY GOVERNMENT OF OROQUIETA will be invaluable to their professional growth.- In line with this,we kindly request confirmation of the institution\'s willingness to accomodate the following Bachelor of Science in Computer Engineering student from March 2024 to May 2024.- ARCAYENA ,NAZEL T./ GABAY\'JOHN MICHAEL A.', 'completed', '2024-04-02 14:43:45', 'simple', NULL, '2024-03-11 15:37:06'),
(122, '20240312280', 'Leave Application - Buta (March 15, 2024)', 13, 21, NULL, 60, 'For approval', 'completed', NULL, 'complex', NULL, '2024-03-12 10:15:39'),
(123, '20240312281', 'Leave Application - Buta (March 19, 2024)', 13, 21, NULL, 60, 'for approval', 'completed', NULL, 'complex', NULL, '2024-03-12 10:18:21'),
(124, '20240312282', 'Letter/ University of Science and Technology of Southern Philippines', 23, 21, NULL, 49, 'We are humbly asking your distinguished institution if we could partner with you to be our student client for their  capstone project .', 'pending', NULL, 'simple', NULL, '2024-03-12 10:51:09'),
(125, '20240312283', 'Communication Letter/ Provincial Agriculture Office', 23, 21, NULL, 48, 'As part of the Internship  of the Agriculture student in Misamis University, Ozamiz City the students need to be exposed on how to manage pest and disease incidence in crop production through sustainable approach like the use of biocontrol agents and how they  are produced and reared in the laboratory set up. we would like to request that these student be allowed to experience firsthand on how to produced and reared these organism in laboratory condition.', 'pending', NULL, 'simple', NULL, '2024-03-12 14:58:40'),
(126, '20240312284', 'Communication letter /from USTP', 23, 21, NULL, 49, 'We are humbly asking your distinguished institution if we could partner with you to be our students\' client for thier capstone project.', 'pending', NULL, 'simple', NULL, '2024-03-12 16:26:57'),
(127, '20240313285', 'SK.(ABYIP) Barangay San Vicente Bajo Oroq.City', 23, 21, NULL, 63, 'SK-ABYIP-Barangay San Vicente Bajo Oroquieta City- Attached Resolution No.02 Series-2024', 'pending', NULL, 'simple', NULL, '2024-03-13 14:20:30'),
(128, '20240313286', 'SK.(CBYDP)Barangay San Vicente Bajo Oroq.City', 23, 21, NULL, 64, 'SK>CBYDP- Barangay San Vicente Bajo Oroquieta City, Attached Resolution No.03- Series 2023', 'pending', NULL, 'simple', NULL, '2024-03-13 14:23:19'),
(129, '20240313287', 'Leave Application - Daraman (March 22, 2024)', 13, 21, NULL, 60, 'for approval', 'completed', NULL, 'complex', NULL, '2024-03-13 14:29:01'),
(130, '20240313288', 'Notice Of Meeting', 23, 21, NULL, 55, 'You are respectfully requested to attend a meeting on Friday 15, March 2024 9:00 A.M at the E- Learning Center ,', 'completed', '2024-04-02 14:43:59', 'simple', NULL, '2024-03-13 17:03:49'),
(131, '20240314289', 'Application /Letter', 23, 21, NULL, 48, 'Applying for One Family One Professional Scholarship  Program-MS. MARIE BELLE A.PUSOD-residing at Purok 6 Senote Oroquieta City -First year college /Misamis University.', 'pending', NULL, 'simple', NULL, '2024-03-14 08:33:36'),
(132, '20240314290', 'Justification letter', 23, 21, NULL, 48, 'I would like to apologize for not being able to renew my Scholarship application on time.', 'pending', NULL, 'simple', NULL, '2024-03-14 08:37:43'),
(133, '20240314291', 'League of Cities of the Philippines -MEMORANDUM', 23, 21, NULL, 48, 'THE 6th NATIONAL YOUTH ENVIRONMENTAL SUMMIT,22-24 April 2024.at Teacher\'s Camp, Baguio City.', 'pending', NULL, 'simple', NULL, '2024-03-14 10:03:32'),
(134, '20240314292', 'MEMORANDUM No.097-2024/information and Guidance/DILG', 23, 21, NULL, 56, 'Governance assessment report(GARs) Certificates of recognition, and letter for CY.2023 SGLG Non-Passer.', 'completed', '2024-03-22 14:50:16', 'simple', NULL, '2024-03-14 13:17:03'),
(135, '20240314293', 'SK.CBYDP-Barangay San Vicente Alto Oroquieta City', 23, 21, NULL, 64, 'SK>CBYDP- Barangay San Vicente Alto Oroquieta City - Attached Resolution No.3 Series of 2023', 'pending', NULL, 'simple', NULL, '2024-03-14 14:14:24'),
(136, '20240314294', 'SK.ABYIP-Barangay San Vicente Alto', 23, 21, NULL, 63, 'SK- ABYIP- Barangay San Vicente Alto Oroquieta City -Attached Resolution No.4-Series Of 2023', 'pending', NULL, 'simple', NULL, '2024-03-14 14:18:16'),
(137, '20240314295', 'Memorandum Order No,098-2024/ for information and Compliance', 23, 21, NULL, 56, 'In observance with the 2024 NATIONAL WOMEN\'s MONTH CELEBRATION and in compliance with DILG advisory  dated  29,february 2024 ,You and all the employees under your supervision are encouraged to support PURPLEFRIDAY\'s or PURPLEOURICON.', 'pending', NULL, 'simple', NULL, '2024-03-14 15:27:06'),
(138, '20240314296', 'MEMORANDUM ORDER-NO.099-2024/ Information and Compliancend Compliance', 23, 21, NULL, 56, 'You are respectfully requested to attend a one -day orientation about Tuberculosis and Rabies Prevention,', 'completed', '2024-03-22 14:42:52', 'simple', NULL, '2024-03-14 15:36:32'),
(139, '20240315297', 'Application letter - OJT  /LA SALLE UNIVERSITY Ozamis City', 23, 21, NULL, 54, 'One of our students is eager to apply the theoretical knowledge  he has gained in the classroom to real-world setting ,and we firmly believe that an OJT placement of our student at the INFRASTRUCTURE and TECHNICAL SERVICES SECTION OF THE CITY OF GOVERNMENT OF OROQUIETA,In line with this ,we kindly request confirmation of the institution\'s willingness to accommodate MACKY BOY S. TALISIC,a Bachelor of Science in  Computer Engineering student from March 2024 to May 2024.', 'completed', '2024-04-02 14:44:38', 'simple', NULL, '2024-03-15 09:40:40'),
(140, '20240315298', 'Application letter /One Family One Professional Scholarship Program', 23, 21, NULL, 48, 'Applying for  One family One Professional Scholarship Program ,CHARLES  JUVEN A. CALIBUGAN,21 YEAR OF AGE -Purok 6 Upper Langcangan Oroquieta City -4th year College Student -taking up Bachelor of Science in Business Administration major in Financial Management.', 'pending', NULL, 'complex', NULL, '2024-03-15 09:57:40'),
(141, '20240315299', 'Leave Application - Español (March 14, 2024)', 13, 21, NULL, 60, 'for approval', 'pending', NULL, 'complex', NULL, '2024-03-15 10:00:41'),
(142, '20240318300', 'Leave Application - Tacastacas (March 15, 2024)', 13, 21, NULL, 60, 'for approval', 'pending', NULL, 'complex', NULL, '2024-03-18 09:23:07'),
(143, '20240318301', 'Leave Application - Mañabo [(March 15 & 18 (Half day)]', 13, 21, NULL, 60, 'for approval', 'pending', NULL, 'complex', NULL, '2024-03-18 13:24:35'),
(144, '20240318302', 'Leave Application- Bariso (Marh 11, 2024)', 13, 21, NULL, 60, 'for approval', 'pending', NULL, 'complex', NULL, '2024-03-18 13:37:03'),
(145, '20240318303', 'Leave Application - Ibasan (April 8, 2024)', 13, 21, NULL, 60, 'for approval', 'completed', '2024-03-19 22:18:59', 'complex', NULL, '2024-03-18 17:08:56'),
(146, '20240318304', 'Leave Application - Abuhon (April 8, 2024)', 13, 21, NULL, 60, 'for approval', 'completed', '2024-03-26 11:31:34', 'complex', NULL, '2024-03-18 17:09:54'),
(148, '20240319305', 'REQUEST LETTER/Super Red Man Power Services', 23, 21, NULL, 48, 'In connection with this, may we request to Conduct (SRA) Special Recruitment Activity in PESO OROQUIETA on April 11-12, 2024 Attached herewith are our accredited principals and job order for your reference.', 'pending', NULL, 'simple', NULL, '2024-03-19 08:46:14'),
(151, '20240319306', 'Application letter /One Family One Professional Scholarship Program', 23, 21, NULL, 48, 'MERLEN J. ESCABARTE -20 Years old /Bachelor of Technology and Livelihood Education -University of Science and Technology of Southern Philippines.', 'pending', NULL, 'simple', NULL, '2024-03-19 09:03:02'),
(153, '20240319307', 'Information Letter/ LCP Memorandum REF;No.2024-03-06', 23, 21, NULL, 48, 'Invitation to participate in AFYCA 2nd National Youth Summit on Transformational Leadership and Good Governance on 18-19 June 2024 at the CCF Center Frontera Verde Ortigas in Pasig City.', 'pending', NULL, 'simple', NULL, '2024-03-19 09:22:00'),
(154, '20240319308', 'Application letter /One Family One Professional Scholarship Program', 23, 21, NULL, 48, 'GRACE T.GUTANG-23 Years old ,living in Talarion,Purok 7,Oroquieta City /Studying at the University of Science and Technology of Southern Philippines.', 'pending', NULL, 'simple', NULL, '2024-03-19 09:37:29'),
(155, '20240319309', 'Communication Letter/Jolly Management Solutions,INC.', 23, 21, NULL, 48, 'We would like to attend the in-house job fair depending on the schedule you give us to be attended by our Recruitment Staff, Mr.April Deo Dimasuhid.', 'completed', '2024-04-02 14:45:06', 'simple', NULL, '2024-03-19 09:45:21'),
(156, '20240319310', 'NOTICE OF MEETING/City Project Monitoring Committee', 23, 21, NULL, 55, 'Please be informed that the Project Monitoring Committee will conduct an inspection of the following project on March 19, 2024, tuesday at 1;30  in the afternoon ,CONSTRUCTION OF FUEL STATION AT CEO COMPOUND-Barangay Upper Langcangan,', 'completed', '2024-04-08 11:14:51', 'simple', NULL, '2024-03-19 10:28:02'),
(157, '20240319311', 'Application letter /One Family One Professional Scholarship Program', 23, 21, NULL, 48, 'Ms. Nikki P. Villacarlos-3rd year College -Bachelor of Science in Criminology in Southern Capital Colleges Oroquieta City.', 'pending', NULL, 'simple', NULL, '2024-03-19 10:33:36'),
(158, '20240319312', 'SK(CBYDP) Barangay Dullan Sur Oroquieta City', 23, 21, NULL, 64, 'CBYDP- Barangay Dullan Sur Oroquieta City -attached Resolution No,003 Series of 2023', 'pending', NULL, 'simple', NULL, '2024-03-19 10:41:51'),
(159, '20240319313', 'SK(ABYIP) Barangay Dullan Sur oroquieta City', 23, 21, NULL, 63, 'SK-ABYIP-Barangay Dullan Sur Oroquieta City-Attached Resolution No.004 Series of 2024', 'pending', NULL, 'simple', NULL, '2024-03-19 10:44:57'),
(160, '20240319314', 'Leave Application - Hipos (March 20, 2024)', 13, 21, NULL, 60, 'for approval', 'pending', NULL, 'complex', NULL, '2024-03-19 10:45:38'),
(161, '20240319315', 'Communication Letter/ PHILPPINES ASSOCIATION OF AGRICULTUREIST,INC', 23, 21, NULL, 48, 'In this Connection, we would like to respectfully seek your approval allowing Licensed Agriculturist and agricultural practitioners under your authority to participate in the aforementioned activities.', 'pending', NULL, 'simple', NULL, '2024-03-19 10:55:49'),
(162, '20240319316', 'Notice of Special Meeting (OCEMCO)', 23, 21, NULL, 55, 'It is hereby informed that the OCEMCO Board of Directors well meet for Special Meeting on Tuesday ,March 19 2024 1;00 pm, at the OCIGEA Office Oroquieta City, Town Center.', 'completed', '2024-04-02 14:45:20', 'simple', NULL, '2024-03-19 11:57:22'),
(163, '20240319317', 'MEMORANDUM ORDER NO.107-2024', 23, 21, NULL, 56, 'We are pleased to inform you that the home Development Mutual Fund (HDMF) or he Pag-IBIG fund will visit Oroquieta City on April 3-5 2024 to bring their services to their members its Lingkod Pag-IBIG on Wheels(LPOW)-Thus,we are inviting you and all employees under your direct supervision to grab this opportunity of availing Pag IBIG services.', 'completed', '2024-03-22 14:42:05', 'simple', NULL, '2024-03-19 13:48:36'),
(164, '20240319318', 'SK-ABYIP- Barangay Toliyok Oroquieta City', 23, 21, NULL, 63, 'SK-ABYIP- Barngay Toliyok Oroquieta City-attached Resolution No.02-series -2024', 'pending', NULL, 'simple', NULL, '2024-03-19 13:52:14'),
(165, '20240319319', 'SK(CBYDP) Barangay Toliyok Oroquieta City', 23, 21, NULL, 64, 'SK-CBYDP-Barangay Toliyok Oroquieta City- Attached Resolution No.01-Series-2024', 'pending', NULL, 'simple', NULL, '2024-03-19 13:54:50'),
(166, '20240320320', 'Communication Letter From Dole', 23, 21, NULL, 48, 'DOLE FUN RUN: Dagan para sa mamumuno', 'completed', '2024-04-02 14:45:32', 'simple', NULL, '2024-03-20 17:00:19'),
(167, '20240320321', 'Advisory From DILG', 23, 21, NULL, 48, 'Regarding the submission of skills training requirements of barangays for implementation of the technical education and skills development authority(TESDA) sa barangay program', 'completed', '2024-04-02 14:45:48', 'simple', NULL, '2024-03-20 17:02:40'),
(168, '20240321322', 'MEMORANDUM NO. ORDER No. 115-2024', 23, 21, NULL, 56, 'In view of the culmination program of the Women\'s Month celebration on 21 March 2024\' All participating LGU employees are allowed to attend the said activity on official time. However, each office shall immediately submit a list of participant to the Human Resource Management Office.', 'completed', '2024-03-22 14:50:44', 'simple', NULL, '2024-03-21 09:08:10'),
(169, '20240321323', 'NOTICE OF MEETING/City Project monitoring', 23, 21, NULL, 55, 'Please be informed that the Project Monitoring Committee will conduct an inspection of he following projects on March 21-2024, Thursday at 1;00 in the afternoon./NAME OF PROJECT-Improvement of covert court at Barangay Papayan.', 'completed', '2024-04-08 11:14:28', 'simple', NULL, '2024-03-21 09:16:48'),
(170, '20240321324', 'Application letter /One Family One Professional Scholarship Program', 23, 21, NULL, 48, 'Applying one Family one professional Scholarsip Program-Ms.JHMBY M.ERIBUAGAS,21 Years old, Purok 4 Upper Loboc Oroquieta City 3rd year college student -BS Nursing-Jose Rizal Memorial State University Dapitan City\'', 'pending', NULL, 'simple', NULL, '2024-03-21 09:24:36'),
(171, '20240321325', 'Application letter /One Family One Professional Scholarship Program', 23, 21, NULL, 48, 'Applying One Family One Scholarship Program -ALMAE R.BAROT- Purok 1 Dolipos Bajo Oroquieta City -3rd year College - Jose Memorial State University-Main Campos.', 'pending', NULL, 'simple', NULL, '2024-03-21 11:19:08'),
(172, '20240321326', 'NOTICE OF MEETING/ City Health Office Oroquieta City', 23, 21, NULL, 55, 'You are respectfully requested to attend an Orientation on how to conduct the monitoring and evaluation of Local Level Plan Implementation (MELLPI Pro)  of Nutrition Program in the Barangay Level. This Activity will be held On March 26,2024 Tuesday 8;30 am -5;00 pm at City health Office Conference Room 3rd floor City  Hall Annex Bldg,Oroq.City', 'pending', NULL, 'simple', NULL, '2024-03-21 11:30:02'),
(173, '20240321327', 'SKMT(CBYDP) Barangay Buntawan Oroquieta City', 23, 21, NULL, 64, 'SK(CBYDP)- Barangay Buntawan Oroquieta City-Attached Resolution No,01-Sereis -2024', 'pending', NULL, 'simple', NULL, '2024-03-21 11:36:06'),
(174, '20240321328', 'SK(ABYIP) Barangay  Buntawan OroquietaCity', 23, 21, NULL, 63, 'SK(ABYIP) Barangay Buntawan  Oroquieta City- Attached Resolution No.02-Series -2024', 'pending', NULL, 'simple', NULL, '2024-03-21 11:39:18'),
(175, '20240321329', 'MEMORANDUM ORDER NO.109-2024', 23, 21, NULL, 56, 'ALL CHIEF OF OFFICE-The City Government of Oroquieta through the City Health Office will Conduct  a Bloodletting Activity on 03 April 2024,8;00 AM-3;00 Pm at the City Health Office. In view of this ,you and the employees under your supervision are enjoined to participate as donors during this benevolent endeavor', 'completed', '2024-03-22 14:51:07', 'simple', NULL, '2024-03-21 13:26:29'),
(176, '20240321330', 'Application letter /One Family One Professional Scholarship Program', 23, 21, NULL, 48, 'Applying One Family One Professional Scholarship Program, POLIRAN ERICKSON EDEROSAS- 20 years old ,Purok 3 barangay Canubay Oroquieta City-2nd year College -University of Science and Technology of Southern Philippines  Oroquieta,', 'pending', NULL, 'simple', NULL, '2024-03-21 15:52:27'),
(177, '20240322331', 'Leave Application - Español (April 8, 2024)', 13, 21, NULL, 60, 'for approval', 'completed', '2024-03-26 11:28:09', 'complex', NULL, '2024-03-22 09:22:35'),
(178, '20240322332', 'Leave application - Chua (April 8, 2024)', 13, 21, NULL, 60, 'for approval', 'completed', '2024-03-26 17:04:21', 'complex', NULL, '2024-03-22 09:32:30'),
(179, '20240322333', 'ADVISORY/REGIONAL PEACE AND ORDER COUNCIL', 23, 21, NULL, 48, 'Dissemination of pertinent guidance and reference materials during the RPOC10 CY-2024 1st quarter meeting -March 13,2024', 'pending', NULL, 'simple', NULL, '2024-03-22 09:47:20'),
(180, '20240322334', 'Application letter /One Family One Professional Scholarship Program', 23, 21, NULL, 48, 'Ms.Christine  Abegail B. Bacus -20 years old Purok 4 Upper Riazl Oroquieta City -2nd year  college of University of Science And Technology of Southern Philippines.', 'pending', NULL, 'simple', NULL, '2024-03-22 09:53:01'),
(181, '20240322335', 'Application letter /One Family One Professional Scholarship Program', 23, 21, NULL, 48, 'Arvin C. Uba -20 years old -Upper Rizal oroquieta City ,2nd year College  of Southern Capital Colleges, Bachelor of Science in Criminology.', 'pending', NULL, 'simple', NULL, '2024-03-22 09:58:46'),
(182, '20240322336', 'MEMORANDUM ORDER NO.114-2024', 23, 21, NULL, 56, 'In view of this, you are hereby designated as resource person during the Mandatory Training for the Members of the LYDC on March 2024,tuesday 8;00 A.M to 5;00 P.M at the E-Learning Center,Oroquieta City.', 'pending', NULL, 'simple', NULL, '2024-03-22 13:39:34'),
(183, '20240322337', 'SK (CBYDP) Barangay Apil Oroquieta City', 23, 21, NULL, 64, 'SK.(CBYDP)-Barangay Apil Oroquieta  Attached Resolution No.2024-01-004', 'pending', NULL, 'simple', NULL, '2024-03-22 15:33:37'),
(184, '20240322338', 'SK(ABYIP) Barangay Apil Oroquieta City', 23, 21, NULL, 63, 'SK.(ABYIP)-Barangay Apil Oroquieta City Attached Resolution No.2024-01-004', 'pending', NULL, 'simple', NULL, '2024-03-22 15:35:50'),
(185, '20240322339', 'Application letter /One Family One Professional Scholarship Program', 23, 21, NULL, 63, 'Alvin D.Caylan Purok 1 BarangayTaboc Sur Oroquieta City .USTP.', 'pending', NULL, 'simple', NULL, '2024-03-22 16:17:07'),
(186, '20240325340', 'Notice of Postponement/City Health Office', 23, 21, NULL, 55, 'Please be advised that the following schedule was cancelled and re-scheduled;', 'pending', NULL, 'complex', NULL, '2024-03-25 09:57:11'),
(187, '20240325341', 'MEMORANDUM NO 118-2024/ OCM', 23, 21, NULL, 56, 'DESIGNATION TO TAKE CHARGE OF OFFICE- Effective 26 March 2024,whilethe undersigned is on official business in connection to his official travel to Manila, until his return, you are hereby officially designated to take charge of the office of the City Mayor.', 'pending', NULL, 'simple', NULL, '2024-03-25 10:20:11'),
(188, '20240325342', 'NOTICE OF MEETING/OCM', 23, 21, NULL, 55, 'You are respectfully requested to attend a meeting on 25 March 2024 1;30 P>M at the OCIGEA office, Oroquieta City town Center ,Barangay Canubay, this City.Important Matters regarding the GAD Plan and Budget Formulation shall be Discussed.', 'completed', '2024-04-02 14:46:02', 'simple', NULL, '2024-03-25 10:23:39'),
(189, '20240325343', 'NOTICE OF MEETING /LYDC', 23, 21, NULL, 55, 'Please be informed  that the Mandatory training for the member of the Local Youth Development Council (LYDC)on 26 March 2024 is rescheduled on April 2024.', 'pending', NULL, 'simple', NULL, '2024-03-25 14:35:17'),
(190, '20240325344', 'NOTICE OF MEETING.', 23, 21, NULL, 55, 'You are respectfully requested to attend follow-up Meeting on 26 March 2024, 1:00 P.m.-3:00 P>M at the E-Learning Center ,City Library, Canubay ,This City, to discuss very important matter to the implementation of livelihood Project for Barangay Sibucal.', 'pending', NULL, 'simple', NULL, '2024-03-25 15:19:07'),
(191, '20240325345', 'NOTICE OF MEETING', 23, 21, NULL, 55, 'You respectfully requested to attend a consultation meeting on 26 March 2024,3:00-P-M 4:30 P.M at the E-Learning Center, City Library, Canubay, this  City, To discuss very Important matter related to the invitation for Araw ng Sibucal.', 'completed', '2024-03-26 16:02:59', 'simple', NULL, '2024-03-25 15:29:56'),
(192, '20240325346', 'Application letter /One Family One Professional Scholarship Program', 23, 21, NULL, 48, 'NERYL UBA SUMILHIG 19 years old -Purok 2 Barangay Upper Rizal, Oroquieta City,-2nd year college at Southern Capital Colleges-BS- Criminology,', 'pending', NULL, 'simple', NULL, '2024-03-25 15:39:44'),
(193, '20240325347', 'Application letter /City  Scholarship Program', 23, 21, NULL, 54, 'Jane Mary S, Serbo -2nd year College-Bachelor of Secondary Education at Misamis University ,Oroquieta Branch.', 'completed', '2024-04-02 14:57:57', 'simple', NULL, '2024-03-25 16:02:15'),
(194, '20240325348', 'Justification letter - City Scholarship Program', 23, 21, NULL, 68, 'Cary G. Tamine Jr.-For not being active to comply the the renewal .', 'completed', '2024-04-02 14:58:11', 'simple', NULL, '2024-03-25 17:02:53'),
(195, '20240326349', 'Leave Application - Markinez (April 7 - May 3, 2024)', 13, 21, NULL, 60, 'for approval', 'pending', NULL, 'complex', NULL, '2024-03-26 09:15:08'),
(196, '20240326350', 'NOTICE OF MEETING/ 4Ps', 23, 21, NULL, 55, 'Requested to attend the 4Ps Meeting on 27 March 2024,9:00 A.M at Barangay Layawan Covert Court,', 'pending', NULL, 'simple', NULL, '2024-03-26 10:01:03'),
(197, '20240326351', 'NOTICE -Pag-IBIG Fund', 23, 21, NULL, 49, 'Lingkod Pag-IBIG on wheels (LPOW) of the Home Development Mutual Fund (HDMF) or the Pag-IBIG fund is reschedule on April 11-12,2024', 'pending', NULL, 'simple', NULL, '2024-03-26 10:43:20'),
(199, '20240326353', 'Application letter /One Family One Professional Scholarship Program', 23, 21, NULL, 48, 'CARYL H.DINOROG-Barangay Lower Loboc  Oroquieta City ,3rd year College -Misamis University,Ozamis City.', 'pending', NULL, 'simple', NULL, '2024-03-26 11:06:19'),
(200, '20240326354', 'Application letter /One Family One Professional Scholarship Program', 23, 21, NULL, 48, 'HONEY JEL O.DAPIN -19 years old -Brangay Proper Langcangan ,Oroquieta City, Misamis University Oroquieta City Unit-,Bachelor of Science in Business Administration.', 'pending', NULL, 'simple', NULL, '2024-03-26 11:11:26'),
(201, '20240326355', 'Application letter /One Family One Professional Scholarship Program', 23, 21, NULL, 48, 'MARJORIE SHEIN M. ENERIO -Barangay Dullan Norte Oroquieta City, 3rd year College in Misamis University Ozamiz City,', 'pending', NULL, 'simple', NULL, '2024-03-26 11:16:12'),
(202, '20240326356', 'Application letter /One Family One Professional Scholarship Program', 23, 21, NULL, 48, 'VIBIEN MAE F.PAUSANOS- 20 years old Barangay Upper Langcangan Oroquieta City,', 'pending', NULL, 'simple', NULL, '2024-03-26 11:25:06'),
(203, '20240326357', 'Application letter /One Family One Professional Scholarship Program', 23, 21, NULL, 48, 'CHRISMAR JUNEL L.CELLAN -20 years old Resident of Purok 6 San Vicente Bajo,Oroquieta City,', 'pending', NULL, 'simple', NULL, '2024-03-26 11:29:23'),
(204, '20240326358', 'Communication Letter/ Department Of Science and Technology( DOST)', 23, 21, NULL, 48, '2nd INTERNATIONAL SMART CITY EXPOSITION AND NETWORKING ENGAGEMENT (ISCENE 2024) on 11-13 April 2024,In this connection, we are enjoining you and your concerned staff to participate in the said event.', 'completed', '2024-04-02 14:54:47', 'simple', NULL, '2024-03-26 11:38:37'),
(205, '20240326359', 'MEMORANDUM ORDER -No.120-2024/ Grant of Collective Negotition  Agreement.', 23, 21, NULL, 56, 'The grant of Collective Negotition  Agreement(CNA) 2023 ,you are hereby directed to submit your respective office\'s CY2023 Accomplishment Report covering the period January 1,2023 until September 30,2023', 'pending', NULL, 'simple', NULL, '2024-03-26 14:29:02'),
(206, '20240326360', 'MEMORANDUM ORDER -No.122-2024 -Work Suspension', 23, 21, NULL, 56, 'Half work Suspension shall be implemented on 27 March 2024,Holy Wednesday ,from1;00 P.M to 5;00 P.M. in all local offices of the City Government of Oroquieta.', 'pending', NULL, 'simple', NULL, '2024-03-26 14:34:27'),
(207, '20240326361', 'PURCHASE ORDER-HABITACION CORPORATION', 23, 21, NULL, 53, 'OCM/CPESD -Cooperative information Caravan and coaching in the preparation of he required 2023 Annual Report on February 21,2024.', 'pending', NULL, 'simple', NULL, '2024-03-26 14:50:41'),
(208, '20240326362', 'REQUEST FOR INDORSEMENT/ One Family One Professional Scholarship Program.', 23, 21, NULL, 48, 'KEITH BRYONE D.PUGA- 19 years old - Purok 2 Barangay Tuyabang Proper, Oroquieta City ,Request an Endorsement Letter.', 'pending', NULL, 'simple', NULL, '2024-03-26 16:46:55'),
(209, '20240326363', 'REQUEST FOR INDORSEMENT/ One Family One Professional Scholarship Program.', 23, 21, NULL, 48, 'MARIELA V.RAMIREZ-PUROK 1 DULAPO, OROQUIETA CITY,', 'pending', NULL, 'simple', NULL, '2024-03-26 16:52:39'),
(210, '20240326364', 'REQUEST FOR INDORSEMENT/ One Family One Professional Scholarship Program.', 23, 21, NULL, 48, 'JHINO C.ASENTISTA -20 years old resident of Purok 1-A Dolipos Bajo, Oroquieta City ,Request an endorsement Letter.', 'pending', NULL, 'simple', NULL, '2024-03-26 16:56:47'),
(211, '20240326365', 'Application letter /One Family One Professional Scholarship Program', 23, 21, NULL, 48, 'HYACINTH B.RAMIRES- Purok 1 Dulapo Oroquieta City ,3rd year College in Northwestern Mindanao State College of Science and Technology Tangub City.', 'pending', NULL, 'simple', NULL, '2024-03-26 17:01:26'),
(212, '20240327366', 'NOTICE OF MEETING/ Asenso Labor Day Job Fair.', 23, 21, NULL, 55, 'Requested(or your authorized representative )to attend a meeting on 02 April 2024,9:00 A.M at the E-Learning Center, City Library, Canubay, this City.', 'completed', '2024-04-02 14:42:06', 'simple', NULL, '2024-03-27 08:31:35');
INSERT INTO `documents` (`document_id`, `tracking_number`, `document_name`, `u_id`, `offi_id`, `origin`, `doc_type`, `document_description`, `doc_status`, `completed_on`, `destination_type`, `note`, `created`) VALUES
(213, '20240327367', 'MEMORANDUM ORDER NO.124-2024-LYDC', 23, 21, NULL, 56, 'In view of this, you are hereby designated as resource speaker during the Mandatory Training for the Local Youth Development Council (LYDC) on 15 April 2024,8:00 AM, at  the E- LearningCenter,Oroquieta Town Center,', 'completed', '2024-04-02 14:58:25', 'simple', NULL, '2024-03-27 09:20:38'),
(214, '20240401368', 'Application letter / One Family One Professional Scholarship Program', 23, 21, NULL, 48, 'BERNALYN TURNO BUHIAN-19 years old -Purok 3- Barangay Talic, Oroquieta City 1st year College -USTP. I am writing to request consideration for your Scholarship Program.', 'pending', NULL, 'simple', NULL, '2024-04-01 10:46:43'),
(215, '20240401369', 'Application letter /One Family One Professional Scholarship Program', 23, 21, NULL, 48, 'JANE MARY S. SERBO-19 years old -Purok 3- Barangay Talic, Oroquieta City 2nd year College -USTP. I am writing to request consideration for your Scholarship Program.', 'pending', NULL, 'simple', NULL, '2024-04-01 10:52:35'),
(216, '20240401370', 'Application letter /One Family One Professional Scholarship Program', 23, 21, NULL, 48, 'HANNAH PEARL I. LAPAD 21 years old -Purok 4- Barangay Talic, Oroquieta City 3rd year College -Criminology at Misamis University , Oroquieta City. request consideraion for your scholarship program.', 'pending', NULL, 'simple', NULL, '2024-04-01 10:58:12'),
(217, '20240401371', 'Application letter /One Family One Professional Scholarship Program', 23, 21, NULL, 48, 'JHONA MAE L. PAHILANGCO- 21 years old. Resident of Purok 4 Barangay Talic Oroquieta City 3rd year College - Business Administration at Jonh Buco Colegio De Jimenes. request consideration for your cholarship program.', 'pending', NULL, 'simple', NULL, '2024-04-01 11:02:38'),
(218, '20240401372', 'Application letter /One Family One Professional Scholarship Program', 23, 21, NULL, 48, 'CLARK TIGOLO-20 years old Resident of Purok 6 Barangay Talic,  Oroquieta City,2nd year College- Bachelor of Criminology at Sothern Capital Colleges Oroquieta City. Request consideration for your scholarship Program.', 'pending', NULL, 'simple', NULL, '2024-04-01 11:08:06'),
(219, '20240401373', 'Application letter /One Family One Professional Scholarship Program', 23, 21, NULL, 48, 'DIONISIO MARCOJOS JR. 20 years old ,resident of Purok 4, Barangay Talic  Oroquieta City.2nd year College -Bachelor of Criminology ,Southern Capital Colleges Oroquieta City, I am writing  a request consideration for your Scholarship Program.', 'pending', NULL, 'simple', NULL, '2024-04-01 11:13:20'),
(220, '20240401374', 'NOTICE OF MEETING/City Project Monitoring Committee', 23, 21, NULL, 48, 'Project Monitoring Committee will conduct an inspection of the following projects on April 1, 2024 Monday at 1:30 in the Afternoon,-Name of Project- Improvement of Tuyabang Proper Multi--Purpose-DDS Builders- Php925,042.97.', 'completed', '2024-04-08 11:14:10', 'complex', 'Empty Note NA FILE NA.', '2024-04-01 11:29:19'),
(221, '20240401375', 'Request Letter-DOLE.', 23, 21, NULL, 58, 'In this regard / all concerned DOLE Provincial/Field Offices are hereby requested to submit  success stories of the finishers of the special Program for Employment of Student.(SPES).', 'pending', NULL, 'simple', NULL, '2024-04-01 12:00:05'),
(222, '20240401376', 'NOTICE OF MEETING/ CMCI', 23, 21, NULL, 55, 'The Local government unit of Oroquieta  joins this annual survey and we are  pleased to invite you to the upcoming CMCI Orientation, Data Validation and Capacity Building Session ,This will take place on April 8,2024 starting 9;00 A-M to 5;00 P.M at 3rd Floor CHO Conference Hall Annex Building  Poblacion 2,Oroquieta City.', 'completed', '2024-04-02 14:42:41', 'simple', NULL, '2024-04-01 14:28:34'),
(223, '20240401377', 'Application letter /One Family One Professional Scholarship Program', 23, 21, NULL, 48, 'JAN MICHAEL S.TALADUA-Upcoming 3rd year College - MIT Ozamiz City.', 'pending', NULL, 'simple', NULL, '2024-04-01 14:39:04'),
(224, '20240401378', 'Application letter /One Family One Professional Scholarship Program', 23, 21, NULL, 48, 'IAN A. IDIAS-Purok 7- Barangay Talic  Oroquieta City -Bachelor of Science in Information Technology at USTP--Request your esteemed recommendation for One Family One Professional Scholarship Program.', 'pending', NULL, 'simple', NULL, '2024-04-01 15:12:18'),
(225, '20240401379', 'Application letter /One Family One Professional Scholarship Program', 23, 21, NULL, 48, 'KECIE CLEAR A. ANGHAG - Purok 7, Barangay Talic Oroquieta City, -1st College -Bachelor in Business  Administration, at Dr.Solomon Molina College. Request your assistance and recommendation for one Family One Professional Scholarship Program.', 'pending', NULL, 'simple', NULL, '2024-04-01 15:27:56'),
(226, '20240401380', 'Application letter /One Family One Professional Scholarship Program', 23, 21, NULL, 48, 'MARECRIS G.HONDO- 33 years old Purok 7 Barangay Talic Oroquieta City, 2nd year College-Bachelor of Science in Information Technology at USTP.To request your esteemed recommendation for the One Family One Professional Scholarship Program.', 'pending', NULL, 'complex', NULL, '2024-04-01 15:51:05'),
(227, '20240401381', 'Letter of Intend/ Incentives Latin Honors', 23, 21, NULL, 48, 'JEDEL RACE T. ESPARAGOZA-Purok 6 Upper Langcangan , Oroquieta City,- Considering this, i intend to submit my application to claim the cash incentive mentioned in the City ordinance No.839-2019.', 'completed', '2024-04-02 14:58:39', 'simple', NULL, '2024-04-01 16:00:09'),
(228, '20240402382', 'Communication Letter-CDA', 23, 21, NULL, 48, 'Being one of our active partners in assisting and working for Cooperative development in Oroquieta City ,we would like to invite Ms. Marilou  I.Gumapac to attend the Cooperative Complience Drive  that will be held at  Alona Summer Breeze Resort  Hotel at Dela Paz,Panaon Misamis Occidental on April 3,2024 .', 'pending', NULL, 'simple', NULL, '2024-04-02 09:35:15'),
(229, '20240402383', 'LETTER OF INTENT/ TOSEVIL', 23, 21, NULL, 48, 'Respectfully informed that we officers and members of Toliyok- Senote-Villaflor Swine Raiser Community Association, Humbly request to support us by augmentation/adding our current operating investment in the amount of three hundred Thousand  Pesos  to increase our swine production operation from breeding to fattening.', 'pending', NULL, 'simple', NULL, '2024-04-02 10:28:40'),
(230, '20240402384', 'Application letter /One Family One Professional Scholarship Program', 23, 21, NULL, 48, 'RUDYLREE S.JARDEN- Purok 7 barangay Dullan \r\n Sur Oroquieta City 3rd year college at Southern Capital Colleges.', 'pending', NULL, 'simple', NULL, '2024-04-02 10:34:03'),
(231, '20240402385', 'ADVISORY/  6th National Youth  Environmntal Summit.', 23, 21, NULL, 48, 'Please be reminded that all delegates must Pre-register ONLINE by filling up the form contained in this link:hhtps://forms.gle/Bt4HsXkOGHeUZg2T8.', 'pending', NULL, 'simple', NULL, '2024-04-02 10:42:08'),
(232, '20240402386', 'Communication Letter/Pag- IBIG fund', 23, 21, NULL, 48, 'In view hereof, may we seek your permission that we be allowed to conduct group meeting or orientations to the Market Vendors and Transport operators doing business in the public Market  to inform and enlighten them with the various program and benefits that may enjoy as a member.', 'pending', NULL, 'simple', NULL, '2024-04-02 16:33:31'),
(233, '20240403387', 'Application letter /One Family One Professional Scholarship Program', 23, 21, 70, 48, 'ASNERAH U.PUNGUINA-Purok 2 Talairon Oroquieta City -3rd year College in Misamis University -Oroquieta unit,taking Bachelor  of Science in Business Administration Major in Financial Management.', 'pending', NULL, 'simple', NULL, '2024-04-03 16:39:23'),
(234, '20240403388', 'MEMORANDUM NO.Rox -2024-03-61/DOLE', 23, 21, 81, 56, '2024 NATIONAL SEARCH FOR BEST PESO-March 25-2024', 'pending', NULL, 'simple', NULL, '2024-04-03 16:43:42'),
(235, '20240403389', 'Communication Letter/OASIA GLOBAL RESOURCES INC.', 23, 21, 21, 49, 'May we request from your good office approval to conduct FACE TO FACE SPECIAL RECRUITMENT ACTIVITY(SRA) on , May 9 and 10 2024 at PESO OFFICE of OROQUIETA CITY MISAMIS OCCIDENTAL.', 'pending', NULL, 'simple', NULL, '2024-04-03 16:54:00'),
(236, '20240403390', 'Communication Letter/ KBGAN MARKETING COOPERATIVE', 23, 21, 21, 49, 'Please be informed that the KBGAN Marketing Cooperative will  hold a General Assembly on April 7,2024 at MJ Farm ,Purok 2 Villaflor Oroquieta City to start at 10;00 A.M.', 'completed', '2024-04-08 11:02:20', 'simple', NULL, '2024-04-03 17:00:06'),
(237, '20240404391', 'Application letter /One Family One Professional Scholarship Program', 23, 21, 70, 48, 'FRANC ERIC B. BUAC -22 Year old  resident of Barangay Talairon, Oroquieta City -3rd year College -BS Nursing at Cagayan de Oro College ,Cagayan de Oro City.', 'pending', NULL, 'simple', NULL, '2024-04-04 09:35:00'),
(238, '20240404392', 'Application letter /One Family One Professional Scholarship Program', 23, 21, 70, 48, 'JYPEE M.AMBOANG 21 years old Resident of Purok 3 Barangay Talic ,2nd year College- Southern Capital Colleges. taking  up Bachelor of Science in Criminology.', 'pending', NULL, 'simple', NULL, '2024-04-04 09:39:32'),
(239, '20240404393', 'Application letter /One Family One Professional Scholarship Program', 23, 21, 70, 48, 'LOVELY SHEENA L. LICO-21 years Old Resident in Purok 1 Barangay Villaflor, Oroquieta Cirty.3rd year College student pursuing a Bachelor of Science in Social Social Work at La Salle University(LSU)', 'pending', NULL, 'simple', NULL, '2024-04-04 09:49:35'),
(240, '20240404394', 'Application letter /One Family One Professional Scholarship Program', 23, 21, 70, 48, 'DESERIE JOYCE DUHAYLUNGSOD-20 years old resident Purok 6 ,Barangay Mobod Oroquieta City -incoming 3rd year BS in Nursing at Cagayan De Oro College, Cagayan de Oro City .', 'pending', NULL, 'simple', NULL, '2024-04-04 10:05:24'),
(241, '20240404395', 'MEMORANDUM NO.BLE-JSP-04 01-2024 DOLE', 23, 21, 81, 56, 'IMPLEMENTATION OF JOBSTART PHILLPINES(JSP)FOR FISCAL YEAR 2024 Date-04,2024', 'pending', NULL, 'simple', NULL, '2024-04-04 10:44:38'),
(242, '20240404396', 'Communication Letter/ (SPES)', 23, 21, 70, 48, 'Please be informed that the Provincial Government has alloted  twenty (20) slots for your City,For facilitation, may we request to submit the list of your beneficiaries profiled by the Peso in your City in  accordance with the requirements /qualification of program ,Furthermore  the beneficiaries for this program must not be grantees of the One Family One professional Program.', 'pending', NULL, 'simple', NULL, '2024-04-04 10:53:49'),
(243, '20240404397', 'MEMORANDUM NO. 04-02-2024/ DOLE', 23, 21, 81, 56, 'SUBJECT BUILDING AND ORIENTATION PLANNING ACTIVITY FOR FY 2024 JOBSTART PHILLIPINES PROGRAM IMPLEMENTERS-', 'pending', NULL, 'simple', NULL, '2024-04-04 14:06:04'),
(244, '20240404398', 'INFORMATION  Letter/ DOLE-(CAPESOMO)', 23, 21, 70, 48, 'The PESO Managers of the province of Misamis Occidental will be having its MEETING cum LEARNING SESSION this coming April 5,2024,friday,8;00 -A.M - 5:00 P.M at Calamba, Misamis Occidental.', 'pending', NULL, 'simple', NULL, '2024-04-04 16:03:45'),
(246, '20240405399', 'Leave Application - Buta (April 5, 2024)', 13, 21, 21, 60, 'for approval', 'pending', NULL, 'simple', NULL, '2024-04-05 15:30:52'),
(247, '20240405400', 'Application letter /One Family One Professional Scholarship Program', 23, 21, 70, 48, 'ALVIN PALER BANTILAN-pUROK 1 Barangay Talic Oroquieta City-1st year College -Bachelor of Science in Criminolgy in Southern Capital Colleges.', 'pending', NULL, 'simple', NULL, '2024-04-05 15:43:57'),
(248, '20240405401', 'Communication Letter/  LCDOP', 23, 21, 70, 48, 'INVITATION TO THE 1ST MINDANAO ISLAND -WIDE COOPERATIVE DEVELOPMENT OFFICERS CONFERENCE, This significant event is scheduled to take place on May 29-30,2024- at diyandi Function Hall Robinson Place Complex Iligan City.', 'pending', NULL, 'simple', NULL, '2024-04-05 15:51:31'),
(249, '20240405402', 'NOTICE OF MEETING/City Project monitoring Committee', 23, 21, 70, 55, 'Please be informed that the Project Monitoring Committee will conduct an inspection of the following project on April 16-19 2024, tuesday to Friday at 5:00 o\'colock in the Morning.--Mialen-Sebucal FMR-Concreting of Barangay Sebucal Trail to Sebucal Hotspring ,Revised,', 'cancelled', NULL, 'simple', NULL, '2024-04-05 16:01:30'),
(250, '20240405403', 'Application letter /One Family One Professional Scholarship Program', 23, 21, 70, 48, 'JEANIE LOU TORREGOSA-20 years old resident of Purok 1 Barangay Bolibol Oroquieta City, 2nd year College this sem. in Misamis University ,Oroquieta City-taking Bachelor Of Science in Information Technology.', 'cancelled', NULL, 'simple', NULL, '2024-04-05 16:05:36'),
(251, '20240405404', 'Application letter /One Family One Professional Scholarship Program', 23, 21, 70, 48, 'ROMAR O.CORONEL 22 years old ,3rd College Purok 2 Barangay Talic Oroq, City,taking Bachelor of Science in Marine Transportation  at MIT,Ozamiz City', 'cancelled', NULL, 'simple', NULL, '2024-04-05 16:10:53'),
(252, '20240405405', 'Application letter /One Family One Professional Scholarship Program', 23, 21, 70, 48, 'MARV JETHRO E. EDIOS- 19 YEARS OLD RESIDENT OF PUROK 6 BARANGAY TALIC OROQ,CITY. 3rd year College - Bachelor Of Science in Marine Transportation.', 'cancelled', NULL, 'simple', NULL, '2024-04-05 16:15:01'),
(253, '20240405406', 'Application letter /One Family One Professional Scholarship Program', 23, 21, 70, 48, 'JASTENE A. CASTANOS, 19 years old, Purok-6, Talic, Oroquieta City Bachelor of Science in Marine Transportation- Missamis Occidental Institute Technology.', 'cancelled', NULL, 'simple', NULL, '2024-04-05 16:20:20'),
(254, '20240405407', 'Application letter /One Family One Professional Scholarship Program', 23, 21, 70, 48, 'Daniel P. Bonilla, Purok- 6 Talic Oroquieta City. BS Marine Transportation- Misamis Institute of Technology.', 'cancelled', NULL, 'simple', NULL, '2024-04-05 16:22:39'),
(255, '20240405408', 'Communication Letter/Philippine Association of Agriculture', 23, 21, 70, 48, 'We like to respectfully seek your approval allowing Mr. Mark Anthony Artigas being one PAA member and other LGU Agricultural Practitioners under your authority to attend this Continuing Professional Development (CPD) Training- convention in the flied of Agriculture and related science that it one way or the other strengthen their expertise and can deliver efficiently and effectively their task and functions and ultimately support our end clientele in the academe, industry and private sectors. April 23 Registration, April 24-26, 2024. At Davao Del Norte Sports and Tourism Complex Gym, Capitol Compound, Makilam, Tagum City, Davao del Norte.', 'cancelled', NULL, 'simple', NULL, '2024-04-05 16:35:14'),
(256, '20240405409', 'Communication Letter/Capstone', 23, 21, 70, 49, 'We are humbly asking your distinguish institution if we could partner with you to be our students\' client for their capstone project.', 'cancelled', NULL, 'simple', NULL, '2024-04-05 16:39:02'),
(257, '20240405410', '1st Indorsement 05 ,2024/ SP-Association-Tuyabang Bajo', 23, 21, 70, 48, 'The herein application of Comprehensive Agrarian Reform Program Beneficiaries Association- Purok-2 Tuyabang Bajo.', 'cancelled', NULL, 'simple', NULL, '2024-04-05 17:00:38'),
(258, '20240408411', 'INSPECTION RESULT', 14, 21, 21, 49, '*Best in Job Vacancy Submission\r\n*Best in Job Placement\r\n*Bes in Job Placement Report Submission\r\n\r\n\r\n*Robinson Supermarket Folder About Compliance\r\n*Freemont Foods Corporation Jollibee Oroquieta - Segregated Hired Workers from Freemont to Jolly Management Solutions.', 'pending', NULL, 'simple', NULL, '2024-04-08 09:14:32'),
(259, '20240408412', 'Information Letter/DPWH', 23, 21, 70, 48, 'Furnished is the Monthly Status Report of Infrastructure Projects implemented in the City of Oroquieta as of March 2024 for your information and Guidance.', 'pending', NULL, 'simple', NULL, '2024-04-08 09:30:31'),
(260, '20240408413', 'Confirmation  Slip/Good life Insurance Agency Co.', 23, 21, 21, 49, 'YES ,We will participate-/representative attend 2,./FINANCIAL ADVISOR/ ACCOUNT COLLECTOR.', 'pending', NULL, 'simple', NULL, '2024-04-08 10:39:20'),
(261, '20240408414', 'Justification letter - OFOP', 23, 21, 70, 68, 'MR. VINCENT N. DAJAO -Purok 1 Proper Langgcangan ,Oroquieta City -Addtionally, I have encountered  academic setback, resulting in an incomplete grade. I acknowledge  this issue  and take full responsibility for it, I am committed to rectifying this situation and completing  the necessary  requirements by thursday  of this week.', 'completed', '2024-04-11 09:40:32', 'simple', NULL, '2024-04-08 11:49:13');

-- --------------------------------------------------------

--
-- Table structure for table `document_types`
--

CREATE TABLE `document_types` (
  `type_id` int(11) NOT NULL,
  `type_name` varchar(150) NOT NULL,
  `created` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `document_types`
--

INSERT INTO `document_types` (`type_id`, `type_name`, `created`) VALUES
(48, '1st Indorsement', '2024-02-26 19:39:04'),
(49, 'Others', '2024-02-27 15:33:13'),
(50, 'Executive Order', '2024-03-01 22:46:16'),
(51, 'SP Resolution', '2024-03-01 22:46:30'),
(52, 'Travel Order', '2024-03-01 22:47:07'),
(53, 'Purchase Request', '2024-03-01 22:47:25'),
(54, 'Application Letter', '2024-03-01 22:48:03'),
(55, 'Notice of Meeting', '2024-03-01 22:48:14'),
(56, 'Memorandum Order', '2024-03-01 22:48:24'),
(57, 'Letter from TVET', '2024-03-01 22:48:43'),
(58, 'Letter from NGAs', '2024-03-01 22:48:53'),
(59, 'Placement Report', '2024-03-04 10:42:52'),
(60, 'Application for Leave', '2024-03-04 11:04:34'),
(63, 'ABYIP', '2024-03-04 13:09:06'),
(64, 'CBYDP', '2024-03-04 13:09:15'),
(65, 'OBR, etc', '2024-03-04 13:38:53'),
(66, 'Application for SP Accreditation', '2024-03-04 14:04:11'),
(67, 'Notice to Proceed - OJT', '2024-03-04 14:11:41'),
(68, 'Justification Letter', '2024-03-04 17:05:52'),
(69, 'Recommendation Letter', '2024-03-25 16:56:57');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `final_actions`
--

CREATE TABLE `final_actions` (
  `action_id` int(50) NOT NULL,
  `action_name` varchar(255) NOT NULL,
  `created` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `final_actions`
--

INSERT INTO `final_actions` (`action_id`, `action_name`, `created`) VALUES
(8, 'For Approval', '2023-11-08 14:05:19'),
(11, 'For File', '2024-02-05 08:26:04'),
(14, 'For Indorsement', '2024-03-01 22:54:31'),
(15, 'Approved', '2024-03-04 11:07:07');

-- --------------------------------------------------------

--
-- Table structure for table `history`
--

CREATE TABLE `history` (
  `history_id` int(11) NOT NULL,
  `t_number` varchar(150) NOT NULL,
  `user1` int(11) DEFAULT NULL,
  `office1` int(11) DEFAULT NULL,
  `user2` int(11) DEFAULT NULL,
  `office2` int(11) DEFAULT NULL,
  `status` set('torec','received','to-hold','hold','to-complete','completed') NOT NULL,
  `received_status` int(11) DEFAULT NULL,
  `received_date` datetime DEFAULT NULL,
  `release_status` int(11) DEFAULT NULL,
  `release_date` datetime DEFAULT NULL,
  `final_action_taken` text DEFAULT NULL,
  `to_receiver` set('yes','no') NOT NULL,
  `remarks` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `history`
--

INSERT INTO `history` (`history_id`, `t_number`, `user1`, `office1`, `user2`, `office2`, `status`, `received_status`, `received_date`, `release_status`, `release_date`, `final_action_taken`, `to_receiver`, `remarks`) VALUES
(31, '20240227181', 23, 21, 23, 21, 'received', 1, '2024-02-27 10:04:22', 1, NULL, NULL, 'no', NULL),
(32, '20240227181', 23, 21, 8, 21, 'received', 1, '2024-02-27 15:12:44', 1, '2024-02-27 10:04:52', NULL, 'no', NULL),
(33, '20240227182', 23, 21, 23, 21, 'received', 1, '2024-02-27 10:10:31', 1, NULL, NULL, 'no', NULL),
(34, '20240227183', 23, 21, 23, 21, 'received', 1, '2024-02-27 10:15:04', 1, NULL, NULL, 'no', NULL),
(35, '20240227184', 23, 21, 23, 21, 'received', 1, '2024-02-27 10:19:44', 1, NULL, NULL, 'no', NULL),
(36, '20240227185', 23, 21, 23, 21, 'received', 1, '2024-02-27 10:24:54', 1, NULL, NULL, 'no', NULL),
(37, '20240227186', 23, 21, 23, 21, 'received', 1, '2024-02-27 10:31:02', 1, NULL, NULL, 'no', NULL),
(38, '20240227187', 23, 21, 23, 21, 'received', 1, '2024-02-27 10:34:38', 1, NULL, NULL, 'no', NULL),
(39, '20240227188', 23, 21, 23, 21, 'received', 1, '2024-02-27 10:37:38', 1, NULL, NULL, 'no', NULL),
(40, '20240227188', 23, 21, 8, 21, 'received', 1, '2024-02-27 15:12:06', 1, '2024-02-27 10:38:39', NULL, 'no', NULL),
(41, '20240227187', 23, 21, 8, 21, 'received', 1, '2024-02-27 15:12:13', 1, '2024-02-27 10:39:12', NULL, 'no', NULL),
(42, '20240227186', 23, 21, 8, 21, 'received', 1, '2024-02-27 15:12:24', 1, '2024-02-27 10:39:30', NULL, 'no', NULL),
(43, '20240227185', 23, 21, 8, 21, 'received', 1, '2024-02-27 15:12:31', 1, '2024-02-27 10:39:47', NULL, 'no', NULL),
(44, '20240227184', 23, 21, 8, 21, 'received', 1, '2024-02-27 15:10:22', 1, '2024-02-27 10:40:05', NULL, 'no', NULL),
(45, '20240227183', 23, 21, 8, 21, 'received', 1, '2024-02-27 15:12:38', 1, '2024-02-27 10:40:20', NULL, 'no', NULL),
(46, '20240227182', 23, 21, 8, 21, 'received', 1, '2024-02-27 15:06:27', 1, '2024-02-27 10:40:53', NULL, 'no', NULL),
(47, '20240227182', 8, 21, 26, 21, 'received', 1, '2024-02-29 14:58:58', 1, '2024-02-27 15:09:46', NULL, 'no', 'Please attend'),
(48, '20240227184', 8, 21, 23, 21, 'received', 1, '2024-02-28 16:10:41', 1, '2024-02-27 15:10:50', NULL, 'no', 'for file SPES 2024'),
(49, '20240227189', 23, 21, 23, 21, 'received', 1, '2024-02-27 15:44:49', 1, NULL, NULL, 'no', NULL),
(50, '20240227190', 23, 21, 23, 21, 'received', 1, '2024-02-27 16:41:25', 1, NULL, NULL, 'no', NULL),
(51, '20240227189', 23, 21, 8, 21, 'received', 1, '2024-02-28 10:41:37', 1, '2024-02-28 09:51:38', NULL, 'no', NULL),
(52, '20240227190', 23, 21, 8, 21, 'received', 1, '2024-02-28 16:57:37', NULL, '2024-02-28 09:52:00', NULL, 'no', NULL),
(53, '20240227189', 8, 21, 23, 21, 'received', 1, '2024-02-28 16:10:19', 1, '2024-02-28 10:53:23', NULL, 'no', 'for file'),
(54, '20240228191', 23, 21, 23, 21, 'received', 1, '2024-02-28 11:25:26', 1, NULL, NULL, 'no', NULL),
(55, '20240228192', 23, 21, 23, 21, 'received', 1, '2024-02-28 13:09:15', 1, NULL, NULL, 'no', NULL),
(56, '20240228193', 23, 21, 23, 21, 'received', 1, '2024-02-28 13:16:12', 1, NULL, NULL, 'no', NULL),
(57, '20240228194', 23, 21, 23, 21, 'received', 1, '2024-02-28 13:26:33', 1, NULL, NULL, 'no', NULL),
(58, '20240228195', 23, 21, 23, 21, 'received', 1, '2024-02-28 13:33:45', 1, NULL, NULL, 'no', NULL),
(59, '20240228196', 23, 21, 23, 21, 'received', 1, '2024-02-28 13:41:14', 1, NULL, NULL, 'no', NULL),
(60, '20240228191', 23, 21, 8, 21, 'received', 1, '2024-02-28 16:57:05', 1, '2024-02-28 15:54:51', NULL, 'no', NULL),
(61, '20240228192', 23, 21, 8, 21, 'received', 1, '2024-02-28 16:56:48', 1, '2024-02-28 15:55:12', NULL, 'no', NULL),
(62, '20240228193', 23, 21, 8, 21, 'received', 1, '2024-02-28 16:56:13', 1, '2024-02-28 15:55:44', NULL, 'no', NULL),
(63, '20240228194', 23, 21, 8, 21, 'received', 1, '2024-02-28 16:56:40', 1, '2024-02-28 15:56:11', NULL, 'no', NULL),
(64, '20240228195', 23, 21, 8, 21, 'received', 1, '2024-02-28 16:56:32', 1, '2024-02-28 15:56:32', NULL, 'no', NULL),
(65, '20240228196', 23, 21, 8, 21, 'received', 1, '2024-02-28 16:56:23', 1, '2024-02-28 15:56:54', NULL, 'no', NULL),
(66, '20240227184', 23, 21, 23, 21, 'completed', 1, '2024-02-28 16:12:43', NULL, '2024-02-28 16:11:52', '11', 'yes', NULL),
(67, '20240227189', 23, 21, 23, 21, 'completed', 1, '2024-02-28 16:12:56', NULL, '2024-02-28 16:12:15', '11', 'yes', NULL),
(68, '20240227185', 8, 21, 13, 21, 'received', 1, '2024-03-04 10:33:03', 1, '2024-02-28 16:28:30', NULL, 'no', 'for processing, evaluation'),
(69, '20240227183', 8, 21, 32, 21, 'received', 1, '2024-02-29 14:57:55', NULL, '2024-02-28 16:33:08', NULL, 'no', 'please coordinate and request for template for the data they required'),
(70, '20240228191', 8, 21, 20, 21, 'received', 1, '2024-03-05 08:13:56', 1, '2024-02-28 16:58:53', NULL, 'no', 'priority starter kit for Brgy Tipan, for coordination and processing'),
(71, '20240228192', 8, 21, 32, 21, 'received', 1, '2024-02-29 13:27:58', NULL, '2024-02-28 16:59:35', NULL, 'no', 'for consolidation'),
(72, '20240228194', 8, 21, 32, 21, 'received', 1, '2024-02-29 13:28:05', NULL, '2024-02-28 17:00:08', NULL, 'no', 'for consolidation'),
(73, '20240228195', 8, 21, 32, 21, 'received', 1, '2024-02-29 13:28:11', NULL, '2024-02-28 17:00:41', NULL, 'no', 'for consolidation'),
(74, '20240228196', 8, 21, 32, 21, 'received', 1, '2024-02-29 13:28:17', NULL, '2024-02-28 17:01:16', NULL, 'no', 'for consolidation'),
(75, '20240228193', 8, 21, 32, 21, 'received', 1, '2024-02-29 13:27:15', NULL, '2024-02-28 17:01:48', NULL, 'no', 'for consolidation'),
(77, '20240229197', 23, 21, 23, 21, 'received', 1, '2024-02-29 09:27:21', 1, NULL, NULL, 'no', NULL),
(78, '20240229197', 23, 21, 8, 21, 'received', 1, '2024-03-01 10:47:29', 1, '2024-02-29 09:28:00', NULL, 'no', NULL),
(79, '20240229198', 23, 21, 23, 21, 'received', 1, '2024-02-29 10:08:37', 1, NULL, NULL, 'no', NULL),
(80, '20240229198', 23, 21, 8, 21, 'received', 1, '2024-03-01 10:47:21', 1, '2024-02-29 10:18:08', NULL, 'no', NULL),
(81, '20240229199', 23, 21, 23, 21, 'received', 1, '2024-02-29 10:31:21', 1, NULL, NULL, 'no', NULL),
(82, '20240229199', 23, 21, 8, 21, 'received', 1, '2024-03-01 10:46:35', 1, '2024-02-29 10:32:24', NULL, 'no', NULL),
(83, '20240229200', 23, 21, 23, 21, 'received', 1, '2024-02-29 10:42:02', 1, NULL, NULL, 'no', NULL),
(84, '20240229200', 23, 21, 8, 21, 'received', 1, '2024-03-01 10:50:03', 1, '2024-02-29 10:42:36', NULL, 'no', NULL),
(85, '20240229201', 23, 21, 23, 21, 'received', 1, '2024-02-29 11:19:23', 1, NULL, NULL, 'no', NULL),
(86, '20240229201', 23, 21, 33, 21, 'received', 1, '2024-02-29 13:18:44', NULL, '2024-02-29 11:19:45', NULL, 'no', NULL),
(87, '20240229202', 23, 21, 23, 21, 'received', 1, '2024-02-29 11:27:33', 1, NULL, NULL, 'no', NULL),
(88, '20240229202', 23, 21, 33, 21, 'received', 1, '2024-02-29 13:18:53', NULL, '2024-02-29 11:28:08', NULL, 'no', NULL),
(89, '20240229203', 23, 21, 23, 21, 'received', 1, '2024-02-29 13:30:09', 1, NULL, NULL, 'no', NULL),
(90, '20240229203', 23, 21, 8, 21, 'received', 1, '2024-03-01 22:42:16', 1, '2024-02-29 13:30:41', NULL, 'no', NULL),
(91, '20240229204', 23, 21, 23, 21, 'received', 1, '2024-02-29 14:06:27', 1, NULL, NULL, 'no', NULL),
(92, '20240227181', 8, 21, 26, 21, 'received', 1, '2024-02-29 14:58:48', 1, '2024-02-29 14:54:48', NULL, 'no', NULL),
(93, '20240227181', 26, 21, 8, 21, 'received', 1, '2024-03-03 23:19:39', 1, '2024-02-29 15:07:39', NULL, 'no', '*natawagan na\r\n*Gihatagan na ug list sa mga Vendors ni Celrose last February 20, 2024'),
(94, '20240229205', 23, 21, 23, 21, 'received', 1, '2024-02-29 15:34:15', 1, NULL, NULL, 'no', NULL),
(95, '20240229205', 23, 21, 32, 21, 'received', 1, '2024-04-08 11:15:43', NULL, '2024-02-29 15:35:16', NULL, 'no', NULL),
(96, '20240301206', 23, 21, 23, 21, 'received', 1, '2024-03-01 08:29:33', 1, '2024-03-05 09:00:00', NULL, 'no', NULL),
(97, '20240301206', 23, 21, 8, 21, 'received', 1, '2024-03-03 23:14:10', 1, '2024-03-01 08:31:33', NULL, 'no', NULL),
(98, '20240301207', 23, 21, 23, 21, 'received', 1, '2024-03-01 09:45:42', 1, NULL, NULL, 'no', NULL),
(99, '20240301207', 23, 21, 8, 21, 'received', 1, '2024-03-01 10:30:46', 1, '2024-03-01 09:46:42', NULL, 'no', NULL),
(100, '20240301207', 8, 21, 23, 21, 'completed', 1, '2024-03-01 13:14:59', NULL, '2024-03-01 10:31:37', '11', 'yes', NULL),
(101, '20240229199', 8, 21, 23, 21, 'completed', 1, '2024-03-01 13:12:56', NULL, '2024-03-01 10:46:52', '11', 'yes', NULL),
(102, '20240229197', 8, 21, 32, 21, 'received', 1, '2024-04-08 11:15:51', NULL, '2024-03-01 10:48:05', NULL, 'no', 'for consolidation'),
(103, '20240229198', 8, 21, 32, 21, 'received', 1, '2024-04-08 11:14:34', NULL, '2024-03-01 10:48:25', NULL, 'no', 'for consolidation'),
(104, '20240229200', 8, 21, 23, 21, 'completed', 1, '2024-03-01 13:14:42', NULL, '2024-03-01 10:50:28', '11', 'yes', NULL),
(105, '20240227187', 8, 21, 33, 21, 'received', 1, '2024-03-05 11:37:15', NULL, '2024-03-01 11:31:14', NULL, 'no', 'for consolidation'),
(106, '20240227188', 8, 21, 33, 21, 'received', 1, '2024-03-05 11:37:32', NULL, '2024-03-01 11:31:45', NULL, 'no', 'for consolidation'),
(107, '20240229204', 23, 21, 8, 21, 'received', 1, '2024-03-03 23:18:42', 1, '2024-03-01 11:37:04', NULL, 'no', NULL),
(108, '20240301208', 23, 21, 23, 21, 'received', 1, '2024-03-01 13:55:09', 1, NULL, NULL, 'no', NULL),
(109, '20240301209', 23, 21, 23, 21, 'received', 1, '2024-03-01 14:15:08', 1, NULL, NULL, 'no', NULL),
(110, '20240301209', 23, 21, 8, 21, 'received', 1, '2024-03-01 22:40:50', 1, '2024-03-01 14:16:53', NULL, 'no', NULL),
(111, '20240301208', 23, 21, 8, 21, 'received', 1, '2024-03-01 22:41:01', 1, '2024-03-01 14:17:14', NULL, 'no', NULL),
(112, '20240301210', 23, 21, 23, 21, 'received', 1, '2024-03-01 14:37:44', 1, NULL, NULL, 'no', NULL),
(113, '20240301210', 23, 21, 8, 21, 'received', 1, '2024-03-03 23:18:35', 1, '2024-03-01 14:38:22', NULL, 'no', NULL),
(114, '20240301211', 23, 21, 23, 21, 'received', 1, '2024-03-01 15:00:06', 1, NULL, NULL, 'no', NULL),
(115, '20240301212', 23, 21, 23, 21, 'received', 1, '2024-03-01 15:02:42', 1, NULL, NULL, 'no', NULL),
(116, '20240301213', 23, 21, 23, 21, 'received', 1, '2024-03-01 15:06:34', 1, NULL, NULL, 'no', NULL),
(117, '20240301214', 23, 21, 23, 21, 'received', 1, '2024-03-01 15:09:50', 1, NULL, NULL, 'no', NULL),
(118, '20240301215', 23, 21, 23, 21, 'received', 1, '2024-03-01 15:15:19', 1, NULL, NULL, 'no', NULL),
(119, '20240301211', 23, 21, 8, 21, 'received', 1, '2024-03-01 22:41:13', 1, '2024-03-01 15:16:24', NULL, 'no', NULL),
(120, '20240301212', 23, 21, 8, 21, 'received', 1, '2024-03-01 22:41:38', 1, '2024-03-01 15:17:40', NULL, 'no', NULL),
(121, '20240301213', 23, 21, 8, 21, 'received', 1, '2024-03-01 22:41:21', 1, '2024-03-01 15:18:07', NULL, 'no', NULL),
(122, '20240301214', 23, 21, 8, 21, 'received', 1, '2024-03-01 22:41:29', 1, '2024-03-01 15:18:24', NULL, 'no', NULL),
(123, '20240301215', 23, 21, 8, 21, 'received', 1, '2024-03-03 22:59:46', 1, '2024-03-01 15:18:47', NULL, 'no', NULL),
(124, '20240301212', 8, 21, 33, 21, 'received', 1, '2024-03-05 11:27:41', NULL, '2024-03-01 22:42:46', NULL, 'no', 'for consolidation'),
(125, '20240301214', 8, 21, 33, 21, 'received', 1, '2024-03-05 11:35:10', NULL, '2024-03-01 22:43:04', NULL, 'no', 'for consolidation'),
(126, '20240301213', 8, 21, 33, 21, 'received', 1, '2024-03-05 11:23:00', NULL, '2024-03-01 22:43:19', NULL, 'no', 'for consolidation'),
(127, '20240301208', 8, 21, 33, 21, 'received', 1, '2024-03-05 11:22:47', NULL, '2024-03-01 22:43:33', NULL, 'no', 'for consolidation'),
(128, '20240301211', 8, 21, 33, 21, 'received', 1, '2024-03-05 11:27:02', NULL, '2024-03-01 22:44:09', NULL, 'no', 'for consolidation'),
(129, '20240301209', 8, 21, 33, 21, 'received', 1, '2024-03-05 11:23:50', NULL, '2024-03-01 22:44:53', NULL, 'no', 'for consolidation'),
(130, '20240229203', 8, 21, 23, 21, 'completed', 1, '2024-03-04 16:26:03', NULL, '2024-03-01 22:45:17', '11', 'yes', NULL),
(131, '20240301215', 8, 21, 12, 21, 'received', 1, '2024-03-05 09:30:13', 1, '2024-03-03 23:00:24', NULL, 'no', 'for appropriate action'),
(132, '20240227186', 8, 21, 13, 21, 'received', 1, '2024-03-05 11:56:29', NULL, '2024-03-03 23:10:49', NULL, 'no', 'for evaluation'),
(133, '20240227181', 8, 21, 23, 21, 'completed', 1, '2024-03-04 16:24:10', NULL, '2024-03-03 23:20:06', '11', 'yes', NULL),
(134, '20240227185', 13, 21, 8, 21, 'received', 1, '2024-03-04 10:35:59', 1, '2024-03-04 10:35:24', NULL, 'no', 'already emailed..'),
(135, '20240227185', 8, 21, 23, 21, 'completed', 1, '2024-03-04 16:25:20', NULL, '2024-03-04 10:36:53', '11', 'yes', NULL),
(136, '20240301210', 8, 21, 23, 21, 'completed', 1, '2024-03-05 08:54:30', NULL, '2024-03-04 10:40:36', '11', 'yes', NULL),
(137, '20240304216', 23, 21, 23, 21, 'received', 1, '2024-03-04 10:58:14', 1, NULL, NULL, 'no', NULL),
(138, '20240304216', 23, 21, 8, 21, 'received', 1, '2024-03-04 13:53:46', 1, '2024-03-04 11:00:45', NULL, 'no', NULL),
(139, '20240304217', 8, 21, 8, 21, 'received', 1, '2024-03-04 11:05:25', 1, NULL, NULL, 'no', NULL),
(140, '20240304217', 8, 21, 23, 21, 'received', 1, '2024-03-04 11:07:34', 1, '2024-03-04 11:05:25', NULL, 'yes', ''),
(141, '20240304217', 8, 21, 8, 21, 'completed', 1, '2024-03-04 11:07:34', NULL, '2024-03-04 11:07:34', '15', 'no', 'for submission to HR'),
(144, '20240304218', 8, 21, 8, 21, 'received', 1, '2024-03-04 13:39:48', 1, '2024-03-04 13:39:48', NULL, 'no', NULL),
(145, '20240304218', 8, 21, 23, 21, 'received', 1, '2024-03-04 13:45:25', 1, '2024-03-04 13:39:48', NULL, 'yes', ''),
(146, '20240304218', 8, 21, 8, 21, 'completed', 1, '2024-03-04 13:45:25', 1, '2024-03-04 13:39:48', '15', 'no', 'for processing'),
(147, '20240229204', 8, 21, 12, 21, 'received', 1, '2024-03-05 09:30:51', 1, '2024-03-04 13:53:02', NULL, 'no', 'for appropriate action'),
(148, '20240304216', 8, 21, 14, 21, 'received', 1, '2024-04-08 08:49:02', 1, '2024-03-04 13:54:25', NULL, 'no', 'for appropriate action, then forward to Masayon for LMI reporting'),
(149, '20240304219', 23, 21, 23, 21, 'received', 1, '2024-03-04 13:55:01', 1, NULL, NULL, 'no', NULL),
(150, '20240304219', 23, 21, 8, 21, 'received', 1, '2024-03-04 16:21:55', 1, '2024-03-04 13:58:54', NULL, 'no', NULL),
(151, '20240304220', 8, 76, 8, 76, 'received', 1, '2024-03-04 14:06:31', 1, '2024-03-04 14:06:31', NULL, 'no', NULL),
(152, '20240304220', 8, 76, 23, 76, 'received', 1, '2024-03-04 14:07:34', 1, '2024-03-04 14:06:31', NULL, 'yes', ''),
(153, '20240304220', 8, 21, 8, 21, 'completed', 1, '2024-03-04 14:07:34', NULL, '2024-03-04 14:07:34', '15', 'no', 'for signature from other TWG Members'),
(154, '20240304221', 8, 21, 8, 21, 'received', 1, '2024-03-04 14:12:59', 1, '2024-03-04 14:12:59', NULL, 'no', NULL),
(155, '20240304221', 8, 21, 23, 21, 'completed', 1, '2024-04-02 14:43:26', NULL, '2024-03-04 14:12:59', '11', 'yes', NULL),
(156, '20240304222', 23, 74, 23, 74, 'received', 1, '2024-03-04 14:26:52', 1, NULL, NULL, 'no', NULL),
(157, '20240304222', 23, 21, 8, 21, 'received', 1, '2024-03-04 16:22:02', 1, '2024-03-04 14:33:17', NULL, 'no', NULL),
(158, '20240304223', 23, 21, 23, 21, 'received', 1, '2024-03-04 15:30:09', 1, NULL, NULL, 'no', NULL),
(159, '20240304223', 23, 21, 8, 21, 'received', 1, '2024-03-04 16:22:08', 1, '2024-03-04 15:33:16', NULL, 'no', NULL),
(160, '20240304224', 23, 21, 23, 21, 'received', 1, '2024-03-04 15:39:23', 1, NULL, NULL, 'no', NULL),
(161, '20240304224', 23, 21, 8, 21, 'received', 1, '2024-03-04 16:22:16', 1, '2024-03-04 15:42:27', NULL, 'no', NULL),
(162, '20240304224', 8, 21, 33, 21, 'received', 1, '2024-03-05 11:31:32', NULL, '2024-03-04 16:23:29', NULL, 'no', 'for consolidation'),
(163, '20240304223', 8, 21, 33, 21, 'received', 1, '2024-03-05 11:30:42', NULL, '2024-03-04 16:23:44', NULL, 'no', 'for consolidation'),
(164, '20240304219', 8, 21, 33, 21, 'received', 1, '2024-03-05 11:31:10', NULL, '2024-03-04 16:24:01', NULL, 'no', 'for consolidation'),
(165, '20240304222', 8, 21, 33, 21, 'received', 1, '2024-03-05 11:30:15', NULL, '2024-03-04 16:24:31', NULL, 'no', 'for consolidation'),
(166, '20240304225', 23, 21, 23, 21, 'received', 1, '2024-03-04 16:49:24', 1, NULL, NULL, 'no', NULL),
(167, '20240304225', 23, 21, 8, 21, 'received', 1, '2024-03-04 16:56:26', 1, '2024-03-04 16:54:49', NULL, 'no', NULL),
(168, '20240304225', 8, 21, 20, 21, 'received', 1, '2024-03-05 08:14:14', 1, '2024-03-04 16:56:53', NULL, 'no', 'for evaluation'),
(169, '20240304226', 23, 21, 23, 21, 'received', 1, '2024-03-04 17:12:14', 1, NULL, NULL, 'no', NULL),
(170, '20240304227', 23, 21, 23, 21, 'received', 1, '2024-03-04 17:13:04', 1, NULL, NULL, 'no', NULL),
(171, '20240304228', 23, 21, 23, 21, 'received', 1, '2024-03-04 17:14:06', 1, NULL, NULL, 'no', NULL),
(172, '20240304229', 23, 21, 23, 21, 'received', 1, '2024-03-04 17:15:23', 1, NULL, NULL, 'no', NULL),
(173, '20240304230', 23, 21, 23, 21, 'received', 1, '2024-03-04 17:15:54', 1, NULL, NULL, 'no', NULL),
(174, '20240304226', 23, 21, 8, 21, 'received', 1, '2024-03-05 10:30:11', 1, '2024-03-04 17:26:51', NULL, 'no', NULL),
(175, '20240304227', 23, 21, 8, 21, 'received', 1, '2024-03-05 10:30:17', 1, '2024-03-04 17:27:01', NULL, 'no', NULL),
(176, '20240304228', 23, 21, 8, 21, 'received', 1, '2024-03-05 10:30:22', 1, '2024-03-04 17:27:12', NULL, 'no', NULL),
(177, '20240304229', 23, 21, 8, 21, 'received', 1, '2024-03-05 10:30:28', 1, '2024-03-04 17:27:20', NULL, 'no', NULL),
(178, '20240304230', 23, 21, 8, 21, 'received', 1, '2024-03-05 10:30:34', 1, '2024-03-04 17:27:28', NULL, 'no', NULL),
(179, '20240304225', 20, 21, 8, 21, 'received', 1, '2024-03-05 10:26:06', 1, '2024-03-05 09:08:18', NULL, 'no', 'evaluated and reviewed'),
(180, '20240305231', 23, 21, 23, 21, 'received', 1, '2024-03-05 09:45:58', 1, NULL, NULL, 'no', NULL),
(181, '20240305231', 23, 21, 8, 21, 'received', 1, '2024-03-05 10:53:47', 1, '2024-03-05 09:45:58', NULL, 'no', ''),
(182, '20240305232', 23, 21, 23, 21, 'received', 1, '2024-03-05 09:53:41', 1, NULL, NULL, 'no', NULL),
(183, '20240305232', 23, 21, 8, 21, 'received', 1, '2024-03-05 10:53:39', 1, '2024-03-05 09:50:00', NULL, 'no', ''),
(184, '20240304225', 8, 21, 8, 21, 'completed', 1, '2024-03-05 10:27:47', NULL, '2024-03-05 10:27:47', '15', 'no', 'for processing'),
(185, '20240304230', 8, 21, 32, 21, 'received', 1, '2024-03-05 13:56:47', NULL, '2024-03-05 10:31:24', NULL, 'no', 'for information and consolidation'),
(186, '20240304229', 8, 21, 32, 21, 'received', 1, '2024-03-05 13:56:55', NULL, '2024-03-05 10:31:39', NULL, 'no', 'for information and consolidation'),
(187, '20240304228', 8, 21, 32, 21, 'received', 1, '2024-03-05 13:57:02', NULL, '2024-03-05 10:31:58', NULL, 'no', 'for information and consolidation'),
(188, '20240304227', 8, 21, 32, 21, 'received', 1, '2024-03-05 13:57:16', NULL, '2024-03-05 10:32:24', NULL, 'no', 'for information and consolidation'),
(189, '20240304226', 8, 21, 32, 21, 'received', 1, '2024-03-05 13:57:23', NULL, '2024-03-05 10:32:46', NULL, 'no', 'for information and consolidation'),
(190, '20240305233', 8, 21, 8, 21, 'received', 1, '2024-03-05 11:14:47', 1, '2024-03-05 11:14:47', NULL, 'no', NULL),
(191, '20240305233', 8, 21, 23, 21, 'received', 1, '2024-03-05 11:15:09', 1, '2024-03-05 11:14:47', NULL, 'yes', ''),
(192, '20240305233', 8, 21, 8, 21, 'completed', 1, '2024-03-05 11:15:09', NULL, '2024-03-05 11:15:09', '15', 'no', NULL),
(193, '20240229204', 12, 21, 16, 21, 'received', 1, '2024-03-05 11:47:09', 1, '2024-03-05 11:40:45', NULL, 'no', 'document forwarded to Ibasan for PEIS encoding'),
(194, '20240229204', 16, 21, 12, 21, 'received', 1, '2024-03-07 11:15:06', 1, '2024-03-05 11:48:29', NULL, 'no', 'Already secured a photocopy :)'),
(195, '20240305231', 8, 21, 33, 21, 'received', 1, '2024-03-05 13:11:10', NULL, '2024-03-05 13:10:05', NULL, 'no', 'for consolidation'),
(196, '20240305232', 8, 21, 33, 21, 'received', 1, '2024-03-05 13:11:16', NULL, '2024-03-05 13:10:22', NULL, 'no', 'for consolidation'),
(197, '20240305234', 23, 21, 23, 21, 'received', 1, '2024-03-05 13:20:13', 1, NULL, NULL, 'no', NULL),
(198, '20240305234', 23, 21, 8, 21, 'received', 1, '2024-03-06 11:37:56', 1, '2024-03-05 13:21:43', NULL, 'no', NULL),
(199, '20240305235', 23, 21, 23, 21, 'received', 1, '2024-03-05 16:52:51', 1, NULL, NULL, 'no', NULL),
(200, '20240305235', 23, 21, 8, 21, 'received', 1, '2024-03-06 11:38:09', 1, '2024-03-05 16:53:30', NULL, 'no', NULL),
(201, '20240305236', 8, 21, 8, 21, 'received', 1, '2024-03-05 17:21:21', 1, NULL, NULL, 'no', NULL),
(202, '20240305236', 8, 21, 20, 21, 'received', 1, '2024-03-09 14:49:00', 1, '2024-03-05 17:23:58', NULL, 'no', 'for immediate compliance using the appropriate template'),
(203, '20240305237', 8, 86, 8, 86, 'received', 1, '2024-03-05 17:26:06', 1, NULL, NULL, 'no', NULL),
(204, '20240305237', 8, 21, 13, 21, 'received', 1, '2024-03-06 08:12:11', 1, '2024-03-05 17:26:47', NULL, 'no', 'for procurement , please coordinate with maam G Mondoy'),
(205, '20240227182', 26, 21, 27, 21, 'received', 1, '2024-04-08 08:20:43', 1, '2024-03-06 08:48:01', NULL, 'no', 'Si king francis cario ang mi attend sa meeting.'),
(206, '20240305237', 13, 21, 8, 21, 'received', 1, '2024-03-06 11:38:21', 1, '2024-03-06 09:33:49', NULL, 'no', 'Already prepared P.R'),
(207, '20240306238', 23, 21, 23, 21, 'received', 1, '2024-03-06 09:37:52', 1, NULL, NULL, 'no', NULL),
(208, '20240306238', 23, 21, 8, 21, 'received', 1, '2024-03-06 16:24:14', 1, '2024-03-06 09:37:52', NULL, 'no', ''),
(209, '20240306239', 23, 21, 23, 21, 'received', 1, '2024-03-06 09:56:25', 1, NULL, NULL, 'no', NULL),
(210, '20240306239', 23, 21, 8, 21, 'received', 1, '2024-03-06 11:38:02', 1, '2024-03-06 09:56:25', NULL, 'no', ''),
(211, '20240306240', 23, 21, 23, 21, 'received', 1, '2024-03-06 10:08:38', 1, NULL, NULL, 'no', NULL),
(212, '20240306240', 23, 21, 8, 21, 'received', 1, '2024-03-06 11:36:50', 1, '2024-03-06 10:08:38', NULL, 'no', ''),
(213, '20240301206', 8, 21, 23, 21, 'completed', 1, '2024-03-11 15:43:48', NULL, '2024-03-06 11:37:04', '11', 'yes', NULL),
(214, '20240306241', 23, 21, 23, 21, 'received', 1, '2024-03-06 11:38:12', 1, '2024-03-06 11:38:12', NULL, 'no', NULL),
(215, '20240306241', 23, 21, 8, 21, 'received', 1, '2024-03-19 23:55:14', 1, '2024-03-06 11:38:12', NULL, 'no', ''),
(216, '20240305237', 8, 21, 23, 21, 'completed', 1, '2024-03-06 16:16:52', NULL, '2024-03-06 11:38:43', '11', 'yes', NULL),
(217, '20240306242', 23, 21, 23, 21, 'received', 1, '2024-03-06 11:52:30', 1, NULL, NULL, 'no', NULL),
(218, '20240306242', 23, 21, 8, 21, 'received', 1, '2024-03-07 14:39:48', 1, '2024-03-06 11:52:30', NULL, 'no', ''),
(219, '20240306243', 23, 21, 23, 21, 'received', 1, '2024-03-06 11:59:54', 1, NULL, NULL, 'no', NULL),
(220, '20240306243', 23, 21, 8, 21, 'received', 1, '2024-03-07 14:39:41', 1, '2024-03-06 11:59:54', NULL, 'no', ''),
(221, '20240306244', 13, 21, 13, 21, 'received', 1, '2024-03-06 13:03:30', 1, NULL, NULL, 'no', NULL),
(222, '20240306245', 13, 21, 13, 21, 'received', 1, '2024-03-06 13:04:14', 1, '2024-03-06 16:14:23', NULL, 'no', NULL),
(223, '20240306246', 23, 21, 23, 21, 'received', 1, '2024-03-06 13:22:45', 1, NULL, NULL, 'no', NULL),
(224, '20240306246', 23, 21, 8, 21, 'received', 1, '2024-04-01 22:05:00', 1, '2024-03-06 13:22:45', NULL, 'no', ''),
(225, '20240306247', 23, 21, 23, 21, 'received', 1, '2024-03-06 14:45:04', 1, NULL, NULL, 'no', NULL),
(226, '20240306239', 23, 21, 8, 21, 'received', 1, '2024-03-06 16:07:52', 1, '2024-03-06 14:53:19', NULL, 'no', NULL),
(227, '20240306247', 23, 21, 8, 21, 'received', 1, '2024-03-06 16:18:49', 1, '2024-03-06 14:54:33', NULL, 'no', NULL),
(228, '20240306248', 23, 21, 23, 21, 'received', 1, '2024-03-06 15:04:45', 1, NULL, NULL, 'no', NULL),
(229, '20240306249', 23, 21, 23, 21, 'received', 1, '2024-03-06 15:11:19', 1, NULL, NULL, 'no', NULL),
(230, '20240306248', 23, 21, 8, 21, 'received', 1, '2024-03-06 16:18:16', 1, '2024-03-06 15:12:37', NULL, 'no', NULL),
(231, '20240306249', 23, 21, 8, 21, 'received', 1, '2024-03-06 16:18:22', 1, '2024-03-06 15:19:07', NULL, 'no', NULL),
(232, '20240306250', 23, 21, 23, 21, 'received', 1, '2024-03-06 15:58:05', 1, NULL, NULL, 'no', NULL),
(233, '20240306250', 23, 21, 8, 21, 'received', 1, '2024-03-06 16:09:00', 1, '2024-03-06 16:02:39', NULL, 'no', NULL),
(234, '20240306250', 8, 21, 23, 21, 'completed', 1, '2024-03-06 16:19:16', NULL, '2024-03-06 16:10:44', '11', 'yes', NULL),
(235, '20240306245', 8, 21, 8, 21, 'completed', 1, '2024-03-06 16:14:23', NULL, '2024-03-06 16:14:23', '15', 'no', NULL),
(236, '20240306247', 8, 21, 12, 21, 'received', 1, '2024-03-07 11:19:20', 1, '2024-03-06 16:20:24', NULL, 'no', 'please attend'),
(237, '20240306248', 8, 21, 33, 21, 'received', 1, '2024-03-08 11:37:03', NULL, '2024-03-06 16:20:57', NULL, 'no', 'for consolidation'),
(238, '20240306249', 8, 21, 33, 21, 'received', 1, '2024-03-08 11:37:11', NULL, '2024-03-06 16:21:50', NULL, 'no', 'for consolidation'),
(239, '20240306238', 8, 21, 8, 21, 'completed', 1, '2024-03-06 16:24:14', NULL, '2024-03-06 16:24:14', '15', 'no', 'i will attend'),
(240, '20240306239', 8, 21, 12, 21, 'received', 1, '2024-03-07 11:19:30', 1, '2024-03-06 16:25:50', NULL, 'no', 'for WHIP monitoring'),
(241, '20240305234', 8, 21, 19, 21, 'received', 1, '2024-03-08 10:33:14', 1, '2024-03-06 16:26:48', NULL, 'no', 'please extend assistance togetehr with celrose nxt week. pls coordinate with maam cindy of SLP'),
(242, '20240305235', 8, 21, 21, 21, 'received', 1, '2024-03-07 09:51:54', 1, '2024-03-06 16:28:13', NULL, 'no', 'please identify possible MSMEs in coordination with City Tourism Office'),
(243, '20240307251', 13, 21, 13, 21, 'received', 1, '2024-03-07 09:17:25', 1, NULL, NULL, 'no', NULL),
(244, '20240307252', 23, 21, 23, 21, 'received', 1, '2024-03-07 09:36:08', 1, NULL, NULL, 'no', NULL),
(245, '20240307253', 23, 21, 23, 21, 'received', 1, '2024-03-07 09:42:45', 1, NULL, NULL, 'no', NULL),
(246, '20240307252', 23, 21, 8, 21, 'received', 1, '2024-03-07 14:40:30', 1, '2024-03-07 09:58:09', NULL, 'no', NULL),
(247, '20240307253', 23, 21, 8, 21, 'received', 1, '2024-03-07 14:40:21', 1, '2024-03-07 09:58:34', NULL, 'no', NULL),
(248, '20240307254', 23, 21, 23, 21, 'received', 1, '2024-03-07 10:17:27', 1, NULL, NULL, 'no', NULL),
(249, '20240307255', 23, 21, 23, 21, 'received', 1, '2024-03-07 10:20:18', 1, NULL, NULL, 'no', NULL),
(250, '20240307254', 23, 21, 8, 21, 'received', 1, '2024-03-07 14:41:49', NULL, '2024-03-07 10:25:26', NULL, 'no', NULL),
(251, '20240307255', 23, 21, 8, 21, 'received', 1, '2024-03-07 14:41:58', NULL, '2024-03-07 10:25:49', NULL, 'no', NULL),
(252, '20240305235', 21, 21, 23, 21, 'received', 1, '2024-03-07 16:14:26', 1, '2024-03-07 10:39:09', NULL, 'no', 'Sir Mark, as per coordination with City Tourism Office with Marjorie only 7 MSME\'s base on the data that have in there office. These are the MSME\'s that have existing product specifically in food handling: \r\n1. Siakean\'s Products\r\n2. TAARCO\r\n3. OroqCoco\r\n4. Suman Tinambiran\r\n5. New Suzettes Broas\r\n6. Lilia\'s Cookies\r\n7. Mangosteen Pastrano Farm'),
(253, '20240229204', 12, 21, 23, 21, 'completed', 1, '2024-03-11 11:30:08', NULL, '2024-03-07 11:18:24', '11', 'yes', NULL),
(254, '20240307256', 23, 21, 23, 21, 'received', 1, '2024-03-07 11:32:51', 1, NULL, NULL, 'no', NULL),
(255, '20240307256', 23, 21, 8, 21, 'received', 1, '2024-03-07 14:41:41', NULL, '2024-03-07 11:35:20', NULL, 'no', NULL),
(256, '20240306244', 13, 21, 27, 21, 'received', 1, '2024-04-08 08:20:35', NULL, '2024-03-07 14:12:11', NULL, 'no', 'Already approved'),
(257, '20240307251', 13, 21, 8, 21, 'received', 1, '2024-03-07 14:41:14', 1, '2024-03-07 14:12:34', NULL, 'no', 'approved'),
(258, '20240307257', 13, 21, 13, 21, 'received', 1, '2024-03-07 14:14:48', 1, NULL, NULL, 'no', NULL),
(259, '20240307257', 13, 21, 23, 21, 'torec', NULL, NULL, NULL, '2024-03-07 14:19:21', NULL, 'no', 'for process'),
(260, '20240307258', 23, 21, 23, 21, 'received', 1, '2024-03-07 14:36:21', 1, NULL, NULL, 'no', NULL),
(261, '20240307258', 23, 21, 8, 21, 'received', 1, '2024-03-07 14:41:28', 1, '2024-03-07 14:40:42', NULL, 'no', NULL),
(262, '20240307258', 8, 21, 26, 21, 'received', 1, '2024-03-07 14:49:58', 1, '2024-03-07 14:42:58', NULL, 'no', 'for appropriate action'),
(263, '20240307251', 8, 21, 8, 21, 'completed', 1, '2024-03-07 14:43:54', NULL, '2024-03-07 14:43:54', '15', 'no', NULL),
(264, '20240307252', 8, 21, 33, 21, 'received', 1, '2024-03-08 11:35:22', NULL, '2024-03-07 14:44:32', NULL, 'no', 'for consolidation'),
(265, '20240307253', 8, 21, 33, 21, 'received', 1, '2024-03-08 11:35:31', NULL, '2024-03-07 14:45:03', NULL, 'no', 'for consolidation'),
(266, '20240306242', 8, 21, 32, 21, 'received', 1, '2024-04-08 10:47:52', NULL, '2024-03-07 14:46:15', NULL, 'no', 'approved and for appropriate action'),
(267, '20240306243', 8, 21, 32, 21, 'received', 1, '2024-04-08 11:13:48', NULL, '2024-03-07 14:47:16', NULL, 'no', 'for consolidation'),
(268, '20240307259', 23, 21, 23, 21, 'received', 1, '2024-03-07 14:50:00', 1, NULL, NULL, 'no', NULL),
(269, '20240307259', 23, 21, 8, 21, 'received', 1, '2024-03-07 14:55:22', 1, '2024-03-07 14:52:35', NULL, 'no', NULL),
(270, '20240307259', 8, 21, 23, 21, 'received', 1, '2024-03-07 16:21:23', 1, '2024-03-07 14:58:00', NULL, 'no', 'for info all staff and then file'),
(271, '20240305235', 23, 21, 23, 21, 'completed', 1, '2024-03-07 16:16:16', NULL, '2024-03-07 16:15:23', '11', 'yes', NULL),
(272, '20240307259', 23, 21, 23, 21, 'completed', 1, '2024-03-07 16:22:32', NULL, '2024-03-07 16:21:50', '11', 'yes', NULL),
(273, '20240307260', 23, 21, 23, 21, 'received', 1, '2024-03-07 16:58:31', 1, NULL, NULL, 'no', NULL),
(274, '20240307261', 23, 21, 23, 21, 'received', 1, '2024-03-07 17:01:04', 1, NULL, NULL, 'no', NULL),
(275, '20240307261', 23, 21, 8, 21, 'received', 1, '2024-03-08 11:23:56', 1, '2024-03-08 08:43:36', NULL, 'no', NULL),
(276, '20240307260', 23, 21, 8, 21, 'received', 1, '2024-03-08 11:24:02', 1, '2024-03-08 08:44:02', NULL, 'no', NULL),
(277, '20240308262', 23, 21, 23, 21, 'received', 1, '2024-03-08 10:43:53', 1, NULL, NULL, 'no', NULL),
(278, '20240308263', 23, 21, 23, 21, 'received', 1, '2024-03-08 10:46:52', 1, NULL, NULL, 'no', NULL),
(279, '20240308262', 23, 21, 8, 21, 'received', 1, '2024-03-08 11:23:42', 1, '2024-03-08 10:51:46', NULL, 'no', NULL),
(280, '20240308263', 23, 21, 8, 21, 'received', 1, '2024-03-08 11:23:50', 1, '2024-03-08 10:52:15', NULL, 'no', NULL),
(281, '20240307260', 8, 21, 33, 21, 'received', 1, '2024-03-08 11:36:22', NULL, '2024-03-08 11:24:57', NULL, 'no', 'for consolidation'),
(282, '20240308263', 8, 21, 33, 21, 'received', 1, '2024-03-08 11:35:50', NULL, '2024-03-08 11:25:11', NULL, 'no', 'for consolidation'),
(283, '20240308262', 8, 21, 33, 21, 'received', 1, '2024-03-08 11:36:02', NULL, '2024-03-08 11:25:25', NULL, 'no', 'for consolidation'),
(284, '20240307261', 8, 21, 33, 21, 'received', 1, '2024-03-08 11:36:15', NULL, '2024-03-08 11:25:39', NULL, 'no', 'for consolidation'),
(285, '20240308264', 23, 21, 23, 21, 'received', 1, '2024-03-08 11:27:23', 1, NULL, NULL, 'no', NULL),
(286, '20240308265', 23, 21, 23, 21, 'received', 1, '2024-03-08 11:30:06', 1, NULL, NULL, 'no', NULL),
(287, '20240306239', 12, 21, 23, 21, 'completed', 1, '2024-03-11 10:14:33', NULL, '2024-03-08 11:40:43', '11', 'yes', NULL),
(288, '20240308264', 23, 21, 8, 21, 'received', 1, '2024-03-08 13:18:30', 1, '2024-03-08 11:44:13', NULL, 'no', NULL),
(289, '20240308265', 23, 21, 8, 21, 'received', 1, '2024-03-08 13:18:36', 1, '2024-03-08 11:44:41', NULL, 'no', NULL),
(290, '20240308266', 23, 21, 23, 21, 'received', 1, '2024-03-08 13:18:21', 1, NULL, NULL, 'no', NULL),
(291, '20240308265', 8, 21, 33, 21, 'received', 1, '2024-03-08 15:15:55', NULL, '2024-03-08 13:19:32', NULL, 'no', 'for consolidation'),
(292, '20240308264', 8, 21, 33, 21, 'received', 1, '2024-03-08 15:16:07', NULL, '2024-03-08 13:19:54', NULL, 'no', 'for consolidation'),
(293, '20240308267', 23, 21, 23, 21, 'received', 1, '2024-03-08 13:26:48', 1, NULL, NULL, 'no', NULL),
(294, '20240308266', 23, 21, 8, 21, 'received', 1, '2024-03-16 14:20:23', 1, '2024-03-08 13:31:06', NULL, 'no', NULL),
(295, '20240308267', 23, 21, 8, 21, 'received', 1, '2024-03-11 15:50:16', 1, '2024-03-08 13:31:24', NULL, 'no', NULL),
(296, '20240308268', 23, 21, 23, 21, 'received', 1, '2024-03-08 15:03:52', 1, NULL, NULL, 'no', NULL),
(297, '20240308269', 23, 21, 23, 21, 'received', 1, '2024-03-08 15:10:29', 1, NULL, NULL, 'no', NULL),
(298, '20240308269', 23, 21, 8, 21, 'received', 1, '2024-03-08 15:53:55', 1, '2024-03-08 15:16:00', NULL, 'no', NULL),
(299, '20240308268', 23, 21, 8, 21, 'received', 1, '2024-03-08 15:53:10', 1, '2024-03-08 15:16:23', NULL, 'no', NULL),
(300, '20240306247', 12, 21, 23, 21, 'received', 1, '2024-03-08 15:46:48', 1, '2024-03-08 15:42:52', NULL, 'no', 'attended the meeting and site inspection with the City Project Monitoring Committee'),
(301, '20240301215', 12, 21, 8, 21, 'received', 1, '2024-04-01 22:04:02', 1, '2024-03-08 15:44:00', NULL, 'no', 'encoded terminal report and attachments'),
(302, '20240306247', 23, 21, 23, 21, 'completed', 1, '2024-03-08 15:48:17', NULL, '2024-03-08 15:47:19', '11', 'yes', NULL),
(303, '20240308268', 8, 21, 13, 21, 'received', 1, '2024-03-08 15:56:40', NULL, '2024-03-08 15:55:11', NULL, 'no', 'for appropriate action'),
(304, '20240308269', 8, 21, 23, 21, 'completed', 1, '2024-03-11 10:08:04', NULL, '2024-03-08 15:55:56', '11', 'yes', 'haved filed'),
(305, '20240308270', 23, 21, 23, 21, 'received', 1, '2024-03-08 16:03:34', 1, NULL, NULL, 'no', NULL),
(306, '20240308271', 23, 21, 23, 21, 'received', 1, '2024-03-08 16:06:58', 1, NULL, NULL, 'no', NULL),
(307, '20240308271', 23, 21, 8, 21, 'received', 1, '2024-03-08 16:14:49', 1, '2024-03-08 16:11:23', NULL, 'no', NULL),
(308, '20240308270', 23, 21, 8, 21, 'received', 1, '2024-03-08 16:14:06', 1, '2024-03-08 16:11:42', NULL, 'no', NULL),
(309, '20240308271', 8, 21, 33, 21, 'received', 1, '2024-03-11 10:35:11', NULL, '2024-03-08 16:15:18', NULL, 'no', 'for consolidation'),
(310, '20240308270', 8, 21, 33, 21, 'received', 1, '2024-03-11 10:34:39', NULL, '2024-03-08 16:16:01', NULL, 'no', 'for consolidation'),
(311, '20240305236', 20, 21, 8, 21, 'received', 1, '2024-04-01 22:03:47', 1, '2024-03-09 14:50:42', NULL, 'no', 'prepared the certificate of acceptance and secured signature of the beneficiary.'),
(312, '20240311272', 23, 21, 23, 21, 'received', 1, '2024-03-11 09:12:37', 1, NULL, NULL, 'no', NULL),
(313, '20240311273', 23, 21, 23, 21, 'received', 1, '2024-03-11 09:15:26', 1, NULL, NULL, 'no', NULL),
(314, '20240311274', 23, 21, 23, 21, 'received', 1, '2024-03-11 09:20:29', 1, NULL, NULL, 'no', NULL),
(315, '20240311275', 23, 21, 23, 21, 'received', 1, '2024-03-11 09:23:33', 1, NULL, NULL, 'no', NULL),
(316, '20240311276', 23, 21, 23, 21, 'received', 1, '2024-03-11 09:34:10', 1, NULL, NULL, 'no', NULL),
(317, '20240311277', 23, 21, 23, 21, 'received', 1, '2024-03-11 09:37:24', 1, NULL, NULL, 'no', NULL),
(318, '20240311272', 23, 21, 21, 21, 'received', 1, '2024-03-12 14:15:40', 1, '2024-03-11 09:59:07', NULL, 'no', NULL),
(319, '20240311273', 23, 21, 21, 21, 'received', 1, '2024-03-12 14:21:09', 1, '2024-03-11 09:59:44', NULL, 'no', NULL),
(320, '20240311274', 23, 21, 21, 21, 'received', 1, '2024-03-12 14:19:48', 1, '2024-03-11 10:00:09', NULL, 'no', NULL),
(321, '20240311275', 23, 21, 21, 21, 'received', 1, '2024-03-12 14:21:31', 1, '2024-03-11 10:00:30', NULL, 'no', NULL),
(322, '20240311276', 23, 21, 21, 21, 'received', 1, '2024-03-12 14:22:00', 1, '2024-03-11 10:01:02', NULL, 'no', NULL),
(323, '20240311277', 23, 21, 21, 21, 'received', 1, '2024-03-12 14:22:08', 1, '2024-03-11 10:01:47', NULL, 'no', NULL),
(324, '20240311278', 23, 21, 23, 21, 'received', 1, '2024-03-11 14:57:13', 1, NULL, NULL, 'no', NULL),
(325, '20240311278', 23, 21, 21, 21, 'received', 1, '2024-03-12 14:03:53', 1, '2024-03-11 15:00:31', NULL, 'no', NULL),
(326, '20240311279', 23, 21, 23, 21, 'received', 1, '2024-03-11 15:37:06', 1, NULL, NULL, 'no', NULL),
(327, '20240311279', 23, 21, 8, 21, 'received', 1, '2024-03-16 14:19:46', 1, '2024-03-11 15:42:16', NULL, 'no', NULL),
(328, '20240308267', 8, 21, 23, 21, 'completed', 1, '2024-03-11 15:51:35', NULL, '2024-03-11 15:50:41', '11', 'yes', NULL),
(329, '20240312280', 13, 21, 13, 21, 'received', 1, '2024-03-12 10:15:39', 1, '2024-03-15 15:32:24', NULL, 'no', NULL),
(330, '20240312281', 13, 21, 13, 21, 'received', 1, '2024-03-12 10:18:21', 1, '2024-03-15 15:46:19', NULL, 'no', NULL),
(331, '20240228191', 20, 21, 8, 21, 'received', 1, '2024-03-15 15:36:16', 1, '2024-03-12 10:22:15', NULL, 'no', 'Out of 15 applicants, \r\n7 - nasulod sa Senote \r\n4 - 4ps verified \r\n3 - refer sa sunod nga batch (1 electrician, 2 manicurista)\r\n1 - wala kaanhi sa office'),
(332, '20240312282', 23, 21, 23, 21, 'received', 1, '2024-03-12 10:51:09', 1, NULL, NULL, 'no', NULL),
(333, '20240312282', 23, 21, 21, 21, 'received', 1, '2024-03-12 14:12:53', 1, '2024-03-12 11:04:47', NULL, 'no', NULL),
(334, '20240311278', 21, 21, 28, 21, 'received', 1, '2024-03-12 16:33:51', 1, '2024-03-12 14:11:32', NULL, 'no', 'Joseph,\r\nUrgent: For information and appropriate  action.'),
(335, '20240311272', 21, 21, 33, 21, 'received', 1, '2024-03-13 08:46:50', 1, '2024-03-12 14:26:22', NULL, 'no', 'Dianne B.,\r\nFor consolidation'),
(336, '20240311274', 21, 21, 33, 21, 'received', 1, '2024-03-13 08:47:07', 1, '2024-03-12 14:27:54', NULL, 'no', 'Dianne B.,\r\nFor consolidation'),
(337, '20240311273', 21, 21, 33, 21, 'received', 1, '2024-03-13 08:47:21', 1, '2024-03-12 14:29:19', NULL, 'no', 'Dianne B., \r\nFor consolidation'),
(338, '20240311275', 21, 21, 33, 21, 'received', 1, '2024-03-13 08:47:34', 1, '2024-03-12 14:31:34', NULL, 'no', 'Dianne B.,\r\nFor Consolidation'),
(339, '20240311276', 21, 21, 33, 21, 'received', 1, '2024-03-13 08:46:28', NULL, '2024-03-12 14:40:16', NULL, 'no', 'Dianne B., \r\nFor consolidation'),
(340, '20240311277', 21, 21, 33, 21, 'received', 1, '2024-03-13 08:45:52', NULL, '2024-03-12 14:41:40', NULL, 'no', 'Dianne B.,\r\nFor consolidation'),
(341, '20240312283', 23, 21, 23, 21, 'received', 1, '2024-03-12 14:58:40', 1, NULL, NULL, 'no', NULL),
(342, '20240312283', 23, 21, 21, 21, 'received', 1, '2024-03-19 11:23:17', 1, '2024-03-12 15:05:47', NULL, 'no', NULL),
(343, '20240312284', 23, 21, 23, 21, 'received', 1, '2024-03-12 16:26:57', 1, NULL, NULL, 'no', NULL),
(344, '20240312284', 23, 21, 21, 21, 'received', 1, '2024-03-19 11:25:59', 1, '2024-03-12 16:30:15', NULL, 'no', NULL),
(345, '20240313285', 23, 21, 23, 21, 'received', 1, '2024-03-13 14:20:30', 1, NULL, NULL, 'no', NULL),
(346, '20240313286', 23, 21, 23, 21, 'received', 1, '2024-03-13 14:23:19', 1, NULL, NULL, 'no', NULL),
(347, '20240313286', 23, 21, 21, 21, 'received', 1, '2024-03-18 17:34:50', 1, '2024-03-13 14:27:48', NULL, 'no', NULL),
(348, '20240313285', 23, 21, 21, 21, 'received', 1, '2024-03-18 17:36:13', 1, '2024-03-13 14:28:07', NULL, 'no', NULL),
(349, '20240313287', 13, 21, 13, 21, 'received', 1, '2024-03-13 14:29:01', 1, '2024-03-15 15:46:51', NULL, 'no', NULL),
(350, '20240313288', 23, 21, 23, 21, 'received', 1, '2024-03-13 17:03:49', 1, NULL, NULL, 'no', NULL),
(351, '20240314289', 23, 21, 23, 21, 'received', 1, '2024-03-14 08:33:36', 1, NULL, NULL, 'no', NULL),
(352, '20240314290', 23, 21, 23, 21, 'received', 1, '2024-03-14 08:37:43', 1, NULL, NULL, 'no', NULL),
(353, '20240313288', 23, 21, 21, 21, 'received', 1, '2024-03-15 08:31:39', 1, '2024-03-14 08:44:05', NULL, 'no', NULL),
(354, '20240314289', 23, 21, 21, 21, 'received', 1, '2024-03-18 17:36:44', 1, '2024-03-14 08:44:22', NULL, 'no', NULL),
(355, '20240314290', 23, 21, 21, 21, 'received', 1, '2024-03-18 17:37:13', 1, '2024-03-14 08:44:38', NULL, 'no', NULL),
(356, '20240314291', 23, 21, 23, 21, 'received', 1, '2024-03-14 10:03:32', 1, NULL, NULL, 'no', NULL),
(357, '20240314291', 23, 21, 21, 21, 'received', 1, '2024-03-18 17:38:01', 1, '2024-03-14 10:08:45', NULL, 'no', NULL),
(358, '20240314292', 23, 21, 23, 21, 'received', 1, '2024-03-14 13:17:03', 1, NULL, NULL, 'no', NULL),
(359, '20240314293', 23, 21, 23, 21, 'received', 1, '2024-03-14 14:14:26', 1, NULL, NULL, 'no', NULL),
(360, '20240314294', 23, 21, 23, 21, 'received', 1, '2024-03-14 14:18:16', 1, NULL, NULL, 'no', NULL),
(361, '20240314292', 23, 21, 21, 21, 'received', 1, '2024-03-18 17:38:39', 1, '2024-03-14 14:27:29', NULL, 'no', NULL),
(362, '20240314294', 23, 21, 21, 21, 'received', 1, '2024-03-18 17:39:11', 1, '2024-03-14 14:27:51', NULL, 'no', NULL),
(363, '20240314293', 23, 21, 21, 21, 'received', 1, '2024-03-18 17:39:35', 1, '2024-03-14 14:35:58', NULL, 'no', NULL),
(364, '20240314295', 23, 21, 23, 21, 'received', 1, '2024-03-14 15:27:06', 1, NULL, NULL, 'no', NULL),
(365, '20240314296', 23, 21, 23, 21, 'received', 1, '2024-03-14 15:36:32', 1, NULL, NULL, 'no', NULL),
(366, '20240314296', 23, 21, 21, 21, 'received', 1, '2024-03-18 17:39:58', 1, '2024-03-14 16:00:34', NULL, 'no', NULL),
(367, '20240314295', 23, 21, 21, 21, 'received', 1, '2024-03-18 17:40:11', 1, '2024-03-14 16:00:51', NULL, 'no', NULL),
(368, '20240313288', 21, 21, 8, 21, 'received', 1, '2024-03-15 14:13:56', 1, '2024-03-15 08:34:30', NULL, 'no', 'Sir Mark, naay meeting today March 15, 2024, 9AM.'),
(369, '20240315297', 23, 21, 23, 21, 'received', 1, '2024-03-15 09:40:40', 1, NULL, NULL, 'no', NULL),
(370, '20240315298', 23, 21, 23, 21, 'received', 1, '2024-03-15 09:57:40', 1, NULL, NULL, 'no', NULL),
(371, '20240315299', 13, 21, 13, 21, 'received', 1, '2024-03-15 10:00:41', NULL, NULL, NULL, 'no', NULL),
(372, '20240315297', 23, 21, 8, 21, 'received', 1, '2024-03-16 14:19:54', 1, '2024-03-15 10:10:05', NULL, 'no', NULL),
(373, '20240315298', 23, 21, 8, 21, 'received', 1, '2024-03-16 14:19:37', 1, '2024-03-15 10:10:22', NULL, 'no', NULL),
(374, '20240313288', 8, 21, 23, 21, 'completed', 1, '2024-04-02 14:43:52', NULL, '2024-03-15 14:14:15', '11', 'yes', NULL),
(375, '20240312280', 8, 21, 8, 21, 'completed', 1, '2024-03-15 15:32:24', NULL, '2024-03-15 15:32:24', '15', 'no', NULL),
(376, '20240228191', 8, 21, 23, 21, 'completed', 1, '2024-03-22 14:48:31', NULL, '2024-03-15 15:36:37', '11', 'yes', NULL),
(377, '20240312281', 8, 21, 8, 21, 'completed', 1, '2024-03-15 15:46:19', NULL, '2024-03-15 15:46:19', '15', 'no', NULL),
(378, '20240313287', 8, 21, 8, 21, 'completed', 1, '2024-03-15 15:46:51', NULL, '2024-03-15 15:46:51', '15', 'no', NULL),
(379, '20240315298', 8, 21, 32, 21, 'received', 1, '2024-04-08 11:10:08', NULL, '2024-03-17 23:13:22', NULL, 'no', 'for consolidation'),
(380, '20240308266', 8, 21, 23, 21, 'completed', 1, '2024-03-22 14:40:15', NULL, '2024-03-17 23:14:15', '11', 'yes', NULL),
(381, '20240318300', 13, 21, 13, 21, 'received', 1, '2024-03-18 09:23:07', NULL, NULL, NULL, 'no', NULL),
(382, '20240318301', 13, 21, 13, 21, 'received', 1, '2024-03-18 13:24:36', NULL, NULL, NULL, 'no', NULL),
(383, '20240318302', 13, 21, 13, 21, 'received', 1, '2024-03-18 13:37:03', NULL, NULL, NULL, 'no', NULL),
(384, '20240318303', 13, 21, 13, 21, 'received', 1, '2024-03-18 17:08:56', 1, '2024-03-19 22:18:59', NULL, 'no', NULL),
(385, '20240318304', 13, 21, 13, 21, 'received', 1, '2024-03-18 17:09:54', 1, '2024-03-26 11:31:34', NULL, 'no', NULL),
(387, '20240313286', 21, 21, 33, 21, 'received', 1, '2024-03-20 09:04:12', 1, '2024-03-18 17:42:31', NULL, 'no', 'For CBYDP consolidation.'),
(388, '20240313285', 21, 21, 33, 21, 'received', 1, '2024-03-20 09:04:27', 1, '2024-03-18 17:44:29', NULL, 'no', 'For ABYIP consolidation.'),
(389, '20240314289', 21, 21, 32, 21, 'received', 1, '2024-04-08 11:13:00', NULL, '2024-03-18 17:47:21', NULL, 'no', 'For appropriate action.\r\n- applying for OFOP'),
(390, '20240314290', 21, 21, 24, 21, 'received', 1, '2024-03-19 17:06:01', 1, '2024-03-18 17:49:17', NULL, 'no', 'For appropriate action.'),
(391, '20240314291', 21, 21, 8, 21, 'received', 1, '2024-03-19 22:09:25', 1, '2024-03-18 17:51:25', NULL, 'no', 'Forwarded to Sir Mark.'),
(392, '20240314292', 21, 21, 8, 21, 'received', 1, '2024-03-19 22:10:12', 1, '2024-03-18 17:53:04', NULL, 'no', 'Forwarded to Sir Mark.'),
(393, '20240314294', 21, 21, 33, 21, 'received', 1, '2024-03-20 09:04:39', 1, '2024-03-18 17:55:21', NULL, 'no', 'For ABYIP consolidation.'),
(394, '20240314293', 21, 21, 33, 21, 'received', 1, '2024-03-20 09:06:34', 1, '2024-03-18 17:56:32', NULL, 'no', 'For consolidation.'),
(395, '20240314296', 21, 21, 8, 21, 'received', 1, '2024-03-19 22:10:05', 1, '2024-03-18 17:58:19', NULL, 'no', 'Forwarded to Sir Mark.'),
(396, '20240314295', 21, 21, 23, 21, 'received', 1, '2024-03-22 09:34:49', 1, '2024-03-18 18:01:38', NULL, 'no', 'Jhong, \r\nFor information and compliance to all staff and let them to sign.'),
(397, '20240319305', 23, 21, 23, 21, 'received', 1, '2024-03-19 08:46:14', 1, NULL, NULL, 'no', NULL),
(404, '20240319309', 23, 21, 23, 21, 'received', 1, '2024-03-19 09:45:21', 1, NULL, NULL, 'no', NULL),
(405, '20240319305', 23, 21, 8, 21, 'received', 1, '2024-03-19 22:56:55', 1, '2024-03-19 09:54:25', NULL, 'no', NULL),
(406, '20240319309', 23, 21, 8, 21, 'received', 1, '2024-03-19 22:10:20', 1, '2024-03-19 09:58:34', NULL, 'no', NULL),
(410, '20240319310', 23, 21, 23, 21, 'received', 1, '2024-03-19 10:28:02', 1, NULL, NULL, 'no', NULL),
(411, '20240319311', 23, 21, 23, 21, 'received', 1, '2024-03-19 10:33:36', 1, NULL, NULL, 'no', NULL),
(412, '20240319311', 23, 21, 8, 21, 'received', 1, '2024-03-19 22:13:13', 1, '2024-03-19 10:36:08', NULL, 'no', NULL),
(413, '20240319310', 23, 21, 8, 21, 'received', 1, '2024-04-01 22:04:35', 1, '2024-03-19 10:36:23', NULL, 'no', NULL),
(414, '20240319312', 23, 21, 23, 21, 'received', 1, '2024-03-19 10:41:51', 1, NULL, NULL, 'no', NULL),
(415, '20240319313', 23, 21, 23, 21, 'received', 1, '2024-03-19 10:44:57', 1, NULL, NULL, 'no', NULL),
(416, '20240319314', 13, 21, 13, 21, 'received', 1, '2024-03-19 10:45:38', NULL, NULL, NULL, 'no', NULL),
(417, '20240319313', 23, 21, 8, 21, 'received', 1, '2024-03-19 16:31:51', 1, '2024-03-19 10:47:15', NULL, 'no', NULL),
(418, '20240319312', 23, 21, 8, 21, 'received', 1, '2024-03-19 16:31:41', 1, '2024-03-19 10:47:29', NULL, 'no', NULL),
(419, '20240319315', 23, 21, 23, 21, 'received', 1, '2024-03-19 10:55:50', 1, NULL, NULL, 'no', NULL),
(420, '20240312282', 21, 21, 8, 21, 'received', 1, '2024-03-19 22:12:19', 1, '2024-03-19 11:31:01', NULL, 'no', 'Forwarded to Sir mark.'),
(421, '20240312284', 21, 21, 8, 21, 'received', 1, '2024-03-19 22:12:27', 1, '2024-03-19 11:32:25', NULL, 'no', 'Forwarded to Sir Mark.'),
(422, '20240312283', 21, 21, 8, 21, 'received', 1, '2024-03-19 22:11:32', 1, '2024-03-19 11:34:55', NULL, 'no', 'Forwarded to Sir Mark.'),
(423, '20240319316', 23, 21, 23, 21, 'received', 1, '2024-03-19 11:57:22', 1, NULL, NULL, 'no', NULL),
(424, '20240319317', 23, 21, 23, 21, 'received', 1, '2024-03-19 13:48:36', 1, NULL, NULL, 'no', NULL),
(425, '20240319318', 23, 21, 23, 21, 'received', 1, '2024-03-19 13:52:14', 1, NULL, NULL, 'no', NULL),
(426, '20240319319', 23, 21, 23, 21, 'received', 1, '2024-03-19 13:54:50', 1, NULL, NULL, 'no', NULL),
(427, '20240319319', 23, 21, 8, 21, 'received', 1, '2024-03-19 16:32:24', 1, '2024-03-19 14:00:56', NULL, 'no', NULL),
(428, '20240319318', 23, 21, 8, 21, 'received', 1, '2024-03-19 16:32:33', 1, '2024-03-19 14:01:13', NULL, 'no', NULL),
(429, '20240319317', 23, 21, 8, 21, 'received', 1, '2024-03-19 22:11:46', 1, '2024-03-19 14:01:31', NULL, 'no', NULL),
(430, '20240319316', 23, 21, 8, 21, 'received', 1, '2024-03-19 22:11:18', 1, '2024-03-19 14:01:45', NULL, 'no', NULL),
(431, '20240319315', 23, 21, 8, 21, 'received', 1, '2024-03-19 22:11:09', NULL, '2024-03-19 14:02:00', NULL, 'no', NULL),
(432, '20240319318', 8, 21, 33, 21, 'received', 1, '2024-03-20 09:03:31', 1, '2024-03-19 16:33:03', NULL, 'no', 'for consolidation'),
(433, '20240319319', 8, 21, 33, 21, 'received', 1, '2024-03-20 09:03:45', 1, '2024-03-19 16:33:17', NULL, 'no', 'for consolidation'),
(434, '20240319312', 8, 21, 33, 21, 'received', 1, '2024-03-20 09:03:56', 1, '2024-03-19 16:33:32', NULL, 'no', 'for consolidation'),
(435, '20240319313', 8, 21, 33, 21, 'received', 1, '2024-03-20 09:03:16', 1, '2024-03-19 16:33:46', NULL, 'no', 'for consolidation'),
(436, '20240318303', 8, 21, 8, 21, 'completed', 1, '2024-03-19 22:18:59', NULL, '2024-03-19 22:18:59', '15', 'no', NULL),
(437, '20240314296', 8, 21, 23, 21, 'received', 1, '2024-03-22 14:38:19', 1, '2024-03-19 22:26:49', NULL, 'no', 'Please attend and make a report of the topics during the monday meeting and then file'),
(438, '20240312282', 8, 21, 9, 21, 'received', 1, '2024-03-20 09:28:03', NULL, '2024-03-19 22:30:14', NULL, 'no', 'request granted and for coordination with concern students'),
(439, '20240312284', 8, 21, 9, 21, 'received', 1, '2024-03-20 09:28:08', NULL, '2024-03-19 22:30:30', NULL, 'no', 'request granted and for coordination with concern students'),
(440, '20240319317', 8, 21, 23, 21, 'received', 1, '2024-03-22 14:38:31', 1, '2024-03-19 22:40:41', NULL, 'no', 'for info all staff and then file'),
(441, '20240319305', 8, 21, 26, 21, 'received', 1, '2024-03-25 16:47:21', 1, '2024-03-19 22:57:49', NULL, 'no', 'intent is approved subject to compliance of of complete documentary requirements, and for further appropriate action'),
(442, '20240319311', 8, 21, 32, 21, 'received', 1, '2024-04-08 11:13:23', NULL, '2024-03-19 22:59:54', NULL, 'no', 'for consolidation'),
(443, '20240312283', 8, 21, 23, 21, 'torec', NULL, NULL, NULL, '2024-03-19 23:05:02', NULL, 'no', 'for 2nd indorsement to cafo and then file'),
(446, '20240319316', 8, 21, 23, 21, 'received', 1, '2024-03-26 16:08:05', 1, '2024-03-19 23:10:57', NULL, 'no', 'for file'),
(447, '20240314292', 8, 21, 23, 21, 'received', 1, '2024-03-22 14:43:34', 1, '2024-03-19 23:12:34', NULL, 'no', 'for file'),
(448, '20240319309', 8, 21, 26, 21, 'received', 1, '2024-03-25 16:47:09', 1, '2024-03-19 23:51:47', NULL, 'no', 'request is approved, for facilitation and coordination'),
(449, '20240315297', 8, 21, 26, 21, 'received', 1, '2024-03-25 16:46:59', 1, '2024-03-19 23:52:50', NULL, 'no', 'NTP already issued, for coordination and facilitation, then endorse for filing'),
(450, '20240311279', 8, 21, 26, 21, 'received', 1, '2024-03-25 16:46:43', 1, '2024-03-19 23:53:34', NULL, 'no', 'NTP already issued, for coordination and facilitation and then endorse for filing'),
(451, '20240306240', 8, 21, 23, 21, 'received', 1, '2024-03-22 14:44:22', 1, '2024-03-19 23:54:26', NULL, 'no', 'for file'),
(452, '20240306241', 8, 21, 32, 21, 'received', 1, '2024-04-08 10:48:26', NULL, '2024-03-19 23:55:45', NULL, 'no', 'for inclusion in the 2nd sem SY 2023-2024');
INSERT INTO `history` (`history_id`, `t_number`, `user1`, `office1`, `user2`, `office2`, `status`, `received_status`, `received_date`, `release_status`, `release_date`, `final_action_taken`, `to_receiver`, `remarks`) VALUES
(453, '20240320320', 23, 21, 23, 21, 'received', 1, '2024-03-20 17:00:19', 1, NULL, NULL, 'no', NULL),
(454, '20240320321', 23, 21, 23, 21, 'received', 1, '2024-03-20 17:02:40', 1, NULL, NULL, 'no', NULL),
(455, '20240320321', 23, 21, 8, 21, 'received', 1, '2024-03-21 23:24:57', 1, '2024-03-20 17:04:51', NULL, 'no', NULL),
(456, '20240320320', 23, 21, 8, 21, 'received', 1, '2024-03-21 23:24:47', 1, '2024-03-20 17:05:04', NULL, 'no', NULL),
(457, '20240321322', 23, 21, 23, 21, 'received', 1, '2024-03-21 09:08:10', 1, NULL, NULL, 'no', NULL),
(458, '20240321322', 23, 21, 8, 21, 'received', 1, '2024-03-21 23:29:31', 1, '2024-03-21 09:11:13', NULL, 'no', NULL),
(459, '20240321323', 23, 21, 23, 21, 'received', 1, '2024-03-21 09:16:48', 1, NULL, NULL, 'no', NULL),
(460, '20240321324', 23, 21, 23, 21, 'received', 1, '2024-03-21 09:24:36', 1, NULL, NULL, 'no', NULL),
(461, '20240321324', 23, 21, 8, 21, 'received', 1, '2024-03-21 23:33:04', 1, '2024-03-21 09:29:18', NULL, 'no', NULL),
(462, '20240321323', 23, 21, 8, 21, 'received', 1, '2024-03-21 23:31:04', 1, '2024-03-21 09:29:36', NULL, 'no', NULL),
(463, '20240321325', 23, 21, 23, 21, 'received', 1, '2024-03-21 11:19:08', 1, NULL, NULL, 'no', NULL),
(464, '20240321326', 23, 21, 23, 21, 'received', 1, '2024-03-21 11:30:02', 1, NULL, NULL, 'no', NULL),
(465, '20240321326', 23, 21, 8, 21, 'received', 1, '2024-03-21 23:30:27', 1, '2024-03-21 11:32:28', NULL, 'no', NULL),
(466, '20240321325', 23, 21, 8, 21, 'received', 1, '2024-03-21 23:30:54', 1, '2024-03-21 11:32:42', NULL, 'no', NULL),
(467, '20240321327', 23, 21, 23, 21, 'received', 1, '2024-03-21 11:36:06', 1, NULL, NULL, 'no', NULL),
(468, '20240321328', 23, 21, 23, 21, 'received', 1, '2024-03-21 11:39:18', 1, NULL, NULL, 'no', NULL),
(469, '20240321329', 23, 21, 23, 21, 'received', 1, '2024-03-21 13:26:29', 1, NULL, NULL, 'no', NULL),
(470, '20240321327', 23, 21, 8, 21, 'received', 1, '2024-03-21 23:30:45', 1, '2024-03-21 13:29:02', NULL, 'no', NULL),
(471, '20240321328', 23, 21, 8, 21, 'received', 1, '2024-03-21 23:30:37', 1, '2024-03-21 13:29:17', NULL, 'no', NULL),
(472, '20240321329', 23, 21, 8, 21, 'received', 1, '2024-03-21 23:30:09', 1, '2024-03-21 13:29:30', NULL, 'no', NULL),
(473, '20240321330', 23, 21, 23, 21, 'received', 1, '2024-03-21 15:52:27', 1, NULL, NULL, 'no', NULL),
(474, '20240321330', 23, 21, 8, 21, 'received', 1, '2024-03-21 23:29:52', 1, '2024-03-21 15:54:42', NULL, 'no', NULL),
(475, '20240321324', 8, 21, 32, 21, 'received', 1, '2024-04-08 11:11:04', NULL, '2024-03-22 00:00:43', NULL, 'no', 'for consolidation'),
(476, '20240321323', 8, 21, 23, 21, 'received', 1, '2024-03-22 09:33:59', 1, '2024-03-22 00:01:06', NULL, 'no', 'for file'),
(477, '20240321325', 8, 21, 32, 21, 'received', 1, '2024-04-08 11:11:41', NULL, '2024-03-22 00:01:28', NULL, 'no', 'for consolidation'),
(478, '20240321327', 8, 21, 33, 21, 'received', 1, '2024-03-22 08:37:58', 1, '2024-03-22 00:01:49', NULL, 'no', 'for consolidation'),
(479, '20240321328', 8, 21, 33, 21, 'received', 1, '2024-03-22 08:38:04', 1, '2024-03-22 00:02:06', NULL, 'no', 'for consolidation'),
(480, '20240321329', 8, 21, 23, 21, 'received', 1, '2024-03-22 14:44:42', 1, '2024-03-22 00:02:34', NULL, 'no', 'for info all staff and then file'),
(481, '20240321330', 8, 21, 32, 21, 'received', 1, '2024-04-08 11:11:28', NULL, '2024-03-22 00:02:56', NULL, 'no', 'for consolidation'),
(482, '20240321322', 8, 21, 23, 21, 'received', 1, '2024-03-22 09:31:32', 1, '2024-03-22 00:03:19', NULL, 'no', 'for file'),
(483, '20240320320', 8, 21, 23, 21, 'received', 1, '2024-03-22 09:33:28', 1, '2024-03-22 00:03:49', NULL, 'no', 'for file'),
(484, '20240322331', 13, 21, 13, 21, 'received', 1, '2024-03-22 09:22:35', 1, '2024-03-26 11:28:09', NULL, 'no', NULL),
(485, '20240322332', 13, 21, 13, 21, 'received', 1, '2024-03-22 09:32:30', 1, '2024-03-26 17:04:20', NULL, 'no', NULL),
(486, '20240322333', 23, 21, 23, 21, 'received', 1, '2024-03-22 09:47:20', 1, NULL, NULL, 'no', NULL),
(487, '20240322334', 23, 21, 23, 21, 'received', 1, '2024-03-22 09:53:01', 1, NULL, NULL, 'no', NULL),
(488, '20240322335', 23, 21, 23, 21, 'received', 1, '2024-03-22 09:58:46', 1, NULL, NULL, 'no', NULL),
(489, '20240321322', 23, 21, 8, 21, 'received', 1, '2024-03-22 14:34:56', 1, '2024-03-22 10:02:20', NULL, 'no', NULL),
(490, '20240320320', 23, 21, 8, 21, 'received', 1, '2024-03-25 15:58:56', 1, '2024-03-22 10:02:36', NULL, 'no', NULL),
(491, '20240321323', 23, 21, 8, 21, 'received', 1, '2024-04-01 22:04:29', 1, '2024-03-22 10:02:53', NULL, 'no', NULL),
(492, '20240314295', 23, 21, 8, 21, 'received', 1, '2024-04-01 22:04:22', 1, '2024-03-22 10:03:26', NULL, 'no', NULL),
(493, '20240322333', 23, 21, 8, 21, 'received', 1, '2024-03-22 14:24:38', 1, '2024-03-22 10:03:40', NULL, 'no', NULL),
(494, '20240322334', 23, 21, 8, 21, 'received', 1, '2024-03-22 14:25:08', 1, '2024-03-22 10:03:54', NULL, 'no', NULL),
(495, '20240322335', 23, 21, 8, 21, 'received', 1, '2024-03-22 14:25:16', 1, '2024-03-22 10:04:11', NULL, 'no', NULL),
(496, '20240322336', 23, 21, 23, 21, 'received', 1, '2024-03-22 13:39:34', 1, NULL, NULL, 'no', NULL),
(497, '20240322336', 23, 21, 8, 21, 'received', 1, '2024-03-22 14:25:00', 1, '2024-03-22 13:42:21', NULL, 'no', NULL),
(498, '20240322333', 8, 21, 23, 21, 'torec', NULL, NULL, NULL, '2024-03-22 14:27:56', NULL, 'no', 'for file'),
(499, '20240322335', 8, 21, 32, 21, 'received', 1, '2024-04-08 10:52:22', NULL, '2024-03-22 14:31:41', NULL, 'no', 'for consolidation and priority for interview'),
(500, '20240322334', 8, 21, 32, 21, 'received', 1, '2024-04-08 10:52:47', NULL, '2024-03-22 14:34:44', NULL, 'no', 'for consolidation and for priority in interview'),
(501, '20240321322', 8, 21, 23, 21, 'received', 1, '2024-03-22 14:46:03', 1, '2024-03-22 14:35:23', NULL, 'no', 'for file'),
(502, '20240319317', 23, 21, 23, 21, 'completed', 1, '2024-03-22 14:42:01', NULL, '2024-03-22 14:40:43', '11', 'yes', NULL),
(503, '20240314296', 23, 21, 23, 21, 'completed', 1, '2024-03-22 14:42:48', NULL, '2024-03-22 14:40:53', '11', 'yes', NULL),
(504, '20240321322', 23, 21, 23, 21, 'completed', 1, '2024-03-22 14:50:40', NULL, '2024-03-22 14:47:47', '11', 'yes', NULL),
(505, '20240321329', 23, 21, 23, 21, 'completed', 1, '2024-03-22 14:51:03', NULL, '2024-03-22 14:47:56', '11', 'yes', NULL),
(506, '20240306240', 23, 21, 23, 21, 'completed', 1, '2024-03-22 14:49:02', NULL, '2024-03-22 14:48:05', '11', 'yes', NULL),
(507, '20240314292', 23, 21, 23, 21, 'completed', 1, '2024-03-22 14:50:11', NULL, '2024-03-22 14:48:17', '11', 'yes', NULL),
(508, '20240322337', 23, 21, 23, 21, 'received', 1, '2024-03-22 15:33:37', 1, NULL, NULL, 'no', NULL),
(509, '20240322338', 23, 21, 23, 21, 'received', 1, '2024-03-22 15:35:50', 1, NULL, NULL, 'no', NULL),
(510, '20240322337', 23, 21, 8, 21, 'received', 1, '2024-03-25 15:31:57', 1, '2024-03-22 15:54:20', NULL, 'no', NULL),
(511, '20240322338', 23, 21, 8, 21, 'received', 1, '2024-03-25 15:32:04', 1, '2024-03-22 15:54:38', NULL, 'no', NULL),
(512, '20240322339', 23, 21, 23, 21, 'received', 1, '2024-03-22 16:17:07', 1, NULL, NULL, 'no', NULL),
(513, '20240322339', 23, 21, 8, 21, 'received', 1, '2024-03-25 15:58:03', 1, '2024-03-22 16:18:29', NULL, 'no', NULL),
(514, '20240319306', 23, 21, 23, 21, 'received', 1, '2024-03-19 09:03:57', 1, NULL, NULL, 'no', NULL),
(515, '20240319306', 23, 21, 8, 21, 'received', 1, '2024-03-19 09:22:31', 1, '2024-03-19 09:28:31', NULL, 'no', NULL),
(516, '20240319306', 8, 21, 32, 21, 'received', 1, '2024-04-08 11:13:41', NULL, '2024-03-19 09:40:31', NULL, 'no', 'for consolidation'),
(517, '20240319308', 23, 21, 23, 21, 'received', 1, '2024-03-19 09:37:47', 1, '2024-03-19 09:39:47', NULL, 'no', NULL),
(518, '20240319308', 23, 21, 8, 21, 'received', 1, '2024-03-19 09:40:47', 1, '2024-03-19 09:45:47', NULL, 'no', NULL),
(519, '20240319308', 8, 21, 32, 21, 'received', 1, '2024-04-08 11:13:32', NULL, '2024-03-19 09:51:30', NULL, 'no', 'for consolidation'),
(520, '20240321326', 8, 21, 26, 21, 'received', 1, '2024-03-25 16:46:34', 1, '2024-03-23 14:32:26', NULL, 'no', 'Please attend if conflict with my schedule, make a report and then file'),
(521, '20240325340', 23, 21, 23, 21, 'received', 1, '2024-03-25 09:57:11', 1, NULL, NULL, 'no', NULL),
(522, '20240325341', 23, 21, 23, 21, 'received', 1, '2024-03-25 10:20:11', 1, NULL, NULL, 'no', NULL),
(523, '20240325342', 23, 21, 23, 21, 'received', 1, '2024-03-25 10:23:39', 1, NULL, NULL, 'no', NULL),
(524, '20240325340', 23, 21, 8, 21, 'received', 1, '2024-03-25 15:58:17', 1, '2024-03-25 10:31:43', NULL, 'no', NULL),
(525, '20240325341', 23, 21, 8, 21, 'received', 1, '2024-03-25 15:58:25', 1, '2024-03-25 10:31:56', NULL, 'no', NULL),
(526, '20240325342', 23, 21, 8, 21, 'received', 1, '2024-03-25 15:55:21', 1, '2024-03-25 10:32:09', NULL, 'no', NULL),
(527, '20240325343', 23, 21, 23, 21, 'received', 1, '2024-03-25 14:35:17', 1, NULL, NULL, 'no', NULL),
(528, '20240325344', 23, 21, 23, 21, 'received', 1, '2024-03-25 15:19:07', 1, NULL, NULL, 'no', NULL),
(529, '20240325345', 23, 21, 23, 21, 'received', 1, '2024-03-25 15:29:56', 1, NULL, NULL, 'no', NULL),
(530, '20240322338', 8, 21, 33, 21, 'received', 1, '2024-03-25 15:36:21', 1, '2024-03-25 15:34:33', NULL, 'no', 'for consolidation'),
(531, '20240322337', 8, 21, 33, 21, 'received', 1, '2024-03-25 15:36:27', 1, '2024-03-25 15:34:47', NULL, 'no', 'for consolidation'),
(532, '20240325346', 23, 21, 23, 21, 'received', 1, '2024-03-25 15:39:44', 1, NULL, NULL, 'no', NULL),
(533, '20240325346', 23, 21, 8, 21, 'received', 1, '2024-03-25 17:16:52', 1, '2024-03-25 15:46:40', NULL, 'no', NULL),
(534, '20240325345', 23, 21, 8, 21, 'received', 1, '2024-03-25 15:57:35', 1, '2024-03-25 15:46:54', NULL, 'no', NULL),
(535, '20240325344', 23, 21, 8, 21, 'received', 1, '2024-03-25 15:57:16', 1, '2024-03-25 15:47:08', NULL, 'no', NULL),
(536, '20240325343', 23, 21, 8, 21, 'received', 1, '2024-03-25 15:56:45', 1, '2024-03-25 15:47:20', NULL, 'no', NULL),
(537, '20240325342', 8, 21, 23, 21, 'received', 1, '2024-03-26 15:16:13', 1, '2024-03-25 15:55:56', NULL, 'no', 'for file - Notice of Meeting'),
(538, '20240320320', 8, 21, 23, 21, 'received', 1, '2024-03-26 16:07:39', 1, '2024-03-25 15:59:21', NULL, 'no', 'for file'),
(539, '20240325347', 23, 21, 23, 21, 'received', 1, '2024-03-25 16:02:15', 1, NULL, NULL, 'no', NULL),
(540, '20240311279', 26, 21, 23, 21, 'received', 1, '2024-03-26 16:07:20', 1, '2024-03-25 16:49:01', NULL, 'no', 'na coordinate na ug gikuha na ang notice to proceed sa mga students. gihatag na nako ni kuya jong for filing.'),
(541, '20240315297', 26, 21, 23, 21, 'received', 1, '2024-03-26 16:07:11', 1, '2024-03-25 16:50:38', NULL, 'no', 'gikuha na sa student ang notice to proceed. Dayun gihatag na anko ni kuya jong for filing'),
(542, '20240307258', 26, 21, 8, 21, 'received', 1, '2024-04-01 22:03:30', 1, '2024-03-25 16:51:43', NULL, 'no', 'papirmahan sa terminal and deployment report.'),
(543, '20240319309', 26, 21, 23, 21, 'received', 1, '2024-03-26 16:07:01', 1, '2024-03-25 16:52:43', NULL, 'no', 'for file.'),
(544, '20240325348', 23, 21, 23, 21, 'received', 1, '2024-03-25 17:02:53', 1, NULL, NULL, 'no', NULL),
(545, '20240325347', 23, 21, 8, 21, 'received', 1, '2024-03-26 12:04:47', 1, '2024-03-25 17:04:54', NULL, 'no', NULL),
(546, '20240325348', 23, 21, 8, 21, 'received', 1, '2024-03-25 17:09:59', 1, '2024-03-25 17:05:09', NULL, 'no', NULL),
(547, '20240320321', 8, 21, 23, 21, 'received', 1, '2024-03-26 15:09:05', 1, '2024-03-25 17:08:29', NULL, 'no', 'for file'),
(548, '20240325343', 8, 21, 23, 21, 'received', 1, '2024-03-26 15:23:22', 1, '2024-03-25 17:09:16', NULL, 'no', 'for file'),
(549, '20240325348', 8, 21, 24, 21, 'received', 1, '2024-03-27 11:08:04', 1, '2024-03-25 17:11:45', NULL, 'no', 'for consideration for second sem SY 2023-2024 with reservation that if he will no longer be given the chance to renew if the same will happen next semester'),
(550, '20240322336', 8, 21, 23, 21, 'received', 1, '2024-03-26 16:06:52', 1, '2024-03-25 17:12:49', NULL, 'no', 'for file'),
(551, '20240325341', 8, 21, 23, 21, 'received', 1, '2024-03-26 15:24:52', 1, '2024-03-25 17:13:56', NULL, 'no', 'for file'),
(552, '20240325340', 8, 21, 26, 21, 'received', 1, '2024-04-01 16:07:02', 1, '2024-03-25 17:14:44', NULL, 'no', 'for attendance and then make a report and file'),
(553, '20240322339', 8, 21, 32, 21, 'received', 1, '2024-04-08 11:10:41', NULL, '2024-03-25 17:15:49', NULL, 'no', 'for consolidation OFOP Applicants 1st Sem SY 2024-2025'),
(554, '20240325346', 8, 21, 32, 21, 'received', 1, '2024-04-08 11:10:30', NULL, '2024-03-25 17:17:22', NULL, 'no', 'for consolidation SY 2024-2025'),
(555, '20240326349', 13, 21, 13, 21, 'received', 1, '2024-03-26 09:15:09', NULL, NULL, NULL, 'no', NULL),
(556, '20240326350', 23, 21, 23, 21, 'received', 1, '2024-03-26 10:01:03', 1, NULL, NULL, 'no', NULL),
(557, '20240326350', 23, 21, 8, 21, 'received', 1, '2024-03-26 11:32:30', 1, '2024-03-26 10:04:15', NULL, 'no', NULL),
(558, '20240326351', 23, 21, 23, 21, 'received', 1, '2024-03-26 10:43:20', 1, NULL, NULL, 'no', NULL),
(560, '20240326353', 23, 21, 23, 21, 'received', 1, '2024-03-26 11:06:19', 1, NULL, NULL, 'no', NULL),
(561, '20240326354', 23, 21, 23, 21, 'received', 1, '2024-03-26 11:11:26', 1, NULL, NULL, 'no', NULL),
(562, '20240326355', 23, 21, 23, 21, 'received', 1, '2024-03-26 11:16:12', 1, NULL, NULL, 'no', NULL),
(563, '20240326356', 23, 21, 23, 21, 'received', 1, '2024-03-26 11:25:06', 1, NULL, NULL, 'no', NULL),
(564, '20240322331', 8, 21, 8, 21, 'completed', 1, '2024-03-26 11:28:09', NULL, '2024-03-26 11:28:09', '15', 'no', NULL),
(565, '20240326357', 23, 21, 23, 21, 'received', 1, '2024-03-26 11:29:23', 1, NULL, NULL, 'no', NULL),
(566, '20240318304', 8, 21, 8, 21, 'completed', 1, '2024-03-26 11:31:34', NULL, '2024-03-26 11:31:34', '15', 'no', NULL),
(567, '20240326358', 23, 21, 23, 21, 'received', 1, '2024-03-26 11:38:37', 1, NULL, NULL, 'no', NULL),
(568, '20240326350', 8, 21, 23, 21, 'received', 1, '2024-03-26 15:25:13', 1, '2024-03-26 11:48:04', NULL, 'no', 'for file'),
(569, '20240325345', 8, 21, 23, 21, 'received', 1, '2024-03-26 11:56:57', 1, '2024-03-26 11:49:27', NULL, 'no', 'for file'),
(570, '20240325344', 8, 21, 23, 21, 'received', 1, '2024-03-26 15:25:33', 1, '2024-03-26 11:49:54', NULL, 'no', 'for file'),
(571, '20240326351', 23, 21, 8, 21, 'received', 1, '2024-03-26 12:06:31', 1, '2024-03-26 11:50:26', NULL, 'no', NULL),
(572, '20240326353', 23, 21, 8, 21, 'received', 1, '2024-03-26 12:07:34', 1, '2024-03-26 11:50:39', NULL, 'no', NULL),
(573, '20240326354', 23, 21, 8, 21, 'received', 1, '2024-03-26 12:07:41', 1, '2024-03-26 11:50:54', NULL, 'no', NULL),
(574, '20240326355', 23, 21, 8, 21, 'received', 1, '2024-03-26 12:07:14', 1, '2024-03-26 11:51:08', NULL, 'no', NULL),
(575, '20240326356', 23, 21, 8, 21, 'received', 1, '2024-03-26 12:07:01', 1, '2024-03-26 11:51:20', NULL, 'no', NULL),
(576, '20240326357', 23, 21, 8, 21, 'received', 1, '2024-03-26 12:06:50', 1, '2024-03-26 11:51:32', NULL, 'no', NULL),
(577, '20240326358', 23, 21, 8, 21, 'received', 1, '2024-03-26 12:06:41', 1, '2024-03-26 11:51:45', NULL, 'no', NULL),
(578, '20240325345', 23, 21, 23, 21, 'completed', 1, '2024-03-26 16:02:50', NULL, '2024-03-26 11:57:24', '11', 'yes', NULL),
(579, '20240325347', 8, 21, 24, 21, 'received', 1, '2024-03-27 11:08:12', 1, '2024-03-26 12:06:14', NULL, 'no', 'pls facilitate application and then subject for interview. let the applicant apply at cswd'),
(580, '20240326354', 8, 21, 32, 21, 'received', 1, '2024-04-08 10:53:18', NULL, '2024-03-26 12:39:17', NULL, 'no', 'for consolidation'),
(581, '20240326353', 8, 21, 32, 21, 'received', 1, '2024-04-08 11:09:38', NULL, '2024-03-26 12:39:39', NULL, 'no', 'for consolidation'),
(582, '20240326355', 8, 21, 32, 21, 'received', 1, '2024-04-08 11:09:30', NULL, '2024-03-26 12:39:58', NULL, 'no', 'for consolidation'),
(583, '20240326356', 8, 21, 32, 21, 'received', 1, '2024-04-08 11:09:18', NULL, '2024-03-26 12:40:19', NULL, 'no', 'for consolidation'),
(584, '20240326357', 8, 21, 32, 21, 'received', 1, '2024-04-08 11:08:49', NULL, '2024-03-26 12:40:37', NULL, 'no', 'for consolidation'),
(585, '20240326351', 8, 21, 23, 21, 'received', 1, '2024-03-26 16:06:28', 1, '2024-03-26 12:41:12', NULL, 'no', 'for info and file'),
(586, '20240326359', 23, 21, 23, 21, 'received', 1, '2024-03-26 14:29:02', 1, NULL, NULL, 'no', NULL),
(587, '20240326360', 23, 21, 23, 21, 'received', 1, '2024-03-26 14:34:27', 1, NULL, NULL, 'no', NULL),
(588, '20240326360', 23, 21, 8, 21, 'received', 1, '2024-04-01 22:03:07', 1, '2024-03-26 14:38:57', NULL, 'no', NULL),
(589, '20240326359', 23, 21, 8, 21, 'received', 1, '2024-03-26 16:57:58', 1, '2024-03-26 14:39:14', NULL, 'no', NULL),
(590, '20240326361', 23, 21, 23, 21, 'received', 1, '2024-03-26 14:50:41', 1, NULL, NULL, 'no', NULL),
(591, '20240326361', 23, 21, 8, 21, 'received', 1, '2024-03-26 16:58:05', 1, '2024-03-26 14:51:03', NULL, 'no', NULL),
(592, '20240326362', 23, 21, 23, 21, 'received', 1, '2024-03-26 16:46:55', 1, NULL, NULL, 'no', NULL),
(593, '20240326363', 23, 21, 23, 21, 'received', 1, '2024-03-26 16:52:39', 1, NULL, NULL, 'no', NULL),
(594, '20240326364', 23, 21, 23, 21, 'received', 1, '2024-03-26 16:56:47', 1, NULL, NULL, 'no', NULL),
(595, '20240326365', 23, 21, 23, 21, 'received', 1, '2024-03-26 17:01:26', 1, NULL, NULL, 'no', NULL),
(596, '20240326361', 8, 21, 21, 21, 'received', 1, '2024-04-08 08:41:30', NULL, '2024-03-26 17:02:33', NULL, 'no', 'for compliance of lacking documents'),
(597, '20240322332', 8, 21, 8, 21, 'completed', 1, '2024-03-26 17:04:21', NULL, '2024-03-26 17:04:21', '15', 'no', NULL),
(598, '20240322336', 23, 21, 8, 21, 'received', 1, '2024-04-01 22:02:58', 1, '2024-03-26 17:05:43', NULL, 'no', NULL),
(599, '20240326351', 23, 21, 8, 21, 'received', 1, '2024-04-01 22:02:34', 1, '2024-03-26 17:06:05', NULL, 'no', NULL),
(600, '20240325344', 23, 21, 8, 21, 'received', 1, '2024-04-01 22:01:42', 1, '2024-03-26 17:06:18', NULL, 'no', NULL),
(601, '20240326350', 23, 21, 8, 21, 'received', 1, '2024-04-01 14:06:51', 1, '2024-03-26 17:06:31', NULL, 'no', NULL),
(602, '20240325341', 23, 21, 8, 21, 'received', 1, '2024-04-01 22:02:26', 1, '2024-03-26 17:06:51', NULL, 'no', NULL),
(603, '20240325343', 23, 21, 8, 21, 'received', 1, '2024-04-01 14:07:07', 1, '2024-03-26 17:07:04', NULL, 'no', NULL),
(604, '20240326362', 23, 21, 8, 21, 'received', 1, '2024-04-01 21:55:00', 1, '2024-03-26 17:07:43', NULL, 'no', NULL),
(605, '20240326365', 23, 21, 8, 21, 'received', 1, '2024-04-01 21:55:35', 1, '2024-03-27 08:07:35', NULL, 'no', NULL),
(606, '20240326364', 23, 21, 8, 21, 'received', 1, '2024-04-01 21:55:24', 1, '2024-03-27 08:07:51', NULL, 'no', NULL),
(607, '20240326363', 23, 21, 8, 21, 'received', 1, '2024-04-01 21:55:10', 1, '2024-03-27 08:08:04', NULL, 'no', NULL),
(608, '20240319316', 23, 21, 23, 21, 'completed', 1, '2024-04-02 14:45:16', NULL, '2024-03-27 08:08:33', '11', 'yes', NULL),
(609, '20240320320', 23, 21, 23, 21, 'completed', 1, '2024-04-02 14:45:27', NULL, '2024-03-27 08:09:05', '11', 'yes', NULL),
(610, '20240311279', 23, 21, 23, 21, 'completed', 1, '2024-04-02 14:43:39', NULL, '2024-03-27 08:09:32', '11', 'yes', NULL),
(611, '20240315297', 23, 21, 23, 21, 'completed', 1, '2024-04-02 14:44:32', NULL, '2024-03-27 08:09:48', '11', 'yes', NULL),
(612, '20240327366', 23, 21, 23, 21, 'received', 1, '2024-03-27 08:31:35', 1, NULL, NULL, 'no', NULL),
(613, '20240327367', 23, 21, 23, 21, 'received', 1, '2024-03-27 09:20:38', 1, NULL, NULL, 'no', NULL),
(614, '20240327367', 23, 21, 8, 21, 'received', 1, '2024-04-01 21:54:39', 1, '2024-03-27 09:41:13', NULL, 'no', NULL),
(615, '20240327366', 23, 21, 8, 21, 'received', 1, '2024-04-01 14:06:22', 1, '2024-03-27 09:41:26', NULL, 'no', NULL),
(616, '20240314290', 24, 21, 27, 21, 'received', 1, '2024-04-08 08:20:28', NULL, '2024-03-27 11:07:02', NULL, 'no', 'For summer job 2024'),
(617, '20240401368', 23, 21, 23, 21, 'received', 1, '2024-04-01 10:46:44', 1, NULL, NULL, 'no', NULL),
(618, '20240401369', 23, 21, 23, 21, 'received', 1, '2024-04-01 10:52:35', 1, NULL, NULL, 'no', NULL),
(619, '20240401370', 23, 21, 23, 21, 'received', 1, '2024-04-01 10:58:12', 1, NULL, NULL, 'no', NULL),
(620, '20240401371', 23, 21, 23, 21, 'received', 1, '2024-04-01 11:02:38', 1, NULL, NULL, 'no', NULL),
(621, '20240401372', 23, 21, 23, 21, 'received', 1, '2024-04-01 11:08:06', 1, NULL, NULL, 'no', NULL),
(622, '20240401373', 23, 21, 23, 21, 'received', 1, '2024-04-01 11:13:20', 1, NULL, NULL, 'no', NULL),
(623, '20240401374', 23, 21, 23, 21, 'received', 1, '2024-04-01 11:29:19', 1, NULL, NULL, 'no', NULL),
(624, '20240401374', 23, 21, 8, 21, 'received', 1, '2024-04-01 14:05:05', 1, '2024-04-01 11:41:57', NULL, 'no', NULL),
(625, '20240401373', 23, 21, 8, 21, 'received', 1, '2024-04-01 14:05:18', 1, '2024-04-01 11:42:21', NULL, 'no', NULL),
(626, '20240401372', 23, 21, 8, 21, 'received', 1, '2024-04-01 14:05:33', 1, '2024-04-01 11:42:34', NULL, 'no', NULL),
(627, '20240401371', 23, 21, 8, 21, 'received', 1, '2024-04-01 14:05:43', 1, '2024-04-01 11:42:47', NULL, 'no', NULL),
(628, '20240401370', 23, 21, 8, 21, 'received', 1, '2024-04-01 14:05:54', 1, '2024-04-01 11:43:01', NULL, 'no', NULL),
(629, '20240401369', 23, 21, 8, 21, 'received', 1, '2024-04-01 14:06:02', 1, '2024-04-01 11:43:14', NULL, 'no', NULL),
(630, '20240401368', 23, 21, 8, 21, 'received', 1, '2024-04-01 14:06:12', 1, '2024-04-01 11:43:29', NULL, 'no', NULL),
(631, '20240401375', 23, 21, 23, 21, 'received', 1, '2024-04-01 12:00:05', 1, NULL, NULL, 'no', NULL),
(632, '20240401375', 23, 21, 8, 21, 'received', 1, '2024-04-01 14:04:53', 1, '2024-04-01 13:00:51', NULL, 'no', NULL),
(633, '20240401376', 23, 21, 23, 21, 'received', 1, '2024-04-01 14:28:34', 1, NULL, NULL, 'no', NULL),
(634, '20240401377', 23, 21, 23, 21, 'received', 1, '2024-04-01 14:39:05', 1, NULL, NULL, 'no', NULL),
(635, '20240401378', 23, 21, 23, 21, 'received', 1, '2024-04-01 15:12:18', 1, NULL, NULL, 'no', NULL),
(636, '20240401379', 23, 21, 23, 21, 'received', 1, '2024-04-01 15:27:56', 1, NULL, NULL, 'no', NULL),
(637, '20240401380', 23, 21, 23, 21, 'received', 1, '2024-04-01 15:51:05', 1, NULL, NULL, 'no', NULL),
(638, '20240401381', 23, 21, 23, 21, 'received', 1, '2024-04-01 16:00:10', 1, NULL, NULL, 'no', NULL),
(639, '20240319305', 26, 21, 8, 21, 'received', 1, '2024-04-01 22:02:08', 1, '2024-04-01 16:08:00', NULL, 'no', 'Change date(May 9-10, 2024)'),
(640, '20240401376', 23, 21, 8, 21, 'received', 1, '2024-04-01 22:01:52', 1, '2024-04-01 16:16:48', NULL, 'no', NULL),
(641, '20240401381', 23, 21, 8, 21, 'received', 1, '2024-04-01 21:51:55', 1, '2024-04-01 16:17:14', NULL, 'no', NULL),
(642, '20240401380', 23, 21, 8, 21, 'received', 1, '2024-04-01 21:52:08', 1, '2024-04-01 16:17:32', NULL, 'no', NULL),
(643, '20240401379', 23, 21, 8, 21, 'received', 1, '2024-04-01 21:50:56', 1, '2024-04-01 16:18:03', NULL, 'no', NULL),
(644, '20240401378', 23, 21, 8, 21, 'received', 1, '2024-04-01 21:51:41', 1, '2024-04-01 16:18:22', NULL, 'no', NULL),
(645, '20240401377', 23, 21, 8, 21, 'received', 1, '2024-04-01 21:52:21', 1, '2024-04-01 16:18:42', NULL, 'no', NULL),
(646, '20240319309', 23, 21, 23, 21, 'completed', 1, '2024-04-02 14:45:01', NULL, '2024-04-01 16:19:11', '11', 'yes', NULL),
(647, '20240325342', 23, 21, 23, 21, 'completed', 1, '2024-04-02 14:45:57', NULL, '2024-04-01 16:19:26', '11', 'yes', NULL),
(648, '20240320321', 23, 21, 23, 21, 'completed', 1, '2024-04-02 14:45:41', NULL, '2024-04-01 16:19:41', '11', 'yes', NULL),
(649, '20240306246', 8, 21, 23, 21, 'torec', NULL, NULL, NULL, '2024-04-01 22:05:31', NULL, 'no', 'approved and file'),
(650, '20240319310', 8, 21, 12, 21, 'received', 1, '2024-04-03 15:09:44', 1, '2024-04-01 22:06:11', NULL, 'no', 'please attend then endorse to liberto for filing'),
(651, '20240321323', 8, 21, 12, 21, 'received', 1, '2024-04-03 15:09:28', 1, '2024-04-01 22:06:33', NULL, 'no', 'please attend then endorse to liberto for filing'),
(652, '20240314295', 8, 21, 23, 21, 'torec', NULL, NULL, NULL, '2024-04-01 22:07:15', NULL, 'no', 'noted / for file'),
(653, '20240301215', 8, 21, 12, 21, 'received', 1, '2024-04-03 15:09:06', 1, '2024-04-01 22:07:39', NULL, 'no', 'approved then file'),
(654, '20240305236', 8, 21, 20, 21, 'torec', NULL, NULL, NULL, '2024-04-01 22:08:03', NULL, 'no', 'noted'),
(655, '20240307258', 8, 21, 26, 21, 'torec', NULL, NULL, NULL, '2024-04-01 22:08:41', NULL, 'no', 'approved, for reporting, then file'),
(656, '20240326360', 8, 21, 23, 21, 'torec', NULL, NULL, NULL, '2024-04-01 22:09:05', NULL, 'no', 'for info then file'),
(657, '20240322336', 8, 21, 23, 21, 'torec', NULL, NULL, NULL, '2024-04-01 22:09:33', NULL, 'no', 'noted then file'),
(658, '20240326351', 8, 21, 23, 21, 'torec', NULL, NULL, NULL, '2024-04-01 22:09:56', NULL, 'no', 'for info then file'),
(659, '20240325341', 8, 21, 23, 21, 'torec', NULL, NULL, NULL, '2024-04-01 22:10:20', NULL, 'no', 'for file'),
(660, '20240319305', 8, 21, 26, 21, 'torec', NULL, NULL, NULL, '2024-04-01 22:10:56', NULL, 'no', 'for invitation on may 1 job fair, then file'),
(661, '20240325344', 8, 21, 23, 21, 'torec', NULL, NULL, NULL, '2024-04-01 22:11:31', NULL, 'no', 'for file'),
(662, '20240326365', 8, 21, 32, 21, 'received', 1, '2024-04-08 11:02:58', NULL, '2024-04-01 22:14:19', NULL, 'no', 'for consolidation of application for 1st sem 2024'),
(663, '20240326363', 8, 21, 32, 21, 'received', 1, '2024-04-08 11:07:56', NULL, '2024-04-01 22:16:21', NULL, 'no', 'for consolidation of application for 1st sem 2024'),
(664, '20240327367', 8, 21, 23, 21, 'received', 1, '2024-04-02 14:46:55', 1, '2024-04-01 22:17:30', NULL, 'no', 'for file'),
(665, '20240327366', 8, 21, 23, 21, 'received', 1, '2024-04-02 14:40:47', 1, '2024-04-01 22:18:28', NULL, 'no', 'for file'),
(666, '20240401373', 8, 21, 32, 21, 'received', 1, '2024-04-08 11:04:25', NULL, '2024-04-01 22:19:24', NULL, 'no', 'for consolidation of application for 1st sem 2024'),
(667, '20240401371', 8, 21, 32, 21, 'received', 1, '2024-04-08 11:05:41', NULL, '2024-04-01 22:20:05', NULL, 'no', 'for consolidation of application for 1st sem 2024'),
(668, '20240401370', 8, 21, 32, 21, 'received', 1, '2024-04-08 11:06:00', NULL, '2024-04-01 22:22:00', NULL, 'no', 'for consolidation of application for 1st sem 2024'),
(669, '20240401368', 8, 21, 32, 21, 'received', 1, '2024-04-08 11:06:16', NULL, '2024-04-01 22:22:37', NULL, 'no', 'for consolidation of application for 1st sem 2024'),
(670, '20240401372', 8, 21, 32, 21, 'received', 1, '2024-04-08 11:06:29', NULL, '2024-04-01 22:23:13', NULL, 'no', 'for consolidation of application for 1st sem 2024'),
(671, '20240401375', 8, 21, 16, 21, 'received', 1, '2024-04-02 12:02:30', 1, '2024-04-01 22:31:23', NULL, 'no', 'pls identify 5 from Jobstart, pls cooridnate with masayon for SPES and GIp for at least 2 entries, preferably 4Ps and female'),
(672, '20240326350', 8, 21, 23, 21, 'torec', NULL, NULL, NULL, '2024-04-01 22:32:37', NULL, 'no', 'for file'),
(673, '20240325343', 8, 21, 23, 21, 'torec', NULL, NULL, NULL, '2024-04-01 22:32:59', NULL, 'no', 'for file'),
(674, '20240401374', 8, 21, 12, 21, 'received', 1, '2024-04-03 15:08:21', 1, '2024-04-01 22:33:35', NULL, 'no', 'please attend and then for file'),
(675, '20240401377', 8, 21, 32, 21, 'received', 1, '2024-04-08 10:54:33', NULL, '2024-04-01 22:35:53', NULL, 'no', 'for consolidation of application for 1st sem 2024, priority'),
(676, '20240401380', 8, 21, 32, 21, 'received', 1, '2024-04-08 11:03:48', NULL, '2024-04-01 22:38:11', NULL, 'no', 'for consolidation of application for 1st sem 2024'),
(677, '20240401378', 8, 21, 32, 21, 'received', 1, '2024-04-08 11:03:37', NULL, '2024-04-01 22:42:48', NULL, 'no', 'for consolidation of application for 1st sem 2024'),
(678, '20240401379', 8, 21, 32, 21, 'received', 1, '2024-04-08 11:03:24', NULL, '2024-04-01 22:43:51', NULL, 'no', 'for consolidation of application for 1st sem 2024'),
(679, '20240401369', 8, 21, 32, 21, 'received', 1, '2024-04-08 10:51:34', NULL, '2024-04-01 22:47:14', NULL, 'no', 'for consolidation of application for 1st sem 2024 , may be prioritized'),
(680, '20240401381', 8, 21, 24, 21, 'received', 1, '2024-04-02 09:58:28', 1, '2024-04-01 22:54:41', NULL, 'no', 'requirements complete, endorse for approval, update the latin honor database then for filing'),
(681, '20240401376', 8, 21, 23, 21, 'received', 1, '2024-04-02 14:32:56', 1, '2024-04-01 23:24:01', NULL, 'no', 'for file'),
(682, '20240326359', 8, 21, 23, 21, 'torec', NULL, NULL, NULL, '2024-04-01 23:54:32', NULL, 'no', 'for submission of accomplishment to OCM and then file'),
(683, '20240402382', 23, 21, 23, 21, 'received', 1, '2024-04-02 09:35:15', 1, NULL, NULL, 'no', NULL),
(684, '20240402382', 23, 21, 8, 21, 'received', 1, '2024-04-02 12:15:25', 1, '2024-04-02 09:39:17', NULL, 'no', NULL),
(685, '20240401381', 24, 21, 23, 21, 'received', 1, '2024-04-02 14:47:44', 1, '2024-04-02 10:04:40', NULL, 'no', 'Done sorting and updated the latin honor database. Forwarded to Mr. Richard Liberto for outgoing and for filing.'),
(686, '20240402383', 23, 21, 23, 21, 'received', 1, '2024-04-02 10:28:40', 1, NULL, NULL, 'no', NULL),
(687, '20240402384', 23, 21, 23, 21, 'received', 1, '2024-04-02 10:34:03', 1, NULL, NULL, 'no', NULL),
(688, '20240402385', 23, 21, 23, 21, 'received', 1, '2024-04-02 10:42:08', 1, NULL, NULL, 'no', NULL),
(689, '20240402385', 23, 21, 8, 21, 'received', 1, '2024-04-02 12:14:39', NULL, '2024-04-02 11:02:54', NULL, 'no', NULL),
(690, '20240402384', 23, 21, 8, 21, 'received', 1, '2024-04-02 12:12:50', 1, '2024-04-02 11:03:08', NULL, 'no', NULL),
(691, '20240402383', 23, 21, 8, 21, 'received', 1, '2024-04-02 12:14:31', NULL, '2024-04-02 11:03:29', NULL, 'no', NULL),
(692, '20240325348', 24, 21, 8, 21, 'received', 1, '2024-04-02 12:25:27', 1, '2024-04-02 11:04:37', NULL, 'no', 'Sir, upon checking sa COG dli ka renew. Naay 3 ka subject below 80 na grades.'),
(693, '20240325347', 24, 21, 8, 21, 'received', 1, '2024-04-02 12:25:21', 1, '2024-04-02 11:14:19', NULL, 'no', 'Done facilitated application & interview.'),
(694, '20240402382', 8, 21, 21, 21, 'received', 1, '2024-04-08 08:40:17', 1, '2024-04-02 12:22:13', NULL, 'no', 'please attend, prepare TO, make a report and then for file'),
(695, '20240402384', 8, 21, 32, 21, 'received', 1, '2024-04-08 11:08:24', NULL, '2024-04-02 12:24:33', NULL, 'no', 'for consolidation'),
(696, '20240325347', 8, 21, 23, 21, 'received', 1, '2024-04-02 14:48:47', 1, '2024-04-02 12:25:50', NULL, 'no', 'for file'),
(697, '20240325348', 8, 21, 23, 21, 'received', 1, '2024-04-02 14:52:49', 1, '2024-04-02 12:38:47', NULL, 'no', 'disapproved due to grades below 80%, for file'),
(698, '20240401376', 23, 21, 23, 21, 'completed', 1, '2024-04-02 14:42:32', NULL, '2024-04-02 14:33:12', '11', 'yes', NULL),
(699, '20240327366', 23, 21, 23, 21, 'completed', 1, '2024-04-02 14:41:57', NULL, '2024-04-02 14:41:21', '11', 'yes', NULL),
(700, '20240326358', 8, 21, 23, 21, 'completed', 1, '2024-04-02 14:54:42', NULL, '2024-04-02 14:54:12', '11', 'yes', NULL),
(701, '20240325348', 23, 21, 23, 21, 'completed', 1, '2024-04-02 14:58:04', NULL, '2024-04-02 14:56:23', '11', 'yes', NULL),
(702, '20240325347', 23, 21, 23, 21, 'completed', 1, '2024-04-02 14:57:52', NULL, '2024-04-02 14:56:48', '11', 'yes', NULL),
(703, '20240401381', 23, 21, 23, 21, 'completed', 1, '2024-04-02 14:58:34', NULL, '2024-04-02 14:57:06', '11', 'yes', NULL),
(704, '20240327367', 23, 21, 23, 21, 'completed', 1, '2024-04-02 14:58:20', NULL, '2024-04-02 14:57:22', '11', 'yes', NULL),
(705, '20240402386', 23, 21, 23, 21, 'received', 1, '2024-04-02 16:33:31', 1, NULL, NULL, 'no', NULL),
(706, '20240402386', 23, 21, 8, 21, 'received', 1, '2024-04-11 08:26:26', NULL, '2024-04-02 16:34:00', NULL, 'no', NULL),
(707, '20240325340', 26, 21, 23, 21, 'received', 1, '2024-04-03 08:57:10', 1, '2024-04-03 08:41:23', NULL, 'no', 'already attended.\r\n*last week of april mag conduct ug Barangay monitoring for Nutrition Program preferably Barangay Mobod and Ciriaco Pastrano.'),
(708, '20240321326', 26, 21, 23, 21, 'torec', NULL, NULL, NULL, '2024-04-03 08:41:40', NULL, 'no', 'already attended.\r\n*last week of april mag conduct ug Barangay monitoring for Nutrition Program preferably Barangay Mobod and Ciriaco Pastrano.'),
(709, '20240325340', 23, 21, 23, 21, 'received', 1, '2024-04-11 09:39:33', NULL, '2024-04-03 08:57:31', NULL, 'yes', NULL),
(710, '20240401374', 12, 21, 23, 21, 'completed', 1, '2024-04-08 11:14:04', NULL, '2024-04-03 15:14:23', '11', 'yes', NULL),
(711, '20240301215', 12, 21, 23, 21, 'completed', 1, '2024-04-08 11:08:34', NULL, '2024-04-03 15:16:33', '11', 'yes', NULL),
(712, '20240321323', 12, 21, 23, 21, 'completed', 1, '2024-04-08 11:14:23', NULL, '2024-04-03 15:20:34', '11', 'yes', NULL),
(713, '20240319310', 12, 21, 23, 21, 'completed', 1, '2024-04-08 11:14:45', NULL, '2024-04-03 15:22:32', '11', 'yes', NULL),
(714, '20240403387', 23, 21, 23, 21, 'received', 1, '2024-04-03 16:39:23', 1, NULL, NULL, 'no', NULL),
(715, '20240403388', 23, 21, 23, 21, 'received', 1, '2024-04-03 16:43:42', 1, NULL, NULL, 'no', NULL),
(716, '20240403389', 23, 21, 23, 21, 'received', 1, '2024-04-03 16:54:00', 1, NULL, NULL, 'no', NULL),
(717, '20240403390', 23, 21, 23, 21, 'received', 1, '2024-04-03 17:00:06', 1, NULL, NULL, 'no', NULL),
(718, '20240403390', 23, 21, 8, 21, 'received', 1, '2024-04-04 19:39:17', 1, '2024-04-03 17:03:53', NULL, 'no', NULL),
(719, '20240403389', 23, 21, 8, 21, 'received', 1, '2024-04-04 20:11:51', 1, '2024-04-03 17:04:08', NULL, 'no', NULL),
(720, '20240403388', 23, 21, 8, 21, 'received', 1, '2024-04-04 19:44:51', NULL, '2024-04-03 17:04:21', NULL, 'no', NULL),
(721, '20240403387', 23, 21, 8, 21, 'received', 1, '2024-04-04 19:35:18', 1, '2024-04-03 17:04:33', NULL, 'no', NULL),
(722, '20240404391', 23, 21, 23, 21, 'received', 1, '2024-04-04 09:35:00', 1, NULL, NULL, 'no', NULL),
(723, '20240404392', 23, 21, 23, 21, 'received', 1, '2024-04-04 09:39:32', 1, NULL, NULL, 'no', NULL),
(724, '20240404393', 23, 21, 23, 21, 'received', 1, '2024-04-04 09:49:35', 1, NULL, NULL, 'no', NULL),
(725, '20240404394', 23, 21, 23, 21, 'received', 1, '2024-04-04 10:05:24', 1, NULL, NULL, 'no', NULL),
(726, '20240401375', 16, 21, 26, 21, 'torec', NULL, NULL, NULL, '2024-04-04 10:42:39', NULL, 'no', 'Already identified 3 beneficiaries for Jobstart. \r\n- Edeline Potutan and Elva May Baco \r\nFor identification of SPES and GIP beneficiaries'),
(727, '20240404395', 23, 21, 23, 21, 'received', 1, '2024-04-04 10:44:38', 1, NULL, NULL, 'no', NULL),
(728, '20240404396', 23, 21, 23, 21, 'received', 1, '2024-04-04 10:53:49', 1, NULL, NULL, 'no', NULL),
(729, '20240404396', 23, 21, 8, 21, 'received', 1, '2024-04-04 19:39:08', NULL, '2024-04-04 11:04:33', NULL, 'no', NULL),
(730, '20240404395', 23, 21, 8, 21, 'received', 1, '2024-04-04 19:39:54', NULL, '2024-04-04 11:04:45', NULL, 'no', NULL),
(731, '20240404394', 23, 21, 8, 21, 'received', 1, '2024-04-04 19:35:40', 1, '2024-04-04 11:04:59', NULL, 'no', NULL),
(732, '20240404393', 23, 21, 8, 21, 'received', 1, '2024-04-04 19:36:53', 1, '2024-04-04 11:05:11', NULL, 'no', NULL),
(733, '20240404392', 23, 21, 8, 21, 'received', 1, '2024-04-04 19:35:34', 1, '2024-04-04 11:05:27', NULL, 'no', NULL),
(734, '20240404391', 23, 21, 8, 21, 'received', 1, '2024-04-04 19:35:28', 1, '2024-04-04 11:05:40', NULL, 'no', NULL),
(735, '20240404397', 23, 21, 23, 21, 'received', 1, '2024-04-04 14:06:04', 1, NULL, NULL, 'no', NULL),
(736, '20240404397', 23, 21, 8, 21, 'received', 1, '2024-04-04 19:39:29', 1, '2024-04-04 14:09:34', NULL, 'no', NULL),
(737, '20240404398', 23, 21, 23, 21, 'received', 1, '2024-04-04 16:03:45', 1, NULL, NULL, 'no', NULL),
(738, '20240404398', 23, 21, 8, 21, 'received', 1, '2024-04-04 19:40:13', 1, '2024-04-04 16:06:56', NULL, 'no', NULL),
(739, '20240403387', 8, 21, 32, 21, 'received', 1, '2024-04-08 11:00:16', NULL, '2024-04-04 19:36:30', NULL, 'no', 'for consolidation'),
(740, '20240404393', 8, 21, 32, 21, 'received', 1, '2024-04-08 11:01:04', NULL, '2024-04-04 19:37:09', NULL, 'no', 'for consolidation'),
(741, '20240404391', 8, 21, 32, 21, 'received', 1, '2024-04-08 11:01:22', NULL, '2024-04-04 19:37:27', NULL, 'no', 'for consolidation'),
(742, '20240404394', 8, 21, 32, 21, 'received', 1, '2024-04-08 11:01:51', NULL, '2024-04-04 19:38:23', NULL, 'no', 'for consolidation'),
(743, '20240404392', 8, 21, 32, 21, 'received', 1, '2024-04-08 11:02:32', NULL, '2024-04-04 19:38:47', NULL, 'no', 'for consolidation, priority in the interview'),
(744, '20240404398', 8, 21, 23, 21, 'received', 1, '2024-04-11 09:35:35', NULL, '2024-04-04 19:57:55', NULL, 'no', 'for processing of TO then file'),
(745, '20240403390', 8, 21, 21, 21, 'received', 1, '2024-04-08 08:40:56', 1, '2024-04-04 19:58:58', NULL, 'no', 'please attend in my behalf'),
(746, '20240404397', 8, 21, 26, 21, 'torec', NULL, NULL, NULL, '2024-04-04 20:00:10', NULL, 'no', 'please attend together with ibasan and abuhon. please confirm attendance - vismin cluster'),
(747, '20240403389', 8, 21, 26, 21, 'torec', NULL, NULL, NULL, '2024-04-04 20:12:36', NULL, 'no', 'request is approved and please take appropriate action'),
(749, '20240405399', 13, 21, 13, 21, 'received', 1, '2024-04-05 15:30:53', NULL, NULL, NULL, 'no', NULL),
(750, '20240405400', 23, 21, 23, 21, 'received', 1, '2024-04-05 15:43:57', 1, NULL, NULL, 'no', NULL),
(751, '20240405401', 23, 21, 23, 21, 'received', 1, '2024-04-05 15:51:31', 1, NULL, NULL, 'no', NULL),
(752, '20240405402', 23, 21, 23, 21, 'received', 1, '2024-04-05 16:01:30', 1, NULL, NULL, 'no', NULL),
(753, '20240405403', 23, 21, 23, 21, 'received', 1, '2024-04-05 16:05:36', 1, NULL, NULL, 'no', NULL),
(754, '20240405404', 23, 21, 23, 21, 'received', 1, '2024-04-05 16:10:53', 1, NULL, NULL, 'no', NULL),
(755, '20240405405', 23, 21, 23, 21, 'received', 1, '2024-04-05 16:15:01', 1, NULL, NULL, 'no', NULL),
(756, '20240405406', 23, 21, 23, 21, 'received', 1, '2024-04-05 16:20:20', 1, NULL, NULL, 'no', NULL),
(757, '20240405407', 23, 21, 23, 21, 'received', 1, '2024-04-05 16:22:39', 1, NULL, NULL, 'no', NULL),
(758, '20240405408', 23, 21, 23, 21, 'received', 1, '2024-04-05 16:35:14', 1, NULL, NULL, 'no', NULL),
(759, '20240405409', 23, 21, 23, 21, 'received', 1, '2024-04-05 16:39:02', 1, NULL, NULL, 'no', NULL),
(760, '20240405409', 23, 21, 8, 21, 'received', 1, '2024-04-06 23:27:06', 1, '2024-04-05 16:54:25', NULL, 'no', NULL),
(761, '20240405408', 23, 21, 8, 21, 'received', 1, '2024-04-06 23:21:35', NULL, '2024-04-05 16:54:46', NULL, 'no', NULL),
(762, '20240405407', 23, 21, 8, 21, 'received', 1, '2024-04-06 23:26:59', 1, '2024-04-05 16:55:01', NULL, 'no', NULL),
(763, '20240405406', 23, 21, 8, 21, 'received', 1, '2024-04-06 23:25:08', 1, '2024-04-05 16:55:13', NULL, 'no', NULL),
(764, '20240405410', 23, 21, 23, 21, 'received', 1, '2024-04-05 17:00:38', 1, NULL, NULL, 'no', NULL),
(765, '20240405410', 23, 21, 8, 21, 'received', 1, '2024-04-06 23:27:29', 1, '2024-04-05 17:01:15', NULL, 'no', NULL),
(766, '20240405405', 23, 21, 8, 21, 'received', 1, '2024-04-06 23:27:20', 1, '2024-04-05 17:01:26', NULL, 'no', NULL),
(767, '20240405404', 23, 21, 8, 21, 'received', 1, '2024-04-06 23:21:27', 1, '2024-04-05 17:01:36', NULL, 'no', NULL),
(768, '20240405403', 23, 21, 8, 21, 'received', 1, '2024-04-06 23:27:14', 1, '2024-04-05 17:01:46', NULL, 'no', NULL),
(769, '20240405402', 23, 21, 8, 21, 'received', 1, '2024-04-06 23:21:43', 1, '2024-04-05 17:01:56', NULL, 'no', NULL),
(770, '20240405401', 23, 21, 8, 21, 'received', 1, '2024-04-06 23:25:17', NULL, '2024-04-05 17:02:06', NULL, 'no', NULL),
(771, '20240405400', 23, 21, 8, 21, 'received', 1, '2024-04-06 23:26:51', 1, '2024-04-05 17:02:15', NULL, 'no', NULL),
(772, '20240405404', 8, 21, 32, 21, 'received', 1, '2024-04-08 10:56:36', NULL, '2024-04-07 15:00:34', NULL, 'no', 'for consolidation'),
(773, '20240405402', 8, 21, 12, 21, 'torec', NULL, NULL, NULL, '2024-04-07 15:01:20', NULL, 'no', 'for possible attendance if doable'),
(774, '20240405406', 8, 21, 32, 21, 'received', 1, '2024-04-08 10:57:08', NULL, '2024-04-07 15:01:48', NULL, 'no', 'for consolidation'),
(775, '20240405400', 8, 21, 32, 21, 'received', 1, '2024-04-08 10:57:34', NULL, '2024-04-07 15:02:02', NULL, 'no', 'for consolidation'),
(776, '20240405407', 8, 21, 32, 21, 'received', 1, '2024-04-08 10:58:54', NULL, '2024-04-07 15:02:16', NULL, 'no', 'for consolidation'),
(777, '20240405409', 8, 21, 26, 21, 'torec', NULL, NULL, NULL, '2024-04-07 15:03:57', NULL, 'no', 'request is approved\r\n\r\nMasayon - to coordinate with the students\r\nManabo - in-charge with the request / things to be done\r\nLiberto - for file'),
(778, '20240405403', 8, 21, 32, 21, 'received', 1, '2024-04-08 10:59:03', NULL, '2024-04-07 15:04:17', NULL, 'no', 'for consolidation'),
(779, '20240405405', 8, 21, 32, 21, 'received', 1, '2024-04-08 10:58:20', NULL, '2024-04-07 15:04:36', NULL, 'no', 'for consolidation'),
(780, '20240405410', 8, 21, 20, 21, 'torec', NULL, NULL, NULL, '2024-04-07 15:06:58', NULL, 'no', 'CSO Desk - for initial assessment / evaluation'),
(781, '20240326364', 8, 21, 23, 21, 'received', 1, '2024-04-11 09:35:35', NULL, '2024-04-07 15:43:38', NULL, 'no', 'for transmittal to PGMO of indorsement to prepared by W. Jumawan and then for file'),
(782, '20240326362', 8, 21, 23, 21, 'torec', NULL, NULL, NULL, '2024-04-07 15:44:47', NULL, 'no', 'for transmittal to PGMO of indorsement to prepared by W. Jumawan and then for file'),
(783, '20240314291', 8, 21, 23, 21, 'torec', NULL, NULL, NULL, '2024-04-07 15:51:04', NULL, 'no', 'for file'),
(784, '20240305234', 19, 21, 23, 21, 'received', 1, '2024-04-08 11:50:45', 1, '2024-04-08 08:26:29', NULL, 'no', 'Already accomplished.\r\nConducted already ug encoded na pod sa watch list ang mga in active.\r\nFor file.'),
(785, '20240304216', 14, 21, 26, 21, 'torec', NULL, NULL, NULL, '2024-04-08 08:49:55', NULL, 'no', 'Accomplished'),
(786, '20240408411', 14, 21, 14, 21, 'received', 1, '2024-04-08 09:14:32', 1, NULL, NULL, 'no', NULL),
(787, '20240408411', 14, 21, 8, 21, 'received', 1, '2024-04-11 08:26:26', NULL, '2024-04-08 09:24:36', NULL, 'no', 'Please check this supported documents sa gi email nko sa Inspection Result 2023. Thank you :)\r\n\r\n\r\n*Best in Job Vacancy Submission \r\n*Best in Job Placement \r\n*Best in Job Placement Report Submission \r\n*Robinson Supermarket Folder About Compliance \r\n*Freemont Foods Corporation Jollibee Oroquieta - Segregated Hired Workers from Freemont to Jolly Management Solutions.'),
(788, '20240408412', 23, 21, 23, 21, 'received', 1, '2024-04-08 09:30:31', 1, NULL, NULL, 'no', NULL),
(789, '20240311278', 28, 21, 23, 21, 'received', 1, '2024-04-08 11:50:11', 1, '2024-04-08 10:03:48', NULL, 'no', 'Accomplished - For File'),
(790, '20240402382', 21, 21, 23, 21, 'received', 1, '2024-04-08 12:02:15', NULL, '2024-04-08 10:08:17', NULL, 'no', 'Attended last April 3, 2024.\r\nAlready forwarded to Kuya Jhong for file.'),
(791, '20240408413', 23, 21, 23, 21, 'received', 1, '2024-04-08 10:39:20', 1, NULL, NULL, 'no', NULL),
(792, '20240227182', 27, 21, 23, 21, 'received', 1, '2024-04-08 11:53:12', 1, '2024-04-08 10:39:44', NULL, 'no', 'Done Attented SPES Meeting'),
(793, '20240403390', 21, 21, 23, 21, 'received', 1, '2024-04-08 11:01:17', 1, '2024-04-08 10:56:51', NULL, 'no', 'Attended the General Assembly of KBGAN Marketing Cooperative last April 7, 2024.\r\nForwarded to Kuya Jhong for file.'),
(794, '20240408413', 23, 21, 8, 21, 'received', 1, '2024-04-11 08:26:50', NULL, '2024-04-08 10:57:39', NULL, 'no', NULL),
(795, '20240408412', 23, 21, 8, 21, 'received', 1, '2024-04-11 08:26:50', NULL, '2024-04-08 10:57:51', NULL, 'no', NULL),
(796, '20240403390', 23, 21, 23, 21, 'completed', 1, '2024-04-08 11:02:12', NULL, '2024-04-08 11:01:47', '11', 'yes', NULL),
(797, '20240408414', 23, 21, 23, 21, 'received', 1, '2024-04-08 11:49:13', 1, NULL, NULL, 'no', NULL),
(798, '20240305234', 23, 21, 23, 21, 'completed', 1, '2024-04-08 11:52:24', NULL, '2024-04-08 11:51:39', '11', 'yes', NULL),
(799, '20240227182', 23, 21, 23, 21, 'completed', 1, '2024-04-08 11:56:46', NULL, '2024-04-08 11:55:16', '11', 'yes', NULL),
(800, '20240311278', 23, 21, 23, 21, 'completed', 1, '2024-04-08 11:57:04', NULL, '2024-04-08 11:55:42', '11', 'yes', NULL),
(801, '20240322337', 33, 21, 8, 21, 'received', 1, '2024-04-11 08:29:05', NULL, '2024-04-08 14:30:06', NULL, 'no', 'Consolidated'),
(802, '20240322338', 33, 21, 8, 21, 'received', 1, '2024-04-11 08:29:05', NULL, '2024-04-08 14:30:30', NULL, 'no', 'Consolidated'),
(803, '20240321328', 33, 21, 8, 21, 'received', 1, '2024-04-11 08:29:44', NULL, '2024-04-08 14:30:53', NULL, 'no', 'Consolidated'),
(804, '20240321327', 33, 21, 8, 21, 'received', 1, '2024-04-11 08:29:44', NULL, '2024-04-08 14:31:09', NULL, 'no', 'Consolidated'),
(805, '20240314293', 33, 21, 8, 21, 'torec', NULL, NULL, NULL, '2024-04-08 14:31:34', NULL, 'no', 'Consolidated'),
(806, '20240314294', 33, 21, 8, 21, 'torec', NULL, NULL, NULL, '2024-04-08 14:32:11', NULL, 'no', 'Consolidated'),
(807, '20240313285', 33, 21, 8, 21, 'torec', NULL, NULL, NULL, '2024-04-08 14:33:25', NULL, 'no', 'Consolidated'),
(808, '20240313286', 33, 21, 8, 21, 'torec', NULL, NULL, NULL, '2024-04-08 14:33:58', NULL, 'no', 'Consolidated'),
(809, '20240319312', 33, 21, 8, 21, 'torec', NULL, NULL, NULL, '2024-04-08 14:34:35', NULL, 'no', 'Consolidated'),
(810, '20240319319', 33, 21, 8, 21, 'received', 1, '2024-04-11 08:35:34', NULL, '2024-04-08 14:34:49', NULL, 'no', 'Consolidated'),
(811, '20240319318', 33, 21, 8, 21, 'received', 1, '2024-04-11 08:35:34', NULL, '2024-04-08 14:39:59', NULL, 'no', 'Consolidated'),
(812, '20240319313', 33, 21, 8, 21, 'received', 1, '2024-04-11 08:35:34', NULL, '2024-04-08 14:41:44', NULL, 'no', 'Consolidated'),
(813, '20240311275', 33, 21, 8, 21, 'torec', NULL, NULL, NULL, '2024-04-08 14:42:28', NULL, 'no', 'Consolidated'),
(814, '20240311273', 33, 21, 8, 21, 'torec', NULL, NULL, NULL, '2024-04-08 14:42:51', NULL, 'no', 'Consolidated'),
(816, '20240311274', 33, 21, 8, 21, 'torec', NULL, NULL, NULL, '2024-04-08 14:51:06', NULL, 'no', 'consolidated'),
(818, '20240311272', 33, 21, 8, 21, 'torec', NULL, NULL, NULL, '2024-04-08 14:52:46', NULL, 'no', 'consolidated'),
(820, '20240408418', 8, 21, 8, 21, 'received', 1, '2024-04-08 15:01:15', NULL, NULL, NULL, 'no', NULL),
(825, '20240408414', 23, 21, 23, 21, 'completed', 1, '2024-04-11 09:40:26', NULL, '2024-04-11 09:40:18', '11', 'yes', 'asdasd');

-- --------------------------------------------------------

--
-- Table structure for table `logged_in_history`
--

CREATE TABLE `logged_in_history` (
  `logged_in_history_id` int(11) NOT NULL,
  `web_type` set('dts','wl') NOT NULL,
  `user_id` int(11) NOT NULL,
  `logged_in_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `logged_in_history`
--

INSERT INTO `logged_in_history` (`logged_in_history_id`, `web_type`, `user_id`, `logged_in_date`) VALUES
(1, 'dts', 8, '2024-03-18 00:28:23'),
(2, 'dts', 9, '2024-03-18 00:37:03'),
(3, 'dts', 8, '2024-03-18 00:37:25'),
(4, 'dts', 8, '2024-03-18 00:47:14'),
(5, 'dts', 13, '2024-03-18 08:46:51'),
(6, 'dts', 13, '2024-03-18 09:21:57'),
(7, 'dts', 13, '2024-03-18 13:23:15'),
(8, 'dts', 13, '2024-03-18 17:07:17'),
(9, 'dts', 21, '2024-03-18 17:18:34'),
(10, 'dts', 8, '2024-03-18 19:29:22'),
(11, 'dts', 23, '2024-03-19 08:31:21'),
(12, 'dts', 13, '2024-03-19 08:49:29'),
(13, 'dts', 23, '2024-03-19 09:55:06'),
(14, 'dts', 8, '2024-03-19 10:59:00'),
(15, 'dts', 21, '2024-03-19 11:20:24'),
(16, 'dts', 8, '2024-03-19 14:19:46'),
(17, 'dts', 23, '2024-03-19 14:20:02'),
(18, 'dts', 8, '2024-03-19 15:23:24'),
(19, 'dts', 8, '2024-03-19 15:51:31'),
(20, 'dts', 8, '2024-03-19 16:31:01'),
(21, 'dts', 24, '2024-03-19 17:05:42'),
(22, 'dts', 8, '2024-03-19 22:08:56'),
(23, 'dts', 33, '2024-03-20 09:01:21'),
(24, 'dts', 8, '2024-03-20 09:27:16'),
(25, 'dts', 9, '2024-03-20 09:27:47'),
(26, 'dts', 8, '2024-03-20 16:26:37'),
(27, 'dts', 8, '2024-03-20 16:29:56'),
(28, 'dts', 23, '2024-03-20 16:58:52'),
(29, 'dts', 8, '2024-03-20 19:20:23'),
(30, 'dts', 23, '2024-03-21 08:23:52'),
(31, 'dts', 33, '2024-03-21 08:55:13'),
(32, 'dts', 16, '2024-03-21 09:07:17'),
(33, 'dts', 13, '2024-03-21 10:11:22'),
(34, 'dts', 8, '2024-03-21 13:00:04'),
(35, 'dts', 8, '2024-03-21 13:47:42'),
(36, 'dts', 23, '2024-03-21 13:48:02'),
(37, 'dts', 16, '2024-03-21 14:04:44'),
(38, 'dts', 21, '2024-03-21 15:00:29'),
(39, 'dts', 8, '2024-03-21 15:04:06'),
(40, 'dts', 12, '2024-03-21 16:38:12'),
(41, 'dts', 8, '2024-03-21 16:43:14'),
(42, 'dts', 23, '2024-03-21 16:44:37'),
(43, 'dts', 8, '2024-03-21 23:21:24'),
(44, 'dts', 13, '2024-03-22 08:25:51'),
(45, 'dts', 8, '2024-03-22 08:26:52'),
(46, 'dts', 13, '2024-03-22 08:33:00'),
(47, 'dts', 33, '2024-03-22 08:35:36'),
(48, 'dts', 8, '2024-03-22 08:36:56'),
(49, 'dts', 8, '2024-03-22 08:42:18'),
(50, 'dts', 8, '2024-03-22 08:42:27'),
(51, 'dts', 23, '2024-03-22 09:17:05'),
(52, 'dts', 8, '2024-03-22 09:56:21'),
(53, 'dts', 23, '2024-03-22 09:56:44'),
(54, 'dts', 8, '2024-03-22 11:24:58'),
(55, 'dts', 23, '2024-03-22 11:29:08'),
(56, 'dts', 23, '2024-03-22 13:33:13'),
(57, 'dts', 8, '2024-03-22 13:57:19'),
(58, 'dts', 13, '2024-03-22 14:19:08'),
(59, 'dts', 8, '2024-03-22 14:23:28'),
(60, 'dts', 8, '2024-03-22 14:33:02'),
(61, 'dts', 9, '2024-03-22 15:25:07'),
(62, 'dts', 16, '2024-03-22 15:25:15'),
(63, 'dts', 8, '2024-03-22 23:12:26'),
(64, 'dts', 32, '2024-03-22 23:16:54'),
(65, 'dts', 8, '2024-03-22 23:18:24'),
(66, 'dts', 8, '2024-03-22 23:44:51'),
(67, 'dts', 32, '2024-03-22 23:47:32'),
(68, 'dts', 8, '2024-03-22 23:48:50'),
(69, 'dts', 32, '2024-03-22 23:49:25'),
(70, 'dts', 8, '2024-03-22 23:51:03'),
(71, 'dts', 8, '2024-03-23 00:19:59'),
(72, 'dts', 8, '2024-03-23 10:40:37'),
(73, 'dts', 8, '2024-03-23 14:31:24'),
(74, 'dts', 8, '2024-03-24 14:23:32'),
(75, 'dts', 8, '2024-03-24 22:43:14'),
(76, 'dts', 8, '2024-03-24 23:19:53'),
(77, 'dts', 23, '2024-03-25 08:13:52'),
(78, 'dts', 8, '2024-03-25 08:58:15'),
(79, 'dts', 12, '2024-03-25 11:19:14'),
(80, 'dts', 8, '2024-03-25 13:42:41'),
(81, 'dts', 23, '2024-03-25 14:25:02'),
(82, 'dts', 33, '2024-03-25 15:23:10'),
(83, 'dts', 8, '2024-03-25 15:31:19'),
(84, 'dts', 8, '2024-03-25 15:58:22'),
(85, 'dts', 26, '2024-03-25 16:45:27'),
(86, 'dts', 13, '2024-03-26 09:14:23'),
(87, 'dts', 23, '2024-03-26 09:55:06'),
(88, 'dts', 8, '2024-03-26 11:26:58'),
(89, 'dts', 13, '2024-03-26 11:33:50'),
(90, 'dts', 23, '2024-03-26 14:20:55'),
(91, 'dts', 16, '2024-03-26 15:21:33'),
(92, 'dts', 8, '2024-03-26 16:57:42'),
(93, 'dts', 8, '2024-03-26 21:38:51'),
(94, 'dts', 8, '2024-03-27 00:19:37'),
(95, 'dts', 23, '2024-03-27 08:03:39'),
(96, 'dts', 8, '2024-03-27 09:39:49'),
(97, 'dts', 24, '2024-03-27 11:03:33'),
(98, 'dts', 8, '2024-03-27 11:25:22'),
(99, 'dts', 8, '2024-03-27 11:38:13'),
(100, 'dts', 23, '2024-04-01 08:00:43'),
(101, 'dts', 13, '2024-04-01 08:45:39'),
(102, 'dts', 23, '2024-04-01 08:48:11'),
(103, 'dts', 8, '2024-04-01 09:49:09'),
(104, 'dts', 24, '2024-04-01 11:09:58'),
(105, 'dts', 8, '2024-04-01 11:23:06'),
(106, 'dts', 8, '2024-04-01 13:56:04'),
(107, 'dts', 8, '2024-04-01 14:04:10'),
(108, 'dts', 26, '2024-04-01 16:05:32'),
(109, 'dts', 8, '2024-04-01 21:50:26'),
(110, 'dts', 8, '2024-04-02 07:48:30'),
(111, 'dts', 23, '2024-04-02 09:22:19'),
(112, 'dts', 24, '2024-04-02 09:58:08'),
(113, 'dts', 16, '2024-04-02 11:54:05'),
(114, 'dts', 8, '2024-04-02 12:07:39'),
(115, 'dts', 8, '2024-04-02 12:14:35'),
(116, 'dts', 23, '2024-04-02 13:30:14'),
(117, 'dts', 8, '2024-04-02 14:52:35'),
(118, 'dts', 33, '2024-04-02 15:48:20'),
(119, 'dts', 8, '2024-04-02 17:00:43'),
(120, 'dts', 8, '2024-04-02 17:06:40'),
(121, 'dts', 23, '2024-04-02 17:09:22'),
(122, 'dts', 8, '2024-04-02 17:12:19'),
(123, 'dts', 8, '2024-04-02 21:57:11'),
(124, 'dts', 26, '2024-04-03 08:36:23'),
(125, 'dts', 23, '2024-04-03 08:46:51'),
(126, 'dts', 23, '2024-04-03 08:50:53'),
(127, 'dts', 23, '2024-04-03 11:09:04'),
(128, 'dts', 8, '2024-04-03 11:36:22'),
(129, 'dts', 8, '2024-04-03 13:18:55'),
(130, 'dts', 23, '2024-04-03 13:19:45'),
(131, 'dts', 12, '2024-04-03 15:06:13'),
(132, 'dts', 23, '2024-04-03 16:30:19'),
(133, 'dts', 8, '2024-04-03 16:34:32'),
(134, 'dts', 8, '2024-04-03 18:48:38'),
(135, 'dts', 23, '2024-04-04 08:32:38'),
(136, 'dts', 33, '2024-04-04 09:05:57'),
(137, 'dts', 8, '2024-04-04 10:03:22'),
(138, 'dts', 16, '2024-04-04 10:39:54'),
(139, 'dts', 8, '2024-04-04 11:31:28'),
(140, 'dts', 23, '2024-04-04 13:52:18'),
(141, 'dts', 8, '2024-04-04 17:09:04'),
(142, 'dts', 8, '2024-04-04 19:34:00'),
(143, 'dts', 8, '2024-04-05 09:03:29'),
(144, 'dts', 8, '2024-04-05 09:54:39'),
(145, 'dts', 23, '2024-04-05 14:39:20'),
(146, 'dts', 16, '2024-04-05 14:46:01'),
(147, 'dts', 8, '2024-04-05 15:18:07'),
(148, 'dts', 13, '2024-04-05 15:25:36'),
(149, 'dts', 8, '2024-04-05 21:46:09'),
(150, 'dts', 8, '2024-04-06 13:41:52'),
(151, 'dts', 8, '2024-04-06 23:17:47'),
(152, 'dts', 8, '2024-04-07 11:21:41'),
(153, 'dts', 8, '2024-04-07 14:59:57'),
(154, 'dts', 12, '2024-04-08 08:18:07'),
(155, 'dts', 24, '2024-04-08 08:18:26'),
(156, 'dts', 27, '2024-04-08 08:19:57'),
(157, 'dts', 19, '2024-04-08 08:25:09'),
(158, 'dts', 8, '2024-04-08 08:28:20'),
(159, 'dts', 8, '2024-04-08 08:30:55'),
(160, 'dts', 8, '2024-04-08 08:31:59'),
(161, 'dts', 23, '2024-04-08 08:33:39'),
(162, 'dts', 23, '2024-04-08 08:34:04'),
(163, 'dts', 28, '2024-04-08 08:38:22'),
(164, 'dts', 21, '2024-04-08 08:39:07'),
(165, 'dts', 8, '2024-04-08 08:46:05'),
(166, 'dts', 9, '2024-04-08 08:46:20'),
(167, 'dts', 14, '2024-04-08 08:47:42'),
(168, 'dts', 14, '2024-04-08 08:48:47'),
(169, 'dts', 8, '2024-04-08 08:50:41'),
(170, 'dts', 14, '2024-04-08 08:52:47'),
(171, 'dts', 8, '2024-04-08 08:54:45'),
(172, 'dts', 14, '2024-04-08 09:02:51'),
(173, 'dts', 19, '2024-04-08 09:02:55'),
(174, 'dts', 8, '2024-04-08 09:06:03'),
(175, 'dts', 14, '2024-04-08 09:09:55'),
(176, 'dts', 8, '2024-04-08 09:27:40'),
(177, 'dts', 27, '2024-04-08 10:06:35'),
(178, 'dts', 9, '2024-04-08 10:13:37'),
(179, 'dts', 12, '2024-04-08 10:28:55'),
(180, 'dts', 32, '2024-04-08 10:45:26'),
(181, 'dts', 8, '2024-04-08 11:49:13'),
(182, 'dts', 33, '2024-04-08 14:06:41'),
(183, 'dts', 21, '2024-04-08 14:34:56'),
(184, 'dts', 21, '2024-04-08 14:37:04'),
(185, 'dts', 23, '2024-04-08 14:40:25'),
(186, 'dts', 8, '2024-04-11 08:25:49'),
(187, 'dts', 8, '2024-04-11 08:30:43'),
(188, 'dts', 8, '2024-04-11 08:53:02'),
(189, 'dts', 23, '2024-04-11 09:12:55');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(21, '2014_10_12_000000_create_users_table', 1),
(22, '2014_10_12_100000_create_password_resets_table', 1),
(23, '2019_08_19_000000_create_failed_jobs_table', 1),
(24, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(26, '2023_09_25_024528_records', 1),
(27, '2023_09_26_043954_create_people_table', 1),
(28, '2023_09_25_022622_person', 2);

-- --------------------------------------------------------

--
-- Table structure for table `offices`
--

CREATE TABLE `offices` (
  `office_id` int(11) NOT NULL,
  `office` varchar(100) NOT NULL,
  `created` datetime NOT NULL,
  `office_status` enum('inactive','active') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `offices`
--

INSERT INTO `offices` (`office_id`, `office`, `created`, `office_status`) VALUES
(21, 'OCM - CPESD', '2023-06-19 13:35:39', 'active'),
(70, 'OCM', '2024-03-01 22:49:10', 'active'),
(71, 'HRMO', '2024-03-01 22:49:27', 'active'),
(72, 'CBO', '2024-03-01 22:49:36', 'active'),
(73, 'CDRRMO', '2024-03-01 22:49:44', 'active'),
(74, 'Barangay', '2024-03-01 22:50:10', 'active'),
(75, 'CSO', '2024-03-01 22:50:18', 'active'),
(76, 'SP', '2024-03-01 22:50:25', 'active'),
(77, 'City Planning Office', '2024-03-01 22:50:36', 'active'),
(78, 'DILG', '2024-03-01 22:50:48', 'active'),
(79, 'DTI', '2024-03-01 22:50:55', 'active'),
(80, 'DOST', '2024-03-01 22:51:04', 'active'),
(81, 'DOLE', '2024-03-01 22:51:12', 'active'),
(82, 'TESDA', '2024-03-01 22:51:30', 'active'),
(83, 'SCC', '2024-03-01 22:51:48', 'active'),
(84, 'MOTI', '2024-03-01 22:51:57', 'active'),
(85, 'La Salle University', '2024-03-01 22:52:09', 'active'),
(86, 'OCPS', '2024-03-05 17:25:16', 'active');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `people`
--

CREATE TABLE `people` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `persons`
--

CREATE TABLE `persons` (
  `first_name` varchar(255) NOT NULL,
  `middle_name` varchar(255) DEFAULT NULL,
  `last_name` varchar(255) NOT NULL,
  `extension` varchar(255) DEFAULT NULL,
  `phone_number` varchar(255) DEFAULT NULL,
  `email_address` varchar(255) DEFAULT NULL,
  `address` varchar(255) NOT NULL,
  `age` int(50) DEFAULT NULL,
  `gender` set('male','female') DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `status` enum('active','inactive','not-approved') NOT NULL,
  `added_by` int(11) NOT NULL,
  `person_id` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `persons`
--

INSERT INTO `persons` (`first_name`, `middle_name`, `last_name`, `extension`, `phone_number`, `email_address`, `address`, `age`, `gender`, `created_at`, `status`, `added_by`, `person_id`) VALUES
('Dina', NULL, 'Tac-an', NULL, '09466231512', NULL, 'Villaflor', 29, 'female', '2024-03-22 09:06:17', 'active', 31, 168),
('Randy', NULL, 'Saligumba', NULL, '09093330262', NULL, 'Villaflor', 26, 'male', '2024-03-22 09:09:13', 'active', 31, 170),
('Kim', NULL, 'Roque', NULL, NULL, NULL, 'Villaflor', 49, 'male', '2024-03-22 09:11:12', 'active', 31, 171),
('Vilma', NULL, 'Tac-an', NULL, '09126874760', NULL, 'Villaflor', 47, 'female', '2024-03-22 09:13:01', 'not-approved', 31, 172),
('Mezel', NULL, 'Bastillada', NULL, NULL, NULL, 'Villaflor', 44, 'female', '2024-03-22 09:14:16', 'active', 31, 173),
('Almer', NULL, 'Mamac', NULL, '09309876838', NULL, 'Villaflor', 40, 'male', '2024-03-22 09:15:21', 'active', 31, 174),
('Jimmy', NULL, 'Gabutan', NULL, '09101051650', NULL, 'Villaflor', 49, 'male', '2024-03-22 09:36:13', 'active', 31, 175),
('Stella', NULL, 'Ighot', NULL, NULL, NULL, 'Binuangan', NULL, 'female', '2024-03-25 10:03:26', 'not-approved', 18, 176),
('Gina', NULL, 'Inting', NULL, NULL, NULL, 'Binuangan', NULL, 'female', '2024-03-26 08:46:00', 'not-approved', 18, 177),
('Yvonne', NULL, 'Rabuyo', NULL, NULL, NULL, 'Upper Rizal', NULL, 'female', '2024-03-26 08:51:22', 'not-approved', 18, 178),
('Romualda', NULL, 'Jamo', NULL, NULL, NULL, 'Burgos', NULL, 'female', '2024-03-26 08:56:24', 'not-approved', 18, 179),
('Carmen', NULL, 'Adaza', NULL, NULL, NULL, 'Poblacion 1', NULL, 'female', '2024-03-26 09:06:12', 'not-approved', 18, 180),
('Robie Jean', NULL, 'Banuelos', NULL, NULL, NULL, 'Canubay', NULL, 'female', '2024-03-26 09:11:15', 'not-approved', 18, 181),
('Angelica', NULL, 'Elarcosa', NULL, NULL, NULL, 'Canubay', NULL, 'female', '2024-03-26 09:19:35', 'not-approved', 18, 182),
('Judith', NULL, 'Broñola', NULL, NULL, NULL, 'Canubay', NULL, 'female', '2024-03-26 09:34:43', 'not-approved', 18, 183),
('Cheryl', NULL, 'Calvo', NULL, NULL, NULL, 'Poblacion 1', NULL, 'female', '2024-03-26 09:38:56', 'not-approved', 18, 184),
('Ronilyn', NULL, 'Damason', NULL, NULL, NULL, 'Toliyok', NULL, 'female', '2024-03-26 09:47:05', 'not-approved', 18, 185),
('Anabel', NULL, 'Raya', NULL, NULL, NULL, 'Toliyok', NULL, 'female', '2024-03-26 09:49:39', 'not-approved', 18, 186),
('Nilo', NULL, 'Sarial', NULL, NULL, NULL, 'Toliyok', NULL, 'male', '2024-03-26 09:51:42', 'not-approved', 18, 187),
('Redemson', NULL, 'Dullano', NULL, NULL, NULL, 'Talairon', NULL, 'male', '2024-03-26 09:58:41', 'not-approved', 18, 188),
('Rosalie', NULL, 'Rezada', NULL, NULL, NULL, 'Talairon', NULL, 'female', '2024-03-26 10:02:28', 'not-approved', 18, 189);

-- --------------------------------------------------------

--
-- Table structure for table `programs`
--

CREATE TABLE `programs` (
  `program_id` int(11) NOT NULL,
  `program` varchar(255) NOT NULL,
  `program_description` text DEFAULT NULL,
  `created` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `programs`
--

INSERT INTO `programs` (`program_id`, `program`, `program_description`, `created`) VALUES
(11, 'Jobstart Philippines', NULL, '2024-01-03 04:36:56'),
(12, 'Senior High Scholarship', NULL, '2024-01-03 04:37:34'),
(13, 'College Scholarship', NULL, '2024-01-03 04:38:16'),
(14, 'One Family One Professional', NULL, '2024-01-03 04:38:36'),
(16, 'Livelihood Assistance Grant (LAG)', 'Livelihood worth 15K provided to beneficiaries', '2024-03-23 14:27:13'),
(17, 'Delinquency of Livelihood Program', 'Non-payment of appropriate obligation either micro-finance, consumer store, etc', '2024-03-23 14:27:59'),
(18, 'TUPAD', NULL, '2024-03-23 14:28:13'),
(19, 'SPES/PSEP', NULL, '2024-03-23 14:28:27');

-- --------------------------------------------------------

--
-- Table structure for table `program_block`
--

CREATE TABLE `program_block` (
  `program_block_id` int(50) NOT NULL,
  `program_id` int(50) NOT NULL,
  `person_id` int(50) NOT NULL,
  `created` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `program_block`
--

INSERT INTO `program_block` (`program_block_id`, `program_id`, `person_id`, `created`) VALUES
(56, 16, 174, '2024-03-23 14:28:58');

-- --------------------------------------------------------

--
-- Table structure for table `records`
--

CREATE TABLE `records` (
  `record_id` int(255) NOT NULL,
  `p_id` int(255) NOT NULL,
  `record_description` text NOT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `records`
--

INSERT INTO `records` (`record_id`, `p_id`, `record_description`, `created_at`) VALUES
(1, 1, 'Jobstart Issue', '2023-06-19 13:35:39'),
(34, 1, 'tertret', '2023-06-19 13:35:39'),
(35, 1, 'dfdfgfdg', '2023-06-19 13:35:39'),
(75, 34, 'sasadsadsa asdsadsa', '2023-12-28 14:32:07'),
(84, 34, 'sadsadsa1', '2023-12-28 14:36:20'),
(86, 40, 'sadsad', '2023-12-28 14:40:09'),
(89, 40, 'wqdsadsa', '2023-12-28 14:40:53'),
(97, 162, 'sadsad', '2024-01-04 17:07:03'),
(98, 163, 'sadasdasdasd', '2024-01-06 05:48:51'),
(99, 151, 'sample', '2024-01-06 07:30:02'),
(104, 175, 'Inactive Livelihood Beneficiaries', '2024-03-22 10:56:07'),
(105, 174, 'Inactive Livelihood Beneficiaries / Failure LAG Project', '2024-03-22 10:56:31'),
(106, 173, 'Inactive Livelihood Beneficiaries', '2024-03-22 10:56:39'),
(107, 172, 'Inactive Livelihood Beneficiaries', '2024-03-22 10:56:50'),
(108, 171, 'Inactive Livelihood Beneficiaries', '2024-03-22 10:57:52'),
(109, 170, 'Inactive Livelihood Beneficiaries', '2024-03-22 10:58:05'),
(110, 168, 'Inactive Livelihood Beneficiaries', '2024-03-22 10:58:13'),
(113, 176, 'OP REFERRAL 2022 - FOOD VENDING INACTIVE(NAG ABROAD)', '2024-03-25 11:25:02'),
(114, 177, 'OP Referral 2022 - Hog Raising - INACTIVE\r\nclose because of ASF', '2024-03-26 08:47:52'),
(115, 178, 'AHON 2022 - Buy & Sell Dried Goods - INACTIVE\r\nreason: nagclose ky mahal na ang bugas', '2024-03-26 08:54:45'),
(116, 179, 'AHON 2022 - Hog Raising - INACTIVE\r\nreason: na apektuhan sa ASF', '2024-03-26 08:58:17'),
(117, 180, 'OP REFERRAL - Sari-sari Store - INACTIVE\r\nreason: nagclose ky nabahaan', '2024-03-26 09:08:47'),
(118, 181, 'OP REFERRAL - Squid Fish Vendor - INACTIVE\r\nreason: working outside in Philippines', '2024-03-26 09:13:58'),
(119, 182, 'OP REFERRAL - Hog Fattening - INACTIVE\r\nreason: affected ASF', '2024-03-26 09:21:51'),
(120, 183, 'OP REFERRAL 2022 - Sari-sari store - INACTIVE\r\nreason: nagamit ang kwarta', '2024-03-26 09:36:55'),
(121, 184, 'OP REFERRAL 2022- Food Snack & Refreshments- INACTIVE \r\nreason: nagclose ky na busy sa work', '2024-03-26 09:45:03'),
(122, 185, 'OP REFERRAL 2022 - Piggery - INACTIVE\r\nreason: affected ASF, nagamit ang kwarta', '2024-03-26 09:48:48'),
(123, 186, 'OP REFERRAL 2022 - Hog Fattening - INACTIVE\r\nreason: nagamit ang kwarta, nabahaan', '2024-03-26 09:50:52'),
(124, 187, 'AHON 2022 - Sari-sari store - INACTIVE\r\nreason: affected in shear line', '2024-03-26 09:56:23'),
(125, 188, 'AHON 2022 - Vegetable farming - INACTIVE\r\nreason: nagamit ang kwarta', '2024-03-26 10:01:10'),
(126, 189, 'AHON 2022 - Sari-sari store - INACTIVE\r\nreason: nagamit ang kwarta', '2024-03-26 10:28:06');

-- --------------------------------------------------------

--
-- Table structure for table `security`
--

CREATE TABLE `security` (
  `us_id` int(11) NOT NULL,
  `security_code` varchar(255) NOT NULL,
  `updated` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `security`
--

INSERT INTO `security` (`us_id`, `security_code`, `updated`) VALUES
(8, '$2y$10$CxUFLd0TZ4XowiJ1KfXwSuWU8SroMM7mWklYsqY/P0Vu27cTNf7m2', '2023-11-18 08:12:55');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(50) UNSIGNED NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `middle_name` varchar(50) DEFAULT NULL,
  `last_name` varchar(50) NOT NULL,
  `extension` varchar(10) DEFAULT NULL,
  `contact_number` varchar(15) NOT NULL,
  `address` varchar(150) NOT NULL,
  `email_address` varchar(100) NOT NULL,
  `profile_pic` varchar(50) DEFAULT NULL,
  `user_type` varchar(50) NOT NULL,
  `user_status` enum('active','inactive') NOT NULL DEFAULT 'active',
  `work_status` set('jo','regular') DEFAULT NULL,
  `username` varchar(150) NOT NULL,
  `password` varchar(200) NOT NULL,
  `off_id` int(255) NOT NULL,
  `is_receiver` set('no','yes') NOT NULL,
  `is_oic` set('no','yes') NOT NULL,
  `user_created` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `first_name`, `middle_name`, `last_name`, `extension`, `contact_number`, `address`, `email_address`, `profile_pic`, `user_type`, `user_status`, `work_status`, `username`, `password`, `off_id`, `is_receiver`, `is_oic`, `user_created`) VALUES
(8, 'Mark Anthony', NULL, 'Artigas', NULL, '0905788844', 'Binuangan', 'markeeboi1985@gmail.com', NULL, 'admin', 'active', NULL, 'markuser', '$2y$10$PzosSlglt.ovv.46i0i62OJAJPFo.XI8h6JJOmRb7UTDl2KJdaIy6', 21, 'no', 'yes', '2023-04-06 16:32:32'),
(9, 'Basil John', 'C.', 'Manabo', NULL, '0912321321', 'Tuyabang Bajo', 'manabobasil@gmail.com', NULL, 'user', 'active', NULL, 'basiluser', '$2y$10$bQ9ReGAErl1cFMBpl7gByO1moZQCDr4bCzZ6J7/ScAjaxUD45o/jy', 21, 'no', '', '2023-04-07 03:04:02'),
(12, 'Katlyn Mary', '', 'Daraman', '', '0963936232', 'Canubay', 'daraman.cp', NULL, 'user', 'active', 'jo', 'katlyn1388', '$2y$10$HU/SEKRHDbELpPI10DLnx.EjP2uh0akDblmg0o1vES9lHPRc47xkC', 21, 'no', '', '2023-05-05 05:00:46'),
(13, 'Judith', 'P.', 'Abuhon', '', '09107324580', 'Villaflor', 'abuhon.cpesdoroq@gmail.com', NULL, 'user', 'active', 'jo', 'ram_tom', '$2y$10$TE3O7GRzGKGl18SRaGV9s.u7BpPN.Fsv/YHAujQXEhROnnfAm1Xbm', 21, 'no', '', '2023-05-05 07:01:00'),
(14, 'Sheila Marie', '', 'Daque', '', '09516531821', 'Lower Loboc', 'daquesheilamarie@gmail.com', NULL, 'user', 'active', 'jo', 'Shelayla', '$2y$10$f/X/DdhAtpWijto0rIcIMOkLrk6rqxBNNUsTserNhqUw5szWZ82Fi', 21, 'no', '', '2023-05-05 07:23:18'),
(15, 'Cel', 'Betero', 'Chua', '', '0912789660', 'Talairon', 'chua.cpesd', NULL, 'user', 'active', 'jo', 'Choyerns', '$2y$10$LNjjAwAdQazQMF22UnUCde32RHVohPL3QPjpQ2tJMkH4xswinXPu6', 21, 'no', '', '2023-05-05 07:25:12'),
(16, 'WIENGELYN', 'MILO', 'IBASAN', '', '0912367928', 'Tipan', 'ibasan.cpesdoroq@gmail.com', NULL, 'user', 'active', 'jo', 'Wiengy ', '$2y$10$PzosSlglt.ovv.46i0i62OJAJPFo.XI8h6JJOmRb7UTDl2KJdaIy6', 21, 'no', '', '2023-05-05 07:27:14'),
(17, 'John Rick', 'Himpayan', 'Tac-an', '', '09618058910', 'Proper Langcangan', 'jrtacanambush@gmail.com', NULL, 'user', 'inactive', 'jo', 'John Rick', '$2y$10$gtbD6ggrpp8YD4CKOdUkj.PXYN4J2h21Z1hUONiAzi0MzwmsMRIuy', 21, 'no', '', '2023-05-05 07:46:38'),
(18, 'Celrose', 'O.', 'Español', '', '09465543788', 'Mobod', 'celrose14@gmail.com', NULL, 'user', 'active', 'jo', 'CELROSE', '$2y$10$LNjjAwAdQazQMF22UnUCde32RHVohPL3QPjpQ2tJMkH4xswinXPu6', 21, 'no', '', '2023-05-05 08:18:24'),
(19, 'Judy Mae', 'Taberao', 'Catane', '', '09462326054', 'Pines', 'catane.cpesdoroq@gmail.com', NULL, 'user', 'active', 'jo', 'judai09', '$2y$10$2j8deWGJKg6ftOrTRH43pudfIajE/BBn5n8mbZ2KWTzKK90gIcg1y', 21, 'no', '', '2023-05-09 14:24:42'),
(20, 'Dayanara Mae', 'Molina', 'Hipos', '', '09700746605', 'Villaflor', 'hipos.cpesdoroq@gmail.com', NULL, 'user', 'active', 'jo', 'Dayanara', '$2y$10$Mgt4XlqAHBBUSokzbp1pqeSAoyslqH//3y1TZYwL/i1oOcGo8ST7m', 21, 'no', '', '2023-05-09 14:30:58'),
(21, 'Marilou', 'Gumapac', 'Gultian', NULL, '09632873186', 'Binuangan', 'gumapac.cpesdoroq@gmail.com', NULL, 'user', 'active', 'regular', 'MIG101583', '$2y$10$J//1hfufEN6rX/J3CKZrr.SnXG661aFdU9gWUzHoeu/2WDhzb.Vke', 21, 'no', '', '2023-05-10 08:49:43'),
(22, 'Reymond', 'Manlod', 'Tacastacas', '', '09090821383', 'Taboc Sur', 'verzacheboitax@gmail.com', NULL, 'user', 'active', 'jo', 'boitacs', '$2y$10$3HcPLa8XnlvpYxLpn99Xj.ZLBT5SXnfd4kl3yS3vmaPdVrIK6H05S', 21, 'no', '', '2023-05-10 09:26:41'),
(23, 'Richard', 'Cariaga ', 'Liberto ', '', '09383926364', 'Canubay', 'richardliberto11@gmail.com', NULL, 'user', 'active', 'regular', 'Jhong ', '$2y$10$PzosSlglt.ovv.46i0i62OJAJPFo.XI8h6JJOmRb7UTDl2KJdaIy6', 21, 'yes', '', '2023-05-10 09:28:27'),
(24, 'Dennamor', 'Tangcay', 'Markinez', NULL, '09300334135', 'Lower Langcangan', 'markinez.cpesdoroq@gmail.com', NULL, 'user', 'active', 'jo', 'amoreezz', '$2y$10$lnfNauHJ/hTWRgEXSWw2g.RIGcsvIUwCqft74vSVpnUcUxJjVwY0K', 21, 'no', '', '2023-05-12 14:08:34'),
(25, 'SUNNY', 'IYOG', 'LUNA', '', '09516508095', 'Canubay', 'luna.cpesdoroq@gmail.com', NULL, 'user', 'inactive', 'jo', 'PAGONGLUNA', '$2y$10$LNjjAwAdQazQMF22UnUCde32RHVohPL3QPjpQ2tJMkH4xswinXPu6', 21, 'no', '', '2023-06-19 13:35:39'),
(26, 'Cristine Grace', 'Uba', 'Masayon', '', '09124318680', 'Upper Rizal', 'uba.cpesdoroq@gmail.com', NULL, 'user', 'active', 'regular', 'richlyzoe', '$2y$10$XTXpBMzO4Y8Cp3tVOML5lO3.Uy5ZjyVzsDbJr1l5K0FZHlMM0Km1G', 21, 'no', '', '2023-07-20 15:48:26'),
(27, 'King Francis', '', 'Cario', '', '09100000000', 'Lower Loboc', '123@gmail.com', NULL, 'user', 'active', 'jo', 'cario1234', '$2y$10$nLHER1Djvb14TgREHn3ureWhyoRw/RQO0uZjmPK.f4WE4QGpsMIka', 21, 'no', '', '2023-08-14 14:20:52'),
(28, 'Joseph', 'L.', 'Buta', '', '09079187139', 'Upper Lamac', 'butajoseph8@gmail.com', NULL, 'user', 'active', 'jo', 'joseph@27', '$2y$10$Y327MA3IWKS0rMmmKlz7rOYQW8trK6UepSjeQaNoorWtO/SbNoV0u', 21, 'no', '', '2023-09-15 11:29:52'),
(31, 'Larry', 'B', 'Borja', NULL, '09639226256', 'Layawan', 'larry.borjaa@gmail.com', NULL, 'user', 'active', NULL, 'Larx', '$2y$10$PGWpwpsxlyogfYyb/qsIiu.w9vUTp5rT7hSTDgWTCeCu7h.CAzXtq', 21, 'no', '', '2024-02-27 15:57:11'),
(32, 'Lea', NULL, 'Revil', NULL, '', 'poblacion 2', '', NULL, 'user', 'active', 'jo', 'learevil', '$2y$10$PzosSlglt.ovv.46i0i62OJAJPFo.XI8h6JJOmRb7UTDl2KJdaIy6', 21, 'no', '', '2024-02-28 00:00:00'),
(33, 'Dianne', 'Palanas', 'Bariso', NULL, '09816185546', 'Talic', 'barisodianne48@gmail.com', NULL, 'user', 'active', 'jo', 'dianne48', '$2y$10$0Wq6w4qOn8iq7VIX9T8RE.ZyWbdgUB1lMXAZ/zNogNdcsU7ViIv.W', 21, 'yes', '', '2024-02-29 00:00:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `action_logs`
--
ALTER TABLE `action_logs`
  ADD PRIMARY KEY (`action_id`);

--
-- Indexes for table `documents`
--
ALTER TABLE `documents`
  ADD PRIMARY KEY (`document_id`);

--
-- Indexes for table `document_types`
--
ALTER TABLE `document_types`
  ADD PRIMARY KEY (`type_id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `final_actions`
--
ALTER TABLE `final_actions`
  ADD PRIMARY KEY (`action_id`);

--
-- Indexes for table `history`
--
ALTER TABLE `history`
  ADD PRIMARY KEY (`history_id`);

--
-- Indexes for table `logged_in_history`
--
ALTER TABLE `logged_in_history`
  ADD PRIMARY KEY (`logged_in_history_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `offices`
--
ALTER TABLE `offices`
  ADD PRIMARY KEY (`office_id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `people`
--
ALTER TABLE `people`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `persons`
--
ALTER TABLE `persons`
  ADD PRIMARY KEY (`person_id`);

--
-- Indexes for table `programs`
--
ALTER TABLE `programs`
  ADD PRIMARY KEY (`program_id`);

--
-- Indexes for table `program_block`
--
ALTER TABLE `program_block`
  ADD PRIMARY KEY (`program_block_id`);

--
-- Indexes for table `records`
--
ALTER TABLE `records`
  ADD PRIMARY KEY (`record_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `action_logs`
--
ALTER TABLE `action_logs`
  MODIFY `action_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `documents`
--
ALTER TABLE `documents`
  MODIFY `document_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=270;

--
-- AUTO_INCREMENT for table `document_types`
--
ALTER TABLE `document_types`
  MODIFY `type_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=71;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `final_actions`
--
ALTER TABLE `final_actions`
  MODIFY `action_id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `history`
--
ALTER TABLE `history`
  MODIFY `history_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=826;

--
-- AUTO_INCREMENT for table `logged_in_history`
--
ALTER TABLE `logged_in_history`
  MODIFY `logged_in_history_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=190;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `offices`
--
ALTER TABLE `offices`
  MODIFY `office_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=87;

--
-- AUTO_INCREMENT for table `people`
--
ALTER TABLE `people`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `persons`
--
ALTER TABLE `persons`
  MODIFY `person_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=190;

--
-- AUTO_INCREMENT for table `programs`
--
ALTER TABLE `programs`
  MODIFY `program_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `program_block`
--
ALTER TABLE `program_block`
  MODIFY `program_block_id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- AUTO_INCREMENT for table `records`
--
ALTER TABLE `records`
  MODIFY `record_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=127;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(50) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
