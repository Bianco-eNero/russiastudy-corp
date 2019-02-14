	<?php if($setting['form-method'] =='native') : ?>
	<div class="sbox">

	<div class="sbox-title">  
		<div class="sbox-tools">
			<a href="javascript:void(0)" class="collapse-close pull-right btn btn-xs btn-default" onclick="Sdt_Close('#{class}')"><i class="fa fa fa-times"></i></a>
		</div>
	 </div>

	<div class="sbox-content"> 
	<?php endif;?>	


		 <form action="<?php echo site_url('{class}/save/'.$row['{key}']); ?>" class='form-{form_display}'  id="{class}FormAjax"
		 parsley-validate='true' novalidate='true' method="post" enctype="multipart/form-data" > 
		 
	{form_entry}
 	{masterdetailform}
		
			<div style="clear:both"></div>	
				
 		<div class="toolbar-line text-center">		
			<input type="submit" name="submit" class="btn btn-primary btn-sm" value="<?php echo $this->lang->line('core.sb_submit'); ?>" />
			<a href="javascript:void(0)" class="btn-sm btn btn-warning" onclick="Sdt_Close('#{class}')"><?php echo $this->lang->line('core.sb_cancel'); ?></a>
 		</div>
			  		
		</form>

	</div>	
		
	
	<?php if($setting['form-method'] =='native'): ?>
		</div>	
	</div>	
	<?php endif;?>	
			 
<script type="text/javascript">
$(document).ready(function() { 
	{form_javascript} 
	{masterdetailjs}

	$('.previewImage').fancybox();	
	$('.tips').tooltip();	
	$(".select2").select2({ width:"98%"});	
	$('.date').datepicker({format:'yyyy-mm-dd',autoClose:true})
	$('.datetime').datetimepicker({format: 'yyyy-mm-dd hh:ii:ss'}); 	

	var form = $('#{class}FormAjax'); 
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
		var table = $('#{class}Table').DataTable();

		$( '#{class}View').html('');
		$( '#{class}Grid').show();
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