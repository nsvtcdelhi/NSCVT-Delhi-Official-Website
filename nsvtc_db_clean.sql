SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

CREATE TABLE `students` (
  `id` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `enrollment` varchar(50) DEFAULT NULL,
  `sector` varchar(100) DEFAULT NULL,
  `result` varchar(20) DEFAULT NULL,
  `Father Name` varchar(100) NOT NULL,
  `Mother Name` varchar(100) NOT NULL,
  `Course Name` varchar(100) NOT NULL,
  `Duration` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO `students`
(`id`,`name`,`enrollment`,`sector`,`result`,
`Father Name`,`Mother Name`,`Course Name`,`Duration`)
VALUES
(1,'Rahul','NSV100','Beauty Parlour','PASS','','','',''),
(2,'Sita','NSV102','Beauty Parlour','FAIL','','','',''),
(3,'Ravi','NSV103','Apparel','PASS','Ramprasad','Pramila bai','apearal','12 Months'),
(4,'AMAN','NSV101','Beauty Parlour','PASS','','','',''),
(5,'RAHUL','AVI008','Beauty Parlour','PASS','','','',''),
(6,'RAHUL','AVI008','Beauty Parlour','PASS','','','',''),
(7,'RAVI','NSV103','Apparel','PASS','MOHAN','SITA','Beautician','12 Month'),
(8,'RAMAN','NSV106','Beautician','PASS','PAWAN','RUKHMANI','BEAUTICIAN','20'),
(9,'RAHUL','AVI008','Beauty Parlour','PASS','','','',''),
(10,'SANDHYA','NSVTC-2022-001102',
'BEAUTY AND WELLNESS',
'PASS',
'TEJSINGH',
'PREMKALA',
'DIPLOMA IN BEAUTY CULTURE',
'12 Month'),

(11,'SANDHYA',
'NSVTC-2022-001102',
'DIPLIMA IN BEAUTY CULTURE',
'PASS',
'TEJSINGH',
'PREMKALA',
'Beautician',
'12 Months');

ALTER TABLE `students`
ADD PRIMARY KEY (`id`);

ALTER TABLE `students`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,
AUTO_INCREMENT=12;

COMMIT;
