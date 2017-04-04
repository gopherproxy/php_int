<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title>Untitled Document</title>
</head>

<body>

<?php
	require_once('db_con.php');
	$sql = 'SELECT name, email, signuptime FROM newsletter ORDER BY signuptime DESC';
	$stmt = $con->prepare($sql);
	$stmt->bind_result($n, $e, $s);
	$stmt->execute();
	
	while($stmt->fetch()){
		echo '<div>
		<div>'.$n.'</div>
		<div>'.$e.'</div>
		<div>'.$s.'</div>
	</div>';
	}
?>

	
</body>
</html>