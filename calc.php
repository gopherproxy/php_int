<?php

// grabbing array (associative array) from form
$formData = filter_input_array(INPUT_GET);
// contents of the array $formdata:
//print_r($formData);

// storing array data in separate variables
$f1 = $formData['value_1'];
$f2 = $formData['value_2'];

// function taking arguments (parameters when they have a value)
function addNumbers ($x, $y){
	$result = $x + $y;
	print $result;
}

?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Functions, arguments, user input</title>
</head>

<body>
<form>
	<input type="number" name="value_1" value="0" required>+
	<input type="number" name="value_2" value="0" required>=

<?php 
	// calling a function with parameters
	addNumbers($f1, $f2);
	echo '<hr>';
?>
	<!-- Your task: Implement ALL buttons! -->
 	<p><input type="submit" name="cmd" value="add"></p>
 	<!-- substraction -->
 	<p><input type="submit" name="cmd" value="sub"></p>
 	<!-- multiplication -->
 	<p><input type="submit" name="cmd" value="mul"></p>
 	<!-- division -->
 	<p><input type="submit" name="cmd" value="div"></p>
</form>
</body>
</html>