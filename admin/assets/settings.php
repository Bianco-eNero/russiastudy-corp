<?php
//// Application Title ////
$applicatioNameEn='Study AbRus for Skills Development';
$applicatioNameAr='ستدي أبروس لتنمية المهارات';
////

//// if localserver
$localserver='1';

//// Server URL ////
// $server='http://localhost/website_russia/';
// $dashboard='http://localhost/website_russia/control_panel/system/dashboard/';

 $server='http://web.russiastudy-corp.com/';
 $dashboard='http://web.russiastudy-corp.co/control_panel/system/dashboard/';






//// start session //////
if (!isset($_SESSION)) {
  session_start();

  // ini_set('session.gc_maxlifetime',87000);

}


//////////////////
///// DESIGN /////
//////////////////

//// Header Style /////
$headerStyle='header-1';

//// Theme colo : /////
$themeColor='darkblue';

$author='Dorin Grigoras [www.stepofweb.com]';

//// Header Classes : clearfix    or    dark clearfix   or   sticky clearfix    or   sticky dark clearfix    or   static clearfix    or   static dark clearfix    or   sticky bottom clearfix   or   sticky bottom dark clearfix   or   sticky transparent clearfix   or   sticky translucent clearfix
$headerClass='sticky  shadow-after-3 clearfix';

//// Menu Classes : navbar-collapse pull-right nav-main-collapse collapse   or  navbar-collapse pull-right nav-main-collapse collapse submenu-dark    or navbar-collapse pull-right nav-main-collapse collapse submenu-color
$menuClass='';

////// Body classes : boxed      or   smoothscroll enable-animation    or  boxed pattern1 to pattern11
$bodyClass='smoothscroll enable-animation ';

//// Slider Style for revltuoion slider ////
$sliderStyle='slider fullwidthbanner-container roundedcorners';

////// Background for Boxed : assets/images/boxed_background/1.jpg     to     4.jpg
$bgForBoxed='';


//// Top Bar Style  : dark    or    null for blamk
$topMenuClass='dark';

//// Buttons in menu styles /////
$menuButtons='pull-right nav nav-pills nav-second-main';

///// Dark Layout    0     or     1
$whiteLogo='0';

//// Page header style : page-header page-header-lg parallax parallax-1 ///
$pageHeaderStyle='page-header page-header-md parallax';

//// Table Style ////
$tableStyle='table table-bordered table-striped table-vertical-middle';

//// Main Menu Class= ///
$mainMenuClass='nav nav-pills nav-main';


//// Keywords for application ////
$keyWords='HTML5,CSS3,Template';

//////////////////////
///// END DESIGN /////
//////////////////////
?>

<!-- Insert Google Fonts Selected -->
<link href="https://fonts.googleapis.com/css?family=Changa:200" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Cairo:400,700" rel="stylesheet">



<?php
//// MySQL Function ///
if (!function_exists("GetSQLValueString")) {
function GetSQLValueString($theValue, $theType, $theDefinedValue = "", $theNotDefinedValue = "")
{
  $theValue = get_magic_quotes_gpc() ? stripslashes($theValue) : $theValue;

// $theValue = function_exists("mysql_escape_string") ? mysql_escape_string($theValue) : mysql_real_escape_string($theValue);

  switch ($theType) {
    case "text":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;
    case "long":
    case "int":
      $theValue = ($theValue != "") ? intval($theValue) : "NULL";
      break;
    case "double":
      $theValue = ($theValue != "") ? "'" . doubleval($theValue) . "'" : "NULL";
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
///



///// define the current user ////
if(isset($_SESSION['user_id']))
{
  $user_id=$_SESSION['user_id'];

  mysqli_select_db($website,$database_website );
  $query_current_user = "SELECT * FROM user WHERE user_id='$user_id'";
  $current_user = mysqli_query($website ,$query_current_user) or die(mysqli_error($website));
  $row_current_user = mysqli_fetch_assoc($current_user);
  $totalRows_current_user = mysqli_num_rows($current_user);
}
//// end of define the current user ///
?>
