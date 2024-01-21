<?php
if(!empty($res))
{
   $blogid = $res[0]['id'];
   $metatitle = $res[0]['metatitle'];
   $metadesc = $res[0]['metadesc'];
	 $featureimg = $res[0]['featureimg'];
	 $title = $res[0]['title'];
	 $slugurl = $res[0]['slugurl'];

  /* encoded url  */
   $blogdetailsurl = base_url()."post/".$slugurl;
   $encodeurl = urlencode($blogdetailsurl);
   /* encoded url end */


	 $shortdesc = $res[0]['shortdesc'];
	 $description = $res[0]['description'];
	 $catid = $res[0]['catid'];
	 $tag = $res[0]['tag'];
	 $tagurl = $res[0]['tagurl'];
	 $postdate = $res[0]['postdate'];
	 $isfeatured = $res[0]['isfeatured'];
	 $catidexplode = explode(',',$catid);

}else{
  $blogid="";
  $metatitle="";
  $metadesc="";
	$featureimg = "";
	$title = "";
	$slugurl = "";
	$shortdesc = "";
	$description = "";
	$catid = "";
	$tag = "";
	$tagurl = "";
	$postdate = "";
	$isfeatured = "";
}

 ?>
<!-- BANNER SECTION -->
<div class="blog-banner-section clearfix">
  <div class="container">
    <div class="row">
      <div class="col-md-6">
        <p class="wow fadeInLeft animated" data-wow-delay=".5s" data-wow-offset="100"><i class="far fa-calendar-alt"></i> POSTED ON <?php echo date('d-m-Y',strtotime($postdate)); ?></p>
        <h2 class="wow fadeInLeft animated" data-wow-delay=".7s" data-wow-offset="100"><?=$title?></h2>
        <hr class="wow fadeInLeft animated" data-wow-delay=".9s" data-wow-offset="100">
        <h6 class="wow fadeInLeft animated" data-wow-delay="1s" data-wow-offset="100">
        	<?php
			// echo category name here //		
        	 ?>
        		
        	</h6>
        <div class="socials">
          <ul class="wow fadeInLeft animated" data-wow-delay="1.5s" data-wow-offset="100">
            <li><a href="" onclick="genericSocialShare('https://www.facebook.com/sharer/sharer.php?u=<?php echo $encodeurl;?>&title=<?=$title;?>')"><i class="fab fa-facebook-f"></i></a></li>
           
            <li><a href="" onclick="genericSocialShare('http://twitter.com/home?status=<?php 
            echo $title; ?>+<?php echo $encodeurl; ?>')"><i class="fab fa-twitter"></i></a></li>

            <li><a href="" onclick="genericSocialShare('http://www.linkedin.com/shareArticle?mini=true&url=<?php echo $encodeurl; ?>&title=<?php echo $title; ?>')" > <i class="fab fa-linkedin-in"></i></a></li>
            
           
          </ul>
          <p class="wow fadeInRight animated" data-wow-delay="1.5s" data-wow-offset="100"><?=$tag?></p>
          <!-- <p class="wow fadeInRight animated" data-wow-delay="1.5s" data-wow-offset="100"><a href="#">3 Comments</a></p> -->
        </div>
      </div>
      <div class="col-md-6 wow fadeInRight animated" data-wow-delay=".5s" data-wow-offset="100"><img src="<?php echo base_url();?>uploads/<?=$featureimg?>" alt=""></div>
    </div>
  </div>
</div>
<!-- /BANNER SECTION --> 
<!-- CONTENT SECTION -->
<div class="content-section clearfix">
  <div class="home-section05 clearfix">
    <div class="container">
         <h6><a href="<?php echo base_url();?>"><i class="fas fa-long-arrow-alt-left"></i> BACK TO ALL STORIES</a></h6>
      <div class="row">
        <div class="col-lg-8 col-md-7 wow fadeInLeft animated" data-wow-delay="1s" data-wow-offset="100">
          <div class="blog-content clearfix">
            <?=$description?>
          </div>
          <div class="comments-section clearfix">
            <h3>Comments</h3>
            <?php
                $blogcmtres= $this->db->query("select * from blogcomment where blogid = '".$blogid."'
                  and blogstatus='1'")->result_array();
                foreach($blogcmtres as $blogcmtrow) {
                 ?>
            <div class="all-comments clearfix">
              <div class="comment-box clearfix"><img src="<?=base_url();?>assets/front/images/comment-img3.jpg" alt="">
                
                <div class="detail"> <a href="#.">Reply</a> <span class="name"><?=$blogcmtrow['name']?></span> <span class="date"><?php echo date('d-m-Y',strtotime($blogcmtrow['date']));?></span>
                  <p><?=$blogcmtrow['message']?></p>
                </div>
              </div>
            </div>
              <?php } ?>

          </div>
          <div class="leave-reply">
            <h3>Leave a Reply</h3>
            <div class="form">
              <form name="" method="post" action="<?php echo base_url();?>Pages/blogcomment">
                <input type="hidden" name="blogid" value="<?=$blogid?>">
              <input type="text" data-delay="300" placeholder="Your full name" required name="name" class="input">
              <input type="text" data-delay="300" placeholder="E-mail Address" name="email" class="input" required>
              <input type="text" data-delay="300" placeholder="Subject" required name="subject" class="input last">
              <textarea data-delay="500" required class="required valid" placeholder="Message" name="message" id="message"></textarea>
              <input name="submit" type="submit" value="submit">
              </form>
            </div>
            <?php if($this->session->flashdata('msg')): ?>
                  <div class="alert alert-success" role="alert" style="margin-top: 25px;">
                    <?php echo $this->session->flashdata('msg'); ?>
                  </div>
                <?php endif; ?>
          </div>
        </div>
        <div class="col-lg-4 col-md-5 wow fadeInRight animated" data-wow-delay="1s" data-wow-offset="100">
          <div class="sidebar-advt clearfix"><img src="<?=base_url();?>assets/front/images/advt.jpg" alt=""></div>
          <div class="editors-pick clearfix">
            <div class="heading clearfix">EDITOR’S PICK</div>

            <?php 
          $blogres = $this->db->query("select * from blog where iseditorpick='1' and isactive='0'")->result_array();
          foreach($blogres as $blogrows){
          ?>
            <div class="content clearfix">
              <h6><?=$blogrows['title']?></h6>
              <p style="text-align:justify">
                <?php 
                $desc = $blogrows['description'];
                 $shjortdesc = substr($desc,0,42);
                 echo $shortdesc.".....";
                ?>
              </p>
              <div class="btn-more"><a href="<?=base_url();?>post/<?=$blogrows['slugurl'];?>">READ MORE</a></div>
            </div>
            <?php } ?>
          </div>
      
        </div>
      </div>
    </div>
  </div>
</div>

<script type="text/javascript">
function genericSocialShare(url){
    window.open(url,'sharer','toolbar=0,status=0,width=648,height=395');
    return true;
}
</script>
<!-- /CONTENT SECTION --> 
