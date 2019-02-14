  <?php usort($tableGrid, "SiteHelpers::_sort"); ?>
  <div class="page-content row">

	<div class="page-content-wrapper m-t">

        <div class="sbox" >
            <div class="sbox-title" >           
               <h5><i class="icon-table"></i> <?php echo $pageTitle ?> <small><?php echo $pageNote ?></small></h5>
                <div class="sbox-tools" >
                    <a href="<?php echo site_url('{class}') ;?>" class="btn btn-xs btn-white tips"  ><i class="fa fa-trash-o"></i> Clear </a>
                <?php if($this->session->userdata('gid') ==1) :?>
                    <a href="<?php echo site_url('sximo/module/config/'.$pageModule) ;?>" class="btn btn-xs btn-white tips"><i class="fa fa-cog"></i></a>
                <?php endif; ?> 
                </div>   
            </div>
        <div class="sbox-content" >


    <div class="toolbar-line ">		
		<?php
		if($this->access['is_excel'] ==1) : ?>	
		<a href="<?php echo site_url('{class}/download') ?>" class="tips btn btn-xs btn-default" title="Download">
		<i class="fa fa-download"></i>&nbsp;Download</a>
		<?php endif;
		if($this->session->userdata('gid') ==1) : ?>	
		<a href="<?php echo site_url('sximo/module/config/{class}') ?>" class="tips btn btn-xs btn-default"  title="Configuration">
		<i class="fa fa-cog"></i>&nbsp;Configuration</a>
		<?php endif; ?>		

	</div>
	 <form action='<?php echo site_url('{class}/destroy') ?>' class='form-horizontal' id ='SximoTable' method="post" >
	 <div class="table-responsive">
    <table class="table table-striped ">
        <thead>
			<tr>
				<th> No </th>
				<?php foreach ($tableGrid as $k => $t) : ?>
					<?php if($t['view'] =='1'): ?>
						<th><?php echo $t['label'] ?></th>
					<?php endif; ?>
				<?php endforeach; ?>
			  </tr>
        </thead>

        <tbody>
			<tr >
			<?php foreach ( $rowData as $i => $row ) : ?>
                <tr>
					<td width="50"> <?php echo ($i+1+$page) ?> </td>
				 <?php foreach ( $tableGrid as $j => $field ) : ?>
					 <?php if($field['view'] =='1'): ?>
					 <td>
					 	<?php echo SiteHelpers::formatRows($row->{$field['field']} , $field , $row ) ?>
					 </td>
					 <?php endif; ?>
				 <?php endforeach; ?>
                </tr>

            <?php endforeach; ?>

        </tbody>

    </table>
	</div>
	</form>
	
	<?php $this->load->view('footer');?>
	</div></div>

	</div>
</div>

<script>
$(document).ready(function(){

	$('.do-quick-search').click(function(){
		$('#SximoTable').attr('action','<?php echo site_url("{class}/multisearch");?>');
		$('#SximoTable').submit();
	});
	
});	
</script>
