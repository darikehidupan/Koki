<?php
//initialize the session
if (!isset($_SESSION)) {
  session_start();
}

// ** Logout the current user. **
$logoutAction = $_SERVER['PHP_SELF']."?doLogout=true";
if ((isset($_SERVER['QUERY_STRING'])) && ($_SERVER['QUERY_STRING'] != "")){
  $logoutAction .="&". htmlentities($_SERVER['QUERY_STRING']);
}

if ((isset($_GET['doLogout'])) &&($_GET['doLogout']=="true")){
  //to fully log out a visitor we need to clear the session varialbles
  $_SESSION['MM_Username'] = NULL;
  $_SESSION['MM_UserGroup'] = NULL;
  $_SESSION['PrevUrl'] = NULL;
  unset($_SESSION['MM_Username']);
  unset($_SESSION['MM_UserGroup']);
  unset($_SESSION['PrevUrl']);
	
  $logoutGoTo = "homepage.php";
  if ($logoutGoTo) {
    header("Location: $logoutGoTo");
    exit;
  }
}
?>
<?php
if (!isset($_SESSION)) {
  session_start();
}
$MM_authorizedUsers = "";
$MM_donotCheckaccess = "true";

// *** Restrict Access To Page: Grant or deny access to this page
function isAuthorized($strUsers, $strGroups, $UserName, $UserGroup) { 
  // For security, start by assuming the visitor is NOT authorized. 
  $isValid = False; 

  // When a visitor has logged into this site, the Session variable MM_Username set equal to their username. 
  // Therefore, we know that a user is NOT logged in if that Session variable is blank. 
  if (!empty($UserName)) { 
    // Besides being logged in, you may restrict access to only certain users based on an ID established when they login. 
    // Parse the strings into arrays. 
    $arrUsers = Explode(",", $strUsers); 
    $arrGroups = Explode(",", $strGroups); 
    if (in_array($UserName, $arrUsers)) { 
      $isValid = true; 
    } 
    // Or, you may restrict access to only certain users based on their username. 
    if (in_array($UserGroup, $arrGroups)) { 
      $isValid = true; 
    } 
    if (($strUsers == "") && true) { 
      $isValid = true; 
    } 
  } 
  return $isValid; 
}

$MM_restrictGoTo = "homepage.php";
if (!((isset($_SESSION['MM_Username'])) && (isAuthorized("",$MM_authorizedUsers, $_SESSION['MM_Username'], $_SESSION['MM_UserGroup'])))) {   
  $MM_qsChar = "?";
  $MM_referrer = $_SERVER['PHP_SELF'];
  if (strpos($MM_restrictGoTo, "?")) $MM_qsChar = "&";
  if (isset($_SERVER['QUERY_STRING']) && strlen($_SERVER['QUERY_STRING']) > 0) 
  $MM_referrer .= "?" . $_SERVER['QUERY_STRING'];
  $MM_restrictGoTo = $MM_restrictGoTo. $MM_qsChar . "accesscheck=" . urlencode($MM_referrer);
  header("Location: ". $MM_restrictGoTo); 
  exit;
}
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
<title>KOKI-Klinik Online Kesehatan Indonesia</title>
<link rel="stylesheet" href="css/medical_record(dokter).css" type="text/css">
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
  <li><a href="homepage(dokter).php">Home</a></li>
  <li><a href="Layanan_klinik(dokter).php">Klinik koki</a>
  <li><a href="Jadwal_klinik(dokter).php">Jadwal klinik</a></li>
   <li><a href="Cabang_klinik(dokter).php">Cabang klinik</a></li>
  <li><a href="">Dokter</a>
    <ul>
     <li><a href="data_diri(dokter).php">Data diri anda</a></li>
      <li><a href="medical_record(dokter).php">Medical Record Pasien</a></li>
      <li> <a href="<?php echo $logoutAction ?>">Sign out</a></li>
    </ul>
  </li>
  </ul>
    </div>
    
  </header>
</div>
<!-- content -->
<div class="wrapper row2">
  <div id="container" class="clear">
  <center>
  <?php
	$sambung = mysql_connect("localhost", "root", "") or die ("Gagal konek ke server.");
	mysql_select_db("koki") or die ("Gagal membuka database.");
	?>
  
  
  <h3>Medical Record Pasien</h3>
   <table border="1" style="margin-top:30px; color:#333;">
		<tr>
		<th width="550">Id</th>
		<th width="550">Nama Pasien</th>
		<th width="550">Alamat Pasien</th>
		<th width="550">TTL</th>
        <th width="550">Golongan darah</th>
		<th width="550">Kontak</th>
        <th width="550">Jenis Kelamin</th>
        <th width="550">Umur</th>
        <th width="550">Username</th>
        <th width="550">Medical record</th> 
        <th width="550">Diperiksa oleh</th>
        <th width="550">Diperiksa tanggal</th>   
        <th width="550">no antrian</th>   
		<th width="550">Pilihan</th>
		</tr>
		<?php
		$query = "select * from pasien";
		$result = mysql_query($query, $sambung);
		//$no = 0;
		while ($buff = mysql_fetch_array($result)){
		//$no++;
		?>
    	<tr>
		<td style="text-align:center"><?php echo $buff['id_pasien']; ?></td>
		<td style="text-align:center"><?php echo $buff['Nama_lengkap']; ?></td>
		<td style="text-align:center"><?php echo $buff['Alamat_pasien']; ?></td>
		<td style="text-align:center"><?php echo $buff['Tempat_tanggal_lahir_pasien']; ?></td>
		<td style="text-align:center"><?php echo $buff['Golongan_darah_pasien']; ?></td>
        <td style="text-align:center"><?php echo $buff['No_telepon_pasien']; ?></td>
		<td style="text-align:center"><?php echo $buff['Jenis_kelamin_pasien']; ?></td>
		<td style="text-align:center"><?php echo $buff['Umur_pasien']; ?></td>
        <td style="text-align:center"><?php echo $buff['Username']; ?></td>
		<td style="text-align:center"><?php echo $buff['Medical_record']; ?></td>
        <td style="text-align:center"><?php echo $buff['Diperiksa_oleh']; ?></td>
		<td style="text-align:center"><?php echo $buff['Diperiksa']; ?></td>
        <td style="text-align:center"><?php echo $buff['no_antrian']; ?></td>
        <td style="text-align:center">
        	<a href="edit_pasien(dokter).php?id=<?php echo $buff['id_pasien']; ?>">Edit</a>
        </td>
		</tr>
        
       <?php
		}
		mysql_close($sambung);
		?>
        </table>
   </center>
   </div>
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