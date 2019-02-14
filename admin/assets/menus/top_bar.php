<div id="topBar" class="<?php echo $topMenuClass; ?>">
				<div class="container">

					<!-- right -->
					<ul class="top-links list-inline float-right">
						<li class="text-welcome hidden-xs-down" style="font-family: 'Cairo', sans-serif;"><?php echo $vWelcome; ?>, <?php if($_SESSION['language']=='AR') { echo $row_current_user['user_name_ar']; } else { echo $row_current_user['user_name_en']; }?></li>
						<li>
							<a class="dropdown-toggle no-text-underline" data-toggle="dropdown" href="#" style="font-family: 'Cairo', sans-serif;"><i class="fa fa-user hidden-xs-down"></i> <?php echo $vMyAccount ; ?></a>
							<ul class="dropdown-menu float-right">
								
								<?php if($row_current_user['system_admin']=='1') { ?>
								<li><a tabindex="-1" href="<?php echo $server; ?>admin/system/dashboard/" style="font-family: 'Cairo', sans-serif;"><i class="fa fa-history"></i> <?php echo $vDashboard; ?></a></li>
								<?php } ?>
								
								<li><a tabindex="-1" href="#"><i class="fa fa-history"></i> ORDER HISTORY</a></li>
								<li class="divider"></li>
								<li><a tabindex="-1" href="#"><i class="fa fa-bookmark"></i> MY WISHLIST</a></li>
								<li><a tabindex="-1" href="#"><i class="fa fa-edit"></i> MY REVIEWS</a></li>
								<li><a tabindex="-1" href="#"><i class="fa fa-cog"></i> MY SETTINGS</a></li>
								<li class="divider"></li>
								<li><a tabindex="-1" href="#"><i class="glyphicon glyphicon-off"></i> LOGOUT</a></li>
							</ul>
						</li>
					</ul>

					<!-- left -->
					<ul class="top-links list-inline">
						
						
						<li class="hidden-xs"><a href="<?php echo $server; ?>" style="font-family: 'Cairo', sans-serif;" target="_blank"><?php echo $vWebsite; ?></a>  
							
							
						
						</li>
						
						
						
						
						<li>

							<?php if($_SESSION['language']=='EN') {	?>
							<a class="dropdown-toggle no-text-underline" data-toggle="dropdown" href="#"><img class="flag-lang" src="<?php echo $server; ?>admin/images/flags/us.png" width="16" height="11" alt="lang" /> ENGLISH</a>
							<?php 	} ?>

							<?php if($_SESSION['language']=='AR') {	?>
							<a class="dropdown-toggle no-text-underline" data-toggle="dropdown" href="#" style="font-family: 'Cairo', sans-serif;"><img class="flag-lang" src="<?php echo $server; ?>admin/images/flags/eg.png" width="16" height="11" alt="lang" /> لغة عربية</a>
							<?php 	} ?>

							<ul class="dropdown-langs dropdown-menu">

								<li><a tabindex="-1" href="<?php echo $english_link; ?>"><img class="flag-lang" src="<?php echo $server; ?>admin/images/flags/us.png" width="16" height="11" alt="lang" /> ENGLISH</a></li>

								<li class="divider"></li>

								<li><a tabindex="-1" href="<?php echo $arabic_link; ?>" style="font-family: 'Cairo', sans-serif;"><img class="flag-lang" src="<?php echo $server; ?>admin/images/flags/eg.png" width="16" height="11" alt="lang" style="font-family: 'Cairo', sans-serif;
" /> لغة عربية</a></li>



							</ul>

						</li>
						
						
						
						
						<li style="display: none">
							<a class="dropdown-toggle no-text-underline" data-toggle="dropdown" href="#">USD</a>
							<ul class="dropdown-langs dropdown-menu">
								<li><a tabindex="-1" href="#">USD</a></li>
								<li class="divider"></li>
								<li><a tabindex="-1" href="#">EUR</a></li>
								<li><a tabindex="-1" href="#">GBP</a></li>
							</ul>
						</li>
					</ul>

				</div>
			</div>