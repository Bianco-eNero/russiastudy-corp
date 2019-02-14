<div class="page-content row"> 
   <div class="page-content-wrapper m-t">   
  <!-- Nav tabs -->
  <ul class="nav nav-tabs" role="tablist">
    <li role="presentation" class="active"><a href="#home" aria-controls="home" role="tab" data-toggle="tab"> View Detail </a></li>
  <?php foreach($subgrid as $sub) : ?>
    <li role="presentation"><a href="#<?php echo str_replace(" ","_",$sub['title']) ;?>" aria-controls="profile" role="tab" data-toggle="tab"><?php echo $sub['title'] ;?></a></li>
  <?php endforeach;?>
  </ul>


  <!-- Tab panes -->
    <div class="tab-content m-t">
        <div role="tabpanel" class="tab-pane active" id="home">
            <div class="sbox" >
                 <div class="sbox-title" >
                    <h5> <?php echo $pageTitle ?> <small><?php echo $pageNote ?></small></h5>
                     <div class="sbox-tools">      
                        <a href="<?php echo site_url('{class}?return='.$return) ;?>" class="tips btn btn-xs btn-default pull-right" ><i class="fa fa fa-times"></i></a>
                        <?php if($access['is_add'] ==1) : ?>
                        <a href="<?php echo site_url('{class}/add/'.$id.'?return='.$return) ;?>" class="tips btn btn-xs btn-white pull-right" title="<?php echo $this->lang->line('core.btn_edit'); ?>"><i class="fa fa-edit"></i></a>
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
    <?php foreach($subgrid as $sub): ?>
        <div role="tabpanel" class="tab-pane" id="<?php echo str_replace(" ","_",$sub['title']) ;?>"></div>
    <?php endforeach; ?>

</div>

<script type="text/javascript">
  $(function(){
    <?php for($i=0 ; $i<count($subgrid); $i++)  :?>
      $('#<?php echo str_replace(" ","_",$subgrid[$i]['title']) ;?>').load('<?php echo  site_url("{class}/lookup/".implode("-",$subgrid["$i"])."-".$id);?>')
    <?php endfor;?>
  })

</script>
    