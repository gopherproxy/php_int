<?php
////////////////////////////////////////////////////////////////
//                               ,  ,                         // 
//   ________________________  |` \/ \/ \,',                  //
//  |                       | ;          ` \/\,.              //
//  | MULTILINE COMMENT:   |  :               ` \,/           //
//  | /* block that spans |   |                  /            //
//  | multiple lines */  |    ;                 :             //
//  | BOOOAAAAAAARING!  |    :                  ;             //
//  |________________  |     |      ,---.      /              //
//                  ((      :     ,'     `,-._ \              //
//                  (       ;    (   o    \   `'              //
//                        _:      .      ,'  o ;              // 
//                     /,.`      `.__,'`-.__,                 //
//                       \_  _               \                // 
//                      ,'  / `,          `.,'                //
//                ___,'`-._ \_/ `,._        ;                 // 
//            __;_,'      `-.`-'./ `--.____)                  //
//          ,-'           _,--\^-'                            //
//        ,:_____      ,-'     \                              //
//       (,'     `--.  \;-._    ;                             // 
//       :    Y      `-/    `,  :                             // 
//      :    :       :     /_;'                               //
//       :    :       |    :                                  //
//        \    \      :    :                                  //
//         `-._ `-.__, \    `.                                // 
//            \   \  `. \     `.                              //
//          ,-;    \---)_\ ,','/                              //
//         \_ `---'--'" ,'^-;'                                //
//          (_`     ---'" ,-')                                //
//          / `--.__,. ,-'    \                               //
//          )-.__,-- ||___,--' `-.                            //
//          /._______,|__________,'\                          // 
//          `--.____,'|_________,-'                           //
//                                                            //
////////////////////////////////////////////////////////////////

// grabbing array (associative array) from form
$formData = filter_input_array(INPUT_GET);
// contents of the array $formdata:
//print_r($formData);
// storing array data in separate variables
$f1 = $formData['value_1'];
$f2 = $formData['value_2'];
$cmd = $formData['cmd'];

// function taking arguments and RETURNING the result of a calculation 
function addNumbers ($x, $y){
	return $x + $y;
}

function subNumbers($n1, $n2){
	return $n1 - $n2;
}

function mulNumbers($n1, $n2){
	return $n1 * $n2;
}

function divNumbers($n1, $n2){
	return $n1 / $n2;
}


switch($cmd) {
	case 'add':
		// storing the returned result from function addNumbers in $res
		$res = addNumbers($f1, $f2);
		break;
	case 'sub':
		$res = subNumbers($f1, $f2);
		break;
	case 'mul':
		$res = mulNumbers($f1, $f2);
		break;
	case 'div':
		$res = round(divNumbers($f1, $f2), 2);
		break;
	default:
	// default value of $res
	$res = '...';		
}


if($res !== '...') {
	echo 'We will add '.$res.' to the database...<br>'.PHP_EOL;
	
	// get the connection to the database
	require_once('db_con.php');

	$sql = 'INSERT INTO calculations (result) VALUES (?)';
	$stmt = $con->prepare($sql);

	// bind paramerter type and variable
	// type: i is int, d is double/decimal, s is string
	$stmt->bind_param('d', $res);

	// fetch values from bind params and send to dbms
	$stmt->execute();
	
	//close connection
	$stmt->close();
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
	<!-- Input fields preserve user input using Ternary operator and PHP shorthand notation for echo -->
	<input type="number" name="value_1" value="<?= $cmd ? $f1 : '0'; ?>" required> operator 
	<input type="number" name="value_2" value="<?= $cmd ? $f2 : '0'; ?>" required>=
	<!-- Printing the result of the calculation ($res) using PHP shorthand notation for echo  -->
	<?= $res ?>
	
	<!-- Your task: Implement ALL buttons! -->
 	<p><input type="submit" name="cmd" value="add">
 	<!-- substraction -->
 	<input type="submit" name="cmd" value="sub">
 	<!-- multiplication -->
	<input type="submit" name="cmd" value="mul">
 	<!-- division -->
 	<input type="submit" name="cmd" value="div"></p>
</form>

<hr>
	<h2>Result history</h2>
	 
<?php

	// get the connection to the database
	require_once('db_con.php');

	$sql = 'SELECT id, result FROM calculations ORDER BY id DESC LIMIT 5';
	$stmt = $con->prepare($sql);
	
	// store the results in named variables
	$stmt->bind_result($id, $result);
	
	// execute the statement
	$stmt->execute();
	
	while($stmt->fetch()){
		echo 'id:'.$id.' result was: '.$result.'<br>';
	}
	
	$stmt->close();
	
?>



</body>
</html>