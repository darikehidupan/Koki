<?php
include("config.php");
$query = mysql_query("DELETE from pasien WHERE id_pasien='$_GET[id]'");

if ($query) {
   header("Location:medicalrecord(admin-pasien).php");
}
?>