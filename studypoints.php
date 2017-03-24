<?php 
// the global variables I need
// filter_input grabs external variables (f.i. form fields) and can FILTER them!
$sp = filter_input(INPUT_GET, 'sp');
$studypoints = $sp;
$spRest = 80 - $studypoints;

// set og variables needed for HTML output

$pGstart = '<p class="green">';
$pRstart = '<p class="red">';
$pStop = '</p>';

// user feedback
// double quoted strings can output variables directly!
$spMinus = "$studypoints studypoints are not enough. You miss $spRest studypoints!";
$spOk = "With $studypoints studypoints you can attend the exam!";
$spPlus = "$studypoints studypoints? Come on - that's not likely."


?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Study points assignment</title>
<style type="text/css">
	.green {color : green;}
	.red {color : red;}
</style>
</head>

<body>
<h1>Study points assignment</h1>
<h2>Not giving any study points</h2>
<h3>Only knowledge!</h3>
<!-- Output depending on the number of gathered study points: -->
<!-- Less than 80 study points red text stating: Sorry. Just [number of study points] sp are not enough. You miss [number of study points student is missing] sp -->
<!-- 80 or more study points green text: Very good. With [number of study points] sp you can go to the exam! -->
<!-- More than 100 study points red text: [number of study points] sp? Cheater! Or genius. -->
<!-- NO INLINE STYLES -->
<!-- Test your program routine with the numbers 75, 80, 85, 100, 200 -->
<form>
	<input type="number" name="sp" required>
	<input type="submit" name="submit" value="so what?">
</form>
<?php 
// if less than 80 points:
if($studypoints < 80){
 echo $pRstart . $spMinus . $pStop;
} else if($studypoints <= 100){
 echo $pGstart . $spOk . $pStop;
}else{
 echo $pRstart . $spPlus . $pStop;
}
?>
</body>
</html>