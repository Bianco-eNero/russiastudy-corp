<?php
//// Include Connection ////
include('../../assets/connections/index.php');
//// End Connection ////

//// Include Settings ////
include('../../assets/settings.php');
//// End Settings ////

//// Include Language ////
include('../../assets/languages/language_switch.php');

if ($_SESSION['language']=='AR')
{
include ('../../assets/languages/arabic.php');
}

if ($_SESSION['language']=='EN')
{
include ('../../assets/languages/english.php');
}
//// End Language ////

///// Include the settings table ////
mysqli_select_db($website,$database_website );
$query_settings = "SELECT * FROM settings WHERE settings_id='1'";
$settings = mysqli_query($website ,$query_settings) or die(mysqli_error($website));
$row_settings = mysqli_fetch_assoc($settings);
//// End of include the settings table ///

////////////////////////
///// PAGE SETTINGS ////
////////////////////////

/// enable top bar //// 1    or    0
$enable_top_bar='0';
////
?>

<!DOCTYPE html>
<html lang="en">
	
	<head>
		<?php
		//// Include Header Scripts ////
		include ('../../assets/header.php');
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
		data-background="assets/images/_smarty/boxed_background/1.jpg"
	-->
	<body class="<?php echo $bodyClass; ?>" data-background="<?php echo $server; ?>control_panel/<?php echo $bgForBoxed; ?>">


		<!-- SLIDE TOP -->
		<?php
		//// if system admin , Include  top Bar ///
		include ('../../assets/menus/slide_top.php');
		//// End Top Bar ///
		?>
		<!-- /SLIDE TOP -->


		<!-- wrapper -->
		<div id="wrapper">

			
			<!-- Top Bar -->
			<?php
			if($enable_top_bar=='1')
			{
			?>
			<div id="topBar">
			<?php
			//// Include  top Bar ///
			include('../../assets/menus/top_bar.php');
			//// End Top Bar ///
			?>
			</div>
			<?php
			}
			?>
			<!-- /Top Bar -->


			<!--
				AVAILABLE HEADER CLASSES

				Default nav height: 96px
				.header-md 		= 70px nav height
				.header-sm 		= 60px nav height

				.b-0 		= remove bottom border (only with transparent use)
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

				Example Usage:  class="clearfix sticky header-sm transparent b-0"
			-->

			<?php
  			//// Include  top Bar ///
  		 	include('../../assets/menus/main_menu.php');
  			//// End Top Bar ///
  			?>


<section>
	<div class="container">
		
		
		<header class="text-center margin-bottom-40">
						<h1 class="weight-300 txt-danger size-50" style="font-family: 'Cairo', sans-serif;"><span class="txt-danger">
							
							<?php echo $vSelect.' '.$vLanguage ; ?>
							
							</span></h1>
						<h2 class="weight-300 letter-spacing-1 size-13"><span></span></h2>
					</header>

			<div class="row">

						<div class="col-md-6">

							<div class="box-icon box-icon-center box-icon-round box-icon-transparent box-icon-large box-icon-content">
								<div class="box-icon-title">
									<i class="fa fa-language"></i>
									<a href="../if_selected_english_language/">
									<h1  style="font-family: 'Cairo', sans-serif; color: red"><?php echo $vEnglish ; ?></h1>
									</a>	
								</div>
								<p></p>
							</div>

						</div>

						<div class="col-md-6">

							<div class="box-icon box-icon-center box-icon-round box-icon-transparent box-icon-large box-icon-content">
								<div class="box-icon-title">
									<i class="fa fa-language"></i>
									<a href="../if_selected_russian_language/">
									<h1 style="font-family: 'Cairo', sans-serif; color: red"><?php echo $vRussian; ?></h1>
									</a>	
								</div>
								<p style="font-family: 'Cairo', sans-serif;"><?php echo $vIfSelectRussian; ?></p>
							</div>

						</div>

					</div>
	</div>
			</section>
			

			<!--
				controlls-over		= navigation buttons over the image
				buttons-autohide 	= navigation buttons visible on mouse hover only

				data-plugin-options:
					"singleItem": true
					"autoPlay": true (or ms. eg: 4000)
					"navigation": true
					"pagination": true
			-->
			


			<!-- FOOTER -->
<?php
include ('../../assets/menus/footer.php');
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
include ('../../assets/menus/side_panel.php');
?>
		<!-- /SIDE card -->

<?php
//// footer scripts ////
include ('../../assets/menus/footer_scripts.php');
////
?>
	</body>
</html>
