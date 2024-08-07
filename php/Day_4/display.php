<!DOCTYPE html>
<html lang="en">
<head>
    <title>User Records</title>
    <style>
        div {
            width: 800px;
            margin: 50px auto;
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            padding: 10px;
            text-align: center;
        }
        tr:nth-child(even) {
            background-color: #f2f2f2;
        }
        tr:nth-child(odd) {
            background-color: #ffffff;
        }

				header{
					position: relative;
					margin-bottom: 30px;
				}

				hr{
					margin-bottom: 25px;
				}

				a{
					float: right;
					position: absolute;
					top: 0;
					right: 0;
					background-color: #5CB85C;
					color: white;
					border: none;
					border-radius: 5px;
					padding: 10px 15px;
					text-decoration: none;
				}
    </style>
</head>
<body>
    <div>
        <header>
            <h1>User Details</h1>
						<a href="index.php">Add New User</a>
						
				</header>
        <hr />

        <?php
        // Database connection
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

        // Query to select all records
        $sql = "SELECT * FROM login";
        $result = mysqli_query($link, $sql);

        if (mysqli_num_rows($result) > 0) {
            echo "<table border='1'>
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Gender</th>
                        <th>Receive Email</th>
                    </tr>";

            $row_number = 1; // Initialize row number
            while ($row = mysqli_fetch_assoc($result)) {
                echo "<tr>
                        <td>$row_number</td>
                        <td>{$row['name']}</td>
                        <td>{$row['email']}</td>
                        <td>" . ($row['gender'] == 'm' ? 'Male': 'Female') . "</td>
                        <td>" . ($row['receive'] == 1 ? 'Yes' : 'No') . "</td>
                      </tr>";
                $row_number++;
            }
            echo "</table>";
        } else {
            echo "No records found.";
        }

        mysqli_close($link);
        ?>
    </div>
</body>
</html>
