<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
<title>KOKI-Klinik Online Kesehatan Indonesia</title>
<link rel="stylesheet" href="css/Registrasi_pasien.css" type="text/css">
<meta charset="iso-8859-1">
<!--[if lt IE 9]><script src="scripts/html5shiv.js"></script><![endif]-->
</head>
<body>
<div class="wrapper row1">
  <header id="header" class="clear">
    <div id="hgroup">
    <div>
      <h1>KOKI</h1>
      <h2>Klinik Online Kesehatan Indonesia</h2>
    </div>
    <!--Nav bar-->
     <div id="nav">
    <ul id="drop-nav">
  <li><a href="homepage.php">Home</a></li>
  <li><a href="Layanan_klinik.php">Klinik Koki</a></li>
  <li><a href="Jadwal_klinik.php">Jadwal Klinik</a></li>
  <li><a href="Cabang_klinik.php">Cabang Klinik</a></li>
  <li><a href="registrasi_pasien.php">Registrasi</a></li>
  <li><a href="#">Sign in</a>
    <ul>
      <li><a href="login_dokter.php">Dokter</a></li>
      <li><a href="login_pasien.php">Pasien</a></li>
    </ul>
  </li>
  </ul>
  
</div>
    
  </header>
</div>
<!-- content -->
<div class="wrapper row2">
<div id="regis-white">
	<div id="regis_transparent">
    <center>
    	<h3 style=" margin-top:40px;font-style:normal; font-family:Arial, Helvetica, sans-serif;">Pendaftaran Pasien</h3>
    	<form id="Registrasi_pasien" name="Registrasi_pasien" method="post" action="insert.php">
        <table>
        <tr>
        	<td>Nama Lengkap : </td>
            <td><input id="input" type="text" name="Nama_lengkap" placeholder="Nama lengkap anda" required></td>
        </tr>
        <tr>
            <td>Alamat anda : </td>
            <td><input id="input" type="text" name="Alamat_pasien" placeholder="Alamat anda" required></td>
        </tr>
       	<tr>
        	<td>Tempat tanggal lahir : </td>
            <td><input id="input" type="text" name="Tempat_tanggal_lahir_pasien" placeholder="DD/MM/YY" required></td>
        </tr> 	
        <tr>
        	<td>Golongan Darah anda : </td>
            <td><input id="input" type="text" list="Golongan_darah_pasien" name="Golongan_darah_pasien" placeholder="Golongan Darah anda" required>
            <datalist id="Golongan_darah_pasien">
 			<option value="A"></option>
  			<option value="B"></option>
            <option value="AB"></option>
  			<option value="O"></option>
            </td>
        </tr>
        <tr>
        	<td>No telepon anda : </td>
        	<td><input id="input" type="text" name="No_telepon_pasien" placeholder="No telepon yang bisa di hubungi" required></td>
        </tr>
        <tr>
        	<td>Jenis kelamin anda : </td>
        	<td><input id="input" type="text" list="Jenis_kelamin_pasien" name="Jenis_kelamin_pasien" placeholder="Jenis kelamin anda" required>
            <datalist id="Jenis_kelamin_pasien">
 			<option value="Laki-Laki"></option>
  			<option value="Perempuan"></option>
			</datalist>
            </td>
        </tr>
        <tr>
        	<td>Umur : </td>
			<td><input id="input" type="text" name="Umur_pasien" placeholder="Umur anda" required></td>        
        </tr>
        <tr>
        	<td>Username anda : </td>
            <td><input id="input" type="text" name="Username" placeholder="Masukan username anda" required></td>
        </tr>
        <tr>
        	<td>Password anda : </td>
            <td><input id="input" type="password" name="Password" placeholder="Masukan password anda" required></td>
        </tr>
        <tr>
            <td><input style="margin-top:8px;"type="submit" value="Submit"></td>
        </tr>
        </table>
       </center>
    </div>


</div>
<!-- Copyright -->
<div class="wrapper row4">
  <footer id="copyright" class="clear">
  <center>
    <p>Copyright &copy; 2015 - All Rights Reserved </p><br/>
    <p>Klinik Online Kesehatan Indonesia</p>
  </center>
  </footer>
</div>
</body>
</html>
