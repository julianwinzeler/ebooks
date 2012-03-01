<?php
$sql = "select * from book where bookname like '%".$_POST['editbox_search']."%' or description like '%".$_POST['editbox_search']."%' order by timestamp desc";
$query = mysql_query($sql);
echo "<div class='article'></div><div class='article_read'></div>";
while ($zeile = mysql_fetch_array($query)) 
{
	//Darstellung der einzelnen Bücher
	echo "<div class='article'>";
	echo "<a href='#' class='article_head'><h2><span>".$zeile['bookname']."</span></h2></a>";
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
		echo "<p>Heute um ".date("H:i:s", $zeile['timestamp'])." hinzugefügt.</p>";
	} else {
		echo "Hinzugefügt am ".date("d.m.y, H:i:s", $zeile['timestamp'])."</p>";
	}
	// 2 Endet hier
	echo "</div>";
	echo "<div class='clearfix'></div>";
}
?>