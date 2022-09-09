<?php

Switch($_GET["page"]){
	case "projekty";
			if($_GET['hledat'] != "") {
				$hledat = $_GET['hledat'];
	
				$hledat = stripslashes($hledat);
				$hledat = mysql_real_escape_string($hledat);

				$sql = "SELECT id, nazev_projektu, kategorie, autor, trida, rok, vedouci_prace FROM projekty WHERE nazev_projektu LIKE '%$hledat%' OR kategorie LIKE '%$hledat%' OR autor LIKE '%$hledat%' OR trida LIKE '%$hledat%' OR rok LIKE '%$hledat%' OR vedouci_prace LIKE '%$hledat%'";
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
		break;
	case "sprava";
			if($_GET['hledat'] != "") {
				$hledat = $_GET['hledat'];
	
				$hledat = stripslashes($hledat);
				$hledat = mysql_real_escape_string($hledat);

				$sql = "SELECT id, nazev_projektu, kategorie, autor, trida, rok, vedouci_prace FROM projekty WHERE vedouci_prace='$uzivatel_prihlasen' AND nazev_projektu LIKE '%$hledat%' OR kategorie LIKE '%$hledat%' OR autor LIKE '%$hledat%' OR trida LIKE '%$hledat%' OR rok LIKE '%$hledat%'";
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
		break;
	case "uzivatele";
			if($_GET['hledat'] != "") {
				$hledat = $_GET['hledat'];
	
				$hledat = stripslashes($hledat);
				$hledat = mysql_real_escape_string($hledat);

				$sql = "SELECT id, login, jmeno_a_prijmeni, opravneni, blokovat, imap FROM uzivatele WHERE login LIKE '%$hledat%' OR jmeno_a_prijmeni LIKE '%$hledat%'";
				$result = mysql_query($sql);
	
				if (mysql_num_rows($result) < 1) {
					$row["id"] = "Chyba:";
					$row["login"] = "Nebylo nic nalezeno";
					$row["jmeno_a_prijmeni"] = "";
					$row["opravneni"] = "";
					$row["blokovat"] = "";
					$row["imap"] = "";
				}
			}
		break;
}

?>