
<?php
if(!empty($this->session->userdata['logged_in']['id']))
{
  $userid = $this->session->userdata['logged_in']['id'];
}else{
  $userid = "";
}
?>


<section>



  <div class="other-banner"><img src="<?=base_url();?>assets/front/images/slider/other-banner.jpg" alt="" class="img-responsive" ></div>



</section>



<section class="bg-off">



  <div class="height20 clr"></div>



  <div class="container-fluid">



    <div class="display-flex">



      <div class="col-sm-3 pad5">



        <div class="left-side sidebar_categories">



          <h4>Category</h4>

          <!-- left panel start -->

          <ul>
            <?php 
            $maincat = $this->db->query("select * from categories where parentid=0")->result_array();
            foreach($maincat as $maincatrow) {
            ?>
            <li><a href="<?=base_url();?>c/<?php echo $maincatrow['slugurl'];?>/<?=$maincatrow['id']?>"><?=$maincatrow['title']?></a>
              <ul>
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




          <div class="clr"></div>



       



        </div>



      </div>



      <div class="col-sm-9 pad5">



        <div class="right-side">



          <div class="heading">Fresh Fruits (139)</div>



          <div class="row pad10">







          	<!-- product listing  start -->



          	<?php 



          	$passid =  $this->uri->segment('3'); 



          $pres = $this->db->query("select * from product")->result_array();



          //print_r($pres);die;



          foreach($pres as $blogrows){



            $blogcatid = $blogrows['maincatid'];



            $catidexplode = explode(',',$blogcatid);



            foreach($catidexplode as $drows1)



            {



            	if($passid==$drows1)



            	{



          ?>



            <div class="col-sm-4 padpm5">



              <div class="product-item-info">



                <div class="imgblock"><img src="<?=base_url();?>uploads/<?=$blogrows['featureimg'];?>" alt="" class="img-responsive" ></div>



                <div class="contentblock">



                  <h4><?=$blogrows['title'];?></h4>



                  <div class="clr height10"></div>



                  <p class="text-center">₹ <?=$blogrows['offerprice'];?></p>



                  <div class="clr"></div>



                  <div class="input-group number-spinner"> <span class="input-group-btn">



                    <!-- <button class="btn btn-default" data-dir="dwn">



                    	<span class="glyphicon glyphicon-minus"></span></button>



                    </span>



                    <input type="text" class="form-control form-control-sm text-center" value="1">



                    <span class="input-group-btn">



                    <button class="btn btn-default" data-dir="up"><span class="glyphicon glyphicon-plus"></span></button>



                    </span>  -->



                </div>



                </div>

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



          	<!-- product listing  end -->



            



          </div>



        </div>



      </div>



    </div>



  </div>



  <div class="height20 clr"></div>



</section>







