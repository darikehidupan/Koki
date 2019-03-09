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
<link rel="stylesheet" href="css/jadwal klinik(dokter).css" type="text/css">
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
  <li><a href="Layanan_klinik(dokter).php">Klinik koki</a></li>
  <li><a href="Jadwal_klinik(dokter).php">Jadwal klinik</a></li>
   <li><a href="Cabang_klinik(dokter).php">Cabang klinik</a></li>
  <li><a href="#">Dokter</a>
    <ul>
      <li><a href="data_diri(dokter).php">Data diri anda</a></li>
      <li><a href="medical_record(dokter).php">Medical Record Pasien</a></li>
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
    <center>
    <h7>Jadwal Klinik</h7>
    </center>
    <hr>
    <br/>
    <p style="font-family:'Trebuchet MS', Arial, Helvetica, sans-serif;font-size:14px; color:#333;" align="left">
    <center>
    <table style="width:100%; margin-left:60px;">
  <tr>
    <th>Hari</th>
    <th>Jam</th>		
    <th>Nama Dokter</th>
  </tr>
  <!--Senin-->
  <tr>
    <td>Senin</td>
    <td>08.00-15.00</td>		
    <td>Dr. Yulisna Leman</td>
  </tr>
  <tr>
    <td>Senin</td>
    <td>15.00-21-00</td>		
    <td>Dr. Tjok Ratih</td>
  </tr>
  <tr>
    <td>Senin</td>
    <td>21.00-03.00</td>		
    <td>Dr. Padyo Budi Purbono</td>
  </tr>
  <tr>
    <td>Senin</td>
    <td>03.00-08.00</td>		
    <td>Dr. Yulisna Leman</td>
  </tr>
  <!--Senin-->
</table>
<br>	
<table style="width:100%; margin-left:55px;">
  <!--Selasa-->
  <tr>
    <th></th>
    <th></th>		
    <th></th>
  </tr>
  <tr>
    <td>Selasa</td>
    <td>08.00-15.00</td>		
    <td>Dr. ME. Hetty Mamesah</td>
  </tr>
  <tr>
    <td>Selasa</td>
    <td>15.00-21-00</td>		
    <td>Dr. M. Iqbal</td>
  </tr>
  <tr>
    <td>Selasa</td>
    <td>21.00-03.00</td>		
    <td>Dr. Lilik Natasubrata</td>
  </tr>
  <tr>
    <td>Selasa</td>
    <td>03.00-08.00</td>		
    <td>Dr. Hendra A. S</td>
  </tr>
  <!--Selasa-->
</table>
<br/>
<table style="width:100%; margin-left:65px;">
  <!--Rabu-->
  <tr>
    <th></th>
    <th></th>		
    <th></th>
  </tr>
  <tr>
    <td>Rabu</td>
    <td>08.00-15.00</td>		
    <td>Dr. Deetje Mewengkang</td>
  </tr>
  <tr>
    <td>Rabu</td>
    <td>15.00-21-00</td>		
    <td>Dr. T Ida Simorangkir</td>
  </tr>
  <tr>
    <td>Rabu</td>
    <td>21.00-03.00</td>		
    <td>Dr. Rommy Leo Krisna</td>
  </tr>
  <tr>
    <td>Rabu</td>
    <td>03.00-08.00</td>		
    <td>Dr. Yulisna Leman</td>
  </tr>
  <!--Rabu-->
</table>
<br>
<table style="width:100%;  margin-left:55px;">
  <!--Kamis-->
  <tr>
    <th></th>
    <th></th>		
    <th></th>
  </tr>
  <tr>
    <td>Kamis</td>
    <td>08.00-15.00</td>		
    <td>Dr. Nani S Prasodjo</td>
  </tr>
  <tr>
    <td>Kamis</td>
    <td>15.00-21-00</td>		
    <td>Dr. Yulisna Leman</td>
  </tr>
  <tr>
    <td>Kamis</td>
    <td>21.00-03.00</td>		
    <td>Dr. Tjok Ratih</td>
  </tr>
  <tr>
    <td>Kamis</td>
    <td>03.00-08.00</td>		
    <td>Dr. Padyo Budi Purbono</td>
  </tr>
  <!--Kamis-->
</table>
<br>
<table style="width:100%; margin-left:60px;">
  <!--Jumat-->
  <tr>
    <th></th>
    <th></th>		
    <th></th>
  </tr>
  <tr>
    <td>Jumat</td>
    <td>08.00-15.00</td>		
    <td>Dr. ME. Hetty Mamesah</td>
  </tr>
  <tr>
    <td>Jumat</td>
    <td>15.00-21-00</td>		
    <td>Dr. Lilik Natasubrata</td>
  </tr>
  <tr>
    <td>Jumat</td>
    <td>21.00-03.00</td>		
    <td>Dr. Hendra A. S</td>
  </tr>
  <tr>
    <td>Jumat</td>
    <td>03.00-08.00</td>		
    <td>Dr. M. Iqbal</td>
  </tr>
  <!--Jumat-->
</table>
<br>
<table style="width:100%; margin-left:68px;">
  <!--Sabtu-->
  <tr>
    <th></th>
    <th></th>		
    <th></th>
  </tr>
  <tr>
    <td>Sabtu</td>
    <td>08.00-15.00</td>		
    <td>Dr. Ridhuan Irawan</td>
  </tr>
  <tr>
    <td>Sabtu</td>
    <td>15.00-21-00</td>		
    <td>Dr. T Ida Simorangkir</td>
  </tr>
  <tr>
    <td>Sabtu</td>
    <td>21.00-03.00</td>		
    <td>Dr. Hendra A. S.</td>
  </tr>
  <tr>
    <td>Sabtu</td>
    <td>03.00-08.00</td>		
    <td>Dr. Deetje Mewengkang</td>
  </tr>
  <!--Sabtu-->
</table>
<br>
<table style="width:100%; margin-left:55px;">
  <!--Minggu-->
  <tr>
    <th></th>
    <th></th>		
    <th></th>
  </tr>
  <tr>
    <td>Minggu</td>
    <td>08.00-15.00</td>		
    <td>Dr. Rianto kowi</td>
  </tr>
  <tr>
    <td>Minggu</td>
    <td>15.00-21-00</td>		
    <td>Dr. Ratna Dewi</td>
  </tr>
  <tr>
    <td>Minggu</td>
    <td>21.00-03.00</td>		
    <td>Dr. Evy Mutia Farid</td>
  </tr>
  <tr>
    <td>Minggu</td>
    <td>03.00-08.00</td>		
    <td>  Dr. Dede Andaria Boentoro</td>
  </tr>
  <!--Minggu-->
</table>



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
