<?php
	require_once('auth.php');
	session_start();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Add Restaurant Form</title>
<link href="addmenu_module.css" rel="stylesheet" type="text/css" />
</head>
<body>
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
<form id="addrestForm" name="addrestForm" method="post" action="restaurant-exec.php">
  <table width="300" border="0" align="center" cellpadding="2" cellspacing="0">
    <tr>
      <th>restaurant name </th>
      <td><input name="rname" type="text" class="textfield" id="rname" /></td>
    </tr>
    <tr>
      <th>address </th>
      <td><input name="address" type="text" class="textfield" id="address" /></td>
    </tr>
	<tr>
      <th>city </th>
      <td><input name="city" type="text" class="textfield" id="city" /></td>
    </tr>
	<tr>
      <th>state </th>
      <td><input name="state" type="text" class="textfield" id="state" /></td>
    </tr>
	<tr>
      <th>zip code </th>
      <td><input name="zip" type="text" class="textfield" id="zip" /></td>
    </tr>
	<tr>
      <th>phone number (form:(555) 555-5555)</th>
      <td><input name="phone" type="text" class="textfield" id="phone" /></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td><input type="submit" name="Add" value="Add" /></td>
    </tr>
  </table>
</form>
<p><a href="../index.php">Front Page</a></p>
</body>
</html>
