		<div class="sbox-tools pull-left">
    			
				<?php if($this->access['is_add'] ==1) : ?>
					<a href="javascript:void(0)" class=" tips btn btn-default btn-xs Action_Row" title="<?php echo $this->lang->line('core.btn_create'); ?>" code="add" mode="<?php echo $setting['form-method'] ;?>"><i class="fa fa-plus"></i> </a>
				<?php endif;
				if($access['is_detail'] ==1 && $setting['view-method'] !='expand'):?>
				<a href="javascript:void(0)" class=" tips btn btn-default btn-xs Action_Row" title="<?php echo $this->lang->line('core.btn_view'); ?>" code="view" mode="<?php  echo $setting['view-method'] ;?>"><i class="fa fa-eye"></i> </a>
				<?php endif; ?>

				<?php if($access['is_edit'] ==1) : ?>
					<a href="javascript:void(0)" class=" tips btn btn-default btn-xs Action_Row" title="<?php echo $this->lang->line('core.btn_edit'); ?>" code="edit" mode="<?php echo $setting['form-method'] ;?>" ><i class="fa fa-pencil"></i> </a>	
				<?php endif;?>

				<?php if($access['is_remove'] ==1): ?>
					<a href="javascript:void(0)" class=" tips btn btn-default btn-xs Action_Row" title="<?php echo $this->lang->line('core.btn_remove'); ?>" code="remove"><i class="fa fa-trash-o"></i> </a>	
				<?php endif;?>

				  
				
					
		</div>	
    	<div class="sbox-tools pull-right ">
    						
				<a href="javascript:void(0)" class=" tips btn btn-default btn-xs Action_Row" title="Reload Data" code='reload' ><i class="fa fa-spinner"></i> </a>
				<?php 
				if($this->session->userdata('gid') ==1) : ?>	
				<a href="<?php echo site_url('sximo/module/config/{class}') ?>" class="tips btn btn-xs btn-default"  title="<?php echo $this->lang->line('core.btn_config'); ?>">
				<i class="fa  fa-ellipsis-v"></i></a>
				<?php endif; ?>	
			
		</div>
	
	