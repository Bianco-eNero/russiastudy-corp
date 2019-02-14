
  <div class="page-content row">
    <!-- Page header -->

	<div class="page-content-wrapper m-t">  	
    


<?php echo form_open('sximo/config/getTranslation/'); ?> 

<div class="sbox  "> 
	<div class="sbox-title"><h4> Languange Manager </h4></div>
	<div class="sbox-content"> 
		
		<?php $this->load->view('sximo/config/tab',array('active'=>'getTranslation'));?>
			<hr /> 
		<a href="<?php echo site_url('sximo/config/addTranslation') ?>" onclick="SximoModal(this.href,'Add New Language');return false;" class="btn btn-success"><i class="fa fa-plus"></i> Add New Translation </a>  
		
		<table class="table table-striped">
			<thead>
				<tr>
					<th> Name </th>
					<th> Folder </th>
					<th> Author </th>
					<th> Action </th>
				</tr>
			</thead>
			<tbody>		
		
			<?php foreach(SiteHelpers::langOption() as $lang) : ?>
				<tr>
					<td><?php echo $lang['name'] ?></td>
					<td><?php echo $lang['folder'] ?></td>
					<td><?php echo $lang['author'] ?></td>
				  	<td>
					<?php if($lang['folder'] !='en') : ?>
					<a href="<?php echo site_url('sximo/config/getTranslationEdit?edit='.$lang['folder']) ?>" class="btn btn-sm btn-primary"> Manage </a>
					<a href="<?php echo site_url('sximo/config/getRemovetranslation/'.$lang['folder']) ?>" class="btn btn-sm btn-danger"> Delete </a> 
					<?php endif;?>
				
				</td>
				</tr>
			<?php endforeach ?>
			
			</tbody>
		</table>
		</div>
	</div>




 	
 </div>
<?php echo form_close('') ?> 
</div>
</div>






