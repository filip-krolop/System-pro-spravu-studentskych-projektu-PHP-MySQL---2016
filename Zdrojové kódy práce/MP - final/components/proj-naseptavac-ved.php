<?php
$nasincprom = 1;
include "mysql-conn.php";

$vyraz = $_GET['term'];

$query = mysql_query("SELECT DISTINCT vedouci_prace FROM projekty WHERE vedouci_prace LIKE '%".$vyraz."%' ORDER BY vedouci_prace ASC");
while ($row = mysql_fetch_assoc($query)) {
    $data[] = $row['vedouci_prace'];
}

echo json_encode($data);
?>