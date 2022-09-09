<?php

if ($dlincprom == 1 || $printincprom == 1 || $nasincprom == 1) {
	include "../cfg/config.php";
}
else {
	include "./cfg/config.php";
}

// Create connection
$mysql_conn = mysql_connect($servername, $sql_login, $sql_heslo) or die("Chyba při pokusu o připojení k databázi: " . mysql_error());
$vybranadb = mysql_select_db("$databaze", $mysql_conn) or die("Chyba při pokusu o výběr databáze: " . mysql_error());
mysql_set_charset('utf8', $mysql_conn);

?>