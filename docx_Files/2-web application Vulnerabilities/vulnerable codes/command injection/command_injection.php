<html>

<body>

	<b>File in path are: </b><br><pre>
	<?php 

		$cmd = "ls -alh ".$_REQUEST['path'];
		//$cmd = "ls -alh ".str_replace(';', ' ', $_REQUEST['path']);   Black list
		//$cmd = "ls -alh ".escapeshellarg($_REQUEST['path']);    Mitigation
		passthru($cmd);

	?></pre>
</body>

</html>


