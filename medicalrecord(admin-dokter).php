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
<link rel="stylesheet" href="css/medicalrecord(admin-dokter).css" type="text/css">
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
  <li><a href="homepage(admin).php">Home</a></li>
  <li><a href="#">Admin</a>
    <ul>
      <li><a href="medicalrecord(admin-dokter).php">Data dokter</a></li>
      <li><a href="medicalrecord(admin-pasien).php">Data pasien</a></li>
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
  <h3>Data dokter</h3>
  <br/>
   <?php
	$sambung = mysql_connect("localhost", "root", "") or die ("Gagal konek ke server.");
	mysql_select_db("koki") or die ("Gagal membuka database.");
	?>
    <a href="registrasi_dokter.php"><p style="float: left; margin-left:10px; color:#333; font-size:15px;">Tambahkan</p></a>
    <br/>
    <br/>
    <table border="1" style="margin-top:30px; color:#333;">
		<tr>
		<th width="550">Id</th>
		<th width="550">Nama dokter</th>
		<th width="550">Alamat dokter</th>
		<th width="550">Spesialis dokter</th>
        <th width="550">No telepon dokter</th>
		<th width="550">Umur</th>
        <th width="550">Username</th>
        <th width="550">Password</th>
		</tr>
        <?php
		$query = "select * from dokter";
		$result = mysql_query($query, $sambung);
		//$no = 0;
		while ($buff = mysql_fetch_array($result)){
		//$no++;
		?>
        <tr>
		<td style="text-align:center"><?php echo $buff['id_dokter']; ?></td>
		<td style="text-align:center"><?php echo $buff['nama_dokter']; ?></td>
		<td style="text-align:center"><?php echo $buff['alamat_dokter']; ?></td>
		<td style="text-align:center"><?php echo $buff['spesialis_dokter']; ?></td>
		<td style="text-align:center"><?php echo $buff['no_telepon_dokter']; ?></td>
        <td style="text-align:center"><?php echo $buff['umur']; ?></td>
		<td style="text-align:center"><?php echo $buff['username']; ?></td>
		<td style="text-align:center"><?php echo $buff['password']; ?></td>
        <td>
			<a href="edit_dokter(admin).php?id=<?php echo $buff['id_dokter']; ?>">Edit</a>
        </td>
        <td style="text-align:center">
        	<a href="hapus(datadokter).php?id=<?php echo $buff['id_dokter']; ?>">Hapus</a>
        </td>
		</tr>
        
       <?php
		}
		mysql_close($sambung);
		?>
        </table>
  
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