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


//// Start Page records ////

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
$enable_top_bar='1';
////


/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////// Start Preparation ////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
$table='news';
$id_field='news_id';
$main_page_link='admin/system/news/';

/// dont change this ////
$id=$_GET['id'];

$view_table='SELECT * FROM '.$table.'  ORDER BY news_id DESC';

//// update select record and thumb , current ////
$edit_record='SELECT * FROM '.$table.' WHERE '.$id_field.'="'.$id.'"';

//// arabic update ////
$update_ar='UPDATE '.$table.' SET
news_title_ar="'.$_POST['title'].'"
WHERE '.$id_field.'="'.$id.'"';


//// english update ////
$update_en='UPDATE '.$table.' SET
news_title_en="'.$_POST['title'].'"
WHERE '.$id_field.'="'.$id.'"';



//// arabic insert ////
$insert_ar='INSERT INTO '.$table.'
(news_title_ar ,  news_thumb)
VALUES
(
"'.$_POST['title'].'",
"'.$image_name.'"
)';


//// englis insert ////
$insert_en='INSERT INTO '.$table.'
(news_title_en ,  news_thumb )
VALUES
(
"'.$_POST['title'].'",
"'.$image_name.'"
)';




//// delete //// ok done
$delete_record='DELETE FROM '.$table.' WHERE '.$id_field.'="'.$id.'"';

//// redirect link after add or edit or update thumb or delete ////
$redirect="index.php";



/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////// End Preparation //////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

///// table for view ////
mysqli_select_db($website,$database_website );
$query_articles = $view_table;
$articles = mysqli_query($website ,$query_articles) or die(mysqli_error($website));
$row_articles = mysqli_fetch_assoc($articles);
$totalRows_articles = mysqli_num_rows($articles);
//// end table for view /////


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





				<section class="<?php echo $pageHeaderStyle; ?>" style="background-image: url(&quot;../../images/google.png&quot;); background-position: 100% 0px;" >
							<div class="overlay dark-"><!-- dark overlay [1 to 9 opacity] --></div>

							<div class="container <?php if($_SESSION['language']=='AR') { ?>  text-right <?php } ?>">

								<h1 style="font-family: 'Cairo', sans-serif;"><?php echo $vNews; ?></h1>

								<!-- breadcrumbs -->
								<ol class="breadcrumb">
									<li><a href="<?php echo $server; ?><?php echo $main_page_link; ?>" style="font-family: 'Cairo', sans-serif;"><?php echo $vNews ; ?></a></li>
								
								</ol><!-- /breadcrumbs -->

							</div>
						</section>
			
			
			
			
			

<!------------------------------------------------------------------------------------------------------------------------->
<!------------------------------------------------------------------------------------------------------------------------->
<!------------------------------------------------------------------------------------------------------------------------->
<!------------------------------------------------------------------------------------------------------------------------->
<!--------------------------------------------------  START PAGE CONTENTS  ----------------------------------------=------->
<!----------------------------------------------------------------------------------------------------------------=-------->
<!------------------------------------------------------------------------------------------------------------------------->
<!------------------------------------------------------------------------------------------------------------------------->
<!------------------------------------------------------------------------------------------------------------------------->


