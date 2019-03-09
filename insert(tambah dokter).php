<?php
include('config.php');
 
//tangkap data dari form
$nama_dokter= $_POST['nama_dokter'];
$alamat_dokter= $_POST['alamat_dokter'];
$spesialis_dokter= $_POST['spesialis_dokter'];
$no_telepon_dokter= $_POST['no_telepon_dokter'];
$umur= $_POST['umur'];
$username= $_POST['username'];
$password= $_POST['password'];

//simpan data ke database
$query = mysql_query("insert into dokter values('','$nama_dokter', '$alamat_dokter', '$spesialis_dokter', '$no_telepon_dokter', '$umur', '$username', '$password' )")or die(mysql_error());

if ($query) {
   header("Location:medicalrecord(admin-dokter).php");
}

?>