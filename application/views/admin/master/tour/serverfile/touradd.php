<?php 

if(isset($editdata))

{

	$id = $editdata[0]['tmainid'];

	$userid = $editdata[0]['userid'];

	$pkgname = $editdata[0]['pkgname'];

	$pkgprice = $editdata[0]['pkgprice'];

	$pkgduration = $editdata[0]['pkgduration'];

	$departuredate = $editdata[0]['departuredate'];

	$pkgoverview = $editdata[0]['pkgoverview'];

	$hoteldetails = $editdata[0]['hoteldetails'];

	$activities = $editdata[0]['activities'];

	$inclusionexclusion = $editdata[0]['inclusionexclusion'];

	$flightdetails = $editdata[0]['flightdetails'];

	$pricedetails = $editdata[0]['pricedetails'];

	$visadetails = $editdata[0]['visadetails'];

		// Itinary details //

	$itineryday = $editdata[0]['itineryday'];

	$itinerytitle = $editdata[0]['itinerytitle'];

	$itinerydesc = $editdata[0]['itinerydesc'];

}else{



	$id = "";

	$userid = "";

	$pkgname = "";

	$pkgprice = "";

	$pkgduration = "";

	$departuredate = "";

	$pkgoverview = "";

	$hoteldetails = "";

	$activities = "";

	$inclusionexclusion = "";

	$flightdetails = "";

	$pricedetails = "";

	$visadetails = "";



		// Itiary details //

	$itineryday = "";

	$itinerytitle = "";

	$itinerydesc = "";



}

?>



