

<?php 
if(!empty($this->session->userdata['logged_in']['id']))
{
	$userid = $this->session->userdata['logged_in']['id'];
	$userdetails = $this->db->query("select * from user where id='$userid'")->result_array();
	if(!empty($userdetails))
	{
		$fullname = $userdetails[0]['fullname'];    
		$username = $userdetails[0]['username'];    
		$mobile = $userdetails[0]['mobile'];    
		$address = $userdetails[0]['address'];    
		$password = base64_decode($userdetails[0]['password']);    
	}
}else{
	$userid = "";
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
							<div class="myaccount-content">
                                                    <h5>Orders</h5>
									
								<div class="tab-content">
									<div class="tab-pane active" id="tab_default_1">

										<!-- order tbl start -->
										<!-- Cart Start -->
										<div class="cart-wrapper">
											<div class="cart-table">
												<table class="table">
													<thead class="small_hide">
														<tr>
															<th class="product-name">Date</th>
															<th class="product-name">Order No</th>
															<th class="product-name">Status</th>
															<th class="product-price">Total Price</th>
															<th class="product-price">Details</th>
															<th class="product-price">Invoice</th>
														</tr>
													</thead>
													<tbody>
														<?php
														$orderes = $this->db->query("select * from ordertbl where userid='$userid' order by id desc")->result_array();
														foreach($orderes as $ordrow) {
														 ?>
														<tr>
																<td class="product-name"><?=date('d-m-Y',strtotime($ordrow['ts']))?></td>
																<td class="product-name"><a class="name" href="#">
																	<?=$ordrow['orderno']?>
																</a>
																</td>
																<td class="product-name">
																	<?=$ordrow['ordstatus']?>
																</a>
																</td>
																<td class="product-price">
																	<div class="product-price"> 
																		<span class="sale-price text_dark">₹ <?=$ordrow['grandtot']?></span> 
																	</div>
																</td>
																<td>
																	<a href="<?=base_url()?>Cart/orderdetails/<?=$ordrow['orderno']?>">
																		<button class="btn btn-primary">Details</button>
																	</a>
																</td>


																<td>
																	<a target="_blank" href="<?=base_url()?>admin/Order/invoiceprint/<?=$ordrow['orderno']?>">
																		<button class="btn btn-success">
																			<i class="fa fa-print" aria-hidden="true"></i>
																		</button>
																	</a>
																</td>

														</tr>
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
