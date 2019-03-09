<?php
# FileName="Connection_php_mysql.htm"
# Type="MYSQL"
# HTTP="true"
$hostname_Koki_test = "localhost";
$database_Koki_test = "koki";
$username_Koki_test = "root";
$password_Koki_test = "";
$Koki_test = mysql_pconnect($hostname_Koki_test, $username_Koki_test, $password_Koki_test) or trigger_error(mysql_error(),E_USER_ERROR); 
?>