
  <div class="page-content row">


	<div class="page-content-wrapper m-t"> 
  

 

<div class="sbox animated fadeInUp">
	<div class="sbox-title"><h4> Sub Form (<?php echo $row->module_title ;?>) : <small> Extend Form Child </small> </h4></div>
	<div class="sbox-content">	

<?php $this->load->view('sximo/module/tab',array('active'=>'subform')); ?>

  <ul class="nav nav-tabs" style="margin-bottom:10px;">
    <li ><a href="<?php echo site_url('sximo/module/form/'.$module_name);?>"><?php echo $this->lang->line('core.mod_formtab1'); ?> </a></li> 
    <li class="active"><a href="<?php echo site_url('sximo/module/subform/'.$module_name);?>">Sub Form</a></li> 
    <li  ><a href="<?php echo site_url('sximo/module/formdesign/'.$module_name);?>"><?php echo $this->lang->line('core.mod_formtab2'); ?></a></li> 
  </ul>

  <form class="form-horizontal" action="<?php echo site_url('sximo/module/savesubform/'.$module_name);?>" method="post">

    <input  type='text' name='master' id='master'  value='<?php echo $row->module_name ;?>'  style="display:none;" /> 
    <input  type='text' name='module_id' id='module_id'  value='<?php echo $row->module_id ;?>'  style="display:none;" />

     <div class="form-group">
      <label for="ipt" class=" control-label col-md-4"> Link Title <code>*</code></label>
      <div class="col-md-8">
        <input type="text" name="title" value="<?php echo (isset($subform['title']) ? $subform['title']: null );?>" class="form-control" required="true"> 
      </div> 
    </div>   

    <div class="form-group">
      <label for="ipt" class=" control-label col-md-4">Master Key <code>*</code></label>
    <div class="col-md-8">

          <select name="master_key" id="master_key" required="true" class="form-control"> 
          <?php foreach($fields as $field) {?>
                    <option value="<?php echo $field['field'];?>" <?php if(isset($subform['master_key']) && $subform['master_key'] == $field['field']) echo 'selected';?> ><?php echo $field['field'];?></option>   
          <?php } ?>      
                </select>   
     </div> 
    </div>  

    <div class="form-group">
      <label for="ipt" class=" control-label col-md-4"> Module Target </label>
    <div class="col-md-8">
          <select name="module" id="module" required="true" class="form-control">
          <option value="">-- Select Module --</option> 
          <?php foreach($modules->result_array() as $module) {?>
            <option value="<?php echo $module['module_name'];?>" <?php if(isset($subform['module']) && $subform['module'] == $module['module_name']) echo 'selected';?> ><?php echo $module['module_title'];?></option>
          <?php } ?>
                </select>
     </div> 
    </div>  

     <div class="form-group">
      <label for="ipt" class=" control-label col-md-4">DB Table Module Target <code>*</code></label>
    <div class="col-md-8">
      <select name="table" id="table" required="true" class="form-control">       
                </select> 
     </div> 
    </div>       

     <div class="form-group">
      <label for="ipt" class=" control-label col-md-4">Detail Key <code>*</code></label>
    <div class="col-md-8">
      <select name="key" id="key" required="true" class="form-control">
      </select> 
     </div> 
    </div>     

     <div class="form-group">
      <label for="ipt" class=" control-label col-md-4"></label>
    <div class="col-md-8">
      <button name="submit" type="submit" class="btn btn-primary"><i class="icon-bubble-check"></i> Save Master Detail </button>
     <?php if(isset($subform['master_key'])) : ?>
          <a href="<?php echo site_url('sximo/module/subformremove/'.$module_name) ;?>" class="btn btn-danger"><i class="icon-cancel-circle2 "></i> Remove </a>
      <?php endif;?>
    </div> 
    </div> 
  
</form>


	
 </div>		</div></div></div>

 <script>
$(document).ready(function(){   
    $("#table").jCombo("<?php echo site_url('sximo/module/combotable') ;?>",
    {selected_value : "<?php echo (isset($subform['table']) ? $subform['table']: null );?>" }); 
    $("#key").jCombo("<?php echo site_url('sximo/module/combotablefield');?>?table=",
    { parent  :  "#table" ,selected_value : "<?php echo (isset($subform['key']) ? $subform['key']: null );?>"}); 
});
</script> 