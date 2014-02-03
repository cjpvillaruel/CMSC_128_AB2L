-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jan 16, 2014 at 01:04 AM
-- Server version: 5.6.12-log
-- PHP Version: 5.4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `ics_library`
--
CREATE DATABASE IF NOT EXISTS `ics_library` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `ics_library`;

-- --------------------------------------------------------

--
-- Table structure for table `admin_account`
--

CREATE TABLE IF NOT EXISTS `admin_account` (
  `admin_key` varchar(10) NOT NULL,
  `email` varchar(50) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(40) NOT NULL,
  `parent_key` varchar(10) DEFAULT NULL,
  `first_name` varchar(50) NOT NULL,
  `middle_initial` varchar(3) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  PRIMARY KEY (`admin_key`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin_account`
--

INSERT INTO `admin_account` (`admin_key`, `email`, `username`, `password`, `parent_key`, `first_name`, `middle_initial`, `last_name`) VALUES
('admin_gab', 'gabrielborjal@gmail.com', 'gborjal', '13f5f4e8d46956c3e2fb7e01db5986be8af5b0ba', 'admin_jay', 'John Jonathan', 'C.', 'Pena'),
('admin_jay', 'jjppenajr@gmail.com', 'jjppenajr', '13f5f4e8d46956c3e2fb7e01db5986be8af5b0ba', 'admin_aiah', 'Gabriel ', 'B.', 'Borjal');

-- --------------------------------------------------------

--
-- Table structure for table `admin_log`
--

CREATE TABLE IF NOT EXISTS `admin_log` (
  `date` date NOT NULL,
  `log_number` int(11) NOT NULL AUTO_INCREMENT,
  `message` varchar(100) NOT NULL,
  `type` varchar(50) NOT NULL,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`log_number`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `admin_log`
--

INSERT INTO `admin_log` (`date`, `log_number`, `message`, `type`, `time`) VALUES
('2014-01-01', 1, 'Admin 1 added User 1', 'Add User', '2014-01-10 19:53:44'),
('2014-01-02', 2, 'Admin 2 verify User 3', 'Verify User', '2014-01-10 19:52:19'),
('2014-01-03', 3, 'Admin 1 added User 2 and User 3', 'Add User', '2014-01-10 19:52:29'),
('2014-01-04', 4, 'Admin 1 updated an Annoucement', 'Update Annoucement', '2014-01-10 19:52:51'),
('2014-01-05', 5, 'Admin 1 added a book.', 'Add Book', '2014-01-10 19:53:07'),
('2014-01-06', 6, 'Admin 1 notified User 1', 'Notify User', '2014-01-10 19:53:17'),
('2014-01-07', 7, 'Admin 1 created Admin 2', 'Create Admin', '2014-01-10 19:53:35'),
('2014-01-08', 8, 'Admin 2 added User 1', 'Add User', '2014-01-10 19:53:54'),
('2014-01-09', 9, 'Admin 1 added User 7', 'Add User', '2014-01-10 19:54:01'),
('2014-01-09', 10, 'Admin 2 added User 8 ', 'Add User', '2014-01-10 19:54:08');

-- --------------------------------------------------------

--
-- Table structure for table `book`
--

CREATE TABLE IF NOT EXISTS `book` (
  `call_number` varchar(20) NOT NULL,
  `title` varchar(100) NOT NULL,
  `author` varchar(100) NOT NULL,
  `subject` varchar(10) NOT NULL,
  `year_of_pub` int(11) NOT NULL,
  `type` varchar(20) NOT NULL,
  `no_of_available` int(3) NOT NULL,
  `quantity` int(3) NOT NULL,
  `book_stat` int(11) NOT NULL,
  PRIMARY KEY (`call_number`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `book`
--

INSERT INTO `book` (`call_number`, `title`, `author`, `subject`, `year_of_pub`, `type`, `no_of_available`, `quantity`, `book_stat`) VALUES
('ABC 111 ', 'This is a title', 'Author ABC', 'CMSC 128', 1990, 'BOOK', 1, 1, 0),
('ABC 123', 'Sample Paper', 'Author 1', 'CMSC 192', 2001, 'THESIS', 0, 1, 1),
('LG 995 1994 C65 R48', 'A comparison of two approaches to pattern recognit', 'Revilla, Edmund M.', 'CMSC 125', 1994, 'THESIS', 0, 1, 1),
('LG 995 2006 C65 J33', 'Linear space parallel algorithms ', 'Jacildo, Arian Jereta', 'CMSC 132', 2006, 'THESIS', 1, 1, 0),
('QA 39.2 G47 1982', 'Mathematical structures for computer science', 'Gerstring, Judith L.', 'CMSC 198', 1982, 'BOOK', 1, 2, 1),
('QA 39.2 T72', 'Discrete mathematical structures with applications', 'Tremblay, Jean-Paul', 'CMSC 129', 1975, 'BOOK', 0, 2, 2),
('QA 76 A49 2000', 'Introduksiyon sa agham computer', 'Alviar, Santiago M.', 'CMSC 1', 2000, 'BOOK', 2, 3, 2),
('QA 76.15 G85 1990', 'A dictionary of information technology and compute', 'Gunton, Tony', 'CMSC 2', 1990, 'BOOK', 2, 2, 0),
('QA 76.6 A35 1974', 'The design and analysis of computer algorithms', 'Aho, Alfred V.', 'CMSC 3', 1974, 'BOOK', 1, 1, 0),
('QA 76.73 M6 U44 1994', 'Elements of ML programming', 'Ullman, Jeffrey D.', 'CMSC 256', 1994, 'BOOK', 0, 2, 3),
('QA 76.76 O63 A42 200', 'Operating systems: basic concepts', 'Albacea, Eliezer A.', 'CMSC 125', 2002, 'BOOK', 2, 4, 2),
('T 58.5 A42 2002', 'Information technology literacy', 'Albacea, Eliezer A.', 'CMSC 123', 2002, 'BOOK', 5, 5, 0),
('TA 654.6 I57 2007', 'Intelligent computational paradigms in earthquake ', 'Hershey, Pa.', 'CMSC 170', 2007, 'BOOK', 3, 3, 0);

-- --------------------------------------------------------

--
-- Table structure for table `book_reservation`
--

CREATE TABLE IF NOT EXISTS `book_reservation` (
  `res_number` int(11) NOT NULL AUTO_INCREMENT,
  `rank` int(11) DEFAULT NULL,
  `status` varchar(10) NOT NULL,
  `due_date` date DEFAULT NULL,
  `date_borrowed` date DEFAULT NULL,
  `date_returned` date DEFAULT NULL,
  `call_number` varchar(20) NOT NULL,
  `account_number` varchar(20) NOT NULL,
  PRIMARY KEY (`res_number`),
  KEY `call_number` (`call_number`),
  KEY `account_number` (`account_number`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=14 ;

--
-- Dumping data for table `book_reservation`
--

INSERT INTO `book_reservation` (`res_number`, `rank`, `status`, `due_date`, `date_borrowed`, `date_returned`, `call_number`, `account_number`) VALUES
(4, NULL, 'overdue', '2014-01-14', '2013-12-09', NULL, 'ABC 111 ', '2011-07023'),
(5, 2, 'waitlist', NULL, NULL, NULL, 'QA 39.2 G47 1982', '2012-76543'),
(6, NULL, 'overdue', '2013-12-24', '2013-12-10', NULL, 'QA 76 A49 2000', '2010-16523'),
(7, NULL, 'overdue', '2014-01-12', '2013-12-16', NULL, 'LG 995 1994 C65 R48', '2012-10908'),
(8, 1, 'waitlist', NULL, NULL, NULL, 'QA 39.2 T72', '2008-43761'),
(9, 1, 'waitlist', NULL, NULL, NULL, 'TA 654.6 I57 2007', '2009-54321'),
(10, NULL, 'reserved', NULL, NULL, NULL, 'QA 76 A49 2000', '2009-04290'),
(11, NULL, 'reserved', NULL, NULL, NULL, 'QA 76.6 A35 1974', '2011-16517'),
(12, NULL, 'reserved', '2014-01-14', '2014-01-07', NULL, 'QA 76.73 M6 U44 1994', '2010-12345'),
(13, NULL, 'reserved', '2014-01-21', '2014-01-14', NULL, 'QA 76.73 M6 U44 1994', '2013-18714');

-- --------------------------------------------------------

--
-- Table structure for table `tag`
--

CREATE TABLE IF NOT EXISTS `tag` (
  `call_number` varchar(20) NOT NULL,
  `tag_name` varchar(50) NOT NULL,
  `tag_id` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`tag_id`),
  KEY `call_number` (`call_number`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Dumping data for table `tag`
--

INSERT INTO `tag` (`call_number`, `tag_name`, `tag_id`) VALUES
('ABC 123', 'Artificial Intelligence', 1),
('QA 39.2 G47 1982', 'Game Programming', 2),
('ABC 111', 'C Programming', 3),
('QA 39.2 T72', 'Java ', 4),
('TA 654.6 I57 2007', 'Database Management', 5),
('LG 995 1994 C65 R48', 'Assembly Language', 6),
('QA 76.15 G85 1990', 'Assembly Language', 7),
('T 58.5 A42 2002', 'Artificial Intelligence', 8),
('QA 39.2 T72', 'Game Programming', 9),
('QA 76 A49 2000', 'Assembly Language', 10),
('LG 995 2006 C65 J33', 'C Programming', 11),
('TA 654.6 I57 2007', 'File Systems', 12);

-- --------------------------------------------------------

--
-- Table structure for table `user_account`
--

CREATE TABLE IF NOT EXISTS `user_account` (
  `account_number` varchar(15) NOT NULL,
  `password` varchar(40) NOT NULL,
  `username` varchar(20) NOT NULL,
  `classification` varchar(7) NOT NULL,
  `college` varchar(5) NOT NULL,
  `course` varchar(8) DEFAULT NULL,
  `email` varchar(50) NOT NULL,
  `status` varchar(7) NOT NULL,
  `date_notif` date DEFAULT NULL,
  `first_name` varchar(50) NOT NULL,
  `middle_initial` varchar(3) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  PRIMARY KEY (`username`),
  UNIQUE KEY `account_number` (`account_number`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_account`
--

INSERT INTO `user_account` (`account_number`, `password`, `username`, `classification`, `college`, `course`, `email`, `status`, `date_notif`, `first_name`, `middle_initial`, `last_name`) VALUES
('2011-07023', 'kid1412', 'aris', 'student', 'CAS', 'BSCS', 'arismartinez@gmail.com', 'approve', '2013-12-07', 'Edelweis', 'A.', 'Valdellon'),
('2012-76543', 'dm64', 'daniel', 'student', 'CAS', 'BSCS', 'danielrox@gmail.com', 'pending', '2014-01-04', 'Maraiah Gene', 'C.', 'Garcia'),
('2010-16523', 'fm32561', 'franz', 'student', 'CAS', 'BSCS', 'francisM@gmail.com', 'approve', '2013-12-27', 'Clarissa', 'B.', 'Estremos'),
('2012-10908', 'geo08', 'george', 'student', 'CAS', 'BSCS', 'galvarez08@gmail.com', 'pending', '2014-02-08', 'Neil Harvey', 'U.', 'Cruzada'),
('2008-43761', 'jm43761', 'james', 'faculty', 'CAS', '', 'jmartin@gmail.com', 'approve', '2013-12-13', 'Evan Norman', 'A.', 'Tolorio'),
('2009-54321', 'LOL', 'jason', 'faculty', 'CAS', '', 'jc54321@gmail.com', 'approve', '2014-01-02', 'Jason', 'D.', 'Obrero'),
('2009-04290', 'ford29', 'john', 'faculty', 'CAS', '', 'johnford@gmail.com', 'approve', '2013-04-29', 'Kim ', 'P.', 'Samaniego'),
('2011-16517', 'haiaram23', 'mgene', 'student', 'CAS', 'BSCS', 'maraiahgene1123@gmail.com', 'approve', '2014-01-07', 'Erica', 'Q.', 'Jimenez'),
('2010-12345', 'paupau', 'paureyes', 'student', 'CAS', 'BSCS', 'reyespauline@gmail.com', 'pending', '2013-12-18', 'Kara Lane ', 'V.', 'Zurbano'),
('2013-18714', 'azodnem', 'shiela', 'student', 'CAS', 'BSCS', 'shiela_mendoza@gmail.com', 'pending', '2013-11-12', 'Paulo', 'D.R', 'Tam');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `book_reservation`
--
ALTER TABLE `book_reservation`
  ADD CONSTRAINT `book_reservation_ibfk_1` FOREIGN KEY (`account_number`) REFERENCES `user_account` (`account_number`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `Foreign Key` FOREIGN KEY (`call_number`) REFERENCES `book` (`call_number`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tag`
--
ALTER TABLE `tag`
  ADD CONSTRAINT `tag_ibfk_1` FOREIGN KEY (`call_number`) REFERENCES `book` (`call_number`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
