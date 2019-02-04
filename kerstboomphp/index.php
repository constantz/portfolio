<html>
<head>
	<title>Kerstboom in php</title>
</head>
<body>
	<center>
	<h3>
	<?php
		$outputstring = "";
		for ($x1 = 1; $x1 < 5; $x1++){
			for ($x2 = ($x1 + 1); $x2 < ($x1 * 3); $x2++){
				$s = "";
				for ($x3 = ($x1 + $x2 + 5); $x3 < ($x2 * 6); $x3 = ($x3 + 2)) {
					$s = $s . rand(0,1);
				}
				$outputstring = $outputstring . $s . "<br>";
			}
		}	
		
		echo $outputstring;
		echo rand(0,1).rand(0,1).rand(0,1)."<br>".rand(0,1).rand(0,1).rand(0,1)."<br>";
	?>
	<br>
	</h3>
	<h2>
	Een voorspoedig 2019!
	</h2>
	... en veel plezier met php!
	</center>
</body>
</html>