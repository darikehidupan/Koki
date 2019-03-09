<?php
 $sambung = mysql_connect("localhost", "root", "") or die ("Gagal konek ke server.");
mysql_select_db("koki") or die ("Gagal membuka database.");
//$edit=mysql_query("SELECT * FROM mhs WHERE nim='$_GET[nim]'");
//$r_edit=mysql_fetch_array($edit);
$id= $_GET['id'];
$query = "select * from dokter where id_dokter='$id'";
$result =  mysql_query($query, $sambung) or die("gagal melakukan query");
     $buff = mysql_fetch_array($result);
                 mysql_close($sambung);
?>
<html>
<head><title>Edit Data Dokter</title></head>
<body>
<form name="form1" method="post" action="update(datadokter)-admin.php">
<table>
<tr>
<td>id dokter</td>
<td>
<input type="text" name="id_dokter" value="<?php echo $id; ?>" />
</td>
</tr>

<tr>
<td>nama dokter</td>
<td>
<input type="text" name="nama_dokter" value="<?php echo $buff['nama_dokter']; ?>">
</td>
</tr>


<tr>
<td>alamat dokter</td>
<td>
<input type="text" name="alamat_dokter" value="<?php echo $buff['alamat_dokter']; ?>">
</td>
</tr>

<tr>
<td>spesialis dokter</td>
<td>
<input type="text" name="spesialis_dokter"value="<?php echo $buff['spesialis_dokter']; ?>">
</td>
</tr>

<tr>
<td>nomor telepon dokter</td>
<td>
<input type="text" name="no_telepon_dokter" value="<?php echo $buff['no_telepon_dokter']; ?>">
</td>
</tr>

<tr>
<td>umur dokter</td>
<td>
<input type="text" name="umur" value="<?php echo $buff['umur']; ?>">
</td>
</tr>

<tr>
<td>username dokter</td>
<td>
<input type="text" name="username" value="<?php echo $buff['username']; ?>">
</td>
</tr>

<tr>
<td>password dokter</td>
<td>
<input type="text" name="password" value="<?php echo $buff['password']; ?>">
</td>
</tr>


</table>
<input value="Simpan" type="submit" name="submit"/>
<input type="button" value="Kembali" onClick="self.history.back()">
</form>
</body>
</html>