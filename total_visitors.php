<?php

$db = "INSERT_PATH_TO_MERAKIRECEIVER_DB";

$array = array('visitors' => 0);
$db = new SQLite3($db) or die ("ARGH!");

$apMAC = "11:22:33:44:55:66"; # Replace with your APs MAC address
$results = $db->query('SELECT clientMac, STRFTIME(\'%s\', seenTime) as lastseen, (rssi-95) AS dbm FROM RawData WHERE (rssi-95) > -65 AND apMac = \'$apMAC\' ORDER BY clientMac, lastseen');
if ($results->numColumns() > 0) {
   $mac = "";
   $prevmac = "";
   $lastseen = 0;
   $prevlastseen = 0;
   $dbm = 0;
   $prevdbm = 0;
   $visitors = 0;
   $skip_to_next_client = false;

   while($row = $results->fetchArray(SQLITE3_ASSOC)) {
     //var_dump($row);
     $mac = $row['clientMac'];
     $lastseen = $row['lastseen'];
     $dbm = $row['dbm'];
     if ($mac != $prevmac) {
             $skip_to_next_client = false;
     } else {
       if ($lastseen - $prevlastseen > 1 && $skip_to_next_client == false) { 
         if ($lastseen - $prevlastseen <= 180) {
           // Client seen two times within three minutes with a signal strength > -65 dBm => count as visitor!
	   $visitors++;
           // Already confirmed the client is a visitor. Skip remaining occurences...
	   $skip_to_next_client = true;
         }
       }
     }
     $prevmac = $mac;
     $prevlastseen = $lastseen;
     $prevdbm = $dbm;
   }
}


$array['visitors'] = $visitors;
echo json_encode($array);
