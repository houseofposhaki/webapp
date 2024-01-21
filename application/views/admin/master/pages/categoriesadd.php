<?php
if(isset($res)) {
	$id = $res[0]['id'];
	$title = $res[0]['title'];
	$description = $res[0]['description'];
	$ispopular = $res[0]['ispopular'];
	$parentid = $res[0]['parentid'];
	$featureimg = $res[0]['featureimg'];
	$offer_daily_essentials = $res[0]['offer_daily_essentials'];
	$special_ofr_zone = $res[0]['special_ofr_zone'];
	$ofr_house_personalcare = $res[0]['ofr_house_personalcare'];
	$offer_on_groceries = $res[0]['offer_on_groceries'];
	$is_top = $res[0]['is_top'];
} else {
	$id = "0";
	$title = "";
	$description = "";
	$ispopular = "";
	$parentid = "";
	$featureimg = "";
	$offer_daily_essentials = "";
	$special_ofr_zone = "";
	$ofr_house_personalcare = "";
	$offer_on_groceries = "";
	$is_top = "";
}
?>

<div class="content-wrapper mt-3">

	<!-- Main content -->
	<section class="content">
		<div class="container-fluid">
			<!-- form start -->
			<form name="" action="<?php echo base_url()?>admin/Managepage/categoriessave" method="post" 
				enctype="multipart/form-data">
				<div class="row">
					<div class="col-md-12">
						<div class="card card-primary">
							<div class="card-header">
								<h3 class="card-title">Category Add</h3>
							</div>

							<?php if($this->session->flashdata('msg')): ?>
							<div class="alert alert-success" role="alert" style="margin-top: 25px;">
								<?php echo $this->session->flashdata('msg'); ?>
								</div>
							<?php endif; ?>
							<div class="card-body">
								<input type="hidden" name="oldid" value="<?=$id?>">

								<div class="col-12">
									<div class="form-group">
										<label for="title">Title<span class="required">*</span></label>
										<input type="text" name="title" class="form-control" id="title" 
										value="<?=$title?>">
									</div>
								</div>



								<input type="hidden" name="oldfeatureimg" value="<?=$featureimg?>">
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



								<div class="col-12">
									<div class="form-group">
										<label for="featured">Parent Category<span class=" ">*</span></label>
										<select name="parentid" class="form-control" required>
											<option value="">-Select One -</option>
											<?php 
											$ptcats = $this->db->query("select * from categories where parentid='0'")->result_array();
											foreach($ptcats as $ptcatrow) {
											?>
											<option value="<?php echo $ptcatrow['id'];?>" <?php if($ptcatrow['id']==$parentid){echo "selected"; } ?>><?php echo $ptcatrow['title'];?></option>
										<?php } ?>
										</select>
									</div>
								</div>



								<!-- <div class="col-12">
									<div class="form-group">
										<label for="featured">Offer On Daily Essentials<span class=" ">*</span></label>
										<input type="checkbox" name="offer_daily_essentials" value="1"
										<?php if($offer_daily_essentials=="1"){echo "checked"; } ?>>
									</div>
								</div>


								<div class="col-12">
									<div class="form-group">
										<label for="featured">Special Offer Zone<span class=" ">*</span></label>
										<input type="checkbox" name="special_ofr_zone" value="1"
										<?php if($special_ofr_zone=="1"){echo "checked"; } ?>>
									</div>
								</div>

								<div class="col-12">
									<div class="form-group">
										<label for="featured">Offer On House Personal Care<span class=" ">*</span></label>
										<input type="checkbox" name="ofr_house_personalcare" value="1"
										<?php if($ofr_house_personalcare=="1"){echo "checked"; } ?>>
									</div>
								</div>

								<div class="col-12">
									<div class="form-group">
										<label for="featured">Offers On Groceries<span class=" ">*</span></label>
										<input type="checkbox" name="offer_on_groceries" value="1"
										<?php if($offer_on_groceries=="1"){echo "checked"; } ?>>
									</div>
								</div> -->


								<div class="col-12">
									<div class="form-group">
										<label for="featured">Showing Top<span class=" ">*</span></label>
										<input type="checkbox" name="is_top" value="1"
										<?php if($is_top=="1"){echo "checked"; } ?>>
									</div>
								</div>





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