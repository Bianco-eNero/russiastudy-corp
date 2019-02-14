<div class="text-center">
  <h2 ><?php  echo CNF_APPNAME ;?> <small> <br /> <?php echo CNF_APPDESC ;?></small></h2>
 
</div>

<div class="sbox m-t">
  <div class="sbox-content">
    <p class="login-box-msg text-center m-t m-b">Sign in to start your session</p>
  <?php echo form_open('user/postlogin'); ?>
  
  <div class="form-group has-feedback">
    <label> Email Address  </label>
    <input type="text" name="email" value="<?php echo $email ?>" class="form-control" placeholder="Email Address">
    <i class="glyphicon glyphicon-envelope form-control-feedback"></i>
  </div>
  
  <div class="form-group has-feedback">
    <label> Password  </label>
    <input type="password" name="password" value="" class="form-control"  placeholder="Password">
    <i class="glyphicon glyphicon-lock form-control-feedback "></i>
  </div>  
  <?php if( CNF_RECAPTCHA ) { ?>
  <div class="form-group has-feedback">
    <label>Human Challenge <span class="asterix">*</span></label>
    <?php echo $recaptcha_html ?>
    <i class="icon-lock form-control-feedback"></i>
  </div>
  <?php } ?>
  
  <?php if( CNF_CICAPTCHA ) { ?>
  <div class="form-group has-feedback">
    <label>Human Challenge <span class="asterix">*</span></label>
  <?php echo $cicaptcha_html;?>
  </div>
  <?php } ?>
  
  <div class="row">
    <div class="col-xs-8">
      <a href="<?php echo site_url();?>"> Back to Site </a>  
    </div>

    <div class="col-xs-4">
      <button type="submit" class="btn btn-primary btn-sm btn-block" > Sign In</button>
    </div>
  </div>
  
 <?php echo form_close();?>  
 
  <p ><a id="or"  href="#">Forgot password ?</a> <br />
  <a class=""  href="<?php echo site_url('user/register');?>"> Create an account </a>  </p>
  
   <div >
   <form class="form-vertical box" action="<?php echo site_url('user/saveRequest'); ?>" id="fr" method="post" style="margin-top:20px; display:none;margin-bottom:30px;" >

   
       <div class="form-group has-feedback">
     <div class="">
      <label> Email Address </label>
       <input type="text" name="credit_email" value="" class="form-control">
      <i class="icon-envelope form-control-feedback"></i>
    </div>   
    </div>
    <div class="form-group has-feedback">        
          <button type="submit" class="btn btn-danger ">Reset My Password  </button>        
      </div>
    
    <div class="clr"></div>
  
  </form>
  </div>
  
  

    
    <div style="padding:15px 0;" class="text-center" >
      <?php if(CNF_LOGINFB =='true'): ?>
      <a href="<?php echo  site_url('user/hlogin/Facebook') ; ?>" class="btn btn-primary"><i class="fa fa-facebook"></i> Facebook </a>
      <?php endif; ?>
      <?php if (CNF_LOGINGG =='true')  : ?>
      <a href="<?php echo  site_url('user/hlogin/Google') ; ?>" class="btn btn-danger"><i class="fa fa-google-plus"></i> Google </a>
      <?php endif; ?>
      <?php if (CNF_LOGINTW =='true')  : ?>
      <a href="<?php echo  site_url('user/hlogin/Twitter') ; ?>" class="btn btn-info"><i class="fa fa-twitter"></i> Twitter </a>
      <?php endif; ?>
    </div>
    
     
  </div>      
    
  

  <div class="clr"></div>
  </div>
</div>

<script type="text/javascript">
$(document).ready(function(){
  $('#or').click(function(e){
    e.preventDefault();
    $('#fr').toggle();
  });
});
</script>