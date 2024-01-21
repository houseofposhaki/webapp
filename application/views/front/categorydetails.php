<?php
if(!empty($res))
{
	 $categoryid = $res[0]['id'];
	 $title = $res[0]['title'];
	 $description = $res[0]['description'];
	 $slugurl = $res[0]['slugurl'];


}else{
	$categoryid="";
	$title = "";
	$description = "";
	$slugurl = "";

}

 ?>  
  <!-- BANNER SECTION -->
<div class="blog-banner-section clearfix">
  <div class="container">
    <div class="row">
      <div class="col-md-6">
        
        <h2 class="wow fadeInLeft animated" data-wow-delay=".7s" data-wow-offset="100"><?=$title?></h2>
        <hr class="wow fadeInLeft animated" data-wow-delay=".9s" data-wow-offset="100">
        <h6 class="wow fadeInLeft animated" data-wow-delay="1s" data-wow-offset="100">
        	<?php
			echo 	$title;	
        	 ?>
        		
        	</h6>
       
      </div>
      <div class="col-md-6 wow fadeInRight animated" data-wow-delay=".5s" data-wow-offset="100"><img src="" alt=""></div>
    </div>
  </div>
</div>
<!-- /BANNER SECTION --> 


<div class="home-section05 clearfix">

    <div class="container">

      <div class="row">

        <div class="col-lg-8 col-md-7 wow fadeInLeft animated" data-wow-delay="1s" data-wow-offset="100">
			
            
          <div class="blogbox">

           <?php 

          $blogres = $this->db->query("select * from blog where isactive='0' ")->result_array();

          foreach($blogres as $blogrows){
            $blogcatid = $blogrows['catid'];
           

            $catidexplode = explode(',',$blogcatid);
            foreach($catidexplode as $drows1)
            {
            	if($categoryid==$drows1)
            	{

          ?>

            <div class="blog-content  clearfix">

              <div class="row">

                <div class="col-md-3">

                  <figure><a href="<?=base_url();?>post/<?=$blogrows['slugurl'];?>"><img src="<?php echo base_url();?>uploads/<?=$blogrows['featureimg']?>" alt=""></a></figure>

                  <div class="socials">

                    <ul>

                      <li>
                        <?php
                        $blogdetailsurl = base_url()."post/".$blogrows['slugurl'];
                        $encodeurl = urlencode($blogdetailsurl);
                         ?>
                          <a onclick="genericSocialShare('https://www.facebook.com/sharer/sharer.php?u=<?php echo $encodeurl;?>&title=<?=$blogrows['title'];?>')" href="">
                        <i class="fab fa-facebook-f"></i>
                        </a>
                      </li>

                      <li>
                        <a onclick="genericSocialShare('http://twitter.com/home?status=<?php echo $blogrows['title']; ?>+<?php echo $encodeurl; ?>')" href="">
                          <i class="fab fa-twitter"></i></a></li>

                      <li>
                        <a onclick="genericSocialShare('http://www.linkedin.com/shareArticle?mini=true&url=<?php echo $encodeurl; ?>&title=<?php echo $blogrows['title']; ?>')" href="">
                          <i class="fab fa-linkedin-in"></i>
                        </a>
                      </li>

                    </ul>

                    

                  </div>

                </div>

                <div class="col-md-9">

                  <h4><a href="<?=base_url();?>post/<?=$blogrows['slugurl'];?>"><?=$blogrows['title'];?></a></h4>

                  <p><i class="far fa-calendar-alt"></i> POSTED ON <?php echo date('d-m-Y',strtotime($blogrows['postdate'])) ?></p>

                  <p><?=$blogrows['shortdesc']?></p>

                </div>

              </div>

            </div>  

           <?php } } } ?>           

          </div>

          <nav aria-label="Page navigation">

            <ul class="pagination pagination-md justify-content-center">

              <li class="page-item active"><a class="page-link" href="#">1</a></li>

              <li class="page-item"><a class="page-link" href="#">2</a></li>

              <li class="page-item"><a class="page-link" href="#">3</a></li>

            </ul>

          </nav>

        </div>

         <div class="col-lg-4 col-md-5 wow fadeInRight animated" data-wow-delay="1s" data-wow-offset="100">

          <div class="job-of-the-week clearfix">

            <div class="heading clearfix">JOBS OF THE WEEK</div>

            <article>
                <h5><a href="#" target="_blank">JOb test</a></h5>
                <h6><!-- SURGERY      |  --> </h6>
              </article>
            </div>

          </div>

          <div class="editors-pick clearfix">

            <div class="heading clearfix">EDITOR’S PICK</div>





            <?php

              $editorres = $this->db->query("select * from blog where iseditorpick='1' and isactive='0'")->result_array();

              foreach($editorres as $editorrows) {

               ?>

            <div class="content clearfix">

              <h6><?=$editorrows['title'];?></h6>

              <p><?=$editorrows['shortdesc']?></p>

              <div class="btn-more"><a href="<?=base_url();?>post/<?=$editorrows['slugurl'];?>">

              READ MORE</a></div>

            </div>

          <?php } ?>

          

          </div>

          <div class="sidebar-advt clearfix"><img src="<?=base_url();?>assets/front/images/advt.jpg" alt=""></div>

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