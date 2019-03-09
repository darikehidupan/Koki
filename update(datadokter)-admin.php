<?php
include('config.php');
$id= $_POST['id_dokter'];
$nama_dokter=$_POST['nama_dokter'];
$alamat_dokter=$_POST['alamat_dokter'];
$spesialis_dokter=$_POST['spesialis_dokter'];
$no_telepon_dokter=$_POST['no_telepon_dokter'];
$umur=$_POST['umur'];
$username=$_POST['username'];
$password=$_POST['password'];


$query = mysql_query("update dokter set 
nama_dokter='$nama_dokter',
alamat_dokter='$alamat_dokter',
spesialis_dokter='$spesialis_dokter',
no_telepon_dokter='$no_telepon_dokter',
umur='$umur',
username='$username',
password='$password'
where id_dokter='$id'")or die(mysql_error());

if ($query) {
   header("Location: medicalrecord(admin-dokter).php");
}


?>