-- phpMyAdmin SQL Dump
-- version 3.2.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Apr 03, 2014 at 12:00 PM
-- Server version: 5.0.15
-- PHP Version: 5.3.1

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `ebanking`
--

-- --------------------------------------------------------

--
-- Table structure for table `account`
--

CREATE TABLE IF NOT EXISTS `account` (
  `accno` int(11) NOT NULL,
  `acctype` varchar(20) NOT NULL,
  `balance` double NOT NULL,
  `dateo` date NOT NULL,
  PRIMARY KEY  (`accno`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `account`
--

INSERT INTO `account` (`accno`, `acctype`, `balance`, `dateo`) VALUES
(1001, 'Savings', 700, '2010-09-28'),
(1002, 'Current', 1960, '2010-09-30'),
(1003, 'Savings', 550, '2010-12-28'),
(1004, 'Savings', 600, '2011-07-09'),
(1005, 'Savings', 900, '2011-07-09'),
(1006, 'Current', 1300, '2011-10-10'),
(1007, 'Current', 500, '2011-09-30'),
(1008, 'Current', 500, '2011-09-30'),
(1009, 'Current', 500, '2011-09-30'),
(1010, 'Savings', 600, '2011-09-30'),
(1011, 'Savings', 500, '2011-10-31'),
(1012, 'Current', 600, '2011-12-04'),
(1013, 'Current', 600, '2011-12-08'),
(1015, 'Current', 500, '2011-12-10');

-- --------------------------------------------------------

--
-- Table structure for table `branch`
--

CREATE TABLE IF NOT EXISTS `branch` (
  `brno` int(11) NOT NULL auto_increment,
  `brname` varchar(30) NOT NULL,
  `brcity` varchar(30) NOT NULL,
  PRIMARY KEY  (`brno`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `branch`
--

INSERT INTO `branch` (`brno`, `brname`, `brcity`) VALUES
(1, 'Sowcarpet', 'Chennai'),
(2, 'Paris', 'Chennai'),
(3, 'Millroad', 'Coimbatore'),
(4, 'RSPuram', 'Coimbatore'),
(5, 'Town', 'Tirunelveli'),
(6, 'Bazzar', 'Madurai');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE IF NOT EXISTS `customer` (
  `accno` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `acctype` varchar(20) NOT NULL,
  `lastlog` varchar(50) NOT NULL,
  `ipaddr` varchar(40) default NULL,
  `dob` date NOT NULL,
  `address` varchar(50) NOT NULL,
  `phoneno` double NOT NULL,
  `gender` varchar(6) NOT NULL,
  `loginpw` varchar(15) NOT NULL,
  `securityques` varchar(75) NOT NULL,
  `securityans` varchar(40) NOT NULL,
  `email` varchar(30) NOT NULL,
  `empno` int(11) NOT NULL,
  `brname` varchar(20) NOT NULL,
  PRIMARY KEY  (`accno`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`accno`, `name`, `acctype`, `lastlog`, `ipaddr`, `dob`, `address`, `phoneno`, `gender`, `loginpw`, `securityques`, `securityans`, `email`, `empno`, `brname`) VALUES
(1001, 'DineshKumar', 'Savings', 'Sun, 11 Dec 2011 17:07:22', '127.0.0.1', '1989-02-27', '332-A,MintSt,Chennai-2', 9150370996, 'Male', 'kumar', 'Fauvourite Book', 'JAVA', 'ragavdinesh@yahoo.co.in', 2001, 'Sowcarpet'),
(1002, 'Vignesh.A', 'Current', 'Sun, 27 Nov 2011 11:47:57', '127.0.0.1', '1985-06-18', '22,AshokNagar,Coimbatore-1.', 9600848021, 'Male', 'vignesh', 'Famous Food?', 'Idly', 'viki782@gmail.com', 2002, 'Millroad'),
(1003, 'RameshKumar', 'Savings', 'Mon, 05 Dec 2011 17:49:59', '127.0.0.1', '1987-00-25', '2,KaruppaiyaStreet,Chennai-2', 9658745897, 'Male', 'ramesh', 'Mother''s Name?', 'Anjel', 'ramesh768@gmail.com', 2001, 'Sowcarpet'),
(1004, 'Saranya', 'Current', 'Sun, 27 Nov 2011 12:16:43', '127.0.0.1', '1990-01-25', '23,JaganStreet,Madurai-2', 9638527410, 'Female', 'saranya', 'Famous Food?', 'Idly', 'saranya78@gmail.com', 2001, 'Bazzar'),
(1005, 'Arun', 'Savings', 'Mon, 05 Dec 2011 17:57:03', '127.0.0.1', '1989-08-01', '23,Raja street,Madurai', 8952596587, 'Male', 'arunindia', '', '', 'arunesh@gmail.com', 0, ''),
(1006, 'Kumar', 'Current', '2011-09-30 00:00:00', NULL, '1957-05-02', '332-A,Mint Street', 9635214785, 'Male', 'kumarindia', '', '', 'kumar78@gmail.com', 2003, 'Sowcarpet'),
(1007, 'Ganapathy', 'Current', '2011-09-30 00:00:00', NULL, '1990-08-29', '43,HubeebSt,Tirunelveli', 9894736182, 'Male', 'ganapathyindia', '', '', 'habbeb78@gmail.com', 0, 'Bazzar'),
(1008, 'Usharani', 'Current', '2011-09-30 00:00:00', NULL, '1967-05-03', '12,Vysial st,Coimbatore-1', 9150370997, 'Female', 'usharaniindia', '', '', 'usharani78@gmail.com', 0, ''),
(1009, 'Praba', 'Current', '2011-09-30 00:00:00', NULL, '1957-06-03', '56,gandhi st,madurai-2', 9443151860, 'Male', 'prabaindia', '', '', 'praba78@gmail.com', 0, ''),
(1010, 'Uma', 'Savings', '2011-09-30 00:00:00', NULL, '1989-03-02', '12,warner st,tirunelveli-2', 9589658966, 'Female', 'umaindia', '', '', 'uma78@gmail.com', 0, ''),
(1011, 'Rama', 'Savings', 'Mon, 31 Oct 2011 18:05:49', '127.0.0.1', '1988-05-15', '23,HackerStreet,Madurai-1', 9894736182, 'Male', 'qwer', 'Teacher Name?', 'Velmurugan', 'ramasukumar@gmail.com', 0, ''),
(1012, 'UshaRani.P', 'Current', '2011-12-04', NULL, '1957-05-01', '15,UmerStreet,Madurai', 9150370996, 'Female', 'usharaniindia30', 'Famous Food?', 'Idly', 'usha23@gmail.com', 0, ''),
(1013, 'Abdul', 'Current', '2011-12-08', NULL, '1988-02-19', '12,ParisStreet,Chennai', 9998887776, 'Male', 'abdul', 'Father Name', 'Jamal', 'qwerty@gmail.com', 2001, 'Sowcarpet'),
(1015, 'Raja', 'Current', '2011-12-10', NULL, '1987-06-11', '21,RajaStreet,Coimbatore-1', 9876567892, 'Male', 'rajaindia53', 'FatherName?', 'Raja', 'wrerty@gmail.com', 2001, 'Sowcarpet');

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE IF NOT EXISTS `employee` (
  `empno` varchar(5) NOT NULL,
  `empname` varchar(25) NOT NULL,
  `dob` date NOT NULL,
  `gender` varchar(6) NOT NULL,
  `doj` date NOT NULL,
  `address` varchar(50) NOT NULL,
  `phoneno` double NOT NULL,
  `emppass` varchar(20) NOT NULL,
  `email` varchar(30) NOT NULL,
  `totsalary` double NOT NULL,
  `brno` int(11) NOT NULL,
  PRIMARY KEY  (`empno`),
  KEY `brno` (`brno`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`empno`, `empname`, `dob`, `gender`, `doj`, `address`, `phoneno`, `emppass`, `email`, `totsalary`, `brno`) VALUES
('2001', 'Agni', '1989-09-28', 'Female', '2011-07-21', '23,JaardomStreet', 9894736182, 'agni', 'agni88@gmail.com', 30000, 1),
('2002', 'Deepan', '1988-06-14', 'Male', '2010-06-05', '45,Telungu Street,Chennai-4', 9635287415, 'deepan', 'deepan88@gmail.com', 18000, 2),
('2003', 'Deepa', '1988-02-01', 'Female', '2009-06-05', '54,Raman Street,Coimbatore-1', 9635214789, 'deepa', 'deepa88@gmail.com', 19000, 3),
('2004', 'Guhan', '1987-02-06', 'Male', '1999-02-08', '34,Kakinada Street,Tirunelveli', 9874563210, 'guhan', 'guhan88@gmail.com', 20000, 5),
('2005', 'Raju', '1985-02-02', 'Male', '2011-10-12', '12,DGVC Street,Chennai', 9894736182, 'rajutamil', 'raju88@gmail.com', 15000, 1),
('2006', 'Guhan', '1956-05-02', 'Male', '2011-10-31', '23,MintSt,Chennai-2', 9600848022, 'guhantamil', 'dinuguhan@yahoomail.com', 20000, 1),
('2007', 'GuhanKumar', '1956-05-02', 'Male', '2011-10-31', '23,MintSt,Chennai-2', 9600848021, 'guhantamil', 'ramasukumar@gmail.com', 10000, 1),
('2008', 'Pankaj', '1982-02-01', 'Male', '2011-12-11', '32,AnnaStreet,Chennai-2', 8091234321, 'pankajtami', 'pankajuu@gmail.com', 500, 1),
('admin', 'Bank', '1958-11-15', 'Male', '1958-11-15', '12,Bank Street', 9009900990, 'admin', 'adminadmin@gmail.com', 100000, 2);

-- --------------------------------------------------------

--
-- Table structure for table `transaction`
--

CREATE TABLE IF NOT EXISTS `transaction` (
  `accno` int(11) NOT NULL,
  `transtype` varchar(30) NOT NULL,
  `datet` date NOT NULL,
  `amount` double NOT NULL,
  `balance` double NOT NULL,
  KEY `accno` (`accno`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transaction`
--

INSERT INTO `transaction` (`accno`, `transtype`, `datet`, `amount`, `balance`) VALUES
(1002, 'Transfered from 1001', '2011-09-29', 100, 1600),
(1002, 'Transfer to 1001', '2011-09-30', 100, 900),
(1001, 'Transfered from 1002', '2011-09-30', 100, 1100),
(1001, 'Transfer to 1002', '2011-09-30', 100, 1000),
(1002, 'Transfered from 1001', '2011-09-30', 100, 1000),
(1001, 'Amount Deposited', '2011-10-12', 100, 1100),
(1002, 'Transfer to 1001', '2011-10-16', 100, 900),
(1001, 'Transfered from 1002', '2011-10-16', 100, 1200),
(1001, 'Transfer to 1001', '2011-10-16', 100, 1100),
(1001, 'Transfered from 1001', '2011-10-16', 100, 1300),
(1001, 'Transfer to 1002', '2011-10-16', 100, 1200),
(1002, 'Transfered from 1001', '2011-10-16', 100, 1000),
(1002, 'Transfered from 1001', '2011-10-16', 400, 1400),
(1002, 'Amount Withdrawn', '2011-10-16', 100, 1300),
(1002, 'Amount Withdrawn', '2011-10-16', 100, 1200),
(1002, 'Amount Withdrawn', '2011-10-16', 100, 1100),
(1002, 'Amount Withdrawn', '2011-10-16', 100, 1000),
(1002, 'Amount Withdrawn', '2011-10-16', 100, 900),
(1002, 'Transfer to 1001', '2011-10-16', 100, 800),
(1002, 'Transfer to 1001', '2011-10-16', 100, 700),
(1001, 'Transfered from 1002', '2011-10-16', 100, 900),
(1002, 'Transfer to 1001', '2011-10-16', 100, 600),
(1002, 'Transfered from 1001', '2011-10-16', 100, 700),
(1002, 'Transfered from 1001', '2011-10-25', 200, 900),
(1002, 'Transfered from 1001', '2011-10-25', 100, 1000),
(1002, 'Transfered from 1001', '2011-10-31', 10, 1010),
(1002, 'Transfered from 1001', '2011-10-31', 100, 1110),
(1002, 'Transfered from 1001', '2011-11-01', 100, 1210),
(1002, 'Transfered from 1001', '2011-11-01', 100, 1310),
(1002, 'Transfered from 1001', '2011-11-01', 100, 1410),
(1002, 'Transfered from 1001', '2011-11-01', 100, 1510),
(1002, 'Transfered from 1001', '2011-11-01', 100, 1610),
(1002, 'Transfered from 1001', '2011-11-13', 100, 1710),
(1002, 'Transfered from 1001', '2011-11-20', 150, 1860),
(1002, 'Transfered from 1001', '2011-11-24', 50, 1910),
(1002, 'Amount Withdrawn', '2011-11-24', 100, 1810),
(1002, 'Transfered from 1001', '2011-11-24', 50, 1860),
(1002, 'Transfer to 1001', '2011-11-25', 100, 1760),
(1002, 'Transfer to 1001', '2011-11-25', 100, 1660),
(1002, 'Transfer to 1001', '2011-11-25', 100, 1560),
(1002, 'Transfer to 1001', '2011-11-25', 100, 1460),
(1002, 'Transfer to 1001', '2011-11-27', 100, 1360),
(1003, 'Transfered from 1001', '2011-12-04', 150, 650),
(1003, 'Transfered from 1001', '2011-12-04', 100, 750),
(1002, 'Amount Deposited', '2011-12-04', 100, 1460),
(1002, 'Amount Withdrawn', '2011-12-04', 100, 1360),
(1012, 'Amount Deposited', '2011-12-04', 100, 600),
(1003, 'Transfer to 1001', '2011-12-05', 100, 650),
(1003, 'Transfer to 1002', '2011-12-05', 100, 550),
(1002, 'Transfered from 1003', '2011-12-05', 100, 1460),
(1002, 'Transfered from 1001', '2011-12-08', 100, 1560),
(1010, 'Transfered from 1001', '2011-12-08', 100, 600),
(1013, 'Amount Deposited', '2011-12-08', 100, 600),
(1002, 'Transfered from 1001', '2011-12-08', 100, 1660),
(1002, 'Transfered from 1001', '2011-12-08', 150, 1810),
(1002, 'Transfered from 1001', '2011-12-08', 150, 1960),
(1005, 'Amount Deposited', '2011-12-10', 150, 750),
(1005, 'Amount Deposited', '2011-12-10', 150, 900),
(1001, 'Amount Withdrawn', '2011-12-10', 200, 1700),
(1001, 'Amount Withdrawn', '2011-12-10', 200, 1500),
(1001, 'Transfer to 1006', '2011-12-10', 200, 1300),
(1001, 'Transfer to 1006', '2011-12-10', 200, 1100),
(1006, 'Transfered from 1001', '2011-12-10', 200, 900),
(1001, 'Transfer to 1006', '2011-12-10', 200, 900),
(1006, 'Transfered from 1001', '2011-12-10', 200, 1100),
(1001, 'Transfer to 1006', '2011-12-10', 200, 700),
(1006, 'Transfered from 1001', '2011-12-10', 200, 1300);

-- --------------------------------------------------------

--
-- Table structure for table `transactionx`
--

CREATE TABLE IF NOT EXISTS `transactionx` (
  `accno` int(11) NOT NULL,
  `datex` varchar(30) NOT NULL,
  `status` varchar(20) NOT NULL,
  KEY `accno` (`accno`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transactionx`
--

INSERT INTO `transactionx` (`accno`, `datex`, `status`) VALUES
(1003, 'Sun, 06 Nov 2011 16:24:20', 'Released'),
(1004, 'Sun, 06 Nov 2011 16:25:09', 'Released'),
(1001, 'Sun, 06 Nov 2011 16:29:17', 'Released'),
(1005, 'Sun, 06 Nov 2011 16:29:21', 'Released'),
(1006, 'Sun, 27 Nov 2011 11:54:50', 'Released'),
(1007, 'Sun, 27 Nov 2011 11:54:57', 'Released'),
(1008, 'Sun, 27 Nov 2011 11:55:01', 'Released'),
(1009, 'Sun, 27 Nov 2011 11:55:06', 'Released'),
(1010, 'Sun, 27 Nov 2011 11:55:10', 'Released'),
(1011, 'Sun, 27 Nov 2011 11:55:15', 'Released'),
(1002, 'Sun, 27 Nov 2011 11:54:50', 'Released'),
(1012, 'Sun, 04 Dec 2011 15:19:58', 'Released');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `employee`
--
ALTER TABLE `employee`
  ADD CONSTRAINT `employee_ibfk_1` FOREIGN KEY (`brno`) REFERENCES `branch` (`brno`);

--
-- Constraints for table `transaction`
--
ALTER TABLE `transaction`
  ADD CONSTRAINT `transaction_ibfk_1` FOREIGN KEY (`accno`) REFERENCES `customer` (`accno`),
  ADD CONSTRAINT `transaction_ibfk_2` FOREIGN KEY (`accno`) REFERENCES `customer` (`accno`),
  ADD CONSTRAINT `transaction_ibfk_3` FOREIGN KEY (`accno`) REFERENCES `account` (`accno`);

--
-- Constraints for table `transactionx`
--
ALTER TABLE `transactionx`
  ADD CONSTRAINT `transactionx_ibfk_1` FOREIGN KEY (`accno`) REFERENCES `customer` (`accno`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
