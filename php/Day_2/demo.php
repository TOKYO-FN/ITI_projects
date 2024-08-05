<?php

	echo "<h2>Task 1</h2>";
	// Task 1
	echo nl2br("this\n is new line");

	// Task 2
	// Search 3 built-in function of a string

	echo "<hr> <hr>";

	echo "<h2>Task 2</h2>";
	$str = "   Hello World!   ";
	echo trim($str);
	echo "<br> <br> <br>";

	echo str_word_count("Hello world!");

	echo "<br> <br> <br>";
	echo substr("Hello world",6);
	

	echo "<hr> <hr>";

	
	echo "<h2>Task 3</h2>";
	// Task 3
	echo '<pre>';
	print_r($_SERVER);
	echo '</pre>';

	echo "<hr> <hr>";
	
	
	// task 4
	echo "<h2>Task 4</h2>";
	$newOne = array(12, 45, 10, 25);
	$sum_of_arr = array_sum($newOne);
	$avg_of_arr = $sum_of_arr / count($newOne);
	rsort($newOne);
	echo "Sum of array values: $sum_of_arr";
	echo "<br>";
	echo "Avg of array values: $avg_of_arr";
	echo "<br>";
	print_r($newOne);
	
	echo "<hr> <hr>";

	// // task 5
	echo "<h2>Task 5</h2>";
	$ages =  array("Sara"=>31, "John"=> 41, "Walaa"=>39, "Ramy"=>40);
	// ascending order sort by value
	asort($ages);
	print_r($ages);
	echo "<br>";
	// ascending order sort by kay
	ksort($ages);
	print_r($ages);
	echo "<br>";
	// descending order sorting by Value
	arsort($ages);
	print_r($ages);
	echo "<br>";
	// descending order sorting by Key 
	krsort($ages);
	print_r($ages);
	echo "<br>";

?>