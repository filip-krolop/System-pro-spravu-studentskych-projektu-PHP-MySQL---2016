<?php

$printincprom = 1;
include "mysql-conn.php";

$filtrSetProm = "";
if ($_GET['filtr']) {
	$filtr = $_GET['filtr'];
	$filtrSetProm = "WHERE nazev_projektu LIKE '%$filtr%' OR kategorie LIKE '%$filtr%' OR autor LIKE '%$filtr%' OR trida LIKE '%$filtr%' OR rok LIKE '%$filtr%' OR vedouci_prace LIKE '%$filtr%'";
	
	if (!$_GET['filtrrazeni']) {
		$sql = "SELECT id, nazev_projektu, kategorie, autor, trida, rok, vedouci_prace FROM projekty WHERE nazev_projektu LIKE '%$filtr%' OR kategorie LIKE '%$filtr%' OR autor LIKE '%$filtr%' OR trida LIKE '%$filtr%' OR rok LIKE '%$filtr%' OR vedouci_prace LIKE '%$filtr%'";
		$result = mysql_query($sql);

		if (mysql_num_rows($result) < 1) {
			$row["id"] = "Chyba:";
			$row["nazev_projektu"] = "Nebylo nic nalezeno";
			$row["kategorie"] = "";
			$row["autor"] = "";
			$row["trida"] = "";
			$row["rok"] = "";
			$row["vedouci_prace"] = "";
		}
	}
}

if ($_GET['filtrrazeni']) {
	Switch($_GET['filtrrazeni']){
		case "";
				$sql = "SELECT id, nazev_projektu, kategorie, autor, trida, rok, vedouci_prace FROM projekty $filtrSetProm";
				$result = mysql_query($sql);
			break;
		case "id-09";
				$sql = "SELECT id, nazev_projektu, kategorie, autor, trida, rok, vedouci_prace FROM projekty $filtrSetProm ORDER BY id";
				$result = mysql_query($sql);
			break;
		case "id-90";
				$sql = "SELECT id, nazev_projektu, kategorie, autor, trida, rok, vedouci_prace FROM projekty $filtrSetProm ORDER BY id DESC";
				$result = mysql_query($sql);
			break;
		case "nazevprojektu-az";
				$sql = "SELECT id, nazev_projektu, kategorie, autor, trida, rok, vedouci_prace FROM projekty $filtrSetProm ORDER BY nazev_projektu";
				$result = mysql_query($sql);
			break;
		case "nazevprojektu-za";
				$sql = "SELECT id, nazev_projektu, kategorie, autor, trida, rok, vedouci_prace FROM projekty $filtrSetProm ORDER BY nazev_projektu DESC";
				$result = mysql_query($sql);
			break;
		case "kategorie-az";
				$sql = "SELECT id, nazev_projektu, kategorie, autor, trida, rok, vedouci_prace FROM projekty $filtrSetProm ORDER BY kategorie";
				$result = mysql_query($sql);
			break;
		case "kategorie-za";
				$sql = "SELECT id, nazev_projektu, kategorie, autor, trida, rok, vedouci_prace FROM projekty $filtrSetProm ORDER BY kategorie DESC";
				$result = mysql_query($sql);
			break;
		case "autor-az";
				$sql = "SELECT id, nazev_projektu, kategorie, autor, trida, rok, vedouci_prace FROM projekty $filtrSetProm ORDER BY autor";
				$result = mysql_query($sql);
			break;
		case "autor-za";
				$sql = "SELECT id, nazev_projektu, kategorie, autor, trida, rok, vedouci_prace FROM projekty $filtrSetProm ORDER BY autor DESC";
				$result = mysql_query($sql);
			break;
		case "trida-az";
				$sql = "SELECT id, nazev_projektu, kategorie, autor, trida, rok, vedouci_prace FROM projekty $filtrSetProm ORDER BY trida";
				$result = mysql_query($sql);
			break;
		case "trida-za";
				$sql = "SELECT id, nazev_projektu, kategorie, autor, trida, rok, vedouci_prace FROM projekty $filtrSetProm ORDER BY trida DESC";
				$result = mysql_query($sql);
			break;
		case "rok-09";
				$sql = "SELECT id, nazev_projektu, kategorie, autor, trida, rok, vedouci_prace FROM projekty $filtrSetProm ORDER BY rok";
				$result = mysql_query($sql);
			break;
		case "rok-90";
				$sql = "SELECT id, nazev_projektu, kategorie, autor, trida, rok, vedouci_prace FROM projekty $filtrSetProm ORDER BY rok DESC";
				$result = mysql_query($sql);
			break;
		case "vedouci-az";
				$sql = "SELECT id, nazev_projektu, kategorie, autor, trida, rok, vedouci_prace FROM projekty $filtrSetProm ORDER BY vedouci_prace";
				$result = mysql_query($sql);
			break;
		case "vedouci-za";
				$sql = "SELECT id, nazev_projektu, kategorie, autor, trida, rok, vedouci_prace FROM projekty $filtrSetProm ORDER BY vedouci_prace DESC";
				$result = mysql_query($sql);
			break;
	}
	if (mysql_num_rows($result) < 1) {
		$row["id"] = "Chyba:";
		$row["nazev_projektu"] = "Nebylo nic nalezeno";
		$row["kategorie"] = "";
		$row["autor"] = "";
		$row["trida"] = "";
		$row["rok"] = "";
		$row["vedouci_prace"] = "";
	}
}

