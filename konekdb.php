<?php 
//www.malasngoding.com
class database{

	var $host = "localhost";
	var $uname = "root";
	var $pass = "sixhappy";
	var $db = "sms";

	function __construct(){
		$koneksi = mysql_connect($this->host, $this->uname, $this->pass);
		mysql_select_db($this->db);

		if($koneksi){
			//echo "Koneksi database mysql dan php berhasil.";
		}else{
			//echo "Koneksi database mysql dan php GAGAL !";
		}
	}
} 

$malasngoding = new database();

?>
