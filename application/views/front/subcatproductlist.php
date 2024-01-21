
<?php 

if(!empty($this->session->userdata['logged_in']['id']))

{

  $userid = $this->session->userdata['logged_in']['id'];

}else{

  $userid = "";

}

$catslug =  $this->uri->segment('2'); 

$catres = $this->db->query("select * from categories where slugurl='$catslug'")->result_array();

if(!empty($catres))

{

  $catname = $catres[0]['title'];
  $catid = $catres[0]['id'];

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
            <li><?=$catname?></li>
          </ul>
        </div>
      </div>
    </div>
  </div>         
</div>
<!--breadcrumbs area end-->

<!--shop  area start-->
<div class="shop_area mt-60 mb-60">
  <div class="container">
    <div class="row">
      <div class="col-lg-9 col-md-12">
        <!--shop wrapper start-->
        <!--shop toolbar start-->
                  <!--   <div class="shop_toolbar_wrapper">
                        <div class=" niceselect_option">
                            <form class="select_option" action="#">
                                <select name="orderby" id="short">

                                    <option selected value="1">Sort by average rating</option>
                                    <option  value="2">Sort by popularity</option>
                                    <option value="3">Sort by newness</option>
                                    <option value="4">Sort by price: low to high</option>
                                    <option value="5">Sort by price: high to low</option>
                                    <option value="6">Product Name: Z</option>
                                </select>
                            </form>
                        </div>
                        <div class="page_amount">
                            <p>Showing 1–9 of 21 results</p>
                        </div>
                      </div> -->
                      <!--shop toolbar end-->
                      <div class="row shop_wrapper">
                       <?php 
                       $pres = $this->db->query("select * from product")->result_array();
                       foreach($pres as $blogrows){
                        $blogcatid = $blogrows['subcatid'];
                        $catidexplode = explode(',',$blogcatid);
                        foreach($catidexplode as $drows1)
                        {
                         if($catid==$drows1)

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

                          <div class="col-lg-4 col-md-4 col-12 ">
                            <article class="single_product">
                              <figure>
                                <div class="product_thumb">
                                  <a class="primary_img" href="<?=base_url()?>p/details/<?=$blogrows['slugurl'];?>/<?=$blogrows['id'];?>"><img src="<?=base_url();?>uploads/<?=$blogrows['featureimg'];?>" alt=""></a>
                                  <div class="action_links">

                                    <ul>

                                    </ul>
                                  </div>
                                </div>
                                <figcaption class="product_content">
                                 <div class="product_content-header">
                                  <h4 class="product_name"><a href="<?=base_url()?>p/details/<?=$blogrows['slugurl'];?>/<?=$blogrows['id'];?>"><?=$producttitle?></a></h4>
                                  <div class="wishlist-btn">
                                    <a href="<?=base_url()?>p/details/<?=$blogrows['slugurl'];?>/<?=$blogrows['id'];?>">
                                    </a>
                                  </div>
                                </div>
                                <div class="product_price_rating">
                                  <div class="price_box"> 
                                   <span class="current_price">₹<?=$offerprice?></span>
                                   <?php if(($offerprice<$normalprice)) { ?> 
                                     <span class="price-old"><del>₹<?=$normalprice?></del></span>
                                   <?php } ?>
                                   
                                 </div>
                                 <div class="product_rating">

                                 </div>
                               </div>
                             </figcaption>
                           </figure>
                         </article>
                       </div>
                     <?php } } } ?>

                     
                   </div>

                    <!-- <div class="shop_toolbar t_bottom">
                        <div class="pagination">
                            <ul>
                                <li class="current">1</li>
                                <li><a href="#">2</a></li>
                                <li><a href="#">3</a></li>
                                <li class="next"><a href="#">next</a></li>
                                <li><a href="#">>></a></li>
                            </ul>
                        </div>
                      </div> -->
                      <!--shop toolbar end-->
                      <!--shop wrapper end-->
                    </div>
        <!--            <div class="col-lg-3 col-md-12">
                     <aside class="sidebar_widget">
                      <div class="widget_inner">
                        <div class="widget_list widget_categories">
                          <h3>CAtegory</h3>
                          <ul>
                            <?php 

                            $maincat = $this->db->query("select * from categories where parentid=0")->result_array();

                            foreach($maincat as $maincatrow) {
                              $parentcatid = $maincatrow['id'];

                              ?>
                              <li class="widget_sub_categories sub_categories1"><a href="javascript:void(0)"><?=$maincatrow['title']?></a>
                                <ul class="widget_dropdown_categories dropdown_categories1">
                                  <?php 

                                  $subcatres = $this->db->query("select * from categories where parentid='$parentcatid'")->result_array();

                                  foreach($subcatres as $subcatrow) {

                                    ?>
                                    <li><a href="<?=base_url();?>sc/<?php echo $subcatrow['slugurl'];?>"><?=$subcatrow['title'];?></a></li>
                                  <?php } ?>
                                </ul>
                              </li>

                            <?php } ?>
                            
                          </ul>
                        </div>
                        
                        <div class="widget_list widget_color">
                          <h3>Shopping Item</h3>
                          <ul>
                           <?php 

                           $subcatres = $this->db->query("select * from categories where is_top='1'")->result_array();

                           foreach($subcatres as $subcatrow) {

                            ?>
                            <li>
                              <a href="<?=base_url();?>sc/<?php echo $subcatrow['slugurl'];?>"> <?=$subcatrow['title'];?></a> 
                            </li>
                          <?php } ?>
                          
                        </ul>
                      </div>
                      
                    </div>
                  </aside>
                </div>
 -->








                
              </div>
            </div>
          </div>
          <!--shop  area end-->
          
