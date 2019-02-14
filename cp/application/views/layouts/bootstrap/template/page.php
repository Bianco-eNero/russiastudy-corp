<section class="page-header">
  <div class="container">
    <h1><?php echo $pageTitle ;?> </h1>
    <!-- breadcrumbs -->
    <ol class="breadcrumb">
      <li><a href="<?php echo site_url();?>"> Home </a></li>
      <li class="active"><?php echo $pageTitle ;?></li>
    </ol><!-- /breadcrumbs -->
  </div>
</section>
<div class="container " style="padding: 30px 0; min-height: 500px;">
  
    <?php echo $html_content ;?>
  
</div>