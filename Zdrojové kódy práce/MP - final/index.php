<?php
/*ini_set('display_startup_errors',1);
ini_set('display_errors',1);
error_reporting(-1);*/

session_start();

$uzivatel_prihlasen = $_SESSION['prihlasen'];

?>
<!doctype html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta http-equiv="Content-language" content="cs" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="css/obecne.css">
	<link rel="stylesheet" type="text/css" href="css/menu.css">
	<!--[if lt IE 7]> <link rel="stylesheet" type="text/css" href="css/iecompat.css"> <![endif]-->
	<!--[if IE 7]>    <link rel="stylesheet" type="text/css" href="css/iecompat.css"> <![endif]-->
	<!--[if IE 8]>    <link rel="stylesheet" type="text/css" href="css/iecompat.css"> <![endif]-->
	<!--[if gt IE 8]><!--><!--<![endif]-->
<?php
	include "components/hlavicka-css-js.php";
?>
	<title>Databáze maturitních projektů</title>
</head>
<body>
<?php
	include "components/menu.php";
	include "components/definice-sekci.php";
?>
</body>
</html>