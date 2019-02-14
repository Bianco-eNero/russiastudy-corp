<?php
// ini_set('display_errors', 1);
// ini_set('display_startup_errors', 1);
// error_reporting(E_ALL);
error_reporting(1);
# FileName="Connection_php_mysql.htm"
# Type="MYSQL"
# HTTP="true"

//$hostname_website = "localhost";
//$database_website = "website_russia";
//$username_website = "root";
//$password_website = "root";
//$website = mysqli_connect($hostname_website, $username_website, $password_website) or trigger_error(mysqli_error($website),E_USER_ERROR);


 $hostname_website = "minigolfcitycom.ipagemysql.com";
 $database_website = "website_russia";
 $username_website = "hanyadel";
 $password_website = "Hanyadel1977.";
 $website = mysqli_connect($hostname_website, $username_website, $password_website) or trigger_error(mysqli_error($website),E_USER_ERROR);


//mysqli_set_charset('utf8');

mysqli_query($website , "SET NAMES utf8");

?>
