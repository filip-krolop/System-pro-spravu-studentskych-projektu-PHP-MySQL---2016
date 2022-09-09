<?php
@imap_close($mbox);

include "mysql-conn.php";

$login = stripslashes($login);
$heslo = stripslashes($heslo);
$login = mysql_real_escape_string($login);
$heslo = mysql_real_escape_string($heslo);

$heslo = md5($heslo);

$vyberlogin = mysql_query("SELECT login, heslo, opravneni, blokovat FROM uzivatele WHERE login='$login' AND heslo='$heslo'");
$nalezen = mysql_num_rows($vyberlogin);
if ($nalezen != "0"){
	$vybrano = mysql_fetch_assoc($vyberlogin);
	if ($vybrano["blokovat"]=="1"){
		$uzivatelblokovan = $vybrano["blokovat"];
	}
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