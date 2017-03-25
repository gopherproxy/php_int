<?php
////////////////////////////////////////////////////////////////
//                               ,  ,                         // 
//    ______________________   |` \/ \/ \,',                  //
//   |                     |  ;          ` \/\,.              //
//   | MULTILINE COMMENT! |   :               ` \,/           // 
//   |______________   __|    |                  /            //
//                  ( (       ;                 :             //
//                  ((       :                  ;             //
//                  (        |      ,---.      /              //
//                          :     ,'     `,-._ \              //
//                          ;    (   o    \   `'              //    
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

// checking if 'add' button was pressed
if($cmd === 'add'){
	// storing the returned result from function addNumbers in $res
	$res = addNumbers($f1, $f2);
} else {
	// default value of $res
	$res = '...';
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
	<input type="number" name="value_1" value="<?= $cmd ? $f1 : '0'; ?>" required>+
	<input type="number" name="value_2" value="<?= $cmd ? $f2 : '0'; ?>" required>=
	<!-- Printing the result of the calculation ($res) using PHP shorthand notation for echo  -->
	<?= $res ?>
	
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