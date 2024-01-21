<?php 
if(!empty($res))
{
	$blogid = $res[0]['id'];
	$catidthisblog = $res[0]['catid'];
	$metatitle = $res[0]['metatitle'];
	$metadesc = $res[0]['metadesc'];
	$iconlogo = $res[0]['iconlogo'];
	$featureimg = $res[0]['featureimg'];
	$title = $res[0]['title'];
	$description = $res[0]['description'];
	$postdate = $res[0]['postdate'];
	$posttime = $res[0]['posttime'];
	$shortdesc = $res[0]['shortdesc'];
	$slugurlis = $res[0]['slugurl'];
	$ts = $res[0]['ts'];
	$tag = $res[0]['tag'];
	$userid = $res[0]['userid'];

	// blog tags //
	$blogtagres = $this->db->query("select * from blogtag where blogid='".$res[0]['id']."'")->result_array();
	if(!empty($blogtagres))
	{
		
		$tag1 = "<a href='".base_url()."news-topic/".$blogtagres[0]['tagslug'] ."'>". "#".$blogtagres[0]['tagname']."</a>";
		$tag2 = "<a href='".base_url()."news-topic/".$blogtagres[1]['tagslug'] ."'>". "#".$blogtagres[1]['tagname']."</a>";
		$tag3 = "<a href='".base_url()."news-topic/".$blogtagres[2]['tagslug'] ."'>". "#".$blogtagres[2]['tagname']."</a>";
		$tag4 = "<a href='".base_url()."news-topic/".$blogtagres[3]['tagslug'] ."'>". "#".$blogtagres[3]['tagname']."</a>";
		$tag5 = "<a href='".base_url()."news-topic/".$blogtagres[4]['tagslug'] ."'>". "#".$blogtagres[4]['tagname']."</a>";
		$tag6 = "<a href='".base_url()."news-topic/".$blogtagres[5]['tagslug'] ."'>". "#".$blogtagres[5]['tagname']."</a>";

	}else{
		
		$tag1 = "";
		$tag2 = "";
		$tag3 = "";
		$tag4 = "";
		$tag5 = "";
		$tag6 = "";

	}


}else{
	$blogid = "";
	$metatitle = "";
	$metadesc = "";
	$iconlogo = "";
	$featureimg = "";
	$title = "";
	$description = "";
	$postdate = "";
	$shortdesc="";
	$slugurlis="";
	$ts="";
	$tag="";
	$userid="";
	$posttime = "";

}

?>



