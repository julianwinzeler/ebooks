<?php
$query = "Select * from book order by timestamp desc";
$books = mysql_query($query) or die(mysql_error());
echo "<div class='article'>";
echo "<h2>Buch Löschen</h2>";
if (isset($_GET['book'])) {
	$query2 = "select * from book where ID_book = ".$_GET['book']."";
	$book2 = mysql_query($query2) or die(mysql_error());
	$book3 = mysql_fetch_array($book2);
	echo "<h4>Möchten Sie \"".$book3['bookname']."\" wirklich löschen?</h4>";
	echo "<a href='index.php?page=delete&book=".$_GET['book']."' class='del'>Ja</a>";
	echo "<a href='index.php?page=delbook' class='del'>Nein</a>";
	echo "</div>";
} else {
	echo "<div class='dellist'>";
	echo "<ul class='dellist'>";
	while ($zeile = mysql_fetch_array($books, MYSQL_ASSOC))
	{
		echo "<a href='index.php?page=delbook&book=".$zeile['ID_book']."'><li>".$zeile['bookname']."</li></a><li></li>";
	}
	echo "</ul></div></div>";
	echo "<div class='clearfix'></div>";
}
?>