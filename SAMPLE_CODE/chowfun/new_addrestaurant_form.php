<!-- check authorization -->
<?php
	require_once('auth.php');
	session_start();
	?>
	
<!DOCTYPE html>
<html>
	<head>
		<meta name="viewport" content="width=device-width"/>
		<meta charset="utf-8">
		<title>Add a restaurant</title>
		<link href="add_form.css" rel="stylesheet"/>
	</head>
	<body>
		
	<!-- check&load error messages -->
	<?php
	if( isset($_SESSION['ERRMSG_ARR']) && is_array($_SESSION['ERRMSG_ARR']) && count($_SESSION['ERRMSG_ARR']) >0 ) {
		echo '<ul class="err">';
		foreach($_SESSION['ERRMSG_ARR'] as $msg) {
			echo '<li>',$msg,'</li>'; 
		}
		echo '</ul>';
		unset($_SESSION['ERRMSG_ARR']);
	}
	?>
	<h2>Add a restaurant!</h2>
	<div id="add-form">
		<form id="addrestForm" name="addrestForm" method="post" action="restaurant-exec.php">
  		<label for="rname">Restaurant Name:</label>
	  	<input type="text" id="rname" name="rname" class="textfield" placeholder="Fridays" required/>
	
		<label for="address">Address:</label>
		<input type="text" id="address" name="address" class="textfield" placeholder="100 Broadway" required/>
	
		<label for="city">City:</label>
		<input type="text" id="city" name="city" class="textfield" required/>
		<label for="state">State:</label>
		<input type="text" id="state" name="state" class="textfield" required/>
		<label for="zip">Zip Code:</label>
		<input type="text" id="zip" name="zip" class="textfield" required/>
		
		<label for="phone">Phone Number:</label>
		<input type="tel" id="phone" name="phone" placeholder:"123-456-7890" required/>
	
	  	<input type="submit" name="add" value="Add" id="add"/></td>
		</form>
	<a href="../index.php">Front Page</a>
	</div>
	</body>
	<!-- saw js implementation, polyfill -->
</html>