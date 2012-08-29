<!-- connect to database -->
		<?php
			session_start();
		?>
		
<!DOCTYPE html>
<html>
<head>
	<title>Welcome to Chowfun</title>
	<meta name="viewport" content="width=device-width"/>
	<meta charset="utf-8">
	<link rel="stylesheet" href="general.css"/>
	<link rel="stylesheet" href="http://code.jquery.com/mobile/1.0.1/jquery.mobile.structure-1.0.1.min.css" />  
	
	<!--[if lte IE 8]>  
			<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>  
		<![endif]--> 
</head>
<body>
	<header>
		<figure>
		<img src="uploads/logo.png" alt="logo" />
		</figure>
	</header>
	<div id="Content">
		<h2>welcome to Chowfun for restaurant menu currently only invited users can use this click <a href="register-form.php">here to register</a> or <a href="login-form.php">login here</a> thanks!</h2>
		<h3>Here are a list of available restaurants so far, more to come! </h3>
		
		
<!-- list available restaurants-->
<?php
	require_once('config.php');

 	//Connect to mysql server
	$link = mysql_connect(DB_HOST, DB_USER, DB_PASSWORD);
	if(!$link) {
		die('Failed to connect to server: ' . mysql_error());
	}
	$db = mysql_select_db(DB_DATABASE);
	if(!$db) {
		die("Unable to select database");
	}
	//	echo "database connection success"
	$strQuery = mysql_query ("select name
               from restaurant");
  	//  $rsrcResult = mysql_query($strQuery);
   while($arrayRow = mysql_fetch_array($strQuery)) {
      $strA = $arrayRow["name"];
   	  //$strB = $arrayRow["$rid"];
      echo "<a href=\"http://nightmd.myrpi.org/chowfun/list/$strA.php\">$strA</a>";
	  echo "<br />";
	}
?>

		<!-- new geo feature -->
		<p><a href="api_list.html">get current location</a>

		<!--dark navigation bar-->
		<div data-role="footer">		
			<div data-role="navbar">
				<ul id="nav">
					<li><a href="menu/restaurant-form.php" data-role="button" data-inline="true">Add Restaurant</a></li>
					<li><a href="menu/addmenu-form.php" data-role="button" data-inline="true">Add to Menu</a></li>
				</ul>
			</div><!-- /navbar -->
		</div><!-- /footer -->
		</div>
		
		<script src="http://code.jquery.com/jquery-1.6.4.min.js"></script> 
		<script src="http://code.jquery.com/mobile/1.0.1/jquery.mobile-1.0.1.min.js"></script>
		<?php include_once("tracking.php") ?>
</body>
</html>