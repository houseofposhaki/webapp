
<div class="content-wrapper mt-3">
    <section class="content">
      	<div class="container-fluid">
       		<form name="" action="submitquery" method="post">
        		<div class="row">
         			<div class="col-12">
          				<div class="card card-primary">
           					<div class="card-header">
                				<h3 class="card-title">Tour Details</h3>
            				</div>
            				<div class="card-body">
            					<?php foreach($res as $row) { ?>
            					
            					
								<?php //echo '<pre>'.print_r($row, true); ?>	
								<div class="row">
									<div class="col-12">
										<label><strong>Package Name:</strong> </label> <?php echo $row['pkgname']; ?>
									</div>
								</div>

								<div class="row">
									<div class="col-12">
										<label><strong>Package Duration:</strong> </label> 
										<?php echo $row['pkgday'].' Days & '.$row['pkgnight'].' Nights'; ?>
									</div>
								</div>

								<div class="row">
									<div class="col-12">
										<label><strong>Departure Date:</strong> </label> 
										<?php echo $row['departuredate']; ?>
									</div>
								</div>
<!-- 
								<div class="row">
									<div class="col-12">
										<label><strong>Package Description:</strong> </label> 
										<?php //echo $row['pkgdesc']; ?>
									</div>
								</div>

								<div class="row">
									<div class="col-12">
										<label><strong>Tentative Hotel Details:</strong> </label> 
										<?php //echo $row['hoteldetails']; ?>
									</div>
								</div>

								<div class="row">
									<div class="col-12">
										<label><strong>Inclusion & Exclusion:</strong> </label> 
										<?php //echo $row['inclexclusion']; ?>
									</div>
								</div> 

								<div class="row">
									<div class="col-12">
										<label><strong>Tentative Flight Details:</strong> </label> 
										<?php //echo $row['flightdetails']; ?>
									</div>
								</div>-->

								<div class="row">
									<div class="col-12">
										<label><strong>Price Details:</strong> </label> 
										<?php //echo $row['pricedetails']; ?>
										<?php
										
										$this->db->select('*');
										$this->db->from('tourprice');
										$this->db->where('tourid', $row['id']);
										$prices = $this->db->get()->result_array();
										
										//echo '<pre>'.print_r($prices, true);
										
										
										?>
                                        <div class="row">
                                        	<div class="col-6">
                                        		<table class="table">
                                        			<tr>
                                        				<th>Room Type</th>
                                        				<th>Price (INR)</th>
                                        				<th>Price (FCY)</th>
                                        			</tr>
                                        			<?php foreach($prices as $price) { ?>
                                        			<tr>
                                        				<td><?= $price['roomsize']; ?></td>
                                        				<td><?= $price['priceinr']; ?></td>
                                        				<?php if($price['pricefcy'] != ''){ ?><td><?= $price['pricecurrency'].' '.$price['pricefcy']; ?></td><?php } else { echo '<td> - </td>'; } ?>
                                        			</tr>
                                        			<?php } ?>
                                        		</table>		
                                        	</div>
                                        </div>
									</div>
								</div>

								<div class="col-12">
										<label><strong>Ref Url:</strong> </label> 
										<a href="<?php echo $row['refurl']; ?>" target=_blank>
										<?php echo $row['refurl']; ?>
										</a>
									</div>
								</div>

								<div class="col-12">
										<label><strong>Total Cost:</strong> </label> 
										<?php echo $row['totaltourcost']; ?>
									</div>
								</div>

								<!-- <div class="row">
									<div class="col-12">
										<label><strong>Visa Details:</strong> </label> 
										<?php //echo $row['visadetails']; ?>
									</div>
								</div> -->


								<?php } ?>
								<!-- 
								<h4>Itinerary Details:</h4> -->
								<?php //foreach($itinerary as $single) { ?>
								<!-- <div class="row">
									<div class="col-12">
										<label><strong>Days <?php //echo $single['itineryday']; ?></strong>:  <?php// echo $single['itinerytitle']; ?></label>
										<p><?php// echo $single['itinerydesc']; ?></p>
									</div>
								</div> -->
								
								<?php //} ?>


							</div>
							
						</div>
					</div>
				</div>
			</form>
		</div><!-- /.container-fluid -->
	</section>
</div>
