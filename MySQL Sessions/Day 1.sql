-- Create a database called grades
create database grades;


-- Create the following tables in the grades database:
-- students table
CREATE TABLE students (
    student_id INT PRIMARY KEY,
    student_name VARCHAR(100) NOT NULL,
    email VARCHAR(50),
    tel VARCHAR(20)
);

 

-- Courses table
CREATE TABLE courses (
    course_id INT PRIMARY KEY,
    course_name VARCHAR(100) NOT NULL,
    credit_hours INT
);

 


-- Student_courses table
CREATE TABLE student_courses (
    course_id INT,
    student_id INT,
    grade INT,
    reg_date DATE,
    FOREIGN KEY (course_id)
        REFERENCES courses (course_id),
    FOREIGN KEY (student_id)
        REFERENCES students (student_id),
    PRIMARY KEY (course_id , student_id)
);

 



-- Modify the students table to allow for longer Student names (150 char)
--  Confirm your modification.
ALTER TABLE students
MODIFY student_name VARCHAR(150);

 
-- 4	Add constraint to force unique email for each student
ALTER TABLE students
MODIFY email VARCHAR(50) UNIQUE;

 
-- 5	Get Time, Date, Current user, MySQL Version using prompt?
SELECT 
    NOW() AS 'time and date',
    VERSION() AS 'current version',
    USER() AS 'curretn user';

 
-- 6	Add gender column for the students table. It holds two value (male or female)
ALTER TABLE students
ADD COLUMN gender enum('male', 'female');

 
-- 7	Add birth_date column for the students table.
ALTER TABLE students
ADD COLUMN birth_date DATE;

 
-- 8	Drop the student_name column and replace it with first name and last name.
ALTER TABLE students
DROP COLUMN student_name;

 

ALTER TABLE students
ADD COLUMN first_name VARCHAR(100),
ADD COLUMN last_name VARCHAR(100);

 
-- 9	Insert your friend’s data into the table students.
INSERT INTO students
VALUES (1, 'youssefmagdy@ieee.org', '201211249403', 'male', '2002-12-02', 'Youssef', 'Magdy');
 
-- 10	Create a new table (male_students) based on students table and fill it with the data of male students
	CREATE TABLE male_students AS SELECT * FROM
    students
WHERE
    gender = 'male';

 

-- Part II
-- Create another database “OS”

Create Database OS;

Use OS;

CREATE TABLE IF NOT EXISTS `students` (
    `student_id` INT(11) NOT NULL AUTO_INCREMENT,
    `first_name` VARCHAR(45) NOT NULL,
    `last_name` VARCHAR(45) NOT NULL,
    `tel` VARCHAR(11) NULL,
    `email` VARCHAR(255) NULL,
    PRIMARY KEY (`student_id`)
)  ENGINE=INNODB;

Alter table students add gender enum ('male', 'female');
Alter table students add birth_date date;

CREATE TABLE IF NOT EXISTS `courses` (
    `course_id` INT NOT NULL AUTO_INCREMENT,
    `course_name` VARCHAR(25) NOT NULL,
    `credit_hour` INT(11) NULL,
    PRIMARY KEY (`course_id`)
)  ENGINE=INNODB;


CREATE TABLE IF NOT EXISTS `students_courses` (
    `student_id` INT(11) NOT NULL,
    `course_id` INT NOT NULL,
    `grade` INT(11) NULL,
    `reg_date` DATE NULL,
    PRIMARY KEY (`student_id` , `course_id`),
    FOREIGN KEY (`student_id`)
        REFERENCES `students` (`student_id`),
    FOREIGN KEY (`course_id`)
        REFERENCES `courses` (`course_id`)
)  ENGINE=INNODB;

/************* courses table data ****************/
insert into `courses` (`course_id`, `course_name`, `credit_hour`) values('1','Database','2');
insert into `courses` (`course_id`, `course_name`, `credit_hour`) values('2','C','3');
insert into `courses` (`course_id`, `course_name`, `credit_hour`) values('3','Network','1');
insert into `courses` (`course_id`, `course_name`, `credit_hour`) values('4','OS','1');
insert into `courses` (`course_id`, `course_name`, `credit_hour`) values('5','MySQL','2');
insert into `courses` (`course_id`, `course_name`, `credit_hour`) values('6','Java','4');

/***************** studnets *************/

insert into `students` (`student_id`, `first_name`, `last_name`, `tel`, `email`, `gender`, `birth_date` ) values
('1','Ahmed','Aly',NULL,NULL,'male', '1991-10-01');
insert into `students` (`student_id`, `first_name`, `last_name`, `tel`, `email`, `gender`, `birth_date` ) values ('2','Ahmed','Ibrahim',NULL,NULL,'male', '1991-09-01');
insert into `students` (`student_id`, `first_name`, `last_name`, `tel`, `email`, `gender`, `birth_date` ) values ('3','Ahmed','Ossama',NULL,NULL,'male', '1992-10-01');
insert into `students` (`student_id`, `first_name`, `last_name`, `tel`, `email`, `gender`, `birth_date` ) values ('4','Hoda','Khaled',NULL,NULL,'female', '1991-09-01');

insert into `students` (`student_id`, `first_name`, `last_name`, `tel`, `email`, `gender`, `birth_date` ) values ('5','Mona','Khalil',NULL,NULL,'female', '1992-10-01');



insert into `students_courses` (`student_id`, `course_id`, `grade`, `reg_date`) values('1','1','80',NULL);
insert into `students_courses` (`student_id`, `course_id`, `grade`, `reg_date`) values('1','2','90',NULL);
insert into `students_courses` (`student_id`, `course_id`, `grade`, `reg_date`) values('1','3','100',NULL);
insert into `students_courses` (`student_id`, `course_id`, `grade`, `reg_date`) values('2','3','80',NULL);
insert into `students_courses` (`student_id`, `course_id`, `grade`, `reg_date`) values('3','4','70',NULL);





-- 1	Display all students’ information.
	SELECT 
    *
FROM
    students	

-- 2	Display male students only.
	SELECT 
    *
FROM
    students
WHERE
    gender = 'male'
 
-- 3	Display the number of female students.
	SELECT 
    COUNT(gender)
FROM
    students
WHERE
    gender = 'female'
 
-- 4	Display the students’ data for the students who are born before 1992-10-01.
	SELECT 
    *
FROM
    students
WHERE
    birth_date < '1992-10-01'
 
-- 5	Display the students’ data for the students who are born before 1991-10-01.
	SELECT * FROM students WHERE birth_date < '1991-10-01' AND gender = 'male';
 
-- 6	Display course_id and their grades sorted by grades.
	SELECT course_id, grade FROM students_courses ORDER BY grade;
 
-- 7	Display students’ names that begin with A.
	SELECT CONCAT(first_name, ' ', last_name) AS "Student Name" FROM students
    WHERE first_name LIKE 'A%';

 
-- 8	Display the gender, number of males and females.
	SELECT gender, COUNT(gender) FROM students
    GROUP BY (gender);

 
-- 9	Display the repeated first names and their counts if higher than 2.
	SELECT first_name, COUNT(first_name)
    FROM students
    GROUP BY first_name
    HAVING COUNT(first_name) > 2;

 
-- 10	Display the subject with highest grade
	SELECT course_id FROM students_courses ORDER BY grade DESC LIMIT 1;
 

