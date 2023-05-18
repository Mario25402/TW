<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>S1 E3</title>
</head>
<body>

	<?php

	preg_match('#([^/]*php)/(.*)$#',$_SERVER['PHP_SELF'],$coincidencias);
	$chunks = (count($coincidencias)>0) ? explode('/',$coincidencias[2]) : [];
	
	/*if (count($chunks)>0)
	echo '<pre>' . var_export($chunks,true) . '</pre>';
	else
	echo'<p>No hay trailing path</p>';*/

	$op = count($chunks)>0 ? $chunks[0] : '';
	$a = isset($_GET['a']) and is_numeric($_GET['a']) ? $_GET['a'] : NULL;
	$b = isset($_GET['b']) and is_numeric($_GET['b']) ? $_GET['b'] : NULL;

	if ($op != '' and $a != NULL and $b != NULL){
		switch ($op) {
			case 'suma':
				echo "<p>Suma: ";
				echo $_GET['a'] + $_GET['b'];
				echo "</p>";
				break;
			
			case 'multiplica':
				echo "<p>Multiplicación: ";
				echo $_GET['a'] * $_GET['b'];
				echo "</p>";
				break;

			case 'divide':
				echo "<p>División: ";
				echo $_GET['a'] / $_GET['b'];
				echo "</p>";
				break;
		}	
	}
	else{
		echo "<p>Introduzca los datos completos en la URL</p>";
	}

	?>
	
</body>
</html>