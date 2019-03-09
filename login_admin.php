<?php require_once('Connections/Koki_test.php'); ?>
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
?>
<?php
// *** Validate request to login to this site.
if (!isset($_SESSION)) {
  session_start();
}

$loginFormAction = $_SERVER['PHP_SELF'];
if (isset($_GET['accesscheck'])) {
  $_SESSION['PrevUrl'] = $_GET['accesscheck'];
}

if (isset($_POST['Username_admin'])) {
  $loginUsername=$_POST['Username_admin'];
  $password=$_POST['Password_admin'];
  $MM_fldUserAuthorization = "";
  $MM_redirectLoginSuccess = "homepage(admin).php";
  $MM_redirectLoginFailed = "login_admin.php";
  $MM_redirecttoReferrer = false;
  mysql_select_db($database_Koki_test, $Koki_test);
  
  $LoginRS__query=sprintf("SELECT username, password FROM `admin` WHERE username=%s AND password=%s",
    GetSQLValueString($loginUsername, "text"), GetSQLValueString($password, "text")); 
   
  $LoginRS = mysql_query($LoginRS__query, $Koki_test) or die(mysql_error());
  $loginFoundUser = mysql_num_rows($LoginRS);
  if ($loginFoundUser) {
     $loginStrGroup = "";
    
	if (PHP_VERSION >= 5.1) {session_regenerate_id(true);} else {session_regenerate_id();}
    //declare two session variables and assign them
    $_SESSION['MM_Username'] = $loginUsername;
    $_SESSION['MM_UserGroup'] = $loginStrGroup;	      

    if (isset($_SESSION['PrevUrl']) && false) {
      $MM_redirectLoginSuccess = $_SESSION['PrevUrl'];	
    }
    header("Location: " . $MM_redirectLoginSuccess );
  }
  else {
    header("Location: ". $MM_redirectLoginFailed );
  }
}
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
<title>KOKI-Klinik Online Kesehatan Indonesia</title>
<link rel="stylesheet" href="css/login_admin.css" type="text/css">
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
    
    
  </header>
</div>
<!-- content -->
<div class="wrapper row2">
<div id="regis-white">
	<div id="regis_transparent">
    <center>
    	<h3 style=" color:#FFF; margin-top:15px;font-style:normal; font-family:Arial, Helvetica, sans-serif;">Sign In Admin</h3>
    	<form ACTION="<?php echo $loginFormAction; ?>" METHOD="POST" name="loginadmin" id="login_pasien">
        <table>
        <tr>
        	<td style="color:#FFF;">Username anda </td>
            <td><input id="input" type="text" name="Username_admin" placeholder="Masukan Username anda" required></td>
        </tr>
        <tr>
            <td style="color:#FFF;">Password anda </td>
            <td><input id="input" type="password" name="Password_admin" placeholder="Masukan Password anda" required></td>
        </tr>
            <td><input style="margin-top:8px;"type="submit" value="Submit"></td>
        </tr>
        </table>
        </form>
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
