<?php
$orderno = $this->uri->segment('4');
// order details //

$ordres = $this->db->query("select * from ordertbl where orderno='$orderno'")->result_array();
if(!empty($ordres))
{
	$grandtot = $ordres[0]['grandtot'];
	$patientname = $ordres[0]['patientname'];
	$name = $ordres[0]['name'];
	$mobile = $ordres[0]['mobile'];
	$pincode = $ordres[0]['pincode'];
	$address = $ordres[0]['address'];
	$ts = $ordres[0]['ts'];
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>Invoice</title>
	<link href="https://fonts.googleapis.com/css?family=Great+Vibes&display=swap" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="https://medcempharma.com/assets/bill/style.css" />
	<style>
		table tr td{padding:5px;}
		h1, h2, h3, h4, h5, label, p, div, td{font-size: 9px;}
		td{font-size: 10px;}
	</style>
</head>

<body>


	<div style="width:1000px;margin:auto;">
		<h2 style="text-align: center;font-size: 16px">TAX INVOICE</h2>
		<table border="0" cellspacing="0" width="100%" align="center">
			<tr> 
				<td colspan="4" style="padding: 0;">
					<table border="0" cellspacing="0" width="100%" style="border: 0;">
						<tr>
							<th width="50%" align="left">
								<div ><small style="font-size: 12px;padding-bottom: 6px;margin-bottom: 6px;display: block;">ORIGINAL COPY</small></div>
								<div ><strong style="font-size: 12px;margin-bottom: 6px;display: block;">INVOICE No: <?=$orderno?>
							</strong></div>
						</th>
						<th width="50%" align="right">
							<div style="font-size: 10px;">DATE: <?php echo date('d-m-Y',strtotime($ts)); ?></div>
						</th>
					</tr>
				</table>
			</td>
		</tr>
		<tr> 
			<td colspan="4" style="padding: 0;">
				<table border="1" cellspacing="0" width="100%" style="border:0;">
					<tr>
						<th width="50%" align="left" style="vertical-align: top;">
							<div ><img src="<?=base_url()?>assets/sitelogo.png" alt="img"></div>

						</th>
						<th width="50%" align="center" style="vertical-align: top;">
							<div style="min-height: 125px;">
								<p style="margin: 0;font-size: 12px;">To:  <?=$name?> </p>
								<p style="margin: 0;font-size: 12px;">Delivery Address: <?=$address?> </p>
							</div>
						</th>
					</tr>
				</table>
			</td>
		</tr>
		<tr> 
			<td colspan="4" style="padding: 0;">
				<table border="1" cellspacing="0" width="100%" style="border:0;">
					<tr>
						<th width="4%" align="center" style="vertical-align: top;">
							<div >SI NO</div>
						</th>
						<th width="29.9%;" align="center" style="vertical-align: top;">
							<div >DESCRIPTION</div>
						</th>
						<th width="6%" align="center" style="vertical-align: top;">
							<div >MFR/MKT</div>
						</th>
						<th width="6%" align="center" style="vertical-align: top;">
							<div >HSN/SAC</div>
						</th>
						<th width="6%" align="center" style="vertical-align: top;">
							<div >BATCH</div>
						</th>
						<th width="6%" align="center" style="vertical-align: top;">
							<div >EXPIRE</div>
						</th>
						<th width="6%" align="center" style="vertical-align: top;">
							<div >MRP</div>
						</th>
						<th width="6%" align="center" style="vertical-align: top;">
							<div >DISCOUNT</div>
						</th>
						<th width="6%" align="center" style="vertical-align: top;">
							<div >UNIT PRICE</div>
						</th>
						<th width="6%" align="center" style="vertical-align: top;">
							<div >QUANTITY</div>
						</th>
						<th width="6%" align="center" style="vertical-align: top;">
							<div >GST%</div>
						</th>
						<th width="10%" align="center" style="vertical-align: top;">
							<div >AMOUMT</div>
						</th>
					</tr>
					<?php
					$mrptot = 0;
					$i = 1;
					$cartres = $this->db->query("select * from cart where orderno='$orderno'")->result_array();
					foreach($cartres as $cartrow){
						?>
						<tr>
							<td align="center" style="vertical-align: middle;"><?=$i?></td>
							<td align="center" style="vertical-align: middle;">
								<?php $productid =  $cartrow['productid'];
								$pres = $this->db->query("select * from product where id='$productid'")->result_array();
								if(!empty($pres))
								{
									echo $pres[0]['title'];
								}
								?>
							</td>
							<td align="center" style="vertical-align: middle;">
								<?php $productid =  $cartrow['productid'];
								$pres = $this->db->query("select * from product where id='$productid'")->result_array();
								if(!empty($pres))
								{
									echo $pres[0]['manufacture'];
								}
								?>
							</td>
							<td align="center" style="vertical-align: middle;">
								<?php $productid =  $cartrow['productid'];
								$pres = $this->db->query("select * from product where id='$productid'")->result_array();
								if(!empty($pres))
								{
									echo $pres[0]['hsncode'];
								}
								?>
							</td>
							<td align="center" style="vertical-align: middle;">
								<?php $productid =  $cartrow['productid'];
								$pres = $this->db->query("select * from product where id='$productid'")->result_array();
								if(!empty($pres))
								{
									echo $pres[0]['batchno'];
								}
								?>
							</td>
							<td align="center" style="vertical-align: middle;">
								<?php $productid =  $cartrow['productid'];
								$pres = $this->db->query("select * from product where id='$productid'")->result_array();
								if(!empty($pres))
								{
									$expdt = $pres[0]['expiredate'];
									echo date('d/m',strtotime($expdt));
								}
								?>
							</td>
							<td align="center" style="vertical-align: middle;">
								<?php $productid =  $cartrow['productid'];
								$pres = $this->db->query("select * from product where id='$productid'")->result_array();
								if(!empty($pres))
								{
									echo $pres[0]['normalprice'];
								}
								?>
							</td>
							<td align="center" style="vertical-align: middle;">
								<?php $productid =  $cartrow['productid'];
								$pres = $this->db->query("select * from product where id='$productid'")->result_array();
								if(!empty($pres))
								{
									$mrp =  $pres[0]['normalprice'];
									$actualprice = $cartrow['productprice'];
									 $disc = ($mrp - $actualprice);
									 echo round($disc,2);
								}
								?>
							</td>
							<td align="center" style="vertical-align: middle;"><?php echo $cartrow['productprice'];?></td>
							<td align="center" style="vertical-align: middle;"><?php echo $cartrow['qty'];?></td>
							<td align="center" style="vertical-align: middle;">
								<?php $productid =  $cartrow['productid'];
								$pres = $this->db->query("select * from product where id='$productid'")->result_array();
								if(!empty($pres))
								{
									echo ($pres[0]['gstpercent']);
								}
								?>
							</td>
							<td align="center" style="vertical-align: middle;">
								<?php echo $cartrow['total'];?>
							</td>
						</tr>
					
					<?php 

							$productid =  $cartrow['productid'];
								$pres = $this->db->query("select * from product where id='$productid'")->result_array();
								if(!empty($pres))
								{
									$mrptot = $mrptot+$pres[0]['normalprice'];
								}

								$i++;  

							} ?>
				
				</table>
			</td>
		</tr>


		<tr> 
			<td colspan="4" style="padding: 0;border: solid 1px;">
				<table border="1" cellspacing="0" width="100%" style="border: 0;margin-top: 30px;">
					<tr>
						<th>
							<div class="ruppee">

								<span class="rec"></span>

								<p style="margin-bottom: 11px;font-size: 14px;margin-top:12px">Lorem Ipsum is simply dummy text of the printing and typesetting</p>
								<table width="100%" border="1" cellspacing="0">
									<tr>
										<td style="font-size: 12px;text-align: center;">Taxable Amt</td>
										<td style="font-size: 12px;text-align: center;">SGST%</td>
										<td style="font-size: 12px;text-align: center;">SGST Amt</td>
										<td style="font-size: 12px;text-align: center;">CGST%</td>
										<td style="font-size: 12px;text-align: center;">CGST Amt</td>
									</tr>
									<?php 
								$gsttblres = $this->db->query("select * from cart  where orderno='$orderno' group by gstpercentage")->result_array();
								foreach($gsttblres as $gsttblrow) {
								?>
									<tr>
										<td style="font-size: 12px;text-align: center;padding: 3px;"><?=$gsttblrow['total']?></td>
										<td style="font-size: 12px;text-align: center;padding: 3px;"><?=($gsttblrow['gstpercentage']/2)?></td>
										<td style="font-size: 12px;text-align: center;padding: 3px;"><?=($gsttblrow['ptotgstvalue']/2)?></td>
										<td style="font-size: 12px;text-align: center;padding: 3px;"><?=($gsttblrow['gstpercentage']/2)?></td>
										<td style="font-size: 12px;text-align: center;padding: 3px;"><?=($gsttblrow['ptotgstvalue']/2)?></td>
									</tr>
							<?php } ?>

								</table>
							</div>
							<div class="total_amtt">
								<div class="tt">
									<p style="font-size: 13px;"><b>MRP Total</b></p>
								</div>
								<div class="tt">
									<p style="font-size: 11px;">Savings
									<?php
									$disdiffer = ($mrptot-$grandtot);
									$dismultiply = ($disdiffer*100);
									$disdevide = ($dismultiply/$mrptot);
									echo "@". round($disdevide,2)."%" ; 
									?>
									</p>
								</div>
								<div class="tt">
									<p style="font-size: 11px;">Sub Total</p>
								</div>

							</div>
							<div class="tot_1">
								<div class="amm">
									<p style="font-size: 11px;">
									<?php echo $mrptot; ?> </p>
								</div>
								<div class="amm">
									<p style="font-size: 11px;">
									<?php 
									$disdiffer = ($mrptot-$grandtot);
									echo round($disdiffer,2); ?>
									</p>
								</div>
								<div class="amm">
									<p style="font-size: 11px;">
									<?php echo $grandtot; ?> </p>
								</div>


							</div>
						</th>
					</tr>

				</table>
			</td>
		</tr>

	</table>
</div>


</body>
</html>
