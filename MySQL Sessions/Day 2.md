# MySQL Labs: Day 2

## 1. Update Registration Date in `student_courses` Table
```sql
UPDATE student_courses SET reg_date=NOW();
```

## 2. Display Registration Date in Specific Format
```sql
SELECT DATE_FORMAT(reg_date, "%W, %M %Y") AS formatted FROM student_courses;
```

## 3. Display Full Name with Grade Classification
```sql
SELECT CONCAT(first_name, ' ', last_name) AS full_name,
CASE
    WHEN grade > 85 THEN "Excellent"
    WHEN grade > 75 THEN "Very Good"
    WHEN grade > 65 THEN "Good"
    WHEN grade > 55 THEN "Pass"
    ELSE "Failed"
END AS grade_classification
FROM students
JOIN student_courses ON students.student_id = student_courses.student_id;
```

## 4. Display Capitalized Last Name and Grade (or 'absent' if NULL)
```sql
SELECT
    CONCAT(UCASE(SUBSTRING(last_name, 1, 1)), LCASE(SUBSTRING(last_name, 2))) AS last_name,
    IFNULL(grade, "absent") AS grade
FROM students
JOIN student_courses ON students.student_id = student_courses.student_id;
```

## 5. Display Students' Names, Course Name, and Grades
```sql
SELECT 
    CONCAT(first_name, ' ', last_name) AS name,
    course_name,
    grade
FROM 
    students s
JOIN 
    student_courses sc ON s.student_id = sc.student_id
JOIN 
    courses c ON sc.course_id = c.course_id;
```

## 6. Display Course Statistics: Min, Max, Avg Grades, and Number of Students
```sql
SELECT 
    course_name,
    MIN(grade) AS min_grade,
    MAX(grade) AS max_grade,
    AVG(grade) AS avg_grade,
    COUNT(*) AS student_count
FROM courses
JOIN student_courses ON courses.course_id = student_courses.course_id
GROUP BY course_name;
```

## 7. Subquery: Students Born Before Student No. 1
```sql
SELECT CONCAT(first_name, ' ', last_name) AS name
FROM students
WHERE birth_date < (SELECT birth_date FROM students WHERE student_id = 1);
```

## 8. Subquery: Courses with the Same Credit Hours as MySQL Course
```sql
SELECT * FROM courses
WHERE credit_hours = (SELECT credit_hours FROM courses WHERE course_name = "MySQL");
```

## 9. Create a View for Female Students
```sql
CREATE VIEW female_students_vu AS
SELECT * FROM students WHERE gender = "female";
```

## 10. Attempt to Insert a Male Student into the `female_students_vu` View
```sql
INSERT INTO female_students_vu
VALUES (10, 'Youssef', 'Magdy', NULL, NULL, 'male', '2002-02-12');
```

## 11. Select All Data from the `female_students_vu` View and `students` Table
```sql
SELECT * FROM female_students_vu;

SELECT * FROM students;
```

## 12. Prevent Insertion of Male Students Through the View
```sql
CREATE OR REPLACE VIEW female_students_vu AS
SELECT * FROM students
WHERE gender = "female"
WITH CHECK OPTION;
```

## 13. Display View Information from `INFORMATION_SCHEMA`
```sql
USE INFORMATION_SCHEMA;
SELECT table_name, table_schema, IS_UPDATABLE FROM VIEWS;
```

## 14. Display Table Information for the `students` Table
```sql
SELECT 
    TABLE_NAME,
    CREATE_TIME, 
    TABLE_ROWS, 
    AUTO_INCREMENT, 
    TABLE_COMMENT
FROM TABLES 
WHERE TABLE_SCHEMA = 'os'
AND TABLE_NAME = 'students';
```

## 15. Create a Non-Unique Index on `course_id` in `student_courses`
```sql
ALTER TABLE student_courses ADD INDEX (course_id);
```

## 16. Create a User and Grant Privileges to Access the `grades` Database
```sql
CREATE USER 'youssef_magdy'@'localhost' IDENTIFIED BY 'OS123';

GRANT SELECT ON grades.* TO 'youssef_magdy'@'localhost';

SELECT User, Host FROM mysql.user;
```

## 17. Connect with New User and Insert a Record in the `courses` Table
```sql
-- Connect using MySQL client
mysql -u youssef_magdy -p

-- After connecting, execute the following:
INSERT INTO courses VALUES (NULL, 'DataStructures', 4);

SELECT * FROM courses;
```

## 18. Change Your Password
```sql
ALTER USER 'youssef_magdy'@'localhost' IDENTIFIED BY 'new_password';
```

## 19. Show Your Privileges
```sql
SHOW GRANTS;
```