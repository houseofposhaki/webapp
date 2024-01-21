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


// condition 
$slug1 = $this->uri->segment('1');
$slug2 = $this->uri->segment('2');
?>






<html lang="en">

<head>

    <meta charset="utf-8">

    <meta http-equiv="x-ua-compatible" content="ie=edge">

    <title>Houseofposhaki</title>

    <meta name="description" content="">

    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Favicon -->

    

    <!-- CSS 

        ========================= -->

        <link rel="stylesheet" href="<?=base_url()?>assets/front/css/bootstrap.min.css">

        <link rel="stylesheet" href="<?=base_url()?>assets/front/css/owl.carousel.min.css">

        <link rel="stylesheet" href="<?=base_url()?>assets/front/css/slick.css">

        <link rel="stylesheet" href="<?=base_url()?>assets/front/css/magnific-popup.css">

        <link rel="stylesheet" href="<?=base_url()?>assets/front/css/font.awesome.css">

        <link rel="stylesheet" href="<?=base_url()?>assets/front/css/ionicons.min.css">

        <link rel="stylesheet" href="<?=base_url()?>assets/front/css/material.design.min.css">

        <link rel="stylesheet" href="<?=base_url()?>assets/front/css/animate.css">

        <link rel="stylesheet" href="<?=base_url()?>assets/front/css/jquery-ui.min.css">

        <link rel="stylesheet" href="<?=base_url()?>assets/front/css/slinky.menu.css">

        <link rel="stylesheet" href="<?=base_url()?>assets/front/css/plugins.css">

        <link rel="stylesheet" href="<?=base_url()?>assets/front/css/style.css">

        <link rel="icon" type="image/x-icon" href="<?=base_url()?>assets/front/images/Logo.png">



    </head>



    <body>



        <!--header area start-->



        <!--MOBILE menu area start-->

        <div class="off_canvars_overlay">



        </div>

        <div class="offcanvas_menu offcanvas_two">

            <div class="container">

                <div class="row">

                    <div class="col-12">

                        <div class="canvas_open">

                            <a href="#"><i class="ion-navicon"></i></a>

                        </div>

                        <div class="offcanvas_menu_wrapper">

                            <div class="canvas_close">

                                <a href="#"><i class="ion-android-close"></i></a>  

                            </div>

                            <div class="header_right_info">

                                <ul>

                                   <!-- <li class="search_box"><a href="#"><img src="<?=base_url()?>assets/front/images/Logo.png" alt=""></a>

                                       <div class="search_widget">

                                        <form action="#">

                                            <input placeholder="Search entire store here ..." type="text">

                                            <button type="submit"><i class="fa fa-search" aria-hidden="true"></i></button>

                                        </form>

                                    </div>

                                </li> -->

                                <li class="header_account"><a href="#"><img src="<?=base_url()?>assets/front/images/icon-account.png" alt=""></a>

                                    <div class="dropdown_account">

                                        <div class="dropdown_account-list">

                                            <ul>

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

                                      </div>

                                  </div>

                              </li>

                              <li class="mini_cart_wrapper"><a href="<?=base_url()?>cartlist">
                                <i class="fa fa-shopping-cart" aria-hidden="true"></i>

                                <!-- <img src="<?=base_url()?>assets/front/images/icon-cart.png" alt=""> -->
                                <span class="item_count">

                                  <?php if(!empty($cartres)) { echo $cartres[0]['cartcountitem'];} ?>

                              </span></a>

                              

                              <!--mini cart end-->

                          </li>

                      </ul>

                  </div>

                  <div id="menu" class="text-left ">

                    <ul class="offcanvas_main_menu">

                        <li class="menu-item-has-children active">

                            <a href="<?=base_url()?>" <?php if($slug1=="") { ?> class="active" <?php } ?> >Home</a>

                        </li>

                        <li class="menu-item-has-children">

                            <a href="#" <?php if($slug1=="sc") { ?> class="active" <?php } ?>>Shop</a>

                            <ul class="sub-menu">

                                <?php 



                                $maincat = $this->db->query("select * from categories where parentid=0 
                                 and ispopular=0 and is_show=0 ")->result_array();



                                foreach($maincat as $maincatrow) {

                                    $parentcatid = $maincatrow['id'];



                                    ?>

                                    <li class="menu-item-has-children">

                                        <a href="#"><?=$maincatrow['title']?></a>

                                        <ul class="sub-menu">

                                            <?php 



                                            $subcatres = $this->db->query("select * from categories where parentid='$parentcatid' and is_show=0")->result_array();



                                            foreach($subcatres as $subcatrow) {



                                                ?>

                                                <li>

                                                    <a <?php if($slug2==$subcatrow['slugurl']) { ?> class="active" <?php } ?> href="<?=base_url();?>sc/<?php echo $subcatrow['slugurl'];?>"><?=$subcatrow['title'];?></a>

                                                </li>

                                            <?php } ?>

                                        </ul>

                                    </li>

                                <?php } ?>

                            </ul>

                        </li>



                    </ul>

                </div>



                <div class="offcanvas_footer">

                    <span><a href="#"><i class="fa fa-envelope-o"></i> info@yourdomain.com</a></span>

                    <ul>

                        <li class="facebook"><a href="#"><i class="fa fa-facebook"></i></a></li>

                        <li class="twitter"><a href="#"><i class="fa fa-twitter"></i></a></li>

                        <li class="pinterest"><a href="#"><i class="fa fa-pinterest-p"></i></a></li>

                        <li class="google-plus"><a href="#"><i class="fa fa-google-plus"></i></a></li>

                        <li class="linkedin"><a href="#"><i class="fa fa-linkedin"></i></a></li>

                    </ul>

                </div>

            </div>

        </div>

    </div>

</div>

</div>

<!--MOBILE menu area end-->



<header>

    <div class="main_header header_two">

        <div class="header_container sticky-header">

            <div class="container">  

                <div class="row align-items-center">

                    <div class="col-lg-3">

                        <div class="logo">

                            <a href="<?=base_url()?>"><img src="<?=base_url()?>assets/front/images/Logo.png" alt=""></a>

                        </div>

                    </div>

                    <div class="col-lg-9">

                        <div class="header_container_right color_two">

                            <!--main menu start-->

                            <div class="main_menu menu_position"> 

                                <nav>  

                                    <ul>

                                        <li><a <?php if($slug1=="") { ?> class="active" <?php } ?>  href="<?=base_url()?>">home</a>

                                        </li>

                                        <li class="mega_items"><a href="#" <?php if($slug1=="sc") { ?> class="active" <?php } ?>>shop<i class="fa fa-angle-down"></i></a> 

                                            <div class="mega_menu">

                                                <ul class="mega_menu_inner">

                                                    <?php 



                                                    $maincat = $this->db->query("select * from categories where parentid=0 and ispopular=0 and is_show=0 ")->result_array();



                                                    foreach($maincat as $maincatrow) {

                                                        $parentcatid = $maincatrow['id'];



                                                        ?>

                                                        <li><a href="#"><?=$maincatrow['title']?></a>

                                                            <ul>

                                                                <?php 



                                                                $subcatres = $this->db->query("select * from categories where parentid='$parentcatid' and is_show=0 ")->result_array();



                                                                foreach($subcatres as $subcatrow) {



                                                                    ?>

                                                                    <li>

                                                                        <a  href="<?=base_url();?>sc/<?php echo $subcatrow['slugurl'];?>"><?=$subcatrow['title'];?></a>



                                                                    </li>

                                                                <?php } ?>

                                                            </ul>

                                                        </li>

                                                    <?php  } ?>



                                                </ul>

                                            </div>

                                        </li>



                                        <?php 



                                        $subcatres = $this->db->query("select * from categories where is_top='1'")->result_array();



                                        foreach($subcatres as $subcatrow) {



                                            ?>

                                            <li><a <?php if($slug2==$subcatrow['slugurl']) { ?> class="active" <?php } ?> href="<?=base_url();?>sc/<?php echo $subcatrow['slugurl'];?>"> 

                                                <?=$subcatrow['title'];?></a></li>

                                            <?php } ?>



                                        </ul>  

                                    </nav> 

                                </div>

                                <!--main menu end-->

                                <div class="header_right_info">

                                 <ul>

                                      <!--  <li class="search_box"><a href="#"><img src="<?=base_url()?>assets/front/images/icon-search2.png" alt=""></a>

                                           <div class="search_widget">

                                            <form action="#">

                                                <input placeholder="Search entire store here ..." type="text">

                                                <button type="submit"><i class="fa fa-search" aria-hidden="true"></i></button>

                                            </form>

                                        </div>

                                    </li> -->

                                    <li class="header_account"><a href="#"><img src="<?=base_url()?>assets/front/images/icon-account2.png" alt=""></a>

                                        <div class="dropdown_account">

                                            <div class="dropdown_account-list">

                                                <ul>

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

                                          </div>



                                      </div>

                                  </li>

                                  <li class="mini_cart_wrapper"><a href="<?=base_url()?>cartlist">
                                    <!-- <img src="<?=base_url()?>assets/front/images/icon-cart2.png" alt=""> -->
                                    <i style="color: white;" class="fa fa-shopping-cart" aria-hidden="true"></i>
                                    <span class="item_count">

                                      <?php

                                      if(!empty($cartres)) 

                                        { echo $cartres[0]['cartcountitem'];



                                } ?>

                            </span></a>



                            <!--mini cart end-->

                        </li>

                    </ul>

                </div>

            </div>



        </div>

    </div>

</div>

</div>

</div> 

</header>

<!--header area end-->

