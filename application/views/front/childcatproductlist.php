
<?php 
if(!empty($this->session->userdata['logged_in']['id']))
{
  $userid = $this->session->userdata['logged_in']['id'];
}else{
  $userid = "";
}
$childcatid =  $this->uri->segment('3'); 
$childres = $this->db->query("select * from childcat where id='$childcatid'")->result_array();
if(!empty($childres))
{
  $childcatname = $childres[0]['childcatname'];
}
?>

<section>
  <div class="other-banner"><img src="<?=base_url()?>assets/front/images/slider/other-banner.jpg" alt="" class="img-responsive" ></div>
</section>
<section class="bg-off">
  <div class="height20 clr"></div>
  <div class="container-fluid">
    <div class="display-flex">
      <div class="col-sm-3 pad5 sidebar_categories">
        <div class="left-side">
          <h4 >Category</h4>
          <!-- left panel start -->
          <ul>
            <?php 
            $maincat = $this->db->query("select * from categories where parentid=0")->result_array();
            foreach($maincat as $maincatrow) {
              ?>
              <li><span class="site-nav"><a href="#"><?=$maincatrow['title']?></a></span>
                <ul class="sublinks">
                  <?php 
                  $subcatres = $this->db->query("select * from categories where parentid='".$maincatrow['id']."'")->result_array();
                  foreach($subcatres as $subcatrow) {
                    ?>
                    <li><a href="<?=base_url();?>sc/<?php echo $subcatrow['slugurl'];?>/<?=$subcatrow['id']?>"><?php echo $subcatrow['title']; ?></a></li>  
                  <?php } ?>  
                </ul>
              </li>
            <?php } ?>
          </ul>


          <!-- left panel end -->
          
        </div>
      </div>
      <div class="col-sm-9 pad5">
        <div class="right-side">
          <div class="heading"><?php echo $childcatname;?></div>
          <div class="row pad10">

            <!-- product list start -->

            <?php 
           // $passid =  $this->uri->segment('3'); 
            $pres = $this->db->query("select * from product")->result_array();
          //print_r($pres);die;
            foreach($pres as $blogrows){
              $blogcatid = $blogrows['childcatid'];
              $catidexplode = explode(',',$blogcatid);
              foreach($catidexplode as $drows1)
              {
               if($childcatid==$drows1)
               {

                ?>
                <div class="col-sm-4 padpm5">
                  <div class="product-item-info">
                   <a href="<?=base_url()?>p/details/<?=$blogrows['slugurl'];?>/<?=$blogrows['id'];?>">
                    <div class="imgblock"><img src="<?=base_url();?>uploads/<?=$blogrows['featureimg'];?>" alt="" class="img-responsive" ></div>
                    <div class="contentblock">
                      <h4><?=$blogrows['title'];?></h4>
                      <div class="clr height10"></div>
                      <p class="text-center">₹ <?=$blogrows['offerprice'];?></p>
                      <div class="clr"></div>
                      <div class="input-group number-spinner"> <span class="input-group-btn"></span>
                      </div>
                    </div>
                  </a>

                  <?php 

                  $chkcartres = $this->db->query("select * from cart where userid = '".$userid."' and productid='".$blogrows['id']."' and status='0' ")->result_array();

                  if(empty($chkcartres[0]['id'])) {

                    ?>

                    <form action="<?=base_url();?>Cart/addtocart" method="post">
                      <input type="hidden" name="currenturl" value="<?php echo  $actual_link = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]"; ?>">

                      <input type="hidden" name="productid" value="<?php echo $blogrows['id'];?>">

                      <input type="hidden" name="productprice" value="<?=$blogrows['offerprice'];?>">
                      <button class="addtocart">ADD TO CART</button>
                    </form>
                  <?php }else { ?>
                    <button type="button" class="btn btn-success">ITEM ADDED</button>
                  <?php } ?>
                </div>
              </div>
            <?php } } } ?>

            <!-- product list end -->

          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="height20 clr"></div>
</section>


