<?php 

if(!empty($res))
{
	$userid = $res['userid'];
	$couponis = $res['couponis'];
	$grandtot = $res['grandtot'];
	$discountedprice = $res['discountedprice'];
	$coupondiscountamt = $res['coupondiscountamt'];
	$carttotal = $res['carttotal'];
	$totmrp = $res['totmrp'];
}else{
	$userid = "";
	$couponis = "";
	$grandtot = "";
	$discountedprice = "";
	$coupondiscountamt = "";
	$carttotal = "";
	$totmrp = "";

}





$cookie_name = "cartcookieposhaki";

if(!empty($_COOKIE[$cookie_name]))

{

	$cookievalis = $_COOKIE[$cookie_name];

}else{

	$cookievalis = "";

}





$cartconditionres = $this->db->query("select cart.*,product.id,product.mandateprescription from cart 

	left join product on cart.productid = product.id 

	where cart.cookievalis='$cookievalis' and cart.status=0 and product.mandateprescription='1'")->result_array();





	?>


	<!--breadcrumbs area start-->
	<div class="breadcrumbs_area">
		<div class="container">   
			<div class="row">
				<div class="col-12">
					<div class="breadcrumb_content">
						<ul>
							<li><a href="index.html">home</a></li>
							<li>Checkout</li>
						</ul>
					</div>
				</div>
			</div>
		</div>         
	</div>
	<!--breadcrumbs area end-->

	<!--Checkout page section-->
	<div class="Checkout_section mt-60">
		<div class="container">
			<div class="row">
				<div class="col-12">
					<div class="user-actions">
						<h3> 
							<i class="fa fa-file-o" aria-hidden="true"></i>
							Returning customer?
							<a class="Returning" href="<?=base_url()?>securelogin" 
								aria-expanded="true">Click here to login</a>     
							</h3>

						</div>

					</div>
				</div>
				<div class="checkout_form">
					<div class="row">
						<div class="col-lg-6 col-md-6">
							<form action="<?=base_url();?>Cart/ordersubmit" name="contact_form" method="post" enctype="multipart/form-data">
								<input type="hidden" type="hidden" name="appId" value="TEST376312e759327727543613c3b9213673" />
								<input type="hidden" type="hidden" name="orderCurrency" value="INR" placeholder=""/>
								<input type="hidden" name="returnUrl" value="<?=base_url()?>thankyou" />
								<input type="hidden" name="userid" value="<?=$userid?>">

								<input type="hidden" name="couponis" value="<?=$couponis?>">

								<input type="hidden" name="grandtot" value="<?=$grandtot?>">
								<input type="hidden" name="totmrp" value="<?=$totmrp?>">


								<input type="hidden" name="discountedprice" value="<?=$discountedprice?>">
								<input type="hidden" name="coupondiscountamt" value="<?=$coupondiscountamt?>">
								<input type="hidden" name="carttotal" value="<?=$carttotal?>">


								<h3>Billing Details</h3>
								<div class="row">

									<div class="col-lg-12 mb-20">
										<label>Full Name <span>*</span></label>
                                    <input type="text" name="name" id="" placeholder="Full Name" required />
									 	   
									</div>
									<div class="col-lg-12 mb-20">
										<label>Full Address  <span>*</span></label>
										<input type="text" name="address" id="street-address" placeholder="Full address Line 1"  required />
									</div>
									<div class="col-12 mb-20">
										<label for="postcode" class=" ">Postcode / ZIP</label>
                                		<input type="text" pattern="[0-9]{6}" id="postcode" placeholder="Six (6) digit Postcode / ZIP" name="pincode"   />
									</div>
							

									<div class="col-lg-6 mb-20">
										<label>Phone<span>*</span></label>
                                <input type="text" id="phone" pattern="[1-9]{1}[0-9]{9}" name="mobile" placeholder="Phone" required />

									</div> 
									<div class="col-lg-6 mb-20">
										 <label for="phone">Email</label>
                                <input type="email" id="email" name="email" placeholder="Email" />
                            </div>

									
									
									<div class="checkout-box-wrap">
                                <div class="single-input-item">
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="ship_to_different" onchange="valueChanged()">
                                        <label class="custom-control-label" for="ship_to_different">Ship to a
                                        different address?</label>
                                    </div>
                                </div>
                                <div class="ship-to-different single-form-row" id="shipping_form" style="display: none;">
                                    <div class="row">
                                        <div class="single-input-item">
                                            <label for="street-address_2" class="  mt-20"> Name</label>
                                            <input type="text" id="street-address_2" placeholder=" Person Name" name="shipping_name"   />
                                        </div>

                                        <div class="single-input-item">
                                            <label for="street-address_2" class="  mt-20"> Phone</label>
                                            <input type="text" id="" placeholder=" Mobile" pattern="[1-9]{1}[0-9]{9}" name="shipping_mobile"   />
                                        </div>
                                    </div>

                                    <div class="single-input-item">
                                        <label for="street-address_2" class="  mt-20"> address</label>
                                        <input type="text" id="street-address_2" placeholder=" address Line 1" name="shipping_address"   />
                                    </div>

                                    <div class="single-input-item">
                                        <label for="postcode_2" class=" ">Postcode / ZIP</label>
                                        <input type="text" pattern="[0-9]{6}" id="postcode_2" placeholder="Six (6) digit Postcode / ZIP" name="shipping_pincode"   />
                                    </div>
                                    <div class="col-12">
										<div class="order-notes">
											<label for="order_note">Order Notes</label>
											<textarea id="order_note" name="order_note" placeholder="Notes about your order, e.g. special notes for delivery."></textarea>
										</div>    
									</div>
                                </div>
                            </div>

									                                                  
								</div>
						</div>
						<div class="col-lg-6 col-md-6">
								<h3>Your order</h3> 
								<div class="order_table table-responsive">
									<table>
										<thead>
											
										</thead>
										<tbody>
											 <tr>
			                                    <td>Sub Total</td>
			                                    <td><strong>₹ <?=$carttotal?></strong></td>
			                                </tr>
			                                <tr>
			                                    <td>Shipping</td>
			                                    <td><strong>₹ 0</strong></td>
			                                </tr>
										</tbody>
										<tfoot>
											 <tr>
                                    <td>Total Amount</td>
                                    <td><strong>₹ <?=$carttotal?></strong></td>
                                </tr>
										</tfoot>
									</table>     
								</div>
								<div class="payment_method">
									<div class="panel-default">
										  <input type="radio" id="razorpay" name="paymentmethod" value="razorpay" class="custom-control-input" required  />
                                    <label class="custom-control-label" for="razorpay">Razorpay</label>
									</div> 
									<div class="panel-default">
										  <input type="radio" id="cashon" name="paymentmethod" value="cod" class="custom-control-input" required />
                                    <label class="custom-control-label" for="cashon">Cash On Delivery</label>
									</div> 
									
									<div class="order_button">
										<button  type="submit">Proceed to Pay</button> 
									</div>    
								</div> 
							</form>         
						</div>
					</div> 
				</div> 
			</div>       
		</div>
		<!--Checkout page section end-->

<script type="text/javascript">
    function valueChanged()
    {
        if($('#ship_to_different').is(":checked"))   
            $("#shipping_form").show();
        else
            $("#shipping_form").hide();
    }
</script>