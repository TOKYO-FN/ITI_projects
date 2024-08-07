<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="style.css" />
    <title>Document</title>
  </head>
  <body>
    <?php

$nameErr = $emailErr = $genderErr = $agreeErr = "";
$name = $email = $gender = $agree = "";


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($_POST["name"])) {
        $nameErr = "Name is required";
    } elseif (!preg_match("/^[a-zA-Z ]*$/", $_POST["name"])) {
        $nameErr = "Only letters and white space allowed";
    } else {
        $name = test_input($_POST["name"]);
    }

    if (empty($_POST["email"])) {
        $emailErr = "Email is required";
    } elseif (!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) {
        $emailErr = "Invalid email format";
    } else {
        $email = test_input($_POST["email"]);
    }

		if (empty($_POST["gender"])) {
        $genderErr = "Gender is required";
    } else {
        $gender = test_input($_POST["gender"]);
    }}

    if (empty($_POST["check"])) {
        $agreeErr = "You must agree before submitting";
    } else {
        $agree = test_input($_POST["check"]);
    }
	
		function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
		}
	
    if ($nameErr == "" && $emailErr == "" && $genderErr == "" && $agreeErr == "") {
        $dbhost = 'localhost';
        $dbuser = 'root';
        $dbpass = '';
        $dbname = 'demo';
        $link = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);

        if (!$link) {
            echo "Error: Unable to connect to MySQL." . PHP_EOL;
            echo "Debugging error #: " . mysqli_connect_errno() . PHP_EOL;
            echo "Debugging error: " . mysqli_connect_error() . PHP_EOL;
            exit;
        }
			


		$sql = "INSERT INTO login (name, email, gender, receive) VALUES ('$name', '$email', '$gender', '$agree')";

		$retval = mysqli_query($link, $sql);   
		if(!$retval) {
					die('Could not insert to table: ' . mysqli_connect_error($retval));
		}
		
		
		echo "<script>
		alert('Data inserted to table successfully');
		</script>";
	



		mysqli_close($link);
	}
		?>


    <div>
      <header>
        <h1>User Registration Form</h1>
      </header>
      <hr />
      <p style="margin-bottom: 12px">
        Please fill this form and submit to add user record to the database.
      </p>

      <form method="post" action="<?php $_PHP_SELF?>">
        <p class="name-email">Name</p>
        <input
          class="name-email-inp"
          type="text"
          name="name"
          value="<?php echo $name;?>"
        />
        <span class="required-field"
          >*
          <?php echo $nameErr;?></span
        >
        <br />
        <p class="name-email">Email</p>
        <input
          class="name-email-inp"
          type="text"
          id="email"
          name="email"
          value="<?php echo $email ?>"
        />
        <span class="required-field">
					* <?php echo $emailErr;?>
				</span>
        <br />
        <p class="last-three">Gender</p>
        <span class="required-field">
					* <?php echo $genderErr;?>
				</span>
				<br />
        <input type="radio" name="gender" id="male" value="m" />
        <label class="last-three" for="male">Male</label><br />
				
        <input type="radio" name="gender" id="female" value="f" />
        <label for="female" class="last-three">Female</label><br />
        <input type="checkbox" name="check" id="check" value=1 />
        <label for="check" class="last-three">Receive E-mail From us.</label>
				<span class="required-field">
					* <?php echo $agree;?>
				</span>
        <br />
        <input
          class="button1"
          id="sumbit"
          type="submit"
          name="submit"
          value="Submit"
        />
        <input
          class="button1"
          id="cancel"
          type="reset"
          name="cancel"
          value="Cancel"
        />
      </form>
    </div>
  </body>
</html>
