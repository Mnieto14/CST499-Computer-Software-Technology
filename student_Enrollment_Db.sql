-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 22, 2022 at 05:01 PM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

CREATE DATABASE `student_enrollment`;

USE `student_enrollment`;

CREATE TABLE `class` (
  `class_id` int(10) NOT NULL,
  `className` varchar(250) NOT NULL,
  `maxStudents` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE `enrollment` (
  `enrollment_id` int(10) NOT NULL,
  `student_id` int(10) NOT NULL,
  `semester_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE `inform` (
  `inform_id` int(10) NOT NULL,
  `student_id` int(10) NOT NULL,
  `semester_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE `semester` (
  `semester_id` int(10) NOT NULL,
  `class_id` int(10) NOT NULL,
  `year` year(4) NOT NULL,
  `semester` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE `student` (
  `student_id` int(10) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(20) NOT NULL,
  `firstName` varchar(50) NOT NULL,
  `lastName` varchar(50) NOT NULL,
  `address` varchar(250) DEFAULT NULL,
  `phone` varchar(13) DEFAULT NULL,
  `program` varchar(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

ALTER TABLE `class`
  ADD PRIMARY KEY (`class_id`);

ALTER TABLE `enrollment`
  ADD PRIMARY KEY (`enrollment_id`),
  ADD KEY `student_id` (`student_id`),
  ADD KEY `semester_id` (`semester_id`);

ALTER TABLE `inform`
  ADD PRIMARY KEY (`inform_id`),
  ADD KEY `student_id` (`student_id`),
  ADD KEY `semester_id` (`semester_id`);

ALTER TABLE `semester`
  ADD PRIMARY KEY (`semester_id`),
  ADD KEY `class_id` (`class_id`);

ALTER TABLE `student`
  ADD PRIMARY KEY (`student_id`);

ALTER TABLE `class`
  MODIFY `class_id` int(10) NOT NULL AUTO_INCREMENT;

ALTER TABLE `enrollment`
  MODIFY `enrollment_id` int(10) NOT NULL AUTO_INCREMENT;

ALTER TABLE `inform`
  MODIFY `inform_id` int(10) NOT NULL AUTO_INCREMENT;

ALTER TABLE `semester`
  MODIFY `semester_id` int(10) NOT NULL AUTO_INCREMENT;

ALTER TABLE `student`
  MODIFY `student_id` int(10) NOT NULL AUTO_INCREMENT;

ALTER TABLE `enrollment`
  ADD CONSTRAINT `enrollment_ibfk_1` FOREIGN KEY (`student_id`) REFERENCES `student` (`student_id`),
  ADD CONSTRAINT `enrollment_ibfk_2` FOREIGN KEY (`semester_id`) REFERENCES `semester` (`semester_id`);

ALTER TABLE `inform`
  ADD CONSTRAINT `inform_ibfk_1` FOREIGN KEY (`student_id`) REFERENCES `student` (`student_id`),
  ADD CONSTRAINT `inform_ibfk_2` FOREIGN KEY (`semester_id`) REFERENCES `semester` (`semester_id`);

ALTER TABLE `semester`
  ADD CONSTRAINT `semester_ibfk_1` FOREIGN KEY (`class_id`) REFERENCES `class` (`class_id`);
COMMIT;
