<?php
//// Include Connection ////
include('admin/assets/connections/index.php');
//// End Connection ////

//// Include Settings ////
include('admin/assets/settings.php');
//// End Settings ////

//// Include Language ////
include('admin/assets/languages/language_switch.php');

if ($_SESSION['language']=='AR')
{
include ('admin/assets/languages/arabic.php');
}

if ($_SESSION['language']=='EN')
{
include ('admin/assets/languages/english.php');
}
//// End Language ////

///// Include the settings table ////
mysqli_select_db($website,$database_website );
$query_settings = "SELECT * FROM settings WHERE settings_id='1'";
$settings = mysqli_query($website ,$query_settings) or die(mysqli_error($website));
$row_settings = mysqli_fetch_assoc($settings);
//// End of include the settings table ///



mysqli_select_db($website,$database_website );
$query_cat = "SELECT * FROM news ";
$cat = mysqli_query($website ,$query_cat) or die(mysqli_error($website));
$row_cat = mysqli_fetch_assoc($cat);
$totalRows_cat = mysqli_num_rows($cat);
//// End Page records ////
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
		include ('admin/assets/header.php');
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
		include ('admin/assets/menus/slide_top.php');
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
			include('admin/assets/menus/top_bar.php');
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
  		 	include('admin/assets/menus/main_menu.php');
  			//// End Top Bar ///
  			?>




			<!-- REVOLUTION SLIDER -->
			<div class="<?php echo $sliderStyle ; ?>">
				<!--
					Navigation Styles:

						data-navigationStyle="" theme default navigation

						data-navigationStyle="preview1"
						data-navigationStyle="preview2"
						data-navigationStyle="preview3"
						data-navigationStyle="preview4"

					Bottom Shadows
						data-shadow="1"
						data-shadow="2"
						data-shadow="3"

					Slider Height (do not use on fullscreen mode)
						data-height="300"
						data-height="350"
						data-height="400"
						data-height="450"
						data-height="500"
						data-height="550"
						data-height="600"
						data-height="650"
						data-height="700"
						data-height="750"
						data-height="800"
				-->
				<div class="fullwidthbanner" data-height="600" data-shadow="0" data-navigationStyle="preview2">
					<ul class="hide">

						<!-- SLIDE  -->

						<!-- SLIDE  -->
						<li data-transition="random" data-slotamount="1" data-masterspeed="1000" data-saveperformance="off" data-title="Slide 2">

							<img src="<?php echo $server; ?>admin/assets/images/1x1.png" data-lazyload="<?php echo $server; ?>admin/images/slide_1.jpg" alt="" data-bgfit="cover" data-bgposition="center bottom" data-bgrepeat="no-repeat" />

							<div class="overlay dark-1"><!-- dark overlay [1 to 9 opacity] --></div>

							<div class="tp-caption customin ltl tp-resizeme text_white"
								data-x="center"
								data-y="155"
								data-customin="x:0;y:150;z:0;rotationZ:0;scaleX:1;scaleY:1;skewX:0;skewY:0;opacity:0;transformPerspective:200;transformOrigin:50% 0%;"
								data-speed="800"
								data-start="1000"
								data-easing="easeOutQuad"
								data-splitin="none"
								data-splitout="none"
								data-elementdelay="0.01"
								data-endelementdelay="0.1"
								data-endspeed="1000"
								data-endeasing="Power4.easeIn" style="z-index: 10;">
								<span class="weight-300" style="font-family: 'Cairo', sans-serif;"><?php echo $vSliderLine1; ?></span>
							</div>

							<div class="tp-caption customin ltl tp-resizeme large_bold_white"
								data-x="center"
								data-y="205"
								data-customin="x:0;y:150;z:0;rotationZ:0;scaleX:1;scaleY:1;skewX:0;skewY:0;opacity:0;transformPerspective:200;transformOrigin:50% 0%;"
								data-speed="800"
								data-start="1200"
								data-easing="easeOutQuad"
								data-splitin="none"
								data-splitout="none"
								data-elementdelay="0.01"
								data-endelementdelay="0.1"
								data-endspeed="1000"
								data-endeasing="Power4.easeIn" style="z-index: 10;" style="font-family: 'Cairo', sans-serif;">
<span class="weight-300" style="font-family: 'Cairo', sans-serif;">
							<?php echo $vSliderLine2; ?>
						</span>
							</div>

							<div class="tp-caption customin ltl tp-resizeme small_light_white font-lato"
								data-x="center"
								data-y="295"
								data-customin="x:0;y:150;z:0;rotationZ:0;scaleX:1;scaleY:1;skewX:0;skewY:0;opacity:0;transformPerspective:200;transformOrigin:50% 0%;"
								data-speed="800"
								data-start="1400"
								data-easing="easeOutQuad"
								data-splitin="none"
								data-splitout="none"
								data-elementdelay="0.01"
								data-endelementdelay="0.1"
								data-endspeed="1000"
								data-endeasing="Power4.easeIn" style="z-index: 10; width: 100%; max-width: 750px; white-space: normal; text-align:center; font-size:20px; font-family: 'Cairo', sans-serif;">
