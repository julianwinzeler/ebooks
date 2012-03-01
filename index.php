<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>eBooks4U</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="style.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="js/cufon-yui.js"></script>
<script type="text/javascript" src="js/droid_sans_400-droid_sans_700.font.js"></script>
<script type="text/javascript" src="js/cuf_run.js"></script>
<script type="text/javascript" src="js/radius.js"></script>
<script type="text/javascript" src="js/jquery-1.6.2.min.js"></script>

<!-- 1: jQuery zum ein/ausfahren der Buchbeschreibungen -->
<script type="text/javascript">
$(document).ready(function(){
	$(".article_content").hide();
	$(".article_head").click(function(){
                if($(this).hasClass("active")) {
                  $(this).removeClass("active");
                  $(this).next(".article_content").slideUp("fast");
                }
                else {
                  $(".article_head").removeClass("active");
                  $(this).addClass("active");
                  $(".article_content:visible").slideUp("fast");
                  $(this).next(".article_content").slideDown("fast");
                }
	});
});
</script>
<!-- 1 Endet hier -->
</head>
<body>
<div class="main">
  <div class="header">
    <div class="header_resize">
      <div class="logo">
        <h1><a href="index.php">eBooks<span>4U</span> <small>Die eBooks Plattform für KAIO-Lernende</small></a></h1>
      </div>
      <div class="clr"></div>
    </div>
  </div>
  <!-- Start Content -->
  <div class="content">
    <div class="content_resize">
	<!-- Start Mainbar -->
      <div class="mainbar">
		<?php
			//Einbinden des zum connecten der Datenbank benötigten config files
			include('config.php');
			//Einbinden des Datenbank connectfiles
			include('connect.php');
			// 2: Auswahl anhand der URL, welcher Inhalt geladen werden soll
			if (isset($_GET[page])) {
				if (file_exists($_GET[page].".php")) {
					$page = $_GET[page];
				} else {
					$page = '404';
				}
			} else {
				$page = 'books';
			}
			// 2 Endet Hier
			//Einbinden des Inhalts, welcher in 2 ausgewählt wurde
			include($page.'.php');
		?>
      </div>
	  <!-- Start Sidebar -->
      <div class="sidebar">
        <div class="searchform">
		<!-- 3: Suchfunktion Form -->
          <form id="formsearch" name="formsearch" method="post" action="index.php?page=search">
            <span><input name="editbox_search" class="editbox_search" id="editbox_search" maxlength="80" value="Die Seite durchsuchen" type="text" onfocus="if(this.value == this.defaultValue) this.value = '';" onblur="if(!this.value) this.value = this.defaultValue;" /></span>
            <input name="button_search" src="images/search_btn.gif" class="button_search" type="image" />
          </form>
		<!-- 3 Endet hier -->
        </div>
        <div class="gadget">
          <h2 class="star"><span>Neuste</span> eBooks</h2><div class="clr"></div>
          <ul class="sb_menu">
			<?php
				//Einbinden der Funktion "Neuste eBooks"
				include('latest.php');
			?>
          </ul>
        </div>
        <div class="gadget">
          <h2 class="star"><span>Intranet Links</span></h2><div class="clr"></div>
          <ul class="ex_menu">
            <b><li><a href="http://wwwin.kaio.fin.be.ch/">Intranet KAIO</a></b><br />Amt für Informatik und Organisation</li>
            <b><li><a href="http://wwwin.itservices.fin.be.ch/">IT Services FIN</a></b><br />IT Services Finanzverwaltung</li>
            <b><li><a href="http://wwwin.sv.fin.be.ch/">Intranet SV FIN</a></b><br />Steuerverwaltung des Kantons Bern </li>
            <b><li><a href="http://wwwin.pa.fin.be.ch/">Intranet Personalamt</a></b><br />Personalamt des Kantons Bern</li>
            <b><li><a href="http://wwwin.fv.fin.be.ch/">Intranet FIN</a></b><br />Finanzverwaltung des Kantons Bern</li>
          </ul>
        </div>
		<div class="gadget">
			<h2 class="star"><span>Einstellungen</span></h2><div class="clr"></div>
			<ul class="ex_menu">
				<b><li><a href="index.php?page=newbook">Buch hinzufügen</a></b><br />Laden Sie ein neues eBook hoch</li>
				<b><li><a href="index.php?page=delbook">Buch Löschen</a></b><br />Löschen Sie ein Buch</li>
			</ul>
		</div>
      </div>
      <div class="clr"></div>
    </div>
  </div>
      <div class="clr"></div>
    </div>
  </div>
</div>
</body>
</html>
