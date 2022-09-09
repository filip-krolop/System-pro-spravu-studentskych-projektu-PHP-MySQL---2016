<?php
if ((int)$_GET["upravid"]!=0){
	echo "<script>window.location='index.php?page=upravitprojekt&id=".$_GET["upravid"]."'</script>";
}

if ((int)$_GET["pdf"]!=0){

	include "./cfg/config.php";
	//$target_dir = "/home/domeny/ideatech.cz/web/subdomeny/filipcz/mproj/storage/";
	$target_ext = ".pdf";
	$target_file = $target_dir . $_GET["pdf"] . $target_ext;

	if (file_exists($target_file)) {
		echo "<iframe style='display:none;' src='components/dl.php?id=".$_GET["pdf"]."' width='0' height='0' frameBorder='0'></iframe>";
	}
}


for ($x = 1; $x <= mysql_num_rows(mysql_query("SELECT id FROM projekty")); $x++) {
	
	$mazsql = "SELECT id, nazev_projektu, kategorie, autor, trida, rok, vedouci_prace FROM projekty WHERE id='".$x."'";
	$mazresult = mysql_query($mazsql);
	
	if (mysql_num_rows($mazresult) > 0) {
		$mazrow = mysql_fetch_assoc($mazresult);
	
		echo '
			<!-- Modal -->
			<div class="modal" id="modal-smazid'.$x.'" aria-hidden="true">
				<div class="modal-dialog">
					<div class="modal-header">
						<h2>Smazat projekt?</h2>
						<a href="#" class="btn-close" aria-hidden="true">×</a>
					</div>
					<div class="modal-body">
						<table class="modal-table">
							<tr class="mezera"><td>ID projektu:</td><td style="padding-left: 50px;">'.$mazrow["id"].'</td></tr>
							<tr class="mezera"><td>Název projektu:</td><td style="padding-left: 50px;">'.$mazrow["nazev_projektu"].'</td></tr>
							<tr class="mezera"><td>Kategorie:</td><td style="padding-left: 50px;">'.$mazrow["kategorie"].'</td></tr>
							<tr class="mezera"><td>Autor:</td><td style="padding-left: 50px;">'.$mazrow["autor"].'</td></tr>
							<tr class="mezera"><td>Třída:</td><td style="padding-left: 50px;">'.$mazrow["trida"].'</td></tr>
							<tr class="mezera"><td>Školní rok:</td><td style="padding-left: 50px;">'.$mazrow["rok"].'</td></tr>
							<tr><td>Vedoucí práce:</td><td style="padding-left: 50px;">'.$mazrow["vedouci_prace"].'</td></tr>
						</table>
					</div>
					<div class="modal-footer">
						<a href="index.php?page=projekty&smazatPotvrzeno='.$_GET["smazid"].'" class="btn ano">ANO</a>
						<a href="#" class="btn">Storno</a>
					</div>
				</div>
			</div>
			<!-- /Modal -->
		';
	}
}

if ((int)$_GET["smazatPotvrzeno"]!=0){
	mysql_query("DELETE FROM projekty WHERE id='".$_GET["smazatPotvrzeno"]."'");

	include "./cfg/config.php";
	//$target_dir = "/home/domeny/ideatech.cz/web/subdomeny/filipcz/mproj/storage/";
	$target_ext = ".pdf";
	$target_file = $target_dir . $_GET["smazatPotvrzeno"] . $target_ext;
	if (file_exists($target_file)) {
		unlink($target_file);
	}
	echo "<script>window.location='index.php?page=projekty&smazano=1'</script>";
}

?>