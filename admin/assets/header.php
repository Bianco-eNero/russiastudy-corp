<meta charset="utf-8" />

<title><?php if($_SESSION['language']=="EN") { echo  $applicatioNameEn; }  if($_SESSION['language']=="AR") { echo  $applicatioNameAr; } ?></title>



<meta name="keywords" content="<?php echo $keyWords; ?>" />
<meta name="description" content="" />
<meta name="Author" content="Dorin Grigoras [www.stepofweb.com]" />



<link rel="shortcut icon" href="<?php echo $server; ?>admin/images/logo_.ico" type="image/x-icon">
<link rel="icon" href="<?php echo $server; ?>admin/images/logo.ico" type="image/x-icon">


		<!-- mobile settings -->
		<meta name="viewport" content="width=device-width, maximum-scale=1, initial-scale=1, user-scalable=0" />
		<!--[if IE]><meta http-equiv='X-UA-Compatible' content='IE=edge,chrome=1'><![endif]-->

		<!-- WEB FONTS : use %7C instead of | (pipe) -->
		<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600%7CRaleway:300,400,500,600,700%7CLato:300,400,400italic,600,700" rel="stylesheet" type="text/css" />

		<!-- CORE CSS -->
		<link href="<?php echo $server; ?>admin/assets/smarty_files/assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />

		<!-- REVOLUTION SLIDER -->
		<link href="<?php echo $server; ?>admin/assets/smarty_files/assets/plugins/slider.revolution/css/extralayers.css" rel="stylesheet" type="text/css" />
		<link href="<?php echo $server; ?>admin/assets/smarty_files/assets/plugins/slider.revolution/css/settings.css" rel="stylesheet" type="text/css" />

		<!-- THEME CSS -->
		<link href="<?php echo $server; ?>admin/assets/smarty_files/assets/css/essentials.css" rel="stylesheet" type="text/css" />
		<link href="<?php echo $server; ?>admin/assets/smarty_files/assets/css/layout.css" rel="stylesheet" type="text/css" />


<?php
/// If Arabic enable RTL ///
if($_SESSION['language']=='AR') {
?>
<link href="<?php echo $server; ?>admin/assets/smarty_files/assets/plugins/bootstrap/RTL/bootstrap-rtl-merged.min.css" rel="stylesheet" type="text/css" />
<link href="<?php echo $server; ?>admin/assets/smarty_files/assets/css/layout-RTL.css" rel="stylesheet" type="text/css" />

<?php
																}
?>



<!-- fontawsome -->
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/all.css" integrity="sha384-hWVjflwFxL6sNzntih27bfxkr27PmbbK/iSvJ+a4+0owXq79v+lsFkW54bOGbiDQ" crossorigin="anonymous">



		<!-- PAGE LEVEL SCRIPTS -->
		<link href="<?php echo $server; ?>admin/assets/smarty_files/assets/css/header-1.css" rel="stylesheet" type="text/css" />
		<link href="<?php echo $server; ?>admin/assets/smarty_files/assets/css/color_scheme/darkblue.css" rel="stylesheet" type="text/css" id="color_scheme" />


<style>
	.arabic_font {
		
		font-family: 'Cairo', sans-serif;
		
	}
</style>
