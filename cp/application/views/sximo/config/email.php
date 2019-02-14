
  <div class="page-content row">
    <!-- Page header -->


 <div class="page-content-wrapper m-t">  
		  	
	
	 <form class="form-vertical" action="<?php echo site_url('sximo/config/postEmail');?>" method="post">
	
	

<div class="sbox  "> 
	<div class="sbox-title"><h4>Email Template  <small> Edit template email </small></h4></div>
	<div class="sbox-content"> 	

		<?php $this->load->view('sximo/config/tab',array('active'=>'email'));?>	

		<div class="col-sm-6">
	
			<fieldset > <legend><?php echo $this->lang->line('core.fr_newaccountinfo'); ?>  </legend>
				  <div class="form-group">
					<label for="ipt" class=" control-label"><?php echo $this->lang->line('core.t_emailtemplate'); ?> </label>		
					<textarea rows="20" name="regEmail" class="form-control input-sm  markItUp"><?php echo $regEmail ;?></textarea>		
				  </div>  
				

				<div class="form-group">  
				<label for="ipt" class=" control-label col-md-4"> </label>
					<div class="col-md-8">  
						<button class="btn btn-primary" type="submit"><?php echo $this->lang->line('core.sb_savechanges'); ?> </button>	 
					</div>
				</div>
		
	  		</fieldset>

  		</div>

  		<div class="col-sm-6">

			 <fieldset> <legend><?php echo $this->lang->line('core.forgotpassword'); ?> </legend>
		  
				
				  <div class="form-group">
					<label for="ipt" class=" control-label "><?php echo $this->lang->line('core.t_emailtemplate'); ?> </label>
					
					<textarea rows="20" name="resetEmail" class="form-control input-sm markItUp"><?php echo $resetEmail ;?></textarea>
					 
				  </div> 
			  <div class="form-group">
				<label for="ipt" class=" control-label col-md-4"> </label>
				<div class="col-md-8">
					<button class="btn btn-primary" type="submit"><?php echo $this->lang->line('core.sb_savechanges'); ?> </button>
				 </div> 
			 
			  </div>	  
			 </fieldset>


  		</div>
  		<div class="clr "></div>
	</div>
</div>



</div> 

 </form>
</div>
</div>




