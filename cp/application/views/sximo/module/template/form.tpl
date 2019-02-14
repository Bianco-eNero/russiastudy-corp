<div class="page-content row">
   <div class="page-content-wrapper m-t">     
    <div class="sbox" >
    <div class="sbox-title" > <h5> <?php echo $pageTitle ?> <small><?php echo $pageNote ?></small></h5> 

      <div class="sbox-tools">
         <a href="<?php echo site_url('{class}?return='.$return) ;?>" class="tips btn btn-xs btn-white pull-right" ><i class="fa fa-arrow-circle-left"></i> Back</a>
      </div>   

    </div>
    <div class="sbox-content" >

      
     <form action="<?php echo site_url('{class}/save/'.$row['{key}'].'?return='.$return); ?>" class='form-{form_display}'  parsley-validate='true' novalidate='true' method="post" enctype="multipart/form-data" > 

    {form_entry}

    {masterdetailform}
    
      <div style="clear:both"></div>  
        
     <div class="toolbar-line text-center">    
        <button type="submit" name="apply" class="btn btn-info btn-sm"><i class="icon-checkmark-circle2"></i> <?php echo $this->lang->line('core.btn_apply'); ?></button>
         <button type="submit" name="submit" class="btn btn-primary btn-sm"><i class="icon-bubble-check"></i> <?php echo $this->lang->line('core.btn_submit'); ?></button>
         <a href="<?php echo site_url('{class}?return='.$return);?>" class="btn btn-sm btn-warning"><i class="icon-cancel-circle2"></i> <?php echo $this->lang->line('core.btn_cancel'); ?> </a>

     </div>
            
    </form>
    
    </div>
    </div>

  </div>  
</div>  
</div>
       
<script type="text/javascript">
$(document).ready(function() { 
    {form_javascript}   
    {masterdetailjs}
});
</script>     