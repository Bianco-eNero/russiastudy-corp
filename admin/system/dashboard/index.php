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



mysqli_select_db($website,$database_website );
$query_category = "SELECT * FROM page_index ORDER BY page_order ASC";
$category = mysqli_query($website ,$query_category) or die(mysqli_error($website));
$row_category = mysqli_fetch_assoc($category);
$totalRows_articles = mysqli_num_rows($category);

////////////////////////
///// PAGE SETTINGS ////
////////////////////////

/// enable top bar //// 1    or    0
$enable_top_bar='1';
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
		include ('../../assets/menus/slide_top_admin.php');
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




			<!-- REVOLUTION SLIDER -->
		<div id="wrapper">


			
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

			<div id="header" class="<?php echo $headerClass; ?>">

				<!-- TOP NAV -->
				<?php
  			//// Include  top Bar ///
  			include('../../assets/menus/main_menu_control_panel.php');
  			//// End Top Bar ///
  			?>


			</div>





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



			<!-- /PAGE HEADER -->


					<section class="<?php echo $pageHeaderStyle; ?>" style="background-image: url(&quot;../../images/google.png&quot;); background-position: 100% 0px;" >
							<div class="overlay dark-"><!-- dark overlay [1 to 9 opacity] --></div>

							<div class="container <?php if($_SESSION['language']=='AR') { ?>  text-right <?php } ?>">

								<h1 style="font-family: 'Cairo', sans-serif;"><?php echo $vDashboard; ?></h1>

								<!-- breadcrumbs -->
								<ol class="breadcrumb">
									<li><a href="#" style="font-family: 'Cairo', sans-serif;"><?php echo $vDashboard ; ?></a></li>
								
								</ol><!-- /breadcrumbs -->

							</div>
						</section>







<div class="container et-line-icons">
					
					<!-- inline search -->
					<div class="bg-light p-15 b-0" style="font-family: 'Cairo', sans-serif;">
						<input class="form-control" type="text" id="inline-search" placeholder="<?php echo $vSearch ; ?>...">
					</div>
					<!-- /inline search -->


				<ul class="list-unstyled clearfix mt-60">
					
					<?php 
								do {
								?>
					
					
						
								<a href="<?php echo $server; ?>admin/system/<?php echo $row_category['page_link'];?>" style="color: black">
						
					
					<li>
						
						
						
						<i class="<?php echo $row_category['page_icon'] ; ?> <?php 
									if($_SESSION['language']=='EN') { 
									echo $row_category['page_title_en'] ; 
									}
									if($_SESSION['language']=='AR') { 
									echo $row_category['page_title_ar'] ; 
									}
									 ?>"></i>
							
							
						
							
							<span style="font-family: 'Cairo', sans-serif;" >
						
								
					
						<?php 
									if($_SESSION['language']=='EN') { 
									echo $row_category['page_title_en'] ; 
									}
									if($_SESSION['language']=='AR') { 
									echo $row_category['page_title_ar'] ; 
									}
									 ?>
						
						
						</span></li>
						
					</a>
					
					<?php } while ($row_category = mysqli_fetch_assoc($category)); ?>
					
				</ul>





				</div>


		







			<!-- FOOTER -->
			<?php
			//// Include Footer ////
			include('../../assets/menus/footer_control_panel.php');
			//// End Footer ////
			?>
			<!-- /FOOTER -->



		</div>
			<!-- /REVOLUTION SLIDER -->


			

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
		
		
		<script>/* <![CDATA[ */

			/*
				Icon prompt
				<span class="et-line-box"><i class="icon-compass"></i>icon-compass</span>
			*/
			
		
			/* 
				Inline Search 
			*/
			jQuery("#inline-search").keyup(function() {
				var keywords = jQuery.trim(this.value);
				if (keywords == "") {
					_unfilter();
				}
				else {
					_filter(keywords);
				}
			});

			function _filter(keywords) {
				jQuery(".et-line-icons ul li").hide(); 
				jQuery('.et-line-icons ul li i[class*="'+keywords+'"]').parent().show();
			}

			function _unfilter() {
				jQuery(".et-line-icons ul li").show()
			}

		/* ]]> */</script>
		
		
	</body>
</html>
