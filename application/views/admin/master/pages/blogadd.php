<?php

if(isset($res)) {

	$metatitle = $res[0]['metatitle'];

	$id = $res[0]['id'];

	$metadesc = $res[0]['metadesc'];

	$iconlogo = $res[0]['iconlogo'];

	$featureimg = $res[0]['featureimg'];

	$datasheet = $res[0]['datasheet'];

	$title = $res[0]['title'];

	$shortdesc = $res[0]['shortdesc'];

	$description = $res[0]['description'];

	$tag = $res[0]['tag'];



	$childcatid = $res[0]['childcatid'];

	$childcatexplode = explode(',',$childcatid);



	$brandid = $res[0]['brandid'];

	

	$maincatid = $res[0]['maincatid'];

	$maincatidexplode = explode(',',$maincatid);



	$subcatid = $res[0]['subcatid'];

	$subcatidexplode = explode(',',$subcatid);





	$isfeatured = $res[0]['isfeatured'];

	$isbestsell = $res[0]['isbestsell'];

	$iseditorpick = $res[0]['iseditorpick'];

	$slugurl = $res[0]['slugurl'];

	$ageno = $res[0]['ageno'];

	$colorid = $res[0]['colorid'];

	$normalprice = $res[0]['normalprice'];

	$offerprice = $res[0]['offerprice'];

	$sku = $res[0]['sku'];

	$weight = $res[0]['weight'];

	$stock = $res[0]['stock'];

	$composition = $res[0]['composition'];

	$mandateprescription = $res[0]['mandateprescription'];

	$commission = $res[0]['commission'];

	$gstpercent = $res[0]['gstpercent'];



	$batchno = $res[0]['batchno'];

	$expiredate = $res[0]['expiredate'];

	$hsncode = $res[0]['hsncode'];

	$manufacture = $res[0]['manufacture'];
	$specialcatid = $res[0]['specialcatid'];

} else {

	$id = "0";

	$metatitle = "";

	$gstpercent = "";

	$composition = "";

	$stock = "";

	$metadesc = "";

	$iconlogo = "";

	$featureimg = "";

	$datasheet = "";

	$title = "";

	$shortdesc = "";

	$description = "";

	$tag = "";

	$subcatid = "";

	$childcatid = "";

	$brandid = "";

	$isfeatured = "";

	$iseditorpick = "";

	$slugurl = "";

	$maincatid = "";

	$ageno = "";

	$colorid = "";

	$normalprice = "";

	$offerprice = "";

	$weight = "";

	$sku = "";

	$maincatidexplode = "";

	$subcatidexplode = "";

	$mandateprescription="";

	$commission="";



	$batchno="";

	$expiredate="";

	$hsncode="";

	$manufacture="";

	$isbestsell = "";
	$specialcatid = "";



}

?>



<div class="content-wrapper mt-3">



	<!-- Main content -->

	<section class="content">

		<div class="container-fluid">







			<?php 

			$galleryimg = $this->db->query("select * from  photos where blogid='".$id."'")->result_array();

			if(!empty($galleryimg))

			{

				$exist = "1";

			}else{

				$exist = "";

			}



			?>





			<?php if(!empty($exist)) { ?>

				<div class="row" style="margin-bottom: 10px;margin-top: 10px;">

					<div class="col-md-12">

						<a href="<?php echo base_url();?>admin/Galleryadd/galleryedit/<?=$id?>" target="_blank" >

							<button class="btn btn-warning">Update Product Gallery</button>	

						</a>

					</div>

				</div>

			<?php } ?>

			<br>



			<!-- form start -->

			<form name="" action="<?php echo base_url()?>admin/Managepage/blogsave" method="post" 

				enctype="multipart/form-data">

				<div class="row">

					<div class="col-md-12">

						<div class="card card-primary">

							<div class="card-header">

								<h3 class="card-title">Create Product</h3>

							</div>



							<?php if($this->session->flashdata('msg')): ?>

								<div class="alert alert-success" role="alert" style="margin-top: 25px;">

									<?php echo $this->session->flashdata('msg'); ?>

								</div>

							<?php endif; ?>

							<div class="card-body">

								<input type="hidden" name="oldid" value="<?=$id?>">

								<input type="hidden" name="oldiconlogo" value="<?=$iconlogo?>">

								<input type="hidden" name="oldfeatureimg" value="<?=$featureimg?>">

								<input type="hidden" name="olddatasheet" value="<?=$datasheet?>">

								<input type="hidden" name="userid" value="<?php echo $this->session->userdata['logged_in']['id']; ?>">





								<div class="col-12">

									<div class="form-group">

										<label for="title">Title<span class=" ">*</span></label>

										<input type="text" required name="title" class="form-control" id="title" 

										value="<?=$title?>">

									</div>

								</div>



