<?php
if ((int)$_GET["id"]!=0){

	include "../cfg/config.php";

	$target_ext = ".pdf";
	$target_file = $target_dir . $_GET["id"] . $target_ext;

	if (file_exists($target_file)) {

		$dlincprom = 1;
		include "mysql-conn.php";

		$dlsql = "SELECT id, nazev_projektu, autor FROM projekty WHERE id='".$_GET["id"]."'";
		$dlresult = mysql_query($dlsql);

		if (mysql_num_rows($dlresult) > 0) {
			$dlrow = mysql_fetch_assoc($dlresult);

			mysql_close($mysql_conn);

			header('Content-Description: File Transfer');
			header('Content-Type: application/octet-stream');
			header('Content-Disposition: attachment; filename="'.$dlrow["id"].'_'.$dlrow["nazev_projektu"].'_'.$dlrow["autor"].$target_ext.'"');
			header('Content-Transfer-Encoding: binary');
			header('Expires: 0');
			header('Cache-Control: must-revalidate');
			header('Pragma: public');
			header('Content-Length: '.filesize($target_file));
			ob_clean();
			flush();
			readfile($target_file);
			exit;
		}
		else {
			mysql_close($mysql_conn);
		}
	}
}
?>