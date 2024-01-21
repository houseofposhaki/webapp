<?php 
$userid = $this->session->userdata['logged_in']['id'];
$cookie_name = "cartcookieposhaki";
if(!empty($_COOKIE[$cookie_name]))
{
	$cookievalis = $_COOKIE[$cookie_name];
}else{
	$cookievalis = "";
}

?>

<section >

	<div class="other-banner"><img src="<?=base_url();?>assets/front/images//slider/other-banner.jpg" alt="" class="img-responsive" ></div>

</section>

<section>

	<div class="height10 clr"></div>

	<div class="container">

		<div class="col-md-9 pad5">

			<div class="panel-group" id="accordion">

				<div class="checkout-section ghjklpo">

					<div class="">



						<h4>Delivery Address</h4>



						<form action="<?=base_url();?>Cart/uploadordersubmit" name="contact_form" method="post" enctype="multipart/form-data">

							<input type="hidden" name="userid" value="<?=$userid?>">
							<input type="hidden" name="isupload" value="1">

							<div class="form-group">

								<label for="email">Upload Prescription:</label>

								<input type="file" id="featureimg" placeholder="" name="featureimg" required >

							</div>


							<div class="form-group">

								<label for="doctorname">Doctor Name:</label>

								<input type="text" class="form-control" id="doctorname" placeholder="Doctor Name" name="doctorname" >

							</div>


							<div class="form-group">

								<label for="patientname">Patient Name:</label>

								<input type="text" class="form-control" id="patientname" placeholder="Patient Name" name="patientname" >

							</div>





							<div class="form-group">

								<label for="email">Order Person Name:</label>

								<input type="text" class="form-control" id="name" placeholder="Enter Name" name="name" required>

							</div>

							<div class="form-group">

								<label for="pwd">Phone:</label>

								<input type="text" class="form-control" id="mobile" placeholder="Enter Mobile" name="mobile" required>

							</div>



							<div class="form-group">



								<label for="pwd">PIN:</label>

								<select name="pincode" class="form-control" required>

									<option value="">-Select Pincode-</option>

									<?php 

									$pincoderes = $this->db->query("select * from pincode")->result_array();

									foreach($pincoderes as $pincoderows){

										?>

										<option value="<?=$pincoderows['pin']?>"><?=$pincoderows['pin']?></option>

									<?php } ?>

								</select>



							</div>





							<div class="form-group">

								<label for="pwd">Address:</label>

								<textarea name="address" class="form-control"></textarea>

							</div>



							<div class="form-group">

								<label for="pwd">Landmark:</label>

								<input type="text" class="form-control" id="landmark" placeholder="Enter landmark" name="landmark" >

							</div>



							<div class="form-group">

								<label for="pwd">Special Instruction:</label>

								<input type="text" class="form-control" id="Special Instruction" placeholder="Any Special Instruction" name="specialinstruction">

							</div>



							<button type="submit" class="btn btn-primary">Submit</button>

						</form> 





					</div>



				</div>

			</div>



			<div class="clr height10"></div>

		</div>

	</section>



