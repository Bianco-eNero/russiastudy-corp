<!DOCTYPE html>
<!--[if IE 8]>			<html class="ie ie8"> <![endif]-->
<!--[if IE 9]>			<html class="ie ie9"> <![endif]-->
<!--[if gt IE 9]><!-->	<html> <!--<![endif]-->
	<head>
		<meta charset="utf-8" />
		<title><?php echo CNF_APPNAME ;?> | <?php echo $pageTitle;?></title>
		<meta name="keywords" content="<?php echo (isset($pageMetakey)? $pageMetakey : '') ;?>" />
		<meta name="description" content="<?php echo (isset($pageMetadesc) ? $pageMetadesc : '');?>" />
		<meta name="Author" content="Mangopik [www.mangopik.com]" />

		<!-- mobile settings -->
		<meta name="viewport" content="width=device-width, maximum-scale=1, initial-scale=1, user-scalable=0" />
		<!--[if IE]><meta http-equiv='X-UA-Compatible' content='IE=edge,chrome=1'><![endif]-->
		<link rel="shortcut icon" href="<?php echo base_url('favicon.ico');?>" type="image/x-icon"> 

		<!-- GOOGLE WEB FONTS  -->
		<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400%7CRaleway:300,400,500,600,700%7CLato:300,400,400italic,600,700" rel="stylesheet" type="text/css" />
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">    

		<link href="<?php echo base_url('sximo/themes/bootstrap/css/bootstrap.css') ;?>" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url('sximo/themes/bootstrap/css/animate.css') ;?>" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url('sximo/themes/bootstrap/css/sximo.css') ;?>" rel="stylesheet" type="text/css" />

		<script type="text/javascript" src="<?php echo base_url("sximo/themes/bootstrap/js/jquery.min.js") ;?>" ></script>
		<script type="text/javascript" src="<?php echo base_url("sximo/themes/bootstrap/js/bootstrap.js") ;?>"></script>
    <script type="text/javascript" src="<?php echo base_url('sximo/sximo/js/plugins/parsley.js') ;?>"></script>
    <script type="text/javascript" src="<?php echo base_url('sximo/js/plugins/prettify.js') ;?>"></script>

    
    <script type="text/javascript" src="<?php echo base_url('sximo/js/plugins/jquery.jCombo.min.js') ;?>"></script>
    
    
    
	</head>
<body>		



<nav class="navbar-fixed-top navbar-default">
  <div class="container">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="<?php echo site_url('') ;?>"><?php echo CNF_APPNAME ;?></a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <?php $this->load->view('layouts/bootstrap/menu');?>
      
      <ul class="nav navbar-nav navbar-right">

           <?php if(CNF_MULTILANG ==1)  :?>  

              <?php 
              $flag ='en';
              $langname = 'English'; 
              foreach(SiteHelpers::langOption() as $lang):
                if($lang['folder'] == $pageLang or $lang['folder'] == CNF_LANG) {
                  $flag = $lang['folder'];
                  $langname = $lang['name']; 
                }
              endforeach;?>
            <li>
              <a class="dropdown-toggle no-text-underline" data-toggle="dropdown" href="#"><img class="flag-lang" src="<?php echo base_url('sximo/images/flags/'.$flag.'.png') ;?>" width="16" height="11" alt="lang" /> <?php echo $langname ;?> <span class="caret"></span></a>
              <ul class="dropdown-langs dropdown-menu">
                @foreach(SiteHelpers::langOption() as $lang)
                <li><a tabindex="-1" href="<?php echo site_url('home/lang/'.$lang['folder']);?>"><img class="flag-lang" src="<?php echo base_url('sximo/images/flags/'.$lang['folder'].'.png') ;?>" width="16" height="11" alt="lang" /> <?php echo  $lang['name'] ;?></a></li>
                @endforeach
                
              </ul>
            </li>
            <?php endif;?>
            

        <li><a href="javascript://ajax" class="dropdown-toggle" data-toggle="dropdown"> My Account</a>
           <ul class="dropdown-menu dropdown-menu-right">
             <?php if(!$this->session->userdata('logged_in')):?> 
              <li><a href="<?php  echo site_url('user/login') ;?>"><i class="fa fa-sign-in"></i> Log In</a></li>
              <li><a href="<?php  echo site_url('user/register')  ;?>"><i class="fa fa-user"></i> Registration</a></li>
             <?php else : ?>
              <li><a href="<?php  echo site_url('user/profile')  ;?>"><i class="fa fa-user "></i> My Profile </a></li>          
              <li><a href="<?php  echo site_url('dashboard')  ;?>"><i class="fa fa-desktop"></i> Dashboard</a></li> 
              <li><a href="<?php  echo site_url('user/logout')  ;?>"><i class="fa  fa-sign-out"></i> Log Out</a></li>          
             <?php endif;?>            
           </ul>
          
        </li>


 

       
        
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>

<?php echo $content ;?>

  
 
<footer>
    <div class="container">
      
    </div>

  <div class="footer-social">
    <div class="container text-center">
      <ul class="list-inline">
        <li class="social-github"><a href="#"><i class="fa fa-github"></i></a></li>
        <li class="social-twitter"><a href="#"><i class="fa fa-twitter"></i></a></li>
        <li class="social-facebook"><a href="#"><i class="fa fa-facebook"></i></a></li>
        <li class="social-google-plus"><a href="#"><i class="fa fa-google-plus"></i></a></li>
      </ul>
    </div>
  </div>

  <div class="footer-main">
    <div class="container">
      <a href="/">Sximo 5</a> is a project created and maintained by <a href="http://mangopick.com"> Mangopik TM </a> at <a href="http://sximobuilder.com">Sximo Builder Lab</a>.
      <br>
      Themes and templates licensed  MIT</a>, Sximo 5 Bootstrap website <a href="https://creativecommons.org/licenses/by/3.0/">CC BY 3.0</a>.
      <br>
      Based on <a href="http://getbootstrap.com">Bootstrap</a>.
    </div>
  </div>

<script type="text/javascript">
  $(function(){
    window.prettyPrint && prettyPrint();
  })
</script>
</footer>

</body>
</html>