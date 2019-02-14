<div class="row  ">
	<nav style="margin-bottom: 0;" role="navigation" class="navbar navbar-static-top ">
	<div class="navbar-header">
		 <a href="javascript:void(0)" class="navbar-minimalize minimalize-btn ">
		 <i class="fa fa-bars"></i> </a>		
	</div>
        <?php if(isset($pageTitle) && isset($pageNote)) : ?>
        <div class="navbar-header-title">
             <?php echo $pageTitle ;?> : <small> <?php echo $pageNote ;?></small>    
        </div>
        <?php endif; ?>	
	
	 <ul class="nav navbar-top-links navbar-right">
	 	<li><a href="<?php echo site_url('core/notification') ;?>"><i class="fa fa-envelope"></i><span class="notif-alert ">0</span></a></li>

	

        <?php if(CNF_MULTILANG == true): ?>
        <li class="dropdown tasks-menu">
          <?php 
          $flag ='en';
          $langname = 'English'; 
          foreach(SiteHelpers::langOption() as $lang):
            if($lang['folder'] == $this->session->userdata('lang') or $lang['folder'] == 'CNF_LANG') {
              $flag = $lang['folder'];
              $langname = $lang['name']; 
            }
            
          endforeach;?>
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
            <img class="flag-lang" src="<?php echo base_url('sximo/images/flags/'.$flag.'.png') ;?>" width="16" height="12" alt="lang" />
            <span class="hidden-xs">
             <i class="caret"></i>
            </span>
          </a>

           <ul class="dropdown-menu dropdown-menu-right icons-right">
            <li class="header"> <?php echo $this->lang->line('core.m_sel_lang') ;?> </li>
            <?php foreach(SiteHelpers::langOption() as $lang) {?>
              <li><a href="<?php echo site_url('page/lang/'.$lang['folder']);?>"><img class="flag-lang" src="<?php echo base_url('sximo/images/flags/'. $lang['folder'].'.png');?>" width="16" height="11" alt="lang"  /> <?php echo $lang['name'] ;?></a></li>
            <?php } ?>
           
          </ul>

        </li> 
        <?php endif; ?>
        
	 	<?php if($this->session->userdata('gid') ==1) : ?>

		<li class="user dropdown">
			<a class="dropdown-toggle" href="javascript:void(0)"  data-toggle="dropdown">
				 <i class="fa fa-cog"></i> <i class="caret"></i>
			</a>
			<ul class="dropdown-menu dropdown-menu-right icons-right">
				<li><a href="<?php echo site_url('sximo/config') ;?>"><i class="fa fa-cog"></i> <?php echo $this->lang->line('core.m_setting'); ?> </a></li>
				<li><a href="<?php echo site_url('core/users') ;?>" ><i class="fa fa-user"></i> <?php echo $this->lang->line('core.m_usersgroups'); ?> </a></li>
				<li><a href="<?php echo site_url('core/users/blast') ;?>"><i class="fa fa-envelope"></i> <?php echo $this->lang->line('core.m_blastemail'); ?> </a></li>
				<li><a href="<?php echo site_url('core/logs') ;?>"><i class="icon-clock2"></i> Log Activities </a></li>
				
				<li class="divider"></li>
				<li><a href="<?php echo site_url('sximo/pages') ;?>"><i class="fa fa-file"></i> <?php echo $this->lang->line('core.m_pagecms'); ?> </a></li>
				<li class="divider"></li>
				<li><a href="<?php echo site_url('sximo/module') ;?>" ><i class="fa fa-refresh"></i> <?php echo $this->lang->line('core.m_codebuilder'); ?> </a></li>
				<li><a href="<?php echo site_url('sximo/menu') ;?>" ><i class="icon-paragraph-left2"></i> <?php echo $this->lang->line('core.m_menu'); ?> </a></li>	
				<li><a href="<?php echo site_url('sximo/tables') ;?>" ><i class="fa fa-database"></i> Database </a></li>		
					
			</ul>
		</li>	
	
		<?php endif;?>
		<li><a href="<?php echo site_url('user/logout') ;?>"><i class="fa fa-sign-out"></i> <?php echo $this->lang->line('core.m_logout'); ?> </a></li>

				
	</ul>	
	</nav>	 
	 
</div>	