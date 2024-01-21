<?php
if(isset($res)) {
	$id = $res[0]['id'];
	$atbuteoptionid = $res[0]['atbuteoptionid'];
	$patributevalue = $res[0]['patributevalue'];
} else {
	$id = "0";
	$atbuteoptionid = "";
	$burl = "";
	$patributevalue = "";
}
?>

<div class="content-wrapper mt-3">

	<!-- Main content -->
	<section class="content">
		<div class="container-fluid">
			<!-- form start -->
			<form name="" action="<?php echo base_url()?>admin/Adminnewcontroller/attributesave" method="post" 
				enctype="multipart/form-data">
				<div class="row">
					<div class="col-md-12">
						<div class="card card-primary">
							<div class="card-header">
								<h3 class="card-title">Add Product Attribute</h3>
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
										<label for="title">Select Attribute<span class=" ">*</span></label>
										<select name="atbuteoptionid" class="form-control" required>
											<option value="">-Select One-</option>
											<?php 
											$aoption = $this->db->query("select * from attributeoption")->result_array();
											foreach($aoption as $aoptionres){
											?>
											<option value="<?php echo $aoptionres['id'];?>" 
												<?php if($atbuteoptionid==$aoptionres['id']){echo "selected"; } ?>>
												<?=$aoptionres['atoptionname'];?>
											</option>
										<?php } ?>
										</select>
									</div>
								</div>


								<div class="col-12">
									<div class="form-group">
										<label for="title"> Attribute Value<span class="">*</span></label>
										<input type="text" class="form-control" required name="patributevalue" value="<?=$patributevalue?>">
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