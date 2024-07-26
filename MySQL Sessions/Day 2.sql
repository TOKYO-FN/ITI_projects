-- 1	Update students courses table,  set the registration date value to “Today”;
	UPDATE students_courses 
SET 
    reg_date = NOW();
 
-- 2	Display the registration date in the following format: Day, month/ year
	SELECT DATE_FORMAT(reg_date, "%W, %M %Y") as formatted FROM students_courses;

 
-- 3	Display the full name (first, last) of the student with his grade. if his garde is greater than 85% Excellent, 
-- from 75% to 85% Very good, from 65% to 75% Good and from 55% to 65% pass otherwise will be graded as failed.
	SELECT 
    CONCAT(first_name, ' ', last_name),
    CASE
        WHEN grade > 85 THEN 'Excellent'
        WHEN grade > 75 THEN 'Very good'
        WHEN grade > 65 THEN 'good'
        WHEN grade > 55 THEN 'pass'
        ELSE 'failed'
    END
FROM
    students
        JOIN
    students_courses ON students.student_id = students_courses.student_id;


-- 4	Display the capitalized last name , and the grade , if he has no grade  display the keyword absent. [using ifNULL function]
	SELECT 
    CONCAT(UCASE(SUBSTRING(last_name, 1, 1)),
            LCASE(SUBSTRING(last_name, 2))) AS last_name,
    IFNULL(grade, 'absent') AS grade
FROM
    students
        JOIN
    students_courses ON students.student_id = students_courses.student_id;



-- 5	Display students' names, course name along with their grades. 
SELECT 
    CONCAT(first_name, ' ', last_name) AS name,
    course_name,
    grade
FROM
    students_courses AS sc,
    students s,
    courses c
WHERE
    sc.student_id = s.student_id
        AND sc.course_id = c.course_id;
 

-- 6	For each course, display the course name, min grade, max grade, average grade, number of attended students.
	SELECT 
    course_name, MIN(grade), MAX(grade), AVG(grade), COUNT(*)
FROM
    courses,
    students_courses
WHERE
    courses.course_id = students_courses.course_id
GROUP BY course_name;


-- 7	Use subquery to display the names of the students who were born before student no 1.
	SELECT 
    CONCAT(first_name, ' ', last_name) AS name
FROM
    students
WHERE
    birth_date < (SELECT 
            birth_date
        FROM
            students
        WHERE
            student_id = 1);



-- 8	Use subquery to display the data of all the courses with a credit hour similar to MySQL's credit hours
	SELECT 
    *
FROM
    courses
WHERE
    credit_hour = (SELECT 
            credit_hour
        FROM
            courses
        WHERE
            course_name = 'MySQL')
        AND course_name <> 'MySQL';


-- 10	Create a view  called female_students_vu to display all the female students
	CREATE VIEW female_students_vu AS
    SELECT 
        *
    FROM
        students
    WHERE
        gender = 'female';


-- 11	Try to insert a male student through your view

	INSERT INTO female_students_vu
VALUES(10, 'Youssef', 'Magdy', NULL, NULL, '2002-12-02', 'male');

-- 12	Select all the data from your view and then from the students table

	SELECT * FROM female_students_vu;

 

SELECT 
    *
FROM
    students;
 
-- 13	Prevent the ability to insert another male student through you view

	CREATE OR REPLACE VIEW female_students_vu 
AS 
SELECT * FROM students 
WHERE gender = "female" WITH CHECK OPTION;

 
-- 14	Use the information schema to display the table name , schema and the updatability of the female_students_vu view
	USE INFORMATION_SCHEMA;
	select table_name, table_schema, IS_UPDATABLE from VIEWS;

 
-- 15	Use the information schema to display the create time, table_rows, auto_increment, and the comments on the students table.
	SELECT 
    TABLE_NAME,
    CREATE_TIME,
    TABLE_ROWS,
    AUTO_INCREMENT,
    TABLE_COMMENT
FROM
    TABLES
WHERE
    TABLE_SCHEMA = 'os'
        AND TABLE_NAME = 'students';


-- 16	Create a nonunique index on the foreign key column (COURSE_ID) in the students_courses table.
	use os;
ALTER TABLE students_courses ADD INDEX(course_id);

 
-- 17	Create a user with your name and give him the privilege to access the grades database
	
CREATE USER 'youssef_magdy'@'localhost' IDENTIFIED BY 'OS123';

GRANT SELECT ON grades.* TO 'youssef_magdy'@'localhost';

SELECT User, Host FROM mysql.user; 
 
-- 18	Connect to mysql using the user you created and try to insert one record in the courses table.
	
SELECT 
    *
FROM
    courses;
 

INSERT INTO courses VALUES(NULL, 'DataStructures', 4);  
-- 19	Change your password.
	ALTER USER 'youssef_magdy'@'localhost' IDENTIFIED BY 'newwww';

-- 20	Show your privileges.
	
show grants;
 


