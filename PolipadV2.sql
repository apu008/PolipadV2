-- phpMyAdmin SQL Dump
-- version 3.5.5
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Aug 31, 2014 at 04:17 AM
-- Server version: 5.5.37-35.1
-- PHP Version: 5.4.23

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `sayabu_v3`
--

-- --------------------------------------------------------

--
-- Table structure for table `campaign`
--

DROP TABLE IF EXISTS `campaign`;
CREATE TABLE IF NOT EXISTS `campaign` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `can_id` int(11) NOT NULL,
  `cam_start_date` date NOT NULL,
  `status` int(1) NOT NULL DEFAULT '0',
  `launched_on` date NOT NULL,
  `last_update` date NOT NULL,
  `featured` int(1) NOT NULL DEFAULT '0',
  `reject_cause` varchar(255) NOT NULL,
  `notes` text NOT NULL,
  `noteshare` int(1) NOT NULL,
  `approved_by` varchar(255) NOT NULL,
  `admin_note_date` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=48 ;

--
-- Dumping data for table `campaign`
--

INSERT INTO `campaign` (`id`, `can_id`, `cam_start_date`, `status`, `launched_on`, `last_update`, `featured`, `reject_cause`, `notes`, `noteshare`, `approved_by`, `admin_note_date`) VALUES
(44, 66, '2014-05-24', 2, '2014-05-24', '2014-07-12', 1, '', '', 0, 'Admin', '2014-05-24'),
(45, 64, '2014-05-26', 1, '2014-05-26', '2014-06-09', 0, '', '', 0, '', '0000-00-00'),
(46, 66, '2014-06-04', 0, '2014-06-04', '2014-06-04', 0, '', '', 0, '', '0000-00-00'),
(47, 69, '2014-06-09', 1, '2014-06-09', '2014-06-09', 0, '', '', 0, '', '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `cam_about_you`
--

DROP TABLE IF EXISTS `cam_about_you`;
CREATE TABLE IF NOT EXISTS `cam_about_you` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `can_id` int(11) NOT NULL,
  `cam_id` int(11) NOT NULL,
  `profile_pic` varchar(255) NOT NULL,
  `cam_from` varchar(255) NOT NULL,
  `short_bio` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=49 ;

--
-- Dumping data for table `cam_about_you`
--

INSERT INTO `cam_about_you` (`id`, `can_id`, `cam_id`, `profile_pic`, `cam_from`, `short_bio`) VALUES
(45, 66, 44, '35e37eca78f32278a243943c95cdce8d_abu_.png', 'Missouri City, Texas', ''),
(46, 64, 45, '27404f79fcbf9292ab796af2a1f1fab3_limegreen2020_.jpg', 'Austin', ''),
(47, 66, 46, '5bd0c40b4f9a4f83e2052000a3f9043e_abu_.jpg', 'Missouri City, Texas', ''),
(48, 69, 47, '362d04a95ddb8b52c3ad98e86f487440_matthew698_.jpg', 'Austin', '');

-- --------------------------------------------------------

--
-- Table structure for table `cam_basic`
--

DROP TABLE IF EXISTS `cam_basic`;
CREATE TABLE IF NOT EXISTS `cam_basic` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `can_id` int(11) NOT NULL,
  `cam_id` int(11) NOT NULL,
  `cam_title` varchar(255) NOT NULL,
  `cam_pic` varchar(255) NOT NULL,
  `cam_video` text NOT NULL,
  `type_of_cam` varchar(255) NOT NULL,
  `cam_goal` text NOT NULL,
  `cam_url` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=39 ;

--
-- Dumping data for table `cam_basic`
--

INSERT INTO `cam_basic` (`id`, `can_id`, `cam_id`, `cam_title`, `cam_pic`, `cam_video`, `type_of_cam`, `cam_goal`, `cam_url`) VALUES
(35, 66, 44, 'Tools for regular people to run effective campaigns.', 'b692493d8279fc19163ac6e3a97dabe5_abu_.png', '', 'Political', 'Polipad, first micro-campaign platform with simple but powerful tools. Built for regular people to campaign effectively and independently.', 'polipad'),
(36, 64, 45, 'School Recycling for a Greater Tommorow', '', '', 'Non-Political', 'Everyday humans waste recyclable materials about the length  circumference of the earth. We are guilty of this, especially in our schools.', 'SchoolRecyclingforthewin'),
(37, 66, 46, 'This is a test to do quality check on Polipad', '71a4f3a794e64495157b6844e7104415_abu_.jpg', '', 'Political', '', 'test060414'),
(38, 69, 47, 'Autism Speaks', '7205ae59a0d453bc20e76b53d368bbd7_matthew698_.jpg', '', 'Non-Political', 'Autism is a complex developmental disability, although if dealt with properly it is not a disability, it becomes a blessing.', 'Autismawarness');

-- --------------------------------------------------------

--
-- Table structure for table `cam_call_to_action`
--

DROP TABLE IF EXISTS `cam_call_to_action`;
CREATE TABLE IF NOT EXISTS `cam_call_to_action` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `can_id` int(11) NOT NULL,
  `cam_id` int(11) NOT NULL,
  `call_to_action` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=38 ;

--
-- Dumping data for table `cam_call_to_action`
--

INSERT INTO `cam_call_to_action` (`id`, `can_id`, `cam_id`, `call_to_action`) VALUES
(34, 66, 44, 'Build your campaign on Polipad today. &nbsp;<br>Join as an intern.&nbsp;<br>Spread the word. &nbsp;<br>Leave feedback or ideas on Polipad campaign page.'),
(35, 64, 45, 'All it takes is acknowledgement and some recycling action! Set up recycling bins at your schools today and teach your kids, friends and sibs'),
(36, 66, 46, ''),
(37, 69, 47, 'Stop the abuse of people with mental disabilities ');

-- --------------------------------------------------------

--
-- Table structure for table `cam_events`
--

DROP TABLE IF EXISTS `cam_events`;
CREATE TABLE IF NOT EXISTS `cam_events` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cam_id` int(11) NOT NULL,
  `event_title` varchar(255) NOT NULL,
  `place` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `add_date` datetime NOT NULL,
  `event_date` date NOT NULL,
  `start_on` varchar(255) NOT NULL,
  `ends_at` varchar(255) NOT NULL,
  `startdam` varchar(22) NOT NULL,
  `enddam` varchar(22) NOT NULL,
  `can_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `cam_events_plan_attend`
--

DROP TABLE IF EXISTS `cam_events_plan_attend`;
CREATE TABLE IF NOT EXISTS `cam_events_plan_attend` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cam_id` int(11) NOT NULL,
  `event_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `cam_feedback`
--

DROP TABLE IF EXISTS `cam_feedback`;
CREATE TABLE IF NOT EXISTS `cam_feedback` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cam_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `add_date` date NOT NULL,
  `comments` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=67 ;

--
-- Dumping data for table `cam_feedback`
--

INSERT INTO `cam_feedback` (`id`, `cam_id`, `user_id`, `add_date`, `comments`) VALUES
(65, 44, 67, '2014-06-02', 'I can''t wait to see this idea develop!'),
(66, 44, 69, '2014-06-09', 'This sight is the best googles got nothin on this');

-- --------------------------------------------------------

--
-- Table structure for table `cam_ideas`
--

DROP TABLE IF EXISTS `cam_ideas`;
CREATE TABLE IF NOT EXISTS `cam_ideas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cam_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `idea_title` varchar(255) NOT NULL,
  `details` text NOT NULL,
  `add_date` datetime NOT NULL,
  `idea_pic` varchar(255) NOT NULL,
  `caption` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `cam_ideas_comments`
--

DROP TABLE IF EXISTS `cam_ideas_comments`;
CREATE TABLE IF NOT EXISTS `cam_ideas_comments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cam_id` int(11) NOT NULL,
  `idea_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `comments` text NOT NULL,
  `add_date` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `cam_ideas_vote`
--

DROP TABLE IF EXISTS `cam_ideas_vote`;
CREATE TABLE IF NOT EXISTS `cam_ideas_vote` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cam_id` int(11) NOT NULL,
  `idea_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `vote` varchar(255) NOT NULL,
  `add_date` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `cam_justify`
--

DROP TABLE IF EXISTS `cam_justify`;
CREATE TABLE IF NOT EXISTS `cam_justify` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `can_id` int(11) NOT NULL,
  `cam_id` int(11) NOT NULL,
  `justify` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=27 ;

--
-- Dumping data for table `cam_justify`
--

INSERT INTO `cam_justify` (`id`, `can_id`, `cam_id`, `justify`) VALUES
(23, 66, 44, 'Traditionally, it had been very difficult for regular people to run effective campaign without the help of giant political or financial machines. Polipad wants to change that.&nbsp;<br>&nbsp;<br>We''ll build campaign tools that will provide helpful analytics, deep integration with social media sites, idea development modules. It will help you organize your support networks, and bring global participation in local politics.&nbsp;<br>&nbsp;<br>Polipad is NOT limited to political campaign though - you can build and run campaign on any social, environmental, economical issues.&nbsp;<br>&nbsp;<br>Polipad will be a cool, awesome, open-source campaign engine. So stay tuned.'),
(24, 64, 45, 'To create a better, healthier, more sustainable future starting with our youth- the very people that have to live through the later years. Our earth is changing and everyday we throw away so much in our public schools that can be recycled, such as paper. Recycling in public schools is not made mandatory yet but as more and more plastic bottles, cardboard, papers, empty milk cartons, aluminum cans and tinfoil are being thrown in the trashcan without second thought, we are digging ours and our children''s future demise and not being efficient with our earth. It doesn''t take much to go green; taking little steps as recycling in school can help!'),
(25, 66, 46, ''),
(26, 69, 47, 'To inform the public of Autism and to provide a place for people to share their stories and support others.&nbsp;<br>&nbsp;<br>Also to stop the negative rumors about people with Autism ');

-- --------------------------------------------------------

--
-- Table structure for table `cam_share`
--

DROP TABLE IF EXISTS `cam_share`;
CREATE TABLE IF NOT EXISTS `cam_share` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cam_id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `shared_date` date NOT NULL,
  `email_can_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `cam_supporters`
--

DROP TABLE IF EXISTS `cam_supporters`;
CREATE TABLE IF NOT EXISTS `cam_supporters` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cam_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `vote` varchar(255) NOT NULL,
  `add_date` date NOT NULL,
  `comments` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=159 ;

--
-- Dumping data for table `cam_supporters`
--

INSERT INTO `cam_supporters` (`id`, `cam_id`, `user_id`, `vote`, `add_date`, `comments`) VALUES
(157, 44, 64, 'I support the campaign and like to help out', '2014-06-09', 'great idea!! i would love to see it grow but am unsure it it would become more complicated if it were to grow.'),
(158, 44, 71, 'I support the campaign', '2014-06-25', 'For political campaigns, the current system is broken - something needs to change!');

-- --------------------------------------------------------

--
-- Table structure for table `cam_updates`
--

DROP TABLE IF EXISTS `cam_updates`;
CREATE TABLE IF NOT EXISTS `cam_updates` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cam_id` int(11) NOT NULL,
  `post_title` varchar(255) NOT NULL,
  `details` text NOT NULL,
  `add_date` datetime NOT NULL,
  `picture` varchar(255) NOT NULL,
  `caption` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `cam_why_you`
--

DROP TABLE IF EXISTS `cam_why_you`;
CREATE TABLE IF NOT EXISTS `cam_why_you` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `can_id` int(11) NOT NULL,
  `cam_id` int(11) NOT NULL,
  `why_you` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=28 ;

--
-- Dumping data for table `cam_why_you`
--

INSERT INTO `cam_why_you` (`id`, `can_id`, `cam_id`, `why_you`) VALUES
(24, 66, 44, 'We are not forming any political party, or running for office, or professing any new philosophy or "ism". We are just tool-makers. Polipad will be non-profit & open-source. We don''t pretend to know all that''s needed to make this successful; but we''ll learn as we move forward.'),
(25, 64, 45, 'I am a student. I am of the generation that would have to deal with the future and i think it is important for children at a young age to understand how to be more efficient with the earth and our resources. It doesn''t take much at a young age and its better now.'),
(26, 66, 46, ''),
(27, 69, 47, 'Because everyone "including me" knows someone with Autism ');

-- --------------------------------------------------------

--
-- Table structure for table `cd_user`
--

DROP TABLE IF EXISTS `cd_user`;
CREATE TABLE IF NOT EXISTS `cd_user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `role_id` int(11) NOT NULL DEFAULT '0',
  `username` varchar(100) NOT NULL DEFAULT '',
  `password` varchar(100) NOT NULL DEFAULT '',
  `name` varchar(255) NOT NULL DEFAULT '',
  `lname` varchar(255) NOT NULL DEFAULT '',
  `company` varchar(255) NOT NULL DEFAULT '',
  `email` varchar(255) NOT NULL DEFAULT '',
  `status` int(1) NOT NULL DEFAULT '0',
  `allnoti` int(11) NOT NULL DEFAULT '0',
  `photo` text NOT NULL,
  `congrat` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=72 ;

--
-- Dumping data for table `cd_user`
--

INSERT INTO `cd_user` (`id`, `role_id`, `username`, `password`, `name`, `lname`, `company`, `email`, `status`, `allnoti`, `photo`, `congrat`) VALUES
(1, 1, 'admin@yourdomain.net', '999999', 'Admin', '', '', 'admin@yourdomain.net', 1, 0, '1.jpg', 0),


-- --------------------------------------------------------

--
-- Table structure for table `invite`
--

DROP TABLE IF EXISTS `invite`;
CREATE TABLE IF NOT EXISTS `invite` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=4 ;

--
-- Dumping data for table `invite`
--


-- --------------------------------------------------------

--
-- Table structure for table `involved`
--

DROP TABLE IF EXISTS `involved`;
CREATE TABLE IF NOT EXISTS `involved` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `interest` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=7 ;

--
-- Dumping data for table `involved`
--


-- --------------------------------------------------------

--
-- Table structure for table `role_name`
--

DROP TABLE IF EXISTS `role_name`;
CREATE TABLE IF NOT EXISTS `role_name` (
  `role_id` int(11) NOT NULL AUTO_INCREMENT,
  `role_name` varchar(60) NOT NULL DEFAULT '',
  `role_description` varchar(200) NOT NULL DEFAULT '',
  PRIMARY KEY (`role_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `role_name`
--

INSERT INTO `role_name` (`role_id`, `role_name`, `role_description`) VALUES
(1, 'superadmin', 'Super Admin'),
(2, 'admin', 'Admin'),
(3, 'user', 'Site User');

-- --------------------------------------------------------

--
-- Table structure for table `visitors`
--

DROP TABLE IF EXISTS `visitors`;
CREATE TABLE IF NOT EXISTS `visitors` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cam_id` int(11) NOT NULL,
  `add_date` date NOT NULL,
  `ip_add` varchar(255) NOT NULL,
  `country` varchar(255) NOT NULL,
  `can_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=21 ;

--
-- Dumping data for table `visitors`
--

INSERT INTO `visitors` (`id`, `cam_id`, `add_date`, `ip_add`, `country`, `can_id`) VALUES
(1, 44, '2014-05-25', '203.202.247.230', 'Bangladesh', 42),
(2, 1, '2014-05-25', '66.249.73.222', 'United States', 0),
(3, 44, '2014-05-25', '202.4.173.58', 'Bangladesh', 0),
(4, 3, '2014-05-25', '66.249.73.222', 'United States', 0),
(5, 6, '2014-05-25', '66.249.73.222', 'United States', 0),
(6, 44, '2014-05-25', '98.196.53.87', 'United States', 66),
(7, 4, '2014-05-25', '66.249.73.222', 'United States', 0),
(8, 2, '2014-05-25', '66.249.73.222', 'United States', 0),
(9, 8, '2014-05-28', '157.55.33.112', 'United States', 0),
(10, 45, '2014-05-30', '99.99.153.137', 'United States', 64),
(11, 44, '2014-05-30', '99.99.153.137', 'United States', 64),
(12, 44, '2014-06-02', '50.240.247.238', 'United States', 67),
(13, 44, '2014-06-02', '98.196.53.87', 'United States', 68),
(14, 1, '2014-06-09', '99.99.153.137', 'United States', 64),
(15, 44, '2014-06-09', '99.62.173.250', 'United States', 69),
(16, 47, '2014-06-19', '180.76.6.41', 'China', 0),
(17, 44, '2014-06-25', '72.48.251.134', 'United States', 71),
(18, 1, '2014-07-08', '103.230.104.3', 'Bangladesh', 42),
(19, 1, '2014-07-08', '103.230.104.3', 'Bangladesh', 1),
(20, 44, '2014-08-31', '119.148.11.17', 'Bangladesh', 1);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
