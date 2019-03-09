<?php
include('config.php');
 
//tangkap data dari form
$Nama_lengkap= $_POST['Nama_lengkap'];
$Alamat_pasien= $_POST['Alamat_pasien'];
$Tempat_tanggal_lahir_pasien= $_POST['Tempat_tanggal_lahir_pasien'];
$Golongan_darah_pasien= $_POST['Golongan_darah_pasien'];
$No_telepon_pasien= $_POST['No_telepon_pasien'];
$Jenis_kelamin_pasien= $_POST['Jenis_kelamin_pasien'];
$Umur_pasien= $_POST['Umur_pasien'];
$Username= $_POST['Username'];
$Password= $_POST['Password'];

//simpan data ke database
$query = mysql_query("insert into pasien values('','$Nama_lengkap', '$Alamat_pasien', '$Tempat_tanggal_lahir_pasien', '$Golongan_darah_pasien', '$No_telepon_pasien', '$Jenis_kelamin_pasien', '$Umur_pasien', '$Username', '$Password', '','','','')")or die(mysql_error());

if ($query) {
   header("Location: homepage.php");
}

?>