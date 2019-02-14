	<?php if($setting['form-method'] =='native') : ?>
	<div class="sbox">

	<div class="sbox-title">  
		<div class="sbox-tools">
			<a href="javascript:void(0)" class="collapse-close pull-right btn btn-xs btn-default" onclick="Sdt_Close('#users')"><i class="fa fa fa-times"></i></a>
		</div>
	 </div>

	<div class="sbox-content"> 
	<?php endif;?>	


		 <form action="<?php echo site_url('core/users/save/'.$row['id']); ?>" class='form-horizontal'  id="usersFormAjax"
		 parsley-validate='true' novalidate='true' method="post" enctype="multipart/form-data" > 
		 
	<div class="col-md-6">
						<fieldset><legend> Basic Info</legend>
									
								  <div class="form-group hidethis " style="display:none;">
									<label for="Id" class=" control-label col-md-4 text-left"> Id </label>
									<div class="col-md-8">
									  <input type='text' class='form-control' placeholder='' value='<?php echo $row['id'];?>' name='id'   /> 
									  <i> <small></small></i>
									 </div> 
								  </div> 					
								  <div class="form-group  " >
									<label for="Group / Level" class=" control-label col-md-4 text-left"> Group / Level <span class="asterix"> * </span></label>
									<div class="col-md-8">
									  <select name='group_id' rows='5' id='group_id' code='{$group_id}' 
							class='select2 '  required  ></select> 
									  <i> <small></small></i>
									 </div> 
								  </div> 					
								  <div class="form-group  " >
									<label for="Username" class=" control-label col-md-4 text-left"> Username <span class="asterix"> * </span></label>
									<div class="col-md-8">
									  <input type='text' class='form-control' placeholder='' value='<?php echo $row['username'];?>' name='username'  required /> 
									  <i> <small></small></i>
									 </div> 
								  </div> 					
								  <div class="form-group  " >
									<label for="First Name" class=" control-label col-md-4 text-left"> First Name <span class="asterix"> * </span></label>
									<div class="col-md-8">
									  <input type='text' class='form-control' placeholder='' value='<?php echo $row['first_name'];?>' name='first_name'  required /> 
									  <i> <small></small></i>
									 </div> 
								  </div> 					
								  <div class="form-group  " >
									<label for="Last Name" class=" control-label col-md-4 text-left"> Last Name </label>
									<div class="col-md-8">
									  <input type='text' class='form-control' placeholder='' value='<?php echo $row['last_name'];?>' name='last_name'   /> 
									  <i> <small></small></i>
									 </div> 
								  </div> 					
								  <div class="form-group  " >
									<label for="Email" class=" control-label col-md-4 text-left"> Email <span class="asterix"> * </span></label>
									<div class="col-md-8">
									  <input type='text' class='form-control' placeholder='' value='<?php echo $row['email'];?>' name='email'  required parsley-type='email'  /> 
									  <i> <small></small></i>
									 </div> 
								  </div> 					
					
								  <div class="form-group  " >
									<label for="Status" class=" control-label col-md-4 text-left"> Status <span class="asterix"> * </span></label>
									<div class="col-md-8">
									  
					<label class='radio radio-inline'>
					<input type='radio' name='active' value ='0' requred <?php if($row['active'] == '0') echo 'checked="checked"';?> > Inactive </label>
					<label class='radio radio-inline'>
					<input type='radio' name='active' value ='1' requred <?php if($row['active'] == '1') echo 'checked="checked"';?> > Active </label> 
									  <i> <small></small></i>
									 </div> 
								  </div> 					
								  <div class="form-group  " >
									<label for="Avatar" class=" control-label col-md-4 text-left"> Avatar </label>
									<div class="col-md-8">
									  <input  type='file' name='avatar' id='avatar' <?php if($row['avatar'] =='') echo 'class="required"' ;?> style='width:150px !important;'  />
					<?php echo SiteHelpers::showUploadedFile($row['avatar'],'/uploads/users/') ;?>
				 
									  <i> <small></small></i>
									 </div> 
								  </div> </fieldset>
			</div>
			
			<div class="col-md-6">
				<fieldset>
					<legend><?php echo $this->lang->line('core.password'); ?> </legend>
					  <div class="form-group">
						<label for="ipt" class=" control-label col-md-4"><?php echo $this->lang->line('core.password'); ?> </label>
						<div class="col-md-8">
						<input name="password" type="password" id="password" class="form-control input-sm" value="" style="width:50% !important;"
						<?php if($row['id'] =='')echo 'required'; ?>/>   
						 </div> 
					  </div>  
					  
					  <div class="form-group">
						<label for="ipt" class=" control-label col-md-4"><?php echo $this->lang->line('core.repassword'); ?> </label>
						<div class="col-md-8">
						<input name="password_confirmation" type="password" id="password_confirmation" class="form-control input-sm" style="width:50% !important;"
						<?php if($row['id'] =='')echo 'required'; ?>/>  
						 </div> 
					  </div>				
				
				</fieldset>	
			</div>
			
			
 	
		
			<div style="clear:both"></div>	
				
 		<div class="toolbar-line text-center">		
			<input type="submit" name="submit" class="btn btn-primary btn-sm" value="<?php echo $this->lang->line('core.sb_submit'); ?>" />
			<a href="javascript:void(0)" class="btn-sm btn btn-warning" onclick="Sdt_Close('#users')"><?php echo $this->lang->line('core.sb_cancel'); ?></a>
 		</div>
			  		
		</form>

	</div>	
		
	
	<?php if($setting['form-method'] =='native'): ?>
		</div>	
	</div>	
	<?php endif;?>	
			 
<script type="text/javascript">
$(document).ready(function() { 
	
		$("#group_id").jCombo("<?php echo site_url('core/users/comboselect?filter=tb_groups:group_id:name') ?>",
		{  selected_value : '<?php echo $row["group_id"] ?>' });
		 
	

	$('.previewImage').fancybox();	
	$('.tips').tooltip();	
	$(".select2").select2({ width:"98%"});	
	$('.date').datepicker({format:'yyyy-mm-dd',autoClose:true})
	$('.datetime').datetimepicker({format: 'yyyy-mm-dd hh:ii:ss'}); 

	var form = $('#usersFormAjax'); 
	form.parsley();
	form.submit(function(){
		
		if(form.parsley('isValid') == true){			
			var options = { 
				dataType:      'json', 
				beforeSubmit :  showRequest,
				success:       showResponse  
			}  
			$(this).ajaxSubmit(options); 
			return false;
						
		} else {
			return false;
		}		
	
	});	
 	 
});

function showRequest()
{
	$('.ajaxLoading').show();	
}  
function showResponse(data)  {		
	
	if(data.status == 'success')
	{
		$('.ajaxLoading').hide();
		var table = $('#usersTable').DataTable();

		$( '#usersView').html('');
		$( '#usersGrid').show();
		$('#sximo-modal').modal('hide');
		
		table.ajax.reload();		
		notyMessage(data.message);		
	} else {	
		$('.ajaxLoading').hide();
		notyMessageError(data.message);	
		return false;
	}	
}	
</script>		 