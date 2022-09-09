<?php
$nasincprom = 1;
include "mysql-conn.php";

$vyraz = $_GET['term'];

$query = mysql_query("SELECT DISTINCT kategorie FROM projekty WHERE kategorie LIKE '%".$vyraz."%' ORDER BY kategorie ASC");
while ($row = mysql_fetch_assoc($query)) {
    $data[] = $row['kategorie'];
}

echo json_encode($data);
?>