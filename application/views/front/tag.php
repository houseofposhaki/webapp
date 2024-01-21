


<div class="blank-body-page-area">
	<div class="body-text-bb-area">
			<div class="news-hl-area">
				<?php
$slug = $this->uri->segment('2');
$allbolgres  = $this->db->query("select * from blogtag where tagslug='".$slug."'")->result_array();
?>
			<h3>Your search result of: <?php echo $allbolgres[0]['tagname']; ?></h3>
			</div>

			
			
			<div class="more-news-total-area">
				<?php
$slug = $this->uri->segment('2');
$allbolgres  = $this->db->query("select * from blogtag where tagslug='".$slug."'")->result_array();
foreach($allbolgres as $allbolgrows)
{
?>

				<?php
				$postres = $this->db->query("select * from blog where id='".$allbolgrows['blogid']."' order by id desc ")->result_array();
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
			<?php } }?>
			
				
				
				<div class="more-news-area">
				Google AD
				</div>
			</div>
	
	</div>
</div>





