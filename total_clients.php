<?php
$db = "INSERT_SQLITE_FILE_HERE";
header("Cache-Control: no-cache, no-store, must-revalidate"); // HTTP 1.1.
header("Pragma: no-cache"); // HTTP 1.0.
header("Expires: 0"); // Proxies.
$array = array('clients' => 0);
$db = new SQLite3($db) or die ("ARGH!");


$results = $db->query('SELECT COUNT(DISTINCT clientMac) AS TOTAL_CLIENTS_SEEN FROM RawData');
if ($results->numColumns() > 0) {
   $row = $results->fetchArray(SQLITE3_ASSOC);
   $array['clients'] = $row['TOTAL_CLIENTS_SEEN'];
}
echo json_encode($array);
