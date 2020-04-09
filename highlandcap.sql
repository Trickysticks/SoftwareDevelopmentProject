-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Apr 09, 2020 at 06:20 PM
-- Server version: 10.4.10-MariaDB
-- PHP Version: 7.3.12

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
  `Role` varchar(30) NOT NULL,
  `PTIN` int(25) NOT NULL,
  PRIMARY KEY (`EMPID`),
  KEY `DeptID` (`DeptID`),
  KEY `AddressID` (`AddressID`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`EMPID`, `FirstName`, `LastName`, `MI`, `UpdtLastName`, `SSN`, `AddressID`, `DeptID`, `Title`, `Salary`, `StartDate`, `EndDate`, `Role`, `PTIN`) VALUES
('002462', 'Christine', 'Wasserman', 'B', '', 1898, '1', '0', 'Student', '5203.84', NULL, NULL, 'Admin', 111111111),
('007547', 'Vittorio', 'Russo', 'F', '', 9089, '2', '0', 'Student', '1223.68', NULL, NULL, 'Admin', 111111112),
('020048', 'Anthony', 'Calise', 'G', '', 7648, '3', '0', 'Student', '337.70', NULL, NULL, 'Admin', 111111113),
('079129', 'Timothy', 'Dees', 'D', '', 6944, '4', '0', 'Student', '1609.30', NULL, NULL, 'Admin', 111111114),
('079449', 'Cristian', 'Louro', 'M', '', 1124, '5', '1', 'Systems Engineer', '15930.00', NULL, NULL, 'Employee', 111111115),
('083828', 'Liam', ' Smith  ', 'Y', '', 9043, '6', '2', 'Developer', '1609.30', NULL, NULL, 'Employee', 0),
('086157', 'Noah', ' Johnson  ', 'J', '', 3450, '7', '2', 'Developer', '24398.88', NULL, NULL, 'Employee', 0),
('100007', 'William', 'Jones', '', '', 2123, '8', '2', 'Developer', '1591.84', NULL, NULL, 'Employee', 0),
('100241', 'James', 'Williams', '', '', 5358, '9', '9', 'Trader', '8451.07', NULL, NULL, 'Admin', 0),
('100471', 'Oliver', ' Brown  ', 'D', '', 9244, '10', '9', 'Trader', '1642.46', NULL, NULL, 'Admin', 0),
('100997', 'Benjamin', ' Davis  ', 'A', '', 9546, '11', '2', 'Developer', '454.50', NULL, NULL, 'Employee', 0),
('102251', 'Elijah', ' Miller  ', 'S', '', 2379, '12', '4', 'DBA', '11721.56', NULL, NULL, 'Employee', 0),
('102670', 'Lucas', ' Wilson  ', 'C', '', 7387, '13', '9', 'Head Trader', '4684.18', NULL, NULL, 'Admin', 0),
('103189', 'Mason', ' Moore  ', 'C', '', 2897, '14', '9', 'Head Trader', '2353.87', NULL, NULL, 'Admin', 0),
('103212', 'Logan', ' Taylor  ', 'G', '', 1115, '15', '9', 'Head Trader', '81.54', NULL, NULL, 'Admin', 0),
('103220', 'Emma', ' Anderson  ', 'K', '', 3136, '16', '9', 'Trader', '43078.47', NULL, NULL, 'Admin', 0),
('103422', 'Olivia', ' Thomas  ', 'L', '', 1204, '17', '9', 'Trader', '85973.72', NULL, NULL, 'Admin', 0),
('103567', 'Ava', ' Jackson  ', 'J', '', 9066, '18', '9', 'Head Trader', '24191.25', NULL, NULL, 'Admin', 0),
('103745', 'Isabella', ' White  ', 'K', '', 9932, '19', '11', 'Sr Accountant', '2377.69', NULL, NULL, 'Admin', 0),
('104043', 'Sophia', ' Harris  ', 'M', '', 1164, '20', '9', 'Trader', '16612.12', NULL, NULL, 'Admin', 0),
('104483', 'Charlotte', ' Martin  ', '', '', 5347, '21', '11', 'Accountant', '17886.39', NULL, NULL, 'Admin', 0),
('104867', 'Mia', ' Thompson  ', '', '', 7938, '22', '11', 'Accountant', '2476.01', NULL, NULL, 'Admin', 0),
('104892', 'Amelia', ' Garcia  ', 'M', '', 5579, '23', '11', 'Accountant', '1584.95', NULL, NULL, 'Admin', 0),
('104946', 'Harper', ' Martinez  ', 'M', '', 7225, '24', '11', 'Accountant', '19994.89', NULL, NULL, 'Admin', 0),
('105079', 'Evelyn', ' Robinson  ', '', '', 1997, '25', '9', 'Trader', '3352.63', NULL, NULL, 'Admin', 0),
('105137', 'Michael', ' Clark  ', '', '', 5797, '26', '9', 'Trader', '31401.35', NULL, NULL, 'Admin', 0),
('105400', 'Christopher', ' Rodriguez  ', '', '', 6748, '27', '9', 'Trader', '75138.49', NULL, NULL, 'Admin', 0),
('105724', 'Matthew', ' Lewis  ', '', '', 2741, '28', '9', 'Trader', '26250.32', NULL, NULL, 'Admin', 0),
('106129', 'Joshua', ' Lee  ', 'M', '', 9143, '29', '9', 'Trader', '5554.14', NULL, NULL, 'Admin', 0),
('106268', 'Daniel', ' Walker  ', '', '', 3765, '30', '9', 'Trader', '25924.97', NULL, NULL, 'Admin', 0),
('106516', 'David', ' Hall  ', '', '', 3076, '31', '11', 'Sr Accountant', '43304.05', NULL, NULL, 'Admin', 0),
('106538', 'Andrew', ' Allen  ', '', '', 5244, '32', '9', 'Trader', '70263.60', NULL, NULL, 'Admin', 0),
('106917', 'James', ' Young  ', '', '', 2590, '33', '11', 'Sr Accountant', '22579.00', NULL, NULL, 'Admin', 0),
('107004', 'Justin', ' Hernandez  ', '', '', 5061, '34', '1', 'Systems Engineer', '2893.83', NULL, NULL, 'Employee', 0),
('107198', 'Joseph', ' King  ', 'N', '', 4627, '35', '1', 'Systems Engineer', '6675.00', NULL, NULL, 'Employee', 0),
('107319', 'Ryan', ' Wright  ', 'M', '', 3015, '36', '9999', 'CFO', '1200.00', NULL, NULL, '', 0),
('107365', 'John', ' Lopez  ', 'B', '', 7247, '37', '9999', 'CIO', NULL, NULL, NULL, '', 0),
('107428', 'Robert', ' Hill  ', '', '', 1989, '38', '9999', 'COO', NULL, NULL, NULL, '', 0),
('107603', 'Nicholas', ' Scott  ', '', '', 2442, '39', '2', 'Developer', NULL, NULL, NULL, 'Employee', 0),
('108079', 'Anthony', ' Green  ', 'I', '', 4368, '40', '1', 'Systems Engineer', NULL, NULL, NULL, 'Employee', 0),
('108143', 'William', ' Adams  ', 'A', '', 3615, '41', '9999', 'CCO', NULL, NULL, NULL, '', 0),
('108188', 'Jonathan', ' Baker  ', 'S', '', 5476, '42', '10', 'Director Payroll', NULL, NULL, NULL, '', 0),
('108306', 'Kyle', ' Gonzalez  ', 'H', '', 6572, '43', '2', 'Developer', NULL, NULL, NULL, 'Employee', 0),
('108402', 'Brandon', ' Nelson  ', 'H', '', 3708, '44', '1', 'Systems Engineer', NULL, NULL, NULL, 'Employee', 0),
('108518', 'Jacob', ' Carter  ', '', '', 6363, '45', '1', 'Network Engineer', NULL, NULL, NULL, 'Employee', 0),
('108519', 'Tyler', ' Mitchell  ', '', '', 8971, '46', '1', 'Network Engineer', NULL, NULL, NULL, 'Employee', 0),
('108551', 'Zachary', ' Perez  ', '', '', 9046, '47', '4', 'DBA', NULL, NULL, NULL, 'Employee', 0),
('108556', 'Mary', ' Roberts  ', 'M', '', 2520, '48', '13', 'Director AR', NULL, NULL, NULL, '', 0),
('108589', 'Erica', ' Turner  ', 'K', '', 9292, '49', '12', 'Director AP', NULL, NULL, NULL, '', 0),
('108623', 'Alexandra', ' Phillips  ', 'H', '', 8438, '50', '10', 'Payroll', NULL, NULL, NULL, '', 0),
('108656', 'Amy', ' Campbell  ', 'M', '', 5461, '51', '10', 'Payroll', NULL, NULL, NULL, '', 0),
('108733', 'Crystal', ' Parker  ', 'N', '', 5029, '52', '12', 'AP Rep', NULL, NULL, NULL, '', 0),
('108740', 'Andrea', ' Evans  ', '', '', 7076, '53', '10', 'Sr Payroll', NULL, NULL, NULL, '', 0),
('108757', 'Kelly', ' Edwards  ', '', '', 6069, '54', '13', 'AR Rep', NULL, NULL, NULL, '', 0),
('108840', 'Timothy', ' Collins  ', 'F', '', 4432, '55', '2', 'Developer', NULL, NULL, NULL, 'Employee', 0),
('108922', 'Cody', ' Stewart  ', 'P', '', 3863, '56', '13', 'Manager AR', NULL, NULL, NULL, '', 0),
('108969', 'Adam', ' Sanchez  ', '', '', 3301, '57', '12', 'Manager AP', NULL, NULL, NULL, '', 0),
('109089', 'Benjamin', ' Morris  ', '', '', 2694, '58', '10', 'Manager Payroll', NULL, NULL, NULL, '', 0),
('109093', 'Aaron', ' Rogers  ', '', '', 4505, '59', '11', 'Manager Accounting', NULL, NULL, NULL, 'Admin', 0),
('109096', 'Richard', ' Reed  ', '', '', 9677, '60', '11', 'Accounting Comproller', NULL, NULL, NULL, 'Admin', 0),
('109135', 'Patrick', ' Cook  ', '', '', 7192, '61', '11', 'Accounting Comptroller', NULL, NULL, NULL, 'Admin', 0),
('109281', 'Sean', ' Morgan  ', '', '', 7028, '62', '9', 'Trader', NULL, NULL, NULL, 'Admin', 0),
('109322', 'Charles', ' Bell  ', '', '', 6353, '63', '2', 'Developer', NULL, NULL, NULL, 'Employee', 0),
('109325', 'Stephen', ' Murphy  ', '', '', 5044, '64', '13', 'Accounts Rec Rep', NULL, NULL, NULL, '', 0),
('109366', 'Jeremy', ' Bailey  ', '', '', 6119, '65', '5', 'HR', NULL, NULL, NULL, '', 0),
('109372', 'Jose', ' Rivera  ', '', '', 6702, '66', '9', 'Trader', NULL, NULL, NULL, 'Admin', 0),
('109403', 'Travis', ' Cooper  ', 'O', '', 3983, '67', '9', 'Trader', NULL, NULL, NULL, 'Admin', 0),
('109430', 'Jeffrey', ' Richardson  ', '', '', 7788, '68', '9', 'Trader', NULL, NULL, NULL, 'Admin', 0),
('109442', 'Nathan', ' Cox  ', 'P', '', 7995, '69', '13', 'Accounts Rec Rep', NULL, NULL, NULL, '', 0),
('109452', 'Samuel', ' Howard  ', 'F', '', 7292, '70', '2', 'Developer', NULL, NULL, NULL, 'Employee', 0),
('109471', 'Jason', ' Ward  ', 'G', '', 8391, '71', '2', 'Developer', NULL, NULL, NULL, 'Employee', 0),
('109517', 'Mark', ' Torres  ', '', '', 6666, '72', '2', 'Developer', NULL, NULL, NULL, 'Employee', 0),
('109520', 'Jesse', ' Peterson  ', '', '', 7741, '73', '2', 'Developer', NULL, NULL, NULL, 'Employee', 0),
('109546', 'Paul', ' Gray  ', '', '', 7243, '74', '1', 'Network Engineer', NULL, NULL, NULL, 'Employee', 0),
('109574', 'Dustin', ' Ramirez  ', '', '', 8177, '75', '1', 'Systems Engineer', NULL, NULL, NULL, 'Employee', 0),
('109586', 'Jessica', ' James  ', '', '', 2743, '76', '0', 'Consultant', NULL, NULL, NULL, 'Admin', 0),
('109592', 'Ashley', ' Watson  ', '', '', 2675, '77', '2', 'Developer', NULL, NULL, NULL, 'Employee', 0),
('109607', 'Brittany', ' Brooks  ', '', '', 1381, '78', '0', 'Consultant', NULL, NULL, NULL, 'Admin', 0),
('109690', 'Amanda', ' Kelly  ', '', '', 7388, '79', '0', 'Consultant', NULL, NULL, NULL, 'Admin', 0),
('109694', 'Samantha', ' Sanders  ', 'R', '', 8516, '80', '6', 'Sr Financial Analyst', NULL, NULL, NULL, '', 0),
('109698', 'Sarah', ' Price  ', '', '', 4794, '81', '6', 'Sr Financial Analyst', NULL, NULL, NULL, '', 0),
('109701', 'Stephanie', ' Bennett  ', 'R', '', 8372, '82', '2', 'Developer', NULL, NULL, NULL, 'Employee', 0),
('109731', 'Jennifer', ' Wood  ', '', '', 5901, '83', '6', 'Financial Analyst', NULL, NULL, NULL, '', 0),
('109754', 'Elizabeth', ' Barnes  ', 'E', '', 7622, '84', '6', 'Financial Analyst', NULL, NULL, NULL, '', 0),
('109784', 'Lauren', ' Ross  ', 'A', '', 4011, '85', '9', 'Trader', NULL, NULL, NULL, 'Admin', 0),
('109803', 'Megan', ' Henderson  ', 'M', '', 5252, '86', '9', 'Trader', NULL, NULL, NULL, 'Admin', 0),
('109836', 'Emily', ' Coleman  ', '', '', 1800, '87', '9', 'Trader', NULL, NULL, NULL, 'Admin', 0),
('109922', 'Nicole', ' Jenkins  ', '', '', 7634, '88', '9998', 'Administrative Assistant', NULL, NULL, NULL, '', 0),
('109948', 'Kayla', ' Perry  ', '', '', 8388, '89', '11', 'Accountant', NULL, NULL, NULL, 'Admin', 0),
('109962', 'Amber', ' Powell  ', 'S', '', 9559, '90', '11', 'Accountant', NULL, NULL, NULL, 'Admin', 0),
('110018', 'Rachel', ' Long  ', 'M', '', 6638, '91', '11', 'Accountant', NULL, NULL, NULL, 'Admin', 0),
('110023', 'Courtney', ' Patterson  ', 'M', '', 9263, '92', '4', 'DBA', NULL, NULL, NULL, 'Employee', 0),
('110024', 'Danielle', ' Hughes  ', '', '', 7597, '93', '11', 'Sr Accountant', NULL, NULL, NULL, 'Admin', 0),
('110064', 'Heather', ' Flores  ', 'B', '', 7415, '94', '11', 'Sr Accountant', NULL, NULL, NULL, 'Admin', 0),
('110067', 'Melissa', ' Washington  ', 'C', '', 2473, '95', '5', 'HR', NULL, NULL, NULL, '', 0),
('110068', 'Rebecca', ' Butler  ', 'P', '', 1473, '96', '11', 'Accountant', NULL, NULL, NULL, 'Admin', 0),
('110105', 'Michelle', ' Simmons  ', '', '', 6553, '97', '9998', 'Administrative Assistant', NULL, NULL, NULL, '', 0),
('110106', 'Tiffany', ' Foster  ', '', '', 6046, '98', '11', 'Sr Accountant', NULL, NULL, NULL, 'Admin', 0),
('110204', 'Chelsea', ' Gonzales  ', '', '', 6915, '99', '11', 'Sr Accountant', NULL, NULL, NULL, 'Admin', 0),
('110216', 'Christina', ' Bryant   ', 'M', '', 1250, '100', '9998', 'Administrative Assistant', NULL, NULL, NULL, '', 0),
('110218', 'Katherine', ' Alexander  ', 'E', '', 5248, '101', '11', 'Sr Accountant', NULL, NULL, NULL, 'Admin', 0),
('110229', 'Alyssa', 'Russell  ', '', '', 8828, '102', '9998', 'Administrative Assistant', NULL, NULL, NULL, '', 0),
('110230', 'Jasmine', ' Griffin   ', '', '', 5454, '103', '11', 'Accountant', NULL, NULL, NULL, 'Admin', 0),
('110237', 'Laura', ' Diaz  ', '', '', 7801, '104', '6', 'Financial Analyst', NULL, NULL, NULL, '', 0),
('110273', 'Hannah', ' Hayes  ', 'E', '', 1282, '105', '11', 'Accountant', NULL, NULL, NULL, 'Admin', 0),
('110277', 'Kimberly', 'Knowles', '', '', 3225, '106', '6', 'Financial Analyst', NULL, NULL, NULL, '', 0),
('110287', 'Kelsey', 'Snipes', 'R', '', 7215, '107', '9998', 'Administrative Assistant', NULL, NULL, NULL, '', 0),
('110288', 'Victoria', 'Flores', '', '', 5450, '108', '6', 'Financial Analyst', NULL, NULL, NULL, '', 0),
('110300', 'Sara', 'Berret', '', '', 9600, '109', '5', 'HR', NULL, NULL, NULL, '', 0);

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
  `BalDue` decimal(10,0) DEFAULT NULL,
  `ResearchActivities` varchar(100) DEFAULT NULL,
  `EMPID` varchar(10) DEFAULT NULL,
  `CompEndDate` date DEFAULT NULL,
  `TimeStamp` timestamp NULL DEFAULT NULL,
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
  `EIN` int(11) NOT NULL,
  `EMPID` varchar(10) DEFAULT NULL,
  `SSN` int(11) DEFAULT NULL,
  `BiWeekSalary` decimal(18,2) DEFAULT NULL,
  `Deductions` decimal(18,2) DEFAULT NULL,
  `HealthCost` decimal(18,2) DEFAULT NULL,
  `MDCTax` decimal(18,2) DEFAULT NULL,
  `SSTax` decimal(18,2) DEFAULT NULL,
  `FEDTax` decimal(18,2) DEFAULT NULL,
  `STATETax` decimal(18,2) DEFAULT NULL,
  `PayrollMonth` varchar(10) NOT NULL,
  KEY `EMPID` (`EMPID`),
  KEY `SSN` (`SSN`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `payroll`
--

INSERT INTO `payroll` (`EIN`, `EMPID`, `SSN`, `BiWeekSalary`, `Deductions`, `HealthCost`, `MDCTax`, `SSTax`, `FEDTax`, `STATETax`, `PayrollMonth`) VALUES
(135564938, '2462', 1898, '200.15', '0.00', '0.00', '2.90', '12.41', '22.05', '8.15', 'Jan'),
(135564938, '7547', 9089, '47.06', '0.00', '0.00', '0.68', '2.92', '8.58', '0.44', 'Jan'),
(135564938, '20048', 7648, '12.99', '0.00', '0.00', '0.19', '0.81', '0.00', '0.00', 'Jan'),
(135564938, '79129', 6944, '61.90', '0.00', '0.00', '0.90', '3.84', '0.00', '0.00', 'Jan'),
(135564938, '79449', 1124, '612.69', '0.00', '0.00', '8.88', '37.99', '12.13', '15.40', 'Jan'),
(135564938, '83828', 9043, '61.90', '0.00', '0.00', '0.90', '3.84', '0.00', '0.00', 'Jan'),
(135564938, '86157', 3450, '938.42', '0.00', '13317.15', '13.61', '58.18', '168.20', '62.47', 'Jan'),
(135564938, '100007', 2123, '61.22', '0.00', '0.00', '0.89', '3.80', '0.21', '0.08', 'Jan'),
(135564938, '100241', 5358, '325.04', '0.00', '4866.00', '4.71', '20.15', '29.58', '20.52', 'Jan'),
(135564938, '100471', 9244, '63.17', '0.00', '0.00', '0.92', '3.92', '7.26', '2.35', 'Jan'),
(135564938, '100997', 9546, '17.48', '0.00', '0.00', '0.25', '1.08', '4.37', '1.68', 'Jan'),
(135564938, '102251', 2379, '450.83', '0.00', '0.00', '6.54', '27.95', '48.51', '22.02', 'Jan'),
(135564938, '102670', 7387, '180.16', '0.00', '0.00', '2.61', '11.17', '34.51', '10.30', 'Jan'),
(135564938, '103189', 2897, '90.53', '0.00', '0.00', '1.31', '5.61', '4.21', '0.13', 'Jan'),
(135564938, '103212', 1115, '3.14', '0.00', '0.00', '0.05', '0.19', '0.00', '0.00', 'Jan'),
(135564938, '103220', 3136, '1656.86', '0.00', '17538.84', '24.02', '102.73', '278.10', '79.00', 'Jan'),
(135564938, '103422', 1204, '3306.68', '5200.00', '9932.16', '47.95', '205.01', '514.30', '166.11', 'Jan'),
(135564938, '103567', 9066, '930.43', '1425.00', '827.36', '13.49', '57.69', '109.01', '33.72', 'Jan'),
(135564938, '103745', 9932, '91.45', '0.00', '0.00', '1.33', '5.67', '0.48', '0.92', 'Jan'),
(135564938, '104043', 1164, '638.93', '0.00', '0.00', '9.26', '39.61', '85.17', '24.14', 'Jan'),
(135564938, '104483', 5347, '687.94', '0.00', '0.00', '9.98', '42.65', '17.76', '16.29', 'Jan'),
(135564938, '104867', 7938, '95.23', '0.00', '0.00', '1.38', '5.90', '8.80', '1.80', 'Jan'),
(135564938, '104892', 5579, '60.96', '0.00', '0.00', '0.88', '3.78', '4.43', '0.05', 'Jan'),
(135564938, '104946', 7225, '769.03', '4800.00', '0.00', '11.15', '47.68', '43.44', '19.74', 'Jan'),
(135564938, '105079', 1997, '128.95', '0.00', '0.00', '1.87', '7.99', '22.35', '6.95', 'Jan'),
(135564938, '105137', 5797, '1207.74', '0.00', '2626.75', '17.51', '74.88', '204.03', '60.52', 'Jan'),
(135564938, '105400', 6748, '2889.94', '0.00', '7523.61', '41.90', '179.18', '765.46', '186.85', 'Jan'),
(135564938, '105724', 2741, '1009.63', '0.00', '2917.60', '14.64', '62.60', '146.42', '70.95', 'Jan'),
(135564938, '106129', 9143, '213.62', '0.00', '0.00', '3.10', '13.24', '48.79', '13.61', 'Jan'),
(135564938, '106268', 3765, '997.11', '1100.00', '4076.51', '14.46', '61.82', '112.31', '47.94', 'Jan'),
(135564938, '106516', 3076, '1665.54', '0.00', '3358.62', '24.15', '103.26', '345.41', '99.74', 'Jan'),
(135564938, '106538', 5244, '2702.45', '0.00', '15340.06', '39.19', '167.55', '341.44', '149.12', 'Jan'),
(135564938, '106917', 2590, '868.42', '0.00', '3648.20', '12.59', '53.84', '126.84', '42.67', 'Jan'),
(135564938, '107004', 5061, '111.30', '0.00', '13604.98', '1.61', '6.90', '13.80', '3.54', 'Jan'),
(135564938, '107198', 4627, '256.73', '0.00', '0.00', '3.72', '15.92', '8.21', '3.78', 'Jan'),
(135564938, '107319', 3015, '46.15', '0.00', '0.00', '0.67', '2.86', '0.95', '0.81', 'Jan'),
(135564938, '107365', 7247, '0.00', '0.00', '3939.75', '0.00', '0.00', '0.00', '0.00', 'Jan'),
(135564938, '107428', 1989, '1516.21', '750.00', '21410.40', '21.99', '94.01', '174.30', '64.66', 'Jan'),
(135564938, '107603', 2442, '70.25', '0.00', '0.00', '1.02', '4.36', '4.50', '1.82', 'Jan'),
(135564938, '108079', 4368, '158.56', '0.00', '28.20', '2.30', '9.83', '5.59', '4.87', 'Jan'),
(135564938, '108143', 3615, '557.66', '0.00', '0.00', '8.09', '34.58', '26.42', '15.68', 'Jan'),
(135564938, '108188', 5476, '878.85', '0.00', '0.00', '12.74', '54.49', '89.00', '30.51', 'Jan'),
(135564938, '108306', 6572, '0.83', '0.00', '0.00', '0.01', '0.05', '0.00', '0.00', 'Jan'),
(135564938, '108402', 3708, '48.65', '0.00', '0.00', '0.71', '3.02', '0.00', '0.34', 'Jan'),
(135564938, '108518', 6363, '1602.41', '0.00', '16167.42', '23.24', '99.35', '183.80', '81.58', 'Jan'),
(135564938, '108519', 8971, '396.59', '0.00', '8521.50', '5.75', '24.59', '48.95', '15.18', 'Jan'),
(135564938, '108551', 9046, '33.71', '0.00', '0.00', '0.49', '2.09', '1.71', '0.00', 'Jan'),
(135564938, '108556', 2520, '2284.21', '0.00', '0.00', '33.12', '141.62', '362.34', '116.81', 'Jan'),
(135564938, '108589', 9292, '270.11', '0.00', '0.00', '3.92', '16.75', '13.82', '3.77', 'Jan'),
(135564938, '108623', 8438, '110.72', '0.00', '0.00', '1.61', '6.86', '0.00', '1.11', 'Jan'),
(135564938, '108656', 5461, '563.95', '0.00', '6353.71', '8.18', '34.96', '73.83', '15.14', 'Jan'),
(135564938, '108733', 5029, '1566.10', '800.00', '18513.22', '22.71', '97.10', '210.00', '72.93', 'Jan'),
(135564938, '108740', 7076, '166.32', '0.00', '0.00', '2.41', '10.31', '0.21', '0.00', 'Jan'),
(135564938, '108757', 6069, '535.31', '0.00', '0.00', '7.76', '33.19', '67.69', '20.91', 'Jan'),
(135564938, '108840', 4432, '917.32', '0.00', '17533.30', '13.30', '56.87', '98.58', '34.28', 'Jan'),
(135564938, '108922', 3863, '148.33', '0.00', '0.00', '2.15', '9.20', '10.65', '1.07', 'Jan'),
(135564938, '108969', 3301, '902.02', '0.00', '0.00', '13.08', '55.93', '106.67', '30.78', 'Jan'),
(135564938, '109089', 2694, '578.77', '0.00', '0.00', '8.39', '35.88', '53.16', '17.75', 'Jan'),
(135564938, '109093', 4505, '94.62', '0.00', '0.00', '1.37', '5.87', '5.47', '0.01', 'Jan'),
(135564938, '109096', 9677, '375.47', '0.00', '0.00', '5.44', '23.28', '49.76', '16.00', 'Jan'),
(135564938, '109135', 7192, '70.40', '0.00', '0.00', '1.02', '4.36', '10.41', '3.30', 'Jan'),
(135564938, '109281', 7028, '51.02', '0.00', '0.00', '0.74', '3.16', '4.18', '0.75', 'Jan'),
(135564938, '109322', 6353, '311.54', '0.00', '0.00', '4.52', '19.32', '29.97', '12.24', 'Jan'),
(135564938, '109325', 5044, '748.75', '0.00', '0.00', '10.86', '46.42', '86.30', '23.88', 'Jan'),
(135564938, '109366', 6119, '101.15', '0.00', '1943.22', '1.47', '6.27', '9.33', '3.78', 'Jan'),
(135564938, '109372', 6702, '757.45', '0.00', '5569.23', '10.98', '46.96', '66.84', '26.97', 'Jan'),
(135564938, '109403', 3983, '227.05', '0.00', '0.00', '3.29', '14.08', '9.22', '2.57', 'Jan'),
(135564938, '109430', 7788, '0.92', '0.00', '0.00', '0.01', '0.06', '0.00', '0.00', 'Jan'),
(135564938, '109442', 7995, '67.96', '0.00', '0.00', '0.99', '4.21', '3.53', '0.00', 'Jan'),
(135564938, '109452', 7292, '82.38', '0.00', '0.00', '1.19', '5.11', '4.15', '0.00', 'Jan'),
(135564938, '109471', 8391, '41.26', '0.00', '0.00', '0.60', '2.56', '2.79', '0.20', 'Jan'),
(135564938, '109517', 6666, '454.62', '0.00', '0.00', '6.59', '28.19', '26.05', '11.94', 'Jan'),
(135564938, '109520', 7741, '411.73', '0.00', '0.00', '5.97', '25.53', '12.53', '12.16', 'Jan'),
(135564938, '109546', 7243, '185.34', '0.00', '0.00', '2.69', '11.49', '8.67', '2.15', 'Jan'),
(135564938, '109574', 8177, '781.18', '0.00', '0.00', '11.33', '48.43', '69.58', '19.04', 'Jan'),
(135564938, '109586', 2743, '166.54', '0.00', '0.00', '2.42', '10.33', '12.07', '1.46', 'Jan'),
(135564938, '109592', 2675, '39.02', '0.00', '0.00', '0.57', '2.42', '2.57', '0.09', 'Jan'),
(135564938, '109607', 1381, '837.45', '0.00', '8483.36', '12.14', '51.92', '99.06', '27.71', 'Jan'),
(135564938, '109690', 7388, '280.92', '0.00', '0.00', '4.07', '17.42', '29.55', '6.96', 'Jan'),
(135564938, '109694', 8516, '221.04', '0.00', '0.00', '3.21', '13.70', '15.05', '4.77', 'Jan'),
(135564938, '109698', 4794, '586.78', '0.00', '6900.93', '8.51', '36.38', '19.70', '26.77', 'Jan'),
(135564938, '109701', 8372, '549.04', '0.00', '0.00', '7.96', '34.04', '52.39', '13.98', 'Jan'),
(135564938, '109731', 5901, '20.80', '0.00', '16664.13', '0.30', '1.29', '0.52', '0.26', 'Jan'),
(135564938, '109754', 7622, '1556.06', '0.00', '22974.49', '22.56', '96.48', '133.33', '67.80', 'Jan'),
(135564938, '109784', 4011, '57.44', '0.00', '0.00', '0.83', '3.56', '1.83', '0.76', 'Jan'),
(135564938, '109803', 5252, '10.70', '0.00', '0.00', '0.16', '0.66', '0.00', '0.00', 'Jan'),
(135564938, '109836', 1800, '172.67', '0.00', '0.00', '2.50', '10.71', '13.81', '4.04', 'Jan'),
(135564938, '109922', 7634, '1311.10', '1680.00', '7728.35', '19.01', '81.29', '209.43', '63.69', 'Jan'),
(135564938, '109948', 8388, '115.85', '0.00', '0.00', '1.68', '7.18', '5.40', '1.48', 'Jan'),
(135564938, '109962', 9559, '31.35', '0.00', '0.00', '0.45', '1.94', '1.36', '8.76', 'Jan'),
(135564938, '110018', 6638, '1048.96', '0.00', '14423.55', '15.21', '65.04', '64.25', '44.97', 'Jan'),
(135564938, '110023', 9263, '26.97', '0.00', '1400.03', '0.39', '1.67', '2.62', '0.59', 'Jan'),
(135564938, '110024', 7597, '1296.92', '0.00', '0.00', '18.81', '80.41', '213.70', '62.64', 'Jan'),
(135564938, '110064', 7415, '60.96', '0.00', '0.00', '0.88', '3.78', '0.13', '0.00', 'Jan'),
(135564938, '110067', 2473, '789.42', '0.00', '0.00', '11.45', '48.94', '40.80', '23.80', 'Jan'),
(135564938, '110068', 1473, '178.08', '0.00', '0.00', '2.58', '11.04', '0.00', '2.11', 'Jan'),
(135564938, '110105', 6553, '176.26', '0.00', '0.00', '2.56', '10.93', '12.92', '1.30', 'Jan'),
(135564938, '110106', 6046, '153.08', '0.00', '0.00', '2.22', '9.49', '0.00', '0.00', 'Jan'),
(135564938, '110204', 6915, '532.88', '0.00', '0.00', '7.73', '33.04', '7.67', '12.72', 'Jan'),
(135564938, '110216', 1250, '564.11', '0.00', '0.00', '8.18', '34.97', '37.20', '18.30', 'Jan'),
(135564938, '110218', 5248, '781.15', '0.00', '0.00', '11.33', '48.43', '83.59', '29.77', 'Jan'),
(135564938, '110229', 8828, '1166.81', '0.00', '7035.28', '16.92', '72.34', '161.81', '52.89', 'Jan'),
(135564938, '110230', 5454, '400.38', '0.00', '0.00', '5.81', '24.82', '43.01', '10.36', 'Jan'),
(135564938, '110237', 7801, '82.78', '0.00', '0.00', '1.20', '5.13', '10.08', '2.98', 'Jan'),
(135564938, '110273', 1282, '222.69', '0.00', '0.00', '3.23', '13.81', '8.60', '2.00', 'Jan'),
(135564938, '110277', 3225, '9.42', '0.00', '0.00', '0.14', '0.58', '0.28', '0.00', 'Jan'),
(135564938, '110287', 7215, '162.69', '0.00', '0.00', '2.36', '10.09', '9.92', '0.52', 'Jan'),
(135564938, '110288', 5450, '141.15', '0.00', '0.00', '2.05', '8.75', '9.35', '2.76', 'Jan'),
(135564938, '110300', 9600, '259.62', '0.00', '0.00', '3.76', '16.10', '32.72', '9.79', 'Jan');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `created_at`) VALUES
(20048, 'calise', '$2y$10$lbqRNeb/xACuCpdnNoHJP.wSpNRvMCq1SHIL/SGjBd6JmI5RZ7Xn2', '2020-02-20 22:19:35'),
(2462, 'cwasserman', '$2y$10$m4bg9NOYkRCRZJfnXfx33.K.rqHtRdu110uVrMRhVB9kS3UbMElQK', '2020-03-08 11:24:27'),
(79449, 'cristian', '$2y$10$fa04tpiGv1lFsyJ7/sPZz.DTDMhqE3S0JIhyWfs1kb5Cc/rno9WnK', '2020-04-04 12:27:51');

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

