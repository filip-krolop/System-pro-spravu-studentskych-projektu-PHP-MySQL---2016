<?php

if ($uzivatel_prihlasen!="" && $_SESSION["opravneni"]!="0"){

	include "./components/mysql-conn.php";
	
	if ($_POST){
		$testidproj = (int)$_POST['idproj'];
		$testrok1 = (int)$_POST['rok1'];
		$testrok2 = (int)$_POST['rok2'];
		
		if ($testidproj!=0 && $testrok1!=0 && $testrok2!=0){

			$idproj = stripslashes($_POST['idproj']);
			$idproj = mysql_real_escape_string($idproj);
		
			Switch($_SESSION["opravneni"]){
				case "3";
						$nazevproj = stripslashes($_POST['nazevproj']);
						$nazevproj = mysql_real_escape_string($nazevproj);
						$popisproj = stripslashes($_POST['popisproj']);
						$popisproj = mysql_real_escape_string($popisproj);
						$kategorie = stripslashes($_POST['kategorie']);
						$kategorie = mysql_real_escape_string($kategorie);
						$autor = stripslashes($_POST['autor']);
						$autor = mysql_real_escape_string($autor);
						$trida = stripslashes($_POST['trida']);
						$trida = mysql_real_escape_string($trida);
						$rok1 = stripslashes($_POST['rok1']);
						$rok1 = mysql_real_escape_string($rok1);
						$rok2 = stripslashes($_POST['rok2']);
						$rok2 = mysql_real_escape_string($rok2);
						$vedouci = stripslashes($_POST['vedouci']);
						$vedouci = mysql_real_escape_string($vedouci);
						
						$rok = array("$rok1","$rok2");
						$spojrok = implode("/", $rok);

						mysql_query("INSERT INTO projekty (id, nazev_projektu, popis_projektu, kategorie, autor, login, trida, rok, vedouci_prace, projekt_aktivni) VALUES ('$idproj', '$nazevproj', '$popisproj', '$kategorie', '$autor', '', '$trida', '$spojrok', '$vedouci', '0')");
						
						include "fupload.php";
						
						if(!$soubornevybran && $uploadOk == 0) {
							$errup = '<div class="fupmsg" style="width: 600px; background: red; margin: 0px auto;">Chyba: Lze nahrávat pouze dokumenty ve formátu PDF!</div><br>';
						}
						if(!$soubornevybran && $uploadOk == 1) {
							echo "<script>window.location='?page=projekty&uploadOk=1'</script>";
						}

						if($soubornevybran) {
							echo "<script>window.location='index.php?page=projekty'</script>";
						}
					break;
				case "2";
						if (mysql_num_rows(mysql_query("SELECT * FROM projekty WHERE id='$idproj' AND vedouci_prace='$uzivatel_prihlasen'")) > 0) {
						
							$nazevproj = stripslashes($_POST['nazevproj']);
							$nazevproj = mysql_real_escape_string($nazevproj);
							$popisproj = stripslashes($_POST['popisproj']);
							$popisproj = mysql_real_escape_string($popisproj);
							$kategorie = stripslashes($_POST['kategorie']);
							$kategorie = mysql_real_escape_string($kategorie);
							$autor = stripslashes($_POST['autor']);
							$autor = mysql_real_escape_string($autor);
							$trida = stripslashes($_POST['trida']);
							$trida = mysql_real_escape_string($trida);
							$rok1 = stripslashes($_POST['rok1']);
							$rok1 = mysql_real_escape_string($rok1);
							$rok2 = stripslashes($_POST['rok2']);
							$rok2 = mysql_real_escape_string($rok2);
							$vedouci = stripslashes($_POST['vedouci']);
							$vedouci = mysql_real_escape_string($vedouci);
							
							$rok = array("$rok1","$rok2");
							$spojrok = implode("/", $rok);

							mysql_query("INSERT INTO projekty (id, nazev_projektu, popis_projektu, kategorie, autor, login, trida, rok, vedouci_prace, projekt_aktivni) VALUES ('$idproj', '$nazevproj', '$popisproj', '$kategorie', '$autor', '', '$trida', '$spojrok', '$vedouci', '0')");

							echo "<script>window.location='index.php?page=projekty'</script>";
						}
						else {
							echo "Chyba: Pokoušíte se upravit projekt, ke kterému nemáte oprávnění";
						}
					break;
				case "1";
						if (mysql_num_rows(mysql_query("SELECT * FROM projekty WHERE id='$idproj' AND login='$uzivatel_prihlasen'")) > 0) {
						
							$nazevproj = stripslashes($_POST['nazevproj']);
							$nazevproj = mysql_real_escape_string($nazevproj);
							$popisproj = stripslashes($_POST['popisproj']);
							$popisproj = mysql_real_escape_string($popisproj);
							$kategorie = stripslashes($_POST['kategorie']);
							$kategorie = mysql_real_escape_string($kategorie);
							$autor = stripslashes($_POST['autor']);
							$autor = mysql_real_escape_string($autor);
							$trida = stripslashes($_POST['trida']);
							$trida = mysql_real_escape_string($trida);
							$rok1 = stripslashes($_POST['rok1']);
							$rok1 = mysql_real_escape_string($rok1);
							$rok2 = stripslashes($_POST['rok2']);
							$rok2 = mysql_real_escape_string($rok2);
							$vedouci = stripslashes($_POST['vedouci']);
							$vedouci = mysql_real_escape_string($vedouci);
							
							$rok = array("$rok1","$rok2");
							$spojrok = implode("/", $rok);

							mysql_query("INSERT INTO projekty (id, nazev_projektu, popis_projektu, kategorie, autor, login, trida, rok, vedouci_prace, projekt_aktivni) VALUES ('$idproj', '$nazevproj', '$popisproj', '$kategorie', '$autor', '', '$trida', '$spojrok', '$vedouci', '0')");

							echo "<script>window.location='index.php?page=projekty'</script>";
						}
						else {
							echo "Chyba: Pokoušíte se upravit projekt, ke kterému nemáte oprávnění";
						}
					break;
			}
		}
	}

	$pocetzaznamu = mysql_num_rows(mysql_query("SELECT id FROM projekty"));
	$id = $pocetzaznamu + 1;

	Switch($_SESSION["opravneni"]){
		case "3";
				echo "
					<div class='obsah'>
						<div class='heading'><table><tr><td><img src='./img/edit2.png' alt='Nový projekt'></td><td>Nový projekt</td></tr></table></div>".(($errup) ? "" : "<br>").$errup."
						<div style='font-family: Sans-serif; font-size: 15px;'><form action='?page=novyprojekt' method='POST' enctype='multipart/form-data'>
								<fieldset class='ramecek'>
									<legend>Nový projekt:</legend>
										<table align='center'>
											<tr><td>ID projektu:</td><td class='tdodsazeni'><input type='text' name='idproj' value='".$id."' class='poleform' size='1' readonly></td></tr>
											<tr><td>Název projektu:</td><td class='tdodsazeni'><input type='text' name='nazevproj' class='poleform' size='75'></td></tr>
											<tr><td>Popis projektu:</td><td class='tdodsazeni'><textarea rows='4' cols='50' name='popisproj' class='poleform'></textarea></td></tr>
											<tr><td>Kategorie:</td><td class='tdodsazeni'><div><label for='idkat'></label><input id='idkat' type='text' name='kategorie' class='poleform' size='20'></div></td></tr>
											<tr><td>Autor:</td><td class='tdodsazeni'><input type='text' name='autor' class='poleform' size='20'></td></tr>
											<tr><td>Třída:</td><td class='tdodsazeni'><div><label for='idtrida'></label><input id='idtrida' type='text' name='trida' class='poleform' maxlength='6' size='6'></div></td></tr>
											<tr><td>Školní rok:</td><td class='tdodsazeni'><input type='text' name='rok1' class='poleform' maxlength='4' size='4' style='width: 30px;'>/<input type='text' name='rok2' class='poleform' maxlength='4' size='4' style='width: 30px;'></td></tr>
											<tr><td>Vedoucí práce:</td><td class='tdodsazeni'><div><label for='idved'></label><input id='idved' type='text' name='vedouci' class='poleform' size='20'></div></td></tr>
											<tr><td>Nahrát PDF:</td><td class='tdodsazeni'><span id='filename' class='poleform'>Zvolte PDF</span><label for='fileToUpload'>Otevřít<input type='file' name='fileToUpload' id='fileToUpload'></label></td></tr>
										</table>
									</fieldset><br>
								<div align='center'><button type='submit' class='tlacitko-m'>Uložit</button></div>
							</form></div>
						</div>
				";
				include "fupload-incjs.php";
			break;
		case "2";
				echo "
				<div class='obsah'>
					<div class='heading'><table><tr><td><img src='./img/edit2.png' alt='Nový projekt'></td><td>Nový projekt</td></tr></table></div><br>
					<div><form action='?page=novyprojekt' method='POST'>
							<fieldset class='ramecek'>
								<legend>Nový projekt:</legend>
									<table>
										<tr><td>ID projektu:</td><td class='tdodsazeni'><input type='text' name='idproj' value='".$id."' class='poleform' size='1' readonly></td></tr>
										<tr><td>Název projektu:</td><td class='tdodsazeni'><input type='text' name='nazevproj' class='poleform' size='75'></td></tr>
										<tr><td>Popis projektu:</td><td class='tdodsazeni'><textarea rows='4' cols='50' name='popisproj' class='poleform'></textarea></td></tr>
										<tr><td>Kategorie:</td><td class='tdodsazeni'><div><label for='idkat'></label><input id='idkat' type='text' name='kategorie' class='poleform' size='20'></div></td></tr>
										<tr><td>Autor:</td><td class='tdodsazeni'><input type='text' name='autor' class='poleform' size='20'></td></tr>
										<tr><td>Třída:</td><td class='tdodsazeni'><div><label for='idtrida'></label><input id='idtrida' type='text' name='trida' class='poleform' maxlength='6' size='6'></div></td></tr>
										<tr><td>Školní rok:</td><td class='tdodsazeni'><input type='text' name='rok1' class='poleform' maxlength='4' size='4' style='width: 30px;'>/<input type='text' name='rok2' class='poleform' maxlength='4' size='4' style='width: 30px;'></td></tr>
										<tr><td>Vedoucí práce:</td><td class='tdodsazeni'><div><label for='idved'></label><input id='idved' type='text' name='vedouci' class='poleform' size='20'></div></td></tr>
									</table>
								</fieldset><br>
							<button type='submit' class='tlacitko'>Uložit</button>
						</form></div>
					</div>
				";
			break;
		case "1";
				echo "
				<div class='obsah'>
					<div class='heading'><table><tr><td><img src='./img/edit2.png' alt='Nový projekt'></td><td>Nový projekt</td></tr></table></div><br>
					<div><form action='?page=novyprojekt' method='POST'>
							<fieldset class='ramecek'>
								<legend>Nový projekt:</legend>
									<table>
										<tr><td>ID projektu:</td><td class='tdodsazeni'><input type='text' name='idproj' value='".$id."' class='poleform' size='1' readonly></td></tr>
										<tr><td>Název projektu:</td><td class='tdodsazeni'><input type='text' name='nazevproj' class='poleform' size='75'></td></tr>
										<tr><td>Popis projektu:</td><td class='tdodsazeni'><textarea rows='4' cols='50' name='popisproj' class='poleform'></textarea></td></tr>
										<tr><td>Kategorie:</td><td class='tdodsazeni'><div><label for='idkat'></label><input id='idkat' type='text' name='kategorie' class='poleform' size='20'></div></td></tr>
										<tr><td>Autor:</td><td class='tdodsazeni'><input type='text' name='autor' class='poleform' size='20'></td></tr>
										<tr><td>Třída:</td><td class='tdodsazeni'><div><label for='idtrida'></label><input id='idtrida' type='text' name='trida' class='poleform' maxlength='6' size='6'></div></td></tr>
										<tr><td>Školní rok:</td><td class='tdodsazeni'><input type='text' name='rok1' class='poleform' maxlength='4' size='4' style='width: 30px;'>/<input type='text' name='rok2' class='poleform' maxlength='4' size='4' style='width: 30px;'></td></tr>
										<tr><td>Vedoucí práce:</td><td class='tdodsazeni'><div><label for='idved'></label><input id='idved' type='text' name='vedouci' class='poleform' size='20'></div></td></tr>
									</table>
								</fieldset><br>
							<button type='submit' class='tlacitko'>Uložit</button>
						</form></div>
					</div>
				";
			break;
	}
}


mysql_close($mysql_conn);
?>