<!DOCTYPE html>
<html>
<head>
    <style>
        table {
            width: 50%;
            border-collapse: collapse;
        }
        table, th, td {
            border: 1px solid black; 
        }
				th, td {
            padding: 10px;
            text-align: left;
        }
        .red {
            color: red;
        }
    </style>
</head>
<body>

<?php
$students = [
    ['name' => 'Alaa', 'email' => 'ahmed@test.com', 'track' => 'PHP'],
    ['name' => 'Shamy', 'email' => 'ali@test.com', 'track' => 'CMS'],
    ['name' => 'Youssef', 'email' => 'basem@test.com', 'track' => 'PHP'],
    ['name' => 'Waleid', 'email' => 'farouk@test.com', 'track' => 'CMS'],
    ['name' => 'Rahma', 'email' => 'hany@test.com', 'track' => 'PHP'],
];
?>



<table>
    <tr>
        <th>Name</th>
        <th>Email</th>
        <th>Track</th>
    </tr>
    <?php foreach ($students as $student): ?>
        <tr>
            <td><?php echo $student['name']; ?></td>
            <td><?php echo $student['email']; ?></td>
            <td class="<?php echo $student['track'] === 'PHP' ? 'red' : ''; ?>">
                <?php echo $student['track']; ?>
            </td>
        </tr>
    <?php endforeach; ?>
</table>

</body>
</html>
