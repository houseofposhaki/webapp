<?php 
		$cartid = $this->uri->segment('4');


?>


<?php 

$userid = $this->session->userdata['logged_in']['id'];
$orderno = $this->uri->segment('3');
$orddetails = $this->db->query("select * from ordertbl where orderno='$orderno'")->result_array();
if(!empty($orddetails))
{
	$ordstatus = $orddetails[0]['ordstatus'];
	$couponis = $orddetails[0]['couponis'];

}
?>


<section id="" class="padding bg_light">

	<div class="container">
		<div class="row">

			<?php include "left.php" ; ?>

			<div class="col-md-9 col-sm-9 col-xs-12">

				<div class="profile-login-bg">
					<div class="row bottom40">
						<div class="tabbable-panel">
							<div class="tabbable-line">
								<ul class="nav nav-tabs dispaflrty">
									<li class="active">
										<a href="#tab_default_1" data-toggle="tab">
										Return Item </a>
									</li>
								</ul>
								<div class="tab-content">
									<div class="tab-pane active" id="tab_default_1">

										<!-- order tbl start -->
										<!-- Cart Start -->
										<div class="cart-wrapper">
											<div class="cart-table cartresponsivtbl">
												<table class="table table-bordered table-striped table-responsive">
													<thead class="small_hide">
														<tr>
															<th class="product-name proimg">Image</th>
															<th class="product-name proitem">Item</th>
															<th class="product-name proqty">Qty</th>
															<th class="product-price proretun">Return</th>
														</tr>
													</thead>
													<tbody>
														<?php
														$orderes = $this->db->query("select cart.*,cart.id as cartid, product.id,product.title,product.featureimg
														 from cart  left join product on cart.productid = product.id
														 where cart.id='$cartid'")->result_array();
														foreach($orderes as $ordrow) {
														 ?>
														 <form name="" method="post" action="<?=base_url()?>Cart/returnreq">
														 	<input type="hidden" name="orderno" value="<?=$orderno?>">
														 	<input type="hidden" name="cartid" value="<?=$ordrow['cartid']?>">
														<tr>
																<td class="product-name proimg">
																	<img src="<?=base_url()?>uploads/<?=$ordrow['featureimg']?>" style="height: 50px;width: 50px">
																	
																</td>
																<td class="product-name proitem">
																	<?=$ordrow['title']?>
																	
																</td>
																<td class="product-name proqty">
																	<input type="number" name="returnqty" class="form-control" required value="<?=$ordrow['qty']?>">
																</td>
																<td class="proretun">
																	<?php if($ordrow['refundstatus']==0) { ?>

																	<?php if($ordstatus=="Delivered") { ?>

																		<button type="submit"  class="btn btn-primary">Return</button>

																	<?php } ?>

																	<?php }else if($ordrow['refundstatus']==1) { ?>
																		<button class="btn btn-danger">Requested</button>
																	<?php }else if($ordrow['refundstatus']==2) {  ?>
																		<button class="btn btn-success">Approved</button>
																	<?php } ?>
																</td>

														</tr>
													</form>
													<?php } ?>
															
														</tbody>
														<!-- 1rowcar -->

															<!-- 2row_end -->
														</table>
													</div>

												</div>
												<!-- Cart End --> 



												<!-- order tbl end -->



												<?php if($this->session->flashdata('del')): ?>


													<div class="alert alert-danger" role="alert" style="margin-top: 25px;">


														<?php echo $this->session->flashdata('del'); ?>


													</div>


												<?php endif; ?>
											</div>

										</div>
									</div>
								</div>




							</div>
						</div>

					</div>

				</div>
			</div>

		</section>
