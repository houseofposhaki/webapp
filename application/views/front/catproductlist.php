
<?php 

if(!empty($this->session->userdata['logged_in']['id']))

{

  $userid = $this->session->userdata['logged_in']['id'];

}else{

  $userid = "";

}

$catid =  $this->uri->segment('3'); 

$catres = $this->db->query("select * from categories where id='$catid'")->result_array();

if(!empty($catres))

{

  $catname = $catres[0]['title'];

}





$cookie_name = "cartcookieposhaki";

if(!empty($_COOKIE[$cookie_name]))

{

  $cookievalis = $_COOKIE[$cookie_name];

}else{

  $cookievalis = "";

}







?>



<section class="padd_topty _padd_bootmty bgassfg">

 <div class="container-fluid">

    <div class="row">

        <div class="col-md-2 col-sm-4  sidebar pad_rightoff">

            <button type="button" class="btn btn-filter medium_hide"> 

                Product Filters 

                <i class="fa fa-angle-down" aria-hidden="true"></i> 

            </button>

            <div class=" left_bar_catagory filterbar">

                <div class="closeFilter medium_hide"><i class="fas fa-times"></i></div>

                <div class="wedgetleft">

                    <h4><a href="#;" class="site-nav">

                        <span>CATEGORIES</span></a>

                    </h4>

                    <ul class="sublinks">

                        <div class="brands-name">

                            <ul class="nav nav-pills nav-stacked">

                             <?php 

                             $maincat = $this->db->query("select * from categories where parentid=0")->result_array();

                             foreach($maincat as $maincatrow) {

                                ?>

                                <li><a href="<?=base_url();?>c/<?php echo $maincatrow['slugurl'];?>/<?=$maincatrow['id']?>"><span class="pull-right"></span>

                                    <?=$maincatrow['title']?>

                                </a></li>

                            <?php } ?> 

                        </ul>

                    </div>

                </ul>

            </div>

            <!-- <div class="wedgetleft">

                <h4><a href="#;" class="site-nav">

                    <span>BRANDS</span></a>

                </h4>

                <ul class="sublinks price-container">

                    <li> 

                        <label class="radio-container">

                            Rs 11.00 - Rs 12.00 (1)

                            <input type="radio" name="radio">

                            <span class="checkmark"></span>

                        </label>

                    </li>

                    <li> 

                        <label class="radio-container">

                            Rs 45.00 - Rs 48.00 (16)

                            <input type="radio" name="radio">

                            <span class="checkmark"></span>

                        </label>

                    </li>

                    <li> 

                        <label class="radio-container">

                            Rs 50.00 - Rs 66.00 (10)

                            <input type="radio" name="radio">

                            <span class="checkmark"></span>

                        </label>

                    </li>

                    <li> 

                        <label class="radio-container">

                            Rs 70.00 - Rs 80.00 (9)

                            <input type="radio" name="radio">

                            <span class="checkmark"></span>

                        </label>

                    </li>

                </ul>

            </div> -->





        </div>             

    </div>

    <div class="col-md-10 col-sm-8 col-xs-12 w_width">

        <div class="shop_toolbar_wrapper">

            <div class="shop_toolbar_btn">

                <h4><?=$catname?></h4>

            </div>

           <!--  <form class="select_option" action="#">

                <select name="orderby" id="short">

                    <option selected="" value="1">Sort by average rating</option>

                    <option value="2">Sort by popularity</option>

                    <option value="3">Sort by newness</option>

                    <option value="4">Sort by price: low to high</option>

                    <option value="5">Sort by price: high to low</option>

                    <option value="6">Product Name: Z</option>

                </select>

            </form> -->



        </div>

        <div class="r_side_right">

            <div class="row">



                <?php 

           // $passid =  $this->uri->segment('3'); 

                $pres = $this->db->query("select * from product")->result_array();

          //print_r($pres);die;

                foreach($pres as $blogrows){

                  $blogcatid = $blogrows['maincatid'];

                  $catidexplode = explode(',',$blogcatid);

                  foreach($catidexplode as $drows1)

                  {

                   if($catid==$drows1)

                    { 



                     $productid = $blogrows['id'];

                     $offerprice = $blogrows['offerprice'];

                



                ?>

                <div class="col-md-3 col-sm-6 col-xs-6">

                    <div class="product-box common-cart-box ">

                        <div class="product-img common-cart-img">

                            <a href="<?=base_url()?>p/details/<?=$blogrows['slugurl'];?>/<?=$blogrows['id'];?>">

                            <img src="<?=base_url();?>uploads/<?=$blogrows['featureimg'];?>" alt="product-img">
                            </a>

                        </div>

                        <div class="product-info common-cart-info text-center">

                            <a href="<?=base_url()?>p/details/<?=$blogrows['slugurl'];?>/<?=$blogrows['id'];?>" class="cart-name cartcontyr">

                                <?=$blogrows['title'];?>

                            </a>

                            <p class="cart-price"><del>Rs <?=$blogrows['normalprice'];?></del>Rs <?=$blogrows['offerprice'];?></p>

                        </div>





                        <div class="hover-option text-center">

                            <?php 



                            $chkcartres = $this->db->query("select * from cart where cookievalis = '".$cookievalis."' 

                             and userid='$userid' and productid='".$productid."' and status='0' ")->result_array();



                            if(empty($chkcartres[0]['id'])) {



                              ?>



                              <div class="add-cart-btn">



                                <form action="<?=base_url();?>Cart/addtocart" method="post">

                                    <div class="spinner-block">

                                      <input type="hidden" class="form-control text-center" value="1">

                                  </div>



                                  <input type="hidden" name="currenturl" value="<?php echo  $actual_link = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]"; ?>">



                                  <input type="hidden" name="productid" value="<?php echo$productid;?>">



                                  <input type="hidden" name="productprice" value="<?=$offerprice;?>">

                                  <button class="btn btn-primary">ADD TO CART</button>

                              </form>



                          </div>

                      <?php }else { ?>

                          <button type="button" class="btn btn-primary itemadded">ITEM ADDED</button>

                      <?php } ?>





                  </div>



              </div>

          </div>





      <?php } } } ?>





  </div>

</div>

</div>

</div>

</div>

</section>











<div class="container-fluid">

    <div class="row">

        <div class="col-md-12 ">

            <div class="facility-style-2">

                <div class="facility-box">

                    <div class="facility-inner">

                        <div class="fb-icon">

                            <i class="fa fa-truck"></i>

                        </div>

                        <div class="fb-text">

                            <h5>FREE DELIVERY</h5>

                            <span>Worldwide</span>

                        </div>

                    </div>

                </div>

                <div class="facility-box">

                    <div class="facility-inner">

                        <div class="fb-icon">

                            <i class="fa fa-headphones"></i>

                        </div>

                        <div class="fb-text">

                            <h5>24/ 7 SUPPORT</h5>

                            <span>Customer Support</span>

                        </div>

                    </div>

                </div>

                <div class="facility-box">

                    <div class="facility-inner">

                        <div class="fb-icon">

                            <i class="fab fa-cc-mastercard"></i>

                        </div>

                        <div class="fb-text">

                            <h5>PAYMENT</h5>

                            <span>Secure System</span>

                        </div>

                    </div>

                </div>

                <div class="facility-box">

                    <div class="facility-inner">

                        <div class="fb-icon">

                            <i class="fa fa-trophy"></i>

                        </div>

                        <div class="fb-text">

                            <h5>TRUSTED</h5>

                            <span>enuine Products</span>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </div>

</div>



