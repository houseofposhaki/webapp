<?php

$contactres = $this->db->query("select * from  contactpg where id='1' ")->result_array();

foreach($contactres as $contactrow)

{

   $contactinfo = $contactrow['contactinfo'];

   $address = $contactrow['address'];

   $email = $contactrow['email'];

   $fburl = $contactrow['fburl'];

   $twitterurl = $contactrow['twitterurl'];

   $instaurl = $contactrow['instaurl'];

}

?>





    <!--footer area start-->
    <footer class="footer_widgets color_two">
        <div class="footer_top">
            <div class="container">
                <div class="row">
                   <div class="col-lg-6">
                        <div class="row">
                            <div class="col-lg-7 col-md-7 col-sm-7">
                                <div class="widgets_container contact_us">
                                   <div class="footer_logo">
                                       <a href="index.html"><img src="<?=base_url()?>assets/front/images/Logo.png" alt=""></a>
                                   </div>
                                    <p><span>Address:</span> 118B Jagat Bose Road, Kolklata- 700026</p>
                                    <p><span>Email:</span> <a target="_blank" href="#">houseofposhaki@gmail.com</a></p>
                                    <p><span>Phone:</span> <a href="tel:+7003213063">7003213063</a></p>
                                </div>
                            </div>
                            <div class="col-lg-5 col-md-5 col-sm-5">
                                <div class="widgets_container widget_menu">
                                    <h3>Customer Service</h3>
                                    <div class="footer_menu">
                                        <ul>
                                            <li><a href="#">Affiliates</a></li>
                                            <li><a href="#">About Us</a></li>
                                            <li><a href="#">Delivery Information</a></li>
                                            <li><a href="#">Privacy Policy</a></li>
                                            <li><a href="#">Terms & Conditions</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="row">
                            <div class="col-lg-4 col-md-4 col-sm-4">
                                <div class="widgets_container widget_menu">
                                    <h3>My Account</h3>
                                    <div class="footer_menu">
                                        <ul>
                                            <li><a href="#">My Account</a></li>
                                            <li><a href="#">Order History</a></li>
                                            <li><a href="#">Wish List</a></li>
                                            <li><a href="#">Gift Certificates</a></li>
                                            <li><a href="#">Returns</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-8 col-md-8 col-sm-8">
                                <div class="widgets_container widget_menu">
                                    <h3>Newsletter</h3>
                                    <div class="subscribe_form">
                                        <form id="mc-form" class="mc-form footer-newsletter" >
                                            <input id="mc-email" type="email" autocomplete="off" placeholder="Enter you email address" />
                                            <button id="mc-submit"><i class="zmdi zmdi-email-open"></i></button>
                                        </form>
                                        
                                    </div>
                                    <div class="footer_social">
                                        <h3>follow us on</h3>
                                        <ul>
                                            <li><a href="#"><i class="zmdi zmdi-facebook"></i></a></li>
                                            <li><a href="#"><i class="zmdi zmdi-twitter"></i></a></li>
                                            <li><a href="#"><i class="zmdi zmdi-rss"></i></a></li>
                                            <li><a href="#"><i class="zmdi zmdi-youtube-play"></i></a></li>
                                            <li><a href="#"><i class="zmdi zmdi-google-old"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="footer_bottom">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="footer_bottom_container">
                            <div class="footer_link">
                                <ul>
                                    <li><a href="#">Contact Us</a></li>
                                    <li><a href="#">Site Map</a></li>
                                    <li><a href="#">Specials</a></li>
                                    <li><a href="#">Returns</a></li>
                                </ul>
                            </div>
                            <div class="copyright_area">
                                    <p>Copyright &copy; 2023 <a href="#">houseofposhaki</a>  All Right Reserved.</p>
                                </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>   
    </footer>
    <!--footer area end-->
   
    <!-- modal area start-->
    <div class="modal fade" id="modal_box" tabindex="-1" role="dialog"  aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true"><i class="zmdi zmdi-close"></i></span>
                </button>
                <div class="modal_body">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-5 col-md-5 col-sm-12">
                                <div class="modal_tab">  
                                    <div class="tab-content product-details-large">
                                        <div class="tab-pane fade show active" id="tab1" role="tabpanel" >
                                            <div class="modal_tab_img">
                                                <a href="#"><img src="<?=base_url()?>assets/front/images/product14.jpeg" alt=""></a>    
                                            </div>
                                        </div>
                                        <div class="tab-pane fade" id="tab2" role="tabpanel">
                                            <div class="modal_tab_img">
                                                <a href="#"><img src="<?=base_url()?>assets/front/images/product15.jpeg" alt=""></a>    
                                            </div>
                                        </div>
                                        <div class="tab-pane fade" id="tab3" role="tabpanel">
                                            <div class="modal_tab_img">
                                                <a href="#"><img src="<?=base_url()?>assets/front/images/product17.jpg" alt=""></a>    
                                            </div>
                                        </div>
                                        <div class="tab-pane fade" id="tab4" role="tabpanel">
                                            <div class="modal_tab_img">
                                                <a href="#"><img src="<?=base_url()?>assets/front/images/saree03.jpeg" alt=""></a>    
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal_tab_button">    
                                        <ul class="nav product_navactive owl-carousel" role="tablist">
                                            <li >
                                                <a class="nav-link active" data-bs-toggle="tab" href="#tab1" role="tab" aria-controls="tab1" aria-selected="false"><img src="<?=base_url()?>assets/front/images/product14.jpeg" alt=""></a>
                                            </li>
                                            <li>
                                                 <a class="nav-link" data-bs-toggle="tab" href="#tab2" role="tab" aria-controls="tab2" aria-selected="false"><img src="<?=base_url()?>assets/front/images/product15.jpeg" alt=""></a>
                                            </li>
                                            <li>
                                               <a class="nav-link button_three" data-bs-toggle="tab" href="#tab3" role="tab" aria-controls="tab3" aria-selected="false"><img src="<?=base_url()?>assets/front/images/product17.jpg" alt=""></a>
                                            </li>
                                            <li>
                                               <a class="nav-link" data-bs-toggle="tab" href="#tab4" role="tab" aria-controls="tab4" aria-selected="false"><img src="<?=base_url()?>assets/front/images/saree03.jpeg" alt=""></a>
                                            </li>

                                        </ul>
                                    </div>    
                                </div>  
                            </div> 
                            <div class="col-lg-7 col-md-7 col-sm-12">
                                <div class="modal_right">
                                    <div class="modal_title mb-10">
                                        <h2>Lorem ipsum dolor sit amet</h2> 
                                    </div>
                                    <div class="modal_price mb-10">
                                        <span class="new_price">₹64.99</span>    
                                        <span class="old_price" >₹78.99</span>    
                                    </div>
                                    <div class="modal_description mb-15">
                                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Mollitia iste laborum ad impedit pariatur esse optio tempora sint ullam autem deleniti nam in quos qui nemo ipsum numquam, reiciendis maiores quidem aperiam, rerum vel recusandae </p>    
                                    </div> 
                                    <div class="variants_selects">
                                        <div class="variants_size">
                                           <h2>size</h2>
                                           <select class="select_option">
                                               <option selected value="1">s</option>
                                               <option value="1">m</option>
                                               <option value="1">l</option>
                                               <option value="1">xl</option>
                                               <option value="1">xxl</option>
                                           </select>
                                        </div>
                                        <div class="variants_color">
                                           <h2>color</h2>
                                           <select class="select_option">
                                               <option selected value="1">purple</option>
                                               <option value="1">violet</option>
                                               <option value="1">black</option>
                                               <option value="1">pink</option>
                                               <option value="1">orange</option>
                                           </select>
                                        </div>
                                        <div class="modal_add_to_cart">
                                            <form action="#">
                                                <input min="1" max="100" step="2" value="1" type="number">
                                                <button type="submit">add to cart</button>
                                            </form>
                                        </div>   
                                    </div>
                                    <div class="modal_social">
                                        <h2>Share this product</h2>
                                        <ul>
                                            <li class="facebook"><a href="#"><i class="fa fa-facebook"></i></a></li>
                                            <li class="twitter"><a href="#"><i class="fa fa-twitter"></i></a></li>
                                            <li class="pinterest"><a href="#"><i class="fa fa-pinterest"></i></a></li>
                                            <li class="google-plus"><a href="#"><i class="fa fa-google-plus"></i></a></li>
                                            <li class="linkedin"><a href="#"><i class="fa fa-linkedin"></i></a></li>
                                        </ul>    
                                    </div>      
                                </div>    
                            </div>    
                        </div>     
                    </div>
                </div>    
            </div>
        </div>
    </div>
    <!-- modal area end-->
    
        
<!-- JS
============================================ -->
<!--jquery min js-->
<script src="<?=base_url()?>assets/front/js/jquery-3.4.1.min.js"></script>
<script src="<?=base_url()?>assets/front/js/popper.js"></script>
<script src="<?=base_url()?>assets/front/js/bootstrap.min.js"></script>
<script src="<?=base_url()?>assets/front/js/owl.carousel.min.js"></script>
<script src="<?=base_url()?>assets/front/js/slick.min.js"></script>
<script src="<?=base_url()?>assets/front/js/jquery.magnific-popup.min.js"></script>
<script src="<?=base_url()?>assets/front/js/jquery.ui.js"></script>
<script src="<?=base_url()?>assets/front/js/jquery.elevatezoom.js"></script>
<script src="<?=base_url()?>assets/front/js/isotope.pkgd.min.js"></script>
<script src="<?=base_url()?>assets/front/js/slinky.menu.js"></script>
<script src="<?=base_url()?>assets/front/js/plugins.js"></script>

<!-- Main JS -->
<script src="<?=base_url()?>assets/front/js/main.js"></script>



</body>

</html>