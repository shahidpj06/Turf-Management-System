-- phpMyAdmin SQL Dump
-- version 2.11.6
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Dec 03, 2021 at 08:21 AM
-- Server version: 5.0.51
-- PHP Version: 5.2.6

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `db_tournament`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `admin_id` int(50) NOT NULL auto_increment,
  `admin_uname` varchar(100) NOT NULL,
  `admin_password` varchar(50) NOT NULL,
  PRIMARY KEY  (`admin_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `tbl_admin`
--

INSERT INTO `tbl_admin` (`admin_id`, `admin_uname`, `admin_password`) VALUES
(1, 'admin', 'admin'),
(2, 'admin', 'admin2');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_complaint`
--

CREATE TABLE `tbl_complaint` (
  `complaint_id` int(50) NOT NULL auto_increment,
  `complainttype_id` int(50) NOT NULL,
  `complaint_date` date NOT NULL,
  `complaint_details` varchar(1000) NOT NULL,
  `complaint_reply` varchar(1000) NOT NULL,
  `team_id` int(50) NOT NULL,
  `towner_id` int(11) NOT NULL,
  PRIMARY KEY  (`complaint_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `tbl_complaint`
--

INSERT INTO `tbl_complaint` (`complaint_id`, `complainttype_id`, `complaint_date`, `complaint_details`, `complaint_reply`, `team_id`, `towner_id`) VALUES
(3, 1, '2021-10-18', 'ggfcccbnvgdfgdgfd', '', 0, 0),
(4, 3, '2021-10-18', 'dsfgdghfvgnffdgrs', '', 0, 0),
(5, 1, '2021-10-18', 'dgfhgfhdgdgfdfgd', '', 0, 0),
(6, 1, '2021-10-18', 'gfdfdgfghfhgdfgs', '', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_complainttype`
--

CREATE TABLE `tbl_complainttype` (
  `complainttype_id` int(50) NOT NULL auto_increment,
  `complainttype_name` varchar(100) NOT NULL,
  PRIMARY KEY  (`complainttype_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `tbl_complainttype`
--

INSERT INTO `tbl_complainttype` (`complainttype_id`, `complainttype_name`) VALUES
(1, 'fam'),
(3, 'vhghjgfe');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_district`
--

CREATE TABLE `tbl_district` (
  `district_id` int(50) NOT NULL auto_increment,
  `district_name` varchar(100) NOT NULL,
  PRIMARY KEY  (`district_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=23 ;

--
-- Dumping data for table `tbl_district`
--

INSERT INTO `tbl_district` (`district_id`, `district_name`) VALUES
(16, 'Thiruvanathapuram'),
(17, 'Kollam'),
(18, 'Pathanamthitta'),
(19, 'Alappuzha'),
(20, 'Kottayam'),
(21, 'Idukki'),
(22, 'Ernakkulam');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_feedback`
--

CREATE TABLE `tbl_feedback` (
  `feedback_id` int(50) NOT NULL auto_increment,
  `feedback_details` varchar(100) NOT NULL,
  `feedback_date` date NOT NULL,
  `team_id` int(50) NOT NULL,
  PRIMARY KEY  (`feedback_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=24 ;

--
-- Dumping data for table `tbl_feedback`
--

INSERT INTO `tbl_feedback` (`feedback_id`, `feedback_details`, `feedback_date`, `team_id`) VALUES
(17, 'egfdghfhjghjgjhghg', '2021-10-06', 0),
(18, 'errrrrrrrr', '2021-10-06', 0),
(19, 'Hello', '2021-10-07', 0),
(21, 'dewdwe', '2021-10-07', 1),
(22, 'reshmaknhhggfdzfsff', '2021-10-07', 0),
(23, 'jgdhjagdmabjmafhgjh', '2021-10-07', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_place`
--

CREATE TABLE `tbl_place` (
  `place_id` int(50) NOT NULL auto_increment,
  `district_id` int(50) NOT NULL,
  `place_name` varchar(100) NOT NULL,
  PRIMARY KEY  (`place_id`),
  KEY `district_id` (`district_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=17 ;

--
-- Dumping data for table `tbl_place`
--

INSERT INTO `tbl_place` (`place_id`, `district_id`, `place_name`) VALUES
(1, 0, ''),
(2, 0, ''),
(3, 0, ''),
(4, 0, ''),
(5, 0, ''),
(6, 0, ''),
(7, 0, ''),
(8, 0, 'kolenchery'),
(9, 0, 'kolenchery'),
(10, 0, 'kolenchery'),
(15, 22, 'kolenchery'),
(16, 22, 'Kalady');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_players`
--

CREATE TABLE `tbl_players` (
  `player_id` int(50) NOT NULL auto_increment,
  `player_name` varchar(100) NOT NULL,
  `age_proof` varchar(1000) NOT NULL,
  `team_id` int(50) NOT NULL,
  `player_email` varchar(100) NOT NULL,
  `player_contact` int(50) NOT NULL,
  `player_address` varchar(100) NOT NULL,
  `player_pic` varchar(1000) NOT NULL,
  `place_id` int(50) NOT NULL,
  `player_qualification` varchar(1000) NOT NULL,
  `player_qproof` mediumtext NOT NULL,
  PRIMARY KEY  (`player_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Dumping data for table `tbl_players`
--

INSERT INTO `tbl_players` (`player_id`, `player_name`, `age_proof`, `team_id`, `player_email`, `player_contact`, `player_address`, `player_pic`, `place_id`, `player_qualification`, `player_qproof`) VALUES
(10, 'geetha', 'WIN_20210830_18_49_36_Pro.jpg', 1, 'iamreshma52@gmail.com', 12345678, 'abcdefg', 'WIN_20210830_19_21_25_Pro.jpg', 15, 'asdfghuytrew', 'WIN_20210830_18_49_36_Pro.jpg'),
(11, 'meena', 'editprofile.pdf', 4, 'iamreshma52@gmail.com', 1233546466, 'abcdefg', 'WIN_20210830_18_49_36_Pro.jpg', 15, 'qwertyyhsgvgfgfg', 'Level1.pdf'),
(12, 'nanny', 'editprofile.pdf', 1, 'iamreshma52@gmail.com', 1234567, 'abcdefg', 'WIN_20210830_19_21_25_Pro.jpg', 16, 'qededewfe', 'WIN_20210830_18_49_36_Pro.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_staff`
--

CREATE TABLE `tbl_staff` (
  `staff_id` int(50) NOT NULL auto_increment,
  `stafftype_id` int(50) NOT NULL,
  `staff_name` varchar(100) NOT NULL,
  `staff_gender` varchar(50) NOT NULL,
  `staff_contact` int(50) NOT NULL,
  `staff_email` varchar(50) NOT NULL,
  `staff_address` varchar(100) NOT NULL,
  `towner_id` int(50) NOT NULL,
  PRIMARY KEY  (`staff_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `tbl_staff`
--

INSERT INTO `tbl_staff` (`staff_id`, `stafftype_id`, `staff_name`, `staff_gender`, `staff_contact`, `staff_email`, `staff_address`, `towner_id`) VALUES
(6, 3, 'vee', 'Male', 45678906, 'gdrss@ggnvbnv', 'rsgfdhgfhghjghjg', 2),
(7, 2, 'albin', 'Male', 234455666, 'iamreshma52@gmail.com', 'reshmasdfhyjji', 2);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_stafftype`
--

CREATE TABLE `tbl_stafftype` (
  `stafftype_id` int(50) NOT NULL auto_increment,
  `stafftype_name` varchar(100) NOT NULL,
  PRIMARY KEY  (`stafftype_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `tbl_stafftype`
--

INSERT INTO `tbl_stafftype` (`stafftype_id`, `stafftype_name`) VALUES
(2, 'sales'),
(3, 'cash'),
(4, 'cleaner');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_tbooking`
--

CREATE TABLE `tbl_tbooking` (
  `tbooking_id` int(11) NOT NULL auto_increment,
  `team_id` int(11) NOT NULL,
  `t_id` int(11) NOT NULL,
  `booked_date` date NOT NULL,
  `payment_status` int(11) NOT NULL default '0',
  PRIMARY KEY  (`tbooking_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `tbl_tbooking`
--


-- --------------------------------------------------------

--
-- Table structure for table `tbl_team`
--

CREATE TABLE `tbl_team` (
  `team_id` int(50) NOT NULL auto_increment,
  `team_name` varchar(100) NOT NULL,
  `team_contact` int(50) NOT NULL,
  `team_email` varchar(100) NOT NULL,
  `place_id` int(50) NOT NULL,
  `team_photo` varchar(1000) NOT NULL,
  `team_username` varchar(100) NOT NULL,
  `team_password` varchar(100) NOT NULL,
  `team_status` varchar(50) NOT NULL default '0',
  PRIMARY KEY  (`team_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `tbl_team`
--

INSERT INTO `tbl_team` (`team_id`, `team_name`, `team_contact`, `team_email`, `place_id`, `team_photo`, `team_username`, `team_password`, `team_status`) VALUES
(1, 'Reshma', 456777, '', 15, '', 'resh2001', 'resh@2001', '1'),
(2, 'lucky', 2147483647, 'gdrss@ggnvbnv', 15, '', 'resh2001', 'team', '2'),
(3, 'Choondy', 955625152, 'dfdfgeger', 16, 'Level1.pdf', 'resh2001', 'resh@2001', '1'),
(4, 'Campus', 2147483647, 'athi@gmail.com', 15, 'dist.pdf', 'resh2001', '12345', '2'),
(5, 'Campus', 34556465, 'resfghh', 15, 'Level1.pdf', 'resh2001', 'resh@2001', '0'),
(6, 'Team', 987654321, 'team@gmail.com', 15, 'Screenshot (1).png', 'username', '12345', '0'),
(7, 'Team', 987654321, 'team@gmail.com', 15, 'Screenshot (1).png', 'username', '12345', '0');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_teamgallery`
--

CREATE TABLE `tbl_teamgallery` (
  `tgallery_id` int(50) NOT NULL auto_increment,
  `team_id` int(50) NOT NULL,
  `tgallery_img` varchar(5000) NOT NULL,
  PRIMARY KEY  (`tgallery_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=15 ;

--
-- Dumping data for table `tbl_teamgallery`
--

INSERT INTO `tbl_teamgallery` (`tgallery_id`, `team_id`, `tgallery_img`) VALUES
(11, 1, 'WIN_20210830_19_21_25_Pro.jpg'),
(12, 5, 'WIN_20210830_18_49_36_Pro.jpg'),
(14, 2, 'WIN_20210830_19_21_25_Pro.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_tornament`
--

CREATE TABLE `tbl_tornament` (
  `t_id` int(50) NOT NULL auto_increment,
  `towner_id` int(50) NOT NULL,
  `t_details` varchar(500) NOT NULL,
  `t_startdate` date NOT NULL,
  `t_enddate` date NOT NULL,
  `t_stime` time NOT NULL,
  `t_etime` varchar(50) NOT NULL,
  `t_location` varchar(100) NOT NULL,
  `tournamenttype_id` int(50) NOT NULL,
  `team_member_count` int(50) NOT NULL,
  `t_status` varchar(50) NOT NULL default '0',
  `t_regprice` int(50) NOT NULL,
  PRIMARY KEY  (`t_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `tbl_tornament`
--

INSERT INTO `tbl_tornament` (`t_id`, `towner_id`, `t_details`, `t_startdate`, `t_enddate`, `t_stime`, `t_etime`, `t_location`, `tournamenttype_id`, `team_member_count`, `t_status`, `t_regprice`) VALUES
(5, 1, 'esfsfggfs', '2021-10-13', '2021-10-27', '20:54:00', '23:58', 'sgfdfdfdfdrd', 4, 20, '0', 300),
(6, 1, 'sgfhfdrsrts', '2021-10-13', '2021-10-27', '19:59:00', '22:59', 'gfdfsfsfsfgdgf', 4, 11, '0', 100),
(7, 1, 'ttsdsfgsfgs', '0000-00-00', '0000-00-00', '00:00:00', '', 'grdgfdghfgh', 4, 17, '0', 120);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_tournamenttype`
--

CREATE TABLE `tbl_tournamenttype` (
  `tournamenttype_id` int(50) NOT NULL auto_increment,
  `tournamenttype_name` varchar(100) NOT NULL,
  PRIMARY KEY  (`tournamenttype_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `tbl_tournamenttype`
--

INSERT INTO `tbl_tournamenttype` (`tournamenttype_id`, `tournamenttype_name`) VALUES
(4, 'football');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_towner`
--

CREATE TABLE `tbl_towner` (
  `towner_id` int(50) NOT NULL auto_increment,
  `towner_name` varchar(100) NOT NULL,
  `place_id` int(50) NOT NULL,
  `towner_email` varchar(100) NOT NULL,
  `towner_contact` int(50) NOT NULL,
  `towner_address` varchar(500) NOT NULL,
  `towner_proof` varchar(1000) NOT NULL,
  `towner_vstatus` varchar(100) NOT NULL default '0',
  `towner_uname` varchar(50) NOT NULL,
  `towner_password` varchar(50) NOT NULL,
  PRIMARY KEY  (`towner_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `tbl_towner`
--

INSERT INTO `tbl_towner` (`towner_id`, `towner_name`, `place_id`, `towner_email`, `towner_contact`, `towner_address`, `towner_proof`, `towner_vstatus`, `towner_uname`, `towner_password`) VALUES
(1, 'Athira', 15, 'athi@gmail.com', 2147483647, 'drtrhryy\r\nnfgfgfgf', 'Level0.pdf', '1', 'athira', 'resh'),
(2, 'resh', 15, 'trhryt', 256633333, 'hrjyjutkuy', '', '0', 'resh2001', 'resh');
