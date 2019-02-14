
  <div class="page-content row">

 	<div class="page-content-wrapper m-t">
	
		<div class="block-content">
		

			<div class="tab-content m-t">

  <div class="sbox  "> 
  <div class="sbox-title"><h4>  SXIMO 5 <sup>1.0</sup>   <small><?php echo $this->lang->line('core.t_generalsetting'); ?> </small></h4></div>
  <div class="sbox-content"> 

  <?php $this->load->view('sximo/config/tab',array('active'=>''));?>


			  <div class="tab-pane active use-padding" id="info">
			 <form class="form-horizontal row" action="<?php echo site_url('sximo/config/postSave');?>" method="post" enctype="multipart/form-data" >

				<div class="col-sm-6">
				<fieldset > <legend><?php echo $this->lang->line('core.fr_generalinfo'); ?> </legend>

				  <div class="form-group">
					<label for="ipt" class=" control-label col-md-4"><?php echo $this->lang->line('core.fr_appname'); ?> </label>
					<div class="col-md-8">
					<input name="cnf_appname" type="text" id="cnf_appname" class="form-control input-sm" required  value="<?php echo  CNF_APPNAME ;?>" />
					 </div>
				  </div>

				  <div class="form-group">
					<label for="ipt" class=" control-label col-md-4"><?php echo $this->lang->line('core.fr_appdesc'); ?> </label>
					<div class="col-md-8">
					<input name="cnf_appdesc" type="text" id="cnf_appdesc" class="form-control input-sm" value="<?php echo CNF_APPDESC ;?>" />
					 </div>
				  </div>

				  <div class="form-group">
					<label for="ipt" class=" control-label col-md-4"><?php echo $this->lang->line('core.fr_comname'); ?> </label>
					<div class="col-md-8">
					<input name="cnf_comname" type="text" id="cnf_comname" class="form-control input-sm" value="<?php echo  CNF_COMNAME ;?>" />
					 </div>
				  </div>

				  <div class="form-group">
					<label for="ipt" class=" control-label col-md-4"><?php echo $this->lang->line('core.fr_emailsys'); ?> </label>
					<div class="col-md-8">
					<input name="cnf_email" type="text" id="cnf_email" class="form-control input-sm" value="<?php echo  CNF_EMAIL ;?>" />
					 </div>
				  </div>


			   <div class="form-group">
				<label for="ipt" class=" control-label col-md-4"><?php echo $this->lang->line('core.fr_frontendtemplate'); ?> </label>
				<div class="col-md-8">
						<select class="form-control" name="cnf_theme">
						<?php foreach($themes as $theme) {?>
							<option value="<?php echo $theme['folder'];?>" <?php if($theme['folder'] == CNF_THEME) echo 'selected="selected"';?>><?php echo $theme['name'];?></option>
						<?php } ?>
						</select>
				 </div>
			  </div>

 		  <div class="form-group">
			<label for="ipt" class=" control-label col-sm-4">
Muliti language <br />
Only Layout Interface 

			 </label>
			<div class="col-sm-8">
					<label class="checkbox">
					<input type="checkbox" name="cnf_multilang" value="true"  <?php if(CNF_MULTILANG =='true') echo 'checked';?>/>
					<?php echo $this->lang->line('core.enable'); ?>
					</label>
			</div>
		</div>


			</fieldset>

		<fieldset > <legend><?php echo $this->lang->line('core.fr_frontendmetakey'); ?> </legend>

