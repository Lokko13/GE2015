-- General Elections Database
-- Created Feb 22, 2015

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+08:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;


CREATE DATABASE IF NOT EXISTS `elecom`;
USE `elecom`;

-- --------------------------------------------------------
-- LOOK UP TABLES
-- --------------------------------------------------------

CREATE TABLE IF NOT EXISTS `position_lookup` (
  `position_id` varchar(50) NOT NULL,
  PRIMARY KEY (`position_id`)
);

CREATE TABLE IF NOT EXISTS `college_lookup` (
  `college_id` varchar(50) NOT NULL,
  `college_name` varchar(50) NOT NULL,
  PRIMARY KEY (`college_id`)
);
-- --------------------------------------------------------
-- OTHER TABLES
-- --------------------------------------------------------

CREATE TABLE IF NOT EXISTS `active_sessions` (
  `session_id` varchar(12) NOT NULL,
  `session_ip_address` varchar(50) NOT NULL,
  `timestamp` varchar(255) NOT NULL,
  PRIMARY KEY (`session_id`)
);

-- --------------------------------------------------------
-- ENTITIES
-- --------------------------------------------------------

CREATE TABLE IF NOT EXISTS `admin`(
  `admin_id` varchar(12) NOT NULL,
  `first_name` varchar(30) NOT NULL,
  `last_name` varchar(20) NOT NULL,
  `password` varchar(50) NOT NULL,
  PRIMARY KEY (`admin_id`)
);

CREATE TABLE IF NOT EXISTS `voter` (
  `voter_id` varchar(12) NOT NULL,
  `first_name` varchar(30) NOT NULL,
  `last_name` varchar(20) NOT NULL,
  `college` varchar(50) NOT NULL, -- make a lookup table
  `password` varchar(50) NOT NULL,
  `voting` enum('Y','N') NOT NULL DEFAULT 'Y',
  PRIMARY KEY (`voter_id`),
  FOREIGN KEY  (`college`) REFERENCES `college_lookup`(`college_id`)
);

CREATE TABLE IF NOT EXISTS `candidate` ( 
  `candidate_id` varchar(12) NOT NULL, -- reference voter_id
  `position` varchar(50) NOT NULL, -- reference lookup table
  PRIMARY KEY (`candidate_id`),
  FOREIGN KEY (`candidate_id`) REFERENCES `voter`(`voter_id`),
  FOREIGN KEY (`position`) REFERENCES `position_lookup`(`position_id`)
);

CREATE TABLE IF NOT EXISTS `party` (
  `party_id` int(1) NOT NULL,
  `party_name` varchar(20) NOT NULL,
  PRIMARY KEY (`party_id`)
);


-- --------------------------------------------------------
-- RELATIONSHIPS
-- --------------------------------------------------------

CREATE TABLE IF NOT EXISTS `party_candidate` (
  `party_id` int(1) NOT NULL,
  `candidate_id` varchar(12) NOT NULL,
  PRIMARY KEY (`party_id`,`candidate_id`),
  FOREIGN KEY (`candidate_id`) REFERENCES `candidate`(`candidate_id`),
  FOREIGN KEY (`party_id`) REFERENCES `party`(`party_id`)
);

CREATE TABLE IF NOT EXISTS `votes_for` (
  `voter_id` varchar(12) NOT NULL,
  `candidate_id` varchar(12) NOT NULL,
  PRIMARY KEY (`voter_id`,`candidate_id`),
  FOREIGN KEY (`candidate_id`) REFERENCES `candidate`(`candidate_id`),
  FOREIGN KEY (`voter_id`) REFERENCES `voter`(`voter_id`)
);