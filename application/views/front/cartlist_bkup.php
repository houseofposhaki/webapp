

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



<section>

	<div class="other-banner"><img src="<?=base_url();?>assets/front/images/slider/other-banner.jpg" alt="" class="img-responsive" ></div>

</section>



<div>

	<input type="hidden" id="fetchuserid" name="userid" value="<?=$userid?>">

</div>



<section style="margin-top:25px;">

	<div class="container">

		<center><h2>Your Items</h2></center>

		<div class="table-responsive">          

			<table class="table">

				<thead>

					<tr style="background-color: #292975">

						<th><font style="color: white">Si No</font></th>

						<th><font style="color: white">Image</font></th>

						<th><font style="color: white">Item</font></th>

						<th><font style="color: white">Qty</font></th>
						<th><font style="color: white">MRP</font></th>

						<th><font style="color: white">Price</font></th>

						<th><font style="color: white">Remove</font></th>

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
									<del><?=$mrp?></del>
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

				?>



				<?php 

				if(!empty($decreseamt))

				{

					$grandtot = $decreseamt['minusamt'];

				}else{

					$grandtot = $carttotal;

				}


				$discountedprice = ($totmrp-$grandtot);


				?>



				<div class="row col-md-3">

					<?php 

					if(empty($decreseamt))

						{	$couponis = "";

					?>

					DO you have any coupon code ?

					<form name="" method="post" class="varscart" action="<?=base_url();?>Cart/applycoupon">

						<input type="text" name="coupon" class="form-control" required>

						<input type="hidden" name="carttotal"  value="<?=$carttotal?>">

						<button type="submit" class="btn btn-success">Apply</button>

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



			<div>



			</div>

		</div>



		



		

		<div style="margin-bottom: 40px;">
			<span style="float: right;"><b> Total MRP: <?php echo $totmrp;?> </b></span>

		</div>



		<?php if(!empty($decreseamt)) { 
			$coupondiscountamt = $decreseamt['dedcutionamt'];
			?>
			<div style="margin-bottom: 10px;text-align: right;"><span ><b>Cart Total: <?php echo $carttotal;?> </b></span></div>
			<div style="margin-bottom: 10px;text-align: right;"><span><b>Addition Coupon Discount: <?php echo $decreseamt['dedcutionamt'];?> 
			(<?=$decreseamt['discpercent']?> %)</b></span></div>

		<?php }else{ 
			$coupondiscountamt = "";
		 ?>
			<div style="margin-bottom: 60px;">
				<span style="float: right;"><b>Discounted Price: <?php echo round($discountedprice,2);?> </b></span>
			</div>
		<?php } ?>


		<div style="margin-bottom: 60px;">
			<span style="float: right;"><b>To be paid : <?php echo $grandtot;?> </b></span>

		</div>


		






		<div>

			<span style="float: right;">

				<form name="" action="<?=base_url();?>Cart/checkout" method="post">

					<input type="hidden"  name="userid" value="<?=$userid?>">
					<input type="hidden"  name="discountedprice" value="<?=$grandtot?>">
					<input type="hidden"  name="coupondiscountamt" value="<?=$coupondiscountamt?>">
					<input type="hidden"  name="carttotal" value="<?=$carttotal?>">
					<input type="hidden"  name="totmrp" value="<?=$totmrp?>">
					<input type="hidden" name="grandtot" value="<?=$grandtot?>">
					<input type="hidden" name="couponis" value="<?=$couponis?>">
					<button  style="margin-bottom:45px; " type="submit" class="btn btn-primary">Checkout<i class="fa fa-arrow-right" aria-hidden="true"></i>

					</button>

				</form>

			</span>

		</div>







	</div>







</div>



<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>



<script>

	function itemTotalCal(id,sno){

		var cartid = document.getElementById('cartid_'+sno).value;  

		var qty = document.getElementById('qty_'+sno).value;  

		var productprice = document.getElementById('productprice_'+sno).value;  
		var ptotcomsion = document.getElementById('ptotcomsion_'+sno).value;  
		var ptotgstvalue = document.getElementById('ptotgstvalue_'+sno).value;  

		var itemtotal = (qty*productprice);
		var itemtotcommission = (qty*ptotcomsion);
		var itemtotgstvalue = (qty*ptotgstvalue);

		var successmsg = "Your cart has updated";

				//document.getElementById('itemtotal_'+sno).value = itemtotal;

				$.ajax({

					url: '<?=base_url()?>Cart/updatecartajax',

					type: 'post',

					cache: false,

					data: {cartid:cartid,itemtotal: itemtotal,itemtotcommission:itemtotcommission,itemtotgstvalue:itemtotgstvalue, qty:qty},

					success: function(response){

						$('#itemtotal_'+sno).text(itemtotal);

						$('#successmsg').show();

						$('#successmsg').text(successmsg);

					}

				});





				var userid = document.getElementById('fetchuserid').value;  



				$.ajax({

					url: '<?=base_url()?>Cart/calcarttotal',

					type: 'post',

					cache: false,

					data: {userid:userid},

					success: function(res){

						$('#cartTot').text(res);

					}

				});


			}    




		</script>

	</section>