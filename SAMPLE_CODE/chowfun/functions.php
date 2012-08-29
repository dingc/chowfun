<?php
require_once('config.php');


function dropdown($rid, $rname, $strTableName, $strOrderField, $restaurants, $strMethod="asc") {
   
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
	//echo "database connected\n";

   echo "<select name=\"$restaurants\">\n";
   echo "<option value=\"NULL\">Select One</option>\n";
   $strQuery = "select $rid, $rname
               from restaurant";
   $rsrcResult = mysql_query($strQuery);
   
   while($arrayRow = mysql_fetch_assoc($rsrcResult)) {
      $strA = $arrayRow["$rname"];
      $strB = $arrayRow["$rid"];
      echo "<option value=\"$strB\">$strA</option>\n";
	//  echo "$strA";
   }

   echo "</select>";
}
?>