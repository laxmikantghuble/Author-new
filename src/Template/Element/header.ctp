<!--<header id="header">
			<div class="container">

				<div class="logo">
					<a href="https://bootstrapmade.com/" rel="home"><img title="BootstrapMade" alt="BootstrapMade" src="https://bootstrapmade.com/wp-content/themes/bmade/assets/img/logo.png"></a>
				</div>
			

				<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse"><i class="fa fa-bars" aria-hidden="true"></i></button>

				<nav id="topnav" class="navbar-collapse collapse">
					<ul>
						<li><a href="https://bootstrapmade.com/">Home</a></li>
            <li><a href="https://bootstrapmade.com/about/">About</a></li>
						<li class="themes-nav"><a class="" style="cursor: pointer;">Themes &nbsp;<i class="fa fa-angle-down"></i></a>
							<ul>
									<li class="cat-item cat-item-2"><i class="fa fa-caret-right"></i> <a href="https://bootstrapmade.com/bootstrap-one-page-templates/">One Page</a> (53)
</li>
	<li class="cat-item cat-item-4"><i class="fa fa-caret-right"></i> <a href="https://bootstrapmade.com/bootstrap-business-templates/">Business</a> (52)
</li>
	<li class="cat-item cat-item-8"><i class="fa fa-caret-right"></i> <a href="https://bootstrapmade.com/bootstrap-coming-soon-templates/">Coming Soon</a> (3)
</li>
	<li class="cat-item cat-item-15"><i class="fa fa-caret-right"></i> <a href="https://bootstrapmade.com/bootstrap-admin-templates/">Admin</a> (1)
</li>
	<li class="cat-item cat-item-23"><i class="fa fa-caret-right"></i> <a href="https://bootstrapmade.com/bootstrap-restaurant-templates/">Restaurant</a> (2)
</li>
	<li class="cat-item cat-item-24"><i class="fa fa-caret-right"></i> <a href="https://bootstrapmade.com/bootstrap-education-templates/">Education</a> (1)
</li>
	<li class="cat-item cat-item-25"><i class="fa fa-caret-right"></i> <a href="https://bootstrapmade.com/bootstrap-health-templates/">Health</a> (2)
</li>
	<li class="cat-item cat-item-28"><i class="fa fa-caret-right"></i> <a href="https://bootstrapmade.com/bootstrap-portfolio-templates/">Portfolio</a> (9)
</li>
	<li class="cat-item cat-item-31"><i class="fa fa-caret-right"></i> <a href="https://bootstrapmade.com/bootstrap-landing-page-templates/">Landing Page</a> (13)
</li>
	<li class="cat-item cat-item-32"><i class="fa fa-caret-right"></i> <a href="https://bootstrapmade.com/bootstrap-corporate-templates/">Corporate</a> (52)
</li>
	<li class="cat-item cat-item-33"><i class="fa fa-caret-right"></i> <a href="https://bootstrapmade.com/bootstrap-agency-templates/">Agency</a> (53)
</li>
	<li class="cat-item cat-item-34"><i class="fa fa-caret-right"></i> <a href="https://bootstrapmade.com/bootstrap-personal-templates/">Personal</a> (10)
</li>
	<li class="cat-item cat-item-35"><i class="fa fa-caret-right"></i> <a href="https://bootstrapmade.com/bootstrap-resume-cv-templates/">Resume / CV</a> (9)
</li>
	<li class="cat-item cat-item-38"><i class="fa fa-caret-right"></i> <a href="https://bootstrapmade.com/bootstrap-medical-templates/">Medical</a> (2)
</li>
	<li class="cat-item cat-item-41"><i class="fa fa-caret-right"></i> <a href="https://bootstrapmade.com/bootstrap-4-templates/">Bootstrap 4</a> (76)
</li>
	<li class="cat-item cat-item-42"><i class="fa fa-caret-right"></i> <a href="https://bootstrapmade.com/bootstrap-real-estate-templates/">Real Estate</a> (1)
</li>
							</ul>
						</li>
						<li><a href="https://bootstrapmade.com/license/">License</a></li>
						<li><a href="https://bootstrapmade.com/support/">Support</a></li>
						<li><a href="https://bootstrapmade.com/contact/">Contact</a></li>
						<li class="login"><a href="https://bootstrapmade.com/members/" class="current"><i class="fa fa-user" aria-hidden="true"></i> Members</a>
						</li>
					</ul>
				</nav>
        <i class="fa fa-search search-toggle" title="Togle Search Bar"></i>

			</div>

		</header>-->

		<div class="row bg-primary">
			<div class="col-md-8">
				<nav class="navbar navbar-dark  navbar-expand-sm">
					<a href="<?=$baseurl;?>" class="<?=isset($activehome)? $activehome:'nav-link';?>">Home</a>
					<button class="navbar-toggler" data-toggle="collapse" data-target="#menu">
						<span class="navbar-toggler-icon"></span>
					</button>
					<div class="collapse navbar-collapse" id="menu">				
						<ul class="navbar-nav">
							<li class="nav-item"><a href="<?=$baseurl;?>about-us" class="<?=isset($activeabout)?$activeabout:'nav-link';?>">About Us</a></li>
							<li class="nav-item"><a href="<?=$baseurl;?>service" class="<?=isset($activeservice)?$activeservice:'nav-link';?>">Service</a></li>	
							<li class="nav-item"><a href="<?=$baseurl;?>contact" class="<?=isset($activecontcat)? $activecontcat:'nav-link';?>">Contact</a></li>

							<li class="nav-item"><a href="<?=$baseurl;?>artlist" class="<?=isset($activeactical)? $activeactical:'nav-link';?>">Articals</a></li>
							<?php 
							if($this->request->session()->read('Auth.User.user_type')!='1')
							{
							?>
							<li class="nav-item"><a href="<?=$baseurl;?>create" class="<?=isset($activeupload)? $activeupload:'nav-link';?>">Upload</a></li>
							<?php 
							}
							?>
						</ul>

					</div>
				</nav>	
				</div>
				<div class="float-right col-md-4 welcomeuser">
						<?php 
						if(!$this->request->session()->read('Auth.User.username'))
							{
							?>
							<a href="<?=$baseurl;?>login" class="btn btn-warning">Member Login</a>
							<?php 
							}else {
							?>
							Welome <b><?=$this->request->session()->read('Auth.User.username');?></b>&nbsp;&nbsp;&nbsp;<a href="<?=$baseurl?>logout" class="btn btn-warning">Logout</a>
							<?php 
							}
							?>
						</div>
			</div>
			

	  
	