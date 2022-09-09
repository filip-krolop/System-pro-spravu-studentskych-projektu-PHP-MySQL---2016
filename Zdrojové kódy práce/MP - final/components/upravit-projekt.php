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

						mysql_query("UPDATE projekty SET nazev_projektu='$nazevproj', popis_projektu='$popisproj', kategorie='$kategorie', autor='$autor', trida='$trida', rok='$spojrok', vedouci_prace='$vedouci' WHERE id='$idproj'");

						//print_r($_FILES["fileToUpload"]);
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

							mysql_query("UPDATE projekty SET nazev_projektu='$nazevproj', popis_projektu='$popisproj', kategorie='$kategorie', autor='$autor', trida='$trida', rok='$spojrok', vedouci_prace='$vedouci' WHERE id='$idproj'");

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

							mysql_query("UPDATE projekty SET nazev_projektu='$nazevproj', popis_projektu='$popisproj', kategorie='$kategorie', autor='$autor', trida='$trida', rok='$spojrok', vedouci_prace='$vedouci' WHERE id='$idproj'");

							echo "<script>window.location='index.php?page=projekty'</script>";
						}
						else {
							echo "Chyba: Pokoušíte se upravit projekt, ke kterému nemáte oprávnění";
						}
					break;
			}
		}
	}

	if ($_GET["id"] && $_GET["id"]!=""){

		$testidint = (int)$_GET["id"];
		
		if ($testidint!=0){
		
			$id = stripslashes($_GET["id"]);
			$id = mysql_real_escape_string($id);

			Switch($_SESSION["opravneni"]){
				case "3";
						$vyberprojekt = mysql_query("SELECT * FROM projekty WHERE id='$id'");
						$nactidata = mysql_fetch_assoc($vyberprojekt);

						$polerok = explode("/", $nactidata["rok"]);

						echo "
							<div class='obsah'>
								<div class='heading'><table><tr><td><img src='./img/edit2.png' alt='Upravit projekt'></td><td>Upravit projekt</td></tr></table></div>".(($errup) ? "" : "<br>").$errup."
								<div style='font-family: Sans-serif; font-size: 15px;'><form action='?page=upravitprojekt&id=".$_GET["id"]."' method='POST' enctype='multipart/form-data'>
										<fieldset class='ramecek'>
											<legend>Upravit projekt:</legend>
												<table align='center'>
													<tr><td>ID projektu:</td><td class='tdodsazeni'><input type='text' name='idproj' value='".$nactidata["id"]."' class='poleform' size='1' readonly></td></tr>
													<tr><td>Název projektu:</td><td class='tdodsazeni'><input type='text' name='nazevproj' value='".$nactidata["nazev_projektu"]."' class='poleform' size='75'></td></tr>
													<tr><td>Popis projektu:</td><td class='tdodsazeni'><textarea rows='4' cols='50' name='popisproj' class='poleform'>".$nactidata["popis_projektu"]."</textarea></td></tr>
													<tr><td>Kategorie:</td><td class='tdodsazeni'><div><label for='idkat'></label><input id='idkat' type='text' name='kategorie' value='".$nactidata["kategorie"]."' class='poleform' size='20'></div></td></tr>
													<tr><td>Autor:</td><td class='tdodsazeni'><input type='text' name='autor' value='".$nactidata["autor"]."' class='poleform' size='20'></td></tr>
													<tr><td>Třída:</td><td class='tdodsazeni'><div><label for='idtrida'></label><input id='idtrida' type='text' name='trida' value='".$nactidata["trida"]."' class='poleform' maxlength='6' size='6'></div></td></tr>
													<tr><td>Školní rok:</td><td class='tdodsazeni'><input type='text' name='rok1' value='".$polerok[0]."' class='poleform' maxlength='4' size='4' style='width: 30px;'>/<input type='text' name='rok2' value='".$polerok[1]."' class='poleform' maxlength='4' size='4' style='width: 30px;'></td></tr>
													<tr><td>Vedoucí práce:</td><td class='tdodsazeni'><div><label for='idved'></label><input id='idved' type='text' name='vedouci' value='".$nactidata["vedouci_prace"]."' class='poleform' size='20'></div></td></tr>
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
						$vyberprojekt = mysql_query("SELECT * FROM projekty WHERE id='$id' AND vedouci_prace='$uzivatel_prihlasen'");
						if (mysql_num_rows($vyberprojekt) > 0) {
							$nactidata = mysql_fetch_assoc($vyberprojekt);

							$polerok = explode("/", $nactidata["rok"]);

							echo "
								<div class='obsah'>
									<div class='heading'><table><tr><td><img src='./img/edit2.png' alt='Upravit projekt'></td><td>Upravit projekt</td></tr></table></div><br>
									<div><form action='?page=upravitprojekt' method='POST'>
											<fieldset class='ramecek'>
												<legend>Upravit projekt:</legend>
													<table>
														<tr><td>ID projektu:</td><td class='tdodsazeni'><input type='text' name='idproj' value='".$nactidata["id"]."' class='poleform' size='1' readonly></td></tr>
														<tr><td>Název projektu:</td><td class='tdodsazeni'><input type='text' name='nazevproj' value='".$nactidata["nazev_projektu"]."' class='poleform' size='75'></td></tr>
														<tr><td>Popis projektu:</td><td class='tdodsazeni'><textarea rows='4' cols='50' name='popisproj' class='poleform'>".$nactidata["popis_projektu"]."</textarea></td></tr>
														<tr><td>Kategorie:</td><td class='tdodsazeni'><div><label for='idkat'></label><input id='idkat' type='text' name='kategorie' value='".$nactidata["kategorie"]."' class='poleform' size='20'></div></td></tr>
														<tr><td>Autor:</td><td class='tdodsazeni'><input type='text' name='autor' value='".$nactidata["autor"]."' class='poleform' size='20'></td></tr>
														<tr><td>Třída:</td><td class='tdodsazeni'><div><label for='idtrida'></label><input id='idtrida' type='text' name='trida' value='".$nactidata["trida"]."' class='poleform' maxlength='6' size='6'></div></td></tr>
														<tr><td>Školní rok:</td><td class='tdodsazeni'><input type='text' name='rok1' value='".$polerok[0]."' class='poleform' maxlength='4' size='4' style='width: 30px;'>/<input type='text' name='rok2' value='".$polerok[1]."' class='poleform' maxlength='4' size='4' style='width: 30px;'></td></tr>
														<tr><td>Vedoucí práce:</td><td class='tdodsazeni'><div><label for='idved'></label><input id='idved' type='text' name='vedouci' value='".$nactidata["vedouci_prace"]."' class='poleform' size='20'></div></td></tr>
													</table>
												</fieldset><br>
											<button type='submit' class='tlacitko'>Uložit</button>
										</form></div>
									</div>
							";
						}
						else {
							echo "Chyba: Pro vstup do této sekce nemáte dostatečná oprávnění";
						}
					break;
				case "1";
						$vyberprojekt = mysql_query("SELECT * FROM projekty WHERE id='$id' AND login='$uzivatel_prihlasen'");
						if (mysql_num_rows($vyberprojekt) > 0) {
							$nactidata = mysql_fetch_assoc($vyberprojekt);

							$polerok = explode("/", $nactidata["rok"]);

							echo "
								<div class='obsah'>
									<div class='heading'><table><tr><td><img src='./img/edit2.png' alt='Upravit projekt'></td><td>Upravit projekt</td></tr></table></div><br>
									<div><form action='?page=upravitprojekt' method='POST'>
											<fieldset class='ramecek'>
												<legend>Upravit projekt:</legend>
													<table>
														<tr><td>ID projektu:</td><td class='tdodsazeni'><input type='text' name='idproj' value='".$nactidata["id"]."' class='poleform' size='1' readonly></td></tr>
														<tr><td>Název projektu:</td><td class='tdodsazeni'><input type='text' name='nazevproj' value='".$nactidata["nazev_projektu"]."' class='poleform' size='75'></td></tr>
														<tr><td>Popis projektu:</td><td class='tdodsazeni'><textarea rows='4' cols='50' name='popisproj' class='poleform'>".$nactidata["popis_projektu"]."</textarea></td></tr>
														<tr><td>Kategorie:</td><td class='tdodsazeni'><div><label for='idkat'></label><input id='idkat' type='text' name='kategorie' value='".$nactidata["kategorie"]."' class='poleform' size='20'></div></td></tr>
														<tr><td>Autor:</td><td class='tdodsazeni'><input type='text' name='autor' value='".$nactidata["autor"]."' class='poleform' size='20'></td></tr>
														<tr><td>Třída:</td><td class='tdodsazeni'><div><label for='idtrida'></label><input id='idtrida' type='text' name='trida' value='".$nactidata["trida"]."' class='poleform' maxlength='6' size='6'></div></td></tr>
														<tr><td>Školní rok:</td><td class='tdodsazeni'><input type='text' name='rok1' value='".$polerok[0]."' class='poleform' maxlength='4' size='4' style='width: 30px;'>/<input type='text' name='rok2' value='".$polerok[1]."' class='poleform' maxlength='4' size='4' style='width: 30px;'></td></tr>
														<tr><td>Vedoucí práce:</td><td class='tdodsazeni'><div><label for='idved'></label><input id='idved' type='text' name='vedouci' value='".$nactidata["vedouci_prace"]."' class='poleform' size='20'></div></td></tr>
													</table>
												</fieldset><br>
											<button type='submit' class='tlacitko'>Uložit</button>
										</form></div>
									</div>
							";
						}
						else {
							echo "Chyba: Pro vstup do této sekce nemáte dostatečná oprávnění";
						}
					break;
			}
		}
	}
}

mysql_close($mysql_conn);
?>