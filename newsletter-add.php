<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title>Untitled Document</title>
</head>

<body>
<?php

	$n = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_STRING) or die('Missing/illegal paramer name');
	$e = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL) or die('Missing/illegal paramer email');
	
	$sql = 'INSERT INTO newsletter (name, email) VALUES (?,?)';
	
	require_once('db_con.php');
	$stmt = $con->prepare($sql);
	$stmt->bind_param('ss', $n, $e);
	
	$stmt->execute();
	
	if($stmt->affected_rows > 0){
		echo 'Added '.$e.' to the SPAM list :-)';
	}
	else {
		echo 'Could not add you to the list - you are already there ;-)';
	}
	
?>
</body>
</html>