<span class="weight-300" style="font-family: 'Cairo', sans-serif;">
									<?php
									echo $vSliderLine3;
									 ?>
</span>
									</div>

							<div class="tp-caption customin ltl tp-resizeme"
								data-x="center"
								data-y="383"
								data-customin="x:0;y:150;z:0;rotationZ:0;scaleX:1;scaleY:1;skewX:0;skewY:0;opacity:0;transformPerspective:200;transformOrigin:50% 0%;"
								data-speed="800"
								data-start="1550"
								data-easing="easeOutQuad"
								data-splitin="none"
								data-splitout="none"
								data-elementdelay="0.01"
								data-endelementdelay="0.1"
								data-endspeed="1000"
								data-endeasing="Power4.easeIn" style="z-index: 10;">
								<a href="admin/system/select_language/" class="btn btn-blue btn-lg">
									<span style="font-family: 'Cairo', sans-serif;"><?php echo $vSliderLine4 ; ?></span>
								</a>
							</div>

						</li>

						<!-- SLIDE  -->

						<!-- SLIDE  -->

						<!-- SLIDE  -->

						<!-- SLIDE -->

					</ul>

					<div class="tp-bannertimer"><!-- progress bar --></div>
				</div>
			</div>
			<!-- /REVOLUTION SLIDER -->


			<!-- WELCOME -->
			<section class="nopadding-bottom  ">
				<div class="container">
					<header class="text-center margin-bottom-40">
						<h1 class="weight-300 txt-danger size-50" style="font-family: 'Cairo', sans-serif;"><span class="txt-danger"><?php echo $vWhoWeAre; ?> ... <?php if($_SESSION['language']=='AR') { echo $applicatioNameAr ; } else { echo $applicatioNameEn ; } ?></span></h1>
						<h2 class="weight-300 letter-spacing-1 size-13" ><span></span></h2>
					</header>

					<div class="text-center">
						<p class="lead" style="font-family: 'Cairo', sans-serif;">
<?php if($_SESSION['language']=='AR')
{
	echo $row_settings['about_ar'];
}
?>

<?php if($_SESSION['language']=='EN')
{
	echo $row_settings['about_en'];
}
?>
						</p>
