<?php
include('config.php');
$id = $_POST['id_pasien'];
$Nama_lengkap= $_POST['Nama_lengkap'];
$Alamat_pasien= $_POST['Alamat_pasien'];
$Tempat_tanggal_lahir_pasien= $_POST['Tempat_tanggal_lahir_pasien'];
$Golongan_darah_pasien= $_POST['Golongan_darah_pasien'];
$No_telepon_pasien= $_POST['No_telepon_pasien'];
$Jenis_kelamin_pasien= $_POST['Jenis_kelamin_pasien'];
$Umur_pasien= $_POST['Umur_pasien'];
$Username= $_POST['Username'];
$Password= $_POST['Password'];
$Medical_record= $_POST['Medical_record'];
$Diperiksa_oleh= $_POST['Diperiksa_oleh'];
$Diperiksa= $_POST['Diperiksa'];
$no_antrian=$_POST['no_antrian'];

$query = mysql_query("update pasien set 
Nama_lengkap='$Nama_lengkap', 
Alamat_pasien='$Alamat_pasien', 
Tempat_tanggal_lahir_pasien='$Tempat_tanggal_lahir_pasien',   
Golongan_darah_pasien='$Golongan_darah_pasien', 
Jenis_kelamin_pasien='$Jenis_kelamin_pasien',  
Umur_pasien='$Umur_pasien',   
Username='$Username', 
Password='$Password',  
Medical_record='$Medical_record',   
Diperiksa_oleh='$Diperiksa_oleh', 
Diperiksa='$Diperiksa',
no_antrian='$no_antrian' 
where id_pasien='$id'")or die(mysql_error());

if ($query) {
   header("Location:medicalrecord(admin-pasien).php");
}

?>