<div class="form-group">
		    <label for="ipt" class=" control-label col-md-4">Date Format </label>
			<div class="col-md-8">
				<select class="form-control" name="cnf_date">
				<?php $dates = array(
						'Y-m-d'=>' ( Y-m-d ) . Example : '.date('Y-m-d'),
						'Y/m/d'=>' ( Y/m/d ) . Example : '.date('Y/m/d'),
						'd-m-y'=>' ( D-M-Y ) . Example : '.date('d-m-y'),
						'd/m/y'=>' ( D/M/Y ) . Example : '.date('d/m/y'),
						'm-d-y'=>' ( m-d-Y ) . Example : '.date('m-d-Y'),
						'm/d/y'=>' ( m/d/Y ) . Example : '.date('m/d/Y'),
					  );
				foreach($dates as $key=>$val) {?>
					<option value="<?php echo  $key ;?>"
					<?php if(defined('CNF_DATE') && CNF_DATE ==$key) echo 'selected'; ?>
					><?php echo $val ;?></option>

				<?php } ?>
				</select>
			 </div> 
		  </div>  	

		  <div class="form-group">
			<label for="ipt" class=" control-label col-md-4"><?php echo $this->lang->line('core.fr_metakey'); ?> </label>
			<div class="col-md-8">
				<textarea class="form-control input-sm" name="cnf_metakey"><?php echo  CNF_METAKEY ;?></textarea>
			 </div>
		  </div>

		   <div class="form-group">
			<label  class=" control-label col-md-4"><?php echo $this->lang->line('core.fr_metadesc'); ?> </label>
			<div class="col-md-8">
				<textarea class="form-control input-sm"  name="cnf_metadesc"><?php echo CNF_METADESC ;?></textarea>
			 </div>
		  </div>

 		  <div class="form-group">
		    <label  class=" control-label col-md-4">Backend Logo</label>
			<div class="col-md-8">
				<input type="file" name="logo">
				<p> <i>Please use image dimension 155px * 30px </i> </p>
				<div style="padding:5px; border:solid 1px #ddd; background:#f5f5f5; width:auto;">
				 	<?php 
				 	 $logo = (defined('CNF_LOGO')? CNF_LOGO : '');
				 	if(file_exists('/sximo/images/'.$logo) && $logo !='') : ?>
				 	<img src="<?php echo base_url('sximo/images/'.$logo);?>" alt="<?php echo CNF_APPNAME ;?>" />
				 	<?php else : ?>
					<img src="<?php echo base_url('sximo/images/logo.png') ;?>" alt="<?php echo CNF_APPNAME ;?>" />
					<?php endif; ?>	
				</div>				
			 </div> 
		  </div>  

		  </fieldset>
	</div>

	<div class="col-sm-6">


			<fieldset > <legend><?php echo $this->lang->line('core.fr_securitysetting'); ?> </legend>

		  <div class="form-group">
			<label for="ipt" class=" control-label col-sm-4"><?php echo $this->lang->line('core.fr_registrationdefault'); ?> </label>
			<div class="col-sm-8">
					<div >
						<label class="checkbox-inline">
						<select class="form-control" name="cnf_group">
							<?php foreach($groups->result() as $group) {?>
							<option value="<?php echo $group->group_id ;?>"
							 <?php if(CNF_GROUP == $group->group_id ) echo 'selected';?>><?php echo $group->name ;?></option>
							<?php } ?>
						</select>
						</label>
					</div>
			</div>

		  </div>

		  <div class="form-group">
			<label for="ipt" class=" control-label col-sm-4"><?php echo $this->lang->line('core.fr_registration'); ?> </label>
			<div class="col-sm-8">

					<label class="radio">
					<input type="radio" name="cnf_activation" value="auto"  <?php if(CNF_ACTIVATION =='auto') echo 'checked';?> /> <?php echo $this->lang->line('core.fr_registrationauto'); ?> </label>

					<label class="radio">
					<input type="radio" name="cnf_activation" value="manual"  <?php if(CNF_ACTIVATION =='manual') echo 'checked';?> />
					 <?php echo $this->lang->line('core.fr_registrationmanual'); ?>
					</label>
					<label class="radio">
					<input type="radio" name="cnf_activation" value="confirmation"  <?php if(CNF_ACTIVATION =='confirmation') echo 'checked';?>/>
						<?php echo $this->lang->line('core.fr_registrationemail'); ?>
					</label>


			</div>

		  </div>

 		  <div class="form-group">
			<label for="ipt" class=" control-label col-sm-4"><?php echo $this->lang->line('core.fr_registrationallow'); ?> </label>
			<div class="col-sm-8">
					<label class="checkbox">
					<input type="checkbox" name="cnf_regist" value="true"  <?php if(CNF_REGIST =='true') echo 'checked';?>/>
					<?php echo $this->lang->line('core.enable'); ?>
					</label>
			</div>
		</div>

 		  <div class="form-group">
			<label for="ipt" class=" control-label col-sm-4"><?php echo $this->lang->line('core.fr_allowfrontend'); ?> </label>
			<div class="col-sm-8">
					<label class="checkbox">
					<input type="checkbox" name="cnf_front" value="true"  <?php if(CNF_FRONT =='true') echo 'checked';?>/>
					<?php echo $this->lang->line('core.enable'); ?>
					</label>
			</div>
		</div>

		  </fieldset>


				<div class="form-group">
				<label for="ipt" class=" control-label col-md-4"> </label>
				<div class="col-md-8">
					<button class="btn btn-primary" type="submit"><?php echo $this->lang->line('core.sb_savechanges'); ?> </button>
				 </div>
			  </div>

	</div>
</form>
</div>
	</div></div>

</div>
</div>
</div>






