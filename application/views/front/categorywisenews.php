<?php 
$caturl = $this->uri->segment('2');
$catselectres = $this->db->query("select * from  categories where slugurl='".$caturl."'")->result_array();
$maincatid =  $catselectres[0]['id'];

$subcatres = $this->db->query("select * from  categories where parentid='".$maincatid."' ")->result_array();
foreach($subcatres as $catselectrow){
$catidisnow = $catselectrow['id'];
$catadscriptis = $catselectrow['adscript'];
?>
                    
                    <div class="body-text-area">
                        <div class="news-hl-area">
                            <h3><?php echo $catselectrow['title'];?></h3>
                        </div>
                        <div class="news-left-area">
                            <?php 
                            $postdetails = $this->db->query("select * from  blog where catid='".$catidisnow."' and isactive='0' order by id desc limit 1  ")->result_array();
                            foreach($postdetails as $prow)
                            {
                            ?>
                            <div class="news-dis-area">
                                <div class="news-dis-area-pic">
                                    <a href="<?=base_url();?>news/<?=$prow['postdate']?>/<?=$prow['slugurl']?>">
                                    <img src="<?=base_url();?>uploads/<?php echo $prow['featureimg'];?>" alt="5190" title="5190" />
                                </a>
                                </div>
                                <div class="news-dis-area-text">
                                    <a href="<?=base_url();?>news/<?=$prow['postdate']?>/<?=$prow['slugurl']?>">
                                    <h1><span><?php echo $prow['title'];?></span></h1>
                                </a>
                                </div>
                            </div>
                            <?php } ?>


                             <?php 
                                    $postdetails = $this->db->query("select * from  blog where catid='".$catidisnow."' and isactive='0' 
                                        order by id desc limit 2,3  ")->result_array();
                                    foreach($postdetails as $prow)
                                    {
                                    ?>
                            <div class="news-story-area">
                                <a  href="<?=base_url();?>news/<?=$prow['postdate']?>/<?=$prow['slugurl']?>">
                                    <img src="<?php echo base_url();?>uploads/<?=$prow['featureimg']?>" alt="5190" title="5190" />
                                    <h3><?php echo $prow['title'];?></h3></a>
                                </div>
                            <?php } ?>
                                

                                        <a href="<?php echo base_url();?>more/<?php echo $catselectrow['slugurl']; ?>" class="button01">+ Read More</a>
                                        
                                    </div>


                                    <?php 
                                    $postdetails = $this->db->query("select * from  blog where catid='".$catidisnow."' and isactive='0' 
                                        order by id desc limit 5,2  ")->result_array();
                                    foreach($postdetails as $prow)
                                    {
                                    ?>
                                    <a href="<?=base_url();?>news/<?=$prow['postdate']?>/<?=$prow['slugurl']?>">
                                    <div class="news-right-area">
                                        <div class="news-right-pic">
                                            <img src="<?php echo base_url();?>uploads/<?=$prow['featureimg']?>" alt="5190" title="5190" />
                                        </div>
                                        <div class="news-right-text">
                                            <h2>
                                            	<?php 
                                            $shrttile = $prow['title'];
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
                                                    $newstitle =  $prow['title']; 
                                                    $shrtdesc = $prow['shortdesc'];
                                                    $string = strip_tags($newstitle);
                                                    if (strlen($string) > 80) {
                                                      $stringCut = substr($string, 0, 80);
                                                      $endPoint = strrpos($stringCut, ' ');
                                                      $string = $endPoint? substr($stringCut, 0, $endPoint) : substr($stringCut, 0);
                                                      $string .= '...';

                                                  }
                                                  echo $string;
                                                  ?>
                                            </p>
                                        </div>
                                    </div>
                                    </a>
                                    <?php } ?>
                                   
                                    
                                    <!-- <div class="news-right-area-ad">
                                        <?php // echo $catadscriptis ; ?>
                                    </div> -->
                        </div>

<?php } ?>