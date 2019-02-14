<?php $menus = SiteHelpers::menus('top') ;?>
 	  <ul class="nav navbar-nav">
		<?php foreach ($menus as $menu) :?>
			 <li class="<?php if($this->uri->segment(1) == $menu['module']) echo 'active';?>" >
			 	<a  
				<?php if($menu['menu_type'] =='external') :?>
					href="<?php echo site_url($menu['url']);?>" 
				<?php else : ?>
					href="<?php echo site_url($menu['module']);?>" 
				<?php endif; ?> 
			 
				 <?php if(count($menu['childs']) > 0 ) echo 'class="dropdown-toggle" data-toggle="dropdown" ';?>>
			 		<i class="<?php  echo $menu['menu_icons'];?>"></i> <span>
						<?php  echo $menu['menu_name'];?>				
					</span>
					<?php  if(count($menu['childs']) > 0 ) : ?>
					 <b class="caret"></b> 
					<?php endif;?>  
				</a> 
				<?php if(count($menu['childs']) > 0):?>
					 <ul class="dropdown-menu dropdown-menu-right">
						<?php foreach ($menu['childs'] as $menu2):?>
						 <li class=" 
						 <?php if(count($menu2['childs']) > 0) echo 'dropdown-submenu';?>
						 <?php if($this->uri->segment(1) == $menu2['module']) echo 'active ';?>">
						 	<a 
								<?php if($menu['menu_type'] =='external'):?>
									href="<?php  echo site_url($menu2['url']);?>" 
								<?php else:?>
									href="<?php  echo site_url($menu2['module']);?>" 
								<?php endif;?>
											
							>
								<i class="<?php echo $menu2['menu_icons'];?>"></i> 
										<?php echo $menu2['menu_name'];?>
							</a> 
							<?php if(count($menu2['childs']) > 0):?>
							<ul class="dropdown-menu dropdown-menu-right">
								<?php foreach($menu2['childs'] as $menu3):?>
									<li <?php  if($this->uri->segment(1) == $menu3['module']) echo 'class="active"';?>>
										<a 
											<?php if($menu['menu_type'] =='external'):?>
												href="<?php  echo site_url($menu3['url']);?>" 
											<?php else :?>
												href="<?php echo site_url($menu3['module']);?>" 
											<?php endif;?>										
										
										>
											<span>
												<?php echo $menu3['menu_name'];?>
											</span>  
										</a>
									</li>	
								<?php endforeach; ?>
							</ul>
							<?php endif	;?>						
							
						</li>							
						<?php endforeach;?>
					</ul>
				<?php endif;?>
			</li>
		<?php endforeach;?>  
			

  </ul> 
 