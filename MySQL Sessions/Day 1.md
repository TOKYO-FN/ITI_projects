# MySQL Labs: Day 1

## Part I: Database and Table Creation

### 1. Create the `grades` Database
```sql
CREATE DATABASE grades;
```

### 2. Create Tables in the `grades` Database

#### Students Table
```sql
CREATE TABLE students (
    student_id INT PRIMARY KEY,
    student_name VARCHAR(100) NOT NULL,
    email VARCHAR(50),
    tel VARCHAR(20)
);
```

#### Courses Table
```sql
CREATE TABLE courses (
    course_id INT PRIMARY KEY,
    course_name VARCHAR(100) NOT NULL,
    credit_hours INT
);
```

#### Student_courses Table
```sql
CREATE TABLE student_courses (
    course_id INT,
    student_id INT,
    grade INT,
    reg_date DATE,
    FOREIGN KEY (course_id) REFERENCES courses(course_id),
    FOREIGN KEY (student_id) REFERENCES students(student_id),
    PRIMARY KEY (course_id, student_id)
);
```

### 3. Modify `students` Table to Allow Longer Student Names
```sql
ALTER TABLE students
MODIFY student_name VARCHAR(150);
```

### 4. Add Constraint for Unique Email in `students` Table
```sql
ALTER TABLE students
MODIFY email VARCHAR(50) UNIQUE;
```

### 5. Get Time, Date, Current User, and MySQL Version
```sql
SELECT NOW() AS "time and date", VERSION() AS "current version", USER() AS "current user";
```

### 6. Add `gender` Column to `students` Table
```sql
ALTER TABLE students
ADD COLUMN gender ENUM('male', 'female');
```

### 7. Add `birth_date` Column to `students` Table
```sql
ALTER TABLE students
ADD COLUMN birth_date DATE;
```

### 8. Replace `student_name` Column with `first_name` and `last_name`
```sql
ALTER TABLE students
DROP COLUMN student_name;

ALTER TABLE students
ADD COLUMN first_name VARCHAR(100),
ADD COLUMN last_name VARCHAR(100);
```

### 9. Insert a Friend's Data into the `students` Table
```sql
INSERT INTO students (student_id, email, tel, gender, birth_date, first_name, last_name)
VALUES (1, 'youssefmagdy@ieee.org', '201211249403', 'male', '2002-12-02', 'Youssef', 'Magdy');
```

### 10. Create `male_students` Table Based on `students` Table
```sql
CREATE TABLE male_students AS
SELECT * FROM students
WHERE gender='male';
```

---

## Part II: Queries in the `OS` Database

### 1. Display All Students’ Information
```sql
SELECT * FROM students;
```

### 2. Display Male Students Only
```sql
SELECT * FROM students WHERE gender='male';
```

### 3. Display the Number of Female Students
```sql
SELECT COUNT(*) AS female_students_count FROM students WHERE gender='female';
```

### 4. Display Students Born Before 1992-10-01
```sql
SELECT * FROM students WHERE birth_date < '1992-10-01';
```

### 5. Display Male Students Born Before 1991-10-01
```sql
SELECT * FROM students WHERE birth_date < '1991-10-01' AND gender = 'male';
```

### 6. Display `course_id` and Grades, Sorted by Grades
```sql
SELECT course_id, grade FROM student_courses ORDER BY grade;
```

### 7. Display Students’ Names Beginning with 'A'
```sql
SELECT CONCAT(first_name, ' ', last_name) AS "Student Name" FROM students
WHERE first_name LIKE 'A%';
```

### 8. Display the Gender and Number of Males and Females
```sql
SELECT gender, COUNT(*) AS count FROM students
GROUP BY gender;
```

### 9. Display Repeated First Names and Their Counts (If Higher than 2)
```sql
SELECT first_name, COUNT(*) AS name_count
FROM students
GROUP BY first_name
HAVING COUNT(first_name) > 2;
```

### 10. Display the Subject with the Highest Grade
```sql
SELECT course_id FROM student_courses ORDER BY grade DESC LIMIT 1;
```