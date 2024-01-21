<?php
if(isset($res)) {
	$id = $res[0]['id'];
	$childcatname = $res[0]['childcatname'];
	$subcatid = $res[0]['subcatid'];
} else {
	$id = "0";
	$childcatname = "";
	$subcatid = "";
}
?>

<div class="content-wrapper mt-3">

	<!-- Main content -->
	<section class="content">
		<div class="container-fluid">
			<!-- form start -->
			<form name="" action="<?php echo base_url()?>admin/Managepage/childcatsave" method="post" 
				enctype="multipart/form-data">
				<div class="row">
					<div class="col-md-12">
						<div class="card card-primary">
							<div class="card-header">
								<h3 class="card-title">Child Category Add</h3>
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
										<input type="text" name="childcatname" class="form-control" id="childcatname" 
										value="<?=$childcatname?>">
									</div>
								</div>



								<div class="col-12">
									<div class="form-group">
										<label for="featured">Sub Category<span class=" ">*</span></label>
										<select name="subcatid" class="form-control" required>
											<option value="">-Select One -</option>
											<?php 
											$ptcats = $this->db->query("select * from categories where parentid!='0'")->result_array();
											foreach($ptcats as $ptcatrow) {
												?>
												<option value="<?php echo $ptcatrow['id'];?>" <?php if($ptcatrow['id']==$subcatid){echo "selected"; } ?>><?php echo $ptcatrow['title'];?></option>
											<?php } ?>
										</select>
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