<!-- 

								<div class="col-12">

									<div class="form-group">

										<label for="title">Manufature<span class=" ">*</span></label>

										<input type="text" required name="manufacture" class="form-control" id="manufacture" 

										value="<?=$manufacture?>">

									</div>

								</div> -->







								<div class="col-12">

									<div class="form-group">

										<label for="title">HSN Code<span class=" "></span></label>

										<input type="text"  name="hsncode" class="form-control" id="hsncode" 

										value="<?=$hsncode?>">

									</div>

								</div>













								<!-- <div class="col-12">

									<div class="form-group">

										<label for="title">Slug URL<span class=" ">*</span></label>

										<input type="text"  name="slugurl" class="form-control" id="slugurl" 

										value="<?=$slugurl?>">

									</div>

								</div> -->



								<!-- <div class="col-12">

									<div class="form-group">

										<label for="title">Meta Title<span class=" ">*</span></label>

										<input type="text"  name="metatitle" class="form-control" id="title" 

										value="<?=$metatitle?>">

									</div>

								</div>



								<div class="col-12">

									<div class="form-group">

										<label for="title">Meta Description<span class=" ">*</span></label>

										<textarea name="metadesc" class="form-control"><?=$metadesc?></textarea>

									</div>

								</div>

							-->







							<div id="child" style="margin-bottom: 5px;" class="col-12">

									<div class="form-group">

										<label for="title">Product Variation<span class=" "></span></label>

									</div>

								<?php 

								$childres = $this->db->query("select * from productvarient where productid='$id'")->result_array();

								if(!empty($childres)){

									foreach($childres as $childrows) {

										?>

										<?php 

										include "adstimeedit.php";

										?>

										<br>

									<?php }  ?>

								<?php }else { ?>

									<?php 

									include "adstimeadd.php";

									?>

									<br>

								<?php } ?>

							</div>



							<div class="col-12">

								<div class="form-group">

									<label for="title">In Stock<span class="">*</span></label>

									<input type="text" name="stock" required class="form-control" value="<?=$stock?>">

								</div>

							</div>



							<!-- <div class="form-group">

										<label for="title">Sepcial Category<span class=" ">*</span></label>

										<select name="specialcatid" class="form-control">
											<option value="">-Select one-</option>
											<?php 
											$specialcatRes = $this->db->query("select * from categories ")->result_array();
											foreach($specialcatRes as $specialcatRow) { 
											?>
											<option value="<?=$specialcatRow['id'];?>"
												<?php if($specialcatid==$specialcatRow['id']) {echo "selected";} ?>>
												<?=$specialcatRow['title'];?></option>

										<?php } ?>
										</select>

							</div> -->




							<div class="col-12">

								<div class="form-group">

									<label for="shortdesc">Choose Category</label><br/>

									<?php

									$catres = $this->db->query("select * from categories where parentid=0")->result_array();

									foreach($catres as $catrows) {

										?>

										<input type="checkbox" name="maincatid[]"

										<?php 

										if(!empty($maincatidexplode)) {

											foreach($maincatidexplode as $drows){

												if($catrows['id']==$drows) {echo "checked"; } 

											} }

											?> value="<?=$catrows['id']?>">

											<b><?=$catrows['title'];?></b>

											<div style="margin-left: 30px;">

												<?php

												$subcatres = $this->db->query("select * from categories where parentid='".$catrows['id']."'")->result_array();

												foreach($subcatres as $subcatrows) {

													?>

													<input type="checkbox" name="subcatid[]" 

													<?php 

													if(!empty($subcatidexplode)) {

														foreach($subcatidexplode as $drowssub){

															if($subcatrows['id']==$drowssub) {echo "checked"; } 

														} }

														?>

														value="<?=$subcatrows['id'];?>"><?=$subcatrows['title'];?>



														<!-- child category start -->

														<div style="margin-left: 30px;">

															<?php 

															$childcatres = $this->db->query("select * from childcat 

																where subcatid='".$subcatrows['id']."'")->result_array();

															foreach($childcatres as $childcatrows){

																?>

																<input type="checkbox" name="childcatid[]" 

																<?php 

																if(!empty($childcatexplode)) {

																	foreach($childcatexplode as $drowssub){

																		if($childcatrows['id']==$drowssub) {echo "checked"; } 

																	} }

																	?>

																	value="<?=$childcatrows['id'];?>">

																	<?php echo $childcatrows['childcatname'];?>

																<?php } ?>



															</div>

															<!--child ctegory end -->

														<?php } ?>

													</div>

												<?php } ?>



											</div>

										</div>











												<!-- 	<div class="col-12">

														<div class="form-group">

															<label for="shortdesc">Manufaturer / Brand</label><br/>

															<input type="text" class="form-control" name="brandid" value="<?php echo $brandid;?>">

														</div>

													</div>

												-->





												<div class="col-12">

													<div class="col-6">

														<div class="form-group">

															<label for="featureimg">

																<?php if($featureimg!="") { ?>

																	Change Feature Image

																<?php }else{?>

																	Upload Feature Image

																<?php } ?>



																<span class=" ">*</span></label>

																<input type="file"  name="featureimg" class="form-control" id="featureimg">

															</div>

														</div>

														<?php if($featureimg!="") { ?>

															<div class="col-6">

																<img height="50px" width="50px" src="<?=base_url();?>uploads/<?=$featureimg?>">

															</div>

														<?php } ?>



													</div>















													<!-- multiple gallery start -->





													<?php 

													$galleryimg = $this->db->query("select * from  photos where blogid='".$id."'")->result_array();

													if(!empty($galleryimg))

													{

														$exist = "1";

													}else{

														$exist = "";

													}



													?>

													<?php if(empty($exist)) { ?>





														<div class="col-12">

															<div class="col-6">

																<div class="form-group">

																	<label for="featureimg">Upload Gallery</label>





																	<input class="btn btn-primary" type="file" name="userfile[]"  id="image_file" accept=".png,.jpg,.jpeg,.gif,.webp" multiple>



																</div>

															</div>

														</div>

													<?php } ?>





													<!-- multiple gallery  end -->







														<!-- <div class="col-12">

															<div class="form-group">

																<label for="title">Prescription Mandatory? (OTC Medicine)<span class=" ">*</span></label>

																<select name="mandateprescription" class="form-control" required>

																	<option value="">-Select One-</option>

																	<option value="0" <?php if($mandateprescription=="0"){echo "selected"; } ?>>Normal</option>

																	<option value="1" <?php if($mandateprescription=="1"){echo "selected"; } ?>>Priority</option>

																	<option value="2" <?php if($mandateprescription=="2"){echo "selected"; } ?>>Medium</option>

																</select>

															</div>

														</div> -->







														<div class="col-12">

															<div class="form-group">

																<label for="title">Normal Price<span class=" ">*</span></label>

																<input type="text" name="normalprice" value="<?=$normalprice?>" class="form-control">

															</div>

														</div>





														<div class="col-12">

															<div class="form-group">

																<label for="title">Offer Price<span class=" ">*</span></label>

																<input type="text" name="offerprice" value="<?=$offerprice?>" class="form-control">

															</div>

														</div>





														<!-- <div class="col-12">

															<div class="col-6">

																<div class="form-group">

																	<label for="datasheet">

																		<?php if($datasheet!="") { ?>

																			Change Data Sheet

																		<?php }else{?>

																			Upload Data Sheet

																		<?php } ?>



																		<span class=" ">*</span></label>

																		<input type="file"  name="datasheet" class="form-control" id="datasheet">

																	</div>

																</div>

																<?php if($datasheet!="") { ?>

																	<div class="col-6">

																		<img height="50px" width="50px" src="<?=base_url();?>uploads/<?=$datasheet?>">

																	</div>

																<?php } ?>



															</div> -->





															<div class="col-12">

																<div class="form-group">

																	<label for="title">Weight<span class=" ">*</span></label>

																	<input type="text" name="weight" value="<?=$weight?>" class="form-control">

																</div>

															</div>









															<div class="col-12">

																<div class="form-group">

																	<label for="title">SKU<span class=" ">*</span></label>

																	<input type="text" name="sku" value="<?=$sku?>" class="form-control">

																</div>

															</div>





															<div class="col-12">

																<div class="form-group">

																	<label for="featured" style="color: red">Featured Product</label>

																	<input type="checkbox" name="isfeatured" value="1"

																	<?php if($isfeatured=="1"){echo "checked"; } ?>>

																</div>

															</div>





															<div class="col-12">

																<div class="form-group">

																	<label for="featured" style="color: red">Best Selling Product</label>

																	<input type="checkbox" name="isbestsell" value="1"

																	<?php if($isbestsell=="1"){echo "checked"; } ?>>

																</div>

															</div>



								<!--<div class="col-12">

									<div class="form-group">

										<label for="featured">Editor's Pick</label>

										<input type="checkbox" name="iseditorpick" value="1"

										<?php //if($iseditorpick=="1"){echo "checked"; } ?>>

									</div>

								</div> -->





								<script src="https://cdn.ckeditor.com/4.15.1/standard/ckeditor.js"></script>

								<div class="col-12">

									<div class="form-group">

										<label for="description">Desciprtion<span class=" ">*</span></label>

										<textarea name="description" required class="form-control editor" id="description" 

										><?=$description?></textarea>

									</div>

								</div>

								<script>

									CKEDITOR.replace( 'description' );

								</script>



								<div class="col-12">

									<div class="form-group">

										<label for="shortdesc">GST(%)</label>

										<input type="number" name="gstpercent" class="form-control" value="<?=$gstpercent?>" >

									</div>

								</div>



								<!-- <div class="col-12">

									<div class="form-group">

										<label for="shortdesc">Tag</label>

										<input type="text" class="form-control" name="tag" value="<?=$tag?>" placeholder="Tags by comma(',')">

									</div>

								</div> -->



								



								<div class="col-6">

									<input type="submit" class="btn btn-primary" name="save">

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

  function rowadd_new()

  {

    var cnt = $('.slno').length;

    cnt = cnt +1;

    $.ajax({

      type:'POST',

      url:'<?php echo base_url(); ?>admin/Managepage/add_row',

      data:'a='+cnt,

        success:function(data){

        $("#child").append(data);

      }

    });

  }

</script>