<?php
$schoolid = $this->uri->segment('4');
?>



<div class="content-wrapper mt-3">



	<!-- Main content -->

	<section class="content">

		<div class="container-fluid">

			<!-- form start -->

			<form name="" action="<?php echo base_url()?>admin/Galleryadd/edit_file_upload" method="post" 

				enctype="multipart/form-data">

				<div class="row">

					<div class="col-md-12">

						<div class="card card-primary">

							<div class="card-header">

								<h3 class="card-title">Product Gallery</h3>

							</div>



							<?php if($this->session->flashdata('msg')): ?>

								<div class="alert alert-success" role="alert" style="margin-top: 25px;">

									<?php echo $this->session->flashdata('msg'); ?>

								</div>

							<?php endif; ?>

							<!-- school id -->
							<input type="hidden" name="user_id" value="<?php echo $schoolid; ?>" id="file" placeholder="class">


							<div class="card-body">

								<?php
								if(isset($edit_data_image) ): $i=1;
									foreach ($edit_data_image as $key => $data) { 
										?>
										<tr class="imagelocation<?php echo $data['id'] ?>">
											<td colspan="2" align="center">
												<img src="<?php echo base_url(); ?>uploads/<?php echo $data['image']; ?>" style="vertical-align:middle;" width="80" height="80">
												<!-- <span style="cursor:pointer;" onclick="javascript:deleteimage(<?php // echo $data['id'] ?>)">X</span> -->
												<a href="<?=base_url()?>admin/Galleryadd/deleteimage/<?php  echo $data['id'] ?>/<?php echo $schoolid; ?>" 
														onclick="return confirm('Are you sure?')">
												<span style="cursor: pointer;color: red">
													<i class="lni lni-trash" aria-hidden="true"></i>
												</span>
												</a>

											</td>
										</tr>
									<?php }endif; ?>
									<br></br>
									<tr>
										<td>Images</td>
										<td><input type="file" name="userfile[]" id="image_file" accept=".png,.jpg,.jpeg,.gif" multiple></td>
									</tr>
									<br></br>
									<tr>

										<div class="col-6">
											<input type='submit' value='Upload' name='submit' class="btn btn-primary" />
										</div>

									</div> <!-- /.card-body -->

								</div> <!-- /.card -->

							</div> <!-- /.col-md-12 -->

						</div>

					</form>


					<script type="text/javascript">
						function deleteimage(image_id)
						{
							var answer = confirm ("Are you sure you want to delete from this post?");
							if (answer)
							{
								$.ajax({
									type: "POST",
									url: "<?php echo site_url('admin/Galleryadd/deleteimage');?>",
									data: "image_id="+image_id,
									success: function (response) {
										if (response == 1) {

											$(".imagelocation"+image_id).remove(".imagelocation"+image_id);
										};

									}
								});
							}
						}
					</script>




				</div><!-- /.container-fluid -->

			</section>

		</div><!-- /.content-wrapper -->

