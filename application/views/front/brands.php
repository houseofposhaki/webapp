

  <section class="page-title">
      <div class="cws-image-bg" style="background-image:url(<?php echo base_url();?>assets/front/images/banner-new.jpg)">
      <div class="cws-overlay-bg"></div>
    </div>
    <div class="auto-container">
      <h1>Brands</h1>
      <ul class="page-breadcrumb">
        <li><a href="<?php echo base_url(); ?>">Home</a></li>
        <li>Brands</li>
      </ul>
    </div>
  </section>
  
  <!--Clients Section-->
  <section class="brands-section">
    <div class="auto-container"> 
      <!--Sponsors carousel-->
        <div class="row">
         <?php
        $partners = $this->db->query("select * from partner")->result_array();
        foreach ($partners as $partner) {
         ?>
          <div class="col-md-2"><figure class="image-box">
            <a href="#">
            <img src="<?php echo base_url();?>uploads/<?=$partner['iconimgae']?>" alt=""></a>
          </figure></div>
      <?php } ?>
        </div>
    </div>
  </section>
  <!--End Clients Section-->  
