	<?php if($setting['view-method'] =='native') : ?>
	<div class="sbox">
	<div class="sbox-title" >
		<div class="sbox-tools">
			<a href="javascript:void(0)" class="collapse-close pull-right btn btn-xs btn-default" onclick="Sdt_Close('#groups')"><i class="fa fa fa-times"></i></a>  
		</div>
	</div>

	<div class="sbox-content"> 
	<?php endif;?>	


		
			<table class="table table-striped table-bordered" >
				<tbody>	

					<tr>
						<td width='30%' class='label-view text-right'><?php echo SiteHelpers::activeLang('Group',(isset($fields['group_id']['language'])? $fields['group_id']['language'] : 'ID'))  ?></td>
						<td><?php echo $row['group_id'] ;?> </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'><?php echo SiteHelpers::activeLang('Name',(isset($fields['name']['language'])? $fields['name']['language'] :'Name'))  ?></td>
						<td><?php echo $row['name'] ;?> </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'><?php echo SiteHelpers::activeLang('description',(isset($fields['name']['language'])? $fields['description']['language'] : array()))  ?></td>
						<td><?php echo $row['description'] ;?> </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'><?php echo SiteHelpers::activeLang('level',(isset($fields['level']['language'])? $fields['level']['language'] : array()))  ?></td>
						<td><?php echo $row['level'] ;?> </td>
						
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