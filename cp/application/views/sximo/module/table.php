  <?php 
	$formats = array(
			'date'	=> 'Date',
			'image'	=> 'Image',
			'link'	=> 'Link',
			'file'	=> 'Files',
			'radio'		=> 'Checkbox/Radio',
			'function'	=> 'Function'
		);
?>
  <div class="page-content row">

	 <div class="page-content-wrapper m-t"> 
	
	<?php echo $this->session->flashdata('message');?>
	<form class="form-vertical" action="<?php echo site_url('sximo/module/savetable/'.$module_name);?>" method="post">

<div class="sbox animated fadeInRight">
	<div class="sbox-title"><h4> Table Grid  </h4></div>
	<div class="sbox-content">	

	<?php $this->load->view('sximo/module/tab',array('active'=>'table')); ?>

	
	 <div class="table-responsive">
			<table class="table table-striped table-bordered" id="table">
			<thead class="no-border">
			  <tr>
				<th scope="col">No</th>
				<th scope="col">Table</th>
				<th scope="col">Field</th>
				<th scope="col"><i class="icon-link"></i></th>
				<th scope="col" data-hide="phone"><?php echo $this->lang->line('core.mod_thcaption'); ?> </th>
				<th scope="col" data-hide="phone"> <?php echo $this->lang->line('core.grid_show'); ?> <br /> <input type="checkbox" class="checkallShow" />   </th>
				<th scope="col" data-hide="phone"><?php echo $this->lang->line('core.btn_view'); ?> <br /><input type="checkbox" class="checkallView" />   </th>
				<th scope="col" data-hide="phone"> <?php echo $this->lang->line('core.mod_thsortable'); ?> <br /><input type="checkbox" class="checkallSort" />  </th>
				<th scope="col" data-hide="phone"> <?php echo $this->lang->line('core.btn_download'); ?> <br /> <input type="checkbox" class="checkallDw" />  </th>
				<th scope="col" data-hide="phone"> Formatter  </th>
			  </tr>
			 </thead> 
			<tbody class="no-border-x no-border-y">	
			<?php usort($tables, "SiteHelpers::_sort"); ?>
			  <?php $num=0; foreach($tables as $rows){
					$id = ++$num;
			  ?>
			  <tr >
				<td class="index"><?php echo $id;?></td>
				<td><?php echo $rows['alias'];?></td>
				<td ><strong><?php echo $rows['field'];?></strong>
				<input type="hidden" name="field[<?php echo $id;?>]" id="field" value="<?php echo $rows['alias'];?>" />			</td>
				<td >
				<span class=" xlick  tips"
					onclick="SximoModal('<?php echo site_url('sximo/module/conn/'.$row->module_id.'?field='.$rows['field'].'&alias='.$rows['alias']) ;?>' ,' Connect Field : <?php echo $rows['field'];?> ' )"
					>
						<i class="fa fa-external-link"></i>
					</span>
				</td>
				<td >    
					<div class="input-group input-group">
					<span class="input-group-addon xlick bg-default btn-xs " >En</span>				
					<input name="label[<?php echo $id;?>]" type="text" class="form-control input-sm " 
					id="label" value="<?php echo $rows['label'];?>" /></div>

				  <?php $lang = SiteHelpers::langOption();
					foreach($lang as $l) { if($l['folder'] !='en') {
				   ?>
				   <div class="input-group input-group" style="margin:1px 0 !important;">
				   <span class="input-group-addon xlick bg-default btn-sm " ><?php echo strtoupper($l['folder']);?></span>
					 <input name="language[<?php echo $id;?>][<?php echo $l['folder'];?>]" type="text" class="form-control input-sm " 
					 value="<?php echo (isset($rows['language'][$l['folder']]) ? $rows['language'][$l['folder']] : '');?>" />
					 
				  </div>
				  <?php } } ?>

				</td>				
				<td>
				<label >
				<input name="view[<?php echo $id;?>]" type="checkbox" id="view" class="cShow" value="1" 
				<?php if($rows['view'] == 1) echo 'checked="checked"';?>/>
				</label>
				</td>
				<td>
				<label >
				<input name="detail[<?php echo $id;?>]" type="checkbox" id="detail" class="cView"  value="1" 
				<?php if($rows['detail'] == 1) echo 'checked="checked"';?>/>
				</label>
				</td>
				<td>
				<label >
				<input name="sortable[<?php echo $id;?>]" type="checkbox" id="sortable" class="cSort"  value="1" 
				<?php if($rows['sortable'] == 1) echo 'checked="checked"';?>/>
				</label>
				</td>
				<td>
				<label >
				<input name="download[<?php echo $id;?>]" type="checkbox" id="download" class="cDw"  value="1" 
				<?php if($rows['download'] == 1) echo 'checked="checked"';?>/>
				</label>
				</td>
				<td>
				<select class="select-alt" name="format_as[<?php echo $id;?>]">
					<option value=''> None </option>
					<?php foreach($formats as $key=>$val) : ?>
					<option value="<?php echo $key ;?>" <?php if(isset($rows['format_as']) && $rows['format_as'] ==$key) echo 'selected';?> > <?php echo $val ;?> </option>
					<?php endforeach; ?>
				</select>	
				
				<input type="text" name="format_value[<?php echo $id;?>]" value="<?php if(isset($rows['format_value'])) echo $rows['format_value'];?>" class="form-control" style="width:auto !important; display:inline;">

				<button type="button" data-html="true" class="btn btn-xs btn-info format_info" data-toggle="popover" title="Example Usage" data-content="  <b>Data </b> = dd-yy-mm <br /> <b>Image</b> = /uploads/path_to_upload <br />  <b>Link </b> = http://domain.com ?" data-placement="left">?</button>


				
				<input type="hidden" name="frozen[<?php echo $id;?>]" value="<?php echo $rows['frozen'];?>" />
				<input type="hidden" name="search[<?php echo $id;?>]" value="<?php echo $rows['search'];?>" />
				<input type="hidden" name="hidden[<?php echo $id;?>]" value="<?php if(isset($rows['hidden'])) echo $rows['hidden'];?>" />
				<input type="hidden" name="align[<?php echo $id;?>]" value="<?php if(isset($rows['align'])) echo $rows['align'];?>" />
				<input type="hidden" name="width[<?php echo $id;?>]" value="<?php echo $rows['width'];?>" />
				<input type="hidden" name="alias[<?php echo $id;?>]" value="<?php echo $rows['alias'];?>" />
				<input type="hidden" name="field[<?php echo $id;?>]" value="<?php echo $rows['field'];?>" />
				<input type="hidden" name="sortlist[<?php echo $id;?>]" class="reorder" value="<?php echo $rows['sortlist'];?>" />

				<input type="hidden" name="attr_link_html[<?php echo $id;?>]" class="form-control input-sm"  value="" />	
				<input type="hidden" name="attr_image_width[<?php echo $id;?>]" />  
				<input type="hidden" name="attr_image_height[<?php echo $id;?>]" />
				<input type="hidden" name="attr_image_html[<?php echo $id;?>]"    />	
				<input type="hidden" name="conn_valid[<?php echo $id;?>]"   
				value="<?php if(isset($rows['conn']['valid'])) echo $rows['conn']['valid'];?>"  />
				<input type="hidden" name="conn_db[<?php echo $id;?>]"   
				value="<?php if(isset($rows['conn']['db'])) echo $rows['conn']['db'];?>"  />	
				<input type="hidden" name="conn_key[<?php echo $id;?>]"  
				value="<?php if(isset($rows['conn']['key'])) echo  $rows['conn']['key'];?>"   />
				<input type="hidden" name="conn_display[<?php echo $id;?>]" 
				value="<?php if(isset($rows['conn']['display'])) echo   $rows['conn']['display'];?>"    />			 
				
				</td>
				
			  </tr>
			  <?php } ?>
			  </tbody>
			</table>
			</div>
	 <div class="infobox infobox-info fade in">
	  <button type="button" class="close" data-dismiss="alert"> x </button>  
	  <p><?php echo $this->lang->line('core.mod_tabletips_b'); ?> </p>
	</div>	
					
			<button type="submit" class="btn btn-primary"> <?php echo $this->lang->line('core.sb_savechanges'); ?> </button>
			<input type="hidden" name="module_id" value="<?php echo $row->module_id ;?>" />
			</form>
		
	</div>	
