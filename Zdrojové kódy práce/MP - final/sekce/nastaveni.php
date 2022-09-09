<?php

if ($uzivatel_prihlasen!="" && $_SESSION["opravneni"]=="3"){
	
	if ($_POST){
		$ulozpocet = file_put_contents("./cfg/pocet-projektu.conf", $_POST['pocetprojektu']);
		$ulozvedouci = file_put_contents("./cfg/vedouci-praci.conf", $_POST['seznamvedoucich']);
		$ulozkategorie = file_put_contents("./cfg/kategorie.conf", $_POST['seznamkategorii']);
		//echo "<script>window.location='index.php?page=projekty'</script>";
		
		if ($ulozpocet && $ulozvedouci && $ulozkategorie){
			$ulozeno = "<div align='center'>Provedené změny byly uloženy</div>";
		}
		else {
			$chyba = "<div align='center'>Při ukládání došlo k chybě, zkontrolujte CHMOD pro soubory ve složce /cfg</div>";
		}
	}

	echo "
		<div class='obsah'>
		<div class='heading'><table><tr><td><img src='./img/nastaveni2.png' alt='Nastavení'></td><td>Nastavení</td></tr></table></div><br>".(($_POST) ? (($ulozpocet && $ulozvedouci && $ulozkategorie) ? $ulozeno : $chyba) : "")."
		<div><form action='?page=nastaveni' method='POST'>
			<fieldset class='ramecek'>
				<legend>Nastavení projektů:</legend>
				Počet povolených projektů na studenta:
					<select class='slct' name='pocetprojektu'>
						<option value='1'>1</option>
						<option value='2'>2</option>
						<option value='3'>3</option>
					</select>
				<div class='skryte' align='right'>Počet vedlejších projektů, které mohou být dočasně v databázi spolu s hlavním projektem</div>
			</fieldset><br>
			<fieldset class='ramecek'>
				<legend>Vedoucí projektů:</legend>
				<table><tr><td>
				Seznam vedoucích projektů:</td><td class='tdodsazeni'>
				<textarea rows='6' cols='50' name='seznamvedoucich' class='poleform'>".file_get_contents("./cfg/vedouci-praci.conf")."</textarea>
				</td></tr></table>
			</fieldset><br>
			<fieldset class='ramecek'>
				<legend>Seznam kategorií:</legend>
				<table><tr><td>
				Kategorie:</td><td class='tdodsazeni'>
				<textarea rows='6' cols='50' name='seznamkategorii' class='poleform'>".file_get_contents("./cfg/kategorie.conf")."</textarea>
				</td></tr></table>
			</fieldset><br>
		<button type='submit' class='tlacitko'>Uložit</button>
		</form></div>
		</div>
	";
}
else {
	echo "Chyba: Pro vstup do této sekce nemáte dostatečná oprávnění";
}



/*<div class='obsah'>
<div class='heading'><table><tr><td><img src='./img/nastaveni2.png' alt='Nastavení'></td><td>Nastavení</td></tr></table></div><br>
<div><form action='action_page.php'>
  <fieldset class='ramecek'>
    <legend>Nastavení projektů:</legend>
    Počet povolených projektů na studenta:
	<select class='slct'>
		<option value='1'>1</option>
		<option value='2'>2</option>
		<option value='3'>3</option>
	</select>
	<div class='skryte' align='right'>Počet vedlejších projektů, které mohou být dočasně v databázi spolu s hlavním projektem</div>
  </fieldset><br>
  <fieldset class='ramecek'>
    <legend>Vedoucí projektů:</legend>
    Seznam vedoucích projektů:
	<textarea rows='6' cols='50'>

	</textarea>
	<div class='skryte' align='right'>Počet vedlejších projektů, které mohou být dočasně v databázi spolu s hlavním projektem</div>
  </fieldset><br>
  <button type='submit' class='tlacitko'>Uložit</button>
</form></div>
</div>*/

?>