<div class="main-post-area">
	<div class="post-text-left-area">
		<div class="post-text-con-area">
			<h1><?php echo $title;?></h1>
			<div class="post-ad-area">
				<!-- Google Ad -->
			</div>
			<img src="<?=base_url();?>uploads/<?php echo $featureimg;?>" alt="<?php echo $featureimg;?>" title="<?php echo $featureimg;?>" />
			<h2>By: 
				<?php
				$userdetails  = $this->db->query("select * from user where id='$userid'")->result_array();
				echo $userdetails[0]['fullname'];
				 ?>
			</h2>
			<h3>Last Update: <?php echo $postdate;?>&nbsp;<?php echo $posttime; ?> IST</h3>
			<ul class="ico-fa">
				<li><span>Follow Us</span></li>
				<li><a href="https://www.facebook.com/theindianvoicenews" target="_blank"><i class="fa fa-facebook-square" aria-hidden="true"></i></a></li>
				<li><a href="https://twitter.com/theindianvoice2" target="_blank"><i class="fa fa-twitter-square" aria-hidden="true"></i></a></li>
				<li><a href="https://www.instagram.com/theindianvoicenews/" target="_blank"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
			</ul>
			
			<p><?php echo $shortdesc; ?></p>

			<div class="post-ad-area">
				<!-- Google Ad -->
			</div>
			<?php echo $description; ?>
		</div>
		
		<div class="follow-us-area">
			<!-- <h4>Share</h4> -->
				<span>
											

									<!-- ShareThis BEGIN -->
									<div class="sharethis-inline-share-buttons"></div>
									<!-- ShareThis END -->

									</span>
		</div>
		
		<div class="trending-topics">
			<ul>
				<li>Trending Tag:</li>
				<p><?php echo  $tag1." ".$tag2." ".$tag3." ".$tag4." ".$tag5." ".$tag6  ; ?></p>
			</ul>
		</div>
	</div>

	<div class="post-right-area">
		<div class="post-right-ad-area">
			<!-- Google AD -->
		</div>

		<div class="right-rel-post-area">
			<h5>Most Popular News</h5>


			<?php 
			$today = date('Y-m-d');
			$prv7day =  date('Y-m-d', strtotime('-7 days'));

			$blgres = $this->db->query("select * from blog where postdate between '".$prv7day."'
				and '".$today."' order by readcount desc limit 10")->result_array();
			$i = 1;
			foreach($blgres as $prow) {
				?>
				<div class="rel-story-area">
					<div class="rel-story-img-a">
						<a href="<?=base_url();?>news/<?=$prow['postdate']?>/<?=$prow['slugurl']?>">
							<img src="<?=base_url();?>uploads/<?php echo $prow['featureimg'];?>" alt="<?php echo $prow['featureimg'];?>" title="<?php echo $prow['featureimg'];?>" /></a>
					</div>
					<div class="rel-story-text">
						<h3><a href="<?=base_url();?>news/<?=$prow['postdate']?>/<?=$prow['slugurl']?>"><?=$prow['title']?></a></h3>
					</div>
				</div>
			<?php } ?>

		</div>
	</div>
</div>

<div class="related-area-main">
	<div class="related-area-a">
		<h1>Related News</h1>
		
		<?php

		//cat details //
		$catdetailsres = $this->db->query("select * from categories where id ='".$catidthisblog."'")->result_array();
		$catslugurl = $catdetailsres[0]['slugurl'];



		$relaatenres = $this->db->query("select * from blog where id!='".$blogid."' and  catid='".$catidthisblog."' order by id desc limit 4 ")->result_array();
		foreach($relaatenres as $relaatenrows) {
		 ?>
		<div id="re-non-01" class="related-news-area">
			<a href="<?=base_url();?>news/<?=$relaatenrows['postdate']?>/<?=$relaatenrows['slugurl']?>">
			<img  src="<?=base_url();?>uploads/<?php echo $relaatenrows['featureimg'];?>" alt="5190" title="5190" />
			</a>
			<div class="related-text-area">
				<a href="<?=base_url();?>news/<?=$relaatenrows['postdate']?>/<?=$relaatenrows['slugurl']?>">
				<h2>
					
					<?php 
                    $shrttile = $relaatenrows['title'];
                            $string = strip_tags($shrttile);
                            if (strlen($string) > 42) {
                              $stringCut = substr($string, 0, 42);
                              $endPoint = strrpos($stringCut, ' ');
                              $string = $endPoint? substr($stringCut, 0, $endPoint) : substr($stringCut, 0);
                              $string .= '...';

                  }
                  echo $string;
                  ?>
				</h2>
				<p>
					<?php 
                                            $shrttile = $relaatenrows['shortdesc'];
                                                    $string = strip_tags($shrttile);
                                                    if (strlen($string) > 80) {
                                                      $stringCut = substr($string, 0, 80);
                                                      $endPoint = strrpos($stringCut, ' ');
                                                      $string = $endPoint? substr($stringCut, 0, $endPoint) : substr($stringCut, 0);
                                                      $string .= '...';

                                                  }
                                                  echo $string;
                                                  ?>
				</p>
				</a>
			</div>
		</div>
	<?php } ?>

		<div class="but-area">
			<a href="<?php echo base_url();?>more/<?php echo $catslugurl; ?>" class="button02">+ View More</a>
		</div>
	</div>
</div>

<div class="top-ad-bar">
	<div class="google-ad">
		<!-- Google AD -->
	</div>

</div> 



