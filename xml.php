<?php
// koneksi ke mysql server hosting
include 'konekdb.php';

// membuat header dokumen XML
header('Content-Type: text/xml');
echo "<?xml version='1.0'?>";

// membuat root tag untuk data XML
echo "<outbox>";

// query untuk membaca seluruh SMS yang ada di tabel outbox
$query = "SELECT * FROM outbox ORDER BY no";
$hasil = mysql_query($query);
while ($data = mysql_fetch_array($hasil))
{
   // representasi data sms
   echo "<data>";
   echo "<no>".$data['no']."</no>";
   echo "<destination>".$data['destinaton']."</destination>";
   echo "<sms>".$data['sms']."</sms>";
   echo "</data>";
}
echo "</outbox>";
?>
