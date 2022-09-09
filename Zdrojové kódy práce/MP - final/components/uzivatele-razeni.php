<?php

if (!$_GET["razeni"] && !$_GET['hledat']){
	$sql = "SELECT id, login, jmeno_a_prijmeni, opravneni, blokovat, imap FROM uzivatele";
	$result = mysql_query($sql);
}

else{
	Switch($_GET["razeni"]){
		case "";
				$sql = "SELECT id, login, jmeno_a_prijmeni, opravneni, blokovat, imap FROM uzivatele";
				$result = mysql_query($sql);
			break;
		case "id-09";
				$sql = "SELECT id, login, jmeno_a_prijmeni, opravneni, blokovat, imap FROM uzivatele ORDER BY id";
				$result = mysql_query($sql);
			break;
		case "id-90";
				$sql = "SELECT id, login, jmeno_a_prijmeni, opravneni, blokovat, imap FROM uzivatele ORDER BY id DESC";
				$result = mysql_query($sql);
			break;
		case "login-az";
				$sql = "SELECT id, login, jmeno_a_prijmeni, opravneni, blokovat, imap FROM uzivatele ORDER BY login";
				$result = mysql_query($sql);
			break;
		case "login-za";
				$sql = "SELECT id, login, jmeno_a_prijmeni, opravneni, blokovat, imap FROM uzivatele ORDER BY login DESC";
				$result = mysql_query($sql);
			break;
		case "jmenoprijmeni-az";
				$sql = "SELECT id, login, jmeno_a_prijmeni, opravneni, blokovat, imap FROM uzivatele ORDER BY jmeno_a_prijmeni";
				$result = mysql_query($sql);
			break;
		case "jmenoprijmeni-za";
				$sql = "SELECT id, login, jmeno_a_prijmeni, opravneni, blokovat, imap FROM uzivatele ORDER BY jmeno_a_prijmeni DESC";
				$result = mysql_query($sql);
			break;
		case "opravneni-09";
				$sql = "SELECT id, login, jmeno_a_prijmeni, opravneni, blokovat, imap FROM uzivatele ORDER BY opravneni";
				$result = mysql_query($sql);
			break;
		case "opravneni-90";
				$sql = "SELECT id, login, jmeno_a_prijmeni, opravneni, blokovat, imap FROM uzivatele ORDER BY opravneni DESC";
				$result = mysql_query($sql);
			break;
		case "blokovan-an";
				$sql = "SELECT id, login, jmeno_a_prijmeni, opravneni, blokovat, imap FROM uzivatele ORDER BY blokovat";
				$result = mysql_query($sql);
			break;
		case "blokovan-na";
				$sql = "SELECT id, login, jmeno_a_prijmeni, opravneni, blokovat, imap FROM uzivatele ORDER BY blokovat DESC";
				$result = mysql_query($sql);
			break;
		case "domena-an";
				$sql = "SELECT id, login, jmeno_a_prijmeni, opravneni, blokovat, imap FROM uzivatele ORDER BY imap";
				$result = mysql_query($sql);
			break;
		case "domena-na";
				$sql = "SELECT id, login, jmeno_a_prijmeni, opravneni, blokovat, imap FROM uzivatele ORDER BY imap DESC";
				$result = mysql_query($sql);
			break;
	}
}
?>