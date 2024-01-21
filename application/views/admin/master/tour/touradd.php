<?php 
if(isset($editdata))
{
	$tourid = $editdata[0]['id'];
	$userid = $editdata[0]['userid'];
	$pkgname = $editdata[0]['pkgname'];
	$tourtype = $editdata[0]['tourtype'];
	$tourcategory = $editdata[0]['tourcategory'];
	$pkgday = $editdata[0]['pkgday'];
	$pkgnight = $editdata[0]['pkgnight'];
	$departuredate = $editdata[0]['departuredate'];
	$hub = $editdata[0]['hub'];
	$refurl = $editdata[0]['refurl'];
	$totaltourcost = $editdata[0]['totaltourcost'];
 
}else{
	$tourid = "0";
	$userid = "";
	$pkgname = "";
	$tourtype = "";
	$tourcategory = "";
	$pkgday = "";
	$pkgnight = "";
	$departuredate = "";
	$hub = "";
	$refurl = "";
	$totaltourcost = "";
}
?>
		<!-- Content Area -->
		<div class="content-wrapper mt-3">
			<section class="content">
				<div class="container-fluid">
					<form name="" action="submittour" method="post" id="tourpkgform">
						<div class="row">
							<div class="col-md-12">
								<div class="card card-primary">
									<div class="card-header">
										<h3 class="card-title">Add New Tour Package</h3>
									</div>
									<input type="hidden" name="oldid" value="<?=$tourid?>">
									<input type="hidden" name="userid" value="<?php echo $this->session->userdata['logged_in']['id']?>">

									<div class="card-body">
										<div class="row">
											<div class="col-12">
												<div class="text-right required"><small>All the fields marked with (*) are required.</small></div>
											</div>
										</div>										
										<div class="row">
											<div class="col-12">
												<div class="form-group">
													<label>Package Name<span class="required">*</span></label>
													<div class="input-group">
														<input type="text" name="pkgname" value="<?=$pkgname?>" class="form-control float-right" id="pkgname" required>
													</div>
												</div>
											</div>											
										</div>
										<div class="row">
											<div class="col-4">
												<div class="form-group">
													<label for="tour-type">Tour Type<span class="required">*</span></label>
													<div class="row">
														<div class="col-6">
															<select name="tourtype" id="tourtype" class="form-control" required>
																<option value="">Select One</option>
																<option value="D" <?php if($tourtype=="D"){echo "selected";}?>>India Tour</option>
																<option value="I"  <?php if($tourtype=="I"){echo "selected";}?>>World Tour</option>
															</select>
														</div>
														<div class="col-6">
															<select name="tourcategory" id="tourcategory" class="form-control" required>
																<option value="">-Select One-</option>
																<option value="group" selected>Group Tour</option>
															</select>
														</div>
													</div>
												</div>
											</div>
											<div class="col-4">
												<div class="form-group">
													<label>Package Duration <span class="required">*</span></label>
													<div class="row">
														<div class="col-6">
														<input type="text" name="pkgday" id="pkgday" class="form-control" required placeholder="Days" value="<?=$pkgday?>">
														</div>
														<div class="col-6">
														<input type="text" name="pkgnight" id="pkgnight" class="form-control" required placeholder="Nights" value="<?=$pkgnight?>">
														</div>
													</div>
												</div>
											</div>
											<div class="col-4">
												<div class="form-group">
													<label>Departure Date<span class="required">*</span></label>
													<div class="row">
														<input type="text" name="departuredate" class="form-control" id="departuredate" data-toggle="datepicker" autocomplete="off" required 
														 value="<?=$departuredate?>">
													</div>
												</div>
											</div>
										</div>
										<div class="row">
											<div class="col-4">
												<div class="form-group">
													<label for="hub">Hub<span class="required">*</span></label>
													<select name="hub" id="hub" class="form-control" multiple required>
														<option value="">-Select Hub-</option>
														<?php 
														$hubs = $this->db->query("select * from hub")->result_array();
														foreach($hubs as $hubdata) {
														?>
														<option value="<?=$hubdata['id']?>" <?php if($hub==$hubdata['id']) {echo "selected";} ?>><?=$hubdata['hub'];?></option>
														<?php } ?>
													</select>
												</div>
											</div>
											<div class="col-4" id="otherdiv" style="display: none;">
												<div class="form-group">
													<label for="others">Others</label>
													<input type="text" name="othershub" id="othershub" class="form-control" required>	
												</div>
											</div>
										</div>
										

										<div class="row">
											<div class="col-8">
												<div class="form-group">
													<label for="pkgprice">Package Price<span class="required">*</span></label>
													<!-- Tour packsage price start -->
													<?php 
											        if($tourid>0)
											        {
													$this->db->select('*');
													$this->db->from('tourprice');
													$this->db->where('tourid',$tourid);
													$priceres = $this->db->get()->result_array();
													foreach($priceres as $pricerow) {
													$roomsize = $pricerow['roomsize'];
													?>	
													<div id="myRepeatingFields2" style="width: 100%;">
                                                	<div class="entry">
											        <input type="hidden" name="rowid1[]" value="">
                                                		<div class="row pkgpricetable">
                                                			<div class="col-3">
                                                				<input type="hidden" name="pricerowid" value="<?=$pricerow['id']?>">
                                                				<select name="roomsize[]" id="roomsize" class="form-control">
                                                					<option value="single" 
                                                					<?php if($roomsize=="single"){echo "selected"; }?> >Single</option>
                                                					<option value="double" <?php if($roomsize=="double"){echo "selected";}?>>Double/Twin</option>
                                                					<option value="tripple" <?php if($roomsize=="tripple"){echo "selected";}?>>Tripple</option>
                                                					<option value="childwbed" <?php if($roomsize=="childwbed"){echo "selected";}?>>Child with Bed</option>
                                                					<option value="childnbed" <?php if($roomsize=="childnbed"){echo "selected";}?>>Child no Bed</option>
                                                					<option value="infant" <?php if($roomsize=="infant"){echo "selected";}?>>Infant</option>
                                                				</select>
                                                			</div>
                                                			<div class="col-4">
                                                				<div class="input-group">
                                                					<div class="input-group-prepend">
                                                						<span class="input-group-text"><i class="lni-rupee"></i></span>
                                                					</div>
                                                					<input type="text" class="form-control" aria-label="Amount"
                                                					name="priceinr[]" value="<?=$pricerow['priceinr']?>"
                                                					<?php if($pricerow['id']!=""){echo "readonly";}?> id="priceinr" onkeypress="return restrictAlphabets(event);"  >
                                                				</div>
                                                			</div>
                                                			<div class="col-4">
                                                				<div class="input-group">
                                                					<div class="input-group-prepend">
                                                						<div class="input-group-text">
                                                							<select name="pricecurrency[]" id="pricecurrency">
																			<?php $currencis = $this->db->query("select * from currencyconverter")->result_array(); 
																			foreach($currencis as $currow) {
																			?>

                                                								<option value="<?=$currow['currency']?>" 
                                                									<?php if($pricerow['pricecurrency']==$currow['currency']) 
                                                									{echo "selected";} ?>><?php echo 
                                                								$currow['currency'];?></option>
                                                							<?php }?>
                                                							</select>
                                                						</div>
                                                					</div>
                                                					<input type="text" value="<?=$pricerow['pricefcy']?>" class="form-control" aria-label="Amount"
                                                					name="pricefcy[]" id="pricefcy" onkeypress="return restrictAlphabets(event);">
                                                				</div>
                                                			</div>
                                                			<div class="col-1">
    															<button type="button" class="btn btn-success btn-md btn-add2">Add
    																<!--<span class="lni-plus" aria-hidden="true"></span>-->
    															</button>                                                			    
                                                			</div>
                                                			<!--Tour package price end -->
                                                		</div>
                                                		</div>
                                                	</div>
                                                	<?php } }else { ?>
                                                <div id="myRepeatingFields2" style="width: 100%;">
                                                	<div class="entry">
													<input type="hidden" name="rowid1[]" value="">
                                                		<div class="row pkgpricetable">
                                                			<div class="col-3">
                                                				<input type="hidden" name="pricerowid" value="">
                                                				<select name="roomsize[]" id="roomsize" class="form-control">
                                                					<option value="single">Single</option>
                                                					<option value="double">Double/Twin</option>
                                                					<option value="tripple">Tripple</option>
                                                					<option value="childwbed">Child with Bed</option>
                                                					<option value="childnbed">Child no Bed</option>
                                                					<option value="infant">Infant</option>
                                                				</select>
                                                			</div>
                                                			<div class="col-4">
                                                				<div class="input-group">
                                                					<div class="input-group-prepend">
                                                						<span class="input-group-text"><i class="lni-rupee"></i></span>
                                                					</div>
                                                					<input type="text" class="form-control" aria-label="Amount"
                                                					name="priceinr[]" value="" id="priceinr" onkeypress="return restrictAlphabets(event);"  >
                                                				</div>
                                                			</div>
                                                			<div class="col-4">
                                                				<div class="input-group">
                                                					<div class="input-group-prepend">
                                                						<div class="input-group-text">
                                                							<select name="pricecurrency[]" id="pricecurrency">
																			<?php $currencis = $this->db->query("select * from currencyconverter")->result_array(); 
																			foreach($currencis as $currow) {
																			?>

                                                								<option value="<?=$currow['currency']?>"><?php echo 
                                                								$currow['currency'];?></option>
                                                							<?php }?>
                                                							</select>
                                                						</div>
                                                					</div>
                                                					<input type="text" value="" class="form-control" aria-label="Amount"
                                                					name="pricefcy[]" id="pricefcy" onkeypress="return restrictAlphabets(event);">
                                                				</div>
                                                			</div>
                                                			<div class="col-1">
    															<button type="button" class="btn btn-success btn-md btn-add2">Add
    																<!--<span class="lni-plus" aria-hidden="true"></span>-->
    															</button>                                                			    
                                                			</div>
                                                			<!--Tour package price end -->
                                                		</div>
                                                		</div>
                                                	</div>

                                                	<?php } ?>
                                                	
                                                
													
													
												</div>
											</div>
										</div>

										<!-- <div class="row">
											<div class="col-12">
												<div class="form-group">
													<label for="pkgdesc">Package Description<span class="required">*</span></label>
													<textarea name="pkgdesc" id="pkgdesc" cols="30" rows="6" class="form-control editor" required></textarea>
												</div>
											</div>
										</div> -->
										
										<!-- itinery details strat -->
										<!-- <div class="row">
											<div class="col-12">
												<label for="itinerary-details">Itinerary Details<span class="required">*</span></label>
											</div>
											<div id="myRepeatingFields" style="width: 100%;">
												<div class="entry">
											        <input type="hidden" name="rowid[]" value="">
													<div class="row">
														<div class="col-2">
															<div class="form-group">
																<input type="text" class="form-control" id="days" placeholder="Days" name="itineryday[]" required>
															</div>
														</div>
														<div class="col-9">
															<div class="form-group">
																<input type="text" class="form-control" id="itinerary-title" placeholder="Itinerary Title" name="itinerytitle[]" required>
															</div>
														</div>
														<div class="col-1">
															<button type="button" class="btn btn-success btn-md btn-add">Add
																<span class="lni-plus" aria-hidden="true"></span>
															</button>
														</div>
														<div class="col-11">
															<div class="form-group">
																<textarea name="itinerydesc[]" id="itinerary-desc" cols="30" rows="6" class="form-control" placeholder="Itinerary Details" required></textarea>
															</div>
														</div>
													</div>
												</div>
											</div>
										</div> -->
										<!-- Itinery details end -->	
										<!-- <hr>
										<div class="row">
											<div class="col-12">
												<div class="form-group">
													<label for="hoteldetails">Tentative Hotel Details<span class="required">*</span></label>
													<textarea name="hoteldetails" id="hoteldetails" cols="30" rows="6" class="form-control editor" required></textarea>
												</div>
											</div>
										</div>
										<div class="row">
											<div class="col-12">
												<div class="form-group">
													<label for="inclexclusion">Inclusions & Exclusions<span class="required">*</span></label>
													<textarea name="inclexclusion" id="inclexclusion" cols="30" rows="6" class="form-control editor" required></textarea>
												</div>
											</div>
										</div>
										<div class="row">
											<div class="col-12">
												<div class="form-group">
													<label for="flightdetails">Tentative Flight Details</label>
													<textarea name="flightdetails" id="flightdetails" cols="30" rows="6" required class="form-control editor"></textarea>
												</div>
											</div>
										</div>
										<div class="row">
											<div class="col-12">
												<div class="form-group">
													<label for="visadetails">VISA Details</label>
													<textarea name="visadetails" required id="visadetails" cols="30" rows="6" class="form-control editor"></textarea>
												</div>
											</div>
										</div> -->
										<div class="row">
											<div class="col-12">
												<div class="form-group">
													<label for="visadetails">Reference URL</label>
													<input type="url" name="refurl"  value="<?=$refurl?>" required id="refurl" cols="30" rows="6" class="form-control">
												</div>
											</div>
										</div>
										<div class="row">
											<div class="col-12">
												<div class="form-group">
													<label for="visadetails">Total Cost</label>
													<input type="text" name="totaltourcost" required id="totaltourcost" 
													cols="30" rows="6" class="form-control" value="<?=$totaltourcost?>">
												</div>
											</div>
										</div>
										<div class="row">
    										<div class="col-6">
    											<input type="submit" class="btn btn-primary" name="submit" value="Save">
    										</div>										    
										</div>
									</div>
								</div>
								</div>
							</div>
						</div>
					</form>
				</div>
			</section>
		</div>
		<!-- Footer -->
	</div>

	<script type="text/javascript">
	$(document).ready(function() {
		$('#datatable').DataTable();
	});
	</script>
	<!-- js validator -->

	<!-- Date Picker -->
