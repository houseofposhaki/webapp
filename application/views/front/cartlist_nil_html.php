
<?php if(!empty($this->session->userdata['logged_in']['id'])) 
{ 
	$userid = $this->session->userdata['logged_in']['id'];
}else{
	$userid = "";
} 




$cookie_name = "cartcookieposhaki";
if(!empty($_COOKIE[$cookie_name]))
{
	$cookievalis = $_COOKIE[$cookie_name];
}else{
	$cookievalis = "";
}


?>

<section class="collection_header">
	<div class="page section-header text-center">
		<h1>Your cart</h1>
	</div>
</section>


<!-- Checkout Start -->
<div class="section section-padding-04 section-padding-03">
	<div class="top_wrapper">
		<div class="container"> 
			
			<!-- Checkout Start -->
			<div class="checkout-wrapper mt-0">



				<form action="#">
					<div class="row">
						<div class="col-lg-8 col-md-8"> 


							<!-- Cart Start -->
							<div class="cart-wrapper">
								<div class="cart-table">
									<table class="table">
										<thead class="small_hide">
											<tr>
												<th class="product-name" colspan="3">Product</th>
												<th class="product-price">Total Price</th>
												<th class="">Quantity</th>
												<th class="product-subtotal">Subtotal</th>
											</tr>
										</thead>
										<tbody>
											<tr>
												<td class="product-action small_hide">
													<div class="cart-product-remove"> 
														<a href="#"><i class="far fa-trash-alt"></i></a> </div>
													</td>
													<td class="product-image"><img src="<?=base_url()?>assets/front/images/pest/pest_04.jpg" alt="ayira"></td>
													<td class="product-name"><a class="name" href="#">1mg Noni Juice Plus Immunity Booster & Joint Health Support Rich in Antioxidants</a>
														<div class="widget-item d-flex">
															<h4 class="widget-title">Size : <span>S</span></h4>
															<h4 class="widget-title">Color : <span>Black</span></h4>
														</div>
													</td>
													<td class="product-price subtotal">
														<div class="product-price"> 
															<span class="sale-price text_dark">₹100</span> 
														</div>
														<!-- mobile_show -->
														<div class="ISHide hide_desktop">
															<a href="#" class="hideLink editcanselbtn">Edit</a>
														</div>
														<!-- mobile_show -->
													</td>
													<!-- desktop_show -->
													<td class="hide_mobile">
														<div class="product-quantity d-inline-flex">
															<button type="button" class="sub">-</button>
															<input type="text" value="1" />
															<button type="button" class="add">+</button>
														</div>
													</td>
													<td class="product-price hide_mobile">
														<div class="product-price"> <span class="sale-price">₹100</span> </div>
													</td>
													<!-- desktop_show -->
													
												</tr>
												<!-- mobile_show -->
												<tr class="hide_desktop">
													<td colspan="3">
														
														<div class="ISProductBody flexaround" style="display: none">
															<div class="cart-product-remove"> 
																<a href="#"><i class="far fa-trash-alt"></i></a> 
															</div>
															
															<div class="product-quantity d-inline-flex">
																<button type="button" class="sub">-</button>
																<input type="text" value="1" />
																<button type="button" class="add">+</button>
															</div>
															
															<div class=""> 
																<button class="apply">Updated</button>
															</div>
														</div>
													</td>
												</tr>  
												<!-- mobile_show -->
											</tbody>
											<!-- 1rowcar -->

											<tbody>
												<tr>
													<td class="product-action small_hide">
														<div class="cart-product-remove"> 
															<a href="#"><i class="far fa-trash-alt"></i></a> </div>
														</td>
														<td class="product-image"><img src="<?=base_url()?>assets/front/images/pest/pest_03.jpg" alt="ayira"></td>
														<td class="product-name"><a class="name" href="#">1mg Noni Juice Plus Immunity Booster & Joint Health Support Rich in Antioxidants</a>
															<div class="widget-item d-flex">
																<h4 class="widget-title">Size : <span>S</span></h4>
																<h4 class="widget-title">Color : <span>Black</span></h4>
															</div>
														</td>
														<td class="product-price subtotal">
															<div class="product-price"> 
																<span class="sale-price text_dark">₹100</span> 
															</div>
															<!-- mobile_show -->
															<div class="ISHide hide_desktop">
																<a href="#" class="hideLink editcanselbtn">Edit</a>
															</div>
															<!-- mobile_show -->
														</td>
														<!-- desktop_show -->
														<td class="hide_mobile">
															<div class="product-quantity d-inline-flex">
																<button type="button" class="sub">-</button>
																<input type="text" value="1" />
																<button type="button" class="add">+</button>
															</div>
														</td>
														<td class="product-price hide_mobile">
															<div class="product-price"> <span class="sale-price">₹100</span> </div>
														</td>
														<!-- desktop_show -->
														
													</tr>
													<!-- mobile_show -->
													<tr class="hide_desktop">
														<td colspan="3">
															
															<div class="ISProductBody flexaround" style="display: none">
																<div class="cart-product-remove"> 
																	<a href="#"><i class="far fa-trash-alt"></i></a> 
																</div>
																
																<div class="product-quantity d-inline-flex">
																	<button type="button" class="sub">-</button>
																	<input type="text" value="1" />
																	<button type="button" class="add">+</button>
																</div>
																
																<div class=""> 
																	<button class="apply">Updated</button>
																</div>
															</div>
														</td>
													</tr>  
													<!-- mobile_show -->
												</tbody>
												<!-- 2row_end -->
											</table>
										</div>
										<div class="cart-btn padto_10">
											<a href="/" class="btn--link cart-continue"><i class="fas fa-angle-left"></i> Continue shopping</a>
											<div class="cart-btn-right"> <a href="#" class="updtet"><i class="fas fa-sync"></i> Update Cart</a> </div>
										</div>
										<div class="cart-btn">
											<div class="cart-btn-left mobilsisecartbt">
												<h3 class="cuponcoade">Check COD Availability</h3>
												<div class="coupon_code">
													<input type="text" placeholder="Apply coupon code">
													<button class="apply">Apply</button>
												</div>
											</div>
										</div>
									</div>
									<!-- Cart End --> 
								</div>
								<div class="col-lg-4 col-md-4"> 
									<!-- Checkout Form Start -->
									<div class="checkout-order">
										<div class="cart-note">
											<div class="solid-border">
												<h5><label class="cart_note__label">Special Instructions </label></h5>
												<textarea name="note" id="" class="cart-note__input"></textarea>
											</div>
										</div>
										<div class="checkout-order-table table-responsive">
											<table class="table">
												<tr>
													<td class="product-name"><p class="text-uppercase"><strong>Subtotal</strong></p></td>
													<td class="product-price alignRight"><p><strong>₹150.00</strong></p></td>
												</tr>
												<tr class="product-subtotal">
													<td class="product-name"><p>Total</p></td>
													<td class="total-price alignRight"><p>₹600.00</p></td>
												</tr>
												<tr>
													<td colspan="2">
														<input type="submit" name="checkout" id="" class="btn btn_Place_order cart__footer_checkout" value="CHECKOUT">
														<div class="paymnet-img"><img src="<?=base_url()?>assets/front/images/Payment_Security.jpg"></div>
													</td>
												</tr>
											</table>
										</div>
									</div>
									<!-- Checkout Form End --> 
								</div>
							</div>
						</form>
					</div>
					<!-- Checkout End --> 
				</div>
			</div>  
		</div>
		<!-- Checkout End -->