<!------------------------------------------------------------------------------------------------------------------------->
<!--------------------------------------------------- Start Add Script  --------------------------------------------------->
<!------------------------------------------------------------------------------------------------------------------------->
	<?php if(isset($_GET['add'])) { ?>
			
			
			
							<div class="container">
								<br>
							
							</div>
			
			
			
			
			
			
			
		
		
		
		<form class="m-0 sky-form" action="" target="_self" method="post" enctype="multipart/form-data" style="font-family: 'Cairo', sans-serif;">
		
			
			
		<input type="hidden" name="action" value="add_article">
									
			
		<div class="box-static box-transparent box-bordered p-30" style="margin: 40px; background-color: whitesmoke ">

								<div class="box-title mb-10" >
									<h2 class="fs-20" style="color: white; font-family: 'Cairo', sans-serif; color: black"><?php echo $vAdd; ?></h2>
								</div>

								
									<fieldset style="padding: 0px">

										<div class="row">

											<div class="col-md-12 col-sm-12">
												<label><?php echo $vTitle ; ?> *</label>
												<label class="input mb-10">
													<i class="ico-append fa fa-user"></i>
													<input required="" type="text" style="font-family: 'Cairo', sans-serif;" name="title">
													<b class="tooltip tooltip-bottom-right"><?php echo $vTitle ; ?></b>
												</label>
											</div>

											

										</div>

										
										


									

										<!-- required [php action request] -->

										<input type="hidden" name="id" value="<?php echo $_GET['id']; ?>">

										<input type="hidden" name="title2" value="2">





									

										<div class="row">

											<div class="form-group">

												<div class="col-md-12">

													
													</label>



													<!-- custom file upload -->

													<div class="fancy-file-upload fancy-file-primary">

														<i class="fa fa-upload"></i>


														<input name="image2" type="file" class="" />


														<span class="button" style="font-family: 'Cairo', sans-serif;"><?php echo $vSelect ; ?></span>

													</div>

													<small class="text-muted block">Max file size: 10Mb (zip/pdf/jpg/png)</small>



												</div>

											</div>

										</div>




										


									</fieldset>

									<div class="row">
										
										<div class="col-md-12">

											<button type="submit" class="btn btn-3d btn-danger btn-block margin-top-30" style="font-family: 'Cairo', sans-serif;">

												<?php echo $vSubmit ; ?>

											</button>

										</div>
										
										
									</div>

								
								
							</div>
			</form>
							<?php

//// upload photo ///
////
if(isset($_POST['title'])) {
//define a maxim size for the uploaded images in Kb
define ("MAX_SIZE","2000000");

$var1='Hany';
//This function reads the extension of the file. It is used to determine if the file is an image by checking the extension.
function getExtension($str) {
$i = strrpos($str,".");
if (!$i) { return ""; }
$l = strlen($str) - $i;
$ext = substr($str,$i+1,$l);
return $ext;
}


//This variable is used as a flag. The value is initialized with 0 (meaning no error found) and it will be changed to 1 if an errro occures. If the error occures the file will not be uploaded.
$errors=0;
//checks if the form has been submitted
if(isset($_POST['title']))
{
//reads the name of the file the user submitted for uploading
$image=$_FILES['image']['name'];
//if it is not empty
if ($image)
{

//get the original name of the file from the clients machine
$filename = stripslashes($_FILES['image']['name']);
//get the extension of the file in a lower case format
$extension = getExtension($filename);
$extension = strtolower($extension);
//if it is not a known extension, we will suppose it is an error and will not upload the file, otherwize we will do more tests
if (($extension != "jpg") && ($extension != "jpeg") && ($extension != "png") && ($extension != "gif"))
{
//print error message
echo 'Unknown extension!';
$errors=1;
}
else
{
//get the size of the image in bytes
//$_FILES['image']['tmp_name'] is the temporary filename of the file in which the uploaded file was stored on the server
$size=filesize($_FILES['image']['tmp_name']);

//compare the size with the maxim size we defined and print error if bigger
if ($size > MAX_SIZE*2024)
{
echo 'You have exceeded the size limit!';
$errors=1;
}

//we will give an unique name, for example the time in unix time format
$image_name=time().'.'.$extension;
//the new name will be containing the full path where will be stored (images folder)



$newname="../../uploads/images/".$image_name;
//we verify if the image has been uploaded, and print error instead
$copied = copy($_FILES['image']['tmp_name'], $newname);
if (!$copied)
{
echo 'Copy unsuccessfull!';
$errors=1;
}}}}

//If no errors registred, print the success message
if(isset($_POST['title']) && !$errors)
{
	?>

<?php

if ((isset($_POST["title"])) && ($_POST["title"] <> "")) {

if($_SESSION['language']=='EN')
{
$sql=$insert_en;	
}
	
if($_SESSION['language']=='AR')
{
$sql=$insert_ar;		
}
$result = mysqli_query($website,$sql);
}

	   
		
?>
	
 <script type="text/javascript">
           window.location = "<?php echo $redirect; ?>"
      </script>
<?php

}

}
?>
<?php } ?>
<!------------------------------------------------------------------------------------------------------------------------->
<!--------------------------------------------------- End Add Script  --------------------------------------------------->
<!------------------------------------------------------------------------------------------------------------------------->
			

