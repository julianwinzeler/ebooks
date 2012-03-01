<?php 
include('config.php');
include('connect.php');
$max_byte_size = 2097152; 
$max_byte_size2 = 209715200;
$allowed_types = "(jpg|jpeg|gif|bmp|png)"; 
$allowed_types2 = "(zip|pdf)";
$allowed_types3 = "(zip)";
$description = ereg_replace('"',"",$_POST["desc"]);
if($_POST["submit"] == "Upload") { 

	if(is_uploaded_file($_FILES["file"]["tmp_name"]) && is_uploaded_file($_FILES["file2"]["tmp_name"])) { 

		if(preg_match("/\." . $allowed_types . "$/i", $_FILES["file"]["name"]) && preg_match("/\." . $allowed_types2 . "$/i", $_FILES["file2"]["name"])) { 

			if($_FILES["file"]["size"] <= $max_byte_size && $_FILES["file2"]["size"] <= $max_byte_size2) { 

				if(copy($_FILES["file"]["tmp_name"], "pictures/".$_FILES["file"]["name"]) && copy($_FILES["file2"]["tmp_name"], "zipbooks/".$_FILES["file2"]["name"])) { 
					if (preg_match("/\." . $allowed_types3 . "$/i", $_FILES["file2"]["name"]))
					{
						if (function_exists('zip_open'))
						{
							$zip_datei = "zipbooks/".$_FILES["file2"]["name"];

							$ziel_ordner = 'htmlbooks/';

							if (file_exists($zip_datei) && ($zip = zip_open($zip_datei)))
							{
								while($zip_entry = zip_read($zip))
								{
									$file_name = zip_entry_name($zip_entry);
									$file_size = zip_entry_filesize($zip_entry);
									$comp_meth = zip_entry_compressionmethod($zip_entry);

									if (zip_entry_open($zip, $zip_entry, 'rb'))
									{
										$buffer = zip_entry_read($zip_entry, $file_size);

										if (preg_match('/\/$/', $file_name) && ($comp_meth == 'stored'))
										{
											if (!is_dir($ziel_ordner . $file_name))
                                                                                                error_log($ziel_ordner . $file_name);
												mkdir($ziel_ordner . $file_name, 0777);
												$readlink = $file_name;
										}
										zip_entry_close($zip_entry);
									}
									
								}
								zip_close($zip);
							}

						}
						$zip = new ZipArchive;
						$res = $zip->open("zipbooks/".$_FILES["file2"]["name"]);
						if ($res === TRUE) {
							$zip->extractTo('htmlbooks/');
							$zip->close();
						}
						$timestamp = time();
						$insert = mysql_query('insert into book values(null, "'.$_POST["bookname"].'", "'.$description.'", "'.$_FILES["file"]["name"].'", "'.$_FILES["file2"]["name"].'", "'.$readlink.'", "'.$timestamp.'")');
						header("Location: index.php?page=books"); 
						exit();
					} else {
						if (copy($_FILES["file2"]["tmp_name"], "htmlbooks/".$_FILES["file2"]["name"])) {
							$downloadreadlink = $_FILES["file2"]["name"];
							$timestamp = time();
							$insert = mysql_query('insert into book values(null, "'.$_POST["bookname"].'", "'.$description.'", "'.$_FILES["file"]["name"].'", "'.$downloadreadlink.'", "'.$downloadreadlink.'", "'.$timestamp.'")');
						}
						header("Location: index.php?page=books"); 
					}
				} else { 
				
				echo "Datei konnte nicht hochgeladen werden!"; 
				
			} } else { 
			
			echo "Die Datei ist zu gross!"; 
			
		} } else { 
		
		echo "Die Datei besitzt eine ungültige Endung."; 
		
	} } else { 
	
	echo "Keine Datei zum Hochladen angegeben."; 
	
} } else { 

echo "Bitte benutzen Sie das Upload Formular."; 
} 
?>
