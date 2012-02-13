<?php
require_once('config.php');


function dropdown($rid, $rname, $strTableName, $strOrderField, $restaurants, $strMethod="asc") {
   //
   // PHP DYNAMIC DROP-DOWN BOX - HTML SELECT
   //
   // 2006-05, 2008-09, 2009-04 http://kimbriggs.com/computers/
   //
   // Function creates a drop-down box
   // by dynamically querying ID-Name pair from a lookup table.
   //
   // Parameters:
   // intIdField = Integer "ID" field of table, usually the primary key.
   // strMethod = Sort as asc=ascending (default) or desc for descending.
   // strNameField = Name field that user picks as a value.
   // strNameOrdinal = For multiple drop-downs to same table on same page (Ex: strNameField.$i)
   // strOrderField = Which field you want results sorted by.
   // strTableName = Name of MySQL table containing intIDField and strNameField.
   //
   // Returns:
   // HTML Drop-Down Box Mark-up Code
   //
   
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