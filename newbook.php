<div class="article"></div><div class="article_read"></div>
<div class="article">
<h2>Buch hinzufügen</h2>
<form action="addbook.php" method="post" enctype="multipart/form-data" name="upload">
	<table>
		<tr>
			<td>Buchname:</td>
			<td colspan="2"><input type="text" name="bookname" class="uploadfield""></td>
		</tr>
		<tr>
			<td>Beschreibung:</td>
			<td colspan="2"><textarea name="desc" rows="10" class="uploadfield"></textarea></td>
		</tr>
		<tr>
			<td>Bild:</td>
			<td><input type="file" name="file"></td>
			<td>(max. Gr&ouml;sse: 2MB / jpg, jpeg, gif, bmp, png)</td>
		</tr>
		<tr>
			<td>Buch:</td>
			<td><input type="file" name="file2"></td>
			<td>(max. Gr&ouml;sse: 200MB / zip*, pdf)</td>
		</tr>
		<tr>
			<td></td>
			<td><input type="submit" name="submit" value="Upload"></td>
		</tr>
	</table><br />
	Alle B&uuml;cher m&uuml;ssen als .zip oder als .pdf hochgeladen werden. *Bei Büchern im HTML Format bitte sicherstellen, dass die Index.html im Zip Archiv in einem Untergeordneten Ordner liegt!<br>Als Beispiel: <b>buchname.zip/ichbineinbuch/Index.html</b><br>Sollte ein Buch nicht korrekt dargestellt oder heruntergeladen werden, melden Sie sich bitte bei einem Administrator.
</form>
</div>
<div class="article_read"></div>