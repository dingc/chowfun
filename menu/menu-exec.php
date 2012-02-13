<?php
	require_once('auth.php');
	session_start();
	require_once('config.php'); //Include database connection details
	
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Menu Listing</title>
<link href="addmenu_module.css" rel="stylesheet" type="text/css" />
</head>
<body>
	
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
	
	
	function list($str) {
		
	}

	//Create INSERT query
	$qry = "INSERT INTO restaurant(name, address, city, state, zip, phone_num) VALUES('$rname','$address','$city','$state','$zip','$phone')";
	$result = @mysql_query($qry);
	
	//Check whether the query was successful or not
	if($result) {
		header("location: restaurant-success.php");
		exit();
	}else {
		die("Query failed - end fail");
	}
?>