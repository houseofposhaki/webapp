
    <!--slider area start-->
    <section class="slider_section slider_s_two">
        <div class="slider_area owl-carousel">

          <?php
            $sliderres = $this->db->query("select * from pgbanner ")->result_array();
            foreach($sliderres as $sliderrow) { 
                ?>
            <div class="single_slider d-flex align-items-center" data-bgimg="<?=base_url()?>uploads/<?=$sliderrow['iconimgae'];?>">
               <div class="container">
                   <div class="row">
                       <div class="col-lg-12">
                           <div class="slider_content">
                               <h1> <?=$sliderrow['title'];?></h1>
                                <h2><?=$sliderrow['description'];?></h2>  
                                <a class="button" href="<?=$sliderrow['bannerurl'];?>">Shop Now</a>
                            </div>
                       </div>
                   </div>
               </div>
                
            </div>
          <?php } ?>
        </div>
    </section>
    <!--slider area end-->
    
    <!--shipping area start-->
    <div class="shipping_area mb-68 mt-30">
        <div class="container">
          <!--   <div class="row">
                <div class="col-lg-4 col-md-6">
                    <div class="single_shipping">
                        <div class="shipping_icone">
                            <i class="zmdi zmdi-replay-30"></i>
                        </div>
                        <div class="shipping_content">
                            <h3>Return & Exchang</h3>
                            <p>Committed to return the money in 30 days</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="single_shipping">
                        <div class="shipping_icone">
                            <i class="zmdi zmdi-boat"></i>
                        </div>
                        <div class="shipping_content">
                            <h3>Recieve Gift Card</h3>
                            <p>Receive gift all over order ₹50</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="single_shipping col_3">
                        <div class="shipping_icone">
                            <i class="zmdi zmdi-phone-in-talk"></i>
                        </div>
                        <div class="shipping_content">
                            <h3>ONLINE SUPPORT 24/7</h3>
                            <p>Receive24/7 online support is always ready</p>
                        </div>
                    </div>
                </div>
            </div> -->
        </div>
    </div>
    <!--shipping area end-->
        <!--product area start-->
    <div class="product_area color_two mb-62">
        <div class="container">
            <div class="row">
                <div class="col-12">
                   <div class="product-header">
                        <div class="section_title title_style2">
                           <h2>New Collection</h2>
                        </div>
                    </div>
                </div>
            </div> 

                    <div class="row">
                        <div class="product_carousel product_column4 owl-carousel">
                          <?php 

                                        $realatedpres = $this->db->query("select * from product order by id desc limit 8 ")->result_array();

                                        foreach($realatedpres as $relatedprows) {
                                            $rofferprice = $relatedprows['offerprice'];
                                            $rnormalprice = $relatedprows['normalprice'];

                                            ?>
                            <div class="col-lg-3">
                                <div class="product_items">
                                    <article class="single_product">
                                        <figure>
                                            <div class="product_thumb home_slidert">
                                                <a class="primary_img" href="<?=base_url()?>p/details/<?=$relatedprows['slugurl'];?>/<?=$relatedprows['id'];?>">
                                                    <img src="<?=base_url();?>uploads/<?=$relatedprows['featureimg'];?>" alt=""></a>
                                           
                                                <div class="action_links">
                                                    <ul>
                                                       
                                                      
                                                    </ul>
                                                </div>
                                            </div>
                                            <figcaption class="product_content">
                                               <div class="product_content-header">
                                                    <h4 class="product_name"><a href="#"><?=$relatedprows['title'];?></a></h4>
                                                 <!--    <div class="wishlist-btn">
                                                        <a href="#"><i class="zmdi zmdi-favorite-outline"></i></a>
                                                    </div> -->
                                                </div>
                                                <div class="product_price_rating">
                                                    <div class="price_box"> 
                                                        <!-- <span class="current_price">₹<?=$relatedprows['offerprice'];?></span> -->
                                 <!--   <?php if(!empty($rofferprice)) { ?> 
                                   <span class="price-old"><del>₹<?=$relatedprows['normalprice']?></del></span>
                               <?php }else { ?>
                                   <span class="price-old">₹<?=$relatedprows['normalprice']?></span>
                               <?php } ?> -->
                                                    </div>
                                                    <div class="product_rating">
                                                       
                                                   </div>
                                               </div>
                                            </figcaption>
                                        </figure>
                                    </article>
                                </div>
                            </div>
                          <?php } ?>
                        </div> 
                    </div>   
 
        </div>
    </div>
    <!--product area end-->


     <!--banner area start-->
    <div class="banner_area banner-style2 mb-70">
        <div class="container">
            <div class="row">
                <?php 

                            $subcatres = $this->db->query("select * from categories where is_top='1' order by id asc limit 2")->result_array();

                            foreach($subcatres as $subcatrow) {
                                ?>
                <div class="col-lg-6 col-md-6">
                    <figure class="single_banner">
                        <div class="banner_thumb">
                            <a href="<?=base_url();?>sc/<?php echo $subcatrow['slugurl'];?>/<?=$subcatrow['id']?>"><img src="<?=base_url()?>uploads/<?=$subcatrow['featureimg'];?>" alt=""></a>
                            <div class="banner_conent-style1">
                                <h2><?=$subcatrow['title'];?></h2>
                            </div>
                        </div>
                    </figure>
                </div>
            <?php }  ?>
             
            </div>
        </div>
    </div>
    <!--banner area end-->
    

    
    <!--product area start-->
    <div class="product_area color_two mb-62">
        <div class="container">
            <div class="row">
                <div class="col-12">
                   <div class="product-header">
                        <div class="section_title title_style2">
                           <h2>Shop BY Category</h2>
                        </div>
                    </div>
                </div>
            </div> 
                    <div class="row">
                        <div class="product_carousel product_column4 owl-carousel">
                           <?php 

                            $subcatres = $this->db->query("select * from categories where is_top='1'")->result_array();

                            foreach($subcatres as $subcatrow) {

                                ?>
                            <div class="col-lg-3">
                                <div class="product_items">
                                    <article class="single_product">
                                        <figure>
                                            <div class="product_thumb">
                                                <a class="primary_img" href="<?=base_url();?>sc/<?php echo $subcatrow['slugurl'];?>/<?=$subcatrow['id']?>">
                                                  <img src="<?=base_url()?>uploads/<?=$subcatrow['featureimg'];?>" alt=""></a>
                                                <div class="action_links">
                                                    <ul>
                                                       
                                                    </ul>
                                                </div>
                                            </div>
                                            <figcaption class="product_content">
                                               <div class="product_content-header">
                                                    <h4 class="product_name"><a href="<?=base_url();?>sc/<?php echo $subcatrow['slugurl'];?>/<?=$subcatrow['id']?>"><?=$subcatrow['title']?></a></h4>
                                                    <div class="wishlist-btn">
                                                    </div>
                                                </div>
                                                <div class="product_price_rating">
                                                    
                                                    <div class="product_rating">
                                                     
                                                   </div>
                                               </div>
                                            </figcaption>
                                        </figure>
                                    </article>
                                </div>
                            </div>
                          <?php } ?>
                        </div> 
                    </div>   

        </div>
    </div>
    <!--product area end-->


