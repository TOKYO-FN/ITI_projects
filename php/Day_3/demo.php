<!DOCTYPE html>
<html>
<head>
    <title>AAST_BIS Class Registration</title>
    <style>
        .required-field {
            color: red;
        }

    </style>
</head>
<body>

<h1>Application name: AAST_BIS class registration</h1>

<?php

# بعرف الvariables 
$nameErr = $emailErr = $genderErr = $agreeErr = "";
$name = $email = $group = $classDetails = $gender = $courses = $agree = "";


# بشوف لو الريكوست الي جالي كان بوست
if ($_SERVER["REQUEST_METHOD"] == "POST") {
	# بشوف لو الاسم فاضي 
    if (empty($_POST["name"])) {
        $nameErr = "Name is required";
	# بتحقق من الاسم ب اني بقل له يوافق بس على حروف و مسافات باستخدام ال regex
    } elseif (!preg_match("/^[a-zA-Z ]*$/", $_POST["name"])) {
        $nameErr = "Only letters and white space allowed";
    } else {
	# لما يعدي من كل الي فات دة هيتطبق عليه test_input و يتحفظ عادي
        $name = test_input($_POST["name"]);
    }

    if (empty($_POST["email"])) {
        $emailErr = "Email is required";
	# بستخدم هنا التحقق الجاهز لل EMAiL في PHP
    } elseif (!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) {
        $emailErr = "Invalid email format";
    } else {
        $email = test_input($_POST["email"]);
    }

    if (empty($_POST["gender"])) {
        $genderErr = "Gender is required";
    } else {
        $gender = test_input($_POST["gender"]);
    }

    if (empty($_POST["agree"])) {
        $agreeErr = "You must agree before submitting";
    } else {
        $agree = test_input($_POST["agree"]);
    }

    $group = test_input($_POST["group"]);
    $classDetails = test_input($_POST["classDetails"]);

		# عشان لو مفيش اي حاجة اختارها يبعت ليست فاضية ternary operator
    $courses = !empty($_POST["courses"]) ? $_POST["courses"] : [];
}


# عشان اامن نفسي من اي اخطاء من الuser او من اي injection
function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
?>

<form method="post" action="<?php $_PHP_SELF?>">
		<!-- هنا ال value هتتاخد من الinput بتاع الuser -->
    Name: <input style="margin-left: 40px;" type="text" name="name" value="<?php echo $name;?>">
		<!-- هعرض هنا الerror الي كنت معرفه فوق على حسب نوع الerror الي جالي -->
		<!-- عشان نخلي لونه بالاحمر -->
    <span class="required-field">* <?php echo $nameErr;?></span>
    <br><br>
		<!-- هنا ال value هتتاخد من الinput بتاع الuser -->
    E-mail: <input style="margin-left: 35px;" type="text" name="email" value="<?php echo $email;?>">
    <span class="required-field">* <?php echo $emailErr;?></span>
    <br><br>
    Group #: <input style="margin-left: 25px;" type="text" name="group" value="<?php echo $group;?>">
    <br><br>
    Class details: <textarea name="classDetails" rows="5" cols="40"><?php echo $classDetails;?></textarea>
    <br><br>
    Gender:
    <input type="radio" name="gender" <?php if (isset($gender) && $gender=="female") echo "checked";?> value="female">Female
    <input type="radio" name="gender" <?php if (isset($gender) && $gender=="male") echo "checked";?> value="male">Male
    <span class="required-field">* <?php echo $genderErr;?></span>
    <br><br>
    Select courses:
    <input type="checkbox" name="courses[]" value="PHP">PHP
    <input type="checkbox" name="courses[]" value="Java Script">Java Script
    <input type="checkbox" name="courses[]" value="MySQL">MySQL
    <input type="checkbox" name="courses[]" value="HTML">HTML
    <br><br>
    Agree: <input type="checkbox" name="agree" <?php if (isset($agree) && $agree=="on") echo "checked";?>>
    <span class="required-field">* <?php echo $agreeErr;?></span>
    <br><br>
    <input type="submit" name="submit" value="Submit">
</form>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST" && empty($nameErr) && empty($emailErr) && empty($genderErr) && empty($agreeErr)) {
    echo "<h2>Your given values are as:</h2>";
    echo "Name: " . $name . "<br>";
    echo "E-mail: " . $email . "<br>";
    echo "Group #: " . $group . "<br>";
    echo "Class details: " . $classDetails . "<br>";
    echo "Gender: " . $gender . "<br>";
		# دي بتعمل join لل array ب ,
    echo "Courses: " . implode(", ", $courses) . "<br>";
    echo "Agree: " . $agree . "<br>";
}
?>

</body>
</html>
