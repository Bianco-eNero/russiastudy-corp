<div class="page-content row">
  <!-- Page header -->  
   <div class="page-content-wrapper m-t">   



    <div class="sbox" >
      <div class="sbox-title" >
        <h5> <?php echo $pageTitle ?> <small><?php echo $pageNote ?></small></h5>
        <div class="sbox-tools">
         
         <a href="<?php echo site_url('{class}?return='.$return) ;?>" class="tips btn btn-xs btn-default pull-right" ><i class="fa fa fa-times"></i></a>
      <?php if($access['is_add'] ==1) : ?>
        <a href="<?php echo site_url('{class}/add/'.$id.'?return='.$return) ;?>" class="tips btn btn-xs btn-default pull-right" title="<?php echo $this->lang->line('core.btn_edit'); ?>"><i class="fa fa-edit"></i></a>
      <?php endif; ?> 

        </div>
      </div>
      <div class="sbox-content">

          <table class="table table-striped table-bordered" >
            <tbody>  
          {form_view}
            </tbody>  
          </table>    
       
      </div>
    </div>
  </div>
  
</div>



    