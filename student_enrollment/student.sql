-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 08, 2020 at 07:22 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";

create table Student (id integer AUTO_INCREMENT, name varchar(10), lastname varchar(10), age integer, degree varchar(10), PRIMARY KEY(id));

insert into Student (id, name, lastname, age, degree) values
(1,'ram','reddy',26,'Masters'),
(5,'bhargav','vummadi',23,'Masters'),
(3,'uma','reddy',22,'Bachelors'),
(7,'harshini','shekar',23,'Bachelors'),
(6,'raj','mohan',31,'Masters'),
(2,'ghani','tarak',27,'Masters');



CREATE TABLE Course (id integer AUTO_INCREMENT, courseid varchar(20), name varchar(20), seatlimit int(20), degree varchar(15), PRIMARY KEY(id));

insert into Course(id, courseid, name, seatlimit, degree) values
(1,'DA1','Data analytics',35,'Bachelors'),
(6,'CS3','Computer Science',50,'Masters'),
(3,'DS2','Datascience',30,'Masters'),
(5,'ID4','Interior Design',20 ,'Masters'),
(2,'ME7','Mechanical Engineering',25,'Bachelors'),
(4,'EE5','Electrical Engineering',25,'Masters');


CREATE TABLE Enrollment (id integer AUTO_INCREMENT, studentid integer, courseid varchar(20), PRIMARY KEY(id));

insert into Enrollment (id, studentid, course-id) values
(1,1,'DS2'),
(2,5,'CS3'),
(3,3,'ME7'),
(4,6,'EE5'),
(5,7,'DA1'),
(7,1,'ID4');

CREATE TABLE LoginData (username varchar(20) not null, password varchar(20) not null);

insert into LoginData (username, password) values
('ram0001','abc123'),
('bha0005','abc561'),
('uma0003','abc345'),
('har0007','abc712'),
('raj0006','abc612'),
('gha0002','abc234');

COMMIT;