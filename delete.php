<meta http-equiv="refresh" content="2; URL=http://lehrlinge-kaio.fin.be.ch/ebooks">
<?php
$sql = mysql_query("delete from book where ID_book = ".$_GET['book'].";");
echo "<div class='article'>";
echo "<center><h2>Buch erfolgreich geloescht!</h2></center>";
echo "</div>";
?>