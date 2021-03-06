
  <div class="page-content row ">


 <div class="page-content-wrapper m-t"> 
	
	
	<?php echo $this->session->flashdata('message');?>
<div class="sbox animated fadeInRight">
	<div class="sbox-title"><h4><?php echo $this->lang->line('core.mod_configinfo'); ?> <small><?php echo $this->lang->line('core.mod_configinfosub'); ?> </small> </h4></div>

	<div class="sbox-content">	

	<?php $this->load->view('sximo/module/tab',array('active'=>'config')); ?>

	<div class="col-md-6">
	<form class="form-horizontal" action="<?php echo site_url('sximo/module/saveconfig/'.$module_name);?>" method="post">
	<input  type='text' name='module_id' id='module_id'  value='<?php echo $row->module_id ;?>'  style="display:none; " />
	  	<fieldset>
		<legend> Module Info </legend>

  <div class="form-group">
    <label for="ipt" class=" control-label col-md-3"><?php echo $this->lang->line('core.mod_imoduletitle'); ?> </label>
	<div class="col-md-9">	
		<input  type='text' name='module_title' id='module_title' class="form-control " required value='<?php echo $row->module_title ;?>'  /> 

	  <?php $lang = SiteHelpers::langOption();
		foreach($lang as $l) { if($l['folder'] !='en') {
	   ?>
	   <div class="input-group input-group" style="margin:1px 0 !important;">
		 <input name="language_title[<?php echo $l['folder'];?>]" type="text"   class="form-control" placeholder="Laber for <?php echo $l['name'];?>"
		 value="<?php echo (isset($module_lang['title'][$l['folder']]) ? $module_lang['title'][$l['folder']] : '');?>" />
		<span class="input-group-addon xlick bg-default btn-sm " ><?php echo strtoupper($l['folder']);?></span>
	   </div> 
		 
	  <?php } } ?>		

	</div> 
  </div>  

  <div class="form-group">
    <label for="ipt" class=" control-label col-md-3"><?php echo $this->lang->line('core.mod_imodulenote'); ?> </label>
	<div class="col-md-9">
		<input  type='text' name='module_note' id='module_note'  value='<?php echo $row->module_note ?>' class="form-control "  />
	
	  <?php $lang = SiteHelpers::langOption();
		foreach($lang as $l) { if($l['folder'] !='en') {
	   ?>
	   <div class="input-group input-group" style="margin:1px 0 !important;">
		 <input name="language_note[<?php echo $l['folder'];?>]" type="text"   class="form-control" placeholder="Note for <?php echo $l['name'];?>"
		 value="<?php echo (isset($module_lang['note'][$l['folder']]) ? $module_lang['note'][$l['folder']] : '');?>" />
		<span class="input-group-addon xlick bg-default btn-sm " ><?php echo strtoupper($l['folder']);?></span>
	   </div> 
		 
	  <?php } } ?>

	</div> 
  </div>    	

	  <div class="form-group">
		<label for="ipt" class=" control-label col-md-3"><?php echo $this->lang->line('core.mod_imodulename'); ?> </label>
		<div class="col-md-9">
		<input  type='text' name='module_name' id='module_name' readonly="1"  class="form-control " required value='<?php echo $row->module_name ?>'  />
		 </div> 
	  </div>  
  
	   <div class="form-group">
		<label for="ipt" class=" control-label col-md-3"><?php echo $this->lang->line('core.mod_imoduledb'); ?></label>
		<div class="col-md-9">
		<input  type='text' name='module_db' id='module_db' readonly="1"  class="form-control " required value='<?php echo $row->module_db?>'  />
		  
		 </div> 
	  </div>  
  
	  <div class="form-group" style="display:none;" >
		<label for="ipt" class=" control-label col-md-3"><?php echo $this->lang->line('core.mod_imoduleauthor'); ?> </label>
		<div class="col-md-9">
		<input  type='text' name='module_author' id='module_author' class="form-control " required readonly="1"  value='<?php echo $row->module_author ?>'  />
		 </div> 
	  </div>  
	 
		<div class="form-group">
			<label for="ipt" class=" control-label col-md-3"></label>
			<div class="col-md-9">
			<button type="submit" name="submit" class="btn btn-primary"> <?php echo $this->lang->line('core.btn_updatemodule'); ?> </button>
			 </div> 
		</div>   
		</fieldset>
	
  	</form>
	
  
	</div>

  <div class="col-sm-6 col-md-6">
  <form class="form-horizontal" action="<?php echo site_url('sximo/module/savesetting/'.$module_name);?>" method="post">
  <input  type='hidden' name='module_id' id='module_id'  value='<?php echo $row->module_id ;?>'  />
  	<fieldset>
		<legend> Module Setting </legend>
 

		  <input type="hidden" name="gridtype" value="<?php echo $setting['gridtype'] ;?>">

	
	  <div class="form-group">
		<label for="ipt" class=" control-label col-md-3"> Default Order  </label>
		<div class="col-md-9">
			<select class="select-alt" name="orderby">
			<?php foreach($tables as $t) : ?>
				<option value="<?php echo $t['field'] ;?>"
				<?php if($setting['orderby'] ==$t['field']) echo 'selected="selected"';?> 
				><?php echo $t['label'] ;?></option>
			<?php endforeach;?>
			</select>
			<select class="select-alt" name="ordertype">
				<option value="asc" <?php if($setting['ordertype'] =='asc') echo 'selected="selected"';?> > Ascending </option>
				<option value="desc"<?php if($setting['ordertype'] =='desc') echo 'selected="selected"';?>> Descending </option>
			</select>
			
		 </div> 
	  </div> 
	  
	  <div class="form-group">
		<label for="ipt" class=" control-label col-md-3"> Display Rows </label>
		<div class="col-md-9">
			<select class="select-alt" name="perpage">
				<?php $pages = array('10','20','30','50');
				foreach($pages as $page) {
				?>
				<option value="<?php echo $page;?>"  <?php if($setting['perpage'] ==$page) echo 'selected="selected"';?> > <?php echo $page;?> </option>
				<?php } ?>
			</select>	
			/ Page	
		 </div> 
	  </div>   
 		

		<p> <i>You can switch this setting and applied to current module without have to rebuild </i></p>

		  <div class="form-group">
			<label for="ipt" class=" control-label col-md-3"> Form Method </label>
			<div class="col-md-9">
				<label class="radio-inline">
				<input type="radio" value="native" name="form-method"
				 <?php if($setting['form-method'] == 'native') echo 'checked="checked"';?> 
				 /> New Page  
				</label>
				<label class="radio-inline">
				<input type="radio" value="modal" name="form-method" 
				 <?php if($setting['form-method'] == 'modal') echo 'checked="checked"';?> 			
				/> Modal  
				</label>							
			 </div> 
		  </div> 

		  <div class="form-group">
			<label for="ipt" class=" control-label col-md-3"> View  Method </label>
			<div class="col-md-9">
				<label class="radio-inline">
				<input type="radio" value="native" name="view-method"
				<?php  if($setting['view-method'] == 'native') echo 'checked="checked"';?> 
				 /> New Page  
				</label>
				<label class="radio-inline">
				<input type="radio" value="modal" name="view-method" 
				 <?php if($setting['view-method'] == 'modal') echo 'checked="checked"';?> 			
				/> Modal  
				</label>	
				<label class="radio-inline">
				<input type="radio" value="expand" name="view-method" 
				 <?php if($setting['view-method'] == 'expand') echo 'checked="checked"';?> 			
				/> Expand Grid   
				</label>

			 </div> 
		  </div> 		  

		  <div class="form-group hidden">
			<label for="ipt" class=" control-label col-md-3"> Inline add / edit row </label>
			<div class="col-md-9">
				<label class="checkbox">
				<input type="checkbox" value="true" name="inline"
				<?php if($setting['inline'] == 'true') echo 'checked="checked"';?> 	
				 /> Yes  Allowed 
				</label>
										
			 </div> 
		  </div> 		  

		  <div class="form-group">
			<label for="ipt" class=" control-label col-md-3"></label>
			<div class="col-md-9">
			<button type="submit" name="submit" class="btn btn-primary"> Update Seting </button>
			 </div> 
		  </div> 		  
		 
	</fieldset>	

	</form>
	
  </div>


	<div class="clr clear"></div>
	</div>
	</div>
</div>			