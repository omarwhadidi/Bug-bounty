<html>


<body>

<h1>Welcome John!</h1>

<h4>
<?php

	$session = $_GET["sessionid"];

	if ($session == '3452345' )
	{
		echo 'Account Balance for John: $9999';
	}
	elseif ($session == '3452995')
	{
		echo 'Account Balance for Jake: $200000000';

	}
	else
	{
		echo 'Account Balance for :  $';

	}



?>

</h4>

</body>

</html>


