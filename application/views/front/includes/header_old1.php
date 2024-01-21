<?php if(!empty($this->session->userdata['logged_in']['id'])) 

{ 

	$userid = $this->session->userdata['logged_in']['id'];

}else{

	$userid = "";

} 

$ures = $this->db->query("select * from user where id='1'")->result_array();
if(!empty($ures))
{
	$fullname = $ures[0]['fullname'];
}


$cookie_name = "cartcookieposhaki";

if(!empty($_COOKIE[$cookie_name]))

{

  $cookievalis = $_COOKIE[$cookie_name];

}else{

  $cookievalis = "";

}

$cartres = $this->db->query("select *,count(id) as cartcountitem from cart where cookievalis='".$cookievalis."' and status='0' ")->result_array();

?>





<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="x-ua-compatible" content="ie=edge">
	<title><?=$fullname?></title>
	<meta name="robots" content="noindex, follow" />
	<meta name="description" content="">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<!-- Favicon -->
	<link rel="shortcut icon" type="image/x-icon" href="images/favicon.ico">

    <!-- CSS
    	============================================ -->
    	<!-- google fonts -->
    	<link href="https://fonts.googleapis.com/css?family=Lato:300,300i,400,400i,700,900" rel="stylesheet">
    	<!-- Bootstrap CSS -->
    	<link rel="stylesheet" href="<?=base_url()?>assets/front/css/bootstrap.min.css">
    	<!-- Pe-icon-7-stroke CSS -->
    	<link rel="stylesheet" href="<?=base_url()?>assets/front/css/pe-icon-7-stroke.css">
    	<!-- Font-awesome CSS -->
    	<link rel="stylesheet" href="<?=base_url()?>assets/front/css/font-awesome.min.css">
    	<!-- Slick slider css -->
    	<link rel="stylesheet" href="<?=base_url()?>assets/front/css/slick.min.css">
    	<!-- animate css -->
    	<link rel="stylesheet" href="<?=base_url()?>assets/front/css/animate.css">
    	<!-- Nice Select css -->
    	<link rel="stylesheet" href="<?=base_url()?>assets/front/css/nice-select.css">
    	<!-- jquery UI css -->
    	<link rel="stylesheet" href="<?=base_url()?>assets/front/css/jqueryui.min.css">
    	<!-- main style css -->
    	<link rel="stylesheet" href="<?=base_url()?>assets/front/css/style.css">

    </head>

    <body>
    	<!-- Start Header Area -->
    	<header class="header-area">
    		<!-- main header start -->
    		<div class="main-header d-none d-lg-block">
    			<!-- header top start -->
    			<div class="header-top bg-gray">
    				<div class="container">
    					<div class="row align-items-center">
    						<div class="col-lg-12">
    							<div class="welcome-message text-center">
    								<p>Welcome to AR Gems Jewels </p>
    							</div>
    						</div>
    					</div>
    				</div>
    			</div>
    			<!-- header top end -->

    			<!-- header middle area start -->
    			<div class="header-main-area sticky">
    				<div class="container">
    					<div class="row align-items-center position-relative">

    						<!-- start logo area -->
    						<div class="col-lg-2">
    							<div class="logo">
    								<a href="<?=base_url()?>">
    									<img src="<?=base_url()?>assets/front/images/logo.png" alt="Brand Logo">
    								</a>
    							</div>
    						</div>
    						<!-- start logo area -->

    						<!-- main menu area start -->
    						<div class="col-lg-6 position-static">
    							<div class="main-menu-area">
    								<div class="main-menu">
    									<!-- main menu navbar start -->
    									<nav class="desktop-menu">
    										<ul>
    											<li class="active"><a href="<?=base_url()?>">Home </a>
    											</li>


    											<li class="position-static"><a href="#">shop <i class="fa fa-angle-down"></i></a>
    												<ul class="megamenu dropdown">
    													<?php 

    													$maincat = $this->db->query("select * from categories where parentid=0")->result_array();

    													foreach($maincat as $maincatrow) {
    														$parentcatid = $maincatrow['id'];

    														?>
    														<li class="mega-title"><span><?=$maincatrow['title']?></span>
    															<ul>
    																<?php 

    																$subcatres = $this->db->query("select * from categories where parentid='$parentcatid'")->result_array();

    																foreach($subcatres as $subcatrow) {

    																	?>
    																	<li>
    																		<a href="<?=base_url();?>sc/<?php echo $subcatrow['slugurl'];?>"><?=$subcatrow['title'];?></a>

    																	</li>
    																<?php } ?>
    															</ul>
    														</li>
    													<?php } ?>
    												</ul>
    											</li>
    											<?php 

    											$subcatres = $this->db->query("select * from categories where is_top='1'")->result_array();

    											foreach($subcatres as $subcatrow) {

    												?>
    												<li>
    													<a href="<?=base_url();?>sc/<?php echo $subcatrow['slugurl'];?>"><?=$subcatrow['title'];?></a>

    												</li>
    											<?php } ?>
    										</ul>
    									</nav>
    									<!-- main menu navbar end -->
    								</div>
    							</div>
    						</div>
    						<!-- main menu area end -->

    						<!-- mini cart area start -->
    						<div class="col-lg-4">
    							<div class="header-right d-flex align-items-center justify-content-end">
    								<div class="header-configure-area">
    									<ul class="nav justify-content-end">
    										<li class="header-search-container mr-0">
    											<!-- <button class="search-trigger d-block"><i class="pe-7s-search"></i></button> -->
    											<form class="header-search-box d-none">
    												<input type="text" placeholder="Search entire store hire" class="header-search-field">
    												<button class="header-search-btn"><i class="pe-7s-search"></i></button>
    											</form>
    										</li>
    										<li class="user-hover">
    											<a href="#">
    												<i class="pe-7s-user"></i>
    											</a>
    											<ul class="dropdown-list">
                            <?php 
                            if(empty($this->session->userdata['logged_in']['id']))
                            {
                              ?>
                              <li><a href="<?=base_url();?>securelogin">Login</a></li>
                              <li><a href="<?=base_url();?>signup">Register</a></li>
                            <?php }else{ ?>
                              <li><a href="<?=base_url()?>myaccount">My Account</a></li>
                              <li><a href="<?=base_url()?>order-history">Order History</a></li>
                              <li><a href="<?=base_url();?>securelogout">Logout</a></li>
                            <?php } ?>
                          </ul>
                        </li>
                        <!-- <li>
                         <a href="#">
                          <i class="pe-7s-like"></i>
                          <div class="notification">0</div>
                        </a>
                        </li> -->
                      <li>
                       <a href="<?=base_url()?>cartlist" class="minicart-btn">
                        <i class="pe-7s-shopbag"></i>
                        <div class="notification">
                          <?php echo $cartres[0]['cartcountitem'];?>
                        </div>
                        </a>
                      </li>
                  </ul>
                </div>
              </div>
            </div>
            <!-- mini cart area end -->

          </div>
        </div>
      </div>
      <!-- header middle area end -->
    </div>
    <!-- main header start -->

    <!-- mobile header start -->
    <!-- mobile header start -->
    <div class="mobile-header d-lg-none d-md-block sticky">
     <!--mobile header top start -->
     <div class="container-fluid">
      <div class="row align-items-center">
       <div class="col-12">
        <div class="mobile-main-header">
         <div class="mobile-logo">
          <a href="<?=base_url()?>">
           <img src="<?=base_url()?>assets/front/images/logo.png" alt="Brand Logo">
         </a>
       </div>
       <div class="mobile-menu-toggler">
        <div class="mini-cart-wrap">
         <a href="#">
          <i class="pe-7s-shopbag"></i>
          <div class="notification">0</div>
        </a>
      </div>
      <button class="mobile-menu-btn">
       <span></span>
       <span></span>
       <span></span>
     </button>
   </div>
 </div>
