<?php
if($_GET['uploadOk']==1) {
	echo '<div class="fupmsg" style="width: 300px; background: #0C9DF3; margin: 20px auto;">Soubor byl úspěšně nahrán.</div>';
}
if($_GET['smazano']==1) {
	echo '<div class="fupmsg" style="width: 300px; background: #0C9DF3; margin: 20px auto;">Vybraný projekt byl úspěšně odstraněn.</div>';
}
?>

<div class="searchbox">
	<form action="?page=sprava" method="GET">
		<input type="hidden" name="page" value="sprava">
		<input type="search" name="hledat" placeholder="Hledat / filtrovat" class="vyhledavac">
		<button type="submit" class="tlacitko" style="width: 70px;">Hledat</button>
	</form>
</div>

<?php

include "./components/mysql-conn.php";
include "./components/sprava-razeni.php";
include "./components/akce.php";

if(!$_GET['hledat']) {
	include "./components/hledat.php";
}

if($_GET['hledat']) {
	$url = "./components/tisk.php?filtr=".$hledat."";
	$hraz = "&hledat=".$hledat."";
}

if($_GET["razeni"]) {
	$razeni = $_GET["razeni"];
	if($_GET['hledat']) {
		$url = "./components/tisk.php?filtr=".$hledat."&filtrrazeni=".$razeni."";
		$hraz = "&hledat=".$hledat."";
	}
	else {
		$url = "./components/tisk.php?filtrrazeni=".$razeni."";
		$hraz = "";
	}
}

if(!$_GET['hledat'] && !$_GET['razeni']) {
	$url = "./components/tisk.php";
	$hraz = "";
}

//$sql = "SELECT id, nazev_projektu, autor, trida, rok FROM projekty";
//$result = mysql_query($sql);

