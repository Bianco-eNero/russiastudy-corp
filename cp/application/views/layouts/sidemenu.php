<nav role="navigation" class="navbar-default navbar-static-side">
	 <div class="sidebar-collapse">				  
	   <ul id="sidemenu" class="nav expanded-menu">
		<li class="logo-header" >
		 <a class="navbar-brand" href="<?php echo site_url('dashboard') ;?>">
		 	<?php if(defined('CNF_LOGO') && file_exists('/sximo/images/'.CNF_LOGO) && CNF_LOGO !='') : ?>
		 	<img src="<?php echo  base_url('sximo/images/'.CNF_LOGO) ;?>" alt="<?php echo CNF_APPNAME ;?>" />
		 	<?php else: ?>
			<img src="<?php echo base_url('sximo/images/backend-logo.png');?>" alt="<?php echo CNF_APPNAME ;?>" />
			<?php endif; ?>
			

		 </a>
		</li>
		<li class="nav-header text-center">
			<div class="dropdown profile-element" > 
				<span >
					<?php echo SiteHelpers::avatar('75');?>
					
				</span>
				<a href="<?php echo site_url('user/profile');?>" >
				<span class="clear"> <span class="block m-t-xs"> <strong class="font-bold"><?php echo $this->session->userdata('fid');?>
				</strong>
				 <br /> Last Login : 
					<small><?php echo date("H:i M j, Y",strtotime($this->session->userdata('ll'))) ;?></small>				
				 	</span> 
				 </span>
				
				 </a>
				 
			</div>
			<div class="photo-header "> <?php echo SiteHelpers::avatar('50');?> </div>
		</li> 
<?php $sidebar = SiteHelpers::menus('sidebar');?>
<?php foreach ($sidebar as $menu) : ?>
	 <li>
		<?php if($menu['module'] =='separator') { ;?>
			<li class="separator"> <span> <?php echo $menu['menu_name'];?> </span></li>
		<?php } else { ?>
		<a 
			<?php 
			if($menu['menu_type'] =='external') {	
				echo 'href="'.$menu['url'].'"';  
			} else {
				echo 'href="'.site_url($menu['module']).'"';
			}
			?>	
					
		
		 <?php  if(count($menu['childs']) > 0 ) echo 'class="expand level-closed"';?>>
			<i class="<?php echo $menu['menu_icons'];?>"></i> <span class="nav-label">
				<?php echo $menu['menu_name'];?>
			</span><span class="caret arrow"></span>	 
		</a> 
		<?php if(count($menu['childs']) > 0) :?>
			<ul class="nav nav-second-level">
				<?php foreach ($menu['childs'] as $menu2) : ?>
				 <li>
					<a 
						<?php 
						if($menu2['menu_type'] =='external') {	
							echo 'href="'.$menu2['url'].'"';  
						} else {
							echo 'href="'.site_url($menu2['module']).'"';
						}
						?>									
					>
					<i class="<?php echo $menu2['menu_icons'];?>"></i>
					<?php echo $menu2['menu_name'];?>
					</a> 
					<?php if(count($menu2['childs']) > 0) : ?>
					<ul class="nav nav-third-level">
						<?php foreach($menu2['childs'] as $menu3) : ?>
							<li>
								<a 
									<?php 
									if($menu3['menu_type'] =='external') {	
										echo 'href="'.$menu3['url'].'"';  
									} else {
										echo 'href="'.site_url($menu3['module']).'"';
									}
									?>																
								>	
								<i class="<?php echo $menu3['menu_icons'];?>"></i>									
								<?php echo $menu3['menu_name'];?>	
								</a>
							</li>	
						<?php endforeach;?>
					</ul>
					<?php endif;?>							
				</li>							
				<?php endforeach;?>
			</ul>
		<?php endif;?>
	</li>
	<?php } ?>
<?php endforeach;?>						
	</div>
</nav>	