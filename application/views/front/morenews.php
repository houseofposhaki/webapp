<?php
 $slug = $this->uri->segment('2');
$catres  = $this->db->query("select * from categories where slugurl='".$slug."'")->result_array();
$maincatid =  $catres[0]['id'];
?>


<div class="blank-body-page-area">
	<div class="body-text-bb-area">
			<div class="news-hl-area">
			<h3><?php echo $catres[0]['title']; ?></h3>
			</div>
			
			<div class="more-news-total-area">

				<?php
				$postres = $this->db->query("select * from blog where catid='".$maincatid."' order by id desc ")->result_array();
				foreach($postres as $postrows) {
				 ?>
				<div class="more-news-area">
				<a href="<?=base_url();?>news/<?=$postrows['postdate']?>/<?=$postrows['slugurl']?>">
					<img src="<?php echo base_url();?>uploads/<?=$postrows['featureimg']?>" />
				<h2> 
					 <?php 
                                    $shrtdesc = $postrows['title'];
                                            $string = strip_tags($shrtdesc);
                                            if (strlen($string) > 40) {
                                              $stringCut = substr($string, 0, 40);
                                              $endPoint = strrpos($stringCut, ' ');
                                              $string = $endPoint? substr($stringCut, 0, $endPoint) : substr($stringCut, 0);
                                              $string .= '...';

                                  }
                                  echo $string;
                                  ?>
                                    
				</h2>
				</a>
				</div>
			<?php } ?>
			
				
				
				<div class="more-news-area">
				Google AD
				</div>
			</div>
	
	</div>
</div>



