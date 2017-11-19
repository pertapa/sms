<?php
// koneksi ke mysql di server hosting
mysql_connect('localhost', 'root', 'sixhappy');
mysql_select_db('sms');

// baca ID data yang akan dihapus yang dikirim via CURL dari localhost
$no = $_POST['no'];
// hapus data SMS berdasarkan ID
$query = "DELETE FROM outbox WHERE no = '$no'";
//$query="Select * from outbox where id='$id'";
$hasil=mysql_query($query);
echo $hasil;
?>