<?php $specialcatRes = $this->db->query("select * from categories where ispopular='1'")->result_array() ; 
foreach($specialcatRes as $specialcatRow) {
    $specialcatid = $specialcatRow['id'];
 ?>
     <div class="product_area color_two mb-62">
        <div class="container">
            <div class="row">
                <div class="col-12">
                   <div class="product-header">
                        <div class="section_title title_style2">
                           <h2><?=$specialcatRow['title'];?></h2>
                        </div>
                    </div>
                </div>
            </div> 
                    <div class="row">
                        <div class="product_carousel product_column4 owl-carousel">
                    
                                <?php 
                       $pres = $this->db->query("select * from product")->result_array();
                       foreach($pres as $blogrows){
                        $blogcatid = $blogrows['maincatid'];
                        $catidexplode = explode(',',$blogcatid);
                        foreach($catidexplode as $drows1)
                        {
                         if($specialcatid==$drows1)

                         { 
                           $productid = $blogrows['id'];
                           $producttitle = $blogrows['title'];
                           $normalprice = $blogrows['normalprice'];
                           $offerprice = $blogrows['offerprice'];


                           if(empty($offerprice))
                           {
                            $offerprice = $normalprice ; 
                          }else{
                            $offerprice = $offerprice ; 
                          }

                          ?>
                            <div class="col-lg-3">
                                <div class="product_items">
                                    <article class="single_product">
                                        <figure>
                                            <div class="product_thumb">
                                                <a class="primary_img" href="<?=base_url()?>p/details/<?=$blogrows['slugurl'];?>/<?=$blogrows['id'];?>">
                                                  <img src="<?=base_url()?>uploads/<?=$blogrows['featureimg'];?>" alt=""></a>
                                                <div class="action_links">
                                                    <ul>
                                                       
                                                    </ul>
                                                </div>
                                            </div>
                                            <figcaption class="product_content">
                                               <div class="product_content-header">
                                                    <h4 class="product_name"><a href="<?=base_url()?>p/details/<?=$blogrows['slugurl'];?>/<?=$blogrows['id'];?>"><?=$blogrows['title']?></a></h4>
                                                    <div class="wishlist-btn">
                                                    </div>
                                                </div>
                                                <div class="product_price_rating">
                                                    
                                                    <div class="product_rating">
                                                     
                                                   </div>
                                               </div>
                                            </figcaption>
                                        </figure>
                                    </article>
                                </div>
                            </div>
                     <?php } } } ?>

                        </div> 
                    </div>   

        </div>
    </div>
    
<?php } ?>

    
    <!--testimonial area start-->
    <div class="testimonial_area mb-70">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="testimonial_container">
                        <div class="testimonial_title">
                            <h2>WHAT CLIENT SAY ?</h2>
                        </div>
                        <div class="testimonial_carousel owl-carousel">
                             <?php 
                                    $reviewres = $this->db->query("select * from review order by id desc ")->result_array();
                                    foreach($reviewres as $reviewrow){
                                    ?>
                            <div class="single_testimonial">
                                <div class="testimonial_content">
                                    <p><?php echo $reviewrow['creview'];?></p>
                                </div>
                                <div class="testimonial_text_img">
                                    <?php if(!empty($reviewrow['featureimg'])) { ?>
                                    <div class="testimonial_img">
                                        <a href="">
                                        <img src="<?=base_url()?>uploads/<?=$reviewrow['featureimg'];?>">
                                        </a>
                                    </div>
                                <?php } ?>
                                    <div class="testimonial_author">
                                        <a href="#"><?php echo $reviewrow['cname'];?></a>
                                    </div>
                                </div>
                            </div>
                        <?php } ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--testimonial area end-->

    
    <!--brand area start-->
    <div class="brand_area color_two">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="brand_container owl-carousel">
                        <?php
                            $brnadres = $this->db->query("select * from brand ")->result_array();
                            foreach($brnadres as $brandrow) {
                             ?>
                        <div class="single_brand">
                            <a href="#"><img src="<?=base_url()?>uploads/<?=$brandrow['iconimgae'];?>" alt=""></a>
                        </div>
                    <?php } ?>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--brand area end-->
    

    