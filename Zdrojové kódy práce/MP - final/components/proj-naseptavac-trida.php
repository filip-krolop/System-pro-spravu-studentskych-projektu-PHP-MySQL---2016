<?php
$nasincprom = 1;
include "mysql-conn.php";

$vyraz = $_GET['term'];

$query = mysql_query("SELECT DISTINCT trida FROM projekty WHERE trida LIKE '%".$vyraz."%' ORDER BY trida ASC");
while ($row = mysql_fetch_assoc($query)) {
    $data[] = $row['trida'];
}

echo json_encode($data);
?>