<?php
	//Start session
	session_start();
	
	//Include database connection details
	require_once('config.php');
	
	//Array to store validation errors
	$errmsg_arr = array();
	
	//Validation error flag
	$errflag = false;
	
	//Connect to mysql server
	$link = mysql_connect(DB_HOST, DB_USER, DB_PASSWORD);
	if(!$link) {
		die('Failed to connect to server: ' . mysql_error());
	}
	
	//Select database
	$db = mysql_select_db(DB_DATABASE);
	if(!$db) {
		die("Unable to select database");
	}
	
	//Function to sanitize values received from the form. Prevents SQL injection
	function clean($str) {
		$str = @trim($str);
		if(get_magic_quotes_gpc()) {
			$str = stripslashes($str);
		}
		return mysql_real_escape_string($str);
	}
	
	//Sanitize the POST values
	$iname = clean($_POST['iname']);
	$rname = $_POST['rname'];
	
	//Input Validations
	if($iname == '') {
		$errmsg_arr[] = 'Item name missing';
		$errflag = true;
	}
	/*if($rname == '') {
		$errmsg_arr[] = 'Restaurant name missing';
		$errflag = true;
	}*/
/*	
	//Check for duplicate login ID
	if($login != '') {
		$qry = "SELECT * FROM users WHERE user_name='$login'";
		$result = mysql_query($qry);
		if($result) {
			if(mysql_num_rows($result) > 0) {
				$errmsg_arr[] = 'Login ID already in use';
				$errflag = true;
			}
			@mysql_free_result($result);
		}
		else {
			die("Query failed - duplicate");
		}
	}*/
	
	//If there are input validations, redirect back to the registration form
	if($errflag) {
		$_SESSION['ERRMSG_ARR'] = $errmsg_arr;
		session_write_close();
		header("location: addmenu-form.php");
		exit();
	}
	/*
	$queryID = mysql_query("select rest_id
				from restaurant
				where name = $rname");*/
	
	//Create INSERT query
	$qry = "INSERT INTO menu(item_name, rest_id) VALUES('$iname','".$rname."')";
	$result = @mysql_query($qry);
	
	//Check whether the query was successful or not
	if($result) {
		header("location: add-success.php");
		exit();
	}else {
		die("Query failed - end fail");
	}
?>