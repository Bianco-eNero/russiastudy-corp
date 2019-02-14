	<?php if($setting['form-method'] =='native') : ?>
	<div class="sbox">

	<div class="sbox-title">  
		<div class="sbox-tools">
			<a href="javascript:void(0)" class="collapse-close pull-right btn btn-xs btn-default" onclick="Sdt_Close('#logs')"><i class="fa fa fa-times"></i></a>
		</div>
	 </div>

	<div class="sbox-content"> 
	<?php endif;?>	


		 <form action="<?php echo site_url('core/logs/save/'.$row['auditID']); ?>" class='form-horizontal'  id="logsFormAjax"
		 parsley-validate='true' novalidate='true' method="post" enctype="multipart/form-data" > 
		 
	<div class="col-md-12">
						<fieldset><legend> Logs</legend>
									
								  <div class="form-group  " >
									<label for="AuditID" class=" control-label col-md-4 text-left"> AuditID </label>
									<div class="col-md-8">
									  <input type='text' class='form-control' placeholder='' value='<?php echo $row['auditID'];?>' name='auditID'   /> 
									  <i> <small></small></i>
									 </div> 
								  </div> 					
								  <div class="form-group  " >
									<label for="Ipaddress" class=" control-label col-md-4 text-left"> Ipaddress </label>
									<div class="col-md-8">
									  <input type='text' class='form-control' placeholder='' value='<?php echo $row['ipaddress'];?>' name='ipaddress'   /> 
									  <i> <small></small></i>
									 </div> 
								  </div> 					
								  <div class="form-group  " >
									<label for="User Id" class=" control-label col-md-4 text-left"> User Id </label>
									<div class="col-md-8">
									  <select name='user_id' rows='5' id='user_id' code='{$user_id}' 
							class='select2 '    ></select> 
									  <i> <small></small></i>
									 </div> 
								  </div> 					
								  <div class="form-group  " >
									<label for="Module" class=" control-label col-md-4 text-left"> Module </label>
									<div class="col-md-8">
									  <input type='text' class='form-control' placeholder='' value='<?php echo $row['module'];?>' name='module'   /> 
									  <i> <small></small></i>
									 </div> 
								  </div> 					
								  <div class="form-group  " >
									<label for="Task" class=" control-label col-md-4 text-left"> Task </label>
									<div class="col-md-8">
									  <input type='text' class='form-control' placeholder='' value='<?php echo $row['task'];?>' name='task'   /> 
									  <i> <small></small></i>
									 </div> 
								  </div> 					
								  <div class="form-group  " >
									<label for="Note" class=" control-label col-md-4 text-left"> Note </label>
									<div class="col-md-8">
									  <textarea name='note' rows='2' id='note' class='form-control '  
				           ><?php echo $row['note'] ;?></textarea> 
									  <i> <small></small></i>
									 </div> 
								  </div> 					
								  <div class="form-group  " >
									<label for="Logdate" class=" control-label col-md-4 text-left"> Logdate </label>
									<div class="col-md-8">
									  
				<input type='text' class='form-control datetime' placeholder='' value='<?php echo $row['logdate'];?>' name='logdate'
				style='width:150px !important;'	   /> 
									  <i> <small></small></i>
									 </div> 
								  </div> </fieldset>
			</div>
			
			
 	
		
			<div style="clear:both"></div>	
				
 		<div class="toolbar-line text-center">		
			<input type="submit" name="submit" class="btn btn-primary btn-sm" value="<?php echo $this->lang->line('core.sb_submit'); ?>" />
			<a href="javascript:void(0)" class="btn-sm btn btn-warning" onclick="Sdt_Close('#logs')"><?php echo $this->lang->line('core.sb_cancel'); ?></a>
 		</div>
			  		
		</form>

	</div>	
		
	
	<?php if($setting['form-method'] =='native'): ?>
		</div>	
	</div>	
	<?php endif;?>	
			 
<script type="text/javascript">
$(document).ready(function() { 
	
		$("#user_id").jCombo("<?php echo site_url('logs/comboselect?filter=tb_users:id:first_name') ?>",
		{  selected_value : '<?php echo $row["user_id"] ?>' });
		 
	

	$('.previewImage').fancybox();	
	$('.tips').tooltip();	
	$(".select2").select2({ width:"98%"});	
	$('.date').datepicker({format:'yyyy-mm-dd',autoClose:true})
	$('.datetime').datetimepicker({format: 'yyyy-mm-dd hh:ii:ss'}); 


	var form = $('#logsFormAjax'); 
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
		var table = $('#logsTable').DataTable();
		table.ajax.reload();		
		notyMessage(data.message);		
	} else {	
		$('.ajaxLoading').hide();
		notyMessageError(data.message);	
		return false;
	}	
}	
</script>		 