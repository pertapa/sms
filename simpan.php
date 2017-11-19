<meta http-equiv="refresh" content="0;http://jagosms.com">
<?php
$tujuan =$_POST['tujuan'];
$pesan =$_POST['pesan'];
/* untuk menampung variabel post dari captcha google adalah g-recaptcha-reponse */
$captcha = isset($_POST['g-recaptcha-response']) ? $_POST['g-recaptcha-response']:'';
$secret_key = '6LcdFC0UAAAAAAobxiFVLuV-c5CO0qqcuGojxKUm'; //masukkan secret key-nya berdasarkan secret key masig-masing saat create api key nya
$error = 'Gagal kirim form: periksa tujan, pesan dan captcha nya';
if ($captcha != '' && $tujuan != '' && $pesan != '' && is_numeric($tujuan)==true) {
   $url = 'https://www.google.com/recaptcha/api/siteverify?secret=' . urlencode($secret_key) . '&response=' . $captcha;   
   $recaptcha = file_get_contents($url);
   $recaptcha = json_decode($recaptcha, true);
   if (!$recaptcha['success']) {
	  echo $error;
   } else {
      include 'konekdb.php';
      echo '<br>';
      echo 'No Telpon Tujuan : '.$tujuan.'<br>Pesan Anda : '.$pesan;
      $sql = "INSERT INTO outbox (destinaton, sms) VALUES ('$tujuan', '$pesan')";
      mysql_query($sql);
   }
}
?>
