	<?php if($setting['view-method'] =='native') : ?>
	<div class="sbox">
	<div class="sbox-title" >
		<div class="sbox-tools pull-left">
			<a href="javascript:void(0)" class="tips btn btn-default btn-xs " 
			<?php if($prevnext['prev'] != ''):?> 
				onclick="Sdt_ViewDetail('#users','<?php echo site_url('core/users/show/'.$prevnext['prev'].'?return='.$return );?>'); return false; "
			<?php endif;?>	
				><i class="fa fa-arrow-left"></i>  </a>	
			<a href="javascript:void(0)" class="tips btn btn-default btn-xs" 
			<?php if($prevnext['next'] != ''):?> 
				onclick="Sdt_ViewDetail('#users','<?php echo site_url('core/users/show/'.$prevnext['next'].'?return='.$return ) ;?>'); return false; "
			<?php endif;?>	
				> <i class="fa fa-arrow-right"></i>  </a>
		</div>
		<div class="sbox-tools">
			
		<a href="<?php echo site_url('core/users/show/'.$id.'?&print=true&return='.$return);?>" class="tips btn btn-xs btn-default" title="{{ Lang::get('core.btn_print') }}" onclick="Sdt_print(this.href); return false;"><i class="fa  fa-print"></i></a>
			<a href="javascript:void(0)" class="collapse-close pull-right btn btn-xs btn-default" onclick="Sdt_Close('#users')"><i class="fa fa fa-times"></i></a>  
		</div>
	</div>

	<div class="sbox-content"> 
	<?php endif;?>	


		
			<table class="table table-striped table-bordered" >
				<tbody>	

					<tr>
						<td width='30%' class='label-view text-right'>Avatar</td>
						<td><?php echo SiteHelpers::formatRows($row['avatar'],$fields['avatar'],$row ) ;?> </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>Group</td>
						<td><?php echo SiteHelpers::formatLookUp($row['group_id'],'group_id','1:tb_groups:group_id:name') ;?> </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>Username</td>
						<td><?php echo $row['username'] ;?> </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>First Name</td>
						<td><?php echo $row['first_name'] ;?> </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>Last Name</td>
						<td><?php echo $row['last_name'] ;?> </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>Email</td>
						<td><?php echo $row['email'] ;?> </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>Created At</td>
						<td><?php echo $row['created_at'] ;?> </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>Last Login</td>
						<td><?php echo $row['last_login'] ;?> </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>Updated At</td>
						<td><?php echo $row['updated_at'] ;?> </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>Active</td>
						<td><?php echo SiteHelpers::formatRows($row['active'],$fields['active'],$row ) ;?> </td>
						
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