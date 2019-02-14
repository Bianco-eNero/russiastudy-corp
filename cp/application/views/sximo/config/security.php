
  <div class="page-content row">
    <!-- Page header -->

 	<div class="page-content-wrapper m-t">
			 <form class="form-horizontal" action="<?php echo site_url('sximo/config/postSecurity');?>" method="post">


	
<div class="sbox  "> 
	<div class="sbox-title"></div>
	<div class="sbox-content"> 	

	 	<?php $this->load->view('sximo/config/tab',array('active'=>'security'));?>
		 <div class="col-sm-6">
			 	<fieldset>
			 		<legend><h3> <?php echo $this->lang->line('core.fr_securetools'); ?> <small> Captcha And ReCaptcha </small></h3></legend>
			 	
				  	<div class="form-group">
						<label for="ipt" class=" control-label col-sm-3"><?php echo $this->lang->line('core.fr_cicaptcha'); ?> </label>
						<div class="col-sm-8">
								<label class="checkbox">
									<input type="checkbox" name="cnf_cicaptcha" value="true"  <?php if(CNF_CICAPTCHA =='true') echo 'checked';?>/>
									<?php echo $this->lang->line('core.enable'); ?>
								</label>
								
						</div>
		      		</div>
		      
				  	<div class="form-group">
						<label for="ipt" class=" control-label col-sm-3"><?php echo $this->lang->line('core.fr_recaptcha'); ?> </label>
						<div class="col-sm-8">
							<label class="checkbox">
								<input type="checkbox" name="cnf_recaptcha" value="true"  <?php if(CNF_RECAPTCHA =='true') echo 'checked';?>/>
								<?php echo $this->lang->line('core.enable'); ?>
							</label>
							
						</div>
					</div>

				  	<div class="form-group">
						<label for="ipt" class=" control-label col-sm-3">Public Key </label>
						<div class="col-sm-8">
							<input class="form-control input-sm" type="" name="cnf_recaptcha_public" value="<?php echo CNF_RECAPTCHA_PUBLIC ?>" placeholder="public key" />
						</div>
					</div>

				  	<div class="form-group">
						<label for="ipt" class=" control-label col-sm-3">Private Key </label>
						<div class="col-sm-8">
							<input type="" class="form-control" name="cnf_recaptcha_private" value="<?php echo CNF_RECAPTCHA_PRIVATE ?>" placeholder="private key" />
						</div>
					</div>

					<div class="form-group">
						<label class="col-sm-3"></label>
						<div class="col-sm-8">
							<button class="btn btn-primary" type="submit"><?php echo $this->lang->line('core.sb_savechanges'); ?> </button>
						</div>
					</div>

				</fieldset>	
			</div>
			
		<div class="col-sm-6"> 	
			<fieldset>
				<legend><h3><?php echo $this->lang->line('core.fr_sociallogin'); ?></h3></legend>
			
					  <div class="form-group">
							<label for="ipt" class=" control-label col-sm-3"><?php echo $this->lang->line('core.fr_loginfb'); ?> </label>
							<div class="col-sm-8">
								<label class="checkbox">
									<input type="checkbox" name="cnf_loginfb" value="true"  <?php if(CNF_LOGINFB =='true') echo 'checked';?>/>
									<?php echo $this->lang->line('core.enable'); ?>
								</label>
							</div>
						</div>
							
						<div class="form-group">
							<label for="ipt" class=" control-label col-sm-3">Id </label>
							<div class="col-sm-8">
								<input class="form-control input-sm" type="" name="cnf_loginfb_id" value="<?php echo CNF_LOGINFB_ID ?>" placeholder="key id" />
							</div>
						</div>
						
						<div class="form-group">
							<label for="ipt" class=" control-label col-sm-3">Secret </label>
							<div class="col-sm-8">
								<input class="form-control input-sm" type="" name="cnf_loginfb_secret" value="<?php echo CNF_LOGINFB_SECRET ?>" placeholder="key secret" />
							</div>
						</div>
						
					  <div class="form-group">
							<label for="ipt" class=" control-label col-sm-3"><?php echo $this->lang->line('core.fr_logingg'); ?> </label>
							<div class="col-sm-8">
								<label class="checkbox">
									<input type="checkbox" name="cnf_logingg" value="true"  <?php if(CNF_LOGINGG =='true') echo 'checked';?>/>
									<?php echo $this->lang->line('core.enable'); ?>
								</label>
							</div>
						</div>
						
						<div class="form-group">
							<label for="ipt" class=" control-label col-sm-3">Id </label>
							<div class="col-sm-8">
								<input class="form-control input-sm" type="" name="cnf_logingg_id" value="<?php echo CNF_LOGINGG_ID ?>" placeholder="key id" />
							</div>
						</div>
						
						<div class="form-group">
							<label for="ipt" class=" control-label col-sm-3">Secret </label>
							<div class="col-sm-8">
								<input class="form-control input-sm" type="" name="cnf_logingg_secret" value="<?php echo CNF_LOGINGG_SECRET ?>" placeholder="key secret" />
							</div>
						</div>
						
						
					  <div class="form-group">
							<label for="ipt" class=" control-label col-sm-3"><?php echo $this->lang->line('core.fr_logintw'); ?> </label>
							<div class="col-sm-8">
								<label class="checkbox">
									<input type="checkbox" name="cnf_logintw" value="true"  <?php if(CNF_LOGINTW =='true') echo 'checked';?>/>
									<?php echo $this->lang->line('core.enable'); ?>
								</label>
							</div>
						</div>

						<div class="form-group">
							<label for="ipt" class=" control-label col-sm-3">Id </label>
							<div class="col-sm-8">
								<input class="form-control input-sm" type="" name="cnf_logintw_id" value="<?php echo CNF_LOGINTW_ID ?>" placeholder="key id" />
							</div>
						</div>
						
						<div class="form-group">
							<label for="ipt" class=" control-label col-sm-3">Secret </label>
							<div class="col-sm-8">
								<input class="form-control input-sm" type="" name="cnf_logintw_secret" value="<?php echo CNF_LOGINTW_SECRET ?>" placeholder="key secret" />
							</div>
						</div>
						
						<div class="form-group">
							<label class="col-sm-3"></label>
							<div class="col-sm-8">
								<button class="btn btn-primary" type="submit"><?php echo $this->lang->line('core.sb_savechanges'); ?> </button>
							</div>
						</div>
				</fieldset>		
					
			</div>			

		<div class="clr"></div>	
		
		
		</div>
	</div>


</form>
</div>
</div>







