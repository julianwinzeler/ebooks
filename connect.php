<?php
//Eine Verbindung zu MySQL wird aufgebaut
$conn = mysql_connect($dbhost, $dbuser, $dbpass) or die ('Error connecting to mysql');
//Eine Datenbank wird ausgew�hlt
mysql_select_db($dbname);
?>