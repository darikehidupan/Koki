<?php
include("config.php");
$query = mysql_query("DELETE from dokter WHERE id_dokter='$_GET[id]'");

if ($query) {
     header("Location:medicalrecord(admin-dokter).php");
}
?>