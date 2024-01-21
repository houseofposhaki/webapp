<?php 
if(!empty($res))
{
	$servicename = $res[0]['servicename'];
	$url = $res[0]['url'];
	$featureimg = $res[0]['featureimg'];
	$description = $res[0]['description'];
	$iconimgae = $res[0]['iconimgae'];
}else{
	$metaname = "";
	$url = "";
	$featureimg = "";
	$description = "";
	$iconimgae = "";
	
}

?>
  <!--Page Title-->
  <section class="page-title">
    <div class="cws-image-bg" style="background-image:url(<?php echo base_url();?>uploads/<?php echo $featureimg; ?>)">
      <div class="cws-overlay-bg"></div>
    </div>
    <div class="auto-container">
      <h1><?=$servicename?></h1>
      <ul class="page-breadcrumb">
        <li><a href="index.html">Service</a></li>
        <li><?=$servicename?></li>
      </ul>
    </div>
  </section>
  <!--End Page Title-->  
  <!-- About Section Three -->
  <section class="cms-section"> 
    <!-- Background Layers -->
    <div class="background-layers">
      <div class="cws-image-bg" style="background-image:url(<?php echo base_url();?>assets/front/section-05.png)"></div>
    </div>
    <div class="auto-container">
      <div class="row"> 
        <!-- Content Column -->
        <div class="content-column col-lg-12 col-md-12 col-sm-12">
          <div class="inner-column">
            <!-- <div class="sec-title">
              <h2><?php //echo $servicename;?></h2>
            </div> -->

         <div class="sec-title">
              <img height="250px" width="100%" src="<?php echo base_url();?>uploads/<?=$featureimg?>" >
            </div>
           
            <p><?php echo $description; ?></p>
          </div>          
        </div>        
      </div>
    </div>
  </section>
  <!-- End About Section Three -->     
