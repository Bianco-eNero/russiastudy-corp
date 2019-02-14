	<?php if($setting['form-method'] =='native') : ?>
	<div class="sbox">

	<div class="sbox-title">  
		<div class="sbox-tools">
			<a href="javascript:void(0)" class="collapse-close pull-right btn btn-xs btn-default" onclick="Sdt_Close('#employee')"><i class="fa fa fa-times"></i></a>
		</div>
	 </div>

	<div class="sbox-content"> 
	<?php endif;?>	


		 <form action="<?php echo site_url('employee/save/'.$row['employee_id']); ?>" class='form-horizontal'  id="employeeFormAjax"
		 parsley-validate='true' novalidate='true' method="post" enctype="multipart/form-data" > 
		 
	<div class="col-md-12">
						<fieldset><legend> Employee</legend>
									
								  <div class="form-group hidethis " style="display:none;">
									<label for="PR" class=" control-label col-md-4 text-left"> <?php echo SiteHelpers::activeLang('PR',(isset($fields['employee_id']['language'])? $fields['employee_id']['language'] : array()))  ?> </label>
									<div class="col-md-8">
									  <input type='text' class='form-control' placeholder='' value='<?php echo $row['employee_id'];?>' name='employee_id'   /> 
									  <i> <small></small></i>
									 </div> 
								  </div> 					
								  <div class="form-group  " >
									<label for="Name" class=" control-label col-md-4 text-left"> <?php echo SiteHelpers::activeLang('Name',(isset($fields['employee_name']['language'])? $fields['employee_name']['language'] : array()))  ?> </label>
									<div class="col-md-8">
									  <input type='text' class='form-control' placeholder='' value='<?php echo $row['employee_name'];?>' name='employee_name'   /> 
									  <i> <small></small></i>
									 </div> 
								  </div> 					
								  <div class="form-group  " >
									<label for="Dob" class=" control-label col-md-4 text-left"> <?php echo SiteHelpers::activeLang('Dob',(isset($fields['employee_dob']['language'])? $fields['employee_dob']['language'] : array()))  ?> </label>
									<div class="col-md-8">
									  
				<div class='input-group m-b' style='width:150px !important;'>
				<input type='text' class='form-control date' placeholder='' value='<?php echo $row['employee_dob'];?>' name='employee_dob'
				 />
				<span class='input-group-addon'><i class='fa fa-calendar'></i></span>
				</div>
				 
									  <i> <small></small></i>
									 </div> 
								  </div> </fieldset>
			</div>
			
			
 	
		
			<div style="clear:both"></div>	
				
 		<div class="toolbar-line text-center">		
			<input type="submit" name="submit" class="btn btn-primary btn-sm" value="<?php echo $this->lang->line('core.sb_submit'); ?>" />
			<a href="javascript:void(0)" class="btn-sm btn btn-warning" onclick="Sdt_Close('#employee')"><?php echo $this->lang->line('core.sb_cancel'); ?></a>
 		</div>
			  		
		</form>

	</div>	
		
	
	<?php if($setting['form-method'] =='native'): ?>
		</div>	
	</div>	
	<?php endif;?>	
			 
<script type="text/javascript">
$(document).ready(function() { 
	 
	

	$('.previewImage').fancybox();	
	$('.tips').tooltip();	
	$(".select2").select2({ width:"98%"});	
	$('.date').datepicker({format:'yyyy-mm-dd',autoClose:true})
	$('.datetime').datetimepicker({format: 'yyyy-mm-dd hh:ii:ss'}); 	

	var form = $('#employeeFormAjax'); 
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
		var table = $('#employeeTable').DataTable();

		$( '#employeeView').html('');
		$( '#employeeGrid').show();
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