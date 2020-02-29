-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Feb 29, 2020 at 06:20 PM
-- Server version: 5.7.26
-- PHP Version: 7.2.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `highlandcap`
--

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

DROP TABLE IF EXISTS `department`;
CREATE TABLE IF NOT EXISTS `department` (
  `DeptID` varchar(100) NOT NULL,
  `EIN` int(11) NOT NULL,
  `DName` varchar(100) DEFAULT NULL,
  `DStreet` varchar(100) DEFAULT NULL,
  `DSuite` varchar(100) DEFAULT NULL,
  `DCity` varchar(100) DEFAULT NULL,
  `DState` varchar(100) DEFAULT NULL,
  `DZIP` int(11) DEFAULT NULL,
  PRIMARY KEY (`DeptID`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `department`
--

INSERT INTO `department` (`DeptID`, `EIN`, `DName`, `DStreet`, `DSuite`, `DCity`, `DState`, `DZIP`) VALUES
('0', 135564938, 'Consult', '285 Fulton St', '5500', 'New York', 'Ny', 10007),
('1', 135564938, 'Engineer', '286 Fulton St', '5502', 'New York', 'Ny', 10007),
('2', 135564938, 'Dev', '287 Fulton St', '5507', 'New York', 'Ny', 10007),
('4', 135564938, 'DBA', '288 Fulton St', '5505', 'New York', 'Ny', 10007),
('5', 135564938, 'Human Resources', '289 Fulton St', '5505', 'New York', 'Ny', 10007),
('6', 135564938, 'Analyst', '290 Fulton St', '5505', 'New York', 'Ny', 10007),
('9', 135564938, 'Trading', '291 Fulton St', '5507', 'New York', 'Ny', 10007),
('10', 135564938, 'Payroll', '292 Fulton St', '5505', 'New York', 'Ny', 10007),
('11', 135564938, 'Accounting', '293 Fulton St', '5505', 'New York', 'Ny', 10007),
('12', 135564938, 'Accounts Payable', '294 Fulton St', '5505', 'New York', 'Ny', 10007),
('13', 135564938, 'Accounts Receivable', '295 Fulton St', '5505', 'New York', 'Ny', 10007),
('9998', 135564938, 'Administrative', '296 Fulton St', '5513', 'New York', 'Ny', 10007),
('9999', 135564938, 'Chief Officer Suite', '297 Fulton St', '5513', 'New York', 'Ny', 10007);

-- --------------------------------------------------------

--
-- Table structure for table `earnings`
--

DROP TABLE IF EXISTS `earnings`;
CREATE TABLE IF NOT EXISTS `earnings` (
  `EMPID` varchar(10) DEFAULT NULL,
  `SSN` int(11) DEFAULT NULL,
  `TaxRate` int(11) DEFAULT NULL,
  `FilingStatus` int(11) DEFAULT NULL,
  `EarningRate` decimal(18,2) DEFAULT NULL,
  `Deduction` decimal(18,2) DEFAULT NULL,
  `TaxableEarning` decimal(18,2) DEFAULT NULL,
  `NetPay` decimal(18,2) DEFAULT NULL,
  `GrossPay` decimal(18,2) DEFAULT NULL,
  `PreTax` decimal(18,2) DEFAULT NULL,
  `PostTax` decimal(18,2) DEFAULT NULL,
  KEY `EMPID` (`EMPID`),
  KEY `SSN` (`SSN`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

DROP TABLE IF EXISTS `employee`;
CREATE TABLE IF NOT EXISTS `employee` (
  `EMPID` varchar(10) NOT NULL,
  `FirstName` varchar(30) NOT NULL,
  `LastName` varchar(30) NOT NULL,
  `MI` char(1) DEFAULT '',
  `UpdtLastName` varchar(30) DEFAULT '',
  `SSN` int(11) DEFAULT NULL,
  `AddressID` varchar(100) DEFAULT NULL,
  `DeptID` varchar(100) DEFAULT NULL,
  `Title` varchar(30) DEFAULT NULL,
  `Salary` decimal(18,2) DEFAULT NULL,
  `StartDate` date DEFAULT NULL,
  `EndDate` date DEFAULT NULL,
  PRIMARY KEY (`EMPID`),
  KEY `DeptID` (`DeptID`),
  KEY `AddressID` (`AddressID`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`EMPID`, `FirstName`, `LastName`, `MI`, `UpdtLastName`, `SSN`, `AddressID`, `DeptID`, `Title`, `Salary`, `StartDate`, `EndDate`) VALUES
('002462', 'Christine', 'Wasserman', 'B', '', 1898, '1', '0', 'Student', NULL, NULL, NULL),
('007547', 'Vittorio', 'Russo', 'F', '', 9089, '2', '0', 'Student', NULL, NULL, NULL),
('020048', 'Anthony', 'Calise', 'G', '', 7648, '3', '0', 'Student', NULL, NULL, NULL),
('079129', 'Timothy', 'Dees', 'D', '', 6944, '4', '0', 'Student', NULL, NULL, NULL),
('079449', 'Cristian', 'Louro', 'M', '', 1124, '5', '1', 'Systems Engineer', NULL, NULL, NULL),
('083828', 'Liam', ' Smith  ', 'Y', '', 9043, '6', '2', 'Developer', NULL, NULL, NULL),
('086157', 'Noah', ' Johnson  ', 'J', '', 3450, '7', '2', 'Developer', NULL, NULL, NULL),
('100007', 'William', 'Jones', '', '', 2123, '8', '2', 'Developer', NULL, NULL, NULL),
('100241', 'James', 'Williams', '', '', 5358, '9', '9', 'Trader', NULL, NULL, NULL),
('100471', 'Oliver', ' Brown  ', 'D', '', 9244, '10', '9', 'Trader', NULL, NULL, NULL),
('100997', 'Benjamin', ' Davis  ', 'A', '', 9546, '11', '2', 'Developer', NULL, NULL, NULL),
('102251', 'Elijah', ' Miller  ', 'S', '', 2379, '12', '4', 'DBA', NULL, NULL, NULL),
('102670', 'Lucas', ' Wilson  ', 'C', '', 7387, '13', '9', 'Head Trader', NULL, NULL, NULL),
('103189', 'Mason', ' Moore  ', 'C', '', 2897, '14', '9', 'Head Trader', NULL, NULL, NULL),
('103212', 'Logan', ' Taylor  ', 'G', '', 1115, '15', '9', 'Head Trader', NULL, NULL, NULL),
('103220', 'Emma', ' Anderson  ', 'K', '', 3136, '16', '9', 'Trader', NULL, NULL, NULL),
('103422', 'Olivia', ' Thomas  ', 'L', '', 1204, '17', '9', 'Trader', NULL, NULL, NULL),
('103567', 'Ava', ' Jackson  ', 'J', '', 9066, '18', '9', 'Head Trader', NULL, NULL, NULL),
('103745', 'Isabella', ' White  ', 'K', '', 9932, '19', '11', 'Sr Accountant', NULL, NULL, NULL),
('104043', 'Sophia', ' Harris  ', 'M', '', 1164, '20', '9', 'Trader', NULL, NULL, NULL),
('104483', 'Charlotte', ' Martin  ', '', '', 5347, '21', '11', 'Accountant', NULL, NULL, NULL),
('104867', 'Mia', ' Thompson  ', '', '', 7938, '22', '11', 'Accountant', NULL, NULL, NULL),
('104892', 'Amelia', ' Garcia  ', 'M', '', 5579, '23', '11', 'Accountant', NULL, NULL, NULL),
('104946', 'Harper', ' Martinez  ', 'M', '', 7225, '24', '11', 'Accountant', NULL, NULL, NULL),
('105079', 'Evelyn', ' Robinson  ', '', '', 1997, '25', '9', 'Trader', NULL, NULL, NULL),
('105137', 'Michael', ' Clark  ', '', '', 5797, '26', '9', 'Trader', NULL, NULL, NULL),
('105400', 'Christopher', ' Rodriguez  ', '', '', 6748, '27', '9', 'Trader', NULL, NULL, NULL),
('105724', 'Matthew', ' Lewis  ', '', '', 2741, '28', '9', 'Trader', NULL, NULL, NULL),
('106129', 'Joshua', ' Lee  ', 'M', '', 9143, '29', '9', 'Trader', NULL, NULL, NULL),
('106268', 'Daniel', ' Walker  ', '', '', 3765, '30', '9', 'Trader', NULL, NULL, NULL),
('106516', 'David', ' Hall  ', '', '', 3076, '31', '11', 'Sr Accountant', NULL, NULL, NULL),
('106538', 'Andrew', ' Allen  ', '', '', 5244, '32', '9', 'Trader', NULL, NULL, NULL),
('106917', 'James', ' Young  ', '', '', 2590, '33', '11', 'Sr Accountant', NULL, NULL, NULL),
('107004', 'Justin', ' Hernandez  ', '', '', 5061, '34', '1', 'Systems Engineer', NULL, NULL, NULL),
('107198', 'Joseph', ' King  ', 'N', '', 4627, '35', '1', 'Systems Engineer', NULL, NULL, NULL),
('107319', 'Ryan', ' Wright  ', 'M', '', 3015, '36', '9999', 'CFO', NULL, NULL, NULL),
('107365', 'John', ' Lopez  ', 'B', '', 7247, '37', '9999', 'CIO', NULL, NULL, NULL),
('107428', 'Robert', ' Hill  ', '', '', 1989, '38', '9999', 'COO', NULL, NULL, NULL),
('107603', 'Nicholas', ' Scott  ', '', '', 2442, '39', '2', 'Developer', NULL, NULL, NULL),
('108079', 'Anthony', ' Green  ', 'I', '', 4368, '40', '1', 'Systems Engineer', NULL, NULL, NULL),
('108143', 'William', ' Adams  ', 'A', '', 3615, '41', '9999', 'CCO', NULL, NULL, NULL),
('108188', 'Jonathan', ' Baker  ', 'S', '', 5476, '42', '10', 'Director Payroll', NULL, NULL, NULL),
('108306', 'Kyle', ' Gonzalez  ', 'H', '', 6572, '43', '2', 'Developer', NULL, NULL, NULL),
('108402', 'Brandon', ' Nelson  ', 'H', '', 3708, '44', '1', 'Systems Engineer', NULL, NULL, NULL),
('108518', 'Jacob', ' Carter  ', '', '', 6363, '45', '1', 'Network Engineer', NULL, NULL, NULL),
('108519', 'Tyler', ' Mitchell  ', '', '', 8971, '46', '1', 'Network Engineer', NULL, NULL, NULL),
('108551', 'Zachary', ' Perez  ', '', '', 9046, '47', '4', 'DBA', NULL, NULL, NULL),
('108556', 'Mary', ' Roberts  ', 'M', '', 2520, '48', '13', 'Director AR', NULL, NULL, NULL),
('108589', 'Erica', ' Turner  ', 'K', '', 9292, '49', '12', 'Director AP', NULL, NULL, NULL),
('108623', 'Alexandra', ' Phillips  ', 'H', '', 8438, '50', '10', 'Payroll', NULL, NULL, NULL),
('108656', 'Amy', ' Campbell  ', 'M', '', 5461, '51', '10', 'Payroll', NULL, NULL, NULL),
('108733', 'Crystal', ' Parker  ', 'N', '', 5029, '52', '12', 'AP Rep', NULL, NULL, NULL),
('108740', 'Andrea', ' Evans  ', '', '', 7076, '53', '10', 'Sr Payroll', NULL, NULL, NULL),
('108757', 'Kelly', ' Edwards  ', '', '', 6069, '54', '13', 'AR Rep', NULL, NULL, NULL),
('108840', 'Timothy', ' Collins  ', 'F', '', 4432, '55', '2', 'Developer', NULL, NULL, NULL),
('108922', 'Cody', ' Stewart  ', 'P', '', 3863, '56', '13', 'Manager AR', NULL, NULL, NULL),
('108969', 'Adam', ' Sanchez  ', '', '', 3301, '57', '12', 'Manager AP', NULL, NULL, NULL),
('109089', 'Benjamin', ' Morris  ', '', '', 2694, '58', '10', 'Manager Payroll', NULL, NULL, NULL),
('109093', 'Aaron', ' Rogers  ', '', '', 4505, '59', '11', 'Manager Accounting', NULL, NULL, NULL),
('109096', 'Richard', ' Reed  ', '', '', 9677, '60', '11', 'Accounting Comproller', NULL, NULL, NULL),
('109135', 'Patrick', ' Cook  ', '', '', 7192, '61', '11', 'Accounting Comptroller', NULL, NULL, NULL),
('109281', 'Sean', ' Morgan  ', '', '', 7028, '62', '9', 'Trader', NULL, NULL, NULL),
('109322', 'Charles', ' Bell  ', '', '', 6353, '63', '2', 'Developer', NULL, NULL, NULL),
('109325', 'Stephen', ' Murphy  ', '', '', 5044, '64', '13', 'Accounts Rec Rep', NULL, NULL, NULL),
('109366', 'Jeremy', ' Bailey  ', '', '', 6119, '65', '5', 'HR', NULL, NULL, NULL),
('109372', 'Jose', ' Rivera  ', '', '', 6702, '66', '9', 'Trader', NULL, NULL, NULL),
('109403', 'Travis', ' Cooper  ', 'O', '', 3983, '67', '9', 'Trader', NULL, NULL, NULL),
('109430', 'Jeffrey', ' Richardson  ', '', '', 7788, '68', '9', 'Trader', NULL, NULL, NULL),
('109442', 'Nathan', ' Cox  ', 'P', '', 7995, '69', '13', 'Accounts Rec Rep', NULL, NULL, NULL),
('109452', 'Samuel', ' Howard  ', 'F', '', 7292, '70', '2', 'Developer', NULL, NULL, NULL),
('109471', 'Jason', ' Ward  ', 'G', '', 8391, '71', '2', 'Developer', NULL, NULL, NULL),
('109517', 'Mark', ' Torres  ', '', '', 6666, '72', '2', 'Developer', NULL, NULL, NULL),
('109520', 'Jesse', ' Peterson  ', '', '', 7741, '73', '2', 'Developer', NULL, NULL, NULL),
('109546', 'Paul', ' Gray  ', '', '', 7243, '74', '1', 'Network Engineer', NULL, NULL, NULL),
('109574', 'Dustin', ' Ramirez  ', '', '', 8177, '75', '1', 'Systems Engineer', NULL, NULL, NULL),
('109586', 'Jessica', ' James  ', '', '', 2743, '76', '0', 'Consultant', NULL, NULL, NULL),
('109592', 'Ashley', ' Watson  ', '', '', 2675, '77', '2', 'Developer', NULL, NULL, NULL),
('109607', 'Brittany', ' Brooks  ', '', '', 1381, '78', '0', 'Consultant', NULL, NULL, NULL),
('109690', 'Amanda', ' Kelly  ', '', '', 7388, '79', '0', 'Consultant', NULL, NULL, NULL),
('109694', 'Samantha', ' Sanders  ', 'R', '', 8516, '80', '6', 'Sr Financial Analyst', NULL, NULL, NULL),
('109698', 'Sarah', ' Price  ', '', '', 4794, '81', '6', 'Sr Financial Analyst', NULL, NULL, NULL),
('109701', 'Stephanie', ' Bennett  ', 'R', '', 8372, '82', '2', 'Developer', NULL, NULL, NULL),
('109731', 'Jennifer', ' Wood  ', '', '', 5901, '83', '6', 'Financial Analyst', NULL, NULL, NULL),
('109754', 'Elizabeth', ' Barnes  ', 'E', '', 7622, '84', '6', 'Financial Analyst', NULL, NULL, NULL),
('109784', 'Lauren', ' Ross  ', 'A', '', 4011, '85', '9', 'Trader', NULL, NULL, NULL),
('109803', 'Megan', ' Henderson  ', 'M', '', 5252, '86', '9', 'Trader', NULL, NULL, NULL),
('109836', 'Emily', ' Coleman  ', '', '', 1800, '87', '9', 'Trader', NULL, NULL, NULL),
('109922', 'Nicole', ' Jenkins  ', '', '', 7634, '88', '9998', 'Administrative Assistant', NULL, NULL, NULL),
('109948', 'Kayla', ' Perry  ', '', '', 8388, '89', '11', 'Accountant', NULL, NULL, NULL),
('109962', 'Amber', ' Powell  ', 'S', '', 9559, '90', '11', 'Accountant', NULL, NULL, NULL),
('110018', 'Rachel', ' Long  ', 'M', '', 6638, '91', '11', 'Accountant', NULL, NULL, NULL),
('110023', 'Courtney', ' Patterson  ', 'M', '', 9263, '92', '4', 'DBA', NULL, NULL, NULL),
('110024', 'Danielle', ' Hughes  ', '', '', 7597, '93', '11', 'Sr Accountant', NULL, NULL, NULL),
('110064', 'Heather', ' Flores  ', 'B', '', 7415, '94', '11', 'Sr Accountant', NULL, NULL, NULL),
('110067', 'Melissa', ' Washington  ', 'C', '', 2473, '95', '5', 'HR', NULL, NULL, NULL),
('110068', 'Rebecca', ' Butler  ', 'P', '', 1473, '96', '11', 'Accountant', NULL, NULL, NULL),
('110105', 'Michelle', ' Simmons  ', '', '', 6553, '97', '9998', 'Administrative Assistant', NULL, NULL, NULL),
('110106', 'Tiffany', ' Foster  ', '', '', 6046, '98', '11', 'Sr Accountant', NULL, NULL, NULL),
('110204', 'Chelsea', ' Gonzales  ', '', '', 6915, '99', '11', 'Sr Accountant', NULL, NULL, NULL),
('110216', 'Christina', ' Bryant   ', 'M', '', 1250, '100', '9998', 'Administrative Assistant', NULL, NULL, NULL),
('110218', 'Katherine', ' Alexander  ', 'E', '', 5248, '101', '11', 'Sr Accountant', NULL, NULL, NULL),
('110229', 'Alyssa', 'Russell  ', '', '', 8828, '102', '9998', 'Administrative Assistant', NULL, NULL, NULL),
('110230', 'Jasmine', ' Griffin   ', '', '', 5454, '103', '11', 'Accountant', NULL, NULL, NULL),
('110237', 'Laura', ' Diaz  ', '', '', 7801, '104', '6', 'Financial Analyst', NULL, NULL, NULL),
('110273', 'Hannah', ' Hayes  ', 'E', '', 1282, '105', '11', 'Accountant', NULL, NULL, NULL),
('110277', 'Kimberly', 'Knowles', '', '', 3225, '106', '6', 'Financial Analyst', NULL, NULL, NULL),
('110287', 'Kelsey', 'Snipes', 'R', '', 7215, '107', '9998', 'Administrative Assistant', NULL, NULL, NULL),
('110288', 'Victoria', 'Flores', '', '', 5450, '108', '6', 'Financial Analyst', NULL, NULL, NULL),
('110300', 'Sara', 'Berret', '', '', 9600, '109', '5', 'HR', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `employeeaddress`
--

DROP TABLE IF EXISTS `employeeaddress`;
CREATE TABLE IF NOT EXISTS `employeeaddress` (
  `EmpID` varchar(10) DEFAULT NULL,
  `AddressID` varchar(100) NOT NULL,
  `StreetNum` varchar(100) DEFAULT NULL,
  `StreetName` varchar(100) DEFAULT NULL,
  `APTNum` varchar(11) NOT NULL,
  `City` varchar(100) DEFAULT NULL,
  `State` varchar(100) DEFAULT NULL,
  `Zip` int(11) DEFAULT NULL,
  PRIMARY KEY (`AddressID`),
  KEY `EmpID` (`EmpID`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `employeeaddress`
--

INSERT INTO `employeeaddress` (`EmpID`, `AddressID`, `StreetNum`, `StreetName`, `APTNum`, `City`, `State`, `Zip`) VALUES
('108551', '47', '410', 'East 25th St', '3D', 'Brooklyn', 'NY', 11226),
('108556', '48', '344', 'prospect ave', '8A', 'Hackensack', 'NJ', 7601),
('108519', '46', '191', 'Sharpe Ave', '', 'Staten Island', 'NY', 10302),
('108518', '45', '51', 'Rivington Ave', '', 'Staten Island', 'NY', 10314),
('108306', '43', '751', 'Troy Ave', '4F', 'Brooklyn', 'NY', 11203),
('108402', '44', '30', 'Daniel Low Terrace', '6R', 'Staten Island', 'NY', 10301),
('108188', '42', '240', 'W 98th Street', '10B', 'New York', 'NY', 10025),
('108079', '40', '2103', '57th St', '', 'Brooklyn', 'NY', 11204),
('108143', '41', '12709', 'Lowell Avenue', '', 'Granview', 'MO', 64030),
('107603', '39', '437', 'Throop Ave', '3L', 'Brooklyn', 'NY', 11221),
('107365', '37', '4951', 'Elm Avenue', '1A', 'Mt Vernon', 'NY', 10550),
('107428', '38', '1035', 'Washington Ave', '3G', 'Brooklyn', 'NY', 11225),
('107319', '36', '4050', 'Nostrand Ave', '3A', 'Brooklyn', 'NY', 11235),
('107004', '34', '724', 'E 216th St', '3D', 'Bronx', 'NY', 10467),
('107198', '35', '630', 'W 246th St', '831', 'Bronx', 'NY', 10471),
('106917', '33', '5', 'Franklin Ave', '2P', 'White Plains', 'NY', 10601),
('106538', '32', '1724', 'East 5th Street', '', 'Brooklyn', 'NY', 11223),
('106516', '31', '239', 'Bay 34th Street', '3E', 'Brooklyn', 'NY', 11214),
('106129', '29', '99', 'Ocean Parkway', '', 'Brooklyn', 'NY', 11218),
('106268', '30', '311', 'North High St', '', 'Mount Vernon', 'NY', 10550),
('105724', '28', '1030', 'Route 311', '', 'Patterson', 'NY', 12563),
('105400', '27', '304', 'St Johns Place', '3B', 'Brooklyn', 'NY', 11238),
('105137', '26', '9', 'Brookfield Drive', '', 'Hampton', 'VA', 23666),
('105079', '25', '13744', 'Belknap St', '', 'Springfield Gardens', 'NY', 11413),
('104946', '24', '70', 'Gristmill Lane', '', 'Great Neck', 'NY', 11023),
('104892', '23', '1647', 'Hobart Ave', '3D', 'Bronx', 'NY', 10461),
('104867', '22', '85', 'Exeter St', '', 'Staten Island', 'NY', 10308),
('104043', '20', '501', 'Van Duzer St', '', 'Staten Island', 'NY', 10304),
('104483', '21', '1316', 'E 10th St', '', 'Brooklyn', 'NY', 11230),
('103567', '18', '1118', 'Easton Avenue', 'C', 'Somerset', 'NJ', 8873),
('103745', '19', '1707', 'Popham Ave', '', 'Bronx', 'NY', 10453),
('103422', '17', '2420', 'Glenwood Road', '2', 'Brooklyn', 'NY', 11210),
('103212', '15', '2326', 'W 8th St', '4', 'Brooklyn', 'NY', 11223),
('103220', '16', '1156', 'Norton Drive', '', 'Far Rockaway', 'NY', 11691),
('103189', '14', '180', 'Bethel Loop', '17', 'Brooklyn', 'NY', 11239),
('102251', '12', '5023', '201st St', '', 'Bayside', 'NY', 11364),
('102670', '13', '19506', '39th Ave', '', 'Auburndale', 'NY', 11358),
('100997', '11', '7', 'Balint Drive', '226', 'Yonkers', 'NY', 10710),
('100471', '10', '311', 'East 176th St', '', 'Bronx', 'NY', 10457),
('100241', '9', '415', 'South 4th Ave', '', 'Mt Vernon', 'NY', 10550),
('100007', '8', '9', 'Creemer Road', '', 'Armonk', 'NY', 10504),
('086157', '7', '3840', 'Greystone Ave', '5F', 'Riverdale', 'NY', 10463),
('083828', '6', '1', 'City Place', '2006', 'White Plains', 'NY', 10601),
('079449', '5', '5608', 'Riverdale Ave', '', 'Bronx', 'NY', 10471),
('079129', '4', '15', 'North Broadway', '', 'White Plains', 'NY', 10601),
('020048', '3', '300', 'St Pauls Ave', '', 'Staten Island', 'NY', 10304),
('007547', '2', '3233', 'Seymour Ave', '', 'Bronx', 'NY', 10469),
('002462', '1', '147', 'South 12th Ave', '101', 'Mt Vernon', 'NY', 10550),
('108589', '49', '2525', 'Church Ave', '1C', 'Brooklyn', 'NY', 11226),
('108623', '50', '70', 'Rogers Ave', '', 'Brooklyn', 'NY', 11216),
('108656', '51', '875', 'Morrison Ave', '6J', 'Bronx', 'NY', 10473),
('108733', '52', '102', 'Turkey Hill Road', '', 'Ithaca', 'NY', 14850),
('108740', '53', '159', 'Coleridge St', '', 'Brooklyn', 'NY', 11235),
('108757', '54', '722', 'East 49th St', '', 'Brooklyn', 'NY', 11203),
('108840', '55', '801', 'East 226th Street', '1A', 'Bronx', 'NY', 10466),
('108922', '56', '1380', 'Teaneck Road', 'C', 'Teaneck', 'NJ', 7666),
('108969', '57', '650', 'W 42nd ST', '827', 'New York', 'NY', 10036),
('109089', '58', '4415', 'Ave M', '', 'Brooklyn', 'NY', 11234),
('109093', '59', '1267', 'Bronx River Ave', '1F', 'Bronx', 'NY', 10472),
('109096', '60', '96', 'Hope Ave', '', 'Staten Island', 'NY', 10305),
('109135', '61', '1204', 'E 223rd St', '', 'Bronx', 'NY', 10466),
('109281', '62', '41', 'Bennett Avenue', '54', 'New York', 'NY', 10033),
('109322', '63', '5520', '15th Ave', '6D', 'Brooklyn', 'NY', 11219),
('109325', '64', '9', 'Lorraine Street', '3B', 'Brooklyn', 'NY', 11231),
('109366', '65', '488', 'East 164th St', '2M', 'Bronx', 'NY', 10456),
('109372', '66', '716', 'Desmond Ct', '', 'Brooklyn', 'NY', 11235),
('109403', '67', '2091', 'East 2nd St', '', 'Brooklyn', 'NY', 11223),
('109430', '68', '508', 'W State Street', '1', 'Trenton', 'NJ', 8618),
('109442', '69', '2525', 'Amsterdam ave', '', 'New York', 'NY', 10033),
('109452', '70', '140', 'Harborview South', '', 'Lawrence', 'NY', 11559),
('109471', '71', '4403', 'Foster Ave', '', 'Brooklyn', 'NY', 11203),
('109517', '72', '736', 'West 187th Street', '302', 'New York', 'NY', 10033),
('109520', '73', '319', 'Pacific Ave', '', 'Cedarhurst', 'NY', 11516),
('109546', '74', '4330', 'Minnetonka Blvd', '203A', 'St Louis Park ', 'MN', 55416),
('109574', '75', '179', 'Lott Ave', '', 'Brooklyn', 'NY', 11212),
('109586', '76', '333', 'East Broadway', '2B', 'Long Beach', 'NY', 11561),
('109592', '77', '14', 'Fillmore Ave', '', 'Staten Island', 'NY', 10314),
('109607', '78', '100', 'Alcott Place', '31E', 'Bronx', 'NY', 10475),
('109690', '79', '35', 'Hamilton Ave', '', 'Ossining', 'NY', 10562),
('109694', '80', '75', 'McGuffey Ln', '', 'Delmar', 'NY', 12054),
('109698', '81', '1347', 'Ocean Ave', '2B', 'Brooklyn', 'NY', 11230),
('109701', '82', '374', 'Jewett Ave', '', 'Staten Island', 'NY', 10302),
('109731', '83', '281', 'East 143rd St', '10D', 'Bronx', 'NY', 10451),
('109754', '84', '500', 'East 77th Street', '1209', 'New York', 'NY', 10162),
('109784', '85', '106', 'Locust Hill Ave', '3C', 'Yonkers', 'NY', 10701),
('109803', '86', '861', 'East 27th Street', '6E', 'Brooklyn', 'NY', 11210),
('109836', '87', '1136', 'Berriman Street', '', 'Brooklyn', 'NY', 11239),
('109922', '88', '45', 'Tennis Court', '3D', 'Brooklyn', 'NY', 11226),
('109948', '89', '2926', 'Bouck Ave', '2', 'Bronx', 'NY', 10469),
('109962', '90', '115', 'Smith Place', '', 'Staten Island', 'NY', 10302),
('110018', '91', '362', 'E 10th St', '3E', 'New York', 'NY', 10009),
('110023', '92', '30', 'Bush Ave', '', 'Staten Island', 'NY', 10303),
('110024', '93', '225', 'W 83rd St', '', 'New York', 'NY', 10024),
('110064', '94', '2410', 'Davidson Ave', '10A', 'Bronx', 'NY', 10468),
('110067', '95', '386', '14th St', '3F', 'Brooklyn', 'NY', 11215),
('110068', '96', '1085', 'Eastern Pkwy', '15', 'Brooklyn', 'NY', 11213),
('110105', '97', '11020', 'N Crown Court', '', 'Mequon', 'WI', 53092),
('110106', '98', '1203', 'Willow St', '', 'Uniondale', 'NY', 11553),
('110204', '99', '1532', 'Newport Dr', '', 'Lakewood', 'NJ', 8701),
('110216', '100', '224', 'York St', '2J', 'Brooklyn', 'NY', 11201),
('110218', '101', '6209', '11th Road N', '', 'Arlington', 'VA', 22205),
('110229', '102', '35', 'Lenox Avenue', '1', 'Stamford', 'CT', 6902),
('110230', '103', '309', 'W 111th St', '4', 'New York', 'NY', 10026),
('110237', '104', '1296', 'Bay St', '', 'Staten Island', 'NY', 10305),
('110273', '105', '1910', 'Benedict Ave', '2E', 'Bronx', 'NY', 10462),
('110277', '106', '19', 'W 69th St', '804', 'New York', 'NY', 10023),
('110287', '107', '19', 'Vermilyea Ave', '2E', 'New York', 'NY', 10034);

-- --------------------------------------------------------

--
-- Table structure for table `employer`
--

DROP TABLE IF EXISTS `employer`;
CREATE TABLE IF NOT EXISTS `employer` (
  `EIN` int(11) NOT NULL,
  `EmplrName` varchar(100) DEFAULT NULL,
  `EmplrStNum` int(11) DEFAULT NULL,
  `EmplrStAdd` varchar(100) DEFAULT NULL,
  `EmplrSuiteNum` int(11) DEFAULT NULL,
  `EmplrCity` varchar(100) DEFAULT NULL,
  `EmplrState` varchar(100) DEFAULT NULL,
  `EmplrZip` int(11) DEFAULT NULL,
  `CompCloseDate` date DEFAULT NULL,
  PRIMARY KEY (`EIN`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `employer`
--

INSERT INTO `employer` (`EIN`, `EmplrName`, `EmplrStNum`, `EmplrStAdd`, `EmplrSuiteNum`, `EmplrCity`, `EmplrState`, `EmplrZip`, `CompCloseDate`) VALUES
(135564938, 'Highland Capital', 297, 'Fulton St', 5513, 'New York', 'Ny', 10007, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `form941`
--

DROP TABLE IF EXISTS `form941`;
CREATE TABLE IF NOT EXISTS `form941` (
  `EIN` int(11) DEFAULT NULL,
  `Quater` int(11) DEFAULT NULL,
  `NumEmployees` int(11) DEFAULT NULL,
  `Compensation` decimal(18,2) DEFAULT NULL,
  `FedTax` decimal(18,2) DEFAULT NULL,
  `SSTax` decimal(18,2) DEFAULT NULL,
  `MedicareTax` decimal(18,2) DEFAULT NULL,
  `Wages` decimal(18,2) DEFAULT NULL,
  `SickPay` decimal(18,2) DEFAULT NULL,
  `LifeIns` decimal(18,2) DEFAULT NULL,
  `PrevAppliedOvrPy` decimal(18,2) DEFAULT NULL,
  `ResearchActivities` varchar(100) DEFAULT NULL,
  `EMPID` varchar(10) DEFAULT NULL,
  KEY `EIN` (`EIN`),
  KEY `EMPID` (`EMPID`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `form944`
--

DROP TABLE IF EXISTS `form944`;
CREATE TABLE IF NOT EXISTS `form944` (
  `EIN` int(11) DEFAULT NULL,
  `NumEmployees` int(11) DEFAULT NULL,
  `Compensation` decimal(18,2) DEFAULT NULL,
  `FedTax` decimal(18,2) DEFAULT NULL,
  `SSTax` decimal(18,2) DEFAULT NULL,
  `MedicareTax` decimal(18,2) DEFAULT NULL,
  `Wages` decimal(18,2) DEFAULT NULL,
  `SickPay` decimal(18,2) DEFAULT NULL,
  `LifeIns` decimal(18,2) DEFAULT NULL,
  `PrevAppliedOvrPy` decimal(18,2) DEFAULT NULL,
  `ResearchActivities` varchar(100) DEFAULT NULL,
  `EMPID` varchar(10) DEFAULT NULL,
  KEY `EIN` (`EIN`),
  KEY `EMPID` (`EMPID`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `irswitholdtable`
--

DROP TABLE IF EXISTS `irswitholdtable`;
CREATE TABLE IF NOT EXISTS `irswitholdtable` (
  `RateCalc` int(11) DEFAULT NULL,
  `MDCTax` decimal(18,2) DEFAULT NULL,
  `SSTax` decimal(18,2) DEFAULT NULL,
  `FEDTax` decimal(18,2) DEFAULT NULL,
  `StateTax` decimal(18,2) DEFAULT NULL,
  `LocalTax` decimal(18,2) DEFAULT NULL,
  `FilingStatus` int(11) DEFAULT NULL,
  `Salary` decimal(18,2) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `payroll`
--

DROP TABLE IF EXISTS `payroll`;
CREATE TABLE IF NOT EXISTS `payroll` (
  `EMPID` varchar(10) DEFAULT NULL,
  `SSN` int(11) DEFAULT NULL,
  `BiWeekSalary` decimal(18,2) DEFAULT NULL,
  `Deductions` decimal(18,2) DEFAULT NULL,
  `Medical` decimal(18,2) DEFAULT NULL,
  `Dental` decimal(18,2) DEFAULT NULL,
  `Vision` decimal(18,2) DEFAULT NULL,
  `MDCTax` decimal(18,2) DEFAULT NULL,
  `SSTax` decimal(18,2) DEFAULT NULL,
  `FEDTax` decimal(18,2) DEFAULT NULL,
  `STATETax` decimal(18,2) DEFAULT NULL,
  KEY `EMPID` (`EMPID`),
  KEY `SSN` (`SSN`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `created_at`) VALUES
(20048, 'calise', '$2y$10$lbqRNeb/xACuCpdnNoHJP.wSpNRvMCq1SHIL/SGjBd6JmI5RZ7Xn2', '2020-02-20 22:19:35');

-- --------------------------------------------------------

--
-- Table structure for table `w2`
--

DROP TABLE IF EXISTS `w2`;
CREATE TABLE IF NOT EXISTS `w2` (
  `SSN` int(11) DEFAULT NULL,
  `AddressID` varchar(100) DEFAULT NULL,
  `EIN` int(11) DEFAULT NULL,
  `Compensation` decimal(18,2) DEFAULT NULL,
  `SSWages` decimal(18,2) DEFAULT NULL,
  `MDCWages` decimal(18,2) DEFAULT NULL,
  `SSTips` decimal(18,2) DEFAULT NULL,
  `FedWithold` decimal(18,2) DEFAULT NULL,
  `SSTaxWithold` decimal(18,2) DEFAULT NULL,
  `MDCTaxWithold` decimal(18,2) DEFAULT NULL,
  `Tips` decimal(18,2) DEFAULT NULL,
  `DependentCareBen` decimal(18,2) DEFAULT NULL,
  KEY `SSN` (`SSN`),
  KEY `AddressID` (`AddressID`),
  KEY `EIN` (`EIN`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `w2`
--

INSERT INTO `w2` (`SSN`, `AddressID`, `EIN`, `Compensation`, `SSWages`, `MDCWages`, `SSTips`, `FedWithold`, `SSTaxWithold`, `MDCTaxWithold`, `Tips`, `DependentCareBen`) VALUES
(7648, '3', 135564938, '245.00', '2467.00', '648.00', '36548.00', '5246.00', '152.95', '9.40', '3578.00', '35768.00');

-- --------------------------------------------------------

--
-- Table structure for table `w4`
--

DROP TABLE IF EXISTS `w4`;
CREATE TABLE IF NOT EXISTS `w4` (
  `SSN` int(11) NOT NULL,
  `AddressID` varchar(100) DEFAULT NULL,
  `FilingStatus` varchar(100) DEFAULT NULL,
  `DifferentFileStatus` varchar(100) DEFAULT NULL,
  `EIN` int(11) DEFAULT NULL,
  `OtherIncome` int(11) NOT NULL,
  `Deductions` int(11) NOT NULL,
  `ExtraWithholding` int(11) NOT NULL,
  `MultiEmploy` varchar(100) DEFAULT NULL,
  `EffectDateWithold` date DEFAULT NULL,
  `TermDateWithold` date DEFAULT NULL,
  PRIMARY KEY (`SSN`),
  KEY `AddressID` (`AddressID`),
  KEY `EIN` (`EIN`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
