<?php

if (!$_GET["razeni"] && !$_GET['hledat']){
	$sql = "SELECT id, nazev_projektu, kategorie, autor, trida, rok, vedouci_prace FROM projekty";
	$result = mysql_query($sql);
}

else{
	if ($_GET['hledat']){
		$hledat = $_GET['hledat'];
		$hlinc = "WHERE nazev_projektu LIKE '%$hledat%' OR kategorie LIKE '%$hledat%' OR autor LIKE '%$hledat%' OR trida LIKE '%$hledat%' OR rok LIKE '%$hledat%' OR vedouci_prace LIKE '%$hledat%'";
	}
	else{
		$hlinc = "";
	}
	
	Switch($_GET["razeni"]){
		case "";
				$sql = "SELECT id, nazev_projektu, kategorie, autor, trida, rok, vedouci_prace FROM projekty $hlinc";
				$result = mysql_query($sql);
			break;
		case "id-09";
				$sql = "SELECT id, nazev_projektu, kategorie, autor, trida, rok, vedouci_prace FROM projekty $hlinc ORDER BY id";
				$result = mysql_query($sql);
			break;
		case "id-90";
				$sql = "SELECT id, nazev_projektu, kategorie, autor, trida, rok, vedouci_prace FROM projekty $hlinc ORDER BY id DESC";
				$result = mysql_query($sql);
			break;
		case "nazevprojektu-az";
				$sql = "SELECT id, nazev_projektu, kategorie, autor, trida, rok, vedouci_prace FROM projekty $hlinc ORDER BY nazev_projektu";
				$result = mysql_query($sql);
			break;
		case "nazevprojektu-za";
				$sql = "SELECT id, nazev_projektu, kategorie, autor, trida, rok, vedouci_prace FROM projekty $hlinc ORDER BY nazev_projektu DESC";
				$result = mysql_query($sql);
			break;
		case "kategorie-az";
				$sql = "SELECT id, nazev_projektu, kategorie, autor, trida, rok, vedouci_prace FROM projekty $hlinc ORDER BY kategorie";
				$result = mysql_query($sql);
			break;
		case "kategorie-za";
				$sql = "SELECT id, nazev_projektu, kategorie, autor, trida, rok, vedouci_prace FROM projekty $hlinc ORDER BY kategorie DESC";
				$result = mysql_query($sql);
			break;
		case "autor-az";
				$sql = "SELECT id, nazev_projektu, kategorie, autor, trida, rok, vedouci_prace FROM projekty $hlinc ORDER BY autor";
				$result = mysql_query($sql);
			break;
		case "autor-za";
				$sql = "SELECT id, nazev_projektu, kategorie, autor, trida, rok, vedouci_prace FROM projekty $hlinc ORDER BY autor DESC";
				$result = mysql_query($sql);
			break;
		case "trida-az";
				$sql = "SELECT id, nazev_projektu, kategorie, autor, trida, rok, vedouci_prace FROM projekty $hlinc ORDER BY trida";
				$result = mysql_query($sql);
			break;
		case "trida-za";
				$sql = "SELECT id, nazev_projektu, kategorie, autor, trida, rok, vedouci_prace FROM projekty $hlinc ORDER BY trida DESC";
				$result = mysql_query($sql);
			break;
		case "rok-09";
				$sql = "SELECT id, nazev_projektu, kategorie, autor, trida, rok, vedouci_prace FROM projekty $hlinc ORDER BY rok";
				$result = mysql_query($sql);
			break;
		case "rok-90";
				$sql = "SELECT id, nazev_projektu, kategorie, autor, trida, rok, vedouci_prace FROM projekty $hlinc ORDER BY rok DESC";
				$result = mysql_query($sql);
			break;
		case "vedouci-az";
				$sql = "SELECT id, nazev_projektu, kategorie, autor, trida, rok, vedouci_prace FROM projekty $hlinc ORDER BY vedouci_prace";
				$result = mysql_query($sql);
			break;
		case "vedouci-za";
				$sql = "SELECT id, nazev_projektu, kategorie, autor, trida, rok, vedouci_prace FROM projekty $hlinc ORDER BY vedouci_prace DESC";
				$result = mysql_query($sql);
			break;
	}
}
?>