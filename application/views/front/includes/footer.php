

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
                                       <a href="<?=base_url()?>"><img src="<?=base_url()?>assets/front/images/Logo.png" alt=""></a>
                                   </div>
                                    <p><span>Address:</span><?=$address?></p>
                                    <p><span>Email:</span> <a target="_blank" href="mailto:<?=$email?>"><?=$email?></a></p>
                                    <p><span>Phone:</span> <a href="tel:<?=$contactinfo?>"><?=$contactinfo?></a></p>
                                </div>
                            </div>
                         
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="row">
                            <div class="col-lg-4 col-md-4 col-sm-4">
                                <div class="widgets_container widget_menu">
                                    <h3>Important Links</h3>
                                    <div class="footer_menu">
                                        <ul>
                                            <?php 
                                    $pgres = $this->db->query("select * from pages order by id desc")->result_array();
                                    foreach($pgres as $pgrow) {
                                    ?>
                                    <li><a href="<?=base_url()?>pages/<?=$pgrow['pgurl'];?>"><?=$pgrow['pgname'];?></a></li>
                                  <?php } ?>
                                  <li><a href="<?=base_url()?>contact-us">Contact Us</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-8 col-md-8 col-sm-8">
                                <div class="widgets_container widget_menu">
                                    <div class="footer_social">
                                        <h3>follow us on</h3>
                                        <ul>
                                            <li><a href="<?=$fburl?>"><i class="zmdi zmdi-facebook"></i></a></li>
                                            <li><a href="<?=$twitterurl?>"><i class="zmdi zmdi-twitter"></i></a></li>
                                            <li><a href="<?=$instaurl?>"><i class="zmdi zmdi-instagram"></i></a></li>
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
                           <!--  <div class="footer_link">
                                <ul>
                                    <li><a href="#">Contact Us</a></li>
                                    <li><a href="#">Site Map</a></li>
                                    <li><a href="#">Specials</a></li>
                                    <li><a href="#">Returns</a></li>
                                </ul>
                            </div> -->
                            <div class="copyright_area">
                                    <p>Copyright &copy; 2023 <a href="<?=base_url()?>">houseofposhaki</a>  All Right Reserved.</p>
                                </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>   
    </footer>
    <!--footer area end-->

    
        
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