<!------------------------------------------------------------------------------------------------------------------------->
<!--------------------------------------------------- Start Edit Script  --------------------------------------------------->
<!------------------------------------------------------------------------------------------------------------------------->
	


					
<?php if(isset($_GET['edit'])) {


mysqli_select_db($website,$database_website );
$id=$_GET['id'];
$query_articles2=$edit_record;	
$articles2 = mysqli_query($website ,$query_articles2) or die(mysqli_error($website));
$row_articles2 = mysqli_fetch_assoc($articles2);
$totalRows_articles2 = mysqli_num_rows($articles2);

?>
		
		
		<form class="m-0 sky-form" action="" target="_self" method="post" enctype="multipart/form-data" style="font-family: 'Cairo', sans-serif;">
		
			<input type="hidden" name="id" value="<?php echo $_GET['id']; ?>">

									
			
		<input type="hidden" name="action" value="edit">
									
			
		<div class="box-static box-transparent box-bordered p-30" style="margin: 40px; background-color: whitesmoke ">

								<div class="box-title mb-10" >
									<h2 class="fs-20" style="color: white; font-family: 'Cairo', sans-serif; color: black"><?php echo $vAdd; ?></h2>
								</div>

								
									<fieldset style="padding: 0px">

										<div class="row">

											<div class="col-md-12 col-sm-12">
												<label><?php echo $vTitle ; ?> *</label>
												<label class="input mb-10">
													<i class="ico-append fa fa-user"></i>
													<input required="" type="text" style="font-family: 'Cairo', sans-serif;" name="title" value="<?php 
													if($_SESSION['language']=='EN') 
													{
													echo $row_articles2['news_title_en']; 
													}
	
													if($_SESSION['language']=='AR') 
													{
													echo $row_articles2['news_title_ar']; 
													}
													?>">
													<b class="tooltip tooltip-bottom-right"><?php echo $vTitle ; ?></b>
												</label>
											</div>

											

										</div>

										
										


									

										<!-- required [php action request] -->

										<input type="hidden" name="id" value="<?php echo $_GET['id']; ?>">

										<input type="hidden" name="title2" value="2">





									

										




										


									</fieldset>

									<div class="row">
										
										<div class="col-md-12">

											<button type="submit" class="btn btn-3d btn-danger btn-block margin-top-30" style="font-family: 'Cairo', sans-serif;">

												<?php echo $vSubmit ; ?>

											</button>

										</div>
										
										
									</div>

								
								
							</div>
			</form>

<?php

	if ((isset($_POST["title"])) && ($_POST["title"] <> "")) {

	
if($_SESSION['language']=='EN')
{
$sql=$update_en;	
}
		
if($_SESSION['language']=='AR')
{
$sql=$update_ar;	
}		
		
$result = mysqli_query($website,$sql);

?>
	
 <script type="text/javascript">
           window.location = "<?php echo $redirect; ?>"
      </script>
<?php
		
}

}
?>
		
<!------------------------------------------------------------------------------------------------------------------------->
<!--------------------------------------------------- End Edit Script  ---------------------------------------------------->
<!------------------------------------------------------------------------------------------------------------------------->
			
		

