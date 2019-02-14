<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title><?php echo  CNF_APPNAME ;?></title>
<link rel="shortcut icon" href="<?php echo base_url();?>favicon.ico" type="image/x-icon">
<link rel="stylesheet" href="<?php echo base_url();?>sximo/js/plugins/bootstrap/css/bootstrap.css" type="text/css"  />	
<link href="http://fonts.googleapis.com/css?family=Lato:300,400,400italic,600,700|Raleway:300,400,500,600,700|Crete+Round:400italic" rel="stylesheet" type="text/css" />

<link href="<?php echo base_url('sximo/css/sximo.css');?>" rel="stylesheet">


<link rel="stylesheet" href="<?php echo base_url();?>sximo/css/icons.min.css" type="text/css"  />
<link media="all" type="text/css" rel="stylesheet" href="<?php echo base_url();?>sximo/js/plugins/select2/select2.css">
<link rel="stylesheet" href="<?php echo base_url();?>sximo/fonts/awesome/css/font-awesome.min.css" type="text/css"  />
<link rel="stylesheet" href="<?php echo base_url();?>sximo/js/plugins/iCheck/skins/square/red.css" type="text/css"  />
<link rel="stylesheet" href="<?php echo base_url();?>sximo/js/plugins/markitup/skins/simple/style.css" type="text/css"  />
<link rel="stylesheet" href="<?php echo base_url();?>sximo/js/plugins/markitup/sets/default/style.css" type="text/css"  />
<link rel="stylesheet" href="<?php echo base_url();?>sximo/js/plugins/fancybox/jquery.fancybox.css" type="text/css"  />
<link rel="stylesheet" href="<?php echo base_url();?>sximo/js/plugins/toastr/toastr.css" type="text/css"  />
<link rel="stylesheet" href="<?php echo base_url();?>sximo/js/plugins/bootstrap.summernote/summernote.css" type="text/css"  />
	
<script src="<?php echo base_url();?>sximo/js/plugins/jquery.min.js"></script>
<script src="<?php echo base_url();?>sximo/js/plugins/jquery.cookie.js"></script>
<script src="<?php echo base_url();?>sximo/js/plugins/jquery-ui.min.js"></script>
<script src="<?php echo base_url();?>sximo/js/plugins/bootstrap/js/bootstrap.min.js"></script>
<script src="<?php echo base_url();?>sximo/js/plugins/select2/select2.min.js"></script>
<script src="<?php echo base_url();?>sximo/js/plugins/jquery.form.js"></script>
<script src="<?php echo base_url();?>sximo/js/plugins/iCheck/icheck.min.js"></script>
<script src="<?php echo base_url();?>sximo/js/plugins/fancybox/jquery.fancybox.js"></script>
<script src="<?php echo base_url();?>sximo/js/plugins/prettify.js"></script>
<script src="<?php echo base_url();?>sximo/js/plugins/parsley.js"></script>
<script src="<?php echo base_url();?>sximo/js/plugins/datepicker/js/bootstrap-datetimepicker.min.js"></script>
<script src="<?php echo base_url();?>sximo/js/plugins/bootstrap.datetimepicker/js/bootstrap-datetimepicker.min.js"></script>
<script src="<?php echo base_url();?>sximo/js/plugins/jquery.jCombo.min.js"></script>
<script src="<?php echo base_url();?>sximo/js/plugins/bootstrap.summernote/summernote.min.js"></script>
<script src="<?php echo base_url();?>sximo/js/plugins/toastr/toastr.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>sximo/js/simpleclone.js"></script>


<!-- Extension Datatables-->
<script type="text/javascript" src="<?php echo base_url('sximo/js/plugins/datatables/media/js/jquery.dataTables.min.js')?>"></script>
<script type="text/javascript" src="<?php echo base_url('sximo/js/plugins/datatables/media/js/dataTables.bootstrap.js')?>"></script>
<script type="text/javascript" src="<?php echo base_url('sximo/js/plugins/datatables/extensions/Buttons/js/dataTables.buttons.min.js')?>"></script>
<script type="text/javascript" src="<?php echo base_url('sximo/js/plugins/datatables/extensions/Buttons/js/buttons.flash.min.js')?>"></script>
<script type="text/javascript" src="<?php echo base_url('sximo/js/plugins/datatables/extensions/Buttons/js/buttons.html5.min.js')?>"></script>
<script type="text/javascript" src="<?php echo base_url('sximo/js/plugins/datatables/extensions/Buttons/js/buttons.print.min.js')?>"></script>
<script type="text/javascript" src="<?php echo base_url('sximo/js/plugins/datatables/sximo.datatables.js')?>"></script>

<link href="<?php echo base_url('sximo/js/plugins/datatables/media/css/jquery.dataTables.min.css')?>" rel="stylesheet">
<link href="<?php echo base_url('sximo/js/plugins/datatables/media/css/dataTables.bootstrap.css')?>" rel="stylesheet">
<link href="<?php echo base_url('sximo/js/plugins/datatables/extensions/Buttons/css/buttons.dataTables.min.css')?>" rel="stylesheet">
<link href="<?php echo base_url('sximo/js/plugins/datatables/sximo.datatables.css')?>" rel="stylesheet">
<!-- End Extension Datatables-->

<script src="<?php echo base_url();?>sximo/js/sximo.js"></script>

<!--[if lt IE 9]>
	<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
	<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->	


</head>

<body class="sxim-init" >
<div id="wrapper">

		<?php $this->load->view('layouts/sidemenu');?>
		<div class="gray-bg " id="page-wrapper">
			<?php $this->load->view('layouts/headmenu');?>

			<?php echo $content ;?>		
			
		</div>
	</div>


	<div class="footer fixed">
	    <div class="pull-right">
	       
	    </div>
	    <div>
	        <strong>Copyright</strong> &copy; 2014-<?php echo date('Y');?> . <?php echo CNF_COMNAME;?>  
	    </div>
	</div>		

<div class="modal fade" id="sximo-modal" tabindex="-1" role="dialog">
<div class="modal-dialog">
  <div class="modal-content">
	<div class="modal-header bg-default">
		
		<button type="button " class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
		<h4 class="modal-title">Modal title</h4>
	</div>
	<div class="modal-body" id="sximo-modal-content">

	</div>

  </div>
</div>
</div>

<?php 
echo $this->session->flashdata('message');
echo SiteHelpers::showNotification();?>

<script type="text/javascript">

	jQuery(document).ready(function ($) {
		$('#sidemenu').sximMenu();	
		/*
	setInterval(function(){ 
		$.get('<?php  echo site_url("core/notification/load") ;?>',function(data){
			$('.notif-alert').html(data.total);			
		});
	}, 10000);
	*/
	});		
  
<?php 

if( $msg = $this->session->flashdata("message")){
?>  
  toastr["<?php echo $msg['type'] ?>"]("<?php echo $msg['caption'] ?>","<?php echo $msg['title'] ?>"); 
<?php 
}
?>
  
</script>
</body>
</html>
