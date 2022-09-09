<?php
	imap_close($mbox);
	
	include "mysql-conn.php";
	
	$login = stripslashes($login);
	$heslo = stripslashes($heslo);
	$login = mysql_real_escape_string($login);
	$heslo = mysql_real_escape_string($heslo);
	
	$zapsan = mysql_num_rows(mysql_query("SELECT * FROM uzivatele WHERE login='$login'"));
	
	if ($zapsan==0){	
		$pocetradku = mysql_num_rows(mysql_query("SELECT * FROM uzivatele"));
		$id = $pocetradku + 1;
		$pridejuziv = "INSERT INTO uzivatele (id, login, jmeno_a_prijmeni, heslo, opravneni, blokovat, imap) VALUES ('$id', '$login', '', MD5('$heslo'), '0', '0', '1')";
		mysql_query($pridejuziv);
	}
	
	$testuzivpovolen = mysql_fetch_assoc(mysql_query("SELECT blokovat FROM uzivatele WHERE login='$login'"));
	
	if ($testuzivpovolen["blokovat"]=="1"){
		$uzivatelblokovan = $testuzivpovolen["blokovat"];
	}
	
	$testimap = mysql_fetch_assoc(mysql_query("SELECT imap FROM uzivatele WHERE login='$login'"));

	if ($testimap["imap"]=="1"){
		$_SESSION["sesimap"] = $testimap["imap"];
	}

	$heslo = md5($heslo);
	
	$vyberlogin = mysql_query("SELECT login, heslo, opravneni, blokovat FROM uzivatele WHERE login='$login' AND heslo='$heslo'");
	$nalezen = mysql_num_rows($vyberlogin);
	if ($nalezen != "0"){
		$vybrano = mysql_fetch_assoc($vyberlogin);
		$_SESSION["opravneni"] = $vybrano["opravneni"];
		$login_def = $vybrano["login"];
		$heslo_def = $vybrano["heslo"];
	}
	else {
		$login_def = "";
		$heslo_def = "";
	}
	
	mysql_close($mysql_conn);
?>