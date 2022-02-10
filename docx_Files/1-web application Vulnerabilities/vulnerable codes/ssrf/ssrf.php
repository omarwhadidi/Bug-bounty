<html>
<body>
<form action="" method="post">
<h2> HTML Viewer<br>
 <input type="text" style="font-size: 14;width:450px;" name="url" placeholder="http://example.com" />
 <br>
 <input type="submit" value="Submit">
</form>
<hr>
<pre>
<?php
 if(empty($_REQUEST["url"])) exit(1);
 $url = $_REQUEST["url"];
 $student = file_get_contents($url);
 echo $student;
?>
</pre>
</h2>
 </body>
</html>




