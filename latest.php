<?php
$sql = mysql_query('select * from book order by timestamp desc');
for ($i = 1; $i <= 5; $i++) {
	$zeile = mysql_fetch_array($sql, MYSQL_ASSOC);
	echo "<li><b><a href='index.php?read=".$zeile['ID_book']."'>".$zeile['bookname']."</a></b><br />";
	if ($zeile['timestamp'] > 0) {
		if (date("d.m.y", $zeile['timestamp']) == date("d.m.y", time())) {
			echo "Heute um ".date("H:i", $zeile['timestamp']);
		} else {
			echo date("d.m y, H:i", $zeile['timestamp']);
		}
	}
	echo "</li>";
}
?>