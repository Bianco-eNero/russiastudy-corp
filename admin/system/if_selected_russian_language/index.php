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


///// table for view ////
$table='prep_university';
$view_table='SELECT * FROM '.$table.'  ORDER BY prep_university_price DESC';


mysqli_select_db($website,$database_website );
$query_articles = $view_table;
$articles = mysqli_query($website ,$query_articles) or die(mysqli_error($website));
$row_articles = mysqli_fetch_assoc($articles);
$totalRows_articles = mysqli_num_rows($articles);
//// end table for view /////

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
							
							<?php echo $vSelect.' '.$vPreparationProgram ; ?>
							
							</span></h1>
						<h5 class="weight-300 letter-spacing-1 size-8"><span style="font-family: 'Cairo', sans-serif;"><?php echo $vSelectMin2 ; ?></span></h5>
					</header>

			<div class="row">

						
				<div class="table-responsive">
						<table class="table table-bordered table-vertical-middle" style="font-family: 'Cairo', sans-serif;">
							<thead>
								<tr>
									<th class="fw-60"></th>
									<th><?php echo $vUniverisity; ?></th>
									<th><?php echo $vDescription; ?></th>
									
									<th style="width: 50px"></th>
								</tr>
							</thead>
							<tbody>
								
								<?php do { ?>
								
								<tr>
									<td style="width: 100px" class="tsext-center"><img src="../../uploads/images/<?php echo $row_articles['prep_university_thumb']; ?>" alt="" width="250"></td>
									<td style="width: 120px" ><?php 
										  if($_SESSION['language']=='EN') { 
										  echo $row_articles['prep_university_name_en']; 
										  }
										  
										  if($_SESSION['language']=='AR') { 
										  echo $row_articles['prep_university_name_ar']; 
										  }
										?></td>
									
									<td>
										
										<?php 
										  if($_SESSION['language']=='EN') { 
										  echo $row_articles['prep_university_desc_en']; 
										  }
										  
										  if($_SESSION['language']=='AR') { 
										  echo $row_articles['prep_university_desc_ar']; 
										  }
										?>
										
									</td>
									
									<td style="width: 50px">
										
										<?php if(isset($_GET['first'])) {
											
											if($_GET['first']<>$row_articles['prep_university_id'])
											{
											?>
										<a href="../select_field/?first=<?php  echo $_GET['first'];  ?>&second=<?php  echo $row_articles['prep_university_id'];  ?>">
										<span class="badge badge-success" style="font-family: 'Cairo', sans-serif;"><?php echo $vSelect ; ?></span>
										</a>
										<?php
											}
											else
											{
												?>
										<span class="badge badge-danger" style="font-family: 'Cairo', sans-serif;"><?php echo $vSelected ; ?></span>
										<?php
											}
											
										}
										  else
										  {
										  ?>
										<a href="index.php?first=<?php  echo $row_articles['prep_university_id'];  ?>">
										<span class="badge badge-success" style="font-family: 'Cairo', sans-serif;"><?php echo $vSelect ; ?></span>
										</a>
										<?php
										  }
										  ?>
									</td>
									
									
								</tr>
								<?php } while ($row_articles = mysqli_fetch_assoc($articles)); ?>
								
								
							</tbody>
						</table>
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