</div>
</div>
</div>
<!-- mobile header top start -->
</div>
<!-- mobile header end -->
<!-- mobile header end -->

<!-- offcanvas mobile menu start -->
<!-- off-canvas menu start -->
<aside class="off-canvas-wrapper">
 <div class="off-canvas-overlay"></div>
 <div class="off-canvas-inner-content">
  <div class="btn-close-off-canvas">
   <i class="pe-7s-close"></i>
 </div>

 <div class="off-canvas-inner">
   <!-- search box start -->
   <div class="search-box-offcanvas">
    <form>
     <input type="text" placeholder="Search Here...">
     <button class="search-btn"><i class="pe-7s-search"></i></button>
   </form>
 </div>
 <!-- search box end -->

 <!-- mobile menu start -->
 <div class="mobile-navigation">

  <!-- mobile menu navigation start -->
  <nav>
   <ul class="mobile-menu">
    <li class="menu-item-has-children"><a href="<?=base_url()?>">Home</a>
    </li>
    <li class="menu-item-has-children"><a href="#">pages</a>
     <ul class="megamenu dropdown">
      <li class="mega-title menu-item-has-children"><a href="#">column 01</a>
       <ul class="dropdown">
        <li><a href="#">shop grid left sidebar</a></li>
        <li><a href="#">shop grid right sidebar</a></li>
        <li><a href="#">shop list left sidebar</a></li>
        <li><a href="#">shop list right sidebar</a></li>
      </ul>
    </li>
    <li class="mega-title menu-item-has-children"><a href="#">column 02</a>
     <ul class="dropdown">
      <li><a href="#">product details</a></li>
      <li><a href="#">product details affiliate</a></li>
      <li><a href="#">product details variable</a></li>
      <li><a href="#">privacy policy</a></li>
    </ul>
  </li>
  <li class="mega-title menu-item-has-children"><a href="#">column 03</a>
   <ul class="dropdown">
    <li><a href="#">cart</a></li>
    <li><a href="#">checkout</a></li>
    <li><a href="#">compare</a></li>
    <li><a href="#">wishlist</a></li>
  </ul>