<div class="content-wrapper mt-3">

	<!-- Main content -->

	<section class="content">

		<div class="container-fluid">

			<!-- form start -->

			<form name="" action="submittour" method="post" id="tourpkgform">

				<div class="row">

					<div class="col-md-12">

						<div class="card card-primary">

							<div class="card-header">

								<h3 class="card-title">Create New Tour Package</h3>

							</div>

							<div class="card-body">

								<input type="hidden" name="oldid" value="<?=$id?>">

								<input type="hidden" name="userid" value="<?php echo $this->session->userdata['logged_in']['id']?>">

								<!--form start -->

								<div class="col-12">

									<div class="form-group">

										<label>Package Name:</label>

										<div class="input-group">

											<input type="text" name="pkgname" 

											class="form-control float-right" id="pkgname" value="<?=$pkgname?>" required  >

										</div>

									</div>

								</div>

								<div class="row">

									<div class="col-4">

										<div class="form-group">

											<label>Package Price:</label>

											<div class="input-group">

												<input type="text" name="pkgprice" class="form-control float-right" 

												value="<?=$pkgprice?>" required 

												onkeypress="return restrictAlphabets(event);">

											</div>

										</div>

									</div>

									<div class="col-4">

										<div class="form-group">

											<label>Package Duration:</label>

											<div class="input-group">

												<input type="text" name="pkgduration" class="form-control float-right" 

												value="<?=$pkgduration?>" required >

											</div>

										</div>

									</div>

									<div class="col-4">

										<div class="form-group">

											<label>Departure Date:</label>

											<div class="input-group">

												<input type="text" name="departuredate" class="form-control" id="departuredate" data-toggle="datepicker" autocomplete="off" required value="<?=$departuredate?>">

											</div>

										</div>

									</div>

								</div>



								<!-- tour type -->

								<div class="row">

									<div class="col-6">

										<div class="form-group">

											<label for="tour-type">Tour Type</label>

											<div class="row">

												<div class="col-6">

													<select name="tourmaincat" id="tour-type" class="form-control">

														<option value="india">India Tour</option>

														<option value="world">World Tour</option>

													</select>

												</div>

												<div class="col-6">

													<select name="toursubcat" id="site-setting4" class="form-control">

														<option value="group">Group Tour</option>

														<option value="customized">Customized Tour</option>

													</select>

												</div>

											</div>

										</div>

									</div>

								</div>



								<!-- Tour type end -->    





								<div class="row">

									<div class="col-12">

										<div class="form-group">

											<label for="pkgoverview">Package Overview</label>

											<textarea name="pkgoverview" id="pkgoverview" cols="30" rows="6" class="form-control ckeditor" required><?=$pkgoverview?></textarea>

										</div>

									</div>

								</div>

								

								<div class="row">

									<div class="col-12">

										<div class="col-12">

											<label for="itinerary-details">Itinerary Details</label>

										</div> 

									</div>



									<!-- Itinerary start -->



									<div id="myRepeatingFields" style="width: 100%;">

										<div class="entry">

											<input type="hidden" name="rowid[]" value="">

											<div class="row">

												<div class="col-2">

													<div class="form-group">

														<input type="text" class="form-control" id="days" placeholder="Days" name="itineryday[]">

													</div>

												</div>

												<div class="col-9">

													<div class="form-group">

														<input type="text" class="form-control" id="itinerary-title" placeholder="Itinerary Title" name="itinerytitle[]">

													</div>

												</div>

												<div class="col-1">

													<button type="button" class="btn btn-success btn-ṃd btn-add">

														<span class="lni-plus" aria-hidden="true"></span>

													</button>

												</div> 



												<div class="col-11">

													<div class="form-group">

														<textarea name="itinerydesc[]" id="itinerary-desc" cols="30" rows="6" class="form-control"></textarea>

													</div>			

												</div>

											</div>

										</div>

									</div>                  		

								</div>

							</div>

							<!-- Itinerary end -->

							<hr>





							<div class="row">

								<div class="col-12">

									<div class="form-group">

										<label for="hoteldetails">Hotel Details</label>

										<textarea name="hoteldetails" id="hoteldetails" cols="30" rows="6" class="form-control ckeditor" required><?=$hoteldetails?></textarea>

									</div>

								</div>

							</div>

							<div class="row">

								<div class="col-12">

									<div class="form-group">

										<label for="activities">Activities</label>

										<textarea name="activities" id="activities" cols="30" rows="6" class="form-control ckeditor" required><?=$activities?></textarea>

									</div>

								</div>

							</div>



							<div class="row">

								<div class="col-12">

									<div class="form-group">

										<label for="inclusionexclusion">Inclusions & Exclusions</label>

										<textarea name="inclusionexclusion" id="inclusionexclusion" cols="30" rows="6" class="form-control ckeditor" required><?=$inclusionexclusion?></textarea>

									</div>

								</div>

							</div>



							<div class="row">

								<div class="col-12">

									<div class="form-group">

										<label for="flightdetails">Flight Details</label>

										<textarea name="flightdetails" id="flightdetails" cols="30" rows="6" required class="form-control ckeditor"><?=$flightdetails?></textarea>

									</div>

								</div>

							</div>



							<div class="row">

								<div class="col-12">

									<div class="form-group">

										<label for="pricedetails">Price Details</label>

										<textarea name="pricedetails" required id="pricedetails" cols="30" rows="6" class="form-control ckeditor"><?=$pricedetails?></textarea>

									</div>

								</div>

							</div>



							<div class="row">

								<div class="col-12">

									<div class="form-group">

										<label for="visadetails">VISA Details</label>

										<textarea name="visadetails" required id="visadetails" cols="30" rows="6" class="form-control ckeditor"><?=$visadetails?></textarea>

									</div>

								</div>

							</div>



							<!--form end -->



							<div class="col-6">

								<input type="submit" class="btn btn-primary" name="submit" value="Save">

							</div>

						</div> <!-- /.card-body -->

					</div> <!-- /.card -->

				</div> <!-- /.col-md-12 -->

			</div>

		</form>

	</div><!-- /.container-fluid -->

</section>

</div><!-- /.content-wrapper -->







<script>

	function restrictAlphabets(e){

		var x=e.which||e.keycode;

		if((x>=48 && x<=57) || x==8 || (x>=35 && x<=40)|| x==46)

			return true;

		else

			return false;

	}

</script>


<script type="text/javascript">

	$(document).on('click', '.btn-add', function(e) {
		e.preventDefault();
		var controlForm = $('#myRepeatingFields:first'),
		currentEntry = $(this).parents('.entry:first'),
		newEntry = $(currentEntry.clone()).appendTo(controlForm);
		newEntry.find('input').val('');
		newEntry.find('textarea').val('');
		controlForm.find('.entry:not(:last) .btn-add')
		.removeClass('btn-add').addClass('btn-remove')
		.removeClass('btn-success').addClass('btn-danger')
		.html('<span class="lni-minus" aria-hidden="true"></span>');
	}).on('click', '.btn-remove', function(e) {
		e.preventDefault();
		$(this).parents('.entry:first').remove();
		return false;
	});
</script>