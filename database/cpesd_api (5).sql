-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 13, 2024 at 05:06 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cpesd_api`
--

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
  `doc_type` int(11) NOT NULL,
  `document_description` text DEFAULT NULL,
  `doc_status` set('pending','completed','cancelled') NOT NULL,
  `destination_type` set('simple','complex') NOT NULL,
  `note` text DEFAULT NULL,
  `created` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `documents`
--

INSERT INTO `documents` (`document_id`, `tracking_number`, `document_name`, `u_id`, `offi_id`, `doc_type`, `document_description`, `doc_status`, `destination_type`, `note`, `created`) VALUES
(20, '20240227181', 'Letter /North western Mindanao State College of Science and Technology/Tangub City', 23, 21, 48, 'Conducting Academic Research Street Vendors Strategies Towards Competitive Advantage.', 'completed', 'complex', '', '2024-02-27 10:04:22'),
(21, '20240227182', 'Letter', 23, 21, 48, '/Requesting your PESO Manager/SPES designated focal person to attend our SPES implementer\'s Orientation and planning Activity  on March 6,2024 wednesday ,at 8;00 am 5;00  to be held at Hugrilla Diners ,Oroquieta City ,Mis.Occ.', 'pending', 'complex', '', '2024-02-27 10:10:31'),
(22, '20240227183', 'Letter', 23, 21, 48, 'Applying OFOP-Program \\Earl Josua P. Alimpio', 'pending', 'complex', '', '2024-02-27 10:15:04'),
(23, '20240227184', 'Dole approved allocation', 23, 21, 48, 'Employers  pledge Commitment', 'completed', 'complex', '', '2024-02-27 10:19:44'),
(24, '20240227185', 'Letter/ MIS.OCC.TECH.INSTITUTE', 23, 21, 48, 'PROFILE form of the applicants/TESDA-TULONG TRABAHO SCHOLARSHIP PROG.[TTSP]', 'completed', 'complex', '', '2024-02-27 10:24:54'),
(25, '20240227186', 'ENDORSEMENT LETTER/  [SIAKEAN\'S INTEGRATED FARM (SIF)', 23, 21, 48, 'DA-ATI RFO X  -PROGRAM with TESDA for the PRODUCE ORGANIC VEGETABLES[leading to organic agriculture  NC II With 15 scholars and produce organic fertilizers (Leading to organic agriculture NC II )WITH 20 Scholars.', 'pending', 'complex', '', '2024-02-27 10:31:02'),
(26, '20240227187', 'RESOLUTION NO. 03 series -2023', 23, 21, 48, 'APPROVING THE COMPREHENSIVE BRGY.YOUTH DEVELOPMENT PLAN [CBYDP] POB.I', 'pending', 'complex', '', '2024-02-27 10:34:38'),
(27, '20240227188', 'RESOLUTION NO.04 series-2023', 23, 21, 48, 'approving annual Brgy.youth investment Program  SK,Pob ;I', 'pending', 'complex', '', '2024-02-27 10:37:38'),
(28, '20240227189', 'Notice of Special Meeting (OCEMCO)', 23, 21, 49, 'OCEMCO Board of Directors will meet for Special Meeting  on thursday. february 29,2024 @1;00 pm ,Restobar,lower langcangan Oroq.City.', 'completed', 'complex', '', '2024-02-27 15:44:49'),
(29, '20240227190', 'Starter kits applicantsLi/Barangay Tipan', 23, 21, 49, 'List of indorse beneficiary.', 'cancelled', 'complex', '', '2024-02-27 16:41:24'),
(30, '20240228191', 'List of applying starter kits (Brgy. Tipan)', 23, 21, 49, 'List of indorse Beneficiary (Brgy.Tipan)', 'pending', 'complex', '', '2024-02-28 11:25:26'),
(31, '20240228192', 'Letter', 23, 21, 48, 'applying for one Family one Professional ScholarshipPogram/Noralyn U.Codilla-2nd year College.UNIVERSITY OF SCIENCE AND TECHNOLGY OF SOUTHERN PHILIPPINES.', 'pending', 'complex', '', '2024-02-28 13:09:14'),
(32, '20240228193', 'Letter', 23, 21, 48, 'APPLYING  ONE FAMILY ONE PROFESIONAL SCHOLARSHIP PROGRAM JONAH B. DAGOHOY-2ND year College ,University of Science  Technology', 'pending', 'complex', '', '2024-02-28 13:16:12'),
(33, '20240228194', 'Letter', 23, 21, 48, 'Applying One Family One Professional Scholarship Program /Gerome T. Bedolido /3rd year Maritime.', 'pending', 'complex', '', '2024-02-28 13:26:32'),
(34, '20240228195', 'Letter', 23, 21, 48, 'Applying One Famliy One Professional Sholarship Program/Marilou B.Tubay -University of Science and Technology of Southern Phillipines', 'pending', 'complex', '', '2024-02-28 13:33:45'),
(35, '20240228196', 'Letter', 23, 21, 48, 'Applying One Family One Professional Scholarship Program./Patricia Jane T. Alindam- 2ND YEAR College/ USTP', 'pending', 'complex', '', '2024-02-28 13:41:14'),
(37, '20240229197', 'Letter/ One Family one professional Scholarship', 23, 21, 48, 'Applying One Family One Professional Scholarship Program./Francine J.Lanipa -Misamis University', 'pending', 'complex', '', '2024-02-29 09:27:21'),
(38, '20240229198', 'Letter/ One Family ,One Professional Scholar Programm', 23, 21, 48, 'Applying One Family, One Professional Scholar  Program/Rodulfo Andrei A. Sinodivila -Misamis University  Oroqueita City', 'pending', 'complex', '', '2024-02-29 10:08:37'),
(39, '20240229199', 'Notice Of Public Hearing/ Sangguniang Panlungsod', 23, 21, 49, 'Public Hearing on March 15 ,2024 Friday ,9;00 AM at the Sangguniang Panlungsod Session Hall ,Civic Arena Area, Oroq.City Town Center.', 'completed', 'complex', '', '2024-02-29 10:31:21'),
(40, '20240229200', 'NOTICE OF MEETING /City Council for the protection of children', 23, 21, 49, 'Meeting on March 6,2024 wednesday,9;00 A.M at Learning Center ,Oroq. City.', 'completed', 'complex', '', '2024-02-29 10:42:02'),
(41, '20240229201', 'RESOLUTION NO.04-2023/ Burgos', 23, 21, 49, 'APPROVING the Comprehensive Brgy. youth Development  Plan (CBYDP) for the year 2023 to 2025 of Brgy, Burgos', 'pending', 'complex', '', '2024-02-29 11:19:23'),
(42, '20240229202', 'Resolution No.05 2023/BURGOS', 23, 21, 49, 'Resolution No. 05-2023 A resolution for approving the annual Brgy.youth investment plan (abyip) of 10%current fund of Brgy. Burgos CY.2024 amounting,243,991.00', 'pending', 'complex', '', '2024-02-29 11:27:33'),
(43, '20240229203', 'Nootice of Meeting (OCM)', 23, 21, 49, 'Meeting on friday ,March 1,2024, 1;30 pm at city Engeineer\'s Office.', 'completed', 'complex', '', '2024-02-29 13:30:09'),
(44, '20240229204', 'Workers Hired in infrastructure Projects /Brgy. Clarin Settlement P-1', 23, 21, 49, 'List of Worker Hired/Brgy. Clarin Settlement P1 - Artemio Calamba-et al', 'completed', 'complex', ' ', '2024-02-29 14:06:27'),
(45, '20240229205', 'Letter/ One Family ,One Professional  Scholarship Program', 23, 21, 48, 'Applying /One Family One Professional Scholarship Program- Diana G, Gregorio -Jose Risal Memorial State University -Main Campos.', 'pending', 'complex', '', '2024-02-29 15:34:15'),
(46, '20240301206', 'City Resolution No.2024-02-047/ SP', 23, 21, 48, 'Authorizing the Hon. City Mayor Lemuel Meyrick M. Acosta to sign the Memorandum of Agreement to be executed by and between the Local Government of Oroq. City and the LA SALLE UNIVERSITY, OZAMIS CITY ,for the on-job- training deployment of its BACHELOR OF LIBRARY and INFORMATION SCIENCE .(BLIS) student at the Oroq. City Library.', 'completed', 'complex', '', '2024-03-01 08:29:33'),
(47, '20240301207', 'Communication Letter/ Province of Misamis Occidental', 23, 21, 48, 'Reversion of the new ASENSO LOGO and PLACEMENT OF BAGONG PILIPINAS LOGO', 'completed', 'complex', '', '2024-03-01 09:45:42'),
(48, '20240301208', 'RESOLUTION NO.2023-12-03-Brgy.Sibucal', 23, 21, 49, 'resolution to approve the annual Barangay youth investment Program of sangguniang Kabataan 10% fund of Barangay Sibucal Sk. CY 2024.', 'pending', 'complex', '', '2024-03-01 13:55:09'),
(49, '20240301209', 'RESOLUTION No.2023-12-02/Barangay Sibucal', 23, 21, 49, 'Resolution to approved the comprehensive Barangay Youth  Development Plan (CBYDP) of Sangguiniang Kabataan 10% Fund of Barangaay Sibucal Sk CY,2024.', 'pending', 'complex', '', '2024-03-01 14:15:08'),
(50, '20240301210', 'EXECUTIVE ORDER NO.026-2024(OCM)', 23, 21, 49, 'An order reconstituting the City- inter agency committee for the implementation of KAPIT- BISIG LABAN SA  KAHIRAPAN- Comprehensive and integrated delivery of Social Services;:PAYAPA AT MASAGANANG PAMAYANAN  COMMUNITY- DRIVEN DEVELOPMENT(KALAHI-CIDSS;PAMANA CDD) under the department of social welfare and development in Oroquieta City .Misamis Occ.', 'completed', 'complex', '', '2024-03-01 14:37:44'),
(51, '20240301211', 'Resolution No.3 series-2024/UPPER LAMAC', 23, 21, 49, 'approving the comprehensive brgy, youth investment plan.(CBYDP) A three years plan of SK. Upper Lamac Council for the youth development starting this current year until 2025.', 'pending', 'complex', '', '2024-03-01 15:00:06'),
(52, '20240301212', 'RESOLUTION NO. 03 series -2023 UPPER LAMAC', 23, 21, 49, 'APPROVING THE CY 2024 ANNUAL BARANGAY YOUTH INVESTMENT PROGRAM (ABYIP)', 'pending', 'complex', '', '2024-03-01 15:02:42'),
(53, '20240301213', 'RESOLUTION NO.2023-12-04 Canubay', 23, 21, 49, 'Resolution to approve the annual barangay youth investment program of SK.10% fund of  Barangay Canubay  SK. CY 2024', 'pending', 'complex', '', '2024-03-01 15:06:34'),
(54, '20240301214', 'RESOLUTION NO. 2023-12-03', 23, 21, 49, 'Resolution to approve the comprehensive Barangay youth Development Plan of SK. 10% fund of Brgy, Canubay SK> CY 2024', 'pending', 'complex', '', '2024-03-01 15:09:50'),
(55, '20240301215', 'COMMUNICATION  LETTER/WHIP', 23, 21, 48, 'Monthly Status report of the project ,Construction of Brgy, Lower Loboc Parking Lot  at El triumpo Beach.', 'pending', 'complex', '', '2024-03-01 15:15:18'),
(56, '20240304216', 'List of jobseekers-placed/hired /PRYCE GASES  INC.', 23, 21, 59, 'Name jobseeker placed/hired -outside Oroq. City  .- - WEE, OLIVER JUMAWAN JR.', 'pending', 'complex', '', '2024-03-04 10:58:14'),
(57, '20240304217', 'Application for Leave - Masayon', 8, 21, 60, 'Application for Leave - Masayon\r\nSick Leave March 1, 2024', 'completed', 'simple', '', '2024-03-04 11:05:25'),
(60, '20240304218', 'OBR PLDT Payment', 8, 21, 65, 'OBR, DV and Certification for PLDT Payment - March 2024', 'completed', 'simple', '', '2024-03-04 13:39:48'),
(61, '20240304219', 'SKMT (ABYIP) Pob.2 Oroq. City', 23, 21, 63, 'ABYIP W/ attach Resolution No.-2023-o3', 'pending', 'complex', '', '2024-03-04 13:55:01'),
(62, '20240304220', '1st Indorsement from SP, re: application for SP Accreditation - Pines Agri Venture Association', 8, 76, 66, '1st Indorsement from SP, re: application for SP Accreditation - Pines Agri Venture Association which includes LOI, Annexes C, E, F, G, H, I and COR from DOLE', 'completed', 'simple', '', '2024-03-04 14:06:31'),
(63, '20240304221', 'Notice To Proceed for OJT', 8, 21, 67, 'Issuance of NTP to 5 La Salle University students , BLIS for 150 hours', 'pending', 'simple', '', '2024-03-04 14:12:59'),
(64, '20240304222', 'SKMT(CBYDP) Poblacion 2 Oroq.city', 23, 74, 64, 'CBYDP-attach Resolution 2023-12-03 -Barangay Pob.2 Oroq. City', 'pending', 'complex', '', '2024-03-04 14:26:52'),
(65, '20240304223', 'SKMT (ABYIP) Lower Langcangan Oroq.City', 23, 21, 63, 'ABYIP/ 10%Fund of Barangay Lower Langcangan -attach Resolution No.2024-02-005', 'pending', 'complex', '', '2024-03-04 15:30:09'),
(66, '20240304224', 'SKMT (CBYDP) Barangay Lower Langcangan', 23, 21, 64, 'CBYDP 10% fund of Barangay Lower Langcangan Oroquieta City/Attach Resolution No.2024-01-004', 'pending', 'complex', '', '2024-03-04 15:39:23'),
(67, '20240304225', 'Application for Accreditation', 23, 21, 48, 'to seek accreditation /GITIB,Inc.', 'completed', 'complex', '', '2024-03-04 16:49:24'),
(68, '20240304226', 'Justification letter - OFOP', 23, 21, 68, 'Renewal Application for the One Family One Professional Scholarship | Kean Louise S. Tagactac', 'pending', 'complex', '', '2024-03-04 17:12:14'),
(69, '20240304227', 'Justification letter - OFOP', 23, 21, 68, 'Renewal Application for the One Family One Professional Scholarship - Mariel Jane B. Uba', 'pending', 'complex', '', '2024-03-04 17:13:04'),
(70, '20240304228', 'Justification letter - OFOP', 23, 21, 68, 'Renewal Application for the One Family One Professional Scholarship - Raziel Jane F. Gumapac', 'pending', 'complex', '', '2024-03-04 17:14:06'),
(71, '20240304229', 'Justification letter - OFOP', 23, 21, 68, 'Renewal Application for the One Family One Professional Scholarship - Mick Vincent C. Yew', 'pending', 'complex', '', '2024-03-04 17:15:23'),
(72, '20240304230', 'Justification letter - OFOP', 23, 21, 68, 'Renewal Application for the One Family One Professional Scholarship - VINCENT N. DAJAO', 'pending', 'complex', '', '2024-03-04 17:15:54'),
(73, '20240305231', 'SKMT (ABYIP) Barangay Bunga', 23, 21, 63, 'ABYIP/Barangay Bunga -Attach Resolution No.3-S-2024', 'pending', 'complex', '', '2024-03-05 09:45:58'),
(74, '20240305232', 'SKMT (CBYDP) Barangay Bunga', 23, 21, 64, 'CBYDP-Barangay Bunga Attach Resolution No.02-S-2024', 'pending', 'complex', '', '2024-03-05 09:53:41'),
(75, '20240305233', 'Application for Leave - Tacastacas', 8, 21, 60, 'Application for Leave on March 6, 2024', 'completed', 'simple', '', '2024-03-05 11:14:47'),
(76, '20240305234', 'Letter/DSWD Oroqiueta City', 23, 21, 58, 'Request the assistance personnel from your office for a period of one week to help us in monitoring our livelihood project', 'pending', 'complex', '', '2024-03-05 13:20:13'),
(77, '20240305235', 'Communication Letter/ DTI', 23, 21, 48, 'To coordinate,consult and seek your kind consideration to allow the conduct of the assessment,Consultation and Triage(ACT) session in your City./on March 13,2024 -9;00 a.m to 4;00 pm', 'completed', 'complex', '', '2024-03-05 16:52:50'),
(78, '20240305236', 'Liquidation Report -', 8, 21, 49, 'for compliance for acceptance report, re: Starter Kit Poultry - Domingo Lumacang', 'pending', 'complex', '', '2024-03-05 17:21:21'),
(79, '20240305237', 'POW', 8, 86, 49, 'POW Installation of Flood Light at City Plaza Basketball Court', 'completed', 'complex', '', '2024-03-05 17:26:06'),
(80, '20240306238', 'Notice of Meeting', 23, 21, 55, 'Requested to attend the 4Ps Quarterly Meeting on 08 March 2024,1;00 p.m at the E-LEARNING , CENTER,City Library ,this city', 'completed', 'simple', '', '2024-03-06 09:37:52'),
(81, '20240306239', 'Communication Letter/DPWH', 23, 21, 48, 'Monthly Status Report of infrastructure Projects implemented in the city of Oroquieta as of February 2024.', 'completed', 'complex', '', '2024-03-06 09:56:25'),
(82, '20240306240', 'MEMORANDUM ORDER -No.080-2024', 23, 21, 56, 'Requested to attend the exit conference with the Commission- on Audit on 21 March 2024,8;30 A.M to 5;00 P.M at Bocter\'s Place Dolipos Bajo,this City', 'pending', 'simple', '', '2024-03-06 10:08:38'),
(83, '20240306241', 'Application letter,One Family One Professional Scholarship Program', 23, 21, 48, 'Applying One Family One Professional -JEFFRY SUGALAM TEVES,-Barangay Bunga,/University of Science and technology.', 'pending', 'simple', '', '2024-03-06 11:38:12'),
(84, '20240306242', 'Application letter One family One Professional', 23, 21, 48, 'ELLA MAE A.TUMALA-  Barangay pINES 3rd year College (USTSP)  Applying One Family One Professional Scholarship Program.', 'pending', 'simple', '', '2024-03-06 11:52:30'),
(85, '20240306243', 'Application letter One Family One Professional Scholarship Program', 23, 21, 48, 'NASH LUMASAG DIJON-BARANGAY cANUBAY  1st year college -Cebu institute iof Technology \'Apllying -One Family One Professional.', 'pending', 'simple', '', '2024-03-06 11:59:54'),
(86, '20240306244', 'Application for Leave - Cario', 13, 21, 60, 'for approval', 'pending', 'complex', '', '2024-03-06 13:03:30'),
(87, '20240306245', 'Application for Leave - abuhon', 13, 21, 60, 'for approval', 'completed', 'complex', '', '2024-03-06 13:04:14'),
(88, '20240306246', 'Information and Request Letter', 23, 21, 48, 'Permission to conduct surveys within offices', 'pending', 'simple', '', '2024-03-06 13:22:45'),
(89, '20240306247', 'NOTICE OF MEETING/City Project monitoring', 23, 21, 55, 'Project Monitoring Committee will conduct an inspection of the following projects on March 08,2024,friday at 1;30 p.m.', 'completed', 'complex', '', '2024-03-06 14:45:04'),
(90, '20240306248', 'SKMT CBYDP-Barangay Tuyabang Alto', 23, 21, 64, 'CBYDP-10% FUND OF Barangay tuyabang Alto -attach Resolution No.2024-01-004', 'pending', 'complex', '', '2024-03-06 15:04:45'),
(91, '20240306249', 'ABYIP- Barangay Tuyabang Alto', 23, 21, 63, 'ABYIP -Barangay Tuyabang Alto attach resolution No.2024-01-005', 'pending', 'complex', '', '2024-03-06 15:11:19'),
(92, '20240306250', 'Communication Letter/DPWH', 23, 21, 48, 'Close  collaboration and Coordination with the Local Government Units in the implementation of insfrastructure Project in this region.', 'completed', 'complex', '', '2024-03-06 15:58:05'),
(93, '20240307251', 'Application for Leave - Tacastacas', 13, 21, 60, 'for approval', 'completed', 'complex', '', '2024-03-07 09:17:25'),
(94, '20240307252', 'SK(ABYIP )Barangay Victoria Oroquieta city', 23, 21, 63, 'SK-ABYIP-Attached Resolution No.4 Series of 2024', 'pending', 'simple', '', '2024-03-07 09:36:08'),
(95, '20240307253', 'SK.(CBYDP) Barangay Victoria', 23, 21, 64, 'SK-CBYDP-Barangay Victoria Attached Resolution No.3-Series No.2023', 'pending', 'simple', '', '2024-03-07 09:42:45'),
(96, '20240307254', 'EXECUTIVE ORDER-No.028-2024', 23, 21, 50, 'AN ORDER REORGANIZING THE GENDER AND DEVELOPMENT FOCAL POINT IN OROQUIETA CITY.', 'pending', 'simple', '', '2024-03-07 10:17:27'),
(97, '20240307255', 'EXECUTIVE ORDER No.029-2024', 23, 21, 50, 'AN ORDER CREATING THE LOCAL YOUTH DEVELOPMENT COUNCIL IN OROQUIETA CITY', 'pending', 'simple', '', '2024-03-07 10:20:18'),
(98, '20240307256', 'RESPONSE LETTER/ University of Science and Technology of Southern Philippines', 23, 21, 48, 'We would like to express our sincerest desire and interest to work in partnership with the Local Government of Oroquieta on  the conduct of diffrent livelihood and skills training for organization and communities in the city under our Extension and Community Relations Office', 'pending', 'simple', '', '2024-03-07 11:32:51'),
(99, '20240307257', 'PR- Catering Services -Snacks', 13, 21, 65, 'for approval', 'pending', 'complex', '', '2024-03-07 14:14:48'),
(100, '20240307258', 'Communication Letter/Optimistic Milestone Man power In\'l. Services Co.', 23, 21, 48, 'OPTIMISTC MILESTONE MANPOWER IN\'L SERVICES CO.-are respectfully requesting to your good office to Conduct our Special Recruitment Activity(SRA)for possible job placement of a qualified candidates (domestic worker) to be deployed in Riyadh,Jeddah City in Kingdom of saudi  Arabia,Qatar, Malaysia and Kuwait.', 'pending', 'simple', '', '2024-03-07 14:36:21'),
(101, '20240307259', 'MEMORANDUM NO. ORDER No. 084-2024', 23, 21, 56, 'In views of this, let us join nations around the world in celebrating EARTH HOUR 2024 by switching-off lights, during this Global \"LIGHT OUT\" on March 23 2024,Saturday, from 8:30 p.m 9:30 p.m', 'completed', 'simple', '', '2024-03-07 14:50:00'),
(102, '20240307260', 'SK.(CBYDP) Barangay Mobod', 23, 21, 50, 'CBYDP Barangay Mobod Oroquieta City. Attached Resolution N.2023-12-03', 'pending', 'simple', '', '2024-03-07 16:58:31'),
(103, '20240307261', 'SK(ABYIP) Barangay Mobod -Oroquieta City', 23, 21, 63, 'ABYIP- Barangay Mobod Oroquieta City-Attached Resolution No.2024-01-004', 'pending', 'complex', '', '2024-03-07 17:01:04'),
(104, '20240308262', 'SK>(CBYDP) Barangay Mialen Oroq. City', 23, 21, 64, 'CBYDP-Barangay Mialen -Attached Resolution No.003-S-2023.', 'pending', 'simple', '', '2024-03-08 10:43:53'),
(105, '20240308263', 'SK (ABYIP) Barangay Mialen.Oroq.City', 23, 21, 63, 'ABYIP-Barangay Mialen Oroquieta City-Attached Resolution No.001-S-2024', 'pending', 'simple', '', '2024-03-08 10:46:52'),
(106, '20240308264', 'SK(CBYDP) Barangay Upper Langcangan Oroquieta City', 23, 21, 64, 'CBYDP-Barangay Upper Langcangan Oroquieta city- Attached Resolution No.01-Series-2024', 'pending', 'simple', '', '2024-03-08 11:27:23'),
(107, '20240308265', 'SK.(ABYIP)Barangay Upper Langcangan Oroquieta City', 23, 21, 63, 'ABYIP- Barangay Upper Langcangan Oroquieta City-Attached Resolution No.02-Series-2024', 'pending', 'simple', '', '2024-03-08 11:30:06'),
(108, '20240308266', 'MEMORANDUM NO.087-2024', 23, 21, 56, 'MEMORANDUM No.087-2024-DESIGNATION TO TAKE OF OFFICE- WELTA C. LARA- On march 11,2024,While the undersigned is on official business, you are hereby officially designated to take charge of the office of the city Mayor', 'pending', 'simple', '', '2024-03-08 13:18:21'),
(109, '20240308267', 'MEMORANDUM NO.088-2024', 23, 21, 56, 'DESIGNATION TO TAKE CHARGE OF OFFICE- HON.VERGINIA M. ALMONTE,City Vice Mayor Oroq.City, Effective 12 march 2024,while the undersigned is on official business in connection to his official travel to Cebu City, Until his return,you are hereby officially designated to take charge of he office of the City Mayor', 'completed', 'simple', '', '2024-03-08 13:26:48'),
(110, '20240308268', 'ENDORSEMENT LETTER SIAKEAN\'S INTEGRATED FARM', 23, 21, 48, 'Siakean\'s integrated Farm is committed to support agricultural Technology education not only in our city but also in neighboring towns over the year./(D-ATI RFOX) and has registered program with TESDA-for the Produce Organic Vegetables (leading to organic Agriculture NC II)with 15  Scholars And Produce Organic Fertilizers(leading to organic Agriculture NCII)with 20 Scholars', 'pending', 'simple', '', '2024-03-08 15:03:52'),
(111, '20240308269', 'Information letter-DPWH', 23, 21, 48, 'We are submitting for your information and guidance a partial list of completed and turn- over project undertaken by our District Engineering office', 'completed', 'simple', '', '2024-03-08 15:10:29'),
(112, '20240308270', 'SK.(CBYDP) Barangay Talairon Oroquieta City', 23, 21, 64, 'CBYDP- Barangay talairon Oroquieta City,Attached Resolution No.2-2023', 'pending', 'simple', '', '2024-03-08 16:03:34'),
(113, '20240308271', 'SK.(ABYIP) Barangay talairon Oroquieta City', 23, 21, 63, 'ABYIP-Barangay Talairon ,Attached Resolution No.1-2024', 'pending', 'simple', '', '2024-03-08 16:06:58'),
(114, '20240311272', 'SK(ABYIP)barangay Dolipos Bajo Oroquieta City', 23, 21, 63, 'ABYIP_Barangay Dolipos Bajo Oroquieta City-Attached Resolution No.02-2024', 'pending', 'simple', NULL, '2024-03-11 09:12:37'),
(115, '20240311273', 'SK(CBYDP)-Barangay Dolipos Bajo Oroquieta City', 23, 21, 64, 'CBYDP-Barangay Dolipos Bajo Oroquieta City-Attached Resolution No.01-2024', 'pending', 'simple', NULL, '2024-03-11 09:15:26'),
(116, '20240311274', 'SK(ABYIP)Barangay Lower Rizal Oroquieta City', 23, 21, 63, 'ABYIP- Barangay Lower Rizal Oroquieta City Attached Resolution No.02-2024', 'pending', 'simple', NULL, '2024-03-11 09:20:29'),
(117, '20240311275', 'SK(CBYDP)-Barangay Lower Rizal Oroquieta City', 23, 21, 64, 'CBYDP_Barangay Lower Rizal Oroquieta City- Attached Resolution No,04 2023', 'pending', 'simple', NULL, '2024-03-11 09:23:33'),
(118, '20240311276', 'SK.(ABYIP)-Barangay Layawan Oroquieta City', 23, 21, 63, 'ABYIP-Barangay Layawan-Oroquieta City-Attached resolution No.2024-02', 'pending', 'simple', NULL, '2024-03-11 09:34:10'),
(119, '20240311277', 'SK.(CBYDP)-Barangay Layawan Oroquieta City', 23, 21, 64, 'CBYDP-Barangay Layawan Oroquieta City-Attached Resolution No.2024-01', 'pending', 'simple', NULL, '2024-03-11 09:37:24'),
(120, '20240311278', 'URGENT MESSAGE-DILG', 23, 21, 48, 'ALL PDs AND CDs/  Dissemination of advisory re; WEBINARS ON \'GAD GAVE ME YOU; creating Gender-Responsive Programs and Policies for SK Officials\' and leading the SK Pederasyon by the National Youth Commission.', 'pending', 'simple', NULL, '2024-03-11 14:57:12'),
(121, '20240311279', 'Communication Letter/ LA SALLE UNIVRSITY-OZAMIZ CITY', 23, 21, 48, 'Our Student are eager to apply the Theoretical knowledge they have gained in the Classroom to real world settings, and we firmly believe  that OJT placement of our student at the INFRASTRUCTURE AND TECHNICAL SERVICES SECTION OF THE CITY GOVERNMENT OF OROQUIETA will be invaluable to their professional growth.- In line with this,we kindly request confirmation of the institution\'s willingness to accomodate the following Bachelor of Science in Computer Engineering student from March 2024 to May 2024.- ARCAYENA ,NAZEL T./ GABAY\'JOHN MICHAEL A.', 'pending', 'simple', NULL, '2024-03-11 15:37:06'),
(122, '20240312280', 'Leave Application - Buta (March 15, 2024)', 13, 21, 60, 'For approval', 'pending', 'complex', NULL, '2024-03-12 10:15:39'),
(123, '20240312281', 'Leave Application - Buta (March 19, 2024)', 13, 21, 60, 'for approval', 'pending', 'complex', NULL, '2024-03-12 10:18:21'),
(124, '20240312282', 'Letter/ University of Science and Technology of Southern Philippines', 23, 21, 49, 'We are humbly asking your distinguished institution if we could partner with you to be our student client for their  capstone project .', 'pending', 'simple', NULL, '2024-03-12 10:51:09'),
(125, '20240312283', 'Communication Letter/ Provincial Agriculture Office', 23, 21, 48, 'As part of the Internship  of the Agriculture student in Misamis University, Ozamiz City the students need to be exposed on how to manage pest and disease incidence in crop production through sustainable approach like the use of biocontrol agents and how they  are produced and reared in the laboratory set up. we would like to request that these student be allowed to experience firsthand on how to produced and reared these organism in laboratory condition.', 'pending', 'simple', NULL, '2024-03-12 14:58:40'),
(126, '20240312284', 'Communication letter /from USTP', 23, 21, 49, 'We are humbly asking your distinguished institution if we could partner with you to be our students\' client for thier capstone project.', 'pending', 'simple', NULL, '2024-03-12 16:26:57'),
(127, '20240313285', 'asdsad', 8, 21, 63, 'asdsadsad', 'pending', 'complex', NULL, '2024-03-13 23:15:31');

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
(68, 'Justification Letter', '2024-03-04 17:05:52');

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
  `t_number` varchar(11) NOT NULL,
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
(95, '20240229205', 23, 21, 32, 21, 'torec', NULL, NULL, NULL, '2024-02-29 15:35:16', NULL, 'no', NULL),
(96, '20240301206', 23, 21, 23, 21, 'received', 1, '2024-03-01 08:29:33', 1, '2024-03-05 09:00:00', NULL, 'no', NULL),
(97, '20240301206', 23, 21, 8, 21, 'received', 1, '2024-03-03 23:14:10', 1, '2024-03-01 08:31:33', NULL, 'no', NULL),
(98, '20240301207', 23, 21, 23, 21, 'received', 1, '2024-03-01 09:45:42', 1, NULL, NULL, 'no', NULL),
(99, '20240301207', 23, 21, 8, 21, 'received', 1, '2024-03-01 10:30:46', 1, '2024-03-01 09:46:42', NULL, 'no', NULL),
(100, '20240301207', 8, 21, 23, 21, 'completed', 1, '2024-03-01 13:14:59', NULL, '2024-03-01 10:31:37', '11', 'yes', NULL),
(101, '20240229199', 8, 21, 23, 21, 'completed', 1, '2024-03-01 13:12:56', NULL, '2024-03-01 10:46:52', '11', 'yes', NULL),
(102, '20240229197', 8, 21, 32, 21, 'torec', NULL, NULL, NULL, '2024-03-01 10:48:05', NULL, 'no', 'for consolidation'),
(103, '20240229198', 8, 21, 32, 21, 'torec', NULL, NULL, NULL, '2024-03-01 10:48:25', NULL, 'no', 'for consolidation'),
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
(148, '20240304216', 8, 21, 14, 21, 'torec', NULL, NULL, NULL, '2024-03-04 13:54:25', NULL, 'no', 'for appropriate action, then forward to Masayon for LMI reporting'),
(149, '20240304219', 23, 21, 23, 21, 'received', 1, '2024-03-04 13:55:01', 1, NULL, NULL, 'no', NULL),
(150, '20240304219', 23, 21, 8, 21, 'received', 1, '2024-03-04 16:21:55', 1, '2024-03-04 13:58:54', NULL, 'no', NULL),
(151, '20240304220', 8, 76, 8, 76, 'received', 1, '2024-03-04 14:06:31', 1, '2024-03-04 14:06:31', NULL, 'no', NULL),
(152, '20240304220', 8, 76, 23, 76, 'received', 1, '2024-03-04 14:07:34', 1, '2024-03-04 14:06:31', NULL, 'yes', ''),
(153, '20240304220', 8, 21, 8, 21, 'completed', 1, '2024-03-04 14:07:34', NULL, '2024-03-04 14:07:34', '15', 'no', 'for signature from other TWG Members'),
(154, '20240304221', 8, 21, 8, 21, 'received', 1, '2024-03-04 14:12:59', 1, '2024-03-04 14:12:59', NULL, 'no', NULL),
(155, '20240304221', 8, 21, 23, 21, 'torec', NULL, NULL, NULL, '2024-03-04 14:12:59', NULL, 'yes', ''),
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
(205, '20240227182', 26, 21, 27, 21, 'torec', NULL, NULL, NULL, '2024-03-06 08:48:01', NULL, 'no', 'Si king francis cario ang mi attend sa meeting.'),
(206, '20240305237', 13, 21, 8, 21, 'received', 1, '2024-03-06 11:38:21', 1, '2024-03-06 09:33:49', NULL, 'no', 'Already prepared P.R'),
(207, '20240306238', 23, 21, 23, 21, 'received', 1, '2024-03-06 09:37:52', 1, NULL, NULL, 'no', NULL),
(208, '20240306238', 23, 21, 8, 21, 'received', 1, '2024-03-06 16:24:14', 1, '2024-03-06 09:37:52', NULL, 'no', ''),
(209, '20240306239', 23, 21, 23, 21, 'received', 1, '2024-03-06 09:56:25', 1, NULL, NULL, 'no', NULL),
(210, '20240306239', 23, 21, 8, 21, 'received', 1, '2024-03-06 11:38:02', 1, '2024-03-06 09:56:25', NULL, 'no', ''),
(211, '20240306240', 23, 21, 23, 21, 'received', 1, '2024-03-06 10:08:38', 1, NULL, NULL, 'no', NULL),
(212, '20240306240', 23, 21, 8, 21, 'received', 1, '2024-03-06 11:36:50', NULL, '2024-03-06 10:08:38', NULL, 'no', ''),
(213, '20240301206', 8, 21, 23, 21, 'completed', 1, '2024-03-11 15:43:48', NULL, '2024-03-06 11:37:04', '11', 'yes', NULL),
(214, '20240306241', 23, 21, 23, 21, 'received', 1, '2024-03-06 11:38:12', 1, '2024-03-06 11:38:12', NULL, 'no', NULL),
(215, '20240306241', 23, 21, 8, 21, 'torec', NULL, NULL, NULL, '2024-03-06 11:38:12', NULL, 'no', ''),
(216, '20240305237', 8, 21, 23, 21, 'completed', 1, '2024-03-06 16:16:52', NULL, '2024-03-06 11:38:43', '11', 'yes', NULL),
(217, '20240306242', 23, 21, 23, 21, 'received', 1, '2024-03-06 11:52:30', 1, NULL, NULL, 'no', NULL),
(218, '20240306242', 23, 21, 8, 21, 'received', 1, '2024-03-07 14:39:48', 1, '2024-03-06 11:52:30', NULL, 'no', ''),
(219, '20240306243', 23, 21, 23, 21, 'received', 1, '2024-03-06 11:59:54', 1, NULL, NULL, 'no', NULL),
(220, '20240306243', 23, 21, 8, 21, 'received', 1, '2024-03-07 14:39:41', 1, '2024-03-06 11:59:54', NULL, 'no', ''),
(221, '20240306244', 13, 21, 13, 21, 'received', 1, '2024-03-06 13:03:30', 1, NULL, NULL, 'no', NULL),
(222, '20240306245', 13, 21, 13, 21, 'received', 1, '2024-03-06 13:04:14', 1, '2024-03-06 16:14:23', NULL, 'no', NULL),
(223, '20240306246', 23, 21, 23, 21, 'received', 1, '2024-03-06 13:22:45', 1, NULL, NULL, 'no', NULL),
(224, '20240306246', 23, 21, 8, 21, 'torec', NULL, NULL, NULL, '2024-03-06 13:22:45', NULL, 'no', ''),
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
(241, '20240305234', 8, 21, 19, 21, 'received', 1, '2024-03-08 10:33:14', NULL, '2024-03-06 16:26:48', NULL, 'no', 'please extend assistance togetehr with celrose nxt week. pls coordinate with maam cindy of SLP'),
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
(256, '20240306244', 13, 21, 27, 21, 'torec', NULL, NULL, NULL, '2024-03-07 14:12:11', NULL, 'no', 'Already approved'),
(257, '20240307251', 13, 21, 8, 21, 'received', 1, '2024-03-07 14:41:14', 1, '2024-03-07 14:12:34', NULL, 'no', 'approved'),
(258, '20240307257', 13, 21, 13, 21, 'received', 1, '2024-03-07 14:14:48', 1, NULL, NULL, 'no', NULL),
(259, '20240307257', 13, 21, 23, 21, 'torec', NULL, NULL, NULL, '2024-03-07 14:19:21', NULL, 'no', 'for process'),
(260, '20240307258', 23, 21, 23, 21, 'received', 1, '2024-03-07 14:36:21', 1, NULL, NULL, 'no', NULL),
(261, '20240307258', 23, 21, 8, 21, 'received', 1, '2024-03-07 14:41:28', 1, '2024-03-07 14:40:42', NULL, 'no', NULL),
(262, '20240307258', 8, 21, 26, 21, 'received', 1, '2024-03-07 14:49:58', NULL, '2024-03-07 14:42:58', NULL, 'no', 'for appropriate action'),
(263, '20240307251', 8, 21, 8, 21, 'completed', 1, '2024-03-07 14:43:54', NULL, '2024-03-07 14:43:54', '15', 'no', NULL),
(264, '20240307252', 8, 21, 33, 21, 'received', 1, '2024-03-08 11:35:22', NULL, '2024-03-07 14:44:32', NULL, 'no', 'for consolidation'),
(265, '20240307253', 8, 21, 33, 21, 'received', 1, '2024-03-08 11:35:31', NULL, '2024-03-07 14:45:03', NULL, 'no', 'for consolidation'),
(266, '20240306242', 8, 21, 32, 21, 'torec', NULL, NULL, NULL, '2024-03-07 14:46:15', NULL, 'no', 'approved and for appropriate action'),
(267, '20240306243', 8, 21, 32, 21, 'torec', NULL, NULL, NULL, '2024-03-07 14:47:16', NULL, 'no', 'for consolidation'),
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
(294, '20240308266', 23, 21, 8, 21, 'torec', NULL, NULL, NULL, '2024-03-08 13:31:06', NULL, 'no', NULL),
(295, '20240308267', 23, 21, 8, 21, 'received', 1, '2024-03-11 15:50:16', 1, '2024-03-08 13:31:24', NULL, 'no', NULL),
(296, '20240308268', 23, 21, 23, 21, 'received', 1, '2024-03-08 15:03:52', 1, NULL, NULL, 'no', NULL),
(297, '20240308269', 23, 21, 23, 21, 'received', 1, '2024-03-08 15:10:29', 1, NULL, NULL, 'no', NULL),
(298, '20240308269', 23, 21, 8, 21, 'received', 1, '2024-03-08 15:53:55', 1, '2024-03-08 15:16:00', NULL, 'no', NULL),
(299, '20240308268', 23, 21, 8, 21, 'received', 1, '2024-03-08 15:53:10', 1, '2024-03-08 15:16:23', NULL, 'no', NULL),
(300, '20240306247', 12, 21, 23, 21, 'received', 1, '2024-03-08 15:46:48', 1, '2024-03-08 15:42:52', NULL, 'no', 'attended the meeting and site inspection with the City Project Monitoring Committee'),
(301, '20240301215', 12, 21, 8, 21, 'torec', NULL, NULL, NULL, '2024-03-08 15:44:00', NULL, 'no', 'encoded terminal report and attachments'),
(302, '20240306247', 23, 21, 23, 21, 'completed', 1, '2024-03-08 15:48:17', NULL, '2024-03-08 15:47:19', '11', 'yes', NULL),
(303, '20240308268', 8, 21, 13, 21, 'received', 1, '2024-03-08 15:56:40', NULL, '2024-03-08 15:55:11', NULL, 'no', 'for appropriate action'),
(304, '20240308269', 8, 21, 23, 21, 'completed', 1, '2024-03-11 10:08:04', NULL, '2024-03-08 15:55:56', '11', 'yes', 'haved filed'),
(305, '20240308270', 23, 21, 23, 21, 'received', 1, '2024-03-08 16:03:34', 1, NULL, NULL, 'no', NULL),
(306, '20240308271', 23, 21, 23, 21, 'received', 1, '2024-03-08 16:06:58', 1, NULL, NULL, 'no', NULL),
(307, '20240308271', 23, 21, 8, 21, 'received', 1, '2024-03-08 16:14:49', 1, '2024-03-08 16:11:23', NULL, 'no', NULL),
(308, '20240308270', 23, 21, 8, 21, 'received', 1, '2024-03-08 16:14:06', 1, '2024-03-08 16:11:42', NULL, 'no', NULL),
(309, '20240308271', 8, 21, 33, 21, 'received', 1, '2024-03-11 10:35:11', NULL, '2024-03-08 16:15:18', NULL, 'no', 'for consolidation'),
(310, '20240308270', 8, 21, 33, 21, 'received', 1, '2024-03-11 10:34:39', NULL, '2024-03-08 16:16:01', NULL, 'no', 'for consolidation'),
(311, '20240305236', 20, 21, 8, 21, 'torec', NULL, NULL, NULL, '2024-03-09 14:50:42', NULL, 'no', 'prepared the certificate of acceptance and secured signature of the beneficiary.'),
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
(327, '20240311279', 23, 21, 8, 21, 'torec', NULL, NULL, NULL, '2024-03-11 15:42:16', NULL, 'no', NULL),
(328, '20240308267', 8, 21, 23, 21, 'completed', 1, '2024-03-11 15:51:35', NULL, '2024-03-11 15:50:41', '11', 'yes', NULL),
(329, '20240312280', 13, 21, 13, 21, 'received', 1, '2024-03-12 10:15:39', NULL, NULL, NULL, 'no', NULL),
(330, '20240312281', 13, 21, 13, 21, 'received', 1, '2024-03-12 10:18:21', NULL, NULL, NULL, 'no', NULL),
(331, '20240228191', 20, 21, 8, 21, 'torec', NULL, NULL, NULL, '2024-03-12 10:22:15', NULL, 'no', 'Out of 15 applicants, \r\n7 - nasulod sa Senote \r\n4 - 4ps verified \r\n3 - refer sa sunod nga batch (1 electrician, 2 manicurista)\r\n1 - wala kaanhi sa office'),
(332, '20240312282', 23, 21, 23, 21, 'received', 1, '2024-03-12 10:51:09', 1, NULL, NULL, 'no', NULL),
(333, '20240312282', 23, 21, 21, 21, 'received', 1, '2024-03-12 14:12:53', NULL, '2024-03-12 11:04:47', NULL, 'no', NULL),
(334, '20240311278', 21, 21, 28, 21, 'received', 1, '2024-03-12 16:33:51', NULL, '2024-03-12 14:11:32', NULL, 'no', 'Joseph,\r\nUrgent: For information and appropriate  action.'),
(335, '20240311272', 21, 21, 33, 21, 'torec', NULL, NULL, NULL, '2024-03-12 14:26:22', NULL, 'no', 'Dianne B.,\r\nFor consolidation'),
(336, '20240311274', 21, 21, 33, 21, 'torec', NULL, NULL, NULL, '2024-03-12 14:27:54', NULL, 'no', 'Dianne B.,\r\nFor consolidation'),
(337, '20240311273', 21, 21, 33, 21, 'torec', NULL, NULL, NULL, '2024-03-12 14:29:19', NULL, 'no', 'Dianne B., \r\nFor consolidation'),
(338, '20240311275', 21, 21, 33, 21, 'torec', NULL, NULL, NULL, '2024-03-12 14:31:34', NULL, 'no', 'Dianne B.,\r\nFor Consolidation'),
(339, '20240311276', 21, 21, 33, 21, 'torec', NULL, NULL, NULL, '2024-03-12 14:40:16', NULL, 'no', 'Dianne B., \r\nFor consolidation'),
(340, '20240311277', 21, 21, 33, 21, 'torec', NULL, NULL, NULL, '2024-03-12 14:41:40', NULL, 'no', 'Dianne B.,\r\nFor consolidation'),
(341, '20240312283', 23, 21, 23, 21, 'received', 1, '2024-03-12 14:58:40', 1, NULL, NULL, 'no', NULL),
(342, '20240312283', 23, 21, 21, 21, 'torec', NULL, NULL, NULL, '2024-03-12 15:05:47', NULL, 'no', NULL),
(343, '20240312284', 23, 21, 23, 21, 'received', 1, '2024-03-12 16:26:57', 1, NULL, NULL, 'no', NULL),
(344, '20240312284', 23, 21, 21, 21, 'torec', NULL, NULL, NULL, '2024-03-12 16:30:15', NULL, 'no', NULL),
(345, '20240313285', 8, 21, 8, 21, 'received', 1, '2024-03-13 23:15:31', NULL, NULL, NULL, 'no', NULL);

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
  `created_at` datetime DEFAULT NULL,
  `status` enum('active','inactive','not-approved') NOT NULL,
  `added_by` int(11) NOT NULL,
  `person_id` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `persons`
--

INSERT INTO `persons` (`first_name`, `middle_name`, `last_name`, `extension`, `phone_number`, `email_address`, `address`, `age`, `created_at`, `status`, `added_by`, `person_id`) VALUES
('asds', NULL, 'adsad', NULL, NULL, NULL, 'Dullan Norte', NULL, '2024-03-14 00:02:50', 'active', 9, 165);

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
(11, 'Jobstart Philippines', 'sample', '2024-01-03 04:36:56'),
(12, 'Senior High Scholarship', NULL, '2024-01-03 04:37:34'),
(13, 'College Scholarship', NULL, '2024-01-03 04:38:16'),
(14, 'One Family One Profession', NULL, '2024-01-03 04:38:36'),
(15, 'asdasdasd', NULL, '2024-02-13 01:01:18');

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
(99, 151, 'sample', '2024-01-06 07:30:02');

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
(14, 'Sheila Marie', '', 'Daque', '', '09516531821', 'Lower Loboc', 'daquesheilamarie@gmail.com', NULL, 'user', 'active', 'jo', 'Shelayla', '$2y$10$Md/bS.rZKXp/HDAuIkoXgOR9iwbLGGli51TY8kGiSJZZ3yyZzZsGe', 21, 'no', '', '2023-05-05 07:23:18'),
(15, 'Cel', 'Betero', 'Chua', '', '0912789660', 'Talairon', 'chua.cpesd', NULL, 'user', 'active', 'jo', 'Choyerns', '$2y$10$LNjjAwAdQazQMF22UnUCde32RHVohPL3QPjpQ2tJMkH4xswinXPu6', 21, 'no', '', '2023-05-05 07:25:12'),
(16, 'WIENGELYN', 'MILO', 'IBASAN', '', '0912367928', 'Tipan', 'ibasan.cpesdoroq@gmail.com', NULL, 'user', 'active', 'jo', 'Wiengy ', '$2y$10$PzosSlglt.ovv.46i0i62OJAJPFo.XI8h6JJOmRb7UTDl2KJdaIy6', 21, 'no', '', '2023-05-05 07:27:14'),
(17, 'John Rick', 'Himpayan', 'Tac-an', '', '09618058910', 'Proper Langcangan', 'jrtacanambush@gmail.com', NULL, 'user', 'active', 'jo', 'John Rick', '$2y$10$gtbD6ggrpp8YD4CKOdUkj.PXYN4J2h21Z1hUONiAzi0MzwmsMRIuy', 21, 'no', '', '2023-05-05 07:46:38'),
(18, 'Celrose', 'O.', 'Español', '', '09465543788', 'Mobod', 'celrose14@gmail.com', NULL, 'user', 'active', 'jo', 'CELROSE', '$2y$10$LNjjAwAdQazQMF22UnUCde32RHVohPL3QPjpQ2tJMkH4xswinXPu6', 21, 'no', '', '2023-05-05 08:18:24'),
(19, 'Judy Mae', 'Taberao', 'Catane', '', '09462326054', 'Pines', 'catane.cpesdoroq@gmail.com', NULL, 'user', 'active', 'jo', 'judai09', '$2y$10$2j8deWGJKg6ftOrTRH43pudfIajE/BBn5n8mbZ2KWTzKK90gIcg1y', 21, 'no', '', '2023-05-09 14:24:42'),
(20, 'Dayanara Mae', 'Molina', 'Hipos', '', '09700746605', 'Villaflor', 'hipos.cpesdoroq@gmail.com', NULL, 'user', 'active', 'jo', 'Dayanara', '$2y$10$Mgt4XlqAHBBUSokzbp1pqeSAoyslqH//3y1TZYwL/i1oOcGo8ST7m', 21, 'no', '', '2023-05-09 14:30:58'),
(21, 'Marilou', 'Inting', 'Gumapac ', '', '09632873186', 'Binuangan', 'gumapac.cpesdoroq@gmail.com', NULL, 'user', 'active', 'regular', 'MIG101583', '$2y$10$Mgt4XlqAHBBUSokzbp1pqeSAoyslqH//3y1TZYwL/i1oOcGo8ST7m', 21, 'no', '', '2023-05-10 08:49:43'),
(22, 'Reymond', 'Manlod', 'Tacastacas', '', '09090821383', 'Taboc Sur', 'verzacheboitax@gmail.com', NULL, 'user', 'active', 'jo', 'boitacs', '$2y$10$3HcPLa8XnlvpYxLpn99Xj.ZLBT5SXnfd4kl3yS3vmaPdVrIK6H05S', 21, 'no', '', '2023-05-10 09:26:41'),
(23, 'Richard', 'Cariaga ', 'Liberto ', '', '09383926364', 'Canubay', 'richardliberto11@gmail.com', NULL, 'user', 'active', 'regular', 'Jhong ', '$2y$10$PzosSlglt.ovv.46i0i62OJAJPFo.XI8h6JJOmRb7UTDl2KJdaIy6', 21, 'yes', '', '2023-05-10 09:28:27'),
(24, 'Dennamor', 'Tangcay', 'Markinex', '', '09300334135', 'Lower Langcangan', 'markinez.cpesdoroq@gmail.com', NULL, 'user', 'active', 'jo', 'amoreezz', '$2y$10$lnfNauHJ/hTWRgEXSWw2g.RIGcsvIUwCqft74vSVpnUcUxJjVwY0K', 21, 'no', '', '2023-05-12 14:08:34'),
(25, 'SUNNY', 'IYOG', 'LUNA', '', '09516508095', 'Canubay', 'luna.cpesdoroq@gmail.com', NULL, 'user', 'active', 'jo', 'PAGONGLUNA', '$2y$10$LNjjAwAdQazQMF22UnUCde32RHVohPL3QPjpQ2tJMkH4xswinXPu6', 21, 'no', '', '2023-06-19 13:35:39'),
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
-- AUTO_INCREMENT for table `documents`
--
ALTER TABLE `documents`
  MODIFY `document_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=128;

--
-- AUTO_INCREMENT for table `document_types`
--
ALTER TABLE `document_types`
  MODIFY `type_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=69;

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
  MODIFY `history_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=346;

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
  MODIFY `person_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=166;

--
-- AUTO_INCREMENT for table `programs`
--
ALTER TABLE `programs`
  MODIFY `program_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `program_block`
--
ALTER TABLE `program_block`
  MODIFY `program_block_id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- AUTO_INCREMENT for table `records`
--
ALTER TABLE `records`
  MODIFY `record_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=104;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(50) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
