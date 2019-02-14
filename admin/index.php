<?php
//// Include Connection ////
include('assets/connections/index.php');
//// End Connection ////

//// Include Settings ////
include('assets/settings.php');
//// End Connection ////

//// Include Language ////
include('assets/languages/language_switch.php');

if ($_SESSION['language']=='AR')
{
include ('assets/languages/arabic.php');
}

if ($_SESSION['language']=='EN')
{
include ('assets/languages/english.php');
}
//// End Language ////

///// Include the settings table ////
mysqli_select_db($website,$database_website );
$query_settings = "SELECT * FROM settings WHERE settings_id='1'";
$settings = mysqli_query($website ,$query_settings) or die(mysqli_error($website));
$row_settings = mysqli_fetch_assoc($settings);
//// End of include the settings table ///

/// enable top bar //// 1    or    0
$enable_top_bar='';
////

//// Login process ////
if (isset($_POST["username"]) && isset($_POST["password"])) {

//// start check duplicate ////

$username=$_POST['username'];
$password=$_POST['password'];


mysqli_select_db($website,$database_website );
$query_login = "SELECT * FROM user WHERE username='$username' and password='$password'";
$login = mysqli_query($website ,$query_login) or die(mysqli_error($website));
$row_login = mysqli_fetch_assoc($login);
$totalRows_login = mysqli_num_rows($login);


if(isset($row_login['username']))
{

$_SESSION['my_id']=$row_login['user_id'];

//// If systetem admin , assign the session ////
if($row_login['system_admin']=='1')
    {
    $_SESSION['user_id']=$row_login['user_id'];
    $_SESSION['system_admin']='1';
    }
//// end of admin session ////

///// if success user name and passwor redirect to dashboard ////
echo '<script type="text/javascript">
           window.location = "'.$server.'admin/system/dashboard/"
      </script>';
//// end of redirect to dashboard ////

}
else
{

///// end check duplicate ///
echo '<script type="text/javascript">
           window.location = "'.$server.'admin/?wrong_login=1"
      </script>';


	//declare two session variables and assign them

}

}
//// end of login process ////


