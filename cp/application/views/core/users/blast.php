<div class="page-content row">

  
 <div class="page-content-wrapper m-t">  
    <!-- Start blast email -->
<div class="sbox"  >
  <div class="sbox-title" >  
  
  </div>
  <div class="sbox-content" style="min-height: 500px;">

<ul class="nav nav-tabs" style="margin-bottom:10px;">
  <li  ><a href="<?php echo site_url('core/users');?>"><i class="icon-user"></i> <?php echo $this->lang->line('core.m_users'); ?> </a></li>
  <li ><a href="<?php echo site_url('core/groups');?>"><i class="icon-users"></i> <?php echo $this->lang->line('core.m_groups'); ?> </a></li>
  <li class="active" ><a href="<?php echo site_url('core/users/blast');?>"><i class="icon-mail-send"></i> <?php echo $this->lang->line('core.m_blastemail'); ?> </a> </li>
</ul>

  <form class="form-horizontal row" action="<?php echo site_url('core/users/doblast');?>" method="post" parsley-validate novalidate >
      
    <div class="col-sm-6">
          <div class="form-group  " >
          <label for="ipt" class=" control-label col-md-3"><?php echo $this->lang->line('core.fr_emailsubject'); ?> </label>
          <div class="col-md-9">
          <input type="text" name="subject" class="form-control" required="true" />
           </div> 
          </div> 
          <div class="form-group  " >
          <label for="ipt" class=" control-label col-md-3"><?php echo $this->lang->line('core.fr_emailsendto'); ?> </label>
          <div class="col-md-9">
           <?php foreach($groups->result() as $row) {?>
            <label class="checkbox">
                <input type="checkbox" required  name="groups[]" value="<?php echo  $row->group_id;?>" /> <?php echo $row->name ;?>
            </label>
      <?php } ?>  
           </div> 
          </div>        
      
</div>
<div class="col-sm-6">
          <div class="form-group  " >
          <label for="ipt" class=" control-label col-md-3"><?php echo $this->lang->line('core.status'); ?> </label>
          <div class="col-md-9">          
            <label class="radio">
              <input type="radio" required  name="uStatus" value="all" > All Status
            </label>
            <label class="radio">
              <input type="radio" required name="uStatus" value="1" > Active 
            </label>  
            <label class="radio">
              <input type="radio" required name="uStatus" value="0" > Unconfirmed
            </label>
            <label class="radio">
              <input type="radio" required name="uStatus" value="2"> Blocked
            </label>                                
           </div> 
          </div>  
</div>
 
 <div class="col-sm-12">


 
          <div class="form-group "  >
         
          <div style=" padding:10px;">
       <label for="ipt" class=" control-label "><?php echo $this->lang->line('core.fr_emailmessage'); ?> </label>
           <textarea class="form-control markItUp" rows="15" required name="message"></textarea> 
       </div>
           <p><?php echo $this->lang->line('core.t_availfield'); ?> :  : </p>
           <small> [fullname] [first_name] [last_name] [email]  </small>
         
          </div> 

            
                    

          
          <div class="form-group" >
          <label for="ipt" class=" control-label col-md-3"> </label>
          <div class="col-md-9">
              <button type="submit" name="submit" class="btn btn-primary"><?php echo $this->lang->line('core.t_sendbulkemail'); ?> </button>
           </div> 
          </div> 
  </div>                     
    </form>

</div></div>
</div></div>
