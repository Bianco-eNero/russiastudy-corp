
  <div class="page-content row">

	<div class="page-content-wrapper m-t"> 
 
  <?php echo $this->session->flashdata('message');?>

<div class="sbox animated fadeInUp">
	<div class="sbox-title"><h4> Master Detail  <small> Create master detail module </small> </h4></div>
	<div class="sbox-content">	

   <?php $this->load->view('sximo/module/tab',array('active'=>'sub')); ?>
   
  <form class="form-horizontal" action="<?php echo site_url('sximo/module/savesub/'.$module_name);?>" method="post">

    <input  type='text' name='master' id='master'  value='<?php echo $row->module_name ;?>'  style="display:none;" /> 
    <input  type='text' name='module_id' id='module_id'  value='<?php echo $row->module_id ;?>'  style="display:none;" />

     <div class="form-group">
      <label for="ipt" class=" control-label col-md-4"> Link Title <code>*</code></label>
      <div class="col-md-8">
        <input type="text" name="title" value="" class="form-control" required="true"> 
      </div> 
    </div>   

    <div class="form-group">
      <label for="ipt" class=" control-label col-md-4">Master Key <code>*</code></label>
    <div class="col-md-8">

          <select name="master_key" id="master_key" required="true" class="form-control"> 
          <?php foreach($fields as $field) {?>
                    <option value="<?php echo $field['field'];?>" ><?php echo $field['field'];?></option>   
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
            <option value="<?php echo $module['module_name'];?>"  ><?php echo $module['module_title'];?></option>
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
      <button name="submit" type="submit" class="btn btn-primary"> Save Master Detail </button>
     </div> 
    </div> 
  
</form>

    <div class="table-responsive" style="margin-bottom:40px;">

    <table class="table table-striped" id="table">
    <thead class="no-border">
      <tr>
        <th >Title</th>
        <th >Master Key</th>
        <th >Module Class</th>
        <th data-hide="phone">Database Table</th>
        <th data-hide="phone">Relation Key</th>
        <th data-hide="phone">Action</th>
      </tr>
    </thead>
    <tbody class="no-border-x no-border-y"> 
      <?php foreach($subs as $rows) :?>
      <tr>
        <td><?php echo $rows['title'];?></td>
        <td><?php echo $rows['master_key'];?></td>
        <td><?php echo $rows['module'];?></td>
        <td><?php echo $rows['table'];?></td>
        <td><?php echo $rows['key'];?></td>
        <td><a  href="javascript:void(0)" 
        onclick="SximoConfirmDelete('<?php echo site_url('sximo/module/removesub?id='.$row->module_id.'&mod='.$rows['module']) ;?>');" 
        class="btn btn-danger btn-xs"><i class="fa fa-trash-o"></i> </a></td>
      
      </tr>
      <?php endforeach;?>   
      
      
    </tbody>      
     
    </table>      

    </div>
	
 </div>		</div></div></div>

 <script>
$(document).ready(function(){   
    $("#table").jCombo("<?php echo site_url('sximo/module/combotable') ;?>",
    { }); 
    $("#key").jCombo("<?php echo site_url('sximo/module/combotablefield');?>?table=",
    { parent  :  "#table"}); 
});
</script> 