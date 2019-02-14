	<?php if($setting['form-method'] =='native') : ?>
	<div class="sbox">

	<div class="sbox-title">  
		<div class="sbox-tools">
			<a href="javascript:void(0)" class="collapse-close pull-right btn btn-xs btn-default" onclick="Sdt_Close('#notification')"><i class="fa fa fa-times"></i></a>
		</div>
	 </div>

	<div class="sbox-content"> 
	<?php endif;?>	


		 <form action="<?php echo site_url('core/notification/save/'.$row['id']); ?>" class='form-horizontal'  id="notificationFormAjax"
		 parsley-validate='true' novalidate='true' method="post" enctype="multipart/form-data" > 
		 
	<div class="col-md-12">
						<fieldset><legend> Notification</legend>
									
								  <div class="form-group  " >
									<label for="Id" class=" control-label col-md-4 text-left"> Id </label>
									<div class="col-md-8">
									  <input type='text' class='form-control' placeholder='' value='<?php echo $row['id'];?>' name='id'   /> 
									  <i> <small></small></i>
									 </div> 
								  </div> 					
								  <div class="form-group  " >
									<label for="Userid" class=" control-label col-md-4 text-left"> Userid </label>
									<div class="col-md-8">
									  <input type='text' class='form-control' placeholder='' value='<?php echo $row['userid'];?>' name='userid'   /> 
									  <i> <small></small></i>
									 </div> 
								  </div> 					
								  <div class="form-group  " >
									<label for="Url" class=" control-label col-md-4 text-left"> Url </label>
									<div class="col-md-8">
									  <input type='text' class='form-control' placeholder='' value='<?php echo $row['url'];?>' name='url'   /> 
									  <i> <small></small></i>
									 </div> 
								  </div> 					
								  <div class="form-group  " >
									<label for="Title" class=" control-label col-md-4 text-left"> Title </label>
									<div class="col-md-8">
									  <input type='text' class='form-control' placeholder='' value='<?php echo $row['title'];?>' name='title'   /> 
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
									<label for="Created" class=" control-label col-md-4 text-left"> Created </label>
									<div class="col-md-8">
									  
				<input type='text' class='form-control datetime' placeholder='' value='<?php echo $row['created'];?>' name='created'
				style='width:150px !important;'	   /> 
									  <i> <small></small></i>
									 </div> 
								  </div> 					
								  <div class="form-group  " >
									<label for="Icon" class=" control-label col-md-4 text-left"> Icon </label>
									<div class="col-md-8">
									  <input type='text' class='form-control' placeholder='' value='<?php echo $row['icon'];?>' name='icon'   /> 
									  <i> <small></small></i>
									 </div> 
								  </div> 					
								  <div class="form-group  " >
									<label for="Is Read" class=" control-label col-md-4 text-left"> Is Read </label>
									<div class="col-md-8">
									  <input type='text' class='form-control' placeholder='' value='<?php echo $row['is_read'];?>' name='is_read'   /> 
									  <i> <small></small></i>
									 </div> 
								  </div> </fieldset>
			</div>
			
			
 	
		
			<div style="clear:both"></div>	
				
 		<div class="toolbar-line text-center">		
			<input type="submit" name="submit" class="btn btn-primary btn-sm" value="<?php echo $this->lang->line('core.sb_submit'); ?>" />
			<a href="javascript:void(0)" class="btn-sm btn btn-warning" onclick="Sdt_Close('#notification')"><?php echo $this->lang->line('core.sb_cancel'); ?></a>
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

	var form = $('#notificationFormAjax'); 
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
		var table = $('#notificationTable').DataTable();
		table.ajax.reload();		
		notyMessage(data.message);		
	} else {	
		$('.ajaxLoading').hide();
		notyMessageError(data.message);	
		return false;
	}	
}	
</script>		 