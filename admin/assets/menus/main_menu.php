	<div id="header" class="navbar-toggleable-md sticky shadow-after-3 clearfix">

				<!-- TOP NAV -->
				<header id="topNav">
					<div class="container">

						<!-- Mobile Menu Button -->
						<button class="btn btn-mobile" data-toggle="collapse" data-target=".nav-main-collapse">
							<i class="fa fa-bars"></i>
						</button>

						<!-- BUTTONS -->
						<ul class="float-right nav nav-pills nav-second-main">

							<!-- SEARCH -->
							<li class="search">
								<a href="javascript:;">
									<i class="fa fa-search"></i>
								</a>
								<div class="search-box">
									<form action="page-search-result-1.html" method="get">
										<div class="input-group">
											<input type="text" name="src" placeholder="Search" class="form-control" />
											<span class="input-group-btn">
												<button class="btn btn-primary" type="submit"><?php echo $vSearch; ?></button>
											</span>
										</div>
									</form>
								</div>
							</li>
							<!-- /SEARCH -->

						</ul>
						<!-- /BUTTONS -->


						<!-- Logo -->


						 <?php
    if($whiteLogo=='1') {
    ?>
    <a class="logo float-left" href="<?php echo $server; ?>">
    <img src="<?php echo $server; ?>admin/images/logo_1_b.png" alt="" />
    </a>
    <?php
    }
    else
    {
    ?>
    <a class="logo float-left" href="<?php echo $server; ?>">
    <img src="<?php echo $server; ?>admin/images/logo_1.png" alt="" />
    </a>
    <?php
    }
    ?>


						<!--
							Top Nav

							AVAILABLE CLASSES:
							submenu-dark = dark sub menu : submenu-dark
						-->
						<div class="navbar-collapse collapse float-right nav-main-collapse">
							<nav class="nav-main">

								<!--
									NOTE

									For a regular link, remove "dropdown" class from LI tag and "dropdown-toggle" class from the href.
									Direct Link Example:

									<li>
										<a href="#">HOME</a>
									</li>
								-->
								<ul id="topMain" class="nav nav-pills nav-main">


									<li class=""><!-- HOME -->
										<a class="" href="<?php echo $server; ?>" style="font-family: 'Cairo', sans-serif; ">
              							<?php echo $vHome; ?>
            							</a>
									</li>



<li class="dropdown "><!-- HOME -->
            <a class="dropdown-toggle" href="#" style="font-family: 'Cairo', sans-serif;">
              <?php echo $vWhy; ?>
            </a>
            <ul class="dropdown-menu">
              <li class=" ">
                <a class="" href="<?php echo $server;  ?>admin/system/why_russia/" style="font-family: 'Cairo', sans-serif;">
                  <?php echo $vWhyRussia; ?>
                </a>

              </li>
              <li class="">
                <a class="" href="<?php echo $server;  ?>admin/system/why_study_in_russia/" style="font-family: 'Cairo', sans-serif;">
                  <?php echo $vWhyStudyInRussia; ?>
                </a>

              </li>

              <li class="">
                <a class="" href="<?php echo $server;  ?>admin/system/about_us/" style="font-family: 'Cairo', sans-serif;">
                  <?php echo $vWhyUs; ?>
                </a>

              </li>



            </ul>
          </li>



									  <li class="dropdown "><!-- HOME -->
            <a class="dropdown-toggle" href="#" style="font-family: 'Cairo', sans-serif;">
              <?php echo $vInformation; ?>
            </a>
            <ul class="dropdown-menu">
              <li class=" ">
                <a class="" href="<?php echo $server;  ?>admin/system/living_cost/" style="font-family: 'Cairo', sans-serif;">
                  <?php echo $vLivingCost; ?>
                </a>

              </li>
              <li class="">
                <a class="" href="<?php echo $server;  ?>admin/system/visa_requirements/" style="font-family: 'Cairo', sans-serif;">
                  <?php echo $vVisaRequirements; ?>
                </a>

              </li>

              <li class="">
                <a class="" href="<?php echo $server;  ?>admin/system/study_requirements/" style="font-family: 'Cairo', sans-serif;">
                  <?php echo $vStudyRequirements; ?>
                </a>

              </li>

            </ul>
          </li>


									 <li class="dropdown "><!-- HOME -->
            <a class="dropdown-toggle" href="#" style="font-family: 'Cairo', sans-serif;">
              <?php echo $vAdmission; ?>
            </a>
            <ul class="dropdown-menu">
              <li class=" ">
                <a class="" href="<?php echo $server; ?>admin/system/admission_process/" style="font-family: 'Cairo', sans-serif;">
                  <?php echo $vAdmissionProcess; ?>
                </a>

              </li>
              <li class="">
                <a class="" href="<?php echo $server; ?>admin/system/select_language/" style="font-family: 'Cairo', sans-serif;">
                  <?php echo $vAdmitNow; ?>
                </a>

              </li>



            </ul>
          </li>


									<li class=" "><!-- HOME -->
            <a class="" href="<?php echo $server;  ?>admin/system/contact_us/" style="font-family: 'Cairo', sans-serif;">
              <?php echo $vContactUs; ?>
            </a>
          </li>
















									<!--
										MENU ANIMATIONS
											.nav-animate-fadeIn
											.nav-animate-fadeInUp
											.nav-animate-bounceIn
											.nav-animate-bounceInUp
											.nav-animate-flipInX
											.nav-animate-flipInY
											.nav-animate-zoomIn
											.nav-animate-slideInUp

											.nav-hover-animate 		= animate text on hover

											.hover-animate-bounceIn = bounceIn effect on mouse over of main menu
									-->

									<li>
										<a id="sidepanel_btn" href="#" class="fa fa-bars" style="display:none"></a>
									</li>




										<?php
				            if($_SESSION['language']=='AR') {
				              ?>
											<li>
				              <a class="" href="<?php echo $server ; ?>?language=EN" style="font-family: 'Cairo', sans-serif;">
				                 &nbsp<img class="flag-lang" src="<?php echo $server; ?>admin/assets/smarty_files/assets/images/_smarty/flags/us.png" width="16" height="11" alt="lang" />

											</a>
												</li>
				              <?php
				            }
				            else {
				              ?>
											<li>
												<a class="" href="<?php echo $server ; ?>?language=AR" style="font-family: 'Cairo', sans-serif;">
					                 &nbsp<img class="flag-lang" src="<?php echo $server; ?>admin/assets/smarty_files/assets/images/_smarty/flags/eg.png" width="16" height="11" alt="lang" />

												</a>
										</li>
				              <?php
				            }
				            ?>



								</ul>

							</nav>
						</div>

					</div>
				</header>
				<!-- /Top Nav -->

			</div>