?>
<!DOCTYPE html>
<!--[if IE 8]>			<html class="ie ie8"> <![endif]-->
<!--[if IE 9]>			<html class="ie ie9"> <![endif]-->
<!--[if gt IE 9]><!-->	<html> <!--<![endif]-->
	<head>
		<?php
		//// Include Header Scripts ////
		include ('assets/header.php');
		//// End Header Scripts ///
		?>
	</head>

	<!--
		AVAILABLE BODY CLASSES:

		smoothscroll 			= create a browser smooth scroll
		enable-animation		= enable WOW animations

		bg-grey					= grey background
		grain-grey				= grey grain background
		grain-blue				= blue grain background
		grain-green				= green grain background
		grain-blue				= blue grain background
		grain-orange			= orange grain background
		grain-yellow			= yellow grain background

		boxed 					= boxed layout
		pattern1 ... patern11	= pattern background
		menu-vertical-hide		= hidden, open on click

		BACKGROUND IMAGE [together with .boxed class]
		data-background="assets/images/boxed_background/1.jpg"
	-->
		<body class="<?php echo $bodyClass; ?>" data-background="<?php echo $server; ?>control_panel/<?php echo $bgForBoxed; ?>">


		<!-- SLIDE TOP -->
		<?php
		//// if system admin , Include  top Bar ///
		include ('admin/assets/menus/slide_top.php');
		//// End Top Bar ///
		?>
		<!-- /SLIDE TOP -->


		<!-- wrapper -->
		<div id="wrapper">

			<!-- Top Bar -->
			<?php
			//// Include Slide Top Menu ////
		//	include('assets/menus/top_bar.php');
			//// end of Slide Top Menu ////
			?>
			<!-- /Top Bar -->



			<!--
				AVAILABLE HEADER CLASSES

				Default nav height: 96px
				.header-md 		= 70px nav height
				.header-sm 		= 60px nav height

				.noborder 		= remove bottom border (only with transparent use)
				.transparent	= transparent header
				.translucent	= translucent header
				.sticky			= sticky header
				.static			= static header
				.dark			= dark header
				.bottom			= header on bottom

				shadow-before-1 = shadow 1 header top
				shadow-after-1 	= shadow 1 header bottom
				shadow-before-2 = shadow 2 header top
				shadow-after-2 	= shadow 2 header bottom
				shadow-before-3 = shadow 3 header top
				shadow-after-3 	= shadow 3 header bottom

				.clearfix		= required for mobile menu, do not remove!

				Example Usage:  class="clearfix sticky header-sm transparent noborder"
			-->



			<!--
				PAGE HEADER

				CLASSES:
					.page-header-xs	= 20px margins
					.page-header-md	= 50px margins
					.page-header-lg	= 80px margins
					.page-header-xlg= 130px margins
					.dark			= dark page header

					.shadow-before-1 	= shadow 1 header top
					.shadow-after-1 	= shadow 1 header bottom
					.shadow-before-2 	= shadow 2 header top
					.shadow-after-2 	= shadow 2 header bottom
					.shadow-before-3 	= shadow 3 header top
					.shadow-after-3 	= shadow 3 header bottom
			-->
			<section class="page-header page-header-xs">
				<div class="container">

					<h1><?php echo $applicatioName ; ?></h1>

					<!-- breadcrumbs -->
					<!-- /breadcrumbs -->

				</div>
			</section>
			<!-- /PAGE HEADER -->




			<!-- -->
			<section>
				<div class="container">

					<div class="row">

							<div class="col-md-6 offset-md-3">

							<!-- ALERT -->
							<?php
							if(isset($_GET['wrong_login']))
							{
							?>
							<div class="alert alert-mini alert-danger margin-bottom-30">
								<strong>Oh snap!</strong> Password do not match!
							</div>
							<?php
							}
							?>
							<!-- /ALERT -->

							<div class="box-static box-border-top padding-60">
								<div class="box-title margin-bottom-30">
									<h2 class="size-20 text-danger" style="font-family: 'Cairo', sans-serif;"><?php echo $vLogin2 ; ?></h2>
								</div>

								<form class="nomargin" method="post" action="index.php" autocomplete="off">
									<div class="clearfix">

										<!-- Email -->
										<div class="form-group">
											<input style="font-family: 'Cairo', sans-serif;" type="text" name="username" class="form-control" placeholder="<?php echo $vEmailAddress ; ?>" required="">
										</div>

										<!-- Password -->
										<div class="form-group">
											<input style="font-family: 'Cairo', sans-serif;" type="password" name="password" class="form-control" placeholder="<?php echo $vPassword ; ?>" required="">
										</div>

									</div>



									<div class="row">



										<div class="col-md-12 col-sm-12 col-xs-12  fullwidth">

											<button style="font-family: 'Cairo', sans-serif;" class="btn btn-danger" type="submit"><?php echo $vLogin2 ; ?></button>

										</div>

									</div>


                  <div class="row">

                  <div class="col-md-10 col-sm-10 col-xs-10">

                    <!-- Inform Tip -->
                    <div class="form-tip pt-20">
                      <a style="font-family: 'Cairo', sans-serif;" class="no-text-decoration size-13 margin-top-10 block text-black" href="#"><?php echo $vForgotPassword ; ?></a>
  						


                    </div>

                  </div>

                  <div class="col-md-2 col-sm-2 col-xs-2">
                    <?php
                    if($_SESSION['language']=='AR') { ?>
                    <a class=" no-text-underline" data-toggle="" href="<?php echo $english_link ; ?>"><img class="flag-lang" src="<?php echo $server; ?>admin/images/flags/us.png" width="16" height="11" alt="lang" /></a>
                  <?php } ?>

                  <?php
                  if($_SESSION['language']=='EN') { ?>
                  <a class=" no-text-underline" data-toggle="" href="<?php echo $arabic_link ; ?>"><img class="flag-lang" src="<?php echo $server; ?>admin/images/flags/eg.png" width="16" height="11" alt="lang" /></a>
                <?php } ?>

                  </div>

                </div>

								</form>

							</div>



						</div>
					</div>

				</div>
			</section>
			<!-- / -->

			
			



			<!-- FOOTER -->

			<!-- /FOOTER -->

		</div>
		<!-- /wrapper -->


		<!-- FOOTER -->
<?php
include ('assets/menus/footer.php');
?>
			<!-- /FOOTER -->

		</div>
		<!-- /wrapper -->


		<!--
			SIDE card

				sidepanel-dark 			= dark color
				sidepanel-light			= light color (white)
				sidepanel-theme-color		= theme color

				sidepanel-inverse		= By default, sidepanel is placed on right (left for RTL)
								If you add "sidepanel-inverse", will be placed on left side (right on RTL).
		-->
<?php
//// side panel ///
include ('assets/menus/side_panel.php');
?>
		<!-- /SIDE card -->

<?php
//// footer scripts ////
include ('assets/menus/footer_scripts.php');
////
?>
		<!-- STYLESWITCHER - REMOVE -->
	</body>
</html>
