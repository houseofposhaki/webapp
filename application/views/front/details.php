<?php 
$actual_link = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";

$productid =  $this->uri->segment('4');

$pres = $this->db->query("select * from product where id='$productid'")->result_array();

if(!empty($pres))

{

  $title = $pres[0]['title'];

  $featureimg = $pres[0]['featureimg'];

  $normalprice = $pres[0]['normalprice'];

  $offerprice = $pres[0]['offerprice'];

  $description = $pres[0]['description'];

  $datasheet = $pres[0]['datasheet'];

  $brandid = $pres[0]['brandid'];

  $composition = $pres[0]['composition'];

  $maincatid = $pres[0]['maincatid'];

}else{

  $title="";

  $featureimg="";

  $normalprice="";

  $offerprice="";

  $description="";

  $datasheet="";

  $brandid="";

  $composition = "";

  $maincatid = ""; 

}

if(empty($offerprice))
{
    $offerprice = $normalprice ; 
}else{
    $offerprice = $offerprice ; 
}

$cookie_name = "cartcookieposhaki";
if(!empty($_COOKIE[$cookie_name]))
{
  $cookievalis = $_COOKIE[$cookie_name];
}else{
  $cookievalis = "";
}

?>

    <!--breadcrumbs area start-->
    <div class="breadcrumbs_area">
        <div class="container">   
            <div class="row">
                <div class="col-12">
                    <div class="breadcrumb_content">
                        <ul>
                            <li><a href="<?=base_url()?>">home</a></li>
                            <li>product details</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>         
    </div>
    <!--breadcrumbs area end-->
    
    <!--product details start-->
    <div class="product_details mt-60 mb-60">
        <div class="container">
            <div class="row">
                <div class="col-lg-5 col-md-6">
                    <div class="product-details-tab">
                        <div id="img-1" class="zoomWrapper single-zoom">
                            <a href="#">
                                <img id="zoom1" src="<?=base_url()?>uploads/<?php echo $featureimg;?>" 
                                data-zoom-image="<?=base_url()?>uploads/<?php echo $featureimg;?>" alt="big-1">
                            </a>
                        </div>
                        <div class="single-zoom-thumb">
                            <ul class="s-tab-zoom owl-carousel single-product-active" id="gallery_01">
                                 <?php 
                                        $photores = $this->db->query("select * from photos where blogid='$productid'")->result_array();
                                        foreach($photores as $photorow){
                                            ?>
                                <li>
                                    <a href="#" class="elevatezoom-gallery active" data-update="" data-image="<?=base_url()?>uploads/<?=$photorow['image'];?>" data-zoom-image="<?=base_url()?>uploads/<?=$photorow['image'];?>">
                                        <img src="<?=base_url()?>uploads/<?=$photorow['image'];?>" alt="zo-th-1"/>
                                    </a>

                                </li>
                                <?php } ?>
                               
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6">
                    <div class="product_d_right">
                         <form action="<?=base_url();?>Cart/addtocart" method="post">
                                        <input type="hidden" name="productid" value="<?php echo $productid;?>">
                                        <input type="hidden" name="productprice" value="<?=$offerprice;?>">
                           
                            <h1><a href="#"><?=$title?></a></h1>
                              <!-- <div class=" product_ratting">
                                <ul>
                                    <li><a href="#"><i class="fa fa-star"></i></a></li>
                                    <li><a href="#"><i class="fa fa-star"></i></a></li>
                                    <li><a href="#"><i class="fa fa-star"></i></a></li>
                                    <li><a href="#"><i class="fa fa-star"></i></a></li>
                                    <li><a href="#"><i class="fa fa-star"></i></a></li>
                                    <li class="review"><a href="#"> (customer review ) </a></li>
                                </ul>
                                
                            </div> -->
                            <div class="price_box">
                                <span class="current_price">₹<?=$offerprice?></span>
                               <?php if(($offerprice<$normalprice)) { ?> <span class="old_price">₹<?=$normalprice?></span> <?php } ?>
                                
                            </div>
                            <div class="product_desc">
                                <p><?=$description?> </p>
                            </div>
                            <div class="product_variant color row col-12">
                                <?php 
                                        $varres = $this->db->query("select * from productvarient where productid='$productid' ")->result_array();
                                        if(!empty($varres[0]['color'])) { 
                                            ?>
                                <div class="col-6">
                                    <label>color</label>
                                    <select name="color" class="form-control col-6" required>
                                        <option value="">-select one-</option>
                                        <?php 
                                        $varres = $this->db->query("select * from productvarient where productid='$productid' ")->result_array();
                                        foreach($varres as $varrow) {
                                        ?>
                                        <option value="<?=$varrow['color'];?>"><?=$varrow['color'];?></option>
                                    <?php } ?>
                                    </select>
                                </div>

                            <?php } ?>


                            <?php 
                                        $varres = $this->db->query("select * from productvarient where productid='$productid' ")->result_array();
                                        if(!empty($varres[0]['size'])) { 
                                            ?>
                                <div class="col-6">
                                    <label>Size</label>
                                    <select name="color" class="form-control col-6" required>
                                        <option value="">-select one-</option>
                                        <?php 
                                        $varres = $this->db->query("select * from productvarient where productid='$productid' ")->result_array();
                                        foreach($varres as $varrow) {
                                        ?>
                                        <option value="<?=$varrow['size'];?>"><?=$varrow['size'];?></option>
                                    <?php } ?>
                                    </select>
                                </div>
                            <?php } ?>
                            </div>
                            <div class="product_variant quantity">
                                <label>quantity</label>
                                <input name="qty" min="1" max="100" value="1" type="number">
                                <button class="button" type="submit">add to cart</button>  
                                
                            </div>
                           
                        </form>
                        <div class="priduct_social">
                            <ul>
                                <li><a class="facebook"  href="http://www.facebook.com/sharer.php?u=<?=$actual_link?>" target="_blank" title="facebook"><i class="fa fa-facebook"></i> Like</a></li>           
                                <li><a class="twitter"href="http://twitter.com/share?url=<?=$actual_link?>&text=Simple Share Buttons&hashtags=simplesharebuttons" target="_blank" title="twitter"><i class="fa fa-twitter"></i> tweet</a></li>           
                                    
                            </ul>      
                        </div>

                    </div>
                </div>
            </div>
        </div>    
    </div>
    <!--product details end-->
    
    <!--product info start-->
    <div class="product_d_info mb-58">
        <div class="container">   
            <div class="row">
                <div class="col-12">
                    <div class="product_d_inner">   
                        <div class="product_info_button">    
                            <ul class="nav" role="tablist">
                                <li >
                                    <a class="active" data-bs-toggle="tab" href="#info" role="tab" aria-controls="info" aria-selected="false">Description</a>
                                </li>
                               
                             <!--    <li>
                                   <a data-bs-toggle="tab" href="#reviews" role="tab" aria-controls="reviews" aria-selected="false">Reviews (1)</a>
                                </li> -->
                            </ul>
                        </div>
                        <div class="tab-content">
                            <div class="tab-pane fade show active" id="info" role="tabpanel" >
                                <div class="product_info_content">
                                   <p><?=$description?></p>
                                </div>    
                            </div>
                    

                           <!--  <div class="tab-pane fade" id="reviews" role="tabpanel" >
                                <div class="reviews_wrapper">
                                    <h2>1 review for Donec eu furniture</h2>
                                    <div class="reviews_comment_box">
                                        <div class="comment_thmb">
                                            <img src="<?=base_url()?>assets/front/images/comment2.webp" alt="">
                                        </div>
                                        <div class="comment_text">
                                            <div class="reviews_meta">
                                                <div class="star_rating">
                                                    <ul>
                                                        <li><a href="#"><i class="ion-ios-star"></i></a></li>
                                                        <li><a href="#"><i class="ion-ios-star"></i></a></li>
                                                        <li><a href="#"><i class="ion-ios-star"></i></a></li>
                                                        <li><a href="#"><i class="ion-ios-star"></i></a></li>
                                                        <li><a href="#"><i class="ion-ios-star"></i></a></li>
                                                    </ul>   
                                                </div>
                                                <p><strong>admin </strong>- September 12, 2018</p>
                                                <span>roadthemes</span>
                                            </div>
                                        </div>
                                        
                                    </div>
                                    <div class="comment_title">
                                        <h2>Add a review </h2>
                                        <p>Your email address will not be published.  Required fields are marked </p>
                                    </div>
                                    <div class="product_ratting mb-10">
                                       <h3>Your rating</h3>
                                        <ul>
                                            <li><a href="#"><i class="fa fa-star"></i></a></li>
                                            <li><a href="#"><i class="fa fa-star"></i></a></li>
                                            <li><a href="#"><i class="fa fa-star"></i></a></li>
                                            <li><a href="#"><i class="fa fa-star"></i></a></li>
                                            <li><a href="#"><i class="fa fa-star"></i></a></li>
                                        </ul>
                                    </div>
                                    <div class="product_review_form">
                                        <form action="#">
                                            <div class="row">
                                                <div class="col-12">
                                                    <label for="review_comment">Your review </label>
                                                    <textarea name="comment" id="review_comment" ></textarea>
                                                </div> 
                                                <div class="col-lg-6 col-md-6">
                                                    <label for="author">Name</label>
                                                    <input id="author"  type="text">

                                                </div> 
                                                <div class="col-lg-6 col-md-6">
                                                    <label for="email">Email </label>
                                                    <input id="email"  type="text">
                                                </div>  
                                            </div>
                                            <button type="submit">Submit</button>
                                         </form>   
                                    </div> 
                                </div>     
                            </div> -->
                        </div>
                    </div>     
                </div>
            </div>
        </div>    
    </div>  
    <!--product info end-->
    
    <!--product area start-->
    <section class="product_area related_products">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section_title">
                        <h2>Related Products</h2>
                    </div>
                </div>
            </div> 
            <div class="row">
                <div class="product_carousel product_column4 owl-carousel">
                    <?php 

                                    $realatedpres = $this->db->query("select * from product where maincatid='$maincatid' limit 5 ")->result_array();

                                    foreach($realatedpres as $relatedprows) {
                                        if($relatedprows['id']!=$productid) { 

                                        ?>
                    <div class="col-lg-3">
                        <article class="single_product">
                                    <figure>
                                        <div class="product_thumb">
                                            <a class="primary_img" href="<?=base_url()?>p/details/<?=$relatedprows['slugurl'];?>/<?=$relatedprows['id'];?>"><img src="<?=base_url();?>uploads/<?=$relatedprows['featureimg'];?>" alt="<?=base_url();?>uploads/<?=$relatedprows['featureimg'];?>"></a>
                                            <!-- <div class="action_links">
                                                <ul>
                                                    <li class="add_to_cart"><a href="#" title="Add to cart"><i class="zmdi zmdi-shopping-cart"></i></a></li>
                                                    <li class="compare"><a href="#" title="Add to Compare"><i class="zmdi zmdi-refresh"></i></a></li>

                                                    <li class="quick_button"><a href="#" data-bs-toggle="modal" data-bs-target="#modal_box"  title="quick view"> <i class="zmdi zmdi-eye"></i></a></li>
                                                </ul>
                                            </div> -->
                                        </div>
                                        <figcaption class="product_content">
                                           <div class="product_content-header">
                                                <h4 class="product_name"><a href="<?=base_url()?>p/details/<?=$relatedprows['slugurl'];?>/<?=$relatedprows['id'];?>"> <?=$relatedprows['title']?></a></h4>
                                               <!--  <div class="wishlist-btn">
                                                    <a href="#"><i class="zmdi zmdi-shopping-cart"></i></a>
                                                </div> -->
                                            </div>
                                            <div class="product_price_rating">
                                                <div class="price_box"> 
                                                     <span class="price-regular"><del>₹<?=$relatedprows['offerprice']?></del></span>
                                       
                                         <?php if(($offerprice<$normalprice)) { ?> 
                                          <span class="price-old">₹<?=$relatedprows['normalprice']?></span>
                                     <?php } ?>
                                    
                                                </div>
                                              
                                           </div>
                                        </figcaption>
                                    </figure>
                                </article>
                    </div>
                <?php } } ?>
                </div>  
            </div>  
        </div>
    </section>
    <!--product area end-->
    
