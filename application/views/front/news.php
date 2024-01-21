
<div class="clearfix"></div>
<div class="main-content">		
	<div class="col-md-9 total-news">


		<div class="technology">
			<div class="tech-main">
				<?php 
				foreach($res as $rows2) {
					?>
					<div class="col-md-4 tech">
						<a href="<?=base_url();?>singlenews/<?=$rows2['id']?>">
							<img src="<?=base_url();?>uploads/<?php echo $rows2['featureimg'];?>" 
							alt="<?php echo $rows2['featureimg'];?>" /></a>
							<a class="power" href="<?=base_url();?>singlenews/<?=$rows2['id']?>"><?php echo $rows2['title'];?></a>
						</div>
					<?php } ?>
					<div class="clearfix"></div>
				</div>
			</div>





			<div class="posts">
				<div class="left-posts">
					<div class="tech-news">
						<div class="main-title-head">
							<?php 
							$catts = $this->db->query("select * from  categories where id='11' ")->result_array();
							foreach($catts as $cattrows)
							{
								?>
								<h3><?php echo $cattrows['title'];?></h3>
								<a href="<?=base_url();?>news/<?php echo $cattrows['id'] ?>">More  +</a>
							<?php } ?>
							<div class="clearfix"></div>
						</div>	
						<div class="tech-news-grids">
							<div class="left-tech-news">
								<?php 
								$cat9 = $this->db->query("select * from  blog where catid='11' order by id desc limit 2 ")->result_array();
								foreach($cat9 as $cat9row)
								{
									?>
									<div class="tech-news-grid span_66">
										<a href="<?=base_url();?>singlenews/<?=$cat9row['id']?>"><?php echo $cat9row['title'];?></a>
										<p>
											<?php
											$postdesc =  $cat9row['description'];
											$pos=strpos($postdesc, ' ', 200);
											echo substr($postdesc,0,$pos ); 
											?>
										</p>
									</div>
								<?php } ?>
							</div>
							<div class="right-tech-news">

								<?php 
								$cat9 = $this->db->query("select * from  blog where catid='11' order by id desc limit 2 ")->result_array();
								foreach($cat9 as $cat9row)
								{
									?>
									<div class="tech-news-grid span_66">
										<a href="<?=base_url();?>singlenews/<?=$cat9row['id']?>"><?php echo $cat9row['title'];?></a>
										<p>
											<?php
											$postdesc =  $cat9row['description'];
											$pos=strpos($postdesc, ' ', 200);
											echo substr($postdesc,0,$pos ); 
											?>
										</p>
									</div>
								<?php } ?>
							</div>
							<div class="clearfix"></div>
						</div>
					</div>

					<div class="latest-articles">
						<div class="main-title-head">
							<h3>What's Hot</h3>
							<div class="clearfix"></div>
						</div>
						<div class="world-news-grids">
							<?php 
							$cat9 = $this->db->query("select * from  blog where catid='13' order by id desc limit 3 ")->result_array();
							foreach($cat9 as $cat9row)
							{
								?>
								<div class="world-news-grid">
									<img src="<?=base_url();?>uploads/<?php echo $cat9row['featureimg'];?>" alt="<?php echo $cat9row['featureimg'];?>" />
									<a href="<?=base_url();?>singlenews/<?=$cat9row['id']?>" class="title"><?php echo $cat9row['title'];?></a>
									<p>
										<?php
										$postdesc =  $cat9row['description'];
										$pos=strpos($postdesc, ' ', 200);
										echo substr($postdesc,0,$pos ); 
										?>
									</p>
									<a href="<?=base_url();?>singlenews/<?=$cat9row['id']?>">Read More</a>
								</div>
							<?php } ?>
							<div class="clearfix"></div>
						</div>
					</div>

					
				</div>
				<div class="right-posts">
					<div class="editorial">
                            <h3>editorial</h3>
                            <?php 
                                $cat9 = $this->db->query("select * from  blog where iseditorpick='1' order by id desc limit 3 ")->result_array();
                                foreach($cat9 as $cat9row)
                                {
                                ?>
                            <div class="editor">
                                <a href="single.html"><img src="<?=base_url();?>uploads/<?php echo $cat9row['featureimg'];?>" alt="<?php echo $cat9row['featureimg'];?>" /></a>
                                <a href="<?=base_url();?>singlenews/<?=$cat9row['id']?>"><?php echo $cat9row['title'];?></a>
                            </div>
                        <?php } ?>
                            
                        </div>
				</div>
				<div class="clearfix"></div>	
			</div>
		</div>					
		<div class="col-md-3 side-bar">
			
			<div class="videos">
                        <?php 
                                $cat9 = $this->db->query("select * from  blog where catid='13' order by id desc limit 6 ")->result_array();
                                foreach($cat9 as $cat9row)
                                {
                                ?>

                        <div class="video-grid">
                            <div class="video">
                                <a href="<?=base_url();?>singlenews/<?=$cat9row['id']?>"><i class="play"></i></a>
                            </div>
                            <div class="video-name">
                                <a href="<?=base_url();?>singlenews/<?=$cat9row['id']?>" ><?php echo $cat9row['title'];?></a>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                    <?php } ?>
                        
                                <?php 
                                $catts = $this->db->query("select * from  categories where id='13' ")->result_array();
                                foreach($catts as $cattrows)
                                {
                                ?>
                                <h3><?php echo $cattrows['title'];?></h3>
                                <a href="<?=base_url();?>news/<?php echo $cattrows['id'] ?>">More  +</a>
                            <?php } ?>
                        <div class="clearfix"></div>
                    </div>




			<div class="clearfix"></div>

                    <div class="" style="margin-top: 25px;">&nbsp;</div>



			<div class="popular">
                        <div class="main-title-head">
                            <h5>popular</h5>
                            <h4> Most    read</h4>
                            <div class="clearfix"></div>
                        </div>      
                        <div class="popular-news">

                            <?php 
                                $cat9 = $this->db->query("select * from  blog where catid='14' order by id desc limit 6 ")->result_array();
                                foreach($cat9 as $cat9row)
                                {
                                ?>

                            <div class="popular-grid">
                                <p><?php echo $cat9row['title'];?>  
                                <?php } ?>
                           
                            <?php 
                                $catts = $this->db->query("select * from  categories where id='14' ")->result_array();
                                foreach($catts as $cattrows)
                                {
                                ?>
                                <a href="<?=base_url();?>news/<?php echo $cattrows['id'] ?>">More  +</a>
                            <?php } ?>

                            </div>

                        
                        </div>
                    </div>
                    
			<div class="subscribe-now">
				<div class="discount">
                            <?php 
                                $catts = $this->db->query("select * from  pgbanner order by id desc limit 3 ")->result_array();
                                foreach($catts as $cattrows)
                                {
                                ?>
                                <a href="<?=$cattrows['bannerurl']?>" target="_blank">
                            <img height="200px" width="200px" src="<?=base_url();?>uploads/<?=$cattrows['iconimgae']?>">
                                </a>
                        <?php } ?>
                        </div>						
					<h3 class="sn">subscribe     now</h3>
				</a>
			</div>
			<div class="clearfix"></div>
		</div>	
		<div class="clearfix"></div>
	</div>

