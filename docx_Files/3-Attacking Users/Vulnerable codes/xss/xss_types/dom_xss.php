<!-- DOM XSS -->

<html>
	<body>
		<p id="searchterm"></p>
		<script>
		searchterm = location.href.split("q=")[1];
		searchterm = decodeURIComponent(searchterm);
		document.getElementById("searchterm").innerHTML = "You searched for: " + searchterm;
		</script>
	</body>
</html>


<script type="text/javascript">
 var msg = "<%= Encode.forJavaScriptBlock(UNTRUSTED) %>";
 alert(msg);
</script>


<!--


<HTML>
<TITLE>Welcome!</TITLE>
Hi
<SCRIPT>
var pos=document.URL.indexOf("name=")+5;
document.write(document.URL.substring(pos,document.URL.length));
</SCRIPT>
<BR>
Welcome to our system
…
</HTML>

 -->