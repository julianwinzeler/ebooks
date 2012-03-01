<?php
if (isset($_GET['read'])) {
	//Definieren des SQL query zum auslesen einzelner Bücher (Einzellinks)
	$query = "select * from book where ID_book = ".$_GET['read']."";
} else {
	//Definieren des SQL query zum auslesen aller Bücher
	$query = "Select * from book order by timestamp desc";
}
//Absetzen des SQL query
$books = mysql_query($query) or die(mysql_error());
//oberster Border (unschön gelöst)
echo "<div class='article'></div><div class='article_read'></div>";
// 1: Schlaufe zum anzeigen aller Ergebnise der Abfrage
while ($zeile = mysql_fetch_array($books, MYSQL_ASSOC))
{
	//Darstellung der einzelnen Bücher
	echo "<div class='article'>";
	echo "<a href='#' class='article_head' title='Details einblenden'><h2><span>".$zeile['bookname']."</span></h2></a>";
	echo "<div class='article_content'>";
	echo "<img src='pictures/".$zeile['picture']."' alt='".$zeile['bookname']."' class='fl'/>";
	echo "<p>".$zeile['description']."</p>";
	echo "</div></div>";
	echo "<div class='clearfix'></div>";
	echo "<div class='article_read'>";
	echo "<a href='zipbooks/".$zeile['dllink']."' class='download'>Herunterladen</a>";
	echo "<a href='htmlbooks/".$zeile['readlink']."' class='download'>Lesen</a>";
	// 2: Wenn das Buch heute hochgeladen wurde, steht da: Heute hochgeladen, ansonsten steht das Datum
	if (date("d.m.y", $zeile['timestamp']) == date("d.m.y", time())) {
		echo "<p>Heute um ".date("H:i", $zeile['timestamp'])." hinzugefügt.</p>";
	} else {
		echo "Hinzugefügt am ".date("d.m.y, H:i", $zeile['timestamp'])."</p>";
	}
	// 2 Endet hier
	echo "</div>";
	echo "<div class='clearfix'></div>";
}
// 1 Endet hier
?>