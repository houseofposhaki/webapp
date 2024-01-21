<?php
if(isset($res))
{
  $contentheadfirst =  $res[0]['contentheadfirst'];
  $contentfirst =  $res[0]['contentfirst'];
  $contentheadsecond =  $res[0]['contentheadsecond'];
  $contentsecond =  $res[0]['contentsecond'];
}else{
  $contentheadfirst = "";
  $contentfirst = "";
  $contentheadsecond = "";
  $contentsecond = "";
}
 ?>

  <!--Page Title-->
    <?php 
   $pgdatas = $this->db->query("select * from pgbanner where pgid='4' order by id desc limit 1 ")->result_array();
   foreach($pgdatas as $pgdatarow)
   {
      $iconimgae = $pgdatarow['iconimgae'];
      $title = $pgdatarow['title'];
   }
    ?>

  <section class="page-title">
      <div class="cws-image-bg" style="background-image:url(<?php echo base_url();?>uploads/<?=$iconimgae?>)">
      <div class="cws-overlay-bg"></div>
    </div>
    <div class="auto-container">
      <h1><?=$title?></h1>
      <ul class="page-breadcrumb">
        <li><a href="<?php echo base_url(); ?>">Home</a></li>
        <li><?=$title?></li>
      </ul>
    </div>
  </section>
  <!--End Page Title-->  
  <!-- About Section Three -->
  <section class="about-section-three"> 
    <!-- Background Layers -->
    <div class="background-layers">
      <div class="cws-image-bg" style="background-image:url(<?php echo base_url();?>assets/front/images/section-05.png)"></div>
      <div class="cws-triangle-overlay bottom-left"></div>
      <div class="cws-triangle-overlay bottom-right"></div>
    </div>
    <div class="auto-container">
      <div class="row"> 
        <!-- Content Column -->
        <div class="content-column col-lg-6 col-md-12 col-sm-12 text-center"><img src="<?php echo base_url();?>assets/front/images/mascot.png" alt=""></div>
        <div class="content-column col-lg-6 col-md-12 col-sm-12">
          <div class="inner-column">
            <div class="sec-title">
              <h2><?=$contentheadfirst;?></h2>
            </div>
           <?=$contentfirst;?>
          </div>
          
        </div>
        
      </div>
    </div>
  </section>
  <!-- End About Section Three -->   
  <!-- Our Misiion -->
  <section class="our-mission">
    <div class="auto-container">
      <div class="sec-title text-center">
        <h2><?=$contentheadsecond;?></h2>
        <div class="text"><?=$contentsecond;?></div>
      </div>
      <div class="row"> 
        

        <?php
        $missiondata = $this->db->query("select * from ourmission")->result_array();
        foreach ($missiondata as $msdata) {
         ?>
        <div class="mission-block col-lg-3 col-md-6 col-sm-12">
          <div class="inner-box">
            <img src="<?php echo base_url();?>uploads/<?php echo $msdata['iconimgae'];?>">
            <h4><?php echo $msdata['missiontitle']; ?></h4>
            <p><?php echo $msdata['missiondesc']; ?></p>
          </div>
        </div>    
        <?php } ?>    
       
      </div>
    </div>
  </section>
  <!-- End Our Misiion -->    
  <!--Clients Section-->
  <section class="clients-section">
    <div class="auto-container"> 
      <!--Sponsors carousel-->
      <ul class="sponsors-carousel owl-carousel owl-theme">

         <?php
        $partners = $this->db->query("select * from partner")->result_array();
        foreach ($partners as $partner) {
         ?>
        <li class="slide-item">
          <figure class="image-box">
            <a href="#">
            <img src="<?php echo base_url();?>uploads/<?=$partner['iconimgae']?>" alt=""></a>
          </figure>
        </li>
      <?php } ?>
      </ul>
    </div>
  </section>
  <!--End Clients Section-->  
