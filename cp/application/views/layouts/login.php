<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title> Codeigniter SXIMO</title>
<link rel="shortcut icon" href="<?php echo base_url();?>favicon.ico" type="image/x-icon">
<link rel="stylesheet" href="<?php echo base_url();?>sximo/js/plugins/bootstrap/css/bootstrap.css" type="text/css"  />
<link rel="stylesheet" href="<?php echo base_url();?>sximo/fonts/awesome/css/font-awesome.min.css" type="text/css"  />	
<link rel="stylesheet" href="<?php echo base_url();?>sximo/css/sximo.css" type="text/css"  />
<link rel="stylesheet" href="<?php echo base_url();?>sximo/css/icon.css" type="text/css"  />
<link rel="stylesheet" href="<?php echo base_url();?>sximo/js/plugins/toastr/toastr.css" type="text/css"  />

<script src="<?php echo base_url();?>sximo/js/plugins/jquery.min.js"></script>
<script src="<?php echo base_url();?>sximo/js/plugins/parsley.js"></script>
<script src="<?php echo base_url();?>sximo/js/plugins/bootstrap/js/bootstrap.min.js"></script>
<script src="<?php echo base_url();?>sximo/js/plugins/toastr/toastr.js"></script>

		<!--[if lt IE 9]>
			<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
			<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
		<![endif]-->	

		
	
  	</head>
<body style="background: #e5e9ec " >
    <div class="middle-box  ">
        <div>

           <?php echo $content ;?>
        </div>
    </div>

<script type="text/javascript">
jQuery(document).ready(function ($) {	
	<?php 

	if( $msg = $this->session->flashdata("message")){
	?>  
	  toastr["<?php echo $msg['type'] ?>"]("<?php echo $msg['caption'] ?>","<?php echo $msg['title'] ?>"); 
	<?php 
	}
	?>
});	

</script>

</body> 
</html>
