<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title><?php echo CNF_APPNAME ;?></title>
<link rel="shortcut icon" href="<?php echo base_url('favicon.ico');?>" type="image/x-icon">

		<link rel="stylesheet" href="<?php echo base_url();?>sximo/js/plugins/bootstrap/css/bootstrap.css">
		<!-- Font Awesome -->
		<link rel="stylesheet" href="<?php echo base_url();?>sximo/fonts/awesome/css/font-awesome.min.css" type="text/css"  />
		<!-- Ionicons -->
		<link rel="stylesheet" href="<?php echo base_url();?>sximo/css/icons.min.css" type="text/css"  />
		<!-- Theme style -->
		<link href="<?php echo base_url('sximo/css/sximo.css');?>" rel="stylesheet">
		<script src="<?php echo base_url();?>sximo/js/plugins/jquery.min.js"></script>
		<script src="<?php echo base_url();?>sximo/js/plugins/bootstrap/js/bootstrap.min.js"></script>


		<!--[if lt IE 9]>
			<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
			<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
		<![endif]-->	

	
	
  	</head>

	<body onload="window.print()">
		<?php echo $html ;?>
	
		<script type="text/javascript">
			$(function(){
				$('.sbox-title').hide();
			})
		</script>
	</body>

</html>