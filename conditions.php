<?php 
// global variables:
$myself = 'Marc';
// variable type number (INTEGER)
$age = 62;
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Conditional code</title>
</head>

<body>
<?php 
	// == is checking for simple equality, === is checking for STRICT equality, including datatypes (strings, numbers)
	// Whenever you compare data type string use ===!
	if($age <= 38){
		echo $myself . ' is a liar!';
		// && combines 2 conditions (AND), || means OR
	}else if($age > 38 && $age <=50){
		echo 'Perhaps ' . $myself . ' is ' . $age . ' years old.';
	}else{
		echo 'No! ' . $myself . ' is not ' . $age . ' years old. Not with that beautiful skin, hair etc.';
	}	
?>
</body>
</html>