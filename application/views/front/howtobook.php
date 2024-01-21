<?php
if(isset($howtobkres))
{
  $heading =  $howtobkres[0]['heading'];
  $description =  $howtobkres[0]['description'];
}else{
  $heading = "";
  $description = "";
}
 ?>
  <!--Page Title-->
   <?php 
   $pgdatas = $this->db->query("select * from pgbanner where pgid='3' order by id desc limit 1 ")->result_array();
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
    </div>
    <div class="auto-container">
      <h1><?=$title?></h1>
      <ul class="page-breadcrumb">
        <li><a href="<?php echo base_url();?>">Home</a></li>
        <li><?=$title?></li>
      </ul>
    </div>
  </section>
  <!--End Page Title--> 
  <!-- About Process -->
  <section class="about-process">
    <div class="auto-container">
      <div class="sec-title">
        <h2><?=$heading?></h2>
        <div class="text"><?=$description?></div>
      </div>
      <div class="step-btn"> <a class="scroll-to-target" data-target="#step-1"> <span class="step-text">EXPLORE PROCESS</span> <span class="step-arrow"><span class="fa fa-arrow-down"></span></span> </a> </div>
    </div>
  </section>
  <!-- End About Process --> 
  <!-- Step Section -->
  <?php
        $res = $this->db->query("select * from bookingstep where stepno='1'")->result_array();
        foreach ($res as $row) {
        ?>
  <section class="step-section" id="step-1"> 
    <!-- Background Layers -->
    <div class="background-layers">
      <div class="cws-triangle-overlay top-left"></div>
      <div class="cws-image-bg" style="background-image:url(<?php echo base_url()?>uploads/<?=$row['iconimgae']?>)">
        <div class="cws-overlay-bg"></div>
        <div class="cws-triangle-overlay"></div>
      </div>
      <div class="cws-triangle-overlay bottom-left"></div>
      <div class="cws-triangle-overlay bottom-right"></div>
    </div>
    <div class="auto-container">
      
      <div class="row">
        <div class="content-column col-lg-5 col-md-12 col-sm-12 offset-7">
          <div class="inner-column">
            <h2><?=$row['steptitle'];?></h2>
            <?=$row['stepdesc']?>
            <a href="#" class="theme-btn btn-style-one large">BOOK A CONSULTATION</a> </div>
        </div>
      </div>
    </div>
    <div class="step-btn"> <a class="scroll-to-target" data-target="#step-2"> <span class="step-background"></span> <span class="step-text">STEP</span> <span class="step-count">1</span> <span class="step-arrow"><span class="fa fa-arrow-down"></span></span> </a> </div>
  </section>
  <?php } ?>
  <!-- End Step Section --> 
  <?php
        $res = $this->db->query("select * from bookingstep where stepno='2'")->result_array();
        foreach ($res as $row) {
        ?>
  <!-- Step Section -->
  <section class="step-section-two" id="step-2">
    <div class="auto-container">
      <div class="row">
        <div class="content-column col-lg-5 col-md-6 col-sm-12">
          <div class="inner-column">
            <h2><?=$row['steptitle']?></h2>
            <?=$row['stepdesc']?>
            <a href="#" class="theme-btn btn-style-one large">How it works</a> </div>
        </div>
        <div class="image-column col-lg-6 col-md-6 col-sm-12 offset-1">
          <div class="inner-column">
            <figure class="image"><img src="<?php echo base_url()?>uploads/<?=$row['iconimgae']?>" alt=""></figure>
          </div>
        </div>
      </div>
    </div>
    <div class="step-btn light"> <a class="scroll-to-target" data-target="#step-3"> <span class="step-background"></span> <span class="step-text">STEP</span> <span class="step-count">2</span> <span class="step-arrow"><span class="fa fa-arrow-down"></span></span> </a> </div>
  </section>
<?php } ?>
  <!-- End Step Section --> 
  <!-- Step Section -->
  <?php
        $res = $this->db->query("select * from bookingstep where stepno='3'")->result_array();
        foreach ($res as $row) {
        ?>
  <section class="step-section" id="step-3"> 
    <!-- Background Layers -->
    <div class="background-layers">
      <div class="cws-triangle-overlay top-left"></div>
      <div class="cws-image-bg" style="background-image:url(<?php echo base_url()?>uploads/<?=$row['iconimgae']?>)">
        <div class="cws-overlay-bg"></div>
        <div class="cws-triangle-overlay"></div>
      </div>
      <div class="cws-triangle-overlay bottom-left"></div>
      <div class="cws-triangle-overlay bottom-right"></div>
    </div>
    <div class="auto-container">
      <div class="row">
        <div class="content-column col-lg-5 col-md-12 col-sm-12 offset-7">
          <div class="inner-column">
            <h2><?=$row['steptitle']?></h2>
            <?=$row['stepdesc']?>
            <a href="#" class="theme-btn btn-style-one large">BOOK A CONSULTATION</a> </div>
        </div>
      </div>
    </div>
    <div class="step-btn"> <a class="scroll-to-target" data-target="#step-4"> <span class="step-background"></span> <span class="step-text">STEP</span> <span class="step-count">3</span> <span class="step-arrow"><span class="fa fa-arrow-down"></span></span> </a> </div>
  </section>
<?php } ?>
  <!-- End Step Section --> 
  <?php
        $res = $this->db->query("select * from bookingstep where stepno='4'")->result_array();
        foreach ($res as $row) {
        ?>
  <!-- Step Section -->
  <section class="step-section-two" id="step-4">
    <div class="auto-container">
      <div class="row">
        <div class="content-column col-lg-5 col-md-6 col-sm-12">
          <div class="inner-column">
            <h2><?=$row['steptitle']?></h2>
            <?=$row['stepdesc']?>
            <a href="#" class="theme-btn btn-style-one large">How it works</a> </div>
        </div>
        <div class="image-column col-lg-6 col-md-6 col-sm-12 offset-1">
          <div class="inner-column">
            <figure class="image"><img src="<?php echo base_url()?>uploads/<?=$row['iconimgae']?>" alt=""></figure>
          </div>
        </div>
      </div>
    </div>
    <div class="step-btn light"> <a class="scroll-to-target" data-target="#step-5"> <span class="step-background"></span> <span class="step-text">STEP</span> <span class="step-count">4</span> <span class="step-arrow"><span class="fa fa-arrow-down"></span></span> </a> </div>
  </section>
<?php } ?>
  <!-- End Step Section --> 
  <?php
        $res = $this->db->query("select * from bookingstep where stepno='5'")->result_array();
        foreach ($res as $row) {
        ?>
  <!-- Step Section -->
  <section class="step-section" id="step-5"> 
    <!-- Background Layers -->
    <div class="background-layers">
      <div class="cws-triangle-overlay top-left"></div>
      <div class="cws-image-bg" style="background-image:url(<?php echo base_url()?>uploads/<?=$row['iconimgae']?>)">
        <div class="cws-overlay-bg"></div>
        <div class="cws-triangle-overlay"></div>
      </div>
      <div class="cws-triangle-overlay bottom-left"></div>
      <div class="cws-triangle-overlay bottom-right"></div>
    </div>
    <div class="auto-container">
      <div class="row">
        <div class="content-column col-lg-5 col-md-12 col-sm-12 offset-7">
          <div class="inner-column">
            <h2><?=$row['steptitle']?></h2>
            <?=$row['stepdesc']?>
            <a href="#" class="theme-btn btn-style-one large">BOOK A CONSULTATION</a> </div>
        </div>
      </div>
    </div>
    <div class="step-btn"> <a href="#"> <span class="step-background"></span> <span class="step-text">STEP</span> <span class="step-count">5</span> <span class="step-arrow"><span class="fa fa-arrow-down"></span></span> </a> </div>
  </section>
<?php } ?>
  <!-- End Step Section -->