</li>
<li class="mega-title menu-item-has-children"><a href="#">column 04</a>
 <ul class="dropdown">
  <li><a href="#">my-account</a></li>
  <li><a href="#">login-register</a></li>
  <li><a href="#">about us</a></li>
  <li><a href="#">contact us</a></li>
</ul>
</li>
</ul>
</li>
<li class="menu-item-has-children "><a href="#">shop</a>
 <ul class="dropdown">
  <li class="menu-item-has-children"><a href="#">shop grid layout</a>
   <ul class="dropdown">
    <li><a href="#">shop grid left sidebar</a></li>
    <li><a href="#">shop grid right sidebar</a></li>
    <li><a href="#">shop grid full 3 col</a></li>
    <li><a href="#">shop grid full 4 col</a></li>
  </ul>
</li>
</ul>
</li>
<li class="menu-item-has-children "><a href="#">Blog</a>
 <ul class="dropdown">
  <li><a href="#">blog left sidebar</a></li>

</ul>
</li>
<li><a href="#">Contact us</a></li>
</ul>
</nav>
<!-- mobile menu navigation end -->
</div>
<!-- mobile menu end -->

<div class="mobile-settings">
  <ul class="nav">
   <li>
    <div class="dropdown mobile-top-dropdown">
     <a href="#" class="dropdown-toggle" id="myaccount" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
      My Account
      <i class="fa fa-angle-down"></i>
    </a>
    <div class="dropdown-menu" aria-labelledby="myaccount">
      <a class="dropdown-item" href="#">my account</a>
      <a class="dropdown-item" href="#"> login</a>
      <a class="dropdown-item" href="#">register</a>
    </div>
  </div>
</li>
</ul>
</div>

<!-- offcanvas widget area start -->
<div class="offcanvas-widget-area">
  <div class="off-canvas-contact-widget">
   <ul>
    <li><i class="fa fa-mobile"></i>
     <a href="#">0123456789</a>
   </li>
   <li><i class="fa fa-envelope-o"></i>
     <a href="#">info@info.com</a>
   </li>
 </ul>
</div>
<div class="off-canvas-social-widget">
 <a href="#"><i class="fa fa-facebook"></i></a>
 <a href="#"><i class="fa fa-twitter"></i></a>
 <a href="#"><i class="fa fa-pinterest-p"></i></a>
 <a href="#"><i class="fa fa-linkedin"></i></a>
 <a href="#"><i class="fa fa-youtube-play"></i></a>
</div>
</div>
<!-- offcanvas widget area end -->
</div>
</div>
</aside>
<!-- off-canvas menu end -->
<!-- offcanvas mobile menu end -->
</header>
<!-- end Header Area -->


