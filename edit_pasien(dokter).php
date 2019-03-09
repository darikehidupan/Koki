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
<form name="form1" method="post" action="update(dokter).php">
<table>
<input type="hidden" name="id_pasien" value="<?php echo $id; ?>" />
<input type="hidden" name="Nama_lengkap" value="<?php echo $buff['Nama_lengkap']; ?>">
<input type="hidden" name="Alamat_pasien" value="<?php echo $buff['Alamat_pasien']; ?>">
<input type="hidden" name="Tempat_tanggal_lahir_pasien"value="<?php echo $buff['Tempat_tanggal_lahir_pasien']; ?>">
<input type="hidden" name="Golongan_darah_pasien" value="<?php echo $buff['Golongan_darah_pasien']; ?>">
<input type="hidden" name="No_telepon_pasien" value="<?php echo $buff['No_telepon_pasien']; ?>">
<input type="hidden" name="Jenis_kelamin_pasien" value="<?php echo $buff['Jenis_kelamin_pasien']; ?>">
<input type="hidden" name="Umur_pasien" value="<?php echo $buff['Umur_pasien']; ?>">
<input type="hidden" name="Username" value="<?php echo $buff['Username']; ?>">
<input type="hidden" name="Password" value="<?php echo $buff['Password']; ?>">
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
</tr>

<input type="hidden" name="no_antrian" value="<?php echo $buff['no_antrian']; ?>">
</table>




</table>
<input value="Simpan" type="submit" name="submit"/>
<input type="button" value="Kembali" onClick="self.history.back()">
</form>
</body>
</html>