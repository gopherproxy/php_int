<?php 
// declaring a global (page-wide!) php variable type string
$greeting = "<h1>Hello world!</h1>";
// a string can appear within double OR single quotes
$myName = 'Marc';
// backslash is the escape character
// Use single quotes as a default, double quotes only in certain cases
$book = '<p class="green">The Hitchhiker\'s Guide to the Galaxy</p>';
$book1 = 'The Hitchhiker\'s Guide to the Galaxy';
$author = 'Douglas Adams';

?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Strings and variables</title>
<style type="text/css">
	.green {color: green;}
</style>
</head>

<body>
<?php 
	echo $greeting;
	// variable book echoed as <p>, green text, NO INLINE STYLES but class or id!
	echo $book;
	// within echo you can CONCATENATE strings and variables!
	echo '<h2>' . $book1 . ' by ' . $author . '</h2>';
?>
</body>
</html>