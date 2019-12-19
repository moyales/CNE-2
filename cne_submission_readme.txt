Cheap & Ease
CS-146C

Walker Bove
Adrian Gomes
Matthew Oyales
Rafael Sanchez

"I pledge my honor that I have abided by the Stevens Honor System."

This web project has been an incredible experience. Not only did I learn about putting together a functional website, but it also gave me 
many opportunities to explore ideas while collaborating with a team. One of the things I learned about building a website was how to
organize the flow - referring to the user experience -- starting with the log in/signup forms, entering information, storing and retrieving
it to generate reports. We agreed to create a money management application for college students.

--Project Structure--
The files for this project pretty much mirror the flow the website. We designed an application that reused resources we created such as the
page headers and footers to make developing each page easier. We discovered that Codeigniter could help achieve these design goals.

--Setting up C&E on your Machine--
1. Install XAMPP - which provides a webserver (Apache), database (MySQL), and PHP

2. Edit the host file in Windows/System32/drivers/etc and add the line:
    127.0.0.1       students.stevens.edu

3. Place the contents of the zip file inside htdocs within XAMPP

4. Create an alias in xampp/apache/conf/extra/httpd-xampp.conf and add this bit:
    Alias /cne "D:/xampp/htdocs/cne/"
	<Directory "D:/xampp/htdocs/cne/">
		Order allow,deny
		Allow from all
		Require all granted
		Satisfy any
	</Directory>

5. The application requires Codeigniter - which is a collection of PHP classes that makes it easier to organize page views and templates as well as
   connecting to the database. This should alrady be included within this package.

--MySQL Data Table Setup--
1- Create the database called cne.  
2- Create the tables via the SQL tab.   For convenience, he just need to copy-paste SQL statements and click Go to create the tables for the project.

use cne
;

CREATE TABLE `main_expenses` (
  `username` varchar(32) NOT NULL,
  `expenseType` varchar(32) NOT NULL,
  `expenseCategory` varchar(32) NOT NULL,
  `expenseFrequency` varchar(32) NOT NULL,
  `oneTimeExpenseDate` date NOT NULL,
  `expenseAmount` int(11) NOT NULL,
  `expenseTitle` varchar(64) NOT NULL,
  `expenseDescription` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 
;

CREATE TABLE `main_forecast` (
 `username` varchar(32) NOT NULL,
 `expectedIncome` int(11) NOT NULL,
 `expectedFood` int(11) NOT NULL,
 `expectedEntertainment` int(11) NOT NULL,
 `expectedTransport` int(11) NOT NULL,
 `expectedShopping` int(11) NOT NULL,
 `expectedSchool` int(11) NOT NULL,
 `expectedRecurring` int(11) NOT NULL,
 `expectedOther` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb
;

CREATE TABLE `main_goals` (
 `username` varchar(32) NOT NULL,
 `goalType` varchar(32) NOT NULL,
 `goalTitle` varchar(64) NOT NULL,
 `goalAmount` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb
;

CREATE TABLE `main_goals` (
 `username` varchar(32) NOT NULL,
 `goalType` varchar(32) NOT NULL,
 `goalTitle` varchar(64) NOT NULL,
 `goalAmount` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb
;

CREATE TABLE `membership` (
 `id` int(11) NOT NULL AUTO_INCREMENT,
 `first_name` varchar(25) NOT NULL,
 `last_name` varchar(25) NOT NULL,
 `username` varchar(25) NOT NULL,
 `password` varchar(32) NOT NULL,
 `email_address` varchar(50) NOT NULL,
 PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4
;

--Technical Notes--
XAMPP 7.3.12
Codeigniter 3.11
MySQL 4.9.1
PHP 7.3.10
jQuery 2.0.0