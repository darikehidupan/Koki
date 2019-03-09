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
<link rel="stylesheet" href="css/homepage(dokter).css" type="text/css">
<meta charset="iso-8859-1">
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
    <!-- Slider -->
    <section id="slider"><a href="#"><img src="img/CHORDS-slideshow.jpg"; alt=""></a></section>
    <!-- main content -->
    <div id="homepage">
      <!-- Services -->
      <section id="services" class="clear">
        <article class="one_third">
          <figure><img src="img/heart-shape-icon.jpg"; width="290" height="180" alt="">
            <figcaption>
              <h7>Layanan Klinik</h7>
              <p style="color:#000;">Kami melayani kesehatan untuk masyarakat umum dewasa maupun anak-anak yang membutuhkan 				               pengobatan secara medis. Pelayanan KB dan operasi kecil seperti khitanan dan lain-lainnya.</p>
              <footer class="more"><a href="Layanan_klinik(dokter).php">Read More &raquo;</a></footer>
            </figcaption>
          </figure>
        </article>
        <article class="one_third">
          <figure><img src="img/sch jpg.jpg"; width="290" height="180" alt="">
            <figcaption>
              <h7>Jadwal Klinik</h7>
              <p style="color:#000;">Untuk anda yang ingin mengetahui jam operasional dokter atau klinik kami, anda dapat
              melihatnya pada halaman ini.</p><br/>
              <footer class="more"><a href="Jadwal_klinik(dokter).php">Read More &raquo;</a></footer>
            </figcaption>
          </figure>
        </article>
        <article class="one_third lastbox">
          <figure><img src="img/825429430.png"; width="290" height="180" alt="">
            <figcaption>
              <h7>Cabang Klinik</h7>
              <p style="color:#000;">Cabang klinik Koki terdapat pada beberapa wilayah berikut ini, kami akan 
              terus berusaha untuk menyebarkan wilayah operasional kami ke wilayah-wilayah terpelosok yang membutuhkan.</p>
              <footer class="more"><a href="Cabang_klinik(dokter).php">Read More &raquo;</a></footer>
            </figcaption>
          </figure>
        </article>
      </section>
      <section id="intro" class="last clear">
        <article>
          <figure><img src="img/awas obat palsu.jpg" width="450" height="250" alt="">
            <figcaption>
              <h2 style="color:#333; font-style:normal; font-size:24px; font-family:'Palatino Linotype', 'Book Antiqua', 	 Palatino, serif;">Klinik koki</h2>
              <p></p>
              <p></p>
              <footer class="more"><a href="#">Read More &raquo;</a></footer>
            </figcaption>
          </figure>
        </article>
      </section>
      <!-- / Introduction -->
    </div>
    <!-- / content body -->
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