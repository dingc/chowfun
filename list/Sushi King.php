<?php
	session_start();
	require_once('config.php');
?>
<html>
<head>
<title> Sushi King </title>
	<link href="../general.css" rel="stylesheet" type="text/css" />
	<meta name="viewport" content="width=device-width"/>
</head>
<body>
	<!--tracking tag-->
	<?php include_once("../tracking.php") ?>

	<div id="content">
		<h3>Sushi King</h3>
		<br>
		<?php
			//Connect to mysql server
			$link = mysql_connect(DB_HOST, DB_USER, DB_PASSWORD);
			if(!$link) {
				die('Failed to connect to server: ' . mysql_error());
			}
			$db = mysql_select_db(DB_DATABASE);
			if(!$db) {
				die("Unable to select database");
			}
	
			$strQuery = mysql_query ("select item_name
				from menu
				where rest_id = 2");
   
			while($arrayRow = mysql_fetch_array($strQuery)) {
			$strA = $arrayRow["item_name"];
			echo "$strA";
			echo "<br />";
			}
		?>
<br>
	<p>To add an item to an existing menu, click <a href="../menu/addmenu-form.php">here</a></p>
	<p>Back to <a href="../index.php">Front Page</a></p>
</div>

</body>
</html>