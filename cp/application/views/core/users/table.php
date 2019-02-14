<?php usort($tableGrid, "SiteHelpers::_sort"); ?>

<div class="sbox">
	<div class="sbox-title"> <?php $this->load->view('users/toolbar');?> </div>
	
	<div class="sbox-content"> 	

	 <form action='<?php echo site_url('users/destroy') ?>' class='form-horizontal' id ='usersForm' method="post" >
	 <div class="table-responsive">
    <table class="table table-striped " id="usersTable">
        <thead>
			<tr>
				<th> No </th>
				<th> <input type="checkbox" class="checkall" /></th>
				<?php if($setting['view-method']=='expand') { ?> <th>  </th> <?php } ?>	
				<?php foreach ($tableGrid as $k => $t) : ?>
					<?php if($t['view'] =='1'): ?>
						<th><?php echo SiteHelpers::activeLang($t['label'],(isset($t['language'])? $t['language'] : array()))  ?></th>
					<?php endif; ?>
				<?php endforeach; ?>
				<th width="70">Action</th>
			  </tr>
        </thead>

        <tbody>		
        	<?php if($access['is_add'] =='1' && $setting['inline']=='true'): ?>
			<tr id="form-0" >
				<td> # </td>
				<th> </th>
				<?php if($setting['view-method']=='expand') { ?> <td>  </td> <?php } ?>	
				<?php foreach ($tableGrid as $t) :
					if($t['view'] =='1') : ?>
					<td data-form="<?php echo $t['field'];?>" data-form-type="<?php echo  AjaxHelpers::inlineFormType($t['field'],$tableForm);?>">						
						<?php echo SiteHelpers::transForm($t['field'] , $tableForm) ;?>								
					</td>
					<?php endif; 
				endforeach ?>
				<td style="width:50px;">
					
					<button type="button"  class=" btn btn-xs btn-info" rel="#<?php echo $pageModule ;?>Form" 
					onclick="ajaxInlineSave('#<?php echo $pageModule ;?>','<?php echo site_url('users/quicksave') ;?>','<?php echo site_url('users/data?md=') ;?>')">
					<i class="fa fa-save"></i> </button>
				</td>
			  </tr>	
			 <?php endif;?>         
			
			<?php foreach ( $rowData as $i => $row ) : 
					 $id = $row->id;
			?>
                <tr class="editable" id="form-<?php echo $row->id ;?>">
					<td width="50"> <?php echo ($i+1+$page) ?> </td>
					<td width="50"><input type="checkbox" class="ids" name="id[]" value="<?php echo $row->id ?>" />  </td>
					<?php if($setting['view-method']=='expand'): ?>
					<td><a href="javascript:void(0)" class="expandable" rel="#row-<?php echo $row->id ;?>" data-url="<?php echo site_url('users/show/'.$id) ;?>"><i class="fa fa-plus " ></i></a></td>								
					<?php endif;?>						
				 <?php foreach ( $tableGrid as $j => $field ) : ?>
					 <?php if($field['view'] =='1'): 
							$value = $value =  SiteHelpers::formatRows($row->{$field['field']} , $field , $row );

					 ?>
						 <td align="<?php echo $field['align'];?>" data-values="<?php echo $row->$field['field'] ;?>" data-field="<?php echo  $field['field'] ;?>" data-format="<?php echo htmlentities($value);?>">					 
							<?php echo  $value;?>						 
						 </td>
					 <?php endif; ?>
				 <?php endforeach; ?>
				 <td data-values="action" data-key="<?php echo $row->id ;?>">
					<?php echo AjaxHelpers::buttonAction('users',$access,$row->id ,$setting , $return);
						  echo AjaxHelpers::buttonActionInline($row->id,'id') ;
					?>	
				</td>				 
                </tr>
               <?php if($setting['view-method']=='expand'): ?>
                <tr style="display:none" class="expanded" id="row-<?php echo $row->id;?>">
                	<td class="number"></td>
                	<td></td>
                	<td></td>
                	<td colspan="<?php echo $colspan;?>" class="data"></td>
                	<td></td>
                </tr>
               <?php endif;?>	
            <?php endforeach; ?>

        </tbody>

    </table>
	</div>
	</form>
	
	<?php $this->load->view('ajaxfooter');?>
	</div>
</div>
	</div>
</div>	
<?php if($setting['inline'] =='true')  $this->load->view('sximo/module/utility/inlinegrid') ;?>
<?php if($setting['view-method'] =='expand')  $this->load->view('sximo/module/utility/extendgrid') ;?>
<script>
$(document).ready(function(){
	$('.tips').tooltip();	
	$('input[type="checkbox"],input[type="radio"]').iCheck({
		checkboxClass: 'icheckbox_square-red',
		radioClass: 'iradio_square-red',
	});	
	$('#usersTable .checkall').on('ifChecked',function(){
		$('#usersTable input[type="checkbox"]').iCheck('check');
	});
	$('#usersTable .checkall').on('ifUnchecked',function(){
		$('#usersTable input[type="checkbox"]').iCheck('uncheck');
	});	
	$('.date').datepicker({format:'yyyy-mm-dd',autoClose:true})
	$('#usersPaginate .pagination li a').click(function() {
		var url = $(this).attr('href');
		if(url != '') {
			reloadData('#users',url);		
		}			
		return false ;
	});	

});	
</script>