</div></div>
<style type="text/css">
	.xlick { width: 50px; } 
</style>
<script>
$(document).ready(function() {

	 $('#table').DataTable();
	$('.format_info').popover()
	var fixHelperModified = function(e, tr) {
		var $originals = tr.children();
		var $helper = tr.clone();
		$helper.children().each(function(index) {
			$(this).width($originals.eq(index).width())
		});
		return $helper;
		},
		updateIndex = function(e, ui) {
			$('td.index', ui.item.parent()).each(function (i) {
				$(this).html(i + 1);
			});
			$('.reorder', ui.item.parent()).each(function (i) {
				$(this).val(i + 1);
			});			
		};
		
	$("#table tbody").sortable({
		helper: fixHelperModified,
		stop: updateIndex
	});	

	$('.exp-formater').click(function(){
		$('.formater').hide();
		val = $(this).attr('rel');

		$('#'+val).slideToggle('slow');
	});	

	$('#table .checkallShow').on('ifChecked',function(){
		$('#table input.cShow').iCheck('check');
	});
	$('#table .checkallShow').on('ifUnchecked',function(){
		$('#table input.cShow').iCheck('uncheck');
	});		

	$('#table .checkallView').on('ifChecked',function(){
		$('#table input.cView').iCheck('check');
	});
	$('#table .checkallView').on('ifUnchecked',function(){
		$('#table input.cView').iCheck('uncheck');
	});	

	$('#table .checkallSort').on('ifChecked',function(){
		$('#table input.cSort').iCheck('check');
	});	

	$('#table .checkallSort').on('ifUnchecked',function(){
		$('#table input.cSort').iCheck('uncheck');
	});	

	$('#table .checkallDw').on('ifChecked',function(){
		$('#table input.cDw').iCheck('check');
	});
	$('#table .checkallDw').on('ifUnchecked',function(){
		$('#table input.cDw').iCheck('uncheck');
	});	
					
});
</script>
<style>
	.xlick { cursor:pointer;}
	.popover { width:600px;}
	.formater { display: none;}
</style>
