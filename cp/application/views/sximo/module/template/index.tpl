<?php usort($tableGrid, "SiteHelpers::_sort"); ?>
<div class="page-content row">

    <div class="page-content-wrapper m-t">

        <div class="sbox" >
            <div class="sbox-title" > 

              <div class="sbox-tools pull-left">
                  <?php if($this->access['is_add'] ==1) : ?>
                  <a href="<?php echo site_url('{class}/add') ?>" class="tips btn btn-xs btn-default"  title="<?php echo $this->lang->line('core.btn_new'); ?>">
                  <i class="fa fa-plus  "></i></a>
                  <?php endif;
                  if($this->access['is_remove'] ==1) : ?>    
                  <a href="javascript:void(0);"  onclick="SximoDelete();" class="tips btn btn-xs btn-default" title="<?php echo $this->lang->line('core.btn_remove'); ?>">
                  <i class="fa fa-trash-o"></i></a>
                  <?php endif; ?>
                  <a href="<?php echo site_url( '{class}/flysearch') ;?>" class="btn btn-xs btn-default" onclick="SximoModal(this.href,'Advance Search'); return false;" ><i class="fa fa-search"></i></a> 
                  <a href="<?php echo site_url('{class}') ;?>" class="btn btn-xs btn-default tips" title="Clear Search"  ><i class="fa fa-spinner"></i>  </a>
              </div>

              <div class="sbox-tools">
              <?php  if($access['is_excel'] ==1) :?>
                  <div class="btn-group">       
                     <button type="button" class="btn btn-default btn-xs dropdown-toggle tips"  title=" <?php echo $this->lang->line('core.btn_download'); ?> "
                      data-toggle="dropdown">
                      <i class="fa fa-download"></i><span class="caret"></span>
                     </button>
                     <ul class="dropdown-menu" role="menu">
                      <li><a href="<?php echo site_url( '{class}/export/excel?return='.$return) ;?>" title="Export to Excel" > Export Excel </a></li>
                      <li><a href="<?php echo site_url( '{class}/export/word?return='.$return);?>"  title="Export to Word"> Export Word </a></li>
                      <li><a href="<?php echo site_url( '{class}/export/csv?return='.$return);?>'"   title="Export to CSV"> Export CSV</a></li>
                     </ul>

                  </div>  

                  <a href="<?php echo site_url( '{class}/export/print?return='.$return) ;?>" onclick="ajaxPopupStatic(this.href); return false;" class="tips btn btn-xs btn-default"  title=" Print ">
        <i class="fa fa-print"></i></a>     
              <?php endif;?>

                
                <?php if($this->session->userdata('gid') ==1) :?>
                    <a href="<?php echo site_url('sximo/module/config/'.$pageModule) ;?>" class="btn btn-xs btn-default tips"><i class="fa  fa-ellipsis-v"></i></a>
                <?php endif; ?> 

              </div>

  
        </div>
        <div class="sbox-content" >


        <form action='<?php echo site_url('{class}/destroy') ?>' class='form-horizontal' id ='SximoTable' method="post" >
            <div class="table-responsive">
            <table class="table table-striped ">
            <thead>
                <tr>
                    <th width="50"> No </th>
                    <th width="50"> <input type="checkbox" class="checkall" /></th>

                <?php foreach ($tableGrid as $k => $t) : ?>
                  <?php if($t['view'] =='1'): ?>
                    <th><?php echo $t['label'] ?></th>
                  <?php endif; ?>
                <?php endforeach; ?>
                    <th width="150"><?php echo $this->lang->line('core.btn_action'); ?></th>
                </tr>
            </thead>

            <tbody>
   
                 <?php foreach ( $rowData as $i => $row ) : ?>
                <tr>
                    <td width="50"> <?php echo ($i+1+$page) ?> </td>
                    <td width="50"><input type="checkbox" class="ids" name="id[]" value="<?php echo $row->{key} ?>" />  </td>
                     <?php foreach ( $tableGrid as $j => $field ) : ?>
                       <?php if($field['view'] =='1'): ?>
                       <td>
                         <?php echo SiteHelpers::formatRows($row->{$field['field']} , $field , $row ) ?>
                       </td>
                       <?php endif; ?>
                     <?php endforeach; ?>
                    <td>
                      <?php if($access['is_detail'] ==1) : ?>
                       <a href="<?php echo site_url('{class}/show/'.$row->{key}.'?return='.$return)?>"  class="tips btn btn-xs btn-default"  title=" <?php echo $this->lang->line('core.btn_view'); ?>"><i class="fa  fa-search"></i> </a>
                        <?php endif;
                        if($access['is_edit'] ==1) : ?>
                        <a  href="<?php echo site_url('{class}/add/'.$row->{key}.'?return='.$return)?>" class="tips btn btn-xs btn-default"  title="<?php echo $this->lang->line('core.btn_edit'); ?> "> <i class="fa fa-edit"></i>  </a> 
                        <?php endif;?>    
                     </td>
                </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
            </div>
        </form>
        <?php $this->load->view('footer');?>
        </div>
    </div><!-- /.sbox -->

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