if (!$_GET['filtr'] && !$_GET['filtrrazeni']) {
	$sql = "SELECT id, nazev_projektu, kategorie, autor, trida, rok, vedouci_prace FROM projekty";
	$result = mysql_query($sql);

	if (mysql_num_rows($result) < 1) {
		$row["id"] = "Chyba:";
		$row["nazev_projektu"] = "Nebylo nic nalezeno";
		$row["kategorie"] = "";
		$row["autor"] = "";
		$row["trida"] = "";
		$row["rok"] = "";
		$row["vedouci_prace"] = "";
	}
}

?>

<!doctype html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta http-equiv="Content-language" content="cs" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Databáze maturitních projektů</title>
	<style>
	table, th, td {
		border: 1px solid black;
		border-collapse: collapse;
	}
	td { padding-left: 15px; padding-right: 15px; }
	@media print{
		.netisk{
			visibility: hidden;
		}
	}
	@page{
		size: 21cm 29.7cm;
		margin: 0px;
	}
	body {
		margin-left: 1cm;
		margin-right: 1cm;
	}
	</style>
</head>
<body>
	<div align="center" class="netisk">
		<input type="button" value="Vytisknout" onclick="window.print();">
		<input type="button" value="Zavřít okno" onclick="window.close();">
		<hr style="width:30%;">
	</div>
	<div>
		<i>Střední průmyslová škola Edvarda Beneše<br>
		a Obchodní akademie Břeclav</i>
		<i style="float: right;">Seznam projektů</i>
	</div>
	<hr style="width:100%;">
	<div align="center">

<?php

	echo "<table cellspacing='0'><thead><tr><th> ID </th><th> Název projektu </th><th> Kategorie </th><th> Autor </th><th> Třída </th><th> Rok </th><th> Vedoucí práce </th></tr></thead><tbody>";

	if (mysql_num_rows($result) > 0) {
		while($row = mysql_fetch_assoc($result)) {
			echo "<tr><td>" . $row["id"]. "</td><td>" . $row["nazev_projektu"]. "</td><td>" . $row["kategorie"]. "</td><td>" . $row["autor"]. "</td><td>" . $row["trida"]. "</td><td>" . $row["rok"]. "</td><td>" . $row["vedouci_prace"]. "</td></tr>";
		}
	}

	else {
		echo "<tr><td>" . $row["id"]. "</td><td>" . $row["nazev_projektu"]. "</td><td>" . $row["kategorie"]. "</td><td>" . $row["autor"]. "</td><td>" . $row["trida"]. "</td><td>" . $row["rok"]. "</td><td>" . $row["vedouci_prace"]. "</td></tr>";
	}

	echo "</tbody></table>";

	mysql_close($mysql_conn);

?>

	</div>
</body>
</html>