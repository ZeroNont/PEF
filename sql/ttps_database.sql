-- phpMyAdmin SQL Dump
-- version 4.6.6
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jul 19, 2021 at 02:40 PM
-- Server version: 5.7.17-log
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ttps_database`
--

-- --------------------------------------------------------

--
-- Table structure for table `approval`
--

CREATE TABLE `approval` (
  `Approval_ID` int(11) NOT NULL,
  `Form_ID` int(11) NOT NULL,
  `Requester_ID` int(11) NOT NULL,
  `Requested_date` date NOT NULL,
  `Supervisor_ID` int(11) NOT NULL,
  `Supervisor_date` date NOT NULL,
  `HR_ID` int(11) NOT NULL,
  `HR_date` date NOT NULL,
  `Approve_plant_ID` int(11) NOT NULL,
  `Approval_plant_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `company`
--

CREATE TABLE `company` (
  `Company_ID` int(11) NOT NULL COMMENT 'ลำดับ',
  `Company_name` varchar(100) DEFAULT NULL COMMENT 'ชื่อบริษัท',
  `Company_name_th` varchar(100) DEFAULT NULL,
  `Company_shortname` varchar(10) DEFAULT NULL COMMENT 'ชื่อย่อบริษัท'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `company`
--

INSERT INTO `company` (`Company_ID`, `Company_name`, `Company_name_th`, `Company_shortname`) VALUES
(1, 'Siam Denso Manufactoring', 'บริษัท สยามเด็นโซ่แมนูแฟคเจอริ่ง จำกัด', 'SDM'),
(2, 'Siam Kyosan Manufactoring', 'บริษัท สยามเคียวซัน เด็นโซ่ จำกัด', 'SKD'),
(3, 'Siam Denso & Kyosan', 'บริษัท สยามเด็นโซ่แมนูแฟคเจอริ่ง จำกัด และ บริษัทสยามเคียวซันเด็นโซ่ จำกัด', 'SDM & SKD');

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

CREATE TABLE `department` (
  `Dep_id` int(11) NOT NULL,
  `Dep_Name` varchar(50) DEFAULT NULL,
  `Dep_shortName` varchar(50) NOT NULL,
  `Company_ID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Department of SDM and SKD';

--
-- Dumping data for table `department`
--

INSERT INTO `department` (`Dep_id`, `Dep_Name`, `Dep_shortName`, `Company_ID`) VALUES
(1, 'Production', 'PD', 1),
(2, 'Labour Union', 'LU', 1),
(3, 'Accounting & Planning', 'ACC', 1),
(4, 'Purchasing', 'PUR', 1),
(5, 'CORPS', 'CORPS', 1),
(6, 'Human Resources', 'HR', 1),
(7, 'General Affairs', 'GA', 1),
(8, 'Production Engineering', 'PE', 1),
(9, 'Quality Assurance', 'QA', 1),
(10, 'Production Control', 'PC', 1),
(11, 'TIE', 'TIE', 1),
(12, 'Safety & Environment', 'SE', 1),
(13, 'Maintenance Center', 'MC', 1),
(14, 'Manufacturing Specialist SKD', 'MS', 2),
(15, 'Corporate Planning Center SKD', 'CPC', 2),
(16, 'General Manufacturing SKD', 'GM', 2),
(17, 'Production SKD', 'PD', 2),
(18, 'Purchasing SKD', 'PUR', 2),
(19, 'Production Engineering SKD', 'PE', 2);

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
  `Emp_ID` varchar(50) NOT NULL COMMENT 'รหัสพนักงาน',
  `Empname_engTitle` varchar(50) DEFAULT NULL COMMENT 'คำนำหน้าภาษาอังกฤษ',
  `Empname_eng` varchar(50) DEFAULT NULL COMMENT 'ชื่อภาษาไทย',
  `Empsurname_eng` varchar(50) DEFAULT NULL COMMENT 'นามสกุลภาษาไทย',
  `Emp_nametitle` varchar(10) DEFAULT NULL COMMENT 'คำนำหน้า',
  `Empname_th` varchar(50) DEFAULT NULL COMMENT 'ชื่อภาษาอังกฤษ',
  `Empsurname_th` varchar(50) DEFAULT NULL COMMENT 'นามสกุลภาษาอังกฤษ',
  `Emp_startingdate` date DEFAULT NULL COMMENT 'วันที่เริ่มงาน',
  `Emp_probationduedate` date DEFAULT NULL COMMENT 'วันที่ผ่านโปร',
  `End_date` date DEFAULT NULL COMMENT 'วันที่ลาออก',
  `Emptype_ID` int(3) DEFAULT NULL COMMENT 'ประเภทพนักงาน',
  `Position_ID` varchar(50) DEFAULT NULL COMMENT 'ตำแหน่ง',
  `Company_ID` int(11) DEFAULT NULL COMMENT 'บริษัท',
  `Sectioncode_ID` varchar(50) DEFAULT NULL COMMENT 'Sec code',
  `Shift_ID` int(11) DEFAULT NULL COMMENT 'กะ',
  `Statuswork_ID` int(4) DEFAULT NULL COMMENT 'สถานะการทำงาน',
  `Type_ID` int(3) DEFAULT NULL COMMENT 'admin,direct,indirect',
  `Jobtype_ID` int(11) DEFAULT NULL COMMENT 'engineer job, adminjob',
  `Process_ID` int(3) DEFAULT NULL,
  `Subsection_ID` int(3) DEFAULT NULL,
  `Sectionname_ID` int(3) DEFAULT NULL,
  `Degree1` int(3) DEFAULT NULL COMMENT 'วุฒิการศึกษาเดิม',
  `Degree2` int(3) DEFAULT NULL COMMENT 'วุฒิการศึกษาที่เปลี่ยนแปลง',
  `Book_bank` varchar(15) DEFAULT NULL,
  `Bank_name` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`Emp_ID`, `Empname_engTitle`, `Empname_eng`, `Empsurname_eng`, `Emp_nametitle`, `Empname_th`, `Empsurname_th`, `Emp_startingdate`, `Emp_probationduedate`, `End_date`, `Emptype_ID`, `Position_ID`, `Company_ID`, `Sectioncode_ID`, `Shift_ID`, `Statuswork_ID`, `Type_ID`, `Jobtype_ID`, `Process_ID`, `Subsection_ID`, `Sectionname_ID`, `Degree1`, `Degree2`, `Book_bank`, `Bank_name`) VALUES
('00009', 'MISS', 'SU', 'CH', 'นางสาว', 'สุ', 'ศร', '2002-03-12', '2002-07-09', '0000-00-00', 5, 'P521', 1, '6850', 3, 1, 3, 0, 0, 0, 0, 1, 1, '0000000000', 'KASIKORNBANK PUBLIC COMPANY LIMITED'),
('00010', 'MR.', 'SU', 'CH', 'นางสาว', 'สุ', 'ศร', '2002-03-12', '2002-07-09', '0000-00-00', 5, 'P522', 1, '6850', 3, 1, 3, 0, 0, 0, 0, 1, 1, '0000000000', 'KASIKORNBANK PUBLIC COMPANY LIMITED'),
('00011', 'MR.', 'Su', 'CH', 'นางสาว', 'สุ', 'ศร', '2002-03-12', '2002-07-09', '0000-00-00', 5, 'P523', 1, '6850', 3, 1, 3, 0, 0, 0, 0, 1, 1, '0000000000', 'KASIKORNBANK PUBLIC COMPANY LIMITED'),
('00012', 'MISS', 'SU', 'CH', 'นางสาว', 'สุ', 'ศร', '2002-03-12', '2002-07-09', '0000-00-00', 5, 'P411', 1, '6850', 3, 1, 3, 0, 0, 0, 0, 1, 1, '0000000000', 'KASIKORNBANK PUBLIC COMPANY LIMITED'),
('00013', 'MISS', 'SU', 'CH', 'นางสาว', 'สุ', 'ศร', '2002-03-12', '2002-07-09', '0000-00-00', 5, 'P411', 1, '6850', 3, 1, 3, 0, 0, 0, 0, 1, 1, '0000000000', 'KASIKORNBANK PUBLIC COMPANY LIMITED'),
('00014', 'MISS', 'SU', 'CH', 'นางสาว', 'สุ', 'ศร', '2002-03-12', '2002-07-09', '0000-00-00', 5, 'P411', 1, '6850', 3, 1, 3, 0, 0, 0, 0, 1, 1, '0000000000', 'KASIKORNBANK PUBLIC COMPANY LIMITED'),
('00015', 'MISS', 'SU', 'CH', 'นางสาว', 'สุ', 'ศร', '2002-03-12', '2002-07-09', '0000-00-00', 5, 'P411', 1, '6850', 3, 1, 3, 0, 0, 0, 0, 1, 1, '0000000000', 'KASIKORNBANK PUBLIC COMPANY LIMITED'),
('00016', 'MISS', 'SU', 'CH', 'นางสาว', 'สุ', 'ศร', '2002-03-12', '2002-07-09', '0000-00-00', 5, 'P411', 1, '6850', 3, 1, 3, 0, 0, 0, 0, 1, 1, '0000000000', 'KASIKORNBANK PUBLIC COMPANY LIMITED'),
('00017', 'MISS', 'SU', 'CH', 'นางสาว', 'สุ', 'ศร', '2002-03-12', '2002-07-09', '0000-00-00', 5, 'P411', 1, '6850', 3, 1, 3, 0, 0, 0, 0, 1, 1, '0000000000', 'KASIKORNBANK PUBLIC COMPANY LIMITED'),
('00018', 'MISS', 'SU', 'CH', 'นางสาว', 'สุ', 'ศร', '2002-03-12', '2002-07-09', '0000-00-00', 5, 'P411', 1, '6850', 3, 1, 3, 0, 0, 0, 0, 1, 1, '0000000000', 'KASIKORNBANK PUBLIC COMPANY LIMITED'),
('00019', 'MISS', 'SU', 'CH', 'นางสาว', 'สุ', 'ศร', '2002-03-12', '2002-07-09', '0000-00-00', 5, 'P411', 1, '6850', 3, 1, 3, 0, 0, 0, 0, 1, 1, '0000000000', 'KASIKORNBANK PUBLIC COMPANY LIMITED'),
('00020', 'MISS', 'SU', 'CH', 'นางสาว', 'สุ', 'ศร', '2002-03-12', '2002-07-09', '0000-00-00', 5, 'P411', 1, '6850', 3, 1, 3, 0, 0, 0, 0, 1, 1, '0000000000', 'KASIKORNBANK PUBLIC COMPANY LIMITED'),
('00021', 'MISS', 'SU', 'CH', 'นางสาว', 'สุ', 'ศร', '2002-03-12', '2002-07-09', '0000-00-00', 5, 'P521', 1, '6850', 3, 1, 3, 0, 0, 0, 0, 1, 1, '0000000000', 'KASIKORNBANK PUBLIC COMPANY LIMITED'),
('00022', 'MISS', 'SU', 'CH', 'นางสาว', 'สุ', 'ศร', '2002-03-12', '2002-07-09', '0000-00-00', 5, 'P411', 1, '6850', 3, 1, 3, 0, 0, 0, 0, 1, 1, '0000000000', 'KASIKORNBANK PUBLIC COMPANY LIMITED'),
('00023', 'MISS', 'SU', 'CH', 'นางสาว', 'สุ', 'ศร', '2002-03-12', '2002-07-09', '0000-00-00', 5, 'P411', 1, '6850', 3, 1, 3, 0, 0, 0, 0, 1, 1, '0000000000', 'KASIKORNBANK PUBLIC COMPANY LIMITED'),
('00024', 'MISS', 'SU', 'CH', 'นางสาว', 'สุ', 'ศร', '2002-03-12', '2002-07-09', '0000-00-00', 5, 'P411', 1, '6850', 3, 1, 3, 0, 0, 0, 0, 1, 1, '0000000000', 'KASIKORNBANK PUBLIC COMPANY LIMITED'),
('00025', 'MISS', 'SU', 'CH', 'นางสาว', 'สุ', 'ศร', '2002-03-12', '2002-07-09', '0000-00-00', 5, 'P411', 1, '6850', 3, 1, 3, 0, 0, 0, 0, 1, 1, '0000000000', 'KASIKORNBANK PUBLIC COMPANY LIMITED'),
('00026', 'MISS', 'SU', 'CH', 'นางสาว', 'สุ', 'ศร', '2002-03-12', '2002-07-09', '0000-00-00', 5, 'P411', 1, '6850', 3, 1, 3, 0, 0, 0, 0, 1, 1, '0000000000', 'KASIKORNBANK PUBLIC COMPANY LIMITED'),
('00027', 'MISS', 'SU', 'CH', 'นางสาว', 'สุ', 'ศร', '2002-03-12', '2002-07-09', '0000-00-00', 5, 'P411', 1, '6850', 3, 1, 3, 0, 0, 0, 0, 1, 1, '0000000000', 'KASIKORNBANK PUBLIC COMPANY LIMITED'),
('00028', 'MISS', 'SU', 'CH', 'นางสาว', 'สุ', 'ศร', '2002-03-12', '2002-07-09', '0000-00-00', 5, 'P411', 1, '6850', 3, 1, 3, 0, 0, 0, 0, 1, 1, '0000000000', 'KASIKORNBANK PUBLIC COMPANY LIMITED'),
('00030', 'MISS', 'Hawaii', 'CH', 'นางสาว', 'สุ', 'ศร', '2002-03-12', '2002-07-09', '0000-00-00', 5, 'P411', 1, '6850', 3, 1, 3, 0, 0, 0, 0, 1, 1, '0000000000', 'KASIKORNBANK PUBLIC COMPANY LIMITED'),
('00031', 'MISS', 'Jirayu', 'CH', 'นางสาว', 'สุ', 'ศร', '2002-03-12', '2002-07-09', '0000-00-00', 5, 'P411', 1, '6850', 3, 1, 3, 0, 0, 0, 0, 1, 1, '0000000000', 'KASIKORNBANK PUBLIC COMPANY LIMITED'),
('00032', 'Mr.', 'Kunanya', 'Singmee', 'นาย', 'คุณัญญา', 'สิงห์มี', '2003-01-27', '2003-05-26', '0000-00-00', 5, 'P521', 1, '6140', 3, 1, 1, 0, 132, 32, 1, 1, 1, '0000000000', 'KASIKORNBANK PUBLIC COMPANY LIMITED'),
('00033', 'Mr.', 'Kunanyaaaa', 'Singmeeeeee', 'นาย', 'คุณัญญา', 'สิงห์มี', '2003-01-27', '2003-05-26', '0000-00-00', 2, 'P521', 1, '6140', 3, 1, 1, 0, 132, 32, 1, 1, 1, '0000000000', 'KASIKORNBANK PUBLIC COMPANY LIMITED'),
('00326', 'MR', 'Jirayut', 'Saifah', 'นาย', 'จิรายุส', 'สายฟ้า', '2002-03-12', '2002-07-09', '0000-00-00', 5, 'P411', 1, '6850', 3, 1, 3, 0, 0, 0, 0, 1, 1, '0000000000', 'KASIKORNBANK PUBLIC COMPANY LIMITED');

-- --------------------------------------------------------

--
-- Table structure for table `form_file`
--

CREATE TABLE `form_file` (
  `Form_file_ID` int(11) NOT NULL,
  `Form_ID` int(11) NOT NULL,
  `Layout_location` varchar(200) NOT NULL,
  `Plan_location` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `form_file`
--

INSERT INTO `form_file` (`Form_file_ID`, `Form_ID`, `Layout_location`, `Plan_location`) VALUES
(1, 1626704882, '1112.jpg', '1112.pdf');

-- --------------------------------------------------------

--
-- Table structure for table `group_secname`
--

CREATE TABLE `group_secname` (
  `Sectioncode` varchar(50) NOT NULL,
  `Department` varchar(200) DEFAULT NULL,
  `Section` varchar(200) DEFAULT NULL,
  `Subsection` varchar(200) DEFAULT NULL,
  `Process` varchar(200) DEFAULT NULL,
  `Type` varchar(50) DEFAULT NULL,
  `Group` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `group_secname`
--

INSERT INTO `group_secname` (`Sectioncode`, `Department`, `Section`, `Subsection`, `Process`, `Type`, `Group`) VALUES
('1111', 'No-Data', 'No-Data', 'No-Data', 'No-Data', 'No-Data', 'No-Data'),
('6001', 'Quality Assurance', '-', '-', '-', 'Indirect', ' -'),
('6010', 'Production', 'Production Common', '-', '-', 'Indirect', 'PDC'),
('6011', 'Labour Union', '-', '-', 'SGA', 'Admin', 'Union '),
('6050', '-', '-', '-', '-', 'Admin', ' -'),
('6100', '-', '-', '-', '-', 'Admin', ' -'),
('6110', 'Purchasing & Planning (GM)', '-', '-', '-', 'Admin', ' -'),
('6111', 'Accounting & Planning (GM)', '-', '-', '-', 'Admin', ' -'),
('6120', 'Accounting & Planning', 'Accounting', '-', 'Common', 'Admin', 'ACC'),
('6121', 'Accounting & Planning', 'Planning', '-', 'SDM', 'Admin', 'ACC'),
('6130', 'Purchasing', '-', '-', 'Common', 'Admin', 'PUR'),
('6131', 'Purchasing', '-', '-', 'SDM', 'Admin', 'PUR'),
('6132', 'Purchasing', '-', '-', 'Diesel', 'Admin', 'PUR'),
('6139', 'CORPS', '-', '-', '-', 'Admin', 'CORPS'),
('6140', 'Human Resources', 'Associate Relation', '-', '-', 'Admin', 'HR'),
('6144', 'General Affairs', 'Driver', '-', '-', 'Admin', 'GA'),
('6150', 'General Affairs', '-', '-', 'Common', 'Admin', 'GA'),
('6151', 'General Affairs', '-', '-', 'SDM', 'Admin', 'GA'),
('6154', 'General Affairs', '-', '-', 'SKD', 'Admin', 'GA'),
('6155', 'General Affairs', 'Environment & CSR', '-', 'Common', 'Admin', 'GA'),
('6160', 'Human Resources', 'Activity Development', '-', '-', 'Admin', 'HR'),
('6170', 'Human Resources', 'Recruitment & Selection', 'Recruitment & Selection', '-', 'Admin', 'HR'),
('6180', 'Human Resources', 'HR System', 'System Development', '-', 'Admin', 'HR'),
('6183', 'Human Resources', 'Payroll', '-', '-', 'Admin', 'HR'),
('6190', 'Human Resources', 'Skill & Mind Development', '-', '-', 'Admin', 'HR'),
('6200', '-', '-', '-', '-', 'Indirect', ' -'),
('6215', 'Production', 'Receiving center', '-', '-', 'Indirect', 'PDC'),
('6300', 'Production Engineering', 'Diesel PE', '-', 'Common', 'Indirect', 'PE'),
('6310', 'Production Engineering', 'Diesel PE', '-', 'HP3', 'Indirect', 'PE'),
('6311', 'Production', 'Diesel Factory 1', 'Production - HP5', 'HP5 Body tappet', 'Direct', 'Pump'),
('6312', 'Production', 'Diesel Factory 1', 'Production 2', 'HP5 Element Matching', 'Direct', 'Pump'),
('6320', 'Production Engineering', 'Diesel PE', '-', 'G2-Injector', 'Indirect', 'PE'),
('6330', 'Production Engineering', 'Diesel PE', 'Special Budget', 'Common Rail 78K & 92K Investment', 'Indirect', 'PE'),
('6340', 'Production', 'Diesel Factory 1', 'Production 2', 'Carry & Washing', 'Direct', 'Pump'),
('6341', 'Production', 'Diesel Factory 1', '-', 'Pregnant', 'Direct', 'Pump'),
('6342', 'Production', 'Diesel Factory 2', '-', 'Pregnant', 'Direct', 'INJ'),
('6343', 'Production', 'Gasoline Factory', '-', 'Pregnant', 'Direct', 'GDP'),
('6344', 'Production', 'Diesel Factory 1', 'Production 1', 'HP5 Assembling', 'Direct', 'Pump'),
('6345', 'Production', 'Diesel Factory 1', 'Production 1', 'HP5 Inspection', 'Direct', 'Pump'),
('6346', 'Production', 'Diesel Factory 1', 'Production - HP5', 'HP5 Housing', 'Direct', 'Pump'),
('6347', 'Production', 'Diesel Factory 1', 'Production - HP5', 'HP5 Cam shaft', 'Direct', 'Pump'),
('6348', 'Production', 'Diesel Factory 1', 'Production - HP5', 'HP5 Cylinder ', 'Direct', 'Pump'),
('6349', 'Production', 'Diesel Factory 1', 'Production - HP5', 'HP5 Plunger ', 'Direct', 'Pump'),
('6350', 'Production', 'Diesel Factory 1', 'Production 1', 'HP3 Assembling', 'Direct', 'Pump'),
('6351', 'Production', 'Diesel Factory 1', 'Production 1', 'HP3 Inspection', 'Direct', 'Pump'),
('6352', 'Production', 'Diesel Factory 1', 'Production 1', 'RC Assembling', 'Direct', 'Pump'),
('6353', 'Production', 'Diesel Factory 1', 'Production 1', 'SCV Assembling', 'Direct', 'Pump'),
('6355', 'Production', 'Diesel Factory 1', 'Production 2', 'HP3 Housing', 'Direct', 'Pump'),
('6356', 'Production', 'Diesel Factory 1', 'Production 2', 'RC ECM', 'Direct', 'Pump'),
('6357', 'Production', 'Diesel Factory 1', 'Production 2', 'HP3 Seat/Valve Suction Gringding', 'Direct', 'Pump'),
('6358', 'Production', 'Diesel Factory 1', 'Production 2', 'HP3 Seat/Valve Suction S/A', 'Direct', 'Pump'),
('6359', 'Production', 'Production Common', '-', 'DPD Measurement', 'Direct', 'PDC'),
('6360', 'Production', 'Diesel Factory 1', 'Production 2', 'HP3 Camshaft ', 'Direct', 'Pump'),
('6361', 'Production', 'Diesel Factory 1', 'Production 2', 'SCV Solenoid Cauking & SCV Molding', 'Direct', 'Pump'),
('6363', 'Production', 'Diesel Factory 1', 'Production 2', 'HP3 Element Matching', 'Direct', 'Pump'),
('6364', 'Production', 'Diesel Factory 1', 'Production 2', 'HP3 Ring Cam Grinding', 'Direct', 'Pump'),
('6366', 'Production', 'Diesel Factory 1', 'Production 2', 'SCV Housing Stator Wire Cutting & Horning', 'Direct', 'Pump'),
('6367', 'Production', 'Diesel Factory 1', 'Production 2', 'SCV Needle Grinding 1st & 2ND', 'Direct', 'Pump'),
('6368', 'Production', 'Diesel Factory 1', 'Production 2', 'HP3 Cylinder Grinding', 'Direct', 'Pump'),
('6369', 'Production', 'Diesel Factory 1', 'Production 2', 'HP3 Plunger Grinding 1st & 2nd', 'Direct', 'Pump'),
('6370', 'Production', 'Diesel Factory 2', 'Production 3', 'G2 INJ Assembling 1', 'Direct', 'INJ'),
('6371', 'Production', 'Diesel Factory 2', 'Production 3', 'G3 INJ Assembling 2', 'Direct', 'INJ'),
('6372', 'Production', 'Diesel Factory 2', 'Production 3', 'PRV? Assy', 'Direct', 'INJ'),
('6373', 'Production', 'Diesel Factory 1', 'Production 2', 'HP3 Cylinder rope lap', 'Direct', 'Pump'),
('6374', 'Production', 'Diesel Factory 2', 'Production 3', 'G3 INJ Inspection 2', 'Direct', 'INJ'),
('6375', 'Production', 'Production Common', '-', 'Suijun', 'Direct', 'PDC'),
('6376', 'Production', 'Diesel Factory 2', 'Production 3', 'G2 INJ Inspection 1 ', 'Direct', 'INJ'),
('6377', 'Production', 'Diesel Factory 1', 'Production 2', 'Rail Guide spring', 'Direct', 'Pump'),
('6380', 'Production', 'Diesel Factory 2', 'Production 4 - G2 & G3 ( COMMON)', 'G2 C INJ L/B Grinding', 'Direct', 'INJ'),
('6381', 'Production', 'Diesel Factory 2', 'Production 4 - G2 & G3 ( COMMON)', 'G2 C INJ L/B Horning', 'Direct', 'INJ'),
('6382', 'Production', 'Diesel Factory 2', 'Production 4 - G2 & G3 ( COMMON)', 'G2 C INJ Orifice Grinding', 'Direct', 'INJ'),
('6383', 'Production', 'Diesel Factory 2', 'Production 4 - G2 & G3 ( COMMON)', 'G2 C INJ Orifice IN', 'Direct', 'INJ'),
('6384', 'Production', 'Diesel Factory 2', 'Production 4 - G2 & G3 ( COMMON)', 'G2 C INJ Matching', 'Direct', 'INJ'),
('6385', 'Production', 'Diesel Factory 2', 'Production 4 - G2 & G3 ( COMMON)', 'G2 C INJ Piston Grinding', 'Direct', 'INJ'),
('6386', 'Production', 'Diesel Factory 2', 'Production 4 - G2 & G3 ( COMMON)', 'G2 C INJ Valve Grinding', 'Direct', 'INJ'),
('6387', 'Production', 'Diesel Factory 2', 'Production 4 - G2 & G3 ( COMMON)', 'G2 C INJ Orifice OUT', 'Direct', 'INJ'),
('6388', 'Production', 'Diesel Factory 2', 'Production 4 - G2', 'G2 C INJ Amature Grinding', 'Direct', 'INJ'),
('6390', 'Production', 'Diesel Factory 1', 'Staff', '-', 'Indirect', 'Pump'),
('6391', 'Production', 'Diesel Factory 2', 'Staff', '-', 'Indirect', 'INJ'),
('6392', 'Production', 'Diesel Factory 1', 'Production 2', 'RC Autofrettage', 'Direct', 'Pump'),
('6397', 'Production', 'Diesel Factory 2', 'Production 3', 'G4 INJ Assembling ', 'Direct', 'INJ'),
('6398', 'Production', 'Diesel Factory 2', 'Production 3', 'G4 INJ Inspection ', 'Direct', 'INJ'),
('6400', 'Production Engineering', 'Gasoline PE', '-', 'Common', 'Indirect', 'PE'),
('6410', 'Production Engineering', 'Gasoline PE', '-', 'UC-Injector', 'Indirect', 'PE'),
('6421', 'Production Engineering', 'Gasoline PE', '-', 'Gasoline Direct Pump', 'Indirect', 'PE'),
('6430', 'Production', 'Gasoline Factory', 'Staff', 'Gas PD (Staff) - Common', 'Indirect', 'UC'),
('6431', 'Production', 'Gasoline Factory', 'Staff', 'Gas PD (Staff) - UC', 'Indirect', 'UC'),
('6432', 'Production', 'Gasoline Factory', 'Staff', 'Gas PD (Staff) - GDP', 'Indirect', 'GDP'),
('6440', 'Production', 'Gasoline Factory', 'Production 5', 'UC Assembling (1st Line)', 'Direct', 'UC'),
('6441', 'Production', 'Gasoline Factory', 'Production 5', 'UC Assembling (2nd Line)', 'Direct', 'UC'),
('6442', 'Production', 'Gasoline Factory', 'Production 5', 'UC Needle Rough', 'Direct', 'UC'),
('6443', 'Production', 'Gasoline Factory', 'Production 5', 'UC Body Grinding', 'Direct', 'UC'),
('6444', 'Production', 'Gasoline Factory', 'Production 5', 'UC Pipe Grinding', 'Direct', 'UC'),
('6445', 'Production', 'Gasoline Factory', 'Production 5', 'UC Connector Grinding', 'Direct', 'UC'),
('6446', 'Production', 'Gasoline Factory', 'Production 5', 'UC Needle Finished', 'Direct', 'UC'),
('6450', 'Production', 'Production Common', '-', 'GDP Measurement', 'Direct', 'PDC'),
('6451', 'Production', 'Gasoline Factory', 'Production - GDP', 'GDP Assembling', 'Direct', 'GDP'),
('6452', 'Production', 'Gasoline Factory', 'ASSY', 'GDP Inspection', 'Direct', 'GDP'),
('6453', 'Production', 'Gasoline Factory', 'Machining', 'GDP Head 3W', 'Direct', 'GDP'),
('6454', 'Production', 'Gasoline Factory', 'Machining', 'GDP Plunger Grinding', 'Direct', 'GDP'),
('6455', 'Production', 'Gasoline Factory', 'Machining', 'GDP Delivery Valve Grinding', 'Direct', 'GDP'),
('6456', 'Production', 'Gasoline Factory', 'Machining', 'GDP Suction Valve Grinding', 'Direct', 'GDP'),
('6457', 'Production', 'Gasoline Factory', 'Machining ', 'GDP Relief Valve Grinding', 'Direct', 'GDP'),
('6458', 'Production', 'Gasoline Factory', 'Machining', 'GDP Connector Sub Assy', 'Direct', 'GDP'),
('6459', 'Production', 'Gasoline Factory', 'Machining', 'GDP Armature Grinding', 'Direct', 'GDP'),
('6460', 'Production', 'Gasoline Factory', 'Machining', 'GDP Rod Armature Grinding', 'Direct', 'GDP'),
('6461', 'Production', 'Gasoline Factory', 'Machining', 'GDP Guide Armature Grinding', 'Direct', 'GDP'),
('6462', 'Production', 'Gasoline Factory', 'Machining', 'GDP Stator Grinding', 'Direct', 'GDP'),
('6463', 'Production', 'Gasoline Factory', 'Machining', 'GDP Element Sub Assy', 'Direct', 'GDP'),
('6464', 'Production', 'Gasoline Factory', 'Machining', 'GDP Head Grinding', 'Direct', 'GDP'),
('6465', 'Production', 'Gasoline Factory', 'Machining', 'GDP Plunger Lapping', 'Direct', 'GDP'),
('6466', 'Production', 'Gasoline Factory', 'ASSY', 'GDP Washing', 'Direct', 'GDP'),
('6467', 'Production', 'Gasoline Factory', 'ASSY', 'GDP Solenoid Assy', 'Direct', 'GDP'),
('6468', 'Production', 'Gasoline Factory', 'ASSY', 'GDP Coating', 'Direct', 'GDP'),
('6469', 'Production', 'Gasoline Factory', 'ASSY', 'GDP After coating', 'Direct', 'GDP'),
('6500', 'Quality Assurance', 'Quality Assurance', '-', 'Planning', 'Indirect', 'QA'),
('6501', 'Quality Assurance', 'Quality Assurance', '-', 'BKD Group & Audit Cleanliness', 'Indirect', 'QA'),
('6502', 'Quality Assurance', 'Quality Assurance', '-', 'Diesel', 'Indirect', 'QA'),
('6503', 'Quality Assurance', 'Quality Assurance', '-', 'Gasoline', 'Indirect', 'QA'),
('6504', 'Quality Assurance', 'Quality Assurance', '-', 'SKD', 'Indirect', 'QA'),
('6505', 'Quality Assurance', 'Quality Assurance', '-', 'Common (Gasoline + SKD)', 'Indirect', 'QA'),
('6507', 'Quality Assurance', 'Quality Assurance', '-', 'GDP', 'Indirect', 'QA'),
('6510', 'Quality Assurance', 'Products Inspection', '-', 'Common', 'Indirect', 'QA'),
('6512', 'Quality Assurance', 'Products Inspection', '-', 'Diesel', 'Direct', 'QA'),
('6513', 'Quality Assurance', 'Products Inspection', '-', 'Gasoline', 'Direct', 'QA'),
('6514', 'Quality Assurance', 'Products Inspection', '-', 'SKD', 'Direct', 'QA'),
('6520', 'Quality Assurance', 'Parts Inspection', '-', 'Common', 'Indirect', 'PI'),
('6522', 'Quality Assurance', 'Parts Inspection', '-', 'Diesel', 'Direct', 'PI'),
('6524', 'Quality Assurance', 'Parts Inspection', '-', 'SKD', 'Direct', ' -'),
('6525', 'Quality Assurance', 'Parts Inspection', '-', 'Common (Gasoline + SKD)', 'Direct', 'PI'),
('6532', 'Quality Assurance', 'Parts Inspection', 'Supplier NG', 'Diesel', 'Direct', 'PI'),
('6534', 'Quality Assurance', 'Parts Inspection', '-', 'GDP', 'Direct', 'PI'),
('6600', 'Production Control', '-', 'Production & Parts scheduling', 'Common', 'Indirect', 'PC'),
('6601', 'Production Control', '-', 'Production & Parts scheduling', 'SDM', 'Indirect', 'PC'),
('6602', 'Production Control', '-', 'Production & Parts scheduling', 'SDM', 'Indirect', 'PC'),
('6603', 'Production Control', '-', 'Production & Parts scheduling', 'SDM', 'Indirect', 'PC'),
('6604', 'Production Control', '-', 'Production & Parts scheduling', 'SKD', 'Indirect', 'PC'),
('6610', 'Production Control', '-', 'Logistics & Kaizen', 'Common', 'Direct', 'PC'),
('6620', 'Production Control', '-', 'Material Control', 'Common', 'Direct', 'PC'),
('6630', 'Production Control', '-', 'Packaging', 'Common', 'Direct', 'PC'),
('6640', 'Production Control', '-', 'Shipping Control', 'Common', 'Direct', 'PC'),
('6700', 'TIE', '-', '-', 'Common', 'Indirect', 'TIE'),
('6701', 'TIE', '-', '-', 'KAIZEN', 'Indirect', 'TIE'),
('6702', 'TIE', '-', '-', 'G2 INJ', 'Indirect', 'TIE'),
('6705', 'TIE', '-', '-', 'Washing', 'Indirect', 'TIE'),
('6707', 'TIE', '-', '-', 'GDP', 'Indirect', 'TIE'),
('6708', 'TIE', '-', '-', 'SKD Gasoline', 'Indirect', 'TIE'),
('6709', 'TIE', '-', '-', 'Logistic', 'Indirect', 'TIE'),
('6717', 'TIE', '-', '-', 'G4 INJ', 'Indirect', 'TIE'),
('6720', 'Safety & Environment', '-', '-', '-', 'Admin', 'SE'),
('6800', 'Maintenance Center', 'Maintenance', 'Diesel', 'Common', 'Indirect', 'MC'),
('6830', 'Maintenance Center', 'Facility', '-', 'Common', 'Indirect', 'MC'),
('6840', 'Maintenance Center', 'Tool Room', '-', 'Common', 'Indirect', 'MC'),
('6850', 'Maintenance Center', 'Common', '-', 'Common', 'Indirect', 'MC'),
('6860', 'Maintenance Center', 'Jig Shop', '-', 'Common', 'Indirect', 'MC'),
('6870', 'Maintenance Center', 'KAIZEN', '-', 'Common', 'Indirect', 'MC'),
('6880', 'Maintenance Center', 'TPM', '-', 'Common', 'Indirect', 'MC'),
('6911', 'Production', 'Diesel Factory 2', 'Production 4 - G3', 'G3 INJ Armature Grinding', 'Direct', 'INJ'),
('6922', 'Production', 'Diesel Factory 2', 'Production 4 - G2', 'G2 INJ Armature Grinding', 'Direct', 'INJ'),
('6924', 'Production', 'Diesel Factory 2', 'Production 4 - G4', 'G4 INJ Lower body ECM', 'Direct', 'INJ'),
('6925', 'Production', 'Diesel Factory 2', 'Production 4 - G4', 'G4 INJ Lower body Grinding', 'Direct', 'INJ'),
('6926', 'Production', 'Diesel Factory 2', 'Production 4 - G4', 'G4 INJ Orifice Grinding', 'Direct', 'INJ'),
('6927', 'Production', 'Diesel Factory 2', 'Production 4 - G4', 'G4 INJ Orifice IN', 'Direct', 'INJ'),
('6928', 'Production', 'Diesel Factory 2', 'Production 4 - G4', 'G4 INJ Orifice Cutting', 'Direct', 'INJ'),
('6929', 'Production', 'Diesel Factory 2', 'Production 4 - G4', 'G4 INJ Valve Grinding', 'Direct', 'INJ'),
('6930', 'Production', 'Diesel Factory 2', 'Production 4 - G4', 'G4 INJ Armature Grinding', 'Direct', 'INJ'),
('6931', 'Production', 'Diesel Factory 2', 'Production 2 - G4', 'G4 INJ Orifice Lapping', 'Direct', 'INJ'),
('6939', 'Production', 'Diesel Factory 2', 'Production 4 - G4', 'G4 INJ Control Plate Grinding', 'Direct', 'INJ'),
('6940', 'Production', 'Diesel Factory 2', 'Production 4 - G4', 'G4 INJ Control Plate AFM', 'Direct', 'INJ'),
('6950', 'Production', 'Diesel Factory 1', 'Production - HP5', 'HP5 Cylinder Blind Hole ECM', 'Direct', 'Pump'),
('6951', 'Production', 'Diesel Factory 1', 'Production - HP5', 'HP5 Cylinder Close Hole Peening', 'Direct', 'Pump'),
('6952', 'Production', 'Diesel Factory 1', 'Production - HP5', 'HP5 Shoe Grinding', 'Direct', 'Pump'),
('6953', 'Production', 'Diesel Factory 1', 'Production - HP5', 'HP5 Roller Grinding', 'Direct', 'Pump'),
('6960', 'Production', 'Diesel Factory 2', 'Production 4 - G2,G3&G4 (COMMON)', 'Carry & Washing', 'Direct', 'INJ'),
('7820', 'Production', 'PD Common', '-', '-', 'Indirect', 'PDC'),
('7821', 'Manufacturing  Specialist', 'MS Common', '-', '-', 'Indirect', 'MS'),
('7822', 'Production Engineering', 'PE.Machinery', '-', '-', 'Indirect', 'PE'),
('7903', 'Corporate Planning', 'Corporate Planning', '-', '-', 'Admin', 'CP'),
('7904', 'Corporate Planning', 'Genernal Manufacturing', '-', '-', 'Admin', 'GM'),
('7910', 'Production Engineering', 'PE Common', '-', '-', 'Indirect', 'PE'),
('7911', 'Production Engineering', 'PE.Fuel Filter', '-', '-', 'Indirect', 'PE'),
('7933', 'Corporate Planning', 'Purchasing', '-', 'Common', 'Admin', 'PUR'),
('7940', 'Production Engineering', 'PE.Diesel', '-', '-', 'Indirect', 'PE'),
('7951', 'Production', 'PD.Fuel Filter ', 'Fuel Filter Common ', '-', 'Indirect', 'FF'),
('7952', 'Production', 'PD.Diesel-1', 'Diesel-1 Common', '-', 'Indirect', 'Sol'),
('7953', 'Production', 'PD.Diesel-2 ', 'Diesel-2 Common', '-', 'Indirect', 'SCV'),
('7954', 'Manufacturing  Specialist', 'Productivity Specialist', '-', '-', 'Indirect', 'MS'),
('7955', 'Manufacturing  Specialist', 'Quality specialist', '-', '-', 'Indirect', 'MS'),
('7956', 'Production', 'Measurement', '-', '-', 'Indirect', 'PD'),
('7957', 'Manufacturing  Specialist', 'PD.Maintenance ', '-', '-', 'Indirect', 'MC'),
('7958', 'Production', 'RELIEF MAN', '-', '-', 'Indirect', 'RELIEF MAN'),
('7960', 'Production', 'PD.FF', 'SIFS', 'SIFS Assy', 'Direct', 'FF'),
('7961', 'Production', 'PD.FF', 'SIFS', 'SIFS Pump Unit', 'Direct', 'FF'),
('7962', 'Production', 'PD.FF', 'SIFS', 'SIFS Fulter Assy', 'Direct', 'FF'),
('7963', 'Production', 'PD.FF', 'SIFS', 'SIFS Suction Filter', 'Direct', 'FF'),
('7965', 'Production', 'PD.FF', 'SIFS', 'SIFS Motorcycle', 'Direct', 'FF'),
('7970', 'Production', 'PD.FF', 'DF', 'DF Assy', 'Direct', 'FF'),
('7971', 'Production', 'PD.FF', 'DF', 'Element', 'Direct', 'FF'),
('7972', 'Production', 'PD.FF', 'DF', 'Element S/A', 'Direct', 'FF'),
('7980', 'Production', 'PD.Diesel-1', 'Solenoid', 'Assy', 'Direct', 'Sol'),
('7982', 'Production', 'PD.Diesel-1', 'Solenoid', 'Kako', 'Direct', 'Sol'),
('7983', 'Production', 'PD.Diesel-2', 'SCV', 'Assy', 'Direct', 'SCV'),
('7984', 'Production', 'PD.Diesel-2', 'SCV', 'Kako', 'Direct', 'SCV'),
('7985', 'Production', 'PD.Diesel-2', 'PCV', 'PCV', 'Direct', 'PCV'),
('7986', 'Production', 'PD.Diesel-2', 'PRV', 'PRV', 'Direct', 'PRV'),
('7987', 'Production', 'PD.Diesel-2', 'PCV,PRV Common', 'Common for PCV,PRV', 'Direct', 'PCV,PRV'),
('7988', 'Production', 'PD.Diesel-1', 'G4', 'G4', 'Direct', 'G4');

-- --------------------------------------------------------

--
-- Table structure for table `plant`
--

CREATE TABLE `plant` (
  `Plant_ID` int(11) NOT NULL,
  `Emp_ID` varchar(11) NOT NULL,
  `Plant_name` varchar(200) NOT NULL,
  `Plant_No` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `plant`
--

INSERT INTO `plant` (`Plant_ID`, `Emp_ID`, `Plant_name`, `Plant_No`) VALUES
(1, '00033', 'All Area Approved ', 1),
(2, '00031', 'Admin area Approved ', 2);

-- --------------------------------------------------------

--
-- Table structure for table `position`
--

CREATE TABLE `position` (
  `Num` int(11) NOT NULL,
  `Position_ID` varchar(50) NOT NULL COMMENT 'ลำดับ',
  `Position_name` varchar(100) NOT NULL COMMENT 'ชื่อตำแหน่ง',
  `Position_Level` varchar(100) NOT NULL COMMENT 'แบ่งเลเว่ลเฉยๆ',
  `Pos_shortName` varchar(50) DEFAULT NULL,
  `Pos_for_yos_tab` varchar(50) DEFAULT NULL,
  `position_level_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `position`
--

INSERT INTO `position` (`Num`, `Position_ID`, `Position_name`, `Position_Level`, `Pos_shortName`, `Pos_for_yos_tab`, `position_level_id`) VALUES
(53, 'B001', 'No-Data', '0', 'null', NULL, 6),
(1, 'P101', 'President', '12', 'President', NULL, 6),
(2, 'P102', 'Managing Director', '12', 'MD', NULL, 6),
(3, 'P111', 'Vice President', '11', 'VP', NULL, 6),
(4, 'P112', 'Senior Executive director', '11', 'Sr.ED', NULL, 6),
(5, 'P201', 'Executive director', '10', 'ED', NULL, 6),
(6, 'P211', 'Associate Director', '9', 'AD', NULL, 6),
(7, 'P221', 'Acting Associate Director', '8', 'Acting AD', NULL, 6),
(8, 'P231', 'General Manager', '8', 'GM', 'pos35', 1),
(9, 'P232', 'Senior Advisor', '8', 'Sr.Adv', 'pos36', 1),
(10, 'P233', 'Senior Expert', '8', 'Sr.Exp', 'pos37', 1),
(11, 'P241', 'Acting General Manager', '7', 'Acting GM', 'pos33', 1),
(12, 'P242', 'Acting Senior Expert', '7', 'Acting Sr.Expert', 'pos34', 1),
(13, 'P251', 'Assistant General Manager', '7', 'AGM', 'pos33', 1),
(14, 'P252', 'Advisor', '7', 'Adv', 'pos31', 1),
(15, 'P253', 'Expert', '7', 'Exp', 'pos32', 1),
(16, 'P301', 'Acting Assistant General Manager', '6', 'Acting AGM', 'pos28', 2),
(17, 'P302', 'Acting Expert', '6', 'Acting Exp', 'pos29', 2),
(18, 'P311', 'Manager', '6', 'MN', 'pos25', 2),
(19, 'P312', 'Senior Master', '6', 'Sr.Master', 'pos26', 2),
(20, 'P313', 'Senior Master-Interpreting', '6', 'Sr.Master-Int', 'pos27', 2),
(21, 'P401', 'Acting Manager', '5', 'Acting MN', 'pos22', 2),
(22, 'P402', 'Acting Senior Master', '5', 'Acting Sr.Master', 'pos23', 2),
(23, 'P403', 'Acting Senior Master-Interpreting', '5', 'Acting Sr.Master-Int', 'pos24', 2),
(24, 'P411', 'Assistant Manager', '5', 'AM', 'pos19', 3),
(25, 'P412', 'Master', '5', 'Master', 'pos20', 3),
(26, 'P413', 'Master-Interpreting', '5', 'Master-Int', 'pos21', 3),
(27, 'P501', 'Acting Assistant Manager', '4', 'Acting AM', 'pos16', 3),
(28, 'P502', 'Acting Master', '4', 'Acting Master', 'pos17', 3),
(29, 'P503', 'Acting Master-Interpreting', '4', 'Acting Master-Int', 'pos18', 3),
(30, 'P511', 'Senior Staff', '4', 'Sr.ST', 'pos13', 3),
(31, 'P512', 'Supervisor', '4', 'SV', 'pos12', 3),
(32, 'P513', 'Senior Specialist', '4', 'Sr.SP', 'pos14', 3),
(33, 'P514', 'Senior Specialist-Interpreting', '4', 'Sr.SP-Int', 'pos15', 3),
(34, 'P521', 'Staff', '3', 'ST', 'pos9', 4),
(35, 'P522', 'Team Leader', '3', 'TL', 'pos8', 4),
(36, 'P523', 'Specialist', '3', 'SP', 'pos10', 4),
(37, 'P524', 'Specialist-Interpreting', '3', 'SP-Int', 'pos11', 4),
(38, 'P601', 'Officer', '2', 'OF', 'pos6', 5),
(39, 'P602', 'Junior Specialist', '2', 'Jr.SP', 'pos7', 5),
(41, 'P611', 'Team Associate 3', '2', 'TA3', 'pos5', 5),
(42, 'P612', 'Team Associate 2', '2', 'TA2', 'pos4', 5),
(43, 'P613', 'Team Associate 1', '2', 'TA1', 'pos3', 5),
(44, 'P621', 'Operational Associate 2', '1', 'OA2', 'pos2', 5),
(45, 'P622', 'Operational Associate 1', '1', 'OA1', 'pos1', 5),
(46, 'P623', 'Driver', '1', 'DR', NULL, 5),
(48, 'T521', 'Temporary Staff', '0', 'Temp ST', NULL, 6),
(49, 'T524', 'Temporary Specialist-Interpreting', '0', 'Temp SP-Int', NULL, 6),
(54, 'T525', 'Temporary Specialist', '0', 'Temp SP', NULL, 6),
(50, 'T601', 'Temporary Officer', '0', 'Temp OF', NULL, 6),
(47, 'T623', 'Temporary Driver', '0', 'Temp DR', NULL, 6),
(48, 'TN01', 'Trainee', '0', 'Trainee', NULL, 6);

-- --------------------------------------------------------

--
-- Table structure for table `position_level`
--

CREATE TABLE `position_level` (
  `psl_id` int(11) NOT NULL,
  `psl_position_level` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `position_level`
--

INSERT INTO `position_level` (`psl_id`, `psl_position_level`) VALUES
(1, 'Top management level'),
(2, 'Middle management level'),
(3, 'Junior management level'),
(4, 'Staff level'),
(5, 'Officer level'),
(6, 'Orther');

-- --------------------------------------------------------

--
-- Table structure for table `requested_form`
--

CREATE TABLE `requested_form` (
  `Form_ID` int(11) NOT NULL,
  `Emp_ID` int(11) NOT NULL,
  `HR_ID` varchar(20) NOT NULL,
  `Start_date` date NOT NULL,
  `End_date` date NOT NULL,
  `Item` varchar(250) NOT NULL,
  `Officer` varchar(250) NOT NULL,
  `Tell` varchar(15) NOT NULL,
  `Approve_date` date NOT NULL,
  `Requested_date` date NOT NULL,
  `Status` int(11) NOT NULL,
  `Reason` varchar(300) NOT NULL,
  `Supervisor` varchar(250) NOT NULL,
  `Company_ID` int(11) NOT NULL,
  `Approve_Plant` varchar(10) NOT NULL,
  `Form_count` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `requested_form`
--

INSERT INTO `requested_form` (`Form_ID`, `Emp_ID`, `HR_ID`, `Start_date`, `End_date`, `Item`, `Officer`, `Tell`, `Approve_date`, `Requested_date`, `Status`, `Reason`, `Supervisor`, `Company_ID`, `Approve_Plant`, `Form_count`) VALUES
(1626704882, 326, '', '2021-07-19', '2021-07-25', 'หัวฉีดน้ำมัน', 'จิรายุส สายฟ้า', '0838535995', '0000-00-00', '2021-07-19', 0, 'รอการขนส่ง', '00326', 1, '00033', 1);

-- --------------------------------------------------------

--
-- Table structure for table `sectioncode`
--

CREATE TABLE `sectioncode` (
  `Sectioncode` varchar(50) NOT NULL COMMENT 'รหัส section code',
  `Department` varchar(100) DEFAULT NULL COMMENT 'ชื่อแผนก',
  `Sec_desc` varchar(100) DEFAULT NULL,
  `Type_ID` int(3) DEFAULT NULL COMMENT 'ไอดีของประเภทพนักงาน',
  `group_id` int(3) DEFAULT NULL,
  `dev_id` int(11) DEFAULT NULL,
  `role_dv` int(11) DEFAULT NULL,
  `dep_id` int(11) DEFAULT NULL,
  `ev_group` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `sectioncode`
--

INSERT INTO `sectioncode` (`Sectioncode`, `Department`, `Sec_desc`, `Type_ID`, `group_id`, `dev_id`, `role_dv`, `dep_id`, `ev_group`) VALUES
('1111', 'none', 'none', NULL, NULL, NULL, NULL, NULL, 0),
('6001', 'Vice President', 'SED OF QA (INOUE)', NULL, 15, 0, 3, 0, 0),
('6010', 'Production', 'PROD COMMON 6010', 3, 28, 2, NULL, 1, 10),
('6011', 'Labour Union', 'LABOUR UNION', 1, 18, 1, NULL, 2, 18),
('6050', 'President', 'PRESIDENT OF SDM (NAKAMURA)', 1, 28, 0, 0, 0, 0),
('6100', 'Vice President', 'VP OF ADMINISTRATION (HIRATANI)', 1, 6, 0, 1, 0, 0),
('6110', 'Purchasing & Planning (GM)', 'Purchasing & Planning (GM)', 1, 14, 0, NULL, 4, 0),
('6111', 'Accounting & Planning (GM)', 'AD OF ADMINISTRATION (MINETOMA)', 1, 1, 1, 1, 4, 0),
('6120', 'Accounting & Planning', 'ACCOUNING & PLANNING COMMON', 1, 1, 1, NULL, 3, 1),
('6121', 'Accounting & Planning', 'ACCOUNING & PLANNING SDM', 1, 1, 1, NULL, 3, 1),
('6130', 'Purchasing', 'PURCHASING COMMON', 1, 30, 1, NULL, 4, 14),
('6131', 'Purchasing', 'PURCHASING SDM', 1, 30, 1, NULL, 4, 14),
('6132', 'Purchasing', 'PURCHASING DIESEL', 1, 30, 1, NULL, 4, 14),
('6139', 'CORPS', 'CORPS DT PRO', 1, 2, 1, NULL, 5, 2),
('6140', 'Human Resources', 'HR ASSOCIATE RELATION COMMON', 1, 6, 1, NULL, 6, 6),
('6144', 'General Affairs', 'General Affairs', 1, 4, 1, NULL, 7, 4),
('6150', 'General Affairs', 'GENERAL AFFAIR COMMON', 1, 4, 1, NULL, 7, 4),
('6151', 'General Affairs', 'GENERAL AFFAIR SDM', 1, 4, 1, NULL, 7, 4),
('6154', 'General Affairs', 'GENERAL AFFAIR SKD', 1, 4, 1, NULL, 7, 4),
('6155', 'General Affairs', 'GA ENVIRONMENTAL CONTROL COMMON', 1, 4, 1, NULL, 7, 4),
('6160', 'Human Resources', 'HR ACTIVITY DEVELOPMENT COMMON', 1, 6, 1, NULL, 6, 6),
('6170', 'Human Resources', 'HR RECRUITMENT & SELECTION COMMON', 1, 6, 1, NULL, 6, 6),
('6180', 'Human Resources', 'HR SYSTEM DEVELOPMENT COMMON', 1, 6, 1, NULL, 6, 6),
('6183', 'Human Resources', 'HR COMPENSATION & BENEFITS COMMON', 1, 6, 1, NULL, 6, 6),
('6190', 'Human Resources', 'HR SKILL&MIND DEVELOPMENT COMMON', 1, 6, 1, NULL, 6, 6),
('6200', 'Vice President', 'SED OF MANUFACTURING (KOBAYASHI)', 1, 28, 0, 2, 0, 0),
('6215', 'Production', 'RECEIVING CENTER', 3, 28, 2, NULL, 1, 10),
('6300', 'Production Engineering', 'DIE PE COMMON', 3, 11, 2, NULL, 8, 11),
('6310', 'Production Engineering', 'DIE PE HP3', 3, 11, 2, NULL, 8, 11),
('6311', 'Production', 'HP5 BODY TAPPET', 2, 13, 2, NULL, 1, 13),
('6312', 'Production', 'HP5 ELEMENT MATCHING', 2, 13, 2, NULL, 1, 13),
('6320', 'Production Engineering', 'DIE PE G2', 3, 11, 2, NULL, 8, 11),
('6330', 'Production Engineering', 'DIE PE RC', 3, 11, 2, NULL, 8, 11),
('6340', 'Production', 'DIE PD F1 P2 WASHING', 2, 13, 2, NULL, 1, 13),
('6341', 'Production', 'DIE PD F1 P2 PREGNANT', 2, 28, 2, NULL, 1, 10),
('6342', 'Production', 'DIE PD F2 P4 G2C PREGNANT', 2, 28, 2, NULL, 1, 10),
('6343', 'Production', 'GAS PD P6 PREGNANT', 2, 28, 2, NULL, 1, 10),
('6344', 'Production', 'HP5 ASSEMBLING', 2, 13, 2, NULL, 1, 13),
('6345', 'Production', 'HP5 INSPECTION', 2, 13, 2, NULL, 1, 13),
('6346', 'Production', 'HP5 HOUSING', 2, 13, 2, NULL, 1, 13),
('6347', 'Production', 'HP5 CAM SHAFT', 2, 13, 2, NULL, 1, 13),
('6348', 'Production', 'HP5 CYLINDER ', 2, 13, 2, NULL, 1, 13),
('6349', 'Production', 'HP5 PLUNGER', 2, 13, 2, NULL, 1, 13),
('6350', 'Production', 'DIE PD F1 P1 HP3 ASSY', 2, 13, 2, NULL, 1, 13),
('6351', 'Production', 'DIE PD F1 P1 HP3 INS', 2, 13, 2, NULL, 1, 13),
('6352', 'Production', 'DIE PD F1 P1 RC ASSY', 2, 13, 2, NULL, 1, 13),
('6353', 'Production', 'DIE PD F1 P1 SCV ASSY', 2, 13, 2, NULL, 1, 13),
('6355', 'Production', 'DIE PD F1 P2 HP3 HOUSING', 2, 13, 2, NULL, 1, 13),
('6356', 'Production', 'DIE PD F1 P2 RC ECM', 2, 13, 2, NULL, 1, 13),
('6357', 'Production', 'DIE PDF1 P2 HP3 SEAT/VAL', 2, 13, 2, NULL, 1, 13),
('6358', 'Production', 'DIE PD F1 P2 HP3 SEAT/VAL', 2, 13, 2, NULL, 1, 13),
('6359', 'Production', 'DIE PD F1 P2 HP3 MEASUREM', 2, 28, 2, NULL, 1, 10),
('6360', 'Production', 'DIE PD F1 P2 HP3 CAMSHAFT', 2, 13, 2, NULL, 1, 13),
('6361', 'Production', 'DIE PD F1 P2 SCV CAUKING & SCV MOLDING', 2, 13, 2, NULL, 1, 13),
('6363', 'Production', 'DIE PD F1 P2 HP3 ELEMENT', 2, 13, 2, NULL, 1, 13),
('6364', 'Production', 'DIE PD F1 P2 HP3 RING CAM', 2, 13, 2, NULL, 1, 13),
('6366', 'Production', 'DIE PD F1 P2 SCV HOUSING', 2, 13, 2, NULL, 1, 13),
('6367', 'Production', 'DIE PD F1 P2 SCV NEEDLE', 2, 13, 2, NULL, 1, 13),
('6368', 'Production', 'DIE PD F1 P2 HP3 CYLINDER', 2, 13, 2, NULL, 1, 13),
('6369', 'Production', 'DIE PD F1 P2 HP3 PLUNGER', 2, 13, 2, NULL, 1, 13),
('6370', 'Production', 'DIE PD F2 P3 G2 ASSY1', 2, 7, 2, NULL, 1, 7),
('6371', 'Production', 'DIE PD F2 P3 G3 ASSY2', 2, 7, 2, NULL, 1, 7),
('6372', 'Production', 'DIE PD F2 P3 PRV? ASSY', 2, 7, 2, NULL, 1, 7),
('6373', 'Production', 'DIE PD F1 P2 HP3 CYLINDER ROPE LAP', 2, 13, 2, NULL, 1, 13),
('6374', 'Production', 'DIE PD F2 P3 G3 INS2', 2, 7, 2, NULL, 1, 7),
('6375', 'Production', 'DIE PD F2 P3 INJ SUIJUN', 2, 28, 2, NULL, 1, 10),
('6376', 'Production', 'DIE PD F2 P3 G2 INS1', 2, 7, 2, NULL, 1, 7),
('6377', 'Production', 'DIE PD F1 P2 RC GUIDE SPRING', 2, 13, 2, NULL, 1, 13),
('6380', 'Production', 'DIE PD F2 P4 G2C L/B GRINDING', 2, 7, 2, NULL, 1, 7),
('6381', 'Production', 'DIE PD F2 P4 G2C L/B HORNING', 2, 7, 2, NULL, 1, 7),
('6382', 'Production', 'DIE PD F2 P4 G2C ORIFICE GR', 2, 7, 2, NULL, 1, 7),
('6383', 'Production', 'DIE PD F2 P4 G2C ORIFICE IN', 2, 7, 2, NULL, 1, 7),
('6384', 'Production', 'DIE PD F2 P4 G2C MATCHING', 2, 7, 2, NULL, 1, 7),
('6385', 'Production', 'DIE PD F2 P4 G2C PISTON GR', 2, 7, 2, NULL, 1, 7),
('6386', 'Production', 'DIE PD F2 P4 G2C VALVE GR', 2, 7, 2, NULL, 1, 7),
('6387', 'Production', 'DIE PD F2 P4 G2C ORIFICE OUT', 2, 7, 2, NULL, 1, 7),
('6388', 'Production', 'DIE PD F2 P4 G2C AMATURE GR', 2, 7, 2, NULL, 1, 7),
('6390', 'Production', 'DIE PD F1 STAFF', 3, 13, 2, NULL, 1, 13),
('6391', 'Production', 'DIE PD F2 STAFF', 3, 7, 2, NULL, 1, 7),
('6392', 'Production', 'DIE PD F1 P2 RC AUTOFRETTAGE', 2, 13, 2, NULL, 1, 13),
('6397', 'Production', 'DIE PD F2 P3 G4 ASSY', 2, 7, 2, NULL, 1, 7),
('6398', 'Production', 'DIE PD F2 P3 G4 INS', 2, 7, 2, NULL, 1, 7),
('6400', 'Production Engineering', 'GAS PE COMMON', 3, 11, 2, NULL, 8, 11),
('6410', 'Production Engineering', 'GAS PE UC', 3, 11, 2, NULL, 8, 11),
('6421', 'Production Engineering', 'GAS PE GDP', 3, 11, 2, NULL, 8, 11),
('6430', 'Production', 'GAS PD (STAFF) - COMMON', 3, 17, 2, NULL, 1, 17),
('6431', 'Production', 'GAS PD (STAFF) - UC', 3, 17, 2, NULL, 1, 17),
('6432', 'Production', 'GAS PD (STAFF) - GDP', 3, 5, 2, NULL, 1, 5),
('6440', 'Production', 'GAS PD P5 ASSY UC 1ST LINE', 2, 17, 2, NULL, 1, 17),
('6441', 'Production', 'GAS PD P6 ASSY UC 2ND LINE', 2, 17, 2, NULL, 1, 17),
('6442', 'Production', 'UC NEEDLE ROUGH', 2, 17, 2, NULL, 1, 17),
('6443', 'Production', 'UC BODY GRINDING', 2, 17, 2, NULL, 1, 17),
('6444', 'Production', 'UC PIPE GRINDING', 2, 17, 2, NULL, 1, 17),
('6445', 'Production', 'UC CONNECTOR GRINDING', 2, 17, 2, NULL, 1, 17),
('6446', 'Production', 'UC NEEDLE FINISHED', 2, 17, 2, NULL, 1, 17),
('6450', 'Production', 'GAS MEASUREMENT', 2, 28, 2, NULL, 1, 10),
('6451', 'Production', 'GDP ASSEMBLING', 2, 5, 2, NULL, 1, 5),
('6452', 'Production', 'GDP INSPECTION', 2, 5, 2, NULL, 1, 5),
('6453', 'Production', 'GDP HEAD 3W', 2, 5, 2, NULL, 1, 5),
('6454', 'Production', 'GDP PLUNGER GRINDING', 2, 5, 2, NULL, 1, 5),
('6455', 'Production', 'GDP DELIVERY VALVE GRINDING', 2, 5, 2, NULL, 1, 5),
('6456', 'Production', 'GDP SUCTION VALVE GRINDING', 2, 5, 2, NULL, 1, 5),
('6457', 'Production', 'GDP RELIEF VALVE GRINDING', 2, 5, 2, NULL, 1, 5),
('6458', 'Production', 'GDP CONNECTOR SUB ASSY', 2, 5, 2, NULL, 1, 5),
('6459', 'Production', 'GDP ARMATURE GRINDING', 2, 5, 2, NULL, 1, 5),
('6460', 'Production', 'GDP ROD ARMATURE GRINDING', 2, 5, 2, NULL, 1, 5),
('6461', 'Production', 'GDP GUIDE ARMATURE GRINDING', 2, 5, 2, NULL, 1, 5),
('6462', 'Production', 'GDP STATOR GRINDING', 2, 5, 2, NULL, 1, 5),
('6463', 'Production', 'GDP ELEMENT SUB ASSY', 2, 5, 2, NULL, 1, 5),
('6464', 'Production', 'GDP HEAD GRINDING', 2, 5, 2, NULL, 1, 5),
('6465', 'Production', 'GDP PLUNGER LAPPING', 2, 5, 2, NULL, 1, 5),
('6466', 'Production', 'GDP WASHING', 2, 5, 2, NULL, 1, 5),
('6467', 'Production', 'GDP SOLENOID ASSY', 2, 5, 2, NULL, 1, 5),
('6468', 'Production', 'GDP COATING', 2, 5, 2, NULL, 1, 5),
('6469', 'Production', 'GDP AFTER COATING', 2, 5, 2, NULL, 1, 5),
('6500', 'Quality Assurance', 'QA QUALITY ASSURANCE PLANNING', 3, 15, 3, NULL, 9, 15),
('6501', 'Quality Assurance', 'QA BKD GROUP &AUDIT CLEANLINESS', 3, 15, 3, NULL, 9, 15),
('6502', 'Quality Assurance', 'QA QUALITY ASSURANCE DIESEL', 3, 15, 3, NULL, 9, 15),
('6503', 'Quality Assurance', 'QA QUALITY ASSURANCE GASOLINE', 3, 15, 3, NULL, 9, 15),
('6504', 'Quality Assurance', 'QA QUALITY ASSURANCE SKD', 3, 15, 3, NULL, 9, 15),
('6505', 'Quality Assurance', 'QA QUALITY ASSURANCE GAS&SKD', 3, 15, 3, NULL, 9, 15),
('6506', 'Quality Assurance', 'QA QUALITY ASSURANCE G4S', 3, 15, NULL, NULL, 9, 15),
('6507', 'Quality Assurance', 'QA QUALITY ASSURANCE GDP', 3, 15, 3, NULL, 9, 15),
('6510', 'Quality Assurance', 'QA PRODUCTS INS COMMON', 3, 15, 3, NULL, 9, 15),
('6512', 'Quality Assurance', 'QA PRODUCTS INS DIESEL', 3, 15, 3, NULL, 9, 15),
('6513', 'Quality Assurance', 'QA PRODUCTS INS GASOLINE', 3, 15, 3, NULL, 9, 15),
('6514', 'Quality Assurance', 'QA PRODUCTS INS SKD', 3, 15, 3, NULL, 9, 15),
('6520', 'Quality Assurance', 'QA PARTS INS COMMON', 3, 12, 3, NULL, 9, 12),
('6522', 'Quality Assurance', 'QA PARTS INS DIESEL', 3, 12, 3, NULL, 9, 12),
('6525', 'Quality Assurance', 'QA PARTS INS GAS&SKD', 3, 12, 3, NULL, 9, 12),
('6532', 'Quality Assurance', 'QA PARTS INS SUPPLIER NG DIE', 3, 12, 3, NULL, 9, 12),
('6534', 'Quality Assurance', 'QA PARTS INS GDP', 3, 12, 3, NULL, 9, 12),
('6600', 'Production Control', 'PC PLANNING COMMON', 3, 9, 2, NULL, 10, 9),
('6601', 'Production Control', 'PC PLANNING SDM', 3, 9, 2, NULL, 10, 9),
('6603', 'Production Control', 'PC PLANNING GASOLINE', 3, 9, 2, NULL, 10, 9),
('6604', 'Production Control', 'PC PLANNING SKD', 3, 9, 2, NULL, 10, 9),
('6610', 'Production Control', 'PC LOGISTICS COMMON', 3, 9, 2, NULL, 10, 9),
('6620', 'Production Control', 'PC MATECON. COMMON', 3, 9, 2, NULL, 10, 9),
('6630', 'Production Control', 'PC PACKAGING COMMON', 3, 9, 2, NULL, 10, 9),
('6640', 'Production Control', 'PC SHIPPING COMMON', 3, 9, 2, NULL, 10, 9),
('6700', 'TIE', 'EF TIE COMMON', 3, 16, 2, NULL, 11, 16),
('6701', 'TIE', 'EF TIE KAIZEN', 3, 16, 2, NULL, 11, 16),
('6702', 'TIE', 'EF TIE G2 INJ', 3, 16, 2, NULL, 11, 16),
('6703', 'TIE', 'EF TIE KAIZEN', 3, 16, 2, NULL, 11, 16),
('6705', 'TIE', 'EF TIE WASHING', 3, 16, 2, NULL, 11, 16),
('6707', 'TIE', 'EF TIE GDP', 3, 16, 2, NULL, 11, 16),
('6708', 'TIE', 'EF TIE SKD GASOLINE', 3, 16, 2, NULL, 11, 16),
('6709', 'TIE', 'EF TIE LOGISTICS', 3, 16, 2, NULL, 11, 16),
('6720', 'Safety & Environment', '-', 3, 3, 2, NULL, 12, 3),
('6800', 'Maintenance Center', 'MT MAINTENANCE DIE COMMON', 3, 23, 2, NULL, 13, 8),
('6830', 'Maintenance Center', 'MT FACILITY COMMON', 3, 23, 2, NULL, 13, 8),
('6840', 'Maintenance Center', 'MT TOOL ROOM COMMON', 3, 23, 2, NULL, 13, 8),
('6850', 'Maintenance Center', 'MT MAINTENANCE CENTER COMMON', 3, 23, 2, NULL, 13, 8),
('6860', 'Maintenance Center', 'MT JIG SHOP COMMON', 3, 23, 2, NULL, 13, 8),
('6870', 'Maintenance Center', 'MT KAIZEN COMMON', 3, 23, 2, NULL, 13, 8),
('6880', 'Maintenance Center', 'MT TPM COMMON', 3, 23, 2, NULL, 13, 8),
('6911', 'Production', 'DIE PD F2 P4 G3 ARMTURE GR', 2, 7, 2, NULL, 1, 7),
('6922', 'Production', 'DIE PD F2 P4 G2 ARMTURE GR', 2, 7, 2, NULL, 1, 7),
('6924', 'Production', 'G4 INJ LOWER BODY ECM', 2, 7, 2, NULL, 1, 7),
('6925', 'Production', 'G4 INJ LOWER BODY GRINDING', 2, 7, 2, NULL, 1, 7),
('6926', 'Production', 'G4 INJ ORIFICE GRINDING', 2, 7, 2, NULL, 1, 7),
('6927', 'Production', 'G4 INJ ORIFICE AFM', 2, 7, 2, NULL, 1, 7),
('6928', 'Production', 'G4 INJ ORIFICE CUTTING', 2, 7, 2, NULL, 1, 7),
('6929', 'Production', 'G4 INJ VALVE GRINDING', 2, 7, 2, NULL, 1, 7),
('6930', 'Production', 'G4 INJ ARMATURE GRINDING', 2, 7, 2, NULL, 1, 7),
('6931', 'Production', 'G4 INJ ORIFICE LAPPING', 2, 7, 2, NULL, 1, 7),
('6939', 'Production', 'G4 INJ CONTROL PLATE GRINDING', 2, 7, 2, NULL, 1, 7),
('6940', 'Production', 'G4 INJ CONTROL PLATE AFM', 2, 7, 2, NULL, 1, 7),
('6950', 'Production', 'HP5 CYLINDER BLIND HOLE', 2, 13, 2, NULL, 1, 13),
('6951', 'Production', 'HP5 CYLINDER CLOSE HOLE PEENING', 2, 13, 2, NULL, 1, 13),
('6960', 'Production', 'CARRY & WASHING', 2, 7, 2, NULL, 1, 7),
('7820', 'Production', 'PROD COMMON 7820', 2, 28, 2, NULL, 17, 28),
('7821', 'Manufacturing Specialist', 'MS MS COMMON', 3, 33, 2, NULL, 14, 33),
('7822', 'Production Engineering', 'PE MACHINERY', 3, 11, 2, NULL, 19, 29),
('7900', 'Managing Director', 'MD OF SKD', 1, 0, 0, 0, 0, 0),
('7903', 'Corporate Planning Center', 'CORPORATE PLANNING CENTER', 1, 19, 4, NULL, 15, 19),
('7904', 'General Manufacturing', 'GENERAL MANUFACTURING', 3, 22, 2, NULL, 16, 22),
('7910', 'Production Engineering', 'PE COMMON', 3, 11, 2, NULL, 19, 29),
('7911', 'Production Engineering', 'PE FUEL FILTER (CURRENT MODEL)', 3, 11, 2, NULL, 19, 29),
('7933', 'Purchasing', 'PU COMMON', 1, 30, 4, NULL, 18, 30),
('7940', 'Production Engineering', 'PE DIESEL (CURRENT MODEL)', 3, 11, 2, NULL, 19, 29),
('7951', 'Production', 'PD FF COMMON', 3, 20, 2, NULL, 17, 20),
('7952', 'Production', 'PD DIESEL-1 COMMON', 3, 32, 2, NULL, 17, 32),
('7953', 'Production', 'PD DIESEL-2 COMMON', 3, 31, 2, NULL, 17, 31),
('7954', 'Manufacturing Specialist', 'FE ME', 3, 24, 2, NULL, 14, 33),
('7955', 'Manufacturing Specialist', 'FE MK', 3, 26, 2, NULL, 14, 33),
('7956', 'Manufacturing Specialist', 'PD MEASUREMENT', 3, 25, 2, NULL, 14, 33),
('7957', 'Manufacturing Specialist', 'MACHINE MAINTENANCE COMMON', 3, 23, 2, NULL, 14, 33),
('7958', 'Production', 'PD COMMON', 3, 28, 2, NULL, 17, 28),
('7960', 'Production', 'PD FF SIFS ASSY', 2, 20, 2, NULL, 17, 20),
('7961', 'Production', 'PD FF SIFS PUMP UNIT', 2, 20, 2, NULL, 17, 20),
('7962', 'Production', 'PD FF SIFS FILTER ASSY', 2, 20, 2, NULL, 17, 20),
('7963', 'Production', 'PD FF SIFS SUCTION', 2, 20, 2, NULL, 17, 20),
('7965', 'Production', 'PD FF MOTORCYCLE SIFS', 2, 20, 2, NULL, 17, 20),
('7970', 'Production', 'PD DF ASSY', 2, 20, 2, NULL, 17, 20),
('7971', 'Production', 'PD ELEMENT', 2, 20, 2, NULL, 17, 20),
('7972', 'Production', 'PD DF ELEMENT SUB-ASSY', 2, 20, 2, NULL, 17, 20),
('7980', 'Production', 'PD SOL ASSY', 2, 32, 2, NULL, 17, 32),
('7982', 'Production', 'PD SOL KAKO', 2, 32, 2, NULL, 17, 32),
('7983', 'Production', 'PD SCV ASSY', 2, 31, 2, NULL, 17, 31),
('7984', 'Production', 'PD SCV KAKO', 2, 31, 2, NULL, 17, 31),
('7985', 'Production', 'PD PCV', 2, 27, 2, NULL, 17, 27),
('7986', 'Production', 'PD PRV', 2, 27, 2, NULL, 17, 27),
('7987', 'Production', 'PD PCV PRV COMMON', 2, 27, 2, NULL, 17, 27),
('7988', 'Production', 'PD G4', 2, 21, 2, NULL, 17, 21);

-- --------------------------------------------------------

--
-- Table structure for table `section_group`
--

CREATE TABLE `section_group` (
  `group_id` int(11) NOT NULL,
  `group` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `section_group`
--

INSERT INTO `section_group` (`group_id`, `group`) VALUES
(1, 'ACC'),
(2, 'CORPS'),
(3, 'FE'),
(4, 'GA'),
(5, 'GDP'),
(6, 'HR'),
(7, 'INJ'),
(8, 'MC'),
(9, 'PC'),
(10, 'PDC'),
(11, 'PE'),
(12, 'PI'),
(13, 'Pump'),
(14, 'PUR'),
(15, 'QA'),
(16, 'TIE'),
(17, 'UC'),
(18, 'Union '),
(19, 'CPC'),
(20, 'Fuel Filter'),
(21, 'G4'),
(22, 'GM'),
(23, 'MC'),
(24, 'ME'),
(25, 'Measurement'),
(26, 'MK'),
(27, 'PCV,PRV'),
(28, 'PDC'),
(29, 'PE'),
(30, 'PUR'),
(31, 'SCV'),
(32, 'Solenoid'),
(33, 'MS');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `company`
--
ALTER TABLE `company`
  ADD PRIMARY KEY (`Company_ID`);

--
-- Indexes for table `department`
--
ALTER TABLE `department`
  ADD PRIMARY KEY (`Dep_id`),
  ADD KEY `FK_department_company` (`Company_ID`);

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`Emp_ID`);

--
-- Indexes for table `form_file`
--
ALTER TABLE `form_file`
  ADD PRIMARY KEY (`Form_file_ID`,`Form_ID`);

--
-- Indexes for table `group_secname`
--
ALTER TABLE `group_secname`
  ADD PRIMARY KEY (`Sectioncode`);

--
-- Indexes for table `plant`
--
ALTER TABLE `plant`
  ADD PRIMARY KEY (`Plant_ID`);

--
-- Indexes for table `position`
--
ALTER TABLE `position`
  ADD PRIMARY KEY (`Position_ID`);

--
-- Indexes for table `position_level`
--
ALTER TABLE `position_level`
  ADD PRIMARY KEY (`psl_id`);

--
-- Indexes for table `requested_form`
--
ALTER TABLE `requested_form`
  ADD PRIMARY KEY (`Form_ID`);

--
-- Indexes for table `sectioncode`
--
ALTER TABLE `sectioncode`
  ADD PRIMARY KEY (`Sectioncode`),
  ADD KEY `Type_ID` (`Type_ID`),
  ADD KEY `FK_sectioncode_department` (`dep_id`);

--
-- Indexes for table `section_group`
--
ALTER TABLE `section_group`
  ADD PRIMARY KEY (`group_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `company`
--
ALTER TABLE `company`
  MODIFY `Company_ID` int(11) NOT NULL AUTO_INCREMENT COMMENT 'ลำดับ', AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `form_file`
--
ALTER TABLE `form_file`
  MODIFY `Form_file_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `plant`
--
ALTER TABLE `plant`
  MODIFY `Plant_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `position_level`
--
ALTER TABLE `position_level`
  MODIFY `psl_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `section_group`
--
ALTER TABLE `section_group`
  MODIFY `group_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `department`
--
ALTER TABLE `department`
  ADD CONSTRAINT `FK_department_company` FOREIGN KEY (`Company_ID`) REFERENCES `company` (`Company_ID`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
