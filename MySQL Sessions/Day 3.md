# MySQL Labs: Day 3

## Data Insertion
```sql
INSERT INTO student_courses (student_id, course_id, grade, reg_date)
VALUES
    (1, 4, 60, NULL),
    (2, 1, NULL, NULL),
    (2, 4, 75, NULL),
    (3, 1, NULL, NULL),
    (3, 2, NULL, NULL),
    (3, 3, 75, NULL);
```

## 1. Create Function to Count Students with Grades Less Than 80
```sql
DELIMITER $
CREATE FUNCTION calc_no_students(ID INT)
RETURNS INT
DETERMINISTIC
BEGIN
    DECLARE count INT DEFAULT 0;
    SELECT COUNT(*) INTO count
    FROM student_courses
    WHERE course_id = ID
    AND grade < 80;
    RETURN count;
END$
DELIMITER ;

-- Usage
SELECT calc_no_students(4);
```

## 2. Create Stored Procedure to Display Absent Students
```sql
DELIMITER $
CREATE PROCEDURE names_of_abs()
BEGIN
    SELECT CONCAT(first_name, ' ', last_name) AS Name, grade
    FROM students
    JOIN student_courses ON students.student_id = student_courses.student_id
    WHERE grade IS NULL;
END$
DELIMITER ;

-- Call the procedure
CALL names_of_abs();

-- Confirm with a join query
SELECT * FROM students
JOIN student_courses ON students.student_id = student_courses.student_id;
```

## 3. Create Stored Procedure to Calculate Average Grades for a Course
```sql
DELIMITER $
CREATE PROCEDURE calc_avg_grades(c_id INT)
BEGIN
    SELECT AVG(grade) AS avg_grade
    FROM student_courses
    WHERE course_id = c_id;
END$
DELIMITER ;

-- Usage
CALL calc_avg_grades(4);
```

## 4. Create Trigger to Track Grade Changes
### Create `changes` Table
```sql
CREATE TABLE changes (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user VARCHAR(30),
    action VARCHAR(40),
    old_grade INT,
    new_grade INT,
    change_date DATE
);
```

### Create Trigger
```sql
DELIMITER $
CREATE TRIGGER grade_update_trigger
AFTER UPDATE ON student_courses
FOR EACH ROW
BEGIN
    IF OLD.grade <> NEW.grade THEN
        INSERT INTO changes (user, action, old_grade, new_grade, change_date)
        VALUES (USER(), 'Grade Update', OLD.grade, NEW.grade, CURDATE());
    END IF;
END$
DELIMITER ;

-- Test the trigger by updating a grade
UPDATE student_courses SET grade = 85 WHERE student_id = 1 AND course_id = 4;

-- Confirm the changes in the `changes` table
SELECT * FROM changes;
```

## 5. Create Event to Delete Entries in `changes` Table Every 5 Minutes
```sql
CREATE EVENT delete_changes
ON SCHEDULE EVERY 5 MINUTE
DO
DELETE FROM changes;
```