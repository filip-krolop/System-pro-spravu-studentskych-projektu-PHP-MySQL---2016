<div class="searchbox">
	<form action="?page=uzivatele" method="GET">
			<input type="hidden" name="page" value="uzivatele">
			<input type="search" name="hledat" placeholder="Hledej uživatele" class="vyhledavac">
			<button type="submit" class="tlacitko" style="width: 70px;">Hledat</button>
	</form>
</div>

<?php

include "./components/mysql-conn.php";
include "./components/uzivatele-razeni.php";

include "./components/hledat.php";

if ($_POST){
	if (isset($_POST["prepinac"])){
		foreach ($_POST["prepinac"] as $iduziv) {
			if (strpos($iduziv, 'off') !== false){
				str_replace("off", "", $iduziv);
				mysql_query("UPDATE uzivatele SET blokovat='0' WHERE id='$iduziv'");
				echo "<script>window.location='?page=uzivatele'</script>";
			}
			else {
				mysql_query("UPDATE uzivatele SET blokovat='1' WHERE id='$iduziv'");
				echo "<script>window.location='?page=uzivatele'</script>";
			}
		}
	}
}

//$sql = "SELECT id, nazev_projektu, autor, trida, rok FROM projekty";
//$result = mysql_query($sql);

if ($uzivatel_prihlasen!="" && $_SESSION["opravneni"]=="3"){
	echo "
	<div class='pridatuziv'>
		<a href='index.html'><button class='tlacitko' style='width: 230px;'>Přidat nového uživatele</button></a>
	</div>
	<table class='tabulkacss' cellspacing='0'><thead><tr><th><a href='?page=uzivatele&razeni=id-90' class='razeni'>&#8595;</a> ID <a href='?page=uzivatele&razeni=id-09' class='razeni'>&#8593;</a></th><th><a href='?page=uzivatele&razeni=login-za' class='razeni'>&#8595;</a> Login <a href='?page=uzivatele&razeni=login-az' class='razeni'>&#8593;</a></th><th><a href='?page=uzivatele&razeni=jmenoprijmeni-za' class='razeni'>&#8595;</a> Jméno a příjmení <a href='?page=uzivatele&razeni=jmenoprijmeni-az' class='razeni'>&#8593;</a></th><th><a href='?page=uzivatele&razeni=opravneni-90' class='razeni'>&#8595;</a> Oprávnění <a href='?page=uzivatele&razeni=opravneni-09' class='razeni'>&#8593;</a></th><th><a href='?page=uzivatele&razeni=blokovan-na' class='razeni'>&#8595;</a> Blokován <a href='?page=uzivatele&razeni=blokovan-an' class='razeni'>&#8593;</a></th><th><a href='?page=uzivatele&razeni=domena-na' class='razeni'>&#8595;</a> V doméně <a href='?page=uzivatele&razeni=domena-an' class='razeni'>&#8593;</a></th><th>Akce</th></tr></thead><tbody><form id='formBlokUziv' action='?page=uzivatele' method='post'>";
	if (mysql_num_rows($result) > 0) {
		$jsakce='setTimeout(function(){document.getElementById("formBlokUziv").submit()},1000);';
		$i = 1;
		while($row = mysql_fetch_assoc($result)) {
			include "./components/definice-promennych.php";
			echo "<tr><td>" . $row["id"]. "</td><td>" . $row["login"]. "</td><td>" . $row["jmeno_a_prijmeni"]. "</td><td>" . $row["opravneni"]. "</td><td>
		<div class='onoffswitch'>
		<input type='hidden' name='prepinac[$i]' value='" . $row["id"]. "off'>
		<input type='checkbox' name='prepinac[$i]' value='" . $row["id"]. "' onchange='$jsakce' class='onoffswitch-checkbox' id='myonoffswitch" . $row["id"]. "' $stavchb>
    <label class='onoffswitch-label' for='myonoffswitch" . $row["id"]. "'>
        <span class='onoffswitch-inner'></span>
        <span class='onoffswitch-switch'></span>
    </label>
	</div>
			</td><td>" . $row["imap"]. "</td><td><a href='?page=uzivatele&upravid=".$row["id"]."'><img src='./img/edit.png' alt='Upravit'></a>&nbsp;&nbsp;&nbsp;<a href='?page=uzivatele&smazid=".$row["id"]."'><img src='./img/delete.png' alt='Odstranit uživatele'></a></td></tr>";
			$i = $i + 1;
		}
	}
	else {
		echo "<tr><td>" . $row["id"]. "</td><td>" . $row["login"]. "</td><td>" . $row["jmeno_a_prijmeni"]. "</td><td>" . $row["opravneni"]. "</td><td>" . $row["blokovat"]. "</td><td>" . $row["imap"]. "</td><td> </td></tr>";
	}
				
	echo "</form></tbody></table>";

}
else {
	echo "<table class='tabulkacss' cellspacing='0'><thead><tr><th><a href='?page=uzivatele&razeni=id-90' class='razeni'>&#8595;</a> ID <a href='?page=uzivatele&razeni=id-09' class='razeni'>&#8593;</a></th><th><a href='?page=uzivatele&razeni=login-za' class='razeni'>&#8595;</a> Login <a href='?page=uzivatele&razeni=login-az' class='razeni'>&#8593;</a></th><th><a href='?page=uzivatele&razeni=jmenoprijmeni-za' class='razeni'>&#8595;</a> Jméno a příjmení <a href='?page=uzivatele&razeni=jmenoprijmeni-az' class='razeni'>&#8593;</a></th><th><a href='?page=uzivatele&razeni=opravneni-90' class='razeni'>&#8595;</a> Oprávnění <a href='?page=uzivatele&razeni=opravneni-09' class='razeni'>&#8593;</a></th><th><a href='?page=uzivatele&razeni=blokovan-na' class='razeni'>&#8595;</a> Blokován <a href='?page=uzivatele&razeni=blokovan-an' class='razeni'>&#8593;</a></th><th><a href='?page=uzivatele&razeni=domena-na' class='razeni'>&#8595;</a> V doméně <a href='?page=uzivatele&razeni=domena-an' class='razeni'>&#8593;</a></th></tr></thead><tbody>";
	if (mysql_num_rows($result) > 0) {
		while($row = mysql_fetch_assoc($result)) {
			include "./components/definice-promennych.php";
			echo "<tr><td>" . $row["id"]. "</td><td>" . $row["login"]. "</td><td>" . $row["jmeno_a_prijmeni"]. "</td><td>" . $row["opravneni"]. "</td><td>" . $row["blokovat"]. "</td><td>" . $row["imap"]. "</td></tr>";
		}
	}
	else {
		echo "<tr><td>" . $row["id"]. "</td><td>" . $row["login"]. "</td><td>" . $row["jmeno_a_prijmeni"]. "</td><td>" . $row["opravneni"]. "</td><td>" . $row["blokovat"]. "</td><td>" . $row["imap"]. "</td></tr>";
	}
				
	echo "</tbody></table>";
}

mysql_close($mysql_conn);
?>
