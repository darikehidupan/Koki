<?php require_once('Connections/Koki_test.php'); ?>
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
<?php
if (!function_exists("GetSQLValueString")) {
function GetSQLValueString($theValue, $theType, $theDefinedValue = "", $theNotDefinedValue = "") 
{
  if (PHP_VERSION < 6) {
    $theValue = get_magic_quotes_gpc() ? stripslashes($theValue) : $theValue;
  }

  $theValue = function_exists("mysql_real_escape_string") ? mysql_real_escape_string($theValue) : mysql_escape_string($theValue);

  switch ($theType) {
    case "text":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;    
    case "long":
    case "int":
      $theValue = ($theValue != "") ? intval($theValue) : "NULL";
      break;
    case "double":
      $theValue = ($theValue != "") ? doubleval($theValue) : "NULL";
      break;
    case "date":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;
    case "defined":
      $theValue = ($theValue != "") ? $theDefinedValue : $theNotDefinedValue;
      break;
  }
  return $theValue;
}
}

$colname_kokidatadirisession = "-1";
if (isset($_SESSION['MM_Username'])) {
  $colname_kokidatadirisession = $_SESSION['MM_Username'];
}
mysql_select_db($database_Koki_test, $Koki_test);
$query_kokidatadirisession = sprintf("SELECT * FROM pasien WHERE Username = %s", GetSQLValueString($colname_kokidatadirisession, "text"));
$kokidatadirisession = mysql_query($query_kokidatadirisession, $Koki_test) or die(mysql_error());
$row_kokidatadirisession = mysql_fetch_assoc($kokidatadirisession);
$totalRows_kokidatadirisession = mysql_num_rows($kokidatadirisession);
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
<title>KOKI-Klinik Online Kesehatan Indonesia</title>
<link rel="stylesheet" href="css/datadiri(pasien).css" type="text/css">
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
  <center>
  <h3>Data diri anda</h3>
   <table id="tabledatadiri">
   	<tr>
    	<td width="300">Nama lengkap</td>
        <td width="300">: <?php echo $row_kokidatadirisession['Nama_lengkap']; ?></td>
    </tr>
    <tr>
    	<td width="300">Alamat</td>
        <td>: <?php echo $row_kokidatadirisession['Alamat_pasien']; ?></td>
    </tr>
    <tr>
    	<td width="300">Tempat tanggal lahir</td>
        <td>: <?php echo $row_kokidatadirisession['Tempat_tanggal_lahir_pasien']; ?></td>
    </tr>
    <tr>
    	<td width="300">Golongan darah</td>
        <td>: <?php echo $row_kokidatadirisession['Golongan_darah_pasien']; ?></td>
    </tr>
    <tr>
    	<td width="300">No telepon</td>
        <td>: <?php echo $row_kokidatadirisession['No_telepon_pasien']; ?></td>
    </tr>
   <tr>
    	<td width="300">Jenis kelamin</td>
        <td>: <?php echo $row_kokidatadirisession['Jenis_kelamin_pasien']; ?></td>
    </tr>
    <tr>
    	<td width="300">Umur</td>
        <td>: <?php echo $row_kokidatadirisession['Umur_pasien']; ?></td>
    </tr>
    <tr>
    	<td width="300">No antrian</td>
        <td>: <?php echo $row_kokidatadirisession['no_antrian']; ?> </td>
    </tr>
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
<?php
mysql_free_result($kokidatadirisession);
?>
