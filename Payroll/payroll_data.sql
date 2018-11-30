-- phpMyAdmin SQL Dump
-- version 3.3.9
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jul 09, 2018 at 01:00 PM
-- Server version: 5.5.8
-- PHP Version: 5.3.5

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `payroll_data`
--

-- --------------------------------------------------------

--
-- Table structure for table `allowances`
--

CREATE TABLE IF NOT EXISTS `allowances` (
  `allowance_ID` int(3) NOT NULL AUTO_INCREMENT,
  `Allowance` varchar(30) NOT NULL,
  `Allowance_Percent` int(2) unsigned NOT NULL,
  PRIMARY KEY (`allowance_ID`),
  UNIQUE KEY `allowance_ID` (`allowance_ID`),
  UNIQUE KEY `Allowance` (`Allowance`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `allowances`
--

INSERT INTO `allowances` (`allowance_ID`, `Allowance`, `Allowance_Percent`) VALUES
(1, 'House', 12),
(2, 'Transport', 5),
(3, 'Communication', 5),
(4, 'Responsibility', 5);

-- --------------------------------------------------------

--
-- Table structure for table `allowances_employees`
--

CREATE TABLE IF NOT EXISTS `allowances_employees` (
  `allow_emp_ID` int(10) NOT NULL AUTO_INCREMENT,
  `ID` int(10) NOT NULL,
  `allowance_ID` int(3) DEFAULT NULL,
  PRIMARY KEY (`allow_emp_ID`),
  UNIQUE KEY `allow_emp_ID` (`allow_emp_ID`),
  KEY `ID` (`ID`),
  KEY `allowance_ID` (`allowance_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `allowances_employees`
--

INSERT INTO `allowances_employees` (`allow_emp_ID`, `ID`, `allowance_ID`) VALUES
(3, 2, 1),
(5, 2, 3),
(6, 3, 1);

-- --------------------------------------------------------

--
-- Table structure for table `allowances_payments`
--

CREATE TABLE IF NOT EXISTS `allowances_payments` (
  `allow_pay_ID` int(11) NOT NULL AUTO_INCREMENT,
  `sal_pay_ID` int(11) NOT NULL,
  `allowance_ID` int(3) DEFAULT NULL,
  PRIMARY KEY (`allow_pay_ID`),
  UNIQUE KEY `allow_pay_ID` (`allow_pay_ID`),
  KEY `sal_pay_ID` (`sal_pay_ID`),
  KEY `allowance_ID` (`allowance_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `allowances_payments`
--

INSERT INTO `allowances_payments` (`allow_pay_ID`, `sal_pay_ID`, `allowance_ID`) VALUES
(1, 1, 1),
(2, 1, 2),
(3, 1, 3);

-- --------------------------------------------------------

--
-- Table structure for table `deductions`
--

CREATE TABLE IF NOT EXISTS `deductions` (
  `deduction_ID` int(3) NOT NULL AUTO_INCREMENT,
  `Deduction` varchar(20) NOT NULL,
  PRIMARY KEY (`deduction_ID`),
  UNIQUE KEY `deduction_ID` (`deduction_ID`),
  UNIQUE KEY `Deduction` (`Deduction`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `deductions`
--

INSERT INTO `deductions` (`deduction_ID`, `Deduction`) VALUES
(3, 'LAPF'),
(4, 'Loan Board'),
(1, 'NSSF');

-- --------------------------------------------------------

--
-- Table structure for table `deductions_employees`
--

CREATE TABLE IF NOT EXISTS `deductions_employees` (
  `ded_emp_ID` int(10) NOT NULL AUTO_INCREMENT,
  `ID` int(10) NOT NULL,
  `deduction_ID` int(3) DEFAULT NULL,
  `Deduction_Percent` int(2) NOT NULL,
  `Description` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`ded_emp_ID`),
  UNIQUE KEY `ded_emp_ID` (`ded_emp_ID`),
  KEY `ID` (`ID`),
  KEY `deduction_ID` (`deduction_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `deductions_employees`
--

INSERT INTO `deductions_employees` (`ded_emp_ID`, `ID`, `deduction_ID`, `Deduction_Percent`, `Description`) VALUES
(1, 2, 1, 10, NULL),
(2, 2, 4, 15, NULL),
(3, 3, 4, 15, 'Loan Board'),
(4, 3, 3, 10, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `deductions_payments`
--

CREATE TABLE IF NOT EXISTS `deductions_payments` (
  `ded_pay_ID` int(11) NOT NULL AUTO_INCREMENT,
  `sal_pay_ID` int(11) NOT NULL,
  `deduction_ID` int(3) DEFAULT NULL,
  PRIMARY KEY (`ded_pay_ID`),
  UNIQUE KEY `ded_pay_ID` (`ded_pay_ID`),
  KEY `sal_pay_ID` (`sal_pay_ID`),
  KEY `deduction_ID` (`deduction_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `deductions_payments`
--

INSERT INTO `deductions_payments` (`ded_pay_ID`, `sal_pay_ID`, `deduction_ID`) VALUES
(1, 1, 1),
(2, 1, 4),
(3, 2, 4),
(4, 2, 3);

-- --------------------------------------------------------

--
-- Table structure for table `employees`
--

CREATE TABLE IF NOT EXISTS `employees` (
  `ID` int(10) NOT NULL AUTO_INCREMENT,
  `employee_ID` varchar(20) NOT NULL,
  `Full_Name` varchar(50) NOT NULL,
  `Title` varchar(15) NOT NULL,
  `Position` varchar(50) NOT NULL,
  `Mobile` varchar(20) NOT NULL,
  `Email` varchar(30) NOT NULL,
  `Bank_Name` varchar(30) DEFAULT NULL,
  `Bank_Acount` varchar(30) DEFAULT NULL,
  `Basic_Salary` decimal(10,2) NOT NULL,
  PRIMARY KEY (`ID`),
  UNIQUE KEY `ID` (`ID`),
  UNIQUE KEY `employee_ID` (`employee_ID`),
  UNIQUE KEY `Full_Name` (`Full_Name`),
  UNIQUE KEY `Mobile` (`Mobile`),
  UNIQUE KEY `Email` (`Email`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `employees`
--

INSERT INTO `employees` (`ID`, `employee_ID`, `Full_Name`, `Title`, `Position`, `Mobile`, `Email`, `Bank_Name`, `Bank_Acount`, `Basic_Salary`) VALUES
(2, 'HSE/Man/002', 'Nassoro Juma', 'Mr.', 'Manager', '0652412446', 'nassorojuma32@gmail.com', 'NMB', '61301301801', '665000.00'),
(3, 'HSE/Man/003', 'George Kinyata', 'Mr.', 'Manager', '0764567576', 'gkinyata@gmail.com', 'CRDB', '0150350842500', '1200000.00');

-- --------------------------------------------------------

--
-- Table structure for table `salary_payments`
--

CREATE TABLE IF NOT EXISTS `salary_payments` (
  `sal_pay_ID` int(11) NOT NULL AUTO_INCREMENT,
  `ID` int(10) NOT NULL,
  `sal_pay_date_ID` int(10) DEFAULT NULL,
  PRIMARY KEY (`sal_pay_ID`),
  UNIQUE KEY `sal_pay_ID` (`sal_pay_ID`),
  KEY `ID` (`ID`),
  KEY `sal_pay_date_ID` (`sal_pay_date_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `salary_payments`
--

INSERT INTO `salary_payments` (`sal_pay_ID`, `ID`, `sal_pay_date_ID`) VALUES
(1, 2, 1),
(2, 3, 1);

-- --------------------------------------------------------

--
-- Table structure for table `salary_payment_dates`
--

CREATE TABLE IF NOT EXISTS `salary_payment_dates` (
  `sal_pay_date_ID` int(10) NOT NULL AUTO_INCREMENT,
  `Month` varchar(2) NOT NULL,
  `Year` year(4) NOT NULL,
  `Payment_Date` date NOT NULL,
  `userID` int(5) DEFAULT NULL,
  PRIMARY KEY (`sal_pay_date_ID`),
  UNIQUE KEY `sal_pay_date_ID` (`sal_pay_date_ID`),
  KEY `userID` (`userID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `salary_payment_dates`
--

INSERT INTO `salary_payment_dates` (`sal_pay_date_ID`, `Month`, `Year`, `Payment_Date`, `userID`) VALUES
(1, '06', 2018, '2018-06-29', 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `userID` int(5) NOT NULL AUTO_INCREMENT,
  `Name` varchar(50) NOT NULL,
  `Title` varchar(15) NOT NULL,
  `Position` varchar(50) NOT NULL,
  `Username` varchar(50) NOT NULL,
  `Password` varchar(50) NOT NULL,
  PRIMARY KEY (`userID`),
  UNIQUE KEY `Password` (`Password`),
  UNIQUE KEY `userID` (`userID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`userID`, `Name`, `Title`, `Position`, `Username`, `Password`) VALUES
(1, 'Noel Kababaye', 'Mr.', 'Burser', 'Admin', 'd033e22ae348aeb5660fc2140aec35850c4da997');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `allowances_employees`
--
ALTER TABLE `allowances_employees`
  ADD CONSTRAINT `allowances_employees_ibfk_1` FOREIGN KEY (`ID`) REFERENCES `employees` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `allowances_employees_ibfk_2` FOREIGN KEY (`allowance_ID`) REFERENCES `allowances` (`allowance_ID`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `allowances_payments`
--
ALTER TABLE `allowances_payments`
  ADD CONSTRAINT `allowances_payments_ibfk_1` FOREIGN KEY (`sal_pay_ID`) REFERENCES `salary_payments` (`sal_pay_ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `allowances_payments_ibfk_2` FOREIGN KEY (`allowance_ID`) REFERENCES `allowances` (`allowance_ID`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `deductions_employees`
--
ALTER TABLE `deductions_employees`
  ADD CONSTRAINT `deductions_employees_ibfk_1` FOREIGN KEY (`ID`) REFERENCES `employees` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `deductions_employees_ibfk_2` FOREIGN KEY (`deduction_ID`) REFERENCES `deductions` (`deduction_ID`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `deductions_payments`
--
ALTER TABLE `deductions_payments`
  ADD CONSTRAINT `deductions_payments_ibfk_1` FOREIGN KEY (`sal_pay_ID`) REFERENCES `salary_payments` (`sal_pay_ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `deductions_payments_ibfk_2` FOREIGN KEY (`deduction_ID`) REFERENCES `deductions` (`deduction_ID`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `salary_payments`
--
ALTER TABLE `salary_payments`
  ADD CONSTRAINT `salary_payments_ibfk_1` FOREIGN KEY (`ID`) REFERENCES `employees` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `salary_payments_ibfk_2` FOREIGN KEY (`sal_pay_date_ID`) REFERENCES `salary_payment_dates` (`sal_pay_date_ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `salary_payment_dates`
--
ALTER TABLE `salary_payment_dates`
  ADD CONSTRAINT `salary_payment_dates_ibfk_1` FOREIGN KEY (`userID`) REFERENCES `users` (`userID`) ON DELETE SET NULL ON UPDATE CASCADE;
