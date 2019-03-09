<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>KOKI-Klinik Online Kesehatan Indonesia</title>
</head>

<body>
<form name="registrasi_dokter" method="post" action="insert(tambah dokter).php">
<table>

<tr>
<td>Nama dokter</td>
<td>
<input type="text" name="nama_dokter" placeholder="Nama dokter">
</td>
</tr>


<tr>
<td>Alamat dokter</td>
<td>
<input type="text" name="alamat_dokter" placeholder="Alamat dokter">
</td>
</tr>

<tr>
<td>Spesialis dokter</td>
<td>
<input type="text" name="spesialis_dokter" placeholder="Spesialis dokter">
</td>
</tr>

<tr>
<td>Nomor telepon dokter</td>
<td>
<input type="text" name="no_telepon_dokter" placeholder="Nomor telepon dokter">
</td>
</tr>

<tr>
<td>umur dokter</td>
<td>
<input type="text" name="umur" placeholder="Umur dokter">
</td>
</tr>

<tr>
<td>username dokter</td>
<td>
<input type="text" name="username" placeholder="Username dokter">
</td>
</tr>

<tr>
<td>password dokter</td>
<td>
<input type="password" name="password" placeholder="Password dokter">
</td>
</tr>
</table>
<input type="submit" value="daftar" />
<input type="button" value="Kembali" onClick="self.history.back()">
</body>
</html>