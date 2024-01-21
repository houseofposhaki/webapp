

<div class="mobi_catr">

  <div class="container">

    <ul class="navv secondary-nav owl-carousel owl-theme brand">
        <?php 
        $maincat = $this->db->query("select * from categories where parentid=0")->result_array();
        foreach($maincat as $maincatrow) {
          ?>
        <li>
          <a href="<?=base_url();?>c/<?php echo $maincatrow['slugurl'];?>/<?=$maincatrow['id']?>">
            <label><img src="<?=base_url();?>uploads/<?=$maincatrow['mobilefeatureimg'];?>"></label>
            <span><?=$maincatrow['title']?></span></a>
          </li>
        <?php } ?>

      </ul>

    </div>

  </div>

  <section>

    <div class="owl-carousel slider-carousel">

      <?php
      $bannerres = $this->db->query("select * from pgbanner ")->result_array();
      foreach($bannerres as $bannerrows){
        ?>

        <div class="item"> <img src="<?=base_url();?>uploads/<?=$bannerrows['iconimgae'];?>" alt=""> </div>

      <?php } ?>

    </div>

  </section>

  <section class="container-fluid" >

    <div class="height30 clr"></div>



    <div class="produvtslider">

      <div class="heading">Shop from Top Categories</div>

    </div>

    <div class="height30 clr"></div>

    <div class="row pad10 wow fadeInDown">

      <?php 
      $popularcats = $this->db->query("select * from categories where ispopular=1 order by id desc")->result_array();
      foreach($popularcats as $popularrow){
        ?>
        <div class="col-sm-3 pad5">
          <a href="<?=base_url();?>products/<?=$popularrow['slugurl']?>/<?=$popularrow['id']?>" class="offerblock img-zoom hight_block">
            
              <img src="<?=base_url();?>uploads/<?=$popularrow['featureimg']?>" alt="" class="img-100" > 

            </a> 
            <div class="contentblock text-center bkhjwer">
               <a href="<?=base_url();?>products/<?=$popularrow['slugurl']?>/<?=$popularrow['id']?>" class="">
              <h4><?php echo $popularrow['title'];?></h4>
              <small>Shop Now</small>
              </a>
            </div>
            
            </div>
            <?php } ?>
          </div>

          <div class="height10 clr"></div>

        </section>

        <!-- banner categpry section start -->

        <section class="container-fluid">
          <div class="produvtslider">
            <div class="heading">New In</div>
          </div>
          <div class="height20 clr"></div>
          <div class="row pad10 wow fadeInDown">
            <?php 
            $popularcats = $this->db->query("select * from categories where newin=1 order by id desc limit 3")->result_array();
            foreach($popularcats as $popularrow){
              ?>
              <div class="col-sm-4 pad5"> 
                <a href="<?=base_url();?>products/<?=$popularrow['slugurl']?>/<?=$popularrow['id']?>" class="imgstyleblock img-zoom"> <span></span> 
                  <img src="<?=base_url();?>uploads/<?php echo $popularrow['featureimg'];?>" alt="" class="img-responsive " > </a>   
                </div>
              <?php } ?>
            </div>
            <div class="height20 clr"></div>
          </section>

          <!-- banner categpry section end -->

          <section class="fixed_img sec-bg1">

            <div class="patteren">

              <div class="container-fluid relative_block wow fadeInDown">

                <div class="height30 clr"></div>

                <div class="produvtslider">

                  <div class="heading" style="color:#FFF;">Shop by categories</div>

                </div>

                <div class="height30 clr"></div>

                <div class="owl-carousel carousel-style listcarousel">

                  <?php 
                  $catresall = $this->db->query("select * from categories where parentid='0' order by id desc")->result_array();
                  foreach($catresall as $catallrows){
                    ?>
                    <div class="item">
                      <a href="<?=base_url();?>products/<?=$catallrows['slugurl']?>/<?=$catallrows['id']?>" class="proname htiklproanm">
                        
                        <img src="<?=base_url();?>uploads/<?=$catallrows['featureimg']?>" alt="" class="img-responsive" ></a>
                        <a href="<?=base_url();?>products/<?=$catallrows['slugurl']?>/<?=$catallrows['id']?>" class="aspoyme asdbgfhjkl"><h4 class="text-center"><?=$catallrows['title'];?></h4></a>
                      </div>
                    <?php } ?>

                  </div>

                  <div class="height30 clr"></div>

                </div>

              </div>

            </section>


            <!-- offers on personal care -->

            <section class="container-fluid">
              <div class="produvtslider">
                <div class="heading">Offers on Household & Personal care</div>
              </div>
              <div class="height20 clr"></div>
              <div class="row pad10 wow fadeInDown">
                <?php 
                $popularcats = $this->db->query("select * from categories where ofr_house_personalcare=1 order by id desc limit 3")->result_array();
                foreach($popularcats as $popularrow){
                  ?>
                  <div class="col-sm-4 pad5"> 
                    <a href="<?=base_url();?>products/<?=$popularrow['slugurl']?>/<?=$popularrow['id']?>" class="imgstyleblock img-zoom hikmenumg"> <span></span> 
                      <img src="<?=base_url();?>uploads/<?php echo $popularrow['featureimg'];?>" alt="" class="img-responsive " > 
                    </a>   
                    <div class="contentblock text-center bkhjwer">
                         <a href="#" class="">
                        <h4><?=$popularrow['title']?></h4>
                        <small>Shop Now</small>
                        </a>
                      </div>
                    </div>
                  <?php } ?>
                </div>
                <div class="height20 clr"></div>
              </section>

              <!-- offers on groceries -->

              <section class="container-fluid">
                <div class="produvtslider">
                  <div class="heading">Offers on Groceries</div>
                </div>
                <div class="height20 clr"></div>
                <div class="row pad10 wow fadeInDown">
                  <?php 
                  $popularcats = $this->db->query("select * from categories where offer_on_groceries=1 order by id desc limit 3")->result_array();
                  foreach($popularcats as $popularrow){
                    ?>
                    <div class="col-sm-4 pad5"> 
                      <a href="<?=base_url();?>products/<?=$popularrow['slugurl']?>/<?=$popularrow['id']?>" class="imgstyleblock img-zoom hikmenumg"> <span></span> 
                        <img src="<?=base_url();?>uploads/<?php echo $popularrow['featureimg'];?>" alt="" class="img-responsive " > </a> 
                        <div class="contentblock text-center bkhjwer">
                           <a href="#" class="">
                          <h4><?=$popularrow['title']?></h4>
                          <small>Shop Now</small>
                          </a>
                        </div>  
                      </div>
                    <?php } ?>
                  </div>
                  <div class="height20 clr"></div>
                </section>

                <!-- special offer zone -->
                <section class="container-fluid">
                  <div class="produvtslider">
                    <div class="heading">Special Offer Zone</div>
                  </div>
                  <div class="height20 clr"></div>
                  <div class="row pad10 wow fadeInDown">
                    <?php 
                    $popularcats = $this->db->query("select * from categories where special_ofr_zone=1 
                      order by id desc limit 3")->result_array();
                    foreach($popularcats as $popularrow){
                      ?>
                      <div class="col-sm-4 pad5"> 
                        <a href="<?=base_url();?>products/<?=$popularrow['slugurl']?>/<?=$popularrow['id']?>" class="imgstyleblock img-zoom hikmenumg"> <span></span> 
                          <img src="<?=base_url();?>uploads/<?php echo $popularrow['featureimg'];?>" alt="" class="img-responsive " > </a>
                          <div class="contentblock text-center bkhjwer">
                             <a href="#" class="">
                            <h4><?=$popularrow['title']?></h4>
                            <small>Shop Now</small>
                            </a>
                          </div>   
                        </div>
                      <?php } ?>
                    </div>
                    <div class="height20 clr"></div>
                  </section>
                  <!-- special offer xone end -->



                  

                  <section class="bg-off">

                    <div class="height20 clr"></div>

                    <div class="container-fluid">

                      <div class="produvtslider">

                        <div class="heading">Popular Brands</div>

                      </div>

                      <div class="height5 clr"></div>

                      <div class="owl-carousel carousel-style brand">
                       <?php 
                       $brandres = $this->db->query("select * from brand 
                        order by id desc ")->result_array();
                       foreach($brandres as $brandrow){
                        ?>
                        <div class="item">
                          <div class="brandblock">
                            <a href="javascript:void(0)"><img src="<?=base_url();?>uploads/<?=$brandrow['iconimgae']?>" alt="" class="img-responsive" ></a> </div>
                          </div>
                        <?php } ?>

                      </div>

                    </div>

                    <div class="height20 clr"></div>

                  </section>

                  <section>

                    <div class="height20 clr"></div>

                    <div class="info-wrapper">

                      <div class="container-fluid">

                        <div class="display-flex">

                          <div class="col-sm-3 infolist">

                            <div class="infolist-block"> <img src="<?=base_url();?>assets/front/images/add/icon-bottom-1_small.png" alt="" class="center-block">

                              <h4>WORLDWIDE DELIVERY</h4>

                              <p>We ship to over 200 countries & regions.</p>

                            </div>

                          </div>

                          <div class="col-sm-3 infolist">

                            <div class="infolist-block"> <img src="<?=base_url();?>assets/front/images/add/icon-bottom-2_small.png" alt="" class="center-block">

                              <h4>SAFE PAYMENT</h4>

                              <p>Pay with the world’s most popular and secure payment methods.</p>

                            </div>

                          </div>

                          <div class="col-sm-3 infolist">

                            <div class="infolist-block"> <img src="<?=base_url();?>assets/front/images/add/icon-bottom-3_small.png" alt="" class="center-block">

                              <h4>SHOP WITH CONFIDENCE</h4>

                              <p>Our Buyer Protection covers your purchase from click to delivery</p>

                            </div>

                          </div>

                          <div class="col-sm-3 infolist">

                            <div class="infolist-block"> <img src="<?=base_url();?>assets/front/images/add/icon-bottom-4_small.png" alt="" class="center-block">

                              <h4>24/7 HELP CENTER</h4>

                              <p>Round-the-clock assistance for a smooth shopping experience.</p>

                            </div>

                          </div>

                        </div>

                      </div>

                    </div>

                    <div class="height20 clr"></div>

                  </section>



