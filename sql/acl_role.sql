-- phpMyAdmin SQL Dump
-- version 4.2.12deb2+deb8u2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Dec 11, 2016 at 11:23 PM
-- Server version: 10.0.28-MariaDB-0+deb8u1
-- PHP Version: 5.6.27-0+deb8u1

SET FOREIGN_KEY_CHECKS=0;
SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `pacificnm_test`
--

-- --------------------------------------------------------

--
-- Table structure for table `acl_role`
--

CREATE TABLE IF NOT EXISTS `acl_role` (
`acl_role_id` int(20) unsigned NOT NULL,
  `acl_role_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `acl_role`
--
ALTER TABLE `acl_role`
 ADD PRIMARY KEY (`acl_role_id`), ADD UNIQUE KEY `acl_role_name` (`acl_role_name`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `acl_role`
--
ALTER TABLE `acl_role`
MODIFY `acl_role_id` int(20) unsigned NOT NULL AUTO_INCREMENT;SET FOREIGN_KEY_CHECKS=1;
