<?php

// creating a PHP array (numbered):
// PHP allows mixed arrays (for instance storings strings and numbers at the same time)
$students = array('Peter', 'Mette', 'Christian');
//echo $students;
echo $students[0];
// looking inside an array (debug feature!)
print_r($students);


?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Arrays in PHP</title>
</head>

<body>
<?php 
	
// rendering the contents of an array in front end
	
// welcome to the loop!
	
// classic foreach loop
	foreach($students as $name){
		 echo $name . " - ";
	}	
?>
<!-- Modern PHP syntax (shorthand syntax) -->
<ol>
<?php foreach ($students as $name) : ?>
	<li><?= $name ?></li>
<?php endforeach; ?>
</ol>
</body>
</html>