<!-- 	<script type="text/javascript" src="assets/js/datepicker.min.js"></script>
	<script type="text/javascript">
		$('[data-toggle="datepicker"]').datepicker();
	</script> -->
	<script src="ckeditor/ckeditor.js"></script>
	<script>
		$(document).on('click', '.btn-add', function(e) {
			e.preventDefault();
			var controlForm = $('#myRepeatingFields:first'),
				currentEntry = $(this).parents('.entry:first'),
				newEntry = $(currentEntry.clone()).appendTo(controlForm);
				newEntry.find('input').val('');
			controlForm.find('.entry:not(:last) .btn-add')
				.removeClass('btn-add').addClass('btn-remove')
				.removeClass('btn-success').addClass('btn-danger')
				.html('Remove'); // <i class="lni-minus"></i>
		}).on('click', '.btn-remove', function(e) {
			e.preventDefault();
			$(this).parents('.entry:first').remove();
			return false;
		});
		
		$(document).on('click', '.btn-add2', function(e) {
			e.preventDefault();
			var controlForm = $('#myRepeatingFields2:first'),
				currentEntry = $(this).parents('.entry:first'),
				newEntry = $(currentEntry.clone()).appendTo(controlForm);
				newEntry.find('input').val('');
			controlForm.find('.entry:not(:last) .btn-add2')
				.removeClass('btn-add2').addClass('btn-remove')
				.removeClass('btn-success').addClass('btn-danger')
				.html('Remove');
		}).on('click', '.btn-remove', function(e) {
			e.preventDefault();
			$(this).parents('.entry:first').remove();
			return false;
		});		

		$(document).ready(function() {
			$(".editor").each(function () {
				CKEDITOR.replace( $(this).attr("name") );
			});
		});
	</script>


	<!-- ajax -->
	<script type="text/javascript">
	$(document).ready(function(){
		$('#tourtype').change(function(){
			var tourtypeval = $('#tourtype').val();
			if(tourtypeval!='')
			{
				$.ajax({
			    url:"<?php echo base_url(); ?>Tour/fetch_hub",
			    method:"POST",
			    data:{tourtypeval:tourtypeval},
			    success:function(data)
			    {
			     $('#hub').html(data);
			    }
			   });
			}

		});
	});
	
	</script>
	<script type="text/javascript">
		$(function(){
			$("#hub").change(function(){
				var a = $(this).val();
				if(a=="43")
				{
					$("#otherdiv").show();
				}
			});
		});
		
	   function restrictAlphabets(e){
	    var x=e.which||e.keycode;
	    if((x>=48 && x<=57) || x==8 || (x>=35 && x<=40)|| x==46)
	      return true;
	    else
	      return false;
	  }
		
	</script>

</body>

</html>