--
-- Dumping data for table `w4`
--

INSERT INTO `w4` (`SSN`, `AddressID`, `FilingStatus`, `DifferentFileStatus`, `EIN`, `OtherIncome`, `Deductions`, `ExtraWithholding`, `MultiEmploy`, `EffectDateWithold`, `TermDateWithold`) VALUES
(9089, '2', 'Married', NULL, 135564938, 0, 0, 0, NULL, NULL, NULL),
(7648, '3', 'Married', NULL, 135564938, 0, 0, 0, NULL, NULL, NULL),
(6944, '4', 'Married', NULL, 135564938, 0, 0, 0, NULL, NULL, NULL),
(1124, '5', 'Married', NULL, 135564938, 0, 0, 0, NULL, NULL, NULL),
(9043, '6', 'Married', NULL, 135564938, 0, 0, 0, NULL, NULL, NULL),
(3450, '7', 'Married', NULL, 135564938, 0, 0, 0, NULL, NULL, NULL),
(2123, '8', 'Married', NULL, 135564938, 0, 0, 0, NULL, NULL, NULL),
(5358, '9', 'Married', NULL, 135564938, 0, 0, 0, NULL, NULL, NULL),
(9244, '10', 'Single', NULL, 135564938, 0, 0, 0, NULL, NULL, NULL),
(9546, '11', 'Single', NULL, 135564938, 0, 0, 0, NULL, NULL, NULL),
(2379, '12', 'Married', NULL, 135564938, 0, 0, 0, NULL, NULL, NULL),
(7387, '13', 'Single', NULL, 135564938, 0, 0, 0, NULL, NULL, NULL),
(2897, '14', 'Single', NULL, 135564938, 0, 0, 0, NULL, NULL, NULL),
(1115, '15', 'Single', NULL, 135564938, 0, 0, 0, NULL, NULL, NULL),
(3136, '16', 'Single', NULL, 135564938, 0, 0, 0, NULL, NULL, NULL),
(1204, '17', 'Single', NULL, 135564938, 0, 0, 0, NULL, NULL, NULL),
(9066, '18', 'Single', NULL, 135564938, 0, 0, 0, NULL, NULL, NULL),
(9932, '19', 'Married', NULL, 135564938, 0, 0, 0, NULL, NULL, NULL),
(1164, '20', 'Single', NULL, 135564938, 0, 0, 0, NULL, NULL, NULL),
(5347, '21', 'Married', NULL, 135564938, 0, 0, 0, NULL, NULL, NULL),
(7938, '22', 'Single', NULL, 135564938, 0, 0, 0, NULL, NULL, NULL),
(5579, '23', 'Single', NULL, 135564938, 0, 0, 0, NULL, NULL, NULL),
(7225, '24', 'Married', NULL, 135564938, 0, 0, 0, NULL, NULL, NULL),
(1997, '25', 'Single', NULL, 135564938, 0, 0, 0, NULL, NULL, NULL),
(5797, '26', 'Single', NULL, 135564938, 0, 0, 0, NULL, NULL, NULL),
(6748, '27', 'Single', NULL, 135564938, 0, 0, 0, NULL, NULL, NULL),
(2741, '28', 'Single', NULL, 135564938, 0, 0, 0, NULL, NULL, NULL),
(9143, '29', 'Single', NULL, 135564938, 0, 0, 0, NULL, NULL, NULL),
(3765, '30', 'Married', NULL, 135564938, 0, 0, 0, NULL, NULL, NULL),
(3076, '31', 'Single', NULL, 135564938, 0, 0, 0, NULL, NULL, NULL),
(5244, '32', 'Married', NULL, 135564938, 0, 0, 0, NULL, NULL, NULL),
(2590, '33', 'Single', NULL, 135564938, 0, 0, 0, NULL, NULL, NULL),
(5061, '34', 'Single', NULL, 135564938, 0, 0, 0, NULL, NULL, NULL),
(4627, '35', 'Married', NULL, 135564938, 0, 0, 0, NULL, NULL, NULL),
(3015, '36', 'Married', NULL, 135564938, 0, 0, 0, NULL, NULL, NULL),
(7247, '37', 'Single', NULL, 135564938, 0, 0, 0, NULL, NULL, NULL),
(1989, '38', 'Single', NULL, 135564938, 0, 0, 0, NULL, NULL, NULL),
(2442, '39', 'Single', NULL, 135564938, 0, 0, 0, NULL, NULL, NULL),
(4368, '40', 'Married', NULL, 135564938, 0, 0, 0, NULL, NULL, NULL),
(3615, '41', 'Married', NULL, 135564938, 0, 0, 0, NULL, NULL, NULL),
(5476, '42', 'Single', NULL, 135564938, 0, 0, 0, NULL, NULL, NULL),
(6572, '43', 'Single', NULL, 135564938, 0, 0, 0, NULL, NULL, NULL),
(3708, '44', 'Married', NULL, 135564938, 0, 0, 0, NULL, NULL, NULL),
(6363, '45', 'Married', NULL, 135564938, 0, 0, 0, NULL, NULL, NULL),
(8971, '46', 'Single', NULL, 135564938, 0, 0, 0, NULL, NULL, NULL),
(9046, '47', 'Single', NULL, 135564938, 0, 0, 0, NULL, NULL, NULL),
(2520, '48', 'Single', NULL, 135564938, 0, 0, 0, NULL, NULL, NULL),
(9292, '49', 'Single', NULL, 135564938, 0, 0, 0, NULL, NULL, NULL),
(8438, '50', 'Married', NULL, 135564938, 0, 0, 0, NULL, NULL, NULL),
(5461, '51', 'Single', NULL, 135564938, 0, 0, 0, NULL, NULL, NULL),
(5029, '52', 'Single', NULL, 135564938, 0, 0, 0, NULL, NULL, NULL),
(7076, '53', 'Single', NULL, 135564938, 0, 0, 0, NULL, NULL, NULL),
(6069, '54', 'Single', NULL, 135564938, 0, 0, 0, NULL, NULL, NULL),
(4432, '55', 'Single', NULL, 135564938, 0, 0, 0, NULL, NULL, NULL),
(3863, '56', 'Single', NULL, 135564938, 0, 0, 0, NULL, NULL, NULL),
(3301, '57', 'Single', NULL, 135564938, 0, 0, 0, NULL, NULL, NULL),
(2694, '58', 'Single', NULL, 135564938, 0, 0, 0, NULL, NULL, NULL),
(4505, '59', 'Single', NULL, 135564938, 0, 0, 0, NULL, NULL, NULL),
(9677, '60', 'Single', NULL, 135564938, 0, 0, 0, NULL, NULL, NULL),
(7192, '61', 'Single', NULL, 135564938, 0, 0, 0, NULL, NULL, NULL),
(7028, '62', 'Single', NULL, 135564938, 0, 0, 0, NULL, NULL, NULL),
(6353, '63', 'Single', NULL, 135564938, 0, 0, 0, NULL, NULL, NULL),
(5044, '64', 'Single', NULL, 135564938, 0, 0, 0, NULL, NULL, NULL),
(6119, '65', 'Single', NULL, 135564938, 0, 0, 0, NULL, NULL, NULL),
(6702, '66', 'Single', NULL, 135564938, 0, 0, 0, NULL, NULL, NULL),
(3983, '67', 'Single', NULL, 135564938, 0, 0, 0, NULL, NULL, NULL),
(7788, '68', 'Single', NULL, 135564938, 0, 0, 0, NULL, NULL, NULL),
(7995, '69', 'Single', NULL, 135564938, 0, 0, 0, NULL, NULL, NULL),
(7292, '70', 'Single', NULL, 135564938, 0, 0, 0, NULL, NULL, NULL),
(8391, '71', 'Single', NULL, 135564938, 0, 0, 0, NULL, NULL, NULL),
(6666, '72', 'Married', NULL, 135564938, 0, 0, 0, NULL, NULL, NULL),
(7741, '73', 'Married', NULL, 135564938, 0, 0, 0, NULL, NULL, NULL),
(7243, '74', 'Single', NULL, 135564938, 0, 0, 0, NULL, NULL, NULL),
(8177, '75', 'Single', NULL, 135564938, 0, 0, 0, NULL, NULL, NULL),
(2743, '76', 'Single', NULL, 135564938, 0, 0, 0, NULL, NULL, NULL),
(2675, '77', 'Single', NULL, 135564938, 0, 0, 0, NULL, NULL, NULL),
(1381, '78', 'Single', NULL, 135564938, 0, 0, 0, NULL, NULL, NULL),
(7388, '79', 'Single', NULL, 135564938, 0, 0, 0, NULL, NULL, NULL),
(8516, '80', 'Single', NULL, 135564938, 0, 0, 0, NULL, NULL, NULL),
(4794, '81', 'Single', NULL, 135564938, 0, 0, 0, NULL, NULL, NULL),
(8372, '82', 'Single', NULL, 135564938, 0, 0, 0, NULL, NULL, NULL),
(5901, '83', 'Single', NULL, 135564938, 0, 0, 0, NULL, NULL, NULL),
(7622, '84', 'Married', NULL, 135564938, 0, 0, 0, NULL, NULL, NULL),
(4011, '85', 'Single', NULL, 135564938, 0, 0, 0, NULL, NULL, NULL),
(5252, '86', 'Married', NULL, 135564938, 0, 0, 0, NULL, NULL, NULL),
(1800, '87', 'Single', NULL, 135564938, 0, 0, 0, NULL, NULL, NULL),
(7634, '88', 'Single', NULL, 135564938, 0, 0, 0, NULL, NULL, NULL),
(8388, '89', 'Single', NULL, 135564938, 0, 0, 0, NULL, NULL, NULL),
(9559, '90', 'Single', NULL, 135564938, 0, 0, 0, NULL, NULL, NULL),
(6638, '91', 'Married', NULL, 135564938, 0, 0, 0, NULL, NULL, NULL),
(9263, '92', 'Single', NULL, 135564938, 0, 0, 0, NULL, NULL, NULL),
(7597, '93', 'Single', NULL, 135564938, 0, 0, 0, NULL, NULL, NULL),
(7415, '94', 'Single', NULL, 135564938, 0, 0, 0, NULL, NULL, NULL),
(2473, '95', 'Married', NULL, 135564938, 0, 0, 0, NULL, NULL, NULL),
(1473, '96', 'Married', NULL, 135564938, 0, 0, 0, NULL, NULL, NULL),
(6553, '97', 'Single', NULL, 135564938, 0, 0, 0, NULL, NULL, NULL),
(6046, '98', 'Single', NULL, 135564938, 0, 0, 0, NULL, NULL, NULL),
(6915, '99', 'Married', NULL, 135564938, 0, 0, 0, NULL, NULL, NULL),
(1250, '100', 'Single', NULL, 135564938, 0, 0, 0, NULL, NULL, NULL),
(5248, '101', 'Single', NULL, 135564938, 0, 0, 0, NULL, NULL, NULL),
(8828, '102', 'Single', NULL, 135564938, 0, 0, 0, NULL, NULL, NULL),
(5454, '103', 'Single', NULL, 135564938, 0, 0, 0, NULL, NULL, NULL),
(7801, '104', 'Single', NULL, 135564938, 0, 0, 0, NULL, NULL, NULL),
(1282, '105', 'Single', NULL, 135564938, 0, 0, 0, NULL, NULL, NULL),
(3225, '106', 'Single', NULL, 135564938, 0, 0, 0, NULL, NULL, NULL),
(7215, '107', 'Single', NULL, 135564938, 0, 0, 0, NULL, NULL, NULL),
(5450, '108', 'Single', NULL, 135564938, 0, 0, 0, NULL, NULL, NULL),
(9600, '109', 'Single', NULL, 135564938, 0, 0, 0, NULL, NULL, NULL);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
