	<?php if($setting['view-method'] =='native') : ?>
	<div class="sbox">
	<div class="sbox-title" >
		<div class="sbox-tools">
			<a href="javascript:void(0)" class="collapse-close pull-right btn btn-xs btn-default" onclick="Sdt_Close('#pages')"><i class="fa fa fa-times"></i></a>  
		</div>
	</div>

	<div class="sbox-content"> 
	<?php endif;?>	


		
			<table class="table table-striped table-bordered" >
				<tbody>	

					<tr>
						<td width='30%' class='label-view text-right'>Title</td>
						<td><?php echo $row['title'] ;?> </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>Slug</td>
						<td><?php echo $row['alias'] ;?> </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>Filename</td>
						<td><?php echo $row['filename'] ;?> </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>Status</td>
						<td><?php echo $row['status'] ;?> </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>Allow Guest</td>
						<td><?php echo $row['allow_guest'] ;?> </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>Template</td>
						<td><?php echo $row['template'] ;?> </td>
						
					</tr>
										
				</tbody>	
			</table>    

		<?php foreach($subgrid as $md) : ?>
		<hr />
		<div  id="<?php echo  $md['module'] ;?>">
			<h4><i class="fa fa-table"></i> <?php echo  $md['title'] ;?></h4>
			<div id="<?php echo  $md['module'] ;?>View"></div>
			<div class="table-responsive">
				<div id="<?php echo  $md['module'] ;?>Grid-<?php echo $id;?>"></div>
			</div>	
		</div>
		<hr />
		<?php endforeach;?>	

	<?php if($setting['form-method'] =='native'): ?>
		</div>	
	</div>	
	<?php endif;?>	
<script>
$(document).ready(function(){
<?php foreach($subgrid as $md) : ?>
	$.post( '<?php echo site_url($md['module'].'/detailview?md='.$md['master'].'+'.$md['master_key'].'+'.$md['module'].'+'.$md['key'].'+'.$id) ;?>' ,function( data ) {
		$( '#<?php echo $md['module'] ;?>Grid-<?php echo $id;?>' ).html( data );
	});		
<?php endforeach ?>
});
</script>		  