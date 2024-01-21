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


$cartres = $this->db->query("select *,count(id) as cartcountitem from cart where cookievalis='".$cookievalis."' and status='0' ")->result_array();

if(!empty($cartres)) 
	{

	 $cartcountitem =  $cartres[0]['cartcountitem'];

	}else{
		$cartcountitem = 0 ; 
	}

?>



<main>

	<!-- breadcrumb area start -->

	<div class="breadcrumb-area">

		<div class="container">

			<div class="row">

				<div class="col-12">

					<div class="breadcrumb-wrap">

						<nav aria-label="breadcrumb">

							<ul class="breadcrumb">

								<li class="breadcrumb-item"><a href="<?=base_url()?>"><i class="fa fa-home"></i></a></li>

								<!-- <li class="breadcrumb-item"><a href="#">shop</a></li>

								<li class="breadcrumb-item active" aria-current="page">cart</li> -->

							</ul>

						</nav>

					</div>

				</div>

			</div>

		</div>

	</div>

	<!-- breadcrumb area end -->



	<!-- cart main wrapper start -->

	<div class="cart-main-wrapper section-padding">

		<div class="container">

			<div class="section-bg-color">

				<div class="row">

					<div class="col-lg-12">

						<!-- Cart Table Area -->

						<div class="cart-table table-responsive">

							<table class="table table-bordered">

								<thead>

									<tr>

										<th class="pro-thumbnail">SL No</th>

										<th class="pro-thumbnail">Image</th>

										<th class="pro-title">Product</th>

										<th class="pro-quantity">Quantity</th>

										<th class="pro-price">Price</th>

										<th class="pro-subtotal">Total</th>

										<th class="pro-remove">Remove</th>

									</tr>

								</thead>

								<tbody>





									<?php 



									/*$cartres = $this->db->query("select * from cart where cookievalis='".$cookievalis."' and userid='$userid' and status='0' ")->result_array();*/



									$totmrp = 0;

									$cartres = $this->db->query("select * from cart where cookievalis='".$cookievalis."' and status='0' ")->result_array();



									if(!empty($cartres)) {



										$sno = "1";



										foreach($cartres as $cartrows){



											$pdetails = $this->db->query("Select * from product where id='".$cartrows['productid']."'")->result_array();



											$pname = $pdetails[0]['title'];



											$pimg = $pdetails[0]['featureimg'];

											$pnormalprice = $pdetails[0]['normalprice'];



											?>

											<tr>



												<td><?=$sno?></td>



												<td><img width="60px" height="60px" src="<?=base_url();?>uploads/<?=$pimg?>"></td>



												<td>



													<?php 



													$shrttile = $pname;



													$string = strip_tags($shrttile);



													if (strlen($string) > 45) {



														$stringCut = substr($string, 0, 45);



														$endPoint = strrpos($stringCut, ' ');



														$string = $endPoint? substr($stringCut, 0, $endPoint) : substr($stringCut, 0);



														$string .= '...';



													}



													echo $string;



													?>



												</td>



												<form name="" action="<?=base_url();?>Cart/updatecart" method="post">



													<td>



														<input type="hidden" name="cartid" id="cartid_<?=$sno?>" value="<?=$cartrows['id'];?>">



										<!-- <input type="text" id="qty_<?=$sno?>" onkeyup="itemTotalCal('qty_<?php echo $sno;?>','<?=$sno?>')" 



										class="form-control" name="qty" value="<?=$cartrows['qty'];?>" 



										style="width:55px;"> -->



										<select name="qty" class="form-control" style="width: 55px;" 

										onchange="window.location.href = '<?=base_url()?>Cart/updatecartajax/<?=$cartrows['id'];?>/'+this.value">

										<?php for($i=1;$i<=10;$i++) { ?>

											<option value="<?=$i?>" <?php if($cartrows['qty']==$i){echo "selected"; }?>><?=$i?></option>

										<?php } ?>

									</select>





									<input type="hidden" class="form-control" name="productprice" id="productprice_<?=$sno?>" value="<?=$cartrows['productprice'];?>" style="width:55px;">



									<input type="hidden" class="form-control" name="ptotcomsion" id="ptotcomsion_<?=$sno?>" 

									value="<?=$cartrows['ptotcomsion'];?>" style="width:55px;">





									<input type="hidden" class="form-control" name="ptotgstvalue" id="ptotgstvalue_<?=$sno?>" 

									value="<?=$cartrows['ptotgstvalue'];?>" style="width:55px;">





								</td>



								<td>

									<?php

									$pqty = $cartrows['qty'];

									$mrp = ($pnormalprice*$pqty);

									?>

								<?=$mrp?>

								</td>







								<td id="itemtotal_<?=$sno?>"><?=$cartrows['total'];?></td>







								<div class="alert alert-success" id="successmsg" role="alert" style="display: none;"></div>



							</form>



							<td>



								<a href="<?=base_url();?>Cart/removecart/<?=$cartrows['id'];?>" onclick="return confirm('Are you sure to remove?');"><span style="color: red;"><i class="fa fa-times" aria-hidden="true"></i></span></a>



							</td>



						</tr>



						<?php $sno++;

						$totmrp = ($mrp+$totmrp);  } } ?>

					</tbody>

				</table>

				<?php 



				/*$totqry = $this->db->query("select sum(total) as gtot from cart where cookievalis='".$cookievalis."' and userid='$userid' and status='0'  ")->result_array();*/





				$totqry = $this->db->query("select sum(total) as gtot from cart where cookievalis='".$cookievalis."'  and status='0'  ")->result_array();



				if(!empty($totqry))



				{







					$carttotal = $totqry[0]['gtot'];



				}else{



					$carttotal = 0;



				}





				if(!empty($decreseamt))



				{



					$grandtot = $decreseamt['minusamt'];



				}else{



					$grandtot = $carttotal;



				}





				$discountedprice = ($totmrp-$grandtot);





				?>

			</div>

			<!-- Cart Update Option -->

			<div class="cart-update-option d-block d-md-flex justify-content-between">

				<div class="apply-coupon-wrapper">

					<?php 



					if(empty($decreseamt))



						{	$couponis = "";



					?>

					<form name="" method="post"  class="coupon_inner d-block d-md-flex" action="<?=base_url();?>Cart/applycoupon">

						<!-- <input type="text" placeholder="Enter Your Coupon Code" required /> -->

						<input type="text" name="coupon" class="" required 

						placeholder="Enter Your Coupon Code">

						<input type="hidden" name="carttotal"  value="<?=$carttotal?>">

						<button class="btn ">Apply Coupon</button>

					</form>

					<?php if($this->session->flashdata('del')): ?>

						<div class="alert alert-danger" role="alert" style="margin-top: 25px;">

							<?php echo $this->session->flashdata('del'); ?>

						</div>

					<?php endif; ?>

				<?php }else{ ?>



					<div class="alert alert-success">



						Coupon Code <b><?php echo $couponis =  $decreseamt['couponcode']; ?></b> applied



					</div>

					        



				<?php } ?>

			</div>

				<!-- <div class="cart-update">

					<a href="#" class="btn btn-sqr">Update Cart</a>

				</div> -->

			</div>

		</div>

	</div>

	<div class="row arighty">

		<div class="col-lg-5">

			<!-- Cart Calculation Area -->

			<div class="cart-calculator-wrapper">

				<div class="cart-calculate-items">

					<?php if(!empty($cartcountitem)) { ?>

					<h6>Cart Total</h6>

					<div class="table-responsive">

						<table class="table">

							<tr>

								<td>Sub Total</td>

								<td>₹

									<?php if(!empty($decreseamt['dedcutionamt'])) { 

										$coupondiscountamt = $decreseamt['dedcutionamt'];

										?>

										<?php echo $carttotal;?>

									<?php }else{ 

										$coupondiscountamt = "";

										?>

										<?php

										echo $carttotal;

										//echo round($discountedprice,2);

										?> 

									<?php } ?>

								</td>

							</tr>

							<tr>

								<td>Discount</td>

								<td>₹

								<?php 

								if(!empty($decreseamt))

								{

									echo $decreseamt['dedcutionamt'];

								}else{

									echo "0";

								}

								?> 

							</td>

							</tr>

							<!-- <tr>

								<td>Shipping</td>

								<td>₹70</td>

							</tr> -->

							<tr class="total">

								<td>Total</td>

								<td class="total-amount">₹  <?php echo $grandtot;?> </td>

							</tr>

						</table>

					</div>
				<?php } ?>

				</div>

				<!-- <a href="checkout.html" class="btn btn-sqr d-block">Proceed Checkout</a> -->

					<?php if(!empty($cartcountitem)) { ?>

				<form name="" action="<?=base_url();?>Cart/checkout" method="post">



					<input type="hidden"  name="userid" value="<?=$userid?>">

					<input type="hidden"  name="discountedprice" value="<?=$grandtot?>">

					<input type="hidden"  name="coupondiscountamt" value="<?=$coupondiscountamt?>">

					<input type="hidden"  name="carttotal" value="<?=$carttotal?>">

					<input type="hidden"  name="totmrp" value="<?=$totmrp?>">

					<input type="hidden" name="grandtot" value="<?=$grandtot?>">

					<input type="hidden" name="couponis" value="<?=$couponis?>">

					<button  style="margin-bottom:45px; " type="submit" class="btn btn-sqr d-block checkout_btn">Checkout<i class="fa fa-arrow-right" aria-hidden="true"></i>


					</button>



				</form>

					<?php } ?>






			</div>

		</div>

	</div>

</div>

</div>

</div>

<!-- cart main wrapper end -->

</main>





<!-- Scroll to top start -->

<div class="scroll-top not-visible">

	<i class="fa fa-angle-up"></i>

</div>

<!-- Scroll to Top End -->

