-- phpMyAdmin SQL Dump
-- version 3.3.9
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Nov 22, 2011 at 06:28 AM
-- Server version: 5.5.8
-- PHP Version: 5.3.5

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `simpleblog`
--

-- --------------------------------------------------------

--
-- Table structure for table `blogattachments`
--

CREATE TABLE IF NOT EXISTS `blogattachments` (
  `fileID` bigint(20) NOT NULL AUTO_INCREMENT,
  `topicID` bigint(20) NOT NULL,
  `fileTitle` varchar(255) NOT NULL,
  `fileName` varchar(255) NOT NULL,
  `fileNameIs` varchar(10) NOT NULL,
  `fileHits` bigint(20) NOT NULL DEFAULT '0',
  PRIMARY KEY (`fileID`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='List of all attachments' AUTO_INCREMENT=1 ;

--
-- Dumping data for table `blogattachments`
--


-- --------------------------------------------------------

--
-- Table structure for table `blogreplies`
--

CREATE TABLE IF NOT EXISTS `blogreplies` (
  `replyID` bigint(20) NOT NULL AUTO_INCREMENT,
  `topicID` bigint(20) NOT NULL,
  `userID` bigint(20) NOT NULL,
  `replyTitle` varchar(255) NOT NULL,
  `replyText` text NOT NULL,
  `replyDate` datetime NOT NULL,
  PRIMARY KEY (`replyID`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='List of all replies/comments' AUTO_INCREMENT=23 ;

--
-- Dumping data for table `blogreplies`
--

INSERT INTO `blogreplies` (`replyID`, `topicID`, `userID`, `replyTitle`, `replyText`, `replyDate`) VALUES
(20, 35, 3, 'learn', 'Really learn it is a good doc', '2011-11-17 15:22:59');

-- --------------------------------------------------------

--
-- Table structure for table `blogtopics`
--

CREATE TABLE IF NOT EXISTS `blogtopics` (
  `topicID` bigint(20) NOT NULL AUTO_INCREMENT,
  `userID` int(11) NOT NULL,
  `catID` bigint(20) NOT NULL,
  `topicTitle` varchar(255) NOT NULL,
  `topicText` longtext NOT NULL,
  `topicCreated` datetime NOT NULL,
  `topicUpdated` datetime NOT NULL,
  PRIMARY KEY (`topicID`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='List of all blog topics' AUTO_INCREMENT=47 ;

--
-- Dumping data for table `blogtopics`
--

INSERT INTO `blogtopics` (`topicID`, `userID`, `catID`, `topicTitle`, `topicText`, `topicCreated`, `topicUpdated`) VALUES
(19, 1, 3, 'Optics in LEDs for lighting', 'Light-emitting diodes (LEDs) have been changing the way we see the world since the 1960s. Their usage in everyday life is pervasive and continues to increase thanks to the cutting-edge research being done in the field of optics. To highlight breakthroughs in LEDs, the editors of Energy Express, a bi-monthly supplement to Optics Express, the open-access journal of the Optical Society (OSA), today published a special Focus Issue on Optics in LEDs for Lighting. The issue is organized and edited by Guest Editors Jae-Hyun Ryou and Russell Dupuis of the Georgia Institute of Technology.\r\n\r\n"The papers in this Focus Issue represent the outcome of state-of-the-art research and development by recognized experts in the field of LEDs, said Ryou. "These latest advances are truly exceptional and will prove to be invaluable to advancements in lighting technology".', '2011-10-16 15:52:11', '2011-10-16 15:52:11'),
(18, 1, 3, 'New laser technology', 'The University of California, Riverside Bourns College of Engineering has made a discovery in semiconductor nanowire laser technology that could potentially do everything from kill viruses to increase storage capacity of DVDs.\r\n\r\nUltraviolet semiconductor diode lasers are widely used in data processing, information storage and biology. Their applications have been limited, however, by size, cost and power. The current generation of ultraviolet lasers is based on a material called gallium nitride, but Jianlin Liu, a professor of electrical engineering, and colleagues have made a breakthrough in zinc oxide nanowire waveguide lasers, which can offer smaller sizes, lower costs, higher powers and shorter wavelengths.', '2011-11-16 15:51:41', '2011-11-16 16:26:20'),
(20, 1, 12, 'An application for every occasion', 'The Nokia W8 has an application to suit all. It includes a HTML Browser along with various social networking sites applications that allow the user to stay in touch with both their friends and family on a regular basis whilst on the go!\r\n\r\nFacebook and Twitter are two of the most popular social networking applications available and both come with the option of push notifications. This will notify the user of when he or she has been contacted through either site.\r\n\r\nAnother major selling point of this particular handset is that the Nokia W8 device includes popular software and applications and also has useful data access to facilities such as GPRS, EDGE, Bluetooth, 3G port and Wi-Fi connectivity. ', '2011-09-16 15:53:18', '2011-09-16 15:53:18'),
(35, 3, 16, 'Installation guide', 'Drupal provides an installation script that automatically populates database tables and configures the correct settings in the settings.php file. This section covers preparing for installation, running the installation script itself, and the steps that should be done after running the installation script has completed. It also explains how to do a "multi site" installation, where a number of different Drupal sites run off the same code base.\r\nBefore proceeding with your first Drupal installation, you should also review the best practices section. For help with Drupal terms, see the glossary page.\r\nOther tools\r\n\r\nSome of the steps in the installation process can be performed with tools such as graphical applications for moving files and managing databases or tools that are provided by your hosting service. This documentation focuses on performing tasks at the command line. For information on using other tools, see the documentation that accompanies the application or is provided by your hosting service. \r\nCreating a test site on a local computer\r\n\r\nIt is considered a good practice to do all development work on a separate test site before making changes to a production site. A test site allows you to evaluate the impact of upgrades, new modules, modifications to themes etc. without causing disruption to your live site. For information about setting up a web server on a local computer, see the Local Server Setup section of the Developing for Drupal guide.\r\nAlternative methods for installation\r\n\r\nSome web hosting companies offer "one-click" installations of Drupal, or specific Drupal support. You may be able to locate one on the Drupal hosting handbook page.\r\n\r\n<b>There is also information about Drupal</b><br>distributions, which include installation profiles and pre-packaged distributions of Drupal and modules. These may be of help as well.', '2011-11-17 15:19:24', '2011-11-17 15:19:24'),
(23, 3, 13, 'Apprenda platform aims to keep developers focused on productivity', 'Cloud computing is an increasingly broad topic that encompasses everything from Google Apps to data center services to virtualization to software-, infrastructure- and platform-as-a service. Technology executives are increasingly interested in cloud computing as a way to save money. Nevertheless, cloud adoption remains in the single digits amid security concerns. Rest assured that cloud computing is a game changer. Key players include: IBM, HP, Google, Microsoft, Amazon Web Services, ', '2011-07-16 16:01:14', '2011-07-16 16:01:14'),
(42, 1, 11, 'How to add more memory to a PC using USB Flash Drive', 'You gotta love this way of boosting your computer speed using just an USB Flash Drive. First of all we are talking here about a new feature starting being implemented with Windows Vista (Vista and Windows 7) so please don’t ask about XP. There is a way you can increase the speed of a PC running XP but not through this method but moving the Win Page File / Swap to a high speed USB Flash Drive. We gonna discuss a bit about this method later on.\r\n\r\nFor now, I’m gonna explain how can you increase the speed of a PC using just a simple Flash Drive. Clear thing, the USB Flash Drive you wanna use should be a high speed one. You will say, why not just buying some new DDR since a high speed USB Flash is pretty much the same price. The answer will be, this is a temporary measure, I’m not talking about boosting your computer this way permanently but when you need a pinch of speed, let’s say when opening a huge PSD file and the memory installed is not helping anymore :)\r\n\r\nBefore starting I recommend you to make sure you have a high speed USD Flash Drive with at least 256MB of space. The capacity is a condition, otherwise you won’t be able to use ReadyBoost. This is what happen when any of these conditions aren’t fulfilled. ', '2011-11-18 11:19:40', '2011-11-18 11:19:40'),
(43, 1, 11, 'uRex DVD Ripper Platinum Giveaway', 'Hi guys, it’s been a while since I posted a giveaway. Today is time for a new one as I’m going to recommend another powerful DVD ripping application, uRex DVD Ripper Platinum. uRexsoft is now giving away their uRex DVD Ripper Platinum for any Kensfi reader!\r\n\r\nThough you might not have heard of this DVD ripper before, I don’t think you will miss the opportunity to try out a free one. I gave it a go last night as I like to watch movies on my iPhone 4 (not 5 yet hahaaa), so I’ve ripped some movies and guess what? It went through flawlessly and they played perfectly on my iPhone!\r\n\r\nYou can get more information on their website as this DVD ripper can do more things than you think, overall one of the best rippers I was ever given the chance to put my hands on :)\r\n\r\nuRex DVD Ripper Platinum originally costs $34.95, but it is now free with full functions. Unlike other software giveaways at present, uRexsoft offers 4 ways to get their free & lifetime updates. For more information, you need to visit the promo page.\r\n\r\nAttention:\r\nuRexsoft is very glad to offer free support even for their giveaway users. If you have any suggestions or questions, please do not hesitate to contact them. Giveaway version of uRex DVD Ripper Platinum is not available for free updates but they are free if you follow one of the 4 ways mentioned on the promo page.', '2011-06-18 11:20:19', '2011-06-18 11:20:19'),
(44, 1, 16, 'Views in drupal', 'The Views module provides a flexible method for Drupal site designers to control how lists and tables of content (nodes in Views 1, almost anything in Views 2) are presented. Traditionally, Drupal has hard-coded most of this, particularly in how taxonomy and tracker lists are formatted.\r\n\r\nThis tool is essentially a smart query builder that, given enough information, can build the proper query, execute it, and display the results. It has four modes, plus a special mode, and provides an impressive amount of functionality from these modes.\r\nAmong other things, Views can be used to generate reports, create summaries, and display collections of images and other content.', '2011-11-18 11:23:31', '2011-11-18 11:23:31'),
(45, 1, 13, 'Batteries charge quickly and retain capacity', '"This system that we have gives you capacitor-like power with battery-like energy," said Braun, a professor of materials science and engineering. "Most capacitors store very little energy. They can release it very fast, but they cant hold much. Most batteries store a reasonably large amount of energy, but they cant provide or receive energy rapidly. This does both".', '2011-06-18 11:30:02', '2011-06-18 11:30:02'),
(46, 1, 16, 'Increase in smart-phone litigation', 'The flurry of smart-phone patent suits at the U.S. International Trade Commission (ITC) is being driven by technology companies eager to capitalize on the speed and expertise of the specialized venue, says a University of Illinois patent strategy expert.\r\n\r\nBusiness professor Deepak Somaya says that this current wave of patent litigation is a "clash driven by company strategies".\r\n\r\n"Smart phones combine lots of amazing innovation from both computing and mobile telephony, and technology companies are seeing their patents as a potential source of leverage, as something that can help them improve their competitive position against other firms seeking to take advantage of this great confluence of technologies," he said. "When these firms go court shopping for filing patent cases, a number of of them are choosing to target the ITC over the more typical forum of the federal district courts".', '2011-07-18 11:31:01', '2011-07-18 11:31:01');

-- --------------------------------------------------------

--
-- Table structure for table `catlist`
--

CREATE TABLE IF NOT EXISTS `catlist` (
  `catID` bigint(20) NOT NULL AUTO_INCREMENT,
  `userId` bigint(20) NOT NULL,
  `catTitle` varchar(255) NOT NULL,
  `catDesc` text NOT NULL,
  PRIMARY KEY (`catID`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='List of all categories' AUTO_INCREMENT=17 ;

--
-- Dumping data for table `catlist`
--

INSERT INTO `catlist` (`catID`, `userId`, `catTitle`, `catDesc`) VALUES
(16, 3, 'Drupal', 'Scheduled'),
(3, 0, 'Gadget', 'Gadget'),
(11, 3, 'Computer', 'Computer'),
(13, 3, 'Cloud computing', 'Cloud computing'),
(12, 3, 'Cell phone', 'Cell phone');

-- --------------------------------------------------------

--
-- Table structure for table `siteconfig`
--

CREATE TABLE IF NOT EXISTS `siteconfig` (
  `configName` varchar(255) NOT NULL,
  `configValue` text NOT NULL,
  PRIMARY KEY (`configName`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='List of all site configurations';

--
-- Dumping data for table `siteconfig`
--

INSERT INTO `siteconfig` (`configName`, `configValue`) VALUES
('siteName', 'Simple Blog'),
('siteURL', ''),
('allowRegistration', '1'),
('requireVerification', '1'),
('allowGuest', '0'),
('allowBBCode', '1'),
('maxWords', '500'),
('registerTemplate', 'Hello %userName%,\r\n\r\nYou have successfully registered at %siteName%. Your registration info are:\r\n\r\nUsername: %userName%\r\nPassword: %userPassword%\r\n\r\nHowever, before posting. You must verify this email by clicking on:\r\n\r\n%siteURL%?verificationCode=%userStatus%\r\n\r\nThanks,'),
('forgotTemplate', 'Hello %userName%,\r\n\r\nYou have requested that your password be retrieved.\r\n\r\nYour password is: %userPassword%\r\n\r\nYou can visit %siteName% by going to:\r\n%siteURL%\r\n\r\nThanks,'),
('siteEmail', 'admin@gmail.com'),
('registerTemplateSubject', 'Thanks for registering at %siteName%'),
('forgotTemplateSubject', 'Your password for %siteName%'),
('fileLocation', 'files/'),
('allowSearch', '1'),
('showCats', '1'),
('showDates', '1');

-- --------------------------------------------------------

--
-- Table structure for table `userlist`
--

CREATE TABLE IF NOT EXISTS `userlist` (
  `userID` bigint(20) NOT NULL AUTO_INCREMENT,
  `userName` varchar(50) NOT NULL,
  `userEmail` varchar(100) NOT NULL,
  `userPassword` varchar(50) NOT NULL,
  `userStatus` varchar(10) NOT NULL,
  `role` varchar(10) DEFAULT NULL,
  `registerDate` datetime NOT NULL,
  PRIMARY KEY (`userID`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='List of all users' AUTO_INCREMENT=45 ;

--
-- Dumping data for table `userlist`
--

INSERT INTO `userlist` (`userID`, `userName`, `userEmail`, `userPassword`, `userStatus`, `role`, `registerDate`) VALUES
(1, 'admin', 'admin@gmail.com', 'admin', '1', 'admin', '2011-11-03 15:00:44'),
(2, 'alex', 'alex@gmail.com', 'alex', '1', NULL, '2011-11-03 15:00:44'),
(3, 'john', 'john@photoninfotech.net', 'john', '1', NULL, '2011-11-03 15:06:28');

-- --------------------------------------------------------

--
-- Table structure for table `usersessions`
--

CREATE TABLE IF NOT EXISTS `usersessions` (
  `sessionID` varchar(20) NOT NULL,
  `userID` bigint(20) NOT NULL,
  `sessionTime` datetime NOT NULL,
  PRIMARY KEY (`sessionID`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='List of user login sessions';

--
-- Dumping data for table `usersessions`
--

INSERT INTO `usersessions` (`sessionID`, `userID`, `sessionTime`) VALUES
('74f1cf6d3f', 1, '2011-11-18 11:10:56'),
('57578c06e6', 1, '2011-11-17 15:54:32');

