
  <div class="page-content row">


	 <div class="page-content-wrapper m-t">  


<div class="sbox">
	<div class="sbox-title">
		<div class="sbox-tools">
		<a href="<?php echo site_url('sximo/module');?>" class="collapse-close pull-right btn btn-xs btn-default"><i class="fa fa fa-times"></i></a> 
		</div>

	</div>
	<div class="sbox-content">

	<?php echo $this->session->flashdata('message');?>	
	<form class="form-horizontal" action="<?php echo site_url('sximo/module/saveCreate/');?>" method="post" parsley-validate novalidate>

	<div class="row">
	<div class="col-md-9">


	<div class="form-group has-feedback">
		<label class="col-sm-3 text-right"> Module Name / Title </label>
		<div class="col-sm-9">	
			<input name="module_title" class="form-control" placeholder="Title Name" required />
		</div>
	</div>		
	
	<div class="form-group ">
		<label class="col-sm-3 text-right"> Module Note   </label>
		<div class="col-sm-9">	
		<input name="module_note" class="form-control" placeholder="Short description module" required />
		
		</div>
	</div>
	<div class="form-group ">
		<label class="col-sm-3 text-right"> Template :  </label>
		<div class="col-sm-9">	

			<label class="radio">	
				<input type="radio" name="module_template" value="ajax" checked="checked"/><b>  Full Crud ( DataTables ) </b> <br />		
				<small style="font-style:italic"> Edit Modal, Modal Add , Modal View , Copy Rows , lock master key values , Ajax sorting and pagination </small> 
				
			</label>
			<label class="radio">	
				<input type="radio" name="module_template" value="report" /><b> Report Module </b>   <br />
				<small style="font-style:italic"> Create Report module from </small> 
			</label>

			<label class="radio">	
				<input type="radio" name="module_template" value="generic" /><b> Blank Module </b>   <br />
				<small style="font-style:italic"> Create Blank Controller, Model and View </small> 
			</label>			

		</div>
	</div>

	<div class="form-group ">
		<label class="col-sm-3 text-right">Class Controller </label>
		<div class="col-sm-9">	
		<input name="module_name" class="form-control" placeholder="Class Controller / Module Name" required />
	  	
		</div>
	</div>	
		
	
	<div class="form-group">
		<label class="col-sm-3 text-right"> Module Table   </label>
		<div class="col-sm-9">	
			<select name="module_db" class="form-control">
				<?php foreach($tables as $table){?>
					<option value="<?php echo $table;?>"><?php echo $table;?></option>
				<?php } ?>
			</select>	 	
		</div>
	</div>	
		
	<div class="form-group " style="display:none;">
		<label class="col-sm-3 text-right">Author </label>
		<div class="col-sm-9">	
	  
		
		</div>
	</div>	
		


	<div class="form-group switchSql">
		<label class="col-sm-3 text-right">  </label>
		<div class="col-sm-9">	
			<label class="radio radio-inline">
				<input type="radio" name="creation" value="auto"  checked="checked"  /> 
				Auto Mysql Statment 
			</label>		
			<label class="radio radio-inline">
				<input type="radio" name="creation" value="manual"  />
				Manual Mysql Statment 
			</label>		
		</div>
	</div>	
	
	<div class="form-group manualsql">
		<label class="col-sm-3 text-right">  </label>
		<div class="col-sm-9">
			<textarea class="form-control" name="sql_select" placeholder="SQL Select & Join Statement" rows="3" id="sql_select"></textarea>	  
		</div> 
	</div>	
	
	<div class="form-group manualsql">
		<label class="col-sm-3 text-right">  </label>
		<div class="col-sm-9">
			<textarea class="form-control" name="sql_where" placeholder="SQL Where Statement" rows="2" id="sql_where"></textarea>	 
		</div> 
	</div>		

	<div class="form-group manualsql">
		<label class="col-sm-3 text-right">  </label>
		<div class="col-sm-9">
			<textarea class="form-control" name="sql_group" placeholder="SQL Grouping Statement" rows="2" id="sql_group"></textarea>	
			
		</div> 
	</div>	
	
		
      <div class="form-group">
		<label class="col-sm-3 text-right">&nbsp;</label>
		<div class="col-sm-9">	
	  	<button type="submit" class="btn btn-primary "><i class="icon-checkmark-circle2"></i>  Create New Module </button>
	  	<a href="<?php echo site_url('sximo/module');?>" class="btn btn-success" ><i class="icon-backward"></i> Cancel </a>
		</div>	  

      </div>
     </div>
    </div> 

 </form>

</div>
</div>
</div>
</div>


<script type="text/javascript">
	$(document).ready(function(){
		$('.manualsql').hide();
		$('.switchSql input:radio').on('ifClicked', function() {
		  val = $(this).val(); 
			if(val == 'manual')
			{
				$('.manualsql').show();
				$('#sql_select').attr("required","true");
				$('#sql_where').attr("required","true");
				
			} else {
				$('.manualsql').hide();
				$('#sql_select').removeAttr("required");
				$('#sql_where').removeAttr("required");
	
			}		  
		  
		});

	});
	
</script>
