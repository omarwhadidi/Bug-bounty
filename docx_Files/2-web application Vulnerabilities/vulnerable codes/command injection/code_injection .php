<html>

<body>

	<?php 
		$myvar = 'varname';
		$X =$_GET['code'];
		eval("\$myvar = \$x;");

	?>

	<?php 
		$myvar = 'varname';
		$X =$_GET['code1'];
		eval('$myvar = $x;');

	?>

	<?php 
		$X =$_GET['code2'];
		eval($x. "!!!");
	?>

	<?php 
		$X =$_GET['code3'];
		eval("Hi".$x);
	?>
	<?php 
		$X =$_GET['code4'];
		eval("Hi".$x. "!!!");
	?>
	



</body>

</html>