<br><br>
						<div class="margin-top-40" style="display:none">
							<img class="img-responsive" src="<?php echo $server; ?>admin/images/russia_1.jpg" alt="welcome" />
						</div>

					</div>
				</div>
			</section>
			<!-- /WELCOME -->

			<section class="parallax parallax-2" style="background-image: url(&quot;admin/images/russia_1.jpg&quot;); background-position: 50% 126px;">
							<div class="overlay dark-8"><!-- dark overlay [1 to 9 opacity] --></div>

							<div class="container">

								<div class="text-center">
									<h3 class="nomargin" style="font-family: 'Cairo', sans-serif;"><?php echo $vWhyRussia; ?></h3>
									<p class=" weight-300 lead nomargin-top" style="font-family: 'Cairo', sans-serif;"><?php echo $vWhyRussia2; ?></p>
								</div>

								<ul class="margin-top-80 social-icons list-unstyled list-inline">
									<li>
										<a target="_blank" href="admin/system/why_study_in_russia/">
											<i class="fa fa-book-reader"></i>
											<h4 style="font-family: 'Cairo', sans-serif;"><?php echo $vWhyStudyInRussia; ?></h4>
											<span></span>
										</a>
									</li>
									
									
									<li>
										<a target="_blank" href="admin/system/why_russia/">
											<i class="fa fa-heart"></i>
											<h4 style="font-family: 'Cairo', sans-serif;"><?php echo $vWhyRussia; ?></h4>
											<span></span>
										</a>
									</li>

									<li>
										<a target="_blank" href="admin/system/living_cost/">
											<i class="fa fa-building"></i>
											<h4 style="font-family: 'Cairo', sans-serif;"><?php echo $vLivingCost; ?></h4>
											<span></span>
										</a>
									</li>


									<li>
										<a target="_blank" href="admin/system/visa_requirements/index.php">
											<i class="fa fa-award"></i>
											<h4 style="font-family: 'Cairo', sans-serif;"><?php echo $vVisaRequirements; ?></h4>
											<span></span>
										</a>
									</li>


									<li>
										<a target="_blank" href="admin/system/study_requirements/">
											<i class="fa fa-graduation-cap"></i>
											<h4 style="font-family: 'Cairo', sans-serif;"><?php echo $vStudyRequirements; ?></h4>
											<span></span>
										</a>
									</li>


								</ul>

							</div>

						</section>





			<!-- RECENT NEWS -->
			<section>
				<div class="container">

					<header class="text-center margin-bottom-60">
						<h1 class="weight-300 size-70 " style="font-family: 'Cairo', sans-serif;"><span class="txt-danger"><?php echo $vRecentNews; ?></span></h1>
						<h2 class="weight-300 letter-spacing-1 size-13"><span></span></h2>
					</header>

					<!--
						controlls-over		= navigation buttons over the image
						buttons-autohide 	= navigation buttons visible on mouse hover only

						data-plugin-options:
							"singleItem": true
							"autoPlay": true (or ms. eg: 4000)
							"navigation": true
							"pagination": true
							"items": "4"

						owl-carousel item paddings
							.owl-padding-0
							.owl-padding-3
							.owl-padding-6
							.owl-padding-10
							.owl-padding-15
							.owl-padding-20
					-->
					<div class="owl-carousel owl-padding-10 buttons-autohide controlls-over" data-plugin-options='{"singleItem": false, "items":"4", "autoPlay": 4000, "navigation": true, "pagination": false}'>
						
					
						
						
						<div class="img-hover">
							<a href="blog-single-default.html">
								<img class="img-responsive" src="<?php echo $server; ?>control_panel/assets/images/demo/451x300/30-min.jpg" alt="">
							</a>

							<h4 class="text-left margin-top-20"><a href="blog-single-default.html">Lorem Ipsum Dolor</a></h4>
							<p class="text-left">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cupiditate, asperiores quod est tenetur in.</p>
							<ul class="text-left size-12 list-inline list-separator">
								<li>
									<i class="fa fa-calendar"></i>
									29th Jan 2015
								</li>
								<li>
									<a href="blog-single-default.html#comments">
										<i class="fa fa-comments"></i>
										3
									</a>
								</li>
							</ul>
						</div>
						
						
					</div>

				</div>
			</section>

			<!-- /RECENT NEWS -->
			<div class="alert alert-default bordered-bottom text-center m-0">
							<div class="container">

								<h4 class="fs-15" style="font-family: 'Cairo', sans-serif;"><?php echo $vGetOurNews1; ?></h4>
								<h3 class="fs-20" style="font-family: 'Cairo', sans-serif;"><?php echo $vGetOurNews2; ?></h3>


								<form class="mt-30 wow fadeIn animated" method="post" action="#" style="visibility: visible; animation-name: fadeIn;">
									<input required="" class="form-control text-center p-15 fs-20" name="email" placeholder="TYPE YOUR EMAIL" type="email">
									<button class="btn btn-lg btn-block p-20 fs-16 bg-blue text-white mt-10" type="submit"><?php echo $vSubscribe; ?>!</button>
								</form>


							</div>
						</div>



			<!--
				controlls-over		= navigation buttons over the image
				buttons-autohide 	= navigation buttons visible on mouse hover only

				data-plugin-options:
					"singleItem": true
					"autoPlay": true (or ms. eg: 4000)
					"navigation": true
					"pagination": true
			-->
			<div class="text-center mt-30 mb-30">
				<div class="owl-carousel m-0" data-plugin-options='{"items":6, "singleItem": false, "autoPlay": true}'>
					<div>
						<img class="img-fluid" src="demo_files/images/brands/1.jpg" alt="">
					</div>
					<div>
						<img class="img-fluid" src="demo_files/images/brands/2.jpg" alt="">
					</div>
					<div>
						<img class="img-fluid" src="demo_files/images/brands/3.jpg" alt="">
					</div>
					<div>
						<img class="img-fluid" src="demo_files/images/brands/4.jpg" alt="">
					</div>
					<div>
						<img class="img-fluid" src="demo_files/images/brands/5.jpg" alt="">
					</div>
					<div>
						<img class="img-fluid" src="demo_files/images/brands/6.jpg" alt="">
					</div>
					<div>
						<img class="img-fluid" src="demo_files/images/brands/7.jpg" alt="">
					</div>
					<div>
						<img class="img-fluid" src="demo_files/images/brands/8.jpg" alt="">
					</div>
				</div>
			</div>


			<!-- FOOTER -->
			
			
			
			
<?php
include ('admin/assets/menus/footer.php');
?>
			<!-- /FOOTER -->
			
			<!-- Modal Video -->
			
			<div id="shopLoadModal" class="modal " data-autoload="true" data-autoload-delay="4000">
				<div class="modal-dialog modal-full_" style="width: 100%; margin-top: 200px">
					
					
					
					<div class="modal-content" style="background-image:url('8admin/assets/smarty_files/assets/images/_smarty/misc/shop/shop_modal.jpg'); width: 560px">

					<div class="modal-header b-0 p-15">
							<button type="button" class=" pt-5" data-dismiss="modal"><span style="font-family: 'Cairo', sans-serif; color: red; font-size: 24px"><?php echo $vStudyInRussia; ?></span></button>
						</div>
						

						<!-- body modal -->
						
								<iframe width="560" height="315" src="https://www.youtube.com/embed/o8YvT5dbIuw" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
								<!-- /Don't show this popup again -->

							

					</div>
				</div>
			</div>
			
			<!-- End of Modal Video -->
			
			

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
include ('admin/assets/menus/side_panel.php');
?>
		<!-- /SIDE card -->

<?php
//// footer scripts ////
include ('admin/assets/menus/footer_scripts.php');
////
?>
	</body>
</html>
