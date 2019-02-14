
  <div class="page-content row">
    <!-- Page header --> 


 	<div class="page-content-wrapper m-t">  
	     
	
	<div class="sbox">

	<ul class="nav nav-tabs" >
	  	<li>
	  		<?php foreach(SiteHelpers::langOption() as $t_lang) : ?>
	  			<?php if ($t_lang !="." and $t_lang !=".." and $t_lang !='info.json'): ?>		  			
			  	<li <?php if($this->input->get('edit') == $t_lang['folder']) echo 'class="active"' ?>>
			  		<a href="<?php echo site_url('sximo/config/getTranslationEdit?edit='.$t_lang['folder']);?>">
			  		<i class="fa fa-flag"></i> <?php echo $t_lang['name'] ;?>
			  		</a>
				</li>
				<?php endif ?>
			<?php endforeach;?>	
	  	</li>
	  	<li><a href="#" onclick="SximoModal('<?php echo site_url('sximo/config/addTranslation') ?>','Add New Language');return false;"><i class="fa fa-plus"></i></a></li>
	</ul>

		<div class="sbox-title"><h4> Languange Manager </h4></div>
		<div class="sbox-content">

		<?php $this->load->view('sximo/config/tab',array('active'=>'getTranslation'));?>

	<div class="table-responsive box" style="padding:5px;">
		<ul class="nav nav-tabs">
		<?php foreach($files as $f): ?>
			<?php if($f != "." and $f != ".." and $f != 'info.json') : ?>
			<li <?php if($file == $f) echo 'class="active"' ?> ><br>

			<a href="<?php echo site_url('sximo/config/getTranslationEdit?edit='.$lang.'&file='.$f) ?>"><?php echo $f ?> </a></li>
			<?php endif ?>
		<?php endforeach ?>
		</ul>
		<hr />
		 <?php echo form_open('sximo/config/postSavetranslation/add') ?>
		<table class="table table-striped">
			<thead>
				<tr>
					<th> Pharse </th>
					<th> Translation </th>

				</tr>
			</thead>
			<tbody>	
				
				<?php
				 foreach($stringLang as $key => $val) : 
					if(!is_array($val)) 
					{
					?>
					<tr>	
						<td><?php echo $key ;?></td>
						<td><input type="text" name="<?php echo $key ;?>" value="<?php echo $val ;?>" class="form-control" />
						
						</td>
					</tr>
					<?php 
					} else {
						foreach($val as $k=>$v)
						{ ?>
							<tr>	
								<td><?php echo $key .' - '.$k ;?></td>
								<td><input type="text" name="<?php echo $key ;?>[<?php echo $k ;?>]" value="<?php echo $v ;?>" class="form-control" />
								
								</td>
							</tr>						
						<?php }
					}
				endforeach; ?>
			</tbody>
			
		</table>
		<input type="hidden" name="lang" value="<?php echo $lang ?>"  />
		<input type="hidden" name="file" value="<?php echo $file ?>"  />
		<button type="submit" class="btn btn-info"> Save Translation</button>
		<?php echo form_close() ?>

	</div> 
	</div> 
	</div>
	<div class="clr"></div>
	</div>

</div>





