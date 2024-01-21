<?php
if(!empty($services))
{
  $iconimgae =  $services[0]['iconimgae'];
  $contenthead1 =  $services[0]['contenthead1'];
  $contentdesc1 =  $services[0]['contentdesc1'];
  $contenthead2 =  $services[0]['contenthead2'];
  $contentdesc2 =  $services[0]['contentdesc2'];
  $contenthead3 =  $services[0]['contenthead3'];
  $contentdesc3 =  $services[0]['contentdesc3'];
}else{
  $iconimgae = "";
  $contenthead1 = "";
  $contentdesc1 = "";
  $contenthead2 = "";
  $contentdesc2 = "";
  $contenthead3="";
  $contentdesc3="";
}
 ?>
  <!--Page Title-->
    <?php 
   $pgdatas = $this->db->query("select * from pgbanner where pgid='2' order by id desc limit 1 ")->result_array();
   foreach($pgdatas as $pgdatarow)
   {
      $iconimgae = $pgdatarow['iconimgae'];
      $title = $pgdatarow['title'];
   }
    ?>
  <section class="page-title"> 
    <!-- Background Layers -->
    <div class="background-layers">
       <div class="cws-image-bg" style="background-image:url(<?php echo base_url();?>uploads/<?=$iconimgae?>)">
        <div class="cws-overlay-bg"></div>
      </div>
      <div class="cws-triangle-overlay bottom-left"></div>
      <div class="cws-triangle-overlay bottom-right"></div>
    </div>
    <div class="auto-container">
      <h1><?=$title?></h1>
      <ul class="page-breadcrumb">
        <li><a href="<?php echo base_url()?>">Home</a></li>
        <li><?=$title?></li>
      </ul>
    </div>
  </section>
  <!--End Page Title--> 
  <!-- Services Section Three -->
  <section class="services-section-three"> 
    <!-- Background Layers -->
    <div class="background-layers">
      <div class="cws-image-bg" style="background-image:url(<?php echo base_url()?>assets/front/images/section-01.jpg)">
        <div class="cws-overlay-bg"></div>
      </div>
      <div class="cws-triangle-overlay bottom-right"></div>
    </div>
    <div class="auto-container">
      <div class="sec-title text-center">
        <h2><?=$contenthead1?></h2>
        <div class="text"><?=$contentdesc1?></div>
      </div>
      <div class="services-carousel owl-carousel owl-theme"> 
        <!-- Service Block Four -->
        <?php
    $res = $this->db->query("select * from multiservices")->result_array();
    foreach($res as $row) {
         ?>
        <div class="service-block-four">.
          <a href="<?php echo base_url();?>service/<?=$row['url'];?>">
          <div class="inner-box">
            <div class="icon-box">
              <img src="<?php echo base_url();?>uploads/<?=$row['iconimgae']?>">
            </div>
            <h4><?=$row['servicename']?></h4>
          </div>
        </a>
        </div>
      <?php } ?>
      </div>
    </div>
  </section>
  <!-- Services Section Three --> 
  <!-- Fluid Section One -->
  <section class="fluid-section-one"> 
    <!-- Background Layers -->
    <div class="background-layers">
      <div class="cws-image-bg" style="background-image:url(<?php echo base_url()?>assets/front/images/section-02.jpg)">
        <div class="cws-overlay-bg"></div>
        <div class="cws-triangle-overlay"></div>
      </div>
      <div class="cws-triangle-overlay bottom-left"></div>
    </div>
    <div class="auto-container">
      <div class="row">
        <div class="content-column col-lg-5 col-md-12 col-sm-12 offset-7">
          <div class="inner-column">
            <div class="sec-title">
              <h2><?=$contenthead2?></h2>
              <div class="text">
                  <?=$contentdesc2?>
              </div>
            </div>
            <div class="btn-box"><a href="#" class="theme-btn btn-style-one large">Book Now</a></div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- End Fluid Section One --> 
  <!-- Process Section -->
  <section class="process-section style-two"> 
    <!-- Background Layers -->
    <div class="background-layers">
      <div class="cws-image-bg">
        <div class="cws-overlay-bg"></div>
      </div>
    </div>
    <div class="auto-container">
      <div class="sec-title text-center">
        <h2><?=$contenthead3?></h2>
        <div class="text"><?=$contentdesc3?></div>
      </div>
      <div class="row"> 
        <!-- Process BLock -->
        <div class="process-block col-lg-4 col-md-6 col-sm-12">
          <div class="inner-box active">
            <div class="icon-box"> <span class="process_line"> <span class="process_line_active"></span> <span class="process_line_circle"></span> </span> <span class="icon flaticon-stopwatch"></span> </div>
            <h4>Fully Insured</h4>
            <div class="text">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer convallis</div>
          </div>
        </div>
        <!-- Process BLock -->
        <div class="process-block col-lg-4 col-md-6 col-sm-12">
          <div class="inner-box">
            <div class="icon-box"> <span class="process_line hide-sm"> <span class="process_line_active"></span> <span class="process_line_circle"></span> </span> <span class="icon flaticon-settings-2"></span> </div>
            <h4>Highly-qualified Team</h4>
            <div class="text">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer convallis</div>
          </div>
        </div>
        <!-- Process BLock -->
        <div class="process-block col-lg-4 col-md-6 col-sm-12">
          <div class="inner-box">
            <div class="icon-box"><span class="icon flaticon-calendar-3"></span></div>
            <h4>Exceptional Support</h4>
            <div class="text">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer convallis</div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!--End Process Section -->  
