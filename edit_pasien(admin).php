<?php
 $sambung = mysql_connect("localhost", "root", "") or die ("Gagal konek ke server.");
mysql_select_db("koki") or die ("Gagal membuka database.");
//$edit=mysql_query("SELECT * FROM mhs WHERE nim='$_GET[nim]'");
//$r_edit=mysql_fetch_array($edit);
$id= $_GET['id'];
$query = "select * from pasien where id_pasien='$id'";
$result =  mysql_query($query, $sambung) or die("gagal melakukan query");
     $buff = mysql_fetch_array($result);
                 mysql_close($sambung);
?>
<html>
<head><title>Edit Data</title></head>
<body>
<form name="form1" method="post" action="update(pasien)-admin.php">
<table>
<input type="hidden" name="id_pasien" value="<?php echo $id; ?>" />

<tr>
<td>nama lengkap pasien</td>
<td><input name="Nama_lengkap" type="text" value="<?php echo $buff['Nama_lengkap']; ?>"></td>
</tr>

<tr>
<td>Alamat pasien</td>
<td><input name="Alamat_pasien" type="text" value="<?php echo $buff['Alamat_pasien']; ?>"></td>
</tr>

<tr>
<td>Tempat tanggal lahir pasien</td>
<td><input name="Tempat_tanggal_lahir_pasien" type="text" value="<?php echo $buff['Tempat_tanggal_lahir_pasien']; ?>"></td>
</tr>


<tr>
<td>Golongan darah pasien</td>
<td><input name="Golongan_darah_pasien" type="text" value="<?php echo $buff['Golongan_darah_pasien']; ?>"></td>
</tr>

<tr>
<td>No telepon pasien</td>
<td><input name="No_telepon_pasien" type="text" value="<?php echo $buff['No_telepon_pasien']; ?>"></td>
</tr>


<tr>
<td>Jenis kelamin</td>
<td><input name="Jenis_kelamin_pasien" type="text" value="<?php echo $buff['Jenis_kelamin_pasien']; ?>"></td>
</tr>


<tr>
<td>Umur pasien</td>
<td><input name="Umur_pasien" type="text" value="<?php echo $buff['Umur_pasien']; ?>"></td>
</tr>


<tr>
<td>Username</td>
<td><input name="Username" type="text" value="<?php echo $buff['Username']; ?>"></td>
</tr>

<tr>
<td>Password</td>
<td><input name="Password" type="password" value="<?php echo $buff['Password']; ?>"></td>
</tr>

<tr>
<td>Medical Record</td>
<td><input name="Medical_record" type="text" value="<?php echo $buff['Medical_record']; ?>"></td>
</tr>

<tr style="margin-top:20px;">
<td>Diperiksa oleh</td>
<td><input type="text" name="Diperiksa_oleh" value="<?php echo $buff['Diperiksa_oleh']; ?>"></td>
</tr>

<tr>
<td>Diperiksa pada tanggal</td>
<td><input type="text" name="Diperiksa" value="<?php echo $buff['Diperiksa']; ?>">
</td>
<tr>

<tr>
<td>No antrian</td>
<td><input type="text" name="no_antrian" value="<?php echo $buff['no_antrian']; ?>">
</td>
<tr>

</table>




</table>
<input value="Simpan" type="submit" name="submit"/>
<input type="button" value="Kembali" onClick="self.history.back()">
</form>
</body>
</html>