<?php
# FileName="Connection_php_mysql.htm"
# Type="MYSQL"
# HTTP="true"
$hostname_tky = "localhost";
$database_tky = "dc";
$username_tky = "root";
$password_tky = "Li609103450";
$tky = mysql_pconnect($hostname_tky, $username_tky, $password_tky) or trigger_error(mysql_error(),E_USER_ERROR); 
?>