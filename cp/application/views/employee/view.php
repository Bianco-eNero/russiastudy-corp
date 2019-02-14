	<?php if($setting['view-method'] =='native') : ?>
	<div class="sbox">
	<div class="sbox-title" >

		<div class="sbox-tools pull-left">
			<a href="javascript:void(0)" class="tips btn btn-default btn-xs " 
			<?php if($prevnext['prev'] != ''):?> 
				onclick="Sdt_ViewDetail('#employee','<?php echo site_url('employee/show/'.$prevnext['prev'].'?return='.$return );?>'); return false; "
			<?php endif;?>	
				><i class="fa fa-arrow-left"></i>  </a>	
			<a href="javascript:void(0)" class="tips btn btn-default btn-xs" 
			<?php if($prevnext['next'] != ''):?> 
				onclick="Sdt_ViewDetail('#employee','<?php echo site_url('employee/show/'.$prevnext['next'].'?return='.$return ) ;?>'); return false; "
			<?php endif;?>	
				> <i class="fa fa-arrow-right"></i>  </a>
		</div>

		<div class="sbox-tools">
			<a href="<?php echo site_url('employee/show/'.$id.'?&print=true&return='.$return);?>" class="tips btn btn-xs btn-default" title="{{ Lang::get('core.btn_print') }}" onclick="Sdt_print(this.href); return false;"><i class="fa  fa-print"></i></a>
			<a href="javascript:void(0)" class="collapse-close pull-right btn btn-xs btn-default" onclick="Sdt_Close('#employee')"><i class="fa fa fa-times"></i></a>  
		</div>
	</div>

	<div class="sbox-content"> 
	<?php endif;?>	


		
			<table class="table table-striped table-bordered" >
				<tbody>	

					<tr>
						<td width='30%' class='label-view text-right'><?php echo SiteHelpers::activeLang('Employee Id',(isset($fields['employee_id']['language'])? $fields['employee_id']['language'] : array()))  ?></td>
						<td><?php echo $row['employee_id'] ;?> </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'><?php echo SiteHelpers::activeLang('Employee Name',(isset($fields['employee_name']['language'])? $fields['employee_name']['language'] : array()))  ?></td>
						<td><?php echo $row['employee_name'] ;?> </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'><?php echo SiteHelpers::activeLang('Employee Dob',(isset($fields['employee_dob']['language'])? $fields['employee_dob']['language'] : array()))  ?></td>
						<td><?php echo date('',strtotime($row['employee_dob'])) ;?> </td>
						
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