<!------------------------------------------------------------------------------------------------------------------------->
<!--------------------------------------------------- Start Update Thumb Script  ------------------------------------------>
<!------------------------------------------------------------------------------------------------------------------------->
<?php if(isset($_GET['update_thumb'])) {


mysqli_select_db($website,$database_website );
	
$query_articles2 = $edit_record;
$articles2 = mysqli_query($website ,$query_articles2) or die(mysqli_error($website));
$row_articles2 = mysqli_fetch_assoc($articles2);
$totalRows_articles2 = mysqli_num_rows($articles2);


							?>
			<div class="container">
				<br>
							
			
				
				<form method="post" target="_self" action="" id="form1" class="form" enctype="multipart/form-data" data-success="Sent! Thank you!" data-toastr-position="top-right" style="margin-bottom: 0px">

			
			
			<div class="card card-default" dir="rtl">
							<div class="card-heading card-heading-transparent">
								<h2 class="card-title bold <?php if($_SESSION['language']=='AR') { ?> text-right <?php } ?>" style="font-family: 'Cairo', sans-serif;"><?php echo $vUpdateThumb ; ?></h2>
							</div>

							<div class="card-block">

								
							
									<fieldset style="margin-bottom: 0px">

										<!-- required [php action request] -->

										<input type="hidden" name="id" value="<?php echo $_GET['id']; ?>">

										<input type="hidden" name="title2" value="2">





									

										<div class="row">

											<div class="form-group">

												<div class="col-md-12">

													
													</label>



													<!-- custom file upload -->

													<div class="fancy-file-upload fancy-file-primary">

														<i class="fa fa-upload"></i>


														<input name="image2" type="file" class="" />


														<span class="button" style="font-family: 'Cairo', sans-serif;"><?php echo $vSelect ; ?></span>

													</div>

													<small class="text-muted block">Max file size: 10Mb (zip/pdf/jpg/png)</small>



												</div>

											</div>

										</div>




										


									</fieldset>



									

								

							</div>

							<div class="card-footer">
	
								
								<div class="col-md-12">

											<button type="submit" class="btn btn-3d btn-danger btn-block margin-top-30" style="font-family: 'Cairo', sans-serif;">

												<?php echo $vSubmit ; ?>

											</button>

										</div>
								
								
							</div>
						</div>
			
			</form>
			
			
			</div>
							<?php



	//// upload photo ///
////
if(isset($_POST['title2'])) {
//define a maxim size for the uploaded images in Kb
define ("MAX_SIZE","2000000");

$var1='Hany';
//This function reads the extension of the file. It is used to determine if the file is an image by checking the extension.
function getExtension($str) {
$i = strrpos($str,".");
if (!$i) { return ""; }
$l = strlen($str) - $i;
$ext = substr($str,$i+1,$l);
return $ext;
}


//This variable is used as a flag. The value is initialized with 0 (meaning no error found) and it will be changed to 1 if an errro occures. If the error occures the file will not be uploaded.
$errors=0;
//checks if the form has been submitted
if(isset($_POST['title2']))
{
//reads the name of the file the user submitted for uploading
$image=$_FILES['image2']['name'];
//if it is not empty
if ($image)
{

//get the original name of the file from the clients machine
$filename = stripslashes($_FILES['image2']['name']);
//get the extension of the file in a lower case format
$extension = getExtension($filename);
$extension = strtolower($extension);
//if it is not a known extension, we will suppose it is an error and will not upload the file, otherwize we will do more tests
if (($extension != "jpg") && ($extension != "jpeg") && ($extension != "png") && ($extension != "gif"))
{
//print error message
echo 'Unknown extension!';
$errors=1;
}
else
{
//get the size of the image in bytes
//$_FILES['image']['tmp_name'] is the temporary filename of the file in which the uploaded file was stored on the server
$size=filesize($_FILES['image2']['tmp_name']);

//compare the size with the maxim size we defined and print error if bigger
if ($size > MAX_SIZE*2024)
{
echo 'You have exceeded the size limit!';
$errors=1;
}

//we will give an unique name, for example the time in unix time format
$image_name=time().'.'.$extension;
//the new name will be containing the full path where will be stored (images folder)



$newname="../../uploads/images/".$image_name;
//we verify if the image has been uploaded, and print error instead
$copied = copy($_FILES['image2']['tmp_name'], $newname);
if (!$copied)
{
echo 'Copy unsuccessfull!';
$errors=1;
}}}}

//If no errors registred, print the success message
if(isset($_POST['title2']) && !$errors)
{
	?>
<div class="alert alert-success margin-bottom-30"><!-- SUCCESS -->
								<button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
								<strong>Well done!</strong> You successfully added article.
							</div>
<?php

if ((isset($_POST["title2"])) && ($_POST["title2"] <> "")) {


	$sql = "UPDATE news SET news_thumb='".$image_name."' WHERE news_id='".$_POST["id"]."'";

    $result = mysqli_query($website,$sql);



}

		
?>
	
 <script type="text/javascript">
           window.location = "<?php echo $redirect; ?>"
      </script>
<?php

}


}




///

	?>
<?php } ?>			
<!------------------------------------------------------------------------------------------------------------------------->
<!--------------------------------------------------- End Update Thumb Script  -------------------------------------------->
<!------------------------------------------------------------------------------------------------------------------------->
			
		
		
		
			
			
<!------------------------------------------------------------------------------------------------------------------------->
<!--------------------------------------------------- Start Delete Script  ------------------------------------------------>
<!------------------------------------------------------------------------------------------------------------------------->
<?php			
if($_GET['delete']=='1')
{
$id=$_GET['id'];	
$sql = $delete_record;
$result = mysqli_query($website,$sql);	
  	
	
			
?>
	
 <script type="text/javascript">
           window.location = "<?php echo $redirect; ?>"
      </script>
<?php
	
}
?>			
<!------------------------------------------------------------------------------------------------------------------------->
<!--------------------------------------------------- End Delete Script  -------------------------------------------------->
<!------------------------------------------------------------------------------------------------------------------------->
			
			
			
		
<!------------------------------------------------------------------------------------------------------------------------->
<!--------------------------------------------------- Start  Table Script  ------------------------------------------------>
<!------------------------------------------------------------------------------------------------------------------------->
<?php if(!isset($_GET['add']) && !isset($_GET['edit']) && !isset($_GET['update_thumb']))	 { ?>		
<div class="table-responsive" style="margin-top: 0px">
	
						<table class="<?php echo $tableStyle; ?>" style="font-family: 'Cairo', sans-serif;">
							
							
							<thead>
								<tr>
									
									<th class="text-blue">
										<?php echo $vTitle ; ?>
									</th>
									
									<th class="width-60 <?php if($_SESSION['language']=='EN') { ?> text-right <?php } else  { ?> text-left<?php } ?>">
										<a style="color: dodgerblue" href="?add=1" class="fa fa-plus fa-2x margin-top-6" data-toggle="tooltip" data-placement="top" title="" data-original-title="<?php echo $vAdd; ?> "></a>
									</th>
									
								</tr>
							</thead>
							
							
							<tbody>
								<?php do { 
								if(isset($row_articles['news_id'])) {
								?>
								<tr>
									
									<td style="padding-top: 0px; padding-bottom: 0px"><?php 
										if($_SESSION['language']=='EN')
										{
										echo $row_articles['news_title_en']; 
										}
										 
										if($_SESSION['language']=='AR')
										{
										echo $row_articles['news_title_ar']; 
										}
										?>
									</td>

									<td style="padding-top: 0px; padding-bottom: 0px">
										<ul class="list-inline nomargin size-12 <?php if($_SESSION['language']=='EN') { ?> text-right <?php } else  { ?> text-left<?php } ?>">

											<li><a style="color: dodgerblue" href="?edit=1&id=<?php echo $row_articles['news_id']; ?>" class="fa fa-edit  margin-top-6  " data-toggle="tooltip" data-placement="top" title="" data-original-title="<?php echo $vEdit; ?>"></a></li>


											<li><a style="color: dodgerblue" href="?update_thumb=1&id=<?php echo $row_articles['news_id']; ?>" class="fa fa-image   margin-top-6" data-toggle="tooltip" data-placement="top" title="" data-original-title="<?php echo $vUpdateThumb; ?>"></a></li>

											
											
											<?php if(isset($row_articles['news_thumb']) && $row_articles['news_thumb']<>"") { ?>
											<li><a  style="color: dodgerblue" target="_blank" href="../../uploads/images/<?php echo $row_articles['news_thumb']; ?>" class="fa fa-eye  margin-top-6 " data-toggle="tooltip" data-placement="top" title="" data-original-title="<?php echo $vPhoto; ?>"></a></li>
											<?php } ?>
											
											&nbsp &nbsp 
											
											<li><a onclick="return confirm('<?php echo $vDeleteMessage; ?>')" style="color: darkred" href="?delete=1&id=<?php echo $row_articles['news_id']; ?>" class="fa fa-trash  margin-top-6 " data-toggle="tooltip" data-placement="top" title="" data-original-title="<?php echo $vDelete; ?>"></a></li>
											
											

										</ul>
									</td>
									
								</tr>

    							<?php
								}
								} while ($row_articles = mysqli_fetch_assoc($articles)); ?>

									</tbody>
						</table>
					</div>
<?php } ?>
<!------------------------------------------------------------------------------------------------------------------------->
<!--------------------------------------------------- END  Table Script  -------------------------------------------------->
<!------------------------------------------------------------------------------------------------------------------------->

		


<!------------------------------------------------------------------------------------------------------------------------->
<!------------------------------------------------------------------------------------------------------------------------->
<!------------------------------------------------------------------------------------------------------------------------->
<!------------------------------------------------------------------------------------------------------------------------->
<!--------------------------------------------------  END PAGE CONTENTS  -------------------------------------------------->
<!------------------------------------------------------------------------------------------------------------------------->
<!------------------------------------------------------------------------------------------------------------------------->
<!------------------------------------------------------------------------------------------------------------------------->
<!------------------------------------------------------------------------------------------------------------------------->

			
			
			<!-- FOOTER -->
<?php
//include ('../../assets/menus/footer.php');
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