if ($uzivatel_prihlasen!="" && $_SESSION["opravneni"]=="2"){
	echo "
	<div align='right' style='margin-right: 2%'>
		<table><tr><td><a href='#' onclick='window.open(\"".$url."\",\"tisk\",\"width=800,height=500,toolbar=0,location=0,directories=0,status=0,copyhistory=1,menubar=0,scrollbars=1,resizable=1\");'><img src='./img/print.png' alt='Verze pro tisk'></a></td><td style='padding-left:20px;'><a href='?page=novyprojekt'><button class='tlacitko'>Nový projekt</button></a></td></tr></table>
	</div>
	<table class='tabulkacss' style='width: 90%' cellspacing='0'><thead><tr><th><a href='?page=sprava$hraz&razeni=id-90' class='razeni'>&#8595;</a> ID <a href='?page=sprava$hraz&razeni=id-09' class='razeni'>&#8593;</a></th><th><a href='?page=sprava$hraz&razeni=nazevprojektu-za' class='razeni'>&#8595;</a> Název projektu <a href='?page=sprava$hraz&razeni=nazevprojektu-az' class='razeni'>&#8593;</a></th><th><a href='?page=sprava$hraz&razeni=kategorie-za' class='razeni'>&#8595;</a> Kategorie <a href='?page=sprava$hraz&razeni=kategorie-az' class='razeni'>&#8593;</a></th><th><a href='?page=sprava$hraz&razeni=autor-za' class='razeni'>&#8595;</a> Autor <a href='?page=sprava$hraz&razeni=autor-az' class='razeni'>&#8593;</a></th><th><a href='?page=sprava$hraz&razeni=trida-za' class='razeni'>&#8595;</a> Třída <a href='?page=sprava$hraz&razeni=trida-az' class='razeni'>&#8593;</a></th><th><a href='?page=sprava$hraz&razeni=rok-90' class='razeni'>&#8595;</a> Rok <a href='?page=sprava$hraz&razeni=rok-09' class='razeni'>&#8593;</a></th><th><a href='?page=sprava$hraz&razeni=vedouci-za' class='razeni'>&#8595;</a> Vedoucí práce <a href='?page=sprava$hraz&razeni=vedouci-az' class='razeni'>&#8593;</a></th><th>PDF</th><th>Akce</th></tr></thead><tbody>";
	if (mysql_num_rows($result) > 0) {
		while($row = mysql_fetch_assoc($result)) {
			echo "<tr><td>" . $row["id"]. "</td><td>" . $row["nazev_projektu"]. "</td><td>" . $row["kategorie"]. "</td><td>" . $row["autor"]. "</td><td>" . $row["trida"]. "</td><td>" . $row["rok"]. "</td><td>" . $row["vedouci_prace"]. "</td><td><a href='?page=sprava&pdf=".$row["id"]."'><img src='./img/pdf.png' alt='Stáhnout PDF'></a></td><td><a href='?page=sprava&upravid=".$row["id"]."'><img src='./img/edit.png' alt='Upravit projekt'></a>&nbsp;&nbsp;&nbsp;<a href='?page=sprava&smazid=".$row["id"]."#modal-smazid".$row["id"]."'><img src='./img/delete.png' alt='Odstranit projekt'></a></td></tr>";
		}
	}
	else {
		echo "<tr><td>" . $row["id"]. "</td><td>" . $row["nazev_projektu"]. "</td><td>" . $row["kategorie"]. "</td><td>" . $row["autor"]. "</td><td>" . $row["trida"]. "</td><td>" . $row["rok"]. "</td><td>" . $row["vedouci_prace"]. "</td><td> </td><td> </td></tr>";
	}
	
	echo "</tbody></table>";
}
else {
	echo "
	<div align='right' style='margin-right: 2%'>
		<a href='#' onclick='window.open(\"".$url."\",\"tisk\",\"width=800,height=500,toolbar=0,location=0,directories=0,status=0,copyhistory=1,menubar=0,scrollbars=1,resizable=1\");'><img src='./img/print.png' alt='Verze pro tisk'></a>
	</div>
	<table class='tabulkacss' style='width: 90%' cellspacing='0'><thead><tr><th><a href='?page=sprava$hraz&razeni=id-90' class='razeni'>&#8595;</a> ID <a href='?page=sprava$hraz&razeni=id-09' class='razeni'>&#8593;</a></th><th><a href='?page=sprava$hraz&razeni=nazevprojektu-za' class='razeni'>&#8595;</a> Název projektu <a href='?page=sprava$hraz&razeni=nazevprojektu-az' class='razeni'>&#8593;</a></th><th><a href='?page=sprava$hraz&razeni=kategorie-za' class='razeni'>&#8595;</a> Kategorie <a href='?page=sprava$hraz&razeni=kategorie-az' class='razeni'>&#8593;</a></th><th><a href='?page=sprava$hraz&razeni=autor-za' class='razeni'>&#8595;</a> Autor <a href='?page=sprava$hraz&razeni=autor-az' class='razeni'>&#8593;</a></th><th><a href='?page=sprava$hraz&razeni=trida-za' class='razeni'>&#8595;</a> Třída <a href='?page=sprava$hraz&razeni=trida-az' class='razeni'>&#8593;</a></th><th><a href='?page=sprava$hraz&razeni=rok-90' class='razeni'>&#8595;</a> Rok <a href='?page=sprava$hraz&razeni=rok-09' class='razeni'>&#8593;</a></th><th><a href='?page=sprava$hraz&razeni=vedouci-za' class='razeni'>&#8595;</a> Vedoucí práce <a href='?page=sprava$hraz&razeni=vedouci-az' class='razeni'>&#8593;</a></th><th>PDF</th></tr></thead><tbody>";
	if (mysql_num_rows($result) > 0) {
		while($row = mysql_fetch_assoc($result)) {
			echo "<tr><td>" . $row["id"]. "</td><td>" . $row["nazev_projektu"]. "</td><td>" . $row["kategorie"]. "</td><td>" . $row["autor"]. "</td><td>" . $row["trida"]. "</td><td>" . $row["rok"]. "</td><td>" . $row["vedouci_prace"]. "</td><td><a href='?page=sprava&pdf=".$row["id"]."'><img src='./img/pdf.png' alt='Stáhnout PDF'></a></td></tr>";
		}
	}
	else {
		echo "<tr><td>" . $row["id"]. "</td><td>" . $row["nazev_projektu"]. "</td><td>" . $row["kategorie"]. "</td><td>" . $row["autor"]. "</td><td>" . $row["trida"]. "</td><td>" . $row["rok"]. "</td><td>" . $row["vedouci_prace"]. "</td><td> </td></tr>";
	}
	
	echo "</tbody></table>";
}

mysql_close($mysql_conn);
?>
