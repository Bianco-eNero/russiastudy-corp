	<?php if($setting['form-method'] =='native') : ?>
	<div class="sbox">

	<div class="sbox-title">  
		<div class="sbox-tools">
			<a href="javascript:void(0)" class="collapse-close pull-right btn btn-xs btn-default" onclick="Sdt_Close('#pages')"><i class="fa fa fa-times"></i></a>
		</div>
	 </div>

	<div class="sbox-content" style="min-height: 700px;"> 
	<?php endif;?>	

<form class="form-vertical row " id="pagesFormAjax" action="<?php echo site_url('sximo/pages/save/'.$row['pageID']);?>" method="post" novalidate parsley-validate>

			<div class="col-sm-9 ">

				<ul class="nav nav-tabs" >
					 <li class="active"><a href="#info" data-toggle="tab"> Page Content </a></li>
					 <li ><a href="#meta" data-toggle="tab"> Meta & Description </a></li>
				</ul>

				<div class="tab-content">
				  <div class="tab-pane active m-t" id="info">	


					  <div class="form-group  " >
						<label for="ipt" > Title </label>
						 <?php echo form_input(array('name'=>'title','value'=>$row['title'],'class'=>'form-control','required'=>'true'));?>
						 
					  </div> 					
					  <div class="form-group  " >
						<label for="ipt" class="btn-info   btn btn-sm" > <?php echo site_url();?> </label>
							 <?php echo form_input(array('name'=>'alias','value'=>$row['alias'],'class'=>'form-control','style'=>'width:150px;display:inline-block;'));?>
						 
					  </div> 							
							
					  <div class="form-group  " >
						
						<div class="" style="background:#fff; height: 500px;">
						  <textarea name='content' rows='35' id='content'    class='form-control editor'  
							 ><?php echo htmlentities($row['note']) ?></textarea> 
						 </div> 
					  </div> 

					</div>

					<div class="tab-pane  m-t" id="meta">
						<div class="form-group  " >
							<label class=""> Metakey </label>
							<div class="" style="background:#fff;">
							  <textarea name='metakey' rows='3' id='metakey' class='form-control'><?php echo $row['metakey'] ;?></textarea> 
							 </div> 
						  </div> 

				  			<div class="form-group  " >
								<label class=""> Meta Description </label>
								<div class="" style="background:#fff;">
								  <textarea name='metadesc' rows='3' id='metadesc' class='form-control '><?php echo $row['metadesc'];?></textarea> 
								 </div> 
							</div> 				  						  
						 

					</div>
				</div>	  	
					
				
		 	</div>		 
		 
		 <div class="col-sm-3 ">
				
				  <div class="form-group hidethis " style="display:none;">
					<label for="ipt" class=""> PageID </label>
					
					  <?php echo form_input(array('name'=>'pageID','value'=>$row['pageID'],'class'=>'form-control'));?>
					
				  </div> 					
					
 
				  <div class="form-group  " >
				  <label for="ipt"> Who can view this page ? </label>
					<?php foreach($groups as $group):?> 
					<label class="checkbox">					
					  <input  type='checkbox' name='group_id[<?php echo $group['id'] ?>]'    value="<?php echo $group['id'] ?>"
					  <?php if($group['access'] ==1 or $group['id'] ==1) echo 'checked'?>
					  class="limited-red" /> 
					  <?php echo $group['name'] ?>
					</label>  
					<?php endforeach;?>	
						  
				  </div> 
				  <div class="form-group  " >
					<label> Show for Guest ? unlogged  </label>
					<label class="checkbox"><input  type='checkbox' name='allow_guest'  class="limited-red" 
 						<?php if($row['allow_guest'] ==1 ) echo 'checked';?> value="1"	/> Allow Guest ?  </lable>
				  </div>

	
				  <div class="form-group  " >
					<label> Status </label>
					<label class="radio">					
					  <input  type='radio' name='status'  value="enable" required  class="limited-red"
					  <?php if( $row['status'] =='enable')  	echo 'checked';?>				  
					   /> 
					  Enable
					</label> 
					<label class="radio">					
					  <input  type='radio' name='status'  value="disabled" required  class="limited-red"
					    <?php if( $row['status'] =='disabled')  	echo 'checked';?>				  
					   /> 
					  Disabled
					</label> 					 
				  </div> 

				  <div class="form-group  " >
					<label> Display For </label>
					<label class="radio">					
					  <input  type='radio' name='template'  value="frontend" required  class="limited-red"
					  <?php if( $row['template'] =='frontend')  	echo 'checked';?>	
					  				  
					   /> 
					  Frontend
					</label> 
					<label class="radio">					
					  <input  type='radio' name='template'  value="backend" required  class="limited-red"	
					    <?php if( $row['template'] =='backend')  	echo 'checked';?>			  
					   /> 
					  Backend
					</label> 					 
				  </div> 	

				  <div class="form-group  " >
					<label for="ipt" > Template </label>

					<select class="form-control" name="filename">
						<option value="page"> Select Template </option>
						<?php foreach($pagetemplate['template'] as $key=> $val) :?>
							<option value="<?php echo $val ;?>" <?php if($row['filename'] == $val) echo 'selected' ;?>>
							<?php echo $key;?></option>
						
						<?php endforeach;?>


					</select>
					
				  </div>

				  
			  <div class="form-group">
					
					<input type="submit" name="submit" class="btn btn-primary btn-sm btn-block" value="Submit " />	 
		
			 
			  </div>				  				  
				  		
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
	$('.editor').summernote();	
	$(".select2").select2({ width:"98%"});	
	$('.date').datepicker({format:'yyyy-mm-dd',autoClose:true})
	$('.datetime').datetimepicker({format: 'yyyy-mm-dd hh:ii:ss'}); 
	
		$('input[type="checkbox"],input[type="radio"]').iCheck({
			checkboxClass: 'icheckbox_square-red',
			radioClass: 'iradio_square-red',
		});	


	var form = $('#pagesFormAjax'); 
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
		var table = $('#pagesTable').DataTable();

		$( '#pagesView').html('');
		$( '#pagesGrid').show();
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