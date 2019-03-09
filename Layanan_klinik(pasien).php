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
<link rel="stylesheet" href="css/Layanan_kesehatan_pasien.css" type="text/css">
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
  <li><a href="homepage(pasien).php">Home</a></li>
  <li><a href="Layanan_klinik(pasien).php">Klinik Koki</a></li>
  <li><a href="Jadwal_klinik(pasien).php">Jadwal klinik</a></li>
  <li><a href="Cabang_klinik(pasien).php">Cabang Klinik</a></li>
  <li><a href="#">Pelayanan klinik</a>
    <ul>
      <li><a href="data_diri(pasien).php">Data diri anda</a></li>
      <li><a href="medical_record(pasien).php">Medical Record</a></li>
      <li><a href="<?php echo $logoutAction ?>">Sign out</a></li>
    </ul>
  </li>
  </ul>
  
</div>
    
  </header>
</div>
<!-- content -->
<div class="wrapper row2">
  <div id="container" class="clear">
    <!-- Slider -->
    <section id="slider"><a href="#"><img src="img/medical_doctors.jpg"  width="960" height="360" alt=""></a></section>
    <!-- main content -->
    <center>
    <h7>Layanan Klinik Online Kesehatan Indonesia</h7>
    
    <hr>
    <br/>
    <p style="font-family:'Trebuchet MS', Arial, Helvetica, sans-serif;font-size:14px; color:#333;" align="left">Kami melayani kesehatan untuk masyarakat umum dewasa maupun anak-anak yang membutuhkan pengobatan secara medis. Pelayanan KB dan operasi kecil seperti khitanan dan lain-lainnya.
Layanan yang ada di klinik koki antara lain : <br/> <br/>
Konsultasi kesehatan : Klinik Koki melayani konsultasi langsung dari pasien ke dokter untuk masyarakat umum, sehingga pasien dapat menerima jawaban langsung dari ahlinya serta dapat lebih berpikir terbuka untuk berbagi, menerima pendapat, dan solusi<br/> <br/>
Pemeriksaan Kesehatan : Klinik Koki melayani pemeriksaan kesehatan untuk orang dewasa maupun anak-anak yang ingin mengetahui kondisi kesehatan mereka atau yang ingin membutuhkan pengobatan medis <br/> <br/>
Medical Record : Klinik koki akan menyimpan semua medical record (rekam medis) bagi pasien yang sudah pernah berobat ke klinik koki sebelumnya, sehingga dapat memudahkan pasien dan dokter dalam mendiagnosis penyakit.<br/> <br/>
Cabang Klinik : Klinik koki mempunyai cabang yang tersebar di seluruh Indonesia. Untuk melihat informasi cabang </p>
    </center>
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
